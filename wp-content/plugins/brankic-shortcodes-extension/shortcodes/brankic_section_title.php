<?php
/*******************************************************************************************************************
* NICE (CENTERED) TITLE                                                                                            *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_section_title')) {
	function Brankic_section_title($atts, $content = null) {
	
	$default_atts = array(
		"title" => '', 
		"title_color" => '', 
		"title_color_2" => '',
		"title_gradient_direction" => "to right",
		"h_tag" => "h2", 
		"h_size" => "", 
		"h_size_custom" => '', 
		"h_weight" => "", 
		"h_style" => "", 
		"h_transform" => "", 
		"h_spacing" => "", 
		"h_spacing_custom" => "", 		
		"h_height" => "", 
		"h_height_custom" => "", 
		"small_title" => "", 
		"p_custom_font" => "",
		"p_size" => "", 
		"p_size_custom" => '', 
		"p_weight" => "", 
		"p_style" => "", 
		"p_transform" => "", 
		"p_spacing" => "", 
		"p_spacing_custom" => "",		
		"p_height" => "", 
		"p_height_custom" => "",
		"small_title_color" => "", 
		"small_title_position" => "above", 
		"centered" => "", // ??
		"outdent" => "",  // ??
		"heading_url" => "", // ??
		"highlight" => "",
		"highlight_pretext" => "",
		"highlight_style" => "highlight underline",
		"highlight_text_color" => "",
		"highlight_hover_text_color" => "",
		"highlight_background_color_1" => "",
		"highlight_background_color_2" => "",
		"highlight_hover_background_color_1" => "",
		"highlight_hover_background_color_2" => "",
		"unique"							=> "",	
	);
	extract(shortcode_atts($default_atts, $atts));

	   $brankic_id = 'brankic_section_title_' . brankic_string_to_class($atts);
	   if ($unique != "") $brankic_id = 'brankic_section_title_' . $unique;
   
		if ($title != "" && $content == "") $content = $title;  

	   
	   if ($centered == "true") $centered = "text-align-center"; else $centered = "";
   
	   $html = "";
	   if ($heading_url != "") $html .= "<a href='$heading_url'>";
	   if ($outdent != "") $html .= "<div class='outdent-wrap outdent $outdent'>";
	   
	   if ($title_color_2 != "") $gradient_class = 'gradient'; else $gradient_class = "";

	   $html .= "<div class='section-title $centered'>";
	   if ($small_title != "" && $small_title_position != "below") $html .= '<p id="subtitle_' . $brankic_id . '" class="subtitle ' . $p_custom_font .'">' . $small_title . '</p>';
	   if ($content != "") $html .= '<' . $h_tag . ' id="' . $brankic_id . '" class="' . $gradient_class . ' section_title">';
	   
	   if ($highlight == "true" && $highlight_pretext != "") $html .= $highlight_pretext. ' ';
	   //if ($stroke == "true" && $stroke_pretext != "") $html .= $stroke_pretext . ' <span class="' . $stroke_class . '">';
	   
	   if ($highlight == "true") $html .= '<span class="' . $highlight_style . '">';
	   
	   
	   $html .= do_shortcode($content);
	   
	   if ($highlight == "true") $html .= '</span>';
	   //if ($stroke == "true") $html .= '</span>';
	   if ($content != "") $html .= "</" . $h_tag . ">";
	   if ($small_title != "" && $small_title_position == "below") $html .= '<p id="subtitle_' . $brankic_id . '" class="subtitle ' . $p_custom_font .'">' . $small_title . '</p>';
	   $html .= "</div>";
	   if ($outdent != "") $html .= "</div> <!--END OUTDENT-->";
	   if ($heading_url != "") $html .= "</a>";
	   return $html;
	}
	add_shortcode('brankic_section_title', 'Brankic_section_title');
}