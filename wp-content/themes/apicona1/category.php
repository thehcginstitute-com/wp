<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

get_header();

// Checking if Blog page
global $apicona;
$primaryclass = 'col-md-12 col-lg-12 col-sm-12 col-xs-12';
$sidebar = esc_attr($apicona['sidebar_blog']); // Global settings
$themestyle = tm_get_theme_style();

// Page settings
if( isset($sidebarposition) && trim($sidebarposition) != '' ){
	$sidebar = $sidebarposition;
}

// Primary Content class
$primaryclass = setPrimaryClass($sidebar);

if( $themestyle == 'apiconaadv' ){ ?>
	
	<div class="container">
	<div class="row multi-columns-row">	
		
	<div id="primary" class="content-area <?php echo $primaryclass; ?>">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				if( isset($apicona['blog_view']) && trim($apicona['blog_view'])!='' && trim($apicona['blog_view'])!='classic' ) {
					echo thememount_blogbox( esc_attr($apicona['blog_view']) );
				} else {
					get_template_part( 'content', 'post' );
				}
				?>
			<?php endwhile; ?>


		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
		
		<div class="clr clear"></div>
		<?php tm_apiconaadv_paging_nav(); ?>
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

<?php 

}else if( $themestyle == 'apicona' ){


?>
<div class="container">
	<div class="row">	

	<div id="primary" class="content-area <?php echo $primaryclass; ?>">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				if( isset($apicona['blog_view']) && trim($apicona['blog_view'])!='' && trim($apicona['blog_view'])!='classic' ) {
					echo kwayy_blogbox($apicona['blog_view']);
				} else {
					get_template_part( 'content', get_post_format() );
				}
				?>
			<?php endwhile; ?>

			<?php apicona_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

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

<?php } // end if ?>
<?php get_footer(); ?>