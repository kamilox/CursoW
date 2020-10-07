<?php
if(!function_exists('brankic_section_classes')){ 
function brankic_section_classes($layout) {
	$content_class = "";
	$holder_class = "";
	$row_class = "";
	
	if ($layout == "fullwidth_no_padding_no_margin") {
		$content_class = "";
		$holder_class = "fullwidth no-padding";
		$row_class = "no-margin";
	}
	if ($layout == "fullwidth_no_padding") {
		$content_class = "";
		$holder_class = "no-padding fullwidth";
		$row_class = "";
	}
	if ($layout == "fullwidth") {
		$content_class = "";
		$holder_class = "fullwidth";
		$row_class = "";
	}	
	if ($layout == "no_margin") {
		$content_class = "";
		$holder_class = "";
		$row_class = "no-margin";
	}
	if ($layout == "no_padding") {
		$content_class = "";
		$holder_class = "no-padding";
		$row_class = "";
	}
	if ($layout == "no_padding_top") {
		$content_class = "";
		$holder_class = "no-padding-top";
		$row_class = "";
	}
	if ($layout == "minimized") {
		$content_class = "";
		$holder_class = "minimized";
		$row_class = "";
	}
	if ($layout == "nothing") {
		$content_class = "";
		$holder_class = "";
		$row_class = "";
	}
	if ($layout == "no_padding_no_margin") {
		$content_class = "";
		$holder_class = "no-padding";
		$row_class = "no-margin";
	}
	$return_classes["content_class"] = $content_class;
	$return_classes["holder_class"] = $holder_class;
	$return_classes["row_class"] = $row_class;
	
	return $return_classes;
	
}
}



$brankic_shortcodes_array = array(	"brankic_category",
									"brankic_section_title",
									"brankic_divider",
									"brankic_icon",
									"brankic_wow_wrapper",
									"brankic_social_icons",
									"brankic_counter",
									"brankic_progress_bars_wrapper",
									"brankic_progress_bar",
									"brankic_pie_charts_wrapper",
									"brankic_pie_chart",
									"brankic_team_member",
									"brankic_button",
									"brankic_scroll_button",
									"brankic_list",
									"brankic_blockquote",
									"brankic_pricing_table_wrapper",
									"brankic_pricing_table",
									"brankic_accordion_wrapper",
									"brankic_accordion",
									"brankic_tabs_wrapper",
									"brankic_tab",
									"brankic_grid_wrapper",
									"brankic_grid",
									"brankic_map",
									"brankic_share",
									"brankic_autotype",
									"brankic_overlap_text",
									"brankic_contact_form_7",
									"brankic_carousel",
									"brankic_swiper_slide_wrapper",
									"brankic_swiper_slide",
									"brankic_box",
									"brankic_flipbox",
									"brankic_steps_wrapper",
									"brankic_step",
									"brankic_vertical",
									"brankic_reveal",
									"brankic_image",
									"brankic_collage",
									"brankic_list_wrapper",
									"brankic_instafeed_20",
									"brankic_bg_video",
									"brankic_restaurant_menu_item",
									"brankic_sidebar",
									"brankic_marquee",
									"brankic_super_slider_wrapper",
									"brankic_super_slide",
);


foreach($brankic_shortcodes_array as $shortcode){
    require "shortcodes/" .$shortcode .".php";
}

add_filter("the_content", "the_content_filter");

function the_content_filter($content) {
	global $brankic_shortcodes_array;
	// array of custom shortcodes requiring the fix 
	$block = join("|", $brankic_shortcodes_array);

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

	return $rep;
}
?>