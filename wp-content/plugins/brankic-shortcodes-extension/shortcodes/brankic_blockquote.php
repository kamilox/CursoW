<?php
/*******************************************************************************************************************
* BLOCKQUOTE													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_blockquote')) {
	function Brankic_blockquote($atts, $content = null) {
		
	$default_atts = array(
		"style" => "", 
		"color" => ""
	);
	extract(shortcode_atts($default_atts, $atts));

	if ($color != "") $color = "font-$color";
    $html =  '<blockquote class="' . $style . ' ' . $color . '">' . do_shortcode($content) . '</blockquote>'; 

    return $html;
}
add_shortcode('brankic_blockquote', 'Brankic_blockquote');

}