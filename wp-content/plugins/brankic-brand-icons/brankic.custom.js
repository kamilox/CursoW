(function( $ ) {
	
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
	
    $(function() {
         
        // Add Color Picker to all inputs that have 'color-field' class
        $( '.brankic-icons-color-picker' ).wpColorPicker(wpColorPickerOptions);		
 		$(".wp-picker-container button").click(function(e) {
		  $(this).siblings(".wp-picker-input-wrap").find("input.brankic-icons-color-picker").trigger('change');
		});
		
		
         
    });
	
 	$(this).ajaxComplete( function(e) {
		$('.brankic-icons-color-picker').wpColorPicker();
		$(".wp-picker-container button").click(function() {
		  $(this).siblings(".wp-picker-input-wrap").find("input.brankic-icons-color-picker").trigger('change');
		});
	});
	
	
	
/* 	var selected_option = $("[name$='[icon_shape]']").find("option:selected").val();
	if (selected_option == "default" || selected_option == "circle" || selected_option == "diamond" ||selected_option == "rectangle"){
		$(this).parent("p").siblings("[data-id$='icon_style']").show(600);
		$(this).parent("p").siblings("[data-id$='icon_hover']").show(600);
		$(this).parent("p").siblings("[data-id$='icon_hover_color']").show(600);
		
	} else {
		$(this).parent("p").siblings("[data-id$='icon_style']").hide(600);
		$(this).parent("p").siblings("[data-id$='icon_hover']").hide(600);
		$(this).parent("p").siblings("[data-id$='icon_hover_color']").hide(600);
	} */
	
	$("[data-id$='icon_shape']").each(function(){
		var selected_option = $(this).find("option:selected").val();
		if (selected_option == "default" || selected_option == "circle" || selected_option == "diamond" ||selected_option == "rectangle"){
			$(this).siblings("[data-id$='icon_style']").show(600);
			$(this).siblings("[data-id$='icon_hover']").show(600);
			$(this).siblings("[data-id$='icon_hover_color']").show(600);
			$(this).siblings("[data-id$='icon_bg_hover_color']").show(600);
			
		} else {
			$(this).siblings("[data-id$='icon_style']").hide(600);
			$(this).siblings("[data-id$='icon_hover']").hide(600);
			$(this).siblings("[data-id$='icon_hover_color']").hide(600);
			$(this).siblings("[data-id$='icon_bg_hover_color']").hide(600);
		}

	})
	$("[data-id$='icon_hover']").each(function(){
		var selected_option = $(this).find("option:selected").val();
		if (selected_option == "full-color-hover"){
			$(this).siblings("[data-id$='icon_bg_hover_color']").show(600);
			
		} else {
			$(this).siblings("[data-id$='icon_bg_hover_color']").hide(600);
		}

	})
	
	$("[name$='[icon_shape]']").change(function(i) {
		var selected_option = $(this).find("option:selected").val();
		if (selected_option == "default" || selected_option == "circle" || selected_option == "diamond" ||selected_option == "rectangle"){
			$(this).parent("p").siblings("[data-id$='icon_style']").show(600);
			$(this).parent("p").siblings("[data-id$='icon_hover']").show(600);
			$(this).parent("p").siblings("[data-id$='icon_hover_color']").show(600);
			$(this).parent("p").siblings("[data-id$='icon_bg_hover_color']").show(600);
			
		} else {
			$(this).parent("p").siblings("[data-id$='icon_style']").hide(600);
			$(this).parent("p").siblings("[data-id$='icon_hover']").hide(600);
			$(this).parent("p").siblings("[data-id$='icon_hover_color']").hide(600);
			$(this).parent("p").siblings("[data-id$='icon_bg_hover_color']").hide(600);
		}

	});
	$("[name$='[icon_hover]']").change(function(i) {
		var selected_option = $(this).find("option:selected").val();
		if (selected_option == "full-color-hover"){
			$(this).parent("p").siblings("[data-id$='icon_bg_hover_color']").show(600);			
		} else {
			$(this).parent("p").siblings("[data-id$='icon_bg_hover_color']").hide(600);
		}

	});
	
	
})( jQuery );

