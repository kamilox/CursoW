jQuery(document).ready(function($) {
	
//add wrapper around 
var groups = [
	"default_paddings",
	"smooth_scroll",
	"instagram_options",
	"scroll_indicator",
	"scroll_indicator_2",
	"customize_cursor",
	"link_colors",
  "tag_colors",
  "tag_colors_ss",
  "link_quote",
  "highlight_colors",
  "sidebar_link",
  "lateral_toggle_flex",
  "lateral_toggle_left",
  "lateral_left",
  "footer_paddings",
  "footer_2_paddings",
  "portfolio_item_paddings",
  "extra_header_padding_top_bottom",
  "default_header_padding_top_bottom",
  "default_header_gradient",
  "extra_header_gradient",
  "footer_gradient",
  "footer_2_gradient",
  "footer_1_colors",
  "footer_2_colors",
  "single_post_padding",
  "single_post_paddings",
  "archive_padding",
  "extra_header_options",
  "archive_navigation_colors",
  "archive_checkboxes",
  "comment_form_button_text",
  "comment_form_bg_color",
  "comment_form_bg_hover_color",
  "single_sidebar_link",
  "mobile_colors",
  "mobile_widget_colors",
  "mobile_fonts",
  "woo_paddings",
  "woo_shop_paddings",
  "woo_account_paddings",
  "woo_single_paddings",
  "mobile_bg_style",
  "mobile_alignment",
  "mobile_menu_gradient",
  "woo_color_scheme",
  "woo_text_color_scheme",
  "default_header_font",
  "default_header_submenu_font",
  "extra_default_visible"
  
];

groups.forEach(group_function);

function group_function(value) {
  jQuery( ".group_options." + value ).wrapAll('<div class="compact_section ' + value + '" id="' + value + '"></div>');
}


jQuery(".remove_wrapper").each(function(){
	var id_to_move = jQuery(this).attr("id")
	jQuery(this).find("h4").attr("id", id_to_move)
})

jQuery(".remove_wrapper h4").unwrap();

jQuery(".section .explain").each(function(){
	var explain_div_html = $(this).html();

	$(this).parents(".section").find("h4.heading").after("<div class='explain'>" + explain_div_html + "</div>");
	
	$(this).parents(".section").find("h4.heading, .explain").wrapAll('<div class="heading_wrapper" />')
	
	$(this).remove();
})

jQuery(".compact_section h4.heading").each(function(){
	$(this).wrap('<div class="heading_wrapper" />');
})

jQuery(".compact_section").each(function(){
	var cols = "";
	if ($(this).find(".column-2").length > 0) cols = "col-2";
	if ($(this).find(".column-3").length > 0) cols = "col-3";
	if ($(this).find(".column-4").length > 0) cols = "col-4";
	$(this).find(".wrap_it").wrapAll( '<div class="brankic_wrap ' + cols + '"></div>' );
	
	
	
	
	
})

jQuery(".section .option").each(function(){
	$(this).wrapAll( '<div class="brankic_wrap"></div>' );
})



jQuery(window).load(function() { 

	var header_styles = new Array("Default header", "Lateral Left", "Lateral Toggle Flex", "Lateral Toggle Left");
	jQuery("#section-header_style img").each(function(i){
		$(this).wrapAll('<div class="image_label_wrapper"></div>')
		$(this).after("<div class='image_label'>" + header_styles[i] + "</div>");
	})
	
	var default_header_layouts = new Array("Logo Menu Widget", "Menu Logo Widget", "Logo 3Lines Widget", "3Lines Logo Widget", "Widget Logo 3Lines", "Logo Menu", "Menu Logo", "Menu Widget", "Widget Menu", "Logo 3Lines", "3Lines Logo", "Menu");
	jQuery("#section-default_header_layout img").each(function(i){
		$(this).wrapAll('<div class="image_label_wrapper"></div>')
		$(this).after("<div class='image_label'>" + default_header_layouts[i] + "</div>");
	})
	
	var extra_header_layouts = new Array("Widget Widget Widget", "Widget Widget Logo", "Widget Logo Widget", "Logo Widget Widget", "Widget Widget", "Widget Logo", "Logo Widget", "Logo", "Widget");
	jQuery("#section-extra_header_layout img").each(function(i){
		$(this).wrapAll('<div class="image_label_wrapper"></div>')
		$(this).after("<div class='image_label'>" + extra_header_layouts[i] + "</div>");
	})
	
	var default_header_3lines_overlays = new Array("Flow", "Overlay Background Image", "Overlay Background Color", "Lateral Toggle Right", "Lateral Toggle Left", "Lateral Toggle Top");
	jQuery("#section-default_header_3lines_overlay img").each(function(i){
		$(this).wrapAll('<div class="image_label_wrapper"></div>')
		$(this).after("<div class='image_label'>" + default_header_3lines_overlays[i] + "</div>");
	})
	
	var footer_layouts = new Array("1/1", "1/2 + 1/2", "1/2 + 1/6 + 1/6 + 1/6", "2/3 + 1/3", "1/3 + 2/3", "1/3 + 1/3 + 1/3", "1/4 + 1/4 + 1/4 + 1/4", "1/4 + 3/4", "3/4 + 1/4", "1/4 + 1/2 + 1/4", "5/6 + 1/6", "1/6 + 5/6", "1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6", "1/6 + 2/3 + 1/6", "1/6 + 1/6 + 1/6 + 1/2");
	jQuery("#section-footer_layout img").each(function(i){
		$(this).wrapAll('<div class="image_label_wrapper"></div>')
		$(this).after("<div class='image_label'>" + footer_layouts[i] + "</div>");
	})
	
	var footer_2_layouts = new Array("1/1", "1/2 + 1/2", "1/2 + 1/6 + 1/6 + 1/6", "2/3 + 1/3", "1/3 + 2/3", "1/3 + 1/3 + 1/3", "1/4 + 1/4 + 1/4 + 1/4", "1/4 + 3/4", "3/4 + 1/4", "1/4 + 1/2 + 1/4", "5/6 + 1/6", "1/6 + 5/6", "1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6", "1/6 + 2/3 + 1/6", "1/6 + 1/6 + 1/6 + 1/2");
	jQuery("#section-footer_2_layout img").each(function(i){
		$(this).wrapAll('<div class="image_label_wrapper"></div>')
		$(this).after("<div class='image_label'>" + footer_2_layouts[i] + "</div>");
	})


	
	
	
	
	
	
	
	
})

function options_show_hide(option_id, option_value, option_to_show_hide, option_id_2, option_value_2, option_id_3, option_value_3){
		
	if (option_id !== undefined && option_value !== undefined && option_id_2 === undefined && option_value_2 === undefined && option_id_3 === undefined && option_value_3 === undefined) {

		var selected_option = jQuery("#" + option_id + " option:selected").val();
		
		var selected_option_radio_image = jQuery("[name='myriadwp\\[" + option_id + "\\]']:checked").attr("id");

		if (selected_option_radio_image != undefined) {
			var n = selected_option_radio_image.lastIndexOf("_") + 1;
			selected_option_radio_image = selected_option_radio_image.substr(n);
			selected_option = selected_option_radio_image
		}
		
		var selected_radio_yes = jQuery("#myriadwp-" + option_id + "-yes:checked").val();
		var selected_radio_no = jQuery("#myriadwp-" + option_id + "-no:checked").val();
		if (option_value.includes(selected_option) || option_value.includes(selected_option_radio_image) || option_value == selected_radio_yes || option_value == selected_radio_no){
			jQuery("#section-" + option_to_show_hide).show().removeClass("hidden");
			jQuery("#" + option_to_show_hide).show().removeClass("hidden"); // for info block
			jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
			
		
		} else {
			jQuery("#section-" + option_to_show_hide).hide().addClass("hidden");
			jQuery("#" + option_to_show_hide).hide().addClass("hidden"); // for info block
			jQuery(".compact_section." + option_to_show_hide).hide().addClass("hidden"); // for left captions for compact_section

		}
	
		jQuery("[name='myriadwp[" + option_id + "]']").change(function() {
			var selected_option = jQuery("#" + option_id + " option:selected").val();
			var selected_radio_yes = jQuery("#myriadwp-" + option_id + "-yes:checked").val();
			var selected_radio_no = jQuery("#myriadwp-" + option_id + "-no:checked").val();

			if (option_value.includes(selected_option) || option_value == selected_radio_yes || option_value == selected_radio_no){
				jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
				jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
				jQuery(".compact_section." + option_to_show_hide).show(600).removeClass("hidden").css("display", "flex");  // for left captions for compact_section
				
			} else {
				jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
				jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
				jQuery(".compact_section." + option_to_show_hide).hide(600).addClass("hidden");  // for left captions for compact_section
				
			}
		});
		
		
		jQuery("#section-" + option_id + " img").click(function() {
			
		
			var selected_option_radio_image = jQuery("[name='myriadwp\\[" + option_id + "\\]']:checked").attr("id");
			
			
			
			if (selected_option_radio_image != undefined) {

			
				if (selected_option_radio_image != undefined) {
					var n = selected_option_radio_image.lastIndexOf("_") + 1;
					selected_option_radio_image = selected_option_radio_image.substr(n);
					selected_option = selected_option_radio_image
				}
		
				
				if ((option_value.includes(selected_option))){
					jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
					jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
					
				} else {
					jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
					jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
				}
			
			}
		
		})
		
	} 
	
	if (option_id !== undefined && option_value !== undefined && option_id_2 !== undefined && option_value_2 !== undefined && option_id_3 === undefined && option_value_3 === undefined) {
		
		

		var selected_option = jQuery("#" + option_id + " option:selected").val();
		var selected_option_2 = jQuery("#" + option_id_2 + " option:selected").val();
		
		var selected_option_radio_image = jQuery("[name='myriadwp\\[" + option_id + "\\]']:checked").attr("id");
		var selected_option_radio_image_2 = jQuery("[name='myriadwp\\[" + option_id_2 + "\\]']:checked").attr("id");
		

		if (selected_option_radio_image != undefined) {
			var n = selected_option_radio_image.lastIndexOf("_") + 1;
			selected_option_radio_image = selected_option_radio_image.substr(n);
			selected_option = selected_option_radio_image
		}
		
		if (selected_option_radio_image_2 != undefined) {
			var n = selected_option_radio_image_2.lastIndexOf("_") + 1;
			selected_option_radio_image_2 = selected_option_radio_image_2.substr(n);
			selected_option_2 = selected_option_radio_image_2
		}
		
		var selected_radio_yes = jQuery("#myriadwp-" + option_id + "-yes:checked").val();
		var selected_radio_no = jQuery("#myriadwp-" + option_id + "-no:checked").val();
		var selected_radio_yes_2 = jQuery("#myriadwp-" + option_id_2 + "-yes:checked").val();
		var selected_radio_no_2 = jQuery("#myriadwp-" + option_id_2 + "-no:checked").val();
		
		
		if ((option_value.includes(selected_option) || option_value == selected_radio_yes || option_value == selected_radio_no) && (option_value_2.includes(selected_option_2) || option_value_2 == selected_radio_yes_2 || option_value_2 == selected_radio_no_2) ){
			jQuery("#section-" + option_to_show_hide).show().removeClass("hidden");
			jQuery("#" + option_to_show_hide).show().removeClass("hidden"); // for info block
			jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
			if (option_to_show_hide == "lateral_toggle_left_top_padding") jQuery(".compact_section.lateral_toggle_left").show();
			if (option_to_show_hide == "lateral_toggle_flex_top_padding") jQuery(".compact_section.lateral_toggle_flex").show();
			if (option_to_show_hide == "lateral_left_top_padding") jQuery(".compact_section.lateral_left").show();
			
		} else {
			jQuery("#section-" + option_to_show_hide).hide().addClass("hidden");
			jQuery("#" + option_to_show_hide).hide().addClass("hidden"); // for info block
			if (option_to_show_hide == "lateral_toggle_left_top_padding") jQuery(".compact_section.lateral_toggle_left").hide();
			if (option_to_show_hide == "lateral_toggle_flex_top_padding") jQuery(".compact_section.lateral_toggle_flex").hide();
			if (option_to_show_hide == "lateral_left_top_padding") jQuery(".compact_section.lateral_left").hide();
		}
		

		jQuery("[name='myriadwp[" + option_id + "]']").change(function() {
			
			
			var selected_option = jQuery("#" + option_id + " option:selected").val();
			var selected_option_2 = jQuery("#" + option_id_2 + " option:selected").val();
			var selected_radio_yes = jQuery("#myriadwp-" + option_id + "-yes:checked").val();
			var selected_radio_no = jQuery("#myriadwp-" + option_id + "-no:checked").val();
			var selected_radio_yes_2 = jQuery("#myriadwp-" + option_id_2 + "-yes:checked").val();
			var selected_radio_no_2 = jQuery("#myriadwp-" + option_id_2 + "-no:checked").val();
			
			if ((option_value.includes(selected_option) || option_value == selected_radio_yes || option_value == selected_radio_no) && (option_value_2.includes(selected_option_2)  || option_value.includes(selected_option_radio_image_2) || option_value_2 == selected_radio_yes_2 || option_value_2 == selected_radio_no_2) ){
				jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
				jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
				jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
				if (option_to_show_hide == "lateral_toggle_left_top_padding") jQuery(".compact_section.lateral_toggle_left").show(600);
				if (option_to_show_hide == "lateral_toggle_flex_top_padding") jQuery(".compact_section.lateral_toggle_flex").show(600);
				if (option_to_show_hide == "lateral_left_top_padding") jQuery(".compact_section.lateral_left").show(600);
				
			} else {
				jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
				jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
				if (option_to_show_hide == "lateral_toggle_left_top_padding") jQuery(".compact_section.lateral_toggle_left").hide(600);
				if (option_to_show_hide == "lateral_toggle_flex_top_padding") jQuery(".compact_section.lateral_toggle_flex").hide(600);
				if (option_to_show_hide == "lateral_left_top_padding") jQuery(".compact_section.lateral_left").hide(600);
			}
		});
		
		
		
		jQuery("#section-" + option_id + " img, #section-" + option_id_2 + " img").click(function() {
			
	
			var selected_option_radio_image = jQuery("[name='myriadwp\\[" + option_id + "\\]']:checked").attr("id");
			var selected_option_radio_image_2 = jQuery("[name='myriadwp\\[" + option_id_2 + "\\]']:checked").attr("id");
			
			if (selected_option_radio_image_2 != undefined || selected_option_radio_image != undefined) {
			
				if (selected_option_radio_image != undefined) {
					var n = selected_option_radio_image.lastIndexOf("_") + 1;
					selected_option_radio_image = selected_option_radio_image.substr(n);
					selected_option = selected_option_radio_image
				}
				
				if (selected_option_radio_image_2 != undefined) {
					var n = selected_option_radio_image_2.lastIndexOf("_") + 1;
					selected_option_radio_image_2 = selected_option_radio_image_2.substr(n);
					selected_option_2 = selected_option_radio_image_2
				}
				
				
				if ((option_value.includes(selected_option)) && (option_value_2.includes(selected_option_2)) ){
					jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
					jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
					jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
					
				} else {
					jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
					jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
				}
			
			}
		
		})
		
		
		jQuery("[name='myriadwp[" + option_id_2 + "]']").change(function() {
			var selected_option = jQuery("#" + option_id + " option:selected").val();
			var selected_option_2 = jQuery("#" + option_id_2 + " option:selected").val();
			var selected_radio_yes = jQuery("#myriadwp-" + option_id + "-yes:checked").val();
			var selected_radio_no = jQuery("#myriadwp-" + option_id + "-no:checked").val();
			var selected_radio_yes_2 = jQuery("#myriadwp-" + option_id_2 + "-yes:checked").val();
			var selected_radio_no_2 = jQuery("#myriadwp-" + option_id_2 + "-no:checked").val();
			//alert(option_id_2 + " + " + option_value_2 + " + " + selected_option_2 + " + " + selected_radio_yes_2 + " + " + selected_radio_no_2 + " show hide:" + option_to_show_hide)
			
			if ((option_value.includes(selected_option) || option_value == selected_radio_yes || option_value == selected_radio_no) && (option_value_2.includes(selected_option_2) || option_value_2 == selected_radio_yes_2 || option_value_2 == selected_radio_no_2) ){
			//if (option_value_2.includes(selected_option_2) && option_value.includes(selected_option)){
				jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
				jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
				jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
				if (option_to_show_hide == "lateral_toggle_left_top_padding") jQuery(".compact_section.lateral_toggle_left").show(600);
				if (option_to_show_hide == "lateral_toggle_flex_top_padding") jQuery(".compact_section.lateral_toggle_flex").show(600);
				if (option_to_show_hide == "lateral_left_top_padding") jQuery(".compact_section.lateral_left").show(600);
				
			} else {
				jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
				jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
				if (option_to_show_hide == "lateral_toggle_left_top_padding") jQuery(".compact_section.lateral_toggle_left").hide(600);
				if (option_to_show_hide == "lateral_toggle_flex_top_padding") jQuery(".compact_section.lateral_toggle_flex").hide(600);
				if (option_to_show_hide == "lateral_left_top_padding") jQuery(".compact_section.lateral_left").hide(600);
				//if (option_to_show_hide == "extra_header_menu_always_visible") jQuery(".compact_section.extra_default_visible").hide(600);
				
			}
		});
		
		
	}
	
	if (option_id !== undefined && option_value !== undefined && option_id_2 !== undefined && option_value_2 !== undefined && option_id_3 !== undefined && option_value_3 !== undefined) {
		
		// (1 && 2) || 3
		
		var selected_option = jQuery("#" + option_id + " option:selected").val();
		var selected_option_2 = jQuery("#" + option_id_2 + " option:selected").val();
		var selected_option_3 = jQuery("#" + option_id_3 + " option:selected").val();
		
		
		var selected_option_radio_image = jQuery("[name='myriadwp\\[" + option_id + "\\]']:checked").attr("id");
		var selected_option_radio_image_2 = jQuery("[name='myriadwp\\[" + option_id_2 + "\\]']:checked").attr("id");
		var selected_option_radio_image_3 = jQuery("[name='myriadwp\\[" + option_id_3 + "\\]']:checked").attr("id");
		

		if (selected_option_radio_image != undefined) {
			var n = selected_option_radio_image.lastIndexOf("_") + 1;
			selected_option_radio_image = selected_option_radio_image.substr(n);
			selected_option = selected_option_radio_image
		}
		
		if (selected_option_radio_image_2 != undefined) {
			var n = selected_option_radio_image_2.lastIndexOf("_") + 1;
			selected_option_radio_image_2 = selected_option_radio_image_2.substr(n);
			selected_option_2 = selected_option_radio_image_2
		}
		
		if (selected_option_radio_image_3 != undefined) {
			var n = selected_option_radio_image_3.lastIndexOf("_") + 1;
			selected_option_radio_image_3 = selected_option_radio_image_3.substr(n);
			selected_option_3 = selected_option_radio_image_3
		}
		
		
		
		
		if ((option_value.includes(selected_option) && option_value_2.includes(selected_option_2)) || option_value_3.includes(selected_option_3)){
			jQuery("#section-" + option_to_show_hide).show().removeClass("hidden");
			jQuery("#" + option_to_show_hide).show().removeClass("hidden"); // for info block
			jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
			
		} else {
			jQuery("#section-" + option_to_show_hide).hide().addClass("hidden");
			jQuery("#" + option_to_show_hide).hide().addClass("hidden"); // for info block
		}
	
		jQuery("[name='myriadwp[" + option_id + "]']").change(function() {
			//alert(666)
			var selected_option = jQuery("#" + option_id + " option:selected").val();
			var selected_option_2 = jQuery("#" + option_id_2 + " option:selected").val();
			var selected_option_3 = jQuery("#" + option_id_3 + " option:selected").val();
			if ((option_value.includes(selected_option) && option_value_2.includes(selected_option_2)) || option_value_3.includes(selected_option_3)){
				jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
				jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
				jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
				
			} else {
				jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
				jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
			}
		});
		
		jQuery("[name='myriadwp[" + option_id_2 + "]']").change(function() {
			//alert(777)
			var selected_option = jQuery("#" + option_id + " option:selected").val();
			var selected_option_2 = jQuery("#" + option_id_2 + " option:selected").val();
			var selected_option_3 = jQuery("#" + option_id_3 + " option:selected").val();
			if ((option_value.includes(selected_option) && option_value_2.includes(selected_option_2)) || option_value_3.includes(selected_option_3)){
				jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
				jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
				jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
				
			} else {
				jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
				jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
			}
		});
		
		jQuery("[name='myriadwp[" + option_id_3 + "]']").change(function() {
			//alert(777)
			var selected_option = jQuery("#" + option_id + " option:selected").val();
			var selected_option_2 = jQuery("#" + option_id_2 + " option:selected").val();
			var selected_option_3 = jQuery("#" + option_id_3 + " option:selected").val();
			if ((option_value.includes(selected_option) && option_value_2.includes(selected_option_2)) || option_value_3.includes(selected_option_3)){
				jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
				jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
				jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
				
			} else {
				jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
				jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
			}
		});
		
		
		jQuery("#section-" + option_id + " img, #section-" + option_id_2 + " img, #section-" + option_id_3 + " img").click(function() {
			
			var selected_option_radio_image = jQuery("[name='myriadwp\\[" + option_id + "\\]']:checked").attr("id");
			var selected_option_radio_image_2 = jQuery("[name='myriadwp\\[" + option_id_2 + "\\]']:checked").attr("id");
			var selected_option_radio_image_3 = jQuery("[name='myriadwp\\[" + option_id_3 + "\\]']:checked").attr("id");
			
			if (selected_option_radio_image_3 != undefined || selected_option_radio_image_2 != undefined || selected_option_radio_image != undefined) {
			
				if (selected_option_radio_image != undefined) {
					var n = selected_option_radio_image.lastIndexOf("_") + 1;
					selected_option_radio_image = selected_option_radio_image.substr(n);
					selected_option = selected_option_radio_image
				}
				
				if (selected_option_radio_image_2 != undefined) {
					var n = selected_option_radio_image_2.lastIndexOf("_") + 1;
					selected_option_radio_image_2 = selected_option_radio_image_2.substr(n);
					selected_option_2 = selected_option_radio_image_2
				}
				
				if (selected_option_radio_image_3 != undefined) {
					var n = selected_option_radio_image_3.lastIndexOf("_") + 1;
					selected_option_radio_image_3 = selected_option_radio_image_3.substr(n);
					selected_option_3 = selected_option_radio_image_3
				}
				
				
				if ((option_value.includes(selected_option) && option_value_2.includes(selected_option_2)) || option_value_3.includes(selected_option_3)){
					jQuery("#section-" + option_to_show_hide).show(600).removeClass("hidden");
					jQuery("#" + option_to_show_hide).show(600).removeClass("hidden"); // for info block
					jQuery(".compact_section." + option_to_show_hide).show().removeClass("hidden").css("display", "flex"); // for left captions for compact_section
					
				} else {
					jQuery("#section-" + option_to_show_hide).hide(600).addClass("hidden");
					jQuery("#" + option_to_show_hide).hide(600).addClass("hidden"); // for info block
				}
			
			}
		
		})
		
		
		
		
	}
	
	
}

options_show_hide("default_header_layout", "lmw mlw lm ml mw wm", "default_header_menu_toggle", "header_style", "default");


options_show_hide("default_padding", "custom", "default_paddings");
options_show_hide("default_padding", "custom", "default_top_padding");
options_show_hide("default_padding", "custom", "default_right_padding");
options_show_hide("default_padding", "custom", "default_bottom_padding");
options_show_hide("default_padding", "custom", "default_left_padding");

options_show_hide("default_margin", "custom", "default_top_margin");
options_show_hide("default_margin", "custom", "default_right_margin");
options_show_hide("default_margin", "custom", "default_bottom_margin");
options_show_hide("default_margin", "custom", "default_left_margin");

options_show_hide("default_index_padding", "custom", "default_index_top_padding");
options_show_hide("default_index_padding", "custom", "default_index_right_padding");
options_show_hide("default_index_padding", "custom", "default_index_bottom_padding");
options_show_hide("default_index_padding", "custom", "default_index_left_padding");

options_show_hide("default_index_margin", "custom", "default_index_top_margin");
options_show_hide("default_index_margin", "custom", "default_index_right_margin");
options_show_hide("default_index_margin", "custom", "default_index_bottom_margin");
options_show_hide("default_index_margin", "custom", "default_index_left_margin");

options_show_hide("archive_padding", "custom", "archive_top_padding");
options_show_hide("archive_padding", "custom", "archive_right_padding");
options_show_hide("archive_padding", "custom", "archive_bottom_padding");
options_show_hide("archive_padding", "custom", "archive_left_padding");

options_show_hide("archive_margin", "custom", "archive_top_margin");
options_show_hide("archive_margin", "custom", "archive_right_margin");
options_show_hide("archive_margin", "custom", "archive_bottom_margin");
options_show_hide("archive_margin", "custom", "archive_left_margin");

options_show_hide("portfolio_item_padding", "custom", "portfolio_item_top_padding");
options_show_hide("portfolio_item_padding", "custom", "portfolio_item_right_padding");
options_show_hide("portfolio_item_padding", "custom", "portfolio_item_bottom_padding");
options_show_hide("portfolio_item_padding", "custom", "portfolio_item_left_padding");

options_show_hide("portfolio_item_margin", "custom", "portfolio_item_top_margin");
options_show_hide("portfolio_item_margin", "custom", "portfolio_item_bottom_margin");


options_show_hide("single_post_padding", "custom", "single_post_paddings");
options_show_hide("single_post_padding", "custom", "single_post_top_padding");
options_show_hide("single_post_padding", "custom", "single_post_right_padding");
options_show_hide("single_post_padding", "custom", "single_post_bottom_padding");
options_show_hide("single_post_padding", "custom", "single_post_left_padding");


options_show_hide("single_post_margin", "custom", "single_post_top_margin");
options_show_hide("single_post_margin", "custom", "single_post_bottom_margin");

options_show_hide("main_font", "custom", "main_font_custom");
options_show_hide("headings_font", "custom", "headings_font_custom");
options_show_hide("menu_font", "custom", "menu_font_custom");
options_show_hide("mobile_menu_font", "custom", "mobile_menu_font_custom");


options_show_hide("body_border", "yes", "body_border_color");
options_show_hide("body_border", "yes", "body_border_width");
options_show_hide("body_side_border", "yes", "body_border_color");
options_show_hide("body_side_border", "yes", "body_border_width");


options_show_hide("smooth_scroll", "yes", "smooth_scroll_step");
options_show_hide("smooth_scroll", "yes", "smooth_scroll_speed");

options_show_hide("scroll_indicator", "yes", "scroll_indicator_info");
options_show_hide("scroll_indicator", "yes", "scroll_indicator_position");
options_show_hide("scroll_indicator", "yes", "scroll_indicator_color");
options_show_hide("scroll_indicator", "yes", "scroll_indicator_bg_color");
options_show_hide("scroll_indicator", "yes", "scroll_indicator_thick");
options_show_hide("scroll_indicator", "yes", "scroll_indicator_radius");
options_show_hide("scroll_indicator", "yes", "scroll_indicator_height");


options_show_hide("single_post_padding", "custom", "single_post_top_padding");
options_show_hide("single_post_padding", "custom", "single_post_right_padding");
options_show_hide("single_post_padding", "custom", "single_post_bottom_padding");
options_show_hide("single_post_padding", "custom", "single_post_left_padding");

options_show_hide("header_style", "default", "default_header_3lines_overlay", "default_header_layout", "l3w 3lw wl3 l3 3l");

options_show_hide("default_header_3lines_overlay", "overlay-bg-color", "overlay_bg_hover_hover_colors", "default_header_layout", "l3w 3lw wl3 l3 3l");

options_show_hide("header_style", "default", "default_header_menu_align");
options_show_hide("header_style", "default", "default_header_layout");
options_show_hide("header_style", "default", "default_menu_always_visible");
options_show_hide("header_style", "default", "default_header_overflow");
options_show_hide("header_style", "default", "default_header_fixed");
options_show_hide("header_style", "default", "default_header_scroll_top_visible");
options_show_hide("header_style", "default", "default_header_border");
options_show_hide("header_style", "default", "default_header_width");
options_show_hide("header_style", "default", "default_header_padding_left_right");
options_show_hide("header_style", "default", "default_header_submenu_color");
options_show_hide("header_style", "default", "default_header_padding_top_bottom");
options_show_hide("header_style", "default", "default_header_fullwidth");

options_show_hide("header_style", "default", "default_header_padding_top");
options_show_hide("header_style", "default", "default_header_padding_bottom");

options_show_hide("header_style", "default", "extra_header_menu_position");
options_show_hide("header_style", "default", "extra_header_menu_align");

options_show_hide("header_style", "default", "default_header_padding_top_bottom_title");
options_show_hide("header_style", "default", "compact_default_header_on_scroll");
options_show_hide("header_style", "default", "search_woo_where");
options_show_hide("header_style", "default", "default_header_megamenu_fullwidth");

options_show_hide("default_header_fixed", "yes", "default_header_overflow");

options_show_hide("default_header_3lines_overlay", "overlay-bg-image overlay-bg-color", "overlay_menu_widgets_position", "default_header_layout", "l3w 3lw wl3 3l l3",  "header_style", "default");
options_show_hide("default_header_3lines_overlay", "overlay-bg-image overlay-bg-color", "overlay_menu_vert_content_align", "default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "default");

options_show_hide("header_style", "default", "overlay_menu_settings", 				"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_menu_font_color", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_content_align", 			"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_menu_line_height", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_menu_hover_font_color",	"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_text_stroke", 			"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_menu_text_size", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_menu_text_weight", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_font_color", 			"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_bg_image", 				"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_bg_image_style", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_bg_color", 				"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_bg_color_opacity", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");

options_show_hide("header_style", "default", "overlay_menu_link_color", 			"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_link_hover_color", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_font_transform", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_widgets_position", 		"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_vert_content_align", 	"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");

options_show_hide("header_style", "default", "overlay_menu_gradient_background", 	"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");
options_show_hide("header_style", "default", "overlay_menu_bg_color_hover_opacity",	"default_header_layout", "l3w 3lw wl3 3l l3", "header_style", "lateral-toggle-flex, lateral-toggle-left");


options_show_hide("header_style", "lateral-toggle-flex", "overlay_menu_bg_color_hover", "default_header_layout", "l3w 3lw wl3 3l l3");

options_show_hide("header_style", "default lateral-toggle-flex lateral-toggle-left", "overlay_menu_menu_text_r1", "default_header_layout", "l3w 3lw wl3 3l l3");
options_show_hide("header_style", "default lateral-toggle-flex lateral-toggle-left", "overlay_menu_menu_text_r2", "default_header_layout", "l3w 3lw wl3 3l l3");




options_show_hide("header_style", "default", "mobile_menu_info", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_colors_info", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_font_info", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "bg_mobile_info", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_alignemnt_info", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_open_style", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_width", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_colors", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_text_color", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_text_hover_color", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_text_color_header", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_bg_color", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_fonts", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_size", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_size_custom", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_weight", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_style", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_transform", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_spacing", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_height", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_height_custom", "default_header_layout", "lmw mlw lm ml mw wm m");


options_show_hide("header_style", "default", "mobile_menu_gradient_direction", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("mobile_menu_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "mobile_menu_bg_color_2");
options_show_hide("mobile_menu_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "mobile_menu_bg_color_3");
options_show_hide("mobile_menu_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "mobile_menu_gradient");


options_show_hide("header_style", "default", "mobile_menu_bg_color_opacity", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_bg_image", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_bg_style", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_bg_align", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_bg_repeat", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_bg_size", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_alignment", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_text_align", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_content_align_horizontal", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_content_align_vertical", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_logo", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_direction", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_widget_colors_info", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_widget_colors", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_widget_text_color", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_widget_link_color", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("header_style", "default", "mobile_menu_widget_hover_color", "default_header_layout", "lmw mlw lm ml mw wm m");

options_show_hide("mobile_menu_open_style", "mobile_fullheight", "mobile_menu_direction");


options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_testimonial_cat_id");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_limit");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_testimonial_type");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_carousel_navigation");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_carousel_navigation_color");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_bg_pattern");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_bg_color_testimonial");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_bg_color_2_testimonial");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_text_color_testimonial");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_speed");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_slides_per_view");
options_show_hide("portfolio_item_show_testimonials", "yes", "portfolio_item_gap");

options_show_hide("portfolio_item_style", "portfolio_style_12", "portfolio_item_title_bg_color");
options_show_hide("portfolio_item_style", "portfolio_style_12", "portfolio_item_title_height");
options_show_hide("portfolio_item_style", "portfolio_style_12", "portfolio_item_style_12_hero_0_fullwidth");
options_show_hide("portfolio_item_style", "portfolio_style_12 portfolio_style_13", "portfolio_item_style_12_hero_fullwidth");

options_show_hide("portfolio_item_style_12_hero_0_fullwidth", "yes", "portfolio_item_style_12_hero_0_container_width");
options_show_hide("portfolio_item_style_12_hero_fullwidth", "yes", "portfolio_item_style_12_hero_container_width");

options_show_hide("portfolio_item_content_width_responsive", "yes", "portfolio_item_content_width_responsive_percent");

options_show_hide("extra_images_layout", "grid_advanced flex", "extra_images_grider_height");
options_show_hide("extra_images_layout", "grid_advanced", "extra_images_width_height");
options_show_hide("extra_images_layout", "carousel", "single_image_height");

options_show_hide("extra_images_layout", "carousel", "extra_images_carousel_centered");
options_show_hide("extra_images_layout", "carousel", "extra_images_carousel_fade");
options_show_hide("extra_images_layout", "carousel", "extra_images_carousel_loop");
options_show_hide("extra_images_layout", "carousel", "extra_images_carousel_autoplay");
options_show_hide("extra_images_layout", "carousel", "extra_images_carousel_speed");
options_show_hide("extra_images_layout", "carousel", "extra_images_carousel_delay");
options_show_hide("extra_images_layout", "carousel", "extra_images_carousel_gap");


options_show_hide("extra_images_layout", "flex grid_advanced grid_simple masonry carousel", "extra_images_columns");
options_show_hide("extra_images_layout", "flex", "extra_images_stretch");
options_show_hide("extra_images_layout", "flex grid_advanced grid_simple masonry stack", "extra_images_img_radius_size");
options_show_hide("extra_images_layout", "flex grid_advanced grid_simple masonry stack", "extra_images_gap");

options_show_hide("extra_images_layout", "carousel", "emphasize_size");
options_show_hide("extra_images_layout", "carousel", "emphasize_opacity");
options_show_hide("extra_images_layout", "carousel", "carousel_navigation");
options_show_hide("extra_images_layout", "carousel", "carousel_navigation_align");
options_show_hide("extra_images_layout", "carousel", "carousel_navigation_color");
options_show_hide("extra_images_layout", "carousel", "fraction_navigation");
options_show_hide("extra_images_layout", "carousel", "autoheight");

options_show_hide("extra_images_use_duotone", "yes", "extra_images_duotone");
options_show_hide("extra_images_use_duotone", "yes", "extra_images_duotone_color", "extra_images_duotone", "custom");
options_show_hide("extra_images_use_duotone", "yes", "extra_images_duotone_gradient", "extra_images_duotone", "custom");
options_show_hide("extra_images_use_duotone", "yes", "extra_images_duotone_color_2", "extra_images_duotone_gradient", "yes");
options_show_hide("extra_images_use_duotone", "yes", "extra_images_duotone_color_3", "extra_images_duotone_gradient", "yes");
options_show_hide("extra_images_use_duotone", "yes", "extra_images_duotone_gradient_direction", "extra_images_duotone_gradient", "yes");

options_show_hide("comment_form_layout", "default", "comment_button_default_background");

options_show_hide("portfolio_item_style", "portfolio_style_12 portfolio_style_13", "extra_images_container_width");
options_show_hide("portfolio_item_style", "portfolio_style_12 portfolio_style_13", "portfolio_item_extra_images_fullwidth");
options_show_hide("portfolio_item_style", "portfolio_style_12 portfolio_style_13", "extra_images_no_padding");

options_show_hide("default_header_gradient_background", "yes", "default_header_gradient_direction");
options_show_hide("default_header_gradient_background", "yes", "default_header_gradient_color_2");
options_show_hide("default_header_gradient_background", "yes", "default_header_gradient_color_3");
options_show_hide("default_header_gradient_background", "yes", "default_header_gradient_color_4");

options_show_hide("default_header_gradient_background", "yes", "default_header_gradient");




options_show_hide("overlay_menu_gradient_background", "yes", "overlay_menu_gradient_direction");
options_show_hide("overlay_menu_gradient_background", "yes", "overlay_menu_bg_color_gradient_color_2");
options_show_hide("overlay_menu_gradient_background", "yes", "overlay_menu_bg_color_gradient_color_3");
options_show_hide("overlay_menu_gradient_background", "yes", "overlay_menu_bg_color_gradient_color_4");

options_show_hide("customize_cursor", "yes", "customize_cursor_info");
options_show_hide("customize_cursor", "yes", "cursor_color");
options_show_hide("customize_cursor", "yes", "cursor_background_color");
options_show_hide("customize_cursor", "yes", "cursor_border_color");
options_show_hide("customize_cursor", "yes", "cursor_size");

options_show_hide("main_font_size", "custom", "main_font_size_custom");
options_show_hide("main_font_height", "custom", "main_font_height_custom");

options_show_hide("footer_title_size", "custom", "footer_title_size_custom");
options_show_hide("footer_title_height", "custom", "footer_title_height_custom");

options_show_hide("h1_size", "custom", "h1_size_custom");
options_show_hide("h1_height", "custom", "h1_height_custom");

options_show_hide("h2_size", "custom", "h2_size_custom");
options_show_hide("h2_height", "custom", "h2_height_custom");

options_show_hide("h3_size", "custom", "h3_size_custom");
options_show_hide("h3_height", "custom", "h3_height_custom");

options_show_hide("h4_size", "custom", "h4_size_custom");
options_show_hide("h4_height", "custom", "h4_height_custom");

options_show_hide("h5_size", "custom", "h5_size_custom");
options_show_hide("h5_height", "custom", "h5_height_custom");

options_show_hide("h6_size", "custom", "h6_size_custom");
options_show_hide("h6_height", "custom", "h6_height_custom");

options_show_hide("h1_size_r1", "custom", "h1_size_custom_r1");
options_show_hide("h1_height_r1", "custom", "h1_height_custom_r1");

options_show_hide("h2_size_r1", "custom", "h2_size_custom_r1");
options_show_hide("h2_height_r1", "custom", "h2_height_custom_r1");

options_show_hide("h3_size_r1", "custom", "h3_size_custom_r1");
options_show_hide("h3_height_r1", "custom", "h3_height_custom_r1");

options_show_hide("h4_size_r1", "custom", "h4_size_custom_r1");
options_show_hide("h4_height_r1", "custom", "h4_height_custom_r1");

options_show_hide("h5_size_r1", "custom", "h5_size_custom_r1");
options_show_hide("h5_height_r1", "custom", "h5_height_custom_r1");

options_show_hide("h6_size_r1", "custom", "h6_size_custom_r1");
options_show_hide("h6_height_r1", "custom", "h6_height_custom_r1");

options_show_hide("h1_size_r2", "custom", "h1_size_custom_r2");
options_show_hide("h1_height_r2", "custom", "h1_height_custom_r2");

options_show_hide("h2_size_r2", "custom", "h2_size_custom_r2");
options_show_hide("h2_height_r2", "custom", "h2_height_custom_r2");

options_show_hide("h3_size_r2", "custom", "h3_size_custom_r2");
options_show_hide("h3_height_r2", "custom", "h3_height_custom_r2");

options_show_hide("h4_size_r2", "custom", "h4_size_custom_r2");
options_show_hide("h4_height_r2", "custom", "h4_height_custom_r2");

options_show_hide("h5_size_r2", "custom", "h5_size_custom_r2");
options_show_hide("h5_height_r2", "custom", "h5_height_custom_r2");

options_show_hide("h6_size_r2", "custom", "h6_size_custom_r2");
options_show_hide("h6_height_r2", "custom", "h6_height_custom_r2");

options_show_hide("h1_r1", "yes", "h1_size_r1");
options_show_hide("h1_r1", "yes", "h1_spacing_r1");
options_show_hide("h1_r1", "yes", "h1_height_r1");

options_show_hide("h2_r1", "yes", "h2_size_r1");
options_show_hide("h2_r1", "yes", "h2_spacing_r1");
options_show_hide("h2_r1", "yes", "h2_height_r1");

options_show_hide("h3_r1", "yes", "h3_size_r1");
options_show_hide("h3_r1", "yes", "h3_spacing_r1");
options_show_hide("h3_r1", "yes", "h3_height_r1");

options_show_hide("h4_r1", "yes", "h4_size_r1");
options_show_hide("h4_r1", "yes", "h4_spacing_r1");
options_show_hide("h4_r1", "yes", "h4_height_r1");

options_show_hide("h5_r1", "yes", "h5_size_r1");
options_show_hide("h5_r1", "yes", "h5_spacing_r1");
options_show_hide("h5_r1", "yes", "h5_height_r1");

options_show_hide("h6_r1", "yes", "h6_size_r1");
options_show_hide("h6_r1", "yes", "h6_spacing_r1");
options_show_hide("h6_r1", "yes", "h6_height_r1");

options_show_hide("h1_r2", "yes", "h1_size_r2");
options_show_hide("h1_r2", "yes", "h1_spacing_r2");
options_show_hide("h1_r2", "yes", "h1_height_r2");

options_show_hide("h2_r2", "yes", "h2_size_r2");
options_show_hide("h2_r2", "yes", "h2_spacing_r2");
options_show_hide("h2_r2", "yes", "h2_height_r2");

options_show_hide("h3_r2", "yes", "h3_size_r2");
options_show_hide("h3_r2", "yes", "h3_spacing_r2");
options_show_hide("h3_r2", "yes", "h3_height_r2");

options_show_hide("h4_r2", "yes", "h4_size_r2");
options_show_hide("h4_r2", "yes", "h4_spacing_r2");
options_show_hide("h4_r2", "yes", "h4_height_r2");

options_show_hide("h5_r2", "yes", "h5_size_r2");
options_show_hide("h5_r2", "yes", "h5_spacing_r2");
options_show_hide("h5_r2", "yes", "h5_height_r2");

options_show_hide("h6_r2", "yes", "h6_size_r2");
options_show_hide("h6_r2", "yes", "h6_spacing_r2");
options_show_hide("h6_r2", "yes", "h6_height_r2");

options_show_hide("overlay_menu_menu_text_r2", "yes", "overlay_menu_menu_text_size_r2", "default_header_layout", "l3w 3lw wl3 3l l3");
options_show_hide("overlay_menu_menu_text_r2", "yes", "overlay_menu_menu_text_weight_r2", "default_header_layout", "l3w 3lw wl3 3l l3");
options_show_hide("overlay_menu_menu_text_size_r2", "custom", "overlay_menu_menu_text_size_custom_r2", "default_header_layout", "l3w 3lw wl3 3l l3");

options_show_hide("overlay_menu_menu_text_r1", "yes", "overlay_menu_menu_text_size_r1", "default_header_layout", "l3w 3lw wl3 3l l3");
options_show_hide("overlay_menu_menu_text_r1", "yes", "overlay_menu_menu_text_weight_r1", "default_header_layout", "l3w 3lw wl3 3l l3");
options_show_hide("overlay_menu_menu_text_size_r1", "custom", "overlay_menu_menu_text_size_custom_r1", "default_header_layout", "l3w 3lw wl3 3l l3");

options_show_hide("header_style", "lateral-toggle-left", "lateral_toggle_left_button_vert_align");
options_show_hide("header_style", "lateral-toggle-left", "lateral_toggle_left_menu_vert_align");
options_show_hide("header_style", "lateral-toggle-left", "lateral_toggle_left_padding");

options_show_hide("lateral_toggle_left_padding", "custom", "lateral_toggle_left_top_padding", "header_style", "lateral-toggle-left");
options_show_hide("lateral_toggle_left_padding", "custom", "lateral_toggle_left_right_padding", "header_style", "lateral-toggle-left");
options_show_hide("lateral_toggle_left_padding", "custom", "lateral_toggle_left_bottom_padding", "header_style", "lateral-toggle-left");
options_show_hide("lateral_toggle_left_padding", "custom", "lateral_toggle_left_left_padding", "header_style", "lateral-toggle-left");

options_show_hide("header_style", "lateral-left", "lateral_left_padding");
options_show_hide("header_style", "lateral-left", "lateral_left_menu_vert_align");

options_show_hide("mobile_menu_size", "custom", "mobile_menu_size_custom");
options_show_hide("mobile_menu_height", "custom", "mobile_menu_height_custom");


options_show_hide("default_header_fixed", "yes", "mobile_menu_open_style", "default_header_layout", "lmw mlw lm ml mw wm m");
options_show_hide("mobile_menu_open_style", "mobile_fullheight", "mobile_menu_width", "default_header_fixed", "yes");
//options_show_hide("mobile_menu_open_style", "mobile_fullheight", "mobile_menu_width", "default_header_layout", "lmw mlw lm ml mw wm m", "default_header_fixed", "yes");
options_show_hide("mobile_menu_open_style", "mobile_fullheight", "mobile_menu_content_align_horizontal", "default_header_layout", "lmw mlw lm ml mw wm m", "default_header_fixed", "yes");
options_show_hide("mobile_menu_open_style", "mobile_fullheight", "mobile_menu_content_align_vertical", "default_header_layout", "lmw mlw lm ml mw wm m", "default_header_fixed", "yes");



options_show_hide("lateral_left_padding", "custom", "lateral_left_top_padding", "header_style", "lateral-left");
options_show_hide("lateral_left_padding", "custom", "lateral_left_right_padding", "header_style", "lateral-left");
options_show_hide("lateral_left_padding", "custom", "lateral_left_bottom_padding", "header_style", "lateral-left");
options_show_hide("lateral_left_padding", "custom", "lateral_left_left_padding", "header_style", "lateral-left");

options_show_hide("header_style", "lateral-toggle-flex", "lateral_toggle_flex_button_vert_align");
options_show_hide("header_style", "lateral-toggle-flex", "lateral_toggle_flex_padding");

options_show_hide("lateral_toggle_flex_padding", "custom", "lateral_toggle_flex_top_padding", "header_style", "lateral-toggle-flex");
options_show_hide("lateral_toggle_flex_padding", "custom", "lateral_toggle_flex_right_padding", "header_style", "lateral-toggle-flex");
options_show_hide("lateral_toggle_flex_padding", "custom", "lateral_toggle_flex_bottom_padding", "header_style", "lateral-toggle-flex");
options_show_hide("lateral_toggle_flex_padding", "custom", "lateral_toggle_flex_left_padding", "header_style", "lateral-toggle-flex");



/* options_show_hide("hide_footer", "no", "default_footer_padding");

options_show_hide("default_footer_padding", "custom", "default_footer_top_padding", "hide_footer", "no");
options_show_hide("default_footer_padding", "custom", "default_footer_right_padding", "hide_footer", "no");
options_show_hide("default_footer_padding", "custom", "default_footer_bottom_padding", "hide_footer", "no");
options_show_hide("default_footer_padding", "custom", "default_footer_left_padding", "hide_footer", "no"); */



options_show_hide("footer_2_show", "yes", "footer_2_layout");
options_show_hide("footer_2_show", "yes", "footer_2_text_align");
options_show_hide("footer_2_show", "yes", "footer_2_vertical_align");
options_show_hide("footer_2_show", "yes", "footer_2_wrap_with_footer_1");
options_show_hide("footer_2_show", "yes", "footer_2_gradient_direction");
options_show_hide("footer_2_show", "yes", "default_footer_2_padding");
options_show_hide("footer_2_show", "yes", "default_footer_2_custom_padding");



options_show_hide("default_footer_2_padding", "custom", "default_footer_2_top_padding", "footer_2_show", "yes");
options_show_hide("default_footer_2_padding", "custom", "default_footer_2_right_padding", "footer_2_show", "yes");
options_show_hide("default_footer_2_padding", "custom", "default_footer_2_bottom_padding", "footer_2_show", "yes");
options_show_hide("default_footer_2_padding", "custom", "default_footer_2_left_padding", "footer_2_show", "yes");
options_show_hide("default_footer_2_padding", "custom", "footer_2_paddings", "footer_2_show", "yes");

options_show_hide("footer_2_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "footer_2_gradient");
options_show_hide("footer_2_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "footer_2_bg_color_2");
options_show_hide("footer_2_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "footer_2_bg_color_3");

options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_bg_color", "footer_2_show", "yes");
options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_bg_color_opacity", "footer_2_show", "yes");
options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_bg_image", "footer_2_show", "yes");
options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_bg_image_style", "footer_2_show", "yes");
options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_text_color", "footer_2_show", "yes");
options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_link_color", "footer_2_show", "yes");
options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_link_hover_color", "footer_2_show", "yes");
options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_title_color", "footer_2_show", "yes");
options_show_hide("footer_2_wrap_with_footer_1", "no", "footer_2_colors", "footer_2_show", "yes");

options_show_hide("overlay_menu_menu_text_size", "custom", "overlay_menu_menu_text_size_custom", "default_header_layout", "l3w 3lw wl3 3l l3");

options_show_hide("footer_border", "yes", "footer_border_color");
options_show_hide("footer_border", "yes", "footer_border_width");
options_show_hide("footer_border", "yes", "footer_border_custom");

options_show_hide("compact_default_header_on_scroll", "yes", "compact_logo");

options_show_hide("compact_default_header_on_scroll", "yes", "compact_header_padding_top");
options_show_hide("compact_default_header_on_scroll", "yes", "compact_header_padding_top_custom", "compact_header_padding_top", "custom");
options_show_hide("compact_default_header_on_scroll", "yes", "compact_header_padding_bottom");
options_show_hide("compact_default_header_on_scroll", "yes", "compact_header_padding_bottom_custom", "compact_header_padding_bottom", "custom");


options_show_hide("footer_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "footer_gradient");
options_show_hide("footer_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "footer_bg_color_2");
options_show_hide("footer_gradient_direction", "to right to bottom to left to top to top right to bottom right to bottom left to top left ellipse farthest-corner at center", "footer_bg_color_3");


options_show_hide("header_style", "default", "extra_header_show");

options_show_hide("extra_header_show", "yes", "extra_header_layout");
options_show_hide("extra_header_show", "yes", "extra_header_menu_position");
options_show_hide("extra_header_show", "yes", "extra_header_menu_align");
options_show_hide("extra_header_show", "yes", "extra_header_options");

options_show_hide("extra_header_show", "yes", "extra_header_menu_always_visible", "default_header_fixed", "yes");
options_show_hide("extra_header_show", "yes", "default_header_menu_always_visible", "default_header_fixed", "yes");
options_show_hide("extra_header_show", "yes", "extra_default_visible", "default_header_fixed", "yes");

options_show_hide("extra_header_layout", "www ww w", "extra_header_font_color", "extra_header_show", "yes");
options_show_hide("extra_header_layout", "www ww w", "extra_header_hover_font_color", "extra_header_show", "yes");

options_show_hide("extra_header_show", "yes", "extra_header_paddings");
options_show_hide("extra_header_show", "yes", "extra_header_padding_top_bottom");
options_show_hide("extra_header_show", "yes", "extra_header_padding_top");
options_show_hide("extra_header_show", "yes", "extra_header_padding_bottom");
options_show_hide("extra_header_show", "yes", "extra_header_bg_color");
options_show_hide("extra_header_show", "yes", "extra_header_gradient_background");
options_show_hide("extra_header_show", "yes", "extra_header_bg_color_opacity");


options_show_hide("extra_header_gradient_background", "yes", "extra_header_gradient_direction", "extra_header_show", "yes");
options_show_hide("extra_header_gradient_background", "yes", "extra_header_gradient_color_2", "extra_header_show", "yes");
options_show_hide("extra_header_gradient_background", "yes", "extra_header_gradient_color_3", "extra_header_show", "yes");
options_show_hide("extra_header_gradient_background", "yes", "extra_header_gradient_color_4", "extra_header_show", "yes");

options_show_hide("extra_header_gradient_background", "yes", "extra_header_gradient", "extra_header_show", "yes");

options_show_hide("extra_header_show", "yes", "extra_header_bg_image");
options_show_hide("extra_header_show", "yes", "extra_header_bg_image_size");
options_show_hide("extra_header_show", "yes", "extra_header_bg_image_position");
options_show_hide("extra_header_show", "yes", "extra_header_bg_image_repeat");

options_show_hide("archive_navigation", "numeric_pagination old_new_simple", "archive_navigation_text_color");
options_show_hide("archive_navigation", "numeric_pagination old_new_simple", "archive_navigation_bg_color");

options_show_hide("archive_style", "blog-style-2 blog-style-3 blog-style-8 blog-style-9", "archive_boxed");
options_show_hide("archive_emphasize_first_post", "yes", "archive_emphasize_style");
options_show_hide("archive_style", "blog-style-3 blog-style-5 blog-style-6", "archive_style_2");
options_show_hide("archive_style_2", "flex", "archive_flex_height", "archive_style", "blog-style-3 blog-style-5 blog-style-6");
options_show_hide("archive_img_radius", "yes", "archive_img_radius_size");
options_show_hide("archive_style", "blog-style-2 blog-style-3 blog-style-4 blog-style-5 blog-style-6 blog-style-7 blog-style-8", "archive_gap_advanced");
options_show_hide("archive_style", "blog-style-2 blog-style-3", "archive_blog_2_image_height");
options_show_hide("archive_style_2", "grid_advanced", "archive_grid_advanced_row_height", "archive_style", "blog-style-3 blog-style-5 blog-style-6");
options_show_hide("archive_style", "blog-style-5", "archive_captions_position");
options_show_hide("archive_title_font_family", "custom", "archive_custom_title_font_family");
options_show_hide("archive_h_size", "custom", "archive_h_size_custom");
options_show_hide("archive_h_spacing", "custom", "archive_h_spacing_custom");
options_show_hide("archive_h_height", "custom", "archive_h_height_custom");
options_show_hide("archive_style", "blog-style-1 blog-style-2 blog-style-2a blog-style-3 blog-style-4 blog-style-5 blog-style-6 blog-style-10", "archive_duotone");
options_show_hide("archive_duotone", "custom", "archive_duotone_custom", "archive_style", "blog-style-1 blog-style-2 blog-style-2a blog-style-3 blog-style-4 blog-style-5 blog-style-6 blog-style-10");
options_show_hide("archive_duotone", "custom", "archive_duotone_gradient_direction", "archive_style", "blog-style-1 blog-style-2 blog-style-2a blog-style-3 blog-style-4 blog-style-5 blog-style-6 blog-style-10");
options_show_hide("archive_duotone", "custom", "archive_duotone_custom_2", "archive_style", "blog-style-1 blog-style-2 blog-style-2a blog-style-3 blog-style-4 blog-style-5 blog-style-6 blog-style-10");
options_show_hide("archive_duotone", "custom", "archive_duotone_custom_3", "archive_style", "blog-style-1 blog-style-2 blog-style-2a blog-style-3 blog-style-4 blog-style-5 blog-style-6 blog-style-10");
options_show_hide("archive_duotone", "custom", "archive_duotone_gradient_direction");
options_show_hide("archive_duotone", "custom", "archive_duotone_gradient");
options_show_hide("archive_duotone_gradient", "yes", "archive_duotone_gradient_direction");
options_show_hide("archive_duotone_gradient", "yes", "archive_duotone_custom_2");
options_show_hide("archive_duotone_gradient", "yes", "archive_duotone_custom_3");

options_show_hide("archive_change_header_colors_below", "yes", "archive_change_menu_new_color_below");
options_show_hide("archive_change_header_colors", "yes", "archive_change_menu_new_color");

options_show_hide("page_sidebar", "custom_sidebar_1 custom_sidebar_2 custom_sidebar_3", "page_sidebar_position");


options_show_hide("sidebar_title_height", "custom", "sidebar_title_height_custom");
options_show_hide("sidebar_title_size", "custom", "sidebar_title_size_custom");
options_show_hide("sidebar_title_font_family", "custom", "sidebar_title_custom_font_family");


options_show_hide("post_change_header_colors_below", "yes", "post_change_menu_new_color_below");
options_show_hide("post_change_header_colors", "yes", "post_change_menu_new_color");

options_show_hide("post_duotone", "custom", "post_duotone_custom");
options_show_hide("post_duotone", "custom", "post_duotone_gradient");
options_show_hide("post_duotone_gradient", "yes", "post_duotone_gradient_direction");
options_show_hide("post_duotone_gradient", "yes", "post_duotone_custom_2");
options_show_hide("post_duotone_gradient", "yes", "post_duotone_custom_3");

options_show_hide("post_navigation_use_duotone", "yes", "post_navigation_duotone");
options_show_hide("post_navigation_use_duotone", "yes", "post_navigation_duotone_color", "post_navigation_duotone", "custom");
options_show_hide("post_navigation_use_duotone", "yes", "post_navigation_duotone_gradient", "post_navigation_duotone", "custom");
options_show_hide("post_navigation_use_duotone", "yes", "post_navigation_duotone_color_2", "post_navigation_duotone_gradient", "yes");
options_show_hide("post_navigation_use_duotone", "yes", "post_navigation_duotone_color_3", "post_navigation_duotone_gradient", "yes");
options_show_hide("post_navigation_use_duotone", "yes", "post_navigation_duotone_gradient_direction", "post_navigation_duotone_gradient", "yes");

options_show_hide("post_related_posts", "2 3 4", "post_related_posts_excerpt");
options_show_hide("post_related_posts", "2 3 4", "post_related_posts_layout");
options_show_hide("post_related_posts", "2 3 4", "post_related_posts_use_duotone");
options_show_hide("post_related_posts_use_duotone", "yes", "post_related_posts_duotone");
options_show_hide("post_related_posts_use_duotone", "yes", "post_related_posts_duotone_color", "post_related_posts_duotone", "custom");
options_show_hide("post_related_posts_use_duotone", "yes", "post_related_posts_duotone_gradient", "post_related_posts_duotone", "custom");
options_show_hide("post_related_posts_use_duotone", "yes", "post_related_posts_duotone_color_2", "post_related_posts_duotone_gradient", "yes");
options_show_hide("post_related_posts_use_duotone", "yes", "post_related_posts_duotone_color_3", "post_related_posts_duotone_gradient", "yes");
options_show_hide("post_related_posts_use_duotone", "yes", "post_related_posts_duotone_gradient_direction", "post_related_posts_duotone_gradient", "yes");

options_show_hide("portfolio_item_style", "portfolio_style_13 portfolio_style_12", "portfolio_item_change_header_colors");
options_show_hide("portfolio_item_change_header_colors", "yes", "portfolio_item_change_menu_new_color");

options_show_hide("portfolio_item_style", "portfolio_style_13 portfolio_style_12", "portfolio_item_change_header_colors_below");
options_show_hide("portfolio_item_change_header_colors_below", "yes", "portfolio_item_change_menu_new_color_below");

options_show_hide("portfolio_item_style", "portfolio_style_12 portfolio_style_11", "portfolio_item_change_header_colors_title");
options_show_hide("portfolio_item_change_header_colors_title", "yes", "portfolio_item_change_menu_new_color_title");

options_show_hide("portfolio_item_duotone", "custom", "portfolio_item_duotone_custom");
options_show_hide("portfolio_item_duotone", "custom", "portfolio_item_duotone_gradient");
options_show_hide("portfolio_item_duotone_gradient", "yes", "portfolio_item_duotone_gradient_direction");
options_show_hide("portfolio_item_duotone_gradient", "yes", "portfolio_item_duotone_custom_2");
options_show_hide("portfolio_item_duotone_gradient", "yes", "portfolio_item_duotone_custom_3");

options_show_hide("portfolio_item_navigation_use_duotone", "yes", "portfolio_item_navigation_duotone");
options_show_hide("portfolio_item_navigation_use_duotone", "yes", "portfolio_item_navigation_duotone_color", "portfolio_item_navigation_duotone", "custom");
options_show_hide("portfolio_item_navigation_use_duotone", "yes", "portfolio_item_navigation_duotone_gradient", "portfolio_item_navigation_duotone", "custom");
options_show_hide("portfolio_item_navigation_use_duotone", "yes", "portfolio_item_navigation_duotone_color_2", "portfolio_item_navigation_duotone_gradient", "yes");
options_show_hide("portfolio_item_navigation_use_duotone", "yes", "portfolio_item_navigation_duotone_color_3", "portfolio_item_navigation_duotone_gradient", "yes");
options_show_hide("portfolio_item_navigation_use_duotone", "yes", "portfolio_item_navigation_duotone_gradient_direction", "portfolio_item_navigation_duotone_gradient", "yes");

options_show_hide("portfolio_item_related_posts", "2 3 4", "portfolio_item_related_posts_use_duotone");
options_show_hide("portfolio_item_related_posts_use_duotone", "yes", "portfolio_item_related_posts_duotone");
options_show_hide("portfolio_item_related_posts_use_duotone", "yes", "portfolio_item_related_posts_duotone_color", "portfolio_item_related_posts_duotone", "custom");
options_show_hide("portfolio_item_related_posts_use_duotone", "yes", "portfolio_item_related_posts_duotone_gradient", "portfolio_item_related_posts_duotone", "custom");
options_show_hide("portfolio_item_related_posts_use_duotone", "yes", "portfolio_item_related_posts_duotone_color_2", "portfolio_item_related_posts_duotone_gradient", "yes");
options_show_hide("portfolio_item_related_posts_use_duotone", "yes", "portfolio_item_related_posts_duotone_color_3", "portfolio_item_related_posts_duotone_gradient", "yes");
options_show_hide("portfolio_item_related_posts_use_duotone", "yes", "portfolio_item_related_posts_duotone_gradient_direction", "portfolio_item_related_posts_duotone_gradient", "yes");


options_show_hide("single_post_style", "fullwidth", "single_post_content_width_all");

options_show_hide("default_content_width_responsive", "yes", "default_content_width_responsive_percent");
options_show_hide("single_post_content_width_responsive", "yes", "single_post_content_width_responsive_percent");
options_show_hide("footer_width_responsive", "yes", "footer_width_responsive_percent");

options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_hero_holder_background_color");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_featured_image");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_fullwidth");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_holder_background_color");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_holder_background_color_opacity");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_page_parallax");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_holder_title_color");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_holder_title_weight");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_holder_title_size");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_holder_title_position");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_holder_height");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_hero_holder_scroll_button");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_change_header_colors_below");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_change_menu_new_color_below", "woo_shop_change_header_colors_below", "yes");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_change_header_colors");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_change_menu_new_color", "woo_shop_change_header_colors", "yes");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_padding");


options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_paddings", "woo_shop_padding", "custom");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_top_padding", "woo_shop_padding", "custom");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_right_padding", "woo_shop_padding", "custom");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_bottom_padding", "woo_shop_padding", "custom");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_left_padding", "woo_shop_padding", "custom");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_margin");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_top_margin", "woo_shop_margin", "custom");
options_show_hide("show_woo_shop_featured_image_title", "yes", "woo_shop_bottom_margin", "woo_shop_margin", "custom");

