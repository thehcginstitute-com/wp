<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

get_header();

global $apicona;
$themestyle = tm_get_theme_style();

?>
<div class="container">
	<div class="row">
	
		<div id="primary" class="content-area col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div id="content" class="site-content" role="main">

				<div class="page-wrapper">
					<div class="page-content">
						<?php 
							if( $themestyle == 'apiconaadv' ){?> 
								<div class="thememount-big-icon"><i class="<?php echo 'kwicon-'.esc_attr($apicona['error404_big_icon']); ?>"></i></div>
								<h1><?php esc_attr_e($apicona['error404_big_text'], 'apicona'); ?></h1>
								<p><?php esc_attr_e($apicona['error404_medium_text'], 'apicona'); ?></p>
								<br><br><br>
						<?php }else if( $themestyle == 'apicona' ){
									_e($apicona['error404'], 'apicona'); 
								}	
						/*
						* Search is now optional. You can show/hide search button from "Theme Options > Error 404 Page Settings" directly.
						*/
						$error404_search = ( !isset($apicona['error404_search']) ) ? '1' : $apicona['error404_search'] ;
						if( $error404_search=='1' ){
							get_search_form();
						}
						?>
						
					</div><!-- .page-content -->
				</div><!-- .page-wrapper -->

			</div><!-- #content -->
		</div><!-- #primary -->
	
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>