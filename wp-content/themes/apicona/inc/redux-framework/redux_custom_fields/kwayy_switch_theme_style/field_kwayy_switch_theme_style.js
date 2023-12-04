jQuery( document ).ready(function($) {
	
	
	/** New code start by Bimal **/
	jQuery('#thememount-style-switcher-btn').click(function(){
		if( jQuery('#thememount-style-switcher').css('display')=='none' ){
			jQuery('#thememount-style-switcher').slideDown();
			jQuery(this).attr("disabled","true");
		} else {
			jQuery('#thememount-style-switcher').slideUp();
		}
			
		
	});
	
	// Getting current STYLE
	var currstyle = jQuery( 'input#theme-style' ).val();
	
	jQuery( 'a.switch-theme-thumb' ).click(function() {
		jQuery('.switch-theme-data-layout a').removeClass('switch-theme-thumb-active');
		jQuery(this).addClass('switch-theme-thumb-active');
		var style = jQuery(this).data('style');
		
		jQuery( 'input#theme-style' ).val(style);
		
		// enable or disable the process button
		if( style == currstyle ){
			jQuery('#kwayy_switch_theme_style_yes').attr("disabled","true");
		} else {
			jQuery('#kwayy_switch_theme_style_yes').removeAttr("disabled");
		}
		
		return false;
	});
	
	
	jQuery('#kwayy_switch_theme_style_cancel').click(function() {
		jQuery('#thememount-style-switcher-btn').removeAttr("disabled");
		jQuery('#thememount-style-switcher').slideUp();
	});
	
	/** ----------------------- **/
	
	
	
	
	
	
	/*
	jQuery( '#kwayy_switch_theme_style' ).click(function() {
	
		jQuery('#merge-results-wrapper').slideDown();
		$(this).attr('disabled', 'disabled');
		
		/*
		jQuery('.import-demo-data-layout a').removeClass('import-demo-thumb-active');
		jQuery(this).addClass('import-demo-thumb-active');
		
		var layout = jQuery(this).data('layout');
		jQuery( 'input#import-layout-color' ).val(layout);
		return false;
		*/
	/*});*/
	

	

	jQuery('#thememount_save_theme_options').click(function() {
		console.log('clicked me');
		location.reload();
	});
	
	
	
	jQuery('#kwayy_switch_theme_style_yes').click(function(){
	//jQuery(document).on( 'click', '#kwayy_switch_theme_style_yes', function() {

		var button = jQuery(this);
		var resultDiv = jQuery('#tm-style-switcher-results');
		//var resultDiv = jQuery('.switch-theme-data-layout');
		resultDiv.css('display','block');
		
		//var saveThemeOptionsButton = jQuery('#thememount_save_theme_options');
		var style = jQuery( 'input#theme-style' ).val();
		
		resultDiv.addClass('thememount-merge-theme-page-progress');
		
		jQuery.ajax({
			type: 'post',
			url: ajaxurl,
			dataType: "json",
			data: {
				action: 		'apiconaadv_merge_theme_page_options',
				'subaction': 	'start',
				'style': 		style,
				
			},
			beforeSend: function() {
				jQuery('#kwayy_switch_theme_style_yes, #kwayy_switch_theme_style_cancel').attr("disabled","true");
				resultDiv.html('<p id="install-demo-data-started">Starting Merging of Theme Options and Page Options. This page will be refreshed automatically.</p>').show().removeClass('error');
			},
			success: function( result ) {
				
				function mergeoptionsnextstep(result){
					
					if( result != null && typeof( result ) == 'object' ) {
						
						if(result.answer == 'ok'){
						
							resultDiv.append('<p>' + result.message + '</p>');
							
							jQuery.ajax({
								url: ajaxurl,
								type: "POST",
								dataType: "json",
								data: {
									'action'    : 'apiconaadv_merge_theme_page_options',
									'subaction' : result.next_subaction,
									'style'		: style,						
								},
								success: function( result ) {
									mergeoptionsnextstep(result);
								},
								error: function(request, status, error) {
								
									resultDiv.html( '<p><strong style="color: red"> Error: ' + request.status + '</p>' );
									
								}
							});
						}
						
						if(result.answer == 'finished'){
							resultDiv.append('<p>All Finished :)</p>');
							resultDiv.removeClass('thememount-merge-theme-page-progress');
							resultDiv.addClass('thememount-import-demo-success');
							resultDiv.append('<p style="font-weight:bold;"> This page will be refreshed automatically.</p>');
							
							resultDiv.append('<script type="text/javascript">window.setTimeout(function(){window.location.reload()}, 3000);</script>');
							
						}
						
					}else{
						
						resultDiv.append( '<p>Error in object else</p>' );
					
					}
				}
				mergeoptionsnextstep(result);
			},
			error: function(request, status, error) {
				resultDiv.html( '<p><strong style="color: red">: ERRRRROR' + request.status + '</p>' );
			}
		});
		return false;
	});

	
	
}); // document.ready END