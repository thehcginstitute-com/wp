<?php
/*
 * NOTE: This file must call in functions.php
 *
 *
 /*

/*** Ajax Callback ***/


// Ajax call to merge Apicona theme / page option to Apicona Advanced theme 
add_action( 'wp_ajax_apiconaadv_merge_theme_page_options', 'apiconaadv_merge_theme_page_option' );
function apiconaadv_merge_theme_page_option(){

	$subaction 	= $_POST['subaction'];
	$style  	= $_POST['style'];
	$answer   	= array();
	
	switch($subaction){
		
		//Theme options merging
		case ('start'):
			
			thememount_ajax_update_themeoptions($style);
		
			
			$answer['answer']         = 'ok';
			$answer['next_subaction'] = 'merge_post_options';
			$answer['message']        = __('Merging Theme Options...', 'apicona');
			$answer['data']           = '';
			
			die( json_encode( $answer ) );
		break;
		
		case ('merge_post_options'):
			
			$type = 'post';
			thememount_update_page_post_metadetails($style, $type);
		
			
			$answer['answer']         = 'ok';
			$answer['next_subaction'] = 'merge_page_options';
			$answer['message']        = __('Merging Post Options...', 'apicona');
			$answer['data']           = '';
			
			die( json_encode( $answer ) );
		break;
		
		case ('merge_page_options'):
			
			$type = 'page';
			thememount_update_page_post_metadetails($style, $type);
		
			
			$answer['answer']         = 'ok';
			$answer['next_subaction'] = 'merge_portfolio_options';
			$answer['message']        = __('Merging Page Options...', 'apicona');
			$answer['data']           = '';
			
			die( json_encode( $answer ) );
		break;
		
		case ('merge_portfolio_options'):
			
			$type = 'portfolio';
			thememount_update_portfolio_metadetails($style, $type);
		
			
			$answer['answer']         = 'ok';
			$answer['next_subaction'] = 'final';
			$answer['message']        = __('Merging Portfolio Options...', 'apicona');
			$answer['data']           = '';
			
			die( json_encode( $answer ) );
		break;
		
		case ('final'):
			$answer['answer']         = 'finished';
			$answer['next_subaction'] = '';
			$answer['message']        = '';
			$answer['data']           = '';
			
			die( json_encode( $answer ) );
		break;
		
	}
	
	
	die();
	
}



