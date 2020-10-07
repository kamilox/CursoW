<?php
/*******************************************************************************************************************
* PROGRESS BARS WRAPPER									                                                           *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_progress_bars_wrapper')) {
	function Brankic_progress_bars_wrapper($atts, $content = null) {
		
	$default_atts = array(
			"speed"			=> "2000",
			"style" 		=> "",
			"bar_radius" 	=> "50em",
			"unique"		=> "",
	);
	extract(shortcode_atts($default_atts, $atts));

	$brankic_id = 'brankic_progress_bars_wrapper_' . brankic_string_to_class($atts);
	
    
	
	wp_register_script( 'dummy-handle-footer', '', [], '', true );
	wp_enqueue_script( 'dummy-handle-footer'  );

	$inline_script = 'jQuery(document).ready(function($){ ';
	$inline_script .= 'jQuery("#' . $brankic_id . '").graph_init(' . $speed . '); });'; 

	wp_add_inline_script( 'dummy-handle-footer', $inline_script );
	
	$html = '<ul class="skills-graph ' . $style . '" id="' . $brankic_id . '"> ' . do_shortcode($content) .'</ul>';

    return $html;
}
add_shortcode('brankic_progress_bars_wrapper', 'Brankic_progress_bars_wrapper');

}