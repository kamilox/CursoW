<?php
/*******************************************************************************************************************
* DIVIDER                                                                               						   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_divider')) {
	function Brankic_divider($atts, $content = null) {
	
	$default_atts = array(
		"width" 			=> "", 
		"color" 			=> "",
		"align" 			=> "left",
		"style"				=> "divider border",
		"margin"			=> "",
		"custom_margin"		=> "",
		"divider_text"		=> "",
		"use_icon"			=> "",
		"type"				=> "",
		"icon_linea" 		=> "",
		"icon_fontawesome" 	=> "", 
		"icon_openiconic" 	=> "",
		"icon_typicons" 	=> "",
		"icon_entypo" 		=> "",
		"icon_linecons" 	=> "",
		"icon_monosocial" 	=> "",
		"icon_material" 	=> "",
		"icon_color" 		=> "",
		"icon_size" 		=> "large",
		"text_icon_position"=> "divider-text-center",
		"border_width" 		=> "", 
		"orientation"		=> "",
		"height"	 		=> "height-10",		
	);
	
	extract(shortcode_atts($default_atts, $atts));
	
	if ($margin == "custom") $margin = $custom_margin;
	
	$margin_style = "";
	if ($margin != "") $margin_style = 'style="margin:' . $margin . '"';
	
	if ($use_icon == "true") $use_icon = TRUE; else $use_icon = FALSE;
	
	if ($use_icon){
	
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
	
	}
		
		$html = "";
		
		if ($orientation == "horizontal") $orientation = "";
		
		if ($orientation == "") $height = "";
		
		if ($use_icon) $icon_class = "divider-icon"; else $icon_class = "";
		
		if ($icon_color != "") $css_color_style = 'style="color:' . $icon_color . '"'; else $css_color_style = "";
		$css_style = 'style="';
		if ($color != "") $css_style .= 'border-color:' . $color . ';';
		
		$border_width = str_replace("px", "", $border_width);
		if ($border_width != "") $css_style .= ' border-width:' . $border_width . 'px;';
		
		$new_divider_text = do_shortcode($content);
		
		if ($new_divider_text != "") $divider_text = $new_divider_text;
		
		$css_style .= '"';
		
		$html .= "<div class='$style $icon_size $align $text_icon_position $icon_class $orientation $width $height' $margin_style>";
		
		if (!($use_icon) && $divider_text == "") $html .= '<span ' . $css_style . '></span>';
		
		
		if ($style != "divider" && $text_icon_position != "divider-text-left" && ($use_icon || $divider_text != "")) $html .= '<span ' . $css_style . '></span>';
		
		if ($use_icon && $divider_text != "") {
			$html .= "<div class='divider-content' $css_color_style ><i class='$icon'></i>$divider_text</div>";
		}
		if ($use_icon && $divider_text == "") {
			$html .= "<div class='divider-content' $css_color_style ><i class='$icon'></i></div>";
		}
		if (!($use_icon) && $divider_text != "") {
			$html .= "<div class='divider-content' $css_color_style >$divider_text</div>";
		}
		
		if ($style != "divider" && $text_icon_position != "divider-text-right" && ($use_icon || $divider_text != "")) $html .= '<span ' . $css_style . '></span>';

	
		$html .= "</div>";
		
		return $html;
	   
	}
	add_shortcode('brankic_divider', 'Brankic_divider');
}