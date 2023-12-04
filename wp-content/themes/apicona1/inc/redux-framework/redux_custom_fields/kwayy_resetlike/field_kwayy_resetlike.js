jQuery( document ).ready(function($) {
	/*jQuery( 'a.import-demo-thumb' ).click(function() {
		
		jQuery('.import-demo-data-layout a').removeClass('import-demo-thumb-active');
		jQuery(this).addClass('import-demo-thumb-active');
		
		var layout = jQuery(this).data('layout');
		jQuery( 'input#import-layout-color' ).val(layout);
		return false;
	});*/
	
	
	// Show conformation box
	jQuery('#kwayy_resetlike_btn_caller').click(function() {
		if( jQuery(this).attr('disabled') == 'disabled' ) {
			return false;
		}
		jQuery(this).attr('disabled','disabled');
		jQuery('#tm-resetlike-wrapper').slideDown();
		return false;
	});
	
	
	// NO link
	jQuery('#kwayy_resetlike_btn_no').click(function() {
		jQuery('#tm-resetlike-wrapper').slideUp();
		jQuery('#kwayy_resetlike_btn_caller').removeAttr('disabled');
		return false;
	});
	
	
	
	
	jQuery('#kwayy_resetlike_btn').click(function() {
		
		if( jQuery(this).attr('disabled') == 'disabled' ) {
			return false;
		}
		jQuery('#tm-resetlike-wrapper').slideDown();
		
		var button = jQuery(this);
		var resultDiv = jQuery('#tm-resetlike-results');
		
		resultDiv.addClass('tm-resetlike-progress'); // Adding loader class
		resultDiv.removeClass('tm-resetlike-success');
		
		
		
		
		// Layout Color
		//var color = jQuery('#import-layout-color').val();
		
		$.ajax({
			url: ajaxurl,
			type: "POST",
			dataType: "json",
			data: {
				'action'    : 'kwayy_resetlike',
				//'color'     : color,
				'subaction' : 'start'
			},
			beforeSend: function() {
				resultDiv.removeClass('error').html('<p id="tm-resetlike-started">Resetting LIKE counts...</p>').show();
			},
			success: function( result ) {
				function demoInstallerStep( result ) {
					if( result != null && typeof( result ) == 'object' ) {
						if( result.answer == 'finished' ) {
							resultDiv.append(result.content);
							resultDiv.addClass('tm-resetlike-success');
						}
					}
				}
				demoInstallerStep( result );
		
			},
			error: function(request, status, error) {
				//resultDiv.html( '<p><strong style="color: red">' + remouldVars.strError + ": " + request.status + '</p>' );
				resultDiv.html( '<p><strong style="color: red">: ERRRRROR' + request.status + '</p>' );
				//button.removeAttr('disabled');
			}
		});
		
		return false;
	
	
	
	
		/*
		var data = {
			'action'                : 'kwayy_one_click_demo',
			'startdemoinstallation' : 'true'
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(ajaxurl, data, function(response) {
		
			//console.log('Ajax URL: ' + ajaxurl);
			console.log('Got this from the server: ' + response);
			//alert('Got this from the server: ' + response);
		});
		*/
	});





	
	
}); // document.ready END
