<?php

// Donate url
function csg_donateUrl() {
	return 'https://www.paypal.me/dakel/5/';
}

// The XML stylesheet
function csg_use_XMLstylesheet() {

	global $wpdb;
	$table_name = $wpdb->prefix . "csg_sitemap"; 

	$configs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE name = %s", "use_sitemap_stylesheet" ) );
	foreach ( $configs as $config ) {
		$stylesheet = $config->onoroff;
	}

	switch ( $stylesheet ) {
		case 'on':
			$return = true;
			break;
		default:
			$return = false;
			break;
	}

	return $return;

}
function csg_XMLstylesheet() {

	global $wpdb;
	$table_name = $wpdb->prefix . "csg_sitemap"; 

	$configs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE name = %s", "sitemap_stylesheet" ) );
	foreach ( $configs as $config ) {
		$stylesheet = $config->onoroff;
	}

	if( $stylesheet == '' ) {
		$stylesheet = plugin_dir_url( __FILE__ ) . 'sitemap.xsl';
	}
	
	return $stylesheet;

}

// Temp check
function csg_mainSiteOnly() {

	if( is_multisite() ) {
		if( is_main_site() ) {
			return true;
		} else {
			return false;
		}
	} else {
		return true;
	}

}

// The url of the sitemap
function csg_sitemap_url() {

	if( is_multisite() ) {
		return network_site_url() . csg_sitemap_file( true, get_current_blog_id() );
	} else {
		return site_url() . '/' . csg_sitemap_file();
	}

}

// Get the correct sitemap file
function csg_sitemap_file( $multisite = false, $blogid = '1' ) {

	if( $multisite ) {
		if( $blogid == '1' ) {
			return 'sitemap.xml';
		} else {
			return 'sitemap-'.$blogid.'.xml';
		}
	} else {
		return 'sitemap.xml';
	}

}

// Get taxonomies
function csg_get_taxonomies() {

	// Global array
	$taxes = array();

	// Built in
	$csg_term_args = array( 'public' => true, '_builtin' => true ); // Arguments
	if( csg_is_multilingual() )  $csg_term_args['lang'] = csg_default_language(); // If is multilingual add language filter
	$taxonomies = get_taxonomies( $csg_term_args, 'names', 'and' ); // Get taxonomies
	foreach( $taxonomies as $taxonomie ) array_push( $taxes, $taxonomie ); // Push to global array

	// Not builtin
	$csg_term_args = array( 'public' => true, '_builtin' => false ); // Arguments
	if( csg_is_multilingual() )  $csg_term_args['lang'] = csg_default_language(); // If is multilingual add language filter
	$taxonomies = get_taxonomies( $csg_term_args, 'names', 'and' ); // Get taxonomies
	foreach( $taxonomies as $taxonomie ) array_push( $taxes, $taxonomie ); // Push to global array

	// Return global array
	return $taxes;
}

// Creates the sitemap
function csg_sitemap() {

	if( is_multisite() ) {
		$csg_sitemap_file = get_home_path() . csg_sitemap_file( true, get_current_blog_id() );
	} else {
		$csg_sitemap_file = get_home_path() . csg_sitemap_file();
	}

	if ( file_exists( $csg_sitemap_file ) ) {

		if ( is_writable( $csg_sitemap_file ) ) {

				// First clear + write sitemap
				file_put_contents( $csg_sitemap_file, '' );
				file_put_contents( $csg_sitemap_file, csg_sitemap_content() );

				csg_notify_engines(); // Notify search engines

				// Succes
				succesMSG( '<b>'.__( 'Your sitemap has been updated', 'companion-sitemap-generator' ).'</b> '.__( 'Check it out', 'companion-sitemap-generator' ).': <a href="'. csg_sitemap_url() .'" target="_blank">'. csg_sitemap_url() .'</a>' );

		} else {

			// Error when sitemap.xml is not writable
		    errorMSG( __( 'Your sitemap file is not writable', 'companion-sitemap-generator').'</p></div>' );

			$subject = __('Sitemap Error', 'companion-sitemap-generator');
			$message = __( 'Something went wrong while updating your sitemap: ', 'companion-sitemap-generator' );
			$message .= __( 'Your sitemap file is not writable.', 'companion-sitemap-generator' );

			wp_mail( get_option('admin_email') , $subject, $message );

		}

	} else {

		// Error if sitemap.xml doesn't exist
		errorMSG('<p>'.__( 'We weren\'t able to locate a sitemap file in your website\'s root folder. ', 'companion-sitemap-generator' ).'</p>');

		$subject = __( 'Sitemap Error', 'companion-sitemap-generator' );
		$message = __( 'Something went wrong while updating your sitemap: ', 'companion-sitemap-generator' );
		$message .= __( 'We weren\'t able to locate a sitemap file in your website\'s root folder.', 'companion-sitemap-generator' );

		wp_mail( get_option('admin_email') , $subject, $message );

	}

}

