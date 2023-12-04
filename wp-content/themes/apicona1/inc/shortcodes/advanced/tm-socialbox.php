<?php
// [tm-socialbox]
if( !function_exists('thememount_sc_social_box') ){
function thememount_sc_social_box( $atts, $content=NULL ){
	
	global $tm_sc_params_socialbox;
	$options_list = tm_create_options_list($tm_sc_params_socialbox);
	
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	$h2 		= $title;
	$h4 		= $subtitle;
	$txt_align 	= $align;
	
	// Extra class name
	$extraClass = '';
	if( isset($options_list['el_class']) && trim($options_list['el_class'])!='' ){
		$extraClass = trim($options_list['el_class']);
		$options_list['el_class'] = '';
	}
	
	$columnclass = 'col-md-3 col-lg-3 col-xs-12';
	switch($column){
		case 'one':
			$columnclass = 'col-md-12 col-lg-12 col-xs-12';
			break;
			
		case 'two':
			$columnclass = 'col-md-6 col-lg-6 col-xs-12';
			break;
		
		case 'three':
			$columnclass = 'col-md-4 col-lg-4 col-xs-12';
			break;
			
		case 'four':
			$columnclass = 'col-md-3 col-lg-3 col-xs-12';
			break;
		
		case 'five':
			$columnclass = 'col-md-20percent col-lg-20percent col-xs-12';
			break;
		
		case 'six':
			$columnclass = 'col-md-4 col-lg-2 col-xs-12';
			break;
		
	}
	
	
	$return = '';
	$return .= tm_vc_element_heading( get_defined_vars() );

	
	
	
	
	
	
	
	// Add/remove separator line below main heading text
	$heading_sep_class = ' tm-heading-with-separator';
	if( $heading_sep=='no' ){
		$heading_sep_class = '';
	}
	
	// Social list
	$sociallist = array(
		'twitter'      => 'Twitter',
		'youtube'      => 'YouTube',
		'flickr'       => 'Flickr',
		'facebook'     => 'Facebook',
		'linkedin'     => 'LinkedIn',
		'gplus'        => 'Google+',
		'yelp'         => 'Yelp',
		'dribbble'     => 'Dribbble',
		'pinterest'    => 'Pinterest',
		'podcast'      => 'Podcast',
		'instagram'    => 'Instagram',
		'xing'         => 'Xing',
		'vimeo'        => 'Vimeo',
		'vk'           => 'VK',
		'houzz'        => 'Houzz',
		'issuu'        => 'Issuu',
		'google-drive' => 'Google Drive',
		'rss'          => 'RSS Feed',
	);
	
	
	
	
	// social service list
	$socialdata = json_decode(urldecode($socialservices));
	$return .= '<div class="tm-socialbox-links-wrapper row multi-columns-row">';
	foreach( $socialdata as $data ){
		
		// Social link
		if( $data->servicename=='rss' ){
			$servicelink = get_bloginfo('rss2_url');
		} else {
			$servicelink = ( isset($data->servicelink) && trim($data->servicelink)!='' ) ? $data->servicelink : '#' ;
		}
		
		// Preparing icon
		$servicename = ( isset($sociallist[$data->servicename]) ) ? $sociallist[$data->servicename] : $data->servicename ;
		$return .= '<div class="tm-socialbox-i-wrapper '.$columnclass.'">';
		$return .= '<a class="tm-socialbox-icon-link tm-socialbox-icon-link-'.$data->servicename.' hint--top" target="_blank" href="'.$servicelink.'" data-hint="'.$servicename.'"><i class="tm-social-icon-'.$data->servicename.'"></i></a>';
		$return .= '</div>';
	}
	$return .= '</div><!-- .tm-socialbox-links-wrapper -->  ';
	
	
	$wrapperStart = '<div class="thememount-socialbox-wrapper tm-socialbox-icon-size-'.$iconsize.' '.$heading_sep_class.' tm-socialbox-column-'.$column.' '.$extraClass.' '.$el_class.'">';
	$wrapperEnd   = '</div>';
	return $wrapperStart.$return.$wrapperEnd;
	
	
}
}
add_shortcode( 'tm-socialbox', 'thememount_sc_social_box' );