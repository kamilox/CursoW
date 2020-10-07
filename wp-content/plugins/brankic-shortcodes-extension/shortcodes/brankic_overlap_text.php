<?php
/*******************************************************************************************************************
* Page with category listed                                                                                        *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_overlap_text')) {
	function Brankic_overlap_text($atts, $content = null) {

	$default_atts = array(
		"title_front" 							=> "", 
		"title_behind" 							=> "", 
		"title_front_color" 					=> "#000000",
		"title_front_wrapper"					=> "h3",
		"title_front_wrapper_style_custom"		=> "",
		"title_front_wrapper_class" 			=> "", 
		"title_front_wrapper_class_custom" 		=> "", 
		"h_size" 								=> "", 
		"h_size_custom" 						=> '', 
		"h_weight" 								=> "", 
		"h_style" 								=> "", 
		"h_transform"							 => "", 
		"h_spacing" 							=> "", 
		"h_spacing_custom" 						=> "", 		
		"h_height" 								=> "", 
		"h_height_custom"						 => "",
		"title_behind_color" 					=> "#eeeeee", 
		"title_behind_wrapper" 					=> "h4", 
		"title_behind_wrapper_class" 			=> "", 
		"title_behind_wrapper_class_custom" 	=> "", 
		"title_behind_wrapper_style_custom" 	=> "",
		"p_size" 								=> "", 
		"p_size_custom"			 				=> '', 
		"p_weight" 								=> "", 
		"p_style" 								=> "", 
		"p_transform" 							=> "", 
		"p_spacing" 							=> "", 
		"p_spacing_custom" 						=> "",		
		"p_height" 								=> "", 
		"p_height_custom" 						=> "",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_overlap_text_' . brankic_string_to_class($atts);
	
	$title_front_wrapper_style = 'style="';
	
	if ($title_front_wrapper_class == "custom") $title_front_wrapper_class = $title_front_wrapper_class_custom;
	if ($title_front_wrapper_class != "") $title_front_wrapper_class = $title_front_wrapper_class;
	
	if ($title_front_color != "") $title_front_wrapper_style .= 'color:' . $title_front_color . ';';
	if ($title_front_wrapper_style_custom != "") $title_front_wrapper_style .= $title_front_wrapper_style_custom; 
	$title_front_wrapper_style .= '"';
	
	if ($title_behind_wrapper_class == "custom") $title_behind_wrapper_class = $title_behind_wrapper_class_custom;
	if ($title_behind_wrapper_class != "") $title_behind_wrapper_class = $title_behind_wrapper_class;
	
	$title_behind_wrapper_style = 'style="';
	if ($title_behind_color != "") $title_behind_wrapper_style .= 'color:' . $title_behind_color . ';';
	if ($title_behind_wrapper_style_custom != "") $title_behind_wrapper_style .= $title_behind_wrapper_style_custom; 
	$title_behind_wrapper_style .= '"';
	
	//if ($title_behind_wrapper == "custom") $title_behind_wrapper = $title_behind_wrapper_custom;
	
	$html = "";	
	$html .= '<div class="overlap-text" id="' . $brankic_id . '">';
    $html .= '	<' . $title_front_wrapper . ' class="overlap-inner ' . $title_front_wrapper_class . '" ' . $title_front_wrapper_style . '>' . $title_front . '</' . $title_front_wrapper . '>';
	$html .= '  <' . $title_behind_wrapper . ' class="overlap-heading ' . $title_behind_wrapper_class . '" ' . $title_behind_wrapper_style . '>' . $title_behind . '</' . $title_behind_wrapper . '>';
	$html .= '</div>';
	
	return $html;

	}
	add_shortcode('brankic_overlap_text', 'Brankic_overlap_text');
}