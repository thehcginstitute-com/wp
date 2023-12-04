<?php 

$root = '../../../..'; // Going to root directory
if( function_exists('get_home_path') ){
	$k_dyamic_internal = true;
	$root = get_home_path();
}

$wploadfile   = dirname( dirname( dirname( dirname( dirname(__FILE__) ) ) ) ).'/wp-load.php';
$wpconfigfile = dirname( dirname( dirname( dirname( dirname(__FILE__) ) ) ) ).'/wp-config.php';

/*if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
} else {
	die(' Error ');
}*/

if ( file_exists( $wploadfile ) ) {
	require_once( $wploadfile );
} elseif ( file_exists( $wpconfigfile ) ) {
	require_once( $wpconfigfile );
} else {
	die('/* Error */');
}


/**********************************************/
/* Functions */
$path = dirname( dirname(__FILE__) );
require_once( $path.'/inc/tools.php' ); // Functions
/* ------------------------------------ */
/* Creating variable for theme options */
global $apicona;
/* ------------------------------------ */

/*
 *  Generate dynamic style. Internal use only.
 */
if( isset($_GET['color']) && trim($_GET['color'])!='' ){
	$apicona['skincolor'] = '#'.trim($_GET['color']);
}


$logoMaxHeight       = ( isset($apicona['logo-max-height']) && trim($apicona['logo-max-height'])!='' ) ? trim($apicona['logo-max-height']) : '50' ;
$logoMaxHeightSticky = ( isset($apicona['logo-max-height-sticky']) && trim($apicona['logo-max-height-sticky'])!='' ) ? trim($apicona['logo-max-height-sticky']) : '50' ;

$headerHeight        = ( isset($apicona['header-height']) && trim($apicona['header-height'])!='' ) ? trim($apicona['header-height']) : '105' ;
$headerHeightSticky  = ( isset($apicona['header-height-sticky']) && trim($apicona['header-height-sticky'])!='' ) ? trim($apicona['header-height-sticky']) : '76' ;

$tbar_height         = ( isset($apicona['tbar-height']) && trim($apicona['tbar-height'])!='' ) ? trim($apicona['tbar-height']) : '180' ;

// Check if internal CSS or not
if( (isset($apicona['dynamic-style-position']) && $apicona['dynamic-style-position']=='internal') || ( isset($_GET['page']) && $_GET['page']=='wc-setup' ) || ( isset($_GET['page']) && $_GET['page']=='yellow-pencil-editor' ) || ( isset($_GET['payment_redirect']) ) ){ 
	// Nothing to do
} else {
	header("Content-type: text/css"); // Setting header for CSS file
}


/* Output start
------------------------------------------------------------------------------*/ ?>

<?php
/* Custom CSS Code at top */
if( isset($apicona['custom_css_code_top']) && trim($apicona['custom_css_code_top'])!='' ){
echo trim($apicona['custom_css_code_top']);
}
?>

/*------------------------------------------------------------------
* dynamic-style.php index *
[Table of contents]

1.  Background color
2.  Element Border color
3.  Textcolor
4.  Boxshadow
5.  Header / Footer background color
6.  Footer background color
7.  Logo Color
8.  Genral Elements
9. "Center Logo Between Menu" options

-------------------------------------------------------------------*/




/**
 * 1. Background color
 * ----------------------------------------------------------------------------
 */


