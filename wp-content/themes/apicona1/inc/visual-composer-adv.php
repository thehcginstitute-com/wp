<?php



/**
 * Icon Array
 */
global $kwayy_iconsArray;
$allIcons = array();
foreach($kwayy_iconsArray as $icon ){
	$allIcons[ucwords(str_replace('-',' ',$icon))] = $icon;
}


/**
 * Adding Icon Selector parameter
 */
if( function_exists('vc_add_shortcode_param') ){
	function kwayy_iconselector_func($settings, $value) {
		//var_dump($settings);
		$dependency = vc_generate_dependencies_attributes($settings);
		$optionsList = '';
		//var_dump($settings);
		foreach( $settings['value'] as $val ){
			$selected =  ( $val==$value ) ? 'selected="selected"' : '' ;
			$optionsList .= '<option value="'.$val.'" '.$selected.'>'.$val.'</option>';
		}

		return '<div class="my_param_block">'
				.'<select name="'.$settings['param_name']
				.'" class="wpb_vc_param_value wpb-textinput kwayy-icon-selector '
				.$settings['param_name'].' '.$settings['type'].'_field" '
				.' ' . $dependency . '>'
				.$optionsList
				.'</select>'
			.'</div>';
	}
	vc_add_shortcode_param('kwayy_iconselector', 'kwayy_iconselector_func', get_template_directory_uri().'/inc/admin-custom-select2-runner.js' );
}



/**
 *  Add skin color to different elements in Visual Composer
 */
function tm_add_extra_options() {
	// CTA - color
	$param  = WPBMap::getParam( 'vc_cta', 'color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value']      = array_reverse($colors);
		$param['dependency'] = array(
			'element'            => 'style',
			'value_not_equal_to' => array( 'transparent' )
		);
		$param['std']        = 'skincolor';
		vc_update_shortcode_param( 'vc_cta', $param );
	}

	// CTA - Adding Transparent color in style
	$param  = WPBMap::getParam( 'vc_cta', 'style' );
	$style = $param['value'];
	if( is_array($style) ){
		$style               = array_reverse($style);
		$style[__( 'Transparent', 'apicona' )] = 'transparent';
		$param['value']      = array_reverse($style);
		$param['std']        = 'transparent';
		vc_update_shortcode_param( 'vc_cta', $param );
	}

	
	// CTA - button color
	$param  = WPBMap::getParam( 'vc_cta', 'btn_color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		$param['std']   = 'white';
		vc_update_shortcode_param( 'vc_cta', $param );
	}
	$param        = WPBMap::getParam( 'vc_cta', 'btn_button_block' );
	$param['std'] = 'false';
	vc_update_shortcode_param( 'vc_cta', $param );
	
	
	// CTA - icon position
	/*$param        = WPBMap::getParam( 'vc_cta', 'add_icon' );
	$param['std'] = 'left';
	vc_update_shortcode_param( 'vc_cta', $param );*/
	
	
	
	/*
	// CTA - Use Custom Fonts 
	$param  = WPBMap::getParam( 'vc_cta', 'use_custom_fonts_h2' );
	$param['std'] = 'false';
	vc_update_shortcode_param( 'vc_cta', $param );
	
	
	// CTA - Use Theme fonts 
	$param  = WPBMap::getParam( 'vc_cta', 'h2_use_theme_fonts' );
	$param['std'] = 'yes';
	vc_update_shortcode_param( 'vc_cta', $param );
	*/
	
	
	
	// CTA - Place Icon On Border
	$param  = WPBMap::getParam( 'vc_cta', 'i_on_border' );
	$param['std'] = '';
	vc_update_shortcode_param( 'vc_cta', $param );
	
	
	
	// Button
	$param  = WPBMap::getParam( 'vc_btn', 'color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		$param['std']   = 'skincolor';
		vc_update_shortcode_param( 'vc_btn', $param );
	}
	$param = WPBMap::getParam( 'vc_btn', 'style' );
	$style = $param['value'];
	if( is_array($style) ){
		$style = array_reverse($style);
		$style[__( 'Normal Text', 'apicona' )] = 'text';
		$param['value'] = array_reverse($style);
		$param['std']   = 'text';
		vc_update_shortcode_param( 'vc_btn', $param );
	}
	
	// FAQ - Icon color
	$param  = WPBMap::getParam( 'vc_toggle', 'color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		vc_update_shortcode_param( 'vc_toggle', $param );
	}
	
	// Accordion
	$param  = WPBMap::getParam( 'vc_tta_accordion', 'color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		$param['std']   = 'skincolor';
		vc_update_shortcode_param( 'vc_tta_accordion', $param );
	}
	
	// Tabs
	$param  = WPBMap::getParam( 'vc_tta_tabs', 'color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		vc_update_shortcode_param( 'vc_tta_tabs', $param );
	}
	
	// Tours
	$param  = WPBMap::getParam( 'vc_tta_tour', 'color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		vc_update_shortcode_param( 'vc_tta_tour', $param );
	}
	
	// Icon
	$param  = WPBMap::getParam( 'vc_icon', 'color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		$param['std']   = 'skincolor';
		vc_update_shortcode_param( 'vc_icon', $param );
	}
	// Icon Background
	$param  = WPBMap::getParam( 'vc_icon', 'background_color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		$param['std']   = 'skincolor';
		vc_update_shortcode_param( 'vc_icon', $param );
	}
	
	
	
	// Icon library
	/*$param  = WPBMap::getParam( 'vc_icon', 'type' );
	$library = $param['value'];
	if( is_array($library) ){
		$library = array_reverse($library);
		$library[__( 'Stroke 7 Icon Font (from Pixeden)', 'apicona' )] = 'stroke7_pixeden';
		$param['value']  = array_reverse($library);
		$param['std']    = 'stroke7_pixeden';
		$param['weight'] = 2;
		vc_update_shortcode_param( 'vc_icon', $param );
	}
	
	
	vc_add_param( 'vc_icon', array(  // Icon library
		'type'       => 'iconpicker',
		'heading'    => __( 'Stroke 7 Icon', 'apicona' ),
		'param_name' => 'icon_stroke7_pixeden',
		'value'      => 'vc_li vc_li-heart', // default value to backend editor admin_label
		'settings'   => array(
			'emptyIcon'    => false, // default true, display an "EMPTY" icon?
			'type'         => 'stroke7_pixeden',
			'iconsPerPage' => 4000, // default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value'   => 'stroke7_pixeden',
		),
		'description' => __( 'Select icon from library.', 'apicona' ),
		'std'         => 'pe-7s-album',
		'weight'      => 1,
	));*/
	
	
	
	
	// Progress Bar - color
	$param  = WPBMap::getParam( 'vc_progress_bar', 'bgcolor' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		/*$param['dependency'] = array(
			'element'            => 'style',
			'value_not_equal_to' => array( 'transparent' )
		);*/
		$param['std']   = 'skincolor';
		vc_update_shortcode_param( 'vc_progress_bar', $param );
	}
	
	// Progress Bar - Colors (new)
	$param  = WPBMap::getParam( 'vc_progress_bar', 'values' );
	if( isset($param['params']) && count($param['params'])>0 ){
		$x = 0;
		foreach($param['params'] as $option){
			if( isset($option['param_name']) && $option['param_name']=='color' && isset($option['heading']) && $option['heading']=='Color' ){
				$value = $param['params'][$x]['value'];
				$value = array_reverse($option['value']);
				$value[__( 'Skin color', 'apicona' )] = 'skincolor';
				$value = array_reverse($value);
				$param['params'][$x]['value'] = $value;
			}
			$x++;
		}
		vc_update_shortcode_param( 'vc_progress_bar', $param );
	}
	
	
	/**
	 *  Chanding default value of some elements
	 */
	
	// Setting default value for Tab element
	$param  = WPBMap::getParam( 'vc_tta_tabs', 'shape' );  // Shape
	$param['std']   = 'square';
	vc_update_shortcode_param( 'vc_tta_tabs', $param );
	
	$param  = WPBMap::getParam( 'vc_tta_tabs', 'color' );  // Color
	$param['std']   = 'white';
	vc_update_shortcode_param( 'vc_tta_tabs', $param );
	
	$param  = WPBMap::getParam( 'vc_tta_tabs', 'no_fill_content_area' );  // Do not fill content area?
	$param['std']   = 'true';
	vc_update_shortcode_param( 'vc_tta_tabs', $param );
	
	
	// Setting default value for Tour element
	$param  = WPBMap::getParam( 'vc_tta_tour', 'shape' );  // Shape
	$param['std']   = 'square';
	vc_update_shortcode_param( 'vc_tta_tour', $param );
	
	$param  = WPBMap::getParam( 'vc_tta_tour', 'color' );  // Color
	$param['std']   = 'white';
	vc_update_shortcode_param( 'vc_tta_tour', $param );
	
	$param  = WPBMap::getParam( 'vc_tta_tour', 'no_fill_content_area' );  // Do not fill content area?
	$param['std']   = 'true';
	vc_update_shortcode_param( 'vc_tta_tour', $param );
	
	
	
}
add_action( 'vc_after_init', 'tm_add_extra_options' );






/*
function tm_vc_after_init(){
	
	// For CTA order
	//$param     = WPBMap::getParam( 'vc_cta', 'h2' );
	//$param_val = $param['value'];
	//if( is_array($param_val) ){
	//	$param['weight'] = 1;
	//	vc_update_shortcode_param( 'vc_cta', $param );
	//}
	
	
	// Icon library
	$param  = WPBMap::getParam( 'vc_icon', 'type' );
	$library = $param['value'];
	if( is_array($library) ){
		$library = array_reverse($library);
		$library[__( 'Stroke 7 Icon Font (from Pixeden)', 'apicona' )] = 'stroke7_pixeden';
		$param['value']  = array_reverse($library);
		$param['std']    = 'stroke7_pixeden';
		$param['weight'] = 11;
		vc_update_shortcode_param( 'vc_icon', $param );
	}
	
	vc_add_param( 'vc_icon', array(  // Icon library
		'type'       => 'iconpicker',
		'heading'    => __( 'Stroke 7 Icon', 'apicona' ),
		'param_name' => 'icon_stroke7_pixeden',
		'value'      => 'vc_li vc_li-heart', // default value to backend editor admin_label
		'settings'   => array(
			'emptyIcon'    => false, // default true, display an "EMPTY" icon?
			'type'         => 'stroke7_pixeden',
			'iconsPerPage' => 4000, // default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value'   => 'stroke7_pixeden',
		),
		'description' => __( 'Select icon from library.', 'apicona' ),
		'std'         => 'pe-7s-album',
		'weight'      => 12,
	));
	
}
//add_action( 'vc_after_init', 'tm_vc_after_init', 1 );
*/








/**
 * Adding extra parameters in VC
 */
function tm_vc_add_extra_param(){
	vc_add_param( 'vc_row', array(
		"type"        => "checkbox",
		"heading"     => __("Equal Height of each Column", "apicona"),
		"description" => __("This will set equal height of each column in this ROW.", "apicona"),
		"param_name"  => "equalheight",
		/*"value"       => array(
			__("Default", "apicona")     => "default",
			__("Dark Color", "apicona")  => "dark",
			__("White Color", "apicona") => "white",
			__("Skin Color", "apicona")  => "skin",
		),*/
	));
	vc_add_param( 'vc_row', array(
		"type"        => "dropdown",
		"heading"     => __("Text Color", "apicona"),
		"description" => __("Select text color.", "apicona"),
		"param_name"  => "textcolor",
		"value"       => array(
			__("Default", "apicona")     => "default",
			__("Dark Color", "apicona")  => "dark",
			__("White Color", "apicona") => "white",
			__("Skin Color", "apicona")  => "skin",
		),
	));
	vc_add_param( 'vc_row', array(
		"type"        => "dropdown",
		"heading"     => __("Background Color", "apicona"),
		"description" => __("Select Background Color. If you select color and also select background Video or background Image then the color will be overlay with some opacity.", "apicona"),
		"param_name"  => "bgtype",
		"value"       => array(
			__("Background Color & Image set in \"Design Options\" tab (default)", "apicona") => "default",
			__("Skin Color as Background Color", "apicona") => "skin",
			__("Grey Color as Background Color", "apicona") => "grey",
			__("Dark Color as Background Color", "apicona") => "dark",
		),
	));
	vc_add_param( 'vc_row', array(
		"type"        => "checkbox",
		"heading"     => esc_html__("Break column in Tablet", "apicona"),
		"description" => esc_html__("Break columns in Tablet mode (<996 screen size). This is useful if your content breaks (or not fit) due to columns in tablet mode.", "apicona"),
		"param_name"  => "break_in_responsive_996",
	));
	
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => __("Text Color", "apicona"),
		"description" => __("Select text color.", "apicona"),
		"param_name"  => "textcolor",
		"value"       => array(
			__("Default", "apicona")     => "default",
			__("Skin Color", "apicona")  => "skin",
			__("Dark Color", "apicona")  => "dark",
			__("White Color", "apicona") => "white",
		),
	));
	vc_add_param( 'vc_column', array(
		"type"        => "dropdown",
		"heading"     => __("Background Color", "apicona"),
		"description" => __("Select Background Color. If you select color and also select background Image then the color will be overlay with some opacity.", "apicona"),
		"param_name"  => "bgcolor",
		"value"       => array(
			__("Background Color & Image set in \"Design Options\" tab (default)", "apicona") => "default",
			__("Skin Color as Background Color", "apicona") => "skin",
			__("Dark Color as Background Color", "apicona") => "dark",
			__("Grey Color as Background Color", "apicona") => "grey",
		),
	));
	
	/*vc_add_param( 'vc_icon', array(  // Icon library
		'type'       => 'iconpicker',
		'heading'    => __( 'Stroke 7 Icon', 'apicona' ),
		'param_name' => 'icon_stroke7_pixeden',
		'value'      => 'vc_li vc_li-heart', // default value to backend editor admin_label
		'settings'   => array(
			'emptyIcon'    => false, // default true, display an "EMPTY" icon?
			'type'         => 'stroke7_pixeden',
			'iconsPerPage' => 4000, // default 100, how many icons per/page to display
		),
		'dependency' => array(
			'element' => 'type',
			'value'   => 'stroke7_pixeden',
		),
		'description' => __( 'Select icon from library.', 'apicona' ),
		'std'         => 'pe-7s-album',
		'weight'      => 1,
	));*/
	
	
}
add_action( 'vc_before_init', 'tm_vc_add_extra_param' );






/**
 * Remove option from ROW element.
 */
if( function_exists('vc_remove_param') ){
	vc_remove_param( "vc_row", "gap" ); 			// remove columns gap param from vc_row
	vc_remove_param( "vc_row", "equal_height" ); 	// remove equal_heighy param from vc_row
}




/**
 * Remove VC Metaboxes
 */
add_action( 'admin_head', 'thememount_remove_vc_meta_box' );
function thememount_remove_vc_meta_box() {
	remove_meta_box("vc_teaser", "portfolio", "side");
	remove_meta_box("vc_teaser", "page", "side"); 
	remove_meta_box("vc_teaser", "product", "side"); 
}




/*
 *  GLOBAL: Carousel Options
 */
function tm_box_params($boxtype=''){
	
	$boxview = array(
				__('Row and Column (default)','apicona') => 'default',
				__('Carousel effect','apicona')          => 'carousel',
			);
	if( $boxtype=='blog' ){
		$boxview[__('Timeline view','apicona')] = 'timeline';
	}
	
	$boxOprions = array(
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Extra class name', 'apicona' ),
			'param_name'  => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => __("Box View",'apicona'),
			"description" => __("Select box view. Show as normal row and column or show with carousel effect.",'apicona'),
			"param_name"  => "view",
			"value"       => $boxview,
			'group'       => __( 'Box Design', 'apicona' ),
			'std'         => 'default',
		),
		array(
			"type"        => "dropdown",
			"heading"     => __("Column", "apicona"),
			"param_name"  => "column",
			"description" => __("Select column.", "apicona"),
			"value"       => array(
				__("One Column",    "apicona") => "one",
				__("Two Columns",   "apicona") => "two",
				__("Three Columns", "apicona") => "three",
				__("Four Columns",  "apicona") => "four",
				__("Five Columns",  "apicona") => "five",
				__("Six Columns",   "apicona") => "six",
			),
			'std'         => 'three',
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   			=> 'view',
				'value_not_equal_to' 	=> array( 'timeline' ),
				'element'   			=> 'boxdesign',
				'value_not_equal_to' 	=> array( 'onecol' ),
				
				//'value'     => array( 'timeline' ),
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Timeline: Group by', 'apicona' ),
			'param_name' => 'timeline_groupby',
			'value'      => array(
				__( 'Monthly grouping', 'apicona' ) => 'monthly',
				__( 'Yearly grouping', 'apicona' )  => 'yearly'
			),
			'description' => __( 'Timeline: Show timeline view in which group by.', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'timeline' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'monthly',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Timeline: Box view', 'apicona' ),
			'param_name' => 'timeline_boxview',
			'value'      => array(
				__( 'Simple view - without featured image', 'apicona' ) => 'simple',
				__( 'Simple view - with featured image', 'apicona' )    => 'simple_with_fetured',
				__( 'Box view', 'apicona' )                             => 'box',
			),
			'description' => __( 'Timeline: Show timeline view in which group by.', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'timeline' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'monthly',
		),
		
		// Auto Play
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Carousel: Autoplay', 'apicona' ),
			'param_name' => 'carousel_autoplay',
			'value'      => array(
				__( 'Yes', 'apicona' ) => '1',
				__( 'No', 'apicona' )  => '0'
			),
			'description' => __( 'Carousel Effect: Autoplay', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		
		// autoplaySpeed
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Carousel: autoplaySpeed', 'apicona' ),
			'param_name'  => 'carousel_autoplayspeed',
			'description' => __( 'Carousel Effect: autoplay speed. Inert numbers only. Default value is "800".', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '800',
		),
		
		// autoplayTimeout
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Carousel: autoplayTimeout (Pause time)', 'apicona' ),
			'param_name'  => 'carousel_autoplaytimeout',
			'description' => __( 'Carousel Effect: Autoplay interval timeout. Default value is "4500".', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '4500',
		),
		
		// loop
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Carousel: Loop Item', 'apicona' ),
			'param_name' => 'carousel_loop',
			'value'      => array(
				__( 'No', 'apicona' )  => '0',
				__( 'Yes', 'apicona' ) => '1',
			),
			'description' => __( 'Carousel Effect: Inifnity loop. Duplicate last and first items to get loop illusion.', 'apicona' ).'<br><strong>'.__( 'NOTE:', 'apicona' ).' </strong> '.__( 'If you select NO then the carousel will rewind all and start from 1st item. Also this will work if you enabled "Autoplay".', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		
		
		
		array(
			'type'       => 'animation_style',
			'heading'    => __( 'Animation In', 'apicona' ),
			'param_name' => 'carousel_animatein',
			'group'      => __( 'Box Design', 'apicona' ),
			'settings'   => array(
				'type'     => array( 'in', 'other' ),
			),
			'dependency' => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'carousel' ),
			),
			'description' => __( 'Select "animation in" for page transition.', 'apicona' ) . '<br><strong>' . __('NOTE:','apicona') . '</strong>  ' . __('Animate functions work only with "One Column" option and only in browsers that support perspective property.','apicona'),
		),
		array(
			'type'       => 'animation_style',
			'heading'    => __( 'Animation Out', 'apicona' ),
			'param_name' => 'carousel_animateout',
			'group'      => __( 'Box Design', 'apicona' ),
			'settings'   => array(
				'type'     => array( 'out' ),
			),
			'dependency' => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'carousel' ),
			),
			'description' => __( 'Select "animation out" for page transition.', 'apicona' ) . '<br><strong>' . __('NOTE:','apicona') . '</strong>  ' . __('Animate functions work only with "One Column" option and only in browsers that support perspective property.','apicona'),
		),
		
		// Dots
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Carousel: dots', 'apicona' ),
			'param_name' => 'carousel_dots',
			'value'      => array(
				__('No', 'apicona') => 'false',
				__('Yes', 'apicona') => 'true',
				
			),
			'description' => __( 'Carousel Effect: Show dots navigation.', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'false',
		),
		// Next/Prev links
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Carousel: Next/Prev Links (nav)', 'apicona' ),
			'param_name' => 'carousel_nav',
			'value'      => array(
				__('Above Carousel', 'apicona')       => 'above',
				__('Before / After boxes', 'apicona') => 'true',
				__('Hide', 'apicona')                 => 'false',
				
			),
			'description' => __( 'Carousel Effect: Show dots navigation.', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				//'value_not_equal_to' => array( 'ids', 'custom' ),
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'above',
		),
		
		
		
		// autoplayHoverPause
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Carousel: autoplayHoverPause', 'apicona' ),
			'param_name' => 'carousel_autoplayHoverPause',
			'value'      => array(
				__('Yes', 'apicona') => 'true',
				__('No', 'apicona')  => 'false',
			),
			'description' => __( 'Carousel Effect: Pause on mouse hover.', 'apicona' ),
			'group'       => __( 'Box Design', 'apicona' ),
			'dependency'  => array(
				'element'   => 'view',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'true',
		),
		
		
	);
	
	return $boxOprions;
}





