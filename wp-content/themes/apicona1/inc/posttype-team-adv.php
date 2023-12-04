<?php 

function thememount_apiconaadv_cpt_tm_team(){
	
	// Getting Options
	$apicona = get_option('apicona');

	
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => _x( 'Team Members', 'post type general name', 'apicona' ),
		'singular_name'      => _x( 'Team Member', 'post type singular name', 'apicona' ),
		'menu_name'          => _x( 'Team Members', 'admin menu', 'apicona' ),
		'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar', 'apicona' ),
		'add_new'            => _x( 'Add New', 'team member', 'apicona' ),
		'add_new_item'       => __( 'Add New Team Member', 'apicona' ),
		'new_item'           => __( 'New Team Member', 'apicona' ),
		'edit_item'          => __( 'Edit Team Member', 'apicona' ),
		'view_item'          => __( 'View Team Member', 'apicona' ),
		'all_items'          => __( 'All Team Members', 'apicona' ),
		'search_items'       => __( 'Search Team Member', 'apicona' ),
		'parent_item_colon'  => __( 'Parent Team Member:', 'apicona' ),
		'not_found'          => __( 'No team member found.', 'apicona' ),
		'not_found_in_trash' => __( 'No team member found in Trash.', 'apicona' )
	);
	if( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' && trim($apicona['team_type_title'])!='Team Members' ){
		
	
		// Getting Team Member Title
		$team_type_title          = 'Team Members';
		$team_type_title_singluar = 'Team Member';
		if( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' ){
			$team_type_title = esc_attr($apicona['team_type_title']);
		}

		
		if( isset($apicona['team_type_title_singular']) && trim($apicona['team_type_title_singular'])!='' ){
			$team_type_title_singluar = esc_attr($apicona['team_type_title_singular']);
		} else if( substr($team_type_title , -1)=='s' ){
			// Team Member
			$team_type_title_singluar = substr_replace( $team_type_title , "", -1);
		} else{
			$team_type_title_singluar = $team_type_title;	
		}
		
		
		$labels = array(
			'name'               => _x( $team_type_title, 'post type general name', 'apicona' ),
			'singular_name'      => _x( $team_type_title_singluar, 'post type singular name', 'apicona' ),
			'menu_name'          => _x( $team_type_title, 'admin menu', 'apicona' ),
			'name_admin_bar'     => _x( $team_type_title_singluar, 'add new on admin bar', 'apicona' ),
			'add_new'            => _x( 'Add New', 'team member', 'apicona' ),
			'add_new_item'       => __( 'Add New '.$team_type_title_singluar, 'apicona' ),
			'new_item'           => __( 'New '.$team_type_title_singluar, 'apicona' ),
			'edit_item'          => __( 'Edit '.$team_type_title_singluar, 'apicona' ),
			'view_item'          => __( 'View '.$team_type_title_singluar, 'apicona' ),
			'all_items'          => __( 'All '.$team_type_title, 'apicona' ),
			'search_items'       => __( 'Search '.$team_type_title_singluar, 'apicona' ),
			'parent_item_colon'  => __( 'Parent '.$team_type_title_singluar.':', 'apicona' ),
			'not_found'          => __( 'No '.strtolower($team_type_title_singluar).' found.', 'apicona' ),
			'not_found_in_trash' => __( 'No '.strtolower($team_type_title_singluar).' found in Trash.', 'apicona' )
		);
	}
	
	// slug
	$team_type_slug = 'team-members';
	if( isset($apicona['team_type_slug']) && trim($apicona['team_type_slug'])!='' ){
		$team_type_slug = esc_attr($apicona['team_type_slug']);
	}
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-groups',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $team_type_slug ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'team_member', $args );
	
	
	
	
	
	
	// Declaring Team variable
	$team = new Cuztom_Post_Type('team_member');
	
	

	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'thememount_apiconaadv_tm_team_featured_image_box');
	function thememount_apiconaadv_tm_team_featured_image_box() {
		remove_meta_box( 'postimagediv', 'team_member', 'normal' );
		add_meta_box('postimagediv', __("Member's Image",'apicona'), 'post_thumbnail_meta_box', 'team_member', 'normal', 'high');
	}

	// Team Type Title 
	$team_type_title = ( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' ) ? __($apicona['team_type_title'], 'apicona') : __('Team Members','apicona');

	/*********** Post Meta Box **************/
	$team->add_meta_box(
		'kwayy_team_member_details',
		sprintf( __("Apicona Advanced: %s Details", 'apicona'), $team_type_title ),
		array(
			array(
				'name'          => 'position',
				'label'         => __( 'Position', 'apicona'),
				'description'   => sprintf( __("(Optional) Add %s postition. Example: <code>Project Manager</code>", 'apicona'), $team_type_title ),
				'type'          => 'text'
			),
			array(
				'name'          => 'email',
				'label'         => __( 'Email', 'apicona'),
				'description'   => sprintf( __("(Optional) Add %s email address. Example: <code>member@example.com</code>", 'apicona'), $team_type_title ),
				'type'          => 'text'
			),
			array(
				'name'          => 'phone',
				'label'         => __( 'Phone', 'apicona'),
				'description'   => sprintf( __("(Optional) Add %s phone number. Example: <code>+9-0123-456789</code>", 'apicona'), $team_type_title ),
				'type'          => 'text'
			),
			array(
				'name'          => 'btn_text',
				'label'         => __( 'Appointment Button Text', 'apicona'),
				'description'   => __( "(Optional) Appointment button text. Example: <code>APPOINTMENT NOW !</code>", 'apicona'),
				'type'          => 'text'
			),
			array(
				'name'          => 'btn_link',
				'label'         => __( 'Appointment Button Link', 'apicona'),
				'description'   => __( "(Optional) Appointment button link. Example: <code>http://www.example.com/</code>", 'apicona'),
				'type'          => 'text'
			),
		)
	);

	$team->add_meta_box(
		'kwayy_team_member_social_links',
		sprintf( __("Apicona Advanced: %s Social Links", 'apicona'), $team_type_title ),
		array(
			array(
				'name'          => 'facebook',
				'label'         => __( 'Facebook Link', 'apicona'),
				'description'   => __( '(Optional) Please fill Facebook link', 'apicona'),
				'type'          => 'text'
			),
			array(
				'name'          => 'twitter',
				'label'         => __( 'Twitter Link', 'apicona'),
				'description'   => __( '(Optional) Please fill Twitter link', 'apicona'),
				'type'          => 'text'
			),
			array(
				'name'          => 'linkedin',
				'label'         => __( 'LinkedIn Link', 'apicona'),
				'description'   => __( '(Optional) Please fill LinkedIn link', 'apicona'),
				'type'          => 'text'
			),
			array(
				'name'          => 'googleplus',
				'label'         => __( 'Google+ Link', 'apicona'),
				'description'   => __( '(Optional) Please fill Google+ link', 'apicona'),
				'type'          => 'text'
			),
			array(
				'name'          => 'instagram',
				'label'         => __( 'Instagram Link', 'apicona'),
				'description'   => __( '(Optional) Please fill Instagram link', 'apicona'),
				'type'          => 'text'
			),
		)
	);
	/**********************************************/
	
	
	// Creating default array for Team group
	$labels = 	array(
		'name'              => _x( 'Team Group', 'taxonomy general name', 'apicona' ),
		'singular_name'     => _x( 'Team Group', 'taxonomy singular name', 'apicona' ),
		'search_items'      => __( 'Search Team Group', 'apicona' ),
		'all_items'         => __( 'All Team Groups', 'apicona' ),
		'parent_item'       => __( 'Parent Team Group', 'apicona' ),
		'parent_item_colon' => __( 'Parent Team Group:', 'apicona' ),
		'edit_item'         => __( 'Edit Team Group', 'apicona' ),
		'update_item'       => __( 'Update Team Group', 'apicona' ),
		'add_new_item'      => __( 'Add New Team Group', 'apicona' ),
		'new_item_name'     => __( 'New Team Group Name', 'apicona' ),
		'menu_name'         => __( 'Team Group', 'apicona' ),
	);

	
	$tm_team_group_title = ( isset($apicona['team_group_title']) && trim($apicona['team_group_title'])!='' && trim($apicona['team_group_title'])!='Team Group' ) ? trim($apicona['team_group_title']) : __('Team Group', 'apicona') ;
	
	$tm_team_group_slug  = ( isset($apicona['team_group_slug']) && trim($apicona['team_group_slug'])!='' ) ? trim($apicona['team_group_slug']) : 'team-group' ;

	
	if($tm_team_group_title!='' && $tm_team_group_title!=__('Team Group', 'apicona')){
		
		$labels = array(
			'name'              => sprintf( __('%s', 'apicona'), $tm_team_group_title ),
			'singular_name'     => sprintf( __('%s', 'apicona'), $tm_team_group_title ),
			'search_items'      => sprintf( __( 'Search %s', 'apicona' ), $tm_team_group_title),
			'all_items'         => sprintf( __( 'All %s', 'apicona' ), $tm_team_group_title),
			'parent_item'       => sprintf( __( 'Parent %s', 'apicona' ), $tm_team_group_title),
			'parent_item_colon' => sprintf( __( 'Parent %s:', 'apicona' ), $tm_team_group_title),
			'edit_item'         => sprintf( __( 'Edit %s', 'apicona' ), $tm_team_group_title),
			'update_item'       => sprintf( __( 'Update %s', 'apicona' ), $tm_team_group_title),
			'add_new_item'      => sprintf( __( 'Add New %s', 'apicona' ), $tm_team_group_title),
			'new_item_name'     => sprintf( __( 'New %s Name', 'apicona' ), $tm_team_group_title),
			'menu_name'         => sprintf( __( '%s', 'apicona' ), $tm_team_group_title),
		);
	}
	
	
	/* Team Group */
	$team->add_taxonomy(
		'team_group',
		array(
			'rewrite' => array( 'slug' => $tm_team_group_slug ),
		),
		$labels
	);
	
	
	

}
add_action( 'init', 'thememount_apiconaadv_cpt_tm_team', 8 );





