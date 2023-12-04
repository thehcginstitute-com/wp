<?php

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Apicona 1.0
 *
 * @return void
 */

/**
 * Login page CSS script
 */
function apicona_login_stylesheet() {
    wp_enqueue_style( 'apicona-login-style', get_template_directory_uri() . '/style-login.min.css' );
}
add_action( 'login_enqueue_scripts', 'apicona_login_stylesheet' );

 
function apicona_scripts_styles_adv(){
	$apicona = get_option('apicona');
	
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
	
	/*
	 * Adds RTL CSS file
	 */
	if ( is_rtl() ) {
		wp_enqueue_style(  'apicona-rtl',  get_template_directory_uri() . '/rtl-adv'.TM_MIN.'.css' );
	}
	
	// Animsition - Add page translation effect
	if( isset($apicona['pagetranslation']) && $apicona['pagetranslation']!='no'){
		wp_enqueue_script( 'animsition', get_template_directory_uri() . '/assets/animsition/js/jquery.animsition.min.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'animsition', get_template_directory_uri() . '/assets/animsition/css/animsition.min.css' );
	}
	
	// hower.css : Hover effect (we are using min version)
	wp_register_style( 'hover', get_template_directory_uri() . '/assets/hover/hover-min.css' );
	
	// Hint.css
	wp_enqueue_style( 'hint', get_template_directory_uri() . '/assets/hint/hint.min.css' );

	// mCustomScrollbar.css : Fancy Scrollbar
	wp_enqueue_style( 'mCustomScrollbar', get_template_directory_uri() . '/assets/malihu-custom-scrollbar/jquery.mCustomScrollbar.min.css' );	
	
	// IsoTope
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/isotope/isotope.pkgd.min.js', array( 'jquery' ), '', true );
	
	// Flex Slider
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/flexslider/flexslider.css' );
	
	
	// Nivo slider
	wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider'.TM_MIN.'.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'nivo-slider-css', get_template_directory_uri() . '/css/nivo-slider'.TM_MIN.'.css' );
	wp_enqueue_style( 'nivo-slider-theme', get_template_directory_uri() . '/css/nivo-default'.TM_MIN.'.css' );
	
	
	// Sticky 
	if( $apicona['stickyheader']=='y' ){
		wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky'.TM_MIN.'.js', array( 'jquery' ) );
	}
	
	// Load font icon library CSS files
	if( isset($apicona['fonticonlibrary']) && is_array($apicona['fonticonlibrary']) && count($apicona['fonticonlibrary'])>0 ){
		foreach( $apicona['fonticonlibrary'] as $library=>$val ){
			if( $library!='fontawesome' ){
				if( $val == '1' ){
					wp_enqueue_style( $library, get_template_directory_uri() . '/css/fonticon-library/'.$library.'/css/kwayy-'.$library.TM_MIN.'.css' );
				}
				
			}
		}
	}
	
	/**
	 * Detect plugin. For use on Front End only.
	 */
	if( !function_exists('is_plugin_active') ){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	
	//adding this to add compatibility with Navgoco Vertical Multilevel Slide Menu plugin
	if ( is_plugin_active('navgoco-menu/navgoco-menu.php' ) ) {
		wp_deregister_style('fontawesome');
	}
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fonticon-library/font-awesome/css/kwayy-font-awesome'.TM_MIN.'.css' ); // Font Awesome
	
	
	// FontAwesome Library
	if ( !wp_style_is( 'font-awesome', 'registered' ) ) { // If library is not registered
		$fontawesome_css = get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css') ){
			$fontawesome_css = WP_PLUGIN_URL . '/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css';
		}
		wp_register_style( 'font-awesome', $fontawesome_css );
	}
	
	// Enqueue FontAwesome library for general use
	wp_enqueue_style( 'font-awesome' );
	
	
	// TM Social Icons CSS Library
	wp_enqueue_style( 'tm-social-icon-library', get_template_directory_uri() . '/assets/tm-social-icons/css/tm-social-icon.css' );
	
	// animate.css
	if ( !wp_style_is( 'animate-css', 'registered' ) ) { // If library is not registered
		wp_register_style( 'animate-css', get_template_directory_uri() . '/assets/animate/animate.min.css' );
	}
	
	// Numinate plugin
	if ( !wp_script_is( 'waypoints', 'registered' ) ) { // If library is not registered
		wp_register_script( 'waypoints', get_template_directory_uri() . '/assets/waypoints/jquery.waypoints.min.js', array( 'jquery' ), '', true );
	}
	wp_register_script( 'numinate', get_template_directory_uri() . '/js/numinate.1.0.1'.TM_MIN.'.js', array( 'jquery' ) );
	
	// owl carousel
	wp_register_script( 'owl-carousel', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.min.js', array('jquery'), '', true );
	wp_register_style( 'owl-carousel', get_template_directory_uri() . '/assets/owl-carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel'); /* patch for ie9: this CSS should be added */
	
	
	// PrettyPhoto
	if ( !wp_script_is( 'prettyphoto', 'registered' ) ) { // If library is not registered
		$prettyphoto_js = get_template_directory_uri() . '/assets/prettyphoto/js/jquery.prettyPhoto.js';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/js/jquery.prettyPhoto.js') ){
			$prettyphoto_js = WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/js/jquery.prettyPhoto.js';
		}
		wp_register_script( 'prettyphoto', $prettyphoto_js, array('jquery') , '', true);
	}
	if ( !wp_style_is( 'prettyphoto', 'registered' ) ) { // If library is not registered
		//$prettyphoto_css = get_template_directory_uri() . '/css/prettyPhoto.min.css';
		$prettyphoto_css = get_template_directory_uri() . '/assets/prettyphoto/css/prettyPhoto.css';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/css/prettyPhoto.css') ){
			$prettyphoto_css = WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/css/prettyPhoto.css';
		}
		wp_register_style( 'prettyphoto', $prettyphoto_css );
	}

	// jquery-match-height
	wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ) );
	
	// mCustomScrollbar.js : Fancy Scrollbar
	wp_enqueue_script( 'mCustomScrollbar', get_template_directory_uri() . '/assets/malihu-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), '', true );
	
	// Loading prettyPhoto by default
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
	
	$apicona = get_option('apicona');
	if( isset($apicona['scroller_enable']) ){
		if( $apicona['scroller_enable']=='1'){
			// NiceScroll
			wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll'.TM_MIN.'.js', array( 'jquery' ) );
			wp_enqueue_script( 'nicescroll-plus', get_template_directory_uri() . '/js/jquery.nicescroll.plus'.TM_MIN.'.js', array( 'jquery' , 'nicescroll' ) );
		} else if( $apicona['scroller_enable']=='2'){
			// SmoothScroll
			wp_enqueue_script( 'SmoothScroll', get_template_directory_uri() . '/js/SmoothScroll'.TM_MIN.'.js', array( 'jquery' ) );
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'apicona_scripts_styles_adv', 10 );


function apicona_scripts_styles_adv_14() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap-adv.min.css' );
	wp_enqueue_style( 'multi-columns-row', get_template_directory_uri() . '/css/multi-columns-row.min.css', array('bootstrap') );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array('bootstrap') );
	wp_enqueue_style( 'theme-base-style', get_template_directory_uri() . '/css/base-adv'.TM_MIN.'.css' );
}
add_action( 'wp_enqueue_scripts', 'apicona_scripts_styles_adv_14', 14 );


