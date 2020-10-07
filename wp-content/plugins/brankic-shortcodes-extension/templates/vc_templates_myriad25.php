<?php

add_action( 'vc_load_default_templates_action','my_custom_template_for_vc_myriad25' ); // Hook in
 
function my_custom_template_for_vc_myriad25() {
	
	$names = array("m25-home-brankic-super-slider" => "Home - Brankic super slider",
				);
				
	$filters = array("m25-home-brankic-super-slider" => "bra_hero bra_sliders",
				);
	
	$brankic_template["m25-home-brankic-super-slider"] = '[vc_row full_width="stretch_row" row_bg_color_1="rgba(0,0,0,0.23)" change_header_colors="true" row_brankic_bg_image_extra="https://brankic1979demo.com/myriad25/wp-content/uploads/2019/06/1.jpg"][vc_column column_content_color="#ffffff" css=".vc_custom_1545675227339{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][brankic_super_slider_wrapper slider_height="height-80" navigation_horizontal_align="right" border_radius="2px" fullwidth="true" mouse_wheel_control="true" grab_cursor="true"][brankic_super_slide slide_bg_image_extra="https://brankic1979demo.com/myriad25/wp-content/uploads/2019/06/1.jpg"][vc_row_inner][vc_column_inner][brankic_section_title title_color="#e1eec3" title_color_2="#f05053" h_size="custom" h_weight="900" h_transform="uppercase" h_height="1" p_custom_font="google_web_font_2" p_size="custom" small_title_color="#ffffff" small_title="Elegance is elimination" h_size_custom="7vw" p_size_custom="35px"]Women[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1560247120032{padding-top: 70px !important;}"][vc_column_inner column_inner_content_color="rgba(255,255,255,0.51)" offset="vc_col-md-4"][vc_column_text]Don\'t be into trends. Don\'t make fashion own you, but you decide what you are, what you want to express by the way you dress and the way to live.[/vc_column_text][brankic_divider style="divider blank" margin="15px auto"][/brankic_divider][brankic_button shape="radius" button_text="Shop now" half="true" text_color="#ffffff" text_hover_color="#000000" bg_color="rgba(255,255,255,0.21)" bg_hover_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][/vc_row_inner][/brankic_super_slide][brankic_super_slide slide_bg_image_extra="https://brankic1979demo.com/myriad25/wp-content/uploads/2019/06/4.jpg"][vc_row_inner][vc_column_inner][brankic_section_title title_color="#78ffd6" title_color_2="#007991" h_size="custom" h_weight="900" h_transform="uppercase" h_height="1" p_custom_font="google_web_font_2" p_size="custom" small_title_color="#ffffff" small_title="Elegance means taste" h_size_custom="7vw" p_size_custom="35px"]Men[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1560247120032{padding-top: 70px !important;}"][vc_column_inner column_inner_content_color="rgba(255,255,255,0.51)" offset="vc_col-md-4"][vc_column_text]Fashion you can buy, but style you possess. The key to style is learning who you are, which takes years. It\'s about self expression and, above all, attitude.[/vc_column_text][brankic_divider style="divider blank" margin="15px auto"][/brankic_divider][brankic_button button_text="Shop now" half="true" text_color="#ffffff" text_hover_color="#000000" bg_color="rgba(255,255,255,0.21)" bg_hover_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][/vc_row_inner][/brankic_super_slide][brankic_super_slide slide_bg_color_use_gradient_bg="true" slide_bg_color_2="rgba(0,0,0,0.11)" slide_bg_image_extra="https://brankic1979demo.com/myriad25/wp-content/uploads/2019/06/5.jpg" slide_bg_color="rgba(0,0,0,0.22)"][vc_row_inner][vc_column_inner][brankic_section_title title_color="#4568dc" title_color_2="#f05053" h_size="custom" h_weight="900" h_transform="uppercase" h_height="1" p_custom_font="google_web_font_2" p_size="custom" small_title_color="#ffffff" small_title="Get ready for" h_size_custom="7vw" p_size_custom="35px"]Summer 2019[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1560247120032{padding-top: 70px !important;}"][vc_column_inner column_inner_content_color="rgba(255,255,255,0.51)" offset="vc_col-md-4"][vc_column_text]Don\'t be into trends. Don\'t make fashion own you, but you decide what you are, what you want to express by the way you dress and the way to live.[/vc_column_text][brankic_divider style="divider blank" margin="15px auto"][/brankic_divider][brankic_button shape="radius" button_text="Shop now" half="true" text_color="#ffffff" text_hover_color="#000000" bg_color="rgba(255,255,255,0.21)" bg_hover_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][/vc_row_inner][/brankic_super_slide][/brankic_super_slider_wrapper][/vc_column][/vc_row]';


foreach($names as $key => $value){
	$template_thumbs[$key] = "http://brankic1979demo.com/downloads/templates/" . $key . ".jpg"; 
}



foreach($brankic_template as $name => $template) {
	
	
	
	$data               = array();
    $data['name']       =  'Myriad25 ' . $names[$name]; 
    $data['weight']     = 0; 
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_myriad25 ' . $filters[$name] ;
	$data['image_path'] = preg_replace( '/\s/', '%20', $template_thumbs[$name] ); 
	$data['content']    = 	$template;

    vc_add_default_templates( $data );
	
}
	

}