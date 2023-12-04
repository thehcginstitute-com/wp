<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

get_header();



// Checking if Blog page
$primaryclass = 'col-md-12 col-lg-12 col-xs-12';
if( is_home() ){
	global $apicona;
	
	$template    = get_page_template_slug( get_option('page_for_posts') );
	$pageSidebar = get_post_meta( get_option('page_for_posts'), '_kwayy_page_options_sidebarposition', true );
	if( is_array($pageSidebar) ){ $pageSidebar = $pageSidebar[0]; } // Converting to String if Array
	$blogSidebar = $apicona['sidebar_blog']; // Global settings
	
	
	if( $template!='template-full-width.php' ){
		if( $pageSidebar!='' ){
			$sidebar = $pageSidebar;
		} else {
			$sidebar = $blogSidebar;
		}
	} else {
		$sidebar = '';
	}
	
	

	// Page settings
	if( isset($sidebarposition) && trim($sidebarposition) != '' ){
		$sidebar = $sidebarposition;
	}

	// Primary Content class
	$primaryclass = setPrimaryClass($sidebar);
	
	// Adding isotpe classes if blog-2-col view set as default view from theme options
	
	if( isset($apicona['blog_view']) && trim($apicona['blog_view'])!='') {
	
	$blogview = $apicona['blog_view'];
	$isotopeclass = " row kwayy-blog-col-page multi-columns-row kwayy-blog-col-".$blogview;
	
		if( isset($apicona['blog_view']) && trim($apicona['blog_view'])!='' && trim($apicona['blog_view']) == 'classic'){
			$isotopeclass = '';
		}
		
	}
}

$themestyle = tm_get_theme_style();

if( $themestyle == 'apiconaadv' ){ ?>

<div class="container">
<div class="row multi-columns-row">		

	<div id="primary" class="content-area <?php echo $primaryclass; ?>">
	
		<?php
		$site_content_class = '';
		if( isset($apicona['blog_view']) && trim($apicona['blog_view'])!='' && trim($apicona['blog_view'])!='classic' ) {
			$site_content_class = 'row';
		}
		?>
	
		<div id="content" class="site-content <?php echo $site_content_class; ?>" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				if( isset($apicona['blog_view']) && trim($apicona['blog_view'])!='' && trim($apicona['blog_view'])!='classic' ) {
					echo thememount_blogbox($apicona['blog_view']);
				} else {
					get_template_part( 'content', 'post' );
				}
				
				?>
			<?php endwhile; ?>

			

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
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
		<div id="content" class="site-content<?php echo $isotopeclass;?>" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				$linking = '';
				if(isset($apicona['link_on_image']) && $apicona['link_on_image']=='1'){
					$linking = 'yes';
				}
				
				if( isset($apicona['blog_view']) && trim($apicona['blog_view'])!='' && trim($apicona['blog_view'])!='classic' ) {
					echo kwayy_blogbox($apicona['blog_view'], $linking);
				} else {
					get_template_part( 'content', get_post_format() );
				}
				?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
		
		<?php apicona_paging_nav(); ?>
		
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


<?php } // endif ?>
<?php get_footer(); ?>