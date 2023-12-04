<?php 

function thememount_apiconaadv_cpt_tm_testimonial(){
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => _x( 'Testimonials', 'Testimonials post type general name', 'apicona' ),
		'singular_name'      => _x( 'Testimonial', 'Testimonials post type singular name', 'apicona' ),
		'menu_name'          => _x( 'Testimonials', 'Testimonials post type admin menu', 'apicona' ),
		'name_admin_bar'     => _x( 'Testimonial', 'Testimonials post type - add new on admin bar', 'apicona' ),
		'add_new'            => _x( 'Add New', 'testimonial', 'apicona' ),
		'add_new_item'       => __( 'Add New Testimonial', 'apicona' ),
		'new_item'           => __( 'New Testimonial', 'apicona' ),
		'edit_item'          => __( 'Edit Testimonial', 'apicona' ),
		'view_item'          => __( 'View Testimonial', 'apicona' ),
		'all_items'          => __( 'All Testimonials', 'apicona' ),
		'search_items'       => __( 'Search Testimonial', 'apicona' ),
		'parent_item_colon'  => __( 'Parent Testimonial:', 'apicona' ),
		'not_found'          => __( 'No testimonial found.', 'apicona' ),
		'not_found_in_trash' => __( 'No testimonial found in Trash.', 'apicona' )
	);
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-format-status',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'testimonial', $args );
	
	
	
	
	// Declaring Team variable
	$testimonial = new Cuztom_Post_Type('testimonial');
	
	
	
	
	/*********** Post Meta Box **************/
	$testimonial->add_meta_box( 
		'kwayy_testimonials_details',
		__('Apicona Advanced: Testimonial Details', 'apicona'),
		array(
			array(
				'name'          => 'clienturl',
				'label'         => __('Website Link', 'apicona'),
				'description'   => __("(Optional) Please fill person or company's website link", 'apicona'),
				'type'          => 'text'
			),
			array(
				'name'          => 'designation',
				'label'         => __('Person designation or company name', 'apicona'),
				'description'   => __('(Optional) Please fill designation of the person. Fill Company name if it is a company.', 'apicona'),
				'type'          => 'text'
			),
		)
	);
	/**********************************************/

	
	// Testimonial Group
	$testimonial->add_taxonomy(
		'Testimonial_Group',
		array(),
		array(
			'name'              => _x( 'Testimonial Group', 'taxonomy general name', 'apicona' ),
			'singular_name'     => _x( 'Testimonial Group', 'taxonomy singular name', 'apicona' ),
			'search_items'      => __( 'Search Group', 'apicona' ),
			'all_items'         => __( 'All Groups', 'apicona' ),
			'parent_item'       => __( 'Parent Group', 'apicona' ),
			'parent_item_colon' => __( 'Parent Group:', 'apicona' ),
			'edit_item'         => __( 'Edit Group', 'apicona' ),
			'update_item'       => __( 'Update Group', 'apicona' ),
			'add_new_item'      => __( 'Add New Group', 'apicona' ),
			'new_item_name'     => __( 'New Group Name', 'apicona' ),
			'menu_name'         => __( 'Testimonial Group', 'apicona' ),
		)
	);
		
}
add_action( 'init', 'thememount_apiconaadv_cpt_tm_testimonial', 8);
	
	
	
	
/* Change "Enter Title Here" */
function thememount_apiconaadv_testimonial_enter_title_here( $title ){
	$screen = get_current_screen();
	if ( 'testimonial' == $screen->post_type ) {
		$title = __('Person or Company Name', 'apicona');
	}
	return $title;
}
add_filter( 'enter_title_here', 'thememount_apiconaadv_testimonial_enter_title_here' );


// Move Featured Image box from left to center only on CLIENTS custom_post_type
add_action('do_meta_boxes', 'thememount_apiconaadv_testimonial_featured_image_box');
function thememount_apiconaadv_testimonial_featured_image_box() {
	remove_meta_box( 'postimagediv', 'testimonial', 'normal' );
	add_meta_box('postimagediv', __('Select/Upload Image of Person or Company','apicona'), 'post_thumbnail_meta_box', 'testimonial', 'normal', 'high');
}



