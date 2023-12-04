<?php 


/**
 *  Convert VC options to list of array with default values
 */
if( !function_exists('tm_create_options_list') ){
function tm_create_options_list( $optionslist=array() ){
	
	$options_list = array();
	if( is_array($optionslist) && count($optionslist)>0 ){
		foreach( $optionslist as $options ){
			if( isset($options['param_name']) && $options['param_name']!='content' ){
				$std = ( isset($options['std']) && trim($options['std'])!='' ) ? trim($options['std']) : '' ;
				$options_list[$options['param_name']] = $std;
			}
		}
	}
	return $options_list;
}
}
/* ********************* Function END ********************* */


/**
 *  clone of VC function for compatibilty
 */
if( !function_exists('tm_vc_shortcode_custom_css_class') ){
function tm_vc_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';

	return $css_class;
}
}

/**
 * Function to prepare DATA tag values
 */
if( !function_exists('tm_carousel_data_html') ){
function tm_carousel_data_html( $allVar ){
	$return = '';
	
	if( $allVar['view'] == 'carousel' ){
		
		wp_enqueue_script( 'owl-carousel');
		wp_enqueue_style( 'owl-carousel');
		wp_enqueue_style( 'animate-css');
		
		
		foreach( $allVar as $key=>$value ){
			$var = substr($key, 0 , 9 );
			if( $var=='carousel_' ){
				$datatitle = str_replace('carousel_','data-',$key);
				$return .= ' '.$datatitle.'="'.$value.'" ';
			}
		}
	}
	return $return;
}
}
/* ********************* Function END ********************* */



/**
 *  Heading in our custom element like Blogbox, Portfoliobox etc.
 */
if( !function_exists('tm_vc_element_heading') ){
function tm_vc_element_heading( $allVar ){
	
	
	$ctaOptions = array(
		'h2',
		'h2_link',
		'h2_use_theme_fonts',
		'use_custom_fonts_h2',
		'h2_font_container',
		'h2_google_fonts',
		'h4',
		'h4_link',
		'h4_use_theme_fonts',
		'use_custom_fonts_h4',
		'h4_font_container',
		'h4_google_fonts',
		'txt_align',
		'heading_sep',
		'shape',
		'style',
		'custom_background',
		'custom_text',
		'color',
		'add_button',
	);
	
	$carouselControls = '<div class="thememount-carousel-controls">
						<div class="thememount-carousel-controls-inner">							
							<!--<a class="thememount-carousel-slideshow"><span class="wpb_button"><i class="fa fa-pause"></i></span></a>-->
							<a class="thememount-carousel-next"><i class="demo-icon fa fa-angle-right"></i></a>
							<a class="thememount-carousel-prev"><i class="demo-icon fa fa-angle-left"></i></a>
						</div>
					</div>';
	
	$return = '';
	
	
	if( trim($allVar['h2'])!='' ) {
		$return .= '<div class="tm-element-heading-wrapper tm-heading-inner tm-element-align-'.$allVar['txt_align'].' ">';
		if( !isset($allVar['content']) ){
			$allVar['content'] = '';
		}
		$allVar['style'] = 'transparent';
		
		
		// Preparing CTA Shortcode
		/*$ctaShortcode = '[vc_cta ';
		foreach( $ctaOptions as $option ){
			if( isset($allVar[$option]) ){
				$ctaShortcode .= $option.'="'.$allVar[$option].'" ';
			}
		}
		if( isset($allVar['add_icon_new']) ){
			$ctaShortcode .= 'add_icon="'.$allVar['add_icon_new'].'" ';
		}
		$ctaShortcode .= 'el_width="100%" css_animation=""]'.$allVar['content'].'[/vc_cta]';
		*/
		
		// Preparing NEW shortcode
		$ctaShortcode = '[heading ';
		foreach( $ctaOptions as $option ){
			if( isset($allVar[$option]) ){
				$ctaShortcode .= $option.'="'.$allVar[$option].'" ';
			}
		}
		if( isset($allVar['add_icon_new']) ){
			$ctaShortcode .= 'add_icon="'.$allVar['add_icon_new'].'" ';
		}
		$ctaShortcode .= 'el_width="100%" css_animation=""]'.$allVar['content'].'[/heading]';
	
		$return .= do_shortcode($ctaShortcode);
	
	
		if( isset($allVar['view']) && $allVar['view'] == 'carousel' && $allVar['carousel_nav']=='above' ){
			$return .= '<div class="tm-carousel-arrows tm-carousel-arrows-'.$allVar['txt_align'].'">';
			$return .= $carouselControls;
			$return .= '</div>';
		}
		
		$return .= '</div> <!-- .tm-element-heading-wrapper container --> ';
		
	}
	return $return;
}
}
/* ********************* Function END ********************* */


/**
 * Blog Box
 */
if( !function_exists('thememount_blogbox') ){
function thememount_blogbox( $column='' ){
	global $apicona;
	global $post;
	$return = '';
	$blog_readmore_text = 'Read More';
	if( isset($apicona['blog_readmore_text']) && trim($apicona['blog_readmore_text'])!='' ){
		$blog_readmore_text = esc_attr($apicona['blog_readmore_text']);
	}


	// Getting Post Format
	$format = get_post_format();
	
	if( $format == false || $format == '' ){
		$format = 'standard';
	}
	
	// Date Box
	$title            = '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
	$date             = '<div class="thememount-postbox-small-date">'.thememount_entry_box_date(false).'</div>';
	$datenew          = '<span class="tm-date-wrapper"> <span class="tm-date-inner-wrapper"> ' . get_the_date( 'j M Y' ) . '</span></span>';
	$featuredLink     = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
	$featuredImgURL   = $featuredLink[0];
	$featuredLinkArea = '';
	
	
	switch($column){
		case 'one':
			$boxClass = 'col-lg-12 col-sm-12 col-md-12 col-xs-12';
			break;
		case 'two':
			$boxClass = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
			break;
		case 'three':
			$boxClass = 'col-lg-4 col-sm-6 col-md-4 col-xs-12';
			break;
		case 'four':
		default:
			$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'five':
			$boxClass = 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
			break;
		case 'six':
			$boxClass = 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
			break;
		case 'mix':
			$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'fix':
			$boxClass = 'blog-slider-box-width';
			break;
		case 'timeline':
			$boxClass = 'tm-blogbox-timeline';
			break;
	}
	
	// Adding Post format class to box
	$boxClass .= ' thememount-blogbox-format-'.$format;
	
	// Featured Content like Image, Slider, Video, Audio etc
	$featuredContent  = tm_post_thumbnail( false, $column );
	
	/***************************/
	
	/*
	$slugs = wp_get_post_terms( get_the_ID(), 'category', array("fields" => "slug"));
	$slugs   = implode( ' ', $slugs );
	*/
	
	// The above code is giving warning error so we did it another way
	$term_list = strip_tags(get_the_term_list( get_the_ID(), 'category', '', ' ', '' ));
	$term_list = explode( ' ', $term_list );
	
	$slugs = '';
	foreach( $term_list as $term ){
		$category = get_term_by('name', $term, 'category');
		$slugs .= ' ' . $category->slug;
	}
	$slugs = trim($slugs);
	
	
	
	/* Short Description */
	$description = '';
	$readMore    = __($blog_readmore_text, 'apicona').'<i class="tm-social-icon-angle-double-right"></i>';
	
	if( isset( $apicona['blog_text_limit'] ) && $apicona['blog_text_limit']>0 ){
		$description  = nl2br( tm_get_short_desc() );
		$description .= thememount_wrap_readmore('<a href="'.get_permalink().'" class="more-link">'.$readMore.'</a>');
	} else if( has_excerpt() ){
		$description  = nl2br( get_the_excerpt() );
		$description  = do_shortcode($description);
		$description .= thememount_wrap_readmore('<a href="'.get_permalink().'" class="more-link">'.$readMore.'</a>');
	} else {
		global $more;
		$more = 0;
		$description = strip_shortcodes( nl2br(get_the_content( $readMore )) );
	}
	
	// Post Format: Link
	if( $format=='link' ){
		$link = trim( get_post_meta( get_the_ID(), '_format_link_url', true ) );
		if( $link!='' ){
			$description = '<h4 class="tm-pformat-link-url"><a href="' . $link . '" target="_blank"> <i class="fa fa-link"></i> ' . $link . '</a></h4>' . $description;
		}
	} 
	
	
	$categories_list = get_the_category_list( __( ', ', 'apicona' ) ); // Translators: used between list items, there is a space after the comma.
	$categories_list = ( $categories_list ) ? '<span class="categories-links"><i class="fa fa-folder-open"></i> ' . $categories_list . '</span>' : '' ;
	
	$comments     = wp_count_comments( get_the_ID() ); $comments = $comments->approved; //Get Total Comments
	$commentsCode = '<div class="tm-blogbox-comment-w">';
	if( !is_sticky() && comments_open() ){
		$commentsCode  .= '<div class="tm-blogbox-comment"><i class="fa fa-comments-o"></i> '.$comments.'</div>';
	}
	$commentsCode .= '</div>';
	 
	$metaDetails = '';
	if( $column != 'one' && ($categories_list!='' || $comments!='') ){
		$metaDetails = '<div class="entry-meta thememount-blogbox-entry-meta"><div class="thememount-meta-details">' . $categories_list . '</div></div>';
	}
	
	
	
	// featured content
	if( $featuredContent == '' ){
		if( !empty($apicona['show_no_image']['blog']) && $apicona['show_no_image']['blog']=='1' ){
			$featuredContent = '<div class="thememount-proj-noimage"><img src="'.get_template_directory_uri() . '/images/noimage.png" class="tm-noimg tm-noimg-blog"></div>';
		}
	}
	
	// Overlay
	$overthumb = '';
	if( ($format=='standard' || $format=='image') && $featuredContent!='' ){
		$overthumb = '<a href="'. get_permalink() .'"><span class="overthumb"><i class="tm-social-icon-plus"></i></span></a>';
	}
	
	// Date
	$date = get_the_date();
	
	// Total Comments
	$comments     = '';
	$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
	if ( comments_open() ) {
		if ( $num_comments == 0 ) {
			$comments = __('No Comments', 'apicona');
		} elseif ( $num_comments > 1 ) {
			$comments = $num_comments . __(' Comments', 'apicona');
		} else {
			$comments = __('1 Comment', 'apicona');
		}
		//$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
	}
	
	
	
	// if quote
	if( $format=='quote' ){
		$thememount_quote_source_name = trim( get_post_meta( get_the_ID(), '_format_quote_source_name', true ) );
		$thememount_quote_source_url  = trim( get_post_meta( get_the_ID(), '_format_quote_source_url', true ) );
		$desc_footer                  = '';
		$title                        = '';  // No title in quote
		
		if( empty( $thememount_quote_source_url) ){
			$thememount_quote_source_url = get_permalink();
		}
		
		if( $thememount_quote_source_name!='' ){
			$desc_footer = '<cite class="tm-quote-footer"><a href="' . $thememount_quote_source_url . '" target="_blank">' . $thememount_quote_source_name . '</a></cite>';
		}
		$featuredContent = '<div class="tm-blogbox-featured-quote"><blockquote>'. get_the_content( '' ) . $desc_footer .'</blockquote></div>';
		$description     = '';
		$overthumb       = '';
	}
	
	
	
	// If timeline view than add some extra DIV with class
	if( $column == 'timeline' ){
		
		$return .= '<div class="tm-blogbox-timeline-boxview">
		<div class="tm-timeline-spine"></div>
		<div class="tm-timeline-element-inner">
			<span>
				<div class="tm-anchor-point"></div>
				<div class="tm-animation-wrap">';
		
	}
	
	
	
	
	
	$return .= '
		<article class="tm-post-box tm-box ' . $boxClass . ' ' . $slugs . '">
			<div class="post-item">
				<div class="post-item-thumbnail">
					<div class="post-item-thumbnail-inner">
						' . $featuredContent . '
						'. $overthumb .'
					</div>
					'. $featuredLinkArea .'
				</div>
				<div class="tm-item-content">
					'.$title.'			
					<div class="tm-blogbox-footer-meta">
						<div class="tm-blogbox-date"><i class="demo-icon tm-social-icon-calendar"></i> '.$date.'</div>
						<div class="tm-blogbox-comment"><i class="demo-icon tm-social-icon-comment-1"></i> '. $comments .'</div>
					</div>	
					<div class="thememount-blogbox-desc">
						' . $description . '
					</div>
				</div>
			</div>
		</article>
	';
	
	
	//<div class="post-box-icon-wrapper">' . thememount_entry_icon() . '</div>
	
	// If timeline view than add some extra DIV with class
	if( $column == 'timeline' ){
		
		$return .= '
					<div class="tm-angle-border">
						<div class="angle-part"></div>
					</div>
					
				</div>
			</span>
		</div>
		</div><!-- .tm-blogbox-timeline-boxview -->';
		
	}
	

	
	return $return;
	
}
}
/* ********************* Function END ********************* */




/**
 * Blogbox Timeline View
 */
if( !function_exists('thememount_blogbox_timeline') ){
function thememount_blogbox_timeline($option=""){
	
	// Featured Content like Image, Slider, Video, Audio etc
	$featuredContent = '';
	if( $option=='withfeatured' ){
		$featuredContent  = tm_post_thumbnail( false, 'one' );
		if( $featuredContent == '' ){
			$featuredContent = '<div class="thememount-proj-noimage"><img src="'.get_template_directory_uri() . '/images/noimage.png" class="tm-noimg tm-noimg-blog"></div>';
		}
	}
	
	/* Short Description */
	$description = '';
	if( isset( $apicona['blog_text_limit'] ) && $apicona['blog_text_limit']>0 ){
		$description  = nl2br( tm_get_short_desc() );
		$description .= thememount_wrap_readmore('');
	} else if( has_excerpt() ){
		$description  = nl2br( get_the_excerpt() );
		$description  = do_shortcode($description);
		$description .= thememount_wrap_readmore('');
	} else {
		global $more;
		$more = 0;
		$description = strip_shortcodes( nl2br(get_the_content( '' )) );
	}
	
	
	$return = '
		<div class="tm-timeline-spine"></div>
		<div class="tm-timeline-element-inner">
			<span>
				<div class="tm-anchor-point"></div>
				<div class="tm-animation-wrap">
					
					<div class="tm-content-wrap">
						<div class="post-item-thumbnail-inner">' . $featuredContent . '</div>
						<div class="tm-date">'.get_the_date('jS M Y').'</div>
						<h3 class="tm-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
						<div class="tm-content">'.$description.'</div>
					</div>
					
					<div class="tm-angle-border">
						<div class="border-part-top"></div>
						<div class="angle-part"></div>
						<div class="border-part-bottom"></div>
					</div>
					
				</div>
			</span>
		</div>
	';
	
	return $return;
}
}



/**
 * Print HTML with date information for current post.
 *
 * Create your own thememount_entry_box_date() to override in a child theme.
 *
 * @since Apicona Advanced 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
if ( !function_exists( 'thememount_entry_box_date' ) ){
function thememount_entry_box_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) ){
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'apicona' );
	} else {
		$format_prefix = '%2$s';
	}
	
	
	$date = '<div class="thememount-post-box-date-wrapper">';
		$date .= sprintf( '<div class="thememount-entry-date-wrapper">
								<span class="thememount-entry-date">
									<time class="entry-date" datetime="%1$s" >
										<span class="entry-date">%2$s</span> 
										<span class="entry-month">%3$s</span> 
										<span class="entry-year">%4$s</span> 
									</time>
								</span>
							</div>',
			get_the_date( 'c' ),
			get_the_date( 'j' ),
			get_the_date( 'M' ),
			get_the_date( ' Y' )
		);
	$date .= '</div>';
	
	if ( $echo ){
		echo $date;
	} else {
		return $date;
	}
}
}
/* ********************* Function END ********************* */




