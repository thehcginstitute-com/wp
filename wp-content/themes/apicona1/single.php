<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

get_header();

// Checking if Blog page
global $apicona;
$primaryclass		= 'col-md-12 col-lg-12 col-sm-12 col-xs-12';
$sidebar			= $apicona['sidebar_blog']; // Global settings
$themestyle			= tm_get_theme_style();
$sidebarposition 	= get_post_meta( get_the_ID(), '_kwayy_post_options_sidebarposition', true);

// Page settings
if( isset($sidebarposition) && trim($sidebarposition) != '' ){
	$sidebar = $sidebarposition;
}

// Primary Content class
$primaryclass = setPrimaryClass($sidebar);


?>
<div class="container">
<div class="row">		

	<div id="primary" class="content-area <?php echo $primaryclass; ?>">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
			
				<?php 
				
					if( $themestyle == 'apiconaadv' ){						
						get_template_part( 'content', 'post' );
						tm_apiconaadv_post_nav();						
					}else if( $themestyle == 'apicona' ){
						get_template_part( 'content', get_post_format() ); 
						apicona_post_nav(); 
					}
					comments_template(); 
				?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php
	// Sidebar 1 (Left Sidebar)
	if($sidebar=='left' || $sidebar=='both' || $sidebar=='bothleft' || $sidebar=='bothright' ){
		get_sidebar('left');
	}

	// Sidebar 2 (Right Sidebar)
	if($sidebar=='right' || $sidebar=='both' || $sidebar=='bothleft' || $sidebar=='bothright' ){
		get_sidebar('right');
	}
	?>
	
</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>