<?php
// [testimonial]
if( !function_exists('thememount_sc_testimonial') ){
function thememount_sc_testimonial($atts, $content=NULL ) {
	
	global $tm_sc_params_testimonial;
	$options_list = tm_create_options_list($tm_sc_params_testimonial);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	
	$h2 		= $title;
	$h4 		= $subtitle;
	$txt_align 	= $align;
	
	// Box width
	$boxwidth       = $column ;
	$rowClass       = ( $view != 'carousel' ) ? 'row' : '' ;
	$headerCarslBtn = ( $view == 'carousel' ) ? 'carouselbtn="yes"' : '' ;
	$itemWrapper    = ( $view == 'carousel' ) ? 'thememount-carousel-items-wrapper owl-carousel owl-theme' : '' ;
	$itemCol        = ( $view == 'carousel' ) ? 'thememount-carousel-col-'.$column : '' ;	
	$rowClass       = ( $view == 'carousel' ) ? $rowClass : $rowClass.' multi-columns-row' ;
	
	// setting one col view carousel class when box view is onecol view
	if($boxdesign == 'onecol'){
		$itemCol = 'thememount-carousel-col-one';
	}
	
	// Data tags
	$datatags = tm_carousel_data_html( get_defined_vars() );
	$return   = '';
	
	$args = array(
		'post_type'      => 'testimonial',
		'posts_per_page' => $show,
	);
	
	
	// Group
	if( $group!='' ){
		$group = explode(',',$group);
		$args['tax_query'] = array(
								array(
									'taxonomy' => 'testimonial_group',
									'field' => 'slug',
									'terms' => $group
								),
							);
	}
	
	
	$results = new WP_Query( $args );
	
	// The Loop
	if ( $results->have_posts() ) {
		$return .= "\n\t".'<div class="thememount-testimonial-wrapper thememount-testimonial-boxdesing-'.$boxdesign.' thememount-effect-'.$view.' thememount-items-col-'.$column.' '.$itemCol.' '.$el_class.'" '.$datatags.'>';
		$return .= tm_vc_element_heading( get_defined_vars() );
		$return .= '<div class="'.$rowClass.' thememount-items-wrapper '.$itemWrapper.'">';
		
		while ( $results->have_posts() ) {
			$results->the_post();
			$return .= thememount_testimonialbox( $boxwidth, $boxdesign );
		}
		$return .= "\n\t".'</div></div>';
	} else {
		// no posts found
	}
	
	/* Restore original Post Data */
	wp_reset_postdata();
	
	return $return;
}
}
add_shortcode( 'testimonial', 'thememount_sc_testimonial' );