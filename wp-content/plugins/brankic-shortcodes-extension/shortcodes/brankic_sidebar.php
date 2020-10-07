<?php
/*******************************************************************************************************************
* Insert sidebar                                                                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_sidebar')) {
	function Brankic_sidebar($atts, $content = null) {

	$default_atts = array(
		"sidebar_id" 		=> "custom_sidebar_1",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$html = '<div class="sidebar">';
	
	ob_start();
		dynamic_sidebar( $sidebar_id );
		$html .= ob_get_contents();
	ob_end_clean();	

	$html .= "</div>";
	return $html;
	
	}
	add_shortcode('brankic_sidebar', 'Brankic_sidebar');
}