<?php
// [heading tag="h1" text="This is heading text"]
if( !function_exists('thememount_sc_heading') ){
function thememount_sc_heading( $atts, $content=NULL ){
	
	global $tm_sc_params_heading;
	$options_list = tm_create_options_list($tm_sc_params_heading);
	
	// declaring h2, h4, txt_align
	$options_list['h2'] 		= '';
	$options_list['h4'] 		= '';
	$options_list['txt_align'] 	= '';
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	$return 	= '';

	if($text != ''){
		$h2 					= $text;
		$options_list['h2'] 	= $h2;
		$txt_align 				= $align;
	}
	if($subtext != ''){
		$h4 					= $subtext;
		$options_list['h4'] 	= $h4;
	}

	
	// Getting a unique class name applied by the Custom CSS box (via "css_editor") and also custom class name via "el_class".
	$css_class = tm_vc_shortcode_custom_css_class( $css, ' ' ) . ( strlen( $el_class ) ? ' ' . $el_class : '' );
	
	
	$ctaShortcode = '[vc_cta';
	foreach( $options_list as $key=>$val ){
		if( trim( ${$key} )!='' ){
			$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
		}
	}
	$ctaShortcode .= ' i_css_animation="" css_animation=""]'.$content.'[/vc_cta]';
	
	$heading_sep_class = ' tm-heading-with-separator';
	$heading_sep_div   = '<div class="heading-seperator"></div>';
	
	if( $heading_sep=='no' ){
		$heading_sep_class	= '';
		$heading_sep_div 	= '';
	}
	
	if( trim($h2)!='' ) {
		
		
		/* Chanring order of heading and sub-heading in Header */
		include_once( get_template_directory().'/inc/phpquery/phpQuery.php' );
		
		/* Callintg cta shortcode */
		$cta = do_shortcode($ctaShortcode);
		
		/* if tag is differnt */
		if( $tag != 'h2' ){
			$cta = str_replace("<h2>", '<'.$tag.'>', $cta);
			$cta = str_replace("</h2>", '</'.$tag.'>', $cta);
		}
		
		$document = phpQuery::newDocumentHTML($cta);
		
		if( $document->find('.vc_cta3-content-header')->length()>0 ){
			foreach( $document->find('.vc_cta3-content-header') as $cta_element ){
				if( $document->find('h4', $cta_element)->length()>0 ){
					$h2_ele = $document->find('h2', $cta_element)->clone();
					
					// change tag for heading
					/*if( $tag != 'h2' ){
						$h2_ele = str_replace("<h2>", '<'.$tag.'>', $h2_ele);
						$h2_ele = str_replace("</h2>", '</'.$tag.'>', $h2_ele);
					}*/
					
					$document->find('h2', $cta_element)->remove();
					$document->find('h4', $cta_element)->after($h2_ele);
				}
			}
			// Merge changes
			$cta  = $document->html();
		}
		
		
		$return .= '<div class="tm-element-heading-wrapper tm-heading-inner tm-element-align-'.$txt_align.$heading_sep_class.' '.$css_class.'">';
		//$return .= do_shortcode($ctaShortcode);
		$return .= $cta;
		$return .= $heading_sep_div;
		$return .= '</div> <!-- .tm-element-heading-wrapper container --> ';
		$return .= ($css!='') ? '<style>'.$css.'</style>' : $css ; // Custom CSS style like padding, margin etc.
	}
	
	
	return $return;
}
}
add_shortcode( 'heading', 'thememount_sc_heading' );