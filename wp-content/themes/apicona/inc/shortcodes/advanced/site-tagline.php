<?php
// [site-tagline]
if( !function_exists('thememount_sc_site_tagline') ){
function thememount_sc_site_tagline( $atts, $content=NULL ){
	return get_bloginfo('description');
}
}
add_shortcode( 'site-tagline', 'thememount_sc_site_tagline' );