/**
 *  Post thumbnail. This will echo post thumbnail according to port format like video, audio etc.
 */
if ( !function_exists( 'tm_post_thumbnail' ) ){
function tm_post_thumbnail( $echo=true, $column='four' ){
	
	global $apicona;
	
	// Image size ID
	$imgSize = 'blog-'.$column.'-column';
	if( $column=='full' ){
		$imgSize = 'full';
	}
	
	// Getting Post Format
	$format = get_post_format();
	if( $format=='' ){ $format=='standard'; }
	
	$featuredContent = '';
	
	$noImgCode = '';
	if( !empty($apicona['show_no_image']['blog']) && $apicona['show_no_image']['blog']=='1' ){
		$noImgCode = '<div class="thememount-proj-noimage"><img src="'.get_template_directory_uri().'/images/noimage.png" class="tm-noimg tm-noimg-blog"></div>';
	}
	switch( $format ){
		case 'standard':
		default:
			if( has_post_thumbnail() ){
				$featuredContent = get_the_post_thumbnail( get_the_ID(), $imgSize );
			} else {
				$featuredContent = $noImgCode;
			}
			break;
		case 'quote':
			$title = '';
			if( has_post_thumbnail() ){
				$featuredContent = get_the_post_thumbnail( get_the_ID(), $imgSize );
			} else {
				$featuredContent = $noImgCode;
			}
			break;
		case 'video':
			$videocode = trim( get_post_meta( get_the_ID(), '_format_video_embed', true) );
			if( $videocode!='' ){
				if( strpos($videocode, 'http') === 0 ){
					$featuredContent = wp_oembed_get($videocode);
					if( $featuredContent==false ){ // 1st retry
						$featuredContent = wp_oembed_get($videocode);
					}
					if( $featuredContent==false ){ // 2nd retry
						$featuredContent = wp_oembed_get($videocode);
					}
					if( $featuredContent==false ){ // 3rd retry
						$featuredContent = wp_oembed_get($videocode);
					}
				} else {
					$featuredContent = $videocode;
				}
			}
			$featuredLinkArea = '';
			break;
			
		case 'audio':
			$audiocode = trim( get_post_meta( get_the_ID(), '_format_audio_embed', true) );
			if( $audiocode!='' ){
				$featuredContent = wp_oembed_get($audiocode);
				if( $featuredContent!=false ){
					$featuredContent = wp_oembed_get($audiocode);
				} else {
					$featuredContent = $audiocode;
				}
			}
			$featuredLinkArea = '';
			break;
			
		case 'gallery':
			$featuredContent = thememount_featured_gallery_slider('post', $column);
			if( $featuredContent=='' ){
				if( has_post_thumbnail() ){
					$featuredContent = get_the_post_thumbnail( get_the_ID(), $imgSize );
				} else {
					$featuredContent = $noImgCode;
				}
			} else {
				$featuredLinkArea = '';
			}
			break;
	}
	
	
	// Overlay
	$overthumb = '';
	if( ($format=='standard' || $format=='image' || $format==false) && !is_single() ){
		$overthumb = '<a href="'. get_permalink() .'"><span class="overthumb"><i class="tm-social-icon-plus"></i></span></a>';
	}
	
	
	
	// Wrapping the featured content
	if( trim($featuredContent)!='' ){
		$featuredContent = '<div class="thememount-blog-media entry-thumbnail">' . $featuredContent . $overthumb . '</div>';
	}
	
	
	if( $echo ){
		echo $featuredContent;
	} else {
		return $featuredContent;
	}
	
}
}
/* ********************* Function END ********************* */

/**
 * Wrap DIV to the Read More link in blog
 */
if( !function_exists('thememount_wrap_readmore') ){
function thememount_wrap_readmore($more_link) {

    $readmorelink =  str_replace(
        'more-link',
        'more-link tm-post-read-more-link',
        $more_link
    );

	return '<div class="thememount-post-readmore">'.$readmorelink.'</div>';
}
}
add_filter('the_content_more_link', 'thememount_wrap_readmore', 10, 1);
/* ********************* Function END ********************* */




/**
 *  Slider
 */
if( !function_exists('thememount_featured_gallery_slider') ){
function thememount_featured_gallery_slider( $postType='post', $column='four' ){
	
	$wrapperClass = '';
	$metaPrefix   = '_kwayy_post_gallery_';
	$wrapperClass = 'thememount-blog-media';
	
	if( 'portfolio' == $postType ){
		$metaPrefix   = '_kwayy_portfolio_featured_';
		$wrapperClass = 'thememount-portfolio-media';
		$imgSize      = 'portfolio-'.$column.'-column';
	} else if( 'post' == $postType ){
		$metaPrefix   = '_kwayy_post_gallery_';
		$wrapperClass = 'thememount-blog-media';
		$imgSize      = 'blog-'.$column.'-column';
	}
	$return = '';
	if( $metaPrefix!='' ){
		for($a=1; $a<=10; $a++){
			$slideImage = get_post_meta(get_the_ID(), $metaPrefix . 'slideimage'.$a, true);
			if( $slideImage!='' ){
				$return .= '<li>'.wp_get_attachment_image( $slideImage, $imgSize).'</li>';
			}
		}
		if( $return!='' ){
			$return = '<div class="'.$wrapperClass.' thememount-blog-media thememount-slider-wrapper"><div class="flexslider"><ul class="slides">' . $return . '</ul></div></div>';
		}
	}
	return $return;
}
}
/* ********************* Function END ********************* */




/**
 * Portfolio Box
 */
if( !function_exists('thememount_portfoliobox') ){
function thememount_portfoliobox( $column='', $pdesign='' ){
	global $apicona;
	$return = '';
	$featuredImg = '';
	// Getting all values
	$featuredtype = get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_featuredtype', true );
	$featuredtype = $featuredtype[0];

	// YouTube or Vimeo
	$videourl     = get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_videourl', true );
	
	// Video Player (HTML5)
	$videofile_mp4 =  get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_videofile_mp4', true );
	$videofile_webm = get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_videofile_webm', true );
	$videofile_ogv =  get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_videofile_ogv', true );

	// SoundCloud or other Audio embed code
	$audiocode = get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_audiocode', true );

	// Audio Player (HTML5)
	$audiofile_mp3 = get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_audiofile_mp3', true );
	$audiofile_wav = get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_audiofile_wav', true );
	$audiofile_oga = get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_audiofile_oga', true );

	$embedCodeDiv = '';
	
	$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
	switch($column){
		case 'one':
			$boxClass = 'col-lg-12 col-sm-12 col-md-12 col-xs-12';
			break;
		case 'two':
			$boxClass = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
			break;
		case 'three':
			$boxClass = 'col-lg-4 col-sm-6 col-md-4 col-xs-12';
			break;
		case 'four':
		default:
			$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'five':
			$boxClass = 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
			break;
		case 'six':
			$boxClass = 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
			break;
		case 'mix':
			$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'fix':
			$boxClass = 'portfolio-slider-box-width';
			break;
	}




	
	$slugs = array();
	$terms = array();
	if( taxonomy_exists('portfolio_category') ){
		$term_slugs = wp_get_post_terms( get_the_ID(), 'portfolio_category', array("fields" => "all") );
		foreach( $term_slugs as $term ){
			$slugs[] = $term->slug;
			$terms[] = $term->name;
		}
	}

	$likes = get_post_meta( get_the_ID(), 'kwayy_likes', true );
	if( !$likes ){ $likes='0'; }

	$likeActiveClass = ( isset($_COOKIE["thememount_likes_".get_the_ID()]) ) ? 'like-active' : '' ;
	$likeIconClass   = ( isset($_COOKIE["thememount_likes_".get_the_ID()]) ) ? 'fa fa-heart' : 'fa fa-heart-o' ;

	$featuredLink = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
	$featuredImgURL = $featuredLink[0];

	// Featured type link
	switch($featuredtype){
		case 'image':
		default:
			$featuredLink = '<a href="' . $featuredImgURL . '" class="thememount_pf_featured tm_prettyphoto" title="' . get_the_title() . '" data-rel="prettyPhoto"><i class="tm-social-icon-picture-1"></i></a>';
			break;
		case 'video':
			$featuredLink = '<a href="' . $videourl . '" class="thememount_pf_featured tm_prettyphoto" title="' . get_the_title() . '" data-rel="prettyPhoto"><i class="tm-social-icon-videocam"></i></a>';
			break;
			
		case 'audioembed':
			$embedCodeDiv = '<div id="thememount-embed-code-'.get_the_ID().'" class="thememount-hide">'.$audiocode.'</div>';
			$featuredLink = '<a href="#thememount-embed-code-' . get_the_ID() . '" class="thememount_pf_featured tm_prettyphoto" title="' . get_the_title() . '" data-rel="prettyPhoto"><i class="tm-social-icon-volume-down"></i></a>';
			break;
			
		case 'slider':
			$embedCodeDiv = '<div id="#thememount-embed-code-' . get_the_ID() . '" class="thememount-hide">';
			$api_images = $api_titles = $api_desc = array();
			for($i=1; $i<=10; $i++){
				$img = get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_slideimage'.$i, true );
				if( $img != '' ){
					$imgdesc      = wp_get_attachment_image_src( $img, 'full' );
					$api_images[] = '"'.$imgdesc[0].'"';
					$api_titles[] = '"' . get_the_title() . '"';
					$api_desc[]   = '""';
				}
			}
			if( count($api_images)>0 ){
				$embedCodeDiv .= '<div class="thememount-hide thememount-pf-gallery-content"><script type="text/javascript">';
				$embedCodeDiv .= 'api_images_' . get_the_ID() . ' = [' . implode(',',$api_images) . '];';
				$embedCodeDiv .= 'api_titles_' . get_the_ID() . ' = [' . implode(',',$api_titles) . '];';
				$embedCodeDiv .= 'api_desc_' . get_the_ID() . '   = [' . implode(',',$api_desc) . '];';
				$embedCodeDiv .= '</script></div>';
			}
			$embedCodeDiv .= '</div>';

			$featuredLink = '<a href="#thememount-embed-code-' . get_the_ID() . '" class="thememount_pf_featured thememount-open-gallery" title="' . get_the_title() . '"><i class="tm-social-icon-gallery"></i></a>';

			break;
	}
	
	
	
	
	$termList = ( is_array($terms) && count($terms)>0 ) ? '<p>'. implode(' / ',$terms) .'</p>' : '' ;
	
	
	$like = '<!-- Like -->
				<div class="thememount-portfolio-likes-wrapper">
					<a class="thememount-portfolio-likes ' . $likeActiveClass . '" href="#" id="pid-' . get_the_ID() . '">
						<i class="'.$likeIconClass.'"></i>&nbsp;' . $likes . '
					</a>
				</div>';
	if( isset($apicona['portfolio_show_like']) && trim($apicona['portfolio_show_like'])=='0' ){
		$like = '';
	}

	
	// NEW featured image
	if( $pdesign=='nopadding' ){
		if( has_post_thumbnail() ){
			$featuredImg = get_the_post_thumbnail( get_the_ID(), 'portfolio-'.$column.'-column' );
		} else {
			//if( !empty($apicona['show_no_image']['portfolio']) && $apicona['show_no_image']['portfolio']=='1' ){
				$featuredImg = '<div class="thememount-proj-noimage"><img src="'.get_template_directory_uri().'/images/noimage-portfolio.png" class="tm-noimg tm-noimg-portfolio"></div>';
			//}
		}
		
	} else {
		if( has_post_thumbnail() ){
			$featuredImg  = get_the_post_thumbnail( get_the_ID(), 'portfolio-'.$column.'-column' );
			$featuredImg .= '<div class="icon-overlay"></div>								
				<div class="icons">
					' . $featuredLink . '
					<a href="' . get_permalink() . '" class="thememount_pf_link"><i class="fa fa-link"></i></a>
				</div>';

		} else {
			if( !empty($apicona['show_no_image']['portfolio']) && $apicona['show_no_image']['portfolio']=='1' ){
				$featuredImg = '<div class="thememount-proj-noimage"><img src="'.get_template_directory_uri().'/images/noimage-portfolio.png" class="tm-noimg tm-noimg-portfolio"></div>';
			}
		}
	}
	
	
	

	
	
	
	
	// Now preparing output
	if( $pdesign=='nopadding' ){
		// No Padding view
		
		$return .= '
			<div class="portfolio-box tm-box ' . $boxClass . ' ' . implode(' ',$slugs) . ' thememount-box">
				<div class="tm-item">
					<div class="tm-item-thumbnail">
						' . $featuredImg . '
						<div class="icon-overlay"></div>								
						<div class="icons">					
							' . $featuredLink . '
							<a href="' . get_permalink() . '" class="thememount_pf_link"><i class="fa fa-link"></i></a>
						</div>
					</div>
					<div class="tm-item-content">
						<div class="item-content-inner">
							' . $termList . '
							<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>
						</div>
						'.$like.'
					</div>
				</div>
				' . $embedCodeDiv . '
			</div>
		';
		
	} else {
		
		// Default box view
		
		$return .= '
			<div class="portfolio-box tm-box ' . $boxClass . ' ' . implode(' ',$slugs) . ' thememount-box">
				<div class="tm-item">
					<div class="tm-item-thumbnail">
						' . $featuredImg . '
						' . $like . '
					</div>
					<div class="tm-item-content">
						<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>
						' . $termList . '
					</div>
				</div>
				' . $embedCodeDiv . '
			</div>
		';
		
	}
	
	return $return;
	
}
}
/* ********************* Function END ********************* */



/**
 * Bootstrap 3 based columns
 */
if( !function_exists('thememount_translateColumnWidthToSpan') ){
function thememount_translateColumnWidthToSpan($width, $front = true) {
	switch ( $width ) {
		case "1/12" :
			$w = "col-xs-12 col-sm-1 col-md-1 col-lg-1";
			break;
		case "1/6" :
			$w = "col-xs-12 col-sm-2 col-md-2 col-lg-2";
			break;    
		case "1/4" :
			$w = "col-xs-12 col-sm-3 col-md-3 col-lg-3";
			break;
		case "1/3" :
			$w = "col-xs-12 col-sm-4 col-md-4 col-lg-4";
			break;
		case "5/12" :
			$w = "col-xs-12 col-sm-5 col-md-5 col-lg-5";
			break;
		case "1/2" :
			$w = "col-xs-12 col-sm-6 col-md-6 col-lg-6";
			break;
		case "7/12" :
			$w = "col-xs-12 col-sm-7 col-md-7 col-lg-7";
			break;
		case "2/3" :
			$w = "col-xs-12 col-sm-8 col-md-8 col-lg-8";
			break;    
		case "3/4" :
			$w = "col-xs-12 col-sm-9 col-md-9 col-lg-9";
			break;    
		case "5/6" :
			$w = "col-xs-12 col-sm-10 col-md-10 col-lg-10";
			break;
		case "11/12" :
			$w = "col-xs-12 col-sm-11 col-md-11 col-lg-11";
			break;
		case "1/1" :
			$w = "col-xs-12 col-sm-12 col-md-12 col-lg-12";
			break;
		default :
		$w = $width;
	}
	if( function_exists('get_custom_column_class') ){
		$custom = $front ? get_custom_column_class($w): false;
	} else {
		$custom = false;
	}
	return $custom ? $custom : $w;
}
}
/* ********************* Function END ********************* */



/**
 * Team Member Box
 */