options_show_hide("woo_shop_shadow", "yes", "woo_shop_shadow_color");

options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_my_account_image");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_my_account_title");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_cart_image");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_cart_title");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_checkout_image");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_checkout_title");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_fullwidth");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_holder_background_color");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_holder_background_color_opacity");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_page_parallax");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_holder_title_color");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_holder_title_weight");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_holder_title_size");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_holder_title_position");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_holder_height");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_hero_holder_scroll_button");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_change_header_colors_below");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_change_menu_new_color_below", "woo_account_change_header_colors_below", "yes");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_change_header_colors");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_change_menu_new_color", "woo_account_change_header_colors", "yes");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_padding");


options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_paddings", "woo_account_padding", "custom");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_top_padding", "woo_account_padding", "custom");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_right_padding", "woo_account_padding", "custom");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_bottom_padding", "woo_account_padding", "custom");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_left_padding", "woo_account_padding", "custom");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_margin");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_top_margin", "woo_account_margin", "custom");
options_show_hide("show_woo_account_featured_image_title", "yes", "woo_account_bottom_margin", "woo_account_margin", "custom");

options_show_hide("woo_single_content_width", "fullwidth", "woo_single_content_width_below");
options_show_hide("woo_single_change_header_colors", "yes", "woo_single_change_menu_new_color");


});