<?php
/*******************************************************************************************************************
* IMAGE                                                                               						   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_image')) {
	function Brankic_image($atts) {
	
	$default_atts = array(
		"image" 					=> "", 
		"image_extra"				=> '',
		"thumb_sizes"				=> "full",
		"shadow_color"				=> "",
		"border_radius" 			=> "", 
		"duotone" 					=> "",
		"duotone_custom"			=> "",
		"duotone_gradient"			=> "",
		"duotone_gradient_direction"=> "to top right",
		"duotone_custom_2"			=> "",
		"duotone_custom_3"			=> "",
		"custom_cursor"				=> "",
		"custom_cursor_text"		=> "View",
		"custom_cursor_color"		=> "ffcc99",
		"custom_cursor_bg"			=> "403a3e",
		"pretty_photo"				=> "no",
		"url"						=> "",
		"hover"						=> "",
		"show_srcset"				=> "yes",
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
	
	$image_id = "";
	if (is_numeric($image)) {
		$image_id = $image;
		$imageSrc = wp_get_attachment_image_src($image, $thumb_sizes);
		$imageSrc_full = wp_get_attachment_image_src($image, "original");
		if( $imageSrc ) $image = $imageSrc[0];
		if ($imageSrc_full) $image_full = $imageSrc_full[0]; else $image_full = "";
	}
	
	if ($image_extra != "") {
		$image = $image_extra;
		$show_srcset = "no";
	}
	
	$brankic_image_id = 'brankic_image_' . brankic_string_to_class($atts);
	
	if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		$tilt_script .= '$("#' . $brankic_image_id . '").tilt({';
		
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
	
	if (brankic_string_to_class($atts) != 0 && (brankic_check_css_id($brankic_image_id) || $custom_cursor == "true")) {
		$brankic_id_html = 'id="' . $brankic_image_id . '"';
	} else {
		$brankic_id_html = '';
	}
	
	

	$duotone_class = "";
	
	if ($duotone != "") $duotone_class = 'class="' . $duotone . '"'; else $duotone_class = "";
	
	if ($duotone_custom != "" && $duotone == "custom") 	$duotone_class = 'class="duotone single-color"';
	
	if ($shadow_color != "") $shadow_color = 'data-box-shadow="true"' ;	
	
	if ($border_radius != "") {
		$border_radius = 'data-border-radius="' . $border_radius . '"' ;
		$border_radius_true = 'data-border_radius="true"' ;
	} else {
		$border_radius = "";
		$border_radius_true = "";
	}

		$html = '<div id="' . $brankic_image_id . '" class="single-image-wrap" ' . $border_radius . ' ' . $border_radius_true . ' ' . $shadow_color . ' >';

	if ($duotone_class != "") $html .= '<div ' . $duotone_class . '>';		
                            
	if ($hover != "") $html .= '<div class="' . $hover . '">';
	
	if ($url != "" || $pretty_photo == "yes") {
		wp_enqueue_script( 'prettyphoto' );
		wp_enqueue_style( 'prettyphoto' );
			
		if ($pretty_photo == "yes") $pretty_data = 'data-rel="prettyPhoto[]"'; else $pretty_data = "";	
		if ($pretty_photo == "yes") $pretty_class = 'class="prettyphoto"'; else $pretty_class = "";	
		if ($url == "") $url = $image_full;
		if ($url == "") $url = $image_extra;
		
		$html .= '<a href="' . $url . '" ' . $pretty_data . ' ' . $pretty_class . '>';
	
	}
	
	
	if ($show_srcset == "yes") $html .= '    <img src="' . $image . '" alt="" ' . brankic_srcset($image_id, $thumb_sizes, true, true) . '>';
	else $html .= '    <img src="' . $image . '" alt="" ' . brankic_srcset($image_id, $thumb_sizes, false, false) . '>';
	
	if ($url != "" || $pretty_photo == "yes") $html .= '</a>';
	
	if ($hover != "") $html .= '</div>';

	if ($duotone_class != "") $html .= '</div>';
								
$html .= '</div>';


	if ($custom_cursor == "true"){
		$custom_cursor_script = 'jQuery(document).ready(function($) {
			if ($(".cursor-pointer").length == 0) {
				$("body").append("<div class=\'cursor-pointer\'></div>");
			}	
			$("body").attr( "data-element-cursor-customize", "true" );	
			$(".cursor-pointer").append("<span class=\'custom-' . $brankic_image_id . '\'>' . $custom_cursor_text . '</span>");
			
			$("#' . $brankic_image_id . '").addClass("cursor-' . $brankic_image_id . '");
			
			var selectedView = [".cursor-' . $brankic_image_id . ' img"];
			var selectedV = selectedView.join();
			$(selectedV).mouseenter(function() {
				$(".cursor-pointer").addClass("custom-' . $brankic_image_id . '-active");
			}).mouseleave(function() {
				$(".cursor-pointer").removeClass("custom-' . $brankic_image_id . '-active");
			});
			
			
			var xMousePos = 0;
			var yMousePos = 0;

			$(window).on("mousemove",function(event) {
				xMousePos = event.clientX;
				yMousePos = event.clientY;
			}); 

			window.requestAnimationFrame(function PointerMove() {
				$(".cursor-pointer").css("transform", "matrix(1, 0, 0, 1, "+xMousePos+",  "+yMousePos+")");
				window.requestAnimationFrame(PointerMove);
			});
			
			
		});';
		
		wp_register_script( 'dummy-handle-footer', '', [], '', true );
		wp_enqueue_script( 'dummy-handle-footer'  );
		wp_add_inline_script( 'dummy-handle-footer', $custom_cursor_script );
		
		wp_register_style( 'dummy-handle', false );
		wp_enqueue_style( 'dummy-handle' );
		$custom_cursor_css = '.cursor-pointer.custom-' . $brankic_image_id . '-active span.custom-' . $brankic_image_id . ' {	opacity: 1;}'; 
		wp_add_inline_style( 'dummy-handle', $custom_cursor_css );	
	}


		
		return $html;
	   
	}
	add_shortcode('brankic_image', 'Brankic_image');
}