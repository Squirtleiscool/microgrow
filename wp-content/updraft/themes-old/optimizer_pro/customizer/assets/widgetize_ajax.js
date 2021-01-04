// Widgetize Page with Sidebar Selection
jQuery(window).bind('load', function($){
	
	if(wp.domReady){
		console.log('Hello World!!!', params);
		wp.domReady( function() {
			setTimeout(function(){ 	
				//Append the Widgetizer html
				jQuery('.edit-post-header').prepend(params.content);
				var settigsWidth = jQuery('.edit-post-header__settings').innerWidth();
				jQuery('#customize_page_panel_new').css('right', settigsWidth);
				
				
				var editorHeight = jQuery('.editor-writing-flow').innerHeight();
				
				jQuery('.page_widgetized').height(editorHeight - 100);
				
				  jQuery('#customize_page_bttn_new').toggle(function(){
						jQuery(this).parent().addClass('active_customize');	
				  },function(){
						jQuery(this).parent().removeClass('active_customize');	
				  });
				  
				  
				      jQuery(".widgetize_btn").click(function() {

						nonce = jQuery("input#optimizer_widgetize_nonce").val();
				
						jQuery.post(
								params.ajaxURL, {
									'action': 'optimizer_widgetizer_new',
									'nonce' : nonce,
									'widgetize_pid': params.pid,
								},
								function(response) {
									console.log('Widgetzed Page!');
									location.reload();
								}
							);
						});
						
						jQuery(".unwidgetize_btn").click(function() {
							nonce = jQuery("input#optimizer_unwidgetize_nonce").val();
					
							jQuery.post(
								params.ajaxURL, {
									'action': 'optimizer_unwidgetizer_new',
									'nonce' : nonce,
									'widgetize_pid': params.pid,
								},
								function(response) {
									console.log('UnWidgetzed Page!');
									location.reload();
								}
							);
						});
	
			}, 6000);
		});
		
	
	}


	
	
    jQuery("#optimizer_widgetize_form").click(function() {
		jQuery('#choose_custom_sidebar').slideUp(300);
        //console.log('Button clicked.');
		nonce = jQuery("input#optimizer_pagemeta_nonce").val();
		
		var pagesidebar = jQuery('#optimizer_widgetize_sidebar').val();
		var pagesidebarpos = jQuery('.page_sidebar_position input:radio:checked').val();
        jQuery.post(
            params.ajaxURL, {
                'action': 'optimizer_widgetize_page',
                'nonce' : nonce,
				'postid': jQuery('#optimizer_widgetize_pageid').val(),
				'pagesidebar': pagesidebar,
            },
            function(response) {
				console.log('Page Meta Updated!');
				jQuery( "#optimizer_widgetize_redirect" ).trigger( "click" );
            }
        );
    });
});