<?php
// [tm-team show="0"]
if( !function_exists('thememount_sc_team') ){
function thememount_sc_team($atts, $content=NULL ) {
	
	global $tm_sc_params_team;
	$options_list = tm_create_options_list($tm_sc_params_team);
	
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
	$itemWrapper    = ( $view == 'carousel' ) ? 'thememount-carousel-items-wrapper' : '' ;
	$itemCol        = ( $view == 'carousel' ) ? 'thememount-carousel-col-'.$column : '' ;
	$rowClass       = ( $view == 'carousel' ) ? $rowClass : $rowClass.' multi-columns-row' ;
	
	// Data tags
	$datatags = tm_carousel_data_html( get_defined_vars() );
	
	$return = '';
	$width  = thememount_translateColumnWidthToSpan($column);
	
	$args = array(
		'post_type'      => 'team_member',
		'posts_per_page' => $show,
	);
	
	
	// Group
	if( $groupslug!='' ){
		$groupslug = explode(',', $groupslug);
		$args['tax_query'] = array(
								array(
									'taxonomy' => 'team_group',
									'field' => 'slug',
									'terms' => $groupslug
								),
							);
	}
	
	if( $groupslug != '' || is_array($groupslug) ){
		$args['tm_team_group'] = $groupslug;
	}
	$results = new WP_Query( $args );
	
	// The Loop
	if ( $results->have_posts() ) {
		$return .= "\n\t".'<div class="thememount-team-wrapper thememount-effect-'.$view.' thememount-items-col-'.$column.' '.$itemCol.' '.$el_class.'" '.$datatags.'>';
		
		$return .= tm_vc_element_heading( get_defined_vars() );
		
		$return .= '<div class="'.$rowClass.' thememount-items-wrapper '.$itemWrapper.'">';
		
		while ( $results->have_posts() ) {
			$results->the_post();
			
			$return .= thememount_teammemberbox( $boxwidth, $linking, $boxdesign );
			
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
add_shortcode( 'team', 'thememount_sc_team' );
