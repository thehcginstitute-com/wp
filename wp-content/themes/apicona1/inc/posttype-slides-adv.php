<?php 

function thememount_apiconaadv_cpt_slides(){

	
	
	
	
	// Register Post Type
	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'apicona' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'apicona' ),
		'menu_name'          => _x( 'Slides', 'admin menu', 'apicona' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'apicona' ),
		'add_new'            => _x( 'Add New', 'slide', 'apicona' ),
		'add_new_item'       => __( 'Add New Slide', 'apicona' ),
		'new_item'           => __( 'New Slide', 'apicona' ),
		'edit_item'          => __( 'Edit Slide', 'apicona' ),
		'view_item'          => __( 'View Slide', 'apicona' ),
		'all_items'          => __( 'All Slides', 'apicona' ),
		'search_items'       => __( 'Search Slide', 'apicona' ),
		'parent_item_colon'  => __( 'Parent Slide:', 'apicona' ),
		'not_found'          => __( 'No slide found.', 'apicona' ),
		'not_found_in_trash' => __( 'No slide found in Trash.', 'apicona' )
	);
	$args = array(
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-images-alt2',
		'public'              => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'slide' ),
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => null,
		'supports'            => array( 'title', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'slide', $args );
	
	
	
	
	// Declaring Slide variable
	$slide = new Cuztom_Post_Type('slide');
	
	
	
	

	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'thememount_apiconaadv_slides_featured_image_box');
	function thememount_apiconaadv_slides_featured_image_box() {
		remove_meta_box( 'postimagediv', 'slide', 'normal' );
		add_meta_box('postimagediv', __('Slide Image','apicona'), 'post_thumbnail_meta_box', 'slide', 'normal', 'high');
	}


	/*********** Post Meta Box **************/
	$slide->add_meta_box(
		'kwayy_slides_options',
		__('Slide Options', 'apicona'),
		array(
			array(
				'name'          => 'desc',
				'label'         => __( 'Description', 'apicona'),
				'description'   => __( 'Add description text for this slide', 'apicona'),
				'type'          => 'textarea'
			),
			array(
				'name'          => 'btntext',
				'label'         => __( 'Button Text', 'apicona'),
				'description'   => __( 'Add text for button.', 'apicona'),
				'type'          => 'text'
			),
			array(
				'name'          => 'btnlink',
				'label'         => __( 'Button Link', 'apicona'),
				'description'   => __( 'Add URL for button.', 'apicona'),
				'type'          => 'text'
			),
		)
	);
	/**********************************************/


	/* Category */
	$slide->add_taxonomy(
		'Slide_Group',
		array(),
		array(
			'name'              => _x( 'Slide Group', 'taxonomy general name', 'apicona' ),
			'singular_name'     => _x( 'Slide Group', 'taxonomy singular name', 'apicona' ),
			'search_items'      => __( 'Search Group', 'apicona' ),
			'all_items'         => __( 'All Groups', 'apicona' ),
			'parent_item'       => __( 'Parent Group', 'apicona' ),
			'parent_item_colon' => __( 'Parent Group:', 'apicona' ),
			'edit_item'         => __( 'Edit Group', 'apicona' ),
			'update_item'       => __( 'Update Group', 'apicona' ),
			'add_new_item'      => __( 'Add New Group', 'apicona' ),
			'new_item_name'     => __( 'New Group Name', 'apicona' ),
			'menu_name'         => __( 'Slide Group', 'apicona' ),
		)
	);
	


}
add_action( 'init', 'thememount_apiconaadv_cpt_slides', 8);