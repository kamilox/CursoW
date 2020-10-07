<?php
/*******************************************************************************************************************
* TAB													                                                           *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_tab')) {
	function Brankic_tab($atts, $content = null) {
		
	$default_atts = array(
			"caption" 			=> "Tab",
			"type"				=> "",
			"icon_fontawesome" 	=> "", 
			"icon_openiconic" 	=> "",
			"icon_typicons" 	=> "",
			"icon_entypo" 		=> "",
			"icon_linecons" 	=> "",
			"icon_monosocial" 	=> "",
			"icon_material" 	=> "", 			
			"icon_linea" 		=> "",
/* 			"tabs_gap" 			=> "50",
			"tabs_columns" 		=> "2",
			"tabs_align"		=> "left_right",
			"tabs_vert_align"	=> "middle",
			"tabs_stretch"		=> "1_1_1" */			
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
	
	if(function_exists('vc_icon_element_fonts_enqueue') && $icon != "") {
		vc_icon_element_fonts_enqueue( $type );
	}

	$safe_caption = preg_replace('/\W+/','',strtolower(strip_tags($caption))).brankic_string_to_class($atts);	
	
	
	$html = '<ul class="etabs flex">';
	if ($icon != "") $html .= '<li class="tab"><a href="#' . $safe_caption . '" ><i class="' . $icon . '"></i>' . $caption . '</a></li>'; //jQuery will reorder elements 
	else $html .= '<li class="tab"><a href="#' . $safe_caption . '" >' . $caption . '</a></li>'; //jQuery will reorder elements
	$html .= '</ul>';
	$html .= '<div id="' . $safe_caption . '" class="tab-content">';
	$html .= do_shortcode($content); 
	$html .= '</div>';

    return $html;
}
add_shortcode('brankic_tab', 'Brankic_tab');

}