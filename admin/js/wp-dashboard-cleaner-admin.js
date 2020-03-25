jQuery(document).ready(function(e) {
	
	/* WordPress Default Widgets */
	jQuery("#SaveWPDCData").click(function(e) {
		
		var WPH_FORM_DATA =  jQuery( "#wpdc_form" ).serializeArray();
		WPH_FORM_DATA.push({ name: "action", value: "save_wpdc_value" });
		
		 jQuery.ajax({
			 type : "post",
			 dataType : "json",
			 url : wpdcAjax.ajaxurl,
			 data : WPH_FORM_DATA,
			 success: function(response) {
				jQuery(".wpdc_message").show();
				window.location=wpdcAjax.wpdcurl+'&res=suc';
			 }
		  })   
    });
	
	/* Other Popuplar Plugins Widgets */
	jQuery("#SaveWPDCOtherData").click(function(e) {
		
		var WPH_OTHER_FORM_DATA =  jQuery( "#wpdc_form_other" ).serializeArray();
		WPH_OTHER_FORM_DATA.push({ name: "action", value: "save_wpdc_other_value" });
		
		 jQuery.ajax({
			 type : "post",
			 dataType : "json",
			 url : wpdcAjax.ajaxurl,
			 data : WPH_OTHER_FORM_DATA,
			 success: function(response) {
				jQuery(".wpdc_message").show();
				window.location=wpdcAjax.wpdcurl+'&res=suc';
			 }
		  })   
		
    });
	
});