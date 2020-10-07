<?php
/*******************************************************************************************************************
* VERTICAL													                                                           *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_vertical')) {
	function Brankic_vertical($atts, $content = null) {
		
	$default_atts = array(
			"horizontal_align" 	=> "text-align-left", 
			"h_size" 			=> "", 
			"h_size_custom"	 	=> '', 
			"h_weight" 			=> "", 
			"h_style" 			=> "", 
			"h_transform" 		=> "", 
			"h_spacing" 		=> "", 
			"h_spacing_custom" 	=> "", 		
			"h_height" 			=> "", 
			"h_height_custom" 	=> "",
			"tablet_disable"	=> "",	
			"unique" 			=> "",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_vertical_' . brankic_string_to_class($atts);
	if ($unique != "") $brankic_id = 'brankic_vertical_' . $unique;
	if ($tablet_disable == "true") $disable_class = "tablet-disable"; else $disable_class = "";
		
	$html =  '<div id="' . $brankic_id . '" class="rotate ' . $horizontal_align . ' ' . $disable_class . '"> ';
	$html .= do_shortcode($content);                                                             
	$html .= '</div>';

    return $html;
}
add_shortcode('brankic_vertical', 'Brankic_vertical');

}