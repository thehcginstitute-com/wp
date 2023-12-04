<?php
// [site-title]
if( !function_exists('thememount_sc_site_title') ){
function thememount_sc_site_title( $atts, $content=NULL ){
	return get_bloginfo('name');
}
}
add_shortcode( 'site-title', 'thememount_sc_site_title' );