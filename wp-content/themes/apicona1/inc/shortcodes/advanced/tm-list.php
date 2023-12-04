<?php
// [tm-list type=""]
if( !function_exists('thememount_sc_list') ){
function thememount_sc_list( $atts, $content=NULL ){
	
	global $tm_sc_params_list;
	$options_list = tm_create_options_list($tm_sc_params_list);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	$return = '';
	
	//  Icon list style
	$listStart = '<ul class="tm-list tm-list-style-' . $type . '">';
	$listEnd   = '</ul>';
	
	switch($type){
		case 'disc':
			$listStart = '<ul class="tm-list tm-list-style-' . $type . '" type="disc">';
			$listEnd   = '</ul>';
			break;
		case 'circle':
			$listStart = '<ul class="tm-list tm-list-style-' . $type . '" type="circle">';
			$listEnd   = '</ul>';
			break;
		case 'square':
			$listStart = '<ul class="tm-list tm-list-style-' . $type . '" type="square">';
			$listEnd   = '</ul>';
			break;
		case 'decimal':
			$listStart = '<ol class="tm-list tm-list-style-' . $type . '" type="1">';
			$listEnd   = '</ol>';
			break;
		case 'upper-alpha':
			$listStart = '<ol class="tm-list tm-list-style-' . $type . '" type="A">';
			$listEnd   = '</ol>';
			break;
		case 'roman':
			$listStart = '<ol class="tm-list tm-list-style-' . $type . '" type="I">';
			$listEnd   = '</ol>';
			break;
	}
	
	// Preparing list
	$return .= $listStart;
	
	$iconAlign = 'left';
	if( is_rtl() ){ $iconAlign = 'right'; }
	
	$icon = '';
	if($type=='icon'){
		// We are calling this to add CSS file of the selected icon.
		do_shortcode('[vc_icon type="'.$icon_type.'" icon_fontawesome="'.$icon_icon_fontawesome.'" icon_openiconic="'.$icon_icon_openiconic.'" icon_typicons="'.$icon_icon_typicons.'" icon_entypo="'.$icon_icon_entypo.'" icon_linecons="'.$icon_icon_linecons.'" color="skincolor" align="'.$iconAlign.'"]');
		// This is real icon code
		$icon = '<i class="tm-skincolor '.${'icon_icon_'.$icon_type}.'"></i>  ';
	}
	
	$total = 20;
	for( $x=1; $x <= $total ; $x++ ){
		if( trim(trim(${'line'.$x}))!='' ){
			//var_dump( ${'line'.$x} );
			$line = rawurldecode(base64_decode(trim(${'line'.$x})));
			//var_dump($line);
			if( trim($line) != '' ){
				$return .= '<li>' . $icon . $line . '</li>';
			}
		}
	}
	
	$return .= $listEnd;

	return $return;
}
}
add_shortcode( 'tm-list', 'thememount_sc_list' );