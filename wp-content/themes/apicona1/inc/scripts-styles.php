<?php


/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Apicona 1.0
 *
 * @return void
 */
function apicona_scripts_styles() {
	$apicona = get_option('apicona');
	$themestyle = tm_get_theme_style();
	
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
	
	/*
	 * Adds RTL CSS file
	 */
	if ( is_rtl() ) {
		wp_enqueue_style(  'apicona-rtl',  get_template_directory_uri() . '/rtl'.TM_MIN.'.css' );
	}
	
	// Add page translation effect
	if( isset($apicona['pagetranslation']) && $apicona['pagetranslation']!='no'){
		wp_enqueue_script( 'animsition', get_template_directory_uri() . '/js/jquery.animsition'.TM_MIN.'.js', array( 'jquery' ) );
		wp_enqueue_style( 'animsition', get_template_directory_uri() . '/css/animsition'.TM_MIN.'.css' );
	}
	
	// Loads JavaScript file with functionality specific to Apicona.
	wp_enqueue_script( 'apicona-script', get_template_directory_uri() . '/js/functions'.TM_MIN.'.js', array( 'jquery', 'isotope' ), '2013-07-18', true );
	
	// Hover effect
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover'.TM_MIN.'.css' );
	
	
	// Hint.css
	wp_enqueue_style( 'hint', get_template_directory_uri() . '/assets/hint/hint.min.css' );

	
	// IsoTope
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope'.TM_MIN.'.js', array( 'jquery' ) );
	
	
	
	// Nivo Slider
	wp_register_script( 'nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider'.TM_MIN.'.js', array( 'jquery' ) );
	wp_register_style( 'nivo-slider-css', get_template_directory_uri() . '/css/nivo-slider'.TM_MIN.'.css' );
	wp_register_style( 'nivo-slider-theme', get_template_directory_uri() . '/css/nivo-default'.TM_MIN.'.css' );
	if( is_page() ){
		$slidertype = get_post_meta( get_the_ID(), '_kwayy_page_options_slidertype', true );
		if( is_array($slidertype) ){  $slidertype = $slidertype[0];  }
		if($slidertype=='nivo'){
			wp_enqueue_script( 'nivo-slider' );
			wp_enqueue_style( 'nivo-slider-css' );
			wp_enqueue_style( 'nivo-slider-theme' );
		}
	}
	
	
	// Flex Slider
	wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider'.TM_MIN.'.js', array( 'jquery' ) );
	wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider'.TM_MIN.'.css' );
	if( is_page() ){
		$slidertype = get_post_meta( get_the_ID(), '_kwayy_page_options_slidertype', true );
		if( is_array($slidertype) ){  $slidertype = $slidertype[0];  }
		if($slidertype=='flex'){
			wp_enqueue_script( 'flexslider' );
			wp_enqueue_style( 'flexslider' );
		}
	}
	
	
	// Tooltip
	wp_enqueue_script( 'bootstrap-tooltip', get_template_directory_uri() . '/js/bootstrap-tooltip'.TM_MIN.'.js', array( 'jquery', 'apicona-script' ) );
	
	// Sticky
	if( $apicona['stickyheader']=='y' ){
		wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky'.TM_MIN.'.js', array( 'jquery' ) );
	}
	
	// Load font icon library CSS files
	if( isset($apicona['fonticonlibrary']) && is_array($apicona['fonticonlibrary']) && count($apicona['fonticonlibrary'])>0 ){
		foreach( $apicona['fonticonlibrary'] as $library=>$val ){
			if( $library!='fontawesome' ){
				if( $val == '1' ){
					wp_enqueue_style( $library, get_template_directory_uri() . '/css/fonticon-library/'.$library.'/css/kwayy-'.$library.TM_MIN.'.css' );
				}
				
			}
		}
	}
	
	/**
	 * Detect plugin. For use on Front End only.
	 */
	if( !function_exists('is_plugin_active') ){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	
	//adding this to add compatibility with Navgoco Vertical Multilevel Slide Menu plugin
	if ( is_plugin_active('navgoco-menu/navgoco-menu.php' ) ) {
		wp_deregister_style('fontawesome');
	}
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fonticon-library/font-awesome/css/kwayy-font-awesome'.TM_MIN.'.css' ); // Font Awesome
	

	if( $themestyle == 'apiconaadv'	){
		// FontAwesome Library
		if ( !wp_style_is( 'font-awesome', 'registered' ) ) { // If library is not registered
			$fontawesome_css = get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css';
			if( file_exists( WP_PLUGIN_URL . '/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css') ){
				$fontawesome_css = WP_PLUGIN_URL . '/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css';
			}
			wp_register_style( 'font-awesome', $fontawesome_css );
		}
		
		// Enqueue FontAwesome library for general use
		wp_enqueue_style( 'font-awesome' );
	}
	
	
	
	

	
	if( $themestyle == 'apiconaadv' ){		
		// TM Social Icons CSS Library
		wp_enqueue_style( 'tm-social-icon-library', get_template_directory_uri() . '/assets/tm-social-icons/css/tm-social-icon.css' );
	}
	
	// Numinate plugin
	if ( !wp_script_is( 'waypoints', 'registered' ) ) { // If Waypoints library is not registered
		wp_register_script( 'waypoints', get_template_directory_uri() . '/js/waypoints'.TM_MIN.'.js', array( 'jquery' ) );
	}
	wp_register_script( 'numinate', get_template_directory_uri() . '/js/numinate.1.0.1'.TM_MIN.'.js', array( 'jquery' ) );
	
	// owl carousel CSS
	/*if( wp_style_is('vc_pageable_owl-carousel-css','registered') ){
		wp_enqueue_style( 'vc_pageable_owl-carousel-css' );
	} else {
		if( file_exists(WP_PLUGIN_DIR.'/js_composer/assets/lib/owl-carousel2-dist/assets/owl.carousel.css') ){
			wp_enqueue_style( 'vc_pageable_owl-carousel-css', plugins_url().'/js_composer/assets/lib/owl-carousel2-dist/assets/owl.carousel.css' );
		} else {
			wp_enqueue_style( 'vc_pageable_owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.css' );
		}
	}*/
	if( wp_style_is('owl-carousel','registered') ){
		wp_enqueue_style( 'owl-carousel' );
	} else {
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel'.TM_MIN.'.css' );
	}
	
	
	// owl carousel JS
	/*if( wp_script_is('vc_pageable_owl-carousel','registered') ){
		wp_enqueue_script( 'vc_pageable_owl-carousel' );
	} else {
		if( file_exists(WP_PLUGIN_DIR.'/js_composer/assets/lib/owl-carousel2-dist/owl.carousel.min.js') ){
			wp_enqueue_script( 'vc_pageable_owl-carousel', plugins_url().'/js_composer/assets/lib/owl-carousel2-dist/owl.carousel.min.js' );
		} else {
			wp_enqueue_script( 'vc_pageable_owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js' );
		}
	}*/
	if( wp_script_is('owl-carousel','registered') ){
		wp_enqueue_script( 'owl-carousel' );
	} else {
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel'.TM_MIN.'.js' );
	}
	 
	
	
	
	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'apicona-ie', get_template_directory_uri() . '/css/ie'.TM_MIN.'.css' );
	wp_style_add_data( 'apicona-ie', 'conditional', 'lt IE 9' );
	
	// Swipebox
	wp_enqueue_script( 'prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto'.TM_MIN.'.js', array( 'jquery' ) );
	wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/css/prettyPhoto'.TM_MIN.'.css' );
	
	// Pace Loader
	//wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace'.TM_MIN.'.js', array( 'jquery' ) );
	//wp_enqueue_style( 'pace', get_template_directory_uri() . '/css/prettyPhoto'.TM_MIN.'.css' );
	
	$apicona = get_option('apicona');
	if( isset($apicona['scroller_enable']) ){
		if( $apicona['scroller_enable']=='1'){
			// NiceScroll
			wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll'.TM_MIN.'.js', array( 'jquery' ) );
			wp_enqueue_script( 'nicescroll-plus', get_template_directory_uri() . '/js/jquery.nicescroll.plus'.TM_MIN.'.js', array( 'jquery' , 'nicescroll' ) );
		} else if( $apicona['scroller_enable']=='2'){
			// SmoothScroll
			wp_enqueue_script( 'SmoothScroll', get_template_directory_uri() . '/js/SmoothScroll'.TM_MIN.'.js', array( 'jquery' ) );
		}
	}
	
	// jquery-match-height
	wp_register_script( 'jquery-match-height', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ) );
	
}
add_action( 'wp_enqueue_scripts', 'apicona_scripts_styles', 10 );




