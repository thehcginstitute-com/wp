<?php
// [tm-footermenu]
if( !function_exists('thememount_sc_footermenu') ){
function thememount_sc_footermenu( $atts, $content=NULL ){
	$return = '';
	if ( has_nav_menu( 'footer' ) ) {
		$return .= wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-nav-menu', 'container' => false, 'echo' => false ) );
	}
	return $return;
}
}
add_shortcode( 'tm-footermenu', 'thememount_sc_footermenu' );