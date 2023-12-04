<?php
/**
 * The template for displaying Team Member
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */

get_header();
global $apicona;

$themestyle = tm_get_theme_style();

if( $themestyle == 'apiconaadv' ){
	

/* Post Meta */
global $post;
$position	= esc_attr( trim(get_post_meta( get_the_id(), '_kwayy_team_member_details_position', true )) );
//$email    = sanitize_email( trim(get_post_meta( get_the_id(), '_thememount_team_member_details_email', true )) );
//$phone    = esc_attr( trim(get_post_meta( get_the_id(), '_thememount_team_member_details_phone', true )) );
$excerpt  	= trim($post->post_excerpt);
$title    	= get_the_title();

/*if( trim($position)!='' ){ $position = '<div class="clearfix"></div> <h4 class="thememount-team-position clearfix">'.$position.'</h4>'; }*/

if( trim($position)!='' ){ $position = '<h4 class="thememount-team-position">'.__($position, 'apicona').'</h4>'; }

//if( trim($email)   !='' ){ $email = '<span class="thememount-team-email"><a href="mailto:'.$email.'">'.$email.'</a></span>'; }
//if( $phone!=false && trim($phone)!='' ){ $phone = '<span class="thememount-team-phone"><a href="tel:'.$phone.'"><i class="fa fa-fa-phone"></i> '.$phone.'</a></span><div class="clearfix"></div>'; }



// Team Group
$categories_list = '';
if( taxonomy_exists('team_group') ){
	$categories_list = get_the_term_list( get_the_ID(), 'team_group' );
	if( $categories_list!='' ){
		$categories_list = '<div class="thememount-team-cat-links">'.$categories_list.'</div>';
	}
}



// Social links
$socialcode = thememount_team_social();


// Phone email
$phone_email = '';
$phone       = esc_attr(get_post_meta( get_the_id(), '_kwayy_team_member_details_phone', true ));
$email       = esc_attr(get_post_meta( get_the_id(), '_kwayy_team_member_details_email', true ));
if( !empty($phone) ){
	$phone_email .= '<div class="thememount-team-phone"><span>'. __('Phone','apicona') .':</span>  <a href="tel:'.$phone.'">'. $phone .'</a></div>';
}
if( !empty($email) ){
	$phone_email .= '<div class="thememount-team-email"><span>'. __('E-mail','apicona') .':</span>  <a href="mailto:'. $email .'">'. $email .'</a></div>';
}
if( !empty($phone_email) ){
	$phone_email = '<div class="thememount-team-phoneemail">'. $phone_email .'</div>';
}


?>
<div class="container">
	<div class="tm-container-inner">
		<div id="primary" class="content-area">
			<article class="post single post-type-team_member">
				<div id="content" class="site-content row" role="main">
					<?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="single-team-left col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="thememount-team-img">
								<?php if( has_post_thumbnail() ){  the_post_thumbnail( 'full' ); } ?>
								
				                <div class="thememount-team-data">
                                    <div class="thememount-team-title-block">
										<h2><?php
											if( !empty($apicona['team_before_title_text']) ){
												esc_attr_e( trim($apicona['team_before_title_text']), 'apicona' );
												echo ' ';
											}
											echo $title;
											?></h2>
										<?php echo $position; ?>
									</div>
                                      
                                    <?php /* Team Group */    echo $categories_list; ?>
									
									<?php /* Social Links */  echo $socialcode; ?>
									<?php /* Phone & Email */ echo $phone_email; ?>
									
									<?php /* Appointment Button */ echo thememount_team_appointment_btn(); ?>
									
			                  </div>
							</div>
						<?php } ?>
					</div>
					
					<div class="single-team-right col-xs-12 col-sm-8 col-md-8 col-lg-8"> 
						<!-- <div class="thememount-team-title-block">
							<h2><?php
								if( !empty($apicona['team_before_title_text']) ){
									esc_attr_e( trim($apicona['team_before_title_text']), 'apicona' );
									echo ' ';
								}
								echo $title;
								?></h2>
							<?php echo $phone . $position . $email; ?>
						</div>-->
						<?php the_content(); ?>
						<?php //echo $socialcode; ?>
					</div>
					
				<?php endwhile; ?>

				</div><!-- #content -->
			</article>
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- .containenr -->

<?php
	
}else if( $themestyle == 'apicona' ){
	
/* Post Meta */
global $post;
$position = trim(get_post_meta( get_the_id(), '_kwayy_team_member_details_position', true ));
$email    = trim(get_post_meta( get_the_id(), '_kwayy_team_member_details_email', true ));
$excerpt  = trim($post->post_excerpt);
$title    = get_the_title();


if( trim($position)!='' ){ $position = '<h4 class="kwayy-team-position">'.$position.'</h4>'; }
if( trim($email)   !='' ){ $email = '<span class="kwayy-team-email"><a href="mailto:'.$email.'">'.$email.'</a></span>'; }



?>
<div class="container">
	<div class="row">		
		<div id="primary" class="content-area <?php echo $primaryclass; ?>">
			<article class="post single post-type-team_member">
				<div id="content" class="site-content" role="main">
					<?php /* The loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="single-team-left col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="kwayy-team-img">
								<?php if( has_post_thumbnail() ){  the_post_thumbnail( 'full' ); } ?>
								
								<h3><?php echo $title; ?></h3>
								
								<?php
								/* Group */
								$categories_list = get_the_term_list( get_the_ID(), 'team_group', '', ' &nbsp; &middot; &nbsp; ' ); // Team Group
								if( $categories_list!='' ){
									echo '<div class="kwayy-team-cat-links">'.$categories_list.'</div>';
								}
								?>
								
								<?php /* Social Links */ echo kwayy_team_social(); ?>
								
							</div>
						<?php } ?>
					</div>
					
					<div class="single-team-right col-xs-12 col-sm-8 col-md-8 col-lg-8"> 
						<div class="kwayy-team-title-block">
							<h2><?php
								if( isset($apicona['team_before_title_text']) ){
									if( trim($apicona['team_before_title_text'])!='' ){
										_e( trim($apicona['team_before_title_text']), 'apicona' );
										echo ' ';
									}
									echo $title;
								} else {
									_e('About', 'apicona'); echo ' '.$title;
								}
								?></h2>
							<?php echo $position . $email; ?>
						</div>
						<?php the_content(); ?>
						<?php //echo $socialcode; ?>
					</div>
					
				<?php endwhile; ?>

				</div><!-- #content -->
			</article>
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- .containenr -->

<?php } // end if ?>

<?php get_footer(); ?>
