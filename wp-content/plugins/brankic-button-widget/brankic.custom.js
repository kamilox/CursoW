(function( $ ) {
	
$(function() {
	
	
function brankic_button_options_show_hide(id, option_select, option_select_value, option_to_show_hide){	
	
	$("[id*='" + id + "'] [data-id$='" + option_select + "']").each(function(){
		
		var widget_id = $(this).closest(".widget").attr("id");
		var selected_option = $(this).find("option:selected").val();
		
		if (option_select_value.includes(selected_option)){
			$(this).closest("p").siblings("[data-id$='" + option_to_show_hide + "']").show(600);
			
		} else {
			$(this).closest("p").siblings("[data-id$='" + option_to_show_hide + "']").hide(600);
		}

	})
	$("[id*='" + id + "'] [data-id$='" + option_select + "']").change(function(i) {
		var widget_id = $(this).closest(".widget").attr("id");
		var selected_option = $(this).find("option:selected").val();

		if (option_select_value.includes(selected_option)){
			$(this).closest("p").siblings("[data-id$='" + option_to_show_hide + "']").show(600);
			
		} else {
			$(this).closest("p").siblings("[data-id$='" + option_to_show_hide + "']").hide(600);
		}

	});
	
}
	
	
	
	
	var wpColorPickerOptions = {
		// you can declare a default color here,
		// or in the data-default-color attribute on the input
		defaultColor: false,
		// a callback to fire whenever the color changes to a valid color
		change: function(event, ui){},
		// a callback to fire when the input is emptied or an invalid color
		clear: function() {},
		// hide the color picker controls on load
		hide: true,
		// show a group of common colors beneath the square
		// or, supply an array of colors to customize further
		palettes: true
	};
	
    
         
        // Add Color Picker to all inputs that have 'color-field' class
        $( '.brankic-button-color-picker' ).wpColorPicker(wpColorPickerOptions);		
 		$(".wp-picker-container button").click(function(e) {
		  $(this).siblings(".wp-picker-input-wrap").find("input.brankic-button-color-picker").trigger('change');
		});
		
		
         
    
	
 	$(this).ajaxComplete( function(e) {
		brankic_button_options_show_hide("brankic_button_widget", "shape", "button-circle play button-circle arrow-link", "arrow_color")
		brankic_button_options_show_hide("brankic_button_widget", "shape", "button-circle play button-circle arrow-link", "arrow_hover_color")
		brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "text_hover_color")
		brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "bg_hover_color")
		brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "bg_hover_color_2")
		brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "border_hover_color")
		brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "border_hover_color_2")
		$('.brankic-button-color-picker').wpColorPicker();
		$(".wp-picker-container button").click(function() {
		  $(this).siblings(".wp-picker-input-wrap").find("input.brankic-button-color-picker").trigger('change');
		});
	});
	
	
	
	


brankic_button_options_show_hide("brankic_button_widget", "shape", "button-circle play button-circle arrow-link", "arrow_color")
brankic_button_options_show_hide("brankic_button_widget", "shape", "button-circle play button-circle arrow-link", "arrow_hover_color")
brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "text_hover_color")
brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "bg_hover_color")
brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "bg_hover_color_2")
brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "border_hover_color")
brankic_button_options_show_hide("brankic_button_widget", "hover", "normal dir-ltr dir-rtl dir-ttb dir-btt", "border_hover_color_2")
});
	
	
})( jQuery );