.kwayy-heading-wrapper h1.kwayy-heading-align-center:after,
.kwayy-heading-wrapper h2.kwayy-heading-align-center:after,
.kwayy-heading-wrapper h3.kwayy-heading-align-center:after,
.kwayy-heading-wrapper h4.kwayy-heading-align-center:after,
.kwayy-heading-wrapper h5.kwayy-heading-align-center:after,
.kwayy-heading-wrapper h6.kwayy-heading-align-center:after,
.kwayy-heading-wrapper h1.kwayy-heading-align-left:after,
.kwayy-heading-wrapper h2.kwayy-heading-align-left:after,
.kwayy-heading-wrapper h3.kwayy-heading-align-left:after,
.kwayy-heading-wrapper h4.kwayy-heading-align-left:after,
.kwayy-heading-wrapper h5.kwayy-heading-align-left:after,
.kwayy-heading-wrapper h6.kwayy-heading-align-left:after,
.kwayy-heading-style-normal:after, 
.wpb_heading:after, 
.footer .widget-title:after, 
.sidebar .widget-title:after, 
.kwayy-portfolio-text h1:after,
.kwayy-blog-text h1:after, 
.kwayy_cta_sepline_yes.vc_call_to_action h4.wpb_heading:after,
.kwayy-btn-effect-colortoborder.kwayy-btn-color-skincolor,
.kwayy-row-bgtype-skin,
.kwayy-btn-effect-colortogrey.kwayy-btn-color-skincolor,
.kwayy-btn-effect-colortodarkgrey.kwayy-btn-color-skincolor, 
.kwayy-wbar-bgcolor-skincolor,
.kwayy-btn-effect-bordertocolor.kwayy-btn-color-skincolor:hover,
.kwayy-btn-effect-greytocolor.kwayy-btn-color-skincolor:hover,
.kwayy-btn-effect-darkgreytocolor.kwayy-btn-color-skincolor:hover,
.portfolio-sortable-list ul li a.selected, 
.portfolio-sortable-list ul li a:hover,
.kwayy-servicebox-righticon .kwayy-icon,
.kwayy-servicebox-lefticon .kwayy-icon,
.tp-caption.themeline,
.vc_progress_bar .vc_single_bar .vc_bar.striped, 
.footersocialicon,
.kwayy-post-left .entry-date,
body .owl-theme .owl-controls .owl-buttons div:hover,
.flex-direction-nav a:hover,
.tagcloud a:hover,
button, 
input[type="submit"], 
input[type="button"], 
input[type="reset"],
.kwayy-team-social-links a:hover,
.kwayy-row-bgcolor-grey .kwayy-btn-effect-colortoborder.kwayy-btn-color-white,
.kwayy-servicebox-bordercentericon .kwayy-icon,
.kwayy-heading-wrapper .kwayy-heading-align-right:after,
.kwayy-heading-style-normal.kwayy-heading-align-right:after,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, 
.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_layered_nav_filters ul li a, 
.woocommerce-page .widget_layered_nav_filters ul li a,
.item-thumbnail .icons i:hover,
.kwayy-team-box .kwayy-team-icons i:hover,
.vc_btn_skin,
.vc_btn_skincolor,
.wpb_skincolor,
.kwayy-pf-btn .wpb_button_a .wpb_button,
.kwayy-blogbox-btn .wpb_button_a .wpb_button,
.tp-caption.skin_divider,
.kwayy-testimonial-icon,
.kwayy-testimonial-wrapper .flex-control-paging li a.flex-active,
.wpb_gallery_slides .flex-control-paging li a.flex-active,
.kwayy-pagination .page-numbers.current,
.kwayy-pagination a.page-numbers:hover,
.woocommerce ul.products li.product .add_to_cart_button, 
.woocommerce-page ul.products li.product .add_to_cart_button,
.woocommerce-page ul.products li.product .button.product_type_variable,
.woocommerce ul.products li.product .button.product_type_variable,
.vc_progress_bar .vc_single_bar.skincolor .vc_bar,
.vc_progress_bar.vc_progress-bar-color-skincolor .vc_single_bar .vc_bar,
body.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, 
body.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle,
.kwayy-row-bgtype-colors.kwayy-row-bgprecolor-dark .kwayy-testimonial-wrapper .flex-control-paging li a.flex-active,
.kwayy-row-bgtype-video.kwayy-row-bgprecolor-dark .kwayy-testimonial-wrapper .flex-control-paging li a.flex-active,
.kwayy-row-bgprecolor-skin,
.kwayy-tst-contarea-text:after,
.kwayy-entry-date,
.nav-menu .children,
ul.nav-menu > li > a:before,
.kwayy-tbar-team-search-box-w,
.format-gallery .entry-content .page-links a:hover, 
.format-audio .entry-content .page-links a:hover, 
.format-status .entry-content .page-links a:hover, 
.format-video .entry-content .page-links a:hover, 
.format-chat .entry-content .page-links a:hover, 
.format-quote .entry-content .page-links a:hover, 
.page-links a:hover,
.widget_calendar  #today,
.woocommerce-page ul.products li.product .product_type_grouped:hover, 
.woocommerce ul.products li.product .product_type_grouped:hover,
.woocommerce div.product form.cart .button:hover, 
.woocommerce-page div.product form.cart .button:hover, 
.woocommerce #content div.product form.cart .button:hover, 
.woocommerce-page #content div.product form.cart .button:hover,
.woocommerce a.button:hover, 
.woocommerce-page a.button:hover, 
.woocommerce button.button, .woocommerce-page button.button:hover, 
.woocommerce input.button, .woocommerce-page input.button:hover, 
.woocommerce #respond input#submit:hover, 
.woocommerce-page #respond input#submit:hover, 
.woocommerce #content input.button:hover,
.woocommerce-page #content input.button:hover,
.woocommerce table.cart td.actions .button.alt:hover, 
.woocommerce-page table.cart td.actions .button.alt:hover, 
.woocommerce #content table.cart td.actions .button.alt:hover, 
.woocommerce-page #content table.cart td.actions .button.alt:hover,
.woocommerce-page #content input.button[name="update_cart"]:hover,
.woocommerce #content input.button[name="update_cart"]:hover,
.woocommerce-page #content input.button[name="apply_coupon"]:hover,
.woocommerce #content input.button[name="apply_coupon"]:hover,
.woocommerce #payment #place_order:hover, 
.woocommerce-page #payment #place_order:hover, 
.product-remove a,
.woocommerce .widget_price_filter .price_slider_amount .button:hover, 
.woocommerce-page .widget_price_filter .price_slider_amount .button:hover,
#totop:hover,
ul.nav-menu li li a:hover, 
ul.nav-menu li li:hover > a, 
ul.nav-menu li li.current-menu-item > a,  
div.nav-menu > ul li li a:hover, 
div.nav-menu > ul li li:hover > a, 
div.nav-menu > ul li li.current-menu-item > a,
.kwayy-team-term-list ul li a:hover,
.kwayy-team-term-list ul li.kwayy-active a,
.main-navigation .mega-menu-wrap ul.mega-menu > li.mega-menu-item > a:before,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.menu-item-language > a:before,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout .mega-sub-menu a:hover,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:hover,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu li:hover > a,
.main-navigation .mega-menu-wrap ul.mega-menu > li.mega-current-menu-ancestor > a:before,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu li.current-menu-item a,
#navbar #site-navigation .mega-menu-wrap .mega-menu-flyout .mega-sub-menu li.mega-current-menu-item > a,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout .mega-sub-menu li.mega-current-menu-item > a,

#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.menu-item-language > ul li:hover > a,

.widgettitle:after,
#bbpress-forums ul li.bbp-header,
#bbpress-forums button,
.bbp-submit-wrapper .button,
.widget .bbp-logged-in .button,
.tribe-events-list .tribe-events-event-cost span,
.item-thumbnail .tribe-events-event-cost,
#tribe-bar-form .tribe-bar-submit input[type=submit],
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"], 
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"]>a, 
#tribe_events_filters_wrapper input[type=submit], 
.tribe-events-button, 
#tribe-events .tribe-events-button, .tribe-events-button.tribe-inactive, 
#tribe-events .tribe-events-button:hover, 
.tribe-events-button:hover, 
.tribe-events-button.tribe-active:hover,
.single-tribe_events .tribe-events-schedule .tribe-events-cost,
.tribe-events-page-template .datepicker .datepicker-days table tr td:hover,
.kwayy-ibgcolor-skincolor,

