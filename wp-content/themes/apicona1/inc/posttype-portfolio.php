<?php

function kwayy_cpt_portfolio(){
	
// Including Framework Master File
include_once(get_template_directory() . '/inc/cuztom-helper-framework/cuztom.php');

	global $apicona;
	
	/**
	 *  Labels for CPT
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
	
	
	/**
	 *  Labels for Taxonomy
	 */
	$pf_tax_labels = array(
		'name'              => _x( 'Portfolio Categories', 'Portfolio Category - taxonomy general name', 'apicona' ),
		'singular_name'     => _x( 'Portfolio Category', 'Portfolio Category - taxonomy singular name', 'apicona' ),
		'search_items'      => __( 'Search Portfolio Category', 'apicona' ),
		'all_items'         => __( 'All Portfolio Categories', 'apicona' ),
		'parent_item'       => __( 'Parent Portfolio Category', 'apicona' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'apicona' ),
		'edit_item'         => __( 'Edit Portfolio Category', 'apicona' ),
		'update_item'       => __( 'Update Portfolio Category', 'apicona' ),
		'add_new_item'      => __( 'Add New Portfolio Category', 'apicona' ),
		'new_item_name'     => __( 'New Portfolio Category Name', 'apicona' ),
		'menu_name'         => __( 'Portfolio Category', 'apicona' ),
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
			'not_found_in_trash' => __( 'No '.strtolower($pf_type_title_singluar).' found in Trash.', 'apicona')
		);
	}
	

	// CPT slug
	$pf_type_slug = 'portfolio';
	if( isset($apicona['pf_type_slug']) && trim($apicona['pf_type_slug'])!='' ){
		$pf_type_slug = esc_attr($apicona['pf_type_slug']);
	}

	
	/**
	 *  Generating Custom Post Type
	 */
	/*$portfolio = new Cuztom_Post_Type( 'Portfolio',
		array(
			'has_archive' => false,
			'supports'    => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'   => 'dashicons-screenoptions',
			'rewrite'     => array( 'slug' => $pf_slug ),
		), $labels
	);*/
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
	
	
	
	
	/**
	 *  Portfolio Category
	 */
	$tm_pf_category_title = ( isset($apicona['pf_cat_title']) && trim($apicona['pf_cat_title'])!='' ) ? trim($apicona['pf_cat_title']) : __('Portfolio Category', 'tmte') ;
	$tm_pf_category_slug  = ( isset($apicona['pf_group_slug']) && trim($apicona['pf_group_slug'])!='' ) ? trim($apicona['pf_group_slug']) : 'portfolio-category' ;
	
	
	if( isset($apicona['pf_cat_title']) && trim($apicona['pf_cat_title'])!='' && trim($apicona['pf_cat_title'])!='Portfolio Category' ){
		$pf_tax_labels = array(
			'name'              => __($tm_pf_category_title, 'apicona'),
			'singular_name'     => __($tm_pf_category_title, 'apicona'),
			'search_items'      => __('Search '.$tm_pf_category_title, 'apicona'),
			'all_items'         => __('All '.$tm_pf_category_title, 'apicona'),
			'parent_item'       => __('Parent '.$tm_pf_category_title, 'apicona'),
			'parent_item_colon' => __('Parent '.$tm_pf_category_title.':', 'apicona'),
			'edit_item'         => __('Edit '.$tm_pf_category_title, 'apicona'), 
			'update_item'       => __('Update '.$tm_pf_category_title, 'apicona'),
			'add_new_item'      => __('Add New '.$tm_pf_category_title, 'apicona'),
			'new_item_name'     => __('New '.$tm_pf_category_title.' Name', 'apicona'), 
			'menu_name'         => __($tm_pf_category_title, 'apicona'), 
		);
	}
	
	// Creating taxonomy now
	/*$portfolio->add_taxonomy(
		'portfolio_category',
		array( 'rewrite' => array( 'slug' => $tm_pf_category_slug ) ),
		$pf_tax_labels
	);*/
	$args = array(
		'hierarchical'      => true,
		'labels'            => $pf_tax_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $tm_pf_category_slug ),
	);

	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
	
	
	
	
	
	
	// Assinging variable for Portfolio object
	$portfolio = new Cuztom_Post_Type('portfolio');