/**
 *  Change Excerpt box title
 */
add_action( 'admin_init',  'thememount_team_member_change_excerpt_box_title' );
if( !function_exists('thememount_team_member_change_excerpt_box_title') ){
function thememount_team_member_change_excerpt_box_title() {
	remove_meta_box( 'postexcerpt', 'team_member', 'normal' );
	add_meta_box('postexcerpt', __('Short Description', 'apicona'), 'thememount_team_member_post_excerpt_meta_box', 'team_member', 'normal', 'high');
	
	//add_meta_box('postimagediv', __("Member's Image",'apicona'), 'post_thumbnail_meta_box', 'team_member', 'normal', 'high');
	
}
}
if( !function_exists('thememount_team_member_post_excerpt_meta_box') ){
function thememount_team_member_post_excerpt_meta_box($post) {
?>
	<label class="screen-reader-text" for="excerpt"><?php _e('Short description', 'apicona') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
	<p><?php _e('Please write short description here. This descripiton will be used in box view (via Visual Composer element).', 'apicona'); ?></p>
<?php
}
}





/********** Adding featured image URL path ***********/


// A fucntion to add a custom field to team group add form-field
function thememount_apiconaadv_team_group_taxonomy_custom_fields_addnew(){
	?>
	
	<div class="form-field">
		<label for="kwayy_img_url"><?php _e('Featured Image URL', 'apicona'); ?></label>
		<input type="text" name="term_meta[kwayy_img_url]" id="term_meta[kwayy_img_url]" size="40" value= ""><br />
		<p><?php _e('Paste featured image URL for this group. Please upload first in media section.' ,'apicona'); ?></p>
	</div>
	
<?php	
}


