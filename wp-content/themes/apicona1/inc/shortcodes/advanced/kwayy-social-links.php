<?php
// [kwayy-social-links]
if( !function_exists('thememount_sc_social_links') ){
function thememount_sc_social_links( $atts, $content=NULL ){
	$wrapperStart = '<div class="thememount-social-links-wrapper">';
	$wrapperEnd   = '</div>';
	return $wrapperStart.thememount_get_social_links().$wrapperEnd;
}
}
add_shortcode( 'kwayy-social-links', 'thememount_sc_social_links' );