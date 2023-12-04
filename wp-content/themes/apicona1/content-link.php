<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */
 
// Getting link from CF Post Formats plugin
$format_link_url = trim(get_post_meta( get_the_ID(),'_format_link_url', true));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="kwayy-post-left">
    <?php kwayy_entry_date(); ?>
  </div>
  <!-- .kwayy-post-left -->
  <div class="kwayy-post-right">
    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
    <div class="kwayy-blog-media entry-thumbnail">
      <?php the_post_thumbnail(); ?>
    </div>
    <?php endif; ?>
    <div class="postcontent">
      <header class="entry-header">
        <?php if ( !is_single() ) : ?>
		
		<?php if( $format_link_url!='' ): ?>
			<h2 class="entry-title"> <a href="<?php echo $format_link_url; ?>" target="_blank" rel="bookmark">
		<?php else: ?>
			<h2 class="entry-title"> <a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php endif; ?>
          <?php the_title(); ?>
          </a> </h2>
        <div class="entry-meta">
          <?php //kwayy_entry_meta(); ?>
          <?php edit_post_link( __( 'Edit', 'apicona' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
        <!-- .entry-meta -->
        <?php endif; // !is_single() ?>
      </header>
      <!-- .entry-header -->
      
      <div class="entry-content">
        <?php the_content( '' ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apicona' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
      </div>
      <!-- .entry-content -->
      
      <?php if ( is_single() ) : ?>
      <footer class="entry-meta">
        <?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
        <?php get_template_part( 'author-bio' ); ?>
        <?php endif; ?>
      </footer>
      <!-- .entry-meta -->
      <?php endif; // is_single() ?>
    </div>
  </div>
  <!-- .kwayy-post-right -->
  
  <div class="clearfix"></div>
</article>
<!-- #post --> 