/** Helper function to merge Slides meta details **/
if( !function_exists('thememount_ajax_update_themeoptions') ){
function thememount_ajax_update_themeoptions($style){
	

	$apicona 				= get_option('apicona');
	$themestyle 			= $apicona['themestyle'];
	$topbar_color 			= $apicona['topbarbgcolor'];
	$skincolor 				= $apicona['skincolor'];
	$footerwidget_bgcolor 	= $apicona['footerwidget_bgcolor'];
	$titlebar_bg_color 		= $apicona['titlebar_bg_color'];
	
	$namechange_fields = array(
		"topbarbgcolor"				=> "topbarbgcustomcolor",
		"header_text_color" 		=> "mainmenufont",
		"footerwidget_bgcolor" 		=> "footerwidget_bgcolor",
		"footertext_bgcolor" 		=> "footer_copyright_bgcolor",
		"footertext_color" 			=> "footer_copyright_color",
		"titlebar_bg_image_type"	=> "titlebar_background",
		"headerstyle" 				=> "headerstyle", 
	);
	
	
	
	
	if( $style == 'apiconaadv'  ){
		
		// first change themestyle value
		$apicona['themestyle'] = $style;
		
 		foreach( $namechange_fields as $key => $val ){
			
			
			// change topbabar bg color option
			if($key == 'topbarbgcolor'){

				if(isset($apicona[$key]) && !empty($apicona[$key]) ){
					$colorcode = $apicona[$key];
	
					$apicona[$key] = 'custom';
					$apicona[$val] = $colorcode;
					
					// this is important topbarbgcolor is not saving if not doing this step
					update_option( 'apicona', $apicona );
					
				}
			}
			
			//change main menu font color 
			if($key == 'header_text_color'){
				if(isset($apicona[$key]) && !empty($apicona[$key]) ){
					if($apicona[$key] == 'dark'){
						$apicona[$val]["color"] = '#282828';
						$apicona['stickymainmenufontcolor'] = '#282828';
						update_option( 'apicona', $apicona );
					}elseif($apicona[$key] == 'white'){
						$apicona[$val]["color"]= '#ffffff';
						$apicona['stickymainmenufontcolor']= '#ffffff';
						update_option( 'apicona', $apicona );
					}
				}
			}
			
			// footer  color
			if( $key == 'footerwidget_bgcolor' || $key == 'footertext_bgcolor' ){
				
				if(isset($apicona[$key]) && !empty($apicona[$key]) ) {
					
					$color = $footerwidget_bgcolor;
					
					if($key == 'footertext_bgcolor'){
						$color = $apicona[$key];
					}
					
					$rgbcolor				= 'rgba( ' . tm_hex2rgb($apicona[$key]) . ', 0.97)';
					$apicona[$val] 			= array();
					$apicona[$val]["color"] = $color;
					$apicona[$val]["alpha"] = '0.97';
					$apicona[$val]["rgba"] 	= $rgbcolor;
					
					update_option( 'apicona', $apicona );
				}
			}
			
			
			// footer  text color
			if( $key == 'footertext_color' ){
				
				if(isset($apicona[$key]) && !empty($apicona[$key]) ) {
					$apicona[$val] 	= $apicona[$key];
					update_option( 'apicona', $apicona );
				}
			}
			
			// titlebar image and color
			if($key == 'titlebar_bg_image_type' ){
				if(isset($apicona[$key]) && !empty($apicona[$key]) ){
					if($apicona[$key] == 'noimg'){
						$apicona[$val]['background-image']				= '';
						$apicona[$val]['media']['thumbnail']		    = '';
						$apicona['titlebar_bg_color']					= 'custom';
						$rgbcolor 										= 'rgba( ' . tm_hex2rgb($titlebar_bg_color) . ', 1)';
						$apicona['titlebar_bg_custom_color']['color'] 	= $titlebar_bg_color;
						$apicona['titlebar_bg_custom_color']['alpha'] 	= '1';
						$apicona['titlebar_bg_custom_color']['rgba']  	= $rgbcolor;
						
						update_option( 'apicona', $apicona );
					}elseif($apicona[$key] == 'predefined'){
						//setting predefined images. 
						$predefinedimage = $apicona['titlebar_bg_image'];
						$titlebarbgimage = array(
							'1' => get_template_directory_uri() . '/images/titlebg/bg-title1.jpg',
							'2' => get_template_directory_uri() . '/images/titlebg/bg-title2.jpg',
							'3' => get_template_directory_uri() . '/images/titlebg/bg-title3.jpg',
							'4' => get_template_directory_uri() . '/images/titlebg/bg-title4.jpg',
							'5' => get_template_directory_uri() . '/images/titlebg/bg-title5.jpg',
							
						);
						
						//final image
						$bgimage = $titlebarbgimage[$predefinedimage];
						
						//final modifications
						$apicona[$val]['background-image']				= $bgimage;
						$apicona[$val]['media']['thumbnail']		    = $bgimage;
						$apicona['titlebar_bg_color']					= 'custom';
						$rgbcolor 										= 'rgba( ' . tm_hex2rgb($titlebar_bg_color) . ', 0.40)';
						$apicona['titlebar_bg_custom_color']['color'] 	= $titlebar_bg_color;
						$apicona['titlebar_bg_custom_color']['alpha'] 	= '0.40';
						$apicona['titlebar_bg_custom_color']['rgba']  	= $rgbcolor;
						
					}elseif($apicona[$key] == 'custom'){
						//fetch custom image and its property
						$customimage									= $apicona['titlebar_bg_custom_image']['url'];
						$thumbnail 										= $apicona['titlebar_bg_custom_image']['thumbnail'];
						$titlebar_bg_repeat 							= $apicona['titlebar_bg_repeat'];
						$titlebar_bg_size								= $apicona['titlebar_bg_size'];
						$titlebar_bg_attachment 						= $apicona['titlebar_bg_attachment'];
						$titlebar_bg_position 							= $apicona['titlebar_bg_position'];
				
						//final modifications
						$apicona[$val]['background-image'] 				= $customimage;
						$apicona[$val]['background-repeat']	     		= $titlebar_bg_repeat;
						$apicona[$val]['background-size']	     		= $titlebar_bg_size;
						$apicona[$val]['background-attachment']	    	= $titlebar_bg_attachment;
						$apicona[$val]['background-position']	    	= $titlebar_bg_position;
						$apicona[$val]['media']['thumbnail']		    = $thumbnail;
					
						$apicona['titlebar_bg_color']					= 'custom';
						$rgbcolor 										= 'rgba( ' . tm_hex2rgb($titlebar_bg_color) . ', 0.40)';
						$apicona['titlebar_bg_custom_color']['color'] 	= $titlebar_bg_color;
						$apicona['titlebar_bg_custom_color']['alpha'] 	= '0.40';
						$apicona['titlebar_bg_custom_color']['rgba']  	= $rgbcolor;
						
					}
				}
				
			}
			
			
			if( $key == 'headerstyle' ){
				
				$headerstyle = $apicona[$key];
				// Global header style changes
				$old_headerstyle_new_value = array(
					"4" => "9",
					"3" => "6",
					"5" => "4",
					"6" => "10",
					"7" => "5",
					"8" => "13",
				);
				
				if( isset($old_headerstyle_new_value[$headerstyle]) ){
					$headerstyle_new 	= $old_headerstyle_new_value[$headerstyle];
					$apicona[$key] 		= $headerstyle_new;
					
					// change header bg color when overlay style header set. 
					$old_overlay_style_headers = array(
						"5",
						"6",
						"7",
						"8",
					);
					
					if( in_array($headerstyle, $old_overlay_style_headers) ){
						$headerbgcolor 						= $apicona['headerbgcolor'];
						$stickyheaderbgcolor 				= $apicona['stickyheaderbgcolor'];
						$stickyheaderbgcolor_rgb			= 'rgba( ' . tm_hex2rgb($stickyheaderbgcolor) . ', 1)';	
					
						// header color
						$rgbcolor							= 'rgba( ' . tm_hex2rgb($headerbgcolor) . ', 0)';
						$apicona['headerbgcolor'] 			= array();
						$apicona['headerbgcolor']["color"] 	= $headerbgcolor;
						$apicona['headerbgcolor']["alpha"] 	= '0';
						$apicona['headerbgcolor']["rgba"] 	= $rgbcolor;	
						
						//sticky header color
						$apicona['stickyheaderbgcolor'] 			= array();
						$apicona['stickyheaderbgcolor']["color"] 	= $stickyheaderbgcolor;
						$apicona['stickyheaderbgcolor']["alpha"] 	= '1';
						$apicona['stickyheaderbgcolor']["rgba"] 	= $stickyheaderbgcolor_rgb;	
						
					}else {
						$headerbgcolor 						= $apicona['headerbgcolor'];
						$stickyheaderbgcolor 				= $apicona['stickyheaderbgcolor'];
						$stickyheaderbgcolor_rgb			= 'rgba( ' . tm_hex2rgb($stickyheaderbgcolor) . ', 1)';	
						
						// header color
						$rgbcolor							= 'rgba( ' . tm_hex2rgb($headerbgcolor) . ', 1)';
						$apicona['headerbgcolor'] 			= array();
						$apicona['headerbgcolor']["color"] 	= $headerbgcolor;
						$apicona['headerbgcolor']["alpha"] 	= '1';
						$apicona['headerbgcolor']["rgba"] 	= $rgbcolor;
						
						//sticky header color
						$apicona['stickyheaderbgcolor'] 			= array();
						$apicona['stickyheaderbgcolor']["color"] 	= $stickyheaderbgcolor;
						$apicona['stickyheaderbgcolor']["alpha"] 	= '1';
						$apicona['stickyheaderbgcolor']["rgba"] 	= $stickyheaderbgcolor_rgb;	
						
					}
					$apicona['dropdownmenufont']['color']	= '#ffffff';
					update_option( 'apicona', $apicona );
					
				}else {
					$apicona[$key] 						= $apicona[$key];
					$headerbgcolor 						= $apicona['headerbgcolor'];
					$stickyheaderbgcolor 				= $apicona['stickyheaderbgcolor'];
					$stickyheaderbgcolor_rgb			= 'rgba( ' . tm_hex2rgb($stickyheaderbgcolor) . ', 1)';	
					
					// header color
					$rgbcolor							= 'rgba( ' . tm_hex2rgb($headerbgcolor) . ', 1)';
					$apicona['headerbgcolor'] 			= array();
					$apicona['headerbgcolor']["color"] 	= $headerbgcolor;
					$apicona['headerbgcolor']["alpha"] 	= '1';
					$apicona['headerbgcolor']["rgba"] 	= $rgbcolor;
					
					
					//sticky header color
					$apicona['stickyheaderbgcolor'] 			= array();
					$apicona['stickyheaderbgcolor']["color"] 	= $stickyheaderbgcolor;
					$apicona['stickyheaderbgcolor']["alpha"] 	= '1';
					$apicona['stickyheaderbgcolor']["rgba"] 	= $stickyheaderbgcolor_rgb;	
					
					$apicona['dropdownmenufont']['color']	= '#ffffff';
					update_option( 'apicona', $apicona );
					
				}
			
			}
			
			
		}
		
		update_option( 'apicona', $apicona );
		
	}else if( $style == 'apicona'  ){
		// first change themestyle value
		$apicona['themestyle'] = $style;
		foreach( $namechange_fields as $key => $val ){
			
			// change topbabar bg color option
			if($key == 'topbarbgcolor'){

				if(isset($apicona[$key]) && !empty($apicona[$key]) ){
					
					$colorcode 		= '';
					$topbarbgcolor 	= $apicona[$key];
					
					$colorarray = array(
						'dark'		=> '#282828',
						'grey'		=> '#f8f8f8',
						'white'		=> '#ffffff',
						'skincolor' => $skincolor,
					);
					
					
					if( array_key_exists($topbarbgcolor, $colorarray) && isset($colorarray[$topbarbgcolor]) ){
						$colorcode = $colorarray[$topbarbgcolor];
					}
					
					$colorcode = ( $apicona[$key] == 'custom' && $apicona[$val] != '' ) ? $apicona[$val] : $colorcode;
	
					$apicona[$key] = $colorcode;
					
					
					// this is important topbarbgcolor is not saving if not doing this step
					update_option( 'apicona', $apicona );
					
				}
			}
			
			
			//change main menu font color 
			if($key == 'header_text_color'){
				
				if(isset($apicona[$val]) && !empty($apicona[$val]) ){
					
					$color = 'white';
					
					$colorcode = tm_check_dark_color($apicona[$val]['color']);
					
					// if dark color then color dark
					if( $colorcode == true ){
						$color = 'dark';
					}
					
					$apicona[$key] = $color;
				}
				
				update_option( 'apicona', $apicona );
				
			}
			
			// footer widget color
			if( $key == 'footerwidget_bgcolor' ){
				
				if(isset($apicona[$key]) && !empty($apicona[$key]) ) {
					
					$apicona[$key] = $apicona[$key]['color'];
					
					update_option( 'apicona', $apicona );
				}
			}
			
			// footer  color
			if( $key == 'footertext_bgcolor' ){
				
				if(isset($apicona[$val]) && !empty($apicona[$val]) ) {
					
					$apicona[$key] = $apicona[$val]['color'];
					
					update_option( 'apicona', $apicona );
				}
			}
			
			
			// footer  text color
			if( $key == 'footertext_color' ){
				
				if(isset($apicona[$val]) && !empty($apicona[$val]) ) {
					$apicona[$key] 	= $apicona[$val];
					update_option( 'apicona', $apicona );
				}
			}
			
			// titlebar bg image
			if( $key == 'titlebar_bg_image_type' ){
				
				if(isset($apicona[$val]) && !empty($apicona[$val]) ) {
					
					$apicona[$key] 	= 'custom';
					$titlebar_bg_color = $apicona['titlebar_bg_color'];
					
					
					$colorarray = array(
						'darkgrey'	=> '#282828',
						'grey'		=> '#f8f8f8',
						'white'		=> '#ffffff',
						'skincolor' => $skincolor,
					);
					
					if( array_key_exists($titlebar_bg_color, $colorarray) && isset($colorarray[$titlebar_bg_color]) ){
						$titlebar_bg_color = $colorarray[$titlebar_bg_color];
					}
					
					if( $titlebar_bg_color == 'custom' ){
						$titlebar_bg_color = $apicona['titlebar_bg_custom_color']['color'];
					}
					
					$apicona['titlebar_bg_color'] = $titlebar_bg_color;
					
					//fetch custom image and its property
					$customimage									= $apicona[$val]['background-image'];
					$thumbnail 										= $apicona[$val]['media']['thumbnail'];
					$titlebar_bg_repeat 							= $apicona[$val]['background-repeat'];
					$titlebar_bg_size								= $apicona[$val]['background-size'];
					$titlebar_bg_attachment 						= $apicona[$val]['background-attachment'];
					$titlebar_bg_position 							= $apicona[$val]['background-position'];
			
			
					//final modifications
					
					$apicona['titlebar_bg_custom_image']['url']			= $customimage;
					$apicona['titlebar_bg_custom_image']['thumbnail']	= $thumbnail;
					$apicona['titlebar_bg_repeat'] 						= $titlebar_bg_repeat;
					$apicona['titlebar_bg_size']			   			= $titlebar_bg_size;
					$apicona['titlebar_bg_attachment']			  		= $titlebar_bg_attachment;
					$apicona['titlebar_bg_position']  					= $titlebar_bg_position;
					
					
					update_option( 'apicona', $apicona );
				}
			}
			
			if( $key == 'headerstyle' ){
				
				$headerstyle = $apicona[$key];
				// Global header style changes
				$new_headerstyle_old_value = array(
					"9"		=> "4",
					"6" 	=> "3",
					"4" 	=> "5",
					"10"	=> "6",
					"5"		=> "7",
					"13"	=> "8",
				);
				
				if( isset($new_headerstyle_old_value[$headerstyle]) ){
					$headerstyle_new 	= $new_headerstyle_old_value[$headerstyle];
					$apicona[$key] 		= $headerstyle_new;
					
					// change header bg color when overlay style header set. 
					$new_overlay_style_headers = array(						
						"4",
						"10",
						"5",
						"13",
					);
					
					if( in_array($headerstyle, $new_overlay_style_headers) ){
						$headerbgcolor 						= $apicona['headerbgcolor']['color'];
						$stickyheaderbgcolor 				= $apicona['stickyheaderbgcolor']['color'];
						
						//header colors
						$apicona['headerbgcolor'] 			= $headerbgcolor;
						$apicona['stickyheaderbgcolor']		= $stickyheaderbgcolor;
						
					}else {
						$headerbgcolor 						= $apicona['headerbgcolor']['color'];
						$stickyheaderbgcolor 				= $apicona['stickyheaderbgcolor']['color'];
						
						//header colors
						$apicona['headerbgcolor'] 			= $headerbgcolor;
						$apicona['stickyheaderbgcolor']		= $stickyheaderbgcolor;
						
					}
					
					$apicona['dropdownmenufont']['color']	= '';
					update_option( 'apicona', $apicona );
					
				}else {
					$apicona[$key] 						= $apicona[$key];
					$headerbgcolor 						= $apicona['headerbgcolor']['color'];
					$stickyheaderbgcolor 				= $apicona['stickyheaderbgcolor']['color'];
					
					//header colors
					$apicona['headerbgcolor'] 			= $headerbgcolor;
					$apicona['stickyheaderbgcolor']		= $stickyheaderbgcolor;
					
					$apicona['dropdownmenufont']['color']	= '';
					update_option( 'apicona', $apicona );
					
				}
			
			}
			
		}
		update_option( 'apicona', $apicona );
		
	}
	// var_dump($apicona);
	
	// update apcionaadv options in database
	// update_option( 'apicona', $apicona );

	
}
}//end if