/*
 *  GLOBAL: Heading Options in Visual Composer element
 */
function tm_vc_heading_params($data=''){
	$h2_custom_heading = vc_map_integrate_shortcode( 'vc_custom_heading', 'h2_', __( 'Heading', 'apicona' ),
		array(
			'exclude' => array(
				'text',
				'source',
				'css',
				'el_class',
			),
		),
		array(
			'element' => 'use_custom_fonts_h2',
			'value'   => 'true',
		)
	);


	// This is needed to remove custom heading _tag and _align options.
	if ( is_array( $h2_custom_heading ) && ! empty( $h2_custom_heading ) ) {
		foreach ( $h2_custom_heading as $key => $param ) {
			if ( is_array( $param ) && isset( $param['type'] ) && $param['type'] == 'font_container' ) {
				if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
					$sub_key = array_search( 'tag', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['tag'] ) ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields']['tag'] );
					}
					$sub_key = array_search( 'text_align', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['text_align'] ) ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields']['text_align'] );
					}
				}
			}
		}
	}


	$h4_custom_heading = vc_map_integrate_shortcode( 'vc_custom_heading', 'h4_', __( 'Subheading', 'apicona' ),
		array(
			'exclude' => array(
				'text',
				'source',
				'css',
				'el_class',
			),
		),
		array(
			'element' => 'use_custom_fonts_h4',
			'value' => 'true',
		)
	);

	// This is needed to remove custom heading _tag and _align options.
	if ( is_array( $h4_custom_heading ) && ! empty( $h4_custom_heading ) ) {
		foreach ( $h4_custom_heading as $key => $param ) {
			if ( is_array( $param ) && isset( $param['type'] ) && $param['type'] == 'font_container' ) {
				if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
					$sub_key = array_search( 'tag', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['tag'] ) ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields']['tag'] );
					}
					$sub_key = array_search( 'text_align', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['text_align'] ) ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields']['text_align'] );
					}
				}
			}
		}
	}

	
	
	$params = array_merge(
		array(
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Heading', 'apicona' ),
				'admin_label' => true,
				'param_name'  => 'h2',
				'save_always' => true,
				'value'       => __( 'Welcome', 'apicona' ),
				'description' => __( 'Enter text for heading line.', 'apicona' ),
				'edit_field_class' => 'vc_col-sm-9 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Use custom font?', 'apicona' ),
				'param_name' => 'use_custom_fonts_h2',
				'description' => __( 'Enable Google fonts.', 'apicona' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),

		),
		$h2_custom_heading,
		array(
			array(
				'type'             => 'textfield',
				'heading'          => __( 'Subheading', 'apicona' ),
				'param_name'       => 'h4',
				//'value'            => 'Welcome to our site',
				'description'      => __( 'Enter text for subheading line.', 'apicona' ),
				'edit_field_class' => 'vc_col-sm-9 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Use custom font?', 'apicona' ),
				'param_name'       => 'use_custom_fonts_h4',
				'description'      => __( 'Enable custom font option.', 'apicona' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
		),
		$h4_custom_heading,
		array(
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Text alignment', 'apicona' ),
				'param_name'  => 'txt_align',
				'value'       => getVcShared( 'text align' ), // default left
				'description' => __( 'Select text alignment.', 'apicona' ),
				'std'         => 'left',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Separator Line With Heading', 'apicona' ),
				'param_name'  => 'heading_sep',
				'value'       => array(
						__('Yes', 'apicona') => 'yes',
						__('No', 'apicona')  => 'no',
				),
				'description' => __( 'Show line with heading.', 'apicona' ),
				'std'         => 'yes',
			)
		)
	);
	
	
	// Setting default font settings.. Make sure you change this when change default value in Redux Options
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'h2_google_fonts' ){
			$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
		} else if( $param_name == 'h4_google_fonts' ){
			$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
		}
		
		if($param_name == 'h2'){
			$params[$i]['param_name']='title';
		}else if($param_name == 'h4'){
			$params[$i]['param_name']='subtitle';
		}else if($param_name == 'txt_align'){
			$params[$i]['param_name']='align';
		}
		
		$i++;
	}; // Foreach
	
	
	
	return $params;
}




/**
 *  Adding custom elements in Visual Composer
 */
add_action( 'vc_after_init', 'tm_vc_custom_element_servicebox', 21 );
add_action( 'init', 'tm_vc_custom_element_blogbox' );	
add_action( 'init', 'tm_vc_custom_element_portfoliobox', 21 );
add_action( 'init', 'tm_vc_custom_element_team', 21 );
add_action( 'init', 'tm_vc_custom_element_testimonial', 21 );
add_action( 'init', 'tm_vc_custom_element_clients', 21 );
add_action( 'vc_after_init', 'tm_vc_custom_element_facts_in_digits', 21 );
add_action( 'init', 'tm_vc_custom_element_twitterbox' );
add_action( 'init', 'tm_vc_custom_element_icon_separator' );
add_action( 'init', 'tm_vc_custom_element_heading' );
add_action( 'init', 'tm_vc_custom_element_contactbox' );
add_action( 'init', 'tm_vc_custom_element_list' );
add_action( 'init', 'tm_vc_custom_element_eventsbox', 21 );
add_action( 'init', 'tm_vc_custom_element_socialbox' );
add_action( 'init', 'tm_vc_custom_element_schedulebox' );

/*Service box old element*/
add_action( 'init', 'tm_vc_custom_element_servicebox_old' );







/**
 *  ThemeMount: Schedule Box
 */
