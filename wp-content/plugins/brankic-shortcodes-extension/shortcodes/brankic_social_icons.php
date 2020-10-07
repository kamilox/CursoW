<?php
/*******************************************************************************************************************
* SOCIAL ICONS                                                                             						   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_social_icons')) {
	function Brankic_social_icons($atts, $content = null) {
		$default_atts = array(
			"shape" => "default",
			"icon_color" => "", 
			"icon_hover_color" => "",
			"icon_bg_color"	=> "",
			"bg_hover_color" => "",
			"icon_border_color" => "",
			"icon_border_hover_color" => "",
			
			
		);
	extract(shortcode_atts($default_atts, $atts));

	if (brankic_string_to_class($atts) != 0) $brankic_id = 'brankic_social_icons_' . brankic_string_to_class($atts);
	else $brankic_id = "";
	
	if ($brankic_id != "") $brankic_id_html = 'id="' . $brankic_id . '"'; else $brankic_id_html = "";

	$icons_style = "";
	
	
	
	
    $html =  '       <ul ' . $brankic_id_html . ' class="social-bookmarks ' . $shape . '">'; 	
    
	$social_list_array = explode(",", $content);
    for ($i = 0 ; $i < count($social_list_array) ; $i = $i + 2)
    {
	
		if ($shape == "icon-text") $html .=  "<li><a href='" . trim($social_list_array[$i + 1]) . "' class='social-" . strtolower(trim($social_list_array[$i])) . "'><i class='fa fa-" . strtolower(trim($social_list_array[$i])) . "'></i><span>" . trim($social_list_array[$i]) . "</span></a></li>";
		if ($shape == "text") $html .=  "<li><a href='" . trim($social_list_array[$i + 1]) . "' class='social-" . strtolower(trim($social_list_array[$i])) . "'><span>" . trim($social_list_array[$i]) . "</span></a></li>";

		if ($shape == "circle" || $shape == "diamond" || $shape == "rectangle" || $shape == "default") {
			$html .=  '<li><a href="' . trim($social_list_array[$i + 1]) . '" class="social-' . strtolower(trim($social_list_array[$i])) . '"><i class="fa fa-' . strtolower(trim($social_list_array[$i])) . '"></i></a></li>';  
		}
	}
     $html .=  "           </ul>";

	return $html;
	}
	add_shortcode('brankic_social_icons', 'Brankic_social_icons');
}