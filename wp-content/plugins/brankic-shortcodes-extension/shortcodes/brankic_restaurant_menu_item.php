<?php
/*******************************************************************************************************************
* Restaurant menu item                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_restaurant_menu_item')) {
	function Brankic_restaurant_menu_item($atts, $content = null) {

	$default_atts = array(
		"title" 			=> "", 
		"title_behind" 		=> "", 
		"description" 		=> "",
		"price"				=> "",
		"title_color" 		=> "", 
		"description_color"	=> "",
		"item_image" 		=> "", 
		"item_image_extra" 	=> "", 
		"first" 			=> "",
		"last" 				=> "",
		"unique" 			=> ""
	);
	extract(shortcode_atts($default_atts, $atts));
	
	if (is_numeric($item_image)) {
		$item_image = wp_get_attachment_image_src($item_image, 'full');
		if( $item_image ) $item_image = $item_image[0];
	}
	if ($item_image_extra != "") $item_image = $item_image_extra;
	
	$brankic_id = 'brankic_restaurant_' . brankic_string_to_class($atts);
	if ($unique != "") $brankic_id = 'brankic_restaurant_' . $unique;
	
	$html = "";	
	if ($first == "true") $html .= '<div class="bra-menu-list">';
    $html .= '                        	<div class="menu-col" id="' . $brankic_id . '">
	<div class="menu-details">
                                    <div class="menu-item"><h4>' . $title . '</h4></div>
                                    <div class="menu-divider"></div>';	
    if ($price != "") $html .= '                                <div class="menu-price"><p>' . $price . '</p></div>';
    $html .= '                            </div>';	
    if ($description != "") $html .= '                       	<div class="menu-description">
                        			<p>' . $description . '</p>
                                </div>';							
    $html .= '                    	</div><!--END MENU-COL-->';
	if ($last == "true") $html .= '                    	</div><!--END BRA-MENU-LIST-->';

	
	return $html;

	}
	add_shortcode('brankic_restaurant_menu_item', 'Brankic_restaurant_menu_item');
}