<?php
// [tm-current-year]
if( !function_exists('thememount_sc_current_year') ){
function thememount_sc_current_year( $atts, $content=NULL ){
	return date("Y");
}
}
add_shortcode( 'current-year', 'thememount_sc_current_year' );