if( !function_exists('thememount_teammemberbox') ){
function thememount_teammemberbox( $column='', $linking='yes', $boxdesign='default' ){
	global $post;
	$return   = '';
	$position = esc_attr(get_post_meta( get_the_id(), '_kwayy_team_member_details_position', true ));
	$content  = trim($post->post_content);
	$excerpt  = trim($post->post_excerpt);
	
	
	// Image
	$img = '';
	if( has_post_thumbnail() ){
		$img = get_the_post_thumbnail( get_the_id(), 'full' );
	} else {
		$img = '<div class="thememount-proj-noimage"><img src="'.get_template_directory_uri().'/images/noimage-team.png" class="tm-noimg tm-noimg-team"></div>';
	}
	
	
	/* Title */
	$title = '<a href="'.get_permalink( get_the_ID() ).'">'.get_the_title().'</a>';
	
	$overthumb = '';
	$overthumb = '<span class="overthumb"><i class="tm-social-icon-plus"></i></span>'; 
	$thumbcode = '<a class="tm-team-imglink" href="'.get_permalink().'">'.$img . $overthumb .'</a>';
	
	if( $linking=='no' ){
		$title = get_the_title();
		$thumbcode = $img;
	}
	
	
	
	$boxClass = '';
	switch($column){
		case 'one':
			$boxClass = 'col-lg-12 col-sm-12 col-md-12 col-xs-12';
			break;
		case 'two':
			$boxClass = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
			break;
		case 'three':
			$boxClass = 'col-lg-4 col-sm-6 col-md-4 col-xs-12';
			break;
		case 'four':
			$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'five':
			$boxClass = 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
			break;
		case 'six':
			$boxClass = 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
			break;
	}
	
	
	if( trim($position)!='' ){ $position = '<h4 class="thememount-team-position">'.__($position, 'apicona').'</h4>'; }

	// Team Group
	$categories_list = '';
	if( taxonomy_exists('team_group') ){
		$categories_list = get_the_term_list( get_the_ID(), 'team_group' );
		if( $categories_list!='' ){
			$categories_list = '<div class="thememount-team-cat-links">'.$categories_list.'</div>';
		}
	}
	
	
	// Phone email
	$phone_email = '';
	$phone       = esc_attr(get_post_meta( get_the_id(), '_kwayy_team_member_details_phone', true ));
	$email       = esc_attr(get_post_meta( get_the_id(), '_kwayy_team_member_details_email', true ));
	if( !empty($phone) ){
		$phone_email .= '<div class="thememount-team-phone"><span class="tm-skincolor">'. __('Phone','apicona') .':</span>  <a href="tel:'.$phone.'">'. $phone .'</a></div>';
	}
	if( !empty($email) ){
		$phone_email .= '<div class="thememount-team-email"><span class="tm-skincolor">'. __('E-mail','apicona') .':</span>  <a href="mailto:'. $email .'">'. $email .'</a></div>';
	}
	if( !empty($phone_email) ){
		$phone_email = '<div class="thememount-team-phoneemail">'. $phone_email .'</div>';
	}
	
	
	
	
	// Short description
	$shortdesc = '';
	if( has_excerpt() ){
		$shortdesc .= '<div class="thememount-team-short-desc">';
		$shortdesc .= get_the_excerpt();
		$shortdesc .= '</div><!-- .thememount-team-short-desc -->';
	}
	
	
	
	// Social links
	$socialcode = thememount_team_social();
	
	
	// Box code start
	$return .= "\n\t".'<div class="tm-box '.$boxClass.' tm-box-style-'. $boxdesign .'">';
	
	
	// Box design
	if( $boxdesign=='leftimage' ){
	
	
		$return .= '<div class="thememount-team-box">';
			$return .= '<div class="row">';
				$return .= '<div class="thememount-team-img-left col-md-6">';
					$return .= $thumbcode;	
				$return .= '</div><!-- .thememount-team-img -->';
				$return .= '<div class="thememount-team-data-right col-md-6">';
					$return .= '<div class="thememount-team-data-right-inner">';
						$return .= '<h3 class="thememount-team-title">'.$title.'</h3>';
						$return .= $position;
						$return .= $categories_list;
						$return .= $shortdesc;
						//$return .= $phone_email;
					$return .= '</div>';
					$return .= $socialcode;
				$return .= '</div>';
			$return .= '</div>';
		$return .= '</div>';
		
		
	} else {
		
		$return .= '<div class="thememount-team-box">';
			$return .= '<div class="thememount-team-img">';
				$return .= $thumbcode;	
				$return .= $socialcode;
			$return .= '</div><!-- .thememount-team-img -->';
		
			$return .= '<div class="thememount-team-data">';
				$return .= '<h3 class="thememount-team-title">'.$title.'</h3>';
				$return .= $position;
				$return .= $categories_list;
			$return .= '</div>';
		$return .= '</div>';
			
	}
	
	$return .= "\n\t".'</div>';  // box code end
	
		
	return $return;
}
}
/* ********************* Function END ********************* */



/**
 * Social Links function
 */
if( !function_exists('thememount_team_social') ){
function thememount_team_social( $column='' ){
	$facebook   = trim(get_post_meta( get_the_id(), '_kwayy_team_member_social_links_facebook', true ));
	$twitter    = trim(get_post_meta( get_the_id(), '_kwayy_team_member_social_links_twitter', true ));
	$linkedin   = trim(get_post_meta( get_the_id(), '_kwayy_team_member_social_links_linkedin', true ));
	$googleplus = trim(get_post_meta( get_the_id(), '_kwayy_team_member_social_links_googleplus', true ));
	$instagram  = trim(get_post_meta( get_the_id(), '_kwayy_team_member_social_links_instagram', true ));
	$email      = trim(get_post_meta( get_the_id(), '_kwayy_team_member_details_email', true ));
	
	$socialcode = '';
	if($facebook!=''){   $socialcode .= '<li class="thememount-social-facebook"><a href="'.esc_url($facebook).'" class="hint--top" data-hint="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>'; }
	if($twitter!=''){    $socialcode .= '<li class="thememount-social-twitter"><a href="'.esc_url($twitter).'" class="hint--top" data-hint="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>'; }
	if($linkedin!=''){   $socialcode .= '<li class="thememount-social-linkedin"><a href="'.esc_url($linkedin).'" class="hint--top" data-hint="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>'; }
	if($googleplus!=''){ $socialcode .= '<li class="thememount-social-gplus"><a href="'.esc_url($googleplus).'" class="hint--top" data-hint="Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>'; }
	if($instagram!=''){ $socialcode .= '<li class="thememount-social-instagram"><a href="'.esc_url($instagram).'" class="hint--top" data-hint="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>'; }
	if($email!=''){      $socialcode .= '<li class="thememount-social-email"><a href="mailto:'.sanitize_email($email).'" class="hint--top" data-hint="' . __('Email', 'apicona') . '" ><i class="fa fa-envelope-o"></i></a></li>'; }
	if($socialcode!=''){ $socialcode = '<div class="thememount-team-social-links"><ul>'.$socialcode.'</ul></div>'; }
	
	return $socialcode;
}
}
/* ********************* Function END ********************* */




/**
 * Testimonial Box
 */
if( !function_exists('thememount_testimonialbox') ){
function thememount_testimonialbox( $column='', $boxdesign='default' ){
	
	$return      = '';
	$clienturl   = esc_url( trim(get_post_meta( get_the_id(), '_kwayy_testimonials_details_clienturl', true )) );
	$designation = esc_attr( trim(get_post_meta( get_the_id(), '_kwayy_testimonials_details_designation', true )) );
	
	$boxClass = '';
	if( $boxdesign == 'onecol' ){$column = 'one';}
	
	switch($column){
		case 'one':
			$boxClass = 'col-lg-12 col-sm-12 col-md-12 col-xs-12';
			break;
		case 'two':
			$boxClass = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
			break;
		case 'three':
			$boxClass = 'col-lg-4 col-sm-6 col-md-4 col-xs-12';
			break;
		case 'four':
			$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'five':
			$boxClass = 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
			break;
		case 'six':
			$boxClass = 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
			break;
		case 'five':
			$boxClass = 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
			break;
		case 'six':
			$boxClass = 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
			break;
	}
	
	$iconCode = ( has_post_thumbnail() ) ? '<div class="thememount-testimonial-img">'.get_the_post_thumbnail( get_the_id(), 'thumbnail' ).'</div>'  :  '<span class="thememount-testimonial-icon"><i class="fa fa-quote-left"></i></span>';
			
	if($boxdesign == 'onecol'){
		$return .= "\n\t".'<div class="thememount-testimonial-box tm-box '.$boxClass.'">';
			
			$return .= '<div class="thememount-testimonial-data">';
	
			$return .= '<header>';
				$return .= ' '.$iconCode.' ';
			$return .= '</header>';
			
			
			$return .= '<blockquote class="thememount-testimonial-text">
							<div class="contarea">
								<div class="tm-quote"><i class="fa fa-quote-left"></i></div>															
								<div class="thememount-tst-contarea-text">'.get_the_content('').'</div>	
								<div class="tm-angle"></div>						
							</div>';		
			$return .= '</blockquote>';
			
			$return .= '<footer>';
				$return .= '<cite class="thememount-testimonial-title">';
				$return .= ( $clienturl!='' ) ? '<a href="' . $clienturl . '" target="_blank">' . get_the_title() . '</a>' : get_the_title() ;
				$return .= ( $designation!='' ) ? '<span class="thememount-testimonial-designation">'.$designation.'</span>' : '' ;
				$return .= '</cite>';
			$return .= '</footer>';
			
			$return .= '</div>';
		$return .= "\n\t".'</div>';
		

	}else{
	
		$return .= "\n\t".'<div class="thememount-testimonial-box tm-box '.$boxClass.'">';
			
			$return .= '<div class="thememount-testimonial-data">';
	
			$return .= '<header>';
			$return .= ' '.$iconCode.' ';
			$return .= '<cite class="thememount-testimonial-title">';
			$return .= ( $clienturl!='' ) ? '<a href="' . $clienturl . '" target="_blank">' . get_the_title() . '</a>' : get_the_title() ;
			$return .= ( $designation!='' ) ? '<span class="thememount-testimonial-designation">'.$designation.'</span>' : '' ;
			$return .= '</cite>';
			$return .= '</header>';
			
			
			$return .= '<blockquote class="thememount-testimonial-text">
							<div class="contarea">
								<div class="tm-quote"><i class="fa fa-quote-left"></i></div>															
								<div class="thememount-tst-contarea-text">'.get_the_content('').'</div>	
								<div class="tm-angle"></div>						
							</div>';		
			$return .= '</blockquote>';
			
			
			$return .= '</div>';
		$return .= "\n\t".'</div>';
		
	}
	return $return;
}
}
/* ********************* Function END ********************* */


/* ********************* Add HTTP to url ********************* */
if( !function_exists('thememount_addhttp') ){
	function thememount_addhttp($url){
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)){
			$url = "http://" . $url;
		}
		return $url;
	}
}
/* ********************* Function END ********************* */



/*********** Social Icons links ************/


if( !function_exists('thememount_get_social_links') ){
function thememount_get_social_links(){
	global $apicona;
	$socialArray = array(
		'twitter'    		=> array( 'twitter', 'Twitter' ),
		'youtube'    		=> array( 'youtube', 'YouTube' ),
		'flickr'     		=> array( 'flickr', 'Flickr' ),
		'facebook'   		=> array( 'facebook', 'Facebook' ),
		'linkedin'   		=> array( 'linkedin', 'LinkedIn' ),
		'googleplus' 		=> array( 'gplus', 'Google+' ),
		'yelp'       		=> array( 'yelp', 'Yelp' ),
		'dribbble'   		=> array( 'dribbble', 'Dribbble' ),
		'pinterest'  		=> array( 'pinterest', 'Pinterest' ),
		'podcast'    		=> array( 'podcast', 'Podcast' ),
		'instagram'  		=> array( 'instagram', 'Instagram' ),
		'xing'       		=> array( 'xing', 'Xing' ),
		'vimeo'      		=> array( 'vimeo', 'Vimeo' ),
		'vk'         		=> array( 'vk', 'VK' ),
		'houzz'      		=> array( 'houzz', 'Houzz' ),
		'issuu'      		=> array( 'issuu', 'Issuu' ),
		'google-drive' 		=> array( 'google-drive', 'Google Drive' ),
		'tripadvisor' 		=> array( 'tripadvisor', 'TripAdvisor' ),
		'stumbleupon' 		=> array( 'stumbleupon', 'StumbleUpon' ),
		'delicious' 		=> array( 'delicious', 'Delicious' ),
		'tumblr' 			=> array( 'tumblr', 'Tumblr' ),
		'odnoklassniki' 	=> array( 'odnoklassniki', 'Odnoklassniki' ),
		'rss'        		=> array( 'rss', 'RSS' ),
	);
	
	$return = '';
	foreach( $socialArray as $key=>$value ){
		
		if( $key == 'rss' ){
			if( isset($apicona['rss']) && $apicona['rss']=='1' ){
				$return .= '<li class="'.$key.'"><a target="_blank" href="'.get_bloginfo('rss2_url').'" class="hint--bottom" data-hint="'.$value[1].'"><i class="tm-social-icon-'.$value[0].'"></i></a></li>';
			}
		} else {
			if( isset($apicona[$key]) && trim($apicona[$key])!='' ){
				$return .= '<li class="'.$key.'"><a target="_blank" href="'.esc_url($apicona[$key]).'" class="hint--bottom" data-hint="'.$value[1].'"><i class="tm-social-icon-'.$value[0].'"></i></a></li>';
			}
		}
	}
	
	if( $return!='' ){
		$return = '<ul class="social-icons">'.$return.'</ul>';
	}
	
	return $return;
}
}

/*************** End of Social Icon links ******************/



/******************** CSS Parser *********************/

function thememountCheckBGImage($css){
	$return = false;
	
	if( trim($css)!='' ){
		
		// Check if background image exists
		$newCSS = str_replace( 'http://', 'http//', $css );

		// Removing breackets
		$newCSS = explode('{', $newCSS);
		$newCSS = explode('}', $newCSS[1]);
		$newCSS = $newCSS[0];

		// Filtering background properties
		$newCSS = explode(';', $newCSS);

		foreach( $newCSS as $css ){
			$x = '';
			$x = explode(':', $css);
			if( $x[0] == 'background' ){
				if (strpos($x[1] , 'url(') !== false) {
					$return = true;
				}
			} else if( $x[0] == 'background-image' ){
				$return = true;
			}
		}
	}
	
	return $return;
}

/******************************************************/




