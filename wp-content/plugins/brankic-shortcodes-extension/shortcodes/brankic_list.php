<?php
/*******************************************************************************************************************
* Brankic LIST													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_list')) {
	function Brankic_list($atts, $content = null) {
		
	$default_atts = array(
		"list_marker"  => "plus",
		"color"	=> "#ffffff",
		"list_border"	=> "",
		"list_bg"	=> "",
		"inline"	=> "",	
		"unique"	=> "",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_list_' . brankic_string_to_class($atts);
	if ($unique != "") $brankic_id = 'brankic_list_' . $unique;
	
	if (brankic_string_to_class($atts) != 0 && brankic_check_css_id($brankic_id)) {
		$brankic_id_html = 'id="' . $brankic_id . '"';
	} else {
		$brankic_id_html = '';
	}

	$html = '<div ' . $brankic_id_html . ' class="br-list ' . $inline . '" data-list="true" data-style="' . $list_marker . '" data-border="' . $list_border . '" data-bg-color="' . $list_bg . '">';
	$html .= do_shortcode($content);
	$html .= '</div>';

    return $html;
}
add_shortcode('brankic_list', 'Brankic_list');

}