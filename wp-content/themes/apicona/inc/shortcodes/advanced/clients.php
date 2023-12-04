<?php
// [clients]
if( !function_exists('thememount_sc_clients') ){
function thememount_sc_clients($atts, $content=NULL ) {
	global $tm_sc_params_clients;
	$options_list = tm_create_options_list($tm_sc_params_clients);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	$h2 		= $title;
	$h4 		= $subtitle;
	$txt_align 	= $align;
	
	$return = '';
	$rowClass    = ( $view != 'carousel' ) ? 'row' : '' ;
	$rowClass    = ( $view == 'carousel' ) ? $rowClass : $rowClass.' multi-columns-row' ;
	$itemWrapper = ( $view == 'carousel' ) ? 'thememount-carousel-items-wrapper owl-carousel owl-theme' : '' ;
	// Data tags
	$datatags = tm_carousel_data_html( get_defined_vars() );

	
	switch($column){
		case 'two':
			$boxClass = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
			break;
		case 'three':
		default:
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
	
	$args = array(
		'post_type'      => 'client',
		'posts_per_page' => $show,
	);
	
	// Group
	if( isset($group) && $group!='' ){
		$group = explode(',',$group);
		$return .= '<!-- Group Active -->';
		$args['tax_query'] = array(
								array(
									'taxonomy' => 'client_group',
									'field' => 'slug',
									'terms' => $group
								),
							);
	}
	$results = new WP_Query( $args );
	
	// The Loop
	if ( $results->have_posts() ) {
		$return .= "\n\t".'<div class="thememount-client-wrapper thememount-client-view-'.$view.' thememount-client-column-'.$column.' thememount-effect-'.$view.' thememount-carousel-col-'.$column.' thememount-with-pagination '.$el_class.'"  '.$datatags.'>';
		$return .= tm_vc_element_heading( get_defined_vars() );
		$return .= '<div class="'.$rowClass.' thememount-clients '.$itemWrapper.'">';
		
		while ( $results->have_posts() ) {
			$results->the_post();
			$link = trim( get_post_meta( get_the_ID(), '_kwayy_clients_details_clienturl', true ) );
			//$link = ( $link!='' ) ? $link : '#' ;
			$linktarget = '';
			if( $link!='' ){
				$linktarget = 'target="_blank"';
			} else {
				$link = 'javascript:void(0);';
			}
			
			
			if( has_post_thumbnail() ){
				$return .= '<div class="'.$boxClass.' tm-box">';
				 $return .= '<a href="'.$link.'" '.$linktarget.' class="hint--top" data-hint="'.get_the_title().'">';
				$return .= get_the_post_thumbnail( get_the_ID(), 'full' );
				$return .= '</a>';
				$return .= '</div>';
			} else {
				$return .= '<!-- No Featured Image For this Client -->';
			}
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
add_shortcode( 'clients', 'thememount_sc_clients' );