<?php

add_action( 'vc_load_default_templates_action','my_custom_template_for_vc_myriad34' ); // Hook in
 
function my_custom_template_for_vc_myriad34() {
	
	$names = array("m34-blog-slider" => "Blog - slider",
				"m34-about-team-members-split-slider" => "About - Team members split slider",
				"m34-contact" => "Image blocks with heading text block");
				
	$filters = array("m34-blog-slider" => "bra_hero bra_blog bra_sliders",
				"m34-about-team-members-split-slider" => "bra_team bra_about",
				"m34-contact" => "bra_contact",);
	
	$brankic_template["m34-blog-slider"] = '[vc_row full_width="stretch_row_content" row_bg_repeat="repeat" row_bg_size="auto" row_bg_color_1="#121212"][vc_column column_bg_align="brankic_bg_bottom_left" column_bg_size="auto" column_brankic_bg_image_extra="https://brankic1979.com/demo/myriad34/wp-content/uploads/2020/02/patt-8.png"][brankic_category cat_slug="design" layout="blog-carousel-emphasize" thumb_sizes="full" image_height="height-100" bg_img_color="rgba(0,0,0,0.2)" image_zoom_effect="image_zoom_in" split_screen="true" image_position="right" only_next_title_color="#ffffff" only_next_split_color="#2ebf91" only_next_duotone="duotone single-color effect-0" shadow_color="" show_cats="true" title_stroke="" title_color="#ffffff" hover_color="#2fbf91" title_font_family="google_web_font_2" h_size="custom" titles_weight="900" h_height="custom" duotone="duotone single-color effect-0" limit="6" only_next_bg_img_color="rgba(221,51,51,0.52)" h_size_custom="18vmin" h_height_custom="1"][/vc_column][/vc_row]';

	$brankic_template["m34-about-team-members-split-slider"] = '[vc_row full_width="stretch_row" row_bg_repeat="repeat" row_bg_size="auto" css=".vc_custom_1582835272770{padding-top: 25vh !important;padding-bottom: 25vh !important;background-position: 0 0 !important;background-repeat: repeat !important;}" row_brankic_bg_image_extra="https://brankic1979.com/demo/myriad34/wp-content/uploads/2020/02/patt-9-1.png"][vc_column column_bg_align="brankic_bg_bottom_left" column_bg_size="auto" column_brankic_][vc_row_inner content_placement="middle" gap="30" row_inner_bg_repeat="repeat"][vc_column_inner offset="vc_col-md-6"][brankic_section_title h_size="custom" h_weight="900" h_transform="uppercase" h_height="custom" h_size_custom="22vmin" h_height_custom="1"]<span class="google_web_font_2">The team</span>[/brankic_section_title][/vc_column_inner][vc_column_inner offset="vc_col-md-6"][vc_column_text highlight_text_color="#ffffff" highlight_background_color_1="#000000"]<span class="google_web_font_4 highlight overlay">People are definitely a company’s greatest asset. It doesn’t make any difference whether the product is cars or cosmetics. A company is only as good as the people it keeps. Great design is a multi-layered relationship. Being of service to others is what brings true happiness. Unity is strength. . . when there is teamwork and collaboration, wonderful things can be achieved. A larger effort is needed to create a skilled workforce.</span>[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row_content" row_bg_color_1="#2fbf91"][vc_column column_bg_align="brankic_bg_left" column_bg_repeat="repeat-y" column_bg_size="auto" column_content_color="#2fbf91" column_brankic_bg_image_extra="https://brankic1979.com/demo/myriad34/wp-content/uploads/2020/02/patt-5.png"][brankic_swiper_slide_wrapper height="height-75" duotone="duotone single-color effect-0" text_color="#ffffff"][brankic_swiper_slide image_src_extra="https://brankic1979.com/demo/myriad34/wp-content/uploads/2020/02/tm-3.jpg"]
<h6 class="uppercase w-700">Founder / Art Director</h6>
<h3>Brett Donehue</h3>
 

A key to achieving success is to assemble a strong and stable management team. It takes a lot of people to make a winning team. Experience is the teacher of all things.
Be brave. Take risks, nothing can substitute your experience.[/brankic_swiper_slide][brankic_swiper_slide image_src_extra="https://brankic1979.com/demo/myriad34/wp-content/uploads/2020/02/tm-2.jpg"]
<h6 class="uppercase w-700">Project manager</h6>
<h3>Kevin Lenard</h3>
 

Experience is the teacher of all things.
Be brave. Take risks, nothing can substitute your experience.

A key to achieving success is to assemble a strong and stable management team. It takes a lot of people to make a winning team.[/brankic_swiper_slide][brankic_swiper_slide image_src_extra="https://brankic1979.com/demo/myriad34/wp-content/uploads/2020/02/tm-1.jpg"]
<h6 class="uppercase w-700">Graphic Designer</h6>
<h3>Anne White</h3>
 

A key to achieving success is to assemble a strong and stable management team. It takes a lot of people to make a winning team.
Experience is the teacher of all things.
Be brave. Take risks, nothing can substitute your experience.[/brankic_swiper_slide][brankic_swiper_slide image_src_extra="https://brankic1979.com/demo/myriad34/wp-content/uploads/2020/02/tm-4.jpg"]
<h6 class="uppercase w-700">Web Designer</h6>
<h3>Rachel Doe</h3>
 

A key to achieving success is to assemble a strong and stable management team. It takes a lot of people to make a winning team.
Experience is the teacher of all things.
Be brave. Take risks, nothing can substitute your experience.[/brankic_swiper_slide][/brankic_swiper_slide_wrapper][/vc_column][/vc_row]';
	
	$brankic_template["m34-contact"] = '[vc_row full_width="stretch_row" row_bg_repeat="repeat" row_bg_size="auto" row_content_color="#ffffff" row_brankic_bg_image_extra="https://brankic1979.com/demo/myriad34/wp-content/uploads/2020/02/patt-9-1.png" css=".vc_custom_1582962221219{padding-top: 15vh !important;padding-bottom: 15vh !important;}"][vc_column css=".vc_custom_1582491931378{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat" css=".vc_custom_1582492038186{padding-top: 10vh !important;}"][vc_column_inner][brankic_section_title h_size="custom" h_weight="900" h_transform="uppercase" h_height="custom" h_size_custom="22vmin" h_height_custom="1"]<span class="google_web_font_2">Contact us</span>[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner offset="vc_col-md-4" css=".vc_custom_1582038730059{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_column_text highlight_background_color_1="rgba(255,255,255,0.14)"]<strong><small class="uppercase">Visit Us</small></strong>[/vc_column_text][brankic_section_title h_tag="H3" h_size="custom" h_weight="400" h_size_custom="18px"]<span class="google_web_font_4">Hallesches Ufer 23,<br />
10963 Berlin, Germany</span>[/brankic_section_title][/vc_column_inner][vc_column_inner offset="vc_col-md-4" css=".vc_custom_1582038763993{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_column_text]<strong><small class="uppercase">Give Us a Call</small></strong>[/vc_column_text][brankic_section_title h_tag="H3" h_size="custom" h_weight="400" h_size_custom="18px"]<span class="google_web_font_4">+12 10963 – 578</span>[/brankic_section_title][/vc_column_inner][vc_column_inner offset="vc_col-md-4" css=".vc_custom_1582038771636{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_column_text]<strong><small class="uppercase">Job openings</small></strong>[/vc_column_text][brankic_section_title h_tag="H3" h_size="custom" h_weight="400" h_size_custom="18px"]<span class="google_web_font_4"><a href="#">careers@brankic.net</a></span>[/brankic_section_title][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" row_content_color="#ffffff" row_bg_color_1="#121212" css=".vc_custom_1582962228947{padding-top: 15vh !important;padding-bottom: 15vh !important;}"][vc_column][vc_row_inner gap="60" row_inner_bg_repeat="repeat"][vc_column_inner offset="vc_col-md-4"][brankic_section_title h_tag="H3" h_size="custom" h_weight="700" h_size_custom="18px"]<span class="google_web_font_4">Let’s make magic together.</span>[/brankic_section_title][vc_column_text css=".vc_custom_1539102536680{padding-top: 30px !important;}"]Contact us and let’s make magic together. To send us a message or just to say hello, please complete the form or contact us via details listed below[/vc_column_text][/vc_column_inner][vc_column_inner offset="vc_col-md-8"][brankic_contact_form_7 cf_7_id="8771" border_color="#000000" submit_button_text_color="#121212" submit_button_hover_text_color="#ffffff" submit_button_bg_color="#ffffff" submit_button_hover_bg_color="#2ebf91"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]</p>
';
	

foreach($names as $key => $value){
	$template_thumbs[$key] = "http://brankic1979demo.com/downloads/templates/" . $key . ".jpg"; 
}



foreach($brankic_template as $name => $template) {
	
	
	
	$data               = array();
    $data['name']       =  'Myriad34 ' . $names[$name]; 
    $data['weight']     = 0; 
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_myriad34 ' . $filters[$name] ;
	$data['image_path'] = preg_replace( '/\s/', '%20', $template_thumbs[$name] ); 
	$data['content']    = 	$template;

    vc_add_default_templates( $data );
	
}
	

}