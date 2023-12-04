<?php


/* function to get theme options default value */
if( !function_exists('thememount_get_themeoptions_default_value') ){
function thememount_get_themeoptions_default_value( $id ){
	$return = '';
	$default_values = '{"last_tab":"","themestyle":"apiconaadv","layout":"wide","full_wide_elements":{"header":"1","content":"1","footer":"1"},"responsive":"1","skincolor":"#e13e20","global_background":{"background-color":"#ffffff","background-repeat":"","background-size":"cover","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"inner_background":{"background-color":"#ffffff","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"pagetranslation":"no","loaderimg":"11","loaderimage_custom":{"url":"","id":"","height":"","width":"","thumbnail":""},"scroller_enable":"3","scroller_speed":"40","fonticonlibrary":{"fontawesome":"1","lineicons":"","entypo":"","typicons":"","iconic":"","mpictograms":"","meteocons":"","mfglabs":"","maki":"","zocial":"","brandico":"","elusive":"","websymbols":"","twemojiawesome":""},"one_page_site":"0","favicon":{"url":"","id":"3511","height":"48","width":"48","thumbnail":""},"favicon_16":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_32":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_96":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_160":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_192":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_57":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_60":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_72":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_76":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_114":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_120":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_144":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_152":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_180":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_tile_color":"#ffffff","favicon_ms_144":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_70":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_150":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_310_150":{"url":"","id":"","height":"","width":"","thumbnail":""},"favicon_ms_310":{"url":"","id":"","height":"","width":"","thumbnail":""},"general_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"13px","line-height":"22px","letter-spacing":"0.5px","color":"#676767"},"link-color":{"regular":"#1c1c1c","hover":"#e13e20"},"h1_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"30px","line-height":"34px","letter-spacing":"1px","color":"#1c1c1c"},"h2_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"25px","line-height":"30px","letter-spacing":"1px","color":"#1c1c1c"},"h3_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"22px","line-height":"30px","letter-spacing":"","color":"#1c1c1c"},"h4_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"18px","line-height":"25px","letter-spacing":"","color":"#1c1c1c"},"h5_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"16px","line-height":"18px","letter-spacing":"","color":"#1c1c1c"},"h6_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","font-size":"14px","line-height":"16px","letter-spacing":"1px","color":"#1c1c1c"},"heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"500","font-style":"","text-transform":"","font-size":"25px","line-height":"30px","letter-spacing":"1px","color":"#131313"},"subheading_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"","font-weight":"300","font-style":"","text-transform":"","font-size":"19px","line-height":"25px","letter-spacing":"0.5px","color":"#676767"},"widget_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"uppercase","font-size":"19px","line-height":"26px","letter-spacing":"0.5px","color":"#1c1c1c"},"button_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"500","font-style":"","text-transform":"uppercase","letter-spacing":"1px"},"elementtitle":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"","letter-spacing":""},"fbar_show":"1","fbar_position":"default","fbar_bg_color":"darkgrey","fbar_bg_custom_color":{"color":"#75db18","alpha":"0.8","rgba":"rgba(117,219,24,0.8)"},"fbar_text_color":"white","fbar_text_custom_color":"#8224e3","fbar_background":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center center","background-image":"'. get_template_directory_uri() .'/images/floatingbar_image_adv.jpg","media":{"id":"","height":"800","width":"1200","thumbnail":""}},"topbar_show_team_search":"1","fbar-form-title":"DOCTOR\'S SEARCH","fbar-form-desc":"","fbar-form-input-text":"Search by name","fbar-form-select-group":"All sections","fbar-form-btn-text":"Search","topbar_handler_icon":"fa-user-md","topbar_handler_icon_close":"fa-times","fbar_btn_bg_color":"skincolor","fbar_btn_bg_custom_color":"#3d24e2","fbar_icon_color":"white","fbar_icon_custom_color":"#eeee22","floatingbar_breakpoint":"1200","floatingbar_breakpoint_custom":"1200","topbarhide":"0","topbarbgcolor":"custom","topbarbgcustomcolor":"#242424","topbar_text_color":"white","topbartextcustomcolor":"#f45138","topbartext":"<ul class=\"top-contact\"><li><i class=\"kwicon-fa-phone\"></i>Call us now! <strong>0123 444 333</strong></li><li><i class=\"kwicon-fa-envelope-o\"></i>info@example.com</li><li><i class=\"kwicon-fa-map-marker\"></i>Find our Location</li></ul>","topbarrighttext":"[kwayy-social-links]","topbar_breakpoint":"768","topbar_breakpoint_custom":"1200","titlebar_bg_color":"custom","titlebar_bg_custom_color":{"color":"#000000","alpha":"0.8","rgba":"rgba(0,0,0,0.8)"},"titlebar_background":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center center","background-image":"'. get_template_directory_uri() .'/images/titlebar_image_adv.jpg","media":{"id":"","height":"800","width":"1200","thumbnail":""}},"titlebar_heading_font":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"500","font-style":"","text-transform":"uppercase","font-size":"40px","line-height":"40px","letter-spacing":"0.5px"},"titlebar_subheading_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"","font-weight":"400","font-style":"","text-transform":"none","font-size":"20px","line-height":"30px","letter-spacing":"1px"},"titlebar_breadcrumb_font":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"","font-weight":"400","font-style":"","text-transform":"none","font-size":"14px","line-height":"20px","letter-spacing":"1px"},"tbar-height":"300","titlebar_view":"default","titlebar_text_color":"white","titlebar_text_custom_color":"#81d742","tbar_hide_bcrumb":"0","adv_tbar_catarc":"Category Archives: ","adv_tbar_tagarc":"Tag Archives: ","adv_tbar_postclassified":"Posts classified under: ","adv_tbar_authorarc":"Author Archives: ","headerbgcolor":{"color":"#ffffff","alpha":"1","rgba":"rgba( 255,255,255, 1)"},"stickyheaderbgcolor":{"color":"#ffffff","alpha":"1","rgba":"rgba( 255,255,255, 1)"},"logotype":"image","logotext":"Apicona Advanced","logo_font":{"font-family":"Raleway","font-options":"","google":"1","font-backup":"\'Times New Roman\', Times,serif","font-weight":"700","font-style":"","font-size":"36px","color":"#272727"},"logoimg":{"url":"'. get_template_directory_uri() .'/images/logo_adv.png","id":"3834","height":"75","width":"312","thumbnail":""},"logoimg_sticky":{"url":"","id":"","height":"","width":"","thumbnail":""},"logo-max-height":"38","logo-max-height-sticky":"38","header-height":"100","header-height-sticky":"80","header_search":"1","search_input":"WRITE SEARCH WORD...","stickyheader":"y","headerstyle":"1","center-logo-width":"290","first-menu-margin":"160","menubgcolor":"#000000","header_right_content":"","header_three_content":"<ul>\r\n<li class=\"fst\">\r\n<div class=\"media-left\">\r\n<div class=\"icon\"> <i class=\"fa fa-map-marker\"></i></div>\r\n</div>\r\n<div class=\"media-right\">\r\n<h6 class=\"font-raleway\">Our Location </h6>\r\n<span>50- Design Street, Texas</span> </div>\r\n</li>\r\n\r\n<li>\r\n<div class=\"media-left\">\r\n<div class=\"icon\"> <i class=\"fa fa-phone\"></i></div>\r\n</div>\r\n<div class=\"media-right\">\r\n<h6>PHONE NUMBER</h6>\r\n<span>1-800-123-456</span> </div>\r\n</li>\r\n<li>\r\n<div class=\"media-left\">\r\n<div class=\"icon\"> <i class=\"fa fa-envelope\"></i></div>\r\n</div>\r\n<div class=\"media-right\">\r\n<h6>CONTACT MAIL</h6>\r\n<span>info@mail.com</span> </div>\r\n</li>\r\n</ul>","logoseo":"h1homeonly","menu_breakpoint":"1200","menu_breakpoint_custom":"1200","mainmenufont":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"","font-weight":"500","font-style":"","text-transform":"uppercase","font-size":"14px","line-height":"35px","letter-spacing":"0.5px","color":"#282828"},"stickymainmenufontcolor":"#282828","mainmenu_active_link_color":"skin","mainmenu_active_link_custom_color":"#e13e20","dropdownmenufont":{"font-family":"Roboto","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"400","font-style":"","text-transform":"uppercase","font-size":"12px","line-height":"20px","letter-spacing":"0.5px","color":"#ffffff"},"dropmenu_active_link_color":"skin","dropmenu_active_link_custom_color":"#ff1111","dropmenu_background":{"background-color":"#222222","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"dropdown_menu_separator":"white","dropdown_menu_separator_vertical":"white","megamenu_widget_title":{"font-family":"Ubuntu","font-options":"","google":"1","font-backup":"\'Trebuchet MS\', Helvetica, sans-serif","font-weight":"500","font-style":"","text-transform":"","font-size":"16px","line-height":"20px","letter-spacing":"1px","color":"#ffffff"},"mmmenu_dropdown_bg_1":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_2":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_3":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_4":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_5":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_6":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_7":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_8":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_9":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"mmmenu_dropdown_bg_10":{"background-color":"","background-repeat":"","background-size":"","background-attachment":"","background-position":"","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"stickyfooter":"0","footerwidget_bgimage":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center top","background-image":"'. get_template_directory_uri() .'/images/footer_image.jpg","media":{"id":"","height":"800","width":"1200","thumbnail":""}},"footerwidget_bgcolor":{"color":"#252525","alpha":"0.97","rgba":"rgba(37,37,37,0.97)"},"footerwidget_color":"white","top_footer_widget_column":"4_4_4","footer_column_layout":"3_3_3_3","footer_copyright_bgimage":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center top","background-image":"","media":{"id":"","height":"","width":"","thumbnail":"http://apicona-advanced.thememount.com/wp-content/uploads/2016/06/footer-bg-150x150.jpg"}},"footer_copyright_bgcolor":{"color":"#1c1c1c","alpha":"1","rgba":"rgba(28,28,28,1)"},"footer_copyright_color":"white","copyrights":"Copyright &copy; [current-year] <a href=\"[site-url]\">[site-title]</a>. All rights reserved.","footer_copyright_right":"[tm-footermenu]","login_background":{"background-color":"transparent","background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center center","background-image":"'. get_template_directory_uri() .'/images/titlebar_image_adv.jpg","media":{"id":"","height":"","width":"","thumbnail":""}},"blog_text_limit":"0","blog_view":"classic","blog_readmore_text":"Read More","team_before_title_text":"ABOUT","teamcat_column":"three","teamcat_show":"9","portfolio_show_like":"1","portfolio_readmore_text":"View Project Details","portfolio_show_related":"1","portfolio_project_details":"PROJECT DETAILS","portfolio_description":"ABOUT THIS PROJECT","portfolio_related_title":"RELATED  PROJECTS","portfolio_viewstyle":"default","pf_details_date_icon":"fa-calendar","pf_details_date_title":"Date","pf_details_line1_icon":"fa-user","pf_details_line1_title":"Doctor/Team Name","pf_details_line2_icon":"fa-clipboard","pf_details_line2_title":"Skills","pf_details_line3_icon":"fa-map-marker","pf_details_line3_title":"Location","pf_details_line4_icon":"fa-adjust","pf_details_line4_title":"","pf_details_line5_icon":"","pf_details_line5_title":"","pf_details_cat_icon":"fa-align-justify","pf_details_cat_title":"Category","pf_single_social_share":{"facebook":"1","twitter":"1","gplus":"1","pinterest":"1","linkedin":"1","stumbleupon":"1","tumblr":"1","reddit":"1","digg":"1"},"pfcat_column":"three","pfcat_show":"9","error404_big_icon":"","error404_big_text":"404 ERROR","error404_medium_text":"This file may have been moved or deleted. Be sure to check your spelling.","error404_search":"1","searchnoresult":"<div class=\"thememount-big-icon\"><i class=\"fa fa-search\"></i></div><h4>No results were found for your search</h4></br>You may try the search with another query.<br><br><br>","sidebar_page":"right","sidebar_blog":"right","sidebar_search":"left","sidebar_woocommerce":"right","sidebar_bbpress":"right","sidebar_events":"no","twitter":"#","youtube":"#","flickr":"","facebook":"#","linkedin":"#","googleplus":"","yelp":"","dribbble":"","pinterest":"","podcast":"","instagram":"","xing":"","vimeo":"","vk":"","houzz":"","issuu":"","google-drive":"","tripadvisor":"","stumbleupon":"","delicious":"","tumblr":"","odnoklassniki":"","rss":"1","wc-header-icon":"1","woocommerce-column":"3","woocommerce-product-per-page":"9","wc-single-show-related":"1","wc-single-related-column":"3","wc-single-related-count":"3","uconstruction":"0","uconstruction_html":"<html>\r\n<head>\r\n<title>[site-title] - Under Construction</title>\r\n</head>\r\n<body>\r\n<center>\r\n<br><br><br>\r\n<div>[tm-logo]</div>\r\n<br><br>\r\n<h3 style=\"font-family: Verdana; font-weight: normal;\">This website is under construction. please visit after some time.</h3>\r\n</center>\r\n</body>\r\n</html>","uconstruction_background":{"background-color":"#ffffff","background-repeat":"no-repeat","background-size":"cover","background-attachment":"","background-position":"center center","background-image":"'. get_template_directory_uri() .'/images/titlebar_image_adv.jpg","media":{"id":"","height":"800","width":"1200","thumbnail":""}},"team_type_title":"Team Members","team_type_slug":"team-members","team_group_title":"Team Group","team_group_slug":"team-group","team_type_archive_title":"Team Members","pf_type_title":"Portfolio","pf_type_slug":"portfolio","pf_cat_title":"Portfolio Category","pf_cat_slug":"portfolio-category","dynamic-style-position":"external","dynamic-file-type":"php","minify-css-js":"0","img-portfolio-two-column":{"width":"855","height":"570","crop":"yes"},"img-portfolio-three-column":{"width":"740","height":"493","crop":"yes"},"img-portfolio-four-column":{"width":"767","height":"511","crop":"yes"},"img-blog-two-column":{"width":"1110","height":"601","crop":"yes"},"img-blog-three-column":{"width":"720","height":"390","crop":"yes"},"img-blog-four-column":{"width":"780","height":"423","crop":"yes"},"img-team-two-column":{"width":"1110","height":"624","crop":"yes"},"img-team-three-column":{"width":"720","height":"406","crop":"yes"},"img-team-four-column":{"width":"750","height":"422","crop":"yes"},"img-blog-single":{"width":"750","height":"406","crop":"yes"},"hide_generator_meta_tag":"0","enable_adv_vc_options":"0","show_no_image":{"blog":"","portfolio":""},"custom_css_code":"","custom_js_code":"","customhtml_head":"<link href=\"https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,400italic,300,700,700italic&subset=latin,greek,cyrillic-ext,latin-ext,cyrillic,vietnamese\" rel=\"stylesheet\" type=\"text/css\">\r\n\t\t\t<link href=\"https://fonts.googleapis.com/css?family=Lora&subset=latin,latin-ext,cyrillic\" rel=\"stylesheet\" type=\"text/css\">","customhtml_bodystart":"","customhtml_bodyend":"","login_custom_css_code":"","custom_css_code_top":"@import url(https://fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic);","redux-backup":1}';
	
	/* Redux options default values */
	/**** value end here *****/
	
	
	if( !empty($id) ){
		$default_array = json_decode($default_values, true);
		
		if( isset( $default_array[$id] )  ){
			$return = $default_array[$id];
		}
		
		
	}
	
	return $return;
	
}
}



//var_dump( thememount_get_themeoptions_default_value('topbar_handler_icon') ); die;



//Words for translations specially for POedit software only.
__('Team Member', 'apicona');
__('Date', 'apicona');
__('Skills', 'apicona');
__('Location', 'apicona');
__('Category', 'apicona');
__('Category Archives: ', 'apicona');
__('Tag Archives: ', 'apicona');
__('Posts classified under: ', 'apicona');
__('Author Archives: ', 'apicona');
__('Read More', 'apicona');
__('ABOUT', 'apicona');
__('View Project Details', 'apicona');
__('PROJECT DETAILS', 'apicona');
__('ABOUT THIS PROJECT', 'apicona');
__('RELATED PROJECTS', 'apicona');
__('404 ERROR', 'apicona');
__('This file may have been moved or deleted. Be sure to check your spelling.', 'apicona');





$args = array();

// Getting all values of Theme Options
global $apicona;
$apicona = get_option('apicona');



// For use with a tab example below
$tabs = array();

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name'); 
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';
$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','apicona' ), $ct->display('Name') );
?>

<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
	<?php if ( $screenshot ) : ?>
		<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
		<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
			<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview', 'apicona' ); ?>" />
		</a>
		<?php endif; ?>
		<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview', 'apicona' ); ?>" />
	<?php endif; ?>

	<h4>
	<h4>
		<?php echo $ct->display('Name'); ?>
	</h4>

	<div>
		<ul class="theme-info">
			<li><?php printf( __('By %s','apicona'), $ct->display('Author') ); ?></li>
			<li><?php printf( __('Version %s','apicona'), $ct->display('Version') ); ?></li>
			<li><?php echo '<strong>'.__('Tags', 'apicona').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
		</ul>
		<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
		<?php if ( $ct->parent() ) {
			printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'apicona' ) . '</p>',
				__( 'http://codex.wordpress.org/Child_Themes','apicona' ),
				$ct->parent()->display( 'Name' ) );
		} ?>
		
	</div>

</div>

<?php
$item_info = ob_get_contents();
    
ob_end_clean();


/*
 *  Disable tracking for Redux Framework
 */
$options                   = get_option( 'redux-framework-tracking' );
$options['allow_tracking'] = 'no';
update_option( 'redux-framework-tracking', $options );




// BEGIN Sample Config

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode']   = false;
$args['customizer'] = false;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'apicona';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = true;


// Set the icon for the system info tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['system_info_icon'] = 'info-sign';

// Set the class for the system info tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
//$args['system_info_icon_class'] = 'icon-large';

$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the starting tab for the option panel.
// Default: '0';
//$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
//$args['admin_stylesheet'] = 'standard';

// Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
	'link' => 'https://twitter.com/thememount',
	'title' => 'Follow us on Twitter', 
	'img' => get_template_directory_uri() . '/inc/images/twitter.png'
);

// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;

// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'icon-large';

/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';


// Set a custom menu icon.
//$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('Theme Options', 'apicona');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('Theme Options', 'apicona');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'kwayy_theme_options';

$args['default_show'] = true;
$args['default_mark'] = '*';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';

// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
// Default: menu
//$args['page_type'] = 'submenu';
$args['page_type'] = 'submenu';

// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';

// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;

// Set a custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';

// Disable the panel sections showing as submenu items.
// Default: true
//$args['allow_sub_menu'] = false;
    
// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
$args['help_tabs'][] = array(
    'id' => 'thememount-opts-1',
    'title' => __('Help and Support', 'apicona'),
    'content' => __('<h3>Help and Support</h3>
		<ul>
			<li><a href="http://apicona-advanced.thememount.com/documentation/index.html" target="_blank">Theme Help Documenation</a></li>
			<li><a href="http://support.thememount.com/" target="_blank">Questions? Ask us here.</a></li>
			<li><a href="http://apicona-advanced.thememount.com/" target="_blank">Live Demo</a></li>
		</ul>', 'apicona')
);
/*$args['help_tabs'][] = array(
    'id' => 'thememount-opts-2',
    'title' => __('Theme Information 2', 'apicona'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'apicona')
);*/

// Set the help sidebar for the options page.                                        
//$args['help_sidebar'] = __('<p></p>', 'apicona');


// Add HTML before the form.
if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace("-", "_", $args['opt_name']);
	}
	$args['intro_text'] = sprintf( __('<p>If you have any problem or question than you can <a href="http://apicona-advanced.thememount.com/documentation/index.html" target="_blank">read theme documentation online by clicking here</a>. If still not working than you can contact us via our <a href="http://support.thememount.com" target="_blank">support ticket system</a>.</p>', 'apicona' ), $v );
} else {
	$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'apicona');
}

// Add content after the form.
//$args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'apicona');

// Set footer/credit line.
//$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'apicona');


$sections = array();              

//Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../../../images/patterns/';
$sample_patterns_url  = get_template_directory_uri() . '/images/patterns/';
$sample_patterns      = array();

//var_dump($sample_patterns_path); die();
//var_dump($sample_patterns_path); die();

if ( is_dir( $sample_patterns_path ) ) :
	if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
		$sample_patterns = array();
		while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
			if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name = explode(".", $sample_patterns_file);
				$name = str_replace('.'.end($name), '', $sample_patterns_file);
				$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
			}
		}
	endif;
endif;


/**
 *  Redux Vendor Support
 *
 * This plugin (or extension) acts as a backup and/or replacement for the CDN based files for Select2 and ACE Editor used within Redux Framework.
 *
 */
$args['use_cdn'] = false;  // Disabling external CDN
include_once get_template_directory().'/inc/redux-framework/redux-vendor-support/redux-vendor-support.php';




/*****************************************************************************/