function csg_proper_url_format( $url ) {
	return str_replace('&', '%26', $url );
}

// Get addition pages
function csg_get_additionalpages() {

	global $wpdb;
	$table_name = $wpdb->prefix . "csg_sitemap"; 

	// Enable for major updates
	$configs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE name = %s", "additionalpages" ) );
	foreach ( $configs as $config ) {
		$pages = $config->onoroff;
	}

	if( $pages != '' ) $pages = explode( " ", $pages );

	return $pages;

}
function csg_get_additionalpages__textarea() {
	$pages = csg_get_additionalpages();
	if( $pages != '' ) {
		foreach( $pages as $page ) { 
			echo $page; echo "\n"; 
		}
	}
}

// Get the frequency
function changeFreq() {

	global $wpdb;
	$table_name = $wpdb->prefix . "csg_sitemap"; 

	// Enable for major updates
	$configs = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE name = %s", "frequency" ) );
	foreach ( $configs as $config ) {
		return $config->onoroff;
	}

}

function csg_sitemap_line() {

	$csg_sitemap_content = '<url>
		<loc>'. csg_proper_url_format( get_the_permalink() ) .'</loc>';
	    if( csg_is_multilingual() ) {
		    foreach ( csg_languages() as $key => $lang ) {
		    	if( $lang != csg_default_language() ) {
		    		if( csg_post_translation_id( get_the_ID(), $lang ) != '' && get_post_status( csg_post_translation_id( get_the_ID(), $lang ) ) == 'publish' ) {
			    		$csg_sitemap_content .= '
		<xhtml:link 
			rel="alternate" 
			hreflang="'.$lang.'" 
			href="'.csg_proper_url_format( get_the_permalink( csg_post_translation_id( get_the_ID(), $lang ) ) ).'"
			/>';
			    	}
		    	}
		    }
	    }
		$csg_sitemap_content .= '
		<lastmod>'.get_the_modified_date( 'Y-m-d' ).'</lastmod>
	    <changefreq>'.changeFreq().'</changefreq>
	</url>
	';

	return $csg_sitemap_content;

}


function csg_sitemap_line_additionalpages( $link ) {

	$csg_sitemap_content = '<url>
		<loc>'. csg_proper_url_format( $link ) .'</loc>';
	    if( csg_is_multilingual() ) {
		    foreach ( csg_languages() as $key => $lang ) {
		    	if( $lang != csg_default_language() ) {
		    		if( csg_post_translation_id( get_the_ID(), $lang ) != '' && get_post_status( csg_post_translation_id( get_the_ID(), $lang ) ) == 'publish' ) {
			    		$csg_sitemap_content .= '
		<xhtml:link 
			rel="alternate" 
			hreflang="'.$lang.'" 
			href=""
			/>';
			    	}
		    	}
		    }
	    }
		$csg_sitemap_content .= '
		<lastmod>'.get_the_modified_date( 'Y-m-d' ).'</lastmod>
	    <changefreq>'.changeFreq().'</changefreq>
	</url>
	';

	return $csg_sitemap_content;

}