function apicona_scripts_styles_14() {
	/*@import url("css/bootstrap.css");
	@import url("css/multi-columns-row.css");
	@import url("css/bootstrap-theme.css");
	*/

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap'.TM_MIN.'.css' );
	wp_enqueue_style( 'multi-columns-row', get_template_directory_uri() . '/css/multi-columns-row'.TM_MIN.'.css', array('bootstrap') );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme'.TM_MIN.'.css', array('bootstrap') );
}
add_action( 'wp_enqueue_scripts', 'apicona_scripts_styles_14', 14 );




function apicona_scripts_styles_15() {
	
	// Main theme is active
	if( defined( 'WPB_VC_VERSION' ) ){
		wp_enqueue_style( 'apicona-main-style', get_template_directory_uri() . '/css/main'.TM_MIN.'.css' , array('js_composer_front') );
	} else {
		wp_enqueue_style( 'apicona-main-style', get_template_directory_uri() . '/css/main'.TM_MIN.'.css' );
	}
	
	$theme = wp_get_theme(); // gets the current theme
	if ( !empty($theme->name) && 'Apicona' != $theme->name ) {
		// child theme is active
		wp_enqueue_style( 'apicona-child-style', get_stylesheet_directory_uri() . '/style.css' , array('apicona-main-style') );
		
	}
	
	
}
add_action( 'wp_enqueue_scripts', 'apicona_scripts_styles_15', 15 );


