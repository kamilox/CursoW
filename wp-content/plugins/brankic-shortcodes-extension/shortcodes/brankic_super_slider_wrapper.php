<?php
/*******************************************************************************************************************
* SWIPER SLIDES WRAPPER										 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_super_slider_wrapper')) {
	function Brankic_super_slider_wrapper($atts, $content = null) {
		
		$default_atts = array(
			"slider_type" 				=> "swiper",
			"slider_height" 			=> "height-70",
			"navigation_horizontal_align"=> "left",
			"navigation_vertical_align"	=> "middle",
			"navigation_type"			=> "dots",
			"navigation_color"			=> "light",
			"border_radius"				=> "",
			"fullwidth"					=> "",
			"autoheight"				=> "",
			"mouse_wheel_control"		=> "",
			"grab_cursor"				=> "",
			"content_horizontal_align"	=> "center",
			"content_vertical_align"	=> "middle",
			"image_zoom_effect"			=> "image_zoom_out",
			"fade"						=> "",
			"autoplay"					=> "",
			"delay"						=> "3000",
			"parallax"						=> "",
			"parallax_value"				=> "0.5",
		);
	extract(shortcode_atts($default_atts, $atts));
	
	$id = 'brankic_super_slider_wrapper_' . brankic_string_to_class($atts);
	
	if ($parallax) $parallax_class = "swiper_parallax"; else $parallax_class = "";
	
	$html = "";
	
	$image_zoom_effect_data = "";
	if ($image_zoom_effect) {
		if ($image_zoom_effect == "image_zoom_out") $image_zoom_effect_data = 'data-zoom-out="true"';
		if ($image_zoom_effect == "image_zoom_in") $image_zoom_effect_data = 'data-zoom-in="true"';
	}
	
	if ($slider_type == "swiper"){
		
	if ($navigation_type == "dots") $data_vert_align = 'data-navigation-v-align="' . $navigation_vertical_align . '"'; else $data_vert_align = "";
   
   $html .= '<div id="' . $id . '" class="col-12 p-carousel-2 ' . $content_horizontal_align . ' ' . $content_vertical_align . '" data-slider-height="' . $slider_height . '" ' . $image_zoom_effect_data . ' data-border-radius="' . $border_radius . '" data-fullwidth="' . $fullwidth . '" data-navigation-h-align="' . $navigation_horizontal_align . '" ' . $data_vert_align . '>
                    
                        <div class="swiper-container ' . $parallax_class . '">
                        
        					<div class="swiper-wrapper">';	
   
   
   $html .= do_shortcode($content);

   $html .= '</div><!-- SWIPER-WRAPPER -->
							
							<div class="navigation">';
							
	$data_navigation = "";
	$html_navigation = "";
	$inline_script_navigation = "";
	$inline_script_pagination = "";						
                            
    if ($navigation_type == "arrows") {
		$html .= '                            <div class="swiper-button-next ' . $navigation_color . '"><span></span></div>
                                <div class="swiper-button-prev ' . $navigation_color . '"><span></span></div>';
	$inline_script_navigation = 'navigation: {
			nextEl: "#' . $id . ' .swiper-button-next",
			prevEl: "#' . $id . ' .swiper-button-prev",
		  },';					
	}
                                        
    if ($navigation_type == "dots") { 
		if ($navigation_vertical_align != "none") $vertical_class = "vertical"; else $vertical_class = "";
 		$html .= '                           <div class="swiper-pagination lines ' . $navigation_color . ' ' . $vertical_class . '"></div>';
		
		$inline_script_pagination = 'pagination: {
			el: "#' . $id . ' .swiper-pagination",
			type: "bullets",
			clickable: true,
		  },';
	
	}
                            
    $html .= '                        </div>';
							
	$html .= '</div><!-- SWIPER-CONTAINER -->
                                        
                            </div><!-- COL-12 --> ';
                        
	if ($fade == "true") $fade_script = 'effect:"fade",'; else $fade_script = "";
	if ($autoheight == "true") $autoheight_script = 'autoHeight: true,'; else $autoheight_script = "";
	if ($mouse_wheel_control == "true") $mouse_wheel_control_script = 'mousewheel: true,'; else $mouse_wheel_control_script = "";
	if ($grab_cursor == "true") $grab_cursor_script = 'grabCursor: true,'; else $grab_cursor_script = "";
	
	if ($autoplay == "true") {
		$autoplay_script = "autoplay: {delay: $delay},";
	} else $autoplay_script = "";
	
	
					
	
	
						
	wp_enqueue_script( 'brankic-swiperslider');
	$inline_script = '
	jQuery(window).load(function($){';
	
	if ($parallax)	$inline_script .= '	var interleaveOffset = ' . $parallax_value . ';
					jQuery("#' . $id . ' .swiper-slide .row-bg-wrap").each(function(){
					jQuery(this).addClass("slide_parallax");
					});';	
	
	$inline_script .= '		var brankic_swiper = new Swiper("#' . $id . ' .swiper-container", {
			speed: 700,
			slidesPerView: 1,
			paginationClickable: true,
			loop: true,
			' . $inline_script_pagination . $inline_script_navigation . $fade_script . $autoplay_script . $autoheight_script . $mouse_wheel_control_script . $grab_cursor_script;
	
	if ($parallax) $inline_script .= ' watchSlidesProgress: true,';
	
	$inline_script .= '		on: {
				init: function(){
					jQuery("#' . $id . ' .swiper-container .wow").removeClass("wow").addClass("wow_super_slide_2").css("visibility", "hidden");	
					jQuery("#' . $id . ' .swiper-container .swiper-slide-active .wow_super_slide_2").addClass("wow_super_slide");
					new WOW({
					  boxClass:     "wow_super_slide", 
					}).init();					
				},
				slideChange: function(){
					jQuery("#' . $id . ' .swiper-container .wow_super_slide").css("visibility", "hidden").removeClass("wow_super_slide");
				},
				slideChangeTransitionStart: function(){
					jQuery("#' . $id . ' .swiper-container .swiper-slide-active .wow_super_slide_2").css("visibility", "hidden");
				},
				slideChangeTransitionEnd: function(){
					var count_active_row_bg_wrap = jQuery("#' . $id . ' .swiper-wrapper .swiper-slide-active .row-bg-wrap").length;	
					if (count_active_row_bg_wrap) jQuery("#' . $id . ' .swiper-container").addClass("slide_row_bg_wrap_true");
					else jQuery("#' . $id . ' .swiper-container").removeClass("slide_row_bg_wrap_true");
					jQuery("#' . $id . ' .swiper-container .swiper-slide-active .wow_super_slide_2").addClass("wow_super_slide");
					new WOW({
					  boxClass:     "wow_super_slide", 
					}).init();

				},';
				
		if ($parallax) $inline_script .= '
        progress: function(){
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            var slideProgress = swiper.slides[i].progress,
                innerOffset = swiper.width * interleaveOffset,
                innerTranslate = slideProgress * innerOffset;
           
            swiper.slides[i].querySelector(".swiper-slide >*, .slide-bgimg").style.transform =
              "translateX(" + innerTranslate + "px)";
          }
        },
        setTransition: function(speed) {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            swiper.slides[i].querySelector(".swiper-slide >*, .slide-bgimg").style.transition =
              speed + "ms";
          }
	  }';
				
			
$inline_script .= '			},
		})
		
	})
';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
	
	}
   
    return $html;
}
add_shortcode('brankic_super_slider_wrapper', 'Brankic_super_slider_wrapper');

}



