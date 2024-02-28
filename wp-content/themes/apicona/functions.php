<?php
/**
 * Apicona functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

/*
 * Global variable. 
 *
 */
$apicona = get_option('apicona');

/*
 * Get theme style value
 *
 * @see tm_get_theme_style() for template-specific adjustments.
 */

if( !function_exists('tm_get_theme_style') ){
function tm_get_theme_style(){

 $apicona = get_option('apicona');
 
 if( !empty($apicona['headerstyle']) ){
  // Theme already exists
  $return = isset($apicona['themestyle']) ? esc_attr($apicona['themestyle']) : 'apicona' ;
 } else {
  // Fresh wordpress setup
  $return = 'apiconaadv';
 }
 
 return $return;
 
}
}

/*
 * Set up the content width value based on the theme's design.
 *
 * @see apicona_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) ){
	$content_width = 727;
}

/**
 * Apicona only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) ){
	require get_template_directory() . '/inc/back-compat.php';
}


/*
 * Some functions that help to achive small functionality
 */
 
$themestyle = tm_get_theme_style();

if( $themestyle == 'apiconaadv' ){
	require_once(get_template_directory() . '/inc/tools-adv.php');
}else {
	require_once(get_template_directory() . '/inc/tools.php');
}


/*
 * Settings for WooCommerce.
 */
if( $themestyle == 'apiconaadv' ){
	require_once(get_template_directory() . '/inc/woocommerce-adv.php');
}else {
	require_once(get_template_directory() . '/inc/woocommerce.php');
}

/*
 * Ajax call for MIN file generator
 */
require_once(get_template_directory() . '/inc/redux-framework/redux_custom_fields/kwayy_min_generator/field_kwayy_min_generator_ajax.php');
require_once(get_template_directory() . '/inc/redux-framework/redux_custom_fields/kwayy_resetlike/field_kwayy_resetlike_ajax.php');
require_once(get_template_directory() . '/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/field_kwayy_switch_theme_style_ajax.php');



// Hook on Redux Save
add_action('redux/options/apicona/validate',      'tm_regenerate_dynamic_css');
add_action('redux/options/apicona/reset',         'tm_regenerate_dynamic_css_reset');
add_action('redux/options/apicona/section/reset', 'tm_regenerate_dynamic_css_reset');
function tm_regenerate_dynamic_css_reset($val){
	$default_options = $val->parent->options;
	$default_options = (array) $default_options;
	
	tm_regenerate_dynamic_css($default_options);
}


/*
 * Generate dynamic style CSS file on REDUX options are saved.
 */
function tm_redux_save(){
	
	global $apicona;
	// Checking if the dynamic-style.php edit.. If yes than re-generate dynamic-style.css files.
	$dynamicFile  = get_template_directory().'/css/dynamic-style.php';
	$styleFile    = get_template_directory().'/css/dynamic-style.css';
	$styleMinFile = get_template_directory().'/css/dynamic-style.min.css';
	
	
	// Checking if the dynamic-style-adv.php edit.. If yes than re-generate dynamic-style.css files.
	$dynamicFileAdv  	= get_template_directory().'/css/dynamic-style-adv.php';
	$styleFileAdv   	= get_template_directory().'/css/dynamic-style-adv.css';
	$styleMinFileAdv 	= get_template_directory().'/css/dynamic-style-adv.min.css';
	


	// Getting current file in MD5
	$dynamicFileMD5 = md5_file( $dynamicFile );
	
	// Getting current file in MD5
	$dynamicFileAdvMD5 = md5_file( $dynamicFileAdv );
	
	// Getting value of MD5
	$dynamic_generated = get_option('tm_dynamicstyle_generated');
	
	// Getting Current theme version
	$my_theme = wp_get_theme( 'apicona' );
	$currentThemeVersion = $my_theme->get( 'Version' );
	$storedThemeVersion  = get_option('tm_apicona_version');
	
	// Checking if theme updated
	$regenerateDynamicCSS = false;
	if($dynamic_generated!=$dynamicFileMD5){
		$regenerateDynamicCSS = true;
	}
	
	if($dynamic_generated != $dynamicFileAdvMD5){
		$regenerateDynamicCSS = true;
	}
	
	// Regenerating all CSS file as the theme version is updated
	if($currentThemeVersion!=$storedThemeVersion){
		tm_regenerate_all_css_js();
	}
	
	if( ($currentThemeVersion!=$storedThemeVersion) && is_array($apicona) && count($apicona)>0 ){
		tm_reset_tgm_infobox(); // Restting TGM notification box to show if user need to update VC or other plugin
		$regenerateDynamicCSS = true;
		update_option('tm_apicona_version', $currentThemeVersion);
	}
	

	
	// checking and running the dynamic-style.css generator
	if( !file_exists( $styleFile ) || !file_exists( $styleFile ) || $regenerateDynamicCSS==true ){
		tm_regenerate_dynamic_css();
	}
	
	// checking and running the dynamic-style-adv.css generator
	if( !file_exists( $styleFileAdv ) || $regenerateDynamicCSS==true ){
		tm_regenerate_dynamic_css();
	}
	
	// Updating
	update_option('tm_dynamicstyle_generated', $dynamicFileMD5);
	
}
function tm_regenerate_dynamic_css($val='') {
	
	// Overwriting global variable with latest values. By default, currently you will get old data from $apicona variable.
	if( $val!='' && is_array($val) ){
		global $apicona;
		//$apicona = get_option('apicona');
		$apicona = $val;
		
		// For reset only
		if( !isset($apicona['compiler']) ){
			$apicona['compiler'] = '';
		}
		if( !isset($apicona['redux-section']) ){
			$apicona['redux-section'] = '0';
		}
		if( !isset($apicona['import_code']) ){
			$apicona['import_code'] = '';
		}
		if( !isset($apicona['import_link']) ){
			$apicona['import_link'] = '';
		}
	
	}
	// Getting dynamic-style.php data
	ob_start();
	$apicona['dynamic-style-position']='internal';
	include('css/dynamic-style.php');
	$csscode = ob_get_clean();
	
	// Writing dynamic-style.css
	file_put_contents( get_template_directory().'/css/dynamic-style.css',$csscode);
	
	// Getting dynamic-style-adv.php data
	ob_start();
	$apicona['dynamic-style-position']='internal';
	include('css/dynamic-style-adv.php');
	$css_code = ob_get_clean();
	
	// Writing dynamic-style-adv.css
	file_put_contents( get_template_directory().'/css/dynamic-style-adv.css',$css_code);
	
	
	// Generating MIN version
	$css_array = array();
	$css_array[get_template_directory().'/css/dynamic-style.css'] = get_template_directory().'/css/dynamic-style.min.css';
	$css_array[get_template_directory().'/css/dynamic-style-adv.css'] = get_template_directory().'/css/dynamic-style-adv.min.css';
	
	ob_start();
	tm_minifier('css',$css_array);
	ob_get_clean();
	
	
}
add_action('init','tm_redux_save');




/**
 *  Regenerating min version of all CSS and JS files
 */
function tm_regenerate_all_css_js(){
	
	/* ----- Now regenerating CSS files ----- */
	
	// Getting all CSS files in /css/ directory.
	$css_dir   = get_template_directory().'/css/';
	$css_files = scandir($css_dir);
	
	// Fontiocn Library
	$ficon_css_dir  = get_template_directory().'/css/fonticon-library/';
	$ficon_css_list = scandir($ficon_css_dir);
	
	
	$css_array = array();
	$css_array[get_template_directory().'/style.css'] = get_template_directory().'/style.min.css'; // style.css
	$css_array[get_template_directory().'/rtl.css'] = get_template_directory().'/rtl.min.css'; // rtl.css
	$css_array[get_template_directory().'/rtl-adv.css'] = get_template_directory().'/rtl-adv.min.css'; // rtl.css
	$css_array[get_template_directory().'/style-login.css'] = get_template_directory().'/style-login.min.css'; // style-login.css
	
	
	foreach($css_files as $css){
		if ($css != "." && $css != ".." && substr($css, -4)=='.css'  && substr($css, -8)!='.min.css' ) {
			$newfileame  = str_replace('.css','.min.css',$css);
			$currentfile = $css_dir.$css;
			$newfile     = $css_dir.$newfileame;
			$css_array[$currentfile] = $newfile;
		}
	}
	
	foreach($ficon_css_list as $library){
		if ($library != "." && $library != ".." && is_dir($ficon_css_dir.$library) ) {
			$currentfile = $ficon_css_dir.$library.'/css/thememount-'.$library.'.css';
			$newfile     = $ficon_css_dir.$library.'/css/thememount-'.$library.'.min.css';
			$css_array[$currentfile] = $newfile;
		}
	}
	
	// processing all CSS fles
	tm_minifier('css',$css_array);
	
	
	/* ----- Now regenerating JS files ----- */
	
	
	// Getting all JS files in /js/ directory.
	$js_dir   = get_template_directory().'/js/';
	$js_files = scandir($js_dir);
	$js_array = array();
	foreach($js_files as $js){
		if ($js != "." && $js != ".." && substr($js, -3)=='.js'  && substr($js, -7)!='.min.js' ) {
			$newfileame  = str_replace('.js','.min.js',$js);
			$currentfile = $js_dir.$js;
			$newfile     = $js_dir.$newfileame;
			$js_array[$currentfile] = $newfile;
		}
	}
	
	// Now processing the files
	tm_minifier('js',$js_array);
	
	
}



/*
 *  This function will reset the TGM Activation message box to show if user need to update any plugin or not. This function will call after theme version changed.
 */

function tm_reset_tgm_infobox(){
	//update_user_meta( $user_id, $meta_key, $meta_value, $prev_value );
	update_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice_tgmpa', '0' );
}



/**
 * To make Breadcrumb NavXT plugin to WPML Ready 
 */
if(function_exists('bcn_display')){
	//Hook into the Breadcrumb NavXT title filter, want the 4.2+ version with 2 args
	add_filter('bcn_breadcrumb_title', 'bcn_ext_title_translater', 10, 2);
	/**
	 * This function is a filter for the bcn_breadcrumb_title filter, it runs through
	 * the SitePress::the_category_name_filter function
	 * 
	 * @param string $title The title to be filtered (translated)
	 * @param array $context The breadcrumb type array
	 * @return string The string filtered through SitePress::the_category_name_filter
	 */
	function bcn_ext_title_translater($title, $context){
		//Need to make sure we have a taxonomy and that the SitePress object is available
		if(is_array($context) && isset($context[0]) && taxonomy_exists($context[0]) && class_exists('SitePress')){
			//This may be a little dangerous due to the internal recursive calls for the function
			$title = SitePress::the_category_name_filter($title);
		}
		return $title;
	}
}




