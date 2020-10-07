<?php
/*******************************************************************************************************************
* PRICING TABLE WRAPPER													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_pricing_table_wrapper')) {
	function Brankic_pricing_table_wrapper($atts, $content = null) {
		
	$default_atts = array(
		"width" 			=> "", 
		"gap" 				=> "",
		"table_color" 		=> "",
		"border_color" 		=> "",
		"border_radius" 	=> "",
		"shadow_color"		=> "",
		"title_color" 		=> "",
		"subtitle_color" 	=> "",
		"price_color"		=> "",
		"products_color" 	=> "",
		"button_color" 		=> "",
		"button_text_color" => "",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_pricing_table_wrapper_' . brankic_string_to_class($atts);

	if ($gap == "true") $gap = "gap";
	$html = '<div class="brankic_pricing_table ' . $width . ' ' . $gap . '" id="' . $brankic_id .'">' . do_shortcode($content) .'</div>';

    return $html;
}
add_shortcode('brankic_pricing_table_wrapper', 'Brankic_pricing_table_wrapper');

}