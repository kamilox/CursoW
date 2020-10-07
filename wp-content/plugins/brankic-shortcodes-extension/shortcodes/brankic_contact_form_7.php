<?php
/*******************************************************************************************************************
* Auto insert Contact Form 7 Shortcode                                                                             *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_contact_form_7')) {
	function Brankic_contact_form_7($atts, $content = null) {

	$default_atts = array(
		"cf_7_id" 		=> "",
		"color" 		=> "",
		"border_color" 	=> "",
		"active_input_border_color" => "",
		"submit_button_text_color" 	=> "",
		"submit_button_bg_color" 	=> "",
		"submit_button_hover_text_color" 	=> "",
		"submit_button_hover_bg_color" 	=> "",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$cf_7_shortcodes = brankic_contact_form_7_templates("cf_7_shortcodes", $color, $border_color);
	$html = $cf_7_shortcodes[$cf_7_id];
	
	return do_shortcode($html);
	
	}
	add_shortcode('brankic_contact_form_7', 'Brankic_contact_form_7');
}