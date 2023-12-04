<?php
// [site-url]
if( !function_exists('thememount_sc_site_url') ){
function thememount_sc_site_url( $atts, $content=NULL ){
	return site_url();
}
}
add_shortcode( 'site-url', 'thememount_sc_site_url' );