.vc_button-2-wrapper .vc_btn_skin.vc_btn_square_outlined:hover,
.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover,
.vc_tta-container h2:after,

.tm-taxonomy-term-list ul li > a:hover,
.tm-taxonomy-term-list ul li.current-cat > a,

body .tm-sresult-form-wrapper,

.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background.vc_icon_element-background-color-skincolor,

.vc_pagination-color-skincolor.vc_pagination-style-outline .vc_active .vc_pagination-trigger,
.vc_tta-color-skincolor .vc_tta-tab>a  {

	background-color: <?php echo $apicona['skincolor']; ?>;
}

/* This is Titlebar Backgroundcolor */
<?php $tm_tb_opactiry = ( !empty($apicona['titlebar_bg_image_type']) && $apicona['titlebar_bg_image_type']=='noimg' ) ? '1' : '0.40' ; ?>
.kwayy-titlebar-wrapper .kwayy-titlebar-inner-wrapper{
	background-color:  rgba( <?php echo tm_hex2rgb($apicona['titlebar_bg_color']); ?> , <?php echo $tm_tb_opactiry; ?>);
}

/* These are titlebar background options*/
<?php 
if(!empty($apicona['titlebar_bg_repeat'])){ ?>
.site-header .kwayy-titlebar-wrapper{
	background-repeat: <?php echo $apicona['titlebar_bg_repeat']; ?>;
}
<?php
}
?>

<?php 
if(!empty($apicona['titlebar_bg_size'])){ ?>
.site-header .kwayy-titlebar-wrapper{
	background-size: <?php echo $apicona['titlebar_bg_size']; ?>;
}
<?php
}
?>

<?php 
if(!empty($apicona['titlebar_bg_attachment'])){ ?>
.site-header .kwayy-titlebar-wrapper{
	background-attachment: <?php echo $apicona['titlebar_bg_attachment']; ?>;
}
<?php
}
?>

<?php 
if(!empty($apicona['titlebar_bg_position'])){ ?>
.site-header .kwayy-titlebar-wrapper{
	background-position: <?php echo $apicona['titlebar_bg_position']; ?>;
}
<?php
}
?>

/* This is Titlebar padding for overlay header*/
.kwayy-header-overlay .kwayy-titlebar-wrapper .kwayy-titlebar-inner-wrapper{	
	padding-top: <?php echo ($headerHeight) ?>px;
}
.kwayy-header-style-3.kwayy-header-overlay .kwayy-titlebar-wrapper .kwayy-titlebar-inner-wrapper{	
	padding-top: <?php echo ($headerHeight+50) ?>px;
}

/* This is Titlebar Height */
.kwayy-titlebar-wrapper .kwayy-titlebar-inner-wrapper{
	height: <?php echo $tbar_height; ?>px;
}

/* This is Tranparent Backgroundcolor */
.vc_btn3.vc_btn3-style-classic.vc_btn3-color-skincolor:hover,
.kwayy-row-bgprecolor-skin:after,
.wpb_skincolor:hover{
	background: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.85)
}

body #shaon-pricing-table .priceTitle span,
body #shaon-pricing-table .featureTitle span,
.error404 a.back-button,
body.woocommerce nav.woocommerce-pagination ul li span.current, 
body.woocommerce #content nav.woocommerce-pagination ul li span.current, 
body.woocommerce-page nav.woocommerce-pagination ul li span.current, 
body.woocommerce-page #content nav.woocommerce-pagination ul li span.current,
.woocommerce ul.products li.product .onsale, 
.woocommerce-page ul.products li.product .onsale,
.woocommerce span.onsale, 
.woocommerce-page span.onsale{
	background: <?php echo $apicona['skincolor']; ?>;   
}

/* Rev-slider */
.vc_button-2-wrapper .vc_btn_skin.vc_btn_outlined:hover,
.vc_button-2-wrapper .vc_btn_skin.vc_btn_square_outlined:hover,
.vc_btn_skincolor.vc_btn_outlined:hover,
.vc_btn_skincolor.vc_btn_square_outlined:hover,
.tp-bullets .bullet.selected, 
.tp-leftarrow.default:hover,
.tp-rightarrow.default:hover,
.tp-button.skin,
.tp-caption.mediumskincolorbg,
.tparrows.gyges:hover,
.custom .tp-bullet.selected{
     background-color:  <?php echo $apicona['skincolor']; ?> !important;
}

/* Logo Max-Height */
.headercontent .headerlogo img{
     max-height: <?php echo $logoMaxHeight; ?>px;
}


/* Pricing Table */
a.ptp-button:hover,
.ptp-highlight a.ptp-button,
.ptp-highlight div.ptp-price {
	background-color:  <?php echo $apicona['skincolor']; ?> !important;
}
.vc_button-2-wrapper .vc_btn_skin.vc_btn_3d:hover,
.vc_button-2-wrapper .vc_btn_skin.vc_btn_rounded:hover,
.ptp-highlight div.ptp-plan {
	background-color: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.8) !important;
}



/**
 * 2. Element Border color
 * ----------------------------------------------------------------------------
 */

.kwayy-team-search-btn{
	border-top-color: <?php echo $apicona['skincolor']; ?>;
}
.kwayy-content-team-search-box .submit_field button:hover{
	border-color: <?php echo $apicona['skincolor']; ?>;
    color: <?php echo $apicona['skincolor']; ?>;
}
.api-brd-btn-skin{
	border-color: <?php echo $apicona['skincolor']; ?> !important;
    color: <?php echo $apicona['skincolor']; ?> !important;
}
.api-brd-btn-skin:hover{
	background-color:  <?php echo $apicona['skincolor']; ?> !important;
}



