<?php
// [tm-servicebox]
if( !function_exists('thememount_sc_servicebox') ){
function thememount_sc_servicebox( $atts, $content=NULL ){
	
	global $tm_sc_params_servicebox;
	$options_list = tm_create_options_list($tm_sc_params_servicebox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	$css_class = tm_vc_shortcode_custom_css_class( $css, ' ' );
	
	
	$return = $class = $iconcodeleft = $iconcoderight = '';
	
	// If hover effect is enabled
	if( $hover!='' && $hover!='none' ){
		wp_enqueue_style('hover');
	}
	
	// Icon Position changes
	$add_icon_new = $add_icon;
	if( $add_icon_new=='topleft' || $add_icon_new=='topright' ){
		$add_icon = 'top';
	}
	if( $add_icon_new=='bottomleft' || $add_icon_new=='bottomright' ){
		$add_icon = 'bottom';
	}
	
	
	// Button align same as text align
	$options_list['btn_align'] = 'left';
	$btn_align                 = '';
	if( $txt_align!='justify' && $txt_align!='' ){
		$btn_align = $txt_align;
	}
	
	
	// Icon hover
	$el_class = ( isset($icon_hover) && $icon_hover=='yes' ) ? $el_class.' tm-shadowicon' : $el_class ;
	
	// Image as icon
	$image = '';
	$image_class = '';
	if($images!=''){
		$image = wp_get_attachment_image($images, 'full');
		$image = '<div class="tm-sbox-image">'.$image.'</div>';
		$image_class = 'tm-sbox-with-image';
		$add_icon = '';
	}
	
	
	
	// Generating CTA shortcode
	$ctaShortcode = '[vc_cta';
	foreach( $options_list as $key=>$val ){
		
		if( ( trim( ${$key} )!='' || $key=='h2' ) && $key!='css' && $key!='el_class' ){
			$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
		}
	}
	$ctaShortcode .= ' i_css_animation="" css_animation=""]'.$content.'[/vc_cta]';
	
	// CTA shortcode
	$return = do_shortcode($ctaShortcode);
	
	
	// Adding image as icon inside CTA HTML code
	$return = str_replace( '<div class="vc_cta3_content-container' , $image . '<div class="vc_cta3_content-container' , $return );
	
	
	
	
	$heading_sep_class = ' tm-heading-with-separator';
	if( $heading_sep=='no' ){
		$heading_sep_class = '';
	}
	
	$bgimage   		=  thememountCheckBGImage($css);
	$bg_image_class = ($bgimage==true)?' tm-sbox-bg-image':'';
	$customDiv 		= '';
	if($bgimage==true || $css!=''){
		$customDiv  = '<div class="tm-sbox-overlay"></div>';
	}
	
	// Animation class
	$animation_class = '';
	if($css_animation!='') {
		wp_enqueue_script( 'waypoints' );
		$animation_class = "wpb_animate_when_almost_visible wpb_".$css_animation." ".$css_animation;
	}
	
	// Wrapping custom class to slyle
	$return = '<div class="tm-sbox tm-sbox-iconalign-'.$add_icon_new.' '.$hover.$heading_sep_class.' '.$image_class.' '.$animation_class.' '.$bg_image_class.' '.$css_class.' '.$el_class.'">'.$customDiv.''.$return.'</div>';
	
	
	if(trim($css)!= ''){
		
		/***********************************/
		// Inline css
		global $thememount_inline_css;
		if( empty($thememount_inline_css) ){
			$thememount_inline_css = '';
		}
		
		$new_bgimage_element	= tm_vc_shortcode_custom_css_class( $css, '' ). ' .tm-sbox-overlay';
		$newCSS					= str_replace( tm_vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element,$css );
		$thememount_inline_css .= $newCSS;
		$thememount_inline_css .= '.'.$new_bgimage_element.'{background-image: none !important; border:none !important;}';
		
		/***********************************/
		
		/*
		$return  .= '<div><style>';
		$new_bgimage_element = tm_vc_shortcode_custom_css_class( $css, '' ). ' .tm-sbox-overlay';
		$newCSS   = str_replace( tm_vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element,$css );
		$return  .= $newCSS;
		$return  .= '.'.$new_bgimage_element.'{background-image: none !important; border:none !important;}';
		$return  .= '</style></div>';
		*/
	}
	
	return $return;
}
}
add_shortcode( 'tm-servicebox', 'thememount_sc_servicebox' );

