/**
 * Functionality specific to Apicona admin panel.
 *
 * Provides helper functions to enhance the admin experience.
 */

jQuery( document ).ready(function() {
	"use strict";
	
	// Redux: Remove loader on document.ready
	jQuery(".redux-main").css('background','#FCFCFC');
	
	// Redux: Add class for special option
	jQuery( '.redux-container-kwayy_one_click_demo_content' ).parent().parent().addClass('kwayy-special-toption');
	
	// Disable to un-check the FontAwesome library
	jQuery("#apicona_fonticonlibrary_fontawesome_0").attr("disabled","true");
	jQuery("#apicona_fonticonlibrary_fontawesome_0").prop('checked', true);
	
	// Redux: Adding thumb images for background gradient patterns
	var html = '<div class="kwayy-bg-pattern-wrapper"> \
	<ul> \
	<li class="kwayy-bg-pattern-1"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-2"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-3"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-4"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-5"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-6"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-7"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-8"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-9"><a href="#"></a></li> \
	<li class="kwayy-bg-pattern-10"><a href="#"></a></li> \
	</ul> \
	</div>';
	jQuery("#opt-background-position-select").after(html);
	

	jQuery(".kwayy-bg-pattern-wrapper li a").click(function(){
		var Class = jQuery(this).parent().attr('class');
		//console.log(Class);
		var number = Class.replace('kwayy-bg-pattern-','');
		console.log(number);
		return false;
	});
	
	
	// Remove extra BR tag from sidebar option on pages
	var sliderPosWrapper = jQuery('#_kwayy_page_options_sidebarposition_').parent();
	jQuery("br", sliderPosWrapper).remove();
	
	// Set width of sidebar options
	jQuery('#_kwayy_page_options_sidebarposition_').parent().attr('id', 'kwayy_page_options_sidebarposition_wrapper');
	
	
	
	// Icon dropdown in menu
	jQuery("select.edit-menu-item-icon").custom_select2(); 
	jQuery('a.item-edit').on("click",function(){
	//jQuery('a.item-edit').click(function(){
		//alert('TT');
		jQuery("select.edit-menu-item-icon").custom_select2(); 
	});
	
	// Skin Color picker
	if( jQuery('.redux-container-kwayy_skin_color .redux-color').length > 0 ){
		jQuery('.redux-container-kwayy_skin_color .redux-color').wpColorPicker();
	}
	
	// Page Options
	kwayy_pages_slder_options();
	kwayy_post_hide_breadcrumb_options('page');
	jQuery('input[name="cuztom[_kwayy_page_options_slidertype][]"]:radio').change(function(e) {
		kwayy_pages_slder_options();
	});
	jQuery('input[name="cuztom[_kwayy_page_options_hidetitlebar]"],select[name="cuztom[_kwayy_page_options_titlebar_bg_color]"],select[name="cuztom[_kwayy_page_options_titlebar_text_color]"]').change(function(e) {
		kwayy_post_hide_breadcrumb_options('page');
	});
	
	thememount_pages_topbar_bgcolor_options();
	jQuery('select[name="cuztom[_kwayy_page_options_topbarbgcolor]"]').change(function(e) {
		thememount_pages_topbar_bgcolor_options();
	});
	
	thememount_pages_topbar_textcolor_options();
	jQuery('select[name="cuztom[_kwayy_page_options_topbartextcolor]"]').change(function(e) {
		thememount_pages_topbar_textcolor_options();
	});
	
	// Post Options
	kwayy_post_hide_breadcrumb_options('post');
	jQuery('input[name="cuztom[_kwayy_post_options_hidetitlebar]"]').change(function(e) {
		kwayy_post_hide_breadcrumb_options('post');
	});
	
	/** Page Titlebar: Background Image **/
	jQuery('select[name="cuztom[_kwayy_page_options_titlebar_bg_image]"]').change(function(e){
		kwayy_breadcrumb_image_option('page');
	});
	jQuery('select[name="cuztom[_kwayy_post_options_titlebar_bg_image]"]').change(function(e){
		kwayy_breadcrumb_image_option('post');
	});
	
	
	
	// Portfolio Options
	kwayy_portfolio_slder_options();
	jQuery('input[name="cuztom[_kwayy_portfolio_featured_featuredtype][]"]:radio').change(function(e) {
		//console.log('1');
		kwayy_portfolio_slder_options();
		//console.log('2');
	});
	
	// Post Options
	kwayy_post_hide_breadcrumb_options('post');
	jQuery('input[name="cuztom[_kwayy_post_options_hidetitlebar]"], select[name="cuztom[_kwayy_post_options_titlebar_bg_color]"],select[name="cuztom[_kwayy_post_options_titlebar_text_color]"]').change(function(e) {
		kwayy_post_hide_breadcrumb_options('post');
	});
	
	// Skin Selector
	if( jQuery('.kwayy-skin-color-list').length != 0 ){
		jQuery( '.kwayy-skin-color-list a' ).click(function() {
			//console.log('TTTT');
			var color = jQuery(this).css('background-color');
			//console.log(color);
			jQuery('.redux-container-kwayy_skin_color .redux-color-init').iris('color', color);
			return false;
		});
	}

	// Increase or decrease Titlebar height on click of the Header icons
	jQuery('fieldset[data-id="headerstyle"] .redux-image-select img').click(function(){
		var normalHeight  = '145';
		var overlayHeight = '400';
		
		var headerID = jQuery(this).parent().attr('for');
		headerID     = headerID.replace('headerstyle_','');
		
		if( (headerID=='1' || headerID=='2' || headerID=='3' || headerID=='4') ){
			jQuery('div[data-id="tbar-height"]').val(normalHeight);
			jQuery('#tbar-height').val(normalHeight);  // Fallback mode
		} else if( (headerID=='5' || headerID=='6' || headerID=='7' || headerID=='8') ){
			jQuery('div[data-id="tbar-height"]').val(overlayHeight);
			jQuery('#tbar-height').val(overlayHeight);  // Fallback mode
		}
	});
	

});





