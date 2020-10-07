<?php
/*******************************************************************************************************************
* GRID													                                                           *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_grid')) {
	function Brankic_grid($atts, $content = null) {
		
	$html =  '<div class="grid-wrap text-align-center"><div class="grid-holder"><div class="grid-inner"> ';
	$html .= do_shortcode($content);                                                             
	$html .= '</div></div></div>';

    return $html;
}
add_shortcode('brankic_grid', 'Brankic_grid');

}