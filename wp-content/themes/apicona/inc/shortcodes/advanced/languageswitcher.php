<?php
// [languageswitcher]
if( !function_exists('thememount_sc_languageswitcher') ){
function thememount_sc_languageswitcher( $atts ) {
	/*extract( shortcode_atts( array(
		'skip_missing' => '0',
	), $atts ) );*/
	$return = '';
	if( function_exists('icl_get_languages') ){
		ob_start();
		do_action('icl_language_selector');
		$langDropdown = ob_get_clean();
		$return .= '<div class="tm-wpml-lang-switcher">'.$langDropdown.'</div>';
	}
	return $return;
}
}
add_shortcode( 'languageswitcher', 'thememount_sc_languageswitcher' );
