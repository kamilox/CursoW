<?php
/*******************************************************************************************************************
* PIE CHART SHORTCODE (MUST BE INSIDE THE PIE CHARTS WRAPPER) 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_pie_chart')) {
	function Brankic_pie_chart($atts, $content = null) {
		
	$default_atts = array(
			"caption" => "", 
			"value" => "", 
			"width" => "one-fourth", 
			"last" => ""
	);
	extract(shortcode_atts($default_atts, $atts));

	if ($last == "true") $last = "last"; else $last = "";
    $html  = '<li class="chart ' . $width . ' ' . $last . '">';
	$html .= '<div class="percentage" data-percent="' . $value . '"><span>' . $value . '%</span></div>';
	$html .= '<strong class="uppercase">' . $caption . '</strong>';
	$html .= '</li>';

    return $html;
}
add_shortcode('brankic_pie_chart', 'Brankic_pie_chart');

}