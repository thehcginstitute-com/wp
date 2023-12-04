<?php 

function thememount_apiconaadv_cpt_tm_client(){

	
	// Register Post Type
	$labels = array(
		'name'               => _x( 'Clients', 'post type general name', 'apicona' ),
		'singular_name'      => _x( 'Client', 'post type singular name', 'apicona' ),
		'menu_name'          => _x( 'Client Logos', 'admin menu', 'apicona' ),
		'name_admin_bar'     => _x( 'Client', 'add new on admin bar', 'apicona' ),
		'add_new'            => _x( 'Add New', 'client', 'apicona' ),
		'add_new_item'       => __( 'Add New Client', 'apicona' ),
		'new_item'           => __( 'New Client', 'apicona' ),
		'edit_item'          => __( 'Edit Client', 'apicona' ),
		'view_item'          => __( 'View Client', 'apicona' ),
		'all_items'          => __( 'All Clients', 'apicona' ),
		'search_items'       => __( 'Search Client', 'apicona' ),
		'parent_item_colon'  => __( 'Parent Client:', 'apicona' ),
		'not_found'          => __( 'No client found.', 'apicona' ),
		'not_found_in_trash' => __( 'No client found in Trash.', 'apicona' )
	);
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-businessman',
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'client' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'client', $args );
	
	
	
	// Declaring Portfolio variable
	$client = new Cuztom_Post_Type('client');



	/* Category */
	$client->add_taxonomy(
		'Client Group',
		array(),
		array(
			'name'              => _x( 'Client Group', 'taxonomy general name', 'apicona' ),
			'singular_name'     => _x( 'Client Group', 'taxonomy singular name', 'apicona' ),
			'search_items'      => __( 'Search Client Group', 'apicona' ),
			'all_items'         => __( 'All Client Groups', 'apicona' ),
			'parent_item'       => __( 'Parent Group', 'apicona' ),
			'parent_item_colon' => __( 'Parent Group:', 'apicona' ),
			'edit_item'         => __( 'Edit Group', 'apicona' ),
			'update_item'       => __( 'Update Group', 'apicona' ),
			'add_new_item'      => __( 'Add New Client Group', 'apicona' ),
			'new_item_name'     => __( 'New Client Group Name', 'apicona' ),
			'menu_name'         => __( 'Client Group', 'apicona' ),
		)
	);



	/* Change "Enter Title Here" */
	function thememount_apiconaadv_tm_client_enter_title_here( $title ){
		$screen = get_current_screen();
		if ( 'client' == $screen->post_type ) {
			$title = __('Client Name', 'apicona');
		}
		return $title;
	}
	add_filter( 'enter_title_here', 'thememount_apiconaadv_tm_client_enter_title_here' );




	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'thememount_apiconaadv_tm_client_featured_image_box');
	function thememount_apiconaadv_tm_client_featured_image_box() {
		remove_meta_box( 'postimagediv', 'client', 'normal' );
		add_meta_box('postimagediv', __('Select/Upload Image of the Client','apicona'), 'post_thumbnail_meta_box', 'client', 'normal', 'high');
	}



	/*********** Post Meta Box **************/
	$client->add_meta_box( 
		'kwayy_clients_details',
		__('Apicona Advanced: Client Details', 'apicona'),
		array(
			array(
				'name'          => 'clienturl',
				'label'         => __('Website Link', 'apicona'),
				'description'   => __("(Optional) Please fill person or company's website link", 'apicona'),
				'type'          => 'text'
			),
		)
	);
	/**********************************************/

}
add_action( 'init', 'thememount_apiconaadv_cpt_tm_client', 8 );