function apicona_scripts_styles_adv_15() {
	
	// Main theme is active
	if( defined( 'WPB_VC_VERSION' ) ){
		wp_enqueue_style( 'apicona-main-style', get_template_directory_uri() . '/css/main-adv'.TM_MIN.'.css' , array('js_composer_front') );
	} else {
		wp_enqueue_style( 'apicona-main-style', get_template_directory_uri() . '/css/main-adv'.TM_MIN.'.css' );
	}
	
	
	$theme = wp_get_theme(); // gets the current theme
	if ( !empty($theme->name) && 'Apicona' != $theme->name ) {
		// child theme is active
		wp_enqueue_style( 'apicona-child-style', get_stylesheet_directory_uri() . '/style.css' , array('apicona-main-style') );
		
	}
	
}
add_action( 'wp_enqueue_scripts', 'apicona_scripts_styles_adv_15', 15 );


function apiconaadv_scripts_styles_adv_16() {
	
	$apicona = get_option('apicona');

	$cssfile = (is_multisite()) ? 'php' : 'css' ;
	if( isset($apicona['dynamic-file-type']) && trim($apicona['dynamic-file-type'])!='' ){
		$cssfile = $apicona['dynamic-file-type'];
	}
	
	// Set PHP for multisite as this is required.
	$cssfile = (is_multisite()) ? 'php' : $cssfile ;
	
	if($cssfile=='css'){ $cssfile=TM_MIN.'.css'; } else {$cssfile='.'.$cssfile;}
	// Dynamic Stylesheet
	
	if( isset($apicona['dynamic-style-position']) && $apicona['dynamic-style-position']=='internal' ){
		// Do nothing
	} else {
		
		wp_enqueue_style( 'apicona-dynamic-style', get_template_directory_uri() . '/css/dynamic-style-adv'.$cssfile );
	}
	
	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'apicona-ie', get_template_directory_uri() . '/css/ie-adv'.TM_MIN.'.css' );
	wp_style_add_data( 'apicona-ie', 'conditional', 'lt IE 10' );
	
}
add_action( 'wp_enqueue_scripts', 'apiconaadv_scripts_styles_adv_16', 16 );