// Layout Settings
$sections[] = array(
	'title'  => __('Layout Settings', 'apicona'),
	'header' => __('Layout Settings', 'apicona'),
	'desc'   => __('Specify theme pages layout, the skin coloring and background', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-website',
	'fields' => array(
		array(
			'id'         => 'themestyle',
			'type'       => 'kwayy_switch_theme_style',
			'title'      => __('Select Theme Style', 'apicona'), 
			'subtitle'   => __('This is option for Theme Style', 'apicona'),
			/*'options' 	 => array(
							'apicona'    => 'Apicona Old',
							'apicona'   => 'Apicona Advanced',
						),*/
			'default'	 => 'apiconaadv',
			'customizer' => false,
		),
		array(
			'id'         => 'kwayy_one_click_demo_content',
			'type'       => 'kwayy_one_click_demo_content',
			'title'      => __('Demo Content Setup', 'apicona'), 
			'subtitle'   => __('This is one click demo content setup', 'apicona'),
			'customizer' => false,
		),
		/*array(
			'id'       => 'thememount_pre_color_packages',
			'type'     => 'thememount_pre_color_packages',
			'title'    => __('Pre-color packages', 'apicona'), 
			'subtitle' => __('You will get different color settings in just one click. So you don\'t need to set each options individually.', 'apicona'),
			'customizer'=> false,
		),*/
		array(
			'id'       => 'layout',
			'type'     => 'radio',
			'title'    => __('Pages Layout', 'apicona'), 
			'subtitle' => __('Specify the layout for the pages', 'apicona'),
			'options'  => array('wide'     => 'Wide',
								'boxed'    => 'Boxed',
								'framed'   => 'Framed',
								'rounded'  => 'Rounded',
								'fullwide' => 'Full Wide',
						),//Must provide key => value pairs for radio options
			'default'  => thememount_get_themeoptions_default_value('layout'),
		),
		array(
			'id'        => 'full_wide_elements',
			'type'      => 'checkbox',
			'title'     => __('Select Elements for Full Wide View (in above option)', 'apicona'),
			'subtitle'  => __('Select elements that you want to show in full-wide view.', 'apicona'),
			'desc'      => __('Select elements that you want to show in full-wide view.', 'apicona'),
			'required'  => array('layout','equals','fullwide'),
			//Must provide key => value pairs for multi checkbox options
			'options'   => array(
				'header'  => __('Header', 'apicona'),
				'content' => __('Content Area', 'apicona'),
				'footer'  => __('Footer', 'apicona'),
			),
			
			//See how std has changed? you also don't need to specify opts that are 0.
			'default'   => thememount_get_themeoptions_default_value('full_wide_elements'),
		),
		
		array(
			'id'       => 'responsive',
			'type'     => 'switch',
			'title'    => __('Responsive Design', 'apicona'), 
			'subtitle' => __('Check this option to enable responsive design to the theme', 'apicona'),
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('responsive'), // 1 = on | 0 = off
			'customizer'=> false,
		),
		array(
			'id'       => 'skincolor',
			'type'     => 'kwayy_skin_color',
			'title'    => __('Skin Color', 'apicona'), 
			'subtitle' => __('Custom color for skin. This is color to highlight different elements. Like text links, active tabs, progress bars, active accordion and others.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('skincolor'),
			'values'   => array(
                                'Cerulean'         => '#03acdc',
				'Atlantis'         => '#9dc02e',
				'Conifer'          => '#97d04d',
				'Jaffa'            => '#ea984f',
				'Sail'             => '#a7ddf4',
				'Flamingo'         => '#F6653C',
				'Atoll'            => '#0A4B73',
				'Keppel'           => '#37bc9b',
				'Curious Blue'     => '#22b5e1',
				'Hollywood Cerise' => '#ff0096',
			),
			'validate'   => 'color',
			'customizer' => false,
			'compiler'   => 'true',
		),
		array(
			'id'    =>'html-backgroundsettings',
			'type'  => 'info',
			'title' => __('Background Settings', 'apicona'), 
			'desc'  => __('Set below background options. Background settings will be applied to Boxed layout only.', 'apicona')
        ),
		array(
			'id'            => 'global_background',
			'type'          => 'background',
			'title'         => __('Body Background Properties', 'apicona'),
			'subtitle'      => __('Set background for main body. This is for main outer body background. For "Boxed" layout only.', 'apicona'),
			'preview_media' => true,
			'output'        => array('body'),
			'default'       => thememount_get_themeoptions_default_value('global_background'),
			//'customizer'    => true,
		),
		array(
			'id'            => 'inner_background',
			'type'          => 'background',
			'title'         => __('Content Area Background Properties', 'apicona'),
			'subtitle'      => __('Set background for content area.', 'apicona'),
			'preview_media' => true,
			'output'        => array('body'),
			'default'       => array( "background-color" => "#ffffff", ),
		),
		
		/* Loader Image */
		array(
			'id'    =>'html-pagetranslation',
			'type'  => 'info',
			'title' => __('Page Translation Effect', 'apicona'), 
			'desc'  => __('Select page translation effect for the site. We are using <strong>Animsition</strong> library for page transation and you can <a href="http://git.blivesta.com/animsition/" target="_blank">see preview of each translation here</a>.', 'apicona')
        ),
		array(
			'id'       => 'pagetranslation',
			'type'     => 'radio',
			'title'    => __('Page translation effect', 'apicona'), 
			'subtitle' => __('Select page translation effect here.', 'apicona'),
			'options'  => array(
							'no'                           => __('No effect', 'apicona'),
							'fade-in|fade-out'             => __('Fade', 'apicona'),
							'fade-in-up|fade-out-down'     => __('Fade up', 'apicona'),
							'fade-in-down|fade-out-up'     => __('Fade down', 'apicona'),
							'fade-in-left|fade-out-left'   => __('Fade from left', 'apicona'),
							'fade-in-right|fade-out-right' => __('Fade from right', 'apicona'),
							'rotate-in|rotate-out'         => __('Rotate', 'apicona'),
							'flip-in-x|flip-out-x'         => __('Flip X', 'apicona'),
							'flip-in-y|flip-out-y'         => __('Flip Y', 'apicona'),
							'zoom-in|zoom-out'             => __('Zoom', 'apicona'),
						), //Must provide key => value pairs for radio options
			'default'  => 'no',
		),
		
		
		/* Loader Image */
		array(
			'id'    =>'html-loaderimage',
			'type'  => 'info',
			'title' => __('Pre-loader image', 'apicona'), 
			'desc'  => __('Select pre-loader image for the site. This will work on desktop, mobile and tablet devices.', 'apicona')
        ),
		array(
			'id'       => 'loaderimg',
			'type'     => 'image_select',
			'title'    => __('Pre-loader Image', 'apicona'), 
			'subtitle' => __('Please select site pre-loader image. <br /><br /><em><strong>Note: </strong>Please note that if you uploaded pre-loader image (in below option) than this pre-defined loader image will be ignored.</em>', 'apicona'),
			'options'  => array(
				'no' => array(
					'alt' => __('Loader image 0', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader0.gif'
				),
				'1' => array(
					'alt' => __('Loader image 1', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader1.gif'
				),
				'2' => array(
					'alt' => __('Loader image 2', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader2.gif'
				),
				'3' => array(
					'alt' => __('Loader image 3', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader3.gif'
				),
				'4' => array(
					'alt' => __('Loader image 4', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader4.gif'
				),
				'5' => array(
					'alt' => __('Loader image 5', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader5.gif'
				),
				'6' => array(
					'alt' => __('Loader image 6', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader6.gif'
				),
				'7' => array(
					'alt' => __('Loader image 7', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader7.gif'
				),
				'8' => array(
					'alt' => __('Loader image 8', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader8.gif'
				),
				'9' => array(
					'alt' => __('Loader image 9', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader9.gif'
				),
				'10' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader10.gif'
				),
				'11' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader11.gif'
				),
				'12' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader12.gif'
				),
				'13' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader13.gif'
				),
				'14' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader14.gif'
				),
				'15' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader15.gif'
				),
				'16' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader16.gif'
				),
				'17' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader17.gif'
				),
				'18' => array(
					'alt' => __('Loader image 10', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader18.gif'
				),
				'custom' => array(
					'alt' => __('Custom Loader image (select below)', 'apicona'),
					'img' => get_template_directory_uri() . '/images/loader-custom.gif'
				),
			),
			'default'  => thememount_get_themeoptions_default_value('loaderimg'),
		),
		array(
			'id'       => 'loaderimage_custom',
			'type'     => 'media',
			'title'    => __('Upload Pre-loader Image', 'apicona'),
			'subtitle' => __('Custom pre-loader image that you want to show. You can create animated GIF image from your logo from <a href="http://animizer.net/en/animate-static-image" target="_blank">Animizer</a> website. <br /><br /><em><strong>Note: </strong>Please note that if you selected image here than the pre-defined loader image (in above option) will be ignored.</em>', 'apicona'),
			'required' => array( 'loaderimg', 'equals', 'custom' ),
		),
		
		
		/* NiceScroll Options */
		array(
			'id'    =>'html-NiceScrollOptions',
			'type'  => 'info',
			'title' => __('Scroller Settings', 'apicona'), 
			'desc'  => __('Set options for scrollbar.', 'apicona')
		),
		array(
			'id'        => 'scroller_enable',
			'type'      => 'button_set',
			'title'     => __('Page Scrolling Effect', 'apicona'),
			'subtitle'  => __('Select page scrolling effect. ', 'apicona'),
			'desc'      => __('<ul><li><strong>NiceScroll:</strong> Contains fancy scrollbar and smooth page scroll</li><li><strong>SmoothScroll:</strong> contains only smooth page scroll</li><ul>', 'apicona'),
			
			//Must provide key => value pairs for radio options
			'options'   => array(
				'1' => 'NiceScroll', 
				'2' => 'SmoothScroll',
				'3' => 'No effect',
			),
			'default'   => '2'
		),
		array(
			'id'       => 'scroller_speed',
			'type'     => 'text',
			'title'    => __('Page Scrolling Speed (mousescrollstep)', 'apicona'),
			'subtitle' => __('Page scrolling speed with mouse wheel, default value is <code>40</code> (pixel)', 'apicona'),
			'required' => array('scroller_enable','equals','1'),
			'customizer' => false,
			'default'  => __('40', 'apicona'),
		),
		
		
		/* Fonticon library Options */
		array(
			'id'    =>'html-fonticonlibrary',
			'type'  => 'info',
			'title' => __('Font Icon Library Selection', 'apicona'), 
			'desc'  => __('Select font-icon library. The more library you select the more loading in your site will be applied.', 'apicona')
		),
		array(
			'id'        => 'fonticonlibrary',
			'type'      => 'checkbox',
			'title'     => __('Select Font Icon Library', 'apicona'),
			'subtitle'  => __('Select font icon library', 'apicona'),
			'desc'      => __('Select font icon library.', 'apicona'),
			
			//Must provide key => value pairs for multi checkbox options
			'options'   => array(
				'fontawesome' => __('Font Awesome (558 icons)', 'apicona'),
				'lineicons'   => __('Lineicons (58 icons)', 'apicona'),
				'entypo'      => __('Entypo (284 icons)', 'apicona'),
				'typicons'    => __('Typicons (308 icons)', 'apicona'),
				'iconic'      => __('Iconic (151 icons)', 'apicona'),
				'mpictograms' => __('Modern Pictograms (91 icons)', 'apicona'),
				'meteocons'   => __('Meteocons (47 icons)', 'apicona'),
				'mfglabs'     => __('MFG Labs (153 icons)', 'apicona'),
				'maki'        => __('Maki (63 icons)', 'apicona'),
				'zocial'      => __('Zocial (103 icons)', 'apicona'),
				'brandico'    => __('Brandico (45 icons)', 'apicona'),
				'elusive'     => __('Elusive (271 icons)', 'apicona'),
				'websymbols'  => __('Web Symbols (85 icons)', 'apicona'),
				'twemojiawesome' => __('Twemoji Awesome (870+ SVG icons)', 'apicona'),
			),
			
			//See how std has changed? you also don't need to specify opts that are 0.
			'default'   => array(
				'fontawesome' => '1',
				'lineicons'   => '0',
				'entypo'      => '0',
				'typicons'    => '0',
				'iconic'      => '0',
				'mpictograms' => '0',
				'meteocons'   => '0',
				'mfglabs'     => '0',
				'maki'        => '0',
				'zocial'      => '0',
				'brandico'    => '0',
				'elusive'     => '0',
				'websymbols'  => '0',
			)
		),
		// One Page site
		array(
			'id'    =>'html-onepagesite',
			'type'  => 'info',
			'title' => __('One Page website', 'apicona'), 
			'desc'  => __('Options for One Page website.', 'apicona'),
        ),
		array(
			'id'       => 'one_page_site',
			'type'     => 'switch',
			'title'    => __('One Page Site', 'apicona'), 
			'subtitle' => __('Set this option <code>YES</code> if your site is one page website.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('one_page_site'), // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
		),
		
	),
);



// Favicon Settings
$sections[] = array(
	'title'  => __('Favicon Settings', 'apicona'),
	'header' => __('Favicon Settings', 'apicona'),
	'customizer'=> false,
	'desc'   => __('Set all Favicon icons. Upload different Favicons for different type of devices. (Click here to <a href="http://en.wikipedia.org/wiki/Favicon" target="_blank"> know more about Favicon</a>). Also you can generate favicon from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site.', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-bookmark',
	'fields' => array(
		array(
			'id'     => 'thememount-favicon-desc',
			'type'   => 'info',
			'style'  => 'success',
			'notice' => true,
			'title'  => __('TIP:', 'apicona'),
			'desc'   => __('You can generate Favicon easily.  Just create a new PNG image with size <strong>260x260 pixel</strong> and upload on <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site. This site will create all required images and you just need to upload each image in each below options.', 'apicona')
		),
		array(
			'id'       => 'favicon',
			'type'     => 'media',
			'url'      => false,
			'customizer'=> false,
			'title'    => __('Favicon image (favicon.ico icon file)', 'apicona'),
			'subtitle' => __('Select or upload <strong>favicon.ico</strong> with size 48x48 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site.', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_16',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image (16x16 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 16x16 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_32',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image (32x32 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 32x32 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_96',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image (96x96 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 96x96 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_160',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image (160x160 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 160x160 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_192',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image (192x192 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 192x192 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		
		array(
			'id'    =>'html-favicon',
			'type'  => 'info',
			'title' => __('Favicon icons for Apple devices', 'apicona'), 
			'desc'  => __('Upload different Favicons for different type of devices. (Click here to <a href="http://en.wikipedia.org/wiki/Favicon" target="_blank"> know more about Favicon</a>). Also you can generate favicon from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site.', 'apicona'),
        ),
		array(
			'id'       => 'favicon_57',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (57x57 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 57x57 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_60',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (60x60 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 60x60 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_72',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (72x72 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 72x72 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_76',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (76x76 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 76x76 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_114',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (114x114 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 114x114 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_120',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (120x120 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 120x120 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_144',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (144x144 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 144x144 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_152',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (152x152 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 152x152 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_180',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for Apple devices (180x180 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 180x180 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site', 'apicona'),
			'compiler' => 'true',
		),
		
		array(
			'id'    =>'html-favicon3',
			'type'  => 'info',
			'title' => __('Favicon image and color for Microsoft Tile link (for Microsoft Devices)', 'apicona'), 
			'desc'  => __('Upload different Favicons for different type of devices. (<a href="http://www.buildmypinnedsite.com/en" target="_blank">Click here to know more about Favicon for Microsoft devices</a>).', 'apicona'),
        ),
		array(
			'id'       => 'favicon_ms_tile_color',
			'type'     => 'color',
			'url'      => false,
			'title'    => __('Favicon Background Color for the MS App Tile link', 'apicona'),
			'subtitle' => __('Select background color for Favicon Tile App link.', 'apicona'),
			'compiler' => 'true',
			'default' => thememount_get_themeoptions_default_value('favicon_ms_tile_color'),
		),
		array(
			'id'       => 'favicon_ms_144',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for MicroSoft App link (144x144 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 144x144 pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site.', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_ms_70',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for MicroSoft App link (70x70 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 70x70 or 128x128 (if with transparent border) pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site.', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_ms_150',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for MicroSoft App link (150x150 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 150x150 or 170x270 (if with transparent border) pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site.', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_ms_310_150',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for MicroSoft App link (310x150 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 310x150 or 558x270 (if with transparent border) pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site.', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'       => 'favicon_ms_310',
			'type'     => 'media',
			'url'      => false,
			'title'    => __('Favicon Image for MicroSoft App link (310x310 PNG image)', 'apicona'),
			'subtitle' => __('Select or upload Favicon image with size 310x310 or 558x558 (if with transparent border) pixel. You can generate Favicon image from <a href="http://realfavicongenerator.net/" target="_blank">http://realfavicongenerator.net/</a> site.', 'apicona'),
			'compiler' => 'true',
		),
	),
);








// Font Settings
$sections[] = array(
	'title'  => __('Font Settings', 'apicona'),
	'header' => __('Font Settings', 'apicona'),
	'customizer'=> false,
	'desc'   => __('Set different font style', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-text-height',
	'fields' => array(
		array(
			'id'    =>'html-font-generalele',
			'type'  => 'info',
			'title' => __('General Element Fonts', 'apicona'), 
			'desc'  => __('Select Font for general elements.', 'apicona'),
        ),
		array(
			'id'          => 'general_font',
			'type'        => 'typography', 
			'title'       => __('General Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'output'      => array('body'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select General font, color and size', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('general_font'),
		),
		array(
			'id'       => 'link-color',
			'type'     => 'link_color',
			'title'    => __( 'Links Color Option', 'apicona' ),
			'subtitle' => __( 'Links color option. This can be applied to &lt;a&gt; tag only.', 'apicona' ).'<br>',
			'desc'     => __( 'By default, the "Regular" color is Global Font color, the "Hover" color is skin color', 'apicona' ),
			'active'    => false, // Disable Active Color
			'default'  => thememount_get_themeoptions_default_value('link-color'),
			'output'   => array('a'),
		),
		array(
			'id'             => 'h1_heading_font',
			'type'           => 'typography', 
			'title'          => __('H1 Heading Font', 'apicona'),
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'         => array('h1'), // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'subtitle'       => __('Select font family, size etc. for H1 heading tag.', 'apicona'),
			'default'        => thememount_get_themeoptions_default_value('h1_heading_font'),
		),
		array(
			'id'          => 'h2_heading_font',
			'type'        => 'typography', 
			'title'       => __('H2 Heading Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'      => array('h2'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for H2 heading tag.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('h2_heading_font'),
		),
		array(
			'id'          => 'h3_heading_font',
			'type'        => 'typography', 
			'title'       => __('H3 Heading Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'      => array('h3'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for H3 heading tag.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('h3_heading_font'),
		),
		array(
			'id'          => 'h4_heading_font',
			'type'        => 'typography', 
			'title'       => __('H4 Heading Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'      => array('h4'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for H4 heading tag.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('h4_heading_font'),
		),
		array(
			'id'          => 'h5_heading_font',
			'type'        => 'typography', 
			'title'       => __('H5 Heading Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'      => array('h5'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for H5 heading tag.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('h5_heading_font'),
		),
		
		array(
			'id'          => 'h6_heading_font',
			'type'        => 'typography', 
			'title'       => __('H6 Heading Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'      => array('h6'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for H6 heading tag.', 'apicona'),
			'default'     =>  thememount_get_themeoptions_default_value('h6_heading_font'),
		),
		
		
		array(
			'id'    =>'html-font-specificele',
			'type'  => 'info',
			'title' => __('Heading and Subheading Font Settings', 'apicona'), 
			'desc'  => __('Select font settings for Heading and subheading of different title elements like Blog Box, Portfolio Box etc.', 'apicona'),
        ),
		array(
			'id'          => 'heading_font',
			'type'        => 'typography', 
			'title'       => __('Heading Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'      => array('.tm-element-heading-wrapper h2'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for heading title', 'apicona'),
			'default'=> thememount_get_themeoptions_default_value('heading_font'),
		),
		array(
			'id'          => 'subheading_font',
			'type'        => 'typography', 
			'title'       => __('Subheading Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'      => array('.tm-element-heading-wrapper h4'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for sub-heading title', 'apicona'),
			'default'=> thememount_get_themeoptions_default_value('subheading_font'),
		),
		array(
			'id'    =>'html-font-specificele',
			'type'  => 'info',
			'title' => __('Specific Element Fonts', 'apicona'), 
			'desc'  => __('Select Font for specific elements.', 'apicona'),
        ),
		array(
			'id'          => 'widget_font',
			'type'        => 'typography', 
			'title'       => __('Widget Title Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'output'      => array('body .widget .widget-title, body .widget .widgettitle, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for widget title', 'apicona'),
			'default'=> thememount_get_themeoptions_default_value('widget_font'),
		),
		array(
			'id'          => 'button_font',
			'type'        => 'typography', 
			'title'       => __('Button Font', 'apicona'),
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'text-align'  => false,
			'font-size'   => false,
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'       => false,
			'output'      => array('.woocommerce button.button, .woocommerce-page button.button, input, .vc_btn, .vc_btn3, .woocommerce-page a.button, .button, .wpb_button, button, .woocommerce input.button, .woocommerce-page input.button, .tp-button.big, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .thememount-post-readmore a'), // An array of CSS selectors
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('This fonts will be applied to all buttons in this site', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('button_font'),
		),
		array(
			'id'		  => 'elementtitle',
			'type'		  => 'typography', 
			'title'		  => __('Element Title Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			//'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'font-size'   => false,
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'      => false,
			'output'     => array('.wpb_tabs_nav a.ui-tabs-anchor, body .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a, .vc_progress_bar .vc_label, .vc_tta.vc_general .vc_tta-tab > a'), // An array of CSS selectors to apply this font style to dynamically
			'units'      => 'px', // Defaults to px
			'subtitle'   => __('This will be applied to Tab title, Accordion Title and Progress Bar title text.', 'apicona'),
			'default'    => thememount_get_themeoptions_default_value('elementtitle'),
		),
	),
);


$team_type_title = ( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' ) ? __($apicona['team_type_title'], 'apicona') : __('Team Members','apicona');


/*
$show_team_form_title    = __('Show "Team Members" Search form', 'apicona');
$show_team_form_subtitle = __('Show or hide "Team Members" Search form', 'apicona');
if( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' ){
	$show_team_form_title    = __('Show "'. trim($apicona['team_type_title']) .'" Search form', 'apicona');
	$show_team_form_subtitle = __('Show or hide "'. trim($apicona['team_type_title']) .'" Search form', 'apicona');
}
*/


// Floating Bar Settings
$sections[] = array(
	'title'      => __('Floating Bar Settings', 'apicona'),
	'header'     => __('Floating Bar Settings', 'apicona'),
	'desc'       => __('This is settings page for Header Floating Bar.', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'       => 'el-icon-upload',
	'fields' => array(
		array(
			'id'       => 'fbar_show',
			'type'     => 'switch',
			'title'    => __('Show Floating Bar', 'apicona'), 
			'subtitle' => __('Show or hide Floating Bar', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('fbar_show'), // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
		),
		
		
		/*
		array(
			'id'       => 'fbar_text_before_team_search_form',
			'type'     => 'textarea',
			'title'    => sprintf( __('Text above "%s" search form', 'apicona'), $team_type_title ),
			'subtitle' => sprintf( __('This text will be shown above the "%s" search form', 'apicona'), $team_type_title ),
			'default'  => 'This is test', // 1 = on | 0 = off
			'required' => array('fbar_show','equals','1'),
		),*/
		
		array(
			'id'       => 'fbar_position',
			'type'     => 'radio',
			'title'    => __('Floating bar position', 'apicona'),
			'subtitle' => __('Position for Floating bar', 'apicona'),
			'options'  => array(
				'default' => __('Top (default)','apicona'),
				'right'   => __('Right', 'apicona').'</small>',
			),
			'default'  => thememount_get_themeoptions_default_value('fbar_position'), // 1 = on | 0 = off
			'required' => array('fbar_show','equals','1'),
		),
		array(
			'id'       => 'fbar_bg_color',
			'type'     => 'select',
			'title'    => __('Floating Bar Background Color', 'apicona'), 
			'subtitle' => __('Select predefined color for Floating Bar background color.', 'apicona'),
			'required' => array('fbar_show','equals','1'),
			'options'  => array(
					'darkgrey'   => __('Dark grey', 'apicona'),
					'grey'       => __('Grey', 'apicona'),
					'white'      => __('White', 'apicona'),
					'skincolor'  => __('Skincolor', 'apicona'),
					'custom'     => __('Custom Color', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('fbar_bg_color'),
		),
		array(
			'id'       => 'fbar_bg_custom_color',
			'type'     => 'color_rgba',
			'title'    => __('Floating Bar Custom Background Color', 'apicona'),
			'subtitle' => __('Custom background color for Floating Bar.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('fbar_bg_custom_color'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('fbar_bg_color','equals','custom'),
				),
		),
		array(
			'id'       => 'fbar_text_color',
			'type'     => 'select',
			'title'    => __('Floating Bar Text Color', 'apicona'), 
			'subtitle' => __('Select <code>Dark</code> color if you are going to select light color in above option.', 'apicona'),
			'required' => array('fbar_show','equals','1'),
			'options'  => array(
					'white'  => __('White', 'apicona'),
					'dark'   => __('Dark', 'apicona'),
					'custom' => __('Custom color', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('fbar_text_color'),
		),
		array(
			'id'       => 'fbar_text_custom_color',
			'type'     => 'color',
			'title'    => __('Floating Bar Custom Color for text', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('fbar_text_custom_color'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('fbar_text_color','equals','custom'),
				),
			'validate' => 'color',
		),
		array(
			'id'               => 'fbar_background',
			'type'             => 'background',
			'title'            => __('Floating Bar Background Properties', 'apicona'),
			'subtitle'         => __('Set background for Floating bar. You can set color or image and also set other background related properties.', 'apicona'),
			'preview_media'    => true,
			'background-color' => false,
			'output'           => array('div.thememount-fbar-box-w'),
			'required'         => array('fbar_show','equals','1'),
			'default'          => thememount_get_themeoptions_default_value('fbar_background'),
		),
		// Team Search From
		array(
			'id'    =>'html-fbar-texts',
			'type'  => 'info',
			'title' => __('Texts for the Floating Bar Form', 'apicona'), 
			'desc'  => __('Edit texts for the Floating Bar form.', 'apicona'),
			'required' => array('fbar_show','equals','1'),
		),
		array(
			'id'       => 'topbar_show_team_search',
			'type'     => 'switch',
			'title'    => sprintf( __('Show "%s" Search form', 'apicona'), $team_type_title ),
			'subtitle' => sprintf( __('Show or hide "%s" Search form', 'apicona'), $team_type_title ),
			'default'  => '1', // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'required' => array('fbar_show','equals','1'),
		),
		array(
			'id'       => 'fbar-form-title',
			'type'     => 'text',
			'title'    => __('Search Form Title', 'apicona'),
			'subtitle' => __('Insert Search Form title. <br> Default is <code>Doctor\'s Search</code>', 'apicona'),
			'default'  => __('Doctor\'s Search', 'apicona'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('topbar_show_team_search','equals','1'),
			),
		),
		array(
			'id'       => 'fbar-form-desc',
			'type'     => 'text',
			'title'    => __('Search Form Description', 'apicona'),
			'subtitle' => __('Insert Search Form description. <br> Default is <code>Search Team Members by name and also by section</code>', 'apicona'),
			'default'  => __('Search Team Members by name and also by section', 'apicona'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('topbar_show_team_search','equals','1'),
			),
		),
		array(
			'id'       => 'fbar-form-input-text',
			'type'     => 'text',
			'title'    => __('Text for Form Input field', 'apicona'),
			'subtitle' => __('Insert Search Form input text. <br> Default is <code>Search by name</code>', 'apicona'),
			'default'  => __('Search by name', 'apicona'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('topbar_show_team_search','equals','1'),
			),
		),
		array(
			'id'       => 'fbar-form-select-group',
			'type'     => 'text',
			'title'    => __('Text for Select Section', 'apicona'),
			'subtitle' => __('Insert Search Form input text. <br> Default is <code>All sections</code>', 'apicona'),
			'default'  => __('All sections', 'apicona'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('topbar_show_team_search','equals','1'),
			),
		),
		array(
			'id'       => 'fbar-form-btn-text',
			'type'     => 'text',
			'title'    => __('Insert form button text', 'apicona'),
			'subtitle' => __('Insert form button text. <br> Default is <code>Search</code>', 'apicona'),
			'default'  => __('Search', 'apicona'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('topbar_show_team_search','equals','1'),
			),
		),
		array(
			'id'    =>'html-fbar-button',
			'type'  => 'info',
			'title' => __('Floating Bar Open/Close Button', 'apicona'), 
			'required' => array('fbar_show','equals','1'),
			'desc'  => __('Settings for Floating Bar Open/Close Button', 'apicona'),
        ),
		array(
			'id'       => 'topbar_handler_icon',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('Open Link Icon', 'apicona'), 
			'subtitle' => __('Select icon for the link to open the Header Floating Bar.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('topbar_handler_icon'),
			'required' => array('fbar_show','equals','1'),
		),
		array(
			'id'       => 'topbar_handler_icon_close',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('Close Link Icon', 'apicona'), 
			'subtitle' => __('Select icon for the link to close the Header Floating Bar', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('topbar_handler_icon_close'),
			'required' => array('fbar_show','equals','1'),
		),
		array(
			'id'       => 'fbar_btn_bg_color',
			'type'     => 'select',
			'title'    => __('Floating Bar Open/Close Button Background Color', 'apicona'), 
			'subtitle' => __('Select predefined color for Floating Bar Open/Close button background color.', 'apicona'),
			'required' => array('fbar_show','equals','1'),
			'options'  => array(
					'darkgrey'   => __('Dark grey', 'apicona'),
					'grey'       => __('Grey', 'apicona'),
					'white'      => __('White', 'apicona'),
					'skincolor'  => __('Skincolor', 'apicona'),
					'custom'     => __('Custom Color', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('fbar_btn_bg_color'),
		),
		array(
			'id'       => 'fbar_btn_bg_custom_color',
			'type'     => 'color',
			'title'    => __('Floating Bar Open/Close Button Custom Background Color', 'apicona'),
			'subtitle' => __('Custom background color for Open/Close Button Floating Bar.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('fbar_btn_bg_custom_color'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('fbar_btn_bg_color','equals','custom'),
				),
		),
		array(
			'id'       => 'fbar_icon_color',
			'type'     => 'select',
			'title'    => __('Floating Bar Open/Close Icon Color', 'apicona'), 
			'subtitle' => __('Select <code>Dark</code> color if you are going to select light color in above option.', 'apicona'),
			'required' => array('fbar_show','equals','1'),
			'options'  => array(
					'white'     => __('White', 'apicona'),
					'dark'      => __('Dark', 'apicona'),
					'skincolor' => __('Skin Color', 'apicona'),
					'custom'    => __('Custom color', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('fbar_icon_color'),
		),
		array(
			'id'       => 'fbar_icon_custom_color',
			'type'     => 'color',
			'title'    => __('Floating Bar Custom Color for Open/Close Icon', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('fbar_icon_custom_color'),
			'required' => array(
							array('fbar_show','equals','1'),
							array('fbar_icon_color','equals','custom'),
				),
			'validate' => 'color',
		),
		array(
			'id'    =>'html-floatingbar-responsive',
			'type'  => 'info',
			'title' => __('Hide Floating Bar in Small Devices', 'apicona'), 
			'required' => array('fbar_show','equals','1'),
			'desc'  => __('Hide Floating Bar in small devices like mobile, tablet etc.', 'apicona'),
        ),
		array(
			'id'       => 'floatingbar_breakpoint',
			'type'     => 'radio',
			'title'    => __('Show/Hide Floating Bar in Responsive Mode', 'apicona'), 
			'subtitle' => __('Change options for responsive behaviour of Floating Bar.', 'apicona'),
			'options'  => array(
				'all'      => __('Show in all devices','apicona'),
				'1200'     => __('Show only on large devices','apicona').'<small>'.__('show only on desktops (>1200px)', 'apicona').'</small>',
				'992'      => __('Show only on medium and large devices','apicona').'<small>'.__('show only on desktops and Tablets (>992px)', 'apicona').'</small>',
				'768'      => __('Show on some small, medium and large devices','apicona').'<small>'.__('show only on mobile and Tablets (>768px)', 'apicona').'</small>',
				'custom'   => __('Custom (select pixel below)', 'apicona'),
			),
			'required'      => array('fbar_show','equals','1'),
			'default'  => thememount_get_themeoptions_default_value('floatingbar_breakpoint'),
		),
		array(
			'id'            => 'floatingbar_breakpoint_custom',
			'type'          => 'slider',
			'title'         => __( 'Custom screen size to hide Floating Bar (in pixel)', 'apicona' ),
			'subtitle'      => __( 'Select after how many pixels the Floating Bar will be hidden.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('floatingbar_breakpoint_custom'),
			'min'           => 1,
			'step'          => 1,
			'max'           => 1200,
			'display_value' => 'text',
			'required' 		=> array(
									array('fbar_show','equals','1'),
									array('floatingbar_breakpoint','equals','custom'),
								),
			
		),
		
		
	),
);


// Topbar Settings
$sections[] = array(
	'title'  => __('Topbar Settings', 'apicona'),
	'header' => __('Topbar Settings', 'apicona'),
	'desc'   => __('Topbar settings', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-tasks',
	'fields' => array(
		array(
			'id'       => 'topbarhide',
			'type'     => 'switch',
			'title'    => __('Hide Topbar', 'apicona'), 
			'subtitle' => __('Select YES to hide the Topbar', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('topbarhide'), // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
		),
		array(
			'id'       => 'topbarbgcolor',
			'type'     => 'select',
			'title'    => __('Topbar Background Color', 'apicona'), 
			'subtitle' => __('Select predefined color for Topbar background color.', 'apicona'),
			'required' => array('topbarhide','equals','0'),
			'options'  => array(
					'darkgrey'   => __('Dark grey', 'apicona'),
					'grey'       => __('Grey', 'apicona'),
					'white'      => __('White', 'apicona'),
					'skincolor'  => __('Skincolor', 'apicona'),
					'custom'     => __('Custom Color', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('topbarbgcolor'),
		),
		array(
			'id'       => 'topbarbgcustomcolor',
			'type'     => 'color',
			'title'    => __('Topbar Custom Background Color', 'apicona'),
			'subtitle' => __('Custom background color for Topbar.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('topbarbgcustomcolor'),
			'required' => array(
							array('topbarhide','equals','0'),
							array('topbarbgcolor','equals','custom'),
				),
			'validate' => 'color',
		),
		array(
			'id'       => 'topbar_text_color',
			'type'     => 'select',
			'title'    => __('Topbar Text Color', 'apicona'), 
			'subtitle' => __('Select <code>Dark</code> color if you are going to select light color in above option.', 'apicona'),
			'required' => array('topbarhide','equals','0'),
			'options'  => array(
					'white'  => __('White', 'apicona'),
					'dark'   => __('Dark', 'apicona'),
					'custom' => __('Custom color', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('topbar_text_color'),
		),
		array(
			'id'       => 'topbartextcustomcolor',
			'type'     => 'color',
			'title'    => __('Topbar Custom Color for text', 'apicona'),
			//'subtitle' => __('Custom background color for Topbar.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('topbartextcustomcolor'),
			'required' => array(
							array('topbarhide','equals','0'),
							array('topbar_text_color','equals','custom'),
				),
			'validate' => 'color',
		),
		array(
			'id'    =>'html-topbarleft',
			'type'  => 'info',
			'title' => __('Topbar Content Options', 'apicona'), 
			'required' => array('topbarhide','equals','0'),
			'desc'  => __('Content for Topbar.', 'apicona'),
        ),
		array(
			'id'       => 'topbartext',
			'type'     => 'textarea',
			'title'    => __('Topbar Left Content', 'apicona'), 
			'subtitle' => __('This content will appear on Left side of Topbar area.', 'apicona'),
			'desc'     => __('HTML tags and shortcodes are allowed.', 'apicona') . sprintf( __('%s Click here to know more %s about shortcode description.','apicona') , '<a href="http://apicona-advanced.thememount.com/documentation/shortcodes.html" target="_blank">' , '</a>'  ),
			'required' => array('topbarhide','equals','0'),
			'validate' => 'html',
			'default'  => thememount_get_themeoptions_default_value('topbartext'),
		),
		array(
			'id'       => 'topbarrighttext',
			'type'     => 'textarea',
			'title'    => __('Topbar Right Content', 'apicona'), 
			'subtitle' => __('This content will appear on Right side of Topbar area.', 'apicona'),
			'desc'     => __('HTML tags and shortcodes are allowed.', 'apicona') . sprintf( __('%s Click here to know more %s about shortcode description.','apicona') , '<a href="http://apicona-advanced.thememount.com/documentation/shortcodes.html" target="_blank">' , '</a>'  ),
			'required' => array('topbarhide','equals','0'),
			'default'  => thememount_get_themeoptions_default_value('topbarrighttext'),
		),
		
		array(
			'id'    =>'html-topbar-responsive',
			'type'  => 'info',
			'title' => __('Hide Topbar in Small Devices', 'apicona'), 
			'required' => array('topbarhide','equals','0'),
			'desc'  => __('Hide Topbar in small devices like mobile, tablet etc.', 'apicona'),
        ),
		
		array(
			'id'       => 'topbar_breakpoint',
			'type'     => 'radio',
			'title'    => __('Show/Hide Topbar in Responsive Mode', 'apicona'), 
			'subtitle' => __('Change options for responsive behaviour of Topbar.', 'apicona'),
			'options'  => array(
				'all'      => __('Show in all devices','apicona'),
				'1200'     => __('Show only on large devices','apicona').'<small>'.__('show only on desktops (>1200px)', 'apicona').'</small>',
				'992'      => __('Show only on medium and large devices','apicona').'<small>'.__('show only on desktops and Tablets (>992px)', 'apicona').'</small>',
				'768'      => __('Show on some small, medium and large devices','apicona').'<small>'.__('show only on mobile and Tablets (>768px)', 'apicona').'</small>',
				'custom'   => __('Custom (select pixel below)', 'apicona'),
			),
			'required'      => array('topbarhide','equals','0'),
			'default'  => thememount_get_themeoptions_default_value('topbar_breakpoint'),
		),
		array(
			'id'            => 'topbar_breakpoint_custom',
			'type'          => 'slider',
			'title'         => __( 'Custom screen size to hide Topbar (in pixel)', 'apicona' ),
			'subtitle'      => __( 'Select after how many pixels the Topbar will be hidden.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('topbar_breakpoint_custom'),
			'min'           => 1,
			'step'          => 1,
			'max'           => 1200,
			'display_value' => 'text',
			'required' 		=> array(
									array('topbarhide','equals','0'),
									array('topbar_breakpoint','equals','custom'),
								),
			
		),
		
        ),
	
);


// Titlebar Settings
$sections[] = array(
	'title'  => __('Titlebar Settings', 'apicona'),
	'header' => __('Titlebar Settings', 'apicona'),
	'desc'   => __('Settings for titlebar', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-lines',
	'fields' => array(
	
	
		array(
			'id'       => 'titlebar_bg_color',
			'type'     => 'select',
			'title'    => __('Titlebar Background Color', 'apicona'), 
			'subtitle' => __('Select predefined color for Titlebar background color.', 'apicona'),
			'options'  => array(
					'darkgrey'   => __('Dark grey', 'apicona'),
					'grey'       => __('Grey', 'apicona'),
					'white'      => __('White', 'apicona'),
					'skincolor'  => __('Skincolor', 'apicona'),
					'custom'     => __('Custom Color', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('titlebar_bg_color'),
		),
		array(
			'id'       => 'titlebar_bg_custom_color',
			'type'     => 'color_rgba',
			'title'    => __('Titlebar Background Color', 'apicona'),
			'subtitle' => __('Custom color for titlebar background.', 'apicona'),
			'required'      => array('titlebar_bg_color','equals', 'custom' ),
			'default'  => thememount_get_themeoptions_default_value('titlebar_bg_custom_color'),
		),
		array(
			'id'               => 'titlebar_background',
			'type'             => 'background',
			'title'            => __('Title Bar Background Properties', 'apicona'),
			'subtitle'         => __('Set background for Title bar. You can set color or image and also set other background related properties.', 'apicona'),
			'preview_media'    => true,
			'background-color' => false,
			'output'           => array('div.tm-titlebar-wrapper'),
			'default'          => thememount_get_themeoptions_default_value('titlebar_background'),
		),
		array(
			'id'    =>'html-titlebarfont',
			'type'  => 'info',
			'title' => __('Titlebar Font Settings', 'apicona'), 
			'desc'  => __('Font Settings for different elements in Titlebar area.', 'apicona'),
        ),
		array(
			'id'          => 'titlebar_heading_font',
			'type'        => 'typography', 
			'title'       => __('Heading Font', 'apicona'),
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'text-align'  => false,
			'font-size'   => true,
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'       => false,
			//'preview'   => false, // Disable the previewer
			'output'      => array('.tm-titlebar-main h1.entry-title'), // An array of CSS selectors
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for heading in Titlebar.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('titlebar_heading_font'),
		),
		array(
			'id'          => 'titlebar_subheading_font',
			'type'        => 'typography', 
			'title'       => __('Sub-heading Font', 'apicona'),
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'text-align'  => false,
			'font-size'   => true,
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'       => false,
			//'preview'   => false, // Disable the previewer
			'output'      => array('.tm-titlebar-main h3.tm-subtitle'), // An array of CSS selectors
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for sub-heading in Titlebar.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('titlebar_subheading_font'),
		),
		array(
			'id'          => 'titlebar_breadcrumb_font',
			'type'        => 'typography', 
			'title'       => __('Breadcrumb Font', 'apicona'),
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'text-align'  => false,
			'font-size'   => true,
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'       => false,
			'output'      => array('.tm-titlebar-wrapper .breadcrumb-wrapper, .breadcrumb-wrapper a'), // An array of CSS selectors
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font family, size etc. for breadcrumbs in Titlebar.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('titlebar_breadcrumb_font'),
		),

		array(
			'id'    =>'html-tbarcontent',
			'type'  => 'info',
			'title' => __('Titlebar Content Options', 'apicona'), 
			'desc'  => __('Content options for Titlebar area.', 'apicona'),
        ),
		array(
			'id'            => 'tbar-height',
			'type'          => 'slider',
			'title'         => __( 'Titlebar Height', 'apicona' ),
			'subtitle'      => __( 'Set height of the Titlebar.', 'apicona' ),
			'desc'          => __( 'Set height of the Titlebar.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('tbar-height'),
			'min'           => 100,
			'step'          => 1,
			'max'           => 600,
			'display_value' => 'text',
		),
		array(
			'id'       => 'titlebar_view',
			'type'     => 'select',
			'title'    => __('Titlebar Text Align', 'apicona'), 
			'subtitle' => __('Select text align in Titlebar.', 'apicona'),
			'options'  => array(
					'default'  => __('All Center (default)', 'apicona'),
					'left'     => __('Title Left / Breadcrumb Right', 'apicona'),
					'right'    => __('Title Right / Breadcrumb Left', 'apicona'),
					'allleft'  => __('All Left', 'apicona'),
					'allright' => __('All Right', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('titlebar_view'),
		),
		array(
			'id'       => 'titlebar_text_color',
			'type'     => 'select',
			'title'    => __('Titlebar Text Color', 'apicona'), 
			'subtitle' => __('Select <code>Dark</code> color if you are going to select light color in above option.', 'apicona'),
			'options'  => array(
					'white'  => __('White', 'apicona'),
					'dark'   => __('Dark', 'apicona'),
					'custom' => __('Custom Color', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('titlebar_text_color'),
		),
		array(
			'id'       => 'titlebar_text_custom_color',
			'type'     => 'color',
			'title'    => __('Titlebar Custom Color for text', 'apicona'),
			//'subtitle' => __('Custom background color for Topbar.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('titlebar_text_custom_color'),
			'required' => array(
							array('titlebar_text_color','equals','custom'),
				),
			'validate' => 'color',
		),
		array(
			'id'       => 'tbar_hide_bcrumb',
			'type'     => 'checkbox',
			'title'    => __( 'Hide Breadcrumb', 'apicona' ),
			'subtitle' => __( 'Check this box to hide breadcrumb globally', 'apicona' ),
			'desc'     => __( 'Check this box to hide breadcrumb globally', 'apicona' ),
			'default'  => thememount_get_themeoptions_default_value('tbar_hide_bcrumb'), // 1 = on | 0 = off
		),
		
		// Titlebar Options
		array(
			'id'    =>'html-adv_titlebaroptions',
			'type'  => 'info',
			'title' => __('Titlebar Options', 'apicona'), 
			'desc'  => __('Change settings for Titlebar.', 'apicona')
        ),
		array(
			'id'       => 'adv_tbar_catarc',
			'type'     => 'text',
			'title'    => __('Post Category <code>Category Archives:</code> Label Text', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('adv_tbar_catarc'), 'apicona'),
		),
		array(
			'id'       => 'adv_tbar_tagarc',
			'type'     => 'text',
			'title'    => __('Post Tag <code>Tag Archives:</code> Label Text', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('adv_tbar_tagarc'), 'apicona'),
		),
		array(
			'id'       => 'adv_tbar_postclassified',
			'type'     => 'text',
			'title'    => __('Post Taxonomy <code>Posts classified under:</code> Label Text', 'apicona'),
			//'subtitle' => __('Post Taxonomy <code>Posts classified under:</code> Label Text', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('adv_tbar_postclassified'), 'apicona'),
		),
		array(
			'id'       => 'adv_tbar_authorarc',
			'type'     => 'text',
			'title'    => __('Post Author <code>Author Archives:</code> Label Text', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('adv_tbar_authorarc'), 'apicona'),
		),
		
	),
);


// Header Settings
$sections[] = array(
	'title'  => __('Header Settings', 'apicona'),
	'header' => __('Header Settings', 'apicona'),
	'desc'   => __('Header settings', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-th-list',
	'fields' => array(
		array(
			'id'       => 'headerbgcolor',
			'type'     => 'color_rgba',
			'title'    => __('Header Background Color', 'apicona'),
			'subtitle' => __('Custom color for header background.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('headerbgcolor'),
		),
		array(
			'id'       => 'stickyheaderbgcolor',
			'type'     => 'color_rgba',
			'title'    => __('Sticky Header Background Color', 'apicona'),
			'subtitle' => __('Custom color for header background when becomes sticky.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('stickyheaderbgcolor'),
			'output'   => array('background-color' => 'body.thememount-header-style-3 .is-sticky #navbar'),
		),
		array(
			'id'       => 'logotype',
			'type'     => 'radio',
			'title'    => __('Logo type', 'apicona'), 
			'subtitle' => __('Specify the type of logo. It can Text or Image', 'apicona'),
			'options'  => array( 'text' => __('Logo as Text', 'apicona'), 'image' => __('Logo as Image', 'apicona') ),
			'default'  => thememount_get_themeoptions_default_value('logotype'),
		),
		array(
			'id'       => 'logotext',
			'type'     => 'text',
			'required' => array('logotype','equals','text'),
			'title'    => __('Logo Text', 'apicona'),
			'subtitle' => __('Enter the text to be used instead of the logo image', 'apicona'),
			'default'  => 'Apicona Advanced'
		),
		array(
			'id'          => 'logo_font',
			'type'        => 'typography', 
			'required'    => array('logotype','equals','text'),
			'title'       => __('Logo Font', 'apicona'),
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'text-align'  => false,
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'  => false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height' => false,
			'color'       => true,
			'output'      => array('.site-title a'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('This will be applied to logo text only. Select Logo font-style and size', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('logo_font'),
		),
		array(
			'id'       => 'logoimg',
			'type'     => 'media',
			'required' => array('logotype','equals','image'),
			'url'      => false,
			'title'    => __('Logo Image', 'apicona'),
			'subtitle' => __('Upload image that will be used as logo for the site ', 'apicona') . __('<strong>NOTE:</strong>Upload image that will be used as logo for the site', 'apicona'),
			'compiler' => 'true',
			'default'  => thememount_get_themeoptions_default_value('logoimg'),
		),
		array(
			'id'       => 'logoimg_sticky',
			'type'     => 'media',
			'required' => array('logotype','equals','image'),
			'url'      => false,
			'title'    => __('Logo Image for Sticky Header', 'apicona'),
			'subtitle' => __('Upload image that will be used as logo for sticky header', 'apicona'),
			'compiler' => 'true',
		),
		array(
			'id'            => 'logo-max-height',
			'type'          => 'slider',
			'title'         => __( 'Logo Max Height', 'apicona' ),
			'subtitle'      => __( 'If you feel your logo looks small than increase this and adjust it.', 'apicona' ),
			'desc'          => __( 'If you feel your logo looks small than increase this and adjust it.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('logo-max-height'),
			'min'           => 30,
			'step'          => 1,
			'max'           => 190,
			'display_value' => 'text',
			'required'      => array('logotype','equals','image'),
		),
		array(
			'id'            => 'logo-max-height-sticky',
			'type'          => 'slider',
			'title'         => __( 'Logo Max Height when Sticky Header', 'apicona' ),
			'subtitle'      => __( 'Set logo when the header is sticky.', 'apicona' ),
			'desc'          => __( 'Set logo when the header is sticky.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('logo-max-height-sticky'),
			'min'           => 10,
			'step'          => 1,
			'max'           => 190,
			'display_value' => 'text',
			'required'      => array('logotype','equals','image'),
		),
		array(
			'id'            => 'header-height',
			'type'          => 'slider',
			'title'         => __( 'Header Height (in pixel)', 'apicona' ),
			'subtitle'      => __( 'You can set height of header area from here', 'apicona' ),
			'desc'          => __( 'You can set height of header area from here', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('header-height'),
			'min'           => 60,
			'step'          => 1,
			'max'           => 200,
			'display_value' => 'text',
			//'required'      => array( 'headerstyle', 'equals', array('1','2') ),
		),
		array(
			'id'            => 'header-height-sticky',
			'type'          => 'slider',
			'title'         => __( 'Sticky Header Height (in pixel)', 'apicona' ),
			'subtitle'      => __( 'You can set height of header area when it becomes sticky', 'apicona' ),
			'desc'          => __( 'You can set height of header area when it becomes sticky', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('header-height-sticky'),
			'min'           => 60,
			'step'          => 1,
			'max'           => 160,
			'display_value' => 'text',
		),
		array(
			'id'    =>'html-showsearchbtn',
			'type'  => 'info',
			'title' => __('Search Button in Header', 'apicona'), 
			'desc'  => __('Option to show or hide search button in header area.', 'apicona'),
        ),
		array(
			'id'       => 'header_search',
			'type'     => 'switch',
			'title'    => __('Show Search Button', 'apicona'), 
			'subtitle' => __('Set this option <code>YES</code> to show search button in header. The icon will be at the right side (after menu).', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('header_search'), // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
		),
		array(
			'id'       => 'search_input',
			'type'     => 'text',
			'title'    => __('Search Form Input Word', 'apicona'),
			'subtitle' => __('Write the search form input word here. <br> Default: <code>WRITE SEARCH WORD...</code>', 'apicona'),
			'default'  => __("WRITE SEARCH WORD...", 'apicona'),
			'required' => array('header_search','equals','1'),
		),
		array(
			'id'    =>'html-stickyheader',
			'type'  => 'info',
			'title' => __('Sticky Header', 'apicona'), 
			'desc'  => __('Options for sticky header', 'apicona')
        ),
		array(
			'id'       => 'stickyheader',
			'type'     => 'radio',
			//'customizer' => false,
			'title'    => __('Enable Sticky Header', 'apicona'), 
			'subtitle' => __('Select YES if you want the sticky header on page scroll', 'apicona'),
			'options'  => array( 'y' => __('Yes', 'apicona'), 'n' => __('No', 'apicona') ),
			'default'  => 'y'
		),
		array(
			'id'    =>'html-headerstyle',
			'type'  => 'info',
			'title' => __('Header Style', 'apicona'), 
			'desc'  => __('Options to change header style', 'apicona')
        ),
		array(
			'id'       => 'headerstyle',
			'type'     => 'image_select',
			'title'    => __('Select Header Style', 'apicona'), 
			'subtitle' => __('Please select header style', 'apicona'),
			'options' => array(
				'14' => array(
					'alt' => __('Classic header with logo highlight', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/classic-highlight.png'
				),
				'15' => array(
					'alt' => __('Classic header with logo highlight (RTL)', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/classic-highlight-rtl.png'
				),
				'1' => array(
					'alt' => __('Left logo and right menu', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/classic.png'
				),
				'9' => array(
					'alt' => __('Left menu and right logo', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/classic-rtl.png'
				),
				'2' => array(
					'alt' => __('Centre logo between menu', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/split.png'
				),
				'3' => array(
					'alt' => __('Centre logo above menu', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/info-stack.png'
				),
				'4' => array(
					'alt' => __('Logo and Menu overlay on slider and Titlebar', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/classic-overlay.png'
				),
				'10' => array(
					'alt' => __('Logo and Menu overlay on slider and Titlebar (Right logo)', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/classic-overlay-rtl.png'
				),
				'5' => array(
					'alt' => __('Logo and Menu overlay on slider and Titlebar', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/split-overlay.png'
				),
				'6' => array(
					'alt' => __('Logo and Menu overlay on slider and Titlebar', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/stack-center.png'
				),
				'13' => array(
					'alt' => __('Logo and Menu overlay on slider and Titlebar. normal view', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/stack-center-overlay.png'
				),
				'7' => array(
					'alt' => __('Boxed Header overlay on slider and Titlebar (Left logo)', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/elegant.png'
				),
				'8' => array(
					'alt' => __('Boxed Header overlay on slider and Titlebar (Right Logo)', 'apicona'),
					'img' => get_template_directory_uri() . '/inc/images/elegant-rtl.png'
				),
				
			),
			'default' => thememount_get_themeoptions_default_value('headerstyle'),
		),
		array(
			'id'            => 'center-logo-width',
			'type'          => 'slider',
			'title'         => __( 'Logo Area Width (pixel)', 'apicona' ),
			'subtitle'      => __( 'This is the width of the logo area. This is for centre-logo header style only.', 'apicona' ),
			'desc'          => __( 'You need to change this only when your menu overlays on the logo. This should be bigger that the logo width (ignore this if retina logo). Please set this and check your site for best results.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('center-logo-width'),
			'min'           => 10,
			'step'          => 5,
			'max'           => 500,
			'display_value' => 'text',
			'required'      => array( 'headerstyle', 'equals', array('2','5') ),
		),
		array(
			'id'            => 'first-menu-margin',
			'type'          => 'slider',
			'title'         => __( 'Menu Left margin (pixel)', 'apicona' ),
			'subtitle'      => __( 'This is to set the logo appear at center with the menu. The logo will be always center. This is an advanced option.', 'apicona' ),
			'desc'          => __( 'You need to change this only when you feel your menu is not center aligned with logo. Please set this and check your site for best results.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('first-menu-margin'),
			'min'           => -500,
			'step'          => 5,
			'max'           => 500,
			'display_value' => 'text',
			'required'      => array('headerstyle', 'equals', array('2','5') ),
		),
		// Custom bg color for header style 3, 6 
		array(
			'id'       => 'menubgcolor',
			'type'     => 'color',
			'title'    => __('Menu Background Color', 'apicona'),
			'subtitle' => __('Custom color for menu background. This option created specially for selected header only.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('menubgcolor'),
			'validate' => 'color',
			'required' => array('headerstyle','equals',array('3','6','13')),
			'output'   => array('background-color' => '.thememount-header-style-3 .tm-header-bottom-wrapper, body.thememount-header-style-3 .is-sticky #navbar, body.thememount-header-style-3 #navbar'),
		),
		//Advanced Header Settings
		array(
			'id'    	=>'adv_header_settings',
			'type' 		=> 'info',
			'title' 	=> __('Advanced Header Settings', 'apicona'), 
			'desc'  	=> __('Some advance setting for header area', 'apicona'),
			'required' 	=> array( 
							array('headerstyle','!=','2'), 
							array('headerstyle','!=','5'),
							array('headerstyle','!=','6'), 
							array('headerstyle','!=','15'), 
						),
        ),
		array(
			'id'       => 'header_right_content',
			'type'     => 'textarea',
			'title'    => __('Header Button Area', 'apicona'), 
			'subtitle' => __('This content will appear after Search/Cart icon in header area. This option will work for currently selected header style only', 'apicona'),
			'desc'     => __('HTML tags and shortcodes are allowed.', 'apicona') . sprintf( __('%s Click here to know more %s about shortcode description.','apicona') , '<a href="http://apicona-advanced.thememount.com/documentation/shortcodes.html" target="_blank">' , '</a>'  ) . 
			__('Here is the default code you can use for the <strong>Appointments</strong> button:
			<pre>[vc_btn title="APPOINTMENT" style="outline" color="black"]</pre>', 'apicona'),
			'validate' => 'html',
			'default'  => '',
			//'required' => array('headerstyle', 'equals', array('1','3','4','6','7','8','9','10',) ),
			'required' => array( 
							array('headerstyle','!=','2'), 
							array('headerstyle','!=','3'), 
							array('headerstyle','!=','5'),
							array('headerstyle','!=','6'), 
							array('headerstyle','!=','15'), 
						),
		),
		array(
			'id'       => 'header_three_content',
			'type'     => 'textarea',
			'title'    => __('Content for "Info Stack" Header', 'apicona'), 
			'subtitle' => __('This content will appear on Right side the LOGO, and will only work when "Info Stack" header is selected', 'apicona'),
			'desc'     => __('HTML tags and shortcodes are allowed.', 'apicona') . sprintf( __('%s Click here to know more %s about shortcode description.','apicona') , '<a href="http://apicona-advanced.thememount.com/documentation/shortcodes.html" target="_blank">' , '</a>'  ),
			'validate' => 'html',
			'required' => array('headerstyle', 'equals', array('3') ),
			'default'  => thememount_get_themeoptions_default_value('header_three_content'),
		),
		
		// SEO Settings
		array(
			'id'    =>'html-seosettings',
			'type'  => 'info',
			'title' => __('Logo SEO', 'apicona'), 
			'desc'  => __('Options for Logo SEO', 'apicona'),
        ),
		array(
			'id'       => 'logoseo',
			'type'     => 'radio',
			'title'    => __('Logo Tag for SEO', 'apicona'), 
			'subtitle' => __('Select logo tag for SEO purpose.', 'apicona'),
			'options'  => array(
				'h1homeonly' => __('H1 for home, SPAN on other pages', 'apicona'),
				'allh1'      => __('H1 tag everywhere', 'apicona'),
			),
			'default'  => 'h1homeonly',
		),
	),
);


// Menu Settings
$sections[] = array(
	'title'  => __('Menu Settings', 'apicona'),
	'header' => __('Menu Settings', 'apicona'),
	'desc'   => __('Menu settings', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-th-list',
	'fields' => array(
		// Responsive Menu Breakpoint
		array(
			'id'    =>'html-responsive_menu_breakpoint',
			'type'  => 'info',
			'title' => __('Responsive Menu Breakpoint', 'apicona'), 
			'desc'  => __('Change options for responsive menu breakpoint.', 'apicona')
        ),
		array(
			'id'       => 'menu_breakpoint',
			'type'     => 'radio',
			'title'    => __('Responsive Menu Breakpoint', 'apicona'), 
			'subtitle' => __('Change options for responsive menu breakpoint.', 'apicona'),
			'options'  => array(
				'1200'   => __('Large devices','apicona').'<small>'.__('Desktops (>1200px)', 'apicona').'</small>',
				'992'    => __('Medium devices','apicona').'<small>'.__('Desktops and Tablets (>992px)', 'apicona').'</small>',
				'768'    => __('Small devices','apicona').'<small>'.__('Mobile and Tablets (>768px)', 'apicona').'</small>',
				'custom' => __('Custom (select pixel below)', 'apicona'),
			),
			'default'  => thememount_get_themeoptions_default_value('menu_breakpoint'),
		),
		array(
			'id'            => 'menu_breakpoint_custom',
			'type'          => 'slider',
			'title'         => __( 'Custom Breakpoint for Menu (in pixel)', 'apicona' ),
			'subtitle'      => __( 'Select after how many pixels the menu will become responsive.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('menu_breakpoint_custom'),
			'min'           => 1,
			'step'          => 1,
			'max'           => 1200,
			'display_value' => 'text',
			'required'      => array('menu_breakpoint','equals','custom'),
		),
		
		// Main Menu Options
		array(
			'id'    =>'html-mainmenuoptions',
			'type'  => 'info',
			'title' => __('Main Menu Options', 'apicona'), 
			'desc'  => __('Options for main menu in header', 'apicona')
        ),
		array(
			'id'          => 'mainmenufont',
			'type'        => 'typography', 
			'title'       => __('Main Menu Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height' => true,
			'font-weight' => true,
			'text-transform' => true,
			'letter-spacing' => true, // Defaults to false
			'color'       => true,
			'output'      => array('.header-controls .thememount-header-cart-link-wrapper a .thememount-cart-qty, #navbar #site-navigation div.nav-menu > ul > li > a, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font, color and size for main menu.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('mainmenufont'),
		),
		array(
			'id'       => 'stickymainmenufontcolor',
			'type'     => 'color',
			'title'    => __('Main Menu Font Color for Sticky Header', 'apicona'),
			'subtitle' => __('Main menu font color when the header becomes sticky.', 'apicona'),
			'default'  => '#222222',
			'validate' => 'color',
		),
		array(
			'id'       => 'mainmenu_active_link_color',
			'type'     => 'select',
			'title'    => __('Main Menu Active Link Color', 'apicona'), 
			'subtitle' => __('<strong>Tips:</strong>
								<ul>
									<li><code>Skin color (default):</code> Skin color for active link color.</li>
									<li><code>Custom color:</code> Custom color for active link color. Useful if you like to use any color for active link color.</li>
								</ul>
								', 'apicona'),
			'options'  => array(
					'skin'   => __('Skin color (default)', 'apicona'),
					'custom' => __('Custom color (select below)', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('mainmenu_active_link_color'),
		),
		array(
			'id'       => 'mainmenu_active_link_custom_color',
			'type'     => 'color',
			'title'    => __('Main Menu Active Link Custom Color', 'apicona'),
			'subtitle' => __('Custom color for main menu active menu text.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('mainmenu_active_link_custom_color'),
			'validate' => 'color',
			'required' => array('mainmenu_active_link_color','equals','custom'),
		),
		
		// Dropdown menu options
		array(
			'id'    =>'html-dropmenuoptions',
			'type'  => 'info',
			'title' => __('Drop Down Menu Options', 'apicona'), 
			'desc'  => __('Options for drop down menu in header', 'apicona')
        ),
		array(
			'id'          => 'dropdownmenufont',
			'type'        => 'typography', 
			'title'       => __('Dropdown Menu Font', 'apicona'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height' => true,
			'font-weight' => true,
			'text-transform' => true,
			'word-spacing' => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'       => true,
			'output'      => array('ul.nav-menu li ul li a, div.nav-menu > ul li ul li a, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:focus, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:focus, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget'), // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'subtitle'    => __('Select font, color and size for dropdown menu.', 'apicona'),
			'default'     => thememount_get_themeoptions_default_value('dropdownmenufont'),
		),
		array(
			'id'       => 'dropmenu_active_link_color',
			'type'     => 'select',
			'title'    => __('Dropdown Menu Active Link Color', 'apicona'), 
			'subtitle' => __('<strong>Tips:</strong>
								<ul>
									<li><code>Skin color (default):</code> Skin color for active link color.</li>
									<li><code>Custom color:</code> Custom color for active link color. Useful if you like to use any color for active link color.</li>
								</ul>
								', 'apicona'),
			'options'  => array(
					'skin'   => __('Skin color (default)', 'apicona'),
					'custom' => __('Custom color (select below)', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('dropmenu_active_link_color'),
		),
		array(
			'id'       => 'dropmenu_active_link_custom_color',
			'type'     => 'color',
			'title'    => __('Dropdown Menu Active Link Custom Color', 'apicona'),
			'subtitle' => __('Custom color for dropdown menu active menu text.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('dropmenu_active_link_custom_color'),
			'validate' => 'color',
			'required' => array('dropmenu_active_link_color','equals','custom'),
		),
		
		
		array(
			'id'            => 'dropmenu_background',
			'type'          => 'background',
			'title'         => __('Dropdown Menu Background Properties', 'apicona'),
			'subtitle'      => __('Set background for dropdown menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('ul.nav-menu li ul, div.nav-menu > ul .children, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, 
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu li:hover > a, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, 
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu li:hover > a.mega-menu-link, #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link'),
			'default'       => thememount_get_themeoptions_default_value('dropmenu_background'),
		),
		array(
			'id'       => 'dropdown_menu_separator',
			'type'     => 'radio',
			'title'    => __('Separator line between dropdown menu links', 'apicona'), 
			'subtitle' => __('<strong>Tips:</strong>
								<ul>
									<li><code>Grey color as border color (default):</code> This is default border view. </li>
									<li><code>White color:</code> Select this option if you are going to select dark background color (for dropdown menu)</li>
									<li><code>No separator border:</code> Completely remove border. This will make your menu totally flat.</li>
								</ul>', 'apicona'),
			'options'  => array(
							'grey'  => __('Grey color as border color (default)', 'apicona'),
							'white' => __('White color as border color (for dark background color)', 'apicona'),
							'no'    => __('No separator border', 'apicona'),
						),
			'default'  => thememount_get_themeoptions_default_value('dropdown_menu_separator'),
		),
		array(
			'id'       => 'dropdown_menu_separator_vertical',
			'type'     => 'radio',
			'title'    => __('Vertical Separator line between dropdown menu links (Mega Menu only)', 'apicona'), 
			'subtitle' => __('<strong>Tips:</strong>
								<ul>
									<li><code>Grey color as border color (default):</code> This is grey border view. </li>
									<li><code>White color:</code> Select this option if you are going to select dark background color (for dropdown menu)</li>
									<li><code>No separator border:</code> Completely remove border. This will make your menu totally flat.</li>
								</ul>', 'apicona'),
			'options'  => array(
							'grey'  => __('Grey color as border color (default)', 'apicona'),
							'white' => __('White color as border color (for dark background color)', 'apicona'),
							'no'    => __('No separator border', 'apicona'),
						),
			'default'  => thememount_get_themeoptions_default_value('dropdown_menu_separator_vertical'),
		),
		array(
			'id'             => 'megamenu_widget_title',
			'type'           => 'typography', 
			'title'          => __('Mega Menu Widget Font Settings', 'apicona'),
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'color'          => true,
			'output'         => array('#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title'), // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'subtitle'       => __('Font settings for mega menu widget title. <br><br> <strong>NOTE: </strong> This will work only if you installed <code>Max Mega Menu</code> plugin and also activated in the main (primary) menu.', 'apicona'),
			'default'        => thememount_get_themeoptions_default_value('megamenu_widget_title'),
		),
		
		array(
			'id'    =>'html-mmmenu-dropdown-bg',
			'type'  => 'info',
			'title' => __('Max mega Menu - Background Settings for Dropdown menu', 'apicona'), 
			'desc'  => __('Set background for dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona')
        ),
		array(
			'id'            => 'mmmenu_dropdown_bg_1',
			'type'          => 'background',
			'title'         => __('First dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for first dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(1) ul'),
			
			
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_2',
			'type'          => 'background',
			'title'         => __('Second dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for second dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(2) ul'),
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_3',
			'type'          => 'background',
			'title'         => __('Third dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for third dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(3) ul'),
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_4',
			'type'          => 'background',
			'title'         => __('Fourth dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for fourth dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(4) ul'),
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_5',
			'type'          => 'background',
			'title'         => __('Fifth dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for fifth dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(5) ul'),
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_6',
			'type'          => 'background',
			'title'         => __('Sixth dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for sixth dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(6) ul'),
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_7',
			'type'          => 'background',
			'title'         => __('Seventh dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for seventh dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(7) ul'),
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_8',
			'type'          => 'background',
			'title'         => __('Eighth dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for eighth dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(8) ul'),
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_9',
			'type'          => 'background',
			'title'         => __('Ninth dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for ninth dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(9) ul'),
		),
		array(
			'id'            => 'mmmenu_dropdown_bg_10',
			'type'          => 'background',
			'title'         => __('Tenth dropdown menu background', 'apicona'),
			'subtitle'      => __('Set background for tenth dropdown menu.', 'apicona') . '<br><strong>' . __('NOTE:', 'apicona') . '</strong>  ' . __('This will work only if the mega menu (via "Max Mega Menu" plugin) is enabled in the menu.', 'apicona'),
			'preview_media' => true,
			'output'        => array('#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu, #navbar #site-navigation div.nav-menu > ul > li:nth-child(10) ul'),
		),
		
		
		
	
	),
);




// Footer Settings
$sections[] = array(
	'title'  => __('Footer Settings', 'apicona'),
	'header' => __('Footer Settings', 'apicona'),
	'desc'   => __('Settings of the elements from the page footer area', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-return-key',
	'fields' => array(
		array(
			'id'    =>'html-stickyfooter',
			'type'  => 'info',
			'title' => __('Sticky Footer', 'apicona'), 
			'desc'  => __('Make footer sticky and visible on scrolling at bottom.', 'apicona')
        ),
		array(
			'id'         => 'stickyfooter',
			'type'       => 'switch',
			'title'      => __('Sticky Footer', 'apicona'), 
			'subtitle'   => __('Set this option <code>YES</code> to enable sticky footer on scrolling at bottom.', 'apicona'),
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'default'    => thememount_get_themeoptions_default_value('stickyfooter'), // 1 = on | 0 = off
		),
		//Footer Widget area
		array(
			'id'    =>'html-coloroption',
			'type'  => 'info',
			'title' => __('Footer Background and Color Options', 'apicona'), 
			'desc'  => __('Options to change settings for footer background and color.', 'apicona')
        ),
		array(
			'id'               => 'footerwidget_bgimage',
			'type'             => 'background',
			'title'            => __('Footer Background', 'apicona'),
			'subtitle'         => __('Footer background image', 'apicona'),
			'preview_media'    => true,
			'background-color' => false,
			'output'           => array('#page footer.site-footer > div.footer'),
			'default'          => thememount_get_themeoptions_default_value('footerwidget_bgimage'),
		),
		array(
			'id'       => 'footerwidget_bgcolor',
			'type'     => 'color_rgba',
			'title'    => __('Footer Background Color', 'apicona'),
			'subtitle' => __('Custom color for footer background.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('footerwidget_bgcolor'),
			'output'   => array('background-color' => '#page footer.site-footer > div.footer > div.footer-inner'),
			//'validate' => 'color',
		),
		array(
			'id'       => 'footerwidget_color',
			'type'     => 'select',
			'title'    => __('Text Color', 'apicona'), 
			'subtitle' => __('Select <code>Dark</code> color if you are going to select light color in above option.', 'apicona'),
			'options'  => array(
					'white'  => __('White', 'apicona'),
					'dark'   => __('Dark', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('footerwidget_color'),
		),
		
		// Top Footer Widget Area
		array(
			'id'    =>'html_top_footer_widget',
			'type'  => 'info',
			'title' => __('First Row Footer Widget Area', 'apicona'), 
			'desc'  => __('Change Columns of First Row Footer Widget Area', 'apicona')
        ),
		array(
			'id'      => 'top_footer_widget_column',
			'type'    => 'image_select',
			'title'   => __('Select Column Layout for First Row Footer Widget Area', 'apicona'), 
			'desc'    => __('Select Column layout View.', 'apicona'),
			'options' => array(
				'12' => array('title' => __('One Column', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_12.png'),
				'6_6' => array('title' => __('Two Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_6_6.png'),
				'4_4_4' => array('title' => __('Three Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png'),
				'3_3_3_3' => array('title' => __('Four Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png'),
				'8_4' => array('title' => __('8 + 4 Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_8_4.png'),
				'4_8' => array('title' => __('4 + 8 Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_4_8.png'),
				'6_3_3' => array('title' => __('6 + 3 + 3 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png'),
				'3_3_6' => array('title' => __('3 + 3 + 6 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png'),
				'8_2_2' => array('title' => __('8 + 2 + 2 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png'),
				'2_2_8' => array('title' => __('2 + 2 + 8 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png'),
				'6_2_2_2' => array('title' => __('6 + 2 + 2 + 2 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png'),
				'2_2_2_6' => array('title' => __('2 + 2 + 2 + 6 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png'),
			),
			'default' => thememount_get_themeoptions_default_value('top_footer_widget_column'),
		),
		
		//Second Footer Widget Area
		array(
			'id'    =>'html-footer_column_layout',
			'type'  => 'info',
			'title' => __('Second Row Footer Widget Area', 'apicona'), 
			'desc'  => __('Change Columns of Second Row Footer Widget Area', 'apicona')
        ),
		array(
			'id'      => 'footer_column_layout',
			'type'    => 'image_select',
			'title'   => __('Select Column layout for Second Row Footer Widget Area', 'apicona'), 
			'desc'    => __('Select Column layout View.', 'apicona'),
			'options' => array(
				'12' => array('title' => __('One Column', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_12.png'),
				'6_6' => array('title' => __('Two Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_6_6.png'),
				'4_4_4' => array('title' => __('Three Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png'),
				'3_3_3_3' => array('title' => __('Four Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png'),
				'8_4' => array('title' => __('8 + 4 Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_8_4.png'),
				'4_8' => array('title' => __('4 + 8 Columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_4_8.png'),
				'6_3_3' => array('title' => __('6 + 3 + 3 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png'),
				'3_3_6' => array('title' => __('3 + 3 + 6 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png'),
				'8_2_2' => array('title' => __('8 + 2 + 2 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png'),
				'2_2_8' => array('title' => __('2 + 2 + 8 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png'),
				'6_2_2_2' => array('title' => __('6 + 2 + 2 + 2 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png'),
				'2_2_2_6' => array('title' => __('2 + 2 + 2 + 6 columns', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png'),
			),
			'default' => thememount_get_themeoptions_default_value('footer_column_layout'),
		),
		
		//Footer Text Area
		array(
			'id'    =>'html-footerwidgetarea',
			'type'  => 'info',
			'title' => __('Footer Text Area', 'apicona'), 
			'desc'  => __('Options to change settings for footer text area.', 'apicona')
        ),
		array(
			'id'               => 'footer_copyright_bgimage',
			'type'             => 'background',
			'title'            => __('Footer Background', 'apicona'),
			'subtitle'         => __('Background Image for Footer Text Area', 'apicona'),
			'preview_media'    => true,
			'background-color' => false,
			'output'           => array('#page footer.site-footer .site-info'),
			'default'          => thememount_get_themeoptions_default_value('footer_copyright_bgimage'),
		),
		array(
			'id'       => 'footer_copyright_bgcolor',
			'type'     => 'color_rgba',
			'title'    => __('Footer Background Color', 'apicona'),
			'subtitle' => __('Custom background color for Footer Text Area', 'apicona'),
			'default'  => array(
				'color'  => '#212121',
				'alpha'  => '0.97',
				'rgba'   => 'rgba(33,33,33,0.97)',
			),
			'output'   => array('background-color' => '#page footer.site-footer .site-info-overlay'),
			//'validate' => 'color',
		),
		array(
			'id'       => 'footer_copyright_color',
			'type'     => 'select',
			'title'    => __('Text Color', 'apicona'), 
			'subtitle' => __('Select <code>Dark</code> color if you are going to select light color in above option.', 'apicona'),
			'options'  => array(
					'white'  => __('White', 'apicona'),
					'dark'   => __('Dark', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('footer_copyright_color'),
		),
		array(
			'id'       => 'copyrights',
			'type'     => 'editor',
			'title'    => __('Footer Text (Left area)', 'apicona'), 
			'subtitle' => __('You can use the following shortcodes in your footer text:','apicona') . '  <code>[site-url]</code> <code>[site-title]</code> <code>[site-tagline]</code> <code>[current-year]</code> <code>[tm-footermenu]</code>',
			'desc' => sprintf( __('%s Click here to know more %s about shortcode description.','apicona') , '<a href="http://apicona-advanced.thememount.com/documentation/shortcodes.html" target="_blank">' , '</a>'  ) ,
			'default'  => thememount_get_themeoptions_default_value('copyrights'),
		),
		array(
			'id'       => 'footer_copyright_right',
			'type'     => 'editor',
			'title'    => __('Footer Text (Right area)', 'apicona'), 
			'subtitle' => __('You can use the following shortcodes in your footer text:','apicona') . '  <code>[site-url]</code> <code>[site-title]</code> <code>[site-tagline]</code> <code>[current-year]</code> <code>[tm-footermenu]</code>',
			'desc' => sprintf( __('%s Click here to know more %s about shortcode description.','apicona') , '<a href="http://apicona-advanced.thememount.com/documentation/shortcodes.html" target="_blank">' , '</a>'  ) ,
			'default'  => thememount_get_themeoptions_default_value('footer_copyright_right'),
		),
	),
);



// Login Page Settings
$sections[] = array(
	'title'  => __('Login Page Settings', 'apicona'),
	'header' => __('Login Page Settings', 'apicona'),
	'desc'   => __('Set options for login page.', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-lock',
	'fields' => array(
		array(
			'id'            => 'login_background',
			'type'          => 'background',
			'title'         => __('Background Properties', 'apicona'),
			'subtitle'      => __('Specify the type of background object.', 'apicona'),
			'preview_media' => true,
			'default'       => thememount_get_themeoptions_default_value('login_background'),
			'customizer'=> false,
		),
	),
);


// Blog Settings
$sections[] = array(
	'title'  => __( 'Blog Settings', 'apicona'),
	'header' => __( 'Blog Settings', 'apicona'),
	'desc'   => __('Settings for Blog section.', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-pencil',
	'fields' => array(
		array(
			'id'       => 'blog_text_limit',
			'type'     => 'slider',
			'title'    => __('Blog Excerpt Limit (in words)', 'apicona'),
			'subtitle' => __('Set limit for small description. Select how many words you like to show. <br><strong>TIP: </strong> Select <code>0</code> (zero) to show excerpt or content before READ MORE break. <br>  ', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('blog_text_limit'),
			'min'      => 0,
			'step'     => 1,
			'max'      => 500,
			'display_value' => 'text',
		),
		array(
			'id'       => 'blog_view',
			'type'     => 'select',
			'title'    => __('Blog view', 'apicona'), 
			'subtitle' => __('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here.', 'apicona'),
			'options'  => array(
					'classic' => __('Classic View (default)', 'apicona'),
					'two'     => __('Two Column view', 'apicona'),
					'three'   => __('Three Column view', 'apicona'),
					'four'    => __('Four Column view', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('blog_view'),
		),
		array(
			'id'       => 'blog_readmore_text',
			'type'     => 'text',
			'title'    => __('"Read More" Link Text', 'apicona'),
			'subtitle' => __('Text for the Read More link on the Blog page.', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('blog_readmore_text'), 'apicona'),
		),
	),
);



$team_type_title = ( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' ) ? __($apicona['team_type_title'], 'apicona') : __('Team Members','apicona');

// Team Member Settings
$sections[] = array(
	'title'  => sprintf( __( '%s Settings', 'apicona'), $team_type_title ),
	'header' => sprintf( __( '%s (Team Members) Settings', 'apicona'), $team_type_title ),
	'desc'   => sprintf( __("Settings for %s custom post type. We are using \"Team member\" custom post type as %s. Here are some settings for this post type.", 'apicona'), '<strong>'.$team_type_title.'</strong>', '<strong>'.$team_type_title.'</strong>' ),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-user',
	'fields' => array(
		array(
			'id'       => 'team_before_title_text',
			'type'     => 'text',
			'title'    => __('Text Before Name of Member', 'apicona'),
			'subtitle' => __('Text before name of Member (for single page only).', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('team_before_title_text'), 'apicona'),
		),
		array(
			'id'    =>'html-teamcatsettings',
			'type'  => 'info',
			'title' => __('Team Category Settings', 'apicona'), 
			'desc'  => sprintf( __( 'Settings for category page for %s (Team Members).', 'apicona'), $team_type_title ),
        ),
		array(
			'id'       => 'teamcat_column',
			'type'     => 'select',
			'title'    => __('Select column', 'apicona'), 
			'subtitle' => sprintf( __( 'Select column to show %s (Team Members).', 'apicona'), $team_type_title ),
			'options'  => array(
					'two'   => __('Two column', 'apicona'),
					'three' => __('Three column', 'apicona'),
					'four'  => __('Four column', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('teamcat_column'),
		),
		array(
			'id'       => 'teamcat_show',
			'type'     => 'slider',
			'title'    => sprintf( __( '%s (Team Members) to show', 'apicona'), $team_type_title ),
			'subtitle' => sprintf( __( 'How many %s (Team Members) you like to show on category page.', 'apicona'), $team_type_title ),
			'default'  => thememount_get_themeoptions_default_value('teamcat_show'),
			'min'      => 1,
			'step'     => 1,
			'max'      => 100,
			'display_value' => 'text',
		),
		
	),
);




$pf_type_title = ( isset($apicona['pf_type_title']) && trim($apicona['pf_type_title'])!='' ) ? __($apicona['pf_type_title'], 'apicona') : __('Portfolio','apicona');
$pf_cat_title  = ( isset($apicona['pf_cat_title']) && trim($apicona['pf_cat_title'])!='' ) ? __($apicona['pf_cat_title'], 'apicona') : __('Portfolio Category','apicona');

// Portfolio Settings
$sections[] = array(
	'title'      => sprintf( __( '%s Settings', 'apicona'), $pf_type_title ),
	'header'     => sprintf( __( '%s (Portfolio) Settings', 'apicona'), $pf_type_title ),
	'desc'       => sprintf( __("Settings for %s custom post type. We are using \"Portfolio\" custom post type as %s. Here are some settings for this post type.", 'apicona'), '<strong>'.$pf_type_title.'</strong>', '<strong>'.$pf_type_title.'</strong>' ),
	'icon_class' => 'icon-large',
    'icon'       => 'el-icon-th-large',
	'fields'     => array(
		array(
			'id'    =>'html-portfoliobox',
			'type'  => 'info',
			'title' => sprintf( __('%s Box Settings', 'apicona'), $pf_type_title ),
			'desc'  => sprintf( __('Options to change settings for %s box which you insert via Visual Composer.', 'apicona'), $pf_type_title ),
        ),
		array(
			'id'       => 'portfolio_show_like',
			'type'     => 'switch',
			'title'    => __('Show Like Option', 'apicona'), 
			'subtitle' => sprintf( __('Select "NO" to hide the like option in the %s box.', 'apicona'), $pf_type_title ),
			'default'  => thememount_get_themeoptions_default_value('portfolio_show_like'), // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
		),
		array(
			'id'       => 'portfolio_readmore_text',
			'type'     => 'text',
			'title'    => __('"Read More" Link Text', 'apicona'),
			'subtitle' => sprintf( __('Text for the Read More link on %s Box.', 'apicona'), $pf_type_title ),
			'default'  => __(thememount_get_themeoptions_default_value('portfolio_readmore_text'), 'apicona'),
		),
		array(
			'id'    =>'html-singleportfolio',
			'type'  => 'info',
			'title' => sprintf( __('Single %s Settings', 'apicona'), $pf_type_title ),
			'desc'  => sprintf( __('Options to change settings for single %s.', 'apicona'), $pf_type_title ),
        ),
		array(
			'id'       => 'portfolio_show_related',
			'type'     => 'switch',
			'title'    => sprintf( __( 'Show Related %s', 'apicona'), $pf_type_title ),
			'subtitle' => sprintf( __('Select YES to show related %1$s on single %1$s page.', 'apicona'), $pf_type_title ),
			'default'  => thememount_get_themeoptions_default_value('portfolio_show_related'), // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
		),
		array(
			'id'       => 'portfolio_project_details',
			'type'     => 'text',
			'title'    => __('Project Details Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the list styled "Project Details" area. (For single %s only)', 'apicona'), $pf_type_title ),
			'default'  => __(thememount_get_themeoptions_default_value('portfolio_project_details'), 'apicona'),
		),
		array(
			'id'       => 'portfolio_description',
			'type'     => 'text',
			'title'    => __('Description Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the content "Description" area. (For single %s only)', 'apicona'), $pf_type_title ),
			'default'  => __(thememount_get_themeoptions_default_value('portfolio_description'), 'apicona'),
		),
		array(
			'id'       => 'portfolio_related_title',
			'type'     => 'text',
			'title'    => sprintf( __('Related %s Title', 'apicona'), $pf_type_title ),
			'subtitle' => sprintf( __('Title for the Releated %1$s area. (For single %1$s only)', 'apicona'), $pf_type_title ),
			'default'  =>  __(thememount_get_themeoptions_default_value('portfolio_related_title'), 'apicona'),
		),
		array(
			'id'       => 'portfolio_viewstyle',
			'type'     => 'radio',
			'title'    => sprintf( __('Single %s View Style', 'apicona'), $pf_type_title ),
			'subtitle' => sprintf( __('Select view for single %s', 'apicona'), $pf_type_title ),
			'options'  => array( 
				'default'  => __('Left image and right content (default)', 'apicona'),
				'top'      => __('Top image and bottom content', 'apicona'),
				'full'     => __('No image and full-width content (without details box)', 'apicona'),
			),
			'default'  => thememount_get_themeoptions_default_value('portfolio_viewstyle'),
		),
		
		array(
			'id'    =>'html-singleportfoliodetails',
			'type'  => 'info',
			'title' => sprintf( __('Single %s List Details Settings', 'apicona'), $pf_type_title ),
			'desc'  => sprintf( __('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s.', 'apicona'), $pf_type_title ),
        ),
		// Date
		array(
			'id'       => 'pf_details_date_icon',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('Date Icon', 'apicona'), 
			'subtitle' => sprintf( __('Select icon for the date line of the details in single %s.', 'apicona'), $pf_type_title ),
			'default'  => thememount_get_themeoptions_default_value('pf_details_date_icon'),
		),
		array(
			'id'       => 'pf_details_date_title',
			'type'     => 'text',
			'title'    => __('Date Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the date line of the details in single %s.', 'apicona'), $pf_type_title )
			. '<br> ' . __('Leave this field empty to remove the line.', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('pf_details_date_title'), 'apicona'),
		),
		
		// Extra Line 1
		array(
			'id'       => 'pf_details_line1_icon',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('1st Line Icon', 'apicona'), 
			'subtitle' => sprintf( __('Select icon for the first Line of the details in single %s.', 'apicona'), $pf_type_title ),
			'default'  => thememount_get_themeoptions_default_value('pf_details_line1_icon'),
		),
		array(
			'id'       => 'pf_details_line1_title',
			'type'     => 'text',
			'title'    => __('1st Line Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the first line of the details in single %s.', 'apicona'), $pf_type_title ) . '<br> ' . __('Leave this field empty to remove the line.', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('pf_details_line1_title'), 'apicona'),
		),
		// Extra Line 2
		array(
			'id'       => 'pf_details_line2_icon',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('2nd Line Icon', 'apicona'), 
			'subtitle' => sprintf( __('Select icon for the second line of the details in single %s.', 'apicona'), $pf_type_title ),
			'default'  => thememount_get_themeoptions_default_value('pf_details_line2_icon'),
		),
		array(
			'id'       => 'pf_details_line2_title',
			'type'     => 'text',
			'title'    => __('2nd Line Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the second line of the details in single %s.', 'apicona'), $pf_type_title ) . '<br> ' . __('Leave this field empty to remove the line.', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('pf_details_line2_title'), 'apicona'),
		),
		// Extra Line 3
		array(
			'id'       => 'pf_details_line3_icon',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('3rd Line Icon', 'apicona'), 
			'subtitle' => sprintf( __('Select icon for the third line of the details in single %s.', 'apicona'), $pf_type_title ),
			'default'  => thememount_get_themeoptions_default_value('pf_details_line3_icon'),
		),
		array(
			'id'       => 'pf_details_line3_title',
			'type'     => 'text',
			'title'    => __('3rd Line Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the third line of the details in single %s.', 'apicona'), $pf_type_title ) . '<br> ' . __('Leave this field empty to remove the line.', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('pf_details_line3_title'), 'apicona'),
		),
		// Extra Line 4
		array(
			'id'       => 'pf_details_line4_icon',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('4th Line Icon', 'apicona'), 
			'subtitle' => sprintf( __('Select icon for the fourth line of the details in single %s.', 'apicona'), $pf_type_title ),
			'default'  => '',
		),
		array(
			'id'       => 'pf_details_line4_title',
			'type'     => 'text',
			'title'    => __('4th Line Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the fourth line of the details in single %s.', 'apicona'), $pf_type_title ) . '<br> ' . __('Leave this field empty to remove the line.', 'apicona'),
			'default'  => '',
		),
		// Extra Line 5
		array(
			'id'       => 'pf_details_line5_icon',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('5th Line Icon', 'apicona'), 
			'subtitle' => sprintf( __('Select icon for the fifth line of the details in single %s.', 'apicona'), $pf_type_title ),
			'default'  => '',
		),
		array(
			'id'       => 'pf_details_line5_title',
			'type'     => 'text',
			'title'    => __('5th Line Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the fifth line of the details in single %s.', 'apicona'), $pf_type_title ) . '<br> ' . __('Leave this field empty to remove the line.', 'apicona'),
			'default'  => '',
		),
		
		// Category
		array(
			'id'       => 'pf_details_cat_icon',
			'type'     => 'kwayy_icon_select',
			'data'     => 'elusive',
			'title'    => __('Category Icon', 'apicona'), 
			'subtitle' => sprintf( __('Select icon for the category line of the details in single %s.', 'apicona'), $pf_type_title ),
			'default'  => thememount_get_themeoptions_default_value('pf_details_cat_icon'),
		),
		array(
			'id'       => 'pf_details_cat_title',
			'type'     => 'text',
			'title'    => __('Category Title', 'apicona'),
			'subtitle' => sprintf( __('Title for the category line of the details in single %s.', 'apicona'), $pf_type_title ) . '<br> ' . __('Leave this field empty to remove the line.', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('pf_details_cat_title'), 'apicona'),
		),
		
		// Single portfolio - social sharing icons
		array(
			'id'    =>'html-socialsharingicons',
			'type'  => 'info',
			'title' => sprintf( __('Select social service for single %s sharing', 'apicona'), $pf_type_title ), 
			'desc'  => sprintf( __('Select social service so site visitors can share the single %s on different social services', 'apicona'), $pf_type_title ),
        ),
		array(
			'id'        => 'pf_single_social_share',
			'type'      => 'checkbox',
			'title'     => __('Select social service', 'apicona'),
			'desc'      => sprintf( __('The selected social service icon will be visible on single %s so user can share on social sites.', 'apicona'), $pf_type_title ),
			'options'   => array(
				'facebook'    => 'Facebook',
				'twitter'     => 'Twitter',
				'gplus'       => 'Google Plus',
				'pinterest'   => 'Pinterest',
				'linkedin'    => 'LinkedIn',
				'stumbleupon' => 'Stumbleupon',
				'tumblr'      => 'Tumblr',
				'reddit'      => 'Reddit',
				'digg'        => 'Digg',
				
				//'team_member' => __('Team Member', 'apicona'),
			),
			
			//See how std has changed? you also don't need to specify opts that are 0.
			'default'   => array(
				'facebook'    => '1',
				'twitter'     => '1',
				'gplus'       => '1',
				'pinterest'   => '1',
				'linkedin'    => '1',
				'stumbleupon' => '1',
				'tumblr'      => '1',
				'reddit'      => '1',
				'digg'        => '1',
			)
		),
		
		// Reset like
		array(
			'id'    =>'html-resetlike',
			'type'  => 'info',
			'title' => sprintf( __('Reset LIKE counter from all %s', 'apicona'), $pf_type_title ),
			'desc'  => sprintf( __('You can reset all LIKE counter from all %s items from here.', 'apicona'), $pf_type_title ),
        ),
		array(
			'id'         => 'kwayy_resetlike',
			'type'       => 'kwayy_resetlike',
			'title'      => __('Reset LIKE counter', 'apicona'), 
			'subtitle'   => sprintf( __('This will reset LIKE counter for all %1$s. Also you can reset LIKE for individual %1$s too. Just edit %s and check checkbox in the box.', 'apicona'), $pf_type_title ),
			'customizer' => false,
		),
		array(
			'id'    =>'html-pfcatsettings',
			'type'  => 'info',
			'title' => sprintf( __('%s Settings', 'apicona'), $pf_cat_title ),
			'desc'  => sprintf( __( 'Settings for %s page for %s (Portfolio Category).', 'apicona'), $pf_cat_title, $pf_type_title ),
        ),
		array(
			'id'       => 'pfcat_column',
			'type'     => 'select',
			'title'    => __('Select column', 'apicona'), 
			'subtitle' => sprintf( __( 'Select column to show %s (Portfolio Category).', 'apicona'), $pf_type_title ),
			'options'  => array(
					'two'   => __('Two column', 'apicona'),
					'three' => __('Three column', 'apicona'),
					'four'  => __('Four column', 'apicona'),
				),
			'default' => thememount_get_themeoptions_default_value('pfcat_column'),
		),
		array(
			'id'       => 'pfcat_show',
			'type'     => 'slider',
			'title'    => sprintf( __( '%s (Portfolio Category) to show', 'apicona'), $pf_type_title ),
			'subtitle' => sprintf( __( 'How many %s (Portfolio Category) you like to show on category page.', 'apicona'), $pf_type_title ),
			'default'  => thememount_get_themeoptions_default_value('pfcat_show'),
			'min'      => 1,
			'step'     => 1,
			'max'      => 100,
			'display_value' => 'text',
		),
	),
);


// Error 404 Page Settings
$sections[] = array(
	'title'  => __('Error 404 Page Settings', 'apicona'),
	'header' => __('Error 404 Page Settings', 'apicona'),
	'customizer' => false,
	'desc'   => __('Settings that determine how the error page will be looking', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-warning-sign',
	'fields' => array(
		array(
			'id'       => 'error404_big_icon',
			'type'     => 'kwayy_icon_select',
			//'data'     => 'elusive',
			'title'    => __('Big icon', 'apicona'), 
			'subtitle' => __('Select icon that appear in top with big size.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('error404_big_icon'),
		),
		array(
			'id'       => 'error404_big_text',
			'type'     => 'text',
			'title'    => __('Big heading text', 'apicona'),
			'subtitle' => __('This text will be shown with big font size below icon', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('error404_big_text'), 'apicona'),
		),
		array(
			'id'       => 'error404_medium_text',
			'type'     => 'text',
			'title'    => __('Description text', 'apicona'),
			'subtitle' => __('This text will be appear below the big heading text', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('error404_medium_text'), 'apicona'),
		),
		array(
			'id'       => 'error404_search',
			'type'     => 'switch',
			'title'    => __('Show Search Form', 'apicona'), 
			'subtitle' => __('Set this option <code>YES</code> to show search form on the 404 page.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('error404_search'), // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
		),
	),
);


// Search Page Settings
$sections[] = array(
	'title'  => __('Search Page Settings', 'apicona'),
	'header' => __('Search Page Settings', 'apicona'),
	'desc'   => __('Settings that determine how the search results page will be looking', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-search',
	'fields' => array(
		array(
			'id'       => 'searchnoresult',
			'type'     => 'textarea',
			'title'    => __('Content of the search page if no results found', 'apicona'), 
			'subtitle' => __('Specify the content of the page that will be displayed if while search no results found', 'apicona'),
			'desc'     => __('HTML tags and shortcodes are allowed', 'apicona'),
			'validate' => 'html',
			'default'  => thememount_get_themeoptions_default_value('searchnoresult'),
		),
	),
);



// Sidebars
$sections[] = array(
	'title'  => __('Sidebar', 'apicona'),
	'header' => __('Sidebar', 'apicona'),
	'desc'   => __('Setup some extra sidebars for a page widgets', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-pause',
	'fields' => array(
		array(
			'id'       => 'sidebars',
			'type'     => 'multi_text',
			'title'    => __('Custom Sidebars', 'apicona'),
			'subtitle' => __('Specify the custom sidebars that can be used in the pages for a widgets', 'apicona'),
		),
		array(
			'id'    =>'html-sidebars',
			'type'  => 'info',
			'title' => __('Sidebar Position', 'apicona'), 
			'desc'  => __('Select sidebar position for different sections.', 'apicona')
        ),
		array(
			'id'      => 'sidebar_page',
			'type'    => 'image_select',
			'title'   => __('Standard Pages Sidebar', 'apicona'), 
			'desc'    => __('Select one of layouts for standard pages', 'apicona'),
			'options' => array(
				'no'        => array('title' => __('No Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_no_side.png'),
				'left'      => array('title' => __('Left Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left.png'),
				'right'     => array('title' => __('Right Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right.png'),
				'both'      => array('title' => __('Both Sidebars', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_both.png'),
				'bothleft'  => array('title' => __('Both at Left', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left_both.png'),
				'bothright' => array('title' => __('Both at Right', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right_both.png'),
			),
			'default' => thememount_get_themeoptions_default_value('sidebar_page'),
		),
		array(
			'id'      => 'sidebar_blog',
			'type'    => 'image_select',
			'title'   => __('Blog Page Sidebar', 'apicona'), 
			'desc'    => __('Select one of layouts for blog page', 'apicona'),
			'options' => array(
				'no'        => array('title' => __('No Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_no_side.png'),
				'left'      => array('title' => __('Left Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left.png'),
				'right'     => array('title' => __('Right Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right.png'),
				'both'      => array('title' => __('Both Sidebars', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_both.png'),
				'bothleft'  => array('title' => __('Both at Left', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left_both.png'),
				'bothright' => array('title' => __('Both at Right', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right_both.png'),
			),
			'default' => thememount_get_themeoptions_default_value('sidebar_blog'),
		),
		array(
			'id'      => 'sidebar_search',
			'type'    => 'image_select',
			'title'   => __('Search Page Sidebar', 'apicona'), 
			'desc'    => __('Select one of layouts for search page', 'apicona'),
			'options' => array(
				'no'        => array('title' => __('No Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_no_side.png'),
				'left'      => array('title' => __('Left Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left.png'),
				'right'     => array('title' => __('Right Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right.png'),
				'both'      => array('title' => __('Both Sidebars', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_both.png'),
				'bothleft'  => array('title' => __('Both at Left', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left_both.png'),
				'bothright' => array('title' => __('Both at Right', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right_both.png'),
			),
			'default' => thememount_get_themeoptions_default_value('sidebar_search'),
		),
		array(
			'id'      => 'sidebar_woocommerce',
			'type'    => 'image_select',
			'title'   => __('WooCommerce Sidebar', 'apicona'), 
			'desc'    => __('Select sidebar position for WooCommerce Shop and Single Product page', 'apicona'),
			'options' => array(
				'no'    => array('title' => __('No Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_no_side.png'),
				'left'  => array('title' => __('Left Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left.png'),
				'right' => array('title' => __('Right Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right.png'),
			),
			'default' => thememount_get_themeoptions_default_value('sidebar_woocommerce'),
		),
		array(
			'id'      => 'sidebar_bbpress',
			'type'    => 'image_select',
			'title'   => __('BBPress Sidebar', 'apicona'), 
			'desc'    => __('Select sidebar position for BBPress pages', 'apicona'),
			'options' => array(
				'left'  => array('title' => __('Left Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left.png'),
				'right' => array('title' => __('Right Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right.png'),
			),
			'default' => thememount_get_themeoptions_default_value('sidebar_bbpress'),
		),
		array(
			'id'      => 'sidebar_events',
			'type'    => 'image_select',
			'title'   => __('Events Sidebar', 'apicona'), 
			'desc'    => __('Select sidebar position for Events pages.', 'apicona') . ' ' . 
			sprintf( __('This is valid for %s plugin only','apicona') , '<a href="https://wordpress.org/plugins/the-events-calendar/" target="_blank">The Events Calendar</a>' ),
			'options' => array(
				'no'    => array('title' => __('No Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_no_side.png'),
				'left'  => array('title' => __('Left Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_left.png'),
				'right' => array('title' => __('Right Sidebar', 'apicona'), 'img' => get_template_directory_uri() . '/inc/images/layout_right.png'),
			),
			'default' => thememount_get_themeoptions_default_value('sidebar_events'),
		),
	),
);


// Social Links
$sections[] = array(
	'title'  => __('Social Links', 'apicona'),
	'header' => __('Social Links', 'apicona'),
	'desc'   => __('Setup social links to show in header and footer', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-group',
	'fields' => array(
		array(
			'id'     => 'thememount-social-desc',
			'type'   => 'info',
			'style'  => 'success',
			'notice' => true,
			'title'  => __('TIP:', 'apicona'),
			'desc'   => __('Not found your social service? No problem, we are ready to add new social service here. Please send us social service name via our <a href="http://support-mojo.kwayyinfotech.com/" target="_blank">support system</a> and we will add it.', 'apicona'),
		),
		array(
			'id'       => 'twitter',
			'type'     => 'textarea',
			'title'    => __('Twitter Link', 'apicona'), 
			'subtitle' => __('Your Twitter Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'youtube',
			'type'     => 'textarea',
			'title'    => __('YouTube Link', 'apicona'), 
			'subtitle' => __('Your YouTube Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'flickr',
			'type'     => 'textarea',
			'title'    => __('Flickr Link', 'apicona'), 
			'subtitle' => __('Your Flickr Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'facebook',
			'type'     => 'textarea',
			'title'    => __('Facebook Link', 'apicona'), 
			'subtitle' => __('Your Facebook Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'linkedin',
			'type'     => 'textarea',
			'title'    => __('LinkedIn Link', 'apicona'), 
			'subtitle' => __('Your LinkedIn Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'googleplus',
			'type'     => 'textarea',
			'title'    => __('Google+ Link', 'apicona'), 
			'subtitle' => __('Your Google+ Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'yelp',
			'type'     => 'textarea',
			'title'    => __('Yelp Link', 'apicona'), 
			'subtitle' => __('Your Yelp Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'dribbble',
			'type'     => 'textarea',
			'title'    => __('Dribbble Link', 'apicona'), 
			'subtitle' => __('Your Dribbble Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'pinterest',
			'type'     => 'textarea',
			'title'    => __('Pinterest Link', 'apicona'), 
			'subtitle' => __('Your Pinterest Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'podcast',
			'type'     => 'textarea',
			'title'    => __('Podcast Link', 'apicona'), 
			'subtitle' => __('Your Podcast Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'instagram',
			'type'     => 'textarea',
			'title'    => __('Instagram Link', 'apicona'), 
			'subtitle' => __('Your Instagram Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'xing',
			'type'     => 'textarea',
			'title'    => __('Xing Link', 'apicona'), 
			'subtitle' => __('Your Xing Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'vimeo',
			'type'     => 'textarea',
			'title'    => __('Vimeo Link', 'apicona'), 
			'subtitle' => __('Your Vimeo Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'vk',
			'type'     => 'textarea',
			'title'    => __('VK Link', 'apicona'), 
			'subtitle' => __('Your VK Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'houzz',
			'type'     => 'textarea',
			'title'    => __('houzz Link', 'apicona'), 
			'subtitle' => __('Your houzz Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'issuu',
			'type'     => 'textarea',
			'title'    => __('Issuu Link', 'apicona'), 
			'subtitle' => __('Your Issuu Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'google-drive',
			'type'     => 'textarea',
			'title'    => __('Google Drive Link', 'apicona'), 
			'subtitle' => __('Your Google Drive Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'tripadvisor',
			'type'     => 'textarea',
			'title'    => __('TripAdvisor Link', 'apicona'), 
			'subtitle' => __('Your TripAdvisor Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'stumbleupon',
			'type'     => 'textarea',
			'title'    => __('StumbleUpon Link', 'apicona'), 
			'subtitle' => __('Your StumbleUpon Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'delicious',
			'type'     => 'textarea',
			'title'    => __('Delicious Link', 'apicona'), 
			'subtitle' => __('Your Delicious Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'tumblr',
			'type'     => 'textarea',
			'title'    => __('Tumblr Link', 'apicona'), 
			'subtitle' => __('Your Tumblr Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'odnoklassniki',
			'type'     => 'textarea',
			'title'    => __('Odnoklassniki Link', 'apicona'), 
			'subtitle' => __('Your Odnoklassniki Link', 'apicona'),
			'desc'     => __('Paste URL only', 'apicona'),
		),
		array(
			'id'       => 'rss',
			'type'     => 'switch',
			'title'    => __('Show RSS Link', 'apicona'), 
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'subtitle' => __('Check this option to show RSS link with social icons list', 'apicona'),
			'default'  => '1'// 1 = on | 0 = off
		),
	),
);



// WooCommerce Settings
$sections[] = array(
	'title'  => __('WooCommerce Settings', 'apicona'),
	'header' => __('WooCommerce Settings', 'apicona'),
	'customizer'=> false,
	'desc'   => __('Setup for WooCommerce shop section. Please make sure you installed WooCommerce plugin.', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-shopping-cart',
	'fields' => array(
		// WooCommerce settings
		array(
			'id'       => 'wc-header-icon',
			'type'     => 'switch',
			'title'    => __('Show Cart Icon in Header', 'apicona'), 
			'subtitle' => __('Select <code>YES</code> to show the cart icon in header. Select <code>NO</code> to hide the cart icon.', 'apicona') . ' <br><br> ' . __('<strong>NOTE: </strong> Please note that if you haven\'t installed "WooCommerce" plugin than the icon will not appear even if you selected <code>YES</code> in this option.', 'apicona') ,
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('wc-header-icon'), // 1 = on | 0 = off
			'customizer'=> false,
		),
		array(
			'id'       => 'woocommerce-column',
			'type'     => 'radio',
			'title'    => __('WooCommerce Product List Column', 'apicona'), 
			'subtitle' => __('Select how many column you want to show for product list view.', 'apicona'),
			'options'  => array(
				'1' => __('One Column', 'apicona'),
				'2' => __('Two Columns', 'apicona'),
				'3' => __('Three Columns', 'apicona'),
				'4' => __('Four Columns', 'apicona'),
			),
			'default'  => thememount_get_themeoptions_default_value('woocommerce-column'),
		),
		array(
			'id'            => 'woocommerce-product-per-page',
			'type'          => 'slider',
			'title'         => __( 'Products Per Page', 'apicona' ),
			'subtitle'      => __( 'Select how many product you want to show on SHOP page.', 'apicona' ),
			'desc'          => __( 'Select how many product you want to show on SHOP page.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('woocommerce-product-per-page'),
			'min'           => 2,
			'step'          => 1,
			'max'           => 30,
			'display_value' => 'text',
		),
		
		array(
			'id'    =>'html-wc_single_product_page',
			'type'  => 'info',
			'title' => __('Single Product Page Settings', 'apicona'), 
			'desc'  => __('Options for Single product page.', 'apicona')
        ),
		array(
			'id'       => 'wc-single-show-related',
			'type'     => 'switch',
			'title'    => __('Show Related Products', 'apicona'), 
			'subtitle' => __('Select <code>YES</code> to show Related Products below the product description on single page.', 'apicona') ,
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('wc-single-show-related'), // 1 = on | 0 = off
			'customizer'=> false,
		),
		array(
			'id'       => 'wc-single-related-column',
			'type'     => 'radio',
			'title'    => __('Column for Related Products', 'apicona'), 
			'subtitle' => __('Select how many column you want to show for product list of related products.', 'apicona'),
			'options'  => array(
				'1' => __('One Column', 'apicona'),
				'2' => __('Two Columns', 'apicona'),
				'3' => __('Three Columns', 'apicona'),
				'4' => __('Four Columns', 'apicona'),
			),
			'default'  => thememount_get_themeoptions_default_value('wc-single-related-column'),
		),
		array(
			'id'            => 'wc-single-related-count',
			'type'          => 'slider',
			'title'         => __( 'Related Products Show', 'apicona' ),
			'subtitle'      => __( 'Select how many products you want to show in the Related prodcuts area on single product page.', 'apicona' ),
			'desc'          => __( 'Select how many products you want to show in the Related prodcuts area on single product page.', 'apicona' ),
			'default'       => thememount_get_themeoptions_default_value('wc-single-related-column'),
			'min'           => 1,
			'step'          => 1,
			'max'           => 8,
			'display_value' => 'text',
		),
		
	),
);

$cssfile = (is_multisite()) ? 'php' : 'css' ;


$sections[] = array(
	'title'      => __('Under Construction Site', 'apicona'),
	'header'     => __('Under Construction Site Settings', 'apicona'),
	'customizer' => false,
	'desc'       => __('You can set your site in Under Construciton mode during development of your site. Please note that only logged in users like admin can view the site when this mode is activated.', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'       => 'el-icon-cog',
    'fields'     => array(
		// Options will be here
		array(
			'id'       => 'uconstruction',
			'type'     => 'switch',
			'title'    => __('Show Under Construciton Message', 'apicona'), 
			'subtitle' => __('This will show Under Construction message instead of your site to your site visitors.', 'apicona'),
			'desc'     => __('You can acitvate this during development of your site. So site visitor will see Under Construction message.', 'apicona'). '<br>' . __('Please note that admin (when logged in) can view live site and not Under Construction message.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('uconstruction'), // 1 = on | 0 = off
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
		),
		array(
			'id'       => 'uconstruction_html',
			'type'     => 'textarea',
			'title'    => __('Page Content', 'apicona'),
			'subtitle' => __('Write your HTML code for Under Construction page body content.', 'apicona'),
			'desc'     => __('Custom HTML Allowed', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('uconstruction_html'),
			'required' => array(
						array('uconstruction','equals','1'),
						//array('fbar_bg_color','equals','custom'),
			),
		),
		array(
			'id'            => 'uconstruction_background',
			'type'          => 'background',
			'title'         => __('Background Properties', 'apicona'),
			'subtitle'      => __('Set background options. This is for main body background.', 'apicona'),
			'preview_media' => true,
			'required'      => array(
								array('uconstruction','equals','1'),
			),
			'default'       => thememount_get_themeoptions_default_value('uconstruction_background'),
		),
		
	)
);




// Advanced Settings
$sections[] = array(
	'title'  => __('Advanced Settings', 'apicona'),
	'header' => __('Advanced Settings', 'apicona'),
	'customizer'=> false,
	'desc'   => __('Advanced Settings for tweaking your site.', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-wrench',
	'fields' => array(
		array(
			'id'    =>'html-teamoptionsadv',
			'type'  => 'info',
			'title' => __('Custom Post Type : Team member Settings', 'apicona'), 
			'desc'  => __('Advanced settings for Team Member custom post type.', 'apicona')
        ),
		array(
			'id'       => 'team_type_title',
			'type'     => 'text',
			'title'    => __('Title for Team Member Post Type (Plural)', 'apicona'),
			'subtitle' => __('This will change the Title for Team Member post type section (plural) value.', 'apicona'),
			'default'  => __( thememount_get_themeoptions_default_value('team_type_title'), 'apicona'),
		),
		array(
			'id'       => 'team_type_title_singular',
			'type'     => 'text',
			'title'    => __('Title for Team Member Post Type (Singular)', 'apicona'),
			'subtitle' => __('This will change the Title for Team Member post type section (singular) value.', 'apicona'),
			'default'  => '',
		),
		array(
			'id'       => 'team_type_slug',
			'type'     => 'text',
			'title'    => __('URL Slug for Team Member Post Type', 'apicona'),
			'subtitle' => __('This will change the URL slug for Team Member post type section.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('team_type_slug'),
		),
		array(
			'id'       => 'team_group_title',
			'type'     => 'text',
			'title'    => __('Title for Team Group List', 'apicona'),
			'subtitle' => __('Title for Team Group list for group page. This will appear at left sidebar.', 'apicona'),
			'default'  => __(thememount_get_themeoptions_default_value('team_group_title'), 'apicona'),
		),
		array(
			'id'       => 'team_group_slug',
			'type'     => 'text',
			'title'    => __('URL Slug for Team Group Link', 'apicona'),
			'subtitle' => __('This will change the URL slug for Team Group link.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('team_group_slug'),
		),
		array(
			'id'       => 'team_type_archive_title',
			'type'     => 'text',
			'title'    => __('Title for archive page', 'apicona'),
			'subtitle' => sprintf( __( 'Title for archive page of Team Member. <a href="%s"> Click here to view the page</a>', 'apicona'), get_post_type_archive_link( 'team_member' ) ),
			'default'  => __( thememount_get_themeoptions_default_value('team_type_archive_title'), 'apicona'),
		),
		
		// Portfolio
		array(
			'id'    =>'html-portfoliooptionsadv',
			'type'  => 'info',
			'title' => __('Custom Post Type : Portfolio Settings', 'apicona'), 
			'desc'  => __('Advanced settings for Portfolio custom post type.', 'apicona')
        ),
		array(
			'id'       => 'pf_type_title',
			'type'     => 'text',
			'title'    => __('Title for Portfolio Post Type', 'apicona'),
			'subtitle' => __('This will change the Title for Portfolio post type section.', 'apicona'),
			'default'  => __( thememount_get_themeoptions_default_value('pf_type_title'), 'apicona'),
		),
		array(
			'id'       => 'pf_type_slug',
			'type'     => 'text',
			'title'    => __('URL Slug for Portfolio Post Type', 'apicona'),
			'subtitle' => __('This will change the URL slug for Portfolio post type section.', 'apicona'),
			'desc'     => __('Make sure you save the "Settings > Permalinks" again after changing this option.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('pf_type_slug'),
		),
		array(
			'id'       => 'pf_cat_title',
			'type'     => 'text',
			'title'    => __('Title for Portfolio Category List', 'apicona'),
			'subtitle' => __('Title for Portfolio Category list for category page.', 'apicona'),
			'default'  => __( thememount_get_themeoptions_default_value('pf_cat_title'), 'apicona'),
		),
		array(
			'id'       => 'pf_cat_slug',
			'type'     => 'text',
			'title'    => __('URL Slug for Portfolio Category Link', 'apicona'),
			'subtitle' => __('This will change the URL slug for Portfolio Category link.', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('pf_cat_slug'),
		),
		array(
			'id'    =>'html-adv_dynamic_style',
			'type'  => 'info',
			'title' => __('Dynamic Style Position', 'apicona'), 
			'desc'  => __('Change how the dynamic-style.php file\'s code will be appear.', 'apicona')
        ),
		array(
			'id'       => 'dynamic-style-position',
			'type'     => 'radio',
			'title'    => __('Dynamic Style Position', 'apicona'), 
			'subtitle' => __('- Select <strong>External</strong> to load the file external (the file name will be <code>dynamic-style.php</code>). <br><br> - Select <strong>Internal</strong> to load the dynamic style on page directly (useful for WPMU server).', 'apicona'),
			'options'  => array( 'external' => __('External', 'apicona'), 'internal' => __('Internal', 'apicona') ),
			'default'  => thememount_get_themeoptions_default_value('dynamic-style-position'),
		),
		
		// Minify opitons
		array(
			'id'    =>'html-minify',
			'type'  => 'info',
			'title' => __('Minify Options', 'apicona'), 
			'desc'  => __('Options to minify HTML/JS/CSS files.', 'apicona')
        ),
		array(
			'id'       => 'dynamic-file-type',
			'type'     => 'radio',
			'title'    => __('Dynamic File Type', 'apicona'), 
			'subtitle' => __('Select which file will be loaded for dynamic style css', 'apicona'),
			'desc'     => __('Select "PHP file" if your hosting is not creating CSS file automatically. Means if the Theme Options changes are not effecting your site than select PHP file in this option.', 'apicona'). '<br> <strong>'.__('NOTE', 'apicona').': </strong> ' . __('This option will always on "PHP file" mode if you are using theme on multisite WordPress setup.','apicona'),
			'options'  => array(
					'css' => __('CSS file', 'apicona'),
					'php' => __('PHP file', 'apicona') ),
			'default'  => $cssfile,
		),
		array(
			'id'       => 'minify-css-js',
			'type'     => 'switch',
			'title'    => __('Minify JS and CSS files', 'apicona'), 
			'subtitle' => __('Select <code>YES</code> to minify the CSS and JS files.', 'apicona') ,
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('minify-css-js'), // 1 = on | 0 = off
			'customizer'=> false,
		),
		array(
			'id'         => 'kwayy_min_generator',
			'type'       => 'kwayy_min_generator',
			'title'      => __('Minify File Generator', 'apicona'), 
			'subtitle'   => __('This will generate MIN version of all CSS and JS files. This will help you to lower the page load time. You can use this if the Theme Options are not working.', 'apicona'),
			'customizer' => false,
		),
		
		// Thumb image sizes
		array(
			'id'    =>'html-imagesize',
			'type'  => 'info',
			'title' => __('Thumb Image Size Options', 'apicona'), 
			'desc'  => __('Set Image size for Portfolio and WooCoomerce sizes.', 'apicona')
        ),
		array(
			'id'             => 'img-portfolio-two-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Portfolio Two Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-portfolio-two-column'),
		),
		array(
			'id'             => 'img-portfolio-three-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Portfolio Three Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-portfolio-three-column'),
		),
		array(
			'id'             => 'img-portfolio-four-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Portfolio Four Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-portfolio-four-column'),
		),
		
		// Blog 
		array(
			'id'             => 'img-blog-two-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Blog Two Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-blog-two-column'),
		),
		array(
			'id'             => 'img-blog-three-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Blog Three Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-blog-three-column'),
		),
		array(
			'id'             => 'img-blog-four-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Blog Four Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-blog-four-column'),
		),
		
		// Team Member 
		array(
			'id'             => 'img-team-two-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Team Member Two Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Team Member Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-team-two-column'),
		),
		array(
			'id'             => 'img-team-three-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Team Member Three Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Team Member Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-team-three-column'),
		),
		array(
			'id'             => 'img-team-four-column',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Team Member Four Column - Thumb image size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the Team Member Box image in Visual Composer element (on frontend site)', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-team-four-column'),
		),
		array(
			'id'             => 'img-blog-single',
			'type'           => 'kwayy_dimensions',
			'units'          => 'px',    // You can specify a unit value. Possible: px, em, %
			'units_extended' => false,  // Allow users to select any type of unit
			'title'          => __( 'Blog Single Post Image Size', 'apicona' ),
			'subtitle'       => __( 'Set width and height of the single post image.', 'apicona' ),
			'desc'           => '<p>' . sprintf( __('%s Click here %s to know more about hard crop.', 'apicona'), '<a href="http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/" target="_blank">' , '</a>' ) . '</p> ' . '<p>' . sprintf( __('After changing these settings you may need to %s regenerate your thumbnails %s.', 'apicona'), '<a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">' , '</a>' ) . '</p> ',
			'default'        => thememount_get_themeoptions_default_value('img-blog-single'),
		),
		
		
		array(
			'id'       => 'hide_generator_meta_tag',
			'type'     => 'switch',
			'title'    => __('Hide "Generator" meta tag', 'apicona'), 
			'subtitle' => __('Select <code>YES</code> to hide GENERATOR meta tag from WordPress, WooCommerce, Visual Composer and WPML plugins. This is for security reasons.', 'apicona') ,
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'default'  => thememount_get_themeoptions_default_value('hide_generator_meta_tag'), // 1 = on | 0 = off
			'customizer'=> false,
		),
		array(
			'id'       => 'enable_adv_vc_options',
			'type'     => 'switch',
			'title'    => __('Enable Advanced option for "Visual Composer" plugin', 'apicona'), 
			'subtitle' => __('Select <code>YES</code> to see advanced options for "Visual Composer" plugin.', 'apicona') ,
			'on'       => __('Yes', 'apicona'),
			'off'      => __('No', 'apicona'),
			'default'  => '0', // 1 = on | 0 = off
			'customizer'=> false,
		),
		// Show NO IMAGE
		array(
			'id'    =>'html-show-no-image',
			'type'  => 'info',
			'title' => __('Show or hide NO IMAGE', 'apicona'), 
			'desc'  => __('Show NO IMAGE of featured imgae is not available', 'apicona')
        ),
		array(
			'id'        => 'show_no_image',
			'type'      => 'checkbox',
			'title'     => __('Show NO IMAGE for CPT', 'apicona'),
			'subtitle'  => __('Check the CPT on which you like to show NO IMAGE of featured image is not uploaded', 'apicona'),
			'desc'      => __('Check the CPT on which you like to show NO IMAGE of featured image is not uploaded', 'apicona'),
			//Must provide key => value pairs for multi checkbox options
			'options'   => array(
				'blog'        => __('Blog Post', 'apicona'),
				'portfolio'   => __('Portfolio', 'apicona'),
			),
			//See how std has changed? you also don't need to specify opts that are 0.
			'default'   => array(
				'blog'        => '',
				'portfolio'   => '',
			)
		),
		
		
		
		
		
	),
);



// Custom Code
$sections[] = array(
	'title'  => __('Custom Code', 'apicona'),
	'header' => __('Custom Code', 'apicona'),
	'customizer'=> false,
	'desc'   => __('Add custom JS and CSS code', 'apicona'),
	'icon_class' => 'icon-large',
    'icon'   => 'el-icon-pencil',
	'fields' => array(
		array(
			'id'       => 'custom_css_code',
			'type'     => 'ace_editor',
			'title'    => __('CSS Code', 'apicona'), 
			'subtitle' => __('Add custom CSS code here. This code will be appear at bottom of the dynamic css file so you can override any existing style.', 'apicona'),
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => '',
		),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'ace_editor',
			'title'    => __('JS Code', 'apicona'), 
			'subtitle' => __('Paste your JS code here.', 'apicona'),
			'mode'     => 'javascript',
			'theme'    => 'chrome',
			'default'  => ""
		),
		array(
			'id'    =>'html-customhtml',
			'type'  => 'info',
			'title' => __('Custom HTML Code', 'apicona'), 
			'desc'  => __('Custom HTML Code for different areas. You can paste <strong>Google Analytics</strong> or any tracking code here.', 'apicona')
        ),
		array(
			'id'       => 'customhtml_head',
			'type'     => 'textarea',
			'title'    => __( 'Custom Code for &lt;head&gt; tag', 'apicona' ),
			'subtitle' => __( 'This code will appear in &lt;head&gt; tag. You can add your custom tracking code here.', 'apicona' ),
			'default'  => thememount_get_themeoptions_default_value('customhtml_head'),
		),
		array(
			'id'       => 'customhtml_bodystart',
			'type'     => 'textarea',
			'title'    => __( 'Custom Code after &lt;body&gt; tag', 'apicona' ),
			'subtitle' => __( 'This code will appear after &lt;body&gt; tag. You can add your custom tracking code here.', 'apicona' ),
		),
		array(
			'id'       => 'customhtml_bodyend',
			'type'     => 'textarea',
			'title'    => __( 'Custom Code before &lt;/body&gt; tag', 'apicona' ),
			'subtitle' => __( 'This code will appear before &lt;/body&gt; tag. You can add your custom tracking code here.', 'apicona' ),
		),
		array(
			'id'    =>'html-logincode',
			'type'  => 'info',
			'title' => __('Custom Code for Login page', 'apicona'), 
			'desc'  => __('Custom Code for Login page only. This will effect only login page and not effect any other pages or admin section.', 'apicona')
        ),
		array(
			'id'       => 'login_custom_css_code',
			'type'     => 'ace_editor',
			'title'    => __('CSS Code for Login Page', 'apicona'), 
			'subtitle' => __('Paste write CSS code here.', 'apicona'),
			'mode'     => 'css',
			'theme'    => 'monokai',
		),
		array(
			'id'    =>'html-customhtml',
			'type'  => 'info',
			'title' => __('Advanced Custom CSS Code Option', 'apicona'), 
			'desc'  => __('Advanced Custom CSS Code Option.', 'apicona')
        ),
		array(
			'id'       => 'custom_css_code_top',
			'type'     => 'ace_editor',
			'title'    => __('CSS Code (at top of the file)', 'apicona'), 
			'subtitle' => __('Add custom CSS code here. This code will be appear at top of the file. specially for <code>@import</code> style tag.', 'apicona'),
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => '',
		),
	),
);



$sections[] = array(
	'type' => 'divide',
);

$sections[] = array(
	'icon' => 'el-icon-info-sign',
	'title' => __('Theme Information', 'apicona'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'apicona'),
	'fields' => array(
		array(
			'id'      => 'raw_new_info',
			'type'    => 'raw',
			'content' => $item_info,
		)
	),
);

$sections[] = array(
	'title'     => __('Import / Export', 'apicona'),
	'desc'      => __('Import and Export your Redux Framework settings from file, text or URL.', 'apicona'),
	'icon'      => 'el-icon-refresh',
	'fields'    => array(
		array(
			'id'            => 'opt-import-export',
			'type'          => 'import_export',
			'title'         => 'Import Export',
			'subtitle'      => 'Save and restore your Redux options',
			'full_width'    => false,
		),
	),
); 

/*****************************************************************************/



		

if (function_exists('wp_get_theme')){
	$theme_data = wp_get_theme();
	$theme_uri = $theme_data->get('ThemeURI');
	$description = $theme_data->get('Description');
	$author = $theme_data->get('Author');
	$version = $theme_data->get('Version');
	$tags = $theme_data->get('Tags');
}else{
	$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
	$theme_uri = $theme_data['URI'];
	$description = $theme_data['Description'];
	$author = $theme_data['Author'];
	$version = $theme_data['Version'];
	$tags = $theme_data['Tags'];
}	

$theme_info = '<div class="redux-framework-section-desc">';
$theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'apicona').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'apicona').$author.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'apicona').$version.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
if ( !empty( $tags ) ) {
	$theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'apicona').implode(', ', $tags).'</p>';	
}
$theme_info .= '</div>';

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// END Sample Config

/**
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 
 **/
/*function add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', 'apicona'),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'apicona'),
		'icon' => 'el-icon-paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
add_filter('redux-opts-sections-redux-sample', 'add_another_section');
*/

/** 
	Custom function for the callback referenced above
 
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}
*/
/**
	Custom function for the callback validation referenced above
**//*
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}
*/