function apicona_scripts_styles_16() {
	$apicona = get_option('apicona');
	
	// Dynamic file extension
	$cssfileExtension = 'css';
	if( isset($apicona['dynamic-file-type']) && trim($apicona['dynamic-file-type'])!='' ){
		$cssfileExtension = $apicona['dynamic-file-type'];
	}
	$cssfileExtension = (is_multisite()) ? 'php' : $cssfileExtension ;
	
	
	// Dynamic Stylesheet
	if( isset($apicona['dynamic-style-position']) && $apicona['dynamic-style-position']=='internal' ){
		// Do nothing
	} else {
		$dynamic_file_name = TM_MIN.'.css';
		if( $cssfileExtension=='php' ){
			$dynamic_file_name = '.php';
		}
		wp_enqueue_style( 'apicona-dynamic-style', get_template_directory_uri() . '/css/dynamic-style'.$dynamic_file_name );
	}
}
add_action( 'wp_enqueue_scripts', 'apicona_scripts_styles_16', 16 );


function apicona_scripts_styles_17() {
	// Responsive
	$apicona = get_option('apicona');
	
	if($apicona['responsive']=='1'){
		wp_enqueue_style( 'apicona-responsive-style', get_template_directory_uri() . '/css/responsive.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'apicona_scripts_styles_17', 17 );



/**
 * Enqueue scripts and styles for the admin section.
 *
 * @since Apicona 1.0
 *
 * @return void
 */
function apicona_custom_wp_admin_style() {
	wp_register_script('custom-select2-js', get_template_directory_uri() . '/inc/custom-select2/custom-select2.js', array( 'jquery' ), time(), true);
	wp_register_style('custom-select2-css', get_template_directory_uri() . '/inc/custom-select2/custom-select2.css', array(), time(), 'all');
		
		
	// Load font icon library CSS files
	$apicona = get_option('apicona');
	if( isset($apicona['fonticonlibrary']) && is_array($apicona['fonticonlibrary']) && count($apicona['fonticonlibrary'])>0 ){
		foreach( $apicona['fonticonlibrary'] as $library=>$val ){
			if( $library!='fontawesome' ){
				if( $val == '1' ){
					wp_enqueue_style( $library, get_template_directory_uri() . '/css/fonticon-library/'.$library.'/css/kwayy-'.$library.'.css' );
				}
			}
		}
	}
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fonticon-library/font-awesome/css/kwayy-font-awesome.css' ); // Font Awesome
	
	wp_enqueue_script('custom-select2-js');
	wp_enqueue_style('custom-select2-css');
	wp_enqueue_style('kwayy-font-css');
	
	wp_enqueue_style( 'apicona_custom_wp_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false, '1.0.0' );
	wp_enqueue_script( 'apicona_custom_js', get_template_directory_uri() . '/inc/admin-custom.js', array( 'jquery' ) );
}
add_action( 'admin_enqueue_scripts', 'apicona_custom_wp_admin_style' );


