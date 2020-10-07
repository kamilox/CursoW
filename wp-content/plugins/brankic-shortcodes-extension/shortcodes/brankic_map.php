<?php
/*******************************************************************************************************************
* GOOGLE MAP												 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_map')) {
	function Brankic_map($atts, $content = null) {
		
	$default_atts = array(
		"location" => "Amsterdam"
	);
	extract(shortcode_atts($default_atts, $atts));
	
    wp_enqueue_script( 'brankic_google_map_plugin', plugin_dir_url( __FILE__ ) . '../javascript/brankic_google_map_plugin.js', array(), '1.0.0', true );

	$inline_script ='	function codeAddress() {
	
		var address = "' . $location . '";
		geocoder.geocode( { "address": address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var image = new google.maps.MarkerImage("' . plugin_dir_url( __FILE__ ) . '../images/map-pin.png", null, null, null, new google.maps.Size(23,55));
				var beachMarker = new google.maps.Marker({
					map: map,
					icon: image,
					position: results[0].geometry.location
				});
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	}';	
		
$html = '<div id="brankic_map" class="google-map"></div>';		

wp_add_inline_script( 'brankic_google_map_plugin', $inline_script );

    return $html;
}
add_shortcode('brankic_map', 'Brankic_map');

}