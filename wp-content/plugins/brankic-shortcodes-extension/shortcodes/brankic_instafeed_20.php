<?php
/*******************************************************************************************************************
* INSTAGRAM FEED based on instafeed.js                                                                               						   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_instafeed_20')) {
	
function clean($string) {
   //$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^a-zA-Z0-9\s]/', '', $string); // Removes special chars.
}
	
	
	function Brankic_instafeed_20($atts) {
	
	$default_atts = array(
		"default_user_no"	=> "",
		"accesstoken" 	=> "",
		"limit"			=> "12",
		"columns"		=> "col--3",
		"gap"			=> "",
		"radius"		=> "5px",
		"duotone" 					=> "",
		"duotone_custom"			=> "",
		"duotone_gradient"			=> "",
		"duotone_gradient_direction"=> "to top right",
		"duotone_custom_2"			=> "",
		"duotone_custom_3"			=> "",
		"image_zoom_effect"			=> "",
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
	
	if ($gap != "") $gap_class = "gap"; else $gap_class = "";
	if ($gap != "") $data_gap = 'data-gap="' . $gap . 'px"'; else $data_gap = "";
	
	if ($default_user_no == "true") {
		$shortcode_accesstoken_20 =  $accesstoken;	
	} else {
		$shortcode_accesstoken_20 =  brankic_of_get_option("instagram_20_token", brankic_of_get_default("instagram_20_token"));			
	}
	$brankic_id = 'brankic_instafeed_20_' . brankic_string_to_class($atts);
	
	if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		$tilt_script .= '$("#' . $brankic_id . ' a").tilt({';
		
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
	
	
	$duotone_class = "";
	
	if ($duotone != "") $duotone_class = $duotone; else $duotone_class = "";
	if ($duotone_custom != "" && $duotone == "custom") {
		$duotone_class = 'duotone single-color';
	}
	$html = '<div id="' . $brankic_id . '" class="brankic_instafeed ' . $gap_class . ' ' . $columns . ' ' . $image_zoom_effect . '" ' . $data_gap . ' data-border-radius="' . $radius . '">';
	
	$date_format = "Y-m-d h:i:sa";
	$brankic_instagram_2020 = array();
	$brankic_instagram_2020 = get_option("brankic_instagram_2020_myriadwp");

	$last_update = $brankic_instagram_2020["last_update"];
	
	if ($last_update == NULL) $last_update = "2020-05-04 01:01:01am";
	$now = date($date_format);
	
	
	$last_update_timestamp = strtotime($last_update);
	$now_timestamp = strtotime($now);
	
	$hours_diff = ($now_timestamp - $last_update_timestamp) / 3600;
	

	if ($hours_diff > 1) {
		
// update notice > check $request_url in browser https://graph.instagram.com/me/?fields=id,username,media_count&access_token=IGQVJYYnFnY2ZAqVTg5cmdTQ1dxUzAyaTNoVXZArUU10anJvMmxkRmtoblJ1WEoxaG5CbFlRYWkzVUpIa3lXRzA5YllHZAWZArcUhHdnpKaTBEM2JZAbHpodTNWU040enlDbGpGU2RwZAlZAVRFhHTVBvdzgyRQZDZD
/*  {
   "error": {
      "message": "Error validating access token: Session has expired on Monday, 31-Aug-20 03:59:04 PDT. The current time is Thursday, 03-Sep-20 02:40:06 PDT.",
      "type": "OAuthException",
      "code": 190,
      "fbtrace_id": "A96ljCFw1huzWnMDyZDQUnl"
   }
} */
		
		$request_url = 'https://graph.instagram.com/me/?fields=id,username,media_count&access_token=' . $shortcode_accesstoken_20;

		$file_headers = @get_headers($request_url);

		
		if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found' || $file_headers[0] == 'HTTP/1.1 403 Forbidden' || $file_headers[0] == 'HTTP/1.1 400 Bad Request') {
			$exists = false;
		}
		else {
			$exists = true;
		}
		
		if ($exists) {
	
			$data = file_get_contents($request_url);
			
			$data_json = json_decode($data, true);
			
			$token_user_id = $data_json["id"]; 
			$token_username = $data_json["username"];
			$token_media_count = $data_json["media_count"];
			
			$brankic_instagram_2020["last_update"] = $now;
			$brankic_instagram_2020["token_user_id"] = $token_user_id;
			$brankic_instagram_2020["token_username"] = $token_username;
			$brankic_instagram_2020["token_media_count"] = $token_media_count;
		
			$request_media_ids_url = 'https://graph.instagram.com/' . $token_user_id . '/media?access_token=' . $shortcode_accesstoken_20;
			
			
			$data = file_get_contents($request_media_ids_url);
			
			$data_json = json_decode($data, true);
			
			$media_ids = $data_json["data"];
			
			for ($i = 0 ; $i < 24 ; $i++){
			
				$request_media_data_url = 'https://graph.instagram.com/' . $media_ids[$i]["id"] . '?fields=caption,media_type,thumbnail_url,media_url,permalink,timestamp&access_token=' . $shortcode_accesstoken_20;
				
				
				$file_headers = @get_headers($request_media_data_url);
		
				
				if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found' || $file_headers[0] == 'HTTP/1.1 403 Forbidden' || $file_headers[0] == 'HTTP/1.1 400 Bad Request') {
					$exists_media = false;
				}
				else {
					$exists_media = true;
				}
				
				
				if ($exists_media){
					$data = file_get_contents($request_media_data_url);

					$data_json = json_decode($data, true);
								
					$brankic_instagram_2020["media"]["caption"][$i] = clean($data_json["caption"]);
					$brankic_instagram_2020["media"]["media_type"][$i] = htmlentities ($data_json["media_type"]);
					$brankic_instagram_2020["media"]["thumbnail_url"][$i] = htmlentities ($data_json["thumbnail_url"]);
					$brankic_instagram_2020["media"]["media_url"][$i] = htmlentities ($data_json["media_url"]);
					$brankic_instagram_2020["media"]["permalink"][$i] = htmlentities ($data_json["permalink"]);
					$brankic_instagram_2020["media"]["timestamp"][$i] = htmlentities ($data_json["timestamp"]);
				}
			
			}
		
		

		update_option("brankic_instagram_2020_myriadwp", $brankic_instagram_2020);	
		
		
		}
		
		
	}
	
	$brankic_instagram_2020 = get_option("brankic_instagram_2020_myriadwp");
	
	
	
	
	for ($i = 0 ; $i < $limit ; $i++){
		
			
			$publish_date = date("Y-m-d", strtotime($brankic_instagram_2020["media"]["timestamp"][$i]));
			
			if ($brankic_instagram_2020["media"]["media_type"][$i] == "VIDEO") $thumb = $brankic_instagram_2020["media"]["thumbnail_url"][$i];
			else $thumb = $brankic_instagram_2020["media"]["media_url"][$i];
			
			$html .= '<div class="' . $duotone_class . '"><a href="' . $brankic_instagram_2020["media"]["permalink"][$i] . '" data-border-radius="' . $radius . '">';
			$html .= '<div class="row-bg background-image " style="background-image: url(' . $thumb . ')"></div>';
			$html .= '</a></div>';
			
	
	}
	
		$html .= '</div>';
		
		return $html;
	   
	}
	add_shortcode('brankic_instafeed_20', 'Brankic_instafeed_20');
}