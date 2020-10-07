<?php
/*******************************************************************************************************************
* MARQUEE                                                                                            *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_marquee')) {
	function Brankic_marquee($atts, $content = null) {
	
	$default_atts = array(
		"text_color" => "",
		"text_color_2" => "",
		"text_color_3" => "",
		"use_gradient" => "",
		"gradient_direction" => "to top right",
		"size" => "", 
		"size_custom" => '', 
		"weight" => "", 
		"style" => "", 
		"transform" => "", 
		"spacing" => "", 
		"spacing_custom" => "", 		
		"height" => "", 
		"height_custom" => "", 
		"duration" => "7000",
		"gap" => "500",
		"delayBeforeStart" => "0",
		"direction" => "left",
		"duplicate" => "true",

	);
	extract(shortcode_atts($default_atts, $atts));

	$brankic_id = 'brankic_marquee_' . brankic_string_to_class($atts);
	
   
	$inline_script = 'jQuery(document).ready(function($){ ' . "\r\n";
	$inline_script .= '$("#' . $brankic_id . '").marquee({
		duration: ' . $duration . ',
		gap: ' . $gap . ',
		delayBeforeStart: ' . $delayBeforeStart . ',
		direction: "' . $direction . '",
		duplicated: ' . $duplicate . '
	});';
	$inline_script .= '});' . "\r\n";
	
	if ($use_gradient == "true") $gradient_class = "gradient"; else $gradient_class = "";
   
	   $html = "";
	   $html .= '<div id="' . $brankic_id . '" class="marquee ' . $gradient_class . '">';  
	   $html .= do_shortcode($content);
	   $html .= "</div>";
	   
	wp_enqueue_script( 'marquee', plugin_dir_url( __FILE__ ) . '../javascript/jquery.marquee.js', array('jquery'), '1.0.0', true );
	wp_add_inline_script( 'marquee', $inline_script );

	   return $html;
	}
	add_shortcode('brankic_marquee', 'Brankic_marquee');
}