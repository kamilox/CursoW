<?php
/*******************************************************************************************************************
* STEPS WRAPPER												 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_steps_wrapper')) {
	function Brankic_steps_wrapper($atts, $content = null) {
		
	$default_atts = array(
		"orientation" => "",
		"align"			=> "center",	
		"number_color" => "#000",
		"border_width" => "4px",
		"border_color" => "#2E3748", 
		"heading_color" => "#000",
		"content_color" => "#000",
		"number_color" => "#000",
		"bg_color" => "#ff2d57", 
		"shadow" => "",
		"shadow_color" => "rgba(255,45,87, 0.06)", 
		"shadow_2_color" => "rgba(255,45,87, 0.05)",
		"shadow_3_color" => "rgba(255,45,87, 0.04)", 
	);
	extract(shortcode_atts($default_atts, $atts));
	
	if ($border_color != "") $data_border = "true"; else $data_border = "";
	
	$brankic_id = 'brankic_steps_wrapper_' . brankic_string_to_class($atts);
	
	wp_register_script( 'dummy-handle-footer', '', [], '', true );
	wp_enqueue_script( 'dummy-handle-footer'  );
	
	$inline_script_steps = 'jQuery(document).ready(function($) {
	$("#' . $brankic_id . ' .step-number").each(function (i) {
									i = i+1;
									$(this).html(i);
							   });';
	
	if ($orientation == "vertical") $inline_script_steps .= '$("#' . $brankic_id . ' .step-wrap .divider").addClass("vertical");';
	if ($orientation == "vertical") $inline_script_steps .= '$("#' . $brankic_id . ' .step-wrap .divider span:first-child").remove()';
							   
	$inline_script_steps .= '})';
	wp_add_inline_script( 'dummy-handle-footer', $inline_script_steps );
	
	$html =  '<div id="' . $brankic_id . '" class="process ' . $orientation . '" data-border="' . $data_border . '" data-align="' . $align . '">';

	$html .= do_shortcode($content);                                                             
	$html .= '</div>';
	


    return $html;
}
add_shortcode('brankic_steps_wrapper', 'Brankic_steps_wrapper');

}