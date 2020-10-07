<?php
/*******************************************************************************************************************
* AUTOTYPE										 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_autotype')) {
	function Brankic_autotype($atts, $content = null) {
		
	$default_atts = array(
		"static_text" 	 	=> "",
		"static_color"	 	=> "#000000",
		"text" 	 			=> "",
		"color"	 			=> "#000000",
		"period" 			=> "2000",
		"wrapper" 			=> "h1",
		"wrapper_custom" 	=> "",
		"wrapper_class" 	=> "",
		"wrapper_class_custom" => "",
	);
	extract(shortcode_atts($default_atts, $atts));

	wp_enqueue_script( 'jquery.autotype', plugin_dir_url( __FILE__ ) . '../javascript/jquery.autotype.js', array('jquery'), '1.0.0', false );
	
	if ($text != "") {
		$text = str_replace("</p>", "<br />", $text);
		$text = str_replace("<p>", "", $text);
		$text_array = explode("<br />", $text);
		$text_array = array_map('trim', $text_array);	
	}
	$text_array = array_filter($text_array);
	$html = "";
	if ($wrapper == "custom") $wrapper = $wrapper_custom;
	if ($wrapper_class == "custom") $wrapper_class = $wrapper_class_custom;
	
	if ($wrapper != "") $html .= '<' . $wrapper;
	if ($wrapper_class != "") $html .= ' class="' . $wrapper_class . '"';	
	if ($wrapper != "") $html .= '>';
	
	if ($static_text != "") $html .= '<span style="color: ' . $static_color . ';">' . $static_text . '</span> ';
	
	$html .=  '<span style="color: ' . $color . ';" class="txt-rotate" data-period="' . $period . '" data-rotate=\'[ ';
	$i = 0;
	$limit = count($text_array);
	foreach($text_array as $sentence) {
		$i++;
	    $html .= '"' . $sentence . '"';
		if ($i < $limit) $html .= ',';
	}
	$html .= ']\'></span>'; 
	$html .= '<span class="cursor"></span>';
	if ($wrapper != "") $html .= '</' . $wrapper . '>';

    return $html;
}
add_shortcode('brankic_autotype', 'Brankic_autotype');

}