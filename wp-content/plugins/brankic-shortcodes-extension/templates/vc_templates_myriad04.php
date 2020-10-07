<?php

add_action( 'vc_load_default_templates_action','my_custom_template_for_vc_myriad04' ); // Hook in
 
function my_custom_template_for_vc_myriad04() {
	
	$names = array("m04-about-clients-grid-with-border" => "About - Clients grid with border",
				"m04-about-icon-boxes-with-hover" => "About - Icon boxes with hover",
				"m04-about-team-members-outset-overlay" => "About - Team members outset overlay",
				"m04-about-text-blocks-example" => "About - Text blocks example",
				"m04-contact" => "Contact page",
				"m04-home-blog-posts-preview" => "Home - Blog posts preview",
				"m04-home-clients-logos-with-client-testimonials" => "Home - Clients logos with client testimonials",
				"m04-home-collage-images-with-content-and-counter" => "Home - Collage images with content and counter",
				"m04-home-hero-with-underlined-heading-title" => "Home - Hero with underlined heading title",
				"m04-home-offset-row-with-image-and-content-intro" => "Home - Offset row with image and content intro",
				"m04-service-boxes-with-hover" => "Home - Service boxes with hover",
				"m04-misc-Icons-list-with-collage-images" => "Icons list with collage images",
				"m04-misc-Banner-with-outset-image-block" => "Banner with outset image block");
				
	$filters = array("m04-about-clients-grid-with-border" => "bra_clients bra_icons",
				"m04-about-icon-boxes-with-hover" => "bra_icons bra_services",
				"m04-about-team-members-outset-overlay" => "bra_team",
				"m04-about-text-blocks-example" => "bra_text",
				"m04-contact" => "bra_contact",
				"m04-home-blog-posts-preview" => "bra_blog",
				"m04-home-clients-logos-with-client-testimonials" => "bra_clients bra_testimonials",
				"m04-home-collage-images-with-content-and-counter" => "bra_counter bra_image bra_about",
				"m04-home-hero-with-underlined-heading-title" => "bra_hero",
				"m04-home-offset-row-with-image-and-content-intro" => "bra_text bra_image",
				"m04-service-boxes-with-hover" => "bra_icons bra_services bra_boxes",
				"m04-misc-Icons-list-with-collage-images" => "bra_icons bra_image",
				"m04-misc-Banner-with-outset-image-block" => "bra_text bra_cta");
	
	$brankic_template["m04-about-clients-grid-with-border"] = '[vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" row_bg_size="auto" brankic_grid="border_inner" brankic_grid_color="rgba(0,0,0,0.07)"][vc_column width="1/3" content_align="text-align-center" css=".vc_custom_1556100692977{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-5.png"][/vc_column][vc_column width="1/3" content_align="text-align-center" column_bg_size="auto" css=".vc_custom_1556100713076{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-10.png"][/vc_column][vc_column width="1/3" content_align="text-align-center" css=".vc_custom_1556100725906{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-12.png"][/vc_column][vc_column width="1/3" content_align="text-align-center" css=".vc_custom_1556100796419{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-1.png"][/vc_column][vc_column width="1/3" content_align="text-align-center" css=".vc_custom_1556100773411{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-7.png"][/vc_column][vc_column width="1/3" content_align="text-align-center" css=".vc_custom_1556100739240{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-3.png"][/vc_column][vc_column width="1/3" content_align="text-align-center" css=".vc_custom_1556100784671{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-8.png"][/vc_column][vc_column width="1/3" content_align="text-align-center" css=".vc_custom_1556100762303{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-11.png"][/vc_column][vc_column width="1/3" content_align="text-align-center" css=".vc_custom_1556100751989{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][brankic_image hover="high-low" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/lg-2.png"][/vc_column][/vc_row]';

	$brankic_template["m04-about-icon-boxes-with-hover"] = '[vc_row_inner gap="30" row_inner_bg_repeat="repeat" css=".vc_custom_1556113616023{padding-top: 7vh !important;padding-bottom: 7vh !important;}"][vc_column_inner offset="vc_col-md-4"][brankic_icon type="linea" icon_size="2" bg_color="#111111" hover="true" bg_color_hover="#fb857a" border_shape="circle" border_width="" border_color="" icon_shape_padding="30" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-column" heading_content_color="" icon_linea="icon icon-ecommerce-graph-increase"]<small class="uppercase">
<strong>Development</strong></small>
Being of service to others is what brings true happiness.[/brankic_icon][/vc_column_inner][vc_column_inner offset="vc_col-md-4"][brankic_icon type="linea" icon_size="2" bg_color="#111111" hover="true" bg_color_hover="#fb857a" border_shape="circle" border_width="" border_color="" icon_shape_padding="30" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-column" heading_content_color="" icon_linea="icon icon-basic-elaboration-tablet-pencil"]<small class="uppercase">
<strong>Modern Code</strong></small>
Great design is a layered relationship.[/brankic_icon][/vc_column_inner][vc_column_inner offset="vc_col-md-4"][brankic_icon type="linea" icon_size="2" bg_color="#111111" hover="true" bg_color_hover="#fb857a" border_shape="circle" border_width="" border_color="" icon_shape_padding="30" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-column" heading_content_color="" icon_linea="icon icon-software-layers2"]<small class="uppercase">
<strong>Digital Strategy</strong></small>
Excellence is not an exception, it is a prevailing attitude.[/brankic_icon][/vc_column_inner][/vc_row_inner][brankic_divider color="#eeeeee" align="left" margin="custom" custom_margin="0" text_icon_position="left" border_width="2"][/brankic_divider][/vc_column][/vc_row]';
	
	$brankic_template["m04-about-team-members-outset-overlay"] = '[vc_row full_width="stretch_row" css_animation="none" row_bg_color_1="#0a0b25" css=".vc_custom_1557829032436{padding-top: 7vh !important;padding-bottom: 7vh !important;}"][vc_column content_align="text-align-center" offset="vc_col-md-6"][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" social="true" social_url="facebook, http://#, twitter, http://#, instagram, http://#" icon_color="#ffffff" height="height-45" image_src_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/tm-1.jpg" name="John Doe" position="Founder / Art Director"][/brankic_team_member][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" social="true" social_url="facebook, http://#, twitter, http://#, instagram, http://#, linkedin, http://#" icon_color="#ffffff" height="height-45" image_src_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/tm-3.jpg" name="Rachel White" position="Creative Director"][/brankic_team_member][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" social="true" social_url="facebook, http://#, twitter, http://#, instagram, http://#, github, http://#, linkedin, http://#" icon_color="#ffffff" height="height-45" image_src_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/tm-5.jpg" name="Mark Stevens" position="Senior Developer"][/brankic_team_member][/vc_column][vc_column content_align="text-align-center" offset="vc_col-md-6"][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" social="true" social_url="linkedin, http://#, pinterest, http://#, twitter, http://#, instagram, http://#" icon_color="#ffffff" height="height-45" image_src_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/tm-4.jpg" name="Anne Moore" position="Project Manager"][/brankic_team_member][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" social="true" social_url="dribbble, http://#, facebook, http://#, twitter, http://, instagram, http://#" icon_color="#ffffff" height="height-45" image_src_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/tm-2.jpg" name="Andrew Johnson" position="Graphic Designer"][/brankic_team_member][/vc_column][/vc_row]
';
	
	$brankic_template["m04-about-text-blocks-example"] = '[vc_row css=".vc_custom_1552310409905{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][vc_column][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1552310460049{padding-bottom: 5vh !important;}"][vc_column_inner width="1/2"][brankic_section_title title_color="#fb857a" h_tag="H4" h_weight="700"]App design company
based in Berlin,
Germany.[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/2"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1552310542413{padding-bottom: 2vh !important;}"][vc_column_inner css=".vc_custom_1532549709797{padding-bottom: 30px !important;}"][vc_column_text highlight_background_color_1="#4294ff"]
<h2>Experience is the teacher of all things. Be brave. Take risks. Nothing can substitute your experience.[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner gap="35" row_inner_bg_repeat="repeat"][vc_column_inner offset="vc_col-md-6"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges. Excellence is not an exception, it is a prevailing attitude.
Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/vc_column_text][/vc_column_inner][vc_column_inner offset="vc_col-md-6"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges. Excellence is not an exception, it is a prevailing attitude.
Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m04-contact"] = '[vc_row full_width="stretch_row_content" equal_height="yes" row_bg_align="brankic_bg_bottom"][vc_column column_bg_color_1="#f6fcfe" css=".vc_custom_1557823983500{padding-top: 12vh !important;padding-right: 30px !important;padding-bottom: 12vh !important;padding-left: 30px !important;}" offset="vc_col-md-6"][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3" column_inner_content_color="#1c1e59"][brankic_section_title title_color="#1c1e59" p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#4294ff" title="App design agency that run on coffee." small_title="Want to work with us?" p_size_custom="13px"]Let\'s Get in Touch[/brankic_section_title][vc_column_text css_animation="none" css=".vc_custom_1532273559735{padding-top: 10px !important;padding-bottom: 50px !important;}"]Contact us and let’s make magic together. To send us a message or just to say hello, please complete the form or contact us via details listed below.[/vc_column_text][vc_column_text highlight_background_color_1="rgba(255,255,255,0.14)" css=".vc_custom_1532272892813{padding-left: 70px !important;}"]<strong>Visit Us
</strong>Hallesches Ufer 23,
10963 Berlin, Germany[/vc_column_text][vc_column_text css=".vc_custom_1532272911148{padding-top: 30px !important;padding-left: 70px !important;}"]<strong>Give Us a Call
</strong>+12 10963 - 578[/vc_column_text][vc_column_text css=".vc_custom_1532273026673{padding-top: 30px !important;padding-left: 70px !important;}"]<strong>Say Hello
</strong><a href="#">myriad.theme@brankic.net</a>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column content_align="text-align-right" column_content_color="#ffffff" column_bg_color_1="#4294ff" use_gradient_bg="true" column_gradient_direction="to bottom right" column_bg_color_2="#2948ff" css=".vc_custom_1557823649507{padding-top: 12vh !important;padding-right: 30px !important;padding-bottom: 12vh !important;padding-left: 30px !important;}" offset="vc_col-md-6"][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3"][brankic_contact_form_7 cf_7_id="8769" color="#ffffff" border_color="rgba(255,255,255,0.45)" submit_button_text_color="#ffffff" submit_button_bg_color="rgba(28,30,89,0.08)" submit_button_hover_bg_color="#1c1e59"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m04-home-blog-posts-preview"] = '[vc_row full_width="stretch_row" css=".vc_custom_1557866686437{padding-top: 21vh !important;padding-bottom: 12vh !important;background-color: #f3fbfe !important;}"][vc_column content_align="text-align-center"][vc_row_inner][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2"][brankic_section_title h_tag="H3" p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#4294ff" title="Follow us on a journey" small_title="Latest posts" p_size_custom="13px"][/brankic_section_title][brankic_divider style="divider blank" margin="15px auto"][/brankic_divider][vc_column_text highlight_background_color_1="#d8e6eb"]<span style="color: #a5a6bc;">There are two types of people who will tell you that you cannot make a difference in this world: those who are afraid to try and those who are afraid you will succeed.</span>[/vc_column_text][brankic_divider style="divider blank" margin="15px auto"][/brankic_divider][brankic_button shape="radius" button_text="Read our blog" size="large" text_color="#4294ff" text_hover_color="#ffffff" bg_color="rgba(66,148,255,0.1)" bg_hover_color="#4294ff"][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1558944491706{padding-top: 9vh !important;}"][vc_column_inner][brankic_category layout="blog-style-3" boxed="true" thumb_sizes="brankic-512-384" img_radius="true" img_radius_size="2px" shadow_color="rgba(28,30,89,0.04)" gap_advanced="20px" show_excerpt="" navigation="none" border_hover_color="#4294ff" limit="3"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m04-home-clients-logos-with-client-testimonials"] = '[vc_row full_width="stretch_row_content" row_bg_color_1="rgba(0,0,0,0.42)" use_gradient_bg="true" row_gradient_direction="to bottom right" row_bg_color_2="rgba(0,0,0,0.01)" row_brankic_bg_image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/7.jpg" css=".vc_custom_1557748249586{padding-bottom: 100px !important;}"][vc_column content_align="text-align-center"][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat" brankic_grid="border_outer" brankic_grid_color="rgba(255,255,255,0.1)"][vc_column_inner width="1/4" brankic_column_inner_height="height-15"][brankic_image hover="low-high" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/l-lg-5.png" url="#"][/vc_column_inner][vc_column_inner width="1/4" brankic_column_inner_height="height-15"][brankic_image hover="low-high" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/l-lg-1.png" url="#"][/vc_column_inner][vc_column_inner width="1/4" brankic_column_inner_height="height-15"][brankic_image hover="low-high" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/l-lg-7.png" url="#"][/vc_column_inner][vc_column_inner width="1/4" brankic_column_inner_height="height-15"][brankic_image hover="low-high" image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2018/06/l-lg-4.png" url="#"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1556108014875{padding-top: 70px !important;padding-right: 30px !important;padding-left: 30px !important;}"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner offset="vc_col-md-6"][brankic_carousel title_color="" category_color="" shadow_color="" testimonial_cat_slug="portfolio-testimonials" testimonial_post_id="none" text_color_testimonial="#ffffff" text_size="22px" text_weight="500" text_class="google_web_font_2" text_color_name_occupation="#ffffff" slides_per_view="1" fade="true" carousel_navigation="arrows_below" fraction_navigation="true" carousel_navigation_color="light"][/brankic_carousel][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m04-home-collage-images-with-content-and-counter"] = '[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1557851152042{padding-top: 18vh !important;padding-bottom: 18vh !important;}"][vc_column offset="vc_col-md-6" css=".vc_custom_1557851102300{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_row_inner][vc_column_inner offset="vc_col-md-10"][vc_column_text highlight_background_color_1="#4294ff"]
<h3><span class="highlight underline">Creativity is the process of having original ideas that have value.</span></h3>
[/vc_column_text][brankic_divider align="left" style="divider blank"][/brankic_divider][vc_column_text]<span style="color: #a5a6bc;">People are definitely a company\'s greatest asset. It doesn\'t make any difference whether the product is cars or cosmetics. A company is only as good as the people it keeps.</span>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1552468339725{padding-top: 40px !important;}"][vc_column_inner width="1/3"][brankic_counter caption_color="" counter_color="#4294ff" to="64"][vc_column_text]<strong><small class="uppercase">Cups of Coffee</small></strong>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][brankic_counter caption_color="" counter_color="#4294ff" to="72"][vc_column_text]<strong><small class="uppercase">Finished Projects</small></strong>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][brankic_counter caption_color="" counter_color="#4294ff" to="33"][vc_column_text]<strong><small class="uppercase">Community Members</small></strong>[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column offset_direction="offset right" offset_width="offset-10" offset="vc_col-md-6"][vc_row_inner][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="5/6"][brankic_collage shadow_color="rgba(0,0,0,0.11)" outset="50" image_extra_1="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/1-e1559853294586.jpg" image_extra_2="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/03/2-e1559853338709.jpg"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m04-home-hero-with-underlined-heading-title"] = '[vc_row full_width="stretch_row" full_height="yes" content_placement="middle" row_bg_color_1="rgba(0,0,0,0.35)" css=".vc_custom_1557759057968{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" row_brankic_bg_image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/9.jpg"][vc_column width="1/6" column_content_color="rgba(255,255,255,0.5)" css=".vc_custom_1557869487415{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][vc_column width="2/3" content_align="text-align-center" column_content_color="#ffffff"][brankic_section_title p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#ffffff" small_title="Our Vision" p_size_custom="13px"][/brankic_section_title][brankic_divider style="divider blank"][/brankic_divider][vc_column_text highlight_background_color_1="#dd3333"]
<h1><span class="highlight underline">Always deliver more than expected</span></h1>
[/vc_column_text][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]';
	
	$brankic_template["m04-home-offset-row-with-image-and-content-intro"] = '[vc_row full_width="stretch_row_content" equal_height="yes" row_bg_size="auto" row_bg_color_1="#f6fcfe"][vc_column css=".vc_custom_1557825096715{padding-top: 12vh !important;padding-right: 60px !important;padding-bottom: 12vh !important;padding-left: 60px !important;}" offset="vc_col-md-6"][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner content_align="text-align-right" content_align_tablet="tablet-text-align-left" offset="vc_col-md-8"][vc_column_text highlight_background_color_1="#dd9933"]
<h4><span class="w-300">Creativity is the process of having original ideas that have value.</span></h4>
[/vc_column_text][brankic_divider width="width-10" color="#1c1e59" align="right" border_width="2"][/brankic_divider][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner content_align="text-align-right" content_align_tablet="tablet-text-align-left" column_inner_content_color="#9db0b7" offset="vc_col-md-8"][vc_column_text]People are definitely a company\'s greatest asset. It doesn\'t make any difference whether the product is cars or cosmetics. A company is only as good as the people it keeps.[/vc_column_text][brankic_divider style="divider blank" margin="10px auto"][/brankic_divider][brankic_button shape="radius" button_text="Get started" size="large" half="true" text_color="#4294ff" text_hover_color="#ffffff" bg_color="rgba(66,148,255,0.1)" bg_hover_color="#4294ff"][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column shadow_color="rgba(0,0,0,0.07)" column_bg_size="auto" css=".vc_custom_1559892427763{margin-top: -10vh !important;}" offset="vc_col-md-6"][brankic_reveal height="height-70" color="#4294ff" image_src_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/05/10.jpg"][/brankic_reveal][/vc_column][/vc_row]';
	
	$brankic_template["m04-service-boxes-with-hover"] = '[vc_row full_width="stretch_row" css=".vc_custom_1556056780425{padding-top: 12vh !important;padding-bottom: 12vh !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2" content_align="text-align-center"][brankic_section_title h_tag="H4" p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#4294ff" title="The highest of distinctions" small_title="Our Capabilites" p_size_custom="13px"]The highest of distinctions
is service to others.[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][vc_row_inner equal_height="yes" gap="20" row_inner_bg_repeat="repeat" css=".vc_custom_1552466632677{padding-top: 40px !important;}"][vc_column_inner width="1/2" offset="vc_col-md-3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="3px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#e2e2e9" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#1c1e59" hover_heading_color="#ffffff" content_color="#a5a6bc" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" icon_linea="icon icon-basic-display" heading="Interface Design" box_url="#"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column_inner][vc_column_inner width="1/2" offset="vc_col-md-3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="3px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#e2e2e9" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#1c1e59" hover_heading_color="#ffffff" content_color="#a5a6bc" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" icon_linea="icon icon-software-pen" heading="Graphic Solution"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column_inner][vc_column_inner width="1/2" offset="vc_col-md-3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="3px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#e2e2e9" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#1c1e59" hover_heading_color="#ffffff" content_color="#a5a6bc" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" heading="Digital Strategy" icon_linea="icon icon-basic-world"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column_inner][vc_column_inner width="1/2" offset="vc_col-md-3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="3px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#e2e2e9" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#1c1e59" hover_heading_color="#ffffff" content_color="#a5a6bc" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" heading="Typography" icon_linea="icon icon-software-font-size"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';

	$brankic_template["m04-misc-Icons-list-with-collage-images"] = '[vc_row full_width="stretch_row" content_placement="middle" css=".vc_custom_1578829035114{padding-top: 18vh !important;padding-bottom: 18vh !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column offset="vc_col-md-6"][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner offset="vc_col-md-10"][vc_column_text highlight_background_color_1="rgba(66,148,255,0.1)"]
<h3><span class="highlight underline-through">Don’t be afraid to give up the good to go for the great.</span></h3>
[/vc_column_text][brankic_divider align="left" style="divider blank" margin="15px auto"][/brankic_divider][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner width="5/6"][vc_column_text highlight_background_color_1="#4294ff"]<span style="color: #a5a6bc;">People are definitely a company’s greatest asset. It doesn’t make any difference whether the product is cars or cosmetics. A company is only as good as the people it keeps.</span>[/vc_column_text][brankic_divider align="left" style="divider blank" margin="15px auto"][/brankic_divider][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner wow_effect="fadeInDown" wow_delay="0.3" row_inner_bg_repeat="repeat" css=".vc_custom_1578685100070{padding-top: 5vh !important;}"][vc_column_inner][brankic_icon type="linea" icon_size="2" bg_color="#4294ff" border_shape="rectangle" border_width="" border_color="" icon_shape_padding="20" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-column" heading_content_color="" icon_linea="icon icon-software-layers2"]<span class="w-700"><small class="uppercase">Strategy</small></span>
<small class="">Being of service to others is what brings true happiness.</small>[/brankic_icon][/vc_column_inner][/vc_row_inner][vc_row_inner wow_effect="fadeInDown" wow_delay="0.3" row_inner_bg_repeat="repeat" css=".vc_custom_1578685089410{padding-top: 5vh !important;}"][vc_column_inner][brankic_icon type="linea" icon_size="2" bg_color="#4294ff" border_shape="rectangle" border_width="" border_color="" icon_shape_padding="20" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#45486e" icon_linea="icon icon-basic-elaboration-tablet-pencil"]<span class="w-700"><small class="uppercase">App Design</small></span>
<small class="">Being of service to others is what brings true happiness.</small>[/brankic_icon][/vc_column_inner][/vc_row_inner][vc_row_inner wow_effect="fadeInDown" wow_delay="0.3" row_inner_bg_repeat="repeat" css=".vc_custom_1578685080910{padding-top: 5vh !important;}"][vc_column_inner][brankic_icon type="linea" icon_size="2" bg_color="#4294ff" border_shape="rectangle" border_width="" border_color="" icon_shape_padding="20" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#45486e" icon_linea="icon icon-ecommerce-graph-increase"]<span class="w-700"><small class="uppercase">Development</small></span>
<small class="">Being of service to others is what brings true happiness.</small>[/brankic_icon][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/12"][/vc_column][vc_column width="2/3" wow_effect="fadeInRight" wow_delay="0.2" brankic_centered_tablet="true" content_align_tablet="tablet-text-align-center" offset="vc_col-md-5"][brankic_collage shadow_color="rgba(0,0,0,0.21)" outset="50" thumb_sizes_1="brankic-768-1024" border_radius_1="" thumb_sizes_2="brankic-original-1024" border_radius_2="" thumb_sizes_3="brankic-512-384" border_radius_3="" image_extra_1="https://brankic1979demo.com/myriad04/wp-content/uploads/2020/01/21.jpg" image_extra_2="https://brankic1979demo.com/myriad04/wp-content/uploads/2020/01/22.jpg"][/vc_column][/vc_row]';
	
	$brankic_template["m04-misc-Banner-with-outset-image-block"] = '[vc_row full_width="stretch_row" row_bg_size="auto" row_bg_color_1="#4294ff"][vc_column column_content_color="rgba(255,255,255,0.5)" css=".vc_custom_1578820916037{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_row_inner equal_height="yes" content_placement="bottom" row_inner_bg_repeat="repeat"][vc_column_inner offset="vc_col-md-6" css=".vc_custom_1578829117249{padding-top: 18vh !important;padding-bottom: 18vh !important;}"][brankic_section_title p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#ffffff" small_title="Our main goal" p_size_custom="13px"][/brankic_section_title][vc_column_text highlight_text_color="#ffffff" highlight_background_color_1="#ffffff"]
<h2><span class="highlight underline">We always deliver more than expected</span></h2>
[/vc_column_text][brankic_divider style="divider blank" margin="20px auto"][/brankic_divider][vc_column_text]The modern artist… is working and expressing an inner world, expressing the energy, the motion, and other inner forces. And the only way to do that is to overcome our need for invulnerability. [/vc_column_text][brankic_divider style="divider blank" margin="30px auto"][/brankic_divider][brankic_button shape="radius" button_text="Let\'s work together" size="large" hover="dir-ltr" text_color="#1c1e59" text_hover_color="#ffffff" bg_color="#ffffff" bg_hover_color="#1c1e59" shadow_color="rgba(28,30,89,0.11)"][/vc_column_inner][vc_column_inner width="1/6" offset="vc_hidden-sm vc_hidden-xs"][/vc_column_inner][vc_column_inner width="1/3" brankic_column_inner_height="height-50" offset_direction="offset right" offset_width="offset-70" offset="vc_hidden-sm vc_hidden-xs" column_inner_brankic_bg_image_extra="https://brankic1979demo.com/myriad04/wp-content/uploads/2019/04/3.jpg"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
foreach($names as $key => $value){
	$template_thumbs[$key] = "http://brankic1979demo.com/downloads/templates/" . $key . ".jpg"; 
}

//brankic_helper_template("myriad04", $brankic_template);

foreach($brankic_template as $name => $template) {
	
	
	
	$data               = array();
    $data['name']       =  'Myriad04 ' . $names[$name]; 
    $data['weight']     = 0; 
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_myriad04 ' . $filters[$name];
	$data['image_path'] = preg_replace( '/\s/', '%20', $template_thumbs[$name] ); 
	$data['content']    = 	$template;

    vc_add_default_templates( $data );
	
}
	

}