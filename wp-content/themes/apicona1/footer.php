<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */
global $apicona;

$themestyle = tm_get_theme_style();

if($themestyle == 'apiconaadv'){
	
$footerContainer = 'container';
if( isset($apicona['layout']) && $apicona['layout']=='fullwide' ){
	if( isset($apicona['full_wide_elements']['footer']) && $apicona['full_wide_elements']['footer']=='1' )
	$footerContainer = 'container-full';
}




// If footer widgets set than need to add class in footer-copyright area
$footer_no_widget_class     = '';
$footer_1st_no_widget_class = '';
$footer_2nd_no_widget_class = '';

// First row
if ( !is_active_sidebar( 'first-top-footer-widget-area' )
&& !is_active_sidebar( 'second-top-footer-widget-area' )
&& !is_active_sidebar( 'third-top-footer-widget-area' )
&& !is_active_sidebar( 'fourth-top-footer-widget-area' ) ) {
	$footer_1st_no_widget_class = 'tm-footer-1st-row-no-widgets';
}

// second row
if ( !is_active_sidebar( 'first-footer-widget-area' )
&& !is_active_sidebar( 'second-footer-widget-area' )
&& !is_active_sidebar( 'third-footer-widget-area' )
&& !is_active_sidebar( 'fourth-footer-widget-area' ) ) {
	$footer_2nd_no_widget_class = 'tm-footer-2nd-row-no-widgets';
}

if( $footer_1st_no_widget_class=='tm-footer-1st-row-no-widgets' && $footer_2nd_no_widget_class=='tm-footer-2nd-row-no-widgets' ){
	$footer_no_widget_class = 'tm-footer-no-widgets';
}



 
?>

</div>
<!-- #main-inner -->
</div>
<!-- #main -->


<footer id="colophon" class="site-footer">

  
  
<div class="footer footer-text-color-<?php echo sanitize_html_class($apicona['footerwidget_color']); ?>">
	<div class="footer-inner <?php echo $footer_no_widget_class; ?>">
	
		<?php if($footer_1st_no_widget_class!='tm-footer-1st-row-no-widgets') :?>
		<div class="tm-footer-first-row <?php echo $footerContainer; ?>">
			<div class="row multi-columns-row">
				<?php get_sidebar( 'footertop' ); ?>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if($footer_2nd_no_widget_class!='tm-footer-2nd-row-no-widgets') :?>
		<div class="tm-footer-second-row <?php echo $footerContainer; ?>">
			<div class="row multi-columns-row">
				<?php get_sidebar( 'footer' ); ?>
			</div>
		</div>
		<?php endif; ?>
		
  
		<div class="site-info site-info-text-color-<?php echo sanitize_html_class($apicona['footer_copyright_color']); ?> ">
			<div class="site-info-overlay">
				<div class="container">
				  <div class="site-info-inner">
					<div class="row">
					  <div class="col-xs-12 col-sm-6 tm-footer-text-left">
							<?php
								global $apicona;
								if( isset($apicona['copyrights']) && trim($apicona['copyrights'])!='' ){
									echo do_shortcode(
										wp_kses( /* HTML Filter */
											$apicona['copyrights'],
											array(
												'a' => array(
													'href' => array(),
													'title' => array()
												),
												'br' => array(),
												'em' => array(),
												'strong' => array(),
												'ul' => array(
													'class' => array(),
												),
												'li' => array(
													'class' => array(),
												),
												'div' => array(
													'class' => array(),
												),
												'span' => array(
													'class' => array(),
												),
												'i' => array(
													'class' => array(),
												),
												
											)
										)
									);
								}
							?>
						</div> 
						<!--.tm-footer-text-left -->
						
					   <div class="col-xs-12 col-sm-6 tm-footer-text-right">
							<?php
						
								global $apicona;
								if( isset($apicona['footer_copyright_right']) && trim($apicona['footer_copyright_right'])!='' ){
									echo do_shortcode(
										wp_kses( /* HTML Filter */
											$apicona['footer_copyright_right'],
											array(
												'a' => array(
													'href' => array(),
													'title' => array()
												),
												'br' => array(),
												'em' => array(),
												'strong' => array(),
												'ul' => array(
													'class' => array(),
												),
												'li' => array(
													'class' => array(),
												),
												'div' => array(
													'class' => array(),
												),
												'span' => array(
													'class' => array(),
												),
												'i' => array(
													'class' => array(),
												),
											)
										)
									);
								}
							?>
						</div> 
						<!--.tm-footer-text-left -->
					  
					</div>
					<!--.row --> 
				  </div>
				</div>
				<!-- .container --> 
			</div>
			<!-- .site-info-overlay --> 
		</div>
    <!-- .site-info --> 
	</div>
	<!-- .footer-inner --> 
</div>
<!-- .footer -->
  
</footer>
<!-- #colophon -->
</div>
<!-- #page -->

</div>
<!-- .main-holder.animsition --> 
<div class="floatingbox"></div>

<?php echo tm_get_search_form(); ?>	
	
<a id="totop" href="#top" style="display: none;"><i class="fa fa-angle-up"></i></a>


<?php wp_footer(); ?>
</body></html>

<?php 
}else if($themestyle == 'apicona'){
	

?>

				
		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
        	<div class="footer footer-text-color-<?php echo $apicona['footerwidget_color']; ?>">
			<?php /* ?>
              <div class="footersocialicon">
                  <div class="container">
                        <div class="row">
                          <div class="col-xs-12"><?php echo kwayy_get_social_links(); ?></div>
                        </div>                
                  </div>                
              </div>
			  <?php */ ?>
				<div class="container">
					<div class="row">
						<?php get_sidebar( 'footer' ); ?>
					</div>
				</div>
            </div>
			<div class="site-info footer-info-text-color-<?php echo $apicona['footertext_color']; ?>">
                <div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 copyright">
							<span class="kwayy_footer_text"><?php
							global $apicona;
							if( isset($apicona['copyrights']) && trim($apicona['copyrights'])!='' ){
								//$tm_footer_copyright = apply_filters('the_content', $apicona['copyrights']);
								//echo $tm_footer_copyright;
								echo do_shortcode( nl2br($apicona['copyrights']) );
							}
							?>
							</span> 
						</div><!--.copyright -->
					
						<?php if ( has_nav_menu( 'footer' ) ){ ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 kwayy_footer_menu">
								<?php
									wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-nav-menu', 'container' => false ) ); 
								?>
							</div><!--.footer menu -->
						<?php } ?>
					  
                    </div><!--.row -->
				</div><!-- .site-info -->
			</div><!-- .container -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
	
	</div><!-- .main-holder.animsition -->

    <a id="totop" href="#top" style="display: none;"><i class="kwicon-fa-angle-up"></i></a>
	
	<?php wp_footer(); ?>
	
</body>
</html>

<?php } ?>