function tm_vc_custom_element_schedulebox(){
	


	$params = array_merge(
		tm_vc_heading_params(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Extra class name', 'apicona' ),
				'param_name'  => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apicona' ),
			),
			array(
			'type' => 'param_group',
			'heading' => __( 'Schedule Timings', 'apicona' ),
			'param_name' => 'scheduler',
			'group'       => __( 'Scheduler', 'apicona' ),
			'description' => __( 'Set schedule timings', 'apicona' ),
			'value' => urlencode( json_encode( array(
				array(
					'weekday' => __( 'Monday', 'apicona' ),
					'timing' => '09:00 - 17:00',
				),
				array(
					'weekday' => __( 'Tuesday', 'apicona' ),
					'timing' => '09:00 - 17:00',
				),
				array(
					'weekday' => __( 'Wednesday', 'apicona' ),
					'timing' => '09:00 - 17:00',
				),
				array(
					'weekday' => __( 'Thursday', 'apicona' ),
					'timing' => '09:00 - 17:00',
				),
				array(
					'weekday' => __( 'Friday', 'apicona' ),
					'timing' => '09:00 - 17:00',
				),
				array(
					'weekday' => __( 'Saturday', 'apicona' ),
					'timing' => '09:00 - 17:00',
				),
				array(
					'weekday' => __( 'Sunday', 'apicona' ),
					'timing' => 'Closed',
				),
			))),
			'params' => array(
				array(
						'type'        => 'textarea',
						'heading'     => __( 'Month / Weekday', 'apicona' ),
						'param_name'  => 'weekday',
						'description' => __( 'Fill Month or Weekday information here', 'apicona' ),
						// 'value'       => '',
						'group'       => __( 'Scheduler', 'apicona' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
						'type'        => 'textarea',
						'heading'     => __( 'Timings', 'apicona' ),
						'param_name'  => 'timing',
						// 'value'       => '',
						'description' => __( 'Fill Timing details here eg: 11:00AM to 02:00PM', 'apicona' ),
						'group'       => __( 'Scheduler', 'apicona' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				
			),
		),
			
			
		)
	);
	

	
	global $tm_vc_custom_element_schedulebox;
	$tm_vc_custom_element_schedulebox = $params;
	
	

	vc_map( array(
		'name'        => __( 'ThemeMount Schedule Box', 'apicona' ),
		'base'        => 'tm-schedulebox',
		"icon"        => "icon-thememount-vc",
		'category'    => __( 'ThemeMount Special Elements', 'apicona' ),
		'params'      => $params,
	) );
}


/**
 *  ThemeMount: Social Box
 */
function tm_vc_custom_element_socialbox(){
	
	// Social services
	$sociallist = array(
		__('Select service','apicona') => '',
		'Twitter'      => 'twitter',
		'YouTube'      => 'youtube',
		'Flickr'       => 'flickr',
		'Facebook'     => 'facebook',
		'LinkedIn'     => 'linkedin',
		'Google+'      => 'gplus',
		'yelp'         => 'yelp',
		'Dribbble'     => 'dribbble',
		'Pinterest'    => 'pinterest',
		'Podcast'      => 'podcast',
		'Instagram'    => 'instagram',
		'Xing'         => 'xing',
		'Vimeo'        => 'vimeo',
		'VK'           => 'vk',
		'Houzz'        => 'houzz',
		'Issuu'        => 'issuu',
		'Google Drive' => 'google-drive',
		'Rss Feed'     => 'rss',
	);

	$params = array_merge(
		tm_vc_heading_params(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Extra class name', 'apicona' ),
				'param_name'  => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apicona' ),
			),
			array(
				'type'        => 'param_group',
				'heading'     => __( 'Social Services List', 'apicona' ),
				'param_name'  => 'socialservices',
				'description' => __( 'Select social service and add URL for it.', 'apicona' ).'<br><strong>'.__('NOTE:','apicona').'</strong> '.__("You don't need to add URL if you are selecting 'RSS' in the social service",'apicona'),
				'group'       => __( 'Social Services', 'apicona' ),
				'params'     => array(
					array( // First social service
						'type'        => 'dropdown',
						'heading'     => __( 'Select Social Service', 'apicona' ),
						'param_name'  => 'servicename',
						'std'         => 'none',
						'value'       => $sociallist,
						'description' => __( 'Select social service', 'apicona' ),
						'group'       => __( 'Social Services', 'apicona' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-4 vc_column',
					),
					array(
						'type'        => 'textarea',
						'heading'     => __( 'Social URL', 'apicona' ),
						'param_name'  => 'servicelink',
						'dependency'  => array(
							'element'            => 'servicename',
							'value_not_equal_to' => array( 'rss' )
						),
						'value'       => '',
						'description' => __( 'Fill social service URL', 'apicona' ),
						'group'       => __( 'Social Services', 'apicona' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-8 vc_column',
					),
				),
			),
			array( // First social service
				'type'        => 'dropdown',
				'heading'     => __( 'Select column', 'apicona' ),
				'param_name'  => 'column',
				'value'       => array(
					__('One column','apicona')   => 'one',
					__('Two column','apicona')   => 'two',
					__('Three column','apicona') => 'three',
					__('Four column','apicona')  => 'four',
					__('Five column','apicona')  => 'five',
					__('Six column','apicona')   => 'six',
				),
				'std'         => 'six',
				'description' => __( 'Select how many column will show the social icons', 'apicona' ),
				'group'       => __( 'Social Services', 'apicona' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array( // First social service
				'type'        => 'dropdown',
				'heading'     => __( 'Social icon size', 'apicona' ),
				'param_name'  => 'iconsize',
				'std'         => 'large',
				'value'       => array(
					__('Small icon','apicona')  => 'small',
					__('Medium icon','apicona') => 'medium',
					__('Large icon','apicona')  => 'large',
				),
				'description' => __( 'Select social icon size', 'apicona' ),
				'group'       => __( 'Social Services', 'apicona' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
		)
	);
	
	global $tm_sc_params_socialbox;
	$tm_sc_params_socialbox = $params;
	
	vc_map( array(
		'name'        => __( 'ThemeMount Social Box', 'apicona' ),
		'base'        => 'tm-socialbox',
		"icon"        => "icon-thememount-vc",
		'category'    => __( 'ThemeMount Special Elements', 'apicona' ),
		'params'      => $params,
	) );
}





/**
 *  ThemeMount: Service Box
 */
function tm_vc_custom_element_servicebox(){

	
	$bgcolor_custom = array();
	$bgcolor_custom[__( 'Transparent', 'apicona' )] = 'transparent';
	$bgcolor_custom[__( 'Skin color', 'apicona' )]  = 'skincolor';
	$boxcolor =   array_merge( $bgcolor_custom , getVcShared( 'colors-dashed' ) ) ;
	

	// Icon options
	$iconOptions    = vc_map_integrate_shortcode( 'vc_icon', 'i_', __( 'Icon', 'apicona' ),
		array(
			'exclude' => array( 'align', 'el_class', 'css_animation', 'link', 'css' ),
		),
		array(
			'element'   => 'icon_type',
			'value' 	=> 'icon',
		)
	);
	
	$iconOptionsNew = array();
	$i              = 0;
	foreach ($iconOptions as $key => $value){
		$iconOptionsNew[] = $value;
		if ( isset($value['param_name']) && $value['param_name']=='i_background_style'){
			$iconOptionsNew[] = array(
				'type'        => 'dropdown',
				'heading'     => __( 'Icon Hower Effect', 'apicona' ) . '?',
				'description' => __( 'Select YES if you like to apply hover effect to the icon.', 'apicona' ) . '<br>' . __( 'Please note that the HOVER color will be SKIN Color and normal color will be the "Background Color" selected below.', 'apicona' )  ,
				'param_name'  => 'icon_hover',
				'value'       => array(
					__( 'No', 'apicona' )  => '',
					__( 'Yes', 'apicona' ) => 'yes',
				),
				'std' 		  => '',
				'dependency'  => array(
					'element'   => 'i_background_style',
					'value'     => array( 'rounded-outline' ),
				),
				'group' => 'Icon'
			);
		}
		
		$i++;
	}
	$iconOptions = $iconOptionsNew;
	
	//var_dump($iconOptions);
	
	$imageOptions = array(
			array(
			'type' 			=> 'attach_image',
			'heading' 		=> __( 'Image', 'apicona' ),
			'param_name' 	=> 'images',
			'value' 		=> '',
			'description' 	=> __( 'Select image from media library.', 'apicona' ),
			'group' 	 	=> __('Image','apicona'),
			'dependency' 	=> array(
				'element' 	=> 'icon_type',
				'value' 	=> 'image',
			),
		),
	);
	
	
	
	// heading element 
	$heading = tm_vc_heading_params();
	
	// reverse value of h2 / h4 / txt_align
	$i = 0;
	foreach( $heading as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		
		if($param_name == 'title'){
			$heading[$i]['param_name']='h2';
		}else if($param_name == 'subtitle'){
			$heading[$i]['param_name']='h4';
		}else if($param_name == 'align'){
			$heading[$i]['param_name']='txt_align';
		}
		
		$i++;
	}; 
	
	$params = array_merge(
		$heading,
		array(
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Box Border Shape', 'apicona' ),
				'param_name' => 'shape',
				'std'        => 'none',
				'value'      => array(
					__( 'None', 'apicona' )    => 'none',
					__( 'Square', 'apicona' )  => 'square',
					__( 'Rounded', 'apicona' ) => 'rounded',
					__( 'Round', 'apicona' )   => 'round',
				),
				'description' => __( 'Select Service Box shape.', 'apicona' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Box Style', 'apicona' ),
				'param_name' => 'style',
				'value'      => array(
					//__( 'Default', 'apicona' ) => 'default',
					__( 'Transparent', 'apicona' ) => 'transparent',
					__( 'Flat', 'apicona' )        => 'flat',
					__( 'Outline', 'apicona' )     => 'outline',
					__( '3d', 'apicona' )          => '3d',
					__( 'Custom', 'apicona' )      => 'custom',
				),
				'std'         => 'transparent',
				'description' => __( 'Select Service Box display style.', 'apicona' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Background color', 'apicona' ),
				'param_name'  => 'custom_background',
				'description' => __( 'Select custom background color.', 'apicona' ),
				'dependency'  => array(
					'element'   => 'style',
					'value'     => array( 'custom' )
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Text color', 'apicona' ),
				'param_name'  => 'custom_text',
				'description' => __( 'Select custom text color.', 'apicona' ),
				'dependency'  => array(
					'element'   => 'style',
					'value'     => array( 'custom' )
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Background Color', 'apicona' ),
				'param_name'  => 'color',
				'value'       => getVcShared( 'colors-dashed' ),
				'std'         => 'grey',
				'description'        => __( 'Select color schema.', 'apicona' ),
				'param_holder_class' => 'vc_colored-dropdown vc_cta3-colored-dropdown',
				'dependency'  => array(
					'element'   => 'style',
					//'value_not_equal_to' => array( 'custom' )
					'value'     => array( 'flat', 'outline', '3d' )
				),
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => __( 'Text', 'apicona' ),
				'param_name' => 'content',
				'value'      => __( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'apicona' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Add button', 'apicona' ) . '?',
				'description' => __( 'Add button to Service Box.', 'apicona' ),
				'param_name'  => 'add_button',
				'value'       => array(
					__( 'No', 'apicona' )  => '',
					__( 'Yes', 'apicona' ) => 'bottom',
				),
				'std' 		  => '',
				
			),
		),
		vc_map_integrate_shortcode( 'vc_btn', 'btn_', __( 'Button', 'apicona' ),
			array(
			'exclude' => array(
				'align',
				'button_block',
				'el_class',
				'css_animation',
				'css',
			),
		),
			array(
				'element' => 'add_button',
				'not_empty' => true,
			)
		),
		array(
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Icon position', 'apicona' ),
				'description' => __( 'Icon position in the Service box.', 'apicona' ),
				'param_name'  => 'add_icon',
				'std'         => 'top',
				'value'       => array(
					__( 'Top Center', 'apicona' )          => 'top',
					__( 'Left', 'apicona' )                => 'left',
					__( 'Right', 'apicona' )               => 'right',
					__( 'Top Left Corner', 'apicona' )     => 'topleft',
					__( 'Top Right Corner', 'apicona' )    => 'topright',
					__( 'Bottom', 'apicona' )              => 'bottom',
					__( 'Bottom Left Corner', 'apicona' )  => 'bottomleft',
					__( 'Bottom Right Corner', 'apicona' ) => 'bottomright',
				),
			),
			array(
				"type"       => "dropdown",
				"heading"    => __("Box Hover Effect",'apicona'),
				"param_name" => "hover",
				"value"      => array(
					__('None','apicona')         => 'none',
					__('Float Shadow','apicona') => 'hvr-float-shadow',
					__('Grow','apicona')         => 'hvr-grow',
					__('Shrink','apicona')       => 'hvr-shrink',
					__('Pulse','apicona')        => 'hvr-pulse',
					__('Pulse Grow','apicona')   => 'hvr-pulse-grow',
					__('Pulse Shrink','apicona') => 'hvr-pulse-shrink',
					__('Push','apicona')         => 'hvr-push',
					__('Pop','apicona')          => 'hvr-pop',
					__('Bounce In','apicona')    => 'hvr-bounce-in',
					__('Bounce Out','apicona')   => 'hvr-bounce-out',
					__('Rotate','apicona')       => 'hvr-rotate',
					__('Grow Rotate','apicona')  => 'hvr-grow-rotate',
					__('Float','apicona')        => 'hvr-float',
					__('Sink','apicona')         => 'hvr-sink',
					__('Bob','apicona')          => 'hvr-bob',
					__('Hang','apicona')         => 'hvr-hang',
					__('Skew','apicona')         => 'hvr-skew',
					__('Skew Forward','apicona') => 'hvr-skew-forward',
					__('Wobble Horizontal','apicona')      => 'hvr-wobble-horizontal',
					__('Wobble Vertical','apicona')        => 'hvr-wobble-vertical',
					__('Wobble To Bottom Right','apicona') => 'hvr-wobble-to-bottom-right',
					__('Wobble To Top Right','apicona')    => 'hvr-wobble-to-top-right',
					__('Wobble Top','apicona')             => 'hvr-wobble-top',
					__('Wobble Bottom','apicona')          => 'hvr-wobble-bottom',
					__('Wobble Skew','apicona')            => 'hvr-wobble-skew',
					__('Buzz','apicona')                   => 'hvr-buzz',
					__('Buzz Out','apicona')               => 'hvr-buzz-out',
				),
				"description" => __("Select hover effect.",'apicona'),
				'std'         => 'none',
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'icon_type',
				'heading'     => __( 'Select Icon Type', 'apicona' ),
				'description' => __( 'Icon can be "Icon" or Image.', 'apicona' ),
				'value'       => array( 
									__( 'Icon', 'apicona' ) 	=> 'icon',
									__( 'Image', 'apicona' ) => 'image',
								),
				'std'		  => 'icon',
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'i_on_border',
				'heading'     => __( 'Place icon on border?', 'apicona' ),
				'description' => __( 'Display icon on call to action element border.', 'apicona' ),
				'group'       => __( 'Icon', 'apicona' ),
				'value'       => array( __( 'Yes', 'apicona' ) => 'yes' ),
				'std'		  => '',
				'dependency'  => array(
					'element'   => 'icon_type',
					'value' 	=> 'icon',
				),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => __( 'CSS box', 'apicona' ),
				'param_name' => 'css',
				// 'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apicona' ),
				'group'      => __( 'Design Options', 'apicona' )
			),
		),
		$iconOptions,
		array(
			/// cta3
			vc_map_add_css_animation(),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Extra class name', 'apicona' ),
				'param_name'  => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apicona' )
			),
		),
		$imageOptions
	);
	
	// Changing modifying, adding extra options
	$i = 0;
	foreach( $params as $param ){
		
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		
		if( $param_name == 'btn_style' ){
			$style = $param['value'];
			if( is_array($style) ){
				$style = array_reverse($style);
				$style[__( 'Normal Text', 'apicona' )] = 'text';
				$params[$i]['value'] = array_reverse($style);
				$params[$i]['std']   = 'text';
			}
			
		} else if( $param_name == 'btn_color' ){
			$colors = $param['value'];
			if( is_array($colors) ){
				$colors = array_reverse($colors);
				$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
				$params[$i]['value'] = array_reverse($colors);
				$params[$i]['std']   = 'skincolor';
			}
		
		} else if( $param_name == 'color' ){
			$colors = $param['value'];
			if( is_array($colors) ){
				$colors = array_reverse($colors);
				$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
				$params[$i]['value'] = array_reverse($colors);
				$params[$i]['std']   = 'grey';
			}
		
		} else if( $param_name == 'btn_shape' ){
			$params[$i]['dependency'] = array(
				'element'            => 'btn_style',
				'value_not_equal_to' => array( 'text' )
			);
		} else if( $param_name == 'btn_title' ){
			$params[$i]['std'] = __( 'Read More', 'apicona' );
				
		} else if( $param_name == 'txt_align' ){
			$params[$i]['std'] = 'center';
			
		} else if( $param_name == 'btn_add_icon' ){
			$params[$i]['std']   = false;
			
		} else if( $param_name == 'i_type' ){
			$params[$i]['std'] = 'fontawesome';
		
		} else if( $param_name == 'i_icon_fontawesome' ){
			$params[$i]['std'] = 'fa fa-thumbs-o-up';
			
		} else if( $param_name == 'i_icon_openiconic' ){
			$params[$i]['std'] = 'vc-oi vc-oi-dial';
			
		} else if( $param_name == 'i_icon_typicons' ){
			$params[$i]['std'] = 'typcn typcn-adjust-brightness';
			
		} else if( $param_name == 'i_icon_entypo' ){
			$params[$i]['std'] = 'entypo-icon entypo-icon-note';
			
		} else if( $param_name == 'i_icon_linecons' ){
			$params[$i]['std'] = 'vc_li vc_li-heart';
			
		} else if( $param_name == 'i_background_style' ){
			$params[$i]['value'][__( 'None', 'apicona' )] = 'none';
			$params[$i]['std'] = 'rounded-outline';
			
		} else if( $param_name == 'i_background_color' ){
			$params[$i]['value'][__( 'None', 'apicona' )] = 'none';
			$params[$i]['std'] = 'grey';
			$params[$i]['dependency'] = array(
				'element'               => 'i_background_style',
				'value_not_equal_to'    => array( 'none' )
			);
		
		} else if( $param_name == 'i_size' ){
			$params[$i]['std'] = 'xl';
			
		} /*else if( $param_name == 'h2_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		} else if( $param_name == 'h4_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		}*/ else if( $param_name == 'h2_google_fonts' ){
			$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
		
		} else if( $param_name == 'h4_google_fonts' ){
			$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
			
		} else if( $param_name == 'heading_sep' ){
			$params[$i]['std'] = 'no';
		}
		
		$i++;
	} // Foreach
	
	

	
	global $tm_sc_params_servicebox;
	$tm_sc_params_servicebox = $params;
	
	
	vc_map( array(
		'name'        => __( 'ThemeMount Service Box', 'apicona' ),
		'base'        => 'tm-servicebox',
		"icon"        => "icon-thememount-vc",
		'category'    => __( 'ThemeMount Special Elements', 'apicona' ),
		'params'      => $params,
	) );
	
}


/** Service box (this is old element) **/
function tm_vc_custom_element_servicebox_old(){

// icons array
global $kwayy_iconsArray;
$allIcons = array();
foreach($kwayy_iconsArray as $icon ){
	$allIcons[ucwords(str_replace('-',' ',$icon))] = $icon;
}

	
	$newColors = array(
		__('Skin color', 'apicona') => 'skincolor',
		__('White', 'apicona') => 'white',
	);
	$newColorList =   array_merge( $newColors , getVcShared( 'colors-dashed' ) ) ;

vc_map( array(
	
	"name"     => __("Apicona Service Box (OLD)",'apicona'),
	"base"     => "servicebox",
	"class"    => "",
	'deprecated' => '12 Apicona',
	'category' => __( 'ThemeMount Special Elements', 'apicona' ),
	"icon"     => "icon-thememount-vc",
	"params"   => array(
		array(
			"param_name"  => "icon",
			"type"        => "kwayy_iconselector",
			"holder"      => "div",
			"class"       => "",
			"heading"     => __("Service Box Main Icon",'apicona'),
			"value"       => $allIcons,
			"std"     => 'fa-skype',
			"description" => __("Select icon for the Service Box.",'apicona'),
			"group"       => __( "Content Options", "apicona" ),
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("Title",'apicona'),
			"param_name"	=> "title",
			"description"	=> __("Main title.",'apicona'),
			"group"       => __( "Content Options", "apicona" ),
		),
		array(
			'type'        => 'vc_link',
			"holder"      => "div",
			'heading'     => __("Title Link",'apicona'),
			'param_name'  => 'titlelink',
			"description" => __("Add URL here if you like to add link to the title. If you don't want to add link, then leave this field blank.",'apicona'),
			"group"       => __( "Content Options", "apicona" ),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Sub Title",'apicona'),
			"param_name" => "subtitle",
			//"value" => '',
			"description" => __("Subtitle.",'apicona'),
			"group"       => __( "Content Options", "apicona" ),
		),
		array(
			"type" => "textarea",
			"holder" => "div",
			"class" => "",
			"heading" => __("Content",'apicona'),
			"param_name" => "contents",
			"value" => "",
			"description" => __("Content in normal text.",'apicona'),
			"group"       => __( "Content Options", "apicona" ),
		),

		array(
			"type"       => "dropdown",
			"holder"     => "div",
			"class"      => "",
			"heading"    => __("Bottom Link Type",'apicona'),
			"param_name" => "buttontype",
			"value" => array(
				__('No link','apicona')                  => 'no',
				__('Text Link without icon','apicona')   => 'text',
				__('Text Link with icon','apicona')      => 'icontext',
				__('Button link without icon','apicona') => 'btn',
				__('Button link with icon','apicona')    => 'iconbtn'
			),
			"description" => __("Select button type.",'apicona'),
			'group'       => __( 'Text/Button Options', 'apicona' ),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Button/Link Text",'apicona'),
			"param_name" => "buttontext",
			//"value" => __("Default params value"),
			"description" => __("Write button text here.",'apicona'),
			'dependency'  => array(
				'element'   => 'buttontype',
				'value_not_equal_to' => array( 'no' ),
				//'value'     => array( 'carousel' ),
			),
			'group'       => __( 'Text/Button Options', 'apicona' ),
		),
		array(
			'type'        => 'vc_link',
			"holder"      => "div",
			'heading'     => __("Button Link",'apicona'),
			'param_name'  => 'buttonlink',
			"description" => __("Button link URL.",'apicona'),
			'dependency'    => array(
				'element'   => 'buttontype',
				'value_not_equal_to' => array( 'no' ),
				//'value'       => array( 'btn','iconbtn' ),
			),
			'group'       => __( 'Text/Button Options', 'apicona' ),
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Box Style",'apicona'),
			"param_name" => "boxtype",
			"value" => array(
				__('Left Icon (Rounded icon)','apicona')	=> 'lefticon',
				__('Left Icon','apicona')					=> 'lefticonspacing',
				__('Center Icon','apicona')				=> 'centericon',
				__('Center Icon with Border','apicona')	=> 'bordercentericon',
				__('Right Icon (Rounded icon)','apicona')	=> 'righticon',
				__('Right Icon','apicona')					=> 'righticonspacing',
			),
			"description" => __("There are different look of Service Boxes.",'apicona'),
			"group"       => __( "Box Options", "apicona" ),
			'std'         => 'lefticon',
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Box Hover Effect",'apicona'),
			"param_name" => "hover",
			"value" => array(
				__('None','apicona')         => '',
				__('Float Shadow','apicona') => 'float-shadow',
				__('Grow','apicona')         => 'grow',
				__('Shrink','apicona')       => 'shrink',
				__('Skew','apicona')         => 'skew',
				__('Skew Forward','apicona') => 'skew-forward',
				__('Rotate','apicona')       => 'rotate',
				__('Grow Rotate','apicona')  => 'grow-rotate',
				__('Float','apicona')        => 'float',
				__('Sink','apicona')         => 'sink',
			),
			"description" => __("Select hover effect.",'apicona'),
			"group"       => __( "Box Options", "apicona" ),
			'std'         => 'none',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> __( 'Button Style', 'apicona' ),
			'param_name'	=> 'buttonstyle',
			'value'			=> getVcShared( 'button styles' ),
			'description'	=> __( 'Select button style.', 'apicona' ),
			'dependency'    => array(
				'element'   => 'buttontype',
				//'value_not_equal_to' => array( 'no' ),
				'value'       => array( 'btn','iconbtn' ),
			),
			'group'         => __( 'Text/Button Options', 'apicona' ),
			'std'         => 'square',
		),
		array(
			"type" 				 => "dropdown",
			"holder" 			 => "div",
			"class" 			 => "",
			"heading" 			 => __("Button Color",'apicona'),
			"param_name" 		 => "buttoncolor",
			"value" 			 => $newColorList,
			"description" 		 => __("Select button Color.",'apicona'),
			'param_holder_class' => 'vc-colored-dropdown',
			'dependency'    => array(
				'element'   => 'buttontype',
				//'value_not_equal_to' => array( 'no' ),
				'value'       => array( 'btn','iconbtn' ),
			),
			'group'              => __( 'Text/Button Options', 'apicona' ),
			"std"         => 'skincolor',
		),
		array(
			'type'			=> 'dropdown',
			"heading"		=> __("Button Size",'apicona'),
			'param_name'	=> 'buttonsize',
			'value'			=> getVcShared( 'sizes' ),
			'std'			=> 'md',
			"description"	=> __("Select button size.",'apicona'),
			'dependency'    => array(
				'element'   => 'buttontype',
				//'value_not_equal_to' => array( 'no' ),
				'value'       => array( 'btn','iconbtn' ),
			),
			'group'         => __( 'Text/Button Options', 'apicona' ),
		),
			array(
			"param_name"  => "buttonicon",
			"type"        => "kwayy_iconselector",
			"holder"      => "div",
			"class"       => "",
			"heading"     => __("Button Icon",'apicona'),
			"value"       => $allIcons,
			"std"         => 'fa-angle-right',
			"description" => __("Select icon for the Service Box.",'apicona'),
			'dependency'    => array(
				'element'   => 'buttontype',
				//'value_not_equal_to' => array( 'no' ),
				'value'       => array( 'icontext','iconbtn' ),
			),
			'group'       => __( 'Text/Button Options', 'apicona' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "vc_sb_iconposition",
			"heading"     => __("Icon Position in Button", "apicona"),
			"param_name"  => "btniconposition",
			"value" => array(
				__('Icon at left in Button','apicona')  => 'left',
				__('Icon at right in Button','apicona') => 'right'
			),
			"description" => __("Select position for icon in button.",'apicona'),
									'dependency'    => array(
				'element'   => 'buttontype',
				//'value_not_equal_to' => array( 'no' ),
				'value'       => array( 'icontext','iconbtn' ),
			),
			'group'       => __( 'Text/Button Options', 'apicona' ),
			"std"         => 'right',
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("CSS Animation", "apicona"),
			"param_name" => "css_animation",
			"value" => array(__('No','apicona')=>'',__('Top to bottom','apicona')=>'top-to-bottom',__('Bottom to top','apicona')=>'bottom-to-top',__('Left to right','apicona')=>'left-to-right', __('Right to left','apicona')=>'right-to-left',__('Appear from center','apicona')=>'appear' ),
			"description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "apicona"),
			'group'       => __( 'Other Options', 'apicona' ),
		),
	)
) );

}
/** END OF Service box (this is old element) **/




/**
 *  ThemeMount: Blog Box
 */
function tm_vc_custom_element_blogbox(){

	$postCatList    = get_categories( array('hide_empty'=>false) );
	
	$catList = array();
	foreach($postCatList as $cat){
		$catList[ __($cat->name, 'apicona') . ' (' . $cat->count . ')' ] = $cat->slug;
	}
	
	$colors_arr = array(
		__( 'Grey', 'apicona' )      => 'wpb_button',
		__( 'Blue', 'apicona' )      => 'btn-primary',
		__( 'Turquoise', 'apicona' ) => 'btn-info',
		__( 'Green', 'apicona' )     => 'btn-success',
		__( 'Orange', 'apicona' )    => 'btn-warning',
		__( 'Red', 'apicona' )       => 'btn-danger',
		__( 'Black', 'apicona' )     => "btn-inverse"
	);

	
	
	$allParams = array(
	
			array(
				"type"        => "dropdown",
				"heading"     => __("Blog Image Linking", "apicona"),
				"param_name"  => "linking",
				"description" => __("Set link for Blog single post on the Blog Featured Image. ", "apicona"),
				"value"       => array(
					__("Yes", "apicona")   			=> "yes",
					__("No (default)", "apicona")   	=> "no",
				),
				'std'         => 'no',
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Show Pagination",'apicona'),
				"description" => __("Show pagination links below Events boxes.",'apicona'),
				"param_name"  => "pagination",
				"value"       => array(
					__('No','apicona')  => 'no',
					__('Yes','apicona') => 'yes',
				),
				'std'         => 'no',
			),
			array(
				"type"        => "checkbox",
				"heading"     => __("From Category", "apicona"),
				"description" => __("If you like to show posts from selected category then select the category here.", "apicona") . __("The bracket number shows how many posts there in the category.", "apicona"),
				"param_name"  => "category",
				"value"       => $catList,
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Show Posts",'apicona'),
				"description" => __("How many post you want to show.",'apicona'),
				"param_name"  => "show",
				"value"       => array(
					__('1','apicona')=>'1',
					__('2','apicona')=>'2',
					__('3','apicona')=>'3',
					__('4','apicona')=>'4',
					__('5','apicona')=>'5',
					__('6','apicona')=>'6',
					__('7','apicona')=>'7',
					__('8','apicona')=>'8',
					__('9','apicona')=>'9',
					__('10','apicona')=>'10',
					__('11','apicona')=>'11',
					__('12','apicona')=>'12',
					__('13','apicona')=>'13',
					__('14','apicona')=>'14',
					__('15','apicona')=>'15',
					__('16','apicona')=>'16',
					__('17','apicona')=>'17',
					__('18','apicona')=>'18',
					__('19','apicona')=>'19',
					__('20','apicona')=>'20',
					__('21','apicona')=>'21',
					__('22','apicona')=>'22',
					__('23','apicona')=>'23',
					__('24','apicona')=>'24',
				),
				"std"  => "3",
			),
			
			array(
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Button Text",'apicona'),
				"description" => __("Write button text here.",'apicona'),
				'group'       => __( 'Button Options', 'apicona' ),
				"param_name"  => "btntext",
			),
			array(
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Button Link (URL)",'apicona'),
				"description" => __("Write URL for the button.",'apicona'),
				'group'       => __( 'Button Options', 'apicona' ),
				"param_name"  => "btnlink",
			),
			
		);
		
		
	
	$boxParams = tm_box_params('blog');
	$params = array_merge( tm_vc_heading_params(), $allParams, $boxParams );
	
	
	// Changing default values
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'title' ){
			$params[$i]['std'] = 'Blog';
			
		} /*else if( $param_name == 'h2_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		} else if( $param_name == 'h4_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
				
		} */ else if( $param_name == 'align' ){
			$params[$i]['std'] = 'center';
			
		}
		$i++;
	}
	
	
	
	
	global $tm_sc_params_blogbox;
	$tm_sc_params_blogbox = $params;
	
	
	vc_map( array(
		"name"     => __('ThemeMount Blog Box','apicona'),
		"base"     => "blogbox",
		"class"    => "",
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		"icon"     => 'icon-thememount-vc',
		"params"   => $params,
	) );
}

	

/**
 *  ThemeMount: Portfolio Box
 */
function tm_vc_custom_element_portfoliobox(){
	
	global $apicona;
	
	$pf_type_title = ( isset($apicona['pf_type_title']) && trim($apicona['pf_type_title'])!='' ) ? __($apicona['pf_type_title'], 'apicona') : __('Practice Area','apicona');
	
	$pf_cat_title = ( isset($apicona['pf_cat_title']) && trim($apicona['pf_cat_title'])!='' ) ? __($apicona['pf_cat_title'], 'apicona') : __('Practice Area','apicona');
	
	$portfolioCatList = array();
	if( taxonomy_exists('portfolio_category') ){
		$portfolioCatList_data = get_terms( 'portfolio_category', array( 'hide_empty' => false ) );
		$portfolioCatList      = array();
		foreach($portfolioCatList_data as $cat){
			$portfolioCatList[ __($cat->name, 'apicona') . ' (' . $cat->count . ')' ] = $cat->slug;
		}
	}
	
	
	$allParams = array(
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Show Sortable Category Links",'apicona'),
				"description" => sprintf( __("Show sortable category links above %s items so user can sort by category by just single click.", 'apicona'), $pf_type_title ),
				"param_name"  => "sortable",
				"value"       => array(
					__('No','apicona')  => 'no',
					__('Yes','apicona') => 'yes',
				),
				"std"         => "no",
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Replace ALL word', 'apicona' ),
				'param_name'  => 'allword',
				'description' => __( 'Replace ALL word in sortable category links. Default is ALL word.', 'apicona' ),
				"std"         => "All",
				'dependency'  => array(
					'element'   => 'sortable',
					'value'     => array( 'yes' ),
				),
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Show Pagination",'apicona'),
				"description" => sprintf( __("Show pagination links below %s boxes.", 'apicona'), $pf_type_title ),
				"param_name"  => "pagination",
				"value"       => array(
					__('No','apicona')  => 'no',
					__('Yes','apicona') => 'yes',
				),
				"std"         => "no",
				'dependency'  => array(
					'element'   => 'sortable',
					'value'     => array( 'no' ),
				),
			),
			array(
				"type"        => "checkbox",
				"heading"     => sprintf( __("From %s.", 'apicona'), $pf_cat_title ),
				"description" => __("If you like to show posts from selected category then select the category here. ", "apicona") . __("The bracket number shows how many posts there in the category.", "apicona"),
				"param_name"  => "category",
				"value"       => $portfolioCatList,
			),
			
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Order by",'apicona'),
				"description" => sprintf( __("Sort retrieved %s by parameter.", 'apicona'), $pf_type_title),
				"param_name"  => "orderby",
				"value"       => array(
					__('No order (none)','apicona')           => 'none',
					__('Order by post id (ID)','apicona')     => 'ID',
					__('Order by author (author)','apicona')  => 'author',
					__('Order by title (title)','apicona')    => 'title',
					__('Order by slug (name)','apicona')      => 'name',
					__('Order by date (date)','apicona')      => 'date',
					__('Order by last modified date (modified)','apicona') => 'modified',
					__('Random order (rand)','apicona')       => 'rand',
					__('Order by number of comments (comment_count)','apicona') => 'comment_count',
					
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				"std"              => "date",
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Order",'apicona'),
				"description" => __("Designates the ascending or descending order of the 'orderby' parameter.",'apicona'),
				"param_name"  => "order",
				"value"       => array(
					__('Ascending (1, 2, 3; a, b, c)','apicona')  => 'ASC',
					__('Descending (3, 2, 1; c, b, a)','apicona') => 'DESC',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				"std"              => "DESC",
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Show Item",'apicona'),
				"description" => sprintf( __("How many %s item you want to show.", 'apicona'),$pf_type_title),
				"param_name"  => "show",
				"value"       => array(
					__("All", "apicona") => "-1",
					__('1', "apicona")  => "1",
					__('2', "apicona") => "2",
					__('3','apicona')=>'3',
					__('4','apicona')=>'4',
					__('5','apicona')=>'5',
					__('6','apicona')=>'6',
					__('7','apicona')=>'7',
					__('8','apicona')=>'8',
					__('9','apicona')=>'9',
					__('10','apicona')=>'10',
					__('11','apicona')=>'11',
					__('12','apicona')=>'12',
					__('13','apicona')=>'13',
					__('14','apicona')=>'14',
					__('15','apicona')=>'15',
					__('16','apicona')=>'16',
					__('17','apicona')=>'17',
					__('18','apicona')=>'18',
					__('19','apicona')=>'19',
					__('20','apicona')=>'20',
					__('21','apicona')=>'21',
					__('22','apicona')=>'22',
					__('23','apicona')=>'23',
					__('24','apicona')=>'24',
				),
				"std"  => "3",
			),
			array(
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Button Text",'apicona'),
				"description" => __("Write button text here.",'apicona'),
				'group'       => __( 'Button Options', 'apicona' ),
				"param_name"  => "btntext",
			),
			array(
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __("Button Link (URL)",'apicona'),
				"description" => __("Write URL for the button.",'apicona'),
				'group'       => __( 'Button Options', 'apicona' ),
				"param_name"  => "btnlink",
			),
			array(
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => sprintf( __("%s design.", 'apicona'),$pf_type_title),
				"description" => sprintf( __("Select %s design.", 'apicona'),$pf_type_title),
				"param_name"  => "pdesign",
				"value"       => array(
					__("Default", "apicona")          => "",
					__('No padding view', "apicona")  => "nopadding",
				),
				"std"         => "",
			),
		);
	
	$boxParams     = tm_box_params();
	$headingParams = tm_vc_heading_params();
	$params        = array_merge( $headingParams, $allParams, $boxParams );
	
	
	// Changing default values
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'title' ){
			$params[$i]['std'] = 'Our Work';
			
		}/* else if( $param_name == 'h2_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		} else if( $param_name == 'h4_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		} */ else if( $param_name == 'align' ){
			$params[$i]['std'] = 'center';
		}
		$i++;
	}
	
	
	
	global $tm_sc_params_portfoliobox;
	$tm_sc_params_portfoliobox = $params;
	

	vc_map( array(
		"name"     => sprintf( __('ThemeMount %s (Portfolio) Box', 'apicona'), $pf_type_title ),
		"base"     => "portfoliobox",
		"class"    => "",
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		"icon"     => "icon-thememount-vc",
		"params"   => $params,
	) );
}










/**
 *  ThemeMount : Team Members
 */
function tm_vc_custom_element_team(){
	
	global $apicona;
	
	$team_type_title = ( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' ) ? __($apicona['team_type_title'], 'apicona') : __('Lawyers','apicona');
	
	$team_group = ( isset($apicona['team_group_title']) && trim($apicona['team_group_title'])!='' ) ? __($apicona['team_group_title'], 'apicona') : __('Services','apicona');
	
	// Team Group
	$teamGroupList = array();
	if( taxonomy_exists('team_group') ){
		$teamGroups    = get_terms( 'team_group', array( 'hide_empty' => false ) );
		$teamGroupList = array();
		foreach($teamGroups as $teamGroup){
			$name                   = $teamGroup->name.' ('.$teamGroup->count.')';
			$teamGroupList[ $name ] = $teamGroup->slug;
		}
	}
	
	$allParams = array(
		array(
			"type"        => "dropdown",
			"heading"     => sprintf( __('%s Linking', 'apicona'), $team_type_title ),
			"param_name"  => "linking",
			"description" => sprintf( __("Set link for %s single post on the %s name.", 'apicona'), $team_type_title, $team_type_title ),
			"value"       => array(
				__("Yes (default)", "apicona")   => "yes",
				__("No", "apicona")              => "no",
			),
			"std"         => "yes",
		),
		array(
			"type"        => "dropdown",
			"heading"     => sprintf( __('%s Box Design', 'apicona'), $team_type_title ),
			"param_name"  => "boxdesign",
			"description" => sprintf( __('Set design for %s box.', 'apicona'), $team_type_title),
			"value"       => array(
				__("Top image bottom content (default)", "apicona") => "default",
				__("Left image right content", "apicona")           => "leftimage",
			),
			"std"         => "default",
		),
		array(
			"type"        => "checkbox",
			"heading"     => sprintf( __('From %s', 'apicona'), $team_group ),
			"param_name"  => "groupslug",
			"description" =>  __("If you like to show posts from selected category then select the category here. ", "apicona") . __("The bracket number shows how many posts there in the category.", "apicona"),
			"value"       => $teamGroupList,
		),
		array(
			"type"        => "dropdown",
			"heading"     => __("Show", "apicona"),
			"param_name"  => "show",
			"description" => sprintf( __('Total %s you want to show.', 'apicona'), $team_type_title ),
			"value"       => array(
				__("All", "apicona") => "-1",
				__("1", "apicona")  => "1",
				__("2", "apicona") => "2",
				__("3", "apicona") => "3",
				__("4", "apicona") => "4",
				__("5", "apicona") => "5",
				__("6", "apicona") => "6",
				__("7", "apicona") => "7",
				__("8", "apicona") => "8",
				__("9", "apicona") => "9",
				__("10", "apicona") => "10",
			),
			"std"  => "4",
		),
	);
	
	
	
	
	$boxParams = tm_box_params();
	$params    = array_merge( tm_vc_heading_params(), $allParams, $boxParams );
	
	
	
	// Changing default values
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'column' ){
			$params[$i]['std'] = 'four';
			
		} else if( $param_name == 'title' ){
			$params[$i]['std'] = 'Our Team';
		
		} /*else if( $param_name == 'h2_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		} else if( $param_name == 'h4_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
				
		}*/ else if( $param_name == 'align' ){
			$params[$i]['std'] = 'center';
			
		}
		
		$i++;
	}
	
	
	
	global $tm_sc_params_team;
	$tm_sc_params_team = $params;
	
	
	vc_map( array(
		"name"     => sprintf( __('ThemeMount %s (Team Members) Box', 'apicona'), $team_type_title ),
		"base"     => "team",
		"icon"     => "icon-thememount-vc",
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		"params"   => $params,
		//"js_view" => 'VcCallToActionView'
	) );
}
/** End of Team Member box**/




/**
 *  ThemeMount : Testimonial box
 */

function tm_vc_custom_element_testimonial(){
	
	// Fetching all Testmonial group names
	$testimonialGroups = array();
	if( taxonomy_exists('testimonial_group') ){
		$testimonial_groups = get_terms( 'testimonial_group', array('hide_empty'=>false) );
		$testimonialGroups  = array();
		foreach( $testimonial_groups as $group ){
			$totalcount = 0;
			if( trim($group->count) > 0 ){
				$totalcount = $group->count;
			}
			$testimonialGroups[ $group->name.' ('.$totalcount.')' ] = $group->slug;
		}
	}

	$allParams = array(
		array(
			"type"        => "dropdown",
			"heading"     => esc_html__('Tesimonial Box Design', 'apicona'),
			"param_name"  => "boxdesign",
			"description" => esc_html__('Set design for Testimonial box.', 'apicona'),
			"value"       => array(
				esc_html__("Default", "apicona") 			=> "default",
				esc_html__("One columns view", "apicona")    => "onecol",
			),
			"std"         => "default",
		),
		array(
			"type"        => "checkbox",
			"heading"     => __("From Group", "apicona"),
			"param_name"  => "group",
			"description" => __("Select group so it will show Testimonials from selected group only.", "apicona"),
			"value"       => $testimonialGroups,
			"std"         => "",
		),
		array(
			"type"        => "dropdown",
			"heading"     => __("Show", "apicona"),
			"param_name"  => "show",
			"description" => __("Total Testimonials you want to show.", "apicona"),
			"value"       => array(
				__("All", "apicona") => "-1",
				__("1", "apicona")  => "1",
				__("2", "apicona") => "2",
				__("3", "apicona") => "3",
				__("4", "apicona") => "4",
				__("5", "apicona") => "5",
				__("6", "apicona") => "6",
				__("7", "apicona") => "7",
				__("8", "apicona") => "8",
				__("9", "apicona") => "9",
				__("10", "apicona") => "10",
				__("11", "apicona") => "11",
				__("12", "apicona") => "12",
				__("13", "apicona") => "13",
				__("14", "apicona") => "14",
				__("15", "apicona") => "15",
				__("16", "apicona") => "16",
				__("17", "apicona") => "17",
				__("18", "apicona") => "18",
				__("19", "apicona") => "19",
				__("20", "apicona") => "20",
			),
			"std"  => "3",
		),
		
	);
	
	$boxParams = tm_box_params();
	$params    = array_merge( tm_vc_heading_params(), $allParams, $boxParams );
	
	
	
	// Changing default values
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'title' ){
			$params[$i]['std'] = 'Testimonials';
			
		} /*else if( $param_name == 'h2_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		} else if( $param_name == 'h4_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
				
		}*/ else if( $param_name == 'align' ){
			$params[$i]['std'] = 'center';
			
		}
		
		$i++;
	}
	
	
	
	global $tm_sc_params_testimonial;
	$tm_sc_params_testimonial = $params;
	
	
	vc_map( array(
		"name"     => __("ThemeMount Testimonial Box", "apicona"),
		"base"     => "testimonial",
		"icon"     => "icon-thememount-vc",
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		"params"   => $params,
		//"js_view" => 'VcCallToActionView'
	) );	
}

/** End of Testimonial box **/





/**
 *  ThemeMount: Clients Logos
 */
function tm_vc_custom_element_clients(){
	// Fetching all client group names
	$clientGroups = array();
	if( taxonomy_exists('client_group') ){
		$client_groups = get_terms( 'client_group', array('hide_empty'=>false) );
		$clientGroups  = array();
		foreach( $client_groups as $group ){
			$clientGroups[ $group->name.' ('.$group->count.')' ] = $group->slug;
		}
	}
	
	$allParams = array(
			array(
				"type"        => "checkbox",
				"heading"     => __("From Group", "apicona"),
				"param_name"  => "group",
				"description" => __("Select group so it will show client logo from selected group only.", "apicona"),
				"value"       => $clientGroups,
				"std"         => "",
			),
			array(
				"type"        => "dropdown",
				"heading"     => __("Show", "apicona"),
				"param_name"  => "show",
				"description" => __("Total Clients Logos you want to show.", "apicona"),
				"value"       => array(
					__("All", "apicona") => "-1",
					__("1", "apicona")  => "1",
					__("2", "apicona") => "2",
					__("3", "apicona") => "3",
					__("4", "apicona") => "4",
					__("5", "apicona") => "5",
					__("6", "apicona") => "6",
					__("7", "apicona") => "7",
					__("8", "apicona") => "8",
					__("9", "apicona") => "9",
					__("10", "apicona") => "10",
					__("11", "apicona") => "11",
					__("12", "apicona") => "12",
					__("13", "apicona") => "13",
					__("14", "apicona") => "14",
					__("15", "apicona") => "15",
					__("16", "apicona") => "16",
					__("17", "apicona") => "17",
					__("18", "apicona") => "18",
					__("19", "apicona") => "19",
					__("20", "apicona") => "20",
				),
				"std"  => "10",
			),
		);
	
	
	
	$boxParams = tm_box_params();
	$params    = array_merge( tm_vc_heading_params(), $allParams, $boxParams );
	
	
	
	// Changing default values
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'title' ){
			$params[$i]['std'] = 'Our Clients';
		
		} else if( $param_name == 'column' ){
			$params[$i]['std'] = 'five';
			
		} else if( $param_name == 'view' ){
			$params[$i]['std'] = 'carousel';
			
		} else if( $param_name == 'carousel_loop' ){
			$params[$i]['std'] = '1';
			
		} else if( $param_name == 'carousel_dots' ){
			$params[$i]['std'] = 'true';
			
		} else if( $param_name == 'carousel_nav' ){
			$params[$i]['std'] = 'false';
			
		}/* else if( $param_name == 'h2_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		} else if( $param_name == 'h4_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
				
		}*/ else if( $param_name == 'align' ){
			$params[$i]['std'] = 'center';
			
		}
		
		$i++;
	}
	
	
	global $tm_sc_params_clients;
	$tm_sc_params_clients = $params;
	
	
	vc_map( array(
		"name"     => __("ThemeMount Client's Logo Box", "apicona"),
		"base"     => "clients",
		"icon"     => "icon-thememount-vc",
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		"params"   => $params,
	) );
}
/**  End of Client box **/






/**
 *  ThemeMount: Facts in digits
**/
function tm_vc_custom_element_facts_in_digits(){
	/**
	 * Icon Array
	 */
	global $kwayy_iconsArray;
	$allIcons = array();
	foreach($kwayy_iconsArray as $icon ){
		$allIcons[ucwords(str_replace('-',' ',$icon))] = $icon;
	}
	
	$allParams1 =  array(
				array(
					'type'			=> 'textfield',
					'holder'		=> 'div',
					'class'			=> '',
					'heading'		=> __('Header (optional)', 'apicona'),
					'param_name'	=> 'title',
					'std'			=> __('Title Text', 'apicona'),
					'description'	=> __('Enter text for the title. Leave blank if no title is needed.', 'apicona')
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Add icon?', 'apicona' ),
					'param_name' => 'add_icon',
					'std'        => 'true',
				),
				array(
					"type"			=> "dropdown",
					"holder"		=> "div",
					"class"			=> "",
					"heading"		=> __("Icon Align", 'apicona'),
					"param_name"	=> "icon_align",
					"description"	=> __('Icon alignment.' , 'apicona'),
					'value' => array(
						__( 'Top Center', 'apicona' ) => 'top',
						__( 'Left', 'apicona' )       => 'left',
						__( 'Right', 'apicona' )      => 'right',
					),
					'std' => 'top',
					'dependency'  => array(
						'element'   => 'add_icon',
						//'value_not_equal_to' => array( 'ids', 'custom' ),
						'value'     => 'true'
					)
				),
				array(
					"param_name"  => "icon",
					"type"        => "kwayy_iconselector",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Service Box Main Icon",'apicona'),
					"value"       => $allIcons,
					"description" => __("Select icon for the Facts in Digits Box.",'apicona'),
					'std'         => 'fa-skype',
					'dependency'  => array(
						'element'   => 'add_icon',
						//'value_not_equal_to' => array( 'ids', 'custom' ),
						'value'     => 'true'
					)
					
				),
	);
	

	
	$allParams2 = array(
			
				array(
					'type'				=> 'textfield',
					'holder'			=> 'div',
					'class'				=> '',
					'heading'			=> __('Rotating Number', 'apicona'),
					'param_name'		=> 'digit',
					'std'				=> '100',
					'description'		=> __('Enter rotating number digit here.', 'apicona'),
				),
				array(
					'type'				=> 'textfield',
					'holder'			=> 'div',
					'heading'			=> __('Text Before Number', 'apicona'),
					'param_name'		=> 'before',
					'description'		=> __('Enter text which appear just before the rotating numbers.', 'apicona'),
					'edit_field_class'	=> 'vc_col-sm-6 vc_column',
				),
				array(
					"type"			=> "dropdown",
					"holder"		=> "div",
					"heading"		=> __("Text Style",'apicona'),
					"param_name"	=> "beforetextstyle",
					"description"	=> __('Select text style for the text.', 'apicona') . '<br>' . __('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','apicona') . '<br>' . __('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','apicona'),
					'value' => array(
						__( 'Superscript', 'apicona' ) => 'sup',
						__( 'Subscript', 'apicona' )   => 'sub',
						__( 'Normal', 'apicona' )      => 'span',
					),
					'std' => 'sup',
					'edit_field_class'	=> 'vc_col-sm-6 vc_column',
				),
				array(
					'type'				=> 'textfield',
					'holder'			=> 'div',
					'class'				=> '',
					'heading'			=> __('Text After Number', 'apicona'),
					'param_name'		=> 'after',
					'description'		=> __('Enter text which appear just after the rotating numbers.', 'apicona'),
					'edit_field_class'	=> 'vc_col-sm-6 vc_column',
				),
				array(
					"type"			=> "dropdown",
					"holder"		=> "div",
					"class"			=> "",
					"heading"		=> __("Text Style",'apicona'),
					"param_name"	=> "aftertextstyle",
					"description"	=> __('Select text style for the text.', 'apicona') . '<br>' . __('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','apicona') . '<br>' . __('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','apicona'),
					'value' => array(
						__( 'Superscript', 'apicona' ) => 'sup',
						__( 'Subscript', 'apicona' )   => 'sub',
						__( 'Normal', 'apicona' )      => 'span',
					),
					'std' => 'sub',
					'edit_field_class'	=> 'vc_col-sm-6 vc_column',
				),
				array(
					'type'			=> 'textfield',
					'holder'		=> 'div',
					'class'			=> '',
					'heading'		=> __('Rotating digit Interval', 'apicona'),
					'param_name'	=> 'interval',
					'std'			=> '5',
					'description'	=> __('Enter rotating interval number here.', 'apicona')
				)
	);
	
	
	
	// Setting default icon for ICON list
	//$icon_options[1]['value'] = 'fa fa-angle-right';
	
	$params = array_merge( $allParams1, $allParams2 );
	
	
	
	// Changing default values
	$i = 0;
	/*foreach( $params as $param ){
		
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		
		if( $param_name == 'icon_type' ){
			$params[$i]['std'] = 'fontawesome';
		
		} else if( $param_name == 'icon_icon_fontawesome' ){
			$params[$i]['std'] = 'fa fa-thumbs-o-up';
			
		} else if( $param_name == 'icon_icon_openiconic' ){
			$params[$i]['std'] = 'vc-oi vc-oi-dial';
			
		} else if( $param_name == 'icon_icon_typicons' ){
			$params[$i]['std'] = 'typcn typcn-adjust-brightness';
			
		} else if( $param_name == 'icon_icon_entypo' ){
			$params[$i]['std'] = 'entypo-icon entypo-icon-note';
			
		} else if( $param_name == 'icon_icon_linecons' ){
			$params[$i]['std'] = 'vc_li vc_li-heart';
			
		}
		
		$i++;
	}*/
	
	
	
	
	global $tm_sc_params_facts_in_digits;
	$tm_sc_params_facts_in_digits = $params;
	
	
	if( function_exists('vc_map') ){
		vc_map( array(
			'name'		=> __( 'ThemeMount Facts in digits', 'apicona' ),
			'base'		=> 'facts_in_digits',
			'class'		=> '',
			'icon'		=> 'icon-thememount-vc',
			'category'	=> __( 'ThemeMount Special Elements', 'apicona' ),
			'params'	=> $params
		));
	}
	
}





/**
 * ThemeMount: Tweeter box
 */
function tm_vc_custom_element_twitterbox(){
	
	$allParams = array(
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __("(Required) Twitter Consumer Key",'apicona'),
				"param_name"	=> "consumer_key",
				"description"	=> __('Twitter Consumer Key from Twitter site. Fill all the four keys to show Twitter bar in footer. You can get all the keys from <a href="https://dev.twitter.com" target="_blank">https://dev.twitter.com</a> site.','apicona')
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __("(Required) Twitter Consumer Secret",'apicona'),
				"param_name"	=> "consumer_secret",
				"description"	=> __('Twitter Consumer Secret from Twitter site.','apicona')
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __("(Required) Twitter Oauth Token",'apicona'),
				"param_name"	=> "oauth_token",
				"description"	=> __('Twitter Oauth Token from Twitter site.','apicona')
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __("(Required) Twitter Oauth Token Secret",'apicona'),
				"param_name"	=> "oauth_token_secret",
				"description"	=> __('Twitter Oauth Token Secret from Twitter site.','apicona')
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __("Twitter Username (optional)",'apicona'),
				"param_name"	=> "username",
				"description"	=> __('(optional) Twitter user name. Example <code>envato</code>. <br> Leave this blank to show tweets from your account.','apicona')
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __("Show Tweets",'apicona'),
				"param_name"	=> "show",
				"description"	=> __('how many Tweets you like to show.','apicona'),
				'value' => array(
					__( '1', 'apicona' ) => '1',
					__( '2', 'apicona' ) => '2',
					__( '3', 'apicona' ) => '3',
					__( '4', 'apicona' ) => '4',
					__( '5', 'apicona' ) => '5',
					__( '6', 'apicona' ) => '6',
					__( '7', 'apicona' ) => '7',
					__( '8', 'apicona' ) => '8',
					__( '9', 'apicona' ) => '9',
					__( '10', 'apicona' ) => '10',
				),
				'std'    => '3',
			),
			array(
				"type"			=> "textfield",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> __('"Follow us" text after big icon','apicona'),
				"param_name"	=> "followustext",
				"description"	=> __('(optional) Follow us text after the big Twitter icon so user can click on it and go to Twitter profile page.','apicona')
			),
		);
	
	
	$boxParams = tm_box_params();
	$params    = array_merge( $allParams, $boxParams );
	
	
	
	// Changing default values
	$i = 0;
	foreach( $params as $param ){
		
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		
		if( $param_name == 'column' ){
			$params[$i]['std'] = 'one';
		
		} else if( $param_name == 'view' ){
			$params[$i]['std'] = 'carousel';
			
		} else if( $param_name == 'carousel_dots' ){
			$params[$i]['std'] = 'true';
			
		}
		
		$i++;
	}
	
	
	
	global $tm_sc_params_twitterbox;
	$tm_sc_params_twitterbox = $params;
	
	
	vc_map( array(
		"name"        => __("ThemeMount Twitter Box",'apicona'),
		"base"        => "twitterbox",
		"class"       => "",
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		"icon"        => "icon-thememount-vc",
		"params"      => $params,
	) );

}

	
	
