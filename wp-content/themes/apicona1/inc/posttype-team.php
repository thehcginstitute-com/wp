<?php 
// Including Framework Master File
function kwayy_cpt_teammember(){
	
	include_once(get_template_directory() . '/inc/cuztom-helper-framework/cuztom.php');

	/**
	 *  Apicona global Options
	 */
	$apicona = get_option('apicona');

	/****** generating Custom Post Type *******/

	/**
	 *  Labels for CPT
	 */
	$labels = array(
		'name'               => _x( 'Team Members', 'post type general name', 'apicona' ),
		'singular_name'      => _x( 'Team Member', 'post type singular name', 'apicona' ),
		'menu_name'          => _x( 'Team Members', 'admin menu', 'apicona' ),
		'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar', 'apicona' ),
		'add_new'            => _x( 'Add New', 'Team Member', 'apicona' ),
		'add_new_item'       => __( 'Add New Team Member', 'apicona' ),
		'new_item'           => __( 'New Team Member', 'apicona' ),
		'edit_item'          => __( 'Edit Team Member', 'apicona' ),
		'view_item'          => __( 'View Team Member', 'apicona' ),
		'all_items'          => __( 'All Team Members', 'apicona' ),
		'search_items'       => __( 'Search Team Member', 'apicona' ),
		'parent_item_colon'  => __( 'Parent Team Member:', 'apicona' ),
		'not_found'          => __( 'No Team Member found.', 'apicona' ),
		'not_found_in_trash' => __( 'No Team Member found in Trash.', 'apicona' )
	);
	
	/**
	 *  Labels for Team Group
	 */
	$team_tax_labels = array(
		'name'              => _x( 'Team Group', 'Team Group - taxonomy general name', 'apicona' ),
		'singular_name'     => _x( 'Team Group', 'Team Group - taxonomy singular name', 'apicona' ),
		'search_items'      => __( 'Search Team Group', 'apicona' ),
		'all_items'         => __( 'All Team Groups', 'apicona' ),
		'parent_item'       => __( 'Parent Team Group', 'apicona' ),
		'parent_item_colon' => __( 'Parent Team Group:', 'apicona' ),
		'edit_item'         => __( 'Edit Team Group', 'apicona' ),
		'update_item'       => __( 'Update Team Group', 'apicona' ),
		'add_new_item'      => __( 'Add New Team Group', 'apicona' ),
		'new_item_name'     => __( 'New Team Group Name', 'apicona' ),
		'menu_name'         => __( 'Team Groups', 'apicona' ),
	);
	
	
	
	
	if( isset($apicona['team_type_title']) && trim($apicona['team_type_title'])!='' && trim($apicona['team_type_title'])!='Team Member' ){
		
		$tm_team_type_title 		 = trim($apicona['team_type_title']);
		$tm_team_type_title_singluar = __('Team Member', 'apicona');

		
		if( isset($apicona['team_type_title_singular']) && trim($apicona['team_type_title_singular'])!='' ){
			$tm_team_type_title_singluar = esc_attr($apicona['team_type_title_singular']);
		} else if( substr($tm_team_type_title , -1)=='s' ){
			// Team Member
			$tm_team_type_title_singluar = substr_replace( $tm_team_type_title , "", -1);
		} else{
			$tm_team_type_title_singluar = $tm_team_type_title;	
		}
		
		$labels = array(
			'name'               => _x( $tm_team_type_title, 'post type general name', 'apicona' ),
			'singular_name'      => _x( $tm_team_type_title_singluar, 'post type singular name', 'apicona' ),
			'menu_name'          => _x( $tm_team_type_title, 'admin menu', 'apicona' ),
			'name_admin_bar'     => _x( $tm_team_type_title_singluar, 'add new on admin bar', 'apicona' ),
			'add_new'            => _x( 'Add New', 'Team Member', 'apicona' ),
			'add_new_item'       => __( 'Add New '.$tm_team_type_title_singluar, 'apicona' ),
			'new_item'           => __( 'New '.$tm_team_type_title_singluar, 'apicona' ),
			'edit_item'          => __( 'Edit '.$tm_team_type_title_singluar, 'apicona' ),
			'view_item'          => __( 'View '.$tm_team_type_title_singluar, 'apicona' ),
			'all_items'          => __( 'All '.$tm_team_type_title, 'apicona' ),
			'search_items'       => __( 'Search '.$tm_team_type_title_singluar, 'apicona' ),
			'parent_item_colon'  => __( 'Parent '.$tm_team_type_title_singluar.':', 'apicona' ),
			'not_found'          => __( 'No '.$tm_team_type_title_singluar.' found.', 'apicona' ),
			'not_found_in_trash' => __( 'No '.$tm_team_type_title_singluar.' found in Trash.', 'apicona' )
		);
	}
	
	
	
	// Slug
	$team_type_slug = 'team-members';
	if( isset($apicona['team_type_slug']) && trim($apicona['team_type_slug'])!='' ){
		$team_type_slug = trim($apicona['team_type_slug']);
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
	/*****************************************/

	
	/**
	 *  Team Group
	 */
	$tm_team_group_title = ( isset($apicona['team_group_title']) && trim($apicona['team_group_title'])!='' ) ? trim($apicona['team_group_title']) : __('Team Category', 'tmte') ;
	$tm_team_group_slug  = ( isset($apicona['team_group_slug']) && trim($apicona['team_group_slug'])!='' ) ? trim($apicona['team_group_slug']) : 'section' ;
	
	if( isset($apicona['team_group_title']) && trim($apicona['team_group_title'])!='' && trim($apicona['team_group_title'])!='Team Category' ){
		$team_tax_labels = array(
			'name'              => __($tm_team_group_title, 'apicona'),
			'singular_name'     => __($tm_team_group_title, 'apicona'),
			'search_items'      => __('Search '.$tm_team_group_title, 'apicona'),
			'all_items'         => __('All '.$tm_team_group_title, 'apicona'),
			'parent_item'       => __('Parent '.$tm_team_group_title, 'apicona'),
			'parent_item_colon' => __('Parent '.$tm_team_group_title.':', 'apicona'),
			'edit_item'         => __('Edit '.$tm_team_group_title, 'apicona'), 
			'update_item'       => __('Update '.$tm_team_group_title, 'apicona'),
			'add_new_item'      => __('Add New '.$tm_team_group_title, 'apicona'),
			'new_item_name'     => __('New '.$tm_team_group_title.' Name', 'apicona'), 
			'menu_name'         => __($tm_team_group_title, 'apicona'), 
		);
	}


	$args = array(
		'hierarchical'      => true,
		'labels'            => $team_tax_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $tm_team_group_slug ),
	);

	register_taxonomy( 'team_group', array( 'team_member' ), $args );



	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'team_featured_image_box');
	function team_featured_image_box() {
		remove_meta_box( 'postimagediv', 'customposttype', 'side' );
		add_meta_box('postimagediv', __('Doctor\'s Image','apicona'), 'post_thumbnail_meta_box', 'team_member', 'normal', 'high');
	}

	$team = new Cuztom_Post_Type('team_member');


	/*********** Post Meta Box **************/
	$team->add_meta_box(
		'kwayy_team_member_details',
		'Doctor\'s Details', 
		array(
			array(
				'name'          => 'position',
				'label'         => __( 'Position', 'apicona'),
				'description'   => __( '(Optional) Add doctor\'s position. Example: <code>Project Manager</code>', 'apicona'),
				'type'          => 'text'
			),
			array(
				'name'          => 'email',
				'label'         => __( 'Email', 'apicona'),
				'description'   => __( '(Optional) Add doctor\'s email address. Example: <code>member@example.com</code>', 'apicona'),
				'type'          => 'text'
			),
		)
	);

	$team->add_meta_box(
		'kwayy_team_member_social_links',
		'Doctor\'s Social Links', 
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
		)
	);
	/**********************************************/






	/********** Adding featured image URL path ***********/


	// A fucntion to add a custom field to team group add form-field
	function kwayy_team_group_taxonomy_custom_fields_addnew(){
		?>
		
		<div class="form-field">
			<label for="kwayy_img_url"><?php _e('Featured Image URL', 'kwte'); ?></label>
			<input type="text" name="term_meta[kwayy_img_url]" id="term_meta[kwayy_img_url]" size="40" value= ""><br />
			<p><?php _e('Paste featured image URL for this group. Please upload first in media section.' ,'kwte'); ?></p>
		</div>
		
	<?php	
	}
	
	

	// A callback function to add a custom field to team group edit form
	function kwayy_team_group_taxonomy_custom_fields($tag) {
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
	function kwayy_save_taxonomy_custom_fields( $term_id ) {
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
	add_action( 'team_group_edit_form_fields', 'kwayy_team_group_taxonomy_custom_fields', 10, 2 );
	add_action( 'team_group_add_form_fields', 'kwayy_team_group_taxonomy_custom_fields_addnew', 10, 2 );

	// Save the changes made on the "presenters" taxonomy, using our callback function
	add_action( 'edited_team_group', 'kwayy_save_taxonomy_custom_fields', 10, 2 );
	add_action( 'create_team_group', 'kwayy_save_taxonomy_custom_fields', 10, 2 );


}
add_action( 'init', 'kwayy_cpt_teammember', 8 );

