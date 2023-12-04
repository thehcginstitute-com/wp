<?php
// [skincolor]This text will be in skin color[/skincolor]
if( !function_exists('thememount_sc_skincolor') ){
function thememount_sc_skincolor( $atts, $content=NULL ) {
	return '<span class="thememount-skincolor">'.$content.'</span>';
}
}
add_shortcode( 'skincolor', 'thememount_sc_skincolor' );