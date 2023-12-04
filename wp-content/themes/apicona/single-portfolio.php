<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

$apicona = get_option('apicona');
$themestyle = tm_get_theme_style();

get_header();


if( $themestyle == 'apiconaadv' ){

// term list
$terms      = wp_get_post_terms( get_the_ID(), 'portfolio_category' );

// Single Portfolio View
$portfolioView        = esc_attr($apicona['portfolio_viewstyle']); // Global view
$portfolioView_single = get_post_meta( get_the_ID(), '_thememount_portfolio_view_viewstyle', true); // Single portfolio view
if( is_array($portfolioView_single) ){ $portfolioView_single = $portfolioView_single[0]; }
if( trim($portfolioView_single)!='' && trim($portfolioView_single)!='global' ){
	$portfolioView = $portfolioView_single;
}



// Like
$likeActiveClass = ( isset($_COOKIE["thememount_likes_".get_the_ID()]) ) ? 'like-active' : '' ;
$likeIconClass   = ( isset($_COOKIE["thememount_likes_".get_the_ID()]) ) ? 'fa fa-heart' : 'fa fa-heart-o' ;
$likes 			 = get_post_meta( get_the_ID(), 'kwayy_likes', true );
if( !$likes ){ $likes='0'; }

$like = '<!-- Like -->
			<div class="thememount-portfolio-likes-wrapper">
				<a class="thememount-portfolio-likes ' . $likeActiveClass . '" href="#" id="pid-' . get_the_ID() . '">
					<i class="'.$likeIconClass.'"></i>&nbsp;' . $likes . '
				</a>
			</div>';
if( isset($apicona['portfolio_show_like']) && trim($apicona['portfolio_show_like'])=='0' ){
	$like = '';
}




$wrapper_img    = 'col-md-8';
$wrapper_text   = 'col-md-4';
$wrapper_desc   = '';
$wrapper_detail = '';
$wrapper_text_w_start = '';
$wrapper_text_w_end   = '';

if($portfolioView=='top'){
	$wrapper_img    = 'col-md-12';
	$wrapper_text   = 'col-md-12';
	$wrapper_desc   = 'col-md-8';
	$wrapper_detail = 'col-md-4';
	$wrapper_text_w_start = '<div class="row">';
	$wrapper_text_w_end   = '</div>';
} else if($portfolioView=='full'){
	$wrapper_text   = 'col-md-12';
	$wrapper_desc   = 'col-md-12';
	$wrapper_text_w_start = '<div class="row">';
	$wrapper_text_w_end   = '</div>';
}


// Related Portfolio - This function will echo all related portfolios
function tm_related_pf(){
	$apicona = get_option('apicona');
	
	$catid      = wp_get_post_terms( get_the_ID() , 'portfolio_category', array("fields" => "ids"));
	$thisPostID = array(get_the_ID());
	
	$args = array(
		'post__not_in' => $thisPostID,
		'post_type'    => 'portfolio',
		'showposts'    => 3,
		'tax_query'    => array(
			array(
				'taxonomy' => 'portfolio_category',
				'field'    => 'id',
				'terms'    => $catid,
			)
		),
		'orderby' => 'rand',
	);
	
	$relatedPortfolio = new WP_Query( $args );
	
	
	if ( $relatedPortfolio->have_posts() ) {
		echo '<div class="thememount-portfolio-related">';
		echo '<h2 class="tm-pf-title-relatedarticle">' . esc_attr__( $apicona['portfolio_related_title'], 'apicona') . '</h2>';
		echo '<div class="container"><div class="row">';
		while ( $relatedPortfolio->have_posts() ) { $relatedPortfolio->the_post(); ?>
			<?php echo thememount_portfoliobox( 'three' ); ?>
		<?php }; // end of the loop.
		echo '</div></div></div>';
	};
	
	// Restore original Post Data
	wp_reset_postdata();
	
}  // function tm_related_pf()


?>



<div class="container">
	<div id="primary" class="site-content col">
		<div id="content" role="main">
			<div class="tm-pf-single-view tm-psingleview-<?php echo $portfolioView; ?>">
		
			<div class="tm-pf-single-title-w">
				<div class="tm-pf-single-title"><h2><?php echo get_the_title(); ?></h2></div>
				<div class="tm-pf-single-np-nav"><?php echo thememount_pf_single_np(); ?></div>
			</div>
			
			<?php if($portfolioView=='full'): ?>
	
				<?php while ( have_posts() ) : the_post(); ?>
				<?php $categories = get_the_category( get_the_ID() ); /* Getting category list for showing related portfolio items */ ?>
				
				<div class="entry-content">
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php echo $wrapper_text_w_start; ?>
							<div class="portfolio-description <?php echo $wrapper_desc; ?>">
								<?php the_content(); ?>
								
							</div><!-- .portfolio-description -->
						<?php echo $wrapper_text_w_end; ?>
						<footer class="entry-meta">
							<?php edit_post_link( __( 'Edit', 'apicona' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</article><!-- #post -->
					
                </div><!-- .entry-content -->
				
				<?php endwhile; // end of the loop. ?>
              
              

              

	

			<?php else: ?>

			
			
				<?php if( $portfolioView=='default' ) : ?>
					<?php /*** Default view - Left image and right content (default) ***/  ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
					<?php $categories = get_the_category( get_the_ID() ); /* Getting category list for showing related portfolio items */ ?>
					
					<div class="row">
						
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							
							<div class="tm-pf-default-top-info">
								
								<div class="thememount-portfolio-content <?php echo $wrapper_img; ?>">
									<div class="entry-content">
										<?php thememount_get_portfolio_featured_content(); ?>
										<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'apicona' ), 'after' => '</div>' ) ); ?>
									</div><!-- .entry-content -->
									
										<?php edit_post_link( __( 'Edit', 'apicona' ), '<footer class="entry-meta"><span class="edit-link">', '</span> </footer><!-- .entry-meta -->' ); ?>
									
								</div><!-- .thememount-portfolio-content -->
								<div id="thememount-portfolio-sidebar" class="thememount-portfolio-aside <?php echo $wrapper_text; ?>">
								
								<?php echo $wrapper_text_w_start; ?>
									<div class="portfolio-meta-details <?php echo $wrapper_detail; ?>">
										<?php thememount_portfolio_detailsbox(); ?>
									</div><!-- #portfolio-description -->
								<?php echo $wrapper_text_w_end; ?>
									
								</div><!-- .portfolio-meta-details -->
								
							</div><!-- .tm-pf-default-top-info -->
							
							<div class="clear clr"></div>
							
							<div class="portfolio-description <?php echo $wrapper_desc; ?> col-md-12">
							
								<div class="tm-pf-description-title-w">
									<h2 class="tm-pf-description-title"><?php esc_attr_e($apicona['portfolio_description'], 'apicona'); ?></h2>
									<?php echo $like; ?>
								</div>
									
								<div id="sidebar-inner">
									<?php the_content(); ?>
									<?php echo thememount_pf_social_share_icons(); ?>
								</div>
							</div><!-- .portfolio-description -->
							
							
							
							
						</article><!-- #post -->
						
					</div><!-- .row -->
					
					<?php endwhile; // end of the loop. ?>
					
					
					
					
					
				<?php else : ?>
					<?php /*** Top image and bottom content view ***/  ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
					<?php $categories = get_the_category( get_the_ID() ); /* Getting category list for showing related portfolio items */ ?>
					
					<div class="row">
						
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="thememount-portfolio-content <?php echo $wrapper_img; ?>">
								<div class="entry-content">
									<?php thememount_get_portfolio_featured_content(); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'apicona' ), 'after' => '</div>' ) ); ?>
								</div><!-- .entry-content -->
								
									<?php edit_post_link( __( 'Edit', 'apicona' ), '<footer class="entry-meta"><span class="edit-link">', '</span> </footer><!-- .entry-meta -->' ); ?>
								
							</div><!-- .thememount-portfolio-content -->
							<div id="thememount-portfolio-sidebar" class="thememount-portfolio-aside <?php echo $wrapper_text; ?>">
							
							<?php echo $wrapper_text_w_start; ?>
								
								
								<div class="portfolio-description <?php echo $wrapper_desc; ?> col-md-12">
									<div class="tm-pf-description-title-w">
										<h2 class="tm-pf-description-title"><?php esc_attr_e($apicona['portfolio_description'], 'apicona'); ?></h2>
										<?php echo $like; ?>
									</div>
									<div id="sidebar-inner">
										<?php the_content(); ?>
										<?php echo thememount_pf_social_share_icons(); ?>
									</div>
								</div><!-- .portfolio-description -->
								
								<div class="portfolio-meta-details <?php echo $wrapper_detail; ?>">
									<?php thememount_portfolio_detailsbox(); ?>
								</div><!-- #portfolio-description -->
								
							<?php echo $wrapper_text_w_end; ?>
								
							</div><!-- .portfolio-meta-details -->
							
							
							
							
							
							
							
						</article><!-- #post -->
						
					</div><!-- .row -->
					
					<?php endwhile; // end of the loop. ?>
					
					
					
					
				
				<?php endif; ?>
			

				
            
		
			<?php endif; ?>

			
			<?php
			if( $apicona['portfolio_show_related'] == '1' ){
				tm_related_pf();
			}
			?>

			
			
			</div><!-- .tm-psingleview-$portfolioView -->
		</div><!-- #content -->
	</div><!-- #primary -->	