/** Helper function to merge portfolio meta details **/
if( !function_exists('thememount_update_portfolio_metadetails') ){
function thememount_update_portfolio_metadetails($style, $type){
	
	$args = array(
		'post_type' => $type,
		'posts_per_page' => -1,
		'post_status' => 'publish'
	); 
	
	//get list of all portfolios
	$posttype = new WP_Query( $args );
	
	if($style == 'apiconaadv'){
		
		while( $posttype->have_posts() ){
			
			$posttype->the_post();	
			$id = get_the_ID();
			
			// Portfolio Options
			$portfolio_options = array(	
				'clientname'	=> get_post_meta($id, '_kwayy_'.$type.'_data_clientname', true),
				'clientlink'	=> get_post_meta($id, '_kwayy_'.$type.'_data_clientlink', true),
				'skills'		=> get_post_meta($id, '_kwayy_'.$type.'_data_skills', true),
				'linktext'		=> get_post_meta($id, '_kwayy_'.$type.'_data_linktext', true),
				'linkurl'		=> get_post_meta($id, '_kwayy_'.$type.'_data_linkurl', true),
				
			);
			
			foreach($portfolio_options as $key => $val){
			
				if(!empty($val)){
					update_post_meta( $id, '_thememount_'.$type.'_data_'.$key, $val );
				}
				if($key == 'clientname' && $val !=''){
					update_post_meta( $id, '_thememount_'.$type.'_data_pf_details_line1_title', $val );
				}
				if($key == 'clientlink' && $val !=''){
					update_post_meta( $id, '_thememount_'.$type.'_data_pf_details_line1_link', $val );
				}
				if($key == 'skills' && $val !=''){
					update_post_meta( $id, '_thememount_'.$type.'_data_pf_details_line2_title', $val );
				}
			}
			
		}
		
	} else if($style == 'apicona'){
		
		while( $posttype->have_posts() ){
			
			$posttype->the_post();	
			$id = get_the_ID();
			
			// Portfolio Options
			$portfolio_options = array(	
				'clientname'	=> get_post_meta($id, '_thememount_'.$type.'_data_pf_details_line1_title', true),
				'clientlink'	=> get_post_meta($id, '_thememount_'.$type.'_data_pf_details_line1_link', true),
				'skills'		=> get_post_meta($id, '_thememount_'.$type.'_data_pf_details_line2_title', true),
				'linktext'		=> get_post_meta($id, '_thememount_'.$type.'_data_linktext', true),
				'linkurl'		=> get_post_meta($id, '_thememount_'.$type.'_data_linkurl', true),
			);
			
			foreach($portfolio_options as $key => $val){
				if(!empty($val)){
					update_post_meta( $id, '_kwayy_'.$type.'_data_'.$key, $val );
				}
			}
			
		}
		
	}
	
}
}