add_action('admin_init', 'tm_change_maxmegamenu_setting');
function tm_change_maxmegamenu_setting() {
	
	global $apicona;
	$breakpoint = '1200';
	$breakpoint = ( isset($apicona['menu_breakpoint']) && trim($apicona['menu_breakpoint'])!='' ) ? trim(esc_attr($apicona['menu_breakpoint'])) : '1200' ;
	
	if( isset($apicona['menu_breakpoint']) && $apicona['menu_breakpoint'] == 'custom'){
		$breakpoint =  $apicona['menu_breakpoint_custom'];
	}
	
	
	$themes['default'] = array(
            'title'                                     => __("Default", "apicona"),
            'container_background_from'                 => 'rgb(255, 255, 255)',
            'container_background_to'                   => 'rgb(255, 255, 255)',
            'container_padding_left'                    => '0px',
            'container_padding_right'                   => '0px',
            'container_padding_top'                     => '0px',
            'container_padding_bottom'                  => '0px',
            'container_border_radius_top_left'          => '0px',
            'container_border_radius_top_right'         => '0px',
            'container_border_radius_bottom_left'       => '0px',
            'container_border_radius_bottom_right'      => '0px',
            'arrow_up'                                  => 'dash-f142',
            'arrow_down'                                => 'dash-f140',
            'arrow_left'                                => 'dash-f141',
            'arrow_right'                               => 'dash-f139',
            'menu_item_background_from'                 => 'transparent',
            'menu_item_background_to'                   => 'transparent',
            'menu_item_background_hover_from'           => '#333',
            'menu_item_background_hover_to'             => '#333',
            'menu_item_spacing'                         => '0px',
            'menu_item_link_font'                       => 'inherit',
            'menu_item_link_font_size'                  => '14px',
            'menu_item_link_height'                     => '40px',
            'menu_item_link_color'                      => '#ffffff',
            'menu_item_link_weight'                     => 'normal',
            'menu_item_link_text_transform'             => 'normal',
            'menu_item_link_color_hover'                => '#ffffff',
            'menu_item_link_weight_hover'               => 'normal',
            'menu_item_link_padding_left'               => '10px',
            'menu_item_link_padding_right'              => '10px',
            'menu_item_link_padding_top'                => '0px',
            'menu_item_link_padding_bottom'             => '0px',
            'menu_item_link_border_radius_top_left'     => '0px',
            'menu_item_link_border_radius_top_right'    => '0px',
            'menu_item_link_border_radius_bottom_left'  => '0px',
            'menu_item_link_border_radius_bottom_right' => '0px',
            'panel_background_from'                     => '#f1f1f1',
            'panel_background_to'                       => '#f1f1f1',
            'panel_width'                               => '100%',
			'panel_border_color'                        => '#fff',
            'panel_border_left'                         => '0px',
            'panel_border_right'                        => '0px',
            'panel_border_top'                          => '0px',
            'panel_border_bottom'                       => '0px',
            'panel_border_radius_top_left'              => '0px',
            'panel_border_radius_top_right'             => '0px',
            'panel_border_radius_bottom_left'           => '0px',
            'panel_border_radius_bottom_right'          => '0px',
            'panel_header_color'                        => '#555',
            'panel_header_text_transform'               => 'uppercase',
            'panel_header_font'                         => 'inherit',
            'panel_header_font_size'                    => '16px',
            'panel_header_font_weight'                  => 'bold',
            'panel_header_padding_top'                  => '0px',
            'panel_header_padding_right'                => '0px',
            'panel_header_padding_bottom'               => '5px',
            'panel_header_padding_left'                 => '0px',
            'panel_padding_left'                        => '0px',
            'panel_padding_right'                       => '0px',
            'panel_padding_top'                         => '0px',
            'panel_padding_bottom'                      => '0px',
            'panel_widget_padding_left'                 => '15px',
            'panel_widget_padding_right'                => '15px',
            'panel_widget_padding_top'                  => '15px',
            'panel_widget_padding_bottom'               => '15px',
            'flyout_width'                              => '150px',
			'flyout_border_color'                        => '#ffffff',
            'flyout_border_left'                         => '0px',
            'flyout_border_right'                        => '0px',
            'flyout_border_top'                          => '0px',
            'flyout_border_bottom'                       => '0px',
            'flyout_link_padding_left'                  => '10px',
            'flyout_link_padding_right'                 => '10px',
            'flyout_link_padding_top'                   => '0px',
            'flyout_link_padding_bottom'                => '0px',
            'flyout_link_weight'                        => 'normal',
            'flyout_link_weight_hover'                  => 'normal',
            'flyout_link_height'                        => '35px',
            'flyout_background_from'                    => '#f1f1f1',
            'flyout_background_to'                      => '#f1f1f1',
            'flyout_background_hover_from'              => '#dddddd',
            'flyout_background_hover_to'                => '#dddddd',
            'font_size'                                 => '14px',
            'font_color'                                => '#666',
            'font_family'                               => 'inherit',
            'responsive_breakpoint'                     => $breakpoint.'px',
            'line_height'                               => '1.7',
            'z_index'                                   => '999',
            'custom_css'                                => '
#{$wrap} #{$menu} {
    /** Custom styles should be added below this line **/
}
#{$wrap} { 
    clear: both;
}'
        );
		
	$megamenu_themes = get_option('megamenu_themes');
	//var_dump($megamenu_themes);
	if( is_array($megamenu_themes) && isset($megamenu_themes["default"]['responsive_breakpoint']) ){
		if( $megamenu_themes["default"]['responsive_breakpoint'] != $breakpoint.'px' ){
			$megamenu_themes["default"]['responsive_breakpoint'] = $breakpoint.'px';
			update_option('megamenu_themes', $megamenu_themes);
			
			// Generate Cache CSS of MaxMegaMenu
			if( class_exists('Mega_Menu_Style_Manager') ){
				$Mega_Menu_Style_Manager = new Mega_Menu_Style_Manager;
				$Mega_Menu_Style_Manager->generate_css( 'scss_formatter_compressed' );
			}
		}
	} else {
		update_option('megamenu_themes', $themes);
		
		// Generate Cache CSS of MaxMegaMenu
		if( class_exists('Mega_Menu_Style_Manager') ){
			$Mega_Menu_Style_Manager = new Mega_Menu_Style_Manager;
			$Mega_Menu_Style_Manager->generate_css( 'scss_formatter_compressed' );
		}
	}
	
	
}



/*
 * Team Member search: redirect to archive-search.php
 */
/*function kwayy_template_chooser($template){
	global $wp_query;
	$post_type = get_query_var('post_type');
	if( $wp_query->is_search && $post_type == 'team_member' ){
		return locate_template('archive-team_member.php');
	}
	return $template;
}
add_filter('template_include', 'kwayy_template_chooser');*/



/*
 * Custom option in taxonomy
 */
//include_once('inc/taxonomy-metadata.php');






/*
 * Function to get count of total sidebar
 */
function thememount_get_widgets_count( $sidebar_id ){
	$sidebars_widgets = wp_get_sidebars_widgets();
	if( isset($sidebars_widgets[ $sidebar_id ]) ){
		return (int) count( (array) $sidebars_widgets[ $sidebar_id ] );
	}
}
function thememount_class_for_widgets_count( $count=0 ){
	$return = '';
	if( $count<1 ){ $count = 1; }
	if( $count>4 ){ $count = 4; }
	switch( $count ){
		case 1:
			$return = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;
		case 2:
			$return = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
			break;
		case 3:
			$return = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
			break;
		case 4:
			$return = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
			break;
	}
	return $return;
}






/*
 * Wrap DIV to the Read More link in blog
 */
function kwayy_wrap_readmore($more_link) {
    return '<div class="kwayy-post-readmore">'.$more_link.'</div>';
}
add_filter('the_content_more_link', 'kwayy_wrap_readmore', 10, 1);

/*
 * Shortcode list and their calls
 */

$apicona = get_option('apicona');
$themestyle = isset($apicona['themestyle']) ? esc_attr($apicona['themestyle']) : 'apicona';	

$shortcode_apicona_adv = array(
	'tm-servicebox',
	'tm-socialbox',
	'tm-list',
	'tm-schedulebox',
	'tm-footermenu',
	'tm-dropcap',
	'tm-logo',
);

if( $themestyle == 'apiconaadv' ){
	foreach( $shortcode_apicona_adv as $shortcode ){
		include_once(get_template_directory() . '/inc/shortcodes/advanced/'.$shortcode.'.php');
	}
}


$shortcodeList = array(
	'blogbox',
	'clients',
	'contactbox',
	'current-year',
	'facts_in_digits',
	'heading',
	'icon',
	'icontext',
	'kwayyiconseparator',
	'kwayy-social-links',
	'portfoliobox',
	'eventsbox',
	'servicebox',
	'site-tagline',
	'site-title',
	'site-url',
	'skincolor',
	'team',
	'testimonial',
	'twitterbox',
	'languageswitcher',
);



foreach( $shortcodeList as $shortcode ){

	$advanced = '';
	if( $themestyle == 'apiconaadv'){
		$advanced = 'advanced/';
	}
	
	include_once(get_template_directory() . '/inc/shortcodes/'.$advanced.''.$shortcode.'.php');	

}




/*
 * Disable dynamic style and echo all style in header
 */
add_action( 'init', 'kwayy_dynamic_style' );
function kwayy_dynamic_style(){
	$apicona = get_option('apicona');
	if( isset($apicona['dynamic-style-position']) && $apicona['dynamic-style-position']=='internal' ){
		add_action('wp_head','kwayy_hook_dynamic_css');
	}
}
function kwayy_hook_dynamic_css(){
	
	$themestyle = tm_get_theme_style();
	$adv 		= '';
	
	if( $themestyle == 'apiconaadv' ){
		$adv = '-adv';
	}
	
	/* Fetching dynamic-style.php output and store in a variable */
	ob_start(); // begin collecting output
	include get_template_directory().'/css/dynamic-style'.$adv.'.php';
	$css    = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	
	/* Now add the dynamic-style.php style in header */
	$output = "<style> $css </style>";
	echo $output;
}



/*
 *  Dynamic content linking with JS code. Declaring variables.
 */
add_action('wp_head','thememount_js_vars');
function thememount_js_vars(){
	global $apicona;
	$breakpoint = ( isset($apicona['menu_breakpoint']) && trim($apicona['menu_breakpoint'])!='' ) ? trim(esc_attr($apicona['menu_breakpoint'])) : '1200' ;
	
	if($apicona['menu_breakpoint'] == 'custom'){
		$breakpoint =  $apicona['menu_breakpoint_custom'];
	}
	?>
	
	<script type="text/javascript">
		var tm_breakpoint = <?php echo $breakpoint ?>;
	</script>
	
	<?php
}



/*
 * Add some special classes on <body> tag.
 */
