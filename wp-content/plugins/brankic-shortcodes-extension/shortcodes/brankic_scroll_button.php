<?php
/*******************************************************************************************************************
* SCROLL BUTTON													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_scroll_button')) {
	function Brankic_scroll_button($atts, $content = null) {
		
	$default_atts = array(
		"shape" => "arrow", 
		"color" => "#ffffff",
		"unique"=> "",		
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_scroll_button_' . brankic_string_to_class($atts);
	if ($unique != "") $brankic_id = 'brankic_scroll_button_' . $unique;
		
	
	if ($shape == "three-arrows") {
			$scroll_button = '<a id="' . $brankic_id . '" href="#next" class="vc_row_scroll-link three-arrows"><span></span><span></span><span></span></a>';		
		}
		if ($shape == "arrow") {
			$scroll_button = '<a id="' . $brankic_id . '" href="#next" class="vc_row_scroll-link arrow"><span></span></a>';
		}
		if ($shape == "mouse") {
			$scroll_button = '<a id="' . $brankic_id . '" class="vc_row_scroll-link mouse" href="#next">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106 130">
										<g fill="none" fill-rule="evenodd">
											<rect width="70" height="118" x="1.5" y="1.5" stroke="' . $color . '" stroke-width="4" rx="36"/>
											<circle class="scroll" cx="36.5" cy="31.5" r="5.5" fill="' . $color . '"/>
										</g>
									</svg>
								</a>';
		}
		if ($shape == "pulse") {
			$scroll_button = '<a id="' . $brankic_id . '" href="#next" class="vc_row_scroll-link pulse-button"><span class="pulse"></span><span class="arrow"></span></a>';
		}
		if ($shape == "line") {
			$scroll_button = '<a id="' . $brankic_id . '" href="#next" class="vc_row_scroll-link fluid-line">
                            	<small style="text-transform:uppercase;"></small>
                                <span></span>
							</a>';
		} 

    return $scroll_button;
}
add_shortcode('brankic_scroll_button', 'Brankic_scroll_button');

}