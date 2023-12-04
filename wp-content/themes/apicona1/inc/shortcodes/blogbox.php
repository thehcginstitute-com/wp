<?php	
// [blogbox]
if( !function_exists('kwayy_sc_blogbox') ){
function kwayy_sc_blogbox( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		//'showtext'     => '',
		//'textposition' => 'left',
		'title'        => '',
		'subtitle'     => '',
		'align'        => 'left',
		'linking'	   => 'no',
		//'sepicon'      => 'NO_ICON',
		'btntext'      => '',
		'btnlink'      => '',
		'pagination'     => 'no',
		'category'     => '',
		'show'         => '6',
		'column'       => 'three',
		'view'         => 'default',
		'carousel_autoplay' 	   => '1',
		'carousel_autoplay'        => '1',
		'carousel_loop'            => '0',
		'carousel_autoplayspeed'   => '800',
		'carousel_autoplaytimeout' => '4500',
	), $atts ) );
	
	
	// Box width
	$boxwidth       = ( $view == 'carousel' ) ? 'fix' : $column ;
	$rowClass       = ( $view != 'carousel' ) ? 'row' : '' ;
	$headerCarslBtn = ( $view == 'carousel' ) ? 'carouselbtn="yes"' : '' ;
	$itemWrapper    = ( $view == 'carousel' ) ? 'kwayy-carousel-items-wrapper' : '' ;
	$itemCol        = ( $view == 'carousel' ) ? 'kwayy-carousel-col-'.$column : '' ;
	$rowClass       = ( $view == 'carousel' ) ? '' : $rowClass.' multi-columns-row' ;
	
	// adding DATA tags
	$datatags = '';
	if( $view == 'carousel' ){
		// carousel_autoplay
		$datatags = 'data-autoplay="'.$carousel_autoplay.'"';
		
		// carousel_autoplayspeed
		$datatags .= ' data-autoplayspeed="'.$carousel_autoplayspeed.'"';
		
		// carousel_autoplaytimeout
		$datatags .= ' data-autoplaytimeout="'.$carousel_autoplaytimeout.'"';
		
		// carousel_loop
		$datatags .= ' data-loop="'.$carousel_loop.'"';
	}
	
	$rand = mt_rand(1000, 9999);
	$rand .= mt_rand(1000, 9999);
	
	/*$carouselControls = '<div class="kwayy-carousel-controls">
							<div class="kwayy-carousel-controls-inner">
								<a class="kwayy-carousel-prev"><span class="wpb_button"><i class="kwicon-fa-angle-left"></i></span></a>
								<a class="kwayy-carousel-slideshow"><span class="wpb_button"><i class="kwicon-fa-pause"></i></span></a>
								<a title="Play Slideshow" class="kwayy-carousel-next"><span class="wpb_button"><i class="kwicon-fa-angle-right"></i></span></a>
							</div>
						</div>';*/
	
	// Generating Button Code
	$btnCode = '';
	if( trim($btntext)!='' && trim($btnlink)!='' ){
		$btnCode = '<div class="kwayy-blogbox-btn kwayy-center">' . do_shortcode('[vc_button title="'.$btntext.'" target="_self" color="skincolor" size="wpb_regularsize" href="'.$btnlink.'" btn_effect="bordertocolor" showicon="withouticon" iconposition="left"]') . '</div>';
	}
	
	
	$return = '<div class="row multi-columns-row kwayy-blog-boxes-wrapper kwayy-blog-view-'.$view.' kwayy-effect-'.$view.' kwayy-items-col-'.$column.' '.$itemCol.'" id="kwayy-blog-id-'.$rand.'" '.$datatags.'>';
		
		$blogWrapperStart = '<div class="kwayy-blog-boxes col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$blogWrapperEnd   = '</div>';
		$contentWrapperStart = '<div class="kwayy-blog-text col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$contentWrapperEnd   = '</div>';
		
		/*if( $textposition=='left' ){
			$blogWrapperStart = '<div class="kwayy-blog-boxes col-xs-12 col-sm-9 col-md-9 col-lg-9">';
			$blogWrapperEnd   = '</div>';
			$contentWrapperStart = '<div class="kwayy-blog-text col-xs-12 col-sm-12 col-md-3 col-lg-3">';
			$contentWrapperEnd   = '</div>';
		}*/
		
		$return .= $contentWrapperStart;
			if( trim($title)!='' ) {
				// Title and Subtitle
				$return .= do_shortcode('[heading text="'.$title.'" tag="h2" style="linedot" align="top" '.$headerCarslBtn.' subtext="'.$subtitle.'" align="'.$align.'"]');
			}
			
			// Carousel Buttons
			//if( $view == 'carousel' ){ $return .= $carouselControls; }
			
		$return .= $contentWrapperEnd;
		
		
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

		$args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $show,
			'ignore_sticky_posts' => true,
			'paged'          	  => $paged,
		);
		
		// Creating array for multiple category
		if(strpos($category, ',') !== false) {
			$category = explode(',',$category);
		}
		
		// Category
		if( $category!='' ){
			$args['tax_query'] = array(
									array(
										'taxonomy' => 'category',
										'field' => 'slug',
										'terms' => $category
									),
								);
		}
		
		$posts = new WP_Query( $args );
		

		// The Loop
		if ( $posts->have_posts() ) {
		
			//if( $view == 'carousel' ){ $return .= $carouselControls; }
			$pagination_class = ( $pagination=='yes' ) ? ' kwayy-with-pagination' : '' ; // Pagination
			$return .= $blogWrapperStart;
			$return .= '<div class="kwayy-blog-boxes-inner row kwayy-items-wrapper '.$itemWrapper.' '.$pagination_class.'">';
			while ( $posts->have_posts() ) {
				$posts->the_post();
				$return .= kwayy_blogbox( $boxwidth, $linking );
			} // while
			
			$return .= '</div>';
			
			// Button
			$return .= $btnCode;
			if( $pagination=='yes'){ $return .= apicona_paging_nav(true, $posts); }  // Pagination
			$return .= $blogWrapperEnd;
			
			
			
		} // if
		
		
		/* Restore original Post Data */
		wp_reset_postdata();
	
	$return .= '</div>';
	
	return $return;
}
}
add_shortcode( 'blogbox', 'kwayy_sc_blogbox' );