if( !function_exists('kwayy_body_classes') ){
function kwayy_body_classes($bodyClass){
	
	global $apicona;
	
	//Responsive ON / OFF
	if($apicona['responsive']=='1'){
		$bodyClass[] = 'kwayy-responsive-on';
	} else {
		$bodyClass[] = 'kwayy-responsive-off';
	}

	// Sticky Fotoer ON/OFF
	if( isset($apicona['stickyfooter']) && $apicona['stickyfooter']=='1' ){
		$bodyClass[] = 'kwayy-sticky-footer';
	}

	// Boxed / Wide
	if( trim($apicona['layout'])!='' ){
		$bodyClass[] = 'kwayy-'.trim($apicona['layout']);
	} else {
		$bodyClass[] = 'kwayy-wide';
	}
	
	
	
	// Header Style
	$headerstyle	= '';
	$header_class	= '';
	if( isset($apicona['headerstyle']) && trim($apicona['headerstyle'])!='' ){
		$headerstyle = sanitize_html_class($apicona['headerstyle']);
	}
	
	
	switch($headerstyle){
		case '1':
		case '4':
		case '5':
		case '6':
			$overlay_class = ' kwayy-header-overlay';
			
			if ($headerstyle=='1'):
				$overlay_class = '';
			elseif ($headerstyle=='4'):
				$overlay_class = ' tm-header-invert';
			elseif ($headerstyle=='6'):
				$overlay_class .= ' tm-header-invert';
			endif;
				
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_kwayy_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				
				$hidetitlebar = get_post_meta( $post->ID, '_kwayy_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					if($headerstyle=='6'){
						$overlayClass = ' tm-header-invert';
					}
					else{
						$overlayClass = '';
					}
				}
			}
			$header_class = 'kwayy-header-style-1'.$overlay_class;
			break;
			
		case '2':
		case '7':
			$overlay_class = '';
			if( $headerstyle=='7' ){ $overlay_class.=' kwayy-header-overlay'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_kwayy_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				
				$hidetitlebar = get_post_meta( $post->ID, '_kwayy_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlay_class = '';
				}
			}
			$header_class = 'kwayy-header-style-2'.$overlay_class;
			break;
			
		case '3':
		case '8':
			$overlay_class = '';
			if( $headerstyle=='8' ){ $overlay_class.=' kwayy-header-overlay'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_kwayy_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				
				$hidetitlebar = get_post_meta( $post->ID, '_kwayy_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlay_class = '';
				}
			}
			$header_class = 'kwayy-header-style-3'.$overlay_class;
			break;
			
	}
	
	$bodyClass[] = $header_class;
	

	// Sidebar Class
	$sidebar = '';
	if( (is_page()) ){
		$sidebar = $apicona['sidebar_page']; // Global settings from Theme Options
		$sidebarposition = get_post_meta( get_the_ID(), '_kwayy_page_options_sidebarposition', true);
		if( is_array($sidebarposition) ){ $sidebarposition = $sidebarposition[0]; } // Converting to String if Array
		// Page settings
		if( trim($sidebarposition) != '' ){
			$sidebar = $sidebarposition;
		}
	}
	if( (is_home()) || is_single() ){
		$sidebar  = $apicona['sidebar_blog'];
		$pageid   = get_option('page_for_posts');
		$postType = 'page';
		if( is_single() ){
			global $post;
			$pageid   = $post->ID;
			$postType = 'post';
		}
		
		$sidebarposition = get_post_meta( $pageid, '_kwayy_'.$postType.'_options_sidebarposition', true);
		if( is_array($sidebarposition) ){ $sidebarposition = $sidebarposition[0]; } // Converting to String if Array
		// Page settings
		if( trim($sidebarposition) != '' ){
			$sidebar = $sidebarposition;
		}
	}
	
	// WooCommerce sidebar class
	if(function_exists('is_woocommerce') && is_woocommerce()){
		$sidebar = (isset($apicona['sidebar_woocommerce']) && trim($apicona['sidebar_woocommerce']) != '' ) ? esc_attr($apicona['sidebar_woocommerce']) : 'no';
	}
	// BBPress sidebar class
	if( function_exists('is_bbpress') && is_bbpress() ) {
		$sidebar = isset($apicona['sidebar_bbpress']) ? $apicona['sidebar_bbpress'] : 'right' ;
	}
	
	//Search Page sidebar
	if(is_search()){
		$sidebar = (isset($apicona['sidebar_search']) && trim($apicona['sidebar_search']) != '' ) ? esc_attr($apicona['sidebar_search']) : 'no';
	}

	// Archive page for Blog / Post
	if( is_category() ){
		$sidebar = $apicona['sidebar_blog'];
	}
	
	// Archive page for Blog / Post
	if( is_tag() ){
		$sidebar = $apicona['sidebar_blog'];
	}
	
	if( $sidebar=='no' ){
		// The page is full width
		$bodyClass[] = 'kwayy-page-full-width';
	} else {
		// Sidebar class for border
		$bodyClass[] = 'kwayy-sidebar-'.$sidebar;
	}
	
	// Theme version
	$my_theme		= wp_get_theme( 'apicona' );
	$theme_version	= $my_theme->get( 'Version' );
	if( $theme_version != '' ){
		$theme_version	= str_replace('.', '-', $theme_version);
		$theme_version	= 'apicona-v'.$theme_version;
		$bodyClass[]	= sanitize_html_class($theme_version);
	}

	return $bodyClass;
}
}



/*
 * Add some special classes on <body> tag.
 */
if( !function_exists('thememount_body_classes') ){
function thememount_body_classes($bodyClass){
	
	global $apicona;
	$apicona = get_option('apicona');
	
	// check if dark background set for container.
	if( isset($apicona['inner_background']['background-color']) && trim($apicona['inner_background']['background-color'])!='' && tm_check_dark_color(esc_attr($apicona['inner_background']['background-color'])) ){
		$bodyClass[] = 'tm-dark-layout';
		//wp_enqueue_style('apiconaadv-dark');
	}
	
	// show/hide separator line between links in dropdown menu
	if( isset($apicona['dropdown_menu_separator']) && trim($apicona['dropdown_menu_separator'])=='0' ){
		$bodyClass[] = 'tm-dropmenu-hide-sepline';
	}
	
	//Responsive ON / OFF
	if( isset($apicona['responsive']) && $apicona['responsive']=='1'){
		$bodyClass[] = 'thememount-responsive-on';
	} else {
		$bodyClass[] = 'thememount-responsive-off';
	}

	// Sticky Fotoer ON/OFF
	if( isset($apicona['stickyfooter']) && $apicona['stickyfooter']=='1' ){
		$bodyClass[] = 'thememount-sticky-footer';
	}
	
	// Single Portfolio
	if( is_singular('portfolio') ){
		$portfolioView        = esc_attr($apicona['portfolio_viewstyle']); // Global view
		$portfolioView_single = get_post_meta( get_the_ID(), '_thememount_portfolio_view_viewstyle', true); // Single portfolio view
		
		
		if( is_array($portfolioView_single) ){ $portfolioView_single = $portfolioView_single[0]; }
		if( !empty($portfolioView_single) && trim($portfolioView_single)!='global' ){
			$portfolioView = $portfolioView_single;
		}
		$bodyClass[] = sanitize_html_class('thememount-portfolio-view-'.esc_attr($portfolioView));
	}
	
	// Boxed / Wide
	if( isset($apicona['layout']) && trim($apicona['layout'])!='' ){
		if( $apicona['layout']=='boxed' || $apicona['layout']=='framed' || $apicona['layout']=='rounded' ){
			$bodyClass[] = 'thememount-boxed';
		}
		if( $apicona['layout']=='framed' || $apicona['layout']=='rounded' ){
			$bodyClass[] = 'thememount-boxed-'.sanitize_html_class($apicona['layout']);
		}
		
		$bodyClass[] = sanitize_html_class( 'thememount-'.trim($apicona['layout']));
		if( $apicona['layout']=='fullwide' ){
			if( isset($apicona['full_wide_elements']['content']) && $apicona['full_wide_elements']['content']=='1' ){
				$bodyClass[] = 'tm-layout-container-full';
			}
		}
		
	} else {
		$bodyClass[] = 'thememount-wide';
	}
	
	$thememount_retina_logo = 'off';
	if( isset($apicona['logoimg_retina']['url']) && $apicona['logoimg_retina']['url']!=''){
		$thememount_retina_logo = 'on';
	}

	
	// Header Style
	$headerstyle	= '';
	$hClass			= '';
	if( isset($apicona['headerstyle']) && trim($apicona['headerstyle'])!='' ){
		$headerstyle = sanitize_html_class($apicona['headerstyle']);
	}
	
	switch( $headerstyle ){
		case '1':
		case '2':
		case '3':
		case '9':
		case '14':
		case '15':
			$class = $headerstyle;
			if( $headerstyle=='14' ){ $class='1'; }
			if( $headerstyle=='9' || $headerstyle=='15' ){ $class='1 tm-header-invert'; }
			
			if( $headerstyle=='14' || $headerstyle=='15' ){ // logo area bg skin color
				$class .= ' tm-header-highlight-logo';
			}
			
			
			$hClass = 'thememount-header-style-'.trim($class);
			
			break;
			
		case '4':
		case '10':
			$overlayClass = ' tm-header-overlay';
			if( $headerstyle=='10' ){ $overlayClass.=' tm-header-invert'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_kwayy_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_kwayy_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					if($headerstyle=='10'){
						$overlayClass = ' tm-header-invert';
					}
					else{
						$overlayClass = '';
					}					
				}
			}
			$hClass = 'thememount-header-style-1' . $overlayClass;
			break;
		case '5':
			$overlayClass = ' tm-header-overlay';
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_kwayy_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_kwayy_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'thememount-header-style-2' . $overlayClass;
			break;
		case '6':
		case '13':
			$overlayClass = '';
			if( $headerstyle=='13' ){ $overlayClass.=' tm-header-overlay'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_kwayy_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_kwayy_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'thememount-header-style-6' . $overlayClass;
			break;
		case '7':
		case '8':
			$overlayClass = ' tm-header-overlay';
			if( $headerstyle=='8' ){ $overlayClass.=' tm-header-invert'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_kwayy_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_kwayy_page_options_hidetitlebar', true );
				
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					if($headerstyle=='8'){
						$overlayClass = ' tm-header-invert';
					}
					else{
						$overlayClass = '';
					}
				}
			}
			$hClass = 'thememount-header-style-4' . $overlayClass;
			break;
	}
	$bodyClass[] = $hClass;
	
	

	// Sidebar Class
	$sidebar = esc_attr($apicona['sidebar_blog']); // Global settings
	if( (is_page()) ){
		$sidebar = esc_attr($apicona['sidebar_page']); // Global settings
		$sidebarposition = get_post_meta( get_the_ID(), '_kwayy_page_options_sidebarposition', true);
		if( is_array($sidebarposition) ){ $sidebarposition = $sidebarposition[0]; } // Converting to String if Array
		// Page settings
		if( trim($sidebarposition) != '' ){
			$sidebar = $sidebarposition;
		}
	} else if( (is_home()) || is_single() ){
		
		$pageid   = get_option('page_for_posts');
		$postType = 'page';
		if( is_single() ){
			global $post;
			$pageid   = $post->ID;
			$postType = 'post';
		}
		
		$sidebarposition = get_post_meta( $pageid, '_kwayy_'.$postType.'_options_sidebarposition', true);
		if( is_array($sidebarposition) ){ $sidebarposition = $sidebarposition[0]; } // Converting to String if Array
		// Page settings
		if( trim($sidebarposition) != '' ){
			$sidebar = $sidebarposition;
		}
	}
	
	
	// WooCommerce sidebar class
	if( function_exists('is_woocommerce') && is_woocommerce() ) {
		$sidebar = isset($apicona['sidebar_woocommerce']) ? esc_attr($apicona['sidebar_woocommerce']) : 'right' ;
	}
	
	// BBPress sidebar class
	if( function_exists('is_bbpress') && is_bbpress() ) {
		$sidebar = isset($apicona['sidebar_bbpress']) ? esc_attr($apicona['sidebar_bbpress']) : 'right' ;
	}
	
	// Tribe Events (The Events Calendar plugin)
	if( function_exists('tribe_is_upcoming') ){
		if ( get_post_type() == 'tribe_events' || tribe_is_upcoming() || tribe_is_month() || tribe_is_by_date() || tribe_is_day() || is_single('tribe_events') ){
			$sidebar = ( isset($apicona['sidebar_events']) && trim($apicona['sidebar_events'])!='' ) ? esc_attr($apicona['sidebar_events']) : 'no' ; // Global settings
		}
	}
	
	
	// Search results page sidebar
	if( is_search() ){
		$sidebar = ( isset($apicona['sidebar_search']) && trim($apicona['sidebar_search'])!='' ) ? esc_attr($apicona['sidebar_search']) : 'no' ; // Global settings for search results page
	}
	
	
	
	if( $sidebar=='no' ){
		// The page is full width
		$bodyClass[] = 'thememount-page-full-width';
	} else {
		// Sidebar class for border
		$bodyClass[] = sanitize_html_class( 'thememount-sidebar-'.$sidebar );
	}
	
	// Check if "Max Mega Menu" plugin is active
	if( !function_exists('is_plugin_active') ){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	if ( is_plugin_active( 'megamenu/megamenu.php' ) ) {
		// plugin is activated
		$bodyClass[] = 'thememount-maxmegamenu-active';
	}
	
	// One Page website
	if( isset($apicona['one_page_site']) && $apicona['one_page_site']=='1' ){
		$bodyClass[] = 'thememount-one-page-site';
	}
	
	// Class tm-topbar-hidden if topbar is hidden. 
	$page_topbar = trim( get_post_meta( get_the_ID(), '_kwayy_page_options_show_topbar', true ) );
	$topbar 	 = ( isset($apicona['show_topbar']) && $apicona['show_topbar']=='hide' ) ? $apicona['show_topbar'] : '';

	if($topbar=='hide' || $page_topbar=='hide'){
		$bodyClass[] = 'tm-topbar-hidden';
	}

	// Theme version
	$my_theme		= wp_get_theme( 'apicona' );
	$theme_version	= $my_theme->get( 'Version' );
	if( $theme_version != '' ){
		$theme_version	= str_replace('.', '-', $theme_version);
		$theme_version	= 'apicona-v'.$theme_version;
		$bodyClass[]	= sanitize_html_class($theme_version);
	}
	return $bodyClass;
}
}



