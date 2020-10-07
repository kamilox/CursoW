<?php
/*******************************************************************************************************************
* REVEAL													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_reveal')) {
	function Brankic_reveal($atts, $content = null) {
		
	$default_atts = array(
		"direction" 	=> "lr", 
		"color" 		=> "#ff2d57",
		"delay" 		=> "350",
		"image_src"		=> "",
		"image_src_extra"=> "",
		"border_radius"  => "",
		"shadow_color"	=> "",
		"height"		=> "height-70"
	);
	extract(shortcode_atts($default_atts, $atts));

	wp_enqueue_script( 'jquery.blockreveal', plugin_dir_url( __FILE__ ) . '../javascript/jquery.blockreveal.js', array('jquery'), '1.0.0', false );
	
	if (is_numeric($image_src)) {
		$imageSrc = wp_get_attachment_image_src($image_src, 'brankic-1024-768');
		if( $imageSrc ) $image_src = $imageSrc[0];
	}
	if ($image_src_extra != "") $image_src = $image_src_extra;
	
	if ($border_radius != "") {
		$border_radius_data = 'data-border-radius="' . $border_radius	. '"';
	} else {
		$border_radius_data = "";
	}
	
	if ($shadow_color != "") $shadow_color_data = 'data-box-shadow="true"' ; else $shadow_color_data = "";	
	
	$brankic_id = 'brankic_reveal_' . brankic_string_to_class($atts);
	
	$html = "";
	
    if ($content != "") {
		$html .=  '<div class="reveal-wrap"><div class="reveal" data-color="' . $color . '" data-delay="' . $delay . '" data-direction="' . $direction . '">' . do_shortcode($content) . '</div></div>'; 
	}
	if ($image_src != "") {
		$html .= '<div class="reveal-wrap"><div id="' . $brankic_id . '" class="reveal content__image" data-color="' . $color . '" data-delay="' . $delay . '" data-direction="' . $direction . '" ' . $border_radius_data . ' ' . $shadow_color_data . '>
                        	<div class="' . $height . '">
								<img src="' . $image_src . '" alt="">							
							</div>
                    	</div></div>';
	}

    return $html;
}
add_shortcode('brankic_reveal', 'Brankic_reveal');

}