/* Options show/hide for Post Type: Pages */
function kwayy_pages_slder_options(){
	selected = jQuery('input[name="cuztom[_kwayy_page_options_slidertype][]"]:checked').val();
	
	// Hide all options by default
	jQuery('select[name="cuztom[_kwayy_page_options_revslider_slider]"]').parent().parent().hide();
	jQuery('select[name="cuztom[_kwayy_page_options_slidercat]"]').parent().parent().hide();
	jQuery('input[name="cuztom[_kwayy_page_options_slidersize][]"]').parent().parent().parent().hide();
	jQuery('textarea[name="cuztom[_kwayy_page_options_slider_others]"]').parent().parent().hide();
	jQuery('textarea[name="cuztom[_kwayy_page_options_slideroptions]"]').parent().parent().hide();
	
	if( selected == 'revslider' ){
		jQuery('select[name="cuztom[_kwayy_page_options_revslider_slider]"]').parent().parent().show();
		jQuery('select[name="cuztom[_kwayy_page_options_slidercat]"]').parent().parent().hide();
		jQuery('input[name="cuztom[_kwayy_page_options_slidersize][]"]').parent().parent().parent().show();
	} else if( selected == 'nivo' || selected == 'flex' ){
		jQuery('select[name="cuztom[_kwayy_page_options_revslider_slider]"]').parent().parent().hide();
		jQuery('select[name="cuztom[_kwayy_page_options_slidercat]"]').parent().parent().show();
		jQuery('input[name="cuztom[_kwayy_page_options_slidersize][]"]').parent().parent().parent().show();
		jQuery('textarea[name="cuztom[_kwayy_page_options_slideroptions]"]').parent().parent().show();
	} else if( selected == 'other' ){
		jQuery('textarea[name="cuztom[_kwayy_page_options_slider_others]"]').parent().parent().show();
		jQuery('input[name="cuztom[_kwayy_page_options_slidersize][]"]').parent().parent().parent().show();
	} 
}

