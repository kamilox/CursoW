<?php
/*******************************************************************************************************************
* PIE CHARTS WRAPPER 								                                                           *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_pie_charts_wrapper')) {
	function Brankic_pie_charts_wrapper($atts, $content = null) {
		
	$default_atts = array(
			"speed" => "2000", 
			"bar_color" => "#706abb", 
			"track_color" => "#2E3748", 
			"size" => "95"
	);
	extract(shortcode_atts($default_atts, $atts));

	wp_enqueue_script( 'jquery.easy-pie-chart', plugin_dir_url( __FILE__ ) . '../javascript/jquery.easy-pie-chart.js', array( 'jquery' ), true);
	$rand = rand(0,10000);
    $inline_script = 'jQuery(document).ready(function($){ ';
	$inline_script .= 'jQuery("#percentages-' . $rand . '").brankic_pie_chart("' . $speed . '", "' . $bar_color . '", "' . $track_color . '", "' . $size . '")';
	$inline_script .= '});';
	wp_add_inline_script( 'jquery.easy-pie-chart', $inline_script );
	
	$html = '<ul class="chart-list text-align-center" id="percentages-' . $rand . '"> ' . do_shortcode($content) .'</ul>';
	

    return $html;
}
add_shortcode('brankic_pie_charts_wrapper', 'Brankic_pie_charts_wrapper');

}