<?php
/*
 * Custom PHP code for child theme will be here
 */
/***********************************************************************/
// Syed Custom Development Start
/***********************************************************************/

// Custom assets include
function child_theme_enqueue_styles() {
    wp_enqueue_script('custom-JS', get_stylesheet_directory_uri().'/assets/js/custom.js?nocahe='.rand(0,1000), array('jquery'), null, true);
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

/********************  THI Custom Author Section ***********************/
if( !function_exists('thiCustomAuthorSection') ){
	function thiCustomAuthorSection() {
		if (is_singular('post') || is_singular('page')) {
			$post_id = get_the_ID();
			if($post_id){
				
				$img_src = 'https://www.thehcginstitute.com/wp-content/uploads/2024/01/dark-green-checkmark.png';
				// (Author 1) | Medically Reviewed By (Author 2) | Updated (Date)
				$enable_author = get_field('enable_author', $post_id);
				$select_author = get_field('select_author', $post_id);
				$author_link = get_field('author_link', $post_id);
				$author_label = get_field('author_label', $post_id);


				$reviewer_label = get_field('reviewer_label', $post_id);
				$enable_reviewer = get_field('enable_reviewer', $post_id);
				$select_reviewer = get_field('select_reviewer', $post_id);
				$reviewer_link = get_field('reviewer_link', $post_id);
				// $display_date = get_the_date();
				$display_date = get_post_modified_time('F j, Y', false, $post_id, true); 
				$sep = '<i class="thi-sep">|</i>';

				echo '<div class="thi-custom-author-section">';
					if ($enable_author && $select_author) {echo '<span>'.$author_label.' <a href="' . (!empty($author_link) ? $author_link : 'javascript:;') . '">' . $select_author['display_name'] . '</a> </span>';}
					if ($enable_reviewer && $select_reviewer) {if ($enable_author && $select_author) {echo $sep; } echo '<span><img src="'.$img_src.'" alt="checked-checkbox">'.$reviewer_label.' <a href="' . (!empty($reviewer_link) ? $reviewer_link : 'javascript:;') . '">' . $select_reviewer['display_name'] . '</a></span>';}
					if ($display_date) { if ($enable_reviewer && $select_reviewer) {echo $sep; } echo '<span>Updated: '.$display_date.'</span>'; }
				echo '</div>';
				
			}
		}
	}
}

/********************  THI Add new columns to the post listing ***********************/

if (!function_exists('add_custom_columns_to_posts')) {
    function add_custom_columns_to_posts($columns) {
        $columns['thi_author'] = 'THI Author';
        $columns['medically_reviewed_by'] = 'MD_RB';
        return $columns;
    }
    add_filter('manage_posts_columns', 'add_custom_columns_to_posts');
	add_filter('manage_pages_columns', 'add_custom_columns_to_posts');
}

/********************  THI Populate the new columns with data ***********************/
if (!function_exists('custom_columns_content')) {
    function custom_columns_content($column_name, $post_id) {
        switch ($column_name) {
            case 'thi_author':
                // Get the THC author field
                $thi_author = get_field('select_author', $post_id);
                if (isset($thi_author) && isset($thi_author['ID'])) {
                    $author_url = esc_url(get_edit_user_link($thi_author['ID']));
                    echo '<a href="' . $author_url . '">' . esc_html($thi_author['display_name']) . '</a>';
                } else {
                    echo '';
                }
                break;

            case 'medically_reviewed_by':
                // Get the medically reviewed by field
                $medically_reviewed_by = get_field('select_reviewer', $post_id);
                if (isset($medically_reviewed_by) && isset($medically_reviewed_by['ID'])) {
                    $reviewer_url = esc_url(get_edit_user_link($medically_reviewed_by['ID']));
                    echo '<a href="' . $reviewer_url . '">' . esc_html($medically_reviewed_by['display_name']) . '</a>';
                } else {
                    echo '';
                }
                break;
        }
    }
    add_action('manage_posts_custom_column', 'custom_columns_content', 10, 2);
	add_action('manage_pages_custom_column', 'custom_columns_content', 10, 2);
}

/********************  CUSTOM THI CODE ***********************/

function custom_THI_scripts() {
    ?>
    <style>
        /* #ez-toc-container > label {display: none;}
		#ez-toc-container{border:none !important;}
		.THI-FAQS h3, .THI-FAQS h2{color: #fff;}
		.THI-FAQS h2{font-size: 22px;margin: 20px 0 30px;}
		.THI-FAQS{background: #2a4e24;color: #fff;padding: 20px 30px;margin: 30px 0;border-radius: 8px;}
		.THI-FAQS h2{font-size: 22px;margin: 20px 0 30px;}
		.faq-item{margin-bottom: 30px;}
		.THI-FAQS h3{font-size: 18px;font-weight: 600;} */
    </style>
    <?php
}
add_action('wp_footer', 'custom_THI_scripts');

/********************  CUSTOM FAQ ***********************/
function THI_FAQ_shortcode_callback() {
	// Start output buffering
	ob_start();
    // Check if the ACF plugin is active
    if( !function_exists('get_field') ) return 'ACF plugin is not active';
		// Global post variable
		global $post;
		if($post->ID){
				// Get the ACF fields
				$heading = get_field('heading', $post->ID);
				$faqs = get_field('faq', $post->ID);

				

				// Check if the fields are not empty
				if ($faqs) {
					echo '<div class="THI-FAQS">';

							// Display the heading
							echo '<h2>' . esc_html($heading) . '</h2>';

							// Start the FAQ section
							echo '<div class="my-faq-container">';

							// Loop through each FAQ
							foreach ($faqs as $faq) {
								echo '<div class="faq-item">';
								echo '<h3>' . esc_html($faq['question']) . '</h3>';
								echo '<div>' . wpautop($faq['answer']) . '</div>';
								echo '</div>';
							}

							// Close the FAQ section
							echo '</div>';
					echo '</div>'; // Close THI-FAQS

				}
		}

    // Return the buffered content
    return ob_get_clean();
}
add_shortcode('THI_FAQ', 'THI_FAQ_shortcode_callback');

/********************  CUSTOM FAQ ***********************/


/********************  CUSTOM POST TYPE AUTHOR ***********************/

function create_author_custom_post_type() {
    $labels = array(
        'name'                  => _x('Authors', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Author', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Authors', 'textdomain'),
        'name_admin_bar'        => __('Author', 'textdomain'),
        'archives'              => __('Author Archives', 'textdomain'),
        'attributes'            => __('Author Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Author:', 'textdomain'),
        'all_items'             => __('All Authors', 'textdomain'),
        'add_new_item'          => __('Add New Author', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Author', 'textdomain'),
        'edit_item'             => __('Edit Author', 'textdomain'),
        'update_item'           => __('Update Author', 'textdomain'),
        'view_item'             => __('View Author', 'textdomain'),
        'view_items'            => __('View Authors', 'textdomain'),
        'search_items'          => __('Search Author', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Featured Image', 'textdomain'),
        'set_featured_image'    => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image'    => __('Use as featured image', 'textdomain'),
        'insert_into_item'      => __('Insert into author', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this author', 'textdomain'),
        'items_list'            => __('Authors list', 'textdomain'),
        'items_list_navigation' => __('Authors list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter authors list', 'textdomain'),
    );
    
    $args = array(
        'label'                 => __('Author', 'textdomain'),
        'description'           => __('Post Type Description', 'textdomain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => array('slug' => 'author'),
        'capability_type'       => 'post',
		'menu_icon'           => 'dashicons-admin-users',
    );

    register_post_type('author', $args);
}
// add_action('init', 'create_author_custom_post_type', 0);

/********************  CUSTOM POST TYPE AUTHOR ***********************/

/********************  CUSTOM CTA BOX SHORTCODE START ***********************/
function cta_box_shortcode(){
    ob_start();
    if( !function_exists('get_field') ) return 'ACF plugin is not active';

    global $post;

    if($post->ID){
        $image_url = esc_url(get_field('cta_image', $post->ID));
        $image_size = get_field('set_image_width', $post->ID);
        $heading = esc_html(get_field('cta_title', $post->ID));
        $description = esc_html(get_field('cta_desc', $post->ID));
        $button_text = esc_html(get_field('cta_button_text', $post->ID));
        $button_link = esc_url(get_field('cta_button_url', $post->ID));

		?>
        <div class="cta-box">
            <div class="cta-box-row">
                <div class="cta-box-col" style="width: <?php echo $image_size; ?>%;" >
                    <div class="cta-box-image-wrapper">
                        <img src="<?php echo $image_url; ?>" alt="" />
                    </div>
                </div>
                <div class="cta-box-col">
                    <div class="cta-box-content-wrapper">
                        <div class="cta-box-text-wrapper">
							<h2 class="cta-box-heading"><?php echo $heading; ?></h2>
							<p class="cta-box-desc"><?php echo $description; ?></p>
						</div>
						<?php if ($button_link) : ?>
                        <div class="cta-box-btn-wrapper">
                        <a href="<?php echo $button_link; ?>" class="cta-box-btn"><?php echo $button_text; ?></a>
                        </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php

    }

    return ob_get_clean();
}

add_shortcode('cta_box', 'cta_box_shortcode');
/********************  CUSTOM CTA BOX SHORTCODE END ***********************/

/********************  CUSTOM PRODUCT SECTIONS SHORTCODE START ***********************/
function product_cta_section_shortcode(){
    ob_start();
    if( !function_exists('get_field') ) return 'ACF plugin is not active';

    global $post;

    if($post->ID){
        $enable_product_cta = esc_url(get_field('enable_product_cta', $post->ID));
        $product_image = esc_url(get_field('product_image', $post->ID));
        $product_title = esc_html(get_field('product_title', $post->ID));
        $product_description = esc_html(get_field('product_description', $post->ID));
        $product_button_text = esc_html(get_field('product_button_text', $post->ID));
        $product_buton_url = esc_url(get_field('product_buton_url', $post->ID));
        $product_disclaimer = esc_html(get_field('product_disclaimer', $post->ID));

        $product_button_color = esc_html(get_field('product_button_color', $post->ID));
        $product_disclaimer_color = esc_html(get_field('product_disclaimer_color', $post->ID));


        if(!empty($enable_product_cta)){
	    ?>
        
            <div class="row col-md-12 product-cta-outer-section">
                <div class="col-md-8 product-cta-left-section">
                    <img class="product-cta-image" src="<?php echo $product_image; ?>" alt="">
                </div>
                <div class="col-md-4 product-cta-right-section">
                    <h2 class="product_cta-box-heading"><?php echo $product_title; ?></h2>
                    <p class="product_cta-box-desc"><?php echo $product_description; ?></p>
                    <a class="product_cta_box_link" style="background-color: <?php echo $product_button_color; ?>;" href="<?php echo $product_buton_url; ?>" class="cta-box-btn"><?php echo $product_button_text; ?></a>
                    <?php 
                    if( have_rows('details') ): ?>
                        <?php
                        // Loop through the rows of data
                        while ( have_rows('details') ) : the_row(); ?>
                            <div class="accordion-item">
                                <button class="accordion">
                                        <?php the_sub_field('detail_title'); ?>
                                </button>
                                </h2>
                                <div class="panel">
                                    <p><?php the_sub_field('detail_description'); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else :
                        // no rows found
                    endif;
                    ?>
                    <p class="product_disclaimer" style="color: <?php echo $product_disclaimer_color; ?>;">
                        <span uk-icon="icon: warning; ratio: 1;" class="uk-margin-small-right uk-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20">
                                <circle cx="10" cy="14" r="1" style="fill: #ae1010;"></circle>
                                <circle fill="none" stroke="#ae1010" stroke-width="1.1" cx="10" cy="10" r="9"></circle>
                                <path d="M10.97,7.72 C10.85,9.54 10.56,11.29 10.56,11.29 C10.51,11.87 10.27,12 9.99,12 C9.69,12 9.49,11.87 9.43,11.29 C9.43,11.29 9.16,9.54 9.03,7.72 C8.96,6.54 9.03,6 9.03,6 C9.03,5.45 9.46,5.02 9.99,5 C10.53,5.01 10.97,5.44 10.97,6 C10.97,6 11.04,6.54 10.97,7.72 L10.97,7.72 Z" style="fill: #ae1010;"></path>
                            </svg>
                        </span>
                        <?php echo $product_disclaimer; ?>
                    </p>
                </div> 
            </div>
    <?php
        }

    }

    return ob_get_clean();
}
add_shortcode('product_cta_section', 'product_cta_section_shortcode');
/********************  CUSTOM PRODUCT SECTIONS SHORTCODE END ***********************/

/***********************************************************************/
// Syed Custom Development End
/**********************************************************************/

