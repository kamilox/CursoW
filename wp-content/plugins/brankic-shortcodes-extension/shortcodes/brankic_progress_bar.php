<?php
/*******************************************************************************************************************
* PROGRESS BAR SHORTCODE (MUST BE INSIDE THE PROGRESS BARS WRAPPER)                                                *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_progress_bar')) {
	function Brankic_progress_bar($atts, $content = null) {
		
	$default_atts = array(
			"caption" => "",
			"caption_position" => "outside",	
			"value" => "", 
			"bar_color" => "#485cc5",
			"bar_color_2" => "",
			"caption_color" => "#fff",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$caption_color_style = "";
	$style = "";
	
	if ($caption_color != "") $caption_color_style = 'style="color:' . $caption_color . '"';

    if ($bar_color_2 == "" && $bar_color != "") $style = 'style="background:' . $bar_color . ';"'; 
	if ($bar_color_2 != "" && $bar_color != "") $style = 'style="background: linear-gradient(120deg, ' . $bar_color . ', ' . $bar_color_2 . ');"'; 
	
	$html  = '<li>';
	if ($caption_position == "outside") $html .= '<h2 ' . $caption_color_style . ' >' . $caption . ' <strong>' . $value . '%</strong></h2>';
	$html .= '<div>';
	if ($caption_position == "inside") $html .= '<h2 ' . $caption_color_style . '>' . $caption . '</h2>';
	$html .= '<span class="' . $value . '" ' . $style . '></span>';
	$html .= '</div>';
	if ($caption_position == "inside") $html .= '<strong>' . $value . '%</strong>';
	$html .= '</li>';

    return $html;
}
add_shortcode('brankic_progress_bar', 'Brankic_progress_bar');

}