/**
 *  ThemeMount: Separator with Icon
 */
function tm_vc_custom_element_icon_separator(){
	
	/**
	 * Icon Array
	 */
	global $kwayy_iconsArray;
	$allIcons = array();
	foreach($kwayy_iconsArray as $icon ){
		$allIcons[ucwords(str_replace('-',' ',$icon))] = $icon;
	}
	
	$allParams = array(
			array(
				"type"        => "kwayy_iconselector",
				"holder"      => "div",
				"heading"     => __("Icon", "apicona"),
				"param_name"  => "icon",
				"value"       => $allIcons,
				"description" => __("Select icon for separator. Only visible if sub-heading is filled.",'apicona'),
				'std'         => 'fa-skype',
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Style', 'apicona' ),
				'param_name' => 'style',
				'value' => array(
					__( 'Border', 'apicona' ) => '',
					__( 'Double Border', 'apicona' ) => 'double',
					__( 'Dotted', 'apicona' ) => 'dotted',
					__( 'Dashed', 'apicona' ) => 'dashed',
				),
				'description' => __( 'Separator style.', 'apicona' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Element width', 'apicona' ),
				'param_name' => 'elewidth',
				'value'      => array(
					__( '100%', 'apicona' ) => '',
					__( '90%', 'apicona' ) => '90',
					__( '80%', 'apicona' ) => '80',
					__( '70%', 'apicona' ) => '70',
					__( '60%', 'apicona' ) => '60',
					__( '50%', 'apicona' ) => '50',
				),
				'description' => __( 'Separator element width in percent.', 'apicona' )
			),

		);
	// All options
	$params =  $allParams;
	
	
	
	// Changing default values
	$i = 0;
	foreach( $params as $param ){
		
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		
		if( $param_name == 'icon_type' ){
			$params[$i]['std'] = 'fontawesome';
		
		} else if( $param_name == 'icon_icon_fontawesome' ){
			$params[$i]['std'] = 'fa fa-hand-o-right';
			
		} else if( $param_name == 'icon_icon_openiconic' ){
			$params[$i]['std'] = 'vc-oi vc-oi-dial';
			
		} else if( $param_name == 'icon_icon_typicons' ){
			$params[$i]['std'] = 'typcn typcn-adjust-brightness';
			
		} else if( $param_name == 'icon_icon_entypo' ){
			$params[$i]['std'] = 'entypo-icon entypo-icon-note';
			
		} else if( $param_name == 'icon_icon_linecons' ){
			$params[$i]['std'] = 'vc_li vc_li-heart';
			
		}
		
		$i++;
	}
	
	
	
	global $tm_sc_params_icon_separator;
	$tm_sc_params_icon_separator = $params;
	
	
	vc_map( array(
		'name'     => __( 'ThemeMount Separator with Icon', 'apicona' ),
		'base'     => 'kwayyiconseparator',
		'icon'     => 'icon-thememount-vc',
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		'params'   => $params,
		//'js_view'  => 'VcTextSeparatorView'
	) );
	
	
}

/** End of ThemeMount Separator with icon **/







/**
 *  ThemeMount: Heading
 */
function tm_vc_custom_element_heading(){
	
	$allParams = tm_vc_heading_params();
	
	// var_dump($allParams);
	$css_editor = array(
		array(
			'type'       => 'css_editor',
			'heading'    => __( 'CSS box', 'apicona' ),
			'param_name' => 'css',
			// 'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apicona' ),
			'group'      => __( 'Design Options', 'apicona' )
		),
		array(
			"type"        => "dropdown",
			"heading"     => __("Heading Tag", "apicona"),
			"description" => __("Select heading tag.", "apicona"),
			"param_name"  => "tag",
			"value"       => array(
				__("H1", "apicona") => "h1",
				__("H2", "apicona") => "h2",
				__("H3", "apicona") => "h3",
				__("H4", "apicona") => "h4",
				__("H5", "apicona") => "h5",
				__("H6", "apicona") => "h6",
			),
			'std'         => 'h2',
		),
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Extra class name', 'apicona' ),
			'param_name'  => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apicona' )
		)
	);
	
	$params    = array_merge( $allParams, $css_editor );
	
	
	// Changing modifying, adding extra options
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'align' ){
			$params[$i]['std'] = 'center';
			
		}if( $param_name == 'heading_sep' ){
			$params[$i]['std'] = 'yes';
			
		}/* else if( $param_name == 'h4_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
			
		} else if( $param_name == 'h2_use_theme_fonts' ){
			$params[$i]['std'] = 'yes';
		}*/
		
		
		if($param_name == 'title'){
			$params[$i]['param_name']='text';
		}else if($param_name == 'subtitle'){
			$params[$i]['param_name']='subtext';
		}
		
		$i++;
	}
		
	
	
	global $tm_sc_params_heading;
	$tm_sc_params_heading = $params;
	
	
	vc_map( array(
		"name"     => __("ThemeMount Heading", "apicona"),
		"base"     => "heading",
		"icon"     => "icon-thememount-vc",
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		"params"   => $params,
	) );
}




