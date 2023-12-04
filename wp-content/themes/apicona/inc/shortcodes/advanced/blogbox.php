<?php	
// [blogbox]
if( !function_exists('thememount_sc_blogbox') ){
function thememount_sc_blogbox( $atts, $content=NULL ){
	
	global $tm_sc_params_blogbox;
	$options_list = tm_create_options_list($tm_sc_params_blogbox);

	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	// Adding prettyPhoto JS and CSS file
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
	
	$h2 		= $title;
	$h4 		= $subtitle;
	$txt_align 	= $align;
	
	// Box width
	$boxwidth			= $column ;
	$rowClass			= ( $view != 'carousel' ) ? 'row' : '' ;
	$headerCarslBtn		= ( $view == 'carousel' ) ? 'carouselbtn="yes"' : '' ;
	$itemWrapper		= ( $view == 'carousel' ) ? 'thememount-carousel-items-wrapper owl-carousel owl-theme' : '' ;
	$itemCol			= ( $view == 'carousel' ) ? 'thememount-carousel-col-'.$column : '' ;
	$rowFix				= ( $view == 'carousel' ) ? '' : 'multi-columns-row' ;
	$pagination_class	= ( $pagination=='yes' ) ? ' thememount-with-pagination' : '' ;
	// Data tags
	$datatags = tm_carousel_data_html( get_defined_vars() );
	
	$rand = mt_rand(1000, 9999);
	$rand .= mt_rand(1000, 9999);
	
	
	// Generating Button Code
	$btnCode = '';
	if( trim($btntext)!='' && trim($btnlink)!='' ){
		$btnCode = '<div class="kwayy-blogbox-btn kwayy-center">' . do_shortcode('[vc_button title="'.$btntext.'" target="_self" color="skincolor" size="wpb_regularsize" href="'.$btnlink.'" btn_effect="bordertocolor" showicon="withouticon" iconposition="left"]') . '</div>';
	}
	
	$return = '<div class="row thememount-blog-boxes-wrapper thememount-blog-view-'.$view.' thememount-effect-'.$view.' thememount-items-col-'.$column.' '.$itemCol.' '.$pagination_class.' '.$el_class.'" id="thememount-blog-id-'.$rand.'" '.$datatags.'>';
		
		$blogWrapperStart = '<div class="thememount-blog-boxes col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$blogWrapperEnd   = '</div>';
		$contentWrapperStart = '<div class="thememount-blog-text col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$contentWrapperEnd   = '</div>';
		
		$return .= $contentWrapperStart;
		$return .= tm_vc_element_heading( get_defined_vars() );
		$return .= $contentWrapperEnd;
		
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		
		$args = array(
			'post_type'				=> 'post',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'orderby'				=> 'date',
			'order'					=> 'DESC',
			'paged'          	  	=> $paged,
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
			
			$return .= $blogWrapperStart;
			
			
			$tmRowClass = 'row ';
			if( $view=='timeline' ){$tmRowClass = '';} // Remove ROW class if timeline view
			
			$return .= '<div class="thememount-blog-boxes-inner '.$tmRowClass.$rowFix.' thememount-items-wrapper '.$itemWrapper.'">';
			
			
			
			
			
			
			
			if( $view=='timeline' ){  // Timeline View
				
				$return .= '<div class="tm-timeline tm_content_element clearfix">';
				
				$currGroup = '';
				$groupData = '';
				
				
				if( !isset($loopPosition) || trim($loopPosition)=='' ){
					$loopPosition = 'right';
				}
				
				// Timeline Loop start
				while ( $posts->have_posts() ) {
					$posts->the_post();
					
					$currYear  = get_the_date( 'Y' );
					$currMonth = get_the_date( 'M' );
					$currMonthYear = get_the_date( 'M Y' );
					$newlist   = false;
					
					// MONTH or YEAR wise grouping
					if( $timeline_groupby=='yearly' ){
						// Yearly
						if( $currGroup!=$currYear ){
							$newlist   = true;
							$groupData = '<span class="tm-bogbox-tline-group-year">'.$currYear.'</span>';
							$loopPosition = 'right';
							$currGroup = $currYear;
						}
						
					} else {
						// Monthly
						if( $currGroup!=$currMonthYear ){
							$newlist   = true;
							$groupData = '<span class="tm-blogbox-tline-group-month">'.$currMonth.'</span> <span class="tm-blogbox-tline-group-year">'.$currYear.'</span>';
							$loopPosition = 'right';
							$currGroup = $currMonthYear;
						}
					}
					
					
					
					
										
					// Grouping Heading
					if( $newlist==true ){
						$return .= '
						<div class="tm-timeline-element tm-date-separator">
							<div class="tm-timeline-spine"></div>
							<div class="date-wrap">'.$groupData.'</div>
						</div>
						<div class="first-margin"></div>';
					}
					
					// Timeline Box
					$return .= '<div class="timeline-element '.$loopPosition.'-side">';
					
					if( $timeline_boxview=='simple_with_fetured' ){
						$return .= thememount_blogbox_timeline('withfeatured'); // Timeline Default view
					} else if( $timeline_boxview=='box' ){
						$return .= thememount_blogbox( 'timeline' );
					} else {
						$return .= thememount_blogbox_timeline(); // Timeline Default view
					}
					
					$return .= '</div>';
					
					
					// Chanring Post Position
					if( $loopPosition == 'right' ){
						$loopPosition = 'left';
					} else {
						$loopPosition = 'right';
					}
					
					
					
				} // while
				
				$return .= '</div><!-- .tm-timeline .tm_content_element .clearfix -->';
				
				// Timeline Loop end
				
				
				
			} else {  // Normal View
				
				while ( $posts->have_posts() ) {
					$posts->the_post();
					$return .= thememount_blogbox( $boxwidth );
				} // while
				
			} // END Normal View
			
			
			$return .= '</div>';
			
			// button
			$return .= $btnCode;
			//pagination
			if( $pagination=='yes' ){ $return .= tm_apiconaadv_paging_nav(true, $posts);}
			
			$return .= $blogWrapperEnd;
		
			
		} // if
		
		
		
		
		/* Restore original Post Data */
		wp_reset_postdata();
	
	$return .= '</div>';
	
	return $return;
}
}
add_shortcode( 'blogbox', 'thememount_sc_blogbox' );
