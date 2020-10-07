<?php

add_action( 'vc_load_default_templates_action','my_custom_template_for_vc_myriad19' ); // Hook in
 
function my_custom_template_for_vc_myriad19() {
	
	$names = array("m19-awwards-list-with-sticky-left-column" => "Awards list with sticky left column",
				"m19-bio-text-block-with-images-collage" => "Bio text block with images collage",
				"m19-blog-post-with-duotone-effect-preview" => "Blog post with duotone effect preview",
				"m19-contact" => "Contact",
				"m19-hero-with-asymmetric-heading-and-text-block" => "Hero with asymmetric heading and text block",
				"m19-testimonials-with-customized-text" => "Testimonials with customized text");
				
	$filters = array("m19-awwards-list-with-sticky-left-column" => "bra_about",
				"m19-bio-text-block-with-images-collage" => "bra_about bra_text bra_image",
				"m19-blog-post-with-duotone-effect-preview" => "bra_blog",
				"m19-contact" => "bra_contact",
				"m19-hero-with-asymmetric-heading-and-text-block" => "bra_hero bra_text",
				"m19-testimonials-with-customized-text" => "bra_testimonials");
	
	$brankic_template["m19-awwards-list-with-sticky-left-column"] = '[vc_row full_width="stretch_row" row_bg_color_1="#fd7879" css=".vc_custom_1555433516702{padding-bottom: 15vh !important;}"][vc_column width="5/6" sticky="true" responsive_sticky="true" brankic_centered_tablet="true" css=".vc_custom_1559207789333{padding-top: 20vh !important;}" offset="vc_col-md-6"][vc_row_inner][vc_column_inner width="5/6"][brankic_section_title title_color="#ffffff" h_size="custom" h_weight="800" h_transform="capitalize" h_size_custom="4vw"]<span class="stroke">Awards &amp;</span>
recognitions[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="5/6"][vc_column_text]Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="5/6" brankic_centered_tablet="true" css=".vc_custom_1555433375746{padding-top: 20vh !important;}" offset="vc_col-md-6"][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" brankic_column_inner_height="height-20"][brankic_image image_extra="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/award-4.png"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text css=".vc_custom_1542026618584{padding-top: 30px !important;}"]<small class="">3 x Honorable Mentions
2 x Winner of the Day
7 x Nominee</small>[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" brankic_column_inner_height="height-20"][brankic_image image_extra="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/award-5.png"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text css=".vc_custom_1542029136654{padding-top: 30px !important;}"]<small class="">3 x Honorable Mentions
2 x Winner of the Day
7 x Nominee</small>[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" brankic_column_inner_height="height-20"][brankic_image image_extra="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/award-6.png"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text css=".vc_custom_1542026618584{padding-top: 30px !important;}"]<small class="">3 x Honorable Mentions
2 x Winner of the Day
7 x Nominee</small>[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" brankic_column_inner_height="height-20"][brankic_image image_extra="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/award-1.png"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text css=".vc_custom_1542026618584{padding-top: 30px !important;}"]<small class="">3 x Honorable Mentions
2 x Winner of the Day
7 x Nominee</small>[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" brankic_column_inner_height="height-20"][brankic_image image_extra="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/award-3.png"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text css=".vc_custom_1542026618584{padding-top: 30px !important;}"]<small class="">3 x Honorable Mentions
2 x Winner of the Day
7 x Nominee</small>[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" brankic_column_inner_height="height-20"][brankic_image image_extra="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/award-2.png"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text css=".vc_custom_1542029117768{padding-top: 30px !important;}"]<small class="">3 x Honorable Mentions
2 x Winner of the Day
7 x Nominee</small>[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m19-bio-text-block-with-images-collage"] = '[vc_row full_width="stretch_row" row_bg_size="auto" row_bg_color_1="#69cac2" el_id="about" css=".vc_custom_1555420100126{padding-top: 15vh !important;padding-bottom: 15vh !important;}"][vc_column width="5/6" brankic_centered_tablet="true" offset="vc_col-md-12"][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1555420044650{padding-bottom: 80px !important;}"][vc_column_inner content_align="text-align-center"][brankic_section_title title_color="#ffffff" h_size="custom" h_weight="800" h_transform="capitalize" h_size_custom="8vw"]<span class="stroke">Biography</span>[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1555433731557{padding-bottom: 30px !important;}"][vc_column_inner width="1/6" css=".vc_custom_1532549709797{padding-bottom: 30px !important;}"][/vc_column_inner][vc_column_inner content_align="text-align-center" offset="vc_col-md-8"][brankic_section_title title_color="#ffffff" h_tag="H3"]Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner gap="35" row_inner_bg_repeat="repeat"][vc_column_inner column_inner_content_color="rgba(255,255,255,0.8)" offset="vc_col-md-6"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges. Excellence is not an exception, it is a prevailing attitude.
Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/vc_column_text][/vc_column_inner][vc_column_inner column_inner_content_color="rgba(255,255,255,0.8)" offset="vc_col-md-6"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges. Excellence is not an exception, it is a prevailing attitude.
Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1555433713708{padding-top: 70px !important;}"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner offset="vc_col-md-6"][brankic_collage shadow_color="rgba(0,0,0,0.25)" image_extra_1="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/9-3.jpg" image_extra_2="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/10-1.jpg" image_extra_3="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/11-1.jpg"][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m19-blog-post-with-duotone-effect-preview"] = '[vc_row full_width="stretch_row_content" row_bg_size="auto" row_bg_color_1="#db2242" css=".vc_custom_1557340758487{padding-top: 15vh !important;padding-bottom: 15vh !important;}" el_id="blog"][vc_column width="5/6" brankic_centered_tablet="true" offset="vc_col-md-12"][vc_row_inner][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3" content_align="text-align-center"][brankic_section_title h_size="custom" h_weight="800" h_size_custom="4vw"]<span class="stroke">News &amp;</span> Events[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][brankic_category layout="blog-style-5" style="grid_advanced" img_radius="true" img_radius_size="3px" shadow_color="rgba(30,115,190,0.07)" columns="4" gap_advanced="50px" grid_advanced_row_height="60" navigation="none" captions_position="bottom center" title_color="#ffffff" duotone="custom" duotone_custom="#c33764" duotone_gradient="true" duotone_gradient_direction="to right" duotone_custom_2="#1d2671" limit="4" gap="true"][vc_row_inner][vc_column_inner width="1/3"][/vc_column_inner][vc_column_inner width="1/3" content_align="text-align-center"][brankic_divider style="divider blank" margin="15px auto"][/brankic_divider][brankic_button shape="radius" button_text="Read all posts" text_color="#ffffff" text_hover_color="#23206d" bg_color="rgba(255,255,255,0.11)" bg_hover_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m19-contact"] = '[vc_row full_width="stretch_row" gap="100" row_bg_align="brankic_bg_bottom_right" row_bg_size="contain" row_content_color="#23206d" row_bg_color_1="#f6fafd" change_header_colors="true" css=".vc_custom_1560164413639{padding-top: 15vh !important;padding-bottom: 5vh !important;}" el_id="contact"][vc_column width="5/6" brankic_centered_tablet="true" offset="vc_col-md-12"][vc_row_inner gap="60" row_inner_bg_repeat="repeat"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner offset="vc_col-md-9"][brankic_section_title title_color="#fc466b" title_color_2="#3f5efb" h_tag="H4" p_transform="uppercase"]Contact us and let’s make magic together. To send us a message or just to say hello, please complete the form or contact us via details listed below.[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1558445377045{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_column_inner][brankic_section_title title_color="#23206d" h_size="custom" h_weight="800" h_transform="capitalize" h_size_custom="8vw"]<span class="stroke">Contact</span>[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner gap="60" row_inner_bg_repeat="repeat"][vc_column_inner width="1/4" offset="vc_hidden-sm vc_hidden-xs"][/vc_column_inner][vc_column_inner width="1/3" offset="vc_col-md-3"][vc_column_text]<strong><small class="uppercase">Visit Us</small></strong>
Hallesches Ufer 23,
10963 Berlin,
Germany[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3" offset="vc_col-md-3"][vc_column_text]<strong><small class="uppercase">Give Us a Call</small></strong>
+12 10963 - 578[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3" offset="vc_col-md-3"][vc_column_text]<strong><small class="uppercase">Say hello</small></strong>
<span style="color: #23206d;"><a style="color: #23206d;" href="#">myriad.theme@brankic.net</a></span>[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner gap="60" row_inner_bg_repeat="repeat"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner offset="vc_col-md-9"][brankic_contact_form_7 cf_7_id="6206" color="#23206d" border_color="#23206d" submit_button_text_color="#23206d"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m19-hero-with-asymmetric-heading-and-text-block"] = '[vc_row full_width="stretch_row" full_height="yes" columns_placement="bottom" row_bg_color_1="rgba(35,32,109,0.01)" use_gradient_bg="true" row_gradient_direction="to bottom" row_bg_color_2="rgba(35,32,109,0.5)" row_bg_color_3="#23206d" el_id="home" row_brankic_bg_image_extra="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/6-1.jpg"][vc_column width="5/6" brankic_centered_tablet="true" column_content_color="#ffffff" css=".vc_custom_1555435225709{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" offset="vc_col-md-12"][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner width="5/6" centered_tablet="true" offset="vc_col-md-8"][brankic_section_title title_color="#ffffff" h_tag="H1" h_size="custom" h_weight="800" h_transform="capitalize" h_size_custom="10vw"]<span class="stroke">Jon
Anders</span>[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/6" column_inner_content_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="5/6" centered_tablet="true" offset="vc_col-md-6"][brankic_divider width="width-10" color="#ffffff" align="left" margin="custom" custom_margin="35px auto 55px auto" border_width="2"][/brankic_divider][vc_column_text]
<h4>If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges.</h4>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m19-testimonials-with-customized-text"] = '[vc_row full_width="stretch_row" css_animation="none" row_bg_align="brankic_bg_top" row_bg_color_1="#6441a5" css=".vc_custom_1555433705258{padding-top: 15vh !important;padding-bottom: 15vh !important;}" row_brankic_bg_image_extra="https://brankic1979demo.com/myriad19/wp-content/uploads/2018/12/8.png"][vc_column width="1/4"][/vc_column][vc_column width="5/6" brankic_centered_tablet="true" offset="vc_col-md-6"][brankic_carousel title_color="" category_color="" shadow_color="rgba(0,0,0,0.24)" testimonial_post_id="none" avatar_position_default="avatar-bottom" text_color_testimonial="rgba(0,0,0,0.4)" text_size="30px" text_weight="800" text_height="custom" text_class="google_web_font_3" text_color_name_occupation="#ffffff" slides_per_view="1" autoplay="true" carousel_navigation="dots_below" text_height_custom="1.4"][/brankic_carousel][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]';
	

//brankic_helper_template("myriad19", $brankic_template);

foreach($names as $key => $value){
	$template_thumbs[$key] = "http://brankic1979demo.com/downloads/templates/" . $key . ".jpg"; 
}



foreach($brankic_template as $name => $template) {
	
	
	
	$data               = array();
    $data['name']       =  'Myriad19 ' . $names[$name]; 
    $data['weight']     = 0; 
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_myriad19 ' . $filters[$name] ;
	$data['image_path'] = preg_replace( '/\s/', '%20', $template_thumbs[$name] ); 
	$data['content']    = 	$template;

    vc_add_default_templates( $data );
	
}
	

}