/**
 *  ThemeMount: List
 */
if( !function_exists('tm_vc_custom_element_list') ){
function tm_vc_custom_element_list(){
	
	$allParams = array(
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'List Type', 'apicona' ),
			'param_name' => 'type',
			'value'      => array(
				__( 'Icon', 'apicona' )                    => 'icon',
				__( 'Disc', 'apicona' )                    => 'disc',
				__( 'Circle', 'apicona' )                  => 'circle',
				__( 'Square', 'apicona' )                  => 'square',
				__( 'Decimal (1, 2, 3, 4)', 'apicona' )    => 'decimal',
				__( 'Alphabetic (A, B, C, D)', 'apicona' ) => 'upper-alpha',
				__( 'Roman (I, II, III, IV)', 'apicona' )  => 'roman',
			),
			'std'         => 'icon',
			'description' => __( 'Select list style.', 'apicona' ),
		),
	);
	
	$icon_options = vc_map_integrate_shortcode(
		'vc_icon',
		'icon_',
		//__( 'Heading', 'apicona' ),
		'',
		array(
			/*'exclude' => array(
				'text',
				'css',
				'el_class',
			),*/
			'include_only' => array(
				'type',
				/*'icon_stroke7_pixeden',*/
				'icon_fontawesome',
				'icon_openiconic',
				'icon_typicons',
				'icon_entypo',
				'icon_linecons',
			),
		),
		array(
			'element' => 'type',
			'value'   => 'icon',
		)
	);
	
	// Setting default icon for ICON list
	$icon_options[2]['value'] = 'fa fa-angle-right';
	
	
	
	
	// each line
	$lines = array();
	$total = 20;
	for( $x=1; $x <= $total ; $x++ ){
		$lines[] = array(
			'type'        => 'textarea_raw_html',
			'heading'     => sprintf( __( 'List Line %s','apicona' ), $x ),
			'param_name'  => 'line'.$x,
			'description' => __( 'Enter text for the list line. Some HTML tags are allowed.', 'apicona' ),
			'value'       => '',
		);
	}
	
	// Merge all parameters
	$params = array_merge( $allParams, $icon_options, $lines );
	
	
	
	// Changing default values
	$i = 0;
	foreach( $params as $param ){
		
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		
		if( $param_name == 'icon_type' ){
			$params[$i]['std'] = 'fontawesome';
		
		} else if( $param_name == 'icon_icon_fontawesome' ){
			$params[$i]['std'] = 'fa fa-chevron-right';
			
		} else if( $param_name == 'icon_icon_openiconic' ){
			$params[$i]['std'] = 'vc-oi vc-oi-dial';
			
		} else if( $param_name == 'icon_icon_typicons' ){
			$params[$i]['std'] = 'typcn typcn-adjust-brightness';
			
		} else if( $param_name == 'icon_icon_entypo' ){
			$params[$i]['std'] = 'entypo-icon entypo-icon-note';
			
		} else if( $param_name == 'icon_icon_linecons' ){
			$params[$i]['std'] = 'vc_li vc_li-heart';
			
		}
		
		$i++;
	}
	
	
	
	global $tm_sc_params_list;
	$tm_sc_params_list = $params;
	
	
	vc_map( array(
		'name'		=> __( 'ThemeMount List', 'apicona' ),
		'base'		=> 'tm-list',
		'class'		=> '',
		'icon'		=> 'icon-thememount-vc',
		'category'	=> __( 'ThemeMount Special Elements', 'apicona' ),
		'params'	=> $params
	));
	
}
}










/**
 * ThemeMount: Events Calendar list in Visual Composer
 */
function tm_vc_custom_element_eventsbox(){
	if( class_exists('Tribe__Events__Main') ){
		
		// Getting event category
		$eventCatArray = get_terms( 'tribe_events_cat', array( 'hide_empty' => false ) );
		$eventCatList  = array();
		//$teamGroupList['All'] = '';
		foreach($eventCatArray as $eventCat){
			$name                  = $eventCat->name.' ('.$eventCat->count.')';
			$eventCatList[ $name ] = $eventCat->slug;
		}

		
		
		$allParams = array(
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Show Pagination",'apicona'),
					"description" => __("Show pagination links below Event boxes.",'apicona'),
					"param_name"  => "pagination",
					"value"       => array(
						__('No','apicona')  => 'no',
						__('Yes','apicona') => 'yes',
					),
					"std"         => "no",
				),
				/*array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Text",'apicona'),
					"description" => __("Write button text here.",'apicona'),
					'group'       => __( 'Button Options', 'apicona' ),
					"param_name"  => "btntext",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Link (URL)",'apicona'),
					"description" => __("Write URL for the button.",'apicona'),
					'group'       => __( 'Button Options', 'apicona' ),
					"param_name"  => "btnlink",
				),*/
				array(
					"type"        => "checkbox",
					"heading"     => __("Event Categories", "apicona"),
					"param_name"  => "catslug",
					"description" => __("Select category to show Events from selected category only. Select none to show all Events.", "apicona"),
					"value"       => $eventCatList,
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Show Events Item",'apicona'),
					"description" => __("How many events you want to show.",'apicona'),
					"param_name"  => "show",
					"value"       => array(
						__('All','apicona') => '-1',
						__('1','apicona')  => '1',
						__('2','apicona') => '2',
						__('3','apicona')=>'3',
						__('4','apicona')=>'4',
						__('5','apicona')=>'5',
						__('6','apicona')=>'6',
						__('7','apicona')=>'7',
						__('8','apicona')=>'8',
						__('9','apicona')=>'9',
						__('10','apicona')=>'10',
						__('11','apicona')=>'11',
						__('12','apicona')=>'12',
						__('13','apicona')=>'13',
						__('14','apicona')=>'14',
						__('15','apicona')=>'15',
						__('16','apicona')=>'16',
						__('17','apicona')=>'17',
						__('18','apicona')=>'18',
						__('19','apicona')=>'19',
						__('20','apicona')=>'20',
						__('21','apicona')=>'21',
						__('22','apicona')=>'22',
						__('23','apicona')=>'23',
						__('24','apicona')=>'24',
					),
					"std"  => "3",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Text",'apicona'),
					"description" => __("Write button text here.",'apicona'),
					'group'       => __( 'Button Options', 'apicona' ),
					"param_name"  => "btntext",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Link (URL)",'apicona'),
					"description" => __("Write URL for the button.",'apicona'),
					'group'       => __( 'Button Options', 'apicona' ),
					"param_name"  => "btnlink",
				),
				array(
					"type"        => "dropdown",
					"heading"     => __("Box Style", "apicona"),
					"description" => __("Select box style.", "apicona"),
					"group"       => __( "Box Design", "apicona" ),
					"param_name"  => "design",
					"value"       => array(
						__("Default Style", "apicona")   => "default",
						__("Detailed Style", "apicona") => "detailed",
					),
					"std"         => "default",
				)
			);
		
		$boxParams = tm_box_params();
		$params    = array_merge( tm_vc_heading_params(), $allParams, $boxParams );
		
		
		// Changing default values
		$i = 0;
		foreach( $params as $param ){
			$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
			if( $param_name == 'title' ){
				$params[$i]['std'] = 'Latest Events';
				
			} /*else if( $param_name == 'h2_use_theme_fonts' ){
				$params[$i]['std'] = 'yes';
				
			} else if( $param_name == 'h4_use_theme_fonts' ){
				$params[$i]['std'] = 'yes';
				
			}*/
			$i++;
		}
		
		
		global $tm_sc_params_eventsbox;
		$tm_sc_params_eventsbox = $params;
	
		
		vc_map( array(
			"name"     => __("ThemeMount Events Box", "apicona"),
			"base"     => "eventsbox",
			"icon"     => "icon-thememount-vc",
			'category' => __( 'ThemeMount Special Elements', 'apicona' ),
			"params"   => $params
		) );
	}
}




	
	
/**
 *  ThemeMount: Contact Box
 */