// Show custom bg color picker only when the pre color dropdown is set to Custom Color
function thememount_pages_topbar_bgcolor_options(){
	jQuery('label[for="_kwayy_page_options_topbarbgcustomcolor"]').parent().parent().hide();
	var selected = jQuery('select[name="cuztom[_kwayy_page_options_topbarbgcolor]"]').val();
	if( selected == 'custom' ){
		jQuery('label[for="_kwayy_page_options_topbarbgcustomcolor"]').parent().parent().show();
	}
}




// Show custom text color picker only when the text color dropdown is set to Custom Color
function thememount_pages_topbar_textcolor_options(){
	jQuery('label[for="_kwayy_page_options_topbartextcustomcolor"]').parent().parent().hide();
	var selected = jQuery('select[name="cuztom[_kwayy_page_options_topbartextcolor]"]').val();
	if( selected == 'custom' ){
		jQuery('label[for="_kwayy_page_options_topbartextcustomcolor"]').parent().parent().show();
	}
}


/* Options show/hide for Post Type: Portfolio */
function kwayy_portfolio_slder_options(){
	selected = jQuery('input[name="cuztom[_kwayy_portfolio_featured_featuredtype][]"]:checked').val();
	
	// Hide all options by default
	jQuery('textarea[name="cuztom[_kwayy_portfolio_featured_videourl]"]').parent().parent().hide(); // YouTube or Video URL
	jQuery('input[name="cuztom[_kwayy_portfolio_featured_videofile_mp4]"]').parent().parent().hide(); // SoundCloud Embed Code
	jQuery('input[name="cuztom[_kwayy_portfolio_featured_videofile_webm]"]').parent().parent().hide(); // SoundCloud Embed Code
	jQuery('input[name="cuztom[_kwayy_portfolio_featured_videofile_ogv]"]').parent().parent().hide(); // SoundCloud Embed Code
	jQuery('textarea[name="cuztom[_kwayy_portfolio_featured_audiocode]"]').parent().parent().hide(); // SoundCloud Embed Code
	jQuery('input[name="cuztom[_kwayy_portfolio_featured_audiofile_mp3]"]').parent().parent().hide(); // SoundCloud Embed Code
	jQuery('input[name="cuztom[_kwayy_portfolio_featured_audiofile_wav]"]').parent().parent().hide(); // SoundCloud Embed Code
	jQuery('input[name="cuztom[_kwayy_portfolio_featured_audiofile_oga]"]').parent().parent().hide(); // SoundCloud Embed Code
	
	// Hide all images for slider
	for (var i = 1; i <= 10; i++) { jQuery('*[name="cuztom[_kwayy_portfolio_featured_slideimage'+i+']"]').parent().parent().hide(); /* SoundCloud Embed Code */ }
	
	
	if( selected == 'video' ){
		jQuery('textarea[name="cuztom[_kwayy_portfolio_featured_videourl]"]').parent().parent().show(); // YouTube or Video URL
	} else if( selected == 'videoplayer' ){
		jQuery('input[name="cuztom[_kwayy_portfolio_featured_videofile_mp4]"]').parent().parent().show(); // SoundCloud Embed Code
		jQuery('input[name="cuztom[_kwayy_portfolio_featured_videofile_webm]"]').parent().parent().show(); // SoundCloud Embed Code
		jQuery('input[name="cuztom[_kwayy_portfolio_featured_videofile_ogv]"]').parent().parent().show(); // SoundCloud Embed Code
	} else if( selected == 'audioembed' ){
		jQuery('textarea[name="cuztom[_kwayy_portfolio_featured_audiocode]"]').parent().parent().show(); // SoundCloud Embed Code
	} else if( selected == 'audioplayer' ){
		jQuery('input[name="cuztom[_kwayy_portfolio_featured_audiofile_mp3]"]').parent().parent().show(); // SoundCloud Embed Code
		jQuery('input[name="cuztom[_kwayy_portfolio_featured_audiofile_wav]"]').parent().parent().show(); // SoundCloud Embed Code
		jQuery('input[name="cuztom[_kwayy_portfolio_featured_audiofile_oga]"]').parent().parent().show(); // SoundCloud Embed Code
	} else if( selected == 'slider' ){
		// Hide all images for slider
		for (var i = 1; i <= 10; i++) { jQuery('*[name="cuztom[_kwayy_portfolio_featured_slideimage'+i+']"]').parent().parent().show(); /* SoundCloud Embed Code */ }
	}
}


