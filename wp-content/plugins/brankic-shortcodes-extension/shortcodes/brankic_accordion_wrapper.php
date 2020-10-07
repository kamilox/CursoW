<?php
/*******************************************************************************************************************
* ACCORDION WRAPPER													 	                                           *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_accordion_wrapper')) {
	function Brankic_accordion_wrapper($atts, $content = null) {
		
	$default_atts = array(
		"style" => "accordion_1",
		"active_section" => "0",
		"text_color" => "",
		"caption_color" => "",
		"active_caption_color" => "",
		"bg_color" => "",
		"active_bg_color" => "",
		"bg_color_2" => "",
		"active_bg_color_2" => "",
		"radius" => "",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_accordion_wrapper' . brankic_string_to_class($atts);
	
	if ($radius == "true") $radius_class = "radius"; else $radius_class = "";
	
	$html = "";
	
	$inline_script = 'jQuery(document).ready(function($){	$("#' . $brankic_id . '").brankic_accordion({active: ' . $active_section . '}); });';
	
	wp_register_script( 'dummy-handle-footer', '', [], '', true );
	wp_enqueue_script( 'dummy-handle-footer'  );
	wp_add_inline_script( 'dummy-handle-footer', $inline_script );
	
	if ($style == "accordion_1") $html .= '<div id="' . $brankic_id . '" class="accordion-wrap">';
	if ($style == "accordion_2") $html .= '<div id="' . $brankic_id . '" class="accordion-wrap boxed shadow border-radius">';
	if ($style == "accordion_3") $html .= '<div id="' . $brankic_id . '" class="accordion-wrap links_gap ' . $radius_class . '">';
	if ($style == "accordion_4") $html .= '<div id="' . $brankic_id . '" class="accordion-wrap links_gap shadow">';
	$html .= do_shortcode($content);
	$html .= '</div>';	
	
    return $html;
}
add_shortcode('brankic_accordion_wrapper', 'Brankic_accordion_wrapper');

}