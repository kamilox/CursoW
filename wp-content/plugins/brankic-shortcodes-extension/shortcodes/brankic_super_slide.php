<?php
/*******************************************************************************************************************
* OWL CAROUSEL SLIDE										 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_super_slide')) {
function Brankic_super_slide($atts, $content = null) {
	
	$default_atts = array(
			"slide_type" 						=> "predefined",
			"caption"							=> "",
			"caption_color" 					=> "",
			"slide_bg_image" 					=> "",
			"slide_bg_image_extra"				=> "",
			"bg_align"							=> "",
			"bg_repeat"							=> "",
			"bg_size"							=> "cover",
			"slide_bg_color" 					=> "",
			"slide_bg_color_use_gradient_bg" 	=> "",
			"slide_bg_color_gradient_direction" => "to top right",
			"slide_bg_color_2" 					=> "",
			"slide_bg_color_3" 					=> "",
			"slide_bg_color_4" 					=> "",
			"content_horizontal_align" 			=> "",
			"content_vertical_align" 			=> "",
			"unique"				 			=> "",
		);
	extract(shortcode_atts($default_atts, $atts));
	
	$default_content_width_responsive =  brankic_of_get_option("default_content_width_responsive", brankic_of_get_default("default_content_width_responsive"));
	$default_content_width_responsive_percent = brankic_of_get_option("default_content_width_responsive_percent", brankic_of_get_default("default_content_width_responsive_percent"));
	if ($default_content_width_responsive != "yes") $default_content_width_responsive_percent = "";
	
	if (is_numeric($slide_bg_image)) {
		$slide_bg_image = wp_get_attachment_image_src($slide_bg_image, 'full');
		if( $slide_bg_image ) $slide_bg_image = $slide_bg_image[0];
	}
	if ($slide_bg_image_extra != "") $slide_bg_image = $slide_bg_image_extra;
	
	$id = 'brankic_super_slide_' . brankic_string_to_class($atts);
	if ($unique != "") $id = 'brankic_super_slide_' . $unique;
	
$default_padding =  brankic_global_or_local("default_padding");
if ($default_padding == "custom") {
	
	if (function_exists("get_field")) {
		$local_default_padding = get_field("default_padding");
	} else $local_default_padding = "";
	
	if (brankic_of_get_option("default_padding", brankic_of_get_default("default_padding")) == "custom" && ($local_default_padding == "" || $local_default_padding == null)){
		$default_right_padding =  brankic_of_get_option("default_right_padding", brankic_of_get_default("default_right_padding"));
		$default_left_padding =  brankic_of_get_option("default_left_padding", brankic_of_get_default("default_left_padding"));	
	} 

	if ($local_default_padding == "custom")	{
		$default_right_padding =  get_field("default_right_padding");
		$default_left_padding =  get_field("default_left_padding");
	}
	
	$default_right_padding = str_replace("padding", "padding-right", $default_right_padding);
	$default_left_padding = str_replace("padding", "padding-left", $default_left_padding);	
	$default_padding = "$default_right_padding $default_left_padding";
}
		
	$html = "";
		
	if ($slide_type == "predefined"){
	
		$html .= '<div id="' . $id . '" class="swiper-slide ' . $content_horizontal_align . ' ' . $content_vertical_align . '">';
            
        if ($slide_bg_color != "" || $slide_bg_image != "") {
			$html .= '              <div class="row-bg-wrap">
										<div class="inner-wrap"> 										
											<div class="row-bg background-image ' . $bg_align . '" style="background-image: url(' . $slide_bg_image . ');"></div>
											<div class="row-bg background-color"></div>
										</div> 
									</div>';
		}
									
		
									
		$html .= '					<article class="' . $default_padding . ' ' . $default_content_width_responsive_percent . '">
									
									
                                            
                                        <div class="post-info">
                                            
                                        	<div class="post-info-content">
                                                    
                                                <h4 class="entry-title">' . $caption . '</h4>';
		$html .= do_shortcode($content);
                                                        
        $html .= '                                	</div><!-- POST-INFO-CONTENT -->
                                                    
                                    	</div><!-- POST-INFO -->
                                        
                                    </article>
                                    
            					</div><!-- SWIPER-SLIDE -->';
	}
	
	if ($slide_type == "custom"){
	
		$html .= '<div class="swiper-slide ' . $content_horizontal_align . ' ' . $content_vertical_align . '">';
            
		if ($slide_bg_color != "" || $slide_bg_image != "") {
			$html .= '					<div class="row-bg-wrap">
											<div class="inner-wrap"> 											
												<div class="row-bg background-image ' . $bg_align . '" style="background-image: url(' . $slide_bg_image . ');"></div>
												<div class="row-bg background-color"></div>
											</div> 
										</div>';
		}
										
        $html .= '                    		<article class="' . $default_padding . ' ' . $default_content_width_responsive_percent . '">';
									
		$html .= do_shortcode($content);	

                                        
        $html .= '                  </article>
                                    
            					</div><!-- SWIPER-SLIDE -->';
	}
	
                                                 

   
    return $html;
}
add_shortcode('brankic_super_slide', 'Brankic_super_slide');

}