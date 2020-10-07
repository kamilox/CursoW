<?php

add_action( 'vc_load_default_templates_action','my_custom_template_for_vc_myriad33' ); // Hook in
 
function my_custom_template_for_vc_myriad33() {
	
	$names = array("m-33-about-Duotone-fullscreen-heading-and-grid-style-services-block-" => "About - Duotone fullscreen heading and grid style services block",
				"m-33-about-progress-bar" => "About - progress bar",
				"m-33-home-blog-slider" => "Home - Blog slider",
				"m-33-contact-details" => "Contact details");
				
	$filters = array("m-33-about-Duotone-fullscreen-heading-and-grid-style-services-block-" => "bra_hero bra_services bra_icons",
				"m-33-about-progress-bar" => "bra_progress bra_about",
				"m-33-home-blog-slider" => "bra_blog bra_sliders",
				"m-33-contact-details" => "bra_contact");
	
	$brankic_template["m-33-about-Duotone-fullscreen-heading-and-grid-style-services-block-"] = '[vc_row full_width="stretch_row" duotone="custom" duotone_custom="#3d48ec" row_bg_color_1="rgba(0,0,0,0.78)" change_header_colors="true" css=".vc_custom_1582718747726{padding-top: 15vh !important;padding-bottom: 15vh !important;}" row_brankic_bg_image_extra="https://brankic1979.com/demo/myriad33/wp-content/uploads/2020/02/3-1.jpg"][vc_column width="5/6" brankic_centered_tablet="true" offset="vc_col-md-12"][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1555433731557{padding-bottom: 30px !important;}"][vc_column_inner content_align="text-align-center" content_align_tablet="tablet-text-align-left" css=".vc_custom_1582716942729{padding-bottom: 30px !important;}"][brankic_section_title title_color="#ffffff" h_tag="H3" h_size="custom" h_weight="900" h_height="1.2" h_size_custom="11vmin"]Take risks, nothing can substitute your experience.[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner equal_height="yes" content_placement="middle" gap="75" row_inner_bg_repeat="repeat" row_inner_content_color="#ffffff" brankic_grid="border_outer" brankic_grid_color="rgba(255,255,255,0.21)"][vc_column_inner brankic_column_inner_height="height-25" offset="vc_col-md-4"][brankic_icon type="linea" icon_size="4" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h6" heading_and_text_style="i-column" heading_content_color="" icon_linea="icon icon-basic-laptop" heading="Web Development"]A positive attitude causes a chain reaction of positive thoughts, events and outcomes. It is a catalyst and it sparks extraordinary results.[/brankic_icon][/vc_column_inner][vc_column_inner offset="vc_col-md-4"][brankic_icon type="linea" icon_size="4" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h6" heading_and_text_style="i-column" heading_content_color="" icon_linea="icon icon-software-layers2" heading="Creative Strategy"]A positive attitude causes a chain reaction of positive thoughts, events and outcomes. It is a catalyst and it sparks extraordinary results.[/brankic_icon][/vc_column_inner][vc_column_inner offset="vc_col-md-4"][brankic_icon type="material" icon_size="4" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_size="h6" heading_and_text_style="i-column" heading_content_color="" icon_material="vc-material vc-material-fingerprint" heading="Corporate Identity"]A positive attitude causes a chain reaction of positive thoughts, events and outcomes. It is a catalyst and it sparks extraordinary results.[/brankic_icon][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';

	$brankic_template["m-33-about-progress-bar"] = '[vc_row full_width="stretch_row" css=".vc_custom_1582801387381{padding-top: 15vh !important;}"][vc_column][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1552063296847{padding-bottom: 70px !important;}"][vc_column_inner width="2/3" offset="vc_col-md-6"][brankic_section_title h_tag="H4" p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#bbbbbb" title="Clients don\'t expect perfection, but they do expect honesty and transparency." small_title="A key to achieving success" p_size_custom="13px"]Is to assemble a strong and stable management team. It takes a lot of people to make a winning team. Everybody’s contribution is important.[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/2" offset="vc_hidden-sm vc_hidden-xs"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row gap="40" row_content_color="#3d48ec"][vc_column width="1/2"][brankic_progress_bars_wrapper style="bold rounded"][brankic_progress_bar value="89" bar_color="#3d48ec" caption_color="#212b3b" caption="Branding"][/brankic_progress_bars_wrapper][/vc_column][vc_column width="1/2"][brankic_progress_bars_wrapper speed="2001" style="bold rounded"][brankic_progress_bar value="65" bar_color="#3d48ec" caption_color="#212b3b" caption="Corporate Identity"][/brankic_progress_bars_wrapper][/vc_column][/vc_row][vc_row gap="40" row_content_color="#3d48ec" css=".vc_custom_1582806559531{padding-top: 5vh !important;padding-bottom: 15vh !important;}"][vc_column width="1/2"][brankic_progress_bars_wrapper speed="2002" style="bold rounded"][brankic_progress_bar value="59" bar_color="#3d48ec" caption_color="#212b3b" caption="Interface Design"][/brankic_progress_bars_wrapper][/vc_column][vc_column width="1/2"][brankic_progress_bars_wrapper speed="2003" style="bold rounded"][brankic_progress_bar value="81" bar_color="#3d48ec" caption_color="#212b3b" caption="Web Apps Development"][/brankic_progress_bars_wrapper][/vc_column][/vc_row][vc_row full_width="stretch_row" content_placement="middle" row_bg_size="auto" css=".vc_custom_1582807403899{padding-bottom: 15vh !important;}"][vc_column][vc_row_inner equal_height="yes" content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" column_inner_content_color="#ffffff" offset_direction="offset right" offset_width="offset-10" column_inner_bg_color_1="#3d48ec" css=".vc_custom_1582807576720{margin-top: 50px !important;padding-top: 70px !important;padding-right: 70px !important;padding-bottom: 70px !important;padding-left: 70px !important;}"][brankic_section_title title_gradient_direction="to left" h_tag="H4" h_weight="900" title="App design agency based in Big Apple"]We build meaningful and useful solutions for your business.[/brankic_section_title][brankic_divider align="left" style="divider blank" margin="25px auto"][/brankic_divider][vc_column_text]Your brand is public identity, what you’re trusted for. And for your brand to endure, it has to be tested, redefined, managed, and expanded as markets evolve. Brands either learn or disappear.[/vc_column_text][brankic_divider color="rgba(255,255,255,0.11)" margin="custom" custom_margin="55px auto 35px auto" border_width="1"][/brankic_divider][brankic_icon type="linea" icon_size="1" bg_color="#222c3b" border_shape="circle" border_width="" border_color="" icon_shape_padding="20" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_and_text_style="i-column" heading_content_color="#ffffff" icon_linea="icon icon-basic-spades"]Your brand is public identity, what you’re trusted for.[/brankic_icon][/vc_column_inner][vc_column_inner width="1/2" brankic_column_inner_height="height-35" css=".vc_custom_1582808193265{margin-bottom: 50px !important;}" column_inner_brankic_bg_image_extra="https://brankic1979.com/demo/myriad33/wp-content/uploads/2020/02/12-1.jpg"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';
	
	$brankic_template["m-33-home-blog-slider"] = '[vc_row full_width="stretch_row_content" change_header_colors="true"][vc_column][brankic_category cat_slug="design" layout="blog-carousel-emphasize" thumb_sizes="full" image_height="height-100" bg_img_color="rgba(0,0,0,0.2)" only_next_title_color="#ffffff" only_next_split_color="#3d48ec" shadow_color="" show_cats="true" title_stroke="" title_color="#ffffff" hover_color="#ffe47a" title_font_family="google_web_font_1" h_size="custom" titles_weight="900" h_height="custom" duotone="custom" limit="7" only_next_bg_img_color="rgba(221,51,51,0.52)" h_size_custom="8vmin" h_height_custom="1"][/vc_column][/vc_row]';
	
	$brankic_template["m-33-contact-details"] = '[vc_row full_width="stretch_row" row_bg_size="auto" row_bg_color_1="#3d48ec" change_header_colors="true" css=".vc_custom_1582824295308{padding-bottom: 10vh !important;}"][vc_column column_content_color="#f6fafd" css=".vc_custom_1582657664574{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat" css=".vc_custom_1582824204268{padding-top: 10vh !important;padding-bottom: 10vh !important;}"][vc_column_inner content_align="text-align-center"][brankic_section_title h_size="custom" h_weight="900" h_height="1.2" h_size_custom="11vmin"]Interested in a project? Please <span class="stroke">contact us</span>[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner equal_height="yes" row_inner_bg_repeat="repeat" brankic_grid="border_outer" brankic_grid_color="rgba(255,255,255,0.21)"][vc_column_inner content_align="text-align-center" offset="vc_col-md-4" css=".vc_custom_1582657850995{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_column_text highlight_background_color_1="rgba(255,255,255,0.14)"]<strong><small class="uppercase">Visit Us</small></strong>[/vc_column_text][brankic_divider style="divider blank" margin="5px auto"][/brankic_divider][brankic_section_title h_tag="H3" h_size="custom" h_weight="400" h_size_custom="18px"]<span class="google_web_font_4">Hallesches Ufer 23,
10963 Berlin, Germany</span>[/brankic_section_title][/vc_column_inner][vc_column_inner content_align="text-align-center" offset="vc_col-md-4" css=".vc_custom_1582715020725{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_column_text]<strong><small class="uppercase">Give Us a Call</small></strong>[/vc_column_text][brankic_divider style="divider blank" margin="5px auto"][/brankic_divider][brankic_section_title h_tag="H3" h_size="custom" h_weight="400" h_size_custom="18px"]<span class="google_web_font_4">+12 10963 – 578</span>[/brankic_section_title][/vc_column_inner][vc_column_inner content_align="text-align-center" offset="vc_col-md-4" css=".vc_custom_1582657859110{padding-top: 5vh !important;padding-bottom: 5vh !important;}"][vc_column_text]<strong><small class="uppercase">Job openings</small></strong>[/vc_column_text][brankic_divider style="divider blank" margin="5px auto"][/brankic_divider][brankic_section_title h_tag="H3" h_size="custom" h_weight="400" h_size_custom="18px"]<span class="google_web_font_4"><a href="#">careers@brankic.net</a></span>[/brankic_section_title][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';

foreach($names as $key => $value){
	$template_thumbs[$key] = "http://brankic1979demo.com/downloads/templates/" . $key . ".jpg"; 
}



foreach($brankic_template as $name => $template) {
	
	
	
	$data               = array();
    $data['name']       =  'Myriad33 ' . $names[$name]; 
    $data['weight']     = 0; 
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_myriad33 ' . $filters[$name] ;
	$data['image_path'] = preg_replace( '/\s/', '%20', $template_thumbs[$name] ); 
	$data['content']    = 	$template;

    vc_add_default_templates( $data );
	
}
	

}