ul.nav-menu li li a:hover, 
ul.nav-menu li li:hover > a, 
ul.nav-menu li li.current-menu-item > a,  
div.nav-menu > ul li li a:hover, 
div.nav-menu > ul li li:hover > a, 
div.nav-menu > ul li li.current-menu-item > a,
.kwayy-team-term-list ul li a:hover,
.kwayy-team-term-list ul li.kwayy-active a,
.bbp-submit-wrapper .button:hover,
.widget .bbp-logged-in .button:hover

.tm-taxonomy-term-list ul > li:hover > a,
.tm-taxonomy-term-list ul > li.current-cat > a,

.vc_icon_element.vc_icon_element-outer 
.vc_icon_element-inner.vc_icon_element-outline.vc_icon_element-background-color-skincolor,
.vc_separator.vc_sep_color_skincolor .vc_sep_line{
	
    border-color: <?php echo $apicona['skincolor']; ?>;
}
/* This is Genaral css */
.portfolio-sortable-list ul li a.selected, 
.portfolio-sortable-list ul li a:hover, 
.tagcloud a:hover,
.kwayy-row-bgcolor-grey .kwayy-btn-effect-colortoborder.kwayy-btn-color-white:hover,
#content #bbpress-forums ul.bbp-forums, 
#content #bbpress-forums ul.bbp-topics,
.widget .bbp-logged-in .button:hover,
.df-layout-grand .toggle2 .wpb_toggle_title_active, 
.df-layout-grand #ui-datepicker-div .ui-datepicker-today, 
.tribe-events-page-template .datepicker table tr td.active.active, 
.tribe-events-page-template .datepicker table tr td span.active.active, 
.ui-timepicker-div .ui-slider-handle, .widget_tag_cloud .tagcloud a:hover, 
.df-layout-grand .ui-datepicker-calendar tbody tr td:hover, 
.ui-datepicker-calendar .dp-highlight-begin, .ui-datepicker-calendar .dp-highlight, 
.ui-datepicker-calendar .dp-highlight-end {
	border: 1px solid <?php echo $apicona['skincolor']; ?>;
}
.kwayy-pagination .page-numbers.current, .kwayy-pagination .page-numbers:hover {
    border-right: 1px solid <?php echo $apicona['skincolor']; ?>;
}

.vc_button-2-wrapper .vc_btn_skin.vc_btn_outlined,
.vc_button-2-wrapper .vc_btn_skin.vc_btn_square_outlined,
.vc_btn3.vc_btn3-style-classic.vc_btn3-color-skincolor:hover,
.kwayy-carousel-controls-inner a:hover,
.kwayy-row-bgprecolor-dark .vc_btn_skincolor.vc_btn_square:hover,
.entry-content .vc_btn_skincolor:hover, 
.vc_btn_skincolor:hover,
.vc_button-2-wrapper .vc_btn_skin:hover,
blockquote,
.vc_btn_skincolor.vc_btn_outlined, 
.vc_btn_skincolor.vc_btn_square_outlined,
.vc_btn_skincolor.vc_btn_outlined:hover, 
.vc_btn_skincolor.vc_btn_square_outlined:hover,
.tribe-events-list .tribe-events-event-cost span,
.item-thumbnail .tribe-events-event-cost,
#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
.vc_general.vc_cta3.vc_cta3-color-skincolor.vc_cta3-style-outline,
.vc_pagination-color-skincolor.vc_pagination-style-outline .vc_pagination-trigger
{
	border-color: <?php echo $apicona['skincolor']; ?>;
}



.vc_tta-tabs-position-left.vc_tta-color-white.vc_tta-style-classic .vc_tta-tab.vc_active > a{
	border-left: 2px solid <?php echo $apicona['skincolor']; ?>;
}
.tm-taxonomy-term-list ul li > a:hover{
	border-bottom-color: <?php echo $apicona['skincolor']; ?>;
}

.vc_toggle_color_skincolor .vc_tta-panels-container .vc_toggle_icon,
.vc_toggle_color_skincolor .vc_tta-panels-container .vc_toggle_icon::before,
.vc_toggle_color_skincolor .vc_tta-panels-container .vc_toggle_icon::after,

.vc_tta-color-skincolor .vc_tta-panels-container .vc_tta-panel .vc_tta-panel-heading,
.vc_toggle_color_skincolor.vc_toggle_default .vc_toggle_icon {
    border-color: <?php echo $apicona['skincolor']; ?>;
    background-color: <?php echo $apicona['skincolor']; ?>;
}

.vc_tta-color-skincolor.vc_tta-style-outline.vc_tta-tabs .vc_tta-panels-container .vc_tta-panels,
.vc_tta-color-skincolor.vc_tta-style-outline.vc_tta-tabs .vc_tta-panels-container .vc_tta-panels,
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-tab.vc_active>a,

.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-controls-icon::after,  
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body::after,
.vc_toggle_color_skincolor.vc_toggle_default .vc_toggle_icon::before {
    border-color: <?php echo $apicona['skincolor']; ?>;
}

.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a {
    border-color: <?php echo $apicona['skincolor']; ?>;
    color: <?php echo $apicona['skincolor']; ?>;
}

.vc_tta-color-skincolor.vc_tta-style-outline.vc_tta .vc_tta-tab.vc_active>a,
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-title>a {
   color: <?php echo $apicona['skincolor']; ?>;
}

.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:focus, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:hover,
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-heading:hover,
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-heading:hover,

.vc_pagination-color-skincolor.vc_pagination.vc_pagination-style-flat .vc_pagination-trigger, 
.vc_pagination-color-skincolor.vc_pagination.vc_pagination-style-outline .vc_active .vc_pagination-trigger, 
.vc_pagination-color-skincolor.vc_pagination.vc_pagination-style-outline .vc_pagination-trigger:hover,