/*
 * Body class
 */
$themestyle = tm_get_theme_style();
if( $themestyle == 'apiconaadv' ){
	add_filter('body_class', 'thememount_body_classes');
}else if( $themestyle == 'apicona' ){
	add_filter('body_class', 'kwayy_body_classes');
}



function kwayy_getCSS( $value = array() ) {

	$css = '';

	if ( ! empty( $value ) && is_array( $value ) ) {
		foreach ( $value as $key => $value ) {
			if ( ! empty( $value ) && $key != "media" ) {
				if ( $key == "background-image" ) {
					$css .= $key . ":url('" . $value . "');";
				} else {
					$css .= $key . ":" . $value . ";";
				}
			}
		}
	}

	return $css;
}











/*
 * Login page stylesheet
 */
function kwayy_custom_login_css() {
	global $apicona;
	$bg_size = '';
	
	// Custom CSS Code for login page only
	$login_custom_css_code = '';
	if( isset($apicona['login_custom_css_code']) && trim($apicona['login_custom_css_code'])!='' ){
		$login_custom_css_code = $apicona['login_custom_css_code'];
	}
	
	// Login page background CSS style
	$bgStyle = kwayy_getCSS($apicona['login_background']);
	
	$cssCode  = '';
	$cssCode2 = '';
	
	if( !empty($bgStyle) ){
		$cssCode .= 'body.login{'.$bgStyle.'}';
	}
	
	
	
	
	
	if( isset($apicona['logoimg']["url"]) && trim($apicona['logoimg']["url"])!='' ){
		$cssCode2 .= 'background: transparent url("'.$apicona['logoimg']["url"].'") no-repeat center center;';
	}
	
	if( isset($apicona['logoimg']["width"]) && trim($apicona['logoimg']["width"])!='' ){
		if( $apicona['logoimg']["width"] > 320 ){
			$cssCode2 .= 'width: 320px;';
		} else {
			$cssCode2 .= 'width: '.$apicona['logoimg']["width"].'px;';
		}
	}
	
	if( isset($apicona['logoimg']["height"]) && trim($apicona['logoimg']["height"])!='' ){
		// 320px : max-width
		$width  = $apicona['logoimg']["width"];
		$height = $apicona['logoimg']["height"];
		if( $width > 320 ){
			$bg_size   = 'background-size: 100%;';
			$newheight = ceil( ($height / $width) * 320 );
		} else {
			$newheight = $height;
		}
		
		$cssCode2 .= 'height: '.$newheight.'px;';
	}
	
	// Submit button to skin color
	$otherCSS = '.wp-core-ui #login .button-primary{ background: '.$apicona['skincolor'].';}';
	
	
	echo '<style>
		.login #login form{background-color: #f7f7f7; box-shadow: none;}
		'.$cssCode.'
		.login #login h1 a{
			'.$cssCode2.'
			'.$bg_size.'
			/*max-width:100%;*/
		}
		'.$otherCSS.'
		'.$login_custom_css_code.'
		
		
		.wp-core-ui .button-primary{
			background: #1abc9c;
			height: 34px;	
			padding: 0 18px 2px;
			box-shadow: none;
			border: none;
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			-o-transition: all 0.2s ease-in-out;
			-ms-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
		}
		.wp-core-ui #login .button-primary.focus, .wp-core-ui .button-primary:focus{
			box-shadow: none;
			border: none;
		}
		.wp-core-ui #login .button-primary.focus, .wp-core-ui #login .button-primary.hover, .wp-core-ui #login .button-primary:focus, .wp-core-ui #login .button-primary:hover, .wp-core-ui #login .button-primary:hover{
			background: #333;
		}
		
		/* Remove text-shadow effect from login button */
		.wp-core-ui #login .button-primary{
			text-shadow: none;
		}
		
		</style>';
}
add_action('login_head', 'kwayy_custom_login_css');



















/*
 * Login page stylesheet
 */
/*function kwayy_custom_login_css() {
	global $apicona;
	
	// Custom CSS Code for login page only
	$login_custom_css_code = '';
	if( isset($apicona['login_custom_css_code']) && trim($apicona['login_custom_css_code'])!='' ){
		$login_custom_css_code = $apicona['login_custom_css_code'];
	}
	
	// Login page background CSS style
	$bgStyle = kwayy_getCSS($apicona['login_background']);
	
	$cssCode  = '';
	$cssCode2 = '';
	
	if( !empty($bgStyle) ){
		$cssCode .= 'body.login{'.$bgStyle.'}';
	}
	
	if( isset($apicona['logoimg']["url"]) && trim($apicona['logoimg']["url"])!='' ){
		$cssCode2 .= 'background-image: url("'.$apicona['logoimg']["url"].'");';
	}
	
	if( isset($apicona['logoimg']["width"]) && trim($apicona['logoimg']["width"])!='' ){
		$cssCode2 .= 'width: '.$apicona['logoimg']["width"].'px;';
	}
	
	if( isset($apicona['logoimg']["height"]) && trim($apicona['logoimg']["height"])!='' ){
		$cssCode2 .= 'height: '.$apicona['logoimg']["height"].'px;';
	}
	
	
	
	echo '<style>
		.login #login form{background-color: #f7f7f7; box-shadow: none;}
		'.$cssCode.'
		.login #login h1 a{
			'.$cssCode2.'
			background-size: 100%;
			max-width:100%;
		}
		'.$login_custom_css_code.'
		</style>';
}
add_action('login_head', 'kwayy_custom_login_css');
*/





/**
 * Login page logo link
 */
function tm_loginpage_custom_link() {
	return esc_url( home_url( '/' ) );
}
add_filter('login_headerurl','tm_loginpage_custom_link');


/**
 * Login page logo link title
 */
function tm_change_title_on_logo() {
	return esc_attr( get_bloginfo( 'name', 'display' ) );
}
add_filter('login_headertext', 'tm_change_title_on_logo');






/**
 * Apicona setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Apicona supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Apicona 1.0
 *
 * @return void
 */
function apicona_setup() {
	/*
	 * Makes Apicona available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Apicona, use a find and
	 * replace to change 'apicona' to the name of your theme in all
	 * template files.
	 */
	$parentPath = dirname( get_template_directory() ).'/apicona-languages';
	if (file_exists($parentPath)) {
		load_theme_textdomain( 'apicona', $parentPath );
	} else {
		load_theme_textdomain( 'apicona', get_template_directory() . '/languages' );
	}
	

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// Adding WooCommerce Support
	add_theme_support( 'woocommerce' );
	
	// WooCommerce image lightbox effect
	add_theme_support( 'wc-product-gallery-lightbox' );
	
	
	// Since Version 4.1, themes should use add_theme_support() in the functions.php file in order to support title tag
	add_theme_support( 'title-tag' );
	
	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'apicona' ) );
	register_nav_menu( 'footer' , __( 'Footer Menu', 'apicona' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 727, 409, true );
	
	// Adding Image sizes
	/*add_image_size( 'portfolio-two-column',   1110, 624, true );
	add_image_size( 'portfolio-three-column', 720, 406, true );
	add_image_size( 'portfolio-four-column',  526, 296, true );
	add_image_size( 'woocommerce-catalog',    520, 520, true );
	add_image_size( 'woocommerce-single',     800, 800, true );
	add_image_size( 'woocommerce-thumbnail',  120, 120, true );*/
	
	
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	// Run Shortcode in Widget Title
	add_filter('widget_title', 'do_shortcode');
	
	// Run Shortcode in text widget
	add_filter('widget_text', 'do_shortcode');
	
	
	// CF Post Format
	// include_once('inc/plugins/cf-post-formats/cf-post-formats.php');
	
	
	// Widgets
	$themestyle = tm_get_theme_style();
	include_once(get_template_directory() . '/inc/widgets/kwayyWidgetRecentPosts.php');
	include_once(get_template_directory() . '/inc/widgets/kwayyWidgetFlickr.php');
	include_once(get_template_directory() . '/inc/widgets/kwayyWidgetContact.php');
	
	if( $themestyle == 'apiconaadv' ){		
		include_once(get_template_directory() . '/inc/widgets/kwayyWidgetTeamSearch.php');
	}	
	//include_once('inc/widgets/kwayyWidgetTabs.php');

}
add_action( 'after_setup_theme', 'apicona_setup' );






/*
 *  Check if MIN css or not
 */
function thememount_min_css(){
	global $apicona;
	
	// Checking if MIN enabled
	if(!is_admin()) {
		if( isset($apicona['minify-css-js']) && $apicona['minify-css-js']=='0' ){
			define('TM_MIN', '');
		} else {
			define('TM_MIN', '.min');
		}
	}
}
add_action( 'init', 'thememount_min_css' );



