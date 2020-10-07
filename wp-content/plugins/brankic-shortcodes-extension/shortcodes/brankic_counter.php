<?php
/*******************************************************************************************************************
* COUNTER SHORTCODE                                                            *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_counter')) {
	function Brankic_counter($atts, $content = null) {
		
	$default_atts = array(
			"direction" 		=> "",
			"type"				=> "",
			"icon_fontawesome" 	=> "", 
			"icon_openiconic" 	=> "",
			"icon_typicons" 	=> "",
			"icon_entypo" 		=> "",
			"icon_linecons" 	=> "",
			"icon_monosocial" 	=> "",
			"icon_material" 	=> "",
			"icon_linea" 		=> "", 
			"icon_size" 		=> "medium", 
			"font_weight"		=> "",
			"icon_color" 		=> "", 
			"caption" 			=> "",
			"caption_color" 	=> "", 
			"stroke"			=> "",
			"counter_class"		=> "",
			"from"				=> "",
			"to" 				=> "100", 
			"speed" 			=> "2500", 
			"counter_color" 	=> "", 
			"counter_size"		=> "medium",
			"unique" 			=> "",
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
	
								
	if ($from == "") $from = "0";
	if ($to == "") $to = "100";
	if ($speed == "") $speed = "2500";
	
	if ($stroke == "true") $stroke = "stroke"; else $stroke = "";
	
	$id = sprintf("%s", uniqid());
	
	$html = "";
	$html_odo = "";
	
	$brankic_id = 'brankic_counter_' . brankic_string_to_class($atts);
	if ($unique != "") $brankic_id = 'brankic_counter_' . $unique;
	
	$html .= '<div class="brankic_counter ' . $direction . '" id="' . $brankic_id . '">';
	if ($icon != "") $html .= '<p><i class="' . $icon . ' ' . $icon_size . '"></i></p>';
	$html .= '<span id="count-' . $id . '" class="count ' . $stroke . ' ' . $counter_size . '">' . $to . '</span>';
	$html .= '<strong>' . $caption . '</strong>';

	$html .= '</div> <!-- END brankic_counter -->';
	
	$html_odo .= '<div class="brankic_counter ' . $direction . '" id="' . $brankic_id . '">';
	if ($icon != "") $html_odo .= '<p><i class="' . $icon . ' ' . $icon_size . '"></i></p>';
	$html_odo .= '<span id="count-' . $id . '" class="odometer odometer-theme-minimal ' . $stroke . ' ' . $counter_size . ' ' . $counter_class . '"></span>';
	$html_odo .= '<strong>' . $caption . '</strong>';

	$html_odo .= '</div> <!-- END brankic_counter -->';

    
	
	
	
    
	$inline_script = '	jQuery(window).scroll(function($){
	  if (isScrolledIntoView("count-' . $id . '") && (jQuery(".count' . $id . '").length == 0) ){ 
        
			var $counter' . $id . ' = jQuery("#count-' . $id . '.count");
			$counter' . $id . '.addClass("count' . $id . '");	
			$counter' . $id . '.prop("Counter",0).animate({
				Counter: $counter' . $id . '.text()
			}, {
				duration: 4000,
				easing: "swing",
				step: function (now) {
					$counter' . $id . '.text(Math.ceil(now));
				}
			});
    
	  }
	 })
	 ';
	 
	$inline_script_2 = ' if (isScrolledIntoView("count-' . $id . '")){

		jQuery("#count-' . $id . ' .count").each(function () {
			jQuery(this).prop("Counter",0).animate({
				Counter: jQuery(this).text()
			}, {
				duration: 4000,
				easing: "swing",
				step: function (now) {
					jQuery(this).text(Math.ceil(now));
				}
			});
		});      
	 }	';
	 
	 $inline_script_odometer = '

jQuery(window).scroll(function($){
	 
if (isScrolledIntoView("count-' . $id . '") ){

	 window.odometerOptions = {
	  duration: 3000,
	  auto: false,
	};
	
	var el' . $id . ' = document.querySelector("#count-' . $id . '");

	od = new Odometer({
	  el: el' . $id . ',
	value: ' . $to . ',
	})
	
	od.update(' . $to . ')
	
}

})	 
	 ';

	wp_enqueue_script( 'brankic-odometer');
	
	wp_add_inline_script( 'brankic-odometer', $inline_script_odometer );
	
	return $html_odo;
	

	
}
add_shortcode('brankic_counter', 'Brankic_counter');

}