<?php
/*******************************************************************************************************************
* SHARE														 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_share')) {
	function Brankic_share($atts, $content = null) {
		
	$default_atts = array(
		"style" => "yes"
	);
	extract(shortcode_atts($default_atts, $atts));

	ob_start(); 
	//include(plugin_dir_url( __FILE__ ) . '../inc/single-share.php');
	$html = ob_get_clean();

    return $html;
}
add_shortcode('brankic_share', 'Brankic_share');

}