function tm_vc_custom_element_contactbox(){
	
	$params = array(
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"class"       => "",
			"heading"     => __("Phone",'apicona'),
			"description" => __("Write phone number here. Example: <code>(+01) 123 456 7890</code>",'apicona'),
			"param_name"  => "phone",
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"class"       => "",
			"heading"     => __("Email",'apicona'),
			"description" => __("Write email here. Example: <code>info@example.com</code>",'apicona'),
			"param_name"  => "email",
		),
		array(
			"type"        => "textfield",
			"holder"      => "div",
			"class"       => "",
			"heading"     => __("Website",'apicona'),
			"description" => __("Write website URL here. Example: <code>www.example.com</code>",'apicona'),
			"param_name"  => "website",
		),
		array(
			"type"        => "textarea",
			"holder"      => "div",
			"class"       => "",
			"heading"     => __("Address",'apicona'),
			"description" => __("Write address here. <br> Example: <code>Honey Business <br> 24 Fifth st., Los Angeles, <br> USA</code>",'apicona'),
			"param_name"  => "address",
		),
		array(
			"type"        => "textarea",
			"holder"      => "div",
			"class"       => "",
			"heading"     => __("Time",'apicona'),
			"description" => __("Write time here. <br> Example: <code>Mon to Sat - 9:00am to 6:00pm<br>(Sunday Closed)</code>",'apicona'),
			"param_name"  => "time",
		),
	);

	global $tm_sc_params_contactbox;
	$tm_sc_params_contactbox = $params;

	
	vc_map( array(
		"name"     => __("ThemeMount Contact Details Box",'apicona'),
		"base"     => "contactbox",
		"class"    => "",
		'category' => __( 'ThemeMount Special Elements', 'apicona' ),
		"icon"     => "icon-thememount-vc",
		"params"   => $params
	) );
}






function kwayy_vc_iconpicker_type_stroke7_pixeden(){
	
	$icons = array(
		array( 'pe-7s-album' => 'album' ), 
		array( 'pe-7s-arc' => 'arc' ), 
		array( 'pe-7s-back-2' => 'back 2' ), 
		array( 'pe-7s-bandaid' => 'bandaid' ), 
		array( 'pe-7s-car' => 'car' ), 
		array( 'pe-7s-diamond' => 'diamond' ), 
		array( 'pe-7s-door-lock' => 'door lock' ), 
		array( 'pe-7s-eyedropper' => 'eyedropper' ), 
		array( 'pe-7s-female' => 'female' ), 
		array( 'pe-7s-gym' => 'gym' ), 
		array( 'pe-7s-hammer' => 'hammer' ), 
		array( 'pe-7s-headphones' => 'headphones' ), 
		array( 'pe-7s-helm' => 'helm' ), 
		array( 'pe-7s-hourglass' => 'hourglass' ), 
		array( 'pe-7s-leaf' => 'leaf' ), 
		array( 'pe-7s-magic-wand' => 'magic wand' ), 
		array( 'pe-7s-male' => 'male' ), 
		array( 'pe-7s-map-2' => 'map 2' ), 
		array( 'pe-7s-next-2' => 'next 2' ), 
		array( 'pe-7s-paint-bucket' => 'paint bucket' ), 
		array( 'pe-7s-pendrive' => 'pendrive' ), 
		array( 'pe-7s-photo' => 'photo' ), 
		array( 'pe-7s-piggy' => 'piggy' ), 
		array( 'pe-7s-plugin' => 'plugin' ), 
		array( 'pe-7s-refresh-2' => 'refresh 2' ), 
		array( 'pe-7s-rocket' => 'rocket' ), 
		array( 'pe-7s-settings' => 'settings' ), 
		array( 'pe-7s-shield' => 'shield' ), 
		array( 'pe-7s-smile' => 'smile' ), 
		array( 'pe-7s-usb' => 'usb' ), 
		array( 'pe-7s-vector' => 'vector' ), 
		array( 'pe-7s-wine' => 'wine' ), 
		array( 'pe-7s-cloud-upload' => 'cloud upload' ), 
		array( 'pe-7s-cash' => 'cash' ), 
		array( 'pe-7s-close' => 'close' ), 
		array( 'pe-7s-bluetooth' => 'bluetooth' ), 
		array( 'pe-7s-cloud-download' => 'cloud download' ), 
		array( 'pe-7s-way' => 'way' ), 
		array( 'pe-7s-close-circle' => 'close circle' ), 
		array( 'pe-7s-id' => 'id' ), 
		array( 'pe-7s-angle-up' => 'angle up' ), 
		array( 'pe-7s-wristwatch' => 'wristwatch' ), 
		array( 'pe-7s-angle-up-circle' => 'angle up circle' ), 
		array( 'pe-7s-world' => 'world' ), 
		array( 'pe-7s-angle-right' => 'angle right' ), 
		array( 'pe-7s-volume' => 'volume' ), 
		array( 'pe-7s-angle-right-circle' => 'angle right circle' ), 
		array( 'pe-7s-users' => 'users' ), 
		array( 'pe-7s-angle-left' => 'angle left' ), 
		array( 'pe-7s-user-female' => 'user female' ), 
		array( 'pe-7s-angle-left-circle' => 'angle left circle' ), 
		array( 'pe-7s-up-arrow' => 'up arrow' ), 
		array( 'pe-7s-angle-down' => 'angle down' ), 
		array( 'pe-7s-switch' => 'switch' ), 
		array( 'pe-7s-angle-down-circle' => 'angle down circle' ), 
		array( 'pe-7s-scissors' => 'scissors' ), 
		array( 'pe-7s-wallet' => 'wallet' ), 
		array( 'pe-7s-safe' => 'safe' ), 
		array( 'pe-7s-volume2' => 'volume2' ), 
		array( 'pe-7s-volume1' => 'volume1' ), 
		array( 'pe-7s-voicemail' => 'voicemail' ), 
		array( 'pe-7s-video' => 'video' ), 
		array( 'pe-7s-user' => 'user' ), 
		array( 'pe-7s-upload' => 'upload' ), 
		array( 'pe-7s-unlock' => 'unlock' ), 
		array( 'pe-7s-umbrella' => 'umbrella' ), 
		array( 'pe-7s-trash' => 'trash' ), 
		array( 'pe-7s-tools' => 'tools' ), 
		array( 'pe-7s-timer' => 'timer' ), 
		array( 'pe-7s-ticket' => 'ticket' ), 
		array( 'pe-7s-target' => 'target' ), 
		array( 'pe-7s-sun' => 'sun' ), 
		array( 'pe-7s-study' => 'study' ), 
		array( 'pe-7s-stopwatch' => 'stopwatch' ), 
		array( 'pe-7s-star' => 'star' ), 
		array( 'pe-7s-speaker' => 'speaker' ), 
		array( 'pe-7s-signal' => 'signal' ), 
		array( 'pe-7s-shuffle' => 'shuffle' ), 
		array( 'pe-7s-shopbag' => 'shopbag' ), 
		array( 'pe-7s-share' => 'share' ), 
		array( 'pe-7s-server' => 'server' ), 
		array( 'pe-7s-search' => 'search' ), 
		array( 'pe-7s-film' => 'film' ), 
		array( 'pe-7s-science' => 'science' ), 
		array( 'pe-7s-disk' => 'disk' ), 
		array( 'pe-7s-ribbon' => 'ribbon' ), 
		array( 'pe-7s-repeat' => 'repeat' ), 
		array( 'pe-7s-refresh' => 'refresh' ), 
		array( 'pe-7s-add-user' => 'add user' ), 
		array( 'pe-7s-refresh-cloud' => 'refresh cloud' ), 
		array( 'pe-7s-paperclip' => 'paperclip' ), 
		array( 'pe-7s-radio' => 'radio' ), 
		array( 'pe-7s-note2' => 'note2' ), 
		array( 'pe-7s-print' => 'print' ), 
		array( 'pe-7s-network' => 'network' ), 
		array( 'pe-7s-prev' => 'prev' ), 
		array( 'pe-7s-mute' => 'mute' ), 
		array( 'pe-7s-power' => 'power' ), 
		array( 'pe-7s-medal' => 'medal' ), 
		array( 'pe-7s-portfolio' => 'portfolio' ), 
		array( 'pe-7s-like2' => 'like2' ), 
		array( 'pe-7s-plus' => 'plus' ), 
		array( 'pe-7s-left-arrow' => 'left arrow' ), 
		array( 'pe-7s-play' => 'play' ), 
		array( 'pe-7s-key' => 'key' ), 
		array( 'pe-7s-plane' => 'plane' ), 
		array( 'pe-7s-joy' => 'joy' ), 
		array( 'pe-7s-photo-gallery' => 'photo gallery' ), 
		array( 'pe-7s-pin' => 'pin' ), 
		array( 'pe-7s-phone' => 'phone' ), 
		array( 'pe-7s-plug' => 'plug' ), 
		array( 'pe-7s-pen' => 'pen' ), 
		array( 'pe-7s-right-arrow' => 'right arrow' ), 
		array( 'pe-7s-paper-plane' => 'paper plane' ), 
		array( 'pe-7s-delete-user' => 'delete user' ), 
		array( 'pe-7s-paint' => 'paint' ), 
		array( 'pe-7s-bottom-arrow' => 'bottom arrow' ), 
		array( 'pe-7s-notebook' => 'notebook' ), 
		array( 'pe-7s-note' => 'note' ), 
		array( 'pe-7s-next' => 'next' ), 
		array( 'pe-7s-news-paper' => 'news paper' ), 
		array( 'pe-7s-musiclist' => 'musiclist' ), 
		array( 'pe-7s-music' => 'music' ), 
		array( 'pe-7s-mouse' => 'mouse' ), 
		array( 'pe-7s-more' => 'more' ), 
		array( 'pe-7s-moon' => 'moon' ), 
		array( 'pe-7s-monitor' => 'monitor' ), 
		array( 'pe-7s-micro' => 'micro' ), 
		array( 'pe-7s-menu' => 'menu' ), 
		array( 'pe-7s-map' => 'map' ), 
		array( 'pe-7s-map-marker' => 'map marker' ), 
		array( 'pe-7s-mail' => 'mail' ), 
		array( 'pe-7s-mail-open' => 'mail open' ), 
		array( 'pe-7s-mail-open-file' => 'mail open file' ), 
		array( 'pe-7s-magnet' => 'magnet' ), 
		array( 'pe-7s-loop' => 'loop' ), 
		array( 'pe-7s-look' => 'look' ), 
		array( 'pe-7s-lock' => 'lock' ), 
		array( 'pe-7s-lintern' => 'lintern' ), 
		array( 'pe-7s-link' => 'link' ), 
		array( 'pe-7s-like' => 'like' ), 
		array( 'pe-7s-light' => 'light' ), 
		array( 'pe-7s-less' => 'less' ), 
		array( 'pe-7s-keypad' => 'keypad' ), 
		array( 'pe-7s-junk' => 'junk' ), 
		array( 'pe-7s-info' => 'info' ), 
		array( 'pe-7s-home' => 'home' ), 
		array( 'pe-7s-help2' => 'help2' ), 
		array( 'pe-7s-help1' => 'help1' ), 
		array( 'pe-7s-graph3' => 'graph3' ), 
		array( 'pe-7s-graph2' => 'graph2' ), 
		array( 'pe-7s-graph1' => 'graph1' ), 
		array( 'pe-7s-graph' => 'graph' ), 
		array( 'pe-7s-global' => 'global' ), 
		array( 'pe-7s-gleam' => 'gleam' ), 
		array( 'pe-7s-glasses' => 'glasses' ), 
		array( 'pe-7s-gift' => 'gift' ), 
		array( 'pe-7s-folder' => 'folder' ), 
		array( 'pe-7s-flag' => 'flag' ), 
		array( 'pe-7s-filter' => 'filter' ), 
		array( 'pe-7s-file' => 'file' ), 
		array( 'pe-7s-expand1' => 'expand1' ), 
		array( 'pe-7s-exapnd2' => 'exapnd2' ), 
		array( 'pe-7s-edit' => 'edit' ), 
		array( 'pe-7s-drop' => 'drop' ), 
		array( 'pe-7s-drawer' => 'drawer' ), 
		array( 'pe-7s-download' => 'download' ), 
		array( 'pe-7s-display2' => 'display2' ), 
		array( 'pe-7s-display1' => 'display1' ), 
		array( 'pe-7s-diskette' => 'diskette' ), 
		array( 'pe-7s-date' => 'date' ), 
		array( 'pe-7s-cup' => 'cup' ), 
		array( 'pe-7s-culture' => 'culture' ), 
		array( 'pe-7s-crop' => 'crop' ), 
		array( 'pe-7s-credit' => 'credit' ), 
		array( 'pe-7s-copy-file' => 'copy file' ), 
		array( 'pe-7s-config' => 'config' ), 
		array( 'pe-7s-compass' => 'compass' ), 
		array( 'pe-7s-comment' => 'comment' ), 
		array( 'pe-7s-coffee' => 'coffee' ), 
		array( 'pe-7s-cloud' => 'cloud' ), 
		array( 'pe-7s-clock' => 'clock' ), 
		array( 'pe-7s-check' => 'check' ), 
		array( 'pe-7s-chat' => 'chat' ), 
		array( 'pe-7s-cart' => 'cart' ), 
		array( 'pe-7s-camera' => 'camera' ), 
		array( 'pe-7s-call' => 'call' ), 
		array( 'pe-7s-calculator' => 'calculator' ), 
		array( 'pe-7s-browser' => 'browser' ), 
		array( 'pe-7s-box2' => 'box2' ), 
		array( 'pe-7s-box1' => 'box1' ), 
		array( 'pe-7s-bookmarks' => 'bookmarks' ), 
		array( 'pe-7s-bicycle' => 'bicycle' ), 
		array( 'pe-7s-bell' => 'bell' ), 
		array( 'pe-7s-battery' => 'battery' ), 
		array( 'pe-7s-ball' => 'ball' ), 
		array( 'pe-7s-back' => 'back' ), 
		array( 'pe-7s-attention' => 'attention' ), 
		array( 'pe-7s-anchor' => 'anchor' ), 
		array( 'pe-7s-albums' => 'albums' ), 
		array( 'pe-7s-alarm' => 'alarm' ), 
		array( 'pe-7s-airplay' => 'airplay' ), 
	);
	
	return $icons;
}
//add_filter( 'vc_iconpicker-type-stroke7_pixeden', 'kwayy_vc_iconpicker_type_stroke7_pixeden' );



/*
 *  Enqueue CSS file when necessory
 */
// function kwayy_vc_enqueue_stroke7_pixeden_css(){
	// wp_enqueue_style( 'pe-icon-7-stroke', get_template_directory_uri() . '/inc/stroke7-pixeden/Pe-icon-7-stroke.css', false, '1.0.0' );
// }
// add_filter( 'vc_enqueue_font_icon_element', 'kwayy_vc_enqueue_stroke7_pixeden_css' );





/**
 * Enqueue scripts and styles for the admin section.
 *
 * @since Apicona Advanced 1.0
 *
 * @return void
 */
// function kwayy_admin_pe_icon_7_stroke_css() {
	// wp_enqueue_style( 'pe-icon-7-stroke', get_template_directory_uri() . '/inc/stroke7-pixeden/Pe-icon-7-stroke.css', false, '1.0.0' );
// }
// add_action( 'admin_enqueue_scripts', 'kwayy_admin_pe_icon_7_stroke_css' );






/************************** Custom Template *****************************/
add_filter( 'vc_load_default_templates', 'tm_custom_template_for_vc' );
function tm_custom_template_for_vc($maindata) {
	
	$maindata = array();
	
	/* ***************** */
	
	
	// 1st sample: Main Homepage
    $data               = array();
    $data['name']       = __( 'Main Homepage', 'apicona' );
    // $data['image_path'] = get_template_directory_uri() . '/inc/images/sample-page.png' ; // always use preg replace to be sure that "space" will not break logic
    $data['custom_class'] = 'apiconaadv_home_template';
    $data['content']    = <<<CONTENTTTTTTTTTTT
[vc_row css=".vc_custom_1466659384396{margin-top: -148px !important;padding-top: 0px !important;padding-bottom: 50px !important;}"][vc_column width="1/3" textcolor="white" css=".vc_custom_1465989418039{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tm-servicebox h2="Find a Test" h2_font_container="font_size:25px|line_height:32px" h2_use_theme_fonts="yes" txt_align="left" shape="rounded" add_button="bottom" btn_title="MORE DETAILS" btn_color="inverse" btn_add_icon="true" btn_i_align="right" btn_i_icon_fontawesome="fa fa-angle-double-right" add_icon="left" i_icon_fontawesome="fa fa-map-marker" i_color="white" i_background_style="none" i_size="lg" btn_link="url:%23||" css=".vc_custom_1473410114060{background: rgba(28,28,28,0.92) url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/09/data-img-1.png?id=3854) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;*background-color: rgb(28,28,28) !important;}" use_custom_fonts_h2="true" btn_custom_onclick="true"]At vero eos et accusamus et iusto odio dignissimos ducimus qui.[/tm-servicebox][/vc_column][vc_column width="1/3" textcolor="white"][tm-servicebox h2="Personal Cabinet" h2_font_container="font_size:25px|line_height:32px" h2_use_theme_fonts="yes" txt_align="left" shape="rounded" add_button="bottom" btn_title="MORE DETAILS" btn_color="inverse" btn_add_icon="true" btn_i_align="right" btn_i_icon_fontawesome="fa fa-angle-double-right" add_icon="left" i_icon_fontawesome="fa fa-user" i_color="white" i_background_style="none" i_size="lg" btn_link="url:%23||" css=".vc_custom_1473410216877{background: rgba(28,28,28,0.92) url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/data-img-4.png?id=3834) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;*background-color: rgb(28,28,28) !important;}" use_custom_fonts_h2="true" btn_custom_onclick="true"]At vero eos et accusamus et iusto odio dignissimos ducimus qui.[/tm-servicebox][/vc_column][vc_column width="1/3" textcolor="white" css=".vc_custom_1465814292626{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tm-servicebox h2="Get Result Online" h2_font_container="font_size:25px|line_height:32px" h2_use_theme_fonts="yes" txt_align="left" shape="rounded" add_button="bottom" btn_title="MORE DETAILS" btn_color="white" btn_add_icon="true" btn_i_align="right" btn_i_icon_fontawesome="fa fa-angle-double-right" add_icon="left" i_icon_fontawesome="fa fa-hospital-o" i_color="white" i_background_style="none" i_size="lg" btn_link="url:%23||" use_custom_fonts_h2="true" css=".vc_custom_1473410270515{background: rgba(225,62,32,0.92) url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/data-img-2.png?id=3848) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;*background-color: rgb(225,62,32) !important;}" btn_custom_onclick="true"]At vero eos et accusamus et iusto odio dignissimos ducimus qui.[/tm-servicebox][/vc_column][/vc_row][vc_row css=".vc_custom_1471072039154{padding-top: 40px !important;}" break_in_responsive_996="true"][vc_column width="1/3" el_class="tm-services-box-border"][tm-servicebox h2="HEART DISEASE" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-heartbeat" i_color="white" i_background_style="rounded" i_background_color="skincolor" i_size="lg"]At vero eos et accusamus et iusto odio dignissimos ducimus.[/tm-servicebox][tm-servicebox h2="EYE HEALTH" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-eye" i_color="white" i_background_style="rounded" i_background_color="skincolor" i_size="lg"]At vero eos et accusamus et iusto odio dignissimos ducimus.[/tm-servicebox][tm-servicebox h2="PREGNANCY" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-stethoscope" i_color="white" i_background_style="rounded" i_background_color="skincolor" i_size="lg"]At vero eos et accusamus et iusto odio dignissimos ducimus.[/tm-servicebox][tm-servicebox h2="DIABETES" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-medkit" i_color="white" i_background_style="rounded" i_background_color="skincolor" i_size="lg"]At vero eos et accusamus et iusto odio dignissimos ducimus.[/tm-servicebox][/vc_column][vc_column width="2/3"][vc_row_inner][vc_column_inner width="2/3"][heading text="ABOUT US &amp; WHY CHOOSE US" align="left" heading_sep="no" subtext="Welcome to apicona "][vc_column_text]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, <strong>similique sunt in culpa qui</strong> officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit <strong>quo minus id</strong> quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.

Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et <strong>voluptates repudiandae sint</strong> et molestiae non recusandae. Itaque earum rerum hic delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat quibusdam et aut officiis debitis aut rerum necessitatibus.[/vc_column_text][vc_btn title="VIEW MORE" style="flat" color="black" css_animation="left-to-right" link="url:%23||" css=".vc_custom_1465988178152{margin-right: 18px !important;}"][vc_btn title="PURCHASE" style="outline" i_align="right" i_icon_fontawesome="fa fa-shopping-cart" css_animation="right-to-left" link="url:https%3A%2F%2Fthemeforest.net%2Fitem%2Fapicona-health-medical-wordpress-theme%2F9150966%3Fref%3Dthememount||target:%20_blank" add_icon="true"][/vc_column_inner][vc_column_inner width="1/3"][vc_custom_heading text="Our Medical Specialists" font_container="tag:h3|font_size:20px|text_align:left|line_height:27px" use_theme_fonts="yes" css=".vc_custom_1465798731320{margin-bottom: 20px !important;}"][vc_single_image image="3848" img_size="medium" css=".vc_custom_1473410618402{margin-bottom: 20px !important;}"][vc_column_text]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos.

Dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et.[/vc_column_text][vc_btn title="MORE DETAILS" color="inverse" align="left" i_align="right" i_icon_fontawesome="fa fa-angle-double-right" css_animation="bottom-to-top" add_icon="true" css=".vc_custom_1465988250358{margin-top: -30px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" equalheight="true" css=".vc_custom_1471072049905{padding-top: 0px !important;padding-bottom: 0px !important;}" break_in_responsive_996="true"][vc_column width="1/2" css=".vc_custom_1473411166416{background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/data-img-4.png?id=3834) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][vc_column width="1/2" css=".vc_custom_1473411233120{padding-top: 100px !important;padding-right: 60px !important;padding-bottom: 100px !important;padding-left: 60px !important;background: rgba(247,247,247,0.92) url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/09/data-img-1.png?id=3854) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;*background-color: rgb(247,247,247) !important;}"][heading text="POWERED BY OVER 3,500 PATIENTS TRUST US WITH THEIR SWEET LOVE." align="left" heading_sep="no" subtext="Happy customers"][vc_row_inner el_class="tm-fid-border"][vc_column_inner width="1/3"][facts_in_digits title="Award Shows" icon_align="left" icon="fa-trophy" digit="106" icon_icon_fontawesome="fa fa-trophy"][facts_in_digits title="Satisfied Patients" icon_align="left" icon="fa-thumbs-o-up" digit="2453"][/vc_column_inner][vc_column_inner width="1/3"][facts_in_digits title="Hospital Rooms" icon_align="left" icon="fa-bed" digit="1247" icon_icon_fontawesome="fa fa-th-list"][facts_in_digits title="Machines" icon_align="left" icon="fa-heartbeat" digit="247" icon_icon_fontawesome="fa fa-flask"][/vc_column_inner][vc_column_inner width="1/3"][facts_in_digits title="Qualified Staff" icon_align="left" icon="fa-user-md" digit="234" icon_icon_fontawesome="fa fa-user-md"][facts_in_digits title="Cured Patients" icon_align="left" icon="fa-users" digit="587" icon_icon_fontawesome="fa fa-h-square"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" parallax="content-moving" parallax_image="3854" parallax_speed_bg="2.5" bgtype="dark" css=".vc_custom_1473411298969{padding-top: 115px !important;padding-bottom: 105px !important;}"][vc_column][vc_custom_heading text="Need a Doctor for Check-up?" font_container="tag:h2|font_size:32px|text_align:center|line_height:45px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal"][vc_custom_heading text="JUST MAKE AN APPOINTMENT &amp; YOU'RE DONE!" font_container="tag:h2|font_size:38px|text_align:center|line_height:47px" google_fonts="font_family:Ubuntu%3A300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic|font_style:500%20bold%20regular%3A500%3Anormal"][vc_btn title="GET AN APPOINTMENT" style="flat" align="center" i_align="right" i_icon_fontawesome="fa fa-plus" css_animation="bottom-to-top" link="url:%23||" add_icon="true" css=".vc_custom_1465988284061{padding-top: 30px !important;}"][/vc_column][/vc_row][vc_row][vc_column][portfoliobox title="LATEST HEALTH TIPS" show="6" pdesign="nopadding" subtitle="Awesome tips for happy and healthy"][vc_btn title="view more health tips" style="outline" color="black" align="center" css_animation="bottom-to-top" link="url:%23||" css=".vc_custom_1465988308484{margin-top: 50px !important;}"][/vc_column][/vc_row][vc_row full_width="stretch_row" bgtype="grey" css=".vc_custom_1473238833573{padding-bottom: 60px !important;background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2014/07/pattern-bg1-1.jpg?id=2636) !important;}"][vc_column width="1/2"][heading text="HOSPITAL DEPARTMENTS" align="left" heading_sep="no" subtext="We offer services"][vc_tta_accordion color="white" gap="5" c_icon="" active_section="1" no_fill="true"][vc_tta_section i_icon_fontawesome="fa fa-stethoscope" title="Dental Clinic" tab_id="1465909080496-aa74fcd0-1b5d" add_icon="true"][vc_row_inner][vc_column_inner width="1/2"][vc_single_image image="3854" img_size="large"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="Neque porro quisquam est " font_container="tag:h4|font_size:17px|text_align:left|line_height:25px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal"][vc_column_text css=".vc_custom_1465970589031{margin-bottom: 5px !important;}"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.[/vc_column_text][vc_btn title="VIEW MORE" color="black" i_align="right" i_icon_fontawesome="fa fa-angle-double-right" link="url:%23||" add_icon="true"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section i_icon_fontawesome="fa fa-hospital-o" title="Neurology" tab_id="1465970767146-12dcbb86-65bc" add_icon="true"][vc_row_inner][vc_column_inner width="1/2"][vc_single_image image="3854" img_size="large"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="Neque porro quisquam est " font_container="tag:h4|font_size:17px|text_align:left|line_height:25px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal"][vc_column_text css=".vc_custom_1465970589031{margin-bottom: 5px !important;}"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.[/vc_column_text][vc_btn title="VIEW MORE" color="black" i_align="right" i_icon_fontawesome="fa fa-angle-double-right" link="url:%23||" add_icon="true"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section i_icon_fontawesome="fa fa-ambulance" title="Cardiac Clinic" tab_id="1465970817232-2a9eb9a9-2d99" add_icon="true"][vc_row_inner][vc_column_inner width="1/2"][vc_single_image image="3854" img_size="large"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="Neque porro quisquam est " font_container="tag:h4|font_size:17px|text_align:left|line_height:25px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal"][vc_column_text css=".vc_custom_1465970589031{margin-bottom: 5px !important;}"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.[/vc_column_text][vc_btn title="VIEW MORE" color="black" i_align="right" i_icon_fontawesome="fa fa-angle-double-right" link="url:%23||" add_icon="true"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section i_icon_fontawesome="fa fa-h-square" title="Primary Health Care" tab_id="1465970880596-7c02e79c-55d5" add_icon="true"][vc_row_inner][vc_column_inner width="1/2"][vc_single_image image="3854" img_size="large"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="Neque porro quisquam est " font_container="tag:h4|font_size:17px|text_align:left|line_height:25px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal"][vc_column_text css=".vc_custom_1465970589031{margin-bottom: 5px !important;}"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.[/vc_column_text][vc_btn title="VIEW MORE" color="black" i_align="right" i_icon_fontawesome="fa fa-angle-double-right" link="url:%23||" add_icon="true"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section i_icon_fontawesome="fa fa-user-md" title="Allergic Diseases" tab_id="1465970922786-d94b4d0b-f85f" add_icon="true"][vc_row_inner][vc_column_inner width="1/2"][vc_single_image image="3854" img_size="large"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="Neque porro quisquam est " font_container="tag:h4|font_size:17px|text_align:left|line_height:25px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal"][vc_column_text css=".vc_custom_1465970589031{margin-bottom: 5px !important;}"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.[/vc_column_text][vc_btn title="VIEW MORE" color="black" i_align="right" i_icon_fontawesome="fa fa-angle-double-right" link="url:%23||" add_icon="true"][/vc_column_inner][/vc_row_inner][/vc_tta_section][/vc_tta_accordion][/vc_column][vc_column width="1/2"][blogbox title="LATEST NEWS" align="left" heading_sep="no" category="ayurveda,cardiac,lifestyle,health-care,rehabilitation,science,medical" show="2" column="one" subtitle="From our blog"][/vc_column][/vc_row][vc_row full_width="stretch_row" parallax="content-moving" parallax_image="3854" parallax_speed_bg="2.0" bgtype="skin" css=".vc_custom_1473412459949{padding-bottom: 75px !important;background-position: center;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][testimonial title="WHAT OUR PATIENTS ARE SAYING" boxdesign="onecol" show="5" view="carousel" subtitle="What Our Happy Clients say about us"][/vc_column][/vc_row][vc_row css=".vc_custom_1466489850940{padding-bottom: 70px !important;}"][vc_column][team title="EXPERIENCED TEAM" show="6" view="carousel" subtitle="Our doctors"][/vc_column][/vc_row]
CONTENTTTTTTTTTTT;
	$maindata[] = $data;
	
	
	
	
	
	// 2nd sample: Home version 1
    $data               = array();
    $data['name']       = __( 'Home Version 1', 'apicona' );
    // $data['image_path'] = get_template_directory_uri() . '/inc/images/sample-page1.png' ; // always use preg replace to be sure that "space" will not break logic
    $data['custom_class'] = 'apiconaadv_home_2_template';
    $data['content']    = <<<CONTENTTTTTTTTTTT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1465208345334{padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column width="1/3" bgcolor="dark" css=".vc_custom_1473413359671{padding-top: 60px !important;padding-right: 40px !important;padding-bottom: 40px !important;padding-left: 40px !important;background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/data-img-2.png?id=3848) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tm-servicebox h2="MEDICAL SPECIALISTS" txt_align="left" add_button="bottom" btn_color="white" btn_add_icon="true" btn_i_align="right" btn_i_icon_fontawesome="fa fa-long-arrow-right" add_icon="left" i_icon_fontawesome="fa fa-heartbeat" i_color="white" i_background_style="none" i_size="lg" css=".vc_custom_1473413248403{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" btn_link="url:%23||" btn_custom_onclick="true"]Aenean placerat. In vulputate urna eu arcu. Aliquam erat volutpat. Suspendisse potenti. Morbi mattis felis at nunc. Duis viverra diam non justo. In nisl. Nullam sit amet magna in magna.[/tm-servicebox][/vc_column][vc_column width="1/3" bgcolor="skin" css=".vc_custom_1473413538408{padding-top: 60px !important;padding-right: 40px !important;padding-bottom: 40px !important;padding-left: 40px !important;background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/09/data-img-1.png?id=3854) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tm-servicebox h2="MEDICINE RESEARCH" txt_align="left" add_button="bottom" btn_color="white" btn_add_icon="true" btn_i_align="right" btn_i_icon_fontawesome="fa fa-long-arrow-right" add_icon="left" i_icon_fontawesome="fa fa-user-md" i_color="white" i_background_style="none" i_size="lg" css=".vc_custom_1473413755382{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" btn_link="url:%23||" btn_custom_onclick="true"]Aenean placerat. In vulputate urna eu arcu. Aliquam erat volutpat. Suspendisse potenti. Morbi mattis felis at nunc. Duis viverra diam non justo. In nisl. Nullam sit amet magna in magna.[/tm-servicebox][/vc_column][vc_column width="1/3" bgcolor="dark" css=".vc_custom_1473413875162{padding-top: 60px !important;padding-right: 40px !important;padding-bottom: 40px !important;padding-left: 40px !important;background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/data-img-4.png?id=3834) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tm-servicebox h2="EMERGENCY SERVICES" txt_align="left" add_button="bottom" btn_color="white" btn_add_icon="true" btn_i_align="right" btn_i_icon_fontawesome="fa fa-long-arrow-right" add_icon="left" i_icon_fontawesome="fa fa-ambulance" i_color="white" i_background_style="none" i_size="lg" css=".vc_custom_1473413962544{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" btn_link="url:%23||" btn_custom_onclick="true"]Aenean placerat. In vulputate urna eu arcu. Aliquam erat volutpat. Suspendisse potenti. Morbi mattis felis at nunc. Duis viverra diam non justo. In nisl. Nullam sit amet magna in magna.[/tm-servicebox][/vc_column][/vc_row][vc_row css=".vc_custom_1466684306569{padding-bottom: 70px !important;}"][vc_column width="1/2" css=".vc_custom_1466684143452{padding-top: 40px !important;}"][vc_custom_heading text="ABOUT HEALTH &amp; MEDICAL" font_container="tag:h2|font_size:24px|text_align:left|color:%23222222|line_height:30px" google_fonts="font_family:Ubuntu%3A300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic|font_style:500%20bold%20regular%3A500%3Anormal"][vc_custom_heading text="Great one let abundantly sixth let were one earth were him after tree seed over." font_container="tag:h3|font_size:18px|text_align:left|color:rgba(34%2C34%2C34%2C0.73)|line_height:24px" google_fonts="font_family:Ubuntu%3A300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic|font_style:500%20bold%20regular%3A500%3Anormal"][vc_column_text]Mauris non iaculis massa. Sed bibendum quam porttitor ullamcorper facilisis. Aliquam vestibulum eget magna vitae convallis. Pellentesque ut mattis est, at convallis massa. Vestibulum elementum scelerisque lectus a accumsan. Pellentesque bibendum felis tempus, hendrerit nisi non, luctus nisi. Fusce blandit magna vitae velit facilisis luctus.[/vc_column_text][vc_btn title="Know more" style="classic" link="url:%23||"][/vc_column][vc_column width="1/2"][vc_gallery interval="3" images="3854,3848,3834" img_size="large"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" bgtype="grey" css=".vc_custom_1466684581985{padding-bottom: 0px !important;}"][vc_column][portfoliobox title="FEATURE HEALTH TIPS" show="8" pdesign="nopadding" column="four" subtitle="Awesome tips for happy and healthy"][/vc_column][/vc_row][vc_row css=".vc_custom_1466686553119{padding-bottom: 0px !important;}"][vc_column][heading text="LEADING THE WAY IN HOSPITAL" txt_align="center" subtext="Happy customers"][vc_row_inner][vc_column_inner width="1/3"][facts_in_digits title="Award Shows" icon="fa-mortar-board" digit="106" icon_icon_fontawesome="fa fa-graduation-cap"][facts_in_digits title="Hospital Rooms" icon="fa-bed" digit="1324" icon_icon_fontawesome="fa fa-server"][/vc_column_inner][vc_column_inner width="1/3"][vc_single_image image="3864" img_size="large" alignment="center" css=".vc_custom_1473412876281{margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="1/3"][facts_in_digits title="Satisfied Patients" icon="fa-thumbs-o-up" digit="2457"][facts_in_digits title="Machines" icon="fa-ambulance" digit="1477" icon_icon_fontawesome="fa fa-filter"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" bgtype="grey" css=".vc_custom_1467004461626{padding-bottom: 20px !important;}"][vc_column][blogbox title="OUR LATEST NEWS" align="left" heading_sep="no" category="ayurveda,cardiac,health-care,lifestyle,medical,rehabilitation,science" show="7" view="carousel" txt_align="left" subtitle="From blog"][/vc_column][/vc_row][vc_row full_width="stretch_row" parallax="content-moving" parallax_image="3854" parallax_speed_bg="2.0" bgtype="dark"][vc_column][vc_custom_heading text="A TOTAL FOCUS ON PATIENT CARE" font_container="tag:h2|font_size:51px|text_align:center|line_height:60px" use_theme_fonts="yes"][vc_custom_heading text="We practice preventative care to stop issues before they happen " font_container="tag:p|font_size:22px|text_align:center|line_height:36px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1467003577907{margin-bottom: 40px !important;}"][vc_row_inner][vc_column_inner width="1/2"][vc_btn title="Download now " style="flat" align="right" link="url:%23||"][/vc_column_inner][vc_column_inner width="1/2"][vc_btn title="GET IN TOUCH" style="outline" color="white" align="left" link="url:%23||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1467012615988{padding-bottom: 80px !important;}"][vc_column][team title="EXPERIENCED TEAM" align="left" heading_sep="no" show="6" view="carousel" txt_align="left" subtitle="Our doctors"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" equalheight="true" css=".vc_custom_1471071674232{padding-top: 0px !important;padding-bottom: 0px !important;}" break_in_responsive_996="true"][vc_column width="1/3" bgcolor="grey" css=".vc_custom_1467008982625{padding-top: 50px !important;padding-right: 50px !important;padding-bottom: 50px !important;padding-left: 50px !important;}"][heading text="APPOINTMENT FORM" align="left" heading_sep="no" subtext="Quick help"][contact-form-7 id="3579"][/vc_column][vc_column width="1/3" bgcolor="skin" css=".vc_custom_1473240294860{padding-top: 50px !important;padding-right: 50px !important;padding-bottom: 50px !important;padding-left: 50px !important;background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/portfolio_two-1.jpg?id=2446) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][heading text="OPENING HOURS" align="left" heading_sep="no" subtext="Check schedule" css=".vc_custom_1473234619661{margin-bottom: -15px !important;}"][tm-schedulebox title="" heading_sep="no" scheduler="%5B%7B%22weekday%22%3A%22Monday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Tuesday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Wednesday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Thursday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Friday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Saturday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Sunday%22%2C%22timing%22%3A%22Closed%22%7D%5D"][vc_custom_heading text="EMERGENCY CALL US 123 4567 890 " font_container="tag:h3|font_size:20px|text_align:left|line_height:25px" google_fonts="font_family:Ubuntu%3A300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1467012462149{margin-top: 25px !important;}"][/vc_column][vc_column width="1/3" css=".vc_custom_1473412955078{background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/09/data-img-1.png?id=3854) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][/vc_row]
CONTENTTTTTTTTTTT;
	$maindata[] = $data;
	
	
	
	// 3rd sample: Home Version 2
    $data               = array();
    $data['name']       = __( 'Home Version 2', 'apicona' );
    // $data['image_path'] = get_template_directory_uri() . '/inc/images/sample-page2.png' ; // always use preg replace to be sure that "space" will not break logic
    $data['custom_class'] = 'apiconaadv_home_3_template';
    $data['content']    = <<<CONTENTTTTTTTTTTT
[vc_row css=".vc_custom_1466494086763{padding-bottom: 0px !important;}"][vc_column][heading text="THE BEST FOR YOUR HEALTH" align="left" heading_sep="no" subtext="Welcome to apicona "][vc_row_inner][vc_column_inner width="1/4"][tm-servicebox h2="SPECIALTY DENTISTRY" txt_align="left" add_icon="topleft" i_icon_fontawesome="fa fa-stethoscope" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.[/tm-servicebox][tm-servicebox h2="GENERAL DENTISTRY" txt_align="left" add_icon="topleft" i_icon_fontawesome="fa fa-user-md" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.[/tm-servicebox][tm-servicebox h2="COSMETIC DENTAL CARE" txt_align="left" add_icon="topleft" i_icon_fontawesome="fa fa-hospital-o" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.[/tm-servicebox][/vc_column_inner][vc_column_inner el_class="tm-col-large" width="1/2"][vc_single_image image="3864" img_size="full" alignment="center" css=".vc_custom_1473414291177{margin-bottom: 0px !important;padding-top: 15px !important;}"][/vc_column_inner][vc_column_inner el_class="tm-col-large" width="1/4" css=".vc_custom_1466513934867{border-top-width: 7px !important;border-right-width: 7px !important;border-bottom-width: 7px !important;border-left-width: 7px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 35px !important;padding-left: 20px !important;background-color: #f9f9f9 !important;border-left-color: #f0f0f0 !important;border-left-style: solid !important;border-right-color: #f0f0f0 !important;border-right-style: solid !important;border-top-color: #f0f0f0 !important;border-top-style: solid !important;border-bottom-color: #f0f0f0 !important;border-bottom-style: solid !important;}"][vc_custom_heading text="APPOINTMENT FORM" font_container="tag:h3|font_size:19px|text_align:left|line_height:24px" use_theme_fonts="yes"][contact-form-7 id="3579"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1468820542149{padding-top: 0px !important;padding-bottom: 0px !important;}" equalheight="true" break_in_responsive_996="true"][vc_column width="1/3" css=".vc_custom_1473414350829{padding-top: 70px !important;padding-right: 50px !important;padding-bottom: 45px !important;padding-left: 50px !important;background: rgba(244,244,244,0.89) url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/data-img-2.png?id=3848) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;*background-color: rgb(244,244,244) !important;}"][heading text="EMERGENCY CASES" align="left" heading_sep="no" subtext="Quich help" css=".vc_custom_1473226824825{margin-bottom: -5px !important;}"][vc_column_text]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium <strong>doloremque laudantium</strong>, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
<blockquote>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</blockquote>
[/vc_column_text][vc_btn title="CONTACT US NOW" style="outline" color="inverse" css_animation="bottom-to-top" link="url:%23||"][/vc_column][vc_column width="1/3" bgcolor="skin" css=".vc_custom_1468835105575{padding-top: 70px !important;padding-right: 50px !important;padding-bottom: 45px !important;padding-left: 50px !important;}"][heading text="OUR WORKING HOURS" align="left" heading_sep="no" subtext=" Check schedule" css=".vc_custom_1473226830880{margin-bottom: -15px !important;}"][tm-schedulebox title="" heading_sep="no" scheduler="%5B%7B%22weekday%22%3A%22Monday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Tuesday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Wednesday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Thursday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Friday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Saturday%22%2C%22timing%22%3A%2209%3A00%20-%2017%3A00%22%7D%2C%7B%22weekday%22%3A%22Sunday%22%2C%22timing%22%3A%22Closed%22%7D%5D"][/vc_column][vc_column width="1/3" bgcolor="dark" css=".vc_custom_1473414323347{padding-top: 70px !important;padding-right: 50px !important;padding-bottom: 45px !important;padding-left: 50px !important;background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/data-img-4.png?id=3834) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][heading text="OUR SPECIAL SERVICES" align="left" heading_sep="no" subtext="Get well soon" css=".vc_custom_1473226837537{margin-bottom: -10px !important;}"][tm-list icon_icon_fontawesome="fa fa-check-circle" line1="T3J0aG9kb250aWNzJTIwZm9yJTIwY2hpbGRyZW4lMjAlMjYlMjBhZHVsdHM=" line2="QWxsLWluY2x1c2l2ZSUyMGJyYWNlcyUyMHBhY2thZ2Vz" line3="RmxleGlibGUlMjBmaW5hbmNpbmclMjBtYWtlcyUyMGJyYWNlcyUyMG1vcmUlMjAlMEFhZmZvcmRhYmxl" line4="SW5jcmVhc2UlMjB5b3VyJTIwb3ZlcmFsbCUyMGRlbnRhbCUyMGhlYWx0aA==" line5="UmVkdWNpbmclMjB0b290aCUyMGRlY2F5JTIwcmlzayUyMCUyNiUyMGd1bSUyMGRpZWFzZQ==" line6="Q29uZ2VzdGl2ZSUyMEhlYXJ0JTIwRmFsaXVyZQ=="][vc_btn title="LEARN MORE" style="outline" color="white" css_animation="bottom-to-top" link="url:%23||" css=".vc_custom_1466512808885{padding-top: 25px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1466576798266{padding-bottom: 80px !important;}"][vc_column][portfoliobox title="OUR PRACTICE AREAS" align="left" heading_sep="no" show="6" view="carousel" subtitle="Awesome tips for happy and healthy"][/vc_column][/vc_row][vc_row full_width="stretch_row" bgtype="grey" css=".vc_custom_1466602147030{padding-bottom: 65px !important;background-image: url(http://test.thememount.com/wp-content/uploads/2014/07/pattern-bg1.jpg?id=2636) !important;}"][vc_column width="1/3"][testimonial title="TESTIMONIAL" align="left" heading_sep="no" show="5" view="carousel" column="one" subtitle="What others say about us"][/vc_column][vc_column width="2/3"][heading text="APICONA SERVICES" align="left" heading_sep="no" subtext="Get well soon"][vc_row_inner][vc_column_inner width="1/2"][tm-servicebox h2="HEART DISEASE" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-heartbeat" i_background_style="none" i_size="lg"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.[/tm-servicebox][tm-servicebox h2="NUROLOGY" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-h-square" i_background_style="none" i_size="lg"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.[/tm-servicebox][tm-servicebox h2="CANCER CARE" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-stethoscope" i_background_style="none" i_size="lg"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.[/tm-servicebox][/vc_column_inner][vc_column_inner width="1/2"][tm-servicebox h2="SPECIALTY DENTISTRY" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-hospital-o" i_background_style="none" i_size="lg"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.[/tm-servicebox][tm-servicebox h2="CARDIAC CLINIC" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-medkit" i_background_style="none" i_size="lg"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.[/tm-servicebox][tm-servicebox h2="GENERAL HEALTH CARE" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-user-md" i_background_style="none" i_size="lg"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.[/tm-servicebox][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" parallax="content-moving" parallax_image="2669" parallax_speed_bg="4.0" bgtype="dark" css=".vc_custom_1473414749097{padding-bottom: 65px !important;background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/09/data-img-1.png?id=3854) !important;}"][vc_column width="1/4"][facts_in_digits title="Qualified Staff" icon_align="left" icon="fa-user-md" digit="234" icon_icon_fontawesome="fa fa-user-md"][/vc_column][vc_column width="1/4"][facts_in_digits title="Hospital Rooms" icon_align="left" icon="fa-bars" digit="1214" icon_icon_fontawesome="fa fa-bars"][/vc_column][vc_column width="1/4"][facts_in_digits title="Satisfied Patients" icon_align="left" icon="fa-thumbs-o-up" digit="2453"][/vc_column][vc_column width="1/4"][facts_in_digits title="Our Machines" icon_align="left" icon="fa-flask" digit="234" icon_icon_fontawesome="fa fa-flask"][/vc_column][/vc_row][vc_row][vc_column][team title="MEET OUR DOCTORS" align="left" heading_sep="no" boxdesign="leftimage" show="5" view="carousel" column="two" subtitle="Check all our doctors"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" equalheight="true" css=".vc_custom_1466584383153{padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column width="1/2" bgcolor="skin" css=".vc_custom_1473414810528{padding-top: 100px !important;padding-right: 100px !important;padding-bottom: 80px !important;padding-left: 14% !important;background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/09/data-img-1.png?id=3854) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][heading text="WHY CHOOSE APICONA" align="left" heading_sep="no" subtext="General information"][tm-servicebox h2="PRIMARY HEALTH CARE" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-heartbeat" i_color="white" i_background_color="white" i_size="lg"]At vero eos et accusamus et iusto odio dignissimos ducimus qui.[/tm-servicebox][tm-servicebox h2="REHABILITATION STUDIO" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-eye" i_color="white" i_background_color="white" i_size="lg"]At vero eos et accusamus et iusto odio dignissimos ducimus qui.[/tm-servicebox][tm-servicebox h2="GYNAECOLOGICAL CLINIC" txt_align="left" add_icon="left" i_icon_fontawesome="fa fa-stethoscope" i_color="white" i_background_color="white" i_size="lg"]At vero eos et accusamus et iusto odio dignissimos ducimus qui.[/tm-servicebox][/vc_column][vc_column width="1/2" css=".vc_custom_1473414781532{background-image: url(http://apicona-advanced-data.thememount.com/wp-content/uploads/2016/06/data-img-4.png?id=3834) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_icon icon_fontawesome="fa fa-play" color="white" background_style="rounded-outline" background_color="white" size="lg" align="center" css_animation="appear" link="||" css=".vc_custom_1468845377379{padding-top: 240px !important;}"][/vc_column][/vc_row][vc_row full_width="stretch_row" bgtype="grey" css=".vc_custom_1466587768712{padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column][clients title="" heading_sep="no" carousel_dots="false" carousel_nav="true"][/vc_column][/vc_row][vc_row css=".vc_custom_1466590744176{padding-bottom: 40px !important;}"][vc_column][blogbox title="RECENT POST" align="left" heading_sep="no" category="ayurveda,cardiac,health-care,lifestyle,medical,rehabilitation,science" show="5" view="carousel" subtitle="From our blog"][/vc_column][/vc_row][vc_row full_width="stretch_row" bgtype="skin" css=".vc_custom_1466590409902{padding-top: 60px !important;padding-bottom: 30px !important;}"][vc_column][vc_cta h2="OUR EXPERTS WILL HELP YOU 24 HOURS EVERY WEEKDAY" h2_font_container="font_size:25px|line_height:30px" h2_google_fonts="font_family:Ubuntu%3A300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic|font_style:500%20bold%20regular%3A500%3Anormal" shape="square" add_button="right" btn_title="BOOK APPOINTMENT!" btn_link="url:%23||" use_custom_fonts_h2="true"]Quisque et lectus pulvinar, porttitor mi non, elementum dui. Morbi mi nisl.[/vc_cta][/vc_column][/vc_row]
CONTENTTTTTTTTTTT;
	$maindata[] = $data;
	
	
	
	// 4th sample: Home version 3
    $data               = array();
    $data['name']       = __( 'Home Version 3', 'apicona' );
    // $data['image_path'] = get_template_directory_uri() . '/inc/images/sample-page3.png' ; // always use preg replace to be sure that "space" will not break logic
    $data['custom_class'] = 'apiconaadv_home_4_template';
    $data['content']    = <<<CONTENTTTTTTTTTTT
[vc_row full_width="stretch_row" bgtype="skin" css=".vc_custom_1468664174095{padding-top: 40px !important;padding-bottom: 0px !important;}"][vc_column][vc_cta h2="IF YOU NEED A DOCTOR ? MAKE AN APPOINMENT NOW!" shape="square" add_button="right" btn_title="APPOINTMENT" btn_style="outline" btn_link="url:%23||"][/vc_cta][/vc_column][/vc_row][vc_row css=".vc_custom_1468575875499{padding-bottom: 70px !important;}"][vc_column][heading text="WHAT DO WE DO" txt_align="center" h4="Laboris nisi ut aliquip ex ea commodo"][vc_row_inner][vc_column_inner width="1/3"][tm-servicebox h2="DEPARTMENTS" txt_align="left" add_button="bottom" btn_color="black" btn_add_icon="" icon_type="image" images="3854" btn_link="url:%23||"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.[/tm-servicebox][/vc_column_inner][vc_column_inner width="1/3"][tm-servicebox h2="MEDICAL SERVICES" txt_align="left" add_button="bottom" btn_color="black" btn_add_icon="" icon_type="image" images="3848" btn_link="url:%23||" btn_custom_onclick="true"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.[/tm-servicebox][/vc_column_inner][vc_column_inner width="1/3"][tm-servicebox h2="FIND A DOCTOR" txt_align="left" add_button="bottom" btn_color="black" btn_add_icon="" icon_type="image" images="3834" btn_link="url:%23||" btn_custom_onclick="true"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.[/tm-servicebox][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" parallax="content-moving" parallax_image="3854" parallax_speed_bg="2.0" textcolor="white" css=".vc_custom_1473415303376{padding-top: 120px !important;padding-bottom: 110px !important;background-color: rgba(12,12,12,0.79) !important;*background-color: rgb(12,12,12) !important;}"][vc_column][vc_custom_heading text="NEED A PERSONAL HEALTH PLAN?" font_container="tag:h2|font_size:40px|text_align:center|line_height:55px" google_fonts="font_family:Ubuntu%3A300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal" css=".vc_custom_1468575697754{margin-bottom: 10px !important;}"][vc_custom_heading text="Call Now (900) 123-4567 and receive Top Quality Healthcare for you and your Family" font_container="tag:h2|font_size:19px|text_align:center|line_height:25px" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][vc_btn title="Request a Plan" style="classic" align="center" i_align="right" i_icon_fontawesome="fa fa-check" link="url:%23||" add_icon="true" css=".vc_custom_1468575539726{margin-top: 40px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1468575875499{padding-bottom: 70px !important;}"][vc_column][heading text="WHY CHOOSE APICONA" txt_align="center" subtext="Omnis iste natus error sit voluptatem"][vc_row_inner][vc_column_inner width="1/3"][tm-servicebox h2="24 HOURS SERVICES" i_icon_fontawesome="fa fa-ambulance" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.[/tm-servicebox][tm-servicebox h2="REASONABLE BILLING" i_icon_fontawesome="fa fa-hospital-o" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.[/tm-servicebox][/vc_column_inner][vc_column_inner width="1/3"][tm-servicebox h2="CARE WITH LOVE" i_icon_fontawesome="fa fa-heartbeat" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.[/tm-servicebox][tm-servicebox h2="HUMBLE STAFF" i_icon_fontawesome="fa fa-stethoscope" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.[/tm-servicebox][/vc_column_inner][vc_column_inner width="1/3"][tm-servicebox h2="MEDICAL CONSULTING" i_icon_fontawesome="fa fa-h-square" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.[/tm-servicebox][tm-servicebox h2="QUALIFIED DOCTORS" i_icon_fontawesome="fa fa-user-md" i_background_style="none"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.[/tm-servicebox][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" parallax="content-moving" parallax_image="3854" parallax_speed_bg="2.0" bgtype="dark" css=".vc_custom_1473415352382{padding-top: 80px !important;padding-bottom: 40px !important;background-position: center;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/3"][tm-servicebox h2="WORKING OUR" txt_align="left" add_icon="left" i_type="linecons" i_icon_linecons="vc_li vc_li-clock" i_color="white" i_background_style="boxed-outline" i_background_color="skincolor" i_size="sm"]Mon to Sat - 9am to 6pm[/tm-servicebox][/vc_column][vc_column width="1/3"][tm-servicebox h2="CALL US" txt_align="left" add_icon="left" i_type="linecons" i_icon_linecons="vc_li vc_li-phone" i_color="white" i_background_style="boxed-outline" i_background_color="skincolor" i_size="sm"]Free consultancy from apicona[/tm-servicebox][/vc_column][vc_column width="1/3"][tm-servicebox h2="MAIL US" txt_align="left" add_icon="left" i_type="linecons" i_icon_linecons="vc_li vc_li-mail" i_color="white" i_background_style="boxed-outline" i_background_color="skincolor" i_size="sm"]info@example.com[/tm-servicebox][/vc_column][/vc_row][vc_row css=".vc_custom_1468588062225{padding-bottom: 0px !important;}"][vc_column width="2/3"][heading text="ABOUT APICONA" align="left" subtext="Laboris nisi ut aliquip"][vc_column_text css=".vc_custom_1468646116160{margin-bottom: 15px !important;}"]At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit.[/vc_column_text][vc_row_inner][vc_column_inner width="1/2"][tm-list icon_icon_fontawesome="fa fa-heartbeat" line1="RHVpcyUyMHZhcml1cyUyMHRvcnRvciUyMG5vbiUyMGFyY3UlMjBmaW5pYnVz" line2="Q3VyYWJpdHVyJTIwcXVpcyUyMG5pc2wlMjBldCUyMGp1c3RvJTIwZmF1Y2lidXM=" line3="VXQlMjB2YXJpdXMlMjBkaWFtJTIwdXQlMjByaXN1cyUyMGx1Y3R1cyUyQyUyMGlkJTIwbGFjaW5pYQ=="][/vc_column_inner][vc_column_inner width="1/2"][tm-list icon_icon_fontawesome="fa fa-heartbeat" line1="RHVpcyUyMHZhcml1cyUyMHRvcnRvciUyMG5vbiUyMGFyY3UlMjBmaW5pYnVz" line2="Q3VyYWJpdHVyJTIwcXVpcyUyMG5pc2wlMjBldCUyMGp1c3RvJTIwZmF1Y2lidXM=" line3="VXQlMjB2YXJpdXMlMjBkaWFtJTIwdXQlMjByaXN1cyUyMGx1Y3R1cyUyQyUyMGlkJTIwbGFjaW5pYQ=="][/vc_column_inner][/vc_row_inner][vc_btn title="VIEW MORE" style="classic" align="left" link="url:%23||" css=".vc_custom_1468646173634{margin-top: 20px !important;}"][/vc_column][vc_column width="1/3"][vc_single_image image="3864" img_size="full" alignment="center" css=".vc_custom_1473415412583{margin-bottom: 0px !important;}"][/vc_column][/vc_row][vc_row full_width="stretch_row" parallax="content-moving" parallax_image="3854" parallax_speed_bg="2.0" bgtype="dark" css=".vc_custom_1473415446248{padding-bottom: 60px !important;}"][vc_column width="1/4"][facts_in_digits title="Award Shows" icon="fa-graduation-cap" digit="120" icon_icon_fontawesome="fa fa-graduation-cap"][/vc_column][vc_column width="1/4"][facts_in_digits title="Satisfied Patients" icon="fa-thumbs-o-up" digit="1245"][/vc_column][vc_column width="1/4"][facts_in_digits title="Hospital Rooms" icon="fa-tasks" digit="2417" icon_icon_fontawesome="fa fa-tasks"][/vc_column][vc_column width="1/4"][facts_in_digits title="Machines" icon="fa-wheelchair" digit="2541" icon_icon_fontawesome="fa fa-wheelchair"][/vc_column][/vc_row][vc_row css=".vc_custom_1468653517349{padding-bottom: 80px !important;}"][vc_column][team title="MEET OUR TEAM" show="7" view="carousel" subtitle="Lorem ipsum dolor sit amet "][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" bgtype="grey" css=".vc_custom_1468656089972{padding-top: 70px !important;padding-bottom: 0px !important;}"][vc_column][portfoliobox title="FEATURED WORKS" show="8" pdesign="nopadding" column="four" subtitle="Mauris eget nulla id nunc mattis"][/vc_column][/vc_row][vc_row css=".vc_custom_1468657069773{padding-bottom: 50px !important;}"][vc_column width="1/2"][testimonial title="WHAT PATIENTS SAY" align="left" show="5" view="carousel" column="one" txt_align="left" subtitle="Lorem ipsum dolor sit amet"][/vc_column][vc_column width="1/2"][clients title="OUR CLIENTS" align="left" show="6" view="default" column="three" txt_align="left" subtitle="Lorem ipsum dolor sit amet"][/vc_column][/vc_row]
CONTENTTTTTTTTTTT;
	$maindata[] = $data;
	
	
	

	
	
	
	/************* END of Visual Composer Template list ***************/
	
	
	// Return all VC templates
	return $maindata;
	
}




