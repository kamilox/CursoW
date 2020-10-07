<?php

add_action( 'vc_load_default_templates_action','my_custom_template_for_vc_myriad26' ); // Hook in
 
function my_custom_template_for_vc_myriad26() {
	
	$names = array("m26-about" => "About",
				"m26-contact" => "Contact");
	
	$filters = array("m26-about" => "bra_about bra_text",
				"m26-contact" => "bra_contact");
				
	$brankic_template["m26-about"] = '[vc_row full_width="stretch_row_content" content_placement="middle"][vc_column brankic_column_height="height-100" column_bg_align="brankic_bg_right" column_bg_size="auto" column_brankic_bg_image_extra="https://brankic1979demo.com/myriad26/wp-content/uploads/2019/10/21.jpg" offset="vc_col-md-4"][/vc_column][vc_column css=".vc_custom_1572001301582{padding-top: 10vh !important;padding-right: 60px !important;padding-bottom: 10vh !important;padding-left: 60px !important;}" offset="vc_col-md-8"][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1572001275457{padding-bottom: 5vh !important;}"][vc_column_inner width="1/12"][/vc_column_inner][vc_column_inner width="3/4" column_inner_content_color="#ffffff"][vc_column_text]<strong><small class="uppercase">About me</small></strong>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat"][vc_column_inner width="3/4" offset_direction="offset left" offset_width="offset-10"][brankic_section_title title_color="#ffffff" h_tag="H3"]<span class="google_web_font_3">Hello, my name is Anna, a professional photographer based in Amsterdam with more than 10 years of experience as a digital creative.</span>[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1572001289035{padding-top: 8vh !important;}"][vc_column_inner width="1/12"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Etiam eget mi enim, non ultricies nisi voluptatem, illo inventore veritatis. Eaque ipsa quae ab illo inventore veritatis.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus. Aliquam tortor lorem, fringilla tempor dignissim at.[/vc_column_text][brankic_divider style="divider blank" margin="20px auto"][/brankic_divider][vc_column_text highlight_text_color="#ffffff" highlight_hover_text_color="#121212" highlight_background_color_1="#ffffff"]<small class="uppercase "><strong>If you want to get in touch,</strong> <a class="" href="#"><span class="highlight a_hover w-700 overlay">d r o p   m e   a   l i n e</span></a></small>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][/vc_column_inner][vc_column_inner width="1/12"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';

	$brankic_template["m26-contact"] = '[vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" row_bg_align="brankic_bg_bottom"][vc_column brankic_column_height="height-100" column_brankic_bg_image_extra="https://brankic1979demo.com/myriad26/wp-content/uploads/2019/06/19.jpg" offset="vc_col-md-4"][/vc_column][vc_column css=".vc_custom_1572001310334{padding-top: 10vh !important;padding-right: 60px !important;padding-bottom: 10vh !important;padding-left: 60px !important;}" offset="vc_col-md-8"][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1572001316018{padding-bottom: 5vh !important;}"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]<small class="uppercase"><strong>Let\'s Get in Touch</strong></small>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/6"][/vc_column_inner][vc_column_inner width="2/3"][brankic_section_title h_tag="H4"]Contact us and let’s make magic together. To send us a message or just to say hello, please complete the form or contact us via details listed below.[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/6"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1560610321784{padding-top: 8vh !important;}"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text highlight_background_color_1="rgba(255,255,255,0.14)"]<strong>Visit Us<br />
</strong>Hallesches Ufer 23,<br />
10963 Berlin, Germany[/vc_column_text][vc_column_text css=".vc_custom_1560610834505{padding-top: 30px !important;}"]<strong>Say Hello<br />
</strong><a href="#">myriad.theme@brankic.net</a>[/vc_column_text][vc_column_text css=".vc_custom_1560610843041{padding-top: 30px !important;}"]<strong>Give Us a Call<br />
</strong>+12 10963 - 578[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]';


foreach($names as $key => $value){
	$template_thumbs[$key] = "http://brankic1979demo.com/downloads/templates/" . $key . ".jpg"; 
}



foreach($brankic_template as $name => $template) {
	
	
	
	$data               = array();
    $data['name']       =  'Myriad26 ' . $names[$name]; 
    $data['weight']     = 0; 
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_myriad26 ' . $filters[$name] ;
	$data['image_path'] = preg_replace( '/\s/', '%20', $template_thumbs[$name] ); 
	$data['content']    = 	$template;

    vc_add_default_templates( $data );
	
}
	

}