<?php
/*******************************************************************************************************************
* TABS WRAPPER												 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_tabs_wrapper')) {
	function Brankic_tabs_wrapper($atts, $content = null) {
		
	$default_atts = array(
		"style" 				=> "rounded", 
		"vertical" 				=> "",
		"bg_color" 				=> "",
		"centered_captions" 	=> "",
		"animation" 			=> "",
		"tab_bg_color" 			=> "",
		"active_tab_bg_color" 	=> "",
		"active_tab_bg_color_2" => "",
		"shadow_color"			=> "",
		"tab_text_color" 		=> "",
		"active_tab_text_color" => "",
		"icon_size" 			=> "small", 
		"icon_color" 			=> "",
		"active_icon_color" 	=> "",
		"active_border_color" 	=> "",
	);
	extract(shortcode_atts($default_atts, $atts));
 
	wp_enqueue_script( 'easytabs', plugin_dir_url( __FILE__ ) . '../javascript/jquery.easytabs.min.js', array('brankic-shortcodes-custom'));

	$brankic_id = 'tab_container_' . brankic_string_to_class($atts);
	
	if ($vertical == "true") $vertical = "column";
	
	$data_centered = ' data-captions-centered="' . $centered_captions . '"';
	$data_animation = ' data-animation="' . $animation . '"';
	$data_icon_size = ' data-icon_size="' . $icon_size . '"';
	
	$html =  '<div id="' . $brankic_id . '" class="tab-container ' . $vertical . ' '. $style . '" ' . $data_centered . $data_animation . $data_icon_size . '>';
	$html .= do_shortcode($content);                                                             
	$html .= '</div>';
	
    return $html;
}
add_shortcode('brankic_tabs_wrapper', 'Brankic_tabs_wrapper');

}