<?php
// [contactbox]
if( !function_exists('thememount_sc_contactbox') ){
function thememount_sc_contactbox( $atts, $content=NULL ){
	
	global $tm_sc_params_contactbox;
	$options_list = tm_create_options_list($tm_sc_params_contactbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	
	$return = '<ul class="thememount_vc_contact_wrapper">';
	if( trim($phone)!='' ) {
		$return .= '<li class="thememount-contact-phonenumber kwicon-fa-phone">'.trim($phone).'</li>';
	}
	if( trim($email)!='' ) {
		$return .= '<li class="thememount-contact-email kwicon-fa-envelope-o"><a href="mailto:'.trim($email).'">'.trim($email).'</a></li>';
	}
	if( trim($website)!='' ) {
		$return .= '<li class="thememount-contact-website kwicon-fa-globe"><a href="'.thememount_addhttp($website).'">'.trim($website).'</a></li>';
	}
	if( trim($address)!='' ) {
		$return .= '<li class="thememount-contact-address  kwicon-fa-map-marker">'.$address.'</li>';
	}
	if( trim($time)!='' ) {
		$return .= '<li class="thememount-contact-time  kwicon-fa-clock-o">'.$time.'</li>';
	}
	$return .= '</ul>';
	
	return $return;
}
}
add_shortcode( 'contactbox', 'thememount_sc_contactbox' );