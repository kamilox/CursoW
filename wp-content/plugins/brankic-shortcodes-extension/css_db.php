<?php
function brankic_add_extra_css($post_id) {

	delete_post_meta( get_the_ID(), '_brankic_custom_css');

	$content_post = get_post($post_id);
	$content = $content_post->post_content;
	
	$shortcodes_to_find = array("brankic_button", 
								"brankic_icon", 
								"brankic_accordion_wrapper", 
								"brankic_carousel", 
								"brankic_section_title", 
								"brankic_box", 
								"brankic_image", 
								"brankic_restaurant_menu_item", 
								"brankic_collage", 
								"brankic_tabs_wrapper", 
								"brankic_contact_form_7",
								"brankic_progress_bars_wrapper",
								"brankic_category",
								"brankic_flipbox",
								"brankic_instafeed",
								"brankic_instafeed_20",
								"brankic_overlap_text",
								"brankic_team_member",
								"brankic_steps_wrapper",
								"brankic_scroll_button",
								"brankic_counter",
								"brankic_social_icons",
								"brankic_marquee",
								"brankic_super_slider_wrapper",
								"brankic_super_slide",
								"vc_gallery",								
								"vc_column_text",
								"brankic_vertical",
								"brankic_reveal",
								"brankic_list",
								"brankic_swiper_slide_wrapper",
								"brankic_swiper_slide",
								"brankic_pricing_table_wrapper",
								"brankic_pricing_table",
								"vc_row",
								"vc_row_inner",
								"vc_column",
								"vc_column_inner");
	
	foreach($shortcodes_to_find as $shortcode){
		$pattern = get_shortcode_regex(array($shortcode));

		if (   preg_match_all( '/'. $pattern .'/s', $content, $matches )) {
			
			$brankic_inline_css = "";
			foreach($matches[3] as $key => $shortcode_string){
			
				$shortcode_atts = shortcode_parse_atts($shortcode_string);

				$brankic_inline_css = brankic_shortcode_inline_css($matches[2][$key], $shortcode_atts);
				
				if ($brankic_inline_css != ""){
					$old_database_css = get_post_meta( get_the_ID(), '_brankic_custom_css', true);
					update_post_meta( get_the_ID(), '_brankic_custom_css', $old_database_css . $brankic_inline_css);
				}
			}
			
			
		}
	}

	
}
add_action( 'save_post', 'brankic_add_extra_css' );

