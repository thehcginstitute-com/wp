<?php
// [eventsbox]
if( !function_exists('thememount_sc_eventsbox') ){
function thememount_sc_eventsbox( $atts, $content=NULL ){
	
	global $tm_sc_params_eventsbox;
	$options_list = tm_create_options_list($tm_sc_params_eventsbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	
	$h2 		= $title;
	$h4 		= $subtitle;
	$txt_align 	= $align;
	
	// Box width
	$boxwidth       = $column ;
	$headerCarslBtn = ( $view == 'carousel' ) ? 'carouselbtn="yes"' : '' ;
	$itemWrapper    = ( $view == 'carousel' ) ? 'thememount-carousel-items-wrapper owl-carousel owl-theme' : '' ;
	$itemCol        = ( $view == 'carousel' ) ? 'thememount-carousel-col-'.$column : '' ;
	$rowFix         = ( $view == 'carousel' ) ? '' : 'multi-columns-row' ;
	
	// Data tags
	$datatags = tm_carousel_data_html( get_defined_vars() );
	
	$rand = mt_rand(1000, 9999);
	$rand .= mt_rand(1000, 9999);
	
	if( !function_exists('tribe_get_start_date') ){
		return;
	}
	
	// Generating Button Code
	$btnCode = '';
	if( trim($btntext)!='' && trim($btnlink)!='' ){
		$btnCode = '<div class="kwayy-blogbox-btn kwayy-center">' . do_shortcode('[vc_button title="'.$btntext.'" target="_self" color="skincolor" size="wpb_regularsize" href="'.$btnlink.'" btn_effect="bordertocolor" showicon="withouticon" iconposition="left"]') . '</div>';
	}
	
	
	$return = '<div class="row '.$rowFix.' thememount-portfolio-boxes-wrapper thememount-portfolio-view-'.$view.' thememount-effect-'.$view.' thememount-items-col-'.$column.' '.$itemCol.' '.$el_class.'" id="thememount-portfolio-id-'.$rand.'" '.$datatags.'>';
		
		$portfolioWrapperStart = '<div class="thememount-portfolio-boxes col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$portfolioWrapperEnd   = '</div>';
		$contentWrapperStart = '<div class="thememount-portfolio-text col-xs-12 col-sm-12 col-md-12 col-lg-12">';
		$contentWrapperEnd   = '</div>';

		$return .= $contentWrapperStart;
		$return .= tm_vc_element_heading( get_defined_vars() );
		$return .= $contentWrapperEnd;
		
		//Protect against arbitrary paged values
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		
		$args = array(
			'post_type'      => 'tribe_events',
			'order'          => 'ASC',
			'meta_key'       => '_EventStartDate',
			'meta_type'      => 'DATE',
			'orderby'        => 'meta_value',
			'posts_per_page' => $show,
		);
		
		// Creating array for multiple catslug
		if(strpos($catslug, ',') !== false) {
			$catslug = explode(',',$catslug);
		}
		
		// Group
		if( $catslug!='' || is_array($catslug) ){
			$args['tax_query'] = array(
									array(
										'taxonomy' => 'tribe_events_cat',
										'field'    => 'slug',
										'terms'    => $catslug
									),
								);
		}
		
		
		$events = new WP_Query( $args );
		
		
		// The Loop
		if ( $events->have_posts() ) {
		
			$return          .= $portfolioWrapperStart;
			
			$pagination_class = ( $pagination=='yes' ) ? ' thememount-with-pagination' : '' ; // Pagination
			$portfolioBoxes   = '<div class="thememount-items-wrapper '.$itemWrapper.' thememount-portfolio-boxes-inner portfolio-wrapper row'.$pagination_class.'">';
			
			while ( $events->have_posts() ) {
				$events->the_post();
				$portfolioBoxes .= thememount_eventsbox( $boxwidth, $design );
			} // while
			
			$portfolioBoxes .= '</div>';

			$return .= $portfolioBoxes;  // Portfolio Boxes
			if( $pagination=='yes' ){ $return .= tm_apiconaadv_paging_nav(true); }  // Pagination
			$return .= $btnCode;
			
			$return .= $portfolioWrapperEnd;
		} // if
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
	$return .= '</div>';
	
	return $return;
}
}
add_shortcode( 'eventsbox', 'thememount_sc_eventsbox' );