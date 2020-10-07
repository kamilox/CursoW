<?php
/*******************************************************************************************************************
* BUTTON										 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_button')) {
	function Brankic_button($atts, $content = null) {
		
	$default_atts = array(
		"button_text" 			=> "Discover more",
		"size" 					=> "medium", 
		"shape" 				=> "", 
		"hover" 				=> "normal",
		"half"	 				=> "",
		"text_color" 			=> "",
		"arrow_color" 			=> "",
		"bg_color" 				=> "", 
		"bg_color_2" 			=> "", 
		"border_color" 			=> "", 
		"border_color_2" 		=> "", 
		"text_hover_color" 		=> "",
		"arrow_hover_color" 	=> "",
		"trans_bg"				=> "",
		"bg_hover_color" 		=> "", 
		"bg_hover_color_2" 		=> "", 
		"border_hover_color" 	=> "", 
		"border_hover_color_2" 	=> "",
		"hover_movement"		=> "",
		"url" 			    	=> "#",
		"pretty_photo"			=> "no",
		"prettyphoto_w"			=> "",
		"prettyphoto_h"			=> "",
		"shadow_color"			=> "",
		"shadow_hover_color"	=> "",
		"unique"				=> "",
		"tilt"						=> "",
		"tilt_perspective"			=> "1000",
		"tilt_speed"				=> "300",
		"tilt_glare"				=> "",
		"tilt_glare_value"			=> "0.5",
		"tilt_floating"				=> "",
		"tilt_scale"				=> "",
		"tilt_disable_y"			=> "",
		"tilt_disable_x"			=> "",
	);
	extract(shortcode_atts($default_atts, $atts));
	

	if ($half == "true") $half = "half";
	if ($border_color != "" || $border_color_2 != "") {
		$data_border = '[data-border="true"]'; 
		$data_border_html = 'data-border="true"';
	} else {
		$data_border = "";
		$data_border_html = "";
	}
	if ($bg_color != "" || $bg_color_2 != "") {
		$data_bg = '[data-bg-color="true"]'; 
		$data_bg_html = 'data-bg-color="true"';
	} else { 
		$data_bg = "";
		$data_bg_html = "";
	}
	

	
	$brankic_button_id = 'brankic_button_' . brankic_string_to_class($atts);
	if ($unique != "") $brankic_button_id = 'brankic_button_' . $unique;
	
	if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		$tilt_script .= '$("#' . $brankic_button_id . '").tilt({';
		
		if ($tilt_perspective) $tilt_script .= 'perspective: ' . $tilt_perspective . ',';
		if ($tilt_speed) $tilt_script .= 'speed: ' . $tilt_speed . ',';
		if ($tilt_glare) $tilt_script .= 'glare: true,maxGlare: ' . $tilt_glare_value . ',';
		if ($tilt_floating) $tilt_script .= 'reset: false,';
		if ($tilt_scale) $tilt_script .= 'scale: ' . $tilt_scale . ',';
		if ($tilt_disable_y) $tilt_script .= 'disableAxis: "X",';
		if ($tilt_disable_x) $tilt_script .= 'disableAxis: "Y",';
		
		$tilt_script .= '})';
		$tilt_script .= '})';
		wp_add_inline_script( 'tilt-jquery', $tilt_script );
	}

	
	if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
		$circle_text = $button_text;		
	} else {
		$circle_text = "";
	}
		
	if ($shape == "button-circle arrow-link") $button_text = '<i class="fa fa-angle-right"></i>';
	if ($shape == "button-circle play") $button_text = '<i class="fa fa-play"></i>';
	
	
	if ($trans_bg == "true") $trans_bg_class = "transparent_on_hover"; else $trans_bg_class = "";
	
	if ($url != "" || $pretty_photo == "yes") {
		wp_enqueue_script( 'prettyphoto' );
		wp_enqueue_style( 'prettyphoto' );
			
		if ($pretty_photo == "yes") $pretty_data = 'data-rel="prettyPhoto[]"'; else $pretty_data = "";	
		if ($pretty_photo == "yes") $pretty_class = 'prettyphoto'; else $pretty_class = "";	
		
		if ($prettyphoto_w != "" && $prettyphoto_h != "") $url .= '?width=' . $prettyphoto_w . '&height=' . $prettyphoto_h;
		
	}
	
	
	if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
		$html =  '<a href="' . $url . '" class="brankic_button ' . $pretty_class . ' ' . $trans_bg_class . ' ' . $shape . ' ' . $size . ' ' . $half . '" ' . $data_border_html . ' ' . $data_bg_html . ' ' . $pretty_data . ' id="' . $brankic_button_id . '">';
		$html .= '<span class="circle-bg ' . $hover . '">' . $button_text . '</span>';		
	} else {
		$html =  '<a href="' . $url . '" class="brankic_button ' . $pretty_class . ' ' . $trans_bg_class . ' ' . $shape . ' ' . $hover . ' ' . $size . ' ' . $half . '" ' . $data_border_html . ' ' . $data_bg_html . ' ' . $pretty_data . ' id="' . $brankic_button_id . '">';
		$html .= '<span>' . $button_text . '</span>';
	}
	
	if ($circle_text != "") $html .= '<span class="text-button">' . $circle_text . '</span>';
	
	$html .= '</a>'; 


    return $html;
}
add_shortcode('brankic_button', 'Brankic_button');

}