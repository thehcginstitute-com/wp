<?php 

function kwayy_cpt_testimonials(){
	
// Including Framework Master File
include_once(get_template_directory() . '/inc/cuztom-helper-framework/cuztom.php');


/*****************************************/
/**** Now generating Post Meta Boxes *****/

// Team Member section
// Icon List for "menu_icon" : http://melchoyce.github.io/dashicons/
// Portfolio Entry Details

$labels = array(
	'name'               => __('Testimonials','apicona'),
	'singular_name'      => __('Testimonial','apicona'),
	'add_new'            => __('Add New','apicona'),
	'add_new_item'       => __('Add New Testimonial','apicona'),
	'edit_item'          => __('Edit Testimonial','apicona'),
	'new_item'           => __('New Testimonial','apicona'),
	'all_items'          => __('All Testimonials','apicona'),
	'view_item'          => __('View Testimonial','apicona'),
	'search_items'       => __('Search Testimonial','apicona'),
	'not_found'          => __('No Testimonial found','apicona'),
	'not_found_in_trash' => __('No Testimonial found in Trash','apicona'),
	'parent_item_colon'  => '',
	'menu_name'          => __('Testimonials','apicona')
);

$args = array(
	'labels'              => $labels,
	'supports'    		  => array( 'title', 'editor', 'thumbnail' ),
	'public'              => 1,
	'show_ui'         	  => 1,
	'publicly_queryable'  => 1,
	'query_var'           => 1,
	'rewrite'             => 1,
	'show_in_menu'        => true,
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'exclude_from_search' => true,
	'menu_icon'           => 'dashicons-format-status',
);

register_post_type( 'testimonial', $args );



/**
 *  Labels for Testimonial Group
 */
$testimonial_tax_labels = array(
	'name'              => _x( 'Testimonial Groups', 'Testimonial Group - taxonomy general name', 'apicona' ),
	'singular_name'     => _x( 'Testimonial Group', 'Testimonial Group - taxonomy singular name', 'apicona' ),
	'search_items'      => __( 'Search Testimonial Group', 'apicona' ),
	'all_items'         => __( 'All Testimonial Groups', 'apicona' ),
	'parent_item'       => __( 'Parent Testimonial Group', 'apicona' ),
	'parent_item_colon' => __( 'Parent Testimonial Group:', 'apicona' ),
	'edit_item'         => __( 'Edit Testimonial Group', 'apicona' ),
	'update_item'       => __( 'Update Testimonial Group', 'apicona' ),
	'add_new_item'      => __( 'Add New Testimonial Group', 'apicona' ),
	'new_item_name'     => __( 'New Testimonial Name', 'apicona' ),
	'menu_name'         => __( 'Testimonial Groups', 'apicona' ),
);

// Creating taxonomy now

$args = array(
	'hierarchical'      => true,
	'labels'            => $testimonial_tax_labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	//'rewrite'           => array( 'slug' => $tm_clients_group_slug),
);

register_taxonomy( 'testimonial_group', array( 'testimonial' ), $args);


/* Change "Enter Title Here" */
function kwayy_testimonial_enter_title_here( $title ){
	$screen = get_current_screen();
	if ( 'testimonial' == $screen->post_type ) {
		$title = __('Person or company Name', 'apicona');
	}
	return $title;
}
add_filter( 'enter_title_here', 'kwayy_testimonial_enter_title_here' );


/* Text for the link to select Featured Image */
/*
function kwayy_testimonial_admin_post_thumbnail_html( $content ) {
	global $current_screen;
	if( 'testimonial' == $current_screen->post_type ){
		return $content = str_replace( __( 'Set featured image', 'apicona' ), __( 'Upload person image or company logo', 'apicona' ), $content);
	} else {
		return $content;
	}
}
add_filter( 'admin_post_thumbnail_html', 'kwayy_testimonial_admin_post_thumbnail_html' );
*/
/*****************************************/





// Move Featured Image box from left to center only on CLIENTS custom_post_type
add_action('do_meta_boxes', 'kwayy_testimonial_featured_image_box');
function kwayy_testimonial_featured_image_box() {
	remove_meta_box( 'postimagediv', 'customposttype', 'testimonial' );
	add_meta_box('postimagediv', __('Select/Upload image of person or company','apicona'), 'post_thumbnail_meta_box', 'testimonial', 'normal', 'high');
}


$testimonial = new Cuztom_Post_Type('testimonial');

/*********** Post Meta Box **************/
$testimonial->add_meta_box( 
	'kwayy_testimonials_details',
	__('Apicona: Testimonial Details', 'apicona'),
	array(
		array(
			'name'          => 'clienturl',
			'label'         => __('Website Link', 'apicona'),
			'description'   => __('(Optional) Please fill person or company\'s website link', 'apicona'),
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

}
add_action( 'init', 'kwayy_cpt_testimonials', 8 );