function brankic_shortcode_inline_css($shortcode, $shortcode_atts) {
	if (!is_array($shortcode_atts)) {
		$shortcode_atts = array();
		$shortcode_atts[] = $shortcode_atts;
	}
	
	
	if ($shortcode == "brankic_button"){
		
		if (array_key_exists("shape", $shortcode_atts)) $shape = $shortcode_atts["shape"]; else $shape = "";
		if (array_key_exists("arrow_color", $shortcode_atts)) $arrow_color = $shortcode_atts["arrow_color"]; else $arrow_color = "";
		if (array_key_exists("text_color", $shortcode_atts)) $text_color = $shortcode_atts["text_color"]; else $text_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("bg_color_2", $shortcode_atts)) $bg_color_2 = $shortcode_atts["bg_color_2"]; else $bg_color_2 = "";
		if (array_key_exists("border_color", $shortcode_atts)) $border_color = $shortcode_atts["border_color"]; else $border_color = "";
		if (array_key_exists("border_color_2", $shortcode_atts)) $border_color_2 = $shortcode_atts["border_color_2"]; else $border_color_2 = "";
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "";
		if (array_key_exists("hover", $shortcode_atts)) $hover = $shortcode_atts["hover"]; else $hover = "normal";
		if (array_key_exists("arrow_hover_color", $shortcode_atts)) $arrow_hover_color = $shortcode_atts["arrow_hover_color"]; else $arrow_hover_color = "";
		if (array_key_exists("border_hover_color", $shortcode_atts)) $border_hover_color = $shortcode_atts["border_hover_color"]; else $border_hover_color = "";
		if (array_key_exists("border_hover_color_2", $shortcode_atts)) $border_hover_color_2 = $shortcode_atts["border_hover_color_2"]; else $border_hover_color_2 = "";
		if (array_key_exists("hover_movement_inline", $shortcode_atts)) $hover_movement_inline = $shortcode_atts["hover_movement_inline"]; else $hover_movement_inline = "";
		if (array_key_exists("shadow_hover_color", $shortcode_atts)) $shadow_hover_color = $shortcode_atts["shadow_hover_color"]; else $shadow_hover_color = "";
		if (array_key_exists("text_hover_color", $shortcode_atts)) $text_hover_color = $shortcode_atts["text_hover_color"]; else $text_hover_color = "";
		if (array_key_exists("bg_hover_color_2", $shortcode_atts)) $bg_hover_color_2 = $shortcode_atts["bg_hover_color_2"]; else $bg_hover_color_2 = "";
		if (array_key_exists("bg_hover_color", $shortcode_atts)) $bg_hover_color = $shortcode_atts["bg_hover_color"]; else $bg_hover_color = "";
		if (array_key_exists("hover_movement", $shortcode_atts)) $hover_movement = $shortcode_atts["hover_movement"]; else $hover_movement = "";
		if (array_key_exists("half", $shortcode_atts)) $half = $shortcode_atts["half"]; else $half = "";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";
		
		
		$inline_bg_color = '';
		if ($bg_color_2 != "" && $bg_color != "") $inline_bg_color = 'background-image:linear-gradient(120deg, ' . $bg_color . ' 0%, ' . $bg_color_2 . ' 100%);';
		if ($bg_color_2 == "" && $bg_color != "") $inline_bg_color = 'background-color:' . $bg_color . ';'; 

		$inline_border_color = '';
		$inline_border_color_for_round = '';
		if ($border_color_2 != "" && $border_color != "") {
			$inline_border_color = 'border-image:linear-gradient(120deg, ' . $border_color . ' 0%, ' . $border_color_2 . ' 100%);';
			$inline_border_color_for_round = 'border-color:' . $border_color . ';';
		}
		if ($border_color_2 == "" && $border_color != "") {
			$inline_border_color = 'border-color:' . $border_color . ';'; 
			$inline_border_color_for_round = 'border-color:' . $border_color . ';';
		}
		
		if ($shape == "button-circle arrow-link" || $shape == "button-circle play" || $shape == "radius") $inline_border_color = $inline_border_color_for_round;
		
		$inline_bg_hover_color = "";
		if ($bg_hover_color_2 != "" && $bg_hover_color != "") $inline_bg_hover_color = 'background-image:linear-gradient(120deg, ' . $bg_hover_color . ' 0%, ' . $bg_hover_color_2 . ' 100%);';  
		if ($bg_hover_color_2 == "" && $bg_hover_color != "") $inline_bg_hover_color = 'background-color:' . $bg_hover_color . ';'; 
		
		$inline_border_hover_color = '';
		$inline_border_hover_color_for_round = '';
		if ($border_hover_color_2 != "" && $border_hover_color != "") {
			$inline_border_hover_color = 'border-image:linear-gradient(120deg, ' . $border_hover_color . ' 0%, ' . $border_hover_color_2 . ' 100%);';
			$inline_border_hover_color_for_round = 'border-color:' . $border_hover_color . ';';
		}
		if ($shape == "button-circle arrow-link" || $shape == "button-circle play" || $shape == "radius") $inline_border_hover_color = $inline_border_hover_color_for_round;
		
		if ($border_hover_color_2 == "" && $border_hover_color != "") {
			$inline_border_hover_color = 'border-color:' . $border_hover_color . ';';
			$inline_border_hover_color_for_round = 'border-color:' . $border_hover_color . ';';
		}
		
		if ($text_hover_color != "") $inline_text_hover_color = 'color:' . $text_hover_color . ';'; else $inline_text_hover_color = "";
		if ($arrow_hover_color != "") $inline_arrow_hover_color = 'color:' . $arrow_hover_color . ';'; else $inline_arrow_hover_color = "";
		
		$hover_movement_inline = "";
		if ($hover_movement == "up") $hover_movement_inline = '-webkit-transform: translateY(-4px); transform: translateY(-4px);';
		if ($hover_movement == "down") $hover_movement_inline = '-webkit-transform: translateY(4px); transform: translateY(4px);';
		
		if ($shadow_color != "") $shadow_color_inline = 'box-shadow: 0 15px 40px ' . $shadow_color . ';'; else $shadow_color_inline = "";
		
		if ($shadow_hover_color != "") $shadow_hover_color_inline = 'box-shadow: 0 15px 40px ' . $shadow_hover_color . ';'; else $shadow_hover_color_inline = "";
		
		$brankic_button_id = 'brankic_button_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_button_id = 'brankic_button_' . $unique;
		
		$button_style = "";
		

		if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
			if ($arrow_color != "") $button_style .= ' #' . $brankic_button_id . ' span.circle-bg{color:' . $arrow_color . ';}';
			if ($text_color != "")$button_style .= ' #' . $brankic_button_id . '{color:' . $text_color . ';}';
			$button_style .= ' #' . $brankic_button_id . ' span.circle-bg{' . $inline_border_color . ' ' . $shadow_color_inline . '}';
			if ($shape == "button-circle play") {if ($inline_bg_color != "") $button_style .= ' #' . $brankic_button_id . ' span.circle-bg{' . $inline_bg_color . '}';}	
			if ($shape == "button-circle arrow-link") {if ($inline_bg_color != "") $button_style .= ' #' . $brankic_button_id . ' span.circle-bg{' . $inline_bg_color . '}';}			
		} else {
			if ($text_color != "") $button_style .= ' #' . $brankic_button_id . '{color:' . $text_color . '}';
			if ($inline_border_color != "") $button_style .= ' #' . $brankic_button_id . '{' . $inline_border_color . '}';
			if ($shadow_color_inline != "") $button_style .= ' #' . $brankic_button_id . '{' . $shadow_color_inline . '}';
			if ($half == "true") {
				if ($inline_bg_color != "") $button_style .= ' #' . $brankic_button_id . ':after{' . $inline_bg_color . '}';
			} else { 
				if ($inline_bg_color != "") $button_style .= ' #' . $brankic_button_id . '{' . $inline_bg_color . '}';
			}
		}
		
		
		if ($hover == "dir-ltr" || $hover == "dir-rtl" || $hover == "dir-ttb" || $hover == "dir-btt") {
			
			
			if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
				
				$button_style .= ' #' . $brankic_button_id . ':hover span.circle-bg{' . $inline_arrow_hover_color . ' ' . $inline_border_hover_color . ' ' . $hover_movement_inline . ' ' . $shadow_hover_color_inline . '}';
				if ($inline_text_hover_color != "") $button_style .= ' #' . $brankic_button_id . ':hover span{' . $inline_text_hover_color . '}';
			
			
				if ($bg_hover_color_2 != "") {
					if ($inline_bg_hover_color != "") $button_style .= ' #' . $brankic_button_id . ' span.circle-bg:after, #' . $brankic_button_id . ':hover span.circle-bg:after{' . $inline_bg_hover_color . '}';
				} else {
					if ($inline_bg_hover_color != "") $button_style .= ' #' . $brankic_button_id . ' span.circle-bg:after, #' . $brankic_button_id . ':hover span.circle-bg:after{' . $inline_bg_hover_color . '}';
				}
				
			
			} else {
				$button_style .= ' #' . $brankic_button_id . ':hover{' . $inline_text_hover_color . ' ' . $inline_border_hover_color . ' ' . $hover_movement_inline . ' ' . $shadow_hover_color_inline . '}';
			
				if ($bg_hover_color_2 != "") {
					$button_style .= '#' . $brankic_button_id . ':after, #' . $brankic_button_id . ':hover:after{' . $inline_bg_hover_color . '}';
				} else {
					$button_style .= '#' . $brankic_button_id . ':after, #' . $brankic_button_id . ':hover:after{' . $inline_bg_hover_color . '}';
				}

			}
			
		}

		if ($hover == "normal") {
			
			if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
				$button_style .= ' #' . $brankic_button_id . ':hover span.circle-bg{' . $inline_arrow_hover_color . ' ' . $inline_border_hover_color . ' ' . $hover_movement_inline . ' ' . $shadow_hover_color_inline . ' ' . $inline_bg_hover_color . '}';
			
			} else {
				$button_style .= ' #' . $brankic_button_id . ':hover{' . $inline_text_hover_color . ' ' . $inline_border_hover_color . ' ' . $hover_movement_inline . ' ' . $shadow_hover_color_inline . '}';
				if ($half == "true") $button_style .= ' #' . $brankic_button_id . ':hover:after{' . $inline_bg_hover_color . '}';
				else $button_style .= ' #' . $brankic_button_id . ':hover{' . $inline_bg_hover_color . '}';
			}
			
		}
		return $button_style;
		
	}
	if ($shortcode == "brankic_icon"){
		
		if (array_key_exists("icon_color", $shortcode_atts)) $icon_color = $shortcode_atts["icon_color"]; else $icon_color = "#000000";
		if (array_key_exists("border_color", $shortcode_atts)) $border_color = $shortcode_atts["border_color"]; else $border_color = "#000";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("icon_color_hover", $shortcode_atts)) $icon_color_hover = $shortcode_atts["icon_color_hover"]; else $icon_color_hover = "";
		if (array_key_exists("bg_color_hover", $shortcode_atts)) $bg_color_hover = $shortcode_atts["bg_color_hover"]; else $bg_color_hover = "";
		if (array_key_exists("hover_border_color", $shortcode_atts)) $hover_border_color = $shortcode_atts["hover_border_color"]; else $hover_border_color = "";
		if (array_key_exists("hover", $shortcode_atts)) $hover = $shortcode_atts["hover"]; else $hover = "";
		if (array_key_exists("heading_color", $shortcode_atts)) $heading_color = $shortcode_atts["heading_color"]; else $heading_color = "";
		if (array_key_exists("heading_content_color", $shortcode_atts)) $heading_content_color = $shortcode_atts["heading_content_color"]; else $heading_content_color = "#000";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";

		
		$brankic_icon_id = 'brankic_icon_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_icon_id = 'brankic_icon_' . $unique;
	
		if ($icon_color != "") $icon_color_css = 'color:' . $icon_color . ';'; else $icon_color_css = "";
		if ($border_color != "") $border_color_css = 'border-color:' . $border_color . ';'; else $border_color_css = "";
		if ($bg_color != "") $bg_color_css = 'background:' . $bg_color . ';'; else $bg_color_css = "";
		if ($icon_color_hover != "") $icon_color_hover_css = 'color:' . $icon_color_hover . ';'; else $icon_color_hover_css = "";
		if ($bg_color_hover != "") $bg_color_hover_css = 'background:' . $bg_color_hover . ';'; else $bg_color_hover_css = "";
		if ($hover_border_color != "") $border_color_hover_css = 'border-color:' . $hover_border_color . ';'; else $border_color_hover_css = "";
		
		$icon_style = "";
		$icon_style .= '#' . $brankic_icon_id . '.icon-wrap {' . $icon_color_css . $bg_color_css . $border_color_css . '}';
		if ($hover == "true") $icon_style .= '#' . $brankic_icon_id . '.icon-wrap:hover {' . $icon_color_hover_css . $bg_color_hover_css . $border_color_hover_css . '}';
		if ($heading_color != "") $icon_style .= '.icon-box-' . $brankic_icon_id . ' .icon-heading {color:' . $heading_color . ';}';
		if ($heading_content_color != "") $icon_style .= '.icon-box-' . $brankic_icon_id . ' .icon-box-content {color:' . $heading_content_color . ';}';
		
		return $icon_style;
	}
	if ($shortcode == "brankic_accordion_wrapper"){
		
		if (array_key_exists("text_color", $shortcode_atts)) $text_color = $shortcode_atts["text_color"]; else $text_color = "";
		if (array_key_exists("caption_color", $shortcode_atts)) $caption_color = $shortcode_atts["caption_color"]; else $caption_color = "";
		if (array_key_exists("active_caption_color", $shortcode_atts)) $active_caption_color = $shortcode_atts["active_caption_color"]; else $active_caption_color = "";
		if (array_key_exists("bg_style", $shortcode_atts)) $bg_style = $shortcode_atts["bg_style"]; else $bg_style = "";
		if (array_key_exists("style", $shortcode_atts)) $style = $shortcode_atts["style"]; else $style = "accordion_1";
		if (array_key_exists("active_bg_color", $shortcode_atts)) $active_bg_color = $shortcode_atts["active_bg_color"]; else $active_bg_color = "";
		if (array_key_exists("active_bg_color_2", $shortcode_atts)) $active_bg_color_2 = $shortcode_atts["active_bg_color_2"]; else $active_bg_color_2 = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("bg_color_2", $shortcode_atts)) $bg_color_2 = $shortcode_atts["bg_color_2"]; else $bg_color_2 = "";
		
		$brankic_id = 'brankic_accordion_wrapper' . brankic_string_to_class($shortcode_atts);
		
		$bg_style = brankic_background($bg_color, $bg_color_2, 120);
		
		
		$css_inline_style = "";
	
		if ($text_color != "") $css_inline_style .= '#' . $brankic_id . ' {color:' . $text_color . ';}';
		if ($caption_color != "") $css_inline_style .= '#' . $brankic_id . ' .trigger-button {color:' . $caption_color . ';}';
		if ($active_caption_color != "") $css_inline_style .= '#' . $brankic_id . ' .trigger-button.active {color:' . $active_caption_color . ';}';
		if ($bg_style != "") $css_inline_style .= '#' . $brankic_id . ' {' . $bg_style . ';}';
		
		
		
		if ($style == "accordion_3") {
			$active_bg_style = brankic_background($active_bg_color, $active_bg_color_2, 120);
			$css_inline_style .= '#' . $brankic_id . '.links_gap .trigger-button {' . $bg_style . ';}';
			$css_inline_style .= '#' . $brankic_id . '.links_gap .trigger-button.active {' . $active_bg_style . ';}';
		}

		
		return $css_inline_style;
	}
	
	if ($shortcode == "brankic_carousel"){
		
		if (array_key_exists("carousel_content", $shortcode_atts)) $carousel_content = $shortcode_atts["carousel_content"]; else $carousel_content = "testimonials";
		if (array_key_exists("portfolio_style", $shortcode_atts)) $portfolio_style = $shortcode_atts["portfolio_style"]; else $portfolio_style = "portfolio-caption-hidden-1";		
		if (array_key_exists("blog_style", $shortcode_atts)) $blog_style = $shortcode_atts["blog_style"]; else $blog_style = "related_posts";	
		if (array_key_exists("use_active_slide_diff_colors", $shortcode_atts)) $use_active_slide_diff_colors = $shortcode_atts["use_active_slide_diff_colors"]; else $use_active_slide_diff_colors = "";
		if (array_key_exists("active_background_color_testimonial", $shortcode_atts)) $active_background_color_testimonial = $shortcode_atts["active_background_color_testimonial"]; else $active_background_color_testimonial = "";
		if (array_key_exists("active_background_color_2_testimonial", $shortcode_atts)) $active_background_color_2_testimonial = $shortcode_atts["active_background_color_2_testimonial"]; else $active_background_color_2_testimonial = "";
		if (array_key_exists("active_background_color_3_testimonial", $shortcode_atts)) $active_background_color_3_testimonial = $shortcode_atts["active_background_color_3_testimonial"]; else $active_background_color_3_testimonial = "";
		if (array_key_exists("active_text_color_testimonial", $shortcode_atts)) $active_text_color_testimonial = $shortcode_atts["active_text_color_testimonial"]; else $active_text_color_testimonial = "";
		if (array_key_exists("active_bg_gradient_direction", $shortcode_atts)) $active_bg_gradient_direction = $shortcode_atts["active_bg_gradient_direction"]; else $active_bg_gradient_direction = "to top right";
		if (array_key_exists("testimonial_type", $shortcode_atts)) $testimonial_type = $shortcode_atts["testimonial_type"]; else $testimonial_type = "default";
		if (array_key_exists("bg_color_testimonial", $shortcode_atts)) $bg_color_testimonial = $shortcode_atts["bg_color_testimonial"]; else $bg_color_testimonial = "";
		if (array_key_exists("bg_color_2_testimonial", $shortcode_atts)) $bg_color_2_testimonial = $shortcode_atts["bg_color_2_testimonial"]; else $bg_color_2_testimonial = "";
		if (array_key_exists("text_color_testimonial", $shortcode_atts)) $text_color_testimonial = $shortcode_atts["text_color_testimonial"]; else $text_color_testimonial = "";
		if (array_key_exists("text_color_2_testimonial", $shortcode_atts)) $text_color_2_testimonial = $shortcode_atts["text_color_2_testimonial"]; else $text_color_2_testimonial = "";
		if (array_key_exists("text_color_gradient_direction", $shortcode_atts)) $text_color_gradient_direction = $shortcode_atts["text_color_gradient_direction"]; else $text_color_gradient_direction = "to right";
		
		if (array_key_exists("text_color_name_occupation", $shortcode_atts)) $text_color_name_occupation = $shortcode_atts["text_color_name_occupation"]; else $text_color_name_occupation = "";
		if (array_key_exists("bg_name_occupation", $shortcode_atts)) $bg_name_occupation = $shortcode_atts["bg_name_occupation"]; else $bg_name_occupation = "";
		
		if (array_key_exists("active_text_color_name_occupation", $shortcode_atts)) $active_text_color_name_occupation = $shortcode_atts["active_text_color_name_occupation"]; else $active_text_color_name_occupation = "";
		if (array_key_exists("active_bg_name_occupation", $shortcode_atts)) $active_bg_name_occupation = $shortcode_atts["active_bg_name_occupation"]; else $active_bg_name_occupation = "";

		if (array_key_exists("text_size", $shortcode_atts)) $text_size = $shortcode_atts["text_size"]; else $text_size = "";
		if (array_key_exists("text_size_custom", $shortcode_atts)) $text_size_custom = $shortcode_atts["text_size_custom"]; else $text_size_custom = "";
		if (array_key_exists("text_weight", $shortcode_atts)) $text_weight = $shortcode_atts["text_weight"]; else $text_weight = "";
		if (array_key_exists("text_height", $shortcode_atts)) $text_height = $shortcode_atts["text_height"]; else $text_height = "";
		if (array_key_exists("text_height_custom", $shortcode_atts)) $text_height_custom = $shortcode_atts["text_height_custom"]; else $text_height_custom = "";
		
		if (array_key_exists("title_color", $shortcode_atts)) $title_color = $shortcode_atts["title_color"]; else $title_color = "#000000";
		if (array_key_exists("hover_color", $shortcode_atts)) $hover_color = $shortcode_atts["hover_color"]; else $hover_color = "";
		if (array_key_exists("hover_2_color", $shortcode_atts)) $hover_2_color = $shortcode_atts["hover_2_color"]; else $hover_2_color = "";
		if (array_key_exists("category_color", $shortcode_atts)) $category_color = $shortcode_atts["category_color"]; else $category_color = "";
		
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "rgba(0, 0, 0, .24)";
		if (array_key_exists("shadow_color_active", $shortcode_atts)) $shadow_color_active = $shortcode_atts["shadow_color_active"]; else $shadow_color_active = "";
		
		if (array_key_exists("border_hover_color", $shortcode_atts)) $border_hover_color = $shortcode_atts["border_hover_color"]; else $border_hover_color = "";
		if (array_key_exists("h_size", $shortcode_atts)) $h_size = $shortcode_atts["h_size"]; else $h_size = "";
		if (array_key_exists("h_size_custom", $shortcode_atts)) $h_size_custom = $shortcode_atts["h_size_custom"]; else $h_size_custom = "";
		if (array_key_exists("h_height", $shortcode_atts)) $h_height = $shortcode_atts["h_height"]; else $h_height = "";
		if (array_key_exists("h_height_custom", $shortcode_atts)) $h_height_custom = $shortcode_atts["h_height_custom"]; else $h_height_custom = "";
		if (array_key_exists("h_spacing", $shortcode_atts)) $h_spacing = $shortcode_atts["h_spacing"]; else $h_spacing = "";
		if (array_key_exists("h_spacing_custom", $shortcode_atts)) $h_spacing_custom = $shortcode_atts["h_spacing_custom"]; else $h_spacing_custom = "";
		if (array_key_exists("h_style", $shortcode_atts)) $h_style = $shortcode_atts["h_style"]; else $h_style = "";
		if (array_key_exists("h_transform", $shortcode_atts)) $h_transform = $shortcode_atts["h_transform"]; else $h_transform = "";
		if (array_key_exists("title_font_family", $shortcode_atts)) $title_font_family = $shortcode_atts["title_font_family"]; else $title_font_family = "";
		if (array_key_exists("custom_title_font_family", $shortcode_atts)) $custom_title_font_family = $shortcode_atts["custom_title_font_family"]; else $custom_title_font_family = "";
		if (array_key_exists("titles_weight", $shortcode_atts)) $titles_weight = $shortcode_atts["titles_weight"]; else $titles_weight = "";
		
		if (array_key_exists("img_radius", $shortcode_atts)) $img_radius = $shortcode_atts["img_radius"]; else $img_radius = "";
		if (array_key_exists("img_radius_size", $shortcode_atts)) $img_radius_size = $shortcode_atts["img_radius_size"]; else $img_radius_size = "4px";
		
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		
		if (array_key_exists("custom_cursor", $shortcode_atts)) $custom_cursor = $shortcode_atts["custom_cursor"]; else $custom_cursor = "";
		if (array_key_exists("custom_cursor_bg", $shortcode_atts)) $custom_cursor_bg = $shortcode_atts["custom_cursor_bg"]; else $custom_cursor_bg = "#403a3e";
		if (array_key_exists("custom_cursor_color", $shortcode_atts)) $custom_cursor_color = $shortcode_atts["custom_cursor_color"]; else $custom_cursor_color = "#ffcc99";
		
		
		
		if ($text_size_custom != "") $text_size = $text_size_custom;
		if ($text_height_custom != "") $text_height = $text_height_custom;

	
		$brankic_id = 'brankic_carousel_' . brankic_string_to_class($shortcode_atts);
		
		$active_extra_css = "";
		$extra_css = "";
		$portfolio_css = "";
		$duotone_css = "";
		$title_style = "";
		$custom_cursor_css = "";
		
		if ($custom_cursor == "true") {
			$custom_cursor_css = 'span.custom-' . $brankic_id . '{background:' . $custom_cursor_bg . ';color:' . $custom_cursor_color . ';}';			
			$custom_cursor_css .= '.cursor-pointer.custom-' . $brankic_id . '-active span.custom-' . $brankic_id . ' {	opacity: 1;}'; 
		}
		
		
		
		if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		
		if ($duotone_gradient != "true" && $duotone_custom != "") $duotone_css .= '#' . $brankic_id . ' .single-color:before{background:' . $duotone_custom . '}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $duotone_css .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $duotone_css .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
		
		if ($title_color != "") $title_style .= '#' . $brankic_id . ' .entry-title a, #' . $brankic_id . ' .entry-title {color:' . $title_color . ';}';
		
		if ($title_font_family == "custom") {
			$title_font_family = $custom_title_font_family;
		} 
		
		if (substr_count($title_font_family, "google_web_font_") == 1) {
			
			$number = substr($title_font_family, strlen($title_font_family) - 1, 1);
			
			$title_font_family = brankic_of_get_option("google_web_font_family_" . $number, brankic_of_get_default("google_web_font_family_" . $number));
		}
		
		if ($h_size_custom != "") $h_size = $h_size_custom;
		if ($h_height_custom != "") $h_height = $h_height_custom;
		if ($h_spacing_custom != "") $h_spacing = $h_spacing_custom;
		
		if ($h_size != "") $h_size = 'font-size:' . $h_size . ';';
		if ($titles_weight != "") $titles_weight = 'font-weight:' . $titles_weight . ';';
		if ($h_style != "") $h_style = 'font-style:' . $h_style . ';';
		if ($h_transform != "") $h_transform = 'text-transform:' . $h_transform . ';';
		if ($h_spacing != "") $h_spacing = 'letter-spacing:' . $h_spacing . ';';
		if ($h_height != "") $h_height = 'line-height:' . $h_height . ';';
		if ($title_font_family != "") $title_font_family = 'font-family:' . $title_font_family . ';';
		
		$title_css = $title_font_family . $h_size . $titles_weight .  $h_style .  $h_transform .  $h_spacing .  $h_height; 
		
		
		if ($carousel_content == "blog"){
			if ($blog_style == "blog_style_5") {
				if ($border_hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {border-color: ' . $border_hover_color . ';}';
				if ($title_css != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a{' . $title_css . '}';
				
				if ($hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {color: ' . $hover_color . ';}';
				if ($border_hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {border-color: ' . $border_hover_color . ';}';

				if ($category_color != "") $title_style .= '#' . $brankic_id . ' .post-meta{color: ' . $category_color . ';}';
				
				if ($shadow_color != "none" && $shadow_color != "") $extra_css .= '#' . $brankic_id . ' .post-entry {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';				
			}
			if ($blog_style == "blog_style_6") {
				if ($border_hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {border-color: ' . $border_hover_color . ';}';
				if ($title_css != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a{' . $title_css . '}';
				
				if ($hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {color: ' . $hover_color . ';}';
				if ($border_hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {border-color: ' . $border_hover_color . ';}';

				if ($category_color != "") $title_style .= '#' . $brankic_id . ' .post-meta{color: ' . $category_color . ';}';
				
				if ($shadow_color != "none" && $shadow_color != "") $extra_css .= '#' . $brankic_id . ' .post-entry {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';				
			}
			if ($blog_style == "related_posts") {
				if ($border_hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {border-color: ' . $border_hover_color . ';}';
				if ($title_css != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title{' . $title_css . '}';
				
				if ($hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {color: ' . $hover_color . ';}';
				if ($border_hover_color != "") $title_style .= '#' . $brankic_id . ' .post-title .entry-title a:hover {border-color: ' . $border_hover_color . ';}';

				if ($category_color != "") $title_style .= '#' . $brankic_id . ' .post-meta{color: ' . $category_color . ';}';
				
				if ($shadow_color != "none" && $shadow_color != "") $extra_css .= '#' . $brankic_id . ' .post-media {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';				
			}
		}
		if ($carousel_content == "testimonials"){

			if ($use_active_slide_diff_colors == "true"){
				
				if ($testimonial_type == "monochrome"){
					if ($active_background_color_testimonial != "" && $active_background_color_2_testimonial == "" && $active_background_color_3_testimonial == "") $active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item .t_text{background: ' . $active_background_color_testimonial . '!important;}';
					if ($active_background_color_testimonial != "" && $active_background_color_2_testimonial != "" && $active_background_color_3_testimonial == "") $active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item .t_text{background: linear-gradient(' . $active_bg_gradient_direction . ', ' . $active_background_color_testimonial . ' , ' . $active_background_color_2_testimonial . ')!important;}';
					if ($active_background_color_testimonial != "" && $active_background_color_2_testimonial != "" && $active_background_color_3_testimonial != "") $active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item .t_text{background: linear-gradient(' . $active_bg_gradient_direction . ', ' . $active_background_color_testimonial . ' , ' . $active_background_color_2_testimonial . ', ' . $active_background_color_3_testimonial . ')!important;}';
				} else {
					if ($active_background_color_testimonial != "" && $active_background_color_2_testimonial == "" && $active_background_color_3_testimonial == "") $active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item{background: ' . $active_background_color_testimonial . '!important;}';
					if ($active_background_color_testimonial != "" && $active_background_color_2_testimonial != "" && $active_background_color_3_testimonial == "") $active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item{background: linear-gradient(' . $active_bg_gradient_direction . ', ' . $active_background_color_testimonial . ' , ' . $active_background_color_2_testimonial . ')!important;}';
					if ($active_background_color_testimonial != "" && $active_background_color_2_testimonial != "" && $active_background_color_3_testimonial != "") $active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item{background: linear-gradient(' . $active_bg_gradient_direction . ', ' . $active_background_color_testimonial . ' , ' . $active_background_color_2_testimonial . ', ' . $active_background_color_3_testimonial . ')!important;}';					
				}
				if ($active_text_color_testimonial != "") {
					$active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item{color:' . $active_text_color_testimonial . '!important;}'; 
					$active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item .t_text p{color:' . $active_text_color_testimonial . '!important;}'; 
				}
				
				if ($active_text_color_name_occupation != "") $active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_author{color:' . $active_text_color_name_occupation . ';}';
				if ($active_bg_name_occupation != "") $active_extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_author{background:' . $active_bg_name_occupation . ';}';
				
				
			}
				
			if ($testimonial_type == "monochrome"){
				if ($bg_color_testimonial != "" && $bg_color_2_testimonial != "") $extra_css .= '#' . $brankic_id . ' .t_item .t_text{background: linear-gradient(120deg, ' . $bg_color_testimonial . ', ' . $bg_color_2_testimonial . ');}';
				if ($bg_color_testimonial != "" && $bg_color_2_testimonial == "") $extra_css .= '#' . $brankic_id . ' .t_item .t_text{background:' . $bg_color_testimonial . ';}';
			} else {
				if ($bg_color_testimonial != "" && $bg_color_2_testimonial != "") $extra_css .= '#' . $brankic_id . ' .t_item{background: linear-gradient(120deg, ' . $bg_color_testimonial . ', ' . $bg_color_2_testimonial . ');}';
				if ($bg_color_testimonial != "" && $bg_color_2_testimonial == "") $extra_css .= '#' . $brankic_id . ' .t_item{background:' . $bg_color_testimonial . ';}';
			}
			
			if ($testimonial_type == "monochrome"){
				if ($shadow_color != "") $extra_css .= '#' . $brankic_id . ' .t_text{box-shadow: 0px 5px 40px 0 ' . $shadow_color . ';}';
				if ($shadow_color_active != "" && $use_active_slide_diff_colors == "true") $extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_text{box-shadow: 0px 5px 40px 0 ' . $shadow_color_active . ';}';
				
				
			}
			if ($testimonial_type == "solid"){
				if ($shadow_color != "") $extra_css .= '#' . $brankic_id . ' .t_item{box-shadow: 0px 5px 40px 0 ' . $shadow_color . ';}';
				if ($shadow_color_active != "" && $use_active_slide_diff_colors == "true") $extra_css .= '#' . $brankic_id . ' .swiper-slide-active .t_item{box-shadow: 0px 5px 40px 0 ' . $shadow_color_active . ';}';
			}
			
			if ($text_color_testimonial != "" && $text_color_2_testimonial == "") $extra_css .= '#' . $brankic_id . ' .t_text p{color:' . $text_color_testimonial . ';}';	
			if ($text_color_testimonial != "" && $text_color_2_testimonial != "") $extra_css .= '#' . $brankic_id . ' .t_text p{background: linear-gradient(' . $text_color_gradient_direction . ', ' . $text_color_testimonial . ' 0%, ' . $text_color_2_testimonial . ' 100%);}';
		
			
			if ($text_size != "") $extra_css .= '#' . $brankic_id . ' .t_text p{font-size:' . $text_size . ';}';
			if ($text_weight != "") $extra_css .= '#' . $brankic_id . ' .t_text p{font-weight:' . $text_weight . ';}';
			if ($text_height != "") $extra_css .= '#' . $brankic_id . ' .t_text p{line-height:' . $text_height . ';}';
			
			if ($text_color_name_occupation != "") $extra_css .= '#' . $brankic_id . ' .t_author{color:' . $text_color_name_occupation . ';}';
			if ($bg_name_occupation != "") $extra_css .= '#' . $brankic_id . ' .t_author{background:' . $bg_name_occupation . ';}';

		}
		
		if ($carousel_content == "portfolio"){
			if ($portfolio_style == "portfolio-caption-hidden-1"){
				if ($category_color != "") $portfolio_css .= '.fig_hid.hover1 #' . $brankic_id . ' .post-info-content .entry-category {color: ' . $category_color . ';}';
				if ($hover_color != "" && $hover_2_color != "") $portfolio_css .= '.fig_hid.hover1 #' . $brankic_id . ' .post-info a  {background:linear-gradient(0deg, ' . $hover_color . ' 0, ' . $hover_2_color . ');}';
				if ($hover_color != "" && $hover_2_color == "") $portfolio_css .= '.fig_hid.hover1 #' . $brankic_id . ' .post-info a {background:' . $hover_color  . '}';
				if ($title_css != "") $title_style .= '.fig_hid.hover1 #' . $brankic_id . ' .post-info-content  .entry-title{' . $title_css . '}';
			}
			
			if ($portfolio_style == "portfolio-caption-hidden-2"){
				if ($title_css != "") $title_style .= '.fig_hid.hover2 #' . $brankic_id . ' .post-info-content .entry-title{' . $title_css . '}';
				if ($category_color != "") $portfolio_css .= '.fig_hid.hover2 #' . $brankic_id . ' .post-info-content .entry-category {color: ' . $category_color . ';}';
				if ($hover_color != "" && $hover_2_color != "")  $portfolio_css .= '.fig_hid.hover2 #' . $brankic_id . ' .post-info  {background:linear-gradient(0deg, ' . $hover_color . ' 0, ' . $hover_2_color . ');}';
				if ($hover_color != "" && $hover_2_color == "")  $portfolio_css .= '.fig_hid.hover2 #' . $brankic_id . ' .post-info {background:' . $hover_color  . '}';

			}
			
			if ($portfolio_style == "portfolio-caption-hidden-3"){
				if ($title_css != "") $title_style .= '.fig_hid.hover3 #' . $brankic_id . ' .post-info-content .entry-title{' . $title_css . '}';
				if ($category_color != "") $portfolio_css .= '.fig_hid.hover3 #' . $brankic_id . ' .post-info-content .entry-category {color: ' . $category_color . ';}';
				if ($hover_color != "") $portfolio_css .= '.fig_hid.hover3 #' . $brankic_id . ' .post-info {background:linear-gradient(180deg, rgba(255,255,255,0) 0%, ' . $hover_color . ' 100%);}';

			}
			
			if ($portfolio_style == "portfolio-caption-hidden-4"){
				if ($title_css != "") $title_style .= '.fig_hid.hover4 #' . $brankic_id . ' .post-info-content .entry-title{' . $title_css . '}';
				if ($category_color != "") $portfolio_css .= '.fig_hid.hover4 #' . $brankic_id . ' .post-info-content .entry-category {color: ' . $category_color . ';}';
				if ($hover_color != "" && $hover_2_color != "")  $portfolio_css .= '.fig_hid.hover4 #' . $brankic_id . ' .post-info  {background:linear-gradient(0deg, ' . $hover_color . ' 0, ' . $hover_2_color . ');}';
				if ($hover_color != "" && $hover_2_color == "")  $portfolio_css .= '.fig_hid.hover4 #' . $brankic_id . ' .post-info {background:' . $hover_color  . '}';

			}
			
			if ($portfolio_style == "portfolio-caption-hidden-5"){
				if ($title_css != "") $title_style .= '.fig_hid.hover5 #' . $brankic_id . ' .post-info-content .entry-title{' . $title_css . '}';
				if ($category_color != "") $portfolio_css .= '.fig_hid.hover5 #' . $brankic_id . ' .post-info-content .entry-category, .fig_hid.hover5 #' . $brankic_id . ' .post-info-content .entry-category a {color: ' . $category_color . ';}';
				if ($hover_color != "" && $hover_2_color != "")  $portfolio_css .= '.fig_hid.hover5 #' . $brankic_id . ' .inner-holder:after  {background:linear-gradient(0deg, ' . $hover_color . ' 0, ' . $hover_2_color . ');}';
				if ($hover_color != "" && $hover_2_color != "")  $portfolio_css .= '.fig_hid.hover5 #' . $brankic_id . ' .media-holder a:after  {border-image-source:linear-gradient(0deg, ' . $hover_color . ' 0, ' . $hover_2_color . ');}';
				if ($hover_color != "" && $hover_2_color == "")  $portfolio_css .= '#' . $brankic_id . '.fig_hid.hover5 #' . $brankic_id . ' .inner-holder:after  {background:' . $hover_color . ';}';
				if ($hover_color != "" && $hover_2_color == "")  $portfolio_css .= '#' . $brankic_id . '.fig_hid.hover5 #' . $brankic_id . ' .media-holder a:after  {border-image-source:' . $hover_color . ';}';
			}
			
			if ($portfolio_style == "portfolio-caption-hidden-6"){
				if ($title_css != "") $title_style .= '.fig_hid.hover6 #' . $brankic_id . ' .post-info-content .entry-title{' . $title_css . '}';
				if ($category_color != "") $portfolio_css .= '.fig_hid.hover6 #' . $brankic_id . ' .post-info-content .entry-category {color: ' . $category_color . ';}';

			}
			
			if ($portfolio_style == "portfolio-caption-hidden-7"){
				if ($title_css != "") $title_style .= '.fig_hid.hover7 #' . $brankic_id . ' .post-info-content .entry-title{' . $title_css . '}';
				if ($category_color != "") $portfolio_css .= '.fig_hid.hover7 #' . $brankic_id . ' .post-info-content .entry-category {color: ' . $category_color . ';}';
				if ($hover_color != "") $portfolio_css .= '.fig_hid.hover7 #' . $brankic_id . ' .post-info {background:' . $hover_color  . '}';

			}
			
			if ($portfolio_style == "portfolio-caption-hidden-8"){
				if ($title_css != "") $title_style .= '.fig_hid.hover8 #' . $brankic_id . ' .post-info-content .entry-title{' . $title_css . '}';
				if ($category_color != "") $portfolio_css .= '.fig_hid.hover8 #' . $brankic_id . ' .post-info-content .entry-category {color: ' . $category_color . ';}';
				if ($hover_color != "") $portfolio_css .= '.fig_hid.hover8 #' . $brankic_id . ' .post-info-content {background-color: ' . $hover_color . ';}';

			}
			if ($portfolio_style == "portfolio_2"){
				if ($img_radius == "true") $portfolio_css .= '#' . $brankic_id . ' .swiper-slide .post-media{border-radius: ' . $img_radius_size . ';}';
				if ($title_css != "") $title_style .= '#' . $brankic_id . ' .post-info-content .entry-title{' . $title_css . '}';
				if ($category_color != "") $portfolio_css .= '#' . $brankic_id . ' .post-info-content .entry-category {color: ' . $category_color . ';}';
				if ($shadow_color != "") $portfolio_css .= '#' . $brankic_id . ' .swiper-slide .post-media{box-shadow: 0px 5px 40px 0 ' . $shadow_color . ';}';
			}
			
		}
		
		return $active_extra_css.$extra_css.$portfolio_css.$duotone_css.$title_style.$custom_cursor_css;
	}
	
	if ($shortcode == "brankic_vertical"){
		
		if (array_key_exists("h_size", $shortcode_atts)) $h_size = $shortcode_atts["h_size"]; else $h_size = "";
		if (array_key_exists("h_size_custom", $shortcode_atts)) $h_size_custom = $shortcode_atts["h_size_custom"]; else $h_size_custom = "";
		if (array_key_exists("h_weight", $shortcode_atts)) $h_weight = $shortcode_atts["h_weight"]; else $h_weight = "";
		if (array_key_exists("h_style", $shortcode_atts)) $h_style = $shortcode_atts["h_style"]; else $h_style = "";
		if (array_key_exists("h_transform", $shortcode_atts)) $h_transform = $shortcode_atts["h_transform"]; else $h_transform = "";
		if (array_key_exists("h_spacing", $shortcode_atts)) $h_spacing = $shortcode_atts["h_spacing"]; else $h_spacing = "";
		if (array_key_exists("h_spacing_custom", $shortcode_atts)) $h_spacing_custom = $shortcode_atts["h_spacing_custom"]; else $h_spacing_custom = "";
		if (array_key_exists("h_height", $shortcode_atts)) $h_height = $shortcode_atts["h_height"]; else $h_height = "";
		if (array_key_exists("h_height_custom", $shortcode_atts)) $h_height_custom = $shortcode_atts["h_height_custom"]; else $h_height_custom = "";
		if (array_key_exists("tablet_disable", $shortcode_atts)) $tablet_disable = $shortcode_atts["tablet_disable"]; else $tablet_disable = "";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";

		
		
		$brankic_id = 'brankic_vertical_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_id = 'brankic_vertical_' . $unique;
		
	   if ($h_size_custom != "") $h_size = $h_size_custom;
	   if ($h_height_custom != "") $h_height = $h_height_custom;
	   if ($h_spacing_custom != "") $h_spacing = $h_spacing_custom;
	   
	   if ($h_size != "") $h_size = 'font-size:' . $h_size . ';';
	   if ($h_weight != "") $h_weight = 'font-weight:' . $h_weight . ';';
	   if ($h_style != "") $h_style = 'font-style:' . $h_style . ';';
	   if ($h_transform != "") $h_transform = 'text-transform:' . $h_transform . ';';
	   if ($h_spacing != "") $h_spacing = 'letter-spacing:' . $h_spacing . ';';
	   if ($h_height != "") $h_height = 'line-height:' . $h_height . ';';
	   
	   $brankic_vertical_css = '#' . $brankic_id . '{' . $h_size . $h_weight . $h_style . $h_transform . $h_spacing . $h_height . '}';
		return $brankic_vertical_css;
		
	}
	
	
	if ($shortcode == "brankic_section_title"){
		
		if (array_key_exists("h_size", $shortcode_atts)) $h_size = $shortcode_atts["h_size"]; else $h_size = "";
		if (array_key_exists("h_size_custom", $shortcode_atts)) $h_size_custom = $shortcode_atts["h_size_custom"]; else $h_size_custom = "";
		if (array_key_exists("h_height", $shortcode_atts)) $h_height = $shortcode_atts["h_height"]; else $h_height = "";
		if (array_key_exists("h_height_custom", $shortcode_atts)) $h_height_custom = $shortcode_atts["h_height_custom"]; else $h_height_custom = "";
		if (array_key_exists("h_spacing", $shortcode_atts)) $h_spacing = $shortcode_atts["h_spacing"]; else $h_spacing = "";
		if (array_key_exists("h_spacing_custom", $shortcode_atts)) $h_spacing_custom = $shortcode_atts["h_spacing_custom"]; else $h_spacing_custom = "";
		if (array_key_exists("p_size", $shortcode_atts)) $p_size = $shortcode_atts["p_size"]; else $p_size = "";
		if (array_key_exists("p_size_custom", $shortcode_atts)) $p_size_custom = $shortcode_atts["p_size_custom"]; else $p_size_custom = "";
		if (array_key_exists("p_height", $shortcode_atts)) $p_height = $shortcode_atts["p_height"]; else $p_height = "";
		if (array_key_exists("p_height_custom", $shortcode_atts)) $p_height_custom = $shortcode_atts["p_height_custom"]; else $p_height_custom = "";
		if (array_key_exists("p_spacing", $shortcode_atts)) $p_spacing = $shortcode_atts["p_spacing"]; else $p_spacing = "";
		if (array_key_exists("p_spacing_custom", $shortcode_atts)) $p_spacing_custom = $shortcode_atts["p_spacing_custom"]; else $p_spacing_custom = "";
		if (array_key_exists("title_color", $shortcode_atts)) $title_color = $shortcode_atts["title_color"]; else $title_color = "";
		if (array_key_exists("title_color_2", $shortcode_atts)) $title_color_2 = $shortcode_atts["title_color_2"]; else $title_color_2 = "";
		if (array_key_exists("title_gradient_direction", $shortcode_atts)) $title_gradient_direction = $shortcode_atts["title_gradient_direction"]; else $title_gradient_direction = "to right";
		if (array_key_exists("small_title_color", $shortcode_atts)) $small_title_color = $shortcode_atts["small_title_color"]; else $small_title_color = "";
		if (array_key_exists("h_weight", $shortcode_atts)) $h_weight = $shortcode_atts["h_weight"]; else $h_weight = "";
		if (array_key_exists("h_style", $shortcode_atts)) $h_style = $shortcode_atts["h_style"]; else $h_style = "";
		if (array_key_exists("h_transform", $shortcode_atts)) $h_transform = $shortcode_atts["h_transform"]; else $h_transform = "";
		if (array_key_exists("p_weight", $shortcode_atts)) $p_weight = $shortcode_atts["p_weight"]; else $p_weight = "";
		if (array_key_exists("p_style", $shortcode_atts)) $p_style = $shortcode_atts["p_style"]; else $p_style = "";
		if (array_key_exists("p_transform", $shortcode_atts)) $p_transform = $shortcode_atts["p_transform"]; else $p_transform = "";
		if (array_key_exists("highlight_background_color_1", $shortcode_atts)) $highlight_background_color_1 = $shortcode_atts["highlight_background_color_1"]; else $highlight_background_color_1 = "";
		if (array_key_exists("highlight_background_color_2", $shortcode_atts)) $highlight_background_color_2 = $shortcode_atts["highlight_background_color_2"]; else $highlight_background_color_2 = "";
		if (array_key_exists("highlight_hover_background_color_1", $shortcode_atts)) $highlight_hover_background_color_1 = $shortcode_atts["highlight_hover_background_color_1"]; else $highlight_hover_background_color_1 = "";
		if (array_key_exists("highlight_hover_background_color_2", $shortcode_atts)) $highlight_hover_background_color_2 = $shortcode_atts["highlight_hover_background_color_2"]; else $highlight_hover_background_color_2 = "";
		if (array_key_exists("highlight_text_color", $shortcode_atts)) $highlight_text_color = $shortcode_atts["highlight_text_color"]; else $highlight_text_color = "";
		if (array_key_exists("highlight_background_color", $shortcode_atts)) $highlight_background_color = $shortcode_atts["highlight_background_color"]; else $highlight_background_color = "";
		if (array_key_exists("highlight_hover_text_color", $shortcode_atts)) $highlight_hover_text_color = $shortcode_atts["highlight_hover_text_color"]; else $highlight_hover_text_color = "";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";
		
		$brankic_id = 'brankic_section_title_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_id = 'brankic_section_title_' . $unique;
		
	   if ($h_size_custom != "") $h_size = $h_size_custom;
	   if ($h_height_custom != "") $h_height = $h_height_custom;
	   if ($h_spacing_custom != "") $h_spacing = $h_spacing_custom;
	   if ($p_size_custom != "") $p_size = $p_size_custom;
	   if ($p_height_custom != "") $p_height = $p_height_custom;
	   if ($p_spacing_custom != "") $p_spacing = $p_spacing_custom;
	     
	   if ($title_color_2 != "") {
		   $title_color = 'background: linear-gradient(' . $title_gradient_direction . ', ' . $title_color . ' 0%, ' . $title_color_2 . ' 100%);'; 
	   } else {
		   if ($title_color != "") $title_color = 'color:' . $title_color . ';';
	   }
	   
	   if ($small_title_color != "") $small_title_color = 'color:' . $small_title_color . ';';	   
	   
	   if ($h_size != "") $h_size = 'font-size:' . $h_size . ';';
	   if ($h_weight != "") $h_weight = 'font-weight:' . $h_weight . ';';
	   if ($h_style != "") $h_style = 'font-style:' . $h_style . ';';
	   if ($h_transform != "") $h_transform = 'text-transform:' . $h_transform . ';';
	   if ($h_spacing != "") $h_spacing = 'letter-spacing:' . $h_spacing . ';';
	   if ($h_height != "") $h_height = 'line-height:' . $h_height . ';';
	   if ($p_size != "") $p_size = 'font-size:' . $p_size . ';';
	   if ($p_weight != "") $p_weight = 'font-weight:' . $p_weight . ';';
	   if ($p_style != "") $p_style = 'font-style:' . $p_style . ';'; 
	   if ($p_transform != "") $p_transform = 'text-transform:' . $p_transform . ';';
	   if ($p_spacing != "") $p_spacing = 'letter-spacing:' . $p_spacing . ';';
	   if ($p_height != "") $p_height = 'line-height:' . $p_height . ';';
	   
	   $section_title_css = "";
	   
	   
	   $section_title_css .= '#' . $brankic_id . '{' . $title_color . $h_size . $h_weight . $h_style . $h_transform . $h_spacing . $h_height . '}';
	   $section_title_css .= '#subtitle_' . $brankic_id . '{' . $small_title_color . $p_size . $p_weight . $p_style . $p_transform . $p_spacing . $p_height . '}';
	   
	   
	
		$highlight_background_color = "";
		
		if ($highlight_background_color_1 != ""  && $highlight_background_color_2 == ""){
			$highlight_background_color = $highlight_background_color_1;
		}
		
		if ($highlight_background_color_1 != ""  && $highlight_background_color_2 != ""){
			$highlight_background_color = 'linear-gradient(120deg,' . $highlight_background_color_1 . ' 0%,' . $highlight_background_color_2 . ' 100%);';
		}
		
		$highlight_hover_background_color = "";
		
		if ($highlight_hover_background_color_1 != ""  && $highlight_hover_background_color_2 == ""){
			$highlight_hover_background_color = $highlight_hover_background_color_1;
		}
		
		if ($highlight_hover_background_color_1 != ""  && $highlight_hover_background_color_2 != ""){
			$highlight_hover_background_color = 'linear-gradient(120deg,' . $highlight_hover_background_color_1 . ' 0%,' . $highlight_hover_background_color_2 . ' 100%);';
		}
		
		if ($highlight_text_color != "") {
			$section_title_css .= '#' . $brankic_id . ' .highlight.underline, #' . $brankic_id . ' .highlight.overlay, #' . $brankic_id . ' .highlight.line-through, #' . $brankic_id . ' .highlight.line-through.in-back, #' . $brankic_id . ' .highlight.underline-through{color:' . $highlight_text_color . ';}';
		}
		if ($highlight_background_color != "") {
			$section_title_css .= '#' . $brankic_id . ' .highlight.underline::after, #' . $brankic_id . ' .highlight.overlay::after, #' . $brankic_id . ' .highlight.line-through::after, #' . $brankic_id . ' .highlight.line-through.in-back::after, #' . $brankic_id . ' .highlight.underline-through::after {background:' . $highlight_background_color . ' ;}';
		}
		
		if ($highlight_hover_text_color != "") {
			$section_title_css .= '#' . $brankic_id . ' .highlight.underline:hover, #' . $brankic_id . ' .highlight.overlay:hover, #' . $brankic_id . ' .highlight.line-through:hover, #' . $brankic_id . ' .highlight.line-through.in-back:hover, #' . $brankic_id . ' .highlight.underline-through:hover{color:' . $highlight_hover_text_color . ';}';
		}
		if ($highlight_hover_background_color != "") {
			$section_title_css .= '#' . $brankic_id . ' .highlight.underline:hover::after, #' . $brankic_id . ' .highlight.overlay:hover::after, #' . $brankic_id . ' .highlight.line-through:hover::after, #' . $brankic_id . ' .highlight.line-through.in-back:hover::after, #' . $brankic_id . ' .highlight.underline-through:hover::after {background:' . $highlight_hover_background_color . ' ;}';
		}
		
		return $section_title_css;
	}
	if ($shortcode == "brankic_box"){
		
		if (array_key_exists("box_bg_color", $shortcode_atts)) $box_bg_color = $shortcode_atts["box_bg_color"]; else $box_bg_color = "";
		if (array_key_exists("use_gradient_bg", $shortcode_atts)) $use_gradient_bg = $shortcode_atts["use_gradient_bg"]; else $use_gradient_bg = "";
		if (array_key_exists("box_gradient_direction", $shortcode_atts)) $box_gradient_direction = $shortcode_atts["box_gradient_direction"]; else $box_gradient_direction = "to top right";
		if (array_key_exists("box_bg_color_2", $shortcode_atts)) $box_bg_color_2 = $shortcode_atts["box_bg_color_2"]; else $box_bg_color_2 = "";
		if (array_key_exists("box_bg_color_3", $shortcode_atts)) $box_bg_color_3 = $shortcode_atts["box_bg_color_3"]; else $box_bg_color_3 = "";
		if (array_key_exists("box_bg_color_4", $shortcode_atts)) $box_bg_color_4 = $shortcode_atts["box_bg_color_4"]; else $box_bg_color_4 = "";
		if (array_key_exists("hover", $shortcode_atts)) $hover = $shortcode_atts["hover"]; else $hover = "";
		if (array_key_exists("box_hover_bg_color", $shortcode_atts)) $box_hover_bg_color = $shortcode_atts["box_hover_bg_color"]; else $box_hover_bg_color = "";
		if (array_key_exists("box_hover_bg_color_2", $shortcode_atts)) $box_hover_bg_color_2 = $shortcode_atts["box_hover_bg_color_2"]; else $box_hover_bg_color_2 = "";
		if (array_key_exists("box_hover_bg_gradient_direction", $shortcode_atts)) $box_hover_bg_gradient_direction = $shortcode_atts["box_hover_bg_gradient_direction"]; else $box_hover_bg_gradient_direction = "to top right";
		if (array_key_exists("zoom", $shortcode_atts)) $zoom = $shortcode_atts["zoom"]; else $zoom = "";
		if (array_key_exists("bg_zoom", $shortcode_atts)) $bg_zoom = $shortcode_atts["bg_zoom"]; else $bg_zoom = "";
		if (array_key_exists("bg_image", $shortcode_atts)) $bg_image = $shortcode_atts["bg_image"]; else $bg_image = "";
		if (array_key_exists("bg_image_extra", $shortcode_atts)) $bg_image_extra = $shortcode_atts["bg_image_extra"]; else $bg_image_extra = "";
		if (array_key_exists("horizontal_align", $shortcode_atts)) $horizontal_align = $shortcode_atts["horizontal_align"]; else $horizontal_align = "text-align-center";
		if (array_key_exists("vertical_align", $shortcode_atts)) $vertical_align = $shortcode_atts["vertical_align"]; else $vertical_align = "vert-top";
		if (array_key_exists("box_border_radius", $shortcode_atts)) $box_border_radius = $shortcode_atts["box_border_radius"]; else $box_border_radius = "";
		if (array_key_exists("box_border_width", $shortcode_atts)) $box_border_width = $shortcode_atts["box_border_width"]; else $box_border_width = "";
		if (array_key_exists("box_border_color", $shortcode_atts)) $box_border_color = $shortcode_atts["box_border_color"]; else $box_border_color = "";
		if (array_key_exists("box_hover_border_color", $shortcode_atts)) $box_hover_border_color = $shortcode_atts["box_hover_border_color"]; else $box_hover_border_color = "";
		if (array_key_exists("box_shadow_color", $shortcode_atts)) $box_shadow_color = $shortcode_atts["box_shadow_color"]; else $box_shadow_color = "";
		if (array_key_exists("box_hover_shadow_color", $shortcode_atts)) $box_hover_shadow_color = $shortcode_atts["box_hover_shadow_color"]; else $box_hover_shadow_color = "";
		if (array_key_exists("icon_size", $shortcode_atts)) $icon_size = $shortcode_atts["icon_size"]; else $icon_size = "";
		if (array_key_exists("icon_color", $shortcode_atts)) $icon_color = $shortcode_atts["icon_color"]; else $icon_color = "#000000";
		if (array_key_exists("icon_color_hover", $shortcode_atts)) $icon_color_hover = $shortcode_atts["icon_color_hover"]; else $icon_color_hover = "";
		if (array_key_exists("icon_border_shape", $shortcode_atts)) $icon_border_shape = $shortcode_atts["icon_border_shape"]; else $icon_border_shape = "";
		if (array_key_exists("icon_shape_padding", $shortcode_atts)) $icon_shape_padding = $shortcode_atts["icon_shape_padding"]; else $icon_shape_padding = "";
		if (array_key_exists("icon_border_width", $shortcode_atts)) $icon_border_width = $shortcode_atts["icon_border_width"]; else $icon_border_width = "";
		if (array_key_exists("icon_border_color", $shortcode_atts)) $icon_border_color = $shortcode_atts["icon_border_color"]; else $icon_border_color = "#000";
		if (array_key_exists("icon_border_color_hover", $shortcode_atts)) $icon_border_color_hover = $shortcode_atts["icon_border_color_hover"]; else $icon_border_color_hover = "";
		if (array_key_exists("icon_bg_color", $shortcode_atts)) $icon_bg_color = $shortcode_atts["icon_bg_color"]; else $icon_bg_color = "";
		if (array_key_exists("icon_bg_color_hover", $shortcode_atts)) $icon_bg_color_hover = $shortcode_atts["icon_bg_color_hover"]; else $icon_bg_color_hover = "";
		if (array_key_exists("heading", $shortcode_atts)) $heading = $shortcode_atts["heading"]; else $heading = "";
		if (array_key_exists("subheading", $shortcode_atts)) $subheading = $shortcode_atts["subheading"]; else $subheading = "";
		if (array_key_exists("heading_color", $shortcode_atts)) $heading_color = $shortcode_atts["heading_color"]; else $heading_color = "";
		if (array_key_exists("hover_heading_color", $shortcode_atts)) $hover_heading_color = $shortcode_atts["hover_heading_color"]; else $hover_heading_color = "";
		if (array_key_exists("content_color", $shortcode_atts)) $content_color = $shortcode_atts["content_color"]; else $content_color = "";
		if (array_key_exists("hover_content_color", $shortcode_atts)) $hover_content_color = $shortcode_atts["hover_content_color"]; else $hover_content_color = "";
		if (array_key_exists("heading_and_text_style", $shortcode_atts)) $heading_and_text_style = $shortcode_atts["heading_and_text_style"]; else $heading_and_text_style = "i-column";
		if (array_key_exists("box_height", $shortcode_atts)) $box_height = $shortcode_atts["box_height"]; else $box_height = "";
		if (array_key_exists("icon_fontawesome", $shortcode_atts)) $icon_fontawesome = $shortcode_atts["icon_fontawesome"]; else $icon_fontawesome = "";
		if (array_key_exists("icon_openiconic", $shortcode_atts)) $icon_openiconic = $shortcode_atts["icon_openiconic"]; else $icon_openiconic = "";
		if (array_key_exists("icon_typicons", $shortcode_atts)) $icon_typicons = $shortcode_atts["icon_typicons"]; else $icon_typicons = "";
		if (array_key_exists("icon_entypo", $shortcode_atts)) $icon_entypo = $shortcode_atts["icon_entypo"]; else $icon_entypo = "";
		if (array_key_exists("icon_linecons", $shortcode_atts)) $icon_linecons = $shortcode_atts["icon_linecons"]; else $icon_linecons = "";
		if (array_key_exists("icon_monosocial", $shortcode_atts)) $icon_monosocial = $shortcode_atts["icon_monosocial"]; else $icon_monosocial = "";
		if (array_key_exists("icon_material", $shortcode_atts)) $icon_material = $shortcode_atts["icon_material"]; else $icon_material = "";
		if (array_key_exists("icon_linea", $shortcode_atts)) $icon_linea = $shortcode_atts["icon_linea"]; else $icon_linea = "";
		
		
		$brankic_id = 'brankic_box_' . brankic_string_to_class($shortcode_atts);
		
	if ($icon_fontawesome != "") $icon = $icon_fontawesome;
		else if ($icon_openiconic != "") $icon = $icon_openiconic;
			else if ($icon_typicons != "") $icon = $icon_typicons;
				else if ($icon_entypo != "") $icon = $icon_entypo;
					else if ($icon_linecons != "") $icon = $icon_linecons;
						else if ($icon_monosocial != "") $icon = $icon_monosocial;
							else if ($icon_material != "") $icon = $icon_material;
								else if ($icon_linea != "") $icon = $icon_linea;
									else $icon = "";
		
	
	$box_style = "";
	
	if ($box_shadow_color != "") $box_shadow_color_css = 'box-shadow: 0px 20px 60px 0 ' . $box_shadow_color . ';'; else $box_shadow_color_css = "";
	if ($box_hover_shadow_color != "") $box_hover_shadow_color_css = 'box-shadow: 0px 20px 60px 0 ' . $box_hover_shadow_color . ';'; else $box_hover_shadow_color_css = "";
	if ($box_hover_bg_gradient_direction == "circle") $hover_bg_direction = "radial-gradient"; else $hover_bg_direction = "linear-gradient";
	if ($box_hover_bg_color != "" && $box_hover_bg_color_2 == "") $box_hover_bg_color = $box_hover_bg_color;
	if ($box_hover_bg_color != "" && $box_hover_bg_color_2 != "") $box_hover_bg_color = $hover_bg_direction . '(' . $box_hover_bg_gradient_direction . ', ' . $box_hover_bg_color . ' 0%, ' . $box_hover_bg_color_2 . ' 100%)';
	
	if ($use_gradient_bg == "true") {
	
		if ($box_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";	
			
		if ($box_bg_color_3 == "" && $box_bg_color_4 == "") {
			$box_style .= '#' . $brankic_id . '.boxes-wrap .boxes-skin .row-bg.background-color:before {background: ' . $direction . '(' . $box_gradient_direction . ', ' . $box_bg_color . ' , ' . $box_bg_color_2 . ');}';
		}
		if ($box_bg_color_3 != "" && $box_bg_color_4 == "") {
			$box_style .= '#' . $brankic_id . '.boxes-wrap .boxes-skin .row-bg.background-color:before{background: ' . $direction . '(' . $box_gradient_direction . ', ' . $box_bg_color . ' , ' . $box_bg_color_2 . ', ' . $box_bg_color_3 . ');}';
		}
		if ($box_bg_color_3 != "" && $box_bg_color_4 != "") {
		$box_style .= '#' . $brankic_id . '.boxes-wrap .boxes-skin .row-bg.background-color:before{background: ' . $direction . '(' . $box_gradient_direction . ', ' . $box_bg_color . ' , ' . $box_bg_color_2 . ', ' . $box_bg_color_3 . ', ' . $box_bg_color_4 . ');}';	
		}
	}else {
		
		if ($box_bg_color != "") $box_style .= '#' . $brankic_id . '.boxes-wrap .boxes-skin .row-bg.background-color:before {background: ' . $box_bg_color . '; }';
	}
	
	if ($content_color != "") $content_color_css = 'color:' . $content_color . ';'; else $content_color_css = "";
	if ($box_border_width != "") $box_border_width_css = 'border-style: solid;border-width:' . $box_border_width . ';'; else $box_border_width_css = "";
	if ($box_border_color != "") $box_border_color_css = 'border-color:' . $box_border_color . ';'; else $box_border_color_css = "";
	if ($box_border_radius != "") $box_border_radius_css = 'border-radius:' . $box_border_radius . ';'; else $box_border_radius_css = "";
	if ($heading_color != "") $heading_color_css = 'color:' . $heading_color . ';'; else $heading_color_css = "";
	
	$box_style .= '#' . $brankic_id . '.boxes-wrap .boxes-skin {' . $content_color_css . $box_border_width_css . $box_border_color_css . $box_border_radius_css . $box_shadow_color_css . '}';
	
	$box_style .= '#' . $brankic_id . '.boxes-wrap .boxes-inner {' . $content_color_css . '; }';
	$box_style .= '#' . $brankic_id . '.boxes-wrap .icon-heading {' . $heading_color_css . '; }';
	
	
	if ($box_hover_bg_color != "" || $box_hover_bg_color_2 != "") $data_bg_color_hover = 'data-bg-color-hover="true"'; else $data_bg_color_hover = '';
	
	if ($hover == "true") {
		if ($box_hover_bg_color != "") $box_style .= '#' . $brankic_id . '.boxes-wrap .boxes-skin .row-bg.background-color:after{background: ' . $box_hover_bg_color . '!important; }';
		if ($hover_content_color != "") $box_style .= '#' . $brankic_id . '.boxes-wrap:hover .boxes-inner { color: ' . $hover_content_color . ' !important; }';
	}
	
	if ($box_hover_border_color != "") $box_hover_border_color_css = 'border-color:' . $box_hover_border_color . ';'; else $box_hover_border_color_css = "";
		
	if ($hover == "true" && $box_hover_shadow_color != "") $box_style .= '#' . $brankic_id . '.boxes-wrap:hover .boxes-skin { ' . $box_hover_shadow_color_css . $box_hover_border_color_css . ';}';
	if ($hover == "true" && $box_hover_shadow_color == "") $box_style .= '#' . $brankic_id . '.boxes-wrap:hover .boxes-skin { ' . $box_shadow_color_css . $box_hover_border_color_css . ';}';

	
	if ($hover == "true") {
		if ($hover_content_color != "") $box_style .= '#' . $brankic_id . '.boxes-wrap:hover .boxes-inner { color: ' . $hover_content_color . ' !important; }';
	}
	
	$icon_color_hover_css = "";
	$icon_border_color_hover_css = "";
	
	if ($icon != "") {
		if ($icon_color != "") $icon_color_css = 'color:' . $icon_color . ';'; else $icon_color_css = "";
		if ($icon_border_color != "") $icon_border_color_css = 'border-color:' . $icon_border_color . ';'; else $icon_border_color_css = "";
		if ($icon_bg_color != "") $icon_bg_color_css = 'background:' . $icon_bg_color . ';'; else $icon_bg_color_css = "";
		if ($icon_color_hover != "") $icon_color_hover_css = 'color:' . $icon_color_hover . ';'; else $icon_color_hover_css = "";
		if ($icon_bg_color_hover != "") $icon_bg_color_hover_css = 'background:' . $icon_bg_color_hover . ';'; else $icon_bg_color_hover_css = "";
		if ($icon_border_color_hover != "") $icon_border_color_hover_css = 'border-color:' . $icon_border_color_hover . ';'; else $icon_border_color_hover_css = "";
			
		$box_style .= '#' . $brankic_id . ' .icon-wrap {'. $icon_color_css . $icon_bg_color_css . $icon_border_color_css .'}';
		if ($hover == "true") $box_style .= '#' . $brankic_id . '.boxes-wrap:hover .icon-wrap {' . $icon_color_hover_css . $icon_bg_color_hover_css . $icon_border_color_hover_css . '}';
	}
	if ($hover == "true") {
		$box_style .= '#' . $brankic_id . '.boxes-wrap:hover .icon-wrap {' . $icon_color_hover_css . $icon_border_color_hover_css . '}';
		if ($hover_heading_color != "") $box_style .= '#' . $brankic_id . '.boxes-wrap:hover .icon-heading {color:' . $hover_heading_color . ';}';
		if ($hover_content_color != "") $box_style .= '#' . $brankic_id . '.boxes-wrap:hover .icon-box-content {color:' . $hover_content_color . ';}';
	}
	
	
	if ($heading_color != "") $box_style .= '#' . $brankic_id . ' .icon-heading {color:' . $heading_color . ';}';
	
	if ($content_color != "") $box_style .= '#' . $brankic_id . ' .icon-box-content {color:' . $content_color . ';}';
	
	return $box_style;

	}
	
	if ($shortcode == "brankic_image"){
		
		if (array_key_exists("duotone", $shortcode_atts)) $duotone = $shortcode_atts["duotone"]; else $duotone = "";
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "";
		
		$brankic_image_id = 'brankic_image_' . brankic_string_to_class($shortcode_atts);
		
		if (array_key_exists("custom_cursor", $shortcode_atts)) $custom_cursor = $shortcode_atts["custom_cursor"]; else $custom_cursor = "";
		if (array_key_exists("custom_cursor_bg", $shortcode_atts)) $custom_cursor_bg = $shortcode_atts["custom_cursor_bg"]; else $custom_cursor_bg = "#403a3e";
		if (array_key_exists("custom_cursor_color", $shortcode_atts)) $custom_cursor_color = $shortcode_atts["custom_cursor_color"]; else $custom_cursor_color = "#ffcc99";

		$custom_cursor_css = "";
		
		if ($custom_cursor == "true") {
			$custom_cursor_css = 'span.custom-' . $brankic_image_id . '{background:' . $custom_cursor_bg . ';color:' . $custom_cursor_color . ';}';
		}
		
		$duotone_extra_css = $brankic_shadow_css = "";
		
		if ($duotone_custom != "" && $duotone == "custom") {
			if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
			
			if ($duotone_gradient != "true") $duotone_extra_css = '#' . $brankic_image_id . ' .single-color:before{background:' . $duotone_custom . '}';
			
			if ($duotone_gradient == "true" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $duotone_extra_css = '#' . $brankic_image_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
			if ($duotone_gradient == "true" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $duotone_extra_css = '#' . $brankic_image_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
			
		}
		
		if ($shadow_color != "") {
		
			$brankic_shadow_css = '#' . $brankic_image_id . '.single-image-wrap[data-box-shadow="true"] { box-shadow: 0px 10px 40px 0 ' . $shadow_color . '; }';
								  
		}
		
		return $duotone_extra_css . $brankic_shadow_css . $custom_cursor_css;

	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if ($shortcode == "brankic_collage"){
		
		if (array_key_exists("duotone_1", $shortcode_atts)) $duotone_1 = $shortcode_atts["duotone_1"]; else $duotone_1 = "";
		if (array_key_exists("duotone_custom_1", $shortcode_atts)) $duotone_custom_1 = $shortcode_atts["duotone_custom_1"]; else $duotone_custom_1 = "";
		if (array_key_exists("duotone_gradient_1", $shortcode_atts)) $duotone_gradient_1 = $shortcode_atts["duotone_gradient_1"]; else $duotone_gradient_1 = "";
		if (array_key_exists("duotone_gradient_direction_1", $shortcode_atts)) $duotone_gradient_direction_1 = $shortcode_atts["duotone_gradient_direction_1"]; else $duotone_gradient_direction_1 = "to top right";
		if (array_key_exists("duotone_custom_1_2", $shortcode_atts)) $duotone_custom_1_2 = $shortcode_atts["duotone_custom_1_2"]; else $duotone_custom_1_2 = "";
		if (array_key_exists("duotone_custom_1_3", $shortcode_atts)) $duotone_custom_1_3 = $shortcode_atts["duotone_custom_1_3"]; else $duotone_custom_1_3 = "";
		
		if (array_key_exists("duotone_2", $shortcode_atts)) $duotone_2 = $shortcode_atts["duotone_2"]; else $duotone_2 = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_gradient_2", $shortcode_atts)) $duotone_gradient_2 = $shortcode_atts["duotone_gradient_2"]; else $duotone_gradient_2 = "";
		if (array_key_exists("duotone_gradient_direction_2", $shortcode_atts)) $duotone_gradient_direction_2 = $shortcode_atts["duotone_gradient_direction_2"]; else $duotone_gradient_direction_2 = "to top right";
		if (array_key_exists("duotone_custom_2_2", $shortcode_atts)) $duotone_custom_2_2 = $shortcode_atts["duotone_custom_2_2"]; else $duotone_custom_2_2 = "";
		if (array_key_exists("duotone_custom_2_3", $shortcode_atts)) $duotone_custom_2_3 = $shortcode_atts["duotone_custom_2_3"]; else $duotone_custom_2_3 = "";
		
		if (array_key_exists("duotone_3", $shortcode_atts)) $duotone_3 = $shortcode_atts["duotone_3"]; else $duotone_3 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_3", $shortcode_atts)) $duotone_gradient_3 = $shortcode_atts["duotone_gradient_3"]; else $duotone_gradient_3 = "";
		if (array_key_exists("duotone_gradient_direction_3", $shortcode_atts)) $duotone_gradient_direction_3 = $shortcode_atts["duotone_gradient_direction_3"]; else $duotone_gradient_direction_3 = "to top right";
		if (array_key_exists("duotone_custom_3_2", $shortcode_atts)) $duotone_custom_3_2 = $shortcode_atts["duotone_custom_3_2"]; else $duotone_custom_3_2 = "";
		if (array_key_exists("duotone_custom_3_3", $shortcode_atts)) $duotone_custom_3_3 = $shortcode_atts["duotone_custom_3_3"]; else $duotone_custom_3_3 = "";
		
		
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "";
		
		$brankic_id = 'brankic_collage_' . brankic_string_to_class($shortcode_atts);
		
		$duotone_extra_css = $brankic_shadow_css = "";
		
		if ($duotone_custom_1 != "" && $duotone_1 == "custom") {
			if ($duotone_gradient_direction_1 == "circle") $direction_1 = "radial-gradient"; else $direction_1 = "linear-gradient";
			
			if ($duotone_gradient_1 != "true") $duotone_extra_css .= '#' . $brankic_id . ' .image_1 .single-color:before{background:' . $duotone_custom_1 . '}';
			
			if ($duotone_gradient_1 == "true" && $duotone_custom_1_2 != "" && $duotone_custom_1_3 == "") $duotone_extra_css .= '#' . $brankic_id . ' .image_1 .single-color:before{background: ' . $direction_1 . '(' . $duotone_gradient_direction_1 . ', ' . $duotone_custom_1 . ' , ' . $duotone_custom_1_2 . ');}';
			if ($duotone_gradient_1 == "true" && $duotone_custom_1_2 != "" && $duotone_custom_1_3 != "") $duotone_extra_css .= '#' . $brankic_id . ' .image_1 .single-color:before{background: ' . $direction_1 . '(' . $duotone_gradient_direction_1 . ', ' . $duotone_custom_1 . ' , ' . $duotone_custom_1_2 . ', ' . $duotone_custom_1_3 . ');}';
			
		}
		if ($duotone_custom_2 != "" && $duotone_2 == "custom") {
			if ($duotone_gradient_direction_2 == "circle") $direction_2 = "radial-gradient"; else $direction_2 = "linear-gradient";
			
			if ($duotone_gradient_2 != "true") $duotone_extra_css .= '#' . $brankic_id . ' .image_2_3 .img:first-child .single-color:before{background:' . $duotone_custom_2 . '}';
			
			if ($duotone_gradient_2 == "true" && $duotone_custom_2_2 != "" && $duotone_custom_2_3 == "") $duotone_extra_css .= '#' . $brankic_id . ' .image_2_3 .img:first-child .single-color:before{background: ' . $direction_2 . '(' . $duotone_gradient_direction_2 . ', ' . $duotone_custom_2 . ' , ' . $duotone_custom_2_2 . ');}';
			if ($duotone_gradient_2 == "true" && $duotone_custom_2_2 != "" && $duotone_custom_2_3 != "") $duotone_extra_css .= '#' . $brankic_id . ' .image_2_3 .img:first-child .single-color:before{background: ' . $direction_2 . '(' . $duotone_gradient_direction_2 . ', ' . $duotone_custom_2 . ' , ' . $duotone_custom_2_2 . ', ' . $duotone_custom_2_3 . ');}';
			
		}
		if ($duotone_custom_3 != "" && $duotone_3 == "custom") {
			if ($duotone_gradient_direction_3 == "circle") $direction_3 = "radial-gradient"; else $direction_3 = "linear-gradient";
			
			if ($duotone_gradient_3 != "true") $duotone_extra_css .= '#' . $brankic_id . ' .image_2_3 .img:last-child .single-color:before{background:' . $duotone_custom_3 . '}';
			
			if ($duotone_gradient_3 == "true" && $duotone_custom_3_2 != "" && $duotone_custom_3_3 == "") $duotone_extra_css .= '#' . $brankic_id . ' .image_2_3 .img:last-child .single-color:before{background: ' . $direction_3 . '(' . $duotone_gradient_direction_3 . ', ' . $duotone_custom_3 . ' , ' . $duotone_custom_3_2 . ');}';
			if ($duotone_gradient_3 == "true" && $duotone_custom_3_2 != "" && $duotone_custom_3_3 != "") $duotone_extra_css .= '#' . $brankic_id . ' .image_2_3 .img:last-child .single-color:before{background: ' . $direction_3 . '(' . $duotone_gradient_direction_3 . ', ' . $duotone_custom_3 . ' , ' . $duotone_custom_3_2 . ', ' . $duotone_custom_3_3 . ');}';
			
		}
		
		if ($shadow_color != "") {
		
			$brankic_shadow_css = '#' . $brankic_id . ' .single-image-wrap[data-box-shadow="true"] img { box-shadow: 0px 20px 75px 0 ' . $shadow_color . '; }';
								  
		}
		
		return $duotone_extra_css . $brankic_shadow_css;

	}
	if ($shortcode == "brankic_restaurant_menu_item"){
		
		if (array_key_exists("title_color", $shortcode_atts)) $title_color = $shortcode_atts["title_color"]; else $title_color = "";
		if (array_key_exists("description_color", $shortcode_atts)) $description_color = $shortcode_atts["description_color"]; else $description_color = "";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";
		
		$brankic_id = 'brankic_restaurant_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_id = 'brankic_restaurant_' . $unique;
		$brankic_restaurant_css = "";
		
		if ($title_color != "") $brankic_restaurant_css .= '#' . $brankic_id . ' .menu-item { color:' . $title_color . '; }';
		if ($title_color != "") $brankic_restaurant_css .= '#' . $brankic_id . ' .menu-price { color:' . $title_color . '; }';
		if ($description_color != "") $brankic_restaurant_css .= '#' . $brankic_id . ' .menu-description { color:' . $description_color . '; }';
								  
		
		return $brankic_restaurant_css;
		
		

	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($shortcode == "brankic_tabs_wrapper"){
		
		if (array_key_exists("style", $shortcode_atts)) $style = $shortcode_atts["style"]; else $style = "rounded";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("tab_text_color", $shortcode_atts)) $tab_text_color = $shortcode_atts["tab_text_color"]; else $tab_text_color = "";
		if (array_key_exists("icon_color", $shortcode_atts)) $icon_color = $shortcode_atts["icon_color"]; else $icon_color = "";
		if (array_key_exists("active_icon_color", $shortcode_atts)) $active_icon_color = $shortcode_atts["active_icon_color"]; else $active_icon_color = "";
		if (array_key_exists("active_tab_bg_color", $shortcode_atts)) $active_tab_bg_color = $shortcode_atts["active_tab_bg_color"]; else $active_tab_bg_color = "";
		if (array_key_exists("active_tab_bg_color_2", $shortcode_atts)) $active_tab_bg_color_2 = $shortcode_atts["active_tab_bg_color_2"]; else $active_tab_bg_color_2 = "";
		if (array_key_exists("tab_bg_color", $shortcode_atts)) $tab_bg_color = $shortcode_atts["tab_bg_color"]; else $tab_bg_color = "";
		if (array_key_exists("active_tab_text_color", $shortcode_atts)) $active_tab_text_color = $shortcode_atts["active_tab_text_color"]; else $active_tab_text_color = "";
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "";
		//if (array_key_exists("border_color", $shortcode_atts)) $border_color = $shortcode_atts["border_color"]; else $border_color = "";
		if (array_key_exists("active_border_color", $shortcode_atts)) $active_border_color = $shortcode_atts["active_border_color"]; else $active_border_color = "";
		
		$brankic_id = 'tab_container_' . brankic_string_to_class($shortcode_atts);
		
		$custom_css = "";
	if ($style == "dotted"){
		
		if ($bg_color != "") $custom_css .= '#' . $brankic_id . ' {background: ' . $bg_color . ';}'; 
		if ($tab_text_color != "") $custom_css .= '#' . $brankic_id . ' li.tab {color: ' . $tab_text_color . ';}'; 
		//$custom_css .= '#tab-container-' . $brankic_id . ' .tab {background: ' . $tab_color . ';}'; 
		if ($icon_color != "") $custom_css .= '#' . $brankic_id . ' .tab a i {color: ' . $icon_color . ';}'; 
		if ($active_icon_color != "") $custom_css .= '#' . $brankic_id . ' .tab a.active i {color: ' . $active_icon_color . ';}'; 
		
	}
	
	if ($style == "rounded"){
		
		if ($active_tab_bg_color_2 != "") $active_tab_bg_color = 'linear-gradient(120deg, ' . $active_tab_bg_color . ', ' . $active_tab_bg_color_2 . ')';
		
		if ($tab_bg_color != "") $custom_css .= '#' . $brankic_id . ' ul {background: ' . $tab_bg_color . ';}';
		if ($tab_text_color != "") $custom_css .= '#' . $brankic_id . ' .tab  a {color: ' . $tab_text_color . ';}'; 
		if ($active_tab_bg_color != "") $custom_css .= '#' . $brankic_id . ' .tab.active  a {background: ' . $active_tab_bg_color . ';}'; 
		if ($active_tab_text_color != "") $custom_css .= '#' . $brankic_id . ' .tab.active  a {color: ' . $active_tab_text_color . ';}';
		if ($shadow_color != "") $custom_css .= '#' . $brankic_id . ' ul {box-shadow: 0px 10px 40px 0 ' . $shadow_color . ';}'; 
		
	}
	
	if ($style == "minimal"){
		
		if ($tab_text_color != "") $custom_css .= '#' . $brankic_id . '.minimal .tab a {color: ' . $tab_text_color . ';}';
		if ($active_tab_text_color != "") $custom_css .= '#' . $brankic_id . '.minimal .tab a.active {color: ' . $active_tab_text_color . ';}';
		if ($icon_color != "") $custom_css .= '#' . $brankic_id . '.minimal .tab a i {color: ' . $icon_color . ';}';
		if ($active_icon_color != "") $custom_css .= '#' . $brankic_id . '.minimal .tab a.active i {color: ' . $active_icon_color . ';}';
		//if ($border_color != "") $custom_css .= '#' . $brankic_id . '.minimal .tab a:after {border-bottom-color: ' . $border_color . ';}';
		if ($active_border_color != "") $custom_css .= '#' . $brankic_id . '.minimal .tab a.active:after {border-bottom-color: ' . $active_border_color . ';}';
		
	}
								  
		
		return $custom_css;
		
		

	}
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ($shortcode == "brankic_contact_form_7"){
		
		if (array_key_exists("cf_7_id", $shortcode_atts)) $cf_7_id = $shortcode_atts["cf_7_id"]; else $cf_7_id = "";
		if (array_key_exists("color", $shortcode_atts)) $color = $shortcode_atts["color"]; else $color = "";
		if (array_key_exists("border_color", $shortcode_atts)) $border_color = $shortcode_atts["border_color"]; else $border_color = "";
		if (array_key_exists("active_input_border_color", $shortcode_atts)) $active_input_border_color = $shortcode_atts["active_input_border_color"]; else $active_input_border_color = "";
		if (array_key_exists("submit_button_text_color", $shortcode_atts)) $submit_button_text_color = $shortcode_atts["submit_button_text_color"]; else $submit_button_text_color = "";
		if (array_key_exists("submit_button_bg_color", $shortcode_atts)) $submit_button_bg_color = $shortcode_atts["submit_button_bg_color"]; else $submit_button_bg_color = "";
		if (array_key_exists("submit_button_hover_text_color", $shortcode_atts)) $submit_button_hover_text_color = $shortcode_atts["submit_button_hover_text_color"]; else $submit_button_hover_text_color = "";
		if (array_key_exists("submit_button_hover_bg_color", $shortcode_atts)) $submit_button_hover_bg_color = $shortcode_atts["submit_button_hover_bg_color"]; else $submit_button_hover_bg_color = "";
		
	
		$brankic_cf7_inline_css = "";
		if ($color != "") $brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '{color:' . $color . ';}';
		if ($border_color != "") $brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.table p{border-color:' . $border_color . ';}';
		if ($border_color != "") $brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.table{border-color:' . $border_color . ';}';
		
		if ($color != "") $brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . ' div[data-color="true"],
		#brankic_contact_form_' . $cf_7_id . ' div[data-color="true"] label{color:' . $color . ';}';
		
		if ($border_color != "") {
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.outlined div[data-border-color="true"] input:not(:focus),
										#brankic_contact_form_' . $cf_7_id . '.outlined div[data-border-color="true"] textarea:not(:focus),
										#brankic_contact_form_' . $cf_7_id . '.outlined div[data-border-color="true"] select:not(:focus),
										#brankic_contact_form_' . $cf_7_id . '.creative div[data-border-color="true"] input,
										#brankic_contact_form_' . $cf_7_id . '.creative div[data-border-color="true"] textarea,
										#brankic_contact_form_' . $cf_7_id . '.creative div[data-border-color="true"] select{border-color:' . $border_color . ';}';
										
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.default div[data-border-color="true"] input,
										#brankic_contact_form_' . $cf_7_id . '.default div[data-border-color="true"] textarea,
										#brankic_contact_form_' . $cf_7_id . '.default div[data-border-color="true"] select{background-color:' . $border_color . ';}
										#brankic_contact_form_' . $cf_7_id . '.default div[data-border-color="true"] p.select span:before{background-color:' . $border_color . ';}';
										
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.table div[data-border-color="true"] div p {border-color:' . $border_color . ';}';							
			
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.minimal div[data-border-color="true"] .bar {border-color:' . $border_color . ';}';
			
										
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.default div[data-border-color="true"] input,
										#brankic_contact_form_' . $cf_7_id . '.default div[data-border-color="true"] textarea,
										#brankic_contact_form_' . $cf_7_id . '.default div[data-border-color="true"] select{background-color:' . $border_color . ';}
										#brankic_contact_form_' . $cf_7_id . '.default div[data-border-color="true"] p.select span:before{background-color:' . $border_color . ';}';
										
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.table div[data-border-color="true"] div p {border-color:' . $border_color . ';}';							
			
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.minimal div[data-border-color="true"] .bar {border-color:' . $border_color . ';}';
			
		}
		
		if ($active_input_border_color != "") {
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.default input[type="text"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.default input[type="email"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.default input[type="url"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.default input[type="tel"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.default input[type="date"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.default input[type="password"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.default input[type="search"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.default textarea:focus, 
										#brankic_contact_form_' . $cf_7_id . '.default select:focus {
											border-color: ' . $active_input_border_color . ';}';
		
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.outlined input[type="text"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.outlined input[type="email"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.outlined input[type="url"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.outlined input[type="tel"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.outlined input[type="date"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.outlined input[type="password"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.outlined input[type="search"]:focus, 
										#brankic_contact_form_' . $cf_7_id . '.outlined textarea:focus, 
										#brankic_contact_form_' . $cf_7_id . '.outlined select:focus {
											border-color: ' . $active_input_border_color . ';}';
													
			$brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . '.minimal input:focus ~ .bar:after, 
										#brankic_contact_form_' . $cf_7_id . '.minimal textarea:focus ~ .bar:after, 
										#brankic_contact_form_' . $cf_7_id . '.minimal .bar.focus:after, 
										#brankic_contact_form_' . $cf_7_id . '.minimal .bar.focus:after {
										background: ' . $active_input_border_color . ';}';
		
		}
		
		if ($submit_button_text_color != "") $brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . ' input[type="submit"] {color:' . $submit_button_text_color . ';}';
		if ($submit_button_bg_color != "") $brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . ' input[type="submit"] {background-color:' . $submit_button_bg_color . ';}';
		if ($submit_button_hover_text_color != "") $brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . ' input[type="submit"]:hover {color:' . $submit_button_hover_text_color . ';}';
		if ($submit_button_hover_bg_color != "") $brankic_cf7_inline_css .= '#brankic_contact_form_' . $cf_7_id . ' input[type="submit"]:hover {background-color:' . $submit_button_hover_bg_color . ';}';
								  
		
		return $brankic_cf7_inline_css;
		
		

	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if ($shortcode == "brankic_progress_bars_wrapper"){
		
		if (array_key_exists("bar_radius", $shortcode_atts)) $bar_radius = $shortcode_atts["bar_radius"]; else $bar_radius = "50em";
		if (array_key_exists("style", $shortcode_atts)) $style = $shortcode_atts["style"]; else $style = "";

		
		
		if ($style != "") {
			$brankic_id = 'brankic_progress_bars_wrapper_' . brankic_string_to_class($shortcode_atts);
			$radius_css = '#' . $brankic_id . ' .skills-graph.rounded li span,.skills-graph.rounded li div,.skills-graph.rounded li div:after {border-radius: ' . $bar_radius . ';}';
			return $radius_css;
		}
		
	}
	
	if ($shortcode == "brankic_flipbox"){
		
		if (array_key_exists("front_bg_image", $shortcode_atts)) $front_bg_image = $shortcode_atts["front_bg_image"]; else $front_bg_image = "";
		if (array_key_exists("front_bg_image_extra", $shortcode_atts)) $front_bg_image_extra = $shortcode_atts["front_bg_image_extra"]; else $front_bg_image_extra = "";
		if (array_key_exists("front_bg_color", $shortcode_atts)) $front_bg_color = $shortcode_atts["front_bg_color"]; else $front_bg_color = "";
		if (array_key_exists("front_bg_color_2", $shortcode_atts)) $front_bg_color_2 = $shortcode_atts["front_bg_color_2"]; else $front_bg_color_2 = "";
		if (array_key_exists("back_bg_color", $shortcode_atts)) $back_bg_color = $shortcode_atts["back_bg_color"]; else $back_bg_color = "";
		if (array_key_exists("back_bg_color_2", $shortcode_atts)) $back_bg_color_2 = $shortcode_atts["back_bg_color_2"]; else $back_bg_color_2 = "";
		if (array_key_exists("border_radius", $shortcode_atts)) $border_radius = $shortcode_atts["border_radius"]; else $border_radius = "";
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "";
		if (array_key_exists("front_content_color", $shortcode_atts)) $front_content_color = $shortcode_atts["front_content_color"]; else $front_content_color = "";
		if (array_key_exists("back_content_color", $shortcode_atts)) $back_content_color = $shortcode_atts["back_content_color"]; else $back_content_color = "";
		
		$brankic_id = 'flipbox_' . brankic_string_to_class($shortcode_atts);
	
		$front_bg_image = wp_get_attachment_image_src($front_bg_image, 'full');
		if( $front_bg_image ) $front_bg_image = $front_bg_image[0];
		if ($front_bg_image_extra != "") $front_bg_image = $front_bg_image_extra;
		
		$flipbox_css = "";
		
		if ($front_bg_color != "") $front_bg_color = 'linear-gradient(120deg, ' . $front_bg_color . ' 0%, ' . $front_bg_color_2 . ' 100%);';
		if ($back_bg_color_2 != "") $back_bg_color = 'linear-gradient(120deg, ' . $back_bg_color . ' 0%, ' . $back_bg_color_2 . ' 100%);';
		

		
		if ($front_bg_color != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-skin .background-color{background:' . $front_bg_color . ';}';
		if ($border_radius != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-skin{border-radius:' . $border_radius . ';}';
		if ($shadow_color != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-skin{box-shadow: 0px 20px 60px 0 ' . $shadow_color . ';}';
		if ($front_content_color != "") $flipbox_css .= '#' . $brankic_id . ' .flipbox-front{color:' . $front_content_color . ';}';
		if ($front_bg_image != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-skin .row-bg.background-image{background-image: url(' . $front_bg_image . ');}';
		
		if ($back_bg_color != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-back{background:' . $back_bg_color . '}';
		if ($back_content_color != "") 	$flipbox_css .= '#' . $brankic_id . ' .flipbox-back{color:' . $back_content_color . ';}';
		if ($border_radius != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-back{border-radius:' . $border_radius . ';}';
		if ($shadow_color != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-back{box-shadow: 0px 20px 60px 0 ' . $shadow_color . ';}';

		
		return $flipbox_css;
	}
	
	if ($shortcode == "brankic_instafeed"){
		
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone", $shortcode_atts)) $duotone = $shortcode_atts["duotone"]; else $duotone = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("var", $shortcode_atts)) $var = $shortcode_atts["var"]; else $var = "";
		if (array_key_exists("var", $shortcode_atts)) $var = $shortcode_atts["var"]; else $var = "";
		
		$brankic_id = 'brankic_instafeed_' . brankic_string_to_class($shortcode_atts);
		$duotone_extra_css = "";
		
		if ($duotone_custom != "" && $duotone == "custom") {
			
			if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
			
			if ($duotone_gradient != "true") $duotone_extra_css = '#' . $brankic_id . ' .single-color:before{background:' . $duotone_custom . '}';
			
			if ($duotone_gradient == "true" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $duotone_extra_css = '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
			if ($duotone_gradient == "true" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $duotone_extra_css = '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		}
	
		return $duotone_extra_css;
	}
	
	if ($shortcode == "brankic_instafeed_20"){
		
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone", $shortcode_atts)) $duotone = $shortcode_atts["duotone"]; else $duotone = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		//if (array_key_exists("var", $shortcode_atts)) $var = $shortcode_atts["var"]; else $var = "";
		//if (array_key_exists("var", $shortcode_atts)) $var = $shortcode_atts["var"]; else $var = "";
		
		$brankic_id = 'brankic_instafeed_20_' . brankic_string_to_class($shortcode_atts);
		$duotone_extra_css = "";
		
		if ($duotone_custom != "" && $duotone == "custom") {
			
			if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
			
			if ($duotone_gradient != "true") $duotone_extra_css = '#' . $brankic_id . ' .single-color:before{background:' . $duotone_custom . '}';
			
			if ($duotone_gradient == "true" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $duotone_extra_css = '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
			if ($duotone_gradient == "true" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $duotone_extra_css = '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		}
	
		return $duotone_extra_css;
	}
	
	if ($shortcode == "brankic_overlap_text"){
		
		if (array_key_exists("h_size", $shortcode_atts)) $h_size = $shortcode_atts["h_size"]; else $h_size = "";
		if (array_key_exists("h_size_custom", $shortcode_atts)) $h_size_custom = $shortcode_atts["h_size_custom"]; else $h_size_custom = "";
		if (array_key_exists("h_height", $shortcode_atts)) $h_height = $shortcode_atts["h_height"]; else $h_height = "";
		if (array_key_exists("h_height_custom", $shortcode_atts)) $h_height_custom = $shortcode_atts["h_height_custom"]; else $h_height_custom = "";
		if (array_key_exists("h_spacing", $shortcode_atts)) $h_spacing = $shortcode_atts["h_spacing"]; else $h_spacing = "";
		if (array_key_exists("h_spacing_custom", $shortcode_atts)) $h_spacing_custom = $shortcode_atts["h_spacing_custom"]; else $h_spacing_custom = "";
		if (array_key_exists("p_size", $shortcode_atts)) $p_size = $shortcode_atts["p_size"]; else $p_size = "";
		if (array_key_exists("p_size_custom", $shortcode_atts)) $p_size_custom = $shortcode_atts["p_size_custom"]; else $p_size_custom = "";
		if (array_key_exists("p_height", $shortcode_atts)) $p_height = $shortcode_atts["p_height"]; else $p_height = "";
		if (array_key_exists("p_height_custom", $shortcode_atts)) $p_height_custom = $shortcode_atts["p_height_custom"]; else $p_height_custom = "";
		if (array_key_exists("p_spacing", $shortcode_atts)) $p_spacing = $shortcode_atts["p_spacing"]; else $p_spacing = "";
		if (array_key_exists("p_spacing_custom", $shortcode_atts)) $p_spacing_custom = $shortcode_atts["p_spacing_custom"]; else $p_spacing_custom = "";
		if (array_key_exists("h_weight", $shortcode_atts)) $h_weight = $shortcode_atts["h_weight"]; else $h_weight = "";
		if (array_key_exists("h_style", $shortcode_atts)) $h_style = $shortcode_atts["h_style"]; else $h_style = "";
		if (array_key_exists("h_transform", $shortcode_atts)) $h_transform = $shortcode_atts["h_transform"]; else $h_transform = "";
		if (array_key_exists("p_weight", $shortcode_atts)) $p_weight = $shortcode_atts["p_weight"]; else $p_weight = "";
		if (array_key_exists("p_style", $shortcode_atts)) $p_style = $shortcode_atts["p_style"]; else $p_style = "";
		if (array_key_exists("p_transform", $shortcode_atts)) $p_transform = $shortcode_atts["p_transform"]; else $p_transform = "";

		
		$brankic_id = 'brankic_overlap_text_' . brankic_string_to_class($shortcode_atts);
		
	   if ($h_size_custom != "") $h_size = $h_size_custom;
	   if ($h_height_custom != "") $h_height = $h_height_custom;
	   if ($h_spacing_custom != "") $h_spacing = $h_spacing_custom;
	   if ($p_size_custom != "") $p_size = $p_size_custom;
	   if ($p_height_custom != "") $p_height = $p_height_custom;
	   if ($p_spacing_custom != "") $p_spacing = $p_spacing_custom;
	     
   
	   if ($h_size != "") $h_size = 'font-size:' . $h_size . ';';
	   if ($h_weight != "") $h_weight = 'font-weight:' . $h_weight . ';';
	   if ($h_style != "") $h_style = 'font-style:' . $h_style . ';';
	   if ($h_transform != "") $h_transform = 'text-transform:' . $h_transform . ';';
	   if ($h_spacing != "") $h_spacing = 'letter-spacing:' . $h_spacing . ';';
	   if ($h_height != "") $h_height = 'line-height:' . $h_height . ';';
	   if ($p_size != "") $p_size = 'font-size:' . $p_size . ';';
	   if ($p_weight != "") $p_weight = 'font-weight:' . $p_weight . ';';
	   if ($p_style != "") $p_style = 'font-style:' . $p_style . ';'; 
	   if ($p_transform != "") $p_transform = 'text-transform:' . $p_transform . ';';
	   if ($p_spacing != "") $p_spacing = 'letter-spacing:' . $p_spacing . ';';
	   if ($p_height != "") $p_height = 'line-height:' . $p_height . ';';
	   
	   
	   
	   $overlap_text_css = '#' . $brankic_id . ' .overlap-inner{' . $h_size . $h_weight . $h_style . $h_transform . $h_spacing . $h_height . '}';
	   $overlap_text_css .= '#' . $brankic_id . ' .overlap-heading{' . $p_size . $p_weight . $p_style . $p_transform . $p_spacing . $p_height . '}';
	   
	   

		
		return $overlap_text_css;
	}
	
	if ($shortcode == "brankic_team_member"){
		
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		if (array_key_exists("icon_color", $shortcode_atts)) $icon_color = $shortcode_atts["icon_color"]; else $icon_color = "#000000";
		if (array_key_exists("style", $shortcode_atts)) $style = $shortcode_atts["style"]; else $style = "default";
		if (array_key_exists("name_position_bg_color", $shortcode_atts)) $name_position_bg_color = $shortcode_atts["name_position_bg_color"]; else $name_position_bg_color = "";
		if (array_key_exists("name_position_bg_color_2", $shortcode_atts)) $name_position_bg_color_2 = $shortcode_atts["name_position_bg_color_2"]; else $name_position_bg_color_2 = "";
		if (array_key_exists("name_color", $shortcode_atts)) $name_color = $shortcode_atts["name_color"]; else $name_color = "#000000";
		if (array_key_exists("position_color", $shortcode_atts)) $position_color = $shortcode_atts["position_color"]; else $position_color = "#000000";
		if (array_key_exists("name_position_bg_color_gradient_direction", $shortcode_atts)) $name_position_bg_color_gradient_direction = $shortcode_atts["name_position_bg_color_gradient_direction"]; else $name_position_bg_color_gradient_direction = "to top right";
		if (array_key_exists("shadow", $shortcode_atts)) $shadow = $shortcode_atts["shadow"]; else $shadow = "";
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";
		
		
		$brankic_id = 'brankic_team_member_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_id = 'brankic_team_member_' . $unique;
	
		$brankic_style = "";
		
		if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		
		
		
		if ($duotone_gradient != "true" && $duotone_custom != "") $brankic_style .= '#' . $brankic_id . ' .single-color:before{background:' . $duotone_custom . '}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $brankic_style .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $brankic_style .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
		if ($style == "default overlay") {
			$brankic_style .= '#'. $brankic_id  . ' .team-member-info-holder:after {' . brankic_background($name_position_bg_color, $name_position_bg_color_2, 135) . '}';
		}
		
		if ($style == "overlay-hidden") {
	   		$brankic_style .= '#'. $brankic_id  . ' .team-member-info-holder:after {' . brankic_background($name_position_bg_color, $name_position_bg_color_2) . '}'; 
		}
		
		if ($style == "overlay-figcaption transparent")
		{
			$brankic_style .= '#'. $brankic_id  . ' .team-member-info-holder:after {' . brankic_background($name_position_bg_color, "rgba(255,0,0,0)", 90) . '}';
		}
		
		
		if ($icon_color != "") $brankic_style .= '#' . $brankic_id . ' .social-bookmarks{color:' . $icon_color . ';}';
		
		if ($name_color != "") $brankic_style .= '#' . $brankic_id . ' figcaption h3{color:' . $name_color . ';}';
		if ($position_color != "") $brankic_style .= '#' . $brankic_id . ' figcaption small{color:' . $position_color . ';}';
		
		if ($name_position_bg_color_gradient_direction == "circle") $bg_direction = "radial-gradient"; else $bg_direction = "linear-gradient";
		
		if ($style == "overlay-hidden") {
			if ($name_position_bg_color != "" && $name_position_bg_color_2 == "") $brankic_style .= '#' . $brankic_id . ' .team-member-info-holder:after{background: ' . $name_position_bg_color . ';}';
			if ($name_position_bg_color != "" && $name_position_bg_color_2 != "") $brankic_style .= '#' . $brankic_id . ' .team-member-info-holder:after{background: ' . $bg_direction . '(' . $name_position_bg_color_gradient_direction . ', ' . $name_position_bg_color . ' , ' . $name_position_bg_color_2 . ');}';
		}
		
		if ($style == "overlay-figcaption" || $style == "overlay-figcaption" || $style == "overlay-outset") {
			if ($name_position_bg_color != "" && $name_position_bg_color_2 == "") $brankic_style .= '#' . $brankic_id . ' figcaption{background: ' . $name_position_bg_color . ';}';
			if ($name_position_bg_color != "" && $name_position_bg_color_2 != "") $brankic_style .= '#' . $brankic_id . ' figcaption{background: ' . $bg_direction . '(' . $name_position_bg_color_gradient_direction . ', ' . $name_position_bg_color . ' , ' . $name_position_bg_color_2 . ');}';
		}
		
		//if ($style == "overlay-outset") {
			
			//if ($shadow == "true") $brankic_style .= '#'. $brankic_id  . '.overlay_outset_shadow {box-shadow: 0 10px 40px 0 ' . $shadow_color . ';}';
		//} else {
			if ($shadow == "true") $brankic_style .= '#'. $brankic_id  . ' .box-shadow {box-shadow: 0 10px 40px 0 ' . $shadow_color . ';}';
		//}
		

		
		return $brankic_style;
	}

	if ($shortcode == "brankic_steps_wrapper"){
		
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "#ff2d57";
		if (array_key_exists("border_width", $shortcode_atts)) $border_width = $shortcode_atts["border_width"]; else $border_width = "4px";
		if (array_key_exists("border_color", $shortcode_atts)) $border_color = $shortcode_atts["border_color"]; else $border_color = "#2E3748";
		if (array_key_exists("number_color", $shortcode_atts)) $number_color = $shortcode_atts["number_color"]; else $number_color = "#000";
		if (array_key_exists("heading_color", $shortcode_atts)) $heading_color = $shortcode_atts["heading_color"]; else $heading_color = "#000";
		if (array_key_exists("content_color", $shortcode_atts)) $content_color = $shortcode_atts["content_color"]; else $content_color = "#000";
		if (array_key_exists("shadow", $shortcode_atts)) $shadow = $shortcode_atts["shadow"]; else $shadow = "";
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "rgba(255,45,87, 0.06)";
		if (array_key_exists("shadow_2_color", $shortcode_atts)) $shadow_2_color = $shortcode_atts["shadow_2_color"]; else $shadow_2_color = "rgba(255,45,87, 0.05)";
		if (array_key_exists("shadow_3_color", $shortcode_atts)) $shadow_3_color = $shortcode_atts["shadow_3_color"]; else $shadow_3_color = "rgba(255,45,87, 0.04)";
		
		$brankic_id = 'brankic_steps_wrapper_' . brankic_string_to_class($shortcode_atts);
	
		$line_color = $border_color;
		if ($line_color == "") $line_color = $bg_color;

		$process_style = "";
		if ($bg_color != "") $process_style .= '#' . $brankic_id . ' .step-wrap .step-number:after { background: ' . $bg_color . ';}';
		if ($border_width != "") $process_style .= '#' . $brankic_id . ' .step-wrap .step-number:after { border-width: ' . $border_width . ';}';
		if ($border_color != "") $process_style .= '#' . $brankic_id . ' .step-wrap .step-number:after { border-color: ' . $border_color . ' !important; }';
		if ($line_color != "") $process_style .= '#' . $brankic_id . ' .step-wrap .divider span { border-color: ' . $line_color . ';}';
		if ($number_color != "") $process_style .= '#' . $brankic_id . ' .step-wrap .step-number { color: ' . $number_color . '; }';
		if ($heading_color != "") $process_style .= '#' . $brankic_id . ' .step-wrap .step-inner h3 { color: ' . $heading_color . '; }';
		if ($content_color != "") $process_style .= '#' . $brankic_id . ' .step-wrap .step-inner { color: ' . $content_color . '; }';
		
		if ($shadow == "true")	$process_style .= '#' . $brankic_id . '.process .step-wrap .step-number:after { box-shadow: 0 0 0 5px ' . $shadow_color . ', 0 0 0 11px ' . $shadow_2_color . ', 0 0 0 17px ' . $shadow_3_color . '; }';

		
		return $process_style;
	}

	if ($shortcode == "brankic_scroll_button"){
		
		if (array_key_exists("color", $shortcode_atts)) $color = $shortcode_atts["color"]; else $color = "#ffffff";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";		
		
		$brankic_id = 'brankic_scroll_button_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_id = 'brankic_scroll_button_' . $unique;
	

		$scroll_button_style = '#' . $brankic_id . '{color:' . $color . ';}';
		
		return $scroll_button_style;
	}

	if ($shortcode == "brankic_category"){
		
		if (array_key_exists("layout", $shortcode_atts)) $layout = $shortcode_atts["layout"]; else $layout = "blog-style-1";
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "rgba(0, 0, 0, .24)";
		if (array_key_exists("title_color", $shortcode_atts)) $title_color = $shortcode_atts["title_color"]; else $title_color = "";
		if (array_key_exists("active_title_color", $shortcode_atts)) $active_title_color = $shortcode_atts["active_title_color"]; else $active_title_color = "";
		if (array_key_exists("active_meta_color", $shortcode_atts)) $active_meta_color = $shortcode_atts["active_meta_color"]; else $active_meta_color = "";
		if (array_key_exists("hover_color", $shortcode_atts)) $hover_color = $shortcode_atts["hover_color"]; else $hover_color = "";
		if (array_key_exists("hover_2_color", $shortcode_atts)) $hover_2_color = $shortcode_atts["hover_2_color"]; else $hover_2_color = "";
		if (array_key_exists("border_hover_color", $shortcode_atts)) $border_hover_color = $shortcode_atts["border_hover_color"]; else $border_hover_color = "";
		if (array_key_exists("titles_weight", $shortcode_atts)) $titles_weight = $shortcode_atts["titles_weight"]; else $titles_weight = "";
		if (array_key_exists("category_color", $shortcode_atts)) $category_color = $shortcode_atts["category_color"]; else $category_color = "#000000";
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		if (array_key_exists("use_gradient_bg", $shortcode_atts)) $use_gradient_bg = $shortcode_atts["use_gradient_bg"]; else $use_gradient_bg = "";
		if (array_key_exists("bg_gradient_direction", $shortcode_atts)) $bg_gradient_direction = $shortcode_atts["bg_gradient_direction"]; else $bg_gradient_direction = "to top right";
		if (array_key_exists("bg_color_1", $shortcode_atts)) $bg_color_1 = $shortcode_atts["bg_color_1"]; else $bg_color_1 = "";
		if (array_key_exists("bg_color_2", $shortcode_atts)) $bg_color_2 = $shortcode_atts["bg_color_2"]; else $bg_color_2 = "";
		if (array_key_exists("bg_color_3", $shortcode_atts)) $bg_color_3 = $shortcode_atts["bg_color_3"]; else $bg_color_3 = "";
		if (array_key_exists("h_size", $shortcode_atts)) $h_size = $shortcode_atts["h_size"]; else $h_size = "";
		if (array_key_exists("h_size_custom", $shortcode_atts)) $h_size_custom = $shortcode_atts["h_size_custom"]; else $h_size_custom = "";
		if (array_key_exists("h_height", $shortcode_atts)) $h_height = $shortcode_atts["h_height"]; else $h_height = "";
		if (array_key_exists("h_height_custom", $shortcode_atts)) $h_height_custom = $shortcode_atts["h_height_custom"]; else $h_height_custom = "";
		if (array_key_exists("h_spacing", $shortcode_atts)) $h_spacing = $shortcode_atts["h_spacing"]; else $h_spacing = "";
		if (array_key_exists("h_spacing_custom", $shortcode_atts)) $h_spacing_custom = $shortcode_atts["h_spacing_custom"]; else $h_spacing_custom = "";
		if (array_key_exists("h_style", $shortcode_atts)) $h_style = $shortcode_atts["h_style"]; else $h_style = "";
		if (array_key_exists("h_transform", $shortcode_atts)) $h_transform = $shortcode_atts["h_transform"]; else $h_transform = "";
		if (array_key_exists("title_font_family", $shortcode_atts)) $title_font_family = $shortcode_atts["title_font_family"]; else $title_font_family = "";
		if (array_key_exists("custom_title_font_family", $shortcode_atts)) $custom_title_font_family = $shortcode_atts["custom_title_font_family"]; else $custom_title_font_family = "";
		if (array_key_exists("custom_cursor", $shortcode_atts)) $custom_cursor = $shortcode_atts["custom_cursor"]; else $custom_cursor = "";		
		if (array_key_exists("boxed", $shortcode_atts)) $boxed = $shortcode_atts["boxed"]; else $boxed = "";	
		if (array_key_exists("custom_cursor_color", $shortcode_atts)) $custom_cursor_color = $shortcode_atts["custom_cursor_color"]; else $custom_cursor_color = "#ffcc99";
		if (array_key_exists("custom_cursor_bg", $shortcode_atts)) $custom_cursor_bg = $shortcode_atts["custom_cursor_bg"]; else $custom_cursor_bg = "#403a3e";
		if (array_key_exists("content_color", $shortcode_atts)) $content_color = $shortcode_atts["content_color"]; else $content_color = "";		
		if (array_key_exists("split_color", $shortcode_atts)) $split_color = $shortcode_atts["split_color"]; else $split_color = "";
		if (array_key_exists("bg_img_color", $shortcode_atts)) $bg_img_color = $shortcode_atts["bg_img_color"]; else $bg_img_color = "";
		if (array_key_exists("only_next_duotone_custom", $shortcode_atts)) $only_next_duotone_custom = $shortcode_atts["only_next_duotone_custom"]; else $only_next_duotone_custom = "";
		if (array_key_exists("only_next_duotone_gradient", $shortcode_atts)) $only_next_duotone_gradient = $shortcode_atts["only_next_duotone_gradient"]; else $only_next_duotone_gradient = "";
		if (array_key_exists("only_next_duotone_custom_2", $shortcode_atts)) $only_next_duotone_custom_2 = $shortcode_atts["only_next_duotone_custom_2"]; else $only_next_duotone_custom_2 = "";
		if (array_key_exists("only_next_duotone_custom_3", $shortcode_atts)) $only_next_duotone_custom_3 = $shortcode_atts["only_next_duotone_custom_3"]; else $only_next_duotone_custom_3 = "";
		if (array_key_exists("only_next_duotone_gradient_direction", $shortcode_atts)) $only_next_duotone_gradient_direction = $shortcode_atts["only_next_duotone_gradient_direction"]; else $only_next_duotone_gradient_direction = "to top right";
		if (array_key_exists("only_next_split_color", $shortcode_atts)) $only_next_split_color = $shortcode_atts["only_next_split_color"]; else $only_next_split_color = "";
		if (array_key_exists("only_next_title_color", $shortcode_atts)) $only_next_title_color = $shortcode_atts["only_next_title_color"]; else $only_next_title_color = "";
		if (array_key_exists("custom_title_colors", $shortcode_atts)) $custom_title_colors = $shortcode_atts["custom_title_colors"]; else $custom_title_colors = "";
		if (array_key_exists("custom_category_colors", $shortcode_atts)) $custom_category_colors = $shortcode_atts["custom_category_colors"]; else $custom_category_colors = "";
		if (array_key_exists("custom_title_hovers", $shortcode_atts)) $custom_title_hovers = $shortcode_atts["custom_title_hovers"]; else $custom_title_hovers = "";
		if (array_key_exists("emphasize_first_post", $shortcode_atts)) $emphasize_first_post = $shortcode_atts["emphasize_first_post"]; else $emphasize_first_post = "";
		if (array_key_exists("emphasize_style", $shortcode_atts)) $emphasize_style = $shortcode_atts["emphasize_style"]; else $emphasize_style = "style_3";
		if (array_key_exists("post_meta_style", $shortcode_atts)) $post_meta_style = $shortcode_atts["post_meta_style"]; else $post_meta_style = "";
		
		
		
		
		$brankic_cat_id = 'brankic_category_' . brankic_string_to_class($shortcode_atts);
		
		$custom_title_colors_array = array();
		$custom_category_colors_array = array();
		$custom_title_hovers_array = array();
		
		$custom_title_color_css = "";
		$custom_css_selector = "";
		$custom_css_declaration = "";		
		
		if ($custom_title_colors != "") {
			$custom_title_colors_array = explode(",", $custom_title_colors);
			$custom_title_colors_array = array_map('trim', $custom_title_colors_array);
			
			
			$j = 0;
			foreach ($custom_title_colors_array as $i => $custom_title_color){
				$j = $i + 1;
				if ($layout == "portfolio-caption-hidden-6"){
					$custom_css_selector = '#' . $brankic_cat_id . '.fig_hid.hover6 article:nth-child(' . $j . ') .entry-title'; 
					$custom_css_declaration = '{color: ' . $custom_title_color . ';}';
				}
				if ($layout == "portfolio-caption-hidden-5"){
					$custom_css_selector = '#' . $brankic_cat_id . '.fig_hid.hover5 article:nth-child(' . $j . ') .entry-title'; 
					$custom_css_declaration = '{color: ' . $custom_title_color . '}';
				}
				$custom_title_color_css = $custom_css_selector . $custom_css_declaration;
				$old_database_css = get_post_meta( get_the_ID(), 'myriad_brankic_custom_title_css', true);
				if (substr_count($old_database_css, $custom_title_color_css) == 0) update_post_meta( get_the_ID(), 'myriad_brankic_custom_title_css', $old_database_css.$custom_title_color_css);
			}

						
			
		}
		
		if ($custom_category_colors != "") {
			$custom_category_colors_array = explode(",", $custom_category_colors);
			$custom_category_colors_array = array_map('trim', $custom_category_colors_array);
			$j = 0;
			foreach ($custom_category_colors_array as $i => $custom_category_color){
				$j = $i + 1;
				if ($layout == "portfolio-caption-hidden-5"){
					$custom_css_selector = '#' . $brankic_cat_id . '.fig_hid.hover5 article:nth-child(' . $j . ') .entry-category'; 
					$custom_css_declaration = '{color: ' . $custom_category_color . '}';
				}
				if ($layout == "portfolio-caption-hidden-6"){
					$custom_css_selector = '#' . $brankic_cat_id . '.fig_hid.hover6 article:nth-child(' . $j . ') .entry-category'; 
					$custom_css_declaration = '{color: ' . $custom_category_color . '}';
				}
				$custom_title_color_css = $custom_css_selector . $custom_css_declaration;
				$old_database_css = get_post_meta( get_the_ID(), 'myriad_brankic_custom_title_css', true);
				if (substr_count($old_database_css, $custom_title_color_css) == 0) update_post_meta( get_the_ID(), 'myriad_brankic_custom_title_css', $old_database_css.$custom_title_color_css);
			}
		}

		
		if ($custom_title_hovers != "") {
			$custom_title_hovers_array = explode(",", $custom_title_hovers);
			$custom_title_hovers_array = array_map('trim', $custom_title_hovers_array);
			$j = 0;
			foreach ($custom_title_hovers_array as $i => $custom_title_hover_color){
				$j = $i + 1;
				if ($layout == "portfolio-caption-hidden-5"){
					$custom_css_selector = '#' . $brankic_cat_id . '.fig_hid.hover5 article:nth-child(' . $j . ') .inner-holder:after '; 
					$custom_css_declaration = '{background: ' . $custom_title_hover_color . '}';
				}
				$custom_title_color_css = $custom_css_selector . $custom_css_declaration;
				$old_database_css = get_post_meta( get_the_ID(), 'myriad_brankic_custom_title_css', true);
				if (substr_count($old_database_css, $custom_title_color_css) == 0) update_post_meta( get_the_ID(), 'myriad_brankic_custom_title_css', $old_database_css.$custom_title_color_css);
			}
		}
		
		
		
		$brankic_cat_style = "";
		$emphasize_css = "";
		$custom_cursor_css = "";
		$bg_gradient_style = "";
		
		if ($custom_cursor == "true") {
			$custom_cursor_css = 'span.custom-' . $brankic_cat_id . '{background:' . $custom_cursor_bg . ';color:' . $custom_cursor_color . ';}';
			$custom_cursor_css .= '.cursor-pointer.custom-' . $brankic_cat_id . '-active span.custom-' . $brankic_cat_id . ' {	opacity: 1;}'; 
		}
		
		if ($title_font_family == "custom") {
			$title_font_family = $custom_title_font_family;
		} 
		
		if (substr_count($title_font_family, "google_web_font_") == 1) {
			
			$number = substr($title_font_family, strlen($title_font_family) - 1, 1);
			
			$title_font_family = brankic_of_get_option("google_web_font_family_" . $number, brankic_of_get_default("google_web_font_family_" . $number));
		}
		
		//gradient
		if ($use_gradient_bg == "true") {
	
			if ($bg_gradient_direction == "circle") $bg_direction = "radial-gradient"; else $bg_direction = "linear-gradient";	
				
			if ($layout == "portfolio-fixed-overlay"){
				
				if ($bg_img_color != "" && $bg_color_2 != "" && $bg_color_3 == "") {
					$bg_gradient_style .= '#' . $brankic_cat_id . ' .background-image-holder:before {background: ' . $bg_direction . '(' . $bg_gradient_direction . ', ' . $bg_img_color . ' , ' . $bg_color_2 . ');}';
				}
				if ($bg_img_color != "" && $bg_color_2 != "" && $bg_color_3 != "") {
					$bg_gradient_style .= '#' . $brankic_cat_id . ' .background-image-holder:before{background: ' . $bg_direction . '(' . $bg_gradient_direction . ', ' . $bg_img_color . ' , ' . $bg_color_2 . ', ' . $bg_color_3 . ');}';
				}
			
			}else{
			
				if ($bg_img_color != "" && $bg_color_2 != "" && $bg_color_3 == "") {
					$bg_gradient_style .= '#' . $brankic_cat_id . ' .background-image:after {background: ' . $bg_direction . '(' . $bg_gradient_direction . ', ' . $bg_img_color . ' , ' . $bg_color_2 . ');}';
				}
				if ($bg_img_color != "" && $bg_color_2 != "" && $bg_color_3 != "") {
					$bg_gradient_style .= '#' . $brankic_cat_id . ' .background-image:after{background: ' . $bg_direction . '(' . $bg_gradient_direction . ', ' . $bg_img_color . ' , ' . $bg_color_2 . ', ' . $bg_color_3 . ');}';
				}
			}
		}
	
		
		
		if ($h_size_custom != "") $h_size = $h_size_custom;
		if ($h_height_custom != "") $h_height = $h_height_custom;
		if ($h_spacing_custom != "") $h_spacing = $h_spacing_custom;
		
		if ($h_size != "") $h_size = 'font-size:' . $h_size . ';';
		if ($titles_weight != "") $titles_weight = 'font-weight:' . $titles_weight . ';';
		if ($h_style != "") $h_style = 'font-style:' . $h_style . ';';
		if ($h_transform != "") $h_transform = 'text-transform:' . $h_transform . ';';
		if ($h_spacing != "") $h_spacing = 'letter-spacing:' . $h_spacing . ';';
		if ($h_height != "") $h_height = 'line-height:' . $h_height . ';';
		if ($title_font_family != "") $title_font_family = 'font-family:' . $title_font_family . ';';
		
		$title_css = $title_font_family . $h_size . $titles_weight .  $h_style .  $h_transform .  $h_spacing .  $h_height; 
		
		if ($emphasize_first_post == "true") {
			

			$emphasize_title_css = $title_font_family . $titles_weight .  $h_style .  $h_transform .  $h_spacing .  $h_height; 
			
			// 1 - split / 2 - minimal / 3 - default
			if ($emphasize_style == "style_1") {	
				if ($title_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post-split .emphasize-entry-title a {color: ' . $title_color . ';}';
				if ($hover_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post-split .emphasize-entry-title a:hover {color: ' . $hover_color . ';}';
				if ($border_hover_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post-split .emphasize-entry-title a:hover {border-color: ' . $border_hover_color . ';}';
				if ($emphasize_title_css != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post-split .emphasize-entry-title {' . $emphasize_title_css . '}';
			}
			if ($emphasize_style == "style_2") {	
				if ($title_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post-split .emphasize-entry-title a {color: ' . $title_color . ';}';
				if ($hover_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post-split .emphasize-entry-title a:hover {color: ' . $hover_color . ';}';
				if ($border_hover_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post-split .emphasize-entry-title a:hover {border-color: ' . $border_hover_color . ';}';
				if ($emphasize_title_css != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post-split .emphasize-entry-title {' . $emphasize_title_css . '}';
			}
			if ($emphasize_style == "style_3") {	
				if ($title_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post .emphasize-entry-title a {color: ' . $title_color . ';}';
				if ($hover_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post .emphasize-entry-title a:hover {color: ' . $hover_color . ';}';
				if ($border_hover_color != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post .emphasize-entry-title a:hover {border-color: ' . $border_hover_color . ';}';
				if ($emphasize_title_css != "") $emphasize_css .= '#' . $brankic_cat_id . ' .emphasize-post .emphasize-entry-title {' . $emphasize_title_css . '}';
			}
		}
		
		if ($layout != "blog-carousel-emphasize"){
			if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
			
			if ($duotone_gradient != "true" && $duotone_custom != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .single-color:before{background:' . $duotone_custom . '}';
			if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
			if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		}
	
		if ($layout == "blog-style-1" || $layout == "blog-style-2" || $layout == "blog-style-2a" || $layout == "blog-style-3" || $layout == "blog-style-4" || $layout == "blog-style-5" || $layout == "blog-style-6" || $layout == "blog-style-7" || $layout == "blog-style-8" || $layout == "blog-style-9" || $layout == "blog-style-10"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-title .entry-title a {color: ' . $title_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-title .entry-title a:hover {color: ' . $hover_color . ';}';
			if ($border_hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-title .entry-title a:hover {border-color: ' . $border_hover_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-title .entry-title {' . $title_css . '}';
		}
		
		if ($layout == "portfolio-carousel-new"){
			if ($active_title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide-active.swiper-slide .post-info-content h4.entry-title a{color: ' . $active_title_color . ';}';
			if ($active_meta_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide-active.swiper-slide .post-info-content p.entry-category, #' . $brankic_cat_id . ' .swiper-slide-active.swiper-slide .post-info-content .post-meta {color: ' . $active_meta_color . ';}';
			if ($hover_color != "" && $active_title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide-active.swiper-slide .post-info-content h4.entry-title a:hover{color: ' . $active_title_color . ';}';
			if ($hover_color != "" && $active_title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide-active.swiper-slide .post-info-content:hover p.entry-category {color: ' . $active_title_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content h4.entry-title a{' . $title_css . '}';
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content h4.entry-title a{color: ' . $title_color . ';}';
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content p.entry-category{color: ' . $title_color . ';}';
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content .post-meta{color: ' . $title_color . ';}';
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .nav_pag_wrapper {color: ' . $title_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content h4.entry-title  a:hover{color: ' . $hover_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content:hover p.entry-category{color: ' . $hover_color . ';}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image.active{box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
			if ($bg_img_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image:after{background: ' . $bg_img_color . ';}';	
			
			$brankic_cat_style .= $bg_gradient_style;			
		}
		if ($layout == "blog-carousel-emphasize"){
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content h3.entry-title a{' . $title_css . ';color: ' . $title_color . ';}';
			if ($content_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.recent-posts-emphasize{color: ' . $content_color . ';}';
			if ($bg_img_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image:after{background: ' . $bg_img_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content h3.entry-title a:hover {color: ' . $hover_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content .post-meta a:hover {color: ' . $hover_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-link a:hover {color: ' . $hover_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .swiper-slide .post-info-content .post-meta a:hover {color: ' . $hover_color . ';}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image.active{box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
			if ($split_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.recent-posts-emphasize {background-color: ' . $split_color . ';}';
		
			if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
			
			if ($duotone_gradient != "true" && $duotone_custom != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image-holder .single-color:before{background:' . $duotone_custom . '}';
			if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image-holder .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
			if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image-holder .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
			
			if ($only_next_duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
			if ($only_next_duotone_gradient != "true" && $only_next_duotone_custom != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .bg-image_wrapper.single-color:before{background:' . $only_next_duotone_custom . '}';
			if ($only_next_duotone_gradient == "true" && $only_next_duotone_custom != "" && $only_next_duotone_custom_2 != "" && $only_next_duotone_custom_3 == "") $brankic_cat_style .= '#' . $brankic_cat_id . '  .bg-image_wrapper.single-color:before{background: ' . $direction . '(' . $only_next_duotone_gradient_direction . ', ' . $only_next_duotone_custom . ' , ' . $only_next_duotone_custom_2 . ');}';
			if ($only_next_duotone_gradient == "true" && $only_next_duotone_custom != "" && $only_next_duotone_custom_2 != "" && $only_next_duotone_custom_3 != "") $brankic_cat_style .= '#' . $brankic_cat_id . '  .bg-image_wrapper.single-color:before{background: ' . $direction . '(' . $only_next_duotone_gradient_direction . ', ' . $only_next_duotone_custom . ' , ' . $only_next_duotone_custom_2 . ', ' . $only_next_duotone_custom_3 . ');}';
			if ($only_next_title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .only-next .text {color: ' . $only_next_title_color . ';}';
			if ($only_next_split_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .only-next .text:after {background-color: ' . $only_next_split_color . ';}';
			
			$brankic_cat_style .= $bg_gradient_style;
			
		}
		
		if ($layout == "portfolio-info-default"){
			$brankic_cat_style .= '#' . $brankic_cat_id . '.default article .entry-title {background-size: 200% 100%;background-image: linear-gradient(to right, ' . $hover_color . ' 50%, ' . $title_color . ' 50%), linear-gradient(to right, transparent 50%, transparent 50%);transition: background-position 1s;background-size: 200% 100%;background-repeat: no-repeat;background-position: 100% top, 100% top;-webkit-background-clip: text, border-box;color: transparent;-webkit-text-fill-color: transparent;}';
			$brankic_cat_style .= '#' . $brankic_cat_id . '.default article:hover .entry-title {background-position: 0% top, 0% top;color: transparent;}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.default .entry-category a {-webkit-text-fill-color: ' . $category_color . ';}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.default .post-entry {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';			
		}
		 
		if ($layout == "portfolio-fixed-overlay"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '{box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' li h3 a {color: ' . $title_color . ';}';
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' span.entry-category {color: ' . $title_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' ul li h3 {' . $title_css . '}';
			
			if ($bg_img_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image-holder:before{background: ' . $bg_img_color . ';}';
			$brankic_cat_style .= $bg_gradient_style;			
		}
		
		if ($layout == "portfolio-fixed-split-outset"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .floating-tooltip>div{box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' li a {color: ' . $title_color . ';}';	
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' li .entry-category {color: ' . $category_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' li h3 {' . $title_css . '}';	
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' li h3 a:hover {color: ' . $hover_color . ';}';			
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' li:hover h3 a {color: ' . $hover_color . ';}';	
		}
		
		if ($layout == "portfolio-fixed-split-default"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' li a {color: ' . $title_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.portfolio-split.default .portfolio-list ul li a:hover, #' . $brankic_cat_id . '.portfolio-split.default .portfolio-list ul li a.active {color: ' . $hover_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' ul li h3 {' . $title_css . '}';				
		}
		
		if ($layout == "portfolio-carousel-overlay"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' article a {color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' article .entry-category {color: ' . $category_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' h4.entry-title {' . $title_css . '}';
			
			if ($bg_img_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .background-image:after{background: ' . $bg_img_color . ';}';	
			$brankic_cat_style .= $bg_gradient_style;
		}
		
		if ($layout == "portfolio-carousel"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-info-content h4.entry-title{color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-info-content .entry-category{color: ' . $category_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' h4.entry-title {' . $title_css . '}';
		}
		
		if ($layout == "portfolio-tooltip"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.tooltip .entry-title a{color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.tooltip .entry-category {color: ' . $category_color . ';}';
			if ($shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.tooltip .post-entry {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
			if ($hover_color != "" && $hover_2_color == "") $brankic_cat_style .= '#' . $brankic_cat_id . '.tooltip .floating-tooltip {background:' . $hover_color  . ';}';
			if ($hover_color != "" && $hover_2_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.tooltip .floating-tooltip {background: linear-gradient(120deg,' . $hover_color  . ', ' . $hover_2_color . ');}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';
						
		}
		
		if ($layout == "portfolio-caption-hidden-1"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover1 .post-info-content .entry-title {color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover1 .post-info-content .entry-category {color: ' . $category_color . ';}';
			if ($hover_color != "" && $hover_2_color == "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover1 .post-info a{background:' . $hover_color  . '}';
			if ($hover_color != "" && $hover_2_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover1 .post-info a{background:linear-gradient(180deg, ' . $hover_color . ' 0%, ' . $hover_2_color . ' 100%);}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .inner-wrap {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';
		}
		
		if ($layout == "portfolio-caption-hidden-2"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover2 .post-info-content .entry-title {color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover2 .post-info-content .entry-category {color: ' . $category_color . ';}';
			if ($hover_color != "" && $hover_2_color == "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover2 .post-info {background:' . $hover_color  . '}';
			if ($hover_color != "" && $hover_2_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover2 .post-info {background:linear-gradient(180deg, ' . $hover_color . ' 0%, ' . $hover_2_color . ' 100%);}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .inner-wrap {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';		
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';			
		}
		
		if ($layout == "portfolio-caption-hidden-3"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover3 .post-info-content .entry-title {color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover3 .post-info-content .entry-category {color: ' . $category_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover3 .post-info {background:linear-gradient(180deg, rgba(255,255,255,0) 0%, ' . $hover_color . ' 100%);}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .inner-wrap {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';
		}
		
		if ($layout == "portfolio-caption-hidden-4"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover4 .post-info-content .entry-title {color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover4 .post-info-content .entry-category {color: ' . $category_color . ';}';
			if ($hover_color != "" && $hover_2_color == "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover4 .post-info {background:' . $hover_color  . '}';
			if ($hover_color != "" && $hover_2_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover4 .post-info {background:linear-gradient(180deg, ' . $hover_color . ' 0%, ' . $hover_2_color . ' 100%);}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .inner-wrap {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';			
		}
		
		if ($layout == "portfolio-caption-hidden-5"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover5 .post-info-content .entry-title {color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover5 .post-info-content .entry-category, .fig_hid.hover5 .post-info-content .entry-category a {color: ' . $category_color . ';}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .inner-wrap {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
			if ($hover_color != "" && $hover_2_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover5 .inner-holder:after  {background:linear-gradient(0deg, ' . $hover_color . ' 0, ' . $hover_2_color . ');}';
			if ($hover_color != "" && $hover_2_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover5 .media-holder a:after  {border-image-source:linear-gradient(0deg, ' . $hover_color . ' 0, ' . $hover_2_color . ');}';
			if ($hover_color != "" && $hover_2_color == "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover5 .inner-holder:after  {background:' . $hover_color . ';}';
			if ($hover_color != "" && $hover_2_color == "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover5 .media-holder a:after  {border-color:' . $hover_color . ';}';
			
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';
		}
		
		if ($layout == "portfolio-caption-hidden-6"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover6 .post-info-content .entry-title {color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover6 .post-info-content .entry-category {color: ' . $category_color . ';}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .inner-wrap {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';
		}
		
		if ($layout == "portfolio-caption-hidden-7"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover7 .post-info-content .entry-title {color: ' . $title_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover7 .post-info {background:' . $hover_color  . '}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover7 .post-info-content .entry-category {color: ' . $category_color . ';}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .inner-wrap {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' h4.entry-title {' . $title_css . '}';
		}
		
		if ($layout == "portfolio-caption-hidden-8"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover8 .post-info-content .entry-title {color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover8 .post-info-content .entry-category {color: ' . $category_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover8 .post-info-content {background-color: ' . $hover_color . ';}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .inner-wrap {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';
		}
		
		if ($layout == "portfolio-scuttered"){
			if ($title_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover9 .post-info-content .entry-title a{color: ' . $title_color . ';}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover9 .post-info-content .entry-category {color: ' . $category_color . ';}';
			if ($hover_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.hover9 .post-info-content .entry-title a:hover{color: ' . $hover_color . ';}';
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . '.fig_hid.box-shadow .post-media {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title a{' . $title_css . '}';
		}
		
		if ($layout == "portfolio-zig-zag"){
			$brankic_cat_style .= '#' . $brankic_cat_id . ' article .entry-title{background-size: 200% 100%;background-image: linear-gradient(to right, ' . $hover_color . ' 50%, ' . $title_color . ' 50%), linear-gradient(to right, transparent 50%, transparent 50%);transition: background-position 1s;background-size: 200% 100%;background-repeat: no-repeat;background-position: 100% top, 100% top;-webkit-background-clip: text, border-box;color: transparent;-webkit-text-fill-color: transparent;}';
			$brankic_cat_style .= '#' . $brankic_cat_id . ' article:hover .entry-title{background-position: 0% top, 0% top;color: transparent;}';
			if ($category_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-category span.rotate, .entry-category a{color: ' . $category_color . ';}';

			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .zig-zag .post-media .media-holder {-webkit-box-shadow: -30px 30px 60px 0px ' . $shadow_color . ';-moz-box-shadow: -30px 30px 60px 0px ' . $shadow_color . ';box-shadow: -30px 30px 60px 0px ' . $shadow_color . ';position: relative;}
			#' . $brankic_cat_id .  ' .zig-zag article:nth-child(odd) .post-media .media-holder {-webkit-box-shadow: 30px 30px 60px 0px ' . $shadow_color . ';-moz-box-shadow: 30px 30px 60px 0px ' . $shadow_color . ';box-shadow: 30px 30px 60px 0px ' . $shadow_color . ';}';			
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';
		}
		
		if ($layout == "blog-style-10"){
			$brankic_cat_style .= '#' . $brankic_cat_id . ' .flow {position:relative;background: linear-gradient(to left, ' . $title_color . ' 50%, ' . $hover_color . ' 50%);background-size: 200% 100%;background-position:right bottom;-webkit-background-clip: text;-webkit-text-fill-color: transparent;transition: 0.6s;-webkit-transition: 0.6s;}';
			$brankic_cat_style .= '.flow:hover {background-position:left bottom;}';	
			if ($title_css != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .entry-title {' . $title_css . '}';			
		}
		
		if ($layout == "blog-style-1"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-media {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';			
		}
		
		if ($layout == "blog-style-2"){
			if ($shadow_color != "none" && $shadow_color != "" && $boxed != "true") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-media {box-shadow: 0 0 40px 0 ' . $shadow_color . ';}';	
			if ($shadow_color != "none" && $shadow_color != "" && $boxed == "true") $brankic_cat_style .= '#' . $brankic_cat_id . ' article:before {box-shadow: 0 0 40px 0 ' . $shadow_color . ';}';
		}
		
		if ($layout == "blog-style-2a"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-media {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
		}
		
		if ($layout == "blog-style-3"){
			if ($shadow_color != "none" && $shadow_color != "" && $boxed != "true") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-media {box-shadow: 0 0 40px 0 ' . $shadow_color . ';}';	
			if ($shadow_color != "none" && $shadow_color != "" && $boxed == "true") $brankic_cat_style .= '#' . $brankic_cat_id . ' .inner-wrap {box-shadow: 0 0 40px 0 ' . $shadow_color . ';}';
		}
		
		if ($layout == "blog-style-4"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-media {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
		}
		
		if ($layout == "blog-style-5"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-entry {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
		}
		
		if ($layout == "blog-style-6"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-media {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
		}
		
		if ($layout == "blog-style-7"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-entry {box-shadow: 0 10px 40px 0 ' . $shadow_color . ';}';
		}
		
		if ($layout == "blog-style-8"){
			if ($shadow_color != "none" && $shadow_color != "" && $boxed == "true") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-entry {box-shadow: 0 0 20px ' . $shadow_color . ';}';	
		}
		
		if ($layout == "blog-style-9"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-media {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';		
		}
		
		if ($layout == "blog-style-10"){
			if ($shadow_color != "none" && $shadow_color != "") $brankic_cat_style .= '#' . $brankic_cat_id . ' .post-media .media-holder {box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';	
		}
		return $brankic_cat_style.$emphasize_css.$custom_cursor_css;
	}
	
	if ($shortcode == "brankic_counter"){
		
		if (array_key_exists("icon_color", $shortcode_atts)) $icon_color = $shortcode_atts["icon_color"]; else $icon_color = "";
		if (array_key_exists("counter_color", $shortcode_atts)) $counter_color = $shortcode_atts["counter_color"]; else $counter_color = "";
		if (array_key_exists("caption_color", $shortcode_atts)) $caption_color = $shortcode_atts["caption_color"]; else $caption_color = "";
		if (array_key_exists("font_weight", $shortcode_atts)) $font_weight = $shortcode_atts["font_weight"]; else $font_weight = "";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";
		
		$brankic_id = 'brankic_counter_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_id = 'brankic_counter_' . $unique;
		
		$counter_style = "";
		
		if ($icon_color != "") $counter_style .= '#' . $brankic_id . ' i{color:' . $icon_color . ';}';
		if ($counter_color != "") $counter_style .= '#' . $brankic_id . ' span, #' . $brankic_id . ' odomoter{color:' . $counter_color . ';}';
		if ($caption_color != "") $counter_style .= '#' . $brankic_id . ' strong{color:' . $caption_color . ';}';
		if ($font_weight != "") $counter_style .= '#' . $brankic_id . ' span, #' . $brankic_id . ' odomoter{font-weight:' . $font_weight . ';}';
		
		return $counter_style;
	}
	
	if ($shortcode == "brankic_social_icons"){
		
		if (array_key_exists("shape", $shortcode_atts)) $shape = $shortcode_atts["shape"]; else $shape = "default";
		if (array_key_exists("hover", $shortcode_atts)) $hover = $shortcode_atts["hover"]; else $hover = "default";
		if (array_key_exists("icon_color", $shortcode_atts)) $icon_color = $shortcode_atts["icon_color"]; else $icon_color = "";
		if (array_key_exists("icon_hover_color", $shortcode_atts)) $icon_hover_color = $shortcode_atts["icon_hover_color"]; else $icon_hover_color = "";
		if (array_key_exists("bg_hover_color", $shortcode_atts)) $bg_hover_color = $shortcode_atts["bg_hover_color"]; else $bg_hover_color = "";
		if (array_key_exists("icon_bg_color", $shortcode_atts)) $icon_bg_color = $shortcode_atts["icon_bg_color"]; else $icon_bg_color = "";
		if (array_key_exists("icon_border_color", $shortcode_atts)) $icon_border_color = $shortcode_atts["icon_border_color"]; else $icon_border_color = "";
		if (array_key_exists("icon_border_hover_color", $shortcode_atts)) $icon_border_hover_color = $shortcode_atts["icon_border_hover_color"]; else $icon_border_hover_color = "";

		
		$brankic_id = 'brankic_social_icons_' . brankic_string_to_class($shortcode_atts);
		
		$icons_style = "";
		
		if ($icon_color != "") $icons_style .= '#' . $brankic_id . '.social-bookmarks a { color: ' . $icon_color . '; }';
	
		if ($icon_hover_color != "") $icons_style .= '#' . $brankic_id . '.social-bookmarks a:hover { color: ' . $icon_hover_color . '; }';
		
		if ($shape == "circle" || $shape == "diamond" || $shape == "rectangle" || $shape == "default") {
		
			if ($icon_bg_color != "") $icons_style .= '#' . $brankic_id . '.social-bookmarks a:before { background: ' . $icon_bg_color . '; }';
			
			if ($bg_hover_color != "") $icons_style .= '#' . $brankic_id . '.social-bookmarks a:hover:before { background: ' . $bg_hover_color . '; }';

			if ($icon_border_color != "") $icons_style .= '#' . $brankic_id . '.social-bookmarks a:after { border-color: ' . $icon_border_color . '; }';
			
			if ($icon_border_hover_color != "") $icons_style .= '#' . $brankic_id . '.social-bookmarks a:hover:after { border-color: ' . $icon_border_hover_color . '; }';
			
		} 
		
		return $icons_style;
	}
	
	if ($shortcode == "brankic_marquee"){
		
		if (array_key_exists("size", $shortcode_atts)) $size = $shortcode_atts["size"]; else $size = "";
		if (array_key_exists("size_custom", $shortcode_atts)) $size_custom = $shortcode_atts["size_custom"]; else $size_custom = "";
		if (array_key_exists("height", $shortcode_atts)) $height = $shortcode_atts["height"]; else $height = "";
		if (array_key_exists("height_custom", $shortcode_atts)) $height_custom = $shortcode_atts["height_custom"]; else $height_custom = "";
		if (array_key_exists("spacing", $shortcode_atts)) $spacing = $shortcode_atts["spacing"]; else $spacing = "";
		if (array_key_exists("spacing_custom", $shortcode_atts)) $spacing_custom = $shortcode_atts["spacing_custom"]; else $spacing_custom = "";
		if (array_key_exists("weight", $shortcode_atts)) $weight = $shortcode_atts["weight"]; else $weight = "";
		if (array_key_exists("style", $shortcode_atts)) $style = $shortcode_atts["style"]; else $style = "";
		if (array_key_exists("transform", $shortcode_atts)) $transform = $shortcode_atts["transform"]; else $transform = "";
		if (array_key_exists("text_color", $shortcode_atts)) $text_color = $shortcode_atts["text_color"]; else $text_color = "";
		if (array_key_exists("text_color_2", $shortcode_atts)) $text_color_2 = $shortcode_atts["text_color_2"]; else $text_color_2 = "";
		if (array_key_exists("text_color_3", $shortcode_atts)) $text_color_3 = $shortcode_atts["text_color_3"]; else $text_color_3 = "";
		if (array_key_exists("use_gradient", $shortcode_atts)) $use_gradient = $shortcode_atts["use_gradient"]; else $use_gradient = "";
		if (array_key_exists("gradient_direction", $shortcode_atts)) $gradient_direction = $shortcode_atts["gradient_direction"]; else $gradient_direction = "to top right";

		$marquee_css = "";
		
		$brankic_id = 'brankic_marquee_' . brankic_string_to_class($shortcode_atts);
		
	   if ($size_custom != "") $size = $size_custom;
	   if ($height_custom != "") $height = $height_custom;
	   if ($spacing_custom != "") $spacing = $spacing_custom;

	   
	   if ($size != "") $size = 'font-size:' . $size . ';';
	   if ($weight != "") $weight = 'font-weight:' . $weight . ';';
	   if ($style != "") $style = 'font-style:' . $style . ';';
	   if ($transform != "") $transform = 'text-transform:' . $transform . ';';
	   if ($spacing != "") $spacing = 'letter-spacing:' . $spacing . ';';
	   if ($height != "") $height = 'line-height:' . $height . ';';
	   
	   if ($use_gradient == "true") {
	
			if ($gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";	
				
			if ($text_color_2 != "" && $text_color_3 == "") {
				$marquee_css .= '#' . $brankic_id . '{background: ' . $direction . '(' . $gradient_direction . ', ' . $text_color . ' , ' . $text_color_2 . ');}';
			}
			if ($text_color_2 != "" && $text_color_3 != "") {
				$marquee_css .= '#' . $brankic_id . '{background: ' . $direction . '(' . $gradient_direction . ', ' . $text_color . ' , ' . $text_color_2 . ', ' . $text_color_3 . ');}';
			}
		}else {
			
			if ($text_color != "") $marquee_css .= '#' . $brankic_id . ' {color: ' . $text_color . '; }';
		}

	   
	   
	   
	   $marquee_css .= '#' . $brankic_id . '{' . $size . $weight . $style . $transform . $spacing . $height . '}';
		
		return $marquee_css;
	}
	
 	if ($shortcode == "brankic_super_slider_wrapper"){
		
		$brankic_super_slider_wrapper_css = "";
		
		$id = 'brankic_super_slider_wrapper_' . brankic_string_to_class($shortcode_atts);
		
		$default_content_width = brankic_of_get_option("default_content_width", brankic_of_get_default("default_content_width"));
			
		if ($default_content_width != "fullwidth") $brankic_super_slider_wrapper_css .= '#' . $id . ' article{width:' . $default_content_width . '}';
		
		return $brankic_super_slider_wrapper_css;
	} 
	
	if ($shortcode == "brankic_super_slide"){
		
		
		
		if (array_key_exists("caption_color", $shortcode_atts)) $caption_color = $shortcode_atts["caption_color"]; else $caption_color = "";
		if (array_key_exists("slide_bg_color", $shortcode_atts)) $slide_bg_color = $shortcode_atts["slide_bg_color"]; else $slide_bg_color = "";
		if (array_key_exists("bg_repeat", $shortcode_atts)) $bg_repeat = $shortcode_atts["bg_repeat"]; else $bg_repeat = "";
		if (array_key_exists("bg_size", $shortcode_atts)) $bg_size = $shortcode_atts["bg_size"]; else $bg_size = "cover";
		if (array_key_exists("slide_bg_color_use_gradient_bg", $shortcode_atts)) $slide_bg_color_use_gradient_bg = $shortcode_atts["slide_bg_color_use_gradient_bg"]; else $slide_bg_color_use_gradient_bg = "";
		if (array_key_exists("slide_bg_color_gradient_direction", $shortcode_atts)) $slide_bg_color_gradient_direction = $shortcode_atts["slide_bg_color_gradient_direction"]; else $slide_bg_color_gradient_direction = "to top right";
		if (array_key_exists("slide_bg_color_2", $shortcode_atts)) $slide_bg_color_2 = $shortcode_atts["slide_bg_color_2"]; else $slide_bg_color_2 = "";
		if (array_key_exists("slide_bg_color_3", $shortcode_atts)) $slide_bg_color_3 = $shortcode_atts["slide_bg_color_3"]; else $slide_bg_color_3 = "";
		if (array_key_exists("slide_bg_color_4", $shortcode_atts)) $slide_bg_color_4 = $shortcode_atts["slide_bg_color_4"]; else $slide_bg_color_4 = "";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";
		
		if ($unique != "") $brankic_id = 'brankic_counter_' . $unique;
		
		$id = 'brankic_super_slide_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $id = 'brankic_super_slide_' . $unique;

		$slide_css = "";
		
		if ($caption_color != "") $slide_css .= '#' . $id . ' .entry-title{color:' . $caption_color . '}';
		
		if ($slide_bg_color_use_gradient_bg == "true") {
	
			if ($slide_bg_color_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";	
				
			if ($slide_bg_color_3 == "" && $slide_bg_color_4 == "") {
				$slide_css .= '#' . $id . ' .row-bg.background-color{background: ' . $direction . '(' . $slide_bg_color_gradient_direction . ', ' . $slide_bg_color . ' , ' . $slide_bg_color_2 . ');}';
			}
			if ($slide_bg_color_3 != "" && $slide_bg_color_4 == "") {
				$slide_css .= '#' . $id . ' .row-bg.background-color{background: ' . $direction . '(' . $slide_bg_color_gradient_direction . ', ' . $slide_bg_color . ' , ' . $slide_bg_color_2 . ', ' . $slide_bg_color_3 . ');}';
			}
			if ($slide_bg_color_3 != "" && $slide_bg_color_4 != "") {
				$slide_css .= '#' . $id . ' .row-bg.background-color{background: ' . $direction . '(' . $slide_bg_color_gradient_direction . ', ' . $slide_bg_color . ' , ' . $slide_bg_color_2 . ', ' . $slide_bg_color_3 . ', ' . $slide_bg_color_4 . ');}';	
			}
			}else {
				
				if ($slide_bg_color != "") $slide_css .= '#' . $id . ' .row-bg.background-color{background:' . $slide_bg_color . '}';
			}
		
			if ($bg_repeat != "") $slide_css .= '#' . $id . ' .row-bg.background-image{background-repeat:' . $bg_repeat . '}';
			if ($bg_size != "") $slide_css .= '#' . $id . ' .row-bg.background-image{background-size:' . $bg_size . '}';
			
			
		
		
		
		return $slide_css;
	}

	
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if ($shortcode == "vc_gallery"){
		
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		if (array_key_exists("meta_color", $shortcode_atts)) $meta_color = $shortcode_atts["meta_color"]; else $meta_color = "";
		if (array_key_exists("meta_hover_color", $shortcode_atts)) $meta_hover_color = $shortcode_atts["meta_hover_color"]; else $meta_hover_color = "";
		if (array_key_exists("meta_background_color", $shortcode_atts)) $meta_background_color = $shortcode_atts["meta_background_color"]; else $meta_background_color = "";
		if (array_key_exists("brankic_gallery_show_meta", $shortcode_atts)) $brankic_gallery_show_meta = $shortcode_atts["brankic_gallery_show_meta"]; else $brankic_gallery_show_meta = "";
		
		if (array_key_exists("custom_cursor", $shortcode_atts)) $custom_cursor = $shortcode_atts["custom_cursor"]; else $custom_cursor = "";
		if (array_key_exists("custom_cursor_bg", $shortcode_atts)) $custom_cursor_bg = $shortcode_atts["custom_cursor_bg"]; else $custom_cursor_bg = "#403a3e";
		if (array_key_exists("custom_cursor_color", $shortcode_atts)) $custom_cursor_color = $shortcode_atts["custom_cursor_color"]; else $custom_cursor_color = "#ffcc99";

		
		$brankic_gallery_id = 'brankic_gallery_' . brankic_string_to_class($shortcode_atts);
		
		$gallery_style = "";
		$custom_cursor_css = "";
		
		if ($custom_cursor == "true") {
			$custom_cursor_css = 'span.custom-' . $brankic_gallery_id . '{background:' . $custom_cursor_bg . ';color:' . $custom_cursor_color . ';}';
		}
		
		if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		if ($duotone_gradient != "true" && $duotone_custom != "") $gallery_style .= '#' . $brankic_gallery_id . ' .single-color:before{background:' . $duotone_custom . '}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $gallery_style .= '#' . $brankic_gallery_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $gallery_style .= '#' . $brankic_gallery_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
		if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "title") {
			if ($meta_color != "") $gallery_style .= '#' . $brankic_gallery_id . ' .post-info{color:' . $meta_color . '}';
			if ($meta_hover_color != "") $gallery_style .= '#' . $brankic_gallery_id . ' .post-info:hover{color:' . $meta_hover_color . '}';
		}
		if ($brankic_gallery_show_meta == "on_hover") {
			if ($meta_color != "") $gallery_style .= '#' . $brankic_gallery_id . ' .post-info:hover{color:' . $meta_color . '}';
		}
			if ($meta_background_color != "") $gallery_style .= '#' . $brankic_gallery_id . ' .post-info:after{background:' . $meta_background_color . '}';
		
		return $gallery_style . $custom_cursor_css;
	}
	
	if ($shortcode == "vc_column_text"){
		
		if (array_key_exists("gradient_text_color_1", $shortcode_atts)) $gradient_text_color_1 = $shortcode_atts["gradient_text_color_1"]; else $gradient_text_color_1 = "";
		if (array_key_exists("gradient_text_color_2", $shortcode_atts)) $gradient_text_color_2 = $shortcode_atts["gradient_text_color_2"]; else $gradient_text_color_2 = "";
		if (array_key_exists("highlight_text_color", $shortcode_atts)) $highlight_text_color = $shortcode_atts["highlight_text_color"]; else $highlight_text_color = "";
		if (array_key_exists("highlight_background_color_1", $shortcode_atts)) $highlight_background_color_1 = $shortcode_atts["highlight_background_color_1"]; else $highlight_background_color_1 = "";
		if (array_key_exists("highlight_background_color_2", $shortcode_atts)) $highlight_background_color_2 = $shortcode_atts["highlight_background_color_2"]; else $highlight_background_color_2 = "";
		if (array_key_exists("highlight_hover_background_color_1", $shortcode_atts)) $highlight_hover_background_color_1 = $shortcode_atts["highlight_hover_background_color_1"]; else $highlight_hover_background_color_1 = "";
		if (array_key_exists("highlight_hover_background_color_2", $shortcode_atts)) $highlight_hover_background_color_2 = $shortcode_atts["highlight_hover_background_color_2"]; else $highlight_hover_background_color_2 = "";
		if (array_key_exists("highlight_hover_text_color", $shortcode_atts)) $highlight_hover_text_color = $shortcode_atts["highlight_hover_text_color"]; else $highlight_hover_text_color = "";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";

		$brankic_column_text_id = 'brankic_column_text_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_column_text_id = 'brankic_column_text_' . $unique;
		

		$highlight_css = "";

		$gradient_text_color = "";
		if ($gradient_text_color_1 != "" && $gradient_text_color_2 == "") $gradient_text_color = 'color:' . $gradient_text_color_1 . ';';
		if ($gradient_text_color_1 != "" && $gradient_text_color_2 != "") $gradient_text_color = 'background:linear-gradient(120deg,' . $gradient_text_color_1 . ' 0%,' . $gradient_text_color_2 . ' 100%);';

		if ($gradient_text_color != "") $highlight_css .= '#' . $brankic_column_text_id . ' .gradient{' . $gradient_text_color . '}';

		$highlight_background_color = "";
		
		if ($highlight_background_color_1 != ""  && $highlight_background_color_2 == ""){
			$highlight_background_color = $highlight_background_color_1;
		}
		
		if ($highlight_background_color_1 != ""  && $highlight_background_color_2 != ""){
			$highlight_background_color = 'linear-gradient(120deg,' . $highlight_background_color_1 . ' 0%,' . $highlight_background_color_2 . ' 100%);';
		}
		
		$highlight_hover_background_color = "";
		
		if ($highlight_hover_background_color_1 != ""  && $highlight_hover_background_color_2 == ""){
			$highlight_hover_background_color = $highlight_hover_background_color_1;
		}
		
		if ($highlight_hover_background_color_1 != ""  && $highlight_hover_background_color_2 != ""){
			$highlight_hover_background_color = 'linear-gradient(120deg,' . $highlight_hover_background_color_1 . ' 0%,' . $highlight_hover_background_color_2 . ' 100%);';
		}

	
		if ($highlight_text_color != "") {
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.underline span{color:' . $highlight_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.overlay span{color:' . $highlight_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.line-through span{color:' . $highlight_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.line-through.in-back span{color:' . $highlight_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.underline-through span{color:' . $highlight_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover a { color: ' . $highlight_text_color . '; }';
		}
		if ($highlight_background_color != "") {
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.underline:not(.visible) span::after{background:' . $highlight_background_color . ' ;}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.overlay span::after{background:' . $highlight_background_color . ' ;}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.line-through:not(.visible) span::after{background:' . $highlight_background_color . ' ;}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.line-through.in-back:not(.visible) span::after{background:' . $highlight_background_color . ' ;}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.underline-through:not(.visible) span::after{background:' . $highlight_background_color . ' ;}';
			
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.underline::after{background:' . $highlight_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.overlay::after{background:' . $highlight_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.overlay.visible::after{background:' . $highlight_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.line-through:not(.visible)::after{background:' . $highlight_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . '  .a_hover.in-back:not(.visible)::after{background:' . $highlight_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.line-through.visible span::before{background:' . $highlight_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . '  .a_hover.in-back.visible span::before{background:' . $highlight_background_color . ';}';
			
			$highlight_css .= '#' . $brankic_column_text_id . '  .a_hover.underline-through.visible span::before{background:' . $highlight_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . '  .a_hover.underline.visible span::before{background:' . $highlight_background_color . ';}';
		}
		
		if ($highlight_hover_text_color != "") {
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.underline span:hover {color:' . $highlight_hover_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.line-through span:hover {color:' . $highlight_hover_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.line-through.in-back span:hover {color:' . $highlight_hover_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.underline-through span:hover {color:' . $highlight_hover_text_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover:hover a{ color: ' . $highlight_hover_text_color . '; }';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.a_hover.overlay:hover span{ color: ' . $highlight_hover_text_color . '; }';
		}
		if ($highlight_hover_background_color != "") {
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.underline span:hover::after{background:' . $highlight_hover_background_color . ' ;}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.line-through:not(.visible) span:hover::after{background:' . $highlight_hover_background_color . ' ;}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.line-through.in-back:not(.visible) span:hover::after{background:' . $highlight_hover_background_color . ' ;}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .highlight.underline-through span:hover::after{background:' . $highlight_hover_background_color . ' ;}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.overlay.visible span::before {background:' . $highlight_hover_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.underline-through.visible span::after {background:' . $highlight_hover_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.underline-through.visible:hover span::after {background:' . $highlight_hover_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.underline.visible span::after {background:' . $highlight_hover_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.underline.visible:hover span::after {background:' . $highlight_hover_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.line-through.visible span::after{background:' . $highlight_hover_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . '  .a_hover.in-back.visible span::after{background:' . $highlight_hover_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . ' .a_hover.line-through.visible:hover span::after{background:' . $highlight_hover_background_color . ';}';
			$highlight_css .= '#' . $brankic_column_text_id . '  .a_hover.in-back.visible:hover span::after{background:' . $highlight_hover_background_color . ';}';
		}

		
		return $highlight_css;
	}
	
	 if ($shortcode == "brankic_reveal"){
		
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "";

		$brankic_reveal_css = "";
		
		$brankic_id = 'brankic_reveal_' . brankic_string_to_class($shortcode_atts);
	
		if ($shadow_color != "") $brankic_reveal_css .= '#' . $brankic_id . ' .block-revealer__content{box-shadow: 0 20px 40px 0 ' . $shadow_color . ';}';
		
		return $brankic_reveal_css;
	} 
	
	if ($shortcode == "brankic_list"){
		
		if (array_key_exists("color", $shortcode_atts)) $color = $shortcode_atts["color"]; else $color = "#ffffff";
		if (array_key_exists("unique", $shortcode_atts)) $unique = $shortcode_atts["unique"]; else $unique = "";

		$brankic_list_css = "";
		
		$brankic_id = 'brankic_list_' . brankic_string_to_class($shortcode_atts);
		if ($unique != "") $brankic_id = 'brankic_list_' . $unique;
	
		if ($color != "") $brankic_list_css .= '#' . $brankic_id . ' {--color: ' . $color . ';}';
		
		return $brankic_list_css;
	}
	
	if ($shortcode == "brankic_swiper_slide_wrapper"){
		
		if (array_key_exists("text_color", $shortcode_atts)) $text_color = $shortcode_atts["text_color"]; else $text_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		
		if (array_key_exists("title_size", $shortcode_atts)) $title_size = $shortcode_atts["title_size"]; else $title_size = "";
		if (array_key_exists("title_size_custom", $shortcode_atts)) $title_size_custom = $shortcode_atts["title_size_custom"]; else $title_size_custom = "";
		if (array_key_exists("title_height", $shortcode_atts)) $title_height = $shortcode_atts["title_height"]; else $title_height = "";
		if (array_key_exists("title_height_custom", $shortcode_atts)) $title_height_custom = $shortcode_atts["title_height_custom"]; else $title_height_custom = "";
		if (array_key_exists("title_spacing", $shortcode_atts)) $title_spacing = $shortcode_atts["title_spacing"]; else $title_spacing = "";
		if (array_key_exists("title_spacing_custom", $shortcode_atts)) $title_spacing_custom = $shortcode_atts["title_spacing_custom"]; else $title_spacing_custom = "";
		if (array_key_exists("title_style", $shortcode_atts)) $title_style = $shortcode_atts["title_style"]; else $title_style = "";
		if (array_key_exists("title_transform", $shortcode_atts)) $title_transform = $shortcode_atts["title_transform"]; else $title_transform = "";
		if (array_key_exists("title_weight", $shortcode_atts)) $title_weight = $shortcode_atts["title_weight"]; else $title_weight = "";

		$brankic_swiper_css = "";
		
		$brankic_id = 'swiper-brankic_swiper_slide_wrapper_' . brankic_string_to_class($shortcode_atts);
	
		if ($text_color != "") {
			$brankic_swiper_css .= '#' . $brankic_id . ' .swiper-slide {color: ' . $text_color . ';}';
			$brankic_swiper_css .= '#' . $brankic_id . '.swiper-slider.duo .swiper-pagination{background:' . $text_color . ';}';
		}
		if ($bg_color != "") {
			$brankic_swiper_css .= '#' . $brankic_id . ' .row-bg.background-color.only_bg {background: ' . $bg_color . ';}';
			$brankic_swiper_css .= '#' . $brankic_id . ' .swiper-pagination-bullet {color: ' . $bg_color . ';}';
		}
		
		if ($title_size_custom != "") $title_size = $title_size_custom;
		if ($title_height_custom != "") $title_height = $title_height_custom;
		if ($title_spacing_custom != "") $title_spacing = $title_spacing_custom;
	   
		if ($title_size != "") $title_size = 'font-size:' . $title_size . ';';
		if ($title_weight != "") $title_weight = 'font-weight:' . $title_weight . ';';
		if ($title_style != "") $title_style = 'font-style:' . $title_style . ';';
		if ($title_transform != "") $title_transform = 'text-transform:' . $title_transform . ';';
		if ($title_spacing != "") $title_spacing = 'letter-spacing:' . $title_spacing . ';';
		if ($title_height != "") $title_height = 'line-height:' . $title_height . ';';
	   
	   $brankic_swiper_css .= '#' . $brankic_id . ' .entry-title{' . $title_size . $title_weight . $title_style . $title_transform . $title_spacing . $title_height . '}';
		
		if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		
		if ($duotone_gradient != "true" && $duotone_custom != "") $brankic_swiper_css .= '#' . $brankic_id . ' .single-color:before{background:' . $duotone_custom . '}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $brankic_swiper_css .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $brankic_swiper_css .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
		
		return $brankic_swiper_css;
	}
	
	if ($shortcode == "brankic_swiper_slide"){
		
		if (array_key_exists("text_color", $shortcode_atts)) $text_color = $shortcode_atts["text_color"]; else $text_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";

		$brankic_swiper_css = "";
		
		$brankic_id = 'brankic_swiper_slide_' . brankic_string_to_class($shortcode_atts);
	
		if ($text_color != "") {
			$brankic_swiper_css .= '#' . $brankic_id . '.swiper-slide {color: ' . $text_color . ';}';
		}
		if ($bg_color != "") {
			$brankic_swiper_css .= '#' . $brankic_id . ' .row-bg.background-color {background: ' . $bg_color . ';}';
		}

		return $brankic_swiper_css;
	}
	
	if ($shortcode == "brankic_pricing_table_wrapper"){
		
		if (array_key_exists("table_color", $shortcode_atts)) $table_color = $shortcode_atts["table_color"]; else $table_color = "";
		if (array_key_exists("border_color", $shortcode_atts)) $border_color = $shortcode_atts["border_color"]; else $border_color = "";
		if (array_key_exists("border_radius", $shortcode_atts)) $border_radius = $shortcode_atts["border_radius"]; else $border_radius = "";
		if (array_key_exists("shadow_color", $shortcode_atts)) $shadow_color = $shortcode_atts["shadow_color"]; else $shadow_color = "";
		if (array_key_exists("title_color", $shortcode_atts)) $title_color = $shortcode_atts["title_color"]; else $title_color = "";
		if (array_key_exists("subtitle_color", $shortcode_atts)) $subtitle_color = $shortcode_atts["subtitle_color"]; else $subtitle_color = "";
		if (array_key_exists("price_color", $shortcode_atts)) $price_color = $shortcode_atts["price_color"]; else $price_color = "";
		if (array_key_exists("products_color", $shortcode_atts)) $products_color = $shortcode_atts["products_color"]; else $products_color = "";
		if (array_key_exists("button_color", $shortcode_atts)) $button_color = $shortcode_atts["button_color"]; else $button_color = "";
		if (array_key_exists("button_text_color", $shortcode_atts)) $button_text_color = $shortcode_atts["button_text_color"]; else $button_text_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		if (array_key_exists("bg_color", $shortcode_atts)) $bg_color = $shortcode_atts["bg_color"]; else $bg_color = "";
		

		$brankic_css = "";
		
		$brankic_id = 'brankic_pricing_table_wrapper_' . brankic_string_to_class($shortcode_atts);
	
		if ($table_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content{background: ' . $table_color . ';}';
		}
		if ($border_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content {border-color: ' . $border_color . ';}';
		}
		if ($border_radius != "") {
			$brankic_css .= '#' . $brankic_id . ' .content {border-radius: ' . $border_radius . ';}';
		}
		if ($shadow_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content {box-shadow: 0 10px 40px 0 ' . $shadow_color . ';}';	
		}
		if ($title_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .title {color: ' . $title_color . ';}';
		}		
		if ($subtitle_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .subtitle {color: ' . $subtitle_color . ';}';
		}		
		if ($price_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .pricing.price {color: ' . $price_color . ';}';
		}		
		if ($products_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .pricing.features{color: ' . $products_color . ';}';
		}		
		if ($button_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .brankic_button{background: ' . $button_color . ';}';
		}		
		if ($button_text_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .brankic_button{color: ' . $button_text_color . ';}';
		}

		return $brankic_css;
	}
	
	if ($shortcode == "brankic_pricing_table"){
		
		if (array_key_exists("featured", $shortcode_atts)) $featured = $shortcode_atts["featured"]; else $featured = "";
		if (array_key_exists("table_color", $shortcode_atts)) $table_color = $shortcode_atts["table_color"]; else $table_color = "";
		if (array_key_exists("border_color", $shortcode_atts)) $border_color = $shortcode_atts["border_color"]; else $border_color = "";
		if (array_key_exists("border_radius", $shortcode_atts)) $border_radius = $shortcode_atts["border_radius"]; else $border_radius = "";		
		if (array_key_exists("title_color", $shortcode_atts)) $title_color = $shortcode_atts["title_color"]; else $title_color = "";
		if (array_key_exists("subtitle_color", $shortcode_atts)) $subtitle_color = $shortcode_atts["subtitle_color"]; else $subtitle_color = "";
		if (array_key_exists("price_color", $shortcode_atts)) $price_color = $shortcode_atts["price_color"]; else $price_color = "";
		if (array_key_exists("products_color", $shortcode_atts)) $products_color = $shortcode_atts["products_color"]; else $products_color = "";
		if (array_key_exists("button_color", $shortcode_atts)) $button_color = $shortcode_atts["button_color"]; else $button_color = "";
		if (array_key_exists("button_text_color", $shortcode_atts)) $button_text_color = $shortcode_atts["button_text_color"]; else $button_text_color = "";

		if ($featured == "true"){
		
		$brankic_css = "";
		
		$brankic_id = 'brankic_pricing_table_' . brankic_string_to_class($shortcode_atts);
	
		if ($table_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content{background: ' . $table_color . ';}';
		}
		if ($border_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content {border-color: ' . $border_color . ';}';
		}
		if ($border_radius != "") {
			$brankic_css .= '#' . $brankic_id . ' .content {border-radius: ' . $border_radius . ';}';
		}
		if ($title_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .title {color: ' . $title_color . ';}';
		}		
		if ($subtitle_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .subtitle {color: ' . $subtitle_color . ';}';
		}		
		if ($price_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .pricing.price {color: ' . $price_color . ';}';
		}		
		if ($products_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .pricing.features{color: ' . $products_color . ';}';
		}		
		if ($button_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .brankic_button{background: ' . $button_color . ';}';
		}		
		if ($button_text_color != "") {
			$brankic_css .= '#' . $brankic_id . ' .content .brankic_button{color: ' . $button_text_color . ';}';
		}

		return $brankic_css;
		}
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if ($shortcode == "vc_row"){
		
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		
		$brankic_id = 'brankic_vc_row_' . brankic_string_to_class($shortcode_atts);
		
		$vc_css = "";
		
		if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		if ($duotone_gradient != "true" && $duotone_custom != "") $vc_css .= '#' . $brankic_id . ' .inner-wrap.single-color:before{background:' . $duotone_custom . '}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $vc_css .= '#' . $brankic_id . ' .inner-wrap.single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $vc_css .= '#' . $brankic_id . ' inner-wrap.single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
		return $vc_css;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if ($shortcode == "vc_row_inner"){
		
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		
		$brankic_id = 'brankic_vc_row_inner_' . brankic_string_to_class($shortcode_atts);
		
		$vc_css = "";
		
		if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		if ($duotone_gradient != "true" && $duotone_custom != "") $vc_css .= '#' . $brankic_id . ' .inner-wrap.single-color:before{background:' . $duotone_custom . '}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $vc_css .= '#' . $brankic_id . ' .inner-wrap.single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $vc_css .= '#' . $brankic_id . ' .inner-wrap.single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
		return $vc_css;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if ($shortcode == "vc_column"){
		
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		
		$brankic_id = 'brankic_vc_column_' . brankic_string_to_class($shortcode_atts);
		
		$vc_css = "";
		
		if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		if ($duotone_gradient != "true" && $duotone_custom != "") $vc_css .= '#' . $brankic_id . ' .single-color:before{background:' . $duotone_custom . '}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $vc_css .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $vc_css .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
		return $vc_css;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if ($shortcode == "vc_column_inner"){
		
		if (array_key_exists("duotone_custom", $shortcode_atts)) $duotone_custom = $shortcode_atts["duotone_custom"]; else $duotone_custom = "";
		if (array_key_exists("duotone_gradient", $shortcode_atts)) $duotone_gradient = $shortcode_atts["duotone_gradient"]; else $duotone_gradient = "";
		if (array_key_exists("duotone_custom_2", $shortcode_atts)) $duotone_custom_2 = $shortcode_atts["duotone_custom_2"]; else $duotone_custom_2 = "";
		if (array_key_exists("duotone_custom_3", $shortcode_atts)) $duotone_custom_3 = $shortcode_atts["duotone_custom_3"]; else $duotone_custom_3 = "";
		if (array_key_exists("duotone_gradient_direction", $shortcode_atts)) $duotone_gradient_direction = $shortcode_atts["duotone_gradient_direction"]; else $duotone_gradient_direction = "to top right";
		
		$brankic_id = 'brankic_vc_column_inner_' . brankic_string_to_class($shortcode_atts);
		
		$vc_css = "";
		
		if ($duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		if ($duotone_gradient != "true" && $duotone_custom != "") $vc_css .= '#' . $brankic_id . ' .single-color:before{background:' . $duotone_custom . '}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 == "") $vc_css .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ');}';
		if ($duotone_gradient == "true" && $duotone_custom != "" && $duotone_custom_2 != "" && $duotone_custom_3 != "") $vc_css .= '#' . $brankic_id . ' .single-color:before{background: ' . $direction . '(' . $duotone_gradient_direction . ', ' . $duotone_custom . ' , ' . $duotone_custom_2 . ', ' . $duotone_custom_3 . ');}';
		
		return $vc_css;
	}
}