jQuery(window).on('load', function(){
	
	
	
	// Showing image upload box on LOAD
	if( jQuery('#cf-post-format-tabs > ul > li > a.current').attr('href')=='#post-format-gallery' ){
		jQuery('#kwayy_post_gallery').show();
	} else {
		jQuery('#kwayy_post_gallery').hide();
	}
	
	// Showing image uppload box on CLICK
	jQuery('#cf-post-format-tabs > ul > li > a').click(function(){
		if( jQuery(this).attr('href') == '#post-format-gallery' ){
			jQuery('#kwayy_post_gallery').show();
		} else {
			jQuery('#kwayy_post_gallery').hide();
		}
	});
	
});













/* POST: Hide Breadcrumb options */
function kwayy_post_hide_breadcrumb_options( postType ){
		if( postType=='undefined' ){
		postType = 'page';
	}
	if( jQuery('input[name="cuztom[_kwayy_'+postType+'_options_hidetitlebar]"]').length > 0 ){
		
		optionsArray = [
			'titlebar_view',
			'title',
			'subtitle',
			'hidebreadcrumb',
			'titlebar_bg_color',
			'titlebar_bg_custom_color',
			'titlebar_text_color',
			'titlebar_text_custom_color',
			'titlebar_bg_custom_image',
			'titlebar_bg_image',
			'titlebar_bg_image_custom',
		];
		
		if( jQuery('input[name="cuztom[_kwayy_'+postType+'_options_hidetitlebar]"]').is(':checked') ){
			jQuery.each(optionsArray, function( index, value ) {
				// Hide all
				jQuery('#_kwayy_'+postType+'_options_'+value).closest( "tr" ).hide();
			});
			
			
		} else {
			
			jQuery.each(optionsArray, function( index, value ) {
				// Show all
				jQuery('#_kwayy_'+postType+'_options_'+value).closest( "tr" ).show();
			});
			
			// Titlebar BG color
			if( jQuery('#_kwayy_'+postType+'_options_titlebar_bg_color option:selected').val()=='custom' ){
				jQuery('#_kwayy_'+postType+'_options_titlebar_bg_custom_color').closest( "tr" ).show();
			} else {
				jQuery('#_kwayy_'+postType+'_options_titlebar_bg_custom_color').closest( "tr" ).hide();
			}
			
			// Titlebar text color
			if( jQuery('#_kwayy_'+postType+'_options_titlebar_text_color option:selected').val()=='custom' ){
				jQuery('#_kwayy_'+postType+'_options_titlebar_text_custom_color').closest( "tr" ).show();
			} else {
				jQuery('#_kwayy_'+postType+'_options_titlebar_text_custom_color').closest( "tr" ).hide();
			}
		}
	}
}


			

function kwayy_breadcrumb_image_option(postType){
	console.log('Hii');
	// Custom Background image for Titlebar
	if( jQuery('select[name="cuztom[_kwayy_'+postType+'_options_titlebar_bg_image]"]').length > 0 ){
		if( jQuery('select[name="cuztom[_kwayy_'+postType+'_options_titlebar_bg_image]"]').val() == 'custom' ){
			jQuery('input[name="cuztom[_kwayy_'+postType+'_options_titlebar_bg_image_custom]"]').closest( "tr" ).show();
		} else {
			jQuery('input[name="cuztom[_kwayy_'+postType+'_options_titlebar_bg_image_custom]"]').closest( "tr" ).hide();
		}
	}
}