/*
 *  Adding Image sizes
 */
function thememount_imag_sizes(){
	
	global $apicona;
	
	$img_array = array(
		'portfolio-two-column',
		'portfolio-three-column',
		'portfolio-four-column',
		'blog-two-column',
		'blog-three-column',
		'blog-four-column',
		/*'woocommerce-catalog',
		'woocommerce-single',
		'woocommerce-thumbnail'*/
	);
	foreach($img_array as $imgsize){
		$size = array( 'width' => 1110, 'height' => 624, 'crop' => true );
		
		if( $imgsize == 'portfolio-two-column' || $imgsize == 'blog-two-column' ){ // Portfolio - Two Column
			$size = array( 'width' => 1110, 'height' => 624, 'crop' => true );
		
		} else if( $imgsize == 'portfolio-three-column' || $imgsize == 'blog-three-column' ){ // Portfolio - Three Column
			$size = array( 'width' => 720, 'height' => 406, 'crop' => true );
			
		} else if( $imgsize == 'portfolio-four-column' || $imgsize == 'blog-four-column' ){ // Portfolio - Four Column
			$size = array( 'width' => 750, 'height' => 422, 'crop' => true );
		
		/*} else if( $imgsize == 'woocommerce-catalog' ){  // WooCommerce - Catalog
			$size = array( 'width' => 520, 'height' => 520, 'crop' => true );
			
		} else if( $imgsize == 'woocommerce-single' ){ // WooCommerce - Single
			$size = array( 'width' => 800, 'height' => 800, 'crop' => true );
			
		} else if( $imgsize == 'woocommerce-thumbnail' ){ // WooCommerce - Thumb
			$size = array( 'width' => 120, 'height' => 120, 'crop' => true );*/
		
		}
		
		// Getting redux value
		if( isset($apicona['img-'.$imgsize]) && is_array($apicona['img-'.$imgsize]) ){
			$size = $apicona['img-'.$imgsize];
		}
		
		// Convrting to Boolean
		if( $size['crop']=='no' ){
			$size['crop'] = false;
		} else {
			$size['crop'] = true;
		}
		
		add_image_size( $imgsize,   $size['width'], $size['height'], $size['crop'] );
		
	}
	
	/*add_image_size( 'portfolio-two-column',   1110, 624, true );
	add_image_size( 'portfolio-three-column', 720, 406, true );
	add_image_size( 'portfolio-four-column',  750, 422, true );
	add_image_size( 'woocommerce-catalog',    520, 520, true );
	add_image_size( 'woocommerce-single',     800, 800, true );
	add_image_size( 'woocommerce-thumbnail',  120, 120, true );*/
	
}
add_action( 'init', 'thememount_imag_sizes' );







// Visual Composer Theme integration
global $apicona;
$apicona = get_option('apicona');

if( isset($apicona['enable_adv_vc_options']) && $apicona['enable_adv_vc_options']=='1' ){
	// Do nothing
} else {
	if( function_exists('vc_set_as_theme') ){ vc_set_as_theme(true); }
	if( function_exists('vc_manager') ){ vc_manager()->disableUpdater(true); }
	if( function_exists('vc_set_default_editor_post_types') ){ vc_set_default_editor_post_types(array('page', 'portfolio', 'team_member')); }
}


// Slider Revoluiton Theme integration

add_action( 'init', 'kwayy_set_rs_as_theme' );
function kwayy_set_rs_as_theme() {
	// Setting options to hide Revoluiton Slider message
	if(get_option('revSliderAsTheme') != 'true'){
		update_option('revSliderAsTheme', 'true');
	}
	if(get_option('revslider-valid-notice') != 'false'){
		update_option('revslider-valid-notice', 'false');
	}
	if( function_exists('set_revslider_as_theme') ){	
		set_revslider_as_theme();
	}
}





/******************* Order Testimonials by date *******************/
/* Sort posts in wp_list_table by column in ascending or descending order. */
function kwayy_custom_post_order($query){
	/* 
	Set post types.
	_builtin => true returns WordPress default post types. 
	_builtin => false returns custom registered post types. 
	*/
	$post_types = get_post_types(array('_builtin' => false), 'names');
	
	/* The current post type. */
	$post_type = $query->get('testimonial');
	
	/* Check post types. */
	if(in_array($post_type, $post_types)){
		/* Post Column: e.g. title */
		if($query->get('orderby') == ''){
			$query->set('orderby', 'date');
		}
		/* Post Order: ASC / DESC */
		if($query->get('order') == ''){
			$query->set('order', 'DESC');
		}
	}
}
if(is_admin()){
	add_action('pre_get_posts', 'kwayy_custom_post_order');
}
/******************************************************/




/*
 *  Scripts and styles
 */
 
$themestyle = tm_get_theme_style();

if($themestyle == 'apiconaadv'){
	include(get_template_directory().'/inc/scripts-styles-adv.php');	
}else if($themestyle == 'apicona'){
	include(get_template_directory().'/inc/scripts-styles.php');
}



/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Apicona 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function apicona_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'apicona' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'apicona_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since Apicona 1.0
 *
 * @return void
 */