function csg_sitemap_line_terms( $id ) {

	$csg_sitemap_content = '<url>
		<loc>'. csg_proper_url_format( get_term_link( $id ) ) .'</loc>';
	    if( csg_is_multilingual() ) {
		    foreach ( csg_languages() as $key => $lang ) {
		    	if( $lang != csg_default_language() ) {
		    		if( csg_term_translation_id( $id, $lang ) != '' ) {
			    		$csg_sitemap_content .= '
		<xhtml:link 
			rel="alternate" 
			hreflang="'.$lang.'" 
			href="'.csg_proper_url_format( get_term_link( csg_term_translation_id( $id, $lang ) ) ).'"
			/>';
			    	}
		    	}
		    }
	    }
		$csg_sitemap_content .= '
	    <changefreq>'.changeFreq().'</changefreq>
	</url>
	';

	return $csg_sitemap_content;

}

// This function writes to the sitemap file
function csg_sitemap_content() {

	// Basic XML output
	$csg_sitemap_content = '<?xml version="1.0" encoding="UTF-8"?>';

	if( csg_use_XMLstylesheet() ) {
		$csg_sitemap_content .= '<?xml-stylesheet type="text/xsl" href="'.csg_XMLstylesheet().'"?>';
	}

	$csg_sitemap_content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

	// Basic query arguments
	$csg_sitemap_args = array( 
		'order' 			=> 'asc', 
		'posts_per_page' 	=> '-1', 
		'post_status' 		=> 'publish', 
		'post__not_in' 		=> csg_exclude()
	);

	// Term arguments
	$csg_term_args = array(
		'hide_empty' => true
	);

	// If is multilingual add language filter
	if( csg_is_multilingual() ) {
		$csg_sitemap_args['lang'] 	= csg_default_language();
		$csg_term_args['lang'] 		= csg_default_language();
	}

	// Add post types
	$post_types = get_post_types( array( 'public' => true ), 'names', 'and' );

	foreach ( $post_types  as $post_type ) {

		if( !in_array( $post_type, csg_exclude_posttypes() ) && $post_type != 'attachment' ) {

			$csg_sitemap_args['post_type'] = $post_type;

			query_posts( $csg_sitemap_args );

			if( have_posts() ) {

				while( have_posts() ) {

					the_post();
					$csg_sitemap_content .= csg_sitemap_line();

				}

			}

			wp_reset_query();

		}

	}

	// Add taxonomies 
	$taxonomies = csg_get_taxonomies();

	// If there are any taxonomies
	if ( $taxonomies ) {

		// Loop trough all
		foreach( $taxonomies as $taxonomie ) {

			// Get information of current one
			$thisTaxonomie = get_taxonomy( $taxonomie );

			// Check if it's not hidden
			if( !in_array( $taxonomie, csg_exclude_posttypes() ) ) {

				// Get all terms by taxonomy
				global $wp_version;
				if ( version_compare( $wp_version, '4.5.0', '>=' ) ) {
					$terms = get_terms( array( 'taxonomy' => $taxonomie, 'hide_empty' => true ) );
				} else {
					$terms = get_terms( $taxonomie, array( 'hide_empty' => true ) );
				}

				// Loop through them
				foreach( $terms as $tax ) {
					if( !in_array( $tax->term_id, csg_exclude_ctam() ) ) {
						$csg_sitemap_content .= csg_sitemap_line_terms( $tax->term_id );
					}
				}

			}

		}

	}

	// Add Additional pages
	if ( !empty( csg_get_additionalpages() ) ) {
		foreach( csg_get_additionalpages() as $additionalpage ) {
			$csg_sitemap_content .= csg_sitemap_line_additionalpages( $additionalpage );
		}
	}

	$csg_sitemap_content .= '
	</urlset>';

	// Return sitemap-string but first filter any text containing illegal named entities
	return ent2ncr( $csg_sitemap_content );

}

// Get all post types without filtered once
function csg_get_filtered_post_types() {

	$pttArray = csg_get_post_types();

	foreach ( $pttArray as $postType ) {

		if( in_array( $postType, csg_exclude_posttypes() ) ) {

			if( ( $key = array_search( $postType, $pttArray ) ) !== false ) {
			    unset( $pttArray[ $key ] );
			}

		}

	}

}

