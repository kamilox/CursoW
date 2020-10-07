<?php
/*******************************************************************************************************************
* PRICING TABLE													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_pricing_table')) {
	function Brankic_pricing_table($atts, $content = null) {
		
	$default_atts = array(
		"title" 				=> "", 
		"subtitle" 				=> "", 
		"price" 				=> "", 
		"symbol" 				=> "$", 
		"below_price" 			=> "", 
		"products"				=> "",
		"button_text" 			=> "", 
		"button_url" 			=> "", 
		"target" 				=> "_blank",
		"featured" 				=> "",
		"table_color"			=> "", 
		"border_color" 			=> "",
		"border_radius" 		=> "",
		"title_color" 			=> "",
		"subtitle_color" 		=> "",
		"price_color" 			=> "",		
		"products_color" 		=> "",
		"button_color" 			=> "", 
		"button_text_color" 	=> "", 
		 
		
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_id = 'brankic_pricing_table_' . brankic_string_to_class($atts);
 
	if ($featured == "true") $featured = "pricing-featured"; else $featured = "";
	
	$html = '<div class="pricing-column ' . $featured . '" id="' . $brankic_id .'">';
	$html .= '<div class="content">';
	if ($title != "" && $subtitle != "") $html .= '<div class="pricing head">';
	if ($title != "") $html .= '<h2 class="title">' . $title . '</h2>';
	if ($subtitle != "") $html .= '<span class="subtitle">' . $subtitle . '</span>';
	if ($title != "" && $subtitle != "") $html .= '</div>';
	$html .= '<div class="pricing price">';
	$html .= '<h3>';
	if ($symbol != "") $html .= '<sup>' . $symbol . '</sup>';
	$html .= $price . '</h3>';
	if ($below_price != "") $html .= '<p>' . $below_price . '</p>';
	$html .= '</div>';
	if ($products) { $products = explode(",", $products);
	if ($products) {
		$html .= '<ul class="pricing features">';
		foreach($products as $product){
		$html .= '<li>' . $product . '</li>';
		}
		$html .= "</ul>";
	}
	}
	if ($button_text != "") $html .= '<a class="brankic_button radius normal medium" href="' . $button_url . '" target="' . $target . '"><span>' . $button_text . '</span></a>';
	$html .= '</div></div>';

    return $html;
}
add_shortcode('brankic_pricing_table', 'Brankic_pricing_table');

}