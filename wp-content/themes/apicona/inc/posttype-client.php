<?php 

function kwayy_cpt_clients(){
// Including Framework Master File
include_once(get_template_directory() . '/inc/cuztom-helper-framework/cuztom.php');


/*****************************************/
/**** Now generating Post Meta Boxes *****/

// Team Member section
// Icon List for "menu_icon" : http://melchoyce.github.io/dashicons/
// Portfolio Entry Details

$labels = 	array(
		'name'               => __('Client Logo','apicona'),
		'singular_name'      => __('Client Logos','apicona'),
		'add_new'            => __('Add New','apicona'),
		'add_new_item'       => __('Add New Client Logo','apicona'),
		'edit_item'          => __('Edit Client Logo','apicona'),
		'new_item'           => __('New Client Logo','apicona'),
		'all_items'          => __('All Client Logos','apicona'),
		'view_item'          => __('View Client Logo','apicona'),
		'search_items'       => __('Search Client Logo','apicona'),
		'not_found'          => __('No Client Logo found','apicona'),
		'not_found_in_trash' => __('No Client Logo found in Trash','apicona'),
		//'parent_item_colon'  => '',
		'menu_name'          => __('Client Logos','apicona')
	);
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-businessman',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'exclude_from_search' => true,
		'supports'           => array( 'title', 'thumbnail' )
	);

	register_post_type( 'client', $args );




// /* Category */
// // Project Category
// $client->add_taxonomy( 'Client Group' );



	/**
	 *  Labels for Client Group
	 */
	$client_tax_labels = array(
		'name'              => _x( 'Client Group', 'Clients Group - taxonomy general name', 'apicona' ),
		'singular_name'     => _x( 'Client Group', 'Clients Group - taxonomy singular name', 'apicona' ),
		'search_items'      => __( 'Search Client Group', 'apicona' ),
		'all_items'         => __( 'All Client Groups', 'apicona' ),
		'parent_item'       => __( 'Parent Client Group', 'apicona' ),
		'parent_item_colon' => __( 'Parent Client Group:', 'apicona' ),
		'edit_item'         => __( 'Edit Client Group', 'apicona' ),
		'update_item'       => __( 'Update Client Group', 'apicona' ),
		'add_new_item'      => __( 'Add New Client Group', 'apicona' ),
		'new_item_name'     => __( 'New Client Name', 'apicona' ),
		'menu_name'         => __( 'Client Groups', 'apicona' ),
	);

	// Creating taxonomy now
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $client_tax_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	);

	register_taxonomy( 'client_group', array( 'client' ), $args );


/* Change "Enter Title Here" */
function kwayy_client_enter_title_here( $title ){
	$screen = get_current_screen();
	if ( 'client' == $screen->post_type ) {
		$title = __('Client Name', 'apicona');
	}
	return $title;
}
add_filter( 'enter_title_here', 'kwayy_client_enter_title_here' );



/* Text for the link to select Featured Image */
/*
function kwayy_client_admin_post_thumbnail_html( $content ) {
	global $current_screen;
	if( 'client' == $current_screen->post_type ){
		return $content = str_replace( __( 'Set featured image', 'apicona' ), __( 'Upload client image', 'apicona' ), $content);
	} else {
		return $content;
	}
}
add_filter( 'admin_post_thumbnail_html', 'kwayy_client_admin_post_thumbnail_html' );
*/

/*****************************************/





// Move Featured Image box from left to center only on CLIENTS custom_post_type
add_action('do_meta_boxes', 'kwayy_client_featured_image_box');
function kwayy_client_featured_image_box() {
	remove_meta_box( 'postimagediv', 'customposttype', 'client' );
	add_meta_box('postimagediv', __('Select/Upload image of the client','apicona'), 'post_thumbnail_meta_box', 'client', 'normal', 'high');
}


$client = new Cuztom_Post_Type('client');
/*********** Post Meta Box **************/
$client->add_meta_box( 
	'kwayy_clients_details',
	__('Apicona: Client Details', 'apicona'),
	array(
		array(
			'name'          => 'clienturl',
			'label'         => __('Website Link', 'apicona'),
			'description'   => __('(Optional) Please fill person or company\'s website link', 'apicona'),
			'type'          => 'text'
		),
	)
);
/**********************************************/

}
add_action( 'init', 'kwayy_cpt_clients', 8 );
