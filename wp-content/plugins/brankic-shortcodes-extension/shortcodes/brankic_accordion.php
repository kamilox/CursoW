<?php
/*******************************************************************************************************************
* ACCORDION													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_accordion')) {
	function Brankic_accordion($atts, $content = null) {
		
	$default_atts = array(
		"caption" => "",
		"caption_wrapper" => "strong",	
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$html = "";
	$html .= '<div class="trigger-button"><span class="icon"></span><' . $caption_wrapper . '>' . $caption . '</' . $caption_wrapper . '></div>';
    $html .= '<div class="accordion-content">';
	$html .= do_shortcode($content);
	$html .= '</div><!--END ACCORDION-->';

    return $html;
}
add_shortcode('brankic_accordion', 'Brankic_accordion');

}