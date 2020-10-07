<?php

require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad01.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad02.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad03.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad04.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad05.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad06.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad07.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad08.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad09.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad10.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad11.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad12.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad13.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad14.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad15.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad16.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad17.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad18.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad19.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad20.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad21.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad22.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad23.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad25.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad26.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad27.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad28.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad29.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad30.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad31.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad32.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad33.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad34.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad35.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_myriad36.php';
require_once dirname( __FILE__ ) . '/templates/vc_templates_misc.php';

//add_action( 'vc_load_default_templates_action','my_custom_template_for_vc' ); // Hook in
 
function my_custom_template_for_vc() {
    
	


	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Icons - 4 Columns with Box Gradient hover', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 9; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_icons'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Icons-4-Columns-with-Box-Gradient-hover-.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row gap="35" css=".vc_custom_1526205332274{padding-top: 150px !important;}"][vc_column width="1/2" brankic_centered="true" content_align="text-align-center" css=".vc_custom_1526210670600{padding-bottom: 35px !important;}"][brankic_section_title title_color="#000000" h_tag="H3" h_size="40px" h_weight="normal" h_transform="capitalize" p_size="15px" p_weight="700" small_title_color="rgba(0,0,0,0.37)" title="Consistent hard work leads to success." small_title="Capabilities"][brankic_divider width="width-10" align="left" style="divider blank" margin="10px auto"][vc_column_text]<strong>Sed ut perspiciatis unde omnis iste natus error sit voluptatem. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</strong>[/vc_column_text][/vc_column][/vc_row][vc_row gap="35" css=".vc_custom_1526205358216{padding-bottom: 150px !important;}"][vc_column width="1/4"][brankic_box hover="true" box_hover_bg_color="#ff9966" box_hover_bg_color_2="#ff5e62" horizontal_align="text-align-center" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_border_color="#f8f8f8" box_hover_shadow_color="rgba(0,0,0,0.11)" type="material" icon_size="5" icon_color="#ff5e62" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="10" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#999999" hover_content_color="rgba(255,255,255,0.6)" heading_and_text_style="i-row" box_height="" border_shape="" border_width="" border_color="" height="" heading="Graphic Design" icon_material="vc-material vc-material-fingerprint"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_box][/vc_column][vc_column width="1/4"][brankic_box hover="true" box_hover_bg_color="#ff9966" box_hover_bg_color_2="#ff5e62" horizontal_align="text-align-center" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_border_color="#f8f8f8" box_hover_shadow_color="rgba(0,0,0,0.11)" type="linea" icon_size="5" icon_color="#ff5e62" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="10" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#999999" hover_content_color="rgba(255,255,255,0.6)" heading_and_text_style="i-row" box_height="" border_shape="" border_width="" border_color="" height="" heading="Branding" icon_linea="icon icon-software-pen"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_box][/vc_column][vc_column width="1/4"][brankic_box hover="true" box_hover_bg_color="#ff9966" box_hover_bg_color_2="#ff5e62" horizontal_align="text-align-center" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_border_color="#f8f8f8" box_hover_shadow_color="rgba(0,0,0,0.11)" type="linea" icon_size="5" icon_color="#ff5e62" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="10" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#999999" hover_content_color="rgba(255,255,255,0.6)" heading_and_text_style="i-row" box_height="" border_shape="" border_width="" border_color="" height="" heading="App Design" icon_linea="icon icon-basic-tablet"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_box][/vc_column][vc_column width="1/4"][brankic_box hover="true" box_hover_bg_color="#ff9966" box_hover_bg_color_2="#ff5e62" horizontal_align="text-align-center" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_border_color="#f8f8f8" box_hover_shadow_color="rgba(0,0,0,0.11)" type="linea" icon_size="5" icon_color="#ff5e62" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="10" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#999999" hover_content_color="rgba(255,255,255,0.6)" heading_and_text_style="i-row" box_height="" border_shape="" border_width="" border_color="" height="" heading="Video Production" icon_linea="icon icon-basic-video"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_box][/vc_column][vc_column content_align="text-align-center"][brankic_button text_hover_color="#ffffff" bg_color="" bg_hover_color="#ff5e62" border_color="#ff5e62" border_hover_color=""][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Icons - Background Image / Gradient Overlay', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 10; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_icons'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Icons-Background-Image-Gradient-Overlay.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" gap="35" row_bg_size="cover" row_bg_color_1="rgba(128,112,192,0.9)" use_gradient_bg="true" row_gradient_direction="to top right" row_bg_color_2="#4b31ac" css=".vc_custom_1527020554805{padding-top: 150px !important;padding-bottom: 150px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" row_brankic_bg_image="8482" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/64.jpg"][vc_column width="1/2" brankic_centered="true" content_align="text-align-center" column_content_color="#ffffff"][brankic_section_title h_size="custom" h_weight="900" stroke="true" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="8px" title="change." small_title="Great minds" p_size_custom="14px" stroke_pretext="Creative thinking inspires ideas. Ideas inspire " h_size_custom="65px"][/vc_column][vc_column css=".vc_custom_1526128117350{padding-top: 40px !important;}"][/vc_column][vc_column width="1/3" content_align="text-align-center" column_content_color="rgba(255,255,255,0.79)"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_and_text_style="i-row" heading_content_color="" icon_linea="icon icon-ecommerce-graph-increase"][/brankic_icon][brankic_section_title title_color="#ffffff" h_tag="H2" h_size="custom" h_weight="700" h_transform="uppercase" h_spacing="8px" p_weight="normal" title="Product development" h_size_custom="14px"][brankic_divider style="divider blank" margin="25px auto"][vc_column_text]Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Etiam eget mi enim, non ultricies nisi voluptatem.[/vc_column_text][/vc_column][vc_column width="1/3" content_align="text-align-center" column_content_color="rgba(255,255,255,0.79)"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_and_text_style="i-row" heading_content_color="" icon_linea="icon icon-basic-keyboard"][/brankic_icon][brankic_section_title title_color="#ffffff" h_tag="H2" h_size="custom" h_weight="700" h_transform="uppercase" h_spacing="8px" p_weight="normal" title="Modern code" h_size_custom="14px"][brankic_divider style="divider blank" margin="25px auto"][vc_column_text]Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Etiam eget mi enim, non ultricies nisi voluptatem.[/vc_column_text][/vc_column][vc_column width="1/3" content_align="text-align-center" column_content_color="rgba(255,255,255,0.79)"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="" heading_and_text_style="i-row" heading_content_color="" icon_linea="icon icon-software-layers2"][/brankic_icon][brankic_section_title title_color="#ffffff" h_tag="H2" h_size="custom" h_weight="700" h_transform="uppercase" h_spacing="8px" p_weight="normal" title="Digital strategy" h_size_custom="14px"][brankic_divider style="divider blank" margin="25px auto"][vc_column_text]Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Etiam eget mi enim, non ultricies nisi voluptatem.[/vc_column_text][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );		
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Progress Bar - Thin', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 21; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_bar'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row use_gradient_bg="true" row_gradient_direction="to right" css=".vc_custom_1524074950280{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column width="1/4"][brankic_section_title size="medium" uppercase="true" title="Our Skills"][/vc_column][vc_column width="3/4"][brankic_progress_bars_wrapper][brankic_progress_bar value="89" bar_color="#7fd799" bar_color_2="#44aad4" caption="Interface Design"][brankic_progress_bar value="97" bar_color="#7fd799" bar_color_2="#44aad4" caption="WordPress"][brankic_progress_bar value="56" bar_color="#7fd799" bar_color_2="#44aad4" caption="Branding Identity"][brankic_progress_bar value="65" bar_color="#7fd799" bar_color_2="#44aad4" caption="Web Apps"][/brankic_progress_bars_wrapper][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Progress Bar - Bold', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 22; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_bar'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
	[vc_row use_gradient_bg="true" row_gradient_direction="to right" css=".vc_custom_1524074950280{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column width="1/4"][brankic_section_title size="medium" uppercase="true" title="Our Skills"][/vc_column][vc_column width="3/4"][brankic_progress_bars_wrapper style="bold rounded"][brankic_progress_bar value="89" bar_color="#4558bc" caption="Interface Design"][brankic_progress_bar value="97" bar_color="#4558bc" caption="WordPress"][brankic_progress_bar value="56" bar_color="#4558bc" caption="Branding Identity"][brankic_progress_bar value="65" bar_color="#4558bc" caption="Web Apps"][/brankic_progress_bars_wrapper][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );

	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Progress Bar - Bolder', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 23; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_bar'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row use_gradient_bg="true" row_gradient_direction="to right" css=".vc_custom_1524074950280{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column width="1/4"][brankic_section_title size="medium" uppercase="true" title="Our Skills"][/vc_column][vc_column width="3/4"][brankic_progress_bars_wrapper style="bolder rounded"][brankic_progress_bar caption_position="inside" value="89" bar_color="#4a70e1" bar_color_2="#e302bf" caption="Interface Design"][brankic_progress_bar caption_position="inside" value="97" bar_color="#4a70e1" bar_color_2="#e302bf" caption="WordPress"][brankic_progress_bar caption_position="inside" value="56" bar_color="#4a70e1" bar_color_2="#e302bf" caption="Branding Identity"][brankic_progress_bar caption_position="inside" value="65" bar_color="#4a70e1" bar_color_2="#e302bf" caption="Web Apps"][/brankic_progress_bars_wrapper][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Tabs - Dotted', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 31; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_tabs'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row row_content_width="row-content-1000" use_gradient_bg="true" row_gradient_direction="to right" css=".vc_custom_1524083528808{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column brankic_centered="true"][brankic_tabs_wrapper style="dotted" centered_captions="true" animation="true" icon_color="#ebb0a2" tab_text_color="#3f51b5"][brankic_tab type="linea" caption="Planning" icon_linea="icon icon-basic-lightbulb"]
<h2 style="text-align: center;"><span class="google_web_font_3" style="color: #3f51b5;">A goal without a plan is just a wish.</span></h2>
<p style="text-align: center;"><span style="color: #3f51b5;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque consectetur adipiscing elit.</span></p>
<p style="text-align: center;"><span style="color: #3f51b5;">Etiam feugiat nunc ut nibh interdum tempus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seded ut perspiciatis unde natus.</span></p>
[/brankic_tab][brankic_tab type="linea" caption="Design" icon_linea="icon icon-basic-pencil-ruler"]
<h2 style="text-align: center;"><span class="google_web_font_3" style="color: #3f51b5;">Simplicity is the ultimate sophistication.</span></h2>
<p style="text-align: center;"><span style="color: #3f51b5;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque consectetur adipiscing elit.</span></p>
<p style="text-align: center;"><span style="color: #3f51b5;">Etiam feugiat nunc ut nibh interdum tempus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seded ut perspiciatis unde natus.</span></p>
[/brankic_tab][brankic_tab type="linea" caption="Developing" icon_linea="icon icon-basic-gear"]
<h2 style="text-align: center;"><span class="google_web_font_3" style="color: #3f51b5;">We aim beyond what we are capable of.</span></h2>
<p style="text-align: center;"><span style="color: #3f51b5;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque consectetur adipiscing elit.</span></p>
<p style="text-align: center;"><span style="color: #3f51b5;">Etiam feugiat nunc ut nibh interdum tempus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seded ut perspiciatis unde natus.</span></p>
[/brankic_tab][brankic_tab type="linea" caption="Happy End" icon_linea="icon icon-basic-heart"]
<h2 style="text-align: center;"><span class="google_web_font_3" style="color: #3f51b5;">On Your Mark, Get Set, Go!</span></h2>
<p style="text-align: center;"><span style="color: #3f51b5;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque consectetur adipiscing elit.</span></p>
<p style="text-align: center;"><span style="color: #3f51b5;">Etiam feugiat nunc ut nibh interdum tempus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seded ut perspiciatis unde natus.</span></p>
[/brankic_tab][/brankic_tabs_wrapper][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Tabs - Minimal', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 32; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_tabs'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
	[vc_row row_content_width="row-content-1000"][vc_column css=".vc_custom_1524095508690{padding-top: 150px !important;padding-bottom: 150px !important;}"][brankic_tabs_wrapper style="minimal" animation="true" tab_text_color="#00e3c6"][brankic_tab caption="Planning"]
<h2><strong><span class="google_web_font_3" style="color: #212121;">A goal without </span></strong><em><span class="google_web_font_3" style="color: #212121;">a plan</span></em><strong><span class="google_web_font_3" style="color: #212121;"> is just a wish.</span></strong></h2>
&nbsp;

<span style="color: #999;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque consectetur adipiscing elit.</span>

<span style="color: #999;">Etiam feugiat nunc ut nibh interdum tempus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seded ut perspiciatis unde natus.</span>

[/brankic_tab][brankic_tab caption="Design"]
<h2><strong><span class="google_web_font_3" style="color: #212121;">Simplicity is the ultimate </span></strong><em><span class="google_web_font_3" style="color: #212121;">sophistication.</span></em></h2>
&nbsp;

<span style="color: #999;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque consectetur adipiscing elit.</span>

<span style="color: #999;">Etiam feugiat nunc ut nibh interdum tempus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seded ut perspiciatis unde natus.</span>

[/brankic_tab][brankic_tab caption="Developing"]
<h2><strong><span class="google_web_font_3" style="color: #212121;">We aim </span></strong><em><span class="google_web_font_3" style="color: #212121;">beyond</span></em><strong><span class="google_web_font_3" style="color: #212121;"> what we are capable of.</span></strong></h2>
&nbsp;

<span style="color: #999;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque consectetur adipiscing elit.</span>

<span style="color: #999;">Etiam feugiat nunc ut nibh interdum tempus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seded ut perspiciatis unde natus.</span>

[/brankic_tab][brankic_tab caption="Happy End"]
<h2><strong><span class="google_web_font_3" style="color: #212121;">On Your Mark, Get Set, </span></strong><em><span class="google_web_font_3" style="color: #212121;">Go!</span></em></h2>
&nbsp;

<span style="color: #999;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque consectetur adipiscing elit.</span>

<span style="color: #999;">Etiam feugiat nunc ut nibh interdum tempus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Seded ut perspiciatis unde natus.</span>

[/brankic_tab][/brankic_tabs_wrapper][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Team Members - Overlay Figcaption', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 41; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_team'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row_content" gap="35" css=".vc_custom_1524182983758{padding-top: 17.5px !important;padding-right: 17.5px !important;padding-left: 17.5px !important;}"][vc_column width="1/3"][brankic_team_member style="overlay-figcaption" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="#581deb" name_position_bg_color_2="#e302bf" border_radius="4px" shadow_color="" image_src="7982" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-13.jpg" name="John Doe" position="Founder / Art Director"]lorem ipsum[/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-figcaption" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="#581deb" name_position_bg_color_2="#e302bf" border_radius="4px" shadow_color="" image_src="7974" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-5.jpg" name="Jane Doe" position="Graphic Designer"]lorem ipsum[/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-figcaption" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="#581deb" name_position_bg_color_2="#e302bf" border_radius="4px" shadow_color="" image_src="7977" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-8.jpg" name="Brett Donehue" position="Project Manager"]lorem ipsum[/brankic_team_member][/vc_column][/vc_row][vc_row full_width="stretch_row_content" gap="35" css=".vc_custom_1524182971748{padding-right: 17.5px !important;padding-bottom: 17.5px !important;padding-left: 17.5px !important;}"][vc_column width="1/3"][brankic_team_member style="overlay-figcaption" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="#581deb" name_position_bg_color_2="#e302bf" border_radius="4px" shadow_color="" image_src="7972" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-3.jpg" name="Anne White" position="Web Designer"]lorem ipsum[/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-figcaption" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="#581deb" name_position_bg_color_2="#e302bf" border_radius="4px" shadow_color="" image_src="7970" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-1.jpg" name="Andrew Johnson" position="Senior Developer"]lorem ipsum[/brankic_team_member][/vc_column][vc_column width="1/3"][/vc_column][/vc_row]	
CONTENT;
  
    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Team Members - Overlay Figcaption Transparent', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 42; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_team'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Team-Members-Overlay-Figcaption-Transparent.jpg" ); 	
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" equal_height="yes" content_placement="bottom" gap="35" css=".vc_custom_1527433659851{padding-top: 100px !important;padding-bottom: 200px !important;background-color: #f8f8f8 !important;}"][vc_column width="1/2"][vc_column_text]
<h3><span class="google_web_font_4">Meet the team.</span></h3>
[/vc_column_text][brankic_divider style="divider blank" margin="15px auto"][vc_column_text]<span style="color: #999999;">Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.</span>[/vc_column_text][/vc_column][vc_column width="1/2" content_align="text-align-right"][brankic_button button_text="Become a member" shape="radius" text_color="#ffffff" bg_color="#4aeab2" bg_hover_color="" border_color="" border_hover_color="" shadow_hover_color="rgba(0,0,0,0.21)" hover_movement="up"][/vc_column][/vc_row][vc_row full_width="stretch_row" gap="35" css=".vc_custom_1524570184426{margin-top: -130px !important;}"][vc_column width="1/3"][brankic_team_member style="overlay-figcaption transparent" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="rgba(0,0,0,0.6)" border_radius="4px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" icon_color="#ffcc99" shadow_color="" image_src="7982" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-13.jpg" name="John Doe" position="Founder / Art Director"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-figcaption transparent" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="rgba(0,0,0,0.6)" border_radius="4px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" icon_color="#ffcc99" shadow_color="" image_src="7974" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-5.jpg" name="Jane Doe" position="Graphic Designer"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-figcaption transparent" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="rgba(0,0,0,0.6)" border_radius="4px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" icon_color="#ffcc99" shape="" icon_style="" hover="" bg_hover_color="" icon_hover_color="" shadow_color="" image_src="7977" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-8.jpg" name="Brett Donehue" position="Project Manager"][/brankic_team_member][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" gap="35" css=".vc_custom_1524571094858{padding-bottom: 100px !important;}"][vc_column width="1/3"][brankic_team_member style="overlay-figcaption transparent" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="rgba(0,0,0,0.6)" border_radius="4px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" icon_color="#ffcc99" shadow_color="" image_src="7972" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-3.jpg" name="Anne White" position="Web Designer"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-figcaption transparent" name_color="#ffffff" position_color="#ffffff" name_position_bg_color="rgba(0,0,0,0.6)" border_radius="4px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" icon_color="#ffcc99" shadow_color="" image_src="7970" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-1.jpg" name="Andrew Johnson" position="Senior Developer"][/brankic_team_member][/vc_column][vc_column width="1/3"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Team Members - Default Overlay', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 43; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_team'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Team-Members-Default-Overlay.jpg" ); 
    $data['content']    = <<<CONTENT
    [vc_row css=".vc_custom_1524585575522{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column width="1/2" brankic_centered="true" content_align="text-align-center"][vc_column_text]
<h3><span style="color: #16315c;">Meet the team.</span></h3>
[/vc_column_text][brankic_divider style="divider blank" margin="15px auto"][vc_column_text]<span style="color: #9faec7;">A key to achieving success is to assemble a strong and stable management team. It takes a lot of people to make a winning team. Everybody's contribution is important.</span>[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content" gap="2" css=".vc_custom_1524585505424{padding-right: 2px !important;padding-left: 2px !important;}"][vc_column width="1/4"][brankic_team_member style="default overlay" name_color="#16315c" position_color="#9faec7" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone single-color effect-9" border_radius="2px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7973" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-4.jpg" name="John Doe" position="Founder / Art Director"][/brankic_team_member][/vc_column][vc_column width="1/4"][brankic_team_member style="default overlay" name_color="#16315c" position_color="#9faec7" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone single-color effect-9" border_radius="2px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7971" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-2.jpg" name="Jane Doe" position="Graphic Designer"][/brankic_team_member][/vc_column][vc_column width="1/4"][brankic_team_member style="default overlay" name_color="#16315c" position_color="#9faec7" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone single-color effect-9" border_radius="2px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shape="" icon_style="" hover="" bg_hover_color="" icon_hover_color="" shadow_color="" image_src="7983" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-14.jpg" name="Brett Donehue" position="Project Manager"][/brankic_team_member][/vc_column][vc_column width="1/4"][brankic_team_member style="default overlay" name_color="#16315c" position_color="#9faec7" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone single-color effect-9" border_radius="2px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7984" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-15.jpg" name="Anne White" position="Web Designer"][/brankic_team_member][/vc_column][/vc_row][vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" gap="2" css=".vc_custom_1524585515178{padding-right: 2px !important;padding-left: 2px !important;}"][vc_column width="1/4"][brankic_team_member style="default overlay" name_color="#16315c" position_color="#9faec7" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone single-color effect-9" border_radius="2px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7975" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-6.jpg" name="Andrew Johnson" position="Senior Developer"][/brankic_team_member][/vc_column][vc_column width="1/4"][brankic_team_member style="default overlay" name_color="#16315c" position_color="#9faec7" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone single-color effect-9" border_radius="2px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7980" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-11.jpg" name="Mark Stevens" position="Junior Developer"][/brankic_team_member][/vc_column][vc_column width="1/4"][brankic_team_member style="default overlay" name_color="#16315c" position_color="#9faec7" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone single-color effect-9" border_radius="2px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7985" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-16.jpg" name="Kristen Miller" position="Account Manager"][/brankic_team_member][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]	
CONTENT;
  
    vc_add_default_templates( $data );	
	
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Team Members - Overlay Hidden', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 44; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_team'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row css=".vc_custom_1524598794810{padding-top: 100px !important;}"][vc_column css=".vc_custom_1524600587120{padding-top: 30px !important;}"][brankic_divider color="#edd9b0" align="left" icon_color="#744490" text_icon_position="left" size="" border_width="3" divider_text="The Team"][/vc_column][/vc_row][vc_row full_width="stretch_row" gap="35" css=".vc_custom_1524593277210{padding-top: 17.5px !important;}"][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" shadow="true" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7971" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-2.jpg" name="Jane Doe" position="Graphic Designer"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shape="" icon_style="" hover="" bg_hover_color="" icon_hover_color="" shadow_color="" image_src="7983" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-14.jpg" name="Brett Donehue" position="Project Manager"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7984" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-15.jpg" name="Anne White" position="Web Designer"][/brankic_team_member][/vc_column][/vc_row][vc_row full_width="stretch_row" gap="35" equal_height="yes" content_placement="middle" css=".vc_custom_1524593301958{padding-bottom: 17.5px !important;}"][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7975" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-6.jpg" name="Andrew Johnson" position="Senior Developer"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7980" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-11.jpg" name="Mark Stevens" position="Junior Developer"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7985" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-16.jpg" name="Kristen Miller" position="Account Manager"][/brankic_team_member][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );	


/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Team Members - Overlay Figcaption Hidden', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 45; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_team'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Team-Members-Overlay-Figcaption-Hidden.jpg" ); 
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" gap="35" row_bg_align="brankic_bg_bottom" row_bg_color_1="rgba(14,221,167,0.87)" css=".vc_custom_1527460267225{padding-top: 100px !important;padding-bottom: 300px !important;}" row_brankic_bg_image="8929" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/77.jpg"][vc_column width="1/4"][/vc_column][vc_column width="7/12" column_bg_size="auto" column_content_color="#ffffff"][vc_column_text highlight_background_color_1="#000000"]
<h2><span class="uppercase">Style is a <span style="color: #4f2177;">reflection</span>
of your attitude</span></h2>
[/vc_column_text][/vc_column][vc_column width="1/3" content_align="text-align-right" column_content_color="#ffffff"][brankic_section_title h_tag="H2" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="1px" small_title_color="#ffffff" small_title="Our team" p_size_custom="13px"][/vc_column][vc_column width="2/3" column_content_color="#ffffff"][vc_column_text]
<h4>If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges.</h4>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" gap="35" css=".vc_custom_1527458339214{margin-top: -250px !important;}"][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" shadow="true" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7971" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-2.jpg" name="Jane Doe" position="Graphic Designer"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shape="" icon_style="" hover="" bg_hover_color="" icon_hover_color="" shadow_color="" image_src="7983" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-14.jpg" name="Brett Donehue" position="Project Manager"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7984" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-15.jpg" name="Anne White" position="Web Designer"][/brankic_team_member][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" gap="35" css=".vc_custom_1524593301958{padding-bottom: 17.5px !important;}"][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7975" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-6.jpg" name="Andrew Johnson" position="Senior Developer"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7980" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-11.jpg" name="Mark Stevens" position="Junior Developer"][/brankic_team_member][/vc_column][vc_column width="1/3"][brankic_team_member style="overlay-hidden" position_color="rgba(0,0,0,0.35)" name_position_bg_color="rgba(255,255,255,0.8)" duotone="duotone multi-color effect-8" border_radius="8px" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" shadow_color="" image_src="7985" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-16.jpg" name="Kristen Miller" position="Account Manager"][/brankic_team_member][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Team Members - Outset Figcaption - Carousel', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 46; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_team'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Team-Members-Outset-Figcaption-Carousel.jpg" ); 
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" gap="40" row_bg_size="auto" row_bg_color_1="#8e9eab" use_gradient_bg="true" row_gradient_direction="to right" row_bg_color_2="#e7edef" css=".vc_custom_1528669621931{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2" brankic_column_inner_height="height-15" content_align="text-align-center" column_inner_content_color="#ffffff"][vc_column_text]
<h3>Wonderful things <strong>can be</strong> achieved</h3>
[/vc_column_text][brankic_divider style="divider blank" margin="15px auto"][vc_column_text]Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/vc_column_text][brankic_divider orientation="vertical" color="#ffffff" border_width="1px"][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][brankic_carousel carousel_content="team_members" emphasize_size="true" gap="" carousel_navigation="arrows_side" carousel_navigation_color="light"][brankic_team_member style="overlay-outset" name_color="#ffffff" position_color="#523359" duotone="duotone single-color effect-5" border_radius="7px" shadow="true" social="true" social_url="facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979" icon_color="#523359" image_src="7974" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-5.jpg" name="Jane Doe" position="Graphic designer"][/brankic_team_member][brankic_team_member style="overlay-outset" name_color="#ffffff" position_color="#523359" duotone="duotone single-color effect-5" border_radius="7px" shadow="true" icon_color="#523359" image_src="7977" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-8.jpg" name="Brett Donehue" position="Project Manager"][/brankic_team_member][brankic_team_member style="overlay-outset" name_color="#ffffff" position_color="#523359" duotone="duotone single-color effect-5" border_radius="7px" shadow="true" icon_color="#523359" image_src="7970" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-1.jpg" name="Andrew Johnson" position="Senior developer"][/brankic_team_member][brankic_team_member style="overlay-outset" name_color="#ffffff" position_color="#523359" duotone="duotone single-color effect-5" border_radius="7px" shadow="true" icon_color="#523359" image_src="7975" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-6.jpg" name="Kevin Lenard" position="The Boss"][/brankic_team_member][brankic_team_member style="overlay-outset" name_color="#ffffff" position_color="#523359" duotone="duotone single-color effect-5" border_radius="7px" shadow="true" icon_color="#523359" image_src="7978" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-9.jpg" name="Ann White" position="Web designer"][/brankic_team_member][brankic_team_member style="overlay-outset" name_color="#ffffff" position_color="#523359" duotone="duotone single-color effect-5" border_radius="7px" shadow="true" icon_color="#523359" image_src="7982" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-13.jpg" name="John Doe" position="Founder / Art Director"][/brankic_team_member][/brankic_carousel][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Team Members - Dark Minimal Version', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 47; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_team'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Team-Members-Dark-Minimal-Version.jpg" ); 
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" css_animation="fadeInUp" gap="100" row_bg_color_1="#000000" css=".vc_custom_1532517836040{padding-bottom: 70px !important;}"][vc_column width="1/2" content_align="text-align-center"][vc_row_inner gap="100" row_inner_bg_repeat="repeat"][vc_column_inner][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" border_radius="4px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #" icon_color="#ffffff" image_src="9700" image_src_extra="https://demo.brankic.net/myriad04/wp-content/uploads/2018/07/tm-1.jpg" name="John Doe" position="Founder / Art Director"][/brankic_team_member][/vc_column_inner][vc_column_inner][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" border_radius="4px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #, linkedin, #" icon_color="#ffffff" image_src="9702" image_src_extra="https://demo.brankic.net/myriad04/wp-content/uploads/2018/07/tm-3.jpg" name="Rachel White" position="Creative Director"][/brankic_team_member][/vc_column_inner][vc_column_inner][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" border_radius="4px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #, github, #, linkedin, #" icon_color="#ffffff" image_src="9704" image_src_extra="https://demo.brankic.net/myriad04/wp-content/uploads/2018/07/tm-5.jpg" name="Mark Stevens" position="Senior Developer"][/brankic_team_member][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" content_align="text-align-center"][vc_row_inner gap="100" row_inner_bg_repeat="repeat"][vc_column_inner][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" border_radius="4px" shadow="true" social="true" social_url="linkedin, #, pinterest, #, twitter, #, instagram, #" icon_color="#ffffff" image_src="9779" image_src_extra="https://demo.brankic.net/myriad04/wp-content/uploads/2018/07/tm-4.jpg" name="Anne Moore" position="Project Manager"][/brankic_team_member][/vc_column_inner][vc_column_inner][brankic_team_member style="overlay-outset" name_color="#ff2d57" position_color="#ffffff" border_radius="4px" shadow="true" social="true" social_url="dribbble, #, facebook, #, twitter, http://, instagram, #" icon_color="#ffffff" image_src="9701" image_src_extra="https://demo.brankic.net/myriad04/wp-content/uploads/2018/07/tm-2.jpg" name="Andrew Johnson" position="Graphic Designer"][/brankic_team_member][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Team Members - Fullwidth Carousel + Counters', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 48; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_team'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Team-Members-Fullwidth-Carousel-Counters.jpg" ); 
    $data['content']    = <<<CONTENT
    [vc_row row_bg_size="auto" css=".vc_custom_1532473751718{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column width="1/4" column_bg_size="auto"][/vc_column][vc_column width="1/2" content_align="text-align-center"][brankic_section_title h_tag="H4" p_size="custom" p_transform="uppercase" p_spacing="2px" small_title_color="#888888" small_title="Our values" p_size_custom="12px"]A positive attitude causes a chain
reaction of positive thoughts[/brankic_section_title][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][vc_row gap="35" row_bg_size="auto" css=".vc_custom_1527113103186{padding-bottom: 100px !important;}"][vc_column width="1/4" content_align="text-align-center" column_bg_size="auto"][brankic_counter icon_color="" caption_color="" counter_color="#fb857a" counter_size="large" caption="Cups of Coffee" to="64"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter type="linea" icon_color="" caption_color="" counter_color="#fb857a" counter_size="large" caption="Finished Projects" to="72"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter icon_color="" caption_color="" counter_color="#fb857a" counter_size="large" caption="Community Members" to="33"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter icon_color="" caption_color="" counter_color="#fb857a" counter_size="large" caption="Miles Coverd" to="971"][/vc_column][/vc_row][vc_row full_width="stretch_row_content" row_bg_size="auto" css=".vc_custom_1532531605112{padding-bottom: 170px !important;}"][vc_column][brankic_carousel carousel_content="team_members" show_comments="" show_date="" slides_per_view="4" centered="true" emphasize_opacity="true" gap="40" carousel_navigation="arrows_side" carousel_navigation_color="light"][brankic_team_member style="overlay-figcaption transparent" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-5.jpg" name_color="#ffffff" position_color="#ffffff" border_radius="5px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #, linkedin, #" icon_color="#ffffff" image_src="7974" name="Jane Doe" position="Graphic designer"][/brankic_team_member][brankic_team_member style="overlay-figcaption transparent" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-8.jpg" name_color="#ffffff" position_color="#ffffff" border_radius="5px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #, linkedin, #" icon_color="#ffffff" image_src="7977" name="Brett Donehue" position="Project Manager"][/brankic_team_member][brankic_team_member style="overlay-figcaption transparent" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-1.jpg" name_color="#ffffff" position_color="#ffffff" border_radius="5px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #, linkedin, #" icon_color="#ffffff" image_src="7970" name="Andrew Johnson" position="Senior developer"][/brankic_team_member][brankic_team_member style="overlay-figcaption transparent" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-6.jpg" name_color="#ffffff" position_color="#ffffff" border_radius="5px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #, linkedin, #" icon_color="#ffffff" image_src="7975" name="Kevin Lenard" position="The Boss"][/brankic_team_member][brankic_team_member style="overlay-figcaption transparent" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-9.jpg" name_color="#ffffff" position_color="#ffffff" border_radius="5px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #, linkedin, #" icon_color="#ffffff" image_src="7978" name="Ann White" position="Web designer"][/brankic_team_member][brankic_team_member style="overlay-figcaption transparent" image_src_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-13.jpg" name_color="#ffffff" position_color="#ffffff" border_radius="5px" shadow="true" social="true" social_url="facebook, #, twitter, #, instagram, #, linkedin, #" icon_color="#ffffff" image_src="7982" name="John Doe" position="Founder / Art Director"][/brankic_team_member][/brankic_carousel][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );

	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Process Steps - Horizontal', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 51; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_proccess'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" css=".vc_custom_1524432405476{padding-top: 100px !important;padding-bottom: 100px !important;background-color: rgba(255,255,255,0.95) !important;*background-color: rgb(255,255,255) !important;}"][vc_column width="5/12" brankic_centered="true" content_align="text-align-center" css=".vc_custom_1524348437372{padding-bottom: 50px !important;}"][vc_column_text]
<h3><span style="color: #f2af9f;">Step by Step</span></h3>
<span style="color: #3f51b5;">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</span>[/vc_column_text][/vc_column][vc_column][brankic_steps_wrapper border_color="#d8dcf0" heading_color="#3f51b5" content_color="#939ed4" bg_color=""][brankic_step caption="Planning"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_step][brankic_step caption="Design"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_step][brankic_step caption="Developing"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_step][brankic_step caption="Happy End"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_step][/brankic_steps_wrapper][/vc_column][vc_column brankic_centered="true" content_align="text-align-center" css=".vc_custom_1524348380734{padding-top: 50px !important;}"][brankic_button button_text="Learn More" text_color="#ffffff" bg_color="#f1b4a6" bg_hover_color="" border_color="" border_hover_color="" shadow_hover_color="rgba(0,0,0,0.17)" hover_movement="up"][/vc_column][/vc_row]	
CONTENT;
  
    vc_add_default_templates( $data );
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Process Steps - Vertical', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 52; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_proccess'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row gap="35" equal_height="yes" content_placement="middle" css=".vc_custom_1524432598938{padding-top: 100px !important;padding-bottom: 100px !important;background-color: rgba(255,255,255,0.95) !important;*background-color: rgb(255,255,255) !important;}"][vc_column width="1/2"][brankic_steps_wrapper orientation="vertical" border_color="#f7d9d2" heading_color="#f1b4a6" content_color="#f7d9d2" bg_color=""][brankic_step caption="Planning"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_step][brankic_step caption="Design"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_step][brankic_step caption="Developing"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_step][brankic_step caption="Happy End"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_step][/brankic_steps_wrapper][/vc_column][vc_column width="5/12" content_align="text-align-right"][brankic_image shadow_color="rgba(0,0,0,0.21)" border_radius="14px" image="7978" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-9.jpg"][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Accordion - Bg Color Overlay', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 61; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_acc'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Accordion-Bg-Color-Overlay.jpg" ); 
    $data['content']    = <<<CONTENT
    [vc_row gap="35" equal_height="yes" content_placement="middle"][vc_column width="1/2"][vc_column_text css=".vc_custom_1524431548136{padding-bottom: 50px !important;}"] <h3><strong>Customer satisfaction is worthless. Customers loyalty is</strong> <span class="google_web_font_3"><em>priceless</em>.</span></h3> [/vc_column_text][brankic_button button_text="Learn More" hover="dir-btt" text_hover_color="#ffffff" hover_movement="up"][/vc_column][vc_column width="1/2" css=".vc_custom_1524355685658{padding-top: 100px !important;padding-bottom: 100px !important;}"][brankic_accordion_wrapper style="accordion_2" active_section="1" text_color="#cdb6e3" caption_color="#cdb6e3" active_caption_color="#ffffff" bg_color="#2a0aa9" bg_color_2="#7c139d" bg_gradient_angle="45"][brankic_accordion caption_color="#ffffff" caption="Search Engine Optimization"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Top Notch Support"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Design and Branding"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="eCommerce"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][/brankic_accordion_wrapper][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Accordion - With Gap', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 62; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_acc'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row gap="35" equal_height="yes" content_placement="middle"][vc_column width="1/2"][vc_column_text css=".vc_custom_1524431548136{padding-bottom: 50px !important;}"] <h3><strong>Customer satisfaction is worthless. Customers loyalty is</strong> <span class="google_web_font_3"><em>priceless</em>.</span></h3> [/vc_column_text][brankic_button button_text="Learn More" hover="dir-btt" text_hover_color="#ffffff" hover_movement="up"][/vc_column][vc_column width="1/2" css=".vc_custom_1524355685658{padding-top: 100px !important;padding-bottom: 100px !important;}"][brankic_accordion_wrapper style="accordion_3" active_section="1" caption_color="#000000" active_caption_color="#ffffff" bg_color="#f8f8f8" active_bg_color="#3f51b5" bg_gradient_angle="45"][brankic_accordion caption_color="#ffffff" caption="Search Engine Optimization"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Top Notch Support"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Design and Branding"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="eCommerce"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][/brankic_accordion_wrapper][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );
	
	

	
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Accordion - Minimal', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 63; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_acc'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" ); 
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" css=".vc_custom_1524519625646{background-color: #f1b4a6 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/2" css=".vc_custom_1524567761922{padding-top: 70px !important;padding-right: 40px !important;padding-bottom: 70px !important;padding-left: 40px !important;background-color: #ffffff !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_row_inner][vc_column_inner width="7/12" centered="true"][brankic_reveal height="" color="#f1b4a6"] <h2>We create</h2> [/brankic_reveal][brankic_reveal height="" color="#f1beb3" delay="400"] <h2>beautiful <span class="google_web_font_3"><em>websites</em></span></h2> [/brankic_reveal][brankic_reveal height="" color="#f1c9c1" delay="450"] <h2>and <span class="google_web_font_3"><em>brand</em></span> identity.</h2> [/brankic_reveal][/vc_column_inner][vc_column_inner width="1/2" centered="true" css=".vc_custom_1524581480576{margin-top: 30px !important;}"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. [/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" centered="true" css=".vc_custom_1524582529326{padding-top: 30px !important;}"][brankic_button button_text="Learn more" size="large" shape="radius" text_color="#ffffff" bg_color="#121212" bg_hover_color="" border_color="" border_hover_color="" shadow_color="rgba(241,180,166,0.59)" hover_movement="down"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/3" brankic_centered="true" css=".vc_custom_1524519649192{padding-top: 100px !important;padding-right: 40px !important;padding-bottom: 100px !important;padding-left: 40px !important;}"][vc_column_text css=".vc_custom_1524582854878{padding-bottom: 50px !important;}"] <h3><span style="color: #c57968;"><strong>Customers loyalty is</strong> <span class="google_web_font_3"><em>our goal</em>.</span></span></h3> [/vc_column_text][brankic_accordion_wrapper active_section="1" text_color="rgba(255,255,255,0.9)" caption_color="rgba(255,255,255,0.7)" active_caption_color="#ffffff" bg_gradient_angle="45"][brankic_accordion caption_color="#ffffff" caption="Search Engine Optimization"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Top Notch Support"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Design and Branding"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="eCommerce"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][/brankic_accordion_wrapper][/vc_column][/vc_row]    
CONTENT;
  
    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Accordion - Minimal / Gradient Title', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 64; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_acc'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Accordion-Minimal-Gradient-Title.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row gap="80" css=".vc_custom_1527336483912{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column width="1/2"][brankic_section_title title_color="#009fff" title_color_2="#ec2f4b" h_tag="H2" h_size="40px" h_weight="700" h_height="1.2" title="Work hard and don’t give up hope. Be open to criticism."][brankic_divider style="divider blank"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#009fff" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#bbbbbb" icon_linea="icon icon-basic-spades" heading="Development"]A positive attitude causes a chain reaction of positive thoughts, events and outcomes. It is a catalyst and it sparks extraordinary results.[/brankic_icon][brankic_divider style="divider blank"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#009fff" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#bbbbbb" icon_linea="icon icon-software-layers2" heading="Digital Strategy"]A positive attitude causes a chain reaction of positive thoughts, events and outcomes. It is a catalyst and it sparks extraordinary results.[/brankic_icon][/vc_column][vc_column width="1/2"][brankic_accordion_wrapper style="accordion_2" active_section="1" caption_color="#bbbbbb" active_caption_color="#000000" bg_color="#ffffff" bg_gradient_angle="45"][brankic_accordion caption_color="#ffffff" caption="Search Engine Optimization"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong>
Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Top Notch Support"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong>
Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Design and Branding"]<strong>Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</strong>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="eCommerce"]<strong>Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.</strong>
Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.[/brankic_accordion][/brankic_accordion_wrapper][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Accordion - Gradient Bg Overlay', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 65; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_acc'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Accordion-Gradient-Bg-Overlay.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row equal_height="yes" content_placement="middle" gap="100"][vc_column width="1/2"][vc_column_text css=".vc_custom_1524431548136{padding-bottom: 50px !important;}"]
<h3><strong>Customer satisfaction is worthless. Customers loyalty is</strong> <span class="google_web_font_3"><em>priceless</em>.</span></h3>
[/vc_column_text][brankic_button button_text="Learn More" hover="dir-btt" text_hover_color="#ffffff" hover_movement="up"][/vc_column][vc_column width="1/2" css=".vc_custom_1524355685658{padding-top: 100px !important;padding-bottom: 100px !important;}"][brankic_accordion_wrapper style="accordion_2" active_section="1" text_color="#cdb6e3" caption_color="#cdb6e3" active_caption_color="#ffffff" bg_color="#2a0aa9" bg_color_2="#7c139d" bg_gradient_angle="45"][brankic_accordion caption_color="#ffffff" caption="Search Engine Optimization"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Top Notch Support"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="Design and Branding"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][brankic_accordion caption="eCommerce"]<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat nunc ut nibh interdum tempus.</strong> Seded ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu.[/brankic_accordion][/brankic_accordion_wrapper][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );		
	
	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Hero 1', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 81; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_hero'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Hero1.jpg" ); //Thumbnail should have this dimensions: 114x154px
    $data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" full_height="yes" content_placement="middle" row_bg_color_1="rgba(0,0,0,0.35)" row_brankic_bg_image="9507" row_brankic_bg_image_extra="https://demo.brankic.net/myriad04/wp-content/uploads/2018/07/112.jpg"][vc_column width="1/4" brankic_centered="true" content_align="text-align-center" column_content_color="rgba(255,255,255,0.5)" css=".vc_custom_1532207305897{padding-top: 70px !important;padding-bottom: 70px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][/vc_column][vc_column width="1/2" content_align="text-align-center" column_content_color="rgba(255,255,255,0.6)"][brankic_section_title title_color="#ffffff" p_size="custom" p_transform="uppercase" p_spacing="2px" small_title_color="#ffffff" title="Always deliver more than expected." small_title="Our main goal" p_size_custom="12px"]Always deliver
more than expected[/brankic_section_title][brankic_divider style="divider blank" margin="30px auto"][brankic_button button_text="Get started" text_color="#ffffff" bg_color="#7e5aff" bg_hover_color="" border_color="" border_hover_color="" shadow_color="rgba(0,0,0,0.21)" hover_movement="down"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );	
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Hero 2', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 82; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_hero'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Hero2.jpg" );
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" gap="35" equal_height="yes" content_placement="bottom" css=".vc_custom_1525860032046{padding-top: 70px !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column width="1/2" css=".vc_custom_1524752293812{padding-bottom: 70px !important;}"][vc_column_text highlight_background_color_1="#d8e6eb"]
<h1><span style="color: #1c1e59;">Don't be afraid <span class="highlight underline-through"><strong>to give</strong></span> up the good to go for <span class="highlight underline-through"><strong>the great.</strong></span></span></h1>
&nbsp;

<span style="color: #9db0b7;">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</span>[/vc_column_text][/vc_column][vc_column width="5/12" css=".vc_custom_1525818897188{margin-bottom: -170px !important;}"][brankic_image shadow_color="rgba(0,0,0,0.2)" border_radius="9px" image="8556" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/63.jpg"][/vc_column][/vc_row][vc_row full_width="stretch_row" gap="35" equal_height="yes" css=".vc_custom_1525860160972{padding-top: 250px !important;padding-bottom: 70px !important;background-color: #f3fbfe !important;}"][vc_column width="1/2" brankic_centered="true" content_align="text-align-center"][brankic_section_title title_color="#1c1e59" h_tag="H3" h_size="custom" h_weight="normal" p_size="custom" p_weight="normal" p_transform="uppercase" p_spacing="6px" small_title_color="#9db0b7" title="Follow us on a journey" small_title="Services" p_size_custom="11px"][brankic_divider style="divider blank" margin="15px auto"][vc_column_text highlight_background_color_1="#d8e6eb"]<span style="color: #9db0b7;">There are two types of people who will tell you that you cannot make a difference in this world: those who are afraid to try and those who are afraid you will succeed.</span>[/vc_column_text][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Hero 3', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 83; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_hero'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Hero3.jpg" );
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" full_height="yes" content_placement="middle" row_bg_align="brankic_bg_top" row_bg_color_1="rgba(0,0,0,0.15)" row_brankic_bg_image="9387" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/82.jpg"][vc_column width="1/2" column_content_color="rgba(255,255,255,0.5)" css=".vc_custom_1527974871189{padding-top: 70px !important;padding-right: 40px !important;padding-bottom: 70px !important;padding-left: 40px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][brankic_section_title title_color="#ffffff" p_size="custom" p_transform="uppercase" p_spacing="5px" small_title_color="#ffffff" title="Always deliver more than expected." small_title="Our main goal" p_size_custom="12px"][brankic_divider style="divider blank" margin="10px auto"][vc_column_text]<strong>The modern artist… is working and expressing an inner world, expressing the energy, the motion, and other inner forces. And the only way to do that is to overcome our need for invulnerability. </strong>[/vc_column_text][brankic_divider style="divider blank" margin="20px auto"][brankic_button shape="radius" text_color="#ffffff" bg_color="#63d5ef" border_color="" border_hover_color=""][/vc_column][vc_column width="1/2" brankic_centered="true" css=".vc_custom_1524519649192{padding-top: 100px !important;padding-right: 40px !important;padding-bottom: 100px !important;padding-left: 40px !important;}"][brankic_image shadow_color="rgba(0,0,0,0.25)" border_radius="9px" image="9375" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/83.jpg"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Hero 4', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 84; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_hero'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Hero4.jpg" );
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" content_placement="middle" row_bg_align="brankic_bg_bottom" row_bg_color_1="rgba(0,0,0,0.17)" row_brankic_bg_image="9282" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/81.jpg"][vc_column width="5/12" brankic_column_height="height-70" column_content_color="#ffffff"][brankic_section_title h_tag="H2" h_size="custom" h_weight="700" h_transform="uppercase" h_height="1.2" p_size="custom" title="Style is your attitude" h_size_custom="90px"][/vc_column][vc_column width="7/12" content_align="text-align-right"][brankic_button shape="button-circle play" text_color="#ffffff" bg_color="#e74d63" border_color="" border_hover_color=""][/vc_column][vc_column brankic_column_height="height-30"][brankic_divider color="rgba(255,255,255,0.1)" margin="custom" custom_margin="0 auto" border_width="1"][vc_row_inner equal_height="yes" content_placement="top" gap="80" row_inner_bg_repeat="repeat"][vc_column_inner width="1/3"][brankic_icon type="linea" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="rgba(255,255,255,0.52)" heading="Development" icon_linea="icon icon-ecommerce-graph-increase"]Remember, teamwork begins by building trust. And the only way to do that is to overcome our need for invulnerability.[/brankic_icon][/vc_column_inner][vc_column_inner width="1/3"][brankic_icon type="linea" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="rgba(255,255,255,0.52)" icon_linea="icon icon-basic-elaboration-tablet-pencil" heading="Modern Code"]The modern artist... is working and expressing an inner world, expressing the energy, the motion, and other inner forces.[/brankic_icon][/vc_column_inner][vc_column_inner width="1/3"][brankic_icon type="linea" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="rgba(255,255,255,0.52)" icon_linea="icon icon-software-layers2" heading="Digital Strategy"]Strategy is the starting point for a transformation that needs to occur and how that company must change to win.[/brankic_icon][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Hero 5', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 85; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_hero'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Hero5.jpg" );
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" bottom_row_svg_mask_shape="slope-triple" bottom_row_svg_mask_height="300px" bottom_row_svg_mask_fill_color="#ffffff" row_bg_size="auto" row_bg_color_1="rgba(212,238,242,0.79)" css=".vc_custom_1528325392990{padding-bottom: 100px !important;}"][vc_column width="1/2" css=".vc_custom_1528303746947{padding-top: 200px !important;padding-bottom: 200px !important;}"][brankic_section_title title_color="#144f6b" h_tag="H2" h_weight="900" h_transform="capitalize" h_height="custom" p_size="15px" p_weight="700" small_title_color="#144f6b" title="App design agency that run on coffee." small_title="Too much coffee? Never" h_height_custom="1.2"][brankic_divider style="divider blank" margin="5px auto"][vc_column_text css_animation="none"]Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people.[/vc_column_text][brankic_divider style="divider blank"][brankic_button shape="radius" hover="dir-btt" text_color="#144f6b" text_hover_color="#ffffff" bg_hover_color="#144f6b" border_color="" border_hover_color=""][/vc_column][vc_column width="1/2" content_align="text-align-right"][brankic_image image="9551" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/illustration3.png"][/vc_column][/vc_row][vc_row equal_height="yes" gap="15" row_bg_repeat="repeat" row_bg_size="auto" css=".vc_custom_1528304112123{margin-top: -200px !important;padding-bottom: 150px !important;}"][vc_column width="1/4"][brankic_flipbox front_bg_color="rgba(44,62,80,0.9)" front_bg_color_2="rgba(253,116,108,0.9)" back_bg_color="#ffffff" front_content_color="#ffffff" back_content_color="#245b75" back_content="Sed ut perspiciatis unde omnis iste natus error sit accusantium" horizontal_align="text-align-left" vert_align="vert-middle" border_radius="4px" shadow_color="rgba(0,0,0,0.08)" flip_direction="flip-r-2-l" box_height="height-40" front_bg_image="9429" front_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/84.jpg"]
<h5><span class="highlight underline"><strong>Graphic Design</strong></span></h5>
[/brankic_flipbox][/vc_column][vc_column width="1/4"][brankic_flipbox front_bg_color="rgba(255,95,109,0.9)" front_bg_color_2="rgba(255,195,113,0.9)" back_bg_color="#ffffff" front_content_color="#ffffff" back_content_color="#245b75" back_content="Sed ut perspiciatis unde omnis iste natus error sit accusantium" horizontal_align="text-align-left" vert_align="vert-middle" border_radius="4px" shadow_color="rgba(0,0,0,0.08)" flip_direction="flip-r-2-l" box_height="height-40" front_bg_image="8988" front_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/78.jpg"]
<h5><strong>Modern Code</strong></h5>
[/brankic_flipbox][/vc_column][vc_column width="1/4"][brankic_flipbox front_bg_color="rgba(92,37,141,0.9)" front_bg_color_2="rgba(67,137,162,0.9)" back_bg_color="#ffffff" front_content_color="#ffffff" back_content_color="#245b75" back_content="Sed ut perspiciatis unde omnis iste natus error sit accusantium" horizontal_align="text-align-left" vert_align="vert-middle" border_radius="4px" shadow_color="rgba(0,0,0,0.08)" flip_direction="flip-r-2-l" box_height="height-40" front_bg_image="8490" front_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/73.jpg"]
<h5><strong>Branding</strong></h5>
[/brankic_flipbox][/vc_column][vc_column width="1/4"][brankic_flipbox front_bg_color="rgba(126,81,161,0.9)" front_bg_color_2="rgba(140,166,219,0.9)" back_bg_color="#ffffff" front_content_color="#ffffff" back_content_color="#245b75" back_content="Sed ut perspiciatis unde omnis iste natus error sit accusantium" horizontal_align="text-align-left" vert_align="vert-middle" border_radius="4px" shadow_color="rgba(0,0,0,0.08)" flip_direction="flip-r-2-l" box_height="height-40" front_bg_image="9282" front_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/81.jpg"]
<h5><strong>App Design</strong></h5>
[/brankic_flipbox][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Hero 6', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 86; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_hero'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Hero6.jpg" );
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" full_height="yes" row_bg_align="brankic_bg_top_right" row_bg_color_1="rgba(0,0,0,0.12)" css=".vc_custom_1528462429156{padding-top: 150px !important;padding-bottom: 150px !important;}" row_brankic_bg_image="9617" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/86.jpg"][vc_column width="1/12" column_content_color="rgba(255,255,255,0.6)" css=".vc_custom_1528463888588{padding-top: 15px !important;}"][brankic_vertical horizontal_align="text-align-right"]
<h5><strong class="uppercase">App Design Agency</strong></h5>
[/brankic_vertical][/vc_column][vc_column width="7/12" column_content_color="#ffffff"][brankic_section_title title_color="#ffffff" h_size="50px" h_weight="100" h_transform="capitalize" h_height="1.2" p_size="15px" p_weight="normal" p_transform="none" p_spacing="0px" title="Great design is a layered relationship between human life and its environment."][brankic_divider style="divider blank" margin="5px auto"][vc_column_text]How well we communicate is determined not by how well we are understood.
Great design is a relationship between human and environment.[/vc_column_text][brankic_divider style="divider blank" margin="35px auto"][brankic_button shape="radius" size="small" bg_hover_color="" border_color="#ffffff" border_hover_color=""][brankic_button shape="radius" size="small" text_color="#ffffff" bg_color="" bg_hover_color="" border_color="#ffffff" border_hover_color=""][/vc_column][vc_column width="4/12"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Hero 7', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 87; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_hero'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Hero7.jpg" );
    $data['content']    = <<<CONTENT
    [vc_row full_width="stretch_row" content_placement="middle" brankic_row_height="height-100" row_bg_align="brankic_bg_bottom" css=".vc_custom_1529017122349{padding-top: 150px !important;padding-bottom: 300px !important;}" row_brankic_bg_image="9834" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/92.jpg"][vc_column width="1/4" column_content_color="#ffffff"][/vc_column][vc_column width="1/2" content_align="text-align-center"][brankic_section_title title_color="#114357" h_size="custom" h_weight="100" h_transform="capitalize" h_height="custom" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="3px" small_title_color="#747877" title="App design agency that run on coffee." small_title="Create your own" h_height_custom="1.2" h_size_custom="120px" p_size_custom="13px"]<strong>Life</strong><em>style</em>[/brankic_section_title][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" gap="90" row_bg_repeat="repeat" row_bg_size="auto" row_bg_color_1="#f4f1ea" css=".vc_custom_1529061476855{padding-bottom: 50px !important;}"][vc_column width="1/2" css=".vc_custom_1529061495620{margin-top: -150px !important;}"][brankic_image shadow_color="rgba(116,120,119,0.26)" border_radius="7px" image="9845" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/93-1.jpg"][/vc_column][vc_column width="1/2" css=".vc_custom_1528983397726{padding-bottom: 60px !important;}"][vc_row_inner][vc_column_inner width="1/6" content_align="text-align-right" column_inner_content_color="#114357" css=".vc_custom_1529065573125{padding-top: 15px !important;}"][brankic_vertical horizontal_align="text-align-right"]<small class="uppercase"><strong>Work, Travel, Save, Repeat</strong></small>[/brankic_vertical][/vc_column_inner][vc_column_inner width="5/6" column_inner_content_color="#114357"][brankic_section_title title_color="#114357" h_size="custom" h_weight="100" h_transform="capitalize" h_height="1.2" h_size_custom="45px"]<strong>Create new way</strong><em> of seeing things</em>[/brankic_section_title][brankic_divider style="divider blank" margin="15px auto"][vc_column_text]Exploring is an innate part of being human. We're all explorers when we're born. Unfortunately, it seems to get drummed out of many of us as we get older, but it's there, I think, in all of us. And for me that moment of discovery is just so thrilling, on any level, that I think anybody that's experienced it is pretty quickly addicted to it.[/vc_column_text][brankic_divider style="divider blank" margin="45px auto"][brankic_button button_text="Get Started" text_color="#ffffff" bg_color="#114357" bg_color_2="#ea615e" bg_hover_color="" border_color="" border_hover_color="" hover_movement="down"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );	


/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services - Gradient background', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 91; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Services-Gradient-Background.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" gap="35" use_gradient_bg="true" row_gradient_direction="to top right" row_bg_color_1="#221884" row_bg_color_2="#be3679" row_bg_color_3="#ffa458" css=".vc_custom_1526151809102{padding-top: 150px !important;padding-bottom: 150px !important;}"][vc_column width="7/12" column_content_color="#ffffff"][brankic_section_title h_weight="normal" p_size="custom" p_weight="normal" p_transform="uppercase" p_spacing="5px" title="Always deliver more than expected." small_title="Our main goal" p_size_custom="12px"][/vc_column][vc_column width="7/12" column_content_color="#ffffff"][vc_column_text]<strong>The real test is not whether you avoid this failure, because you won't. It's whether you let it harden or shame you into inaction, or whether you learn from it; whether you choose to persevere.</strong>[/vc_column_text][/vc_column][vc_column css=".vc_custom_1526128117350{padding-top: 40px !important;}"][/vc_column][vc_column width="1/3"][brankic_icon type="material" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="#ffffff" heading_size="h6" heading_and_text_style="i-row" heading_content_color="rgba(255,255,255,0.57)" heading="BRAND STRATEGY" icon_material="vc-material vc-material-fingerprint"] Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. [/brankic_icon][/vc_column][vc_column width="1/3"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="#ffffff" heading_size="h6" heading_and_text_style="i-row" heading_content_color="rgba(255,255,255,0.57)" heading="GRAPHIC SOLUTION" icon_linea="icon icon-software-pen"] Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. [/brankic_icon][/vc_column][vc_column width="1/3"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#ffffff" heading_and_text="true" heading_color="#ffffff" heading_size="h6" heading_and_text_style="i-row" heading_content_color="rgba(255,255,255,0.57)" heading="APP DESIGN" icon_linea="icon icon-basic-webpage-img-txt"] Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. [/brankic_icon][/vc_column][vc_column css=".vc_custom_1526154691896{margin-top: 20px !important;}"][brankic_button shape="radius" text_color="#ffffff" bg_color="" bg_hover_color="rgba(255,255,255,0.1)" border_color="rgba(255,255,255,0.1)" border_hover_color="rgba(255,255,255,0.01)"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services - Boxed style', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 92; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Services-Boxed-Style.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row gap="35" equal_height="yes" css=".vc_custom_1526124122154{padding-top: 150px !important;padding-bottom: 150px !important;}"][vc_column width="1/4" css=".vc_custom_1526069367618{padding-top: 20px !important;padding-right: 35px !important;}"][vc_column_text]
<h3>What we do</h3>
[/vc_column_text][brankic_divider width="width-10" align="left"][vc_column_text]<strong>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</strong>
<small class="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</small>[/vc_column_text][brankic_divider align="left" style="divider blank" margin="10px auto"][brankic_button size="small" shape="radius" text_hover_color="#ffffff" bg_color="" border_color="rgba(0,0,0,0.1)"][/vc_column][vc_column width="3/4"][vc_row_inner equal_height="yes" gap="35"][vc_column_inner width="1/3"][brankic_box horizontal_align="text-align-center" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_border_color="#f8f8f8" box_shadow_color="rgba(0,0,0,0.11)" type="material" icon_size="2" icon_color="#000000" icon_border_shape="circle" icon_border_width="" icon_border_color="" icon_shape_padding="30" icon_bg_color="#f8f8f8" heading_size="h5" heading_color="#000000" content_color="#999999" heading_and_text_style="i-row" box_height="" border_shape="" border_width="" border_color="" height="" heading="Graphic Design" icon_material="vc-material vc-material-fingerprint"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_box][/vc_column_inner][vc_column_inner width="1/3"][brankic_box horizontal_align="text-align-center" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_border_color="#f8f8f8" box_shadow_color="rgba(0,0,0,0.11)" type="linea" icon_size="2" icon_color="#000000" icon_border_shape="circle" icon_border_width="" icon_border_color="" icon_shape_padding="30" icon_bg_color="#f8f8f8" heading_size="h5" heading_color="#000000" content_color="#999999" heading_and_text_style="i-row" box_height="" border_shape="" border_width="" border_color="#000000" height="" heading="Branding" icon_linea="icon icon-software-pen"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_box][/vc_column_inner][vc_column_inner width="1/3"][brankic_box horizontal_align="text-align-center" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_border_color="#f8f8f8" box_shadow_color="rgba(0,0,0,0.11)" type="linea" icon_color="#000000" icon_border_shape="circle" icon_border_width="" icon_border_color="" icon_shape_padding="30" icon_bg_color="#f8f8f8" heading_size="h5" heading_color="#000000" content_color="#999999" heading_and_text_style="i-row" box_height="" border_shape="" border_width="" border_color="#000000" height="" heading="Mobile Apps" icon_linea="icon icon-basic-ipod"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque[/brankic_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services - Boxes with Bg Image and Gradient hover', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 93; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Services-Boxes-with-Bg-Image-and-Gradient-Hover.jpg" );	
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row_content" gap="15" equal_height="yes" row_bg_repeat="repeat" row_bg_size="auto" css=".vc_custom_1526329597550{padding-top: 150px !important;padding-right: 10% !important;padding-bottom: 150px !important;padding-left: 10% !important;background-color: #121212 !important;}"][vc_column width="1/4"][/vc_column][vc_column width="1/2" column_content_color="rgba(255,255,255,0.71)" css=".vc_custom_1526329616276{padding-bottom: 80px !important;}"][brankic_section_title title_color="#ff9966" title_color_2="#ff5e62" h_tag="H3" h_size="40px" h_weight="normal" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="2px" small_title_color="rgba(255,255,255,0.71)" title="Creativity is the process of having original ideas that have value. It is a process, it's not random. " small_title="Ideas to explore" p_size_custom="11px"][/vc_column][vc_column width="1/4"][/vc_column][vc_column][/vc_column][vc_column width="1/4"][brankic_box box_bg_color="rgba(0,0,0,0.65)" hover="true" box_hover_bg_color="rgba(255,153,102,0.62)" box_hover_bg_color_2="#ff5e62" horizontal_align="text-align-left" vertical_align="vert-bottom" box_border_radius="4px" box_border_width="0px" type="material" icon_size="2" icon_color="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#ffffff" content_color="rgba(255,255,255,0.71)" heading_and_text_style="i-row" box_height="height-50" border_shape="" border_width="" border_color="" height="" heading="Graphic Design" icon_material="vc-material vc-material-fingerprint" bg_image="8487" bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/70.jpg" box_url="#"]<small class="">Sed ut perspiciatis unde omnis iste natus error sit accusantium
</small>[/brankic_box][/vc_column][vc_column width="1/4"][brankic_box box_bg_color="rgba(0,0,0,0.7)" hover="true" box_hover_bg_color="rgba(255,153,102,0.62)" box_hover_bg_color_2="#ff5e62" horizontal_align="text-align-left" vertical_align="vert-bottom" box_border_radius="4px" box_border_width="0px" type="linea" icon_size="2" icon_color="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#ffffff" content_color="rgba(255,255,255,0.71)" heading_and_text_style="i-row" box_height="height-50" border_shape="" border_width="" border_color="" height="" heading="Video Production" icon_linea="icon icon-basic-video" bg_image="6641" bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/01/23.jpg" box_url="#"]<small class="">Voluptatem accusantium doloremque <small class=""> unde omnis iste</small>
</small>[/brankic_box][/vc_column][vc_column width="1/4"][brankic_box box_bg_color="rgba(0,0,0,0.68)" hover="true" box_hover_bg_color="rgba(255,153,102,0.62)" box_hover_bg_color_2="#ff5e62" horizontal_align="text-align-left" vertical_align="vert-bottom" box_border_radius="4px" box_border_width="0px" type="linea" icon_size="2" icon_color="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#ffffff" content_color="rgba(255,255,255,0.71)" heading_and_text_style="i-row" box_height="" border_shape="" border_width="" border_color="" height="" heading="Branding" icon_linea="icon icon-software-pen" bg_image="8744" bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/69.jpg" box_url="#"]<small class="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</small>[/brankic_box][/vc_column][vc_column width="1/4"][brankic_box box_bg_color="rgba(0,0,0,0.77)" hover="true" box_hover_bg_color="rgba(255,153,102,0.62)" box_hover_bg_color_2="#ff5e62" horizontal_align="text-align-left" vertical_align="vert-bottom" box_border_radius="4px" box_border_width="0px" type="linea" icon_size="2" icon_color="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#ffffff" content_color="rgba(255,255,255,0.69)" heading_and_text_style="i-row" box_height="height-50" border_shape="" border_width="" border_color="" height="" heading="App Design" icon_linea="icon icon-basic-tablet" bg_image="8480" bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/62.jpg" box_url="#"]<small class="">Perspiciatis unde omnis iste natus error sit voluptatem</small>[/brankic_box][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services - Minimal / Duo color Effect', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 94; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Services-Minimal-Duo-color-Effect.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" gap="35" row_bg_align="brankic_bg_bottom" row_bg_size="contain" row_bg_color_1="#efefed" css=".vc_custom_1527015630359{padding-top: 100px !important;padding-bottom: 40px !important;}"][vc_column width="7/12" column_bg_size="auto" column_content_color="#000000"][vc_column_text highlight_background_color_1="#d4c1ec"]
<h2><em><span class="google_web_font_3">Creativity</span></em> is nothing but a mind set free.</h2>
[/vc_column_text][/vc_column][vc_column css=".vc_custom_1526128117350{padding-top: 40px !important;}"][/vc_column][vc_column width="1/3"][brankic_icon type="material" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#9456e9" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-row" heading_content_color="rgba(116,117,111,0.6)" heading="BRAND STRATEGY" icon_material="vc-material vc-material-fingerprint"] Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. [/brankic_icon][/vc_column][vc_column width="1/3"][brankic_icon type="linea" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#9456e9" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-row" heading_content_color="rgba(116,117,111,0.6)" heading="GRAPHIC SOLUTION" icon_linea="icon icon-software-pen"] Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. [/brankic_icon][/vc_column][vc_column width="1/3"][brankic_icon type="linea" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#9456e9" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-row" heading_content_color="rgba(116,117,111,0.6)" heading="APP DESIGN" icon_linea="icon icon-basic-webpage-img-txt"] Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo. [/brankic_icon][/vc_column][/vc_row][vc_row full_width="stretch_row" gap="35" row_bg_align="brankic_bg_bottom" row_bg_size="cover" css=".vc_custom_1527015559374{padding-bottom: 220px !important;}" row_brankic_bg_image="8929" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/77.jpg"][vc_column width="1/3" column_bg_size="auto"][brankic_icon type="linea" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#9456e9" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-row" heading_content_color="rgba(116,117,111,0.6)" icon_linea="icon icon-ecommerce-graph-increase" heading="DEVELOPMENT"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.[/brankic_icon][/vc_column][vc_column width="1/3" column_bg_size="auto"][brankic_icon type="linea" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#9456e9" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-row" heading_content_color="rgba(116,117,111,0.6)" icon_linea="icon icon-basic-keyboard" heading="MODERN CODE"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.[/brankic_icon][/vc_column][vc_column width="1/3" column_bg_size="auto"][brankic_icon type="linea" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#9456e9" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-row" heading_content_color="rgba(116,117,111,0.6)" icon_linea="icon icon-software-layers2" heading="DIGITAL STRATEGY"]Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.[/brankic_icon][/vc_column][vc_column column_bg_size="auto" css=".vc_custom_1527013437439{margin-top: 50px !important;}"][brankic_button shape="radius" text_color="#ffffff" bg_color="#74756f" bg_hover_color="" border_color="" border_hover_color="" hover_movement="down"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services / Icons - Very Minimal', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 95; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Services-Icons-Very-Minimal.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" gap="35" row_bg_color_1="#f8f8f8" css=".vc_custom_1527175687511{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column width="1/2" brankic_centered="true" content_align="text-align-center" css=".vc_custom_1527177038782{padding-bottom: 50px !important;}"][brankic_section_title h_tag="H2" h_size="40px" h_weight="200" h_spacing="2px" h_height="1.2" title="Being of service to others is"][brankic_section_title h_size="40px" h_weight="700" h_height="1.2" title="what brings true happiness."][/vc_column][vc_column][/vc_column][vc_column width="1/3"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#885af7" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-row heading-icon" heading_content_color="" icon_linea="icon icon-ecommerce-graph-increase" heading="Development"][/brankic_icon][/vc_column][vc_column width="1/3"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#885af7" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-row heading-icon" heading_content_color="" icon_linea="icon icon-basic-elaboration-tablet-pencil" heading="Modern Code"][/brankic_icon][/vc_column][vc_column width="1/3"][brankic_icon type="linea" icon_size="5" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#885af7" heading_and_text="true" heading_color="" heading_size="h5" heading_and_text_style="i-row heading-icon" heading_content_color="" icon_linea="icon icon-software-layers2" heading="Digital Strategy"][/brankic_icon][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services - Boxed on Hover', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 96; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Services-Boxed-on-Hover.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" css=".vc_custom_1527697368464{padding-top: 100px !important;}"][vc_column width="1/2" brankic_centered="true" content_align="text-align-center"][brankic_section_title title_color="#000000" h_tag="H2" h_size="40px" h_weight="200" h_spacing="2px" h_height="1.2" title="The highest of distinctions"][brankic_section_title title_color="#bbbbbb" h_size="40px" h_weight="100" h_height="1.2" title="is service to others"][/vc_column][/vc_row][vc_row equal_height="yes" gap="50" css=".vc_custom_1527697382316{padding-top: 40px !important;}"][vc_column width="1/3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#bbbbbb" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#bbbbbb" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" icon_linea="icon icon-ecommerce-graph-increase" heading="Development"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column][vc_column width="1/3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#bbbbbb" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#bbbbbb" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" icon_linea="icon icon-basic-keyboard" heading="Modern Code"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column][vc_column width="1/3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="material" icon_size="4" icon_color="#bbbbbb" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#bbbbbb" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" heading="Branding" icon_material="vc-material vc-material-fingerprint"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column][/vc_row][vc_row equal_height="yes" gap="50"][vc_column width="1/3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#bbbbbb" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#bbbbbb" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" icon_linea="icon icon-basic-elaboration-smartphone-cloud" heading="App Design"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column][vc_column width="1/3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#bbbbbb" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#bbbbbb" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" icon_linea="icon icon-software-pen" heading="Graphic Solution"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column][vc_column width="1/3"][brankic_box hover="true" box_hover_bg_color="#4294ff" horizontal_align="text-align-left" vertical_align="vert-top" box_border_radius="4px" box_border_width="0px" box_hover_shadow_color="rgba(66,148,255,0.33)" type="linea" icon_size="4" icon_color="#bbbbbb" icon_color_hover="#ffffff" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#000000" hover_heading_color="#ffffff" content_color="#bbbbbb" hover_content_color="#ffffff" heading_and_text_style="i-row" content_centered="true" box_height="" heading="Digital Strategy" icon_linea="icon icon-basic-world"]<small class="">Being of service to others is what brings true happiness.</small>[/brankic_box][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services - Zig Zag Style', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 97; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Service-ZIg-zag.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" row_bg_color_1="#f8f8f8" css=".vc_custom_1528478661315{padding-top: 150px !important;padding-bottom: 150px !important;}"][vc_column][vc_row_inner equal_height="yes" content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" column_inner_bg_color_1="#ffffff" css=".vc_custom_1528478183674{padding-top: 15% !important;padding-right: 15% !important;padding-bottom: 15% !important;padding-left: 15% !important;}"][brankic_section_title title_color="#fb4d4d" h_size="40px" h_weight="100" h_transform="capitalize" h_height="1" p_size="custom" p_weight="100" p_transform="uppercase" p_spacing="2px" small_title_color="#000000" title="Branding Strategy" small_title="01. authentic" p_size_custom="12px"][brankic_divider width="width-10" color="#fb4d4d" align="left" border_width="2"][vc_column_text]<span style="color: #999999;">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</span>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" brankic_column_inner_height="height-45" content_align="text-align-center" column_inner_brankic_bg_image="9566" column_inner_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/85.jpg"][brankic_button size="small" text_color="#ffffff" text_hover_color="#000000" bg_color="#000000" bg_hover_color="#ffffff" border_color="" border_hover_color="" shadow_color="rgba(0,0,0,0.17)"][/vc_column_inner][/vc_row_inner][vc_row_inner equal_height="yes" content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" content_align="text-align-center" column_inner_bg_align="brankic_bg_bottom" column_inner_brankic_bg_image="9643" column_inner_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/87.jpg"][brankic_button size="small" text_hover_color="#ffffff" border_color="" border_hover_color="" shadow_color="rgba(0,0,0,0.17)"][/vc_column_inner][vc_column_inner width="1/2" brankic_column_inner_height="height-45" column_inner_bg_color_1="#ffffff" css=".vc_custom_1528478466989{padding: 15% !important;}"][brankic_section_title title_color="#0b8bf8" h_size="40px" h_weight="100" h_transform="capitalize" h_height="1" p_size="custom" p_weight="100" p_transform="uppercase" p_spacing="2px" small_title_color="#000000" title="Graphic solutions" small_title="02. incredible" p_size_custom="12px"][brankic_divider width="width-10" color="#0b8bf8" align="left" border_width="2"][vc_column_text]<span style="color: #999999;">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</span>[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner equal_height="yes" content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" brankic_column_inner_height="height-45" column_inner_bg_color_1="#ffffff" css=".vc_custom_1528478485908{padding: 15% !important;}"][brankic_section_title title_color="#05aca5" h_size="40px" h_weight="100" h_transform="capitalize" h_height="1" p_size="custom" p_weight="100" p_transform="uppercase" p_spacing="2px" small_title_color="#000000" title="Modern code" small_title="03. sustainable" p_size_custom="12px"][brankic_divider width="width-10" color="#05aca5" align="left" border_width="2"][vc_column_text]<span style="color: #999999;">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</span>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" brankic_column_inner_height="height-45" content_align="text-align-center" column_inner_bg_align="brankic_bg_bottom" column_inner_brankic_bg_image="9650" column_inner_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/88.jpg"][brankic_button size="small" text_color="#ffffff" bg_color="#05b8ad" bg_hover_color="#263847" border_color="" border_hover_color="" shadow_color="rgba(0,0,0,0.17)"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services - Image Duotone Combination', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 98; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service bra_image'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Services-Image-Duotone-Combination-.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" gap="75" row_bg_color_1="#fff3f3" css=".vc_custom_1528907338727{margin-top: 200px !important;padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column width="1/2" css=".vc_custom_1528907005309{padding-bottom: 250px !important;}"][brankic_section_title title_color="#e4505b" h_size="40px" h_weight="700" h_height="1.2" title="Work hard and don’t give up hope. Be open to criticism."][brankic_divider style="divider blank"][brankic_icon type="linea" icon_size="4" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#e4505b" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-column" heading_content_color="rgba(0,0,0,0.5)" icon_linea="icon icon-basic-laptop" heading="Web Development"]A positive attitude causes a chain reaction of positive thoughts, events and outcomes. It is a catalyst and it sparks extraordinary results.[/brankic_icon][brankic_divider style="divider blank"][brankic_icon type="linea" icon_size="4" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#e4505b" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-column" heading_content_color="rgba(0,0,0,0.5)" icon_linea="icon icon-software-layers2" heading="Creative Strategy"]A positive attitude causes a chain reaction of positive thoughts, events and outcomes. It is a catalyst and it sparks extraordinary results.[/brankic_icon][brankic_divider style="divider blank"][brankic_icon type="material" icon_size="4" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="#e4505b" heading_and_text="true" heading_color="#000000" heading_size="h5" heading_and_text_style="i-column" heading_content_color="rgba(0,0,0,0.5)" heading="Corporate Identity" icon_material="vc-material vc-material-fingerprint"]A positive attitude causes a chain reaction of positive thoughts, events and outcomes. It is a catalyst and it sparks extraordinary results.[/brankic_icon][/vc_column][vc_column width="1/2" css=".vc_custom_1528907039701{margin-top: -200px !important;}"][brankic_image shadow_color="rgba(252,53,76,0.21)" border_radius="4px" duotone="custom" duotone_custom="#fc354c" duotone_gradient="true" duotone_gradient_direction="to right" duotone_custom_2="#0abfbc" image="9789 image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/90.jpg"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Services - Varied Colour Boxes', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 99; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_service'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Services-Varied-Colour-Boxes.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" content_placement="middle" row_bg_align="brankic_bg_right" row_bg_size="contain" row_bg_color_1="#cfdef3" use_gradient_bg="true" row_gradient_direction="to bottom" row_bg_color_2="#e0eafc" row_bg_color_3="#ffffff" css=".vc_custom_1530876118984{padding-top: 140px !important;padding-bottom: 420px !important;}" row_brankic_bg_image="8942"][vc_column width="1/4"][/vc_column][vc_column width="1/2" content_align="text-align-center" column_content_color="#2f2756"][brankic_section_title h_transform="none" h_height="1.2" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="1px" title="App design agency based in Big Apple" small_title="Marketing and innovation" p_size_custom="13px"]Our work is the presentation
of our capabilities.[/brankic_section_title][vc_column_text css_animation="none" css=".vc_custom_1530959893189{padding-top: 10px !important;padding-bottom: 70px !important;}"]Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people.[/vc_column_text][brankic_button shape="radius" hover="dir-btt" text_color="#2f2756" text_hover_color="#ffffff" bg_hover_color="#2f2756" border_color="" border_hover_color="" shadow_color="rgba(76,106,214,0.15)" hover_movement="up"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][vc_row full_width="stretch_row" row_bg_color_1="#ffffff" use_gradient_bg="true" row_gradient_direction="to top" row_bg_color_2="rgba(255,255,255,0.01)" css=".vc_custom_1530875883070{padding-bottom: 100px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3" css=".vc_custom_1530822768284{margin-top: -300px !important;}"][vc_row_inner content_placement="middle" gap="20" row_inner_bg_repeat="repeat"][vc_column_inner width="1/3" brankic_column_inner_height="height-25"][brankic_box box_bg_color="#fdad78" use_gradient_bg="true" box_gradient_direction="to bottom right" box_bg_color_2="#ffcc9f" horizontal_align="text-align-center" vertical_align="vert-middle" box_border_radius="5px" box_border_width="0px" box_shadow_color="rgba(0,0,0,0.03)" type="linea" icon_color="rgba(255,255,255,0.8)" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#ffffff" content_color="#ffffff" heading_and_text_style="i-row" box_height="" icon_linea="icon icon-weather-newmoon" heading="Design"]<small class="">What separates design from art is that design is meant to be... functional.</small>[/brankic_box][/vc_column_inner][vc_column_inner width="1/3"][brankic_box box_bg_color="#6858b7" use_gradient_bg="true" box_gradient_direction="to bottom right" box_bg_color_2="#9988e3" horizontal_align="text-align-center" vertical_align="vert-middle" box_border_radius="5px" box_border_width="0px" box_shadow_color="rgba(0,0,0,0.03)" type="linea" icon_color="rgba(255,255,255,0.8)" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#ffffff" content_color="#ffffff" heading_and_text_style="i-row" box_height="" icon_linea="icon icon-basic-keyboard" heading="Modern Code"]<small class="">Learning to write programs stretches your mind, and helps you think better.</small>[/brankic_box][brankic_divider style="divider blank" margin="20px auto"][brankic_box box_bg_color="#13b1a9" use_gradient_bg="true" box_gradient_direction="to bottom right" box_bg_color_2="#76e0da" horizontal_align="text-align-center" vertical_align="vert-middle" box_border_radius="5px" box_border_width="0px" box_shadow_color="rgba(0,0,0,0.03)" type="linea" icon_color="rgba(255,255,255,0.8)" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#ffffff" content_color="#ffffff" heading_and_text_style="i-row" box_height="" icon_linea="icon icon-basic-lock" heading="High Security"]
<p id="heading_5b3e184c42225"><small class="">Clients don't expect perfection, but they do expect honesty and transparency.</small></p>

[/brankic_box][/vc_column_inner][vc_column_inner width="1/3"][brankic_box box_bg_color="#d56f8f" use_gradient_bg="true" box_gradient_direction="to bottom right" box_bg_color_2="#eda4bb" horizontal_align="text-align-center" vertical_align="vert-middle" box_border_radius="5px" box_border_width="0px" box_shadow_color="rgba(0,0,0,0.03)" type="linea" icon_color="rgba(255,255,255,0.8)" icon_border_shape="" icon_border_width="" icon_border_color="" icon_shape_padding="0" icon_bg_color="" heading_size="h5" heading_color="#ffffff" content_color="#ffffff" heading_and_text_style="i-row" box_height="" row_gradient_direction="" icon_linea="icon icon-software-layers2" heading="Creative Strategy"]
<p id="heading_5b3e184c56343"><small class="">It takes alot of people to make a winning team. We are ready for greater challenges.</small></p>

[/brankic_box][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	



/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Testimonials Carousel  Default - Fullwidth with Bg Image', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 101; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_testimonials'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Testimonials-Carousel-Default-Fullwidth-with-Bg-Image.jpg" ); //Thumbnail should have this dimensions: 114x154px
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" row_bg_align="brankic_bg_bottom" row_bg_repeat="no-repeat" row_bg_size="cover" row_bg_color_1="rgba(34,34,40,0.6)" row_brankic_bg_image="6642" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/01/24.jpg" css=".vc_custom_1526679158077{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column content_align="text-align-center"][brankic_section_title title_color="#ffffff" h_size="custom" h_weight="normal" h_transform="uppercase" p_weight="normal" title="Testimonials" h_size_custom="14px"][brankic_divider style="divider blank" margin="custom" custom_margin="35px auto 35px auto"][/vc_column][vc_column width="1/4" css=".vc_custom_1524600587120{padding-top: 30px !important;}"][/vc_column][vc_column width="1/2"][brankic_carousel testimonial_cat_slug="portfolio-testimonials" text_color_testimonial="#ffffff" text_color_name_occupation="rgba(255,255,255,0.86)" limit="4" slides_per_view="1" carousel_navigation="dots_below" carousel_navigation_color="light"][/brankic_carousel][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Testimonials - Boxed', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 102; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_testimonials'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Testimonials-Boxed.jpg" ); //Thumbnail should have this dimensions: 114x154px
	$data['content']    = <<<CONTENT
	[vc_row gap="35" row_bg_repeat="repeat" row_bg_size="auto" css=".vc_custom_1526762321409{padding-top: 100px !important;padding-bottom: 100px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column css=".vc_custom_1526724434401{padding-bottom: 20px !important;}"][brankic_section_title h_weight="normal" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="2px" small_title="Testimonials" p_size_custom="12px"][/vc_column][vc_column width="1/2" css=".vc_custom_1526719934924{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column_text]
<h1><strong><span class="google_web_font_4">What our
clients
say</span></strong></h1>
[/vc_column_text][vc_row_inner gap="35" css=".vc_custom_1526722370180{padding-top: 40px !important;}"][vc_column_inner width="1/2"][vc_column_text]<span style="color: #bbbbbb;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span>[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]<span style="color: #bbbbbb;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span>[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][brankic_carousel testimonial_cat_slug="portfolio-testimonials" testimonial_type="solid" text_color_testimonial="#000000" text_color_name_occupation="rgba(0,0,0,0.86)" bg_color_testimonial="#edf1f4" slides_per_view="1"][/brankic_carousel][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Testimonials - 2 Columns with Bg Image', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 103; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_testimonials'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Testimonials-2-Columns-with-Bg-Image.jpg" ); //Thumbnail should have this dimensions: 114x154px
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row_content" content_placement="top" row_bg_repeat="repeat" row_bg_size="auto" css=".vc_custom_1526898869688{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/2" column_bg_align="brankic_bg_top" column_bg_repeat="repeat" column_bg_size="auto" column_bg_color_1="rgba(63,81,181,0.15)" use_gradient_bg="true" column_gradient_direction="to top left" column_bg_color_2="rgba(0,0,0,0.01)" css=".vc_custom_1526901014973{padding-top: 70px !important;padding-right: 40px !important;padding-bottom: 70px !important;padding-left: 40px !important;}" column_brankic_bg_image="8479" column_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/61.jpg"][vc_row_inner][vc_column_inner width="7/12" centered="true" column_inner_bg_size="auto" css=".vc_custom_1526899829023{padding-bottom: 20px !important;}"][brankic_section_title h_weight="normal" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="2px" small_title="Testimonials" p_size_custom="12px"][/vc_column_inner][vc_column_inner width="7/12" centered="true" column_inner_bg_size="auto"][vc_column_text gradient_text_color_1="#2a3ca3" gradient_text_color_2="#8897ea"]
<h1><span class="gradient"><strong>What our clients</strong> <em><span class="google_web_font_3">say</span></em></span></h1>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" column_bg_repeat="repeat" column_bg_size="auto" column_content_color="#ffffff" css=".vc_custom_1526899094370{padding-top: 100px !important;padding-right: 40px !important;padding-bottom: 100px !important;padding-left: 40px !important;background-color: #3f51b5 !important;}"][vc_row_inner][vc_column_inner width="7/12" centered="true"][brankic_carousel testimonial_cat_slug="portfolio-testimonials" testimonial_post_id="0" slides_per_view="1" carousel_navigation="arrows_below" fraction_navigation="true" carousel_navigation_color="light"][/brankic_carousel][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Testimonials - Minimal', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 104; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_testimonials'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Testimonials-Minimal.jpg" ); //Thumbnail should have this dimensions: 114x154px
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" content_placement="top" row_bg_align="brankic_bg_top" row_bg_repeat="repeat" row_bg_size="auto" row_bg_color_1="rgba(237,241,244,0.2)" css=".vc_custom_1526908245587{padding-top: 70px !important;padding-bottom: 70px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" row_brankic_bg_image="8779" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/pattern-2.jpg"][vc_column width="5/12" brankic_centered="true" content_align="text-align-center" column_bg_size="auto"][brankic_divider color="rgba(0,0,0,0.79)" margin="custom" custom_margin="0 auto 65px auto" icon_color="#000000" border_width="1" divider_text="testimonials"][brankic_carousel autoheight="true" testimonial_cat_slug="portfolio-testimonials" testimonial_post_id="none" limit="3" slides_per_view="1" carousel_navigation="dots_below"][/brankic_carousel][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Testimonials - Clients Grid Combination', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 105; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_testimonials'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Testimonials-Clients-Grid-Combo-1.jpg" ); //Thumbnail should have this dimensions: 114x154px
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row_content" row_bg_color_1="rgba(20,30,48,0.8)" use_gradient_bg="true" row_gradient_direction="to top right" row_bg_color_2="rgba(36,59,85,0.8)" row_brankic_bg_image="9431" row_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/84-1.jpg" css=".vc_custom_1528114837302{padding-bottom: 100px !important;}"][vc_column content_align="text-align-center"][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat" brankic_grid="border_outer" brankic_grid_color="rgba(255,255,255,0.1)"][vc_column_inner width="1/4" brankic_column_inner_height="height-15"][brankic_image hover="low-high" image="9217" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-5.png" url="#"][/vc_column_inner][vc_column_inner width="1/4" brankic_column_inner_height="height-15"][brankic_image hover="low-high" image="9213" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-1.png" url="#"][/vc_column_inner][vc_column_inner width="1/4" brankic_column_inner_height="height-15"][brankic_image hover="low-high" image="9219" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-7.png" url="#"][/vc_column_inner][vc_column_inner width="1/4" brankic_column_inner_height="height-15"][brankic_image hover="low-high" image="9216" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-4.png" url="#"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1528111073711{padding-top: 70px !important;}"][vc_column_inner width="1/4"][/vc_column_inner][vc_column_inner width="1/2"][brankic_carousel testimonial_cat_slug="portfolio-testimonials" testimonial_post_id="none" text_color_testimonial="#ffffff" text_color_name_occupation="#ffffff" slides_per_view="1" carousel_navigation="arrows_below" fraction_navigation="true" carousel_navigation_color="light"][/brankic_carousel][/vc_column_inner][vc_column_inner width="1/4"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Testimonials - Carousel Light Version', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 106; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_testimonials'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Testimonials-Carousel-Light-Version.jpg" ); //Thumbnail should have this dimensions: 114x154px
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row_content" row_bg_repeat="repeat" row_bg_size="contain" row_bg_color_1="#ecf6ff" use_gradient_bg="true" row_gradient_direction="to bottom" row_bg_color_2="#ffffff" css=".vc_custom_1531050118700{padding-top: 70px !important;padding-right: 60px !important;padding-bottom: 50px !important;padding-left: 60px !important;}"][vc_column content_align="text-align-center"][brankic_icon type="linecons" icon_size="2" bg_color="#45486e" border_shape="circle" border_width="" border_color="" icon_shape_padding="30" icon_color="#ffffff" icon_linecons="vc_li vc_li-like"][/brankic_icon][brankic_carousel testimonial_cat_slug="portfolio-testimonials" testimonial_post_id="none" testimonial_type="solid" text_color_testimonial="#45486e" text_color_name_occupation="#45486e" bg_color_testimonial="#ffffff" centered="true" emphasize_opacity="true" gap="60"][/brankic_carousel][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );





/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Counters - Minimal Style', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 111; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_counter'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Counters-Minimal-Style.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row row_bg_size="auto" css=".vc_custom_1527111635123{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column width="1/2" brankic_centered="true" column_bg_size="auto"][brankic_section_title h_tag="H2" h_weight="normal" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="2px" small_title_color="#bbbbbb" small_title="Our values" p_size_custom="13px"][vc_column_text highlight_background_color_1="#3f51b5"]
<h2 id="heading_5b05d6b072cfc" class="">A positive attitude causes a chain reaction of positive thoughts</h2>
[/vc_column_text][brankic_divider style="divider blank" margin="20px auto"][vc_column_text]<span style="color: #bbbbbb;">If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges.</span>[/vc_column_text][/vc_column][/vc_row][vc_row gap="35" row_bg_size="auto" css=".vc_custom_1527113103186{padding-bottom: 100px !important;}"][vc_column width="1/4" content_align="text-align-center" column_bg_size="auto"][brankic_counter icon_color="" caption_color="" counter_color="#ffd973" counter_size="large" caption="Cups of Coffee" to="64"][vc_column_text css=".vc_custom_1527155421994{padding-right: 30px !important;padding-left: 30px !important;}"]<span style="color: #bbbbbb;"><small class="">If you have a positive attitude and constantly strive to give your best effort</small></span>[/vc_column_text][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter icon_color="" caption_color="" counter_color="#ffd973" counter_size="large" caption="Finished Projects" to="72"][vc_column_text css=".vc_custom_1527155583879{padding-right: 30px !important;padding-left: 30px !important;}"]<span style="color: #bbbbbb;"><small class="">If you have a positive attitude and constantly strive to give your best effort</small></span>[/vc_column_text][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter icon_color="" caption_color="" counter_color="#ffd973" counter_size="large" caption="Community Members" to="33"][vc_column_text css=".vc_custom_1527155603480{padding-right: 30px !important;padding-left: 30px !important;}"]<span style="color: #bbbbbb;"><small class="">If you have a positive attitude and constantly strive to give your best effort</small></span>[/vc_column_text][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter icon_color="" caption_color="" counter_color="#ffd973" counter_size="large" caption="Miles Coverd" to="971"][vc_column_text css=".vc_custom_1527155621775{padding-right: 30px !important;padding-left: 30px !important;}"]<span style="color: #bbbbbb;"><small class="">If you have a positive attitude and constantly strive to give your best effort</small></span>[/vc_column_text][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Call to Action + Counter', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 112; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_counter'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Call-to-action-counter.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" row_bg_align="brankic_bg_bottom_right" row_bg_size="contain" row_bg_color_1="#f8f8f8" css=".vc_custom_1528380922191{padding-top: 200px !important;padding-bottom: 20px !important;}"][vc_column width="1/4"][/vc_column][vc_column width="1/2" content_align="text-align-center"][brankic_section_title title_color="#000000" h_size="50px" h_weight="700" h_transform="none" h_height="1.2" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="2px" small_title_color="rgba(0,0,0,0.3)" title="App design agency based in Big Apple" small_title="Too much coffee? Never" p_size_custom="13px"][brankic_divider style="divider blank" margin="5px auto"][vc_column_text css_animation="none"]Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people.[/vc_column_text][brankic_divider style="divider blank"][brankic_button shape="radius" hover="dir-ttb" text_color="#ffffff" bg_color="#3febb1" bg_hover_color="#4c6ad6" border_color="" border_hover_color="" shadow_color="rgba(76,106,214,0.15)" hover_movement="down"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][vc_row full_width="stretch_row_content" bottom_row_svg_mask_shape="slope" bottom_row_svg_mask_height="200px" bottom_row_svg_mask_fill_color="#4c6ad6" row_bg_size="auto" row_bg_color_1="#f8f8f8"][vc_column][brankic_image image="9584" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/06/illustration5-1.png"][/vc_column][/vc_row][vc_row full_width="stretch_row" row_bg_size="auto" row_bg_color_1="#4c6ad6" css=".vc_custom_1528405940234{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column width="1/2" brankic_centered="true" content_align="text-align-center" column_bg_size="auto"][brankic_section_title title_color="#ffffff" h_size="40px" h_weight="100" h_height="1.2" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="2px" small_title_color="rgba(255,255,255,0.5)" title="A positive attitude causes a chain reaction of positive thoughts" small_title="Fun facts" p_size_custom="13px"][/vc_column][/vc_row][vc_row full_width="stretch_row" gap="35" row_bg_size="auto" row_content_color="#ffffff" row_bg_color_1="#4c6ad6" css=".vc_custom_1528404513713{padding-bottom: 100px !important;}"][vc_column width="1/4" content_align="text-align-center" column_bg_size="auto"][brankic_counter icon_color="" caption_color="#3febb1" counter_color="#3febb1" counter_size="large" caption="Cups of Coffee" to="64"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter icon_color="" caption_color="#3febb1" counter_color="#3febb1" counter_size="large" caption="Finished Projects" to="72"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter icon_color="" caption_color="#3febb1" counter_color="#3febb1" counter_size="large" caption="Community Members" to="33"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_counter icon_color="" caption_color="#3febb1" counter_color="#3febb1" counter_size="large" caption="Miles Coverd" to="971"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Text Block - Minimal / Asimetric', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 121; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_text'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Text-Block-Minimal-Asimetric.jpg" ); //Thumbnail should have this dimensions: 114x154px
	$data['content']    = <<<CONTENT
	[vc_row row_bg_size="auto" css=".vc_custom_1527156160968{padding-top: 100px !important;}"][vc_column width="1/2" column_bg_size="auto"][vc_column_text highlight_background_color_1="#dd9933"]
<h2><span class="uppercase">Style is a <span style="color: #bbbbbb;">reflection</span></span>
<span class="uppercase">of your attitude</span></h2>
[/vc_column_text][/vc_column][vc_column width="1/2"][/vc_column][/vc_row][vc_row gap="35" row_bg_size="auto" css=".vc_custom_1527156180391{padding-top: 30px !important;padding-bottom: 100px !important;}"][vc_column width="5/12" content_align="text-align-right" column_bg_size="auto"][brankic_section_title h_tag="H2" h_weight="normal" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="2px" small_title_color="#bbbbbb" small_title="Our values" p_size_custom="13px"][vc_column_text highlight_background_color_1="#dd9933"]<strong><span class=""><small class="uppercase">Our values</small></span></strong>[/vc_column_text][/vc_column][vc_column width="5/12"][vc_column_text]
<h4>If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges.</h4>
[/vc_column_text][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Text Block - Title / 2 Columns text', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 122; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_text'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "" );
	$data['content']    = <<<CONTENT
	[vc_row row_bg_size="auto" css=".vc_custom_1527156160968{padding-top: 100px !important;}"][vc_column width="1/2" column_bg_size="auto"][vc_column_text highlight_background_color_1="#dd9933"]
<h3><strong>Experience is the teacher of all things. <span style="color: #09f19f;">Be brave.</span> Take risks, nothing can substitute experience.</strong></h3>
[/vc_column_text][/vc_column][/vc_row][vc_row gap="35" row_bg_size="auto" css=".vc_custom_1527156180391{padding-top: 30px !important;padding-bottom: 100px !important;}"][vc_column width="1/2" column_bg_size="auto" column_content_color="#777777"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges.If you are going to achieve excellence in big things, you develop the habit in little matters. Excellence is not an exception, it is a prevailing attitude.[/vc_column_text][/vc_column][vc_column width="1/2" column_content_color="#777777"][vc_column_text]I don't go by or change my attitude based on what people say. At the end of the day, they, too, are judging me from their perspective. I would rather be myself and let people accept me for what I am than be somebody who I am not, just because I want people's approval. Smile in the mirror. Do that every morning.[/vc_column_text][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Text Block - Minimal Dark Style', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 123; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_text'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Text-Block-Minimal-Dark-Style.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" row_bg_size="contain" row_bg_color_1="#1b1b1b" css=".vc_custom_1528890576083{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][vc_row_inner][vc_column_inner width="9/12" column_inner_content_color="#ffffff"][vc_column_text]
<h3><span style="color: #999999;">Experience is the <span style="color: #ffffff;"><strong>teacher</strong></span> of all things.
Be <strong><span style="color: #ffffff;">brave</span>.</strong> Take risks, nothing can substitute
your <strong><span style="color: #ffffff;">experience</span>.</strong></span></h3>
[/vc_column_text][/vc_column_inner][vc_column_inner width="3/12"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1528888337244{padding-top: 30px !important;}"][vc_column_inner width="5/12"][/vc_column_inner][vc_column_inner width="5/12" column_inner_content_color="rgba(255,255,255,0.9)"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges.If you are going to achieve excellence in big things, you develop the habit in little matters. Excellence is not an exception, it is a prevailing attitude.[/vc_column_text][/vc_column_inner][vc_column_inner width="2/12"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1528888327991{padding-top: 30px !important;}"][vc_column_inner width="5/12"][/vc_column_inner][vc_column_inner width="5/12"][brankic_button shape="button-circle arrow-link" text_color="#ffffff" bg_color="#4646a7" bg_hover_color="rgba(70,70,167,0.01)" border_color="#4646a7" border_hover_color=""][/vc_column_inner][vc_column_inner width="2/12"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Text Block - Minimal 2 Columns', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 124; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_text'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Text-Block-Minimal-2-Columns.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row css=".vc_custom_1532550836984{padding-top: 170px !important;padding-bottom: 170px !important;}"][vc_column][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1532550863696{padding-bottom: 80px !important;}"][vc_column_inner width="1/2"][brankic_section_title title_color="#fb857a" h_tag="H3" h_weight="700"]App design
company based in
Berlin, Germany.[/brankic_section_title][/vc_column_inner][vc_column_inner width="1/2"][/vc_column_inner][/vc_row_inner][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1532550898414{padding-bottom: 30px !important;}"][vc_column_inner css=".vc_custom_1532549709797{padding-bottom: 30px !important;}"][brankic_section_title h_weight="100"]Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/brankic_section_title][/vc_column_inner][/vc_row_inner][vc_row_inner gap="35" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges. Excellence is not an exception, it is a prevailing attitude.
Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges. Excellence is not an exception, it is a prevailing attitude.
Experience is the teacher of all things. Be brave. Take risks, nothing can substitute your experience.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	



/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Image Text Zig Zag Columns', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 131; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_image'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Image-Text-Zig-Zag-Columns.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" css=".vc_custom_1527073302035{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/2" content_align="text-align-center" column_bg_size="auto" column_content_color="#ffffff" column_bg_color_1="#0e1114" css=".vc_custom_1527075480170{padding-top: 200px !important;padding-right: 15% !important;padding-bottom: 200px !important;padding-left: 15% !important;}"][brankic_divider width="width-10" color="#18f5bf" margin="custom" custom_margin="0 auto 65px auto" border_width="2"][vc_column_text css_animation="appear"]
<h4>Stay positive and happy.
Work hard and don't give up hope.
Be open to criticism and keep learning.
Surround yourself with happy,
warm and genuine people.</h4>
[/vc_column_text][/vc_column][vc_column width="1/2" brankic_column_height="height-50" column_bg_align="brankic_bg_center" column_brankic_bg_image="8994" column_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/80.jpg"][/vc_column][/vc_row][vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" css=".vc_custom_1527073302035{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column width="1/2" brankic_column_height="height-50" column_bg_align="brankic_bg_center" column_brankic_bg_image="8993" column_brankic_bg_image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/79.jpg"][/vc_column][vc_column width="1/2" content_align="text-align-center" column_bg_size="auto" column_content_color="#ffffff" column_bg_color_1="#0e1114" css=".vc_custom_1527075480170{padding-top: 200px !important;padding-right: 15% !important;padding-bottom: 200px !important;padding-left: 15% !important;}"][brankic_divider width="width-10" color="#18f5bf" margin="custom" custom_margin="0 auto 65px auto" border_width="2"][vc_column_text css_animation="appear"]
<h4>A positive attitude causes a
chain reaction of positive thoughts,
events and outcomes. It is a catalyst
and it sparks extraordinary
results.</h4>
[/vc_column_text][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'About - Vcard Style', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 141; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_about'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/About-Vcard-Style-Poppins-Font.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" row_bg_color_1="#aa4b6b" use_gradient_bg="true" row_gradient_direction="to right" row_bg_color_2="#6b6b83" row_bg_color_3="#3b8d99" css=".vc_custom_1527512087159{padding-top: 200px !important;padding-bottom: 200px !important;}"][vc_column width="1/2" css=".vc_custom_1527501741514{margin-top: -100px !important;}"][brankic_image duotone="duotone multi-color effect-7" image="7970" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/04/tm-1.jpg"][/vc_column][vc_column width="1/2" column_content_color="rgba(0,0,0,0.9)" column_bg_color_1="#ffffff" css=".vc_custom_1527511859689{padding-top: 70px !important;padding-right: 70px !important;padding-bottom: 70px !important;padding-left: 70px !important;}"][brankic_section_title h_tag="H2" h_weight="200" h_height="1.2" p_size="50px" p_weight="900" p_height="1.2" small_title_position="below" size="medium" uppercase="true" title="Mark" small_title="Stivens"][brankic_divider style="divider blank" margin="20px auto"][vc_column_text]If you have a positive attitude and constantly strive to give your best effort, eventually you will overcome your immediate problems and find you are ready for greater challenges.If you are going to achieve excellence in big things, you develop the habit in little matters.[/vc_column_text][brankic_divider style="divider blank" margin="40px auto"][brankic_progress_bars_wrapper style="bold rounded"][brankic_progress_bar value="89" bar_color="#7fd799" bar_color_2="#44aad4" caption="Interface Design"][brankic_progress_bar value="97" bar_color="#7fd799" bar_color_2="#44aad4" caption="Branding Identity"][brankic_progress_bar value="65" bar_color="#7fd799" bar_color_2="#44aad4" caption="Web Apps"][/brankic_progress_bars_wrapper][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Clients Minimal  -  Grid 4 Columns', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 151; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_clients'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Clients-Minimal-Grid-4-Columns.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row css=".vc_custom_1527612490020{padding-top: 100px !important;}"][vc_column content_align="text-align-center"][brankic_section_title h_tag="H2" h_size="custom" h_weight="700" h_transform="capitalize" p_size="custom" p_weight="700" p_transform="capitalize" small_title_color="#bbbbbb" title="we deliver quality" small_title="Our clients" h_size_custom="45px" p_size_custom="14px"][/vc_column][/vc_row][vc_row equal_height="yes" content_placement="middle" row_bg_size="auto" brankic_grid="border_inner" brankic_grid_color="rgba(0,0,0,0.1)" css=".vc_custom_1527612479026{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column width="1/4" brankic_column_height="height-25" content_align="text-align-center"][brankic_image hover="high-low" image="9201" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-5.png"][/vc_column][vc_column width="1/4" content_align="text-align-center" column_bg_size="auto"][brankic_image hover="high-low" image="9206" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-10.png"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_image hover="high-low" image="9208" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-12.png"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_image hover="high-low" image="9225" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-6.png"][/vc_column][vc_column width="1/4" brankic_column_height="height-25" content_align="text-align-center"][brankic_image hover="high-low" image="9197" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-1.png"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_image hover="high-low" image="9203" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-7.png"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_image hover="high-low" image="9199" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-3.png"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_image hover="high-low" image="9204" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-8.png"][/vc_column][vc_column width="1/4" brankic_column_height="height-25" content_align="text-align-center"][brankic_image hover="high-low" image="9207" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-11.png"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_image hover="high-low" image="9224" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-2.png"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_image hover="high-low" image="9205" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-9.png"][/vc_column][vc_column width="1/4" content_align="text-align-center"][brankic_image hover="high-low" image="9200" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/lg-4.png"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Clients Dark - Columns with Bg Color', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 152; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_clients'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Clients-Dark-Columns-with-Bg-Color.jpg" );
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" gap="10" row_bg_size="auto" row_content_color="#ffffff" row_bg_color_1="#1a1a1a" css=".vc_custom_1527615984906{padding-top: 100px !important;padding-right: 15px !important;padding-left: 15px !important;}"][vc_column width="1/4" content_align="text-align-center"][/vc_column][vc_column width="1/2"][brankic_section_title title_color="#ffffff" h_tag="H3" h_size="40px" p_size="custom" p_weight="700" p_transform="uppercase" p_spacing="2px" small_title_color="#ff9866" title="Clients don't expect perfection, but they do expect honesty and transparency. " small_title="Our Clients" p_size_custom="11px"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" gap="5" row_bg_size="auto" row_bg_color_1="#1a1a1a" css=".vc_custom_1527616450843{padding-top: 100px !important;padding-right: 15px !important;padding-bottom: 20px !important;padding-left: 15px !important;}"][vc_column width="1/4" brankic_column_height="height-25" content_align="text-align-center" css=".vc_custom_1527615998680{background-color: #121212 !important;}"][brankic_image hover="low-high" image="9217" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-5.png"][/vc_column][vc_column width="1/4" content_align="text-align-center" column_bg_size="auto" css=".vc_custom_1527616012852{background-color: #121212 !important;}"][brankic_image hover="low-high" image="9221" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-10.png"][/vc_column][vc_column width="1/4" content_align="text-align-center" css=".vc_custom_1527616024951{background-color: #121212 !important;}"][brankic_image hover="low-high" image="9223" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-12.png"][/vc_column][vc_column width="1/4" content_align="text-align-center" css=".vc_custom_1527616040237{background-color: #121212 !important;}"][brankic_image hover="low-high" image="9218" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-6.png"][/vc_column][vc_column width="1/4" brankic_column_height="height-25" content_align="text-align-center" css=".vc_custom_1527616090934{background-color: #121212 !important;}"][brankic_image hover="low-high" image="9213" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-1.png"][/vc_column][vc_column width="1/4" content_align="text-align-center" css=".vc_custom_1527616079036{background-color: #121212 !important;}"][brankic_image hover="low-high" image="9219" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-7.png"][/vc_column][vc_column width="1/4" content_align="text-align-center" css=".vc_custom_1527616067729{background-color: #121212 !important;}"][brankic_image hover="low-high" image="9215" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-3.png"][/vc_column][vc_column width="1/4" content_align="text-align-center" css=".vc_custom_1527616055027{background-color: #121212 !important;}"][brankic_image hover="low-high" image="9220" image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-8.png"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	

	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Contact - Oval Map / Split Content', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 161; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_contact'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Contact-Oval-Map-Split-Content.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row_content" bottom_row_svg_mask_shape="concave" bottom_row_svg_mask_height="200px" bottom_row_svg_mask_fill_color="#f8f8f8"][vc_column][vc_column_text][wpgmza id="1"][/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" row_bg_align="brankic_bg_bottom_right" row_bg_size="contain" row_bg_color_1="#f8f8f8" css=".vc_custom_1530392328267{padding-bottom: 80px !important;}"][vc_column shadow_color="rgba(0,0,0,0.1)" css=".vc_custom_1530391899679{margin-top: -280px !important;border-radius: 10px !important;}"][vc_row_inner equal_height="yes" row_inner_bg_repeat="repeat"][vc_column_inner width="2/3" column_inner_bg_color_1="#ffffff" css=".vc_custom_1530367389422{padding: 70px !important;}"][brankic_section_title title_color="#000000" h_tag="H4" p_transform="uppercase"]Send us a Message[/brankic_section_title][brankic_divider style="divider blank"][brankic_contact_form_7 cf_7_id="8771" color="#000000" border_color="#f5f7fa"][/vc_column_inner][vc_column_inner width="1/3" column_inner_bg_color_1="#fc5c7d" use_gradient_bg="true" column_inner_gradient_direction="to bottom right" column_inner_bg_color_2="#6a82fb" css=".vc_custom_1530391684155{padding-top: 70px !important;padding-right: 70px !important;padding-bottom: 70px !important;padding-left: 70px !important;}"][brankic_section_title title_color="#ffffff" h_tag="H4" p_transform="uppercase"]Contact Details[/brankic_section_title][brankic_divider style="divider blank"][brankic_icon type="linea" icon_size="2" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="rgba(255,255,255,0.5)" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#ffffff" icon_linea="icon icon-basic-geolocalize-05" heading="Our Studio"]Hallesches Ufer 23,
10963 Berlin, Germany[/brankic_icon][brankic_divider color="rgba(255,255,255,0.1)"][brankic_icon type="linea" icon_size="2" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="rgba(255,255,255,0.5)" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#ffffff" icon_linea="icon icon-basic-headset" heading="Call Directly"]+12 10963 – 578[/brankic_icon][brankic_divider color="rgba(255,255,255,0.1)"][brankic_icon type="linea" icon_size="2" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="rgba(255,255,255,0.5)" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#ffffff" icon_linea="icon icon-basic-mail-multiple" heading="Write to Us"]myriad.theme@brankic.net[/brankic_icon][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	

	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Contact - Orange Version / Bottom Map', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 162; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_contact'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Contact-Orange-Version-Bottom-Map.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" gap="60" row_bg_align="brankic_bg_bottom_right" row_bg_size="contain" row_bg_color_1="#fd8667" css=".vc_custom_1530442335688{padding-top: 150px !important;}"][vc_column width="1/2" column_content_color="#ffffff"][brankic_section_title title_color="#b4574e" h_weight="700"]Based in Berlin, Germany[/brankic_section_title][brankic_divider style="divider blank" margin="5px auto"][vc_column_text]Contact us and let's make magic together. To send us a message
or just to say hello, please complete the form or contact us via
details listed below.
[/vc_column_text][brankic_divider align="left" style="divider blank"][vc_column_text highlight_background_color_1="rgba(255,255,255,0.14)"]
<h5><strong>Visit Us</strong></h5>
Hallesches Ufer 23,
10963 Berlin, Germany[/vc_column_text][brankic_divider width="width-10" color="rgba(255,255,255,0.3)" align="left" border_width="4"][vc_column_text]
<h5><strong>Give Us a Call</strong></h5>
+12 10963 - 578[/vc_column_text][brankic_divider width="width-10" color="rgba(255,255,255,0.3)" align="left" border_width="4"][vc_column_text]
<h5><strong>Say Hello</strong></h5>
<span style="color: #ffffff;"><a style="color: #ffffff;" href="#">myriad.theme@brankic.net</a></span>[/vc_column_text][/vc_column][vc_column width="1/2" shadow_color="rgba(0,0,0,0.1)" column_bg_color_1="#ffffff" css=".vc_custom_1530441306877{margin-bottom: -300px !important;padding-top: 50px !important;padding-right: 80px !important;padding-bottom: 50px !important;padding-left: 80px !important;border-radius: 5px !important;}"][brankic_contact_form_7 cf_7_id="8769" color="#999999" border_color="rgba(0,0,0,0.1)"][/vc_column][/vc_row][vc_row full_width="stretch_row_content" top_row_svg_mask_shape="slope" top_row_svg_mask_height="200px" top_row_svg_mask_fill_color="#fd8667"][vc_column][vc_column_text][wpgmza id="1"][/vc_column_text][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Contact - Minimal', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 163; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_contact'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Contact-Minimal.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" content_placement="bottom" css_animation="fadeIn" row_bg_color_1="#ffffff"][vc_column brankic_column_height="height-35" content_align="text-align-center" css=".vc_custom_1530086126359{padding-top: 150px !important;padding-bottom: 80px !important;}"][brankic_section_title title_color="#000000" h_tag="H1" h_transform="capitalize" p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#bbbbbb" small_title="Ready to chat about your next project" p_size_custom="13px"]Contact us[/brankic_section_title][vc_column_text highlight_text_color="#98e6da" highlight_hover_text_color="#ffffff" highlight_background_color_1="#000000" highlight_hover_background_color_1="#000000" css=".vc_custom_1530525856724{padding-top: 40px !important;padding-bottom: 40px !important;}"]
<h2><strong><span class="a_hover overlay"><a href="mailto:myriad.theme@brankic.net">myriad.theme@brankic.net</a></span></strong></h2>
[/vc_column_text][brankic_icon type="linea" icon_size="2" border_shape="" border_width="" border_color="" icon_shape_padding="0" heading_and_text="true" heading_color="#000000" heading_size="h4" heading_and_text_style="i-row heading-icon" heading_content_color="" icon_linea="icon icon-basic-smartphone" heading="+12 10963 – 578 "][/brankic_icon][/vc_column][/vc_row][vc_row full_width="stretch_row_content"][vc_column][vc_column_text][wpgmza id="1"][/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" css_animation="fadeIn" css=".vc_custom_1530113585529{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][brankic_section_title p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#bbbbbb" small_title="Available for freelance work" p_size_custom="13px"]Let’s make magic together.[/brankic_section_title][vc_column_text css=".vc_custom_1530525835989{padding-top: 20px !important;padding-bottom: 40px !important;}"]Contact us and let’s make magic together. To send us a message
or just to say hello, please complete the form or contact us via
details listed below.[/vc_column_text][brankic_contact_form_7 cf_7_id="8566" color="#bbbbbb" border_color="#dfe1e7"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Contact - Default', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 164; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_contact'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Contact-Default.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row_content" content_placement="middle"][vc_column content_align="text-align-center"][vc_column_text][wpgmza id="1"][/vc_column_text][/vc_column][/vc_row][vc_row][vc_column shadow_color="rgba(0,0,0,0.19)" column_bg_color_1="#485cc5" css=".vc_custom_1530481791408{margin-top: -100px !important;border-radius: 4px !important;}"][vc_row_inner equal_height="yes" row_inner_bg_repeat="repeat" brankic_grid="border_inner" brankic_grid_color="rgba(255,255,255,0.08)"][vc_column_inner width="1/3" css=".vc_custom_1530481199094{padding: 50px !important;}"][brankic_icon type="linea" icon_size="2" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="rgba(255,255,255,0.5)" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#ffffff" icon_linea="icon icon-basic-geolocalize-05" heading="Our Studio"]Hallesches Ufer 23,
10963 Berlin, Germany[/brankic_icon][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1530481215002{padding: 50px !important;}"][brankic_icon type="linea" icon_size="2" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="rgba(255,255,255,0.5)" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#ffffff" icon_linea="icon icon-basic-headset" heading="Call Directly"]+12 10963 – 578[/brankic_icon][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1530481226263{padding: 50px !important;}"][brankic_icon type="linea" icon_size="2" border_shape="" border_width="" border_color="" icon_shape_padding="0" icon_color="rgba(255,255,255,0.5)" heading_and_text="true" heading_color="#ffffff" heading_size="h5" heading_and_text_style="i-column" heading_content_color="#ffffff" icon_linea="icon icon-basic-mail-multiple" heading="Write to Us"]myriad.theme@brankic.net[/brankic_icon][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" gap="90" row_bg_align="brankic_bg_bottom_right" row_bg_size="contain" css=".vc_custom_1530481525243{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column width="1/3" css=".vc_custom_1530481513268{border-radius: 10px !important;}"][brankic_section_title p_size="custom" p_weight="700" p_transform="uppercase" small_title_color="#bbbbbb" small_title="Available for freelance work" p_size_custom="13px"]Let’s make magic together.[/brankic_section_title][vc_column_text css=".vc_custom_1530525084814{padding-top: 30px !important;}"]Contact us and let’s make magic together. To send us a message or just to say hello, please complete the form or contact us via details listed below.[/vc_column_text][/vc_column][vc_column width="2/3"][brankic_contact_form_7 cf_7_id="8771" color="#888888" border_color="#f5f7fa"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	
	
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Contact - Table Form Minimal', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 165; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_contact'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Contact-Table-Form-Minimal.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" gap="100" row_bg_align="brankic_bg_bottom_right" row_bg_size="contain" css=".vc_custom_1531054875102{padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column width="1/2"][brankic_section_title title_color="#fc466b" title_color_2="#3f5efb" h_tag="H4" p_transform="uppercase"]Contact us and let’s make magic together. To send us a message or just to say hello, please complete the form or contact us via details listed below.[/brankic_section_title][vc_column_text highlight_background_color_1="rgba(255,255,255,0.14)" css=".vc_custom_1531054809802{padding-top: 70px !important;padding-left: 70px !important;}"]<strong>Visit Us
</strong><span style="color: #aaaaaa;">Hallesches Ufer 23, Hallesches Ufer 23,</span>
<span style="color: #aaaaaa;">10963 Berlin, Germany</span>[/vc_column_text][vc_column_text css=".vc_custom_1531054834423{padding-top: 30px !important;padding-left: 70px !important;}"]<strong>Give Us a Call
</strong><span style="color: #aaaaaa;">+12 10963 - 578</span>[/vc_column_text][vc_column_text css=".vc_custom_1531054860508{padding-top: 30px !important;padding-left: 70px !important;}"]<strong>Say Hello
</strong><span style="color: #aaaaaa;"><a style="color: #aaaaaa;" href="#">myriad.theme@brankic.net</a></span>[/vc_column_text][vc_row_inner row_inner_bg_repeat="repeat" css=".vc_custom_1530623304168{padding-top: 70px !important;padding-left: 70px !important;}"][vc_column_inner][brankic_social_icons shape="icon-text"]facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979[/brankic_social_icons][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][brankic_contact_form_7 cf_7_id="8774" color="#aaaaaa" border_color="rgba(0,0,0,0.8)"][/vc_column][vc_column][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Contact - Equal Height / Gradient Style', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 166; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_contact'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/Contact-Equal-Height-Gradient-Style.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row_content" equal_height="yes" content_placement="middle" row_bg_align="brankic_bg_bottom"][vc_column width="1/2" brankic_column_height="height-100" column_bg_color_1="rgba(255,255,255,0.88)" css=".vc_custom_1532272002166{padding-top: 200px !important;padding-right: 30px !important;padding-bottom: 200px !important;padding-left: 30px !important;}" column_brankic_bg_image="9279" column_brankic_bg_image_extra="https://demo.brankic.net/myriad03/wp-content/uploads/2018/07/106.jpg"][vc_row_inner content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner width="2/3" centered="true"][brankic_section_title p_size="custom" p_transform="uppercase" p_spacing="2px" title="App design agency that run on coffee." small_title="Want to work with us?" p_size_custom="12px"]Let's Get in Touch[/brankic_section_title][vc_column_text css_animation="none" css=".vc_custom_1532273559735{padding-top: 10px !important;padding-bottom: 50px !important;}"]Contact us and let’s make magic together. To send us a message or just to say hello, please complete the form or contact us via details listed below.[/vc_column_text][vc_column_text highlight_background_color_1="rgba(255,255,255,0.14)" css=".vc_custom_1532272892813{padding-left: 70px !important;}"]<strong>Visit Us
</strong>Hallesches Ufer 23,
10963 Berlin, Germany[/vc_column_text][vc_column_text css=".vc_custom_1532272911148{padding-top: 30px !important;padding-left: 70px !important;}"]<strong>Give Us a Call
</strong>+12 10963 - 578[/vc_column_text][vc_column_text css=".vc_custom_1532273026673{padding-top: 30px !important;padding-left: 70px !important;}"]<strong>Say Hello
</strong><a href="#">myriad.theme@brankic.net</a>[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" content_align="text-align-right" column_content_color="#ffffff" column_bg_color_1="#ff5f6d" use_gradient_bg="true" column_gradient_direction="to bottom right" column_bg_color_2="#ffc371" css=".vc_custom_1532271989825{padding-top: 100px !important;padding-right: 30px !important;padding-bottom: 100px !important;padding-left: 30px !important;}"][vc_row_inner gap="60" row_inner_bg_repeat="repeat"][vc_column_inner width="1/2" centered="true"][brankic_contact_form_7 cf_7_id="8769" color="#ffffff" border_color="#ffffff"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );	

/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Call To Action - Minimal / Gradient bg', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 171; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_cta'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/CTA-Minimal-Gradient-bg-.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" content_placement="middle" row_bg_color_1="#ffffff" use_gradient_bg="true" row_gradient_direction="to bottom" row_bg_color_2="#e2e6f5" css=".vc_custom_1531262041113{padding-top: 150px !important;padding-bottom: 150px !important;}"][vc_column width="1/4" css=".vc_custom_1531261112330{padding-bottom: 80px !important;}"][/vc_column][vc_column width="1/2" content_align="text-align-center"][brankic_section_title h_tag="H3" p_size="custom" p_weight="700" p_transform="uppercase" small_title="About us" p_size_custom="13px"]Creativity is the process of
having original ideas that have value.[/brankic_section_title][brankic_divider style="divider blank" margin="25px auto"][brankic_button shape="radius" button_text="Find out more" size="large" text_color="#ffffff" bg_color="#5a76dd" bg_hover_color="" border_color="" border_hover_color="" shadow_color="rgba(105,90,221,0.2)"][vc_column_text]<small class="">Interested in a project? <span style="color: #ff0000;"><a style="color: #ff0004;" href="#">Contact us</a></span></small>[/vc_column_text][/vc_column][vc_column width="1/4"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Call To Action - Bg Image / Light Style', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 172; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_cta'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/CTA-Bg-Image-Light-Style.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" row_brankic_bg_image="9241" row_brankic_bg_image_extra="https://demo.brankic.net/myriad03/wp-content/uploads/2018/07/104.jpg"][vc_column width="1/2" css=".vc_custom_1531413452321{padding-top: 170px !important;padding-bottom: 170px !important;}"][brankic_section_title h_tag="H3" p_weight="700" small_title_color="#8790b2" small_title="Our main goal"]We aim beyond what we are capable of and deliver more than expected.[/brankic_section_title][brankic_divider style="divider blank"][brankic_button shape="radius" button_text="Meet the team" hover="dir-btt" text_color="#ffffff" bg_color="#fb857a" bg_hover_color="#31325c" border_color="" border_hover_color=""][/vc_column][vc_column width="1/2"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'Call To Action - Clients Combination', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 173; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_cta'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/CTA-Clients-Combination.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" content_placement="middle" row_bg_color_1="#31325c" css=".vc_custom_1531429186471{margin-top: 90px !important;}"][vc_column brankic_column_height="height-50" content_align="text-align-center" shadow_color="rgba(0,0,0,0.17)" column_bg_color_1="rgba(49,50,92,0.7)" use_gradient_bg="true" column_gradient_direction="to top" column_bg_color_2="rgba(49,50,92,0.4)" css=".vc_custom_1531426243831{margin-top: -90px !important;border-radius: 4px !important;}" column_brankic_bg_image="9126" column_brankic_bg_image_extra="https://demo.brankic.net/myriad02/wp-content/uploads/2017/04/103.jpg"][brankic_section_title title_color="#ffffff" h_tag="H3" h_transform="capitalize"]Why choose us?[/brankic_section_title][brankic_divider style="divider blank" margin="15px auto"][brankic_button shape="button-circle arrow-link" text_color="#ffffff" text_hover_color="#31325c" bg_color="" bg_hover_color="#ffffff" border_color="#ffffff" border_hover_color=""][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" row_bg_size="auto" row_bg_color_1="#31325c" css=".vc_custom_1531425181564{padding-top: 70px !important;}"][vc_column width="1/4" brankic_column_height="height-15" content_align="text-align-center"][brankic_image image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-5.png" hover="low-high" image="9217"][/vc_column][vc_column width="1/4" brankic_column_height="height-15" content_align="text-align-center" column_bg_size="auto"][brankic_image image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-10.png" hover="low-high" image="9221"][/vc_column][vc_column width="1/4" brankic_column_height="height-15" content_align="text-align-center"][brankic_image image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-12.png" hover="low-high" image="9223"][/vc_column][vc_column width="1/4" brankic_column_height="height-15" content_align="text-align-center"][brankic_image image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-6.png" hover="low-high" image="9218"][/vc_column][/vc_row][vc_row full_width="stretch_row" equal_height="yes" content_placement="middle" row_bg_color_1="#31325c" css=".vc_custom_1531303444041{padding-bottom: 70px !important;}"][vc_column width="1/4" brankic_column_height="height-15" content_align="text-align-center"][brankic_image image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-1.png" hover="low-high" image="9213"][/vc_column][vc_column width="1/4" brankic_column_height="height-15" content_align="text-align-center"][brankic_image image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-7.png" hover="low-high" image="9219"][/vc_column][vc_column width="1/4" brankic_column_height="height-15" content_align="text-align-center"][brankic_image image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-3.png" hover="low-high" image="9215"][/vc_column][vc_column width="1/4" brankic_column_height="height-15" content_align="text-align-center"][brankic_image image_extra="https://demo.brankic.net/zebrawp/wp-content/uploads/2018/05/l-lg-8.png" hover="low-high" image="9220"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'CTA - Rectangle Gradient Version', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 174; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_cta'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/CTA-Rectangle-Gradient-Version.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row][vc_column column_bg_color_1="#b24592" use_gradient_bg="true" column_gradient_direction="to right" column_bg_color_2="#f15f79" css=".vc_custom_1532470646456{border-radius: 4px !important;}"][vc_row_inner equal_height="yes" content_placement="middle" gap="40" row_inner_bg_repeat="repeat" css=".vc_custom_1532470394620{padding-top: 30px !important;padding-right: 50px !important;padding-bottom: 30px !important;padding-left: 50px !important;}"][vc_column_inner width="1/4" column_inner_content_color="#ffffff"][vc_column_text]
<h4>Drop us a line.</h4>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" column_inner_content_color="#ffffff"][vc_column_text]

Want to work with us? Contact us and let’s make magic together. We always deliver more than expected.

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/4" content_align="text-align-right"][brankic_button button_text="Get in touch" text_color="#832567" text_hover_color="#ffffff" border_color="" border_hover_color=""][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
	
/////////////////////////////////////////////////////////////////////
	
	$data               = array(); // Create new array
    $data['name']       = __( 'CTA - Minimal Gradient - Left Align', 'myriadwp' ); // Assign name for your custom template
    $data['weight']     = 175; // Weight of your template in the template list
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_cta'; // CSS class name
	$data['image_path'] = preg_replace( '/\s/', '%20', "https://demo.brankic.net/zebrawp/wp-content/uploads/2018/03/CTA-Minimal-Gradient-Left-Align.jpg" ); 
	$data['content']    = <<<CONTENT
	[vc_row full_width="stretch_row" content_placement="middle" row_bg_color_1="#ffffff" use_gradient_bg="true" row_gradient_direction="to bottom" row_bg_color_2="#e2e6f5" css=".vc_custom_1531262041113{padding-top: 150px !important;padding-bottom: 150px !important;}"][vc_column width="2/3"][brankic_section_title h_tag="H3" p_size="15px" p_weight="700" small_title="Contact us"]Creativity is the process of
having original ideas that have value.[/brankic_section_title][brankic_divider style="divider blank" margin="25px auto"][vc_row_inner equal_height="yes" content_placement="middle" row_inner_bg_repeat="repeat"][vc_column_inner][brankic_button shape="button-circle arrow-link" button_text="Interested in a project?" hover="dir-btt" text_color="" arrow_color="#ffffff" bg_color="#fb857a" bg_hover_color="#31325c" border_color="" border_hover_color="" shadow_color="rgba(105,90,221,0.2)"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/3" css=".vc_custom_1531261112330{padding-bottom: 80px !important;}"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );


	
}