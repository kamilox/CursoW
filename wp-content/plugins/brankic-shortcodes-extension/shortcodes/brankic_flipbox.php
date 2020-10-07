<?php
/*******************************************************************************************************************
* box									                                                           *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_flipbox')) {
	function Brankic_flipbox($atts, $content = null) {
		
	$default_atts = array(
			"front_bg_color"		=> "",
			"front_bg_color_2"		=> "",
			"back_bg_color" 		=> "",
			"back_bg_color_2" 		=> "",
			"front_bg_image" 		=> "",
			"front_bg_image_extra"	=> "",
			"horizontal_align"		=> "text-align-center",
			"vert_align"			=> "vert-middle",
			"front_content_color"	=> "",
			"back_content_color"	=> "",
			"back_content"			=> "",
			"border_radius"			=> "",
			"shadow_color"			=> "",
			"flip_direction"		=> "flip-r-2-l",
			"box_height"			=> "height-45",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$front_bg_image = wp_get_attachment_image_src($front_bg_image, 'full');
	if( $front_bg_image ) $front_bg_image = $front_bg_image[0];
	if ($front_bg_image_extra != "") $front_bg_image = $front_bg_image_extra;
	
	$brankic_id = 'flipbox_' . brankic_string_to_class($atts);
	$flipbox_css = "";
	
	if ($front_bg_color_2 != "") $front_bg_color = 'linear-gradient(120deg, ' . $front_bg_color . ' 0%, ' . $front_bg_color_2 . ' 100%);';
	if ($back_bg_color_2 != "") $back_bg_color = 'linear-gradient(120deg, ' . $back_bg_color . ' 0%, ' . $back_bg_color_2 . ' 100%);';
	

	
	if ($front_bg_color != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-skin .background-color{background:' . $front_bg_color . ';}';
	if ($border_radius != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-skin{border-radius:' . $border_radius . ';}';
	if ($shadow_color != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-skin{box-shadow: 0px 20px 60px 0 ' . $shadow_color . ';}';
	if ($front_content_color != "") $flipbox_css .= '#' . $brankic_id . ' .flipbox-front{color:' . $front_content_color . ';}';
	if ($front_bg_image != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-skin .row-bg.background-image{background-image: url(' . $front_bg_image . ');}';
	
	if ($back_bg_color != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-back{background:' . $back_bg_color . '}';
	if ($back_content_color != "") 	$flipbox_css .= '#' . $brankic_id . ' .flipbox-back{color:' . $back_content_color . ';}';
	if ($border_radius != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-back{border-radius:' . $border_radius . ';}';
	if ($shadow_color != "") 		$flipbox_css .= '#' . $brankic_id . ' .flipbox-back{box-shadow: 0px 20px 60px 0 ' . $shadow_color . ';}';
	

	
	$html = "";
	

    

	$html .= '                        	<div id="' . $brankic_id . '" class="flipbox-wrap ' . $vert_align . ' ' . $horizontal_align . '">
							
							<div class="flipbox ' . $flip_direction . '">
                            
                            	<div class="flipbox-holder ' . $box_height . '"> 
                                    
                                	<div class="flipbox-front">
                                        
                                    	<div class="flipbox-skin">
                                        	<div class="row-bg-wrap">
                                            	<div class="inner-wrap"> 
                                                	<div class="row-bg background-image"></div>
													<div class="row-bg background-color"></div>
                                                </div> 
                                            </div>
                                                
                                        </div><!-- END FLIPBOX-SKIN -->
                                    
                                        <div class="flipbox-front-inner">';
                                                
	$html .= do_shortcode($content);
                                            
    $html .= ' 							</div><!-- FLIPBOX-FRONT-INNER -->
                                        
                                	</div><!-- FLIPBOX-FRONT -->
                                        
                                	<div class="flipbox-back">
                                    	<div class="flipbox-back-inner">		      
                                            ' . $back_content . '
                                        </div><!-- FLIPBOX-BACK-INNER -->
                                        
                                	</div><!-- FLIPBOX-BACK -->
                                    
                            	</div><!-- FLIPBOX-HOLDER -->
                                    
                         	</div><!-- FLIPBOX -->
							
						</div><!-- FLIPBOX-WRAP -->';
                                    
                                        
                                        

	

    return $html;
}
add_shortcode('brankic_flipbox', 'Brankic_flipbox');

}