function apicona_widgets_init() {
	
	$apicona 	= get_option('apicona');
	$themestyle = tm_get_theme_style();
	
	register_sidebar( array(
		'name' => __( 'Left Sidebar for Blog', 'apicona' ),
		'id' => 'sidebar-left-blog',
		'description' => __( 'This is left sidebar for blog section', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Right Sidebar for Blog', 'apicona' ),
		'id' => 'sidebar-right-blog',
		'description' => __( 'This is right sidebar for blog section', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Left Sidebar for Pages', 'apicona' ),
		'id' => 'sidebar-left-page',
		'description' => __( 'This is left sidebar for pages', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Right Sidebar for Pages', 'apicona' ),
		'id' => 'sidebar-right-page',
		'description' => __( 'This is right sidebar for pages', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Left Sidebar for Search', 'apicona' ),
		'id' => 'sidebar-left-search',
		'description' => __( 'This is left sidebar for search', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Right Sidebar for search', 'apicona' ),
		'id' => 'sidebar-right-search',
		'description' => __( 'This is right sidebar for search', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Floating bar widgets
	if( $themestyle == 'apiconaadv' ){
	
		$class = thememount_class_for_widgets_count( thememount_get_widgets_count( 'floating-header-widgets' ) );
		register_sidebar( array(
			'name'          => __( 'Floating Header Widgets', 'apicona' ),
			'id'            => 'floating-header-widgets',
			'description'   => __( 'Set widgets for Floating Header area.', 'apicona' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s '.$class.'">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	// WooCommerce
	register_sidebar( array(
		'name' => __( 'WooCommerce Shop', 'apicona' ),
		'id' => 'sidebar-woocommerce',
		'description' => __( 'This is sidebar for WooCommerce shop pages.', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// BBPress
	register_sidebar( array(
		'name'          => __( 'BBPress Sidebar', 'apicona' ),
		'id'            => 'sidebar-bbpress',
		'description'   => __( 'This is sidebar for BBPress.', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	if( $themestyle == 'apiconaadv' ){
		
		// The Events Calendar
		register_sidebar( array(
			'name'          => __( 'Events Sidebar', 'apicona' ),
			'id'            => 'sidebar-events',
			'description'   => __( 'This is sidebar for "The Events Calendar" plugin only.', 'apicona' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		$pf_cat_title  = ( isset($apicona['pf_cat_title']) && trim($apicona['pf_cat_title'])!='' ) ? __($apicona['pf_cat_title'], 'apicona') : __('Portfolio Category','apicona');
		// Portfolio category widgets
		register_sidebar( array(
			'name'          => sprintf( __( 'Widgets for %s', 'apicona' ), $pf_cat_title),
			'id'            => 'pf-cat-sidebar',
			'description'   => sprintf( __( 'This is sidebar for "%s" (portfolio category) sidebar.', 'apicona' ), $pf_cat_title),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		
		$team_group_title  = ( isset($apicona['team_group_title']) && trim($apicona['team_group_title'])!='' ) ? __($apicona['team_group_title'], 'apicona') : __('Team Group','apicona');
		// Portfolio category widgets
		register_sidebar( array(
			'name'          => sprintf( __( 'Widgets for %s', 'apicona' ), $team_group_title),
			'id'            => 'team-group-sidebar',
			'description'   => sprintf( __( 'This is sidebar for "%s" (Team group) sidebar.', 'apicona' ), $team_group_title),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		//First Row Footer Widget Areas
		register_sidebar( array(
			'name' => __( 'Footer 1st Row - First Column Area', 'apicona' ),
			'id' => 'first-top-footer-widget-area',
			'description' => __( 'This is First Widget area for First Row', 'apicona' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Footer 1st Row - Second Column Area', 'apicona' ),
			'id' => 'second-top-footer-widget-area',
			'description' => __( 'This is Second Widget area for First Row', 'apicona' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Footer 1st Row - Third Column Area', 'apicona' ),
			'id' => 'third-top-footer-widget-area',
			'description' => __( 'This is Third Widget area for First Row', 'apicona' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => __( 'Footer 1st Row - Fourth Column Area', 'apicona' ),
			'id' => 'fourth-top-footer-widget-area',
			'description' => __( 'This is Fourth Widget area for First Row', 'apicona' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
	}
	
	$footer_widget_names = array(
		'first' => array(
			'0' => __( 'First Footer Widget Area', 'apicona' ),
			'1' => __( 'Footer 2nd Row - First Column Area', 'apicona' ),
		),
		'second' => array(
			'0' => __( 'Second Footer Widget Area', 'apicona' ),
			'1' => __( 'Footer 2nd Row - Second Column Area', 'apicona' ),
		),
		'third' => array(
			'0' => __( 'Third Footer Widget Area', 'apicona' ),
			'1' => __( 'Footer 2nd Row - Third Column Area', 'apicona' ),
		),
		'fourth' => array(
			'0' => __( 'Fourth Footer Widget Area', 'apicona' ),
			'1' => __( 'Footer 2nd Row - Fourth Column Area', 'apicona' ),
		),
	);
	
	$name = '0';
	if( $themestyle = 'apiconaadv' ){
		$name = '1';
	}

	
	register_sidebar( array(
		'name' => $footer_widget_names['first'][$name],
		'id' => 'first-footer-widget-area',
		'description' => __( 'This is first footer widget area.', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => $footer_widget_names['second'][$name],
		'id' => 'second-footer-widget-area',
		'description' => __( 'This is second footer widget area.', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => $footer_widget_names['third'][$name],
		'id' => 'third-footer-widget-area',
		'description' => __( 'This is third footer widget area.', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => $footer_widget_names['fourth'][$name],
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'This is fourth footer widget area.', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Floating bar widgets
	$class = thememount_class_for_widgets_count( thememount_get_widgets_count( 'floating-header-widgets' ) );
	register_sidebar( array(
		'name'          => __( 'Floating Header Widgets', 'apicona' ),
		'id'            => 'floating-header-widgets',
		'description'   => __( 'Set widgets for Floating Header area.', 'apicona' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s '.$class.'">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	
	// Dynamic Sidebars (Unlimited Sidebars)
	global $apicona;
	if( isset($apicona['sidebars']) && is_array($apicona['sidebars']) && count($apicona['sidebars'])>0 ){
		foreach( $apicona['sidebars'] as $custom_sidebar ){
			if( trim($custom_sidebar)!='' ){
				$custom_sidebar_key = str_replace('-','_',sanitize_title($custom_sidebar));
				register_sidebar( array(
					'name'          => $custom_sidebar,
					'id'            => $custom_sidebar_key,
					'description'   => __( 'This is custom widget developed from "Appearance > Theme Options".', 'apicona' ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				) );
			}
		}
	}
	
}
add_action( 'widgets_init', 'apicona_widgets_init' );



/*
 * Display pagination to set of posts when applicable.
 */
if ( ! function_exists( 'apicona_paging_nav' ) ) :
	function apicona_paging_nav($return = false, $wp_query_data=false) {
		if( $wp_query_data==false ){
			global $wp_query;
		} else {
			$wp_query = $wp_query_data;
		}
		
		$result = '';
		$big = 999999999; // need an unlikely integer
		$result .= '<div class="kwayy-pagination">';
		$result .= paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var('paged') ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => __(' <i class="kwicon-fa-angle-left"></i> '),
			'next_text' => __(' <i class="kwicon-fa-angle-right"></i> '),
		) );
		$result .= '</div>';
		
		if( $return==true ){
			return $result;
		} else {
			echo $result;
		}
	}
endif;


/*
 * Display pagination to set of posts when applicable.
 */
if ( ! function_exists( 'tm_apiconaadv_paging_nav' ) ) :
	function tm_apiconaadv_paging_nav($return = false, $wp_query_data=false) {
		if( $wp_query_data==false ){
			global $wp_query;
		} else {
			$wp_query = $wp_query_data;
		}
		
		$result = '';
		
		$big = 999999999; // need an unlikely integer
		
		// Array to check if pagination data exists
		$paginateLinks = paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var('paged') ),
			'total'     => $wp_query->max_num_pages,
			'type'      => 'array',
			'prev_text' => __(' <i class="fa fa-angle-double-left"></i> '),
			'next_text' => __(' <i class="fa fa-angle-double-right"></i> '),
		) );
		
		
		if( $paginateLinks!=NULL ){
			$big = 999999999; // need an unlikely integer
			$result .= '<div class="thememount-pagination">';
			$result .= paginate_links( array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var('paged') ),
				'total'     => $wp_query->max_num_pages,
				'prev_text' => __(' <i class="fa fa-angle-double-left"></i> '),
				'next_text' => __(' <i class="fa fa-angle-double-right"></i> '),
			) );
			$result .= '</div>';
		}
		
		if( $return==true ){
			return $result;
		} else {
			echo $result;
		}
	}
endif;

/**  End of tm_apiconaadv_paging_nav()  **/



if ( ! function_exists( 'apicona_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Apicona 1.0
*
* @return void
*/
function apicona_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php previous_post_link( '%link', '<span class="meta-nav"></span>' . esc_attr__( 'Previous', 'apicona' ) ); ?>
			<?php next_post_link( '%link', esc_attr__( 'Next', 'apicona' ) . '<span class="meta-nav"></span>' ); ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'tm_apiconaadv_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Apicona 1.0
*
* @return void
*/
function tm_apiconaadv_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation">
		<div class="nav-links">
			<?php previous_post_link( '%link', '<span class="meta-nav"></span>' . esc_attr__( 'Previous', 'apicona' ) ); ?>
			<?php next_post_link( '%link', esc_attr__( 'Next', 'apicona' ) . '<span class="meta-nav"></span>' ); ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'kwayy_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink and author.
 *
 * Create your own kwayy_entry_meta() to override in a child theme.
 *
 * @since Apicona 1.0
 *
 * @return void
 */
function kwayy_entry_meta($echo = true) {
	$return = '';
	
	global $post;
	
	if( isset($post->post_type) && $post->post_type=='page' ){
		return;
	}
	
	
	$postFormat = get_post_format();
	
	// Post author
	$categories_list = get_the_category_list( __( ', ', 'apicona' ) ); // Translators: used between list items, there is a space after the comma.
	$tag_list        = get_the_tag_list( '', __( ', ', 'apicona' ) ); // Translators: used between list items, there is a space after the comma.
	$num_comments    = get_comments_number();
	
	$return .= '<div class="kwayy-meta-details">';
		if ( 'post' == get_post_type() ) {
			if( !is_single() ){
				$return .= sprintf( '<div class="kwayy-post-user"><span class="author vcard"><i class="kwicon-fa-user"></i> <a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></div>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'apicona' ), get_the_author() ) ),
					get_the_author()
				);
			}
		}
		if ( $tag_list ) { $return .= '<span class="tags-links"><i class="kwicon-fa-tags"></i> ' . $tag_list . '</span>'; };
		if ( $categories_list ) { $return .= '<span class="categories-links"><i class="kwicon-fa-folder-open"></i> ' . $categories_list . '</span>'; };
		if( !is_sticky() && comments_open() && ($num_comments>0) ){
			$return .= '<span class="comments"><i class="kwicon-fa-comments"></i> ';
			$return .= $num_comments;
			$return .= '</span>';
		}
	$return .= '</div>';
	
	if( $echo == true ){
		echo $return;
	} else {
		return $return;
	}
	
	
}
endif;


if ( ! function_exists( 'kwayy_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own kwayy_entry_date() to override in a child theme.
 *
 * @since Apicona 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function kwayy_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) ){
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'apicona' );
	} else {
		$format_prefix = '%2$s';
	}
	
	
	$date = '<div class="kwayy-post-date-wrapper">';
		$date .= sprintf( '<div class="kwayy-entry-date-wrapper"><span class="kwayy-entry-date"><time class="entry-date" datetime="%1$s" >%2$s<span class="entry-month entry-year">%3$s<span class="entry-year">%4$s</span></span></time></span><div class="kwayy-entry-icon">%5$s</div></div>',
			get_the_date( 'c' ),
			get_the_date( 'j' ),
			get_the_date( 'M' ),
			get_the_date( ', Y' ),
			kwayy_entry_icon()
		);
	$date .= '</div>';
	
	if ( $echo ){
		echo $date;
	} else {
		return $date;
	}
}
endif;





if ( ! function_exists( 'kwayy_entry_box_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own kwayy_entry_box_date() to override in a child theme.
 *
 * @since Apicona 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function kwayy_entry_box_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) ){
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'apicona' );
	} else {
		$format_prefix = '%2$s';
	}
	
	
	$date = '<div class="kwayy-post-box-date-wrapper">';
		$date .= sprintf( '<div class="kwayy-entry-date-wrapper">
								<span class="kwayy-entry-date">
									<time class="entry-date" datetime="%1$s" >
										<span class="entry-date">%2$s</span> 
										<span class="entry-month">%3$s</span> 
										<span class="entry-year">%4$s</span> 
									</time>
								</span>
							</div>',
			get_the_date( 'c' ),
			get_the_date( 'j' ),
			get_the_date( 'M' ),
			get_the_date( ', Y' )
		);
	$date .= '</div>';
	
	if ( $echo ){
		echo $date;
	} else {
		return $date;
	}
}
endif;









if ( ! function_exists( 'kwayy_entry_icon' ) ) :
/**
 * Print HTML with icon for current post.
 *
 * Create your own kwayy_entry_icon() to override in a child theme.
 *
 * @since Apicona 1.0
 *
 */
function kwayy_entry_icon( $echo = false ) {
	$postFormat = get_post_format();
	if( is_sticky() ){ $postFormat = 'sticky'; }
	$icon = 'pencil';
	switch($postFormat){
		case 'sticky':
			$icon = 'thumb-tack';
			break;
		case 'aside':
			$icon = 'thumb-tack';
			break;
		case 'audio':
			$icon = 'music';
			break;
		case 'chat':
			$icon = 'comments';
			break;
		case 'gallery':
			$icon = 'files-o';
			break;
		case 'image':
			$icon = 'photo';
			break;
		case 'link':
			$icon = 'link';
			break;
		case 'quote':
			$icon = 'quote-left';
			break;
		case 'status':
			$icon = 'envelope-o';
			break;
		case 'video':
			$icon = 'film';
			break;
	}
	
	$iconCode = '<div class="kwayy-post-icon-wrapper">';
		$iconCode .= '<i class="kwicon-fa-'.$icon.'"></i>';
	$iconCode .= '</div>';
	
	
	
	
	
	if ( $echo ){
		echo $iconCode;
	} else {
		return $iconCode;
	}
}
endif;




/**
 * Adding DIV to show loading effect after clicking on any link.
 * @since Apicona 1.7
 * @return void
 */
/*function kwayy_footer_code() {
    echo '<div class="pageoverlay-static"></div>';
}
add_action('wp_footer', 'kwayy_footer_code', 30);*/





if ( ! function_exists( 'apicona_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Apicona 1.0
 *
 * @return void
 */
function apicona_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Apicona 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'apicona_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Apicona 1.0
 *
 * @return string The Link format URL.
 */
function apicona_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'apicona_body_class' ) ) :
/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Apicona 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function apicona_body_class( $classes ) {
	global $apicona;
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';
	
	if($apicona['responsive']=='1'){
		$classes[] = 'kwayy-responsive-on';
	} else {
		$classes[] = 'kwayy-responsive-off';
	}
	
	return $classes;
}
endif;
add_filter( 'body_class', 'apicona_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since Apicona 1.0
 *
 * @return void
 */
function apicona_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'apicona_content_width' );








/*************** Icon List *****************/
require_once( get_template_directory() . '/inc/icons-list.php' );


/*************** Cuztom Framework: Custom Post Type, Texonomy etc. *****************/
require_once( get_template_directory() . '/inc/cuztom-helper-framework/cuztom.php' );

$themestyle = tm_get_theme_style();
$adv = '';

if( $themestyle == 'apiconaadv' ){
	$adv = '-adv';
}

require_once( get_template_directory() . '/inc/posttype-page'.$adv.'.php' );
require_once( get_template_directory() . '/inc/posttype-post'.$adv.'.php' );
require_once( get_template_directory() . '/inc/posttype-portfolio'.$adv.'.php' );
require_once( get_template_directory() . '/inc/posttype-team'.$adv.'.php' );
require_once( get_template_directory() . '/inc/posttype-testimonial'.$adv.'.php' );
require_once( get_template_directory() . '/inc/posttype-client'.$adv.'.php' );
require_once( get_template_directory() . '/inc/posttype-slides'.$adv.'.php' );

/*************** Extra addons in Visual Composer *****************/


function kwayy_visual_composer(){
	require_once( get_template_directory() . '/inc/visual-composer.php' );
}

function apicona_advanced_visual_composer(){
	require_once( get_template_directory() . '/inc/visual-composer-adv.php' );
}

function tm_add_cta_button_skin_color() {
	
	// CTA - color
	$param  = WPBMap::getParam( 'vc_cta', 'color' );
	$colors = $param['value'];
	if( is_array($colors) ){
		$colors = array_reverse($colors);
		$colors[__( 'Skin color', 'apicona' )] = 'skincolor';
		$param['value'] = array_reverse($colors);
		$param['std']   = 'classic';
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
	

}
if( function_exists('vc_map') && class_exists('WPBMap') ){
	
	$themestyle	= tm_get_theme_style();
	
	if( $themestyle == 'apicona' ){
		add_action('init', 'kwayy_visual_composer');		
	}else if ( $themestyle == 'apiconaadv' ){
		// apicona_advanced_visual_composer();		
		require_once( get_template_directory() . '/inc/visual-composer-adv.php' );
		//add_action('vc_before_init', 'apicona_advanced_visual_composer');	
	}
	add_action( 'vc_after_init', 'tm_add_cta_button_skin_color' ); // adding skin color in CTA and Button
}

/*************** Redux Framework: Theme Options *****************/
if ( !class_exists( 'ReduxFramework' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/redux-framework/ReduxCore/framework.php' );
	//require_once( dirname( __FILE__ ) . '/inc/extension-boilerplate-master/custom_field/extension_custom_field.php' );
}

/* Add custom field */
add_action('admin_init', 'tm_redux');
function tm_redux(){
	add_filter( "redux/apicona/field/class/kwayy_skin_color", "kwayy_redux_skin_color" ); // Adds the local field
	add_filter( "redux/apicona/field/class/kwayy_one_click_demo_content", "kwayy_redux_one_click_demo_content" ); // Adds the local field
	add_filter( "redux/apicona/field/class/kwayy_icon_select", "kwayy_redux_icon_select" ); // Adds the local field
	add_filter( "redux/apicona/field/class/kwayy_min_generator", "kwayy_min_generator" ); // Adds the local field
	add_filter( "redux/apicona/field/class/kwayy_dimensions", "kwayy_dimensions" ); // Adds the local field
	add_filter( "redux/apicona/field/class/kwayy_resetlike", "kwayy_resetlike" ); // Adds the local field
	add_filter( "redux/apicona/field/class/kwayy_switch_theme_style", "kwayy_switch_theme_style" );
}
function kwayy_redux_skin_color($field) {
	return get_template_directory().'/inc/redux-framework/redux_custom_fields/kwayy_skin_color/field_kwayy_skin_color.php';
}
function kwayy_redux_one_click_demo_content($field) {
	return get_template_directory().'/inc/redux-framework/redux_custom_fields/kwayy_one_click_demo_content/field_kwayy_one_click_demo_content.php';
}
function kwayy_redux_icon_select($field) {
	return get_template_directory().'/inc/redux-framework/redux_custom_fields/kwayy_icon_select/field_kwayy_icon_select.php';
}
function kwayy_min_generator($field) {
	return get_template_directory().'/inc/redux-framework/redux_custom_fields/kwayy_min_generator/field_kwayy_min_generator.php';
}
function kwayy_dimensions($field) {
	return get_template_directory().'/inc/redux-framework/redux_custom_fields/kwayy_dimensions/field_kwayy_dimensions.php';
}
function kwayy_resetlike($field) {
	return get_template_directory().'/inc/redux-framework/redux_custom_fields/kwayy_resetlike/field_kwayy_resetlike.php';
}
function kwayy_switch_theme_style($field) {
	return get_template_directory().'/inc/redux-framework/redux_custom_fields/kwayy_switch_theme_style/field_kwayy_switch_theme_style.php';
}


/**
 *  Loading Theme Options array list on INIT so the language translation will work
 */
add_action('init', 'tm_redux_options', 9);
function tm_redux_options(){
	
	$themestyle = tm_get_theme_style();
	
	if( $themestyle == 'apiconaadv' ){
		require_once( get_template_directory() . '/inc/redux-options-adv.php' );		
	}else if( $themestyle == 'apicona' ) {
		require_once( get_template_directory() . '/inc/redux-options.php' );		
	}

}


/***************************** END Redux Framework **********************************/


add_filter( 'admin_body_class', 'admin_interface_version_body_class' );
function admin_interface_version_body_class( $classes ) {
	// check wp_version
	if ( version_compare( $GLOBALS['wp_version'], '3.8-alpha', '>' ) ) {
		// check admin_color
		//var_dump(get_user_option( 'admin_color' )); die;
		if ( get_user_option( 'admin_color' ) === 'light' ) {
			$classes .= 'light-admin-ui'; // custom new admin interface
		} else {
			$classes .= 'dark-admin-ui'; // new admin interface
		}
	} else {
		$classes .= 'light-admin-ui'; // old admin interface
	}
	$classes .= ' admin-color-fresh'; // new admin interface
	return $classes;
}








/********************** Custom Menus Icon ***********************/
//require_once( dirname( __FILE__ ) . '/inc/custom-menus-icon/custom-menus-icon.php');



/** Post Like ajax **/
add_action('wp_ajax_kwayy-portfolio-likes', 'kwayy_ajax_callback' );
add_action('wp_ajax_nopriv_kwayy-portfolio-likes', 'kwayy_ajax_callback' );

function kwayy_ajax_callback(){
	if(isset($_POST['likes_id'])){
		$post_id = str_replace('pid-', '', $_POST['likes_id']);
		echo kwayy_update_like( $post_id );
	}/*else{
		$post_id = str_replace('stag-likes-', '', $_POST['post_id']);
		echo $this->like_this($post_id, 'get');
	}*/
	exit;
}


function kwayy_update_like( $post_id ){
	if(!is_numeric($post_id)) return;

	$return = '';
	$likes = get_post_meta($post_id, 'kwayy_likes', true);
	if(!$likes){ $likes = 0; }
	$likes++;
	update_post_meta($post_id, 'kwayy_likes', $likes);
	setcookie('kwayy_likes_'.$post_id, $post_id, time()*20, '/');
	return '<i class="kwicon-fa-heart"></i> '.$likes.'</i>';
}




/**
 *  Post Like ajax
 */
add_action('wp_ajax_thememount-portfolio-likes', 'thememount_ajax_callback' );
add_action('wp_ajax_nopriv_thememount-portfolio-likes', 'thememount_ajax_callback' );

function thememount_ajax_callback(){
	if(isset($_POST['likes_id'])){
		$post_id = str_replace('pid-', '', $_POST['likes_id']);
		echo thememount_update_like( $post_id );
	}
	exit;
}

function thememount_update_like( $post_id ){
	if(!is_numeric($post_id)) return;

	$return = '';
	$likes = get_post_meta($post_id, 'kwayy_likes', true);
	if(!$likes){ $likes = 0; }
	$likes++;
	update_post_meta($post_id, 'kwayy_likes', $likes);
	setcookie('thememount_likes_'.$post_id, $post_id, time()*20, '/');
	return '<i class="fa fa-heart"></i> '.$likes.'</i>';
}




/*** Theme Customizer: Write inline style for live customizer ****/

function kwayy_customizer_script(){
	global $wp_customize;
	if ( isset( $wp_customize ) ) {
		global $apicona;
		?>
		<style type="text/css">
		header .kwayy-topbar{
			background-color: <?php echo $apicona['topbarbgcolor']; ?>;
		}
		header .headerblock .header-inner, #stickable-header-sticky-wrapper{
			background-color: <?php echo $apicona['headerbgcolor']; ?>;
		}
		footer.site-footer > div.footer{
			background-color: <?php echo $apicona['footerwidget_bgcolor']; ?>;
		}
		footer.site-footer > div.site-info{
			background-color: <?php echo $apicona['footertext_bgcolor']; ?>;
		}
		</style>
		
		<?php
	}
}
add_action('wp_head','kwayy_customizer_script');




/*********** Required Plugins *************/
// Plugin auto-installer
require_once(get_template_directory() . '/inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'apicona_register_required_plugins' );

// Install Plugins when activate theme
function apicona_register_required_plugins(){
	
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     				=> 'Slider Revolution', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/revslider.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '6.3.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'WPBakery Visual Composer', // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '6.5.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'CF Post Formats', // The plugin name
			'slug'     				=> 'cf-post-formats', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/cf-post-formats.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Envato Market', // The plugin name
			'slug'     				=> 'envato-market', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/inc/plugins/envato-market.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name' => 'Breadcrumb NavXT',
			'slug' => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
			'required' => true,
		),
		array(
			'name' => 'Max Mega Menu',
			'slug' => 'megamenu',
			'required' => false,
		),
	);

	// Change this to your theme text domain, used for internationalising strings
	//$theme_text_domain = 'apicona';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'apicona',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		//'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		//'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'apicona' ),
			'menu_title'                       			=> __( 'Install Plugins', 'apicona' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'apicona' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'apicona' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'apicona' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'apicona' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'apicona' ), // %1$s = dashboard link
		)
	);
	tgmpa( $plugins, $config );
}
/********************************************************/






// Add SPAN to numbers in Categories widget
function kwayy_add_span_cat_count($links) {
	$links = str_replace('</a> (', '</a> <span>(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}
add_filter('wp_list_categories', 'kwayy_add_span_cat_count');



// Add NiceScroll Options in header
if( isset($apicona['scroller_enable']) && $apicona['scroller_enable']=='1'){
	add_action('wp_head','kwayy_nicescroll');
	if( !function_exists('kwayy_nicescroll') ){
		function kwayy_nicescroll() {
			global $apicona;
			?>
			<script type="text/javascript">
				jQuery( document ).ready(function($) {
					jQuery("html").niceScroll({
						styler:"fb",
						cursorcolor:'#616b74',
						cursorborder:'0',
						zindex:9999,
						horizrailenabled:false,
						mousescrollstep:<?php echo $apicona['scroller_speed']; ?>,
						cursorwidth:10
					});
				});
			</script>
			<?php
		}
	}
}



// Add page translation effect
if( isset($apicona['pagetranslation']) && $apicona['pagetranslation']!='no'){
	add_action('wp_head','kwayy_pagetranslation');
	if( !function_exists('kwayy_pagetranslation') ){
		function kwayy_pagetranslation() {
			global $apicona;
			
			if( !empty($apicona['pagetranslation']) && $apicona['pagetranslation']!='no' ){
				
				$pagetranslation = explode('|',$apicona['pagetranslation']);
				$starteffect = $pagetranslation[0];
				$endeffect   = $pagetranslation[1];
				?>
				<script type="text/javascript">
					jQuery( document ).ready(function($) {
						jQuery('.woocommerce-product-gallery__image > a').addClass('woocommerce-product-gallery__image_a'); // WooCommerce single product image
						$(".animsition").animsition({
							inClass               :   '<?php echo $starteffect; ?>',
							outClass              :   '<?php echo $endeffect; ?>',
							inDuration            :    1500,
							outDuration           :    800,
							//linkElement         :   '.animsition-link', 
							linkElement           :   'a:not([target="_blank"]):not([href^=\\#]):not("a.comment-reply-link"):not("#cancel-comment-reply-link"):not([rel^="prettyPhoto"]):not([data-rel^="prettyPhoto"]):not([rel^="lightbox"]):not([href^="javascript:void(0)"]):not([href^="mailto"]):not(".button.add_to_cart_button"):not(".tribe-events-ical.tribe-events-button"):not(".lang_sel_sel"):not(".woocommerce-product-gallery__image_a")',
							// e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
							touchSupport          :    true, 
							loading               :    true,
							loadingParentElement  :   'body', //animsition wrapper element
							loadingClass          :   'pageoverlay',
							unSupportCss          : [ 'animation-duration',
													  '-webkit-animation-duration',
													  '-o-animation-duration'
							]
							//"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser. 
							//The default setting is to disable the "animsition" in a browser that does not support "animation-duration". 
						});
					});
				</script>
				<?php
			}  // if
		}
	}
}



/* ajaxurl */add_action('wp_head','pluginname_ajaxurl');function pluginname_ajaxurl() { ?>	<script type="text/javascript">	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';	</script><?php }



/* Custom HTML code */
if( isset($apicona['customhtml_head']) && trim($apicona['customhtml_head'])!='' ){
	add_action('wp_head','thememount_customhtmlhead', 20);
	function thememount_customhtmlhead(){
		global $apicona;
		echo $apicona['customhtml_head'];
	}
}

if( isset($apicona['customhtml_bodyend']) && trim($apicona['customhtml_bodyend'])!='' ){
	add_action('wp_footer','thememount_customhtmlbodyend', 20);
	function thememount_customhtmlbodyend(){
		global $apicona;
		echo $apicona['customhtml_bodyend'];
	}
}

if( isset($apicona['custom_js_code']) && trim($apicona['custom_js_code'])!='' ){
	add_action('wp_footer','thememount_custom_js_code', 20);
	if( !function_exists('thememount_custom_js_code') ){
		function thememount_custom_js_code(){
			global $apicona;
			echo '<script type="text/javascript"> /* Custom JS Code */ '.trim($apicona['custom_js_code']).'</script>';
		}
	}
}


/*
 *  Reset LIKE counter
 */
function tm_pf_reset_like(){
	$screen = get_current_screen();
	if ( $screen->post_type == 'portfolio' && isset($_GET['action']) && $_GET['action']=='edit' && isset($_GET['post']) && !isset($_GET['taxonomy']) ){
		global $post;
		$postID = $_GET['post'];
		$resetVal = get_post_meta($postID, '_thememount_portfolio_like_pflikereset' ,true );
		if( $resetVal=='on' ){
			// Do reset processs now
			update_post_meta($postID, 'kwayy_likes' , '0' ); // Setting ZERO
			update_post_meta($postID, '_thememount_portfolio_like_pflikereset' ,'' ); // Removing checkbox
		}
	}
	
}
add_action('current_screen', 'tm_pf_reset_like');



/*
 *  set number of posts on team cat / archive page
 */
function tm_number_of_posts_on_archive($query){
	global $apicona;
	$teamcat_show = ( isset($apicona['teamcat_show']) && trim($apicona['teamcat_show'])!='' ) ? trim($apicona['teamcat_show']) : '9' ;

	if( ( is_tax( 'team_group' ) || is_post_type_archive('team_member') ) && $query->is_main_query() && !is_admin() ){
		$query->set('posts_per_page', $teamcat_show);
	}
	return $query;
}
add_filter('pre_get_posts', 'tm_number_of_posts_on_archive');


/*
 *  set number of posts on portfolio cat page
 */
function tm_number_of_posts_on_pcat($query){
	global $apicona;
	$pfcat_show = ( isset($apicona['pfcat_show']) && trim($apicona['pfcat_show'])!='' ) ? trim($apicona['pfcat_show']) : '8' ;

	if( is_tax( 'portfolio_category' ) && $query->is_main_query() ){
		$query->set('posts_per_page', $pfcat_show);
	}
	return $query;
}
add_filter('pre_get_posts', 'tm_number_of_posts_on_pcat');



function tm_hide_generator_meta_tag() {
	global $apicona;
	if( isset($apicona['hide_generator_meta_tag']) && $apicona['hide_generator_meta_tag']=='1' ){
		// Remove GENERATOR tag from WordPress
		remove_action('wp_head', 'wp_generator');
		
		// Remove GENERATOR tag from Visual Composer
		if( function_exists('vc_map') ){
			remove_action('wp_head', array(visual_composer(), 'addMetaData'));
		}
		
		// Remove GENERATOR tag from WooCommerce
		if( function_exists('is_woocommerce') ){
			remove_action('wp_head','wc_generator_tag');
		}
		
		// Remove GENERATOR tag from WPML plugin
		global $sitepress;
		if( isset($sitepress) ){
			remove_action( 'wp_head', array($sitepress, 'meta_generator_tag' ) );
		}
		
		
	}
}
add_action( 'init', 'tm_hide_generator_meta_tag' );



/*
 *  Check if color is dark. This is new version. This will return TRUE if dark color.
 */
function tm_check_dark_color($hex){
    if( !empty($hex) && is_string($hex) && ( strlen($hex)==6 || strlen($hex)==7 ) ){

    	// strip off any leading #
    	$hex = str_replace('#', '', $hex);
    
    	//break up the color in its RGB components
    	$r = hexdec(substr($hex,0,2));
    	$g = hexdec(substr($hex,2,2));
    	$b = hexdec(substr($hex,4,2));
    
    	//do simple weighted avarage
    	//
    	//(This might be overly simplistic as different colors are perceived
    	// differently. That is a green of 128 might be brighter than a red of 128.
    	// But as long as it's just about picking a white or black text color...)
    	if($r + $g + $b > 382){
    		return false;
    		//bright color, use dark font
    	}else{
    		return true;
    		//dark color, use bright font
    	}
    }
}



if( !function_exists('tm_adjustBrightness') ){
function tm_adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}
}



/**
 *  Change global header style value based on specific condition
 */
if( !function_exists('tm_change_headerstyle') ){
function tm_change_headerstyle(){
	
	global $apicona;
	
	$headerstyle_page = '';
	
	if( is_page() ){
		$headerstyle_page = trim(get_post_meta(get_the_ID(), 'headerstyle', true));
	}
	
	if( $headerstyle_page != '' ){
		$apicona['headerstyle'] = $headerstyle_page;
	} 
	
}
}
add_action( 'wp', 'tm_change_headerstyle' );


$themestyle = tm_get_theme_style();

if( $themestyle == 'apiconaadv' ){

/**
 * Enables the Excerpt meta box in Page edit screen.
 */
function tm_add_excerpt_support_for_pages() {
	//add_post_type_support( 'page', 'excerpt' );
	add_meta_box('postexcerpt', __('Short description for this page (Excerpt)', 'apicona'), 'tm_custom_post_excerpt_meta_box', 'page', 'normal', 'default');
}
add_action( 'admin_init', 'tm_add_excerpt_support_for_pages' );


function tm_custom_post_excerpt_meta_box($post) {
	?>
	<label class="screen-reader-text" for="excerpt"><?php _e('Excerpt', 'apicona') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
	<p><?php _e('Excerpts are optional hand-crafted summaries of your content that can be used in your theme. <a href="http://codex.wordpress.org/Excerpt" target="_blank">Learn more about manual excerpts.</a>', 'apicona'); ?></p>
	<div class="tm-highlight-box"><strong><?php _e('NOTE:','apicona') ?></strong> <?php _e('This text will be used as short description (for this page) on search results page. Please fill this box with short description for this page so user can understand the content type and get perfect result.','apicona') ?></div>
	
	<?php
}

}

/*
 *  This is under construction message code
 */
if( !function_exists('tm_uconstruction') ){
function tm_uconstruction(){
	if (!is_user_logged_in() && !is_admin() ){
		$apicona = get_option('apicona');
		echo do_shortcode($apicona['uconstruction_html']);   // We are not sanitizing this as we are expecting any (HTML, CSS, JS) code here
		
		
		// Background
		$value = $apicona['uconstruction_background'];
		$css   = '';
		if ( ! empty( $value ) && is_array( $value ) ) {
			foreach ( $value as $key => $value ) {
				if ( ! empty( $value ) && $key != "media" ) {
					if ( $key == "background-image" ) {
						$css .= $key . ":url('" . $value . "');";
					} else {
						$css .= $key . ":" . $value . ";";
					}
				}
			}
		}
		if( $css!='' ){
			echo '<style> body{'.$css.'} </style>';
		}
		
		
		die();
	}
}
}
$themestyle = tm_get_theme_style();
if( $themestyle == 'apiconaadv' && isset($apicona['uconstruction']) && $apicona['uconstruction']=='1' ){
	add_action('template_redirect', 'tm_uconstruction');
}



/* Minifier */
//minifiter-library
if( !function_exists('tm_minifier')){
function tm_minifier($type='js',$list_array){
	
	global $apicona;
	
	//$library = ( isset($apicona['minifiter-library']) && trim($apicona['minifiter-library'])!='' ) ? $apicona['minifiter-library'] : 'internal' ;
	
	//if( $library=='internal' ){
		
		if( $type=='js' ){
			include_once(get_template_directory() . '/inc/redux-framework/redux_custom_fields/kwayy_min_generator/jsmin.php');
			// Processing JS with internal
			foreach($list_array as $js_input => $js_output ){
				
				if( file_exists($js_input) ){
					$js_input = file_get_contents($js_input);
					$js_input = JSMin::minify($js_input);
					$output   = $js_input;
					$fp       = fopen($js_output, "w");
					fwrite($fp, $output, strlen($output));
					fclose($fp);
				}
				
			}
			//var_dump('DONE JS Internal...');

		} else if( $type=='css' ){
			// Processing CSS with internal
			foreach($list_array as $css_input => $css_output ){
				
				if( file_exists($css_input) ){
					
					$buffer = file_get_contents($css_input);
					
					// Remove comments
					$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);

					// Remove space after colons
					$buffer = str_replace(': ', ':', $buffer);

					// Remove whitespace
					$buffer = str_replace(array("\r\n", "\r", "\n", "\t"), '', $buffer);

					// Collapse adjacent spaces into a single space
					$buffer = preg_replace('/\s+/', ' ',$buffer);

					// Remove spaces that might still be left where we know they aren't needed
					$buffer = str_replace(array('} '), '}', $buffer);
					$buffer = str_replace(array('{ '), '{', $buffer);
					$buffer = str_replace(array('; '), ';', $buffer);
					$buffer = str_replace(array(', '), ',', $buffer);
					$buffer = str_replace(array(' }'), '}', $buffer);
					$buffer = str_replace(array(' {'), '{', $buffer);
					$buffer = str_replace(array(' ;'), ';', $buffer);
					$buffer = str_replace(array(' ,'), ',', $buffer);

					// Saving file
					$output   = $buffer;
					$fp       = fopen($css_output, "w");
					fwrite($fp, $output, strlen($output));
					fclose($fp);
				}
			}
			
			
		}
		
	/*} else {
		
		include_once('redux-framework/redux_custom_fields/thememount_min_generator/minifier.php');
		
		if( $type=='js' ){
			
			// Processing JS with external
			ob_start();
			minifyJS($list_array);
			ob_get_clean();

			
		} else if( $type=='css' ){
			
			// Processing CSS with external
			ob_start();
			minifyCSS($list_array);
			ob_get_clean();
			
			die('CSS External PROCESSED....');
			
		}

	}*/
	
	
	
};

}
# 2024-02-28 Dmitrii Fediuk https://upwork.com/fl/mage2pro
# "Re-enable the ability to upgrade WordPress via the WordPress backend": https://github.com/thehcginstitute-com/wp/issues/21


add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
return false;
}