// Get all post types
function csg_get_post_types() {

	// Get all exisiting post types
	$post_types 		= get_post_types( array( 'public' => true ), 'names', 'and' );
	$post_type_array 	= array();

	foreach ( $post_types  as $post_type ) {
		if( $post_type != 'attachment' ) {
			array_push( $post_type_array , $post_type );
		}
	}

	return $post_type_array;

}

// Custom functions for handling messages
function succesMSG( $content ) {
	echo '<div id="message" class="updated"><p>'.$content.'</p></div>';
}
function errorMSG( $content ) {
	echo '<div id="message" class="error"><p>'.$content.'</p></div>';
}

// Get all post types for html sitemap
function html_posttypes( $sort, $orderby, $numOfColumns ) {

	$post_types = get_post_types( array( 'public' => true ), 'names', 'and' ); 
	$posts 		= '';

	foreach ( $post_types  as $post_type ) {

		if( !in_array( $post_type, csg_exclude_posttypes() ) ) {
			
			$csg_sitemap_args = array( 
				'order' 			=> $sort, 
				'post_type' 		=> $post_type, 
				'posts_per_page' 	=> '-1', 
				'post_status' 		=> 'publish', 
				'post__not_in' 		=> csg_exclude(),
				'orderby'			=> $orderby,
				'post_parent' 		=> 0,
			);

			// Get name of post type
			$post_typeO = get_post_type_object( $post_type ); 

			query_posts( $csg_sitemap_args );

			if( have_posts() ) {

				$posts .= '<div class="sitemap-column sitemap-columns-'.$numOfColumns.' sitemap-posttypes sitemap-posttype-'.$post_typeO->name.'"><div class="html-sitemap-column"><h2>'.$post_typeO->label.'</h2>
				<ul class="html-sitemap-list">';

				while ( have_posts() ) {

					the_post(); 

					$posts .= '<li class="html-sitemap-list-item html-sitemap-post-'.get_the_ID().'"><a href="'. get_the_permalink() .'" title="'. get_the_title() .'">'. get_the_title() .'</a>';

					// Get children
					$args = array(
						'post_parent' 		=> get_the_ID(),
						'post_type'   		=> $post_type, 
						'posts_per_page' 	=> '-1', 
						'post_status' 		=> 'publish',
						'post__not_in' 		=> csg_exclude(),
					);
					$children = get_children( $args );

					if( !empty( $children ) ) $posts .= '<ul class="html-sitemap-sub-list">';

					foreach ( $children as $child ) {
						$posts .= '<li class="html-sitemap-list-item html-sitemap-post-'.$child->ID.'"><a href="'. get_the_permalink( $child->ID ) .'" title="'. get_the_title( $child->ID ) .'">'. get_the_title( $child->ID ) .'</a></li>';

						$args = array(
							'post_parent' 		=> $child->ID,
							'post_type'   		=> $post_type, 
							'posts_per_page' 	=> '-1', 
							'post_status' 		=> 'publish',
							'post__not_in' 		=> csg_exclude(),
						);
						$childrens_children = get_children( $args );

						if( !empty( $childrens_children ) ) {
							$posts .= '<ul class="html-sitemap-sub-list">';
						}
						foreach ( $childrens_children as $child ) {
							$posts .= '<li class="html-sitemap-list-item html-sitemap-post-'.$child->ID.'"><a href="'. get_the_permalink( $child->ID ) .'" title="'. get_the_title( $child->ID ) .'">'. get_the_title( $child->ID ) .'</a></li>';
						}
						if( !empty( $childrens_children ) ) {
							$posts .= '</ul>';
						}

					}

					if( !empty( $children ) ) $posts .= '</ul>';

					$posts .= '</li>';
				}

				$posts .= '</ul></div></div>';

			}

			wp_reset_query();

		}

	}

	return $posts;

}