function apiconaadv_scripts_styles_17() {
	// Responsive
	$apicona = get_option('apicona');
	
	if($apicona['responsive']=='1'){
		wp_enqueue_style( 'apicona-responsive-style', get_template_directory_uri() . '/css/responsive-adv'.TM_MIN.'.css' );
	}
	
	
	// Loads JavaScript file with functionality specific to Apicona Advanced.
	if ( wp_script_is( 'wpb_composer_front_js', 'registered' ) ) {
		wp_enqueue_script( 'apicona-adv-scripts', get_template_directory_uri() . '/js/functions_adv'.TM_MIN.'.js', array( 'jquery', 'wpb_composer_front_js' ), '1.0', true );
	} else {
		wp_enqueue_script( 'apicona-adv-scripts', get_template_directory_uri() . '/js/functions_adv'.TM_MIN.'.js', array( 'jquery' ), '1.0', true );
	}
	
	
}
add_action( 'wp_enqueue_scripts', 'apiconaadv_scripts_styles_17', 17 );



/**
 * Enqueue scripts and styles for the admin section.
 *
 * @since Apicona 1.0
 *
 * @return void
 */
function apicona_custom_wp_admin_style_adv() {
	wp_register_script('custom-select2-js', get_template_directory_uri() . '/inc/custom-select2/custom-select2.js', array( 'jquery' ), time(), true);
	wp_register_style('custom-select2-css', get_template_directory_uri() . '/inc/custom-select2/custom-select2.css', array(), time(), 'all');
		
		
	// Load font icon library CSS files
	global $apicona;
	if( isset($apicona['fonticonlibrary']) && is_array($apicona['fonticonlibrary']) && count($apicona['fonticonlibrary'])>0 ){
		foreach( $apicona['fonticonlibrary'] as $library=>$val ){
			if( $library!='fontawesome' ){
				if( $val == '1' ){
					wp_enqueue_style( $library, get_template_directory_uri() . '/css/fonticon-library/'.$library.'/css/kwayy-'.$library.'.css' );
				}
			}
		}
	}
	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fonticon-library/font-awesome/css/kwayy-font-awesome.css' ); // Font Awesome
	
	wp_enqueue_script('custom-select2-js');
	wp_enqueue_style('custom-select2-css');
	wp_enqueue_style('kwayy-font-css');
	
	wp_enqueue_style( 'apicona_custom_wp_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false, '1.0.0' );
	wp_enqueue_script( 'apicona_custom_js', get_template_directory_uri() . '/inc/admin-custom.js', array( 'jquery' ) );
}
add_action( 'admin_enqueue_scripts', 'apicona_custom_wp_admin_style_adv' );


