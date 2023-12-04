<?php
// [tm-logo]
if( !function_exists('thememount_sc_logo') ){
function thememount_sc_logo( $atts, $content=NULL ){
	global $apicona;
	$return = '';
	if( $apicona['logotype']=='image' ){
		if( isset($apicona['logoimg']['url']) ){
			$return = '<img src="'.$apicona['logoimg']['url'].'" width="'.$apicona['logoimg']['width'].'" height="'.$apicona['logoimg']['height'].'">';
		}
	}
	return $return;
}
}
add_shortcode( 'tm-logo', 'thememount_sc_logo' );