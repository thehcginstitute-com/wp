<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Apicona
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

$themestyle = tm_get_theme_style();

get_header(); ?>

<div class="container">
	<div class="row multi-columns-row">		
	
		<?php if ( have_posts() ) : ?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'teammember' ); ?>
			<?php endwhile; ?>
			<div class="clear clr"></div>
			
			<?php 
				if( $themestyle == 'apiconaadv' ){
					tm_apiconaadv_paging_nav();
				}else if( $themestyle == 'apicona' ){
					apicona_paging_nav(); 
				}
			?>
			

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>