.vc_pagination-color-skincolor.vc_pagination.vc_pagination-style-flat .vc_active .vc_pagination-trigger, 
.vc_pagination-color-skincolor.vc_pagination.vc_pagination-style-flat .vc_pagination-trigger:hover,
.vc_toggle_color_skincolor.vc_toggle_default .vc_toggle_icon::after, 
.vc_toggle_color_skincolor.vc_toggle_default .vc_toggle_icon::before,
 
.vc_tta-color-skincolor.vc_tta-style-flat.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading,
.vc_tta-color-skincolor.vc_tta-style-flat.vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading{
  background-color: <?php echo $apicona['skincolor']; ?>;
}

.vc_tta-color-skincolor.vc_tta-style-flat.vc_tta-tabs .vc_tta-panels-container .vc_tta-panels,
.vc_tta-color-skincolor.vc_tta-style-flat  .vc_tta-tab.vc_active>a,

.vc_tta-color-skincolor.vc_tta-style-flat.vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading:focus, 
.vc_tta-color-skincolor.vc_tta-style-flat.vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading:hover,
.vc_tta-color-skincolor.vc_tta-style-flat.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading,
.vc_tta-color-skincolor.vc_tta-style-flat.vc_tta-accordion .vc_tta-panel .vc_tta-panel-body {
   background-color: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.90);
}

.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-heading,
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-heading,
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-heading {
     border-color: <?php echo $apicona['skincolor']; ?>;
     background-color: transparent;
}

.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:focus, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:hover {
    background-color: <?php echo $apicona['skincolor']; ?>;
    color: #fff;
}
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab.vc_active>a {
   border-color: <?php echo $apicona['skincolor']; ?>;
   color: <?php echo $apicona['skincolor']; ?>;
   background-color: transparent;
}


/**
 * 3. Textcolor
 * ----------------------------------------------------------------------------
 */
.kwayy-row-textcolor-skin p,

.kwayy-row-textcolor-skin ul,
.kwayy-row-textcolor-skin ol,
.kwayy-row-textcolor-skin li

{
	color:rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.7);
}

.kwayy-skincolor,
.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-skincolor .vc_icon_element-icon,
a:hover,
.comment-content a,
.skincolor, .site-title span, 
.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon:before,
.comment-content a:hover,
.kwayy-btn-effect-bordertocolor.kwayy-btn-color-skincolor span,
.kwayy-btn-effect-colortoborder.kwayy-btn-color-skincolor,
.kwayy-btn-effect-colortoborder.kwayy-btn-color-skincolor:hover span,
.widget a:hover,
.kwayy-servicebox-lefticonspacing .kwayy-icon,
.kwayy-row-bgprecolor-skin .kwayy-servicebox .kwayy-ibgcolor.kwayy-icon,
.kwayy-carousel-controls-inner a:hover i,
.kwayy-row-bgtype-colors.kwayy-row-bgprecolor-skin .kwayy-testimonial-icon i,
.kwayy-row-bgtype-video.kwayy-row-bgprecolor-skin .kwayy-testimonial-icon i,
.kwayy-testimonial-title,
.kwayy-testimonial-title a,
.kwayy-meta-details a:hover,
.kwayy-post-right .entry-title a:hover,
input[type="submit"]:hover, 
input[type="button"]:hover, 
input[type="reset"]:hover,
.nav-links a[rel="prev"]:hover, 
.nav-links a[rel="next"]:hover,
.colored,
.kwayy-row-bgcolor-grey .kwayy-btn-effect-colortoborder.kwayy-btn-color-white:hover span,
.portfolio-wrapper .item:hover .item-content h4 a, 
.portfolio-box .item:hover .item-content h4 a,
.kwayy-heading-sepicon i,
.kwayy_footer_menu ul li a:hover,
.copyright .kwayy_footer_text a:hover,
.vc_btn.vc_btn_round.vc_btn_skincolor:hover,
.woocommerce ul.products li.product .add_to_cart_button:hover, 
.woocommerce-page ul.products li.product .add_to_cart_button:hover, 
.woocommerce-page ul.products li.product .button.product_type_variable:hover, 
.woocommerce ul.products li.product .button.product_type_variable:hover,
.woocommerce .star-rating span:before, 
.woocommerce-page .star-rating span:before,
.wpb_tour.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a, 
.wpb_tabs.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a,
.vc_general.vc_tta-color-white.vc_tta-style-classic .vc_tta-tab.vc_active>a,
.woocommerce div.product span.price, 
.woocommerce-page div.product span.price, 
.woocommerce #content div.product span.price, 
.woocommerce-page #content div.product span.price, 
.woocommerce div.product p.price,
.woocommerce-page div.product p.price, 
.woocommerce #content div.product p.price, 
.woocommerce-page #content div.product p.price,
body.error404 .page-content h1,
body.error404 .page-content i:before,
ul.kwayy_vc_contact_wrapper li:before,
.kwayy-titlebar-wrapper .breadcrumb-wrapper a:hover,
.kwayy-portfolio-likes-wrapper .like-active,
.kwayy-team-box:hover .kwayy-team-title,
.kwayy-team-title a:hover,
ul.nav-menu > li.current-menu-item > a, 
div.nav-menu > ul > li.current_page_item > a,
ul.nav-menu > li:hover > a,
ul.nav-menu > li:hover > a, 
ul.nav-menu > li a:hover, 
div.nav-menu > ul > li.current_page_item > a:hover, 
div.nav-menu > ul > li:hover > a,
ul.nav-menu li ul, 
div.nav-menu > ul .children,
ul.nav-menu > li.current-menu-ancestor > a,
a.kwayy-portfolio-likes,
.kwayy-servicebox.kwayy-servicebox-centericon .kwayy-icon,
.kwayy-servicebox.kwayy-servicebox-righticonspacing .kwayy-icon,
.inside .kwayy-fid-wrapper i,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-current-menu-parent > a,
.kwayy-team-cat-links a,
.item-content h4 a:hover,
.kwayy-sb-main-link a,
.kwayy-post-readmore a,
.kwayy-tbar-team-search-box .submit_field button:hover,
.widget_calendar tbody a,
.widget_calendar a,
.site-main ul li:before,
ul.special li:before,
ol.special li:before,
.kwayy-blogbox-btn .wpb_button_a .wpb_button:hover,
.kwayy-pf-btn .wpb_button_a .wpb_button:hover, 
.kwayy-blogbox-btn .wpb_button_a .wpb_button:hover,
.entry-content .vc_btn_skincolor:hover, 
.vc_btn_skincolor:hover,
body.search-no-results .page-content .kwayy-big-icon i:before,
.kwayy-row-textcolor-skin h1, 
.kwayy-row-textcolor-skin h2, 
.kwayy-row-textcolor-skin h3, 
.kwayy-row-textcolor-skin h4, 
.kwayy-row-textcolor-skin h5, 
.kwayy-row-textcolor-skin h6, 
.kwayy-row-textcolor-skin span,
.large-skincolor-bold,
.woocommerce-page ul.products li.product .product_type_grouped, 
.woocommerce ul.products li.product .product_type_grouped,
.woocommerce div.product form.cart .button, 
.woocommerce-page div.product form.cart .button, 
.woocommerce #content div.product form.cart .button, 
.woocommerce-page #content div.product form.cart .button,
.woocommerce a.button, 
.woocommerce-page a.button, 
.woocommerce button.button, .woocommerce-page button.button, 
.woocommerce input.button, .woocommerce-page input.button, 
.woocommerce #respond input#submit, 
.woocommerce-page #respond input#submit, 
.woocommerce #content input.button,
.woocommerce-page #content input.button
.woocommerce table.cart td.actions .button.alt, 
.woocommerce-page table.cart td.actions .button.alt, 
.woocommerce #content table.cart td.actions .button.alt, 
.woocommerce-page #content table.cart td.actions .button.alt,
.woocommerce-page #content input.button[name="update_cart"],
.woocommerce #content input.button[name="update_cart"],
.woocommerce-page #content input.button[name="apply_coupon"],
.woocommerce #content input.button[name="apply_coupon"],
.woocommerce #payment #place_order, 
.woocommerce-page #payment #place_order,
.woocommerce .widget_price_filter .price_slider_amount .button, 
.woocommerce-page .widget_price_filter .price_slider_amount .button,
.comment-reply-link:hover,
.comment-meta a:hover,
.widget_calendar #today a:hover,
#bbpress-forums button:hover,
#content #bbpress-forums ul.topic:hover a.bbp-topic-permalink,
#content #bbpress-forums ul.forum:hover a.bbp-forum-title,
.bbp-submit-wrapper .button:hover,
.widget .bbp-logged-in .button:hover,
.site-main .widget ul > li.current-menu-item > a,
.site-main .widget ul > li.current_page_item > a,