// Taxonomies
function html_taxonomies( $sort, $orderby, $numOfColumns ) {

	$taxonomiesReturn = '';

	// Get al taxonomies
	$taxonomies = csg_get_taxonomies();

	if ( $taxonomies ) {

		foreach( $taxonomies as $taxonomie ) {

			$thisTaxonomie = get_taxonomy( $taxonomie );

			if( !in_array( $taxonomie, csg_exclude_posttypes() ) ) {

				// Get all terms by taxonomy
				global $wp_version;
				if ( version_compare( $wp_version, '4.5.0', '>=' ) ) {
					$terms = get_terms( array( 'taxonomy' => $taxonomie, 'orderby' => $orderby, 'order' => $sort, 'hide_empty' => true ) );
				} else {
					$terms = get_terms( $taxonomie, array(  'orderby' => $orderby, 'order' => $sort, 'hide_empty' => true ) );
				}

				if( !empty( $terms ) ) {

					$taxonomiesReturn .= '<div class="sitemap-column sitemap-columns-'.$numOfColumns.' sitemap-taxonomies sitemap-taxonomy-'.$thisTaxonomie->name.'"><div class="html-sitemap-column"><h2>'.$thisTaxonomie->label.'</h2>
					<ul class="html-sitemap-list">';

					foreach( $terms as $tax ) {
						if( !in_array( $tax->term_id, csg_exclude_ctam() ) ) {
							$taxonomiesReturn .= '<li class="html-sitemap-list-item html-sitemap-post-'.$tax->term_id.'"><a href="'. get_term_link( $tax->term_id ) .'" title="'. $tax->name .'">'. $tax->name .'</a></li>';
						}
					}

					$taxonomiesReturn .= '</ul></div></div>';

				}

			}

		}

	}

	return $taxonomiesReturn;

}

// Aditional pages
function html_additionalpages( $sort, $orderby, $numOfColumns ) {

	$additionalpagesreturn = '';

	// Get al additional pages
	$additionalpages = csg_get_additionalpages();

	if ( !empty( $additionalpages ) ) {

		$additionalpagesreturn .= '<div class="sitemap-column sitemap-columns-'.$numOfColumns.' sitemap-additionalpages"><div class="html-sitemap-column">
		<h2>'.__( 'Additional pages', 'companion-sitemap-generator' ).'</h2>
		<ul class="html-sitemap-list">';

		foreach( $additionalpages as $additionalpage ) {
			$additionalpagesreturn .= '<li class="html-sitemap-list-item">
				<a href="'.sanitize_text_field( $additionalpage ).'">'.sanitize_text_field( $additionalpage ).'</a>
			</li>';
		}

		$additionalpagesreturn .= '</ul></div></div>';

	}

	return $additionalpagesreturn;

}

// Create shortcode
function htmlsitemap_handler( $attributes ) {

	$conf = shortcode_atts([
		'columns' 		=> '1',
		'orderby'		=> 'date',
		'sort'			=> 'asc',
	], $attributes, 'html-sitemap' );

	return htmlsitemap( $conf['columns'], $conf['orderby'], $conf['sort'] );
}

function htmlsitemap( $numOfColumns, $orderby, $sort ) {

	// Enqueue styling
	wp_enqueue_style( 'csg-styling' );

	// The code
	if( $numOfColumns != '1' ) {
		$classes = 'has-multiple-columns';
	} else {
		$classes = 'single-column';
	}

	$csg_sitemap_content 	= '<div id="html_sitemap" class="'.$classes.'">';

	$csg_sitemap_content 	.= html_posttypes( $sort, $orderby, sanitize_text_field( $numOfColumns ) );
	$csg_sitemap_content 	.= html_taxonomies( $sort, $orderby, sanitize_text_field( $numOfColumns ) );
	$csg_sitemap_content 	.= html_additionalpages( $sort, $orderby, sanitize_text_field( $numOfColumns ) );

	$csg_sitemap_content 	.= '</div>';

	return $csg_sitemap_content;
}
add_shortcode( 'html-sitemap' , 'htmlsitemap_handler' );

// Exclude these posts from the sitemap
function csg_exclude() {

	global $wpdb;
	$table_name 	= $wpdb->prefix . "csg_sitemap"; 
	$config 		= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE name = %s", "exclude" ) );

	$list 			= $config[0]->onoroff;
	$list 			= explode( ", ", $list );
	$returnList 	= array();

	foreach ( $list as $key ) if( $key != '' ) array_push( $returnList, $key );
	
	return $returnList;

}

