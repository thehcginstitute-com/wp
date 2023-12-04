<?php
// [facts-in-digits]
if( !function_exists('thememount_sc_facts_in_digits') ){
function thememount_sc_facts_in_digits($atts, $content=NULL ) {
	
	global $tm_sc_params_facts_in_digits;
	$options_list = tm_create_options_list($tm_sc_params_facts_in_digits);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	// Required JS files
	wp_enqueue_script( 'waypoints', array( 'jquery' ) );
	wp_enqueue_script( 'numinate', array( 'jquery' ) );
	
	
	$beforeText = '';
	$afterText  = '';
	
	if( trim($before)!='' ){
		if( $beforetextstyle=='sup' || $beforetextstyle=='sub' || $beforetextstyle=='span' ){
			$beforeText = '<'.$beforetextstyle.'>'.trim($before).'</'.$beforetextstyle.'>';
		}
	}
	
	if( trim($after)!='' ){
		if( $aftertextstyle=='sup' || $aftertextstyle=='sub' || $aftertextstyle=='span' ){
			$afterText = '<'.$aftertextstyle.'>'.trim($after).'</'.$aftertextstyle.'>';
		}
	}
	
	
	// Icon
	$return        = '';
	$lefticoncode  = '';
	$righticoncode = '';
	$class         = 'tm-fid-without-icon';
	if( $add_icon=='true' ){
		$class = 'tm-fid-with-icon';
		$iconcode = ( $icon!='' ) ? '<div class="kwayy-fid-wrapper"><i class="kwicon-'.$icon.'"></i></div>' : '' ;
		// This is real icon code
		$lefticoncode = '<div class="tm-fid-icon-wrapper"><i class="kwicon-'.$icon.'"></i></div>';
		if($icon_align=='right'){
			$lefticoncode  = '';
			$righticoncode = '<div class="tm-fid-icon-wrapper"><i class="kwicon-'.$icon.'"></i></div>';
		}
		
		
	}
	
	$return  .= '
			<div class="tm-fid tm-inside tm-fid-icon-align-'.$icon_align.' '.$class.'">
				'.$lefticoncode.'
				<div class="tm-fld-contents">
					<h4 class="tm-fid-inner">
						'.$beforeText.'
						<span data-appear-animation="animateDigits" data-from="0" data-to="'.$digit.'" data-interval="'.$interval.'" data-before="'.$before.'" data-before-style="'.$beforetextstyle.'" data-after="'.$after.'" data-after-style="'.$aftertextstyle.'">'.$digit.'</span>
						'.$afterText.'
					</h4>
					<h3><span>'.$title.'<br></span></h3>
				</div><!-- .tm-fld-contents -->
				'.$righticoncode.'
			</div>';
	return $return;
}
}
add_shortcode( 'facts_in_digits', 'thememount_sc_facts_in_digits' );