.menu.navgoco > li > a.current_page_item,
.menu.navgoco > li > a.current_page_parent,

.k_flying_searchform .k_searchlink a:hover,
.footer.footer-text-color-dark .widget a:hover,
.footer.footer-text-color-white .widget a:hover,
#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
.kwayy-icontext i:before,

.woocommerce ul.products li.product a:hover h3,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
body .kwayy-fbar-widgets-area .widget .tagcloud a:hover,
.kwayy-fbar-widgets-area input[type="submit"],


.vc_button-2-wrapper .vc_btn_skin.vc_btn_square_outlined,
.vc_button-2-wrapper .vc_btn_skin:hover,
.vc_cta3-container .vc_general.vc_cta3.vc_cta3-color-skincolor .vc_cta3-content-header h2,
.vc_cta3-container .vc_general.vc_cta3.vc_cta3-color-skincolor .vc_cta3-content-header h4,
.kwayy-row-textcolor-skin .vc_cta3-container .vc_general.vc_cta3 .vc_cta3-content-header h2,
.kwayy-row-textcolor-skin .vc_cta3-container .vc_general.vc_cta3 .vc_cta3-content-header h4,
.vc_tta-color-white.vc_tta-style-classic .vc_tta-tab.vc_active > a,

.vc_button-2-wrapper .vc_btn_skin.vc_btn_outlined,

.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a,
.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title:hover > a{
	color: <?php echo $apicona['skincolor']; ?>;
}

.vc_btn_skincolor.vc_btn_outlined, 
.vc_btn_skincolor.vc_btn_square_outlined,
.wpb_call_to_action .wpb_button_a .wpb_button.wpb_skincolor:hover,
.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a:hover, 
.vc_general.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb_accordion .wpb_accordion_wrapper .ui-state-active a,
.main-navigation .mega-menu-wrap ul.mega-menu > li.mega-menu-item.mega-toggle-on > a, 
.main-navigation .mega-menu-wrap ul.mega-menu > li.mega-menu-item:hover > a,
.main-navigation .mega-menu-wrap ul.mega-menu > li.mega-current-menu-ancestor > a,
.main-navigation .mega-menu-wrap ul.mega-menu > li.mega-current-menu-item > a,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.menu-item-language:hover > a{
	color: <?php echo $apicona['skincolor']; ?> !important;
}

/**
 * 4. Boxshadow
 * ----------------------------------------------------------------------------
 */
.kwayy-btn-effect-colortoborder.kwayy-btn-color-skincolor:hover,
.kwayy-btn-effect-bordertocolor.kwayy-btn-color-skincolor,
button:hover, 
input[type="submit"]:hover, 
input[type="button"]:hover, 
input[type="reset"]:hover,
.vc_btn.vc_btn_round.vc_btn_skincolor:hover,
.wpb_call_to_action .wpb_button_a .wpb_button.wpb_skincolor:hover,
.kwayy-pf-btn .wpb_button_a .wpb_button:hover,
.kwayy-blogbox-btn .wpb_button_a .wpb_button:hover,
.woocommerce ul.products li.product .add_to_cart_button:hover, 
.woocommerce-page ul.products li.product .add_to_cart_button:hover, 
.woocommerce-page ul.products li.product .button.product_type_variable:hover, 
.woocommerce ul.products li.product .button.product_type_variable:hover{
	box-shadow: 0 0 0 1px <?php echo $apicona['skincolor']; ?> inset;	
}
/* This is Boxshadow */
.tp-button.skin:hover{
	box-shadow: 0 0 0 1px <?php echo $apicona['skincolor']; ?> inset !important;	
}


