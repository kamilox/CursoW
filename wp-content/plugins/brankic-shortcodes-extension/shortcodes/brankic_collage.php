<?php
/*******************************************************************************************************************
* COLLAGE IMAGE                                                                               						   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_collage')) {
	function Brankic_collage($atts) {
	
	$default_atts = array(
		"image_1" 						=> "", 
		"image_extra_1"					=> '',
		"thumb_sizes_1"					=> "brankic-1024-768",
		"shadow_color"					=> "",
		"outset"						=> "",
		"border_radius_1"   			=> "",
		"duotone_1" 					=> "",
		"duotone_custom_1"				=> "",
		"duotone_gradient_1"			=> "",
		"duotone_gradient_direction_1"	=> "to top right",
		"duotone_custom_1_2"			=> "",
		"duotone_custom_1_3"			=> "",
		"image_2" 						=> "", 
		"image_extra_2"					=> '',
		"thumb_sizes_2"					=> "brankic-1024-768",
		"border_radius_2"   			=> "",
		"duotone_2" 					=> "",
		"duotone_custom_2"				=> "",
		"duotone_gradient_2"			=> "",
		"duotone_gradient_direction_2"	=> "to top right",
		"duotone_custom_2_2"			=> "",
		"duotone_custom_2_3"			=> "",
		"image_3" 						=> "", 
		"image_extra_3"					=> '',
		"thumb_sizes_3"					=> "brankic-1024-768",
		"border_radius_3"   			=> "",
		"duotone_3" 					=> "",
		"duotone_custom_3"				=> "",
		"duotone_gradient_3"			=> "",
		"duotone_gradient_direction_3"	=> "to top right",
		"duotone_custom_3_2"			=> "",
		"duotone_custom_3_3"			=> "",
	);
	
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_collage_' . brankic_string_to_class($atts);
	
	if (is_numeric($image_1)) {
		$image_1_id = $image_1;
		$imageSrc_1 = wp_get_attachment_image_src($image_1, $thumb_sizes_1);
		if( $imageSrc_1 ) $image_1 = $imageSrc_1[0];
	}
	if ($image_extra_1 != "") $image_1 = $image_extra_1;
	
	if (is_numeric($image_2)) {
		$image_2_id = $image_2;
		$imageSrc_2 = wp_get_attachment_image_src($image_2, $thumb_sizes_2);
		if( $imageSrc_2 ) $image_2 = $imageSrc_2[0];
	}
	if ($image_extra_2 != "") $image_2 = $image_extra_2;
	
	if (is_numeric($image_3)) {
		$image_3_id = $image_3;
		$imageSrc_3 = wp_get_attachment_image_src($image_3, $thumb_sizes_3);
		if( $imageSrc_3 ) $image_3 = $imageSrc_3[0];
	}
	if ($image_extra_3 != "") $image_3 = $image_extra_3;
	
	
	if ($border_radius_1 != "") {
		$border_radius_data_1 = 'data-border-radius="' . $border_radius_1 . '"';
	} else {
		$border_radius_data_1 = "";
	}
	if ($border_radius_2 != "") {
		$border_radius_data_2 = 'data-border-radius="' . $border_radius_2	. '"';
	} else {
		$border_radius_data_2 = "";
	}
	if ($border_radius_3 != "") {
		$border_radius_data_3 = 'data-border-radius="' . $border_radius_3 . '"';
	} else {
		$border_radius_data_3 = "";
	}
	
	if ($image_1 != "") $number_of_images = 1;
	if ($image_2 != "") $number_of_images = 2;
	if ($image_3 != "") $number_of_images = 3;
	
	$duotone_class_1 = "";
	
	if ($duotone_1 != "") $duotone_class_1 = 'class="' . $duotone_1 . '"'; else $duotone_class_1 = "";
	
	if ($duotone_custom_1 != "" && $duotone_1 == "custom") 	$duotone_class_1 = 'class="duotone single-color"';
	
	if ($duotone_2 != "") $duotone_class_2 = 'class="' . $duotone_2 . '"'; else $duotone_class_2 = "";
	
	if ($duotone_custom_2 != "" && $duotone_2 == "custom") 	$duotone_class_2 = 'class="duotone single-color"';
	
	if ($duotone_3 != "") $duotone_class_3 = 'class="' . $duotone_3 . '"'; else $duotone_class_3 = "";
	
	if ($duotone_custom_3 != "" && $duotone_3 == "custom") 	$duotone_class_3 = 'class="duotone single-color"';
	
	
	if ($shadow_color != "") $shadow_color = 'data-box-shadow="true"' ;	
	
	$html = '<div id="' . $brankic_id . '" class="collage-imagess" data-outset="' . $outset . '" data-images="' . $number_of_images . '">';
	
	$html .= '<div class="image image_1" ' . $border_radius_data_1 . '>';
	
	if ($shadow_color != "") $html .= '<div class="single-image-wrap" ' . $shadow_color . ' >';
		
	if ($duotone_class_1 != "") $html .= '<div ' . $duotone_class_1 . '>';
	
	$html .= '<img src="' . $image_1 . '" alt="" ' . brankic_srcset($image_1_id, $thumb_sizes_1) . '/>';
	
	if ($duotone_class_1 != "") $html .= '</div>';
		
	if ($shadow_color != "") $html .= '</div>';
		
	$html .= '</div>';
                            									
    $html .= '<div class="image image_2_3">';
    
	if ($image_2 != "") {
		$html .= '<div class="img" ' . $border_radius_data_2 . '>';
		
		if ($shadow_color != "") $html .= '<div class="single-image-wrap" ' . $shadow_color . ' >';
		
		if ($duotone_class_2 != "") $html .= '<div ' . $duotone_class_2 . '>';
		
		$html .= '<img src="' . $image_2 . '" alt="" ' . brankic_srcset($image_2_id, $thumb_sizes_2) . ' />';
		
		if ($duotone_class_2 != "") $html .= '</div>';
		
		if ($shadow_color != "") $html .= '</div>';
		
		$html .= '</div>';
	}
    if ($image_3 != "") {
		
		$html .= '<div class="img" ' . $border_radius_data_3 . '>';
		
		if ($shadow_color != "") $html .= '<div class="single-image-wrap" ' . $shadow_color . ' >';
		
		if ($duotone_class_3 != "") $html .= '<div ' . $duotone_class_3 . '>';
		
		$html .= '<img src="' . $image_3 . '" alt="" ' . brankic_srcset($image_3_id, $thumb_sizes_3) . '/>';
		
		if ($duotone_class_3 != "") $html .= '</div>';
		
		if ($shadow_color != "") $html .= '</div>';
		
		$html .= '</div>';
	}
    
	$html .= '</div><!-- END IMAGE-->';
	

								
	$html .= '</div><!-- END COLLAGE-IMAGESS-->';


		
		return $html;
	   
	}
	add_shortcode('brankic_collage', 'Brankic_collage');
}