$portfolio->add_meta_box(
	'kwayy_portfolio_data',
	__('Apicona: Portfolio Options','apicona'),
	array(
		array(
			'name'        => 'clientname',
			'label'       => __('Doctor/Team Name','apicona'),
			'description' => __('(Optional) Please fill docotor or team name','apicona'),
			'type'        => 'text'
		),
		
		
		array(
			'name'        => 'clientlink',
			'label'       => __('Doctor/Team Link','apicona'),
			'description' => __('(Optional) Please fill doctor or team website link','apicona'),
			'type'        => 'text'
		),
		array(
			'name'        => 'skills',
			'label'       => __('Skills','apicona'),
			'description' => __('(Optional) Please fill special skills','apicona'),
			'type'        => 'text'
		),
		array(
			'name'        => 'linktext',
			'label'       => __('Project Link Text','apicona'),
			'description' => __('(Optional) Please fill project link text. Example <code>Read More</code>','apicona'),
			'type'        => 'text'
		),
		array(
			'name'        => 'linkurl',
			'label'       => __('Project Link URL','apicona'),
			'description' => __('(Optional) Please fill project link URL. This will become the link for the "Project Link Text" word.','apicona'),
			'type'        => 'text'
		),
		
		
	)
);



$portfolio->add_meta_box(
	'kwayy_portfolio_featured',
	__('Apicona: Featured Image / Video / Slider','apicona'),	
	array(
		array(
			'name'          => 'featuredtype',
			'label'         => __('Featured Image/Video', 'apicona'),
			'description'   => __('Select what you want to show as featured. Image or Video', 'apicona'),
			'type'          => 'radios',
			'options'       => array(
				'image'       => __('Featured Image', 'apicona'),
				'video'       => __('Video (YouTube or Vimeo)', 'apicona'),
				//'videoplayer' => __('Video (MP4, WEBM, OGG or OGV video file)', 'apicona'),
				'audioembed'  => __('Audio (SoundCloud embed code)', 'apicona'),
				//'audioplayer' => __('Audio (MP3, WAV or OGG audio file)', 'apicona'),
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
		
		/* Video (MP4, WEBM, OGG or OGV video file) */
		/*array(
			'name'          => 'videofile_mp4',
			'label'         => __('Select MP4 file for video player', 'apicona'),
			'description'   => __('Upload and select MP4 file for video player', 'apicona'),
			'type'          => 'file',
		),
		array(
			'name'          => 'videofile_webm',
			'label'         => __('Select WEBM file for video player', 'apicona'),
			'description'   => __('Upload and select WEBM file for video player', 'apicona'),
			'type'          => 'file',
		),
		array(
			'name'          => 'videofile_ogv',
			'label'         => __('Select OGV (or OGG video) file for video player', 'apicona'),
			'description'   => __('Upload and select OGV (or OGG video) file for video player', 'apicona'),
			'type'          => 'file',
		), */
		
		/* Audio (SoundCloud embed code) */
		array(
			'name'          => 'audiocode',
			'label'         => __('SoundCloud (or any other service) Embed Code', 'apicona'),
			'description'   => __('Paste SoundCloud or any other service embed code here.', 'apicona'),
			'type'          => 'textarea',
		),
		
		/* Audio (MP3, WAV or OGG audio file) */
		/*array(
			'name'          => 'audiofile_mp3',
			'label'         => __('Select MP3 file for audio player', 'apicona'),
			'description'   => __('Upload and select MP3 file for audio player', 'apicona'),
			'type'          => 'file',
		),
		array(
			'name'          => 'audiofile_wav',
			'label'         => __('Select WAV file for audio player', 'apicona'),
			'description'   => __('Upload and select WAV file for audio player', 'apicona'),
			'type'          => 'file',
		),
		array(
			'name'          => 'audiofile_oga',
			'label'         => __('Select OGA (or OGG audio) file for audio player', 'apicona'),
			'description'   => __('Upload and select OGA (or OGG audio) file for audio player', 'apicona'),
			'type'          => 'file',
		), */
		
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
	'thememount_portfolio_like',
	__('Apicona: Portfolio Like Option','apicona'),
	array(
		array(
			'name'          => 'pflikereset',
			'label'         => __('Portfolio Reset Likes', 'apicona'),
			'description'   => __('This will make the LIKE count to zero. For this portfolio only. If you like to reset LIKE for all portfolio than please go to "Theme Options > Advanced Settings" section.', 'apicona').
			'<br><br>'.
			'To reset, just check this checkbox and save this page.',
			'type'          => 'checkbox',
		),
	)
);



}

add_action( 'init', 'kwayy_cpt_portfolio', 8 );