.vc_btn_skincolor.vc_btn_3d {
	background-color:  rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.8);
    -webkit-box-shadow: 0 5px 0 rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 1);
    box-shadow: 0 5px 0 rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 1);
}

.vc_button-2-wrapper .vc_btn_skin.vc_btn_3d{	
    -webkit-box-shadow: 0 3px 0  <?php echo adjustBrightness($apicona['skincolor'], -20); ?>;
    box-shadow: 0 3px 0  <?php echo adjustBrightness($apicona['skincolor'], -20); ?>;
}


.vc_btn_skincolor.vc_btn_3d:hover{
	background-color:  rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.9);
}
body.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, 
body.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle{
	background: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.7);
}
body .minimal .p1 h4{
	background: <?php echo $apicona['skincolor']; ?>;
    box-shadow: 0 1px 1px rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.7) inset;
}
body .minimal .highlight h3{
	background: <?php echo adjustBrightness($apicona['skincolor'], -20); ?>;
}

body .pagination span.current,
body.woocommerce nav.woocommerce-pagination ul li span, 
body.woocommerce #content nav.woocommerce-pagination ul li span, 
body.woocommerce-page nav.woocommerce-pagination ul li span, 
body.woocommerce-page #content nav.woocommerce-pagination ul li span{
	border: 1px solid <?php echo $apicona['skincolor']; ?>;
}
.woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce-page nav.woocommerce-pagination ul li a:hover, 
.woocommerce #content nav.woocommerce-pagination ul li a:hover,
.woocommerce-page #content nav.woocommerce-pagination ul li a:hover  {
 	background-color: <?php echo $apicona['skincolor']; ?>;
    border-color: <?php echo $apicona['skincolor']; ?>;
}
.woocommerce-page ul.products li.product .product_type_grouped, 
.woocommerce ul.products li.product .product_type_grouped,
.woocommerce div.product form.cart .button, 
.woocommerce-page div.product form.cart .button, 
.woocommerce #content div.product form.cart .button, 
.woocommerce-page #content div.product form.cart .button,
.woocommerce a.button, 
.woocommerce-page a.button, 
.woocommerce button.button, .woocommerce-page button.button, 
.woocommerce input.button, .woocommerce-page input.button, 
.woocommerce #respond input#submit, 
.woocommerce-page #respond input#submit, 
.woocommerce #content input.button,
.woocommerce-page #content input.button
.woocommerce table.cart td.actions .button.alt, 
.woocommerce-page table.cart td.actions .button.alt, 
.woocommerce #content table.cart td.actions .button.alt, 
.woocommerce-page #content table.cart td.actions .button.alt,
.woocommerce-page #content input.button[name="update_cart"],
.woocommerce #content input.button[name="update_cart"],
.woocommerce-page #content input.button[name="apply_coupon"],
.woocommerce #content input.button[name="apply_coupon"],
.woocommerce #payment #place_order, 
.woocommerce-page #payment #place_order,
.woocommerce .widget_price_filter .price_slider_amount .button, 
.woocommerce-page .widget_price_filter .price_slider_amount .button{
	box-shadow: 0 0 0 2px  <?php echo $apicona['skincolor']; ?> inset;	    
}

/**
 * 5. Header / Footer background color
 * ----------------------------------------------------------------------------
 */
header .headerblock .header-inner, #stickable-header-sticky-wrapper,
.kwayy-header-style-3 .is-sticky #navbar {
	background-color: <?php echo $apicona['headerbgcolor']; ?>;
}

.kwayy-header-style-3.kwayy-header-overlay header .headerblock .is-sticky #navbar, 
header .headerblock .is-sticky #stickable-header, 
.kwayy-header-style-4 header .headerblock .is-sticky #stickable-header .container .headercontent, 
.kwayy-header-style-4 header .headerblock .is-sticky #stickable-header .container-full .headercontent {
   background-color: <?php echo $apicona['stickyheaderbgcolor']; ?>;
}

/**
 * 6. Footer background color
 * ----------------------------------------------------------------------------
 */
footer.site-footer > div.footer{
	background-color: <?php echo $apicona['footerwidget_bgcolor']; ?>;
}
footer.site-footer > div.site-info{
	background-color: <?php echo $apicona['footertext_bgcolor']; ?>;
}


/**
 * 7. Logo Color
 * ----------------------------------------------------------------------------
 */

h1.site-title{
	color: <?php echo $apicona['logo_font']['color']; ?>;
}

/**
 * 8. Genral Elements
 * ----------------------------------------------------------------------------
 */
 
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a.mega-menu-link:hover,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.menu-item-language > ul li:hover > a,
 
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout .mega-sub-menu li.mega-current-menu-item > a,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu li:hover > a,
#navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu li.current-menu-item a,
#navbar #site-navigation .mega-menu-wrap .mega-menu-flyout .mega-sub-menu li.mega-current-menu-item > a{
    border-bottom: 1px solid <?php echo $apicona['skincolor']; ?>;
    border-right: 1px solid <?php echo $apicona['skincolor']; ?>;
}
/* Site Pre-loader image */
<?php if( isset($apicona['loaderimage_custom']['url']) && $apicona['loaderimage_custom']['url']!='' ): ?>
.pageoverlay{
	background-image:url('<?php echo $apicona['loaderimage_custom']['url']; ?>');
}
<?php elseif( $apicona['loaderimg']!='' ): ?>
.pageoverlay{
	background-image:url('../images/loader<?php echo $apicona['loaderimg']; ?>.gif');
}
<?php endif; ?>







