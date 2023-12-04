<?php 







// This must bein INIT action otherwise it will not call and return empty data.
function thememount_slider_options_setup(){
	
	// Including Framework Master File
	include_once('cuztom-helper-framework/cuztom.php');

	// Declaring Pages variable
	$pages = new Cuztom_Post_Type('page');
	
	
	// Retriving Custom Sidebars for use as option for dropdown
	global $apicona;
	$sidebars = array(''=>'Default');
	if( isset($apicona['sidebars']) && is_array($apicona['sidebars']) && count($apicona['sidebars'])>0 ){
		foreach($apicona['sidebars'] as $sidebar){
			if( !empty($sidebar) && trim($sidebar)!='' ){
				$sidebar_key = str_replace('-','_',sanitize_title($sidebar));
				$sidebars[$sidebar_key] = $sidebar;
			}
		}
	}
	
		
	// Getting Slider Type
	$sliderType         = array();
	$sliderType['']     = __('No slider', 'apicona');
	if ( is_plugin_active( 'revslider/revslider.php' ) ) { $sliderType['revslider'] = __('Slider Revolution', 'apicona'); }
	$sliderType['nivo'] 	= __('Nivo Slider', 'apicona');
	$sliderType['flex'] 	= __('Flex Slider', 'apicona');
	$sliderType['other']	= __('Others', 'apicona');
	
	if ( is_plugin_active( 'revslider/revslider.php' ) ) {
		
		/* Slider Revolution plugin is activated */
		global $wpdb;
		$sliders    = $wpdb->get_results("SELECT id,title,alias FROM ".$wpdb->prefix."revslider_sliders");
		$revSliders = array();
		if( $sliders!=false && count($sliders)>0 ){
			foreach($sliders as $slider) {$revSliders[ $slider->alias ] = $slider->title;}
		}
		
		$sliderOptions = array(
			array(
				'name'          => 'slidertype',
				'label'         => __('Select Slider', 'apicona'),
				'description'   => __('Select slider which you want to show on this page. The slider will appear in header area.', 'apicona'),
				'type'          => 'radios',
				'options'       => $sliderType,
				'default_value' => ''
			),
			array(
				'name'          => 'revslider_slider',
				'label'         => __('Select Slider for Slider Revolution', 'apicona'),
				'description'   => __('Select slider for Slider Revolution.', 'apicona'),
				'type'          => 'select',
				'options'       => $revSliders,
			),
		);
		
	} else {

		/* Slider Revolution plugin is not activated */
		$sliderOptions = array(
			array(
				'name'          => 'slidertype',
				'label'         => __('Select Slider', 'apicona'),
				'description'   => __('Select slider which you want to show on this page. The slider will appear in header area.', 'apicona'),
				'type'          => 'radios',
				'options'       => $sliderType,
			),
		);
	}
	
	
	if( taxonomy_exists('slide_group') ){
		$allCat = get_terms( 'slide_group', 'hide_empty=0' );
		if( count($allCat)>0 ){
			
			// Preparing array of category list
			$catList = array();
			foreach( $allCat as $cat ){ $catList[$cat->slug] = $cat->name.' ('.$cat->count.')'; }
			$sliderOptions[] = array(
				'name'          => 'slidercat',
				'label'         => __('Select Slider Group', 'apicona'),
				'description'   => __('Select slider group to fetch all slides. Please note that only selected group\'s slides will be shown in FLEX or NIVO slider.', 'apicona'),
				'type'          => 'select',
				'options'       => $catList,
			);
		
		}
	}
	
	
	

	// Nivo/Flex slider options
	$sliderOptions[] = array(
		'name'          => 'slideroptions',
		'label'         => __('Slider Options', 'apicona'),
		'description'   => __('Insert Nivo or Flex slider options.', 'apicona') . '<br><br><strong>' . __('Example:', 'apicona').' </strong> ' . '<code>effect: "fade", animSpeed: 700</code>' . '<br><br>' . '<a href="http://docs.dev7studios.com/jquery-plugins/nivo-slider#play-with-settings" target="_blank">' . __('Click here to see all options of Nivo Slider.', 'apicona') . '</a> 
		' . '<br><br>' . '
		<a href="http://www.woothemes.com/flexslider/#gist9481310" target="_blank">' . __('Click here to see all options of Flex Slider.', 'apicona') . '</a>',
		'type'          => 'textarea',
		'default_value' => ''
	);

	
	// Others
	$sliderOptions[] = array(
		'name'          => 'slider_others',
		'label'         => __('Custom Slider Shortcode', 'apicona'),
		'description'   => __('Add shortcode of slider you like to show on this page', 'apicona'),
		'type'          => 'textarea',
	);
	
	// Wide or Boxed slider
	$sliderOptions[] = array(
		'name'          => 'slidersize',
		'label'         => __('Slide Size', 'apicona'),
		'description'   => __('Select slider width size.', 'apicona'),
		'type'          => 'radios',
		'options'       => array( 'wide'=>'Wide Slider', 'boxed'=>'Boxed Slider' ),
		'default_value' => 'wide'
	);
	
	
	// All options as tabs: Title Box Opitons, Slider Area Options, Sidebar Widget Options
	$pages->add_meta_box(
		'kwayy_page_options',
		'Apicona Advanced: Page Options',
		array(
			'tabs',
			array(
			
				__('Topbar Options','apicona') => array(
					array(
						'name'          => 'show_topbar',
						'label'         => __('Hide Topbar', 'apicona'),
						'description'   => __('If you want to hide Topbar than check this option', 'apicona'),
						'type'          => 'select',
						'options'       => array(
							''           => __('Global', 'apicona'),
							'0'          => __('Hide Topbar', 'apicona'),
							'1'          => __('Show Topbar', 'apicona'),
						),
						//'default_value' => '',
					),
					array(
						'name'          => 'topbarbgcolor',
						'label'         => __('Background Color', 'apicona'),
						'description'   => __('Please select color for background', 'apicona'),
						'type'          => 'select',
						'options'       => array(
							''           => __('Global', 'apicona'),
							'darkgrey'   => __('Dark grey', 'apicona'),
							'grey'       => __('Grey', 'apicona'),
							'white'      => __('White', 'apicona'),
							'skincolor'  => __('Skincolor', 'apicona'),
							'custom'     => __('Custom Color', 'apicona'),
						),
						//'default_value' => 'default',
					),
					array(
						'name'        => 'topbarbgcustomcolor',
						'label'       => __('Custom Background Color', 'apicona'),
						'description' => __('Please select custom color for background', 'apicona'),
						'type'        => 'color',
					),
					array(
						'name'        => 'topbartextcolor',
						'type'        => 'select',
						'label'       => __('Text Color', 'apicona'), 
						'description' => __('Select <code>Dark</code> color if you are going to select light color in above option.', 'apicona'),
						'required'    => array('show_topbar','equals','0'),
						'options'     => array(
								''       => __('Global', 'apicona'),
								'white'  => __('White', 'apicona'),
								'dark'   => __('Dark', 'apicona'),
								'custom' => __('Custom color', 'apicona'),
							),
						'default' => 'dark'
					),
					array(
						'name'        => 'topbartextcustomcolor',
						'label'       => __('Custom Text Color', 'apicona'),
						'description' => __('Please select custom color for text', 'apicona'),
						'type'        => 'color',
					),
					array(
						'name'          => 'topbarlefttext',
						'label'         => __('Topbar Left Content (overwrite default text)', 'apicona'),
						'description'   => __('Add content for Topbar text for left area. This will overwrite default text set in Theme Options.', 'apicona'),
						'type'          => 'textarea'
					),
					array(
						'name'          => 'topbarrighttext',
						'label'         => __('Topbar Right Content (overwrite default text)', 'apicona'),
						'description'   => __('Add content for Topbar text for right area. This will overwrite default text set in Theme Options.', 'apicona'),
						'type'          => 'textarea'
					),
				),
			
			
				__('Titlebar Options', 'apicona') => array(
					array(
						'name'          => 'hidetitlebar',
						'label'         => __('Hide Titlebar', 'apicona'),
						'description'   => __('If you want to hide title box than check this option', 'apicona'),
						'type'          => 'checkbox'
					),
					array(
						'name'          => 'titlebar_view',
						'label'         => __('Titlebar Text Align', 'apicona'),
						'description'   => __('Select text align in Titlebar.', 'apicona'),
						'type'          => 'select',
						'options'       => array(
							''            => __('Global', 'apicona'),
							'default'  => __('All Center', 'apicona'),
							'left'     => __('Title Left / Breadcrumb Right', 'apicona'),
							'right'    => __('Title Right / Breadcrumb Left', 'apicona'),
							'allleft'  => __('All Left', 'apicona'),
							'allright' => __('All Right', 'apicona'),
						),
					),

					array(
						'name'          => 'title',
						'label'         => __('Page Title', 'apicona'),
						'description'   => __('(Optional) Replace current page title with this title. So Search results will show the original page title and the page will show this title.', 'apicona'),
						'type'          => 'textarea'
					),
					array(
						'name'          => 'subtitle',
						'label'         => __('Page Subtitle', 'apicona'),
						'description'   => __('(Optional) Please fill page subtitle', 'apicona'),
						'type'          => 'textarea'
					),
					array(
						'name'          => 'hidebreadcrumb',
						'label'         => __('Hide Breadcrumb', 'apicona'),
						'description'   => __('If you want to hide breadcrumb than check this option', 'apicona'),
						'type'          => 'checkbox'
					),
					array(
						'name'     => 'titlebar_bg_color',
						'type'     => 'select',
						'label'    => __('Titlebar Background Color', 'apicona'), 
						'description' => __('Select predefined color for Titlebar background color.', 'apicona'),
						'options'  => array(
								''           => __('Global', 'apicona'),
								'darkgrey'   => __('Dark grey', 'apicona'),
								'grey'       => __('Grey', 'apicona'),
								'white'      => __('White', 'apicona'),
								'skincolor'  => __('Skincolor', 'apicona'),
								'custom'     => __('Custom Color', 'apicona'),
							),
						'default' => 'darkgrey'
					),
					array(
						'name'     => 'titlebar_bg_custom_color',
						'type'     => 'color',
						'label'    => __('Titlebar Background Color (custom)', 'apicona'),
						'description' => __('Custom color for titlebar background.', 'apicona'),
						/*'required'      => array('titlebar_bg_color','equals', 'custom' ),
						'default'  => array(
								'color' => '#000000',
								'alpha' => '.75'
							),*/
						//'validate' => 'color',
					),
					array(
						'name'        => 'titlebar_text_color',
						'type'        => 'select',
						'label'       => __('Titlebar Text Color', 'apicona'), 
						'description' => __('Select <code>Dark</code> color if you are going to select light color in above option.', 'apicona'),
						'options'  => array(
								''       => __('Global', 'apicona'),
								'white'  => __('White', 'apicona'),
								'dark'   => __('Dark', 'apicona'),
								'custom' => __('Custom Color', 'apicona'),
							),
						'default' => 'white'
					),
					array(
						'name'        => 'titlebar_text_custom_color',
						'type'        => 'color',
						'label'       => __('Titlebar Custom Color for text', 'apicona'),
						'description' => __('Custom background color for Topbar.', 'apicona'),
						/*'required' => array(
										array('titlebar_text_color','equals','custom'),
							),
						'validate' => 'color',*/
					),
					array(
						'name'        => 'titlebar_bg_custom_image',
						'label'       => __('Upload Titlebar Background Image', 'apicona'),
						'description' => __('(Optional) Please upload image for background of Titlebar. Image size should be <code>1700px X 500px</code>.', 'apicona'),
						'type'        => 'image',
					),
				),
			
				__('Slider Area Options','apicona') => $sliderOptions,
				
				__('Sidebar Options','apicona') => array(
					array(
						'name'          => 'leftsidebar',
						'label'         => __('Left Sidebar', 'apicona'),
						'description'   => __('(Optional) Select left sidebar Widget position', 'apicona'),
						'type'          => 'select',
						'options'       => $sidebars
					),
					array(
						'name'          => 'rightsidebar',
						'label'         => __('Right Sidebar', 'apicona'),
						'description'   => __('(Optional) Select right sidebar Widget position', 'apicona'),
						'type'          => 'select',
						'options'       => $sidebars
					),
					array(
						'name'          => 'sidebarposition',
						'label'         => __('Sidebar Position', 'apicona'),
						'description'   => __('(Optional) Select position for sidebars', 'apicona'),
						//'type'        => 'select',
						'type'          => 'radios',
						'options'       => array(
							''         => __('Global', 'apicona'),
							'no'       => __('No Sidebar', 'apicona'),
							'left'     => __('Left Sidebar only', 'apicona'),
							'right'    => __('Right Sidebar only', 'apicona'),
							'both'     => __('Both Left and Right Sidebars', 'apicona'),
							'bothleft' => __('Both sidebars at Left side', 'apicona'),
							'bothright'=> __('Both sidebars at Right side', 'apicona'),
						)
					)
				),
			)
		)
	);
	
	

	$pages->add_meta_box(
		'kwayy_page_customize',
		'Apicona Advanced: Customize Options',
		array(
			array(
				'name'          => 'skincolor',
				'label'         => __('Skin Color', 'apicona'),
				'description'   => __('Select Skin Color for this page only. This will override Skin color set under "Theme Options" section. ', 'apicona').'<br><br> <strong>' . __( 'NOTE: ' ,'apicona') . '</strong> ' . __( 'Leave this empty to use "Skin Color" set in the "Theme Options" directly. ' ,'apicona') . '<br><br><strong>' . __( 'NOTE: ' ,'apicona') . '</strong> ' . __( 'Also make sure you select "Internal" in the "Dynamic Style Position" option which you can find in "Theme Options > Advanced Settings" section.' ,'apicona') ,
				'type'          => 'color',
				'default_value' => '',
			),
		)
	);	
	
	
	
	// Show Template options if template selected
	$template_file = '';
	$post_id       = (isset($_GET['post']) && $_GET['post']!='') ? $_GET['post'] : '';
	if( $post_id=='' ){
		if( isset($_POST['post_ID']) && $_POST['post_ID']!='' ){
			$post_id = $_POST['post_ID'];
		}
	}
	if( $post_id!='' ){
		$template_file = get_post_meta($post_id,'_wp_page_template',true);
		$showPosts     = get_post_meta($post_id, '_kwayy_page_template_show_posts', true);
		// Setting default show numbers
		$defaultShowPosts = '10';
		switch($template_file){
			case 'template-blog-2-columns.php': 
				$defaultShowPosts = '10';
				break;
			case 'template-blog-3-columns.php': 
				$defaultShowPosts = '9';
				break;
			case 'template-blog-4-columns.php': 
				$defaultShowPosts = '8';
				break;
		}
	}
	if(    $template_file == 'template-blog-2-columns.php'
		|| $template_file == 'template-blog-3-columns.php'
		|| $template_file == 'template-blog-4-columns.php'
	){
		$pages->add_meta_box(
			'kwayy_page_template',
			'Apicona Advanced: Template Options',
			array(
				array(
					'name'        => 'show_posts',
					'label'       => __('Show Posts', 'apicona'),
					'description' => __('How many posts you like to show on Two, Three or Four column blog view.', 'apicona'),
					'type'        => 'select',
					'options'     => array(
						'global'     => __('Global', 'apicona'),
						'1'          => __('1', 'apicona'),
						'2'          => __('2', 'apicona'),
						'3'          => __('3', 'apicona'),
						'4'          => __('4', 'apicona'),
						'5'          => __('5', 'apicona'),
						'6'          => __('6', 'apicona'),
						'7'          => __('7', 'apicona'),
						'8'          => __('8', 'apicona'),
						'9'          => __('9', 'apicona'),
						'10'          => __('10', 'apicona'),
						'11'          => __('11', 'apicona'),
						'12'          => __('12', 'apicona'),
						'13'          => __('13', 'apicona'),
						'14'          => __('14', 'apicona'),
						'15'          => __('15', 'apicona'),
						'16'          => __('16', 'apicona'),
						'17'          => __('17', 'apicona'),
						'18'          => __('18', 'apicona'),
						'19'          => __('19', 'apicona'),
						'20'          => __('20', 'apicona'),
					),
					'default_value' => $defaultShowPosts,
				),
				
			)
		);
	
	}
	

}  // Function: thememount_slider_options_setup()

add_action( 'admin_init', 'thememount_slider_options_setup' );







