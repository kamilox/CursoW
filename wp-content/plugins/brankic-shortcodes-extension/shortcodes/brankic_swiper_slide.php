<?php
/*******************************************************************************************************************
* SWIPER SLIDE										 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_swiper_slide')) {
function Brankic_swiper_slide($atts, $content = null) {
	
	$default_atts = array(
			"image_src" 		=> "",
			"image_src_extra"	=> "",
			"title" 			=> "",
			"vertical" 			=> "",
			"url" 				=> "",
			"button_url" 		=> "",
			"text_color" 		=> "",
			"bg_color" 			=> "",
			"bg_color_2" 		=> "",
			"light_pagination" 	=> ""
		);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_swiper_slide_' . brankic_string_to_class($atts);
	
	if (is_numeric($image_src)) {
		$imageSrc = wp_get_attachment_image_src($image_src, 'full');
		if( $imageSrc ) $image_src = $imageSrc[0];
	}
	if ($image_src_extra != "") $image_src = $image_src_extra;
	
	if ($bg_color_2 != "") $bg_color = 'linear-gradient(120deg, ' . $bg_color . ' 0%, ' . $bg_color_2 . ' 100%);';
		
   $html = '<div id="' . $brankic_id .'" class="swiper-slide" data-text_color="' . $text_color . '" data-bg_color="' . $bg_color . '" data-rel="' . brankic_safe_string_name($title.$image_src) . '" data-light_pagination="' . $light_pagination . '">
        
											<div class="row-bg-wrap" >
												<div class="inner-wrap"> 
												<div class="row-bg background-color"></div>
												</div> 
											</div>
											
											
											<div class="slide-content">
			
                                            	<div class="entry-category">
                                                	<span class="rotate">' . $vertical . '</span>	
                                                </div>
                                
                                				<div class="post-info-entry">';
                                        
    if ($title != "") $html .= '                                           	<header class="post-title">
                                                    	<h2 class="entry-title"><a href="' . $button_url . '">' . $title . '</a></h2>
                                                    </header>';
                                            
    $html .= '                                                <div class="post-excerpt">';
	$html .= do_shortcode($content);
	$html .= '</div><!-- POST-EXCERPT -->';
	
	$html .= '<div class="post-link">
<a href="' . $button_url . '">
<span class="highlight a_hover underline">
' . esc_html__('Read article', 'myriadwp') . '
</span>
</a>
</div>';
                                                                                      
    $html .= '                                			</div><!-- POST-INFO-ENTRY -->	
                                                    
                                        	</div><!-- SLIDE-CONTENT -->
                                            
                                        </div><!-- SWIPER-SLIDE -->';
	$html .= '<div class="div_to_move"><div class="background-image" style="background-image: url(' . $image_src . ');" data-rel="' . brankic_safe_string_name($title.$image_src) . '"></div></div>';
   
    return $html;
}
add_shortcode('brankic_swiper_slide', 'Brankic_swiper_slide');

}