/** Helper function to update page and post meta details **/
if( !function_exists('thememount_update_page_post_metadetails') ){
	
function thememount_update_page_post_metadetails( $style, $type='page'){
	
	$args = array(
		'post_type' => $type,
		'posts_per_page' => -1,
		'post_status' => 'publish'
	); 
	
	//get list of all pages / posts
	$posttype = new WP_Query( $args );
	
	if($style == 'apiconaadv'){
		
		while( $posttype->have_posts() ){
			
			$posttype->the_post();	
			$id = get_the_ID();
			
			// options common in pages and posts
			$common_options = array(
				//Titlebar options
				'titlebar_bg_image'			=> get_post_meta($id, '_kwayy_'.$type.'_options_titlebar_bg_image', true),
				'titlebar_bg_image_custom'	=> get_post_meta($id, '_kwayy_'.$type.'_options_titlebar_bg_image_custom', true),
			);
			
			foreach($common_options as $key => $val){
				if($key == 'titlebar_bg_image' && $val == 'custom' && $common_options['titlebar_bg_image_custom'] !=''){
					$newkey = 'titlebar_bg_custom_image';
					$newval = $common_options['titlebar_bg_image_custom'];
					update_post_meta( $id, '_kwayy_'.$type.'_options_'.$newkey, $newval );
				}
			}
			
			// options specific to pages only
			if($type == 'page'){
				
				$page_only_options = array(
			
					// Topbar options
					'topbarhide'		=> get_post_meta($id, '_kwayy_'.$type.'_topbar_topbarhide', true),
					'topbarbgcolor'		=> trim(get_post_meta($id, '_kwayy_'.$type.'_topbar_topbarbgcolor', true)),
					'topbartext'		=> get_post_meta($id, '_kwayy_'.$type.'_topbar_topbartext', true),
				);

				foreach($page_only_options as $key => $val){
				
					// reverse topbarhide value as apicona advanced has reverse option
					if($key == 'topbarhide' && $val=='1' ){
						$reverseval = '0';
						update_post_meta( $id, '_kwayy_'.$type.'_options_show_topbar', $reverseval );
					}else if($key == 'topbarhide' && $val=='0' ){
						$reverseval = '1';
						update_post_meta( $id, '_kwayy_'.$type.'_options_show_topbar', $reverseval );
					}
					
					//topbar bg color
					if($key == 'topbarbgcolor' && $val !=='' && !empty($val)){
						update_post_meta( $id, '_kwayy_page_options_topbarbgcolor', 'custom' );
						update_post_meta( $id, '_kwayy_page_options_topbarbgcustomcolor', $val); 
					}
					
					//topbarlefttext
					if($key == 'topbartext' && $val !==''){
						update_post_meta( $id, '_kwayy_'.$type.'_options_topbarlefttext', $val); 
					}
				
				}
			}
			
		}
		
	}else if($style == 'apicona'){
		
		while( $posttype->have_posts() ){
			
			$posttype->the_post();	
			$id = get_the_ID();
			
			// options common in pages and posts
			$common_options = array(
				//Titlebar options
				'titlebar_bg_custom_image'	=> get_post_meta($id, '_kwayy_'.$type.'_options_titlebar_bg_custom_image', true),
			);
			
			foreach($common_options as $key => $val){
				if($key == 'titlebar_bg_custom_image' && $val != ''){
					$newkey = 'titlebar_bg_image_custom';
					update_post_meta( $id, '_kwayy_'.$type.'_options_titlebar_bg_image', 'custom');
					update_post_meta( $id, '_kwayy_'.$type.'_options_'.$newkey, $val );
				}
			}
			
			// options specific to pages only
			if($type == 'page'){
				
			
				$page_only_options = array(
			
					// Topbar options
					'showtopbar'		=> get_post_meta($id, '_kwayy_'.$type.'_options_show_topbar', true),
					// 'topbarbgcolor'		=> trim(get_post_meta($id, '_kwayy_'.$type.'_topbar_topbarbgcolor', true)),
					'topbarlefttext'	=> get_post_meta($id, '_kwayy_'.$type.'_options_topbarlefttext', true),
					
				);

				foreach($page_only_options as $key => $val){
				
					
					// reverse topbarhide value as apicona advanced has reverse option
					if($key == 'showtopbar' && $val=='1' ){
						$reverseval = '0';
						update_post_meta( $id, '_kwayy_'.$type.'_topbar_topbarhide', $reverseval );
					}else if($key == 'showtopbar' && $val == '0'){
						$reverseval = '1';
						update_post_meta( $id, '_kwayy_'.$type.'_topbar_topbarhide', $reverseval );
					}
					
					//topbarlefttext
					if($key == 'topbarlefttext' && $val !==''){
						update_post_meta( $id, '_kwayy_'.$type.'_topbar_topbartext', $val); 
					}
				
				}
			}
			
		}
	}


	
}

}//end if

