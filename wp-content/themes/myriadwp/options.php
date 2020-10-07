<?php
$page_title = " Global Options";
$menu_title = "Myriad Panel";
$capability = "manage_options";
$menu_slug = "themes.php?page=options-framework";
$function = "";

function brankic_mytheme_add_admin() 
{
    global $page_title, $menu_title, $capability, $menu_slug, $function; 
	$hook = add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);
    add_action('admin_enqueue_scripts-' . $hook, 'my_admin_scripts');
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( function_exists('optionsframework_init') ) add_action('admin_menu', 'brankic_mytheme_add_admin');


/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appearm as if the options have been reset.
 *
 */
 
$custom_fmonts_array = array("google_web_font_1" => brankic_of_get_option("google_web_font_family_1", brankic_of_get_default("google_web_font_family_1")),
						   "google_web_font_2" => brankic_of_get_option("google_web_font_family_2", brankic_of_get_default("google_web_font_family_2")),
						   "google_web_font_3" => brankic_of_get_option("google_web_font_family_3", brankic_of_get_default("google_web_font_family_3")),
						   "google_web_font_4" => brankic_of_get_option("google_web_font_family_4", brankic_of_get_default("google_web_font_family_4")),
						   "custom"			   => esc_html__('Other font-family', 'myriadwp'), 
							); 

function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = "myriadwp";
	update_option('optionsframework', $optionsframework_settings);

}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

$google_web_font_family_1 = brankic_of_get_option("google_web_font_family_1", brankic_of_get_default("google_web_font_family_1"));

$google_web_font_family_2 = brankic_of_get_option("google_web_font_family_2", brankic_of_get_default("google_web_font_family_2"));

$google_web_font_family_3 = brankic_of_get_option("google_web_font_family_3", brankic_of_get_default("google_web_font_family_3"));

$google_web_font_family_4 = brankic_of_get_option("google_web_font_family_4", brankic_of_get_default("google_web_font_family_4"));

