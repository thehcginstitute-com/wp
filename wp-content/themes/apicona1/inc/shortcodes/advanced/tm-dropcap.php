<?php
// [tm-dropcap]D[/tm-dropcap]
// [tm-dropcap style="square"]A[/tm-dropcap]
// [tm-dropcap style="rounded"]B[/tm-dropcap]
// [tm-dropcap style="round"]C[/tm-dropcap]
// [tm-dropcap color="skincolor"]A[/tm-dropcap]
// [tm-dropcap color="grey"]B[/tm-dropcap]
// [tm-dropcap color="dark"]B[/tm-dropcap]
if( !function_exists('thememount_sc_dropcap') ){
function thememount_sc_dropcap( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		'style' => '',
		'color' => '',
	), $atts ) );
	$return = '<span class="tm-dropcap tm-dcap-style-' .$style . ' tm-dcap-color-' .$color . '">' . $content . '</span>';
	return $return;
}
}
add_shortcode( 'tm-dropcap', 'thememount_sc_dropcap' );