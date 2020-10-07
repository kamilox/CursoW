<?php
/*******************************************************************************************************************
* GRID WRAPPER												 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_grid_wrapper')) {
	function Brankic_grid_wrapper($atts, $content = null) {
		
	$default_atts = array(
		"columns" 		=> "col4", 
		"vert_align" 	=> "vert-middle",
		"border_color" 	=> "", 
	);
	extract(shortcode_atts($default_atts, $atts));
	if ($border_color != "") $grid_border_style = 'style="border-color:' . $border_color . '"'; else $grid_border_style = "";
	
	$html =  '<div class="grid ' . $vert_align . ' ' . $columns . '" ' . $grid_border_style . '>';

	$html .= do_shortcode($content);                                                             
	$html .= '</div>';
	
	wp_register_script( 'dummy-handle-footer', '', [], '', true );
	wp_enqueue_script( 'dummy-handle-footer'  );
	$inline_script_grid = 'jQuery(document).ready(function($) {$(".grid").bra_last_last_row();})';
	wp_add_inline_script( 'dummy-handle-footer', $inline_script_grid );

    return $html;
}
add_shortcode('brankic_grid_wrapper', 'Brankic_grid_wrapper');

}