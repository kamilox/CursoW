<?php
/*******************************************************************************************************************
* STEP													                                                           *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_step')) {
	function Brankic_step($atts, $content = null) {
		
	$default_atts = array(
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$html =  '<div class="step-wrap">';
	$html .= '<div class="divider border divider-icon"><span></span><div><p class="step-number"></p></div><span></span></div>';
	$html .= '<div class="step-inner">';
	$html .= '<div class="step_content">'; 
	$html .= do_shortcode($content);
	$html .= '</div>';                                                             
	$html .= '</div></div>';

    return $html;
}
add_shortcode('brankic_step', 'Brankic_step');

}