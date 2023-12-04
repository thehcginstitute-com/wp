<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Apicona Advanced
 * @since Apicona Advanced 1.0
 */

global $apicona;
$blog_readmore_text = 'Read More';
if( isset($apicona['blog_readmore_text']) && trim($apicona['blog_readmore_text'])!='' ){
	$blog_readmore_text = trim( esc_attr($apicona['blog_readmore_text']) );
}

// Getting Post Format
$postFormat = get_post_format();

// custom class 
$custom_post_classes = array();
$post_thumbnail = tm_post_thumbnail(false, 'full');

// custom class if no featured image. 
if( $post_thumbnail == '' ){
	$custom_post_classes[] = 'tm-post-noimage';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $custom_post_classes ); ?>>
	<div class="thememount-post-wrapper">
      
    
		<div class="thememount-post-meta-date">
			<?php tm_post_meta_date(); ?>
		</div><!-- .thememount-post-date -->
		
		<?php
		// Featured content like image, slider, video, audio etc
		echo $post_thumbnail;
		?>
		<div class="postcontent">
			
			<?php
				//tm_post_meta_bottom();
			?>   
			<div class="thememount-postcontent-wrapper">
				<header class="entry-header">
					<?php if($postFormat!='quote' && $postFormat!='status'): ?>
						<?php if( trim(get_the_title())!='' ): ?>
							<h2 class="entry-title">
							<?php if( is_single() ): ?>
								<?php echo esc_attr(trim(get_the_title())); ?>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo esc_attr(trim(get_the_title())); ?></a>

							<?php endif; ?>
							</h2><!-- .entry-title -->
							<?php thememount_blogbox_entry_meta(true, $tags='yes'); ?>
						<?php endif; ?>
					<?php endif; ?>
				</header><!-- .entry-header -->
		  
		  
				<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
				
				<?php else : ?>
				
					<div class="entry-content">
					<?php /* Quote */ if( $postFormat=='quote' ): ?><blockquote><?php endif; ?>
			
					<?php if( $postFormat=='link' ): ?>
						<?php $link = trim( get_post_meta( get_the_ID(), '_format_link_url', true ) );
						if( $link!='' ){
							echo '<h4 class="tm-pformat-link-url"><a href="' . $link . '" target="_blank"> <i class="fa fa-link"></i> ' . $link . '</a></h4>';
						}
						?>
					<?php endif; ?>
					
					<?php
					$blog_readmore_link = __( $blog_readmore_text, 'apicona' ).'<i class="tm-social-icon-angle-double-right"></i>';
					if( $postFormat=='quote' ){
						$blog_readmore_link = '';
					}
					?>
					
					<?php the_content( $blog_readmore_link ); ?>
					<?php
						if( $postFormat=='quote' ){
							$thememount_quote_source_name = trim( get_post_meta( get_the_ID(), '_format_quote_source_name', true ) );
							$thememount_quote_source_url  = trim( get_post_meta( get_the_ID(), '_format_quote_source_url', true ) );
							
							if( empty( $thememount_quote_source_url) ){
								$thememount_quote_source_url = get_permalink();
							}
							
							if( $thememount_quote_source_name!='' ){
								echo '<cite class="tm-quote-footer"><a href="' . $thememount_quote_source_url . '" target="_blank">' . $thememount_quote_source_name . '</a></cite>';
							}
							/*
							if( $thememount_quote_source_name!='' && $thememount_quote_source_url!='' ){
								echo '<cite class="tm-quote-footer"><a href="' . $thememount_quote_source_url . '" target="_blank">' . $thememount_quote_source_name . '</a></cite>';
							} else if( $thememount_quote_source_name!='' ){
								echo '<span class="tm-quote-footer">' . $thememount_quote_source_name . '</span>';
							}
							*/
						}
					?>
					<?php /* Quote */ if( $postFormat=='quote' ): ?></blockquote><?php endif; ?>
			
			
					<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apicona' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
				</div> <!-- .thememount-post-right -->
				
			<?php endif; ?>
		</div><!-- .postcontent -->
	</div><!-- .thememount-post-wrapper -->
	<div class="clearfix"></div>
</article><!-- #post-<?php the_ID(); ?> --> 
