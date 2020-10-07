// single product AJAX add to cart
jQuery(document).ready(function($) {
	
	
	var selected_family_1 = jQuery("#google_web_font_family_1 option:selected").text();
	var selected_family_subset_variant_1 = jQuery("#google_web_font_family_variants_and_subsets_1").attr("value") ;
	jQuery('head').append('<link rel="stylesheet" href="//fonts.googleapis.com/css?family=' + selected_family_subset_variant_1 + '" type="text/css" />');
	jQuery('head').append('<style type="text/css">#section-<google_web_font_family_1 .explain{ font-family: "' + selected_family_1 + '"; }</style>');
	
	var selected_family_2 = jQuery("#google_web_font_family_2 option:selected").text();
	var selected_family_subset_variant_2 = jQuery("#google_web_font_family_variants_and_subsets_2").attr("value") ;
	if (selected_family_2 != "") jQuery('head').append('<link rel="stylesheet" href="//fonts.googleapis.com/css?family=' + selected_family_subset_variant_2 + '" type="text/css" />');
	if (selected_family_2 != "") jQuery('head').append('<style type="text/css">#section-google_web_font_family_2 .explain{ font-family: "' + selected_family_2 + '"; }</style>');
	
 	var selected_family_3 = jQuery("#google_web_font_family_3 option:selected").text();
	var selected_family_subset_variant_3 = jQuery("#google_web_font_family_variants_and_subsets_3").attr("value") ;
	if (selected_family_3 != "") jQuery('head').append('<link rel="stylesheet" href="//fonts.googleapis.com/css?family=' + selected_family_subset_variant_3 + '" type="text/css" />');
	if (selected_family_3 != "") jQuery('head').append('<style type="text/css">#section-google_web_font_family_3 .explain{ font-family: "' + selected_family_3 + '"; }</style>');
	
	var selected_family_4 = jQuery("#google_web_font_family_4 option:selected").text();
	var selected_family_subset_variant_4 = jQuery("#google_web_font_family_variants_and_subsets_4").attr("value") ;
	if (selected_family_4 != "") jQuery('head').append('<link rel="stylesheet" href="//fonts.googleapis.com/css?family=' + selected_family_subset_variant_4 + '" type="text/css" />');
	if (selected_family_4 != "") jQuery('head').append('<style type="text/css">#section-google_web_font_family_4 .explain{ font-family: "' + selected_family_4 + '"; }</style>');
	
	
	jQuery('#google_web_font_family_1').change(function() {
		var selected_family = jQuery("#google_web_font_family_1 option:selected").text();
		jQuery.ajax({  
			type : "GET",
			url : my_ajax_object.ajax_url,
			data:'action=brankic_google_web_fonts_handler&value=' + selected_family,			
			success : function(data, textStatus, jqXHR){ 
				var str_length = data.length - 1;
				//mistery
				data = data.substr(0, str_length);
				jQuery("#google_web_font_family_variants_and_subsets_1").attr("value", data) ;
				jQuery('head').append('<link rel="stylesheet" href="//fonts.googleapis.com/css?family=' + data + '" type="text/css" />');
				jQuery('head').append('<style type="text/css">#section-google_web_font_family_1 .explain{ font-family: "' + selected_family + '"; }</style>');
			}  
		 });
	});
	
		jQuery('#google_web_font_family_2').change(function() {
		var selected_family = jQuery("#google_web_font_family_2 option:selected").text();
		jQuery.ajax({  
			type : "GET",
			url : my_ajax_object.ajax_url,
			data:'action=brankic_google_web_fonts_handler&value=' + selected_family,   
			success : function(data, textStatus, jqXHR){
				var str_length = data.length - 1;
				data = data.substr(0, str_length);				
				jQuery("#google_web_font_family_variants_and_subsets_2").attr("value", data) ;
				jQuery('head').append('<link rel="stylesheet" href="//fonts.googleapis.com/css?family=' + data + '" type="text/css" />');
				jQuery('head').append('<style type="text/css">#section-google_web_font_family_2 .explain{ font-family: "' + selected_family + '"; }</style>');
			}  
		 });
	});
	
	jQuery('#google_web_font_family_3').change(function() {
		var selected_family = jQuery("#google_web_font_family_3 option:selected").text();
		jQuery.ajax({  
			type : "GET",
			url : my_ajax_object.ajax_url,
			data:'action=brankic_google_web_fonts_handler&value=' + selected_family,  
			success : function(data, textStatus, jqXHR){ 
				var str_length = data.length - 1;
				data = data.substr(0, str_length);
				jQuery("#google_web_font_family_variants_and_subsets_3").attr("value", data) ;
				jQuery('head').append('<link rel="stylesheet" href="//fonts.googleapis.com/css?family=' + data + '" type="text/css" />');
				jQuery('head').append('<style type="text/css">#section-google_web_font_family_3 .explain{ font-family: "' + selected_family + '"; }</style>');
			}  
		 });
	});
	
	jQuery('#google_web_font_family_4').change(function() {
		var selected_family = jQuery("#google_web_font_family_4 option:selected").text();
		jQuery.ajax({  
			type : "GET",
			url : my_ajax_object.ajax_url,
			data:'action=brankic_google_web_fonts_handler&value=' + selected_family,   
			success : function(data, textStatus, jqXHR){ 
				var str_length = data.length - 1;
				data = data.substr(0, str_length);
				jQuery("#google_web_font_family_variants_and_subsets_4").attr("value", data) ;
				jQuery('head').append('<link rel="stylesheet" href="//fonts.googleapis.com/css?family=' + data + '" type="text/css" />');
				jQuery('head').append('<style type="text/css">#section-google_web_font_family_4 .explain{ font-family: "' + selected_family + '"; }</style>');
			}  
		 });
	});
	
	
	
	
});