</div><!-- #container -->

<?php
}else if( $themestyle == 'apicona' ){
	
$clientName = get_post_meta( get_the_ID(),'_kwayy_portfolio_data_clientname',true);
$clientLink = get_post_meta( get_the_ID(),'_kwayy_portfolio_data_clientlink',true);
$skills     = get_post_meta( get_the_ID(),'_kwayy_portfolio_data_skills',true);
$terms      = wp_get_post_terms( get_the_ID(), 'portfolio_category' );

$portfolioLinkText = get_post_meta( get_the_ID(),'_kwayy_portfolio_data_portfoliolinktext',true);
$portfolioLinkUrl  = get_post_meta( get_the_ID(),'_kwayy_portfolio_data_portfoliolinkurl',true);


?>
	<div class="container">
		<div id="primary" class="site-content col">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php $categories = get_the_category( get_the_ID() ); /* Getting category list for showing related portfolio items */ ?>
				
				<div class="row">
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="kwayy-portfolio-content col-md-7">
							<div class="entry-content">
								<?php kwayy_get_portfolio_featured_content(); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'apicona' ), 'after' => '</div>' ) ); ?>
							</div><!-- .entry-content -->
							<footer class="entry-meta">
								<?php edit_post_link( __( 'Edit', 'apicona' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-meta -->
						</div><!-- .kwayy-portfolio-content -->
						<div id="kwayy-portfolio-sidebar" class="kwayy-portfolio-aside col-md-5">
							<div class="portfolio-description">
								<?php echo do_shortcode('[heading tag="h2" text="' . __($apicona['portfolio_description'], 'apicona') . '"]'); ?>
								<div id="sidebar-inner">
									<?php the_content(); ?>
								</div>
							</div><!-- .portfolio-description -->
							<div class="portfolio-meta-details">
								<?php kwayy_portfolio_detailsbox(); ?>
							</div><!-- #portfolio-description -->
						</div><!-- .portfolio-meta-details -->
					</article><!-- #post -->
					
                </div><!-- .row -->
				
				<?php endwhile; // end of the loop. ?>
              
              
				<?php
				if( $apicona['portfolio_show_related'] == '1' ){

					$catid      = wp_get_post_terms( get_the_ID() , 'portfolio_category', array("fields" => "ids"));
					$thisPostID = array(get_the_ID());
					
					$args = array(
						'post__not_in'	=> $thisPostID,
						'post_type' => 'portfolio',
						'showposts' => 4,
						'tax_query' => array(
							array(
								'taxonomy' => 'portfolio_category',
								'field'    => 'id',
								'terms'    => $catid,
							)
						),
						'orderby' => 'rand',
					);
					
					$relatedPortfolio = new WP_Query( $args );
					
					
					if ( $relatedPortfolio->have_posts() ) {
						echo '<div class="kwayy-portfolio-related">';
						echo do_shortcode('[heading tag="h2" text="' . __($apicona['portfolio_related_title'], 'apicona') . '"]');
						echo '<div clas="container"><div class="row">';
						while ( $relatedPortfolio->have_posts() ) { $relatedPortfolio->the_post(); ?>
							<?php echo kwayy_portfoliobox( 'four' ); ?>
						<?php }; // end of the loop.
						echo '</div></div></div>';
					};
					
					// Restore original Post Data
					wp_reset_postdata();
					
				} // IF : $apicona['portfolios_show_related'] == '1'
				?>
              
				</div><!-- #content -->
			</div>
		</div>
        <!-- #primary -->	

<?php } // end if ?>
<?php get_footer(); ?>