/************************* Header Slider ************************/
if( !function_exists('thememount_header_slider') ){
function thememount_header_slider(){
	
	if( is_page() || is_home() ){
		
		$sliderWrapperStart = '<div id="tm-header-slider" class="thememount-slider-wrapper">';
		$sliderWrapperEnd   = '</div>';
		$pageid = '';
		if( is_page() ){
			$pageid = get_the_ID();
		} else if( is_home() ) {
			$pageid = get_option('page_for_posts');
		}
		
		// check if any slider setup on page
		$sliderType = get_post_meta($pageid, '_kwayy_page_options_slidertype', true);
		if(isset($sliderType) && is_array($sliderType) ){ $sliderType = $sliderType[0]; }
		
		
		
		// If Boxed Slider set
		$sliderSize = get_post_meta($pageid, '_kwayy_page_options_slidersize', true);
		if(isset($sliderSize) && is_array($sliderSize) ){ $sliderSize = $sliderSize[0]; }
		if( $sliderSize=='boxed' ){
			$sliderWrapperStart .= '<div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
			$sliderWrapperEnd   .= '</div></div></div>';
		}
		
		if( $sliderType!='' ){
			switch($sliderType){
				case 'revslider':
					// **** Slider Revolution **** //
					$revSliderAlias = trim(get_post_meta($pageid, '_kwayy_page_options_revslider_slider', true));
					if( $revSliderAlias!='' ){
						echo $sliderWrapperStart;
						echo do_shortcode('[rev_slider '.$revSliderAlias.']');
						echo $sliderWrapperEnd;
					}
					break;
				
				
				case 'nivo':
				case 'flex':	
					
					$slidercat     = get_post_meta( $pageid ,'_kwayy_page_options_slidercat', true );
					$slideroptions = trim(get_post_meta( $pageid ,'_kwayy_page_options_slideroptions', true ));
					if($slideroptions!=''){ $slideroptions='{'.$slideroptions.'}'; };
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					$slideroptions = str_replace('"',"'",$slideroptions);
					
					
					$args = array(
						'post_type'      => 'slide',
						'posts_per_page' => 9999,
						'tax_query'      => array(
							array(
								'taxonomy' => 'slide_group',
								'field' => 'slug',
								'terms' => $slidercat
							),
						)
					);
					$loop = new WP_Query( $args );
					
					/* Restore original Post Data */
					wp_reset_postdata();
					
					if( isset($loop->posts) && count($loop->posts)>0 ){
						echo $sliderWrapperStart;
						if( $sliderType=='flex' ){
							echo '<div class="flexslider"><ul class="slides">';
						} else {
							echo '<div class="thememount-slider thememount-'.$sliderType.'-slider-wrapper"> <div class="slider-wrapper theme-default"> <div id="slider" class="nivoSlider-wrapper">';
						}
						
						$x = 1;
						$descText = '';
						while ( $loop->have_posts() ) : $loop->the_post();
							
							// Getting data
							$title   = esc_attr( trim(get_the_title()) );
							$desc    = esc_attr( trim(get_post_meta( get_the_ID(), '_kwayy_slides_options_desc', true )) );
							$btntext = esc_attr( trim(get_post_meta( get_the_ID(), '_kwayy_slides_options_btntext', true )) );
							$btnlink = esc_url( trim(get_post_meta( get_the_ID(), '_kwayy_slides_options_btnlink', true )) );
						
							$desc    = ( $desc!='' ) ? '<div class="thememount-slider-desc">'.$desc.'</div>' : '' ;
							$btntext = ( $btntext!='' ) ? do_shortcode('[vc_button title="'.$btntext.'" icon="right-open" color="white" size="big" href="'.$btnlink.'" el_class="" btn_effect="bordertocolor" iconposition="right" showicon="withicon"]') : '' ;
							
							
							if( has_post_thumbnail() ){
								$url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
							} else {
								$url = 'no-image.jpg';
							}
							
							
							if( $sliderType=='nivo' ){
								// **** Nivo Slider **** //
								echo '<img src="'.$url.'" alt="" title="#nivoslidetext'.$x.'" />';
								$descText .= '<div id="nivoslidetext'.$x.'" class="nivo-html-caption"><h2>'.$title.'</h2>'.$desc.$btntext.'</div>';
								
							} else {
								// **** Flex Slider **** //
								echo '<li><img src="'.$url.'" />';
								if( $title!='' ){ echo '<div class="flex-caption"><div class="flex-caption-inner"><h3 class="flex-caption-title">'.$title.'</h3><div class="flex-caption-desc">'.$desc.'</div><div class="flex-caption-btn">'.$btntext.'</div></div></div>'; }
								echo '</li>';
							}
							$x++;
						endwhile;
						
						if( $sliderType=='flex' ){
							// **** Flex Slider **** //
							echo '</ul><!-- .slides --> </div><!-- .flexslider -->';
							
							// Flex Slider JS call
							$defaultSlideroptions = '{ animation:"slide", controlNav:false, directionNav:true, start:function(){ thememount_blogmasonry(); } }';
							
							$defaultSlideroptions='{ animation:"slide",controlNav:false }';
							
							// Setting default values if no custom options written
							if( trim($slideroptions)=='' || trim($slideroptions)=='{}' ){
								$slideroptions = $defaultSlideroptions;
							} 
							
							echo '<script type="text/javascript">
								jQuery( document ).ready(function() {
									jQuery(".thememount-slider-wrapper .flexslider").flexslider('.$slideroptions.');
								});
							</script>';
							
							
						} else {
							// **** Nivo Slider **** //
							echo '</div><!-- #slider.nivoSlider -->';
							// Echo Decription of each slide
							echo '<div id="htmlcaption" class="nivo-html-caption">'.$descText.'</div>';
							echo '</div><!-- .slider-wrapper --> </div><!-- .thememount-slider --> ';
							
							echo '<script type="text/javascript">
								jQuery( document ).ready(function() {
									jQuery(".thememount-slider-wrapper .nivoSlider-wrapper").nivoSlider('.$slideroptions.');
								});
								</script>';
						}
						
						echo $sliderWrapperEnd;
						
					}  // if( count($loop->posts)>0 )
					
					/* Restore original Post Data */
					wp_reset_postdata();
				
					break;
					
				case 'other':
					
					$custom_slider = trim(get_post_meta(get_the_ID(), '_kwayy_page_options_slider_others', true));
					if( $custom_slider!='' ){
						echo $sliderWrapperStart;
						echo do_shortcode($custom_slider);
						echo $sliderWrapperEnd;
					}
					
					break;
			}
		}

	}
}
}
/*****************************************************************/


/*
 *  Pre Loader image
 */
if( !function_exists('thememount_preloader') ){
function thememount_preloader(){
	global  $apicona;
	$return = '';
	$img    = '';
	
	// Check if pre-defined image is selected 
	if( !empty($apicona['loaderimg']) && $apicona['loaderimg']!='custom' && $apicona['loaderimg']!='no' ){
		$img = get_template_directory_uri().'/images/loader'. $apicona['loaderimg'] .'.gif';
	}
	
	// check if custom image for preloader is selected
	if( $apicona['loaderimg']=='custom' && !empty($apicona['loaderimage_custom']['url']) ){
		$img = $apicona['loaderimage_custom']['url'];
	}
	
	
	if( $img!='' ){
		$return = '<div class="tm-page-loader-wrapper" style="background: #fff url(\''. $img .'\') no-repeat center center"></div>';
	}
	
	return $return;
}
}





/*
 *  Floating bar
 */
if( !function_exists('thememount_floatingbar') ){
function thememount_floatingbar(){
	global $apicona;
	$optionsArray = array(
						'fbar_show',
						'fbar_bg_color',
						'fbar_bg_custom_color',
						'fbar_text_color',
						'fbar_text_custom_color',
						'fbar_background',
						'topbar_handler_icon',
						'topbar_handler_icon_close',
						'fbar_btn_bg_color',
						'fbar_icon_color',
	);
	
	// Creating variables
	foreach( $optionsArray as $option ){
		$fbar_opt = '';
		if( isset($apicona[$option]) ){
			if( !is_array($apicona[$option]) ){  // bypassing color value which is array by default
				$fbar_opt = esc_attr($apicona[$option]);
			} else {
				$fbar_opt = $apicona[$option];
			}
		}
		$$option = $fbar_opt;
	}
	
	
	// Check if floating bar is enabled
	if( $fbar_show ){
		
		// Inline style
		$inlineStyleAll  = '';
		$inlineStyle     = '';
		$inlineStyle_a   = '';
		$inlineStyle_ah  = '';
		$inlineStyle_h   = '';
		$inlineStyle_border   = '';
		
		// Doctor search form
		$team_search_form = '';
		if( isset($apicona['topbar_show_team_search']) && trim($apicona['topbar_show_team_search'])=='1' ){
			
			$title = ( isset($apicona['fbar-form-title']) ) ? trim($apicona['fbar-form-title']) : 'Doctor&#39;s Search';
			
			$form_desc = ( isset($apicona['fbar-form-desc']) ) ? trim($apicona['fbar-form-desc']) : 'Search Team Members by name and also by section';
			
			$search = ( isset($apicona['fbar-form-input-text']) ) ? trim($apicona['fbar-form-input-text']) : 'Search by name';
		
			$submit_btn = ( isset($apicona['fbar-form-btn-text']) ) ? trim($apicona['fbar-form-btn-text']) : 'Search';
			
			$form_type = 'vertical';
			
			$selectplaceholder = ( isset($apicona['fbar-form-select-group']) ) ? trim($apicona['fbar-form-select-group']) : 'All sections';
			
			$team_search_form = thememount_team_search_form( $title, $form_desc, $search, $submit_btn, $form_type, $selectplaceholder );
		}
		
		// Custom Background color RGB
		if( $fbar_bg_color=='custom' && isset($fbar_bg_custom_color['rgba']) ){
			$inlineStyleAll .= '.thememount-fbar-box-w:after{background-color:'.$fbar_bg_custom_color['rgba'].';}';
		}
		
		// Custom Text Color
		if( $fbar_text_color=='custom'&& trim($fbar_text_custom_color)!='' ){
			$inlineStyle    .= 'color: rgba( ' . tm_hex2rgb($fbar_text_custom_color) . ', 0.7)';
			$inlineStyle_a  .= 'color: rgba( ' . tm_hex2rgb($fbar_text_custom_color) . ', 1)';
			$inlineStyle_ah .= 'color: rgba( ' . tm_hex2rgb($fbar_text_custom_color) . ', 0.7)';
			$inlineStyle_h  .= 'color: rgba( ' . tm_hex2rgb($fbar_text_custom_color) . ', 1)';
			$inlineStyle_border  .= 'border-color: rgba( ' . tm_hex2rgb($fbar_text_custom_color) . ', 0.7)';
		}
		
		
		if( $inlineStyle!='' ){
			$inlineStyleAll .= '
			.thememount-fbar-box-w *, .tm-wrap-cell.tm-fbar-input .search_field.selectbox:after, .thememount-fbar-box .search_field select, .thememount-content-team-search-box .search_field select, .thememount-fbar-box .search_field i, .thememount-content-team-search-box .search_field i {'.$inlineStyle.'}
			.thememount-fbar-box-w a, .widget_calendar #today{'.$inlineStyle_a.'}
			.thememount-fbar-box-w a:hover{'.$inlineStyle_ah.'}
			.thememount-fbar-box-w .widget .widget-title{'.$inlineStyle_h.'}
			.thememount-fbar-box-w .widget .widget-title, .thememount-fbar-box-w .widget_calendar table, .thememount-fbar-box-w .widget_calendar th, .thememount-fbar-box-w .widget_calendar td, .thememount-fbar-box .search_field, .contact-info{'.$inlineStyle_border.'}
			';
		}
		
		if( $inlineStyleAll!='' ){
			$inlineStyleAll = '<style scoped>'.$inlineStyleAll.'</style>';
		}
		
		
		// Bg image class
		$bgclass = 'tm-fbar-without-bgimage';
		if( isset($apicona['fbar_background']['background-image']) && trim($apicona['fbar_background']['background-image'])!='' ){
			$bgclass = 'tm-fbar-with-bgimage';
		}
		
		
		// If Topbar bg color is set to SKIN color than set the icon color with grey or dark-grey color so it will be visible
		$arrowbgcolorclass = '';
		if( isset($apicona['topbarbgcolor']) && trim($apicona['topbarbgcolor'])=='skincolor' ){
			$arrowbgcolorclass = 'tm-fbar-btn-bgnoskin';
		}
		
		echo '<div>';
		echo $inlineStyleAll;
		
		// Trigger background and icon color
		$fbarbtnclass    = '';
		if($fbar_btn_bg_color!='' || $fbar_icon_color!=''){
			$fbarbtnclass  = ' tm-fbar-bg-color-'.$fbar_btn_bg_color;
			$fbarbtnclass .= ' tm-fbar-icon-color-'.$fbar_icon_color;
		}
		
		
		
		
		// Floatingbar position
		$fbar_position = !empty($apicona['fbar_position']) ? $apicona['fbar_position'] : 'default' ;
		
		
		// Button
		$fbar_btn_top   = '<span class="thememount-fbar-btn '. $arrowbgcolorclass.$fbarbtnclass .'">
                    <a href="#" data-closeicon="kwicon-'. $topbar_handler_icon_close .'" data-openicon="kwicon-'. $topbar_handler_icon .'"><i class="kwicon-'. $topbar_handler_icon .'"></i>  <span>'. __('Open', 'apicona') .'</span></a>
                </span>';
		$fbar_btn_right = '';
		if( $fbar_position == 'right' ){
			$fbar_btn_top   = '';
			$fbar_btn_right = '<span class="thememount-fbar-btn '. $arrowbgcolorclass.$fbarbtnclass .'">
                    <a href="#" data-closeicon="kwicon-'. $topbar_handler_icon_close .'" data-openicon="kwicon-'. $topbar_handler_icon .'"><i class="kwicon-'. $topbar_handler_icon .'"></i>  <span>'. __('Open', 'apicona') .'</span></a>
                </span>';
		}
		
		
		?>
		
		<div class="thememount-fbar-main-w thememount-fbar-position-<?php echo $fbar_position; ?>">
		
			<?php echo $fbar_btn_top; ?>

			<div class="thememount-fbar-box-w thememount-fbar-text-<?php echo $fbar_text_color; ?> thememount-fbar-bg-<?php echo $fbar_bg_color; ?> <?php echo $bgclass; ?>" >
				
				<?php echo $fbar_btn_right; ?>
			
				<div class="container thememount-fbar-box" style="">
				<?php echo $team_search_form; ?>
				  <div class="row multi-columns-row">
					<?php if( !dynamic_sidebar( 'floating-header-widgets' ) ){
						/*echo '<div class="thememount-no-widget-message">';
						_e('We don\'t find any widget to show. Please add some widgets by going to <strong>Admin > Appearance > Widgets</strong> and add widgets in <strong>"Floating Header Widgets "</strong> area.','apicona');
						echo '</div>';*/
					} ?>
				  </div>
				</div>
			</div>
		
		</div>
		
		</div>
		<?php
	}
	
}
}

/********************** Floating bar end ************************/



