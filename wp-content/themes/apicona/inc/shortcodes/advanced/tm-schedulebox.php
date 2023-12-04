<?php
// [tm-schedulebox]
if( !function_exists('thememount_sc_schedulebox') ){
function thememount_sc_schedulebox( $atts, $content=NULL ){
	
	global $tm_vc_custom_element_schedulebox;
	$options_list = tm_create_options_list($tm_vc_custom_element_schedulebox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	$h2 		= $title;
	$h4 		= $subtitle;
	$txt_align 	= $align;
	

	
	$return = tm_vc_element_heading( get_defined_vars() );
	
	
	// Add/remove separator line below main heading text
	$heading_sep_class = ' tm-heading-with-separator';
	if( $heading_sep=='no' ){
		$heading_sep_class = '';
	}
	


	// schedule lists
	$scheduler = json_decode(urldecode($scheduler));
	$return .= '<div class="tm-schedule-block-wrapper">';
	$return .= '<ul class="tm-schedule-block">';
		foreach( $scheduler as $data ){
			
			$day 	= '';
			$timing = '';
			
			//Weekday 
			if( $data->weekday != '' ){
				$day = ( isset($data->weekday) ) ? $data->weekday : '';
			}
			
			//timing
			if($data->timing!=''){
				$time = ( isset($data->timing) ) ? $data->timing : '';
				$timing = '<span class="schedule-time">'.$time.'</span>';
			}
			
			$return .= '<li>'.$day.$timing.'</li>';
			
		}
	$return .= '</ul> <!-- .tm-schedule-block -->';
	$return .= '</div><!-- .tm-schedule-block-wrapper -->  ';
	

	$wrapperStart = '<div class="thememount-schedulebox-wrapper '.$heading_sep_class.' '.$el_class.'">';
	$wrapperEnd   = '</div>';
	return $wrapperStart.$return.$wrapperEnd;
	
	
}
}
add_shortcode( 'tm-schedulebox', 'thememount_sc_schedulebox' );