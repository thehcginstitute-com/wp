<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

$themestyle = tm_get_theme_style();

if( $themestyle == 'apiconaadv' ){
	
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;

if ( ! comments_open() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		
		<div class="tm-post-comment-head"><h3>
		<?php
		// Total Comments
		$num_comments = number_format_i18n( get_comments_number() ); // get_comments_number returns only a numeric value
		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				echo __('No Comments', 'apicona');
			} elseif ( $num_comments > 1 ) {
				echo sprintf( __('%1$s Comments', 'apicona'), $num_comments );
			} else {
				echo __('1 Comment', 'apicona');
			}
			//$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
		}
		?>
		</h3></div>
	
	
		<!-- <h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'apicona' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2> -->

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 74,
					'callback' => 'tm_comment_row_template',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'apicona' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'apicona' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'apicona' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'apicona' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php
	$commenter     = wp_get_current_commenter();
	$req           = get_option( 'require_name_email' );
	$aria_req      = ( $req ? " aria-required='true'" : '' );
	$required_text = __('Required fields are marked *', 'apicona');
	
	$threeClass = ' col-lg-4 col-md-4 col-sm-4 col-xs-12 ';
	
	$args = array();
	
	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" placeholder="'.__('Comment','apicona').'" name="comment" cols="45" rows="8" aria-required="true">' .
		'</textarea></p>';
		
	$args['comment_notes_before'] = '<p class="comment-notes">' .
    __( 'Your email address will not be published.', 'apicona' ) . ' ' . ( $req ? $required_text : '' ) .
    '</p>';
	
	$args['comment_notes_after'] = '';
	
	
	$args['fields']   =  array(
		'author' =>
		'<div class="comment-form-three-fields row"><p class="comment-form-author ' . $threeClass . '">' .
		'<input id="author" placeholder="'.__('Name *','apicona').'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></p>',

		'email' =>
		'<p class="comment-form-email ' . $threeClass . '">' .
		'<input id="email" placeholder="'.__('Email *','apicona').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' /></p>',

		'url' =>
		'<p class="comment-form-url ' . $threeClass . '">' .
		'<input id="url" placeholder="'.__('Website','apicona').'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" /></p></div>',
	);

	comment_form($args); ?>

</div><!-- #comments -->

<?php
	
}else if( $themestyle == 'apicona' ){
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'apicona' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 74,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'apicona' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'apicona' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'apicona' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'apicona' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php
	$commenter     = wp_get_current_commenter();
	$req           = get_option( 'require_name_email' );
	$aria_req      = ( $req ? " aria-required='true'" : '' );
	$required_text = __('Required fields are marked *', 'apicona');
	
	$threeClass = ' col-lg-4 col-md-4 col-sm-4 col-xs-12 ';
	
	$args = array();
	
	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" placeholder="'.__('Comment','apicona').'" name="comment" cols="45" rows="8" aria-required="true">' .
		'</textarea></p>';
		
	$args['comment_notes_before'] = '<p class="comment-notes">' .
    __( 'Your email address will not be published.', 'apicona' ) . ' ' . ( $req ? $required_text : '' ) .
    '</p>';
	
	$args['comment_notes_after'] = '';
	
	
	$args['fields']   =  array(
		'author' =>
		'<div class="comment-form-three-fields row"><p class="comment-form-author ' . $threeClass . '">' .
		'<input id="author" placeholder="'.__('Name *','apicona').'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></p>',

		'email' =>
		'<p class="comment-form-email ' . $threeClass . '">' .
		'<input id="email" placeholder="'.__('Email *','apicona').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' /></p>',

		'url' =>
		'<p class="comment-form-url ' . $threeClass . '">' .
		'<input id="url" placeholder="'.__('Website','apicona').'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" /></p></div>',
	);
	
	comment_form($args); ?>

</div><!-- #comments -->

<?php } // endif ?>