$custom_font_family_array = array($google_web_font_family_1 => $google_web_font_family_1, $google_web_font_family_2 => $google_web_font_family_2, $google_web_font_family_3 => $google_web_font_family_3, $google_web_font_family_4 => $google_web_font_family_4, "custom" => "Custom"); 
 



 
function optionsframework_options() {
	
	//Pull all google web font families, variants and subsets
	$google_web_fonts_families = brankic_google_web_fonts_arrays();
	$google_web_fonts_variants = brankic_google_web_fonts_arrays("variants");
	$google_web_fonts_subsets = brankic_google_web_fonts_arrays("subsets");
	
	
	
	global $custom_font_family_array;
	
	$brankic_testimonials_names_count = array();
	if (class_exists('Brankic_Shortcodes')) {
		$brankic_testimonials_names_count = get_option("brankic_testimonials_names_count");
		$brankic_testimonials_names_count = unserialize($brankic_testimonials_names_count);
		  
		if ($brankic_testimonials_names_count) $brankic_testimonials_names_count = array_flip($brankic_testimonials_names_count);
	}
	
	$all_authors = array();
	$blogusers = get_users( 'orderby=nicename' );
	// Array of WP_User objects.
	foreach ( $blogusers as $user ) {
		$all_authors[$user->ID] =  $user->display_name;
	}
	
	$yes_no = array(
		'yes' => esc_html__('Yes', 'myriadwp'),
		'no' => esc_html__('No', 'myriadwp')
	);
	
	$integer_array_9 = array(
		'1' => esc_html__('1', 'myriadwp'),
		'2' => esc_html__('2', 'myriadwp'),
		'3' => esc_html__('3', 'myriadwp'),
		'4' => esc_html__('4', 'myriadwp'),
		'5' => esc_html__('5', 'myriadwp'),
		'6' => esc_html__('6', 'myriadwp'),
		'7' => esc_html__('7', 'myriadwp'),
		'8' => esc_html__('8', 'myriadwp'),
		'9' => esc_html__('9', 'myriadwp')
	);
	
	$integer_array_30 = array(
		'1' => esc_html__('1', 'myriadwp'),
		'2' => esc_html__('2', 'myriadwp'),
		'3' => esc_html__('3', 'myriadwp'),
		'4' => esc_html__('4', 'myriadwp'),
		'5' => esc_html__('5', 'myriadwp'),
		'6' => esc_html__('6', 'myriadwp'),
		'7' => esc_html__('7', 'myriadwp'),
		'8' => esc_html__('8', 'myriadwp'),
		'9' => esc_html__('9', 'myriadwp'),
		'10' => esc_html__('10', 'myriadwp'),
		'11' => esc_html__('11', 'myriadwp'),
		'12' => esc_html__('12', 'myriadwp'),
		'13' => esc_html__('13', 'myriadwp'),
		'14' => esc_html__('14', 'myriadwp'),
		'15' => esc_html__('15', 'myriadwp'),
		'16' => esc_html__('16', 'myriadwp'),
		'17' => esc_html__('17', 'myriadwp'),
		'18' => esc_html__('18', 'myriadwp'),
		'19' => esc_html__('19', 'myriadwp'),
		'20' => esc_html__('20', 'myriadwp'),
		'21' => esc_html__('21', 'myriadwp'),
		'22' => esc_html__('22', 'myriadwp'),
		'23' => esc_html__('23', 'myriadwp'),
		'24' => esc_html__('24', 'myriadwp'),
		'25' => esc_html__('25', 'myriadwp'),
		'26' => esc_html__('26', 'myriadwp'),
		'27' => esc_html__('27', 'myriadwp'),
		'28' => esc_html__('28', 'myriadwp'),
		'29' => esc_html__('29', 'myriadwp'),
		'30' => esc_html__('30', 'myriadwp'),
	);
	
	$margins_array = array( 'auto' => 'auto',
							'margin-0' => '0px',
							'margin-10' => '10px',
							'margin-20' => '20px',
							'margin-30' => '30px',
							'margin-40' => '40px',
							'margin-50' => '50px',
							'margin-60' => '60px',
							'margin-70' => '70px',
							'margin-80' => '80px',
							'margin-90' => '90px',
							'margin-100' => '100px',
							'margin-110' => '110px',
							'margin-120' => '120px',
							'margin-130' => '130px',
							'margin-140' => '140px',
							'margin-150' => '150px',
							'margin-160' => '160px',
							'margin-170' => '170px',
							'margin-180' => '180px',
							'margin-190' => '190px',
							'margin-200' => '200px',
							'margin-210' => '210px',
							'margin-220' => '220px',
							'margin-230' => '230px',
							'margin-240' => '240px',
							'margin-250' => '250px',
							'margin-260' => '260px',
							'margin-270' => '270px',
							'margin-280' => '280px',
							'margin-290' => '290px',
							'margin-300' => '300px',
							'margin-310' => '310px',
							'margin-320' => '320px',
							'margin-330' => '330px',
							'margin-340' => '340px',
							'margin-350' => '350px',
							'margin-360' => '360px',
							'margin-370' => '370px',
							'margin-380' => '380px',
							'margin-390' => '390px',
							'margin-400' => '400px');
		
	$paddings_array = array('padding-0' => '0px',
							'padding-10' => '10px',
							'padding-20' => '20px',
							'padding-30' => '30px',
							'padding-40' => '40px',
							'padding-50' => '50px',
							'padding-60' => '60px',
							'padding-70' => '70px',
							'padding-80' => '80px',
							'padding-90' => '90px',
							'padding-100' => '100px',
							'padding-110' => '110px',
							'padding-120' => '120px',
							'padding-130' => '130px',
							'padding-140' => '140px',
							'padding-150' => '150px',
							'padding-160' => '160px',
							'padding-170' => '170px',
							'padding-180' => '180px',
							'padding-190' => '190px',
							'padding-200' => '200px',
							'padding-210' => '210px',
							'padding-220' => '220px',
							'padding-230' => '230px',
							'padding-240' => '240px',
							'padding-250' => '250px',
							'padding-260' => '260px',
							'padding-270' => '270px',
							'padding-280' => '280px',
							'padding-290' => '290px',
							'padding-300' => '300px',
							'padding-310' => '310px',
							'padding-320' => '320px',
							'padding-330' => '330px',
							'padding-340' => '340px',
							'padding-350' => '350px',
							'padding-360' => '360px',
							'padding-370' => '370px',
							'padding-380' => '380px',
							'padding-390' => '390px',
							'padding-400' => '400px');
	
	$width_array = array("fluid" 										=> "Fullwidth - no padding",
						 "boxed" 										=> "Boxed - no padding",
						 "boxed padding-right-50 padding-left-50" 		=> "Boxed - 50px padding",
						 "boxed padding-right-100 padding-left-100" 	=> "Boxed - 100px padding",
						 "boxed padding-right-150 padding-left-150" 	=> "Boxed - 150px padding",
						 "boxed padding-right-200 padding-left-200" 	=> "Boxed - 200px padding",
						 "fluid padding-right-50 padding-left-50" 		=> "Fullwidth - 50px padding",
						 "fluid padding-right-100 padding-left-100" 	=> "Fullwidth - 100px padding",
						 "fluid padding-right-150 padding-left-150" 	=> "Fullwidth - 150px padding",
						 "fluid padding-right-200 padding-left-200" 	=> "Fullwidth - 200px padding");
	
						   
				 
	$opacity_array = array(	"0" => "Transparent",
							"0.1" => "10%",
							"0.2" => "20%",
							"0.3" => "30%",
							"0.4" => "40%",
							"0.5" => "50%",
							"0.6" => "60%",
							"0.7" => "70%",
							"0.8" => "80%",
							"0.9" => "90%",
							"0.92" => "92%",
							"0.94" => "94%",
							"0.96" => "96%",
							"0.98" => "98%",
							"1" => "100%",
						);
						
	$duotone_array =array(
				"none"									=> "None",
				"custom"								=> "Custom",
				"duotone single-color effect-0" 		=> "Single 0",
				"duotone single-color effect-1" 		=> "Single 1",
				"duotone single-color effect-2" 		=> "Single 2",
				"duotone single-color effect-3" 		=> "Single 3",
				"duotone single-color effect-4" 		=> "Single 4",
				"duotone single-color effect-5" 		=> "Single 5",
				"duotone single-color effect-6" 		=> "Single 6",
				"duotone single-color effect-7" 		=> "Single 7",
				"duotone single-color effect-8" 		=> "Single 8",
				"duotone single-color effect-9" 		=> "Single 9",
				"duotone single-color effect-10" 		=> "Single 10",
				"duotone single-color effect-11" 		=> "Single 11",
				"duotone single-color effect-12" 		=> "Single 12",
				"duotone single-color effect-13" 		=> "Single 13",
				"duotone single-color effect-14" 		=> "Single 14",
				"duotone single-color effect-15" 		=> "Single 15",
				"duotone multi-color effect-1" 			=> "Multi 1",
				"duotone multi-color effect-2" 			=> "Multi 2",
				"duotone multi-color effect-3" 			=> "Multi 3",
				"duotone multi-color effect-4" 			=> "Multi 4",
				"duotone multi-color effect-5" 			=> "Multi 5",
				"duotone multi-color effect-6" 			=> "Multi 6",
				"duotone multi-color effect-7" 			=> "Multi 7",
				"duotone multi-color effect-8" 			=> "Multi 8",
				"duotone multi-color effect-9" 			=> "Multi 9",
				"duotone multi-color effect-10" 		=> "Multi 10",
			);	
	
	$wow_array = array(	"none" => "No effect",
						"bounce" => "bounce",
						"flash" => "flash",
						"pulse" => "pulse",
						"rubberBand" => "rubberBand",
						"shake" => "shake",
						"swing" => "swing",
						"tada" => "tada",
						"wobble" => "wobble",
						"jello" => "jello",
						"bounceIn" => "bounceIn",
						"bounceInDown" => "bounceInDown",
						"bounceInLeft" => "bounceInLeft",
						"bounceInRight" => "bounceInRight",
						"bounceInUp" => "bounceInUp",
						"bounceOut" => "bounceOut",
						"bounceOutDown" => "bounceOutDown",
						"bounceOutLeft" => "bounceOutLeft",
						"bounceOutRight" => "bounceOutRight",
						"bounceOutUp" => "bounceOutUp",
						"fadeIn" => "fadeIn",
						"fadeInDown" => "fadeInDown",
						"fadeInDownBig" => "fadeInDownBig",
						"fadeInLeft" => "fadeInLeft",
						"fadeInLeftBig" => "fadeInLeftBig",
						"fadeInRight" => "fadeInRight",
						"fadeInRightBig" => "fadeInRightBig",
						"fadeInUp" => "fadeInUp",
						"fadeInUpBig" => "fadeInUpBig",
						"fadeOut" => "fadeOut",
						"fadeOutDown" => "fadeOutDown",
						"fadeOutDownBig" => "fadeOutDownBig",
						"fadeOutLeft" => "fadeOutLeft",
						"fadeOutLeftBig" => "fadeOutLeftBig",
						"fadeOutRight" => "fadeOutRight",
						"fadeOutRightBig" => "fadeOutRightBig",
						"fadeOutUp" => "fadeOutUp",
						"fadeOutUpBig" => "fadeOutUpBig",
						"flip" => "flip",
						"flipInX" => "flipInX",
						"flipInY" => "flipInY",
						"flipOutX" => "flipOutX",
						"flipOutY" => "flipOutY",
						"lightSpeedIn" => "lightSpeedIn",
						"lightSpeedOut" => "lightSpeedOut",
						"rotateIn" => "rotateIn",
						"rotateInDownLeft" => "rotateInDownLeft",
						"rotateInDownRight" => "rotateInDownRight",
						"rotateInUpLeft" => "rotateInUpLeft",
						"rotateInUpRight" => "rotateInUpRight",
						"rotateOut" => "rotateOut",
						"rotateOutDownLeft" => "rotateOutDownLeft",
						"rotateOutDownRight" => "rotateOutDownRight",
						"rotateOutUpLeft" => "rotateOutUpLeft",
						"rotateOutUpRight" => "rotateOutUpRight",
						"slideInUp" => "slideInUp",
						"slideInDown" => "slideInDown",
						"slideInLeft" => "slideInLeft",
						"slideInRight" => "slideInRight",
						"slideOutUp" => "slideOutUp",
						"slideOutDown" => "slideOutDown",
						"slideOutLeft" => "slideOutLeft",
						"slideOutRight" => "slideOutRight",
						"zoomIn" => "zoomIn",
						"zoomInDown" => "zoomInDown",
						"zoomInLeft" => "zoomInLeft",
						"zoomInRight" => "zoomInRight",
						"zoomInUp" => "zoomInUp",
						"zoomOut" => "zoomOut",
						"zoomOutDown" => "zoomOutDown",
						"zoomOutLeft" => "zoomOutLeft",
						"zoomOutRight" => "zoomOutRight",
						"zoomOutUp" => "zoomOutUp",
						"hinge" => "hinge",
						"rollIn" => "rollIn",
						"rollOut" => "rollOut");
						
	$h_size_array = array("60px" => "60px",
						"50px" => "50px",
						"40px" => "40px",
						"30px" => "30px",
						"20px" => "20px",
						"15px" => "15px",
						"custom" => "Custom");
	
	$font_weight_array = array("normal" => "Normal",
						"900" => "900",
						"800" => "800",
						"700" => "700",
						"600" => "600",
						"500" => "500",
						"400" => "400",
						"300" => "300",
						"200" => "200",
						"100" => "100",
						"inherit" => "Inherit");
						
	$font_style_array = array("normal" => "Normal",
							"italic" => "Italic",
							"oblique" => "Oblique",
							"inherit" => "Inherit");

							
	$font_transform_array = array("none" => "None",
							"capitalize" => "Capitalize",
							"uppercase" => "UPPERCASE",
							"lowercase" => "lowercase",
							"inherit" => "Inherit");

	$font_spacing_array = array("0px" => "0px",
								"1px" => "1px",
								"2px" => "2px",
								"3px" => "3px",
								"4px" => "4px",
								"5px" => "5px",
								"6px" => "6px",
								"7px" => "7px",
								"8px" => "8px",
								"9px" => "9px",
								"10px" => "10px",
								"inherit" => "Inherit");							
	
	$font_height_array = array(	"15px" => "15px",
								"20px" => "20px",
								"30px" => "30px",
								"40px" => "40px",
								"50px" => "50px",
								"60px" => "60px",
								"0.8" => "80% of font size",
								"1" => "Same as font size",
								"1.1" => "110% of font size",
								"1.2" => "120% of font size",
								"1.3" => "130% of font size",
								"1.4" => "140% of font size",
								"1.5" => "150% of font size",
								"2" => "200% of font size",
								"inherit" => "Inherit",
								"custom" => "Custom");
								
	$font_height_array_without_custom = array(	"" => "Normal",
								"15px" => "15px",
								"20px" => "20px",
								"30px" => "30px",
								"40px" => "40px",
								"50px" => "50px",
								"60px" => "60px",
								"0.8" => "80% of font size",
								"1" => "Same as font size",
								"1.1" => "110% of font size",
								"1.2" => "120% of font size",
								"1.3" => "130% of font size",
								"1.4" => "140% of font size",
								"1.5" => "150% of font size",
								"2" => "200% of font size",
								"inherit" => "Inherit");
								
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/options/';

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}


	
	$options = array();
	
	

	$options[] = array(
		'name' => esc_html__('Basic', 'myriadwp'),
		'type' => 'heading');
		

	
	$options['default_content_width'] = array(
		'name' => esc_html__('Default content width', 'myriadwp'),		
		'id' => 'default_content_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1280px',
		'options' => array("fullwidth" => "Fullwidth",
							"1440px" => "1440 px",
							"1280px" => "1280 px",
							"1000px" => "1000 px"));

	$options['default_content_width_responsive'] = array(
		'name' => esc_html__('Change default content width on Tablet', 'myriadwp'),
		'id' => 'default_content_width_responsive',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['default_content_width_responsive_percent'] = array(
		'name' => esc_html__('Default content width on Tablet', 'myriadwp'),
		'id' => 'default_content_width_responsive_percent',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'tablet-width-70',
		'options' => array("tablet-width-70" => "70%",
							"tablet-width-80" => "80%",
							"tablet-width-90" => "90%"));							
		
	$options['default_content_bg_color'] = array(
		'name' => esc_html__('Content background color', 'myriadwp'),
		'id'   => 'default_content_bg_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		

		
	$options['default_margin'] = array(
		'name' => esc_html__('Default content margin', 'myriadwp'),		
		'id' => 'default_margin',
		'desc' => esc_html__('Can be override for each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'auto',
		'options' => array_merge(array('custom' => 'Custom'), $margins_array));	
		
	$options['default_top_margin'] = array(
		'name' => esc_html__('Default content top margin', 'myriadwp'),		
		'id' => 'default_top_margin',
		'desc' => esc_html__('Can be override for each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini inline', //mini, tiny, small
		'std' => 'auto',
		'options' => $margins_array);	
		
		
	$options['default_bottom_margin'] = array(
		'name' => esc_html__('Default content bottom margin', 'myriadwp'),		
		'id' => 'default_bottom_margin',
		'desc' => esc_html__('Can be override for each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini inline', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);
		
	$options['default_padding'] = array(
		'name' => esc_html__('Default content padding', 'myriadwp'),		
		'id' => 'default_padding',
		'desc' => esc_html__('Can be override for each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('Custom paddings', 'myriadwp'),
		'class' => 'group_options default_paddings',
		'type' => 'info');
	
	$options['default_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'default_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options default_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);	
		
	$options['default_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'default_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options default_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['default_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'default_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options default_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);
		
	$options['default_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'default_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options default_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
	

	$options['favicon'] = array(
		'name' => esc_html__('Favicon', 'myriadwp'),
		'id' => 'favicon',
		'std' => get_template_directory_uri() . '/images/logo.ico',
		'type' => 'upload');

	
	
	$options['page_sidebar'] = array(
		'name' => esc_html__('Default sidebar for pages', 'myriadwp'),		
		'id' => 'page_sidebar',
		'desc' => esc_html__('Can be overridden on each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => array("none" => "None",
		                   "custom_sidebar_1" => "Default Sidebar",
						   "custom_sidebar_2" => "Sidebar 2",
						   "custom_sidebar_3" => "Sidebar 3"));
	
	$options['page_sidebar_position'] = array(
		'name' => esc_html__('Sidebar position', 'myriadwp'),		
		'id' => 'page_sidebar_position',
		'desc' => esc_html__('Can be overridden on each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array("" => "Right",
						   "left" => "Left"));

		

	$options['page_transitions'] = array(
		'name' => esc_html__('Page transitions', 'myriadwp'),
		'id' => 'page_transitions',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'loading',
		'options' => array("loading" => "Loading Only",
							"fade_out_loading" => "Fade Out / Loading",
							"fade_out_fade_in" => "Fade Out / Fade In",
							"no" => "No")); 
							
	$options[] = array(
		'name' => esc_html__('Smooth scrolling', 'myriadwp'),
		'class' => 'group_options smooth_scroll',
		'type' => 'info');
	
	$options['smooth_scroll'] = array(
		'name' => esc_html__('&nbsp;', 'myriadwp'),		
		'id' => 'smooth_scroll',
		'type' => 'radio',
		'class' => 'mini inline group_options smooth_scroll wrap_it column-3', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['smooth_scroll_step'] = array(
		'name' => esc_html__('Steps', 'myriadwp'),
		'id' => 'smooth_scroll_step',
		'type' => 'select',
		'class' => 'mini inline group_options smooth_scroll wrap_it column-3', //mini, tiny, small
		'std' => '100',
		'options' => array("50" => "50",
							"100" => "100",
							"200" => "200",
							"400" => "400"));
							
	$options['smooth_scroll_speed'] = array(
		'name' => esc_html__('Speed', 'myriadwp'),
		'id' => 'smooth_scroll_speed',
		'type' => 'select',
		'class' => 'mini inline group_options smooth_scroll wrap_it column-3', //mini, tiny, small
		'std' => '800',
		'options' => array("100" => "100",
							"200" => "200",
							"400" => "400",
							"800" => "800",
							"1200" => "1200",
							"1600" => "1600"));

	$options['body_border'] = array(
		'name' => esc_html__('Body border', 'myriadwp'),		
		'id' => 'body_border',
		'desc' => esc_html__('Border around whole content', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['body_side_border'] = array(
		'name' => esc_html__('Side border', 'myriadwp'),		
		'id' => 'body_side_border',
		'desc' => esc_html__('Only left and right ', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['body_border_color'] = array(
		'name' => esc_html__('Body border color', 'myriadwp'),
		'id'   => 'body_border_color',
		'std'  => '#3f51b5',
		'type' => 'color' );

	$options['body_border_width'] = array(
		'name' => esc_html__('Body border width', 'myriadwp'),
		'id' => 'body_border_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'loading',
		'options' => array( "1px" => "1 px",
							"2px" => "2 px",
							"3px" => "3 px",
							"4px" => "4 px",
							"5px" => "5 px",
							"6px" => "6 px",
							"7px" => "7 px",
							"8px" => "8 px",
							"9px" => "9 px",
							"10px" => "10 px",
							"12px" => "12 px",
							"14px" => "14 px",
							"16px" => "16 px",
							"18px" => "18 px",
							"20px" => "20 px",
							"24px" => "24 px",
							"28px" => "28 px",
							"32px" => "32 px",
							"36px" => "36 px",
							"40px" => "40 px",
							"45px" => "45 px",
							"50px" => "50 px",
							"60px" => "60 px",
							"70px" => "70 px",
							"80px" => "80 px",
							"90px" => "90 px",
							"100px" => "100 px"));		
						   
	
	$options['extra_javascript'] = array(
		'name' => esc_html__('Extra JavaScript', 'myriadwp'),
		'id' => 'extra_javascript',
		'std' => 'jQuery(document).ready(function($) {
})',
		'type' => 'textarea');

	$options['extra_css'] = array(
		'name' => esc_html__('Extra CSS', 'myriadwp'),		
		'id' => 'extra_css',
		'std' => "",
		'type' => 'textarea');	

	$options['back_to_top'] = array(
		'name' => esc_html__('Back to Top', 'myriadwp'),		
		'id' => 'back_to_top',
		'desc' => esc_html__('Top arrow on the bottom of website', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
	
	$options['customize_cursor'] = array(
		'name' => esc_html__('Customize cursor', 'myriadwp'),		
		'id' => 'customize_cursor',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options[] = array(
		'name' => esc_html__('Cursor settings', 'myriadwp'),
		'class' => 'group_options customize_cursor',
		'id' => 'customize_cursor_info',
		'type' => 'info');
	
	$options['cursor_color'] = array(
		'name' => esc_html__('Cursor background color', 'myriadwp'),
		'id'   => 'cursor_color',
		'std'  => '#3f51b5',
		'class' => 'mini inline group_options customize_cursor wrap_it column-4', //mini, tiny, small
		'type' => 'color' );	
		
	$options['cursor_background_color'] = array(
		'name' => esc_html__('Cursor Ring Background color', 'myriadwp'),
		'id'   => 'cursor_background_color',
		'std'  => '',
		'class' => 'mini inline group_options customize_cursor wrap_it column-4', //mini, tiny, small
		'type' => 'color' );
		
	$options['cursor_border_color'] = array(
		'name' => esc_html__('Cursor ring border color', 'myriadwp'),
		'id'   => 'cursor_border_color',
		'std'  => '',
		'class' => 'mini inline group_options customize_cursor wrap_it column-4', //mini, tiny, small
		'type' => 'color' );
	
	$options['cursor_size'] = array(
		'name' => esc_html__('Cursor size', 'myriadwp'),
		'id'   => 'cursor_size',
		'std'  => 'medium',
		'class' => 'mini inline group_options customize_cursor wrap_it column-4', //mini, tiny, small
		'type'=> 'select',
		'options' => array( "small"  => "Small",
							"medium" => "Medium",
							"large"  => "Large"));
	
	$options['disable_responsive'] = array(
		'name' => esc_html__('Disable responsive layout', 'myriadwp'),		
		'id' => 'disable_responsive',
		'desc' => esc_html__('If you, for some reason, want to disable responsive layout on mobile and tablets', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['disable_sticky'] = array(
		'name' => esc_html__('Disable sticky sidebars', 'myriadwp'),		
		'id' => 'disable_sticky',
		'desc' => esc_html__('If you select YES sidebars will be regular', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);	
		
	$options['custom_sizes'] = array(
		'name' => esc_html__('Image custom sizes', 'myriadwp'),		
		'id' => 'custom_sizes',
		'std' => '',
		'desc' => esc_html__('Insert width and height of the new image size and start Regenerate thumbnails plugin', 'myriadwp'),
		'type' => 'text');	

if (class_exists('Brankic_Shortcodes')) {
	
	$options[] = array(
		'name' => esc_html__('Instagram options', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options instagram_options remove_wrapper');
	
	$options['instagram_20_token'] = array(
		'name' => esc_html__('Instagram 2020 Token', 'myriadwp'),		
		'id' => 'instagram_20_token',
		'std' => '',
		'desc' => esc_html__('You need only Token - https://developers.facebook.com/docs/instagram-basic-display-api/overview#user-token-generator', 'myriadwp'),
		'type' => 'text');
		
	
	$options['scroll_indicator'] = array(
		'name' => esc_html__('Scroll indicator', 'myriadwp'),		
		'id' => 'scroll_indicator',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options[] = array(
		'name' => esc_html__('Scroll indicator settings', 'myriadwp'),
		'class' => 'group_options scroll_indicator',
		'id' => 'scroll_indicator_info',
		'type' => 'info');
	
	$options['scroll_indicator_position'] = array(
		'name' => esc_html__('Speed', 'myriadwp'),
		'id' => 'scroll_indicator_position',
		'type' => 'select',
		'class' => 'mini inline group_options scroll_indicator wrap_it column-3',
		'std' => 'vertical middle',
		'options' => array("vertical middle" => "Right hand side middle",
							"vertical top" => "Right hand side top",
							"vertical bottom" => "Right hand side bottom",
							"vertical middle left" => "Left hand side middle",
							"vertical top left" => "Left hand side top",
							"vertical bottom left" => "Left hand side bottom",
							"horizontal top" => "Header top",
							"horizontal bottom" => "Header bottom",
							"lateral"			=> "In lateral menu",
							));
	
	$options['scroll_indicator_color'] = array(
		'name' => esc_html__('Indicator color', 'myriadwp'),
		'id'   => 'scroll_indicator_color',
		'class' => 'mini inline group_options scroll_indicator wrap_it column-3',
		'std'  => '#12c2e9',
		'type' => 'color' );
	
	$options['scroll_indicator_bg_color'] = array(
		'name' => esc_html__('Indicator background color', 'myriadwp'),
		'id'   => 'scroll_indicator_bg_color',
		'class' => 'mini inline group_options scroll_indicator wrap_it column-3',
		'std'  => '#fc9',
		'type' => 'color' );
		
	$options['scroll_indicator_thick'] = array(
		'name' => esc_html__('Thick', 'myriadwp'),
		'id' => 'scroll_indicator_thick',
		'type' => 'select',
		'class' => 'mini inline group_options scroll_indicator_2 wrap_it column-2',
		'std' => 'thick_5',
		'options' => array("thick_1" => "1 px",
							"thick_2" => "2 px",
							"thick_3" => "3 px",
							"thick_4" => "4 px",
							"thick_5" => "5 px",
							"thick_6" => "6 px",
							"thick_7" => "7 px",
							"thick_8" => "8 px",
							"thick_9" => "9 px",
							"thick_10" => "10 px",
							"thick_11" => "11 px",
							"thick_12" => "12 px",
							"thick_13" => "13 px",
							"thick_14" => "14 px",
							"thick_15" => "15 px",
							));
							
	$options['scroll_indicator_radius'] = array(
		'name' => esc_html__('Scroll indicator radius', 'myriadwp'),		
		'id' => 'scroll_indicator_radius',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array("radius_true" => "Yes",
							"" => "No",
							));
		
	$options['scroll_indicator_height'] = array(
		'name' => esc_html__('Height', 'myriadwp'),
		'id' => 'scroll_indicator_height',
		'type' => 'select',
		'class' => 'mini inline group_options scroll_indicator_2 wrap_it column-2',
		'std' => 'height_30',
		'options' => array("height_10" => "10%",
							"height_20" => "20%",
							"height_30" => "30%",
							"height_40" => "40%",
							"height_50" => "50%",
							"height_60" => "60%",
							"height_70" => "70%",
							"height_80" => "80%",
							"height_90" => "90%",
							));
		
		
}			
		
		
////////////////////////////////////////////////////////////////////////////
////////////////   COLOR SETTINGS    ////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

	$options[] = array(
		'name' => esc_html__('Color settings', 'myriadwp'),
		'type' => 'heading');

	$options['default_text_color'] = array(
		'name' => esc_html__('Text color', 'myriadwp'),
		'id'   => 'default_text_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__('Link colors', 'myriadwp'),
		'class' => 'group_options link_colors remove_wrapper',
		'type' => 'info');
	
	$options['default_link_color'] = array(
		'name' => esc_html__('Color', 'myriadwp'),
		'id'   => 'default_link_color',
		'std'  => '#fd8376',
		'class'=> 'group_options link_colors wrap_it column-2',
		'type' => 'color' );		
		
	$options['default_link_hover_color'] = array(
		'name' => esc_html__('Hover color', 'myriadwp'),
		'id'   => 'default_link_hover_color',
		'std'  => '#f44336',
		'class'=> 'group_options link_colors wrap_it column-2',
		'type' => 'color' );
	
	$options[] = array(
		'name' => esc_html__('Tag cloud (blog page)', 'myriadwp'),
		'class' => 'group_options tag_colors remove_wrapper',
		'type' => 'info');
	
	$options['default_tag_cloud_text_color'] = array(
		'name' => esc_html__('Text color ', 'myriadwp'),
		'id'   => 'default_tag_cloud_text_color',
		'std'  => '#fd8376',
		'class'=> 'group_options tag_colors wrap_it column-3',
		'type' => 'color' );
		
	$options['default_tag_cloud_text_hover_color'] = array(
		'name' => esc_html__('Text hover color', 'myriadwp'),
		'id'   => 'default_tag_cloud_text_hover_color',
		'std'  => '#fff',
		'class'=> 'group_options tag_colors wrap_it column-3',
		'type' => 'color' );
		
	$options['default_tag_cloud_bg_hover_color'] = array(
		'name' => esc_html__('Background hover color', 'myriadwp'),
		'id'   => 'default_tag_cloud_bg_hover_color',
		'std'  => '#fd8376',
		'class'=> 'group_options tag_colors wrap_it column-3',
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__('Tag cloud (blog single and sidebar)', 'myriadwp'),
		'class' => 'group_options tag_colors_ss remove_wrapper',
		'type' => 'info');
	
	$options['default_tag_cloud_text_color_single'] = array(
		'name' => esc_html__('Text color', 'myriadwp'),
		'id'   => 'default_tag_cloud_text_color_single',
		'std'  => '#fd8376',
		'class'=> 'group_options tag_colors_ss wrap_it column-3',
		'type' => 'color' );
		
	$options['default_tag_cloud_text_hover_color_single'] = array(
		'name' => esc_html__('Text hover color', 'myriadwp'),
		'id'   => 'default_tag_cloud_text_hover_color_single',
		'std'  => '#fff',
		'class'=> 'group_options tag_colors_ss wrap_it column-3',
		'type' => 'color' );
		
	$options['default_tag_cloud_bg_hover_color_single'] = array(
		'name' => esc_html__('Background hover color', 'myriadwp'),
		'id'   => 'default_tag_cloud_bg_hover_color_single',
		'std'  => '#fd8376',
		'class'=> 'group_options tag_colors_ss wrap_it column-3',
		'type' => 'color' );
	
	$options[] = array(
		'name' => esc_html__('Link and Quote', 'myriadwp'),
		'class' => 'group_options link_quote remove_wrapper',
		'type' => 'info');
		
	$options['default_link_quote_color'] = array(
		'name' => esc_html__('Text color', 'myriadwp'),
		'id'   => 'default_link_quote_color',
		'std'  => '',
		'class'=> 'group_options link_quote wrap_it column-2',
		'type' => 'color' );
	
	$options['default_link_quote_bg_color'] = array(
		'name' => esc_html__('Background color', 'myriadwp'),
		'id'   => 'default_link_quote_bg_color',
		'std'  => '#ffffff',
		'class'=> 'group_options link_quote wrap_it column-2',
		'type' => 'color' );	
		
		
	$options[] = array(
		'name' => esc_html__('Highlight colors', 'myriadwp'),
		'class' => 'group_options highlight_colors remove_wrapper',
		'type' => 'info');
	
	$options['default_highlight_text_color'] = array(
		'name' => esc_html__('Color', 'myriadwp'),
		'id'   => 'default_highlight_text_color',
		'std'  => '#ee0979',
		'class'=> 'group_options highlight_colors wrap_it column-3',
		'type' => 'color' );
		
	$options['default_highlight_text_bg_color'] = array(
		'name' => esc_html__('Background color', 'myriadwp'),
		'id'   => 'default_highlight_text_bg_color',
		'std'  => '#ffffff',
		'class'=> 'group_options highlight_colors wrap_it column-3',
		'type' => 'color' );

	$options['default_highlight_text_bg_color_2'] = array(
		'name' => esc_html__('Background color 2', 'myriadwp'),
		'id'   => 'default_highlight_text_bg_color_2',
		'std'  => '#fffcb8',
		'class'=> 'group_options highlight_colors wrap_it column-3',
		'type' => 'color' );	

	$options[] = array(
		'name' => esc_html__('Sidebar colors', 'myriadwp'),
		'class' => 'group_options sidebar_link remove_wrapper',
		'type' => 'info');
	
	$options['default_sidebar_title_color'] = array(
		'name' => esc_html__('Title Color', 'myriadwp'),
		'id'   => 'default_sidebar_title_color',
		'std'  => '#232635',
		'class'=> 'group_options sidebar_link wrap_it column-2',
		'type' => 'color' );
	
	$options['default_sidebar_text_color'] = array(
		'name' => esc_html__('Text Color', 'myriadwp'),
		'id'   => 'default_sidebar_text_color',
		'std'  => '#232635',
		'class'=> 'group_options sidebar_link wrap_it column-2',
		'type' => 'color' );
	
	$options['default_sidebar_link_color'] = array(
		'name' => esc_html__('Link Color', 'myriadwp'),
		'id'   => 'default_sidebar_link_color',
		'std'  => '#fd8376',
		'class'=> 'group_options sidebar_link wrap_it column-2',
		'type' => 'color' );		
		
	$options['default_sidebar_link_hover_color'] = array(
		'name' => esc_html__('Hover color', 'myriadwp'),
		'id'   => 'default_sidebar_link_hover_color',
		'std'  => '#fd8376',
		'class'=> 'group_options sidebar_link wrap_it column-2',
		'type' => 'color' );
				
		
		
	
////////////////////////////////////////////////////////////////////////////
////////////////   SOCIAL    ////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////		
		
		
	$options[] = array(
		'name' => esc_html__('Social Sharing', 'myriadwp'),
		'type' => 'heading');
		
	$options['enable_social_sharing_pages'] = array(
		'name' => esc_html__('Social sharing for pages', 'myriadwp'),		
		'id' => 'enable_social_sharing_pages',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['enable_social_sharing_posts'] = array(
		'name' => esc_html__('Social sharing for posts', 'myriadwp'),		
		'id' => 'enable_social_sharing_posts',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
if (class_exists('Brankic_Shortcodes')) {
	
	$options['enable_social_sharing_portfolio_items'] = array(
		'name' => esc_html__('Social sharing for portfolio items', 'myriadwp'),		
		'id' => 'enable_social_sharing_portfolio_items',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
}
	
	$options[] = array(
		'name' => esc_html__('Icon Options', 'myriadwp'),
		'class' => '',
		'type' => 'info');
		
	$options['social_shape'] = array(
		'name' => esc_html__('Icons shape', 'myriadwp'),
		'id' => 'social_shape',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'default',
		'options' => array("circle" => "Circle",
							"diamond" => "Diamond",
							"rectangle" => "Rectangle",
							"default" => "Default"));
	
	$options['social_color'] = array(
		'name' => esc_html__('Icon color', 'myriadwp'),
		'id'   => 'social_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['social_icon_hover_color'] = array(
		'name' => esc_html__('Icon hover color', 'myriadwp'),
		'id'   => 'social_icon_hover_color',
		'std'  => '',
		'type' => 'color' );
	
	$options['social_bg_color'] = array(
		'name' => esc_html__('Background color', 'myriadwp'),
		'id'   => 'social_bg_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['social_bg_hover_color'] = array(
		'name' => esc_html__('Background hover color', 'myriadwp'),
		'id'   => 'social_bg_hover_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['social_border_color'] = array(
		'name' => esc_html__('Border color', 'myriadwp'),
		'id'   => 'social_border_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['social_border_hover_color'] = array(
		'name' => esc_html__('Border hover color', 'myriadwp'),
		'id'   => 'social_border_hover_color',
		'std'  => '',
		'type' => 'color' );
		
	
		
	$options[] = array(
		'name' => esc_html__('Sharing Options', 'myriadwp'),
		'class' => '',
		'type' => 'info');
	
	$options['social_facebook'] = array(
		'name' => esc_html__('Facebook share', 'myriadwp'),		
		'id' => 'social_facebook',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
		
	$options['social_twitter'] = array(
		'name' => esc_html__('Twitter share', 'myriadwp'),		
		'id' => 'social_twitter',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
	
	$options['social_linkedin'] = array(
		'name' => esc_html__('LinkedIn share', 'myriadwp'),		
		'id' => 'social_linkedin',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
		
	$options['social_google_plus'] = array(
		'name' => esc_html__('Google Plus share', 'myriadwp'),		
		'id' => 'social_google_plus',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
	
	$options['social_tumblr'] = array(
		'name' => esc_html__('Tumblr share', 'myriadwp'),		
		'id' => 'social_tumblr',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
		
	$options['social_pinterest'] = array(
		'name' => esc_html__('Pinterest share', 'myriadwp'),		
		'id' => 'social_pinterest',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
	
////////////////////////////////////////////////////////////////////////////
////////////////   TYPOGRAPHY    ////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////		
	
 	$options[] = array(
		'name' => esc_html__('Typography', 'myriadwp'),
		'type' => 'heading');
		
		$options[] = array(
		'name' => esc_html__('Google Web Fonts', 'myriadwp'),
		'class' => '',
		'type' => 'info');
		
	$options['google_web_fonts_key'] = array(
		'name' => esc_html__('Google API key', 'myriadwp'),		
		'id' => 'google_web_fonts_key',
		'std' => 'AIzaSyDyqU9gAqgfD9btpFY_0Yay6R9Zz1pMMoA',
		'desc' => esc_html__('Get the key at https://developers.google.com/fonts/docs/developer_api', 'myriadwp'),
		'type' => 'text');		
	
	$options['google_web_font_family_1'] = array(
		'name' => esc_html__('Google Web Font family 1', 'myriadwp'),
		'desc' => esc_html__('The quick brown fox jumps over a lazy dog', 'myriadwp'),
		'id' => 'google_web_font_family_1',
		'type' => 'select',
		'class' => 'mini',
		'std' => 'Poppins',
		'options' => $google_web_fonts_families);
				
	$options['google_web_font_family_variants_and_subsets_1'] = array(
		'name' => esc_html__('Google Web Font family, variants and subsets 1', 'myriadwp'),		
		'id' => 'google_web_font_family_variants_and_subsets_1',
		'std' => 'Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin-ext,latin,devanagari',
		'class' => 'maxi',
		'type' => 'text');	

	$options['google_web_font_family_2'] = array(
		'name' => esc_html__('Google Web Font family 2', 'myriadwp'),
		'desc' => esc_html__('The quick brown fox jumps over a lazy dog', 'myriadwp'),
		'id' => 'google_web_font_family_2',
		'type' => 'select',
		'class' => 'mini', 
		'std' => '',
		'options' => $google_web_fonts_families);
				
	$options['google_web_font_family_variants_and_subsets_2'] = array(
		'name' => esc_html__('Google Web Font family, variants and subsets 2', 'myriadwp'),		
		'id' => 'google_web_font_family_variants_and_subsets_2',
		'std' => '',
		'class' => 'maxi',
		'type' => 'text');
	
 	$options['google_web_font_family_3'] = array(
		'name' => esc_html__('Google Web Font family 3', 'myriadwp'),
		'desc' => esc_html__('The quick brown fox jumps over a lazy dog', 'myriadwp'),
		'id' => 'google_web_font_family_3',
		'type' => 'select',
		'class' => 'mini',
		'std' => '',
		'options' => $google_web_fonts_families);
				
	$options['google_web_font_family_variants_and_subsets_3'] = array(
		'name' => esc_html__('Google Web Font family, variants and subsets 3', 'myriadwp'),		
		'id' => 'google_web_font_family_variants_and_subsets_3',
		'std' => '',
		'class' => 'maxi',
		'type' => 'text'); 	

 	$options['google_web_font_family_4'] = array(
		'name' => esc_html__('Google Web Font family 4', 'myriadwp'),
		'desc' => esc_html__('The quick brown fox jumps over a lazy dog', 'myriadwp'),
		'id' => 'google_web_font_family_4',
		'type' => 'select',
		'class' => 'mini',
		'std' => '',
		'options' => $google_web_fonts_families);
				
	$options['google_web_font_family_variants_and_subsets_4'] = array(
		'name' => esc_html__('Google Web Font family, variants and subsets 4', 'myriadwp'),		
		'id' => 'google_web_font_family_variants_and_subsets_4',
		'std' => '',
		'class' => 'maxi',
		'type' => 'text');	
	
	
	$options[] = array(
		'name' => esc_html__('Each font has it\'s own class, so you can use it in Visual Composer.', 'myriadwp'), 
		'type' => 'info');
		

	
	$options['main_font'] = array(
		'name' => esc_html__('Main font', 'myriadwp'),
		'id'	=> 'main_font',
		'std'	=> 'Poppins',
		'type' => 'select',
		'options' => $custom_font_family_array);
		
	$options['main_font_custom'] = array(
		'name' => esc_html__('Use some standard font for whole site (Arial, Vedrana, Times New Roman...', 'myriadwp'),
		'id' => 'main_font_custom',
		'std' => 'Arial',
		'type' => 'text');
		
	$options['main_font_size'] = array(
		'name' => esc_html__('Main font size', 'myriadwp'),
		'id' => 'main_font_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '16px',
		'options' => array("12px" => "12px",
						"13px" => "13px",
						"14px" => "14px",
						"15px" => "15px",
						"16px" => "16px",
						"17px" => "17px",
						"18px" => "18px",
						"19px" => "19px",
						"20px" => "20px",
						"custom" => "Custom"));
	
	$options['main_font_size_custom'] = array(
		'name' => esc_html__('Custom Main font font-size', 'myriadwp'),		
		'id' => 'main_font_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['main_font_weight'] = array(
		'name' => esc_html__('Main font weight', 'myriadwp'),
		'id' => 'main_font_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '400',
		'options' => $font_weight_array);
		
	$options['main_font_style'] = array(
		'name' => esc_html__('Main font style', 'myriadwp'),
		'id' => 'main_font_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);
	
	$options['main_font_spacing'] = array(
		'name' => esc_html__('Main font spacing', 'myriadwp'),
		'id' => 'main_font_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['main_font_height'] = array(
		'name' => esc_html__('Main font height', 'myriadwp'),
		'id' => 'main_font_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1.5',
		'options' => $font_height_array);
		
	$options['main_font_height_custom'] = array(
		'name' => esc_html__('Custom Main font line-height', 'myriadwp'),		
		'id' => 'main_font_height_custom',
		'std' => '',
		'type' => 'text');		
	
	
		
	$options['headings_font'] = array(
		'name' => esc_html__('Headings (H1, H2 ... H6) font', 'myriadwp'),
		'id'	=> 'headings_font',
		'std'	=> 'Poppins',
		'type' => 'select',
		'options' => $custom_font_family_array);
		
	$options['headings_font_custom'] = array(
		'name' => esc_html__('Use some standard font for Headers (Arial, Vedrana, Times New Roman...', 'myriadwp'),
		'id' => 'headings_font_custom',
		'std' => 'Poppins',
		'type' => 'text');
	
	$options['menu_font'] = array(
		'name' => esc_html__('Menu font', 'myriadwp'),
		'id'	=> 'menu_font',
		'std'	=> 'Poppins',
		'type' => 'select',
		'options' => $custom_font_family_array);
	
	$options['menu_font_custom'] = array(
		'name' => esc_html__('Use some standard font for Menus (Arial, Vedrana, Times New Roman...', 'myriadwp'),
		'id' => 'menu_font_custom',
		'std' => 'Arial',
		'type' => 'text');
		
	$options['mobile_menu_font'] = array(
		'name' => esc_html__('Mobile menu font', 'myriadwp'),
		'id'	=> 'mobile_menu_font',
		'std'	=> 'Poppins',
		'type' => 'select',
		'options' => $custom_font_family_array);
	
	$options['mobile_menu_font_custom'] = array(
		'name' => esc_html__('Use some standard font for Mobile Menus (Arial, Vedrana, Times New Roman...', 'myriadwp'),
		'id' => 'mobile_menu_font_custom',
		'std' => 'Arial',
		'type' => 'text');
		
	$options[] = array(
		'name' => esc_html__('Sidebar Title Settings', 'myriadwp'),
		'type' => 'info');
		
	$options['sidebar_title_font_family'] = array(
		'name' => esc_html__('Title font family', 'myriadwp'),		
		'id' => 'sidebar_title_font_family',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'google_web_font_1',
		'options' => array(""      => "None",
							"google_web_font_1" => "Google Web Font 1",
							"google_web_font_2" => "Google Web Font 2",
							"google_web_font_3" => "Google Web Font 3",
							"google_web_font_4" => "Google Web Font 4",
							"custom" 			=> "Custom"));	 		
		
		
	$options['sidebar_title_custom_font_family'] = array(
		'name' => esc_html__('Custom Title font family', 'myriadwp'),		
		'id' => 'sidebar_title_custom_font_family',
		'std' => '',
		'type' => 'text');	
	
	$options['sidebar_title_size'] = array(
		'name' => esc_html__('Title size', 'myriadwp'),
		'id' => 'sidebar_title_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '20px',
		'options' => $h_size_array);
	
	$options['sidebar_title_size_custom'] = array(
		'name' => esc_html__('Custom Title font-size', 'myriadwp'),		
		'id' => 'sidebar_title_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['sidebar_title_weight'] = array(
		'name' => esc_html__('Title weight', 'myriadwp'),
		'id' => 'sidebar_title_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '600',
		'options' => $font_weight_array);
		
	$options['sidebar_title_style'] = array(
		'name' => esc_html__('Title style', 'myriadwp'),
		'id' => 'sidebar_title_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['sidebar_title_transform'] = array(
		'name' => esc_html__('Title transform', 'myriadwp'),
		'id' => 'sidebar_title_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'capitalize',
		'options' => $font_transform_array);
		
	$options['sidebar_title_spacing'] = array(
		'name' => esc_html__('Title spacing', 'myriadwp'),
		'id' => 'sidebar_title_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '0',
		'options' => $font_spacing_array);
		
	$options['sidebar_title_height'] = array(
		'name' => esc_html__('Title height', 'myriadwp'),
		'id' => 'sidebar_title_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['sidebar_title_height_custom'] = array(
		'name' => esc_html__('Custom Title line-height', 'myriadwp'),		
		'id' => 'sidebar_title_height_custom',
		'std' => '',
		'type' => 'text');
	
		
		
		
		
	$options[] = array(
		'name' => esc_html__('H1 Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['h1_size'] = array(
		'name' => esc_html__('H1 size', 'myriadwp'),
		'id' => 'h1_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '50px',
		'options' => $h_size_array);
	
	$options['h1_size_custom'] = array(
		'name' => esc_html__('Custom H1 font-size', 'myriadwp'),		
		'id' => 'h1_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['h1_weight'] = array(
		'name' => esc_html__('H1 weight', 'myriadwp'),
		'id' => 'h1_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '500',
		'options' => $font_weight_array);
		
	$options['h1_style'] = array(
		'name' => esc_html__('H1 style', 'myriadwp'),
		'id' => 'h1_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['h1_transform'] = array(
		'name' => esc_html__('H1 transform', 'myriadwp'),
		'id' => 'h1_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => $font_transform_array);
		
	$options['h1_spacing'] = array(
		'name' => esc_html__('H1 spacing', 'myriadwp'),
		'id' => 'h1_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h1_height'] = array(
		'name' => esc_html__('H1 height', 'myriadwp'),
		'id' => 'h1_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1.4',
		'options' => $font_height_array);
		
	$options['h1_height_custom'] = array(
		'name' => esc_html__('Custom H1 line-height', 'myriadwp'),		
		'id' => 'h1_height_custom',
		'std' => '',
		'type' => 'text');
		
	$options['h1_r1'] = array(
		'name' => esc_html__('Responsive settings Tablet', 'myriadwp'),
		'id' => 'h1_r1',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h1_size_r1'] = array(
		'name' => esc_html__('H1 size', 'myriadwp'),
		'id' => 'h1_size_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '60px',
		'options' => $h_size_array);
	
	$options['h1_size_custom_r1'] = array(
		'name' => esc_html__('Custom H1 font-size', 'myriadwp'),		
		'id' => 'h1_size_custom_r1',
		'std' => '',
		'type' => 'text');
	

		
	$options['h1_spacing_r1'] = array(
		'name' => esc_html__('H1 spacing', 'myriadwp'),
		'id' => 'h1_spacing_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h1_height_r1'] = array(
		'name' => esc_html__('H1 height', 'myriadwp'),
		'id' => 'h1_height_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h1_height_custom_r1'] = array(
		'name' => esc_html__('Custom H1 line-height', 'myriadwp'),		
		'id' => 'h1_height_custom_r1',
		'std' => '',
		'type' => 'text');
		
	$options['h1_r2'] = array(
		'name' => esc_html__('Responsive settings Phone', 'myriadwp'),
		'id' => 'h1_r2',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h1_size_r2'] = array(
		'name' => esc_html__('H1 size', 'myriadwp'),
		'id' => 'h1_size_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '60px',
		'options' => $h_size_array);
	
	$options['h1_size_custom_r2'] = array(
		'name' => esc_html__('Custom H1 font-size', 'myriadwp'),		
		'id' => 'h1_size_custom_r2',
		'std' => '',
		'type' => 'text');
	

		
	$options['h1_spacing_r2'] = array(
		'name' => esc_html__('H1 spacing', 'myriadwp'),
		'id' => 'h1_spacing_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h1_height_r2'] = array(
		'name' => esc_html__('H1 height', 'myriadwp'),
		'id' => 'h1_height_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h1_height_custom_r2'] = array(
		'name' => esc_html__('Custom H1 line-height', 'myriadwp'),		
		'id' => 'h1_height_custom_r2',
		'std' => '',
		'type' => 'text');

		
	$options[] = array(
		'name' => esc_html__('H2 Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['h2_size'] = array(
		'name' => esc_html__('H2 size', 'myriadwp'),
		'id' => 'h2_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '42px',
		'options' => $h_size_array);
	
	$options['h2_size_custom'] = array(
		'name' => esc_html__('Custom H2 font-size', 'myriadwp'),		
		'id' => 'h2_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['h2_weight'] = array(
		'name' => esc_html__('H2 weight', 'myriadwp'),
		'id' => 'h2_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '500',
		'options' => $font_weight_array);
		
	$options['h2_style'] = array(
		'name' => esc_html__('H2 style', 'myriadwp'),
		'id' => 'h2_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['h2_transform'] = array(
		'name' => esc_html__('H2 transform', 'myriadwp'),
		'id' => 'h2_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => $font_transform_array);
		
	$options['h2_spacing'] = array(
		'name' => esc_html__('H2 spacing', 'myriadwp'),
		'id' => 'h2_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h2_height'] = array(
		'name' => esc_html__('H2 height', 'myriadwp'),
		'id' => 'h2_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1.4',
		'options' => $font_height_array);
		
	$options['h2_height_custom'] = array(
		'name' => esc_html__('Custom H2 line-height', 'myriadwp'),		
		'id' => 'h2_height_custom',
		'std' => '',
		'type' => 'text');
		
	
	$options['h2_r1'] = array(
		'name' => esc_html__('Responsive settings Tablet', 'myriadwp'),
		'id' => 'h2_r1',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h2_size_r1'] = array(
		'name' => esc_html__('H2 size', 'myriadwp'),
		'id' => 'h2_size_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '50px',
		'options' => $h_size_array);
	
	$options['h2_size_custom_r1'] = array(
		'name' => esc_html__('Custom H2 font-size', 'myriadwp'),		
		'id' => 'h2_size_custom_r1',
		'std' => '',
		'type' => 'text');

		
	$options['h2_spacing_r1'] = array(
		'name' => esc_html__('H2 spacing', 'myriadwp'),
		'id' => 'h2_spacing_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h2_height_r1'] = array(
		'name' => esc_html__('H2 height', 'myriadwp'),
		'id' => 'h2_height_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h2_height_custom_r1'] = array(
		'name' => esc_html__('Custom H2 line-height', 'myriadwp'),		
		'id' => 'h2_height_custom_r1',
		'std' => '',
		'type' => 'text');
		
	$options['h2_r2'] = array(
		'name' => esc_html__('Responsive settings Phone', 'myriadwp'),
		'id' => 'h2_r2',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h2_size_r2'] = array(
		'name' => esc_html__('H2 size', 'myriadwp'),
		'id' => 'h2_size_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '50px',
		'options' => $h_size_array);
	
	$options['h2_size_custom_r2'] = array(
		'name' => esc_html__('Custom H2 font-size', 'myriadwp'),		
		'id' => 'h2_size_custom_r2',
		'std' => '',
		'type' => 'text');

		
	$options['h2_spacing_r2'] = array(
		'name' => esc_html__('H2 spacing', 'myriadwp'),
		'id' => 'h2_spacing_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h2_height_r2'] = array(
		'name' => esc_html__('H2 height', 'myriadwp'),
		'id' => 'h2_height_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h2_height_custom_r2'] = array(
		'name' => esc_html__('Custom H2 line-height', 'myriadwp'),		
		'id' => 'h2_height_custom_r2',
		'std' => '',
		'type' => 'text');


	$options[] = array(
		'name' => esc_html__('H3 Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['h3_size'] = array(
		'name' => esc_html__('H3 size', 'myriadwp'),
		'id' => 'h3_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '35px',
		'options' => $h_size_array);
	
	$options['h3_size_custom'] = array(
		'name' => esc_html__('Custom H3 font-size', 'myriadwp'),		
		'id' => 'h3_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['h3_weight'] = array(
		'name' => esc_html__('H3 weight', 'myriadwp'),
		'id' => 'h3_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '500',
		'options' => $font_weight_array);
		
	$options['h3_style'] = array(
		'name' => esc_html__('H3 style', 'myriadwp'),
		'id' => 'h3_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['h3_transform'] = array(
		'name' => esc_html__('H3 transform', 'myriadwp'),
		'id' => 'h3_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => $font_transform_array);
		
	$options['h3_spacing'] = array(
		'name' => esc_html__('H3 spacing', 'myriadwp'),
		'id' => 'h3_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h3_height'] = array(
		'name' => esc_html__('H3 height', 'myriadwp'),
		'id' => 'h3_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1.5',
		'options' => $font_height_array);
		
	$options['h3_height_custom'] = array(
		'name' => esc_html__('Custom H3 line-height', 'myriadwp'),		
		'id' => 'h3_height_custom',
		'std' => '',
		'type' => 'text');
		
		$options['h3_r1'] = array(
		'name' => esc_html__('Responsive settings Tablet', 'myriadwp'),
		'id' => 'h3_r1',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h3_size_r1'] = array(
		'name' => esc_html__('H3 size', 'myriadwp'),
		'id' => 'h3_size_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '40px',
		'options' => $h_size_array);
	
	$options['h3_size_custom_r1'] = array(
		'name' => esc_html__('Custom H3 font-size', 'myriadwp'),		
		'id' => 'h3_size_custom_r1',
		'std' => '',
		'type' => 'text');
	
	

		
	$options['h3_spacing_r1'] = array(
		'name' => esc_html__('H3 spacing', 'myriadwp'),
		'id' => 'h3_spacing_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h3_height_r1'] = array(
		'name' => esc_html__('H3 height', 'myriadwp'),
		'id' => 'h3_height_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h3_height_custom_r1'] = array(
		'name' => esc_html__('Custom H3 line-height', 'myriadwp'),		
		'id' => 'h3_height_custom_r1',
		'std' => '',
		'type' => 'text');
		
	$options['h3_r2'] = array(
		'name' => esc_html__('Responsive settings Phone', 'myriadwp'),
		'id' => 'h3_r2',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h3_size_r2'] = array(
		'name' => esc_html__('H3 size', 'myriadwp'),
		'id' => 'h3_size_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '40px',
		'options' => $h_size_array);
	
	$options['h3_size_custom_r2'] = array(
		'name' => esc_html__('Custom H3 font-size', 'myriadwp'),		
		'id' => 'h3_size_custom_r2',
		'std' => '',
		'type' => 'text');
	
	

		
	$options['h3_spacing_r2'] = array(
		'name' => esc_html__('H3 spacing', 'myriadwp'),
		'id' => 'h3_spacing_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h3_height_r2'] = array(
		'name' => esc_html__('H3 height', 'myriadwp'),
		'id' => 'h3_height_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h3_height_custom_r2'] = array(
		'name' => esc_html__('Custom H3 line-height', 'myriadwp'),		
		'id' => 'h3_height_custom_r2',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => esc_html__('H4 Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['h4_size'] = array(
		'name' => esc_html__('H4 size', 'myriadwp'),
		'id' => 'h4_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '28px',
		'options' => $h_size_array);
	
	$options['h4_size_custom'] = array(
		'name' => esc_html__('Custom H4 font-size', 'myriadwp'),		
		'id' => 'h4_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['h4_weight'] = array(
		'name' => esc_html__('H4 weight', 'myriadwp'),
		'id' => 'h4_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '500',
		'options' => $font_weight_array);
		
	$options['h4_style'] = array(
		'name' => esc_html__('H4 style', 'myriadwp'),
		'id' => 'h4_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['h4_transform'] = array(
		'name' => esc_html__('H4 transform', 'myriadwp'),
		'id' => 'h4_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => $font_transform_array);
		
	$options['h4_spacing'] = array(
		'name' => esc_html__('H4 spacing', 'myriadwp'),
		'id' => 'h4_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h4_height'] = array(
		'name' => esc_html__('H4 height', 'myriadwp'),
		'id' => 'h4_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1.6',
		'options' => $font_height_array);
		
	$options['h4_height_custom'] = array(
		'name' => esc_html__('Custom H4 line-height', 'myriadwp'),		
		'id' => 'h4_height_custom',
		'std' => '',
		'type' => 'text');
		
	$options['h4_r1'] = array(
		'name' => esc_html__('Responsive settings Tablet', 'myriadwp'),
		'id' => 'h4_r1',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h4_size_r1'] = array(
		'name' => esc_html__('H4 size', 'myriadwp'),
		'id' => 'h4_size_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '30px',
		'options' => $h_size_array);
	
	$options['h4_size_custom_r1'] = array(
		'name' => esc_html__('Custom H4 font-size', 'myriadwp'),		
		'id' => 'h4_size_custom_r1',
		'std' => '',
		'type' => 'text');
	

		
	$options['h4_spacing_r1'] = array(
		'name' => esc_html__('H4 spacing', 'myriadwp'),
		'id' => 'h4_spacing_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h4_height_r1'] = array(
		'name' => esc_html__('H4 height', 'myriadwp'),
		'id' => 'h4_height_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h4_height_custom_r1'] = array(
		'name' => esc_html__('Custom H4 line-height', 'myriadwp'),		
		'id' => 'h4_height_custom_r1',
		'std' => '',
		'type' => 'text');
		
	$options['h4_r2'] = array(
		'name' => esc_html__('Responsive settings Phone', 'myriadwp'),
		'id' => 'h4_r2',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h4_size_r2'] = array(
		'name' => esc_html__('H4 size', 'myriadwp'),
		'id' => 'h4_size_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '30px',
		'options' => $h_size_array);
	
	$options['h4_size_custom_r2'] = array(
		'name' => esc_html__('Custom H4 font-size', 'myriadwp'),		
		'id' => 'h4_size_custom_r2',
		'std' => '',
		'type' => 'text');
	

		
	$options['h4_spacing_r2'] = array(
		'name' => esc_html__('H4 spacing', 'myriadwp'),
		'id' => 'h4_spacing_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h4_height_r2'] = array(
		'name' => esc_html__('H4 height', 'myriadwp'),
		'id' => 'h4_height_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h4_height_custom_r2'] = array(
		'name' => esc_html__('Custom H4 line-height', 'myriadwp'),		
		'id' => 'h4_height_custom_r2',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => esc_html__('H5 Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['h5_size'] = array(
		'name' => esc_html__('H5 size', 'myriadwp'),
		'id' => 'h5_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '20px',
		'options' => $h_size_array);
	
	$options['h5_size_custom'] = array(
		'name' => esc_html__('Custom H5 font-size', 'myriadwp'),		
		'id' => 'h5_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['h5_weight'] = array(
		'name' => esc_html__('H5 weight', 'myriadwp'),
		'id' => 'h5_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '500',
		'options' => $font_weight_array);
		
	$options['h5_style'] = array(
		'name' => esc_html__('H5 style', 'myriadwp'),
		'id' => 'h5_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['h5_transform'] = array(
		'name' => esc_html__('H5 transform', 'myriadwp'),
		'id' => 'h5_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => $font_transform_array);
		
	$options['h5_spacing'] = array(
		'name' => esc_html__('H5 spacing', 'myriadwp'),
		'id' => 'h5_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h5_height'] = array(
		'name' => esc_html__('H5 height', 'myriadwp'),
		'id' => 'h5_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1.5',
		'options' => $font_height_array);
		
	$options['h5_height_custom'] = array(
		'name' => esc_html__('Custom H5 line-height', 'myriadwp'),		
		'id' => 'h5_height_custom',
		'std' => '',
		'type' => 'text');
		
	$options['h5_r1'] = array(
		'name' => esc_html__('Responsive settings Tablet', 'myriadwp'),
		'id' => 'h5_r1',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h5_size_r1'] = array(
		'name' => esc_html__('H5 size', 'myriadwp'),
		'id' => 'h5_size_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '20px',
		'options' => $h_size_array);
	
	$options['h5_size_custom_r1'] = array(
		'name' => esc_html__('Custom H5 font-size', 'myriadwp'),		
		'id' => 'h5_size_custom_r1',
		'std' => '',
		'type' => 'text');
	

		
	$options['h5_spacing_r1'] = array(
		'name' => esc_html__('H5 spacing', 'myriadwp'),
		'id' => 'h5_spacing_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h5_height_r1'] = array(
		'name' => esc_html__('H5 height', 'myriadwp'),
		'id' => 'h5_height_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h5_height_custom_r1'] = array(
		'name' => esc_html__('Custom H5 line-height', 'myriadwp'),		
		'id' => 'h5_height_custom_r1',
		'std' => '',
		'type' => 'text');
		
	$options['h5_r2'] = array(
		'name' => esc_html__('Responsive settings Phone', 'myriadwp'),
		'id' => 'h5_r2',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['h5_size_r2'] = array(
		'name' => esc_html__('H5 size', 'myriadwp'),
		'id' => 'h5_size_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '20px',
		'options' => $h_size_array);
	
	$options['h5_size_custom_r2'] = array(
		'name' => esc_html__('Custom H5 font-size', 'myriadwp'),		
		'id' => 'h5_size_custom_r2',
		'std' => '',
		'type' => 'text');
	

		
	$options['h5_spacing_r2'] = array(
		'name' => esc_html__('H5 spacing', 'myriadwp'),
		'id' => 'h5_spacing_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h5_height_r2'] = array(
		'name' => esc_html__('H5 height', 'myriadwp'),
		'id' => 'h5_height_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h5_height_custom_r2'] = array(
		'name' => esc_html__('Custom H5 line-height', 'myriadwp'),		
		'id' => 'h5_height_custom_r2',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => esc_html__('H6 Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['h6_size'] = array(
		'name' => esc_html__('H6 size', 'myriadwp'),
		'id' => 'h6_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '16px',
		'options' => $h_size_array);
	
	$options['h6_size_custom'] = array(
		'name' => esc_html__('Custom H6 font-size', 'myriadwp'),		
		'id' => 'h6_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['h6_weight'] = array(
		'name' => esc_html__('H6 weight', 'myriadwp'),
		'id' => 'h6_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '500',
		'options' => $font_weight_array);
		
	$options['h6_style'] = array(
		'name' => esc_html__('H6 style', 'myriadwp'),
		'id' => 'h6_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['h6_transform'] = array(
		'name' => esc_html__('H6 transform', 'myriadwp'),
		'id' => 'h6_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => $font_transform_array);
		
	$options['h6_spacing'] = array(
		'name' => esc_html__('H6 spacing', 'myriadwp'),
		'id' => 'h6_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h6_height'] = array(
		'name' => esc_html__('h6 height', 'myriadwp'),
		'id' => 'h6_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1.6',
		'options' => $font_height_array);
		
	$options['h6_height_custom'] = array(
		'name' => esc_html__('Custom H6 line-height', 'myriadwp'),		
		'id' => 'h6_height_custom',
		'std' => '',
		'type' => 'text');		
		
	$options['h6_r1'] = array(
		'name' => esc_html__('Responsive settings Tablet', 'myriadwp'),
		'id' => 'h6_r1',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);	
	
	$options['h6_size_r1'] = array(
		'name' => esc_html__('H6 size', 'myriadwp'),
		'id' => 'h6_size_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '15px',
		'options' => $h_size_array);
	
	$options['h6_size_custom_r1'] = array(
		'name' => esc_html__('Custom H6 font-size', 'myriadwp'),		
		'id' => 'h6_size_custom_r1',
		'std' => '',
		'type' => 'text');
	

	$options['h6_spacing_r1'] = array(
		'name' => esc_html__('H6 spacing', 'myriadwp'),
		'id' => 'h6_spacing_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h6_height_r1'] = array(
		'name' => esc_html__('h6 height', 'myriadwp'),
		'id' => 'h6_height_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h6_height_custom_r1'] = array(
		'name' => esc_html__('Custom H6 line-height', 'myriadwp'),		
		'id' => 'h6_height_custom_r1',
		'std' => '',
		'type' => 'text');

	$options['h6_r2'] = array(
		'name' => esc_html__('Responsive settings Phone', 'myriadwp'),
		'id' => 'h6_r2',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);

	
	$options['h6_size_r2'] = array(
		'name' => esc_html__('H6 size', 'myriadwp'),
		'id' => 'h6_size_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '15px',
		'options' => $h_size_array);
	
	$options['h6_size_custom_r2'] = array(
		'name' => esc_html__('Custom H6 font-size', 'myriadwp'),		
		'id' => 'h6_size_custom_r2',
		'std' => '',
		'type' => 'text');
	

	$options['h6_spacing_r2'] = array(
		'name' => esc_html__('H6 spacing', 'myriadwp'),
		'id' => 'h6_spacing_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['h6_height_r2'] = array(
		'name' => esc_html__('h6 height', 'myriadwp'),
		'id' => 'h6_height_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['h6_height_custom_r2'] = array(
		'name' => esc_html__('Custom H6 line-height', 'myriadwp'),		
		'id' => 'h6_height_custom_r2',
		'std' => '',
		'type' => 'text');
	
	
		
	
	
////////////////////////////////////////////////////////////////////////////
////////////////   HEADER    ///////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////	
	
	$options[] = array(
		'name' => esc_html__('Menu', 'myriadwp'),
		'type' => 'heading');
		
	$options['logo-primary'] = array(
		'name' => esc_html__('Logo', 'myriadwp'),
		'desc' => esc_html__('Main logo. Dark version', 'myriadwp'),
		'id' => 'logo-primary',
		'std' => get_template_directory_uri() . '/images/logo.png',
		'type' => 'upload');
		
	$options['logo-primary-retina'] = array(
		'name' => esc_html__('Logo Retina', 'myriadwp'),
		'desc' => esc_html__('Twice bigger for better resolution on Retina display', 'myriadwp'),
		'id' => 'logo-primary-retina',
		'std' => get_template_directory_uri() . '/images/logo-retina.png',
		'type' => 'upload');
		
	$options['logo-secondary'] = array(
		'name' => esc_html__('Logo 2', 'myriadwp'),
		'desc' => esc_html__('If primary logo isn\'t visible because of background image, you should define secondary logo (lighter). ', 'myriadwp'),
		'id' => 'logo-secondary',
		'std' => get_template_directory_uri() . '/images/logo-light.png',
		'type' => 'upload');
		
	$options['logo-secondary-retina'] = array(
		'name' => esc_html__('Logo 2 Retina', 'myriadwp'),
		'desc' => esc_html__('Twice bigger for better resolution on Retina display', 'myriadwp'),
		'id' => 'logo-secondary-retina',
		'std' => get_template_directory_uri() . '/images/logo-retina-light.png',
		'type' => 'upload');
		
	
	$options['header_style'] = array(
		'name' => esc_html__('Header style for entire site', 'myriadwp'),		
		'id' => 'header_style',
		'type' => 'images',
		'class' => '', //mini, tiny, small
		'std' => 'default',
		'options' => array("default" => $imagepath . 'menu-l-m-w.jpg',
						   "lateral-left" => $imagepath . 'menu-lateral.jpg',
						   "lateral-toggle-flex" => $imagepath . 'menu-lateral-flex.jpg',
						   "lateral-toggle-left" => $imagepath . 'menu-lateral-toggle-left.jpg',
						   ));
						   

	$options['default_header_menu_align'] = array(
		'name' => esc_html__('Default header align', 'myriadwp'),		
		'id' => 'default_header_menu_align',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'right',
		'options' => array("left" => "Left",
						   "center" => "Center",
						   "right" => "Right",
						   ));
						   
	$options['lateral_toggle_left_padding'] = array(
		'name' => esc_html__('Lateral Toggle Left menu padding', 'myriadwp'),		
		'id' => 'lateral_toggle_left_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'padding-30',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('Lateral Toggle Left Menu custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options lateral_toggle_left');
	
	$options['lateral_toggle_left_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'lateral_toggle_left_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_start group_options lateral_toggle_left wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);	
		
	$options['lateral_toggle_left_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'lateral_toggle_left_right_padding',
		'type' => 'select',
		'class' => 'small inline group_options lateral_toggle_left wrap_it column-4', //mini, tiny, small
		'std' => 'padding-20',
		'options' => $paddings_array);
		
	$options['lateral_toggle_left_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'lateral_toggle_left_bottom_padding',
		'type' => 'select',
		'class' => 'tiny inline group_options lateral_toggle_left wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['lateral_toggle_left_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'lateral_toggle_left_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_end group_options lateral_toggle_left wrap_it column-4', //mini, tiny, small
		'std' => 'padding-20',
		'options' => $paddings_array);
	
	
	$options['lateral_toggle_left_button_vert_align'] = array(
		'name' => esc_html__('Lateral Toggle Left toggle button (3 lines) vertical align', 'myriadwp'),		
		'id' => 'lateral_toggle_left_button_vert_align',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("" => "Top",
						   "middle" => "Middle",
						   ));
						   
	$options['lateral_toggle_flex_button_vert_align'] = array(
		'name' => esc_html__('Lateral Toggle Flex button vertical align', 'myriadwp'),		
		'id' => 'lateral_toggle_flex_button_vert_align',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("" => "Top",
						   "middle" => "Middle",
						   ));

		$options['lateral_toggle_flex_padding'] = array(
		'name' => esc_html__('Lateral Toggle Flex menu padding', 'myriadwp'),		
		'id' => 'lateral_toggle_flex_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'padding-30',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('Lateral Toggle Flex Menu custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options lateral_toggle_flex');
	
	$options['lateral_toggle_flex_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'lateral_toggle_flex_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_start group_options lateral_toggle_flex wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);	
		
	$options['lateral_toggle_flex_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'lateral_toggle_flex_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options lateral_toggle_flex wrap_it column-4', //mini, tiny, small
		'std' => 'padding-20',
		'options' => $paddings_array);
		
	$options['lateral_toggle_flex_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'lateral_toggle_flex_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options lateral_toggle_flex wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['lateral_toggle_flex_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'lateral_toggle_flex_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_end group_options lateral_toggle_flex wrap_it column-4', //mini, tiny, small
		'std' => 'padding-20',
		'options' => $paddings_array);	
		
	$options['lateral_left_menu_vert_align'] = array(
		'name' => esc_html__('Lateral Left Menu vertical align', 'myriadwp'),		
		'id' => 'lateral_left_menu_vert_align',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("" => "Top",
						   "middle" => "Middle",
						   ));

	$options['lateral_left_padding'] = array(
		'name' => esc_html__('Lateral Left menu padding', 'myriadwp'),		
		'id' => 'lateral_left_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'padding-30',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('Lateral Left Menu custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options lateral_left');
	
	$options['lateral_left_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'lateral_left_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_start group_options lateral_left wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);	
		
	$options['lateral_left_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'lateral_left_right_padding',
		'type' => 'select',
		'class' => 'small inline group_options lateral_left wrap_it column-4', //mini, tiny, small
		'std' => 'padding-20',
		'options' => $paddings_array);
		
	$options['lateral_left_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'lateral_left_bottom_padding',
		'type' => 'select',
		'class' => 'tiny inline group_options lateral_left wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['lateral_left_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'lateral_left_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_end group_options lateral_left wrap_it column-4', //mini, tiny, small
		'std' => 'padding-20',
		'options' => $paddings_array);		
		
 	$options['default_header_layout'] = array(
		'name' => esc_html__('Default header layout', 'myriadwp'),		
		'id' => 'default_header_layout',
		'desc' => esc_html__('3lines triggers overlay menu', 'myriadwp'),
		'type' => 'images',
		'class' => '', //mini, tiny, small
		'std' => 'lmw',
		'options' => array("lmw" => $imagepath . 'menu-l-m-w.jpg',
						   "mlw" => $imagepath . 'menu-m-l-w.jpg',
						   "l3w" => $imagepath . 'menu-l-3-w.jpg',
						   "3lw" => $imagepath . 'menu-3-l-w.jpg',
						   "wl3" => $imagepath . 'menu-w-l-3.jpg',
						   "lm" => $imagepath . 'menu-l-m.jpg',
						   "ml" => $imagepath . 'menu-m-l.jpg',
						   "mw" => $imagepath . 'menu-m-w.jpg',
						   "wm" => $imagepath . 'menu-w-m.jpg',
						   "l3" => $imagepath . 'menu-l-3.jpg',
						   "3l" => $imagepath . 'menu-3-l.jpg',
						   "m" => $imagepath . 'menu-m.jpg',)); 
						   
	$options['default_header_3lines_overlay'] = array(
		'name' => esc_html__('Overlay / 3 lines menu type', 'myriadwp'),		
		'id' => 'default_header_3lines_overlay',
		'type' => 'images',
		'std' => 'flow',
		'options' => array("flow" => $imagepath . 'menu-flow.jpg',
						   "overlay-bg-image" => $imagepath . 'menu-background-image.jpg',
						   "overlay-bg-color" => $imagepath . 'menu-background-color.jpg',
						   "lateral-toggle-right-hidden" => $imagepath . 'menu-right-toggle.jpg',
						   "lateral-toggle-left-hidden" => $imagepath . 'menu-left-toggle.jpg',
						   "lateral-toggle-top-hidden" => $imagepath . 'menu-top-toggle.jpg',
						   ));
						   

						   
	$options['extra_header_show'] = array(
		'name' => esc_html__('Show Extra header', 'myriadwp'),
		'desc' => esc_html__('Additional header row', 'myriadwp'),
		'id' => 'extra_header_show',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['extra_header_layout'] = array(
		'name' => esc_html__('Extra header Layout', 'myriadwp'),		
		'id' => 'extra_header_layout',
		'type' => 'images',
		'class' => '', //mini, tiny, small
		'std' => 'ww',
		'options' => array("www" => $imagepath . 'extra-menu-w-w-w.jpg',
						   "wwl" => $imagepath . 'extra-menu-w-w-l.jpg',
						   "wlw" => $imagepath . 'extra-menu-w-l-w.jpg',
						   "lww" => $imagepath . 'extra-menu-l-w-w.jpg',
						   "ww" => $imagepath . 'extra-menu-w-w.jpg',
						   "wl" => $imagepath . 'extra-menu-w-l.jpg',
						   "lw" => $imagepath . 'extra-menu-l-w.jpg',
						   "l" => $imagepath . 'extra-menu-l.jpg',
						   "w" => $imagepath . 'extra-menu-w.jpg'));	
	
	$options[] = array(
		'name' => esc_html__('Extra header Options', 'myriadwp'),
		'class' => 'group_options extra_header_options remove_wrapper',
		'type' => 'info');
	
						   
	$options['extra_header_menu_position'] = array(
		'name' => esc_html__('Menu position', 'myriadwp'),		
		'id' => 'extra_header_menu_position',
		'type' => 'select',
		'class' => 'group_options extra_header_options wrap_it column-2', //mini, tiny, small
		'std' => 'above',
		'options' => array("above" => "Above",
						   "below" => "Below" ));
						   
						   
	$options['extra_header_menu_align'] = array(
		'name' => esc_html__('Align', 'myriadwp'),		
		'id' => 'extra_header_menu_align',
		'type' => 'select',
		'class' => 'group_options extra_header_options wrap_it column-2', //mini, tiny, small
		'std' => 'center',
		'options' => array("left" => "Left",
						   "center" => "Center",
						   "right" => "Right",
						   ));
						   
	
	
	
	$options['searchbar'] = array(
		'name' => esc_html__('Searchbar', 'myriadwp'),
		'desc' => esc_html__('Add search icon (magnifying glass) to the menu (to visible header menus)', 'myriadwp'),
		'id' => 'searchbar',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);	
		
	$options['search_woo_where'] = array(
		'name' => esc_html__('Search and WooCommerce icons(if selected) position', 'myriadwp'),	
		'desc' => esc_html__('These icons will be shown in the last widget area in the row', 'myriadwp'),		
		'id' => 'search_woo_where',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'default_header',
		'options' => array("default_header" => "Default Header",
						   "extra_header" => "Extra Header" ));
						   
	$options['default_header_menu_toggle'] = array(
		'name' => esc_html__('Header Menu toggle', 'myriadwp'),
		'desc' => esc_html__('Header menu is shown if you click 3 lines menu', 'myriadwp'),
		'id' => 'default_header_menu_toggle',
		'type' => 'radio',
		'class' => '', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
			
	$options['overlay_bg_hover_hover_colors'] = array(
		'name' => esc_html__('Background colors for overlay background colors menu', 'myriadwp'),
		'desc' => esc_html__('Comma separated color codes', 'myriadwp'),
		'id' => 'overlay_bg_hover_hover_colors',
		'std' => 'red, blue',
		'class' => 'maxi',
		'type' => 'text');
	
	$options['default_header_fixed'] = array(
		'name' => esc_html__('Fixed header', 'myriadwp'),
		'desc' => esc_html__('Header is fixed on the top of the page', 'myriadwp'),
		'id' => 'default_header_fixed',
		'type' => 'radio',
		'class' => '', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
		
	
	
	$options[] = array(
		'name' => esc_html__('Headers visibility', 'myriadwp'),
		'type' => 'info',
		'id' => 'extra_default_visible',
		'class' => 'group_options extra_default_visible remove_wrapper');
	
	$options['default_header_menu_always_visible'] = array(
		'name' => esc_html__('Default header menu always visible', 'myriadwp'),		
		'id' => 'default_header_menu_always_visible',
		'type' => 'select',
		'class' => 'group_options extra_default_visible wrap_it column-2', //mini, tiny, small
		'std' => 'no',
		'options' => array("no" => "No",
						   "yes" => "Yes" ));
						   
	$options['extra_header_menu_always_visible'] = array(
		'name' => esc_html__('Extra Header Menu always visible', 'myriadwp'),		
		'id' => 'extra_header_menu_always_visible',
		'type' => 'select',
		'class' => 'group_options extra_default_visible wrap_it column-2', //mini, tiny, small
		'std' => 'no',
		'options' => array("no" => "No",
						   "yes" => "Yes" ));
		
	$options['default_header_overflow'] = array(
		'name' => esc_html__('Header overflow', 'myriadwp'),
		'desc' => esc_html__('Header is above the content, or overflows it. Automaticaly sets header postition to fixed', 'myriadwp'),
		'id' => 'default_header_overflow',
		'type' => 'radio',
		'class' => '', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
	
	$options['default_header_scroll_top_visible'] = array(
		'name' => esc_html__('Scroll to top visible', 'myriadwp'),
		'desc' => esc_html__('Header is hidden unless page is scrolled up', 'myriadwp'),
		'id' => 'default_header_scroll_top_visible',
		'type' => 'radio',
		'class' => '', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
		
	$options['default_header_border'] = array(
		'name' => esc_html__('Border visible', 'myriadwp'),
		'id' => 'default_header_border',
		'type' => 'radio',
		'class' => '', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	
	$options['default_header_fullwidth'] = array(
		'name' => esc_html__('Default Header Fullwidth', 'myriadwp'),		
		'id' => 'default_header_fullwidth',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['default_header_padding_left_right'] = array(
		'name' => esc_html__('Default header left and right padding', 'myriadwp'),		
		'id' => 'default_header_padding_left_right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '30px',
		'options' => array( "0px"  => "0 px",
							"10px" => "10 px",
							"20px" => "20 px",
							"30px" => "30 px",
							"40px" => "40 px",
							"50px" => "50 px"));
							
	$options[] = array(
		'name' => esc_html__('Default header paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options default_header_padding_top_bottom default_header_padding_top_bottom_title remove_wrapper');
	
	$options['default_header_padding_top'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'default_header_padding_top',
		'type' => 'select',
		'class' => 'mini group_options default_header_padding_top_bottom wrap_it column-2', //mini, tiny, small
		'std' => '20px',
		'options' => array( "0px"  => "0 px",
							"2px"  => "2 px",
							"4px"  => "4 px",
							"6px"  => "6 px",
							"8px"  => "8 px",
							"10px" => "10 px",
							"12px" => "12 px",
							"14px" => "14 px",
							"16px" => "16 px",
							"18px" => "18 px",
							"20px" => "20 px",
							"25px" => "25 px",
							"30px" => "30 px",
							"35px" => "35 px",
							"40px" => "40 px",
							"45px" => "45 px",
							"50px" => "50 px"));
							
	$options['default_header_padding_bottom'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'default_header_padding_bottom',
		'type' => 'select',
		'class' => 'mini group_options default_header_padding_top_bottom wrap_it column-2', //mini, tiny, small
		'std' => '20px',
		'options' => array( "0px"  => "0 px",
							"2px"  => "2 px",
							"4px"  => "4 px",
							"6px"  => "6 px",
							"8px"  => "8 px",
							"10px" => "10 px",
							"12px" => "12 px",
							"14px" => "14 px",
							"16px" => "16 px",
							"18px" => "18 px",
							"20px" => "20 px",
							"25px" => "25 px",
							"30px" => "30 px",
							"35px" => "35 px",
							"40px" => "40 px",
							"45px" => "45 px",
							"50px" => "50 px"));
							
	$options[] = array(
		'name' => esc_html__('Extra header paddings', 'myriadwp'),
		'type' => 'info',
		'id' => 'extra_header_paddings',
		'class' => 'group_options extra_header_padding_top_bottom extra_header_padding_top_bottom_title remove_wrapper');
		
	$options['extra_header_padding_top'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'extra_header_padding_top',
		'type' => 'select',
		'class' => 'mini group_options extra_header_padding_top_bottom wrap_it column-2', //mini, tiny, small
		'std' => '20px',
		'options' => array( "0px"  => "0 px",
							"2px"  => "2 px",
							"4px"  => "4 px",
							"6px"  => "6 px",
							"8px"  => "8 px",
							"10px" => "10 px",
							"12px" => "12 px",
							"14px" => "14 px",
							"16px" => "16 px",
							"18px" => "18 px",
							"20px" => "20 px",
							"25px" => "25 px",
							"30px" => "30 px",
							"35px" => "35 px",
							"40px" => "40 px",
							"45px" => "45 px",
							"50px" => "50 px"));
	
	$options['extra_header_padding_bottom'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'extra_header_padding_bottom',
		'type' => 'select',
		'class' => 'mini group_options extra_header_padding_top_bottom wrap_it column-2', //mini, tiny, small
		'std' => '20px',
		'options' => array( "0px"  => "0 px",
							"2px"  => "2 px",
							"4px"  => "4 px",
							"6px"  => "6 px",
							"8px"  => "8 px",
							"10px" => "10 px",
							"12px" => "12 px",
							"14px" => "14 px",
							"16px" => "16 px",
							"18px" => "18 px",
							"20px" => "20 px",
							"25px" => "25 px",
							"30px" => "30 px",
							"35px" => "35 px",
							"40px" => "40 px",
							"45px" => "45 px",
							"50px" => "50 px"));
							
	
	$options['compact_default_header_on_scroll'] = array(
		'name' => esc_html__('Compact Header on scroll', 'myriadwp'),
		'desc' => esc_html__('Header menu with smaller top and bottom padding on scroll', 'myriadwp'),
		'id' => 'compact_default_header_on_scroll',
		'type' => 'radio',
		'class' => '', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
		$options['compact_logo'] = array(
		'name' => esc_html__('Compact header logo resize', 'myriadwp'),		
		'id' => 'compact_logo',
		'type' => 'select',
		'std' => '',
		'options' => array("" => "No resize",
						   ".9" => "90%",
							".8" => "80%",
							".7" => "70%",
							".6" => "60%",
							".5" => "50%"));
							
	$options['compact_header_padding_top'] = array(
		'name' => esc_html__('Compact header top padding', 'myriadwp'),		
		'id' => 'compact_header_padding_top',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array( "none"  => "Don't change",
							"0px"  => "0 px",
							"10px" => "10 px",
							"20px" => "20 px",
							"30px" => "30 px",
							"40px" => "40 px",
							"50px" => "50 px",
							"custom" => "Custom"));
							
	$options['compact_header_padding_top_custom'] = array(
		'name' => esc_html__('Custom top padding (insert units)', 'myriadwp'),		
		'id' => 'compact_header_padding_top_custom',
		'std' => '',
		'type' => 'text');
		
	$options['compact_header_padding_bottom'] = array(
		'name' => esc_html__('Compact header bottom padding', 'myriadwp'),		
		'id' => 'compact_header_padding_bottom',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array( "none"  => "Don't change",
							"0px"  => "0 px",
							"10px" => "10 px",
							"20px" => "20 px",
							"30px" => "30 px",
							"40px" => "40 px",
							"50px" => "50 px",
							"custom" => "Custom"));
							
	$options['compact_header_padding_bottom_custom'] = array(
		'name' => esc_html__('Custom bottom padding (insert units)', 'myriadwp'),		
		'id' => 'compact_header_padding_bottom_custom',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => esc_html__('Header color scheme', 'myriadwp'),
		'id' => 'mobile_menu_info',
		'type' => 'info');
	
	
	
	
	$options['default_menu_always_visible'] = array(
		'name' => esc_html__('Default header custom transparency and visibility', 'myriadwp'),		
		'id' => 'default_menu_always_visible',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'transparent_on_top',
		'options' => array("" => "Default",
						   "transparent_on_top" => "Transparent on top, on scroll settings from global options",
					));
	
	
	$options['default_header_bg_color'] = array(
		'name' => esc_html__('Header background color', 'myriadwp'),
		'desc' => esc_html__('Default white', 'myriadwp'),
		'id'   => 'default_header_bg_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['default_header_gradient_background'] = array(
		'name' => esc_html__('Default Header Gradient Background', 'myriadwp'),		
		'id' => 'default_header_gradient_background',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options[] = array(
		'name' => esc_html__('Default header gradient options', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options default_header_gradient');
	
	$options['default_header_gradient_direction'] = array(
		'name' => esc_html__('Direction', 'myriadwp'),		
		'id' => 'default_header_gradient_direction',
		'type' => 'select',
		'class' => 'mini inline group_options default_header_gradient wrap_it column-4', //mini, tiny, small
		'std' => 'to bottom right',
		'options' => array( "to right" => "To Right",
							"to bottom" => "To Bottom",
							"to left" => "To Left",
							"to top" => "To Top",
							"to top right" => "To Top Right",
							"to bottom right" => "To Bottom Right",
							"to bottom left" => "To Bottom Left",
							"to top left" => "To Top Left",
							"ellipse farthest-corner at center" => "Radial"));
		
		

	$options['default_header_gradient_color_2'] = array(
		'name' => esc_html__('Color 2', 'myriadwp'),
		'id'   => 'default_header_gradient_color_2',
		'std'  => '',
		'class'=> 'inline group_options default_header_gradient wrap_it column-4',
		'type' => 'color' );

	$options['default_header_gradient_color_3'] = array(
		'name' => esc_html__('Color 3', 'myriadwp'),
		'id'   => 'default_header_gradient_color_3',
		'std'  => '',
		'class'=> 'inline group_options default_header_gradient wrap_it column-4',
		'type' => 'color' );

	$options['default_header_gradient_color_4'] = array(
		'name' => esc_html__('Color 4', 'myriadwp'),
		'id'   => 'default_header_gradient_color_4',
		'std'  => '',
		'class'=> 'inline group_options default_header_gradient wrap_it column-4',
		'type' => 'color' );		
		
	$options['default_header_bg_color_opacity'] = array(
		'name' => esc_html__('Header background color opacity', 'myriadwp'),		
		'id' => 'default_header_bg_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => $opacity_array);
	
	
	$options['default_header_bg_image'] = array(
		'name' => esc_html__('Header background image', 'myriadwp'),		
		'id' => 'default_header_bg_image',
		'std' => '',
		'type' => 'upload');
	
	$options['default_header_bg_image_style'] = array(
		'name' => esc_html__('Default header background image style', 'myriadwp'),	
		'id' => 'default_header_bg_image_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'cover',
		'options' => array("cover" 		=> "Cover",
						   "contain" 	=> "Contain",
						   "no_repeat" 	=> "No Repeat",
						   "repeat" 	=> "Repeat"
					));
					
	$options['extra_header_bg_color'] = array(
		'name' => esc_html__('Extra Header background color', 'myriadwp'),
		'desc' => esc_html__('Default white', 'myriadwp'),
		'id'   => 'extra_header_bg_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['extra_header_bg_color_opacity'] = array(
		'name' => esc_html__('Extra Header background color opacity', 'myriadwp'),		
		'id' => 'extra_header_bg_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => $opacity_array);
		
	$options['extra_header_gradient_background'] = array(
		'name' => esc_html__('Extra Header Gradient Background', 'myriadwp'),		
		'id' => 'extra_header_gradient_background',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options[] = array(
		'name' => esc_html__('Extra header gradient options', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options extra_header_gradient');
	
	$options['extra_header_gradient_direction'] = array(
		'name' => esc_html__('Direction', 'myriadwp'),		
		'id' => 'extra_header_gradient_direction',
		'type' => 'select',
		'class' => 'mini inline group_options extra_header_gradient wrap_it column-4', //mini, tiny, small
		'std' => 'to bottom right',
		'options' => array( "to right" => "To Right",
							"to bottom" => "To Bottom",
							"to left" => "To Left",
							"to top" => "To Top",
							"to top right" => "To Top Right",
							"to bottom right" => "To Bottom Right",
							"to bottom left" => "To Bottom Left",
							"to top left" => "To Top Left",
							"ellipse farthest-corner at center" => "Radial"));
		
		

	$options['extra_header_gradient_color_2'] = array(
		'name' => esc_html__('Color 2', 'myriadwp'),
		'id'   => 'extra_header_gradient_color_2',
		'std'  => '',
		'class'=> 'inline group_options extra_header_gradient wrap_it column-4',
		'type' => 'color' );

	$options['extra_header_gradient_color_3'] = array(
		'name' => esc_html__('Color 3', 'myriadwp'),
		'id'   => 'extra_header_gradient_color_3',
		'std'  => '',
		'class'=> 'inline group_options extra_header_gradient wrap_it column-4',
		'type' => 'color' );

	$options['extra_header_gradient_color_4'] = array(
		'name' => esc_html__('Color 4', 'myriadwp'),
		'id'   => 'extra_header_gradient_color_4',
		'std'  => '',
		'class'=> 'inline group_options extra_header_gradient wrap_it column-4',
		'type' => 'color' );		
		
	$options['extra_header_bg_image'] = array(
		'name' => esc_html__('Extra Header background image', 'myriadwp'),		
		'id' => 'extra_header_bg_image',
		'std' => '',
		'type' => 'upload');
	
	$options['extra_header_bg_image_size'] = array(
		'name' => esc_html__('Extra header background image size', 'myriadwp'),	
		'id' => 'extra_header_bg_image_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'cover',
		'options' => array("cover" 		=> "Cover",
						   "contain" 	=> "Contain",
						   "auto" 	=> "Default"
					));
					
	$options['extra_header_bg_image_position'] = array(
		'name' => esc_html__('Extra header background image position', 'myriadwp'),	
		'id' => 'extra_header_bg_image_position',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'center center',
		'options' => array("left top" 		=> "Top Left",
						   "right top" 		=> "Top Right",
						   "right bottom"	=> "Bottom Right",
						   "left bottom" 	=> "Bottom Left",
						   "center top" 	=> "Top",
						   "right center" 	=> "Right",
						   "center bottom" 	=> "Bottom",
						   "left center" 	=> "Left",
						   "center center" 	=> "Center"
					));
					
	$options['extra_header_bg_image_repeat'] = array(
		'name' => esc_html__('Extra header background image repeat', 'myriadwp'),	
		'id' => 'extra_header_bg_image_repeat',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no-repeat',
		'options' => array("repeat" 		=> "Repeat",
						   "repeat-y" 	=> "Repeat Y",
						   "repeat-x" 	=> "Repeat X",
						   "no-repeat" 	=> "No Repeat"
					));



	$options[] = array(
		'name' => esc_html__('Typography settings', 'myriadwp'),
		'id' => 'mobile_menu_info',
		'type' => 'info');
	
	$options['default_header_font_color'] = array(
		'name' => esc_html__('Text color in header', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'default_header_font_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['default_header_hover_font_color'] = array(
		'name' => esc_html__('Text hover (and selected) color in menu', 'myriadwp'),
		'desc' => esc_html__('If not selected opacity 0.5 will be used', 'myriadwp'),
		'id'   => 'default_header_hover_font_color',
		'std'  => '#fd8376',
		'type' => 'color' );
		
	
	$options[] = array(
		'name' => esc_html__('Default header font options', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options default_header_font');
	
	$options['default_header_text_size'] = array(
		'name' => esc_html__('Font size', 'myriadwp'),		
		'id' => 'default_header_text_size',
		'type' => 'select',
		'class' => 'mini group_options default_header_font wrap_it column-4', //mini, tiny, small
		'std' => '15px',
		'options' => array( 
							"10px"  => "10 px",
							"11px"  => "11 px",
							"12px"  => "12 px",
							"13px"  => "13 px",
							"14px"  => "14 px",
							"15px"  => "15 px",
							"16px"  => "16 px",
							"17px"  => "17 px",
							"18px"  => "18 px",
							"19px"  => "19 px",
							"20px"  => "20 px",
							"21px"  => "21 px",
							"22px"  => "22 px",
							"23px"  => "23 px",
							"24px" => "24 px"));
	
	$options['header_font_transform'] = array(
		'name' => esc_html__('Font transform', 'myriadwp'),		
		'id' => 'header_font_transform',
		'type' => 'select',
		'class' => 'mini group_options default_header_font wrap_it column-4', //mini, tiny, small
		'std' => 'none',
		'options' => array("none" => "None",
						   "lowercase" => "Lowercase",
						   "uppercase" => "Uppercase",
						   "capitalize" => "Capitalize",
						   ));
	
	$options['default_header_text_weight'] = array(
		'name' => esc_html__('Font weight', 'myriadwp'),		
		'id' => 'default_header_text_weight',
		'type' => 'select',
		'class' => 'mini group_options default_header_font wrap_it column-4', //mini, tiny, small
		'std' => '400',
		'options' => array( "100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900" => "900"));
							
	$options['default_header_text_line_height'] = array(
		'name' => esc_html__('Line height', 'myriadwp'),
		'id' => 'default_header_text_line_height',
		'type' => 'select',
		'class' => 'mini group_options default_header_font wrap_it column-4', //mini, tiny, small
		'std' => '1.5',
		'options' => $font_height_array_without_custom);
	
		
	
	$options[] = array(
		'name' => esc_html__('Default header Submenu font options', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options default_header_submenu_font');
		
	$options['default_header_submenu_text_size'] = array(
		'name' => esc_html__('Font size', 'myriadwp'),		
		'id' => 'default_header_submenu_text_size',
		'type' => 'select',
		'class' => 'mini group_options default_header_submenu_font wrap_it column-4', //mini, tiny, small
		'std' => '14px',
		'options' => array( 
							"" => "Default",
							"10px"  => "10 px",
							"11px"  => "11 px",
							"12px"  => "12 px",
							"13px"  => "13 px",
							"14px"  => "14 px",
							"15px"  => "15 px",
							"16px"  => "16 px",
							"17px"  => "17 px",
							"18px"  => "18 px",
							"19px"  => "19 px",
							"20px"  => "20 px",
							"21px"  => "21 px",
							"22px"  => "22 px",
							"23px"  => "23 px",
							"24px" => "24 px"));
	
	$options['header_submenu_font_transform'] = array(
		'name' => esc_html__('Font transform', 'myriadwp'),		
		'id' => 'header_submenu_font_transform',
		'type' => 'select',
		'class' => 'mini group_options default_header_submenu_font wrap_it column-4', //mini, tiny, small
		'std' => '',
		'options' => array("" => "Default",
							"none" => "None",
						   "lowercase" => "Lowercase",
						   "uppercase" => "Uppercase",
						   "capitalize" => "Capitalize",
						   ));
	
	$options['default_header_submenu_text_weight'] = array(
		'name' => esc_html__('Font weight', 'myriadwp'),		
		'id' => 'default_header_submenu_text_weight',
		'type' => 'select',
		'class' => 'mini group_options default_header_submenu_font wrap_it column-4', //mini, tiny, small
		'std' => '',
		'options' => array( "" => "Default",
							"100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900" => "900"));
							
	$options['default_header_submenu_text_line_height'] = array(
		'name' => esc_html__('Line height', 'myriadwp'),
		'id' => 'default_header_submenu_text_line_height',
		'type' => 'select',
		'class' => 'mini group_options default_header_submenu_font wrap_it column-4', //mini, tiny, small
		'std' => '',
		'options' => $font_height_array_without_custom);
		
							
	$options['default_header_submenu_font_color'] = array(
		'name' => esc_html__('Default menu submenus Text Color', 'myriadwp'),
		'id'   => 'default_header_submenu_font_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['default_header_submenu_font_hover_color'] = array(
		'name' => esc_html__('Default menu submenus Text Hover Color', 'myriadwp'),
		'id'   => 'default_header_submenu_font_hover_color',
		'std'  => '#fd8376',
		'type' => 'color' );
		
	$options['default_header_submenu_background_color'] = array(
		'name' => esc_html__('Default menu submenus background Color', 'myriadwp'),
		'id'   => 'default_header_submenu_background_color',
		'std'  => '#fff',
		'type' => 'color' );
		
	$options['extra_header_font_color'] = array(
		'name' => esc_html__('Text color in Extra header', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'extra_header_font_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['extra_header_hover_font_color'] = array(
		'name' => esc_html__('Text hover (and selected) color in Extra menu', 'myriadwp'),
		'desc' => esc_html__('If not selected opacity 0.5 will be used', 'myriadwp'),
		'id'   => 'extra_header_hover_font_color',
		'std'  => '#fd8376',
		'type' => 'color' );
							
	$options['default_header_megamenu_fullwidth'] = array(
		'name' => esc_html__('Megamenu fullwidth', 'myriadwp'),
		'desc' => esc_html__('To create megamenu, you have to add class megamenu to submenu you want to be shown as megamenu.', 'myriadwp'),
		'id' => 'default_header_megamenu_fullwidth',
		'type' => 'radio',
		'class' => '', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);

	
	$options[] = array(
		'name' => esc_html__('Overlay Menu Settings', 'myriadwp'),
		'id'   => 'overlay_menu_settings',
		'type' => 'info');
	
	$options['overlay_menu_menu_font_color'] = array(
		'name' => esc_html__('Overlay Menu Text Color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'overlay_menu_menu_font_color',
		'std'  => '#000000',
		'type' => 'color' );
		
	$options['overlay_menu_menu_hover_font_color'] = array(
		'name' => esc_html__('Overlay Menu Text Hover Color', 'myriadwp'),
		'id'   => 'overlay_menu_menu_hover_font_color',
		'std'  => '#fd8376',
		'type' => 'color' );
		
	
	$options['overlay_menu_text_stroke'] = array(
		'name' => esc_html__('Overlay Menu Text Stroke', 'myriadwp'),		
		'id' => 'overlay_menu_text_stroke',
		'std' => '0',
		'type' => 'checkbox');
		
	$options['overlay_menu_content_align'] = array(
		'name' => esc_html__('Overlay Menu text align', 'myriadwp'),		
		'id' => 'overlay_menu_content_align',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'text-align-center',
		'options' => array("text-align-left" => "Left",
						   "text-align-center" => "Center",
						   "text-align-right" => "Right",
						   ));
	
	$options['overlay_menu_widgets_position'] = array(
		'name' => esc_html__('Overlay Menu Widgets Position', 'myriadwp'),		
		'id' => 'overlay_menu_widgets_position',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'desc' => esc_html__('Only for Background image or Background color', 'myriadwp'),
		'std' => '',
		'options' => array("" => "Below menu",
						   "column" => "Next to menu",
						   ));
						   
	$options['overlay_menu_vert_content_align'] = array(
		'name' => esc_html__('Vertical align', 'myriadwp'),
		'id'   => 'overlay_menu_vert_content_align',
		'type' => 'select',
		'std'  => 'top',
		'class'=> '',
		'desc' => esc_html__('Only for Background image or Background color', 'myriadwp'),
		'options' => array( "top" => "Top",
							"middle" => "Middle",
							"bottom" => "Bottom"));
							

	$options['menu_wow_effect'] = array(
		'name' => esc_html__('WOW effect', 'myriadwp'),
		'desc' => esc_html__('Nice animated effect on scroll', 'myriadwp'),
		'id' => 'menu_wow_effect',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $wow_array);
	
	$options['menu_wow_delay'] = array(
		'name' => esc_html__('WOW delay', 'myriadwp'),
		'desc' => esc_html__('WOW effect delay', 'myriadwp'),
		'id' => 'menu_wow_delay',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '0.1s',
		'options' => array("0.1s" => "0.1s",
						   "0.2s" => "0.2s",
						   "0.3s" => "0.3s"));	
		
	$options['overlay_menu_menu_text_size'] = array(
		'name' => esc_html__('Overlay menu font size', 'myriadwp'),		
		'id' => 'overlay_menu_menu_text_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '54px',
		'options' => array( "custom"  => "Custom size (insert below)",
							"10px"  => "10 px",
							"11px"  => "11 px",
							"12px"  => "12 px",
							"13px"  => "13 px",
							"14px"  => "14 px",
							"16px"  => "16 px",
							"18px"  => "18 px",
							"22px"  => "22 px",
							"26px"  => "26 px",
							"30px"  => "30 px",
							"34px"  => "34 px",
							"38px"  => "38 px",
							"42px"  => "42 px",
							"46px"  => "46 px",
							"50px"  => "50 px",
							"54px"  => "54 px",
							"58px"  => "58 px",
							"62px"  => "62 px",
							"66px"  => "66 px",
							"70px"  => "70 px",
							"74px"  => "74 px",
							"78px"  => "78 px",
							"82px"  => "82 px",
							"86px"  => "86 px",
							"90px"  => "90 px",
							"96px"  => "96 px"));
							
	$options['overlay_menu_menu_text_size_custom'] = array(
		'name' => esc_html__('Custom text size (insert units)', 'myriadwp'),		
		'id' => 'overlay_menu_menu_text_size_custom',
		'std' => '',
		'type' => 'text');
		
	$options['overlay_menu_font_transform'] = array(
		'name' => esc_html__('Overlay Menu font transform', 'myriadwp'),		
		'id' => 'overlay_menu_font_transform',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'none',
		'options' => array("none" => "None",
						   "lowercase" => "Lowercase",
						   "uppercase" => "Uppercase",
						   "capitalize" => "Capitalize",
						   ));
							
	$options['overlay_menu_menu_text_weight'] = array(
		'name' => esc_html__('Overlay menu font weight', 'myriadwp'),		
		'id' => 'overlay_menu_menu_text_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '400',
		'options' => array( "100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900" => "900"));
							
	$options['overlay_menu_menu_line_height'] = array(
		'name' => esc_html__('Overlay menu line height', 'myriadwp'),
		'id' => 'overlay_menu_menu_line_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
							
	$options['overlay_menu_menu_text_r1'] = array(
		'name' => esc_html__('Responsive settings Tablet', 'myriadwp'),
		'id' => 'overlay_menu_menu_text_r1',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['overlay_menu_menu_text_size_r1'] = array(
		'name' => esc_html__('Overlay menu font size', 'myriadwp'),
		'id' => 'overlay_menu_menu_text_size_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '60px',
		'options' => $h_size_array);
	
	$options['overlay_menu_menu_text_size_custom_r1'] = array(
		'name' => esc_html__('Custom text size (insert units)', 'myriadwp'),		
		'id' => 'overlay_menu_menu_text_size_custom_r1',
		'std' => '',
		'type' => 'text');
		
	$options['overlay_menu_menu_text_weight_r1'] = array(
		'name' => esc_html__('Overlay menu font weight', 'myriadwp'),		
		'id' => 'overlay_menu_menu_text_weight_r1',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '400',
		'options' => array( "100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900" => "900"));
							
	$options['overlay_menu_menu_text_r2'] = array(
		'name' => esc_html__('Responsive settings Phone', 'myriadwp'),
		'id' => 'overlay_menu_menu_text_r2',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['overlay_menu_menu_text_size_r2'] = array(
		'name' => esc_html__('Overlay menu font size', 'myriadwp'),
		'id' => 'overlay_menu_menu_text_size_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '60px',
		'options' => $h_size_array);
	
	$options['overlay_menu_menu_text_size_custom_r2'] = array(
		'name' => esc_html__('Custom text size (insert units)', 'myriadwp'),		
		'id' => 'overlay_menu_menu_text_size_custom_r2',
		'std' => '',
		'type' => 'text');
		
	$options['overlay_menu_menu_text_weight_r2'] = array(
		'name' => esc_html__('Overlay menu font weight', 'myriadwp'),		
		'id' => 'overlay_menu_menu_text_weight_r2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '400',
		'options' => array( "100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900" => "900"));
	
	
	$options['overlay_menu_font_color'] = array(
		'name' => esc_html__('Overlay Widgets color', 'myriadwp'),
		'id'   => 'overlay_menu_font_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['overlay_menu_link_color'] = array(
		'name' => esc_html__('Overlay Widgets Link color', 'myriadwp'),
		'id'   => 'overlay_menu_link_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['overlay_menu_link_hover_color'] = array(
		'name' => esc_html__('Overlay Widgets Link Hover Color', 'myriadwp'),
		'id'   => 'overlay_menu_link_hover_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['overlay_menu_bg_image'] = array(
		'name' => esc_html__('Overlay menu background image', 'myriadwp'),
		'desc' => esc_html__('Default none', 'myriadwp'),
		'id'   => 'overlay_menu_bg_image',
		'std'  => '',
		'type' => 'upload');
		
	$options['overlay_menu_bg_image_style'] = array(
		'name' => esc_html__('Overlay menu background image style', 'myriadwp'),	
		'id' => 'overlay_menu_bg_image_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'cover',
		'options' => array("cover" 		=> "Cover",
						   "contain" 	=> "Contain",
						   "no_repeat" 	=> "No Repeat",
						   "repeat" 	=> "Repeat"
					));

	$options['overlay_menu_bg_color'] = array(
		'name' => esc_html__('Overlay menu background color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'overlay_menu_bg_color',
		'std'  => '#000000',
		'type' => 'color' );
		
 	$options['overlay_menu_bg_color_hover'] = array(
		'name' => esc_html__('Overlay menu background hover color', 'myriadwp'),
		'desc' => esc_html__('Default white', 'myriadwp'),
		'id'   => 'overlay_menu_bg_color_hover',
		'std'  => '#ffffff',
		'desc' => esc_html__('NOT for Overlay Background Image menu', 'myriadwp'),
		'type' => 'color' );
	
	$options['overlay_menu_gradient_background'] = array(
		'name' => esc_html__('Overlay menu Gradient Background', 'myriadwp'),		
		'id' => 'overlay_menu_gradient_background',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
		$options['overlay_menu_gradient_direction'] = array(
		'name' => esc_html__('Overlay menu gradient direction', 'myriadwp'),		
		'id' => 'overlay_menu_gradient_direction',
		'type' => 'select',
		'class' => 'inline mini group_options overlay_menu_gradient_background', //mini, tiny, small
		'std' => 'to bottom right',
		'options' => array( "to right" => "To Right",
							"to bottom" => "To Bottom",
							"to left" => "To Left",
							"to top" => "To Top",
							"to top right" => "To Top Right",
							"to bottom right" => "To Bottom Right",
							"to bottom left" => "To Bottom Left",
							"to top left" => "To Top Left",
							"ellipse farthest-corner at center" => "Radial"));
		
	$options['overlay_menu_bg_color_gradient_color_2'] = array(
		'name' => esc_html__('Overlay menu background gradient color 2', 'myriadwp'),
		'id'   => 'overlay_menu_bg_color_gradient_color_2',
		'std'  => '#eeeeee',
		'class'=> 'inline group_options overlay_menu_gradient_background',
		'type' => 'color' );

	$options['overlay_menu_bg_color_gradient_color_3'] = array(
		'name' => esc_html__('Overlay menu background gradient color 3', 'myriadwp'),
		'id'   => 'overlay_menu_bg_color_gradient_color_3',
		'std'  => '',
		'class'=> 'inline group_options overlay_menu_gradient_background',
		'type' => 'color' );

	$options['overlay_menu_bg_color_gradient_color_4'] = array(
		'name' => esc_html__('Overlay menu background gradient color 4', 'myriadwp'),
		'id'   => 'overlay_menu_bg_color_gradient_color_4',
		'std'  => '',
		'class'=> 'inline group_options overlay_menu_gradient_background',
		'type' => 'color' );	
	
	$options['overlay_menu_bg_color_opacity'] = array(
		'name' => esc_html__('Overlay menu background color opacity', 'myriadwp'),		
		'id' => 'overlay_menu_bg_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '0.5',
		'options' => $opacity_array);
		
	$options['overlay_menu_bg_color_hover_opacity'] = array(
		'name' => esc_html__('Overlay menu background color hover opacity', 'myriadwp'),
		'desc' => esc_html__('Only if background image is selected', 'myriadwp'),		
		'id' => 'overlay_menu_bg_color_hover_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '0.1',
		'options' => $opacity_array);
		
	$options[] = array(
		'name' => esc_html__('Mobile Menu (Responsive) Settings (only for Default header layout without 3 lines)', 'myriadwp'),
		'id' => 'mobile_menu_info',
		'type' => 'info');
		
	$options['mobile_menu_open_style'] = array(
		'name' => esc_html__('Mobile Menu open style', 'myriadwp'),	
		'id' => 'mobile_menu_open_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'mobile_autoheight',
		'options' => array("mobile_autoheight" 	=> "Auto Height",
						   "mobile_fullheight"	=> "Full height"
					));
					
	$options['mobile_menu_width'] = array(
		'name' => esc_html__('Mobile Menu Width', 'myriadwp'),	
		'id' => 'mobile_menu_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'width-100',
		'options' => array("width-30"	=> "30%",
						   "width-40"	=> "40%",
						   "width-50"	=> "50%",
						   "width-60"	=> "60%",
						   "width-70"	=> "70%",
						   "width-80"	=> "80%",
						   "width-90"	=> "90%",
						   "width-100"	=> "100%",
					));
		
	$options[] = array(
		'name' => esc_html__('Mobile Menu Colors', 'myriadwp'),
		'class' => 'group_options mobile_colors remove_wrapper',
		'id'   => 'mobile_colors_info',
		'type' => 'info');
	
	$options['mobile_menu_text_color'] = array(
		'name' => esc_html__('Text', 'myriadwp'),
		'id'   => 'mobile_menu_text_color',
		'desc' => esc_html__('Only for overlay', 'myriadwp'),
		'class'=> 'group_options mobile_colors wrap_it column-2',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['mobile_menu_text_hover_color'] = array(
		'name' => esc_html__('Text hover (and selected) color in menu', 'myriadwp'),
		'desc' => esc_html__('If not selected opacity 0.5 will be used', 'myriadwp'),
		'class'=> 'group_options mobile_colors wrap_it column-3',
		'id'   => 'mobile_menu_text_hover_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['mobile_menu_text_color_header'] = array(
		'name' => esc_html__('Text', 'myriadwp'),
		'id'   => 'mobile_menu_text_color_header',
		'desc' => esc_html__('Only for header', 'myriadwp'),
		'std'  => '#232635',
		'class'=> 'group_options mobile_colors wrap_it column-3',
		'type' => 'color' );
		
		
	$options[] = array(
		'name' => esc_html__('Mobile Menu Widgets Colors', 'myriadwp'),
		'class' => 'group_options mobile_widget_colors remove_wrapper',
		'id'   => 'mobile_widget_colors_info',
		'type' => 'info');
	
	$options['mobile_menu_widget_text_color'] = array(
		'name' => esc_html__('Text color', 'myriadwp'),
		'id'   => 'mobile_menu_widget_text_color',
		'std'  => '#232635',
		'class'=> 'group_options mobile_widget_colors wrap_it column-3',
		'type' => 'color' );
		
	$options['mobile_menu_widget_link_color'] = array(
		'name' => esc_html__('Link color', 'myriadwp'),
		'id'   => 'mobile_menu_widget_link_color',
		'std'  => '',
		'class'=> 'group_options mobile_widget_colors wrap_it column-3',
		'type' => 'color' );
		
	$options['mobile_menu_widget_hover_color'] = array(
		'name' => esc_html__('Hover color', 'myriadwp'),
		'id'   => 'mobile_menu_widget_hover_color',
		'std'  => '#fd8376',
		'class'=> 'group_options mobile_widget_colors wrap_it column-3',
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__('Mobile menu font options', 'myriadwp'),
		'class' => 'group_options mobile_fonts remove_wrapper',
		'id'   => 'mobile_font_info',
		'type' => 'info');
	
	$options['mobile_menu_size'] = array(
		'name' => esc_html__('Size', 'myriadwp'),
		'id' => 'mobile_menu_size',
		'type' => 'select',
		'class' => 'group_options mobile_fonts wrap_it column-3', //mini, tiny, small
		'std' => '15px',
		'options' => $h_size_array);
	
	$options['mobile_menu_size_custom'] = array(
		'name' => esc_html__('Custom font size', 'myriadwp'),		
		'id' => 'mobile_menu_size_custom',
		'class' => 'group_options mobile_fonts wrap_it column-3',
		'std' => '',
		'type' => 'text');
	
	
	$options['mobile_menu_weight'] = array(
		'name' => esc_html__('Weight', 'myriadwp'),
		'id' => 'mobile_menu_weight',
		'type' => 'select',
		'class' => 'group_options mobile_fonts wrap_it column-3',
		'std' => '400',
		'options' => $font_weight_array);
		
	$options['mobile_menu_style'] = array(
		'name' => esc_html__('Style', 'myriadwp'),
		'id' => 'mobile_menu_style',
		'type' => 'select',
		'class' => 'group_options mobile_fonts wrap_it column-3',
		'std' => 'normal',
		'options' => $font_style_array);

	$options['mobile_menu_transform'] = array(
		'name' => esc_html__('Transform', 'myriadwp'),
		'id' => 'mobile_menu_transform',
		'type' => 'select',
		'class' => 'group_options mobile_fonts wrap_it column-3',
		'std' => 'none',
		'options' => $font_transform_array);
		
	$options['mobile_menu_spacing'] = array(
		'name' => esc_html__('Spacing', 'myriadwp'),
		'id' => 'mobile_menu_spacing',
		'type' => 'select',
		'class' => 'group_options mobile_fonts wrap_it column-3',
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['mobile_menu_height'] = array(
		'name' => esc_html__('Height', 'myriadwp'),
		'id' => 'mobile_menu_height',
		'type' => 'select',
		'class' => 'group_options mobile_fonts wrap_it column-3',
		'std' => '1.4',
		'options' => $font_height_array);
		
	$options['mobile_menu_height_custom'] = array(
		'name' => esc_html__('Custom line height', 'myriadwp'),		
		'id' => 'mobile_menu_height_custom',
		'class' => 'group_options mobile_fonts wrap_it column-3',
		'std' => '',
		'type' => 'text');
		
	$options['mobile_menu_bg_color'] = array(
		'name' => esc_html__('Mobile Menu Background', 'myriadwp'),
		'id'   => 'mobile_menu_bg_color',
		'std'  => '#f8f8f8',
		'type' => 'color' );
		
	$options['mobile_menu_gradient_direction'] = array(
		'name' => esc_html__('Mobile Menu background gradient', 'myriadwp'),		
		'id' => 'mobile_menu_gradient_direction',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => array( "none" => "None",
							"to right" => "To Right",
							"to bottom" => "To Bottom",
							"to left" => "To Left",
							"to top" => "To Top",
							"to top right" => "To Top Right",
							"to bottom right" => "To Bottom Right",
							"to bottom left" => "To Bottom Left",
							"to top left" => "To Top Left",
							"ellipse farthest-corner at center" => "Radial"));
		
	$options[] = array(
		'name' => esc_html__('Mobile Menu background gradient colors', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options mobile_menu_gradient');
	
	
	$options['mobile_menu_bg_color_2'] = array(
		'name' => esc_html__('Gradient 2nd color', 'myriadwp'),
		'id' => 'mobile_menu_bg_color_2',
		'std' => '',
		'class'=> 'inline group_options mobile_menu_gradient',
		'type' => 'color' );
		
	$options['mobile_menu_bg_color_3'] = array(
		'name' => esc_html__('Gradient 3rd color', 'myriadwp'),
		'id' => 'mobile_menu_bg_color_3',
		'std' => '',
		'class'=> 'inline group_options mobile_menu_gradient',
		'type' => 'color' );
		
		$options['mobile_menu_bg_color_opacity'] = array(
		'name' => esc_html__('Mobile Menu background color opacity', 'myriadwp'),		
		'id' => 'mobile_menu_bg_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => $opacity_array);

	$options['mobile_menu_bg_image'] = array(
		'name' => esc_html__('Mobile Menu background image', 'myriadwp'),		
		'id' => 'mobile_menu_bg_image',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'name' => esc_html__('Background options', 'myriadwp'),
		'class' => 'group_options mobile_bg_style remove_wrapper',
		'id'   => 'bg_mobile_info',
		'type' => 'info');
	
	$options['mobile_menu_bg_align'] = array(
		'name' => esc_html__('Mobile Menu background image position', 'myriadwp'),	
		'id' => 'mobile_menu_bg_align',
		'type' => 'select',
		'class' => 'group_options mobile_bg_style wrap_it column-3', //mini, tiny, small
		'std' => 'brankic_bg_center',
		'options' => array("" 		=> "Default",
						   "brankic_bg_top_left" 	=> "Top Left",
						   "brankic_bg_top_right" 	=> "Top Right",
						   "brankic_bg_bottom_right" 	=> "Bottom Right",
						   "brankic_bg_bottom_left" 	=> "Bottom Left",
						   "brankic_bg_top" 	=> "Top",
						   "brankic_bg_right" 	=> "Right",
						   "brankic_bg_bottom" 	=> "Bottom",
						   "brankic_bg_left" 	=> "Left",
						   "brankic_bg_center" 	=> "Center",
					));
					
	$options['mobile_menu_bg_repeat'] = array(
		'name' => esc_html__('Mobile Menu background image repeat', 'myriadwp'),	
		'id' => 'mobile_menu_bg_repeat',
		'type' => 'select',
		'class' => 'group_options mobile_bg_style wrap_it column-3', //mini, tiny, small
		'std' => 'no-repeat',
		'options' => array("repeat" 	=> "Repeat",
						   "repeat-y" 	=> "Repeat Y",
						   "repeat-x" 	=> "Repeat X",
						   "no-repeat" 	=> "No Repeat"
					));
					
	$options['mobile_menu_bg_size'] = array(
		'name' => esc_html__('Mobile Menu background image size', 'myriadwp'),	
		'id' => 'mobile_menu_bg_size',
		'type' => 'select',
		'class' => 'group_options mobile_bg_style wrap_it column-3', //mini, tiny, small
		'std' => 'auto',
		'options' => array("auto" 		=> "Default",
						   "contain" 	=> "Contain",
						   "cover" 		=> "Cover"
					));
		
	$options[] = array(
		'name' => esc_html__('Alignment', 'myriadwp'),
		'class' => 'group_options mobile_alignment remove_wrapper',
		'id'   => 'mobile_alignemnt_info',
		'type' => 'info');
	
	$options['mobile_menu_text_align'] = array(
		'name' => esc_html__('Menu text align', 'myriadwp'),
		'id'   => 'mobile_menu_text_align',
		'type' => 'select',
		'std'  => 'text-align-left',
		'class'=> 'group_options mobile_alignment wrap_it column-3',
		'options' => array( "text-align-left" => "Left",
							"text-align-center" => "Center",
							"text-align-justify" => "Justify",
							"text-align-right" => "Right"));
		
	$options['mobile_menu_content_align_horizontal'] = array(
		'name' => esc_html__('Menu horizontal align', 'myriadwp'),
		'id'   => 'mobile_menu_content_align_horizontal',
		'type' => 'select',
		'std'  => 'left',
		'class'=> 'group_options mobile_alignment wrap_it column-3',
		'options' => array( "left" => "Left",
							"center" => "Center",
							"right" => "Right"));
		
	$options['mobile_menu_content_align_vertical'] = array(
		'name' => esc_html__('Menu vertical align', 'myriadwp'),
		'id'   => 'mobile_menu_content_align_vertical',
		'type' => 'select',
		'std'  => 'middle',
		'class'=> 'group_options mobile_alignment wrap_it column-3',
		'options' => array( "top" => "Top",
							"middle" => "Middle",
							"bottom" => "Bottom"));
		
	$options['mobile_logo'] = array(
		'name' => esc_html__('Logo to use', 'myriadwp'),
		'id' => 'mobile_logo',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'mobile_logo',
		'options' => array( "mobile_logo" => "Primary logo",
							"mobile_logo_2" => "Secondary logo (Logo 2)",
							"" => "---"));


	$options['mobile_menu_direction'] = array(
		'name' => esc_html__('Direction', 'myriadwp'),
		'id' => 'mobile_menu_direction',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'l_2_r',
		'options' => array( "l_2_r" => "Left to Right",
							"r_2_l" => "Right to Left",
							"t_2_b" => "Top to Bottom",
							"b_2_t" => "Bottom to Top",
							"fade_in" => "Fade In"));	


	
		
	
	////////////////////////////////////////////////////////////////////////
	
	
	
	$options[] = array(
		'name' => esc_html__('Page Title and Featured images', 'myriadwp'),
		'desc' => esc_html__('You can override these options on each page', 'myriadwp'),
		'type' => 'heading');
		
	$options['hero_holder_background_color'] = array(
		'name' => esc_html__('Title and Featured image background color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'hero_holder_background_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['hero_holder_background_color_opacity'] = array(
		'name' => esc_html__('Title and Featured image background color opacity', 'myriadwp'),		
		'id' => 'hero_holder_background_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => array("0.1" => "10%",
						   "0.2" => "20%",
						   "0.3" => "30%",
						   "0.4" => "40%",
						   "0.5" => "50%",
						   "0.6" => "60%",
						   "0.7" => "70%",
						   "0.8" => "80%",
						   "0.9" => "90%",
						   "1"   => "100%"));
	$options['page_parallax'] = array(
		'name' => esc_html__('Parallax', 'myriadwp'),		
		'id' => 'page_parallax',
		'type' => 'checkbox',
		'std' => '1');
						   
	$options['hero_holder_title_color'] = array(
		'name' => esc_html__('Title color', 'myriadwp'),
		'desc' => esc_html__('Default white', 'myriadwp'),
		'id'   => 'hero_holder_title_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['hero_holder_title_position'] = array(
		'name' => esc_html__('Title position', 'myriadwp'),		
		'id' => 'hero_holder_title_position',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'middle center',
		'options' => array("middle center" => "Middle Center",
						   "middle left" => "Middle Left",
						   "middle right" => "Middle Right",
						   "top center" => "Top Center",
						   "top left" => "Top Left",
						   "top right" => "Top Right",
						   "bottom center" => "Bottom Center",
						   "bottom left" => "Bottom Left",
						   "bottom right"   => "Bottom Right"));
						   
	$options['hero_holder_height'] = array(
		'name' => esc_html__('Title and Featured image height', 'myriadwp'),		
		'id' => 'hero_holder_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-20',
		'options' => array("height-20" => "20%",
						   "height-25" => "25%",
						   "height-30" => "30%",
						   "height-35" => "35%",
						   "height-40" => "40%",
						   "height-45" => "45%",
						   "height-50" => "50%",
						   "height-55" => "55%",
						   "height-60" => "60%",
						   "height-65" => "65%",
						   "height-70" => "70%",
						   "height-75" => "75%",
						   "height-80" => "80%",
						   "height-85" => "85%",
						   "height-90" => "90%",
						   "height-95" => "95%",
						   "height-100" => "100%"));


	$options['hero_holder_scroll_button'] = array(
		'name' => esc_html__('Scroll button', 'myriadwp'),		
		'id' => 'hero_holder_scroll_button',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("" => "None",
						   "three-arrows" => "Three Arrows",
						   "arrow" => "Arrow",
						   "mouse" => "Mouse",
						   "line" => "Line",
						   "pulse" => "Pulse"));				   
/////////////////////////////////////////////////////////////////////////////
						   
	$options[] = array(
		'name' => esc_html__('Blog Page (Category / Archive)', 'myriadwp'),
		'type' => 'heading');
		
	$options['archive_content_bg_color'] = array(
		'name' => esc_html__('Archive Content background color', 'myriadwp'),
		'id'   => 'archive_content_bg_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['archive_content_text_color'] = array(
		'name' => esc_html__('Archive Content text color', 'myriadwp'),
		'id'   => 'archive_content_text_color',
		'std'  => '#232635',
		'type' => 'color' );

	$options['archive_style'] = array(
		'name' => esc_html__('Archive (category, autor, tag) page style', 'myriadwp'),		
		'id' => 'archive_style',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'blog-style-2a',
		'options' => array("flex" => "Flex (1-6 columns)",
							"blog-style-1" => "Blog Style 1 (single column)",
						   "blog-style-2" => "Blog Style 2 (1-2 columns)",
						   "blog-style-2a" => "Blog Style 2a (row)",
						   "blog-style-3" => "Blog Style 3 (1-6 columns / Grid or Masonry)",
						   "blog-style-4" => "Blog Style 4 (1-6 columns)",
						   "blog-style-5" => "Blog Style 5 (1-6 columns)",
						   "blog-style-6" => "Blog Style 6 (1-6 columns)",
						   "blog-style-7" => "Blog Style 7( 1-2 columns)",
						   "blog-style-8" => "Blog Style 8 (1-6 columns)",
						   "blog-style-9" => "Blog Style 9 (1-6 columns)",
						   "blog-style-10" => "Blog Style 10 (1 column zig-zag)"));
						   
	$options['archive_columns'] = array(
		'name' => esc_html__('Arhive (category, autor, tag) number of columns', 'myriadwp'),		
		'id' => 'archive_columns',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '3',
		'options' => array("1" => "1 column",
						   "2" => "2 columns",
						   "3" => "3 columns",
						   "4" => "4 columns",
						   "5" => "5 columns",
						   "6" => "6 columns"));
						   
	$options['archive_content'] = array(
		'name' => esc_html__('Show whole content or only excerpt', 'myriadwp'),		
		'id' => 'archive_content',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'content',
		'options' => array("content" => "Whole content",
						   "excerpt" => "Excerpt only"));
	
	$options[] = array(
		'name' => esc_html__('Show meta data', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options archive_checkboxes');
		
	$options['archive_post_meta_style'] = array(
		'name' => esc_html__('Post Single Meta Style', 'myriadwp'),		
		'id' => 'archive_post_meta_style',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'uppercase',
		'options' => array("" => "None",
						   "uppercase" => "UPPERCASE",
						   "lowercase" => "lowercase",
						   "capitalize" => "Capitalize"));
						   
	$options['archive_post_meta_small'] = array(
		'name' => esc_html__('Small Post Meta', 'myriadwp'),		
		'id' => 'archive_post_meta_small',
		'type' => 'checkbox',
		'std' => '1');
		
	$options['archive_post_meta_bold'] = array(
		'name' => esc_html__('Bold Post Meta', 'myriadwp'),		
		'id' => 'archive_post_meta_bold',
		'type' => 'checkbox',
		'std' => '1');	
		
		
	$options['archive_show_date'] = array(
		'name' => esc_html__('Date', 'myriadwp'),		
		'id' => 'archive_show_date',
		'type' => 'checkbox',
		'class' => 'group_options archive_checkboxes wrap_it column-5',
		'std' => '1');
	
	$options['archive_show_author'] = array(
		'name' => esc_html__('Author', 'myriadwp'),		
		'id' => 'archive_show_author',
		'type' => 'checkbox',
		'class' => 'group_options archive_checkboxes wrap_it column-5',
		'std' => '1');
		
	$options['archive_show_cats'] = array(
		'name' => esc_html__('Categories', 'myriadwp'),		
		'id' => 'archive_show_cats',
		'type' => 'checkbox',
		'class' => 'group_options archive_checkboxes wrap_it column-5',
		'std' => '1');
		
	$options['archive_show_comments'] = array(
		'name' => esc_html__('Comments count', 'myriadwp'),		
		'id' => 'archive_show_comments',
		'type' => 'checkbox',
		'class' => 'group_options archive_checkboxes wrap_it column-5',
		'std' => '1');
		
	$options['archive_show_tags'] = array(
		'name' => esc_html__('Tags', 'myriadwp'),		
		'id' => 'archive_show_tags',
		'type' => 'checkbox',
		'class' => 'group_options archive_checkboxes wrap_it column-5',
		'std' => '1');
		
	// new options, same as Category shortcode
	
	$options['archive_boxed'] = array(
		'name' => esc_html__('Boxed', 'myriadwp'),	
		'desc' => esc_html__('Only for Blog styles 2, 3, 8 & 9', 'myriadwp'),		
		'id' => 'archive_boxed',
		'type' => 'checkbox',
		'class' => '',
		'std' => '');
		
	$options['archive_emphasize_first_post'] = array(
		'name' => esc_html__('Emphasize first post', 'myriadwp'),	
		'id' => 'archive_emphasize_first_post',
		'type' => 'radio',
		'class' => '',
		'std' => 'no',
		'options' => $yes_no);
		
	$options['archive_emphasize_style'] = array(
		'name' => esc_html__('Emphasized Post Style', 'myriadwp'),		
		'id' => 'archive_emphasize_style',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'style_3',
		'options' => array("style_3" => "Default",
						   "style_1" => "Split",
						   "style_2" => "Minimal"));
						   
	$options['archive_style_2'] = array(
		'name' => esc_html__('Archive Style', 'myriadwp'),		
		'id' => 'archive_style_2',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'grid',
		'options' => array("flex" => "Flex",
						   "grid" => "Grid",
						   "grid_advanced" => "Grid Advanced",
						   "masonry" => "Masonry"));
						   
	$options['archive_thumb_sizes'] = array(
		'name' => esc_html__('Thumb sizes', 'myriadwp'),		
		'id' => 'archive_thumb_sizes',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'brankic-1024-768',
		'options' => array("brankic-original-1024" => "Original",
						   "brankic-512-512" => "Squares",
						   "brankic-1024-768" => "Landscape 4x3",
						   "brankic-768-1024" => "Portrait 3x4",
						   "brankic-512-384" => "Landscape 4x3 smaller",
						   "brankic-384-512" => "Portrait 3x4 smaller",
						   "brankic-1024-512" => "Landscape 2x1",
						   "brankic-512-1024" => "Portrait 1x2"));
						   
	$options['archive_flex_height'] = array(
		'name' => esc_html__('Image height', 'myriadwp'),		
		'id' => 'archive_flex_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-55',
		'options' => array("height-5"      => "5%",
							"height-10"     => "10%",
							"height-15"     => "15%",
							"height-20"     => "20%",
							"height-25"     => "25%",
							"height-30"     => "30%",
							"height-35"     => "35%",
							"height-40"     => "40%",
							"height-45"     => "45%",
							"height-50"     => "50%",
							"height-55"     => "55%",
							"height-60"     => "60%",
							"height-65"     => "65%",
							"height-70"     => "70%",
							"height-75"     => "75%",
							"height-80"     => "80%",
							"height-85"     => "85%",
							"height-90"     => "90%",
							"height-95"     => "95%",
							"height-100"     => "100%"));
	
	$options['archive_img_radius'] = array(
		'name' => esc_html__('Image radius', 'myriadwp'),
		'id' => 'archive_img_radius',
		'type' => 'radio',
		'class' => '',
		'std' => 'no',
		'options' => $yes_no);
		
	$options['archive_img_radius_size'] = array(
		'name' => esc_html__('Radius size', 'myriadwp'),		
		'id' => 'archive_img_radius_size',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '4px',
		'options' => array("1px"      => "1px",
							"2px"      => "2px",
							"3px"      => "3px",
							"4px"      => "4px",
							"5px"      => "5px",
							"6px"      => "6px",
							"7px"      => "7px",
							"8px"      => "8px",
							"9px"      => "9px",
							"10px"      => "10px",
							"11px"      => "11px",
							"12px"      => "12px",
							"13px"      => "13px",
							"14px"      => "14px",
							"15px"      => "15px",
							"50%"     => "50%"));	
	
	$options['archive_shadow_color'] = array(
		'name' => esc_html__('Shadow color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'archive_shadow_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['archive_shadow_color_opacity'] = array(
		'name' => esc_html__('Shadow color opacity', 'myriadwp'),		
		'id' => 'archive_shadow_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '0.2',
		'options' => array("0.1" => "10%",
						   "0.2" => "20%",
						   "0.3" => "30%",
						   "0.4" => "40%",
						   "0.5" => "50%",
						   "0.6" => "60%",
						   "0.7" => "70%",
						   "0.8" => "80%",
						   "0.9" => "90%",
						   "1"   => "100%"));	
		
	$options['archive_gap_advanced'] = array(
		'name' => esc_html__('Gap (Grid Advanced)', 'myriadwp'),		
		'id' => 'archive_gap_advanced',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '10px',
		'options' => array("" => "No gap",
						   "2px" => "2 px",
						   "4px" => "4 px",
						   "6px" => "6 px",
						   "8px" => "8 px",
						   "10px" => "10 px",
						   "15px" => "15 px",
						   "20px" => "20 px",
						   "25px" => "25 px",
						   "30px" => "30 px",
						   "35px" => "35 px",
						   "40px" => "40 px",
						   "45px" => "45 px",
						   "50px" => "50 px",
						   "55px" => "55 px",
						   "60px" => "60 px",
						   "65px" => "65 px",
						   "70px" => "70 px",
						   "75px"   => "75 px"));	
		
	$options['archive_blog_2_image_height'] = array(
		'name' => esc_html__('Image height', 'myriadwp'),		
		'id' => 'archive_blog_2_image_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-35',
		'options' => array("height-5"      => "5%",
							"height-10"     => "10%",
							"height-15"     => "15%",
							"height-20"     => "20%",
							"height-25"     => "25%",
							"height-30"     => "30%",
							"height-35"     => "35%",
							"height-40"     => "40%",
							"height-45"     => "45%",
							"height-50"     => "50%",
							"height-55"     => "55%",
							"height-60"     => "60%",
							"height-65"     => "65%",
							"height-70"     => "70%",
							"height-75"     => "75%",
							"height-80"     => "80%",
							"height-85"     => "85%",
							"height-90"     => "90%",
							"height-95"     => "95%",
							"height-100"     => "100%"));	
		
	$options['archive_grid_advanced_row_height'] = array(
		'name' => esc_html__('Row height for Grid Advanced', 'myriadwp'),		
		'id' => 'archive_grid_advanced_row_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '30',
		'options' => array(""      => "Auto",
							"20"     => "20%",
							"30"     => "30%",
							"40"     => "40%",
							"50"     => "50%",
							"60"     => "60%",
							"70"     => "70%",
							"80"     => "80%",
							"90"     => "90%"));	
	
	$options['archive_show_excerpt'] = array(
		'name' => esc_html__('Show excerpt', 'myriadwp'),
		'id' => 'archive_show_excerpt',
		'type' => 'radio',
		'class' => '',
		'std' => 'yes',
		'options' => $yes_no);	
		
	$options['archive_captions_position'] = array(
		'name' => esc_html__('Captions position', 'myriadwp'),		
		'id' => 'archive_captions_position',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array(""      => "Default",
							"top left"     	=> "Top Left",
							"top center"    => "Top Center",
							"top right"     => "Top Right",
							"bottom left"   => "Bottom Left",
							"bottom center" => "Bottom Center",
							"bottom right"  => "Bottom Right",
							"left middle"   => "Middle Left",
							"center middle" => "Middle Center",
							"right middle"  => "Middle Right",
							"left stretch"  => "Stretch Left",
							"center stretch"=> "Stretch Center",
							"right stretch" => "Stretch Right"));	
		
	$options['archive_title_color'] = array(
		'name' => esc_html__('Titles color', 'myriadwp'),
		'id'   => 'archive_title_color',
		'type' => 'color' );	
		
	$options['archive_hover_color'] = array(
		'name' => esc_html__('Hovers color', 'myriadwp'),
		'id'   => 'archive_hover_color',
		'type' => 'color' );

	$options['archive_border_hover_color'] = array(
		'name' => esc_html__('Border hovers color', 'myriadwp'),
		'id'   => 'archive_border_hover_color',
		'type' => 'color' );	

 	$options['archive_title_font_family'] = array(
		'name' => esc_html__('Title font family', 'myriadwp'),		
		'id' => 'archive_title_font_family',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array(""      => "None",
							"google_web_font_1" => "Google Web Font 1",
							"google_web_font_2" => "Google Web Font 2",
							"google_web_font_3" => "Google Web Font 3",
							"google_web_font_4" => "Google Web Font 4",
							"custom" 			=> "Custom"));	 		
		
		
	$options['archive_custom_title_font_family'] = array(
		'name' => esc_html__('Custom Title font family', 'myriadwp'),		
		'id' => 'archive_custom_title_font_family',
		'std' => '',
		'type' => 'text');	
		
		
	$options['archive_h_size'] = array(
		'name' => esc_html__('Title font size', 'myriadwp'),
		'id' => 'archive_h_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $h_size_array);
	
	$options['archive_h_size_custom'] = array(
		'name' => esc_html__('Custom Title font size', 'myriadwp'),		
		'id' => 'archive_h_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['archive_titles_weight'] = array(
		'name' => esc_html__('Title font weight', 'myriadwp'),
		'id' => 'archive_titles_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_weight_array);
		
	$options['archive_h_style'] = array(
		'name' => esc_html__('Title font style', 'myriadwp'),
		'id' => 'archive_h_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['archive_h_transform'] = array(
		'name' => esc_html__('Title font transform', 'myriadwp'),
		'id' => 'archive_h_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'capitalize',
		'options' => $font_transform_array);
		
	$options['archive_h_spacing'] = array(
		'name' => esc_html__('Title font spacing', 'myriadwp'),
		'id' => 'archive_h_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_spacing_array);
		
	$options['archive_h_height'] = array(
		'name' => esc_html__('Title font line height', 'myriadwp'),
		'id' => 'archive_h_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $font_height_array);
		
	$options['archive_h_height_custom'] = array(
		'name' => esc_html__('Custom Title font line-height', 'myriadwp'),		
		'id' => 'archive_h_height_custom',
		'std' => '',
		'type' => 'text');		
		
	$options['archive_duotone'] = array(
		'name' => esc_html__('Duotone effect', 'myriadwp'),		
		'id' => 'archive_duotone',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $duotone_array);
		
	$options['archive_duotone_custom'] = array(
		'name' => esc_html__('Duotone custom color', 'myriadwp'),
		'id'   => 'archive_duotone_custom',
		'std'  => '',
		'type' => 'color' );
		
	$options['archive_duotone_gradient'] = array(
		'name' => esc_html__('Duotone effect gradient', 'myriadwp'),		
		'id' => 'archive_duotone_gradient',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['archive_duotone_gradient_direction'] = array(
		'name' => esc_html__('Gradient direction', 'myriadwp'),		
		'id' => 'archive_duotone_gradient_direction',
		'type' => 'select',
		'std' => 'to top right',
		'options' => array("to right" => "To Right",
						   "to bottom" => "To Bottom",
						   "to left" => "To Left",
						   "to top" => "To Top",
						   "to top right" => "To Top Right",
						   "to bottom right" => "To Bottom Right",
						   "to bottom left" => "To Bottom Left",
						   "to top left" => "To Top Left",
						   "circle" => "Radial"));
		
	$options['archive_duotone_custom_2'] = array(
		'name' => esc_html__('Duotone custom color 2', 'myriadwp'),
		'id'   => 'archive_duotone_custom_2',
		'std'  => '',
		'type' => 'color' );
		
	$options['archive_duotone_custom_3'] = array(
		'name' => esc_html__('Duotone custom color 3', 'myriadwp'),
		'id'   => 'archive_duotone_custom_3',
		'std'  => '',
		'type' => 'color' );				
	
	$options['archive_change_header_colors_below'] = array(
		'name' => esc_html__('Change logo and header font color below Featured image', 'myriadwp'),		
		'id' => 'archive_change_header_colors_below',
		'desc' => esc_html__('Only if Default header and Fullwidth post style are selected WITHOUT background color', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['archive_change_menu_new_color_below'] = array(
		'name' => esc_html__('New Menu Font color below Featured image', 'myriadwp'),
		'id'   => 'archive_change_menu_new_color_below',
		'std'  => '',
		'type' => 'color' );
		
	$options['archive_change_header_colors'] = array(
		'name' => esc_html__('Change logo and header font color over Featured image', 'myriadwp'),		
		'id' => 'archive_change_header_colors',
		'desc' => esc_html__('Only if Default header and Fullwidth post style are selected', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['archive_change_menu_new_color'] = array(
		'name' => esc_html__('New Menu Font color over Featured image', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'archive_change_menu_new_color',
		'std'  => '',
		'type' => 'color' );
						   
	$options['archive_show_title'] = array(
		'name' => esc_html__('Show Title and Featured image for category /archive / tag / author pages', 'myriadwp'),
		'id' => 'archive_show_title',
		'type' => 'checkbox',
		'std' => '1');
		
	$options['archive_image'] = array(
		'name' => esc_html__('Featured image for archive pages', 'myriadwp'),
		'id' => 'archive_image',
		'std' => '',
		'type' => 'upload');
		
	$options['archive_hero_holder_background_color'] = array(
		'name' => esc_html__('Archive Title and Featured image background color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'archive_hero_holder_background_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['archive_hero_holder_background_color_opacity'] = array(
		'name' => esc_html__('Archive Title and Featured image background color opacity', 'myriadwp'),		
		'id' => 'archive_hero_holder_background_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => array("0.1" => "10%",
						   "0.2" => "20%",
						   "0.3" => "30%",
						   "0.4" => "40%",
						   "0.5" => "50%",
						   "0.6" => "60%",
						   "0.7" => "70%",
						   "0.8" => "80%",
						   "0.9" => "90%",
						   "1"   => "100%"));
	$options['archive_parallax'] = array(
		'name' => esc_html__('Parallax', 'myriadwp'),		
		'id' => 'archive_parallax',
		'type' => 'checkbox',
		'std' => '1');
						   
	$options['archive_hero_holder_title_color'] = array(
		'name' => esc_html__('Archive Title color', 'myriadwp'),
		'desc' => esc_html__('Default white', 'myriadwp'),
		'id'   => 'archive_hero_holder_title_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['archive_hero_holder_title_position'] = array(
		'name' => esc_html__('Archive Title position', 'myriadwp'),		
		'id' => 'archive_hero_holder_title_position',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'middle center',
		'options' => array("middle center" => "Middle Center",
						   "middle left" => "Middle Left",
						   "middle right" => "Middle Right",
						   "top center" => "Top Center",
						   "top left" => "Top Left",
						   "top right" => "Top Right",
						   "bottom center" => "Bottom Center",
						   "bottom left" => "Bottom Left",
						   "bottom right"   => "Bottom Right"));
						   
	$options['archive_hero_holder_height'] = array(
		'name' => esc_html__('Archive Title and Featured image height', 'myriadwp'),		
		'id' => 'archive_hero_holder_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-20',
		'options' => array("height-20" => "20%",
						   "height-25" => "25%",
						   "height-30" => "30%",
						   "height-35" => "35%",
						   "height-40" => "40%",
						   "height-45" => "45%",
						   "height-50" => "50%",
						   "height-55" => "55%",
						   "height-60" => "60%",
						   "height-65" => "65%",
						   "height-70" => "70%",
						   "height-75" => "75%",
						   "height-80" => "80%",
						   "height-85" => "85%",
						   "height-90" => "90%",
						   "height-95" => "95%",
						   "height-100" => "100%"));
						   
		
	$options['archive_content_width'] = array(
		'name' => esc_html__('Archive Content Width', 'myriadwp'),		
		'id' => 'archive_content_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1280px',
		'options' => array("fullwidth" => "Fullwidth",
							"1440px" => "1440 px",
							"1280px" => "1280 px",
							"1000px" => "1000 px"));
	
	
	$options['archive_margin'] = array(
		'name' => esc_html__('Archive content margin', 'myriadwp'),		
		'id' => 'archive_margin',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'auto',
		'options' => array_merge(array('custom' => 'Custom'), $margins_array));	
		
	$options['archive_top_margin'] = array(
		'name' => esc_html__('Archive content top margin', 'myriadwp'),		
		'id' => 'archive_top_margin',
		'type' => 'select',
		'class' => 'mini inline', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);	
		
		
	$options['archive_bottom_margin'] = array(
		'name' => esc_html__('Archive content bottom margin', 'myriadwp'),		
		'id' => 'archive_bottom_margin',
		'type' => 'select',
		'class' => 'mini inline', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);
		
	$options['archive_padding'] = array(
		'name' => esc_html__('Archive content padding', 'myriadwp'),		
		'id' => 'archive_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('Archive content custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options archive_padding');
		
	$options['archive_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'archive_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options archive_padding wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);	
		
	$options['archive_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'archive_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options archive_padding wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['archive_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'archive_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options archive_padding wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);
		
	$options['archive_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'archive_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options archive_padding wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);

						   

		
	$options['archive_sidebar'] = array(
		'name' => esc_html__('Default sidebar for category / archive pages', 'myriadwp'),		
		'id' => 'archive_sidebar',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom_sidebar_1',
		'options' => array("none" => "None",
		                   "custom_sidebar_1" => "Default Sidebar",
						   "custom_sidebar_2" => "Sidebar 2",
						   "custom_sidebar_3" => "Sidebar 3"));
							
	$options['archive_navigation'] = array(
		'name' => esc_html__('Navigation', 'myriadwp'),		
		'id' => 'archive_navigation',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'numeric_pagination',
		'options' => array( "numeric_pagination" => "Numeric with First, Previus, Next and Last links",
							"old_new_simple" => "Older / Newer",
							"none" => "None"));	
							
	$options[] = array(
		'name' => esc_html__('Archive navigation', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options archive_navigation_colors');
	
	$options['archive_navigation_text_color'] = array(
		'name' => esc_html__('Archive navigation text color', 'myriadwp'),
		'id'   => 'archive_navigation_text_color',
		'std'  => '#232635',
		'class'=> 'mini inline group_options archive_navigation_colors wrap_it column-2',
		'type' => 'color' );
		
	$options['archive_navigation_bg_color'] = array(
		'name' => esc_html__('Archive navigation background color', 'myriadwp'),
		'id'   => 'archive_navigation_bg_color',
		'std'  => '',
		'class'=> 'mini inline group_options archive_navigation_colors wrap_it column-2',
		'type' => 'color' );
	
	$options['archive_wow_effect'] = array(
		'name' => esc_html__('WOW effect', 'myriadwp'),
		'desc' => esc_html__('Nice animated effect on scroll', 'myriadwp'),
		'id' => 'archive_wow_effect',
		'type' => 'select',
		'class' => 'mini group_options archive_wow', //mini, tiny, small
		'std' => 'fadeIn',
		'options' => $wow_array);
	
	$options['archive_wow_delay'] = array(
		'name' => esc_html__('WOW delay', 'myriadwp'),
		'desc' => esc_html__('WOW effect delay', 'myriadwp'),
		'id' => 'archive_wow_delay',
		'type' => 'select',
		'class' => 'mini group_options archive_wow', //mini, tiny, small
		'std' => '0.5s',
		'options' => array("0.1s" => "0.1s",
						   "0.3s" => "0.3s",
						   "0.5s" => "0.5s",
						   "0.7s" => "0.7s"));	

	
	$options['no_featured_image'] = array(
		'name' => esc_html__('Default Image', 'myriadwp'),
		'desc' => esc_html__('If there\'s no featured image set, this image will be used.', 'myriadwp'),
		'id' => 'no_featured_image',
		'std' => get_template_directory_uri() . '/images/blanko.gif',
		'type' => 'upload');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	$options[] = array(
		'name' => esc_html__('Blog Single', 'myriadwp'),
		'type' => 'heading');
		
	$options['single_post_style'] = array(
		'name' => esc_html__('Default Single Post Style', 'myriadwp'),	
		'desc' => esc_html__('You can override it for each post', 'myriadwp'),		
		'id' => 'single_post_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'fullwidth',
		'options' => array("fullwidth_sticky" => "Fullwidth Sticky",
						   "sidebar" => "With Sidebar",
						   "fullwidth" => "Fullwidth"));
						      
	$options['single_post_content_width'] = array(
		'name' => esc_html__('Single Post Row Content Width', 'myriadwp'),		
		'id' => 'single_post_content_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1280px',
		'options' => array("fullwidth" => "Fullwidth",
							"1440px" => "1440 px",
							"1280px" => "1280 px",
							"1000px" => "1000 px"));
							
	$options['single_post_content_width_responsive'] = array(
		'name' => esc_html__('Change Single Post Row Content width on Tablet', 'myriadwp'),
		'id' => 'single_post_content_width_responsive',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['single_post_content_width_responsive_percent'] = array(
		'name' => esc_html__('Single Post Row Content width on Tablet', 'myriadwp'),
		'id' => 'single_post_content_width_responsive_percent',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'tablet-width-70',
		'options' => array("tablet-width-70" => "70%",
							"tablet-width-80" => "80%",
							"tablet-width-90" => "90%"));
		
							
	$options['single_post_padding'] = array(
		'name' => esc_html__('Single Post Row Content Padding', 'myriadwp'),		
		'id' => 'single_post_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));

	$options[] = array(
		'name' => esc_html__('Single Post Row content custom paddings', 'myriadwp'),
		'type' => 'info',
		'desc' => esc_html__('Can be override for each page', 'myriadwp'),
		'class' => 'group_options single_post_paddings');		
		
	$options['single_post_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'single_post_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options single_post_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);	
		
	$options['single_post_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'single_post_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options single_post_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['single_post_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'single_post_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options single_post_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);
		
	$options['single_post_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'single_post_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options single_post_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);						   
	
	$options['single_post_margin'] = array(
		'name' => esc_html__('Single Post Row content margin', 'myriadwp'),		
		'id' => 'single_post_margin',
		'desc' => esc_html__('Can be override for each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'auto',
		'options' => array_merge(array('custom' => 'Custom'), $margins_array));	
		
	$options['single_post_top_margin'] = array(
		'name' => esc_html__('Single Post Row content top margin', 'myriadwp'),		
		'id' => 'single_post_top_margin',
		'desc' => esc_html__('Can be override for each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini inline', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);	
		
		
	$options['single_post_bottom_margin'] = array(
		'name' => esc_html__('Single Post Row content bottom margin', 'myriadwp'),		
		'id' => 'single_post_bottom_margin',
		'desc' => esc_html__('Can be override for each page', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini inline', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);
		
	$options['single_post_content_width_all'] = array(
		'name' => esc_html__('Content width', 'myriadwp'),
		'desc' => esc_html__('Post content, Comments, Comment form section width', 'myriadwp'),	// only for fullwidth style
		'id' => 'single_post_content_width_all',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'col-12',
		'options' => array("col-12" => "100%",
		                   "col-11" => "91%",
						   "col-10" => "83%",
						   "col-9" => "75%",
						   "col-8" => "66%",
						   "col-7" => "58%"));
	
	$options['single_post_content_bg_color'] = array(
		'name' => esc_html__('Content background color', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'single_post_content_bg_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['single_post_content_text_color'] = array(
		'name' => esc_html__('Content text color', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'single_post_content_text_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['single_post_content_link_color'] = array(
		'name' => esc_html__('Content link color', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'single_post_content_link_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['single_post_content_link_color_hover'] = array(
		'name' => esc_html__('Content link hover color', 'myriadwp'),
		'id'   => 'single_post_content_link_color_hover',
		'std'  => '',
		'type' => 'color' );
	
	$options['single_post_sidebar'] = array(
		'name' => esc_html__('Default sidebar for single posts', 'myriadwp'),		
		'id' => 'single_post_sidebar',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array("" => "None",
		                   "custom_sidebar_1" => "Default Sidebar",
						   "custom_sidebar_2" => "Sidebar 2",
						   "custom_sidebar_3" => "Sidebar 3"));
						   
	$options[] = array(
		'name' => esc_html__('Sidebar Colors', 'myriadwp'),
		'class' => 'group_options single_sidebar_link remove_wrapper',
		'type' => 'info');
	
	$options['default_single_sidebar_title_color'] = array(
		'name' => esc_html__('Title Color', 'myriadwp'),
		'id'   => 'default_single_sidebar_title_color',
		'std'  => '#232635',
		'class'=> 'group_options single_sidebar_link wrap_it column-2',
		'type' => 'color' );		
		
	$options['default_single_sidebar_text_color'] = array(
		'name' => esc_html__('Text Color', 'myriadwp'),
		'id'   => 'default_single_sidebar_text_color',
		'std'  => '#232635',
		'class'=> 'group_options single_sidebar_link wrap_it column-2',
		'type' => 'color' );
	
	$options['default_single_sidebar_link_color'] = array(
		'name' => esc_html__('Link Color', 'myriadwp'),
		'id'   => 'default_single_sidebar_link_color',
		'std'  => '#fd8376',
		'class'=> 'group_options single_sidebar_link wrap_it column-2',
		'type' => 'color' );
	
	$options['default_single_sidebar_link_hover_color'] = array(
		'name' => esc_html__('Link Hover color', 'myriadwp'),
		'id'   => 'default_single_sidebar_link_hover_color',
		'std'  => '#fd8376',
		'class'=> 'group_options single_sidebar_link wrap_it column-2',
		'type' => 'color' );			
	
	$options['post_related_posts'] = array(
		'name' => esc_html__('Show related posts', 'myriadwp'),		
		'id' => 'post_related_posts',
		'type' => 'select',
		'std' => '3',
		'options' => array("none" => "Do not show related posts",
						   "2" => "2",
						   "3" => "3",
						   "4" => "4"));
	$options['post_related_posts_excerpt'] = array(
		'name' => esc_html__('Show Excerpt', 'myriadwp'),		
		'id' => 'post_related_posts_excerpt',
		'type' => 'select',
		'std' => '20',
		'options' => array("no" => "No",
						   "full_excerpt" => "Full Excerpt",
						   "10" => "10 words",
						   "20" => "20 words",
						   "30" => "30 words"));
	
	$options['post_related_posts_layout'] = array(
		'name' => esc_html__('Related posts layout', 'myriadwp'),		
		'id' => 'post_related_posts_layout',
		'type' => 'select',
		'std' => 'boxed',
		'options' => array("boxed" 	=> "Boxed",
						   "" 		=> "Minimal"));
						   
	$options['post_related_posts_meta_layout'] = array(
		'name' => esc_html__('Date and Title layout', 'myriadwp'),		
		'id' => 'post_related_posts_meta_layout',
		'type' => 'select',
		'std' => 'column',
		'options' => array("column" => "Column",
						   "inline" => "Inline"));
						   
	$options['post_related_posts_use_duotone'] = array(
		'name' => esc_html__('Duotone effects on related post\'s featured images', 'myriadwp'),		
		'id' => 'post_related_posts_use_duotone',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['post_related_posts_duotone'] = array(
		'name' => esc_html__('Post related post\'s duotone effect', 'myriadwp'),		
		'id' => 'post_related_posts_duotone',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $duotone_array);
		
	$options['post_related_posts_duotone_color'] = array(
		'name' => esc_html__('Post related post\'s duotone custom color', 'myriadwp'),
		'id'   => 'post_related_posts_duotone_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['post_related_posts_duotone_gradient'] = array(
		'name' => esc_html__('Duotone effect gradient', 'myriadwp'),		
		'id' => 'post_related_posts_duotone_gradient',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['post_related_posts_duotone_gradient_direction'] = array(
		'name' => esc_html__('Gradient direction', 'myriadwp'),		
		'id' => 'post_related_posts_duotone_gradient_direction',
		'type' => 'select',
		'std' => 'to top right',
		'options' => array("to right" => "To Right",
						   "to bottom" => "To Bottom",
						   "to left" => "To Left",
						   "to top" => "To Top",
						   "to top right" => "To Top Right",
						   "to bottom right" => "To Bottom Right",
						   "to bottom left" => "To Bottom Left",
						   "to top left" => "To Top Left",
						   "circle" => "Radial"));
		
	$options['post_related_posts_duotone_color_2'] = array(
		'name' => esc_html__('Post related post\'s duotone custom color 2', 'myriadwp'),
		'id'   => 'post_related_posts_duotone_color_2',
		'std'  => '',
		'type' => 'color' );
		
	$options['post_related_posts_duotone_color_3'] = array(
		'name' => esc_html__('Post related post\'s duotone custom color 3', 'myriadwp'),
		'id'   => 'post_related_posts_duotone_color_3',
		'std'  => '',
		'type' => 'color' );
						   
	$options[] = array(
		'name' => esc_html__('Post Navigation Settings', 'myriadwp'),
		'type' => 'info');
	
	
	$options['post_navigation_style'] = array(
		'name' => esc_html__('Default Single Post Style Navigation', 'myriadwp'),		
		'id' => 'post_navigation_style',
		'type' => 'select',
		'std' => 'prev_next_bg_color_title_simple',
		'options' => array("only_next_simple" => "Only next post - simple",
						   "only_next_bg_image" => "Only next post - background featured image",
						   "only_next_bg_image_half" => "Only next post - background featured image left hand side",
						   "prev_next_bg_image" => "Previous / Next post - background featured image",
						   "prev_next_bg_color_simple" => "Previous / Next Simple",
						   "prev_next_bg_color_title_simple" => "Previous / Next Simple (with title preview)"));
	
	$options['post_navigation_all_link'] = array(
		'name' => esc_html__('Post navigation link in the middle', 'myriadwp'),		
		'id' => 'post_navigation_all_link',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $options_pages);
	
	$options['post_navigation_use_duotone'] = array(
		'name' => esc_html__('Duotone effects on background images', 'myriadwp'),		
		'id' => 'post_navigation_use_duotone',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['post_navigation_duotone'] = array(
		'name' => esc_html__('Post navigation duotone effect', 'myriadwp'),		
		'id' => 'post_navigation_duotone',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $duotone_array);
		
	$options['post_navigation_duotone_color'] = array(
		'name' => esc_html__('Post navigation duotone custom color', 'myriadwp'),
		'id'   => 'post_navigation_duotone_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['post_navigation_duotone_gradient'] = array(
		'name' => esc_html__('Duotone effect gradient', 'myriadwp'),		
		'id' => 'post_navigation_duotone_gradient',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['post_navigation_duotone_gradient_direction'] = array(
		'name' => esc_html__('Gradient direction', 'myriadwp'),		
		'id' => 'post_navigation_duotone_gradient_direction',
		'type' => 'select',
		'std' => 'to top right',
		'options' => array("to right" => "To Right",
						   "to bottom" => "To Bottom",
						   "to left" => "To Left",
						   "to top" => "To Top",
						   "to top right" => "To Top Right",
						   "to bottom right" => "To Bottom Right",
						   "to bottom left" => "To Bottom Left",
						   "to top left" => "To Top Left",
						   "circle" => "Radial"));
		
	$options['post_navigation_duotone_color_2'] = array(
		'name' => esc_html__('Post navigation duotone custom color 2', 'myriadwp'),
		'id'   => 'post_navigation_duotone_color_2',
		'std'  => '',
		'type' => 'color' );
		
	$options['post_navigation_duotone_color_3'] = array(
		'name' => esc_html__('Post navigation duotone custom color 3', 'myriadwp'),
		'id'   => 'post_navigation_duotone_color_3',
		'std'  => '',
		'type' => 'color' );
	
	
	$options['post_navigation_fullwidth'] = array(
		'name' => esc_html__('Fullwidth navigation section (recommended for Previous / Next styles)', 'myriadwp'),		
		'id' => 'post_navigation_fullwidth',
		'type' => 'checkbox',
		'std' => '1');
	
	$options['post_navigation_text_color'] = array(
		'name' => esc_html__('Post navigation text color', 'myriadwp'),
		'id'   => 'post_navigation_text_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['post_navigation_bg_color'] = array(
		'name' => esc_html__('Post navigation background color', 'myriadwp'),
		'id'   => 'post_navigation_bg_color',
		'std'  => '#f8f8f8',
		'type' => 'color' );
		
	$options['post_navigation_bg_color_opacity'] = array(
		'name' => esc_html__('Post navigation background color opacity', 'myriadwp'),		
		'id' => 'post_navigation_bg_color_opacity',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $opacity_array);
	
	$options[] = array(
		'name' => esc_html__('Featured Image / Title Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['post_change_header_colors_below'] = array(
		'name' => esc_html__('Change logo and header font color below Featured image', 'myriadwp'),		
		'id' => 'post_change_header_colors_below',
		'desc' => esc_html__('Only if Default header and Fullwidth post style are selected WITHOUT background color', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['post_change_menu_new_color_below'] = array(
		'name' => esc_html__('New Menu Font color below Featured image', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'post_change_menu_new_color_below',
		'std'  => '',
		'type' => 'color' );
	
	$options['post_change_header_colors'] = array(
		'name' => esc_html__('Change logo and header font color over Featured image', 'myriadwp'),		
		'id' => 'post_change_header_colors',
		'desc' => esc_html__('Only if Default header and Fullwidth post style are selected', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['post_change_menu_new_color'] = array(
		'name' => esc_html__('New Menu Font color over Featured image', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'post_change_menu_new_color',
		'std'  => '',
		'type' => 'color' );
	
	$options['post_hero_holder_background_color'] = array(
		'name' => esc_html__('Single post Title and Featured image background color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'post_hero_holder_background_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['post_hero_holder_background_color_opacity'] = array(
		'name' => esc_html__('Single post Title and Featured image background color opacity', 'myriadwp'),		
		'id' => 'post_hero_holder_background_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => array("0.1" => "10%",
						   "0.2" => "20%",
						   "0.3" => "30%",
						   "0.4" => "40%",
						   "0.5" => "50%",
						   "0.6" => "60%",
						   "0.7" => "70%",
						   "0.8" => "80%",
						   "0.9" => "90%",
						   "1"   => "100%"));
						   
	$options['post_duotone'] = array(
		'name' => esc_html__('Duotone effect', 'myriadwp'),		
		'id' => 'post_duotone',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $duotone_array);
		
	$options['post_duotone_custom'] = array(
		'name' => esc_html__('Duotone custom color', 'myriadwp'),
		'id'   => 'post_duotone_custom',
		'std'  => '',
		'type' => 'color' );
		
	$options['post_duotone_gradient'] = array(
		'name' => esc_html__('Duotone effect gradient', 'myriadwp'),		
		'id' => 'post_duotone_gradient',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['post_duotone_gradient_direction'] = array(
		'name' => esc_html__('Gradient direction', 'myriadwp'),		
		'id' => 'post_duotone_gradient_direction',
		'type' => 'select',
		'std' => 'to top right',
		'options' => array("to right" => "To Right",
						   "to bottom" => "To Bottom",
						   "to left" => "To Left",
						   "to top" => "To Top",
						   "to top right" => "To Top Right",
						   "to bottom right" => "To Bottom Right",
						   "to bottom left" => "To Bottom Left",
						   "to top left" => "To Top Left",
						   "circle" => "Radial"));
		
	$options['post_duotone_custom_2'] = array(
		'name' => esc_html__('Duotone custom color 2', 'myriadwp'),
		'id'   => 'post_duotone_custom_2',
		'std'  => '',
		'type' => 'color' );
		
	$options['post_duotone_custom_3'] = array(
		'name' => esc_html__('Duotone custom color 3', 'myriadwp'),
		'id'   => 'post_duotone_custom_3',
		'std'  => '',
		'type' => 'color' );		

						   
	$options['post_parallax'] = array(
		'name' => esc_html__('Parallax', 'myriadwp'),		
		'id' => 'post_parallax',
		'desc' => esc_html__('Only if Fullwidth style is selected', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
						   
	$options['post_hero_holder_title_color'] = array(
		'name' => esc_html__('Single post Title color', 'myriadwp'),
		'desc' => esc_html__('Default white', 'myriadwp'),
		'id'   => 'post_hero_holder_title_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['post_hero_holder_title_weight'] = array(
		'name' => esc_html__('Single post Title weight', 'myriadwp'),		
		'id' => 'post_hero_holder_title_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array(  ""    => "Inherit",
							"100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900"  => "900"));
							
	$options['post_hero_holder_title_size'] = array(
		'name' => esc_html__('Single post Title Size', 'myriadwp'),		
		'id' => 'post_hero_holder_title_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array(  ""    => "Default",
							"medium"  => "Medium",
							"large"  => "Large",
							"xl"  => "XL"));
		
	$options['post_hero_holder_title_position'] = array(
		'name' => esc_html__('Single post Title position', 'myriadwp'),		
		'id' => 'post_hero_holder_title_position',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'middle center',
		'options' => array("middle center" => "Middle Center",
						   "middle left" => "Middle Left",
						   "middle right" => "Middle Right",
						   "top center" => "Top Center",
						   "top left" => "Top Left",
						   "top right" => "Top Right",
						   "bottom center" => "Bottom Center",
						   "bottom left" => "Bottom Left",
						   "bottom right"   => "Bottom Right"));
						   
	$options['post_hero_holder_height'] = array(
		'name' => esc_html__('Single post Title and Featured image height', 'myriadwp'),		
		'id' => 'post_hero_holder_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-20',
		'options' => array("height-20" => "20%",
						   "height-25" => "25%",
						   "height-30" => "30%",
						   "height-35" => "35%",
						   "height-40" => "40%",
						   "height-45" => "45%",
						   "height-50" => "50%",
						   "height-55" => "55%",
						   "height-60" => "60%",
						   "height-65" => "65%",
						   "height-70" => "70%",
						   "height-75" => "75%",
						   "height-80" => "80%",
						   "height-85" => "85%",
						   "height-90" => "90%",
						   "height-95" => "95%",
						   "height-100" => "100%"));
	
	$options['post_single_meta_style'] = array(
		'name' => esc_html__('Post Single Meta Style', 'myriadwp'),		
		'id' => 'post_single_meta_style',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("uppercase" => "None",
						   "uppercase" => "UPPERCASE",
						   "lowercase" => "lowercase",
						   "capitalize" => "Capitalize"));
						   
	$options['post_single_meta_small'] = array(
		'name' => esc_html__('Small Post Meta', 'myriadwp'),		
		'id' => 'post_single_meta_small',
		'type' => 'checkbox',
		'std' => '1');
		
	$options['post_single_meta_bold'] = array(
		'name' => esc_html__('Bold Post Meta', 'myriadwp'),		
		'id' => 'post_single_meta_bold',
		'type' => 'checkbox',
		'std' => '1');

	
	$options['post_hero_holder_scroll_button'] = array(
		'name' => esc_html__('Post Scroll button', 'myriadwp'),		
		'id' => 'post_hero_holder_scroll_button',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("" => "None",
						   "three-arrows" => "Three Arrows",
						   "arrow" => "Arrow",
						   "mouse" => "Mouse",
						   "line" => "Line",
						   "pulse" => "Pulse"));
						   
	$options[] = array(
		'name' => esc_html__('Comment form Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['comment_form_layout'] = array(
		'name' => esc_html__('Comment form layout', 'myriadwp'),		
		'id' => 'comment_form_layout',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'default',
		'options' => array("default" => "Default",
						   "minimal" => "Minimal"));
						   
	$options['comment_button_default_background'] = array(
		'name' => esc_html__('Background input color', 'myriadwp'),
		'id'   => 'comment_button_default_background',
		'std'  => '',
		'type' => 'color' );
	
	$options['comment_button_shape'] = array(
		'name' => esc_html__('Comment form button shape', 'myriadwp'),		
		'id' => 'comment_button_shape',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array("" => "Rectangle",
						   "radius" => "Rounded"));
						   
	$options['comment_button_text'] = array(
		'name' => esc_html__('Text on comment button', 'myriadwp'),
		'id' => 'comment_button_text',
		'std' => 'Post Comment',
		'class' => '',
		'type' => 'text');
		
	$options['comment_button_size'] = array(
		'name' => esc_html__('Comment form button size', 'myriadwp'),		
		'id' => 'comment_button_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'medium',
		'options' => array("small" => "Small",
						   "medium" => "Medium",
						   "large" => "Large",
						   "xl" => "XL"));
						   
	$options['comment_button_hover'] = array(
		'name' => esc_html__('Comment form button gradient direction', 'myriadwp'),		
		'id' => 'comment_button_hover',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'to right',
		'options' => array( "to right" => "To Right",
							"to bottom" => "To Bottom",
							"to left" => "To Left",
							"to top" => "To Top",
							"to top right" => "To Top Right",
							"to bottom right" => "To Bottom Right",
							"to bottom left" => "To Bottom Left",
							"to top left" => "To Top Left",
							"ellipse farthest-corner at center" => "Radial"));
						   
	$options[] = array(
		'name' => esc_html__('Comment form button', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options comment_form_button_text remove_wrapper');
	
	$options['comment_button_text_color'] = array(
		'name' => esc_html__('Text color', 'myriadwp'),
		'id'   => 'comment_button_text_color',
		'std'  => '#ffffff',
		'class' => 'group_options comment_form_button_text wrap_it column-2',
		'type' => 'color' );
		
	$options['comment_button_text_hover_color'] = array(
		'name' => esc_html__('Text hover color', 'myriadwp'),
		'id'   => 'comment_button_text_hover_color',
		'std'  => '#ffffff',
		'class' => 'group_options comment_form_button_text wrap_it column-2',
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__('Comment form button background color', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options comment_form_bg_color');
	
	$options['comment_button_bg_color'] = array(
		'name' => esc_html__('Color', 'myriadwp'),
		'id'   => 'comment_button_bg_color',
		'std'  => '#232635',
		'class' => 'group_options comment_form_bg_color wrap_it column-2',
		'type' => 'color' );
		
	$options['comment_button_bg_color_2'] = array(
		'name' => esc_html__('Color 2', 'myriadwp'),
		'id'   => 'comment_button_bg_color_2',
		'std'  => '',
		'class' => 'group_options comment_form_bg_color wrap_it column-2',
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__('Comment form button hover background color', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options comment_form_bg_hover_color');
		
	$options['comment_button_bg_hover_color'] = array(
		'name' => esc_html__('Color', 'myriadwp'),
		'id'   => 'comment_button_bg_hover_color',
		'std'  => '#fd8376',
		'class' => 'group_options comment_form_bg_hover_color wrap_it column-2',
		'type' => 'color' );

	$options['comment_button_bg_hover_color_2'] = array(
		'name' => esc_html__('Color 2', 'myriadwp'),
		'id'   => 'comment_button_bg_hover_color_2',
		'std'  => '',
		'class' => 'group_options comment_form_bg_hover_color wrap_it column-2',
		'type' => 'color' );
////////////////////////////////////////////////////////////////////////////////////////////

if (class_exists('Brankic_Shortcodes')) {
						   
	$options[] = array(
		'name' => esc_html__('Portfolio Items', 'myriadwp'),
		'type' => 'heading');
		
	$count_posts = wp_count_posts("portfolio_item");

	if (isset($count_posts->publish)) $published_portfolio_items = $count_posts->publish;	
	else $published_portfolio_items = 0;
	
	if ($published_portfolio_items > 0) {


	$options['portfolio_item_style'] = array(
		'name' => esc_html__('Portfolio Item default style', 'myriadwp'),		
		'id' => 'portfolio_item_style',
		'type' => 'select',
		'class' => 'mini', 
		'std' => 'portfolio_style_1',
		'options' => array("portfolio_style_11" => "Split Screen",
						   "portfolio_style_12" => "Featured Title",
						   "portfolio_style_13" => "Featured Image")); 
						   
	$options['portfolio_item_content_width'] = array(
		'name' => esc_html__('Portfolio Item Content Width', 'myriadwp'),		
		'id' => 'portfolio_item_content_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1280px',
		'options' => array("fullwidth" => "Fullwidth",
							"1440px" => "1440 px",
							"1280px" => "1280 px",
							"1000px" => "1000 px"));
							
	$options['portfolio_item_text_container_width'] = array(
		'name' => esc_html__('Text Container Width', 'myriadwp'),		
		'id' => 'portfolio_item_text_container_width',
		'type' => 'select',
		'std' => 'col-12',
		'options' => array("col-6" => "50%",
						   "col-7" => "58%",						   
						   "col-8" => "67%",
						   "col-9" => "75%",
						   "col-10" => "83%",
						   "col-11" => "92%",
						   "col-12" => "100%"));
							
	$options['portfolio_item_content_width_responsive'] = array(
		'name' => esc_html__('Change Portfolio Item Content width on Tablet', 'myriadwp'),
		'id' => 'portfolio_item_content_width_responsive',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['portfolio_item_content_width_responsive_percent'] = array(
		'name' => esc_html__('Portfolio Item Content width on Tablet', 'myriadwp'),
		'id' => 'portfolio_item_content_width_responsive_percent',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'tablet-width-70',
		'options' => array("tablet-width-70" => "70%",
							"tablet-width-80" => "80%",
							"tablet-width-90" => "90%"));
		
	$options['portfolio_item_padding'] = array(
		'name' => esc_html__('Portfolio Item Content Padding', 'myriadwp'),		
		'id' => 'portfolio_item_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'padding-30',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('Portfolio item custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options portfolio_item_paddings');
	
	$options['portfolio_item_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'portfolio_item_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options portfolio_item_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-50',
		'options' => $paddings_array);	
		
	$options['portfolio_item_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'portfolio_item_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options portfolio_item_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-50',
		'options' => $paddings_array);
		
	$options['portfolio_item_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'portfolio_item_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options portfolio_item_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-50',
		'options' => $paddings_array);
		
	$options['portfolio_item_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'portfolio_item_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options portfolio_item_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-50',
		'options' => $paddings_array);	
		
	
	$options['portfolio_item_margin'] = array(
		'name' => esc_html__('Portfolio Item content margin', 'myriadwp'),		
		'id' => 'portfolio_item_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'auto',
		'options' => array_merge(array('custom' => 'Custom'), $margins_array));	
		
	$options['portfolio_item_top_margin'] = array(
		'name' => esc_html__('Portfolio Item content top margin', 'myriadwp'),		
		'id' => 'portfolio_item_top_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);	
		
	$options['portfolio_item_bottom_margin'] = array(
		'name' => esc_html__('Portfolio Item content bottom margin', 'myriadwp'),		
		'id' => 'portfolio_item_bottom_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);	

	$options[] = array(
		'name' => esc_html__('Portfolio item content colors', 'myriadwp'),
		'class' => '',
		'id' => 'portfolio_item_content_colors',
		'type' => 'info');	

	
	$options['portfolio_item_content_bg_color'] = array(
		'name' => esc_html__('Content background color', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'portfolio_item_content_bg_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['portfolio_item_content_text_color'] = array(
		'name' => esc_html__('Content text color', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'portfolio_item_content_text_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_content_link_color'] = array(
		'name' => esc_html__('Content link color', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'portfolio_item_content_link_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_content_link_color_hover'] = array(
		'name' => esc_html__('Content link hover color', 'myriadwp'),
		'id'   => 'portfolio_item_content_link_color_hover',
		'std'  => '',
		'type' => 'color' );
	
	$options[] = array(
		'name' => esc_html__('Featured Image / Title Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['portfolio_item_title_bg_color'] = array(
		'name' => esc_html__('Title background color for Featured Title style', 'myriadwp'),
		'id'   => 'portfolio_item_title_bg_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_change_header_colors_title'] = array(
		'name' => esc_html__('Change logo and header font color over Title', 'myriadwp'),		
		'id' => 'portfolio_item_change_header_colors_title',
		'desc' => esc_html__('Only if Default header and Featured Image Title portfolio style are selected', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['portfolio_item_change_menu_new_color_title'] = array(
		'name' => esc_html__('New Menu Font color over Title', 'myriadwp'),
		'id'   => 'portfolio_item_change_menu_new_color_title',
		'std'  => '',
		'type' => 'color' );
	
	$options['portfolio_item_change_header_colors'] = array(
		'name' => esc_html__('Change logo and header font color over Featured image', 'myriadwp'),		
		'id' => 'portfolio_item_change_header_colors',
		'desc' => esc_html__('Only if Default header and Fullwidth portfolio style are selected', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['portfolio_item_change_menu_new_color'] = array(
		'name' => esc_html__('New Menu Font color over Featured image', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'portfolio_item_change_menu_new_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_change_header_colors_below'] = array(
		'name' => esc_html__('Change logo and header font color below Featured image', 'myriadwp'),		
		'id' => 'portfolio_item_change_header_colors_below',
		'desc' => esc_html__('Only if Default header and Fullwidth post style are selected WITHOUT background color', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['portfolio_item_change_menu_new_color_below'] = array(
		'name' => esc_html__('New Menu Font color below Featured image', 'myriadwp'),
		'desc' => esc_html__('Can be override for each post', 'myriadwp'),
		'id'   => 'portfolio_item_change_menu_new_color_below',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_style_12_hero_0_fullwidth'] = array(
		'name' => esc_html__('Title area fullwidth', 'myriadwp'),		
		'id' => 'portfolio_item_style_12_hero_0_fullwidth',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no
		);	
		
	$options['portfolio_item_style_12_hero_0_container_width'] = array(
		'name' => esc_html__('Title area Container Width', 'myriadwp'),		
		'id' => 'portfolio_item_style_12_hero_0_container_width',
		'type' => 'select',
		'std' => 'col-12',
		'options' => array("col-6" => "50%",
						   "col-7" => "58%",						   
						   "col-8" => "67%",
						   "col-9" => "75%",
						   "col-10" => "83%",
						   "col-11" => "92%",
						   "col-12" => "100%"));
	
	$options['portfolio_item_style_12_hero_fullwidth'] = array(
		'name' => esc_html__('Featured image area fullwidth', 'myriadwp'),		
		'id' => 'portfolio_item_style_12_hero_fullwidth',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no
		);
		
	$options['portfolio_item_style_12_hero_container_width'] = array(
		'name' => esc_html__('Featured image area Container Width', 'myriadwp'),		
		'id' => 'portfolio_item_style_12_hero_container_width',
		'type' => 'select',
		'std' => 'col-12',
		'options' => array("col-6" => "50%",
						   "col-7" => "58%",						   
						   "col-8" => "67%",
						   "col-9" => "75%",
						   "col-10" => "83%",
						   "col-11" => "92%",
						   "col-12" => "100%"));
						   
	$options['portfolio_item_duotone'] = array(
		'name' => esc_html__('Duotone effect', 'myriadwp'),		
		'id' => 'portfolio_item_duotone',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $duotone_array);
		
	$options['portfolio_item_duotone_custom'] = array(
		'name' => esc_html__('Duotone custom color', 'myriadwp'),
		'id'   => 'portfolio_item_duotone_custom',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_duotone_gradient'] = array(
		'name' => esc_html__('Duotone effect gradient', 'myriadwp'),		
		'id' => 'portfolio_item_duotone_gradient',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['portfolio_item_duotone_gradient_direction'] = array(
		'name' => esc_html__('Gradient direction', 'myriadwp'),		
		'id' => 'portfolio_item_duotone_gradient_direction',
		'type' => 'select',
		'std' => 'to top right',
		'options' => array("to right" => "To Right",
						   "to bottom" => "To Bottom",
						   "to left" => "To Left",
						   "to top" => "To Top",
						   "to top right" => "To Top Right",
						   "to bottom right" => "To Bottom Right",
						   "to bottom left" => "To Bottom Left",
						   "to top left" => "To Top Left",
						   "circle" => "Radial"));
		
	$options['portfolio_item_duotone_custom_2'] = array(
		'name' => esc_html__('Duotone custom color 2', 'myriadwp'),
		'id'   => 'portfolio_item_duotone_custom_2',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_duotone_custom_3'] = array(
		'name' => esc_html__('Duotone custom color 3', 'myriadwp'),
		'id'   => 'portfolio_item_duotone_custom_3',
		'std'  => '',
		'type' => 'color' );
	
	$options['portfolio_item_hero_holder_background_color'] = array(
		'name' => esc_html__('Portfolio Title and Featured image background color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'portfolio_item_hero_holder_background_color',
		'std'  => '#000000',
		'type' => 'color' );
		
	$options['portfolio_item_hero_holder_background_color_opacity'] = array(
		'name' => esc_html__('Portfolio Title and Featured image background color opacity', 'myriadwp'),		
		'id' => 'portfolio_item_hero_holder_background_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '0.2',
		'options' => $opacity_array);
						   
	$options['portfolio_item_parallax'] = array(
		'name' => esc_html__('Parallax', 'myriadwp'),		
		'id' => 'portfolio_item_parallax',
		'desc' => esc_html__('Only if Fullwidth style is selected', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
						   
	$options['portfolio_item_hero_holder_title_color'] = array(
		'name' => esc_html__('Portfolio Title color', 'myriadwp'),
		'desc' => esc_html__('Default white', 'myriadwp'),
		'id'   => 'portfolio_item_hero_holder_title_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['portfolio_item_hero_holder_meta_color'] = array(
		'name' => esc_html__('Portfolio Post meta color', 'myriadwp'),
		'desc' => esc_html__('Default white', 'myriadwp'),
		'id'   => 'portfolio_item_hero_holder_meta_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['portfolio_item_hero_holder_title_weight'] = array(
		'name' => esc_html__('Portfolio Title weight', 'myriadwp'),		
		'id' => 'portfolio_item_hero_holder_title_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array(  ""    => "Inherit",
							"100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900"  => "900"));
							
	$options['portfolio_item_hero_holder_title_size'] = array(
		'name' => esc_html__('Portfolio Title Size', 'myriadwp'),		
		'id' => 'portfolio_item_hero_holder_title_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array(  ""    => "Default",
							"medium"  => "Medium",
							"large"  => "Large",
							"xl"  => "XL"));
		
	$options['portfolio_item_hero_holder_title_position'] = array(
		'name' => esc_html__('Portfolio Title position', 'myriadwp'),		
		'id' => 'portfolio_item_hero_holder_title_position',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'middle left',
		'options' => array("middle center" => "Middle Center",
						   "middle left" => "Middle Left",
						   "middle right" => "Middle Right",
						   "top center" => "Top Center",
						   "top left" => "Top Left",
						   "top right" => "Top Right",
						   "bottom center" => "Bottom Center",
						   "bottom left" => "Bottom Left",
						   "bottom right"   => "Bottom Right"));
						   
	$options['portfolio_item_hero_holder_height'] = array(
		'name' => esc_html__('Portfolio Featured image height', 'myriadwp'),		
		'id' => 'portfolio_item_hero_holder_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-65',
		'options' => array("height-20" => "20%",
						   "height-25" => "25%",
						   "height-30" => "30%",
						   "height-35" => "35%",
						   "height-40" => "40%",
						   "height-45" => "45%",
						   "height-50" => "50%",
						   "height-55" => "55%",
						   "height-60" => "60%",
						   "height-65" => "65%",
						   "height-70" => "70%",
						   "height-75" => "75%",
						   "height-80" => "80%",
						   "height-85" => "85%",
						   "height-90" => "90%",
						   "height-95" => "95%",
						   "height-100" => "100%"));
						   
	$options['portfolio_item_title_height'] = array(
		'name' => esc_html__('Portfolio Title height (Style Featured Title)', 'myriadwp'),		
		'id' => 'portfolio_item_title_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-65',
		'options' => array("height-20" => "20%",
						   "height-25" => "25%",
						   "height-30" => "30%",
						   "height-35" => "35%",
						   "height-40" => "40%",
						   "height-45" => "45%",
						   "height-50" => "50%",
						   "height-55" => "55%",
						   "height-60" => "60%",
						   "height-65" => "65%",
						   "height-70" => "70%",
						   "height-75" => "75%",
						   "height-80" => "80%",
						   "height-85" => "85%",
						   "height-90" => "90%",
						   "height-95" => "95%",
						   "height-100" => "100%"));
						   
	$options['portfolio_item_hero_holder_scroll_button'] = array(
		'name' => esc_html__('Portfolio post Scroll button', 'myriadwp'),		
		'id' => 'portfolio_item_hero_holder_scroll_button',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("" => "None",
						   "three-arrows" => "Three Arrows",
						   "arrow" => "Arrow",
						   "mouse" => "Mouse",
						   "line" => "Line",
						   "pulse" => "Pulse"));
						   
	
	
	$options[] = array(
		'name' => esc_html__('Portfolio Attributes Settings', 'myriadwp'),
		'type' => 'info');
		
	$options['portfolio_item_attributes_layout'] = array(
		'name' => esc_html__('Attributes Layout', 'myriadwp'),		
		'id' => 'portfolio_item_attributes_layout',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'inline',
		'options' => array("inline " => "Inline",
						   "column " => "Column",
						   "list" => "List"));
	
	$options['portfolio_item_details_caption'] = array(
		'name' => esc_html__('Portfolio Item Attributes caption', 'myriadwp'),
		'id' => 'portfolio_item_details_caption',
		'std' => 'Details',
		'class' => '',
		'type' => 'text');
	
	$options['portfolio_item_detail_1_caption'] = array(
		'name' => esc_html__('Portfolio Item attribute 1 caption', 'myriadwp'),
		'id' => 'portfolio_item_detail_1_caption',
		'std' => 'Client',
		'class' => '',
		'type' => 'text');
		
	$options['portfolio_item_detail_2_caption'] = array(
		'name' => esc_html__('Portfolio Item attribute 2 caption', 'myriadwp'),
		'id' => 'portfolio_item_detail_2_caption',
		'std' => 'Technics',
		'class' => '',
		'type' => 'text');
	
	$options['portfolio_item_detail_3_caption'] = array(
		'name' => esc_html__('Portfolio Item attribute 3 caption', 'myriadwp'),
		'id' => 'portfolio_item_detail_3_caption',
		'std' => 'Link',
		'class' => '',
		'type' => 'text');
		
	$options['portfolio_item_detail_4_caption'] = array(
		'name' => esc_html__('Portfolio Item attribute 4 caption', 'myriadwp'),
		'id' => 'portfolio_item_detail_4_caption',
		'std' => 'Year',
		'class' => '',
		'type' => 'text');
	
	
	$options['portfolio_item_content_caption'] = array(
		'name' => esc_html__('Portfolio Item content caption', 'myriadwp'),
		'id' => 'portfolio_item_content_caption',
		'std' => 'Case Studie',
		'class' => '',
		'type' => 'text');
		
	$options['portfolio_item_related_posts'] = array(
		'name' => esc_html__('Show related posts', 'myriadwp'),		
		'id' => 'portfolio_item_related_posts',
		'type' => 'select',
		'std' => '3',
		'options' => array("none" => "Do not show related posts",
						   "2" => "2",
						   "3" => "3",
						   "4" => "4"));
						   
	$options['portfolio_item_related_posts_use_duotone'] = array(
		'name' => esc_html__('Duotone effects on related post\'s featured images', 'myriadwp'),		
		'id' => 'portfolio_item_related_posts_use_duotone',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['portfolio_item_related_posts_duotone'] = array(
		'name' => esc_html__('Duotone effect', 'myriadwp'),		
		'id' => 'portfolio_item_related_posts_duotone',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $duotone_array);
		
	$options['portfolio_item_related_posts_duotone_color'] = array(
		'name' => esc_html__('Duotone custom color', 'myriadwp'),
		'id'   => 'portfolio_item_related_posts_duotone_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_related_posts_duotone_gradient'] = array(
		'name' => esc_html__('Duotone effect gradient', 'myriadwp'),		
		'id' => 'portfolio_item_related_posts_duotone_gradient',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['portfolio_item_related_posts_duotone_gradient_direction'] = array(
		'name' => esc_html__('Gradient direction', 'myriadwp'),		
		'id' => 'portfolio_item_related_posts_duotone_gradient_direction',
		'type' => 'select',
		'std' => 'to top right',
		'options' => array("to right" => "To Right",
						   "to bottom" => "To Bottom",
						   "to left" => "To Left",
						   "to top" => "To Top",
						   "to top right" => "To Top Right",
						   "to bottom right" => "To Bottom Right",
						   "to bottom left" => "To Bottom Left",
						   "to top left" => "To Top Left",
						   "circle" => "Radial"));
		
	$options['portfolio_item_related_posts_duotone_color_2'] = array(
		'name' => esc_html__('Duotone custom color 2', 'myriadwp'),
		'id'   => 'portfolio_item_related_posts_duotone_color_2',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_related_posts_duotone_color_3'] = array(
		'name' => esc_html__('Duotone custom color 3', 'myriadwp'),
		'id'   => 'portfolio_item_related_posts_duotone_color_3',
		'std'  => '',
		'type' => 'color' );
						   
	$options['portfolio_item_related_posts_meta_layout'] = array(
		'name' => esc_html__('Date and Title layout', 'myriadwp'),		
		'id' => 'portfolio_item_related_posts_meta_layout',
		'type' => 'select',
		'std' => 'column',
		'options' => array("column" => "Column",
						   "inline" => "Inline"));
		

	$options[] = array(
		'name' => esc_html__('Extra images Settings', 'myriadwp'),
		'type' => 'info');
		
	$options['extra_images_layout'] = array(
		'name' => esc_html__('Extra Images Layout', 'myriadwp'),		
		'id' => 'extra_images_layout',
		'type' => 'select',
		'std' => 'stack',
		'options' => array("stack" => "Stack",						   
						   "flex" => "Flex",
						   "grid_simple" => "Grid",
						   "grid_advanced" => "Grid Advanced",
						   "masonry" => "Masonry",
						   "carousel" => "Carousel"));
						   
	$options['extra_images_container_width'] = array(
		'name' => esc_html__('Extra Images Container Width', 'myriadwp'),		
		'id' => 'extra_images_container_width',
		'type' => 'select',
		'std' => 'col-12',
		'options' => array("col-6" => "50%",
						   "col-7" => "58%",						   
						   "col-8" => "67%",
						   "col-9" => "75%",
						   "col-10" => "83%",
						   "col-11" => "92%",
						   "col-12" => "100%"));
						   
	$options['portfolio_item_extra_images_fullwidth'] = array(
		'name' => esc_html__('Fullwidth images container', 'myriadwp'),		
		'id' => 'portfolio_item_extra_images_fullwidth',
		'type' => 'checkbox',
		'std' => '0');
						   
	$options['extra_images_no_padding'] = array(
		'name' => esc_html__('Disable padding for Extra images container', 'myriadwp'),		
		'id' => 'extra_images_no_padding',
		'type' => 'checkbox',
		'std' => '0');
		
	// carousel options
	
	$options['single_image_height'] = array(
		'name' => esc_html__('Image height', 'myriadwp'),		
		'id' => 'single_image_height',
		'type' => 'select',
		'std' => 'height-30',
		'options' => array("height-5"      => "5%",
							"height-10"     => "10%",
							"height-15"     => "15%",
							"height-20"     => "20%",
							"height-25"     => "25%",
							"height-30"     => "30%",
							"height-35"     => "35%",
							"height-40"     => "40%",
							"height-45"     => "45%",
							"height-50"     => "50%",
							"height-55"     => "55%",
							"height-60"     => "60%",
							"height-65"     => "65%",
							"height-70"     => "70%",
							"height-75"     => "75%",
							"height-80"     => "80%",
							"height-85"     => "85%",
							"height-90"     => "90%",
							"height-95"     => "95%",
							"height-100"     => "100%"));
							
	$options['emphasize_size'] = array(
		'name' => esc_html__('Emphasize Size of Active Slide', 'myriadwp'),		
		'id' => 'emphasize_size',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['emphasize_opacity'] = array(
		'name' => esc_html__('Emphasize Opacity of Active Slide', 'myriadwp'),		
		'id' => 'emphasize_opacity',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['carousel_navigation'] = array(
		'name' => esc_html__('Carousel Navigation', 'myriadwp'),		
		'id' => 'carousel_navigation',
		'type' => 'select',
		'std' => 'lines_below',
		'options' => array(''  => 'None',
							'arrows_side'  => 'Arrows Side',
							'arrows_below' => 'Arrows Below',
							'lines_below' => 'Lines Below',
							'dots_below' => 'Dots Below',
							'lines_inside' => 'Lines Inside',
							'dots_inside' => 'Dots Inside'));
							
	$options['carousel_navigation_align'] = array(
		'name' => esc_html__('Bottom navigation alignment', 'myriadwp'),		
		'id' => 'carousel_navigation_align',
		'type' => 'select',
		'std' => 'center',
		'options' => array('center'  => 'Center',
							'left'  => 'Left',
							'right' => 'Right'));
	
	$options['carousel_navigation_color'] = array(
		'name' => esc_html__('Carousel Navigation Color', 'myriadwp'),		
		'id' => 'carousel_navigation_color',
		'type' => 'select',
		'std' => 'center',
		'options' => array(''  => 'Dark',
							'light' => 'Light'));

	$options['fraction_navigation'] = array(
		'name' => esc_html__('Fraction Navigation', 'myriadwp'),		
		'id' => 'fraction_navigation',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['autoheight'] = array(
		'name' => esc_html__('Auto Height', 'myriadwp'),		
		'id' => 'autoheight',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['extra_images_carousel_centered'] = array(
		'name' => esc_html__('Centered slide', 'myriadwp'),		
		'id' => 'extra_images_carousel_centered',
		'type' => 'checkbox',
		'std' => '0');
		
	$options['extra_images_carousel_fade'] = array(
		'name' => esc_html__('Fade effect', 'myriadwp'),		
		'id' => 'extra_images_carousel_fade',
		'type' => 'checkbox',
		'std' => '0');
		
	$options['extra_images_carousel_loop'] = array(
		'name' => esc_html__('Loop', 'myriadwp'),		
		'id' => 'extra_images_carousel_loop',
		'type' => 'checkbox',
		'std' => '0');
		
	$options['extra_images_carousel_autoplay'] = array(
		'name' => esc_html__('Auto Play', 'myriadwp'),		
		'id' => 'extra_images_carousel_autoplay',
		'type' => 'checkbox',
		'std' => '0');
		
	$options['extra_images_carousel_speed'] = array(
		'name' => esc_html__('Speed (in ms)', 'myriadwp'),
		'id' => 'extra_images_carousel_speed',
		'std' => '1000',
		'class' => '',
		'type' => 'text');
		
	$options['extra_images_carousel_delay'] = array(
		'name' => esc_html__('Delay (in ms)', 'myriadwp'),
		'id' => 'extra_images_carousel_delay',
		'std' => '3000',
		'class' => '',
		'type' => 'text');
		
	$options['extra_images_carousel_gap'] = array(
		'name' => esc_html__('Gap between slides (only number)', 'myriadwp'),
		'id' => 'extra_images_carousel_gap',
		'std' => '0',
		'class' => '',
		'type' => 'text');
		
						   
	// end of carousel options
						   
	$options['extra_images_columns'] = array(
		'name' => esc_html__('Extra Images Columns', 'myriadwp'),		
		'id' => 'extra_images_columns',
		'type' => 'select',
		'std' => '3',
		'options' => array("1" => "1",
						   "2" => "2",						   
						   "3" => "3",
						   "4" => "4",
						   "5" => "5",
						   "6" => "6"));
						   
	$options['extra_images_stretch'] = array(
		'name' => esc_html__('Stretch last row', 'myriadwp'),		
		'id' => 'extra_images_stretch',
		'type' => 'checkbox',
		'std' => '1');
						   
	$options['extra_images_img_radius_size'] = array(
		'name' => esc_html__('Image radius size', 'myriadwp'),		
		'id' => 'extra_images_img_radius_size',
		'type' => 'select',
		'std' => '4px',
		'options' => array(	"" => "None",
							"1px" => "1px",
							"2px" => "2px",
							"3px" => "3px",
							"4px" => "4px",
							"5px" => "5px",
							"6px" => "6px",
							"7px" => "7px",
							"8px" => "8px",
							"9px" => "9px",
							"10px" => "10px",
							"11px" => "11px",
							"12px" => "12px",
							"13px" => "13px",
							"14px" => "14px",
							"15px" => "15px"));
						   
	$options['extra_images_gap'] = array(
		'name' => esc_html__('Extra Images Gap', 'myriadwp'),		
		'id' => 'extra_images_gap',
		'type' => 'select',
		'std' => '',
		'options' => array(	"" => "None",
							"2px" => "2px",
							"4px" => "4px",
							"6px" => "6px",
							"8px" => "8px",
							"10px" => "10px",
							"15px" => "15px",
							"20px" => "20px",
							"25px" => "25px",
							"30px" => "30px",
							"35px" => "35px",
							"40px" => "40px",
							"45px" => "45px",
							"50px" => "50px",
							"55px" => "55px",
							"60px" => "60px",
							"65px" => "65px",
							"70px" => "70px",
							"75px" => "75px"));
							
	$options['extra_images_grider_height'] = array(
		'name' => esc_html__('Height for Grider and Flex', 'myriadwp'),		
		'id' => 'extra_images_grider_height',
		'type' => 'select',
		'std' => '40',
		'options' => array(	"auto" => "auto",
							"20" => "20",
							"30" => "30",
							"40" => "40",
							"50" => "50",
							"60" => "60",
							"70" => "70",
							"80" => "80",
							"90" => "90"));					
							

	$options['extra_images_width_height'] = array(
		'name' => esc_html__('Images width and height', 'myriadwp'),
		'id' => 'extra_images_width_height',
		'desc' => esc_html__('w1 h1, w2 h2, w2 h1 w1 h2, w3 h2, w1 h3', 'myriadwp'),
		'std' => 'w1 h1',
		'class' => '',
		'type' => 'text');
							
	
	$options['extra_images_use_duotone'] = array(
		'name' => esc_html__('Duotone effects on Extra Images', 'myriadwp'),		
		'id' => 'extra_images_use_duotone',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['extra_images_duotone'] = array(
		'name' => esc_html__('Extra Images duotone effect', 'myriadwp'),		
		'id' => 'extra_images_duotone',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $duotone_array);
		
	$options['extra_images_duotone_color'] = array(
		'name' => esc_html__('Extra Images duotone custom color', 'myriadwp'),
		'id'   => 'extra_images_duotone_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['extra_images_duotone_gradient'] = array(
		'name' => esc_html__('Duotone effect gradient', 'myriadwp'),		
		'id' => 'extra_images_duotone_gradient',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['extra_images_duotone_gradient_direction'] = array(
		'name' => esc_html__('Gradient direction', 'myriadwp'),		
		'id' => 'extra_images_duotone_gradient_direction',
		'type' => 'select',
		'std' => 'to top right',
		'options' => array("to right" => "To Right",
						   "to bottom" => "To Bottom",
						   "to left" => "To Left",
						   "to top" => "To Top",
						   "to top right" => "To Top Right",
						   "to bottom right" => "To Bottom Right",
						   "to bottom left" => "To Bottom Left",
						   "to top left" => "To Top Left",
						   "circle" => "Radial"));
		
	$options['extra_images_duotone_color_2'] = array(
		'name' => esc_html__('Extra Images duotone custom color 2', 'myriadwp'),
		'id'   => 'extra_images_duotone_color_2',
		'std'  => '',
		'type' => 'color' );
		
	$options['extra_images_duotone_color_3'] = array(
		'name' => esc_html__('Extra Images duotone custom color 3', 'myriadwp'),
		'id'   => 'extra_images_duotone_color_3',
		'std'  => '',
		'type' => 'color' );	

	
	
	$options[] = array(
		'name' => esc_html__('Portfolio Navigation Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['portfolio_item_navigation_style'] = array(
		'name' => esc_html__('Default Portfolio Post Style Navigation', 'myriadwp'),		
		'id' => 'portfolio_item_navigation_style',
		'type' => 'select',
		'std' => 'only_next_bg_image',
		'options' => array("only_next_simple" => "Only next post - simple",
						   "only_next_bg_image" => "Only next post - background featured image",
						   "only_next_bg_image_half" => "Only next post - background featured image left hand side",
						   "prev_next_bg_image" => "Previous / Next post - background featured image",
						   "prev_next_bg_color_simple" => "Previous / Next Simple",
						   "prev_next_bg_color_title_simple" => "Previous / Next Simple (with background color)"));
						   
	$options['portfolio_item_navigation_all_link'] = array(
		'name' => esc_html__('Portfolio navigation link in the middle', 'myriadwp'),		
		'id' => 'portfolio_item_navigation_all_link',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $options_pages);
		
	$options['portfolio_item_navigation_use_duotone'] = array(
		'name' => esc_html__('Duotone effects on background images', 'myriadwp'),		
		'id' => 'portfolio_item_navigation_use_duotone',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['portfolio_item_navigation_duotone'] = array(
		'name' => esc_html__('Post navigation duotone effect', 'myriadwp'),		
		'id' => 'portfolio_item_navigation_duotone',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => $duotone_array);
		
	$options['portfolio_item_navigation_duotone_color'] = array(
		'name' => esc_html__('Post navigation duotone custom color', 'myriadwp'),
		'id'   => 'portfolio_item_navigation_duotone_color',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_navigation_duotone_gradient'] = array(
		'name' => esc_html__('Duotone effect gradient', 'myriadwp'),		
		'id' => 'portfolio_item_navigation_duotone_gradient',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['portfolio_item_navigation_duotone_gradient_direction'] = array(
		'name' => esc_html__('Gradient direction', 'myriadwp'),		
		'id' => 'portfolio_item_navigation_duotone_gradient_direction',
		'type' => 'select',
		'std' => 'to top right',
		'options' => array("to right" => "To Right",
						   "to bottom" => "To Bottom",
						   "to left" => "To Left",
						   "to top" => "To Top",
						   "to top right" => "To Top Right",
						   "to bottom right" => "To Bottom Right",
						   "to bottom left" => "To Bottom Left",
						   "to top left" => "To Top Left",
						   "circle" => "Radial"));
		
	$options['portfolio_item_navigation_duotone_color_2'] = array(
		'name' => esc_html__('Post navigation duotone custom color 2', 'myriadwp'),
		'id'   => 'portfolio_item_navigation_duotone_color_2',
		'std'  => '',
		'type' => 'color' );
		
	$options['portfolio_item_navigation_duotone_color_3'] = array(
		'name' => esc_html__('Post navigation duotone custom color 3', 'myriadwp'),
		'id'   => 'portfolio_item_navigation_duotone_color_3',
		'std'  => '',
		'type' => 'color' );
	
	
	$options['portfolio_item_navigation_fullwidth'] = array(
		'name' => esc_html__('Fullwidth navigation section ', 'myriadwp'),		
		'id' => 'portfolio_item_navigation_fullwidth',
		'type' => 'checkbox',
		'std' => '0');
	
	
	$options['portfolio_item_navigation_text_color'] = array(
		'name' => esc_html__('Portfolio Post navigation text color', 'myriadwp'),
		'id'   => 'portfolio_item_navigation_text_color',
		'std'  => '#000000',
		'type' => 'color' );
		
	$options['portfolio_item_navigation_bg_color'] = array(
		'name' => esc_html__('Portfolio Post navigation background color', 'myriadwp'),
		'id'   => 'portfolio_item_navigation_bg_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['portfolio_item_navigation_bg_color_opacity'] = array(
		'name' => esc_html__('Portfolio Post navigation background color opacity', 'myriadwp'),		
		'id' => 'portfolio_item_navigation_bg_color_opacity',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '0.5',
		'options' => $opacity_array);
		
		
			
	$options[] = array(
		'name' => esc_html__('Testimonials Settings', 'myriadwp'),
		'type' => 'info');
	
	$options['portfolio_item_show_testimonials'] = array(
		'name' => esc_html__('Show testimonials below the content', 'myriadwp'),		
		'id' => 'portfolio_item_show_testimonials',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);	
		
	$options['portfolio_item_testimonial_cat_id'] = array(
		'name' => esc_html__('Testimonial category to show', 'myriadwp'),		
		'id' => 'portfolio_item_testimonial_cat_id',
		'type' => 'select',
		'std' => '',
		'options' => $brankic_testimonials_names_count);	
		
		
	$options['portfolio_item_limit'] = array(
		'name' => esc_html__('Number of items to show (-1 for all)', 'myriadwp'),
		'id' => 'portfolio_item_limit',
		'std' => '-1',
		'class' => 'mini',
		'type' => 'text');
	
	$options['portfolio_item_testimonial_type'] = array(
		'name' => esc_html__('Testimonial type', 'myriadwp'),		
		'id' => 'portfolio_item_testimonial_type',
		'type' => 'select',
		'std' => 'default',
		'options' => array("default" => "Default",
						   "solid" => "Solid",
						   "monochrome" => "Monochrome",
						   "duo" => "Duo"));
						   
	$options['portfolio_item_carousel_navigation'] = array(
		'name' => esc_html__('Carousel Navigation', 'myriadwp'),		
		'id' => 'portfolio_item_carousel_navigation',
		'type' => 'select',
		'std' => 'default',
		'options' => array("" => "None",
						   "arrows_side" => "Arrows Side",
						   "arrows_below" => "Arrows Below",
						   "lines_below" => "Lines Below",
						   "dots_below" => "Dots Below",
						   "arrows_side lines_below" => "Arrows Side & Lines Below",
						   "arrows_side dots_below" => "Arrows Side & Dots Below"));
						   
	$options['portfolio_item_carousel_navigation_color'] = array(
		'name' => esc_html__('Carousel Navigation Color', 'myriadwp'),		
		'id' => 'portfolio_item_carousel_navigation_color',
		'type' => 'select',
		'std' => '',
		'options' => array("" => "Dark",
						   "light" => "Light"));

	$options['portfolio_item_bg_pattern'] = array(
		'name' => esc_html__('Carousel Background Pattern', 'myriadwp'),		
		'id' => 'portfolio_item_bg_pattern',
		'std' => '',
		'type' => 'upload');
		
	$options['portfolio_item_bg_color_testimonial'] = array(
		'name' => esc_html__('Carousel Background color', 'myriadwp'),
		'id' => 'portfolio_item_bg_color_testimonial',
		'std' => '#000',
		'type' => 'color' );
		
	$options['portfolio_item_bg_color_2_testimonial'] = array(
		'name' => esc_html__('Carousel Background color 2', 'myriadwp'),
		'id' => 'portfolio_item_bg_color_2_testimonial',
		'std' => '#000',
		'type' => 'color' );
		
	$options['portfolio_item_text_color_testimonial'] = array(
		'name' => esc_html__('Carousel Text color', 'myriadwp'),
		'id' => 'portfolio_item_text_color_testimonial',
		'std' => '#000',
		'type' => 'color' );
		
	$options['portfolio_item_speed'] = array(
		'name' => esc_html__('Carousel Speed in ms', 'myriadwp'),
		'id' => 'portfolio_item_speed',
		'std' => '1000',
		'class' => 'mini',
		'type' => 'text');
		
	$options['portfolio_item_slides_per_view'] = array(
		'name' => esc_html__('Carousel Slides per view (integer or auto)', 'myriadwp'),
		'id' => 'portfolio_item_slides_per_view',
		'std' => '3',
		'class' => 'mini',
		'type' => 'text');
		
	$options['portfolio_item_gap'] = array(
		'name' => esc_html__('Carousel Gap between slides', 'myriadwp'),
		'id' => 'portfolio_item_gap',
		'std' => '30',
		'class' => 'mini',
		'type' => 'text');
		
	}
		
}
		
///////////////////////////////////////////////////////////////////////////
	$options[] = array(
		'name' => esc_html__('Footer', 'myriadwp'),
		'type' => 'heading');
		
	$options['hide_footer'] = array(
		'name' => esc_html__('Don\'t show footer', 'myriadwp'),		
		'id' => 'hide_footer',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['footer_width'] = array(
		'name' => esc_html__('Footer width', 'myriadwp'),		
		'id' => 'footer_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1280px',
		'options' => array("fullwidth" => "Fullwidth",
							"1440px" => "1440 px",
							"1280px" => "1280 px",
							"1000px" => "1000 px"));
							
	$options['footer_width_responsive'] = array(
		'name' => esc_html__('Change Footer width on Tablet', 'myriadwp'),
		'id' => 'footer_width_responsive',
		'type' => 'radio',
		'std' => 'no',
		'options' => $yes_no);
	
	$options['footer_width_responsive_percent'] = array(
		'name' => esc_html__('Footer width on Tablet', 'myriadwp'),
		'id' => 'footer_width_responsive_percent',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'tablet-width-70',
		'options' => array("tablet-width-70" => "70%",
							"tablet-width-80" => "80%",
							"tablet-width-90" => "90%"));
	
	$options['footer_style'] = array(
		'name' => esc_html__('Footer positioning', 'myriadwp'),	
		'id' => 'footer_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'not_fixed',
		'options' => array("not_fixed" => "Normal",
						   "fixed" => "Fixed (hidden)",
					));

	$options['footer_layout'] = array(
		'name' => esc_html__('Footer widgets layout', 'myriadwp'),	
		'id' => 'footer_layout',
		'type' => 'images',
		'class' => 'mini', //mini, tiny, small
		'std' => '1/1',
		'options' => array("1/1" 								=> $imagepath . 'f-1.jpg',
						   "1/2 + 1/2" 							=> $imagepath . 'f-12.jpg',
						   "1/2 + 1/6 + 1/6 + 1/6" 				=> $imagepath . 'f-12161616.jpg',
						   "2/3 + 1/3" 							=> $imagepath . 'f-2313.jpg',
						   "1/3 + 2/3" 							=> $imagepath . 'f-1323.jpg',
						   "1/3 + 1/3 + 1/3" 					=> $imagepath . 'f-13.jpg',
						   "1/4 + 1/4 + 1/4 + 1/4" 				=> $imagepath . 'f-14.jpg',
						   "1/4 + 3/4" 							=> $imagepath . 'f-1434.jpg',
						   "3/4 + 1/4" 							=> $imagepath . 'f-3414.jpg',
						   "1/4 + 1/2 + 1/4" 					=> $imagepath . 'f-141214.jpg',
						   "5/6 + 1/6" 							=> $imagepath . 'f-5616.jpg',
						   "1/6 + 5/6" 							=> $imagepath . 'f-1656.jpg',
						   "1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6" 	=> $imagepath . 'f-16.jpg',
						   "1/6 + 2/3 + 1/6" 					=> $imagepath . 'f-162316.jpg',
						   "1/6 + 1/6 + 1/6 + 1/2" 				=> $imagepath . 'f-1612.jpg',
					));

	$options['footer_vertical_align'] = array(
		'name' => esc_html__('Footer content vertical align 1st row', 'myriadwp'),
		'id'   => 'footer_vertical_align',
		'type' => 'select',
		'std'  => '',
		'class'=> '',
		'options' => array( "" => "Top",
							"footer-content-middle" => "Middle",
							"footer-content-bottom" => "Bottom"));
	
	$options['default_footer_padding'] = array(
		'name' => esc_html__('Default footer padding', 'myriadwp'),		
		'id' => 'default_footer_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	
	$options[] = array(
		'name' => esc_html__('Default footer custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options footer_paddings');
	
	$options['default_footer_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'default_footer_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options footer_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);	
		
	$options['default_footer_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'default_footer_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options footer_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['default_footer_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'default_footer_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options footer_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);
		
	$options['default_footer_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'default_footer_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options footer_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
	
	$options['footer_text_align'] = array(
		'name' => esc_html__('Footer widgets alignment', 'myriadwp'),	
		'id' => 'footer_text_align',
		'type' => 'select',
		'std' => 'left',
		'options' => array("left" 								=> "Left",
						   "center" 							=> "Centered",
						   "justify" 							=> "Justified",
						   "right" 								=> "Right",
						   "left_center_right" 					=> "First left, middle centered, last right",
						   "left_right" 						=> "All left, last right",
					));
					
	$options['footer_bg_color'] = array(
		'name' => esc_html__('Footer 1st row background color', 'myriadwp'),
		'id' => 'footer_bg_color',
		'std' => '#232635',
		'type' => 'color' );
		
	$options['footer_gradient_direction'] = array(
		'name' => esc_html__('Footer background gradient', 'myriadwp'),		
		'id' => 'footer_gradient_direction',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => array( "none" => "None",
							"to right" => "To Right",
							"to bottom" => "To Bottom",
							"to left" => "To Left",
							"to top" => "To Top",
							"to top right" => "To Top Right",
							"to bottom right" => "To Bottom Right",
							"to bottom left" => "To Bottom Left",
							"to top left" => "To Top Left",
							"ellipse farthest-corner at center" => "Radial"));
		
	
	$options[] = array(
		'name' => esc_html__('Footer 1st row background gradient colors', 'myriadwp'),
		'type' => 'info',
		'id' => 'footer_1_gradient_info',
		'class' => 'group_options footer_gradient');
	
	
	$options['footer_bg_color_2'] = array(
		'name' => esc_html__('Gradient 2nd color', 'myriadwp'),
		'id' => 'footer_bg_color_2',
		'std' => '',
		'class'=> 'inline group_options footer_gradient',
		'type' => 'color' );
		
	$options['footer_bg_color_3'] = array(
		'name' => esc_html__('Gradient 3rd color', 'myriadwp'),
		'id' => 'footer_bg_color_3',
		'std' => '',
		'class'=> 'inline group_options footer_gradient',
		'type' => 'color' );
		
	$options['footer_bg_color_opacity'] = array(
		'name' => esc_html__('Footer 1st row background color opacity', 'myriadwp'),		
		'id' => 'footer_bg_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => $opacity_array);

	$options['footer_bg_image'] = array(
		'name' => esc_html__('Footer background image', 'myriadwp'),		
		'id' => 'footer_bg_image',
		'std' => '',
		'type' => 'upload');
		
	$options['footer_bg_image_style'] = array(
		'name' => esc_html__('Footer background image style', 'myriadwp'),	
		'id' => 'footer_bg_image_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'cover',
		'options' => array("cover" 		=> "Cover",
						   "contain" 	=> "Contain",
						   "no_repeat" 	=> "No Repeat",
						   "repeat" 	=> "Repeat"
					));
		
	$options[] = array(
		'name' => esc_html__('Footer 1st Row Colors', 'myriadwp'),
		'class' => 'group_options footer_1_colors remove_wrapper',
		'type' => 'info');	

	
	$options['footer_title_color'] = array(
		'name' => esc_html__('Widget title color', 'myriadwp'),
		'id' => 'footer_title_color',
		'std' => '#fff',
		'class'=> 'group_options footer_1_colors wrap_it column-2',
		'type' => 'color' );
	
	$options['footer_text_color'] = array(
		'name' => esc_html__('Text color', 'myriadwp'),
		'id' => 'footer_text_color',
		'std' => '#bbb',
		'class'=> 'group_options footer_1_colors wrap_it column-2',
		'type' => 'color' );
		
	$options['footer_link_color'] = array(
		'name' => esc_html__('Link color', 'myriadwp'),
		'id' => 'footer_link_color',
		'std' => '#fd8376',
		'class'=> 'group_options footer_1_colors wrap_it column-2',
		'type' => 'color' );
		
	$options['footer_link_hover_color'] = array(
		'name' => esc_html__('Link hover color', 'myriadwp'),
		'id' => 'footer_link_hover_color',
		'std' => '#fd8376',
		'class'=> 'group_options footer_1_colors wrap_it column-2',
		'type' => 'color' );
		
	
	
	$options['footer_border'] = array(
		'name' => esc_html__('Footer border', 'myriadwp'),		
		'id' => 'footer_border',
		'desc' => esc_html__('Border around whole footer content', 'myriadwp'),
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
	
	$options['footer_border_color'] = array(
		'name' => esc_html__('Footer border color', 'myriadwp'),
		'id'   => 'footer_border_color',
		'std'  => '#3f51b5',
		'type' => 'color' );

	$options['footer_border_width'] = array(
		'name' => esc_html__('Footer border width', 'myriadwp'),
		'id' => 'footer_border_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'loading',
		'options' => array( "1px" => "1 px",
							"2px" => "2 px",
							"3px" => "3 px",
							"4px" => "4 px",
							"5px" => "5 px",
							"6px" => "6 px",
							"7px" => "7 px",
							"8px" => "8 px",
							"9px" => "9 px",
							"10px" => "10 px",
							"12px" => "12 px",
							"14px" => "14 px",
							"16px" => "16 px",
							"18px" => "18 px",
							"20px" => "20 px",
							"24px" => "24 px",
							"28px" => "28 px",
							"32px" => "32 px",
							"36px" => "36 px",
							"40px" => "40 px",
							"45px" => "45 px",
							"50px" => "50 px",
							"60px" => "60 px",
							"70px" => "70 px",
							"80px" => "80 px",
							"90px" => "90 px",
							"100px" => "100 px"));
							
	$options['footer_border_custom'] = array(
		'name' => esc_html__('Footer border custom options', 'myriadwp'),
		'id' => 'footer_border_custom',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array( "" => "None",
							"all" => "Whole border",
							"only_top" => "Only top border",
							"no_top" => "No top border"));
		
	$options[] = array(
		'name' => esc_html__('Footer 2nd row settings', 'myriadwp'),
		'type' => 'info');	
		
	$options['footer_2_show'] = array(
		'name' => esc_html__('Show 2nd row in footer', 'myriadwp'),	
		'id' => 'footer_2_show',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	

	$options['footer_2_layout'] = array(
		'name' => esc_html__('Footer 2nd row widgets layout', 'myriadwp'),	
		'id' => 'footer_2_layout',
		'type' => 'images',
		'class' => 'mini', //mini, tiny, small
		'std' => '1/3 + 1/3 + 1/3',
		'options' => array("1/1" 								=> $imagepath . 'f-1.jpg',
						   "1/2 + 1/2" 							=> $imagepath . 'f-12.jpg',
						   "1/2 + 1/6 + 1/6 + 1/6" 				=> $imagepath . 'f-12161616.jpg',
						   "2/3 + 1/3" 							=> $imagepath . 'f-2313.jpg',
						   "1/3 + 2/3" 							=> $imagepath . 'f-1323.jpg',
						   "1/3 + 1/3 + 1/3" 					=> $imagepath . 'f-13.jpg',
						   "1/4 + 1/4 + 1/4 + 1/4" 				=> $imagepath . 'f-14.jpg',
						   "1/4 + 3/4" 							=> $imagepath . 'f-1434.jpg',
						   "3/4 + 1/4" 							=> $imagepath . 'f-3414.jpg',
						   "1/4 + 1/2 + 1/4" 					=> $imagepath . 'f-141214.jpg',
						   "5/6 + 1/6" 							=> $imagepath . 'f-5616.jpg',
						   "1/6 + 5/6" 							=> $imagepath . 'f-1656.jpg',
						   "1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6" 	=> $imagepath . 'f-16.jpg',
						   "1/6 + 2/3 + 1/6" 					=> $imagepath . 'f-162316.jpg',
						   "1/6 + 1/6 + 1/6 + 1/2" 				=> $imagepath . 'f-1612.jpg'
					));
	
	$options['footer_2_text_align'] = array(
		'name' => esc_html__('Footer 2nd row widgets alignment', 'myriadwp'),	
		'id' => 'footer_2_text_align',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'left_right',
		'options' => array("left" 								=> "Left",
						   "center" 							=> "Centered",
						   "justify" 							=> "Justified",
						   "right" 								=> "Right",
						   "left_center_right" 					=> "First left, middle centered, last right",
						   "left_right" 						=> "All left, last right",
					));
	
	
	$options['footer_2_vertical_align'] = array(
		'name' => esc_html__('Footer 2nd row content vertical align', 'myriadwp'),
		'id'   => 'footer_2_vertical_align',
		'type' => 'select',
		'std'  => '',
		'class'=> '',
		'options' => array( "" => "Top",
							"footer-content-middle" => "Middle",
							"footer-content-bottom" => "Bottom"));
	
	$options['footer_2_wrap_with_footer_1'] = array(
		'name' => esc_html__('Same style for 2nd row Footer as Footer 1st row', 'myriadwp'),	
		'desc' => esc_html__('Use the same background image and style as for Footer above', 'myriadwp'),	
		'id' => 'footer_2_wrap_with_footer_1',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
	
	
	$options['footer_2_bg_color'] = array(
		'name' => esc_html__('Footer 2nd row background color', 'myriadwp'),
		'id' => 'footer_2_bg_color',
		'std' => '',
		'type' => 'color' );
		
	$options['footer_2_gradient_direction'] = array(
		'name' => esc_html__('Footer 2nd row background gradient', 'myriadwp'),		
		'id' => 'footer_2_gradient_direction',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'none',
		'options' => array( "none" => "None",
							"to right" => "To Right",
							"to bottom" => "To Bottom",
							"to left" => "To Left",
							"to top" => "To Top",
							"to top right" => "To Top Right",
							"to bottom right" => "To Bottom Right",
							"to bottom left" => "To Bottom Left",
							"to top left" => "To Top Left",
							"ellipse farthest-corner at center" => "Radial"));

	$options[] = array(
		'name' => esc_html__('Footer 2nd row background gradient colors', 'myriadwp'),
		'type' => 'info',
		'id' => 'footer_2_gradient_info',
		'class' => 'group_options footer_2_gradient');
	
	
	$options['footer_2_bg_color_2'] = array(
		'name' => esc_html__('Gradient 2nd color', 'myriadwp'),
		'id' => 'footer_2_bg_color_2',
		'std' => '',
		'class'=> 'inline group_options footer_2_gradient',
		'type' => 'color' );
		
	$options['footer_2_bg_color_3'] = array(
		'name' => esc_html__('Gradient 3rd color', 'myriadwp'),
		'id' => 'footer_2_bg_color_3',
		'std' => '',
		'class'=> 'inline group_options footer_2_gradient',
		'type' => 'color' );
		
	$options['footer_2_bg_color_opacity'] = array(
		'name' => esc_html__('Footer 2nd row background color opacity', 'myriadwp'),		
		'id' => 'footer_2_bg_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => $opacity_array);
	
	$options['footer_2_bg_image'] = array(
		'name' => esc_html__('Footer 2nd row background image', 'myriadwp'),		
		'id' => 'footer_2_bg_image',
		'std' => '',
		'type' => 'upload');
		
	$options['footer_2_bg_image_style'] = array(
		'name' => esc_html__('Footer 2nd row background image style', 'myriadwp'),	
		'id' => 'footer_2_bg_image_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'cover',
		'options' => array("cover" 		=> "Cover",
						   "contain" 	=> "Contain",
						   "no_repeat" 	=> "No Repeat",
						   "repeat" 	=> "Repeat"
					));
		
	$options[] = array(
		'name' => esc_html__('Footer 2nd Row Colors', 'myriadwp'),
		'class' => 'group_options footer_2_colors remove_wrapper',
		'id' => 'footer_2_colors',
		'type' => 'info');
	
	$options['footer_2_title_color'] = array(
		'name' => esc_html__('Widget title color', 'myriadwp'),
		'id' => 'footer_2_title_color',
		'std' => '',
		'class'=> 'group_options footer_2_colors wrap_it column-2',
		'type' => 'color' );
	
	$options['footer_2_text_color'] = array(
		'name' => esc_html__('Text color', 'myriadwp'),
		'id' => 'footer_2_text_color',
		'std' => '',
		'class'=> 'group_options footer_2_colors wrap_it column-2',
		'type' => 'color' );
	
	$options['footer_2_link_color'] = array(
		'name' => esc_html__('Link color', 'myriadwp'),
		'id' => 'footer_2_link_color',
		'std' => '',
		'class'=> 'group_options footer_2_colors wrap_it column-2',
		'type' => 'color' );
		
	$options['footer_2_link_hover_color'] = array(
		'name' => esc_html__('Link hover color', 'myriadwp'),
		'id' => 'footer_2_link_hover_color',
		'std' => '',
		'class'=> 'group_options footer_2_colors wrap_it column-2',
		'type' => 'color' );
	
	
	$options['default_footer_2_padding'] = array(
		'name' => esc_html__('Default footer 2 padding', 'myriadwp'),		
		'id' => 'default_footer_2_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));

	$options[] = array(
		'name' => esc_html__('Default footer 2 custom paddings', 'myriadwp'),
		'type' => 'info',
		'id' => 'default_footer_2_custom_padding',
		'class' => 'group_options footer_2_paddings');		
		
	$options['default_footer_2_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'default_footer_2_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options footer_2_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-0',
		'options' => $paddings_array);	
		
	$options['default_footer_2_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'default_footer_2_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options footer_2_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['default_footer_2_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'default_footer_2_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options footer_2_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-0',
		'options' => $paddings_array);
		
	$options['default_footer_2_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'default_footer_2_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options footer_2_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
		
	$options[] = array(
		'name' => esc_html__('Footer Title Settings', 'myriadwp'),
		'type' => 'info');
		
	$options['footer_title_font_family'] = array(
		'name' => esc_html__('Title font family', 'myriadwp'),		
		'id' => 'footer_title_font_family',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array(""      => "None",
							"google_web_font_1" => "Google Web Font 1",
							"google_web_font_2" => "Google Web Font 2",
							"google_web_font_3" => "Google Web Font 3",
							"google_web_font_4" => "Google Web Font 4",
							"custom" 			=> "Custom"));	 		
		
		
	$options['footer_title_custom_font_family'] = array(
		'name' => esc_html__('Custom Title font family', 'myriadwp'),		
		'id' => 'footer_title_custom_font_family',
		'std' => '',
		'type' => 'text');	
	
	$options['footer_title_size'] = array(
		'name' => esc_html__('Title size', 'myriadwp'),
		'id' => 'footer_title_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '20px',
		'options' => $h_size_array);
	
	$options['footer_title_size_custom'] = array(
		'name' => esc_html__('Custom Title font-size', 'myriadwp'),		
		'id' => 'footer_title_size_custom',
		'std' => '',
		'type' => 'text');
	
	
	$options['footer_title_weight'] = array(
		'name' => esc_html__('Title weight', 'myriadwp'),
		'id' => 'footer_title_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '700',
		'options' => $font_weight_array);
		
	$options['footer_title_style'] = array(
		'name' => esc_html__('Title style', 'myriadwp'),
		'id' => 'footer_title_style',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'normal',
		'options' => $font_style_array);

	$options['footer_title_transform'] = array(
		'name' => esc_html__('Title transform', 'myriadwp'),
		'id' => 'footer_title_transform',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'capitalize',
		'options' => $font_transform_array);
		
	$options['footer_title_spacing'] = array(
		'name' => esc_html__('Title spacing', 'myriadwp'),
		'id' => 'footer_title_spacing',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '0',
		'options' => $font_spacing_array);
		
	$options['footer_title_height'] = array(
		'name' => esc_html__('Title height', 'myriadwp'),
		'id' => 'footer_title_height',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1',
		'options' => $font_height_array);
		
	$options['footer_title_height_custom'] = array(
		'name' => esc_html__('Custom Title line-height', 'myriadwp'),		
		'id' => 'footer_title_height_custom',
		'std' => '',
		'type' => 'text');

		

	

	
if( class_exists('WooCommerce') ) {
	
	$options[] = array(
		'name' => esc_html__('WooCommerce', 'myriadwp'),
		'type' => 'heading');
	
	$options['woo_content_width'] = array(
		'name' => esc_html__('WooCommmerce Content Width', 'myriadwp'),		
		'id' => 'woo_content_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1280px',
		'options' => array("fullwidth" => "Fullwidth",
							"1440px" => "1440 px",
							"1280px" => "1280 px",
							"1000px" => "1000 px"));
	
	$options['show_woocommerce'] = array(
		'name' => esc_html__('Show WooCommerce shopping cart in the menu', 'myriadwp'),		
		'id' => 'show_woocommerce',
		'desc' => esc_html__('Cart icon will be shown near the logo, or menu, depending on header you\'ve chosen ', 'myriadwp'),
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes_trolley',
		'options' => array("no" => "No",
						   "yes_trolley" => "Trolley",
						   "yes_bag" => "Bag"));
						   
	$options['show_woo_account'] = array(
		'name' => esc_html__('Show My Acount icon next to cart icon', 'myriadwp'),		
		'id' => 'show_woo_account',
		'type' => 'radio',
		'desc' => esc_html__('Profile icon will be shown near the cart icon', 'myriadwp'),
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no); 
		
	$options[] = array(
		'name' => esc_html__('Background Color Scheme (for buttons and icons)', 'myriadwp'),
		'class' => 'group_options woo_color_scheme remove_wrapper',
		'type' => 'info');
		

	$options['woo_color_scheme_color_1'] = array(
		'name' => esc_html__('Primary', 'myriadwp'),
		'id'   => 'woo_color_scheme_color_1',
		'std'  => '#fd8376',
		'class'=> 'group_options woo_color_scheme wrap_it column-2',
		'type' => 'color' );
		
	$options['woo_color_scheme_color_2'] = array(
		'name' => esc_html__('Secondary', 'myriadwp'),
		'id'   => 'woo_color_scheme_color_2',
		'std'  => '#232635',
		'class'=> 'group_options woo_color_scheme wrap_it column-2',
		'type' => 'color' );
		
	$options[] = array(
		'name' => esc_html__('Text Color Scheme (for buttons and icons)', 'myriadwp'),
		'class' => 'group_options woo_text_color_scheme remove_wrapper',
		'type' => 'info');
		

	$options['woo_text_color_scheme_color_1'] = array(
		'name' => esc_html__('Primary', 'myriadwp'),
		'id'   => 'woo_text_color_scheme_color_1',
		'std'  => '#ffffff',
		'class'=> 'group_options woo_text_color_scheme wrap_it column-2',
		'type' => 'color' );
		
	$options['woo_text_color_scheme_color_2'] = array(
		'name' => esc_html__('Secondary', 'myriadwp'),
		'id'   => 'woo_text_color_scheme_color_2',
		'std'  => '#ffffff',
		'class'=> 'group_options woo_text_color_scheme wrap_it column-2',
		'type' => 'color' );
	
	
	$options['woo_shop_sidebar'] = array(
		'name' => esc_html__('Shop page sidebar', 'myriadwp'),		
		'id' => 'woo_shop_sidebar',
		'desc' => esc_html__('In Appearance -> Widgets ', 'myriadwp'),
		'type' => 'select',
		'std' => 'woocommerce_shop',
		'options' => array("none" => "None",
		                   "woocommerce_shop " => "WooCommerce Shop"));
						   
	$options['woo_product_sidebar'] = array(
		'name' => esc_html__('Single product sidebar', 'myriadwp'),		
		'id' => 'woo_product_sidebar',
		'desc' => esc_html__('In Appearance -> Widgets ', 'myriadwp'),
		'type' => 'select',
		'std' => 'none',
		'options' => array("none" => "None",
		                   "woocommerce_product" => "WooCommerce Product"));
						   
	$options['woo_shop_columns'] = array(
		'name' => esc_html__('Shop page number of columns', 'myriadwp'),		
		'id' => 'woo_shop_columns',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'col2',
		'options' => array("col2" => "2 Columns",
						   "col3" => "3 Columns",
						   "col4" => "4 Columns",
		                   "col5 " => "5 Columns"));
						   
	$options['woo_shop_shadow'] = array(
		'name' => esc_html__('Shadow around thumbs', 'myriadwp'),		
		'id' => 'woo_shop_shadow',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);

	$options['woo_shop_shadow_color'] = array(
		'name' => esc_html__('Shadow color', 'myriadwp'),
		'id'   => 'woo_shop_shadow_color',
		'std'  => '',
		'type' => 'color' );	

	$options['woo_shop_img_radius'] = array(
		'name' => esc_html__('Image radius', 'myriadwp'),		
		'id' => 'woo_shop_img_radius',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array("" => "None",
							"1px" => "1px",
							"2px" => "2px",
							"3px" => "3px",
							"4px" => "4px",
							"5px" => "5px",
							"6px" => "6px",
							"7px" => "7px",
							"8px" => "8px",
							"9px" => "9px",
							"10px" => "10px",
							"11px" => "11px",
							"12px" => "12px",
							"13px" => "13px",
							"14px" => "14px",
							"15px" => "15px"));	
						   
						   
						   
	$options['woo_shop_products_layout'] = array(
		'name' => esc_html__('Shop page layout', 'myriadwp'),		
		'id' => 'woo_shop_products_layout',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array("" => "Normal",
		                   "minimal " => "Minimal"));
						   
	$options['woo_related_products'] = array(
		'name' => esc_html__('Number of related products', 'myriadwp'),		
		'id' => 'woo_related_products',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '4',
		'options' => array("2" => "2",
						   "3" => "3",
						   "4" => "4",
						   "5" => "5",
						   "6" => "6",
						   "7" => "7",
						   "8" => "8",
		                   "9" => "9"));
						   
	$options['woo_product_gallery'] = array(
		'name' => esc_html__('Product gallery position', 'myriadwp'),		
		'id' => 'woo_product_gallery',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'desc' => esc_html__('product thumb style', 'myriadwp'),
		'options' => array("" => "Horizontal",
						   "vertical" => "Vertical",
						   "grid" => "Grid",
						   "sticky" => "Stack / Sticky"));
						   
	$options['woo_no_image'] = array(
		'name' => esc_html__('No product image', 'myriadwp'),
		'id' => 'woo_no_image',
		'std' => get_template_directory_uri() . '/images/no_image.jpg',
		'type' => 'upload');	

	$options[] = array(
		'name' => esc_html__('SHOP PAGES Featured image and title', 'myriadwp'),
		'type' => 'info');	

	$options['show_woo_shop_featured_image_title'] = array(
		'name' => esc_html__('Show Featured image and title on shop page', 'myriadwp'),		
		'id' => 'show_woo_shop_featured_image_title',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
		
	$options['woo_shop_featured_image'] = array(
		'name' => esc_html__('Shop (category) default image', 'myriadwp'),		
		'id' => 'woo_shop_featured_image',
		'std' => '',
		'type' => 'upload');
		
	$options['woo_shop_hero_fullwidth'] = array(
		'name' => esc_html__('Featured image area fullwidth', 'myriadwp'),		
		'id' => 'woo_shop_hero_fullwidth',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no
		);

	$options['woo_shop_hero_holder_background_color'] = array(
		'name' => esc_html__('Title and Featured image background color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'woo_shop_hero_holder_background_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['woo_shop_hero_holder_background_color_opacity'] = array(
		'name' => esc_html__('Title and Featured image background color opacity', 'myriadwp'),		
		'id' => 'woo_shop_hero_holder_background_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => array("0.1" => "10%",
						   "0.2" => "20%",
						   "0.3" => "30%",
						   "0.4" => "40%",
						   "0.5" => "50%",
						   "0.6" => "60%",
						   "0.7" => "70%",
						   "0.8" => "80%",
						   "0.9" => "90%",
						   "1"   => "100%"));
	$options['woo_shop_page_parallax'] = array(
		'name' => esc_html__('Parallax', 'myriadwp'),		
		'id' => 'woo_shop_page_parallax',
		'type' => 'checkbox',
		'std' => '1');
						   
	$options['woo_shop_hero_holder_title_color'] = array(
		'name' => esc_html__('Title color', 'myriadwp'),
		'id'   => 'woo_shop_hero_holder_title_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['woo_shop_hero_holder_title_weight'] = array(
		'name' => esc_html__('Title weight', 'myriadwp'),		
		'id' => 'woo_shop_hero_holder_title_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array(  ""    => "Inherit",
							"100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900"  => "900"));
							
	$options['woo_shop_hero_holder_title_size'] = array(
		'name' => esc_html__('Title Size', 'myriadwp'),		
		'id' => 'woo_shop_hero_holder_title_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array(  ""    => "Default",
							"medium"  => "Medium",
							"large"  => "Large",
							"xl"  => "XL"));
		
	$options['woo_shop_hero_holder_title_position'] = array(
		'name' => esc_html__('Title position', 'myriadwp'),		
		'id' => 'woo_shop_hero_holder_title_position',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'middle center',
		'options' => array("middle center" => "Middle Center",
						   "middle left" => "Middle Left",
						   "middle right" => "Middle Right",
						   "top center" => "Top Center",
						   "top left" => "Top Left",
						   "top right" => "Top Right",
						   "bottom center" => "Bottom Center",
						   "bottom left" => "Bottom Left",
						   "bottom right"   => "Bottom Right"));
						   
	$options['woo_shop_hero_holder_height'] = array(
		'name' => esc_html__('Title and Featured image height', 'myriadwp'),		
		'id' => 'woo_shop_hero_holder_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-20',
		'options' => array("height-20" => "20%",
						   "height-25" => "25%",
						   "height-30" => "30%",
						   "height-35" => "35%",
						   "height-40" => "40%",
						   "height-45" => "45%",
						   "height-50" => "50%",
						   "height-55" => "55%",
						   "height-60" => "60%",
						   "height-65" => "65%",
						   "height-70" => "70%",
						   "height-75" => "75%",
						   "height-80" => "80%",
						   "height-85" => "85%",
						   "height-90" => "90%",
						   "height-95" => "95%",
						   "height-100" => "100%"));


	$options['woo_shop_hero_holder_scroll_button'] = array(
		'name' => esc_html__('Scroll button', 'myriadwp'),		
		'id' => 'woo_shop_hero_holder_scroll_button',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("" => "None",
						   "three-arrows" => "Three Arrows",
						   "arrow" => "Arrow",
						   "mouse" => "Mouse",
						   "line" => "Line",
						   "pulse" => "Pulse"));
						   
	

	$options['woo_shop_change_header_colors_below'] = array(
		'name' => esc_html__('Change logo and header font color below Featured image', 'myriadwp'),		
		'id' => 'woo_shop_change_header_colors_below',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['woo_shop_change_menu_new_color_below'] = array(
		'name' => esc_html__('New Menu Font color below Featured image', 'myriadwp'),
		'id'   => 'woo_shop_change_menu_new_color_below',
		'std'  => '',
		'type' => 'color' );
	
	$options['woo_shop_change_header_colors'] = array(
		'name' => esc_html__('Change logo and header font color over Featured image', 'myriadwp'),		
		'id' => 'woo_shop_change_header_colors',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['woo_shop_change_menu_new_color'] = array(
		'name' => esc_html__('New Menu Font color over Featured image', 'myriadwp'),
		'id'   => 'woo_shop_change_menu_new_color',
		'std'  => '',
		'type' => 'color' );	
		
	///////////////////////////////////////////////////////////////////


	$options['woo_shop_padding'] = array(
		'name' => esc_html__('WooCommerce shop page Content Padding', 'myriadwp'),		
		'id' => 'woo_shop_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('WooCommerce shop page custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options woo_shop_paddings');
	
	$options['woo_shop_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'woo_shop_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_shop_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);	
		
	$options['woo_shop_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'woo_shop_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_shop_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['woo_shop_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'woo_shop_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_shop_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);
		
	$options['woo_shop_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'woo_shop_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_shop_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);	
		
	
	$options['woo_shop_margin'] = array(
		'name' => esc_html__('WooCommerce shop page content margin', 'myriadwp'),		
		'id' => 'woo_shop_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'auto',
		'options' => array_merge(array('custom' => 'Custom'), $margins_array));	
		
	$options['woo_shop_top_margin'] = array(
		'name' => esc_html__('WooCommerce shop page content top margin', 'myriadwp'),		
		'id' => 'woo_shop_top_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);	
		
	$options['woo_shop_bottom_margin'] = array(
		'name' => esc_html__('WooCommerce shop page content bottom margin', 'myriadwp'),		
		'id' => 'woo_shop_bottom_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);
		



//////////////////////////////////////////////////////////////////	


	$options[] = array(
		'name' => esc_html__('Featured image and title on Account pages (My Account, Cart and Checkout)', 'myriadwp'),
		'type' => 'info');	

	$options['show_woo_account_featured_image_title'] = array(
		'name' => esc_html__('Show Featured image and title on Account pages', 'myriadwp'),		
		'id' => 'show_woo_account_featured_image_title',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no);
		
	$options['woo_account_my_account_image'] = array(
		'name' => esc_html__('My Account image', 'myriadwp'),		
		'id' => 'woo_account_my_account_image',
		'std' => '',
		'type' => 'upload');
		
	$options['woo_account_my_account_title'] = array(
		'name' => esc_html__('My Account title', 'myriadwp'),		
		'id' => 'woo_account_my_account_title',
		'std' => 'My Account',
		'type' => 'text');
		
	$options['woo_account_cart_image'] = array(
		'name' => esc_html__('Cart image', 'myriadwp'),		
		'id' => 'woo_account_cart_image',
		'std' => '',
		'type' => 'upload');
		
	$options['woo_account_cart_title'] = array(
		'name' => esc_html__('Cart page title', 'myriadwp'),		
		'id' => 'woo_account_cart_title',
		'std' => 'Cart',
		'type' => 'text');
		
	$options['woo_account_checkout_image'] = array(
		'name' => esc_html__('Checkout image', 'myriadwp'),		
		'id' => 'woo_account_checkout_image',
		'std' => '',
		'type' => 'upload');
		
	$options['woo_account_checkout_title'] = array(
		'name' => esc_html__('Checkout page title', 'myriadwp'),		
		'id' => 'woo_account_checkout_title',
		'std' => 'Checkout',
		'type' => 'text');
		
	$options['woo_account_hero_fullwidth'] = array(
		'name' => esc_html__('Featured image area fullwidth', 'myriadwp'),		
		'id' => 'woo_account_hero_fullwidth',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'yes',
		'options' => $yes_no
		);

	$options['woo_account_hero_holder_background_color'] = array(
		'name' => esc_html__('Title and Featured image background color', 'myriadwp'),
		'desc' => esc_html__('Default black', 'myriadwp'),
		'id'   => 'woo_account_hero_holder_background_color',
		'std'  => '#ffffff',
		'type' => 'color' );
		
	$options['woo_account_hero_holder_background_color_opacity'] = array(
		'name' => esc_html__('Title and Featured image background color opacity', 'myriadwp'),		
		'id' => 'woo_account_hero_holder_background_color_opacity',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '1',
		'options' => array("0.1" => "10%",
						   "0.2" => "20%",
						   "0.3" => "30%",
						   "0.4" => "40%",
						   "0.5" => "50%",
						   "0.6" => "60%",
						   "0.7" => "70%",
						   "0.8" => "80%",
						   "0.9" => "90%",
						   "1"   => "100%"));
	$options['woo_account_page_parallax'] = array(
		'name' => esc_html__('Parallax', 'myriadwp'),		
		'id' => 'woo_account_page_parallax',
		'type' => 'checkbox',
		'std' => '1');
						   
	$options['woo_account_hero_holder_title_color'] = array(
		'name' => esc_html__('Title color', 'myriadwp'),
		'id'   => 'woo_account_hero_holder_title_color',
		'std'  => '#232635',
		'type' => 'color' );
		
	$options['woo_account_hero_holder_title_weight'] = array(
		'name' => esc_html__('Title weight', 'myriadwp'),		
		'id' => 'woo_account_hero_holder_title_weight',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array(  ""    => "Inherit",
							"100"  => "100",
							"200"  => "200",
							"300"  => "300",
							"400"  => "400",
							"500"  => "500",
							"600"  => "600",
							"700"  => "700",
							"800"  => "800",
							"900"  => "900"));
							
	$options['woo_account_hero_holder_title_size'] = array(
		'name' => esc_html__('Title Size', 'myriadwp'),		
		'id' => 'woo_account_hero_holder_title_size',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '',
		'options' => array(  ""    => "Default",
							"medium"  => "Medium",
							"large"  => "Large",
							"xl"  => "XL"));
		
	$options['woo_account_hero_holder_title_position'] = array(
		'name' => esc_html__('Title position', 'myriadwp'),		
		'id' => 'woo_account_hero_holder_title_position',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'middle center',
		'options' => array("middle center" => "Middle Center",
						   "middle left" => "Middle Left",
						   "middle right" => "Middle Right",
						   "top center" => "Top Center",
						   "top left" => "Top Left",
						   "top right" => "Top Right",
						   "bottom center" => "Bottom Center",
						   "bottom left" => "Bottom Left",
						   "bottom right"   => "Bottom Right"));
						   
	$options['woo_account_hero_holder_height'] = array(
		'name' => esc_html__('Title and Featured image height', 'myriadwp'),		
		'id' => 'woo_account_hero_holder_height',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'height-20',
		'options' => array("height-20" => "20%",
						   "height-25" => "25%",
						   "height-30" => "30%",
						   "height-35" => "35%",
						   "height-40" => "40%",
						   "height-45" => "45%",
						   "height-50" => "50%",
						   "height-55" => "55%",
						   "height-60" => "60%",
						   "height-65" => "65%",
						   "height-70" => "70%",
						   "height-75" => "75%",
						   "height-80" => "80%",
						   "height-85" => "85%",
						   "height-90" => "90%",
						   "height-95" => "95%",
						   "height-100" => "100%"));


	$options['woo_account_account_hero_holder_scroll_button'] = array(
		'name' => esc_html__('Scroll button', 'myriadwp'),		
		'id' => 'woo_account_hero_holder_scroll_button',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => '',
		'options' => array("" => "None",
						   "three-arrows" => "Three Arrows",
						   "arrow" => "Arrow",
						   "mouse" => "Mouse",
						   "line" => "Line",
						   "pulse" => "Pulse"));

//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$options['woo_account_padding'] = array(
		'name' => esc_html__('Woo Account page Content Padding', 'myriadwp'),		
		'id' => 'woo_account_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('Woo Account page custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options woo_account_paddings');
	
	$options['woo_account_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'woo_account_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_account_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);	
		
	$options['woo_account_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'woo_account_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_account_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['woo_account_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'woo_account_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_account_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);
		
	$options['woo_account_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'woo_account_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_account_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);	
		
	
	$options['woo_account_margin'] = array(
		'name' => esc_html__('Woo Account page content margin', 'myriadwp'),		
		'id' => 'woo_account_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'auto',
		'options' => array_merge(array('custom' => 'Custom'), $margins_array));	
		
	$options['woo_account_top_margin'] = array(
		'name' => esc_html__('Woo Account page content top margin', 'myriadwp'),		
		'id' => 'woo_account_top_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);	
		
	$options['woo_account_bottom_margin'] = array(
		'name' => esc_html__('Woo Account page content bottom margin', 'myriadwp'),		
		'id' => 'woo_account_bottom_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);
		
/////////////////////////////////////////////////////////////////////////////	

	$options['woo_account_change_header_colors_below'] = array(
		'name' => esc_html__('Change logo and header font color below Featured image', 'myriadwp'),		
		'id' => 'woo_account_change_header_colors_below',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['woo_account_change_menu_new_color_below'] = array(
		'name' => esc_html__('New Menu Font color below Featured image', 'myriadwp'),
		'id'   => 'woo_account_change_menu_new_color_below',
		'std'  => '',
		'type' => 'color' );
	
	$options['woo_account_change_header_colors'] = array(
		'name' => esc_html__('Change logo and header font color over Featured image', 'myriadwp'),		
		'id' => 'woo_account_change_header_colors',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);
		
	$options['woo_account_change_menu_new_color'] = array(
		'name' => esc_html__('New Menu Font color over Featured image', 'myriadwp'),
		'id'   => 'woo_account_change_menu_new_color',
		'std'  => '',
		'type' => 'color' );



$options[] = array(
		'name' => esc_html__('Featured image and title on Product single pages', 'myriadwp'),
		'type' => 'info');

$options['woo_single_content_width'] = array(
		'name' => esc_html__('Woo Single Content Width', 'myriadwp'),		
		'id' => 'woo_single_content_width',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => '1280px',
		'options' => array("fullwidth" => "Fullwidth",
							"1440px" => "1440 px",
							"1280px" => "1280 px",
							"1000px" => "1000 px"));	

$options['woo_single_content_width_below'] = array(
		'name' => esc_html__('Woo Single Content Width Below Product image', 'myriadwp'),		
		'id' => 'woo_single_content_width_below',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'default',
		'options' => array("fullwidth" => "Fullwidth",
							"default" => "Default"));							

$options['woo_single_padding'] = array(
		'name' => esc_html__('Woo Single Content Padding', 'myriadwp'),		
		'id' => 'woo_single_padding',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'std' => 'custom',
		'options' => array_merge(array('custom' => 'Custom'), $paddings_array));	
		
	$options[] = array(
		'name' => esc_html__('Woo single page custom paddings', 'myriadwp'),
		'type' => 'info',
		'class' => 'group_options woo_single_paddings');
	
	$options['woo_single_top_padding'] = array(
		'name' => esc_html__('Top', 'myriadwp'),		
		'id' => 'woo_single_top_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_single_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);	
		
	$options['woo_single_right_padding'] = array(
		'name' => esc_html__('Right', 'myriadwp'),		
		'id' => 'woo_single_right_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_single_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);
		
	$options['woo_single_bottom_padding'] = array(
		'name' => esc_html__('Bottom', 'myriadwp'),		
		'id' => 'woo_single_bottom_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_single_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-70',
		'options' => $paddings_array);
		
	$options['woo_single_left_padding'] = array(
		'name' => esc_html__('Left', 'myriadwp'),		
		'id' => 'woo_single_left_padding',
		'type' => 'select',
		'class' => 'mini inline group_options woo_single_paddings wrap_it column-4', //mini, tiny, small
		'std' => 'padding-30',
		'options' => $paddings_array);	
		
	
	$options['woo_single_margin'] = array(
		'name' => esc_html__('Woo single page content margin', 'myriadwp'),		
		'id' => 'woo_single_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'auto',
		'options' => array_merge(array('custom' => 'Custom'), $margins_array));	
		
	$options['woo_single_top_margin'] = array(
		'name' => esc_html__('Woo single page content top margin', 'myriadwp'),		
		'id' => 'woo_single_top_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);	
		
	$options['woo_single_bottom_margin'] = array(
		'name' => esc_html__('Woo single page content bottom margin', 'myriadwp'),		
		'id' => 'woo_single_bottom_margin',
		'type' => 'select',
		'class' => '', //mini, tiny, small
		'std' => 'margin-50',
		'options' => $margins_array);
		
	$options['woo_single_change_header_colors'] = array(
		'name' => esc_html__('Change logo and header font color on product pages', 'myriadwp'),		
		'id' => 'woo_single_change_header_colors',
		'type' => 'radio',
		'class' => 'mini', //mini, tiny, small
		'std' => 'no',
		'options' => $yes_no);	
		
	$options['woo_single_change_menu_new_color'] = array(
		'name' => esc_html__('New Menu Font color on product pages', 'myriadwp'),
		'id'   => 'woo_single_change_menu_new_color',
		'std'  => '',
		'type' => 'color' );
		
/////////////////////////////////////////////////////////////////////////////	
		
}



	return $options;
}


/* 
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { 
	wp_enqueue_script( 'brankic_theme_options', get_template_directory_uri() . '/inc/brankic_theme_options.js', array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'myriadwp-optionsframework-admin', get_template_directory_uri() . '/css/brankic-optionsframework-admin.css', array("optionsframework"));
}