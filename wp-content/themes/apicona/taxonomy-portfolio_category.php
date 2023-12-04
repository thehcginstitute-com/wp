<?php
/**
 * The template for displaying Portfolio Category
 *
 * Used to display tm_portfolio_category with a unique design.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */
global $apicona;
global $wp_query;
$tax   			= $wp_query->get_queried_object();
$themestyle 	= tm_get_theme_style();

get_header(); 

if( $themestyle == 'apiconaadv' ){

/*
 * Featured Image for taxonomy
 */
$featured_img = get_option( "taxonomy_term_$tax->term_id" );
if( isset( $featured_img['thememount_img_url'] ) ){
	$featured_img = $featured_img['thememount_img_url'];
}

?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<!-- Left Sidebar -->
					<div class="tm-taxonomy-left col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="tm-taxonomy-left-wrapper">
							<?php
							/* List of other groups */
							echo '<div class="tm-taxonomy-term-list"><ul>';
							echo wp_list_categories( array('taxonomy'=>$tax->taxonomy, 'hide_empty'=>0,'title_li'=>'','use_desc_for_title'=>0) );
							echo '</ul></div>';
							?>
						</div>
						
						
						<?php if( is_active_sidebar( 'pf-cat-sidebar' ) ) : ?>
							<aside id="tm-pf-cat-sidebar" class="widget-area sidebar" role="complementary">
								<?php dynamic_sidebar( 'pf-cat-sidebar' ); ?>
							</aside><!-- #tm-pf-cat-sidebar -->
						<?php endif; ?>
						
						
					</div>
					
					<!-- Right Content Area -->
					<div class="tm-taxonomy-right col-lg-9 col-md-9 col-sm-12 col-xs-12">
						
						<?php
						/*
						 * Category featured image
						 */
						if( trim($featured_img)!='' ){
							echo '<div class="tm-term-img"><img src="'.$featured_img.'" alt="'.$tax->name.'" /></div>';
						}
						?>
						
						
						<?php
						/*
						 * Category description
						 */
						echo '<div class="tm-term-desc">';
							echo do_shortcode('[heading h2="'.$tax->name.'" heading_sep="no"]');
							echo do_shortcode(nl2br($tax->description));
						echo '</div>';
						?>
						
						
						<?php /* The loop */ ?>
						
						<div class="row multi-columns-row">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content', 'portfolio' ); ?>
								<?php comments_template(); ?>
							<?php endwhile; ?>
						</div><!-- .row -->
						
						<?php tm_apiconaadv_paging_nav(); ?>
						
					</div>
				
				</article>

			</div><!-- #content -->
		</div><!-- #primary -->
	
	</div><!-- .row -->
</div><!-- .container -->

<?php

/* Restore original Post Data */
wp_reset_postdata();

	
}else if( $themestyle == 'apicona' ){

$pfcat_column = ( isset($apicona['pfcat_column']) && trim($apicona['pfcat_column'])!='' ) ? trim($apicona['pfcat_column']) : 'two' ;


?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<!-- Left Sidebar -->
					<div class="tm-taxonomy-left col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="tm-taxonomy-left-wrapper">
							<?php
							/* List of other groups */
							echo '<div class="tm-taxonomy-term-list"><ul>';
							echo wp_list_categories( array('taxonomy'=>$tax->taxonomy, 'hide_empty'=>0,'title_li'=>'','use_desc_for_title'=>0) );
							echo '</ul></div>';
							?>
						</div>
					</div>
					
					<!-- Right Content Area -->
					<div class="tm-taxonomy-right col-lg-9 col-md-9 col-sm-12 col-xs-12">
						
						<?php
						/*
						 * Category description
						 */
						echo '<div class="tm-term-desc">';
							echo do_shortcode('[heading text="'.$tax->name.'"]');
							echo do_shortcode(nl2br($tax->description));
						echo '</div>';
						?>
						
						
						<?php /* The loop */ ?>
						
						<div class="row multi-columns-row">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php echo kwayy_portfoliobox($pfcat_column) ?>
								<?php //get_template_part( 'content', 'portfolio' ); ?>
								<?php comments_template(); ?>
							<?php endwhile; ?>
						</div><!-- .row -->
						
						<?php apicona_paging_nav(); ?>
						
					</div>
				
				</article>

			</div><!-- #content -->
		</div><!-- #primary -->
	
	</div><!-- .row -->
</div><!-- .container -->

<?php } // end if ?>
<?php get_footer(); ?>