/********************** Topbar *************************/
if( !function_exists('thememount_topbar') ){
function thememount_topbar(){
	

	global $apicona;
	
	$optionsArray = array(
		'topbarhide',
		'topbarbgcolor',
		'topbarbgcustomcolor',
		'topbar_text_color',
		'topbartextcustomcolor',
		'topbartext',
		'topbarrighttext',
	);
	
	// Global options
	foreach( $optionsArray as $option ){
		if( $option=='topbartext' || $option=='topbarrighttext' ){
			$tbaropt = wp_kses( /* HTML Filter */
				$apicona[$option],
				array(
					'a' => array(
						'href'  => array(),
						'title' => array(),
						'class' => array()
					),
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
					'span'   => array(
						'class'  => array(),
					),
					'ol'     => array(),
					'ul'     => array(
						'class'  => array(),
					),
					'li'     => array(
						'class'  => array(),
					),
					'i'     => array(
						'class'  => array(),
					),
				)
			);
			
		} else if( !is_array($apicona[$option]) ){  // Bypassing color which is as array
			$tbaropt = esc_attr($apicona[$option]);
			
		} else {
			$tbaropt = $apicona[$option];
		}
		${$option} = $tbaropt;
	}
	
	
	// Page options
	if( is_page() ){
		foreach( $optionsArray as $option ){
			${'page_'.$option} = trim( get_post_meta( get_the_ID(), '_kwayy_page_options_'.$option, true ) );
		}
		
		// this is page topbar left text
		$page_topbarlefttext	=  trim( get_post_meta( get_the_ID(), '_kwayy_page_options_topbarlefttext', true ) );
		$page_topbarhide     	= trim( get_post_meta( get_the_ID(), '_kwayy_page_options_show_topbar', true ) );
		$page_topbar_text_color = trim( get_post_meta( get_the_ID(), '_kwayy_page_options_topbartextcolor', true ) );
		
		// Show / Hide Topbar, passing reverse value. 
		if( $page_topbarhide == '0'  ){
			$topbarhide = '1';
		}else if( $page_topbarhide == '1' ){
			$topbarhide = '0';
		}
		
		
		// Background color
		if( $page_topbarbgcolor!='' ){
			$topbarbgcolor = $page_topbarbgcolor;
			if( $page_topbarbgcolor=='custom' ){
				$topbarbgcustomcolor = $page_topbarbgcustomcolor;
			}
		}
		
		// Text Color
		if( $page_topbar_text_color!='' ){
			$topbar_text_color = $page_topbar_text_color;
			if( $page_topbar_text_color=='custom' ){
				$topbartextcustomcolor = $page_topbartextcustomcolor;
			}
		}
		
		// Left Content
		if( $page_topbarlefttext!='' ){
			$topbartext = $page_topbarlefttext;
		}
		
		// Right Content
		if( $page_topbarrighttext!='' ){
			$topbarrighttext = $page_topbarrighttext;
		}
		
	} else if( is_home() ) {
		$pageid = get_option('page_for_posts');
		foreach( $optionsArray as $option ){
			${'blog_'.$option} = trim( get_post_meta( $pageid, '_kwayy_page_options_'.$option, true ) );
		}
		
		// this is blog page settings
		$blog_topbarhide     	= trim( get_post_meta( $pageid, '_kwayy_page_options_show_topbar', true ) );
		$blog_topbar_text_color = trim( get_post_meta( $pageid, '_kwayy_page_options_topbartextcolor', true ) );
		$blog_topbarlefttext 	= trim( get_post_meta( $pageid, '_kwayy_page_options_topbarlefttext', true ) );
		
		// Show / Hide Topbar, passing reverse value. 
		if( $blog_topbarhide == '0'  ){
			$topbarhide = '1';
		}else if( $blog_topbarhide == '1' ){
			$topbarhide = '0';
		}
		
		// Background color
		if( $blog_topbarbgcolor!='' ){
			$topbarbgcolor = $blog_topbarbgcolor;
			if( $blog_topbarbgcolor=='custom' ){
				$topbarbgcustomcolor = $blog_topbarbgcustomcolor;
			}
		}
		
		// Text Color
		if( $blog_topbar_text_color!='' ){
			$topbar_text_color = $blog_topbar_text_color;
			if( $blog_topbar_text_color=='custom' ){
				$topbartextcustomcolor = $blog_topbartextcustomcolor;
			}
		}
		
		// Left Content
		if( $blog_topbarlefttext!='' ){
			$topbartext = $blog_topbarlefttext;
		}
		
		// Right Content
		if( $blog_topbarrighttext!='' ){
			$topbarrighttext = $blog_topbarrighttext;
		}
		
	}
	
	
	// Inline style
	$inlineStyle    = '';
	$inlineStyle_a  = '';
	$inlineStyle_ah = '';
	if( $topbarbgcolor=='custom'&& trim($topbarbgcustomcolor)!='' ){
		$inlineStyle .= 'background-color:'.$topbarbgcustomcolor.' !important;';
	}
	if( $topbar_text_color=='custom'&& trim($topbartextcustomcolor)!='' ){
		$inlineStyle    .= 'color:'.$topbartextcustomcolor.' !important;';
		$inlineStyle_a  .= 'color: rgba( ' . tm_hex2rgb($topbartextcustomcolor) . ', 0.7) !important;';
		$inlineStyle_ah .= 'color:'.$topbartextcustomcolor.' !important;';
	}
	
	
	// Preparing custom CSS
	$customStyle = '';
	if( trim($inlineStyle)!='' || trim($inlineStyle_a)!='' || trim($inlineStyle_ah)!='' ){
		$customStyle .= '<style type="text/css" scoped>';
		if( trim($inlineStyle)!='' )    { $customStyle .= '.thememount-topbar, .thememount-topbar .top-contact i{'.$inlineStyle.'}'; }
		if( trim($inlineStyle_a)!='' )  { $customStyle .= '.thememount-topbar a{'.$inlineStyle_a.'}'; }
		if( trim($inlineStyle_ah)!='' ) { $customStyle .= '.thememount-topbar a:hover{'.$inlineStyle_ah.'}'; }
		$customStyle .= '</style>';
	}
	
	
	if( $topbarhide=='0' ){
		global $apicona;
		$return       = '';

		$leftContent  = do_shortcode($topbartext);
		$rightContent = do_shortcode($topbarrighttext);
		
		
		if( trim($rightContent) == '' ){
			$return .= '<div class="tm-center-content">';
			$return .= '<div class="thememount-tb-left-content thememount-center">'.$leftContent.'</div>';
			$return .= '</div>';
		} else {
			$return .= '<div class="table-row">';
			$return .= '<div class="thememount-tb-left-content thememount-flexible-width-left">'.$leftContent.'</div>';
			$return .= '<div class="thememount-tb-right-content thememount-flexible-width-right">'.$rightContent.'</div>';
			$return .= '</div> <!-- .table-row -->';
		}
		
		echo '<div>';
		echo $customStyle; // custom style
		echo '
			<div class="thememount-topbar thememount-topbar-textcolor-'.$topbar_text_color.' thememount-topbar-bgcolor-'.$topbarbgcolor.'">
				<div class="container">					
						'.$return.'					
				</div>
			</div>';
		echo '</div>';
		
	}
}
}
/*************************** Topbar end*************************/





/*
 *  Header dynamic class for different settings
 */
function thememount_headerclass(){
	global $apicona;
	$headerClassList = array();
	
	// Main Menu active link color
	if( isset($apicona['mainmenu_active_link_color']) && trim($apicona['mainmenu_active_link_color'])!='' ){
		$headerClassList[] = 'tm-mmenu-active-color-'.sanitize_html_class($apicona['mainmenu_active_link_color']);
	} else {
		$headerClassList[] = 'tm-mmenu-active-color-skin';
	}
	
	// Dropdown Menu active link color
	if( isset($apicona['dropmenu_active_link_color']) && trim($apicona['dropmenu_active_link_color'])!='' ){
		$headerClassList[] = 'tm-dmenu-active-color-'.sanitize_html_class($apicona['dropmenu_active_link_color']);
	} else {
		$headerClassList[] = 'tm-dmenu-active-color-skin';
	}
	
	// Dropdown Menu separator
	if( isset($apicona['dropdown_menu_separator']) && trim($apicona['dropdown_menu_separator'])!='' ){
		$headerClassList[] = 'tm-dmenu-sep-'.sanitize_html_class($apicona['dropdown_menu_separator']);
	} else {
		$headerClassList[] = 'tm-dmenu-sep-grey';
	}
	
	// Dropdown Menu Vertical separator
	if( isset($apicona['dropdown_menu_separator_vertical']) && trim($apicona['dropdown_menu_separator_vertical'])!='' ){
		$headerClassList[] = 'tm-dmenu-v-sep-'.sanitize_html_class($apicona['dropdown_menu_separator_vertical']);
	} else {
		$headerClassList[] = 'tm-dmenu-v-sep-grey';
	}
	
	return implode(' ', $headerClassList);
}


/*
 *  One page site
 */
if( !function_exists('thememount_one_page_site') ){
function thememount_one_page_site(){
	global $apicona;
	if( isset($apicona['one_page_site']) && $apicona['one_page_site']=='1' ){
	?>
	
	<script type="text/javascript">
		var x = 1;
		jQuery('.mega-menu a, .menu-main-menu-container a').each(function(){
			if( x != 1 ){
				jQuery(this).parent().removeClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
			}
			x = 0;
		});
	</script>
	
	<?php
	}
}
}






/*
 *  Titlebar 
 */
