<?php

/**
 * The template for displaying Author
 *
 * @package WordPress
 * @subpackage Apicona
 * @since Apicona 1.0
 */
/***********************************************************************/
// Syed Custom Development End
/**********************************************************************/
get_header();



global $post;
$author_title	= esc_attr(trim(get_post_meta(get_the_id(), 'author_title', true)));
$author_sub_title	= esc_attr(trim(get_post_meta(get_the_id(), 'author_sub_title', true)));
$position	= esc_attr(trim(get_post_meta(get_the_id(), '_kwayy_team_member_details_position', true)));
$email    = sanitize_email(trim(get_post_meta(get_the_id(), '_kwayy_team_member_details_email', true)));
$phone    = esc_attr(trim(get_post_meta(get_the_id(), '_kwayy_team_member_details_phone', true)));
$appointment_button    = esc_attr(trim(get_post_meta(get_the_id(), 'appointment_button', true)));
$appointment_link    = esc_attr(trim(get_post_meta(get_the_id(), 'appointment_link', true)));

$medical_college_label    = esc_attr(trim(get_post_meta(get_the_id(), 'medical_college_label', true)));
$medical_college_title    = esc_attr(trim(get_post_meta(get_the_id(), 'medical_college_title', true)));
$internship_residency_label    = esc_attr(trim(get_post_meta(get_the_id(), 'internship_residency_label', true)));
$internship_residency    = esc_attr(trim(get_post_meta(get_the_id(), 'internship_residency', true)));
$special_interests_label    = esc_attr(trim(get_post_meta(get_the_id(), 'special_interests_label', true)));
$special_interests    = esc_attr(trim(get_post_meta(get_the_id(), 'special_interests', true)));

$our_experience_label    = esc_attr(trim(get_post_meta(get_the_id(), 'our_experience_label', true)));
$our_experience    = esc_attr(trim(get_post_meta(get_the_id(), 'our_experience', true)));

$long_description    = esc_attr(trim(get_post_meta(get_the_id(), 'long_description', true)));
$services    = get_field('services', get_the_id());

$_kwayy_team_member_social_links_linkedin    = get_field('_kwayy_team_member_social_links_linkedin', get_the_id());
$_kwayy_team_member_social_links_facebook    = get_field('_kwayy_team_member_social_links_facebook', get_the_id());
$_kwayy_team_member_social_links_twitter    = get_field('_kwayy_team_member_social_links_twitter', get_the_id());
$_kwayy_team_member_details_email    = get_field('_kwayy_team_member_details_email', get_the_id());


$related_posts = get_field("select_articles", get_the_id());
$heading = get_field("heading", get_the_id());



$short_description    = esc_attr(trim(get_post_meta(get_the_id(), 'short_description', true)));