// Exclude these posttypes from the sitemap
function csg_exclude_posttypes() {

	global $wpdb;
	$table_name 	= $wpdb->prefix . "csg_sitemap"; 
	$config 		= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE name = %s", "posttypes" ) );

	$list 			= $config[0]->onoroff;
	$list 			= explode( ", ", $list );
	$returnList 	= array();

	foreach ( $list as $key ) if( $key != '' ) array_push( $returnList, $key );
	
	return $returnList;

}

// Exclude these categories, tags and more
function csg_exclude_ctam() {

	global $wpdb;
	$table_name 	= $wpdb->prefix . "csg_sitemap"; 
	$config 		= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE name = %s", "ctam" ) );

	$list 			= $config[0]->onoroff;
	$list 			= explode( ", ", $list );
	$returnList 	= array();

	foreach ( $list as $key ) if( $key != '' ) array_push( $returnList, $key );
	
	return $returnList;

}

// Get active tab
function csg_active_tab( $page ) {

	if( !isset( $_GET['tabbed'] ) ) {
		$cur_page = '';
	} else {
		$cur_page = $_GET['tabbed'];
	}

	if( $page == $cur_page ) {
		echo 'nav-tab-active';
	}

}

// Read sitemap.xml file
function csg_read_sitemap() {

	$return = '';
	if( is_multisite() ) {
		$sitemapFile = get_home_path().csg_sitemap_file( true, get_current_blog_id() );
	} else {
		$sitemapFile = get_home_path().csg_sitemap_file();
	}
	$sitemapLines 		= array();
	$readSitemap 		= fopen( $sitemapFile, "r" );

	if( $readSitemap ) {
		while( ( $lineSitemap = fgets( $readSitemap ) ) !== false ) {
		    array_push( $sitemapLines, $lineSitemap );
		}
		fclose( $readSitemap );
	}

	foreach( $sitemapLines as $sitemapLine ) { 
		$return .= $sitemapLine;
	}

	return $return;
}

// Are changes made to the sitemap?
function csg_changes_made() {

	// Two files
	$current_content 	= csg_read_sitemap();
	$new_content 		= csg_sitemap_content();

	// Are they the same?
	if( $current_content != $new_content ) {
		return true;
	} else {
		return false;
	}
}

// Submit sitemap to search engines
function csg_notify_engine( $engine ) {

	global $wpdb;
	$table_name 	= $wpdb->prefix . "csg_sitemap"; 
	$getEngine 		= 'ping_'.$engine;
	$config 		= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE name = %s", $getEngine ) );
	$val 			= $config[0]->onoroff;

	if( $val != '' ) {
		return true;
	} else {
		return false;
	}

}
function csg_notify_engines() {

	// Check if changes are made
	if( csg_changes_made() ) {

		// Notify Google
		if( csg_notify_engine( 'google' ) ) {

	      	$url 	= "https://www.google.com/ping?sitemap=".csg_sitemap_url();
			$ch 	= curl_init();
			Curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		  	$result = curl_exec($ch);
		  	Curl_close( $ch );

		}

		// Notify Bing
		if( csg_notify_engine( 'bing' ) ) {

			$url 	= "http://www.bing.com/ping?sitemap=".csg_sitemap_url();
			$ch 	= curl_init();
			Curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		  	$result = curl_exec($ch);
		  	Curl_close( $ch );

		}

	}

}

// Is multilingual 
function csg_is_multilingual() {

	if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return true;
	} else {
		return false;
	}

}

// List of all languages
function csg_languages() {
	return pll_languages_list();
}

// Default language
function csg_default_language() {
	return pll_default_language();
}

// Get ID of stranslation for post
function csg_post_translation_id( $id, $lang ) {
	return pll_get_post( $id, $lang );
}
// Get ID of stranslation for term / category
function csg_term_translation_id( $id, $lang ) {
	return pll_get_term( $id, $lang );
}
function csg_get_term_language( $id ) {
	return pll_get_term_language( $id );
}