if( !function_exists('thememount_header_titlebar') ){
function thememount_header_titlebar(){
	global $apicona;
	global $wp_query;
	$inlineStyle    = '';
	$inlineCSS      = '';
	$hidetitlebar   = false;
	$hidebreadcrumb = false;
	$subtitle       = '';
	
	
	// Working perfectly
	$hidebreadcrumb             = esc_attr($apicona['tbar_hide_bcrumb']);
	$titlebar_bg_color          = esc_attr($apicona['titlebar_bg_color']);
	$titlebar_text_color        = esc_attr($apicona['titlebar_text_color']);
	$titlebar_view              = esc_attr($apicona['titlebar_view']);  // Text Align
	
	$titlebar_bg_custom_color   = $apicona['titlebar_bg_custom_color'];  // We are not escaping this because this is array
	$titlebar_text_custom_color = esc_attr($apicona['titlebar_text_custom_color']);
	$titlebar_bg_color_type     = 'rgb';
	$titlebar_background        = $apicona['titlebar_background'];  // We are not escaping this because this is array
	
	
	if( is_page() ){ // Page
	
		$hidetitlebar   = esc_attr(get_post_meta( get_the_ID(), '_kwayy_page_options_hidetitlebar', true ));
		$title          = esc_attr( trim(get_post_meta( get_the_ID(), '_kwayy_page_options_title', true)) );
		$subtitle       = esc_attr( trim(get_post_meta( get_the_ID(), '_kwayy_page_options_subtitle', true)) );
		$hidebreadcrumb = esc_attr(get_post_meta( get_the_ID(), '_kwayy_page_options_hidebreadcrumb', true));
		$title  = ( $title != '' ? $title : get_the_title( get_the_ID() ) );
		
		$page_titlebar_bg_custom_image = wp_get_attachment_image_src(get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_bg_custom_image', true) , 'full' );
	
		
		/*********************/
		$titlebar_bg_color = ( get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_bg_color', true)!='' ) ?  esc_attr(get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_bg_color', true)) : $titlebar_bg_color ;
		$titlebar_text_color = ( get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_text_color', true)!='' ) ?  esc_attr(get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_text_color', true)) : $titlebar_text_color ;
		$titlebar_view = ( get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_view', true)!='' ) ? esc_attr(get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_view', true)) : $titlebar_view ;
		
		
		if( get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_text_color', true)=='custom' ){
			$titlebar_text_custom_color = ( get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_text_custom_color', true)!='' ) ? esc_attr(get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_text_custom_color', true)) : $titlebar_text_custom_color ;
		}
		
		if( get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_bg_color', true)=='custom' ){
			$titlebar_bg_custom_color = ( get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_bg_custom_color', true)!='' ) ? esc_attr(get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_bg_custom_color', true)) : $titlebar_bg_custom_color ;
			$titlebar_bg_color_type     = 'hex';
		}
		
		
		$titlebar_bg_custom_image = ( get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_bg_custom_image', true)!='' ) ? esc_attr(get_post_meta( get_the_ID(), '_kwayy_page_options_titlebar_bg_custom_image', true)) : '' ;
		

		
		/***********************/
		
		
	} else if( function_exists('is_woocommerce')  && is_woocommerce() ){ // WooCommerce
		$hidetitlebar   = '';
		$title          = '';
		$subtitle       = '';
		$hidebreadcrumb = '';
		//$icon           = '';
		
		if ( is_search() ) {
			$title = sprintf( __( 'Search Results: &ldquo;%s&rdquo;', 'apicona' ), get_search_query() );
			if ( get_query_var( 'paged' ) ){
				$title .= sprintf( __( '&nbsp;&ndash; Page %s', 'apicona' ), get_query_var( 'paged' ) );
			}
		} elseif ( is_tax() ) {
			$title = single_term_title( "", false );
		} else {
			$shop_page_id = wc_get_page_id( 'shop' ); // Getting shop page ID
			
			$hidetitlebar   = esc_attr(get_post_meta( $shop_page_id, '_kwayy_page_options_hidetitlebar', true ));
			$title          = esc_attr( trim(get_post_meta( $shop_page_id, '_kwayy_page_options_title', true)) );
			$subtitle       = esc_attr( trim(get_post_meta( $shop_page_id, '_kwayy_page_options_subtitle', true)) );
			$hidebreadcrumb = esc_attr(get_post_meta( $shop_page_id, '_kwayy_page_options_hidebreadcrumb', true));
			$title  = ( $title != '' ? $title : esc_attr(get_the_title( $shop_page_id )) );
			
			$page_titlebar_bg_image        = esc_attr(get_post_meta( $shop_page_id, '_kwayy_page_options_titlebar_bg_image', true));
			
			
			
			$page_titlebar_bg_custom_image_id = get_post_meta( $shop_page_id, '_kwayy_page_options_titlebar_bg_custom_image', true);
			$page_titlebar_bg_custom_image = '';
			if( trim($page_titlebar_bg_custom_image_id)!='' ){
				$titlebar_bg_custom_image = $page_titlebar_bg_custom_image_id;
			}
			
			
			
		}
		$woocommerce_Active = true;
		
	} else if( is_home() ){ // Blogroll
		if( get_option('page_for_posts') == 0 ){
			$hidetitlebar   = true;
		} else {
			$page_id        = get_option('page_for_posts');
			$hidetitlebar   = esc_attr(get_post_meta( $page_id, '_kwayy_page_options_hidetitlebar', true ));
			$title          = esc_attr( trim(get_post_meta( $page_id, '_kwayy_page_options_title', true)) );
			$subtitle       = esc_attr( trim(get_post_meta( $page_id, '_kwayy_page_options_subtitle', true)) );
			$hidebreadcrumb = esc_attr(get_post_meta( $page_id, '_kwayy_page_options_hidebreadcrumb', true ));
			$title          = ( $title != '' ? $title : esc_attr(get_the_title( $page_id )) );
			
			$page_titlebar_bg_image        = esc_attr(get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_image', true));
			$page_titlebar_bg_custom_image = wp_get_attachment_image_src(get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_custom_image', true) , 'full' );
			
			// Page option overriding global options : Predefined image
			if( $page_titlebar_bg_image!='' && $page_titlebar_bg_image!='global' && $page_titlebar_bg_image!='custom' ){
				$titlebar_bg_image_type = 'image';
				$titlebar_bg_image      = $page_titlebar_bg_image;
			}
			
			// Page option overriding global options : Custom image
			if( $page_titlebar_bg_image == 'custom' ){
				$titlebar_bg_image_type   = 'custom';
				if( isset($page_titlebar_bg_custom_image[0]) && $page_titlebar_bg_custom_image[0]!='' ){
					$page_titlebar_bg_custom_image[0] = esc_url($page_titlebar_bg_custom_image[0]);
				}
				$titlebar_bg_custom_image = @$page_titlebar_bg_custom_image[0];
			}
			
			
			/*********************/
			$titlebar_bg_color = ( get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_color', true)!='' ) ?  esc_attr(get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_color', true)) : $titlebar_bg_color ;
			$titlebar_text_color = ( get_post_meta( $page_id, '_kwayy_page_options_titlebar_text_color', true)!='' ) ? esc_attr(get_post_meta( $page_id, '_kwayy_page_options_titlebar_text_color', true)) : $titlebar_text_color ;
			$titlebar_view = ( get_post_meta( $page_id, '_kwayy_page_options_titlebar_view', true)!='' ) ?  esc_attr(get_post_meta( $page_id, '_kwayy_page_options_titlebar_view', true)) : $titlebar_view ;
			
			if( get_post_meta( $page_id, '_kwayy_page_options_titlebar_text_color', true)=='custom' ){
				$titlebar_text_custom_color = ( get_post_meta( $page_id, '_kwayy_page_options_titlebar_text_custom_color', true)!='' ) ?  esc_attr(get_post_meta( $page_id, '_kwayy_page_options_titlebar_text_custom_color', true)) : $titlebar_text_custom_color ;
			}
			if( get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_color', true)=='custom' ){
				$titlebar_bg_custom_color = ( get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_custom_color', true)!='' ) ? esc_attr(get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_custom_color', true)) : $titlebar_bg_custom_color ;
				$titlebar_bg_color_type     = 'hex';
			}
			
			$titlebar_bg_custom_image = ( get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_custom_image', true)!='' ) ? esc_attr(get_post_meta( $page_id, '_kwayy_page_options_titlebar_bg_custom_image', true)) : '' ;
			
			/***********************/
				
			
		}
	} else if( is_single() ){ // Single Post
		$postType = esc_attr(get_post_type( get_the_ID() ));
		
		switch($postType){
			case 'post':
				//$page_for_posts = get_option('page_for_posts');
				$hidetitlebar   = esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_hidetitlebar', true ));
				$customtitle    = esc_attr( trim(get_post_meta( get_the_ID(), '_kwayy_post_options_title', true)) );
				$rawtitle       = esc_attr(get_the_title( get_the_ID() ));
				$title          = ($customtitle=='') ? $rawtitle : $customtitle ;
				$subtitle       = esc_attr( trim(get_post_meta( get_the_ID(), '_kwayy_post_options_subtitle', true)) );
				$hidebreadcrumb = esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_hidebreadcrumb', true));
				$title          = ( $title != '' ? $title : get_the_title( get_the_ID() ) );
				
				/*********************/
				$titlebar_bg_color = ( get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_color', true)!='' ) ?  esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_color', true))  : $titlebar_bg_color ;
				$titlebar_text_color = ( get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_text_color', true)!='' ) ?  esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_text_color', true))  : $titlebar_text_color ;
				$titlebar_view = ( get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_view', true)!='' ) ?  esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_view', true))  : $titlebar_view ;
				
				if( get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_text_color', true)=='custom' ){
					$titlebar_text_custom_color = ( get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_text_custom_color', true)!='' ) ?  esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_text_custom_color', true))  : $titlebar_text_custom_color ;
				}
				if( get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_color', true)=='custom' ){
					$titlebar_bg_custom_color = ( get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_custom_color', true)!='' ) ?  esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_custom_color', true))  : $titlebar_bg_custom_color ;
					$titlebar_bg_color_type     = 'hex';
				}
				
				$titlebar_bg_custom_image = ( get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_custom_image', true)!='' ) ?  esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_custom_image', true))  : '' ;
				
				
				/***********************/
		
				
				
				$post_titlebar_bg_image = esc_attr(get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_image', true));
				$post_titlebar_bg_custom_image = wp_get_attachment_image_src(get_post_meta( get_the_ID(), '_kwayy_post_options_titlebar_bg_custom_image', true) , 'full' );
				
				// Page option overriding global options : Predefined image
				if( $post_titlebar_bg_image!='' && $post_titlebar_bg_image!='global' && $post_titlebar_bg_image!='custom' ){
					$titlebar_bg_image_type = 'image';
					$titlebar_bg_image      = $post_titlebar_bg_image;
				}
				
				// Page option overriding global options : Custom image
				if( $post_titlebar_bg_image == 'custom' ){
						$titlebar_bg_image_type   = 'custom';
						$titlebar_bg_custom_image = @esc_url($post_titlebar_bg_custom_image[0]);
				}
				
				break;

			case 'portfolio':
				$title = get_the_title();
				if( !empty($apicona['pf_type_title']) ){ $title = $apicona['pf_type_title']; }
				$hidebreadcrumb = 'off';
				break;	
				
			case 'team_member':
				$title          = get_the_title();
				$hidebreadcrumb = 'off';
				break;	
				
			case 'forum':
			case 'topic':
				$title          = get_the_title();
				$hidebreadcrumb = 'on';
				break;
			default:
				$title          = get_the_title();
				$hidebreadcrumb = 'off';
				break;
		}
		
	} else if( is_category() ){ // Category
		$adv_tbar_catarc = ( isset($apicona['adv_tbar_catarc']) ) ? __($apicona['adv_tbar_catarc'].' %s', 'apicona') : __('Category Archives: %s', 'apicona') ;
		$title = sprintf(
			$adv_tbar_catarc,
			'<span>' . __(single_cat_title( '', false), 'apicona') . '</span>'  // for WPML
		);
		$subtitle = category_description();
		
	} else if( is_tag() ){ // Tag
		$adv_tbar_tagarc = isset( $apicona['adv_tbar_tagarc'] ) ? __($apicona['adv_tbar_tagarc'].' %s','apicona') : __('Tag Archives: %s','apicona') ;
		$title = sprintf(
			$adv_tbar_tagarc,
			'<span>' . __(single_tag_title( '', false), 'apicona') . '</span>'  // for WPML
		);
		$subtitle        = tag_description();
		
	} else if( is_tax() ){ // Taxonomy
		global $wp_query;
		$tax                     = $wp_query->get_queried_object();
		
		if( is_tax('team_group') || is_tax('portfolio_category') ){
			$title = '<span>' . __($tax->name, 'apicona') . '</span>';
			
		} else {
			global $wp_query;
			$adv_tbar_postclassified = isset( $apicona['adv_tbar_postclassified'] ) ? __($apicona['adv_tbar_postclassified'].' %s', 'apicona') : __('Posts classified under: %s', 'apicona') ;
		
			$title = sprintf(
				$adv_tbar_postclassified,
				'<span>' . __($tax->name, 'apicona') . '</span>'
			);
			
		}
		
	} else if( is_author() ){ // Author
		if ( have_posts() ){
			the_post();
			$adv_tbar_authorarc = isset( $apicona['adv_tbar_authorarc'] ) ? __($apicona['adv_tbar_authorarc'].' %s', 'apicona') : __('Author Archives: %s', 'apicona');
			$title = sprintf(
				$adv_tbar_authorarc,
				'<span>' . get_the_author() . '</span>'
			);
			
		}

	} else if( is_search()  ){ // Search Results
		$title    = sprintf( __( 'Search Results for %s', 'apicona' ), '<strong><span>' . get_search_query() . '</span></strong>' );
	
	} else if( is_404() ){ // 404
		$hidetitlebar   = true;  // Hide Titlebox on 404 error page

	} else if( is_archive() ){ // Archive
	
		
		// Title for events calendar pages
		if( function_exists('tribe_is_month') && tribe_is_month() && !is_tax() ) { // The Main Calendar Page
			$title = __( 'Events Calendar', 'apicona' );
			
		} elseif( function_exists('tribe_is_month') && tribe_is_month() && is_tax() ) { // Calendar Category Pages
			$title = single_term_title('', false);
			
		} elseif( function_exists('tribe_is_event') &&  tribe_is_event() && !tribe_is_day() && !is_single() ) { // The Main Events List
			$title = __( 'Events', 'apicona' );

		} elseif( function_exists('tribe_is_event') && tribe_is_event() && is_single() ) { // Single Events
			$title = get_the_title();
			
		} elseif( function_exists('tribe_is_day') && tribe_is_day() ) { // Single Event Days
			$title = __( 'Events on: ', 'apicona' ). date('F j, Y', strtotime($wp_query->query_vars['eventDate']));
			
		} elseif( function_exists('tribe_is_venue') && tribe_is_venue() ) { // Single Venues
			$title =	get_the_title();
			
			
		// BBPress section
		} else if( function_exists('is_bbpress') && is_bbpress() ) {
			$title = __( 'Forum', 'apicona' );
			$hidebreadcrumb = 'on';
		} else if( is_post_type_archive() ){
			if( is_post_type_archive('tm_team_member') ){
				$title = ( isset($apicona['team_type_archive_title']) && trim($apicona['team_type_archive_title'])!=''  ) ? __($apicona['team_type_archive_title'],'apicona') : __('Team Members', 'apicona') ;
			} else {
				$title = post_type_archive_title('', false);
			}
		} else if ( is_day() ){
			$title = sprintf( __( 'Daily Archives: %s', 'apicona' ), '<span>' . get_the_date() . '</span>' );
		} elseif( is_month() ){
			$title = sprintf( __( 'Monthly Archives: %s', 'apicona' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'apicona' ) ) . '</span>' );
		} elseif( is_year() ){
			$title = sprintf( __( 'Yearly Archives: %s', 'apicona' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'apicona' ) ) . '</span>' );
		} else {
			if( function_exists('is_bbpress') && is_bbpress() ) {
				$title = __( 'Forum', 'apicona' );
			} else {
				$title = __( 'Archives', 'apicona' );
			}
		};
	
	
	} else {
		$title          = get_the_title();
		$hidebreadcrumb = 'on';
	}
	

	// Theme Options : Hide Breadcrumb globally
	global $apicona;
	if( isset($apicona['tbar_hide_bcrumb']) && $apicona['tbar_hide_bcrumb']=='1' ){
		$hidebreadcrumb = 'on';
	}
	
	
	
	
	
	
	
	if( $hidetitlebar != 'on' ){
		
		$imagesrc = '';
		if( isset($titlebar_bg_custom_image) && trim($titlebar_bg_custom_image)!='' ){
			$imagesrc = wp_get_attachment_image_src( $titlebar_bg_custom_image, 'full' );
		}
		
		
		$e_class  = ( $subtitle != '' ? 'tm-with-subtitle' : 'tm-without-subtitle' );
		$e_class .= ( $hidebreadcrumb == 'on' ? ' tm-no-breadcrumb' : ' tm-with-breadcrumb' );
		$e_class .= ( isset($titleNavigation) ? ' tm-with-proj-navigation' : ' tm-without-proj-navigation' );
		$e_class .= ( (isset($titlebar_background['background-image']) && trim($titlebar_background['background-image'])!='') || (isset($imagesrc[0]) && $imagesrc[0]!='') ) ? ' tm-titlebar-with-bgimage' : '' ;
		$h1Class    = 'headingblock';
		$bcClass    = 'breadcrumbblock';
		
		$subtitle = ($subtitle!='') ? '<h3 class="tm-subtitle">'.do_shortcode($subtitle).'</h3>' : '' ;
		
		/****************** Inline style *******************/
		$customStyle = '';
		
		// BG color
		if( $titlebar_bg_color=='custom' && $titlebar_bg_custom_color!='' ){
			
			if( $titlebar_bg_color_type == 'hex' ){
				$titlebar_bg_custom_color_rgb = 'rgba( ' . tm_hex2rgb($titlebar_bg_custom_color) . ' , 1)';
				if( (isset($titlebar_background['background-image']) && trim($titlebar_background['background-image'])!='') || (isset($imagesrc[0]) && $imagesrc[0]!='') ){
					$titlebar_bg_custom_color_rgb = 'rgba( ' . tm_hex2rgb($titlebar_bg_custom_color) . ' , 0.80)';
				}
				$titlebar_bg_custom_color_full = 'rgba( ' . tm_hex2rgb($titlebar_bg_custom_color) . ' , 1 )';
				
				// Overwriting default color set from Theme Options
				$titlebar_bg_custom_color = array();
				$titlebar_bg_custom_color['rgba']  = $titlebar_bg_custom_color_rgb;
				$titlebar_bg_custom_color['color'] = $titlebar_bg_custom_color_full;
				
			}
			
			
			// If RGB color
			if( is_array($titlebar_bg_custom_color) && isset($titlebar_bg_custom_color['rgba']) ){
				$titlebar_bg_custom_color_full = $titlebar_bg_custom_color['color'];
				$titlebar_bg_custom_color_rgb = $titlebar_bg_custom_color['rgba'];
			}
			
			
			// Preparing inline css style
			$inlineStyle .= ' .tm-titlebar-wrapper{background-color:'.$titlebar_bg_custom_color_full.' !important;} ';
			$inlineStyle .= ' .tm-titlebar-inner-wrapper{background-color:'.$titlebar_bg_custom_color_rgb.' !important;} ';
		}
		// Text Color
		if( $titlebar_text_color=='custom' ){
			$inlineStyle .= ' .tm-titlebar-main h1.entry-title, .tm-subtitle{color:'.$titlebar_text_custom_color.';} ';
			
			// Breadcrumb
			$inlineStyle .= ' .breadcrumb-wrapper{color:  rgba( ' . tm_hex2rgb($titlebar_text_custom_color) . ' , 0.7 ) !important;} ';
			$inlineStyle .= ' .breadcrumb-wrapper a{color:  rgba( ' . tm_hex2rgb($titlebar_text_custom_color) . ' , 1 ) !important;} ';
			$inlineStyle .= ' .breadcrumb-wrapper a:hover{color:  rgba( ' . tm_hex2rgb($titlebar_text_custom_color) . ' , 0.7 ) !important;} ';
			
			
		}
		// BG image
		if( is_array($imagesrc) && isset($imagesrc[0]) && trim($imagesrc[0])!='' ){
			$inlineStyle .= ' .tm-titlebar-wrapper{background-image:url("'.$imagesrc[0].'") !important;} ';
		}
		
		if( $inlineStyle!='' ){
			$inlineStyle = '<style scoped>'.$inlineStyle.'</style>';
		}
		/***************************************************/
		
		// Breadcrumbs
		$breadcrumb		= '';
		$brdcrumbs 		= '';
		if($hidebreadcrumb!='on'){
			$breadcrumb = thememount_titlebar_breadcrumb();
			$brdcrumbs 	= $breadcrumb;
		} 
		if( $titlebar_view == 'right' || $titlebar_view == 'left' ){
			$brdcrumbs = '';
		}
	
		$leftContent = ' '.$brdcrumbs .'<div class="entry-title-wrapper">
							<h1 class="entry-title"> ' . do_shortcode($title) . '</h1>
							' . $subtitle . '
						</div>';
						
		// final view
		$allContent = $leftContent;
		if( $titlebar_view == 'right' ){  // Right align
			$allContent = $breadcrumb . $leftContent;
		}else if($titlebar_view == 'left'){	
			$allContent = $leftContent . $breadcrumb;
		}
		
		?>
		
		<div>
			<?php echo $inlineStyle; ?>
			<div class="tm-titlebar-wrapper entry-header <?php echo $e_class; ?> tm-titlebar-bgcolor-<?php echo $titlebar_bg_color; ?> tm-titlebar-textcolor-<?php echo $titlebar_text_color; ?> tm-titlebar-align-<?php echo $titlebar_view; ?>" <?php echo $inlineCSS; ?>>
				<div class="tm-titlebar-inner-wrapper">
					<div class="tm-titlebar-main">
						<div class="container">
							<?php echo $allContent; ?>
						</div><!-- .container -->
					</div><!-- .tm-titlebar-main -->
				</div><!-- .tm-titlebar-inner-wrapper -->
			</div><!-- .tm-titlebar-wrapper -->
		</div>
		
		
		
		<?php
	}
}
}
/***********************************************************************/



/**
 *  Breacrumb support without plugin
 */
if( !function_exists('thememount_get_breadcrumb_navigation') ){
function thememount_get_breadcrumb_navigation() {
	$return = '';
	/* === OPTIONS === */
	$text['home']     = 'Home'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page

	$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = ' / '; // delimiter between crumbs
	$before         = '<span class="current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$link_before  = '<span typeof="v:Breadcrumb">';
	$link_after   = '</span>';
	$link_attr    = ' rel="v:url" property="v:title"';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id = NULL;
	if( isset($post) ){
		$parent_id    = $parent_id_2 = $post->post_parent;
	}
	$frontpage_id = get_option('page_on_front');

	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) $return .= '<div class="breadcrumbs"><a href="' . esc_url( home_url('/') ) . '">' . $text['home'] . '</a></div>';

	} else {

		$return .= '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
		if ($show_home_link == 1) {
			$return .= '<a href="' . esc_url( home_url('/') ) . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) $return .= $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				$return .= $cats;
			}
			if ($show_current == 1) $return .= $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			$return .= $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			$return .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			$return .= sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			$return .= $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			$return .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			$return .= $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			$return .= $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				$return .= sprintf($link, esc_url( home_url('/') ) . '' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) $return .= $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				$return .= $cats;
				if ($show_current == 1) $return .= $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			$return .= $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$return .= sprintf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) $return .= $delimiter . $before . get_the_title() . $after;
		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) $return .= $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					$return .= $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) $return .= $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) $return .= $delimiter;
				$return .= $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			$return .= $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			$return .= $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			$return .= $before . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $return .= ' (';
			$return .= esc_attr__('Page', 'digitallaw') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $return .= ')';
		}

		$return .= '</div><!-- .breadcrumbs -->';
	
		return $return;
	}
} // end thememount_get_breadcrumb_navigation()
}



/*
 *  Breadcrumb 
 */