// A callback function to add a custom field to our "presenters" taxonomy
function thememount_apiconaadv_team_group_taxonomy_custom_fields($tag) {
   // Check for existing taxonomy meta for the term you're editing
	$t_id = $tag->term_id; // Get the ID of the term you're editing
	$term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check
?>

<tr class="form-field">
	<th scope="row" valign="top">
		<label for="kwayy_img_url"><?php _e('Featured Image URL', 'apicona'); ?></label>
	</th>
	<td>
		<input type="text" name="term_meta[kwayy_img_url]" id="term_meta[kwayy_img_url]" size="40" value="<?php echo $term_meta['kwayy_img_url'] ? $term_meta['kwayy_img_url'] : ''; ?>"><br />
		<span class="description"><?php _e('Paste featured image URL for this group. Please upload first in media section.' ,'apicona'); ?></span>
	</td>
</tr>

<?php
}







// A callback function to save our extra taxonomy field(s)
function thememount_apiconaadv_tm_save_taxonomy_custom_fields( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_term_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ){
			if ( isset( $_POST['term_meta'][$key] ) ){
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		//save the option array
		update_option( "taxonomy_term_$t_id", $term_meta );
	}
}






// Add the fields to the "presenters" taxonomy, using our callback function
add_action( 'team_group_edit_form_fields', 'thememount_apiconaadv_team_group_taxonomy_custom_fields', 10, 2 );
add_action( 'team_group_add_form_fields', 'thememount_apiconaadv_team_group_taxonomy_custom_fields_addnew', 10, 2 );

// Save the changes made on the "presenters" taxonomy, using our callback function
add_action( 'edited_team_group', 'thememount_apiconaadv_tm_save_taxonomy_custom_fields', 10, 2 );
add_action( 'create_team_group', 'thememount_apiconaadv_tm_save_taxonomy_custom_fields', 10, 2 );

