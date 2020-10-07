<?php
/*******************************************************************************************************************
* PRICING LIST WRAPPER													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_list_wrapper')) {
	function Brankic_list_wrapper($atts, $content = null) {
		
	$default_atts = array(
		"list_align"  => "left_right",
		"list_vert_align"	=> "middle",
		"list_stretch" => "1_1_1",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$html = '<div class="bra-horizontal-list" data-list-align="' . $list_align . '" data-vert-align="' . $list_vert_align . '" data-list-stretch="' . $list_stretch . '">' . do_shortcode($content) .'</div>';

    return $html;
}
add_shortcode('brankic_list_wrapper', 'Brankic_list_wrapper');

}