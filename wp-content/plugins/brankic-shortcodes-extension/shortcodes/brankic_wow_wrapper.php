<?php
/*******************************************************************************************************************
* WOW wrapper                                                                               						   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_wow_wrapper')) {
	function Brankic_wow_wrapper($atts, $content = null) {
		$default_atts = array(
			"wow_effect" => "fadeInUp", 
			"wow_delay" => "0.5s"
		);
	extract(shortcode_atts($default_atts, $atts));
	$html = '<div class="' . $wow_effect . ' wow" data-wow-delay="' . $wow_delay . '"> ' . do_shortcode($content) .' </div>';

	$inline_script = 'jQuery(document).ready(function($) { wow_bra = new WOW(); wow_bra.init(); })';
	wp_enqueue_script( 'wow', plugin_dir_url( __FILE__ ). '../javascript/wow.min.js', array('jquery'), '1.0.0', true );
	wp_add_inline_script( 'wow', $inline_script );	

	return $html;
	}
	add_shortcode('brankic_wow_wrapper', 'Brankic_wow_wrapper');
}