$excerpt  	= trim($post->post_excerpt);
$title    	= get_the_title();

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="container thc-author-module">
	<div class="tm-container-inner">
		<div id="primary" class="content-area">
			<article class="post single post-type-team_member">
				<div id="content" class="site-content row" role="main">

					<div class="single-team-left col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="thememount-team-img">
							<?php if (has_post_thumbnail()) {
								the_post_thumbnail('full');
							} ?>
							<div class="thememount-team-data">
								<div class="thememount-team-title-block">
									<h2><?php echo $author_title; ?></h2>
									<h4 class="thememount-team-position"><?php echo $author_sub_title; ?></h4>
								</div>

								<div class="thememount-team-cat-links"><?php echo $position; ?></div>
								<?php


								?>
								<div class="thememount-team-social-links">
									<ul>
										<?php if ($_kwayy_team_member_social_links_facebook) : ?>
											<li class="thememount-social-facebook">
												<a href="<?php echo esc_url($_kwayy_team_member_social_links_facebook); ?>" class="hint--top" data-hint="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
											</li>
										<?php endif; ?>

										<?php if ($_kwayy_team_member_social_links_twitter) : ?>
											<li class="thememount-social-twitter">
												<a href="<?php echo esc_url($_kwayy_team_member_social_links_twitter); ?>" class="hint--top" data-hint="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
											</li>
										<?php endif; ?>

										<?php if ($_kwayy_team_member_social_links_linkedin) : ?>
											<li class="thememount-social-gplus">
												<a href="<?php echo esc_url($_kwayy_team_member_social_links_linkedin); ?>" class="hint--top" data-hint="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
											</li>
										<?php endif; ?>

										<?php if ($_kwayy_team_member_details_email) : ?>
											<li class="thememount-social-email">
												<a href="mailto:<?php echo esc_attr($_kwayy_team_member_details_email); ?>" class="hint--top" data-hint="Email"><i class="fa fa-envelope-o"></i></a>
											</li>
										<?php endif; ?>
									</ul>
								</div>
								<?php echo $socialcode; ?>
								<div class="thememount-team-phoneemail">
									<?php if ($phone) { ?><div class="thememount-team-phone"><span>Phone:</span> <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></div><?php } ?>
									<?php if ($email) { ?><div class="thememount-team-email"><span>E-mail:</span> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div><?php } ?>
								</div>
								<?php if ($appointment_button) { ?>
									<div class="tm-team-member-appointment-btn-wrapper">
										<div class="vc_btn3-container vc_btn3-left">
											<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-classic vc_btn3-color-skincolor" href="<?php echo $appointment_link; ?>" title="<?php echo $appointment_button; ?>" target="_self"><?php echo $appointment_button; ?></a>
										</div><!-- .vc_btn3-container.vc_btn3-left -->
									</div><!-- .tm-team-member-appointment-btn-wrapper -->
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="single-team-right col-xs-12 col-sm-8 col-md-8 col-lg-8">

						<section class="wpb-content-wrapper">
							<div class="vc_row wpb_row vc_row-fluid tm-row-textcolor-default tm-row-bgtype-default tm-custom-31810">
								<div class="wpb_column vc_column_container tm-col-textcolor-default tm-col-bgcolor-default tm-col-main tm-col-background-image vc_col-sm-12">
									<div class="tm-col-overlay"></div>
									<div class="vc_column-inner">
										<div class="wpb_wrapper">
											<div class="vc_row wpb_row vc_inner vc_row-fluid education">
												<div class="wpb_column vc_column_container vc_col-sm-6">
													<div class="vc_column-inner">
														<div class="wpb_wrapper">
															<h3 style="font-size: 20px;line-height: 22px;text-align: left;font-weight: 700;" class="vc_custom_heading"><?php echo $medical_college_label; ?></h3>
															<div class="wpb_text_column wpb_content_element ">
																<div class="wpb_wrapper">
																	<p class="auther_paragraph"><?php echo $medical_college_title; ?></p>
																</div>
															</div>
															<h3 style="font-size: 20px;line-height: 22px;text-align: left;font-weight: 700;" class="vc_custom_heading"><?php echo $special_interests_label; ?></h3>
															<div class="wpb_text_column wpb_content_element ">
																<div class="wpb_wrapper">
																	<p class="auther_paragraph"><?php echo $special_interests; ?></p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="wpb_column vc_column_container vc_col-sm-6">
													<div class="vc_column-inner">
														<div class="wpb_wrapper">
															<h3 style="font-size: 20px;line-height: 22px;text-align: left;font-weight: 700;" class="vc_custom_heading"><?php echo $internship_residency_label; ?></h3>
															<div class="wpb_text_column wpb_content_element ">
																<div class="wpb_wrapper">
																	<p><?php echo $internship_residency; ?></p>
																</div>
															</div>
															<h3 style="font-size: 20px;line-height: 22px;text-align: left;font-weight: 700;" class="vc_custom_heading"><?php echo $our_experience_label; ?></h3>
															<div class="wpb_text_column wpb_content_element ">
																<div class="wpb_wrapper">
																	<p><?php echo $our_experience; ?></p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="wpb_text_column wpb_content_element ">
												<div class="wpb_wrapper">
													<!-- <span class="tm-dropcap tm-dcap-style-rounded tm-dcap-color-skincolor">L</span> -->
													<?php echo $long_description; ?>
												</div>
											</div>
											<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
											</div>
											<?php

											if ($services) { ?>
												<div class="vc_row wpb_row vc_inner vc_row-fluid">
													<div class="wpb_column vc_column_container vc_col-sm-12">
														<div class="vc_column-inner">
															<div class="wpb_wrapper">
																<ul class="tm-list tm-list-style-icon">
																	<?php foreach ($services as $service) { ?>
																		<li><i class="tm-skincolor fa fa-check-circle"></i> <?php echo $service['service']; ?></li>
																	<?php } ?>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
												</div>
											<?php } ?>


											<div class="wpb_text_column wpb_content_element ">
												<div class="wpb_wrapper">
													<?php echo $short_description; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>



							<!-- Patch: This is to remove the closing </p> tag which appear dynamically -->
							<div class="tm-last-div-in-row"></div>



						</section>
						<?php
						$check_post_id = $post->ID;
						$enable_author=get_field('enable_author', $check_post_id);
						if($enable_author){
						?>
						<div class="related-posts">
							<h2 class="thc-heading"><?php echo $heading; ?></h2>

							<div class="row articles-row">
								<?php

								foreach ($related_posts as $r_post) {
									$post_id = $r_post->ID;
									$post_title = get_the_title($post_id);

									$reviewer_label = get_field('reviewer_label', $post_id);
									$enable_reviewer = get_field('enable_reviewer', $post_id);
									$select_reviewer = get_field('select_reviewer', $post_id);
									$reviewer_link = get_field('reviewer_link', $post_id);

									$categories = get_the_category($post_id);

									if (!empty($categories)) {
										$category_links = array();

										// Loop through each category
										foreach ($categories as $category) {
											// Get the category link
											$category_link = get_category_link($category->term_id);

											// Create an anchor tag for the category
											$category_links[] = '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
										}

										// Join the individual category links with a comma
										$comma_separated_links = implode(', ', $category_links);

										// Output the comma-separated list of category links
									}
								?>
									<div class="single-article-box col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<div class="single-article-box-inner">
											<?php
											// Get the featured image ID
											$featured_image_id = get_post_thumbnail_id($post_id);

											// Check if a featured image is set
											if ($featured_image_id) {
												// Get the URL of the featured image
												$featured_image_url = wp_get_attachment_image_src($featured_image_id, 'full');
												if (isset($featured_image_url[0]) && !empty($featured_image_url[0])) {
													$featured_image_url = $featured_image_url[0];
													$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
													echo '<a href="' . esc_url(get_the_permalink($post_id)) . '" >';
													echo '<img src="' . $featured_image_url . '" alt="' . $post_title . '">';
													echo '</a>';
												}
											}
											?>
											<div class="single-article-box-text">

												<div class="category-list"><?php echo $comma_separated_links; ?></div>
												<h3><a href="<?php echo esc_url(get_the_permalink($post_id)); ?>"><?php echo $post_title; ?></a></h3>
												<?php if ($enable_reviewer && $select_reviewer) {
													echo '<span>' . $reviewer_label . ' <a href="' . (!empty($reviewer_link) ? $reviewer_link : 'javascript:;') . '">' . $select_reviewer['display_name'] . '</a></span>';
												} ?>
											</div>

										</div>
									</div>
								<?php } ?>
							</div>

						</div> <!-- #related-articles -->
						<?php
						}
						?>
					</div>





				</div><!-- #content -->
			</article>
		</div><!-- #primary -->
	</div>
</div><!-- .containenr -->




<style>

	/* .post-type-team_member{
		margin-bottom: 50px;
	} */
	/* #content .vc_call_to_action .wpb_call_text span,
	.vc_call_to_action .wpb_call_text span {
		font-size: 21px;
		display: block;
		line-height: 30px
	} */

	/* .thememount_cta_bigfont_yes.vc_call_to_action h4.wpb_heading {
		font-size: 50px;
		line-height: 65px;
		font-weight: 400;
		padding-bottom: 0;
		position: relative
	}

	.thememount_cta_bigfont_yes.vc_call_to_action h4.wpb_heading,
	.thememount_cta_sepline_yes.thememount_cta_bigfont_yes.vc_call_to_action h4.wpb_heading {
		padding-bottom: 20px;
		border-bottom: none
	}

	.thememount_cta_sepline_yes.vc_call_to_action h4.wpb_heading:after {
		content: "";
		display: block;
		height: 4px;
		width: 54px;
		position: absolute;
		-webkit-transform: translate(-50%, 0);
		-moz-transform: translate(-50%, 0);
		-ms-transform: translate(-50%, 0);
		-o-transform: translate(-50%, 0);
		transform: translate(-50%, 0);
		bottom: -2px
	}

	.tm-row-bgtype-skin .thememount_cta_sepline_yes.vc_call_to_action h4.wpb_heading:after {
		background-color: #fff
	}

	.thememount_cta_sepline_yes.vc_call_to_action.vc_txt_align_left h4.wpb_heading:after {
		left: 27px
	}

	.thememount_cta_sepline_yes.vc_call_to_action.vc_txt_align_center h4.wpb_heading:after {
		left: 50%
	}

	.thememount_cta_sepline_yes.vc_call_to_action.vc_txt_align_right h4.wpb_heading:after {
		right: -27px;
		left: inherit
	} */

	/* .vc_call_to_action .wpb_call_text,
	.vc_call_to_action p {
		margin-bottom: 30px
	}

	.wpb_call_to_action h2.wpb_call_text {
		font-size: 26px;
		line-height: 30px
	}

	#content .wpb_call_to_action .wpb_call_text,
	.wpb_call_to_action .wpb_call_text {
		padding-top: 10px
	} */

	/* .thememount-row-textcolor-white .wpb_button_a span {
		color: inherit
	} */

	/* .wpb_call_to_action .wpb_button {
		font-size: 13px;
		line-height: 22px;
		text-transform: uppercase;
		padding: 12px 30px;
		margin: 5px 0;
		border: none !important;
		border-radius: 25px;
		-webkit-transition: all .25s ease;
		transition: all .25s ease;
		position: relative;
		display: inline-block;
		text-shadow: none
	} */

	/* .vc_call_to_action .vc_cta_btn {
		font-size: 13px;
		text-transform: uppercase
	}

	.vc_call_to_action .wpb_heading {
		position: inherit
	}

	.vc_call_to_action .wpb_heading:after {
		display: none
	} */

	/* .thememount-row-bgtype-skin .wpb_call_to_action .thememount-cta-description,
	.thememount-row-bgtype-skin .wpb_call_to_action .wpb_call_text,
	.tm-row-bgtype-skin .vc_call_to_action h2.wpb_heading {
		color: #fff
	}

	.tm-row-bgtype-skin .vc_call_to_action .hgroup+p {
		color: rgba(255, 255, 255, .9)
	}

	.vc_general.vc_cta3 .vc_cta3-content {
		width: 100%
	}

	.vc_toggle_title>h4 {
		font-size: 20px
	} */

	/* .thememount-team-box {
		margin-bottom: 30px
	}

	.thememount-team-box .thememount-team-position {
		color: #9e9e9e;
		font-size: 12px;
		font-weight: 400;
		margin-top: 7px;
		margin-bottom: 0;
		letter-spacing: .5px
	}

	.site-main .thememount-team-box .thememount-team-position {
		color: #9e9e9e
	}

	.thememount-team-box .thememount-team-data-inner {
		position: absolute;
		padding: 0;
		background-color: rgba(255, 255, 255, .9);
		width: 100%;
		bottom: 0;
		height: 0;
		opacity: 0
	}

	.thememount-team-box:hover .thememount-team-data-inner {
		height: 100%;
		opacity: 1
	} */

	/* .thememount-team-short-desc {
		padding-top: 10px;
		padding-bottom: 10px
	}

	.tm-box-style-default .thememount-team-short-desc,
	.tm-box-style-default .thememount-team-social-links {
		color: #fff;
		padding-top: 10px;
		opacity: 0
	}

	.tm-box-style-default .thememount-team-social-links {
		position: absolute;
		bottom: -41px;
		width: 100%;
		padding: 6px 15px 0 15px;
		-webkit-transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		-ms-transition: all .3s ease-in-out;
		transition: all .3s ease-in-out;
		text-align: center
	}

	.tm-box-style-default .thememount-team-box:hover .thememount-team-social-links {
		bottom: 0
	}

	.tm-box-style-default .thememount-team-box:hover .thememount-team-short-desc,
	.tm-box-style-default .thememount-team-box:hover .thememount-team-social-links {
		opacity: 1
	}

	.thememount-team-box .thememount-team-data-inner,
	.thememount-team-short-desc,
	.thememount-team-social-links {
		-webkit-transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-ms-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		transition: all .3s ease-in-out
	} */

	/* .thememount-team-social-links ul {
		list-style: none;
		padding: 0;
		margin: 0
	} */

	/* .thememount-team-phoneemail {
		padding-top: 20px;
		font-size: 15px
	}

	.thememount-items-col-five .thememount-team-phoneemail,
	.thememount-items-col-six .thememount-team-phoneemail {
		padding-top: 0
	}

	.site-main .tm-box-style-leftimage .thememount-team-phoneemail {
		color: #424242
	} */

	/* .tm-row-bgtype-dark .thememount-team-phoneemail,
	.tm-row-bgtype-dark .thememount-team-phoneemail .tm-skincolor,
	.tm-row-bgtype-skin .thememount-team-phoneemail {
		color: #fff
	} */

	/* .tm-team-email-social-w {
		border-top: 1px solid #e2e2e2;
		padding-top: 15px;
		margin-top: 12px
	}*/

	/* .tm-team-member-appointment-btn-wrapper {
		padding-top: 25px
	}

	.tm-team-email-social-w .thememount-team-email {
		font-size: 15px
	}

	.thememount-team-social-links ul li {
		display: inline-block;
		margin-right: 8px;
		margin-bottom: 5px
	}

	.thememount-team-social-links ul li a {
		height: 30px;
		width: 30px;
		line-height: 30px;
		border-radius: 50%;
		text-align: center;
		font-size: 13px
	} */

	/* .tm-box-style-leftimage .thememount-team-social-links ul li a {
		border-color: transparent;
		color: #fff
	} */

	/* .thememount-team-box:hover .tm-box-style-leftimage .thememount-team-social-links,
	.tm-box-style-leftimage .thememount-team-social-links {
		position: absolute;
		bottom: 0;
		width: 100%;
		padding: 6px 15px 0 15px;
		left: 0
	}

	.thememount-team-wrapper.thememount-items-col-three .tm-box-style-leftimage .thememount-team-social-links {
		bottom: auto
	}

	.thememount-items-col-two .tm-box-style-leftimage .thememount-team-data-right {
		min-height: 300px
	}

	.tm-box-style-leftimage .thememount-team-data-right {
		padding-top: 15px;
		padding-bottom: 15px;
		display: flex;
		background-color: #f7f7f7;
		border: 1px solid rgba(0, 0, 0, .03);
		border-left: none;
		border-bottom: none;
		transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-webkit-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out
	}

	.tm-box-style-leftimage .thememount-team-data-right-inner {
		padding-bottom: 30px
	} */

	/* .tm-row-bgtype-dark .tm-box-style-leftimage .thememount-team-data-right,
	.tm-row-bgtype-grey .tm-box-style-leftimage .thememount-team-data-right,
	.tm-row-bgtype-skin .tm-box-style-leftimage .thememount-team-data-right {
		background-color: #fff;
		border: 0
	}

	.tm-row-bgtype-skin .tm-box-style-default .thememount-team-social-links,
	.tm-row-bgtype-skin .tm-box-style-leftimage .thememount-team-social-links {
		background-color: #313131
	}

	.tm-box-style-leftimage .thememount-team-box .row {
		margin-left: 0;
		margin-right: 0;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-flex-wrap: wrap;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap
	}

	.tm-box-style-leftimage .thememount-team-box .thememount-team-img-left {
		padding-left: 0;
		padding-right: 0
	}

	.thememount-items-col-one .thememount-team-img-left img {
		width: 100%
	}

	.thememount-team-data-right-inner {
		padding-left: 10px;
		padding-top: 0
	} */

	/* .thememount-team-wrapper.thememount-items-col-four .tm-box-style-leftimage .thememount-team-data-right-inner,
	.thememount-team-wrapper.thememount-items-col-three .tm-box-style-leftimage .thememount-team-data-right-inner {
		padding-left: 0
	}

	.thememount-team-wrapper.thememount-items-col-four .tm-box-style-leftimage .thememount-team-data-right-inner .thememount-team-title,
	.thememount-team-wrapper.thememount-items-col-three .tm-box-style-leftimage .thememount-team-data-right-inner .thememount-team-title {
		font-size: 14px
	}

	.tm-box-style-default .thememount-team-box .thememount-team-social-links ul li a {
		color: #fff
	}

	.thememount-items-col-five .thememount-team-social-links ul li a,
	.thememount-items-col-six .thememount-team-social-links ul li a {
		height: 25px;
		width: 25px;
		line-height: 25px;
		font-size: 12px
	}

	.thememount-team-social-links ul li a.hint--top:after,
	.thememount-team-social-links ul li a.hint--top:before {
		left: 32%
	} */

	/* .thememount-team-img img {
		border-radius: 0;
		max-width: 100%;
		height: auto
	}

	.single-team-left .thememount-team-img img {
		width: 100%
	}

	.thememount-team-img {
		position: relative;
		width: 100%;
		overflow: hidden
	} */

	/* .single-tm_team_member .site-main {
		padding-bottom: 60px
	}

	.single-tm_team_member .thememount-team-title-block {
		padding-bottom: 10px
	}

	.single-tm_team_member .thememount-team-title-block h2 {
		margin-bottom: 2px;
		font-size: 20px
	}

	.single-tm_team_member .vc_btn3-container.vc_btn3-left {
		text-align: center;
		padding-bottom: 10px
	} */

	/* .site-main .thememount-team-phone a,
	.site-main .thememount-team-phone a i,
	.thc-author-module .thememount-team-phoneemail .thememount-team-email a {
		color: #2a4e24;
	}

	.site-main .thememount-team-phone a:hover,
	.thc-author-module .thememount-team-phoneemail .thememount-team-email a:hover {
		opacity: 0.7;
	}

	.thc-author-module .single-team-right p,
	.thc-author-module .single-team-right .wpb_wrapper {
		line-height: 22px;
		letter-spacing: 0.5px;
		font-weight: 400;
		font-style: normal;
		color: #676767;
		font-size: 13px;
	} */

	/* .single-tm_team_member .thememount-team-position {
		color: #adadad;
		font-size: 14px;
		margin-bottom: 0;
		margin-top: 2px
	}

	.single-tm_team_member .thememount-team-data {
		text-align: center;
		padding: 22px 0;
		background-color: #f5f5f5;
		border-bottom: 4px solid #eaeaea
	}

	.single-tm_team_member .thememount-team-social-links {
		display: block;
		padding-top: 10px;
		position: relative;
		opacity: 1
	}

	.single-tm_team_member .thememount-team-social-links ul {
		margin-top: 0;
		position: relative;
		padding-left: 0
	}

	.single-tm_team_member .thememount-team-social-links a {
		opacity: 1;
		display: inline-block;
		width: 35px;
		height: 35px;
		line-height: 35px;
		border-radius: 50%;
		background-color: #333;
		color: #fff;
		-webkit-transform: inherit;
		-webkit-transition: inherit;
		transition: inherit
	}

	.single-tm_team_member .section.grid_section {
		width: auto
	}

	.single-tm_team_member .section.grid_section>.vc_column_container {
		padding-left: 0 !important;
		padding-right: 0 !important
	}

	.single-tm_team_member .single-team-left h3 {
		margin-top: 15px
	}

	.single-tm_team_member .single-team-left .thememount-team-cat-links {
		border-top: none;
		padding-top: 0;
		margin-top: 0;
		font-size: 15px
	}

	.single-tm_team_member .thememount-team-phoneemail {
		padding-top: 30px;
		margin-top: 30px;
		border-top: 1px solid rgba(0, 0, 0, .07)
	}

	.single-tm_team_member .thememount-team-phoneemail .tm-skincolor {
		font-weight: 700;
		text-transform: uppercase
	}

	.single-tm_team_member .site-main .thememount-team-phone a {
		color: #2d2d2d
	} */

	/* .tm-term-img img {
		width: 100%
	}

	.tm-term-img {
		padding-bottom: 30px
	} */

	/* .tax-tm_portfolio_category .site-main-inner,
	.tax-tm_team_group .site-main-inner {
		padding-bottom: 60px
	}

	.tm-term-desc {
		margin-bottom: 15px
	}

	.tm-taxonomy-term-list ul {
		list-style: none;
		margin: 0;
		padding: 0;
		margin-bottom: 30px
	}

	.tm-taxonomy-term-list ul ul {
		padding-left: 15px
	}

	.tm-taxonomy-term-list ul li a:before {
		content: "\f105";
		position: absolute;
		top: 17px;
		right: 12px
	}

	.tm-taxonomy-term-list ul li a {
		display: block;
		position: relative;
		font-weight: 600;
		font-size: 13px;
		padding: 12px 16px;
		letter-spacing: 1px;
		border: 1px solid rgba(0, 0, 0, .09);
		border-radius: 3px;
		text-transform: uppercase
	}

	.tm-taxonomy-term-list ul li a:hover,
	.tm-taxonomy-term-list ul li.current-cat>a {
		color: #fff
	}

	.tm-taxonomy-term-list ul li {
		margin: 5px 0
	}

	.tm-taxonomy-term-list ul li:first-child {
		margin-top: 0
	}

	.tm-taxonomy-term-list ul li.thememount-active a {
		text-decoration: none
	}

	.tm-taxonomy-term-list ul li a:before {
		font-family: FontAwesome;
		font-style: normal;
		font-weight: 400;
		speak: none;
		display: inline-block;
		text-decoration: inherit;
		width: 1em;
		margin-right: .2em;
		text-align: center;
		opacity: 1;
		font-variant: normal;
		text-transform: none;
		line-height: 1em;
		margin-left: .2em;
		font-size: 13px
	}

	.tax-team_group .tm-term-desc {
		padding-bottom: 30px
	}

	.tm-taxonomy-right .tm-term-desc {
		border-bottom: 1px solid #e9e9e9;
		padding-bottom: 30px;
		margin-bottom: 30px
	}

	.tm-taxonomy-right .tm-heading-with-separator:not(.tm-element-align-center) .vc_cta3-content-header {
		padding-left: 0;
		border-left: 0;
		padding-bottom: 20px
	}

	.tm-taxonomy-right .tm-element-heading-wrapper.tm-heading-with-separator:not(.tm-element-align-center) .vc_cta3-content-header h2:after,
	.tm-taxonomy-right .tm-element-heading-wrapper.tm-heading-with-separator:not(.tm-element-align-center) .vc_cta3-content-header h2:before {
		background-color: transparent
	}

	.tm-taxonomy-right .tm-element-heading-wrapper.tm-heading-with-separator .vc_cta3-container {
		margin-bottom: 0
	}

	.tm_team_member .tm-term-desc .tm-element-heading-wrapper .vc_cta3-container {
		margin-bottom: 0
	}

	.tax-team_group .tm-term-img img {
		width: 100%
	}

	.tax-team_group .tm-term-img {
		padding-bottom: 30px
	}

	body.thememount-sidebar-right.tax-team_group .site-main #primary.content-area {
		padding-right: 0 !important;
		border-right: none;
		margin-right: 0
	}

	.singleimage img {
		height: auto;
		max-width: 100%
	}

	.single-tm_team_member .thememount-team-social-links {
		background-color: transparent
	} */

	/* .single-team-left .thememount-team-social-links a:hover {
		color: #fff;
		background: #2a4e24 !important;
	} */

	/* .thememount-team-title a {
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		display: block
	}

	.thememount-team-title a:hover {
		text-decoration: none
	} */

	/* .thc-author-module .thememount-team-data {
		background-color: #f8f8f8;
		border: 1px solid #ebebeb;
		border-top: none;
		padding: 30px 20px 20px 20px
	} */

	/* .tm-team-member-appointment-btn-wrapper .vc_btn3-container.vc_btn3-left {
		text-align: left !important
	} */

	/* .thc-author-module .thememount-team-title-block h2 {
		margin-bottom: 0;
		font-size: 18px;
		font-weight: 500
	}

	.thc-author-module .single-team-left .thememount-team-cat-links {
		padding-bottom: 15px;
		margin-bottom: 20px;
		font-size: 14px;
		border-bottom: 1px solid #ebebeb
	}

	.thc-author-module .single-team-left .thememount-team-social-links ul li a {
		height: 30px;
		width: 30px;
		line-height: 30px;
		border-radius: 50%;
		text-align: center;
		font-size: 13px;
		background-color: #fff;
		border: 1px solid rgba(0, 0, 0, .12);
	}

	.thc-author-module .thememount-team-position {
		color: #909090;
		font-size: 13px;
		margin-bottom: 12px;
		margin-top: 0
	}

	.thc-author-module .thememount-team-phoneemail {
		padding-top: 14px;
		font-size: 15px
	}

	.thc-author-module .thememount-team-phoneemail .thememount-team-email span,
	.thc-author-module .thememount-team-phoneemail .thememount-team-phone span {
		color: #1c1c1c;
		font-weight: 600
	} */

	/* .thememount-team-cat-links {
		padding-bottom: 5px;
		margin-top: 9px;
		font-size: 13px;
		-webkit-transition: all .4s ease-in-out;
		-moz-transition: all .4s ease-in-out;
		-o-transition: all .4s ease-in-out;
		-ms-transition: all .4s ease-in-out;
		transition: all .4s ease-in-out
	}

	.thememount-team-data-right .thememount-team-cat-links {
		padding-bottom: 12px;
		border-bottom: 1px solid rgba(0, 0, 0, .09)
	} */

	/* .thememount-team-cat-links a {
		display: inline-block
	}

	.site-main .vc_row .thememount-team-cat-links a:hover {
		color: rgba(0, 0, 0, .9)
	}

	.thememount-team-cat-links a:before {
		content: "/";
		padding-left: 4px;
		padding-right: 4px
	}

	.thememount-team-cat-links a:first-child:before {
		content: "";
		padding-left: 0;
		padding-right: 0
	}

	.tm-box-style-default .thememount-team-data {
		background-color: #f7f7f7;
		border-bottom: 3px solid rgba(0, 0, 0, .03);
		padding: 21px 17px;
		width: 100%;
		transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-webkit-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		border-left: 1px solid rgba(0, 0, 0, .04);
		border-right: 1px solid rgba(0, 0, 0, .04)
	}

	.tm-row-bgtype-dark .tm-box-style-default .thememount-team-data,
	.tm-row-bgtype-grey .tm-box-style-default .thememount-team-data,
	.tm-row-bgtype-skin .tm-box-style-default .thememount-team-data {
		background-color: #fff;
		border-bottom: 4px solid #eaeaea;
		border-left: 0;
		border-right: 0
	}

	.tm-row-bgtype-skin .thememount-team-box .thememount-team-data-inner,
	.tm-row-bgtype-skin .thememount-team-box:hover .thememount-team-data-inner {
		background-color: rgba(0, 0, 0, .44)
	}

	.tm-row-bgtype-skin .tm-box-style-default:hover .thememount-team-data {
		border-bottom-color: rgba(0, 0, 0, .67)
	}

	.site-main .tm-box-style-default .thememount-team-box .thememount-team-phoneemail .tm-skincolor {
		font-weight: 700
	}

	.thememount-team-title {
		font-size: 18px;
		line-height: 25px;
		margin-bottom: 0;
		margin-top: 0;
		font-weight: 500;
		letter-spacing: 1px
	}

	.thememount-team-title:after {
		content: "";
		width: 30px;
		border-bottom: 1px solid rgba(0, 0, 0, .15);
		display: block;
		padding-top: 3px
	} */

	/* .thememount-team-box .thememount-team-data-inner,
	.thememount-team-box:hover .thememount-team-data-inner {
		background-color: rgba(0, 0, 0, .71)
	}

	.post-item-thumbnail-inner .overthumb,
	.thememount-team-box .thememount-team-img .tm-team-imglink .overthumb,
	.thememount-team-box .thememount-team-img-left .tm-team-imglink .overthumb {
		position: absolute;
		width: 100%;
		height: 100%;
		left: 0;
		top: 0;
		color: #fff;
		text-align: center;
		background-color: rgba(0, 0, 0, .57);
		opacity: 0;
		-webkit-transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-ms-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		transition: all .3s ease-in-out
	}

	.thememount-team-box:hover .thememount-team-img .tm-team-imglink .overthumb,
	.thememount-team-box:hover .thememount-team-img-left .tm-team-imglink .overthumb {
		opacity: 1
	}

	.hint--bottom:before {
		margin-left: -6px
	}

	.post-type-archive-tm_team_member .site-main-inner {
		padding-bottom: 40px
	}

	footer .widget_recent_entries .post-date {
		margin-top: 1px;
		display: block;
		margin-left: 18px;
		opacity: .6
	}

	.thememount-text-position-top p {
		margin-bottom: 0
	}

	.thememount-text-position-top .thememount-portfolio-text {
		margin-bottom: 30px;
		text-align: center
	}

	.thememount-portfolio-viewarea-fullwidth .portfolio-sortable-list ul {
		text-align: center
	}

	.thememount-text-position-top .thememount-heading-wrapper {
		padding-bottom: 10px
	}

	.page-template-template-portfolio-php .portfolio-wrapper {
		margin-bottom: 60px !important
	}

	.thememount-with-pagination.portfolio-wrapper {
		overflow: hidden
	}

	.page-template-template-portfolio-php .portfolio-wrapper {
		margin: 0 -15px !important
	}

	.portfolio-wrapper .filters {
		margin: 0 10px 2em;
		padding: 0 1em
	}

	.tm-item-thumbnail p {
		display: block;
		margin-bottom: 0
	}

	.portfolio-wrapper .filters button {
		font-family: Montserrat, sans-serif;
		font-size: 13px;
		background: 0 0;
		border: 1px solid #e4e4e4;
		-webkit-border-radius: 3px;
		border-radius: 3px;
		color: #bac1c7;
		display: inline-block;
		padding: .5em 2.5em;
		text-transform: uppercase
	}

	.portfolio-wrapper .filters button.active,
	.portfolio-wrapper .filters button:hover {
		color: #95c6d7
	}

	.thememount-row-fullwidth-true .section.grid_section .thememount-portfolio-boxes-wrapper .portfolio-wrapper .tm-item {
		text-align: center
	}

	.portfolio-wrapper .tm-item .tm-item-content h4 {
		color: #2d2d2d;
		margin: 0;
		margin-bottom: 10px;
		line-height: 22px
	}

	.thememount-items-col-four:not(.thememount-portfolio-design-nopadding) .portfolio-wrapper .tm-item .tm-item-content h4 {
		font-size: 16px
	}

	.portfolio-wrapper .tm-item .tm-item-content:after {
		clear: both;
		display: table;
		content: " "
	}

	.portfolio-box .tm-item .tm-item-content h4 a,
	.portfolio-wrapper .tm-item .tm-item-content h4 a {
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		display: block
	}

	.thememount-row-fullwidth-true .grid_section .col-lg-4 {
		width: 33.3332% !important
	}

	.portfolio-box .tm-item .tm-item-content h4 a:hover,
	.portfolio-wrapper .tm-item .tm-item-content h4 a:hover {
		text-decoration: none
	}

	.portfolio-wrapper .tm-item .tm-item-content p,
	.thememount-portfolio-related .tm-item .tm-item-content p {
		margin: 0;
		font-size: 13px;
		color: #909090;
		margin-top: 3px
	}

	.lovers {
		float: right;
		display: block;
		font-size: 14px;
		color: #bdbec0;
		margin: 10px 0;
		cursor: pointer;
		position: relative;
		padding-left: 24px
	}

	.lovers:after,
	.tm-item-thumbnail .icons a:after {
		font-family: thememount;
		font-style: normal;
		font-weight: 400;
		speak: none;
		display: inline-block;
		text-decoration: inherit;
		width: 1em;
		margin-right: .2em;
		text-align: center;
		opacity: .8;
		font-variant: normal;
		text-transform: none;
		line-height: 1em;
		margin-left: .2em;
		font-size: 16px;
		position: absolute;
		top: 2px;
		left: 0;
		color: #999
	}

	.lovers:hover {
		color: #1d9fd3
	}

	.post .lovers {
		margin: 0;
		font-size: 16px
	}

	.tm-item-thumbnail {
		position: relative;
		width: 100%;
		overflow: hidden
	}

	.thememount-portfolio-likes {
		height: 40px;
		width: 40px;
		display: block;
		line-height: 40px;
		color: #fff;
		font-size: 12px
	}

	.tm-item .icons .thememount-portfolio-likes-wrapper {
		width: 50px;
		left: 5px;
		text-align: right;
		position: absolute;
		bottom: -30px;
		-webkit-transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		-ms-transition: all .3s ease-in-out;
		transition: all .3s ease-in-out
	}

	.tm-item:hover .icons .thememount-portfolio-likes-wrapper {
		bottom: 0
	}

	div.thememount-portfolio-likes-wrapper .like-active {
		cursor: default
	}

	.site-main .vc_row.tm-row-bgtype-dark .thememount-portfolio-likes-wrapper a:hover,
	.site-main .vc_row.tm-row-bgtype-grey .thememount-portfolio-likes-wrapper a:hover,
	.site-main .vc_row.tm-row-bgtype-skin .thememount-portfolio-likes-wrapper a:hover {
		text-decoration: none
	}

	.thememount-items-col-two .tm-item .tm-item-thumbnail img {
		width: 100%
	}

	.portfolio-box .tm-item-content {
		padding: 25px 15px 25px 15px;
		position: relative;
		overflow: hidden;
		text-align: left;
		border-top: none
	}

	.portfolio-box .tm-item-content {
		padding: 25px 15px 25px 15px;
		position: relative;
		overflow: hidden;
		text-align: center;
		border-top: none;
		background-color: #f7f7f7;
		border-bottom: 3px solid rgba(0, 0, 0, .03);
		border-left: 1px solid rgba(0, 0, 0, .04);
		border-right: 1px solid rgba(0, 0, 0, .04)
	}

	.thememount-portfolio-related .thememount-post-readmore,
	.thememount-portfolio-view-carousel .thememount-post-readmore,
	.thememount-portfolio-view-default .thememount-post-readmore {
		margin-top: 15px
	}

	.thememount-items-col-five .tm-item-content,
	.thememount-items-col-six .tm-item-content {
		padding: 15px 10px
	}

	.thememount-items-col-five .portfolio-wrapper .tm-item-content h4,
	.thememount-items-col-six .portfolio-wrapper .tm-item-content h4 {
		font-size: 16px
	}

	.thememount-items-col-six .portfolio-wrapper .tm-item .tm-item-thumbnail .icons a {
		width: 32px;
		height: 32px;
		border-radius: 32px;
		font-size: 12px;
		line-height: 32px
	}

	.thememount-items-col-six .portfolio-wrapper .tm-item .tm-item-thumbnail .icons a.thememount_pf_featured {
		margin-left: -16px;
		margin-top: -16px
	}

	.tm-item-content h4 {
		margin-top: 0;
		margin-bottom: 2px;
		font-size: 18px;
		font-weight: 500;
		letter-spacing: .5px
	}

	.tm-item-content h4 a:hover {
		text-decoration: none
	}

	.site-main .tm-item .tm-item-content p {
		margin-bottom: 0;
		letter-spacing: .5px;
		font-size: 14px;
		color: rgba(28, 28, 28, .66);
		font-weight: 400
	}

	.tm-item-thumbnail .icons {
		font-size: 18px;
		display: block;
		position: absolute;
		top: 0;
		text-align: center;
		width: 100%;
		height: 100%;
		z-index: 1
	}

	.tm-item .tm-item-thumbnail .icons a.thememount_pf_featured {
		display: block;
		width: 40px;
		margin-left: -25px;
		margin-top: -25px;
		height: 40px;
		top: 50%;
		left: 50%;
		position: absolute;
		z-index: 5;
		border-radius: 50%;
		line-height: 40px;
		text-align: center;
		color: #222;
		color: #fff;
		left: 50%;
		opacity: 0;
		-webkit-transform: scale3d(0, 0, 0);
		transform: scale3d(0, 0, 0);
		-webkit-transition: all .4s;
		transition: all .4s
	}

	.tm-item:hover .tm-item-thumbnail .icons a.thememount_pf_featured {
		-webkit-transform: scale3d(1, 1, 1);
		transform: scale3d(1, 1, 1);
		opacity: 1
	}

	.tm-item .tm-item-thumbnail .icons a.thememount_pf_featured:hover {
		background-color: #fff;
		color: #333
	}

	.tm-item .tm-item-thumbnail .icons a.thememount-portfolio-likes {
		border: none;
		font-size: 14px;
		margin-top: 0;
		font-family: Arial, Helvetica, sans-serif
	}

	.tm-item:hover .tm-item-thumbnail .icons a.thememount-portfolio-likes {
		color: #fff
	}

	.tm-item .tm-item-thumbnail .icons a.thememount_pf_link {
		right: 50%;
		-webkit-transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		-ms-transition: all .3s ease-in-out;
		transition: all .3s ease-in-out;
		margin-right: 6px
	}

	.thememount-portfolio-design-nopadding .tm-item .tm-item-thumbnail .icon-overlay {
		left: 10px;
		right: 10px;
		top: 10px;
		bottom: 10px;
		width: auto;
		height: auto
	}

	.tm-item .tm-item-thumbnail .icon-overlay {
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		position: absolute;
		opacity: 0;
		background-color: rgba(0, 0, 0, .7);
		-webkit-transition: all .4s ease;
		-moz-transition: all .4s ease;
		-ms-transition: all .4s ease;
		transition: all .4s ease
	}

	.tm-item:hover .tm-item-thumbnail .icon-overlay {
		opacity: 1
	}

	.thememount-portfolio-design-nopadding .tm-item .tm-item-thumbnail .icon-overlay {
		background-color: rgba(0, 0, 0, .66)
	}

	.thememount-portfolio-design-nopadding .portfolio-box .tm-item {
		border: 1px solid transparent
	}

	.thememount-portfolio-design-nopadding .thememount-items-col-two .col-sm-6.col-md-6 {
		padding-left: 0 !important;
		padding-right: 0 !important
	}

	.thememount-portfolio-design-nopadding .tm-item .tm-item-content {
		position: absolute;
		z-index: 1;
		width: 100%;
		top: 0;
		bottom: 0;
		text-align: center;
		overflow: visible;
		opacity: 0;
		padding: 26% 20px 20px;
		background-color: transparent;
		border: none
	}

	.thememount-portfolio-design-nopadding .tm-item:hover .tm-item-content {
		opacity: 1;
		-webkit-transition: all .5s ease;
		-moz-transition: all .5s ease;
		-ms-transition: all .5s ease;
		-o-transition: all .5s ease;
		transition: all .5s ease
	}

	.thememount-portfolio-design-nopadding .tm-item .tm-item-content .tm-item-content-inner {
		position: absolute;
		z-index: 1;
		width: 100%;
		padding: 18px 45px 17px 18px;
		padding-right: 70px;
		top: auto;
		left: 0;
		bottom: 0;
		opacity: 0;
		-webkit-transform: translateY(100%);
		-moz-transform: translateY(100%);
		-ms-transform: translateY(100%);
		transform: translateY(100%);
		-webkit-backface-visibility: hidden;
		-moz-backface-visibility: hidden;
		backface-visibility: hidden;
		-webkit-transition: -webkit-transform .4s, opacity .1s .3s;
		-moz-transition: -moz-transform .4s, opacity .1s .3s;
		transition: transform .4s, opacity .1s .3s
	}

	.thememount-portfolio-design-nopadding .tm-item:hover .tm-item-content .tm-item-content-inner {
		opacity: 1;
		-webkit-transform: translateY(0);
		-moz-transform: translateY(0);
		-ms-transform: translateY(0);
		transform: translateY(0);
		-webkit-transition: -webkit-transform .4s, opacity .1s;
		-moz-transition: -moz-transform .4s, opacity .1s;
		transition: transform .4s, opacity .1s
	}

	.thememount-portfolio-design-nopadding .tm-item .tm-item-content .thememount-portfolio-likes-wrapper .thememount-portfolio-likes {
		height: 50px;
		width: 50px;
		line-height: 50px
	}

	.thememount-portfolio-design-nopadding .tm-item .tm-item-content .thememount-portfolio-likes-wrapper,
	.tm-item .tm-item-thumbnail .thememount-portfolio-likes-wrapper {
		display: block;
		right: auto;
		left: 15px;
		bottom: 15px;
		position: absolute;
		z-index: 1;
		opacity: 0;
		-webkit-transform: scale3d(0, 0, 0);
		transform: scale3d(0, 0, 0);
		-webkit-transition: all .4s;
		transition: all .4s
	}

	.thememount-portfolio-design-nopadding .tm-item:hover .tm-item-content .thememount-portfolio-likes-wrapper,
	.tm-item:hover .tm-item-thumbnail .thememount-portfolio-likes-wrapper {
		opacity: 1;
		-webkit-transform: scale3d(1, 1, 1);
		transform: scale3d(1, 1, 1)
	}

	.thememount-portfolio-design-nopadding .tm-item .tm-item-thumbnail .icons .thememount_pf_featured,
	.thememount-portfolio-design-nopadding .tm-item .tm-item-thumbnail .icons .thememount_pf_link {
		display: none
	}

	.thememount-portfolio-design-nopadding .thememount-items-col-six .tm-item:hover .tm-item-thumbnail .icons a.thememount_pf_featured,
	.thememount-portfolio-design-nopadding .thememount-items-col-six .tm-item:hover .tm-item-thumbnail .icons a.thememount_pf_link {
		margin-top: -28px
	}

	.thememount-portfolio-design-nopadding .thememount-items-col-six .tm-item .tm-item-content {
		bottom: -6px
	}

	.site-main .thememount-portfolio-design-nopadding .tm-item .tm-item-content p {
		color: rgba(255, 255, 255, .75);
		margin-bottom: 4px
	}

	.thememount-portfolio-design-nopadding .portfolio-box .tm-item .tm-item-content h4 {
		margin-bottom: 0
	}

	.tm-item .tm-item-thumbnail:before {
		background-color: rgba(0, 0, 0, .81)
	}

	.tm-item .tm-item-thumbnail .overthumb {
		display: none
	}

	.tm-item:hover .tm-item-thumbnail .icons,
	.tm-item:hover .tm-item-thumbnail .icons a.thememount_pf_link {
		opacity: 1
	}

	.tm-item:hover .tm-item-thumbnail .icons a.thememount_pf_featured {
		opacity: 1
	}

	.portfolio-box {
		margin: 0 0 20px;
		overflow: hidden;
		margin-bottom: 30px
	}

	.thememount-pf-btn.thememount-center {
		margin-top: 40px
	}

	.thememount-pf-btn.thememount-center .wpb_button_a {
		border-radius: 30px;
		padding: 12px 30px
	}

	.thememount-pf-btn.thememount-center .wpb_button_a .wpb_button {
		font-size: 13px
	}

	.thememount-row-fullwidth-true.full-colum-height-widht>.grid_section>.vc_column_container {
		display: table-cell;
		width: 50%;
		float: none;
		vertical-align: top
	}

	.thememount-row-fullwidth-true.full-colum-height-widht>.grid_section>.vc_column_container img {
		display: none
	}

	.thememount-row-fullwidth-true .thememount-fullcolum-true.vc_column_container {
		padding: 0
	}

	.tm-item .tm-item-thumbnail .icons a.thememount_pf_link {
		display: none
	}

	.portfolio-description h2,
	.thememount-portfolio-details h2,
	.thememount-portfolio-related h2 {
		font-size: 20px;
		font-weight: 700
	}

	.thememount-portfolio-related h2 {
		margin-bottom: 30px
	}

	.thememount-portfolio-details .thememount-heading-wrapper.thememount-heading-wrapper-align-left,
	.thememount-portfolio-details .thememount-heading-wrapper.thememount-heading-wrapper-align-right {
		padding-bottom: 0
	}

	.thememount-portfolio-related {
		margin-top: 60px;
		margin-bottom: 25px
	}

	ul.thememount-portfolio-details-list {
		margin: 0;
		margin-top: -7px;
		padding: 0;
		list-style: none
	}

	ul.thememount-portfolio-details-list li {
		padding: 16px 0;
		border-bottom: 1px solid #e8e8e8
	}

	ul.thememount-portfolio-details-list li i {
		float: left;
		margin-right: 20px;
		width: 35px;
		margin-top: 6px;
		font-size: 35px;
		color: rgba(0, 0, 0, .26)
	} */

	/* ul.thememount-portfolio-details-list li span.tm-pf-right-details {
		display: block;
		float: none;
		margin-top: -3px;
		padding-left: 55px
	}

	.tm-pf-proj-btn {
		margin-top: 20px;
		text-align: left
	}

	.tm-pf-proj-btn .vc_btn3-container {
		text-align: left
	}

	span.tm-pf-left-details {
		color: #333;
		font-size: 14px;
		font-weight: 700
	}

	.thememount-blog-boxes-wrapper.thememount-items-col-one .thememount-blog-boxes-inner.multi-columns-row .post-item .post-item-thumbnail {
		float: left;
		width: 225px
	}

	.thememount-blog-boxes-wrapper.thememount-items-col-one .thememount-blog-boxes-inner.multi-columns-row .post-item .tm-item-content {
		padding-top: 0;
		margin-left: 225px;
		border: none;
		padding: 0 0 20px 20px;
		background-color: transparent
	} */

	/* .thememount-blog-boxes-wrapper.thememount-items-col-one .thememount-blog-boxes-inner.multi-columns-row .tm-post-box .post-item {
		border-bottom: 1px solid rgba(0, 0, 0, .07)
	}

	.thememount-blog-boxes-wrapper.thememount-items-col-one .thememount-blog-boxes-inner.multi-columns-row .tm-post-box:last-child .post-item {
		border-bottom: 1px solid transparent
	}

	.thememount-blog-boxes-wrapper.thememount-items-col-one .thememount-blog-boxes-inner.multi-columns-row .post-item .tm-item-content .post-box-icon-wrapper {
		display: none
	}

	.thememount-items-col-one .thememount-blog-text {
		padding-bottom: 0
	}

	.portfolio-sortable-list ul {
		margin: 0;
		padding-bottom: 40px;
		text-align: center
	}

	.portfolio-sortable-list ul li {
		display: inline-block;
		margin-right: 10px;
		line-height: 2
	}

	.portfolio-sortable-list ul li:after {
		content: '/';
		color: rgba(0, 0, 0, .32)
	}

	.site-main .tm-row-bgtype-dark .portfolio-sortable-list ul li:after {
		color: rgba(255, 255, 255, .38)
	}

	.tm-row-bgtype-skin .portfolio-sortable-list ul li:after {
		color: #fff
	}

	.portfolio-sortable-list ul li:last-child:after {
		display: none
	}

	.site-main .portfolio-sortable-list ul li a {
		padding: 10px 12px 10px 2px;
		font-size: 13px;
		font-weight: 700;
		color: #222;
		text-transform: uppercase;
		letter-spacing: 1px
	}

	.tm-row-bgtype-skin .portfolio-sortable-list ul li:hover a:before {
		background-color: #fff
	}

	.tm-row-bgtype-dark .portfolio-sortable-list ul li a {
		border-radius: 3px;
		color: #909090
	}

	.portfolio-sortable-list ul li a.selected {
		outline: medium none;
		text-decoration: none
	}

	.portfolio-sortable-list ul li a.active,
	.portfolio-sortable-list ul li a:hover {
		text-decoration: none
	}

	.tm-row-bgtype-skin .portfolio-sortable-list ul li a,
	.tm-row-bgtype-skin .portfolio-sortable-list ul li a.selected,
	.tm-row-bgtype-skin .portfolio-sortable-list ul li a:hover {
		border-color: rgba(255, 255, 255, .6)
	}

	.tm-row-bgtype-skin .portfolio-sortable-list ul li a {
		color: #fff
	}

	.portfolio-description {
		margin-bottom: 25px;
		padding-right: 30px
	}

	.thememount-portfolio-details {
		margin-bottom: 30px;
		padding-left: 30px
	}

	.tm-psingleview-top #thememount-portfolio-sidebar {
		padding-top: 30px
	}

	.portfolio-meta-details {
		border-left: 1px solid #eaeaea
	}

	.tm-psingleview-default .portfolio-meta-details {
		border-left: none
	}

	.tm-psingleview-default .thememount-portfolio-details {
		margin-bottom: 0;
		padding-left: 0
	}

	.tm-social-share-w ul li {
		display: inline-block;
		padding-left: 4px;
		padding-right: 4px;
		min-width: 33px;
		border: none
	}

	.tm-social-share-w {
		border-top: 1px solid #eaeaea
	}

	.tm-social-share-w ul {
		margin: 0;
		padding: 0;
		margin-top: 30px
	}

	.tm-social-share-w ul li:first-child {
		padding-left: 0
	}

	.tm-social-share-w ul li>a {
		width: 40px;
		height: 40px;
		line-height: 40px;
		border-radius: 30px;
		border: 1px solid rgba(0, 0, 0, .07);
		display: block;
		text-align: center;
		background-color: #f3f3f3;
		color: #5d5d5d
	}

	.tm-social-share-w ul li>a:hover {
		color: #fff
	}

	.portfolio-single {
		margin-bottom: 50px;
		margin-top: 40px
	}

	.portfolio-style-1 .holder {
		-webkit-transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-ms-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
		transition: all .2s ease-in-out;
		padding-top: 1px;
		padding-left: 1px;
		width: 32px;
		height: 32px;
		border-radius: 100%;
		float: left;
		text-align: center;
		background: #5d5d5d;
		color: #fff;
		line-height: 32px
	}

	.portfolio-style-1 .portfolio-meta {
		-webkit-transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-ms-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
		transition: all .2s ease-in-out;
		float: none;
		overflow: hidden;
		margin-bottom: 8px;
		cursor: pointer
	}

	.portfolio-style-1 .project-meta {
		float: left;
		margin-left: 15px;
		max-width: 238px;
		line-height: 32px
	}

	.portfolio-style-1 .holder {
		text-align: center;
		color: #fff;
		line-height: 31px
	}

	.thememount-portfolio-content .mediabox {
		position: relative;
		padding-bottom: 56.25%;
		height: 0
	}

	.thememount-portfolio-content .mediabox iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%
	}

	.thememount-portfolio-view-top .thememount-portfolio-content {
		margin-bottom: 40px
	}

	.thememount-portfolio-view-top .thememount-portfolio-related {
		margin-top: 80px
	}

	.thememount-portfolio-view-default .portfolio-description {
		margin-top: 30px
	}

	.tm-pf-single-title {
		margin-bottom: 60px
	}

	.tm-pf-single-np-nav {
		position: absolute;
		top: -5px;
		right: 0
	} */

	/* .tm-psingleview-default,
	.tm-psingleview-full,
	.tm-psingleview-top {
		position: relative
	}

	.tm-pf-navigation .vc_btn3-container.vc_btn3-inline {
		display: inline-block;
		vertical-align: top
	}

	.tm-pf-description-title-w:after {
		visibility: hidden;
		display: block;
		font-size: 0;
		content: " ";
		clear: both;
		height: 0
	}

	.tm-pf-description-title-w .thememount-portfolio-likes-wrapper,
	.tm-pf-description-title-w .tm-pf-description-title {
		float: left
	}

	.tm-pf-description-title-w {
		padding-top: 20px
	}

	.tm-pf-single-view .tm-social-share-w ul li {
		padding-bottom: 10px
	}

	.tm-pf-description-title-w .thememount-portfolio-likes-wrapper {
		float: left;
		border-left: 1px solid #eaeaea;
		margin-left: 18px;
		padding-left: 15px;
		margin-top: 1px
	}

	.tm-pf-description-title-w .thememount-portfolio-likes-wrapper .thememount-portfolio-likes {
		height: 30px;
		width: 40px;
		text-align: left;
		line-height: 30px
	}

	.tm-pf-proj-btn .vc_btn3-container a.vc_general.vc_btn3,
	.tm-pf-single-np-nav .vc_btn3-container a.vc_general.vc_btn3 {
		border: 2px solid #03acdc;
		color: #03acdc;
		background-color: transparent
	}

	.tm-pf-proj-btn .vc_btn3-container a.vc_general.vc_btn3:hover,
	.tm-pf-single-np-nav .vc_btn3-container a.vc_general.vc_btn3:hover {
		color: #fff
	}
	*/

	/* .tm-list li {
		margin-bottom: 14px;
		letter-spacing: .5px
	}

	ul.tm-list li {
		position: relative;
		padding-left: 28px;
		font-weight: 300;
		display: flex;
		align-items: center;
		flex: 0 0 50%;
	}

	ul.tm-list.tm-list-style-disc li {
		padding-left: 0
	}


	.tm-list.tm-list-style-icon {
		list-style: none;
		padding-left: 0;
		font-size: 16px;
		font-weight: 400;
		display: flex;
		flex-wrap: wrap;
	}

	.tm-list.tm-list-style-icon i.tm-skincolor {
		margin-left: 5px;
		margin-right: 8px;
		color: #2a4e24;
	} */

	/* .tm-col-bgcolor-skin ul.thememount_vc_contact_wrapper li:before,
	.tm-row-bgtype-skin .tm-list.tm-list-style-icon i.tm-skincolor,
	.tm-row-bgtype-skin ul.thememount_vc_contact_wrapper li:before,
	.tm-row-bgtype-skin ul.thememount_widget_contact_wrapper li:before {
		color: rgba(255, 255, 255, .8)
	}

	ul.tm-schedule-block {
		padding: 0;
		font-size: 14px
	}

	ul.tm-schedule-block li {
		list-style: none;
		border-bottom: 1px solid rgba(0, 0, 0, .18);
		padding: 9px 0
	}

	.tm-col-bgcolor-dark ul.tm-schedule-block li,
	.tm-col-bgcolor-skin ul.tm-schedule-block li,
	.tm-row-bgtype-dark ul.tm-schedule-block li,
	.tm-row-bgtype-skin ul.tm-schedule-block li {
		border-bottom: 1px solid rgba(255, 255, 255, .16)
	}

	ul.tm-schedule-block li:last-child {
		border-bottom: none
	} */

	/* .education p {
		font-size: 13px;
	}

	.single-article-box img {
		width: 100%;
		border-radius: 9px;
		border-bottom-right-radius: 9px;
		border-bottom-left-radius: 9px;
		border-bottom-left-radius: 9px;
		border-bottom-left-radius: 0;
		border-bottom-right-radius: 0;
		height: 200px;
		object-fit: cover;
	}

	.related-posts .thc-heading {
		font-size: 22px;
		color: #2a4e24;
		margin: 0 0 20px;
	}

	.single-article-box {
		display: flex;
		margin-bottom: 15px;
	}

	.single-article-box-inner {
		border-radius: 9px;
		border-bottom-left-radius: 9px;
		border-bottom-left-radius: 0;
		box-shadow: 5px 5px 0 rgba(0, 0, 0, .03);
		backface-visibility: hidden;
		transform: translate3d(0, 0, 0);
		margin: .625rem;
		color: #646464;
		cursor: pointer;
		background: #fff;
		margin: 0;
	} */

	/* .single-article-box-text {
		padding: 10px;
	}

	.single-article-box-text span {
		font-size: 11px;
	}

	.single-article-box-inner h3 a {
		font-size: 14px;
		font-weight: 600;
		color: #2a4e24;
	}

	.category-list {
		margin: 0 0 5px;
	}

	.category-list a {
		font-size: 13px;
		color: #2a4e24;
	}

	.single-article-box-inner h3 {
		margin: 0;
	}

	.row.articles-row {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
	} */

	/* @media (max-width:768px) {
		.tm-list.tm-list-style-icon {
			display: block;
		}

		.single-team-right {
			margin-top: 30px;
		}
	} */
</style>


<?php get_footer(); ?>