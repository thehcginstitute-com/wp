<?php

function thememount_apiconaadv_cpt_portfolio(){
	
	global $apicona;
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'apicona' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'apicona' ),
		'menu_name'          => _x( 'Portfolio', 'admin menu', 'apicona' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'apicona' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'apicona' ),
		'add_new_item'       => __( 'Add New Portfolio', 'apicona' ),
		'new_item'           => __( 'New Portfolio', 'apicona' ),
		'edit_item'          => __( 'Edit Portfolio', 'apicona' ),
		'view_item'          => __( 'View Portfolio', 'apicona' ),
		'all_items'          => __( 'All Portfolio', 'apicona' ),
		'search_items'       => __( 'Search Portfolio', 'apicona' ),
		'parent_item_colon'  => __( 'Parent Portfolio:', 'apicona' ),
		'not_found'          => __( 'No portfolio found.', 'apicona' ),
		'not_found_in_trash' => __( 'No portfolio found in Trash.', 'apicona' )
	);
	
	
	if( isset($apicona['pf_type_title']) && trim($apicona['pf_type_title'])!='' && trim($apicona['pf_type_title'])!='Portfolio' ){
		// Getting Team Member Title
		$pf_type_title          = 'Portfolio';
		$pf_type_title_singluar = 'Portfolio';
		if( isset($apicona['pf_type_title']) && trim($apicona['pf_type_title'])!='' ){
			$tm_pf_type_title = esc_attr($apicona['pf_type_title']);
			if( substr($tm_pf_type_title , -1)=='s' ){
				// Portfolios
				$pf_type_title          = $tm_pf_type_title;
				$pf_type_title_singluar =  substr_replace( $tm_pf_type_title , "", -1);
			} else {
				// Portfolio
				$pf_type_title          = $tm_pf_type_title.'s';
				$pf_type_title_singluar =  $tm_pf_type_title;
			}
		}
		
		$labels = array(
			'name'               => _x( $pf_type_title, 'post type general name', 'apicona' ),
			'singular_name'      => _x( $pf_type_title_singluar, 'post type singular name', 'apicona' ),
			'menu_name'          => _x( $pf_type_title, 'admin menu', 'apicona' ),
			'name_admin_bar'     => _x( $pf_type_title_singluar, 'add new on admin bar', 'apicona' ),
			'add_new'            => _x( 'Add New', 'portfolio', 'apicona' ),
			'add_new_item'       => __( 'Add New '.$pf_type_title_singluar, 'apicona' ),
			'new_item'           => __( 'New '.$pf_type_title_singluar, 'apicona' ),
			'edit_item'          => __( 'Edit '.$pf_type_title_singluar, 'apicona' ),
			'view_item'          => __( 'View '.$pf_type_title_singluar, 'apicona' ),
			'all_items'          => __( 'All '.$pf_type_title, 'apicona' ),
			'search_items'       => __( 'Search '.$pf_type_title_singluar, 'apicona' ),
			'parent_item_colon'  => __( 'Parent '.$pf_type_title_singluar.':', 'apicona' ),
			'not_found'          => __( 'No '.strtolower($pf_type_title_singluar).' found.', 'apicona' ),
			'not_found_in_trash' => __( 'No '.strtolower($pf_type_title_singluar).' found in Trash.', 'apicona' )
		);
	}
	
	// slug
	$pf_type_slug = 'portfolio';
	if( isset($apicona['pf_type_slug']) && trim($apicona['pf_type_slug'])!='' ){
		$pf_type_slug = esc_attr($apicona['pf_type_slug']);
	}
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-screenoptions',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $pf_type_slug ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'portfolio', $args );
	
	
	
	// Declaring Portfolio variable
	$portfolio = new Cuztom_Post_Type('portfolio');
	
	// Portfolio Type Title
	$pf_type_title = ( isset($apicona['pf_type_title']) && trim($apicona['pf_type_title'])!='' ) ? __($apicona['pf_type_title'], 'apicona') : __('Practice Area','apicona');
	
	$pfoptions = array();

	// Preparing detail options
	for($x=1; $x<=5; $x++ ){
		if( isset($apicona['pf_details_line'.$x.'_title']) && trim($apicona['pf_details_line'.$x.'_title'])!='' ){
			$pfoptions[] = array(
					'name'        => 'pf_details_line'.$x.'_title',
					'label'       => __($apicona['pf_details_line'.$x.'_title'],'apicona'),
					'description' => sprintf( __('(Optional) This is dynamic field generated from "Theme Options > %s Settings" section.', 'apicona'), $pf_type_title ),
					'type'        => 'text'
			);
			$pfoptions[] =  array(
				'name'        => 'pf_details_line'.$x.'_link',
				'label'       => __($apicona['pf_details_line'.$x.'_title'].' Link','apicona'),
				'description' => __('(Optional) Set Link To '.$apicona['pf_details_line'.$x.'_title'],'apicona'),
				'type'        => 'text'
			);
		}
	}
	$pfoptions[] = array(
				'name'        => 'linktext',
				'label'       => __('Project Button (Link) Text','apicona'),
				'description' => __('(Optional) Please fill project link text. Example <code>Read More</code>','apicona'),
				'type'        => 'text'
			);
	$pfoptions[] = array(
				'name'        => 'linkurl',
				'label'       => __('Project Button (Link) URL','apicona'),
				'description' => __('(Optional) Please fill project link URL. This will become the link for the "Project Link Text" word.','apicona'),
				'type'        => 'text'
			);



			
	$portfolio->add_meta_box(
		'thememount_portfolio_data',
		sprintf( __("Apicona Advanced: %s Options", 'apicona'), $pf_type_title ),
		$pfoptions
	);



	$portfolio->add_meta_box(
		'kwayy_portfolio_featured',
		__('Apicona Advanced: Featured Image / Video / Slider', 'apicona'),
		array(
			array(
				'name'          => 'featuredtype',
				'label'         => __('Featured Image/Video', 'apicona'),
				'description'   => __('Select what you want to show as featured. Image or Video', 'apicona'),
				'type'          => 'radios',
				'options'       => array(
					'image'       => __('Featured Image', 'apicona'),
					'video'       => __('Video (YouTube or Vimeo)', 'apicona'),
					'audioembed'  => __('Audio (SoundCloud embed code)', 'apicona'),
					'slider'	  => __('Image Slider', 'apicona'),
				),
				'default_value' => 'image'
			),
			
			/* Video (YouTube or Vimeo) */
			array(
				'name'          => 'videourl',
				'label'         => __('YouTube or Vimeo URL', 'apicona'),
				'description'   => __('Paste YouTube or Vimeo URL here.', 'apicona'),
				'type'          => 'textarea',
			),
			
			/* Audio (SoundCloud embed code) */
			array(
				'name'          => 'audiocode',
				'label'         => __('SoundCloud (or any other service) Embed Code', 'apicona'),
				'description'   => __('Paste SoundCloud or any other service embed code here.', 'apicona'),
				'type'          => 'textarea',
			),
			
			/* Image Slider */
			array(
				'name'          => 'slideimage1',
				'label'         => __('1st Slider Image', 'apicona'),
				'description'   => __('Select 1st image for slider here. You can select your featured image here to show the featured image as first image in slider.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage2',
				'label'         => __('2nd Slider Image', 'apicona'),
				'description'   => __('(optional) Select 2nd image for slider here.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage3',
				'label'         => __('3rd Slider Image', 'apicona'),
				'description'   => __('(optional) Select 3rd image for slider here.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage4',
				'label'         => __('4th Slider Image', 'apicona'),
				'description'   => __('(optional) Select 4th image for slider here.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage5',
				'label'         => __('5th Slider Image', 'apicona'),
				'description'   => __('(optional) Select 5th image for slider here.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage6',
				'label'         => __('6th Slider Image', 'apicona'),
				'description'   => __('(optional) Select 6th image for slider here.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage7',
				'label'         => __('7th Slider Image', 'apicona'),
				'description'   => __('(optional) Select 7th image for slider here.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage8',
				'label'         => __('8th Slider Image', 'apicona'),
				'description'   => __('(optional) Select 8th image for slider here.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage9',
				'label'         => __('9th Slider Image', 'apicona'),
				'description'   => __('(optional) Select 9th image for slider here.', 'apicona'),
				'type'          => 'image',
			),
			array(
				'name'          => 'slideimage10',
				'label'         => __('10th Slider Image', 'apicona'),
				'description'   => __('(optional) Select 10th image for slider here.', 'apicona'),
				'type'          => 'image',
			),
		)
	);



	$portfolio->add_meta_box(
		'thememount_portfolio_view',
		sprintf( __("Apicona Advanced: %s View Style", 'apicona'), $pf_type_title ),
		array(
			array(
				'name'          => 'viewstyle',
				'label'         => sprintf( __("%s View Style", 'apicona'), $pf_type_title ),
				'description'   => sprintf( __("Select view for single %s", 'apicona'), $pf_type_title ),
				'type'          => 'radios',
				'options'       => array(
					''            => __('Global', 'apicona'),
					'default'     => __('Left image and right content (default)', 'apicona'),
					'top'         => __('Top image and bottom content', 'apicona'),
					'full'        => __('No image and full-width content (without details box)', 'apicona'),
				),
				'default_value' => ''
			),
		)
	);


	$portfolio->add_meta_box(
		'thememount_portfolio_like',
		sprintf( __("Apicona Advanced: %s Like Option", 'apicona'), $pf_type_title ),
		array(
			array(
				'name'          => 'pflikereset',
				'label'         => sprintf( __("%s Reset Likes", 'apicona'), $pf_type_title ),
				'description'   => sprintf( __('This will make the LIKE count to zero. For this %s only. If you like to reset LIKE for all %s than please go to "Theme Options > %s Settings" section.', 'apicona'), $pf_type_title, $pf_type_title,$pf_type_title ).'<br><br>'.__('To reset, just check this checkbox and save this page.','apicona'),
				'type'          => 'checkbox',
			),
		)
	);
	
	
	// Creating default array for portfolio category
	$labels = 	array(
		'name'              => __('Portfolio Category', 'apicona'),
		'singular_name'     => __('Portfolio Category', 'apicona'),
		'search_items'      => __('Search Portfolio Category', 'apicona'),
		'all_items'         => __('All Portfolio Category', 'apicona'), 
		'parent_item'       => __('Parent Portfolio Category', 'apicona'),
		'parent_item_colon' => __('Parent Portfolio Category:', 'apicona'), 
		'edit_item'         => __('Edit Portfolio Category', 'apicona'),
		'update_item'       => __('Update Portfolio Category', 'apicona'),
		'add_new_item'      => __('Add New Portfolio Category', 'apicona'),
		'new_item_name'     => __('New Portfolio Category Name', 'apicona'),
		'menu_name'         => __('Portfolio Category', 'apicona'),
	);
	
	
	$tm_pf_category_title = ( isset($apicona['pf_cat_title']) && trim($apicona['pf_cat_title'])!='' && trim($apicona['pf_cat_title'])!='Portfolio Category' ) ? trim($apicona['pf_cat_title']) : __('Portfolio Category', 'apicona') ;
	$tm_pf_category_slug  = ( isset($apicona['pf_cat_slug']) && trim($apicona['pf_cat_slug'])!='' ) ? trim($apicona['pf_cat_slug']) : 'portfolio-category' ;
	
	
	if($tm_pf_category_title!='' && $tm_pf_category_title!=__('Portfolio Category', 'apicona')){
	
		$labels = array(
			'name'              => sprintf( __('%s', 'apicona'), $tm_pf_category_title ),
			'singular_name'     => sprintf( __('%s', 'apicona'), $tm_pf_category_title ),
			'search_items'      => sprintf( __('Search %s', 'apicona'), $tm_pf_category_title ),
			'all_items'         => sprintf( __('All %s', 'apicona'), $tm_pf_category_title ),
			'parent_item'       => sprintf( __('Parent %s', 'apicona'), $tm_pf_category_title ),
			'parent_item_colon' => sprintf( __('Parent %s:', 'apicona'), $tm_pf_category_title ),
			'edit_item'         => sprintf( __('Edit %s', 'apicona'), $tm_pf_category_title ),
			'update_item'       => sprintf( __('Update %s', 'apicona'), $tm_pf_category_title ),
			'add_new_item'      => sprintf( __('Add New %s', 'apicona'), $tm_pf_category_title ),
			'new_item_name'     => sprintf( __('New %s Name', 'apicona'), $tm_pf_category_title ),
			'menu_name'         => sprintf( __('%s', 'apicona'), $tm_pf_category_title ),
		);
	}
	
	
	// Project Category
	$portfolio->add_taxonomy(
		'Portfolio Category',
		array( 'rewrite' => array( 'slug' => $tm_pf_category_slug ) ),
		$labels
	);


}

add_action( 'init', 'thememount_apiconaadv_cpt_portfolio', 8 );






/**
 *  Change Excerpt box title
 */
add_action( 'admin_init',  'thememount_portfolio_change_excerpt_box_title' );
if( !function_exists('thememount_portfolio_change_excerpt_box_title') ){
function thememount_portfolio_change_excerpt_box_title() {
	remove_meta_box( 'postexcerpt', 'portfolio', 'normal' );
	add_meta_box('postexcerpt', __('Short Description', 'apicona'), 'thememount_portfolio_post_excerpt_meta_box', 'portfolio', 'normal', 'high');
	
	//add_meta_box('postimagediv', __("Member's Image",'apicona'), 'post_thumbnail_meta_box', 'portfolio', 'normal', 'high');
	
}
}

if( !function_exists('thememount_portfolio_post_excerpt_meta_box') ){
function thememount_portfolio_post_excerpt_meta_box($post) {
?>
	<label class="screen-reader-text" for="excerpt"><?php _e('Short description', 'apicona') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
	<p><?php _e('Please write short description here. This descripiton will be used in box view (via Visual Composer element).', 'apicona'); ?></p>
<?php
}
}






/********** Adding featured image URL path ***********/


// A fucntion to add a custom field to team group add form-field
function thememount_apiconaadv_portfolio_category_taxonomy_custom_fields_addnew(){
	?>
	
	<div class="form-field">
		<label for="thememount_img_url"><?php _e('Featured Image URL', 'apicona'); ?></label>
		<input type="text" name="term_meta[thememount_img_url]" id="term_meta[thememount_img_url]" size="40" value= ""><br />
		<p><?php _e('Paste featured image URL for this group. Please upload first in media section.' ,'apicona'); ?></p>
	</div>
	
<?php	
}


// A callback function to add a custom field to our "presenters" taxonomy
function thememount_apiconaadv_portfolio_category_taxonomy_custom_fields($tag) {
   // Check for existing taxonomy meta for the term you're editing
	$t_id = $tag->term_id; // Get the ID of the term you're editing
	$term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check
?>

<tr class="form-field">
	<th scope="row" valign="top">
		<label for="thememount_img_url"><?php _e('Featured Image URL', 'apicona'); ?></label>
	</th>
	<td>
		<input type="text" name="term_meta[thememount_img_url]" id="term_meta[thememount_img_url]" size="40" value="<?php echo $term_meta['thememount_img_url'] ? $term_meta['thememount_img_url'] : ''; ?>"><br />
		<span class="description"><?php _e('Paste featured image URL for this group. Please upload first in media section.' ,'apicona'); ?></span>
	</td>
</tr>

<?php
}







// A callback function to save our extra taxonomy field(s)
function thememount_apiconaadv_tm_pf_cat_save_taxonomy_custom_fields( $term_id ) {
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
add_action( 'portfolio_category_edit_form_fields', 'thememount_apiconaadv_portfolio_category_taxonomy_custom_fields', 10, 2 );
add_action( 'portfolio_category_add_form_fields', 'thememount_apiconaadv_portfolio_category_taxonomy_custom_fields_addnew', 10, 2 );

// Save the changes made on the "presenters" taxonomy, using our callback function
add_action( 'edited_portfolio_category', 'thememount_apiconaadv_tm_pf_cat_save_taxonomy_custom_fields', 10, 2 );
add_action( 'create_portfolio_category', 'thememount_apiconaadv_tm_pf_cat_save_taxonomy_custom_fields', 10, 2 );