if( !function_exists('thememount_titlebar_breadcrumb') ){
function thememount_titlebar_breadcrumb(){
	
	$return = '';

	if(function_exists('bcn_display')){
		$return .=  '<!-- Breadcrumb NavXT output -->';
		$return .= bcn_display(true);
	} else if( function_exists('is_woocommerce') && is_woocommerce() ) {
		$return .=  '<!-- woocommerce_breadcrumb -->';
		ob_start();
		woocommerce_breadcrumb(); //would normally get printed to the screen/output to browser
		$tm_wc_bcrumb_output = ob_get_contents();
		ob_end_clean();
		$return .= $tm_wc_bcrumb_output;
	}else {
		$breacrumb_nav_data = thememount_get_breadcrumb_navigation();
		if( $breacrumb_nav_data!='' ){
			$return .= '<!-- thememount_get_breadcrumb_navigation -->';
			$return .= $breacrumb_nav_data;
		}			
	}
	
	if( !empty($return) ){
		$return = '<div class="breadcrumb-wrapper">'. $return .'</div>';
	}
	
	return $return;
	
}
}


/***********************************************************************/




/**
 *  Customized search form
 */
if( !function_exists('tm_get_search_form') ){
function tm_get_search_form(){
	$apicona = get_option('apicona');
	$search_input = ( isset($apicona['search_input']) && trim($apicona['search_input'])!='' ) ? esc_attr__($apicona['search_input'], 'apicona') :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'apicona');
	
	?>
	
	<!-- search form -->
    <div class="tm-search-popup">
        <div class="tm-search-popup-vertical">
          <div class="container">
             <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
                   <form method="get" id="flying_searchform" action="<?php echo esc_url( home_url() ); ?>">
                        <h3 class="tm-search-popup-title">Search</h3>
                        <div class="tm-search-popup-field">
                            <input type="text" class="field searchform-s input" name="s" placeholder="<?php echo $search_input?>" value="<?php echo get_search_query() ?>" required>
                            <div class="tm-search-popup-devider"></div>
                            <div class="tm-search-popup-submit">
                                <i class="fa fa-search"></i>
                                <input type="submit" value="">
                            </div>    
                        </div>
                        <a href="#" class="close"><span>+</span></a>
                   </form> 
                </div> 
             </div><!-- .row -->
          </div><!-- .container -->
        </div><!-- .tm-search-popup-vertical -->
    </div> 
	<!-- search form -->
	
	<?php
}
}

/***********************************************************************/



/********************  Darken/Lighten HEX color ***********************/
if( !function_exists('tm_adjustBrightness') ){
function tm_adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}
}
/**********************************************************************/


/********************** Team Search Form ************************/
if( !function_exists('thememount_team_search_form') ){
function thememount_team_search_form( $title='', $form_desc='', $search='', $submit_btn='', $form_type='', $selectplaceholder='' ){
	
	$return = '';
	$apicona = get_option('apicona');
	
	// Team Group as Dropdown
	$dropDown     = '';
	$inputClass   = 'tm-wrap-cell';
	$termList     = get_terms( 'team_group', array('hide_empty'=>false) );
	//$termList   = '';
	$noGroupClass = '';
	
	$selecttext = 'All Sections';
	if(!empty($selectplaceholder)){
		$selecttext = __( $selectplaceholder, 'apicona' );
	}
	if( is_array($termList) && count($termList)>0 ){
		$inputClass = 'tm-wrap-cell tm-fbar-input';
		$dropDown .= '<div class="tm-wrap-cell tm-fbar-input"> <div class="search_field selectbox"> <i class="fa fa-tags"></i> <select name="team_group"> <option value="" class="select-empty">' . $selecttext . '</option>';
		foreach( $termList as $term ){
			$selected = ( get_query_var('team_group') == $term->slug ) ? 'selected="selected"' : '' ;
			$dropDown .= '<option value="'.$term->slug.'" '.$selected.'>'.$term->name.'</option>'."\n";
		}
		$dropDown .= '</select></div></div>';
	} else {
		$noGroupClass = ' thememount-team-form-no-group';
		$inputClass   = 'tm-wrap-cell tm-fbar-input';
	}
	
	$wpmlHdn = '';
	if (defined('ICL_LANGUAGE_CODE')){
		$wpmlHdn = '<input type="hidden" name="lang" value="'.ICL_LANGUAGE_CODE.'"/>';
	}
	
	
	// Search title
	$team_search_title = __('Doctor&#39;s Search:', 'apicona');
	
	
	if(!empty($title)){
		$team_search_title = __($title, 'apicona');
	} else if( !empty($apicona['team_type_archive_title']) ){
		
		// Remove last "s" from the title
		if( substr($apicona['team_type_archive_title'], -1) == 's' ){ 
			$team_title = substr( $apicona['team_type_archive_title'], 0, -1);
		}
		
		$team_search_title = __( $team_title.' Search:', 'apicona');
	}
	
	
	// Text before form
	$text_before_form = '';
	if(!empty($form_desc)){
		$form_desc 		   = __($form_desc, 'apicona');
		$text_before_form .= '<div class="team-search-form-before-text">';
		$text_before_form .= do_shortcode($form_desc);
		$text_before_form .= '</div>';
	} /*else if( !empty($apicona['fbar_text_before_team_search_form']) ){
		$text_before_form .= '<div class="team-search-form-before-text">';
		$text_before_form .= do_shortcode($apicona['fbar_text_before_team_search_form']);
		$text_before_form .= '</div>';
	}*/
	
	//Placeholder text for team name
	$tm_placeholder = __('Search by name','apicona');
	if(!empty($search)){
		$tm_placeholder = __($search, 'apicona');
	}
	
	//Search Button Text
	$submit_button = __('Search' , 'apicona');
	if(!empty($submit_btn)){
		$submit_button = __($submit_btn, 'apicona');
	}
	
	//Form type class 
	
	$formclass = 'tm-form-style-horizontal';
	if(!empty($form_type)){
		$formclass = 'tm-form-style-'.$form_type;
	}
	
	// Form
	$return .= '<div class="team-search-form-w '.$formclass.'"><div class="team-search-form-inner-w">
		<form method="get" class="team-search-form'.$noGroupClass.'" action="'.esc_url( home_url( '/' ) ).'">
					<input type="hidden" name="teamsearch" value="1">
					<input type="hidden" name="post_type" value="team_member" />
					'.$wpmlHdn.'
					<div class="tm-wrap">
						
						<div class="tm-team-search-title">
							<h2>'. $team_search_title .'</h2>
							'. $text_before_form .'
						</div>
						<div class="'.$inputClass.'">
							<div class="search_field by_name">
								<i class="fa fa-user"></i>
								<input type="text" placeholder="'.$tm_placeholder.'" name="s" value="'.get_search_query().'">
							</div>
						</div>
						
						'.$dropDown.'
						
						<div class="tm-wrap-cell">
							<div class="submit_field">
								<button type="submit">' . $submit_button . '</button>
							</div>
						</div>
						
					</div><!-- .row -->
					
				</form><!-- form end --> </div></div> ';
				
	return $return;
	
}
}
/*****************************************************************/



/**
 *  Team Member appointment button
 */
if( !function_exists('thememount_team_appointment_btn') ){
function thememount_team_appointment_btn(){
	$return = '';
	
	$btn_text = esc_attr( trim(get_post_meta( get_the_id(), '_kwayy_team_member_details_btn_text', true )) );
	$btn_link = esc_attr( trim(get_post_meta( get_the_id(), '_kwayy_team_member_details_btn_link', true )) );
	
	if( !empty($btn_text) && !empty($btn_link) ){
		$return .= '
		<div class="tm-team-member-appointment-btn-wrapper">
			<div class="vc_btn3-container vc_btn3-left">
				<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-classic vc_btn3-color-skincolor" href="'. $btn_link .'" title="'. $btn_text .'" target="_self">'. $btn_text .'</a>
			</div><!-- .vc_btn3-container.vc_btn3-left -->
		</div><!-- .tm-team-member-appointment-btn-wrapper -->  ';
	}
	
	return $return;
	
}
}
/*****************************************************************/


/**
 *  Portfolio Next/Previous links 
 */
if( !function_exists('thememount_pf_single_np') ){
function thememount_pf_single_np(){
	$return = '';
	
	//$prev_link = get_previous_post_link( '%link', __('Previous','apicona') );
	//$next_link = get_next_post_link( '%link', __('Next','apicona') );
	
	$prev_link = get_permalink(get_adjacent_post(false,'',false));
	$next_link = get_permalink(get_adjacent_post(false,'',true));
	
	if( !empty($prev_link) ){
		$return .= ' <span class="tm-pf-next-posts">'. do_shortcode( '[vc_btn title="'. __('Previous', 'apicona') .'" style="flat" size="sm" btniconposition="no" btnicon="fa-adjust" link="url:'. urlencode($prev_link) .'||"]' ) .'</span> ';
	}
	
	if( !empty($next_link) ){
		$return .= '&nbsp; &nbsp; <span class="tm-pf-prev-posts">'. do_shortcode( '[vc_btn title="'. __('Next', 'apicona') .'" style="flat" size="sm" btniconposition="no" btnicon="fa-adjust" link="url:'. urlencode($next_link) .'||"]' ) .'</span> ';
	}
	
	if( !empty($return) ){ $return = '<div class="tm-pf-navigation">'. $return .'</div>'; }
	return $return;
}
}
/*****************************************************************/



/*********** Portfolio: Getting Featured Slider / Video or Image ***********/

/**
 *  Portfolio: Getting Featured Slider / Video or Image
 */
if( !function_exists('thememount_get_portfolio_featured_content') ){
function thememount_get_portfolio_featured_content(){
	$apicona = get_option('apicona');
	$featuredtype    = get_post_meta(get_the_ID(), '_kwayy_portfolio_featured_featuredtype', true);
	$featuredtype    = $featuredtype[0];
	$startDiv = '<div>';
	$endDiv   = '</div>';

	switch($featuredtype){
		case 'image':
		default:
			if( has_post_thumbnail(get_the_ID()) ){
				echo $startDiv;
				the_post_thumbnail('full');
				echo $endDiv;
			} else {
				
				if( !empty($apicona['show_no_image']['portfolio']) && $apicona['show_no_image']['portfolio']=='1' ){
					echo $startDiv;
					echo '<div class="thememount-no-image"><img src="'.get_template_directory_uri().'/images/noimage-portfolio.png" class="tm-noimg tm-noimg-portfolio"></div>';
					echo $endDiv;
				}

			}
			break;
			
		case 'video':
			echo $startDiv;
			echo '<div class="fluid-video mediabox">' . thememount_get_embed_code( get_post_meta( get_the_ID(), '_kwayy_portfolio_featured_videourl', true) ) . '</div>';
			echo $endDiv;
			break;
			
		case 'audioembed':
			echo $startDiv;
			echo '<div class="fluid-audio">' . get_post_meta(get_the_ID(), '_kwayy_portfolio_featured_audiocode', true).'</div>';
			echo $endDiv;
			break;
			
		case 'slider':
			echo $startDiv;
			echo thememount_featured_gallery_slider( 'portfolio' );
			echo $endDiv;
			
			
			break;
	}

}
}
/*******************************************************************/



/**
 *  Portfolio: Get YouTube/Vimeo embed code
 */
if( !function_exists('thememount_get_embed_code') ){
	function thememount_get_embed_code($url, $echo = false){
		$width  = '853';
		$height = '480';
		
		$embed_code = wp_oembed_get($url);
		if( $echo == true ){
			echo $embed_code;
		} else {
			return $embed_code;
		}
	}
}
/*****************************************************************************/


/**
 *  Portfolio: Details box
 */
if( !function_exists('thememount_portfolio_detailsbox') ){
function thememount_portfolio_detailsbox(){
	$apicona = get_option('apicona');
	
	$optionsArray = array(
						'pf_details_date',
						'pf_details_line1',
						'pf_details_line1_link',
						'pf_details_line2',
						'pf_details_line2_link',
						'pf_details_line3',
						'pf_details_line3_link',
						'pf_details_line4',
						'pf_details_line4_link',
						'pf_details_line5',
						'pf_details_line5_link',
						'pf_details_cat',
	);
	
	// Creating variables
	foreach( $optionsArray as $option ){
		$option1 = $option.'_icon';
		if( isset($apicona[$option1]) ){
			$$option1 = esc_attr($apicona[$option1]);
		}
		$option2 = $option.'_title';
		if( isset($apicona[$option2]) ){
			$$option2 = esc_attr($apicona[$option2]);
		}
	}
	
	// Output starts
	echo '<div class="thememount-portfolio-details">';
	echo '<h2 class="tm-pf-title-details">' . esc_attr__($apicona['portfolio_project_details'], 'apicona') . '</h2>';
	echo '<ul class="thememount-portfolio-details-list">';
	
	
	
	foreach( $optionsArray as $option ){
		
		$class = str_replace('_','-',$option);
		if( $option == 'pf_details_date' ){  // Date
			if( trim(${$option.'_title'})!='' ){ // checking if empty
				echo '
				<li class="tm-'.$class.'">
					<span class="tm-pf-left-details"><i class="kwicon-' . ${$option.'_icon'} . '"></i> ' . esc_attr__(${$option.'_title'}, 'apicona') . '</span>
					<span class="tm-pf-right-details">' . get_the_date( 'd M Y' ) . '</span>
				</li>';
			}
			
		} else if( $option == 'pf_details_cat' ){  // Category
			if( trim(${$option.'_title'})!='' ){ // checking if empty
				echo '
				<li class="tm-'.$class.'">
					<span class="tm-pf-left-details"><i class="kwicon-' . ${$option.'_icon'} . '"></i> ' . esc_attr__(${$option.'_title'}, 'apicona') . '</span> ';
				echo '<span class="tm-pf-right-details">';
				$catList = wp_get_post_terms( get_the_ID(), 'portfolio_category' );
				$x = 0;
				foreach( $catList as $cat ){
					if( $x!=0 ){ echo ', '; }
					echo '<span>' . $cat->name . '</span>';
					$x++;
				}
				echo '</span>';
				echo '</li>';
			}
			
		} else {  // Lines
			
			if( trim(${$option.'_title'})!='' ){ // checking if empty
				$line = get_post_meta( get_the_ID() , '_thememount_portfolio_data_'.$option.'_title');
				$link = get_post_meta( get_the_ID() , '_thememount_portfolio_data_'.$option.'_link');
				$line = ( is_array($line) && count($line)>0 ) ? $line[0] : $line ;
				$line = ( is_array($line) && count($line)==0 ) ? ''      : $line ;
				
				
				//setting links to line
				if($link[0]!=''){
					$line = '<a href="'.$link[0].'">'.$line.'</a>';
				}
				
				if( $line!='' ){
					echo '
					<li class="tm-'.$class.'">
						<span class="tm-pf-left-details"><i class="kwicon-' . ${$option.'_icon'} . '"></i> ' . esc_attr__(${$option.'_title'}, 'apicona') . '</span>
						<span class="tm-pf-right-details"> '.$line.' </span>
					</li>';
				}
			}
		}
	}
	echo '</ul>';
	
	
	
	// Button
	$portfolioLinkText = trim(get_post_meta( get_the_ID(),'_thememount_portfolio_data_linktext',true));
	$portfolioLinkUrl  = urlencode(trim(get_post_meta( get_the_ID(),'_thememount_portfolio_data_linkurl',true)));
	if( $portfolioLinkText!='' && $portfolioLinkUrl!='' ){
		echo '<div class="tm-pf-proj-btn">';
		echo do_shortcode('[vc_btn title="'.$portfolioLinkText.'" style="flat" align="center" i_icon_fontawesome="fa fa-external-link" link="url:'.$portfolioLinkUrl.'|target:%20_blank" add_icon="true"]');
		echo '</div>';
	}
	echo '</div> <!-- .portfolio-details --> ';
}	
}
/*****************************************************************/



