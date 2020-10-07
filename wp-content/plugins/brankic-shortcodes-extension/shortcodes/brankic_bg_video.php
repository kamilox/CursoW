<?php
/*******************************************************************************************************************
* Brankic BG VIDEO													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_bg_video')) {
	function Brankic_bg_video($atts, $content = null) {
		
	$default_atts = array(
		"file_picker"  => "",
		"poster"  => "",
		"poster_extra"	=> "",
		"bg_color"  => "",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$html = "";
	$file_url = wp_get_attachment_url( $file_picker);
	$file_metadata = wp_get_attachment_metadata($file_picker);
	$file_mime_type = $file_metadata["mime_type"];
	
	if (is_numeric($poster)) {
		$poster = wp_get_attachment_image_src($poster, 'full');
		if( $poster ) $poster_url = $poster[0];
	}
	if ($poster_extra != "") $poster_url = $poster_extra;

	if (substr($file_mime_type, 0, 5) == "video") {
		
		$poster_html = 'poster="' . $poster_url . '"';
		
		$html .= '<div class="row-bg-wrap">
                        
                            <div class="inner-wrap">';
                            									
        $html .= '              <div class="row-bg background-video">';
        $html .= '                  <video class="" preload="auto" autoplay loop="loop" muted="muted" ' . $poster_html . '>';	
        $html .= '                            <source src="' . $file_url . '" type="' . $file_mime_type . '">';
        $html .= '                            Your browser does not support the video tag.
                                    </video>
                                </div><!--END ROW-BG BACKGROUND-VIDEO-->';
                            									
        $html .= '              <div class="row-bg background-color" style="background:' . $bg_color . ';">';
        $html .= '              </div><!--END ROW-BG BACKGROUND-COLOR-->
                                								
                            </div><!--END INNER-WRAP-->
                             
                        </div><!--END ROW-BG-WRAP-->';
	}
    return $html;
}
add_shortcode('brankic_bg_video', 'Brankic_bg_video');

}