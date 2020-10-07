<?php
/*******************************************************************************************************************
* ICONS                                                                                            *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_icon')) {
	function Brankic_icon($atts, $content = null) {
		
	$default_atts = array(
			"type"					=> "",
			"icon_fontawesome" 		=> "", 
			"icon_openiconic" 		=> "",
			"icon_typicons" 		=> "",
			"icon_entypo" 			=> "",
			"icon_linecons" 		=> "",
			"icon_monosocial" 		=> "",
			"icon_material" 		=> "",
			"icon_linea"	 		=> "",
			"icon_size" 			=> "3",
			"icon_color" 			=> "#000000", 
			"hover"       			=> "",
			"border_shape"			=> "",
			"icon_shape_padding"	=> "0",
			"icon_color_hover" 		=> "", 
			"bg_shape" 				=> "",
			"bg_color" 				=> "", 
			"bg_color_hover" 		=> "",
			"border_color" 			=> "#000", 
			"border_width" 			=> "", 
			"hover_border_color"	=> "",
			"heading_and_text"		=> "",
			"heading"				=> "",
			"heading_color"			=> "",
			"heading_size"			=> "h3",
			"subheading"			=> "",
			"heading_and_text_style"=> "i-column",
			"content_centered"		=> "",
			"heading_content_color"	=> "#000",
			"unique"				=> "", 
		"tilt"						=> "",
		"tilt_perspective"			=> "1000",
		"tilt_speed"				=> "300",
		"tilt_glare"				=> "",
		"tilt_glare_value"			=> "0.5",
		"tilt_floating"				=> "",
		"tilt_scale"				=> "",
		"tilt_disable_y"			=> "",
		"tilt_disable_x"			=> "",

	);
	
	extract(shortcode_atts($default_atts, $atts));
	
	if ($icon_fontawesome != "") $icon = $icon_fontawesome;
		else if ($icon_openiconic != "") $icon = $icon_openiconic;
			else if ($icon_typicons != "") $icon = $icon_typicons;
				else if ($icon_entypo != "") $icon = $icon_entypo;
					else if ($icon_linecons != "") $icon = $icon_linecons;
						else if ($icon_monosocial != "") $icon = $icon_monosocial;
							else if ($icon_material != "") $icon = $icon_material;
								else if ($icon_linea != "") $icon = $icon_linea;
									else $icon = "fa fa-lightbulb-o";
	
	if(function_exists('vc_icon_element_fonts_enqueue')) {
		vc_icon_element_fonts_enqueue( $type );
	}
	
	//$id = sprintf("%s", uniqid());
	
	$brankic_icon_id = 'brankic_icon_' . brankic_string_to_class($atts);
	if ($unique != "") $brankic_icon_id = 'brankic_icon_' . $unique;
	
	if ($content_centered == "true") $align = "text-align-center"; else $align = "";
	
	if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		$tilt_script .= '$("#' . $brankic_icon_id . '").tilt({';
		
		if ($tilt_perspective) $tilt_script .= 'perspective: ' . $tilt_perspective . ',';
		if ($tilt_speed) $tilt_script .= 'speed: ' . $tilt_speed . ',';
		if ($tilt_glare) $tilt_script .= 'glare: true,maxGlare: ' . $tilt_glare_value . ',';
		if ($tilt_floating) $tilt_script .= 'reset: false,';
		if ($tilt_scale) $tilt_script .= 'scale: ' . $tilt_scale . ',';
		if ($tilt_disable_y) $tilt_script .= 'disableAxis: "X",';
		if ($tilt_disable_x) $tilt_script .= 'disableAxis: "Y",';
		
		$tilt_script .= '})';
		$tilt_script .= '})';
		wp_add_inline_script( 'tilt-jquery', $tilt_script );
	}
	
	$html = "";
	
	if ($heading_and_text == "true"){
		
		$html .= '<div class="icon-box-' . $brankic_icon_id  . ' icon-box ' . $heading_and_text_style . ' ' . $align . '">
						
								<div class="icon-holder">';	
		
		
		
		if ($heading_and_text_style == "i-row heading-icon") $html .= '                        <div class="icon-wrap-holder">';
		
	}
	
	
	$html .= '<div id="' . $brankic_icon_id . '" class="icon-wrap" data-border="true" data-border-size="' . $border_width . '" data-shape="' . $border_shape . '" data-font-size="' . $icon_size . '" data-shape-padding="' . $icon_shape_padding . '">';
	
	$html .= '<div class="icon">
                        	<i class="' . $icon . '"></i>
                            </div>';
	$html .= '</div><!-- END ICON-WRAP -->';
	
	
	if ($heading_and_text == "true"){
		
	
		if ($heading_and_text_style == "i-row heading-icon") $html .= '                        </div><!-- END icon-wrap-holder -->';
		
		
			
		if ($heading_and_text_style != "i-row heading-icon") $html .= '</div><!-- END ICON-HOLDER -->'; 
									
							
		if ($heading_and_text_style != "i-row heading-icon") $html .= '                        <div class="icon-box-content ' . $align . '">';
									
		if ($heading != "") $html .= '                        	<div class="icon-heading">
										<' . $heading_size . '>' . $heading . '</' . $heading_size . '>';
										
		if ($subheading != "") $html .= '<small>' . $subheading . '</small>';
		
		if ($heading != "") $html .= '                            </div><!-- END ICON-HEADING --> ';
									
		
		
		if ($heading_and_text_style == "i-row heading-icon") $html .= '</div><!-- END ICON-HOLDER -->';
		
		if ($heading_and_text_style == "i-row heading-icon") $html .= '                        <div class="icon-box-content ' . $align . '">';
		
		$html .= do_shortcode($content);
										
		$html .= '                    	</div><!-- ICON-BOX-CONTENT -->
							
							</div><!-- ICON-BOX -->';	
	
	}

    return $html;
}
add_shortcode('brankic_icon', 'Brankic_icon');

}