/**
 *  Portfolio - Social share icons
 */
if( !function_exists('thememount_pf_social_share_icons') ){
function thememount_pf_social_share_icons(){
	$apicona = get_option('apicona');
	$return = '';
	
	if( !empty($apicona['pf_single_social_share']) && is_array($apicona['pf_single_social_share']) && count($apicona['pf_single_social_share'])>0 ){
		
		foreach ( $apicona['pf_single_social_share'] as $social=>$status ){
			if( $status=='1' ){
				
				// setting link
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. esc_url(get_permalink());
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. esc_url(get_permalink());
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. esc_url(get_permalink());
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. esc_url(get_permalink());
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. esc_url(get_permalink());
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				
				// Now preparing the icon
				$return .= '<li class="tm-social-share tm-social-share-'. $social .'">
				<a href="#" onClick="TMSocialWindow=window.open(\''. $link .'\',\'TMSocialWindow\',width=600,height=100); return false;"><i class="tm-social-icon-'. $social .'"></i></a>
				</li>';
				
			} // if
			
		}  //  foreach
		
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="tm-social-share-w"><ul>'. $return .'</ul></div>';
		}
		
		
	} // if
	
	return $return;
	
}
}
/*****************************************************************/

if ( ! function_exists( 'tm_post_meta_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own tm_post_meta_date() to override in a child theme.
 *
 * @since Apicona Advanced 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function tm_post_meta_date( $echo = true ) {
	
	$return = '';
	
	$return .= sprintf( '
	
		<div class="thememount-entry-date">
			<time class="entry-date dateinfo" datetime="%1$s">
				<span class="date"> %2$s </span>
				<span class="month"> %3$s </span>
				<span class="year"> %4$s </span>
			</time>
		</div>',
		get_the_date( 'c' ),
		get_the_date( 'j' ),
		get_the_date( 'M' ),
		get_the_date( 'Y' )
	
	);
	
	if ( $echo ){
		echo $return;
	} else {
		return $return;
	}
	
}
endif;

/*****************************************************************/



/**
 * Print HTML with meta information for current post.
 *
 * Create your own thememount_blogbox_entry_meta() to override in a child theme.
 *
 * @since Apicona Advanced 1.0
 *
 * @return void
 */
if ( !function_exists( 'thememount_blogbox_entry_meta' ) ){
function thememount_blogbox_entry_meta($echo = false, $tags='no') {
	$return = '';
	$sep    = '<span class="tm-blogbox-meta-sep"> &nbsp;/&nbsp; </span>';
	
	global $post;
	
	if( isset($post->post_type) && $post->post_type=='page' ){
		return;
	}
	
	
	$postFormat = get_post_format();
	
	// Post author
	$num_comments    = get_comments_number();
	
	$return .= '<div class="thememount-meta-details">';
		
		
		// Author
		if ( 'post' == get_post_type() ) {
			
			$return .= sprintf( '<div class="thememount-post-user"><i class="tm-social-icon-user-1"></i> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></div>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'apicona' ), get_the_author() ) ),
				get_the_author()
			);
		
		}

		// Date
		$return .= '<span class="tm-date-wrapper"> <i class="tm-social-icon-calendar"></i> ' . get_the_date( 'j M Y' ) . '</span>';
		
		// Categories
		$categories_list = get_the_category_list( __( ', ', 'apicona' ) );
		if ( $categories_list ) {
			$return .= '<span class="categories-links"><i class="tm-social-icon-folder"></i> ' . $categories_list . '</span>';
		}
		
		if($tags=='yes'){
			//Tags
			$tag_list = get_the_tag_list( '',__( ', ', 'apicona' ) ); 
			if($tag_list){
				$return .= '<span class="tag-links"><i class="tm-social-icon-tag-1"></i> ' . $tag_list . '</span>';
			}
		}
		
		if( !is_sticky() && comments_open() && ($num_comments>0) ){
			$return .= '<span class="comments"><i class="fa fa-comments-o"></i> ';
			$return .= $num_comments;
			$return .= '</span>';
		}

	$return .= '</div>';
	
	if( $echo == true ){
		echo $return;
	} else {
		return $return;
	}
}
}
/* ********************* Function END ********************* */


/**
 *  Comments row template
 */
function tm_comment_row_template($comment, $args, $depth){
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'apicona' ); ?></em>
          <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
		<?php printf( __( '<cite class="tm-fn fn">%s</cite> <!-- <span class="says">says:</span> -->', 'apicona' ), get_comment_author_link() ); ?>
		<a class="tm-comment-date-link" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s at %2$s', 'apicona'), get_comment_date(),  get_comment_time() ); ?>
		</a>  
		<?php edit_comment_link( __( '(Edit)', 'apicona' ), '  ', '' );
        ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}
/*****************************************************************/

/**
 *  Set Primary Class
 */
if( !function_exists('setPrimaryClass') ){
function setPrimaryClass($sidebar){
	$primaryclass = 'col-md-12 col-lg-12 col-sm-12 col-xs-12';
	switch($sidebar){
		case 'left':
		case 'right':
			$primaryclass = 'col-md-9 col-lg-9 col-xs-12';
			break;
		case 'both':
		case 'bothleft':
		case 'bothright':
			$primaryclass = 'col-md-6 col-lg-6 col-xs-12';
			break;
	}
	return $primaryclass;
}
}
/*****************************************************************/



/*
 *  Events Box
 */
 if( !function_exists('thememount_eventsbox') ){
function thememount_eventsbox( $column='four', $design="default" ){
	
	$return = '';
	
	if( !function_exists('tribe_get_start_date') ){
		//return '<br> Events plugin is disabled or not installed. Please install "The Events Calendar" pluign first. <br>';
		return;
	}
	
	
	if( $design=="detailed" ){
		$start_date       = tribe_get_start_date( null, false, 'c' );
		$start_date_date  = tribe_get_start_date( null, false, 'j' );
		$start_date_month = tribe_get_start_date( null, false, 'M' );
		$start_date_year  = tribe_get_start_date( null, false, ', Y' );
		
		
		
		// Date Box
		$title            = '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
		
		$date = '<div class="thememount-postbox-small-date"><div class="thememount-post-box-date-wrapper">';
		$date .= sprintf( '<div class="thememount-entry-date-wrapper">
								<span class="thememount-entry-date">
									<time class="entry-date" datetime="%1$s" >
										<span class="entry-date">%2$s</span> 
										<span class="entry-month">%3$s</span> 
										<span class="entry-year">%4$s</span> 
									</time>
								</span>
							</div>',
			$start_date,
			$start_date_date,
			$start_date_month,
			$start_date_year
		);
		$date .= '</div></div>';
		
		$featuredLink     = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
		$featuredImgURL   = $featuredLink[0];
		$featuredLinkArea = '';
		$featuredContent  = '';
		
		if( has_post_thumbnail() ){
			$featuredContent = get_the_post_thumbnail( get_the_ID(), 'portfolio-'.$column.'-column' );
		} else {
			//$featuredContent = '<div class="thememount-proj-noimage"><i class="fa fa-picture-o"></i></div>';
			$featuredContent = '<div class="thememount-proj-noimage"><img src="'.get_template_directory_uri().'/images/noimage.png" class="tm-noimg tm-noimg-portfolio"></div>';
		}

		
		switch($column){
			case 'one':
				$boxClass = 'col-lg-12 col-sm-12 col-md-12 col-xs-12';
				break;
			case 'two':
				$boxClass = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
				break;
			case 'three':
				$boxClass = 'col-lg-4 col-sm-6 col-md-4 col-xs-12';
				break;
			case 'four':
			default:
				$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
				break;
			case 'five':
				$boxClass = 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
				break;
			case 'six':
				$boxClass = 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
				break;
			case 'mix':
				$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
				break;
			case 'fix':
				$boxClass = 'blog-slider-box-width';
				break;
		}
		
		
		
		/***************************/
		$slugs = wp_get_post_terms( get_the_ID(), 'category', array("fields" => "slug"));
		$slugs   = implode( ' ', $slugs );
		
		
		/* Short Description */
		$description = '';
		$readMore    = __('See Event', 'apicona') . ' <i class="kwicon-fa-angle-right"></i>';
		if( has_excerpt() ){
			$description  = get_the_excerpt();
			$description .= thememount_wrap_readmore('<a href="'.get_permalink().'">'.$readMore.'</a>');
		} else {
			global $more;
			$more = 0;
			$description = get_the_content( $readMore );
		}
		
		$categories_list = get_the_category_list( __( ', ', 'apicona' ) ); // Translators: used between list items, there is a space after the comma.
		$categories_list = ( $categories_list ) ? '<span class="categories-links"><i class="kwicon-fa-folder-open"></i> ' . $categories_list . '</span>' : '' ;
		
		$comments = wp_count_comments(); $comments = $comments->approved; //Get Total Comments
		$commentsCode = '';
		if( $comments > 0 ){
			$commentsCode  = '<span class="comments"><i class="kwicon-fa-comment"></i> '.get_comments_number( 'no comments', '1', '%' ).'</span>';
		}
		 
		 $metaDetails = '';
		 if( $column != 'one' && ($categories_list!='' || $comments!='') ){
			$metaDetails = '<div class="entry-meta thememount-eventbox-entry-meta"><div class="thememount-meta-details">' . $categories_list . '</div></div>';
		 }
		
		if( $featuredContent == '' ){
			$featuredContent = '<div class="thememount-proj-noimage"><img src="'.get_template_directory_uri().'/images/noimage.png" class="tm-noimg tm-noimg-portfolio"></div>';
		}
		
		$return .= '
			<article class="tm-post-box post-box-event ' . $boxClass . ' ' . $slugs . '">
				<div class="post-item">
					<div class="post-item-thumbnail">
						<div class="post-item-thumbnail-inner">
							' . $featuredContent . '
						</div>
						<div class="overthumb"></div>
						' . $featuredLinkArea . '
					</div>
					<div class="tm-item-content">
					   <!-- <div class="post-box-icon-wrapper"><i class="fa fa-pencil"></i></div> -->
						'.$title.'
						'.thememount_event_meta().'
						<div class="thememount-eventbox-desc">' . $description . '</div>
					</div>
				</div>
			</article>
		';

	} else {
		
		switch($column){
			case 'one':
				$boxClass = 'col-lg-12 col-sm-12 col-md-12 col-xs-12';
				break;
			case 'two':
				$boxClass = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
				break;
			case 'three':
				$boxClass = 'col-lg-4 col-sm-6 col-md-4 col-xs-12';
				break;
			case 'four':
			default:
				$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
				break;
			case 'five':
				$boxClass = 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
				break;
			case 'six':
				$boxClass = 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
				break;
			case 'mix':
				$boxClass = 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
				break;
			case 'fix':
				$boxClass = 'blog-slider-box-width';
				break;
		}

		//  Featured Image
		if( has_post_thumbnail() ){
			$featuredImg = '<a href="' . get_permalink() . '">'.get_the_post_thumbnail( get_the_ID(), 'portfolio-'.$column.'-column' ).'</a>';
		} else {
			$featuredImg = '<div class="thememount-proj-noimage"><i class="fa fa-picture-o"></i></div>';
		}
		
		$price = '';
		if( function_exists('tribe_get_formatted_cost') ){
			$cost = tribe_get_formatted_cost();
			if ( ! empty( $cost ) ){
				$price = '<div class="tribe-events-event-cost"> ' . esc_html( tribe_get_formatted_cost() ) . ' </div>';
			}
		}

		$return .= '
			<article class="events-box ' . $boxClass . ' thememount-box">
				<div class="tm-item">
					<div class="tm-item-thumbnail">
						' . $price . '
						' . $featuredImg . '
						<!--<div class="overthumb"></div>
						<div class="icons">
							<a href="' . get_permalink() . '" class="thememount_pf_link"><i class="kwicon-fa-link"></i></a>
						</div> -->
					</div>
					<div class="tm-item-content">					
						<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>
					</div>
				</div>
			</article>
		';
	}
	
	return $return;
	
}
}
/***************  Function End Events Box *******************/


/*
 *  Events meta
 */
if( !function_exists('thememount_event_meta') ){
function thememount_event_meta(){
	$return = '';
	$price = '';
	
	
	$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
	$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

	$start_datetime = tribe_get_start_date();
	$start_date = tribe_get_start_date( null, false );
	$start_time = tribe_get_start_date( null, false, $time_format );
	$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

	$end_datetime = tribe_get_end_date();
	$end_date = tribe_get_end_date( null, false );
	$end_time = tribe_get_end_date( null, false, $time_format );
	$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );
	
	if( function_exists('tribe_get_formatted_cost') ){
		$cost = tribe_get_formatted_cost();
		if ( ! empty( $cost ) ){
			$price = '<span class="tribe-events-event-cost"> ' . esc_html( tribe_get_formatted_cost() ) . ' </span>';
		}
	}
	
	
	
	
	
	$return .= '<div class="thememount-meta-details thememount-event-meta-details">';
		$return .= '<span class="thememount-event-meta-item thememount-event-date"> ';
			$return .= '<i class="fa fa-clock-o"></i> ';
			// All day (multiday) events
			if ( tribe_event_is_all_day() && tribe_event_is_multiday() ){
				

				$return .= '
					<span class="thememount-event-meta-dtstart" title="' . esc_attr__( $start_ts, 'apicona' ) . '"> ' .  esc_html__( $start_date, 'apicona' ) . ' </span> - 
					<span class="thememount-event-meta-dtend" title="' . esc_attr__( $end_ts, 'apicona' ) . '"> ' . esc_html__( $end_date, 'apicona' ) . ' </span>';

			
			// All day (single day) events
			} elseif ( tribe_event_is_all_day() ){
				$return .= '<span class="thememount-event-meta-onedate" title="'. esc_attr__( $start_ts, 'apicona' ) . '"> ' . esc_html__( $start_date, 'apicona' ) . '</span>';

			
			// Multiday events
			} elseif ( tribe_event_is_multiday() ){
				
				$return .= '<span class="thememount-event-meta-dtstart" title="' . esc_attr__( $start_ts, 'apicona' ) . '"> ' . esc_html__( $start_datetime, 'apicona' ) . ' </span> - ';
				$return .= '<span class="thememount-event-meta-dtend" title="' . esc_attr__( $end_ts, 'apicona' ) . '"> ' .  esc_html__( $end_datetime, 'apicona' ) .' </span>';


			// Single day events
			} else {
				
				$return .= '<span class="thememount-event-meta-dtstart" title="' . esc_attr__( $start_ts ) . '"> ' . esc_html__( $start_date, 'apicona' ) . ' </span> - ';

				$return .= '<span class="thememount-event-meta-dtend" title="' . esc_attr__( $end_ts ) . '">';
					if ( $start_time == $end_time ) {
						$return .= esc_html__( $start_time, 'apicona' );
					} else {
						$return .= esc_html__( $start_time . $time_range_separator . $end_time, 'apicona' );
					}

				$return .=' </span>';
			}
		$return .=' </span>';
		$return .= '
			&nbsp;&nbsp; <span class="thememount-event-meta-item thememount-event-price">
				'.$price.'
			</span>';
	$return .= '</div>';
	return $return;
}
}
/************************ End pf  Events Meta *****************************/


/*
 *  Get short description
 */
function tm_get_short_desc(){
	$apicona = get_option('apicona');
	$content = '';
	if( isset( $apicona['blog_text_limit'] ) && $apicona['blog_text_limit']>0 ){
		$content = get_the_content('',FALSE,'');
		$content = wp_strip_all_tags($content);
		$content = strip_shortcodes($content);
		$content = str_replace(']]>', ']]>', $content);
		$content = mb_substr($content,0, $apicona['blog_text_limit'], 'UTF-8' );
		$content = trim(preg_replace( '/\s+/', ' ', $content));
		$content = $content.'...';
	}
	return $content;
}
/************************ end *****************************/


