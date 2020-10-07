<?php
/*******************************************************************************************************************
* BOXED ICONS                                                                                            *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_box')) {
	function Brankic_box($atts, $content = null) {
		
	$default_atts = array(
			
			"box_bg_color" 			=> "",
			"use_gradient_bg"		=> "",
			"box_gradient_direction"=> "to top right",
			"box_bg_color_2"		=> "",
			"box_bg_color_3"		=> "",
			"box_bg_color_4"		=> "",
			"hover"       			=> "",
			"box_hover_bg_color" 	=> "",
			"box_hover_bg_color_2" 	=> "",
			"box_hover_bg_gradient_direction" => "to top right",
			"zoom" 					=> "",
			"bg_zoom" 				=> "",
			"bg_image" 				=> "",
			"bg_image_extra"		=> "",
			"thumb_sizes"			=> "4x3",
			"horizontal_align"		=> "text-align-center",
			"vertical_align"		=> "vert-top",			
			"box_border_radius" 	=> "",
			"box_border_width" 		=> "",
			"box_border_color"		 => "",
			"box_hover_border_color" => "",
			"box_shadow_color" 		=> "",
			"box_hover_shadow_color" => "",
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
			"icon_color_hover" 		=> "", 			
			"icon_border_shape"		=> "",
			"icon_shape_padding" 	=> "",
			"icon_border_width" 	=> "",
			"icon_border_color" 	=> "#000", 
			"icon_border_color_hover"=> "",			
			"icon_bg_color" 		=> "", 
			"icon_bg_color_hover" 	=> "",
			"img_radius" 			=> "",
			"img_radius_size" 		=> "4px",			
			"heading"				=> "",
			"heading_size"			=> "h3",
			"subheading"			=> "",
			"heading_color"			=> "",
			"hover_heading_color"	=> "",
			"content_color"			=> "",
			"hover_content_color"	=> "",
			"heading_and_text_style"=> "i-column",
			"content_centered"		=> "",
			"box_height"			=> "",
			"box_url"				=> "",
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
									else $icon = "";
	
	if(function_exists('vc_icon_element_fonts_enqueue')) {
		vc_icon_element_fonts_enqueue( $type );
	}
	
	if (is_numeric($bg_image)) {
		
		$imageSrc = wp_get_attachment_image_src($bg_image, brankic_thumb_size_proportion($thumb_sizes));
		if( $imageSrc ) $bg_image = $imageSrc[0];
	}
	if ($bg_image_extra != "") $bg_image = $bg_image_extra;
	
	//$id = sprintf("%s", uniqid());
	$brankic_id = 'brankic_box_' . brankic_string_to_class($atts);
	
	if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		$tilt_script .= '$("#' . $brankic_id . '").tilt({';
		
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
	
	$data_hover = "";
	if ($hover == "true" && $box_hover_bg_color != "") {
		$data_hover = 'data-hover="true"';
	}
	
	$html = "";
	
	if ($img_radius == "true") $img_radius_size_data = "data-img_radius_size='" . $img_radius_size . "'"; else  $img_radius_size_data = "";

	if ($box_url == "") $html .= '                            <div id="' . $brankic_id . '" class="boxes-wrap ' . $vertical_align . '  ' . $horizontal_align . ' ' . $box_height . '"  data-skin-zoom="' . $zoom . '" data-bg-zoom="' . $bg_zoom . '" ' . $img_radius_size_data . ' ' . $data_hover . '>'; 
	else $html .= '                            <a href="' . $box_url . '" id="' . $brankic_id . '" class="boxes-wrap ' . $vertical_align . '  ' . $horizontal_align . ' ' . $box_height . '"  data-skin-zoom="' . $zoom . '" data-bg-zoom="' . $bg_zoom . '" ' . $img_radius_size_data . ' ' . $data_hover . '>'; 
                            
    $html .= '                       		<div class="boxes-skin">
                            
                                    <div class="row-bg-wrap">
                                        <div class="inner-wrap"> 
                                            <div class="row-bg background-image" style="background-image: url(' . $bg_image . ');"></div>
											<div class="row-bg background-color"></div>
                                        </div> 
                                    </div>
                                    
                                </div><!-- END BOXES-SKIN -->
                            
                            	<div class="boxes-holder"> 
								
									
                                  
                                    <div class="boxes-inner"> ';	


	

	
	if ($content_centered == "true") $align = "text-align-center"; else $align = "";
	

	//if ($heading_and_text == "true"){
		
		$html .= '<div class="icon-box ' . $heading_and_text_style . ' ' . $align . '">';
						
		if ($icon != "") $html .= '	<div class="icon-holder">';	
		
		
		
		if ($heading_and_text_style == "i-row heading-icon") $html .= '                        <div class="icon-wrap-holder">';
		
	//}
	
	if ($icon != ""){
		
		$html .= '<div class="icon-wrap" data-border="true" data-border-size="' . $icon_border_width . '" data-shape="' . $icon_border_shape . '" data-font-size="' . $icon_size . '" data-shape-padding="' . $icon_shape_padding . '">';
		
		$html .= '<div class="icon">
                        	<i class="' . $icon . '"></i>
                            </div>';
		
		$html .= '</div><!-- END ICON-WRAP -->';
	
	}
	
	
	
	//if ($heading_and_text == "true"){
		
	
		if ($heading_and_text_style == "i-row heading-icon") $html .= '                        </div><!-- END icon-wrap-holder -->';
		
		
			
		if ($heading_and_text_style != "i-row heading-icon" && $icon != "") $html .= '</div><!-- END ICON-HOLDER -->'; 
									
							
		if ($heading_and_text_style != "i-row heading-icon") $html .= '                        <div class="icon-box-content ' . $align . '">';
									
		if ($subheading != "" || $heading != "") $html .= '                        	<div class="icon-heading">';
		if ($heading != "") $html .= '								<' . $heading_size . '>' . $heading . '</' . $heading_size . '>';
										
		if ($subheading != "") $html .= '<small>' . $subheading . '</small>';
		
		if ($subheading != "" || $heading != "") $html .= '                            </div><!-- END ICON-HEADING --> ';
									
		
		
		if ($heading_and_text_style == "i-row heading-icon" && $icon != "") $html .= '</div><!-- END ICON-HOLDER -->';
		
		if ($heading_and_text_style == "i-row heading-icon") $html .= '                        <div class="icon-box-content ' . $align . '">';
		
		$html .= do_shortcode($content);
										
		$html .= '                    	</div><!-- ICON-BOX-CONTENT -->
							
							</div><!-- ICON-BOX -->';	
							
	
	//}
	
	$html .= '                                </div><!-- END BOXES-INNER -->
                                     
                                </div><!-- END BOXES-HOLDER -->';
                                 
    if ($box_url == "") $html .= '   </div><!-- END BOXES-WRAP -->'; 
	else $html .= '                        </a><!-- END BOXES-WRAP --> ';

    return $html;
}
add_shortcode('brankic_box', 'Brankic_box');

}