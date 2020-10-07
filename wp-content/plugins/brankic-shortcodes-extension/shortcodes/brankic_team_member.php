<?php
/*******************************************************************************************************************
* TEAM MEMBER										 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_team_member')) {
	function Brankic_team_member($atts, $content = null) {
		
	$default_atts = array(
		"style" 					=> 'default',
		"image_src" 				=> '',
		"image_src_extra"			=> '',
		"thumb_sizes"				=> 'brankic-1024-768',
		"name" 						=> '', 
		"name_color" 				=> '', 
		"position" 					=> '', 
		"position_color" 			=> '', 
		"name_position_bg_color" 	=> '', 
		"name_position_bg_color_2" 	=> '', 
		"duotone" 					=> "",
		"duotone_custom"			=> "",
		"duotone_gradient"			=> "",
		"duotone_gradient_direction"=> "to top right",
		"duotone_custom_2"			=> "",
		"duotone_custom_3"			=> "",
		"border_radius"				=> "",
		"shadow"					=> "",
		"shadow_color"				=> "",
		"social"					=> "",
		"social_url"				=> "",
		"icon_color" 				=> "#000000", 
		"height"					=> "height-45",
		"unique"					=> "",
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
	
	$brankic_id = 'brankic_team_member_' . brankic_string_to_class($atts);
	if ($unique != "") $brankic_id = 'brankic_team_member_' . $unique;
	
	$image_id = "";
	
	if (is_numeric($image_src)) {
		$image_id = $image_src;
		$imageSrc = wp_get_attachment_image_src($image_src, $thumb_sizes);
		if( $imageSrc ) $image_src = $imageSrc[0];
	}
	if ($image_src_extra != "") $image_src = $image_src_extra;
	
	$duotone_class = "";
	if ($duotone != "") $duotone_class = 'class="' . $duotone . '"'; else $duotone_class = "";
	if ($duotone_custom != "" && $duotone == "custom") {

		$duotone_class = 'class="duotone single-color"';
			
	} 
	
	
	if ($border_radius != "") {
		$border_radius_class = "img-radius";
		$border_radius_data = 'data-border-radius="' . $border_radius . '"';
	} else {
		$border_radius_class = "";
		$border_radius_data = "";
	}
	if ($shadow == "true") $shadow_class = " box-shadow"; else $shadow_class = "";
	
	if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		$tilt_script .= '$("#' . $brankic_id . '").tilt({';
		
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

   $html = "";
   
   
   $social_html = "";
   
 
   if ($social == "true"){
   // social icons html
	   $social_html .=  '       <ul class="social-bookmarks default">'; 	
		
		$social_list_array = explode(",", $social_url);
		for ($i = 0 ; $i < count($social_list_array) ; $i = $i + 2)
		{
		
				$social_html .=  '<li><a href="' . trim($social_list_array[$i + 1]) . '" class="social-' . strtolower(trim($social_list_array[$i])) . '"><i class="fa fa-' . strtolower(trim($social_list_array[$i])) . '"></i></a></li>';  

		}
		 $social_html .=  "           </ul>";
   }
   
   // default
   
   if ($style == "default") {
   
   $html .= '<div id="' . $brankic_id . '" class="team-member default ' . $border_radius_class . $shadow_class . ' ' . $height . '" ' . $border_radius_data . '>
                                            
	<div>
		<div ' . $duotone_class . '><img src="' . $image_src . '" alt="" ' . brankic_srcset($image_id, $thumb_sizes) . '/></div>
	</div><!--END IMAGE--> 
	
	<figure><figcaption>
		<h3>' . $name . '</h3>
		<p><small class="uppercase">' . $position . '</small></p>		      
		' . do_shortcode($content) . ' ' . $social_html . '
	 </figcaption></figure>                   

</div><!-- TEAM-MEMBER DEFAULT -->';
   }
   
    // overlay-figcaption
   
   if ($style == "overlay-figcaption") {
   
   $html .= '<div id="' . $brankic_id . '" class="team-member overlay-figcaption ' . $border_radius_class . $shadow_class . '" ' . $border_radius_data . '>
                                            
	<div>
		<div ' . $duotone_class . '><img src="' . $image_src . '" alt="" ' . brankic_srcset($image_id, $thumb_sizes) . '/></div>
	</div><!--END IMAGE--> 
	
	<figure><figcaption>
		<h3>' . $name . '</h3><p><small class="uppercase">' . $position . '</small></p>
	 </figcaption></figure>                   

</div><!-- TEAM-MEMBER overlay-figcaption -->';
                            

   }
   
    // default overlay
   
   if ($style == "default overlay") {
   
	$html .= '<div id="' . $brankic_id . '" class="team-member default overlay ' . $border_radius_class . $shadow_class . ' ' . $height . '" ' . $border_radius_data . '>
	
		<div ' . $duotone_class . '><img src="' . $image_src . '" alt="" ' . brankic_srcset($image_id, $thumb_sizes) . '/> 
		
			<div class="team-member-info-holder">';
	      
	$html .=  do_shortcode($content);

	$html .= $social_html;								

			 
	$html .= '	</div><!--END TEAM-MEMBER-INFO-HOLDER-->

	</div>	
		
	
	<figure><figcaption>		      
		<h3>' . $name . '</h3>
		<p><small class="uppercase">' . $position . '</small></p>	
	</figcaption></figure>                

</div><!-- TEAM-MEMBER DEFAULT -->';
   }
   
   // overlay-hidden
   
   if ($style == "overlay-hidden") {
	   
   $html .= '<div id="' . $brankic_id . '" class="team-member overlay-hidden ' . $border_radius_class . $shadow_class . ' ' . $height . '" ' . $border_radius_data . '>
                                            

	<div ' . $duotone_class . '><img src="' . $image_src . '" alt="" ' . brankic_srcset($image_id, $thumb_sizes) . '/>
              
							
	<div class="team-member-info-holder">             
	
		<figure><figcaption>		      
			<h3>' . $name . '</h3>
			<p><small class="uppercase">' . $position . '</small></p>
			
			' . $social_html . '
			
		</figcaption></figure>';
									
	$html .= '</div><!--END TEAM-MEMBER-INFO-HOLDER-->
	
	</div>
								
</div><!--END TEAM-MEMBER OVERLAY-HIDDEN-->';
   }
   
   // overlay-figcaption transparent
   
   if ($style == "overlay-figcaption transparent")
	   {
 
		$html .= '<div id="' . $brankic_id . '" class="team-member overlay-figcaption transparent ' . $border_radius_class . $shadow_class . ' ' . $height . '" ' . $border_radius_data . '>
                                            

		<div ' . $duotone_class . '>
		
			<img src="' . $image_src . '" alt="" ' . brankic_srcset($image_id, $thumb_sizes) . '/>
       
							
			<div class="team-member-info-holder">             
			
				<figure><figcaption>		        
					<h3>' . $name . '</h3>
					<p><small class="uppercase">' . $position . '</small></p>	
				</figcaption></figure>
				
				<div class="social-holder">'; 
				
			$html .= do_shortcode($content);
			
			$html .= $social_html;
			
			$html .=	'</div>
											
			</div><!--END TEAM-MEMBER-INFO-HOLDER-->
	
	</div>
								
</div><!--END TEAM-MEMBER OVERLAY-HIDDEN-->';
   }
   
    // overlay-outset
   
   if ($style == "overlay-outset") {
   
   $html .= '<div id="' . $brankic_id . '" class="team-member overlay-outset ' . $border_radius_class . ' ' . $height . '" ' . $border_radius_data . '>
				
	<div class="' . $shadow_class . '">
		<div ' . $duotone_class . '><img src="' . $image_src . '" alt="" ' . brankic_srcset($image_id, $thumb_sizes) . '/></div>
	</div><!--END IMAGE-->   
							
	<div class="team-member-info-holder">             
		<div class="social-holder">' . $social_html . '                                    
			' . do_shortcode($content) . '
		</div>
		<figure><figcaption>		      
			<p><small class="uppercase">' . $position . '</small></p>	
			<h3>' . $name . '</h3>
		</figcaption></figure> 
									
	</div><!--END TEAM-MEMBER-INFO-HOLDER-->
								
</div><!--END TEAM-MEMBER OVERLAY-HIDDEN-->';
   }
   

    return $html;
}
add_shortcode('brankic_team_member', 'Brankic_team_member');

}