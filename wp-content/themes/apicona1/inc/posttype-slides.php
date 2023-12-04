<?php 
function kwayy_cpt_slides(){

// Including Framework Master File
include_once(get_template_directory() . '/inc/cuztom-helper-framework/cuztom.php');


/*****************************************/
/****** generating Custom Post Type *******/

// Slides Section
// Icon List for "menu_icon" : http://melchoyce.github.io/dashicons/


	$labels = array(
		'name'               => __('Slides','apicona'),
		'singular_name'      => __('Slide','apicona'),
		'add_new'            => __('Add New','apicona'),
		'add_new_item'       => __('Add New Slide','apicona'),
		'edit_item'          => __('Edit Slide','apicona'),
		'new_item'           => __('New Slide','apicona'),
		'all_items'          => __('All Slides','apicona'),
		'view_item'          => __('View Slide','apicona'),
		'search_items'       => __('Search Slide','apicona'),
		'not_found'          => __('No Slide found','apicona'),
		'not_found_in_trash' => __('No Slide found in Trash','apicona'),
		'parent_item_colon'  => '',
		'menu_name'          => __('Slides','apicona')
	);
	
	$args = array(
		'labels'              => $labels,
		'has_archive'         => true,
		'supports'    		  => array( 'title', 'thumbnail' ),
		'public'              => 1,
		'show_ui'         	  => 1,
		'publicly_queryable'  => 1,
		'query_var'           => 1,
		'rewrite'             => 1,
		'show_in_menu'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'exclude_from_search' => false,
		'menu_icon'           => 'dashicons-images-alt2',
);

register_post_type( 'slide', $args );

/*****************************************/


/**
 *  Labels for Client Group
 */
$slide_tax_labels = array(
	'name'              => _x( 'Slide Groups', 'Slide Group - taxonomy general name', 'apicona' ),
	'singular_name'     => _x( 'Slide Group', 'Slide Group - taxonomy singular name', 'apicona' ),
	'search_items'      => __( 'Search Slide Group', 'apicona' ),
	'all_items'         => __( 'All Slide Groups', 'apicona' ),
	'parent_item'       => __( 'Parent Slide Group', 'apicona' ),
	'parent_item_colon' => __( 'Parent Slide Group:', 'apicona' ),
	'edit_item'         => __( 'Edit Slide Group', 'apicona' ),
	'update_item'       => __( 'Update Slide Group', 'apicona' ),
	'add_new_item'      => __( 'Add New Slide Group', 'apicona' ),
	'new_item_name'     => __( 'New Slide Name', 'apicona' ),
	'menu_name'         => __( 'Slide Groups', 'apicona' ),
);

// Creating taxonomy now

$args = array(
	'hierarchical'      => true,
	'labels'            => $slide_tax_labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	//'rewrite'           => array( 'slug' => $tm_clients_group_slug),
);
register_taxonomy( 'slide_group', array( 'slide' ), $args);




// Move Featured Image box from left to center only on CLIENTS custom_post_type
add_action('do_meta_boxes', 'kwayy_slides_featured_image_box');
function kwayy_slides_featured_image_box() {
	remove_meta_box( 'postimagediv', 'customposttype', 'side' );
	add_meta_box('postimagediv', __('Slide Image','apicona'), 'post_thumbnail_meta_box', 'slide', 'normal', 'high');
}

$slide = new Cuztom_Post_Type('slide');

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



}
add_action( 'init', 'kwayy_cpt_slides' );