/* *** Header height *** Sticky Header Height *** */

/* *** Header height *** */
.headerlogo,
.search_box, 
.thememount-header-cart-link-wrapper{
	height: <?php echo $headerHeight; ?>px !important;
	line-height: <?php echo $headerHeight; ?>px !important;
}


ul.nav-menu > li > a:before,
div.nav-menu > ul > li > a:before,
.main-navigation .mega-menu-wrap ul.mega-menu > li.mega-menu-item > a:before{
	top: <?php echo ceil($headerHeight/2)+30; ?>px;
}
ul.nav-menu > li:hover > a:before,
div.nav-menu > ul > li:hover > a:before,
.main-navigation .mega-menu-wrap ul.mega-menu > li.mega-menu-item:hover > a:before {
    top: <?php echo ceil($headerHeight/2)+15; ?>px;
}
.kwayy-header-style-1 .k_flying_searchform .k_searchlink a,
.kwayy-header-style-2 .k_flying_searchform .k_searchlink a{
	margin-top: <?php echo ceil($headerHeight/2)-17; ?>px;
}
.kwayy-header-style-1 .sticky-wrapper.is-sticky .k_flying_searchform .k_searchlink a,
.kwayy-header-style-2 .sticky-wrapper.is-sticky .k_flying_searchform .k_searchlink a{
	margin-top: <?php echo ceil($headerHeightSticky/2)-17; ?>px;
}
#navbar #site-navigation .mega-menu-wrap .mega-menu-toggle{
	top: <?php echo ceil($headerHeight/2)-20; ?>px;
}

/* *** Sticky Header Height *** */
.is-sticky .headerlogo,
.is-sticky .search_box, 
.is-sticky .thememount-header-cart-link-wrapper{
	height: <?php echo $headerHeightSticky; ?>px !important;
	line-height: <?php echo $headerHeightSticky; ?>px !important;
}
.is-sticky ul.nav-menu li > ul,
.is-sticky ul.nav-menu li:hover > ul,
.is-sticky div.nav-menu > ul li > ul,
.is-sticky div.nav-menu > ul li:hover > ul{
	top: <?php echo $headerHeightSticky; ?>px;
}




/* *** vc btn3 *** */

.vc_btn3.vc_btn3-style-modern.vc_btn3-color-skincolor,
.vc_btn3.vc_btn3-style-outline.vc_btn3-color-skincolor:hover {
	background-color: <?php echo $apicona['skincolor']; ?>;
    border-color: <?php echo $apicona['skincolor']; ?>;
}
.vc_btn3.vc_btn3-style-modern.vc_btn3-color-skincolor:hover {
	background-color: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.90);
    border-color: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.90);
}
.vc_btn3.vc_btn3-style-classic.vc_btn3-color-skincolor,
.vc_btn3.vc_btn3-style-flat.vc_btn3-color-skincolor,
.vc_general.vc_cta3.vc_cta3-color-skincolor.vc_cta3-style-flat {
	background-color: <?php echo $apicona['skincolor']; ?>;
}
<?php /*?>.vc_btn3.vc_btn3-style-classic.vc_btn3-color-skincolor:hover {
	background-color: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.80);
}<?php */?>
.vc_btn3.vc_btn3-style-flat.vc_btn3-color-skincolor:hover,
.vc_btn3.vc_btn3-style-outline.vc_btn3-color-skincolor{
	border-color: <?php echo $apicona['skincolor']; ?>;
    color: <?php echo $apicona['skincolor']; ?>;
}
.vc_btn3.vc_btn3-style-3d.vc_btn3-color-skincolor {
    background-color: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.85);
    -webkit-box-shadow: 0 3px 0 rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 1);
    box-shadow: 0 3px 0 rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 1);
}
.vc_btn3.vc_btn3-style-3d.vc_btn3-color-skincolor:hover {
    background-color: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.90);
     -webkit-box-shadow: 0 5px 0 rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 1);
    box-shadow: 0 2px 0 rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 1);
}

.vc_general.vc_cta3.vc_cta3-color-skincolor.vc_cta3-style-3d  {
	 background-color: rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.90);
      -webkit-box-shadow: 0 5px 0 rgba( <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 1);
}





/**
 * "Center Logo Between Menu" options
 * ----------------------------------------------------------------------------
 */
<?php
if( isset($apicona['center-logo-width']) && $apicona['center-logo-width']!='' ){
?>
.kwayy-header-style-2 #stickable-header ul.nav-menu > li.logo-after-this, 
.kwayy-header-style-2 #navbar #site-navigation .mega-menu-wrap .mega-menu > li.mega-logo-after-this{
	margin-right: <?php echo $apicona['center-logo-width']; ?>px;
   }
.kwayy-header-style-2 h1.site-title { width: <?php echo $apicona['center-logo-width']; ?>px;; margin: 0 auto; }
<?php
}
?>


<?php
if( isset($apicona['first-menu-margin']) && $apicona['first-menu-margin']!='' ){
?>
.kwayy-header-style-2 #stickable-header ul.nav-menu > li:first-child, 
.kwayy-header-style-2 #stickable-header div.nav-menu > ul > li:first-child,
.kwayy-header-style-2  #navbar #site-navigation .mega-menu-wrap .mega-menu > li:first-child{margin-left: <?php echo $apicona['first-menu-margin']; ?>px;}
<?php
}
?>



/* ********************* Responsive Menu Code Start *************************** */
<?php
/*
 *  Generate dynamic style for responsive menu. The code with breakpoint.
 */
require( get_template_directory().'/css/dynamic-menu-style.php' ); // Functions
?>
/* ********************** Responsive Menu Code END **************************** */




/******************************************************/
/******************* Custom Code **********************/

<?php echo trim($apicona['custom_css_code']); ?>

/******************************************************/
