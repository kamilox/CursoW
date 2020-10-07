<?php






// Before VC Init
add_action( 'vc_before_init', 'vc_before_init_actions' );
 
function vc_before_init_actions() {
     
    // Setup VC to be part of a theme
    if( function_exists('vc_set_as_theme') ){ 
     
        //vc_set_as_theme( true ); 
         
    }

	//vc_set_shortcodes_templates_dir("../shortcodes");
	
	//vc_remove_element( "vc_icon" );
	// Link your VC elements's folder
    if( function_exists('vc_set_shortcodes_templates_dir') ){ 
		$dir = plugin_dir_path( __FILE__ ) . 'vc_shortcodes';
        vc_set_shortcodes_templates_dir( $dir ); 	
    }
	
	//require "shortcodes/vc_column.php";
     
    // Disable Instructional/Help Pointers
    if( function_exists('vc_pointer_load') ){ 
     
        remove_action( 'admin_enqueue_scripts', 'vc_pointer_load' );
         
    }
     
}

require_once dirname( __FILE__ ) . '/font-linea.php';






 
// After VC Init
add_action( 'vc_after_init', 'vc_after_init_actions' );


/**
 * Add file picker shartcode param.
 *
 * @param array $settings   Array of param seetings.
 * @param int   $value      Param value.
 */



 
function vc_after_init_actions() {
	
	






function file_picker_settings_field( $settings, $value ) {
  $output = '';
  $select_file_class = '';
  $remove_file_class = ' hidden';
  $attachment_url = wp_get_attachment_url( $value );
  if ( $attachment_url ) {
    $select_file_class = ' hidden';
    $remove_file_class = '';
  }
  $output .= '<div class="file_picker_block">
                <div class="' . esc_attr( $settings['type'] ) . '_display">' .
                  $attachment_url .
                '</div>
                <input type="hidden" name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
                 esc_attr( $settings['param_name'] ) . ' ' .
                 esc_attr( $settings['type'] ) . '_field" value="' . esc_attr( $value ) . '" />
                <button class="button file-picker-button' . $select_file_class . '">Select File</button>
                <button class="button file-remover-button' . $remove_file_class . '">Remove File</button>
              </div>
              ';
  return $output;
}
vc_add_shortcode_param( 'file_picker', 'file_picker_settings_field', plugin_dir_url( __FILE__ ) . '/file_picker.js' );



$sidebar_ids = array();

foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
	$sidebar_ids[$sidebar['name']] = $sidebar['id'];
	
}



	
	
	
	
$font_weight_array = array(
	"Default" => "",
	"Thin 100" => "100",
	"Extra-Light 200" => "200",
	"Light 300" => "300",
	"Regular 400" => "400",
	"Medium 500" => "500",
	"Semi-Bold 600" => "600",
	"Bold 700" => "700",
	"Extra-Bold 800" => "800",
	"Ultra-Bold 900" => "900"
);


$colors_array = array();

				   
$wow_array = array(		'None' => '---',
						'bounce' => 'bounce',
						'flash' => 'flash',
						'pulse' => 'pulse',
						'rubberBand' => 'rubberBand',
						'shake' => 'shake',
						'swing' => 'swing',
						'tada' => 'tada',
						'wobble' => 'wobble',
						'jello' => 'jello',
						'bounceIn' => 'bounceIn',
						'bounceInDown' => 'bounceInDown',
						'bounceInLeft' => 'bounceInLeft',
						'bounceInRight' => 'bounceInRight',
						'bounceInUp' => 'bounceInUp',
						'bounceOut' => 'bounceOut',
						'bounceOutDown' => 'bounceOutDown',
						'bounceOutLeft' => 'bounceOutLeft',
						'bounceOutRight' => 'bounceOutRight',
						'bounceOutUp' => 'bounceOutUp',
						'fadeIn' => 'fadeIn',
						'fadeInDown' => 'fadeInDown',
						'fadeInDownBig' => 'fadeInDownBig',
						'fadeInLeft' => 'fadeInLeft',
						'fadeInLeftBig' => 'fadeInLeftBig',
						'fadeInRight' => 'fadeInRight',
						'fadeInRightBig' => 'fadeInRightBig',
						'fadeInUp' => 'fadeInUp',
						'fadeInUpBig' => 'fadeInUpBig',
						'fadeOut' => 'fadeOut',
						'fadeOutDown' => 'fadeOutDown',
						'fadeOutDownBig' => 'fadeOutDownBig',
						'fadeOutLeft' => 'fadeOutLeft',
						'fadeOutLeftBig' => 'fadeOutLeftBig',
						'fadeOutRight' => 'fadeOutRight',
						'fadeOutRightBig' => 'fadeOutRightBig',
						'fadeOutUp' => 'fadeOutUp',
						'fadeOutUpBig' => 'fadeOutUpBig',
						'flip' => 'flip',
						'flipInX' => 'flipInX',
						'flipInY' => 'flipInY',
						'flipOutX' => 'flipOutX',
						'flipOutY' => 'flipOutY',
						'lightSpeedIn' => 'lightSpeedIn',
						'lightSpeedOut' => 'lightSpeedOut',
						'rotateIn' => 'rotateIn',
						'rotateInDownLeft' => 'rotateInDownLeft',
						'rotateInDownRight' => 'rotateInDownRight',
						'rotateInUpLeft' => 'rotateInUpLeft',
						'rotateInUpRight' => 'rotateInUpRight',
						'rotateOut' => 'rotateOut',
						'rotateOutDownLeft' => 'rotateOutDownLeft',
						'rotateOutDownRight' => 'rotateOutDownRight',
						'rotateOutUpLeft' => 'rotateOutUpLeft',
						'rotateOutUpRight' => 'rotateOutUpRight',
						'slideInUp' => 'slideInUp',
						'slideInDown' => 'slideInDown',
						'slideInLeft' => 'slideInLeft',
						'slideInRight' => 'slideInRight',
						'slideOutUp' => 'slideOutUp',
						'slideOutDown' => 'slideOutDown',
						'slideOutLeft' => 'slideOutLeft',
						'slideOutRight' => 'slideOutRight',
						'zoomIn' => 'zoomIn',
						'zoomInDown' => 'zoomInDown',
						'zoomInLeft' => 'zoomInLeft',
						'zoomInRight' => 'zoomInRight',
						'zoomInUp' => 'zoomInUp',
						'zoomOut' => 'zoomOut',
						'zoomOutDown' => 'zoomOutDown',
						'zoomOutLeft' => 'zoomOutLeft',
						'zoomOutRight' => 'zoomOutRight',
						'zoomOutUp' => 'zoomOutUp',
						'hinge' => 'hinge',
						'rollIn' => 'rollIn',
						'rollOut' => 'rollOut');

$wow_array_without_none_ = $wow_array;
$wow_array_without_none = array();						
array_shift($wow_array_without_none);	

foreach ($wow_array_without_none_ as $k => $v) {
	if ($k != "None") $wow_array_without_none[] = $v;
}


$duotone_array =array(
				"None"			=> "",
				"Custom"		=> "custom",
				"Single 0" 		=> "duotone single-color effect-0",
				"Single 1" 		=> "duotone single-color effect-1",
				"Single 2" 		=> "duotone single-color effect-2",
				"Single 3" 		=> "duotone single-color effect-3",
				"Single 4" 		=> "duotone single-color effect-4",
				"Single 5" 		=> "duotone single-color effect-5",
				"Single 6" 		=> "duotone single-color effect-6",
				"Single 7" 		=> "duotone single-color effect-7",
				"Single 8" 		=> "duotone single-color effect-8",
				"Single 9" 		=> "duotone single-color effect-9",
				"Single 10" 	=> "duotone single-color effect-10",
				"Single 11" 	=> "duotone single-color effect-11",
				"Single 12" 	=> "duotone single-color effect-12",
				"Single 13" 	=> "duotone single-color effect-13",
				"Single 14" 	=> "duotone single-color effect-14",
				"Single 15" 	=> "duotone single-color effect-15",
				"Multi 1" 		=> "duotone multi-color effect-1",
				"Multi 2" 		=> "duotone multi-color effect-2",
				"Multi 3" 		=> "duotone multi-color effect-3",
				"Multi 4" 		=> "duotone multi-color effect-4",
				"Multi 5" 		=> "duotone multi-color effect-5",
				"Multi 6" 		=> "duotone multi-color effect-6",
				"Multi 7" 		=> "duotone multi-color effect-7",
				"Multi 8" 		=> "duotone multi-color effect-8",
				"Multi 9" 		=> "duotone multi-color effect-9",
				"Multi 10" 		=> "duotone multi-color effect-10",
			);					

$opacity_array = array( "---" => "",
						"10%" => "opacity-1",
						"20%" => "opacity-2",
						"30%" => "opacity-3",
						"40%" => "opacity-4",
						"50%" => "opacity-5",
						"60%" => "opacity-6",
						"70%" => "opacity-7",
						"80%" => "opacity-8",
						"90%" => "opacity-9");	

$gradient_array = array( "---"  	=> "",
						"Color 1" 	=> "color-1",
						"Color 2" 	=> "color-2",
						"Color 3" 	=> "color-3",
						"Color 4" 	=> "color-4",
						"Color 5" 	=> "color-5",
						"Color 6" 	=> "color-6",
						"Color 7" 	=> "color-7",
						"Color 8" 	=> "color-8",
						"Color 9" 	=> "color-9",
						"Color 10" 	=> "color-10",
						"Color 11" 	=> "color-11",
						"Color 12" 	=> "color-12",
						"Color 13" 	=> "color-13",
						"Color 14" 	=> "color-14",
						"Color 15" 	=> "color-15",
						"Color 16" 	=> "color-16",
						"Color 17" 	=> "color-17",
						"Color 18" 	=> "color-18");	

$width_array = array( 	"---" => "",
						"10%" => "10%",
						"15%" => "15%",
						"20%" => "20%",
						"25%" => "25%",
						"30%" => "30%",
						"35%" => "35%",
						"40%" => "40%",
						"45%" => "45%",
						"50%" => "50%",
						"55%" => "55%",
						"60%" => "60%",
						"65%" => "65%",
						"70%" => "70%",
						"75%" => "75%",
						"80%" => "80%",
						"85%" => "85%",
						"90%" => "90%",
						"95%" => "95%",
						"100%"=> "100%");
						
$height_array = array(
                    "Default" => "",
					"5%"      => "height-5",
					"10%"     => "height-10",
					"15%"     => "height-15",
                    "20%"     => "height-20",
                    "25%"     => "height-25",
					"30%"     => "height-30",
                    "35%"     => "height-35",
                    "40%"     => "height-40",
					"45%"     => "height-45",
                    "50%"     => "height-50",
                    "55%"     => "height-55",
					"60%"     => "height-60",
                    "65%"     => "height-65",
                    "70%"     => "height-70",
					"75%"     => "height-75",
                    "80%"     => "height-80",
					"85%"     => "height-85",
                    "90%"     => "height-90",
                    "95%"     => "height-95",
					"100%"     => "height-100"
                );

$font_height_array = array(	"---" => "",
							"15px" => "15px",
							"20px" => "20px",
							"30px" => "30px",
							"40px" => "40px",
							"50px" => "50px",
							"60px" => "60px",
							"80% of font size" 	=> "0.8",
							"Same as font size" => "1",
							"110% of font size" => "1.1",
							"120% of font size" => "1.2",
							"130% of font size" => "1.3",
							"140% of font size" => "1.4",
							"150% of font size" => "1.5",
							"200% of font size" => "2",
							"Inherit" 			=> "inherit",
							"Custom" 			=> "custom");						

$integer_10_array = array (	"0" => "0",
							"1" => "1",
							"2" => "2",
							"3" => "3",
							"4" => "4",
							"5" => "5",
							"6" => "6",
							"7" => "7",
							"8" => "8",
							"9" => "9");	

						
	$google_web_font_family_1 = brankic_of_get_option("google_web_font_family_1", brankic_of_get_default("google_web_font_family_1"));							
	$google_web_font_family_2 = brankic_of_get_option("google_web_font_family_2", brankic_of_get_default("google_web_font_family_2"));	
	$google_web_font_family_3 = brankic_of_get_option("google_web_font_family_3", brankic_of_get_default("google_web_font_family_3"));	
	$google_web_font_family_4 = brankic_of_get_option("google_web_font_family_4", brankic_of_get_default("google_web_font_family_4"));	

							
							
							
$icons_array = array();									
$brankic_categories_names_count = array();
$brankic_portfolio_names_count = array();
$brankic_testimonials_names_count = array();
$brankic_woo_categories_names_count = array();
	
	
	
	
	//vc_remove_element( "vc_column" );
	//require "shortcodes/vc_column.php";
	
	if( function_exists('vc_remove_param') ){ 
        vc_remove_param( 'vc_column', 'css_animation' ); 
        vc_remove_param( 'vc_column', 'el_class' ); 
		vc_remove_param( 'vc_row', 'gap' ); 
		vc_remove_param( 'vc_column', 'vc_border-radius' );
		vc_remove_param( 'vc_column', 'border_radius' );
		vc_remove_param( 'vc_column_inner', 'vc_border-radius' );
		vc_remove_param( 'vc_column_inner', 'border_radius' );
    }
     
    // Enable VC by default on a list of Post Types
    if( function_exists('vc_set_default_editor_post_types') ){ 
         
        $list = array(
            'page',
            'post',
            'portfolio_item', // add here your custom post types slug
        );
         
        vc_set_default_editor_post_types( $list );
         
    }
     
    // Disable AdminBar VC edit link
    if( function_exists('vc_frontend_editor') ){
         
        remove_action( 'admin_bar_menu', array( vc_frontend_editor(), 'adminBarEditLink' ), 1000 );
         
    }
     
    // Disable Frontend VC links
    if( function_exists('vc_disable_frontend') ){
         
        vc_disable_frontend();
             
    } 

    // Add Params
	
	$vc_row_inner_new_params = array(
         
		array(
			"type" => "dropdown",
			"heading" => "WOW Effect for inner columns",
			"param_name" => "wow_effect",
			"value" => $wow_array,
        ),
		array(
			"type" => "dropdown",
			"heading" => "WOW effect step delay",
			"param_name" => "wow_delay",
			"value" => array(
				"0.1s" 	=> "0.1",
				"0.2s" 	=> "0.2",
				"0.3s" 	=> "0.3",
				"0.4s" 	=> "0.4",
				"0.5s" 	=> "0.5",
				"0.7s" 	=> "0.7",
				"1s" 	=> "1",
				"2s" 	=> "2"
			),
			'dependency' => array(
				'element' => 'wow_effect',
				'value'   => $wow_array_without_none,
			),
        ),
		array(
			"type" => "checkbox",
			"heading" => "Centered",
			"param_name" => "centered",
			"value" => array("" => "true"),
			'group' => 'Design Options',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image position',
			'param_name' => 'row_inner_bg_align',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Top Left' => 'brankic_bg_top_left',
				'Top Right' => 'brankic_bg_top_right',
				'Bottom Right' => 'brankic_bg_bottom_right',
				'Bottom Left' => 'brankic_bg_bottom_left',
				'Top' => 'brankic_bg_top',
				'Right' => 'brankic_bg_right',
				'Bottom' => 'brankic_bg_bottom',
				'Left' => 'brankic_bg_left',
				'Center' => 'brankic_bg_center',
			),
			'group' => 'Brankic Background Options',

		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image repeat',
			'param_name' => 'row_inner_bg_repeat',
			'std' => '',
			'value' => array(
				'Repeat' => 'repeat',
				'Repeat Y' => 'repeat-y',
				'Repeat X' => 'repeat-x',
				'No repeat' => 'no-repeat',

			),
			'group' => 'Brankic Background Options',

		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image size',
			'param_name' => 'row_inner_bg_size',
			'std' => 'cover',
			'value' => array(
				'Default' => 'auto',
				'Contain' => 'contain',
				'Cover' => 'cover',
			),
			'group' => 'Brankic Background Options',

		),
  		array(
			"type" => "dropdown",
			"heading" => "Row inner height",
			"param_name" => "brankic_row_inner_height",
			"value" => $height_array,
			'group' => 'Design Options',
		),  
		array(
			"type" => "colorpicker",
			"heading" => "Content color",
			"param_name" => "row_inner_content_color",
			"value" => "",
			'group' => 'Design Options',
        ),
		array(
			'type' => 'dropdown',
			'heading' => 'Columns gap',
			'param_name' => 'gap',
			'value' => array(
				'0px' => '0',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
				'40px' => '40',
				'45px' => '45',
				'50px' => '50',
				'55px' => '55',
				'60px' => '60',
				'65px' => '65',
				'70px' => '70',
				'75px' => '75',
				'80px' => '80',
				'85px' => '85',
				'90px' => '90',
				'95px' => '95',
				'100px' => '100',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Columns reverse',
			'param_name' => 'columns_mirror',
			'std' => '',
			'value' => array(
				'None' => '',
				'992 px' => 'column-mirror-992',
				'768 px' => 'column-mirror-768',
			),
			'description' => 'Break point on min-width',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Grid',
			'param_name' => 'brankic_grid',
			'std' => '',
			'value' => array(
				'None' => '',
				'Border outer' => 'border_outer',
				'Border inner' => 'border_inner',
			),
			'group' => 'Design Options',

		),
		array(
			"type" => "colorpicker",
			"heading" => "Grid color",
			"param_name" => "brankic_grid_color",
			"value" => "",
			'group' => 'Design Options',
			'dependency' => array(
				'element' => 'brankic_grid',
				'value'   => array("border_outer", "border_inner"),
			),
        ),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Background image',
			'param_name'	=> 'row_inner_brankic_bg_image',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Background image (URL from external source)',
			'param_name'	=> 'row_inner_brankic_bg_image_extra',
			'std'			=> '',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Background image Fixed attachment",
			"value" => array("" => "true"),
			"std" 	=> "",
			"param_name" => "bg_attachment",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Parallax",
			"value" => array("" => "true"),
			"param_name" => "brankic_parallax",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color",
			"param_name" => "row_inner_bg_color_1",
			"value" => "",
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient Background",
			"value" => array("" => "true"),
			"param_name" => "use_gradient_bg",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "row_inner_gradient_direction",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
		),
			
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 2 color",
			"param_name" => "row_inner_bg_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),	
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 3 color",
			"param_name" => "row_inner_bg_color_3",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 4 color",
			"param_name" => "row_inner_bg_color_4",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			'type' => 'file_picker',
			'class' => '',
			'heading' => "Video Background",
			'param_name' => 'file_picker',
			'value' => '',
			'group' => 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Video Background (URL from external source)',
			'param_name'	=> 'file_picker_extra',
			'std'			=> '',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Poster image',
			'param_name'	=> 'poster',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Poster image  (URL from external source)',
			'param_name'	=> 'poster_extra',
			'group' 		=> 'Brankic Background Options',
		),
	);
     
    vc_add_params( 'vc_row_inner', $vc_row_inner_new_params ); 

	
	
	
$vc_row_new_params = array(
         
 		array(
			"type" => "dropdown",
			"heading" => "WOW Effect for inner columns",
			"param_name" => "wow_effect",
			"value" => $wow_array,
        ),
		array(
			"type" => "dropdown",
			"heading" => "WOW effect step delay",
			"param_name" => "wow_delay",
			"value" => array(
				"0.1s" 	=> "0.1",
				"0.2s" 	=> "0.2",
				"0.3s" 	=> "0.3",
				"0.4s" 	=> "0.4",
				"0.5s" 	=> "0.5",
				"0.7s" 	=> "0.7",
				"1s" 	=> "1",
				"2s" 	=> "2"
			),
			'dependency' => array(
				'element' => 'wow_effect',
				'value'   => $wow_array_without_none,
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Row height",
			"param_name" => "brankic_row_height",
			"value" => $height_array,
			'group' => 'Design Options',
		),  
		array(
			'type' => 'dropdown',
			'heading' => 'Columns gap',
			'param_name' => 'gap',
			'value' => array(
				'0px' => '0',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
				'40px' => '40',
				'45px' => '45',
				'50px' => '50',
				'55px' => '55',
				'60px' => '60',
				'65px' => '65',
				'70px' => '70',
				'75px' => '75',
				'80px' => '80',
				'85px' => '85',
				'90px' => '90',
				'95px' => '95',
				'100px' => '100',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Columns reverse',
			'param_name' => 'columns_mirror',
			'std' => '',
			'value' => array(
				'None' => '',
				'992 px' => 'column-mirror-992',
				'768 px' => 'column-mirror-768',
			),
			'description' => 'Break point on min-width',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Content width',
			'param_name' => 'row_content_width',
			'std' => '',
			'value' => array(
				'Default' => '',
				'640px' => 'row-content-640',
				'700px' => 'row-content-700',
				'800px' => 'row-content-800',
				'900px' => 'row-content-900',
				'1000px' => 'row-content-1000',
				'1100px' => 'row-content-1100',
				'1200px' =>  'row-content-1200',
				'33%' => 'row-content-33',
				'50%' => 'row-content-50',
				'66%' => 'row-content-66',
				'75%' =>  'row-content-75',
			),
			'description' => 'Inner content width',
		),	
		array(
			'type' => 'dropdown',
			'heading' => 'Top SVG Mask Shape',
			'param_name' => 'top_row_svg_mask_shape',
			'std' => '',
			'value' => array(
				'No shape' 		=> '',
				'V' 			=> 'v',
				'V Triple' 		=> 'v-triple',
				'Slope Triple' 	=> 'slope-triple',
				'Slope' 		=> 'slope',
				'Wave' 			=> 'wave',
				'Check' 		=> 'check',
				'Convex' 		=> 'convex',
				'Zigzag' 		=> 'zigzag',
				'Custom' 		=> 'custom',
			),
			'description' => 'Top Row shape',
			'group' => 'Shape dividers',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> 'Custom Top SVG Path',
			'param_name'	=> 'custom_top_row_svg_mask_shape',
			'std'			=> '',
			'dependency' => array(
				'element' => 'top_row_svg_mask_shape',
				'value'   => 'custom',
			),
			'group' => 'Shape dividers',
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> 'Top Mask height (you have to add unit / px or %)',
			'param_name'	=> 'top_row_svg_mask_height',
			'std'			=> '',
			'dependency' => array(
				'element' => 'top_row_svg_mask_shape',
				'value'   => array("v", "v-triple", "slope-triple", "slope", "check", "wave", "convex", "zigzag"),
			),
			'group' => 'Shape dividers',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Top Mask fill color",
			"param_name" => "top_row_svg_mask_fill_color",
			"value" => "",
			'dependency' => array(
				'element' => 'top_row_svg_mask_shape',
				'value'   => array("v", "v-triple", "slope-triple", "slope", "check", "wave", "convex", "zigzag"),
			),
			'group' => 'Shape dividers',
        ),
		array(
			'type' => 'dropdown',
			'heading' => 'Bottom SVG Mask Shape',
			'param_name' => 'bottom_row_svg_mask_shape',
			'std' => '',
			'value' => array(
				'No shape' 		=> '',
				'V' 			=> 'v',
				'V Triple' 		=> 'v-triple',
				'Slope Triple' 	=> 'slope-triple',
				'Slope' 		=> 'slope',
				'Wave' 			=> 'wave',
				'Check' 		=> 'check',
				'Concave' 		=> 'concave',
				'Zigzag' 		=> 'zigzag',
				'Custom' 		=> 'custom',
			),
			'description' => 'Bottom Row shape',
			'group' => 'Shape dividers',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> 'Custom Bottom SVG Path',
			'param_name'	=> 'custom_bottom_row_svg_mask_shape',
			'std'			=> '',
			'dependency' => array(
				'element' => 'bottom_row_svg_mask_shape',
				'value'   => 'custom',
			),
			'group' => 'Shape dividers',
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> 'Bottom Mask height (you have to add unit / px or %)',
			'param_name'	=> 'bottom_row_svg_mask_height',
			'std'			=> '',
			'dependency' => array(
				'element' => 'bottom_row_svg_mask_shape',
				'value'   => array("v", "v-triple", "slope-triple", "slope", "check", "wave", "concave", "zigzag"),
			),
			'group' => 'Shape dividers',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Bottom Mask fill color",
			"param_name" => "bottom_row_svg_mask_fill_color",
			"value" => "",
			'dependency' => array(
				'element' => 'bottom_row_svg_mask_shape',
				'value'   => array("v", "v-triple", "slope-triple", "slope", "check", "wave", "concave", "zigzag"),
			),
			'group' => 'Shape dividers',
        ),   
		array(
			'type' => 'dropdown',
			'heading' => 'Background image position',
			'param_name' => 'row_bg_align',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Top Left' => 'brankic_bg_top_left',
				'Top Right' => 'brankic_bg_top_right',
				'Bottom Right' => 'brankic_bg_bottom_right',
				'Bottom Left' => 'brankic_bg_bottom_left',
				'Top' => 'brankic_bg_top',
				'Right' => 'brankic_bg_right',
				'Bottom' => 'brankic_bg_bottom',
				'Left' => 'brankic_bg_left',
				'Center' => 'brankic_bg_center',
			),
			'group' => 'Brankic Background Options',

		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image repeat',
			'param_name' => 'row_bg_repeat',
			'std' => 'no-repeat',
			'value' => array(
				'Repeat' => 'repeat',
				'Repeat Y' => 'repeat-y',
				'Repeat X' => 'repeat-x',
				'No repeat' => 'no-repeat',

			),
			'group' => 'Brankic Background Options',

		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image size',
			'param_name' => 'row_bg_size',
			'std' => 'cover',
			'value' => array(
				'Default' => 'auto',
				'Contain' => 'contain',
				'Cover' => 'cover',
			),
			'group' => 'Brankic Background Options',

		),
		
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			'type' => 'dropdown',
			'heading' => 'Grid',
			'param_name' => 'brankic_grid',
			'std' => '',
			'value' => array(
				'None' => '',
				'Border outer' => 'border_outer',
				'Border inner' => 'border_inner',
			),
			'group' => 'Design Options',

		),
		array(
			"type" => "colorpicker",
			"heading" => "Grid color",
			"param_name" => "brankic_grid_color",
			"value" => "",
			'group' => 'Design Options',
			'dependency' => array(
				'element' => 'brankic_grid',
				'value'   => array("border_outer", "border_inner"),
			),
        ),
		
		array(
			"type" => "colorpicker",
			"heading" => "Content color",
			"param_name" => "row_content_color",
			"value" => "",
			'group' => 'Design Options',
        ),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Background image',
			'param_name'	=> 'row_brankic_bg_image',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Background image (URL from external source)',
			'param_name'	=> 'row_brankic_bg_image_extra',
			'std'			=> '',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Background image Fixed attachment",
			"value" => array("" => "true"),
			"std" 	=> "",
			"param_name" => "bg_attachment",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Parallax",
			"value" => array("" => "true"),
			"param_name" => "brankic_parallax",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color",
			"param_name" => "row_bg_color_1",
			"value" => "",
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient Background",
			"value" => array("" => "true"),
			"param_name" => "use_gradient_bg",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "row_gradient_direction",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
		),
			
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 2 color",
			"param_name" => "row_bg_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),	
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 3 color",
			"param_name" => "row_bg_color_3",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 4 color",
			"param_name" => "row_bg_color_4",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			'type' => 'file_picker',
			'class' => '',
			'heading' => "Video Background",
			'param_name' => 'file_picker',
			'value' => '',
			'group' => 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Video Background (URL from external source)',
			'param_name'	=> 'file_picker_extra',
			'std'			=> '',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Poster image',
			'param_name'	=> 'poster',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Poster image  (URL from external source)',
			'param_name'	=> 'poster_extra',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Change header logo and color (only if transparent Default header is selected)",
			"description" => "You have to choose color in Custom Fields below the editor",
			"value" => array("" => "true"),
			"param_name" => "change_header_colors",
			'group' => 'Design Options',
		),	

    );
     
    vc_add_params( 'vc_row', $vc_row_new_params );	
		
	
	
	
	
    $vc_column_new_params = array(
         
   		array(
			"type" => "dropdown",
			"heading" => "WOW Effect for column",
			"param_name" => "wow_effect",
			"value" => $wow_array,
        ),
		array(
			"type" => "dropdown",
			"heading" => "WOW behaviour",
			"param_name" => "wow_behaviour",
			"value" => array(
				"Whole columnn" 	=> "column",
				"Columns elements" 	=> "elements"
			),
			'dependency' => array(
				'element' => 'wow_effect',
				'value'   => $wow_array_without_none,
			),
        ),
		
		array(
			"type" => "dropdown",
			"heading" => "WOW effect delay",
			"param_name" => "wow_delay",
			"value" => array(
				"0.1s" 	=> "0.1",
				"0.2s" 	=> "0.2",
				"0.3s" 	=> "0.3",
				"0.4s" 	=> "0.4",
				"0.5s" 	=> "0.5",
				"0.7s" 	=> "0.7",
				"1s" 	=> "1",
				"2s" 	=> "2"
			),
			'dependency' => array(
				'element' => 'wow_behaviour',
				'value'   => array("column"),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "WOW effect step delay",
			"param_name" => "wow_step_delay",
			"value" => array(
				"0.1s" 	=> "0.1",
				"0.2s" 	=> "0.2",
				"0.3s" 	=> "0.3",
				"0.4s" 	=> "0.4",
				"0.5s" 	=> "0.5",
				"0.7s" 	=> "0.7",
				"1s" 	=> "1",
				"2s" 	=> "2"
			),
			'dependency' => array(
				'element' => 'wow_behaviour',
				'value'   => array("elements"),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Column height",
			"param_name" => "brankic_column_height",
			"value" => $height_array,
		), 
		array(
			"type" => "checkbox",
			"heading" => "Sticky",
			"param_name" => "sticky",
			"value" => array("" => "true"),
			'group' => 'Design Options',
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Sticky on tablets",
			"param_name" => "responsive_sticky",
			"value" => array("" => "true"),
			'group' => 'Design Options',
		),
		array(
			"type" => "checkbox",
			"heading" => "Centered",
			"param_name" => "brankic_centered",
			"value" => array("" => "true")
		),
		array(
			"type" => "checkbox",
			"heading" => "Centered on tablet",
			"param_name" => "brankic_centered_tablet",
			"value" => array("" => "true")
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Content align',
			'param_name' => 'content_align',
			'value' => array(
				'Left' => '',
				'Center' => 'text-align-center',
				'Right' => 'text-align-right',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Content align on tablet',
			'param_name' => 'content_align_tablet',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Left' => 'tablet-text-align-left',
				'Center' => 'tablet-text-align-center',
				'Right' => 'tablet-text-align-right',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color",
			"param_name" => "shadow_color",
			"value" => "",
			'group' => 'Design Options',
		),	
		array(
			'type' => 'dropdown',
			'heading' => 'Offset direction',
			'param_name' => 'offset_direction',
			'value' => array(
				'None' => '',
				'Left' => 'offset left',
				'Right' => 'offset right',
			),
			'group' => 'Design Options',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Offset width',
			'param_name' => 'offset_width',
			'std' => 'offset-50',
			'value' => array(
				'10%' => 'offset-10',
				'20%' => 'offset-20',
				'30%' => 'offset-30',
				'40%' => 'offset-40',
				'50%' => 'offset-50',
				'60%' => 'offset-60',
				'70%' => 'offset-70',
				'80%' => 'offset-80',
			),
			'dependency' => array(
				'element' => 'offset_direction',
				'value' => array('offset left', 'offset right'),
			),
			'group' => 'Design Options',
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Offset",
			"description" => "Only for resolutions smaller than 1200px",
			"param_name" => "disable_offset",
			"value" => array("" => "true"),
			'dependency' => array(
				'element' => 'offset_direction',
				'value' => array('offset left', 'offset right'),
			),
			'group' => 'Design Options',
		),		
		array(
			'type' => 'dropdown',
			'heading' => 'Background image position',
			'param_name' => 'column_bg_align',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Top Left' => 'brankic_bg_top_left',
				'Top Right' => 'brankic_bg_top_right',
				'Bottom Right' => 'brankic_bg_bottom_right',
				'Bottom Left' => 'brankic_bg_bottom_left',
				'Top' => 'brankic_bg_top',
				'Right' => 'brankic_bg_right',
				'Bottom' => 'brankic_bg_bottom',
				'Left' => 'brankic_bg_left',
				'Center' => 'brankic_bg_center',
			),
			'group' => 'Brankic Background Options',

		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image repeat',
			'param_name' => 'column_bg_repeat',
			'std' => 'no-repeat',
			'value' => array(
				'Repeat' => 'repeat',
				'Repeat Y' => 'repeat-y',
				'Repeat X' => 'repeat-x',
				'No repeat' => 'no-repeat',

			),
			'group' => 'Brankic Background Options',

		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image size',
			'param_name' => 'column_bg_size',
			'std' => 'cover',
			'value' => array(
				'Default' => 'auto',
				'Contain' => 'contain',
				'Cover' => 'cover',
			),
			'group' => 'Brankic Background Options',

		),
		array(
			"type" => "colorpicker",
			"heading" => "Content color",
			"param_name" => "column_content_color",
			"value" => "",
			'group' => 'Design Options',
        ),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Background image',
			'param_name'	=> 'column_brankic_bg_image',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Background image (URL from external source)',
			'param_name'	=> 'column_brankic_bg_image_extra',
			'std'			=> '',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Background image Fixed attachment",
			"value" => array("" => "true"),
			"std" 	=> "",
			"param_name" => "bg_attachment",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Parallax",
			"value" => array("" => "true"),
			"param_name" => "brankic_parallax",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color",
			"param_name" => "column_bg_color_1",
			"value" => "",
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient Background",
			"value" => array("" => "true"),
			"param_name" => "use_gradient_bg",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "column_gradient_direction",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
		),
			
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 2 color",
			"param_name" => "column_bg_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),	
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 3 color",
			"param_name" => "column_bg_color_3",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 4 color",
			"param_name" => "column_bg_color_4",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			'type' => 'file_picker',
			'class' => '',
			'heading' => "Video Background",
			'param_name' => 'file_picker',
			'value' => '',
			'group' => 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Video Background (URL from external source)',
			'param_name'	=> 'file_picker_extra',
			'std'			=> '',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Poster image',
			'param_name'	=> 'poster',
			'group' 		=> 'Brankic Background Options',
		),	
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Poster image  (URL from external source)',
			'param_name'	=> 'poster_extra',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),		
     
    );
     
    vc_add_params( 'vc_column', $vc_column_new_params ); 
	
	
	$vc_column_inner_new_params = array(
         
 		array(
			"type" => "dropdown",
			"heading" => "WOW Effect for column",
			"param_name" => "wow_effect",
			"value" => $wow_array,
        ),
		array(
			"type" => "dropdown",
			"heading" => "WOW behaviour",
			"param_name" => "wow_behaviour",
			"value" => array(
				"Whole columnn" 	=> "column",
				"Columns elements" 	=> "elements"
			),
			'dependency' => array(
				'element' => 'wow_effect',
				'value'   => $wow_array_without_none,
			),
        ),
		
		array(
			"type" => "dropdown",
			"heading" => "WOW effect delay",
			"param_name" => "wow_delay",
			"value" => array(
				"0.1s" 	=> "0.1",
				"0.2s" 	=> "0.2",
				"0.3s" 	=> "0.3",
				"0.4s" 	=> "0.4",
				"0.5s" 	=> "0.5",
				"0.7s" 	=> "0.7",
				"1s" 	=> "1",
				"2s" 	=> "2"
			),
			'dependency' => array(
				'element' => 'wow_behaviour',
				'value'   => array("column"),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "WOW effect step delay",
			"param_name" => "wow_step_delay",
			"value" => array(
				"0.1s" 	=> "0.1",
				"0.2s" 	=> "0.2",
				"0.3s" 	=> "0.3",
				"0.4s" 	=> "0.4",
				"0.5s" 	=> "0.5",
				"0.7s" 	=> "0.7",
				"1s" 	=> "1",
				"2s" 	=> "2"
			),
			'dependency' => array(
				'element' => 'wow_behaviour',
				'value'   => array("elements"),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Column inner height",
			"param_name" => "brankic_column_inner_height",
			"value" => $height_array,
		), 
		
		array(
			"type" => "checkbox",
			"heading" => "Sticky",
			"param_name" => "sticky",
			"value" => array("" => "true"),
			'group' => 'Design Options',
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Sticky on tablets",
			"param_name" => "responsive_sticky",
			"value" => array("" => "true"),
			'group' => 'Design Options',
		),
		array(
			"type" => "checkbox",
			"heading" => "Centered",
			"param_name" => "centered",
			"value" => array("" => "true"),
		),
		array(
			"type" => "checkbox",
			"heading" => "Centered on tablet",
			"param_name" => "centered_tablet",
			"value" => array("" => "true"),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Content align',
			'param_name' => 'content_align',
			'value' => array(
				'Left' => '',
				'Center' => 'text-align-center',
				'Right' => 'text-align-right',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Content align on tablet',
			'param_name' => 'content_align_tablet',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Left' => 'tablet-text-align-left',
				'Center' => 'tablet-text-align-center',
				'Right' => 'tablet-text-align-right',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image position',
			'param_name' => 'column_inner_bg_align',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Top Left' => 'brankic_bg_top_left',
				'Top Right' => 'brankic_bg_top_right',
				'Bottom Right' => 'brankic_bg_bottom_right',
				'Bottom Left' => 'brankic_bg_bottom_left',
				'Top' => 'brankic_bg_top',
				'Right' => 'brankic_bg_right',
				'Bottom' => 'brankic_bg_bottom',
				'Left' => 'brankic_bg_left',
				'Center' => 'brankic_bg_center',
			),
			'group' => 'Brankic Background Options',

		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image repeat',
			'param_name' => 'column_inner_bg_repeat',
			'std' => 'no-repeat',
			'value' => array(
				'Repeat' => 'repeat',
				'Repeat Y' => 'repeat-y',
				'Repeat X' => 'repeat-x',
				'No repeat' => 'no-repeat',

			),
			'group' => 'Brankic Background Options',

		),
		array(
			'type' => 'dropdown',
			'heading' => 'Background image size',
			'param_name' => 'column_inner_bg_size',
			'std' => 'cover',
			'value' => array(
				'Default' => 'auto',
				'Contain' => 'contain',
				'Cover' => 'cover',
			),
			'group' => 'Brankic Background Options',

		),
		array(
			"type" => "colorpicker",
			"heading" => "Content color",
			"param_name" => "column_inner_content_color",
			"value" => "",
			'group' => 'Design Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color",
			"param_name" => "shadow_color",
			"value" => "",
			'group' => 'Design Options',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Offset direction',
			'param_name' => 'offset_direction',
			'value' => array(
				'None' => '',
				'Left' => 'offset left',
				'Right' => 'offset right',
			),
			'group' => 'Design Options',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Offset width',
			'param_name' => 'offset_width',
			'std' => 'offset-50',
			'value' => array(
				'10%' => 'offset-10',
				'20%' => 'offset-20',
				'30%' => 'offset-30',
				'40%' => 'offset-40',
				'50%' => 'offset-50',
				'60%' => 'offset-60',
				'70%' => 'offset-70',
				'80%' => 'offset-80',
			),
			'dependency' => array(
				'element' => 'offset_direction',
				'value' => array('offset left', 'offset right'),
			),
			'group' => 'Design Options',
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Offset",
			"description" => "Only for resolutions smaller than 1200px",
			"param_name" => "disable_offset",
			"value" => array("" => "true"),
			'dependency' => array(
				'element' => 'offset_direction',
				'value' => array('offset left', 'offset right'),
			),
			'group' => 'Design Options',
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Background image',
			'param_name'	=> 'column_inner_brankic_bg_image',
			'group' => 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Background image (URL from external source)',
			'param_name'	=> 'column_inner_brankic_bg_image_extra',
			'std'			=> '',
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Background image Fixed attachment",
			"value" => array("" => "true"),
			"std" 	=> "",
			"param_name" => "bg_attachment",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Parallax",
			"value" => array("" => "true"),
			"param_name" => "brankic_parallax",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color",
			"param_name" => "column_inner_bg_color_1",
			"value" => "",
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient Background",
			"value" => array("" => "true"),
			"param_name" => "use_gradient_bg",
			'group' => 'Brankic Background Options',
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "column_inner_gradient_direction",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
		),
			
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 2 color",
			"param_name" => "column_inner_bg_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),	
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 3 color",
			"param_name" => "column_inner_bg_color_3",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 4 color",
			"param_name" => "column_inner_bg_color_4",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
			'group' => 'Brankic Background Options',
        ),
		array(
			'type' => 'file_picker',
			'class' => '',
			'heading' => "Video Background",
			'param_name' => 'file_picker',
			'value' => '',
			'group' => 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Video Background (URL from external source)',
			'param_name'	=> 'file_picker_extra',
			'std'			=> '',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Poster image',
			'param_name'	=> 'poster',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Poster image  (URL from external source)',
			'param_name'	=> 'poster_extra',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
	);
     
    vc_add_params( 'vc_column_inner', $vc_column_inner_new_params ); 
	
	$vc_column_text_new_params = array(
         
		
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight text color",
			"param_name" 	=> "highlight_text_color",
			"value" 		=> "",
			"group" 		=> "Brankic Highlights",
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight Hover text color",
			"param_name" 	=> "highlight_hover_text_color",
			"value" 		=> "",
			"group" 		=> "Brankic Highlights",
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight background color 1",
			"param_name" 	=> "highlight_background_color_1",
			"value" 		=> "",
			"group" 		=> "Brankic Highlights",
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight background color 2",
			"param_name" 	=> "highlight_background_color_2",
			"value" 		=> "",
			"group" 		=> "Brankic Highlights",
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight Hover background color 1",
			"param_name" 	=> "highlight_hover_background_color_1",
			"value" 		=> "",
			"group" 		=> "Brankic Highlights",
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight Hover background color 2",
			"param_name" 	=> "highlight_hover_background_color_2",
			"value" 		=> "",
			"group" 		=> "Brankic Highlights",
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Gradient color 1",
			"param_name" 	=> "gradient_text_color_1",
			"value" 		=> "",
			"group" 		=> "Brankic Highlights",
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Gradient color 2",
			"param_name" 	=> "gradient_text_color_2",
			"value" 		=> "",
			"group" 		=> "Brankic Highlights",
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Unique ID suffix',
			'param_name'	=> 'unique'
		),
		

	);
     
    vc_add_params( 'vc_column_text', $vc_column_text_new_params );
	

    // Add Params
    $vc_gallery_new_params = array(
         
		array(
			'type' => 'dropdown',
			'heading' => 'Gallery type',
			'param_name' => 'type',
			'value' => array(
				'Flex slider fade' => 'flexslider_fade',
				'Flex slider slide' => 'flexslider_slide',
				'Nivo slider' => 'nivo',
				'Swiper Fullheight Vertical' => 'swiper_vertical',
				'Swiper Horizontal' => 'swiper_horizontal',
				'Image grid' => 'image_grid',
				'Brankic gallery' => 'brankic_gallery',
			),
			'description' => 'Select gallery type.',
			'weight' => 3,
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> 'Brankic gallery layout',
			'param_name' 	=> 'brankic_gallery_layout',
			'std'			=> 'grid',
			'value' 		=> array(
						"Grid"			=> "grid",
						"Grid Advanced / Grider" => "grid_advanced",
						"Masonry" 		=> "masonry"
			),
			'description' 	=> '',
			'dependency' 	=> array(
				'element' => 'type',
				'value'   => array('brankic_gallery'),
			),
			'weight' 		=> '3',
		),
		array(
			"type" => "dropdown",
			"heading" => "Image sizes",
			"description" => "Override Image Size setting",
			"param_name" => "grid_img_size",
			"std" => "square",
			"value" => array(
				"Square" => "square",
				"Portait" => "portrait",
				"Landscape" => "landscape",
			),
			'dependency' => array(
				'element' => 'brankic_gallery_layout',
				'value'   => array("grid"),
			),
        ),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> 'Show meta',
			'param_name' 	=> 'brankic_gallery_show_meta',
			'std'			=> '',
			'value' 		=> array(
						"No" 									=> "",
						"Show Caption Title and Description" 	=> "all",
						"Show all on hover" 						=> "on_hover",
						"Show only title" 						=> "title"
			),
			'description' 	=> '',
			'dependency' 	=> array(
				'element' => 'type',
				'value'   => array('brankic_gallery'),
			),
			'weight' 		=> '3',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Meta color",
			"param_name" => "meta_color",
			"value" => "",
			'dependency' 	=> array(
				'element' => 'type',
				'value'   => array('brankic_gallery'),
			),
			'weight' 		=> '3',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Meta hover color",
			"param_name" => "meta_hover_color",
			"value" => "",
			'dependency' 	=> array(
				'element' => 'type',
				'value'   => array('brankic_gallery'),
			),
			'weight' 		=> '3',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Meta background color",
			"param_name" => "meta_background_color",
			"value" => "",
			'dependency' 	=> array(
				'element' => 'type',
				'value'   => array('brankic_gallery'),
			),
			'weight' 		=> '3',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Meta position',
			'param_name' => 'meta_position',
			'std' => 'center middle',
			'value' => array(
				'Top Left' => 'top left',
				'Top Center' => 'top center',
				'Top Right' => 'top right',
				'Bottom Left' => 'bottom left',
				'Bottom Center' => 'bottom center',
				'Bottom Right' => 'bottom right',
				'Middle Left ' => 'left middle',
				'Middle Center' => 'center middle',
				'Middle Right' => 'right middle',
				'Stretch Left ' => 'left stretch',
				'Stretch Center' => 'center stretch',
				'Stretch Right' => 'right stretch',
			),
			'dependency' => array(
				'element' => 'type',
				'value'   => array('brankic_gallery'), 
			),
			'weight' 		=> '3',

		),
		array(
			"type" => "dropdown",
			"heading" => "Columns",
			"param_name" => "columns",
			"std" => "3",
			"value" => array(
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
			),
			'dependency' => array(
				'element' => 'type',
				'value'   => array("brankic_gallery"),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Image radius size",
			"param_name" => "img_radius_size",
			"std" => "",
			"value" => array(
				"None" => "",
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
				"15px" => "15px",
			),
			'dependency' => array(
				'element' => 'type',
				'value'   => array("brankic_gallery"),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Gap",
			"param_name" => "gap",
			"std" => "",
			"value" => array(
				"None" => "",
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
				"75px" => "75px",
			),
			'dependency' => array(
				'element' => 'type',
				'value'   => array("brankic_gallery"),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
			'dependency' => array(
				'element' => 'type',
				'value'   => array("brankic_gallery"),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Custom cursor on hover",
			"value" => array("" => "true"),
			"param_name" => "custom_cursor",
			'dependency' => array(
				'element' => 'mouse_grab',
				'value' => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"std" => "View",
			"heading" => "Custom cursor text",
			"value" => array("" => "true"),
			"param_name" => "custom_cursor_text",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value' => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Custom cursor text color",
			"param_name" => "custom_cursor_color",
			"value" => "#ffcc99",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Custom cursor background color",
			"param_name" => "custom_cursor_bg",
			"value" => "#403a3e",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Height for Grider",
			"param_name" => "height",
			"std" => "40",
			"value" => array(
				"Auto" => "",
				"20" => "20",
				"30" => "30",
				"40" => "40",
				"50" => "50",
				"60" => "60",
				"70" => "70",
				"80" => "80",
				"90" => "90",
			),
			'dependency' => array(
				'element' => 'brankic_gallery_layout',
				'value'   => array("grid_advanced"),
			),
        ),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Article width and height',
			'description'   => 'w1 h1, w2 h2, w2 h1 w1 h2, w3 h2, w1 h3',
			'param_name'	=> 'custom_article_width_height',
			'dependency' => array(
				'element' => 'brankic_gallery_layout',
				'value'   => array('grid_advanced'),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Swiper height',
			'param_name' => 'swiper_height',
			'value' => array(
				'100%' => 'height-100',
				'80%' => 'height-80',
				'60%' => 'height-60',
				'40%' => 'height-40',
				'20%' => 'height-20',
			),
			'description' => 'Select slider height',
			'dependency' => array(
				'element' => 'type',
				'value'   => array('swiper_horizontal'),
			),
			'weight' => '3',
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Swiper slide width',
			'param_name' => 'swiper_slide_width',
			'value' => array(
				'100%' => 'width:100%',
				'80%' => 'width:80%',
				'60%' => 'width:60%',
			),
			'description' => 'Select slider height',
			'dependency' => array(
				'element' => 'type',
				'value'   => array('swiper_horizontal'),
			),
			'weight' => '3',
		),
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
	
     
    );
    vc_remove_param( "vc_gallery", "type" ); 
    
	vc_add_params( 'vc_gallery', $vc_gallery_new_params ); 

    

function brankic_get_posts($type = "post", $return = 'names') {
	
	$brankic_posts_names = array("Nothing" => "none");
	
	$temp_query = new WP_Query(array(
		'post_type' => $type,
		'post_status' => 'publish',
		'posts_per_page' => -1,
	));

	while ($temp_query->have_posts()) {
		$temp_query->the_post();
		$post_id = get_the_ID();
		$title = get_the_title();
		$brankic_posts_names[$title] = $post_id; 
	}

	wp_reset_query();
	
	if ($return == "names") return $brankic_posts_names;
}
 



if(!function_exists('brankic_get_categories'))  {
	function brankic_get_categories($taxonomy = "category", $return = 'names_count') {
		
		$brankic_categories_names = array();
		$brankic_categories_count = array();
		$brankic_categories_names_count = array();
		
		$options_portfolio_categories_obj = get_terms(array('taxonomy' => $taxonomy));
		
		foreach ($options_portfolio_categories_obj as $categori) {
			$brankic_categories_names[$categori->term_id] = $categori->name;
			$brankic_categories_count[$categori->term_id] = $categori->count;
			//$brankic_categories_names_count[$categori->name . " (" .$categori->count . ")"] = $categori->term_id;
			$brankic_categories_names_count[$categori->name . " (" .$categori->count . ")"] = $categori->slug;
		}
		if ($return == "names") return $brankic_categories_names;
		if ($return == "names_count") return $brankic_categories_names_count;
	}
}

if(!function_exists('brankic_contact_form_7_templates'))  {
	function brankic_contact_form_7_templates($return_what = "cf_7_titles", $color = "", $border_color = ""){
		
		$args = array(
		 'posts_per_page' => -1,
		 'orderby' => 'title',
		 'order' => 'ASC',
		 'post_type' => 'wpcf7_contact_form',
		 'post_status' => 'publish'
		);
		$cf_7_templates = get_posts( $args );
		$cf_7_titles = array();
		$cf_7_shortcodes = array();
		
		if ( $cf_7_templates ) {
			
			$cf_7_return = array();

			
			foreach ( $cf_7_templates as $cf_7_template ) {
				setup_postdata( $cf_7_template );
				
				//$template_html_class = "";
				
				$template_id = $cf_7_template->ID;
				
				$template_title = $cf_7_template->post_title;
				if ($template_title == "Brankic Default Border") $template_html_class = 'html_class="form outlined"';
				if ($template_title == "Brankic Default") $template_html_class = 'html_class="form"';
				if ($template_title == "Brankic Table") $template_html_class = 'html_class="form table"';
				if ($template_title == "Brankic Minimal") $template_html_class = 'html_class="form minimal"';
				if ($template_title == "Brankic Creative") $template_html_class = 'html_class="form creative"';
				
				
						
				
				$template_shortcode = '[contact-form-7 html_id="brankic_contact_form_' . $template_id . '" title="' . $template_title . '" ' . $template_html_class . ']';
				
				$cf_7_titles[$template_title] = $template_id;
				$cf_7_shortcodes[$template_id] = $template_shortcode;
			}
			wp_reset_postdata();
		}
		if ($return_what == "cf_7_titles") return $cf_7_titles;
		if ($return_what == "cf_7_shortcodes") return $cf_7_shortcodes;
		
	}
}


$brankic_categories_names_count = brankic_get_categories("category", "names_count");
$brankic_portfolio_names_count = brankic_get_categories("portfolio_category", "names_count");
$brankic_testimonials_names_count = brankic_get_categories("testimonial_category", "names_count");

if( class_exists('WooCommerce') ) $brankic_woo_categories_names_count = brankic_get_categories("product_cat", "names_count");

$brankic_testimonials_names = brankic_get_posts("testimonial_item", "names");

update_option("brankic_testimonials_names_count", serialize($brankic_testimonials_names_count));





/*** Accordion Wrapper ***/
class WPBakeryShortCode_Brankic_Accordion_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Accordion Wrapper",
    "base" => "brankic_accordion_wrapper",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-arrows-expand-vertical1",
	"as_parent" => array('only' => 'brankic_accordion'),
	'js_view' => 'VcColumnView',
    "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Accordion style',
				'param_name'	=> 'style',
				'value'			=> array(
					'Minimal'   			=> 'accordion_1',
					'Boxed'   			=> 'accordion_2',
					'Boxed with Gap'   		=> 'accordion_3',
				)
			),
			array(
				"type" => "dropdown",
				"heading" => "Active section",
				"param_name" => "active_section",
				"value" => $integer_10_array,
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text color",
				"param_name" => "text_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Caption color",
				"param_name" => "caption_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Caption color",
				"param_name" => "active_caption_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background color",
				"param_name" => "bg_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background color 2 (for gradient)",
				"param_name" => "bg_color_2",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Background color",
				"param_name" => "active_bg_color",
				"value" => "",
				'dependency' => array(
					'element' => 'style',
					'value' => array('accordion_3'),
				),
			),			
			array(
				"type" => "colorpicker",
				"heading" => "Active Background color 2 (for gradient)",
				"param_name" => "active_bg_color_2",
				"value" => "",
				'dependency' => array(
					'element' => 'style',
					'value' => array('accordion_3'),
				),
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Radius",
				"param_name" 	=> "radius",
				"value" 		=> array("" => "true")
			),

		
    ),
	//'default_content' => '[brankic_accordion caption="' . sprintf( '%s %d', __( 'Section', 'myriadwp' ), 1 ) . '"][/brankic_accordion][brankic_accordion caption="' . sprintf( '%s %d', __( 'Section', 'myriadwp' ), 2 ) . '"][/brankic_accordion]',

) );

/*** Accordion ***/
class WPBakeryShortCode_Brankic_Accordion extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Accordion",
    "base" => "brankic_accordion",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon brankic-vc-extension-default-icon",
	"js_view" => 'VcColumnView',
    "allowed_container_element" => 'vc_row',
	"as_parent" => array('only' => 'brankic_image, vc_column_text,brankic_instafeed_20,brankic_instafeed_20,brankic_restaurant_menu_item'),
    "params" => array(
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Caption',
				'param_name'	=> 'caption',
				"admin_label" => true
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Caption wrapper tag',
				'param_name'	=> 'caption_wrapper',
				"admin_label"   => true,
				'std'			=> 'strong',
				'value'			=> array(
					'strong' 	=> 'strong',
					'span'		=> 'span',
					'p'			=> 'p',
					'h2'		=> 'h2',
					'h3'		=> 'h3',
					'h4'		=> 'h4',
					'h5'		=> 'h5',
					'h6'		=> 'h6',
					

				)
			),

    ),
) );

vc_map( array(
  'name' => "Background Video",
  'base' => 'brankic_bg_video',
  'content_element' => true,
  'class' => '',
  'icon' => 'brankic-vc-extension-icon brankic-vc-extension-default-icon',
  'params' => array(
		array(
			'type' => 'file_picker',
			'category' => 'Brankic',
			'class' => '',
			'heading' => "Attach Media",
			'param_name' => 'file_picker',
			'value' => '',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Video (URL from external source)',
			'param_name'	=> 'file_picker_extra',
			'std'			=> '',
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Poster image',
			'param_name'	=> 'poster',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Poster image  (URL from external source)',
			'param_name'	=> 'poster_extra',
			'group' 		=> 'Brankic Background Options',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background mask",
			"param_name" => "bg_color",
			"value" => "",
        ),
  ),
) );

/*** Blockquote ***/
vc_map( array(
    "name" => "Blockquote",
    "base" => "brankic_blockquote",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-elaboration-message-happy",
	"as_parent" => array('only' => 'vc_column_text'),
    "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Blockquote style',
				'param_name'	=> 'style',
				"admin_label" => true,
				'value'			=> array(
					'Default (left)'        => '',
					'Right'      			=> 'right',
					'Outdent left'        	=> 'outset left',
					'Outdent right'      	=> 'outset right',
					'Outdent (both sides)'	=> 'outset left_right'
				)
			),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "",
				"admin_label" => true
			),			
    )
) );

/*** Boxed Icon ***/
vc_map( array(
    "name" => "Box (with Icon)",
    "base" => "brankic_box",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-ecommerce-gift",
    "allowed_container_element" => 'vc_row',
    "params" => array(
	
		array(
				"type" => "colorpicker",
				"heading" => "Background color",
				"param_name" => "box_bg_color",
				"value" => "",
			),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient Background",
			"value" => array("" => "true"),
			"param_name" => "use_gradient_bg",
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "box_gradient_direction",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
		),			
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 2 color",
			"param_name" => "box_bg_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
        ),	
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 3 color",
			"param_name" => "box_bg_color_3",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 4 color",
			"param_name" => "box_bg_color_4",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
        ),
			array(
				"type" => "checkbox",
				"heading" => "Hover change",
				"value" => array("" => "true"),
				"param_name" => "hover",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Hover Background color",
				"param_name" => "box_hover_bg_color",
				"value" => "",
				"dependency" => array(
					"element" => "hover",
					"value"   => array("true"),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Hover Background color 2",
				"param_name" => "box_hover_bg_color_2",
				"value" => "",
				"dependency" => array(
					"element" => "hover",
					"value"   => array("true"),
				),
			),
			array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Hover Gradient direction (only if Hover Background color 2 is selected)",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "box_hover_bg_gradient_direction",
			'dependency' => array(
				'element' => 'hover',
				'value'   => array("true"),
			),
		),
			array(
				"type" => "checkbox",
				"heading" => "Skin zoom",
				"value" => array("" => "true"),
				"param_name" => "zoom",
			),
			array(
				"type" => "checkbox",
				"heading" => "Background Image Zoom",
				"value" => array("" => "true"),
				"param_name" => "bg_zoom",
			),
			
			
			array(
				'type'			=> 'attach_image',
				'heading'		=> 'Background image',
				'param_name'	=> 'bg_image',
				'admin_label'	=> true
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Background image (URL from external source)',
				'param_name'	=> 'bg_image_extra',
				'std'			=> '',
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Thumb sizes',
				'description' 	=> '',
				'param_name'	=> 'thumb_sizes',
				'std'			=> '4x3',
				'value'			=> array(
					'Original 1024'				=> 'originalx1024',
					'Original 512'				=> 'originalx512',
					'Squares'				=> '1x1',
					'Landscape 4x3'  		=> '4x3',
					'Portrait 3x4'			=> '3x4',
					'Landscape 4x3 smaller' => '4x3_s',
					'Portrait 3x4 smaller'	=> '3x4_s',
					'Landscape 2x1'			=> '2x1',
					'Portrait 1x2'			=> '1x2'
				),
				'dependency' => array(
					'element' => 'carousel_content',
					'value' => array('blog', 'portfolio')
				),
			),
			array(
                "type" => "dropdown",
                "heading" => "Horizontal align",
                "param_name" => "horizontal_align",
				"std"		=> "text-align-left",
                "value" => array(
                    "Left"      => "text-align-left",
                    "Center"    => "text-align-center",
					"Right" 	=> "text-align-right"
                ),
				'save_always' => true,
            ),
			array(
                "type" => "dropdown",
                "heading" => "Vertical align",
                "param_name" => "vertical_align",
				"std"		=> "vert-top",
                "value" => array(
                    "Top"       => "vert-top",
                    "Middle"    => "vert-middle",
					"Bottom" 	=> "vert-bottom"
                ),
				'save_always' => true,
            ),
			array(
                "type" => "dropdown",
                "heading" => "Box Border radius",
                "param_name" => "box_border_radius",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px"
                ),
				'save_always' => true,
            ),
			array(
                "type" => "dropdown",
                "heading" => "Box Border width",
                "param_name" => "box_border_width",
				"std"		=> "",
                "value" => array(
                    "0 px"      => "0px",
                    "1 px"      => "1px",
                    "2 px"      => "2px",
					"3 px"      => "3px",
                    "4 px"      => "4px",
					"5 px"      => "5px",
                    "6 px"      => "6px",
					"7 px"      => "7px",
                    "8 px"      => "8px",
					"9 px"      => "9px",
                    "10 px"     => "10px",

                ),
				'save_always' => true,
            ),
			array(
				"type" => "colorpicker",
				"heading" => "Box Border color",
				"param_name" => "box_border_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Hover Box Border color",
				"param_name" => "box_hover_border_color",
				"value" => "",
				"dependency" => array(
					"element" => "hover",
					"value"   => array("true"),
				),
			),

			array(
				"type" => "colorpicker",
				"heading" => "Box Shadow color",
				"param_name" => "box_shadow_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Hover Box Shadow color",
				"param_name" => "box_hover_shadow_color",
				"value" => "",
				"dependency" => array(
					"element" => "hover",
					"value"   => array("true"),
				),
			),

		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon library', 'js_composer' ),
			'value' => array(
				__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
				__( 'Open Iconic', 'js_composer' ) => 'openiconic',
				__( 'Typicons', 'js_composer' ) => 'typicons',
				__( 'Entypo', 'js_composer' ) => 'entypo',
				__( 'Linecons', 'js_composer' ) => 'linecons',
				__( 'Mono Social', 'js_composer' ) => 'monosocial',
				__( 'Material', 'js_composer' ) => 'material',
				__( 'Linea', 'js_composer' ) => 'linea',
			),
			'param_name' => 'type',
			'description' => __( 'Select icon library.', 'js_composer' ),
		),
		array(
			'type' 			=> 'iconpicker',
			'heading' 		=> __( 'Icon', 'js_composer' ),
			'param_name' 	=> 'icon_fontawesome',
			'admin_label' => true,
			'settings' 		=> array(
					'emptyIcon' 	=> false, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
					'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
			),
			'dependency' 	=> array(
					'element' 	=> 'type',
					'value' 	=> 'fontawesome',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_openiconic',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_typicons',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_entypo',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_linecons',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_monosocial',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'monosocial',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_material',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'material',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'material',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' 			=> 'iconpicker',
			'heading' 		=> __( 'Icon', 'js_composer' ),
			'param_name' 	=> 'icon_linea',
			'admin_label' => true,
			'settings' 		=> array(
					'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
					'type' => 'linea',
					'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
			),
			'dependency' 	=> array(
					'element' 	=> 'type',
					'value' 	=> 'linea',
			),
		),
        array(
			'type'			=> 'dropdown',
			'heading'		=> 'Icon size',
			'param_name'	=> 'icon_size',
			'std'			=> '3',
			'value'			=> array(
				'Small'       	=> '1',
				'Medium'      	=> '2',
				'Large'       	=> '3',
				'XL' 			=> '4',
				'XXL' 			=> '5',
			)
		),
		array(
			"type" => "colorpicker",
			"heading" => "Icon color",
			"param_name" => "icon_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Hover Icon color",
			"param_name" => "icon_color_hover",
			"value" => "",
			"dependency" => array(
				"element" => "hover",
				"value"   => array("true"),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Icon Border shape",
			"param_name" => "icon_border_shape",
			"std"		=> "",
			"value" => array(
				"None"   	=> "",
				"Circle"   	=> "circle",
				"Diamond"   => "diamond",
				"Rectangle" => "rectangle",
			),
			'save_always' => true,
		),
		array(
			"type" => "dropdown",
			"heading" => "Border width",
			"param_name" => "icon_border_width",
			"std"		=> "",
			"value" => array(
				"None"   => "",
				"1 px"   => "1px",
				"2 px"   => "2px",
				"3 px"   => "3px",
				"4 px"   => "4px",
				"5 px"   => "5px",
				"6 px"   => "6px",
				"7 px"   => "7px",
				"8 px"   => "8px",
				"9 px"   => "9px",
				"10 px"  => "10px"
			),
			'save_always' => true,
		),
		array(
			"type" => "colorpicker",
			"heading" => "Border color",
			"param_name" => "icon_border_color",
			"value" => "#000",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Hover Border color",
			"param_name" => "icon_border_color_hover",
			"value" => "",
			"dependency" => array(
				"element" => "hover",
				"value"   => array("true"),
			),
		),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Box border radius",
			"value" => array("" => "true"),
			"param_name" => "img_radius"
		),
		array(
			"type" => "dropdown",
			"heading" => "Radius size",
			"param_name" => "img_radius_size",
			"std" => "4px",
			"value" => array(
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
				"15px" => "15px",
			),
			'dependency' => array(
				'element' => 'img_radius',
				'value'   => array("true"),
			),
        ),
		
		array(
			"type" => "dropdown",
			"heading" => "Icon margin",
			"param_name" => "icon_shape_padding",
			"std"		=> "0 px",
			"value" => array(
				"0 px"   => "0",
				"10 px"   => "10",
				"20 px"   => "20",
				"30 px"   => "30",
				"40 px"   => "40",
				"50 px"   => "50",
				"60 px"   => "60",
				"70 px"   => "70",
				"80 px"   => "80",
				"90 px"   => "90",
				"100 px"  => "100"
			),
			'save_always' => true,
		),
		array(
			"type" => "colorpicker",
			"heading" => "Icon background color",
			"param_name" => "icon_bg_color",
			"value" => "#000",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Hover Icon background color",
			"param_name" => "icon_bg_color_hover",
			"value" => "",
			"dependency" => array(
				"element" => "hover",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Heading',
			'param_name'	=> 'heading',
			'admin_label' => true,
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Heading size',
			'param_name'	=> 'heading_size',
			'value'			=> array(
					'H1'      => 'h1',
					'H2'      => 'h2',
					'H3'      => 'h3',
					'H4'      => 'h4',
					'H5'      => 'h5',
					'H6'      => 'h6',
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Sub Heading',
			'param_name'	=> 'subheading',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Heading color",
			"param_name" => "heading_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Hover Heading color",
			"param_name" => "hover_heading_color",
			"value" => "",
			"dependency" => array(
				"element" => "hover",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'textarea_html',
			'heading'		=> 'Content',
			'param_name'	=> 'content',
		),
		array(
			"type" => "colorpicker",
			"heading" => "Content color",
			"param_name" => "content_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Hover Content color",
			"param_name" => "hover_content_color",
			"value" => "",
			"dependency" => array(
				"element" => "hover",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Icon and content layout',
			'param_name'	=> 'heading_and_text_style',
			"std" 			=> "column",
			'value'			=> array(
					'Column'      	=> 'i-column',
					'Row'      		=> 'i-row',
					'Heading icon'  => 'i-row heading-icon',
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Centered content",
			"param_name" => "content_centered",
			"value" => array("" => "true"),
		),
		array(
			"type" => "dropdown",
			"heading" => "Box height",
			"param_name" => "box_height",
			"std"		=> "",
			"value" => $height_array,
			'save_always' => true,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'URL',
			'param_name'	=> 'box_url',
		),
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
	
    )
) );

/*** BUTTON ***/
vc_map( array(
    "name" => "Button",
    "base" => "brankic_button",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-music-play-button",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Button shape',
			'param_name'	=> 'shape',
			'std'			=> '',
			'value'			=> array(
				'Rectangle'      => '',
				'Rounded'        => 'radius',
				'Circle Play'    => 'button-circle play',
				'Circle Arrow'   => 'button-circle arrow-link',
				
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Text on button',
			'param_name'	=> 'button_text',
			'std'			=> 'Discover more',
			"admin_label" => true,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'URL',
			'param_name'	=> 'url',
			'std'			=> '#',
		),
		array(
			"type" => "dropdown",
			"heading" => "Pretty Photo pop-up",
			"description" => "URL (image, or video, or website) will be shown in the pop-up window",
			"param_name" => "pretty_photo",
			"std"		=> "no",
			"value" => array(
					"No" => "no",
					"Yes" => "yes",
					),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Frame width',
			'param_name'	=> 'prettyphoto_w',
			'std'			=> '',
			"description" => "Only if URL is YouTube or Vimeo or MOV file",
			'dependency' => array(
				'element' => 'pretty_photo',
				'value'   => array('yes'),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Frame height',
			'param_name'	=> 'prettyphoto_h',
			'std'			=> '',
			"description" => "Only if URL is YouTube or Vimeo or MOV file",
			'dependency' => array(
				'element' => 'pretty_photo',
				'value'   => array('yes'),
			),
		),
		
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Button_size',
			'param_name'	=> 'size',
			'std'			=> 'medium',
			'value'			=> array(
				'Small'   => 'small',
				'Medium'  => 'medium',
				'Large'   => 'large',
				'XL'	  => 'xl',	
			)
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Half style",
			"value" => array("" => "true"),
			"param_name" => "half",
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Hover options',
			'param_name'	=> 'hover',
			'std'			=> 'normal',
			'value'			=> array(
				'Normal'          => 'normal',
				'None'      	  => '',
				'Left to Right'   => 'dir-ltr',
				'Right to Left'   => 'dir-rtl',
				'Top to Bottom'   => 'dir-ttb',
				'Bottom to Top'   => 'dir-btt'
			)
		),
		array(
			"type" => "colorpicker",
			"heading" => "Text color",
			"param_name" => "text_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Arrow color",
			"param_name" => "arrow_color",
			"value" => "",
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('button-circle play','button-circle arrow-link'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Text hover color",
			"param_name" => "text_hover_color",
			"value" => "",
			'dependency' => array(
				'element' => 'hover',
				'value'   => array('normal','dir-ltr','dir-rtl','dir-ttb','dir-btt'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Arrow hover color",
			"param_name" => "arrow_hover_color",
			"value" => "",
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('button-circle play','button-circle arrow-link'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color",
			"param_name" => "bg_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color 2",
			"param_name" => "bg_color_2",
			"value" => "",
		),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Transparent background on hover",
			"value" => array("" => "true"),
			"param_name" => "trans_bg",
			'dependency' => array(
				'element' => 'hover',
				'value'   => array('normal','dir-ltr','dir-rtl','dir-ttb','dir-btt'),
			),
		),
		
		array(
			"type" => "colorpicker",
			"heading" => "Background hover color",
			"param_name" => "bg_hover_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background hover color 2",
			"param_name" => "bg_hover_color_2",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Border color",
			"param_name" => "border_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Border color 2",
			"param_name" => "border_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('button-circle play','button-circle arrow-link','radius'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Border hover color",
			"param_name" => "border_hover_color",
			"value" => "",
			'dependency' => array(
				'element' => 'hover',
				'value'   => array('normal','dir-ltr','dir-rtl','dir-ttb','dir-btt'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Border hover color 2 (only for Rectangle)",
			"param_name" => "border_hover_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'hover',
				'value'   => array('normal','dir-ltr','dir-rtl','dir-ttb','dir-btt'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color",
			"param_name" => "shadow_color",
			"value" => ""
		),
		array(
			"type" => "colorpicker",
			"heading" => "Shadow hover color",
			"param_name" => "shadow_hover_color",
			"value" => ""
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Hover movement',
			'param_name'	=> 'hover_movement',
			'std'			=> '',
			'value'			=> array(
				'None'      => '',
				'Down'      => 'down',
				'Up'        => 'up',
				
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Unique ID suffix',
			'param_name'	=> 'unique'
		),
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
	
    )
) );

class WPBakeryShortCode_Brankic_Carousel extends WPBakeryShortCodesContainer {}
vc_map( array(
	'name'		=> 'Carousels',
	'base'		=> 'brankic_carousel',
	'category'	=> 'Brankic',
	'icon'		=> 'brankic-vc-extension-icon icon-software-layout-4columns',
	"is_container" => true,
	"js_view" => 'VcColumnView',
	"content_element" => true,
	'show_settings_on_create' => true,
	'as_parent' => array('only' => 'brankic_team_member,brankic_image,vc_column_text, brankic_instafeed_20, brankic_instafeed_20'),
	'params' => array(
 		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Carousel Content',
			'param_name'	=> 'carousel_content',
			"admin_label" => true,
			'value'			=> array(
				'Testimonials' => 'testimonials',
				'Team Members / Single Image / Text Block' => 'team_members',
				'Blog' => 'blog',
				'Portfolio' => 'portfolio',
				'WooCoomerce products' => 'woocommerce'
			)
		),
		array(
			"type" => "dropdown",
			"heading" => "Products to show",
			"param_name" => "woo_cat_slug",
			"value" => array_merge(array("All posts" => "0"), $brankic_woo_categories_names_count),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'woocommerce',
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Category to show",
			"param_name" => "blog_cat_slug",
			"value" => array_merge(array("All posts" => "0"), $brankic_categories_names_count),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'blog',
			),
        ),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Blog style',
			'param_name'	=> 'blog_style',
			'std'			=> 'related_posts',
			"admin_label" => true,
			'value'			=> array(
				'Related Posts' => 'related_posts',
				'Blog Style 5' => 'blog_style_5',
				'Blog Style 6' => 'blog_style_6',
			),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'blog',
			),
		),
		
		array(
			"type" => "dropdown",
			"heading" => "Hidden content (Title and Position) position",
			"param_name" => "fig_hid_position",
			'group' 		=> 'Title Options',
			"std" => "middle center",
			"value" => array(
				"Top Left"			=> "top left",
				"Top Center" 		=> "top center",
				"Top Right" 		=> "top right",
				"Middle Left" 		=> "middle left",
				"Middle Center" 	=> "middle center",
				"Middle Right" 		=> "middle right",
				"Bottom Left" 		=> "bottom left",
				"Bottom Middle" 	=> "bottom middle",
				"Bottom Right" 		=> "bottom right",
			),
			'dependency' => array(
				'element' => 'portfolio_style',
				'value'   => array('portfolio-caption-hidden-1','portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Hidden content (Title and Position) text alignment",
			"param_name" => "fig_hid_alignment",
			'group' 		=> 'Title Options',
			"std" => "text-center",
			"value" => array(
				"Left"			=> "text-left",
				"Center" 		=> "text-center",
				"Right" 		=> "text-right",
			),
			'dependency' => array(
				'element' => 'portfolio_style',
				'value'   => array('portfolio-caption-hidden-1','portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Titles color",
			"param_name" => "title_color",
			'group' 		=> 'Title Options',
			"value" => "#000000",
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Category /post meta color",
			"param_name" => "category_color",
			'group' 		=> 'Title Options',
			"value" => "#000000",
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Hovers color",
			"param_name" => "hover_color",
			'group' 		=> 'Title Options',
			"value" => "",
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Hovers 2 color",
			"param_name" => "hover_2_color",
			'group' 		=> 'Title Options',
			"value" => "",
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Border Hovers color",
			"param_name" => "border_hover_color",
			'group' 		=> 'Title Options',
			"value" => "",
			'dependency' => array(
					'element' => 'blog_style',
					'value'   => array('blog_style_5'),
			),
		),
		
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font family',
			'param_name'	=> 'title_font_family',
			'group' => 'Title Options',
			'std'			=> '',
			'value'			=> array(
					'None'         			 => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4',
					'Custom'  				 => 'custom'
			)
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Title font family',
			'param_name'	=> 'custom_title_font_family',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'dependency' => array(
				'element' => 'title_font_family',
				'value'   => 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font size',
			'param_name'	=> 'h_size',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
									"60px" => "60px",
									"50px" => "50px",
									"40px" => "40px",
									"30px" => "30px",
									"20px" => "20px",
									"15px" => "15px",
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Title font size',
			'param_name'	=> 'h_size_custom',
			'group' 		=> 'Title Options',
			'dependency' 	=> array(
					'element' 	=> 'h_size',
					'value' 	=> 'custom',
			),
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font weight',
			'param_name'	=> 'titles_weight',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font style',
			'param_name'	=> 'h_style',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
									"Normal" => "normal",
									"Italic" => "italic",
									"Oblique" => "oblique",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title text transform',
			'param_name'	=> 'h_transform',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
									"None" => "none",
									"Capitalize" => "capitalize",
									"Uppercase" => "uppercase",
									"Lowercase" => "lowercase",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title letter spacing',
			'param_name'	=> 'h_spacing',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
									"0px" => "0px",
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
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom letter spacing',
			'param_name'	=> 'h_spacing_custom',
			'group' 		=> 'Title Options',
			'dependency' 	=> array(
					'element' 	=> 'h_spacing',
					'value' 	=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title line height',
			'param_name'	=> 'h_height',
			'group' 		=> 'Title Options',
			'std'			=> '',
			"value" 		=> $font_height_array,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom line height',
			'param_name'	=> 'h_height_custom',
			'group' 		=> 'Title Options',
			'dependency' 	=> array(
					'element' 	=> 'h_height',
					'value' 	=> 'custom',
			),
			
		),
		
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color",
			"param_name" => "shadow_color",
			"value" => "rgba(0, 0, 0, .24)",
		),

		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Thumb sizes',
			'description' 	=> '',
			'param_name'	=> 'thumb_sizes',
			'std'			=> '4x3',
			'value'			=> array(
				'Original 1024'			=> 'originalx1024',
				'Original 512'			=> 'originalx512',
				'Squares'			=> '1x1',
				'Landscape 4x3'  	=> '4x3',
				'Portrait 3x4'		=> '3x4',
				'Landscape 4x3 smaller'  	=> '4x3_s',
				'Portrait 3x4 smaller'		=> '3x4_s',
				'Landscape 2x1'		=> '2x1',
				'Portrait 1x2'		=> '1x2'
			),
 			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('blog', 'portfolio', 'testimonials')
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Portfolio style',
			'param_name'	=> 'portfolio_style',
			'std'			=> 'portfolio-caption-hidden-1',
			"admin_label" => true,
			'value'			=> array(
				'Portfolio 2' => 'portfolio_2',
				'Portfolio Caption Hidden 1' => 'portfolio-caption-hidden-1',
				'Portfolio Caption Hidden 2' => 'portfolio-caption-hidden-2',
				'Portfolio Caption Hidden 3' => 'portfolio-caption-hidden-3',
				'Portfolio Caption Hidden 4' => 'portfolio-caption-hidden-4',
				'Portfolio Caption Hidden 5' => 'portfolio-caption-hidden-5',
				'Portfolio Caption Hidden 6' => 'portfolio-caption-hidden-6',
				'Portfolio Caption Hidden 8' => 'portfolio-caption-hidden-8',
				'Portfolio Hidden Caption Tooltip'	=> 'portfolio-tooltip',
			),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'portfolio',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('portfolio', 'blog'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		
		array(
			'type' => 'dropdown',
			'heading' => 'Captions position',
			'param_name' => 'captions_position',
			'group' 		=> 'Title Options',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Top Left' => 'top left',
				'Top Center' => 'top center',
				'Top Right' => 'top right',
				'Bottom Left' => 'bottom left',
				'Bottom Center' => 'bottom center',
				'Bottom Right' => 'bottom right',
				'Middle Left ' => 'left middle',
				'Middle Center' => 'center middle',
				'Middle Right' => 'right middle',
				'Stretch Left ' => 'left stretch',
				'Stretch Center' => 'center stretch',
				'Stretch Right' => 'right stretch',
			),
			'dependency' => array(
				'element' => 'blog_style',
				'value'   => array('blog_style_5'), 
			),
		),
				
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Image radius",
			"value" => array("" => "true"),
			"param_name" => "img_radius"
		),
		array(
			"type" => "dropdown",
			"heading" => "Radius size",
			"param_name" => "img_radius_size",
			"std" => "4px",
			"value" => array(
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
				"15px" => "15px",
			),
			'dependency' => array(
				'element' => 'img_radius',
				'value'   => array("true"),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Slide height",
			"param_name" => "flex_height",
			"std"		=> "height-55",
			"value" => $height_array,
			'save_always' => true,
			'dependency' => array(
				'element' => 'carousel_content',
				'value'   => array('portfolio', 'blog', 'woocommerce'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show author",
			"value" => array("" => "true"),
			"param_name" => "show_author",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'blog',
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show comments",
			"std" => "true",
			"value" => array("" => "true"),
			"param_name" => "show_comments",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'blog',
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show categories",
			"value" => array("" => "true"),
			"param_name" => "show_cats",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'blog',
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Show tags",
			"value" => array("" => "true"),
			"param_name" => "show_tags",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'blog',
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show date",
			"std" => "true",
			"value" => array("" => "true"),
			"param_name" => "show_date",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'blog',
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show excerpt",
			"std" => "",
			"value" => array("" => "true"),
			"param_name" => "show_excerpt",
			'dependency' => array(
				'element' => 'blog_style',
				'value' => 'blog_style_5',
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Post meta style",
			"param_name" => "post_meta_style",
			"std" => "",
			'group' 		=> 'Title Options',
			"value" => array(
				"None" 				=> "",
				"lowercase" 		=> "lowercase",
				"UPPERCASE" 		=> "uppercase",
				"Capitalize" 		=> "capitalize",
			),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('blog', 'portfolio'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Post Meta Small",
			"std" => "small",
			"value" => array("" => "small"),
			'group' 		=> 'Title Options',
			"param_name" => "post_meta_small",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('blog', 'portfolio'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Post Meta Bold",
			"std" => "bold",
			"value" => array("" => "bold"),
			'group' 		=> 'Title Options',
			"param_name" => "post_meta_bold",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('blog', 'portfolio'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Portfolio category to show",
			"param_name" => "portfolio_cat_slug",
			"value" => array_merge(array("All portfolio items" => "0"), $brankic_portfolio_names_count),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('portfolio')
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Slide height (Portfolio 2 only)",
			"param_name" => "slide_height",
			"value" => $height_array,
			"std"	=> "height-60",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('portfolio')
			),
        ),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Auto Height",
			"description"	=> 'Best if "1 slide per view" is selected',
			"param_name" 	=> "autoheight",
			"value" 		=> array("" => "true"),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('testimonials','blog','team_members')
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Slide radius',
			'param_name'	=> 'border_radius',
			'std'			=> '5px',
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('portfolio_2'),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Testimonial Category to show',
			'param_name' => 'testimonial_cat_slug',
			"value" => array_merge(array("All testimonials" => "0"), $brankic_testimonials_names_count),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
        ),
		array(
			'type' => 'dropdown',
			'heading' => 'Single Testimonial ',
			'param_name' => 'testimonial_post_id',
			'value' => $brankic_testimonials_names,
			'std'	=> '',
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
        ),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Testimonial type',
			'param_name'	=> 'testimonial_type',
			'std'			=> 'default',
			'value'			=> array(
				'Default' => 'default',
				'Solid' => 'solid',
				'Monochrome' => 'monochrome',
				'Duo' => 'duo',
			),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Avatar position (for Testimonials)',
			'param_name'	=> 'avatar_position_default',
			'std'			=> 'avatar-top',
			'value'			=> array(
				'Bottom Center' => 'avatar-bottom',
				'Top' => 'avatar-top',
				'Aside' => 'avatar-aside',
				'Bottom Left' => 'avatar-bottom left',
			),
			'dependency' => array(
				'element' => 'testimonial_type',
				'value' => 'default',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Avatar position (for Testimonials)',
			'param_name'	=> 'avatar_position_solid',
			'std'			=> 'avatar-top',
			'value'			=> array(
				'Bottom Center' => 'avatar-bottom',
				'Top' => 'avatar-top',
				'Aside' => 'avatar-aside',
				'Bottom Left' => 'avatar-bottom left',
			),
			'dependency' => array(
				'element' => 'testimonial_type',
				'value' => 'solid',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Avatar position (for Testimonials)',
			'param_name'	=> 'avatar_position_monochrome',
			'std'			=> 'avatar-top',
			'value'			=> array(
				'Bottom Center' => 'avatar-bottom',
				'Top' => 'avatar-top',
				'Aside' => 'avatar-aside',
			),
			'dependency' => array(
				'element' => 'testimonial_type',
				'value' => 'monochrome',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Content Position',
			'param_name'	=> 'content_position',
			'std'			=> 'center',
			'value'			=> array(
				'Top' 			=> 'top',
				'Center' 		=> 'center',
				'Bottom' 		=> 'end',
				'Stretch'	 	=> 'stretch',
			),
			'dependency' => array(
				'element' => 'carousel_content',
				'value'   => array('team_members', 'portfolio'), 
			),
		),		
		array(
			"type" => "colorpicker",
			"heading" => "Text color testimonial",
			"param_name" => "text_color_testimonial",
			"value" => "",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('testimonials'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Text font size',
			'param_name'	=> 'text_size',
			'std'			=> '',
			'value'			=> array("---" => "",
									"30px" => "30px",
									"26px" => "26px",
									"22px" => "22px",
									"18px" => "18px",
									"14px" => "14px",
									"10px" => "10px",
									"Inherit" => "inherit",
									"Custom" => "custom"),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('testimonials'),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Text font size',
			'param_name'	=> 'text_size_custom',
			'dependency' 	=> array(
					'element' 	=> 'text_size',
					'value' 	=> 'custom',
			),
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Text font weight',
			'param_name'	=> 'text_weight',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit"),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('testimonials'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Text line height',
			'param_name'	=> 'text_height',
			'std'			=> '',
			"value" 		=> $font_height_array,
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('testimonials'),
			),
		),
			
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Text Custom line height',
			'param_name'	=> 'text_height_custom',
			'dependency' 	=> array(
					'element' 	=> 'text_height',
					'value' 	=> 'custom',
			),			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Text Class',
			'param_name'	=> 'text_class',
			'std'			=> '',
			'value'			=> array(
					'None'         			 => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4',
			),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('testimonials'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Text color Name / Occupation",
			"param_name" => "text_color_name_occupation",
			"value" => "",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color testimonial",
			"param_name" => "bg_color_testimonial",
			"value" => "",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color 2 testimonial",
			"param_name" => "bg_color_2_testimonial",
			"value" => "",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color Name / Occupation",
			"param_name" => "bg_name_occupation",
			"value" => "",
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Background Pattern',
			'param_name'	=> 'bg_pattern',
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Background Pattern (URL from external source)',
			'param_name'	=> 'bg_pattern_extra',
			'std'			=> '',
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => 'testimonials',
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Active slide different colors",
			"value" => array("" => "true"),
			"param_name" => "use_active_slide_diff_colors",
			'dependency' => array(
				'element' => 'carousel_content',
				'value'   => array('testimonials'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Active text color",
			"param_name" => "active_text_color_testimonial",
			"value" => "",
			'dependency' => array(
				'element' => 'use_active_slide_diff_colors',
				'value' => 'true',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Active background color",
			"param_name" => "active_background_color_testimonial",
			"value" => "",
			'dependency' => array(
				'element' => 'use_active_slide_diff_colors',
				'value' => 'true',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Active background color 2",
			"param_name" => "active_background_color_2_testimonial",
			"value" => "",
			'dependency' => array(
				'element' => 'use_active_slide_diff_colors',
				'value' => 'true',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Active background color 3",
			"param_name" => "active_background_color_3_testimonial",
			"value" => "",
			'dependency' => array(
				'element' => 'use_active_slide_diff_colors',
				'value' => 'true',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Text color Name / Occupation (Active slide)",
			"param_name" => "active_text_color_name_occupation",
			"value" => "",
			'dependency' => array(
				'element' => 'use_active_slide_diff_colors',
				'value' => 'true',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color Name / Occupation (Active slide)",
			"param_name" => "active_bg_name_occupation",
			"value" => "",
			'dependency' => array(
				'element' => 'use_active_slide_diff_colors',
				'value' => 'true',
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "active_bg_gradient_direction",
			'dependency' => array(
				'element' => 'use_active_slide_diff_colors',
				'value'   => array("true"),
			),
		),
		
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color of active slide",
			"param_name" => "shadow_color_active",
			'description' 	=> 'Only for Testimonials',
			'dependency' => array(
				'element' => 'use_active_slide_diff_colors',
				'value' => 'true',
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Limit',
			'param_name'	=> 'limit',
			'std'			=> '-1',
			"admin_label" => true,
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('blog', 'portfolio', 'testimonials', 'woocommerce'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Number of slides',
			'param_name'	=> 'slides_per_view',
			'std'			=> '3',
			'value'			=> array(
				'Auto'  => 'auto',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
			)
		),
		array(
			"type" 			=> "dropdown",
			"heading" 		=> "Height (only for single image)",
			"param_name" 	=> "single_image_height",
			"value" => $height_array,
			'dependency' => array(
				'element' => 'slides_per_view',
				'value' => array('1'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Loop",
			"std" => "true",
			"value" => array("" => "true"),
			"param_name" => "loop"
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Centered",
			"param_name" 	=> "centered",
			"value" 		=> array("" => "true"),
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Emphasize Size of Active Slide",
			"param_name" 	=> "emphasize_size",
			"value" 		=> array("" => "true"),
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Emphasize Opacity of Active Slide",
			"param_name" 	=> "emphasize_opacity",
			"value" 		=> array("" => "true"),
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Spread image to slide width",
			"param_name" 	=> "spread_content",
			"value" 		=> array("" => "true"),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('team_members'),
			),
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Parallax",
			"param_name" 	=> "parallax",
			"value" 		=> array("" => "1"),
			'dependency' => array(
				'element' => 'carousel_content',
				'value' => array('team_members', 'blog', 'portfolio'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Parallax value',
			'param_name'	=> 'parallax_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			'dependency' => array(
				'element' => 'parallax',
				'value'   => array('1'),
			),
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Mouse Wheel Control",
			"param_name" 	=> "mouse_control",
			"value" 		=> array("" => "true"),
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Mouse Grab",
			"param_name" 	=> "mouse_grab",
			"value" 		=> array("" => "true"),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Custom cursor on hover",
			"value" => array("" => "true"),
			"param_name" => "custom_cursor",
			'dependency' => array(
				'element' => 'mouse_grab',
				'value' => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"std" => "Grab",
			"heading" => "Custom cursor text",
			"value" => array("" => "true"),
			"param_name" => "custom_cursor_text",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value' => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Custom cursor text color",
			"param_name" => "custom_cursor_color",
			"value" => "#ffcc99",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Custom cursor background color",
			"param_name" => "custom_cursor_bg",
			"value" => "#403a3e",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value'   => array('true'),
			),
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Auto Play",
			"param_name" 	=> "autoplay",
			"value" 		=> array("" => "true"),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Delay in ms',
			'param_name'	=> 'delay',
			'std'			=> '3000',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Speed in ms',
			'param_name'	=> 'speed',
			'std'			=> '1000',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Gap between slides',
			'description'	=> 'Only number',
			'param_name'	=> 'gap',
			'std'			=> '0',
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Fade effect (Only if <strong>1</strong> number of slides is selected)",
			"param_name" 	=> "fade",
			"value" 		=> array("" => "true"),
			'dependency' => array(
				'element' => 'slides_per_view',
				'value' => array('1'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Carousel Navigation',
			'param_name'	=> 'carousel_navigation',
			'std'			=> 'lines_below',
			'value'			=> array(
				'None'  => '',
				'Arrows Side'  => 'arrows_side',
				'Arrows Below' => 'arrows_below',
				'Lines Below' => 'lines_below',
				'Dots Below' => 'dots_below',
				'Lines Inside' => 'lines_inside',
				'Dots Inside' => 'dots_inside',
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Bottom navigation alignment',
			'param_name'	=> 'carousel_navigation_align',
			'std'			=> 'center',
			'value'			=> array(
				'Center' 	 	=> 'center',
				'Left'  		=> 'left',
				'Right'  		=> 'right',
			),
			'dependency' => array(
				'element' => 'carousel_navigation',
				'value' => array('arrows_below', 'lines_below', 'dots_below' ,'lines_inside', 'dots_inside'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Pagination type',
			'param_name'	=> 'pagination_type',
			'std'			=> 'byllets',
			'value'			=> array(
				'Fraction' 	 	=> 'fraction',
				'Bullets'  		=> 'bullets',
				'Progress bar'  => 'progressbar',
			),
			'dependency' => array(
				'element' => 'carousel_navigation',
				'value' => array('arrows_below'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Carousel Navigation Color',
			'param_name'	=> 'carousel_navigation_color',
			'std'			=> '',
			'value'			=> array(
				'Dark'  => '',
				'Light'  => 'light',
			)
		),		
    )
) );
								
vc_map( array(
	'name'		=> 'Category',
	'base'		=> 'brankic_category',
	'category'	=> 'Brankic',
	'icon'		=> 'brankic-vc-extension-icon icon-software-layers2',
	'allowed_container_element' => 'vc_row',
	'params' => array(
 		array(
			"type" => "dropdown",
			"heading" => "Category to show",
			"param_name" => "cat_slug",
			"value" => array_merge(array("All posts" => "0"), $brankic_categories_names_count, $brankic_portfolio_names_count),
			"admin_label" => true,
        ), 
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Layout',
			'param_name'	=> 'layout',
			'std'			=> 'blog-style-1',
			"admin_label" => true,
			'value'			=> array(
				'Flex (1-6 columns)'							=> 'flex',
				'Blog Style 1 (single column)'					=> 'blog-style-1',
				'Blog Style 2 (1-2 columns)'					=> 'blog-style-2',
				'Blog Style 2 (row)'							=> 'blog-style-2a',
				'Blog Style 3 (1-6 columns / Grid or Masonry)'	=> 'blog-style-3',
				'Blog Style 4 (1-6 columns)'					=> 'blog-style-4',
				'Blog Style 5 (1-6 columns)'					=> 'blog-style-5',
				'Blog Style 6 (1-6 columns)'					=> 'blog-style-6',
				'Blog Style 7 (1-2 columns)'					=> 'blog-style-7',
				'Blog Style 8 (1-6 columns)'					=> 'blog-style-8',
				'Blog Style 9 (1-6 columns)'					=> 'blog-style-9',
				'Blog Style 10 (1 column zig-zag)'				=> 'blog-style-10',
				'Brankic Posts Slider'							=> 'blog-carousel-emphasize',
				'Emphasize Sticky Slider'						=> 'portfolio-carousel-new',
				'Portfolio info default (1-6 columns)'			=> 'portfolio-info-default',
				'Portfolio Zig Zag'			        			=> 'portfolio-zig-zag',
				'Portfolio Overlay Image Fixed'    				=> 'portfolio-fixed-overlay',
				'Portfolio Overlay Image Fixed - Split Style'	=> 'portfolio-fixed-split-default',
				'Portfolio Tooltip Image'        				=> 'portfolio-fixed-split-outset',
				'Portfolio Carousel'        					=> 'portfolio-carousel',				
				'Portfolio Carousel Overlay'        			=> 'portfolio-carousel-overlay',
				'Portfolio Hidden Caption 1'					=> 'portfolio-caption-hidden-1',
				'Portfolio Hidden Caption 2'					=> 'portfolio-caption-hidden-2',
				'Portfolio Hidden Caption 3'					=> 'portfolio-caption-hidden-3',
				'Portfolio Hidden Caption 4'					=> 'portfolio-caption-hidden-4',
				'Portfolio Hidden Caption 5'					=> 'portfolio-caption-hidden-5',
				'Portfolio Hidden Caption 6'					=> 'portfolio-caption-hidden-6',
				'Portfolio Hidden Caption 7'					=> 'portfolio-caption-hidden-7',
				'Portfolio Hidden Caption 8'					=> 'portfolio-caption-hidden-8',
				'Portfolio Hidden Caption Tooltip'				=> 'portfolio-tooltip',
				'Portfolio Scuttered'							=> 'portfolio-scuttered',
			)
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Boxed",
			"value" => array("" => "true"),
			"param_name" => "boxed",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-2', 'blog-style-3', 'blog-style-8'),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Content vertical position',
			'param_name' => 'content_position',
			'std' => '',
			'value' => array(
				'Middle' => '',
				'Top' => 'top',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize'),
			),
		),
		
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Slide in effect',
			'param_name'	=> 'slide_in_effect',
			'std' 			=> 'slide-in-effect effect-btt',
			'value' => array(
				'None' => '',
				'Top to Bottom' => 'slide-in-effect effect-ttb',
				'Bottom to Top' => 'slide-in-effect effect-btt',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Content transition',
			'param_name'	=> 'effect',
			'std' 			=> 'fade',
			'value' => array(
				'Fade' => 'fade',
				'Slide' => 'slide',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize'),
			),
		),
		
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Read more text',
			'param_name'	=> 'read_more',
			'std' 			=> 'Read article',
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Image holder left",
			"value" => array("" => "true"),
			"param_name" => "image_holder_left",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-fixed-split-default'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Fixed Tooltip",
			"value" => array("" => "true"),
			"param_name" => "fixed_tooltip",
			'dependency' => array(
				'element' => 'layout',
				'value' => array('portfolio-fixed-split-outset'),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Tooltip position',
			'param_name' => 'tooltip_position',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Top Left' => 'top left',
				'Top Center' => 'top center',
				'Top Right' => 'top right',
				'Bottom Left' => 'bottom left',
				'Bottom Center' => 'bottom center',
				'Bottom Right' => 'bottom right',
				'Middle Left ' => 'left middle',
				'Middle Center' => 'center middle',
				'Middle Right' => 'right middle',
				'Stretch Left ' => 'left stretch',
				'Stretch Center' => 'center stretch',
				'Stretch Right' => 'right stretch',
			),
			'dependency' => array(
				'element' => 'fixed_tooltip',
				'value'   => array('true'), 
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Custom cursor on hover",
			"value" => array("" => "true"),
			"param_name" => "custom_cursor",
		),
		array(
			"type" => "textfield",
			"std" => "Read more",
			"heading" => "Custom cursor text",
			"value" => array("" => "true"),
			"param_name" => "custom_cursor_text",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value' => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Custom cursor text color",
			"param_name" => "custom_cursor_color",
			"value" => "#ffcc99",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Custom cursor background color",
			"param_name" => "custom_cursor_bg",
			"value" => "#403a3e",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Show filters (categories)",
			"description" => "You have to select portfolio category",
			"std" => "no",
			"value" => array(
						"No" => "no",
						"Yes" => "yes",
						"Yes style 2" => "yes_2",
						),
			"param_name" => "show_filters",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-info-default', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Emphasize first post",
			"value" => array("" => "true"),
			"param_name" => "emphasize_first_post",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-style-2a'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Emphasized Post Style",
			"std" => "style_3",
			"value" => array(
						"Default" => "style_3",
						"Split" => "style_1",
						"Minimal" => "style_2",
						),
			"param_name" => "emphasize_style",
			'dependency' => array(
				'element' => 'emphasize_first_post',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Emphasized Post Show Excerpt",
			"value" => array("" => "true"),
			"param_name" => "emphasize_show_excerpt",
			'dependency' => array(
				'element' => 'emphasize_first_post',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Style",
			"std" => "grid",
			"value" => array(
						"Flex" 			=> "flex",
						"Grid"			=> "grid",
						"Grid Advanced" => "grid_advanced",
						"Masonry" 		=> "masonry"),
			"param_name" => "style",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-3', 'blog-style-5', 'blog-style-6','portfolio-info-default', 'portfolio-caption-hidden-1','portfolio-caption-hidden-2','portfolio-caption-hidden-3','portfolio-caption-hidden-4','portfolio-caption-hidden-5',
				'portfolio-caption-hidden-6','portfolio-caption-hidden-7','portfolio-caption-hidden-8', 'portfolio-tooltip'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Thumb sizes',
			'param_name'	=> 'thumb_sizes',
			'std'			=> 'brankic-1024-768',
			'value'			=> array(
				'Full'					=> 'full',
				'Original 1024'			=> 'brankic-original-1024',
				'Original 512'			=> 'brankic-original-512',
				'Squares'				=> 'brankic-512-512',
				'Landscape 4x3'  		=> 'brankic-1024-768',
				'Portrait 3x4'			=> 'brankic-768-1024',
				'Landscape 4x3 smaller'	=> 'brankic-512-384',
				'Portrait 3x4 smaller'	=> 'brankic-384-512',
				'Landscape 2x1'			=> 'brankic-1024-512',
				'Portrait 1x2'			=> 'brankic-512-1024'
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1', 'blog-style-2','blog-style-2a', 'blog-style-3','blog-style-4', 'blog-style-5','blog-style-6','blog-style-7','blog-style-9', 'blog-style-10', 'blog-carousel-emphasize',
									'portfolio-info-default', 'portfolio-caption-hidden-1','portfolio-caption-hidden-2','portfolio-caption-hidden-3','portfolio-caption-hidden-4','portfolio-caption-hidden-5',
									'portfolio-caption-hidden-6','portfolio-caption-hidden-7','portfolio-caption-hidden-8', 'portfolio-tooltip', 'portfolio-carousel-overlay', 'portfolio-carousel',
									'portfolio-fixed-overlay'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Image height",
			"param_name" => "flex_height",
			"description" => "Only for portfolio styles and Blog 5, 6 & 8",
			"std"		=> "height-55",
			"value" => $height_array,
			'save_always' => true,
			'dependency' => array(
				'element' => 'style',
				'value'   => array('flex'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Image height",
			"param_name" => "image_height",
			"std"		=> "height-100",
			"value" => $height_array,
			'save_always' => true,
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel', 'portfolio-carousel-overlay', 'portfolio-fixed-overlay', 'portfolio-fixed-split-default', 'portfolio-carousel-new', 'blog-carousel-emphasize'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Image radius",
			"value" => array("" => "true"),
			"param_name" => "img_radius",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-10', 'portfolio-carousel-new',
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-fixed-overlay', 'portfolio-fixed-split-outset', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-tooltip',
								'portfolio-fixed-split-default', 'portfolio-carousel', 'portfolio-carousel-overlay', 'portfolio-scuttered'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Radius size",
			"param_name" => "img_radius_size",
			"std" => "4px",
			"value" => array(
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
				"15px" => "15px",
				"50%" => "50%",
			),
			'dependency' => array(
				'element' => 'img_radius',
				'value'   => array("true"),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Background image color",
			"param_name" => "bg_img_color",
			"value" => "",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize', 'portfolio-carousel-new', 'portfolio-carousel-overlay', 'portfolio-fixed-overlay'),
			),
		),
				array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient Background",
			"value" => array("" => "true"),
			"param_name" => "use_gradient_bg",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize', 'portfolio-carousel-new', 'portfolio-carousel-overlay', 'portfolio-fixed-overlay'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "bg_gradient_direction",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
		),	
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 2 color",
			"param_name" => "bg_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
        ),	
		array(
			"type" => "colorpicker",
			"heading" => "Background gradient 3 color",
			"param_name" => "bg_color_3",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient_bg',
				'value'   => array("true"),
			),
        ),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Image zoom effect",
			"std" => "image_effect_zoom_out",
			"value" => array(
				"No zoom" => "",
				"Zoom Out" => "image_effect_zoom_out",
				"Zoom In" => "image_effect_zoom_in",
				"Rotate" => "image_effect_rotate",
			),
			"param_name" => "image_zoom_effect",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new', 'blog-carousel-emphasize', 'portfolio-fixed-overlay', 'portfolio-fixed-split-default', 'portfolio-carousel', 'portfolio-carousel-overlay','portfolio-tooltip', 'portfolio-info-default', 'portfolio-scuttered',
				'portfolio-caption-hidden-1','portfolio-caption-hidden-2','portfolio-caption-hidden-3','portfolio-caption-hidden-4','portfolio-caption-hidden-5','portfolio-caption-hidden-6','portfolio-caption-hidden-7','portfolio-caption-hidden-8'),
			),
		),
		array(
			"type" 		=> "colorpicker",
			"heading" 	=> "Content color",
			"param_name"=> "content_color",
			"value" 	=> "",
			'group' 	=> 'Title Options',
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Split screen",
			"std" => "",
			"value" => array("" => "true"),
			"param_name" => "split_screen",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Image position",
			"std" => "left",
			"value" => array(
				"Left" => "left",
				"Right" => "right",
			),
			"param_name" => "image_position",
			'dependency' => array(
				'element' => 'split_screen',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color",
			"param_name" => "split_color",
			"value" => "",
			'dependency' => array(
				'element' => 'split_screen',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show next article",
			"std" => "true",
			"value" => array("" => "true"),
			"param_name" => "show_next",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-carousel-emphasize'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Next article Title color",
			"param_name" => "only_next_title_color",
			"value" => "",
			'dependency' => array(
				'element' => 'show_next',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Next article Background color",
			"param_name" => "only_next_split_color",
			"value" => "",
			'dependency' => array(
				'element' => 'show_next',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Next article Duotone effect",
			"param_name" => "only_next_duotone",
			"std" => "",
			"value" => $duotone_array,
			'dependency' => array(
				'element' => 'show_next',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Next article Duotone custom color",
			"param_name" => "only_next_duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'only_next_duotone',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Next article Gradient",
			"value" => array("" => "true"),
			"param_name" => "only_next_duotone_gradient",
			'dependency' => array(
				'element' => 'only_next_duotone',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Next article Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "only_next_duotone_gradient_direction",
			'dependency' => array(
				'element' => 'only_next_duotone_gradient',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Next article Duotone custom color 2",
			"param_name" => "only_next_duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'only_next_duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Next article Duotone custom color 3",
			"param_name" => "only_next_duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'only_next_duotone_gradient',
				'value'   => array('true'),
			),
        ),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Background image fullwidth",
			"std" => "",
			"value" => array("" => "true"),
			"param_name" => "bg_img_fullwidth",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Navigation fullwidth",
			"std" => "",
			"value" => array("" => "true"),
			"param_name" => "nav_fullwidth",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Vertical direction",
			"std" => "",
			"value" => array("" => "true"),
			"param_name" => "sticky_vertical",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color",
			"param_name" => "shadow_color",
			"value" => "rgba(0, 0, 0, .24)",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-carousel-emphasize', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-fixed-overlay', 'portfolio-fixed-split-outset', 'portfolio-fixed-split-default', 'portfolio-carousel-new',
								'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-scuttered', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-tooltip'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Columns",
			"param_name" => "columns",
			"std" => "3",
			"value" => array(
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6"
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-tooltip'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Columns on tablet",
			"param_name" => "columns_tablet",
			"std" => "inherit",
			"value" => array(
				"Inherit" => "inherit",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6"
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-tooltip'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Columns on phone",
			"param_name" => "columns_phone",
			"std" => "inherit",
			"value" => array(
				"Inherit" => "inherit",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6"
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-tooltip'),
			),
        ),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Number of slides',
			'param_name'	=> 'slides_per_view',
			'std'			=> '3',
			'value'			=> array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel', 'portfolio-carousel-overlay'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Gap (Grid Advanced)',
			'param_name'	=> 'gap_advanced',
			'std'			=> '10px',
			'value'			=> array(
				'No gap'		=> '',
				'2 px'			=> '2px',
				'4 px'			=> '4px',
				'6 px'			=> '6px',
				'8 px'			=> '8px',
				'10 px'			=> '10px',
				'15 px'			=> '15px',
				'20 px'			=> '20px',
				'25 px'			=> '25px',
				'30 px'			=> '30px',
				'35 px'			=> '35px',
				'40 px'			=> '40px',
				'45 px'			=> '45px',
				'50 px'			=> '50px',
				'55 px'			=> '55px',
				'60 px'			=> '60px',
				'65 px'			=> '65px',
				'70 px'			=> '70px',
				'75 px'			=> '75px',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'portfolio-info-default', 
									'portfolio-caption-hidden-1','portfolio-caption-hidden-2','portfolio-caption-hidden-3','portfolio-caption-hidden-4','portfolio-caption-hidden-5','portfolio-caption-hidden-6',
									'portfolio-caption-hidden-7','portfolio-caption-hidden-8', 'portfolio-tooltip'),
			),
		),
		
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Image height',
			'param_name'	=> 'blog_2_image_height',
			'std'			=> 'height-35',
			"value" => $height_array,
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-2', 'blog-style-3'),
			),
		),
		
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Row height for Grid Advanced',
			'param_name'	=> 'grid_advanced_row_height',
			'std'			=> '30',
			'value'			=> array(
				'Auto'		    => '',
				'20%'			=> '20',
				'30%'			=> '30',
				'40%'			=> '40',
				'50%'			=> '50',
				'60%'			=> '60',
				'70%'			=> '70',
				'80%'			=> '80',
				'90%'			=> '90',
			),
			'dependency' => array(
				'element' => 'style',
				'value'   => array('grid_advanced'),
			),
		),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show author",
			"value" => array("" => "true"),
			"param_name" => "show_author",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-style-2a', 'blog-carousel-emphasize', 'portfolio-carousel-new'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show comments",
			"std" => "true",
			"value" => array("" => "true"),
			"param_name" => "show_comments",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-style-2a', 'blog-carousel-emphasize', 'portfolio-carousel-new'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show categories",
			"value" => array("" => "true"),
			"param_name" => "show_cats",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-carousel-emphasize', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-carousel', 'portfolio-carousel-overlay', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 
								'portfolio-fixed-split-default', 'portfolio-tooltip', 'portfolio-fixed-split-outset', 'portfolio-fixed-overlay', 'portfolio-carousel-new', 'portfolio-scuttered'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Show tags",
			"value" => array("" => "true"),
			"param_name" => "show_tags",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-style-2a', 'blog-carousel-emphasize', 'portfolio-carousel-new'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show date",
			"std" => "true",
			"value" => array("" => "true"),
			"param_name" => "show_date",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-style-2a', 'blog-carousel-emphasize', 'portfolio-carousel-new'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Show excerpt",
			"std" => "true",
			"value" => array("" => "true"),
			"param_name" => "show_excerpt",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-carousel-emphasize'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Post meta style",
			"param_name" => "post_meta_style",
			"std" => "",
			'group' 		=> 'Title Options',
			"value" => array(
				"None" 					=> "",
				"lowercase" 		=> "lowercase",
				"UPPERCASE" 		=> "uppercase",
				"Capitalize" 		=> "capitalize",
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-carousel', 'portfolio-carousel-overlay', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 
								'portfolio-tooltip', 'portfolio-fixed-split-default', 'portfolio-fixed-split-outset', 'portfolio-fixed-overlay'),
			),
        ),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Post meta small",
			"std" => "small",
			'group' 		=> 'Title Options',
			"value" => array("" => "small"),
			"param_name" => "post_meta_small",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-carousel', 'portfolio-carousel-overlay', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 
								'portfolio-tooltip', 'portfolio-fixed-split-default', 'portfolio-fixed-split-outset', 'portfolio-fixed-overlay'),
			),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Post meta bold",
			"std" => "",
			"value" => array("" => "bold"),
			"param_name" => "post_meta_bold",
			'group' 		=> 'Title Options',
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-carousel', 'portfolio-carousel-overlay', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 
								'portfolio-tooltip', 'portfolio-fixed-split-default', 'portfolio-fixed-split-outset', 'portfolio-fixed-overlay'),
			),
		),
		
		array(
			"type" => "dropdown",
			"heading" => "Navigation (below posts)",
			"param_name" => "navigation",
			"std" => "numeric_pagination",
			"value" => array(
				"Older / Newer" 						=> "old_new_simple",
				"Numeric Navigation" 					=> "numeric_pagination",
				"None" 									=> "none"
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-6', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 
								'portfolio-info-default', 'portfolio-zig-zag', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-tooltip'),
			),
        ),
		array(
			'type' => 'dropdown',
			'heading' => 'Captions position',
			'param_name' => 'captions_position',
			'group' 		=> 'Title Options',
			'std' => '',
			'value' => array(
				'Default' => '',
				'Top Left' => 'top left',
				'Top Center' => 'top center',
				'Top Right' => 'top right',
				'Bottom Left' => 'bottom left',
				'Bottom Center' => 'bottom center',
				'Bottom Right' => 'bottom right',
				'Middle Left' => 'left middle',
				'Middle Center' => 'center middle',
				'Middle Right' => 'right middle',
				'Stretch Left' => 'left stretch',
				'Stretch Center' => 'center stretch',
				'Stretch Right' => 'right stretch',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-fixed-overlay', 'blog-style-5'), 
			),

		),
		
		array(
			'type' => 'dropdown',
			'heading' => 'Captions alignment',
			'param_name' => 'captions_align',
			'group' 		=> 'Title Options',
			'std' => '',
			'value' => array(
				'Left' 		=> '',
				'Center' 	=> 'text-align-center',
				'Right' 	=> 'text-align-right',
				'Justify' 	=> 'text-align-justify',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-fixed-split-outset'), 
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Captions alignment',
			'param_name' => 'captions_align_new',
			'group' 		=> 'Title Options',
			'std' => 'text-align-center',
			'value' => array(
				'Left' 		=> 'text-align-left',
				'Center' 	=> 'text-align-center',
				'Right' 	=> 'text-align-right',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new'), 
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => 'Captions layout',
			'param_name' => 'captions_layout',
			'group' 		=> 'Title Options',
			'std' => '',
			'value' => array(
				'Inline' => '',
				'List' => 'list',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-fixed-split-outset'), 
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Active title color",
			"param_name" => "active_title_color",
			'group' 		=> 'Title Options',
			"value" => "",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Active meta color",
			"param_name" => "active_meta_color",
			'group' 		=> 'Title Options',
			"value" => "",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Title stroke effect",
			"std" => "true",
			"value" => array("" => "true"),
			"param_name" => "title_stroke",
			'group' 	 => 'Title Options',
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new', 'blog-carousel-emphasize'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Titles color",
			"param_name" => "title_color",
			'group' => 'Title Options',
			"value" => "",
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Category color",
			"param_name" => "category_color",
			'group' 		=> 'Title Options',
			"value" => "#000000",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-zig-zag', 'portfolio-info-default', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-scuttered', 
									'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-carousel-overlay' , 'portfolio-carousel', 'portfolio-tooltip', 'portfolio-fixed-split-outset'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Hovers color",
			"param_name" => "hover_color",
			'group' 		=> 'Title Options',
			"value" => "",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('flex', 'blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'portfolio-carousel-new', 'portfolio-scuttered',
								'portfolio-info-default', 'portfolio-fixed-split-default', 'portfolio-zig-zag', 'portfolio-fixed-split-outset', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 
								'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-tooltip', 'blog-carousel-emphasize'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Border Hovers color",
			"param_name" => "border_hover_color",
			'group' 		=> 'Title Options',
			"value" => "",
			'dependency' => array(
					'element' => 'layout',
					'value'   => array('blog-style-1', 'blog-style-2', 'blog-style-3', 'blog-style-4', 'blog-style-5', 'blog-style-7', 'blog-style-8', 'blog-style-9', 'blog-style-10', 'blog-style-2a'),
			),
		),
		
		array(
			"type" => "colorpicker",
			"heading" => "Hovers 2 color",
			"param_name" => "hover_2_color",
			'group' 		=> 'Title Options',
			"value" => "",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-tooltip', 'portfolio-caption-hidden-1', 'portfolio-caption-hidden-2', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-8'),
			),
        ),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font family',
			'param_name'	=> 'title_font_family',
			'group' => 'Title Options',
			'std'			=> '',
			'value'			=> array(
					'None'         			 => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4',
					'Custom'  				 => 'custom'
			)
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Title font family',
			'param_name'	=> 'custom_title_font_family',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'dependency' => array(
				'element' => 'title_font_family',
				'value'   => 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font size',
			'param_name'	=> 'h_size',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
									"60px" => "60px",
									"50px" => "50px",
									"40px" => "40px",
									"30px" => "30px",
									"20px" => "20px",
									"15px" => "15px",
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Title font size',
			'param_name'	=> 'h_size_custom',
			'group' 		=> 'Title Options',
			'dependency' 	=> array(
					'element' 	=> 'h_size',
					'value' 	=> 'custom',
			),
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font weight',
			'param_name'	=> 'titles_weight',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font style',
			'param_name'	=> 'h_style',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
									"Normal" => "normal",
									"Italic" => "italic",
									"Oblique" => "oblique",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title text transform',
			'param_name'	=> 'h_transform',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
									"None" => "none",
									"Capitalize" => "capitalize",
									"Uppercase" => "uppercase",
									"Lowercase" => "lowercase",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title letter spacing',
			'param_name'	=> 'h_spacing',
			'group' 		=> 'Title Options',
			'std'			=> '',
			'value'			=> array("---" => "",
									"0px" => "0px",
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
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom letter spacing',
			'param_name'	=> 'h_spacing_custom',
			'group' 		=> 'Title Options',
			'dependency' 	=> array(
					'element' 	=> 'h_spacing',
					'value' 	=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title line height',
			'param_name'	=> 'h_height',
			'group' 		=> 'Title Options',
			'std'			=> '',
			"value" 		=> $font_height_array,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom line height',
			'param_name'	=> 'h_height_custom',
			'group' 		=> 'Title Options',
			'dependency' 	=> array(
					'element' 	=> 'h_height',
					'value' 	=> 'custom',
			),
			
		),
		
		//video options

		
		array(
			"type" => "dropdown",
			"heading" => "Video behaviour",
			"description" => "If there are videos in portfolio posts",
			"param_name" => "portfolio_item_featured_video_play",
			'group' 		=> 'Video Settings',
			"std"		=> "autoplay",
			"value" => array(
					"No Poster Image - Auto Play" => "autoplay",
					"No Poster Image - Play on Hover" => "play_on_hover",
					"Poster Image - Play on Hover" => "play_on_hover_poster",
					),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel-new', 'portfolio-zig-zag', 'portfolio-info-default', 'portfolio-carousel', 'portfolio-scuttered',
								'portfolio-caption-hidden-1','portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 
								'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-tooltip'),
			),
		),
		
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1', 'blog-style-2', 'blog-style-2a', 'blog-style-3','blog-style-4','blog-style-5','blog-style-6', 'blog-style-10', 'portfolio-carousel-new', 'portfolio-carousel', 'blog-carousel-emphasize',
								'portfolio-fixed-overlay', 'portfolio-fixed-split-outset', 'portfolio-info-default', 'portfolio-tooltip', 'portfolio-carousel-overlay', 'portfolio-fixed-split-default', 
								'portfolio-caption-hidden-1','portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 
								'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8', 'portfolio-scuttered'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Title vertical position",
			"param_name" => "title_vertical_position",
			'group' 		=> 'Title Options',
			"std" => "bottom",
			"value" => array(
				"Top"		=> "top",
				"Middle" 	=> "middle",
				"Bottom" 	=> "bottom",
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel', 'portfolio-carousel-overlay'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Title horizontal position",
			"param_name" => "title_horizontal_position",
			'group' 		=> 'Title Options',
			"std" => "left",
			"value" => array(
				"Left"		=> "left",
				"Center" 	=> "center",
				"Right" 	=> "right",
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-carousel', 'portfolio-carousel-overlay'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Hidden content (Title and Position) position",
			"param_name" => "fig_hid_position",
			'group' 		=> 'Title Options',
			"std" => "middle center",
			"value" => array(
				"Top Left"			=> "top left",
				"Top Center" 		=> "top center",
				"Top Right" 		=> "top right",
				"Middle Left" 		=> "middle left",
				"Middle Center" 	=> "middle center",
				"Middle Right" 		=> "middle right",
				"Bottom Left" 		=> "bottom left",
				"Bottom Center" 	=> "bottom center",
				"Bottom Right" 		=> "bottom right",
				"Stretch Left" 		=> "stretch left",
				"Stretch Center" 	=> "stretch center",
				"Stretch Right" 	=> "stretch right",
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-caption-hidden-1','portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Hidden content (Title and Position) text alignment",
			"param_name" => "fig_hid_alignment",
			'group' 		=> 'Title Options',
			"std" => "text-center",
			"value" => array(
				"Left"			=> "text-left",
				"Center" 		=> "text-center",
				"Right" 		=> "text-right",
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-caption-hidden-1','portfolio-caption-hidden-2', 'portfolio-caption-hidden-3', 'portfolio-caption-hidden-4', 'portfolio-caption-hidden-5', 'portfolio-caption-hidden-6', 'portfolio-caption-hidden-7', 'portfolio-caption-hidden-8'),
			),
        ),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'How many posts per page',
			'description'   => '-1 for all. If empty, value from Reading Settings will be used',
			'std'			=> "-1",
			'param_name'	=> 'limit'
		),
		array(
			"type" => "dropdown",
			"heading" => "WOW Effect",
			"param_name" => "wow_effect",
			"value" => $wow_array,
        ),
		array(
			"type" => "dropdown",
			"heading" => "WOW effect delay",
			"param_name" => "wow_delay",
			"value" => array(
				"0.1s" 	=> "0.1s",
				"0.3s" 	=> "0.3s",
				"0.5s" 	=> "0.5s",
				"1s" 	=> "1s",
				"1.5s" 	=> "1.5s",
				"2s" 	=> "2s",
				"3s" 	=> "3s",
				"4s" 	=> "4s"
			),
			'dependency' => array(
				'element' => 'wow_effect',
				'value'   => $wow_array_without_none,
			),
        ),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Override thumb_sizes value with comma separated values 1x1, 2x2, 1x2, 2x1, 4x3, 3x4',
			'param_name'	=> 'custom_thumb_sizes',
			'dependency' => array(
				'element' => 'style',
				'value'   => array('masonry'),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Override column widths value with comma separated values',
			'description'   => 'e.g. 2,1,3,1,1,1,2',
			'param_name'	=> 'custom_column_widths',
			'dependency' => array(
				'element' => array('style'),
				'value'   => array('flex'),
			),
			
		),
		
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Article width and height',
			'description'   => 'w1 h1, w2 h2, w2 h1 w1 h2, w3 h2, w1 h3',
			'param_name'	=> 'custom_article_width_height',
			'dependency' => array(
				'element' => 'style',
				'value'   => array('grid_advanced'),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Override column heights with comma separated values',
			'param_name'	=> 'custom_column_heights',
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('grid-info-default'),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Override title colors with comma separated (css color) values',
			'param_name'	=> 'custom_title_colors'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Override category colors with comma separated (css color) values',
			'param_name'	=> 'custom_category_colors'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Override hover colors with comma separated (css color) values',
			'param_name'	=> 'custom_title_hovers'
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Captions position',
			'param_name'	=> 'portfolio_scuttered_caption_position',
			'std'			=> 'outset-style',
			'value'			=> array(
					'Below'      => 'below-style',
					'Inside'      => 'outset-style'
			),
			"group" => "Title Options",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('portfolio-scuttered'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Horizontal alignment',
			'param_name'	=> 'portfolio_scuttered_h_align',
			'std'			=> 'dense',
			'value'			=> array(
					'Dense'      => 'dense',
					'Justify'    => 'justify',
					'Center'     => 'center'
			),
			"group" => "Title Options",
			'dependency' => array(
				'element' => 'portfolio_scuttered_caption_position',
				'value'   => array('below-style'),
			),
		),
		
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Caption horizontal alignment',
			'param_name'	=> 'portfolio_scuttered_caption_h_align',
			'std'			=> 'left',
			'value'			=> array(
					'Left'      => 'left',
					'Right'      => 'right'
			),
			"group" => "Title Options",
			'dependency' => array(
				'element' => 'portfolio_scuttered_caption_position',
				'value'   => array('outset-style'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Caption vertical alignment',
			'param_name'	=> 'portfolio_scuttered_caption_v_align',
			'std'			=> 'bottom',
			'value'			=> array(
					'Bottom'      => 'bottom',
					'Middle'      => 'middle',
					'Top'      => 'top',
			),
			"group" => "Title Options",
			'dependency' => array(
				'element' => 'portfolio_scuttered_caption_position',
				'value'   => array('outset-style'),
			),
		),
		
		
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'layout',
				'value'   => array('blog-style-1','blog-style-2','blog-style-2a','blog-style-3','blog-style-4','blog-style-5','blog-style-6','blog-style-7','blog-style-8','blog-style-10', 'portfolio-zig-zag', 'blog-carousel-emphasize',
					'portfolio-caption-hidden-1','portfolio-caption-hidden-2','portfolio-caption-hidden-3','portfolio-caption-hidden-4','portfolio-caption-hidden-5','portfolio-caption-hidden-6','portfolio-caption-hidden-7','portfolio-caption-hidden-8',
					'flex', 'portfolio-carousel', 'portfolio-carousel-new', 'portfolio-carousel-overlay', 'portfolio-fixed-overlay', 'portfolio-fixed-split-default', 'portfolio-fixed-split-outset', 'portfolio-info-default', 'portfolio-scuttered'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
	)
));


/*** Collage Images ***/
vc_map( array(
    "name" => "Collage images",
    "base" => "brankic_collage",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-picture-multiple",
    "allowed_container_element" => 'vc_row',
    "params" => array(
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color",
			"param_name" => "shadow_color",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Outset",
			"param_name" => "outset",
			"std" => "",
			"value" => array(
						"default" => "",
						"10%" => "10",
						"20%" => "20",
						"30%" => "30",
						"40%" => "40",
						"50%" => "50",
						"60%" => "60",
						"70%" => "70",
						"80%" => "80",
						"90%" => "90"),			
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Image 1',
			'param_name'	=> 'image_1',
			'admin_label'	=> true
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Image 1 (URL from external source)',
			'param_name'	=> 'image_extra_1',
			'std'			=> '',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Thumb sizes',
			'description' 	=> '',
			'param_name'	=> 'thumb_sizes_1',
			'std'			=> 'brankic-1024-768',
			'value'			=> array(
				'Original 1024'				=> 'brankic-original-1024',
				'Original 512'				=> 'brankic-original-512',
				'Squares'				=> 'brankic-512-512',
				'Landscape 4x3'  		=> 'brankic-1024-768',
				'Portrait 3x4'			=> 'brankic-768-1024',
				'Landscape 4x3 smaller'	=> 'brankic-512-384',
				'Portrait 3x4 smaller'	=> 'brankic-384-512',
				'Landscape 2x1'			=> 'brankic-1024-512',
				'Portrait 1x2'			=> 'brankic-512-1024'
			),
		),
		array(
                "type" => "dropdown",
                "heading" => "Border radius",
                "param_name" => "border_radius_1",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px",
					"50 %"		=> "50%",
                ),
				'save_always' => true,
            ),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect 1",
			"param_name" => "duotone_1",
			"std" => "",
			"value" => $duotone_array,
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color for 1st image",
			"param_name" => "duotone_custom_1",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_1',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient 1",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient_1",
			'dependency' => array(
				'element' => 'duotone_1',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction 1",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction_1",
			'dependency' => array(
				'element' => 'duotone_gradient_1',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2 for 1st image",
			"param_name" => "duotone_custom_1_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient_1',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3 for 1st image",
			"param_name" => "duotone_custom_1_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient_1',
				'value'   => array('true'),
			),
        ),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Image 2',
			'param_name'	=> 'image_2',
			'admin_label'	=> true
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Image 2 (URL from external source)',
			'param_name'	=> 'image_extra_2',
			'std'			=> '',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Thumb sizes',
			'description' 	=> '',
			'param_name'	=> 'thumb_sizes_2',
			'std'			=> 'brankic-1024-768',
			'value'			=> array(
				'Original 1024'				=> 'brankic-original-1024',
				'Original 512'				=> 'brankic-original-512',
				'Squares'				=> 'brankic-512-512',
				'Landscape 4x3'  		=> 'brankic-1024-768',
				'Portrait 3x4'			=> 'brankic-768-1024',
				'Landscape 4x3 smaller'	=> 'brankic-512-384',
				'Portrait 3x4 smaller'	=> 'brankic-384-512',
				'Landscape 2x1'			=> 'brankic-1024-512',
				'Portrait 1x2'			=> 'brankic-512-1024'
			),
		),
		array(
                "type" => "dropdown",
                "heading" => "Border radius",
                "param_name" => "border_radius_2",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px",
					"50 %"		=> "50%",
                ),
				'save_always' => true,
            ),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect 2",
			"param_name" => "duotone_2",
			"std" => "",
			"value" => $duotone_array,
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color for 2nd image",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_2',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient 2",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient_2",
			'dependency' => array(
				'element' => 'duotone_2',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction 2",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction_2",
			'dependency' => array(
				'element' => 'duotone_gradient_2',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2 for 2nd image",
			"param_name" => "duotone_custom_2_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient_2',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3 for 2nd image",
			"param_name" => "duotone_custom_2_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient_2',
				'value'   => array('true'),
			),
        ),
		
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Image 3',
			'param_name'	=> 'image_3',
			'admin_label'	=> true
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Image 3 (URL from external source)',
			'param_name'	=> 'image_extra_3',
			'std'			=> '',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Thumb sizes',
			'description' 	=> '',
			'param_name'	=> 'thumb_sizes_3',
			'std'			=> 'brankic-1024-768',
			'value'			=> array(
				'Original 1024'				=> 'brankic-original-1024',
				'Original 512'				=> 'brankic-original-512',
				'Squares'				=> 'brankic-512-512',
				'Landscape 4x3'  		=> 'brankic-1024-768',
				'Portrait 3x4'			=> 'brankic-768-1024',
				'Landscape 4x3 smaller'	=> 'brankic-512-384',
				'Portrait 3x4 smaller'	=> 'brankic-384-512',
				'Landscape 2x1'			=> 'brankic-1024-512',
				'Portrait 1x2'			=> 'brankic-512-1024'
			),
		),
		array(
                "type" => "dropdown",
                "heading" => "Border radius",
                "param_name" => "border_radius_3",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px",
					"50 %"		=> "50%",
                ),
				'save_always' => true,
            ),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect 3",
			"param_name" => "duotone_3",
			"std" => "",
			"value" => $duotone_array,
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color for 3rd image",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_3',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient 3",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient_3",
			'dependency' => array(
				'element' => 'duotone_3',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction 3",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction_3",
			'dependency' => array(
				'element' => 'duotone_gradient_3',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2 for 3rd image",
			"param_name" => "duotone_custom_3_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient_3',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3 for 3rd image",
			"param_name" => "duotone_custom_3_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient_3',
				'value'   => array('true'),
			),
        ),


        
    )
) );

if (is_plugin_active("contact-form-7/wp-contact-form-7.php")){
	
	
	
	$cf_7_titles = brankic_contact_form_7_templates("cf_7_titles");
	//$cf_7_shortcodes = brankic_contact_form_7_templates("cf_7_shortcodes");
	
/*** Contact Form 7 templates by Brankic ***/
vc_map( array(
    "name" => "Contact Form 7 templates",
    "base" => "brankic_contact_form_7",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-mail-open-text",
    "allowed_container_element" => 'vc_row',
    "params" => array(
			array(
				"type" => "dropdown",
				"heading" => "Contact form to use",
				"param_name" => "cf_7_id",
				"value" => $cf_7_titles,
				"admin_label" => true,
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Font color",
				"param_name" 	=> "color",
				"value" 		=> "",
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Input background / border color",
				"param_name" 	=> "border_color",
				"value" 		=> "",
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Active input border color",
				"param_name" 	=> "active_input_border_color",
				'description' => __( 'Not applicable to table contact form layout', 'myriadwp' ),
				"value" 		=> "",
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Submit button size',
				'param_name'	=> 'submit_button_size',
				'std'			=> 'medium',
				'value'			=> array(
						'Small'    => 'small',
						'Medium' => 'medium',
						'Large' => 'large',
						'XL' => 'xl',
				)
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Submit button text color",
				"param_name" 	=> "submit_button_text_color",
				"value" 		=> "",
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Submit button hover text color",
				"param_name" 	=> "submit_button_hover_text_color",
				"value" 		=> "",
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Submit button background color",
				"param_name" 	=> "submit_button_bg_color",
				"value" 		=> "",
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Submit button hover background color",
				"param_name" 	=> "submit_button_hover_bg_color",
				"value" 		=> "",
			),
			
    ),
	
) );	
	
}


/*** Counter (with icons) ***/
vc_map( array(
    "name" => "Counter (with icon)",
    "base" => "brankic_counter",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-chronometer",
    "content_element" => true,
	"params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Direction',
				'param_name'	=> 'direction',
				'std'			=> "",
				'value'			=> array(
					'Row'    		=> '',
					'Column'    	=> 'column'
				)
			),
			array(
				"type" => "checkbox",
				"heading" => "Use Icon",
				"param_name" => "use_icon",
				"value" => array("" => "true")
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Icon library', 'js_composer' ),
				'value' => array(
					__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
					__( 'Open Iconic', 'js_composer' ) => 'openiconic',
					__( 'Typicons', 'js_composer' ) => 'typicons',
					__( 'Entypo', 'js_composer' ) => 'entypo',
					__( 'Linecons', 'js_composer' ) => 'linecons',
					__( 'Mono Social', 'js_composer' ) => 'monosocial',
					__( 'Material', 'js_composer' ) => 'material',
					__( 'Linea', 'js_composer' ) => 'linea',
				),
				'admin_label' => true,
				'param_name' => 'type',
				'description' => __( 'Select icon library.', 'js_composer' ),
				'dependency' 	=> array(
						'element' 	=> 'use_icon',
						'value' 	=> 'true',
				),
			),
			array(
				'type' 			=> 'iconpicker',
				'heading' 		=> __( 'Icon', 'js_composer' ),
				'param_name' 	=> 'icon_linea',
				'admin_label' => true,
				'settings' 		=> array(
						'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
						'type' => 'linea',
						'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
				),
				'dependency' 	=> array(
						'element' 	=> 'type',
						'value' 	=> 'linea',
				),
			),
			array(
				'type' 			=> 'iconpicker',
				'heading' 		=> __( 'Icon', 'js_composer' ),
				'param_name' 	=> 'icon_fontawesome',
				'admin_label' => true,
				'settings' 		=> array(
						'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
						'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
				),
				'dependency' 	=> array(
						'element' 	=> 'type',
						'value' 	=> 'fontawesome',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_openiconic',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'openiconic',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_typicons',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'typicons',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_entypo',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_linecons',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'linecons',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_monosocial',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'monosocial',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'monosocial',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_material',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'material',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'material',
				),
				'description' => __( 'Select icon from library.', 'js_composer' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Icon size',
				'param_name'	=> 'icon_size',
				'std'			=> 'medium',
				'value'			=> array(
					'Small'  => 'small',
					'Medium' => 'medium',
					'Large'  => 'large',
					'XL'   	 => 'xl'
				),
				'dependency' 	=> array(
						'element' 	=> 'use_icon',
						'value' 	=> 'true',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"value" => "#000",
				'dependency' 	=> array(
						'element' 	=> 'use_icon',
						'value' 	=> 'true',
				),
			),

			array(
				'type'			=> 'textfield',
				'heading'		=> 'Caption',
				'param_name'	=> 'caption',
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Caption Color",
				"param_name" => "caption_color",
				"value" => "#000",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Counter Color",
				"param_name" => "counter_color",
				"value" => "#000",
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Font weight',
				'param_name'	=> 'font_weight',
				'std'			=> '',
				'value'			=> array("---" => "",
											"Normal" => "normal",
											"9 0 0" => "900",
											"8 0 0" => "800",
											"7 0 0" => "700",
											"6 0 0" => "600",
											"5 0 0" => "500",
											"4 0 0" => "400",
											"3 0 0" => "300",
											"2 0 0" => "200",
											"1 0 0" => "100",
											"Inherit" => "inherit")
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Counter size',
				'param_name'	=> 'counter_size',
				'std'			=> 'medium',
				'value'			=> array(
					'Small'  => 'small',
					'Medium' => 'medium',
					'Large'  => 'large',
					'XL'   	 => 'xl'
				)
			),
			array(
				"type" => "checkbox",
				"heading" => "Stroke effect",
				"param_name" => "stroke",
				"value" => array("" => "true")
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Counter Font Family',
				'param_name'	=> 'counter_class',
				'value'			=> array(
						'---'      => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4',
				)
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'To (integer)',
				'param_name'	=> 'to'
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Speed (in miliseconds)',
				'param_name'	=> 'speed',
				'std'			=> "2500",
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Unique ID suffix',
				'param_name'	=> 'unique'
			),
        ),	
) );

/*** DIVIDER ***/
vc_map( array(
    "name" => "Divider",
    "base" => "brankic_divider",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-arrows-slim-right-dashed",
    "allowed_container_element" => 'vc_row',
    "params" => array(
	
		 
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Orientation',
			'param_name'	=> 'orientation',
			'value'			=> array(
						'Horizontal'   	=> 'horizontal',
						'Vertical'  	=> 'vertical'
			)
		),
		array(
			"type" => "dropdown",
			"heading" => "Height",
			"param_name" => "height",
			"std"		=> "height-10",
			"value" => $height_array,
			'dependency' => array(
				'element' => 'orientation',
				'value' => 'vertical',
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Thickness in pixels',
			'param_name'	=> 'border_width'
		),
	
        array(
			'type'			=> 'dropdown',
			'heading'		=> 'Divider width',
			'param_name'	=> 'width',
			'admin_label' 	=> true,
			'value'			=> array(
						'Content'     => '',
						'Fullwidth'  => 'fullwidth',
						'90%'    => 'width-90',
						'80%'    => 'width-80',
						'70%'    => 'width-70',
						'60%'    => 'width-60',
						'50%'    => 'width-50',
						'40%'    => 'width-40',
						'30%'    => 'width-30',
						'20%'    => 'width-20',
						'10%'    => 'width-10',
			),
			'dependency' => array(
				'element' => 'orientation',
				'value' => 'horizontal',
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Color of divider",
			"param_name" => "color",
			"value" => "",
        ),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Alignment',
			'param_name'	=> 'align',
			'std'			=> 'left',
			'value'			=> array(
						'Center'   	=> 'center',
						'Left'  	=> 'left',
						'Right'  	=> 'right'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Style',
			'param_name'	=> 'style',
			'admin_label' 	=> true,
			'std'			=> 'divider border',
			'value'			=> array(
						'Blank'   	=> 'divider blank',
						'Solid'   	=> 'divider border',
						'Dotted'  	=> 'divider border dotted',
						'Dashed'  	=> 'divider border dashed'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Margins',
			'param_name'	=> 'margin',
			'value'			=> array(
						'Default'   	=> '',
						'5px'   	=> '5px auto',
						'10px'  	=> '10px auto',
						'15px'   	=> '15px auto',
						'20px'  	=> '20px auto',
						'25px'   	=> '25px auto',
						'30px'  	=> '30px auto',
						'35px'   	=> '35px auto',
						'40px'  	=> '40px auto',
						'45px'   	=> '45px auto',
						'50px'  	=> '50px auto',
						'55px'  	=> '55px auto',
						'Custom'	=> 'custom'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom margins',
			'param_name'	=> 'custom_margin',
			'std'			=> '',
			'dependency' => array(
				'element' => 'margin',
				'value' => 'custom',
			),
		),
		array(
			'type'			=> 'textarea_html',
			'heading'		=> 'Divider Text',
			'param_name'	=> 'content',
			'admin_label' 	=> true,
		),
		array(
			"type" => "checkbox",
			"heading" => "Use Icon",
			"param_name" => "use_icon",
			"value" => array("" => "true"),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon library', 'js_composer' ),
			'value' => array(
				__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
				__( 'Open Iconic', 'js_composer' ) => 'openiconic',
				__( 'Typicons', 'js_composer' ) => 'typicons',
				__( 'Entypo', 'js_composer' ) => 'entypo',
				__( 'Linecons', 'js_composer' ) => 'linecons',
				__( 'Mono Social', 'js_composer' ) => 'monosocial',
				__( 'Material', 'js_composer' ) => 'material',
				__( 'Linea', 'js_composer' ) => 'linea',
			),
			'param_name' => 'type',
			'description' => __( 'Select icon library.', 'js_composer' ),
			"dependency" => array(
				"element" => "use_icon",
				"value"   => array("true"),
			),
		),
		array(
			'type' 			=> 'iconpicker',
			'heading' 		=> __( 'Icon', 'js_composer' ),
			'param_name' 	=> 'icon_linea',
			'settings' 		=> array(
					'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
					'type' => 'linea',
					'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
			),
			'dependency' 	=> array(
					'element' 	=> 'type',
					'value' 	=> 'linea',
			),
		),
		array(
			'type' 			=> 'iconpicker',
			'heading' 		=> __( 'Icon', 'js_composer' ),
			'param_name' 	=> 'icon_fontawesome',
			'settings' 		=> array(
					'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
					'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
			),
			'dependency' 	=> array(
					'element' 	=> 'type',
					'value' 	=> 'fontawesome',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_openiconic',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_typicons',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_entypo',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_linecons',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_monosocial',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'monosocial',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_material',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'material',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'material',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Icon / Text color",
			"param_name" => "icon_color",
			"value" => "",
        ),
        array(
			'type'			=> 'dropdown',
			'heading'		=> 'Icon size',
			'param_name'	=> 'icon_size',
			'value'			=> array(
				'Small'       => 'small',
				'Medium'      => 'medium',
				'Large'       => 'large',
				'Extra Large' => 'xl'
			),
			"dependency" => array(
				"element" => "use_icon",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Position of text / icon',
			'param_name'	=> 'text_icon_position',
			"std"			=> "divider-text-center",
			'value'			=> array(
						'Center'   	=> 'divider-text-center',
						'Left'  	=> 'divider-text-left',
						'Right'  	=> 'divider-text-right'
			),
		),
		
		
    ))
);

// FLIPBOX
vc_map( array(
        "name" => "Flip Box",
        "base" => "brankic_flipbox",
        "content_element" => true,
		"category" => 'Brankic',
		"icon" => "brankic-vc-extension-icon icon-basic-cards-hearts",
        "show_settings_on_create" => true,
        "params" => array(
            
			array(
				"type" => "colorpicker",
				"heading" => "Front Background color",
				"param_name" => "front_bg_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Front Background color 2",
				"param_name" => "front_bg_color_2",
				"value" => "",
			),
			
			array(
				"type" => "colorpicker",
				"heading" => "Back Background color",
				"param_name" => "back_bg_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Back Background color 2",
				"param_name" => "back_bg_color_2",
				"value" => "",
			),
			array(
				'type'			=> 'attach_image',
				'heading'		=> 'Front Background image',
				'param_name'	=> 'front_bg_image',
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Front Background image (URL from external source)',
				'param_name'	=> 'front_bg_image_extra',
				'std'			=> '',
			),

			array(
				"type" => "colorpicker",
				"heading" => "Front content color",
				"param_name" => "front_content_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Back content color",
				"param_name" => "back_content_color",
				"value" => "",
			),
			array(
				"type" => "textarea_html",
				"heading" => "Front Content",
				"param_name" => "content",
				"value" => ""
			),
			array(
				"type" => "textarea",
				"heading" => "Back Content",
				"param_name" => "back_content",
				"value" => ""
			),
			array(
                "type" => "dropdown",
                "heading" => "Horizontal align",
                "param_name" => "horizontal_align",
				"std"		=> "text-align-left",
                "value" => array(
                    "Left"      => "text-align-left",
                    "Center"    => "text-align-center",
					"Right" 	=> "text-align-right"
                ),
				'save_always' => true,
            ),
			array(
                "type" => "dropdown",
                "heading" => "Vertical alignment",
                "param_name" => "vert_align",
				"std"		=> "vert-middle",
                "value" => array(
                    "Top"       => "vert-top",
                    "Middle"     => "vert-middle",
					"Bottom" => "vert-bottom"
                ),
				'save_always' => true,
            ),
			array(
                "type" => "dropdown",
                "heading" => "Border radius",
                "param_name" => "border_radius",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px",
					"50 %"		=> "50%",
                ),
				'save_always' => true,
            ),
			array(
				"type" => "colorpicker",
				"heading" => "Shadow color",
				"param_name" => "shadow_color",
				"value" => "",
			),
			array(
                "type" => "dropdown",
                "heading" => "Flip Direction",
                "param_name" => "flip_direction",
				"std"		=> "flip-r-2-l",
                "value" => array(
                    "Right to Left"       => "flip-r-2-l",
                    "Left to Right"     => "flip-l-2-r",
                    "Top to Bottom"      => "flip-t-2-b",
					"Bottom to Top"     => "flip-b-2-t"
                ),
				'save_always' => true,
            ),
			array(
                "type" => "dropdown",
                "heading" => "Box height",
                "param_name" => "box_height",
				"std"		=> "height-45",
                "value" => $height_array,
				'save_always' => true,
            ),

			
        ),

) );


class WPBakeryShortCode_Brankic_Grid_Wrapper  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Grid Wrapper",
        "base" => "brankic_grid_wrapper",
        "as_parent" => array('only' => 'brankic_grid'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Brankic',
		"icon" => "brankic-vc-extension-icon icon-software-layout-8boxes",
        "show_settings_on_create" => true,
		"js_view" => 'VcColumnView',
        "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Columns',
				'param_name'	=> 'columns',
				'std'			=> 'col4',
				'value'			=> array(
						'Two'     	=> 'col2',
						'Three'    	=> 'col3',
						'Four'    	=> 'col4',
						'Five'    	=> 'col5',
						'Six'    	=> 'col6'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Vertical Alignment',
				'param_name'	=> 'vert_align',
				'std'			=> 'vert-middle',
				'value'			=> array(
						'Top'     	=> 'vert-top',
						'Middle'    => 'vert-middle',
						'Bottom'    => 'vert-bottom',
				)
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Border color",
				"param_name" 	=> "border_color",
				"value" 		=> "#2E3748"
			),
        ),
        
) );

/*** Grid Element ***/
//class WPBakeryShortCode_Brankic_Grid extends WPBakeryShortCode {}
class WPBakeryShortCode_Brankic_Grid  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Grid Element",
    "base" => "brankic_grid",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon brankic-vc-extension-default-icon",
    "content_element" => true,
	"as_parent" => array('only' => 'brankic_icon, vc_column_text'),
    "as_child" => array('only' => 'brankic_grid_wrapper'), // Use only|except attributes to limit parent (separate multiple values with comma)
	"params" => array(
	)
) );


/*** Icon ***/
vc_map( array(
    "name" => "Icon",
    "base" => "brankic_icon",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-clubs",
    "allowed_container_element" => 'vc_row',
    "params" => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon library', 'js_composer' ),
			'value' => array(
				__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
				__( 'Open Iconic', 'js_composer' ) => 'openiconic',
				__( 'Typicons', 'js_composer' ) => 'typicons',
				__( 'Entypo', 'js_composer' ) => 'entypo',
				__( 'Linecons', 'js_composer' ) => 'linecons',
				__( 'Mono Social', 'js_composer' ) => 'monosocial',
				__( 'Material', 'js_composer' ) => 'material',
				__( 'Linea', 'js_composer' ) => 'linea',
			),
			'admin_label' => true,
			'param_name' => 'type',
			'description' => __( 'Select icon library.', 'js_composer' ),
		),
		array(
			'type' 			=> 'iconpicker',
			'heading' 		=> __( 'Icon', 'js_composer' ),
			'param_name' 	=> 'icon_linea',
			'admin_label' => true,
			'settings' 		=> array(
					'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
					'type' => 'linea',
					'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
			),
			'dependency' 	=> array(
					'element' 	=> 'type',
					'value' 	=> 'linea',
			),
		),
		array(
			'type' 			=> 'iconpicker',
			'heading' 		=> __( 'Icon', 'js_composer' ),
			'param_name' 	=> 'icon_fontawesome',
			'admin_label' => true,
			'settings' 		=> array(
					'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
					'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
			),
			'dependency' 	=> array(
					'element' 	=> 'type',
					'value' 	=> 'fontawesome',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_openiconic',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_typicons',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_entypo',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_linecons',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_monosocial',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'monosocial',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_material',
			'admin_label' => true,
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true,
				// default true, display an "EMPTY" icon?
				'type' => 'material',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'material',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
        array(
			'type'			=> 'dropdown',
			'heading'		=> 'Icon size',
			'param_name'	=> 'icon_size',
			'std'			=> '3',
			'value'			=> array(
				'Small'       	=> '1',
				'Medium'      	=> '2',
				'Large'       	=> '3',
				'XL' 			=> '4',
				'XXL' 			=> '5',
			)
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background color",
			"param_name" => "bg_color",
			"value" => "",
		),
		array(
			"type" => "checkbox",
			"heading" => "Hover change",
			"value" => array("" => "true"),
			"param_name" => "hover",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Hover Background color",
			"param_name" => "bg_color_hover",
			"value" => "",
			"dependency" => array(
				"element" => "hover",
				"value"   => array("true"),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Border shape",
			"param_name" => "border_shape",
			"std"		=> "",
			"value" => array(
				"None"   	=> "",
				"Circle"   	=> "circle",
				"Diamond"   => "diamond",
				"Rectangle" => "rectangle",
			),
			'save_always' => true,
		),
		array(
			"type" => "dropdown",
			"heading" => "Border width",
			"param_name" => "border_width",
			"std"		=> "",
			"value" => array(
				"None"   => "",
				"1 px"   => "1px",
				"2 px"   => "2px",
				"3 px"   => "3px",
				"4 px"   => "4px",
				"5 px"   => "5px",
				"6 px"   => "6px",
				"7 px"   => "7px",
				"8 px"   => "8px",
				"9 px"   => "9px",
				"10 px"  => "10px"
			),
			'save_always' => true,
		),
		array(
			"type" => "colorpicker",
			"heading" => "Border color",
			"param_name" => "border_color",
			"value" => "#000",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Hover Border color",
			"param_name" => "hover_border_color",
			"value" => "",
			"dependency" => array(
				"element" => "hover",
				"value"   => array("true"),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Icon margin",
			"param_name" => "icon_shape_padding",
			"std"		=> "0 px",
			"value" => array(
				"0 px"   => "0",
				"10 px"   => "10",
				"20 px"   => "20",
				"30 px"   => "30",
				"40 px"   => "40",
				"50 px"   => "50",
				"60 px"   => "60",
				"70 px"   => "70",
				"80 px"   => "80",
				"90 px"   => "90",
				"100 px"  => "100"
			),
			'save_always' => true,
		),
		array(
			"type" => "colorpicker",
			"heading" => "Icon color",
			"param_name" => "icon_color",
			"value" => "#000000",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Hover Icon color",
			"param_name" => "icon_color_hover",
			"value" => "",
			"dependency" => array(
				"element" => "hover",
				"value"   => array("true"),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Some content along the icon",
			"param_name" => "heading_and_text",
			"value" => array("" => "true"),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Heading',
			'param_name'	=> 'heading',
			"dependency" => array(
				"element" => "heading_and_text",
				"value"   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Heading color",
			"param_name" => "heading_color",
			"value" => "#000",
			"dependency" => array(
				"element" => "heading_and_text",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Heading size',
			'param_name'	=> 'heading_size',
			'value'			=> array(
					'H1'      => 'h1',
					'H2'      => 'h2',
					'H3'      => 'h3',
					'H4'      => 'h4',
					'H5'      => 'h5',
					'H6'      => 'h6',
			),
			"dependency" => array(
				"element" => "heading_and_text",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Sub Heading',
			'param_name'	=> 'subheading',
			"dependency" => array(
				"element" => "heading_and_text",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'textarea_html',
			'heading'		=> 'Content',
			'param_name'	=> 'content',
			"dependency" => array(
				"element" => "heading_and_text",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Style',
			'param_name'	=> 'heading_and_text_style',
			"std" 			=> "column",
			'value'			=> array(
					'Column'      	=> 'i-column',
					'Row'      		=> 'i-row',
					'Heading icon'  => 'i-row heading-icon',
			),
			"dependency" => array(
				"element" => "heading_and_text",
				"value"   => array("true"),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Centered content",
			"param_name" => "content_centered",
			"value" => array("" => "true"),
			"dependency" => array(
				"element" => "heading_and_text",
				"value"   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Content text color",
			"param_name" => "heading_content_color",
			"value" => "#000000",
			"dependency" => array(
				"element" => "heading_and_text",
				"value"   => array("true"),
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Unique ID suffix',
			'param_name'	=> 'unique'
		),
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		
    )
) );

/*** Image with shadow and radius ***/
vc_map( array(
    "name" => "Image",
    "base" => "brankic_image",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-picture",
    "allowed_container_element" => 'vc_row',
    "params" => array(

		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Image',
			'param_name'	=> 'image',
			'admin_label'	=> true
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Image (URL from external source)',
			'param_name'	=> 'image_extra',
			'std'			=> '',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Thumb sizes',
			'param_name'	=> 'thumb_sizes',
			'std'			=> 'full',
			'value'			=> array(
				'Full'					=> 'full',
				'Original 1024'			=> 'brankic-original-1024',
				'Original 512'			=> 'brankic-original-512',
				'Squares'				=> 'brankic-512-512',
				'Landscape 4x3'  		=> 'brankic-1024-768',
				'Portrait 3x4'			=> 'brankic-768-1024',
				'Landscape 4x3 smaller'	=> 'brankic-512-384',
				'Portrait 3x4 smaller'	=> 'brankic-384-512',
				'Landscape 2x1'			=> 'brankic-1024-512',
				'Portrait 1x2'			=> 'brankic-512-1024'
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Show srcset",
			"description" => "Usefull to disable for smaller images",
			"param_name" => "show_srcset",
			"std"		=> "yes",
			"value" => array(
					"No" => "no",
					"Yes" => "yes",
					),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color",
			"param_name" => "shadow_color",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"heading" => "Border radius",
			"param_name" => "border_radius",
			"std"		=> "",
			"value" => array(
				"None"      => "",
				"1 px"     	=> "1px",
				"2 px"      => "2px",
				"3 px"     	=> "3px",
				"4 px"      => "4px",
				"5 px"      => "5px",
				"6 px"     	=> "6px",
				"7 px"      => "7px",
				"8 px"     	=> "8px",
				"9 px"      => "9px",
				"10 px"     => "10px",
				"11 px"    	=> "11px",
				"12 px"     => "12px",
				"13 px"    	=> "13px",
				"14 px"     => "14px",
				"15 px"     => "15px",
				"16 px"    	=> "16px",
				"17 px"     => "17px",
				"18 px"    	=> "18px",
				"19 px"     => "19px",
				"20 px"     => "20px",
				"50 %"		=> "50%",
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Custom cursor on hover",
			"value" => array("" => "true"),
			"param_name" => "custom_cursor",
			'dependency' => array(
				'element' => 'mouse_grab',
				'value' => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"std" => "View",
			"heading" => "Custom cursor text",
			"value" => array("" => "true"),
			"param_name" => "custom_cursor_text",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value' => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Custom cursor text color",
			"param_name" => "custom_cursor_color",
			"value" => "#ffcc99",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Custom cursor background color",
			"param_name" => "custom_cursor_bg",
			"value" => "#403a3e",
			'dependency' => array(
				'element' => 'custom_cursor',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Hover opacity",
			"param_name" => "hover",
			"std"		=> "",
			"value" => array(
				"None"      => "",
				"Low to High"     	=> "low-high",
				"High to Low"      => "high-low",
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Pretty Photo pop-up",
			"description" => "Original image will be shown in pop-up window (or URL if you insert it below",
			"param_name" => "pretty_photo",
			"std"		=> "no",
			"value" => array(
					"No" => "no",
					"Yes" => "yes",
					),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'URL',
			"description" 	=> "",
			'param_name'	=> 'url'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Unique ID suffix',
			'param_name'	=> 'unique'
		),
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		        
    )
) );

/*** INSTAGRAM FEED based on new API ***/
class WPBakeryShortCode_Brankic_Instafeed_20 extends WPBakeryShortCode{}
vc_map( array(
    "name" => "Instagram Feed 2020",
    "base" => "brankic_instafeed_20",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-photo",
    "params" => array(
			array(
				"type" => "checkbox",
				"heading" => "Don't use default user",
				"description" => "Default user is defined in Theme Options",
				"param_name" => "default_user_no",
				"std" => "",
				"value" => array("" => "true")
			),			
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Access Token',
				'param_name'	=> 'accesstoken',
				'std'			=> '',
				'description'	=> 'Go to https://developers.facebook.com/docs/instagram-basic-display-api/overview#user-token-generator You only need Access token',
				'dependency' => array(
					'element' => 'default_user_no',
					'value' => 'true',
				),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Maximum number of Images to add',
				'param_name'	=> 'limit',
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Columns',
				'param_name'	=> 'columns',
				'std'			=> '6',
				'value'			=> array(
					'One'    => 'col--1',
					'Two'    => 'col--2',
					'Three'  => 'col--3',
					'Four'   => 'col--4',
					'Five'   => 'col--5',
					'Six'    => 'col--6',
					'Seven'  => 'col--7',
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Image radius',
				'param_name'	=> 'radius',
				'std'			=> '5px',
				'value' => array(
							'1px' => '1px',
							'2px' => '2px',
							'3px' => '3px',
							'4px' => '4px',
							'5px' => '5px',
							'6px' => '6px',
							'7px' => '7px',
							'8px' => '8px',
							'9px' => '9px',
							'10px' => '10px',
							'11px' => '11px',
							'12px' => '12px',
							'13px' => '13px',
							'14px' => '14px',
							'15px' => '15px',
							'16px' => '16px',
							'17px' => '17px',
							'18px' => '18px',
							'19px' => '19px',
							'20px' => '20px',
							'50%' => '50%',
						),
			),

			array(
			'type' => 'dropdown',
			'heading' => 'Gap',
			'param_name' => 'gap',
			'value' => array(
				'0px' => '0',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'6px' => '6',
				'7px' => '7',
				'8px' => '8',
				'9px' => '9',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
				'40px' => '40',
				'45px' => '45',
				'50px' => '50',
				'55px' => '55',
				'60px' => '60',
				'65px' => '65',
				'70px' => '70',
				'75px' => '75',
				'80px' => '80',
				'85px' => '85',
				'90px' => '90',
				'95px' => '95',
				'100px' => '100',
			),
		),
			array(
				"type" => "dropdown",
				"heading" => "Duotone effect",
				"param_name" => "duotone",
				"std" => "",
				"value" => $duotone_array,
			),
			array(
				"type" => "colorpicker",
				"heading" => "Duotone custom color",
				"param_name" => "duotone_custom",
				"value" => "",
				'dependency' => array(
					'element' => 'duotone',
					'value'   => array('custom'),
				),
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "Gradient",
				"value" => array("" => "true"),
				"param_name" => "duotone_gradient",
				'dependency' => array(
					'element' => 'duotone',
					'value'   => array('custom'),
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Gradient direction",
				"std" => "to top right",
				"value" => array(
							"To Right" => "to right",
							"To Bottom" => "to bottom",
							"To Left" => "to left",
							"To Top" => "to top",
							"To Top Right" => "to top right",
							"To Bottom Right" => "to bottom right",
							"To Bottom Left" => "to bottom left",
							"To Top Left" => "to top left",
							"Radial" => "circle"),
				"param_name" => "duotone_gradient_direction",
				'dependency' => array(
					'element' => 'duotone_gradient',
					'value'   => array("true"),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Duotone custom color 2",
				"param_name" => "duotone_custom_2",
				"value" => "",
				'dependency' => array(
					'element' => 'duotone_gradient',
					'value'   => array('true'),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Duotone custom color 3",
				"param_name" => "duotone_custom_3",
				"value" => "",
				'dependency' => array(
					'element' => 'duotone_gradient',
					'value'   => array('true'),
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Image zoom effect",
				"std" => "",
				"value" => array(
					"No zoom" => "",
					"Zoom Out" => "image_zoom_out",
					"Zoom In" => "image_zoom_in",
				),
				"param_name" => "image_zoom_effect",
			),
array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),			
        
    )
) );

/*** LIST Element ***/
class WPBakeryShortCode_Brankic_List_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "List Wrapper",
    "base" => "brankic_list_wrapper",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-todolist-pencil",
	"is_container" => true,
	"js_view" => 'VcColumnView',
	"content_element" => true,
	'show_settings_on_create' => true,
	'as_parent' => array('only' => 'brankic_button,vc_column_text'),
	'params' => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Columns Align',
				'param_name'	=> 'list_align',
				'std'			=> 'left_right',
				'value'			=> array(
						'Left'    									=> 'left',
						'Centered'    								=> 'center',
						'Justified'  								=> 'justify',
						'Right'   									=> 'right',
						'First left, middle centered, last right'   => 'left_center_right',
						'All left, last right'    					=> 'left_right',
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Vertical Align',
				'param_name'	=> 'list_vert_align',
				'std'			=> 'middle',
				'value'			=> array(
						'Top'    => 'top',
						'Middle' => 'middle',
						'Bottom' => 'bottom',
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Stretch',
				'param_name'	=> 'list_stretch',
				'std'			=> '1_1_1',
				'value'			=> array(
						'All even'    => '1_1_1',
						'0 1 1' => '0_1_1',
						'1 0 1' => '1_0_1',
						'1 1 0' => '1_1_0',
				)
			)
	)
	
));

vc_map( array(
    "name" => "List",
    "base" => "brankic_list",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-arrows-hamburger1",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Marker shape',
			'param_name'	=> 'list_marker',
			'std'			=> 'plus',
			'value'			=> array(
				'Check'    			=> 'check',
				'Plus'   			=> 'plus',
				'Star'   			=> 'star',
				'Arrow'   			=> 'arrow',
				'Angle'   			=> 'angle',
				'Play'   			=> 'play',
				'Heart'   			=> 'heart',
				'Numeric (decimal)'	=> 'numeric',
			)
		),
		array(
			"type" => "colorpicker",
			"heading" => "Color",
			"param_name" => "color",
			"value" => "#ffffff"
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Border",
			"param_name" 	=> "list_border",
			"value" 		=> array("" => "true")
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Background",
			"param_name" 	=> "list_bg",
			"value" 		=> array("" => "true")
		),
		array(
			"type" 			=> "checkbox",
			"heading" 		=> "Inline",
			"param_name" 	=> "inline",
			"value" 		=> array("" => "inline")
		),
		array(
			'type'			=> 'textarea_html',
			'heading'		=> 'Insert list',
			'param_name'	=> 'content',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Unique ID suffix',
			'param_name'	=> 'unique'
		),
	)
));

/*** MAP ***/
vc_map( array(
    "name" => "Map",
    "base" => "brankic_map",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-geolocalize-05",
    "allowed_container_element" => 'vc_row',
    "params" => array(
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Location',
				'param_name'	=> 'location',
				'admin_label'	=> true
			)
    )
) );

/*** Marquee ***/
vc_map( array(
    "name" => "Marquee",
    "base" => "brankic_marquee",
    "category" => 'Brankic Typography',
    "icon" => "brankic-vc-extension-icon icon-arrows-switch-horizontal",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
			'type'			=> 'textarea_html',
			'heading'		=> 'Marquee text',
			'param_name'	=> 'content',
			"admin_label" => true
		),
		array(
				"type" => "colorpicker",
				"heading" => "Text color",
				"param_name" => "text_color",
				"value" => "",
			),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "use_gradient",
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "gradient_direction",
			'dependency' => array(
				'element' => 'use_gradient',
				'value'   => array("true"),
			),
		),
			
		array(
			"type" => "colorpicker",
			"heading" => "Text gradient 2 color",
			"param_name" => "text_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient',
				'value'   => array("true"),
			),
        ),	
		array(
			"type" => "colorpicker",
			"heading" => "Text gradient 3 color",
			"param_name" => "text_color_3",
			"value" => "",
			'dependency' => array(
				'element' => 'use_gradient',
				'value'   => array("true"),
			),
        ),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Font size',
			'param_name'	=> 'size',
			'std'			=> '',
			'value'			=> array("---" => "",
									"60px" => "60px",
									"50px" => "50px",
									"40px" => "40px",
									"30px" => "30px",
									"20px" => "20px",
									"15px" => "15px",
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom font size',
			'param_name'	=> 'size_custom',
			'dependency' 	=> array(
					'element' 	=> 'size',
					'value' 	=> 'custom',
			),
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Font weight',
			'param_name'	=> 'weight',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Font style',
			'param_name'	=> 'style',
			'std'			=> '',
			'value'			=> array("---" => "",
									"Normal" => "normal",
									"Italic" => "italic",
									"Oblique" => "oblique",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Text transform',
			'param_name'	=> 'transform',
			'std'			=> '',
			'value'			=> array("---" => "",
									"None" => "none",
									"Capitalize" => "capitalize",
									"Uppercase" => "uppercase",
									"Lowercase" => "lowercase",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Letter spacing',
			'param_name'	=> 'spacing',
			'std'			=> '',
			'value'			=> array("---" => "",
									"0px" => "0px",
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
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom letter spacing',
			'param_name'	=> 'spacing_custom',
			'dependency' 	=> array(
					'element' 	=> 'spacing',
					'value' 	=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Line height',
			'param_name'	=> 'height',
			'std'			=> '',
			"value" 		=> $font_height_array,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom line height',
			'param_name'	=> 'height_custom',
			'dependency' 	=> array(
					'element' 	=> 'height',
					'value' 	=> 'custom',
			),
			
		),
		
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Duration (in ms)',
			'param_name'	=> 'duration',
			"std" 			=> '7000'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Gap (in pixels)',
			'param_name'	=> 'gap',
			"std" 			=> '500'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Delay Before Start (in ms)',
			'param_name'	=> 'delayBeforeStart',
			"std" 			=> '0'
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Direction',
			'param_name'	=> 'direction',
			'std'			=> 'left',
			'value'			=> array('Left'   => 'left',
									'Right'   => 'right')
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Duplicate',
			'param_name'	=> 'duplicate',
			'std'			=> 'true',
			'value'			=> array('True'   => 'true',
									'False'   => 'false')
		),
		
		
    )
) );

/*** Overlap Text ***/
vc_map( array(
    "name" => "Overlap text",
    "base" => "brankic_overlap_text",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-software-pathfinder-intersect",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
			'type'			=> 'textfield',
			'heading'		=> 'Front Title',
			'param_name'	=> 'title_front',
			"admin_label" => true
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Behind Title',
			'param_name'	=> 'title_behind',
			"admin_label" => true
		),
		array(
			"type" => "colorpicker",
			"heading" => "Front Title color",
			"param_name" => "title_front_color",
			"value" => "#000000",
        ),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Front Title Wrapper',
			'param_name'	=> 'title_front_wrapper',
			'std'			=> 'h3',
			'value'			=> array(
					'H1'      => 'h1',
					'H2'      => 'h2',
					'H3'      => 'h3',
					'H4'      => 'h4',
					'H5'      => 'h5',
					'H6'      => 'h6',
					'SPAN'    => 'span',
					'P'     => 'p',
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Front Title Class',
			'param_name'	=> 'title_front_wrapper_class',
			'std'			=> '',
			'value'			=> array(
					'None'         			 => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4',
					'Custom'  				 => 'custom'
			)
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Front Title Class',
			'param_name'	=> 'title_front_wrapper_class_custom',
			'std'			=> '',
			'dependency' => array(
				'element' => 'title_front_wrapper_class',
				'value'   => 'custom',
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Front Title Style',
			'param_name'	=> 'title_front_wrapper_style_custom',
			'std'			=> '',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font size',
			'param_name'	=> 'h_size',
			'std'			=> '',
			'value'			=> array("---" => "",
									"60px" => "60px",
									"50px" => "50px",
									"40px" => "40px",
									"30px" => "30px",
									"20px" => "20px",
									"15px" => "15px",
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Title font size',
			'param_name'	=> 'h_size_custom',
			'dependency' 	=> array(
					'element' 	=> 'h_size',
					'value' 	=> 'custom',
			),
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font weight',
			'param_name'	=> 'h_weight',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font style',
			'param_name'	=> 'h_style',
			'std'			=> '',
			'value'			=> array("---" => "",
									"Normal" => "normal",
									"Italic" => "italic",
									"Oblique" => "oblique",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title text transform',
			'param_name'	=> 'h_transform',
			'std'			=> '',
			'value'			=> array("---" => "",
									"None" => "none",
									"Capitalize" => "capitalize",
									"Uppercase" => "uppercase",
									"Lowercase" => "lowercase",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title letter spacing',
			'param_name'	=> 'h_spacing',
			'std'			=> '',
			'value'			=> array("---" => "",
									"0px" => "0px",
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
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom letter spacing',
			'param_name'	=> 'h_spacing_custom',
			'dependency' 	=> array(
					'element' 	=> 'h_spacing',
					'value' 	=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title line height',
			'param_name'	=> 'h_height',
			'std'			=> '',
			"value" 		=> $font_height_array,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom line height',
			'param_name'	=> 'h_height_custom',
			'dependency' 	=> array(
					'element' 	=> 'h_height',
					'value' 	=> 'custom',
			),
			
		),

		array(
			"type" => "colorpicker",
			"heading" => "Behind Title color",
			"param_name" => "title_behind_color",
			"value" => "#eeeeee",
        ),		
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Behind Title Wrapper',
			'param_name'	=> 'title_behind_wrapper',
			'std'			=> 'h4',
			'value'			=> array(
					'H1'      => 'h1',
					'H2'      => 'h2',
					'H3'      => 'h3',
					'H4'      => 'h4',
					'H5'      => 'h5',
					'H6'      => 'h6',
					'SPAN'    => 'span',
					'P'     => 'p',
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Behind Title Class',
			'param_name'	=> 'title_behind_wrapper_class',
			'std'			=> '',
			'value'			=> array(
					'None'         			 => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4',
					'Custom'  				 => 'custom'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Behind Title Class',
			'param_name'	=> 'title_behind_wrapper_class_custom',
			'std'			=> '',
			'dependency' => array(
				'element' => 'title_behind_wrapper_class',
				'value'   => 'custom',
			),
		),   
 		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Behind Title Style',
			'param_name'	=> 'title_behind_wrapper_style_custom',
			'std'			=> '',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title font size',
			'param_name'	=> 'p_size',
			'std'			=> '',
			'value'			=> array("---" => "",
									"60px" => "60px",
									"50px" => "50px",
									"40px" => "40px",
									"30px" => "30px",
									"20px" => "20px",
									"15px" => "15px",
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Small title custom font size',
			'param_name'	=> 'p_size_custom',
			'dependency' 	=> array(
					'element' 	=> 'p_size',
					'value' 	=> 'custom',
			),
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title font weight',
			'param_name'	=> 'p_weight',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title font style',
			'param_name'	=> 'p_style',
			'std'			=> '',
			'value'			=> array("---" => "",
									"Normal" => "normal",
									"Italic" => "italic",
									"Oblique" => "oblique",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title text transform',
			'param_name'	=> 'p_transform',
			'std'			=> '',
			'value'			=> array("---" => "",
									"None" => "none",
									"Capitalize" => "capitalize",
									"Uppercase" => "uppercase",
									"Lowercase" => "lowercase",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title letter spacing',
			'param_name'	=> 'p_spacing',
			'std'			=> '',
			'value'			=> array("---" => "",
									"0px" => "0px",
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
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Small title custom letter spacing',
			'param_name'	=> 'p_spacing_custom',
			'dependency' 	=> array(
					'element' 	=> 'p_spacing',
					'value' 	=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title line height',
			'param_name'	=> 'p_height',
			'std'			=> '',
			"value" 		=> $font_height_array,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Small title Custom line height',
			'param_name'	=> 'p_height_custom',
			'dependency' 	=> array(
					'element' 	=> 'p_height',
					'value' 	=> 'custom',
			),
			
		),		
    )
) );

class WPBakeryShortCode_Brankic_Pie_Charts_Wrapper  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  'Pie Charts Wrapper',
	"base" => "brankic_pie_charts_wrapper",
	"as_parent" => array('only' => 'brankic_pie_chart'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'Brankic',
	"icon" => "brankic-vc-extension-icon icon-piechart",
	"show_settings_on_create" => true,
	"params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Animation speed',
				'param_name'	=> 'speed',
				'value'			=> array(
					'1s'    => '1000',
					'2s'    => '2000',
					'3s'    => '3000',
					'4s '   => '4000',
					'5s'    => '5000',
					'6s'    => '6000',
					'7s'    => '7000'
				)
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Bar Color",
				"param_name" 	=> "bar_color",
				"value" 		=> "#706abb"
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Track color",
				"param_name" 	=> "track_color",
				"value" 		=> "#2E3748"
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Size (95 default)',
				'param_name'	=> 'size',
				'value'			=> '95'
			),
	),
	"js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Brankic_Pie_Chart  extends WPBakeryShortCode {}
vc_map( array(
    "name" => 'Pie Chart',
    "base" => "brankic_pie_chart",
    "as_child" => array('only' => 'brankic_pie_charts_wrapper'),
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon",
    "show_settings_on_create" => true,
    "params" => array(
        array(
			'type'			=> 'dropdown',
			'heading'		=> 'Column width',
			'param_name'	=> 'width',
			'value'			=> array(
				'1/1'      => 'one',
				'1/2'      => 'one-half',
				'1/3'      => 'one-third',
				'2/3'      => 'two-third',
				'1/4'      => 'one-fourth',
				'3/4'      => 'three-fourth',
				'1/5'      => 'one-fifth'
			)
		),
		array(
            "type" => "textfield",
            "heading" => "Caption",
            "param_name" => "caption"
        ),
		array(
            "type" => "textfield",
            "heading" => "Value 1-100",
            "param_name" => "value"
        ),
		array(
			"type" => "checkbox",
			"heading" => "Last in the row",
			"param_name" => "last",
			"value" => array("" => "true")
		),       
    )
) );

/*** Pricing Table Wrapper ***/
class WPBakeryShortCode_Brankic_Pricing_Table_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Pricing Table Wrapper",
    "base" => "brankic_pricing_table_wrapper",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon brankic-vc-extension-default-icon",
	"as_parent" => array('only' => 'brankic_pricing_table'),
	"js_view" => 'VcColumnView',
    "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Number of columns',
				'param_name'	=> 'width',
				'admin_label'	=> true,
				'value'			=> array(
					'2 columns' => 'column-2',
					'3 columns' => 'column-3',
					'4 columns' => 'column-4',
					'5 columns' => 'column-5',
					'6 columns'	=> 'column-6'
				)
			),
			array(
				"type" => "checkbox",
				"heading" => "Gap",
				"param_name" => "gap",
				"value" => array("" => "true")
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of table",
				"param_name" => "table_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of border",
				"param_name" => "border_color",
				"value" => "",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
			array(
                "type" => "dropdown",
                "heading" => "Border radius",
                "param_name" => "border_radius",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px"
                ),
            ),
			array(
				"type" => "colorpicker",
				"heading" => "Shadow color",
				"param_name" => "shadow_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of  title",
				"param_name" => "title_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of subtitle",
				"param_name" => "subtitle_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of price",
				"param_name" => "price_color",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of products",
				"param_name" => "products_color",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of button",
				"param_name" => "button_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of button text",
				"param_name" => "button_text_color",
				"value" => "",
			),		
    )
) );

/*** Pricing Table ***/
class WPBakeryShortCode_Brankic_Pricing_Table extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Pricing Table",
    "base" => "brankic_pricing_table",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon brankic-vc-extension-default-icon",
    "content_element" => true,
    "as_child" => array('only' => 'brankic_pricing_table_wrapper'), // Use only|except attributes to limit parent (separate multiple values with comma)
	"params" => array(
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Title',
				'param_name'	=> 'title'
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Subtitle',
				'param_name'	=> 'subtitle'
			),
			
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Price',
				'param_name'	=> 'price'
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Symbol',
				'param_name'	=> 'symbol',
				'value'			=> '',
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Below price',
				'param_name'	=> 'below_price'
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Products (comma separated)',
				'param_name'	=> 'products'
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Text on button',
				'param_name'	=> 'button_text'
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'URL of button',
				'param_name'	=> 'button_url'
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Target',
				'param_name'	=> 'target',
				'value'			=> array(
					'New window/tab' => '_blank',
					'Same window/tab'	=> '_self'
				),
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Featured",
				"param_name" 	=> "featured",
				"value" 		=> array("" => "true")
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of featured table",
				"param_name" => "table_color",
				"value" => "",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of featured border",
				"param_name" => "border_color",
				"value" => "",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
			array(
                "type" => "dropdown",
                "heading" => "Featured Border radius",
                "param_name" => "border_radius",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px"
                ),
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
            ),
			array(
				"type" => "colorpicker",
				"heading" => "Color of featured title",
				"param_name" => "title_color",
				"value" => "",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of featured subtitle",
				"param_name" => "subtitle_color",
				"value" => "",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of featured price",
				"param_name" => "price_color",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of featured products",
				"param_name" => "products_color",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of featured button",
				"param_name" => "button_color",
				"value" => "",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of featured button text",
				"param_name" => "button_text_color",
				"value" => "",
				'dependency' 	=> array(
					'element' 	=> 'featured',
					'value' 	=> 'true',
				),
			),
						
    )
) );

class WPBakeryShortCode_Brankic_Progress_Bars_Wrapper  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => "Progress Bars Wrapper",
	"base" => "brankic_progress_bars_wrapper",
	"as_parent" => array('only' => 'brankic_progress_bar'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'Brankic',
	"icon" => "brankic-vc-extension-icon icon-ecommerce-graph2",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"admin_label" => true,
	"params" => array(
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Speed (in miliseconds)',
				'param_name'	=> 'speed',
				'value'			=> '2000'
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Style',
				'param_name'	=> 'style',
				'std'			=> '',
				'value'			=> array(
					'Thin'   => '',
					'Bold'  => 'bold rounded',
					'Bolder'   => 'bolder rounded'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Bar radius',
				'param_name'	=> 'bar_radius',
				'std'			=> '50em',
				'value'			=> array(
					'50em'   => '50em',
					'40em'   => '40em',
					'30em'   => '30em',
					'20em'   => '20em',
					'10em'   => '10em',
					'5em'    => '5em',
					'1em'    => '1em',
					'0.5em'  => '0.5em',
					'0.3em'  => '0.3em',
					'0.1em'  => '0.1em'
				)
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Unique ID suffix',
				'param_name'	=> 'unique'
			),
	)
) );

class WPBakeryShortCode_Brankic_Progress_Bar  extends WPBakeryShortCode {}
vc_map( array(
    "name" => 'Progress Bar',
    "base" => "brankic_progress_bar",
    "as_child" => array('only' => 'brankic_progress_bars_wrapper'),
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-bargraph",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Caption",
            "param_name" => "caption",
			"admin_label" => true
        ),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Caption position',
			'param_name'	=> 'caption_position',
			'std'			=> 'outside',
			'value'			=> array(
				'Outside'   => 'outside',
				'Inside (only if BOLDER is selected)'  => 'inside'
			)
		),
		array(
            "type" => "textfield",
            "heading" => "Value (% symbol will be added)",
            "param_name" => "value",
			"value" => "",
			"admin_label" => true
        ),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Bar color",
			"param_name" 	=> "bar_color",
			"value" 		=> "#485cc5"
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Bar color 2",
			"param_name" 	=> "bar_color_2",
			"value" 		=> ""
		),
        array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Caption color",
			"param_name" 	=> "caption_color",
			"value" 		=> "#fff"
		),
    )
) );


class WPBakeryShortCode_Brankic_Restaurant_Menu_Item extends WPBakeryShortCode{}
vc_map( array(
        "name" => "Restaurant menu item",
        "base" => "brankic_restaurant_menu_item",
        //"content_element" => true,
		"category" => 'Brankic',
		"icon" => "brankic-vc-extension-icon brankic-vc-extension-default-icon",
        "show_settings_on_create" => true,
		"as_child" => array('only' => 'brankic_tab'),
		//"js_view" => 'VcColumnView',
        "params" => array(
            array(
				'type'			=> 'textfield',
				'heading'		=> 'Title',
				'param_name'	=> 'title',
				'std'			=> '',
			),
			array(
				'type'			=> 'textarea',
				'heading'		=> 'Description',
				'param_name'	=> 'description',
				'std'			=> '',
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Price (with currency symbol)',
				'param_name'	=> 'price',
				'std'			=> '',
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title color",
				"param_name" => "title_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Description color",
				"param_name" => "description_color",
				"value" => "",
			),
			array(
				'type'			=> 'attach_image',
				'heading'		=> 'Image (optional)',
				'param_name'	=> 'item_image',
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Image - external SRC (optional)',
				'param_name'	=> 'item_image_extra',
			),
			array(
				"type" => "checkbox",
				"heading" => "First element in column",
				"value" => array("" => "true"),
				"param_name" => "first",
			),
			array(
				"type" => "checkbox",
				"heading" => "Last element in column",
				"value" => array("" => "true"),
				"param_name" => "last",
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Unique ID suffix',
				'param_name'	=> 'unique'
			),
			
        ),

) );

class WPBakeryShortCode_Brankic_Reveal extends WPBakeryShortCodesContainer {}
// Reveal Text
vc_map( array(
        "name" => "Reveal Text",
        "base" => "brankic_reveal",
        "content_element" => true,
		"category" => 'Brankic Typography',
		"icon" => "brankic-vc-extension-icon icon-software-font-kerning",
		'allowed_container_element' => 'vc_row',
		"as_parent" => array('except' => 'vc_row'),
		"js_view" => 'VcColumnView',
        "params" => array(
            array(
				"type" => "textarea_html",
				"heading" => "Text",
				"param_name" => "content",
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Reveal Direction',
				'param_name'	=> 'direction',
				'std'			=> 'lr',
				'value'			=> array(
						'Left to Right'     => 'lr',
						'Right to Left'     => 'rl',
						'Top to Bottom'     => 'tb',
						'Bottom to Top'  	=> 'bt'
				)
			),
			array(
				'type'			=> 'attach_image',
				'heading'		=> 'Image URL',
				'param_name'	=> 'image_src',
				'admin_label'	=> true
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Image (URL from external source)',
				'param_name'	=> 'image_src_extra',
				'std'			=> '',
			),
			array(
                "type" => "dropdown",
                "heading" => "Border radius",
                "param_name" => "border_radius",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px",
					"50 %"		=> "50%",
                ),
				'save_always' => true,
            ),
			array(
				"type" => "colorpicker",
				"heading" => "Shadow color",
				"param_name" => "shadow_color",
				"value" => "",
			),
			array(
                "type" => "dropdown",
                "heading" => "Image height",
                "param_name" => "height",
				"std"		=> "height-70",
                "value" => $height_array,
				'save_always' => true,
            ),
			array(
				"type" => "colorpicker",
				"heading" => "Reveal Color",
				"param_name" => "color",
				"value" => "#ff2d57",
			),
			array(
                'type' => 'textfield',
                'heading' => 'Reveal delay (in ms)',
                'param_name' => 'delay',
                'value' => '350',
            ),			
        ),

) );

/*** BUTTON ***/
vc_map( array(
    "name" => "Scroll Button",
    "base" => "brankic_scroll_button",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-mouse",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Button shape',
			'param_name'	=> 'shape',
			'std'			=> 'arrow',
			'value'			=> array(
				'Three Arrows'      => 'three-arrows',
				'Arrow'        		=> 'arrow',
				'Mouse'    			=> 'mouse',
				'Line'   			=> 'line',
				'Pulse'   			=> 'pulse',
			)
		),
		array(
			"type" => "colorpicker",
			"heading" => "Color",
			"param_name" => "color",
			"value" => "#ffffff"
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Unique ID suffix',
			'param_name'	=> 'unique'
		),
	)
));


/*** Section Title ***/
vc_map( array(
    "name" => "Section title",
    "base" => "brankic_section_title",
    "category" => 'Brankic Typography',
    "icon" => "brankic-vc-extension-icon icon-software-font-size",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
			'type'			=> 'textarea_html',
			'heading'		=> 'Title',
			'param_name'	=> 'content',
			"admin_label" => true
		),
		array(
			"type" => "colorpicker",
			"heading" => "Title color",
			"param_name" => "title_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Title color 2",
			"param_name" => "title_color_2",
			"value" => "",
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Title color gradient direction",
			"std" => "to right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "title_gradient_direction",
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title tag',
			'param_name'	=> 'h_tag',
			'std'			=> 'H2',
			'value'			=> array(
					'H1'      => 'H1',
					'H2'      => 'H2',
					'H3'      => 'H3',
					'H4'      => 'H4',
					'H5'      => 'H5',
					'H6'      => 'H6'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font size',
			'param_name'	=> 'h_size',
			'std'			=> '',
			'value'			=> array("---" => "",
									"60px" => "60px",
									"50px" => "50px",
									"40px" => "40px",
									"30px" => "30px",
									"20px" => "20px",
									"15px" => "15px",
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Title font size',
			'param_name'	=> 'h_size_custom',
			'dependency' 	=> array(
					'element' 	=> 'h_size',
					'value' 	=> 'custom',
			),
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font weight',
			'param_name'	=> 'h_weight',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font style',
			'param_name'	=> 'h_style',
			'std'			=> '',
			'value'			=> array("---" => "",
									"Normal" => "normal",
									"Italic" => "italic",
									"Oblique" => "oblique",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title text transform',
			'param_name'	=> 'h_transform',
			'std'			=> '',
			'value'			=> array("---" => "",
									"None" => "none",
									"Capitalize" => "capitalize",
									"Uppercase" => "uppercase",
									"Lowercase" => "lowercase",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title letter spacing',
			'param_name'	=> 'h_spacing',
			'std'			=> '',
			'value'			=> array("---" => "",
									"0px" => "0px",
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
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom letter spacing',
			'param_name'	=> 'h_spacing_custom',
			'dependency' 	=> array(
					'element' 	=> 'h_spacing',
					'value' 	=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title line height',
			'param_name'	=> 'h_height',
			'std'			=> '',
			"value" 		=> $font_height_array,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom line height',
			'param_name'	=> 'h_height_custom',
			'dependency' 	=> array(
					'element' 	=> 'h_height',
					'value' 	=> 'custom',
			),
			
		),
		array(
			"type" => "checkbox",
			"heading" => "Use highlight effect",
			"param_name" => "highlight",
			"value" => array("" => "true"),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Text before highlighted text',
			'param_name'	=> 'highlight_pretext',
			'dependency' 	=> array(
					'element' 	=> 'highlight',
					'value' 	=> 'true',
			),			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Highlight style',
			'param_name'	=> 'highlight_style',
			'std'			=> 'highlight underline',
			'value'			=> array(
					'highlight underline'      		=> 'highlight underline',
					'highlight overlay'     		=> 'highlight overlay',
					'highlight line-through'     	=> 'highlight line-through',
					'highlight line-through in-back'=> 'highlight line-through in-back',
					'highlight underline-through'   => 'highlight underline-through'
			),
			'dependency' 	=> array(
					'element' 	=> 'highlight',
					'value' 	=> 'true',
			),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight text color",
			"param_name" 	=> "highlight_text_color",
			"value" 		=> "",
			'dependency' 	=> array(
					'element' 	=> 'highlight',
					'value' 	=> 'true',
			),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight Hover text color",
			"param_name" 	=> "highlight_hover_text_color",
			"value" 		=> "",
			'dependency' 	=> array(
					'element' 	=> 'highlight',
					'value' 	=> 'true',
			),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight background color 1",
			"param_name" 	=> "highlight_background_color_1",
			"value" 		=> "",
			'dependency' 	=> array(
					'element' 	=> 'highlight',
					'value' 	=> 'true',
			),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight background color 2",
			"param_name" 	=> "highlight_background_color_2",
			"value" 		=> "",
			'dependency' 	=> array(
					'element' 	=> 'highlight',
					'value' 	=> 'true',
			),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight Hover background color 1",
			"param_name" 	=> "highlight_hover_background_color_1",
			"value" 		=> "",
			'dependency' 	=> array(
					'element' 	=> 'highlight',
					'value' 	=> 'true',
			),
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> "Highlight Hover background color 2",
			"param_name" 	=> "highlight_hover_background_color_2",
			"value" 		=> "",
			'dependency' 	=> array(
					'element' 	=> 'highlight',
					'value' 	=> 'true',
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Small title',
			'param_name'	=> 'small_title',
			"admin_label" => true
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title web font',
			'param_name'	=> 'p_custom_font',
			'std'			=> '',
			'value'			=> array('None'         			 => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4')
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title font size',
			'param_name'	=> 'p_size',
			'std'			=> '',
			'value'			=> array("---" => "",
									"60px" => "60px",
									"50px" => "50px",
									"40px" => "40px",
									"30px" => "30px",
									"20px" => "20px",
									"15px" => "15px",
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Small title custom font size',
			'param_name'	=> 'p_size_custom',
			'dependency' 	=> array(
					'element' 	=> 'p_size',
					'value' 	=> 'custom',
			),
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title font weight',
			'param_name'	=> 'p_weight',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title font style',
			'param_name'	=> 'p_style',
			'std'			=> '',
			'value'			=> array("---" => "",
									"Normal" => "normal",
									"Italic" => "italic",
									"Oblique" => "oblique",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title text transform',
			'param_name'	=> 'p_transform',
			'std'			=> '',
			'value'			=> array("---" => "",
									"None" => "none",
									"Capitalize" => "capitalize",
									"Uppercase" => "uppercase",
									"Lowercase" => "lowercase",
									"Inherit" => "inherit")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title letter spacing',
			'param_name'	=> 'p_spacing',
			'std'			=> '',
			'value'			=> array("---" => "",
									"0px" => "0px",
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
									"Inherit" => "inherit",
									"Custom" => "custom")
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Small title custom letter spacing',
			'param_name'	=> 'p_spacing_custom',
			'dependency' 	=> array(
					'element' 	=> 'p_spacing',
					'value' 	=> 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title line height',
			'param_name'	=> 'p_height',
			'std'			=> '',
			"value" 		=> $font_height_array,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Small title Custom line height',
			'param_name'	=> 'p_height_custom',
			'dependency' 	=> array(
					'element' 	=> 'p_height',
					'value' 	=> 'custom',
			),
			
		),
		
		array(
			"type" => "colorpicker",
			"heading" => "Small title color",
			"param_name" => "small_title_color",
			"value" => "",
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Small title position',
			'param_name'	=> 'small_title_position',
			'std'			=> 'above',
			'value'			=> array(
				'Above Title'   => 'above',
				'Below Title'   => 'below'
			)
		),
		
		array(
			"type" => "checkbox",
			"heading" => "Centered",
			"param_name" => "centered",
			"value" => array("" => "true")
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Outdent',
			'param_name'	=> 'outdent',
			'value'			=> array(
					'---'      => '',
					'Left'     => 'left',
					'Right'    => 'right'
			)
		),
		
		array(
			'type'			=> 'textfield',
			'heading'		=> 'URL',
			'param_name'	=> 'heading_url'
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> 'Unique ID suffix',
			'param_name'	=> 'unique'
		),
    )
) );


/*** SHARE ***/
vc_map( array(
    "name" => "Share",
    "base" => "brankic_share",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-share",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
			'type'			=> 'dropdown',
			'heading'		=> 'Share options',
			'param_name'	=> 'style',
			'value'			=> array(
				'Icons only'   							=> 'yes',
				'\"Share\" text above the icons'   		=> 'yes_above',
				'\"Share\" text inline with the icons'  => 'yes_inline'
			),
		), 
    )
) );

vc_map( array(
    "name" => "Sidebar",
    "base" => "brankic_sidebar",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-software-layout-header-sideright",
    "allowed_container_element" => 'vc_row',
    "params" => array(
			array(
				"type" => "dropdown",
				"heading" => "Sidebar to use",
				"param_name" => "sidebar_id",
				"value" => $sidebar_ids,
				"std"	=> "custom_sidebar_1",
				"admin_label" => true,
			),


			
    ),
	
) );

/*** SOCIAL ICONS ***/
vc_map( array(
    "name" => "Social Icons",
    "base" => "brankic_social_icons",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-world",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        
		
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Shape',
			'param_name'	=> 'shape',
			'std'			=> 'default',
			'value'			=> array(
				'Circle'       	=> 'circle',
				'Diamond'      	=> 'diamond',
				'Rectangle'     => 'rectangle',
				'Default'       => 'default',
				'Text Only' 	=> 'text',
				'Icon & Text'   => 'icon-text'
			)
		),
		array(
			"type" => "colorpicker",
			"heading" => "Icon color",
			"param_name" => "icon_color",
			"value" => ""
		),
		array(
			"type" => "colorpicker",
			"heading" => "Icon hover color",
			"param_name" => "icon_hover_color",
			"value" => ""
		),

/* 		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Style',
			'param_name'	=> 'style',
			'std'			=> '',
			'value'			=> array(
				'Transparent'       => '',
				'Background color' 	=> 'full-color',
				'Border'           	=> 'border'
			),
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('circle','diamond','rectangle','default'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Hover',
			'param_name'	=> 'hover',
			'std'			=> '',
			'value'			=> array(
				'None' 	=> '',
				'Background color' 	=> 'full-color-hover',
				'Border'           	=> 'border-hover'
			),
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('circle','diamond','rectangle','default'),
			),
		), */
		
		array(
			"type" => "colorpicker",
			"heading" => "Background icon color",
			"param_name" => "icon_bg_color",
			"value" => "",
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('circle','diamond','rectangle','default'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Background hover color",
			"param_name" => "bg_hover_color",
			"value" => "",
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('circle','diamond','rectangle','default'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Border icon color",
			"param_name" => "icon_border_color",
			"value" => "",
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('circle','diamond','rectangle','default'),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Border hover icon color",
			"param_name" => "icon_border_hover_color",
			"value" => "",
			'dependency' => array(
				'element' => 'shape',
				'value'   => array('circle','diamond','rectangle','default'),
			),
		),

		array(
			"type" => "textarea",
			"heading" => "social_network, URL, social_network, URL...",
			"param_name" => "content",
			"description" => "Example: facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979",
			"value" => "",
			"admin_label" => true
		),       
    )
) );


class WPBakeryShortCode_Brankic_Steps_Wrapper  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Steps Wrapper",
        "base" => "brankic_steps_wrapper",
        "as_parent" => array('only' => 'brankic_step'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Brankic',
		"icon" => "brankic-vc-extension-icon icon-basic-signs",
        "show_settings_on_create" => true,
		"js_view" => 'VcColumnView',
        "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Orientation',
				'param_name'	=> 'orientation',
				'std'			=> '',
				'value'			=> array(
						'Horizontal'    => '',
						'Vertical'    	=> 'vertical'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Align',
				'param_name'	=> 'align',
				'std'			=> 'center',
				'value'			=> array(
						'Left'    	=> 'left',
						'Center'   	=> 'center',
						'Right'		=> 'right',
				)
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Border color",
				"param_name" 	=> "border_color",
				"value" 		=> "#2E3748"
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Heading color",
				"param_name" 	=> "heading_color",
				"value" 		=> "#000"
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Number color",
				"param_name" 	=> "number_color",
				"value" 		=> "#000"
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Content color",
				"param_name" 	=> "content_color",
				"value" 		=> "#000"
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Background color",
				"param_name" 	=> "bg_color",
				"value" 		=> "#ff2d57"
			),
			array(
				"type" => "checkbox",
				"heading" => "Shadow",
				"value" => array("" => "true"),
				"param_name" => "shadow",
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Shadow color",
				"param_name" 	=> "shadow_color",
				"value" 		=> "rgba(255,45,87, 0.06)",
				"dependency" => array(
					"element" => "shadow",
					"value"   => array("true"),
				),
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Shadow 2 color",
				"param_name" 	=> "shadow_2_color",
				"value" 		=> "rgba(255,45,87, 0.05)",
				"dependency" => array(
					"element" => "shadow",
					"value"   => array("true"),
				),
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> "Shadow 3 color",
				"param_name" 	=> "shadow_3_color",
				"value" 		=> "rgba(255,45,87, 0.04)",
				"dependency" => array(
					"element" => "shadow",
					"value"   => array("true"),
				),
			),
        ),
        
) );

/*** Step Element ***/
class WPBakeryShortCode_Brankic_Step extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Step",
    "base" => "brankic_step",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon brankic-vc-extension-default-icon",
    "content_element" => true,
    "as_child" => array('only' => 'brankic_steps_wrapper'), // Use only|except attributes to limit parent (separate multiple values with comma)
	'allowed_container_element' => 'vc_row',
	"params" => array(
		array(
			"type" => "textarea_html",
			"heading" => "Content",
			"param_name" => "content",
			"value" => "",
			"admin_label" => true
		),
	)
) );

/*** Brankic Super Slider ***/

/*** Super Slider Wrapper ***/
class WPBakeryShortCode_Brankic_Super_Slider_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Super Slider Wrapper",
    "base" => "brankic_super_slider_wrapper",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-folder-multiple",
	"as_parent" => array('only' => 'brankic_super_slide'),
	"js_view" => 'VcColumnView',
    "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Slider type',
				'param_name'	=> 'slider_type',
				"admin_label"   => true,
				'std'			=> 'swiper',
				'value'			=> array(
					'Swiper slider' 	=> 'swiper',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => "Slider height",
				"param_name" => "slider_height",
				"std"		=> "height-70",
				"value" => $height_array,
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Navigation type',
				'param_name'	=> 'navigation_type',
				'std'			=> 'dots',
				'value'			=> array(
					'Dots'   => 'dots',
					'Arrows' => 'arrows',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Navigation horizontal align',
				'param_name'	=> 'navigation_horizontal_align',
				'std'			=> 'left',
				'value'			=> array(
					'Left'   => 'left',
					'Center' => 'center',
					'Right'  => 'right',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Navigation vertical align',
				'param_name'	=> 'navigation_vertical_align',
				'std'			=> 'middle',
				'value'			=> array(
					'Top'   => 'top',
					'Middle' => 'middle',
					'Bottom'  => 'bottom',
					'None'  => 'none',
				),
				'dependency' => array(
					'element' => 'navigation_type',
					'value'   => array('dots'),
				),
			),
			
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Navigation color',
				'param_name'	=> 'navigation_color',
				'std'			=> 'light',
				'value'			=> array(
					'Light'   => 'light',
					'Dark' => 'dark',
				),
			),
			array(
                "type" => "dropdown",
                "heading" => "Slide border radius",
                "param_name" => "border_radius",
				"std"		=> "",
                "value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px",
					"50 %"		=> "50%",
                ),
				'save_always' => true,
            ),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Fullwidth",
				"param_name" 	=> "fullwidth",
				"value" 		=> array("" => "true")
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Auto Height",
				"param_name" 	=> "autoheight",
				"value" 		=> array("" => "true")
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Mouse Wheel Control",
				"param_name" 	=> "mouse_wheel_control",
				"value" 		=> array("" => "true")
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Grab Cursor",
				"param_name" 	=> "grab_cursor",
				"value" 		=> array("" => "true")
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Content horizontal align',
				'param_name'	=> 'content_horizontal_align',
				'description'	=> 'You can override this for each slide',
				'std'			=> 'center',
				'value'			=> array(
					'Left'   => 'left',
					'Center'  => 'center',
					'Right'   => 'right'
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Content vertical align',
				'param_name'	=> 'content_vertical_align',
				'description'	=> 'You can override this for each slide',
				'std'			=> 'middle',
				'value'			=> array(
					'Top'   	=> 'top',
					'Middle'  	=> 'middle',
					'Bottom'   	=> 'bottom'
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Image zoom effect",
				"std" => "image_zoom_out",
				"value" => array(
					"No zoom" => "",
					"Zoom Out" => "image_zoom_out",
					"Zoom In" => "image_zoom_in",
				),
				"param_name" => "image_zoom_effect",
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Fade effect",
				"param_name" 	=> "fade",
				"value" 		=> array("" => "true")
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "AutoPlay",
				"param_name" 	=> "autoplay",
				"value" 		=> array("" => "true")
			),
			array(
				"type" => "textfield",
				"heading" => "Delay (in ms)",
				"param_name" => "delay",
				"std"		=> "3000",
				'dependency' => array(
					'element' => 'autoplay',
					'value'   => array('true'),
				),
			),
			array(
			"type" 			=> "checkbox",
			"heading" 		=> "Parallax",
			"param_name" 	=> "parallax",
			"value" 		=> array("" => "1"),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Parallax value',
			'param_name'	=> 'parallax_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			'dependency' => array(
				'element' => 'parallax',
				'value'   => array('1'),
			),
		),
			
			
    )
) );

/*** Super Slide ***/
class WPBakeryShortCode_Brankic_Super_Slide extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Super Slide",
    "base" => "brankic_super_slide",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-folder",
	"js_view" => 'VcColumnView',
    "allowed_container_element" => 'vc_row',
	"as_parent" => array('only' => 'brankic_image, vc_column_text,brankic_instafeed_20, brankic_restaurant_menu_item'),
    "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Slide type',
				'param_name'	=> 'slide_type',
				'std'			=> 'predefined',
				'value'			=> array(
					'Predefined'   => 'predefined',
					'Custom'   => 'custom'
				),
			),
			array(
				'type'			=> 'attach_image',
				'heading'		=> 'Background image',
				'param_name'	=> 'slide_bg_image',

			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Background image (URL from external source)',
				'param_name'	=> 'slide_bg_image_extra',
				'std'			=> '',
			),
			array(
				'type' => 'dropdown',
				'heading' => 'Background image position',
				'param_name' => 'bg_align',
				'std' => '',
				'value' => array(
					'Default' => '',
					'Top Left' => 'brankic_bg_top_left',
					'Top Right' => 'brankic_bg_top_right',
					'Bottom Right' => 'brankic_bg_bottom_right',
					'Bottom Left' => 'brankic_bg_bottom_left',
					'Top' => 'brankic_bg_top',
					'Right' => 'brankic_bg_right',
					'Bottom' => 'brankic_bg_bottom',
					'Left' => 'brankic_bg_left',
					'Center' => 'brankic_bg_center',
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => 'Background image repeat',
				'param_name' => 'bg_repeat',
				'std' => '',
				'value' => array(
					'Repeat' => 'repeat',
					'Repeat Y' => 'repeat-y',
					'Repeat X' => 'repeat-x',
					'No repeat' => 'no-repeat',

				),
			),
			array(
				'type' => 'dropdown',
				'heading' => 'Background image size',
				'param_name' => 'bg_size',
				'std' => 'cover',
				'value' => array(
					'Default' => 'auto',
					'Contain' => 'contain',
					'Cover' => 'cover',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Slide background color",
				"param_name" => "slide_bg_color",
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Gradient background",
				"param_name" 	=> "slide_bg_color_use_gradient_bg",
				"value" 		=> array("" => "true")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Gradient direction",
				"std" => "to top right",
				"value" => array(
							"To Right" => "to right",
							"To Bottom" => "to bottom",
							"To Left" => "to left",
							"To Top" => "to top",
							"To Top Right" => "to top right",
							"To Bottom Right" => "to bottom right",
							"To Bottom Left" => "to bottom left",
							"To Top Left" => "to top left",
							"Radial" => "circle"),
				"param_name" => "slide_bg_color_gradient_direction",
				'dependency' => array(
					'element' => 'slide_bg_color_use_gradient_bg',
					'value'   => array("true"),
				),
			),
				
			array(
				"type" => "colorpicker",
				"heading" => "Background gradient 2 color",
				"param_name" => "slide_bg_color_2",
				"value" => "",
				'dependency' => array(
					'element' => 'slide_bg_color_use_gradient_bg',
					'value'   => array("true"),
				),
			),	
			array(
				"type" => "colorpicker",
				"heading" => "Background gradient 3 color",
				"param_name" => "slide_bg_color_3",
				"value" => "",
				'dependency' => array(
					'element' => 'slide_bg_color_use_gradient_bg',
					'value'   => array("true"),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background gradient 4 color",
				"param_name" => "slide_bg_color_4",
				"value" => "",
				'dependency' => array(
					'element' => 'slide_bg_color_use_gradient_bg',
					'value'   => array("true"),
				),
			),
			
			array(
				"type" => "textfield",
				"heading" => "Slide caption",
				"param_name" => "caption",
				'dependency' => array(
					'element' => 'slide_type',
					'value'   => array('predefined'),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color of caption",
				"param_name" => "caption_color",
				'dependency' => array(
					'element' => 'slide_type',
					'value'   => array('predefined'),
				),
			),

			array(
				"type" => "textarea_html",
				"heading" => "Slide content",
				"param_name" => "content",
				'dependency' => array(
					'element' => 'slide_type',
					'value'   => array('predefined'),
				),
			),
			
			
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Content horizontal align',
				'param_name'	=> 'content_horizontal_align',
				'std'			=> 'center',
				'value'			=> array(
					'Left'   => 'left',
					'Center'  => 'center',
					'Right'   => 'right'
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Content vertical align',
				'param_name'	=> 'content_vertical_align',
				'std'			=> 'middle',
				'value'			=> array(
					'Top'   	=> 'top',
					'Middle'  	=> 'middle',
					'Bottom'   	=> 'bottom'
				),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Unique ID suffix',
				'param_name'	=> 'unique'
			),
    )
) );


/*** Swiper Slides Wrapper ***/
class WPBakeryShortCode_Brankic_Swiper_Slide_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Swiper Vertical Slider Wrapper",
    "base" => "brankic_swiper_slide_wrapper",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-software-vertical-align-center",
	"as_parent" => array('only' => 'brankic_swiper_slide'),
	"js_view" => 'VcColumnView',
	"show_settings_on_create" => true,
     "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Pagination',
				'param_name'	=> 'swiper_pagination',
				'admin_label'	=> true,
				'std'			=> 'vertical lines right',
				'value'			=> array(
					'Dots Horizontal' => '',
					'Dots Vertical Right' => 'vertical right',
					'Dots Vertical Left' => 'vertical left',
					'Lines Vertical Left' => 'vertical lines left',
					'Lines Vertical Right' => 'vertical lines right',
					'Lines' => 'lines',
				)
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "Image holder left",
				"value" => array("" => "true"),
				"param_name" => "image_holder_left",
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Slider Content',
				'param_name'	=> 'slider_content',
				"admin_label" 	=> true,
				"std"			=> "predefined",
				'value'			=> array(
					'Testimonials' => 'testimonials',
					'Predefined' => 'predefined',
					'Blog' => 'blog',
					'Portfolio' => 'portfolio',
					'WooCoomerce products' => 'woocommerce'
				)
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Limit',
				'param_name'	=> 'limit',
				'std'			=> '-1',
				"admin_label" => true,
				'dependency' => array(
					'element' => 'slider_content',
					'value' => array('blog', 'portfolio', 'testimonials', 'woocommerce'),
				),
			),
			array(
				"type" => "dropdown",
				"heading" => "Category to show",
				"param_name" => "blog_cat_slug",
				"value" => array_merge(array("All posts" => "0"), $brankic_categories_names_count),
				'dependency' => array(
					'element' => 'slider_content',
					'value' => 'blog',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => "Products to show",
				"param_name" => "woo_cat_slug",
				"value" => array_merge(array("All posts" => "0"), $brankic_woo_categories_names_count),
				'dependency' => array(
					'element' => 'slider_content',
					'value' => 'woocommerce',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => "Portfolio category to show",
				"param_name" => "portfolio_cat_slug",
				"value" => array_merge(array("All portfolio items" => "0"), $brankic_portfolio_names_count),
				'dependency' => array(
					'element' => 'slider_content',
					'value' => array('portfolio')
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => 'Testimonial Category to show',
				'param_name' => 'testimonial_cat_slug',
				"value" => array_merge(array("All testimonials" => "0"), $brankic_testimonials_names_count),
				'dependency' => array(
					'element' => 'slider_content',
					'value' => 'testimonials',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Thumb sizes',
				'param_name'	=> 'thumb_sizes',
				'std'			=> 'brankic-768-1024',
				'value'			=> array(
					'Full'					=> 'full',
					'Original 1024'			=> 'brankic-original-1024',
					'Original 512'			=> 'brankic-original-512',
					'Squares'				=> 'brankic-512-512',
					'Landscape 4x3'  		=> 'brankic-1024-768',
					'Portrait 3x4'			=> 'brankic-768-1024',
					'Landscape 4x3 smaller'	=> 'brankic-512-384',
					'Portrait 3x4 smaller'	=> 'brankic-384-512',
					'Landscape 2x1'			=> 'brankic-1024-512',
					'Portrait 1x2'			=> 'brankic-512-1024'
				),
				'dependency' => array(
					'element' => 'slider_content',
					'value'   => array('blog', 'portfolio', 'testimonials', 'woocommerce'),
				),
			),
			array(
				"type" => "dropdown",
				"heading" => "Slider height",
				"param_name" => "height",
				"std"		=> "height-100",
				"value" => $height_array,
				'save_always' => true,
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Slide in effect',
				'param_name'	=> 'slide_in_effect',
				'std' 			=> 'slide-in-effect effect-btt',
				'value' => array(
					'None' => '',
					'Top to Bottom' => 'slide-in-effect effect-ttb',
					'Bottom to Top' => 'slide-in-effect effect-btt',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => "Duotone effect",
				"param_name" => "duotone",
				"std" => "",
				"value" => $duotone_array,
			),
			array(
				"type" => "colorpicker",
				"heading" => "Duotone custom color",
				"param_name" => "duotone_custom",
				"value" => "",
				'dependency' => array(
					'element' => 'duotone',
					'value'   => array('custom'),
				),
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "Gradient",
				"value" => array("" => "true"),
				"param_name" => "duotone_gradient",
				'dependency' => array(
					'element' => 'duotone',
					'value'   => array('custom'),
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Gradient direction",
				"std" => "to top right",
				"value" => array(
							"To Right" => "to right",
							"To Bottom" => "to bottom",
							"To Left" => "to left",
							"To Top" => "to top",
							"To Top Right" => "to top right",
							"To Bottom Right" => "to bottom right",
							"To Bottom Left" => "to bottom left",
							"To Top Left" => "to top left",
							"Radial" => "circle"),
				"param_name" => "duotone_gradient_direction",
				'dependency' => array(
					'element' => 'duotone_gradient',
					'value'   => array("true"),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Duotone custom color 2",
				"param_name" => "duotone_custom_2",
				"value" => "",
				'dependency' => array(
					'element' => 'duotone_gradient',
					'value'   => array('true'),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Duotone custom color 3",
				"param_name" => "duotone_custom_3",
				"value" => "",
				'dependency' => array(
					'element' => 'duotone_gradient',
					'value'   => array('true'),
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Image zoom effect",
				"std" => "image_zoom_out",
				"value" => array(
					"No zoom" => "",
					"Zoom Out" => "image_zoom_out",
					"Zoom In" => "image_zoom_in",
				),
				"param_name" => "image_zoom_effect",
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "Show excerpt",
				"std" => "true",
				"value" => array("" => "true"),
				"param_name" => "show_excerpt",
				'dependency' => array(
					'element' => 'slider_content',
					'value' => array('blog', 'portfolio'),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text color",
				"param_name" => "text_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background color",
				"param_name" => "bg_color",
				"value" => "",
			),
			array(
			'type'			=> 'textfield',
			'heading'		=> 'Read more text',
			'param_name'	=> 'read_more',
			'std' 			=> 'Read article',
		),
			array(
				'type' => 'dropdown',
				'heading' => 'Vertical align on tablet',
				'param_name' => 'vert_align_tablet',
				'std' => 'tablet_vert_top',
				'value' => array(
					'Middle' => '',
					'Top' => 'tablet_vert_top',
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => 'Vertical align on phone',
				'param_name' => 'vert_align_phone',
				'std' => 'mobile_vert_top',
				'value' => array(
					'Middle' => '',
					'Top' => 'mobile_vert_top',
				),
			),
			
			array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title Class',
			'param_name'	=> 'title_class',
			'std'			=> '',
			'value'			=> array(
					'None'         			 => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4',
					'Custom'  				 => 'custom'
			),
			'group' => 'Brankic Caption Options',
		),

		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom  Title Class',
			'param_name'	=> 'title_class_custom',
			'std'			=> '',
			'dependency' => array(
				'element' => 'title_front_wrapper_class',
				'value'   => 'custom',
			),
			'group' => 'Brankic Caption Options',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font size',
			'param_name'	=> 'title_size',
			'std'			=> '',
			'value'			=> array("---" => "",
									"60px" => "60px",
									"50px" => "50px",
									"40px" => "40px",
									"30px" => "30px",
									"20px" => "20px",
									"15px" => "15px",
									"Inherit" => "inherit",
									"Custom" => "custom"),
			'group' => 'Brankic Caption Options',
									
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Title font size',
			'param_name'	=> 'title_size_custom',
			'dependency' 	=> array(
					'element' 	=> 'title_size',
					'value' 	=> 'custom',
			),
			'group' => 'Brankic Caption Options',
			
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font weight',
			'param_name'	=> 'title_weight',
			'std'			=> '',
			'value'			=> array("---" => "",
										"Normal" => "normal",
										"9 0 0" => "900",
										"8 0 0" => "800",
										"7 0 0" => "700",
										"6 0 0" => "600",
										"5 0 0" => "500",
										"4 0 0" => "400",
										"3 0 0" => "300",
										"2 0 0" => "200",
										"1 0 0" => "100",
										"Inherit" => "inherit"),
			'group' => 'Brankic Caption Options',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title font style',
			'param_name'	=> 'title_style',
			'std'			=> '',
			'value'			=> array("---" => "",
									"Normal" => "normal",
									"Italic" => "italic",
									"Oblique" => "oblique",
									"Inherit" => "inherit"),
			'group' => 'Brankic Caption Options',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title text transform',
			'param_name'	=> 'title_transform',
			'std'			=> '',
			'value'			=> array("---" => "",
									"None" => "none",
									"Capitalize" => "capitalize",
									"Uppercase" => "uppercase",
									"Lowercase" => "lowercase",
									"Inherit" => "inherit"),
			'group' => 'Brankic Caption Options',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title letter spacing',
			'param_name'	=> 'title_spacing',
			'std'			=> '',
			'value'			=> array("---" => "",
									"0px" => "0px",
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
									"Inherit" => "inherit",
									"Custom" => "custom"),
			'group' => 'Brankic Caption Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom letter spacing',
			'param_name'	=> 'title_spacing_custom',
			'dependency' 	=> array(
					'element' 	=> 'title_spacing',
					'value' 	=> 'custom',
			),
			'group' => 'Brankic Caption Options',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Title line height',
			'param_name'	=> 'title_height',
			'std'			=> '',
			"value" 		=> $font_height_array,
			'group' => 'Brankic Caption Options',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title custom line height',
			'param_name'	=> 'title_height_custom',
			'dependency' 	=> array(
					'element' 	=> 'title_height',
					'value' 	=> 'custom',
			),
			'group' => 'Brankic Caption Options',			
		),

    )  
) );

/*** Swiper Slide ***/
class WPBakeryShortCode_Brankic_Swiper_Slide extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Swiper Vertical Slide",
    "base" => "brankic_swiper_slide",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon brankic-vc-extension-default-icon",
    "content_element" => true,
    "as_child" => array('only' => 'brankic_swiper_slide_wrapper'), // Use only|except attributes to limit parent (separate multiple values with comma)
	"params" => array(
			array(
				'type'			=> 'attach_image',
				'heading'		=> 'Image URL',
				'param_name'	=> 'image_src',
				'admin_label'	=> true
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Image (URL from external source)',
				'param_name'	=> 'image_src_extra',
				'std'			=> '',
			),			
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Title',
				'param_name'	=> 'title'
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Vertical text',
				'param_name'	=> 'vertical'
			),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => ""
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "URL",
				"param_name" 	=> "url",
				"value" 		=> array("" => "true")
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Title URL',
				'param_name'	=> 'button_url',
				'dependency' => array(
					'element' => 'url',
					'value'   => array('true'),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text color",
				"param_name" => "text_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background color",
				"param_name" => "bg_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background color 2",
				"param_name" => "bg_color_2",
				"value" => "",
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Light pagination (depending on background color)",
				"param_name" 	=> "light_pagination",
				"value" 		=> array("" => "yes")
			),					
    )
) );

/*** Tabs Wrapper ***/
class WPBakeryShortCode_Brankic_Tabs_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Tabs Wrapper",
    "base" => "brankic_tabs_wrapper",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-folder-multiple",
	"as_parent" => array('only' => 'brankic_tab'),
	"js_view" => 'VcColumnView',
    "params" => array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Tab style',
				'param_name'	=> 'style',
				"admin_label"   => true,
				'std'			=> 'rounded',
				'value'			=> array(
					'Style 1 (dotted)' 	=> 'dotted',
					'Style 2 (rounded)'	=> 'rounded',
					'Style 3 (minimal)'	=> 'minimal',
				)
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Vertical",
				"param_name" 	=> "vertical",
				"value" 		=> array("" => "true")
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Centered captions",
				"param_name" 	=> "centered_captions",
				"value" 		=> array("" => "true")
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> "Animated transition",
				"param_name" 	=> "animation",
				"value" 		=> array("" => "true")
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon color",
				"param_name" => "icon_color",
				"value" => "",
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value'   => array("dotted", "minimal"),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Icon color",
				"param_name" => "active_icon_color",
				"value" => "",
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value'   => array("dotted", "minimal"),
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Icon size',
				'param_name'	=> 'icon_size',
				'value'			=> array(
					'Small'   => 'small',
					'Medium'  => 'medium',
					'Large'   => 'large',
					'XL'      => 'xl',
				),
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value'   => array("dotted", "minimal"),
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Tab (heading) background color",
				"param_name" => "tab_bg_color",
				"value" => "",
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value' 	=> 'rounded',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Tab (heading) background color",
				"param_name" => "active_tab_bg_color",
				"value" => "",
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value' 	=> 'rounded',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Tab (heading) background color 2 (gradient)",
				"param_name" => "active_tab_bg_color_2",
				"value" => "",
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value' 	=> 'rounded',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Shadow color",
				"param_name" => "shadow_color",
				"value" => "",
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value' 	=> 'rounded',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Tab Caption color",
				"param_name" => "tab_text_color",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Tab Caption color",
				"param_name" => "active_tab_text_color",
				"value" => "",
			),
			array(
				"type" => "colorpicker",
				"heading" => "Sections background color",
				"param_name" => "bg_color",
				"value" => "",
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value' 	=> 'rounded',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Border color",
				"param_name" => "active_border_color",
				"value" => "",
				'dependency' 	=> array(
						'element' 	=> 'style',
						'value'   => array("minimal"),
				),
			),
			
    )
) );

/*** Tab ***/
class WPBakeryShortCode_Brankic_Tab extends WPBakeryShortCodesContainer {}
//class WPBakeryShortCode_Brankic_Tab extends WPBakeryShortCode{}
vc_map( array(
    "name" => "Tab",
    "base" => "brankic_tab",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-folder",
	"js_view" => 'VcColumnView',
    "allowed_container_element" => 'vc_row',
	"as_parent" => array('only' => 'brankic_image, vc_column_text,brankic_instafeed_20, brankic_restaurant_menu_item'),
	//"as_child" => array('only' => 'brankic_tabs_wrapper'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Caption',
				'param_name'	=> 'caption',
				"admin_label" => true,
			),
			
			array(
				'type' => 'dropdown',
				'heading' => __( 'Icon library', 'js_composer' ),
				'value' => array(
					__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
					__( 'Open Iconic', 'js_composer' ) => 'openiconic',
					__( 'Typicons', 'js_composer' ) => 'typicons',
					__( 'Entypo', 'js_composer' ) => 'entypo',
					__( 'Linecons', 'js_composer' ) => 'linecons',
					__( 'Mono Social', 'js_composer' ) => 'monosocial',
					__( 'Material', 'js_composer' ) => 'material',
					__( 'Linea', 'js_composer' ) => 'linea',
				),
				'admin_label' => true,
				'param_name' => 'type',
				'description' => __( 'Only for styles 1 & 3', 'js_composer' ),
			),
			array(
				'type' 			=> 'iconpicker',
				'heading' 		=> __( 'Icon', 'js_composer' ),
				'param_name' 	=> 'icon_linea',
				'admin_label' => true,
				'settings' 		=> array(
						'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
						'type' => 'linea',
						'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
				),
				'dependency' 	=> array(
						'element' 	=> 'type',
						'value' 	=> 'linea',
				),
			),
			array(
				'type' 			=> 'iconpicker',
				'heading' 		=> __( 'Icon', 'js_composer' ),
				'param_name' 	=> 'icon_fontawesome',
				'admin_label' => true,
				'settings' 		=> array(
						'emptyIcon' 	=> true, // default true, display an "EMPTY" icon? - if false it will display first icon   from set as default.
						'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
				),
				'dependency' 	=> array(
						'element' 	=> 'type',
						'value' 	=> 'fontawesome',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_openiconic',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'openiconic',
				),
				'description' => __( 'Only for styles 1 & 3', 'js_composer' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_typicons',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'typicons',
				),
				'description' => __( 'Only for styles 1 & 3', 'js_composer' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_entypo',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_linecons',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'linecons',
				),
				'description' => __( 'Only for styles 1 & 3', 'js_composer' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_monosocial',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'monosocial',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'monosocial',
				),
				'description' => __( 'Only for styles 1 & 3', 'js_composer' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'js_composer' ),
				'param_name' => 'icon_material',
				'admin_label' => true,
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => true,
					// default true, display an "EMPTY" icon?
					'type' => 'material',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'material',
				),
				'description' => __( 'Only for styles 1 & 3', 'js_composer' ),
			),

    )
) );


/*** TEAM MEMBER ***/
class WPBakeryShortCode_Brankic_Team_Member extends WPBakeryShortCode{}
vc_map( array(
    "name" => "Team Member",
    "base" => "brankic_team_member",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon icon-basic-headset",
    "params" => array(
        array(
			'type'			=> 'dropdown',
			'heading'		=> 'Style',
			'param_name'	=> 'style',
			'value'			=> array(
				'Default'   => 'default',
				'Overlay Figcaption'   				=> 'overlay-figcaption',
				'Default Overlay'   				=> 'default overlay',
				'Overlay Hidden'   					=> 'overlay-hidden',
				'Overlay Figcaption Transparent'   	=> 'overlay-figcaption transparent',
				'Overlay Outset'   					=> 'overlay-outset'
			)
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Image URL',
			'param_name'	=> 'image_src',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Image (URL from external source)',
			'param_name'	=> 'image_src_extra',
			'std'			=> '',
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Thumb sizes',
			'description' 	=> '',
			'param_name'	=> 'thumb_sizes',
			'std'			=> 'brankic-1024-768',
			'value'			=> array(
				'Original 1024'			=> 'brankic-original-1024',
				'Original 512'			=> 'brankic-original-512',
				'Squares'			=> 'brankic-512-512',
				'Landscape 4x3'  	=> 'brankic-1024-768',
				'Portrait 3x4'		=> 'brankic-768-1024',
				'Landscape 4x3 smaller'	=> 'brankic-512-384',
				'Portrait 3x4 smaller'	=> 'brankic-384-512',
				'Landscape 2x1'		=> 'brankic-1024-512',
				'Portrait 1x2'		=> 'brankic-512-1024'
			),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Name',
			'param_name'	=> 'name',
			'admin_label'	=> true
		),
		
		array(
			"type" => "colorpicker",
			"heading" => "Name color",
			"param_name" => "name_color",
			"value" => "#000000",
        ),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Position (director, developer, CEO...)',
			'param_name'	=> 'position',
			'admin_label'	=> true
		),
		
		array(
			"type" => "colorpicker",
			"heading" => "Position color",
			"param_name" => "position_color",
			"value" => "#000000",
        ),

		array(
			"type" => "colorpicker",
			"heading" => "Background (hover) color",
			"param_name" => "name_position_bg_color",
			"value" => "",
			'dependency' => array(
				'element' => 'style',
				'value'   => array('overlay-figcaption','default overlay','overlay-hidden', 'overlay-figcaption transparent'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Background (hover) color 2 (for gradient background)",
			"param_name" => "name_position_bg_color_2",
			"value" => "",
			'dependency' => array(
				'element' => 'style',
				//'value'   => array('overlay-figcaption','default overlay'),
				'value'   => array('overlay-figcaption','default overlay','overlay-hidden', 'overlay-figcaption transparent'),
			),
        ),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Background (hover) gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "name_position_bg_color_gradient_direction",
			'dependency' => array(
				'element' => 'style',
				'value'   => array('overlay-figcaption','default overlay','overlay-hidden', 'overlay-figcaption transparent'),
			),
		),
		array(
			"type" => "dropdown",
			"heading" => "Duotone effect",
			"param_name" => "duotone",
			"std" => "",
			"value" => $duotone_array,
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color",
			"param_name" => "duotone_custom",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
        ),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Gradient",
			"value" => array("" => "true"),
			"param_name" => "duotone_gradient",
			'dependency' => array(
				'element' => 'duotone',
				'value'   => array('custom'),
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Gradient direction",
			"std" => "to top right",
			"value" => array(
						"To Right" => "to right",
						"To Bottom" => "to bottom",
						"To Left" => "to left",
						"To Top" => "to top",
						"To Top Right" => "to top right",
						"To Bottom Right" => "to bottom right",
						"To Bottom Left" => "to bottom left",
						"To Top Left" => "to top left",
						"Radial" => "circle"),
			"param_name" => "duotone_gradient_direction",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array("true"),
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 2",
			"param_name" => "duotone_custom_2",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "colorpicker",
			"heading" => "Duotone custom color 3",
			"param_name" => "duotone_custom_3",
			"value" => "",
			'dependency' => array(
				'element' => 'duotone_gradient',
				'value'   => array('true'),
			),
        ),
		array(
			"type" => "dropdown",
			"heading" => "Border radius",
			"param_name" => "border_radius",
			"std"		=> "",
			"value" => array(
                    "None"      => "",
                    "1 px"     	=> "1px",
                    "2 px"      => "2px",
					"3 px"     	=> "3px",
                    "4 px"      => "4px",
                    "5 px"      => "5px",
					"6 px"     	=> "6px",
                    "7 px"      => "7px",
					"8 px"     	=> "8px",
                    "9 px"      => "9px",
                    "10 px"     => "10px",
                    "11 px"    	=> "11px",
                    "12 px"     => "12px",
					"13 px"    	=> "13px",
                    "14 px"     => "14px",
                    "15 px"     => "15px",
					"16 px"    	=> "16px",
                    "17 px"     => "17px",
					"18 px"    	=> "18px",
                    "19 px"     => "19px",
                    "20 px"     => "20px",
					"50 %"		=> "50%",
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Shadow",
			"param_name" => "shadow",
			"value" => array("" => "true"),
		),
		array(
			"type" => "colorpicker",
			"heading" => "Shadow color",
			"param_name" => "shadow_color",
			"value" => "",
			'dependency' => array(
				'element' => 'shadow',
				'value'   => array('true'),
			),
		),

		array(
			"type" => "textarea_html",
			"heading" => "Content",
			"param_name" => "content",
			"value" => "<p>Insert additional content</p>",
			"admin_label" => true
		),
		
		array(
			"type" => "checkbox",
			"heading" => "Show Social networks",
			"param_name" => "social",
			"value" => array("" => "true"),
		),
		
		array(
			"type" => "textarea",
			"heading" => "social_network, URL, social_network, URL...",
			"param_name" => "social_url",
			"description" => "Example: facebook, http://facebook.com/brankic1979themes, twitter, http://twitter.com/brankic1979, instagram, http://instagram.com/brankic1979",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => "Icon color",
			"param_name" => "icon_color",
			"value" => "#000000"
		),
		array(
			"type" => "dropdown",
			"heading" => "Height",
			"param_name" => "height",
			"std"		=> "height-45",
			"value" => $height_array,
			'save_always' => true,
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Unique ID suffix',
			'param_name'	=> 'unique'
		),
		
		array(
			"type" => "checkbox",
			"heading" => "Tilt effect",
			"param_name" => "tilt",
			"description" => "A tiny requestAnimationFrame powered 60+fps lightweight parallax hover tilt effect for jQuery.",
			"value" => array("" => "true"),
			"group" => "Tilt Options"
		),
		array(
			"type" => "textfield",
			"heading" => "Perspective",
			"param_name" => "tilt_perspective",
			"description" => "Transform perspective, the lower the more extreme the tilt gets.",
			"std" => "1000",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "textfield",
			"heading" => "Speed",
			"param_name" => "tilt_speed",
			"description" => "Speed of the enter/exit transition",
			"std" => "300",
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Glare effect",
			"param_name" => "tilt_glare",
			"description" => "Setting this option will enable a glare effect.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Glare value',
			'param_name'	=> 'tilt_glare_value',
			'std'			=> '0.5',
			'value'			=> array(
					'0.1'      => '0.1',
					'0.2'      => '0.2',
					'0.3'      => '0.3',
					'0.4'      => '0.4',
					'0.5'      => '0.5',
					'0.6'      => '0.6',
					'0.7'      => '0.7',
					'0.8'      => '0.8',
					'0.9'      => '0.9'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt_glare',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Keep Floating",
			"param_name" => "tilt_floating",
			"description" => "Setting this option will not reset the tilt element when the user mouse leaves the element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Scale on hover',
			'param_name'	=> 'tilt_scale',
			"description" 	=> "Setting this option will scale tilt element on hover.",
			'std'			=> '',
			'value'			=> array(
					'No scale' => '',
					'1.2'      => '1.2',
					'1.5'      => '1.5',
					'2'        => '2',
					'2.5'      => '2.5',
					'0.9'      => '0.9',
					'0.8'      => '0.8',
					'0.7'      => '0.7',
					'0.6'      => '0.6'
			),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable Y axis",
			"param_name" => "tilt_disable_y",
			"description" => "Setting this option will disable the Y-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		array(
			"type" => "checkbox",
			"heading" => "Disable X axis",
			"param_name" => "tilt_disable_x",
			"description" => "Setting this option will disable the X-Axis on the tilt element.",
			"value" => array("" => "true"),
			"group" => "Tilt Options",
			'dependency' => array(
				'element' => 'tilt',
				'value'   => array('true'),
			),
		),
		
    )
) );


// Typewriter ex AutoType
vc_map( array(
        "name" => "Typewriter",
        "base" => "brankic_autotype",
        "content_element" => true,
		"category" => 'Brankic Typography',
		"icon" => "brankic-vc-extension-icon icon-software-character",
        "show_settings_on_create" => true,
        "params" => array(
            array(
				'type'			=> 'textfield',
				'heading'		=> 'Static text before Typewriter text',
				'param_name'	=> 'static_text',
				'std'			=> ''
			),
			array(
				"type" => "colorpicker",
				"heading" => "Static text color",
				"param_name" => "static_color",
				"value" => "#000000",
			),
			array(
				"type" => "textarea",
				"heading" => "Typewriter Text",
				"param_name" => "text",
				"description" => "Insert sentences, divided by line break",
				"admin_label" => true
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Period (in ms)',
				'param_name'	=> 'period',
				'std'			=> '1000'
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text color",
				"param_name" => "color",
				"value" => "#000000",
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Typewriter Wrapper',
				'param_name'	=> 'wrapper',
				'std'			=> 'h1',
				'value'			=> array(
						'H1'      => 'h1',
						'H2'      => 'h2',
						'H3'      => 'h3',
						'H4'      => 'h4',
						'H5'      => 'h5',
						'H6'      => 'h6',
						'SPAN'    => 'span',
						'DIV'     => 'div',
						'Custom'  => 'custom'
				)
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Custom wrapper',
				'param_name'	=> 'wrapper_custom',
				'std'			=> '',
				'dependency' => array(
					'element' => 'wrapper',
					'value' => 'custom',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Typewriter Wrapper Class',
				'param_name'	=> 'wrapper_class',
				'value'			=> array(
						'---'      => '',
					$google_web_font_family_1      => 'google_web_font_1',
					$google_web_font_family_2      => 'google_web_font_2',
					$google_web_font_family_3      => 'google_web_font_3',
					$google_web_font_family_4      => 'google_web_font_4',
						'Custom'  => 'custom'
				)
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Custom wrapper class',
				'param_name'	=> 'wrapper_class_custom',
				'std'			=> '',
				'dependency' => array(
					'element' => 'wrapper_class',
					'value' => 'custom',
				),
			),
			
        ),

) );

// Vertical Text
vc_map( array(
        "name" => "Vertical Text",
        "base" => "brankic_vertical",
        "content_element" => true,
		"category" => 'Brankic Typography',
		"icon" => "brankic-vc-extension-icon icon-software-font-vertical-scale",
        "show_settings_on_create" => true,
        "params" => array(
            array(
				"type" => "textarea_html",
				"heading" => "Vertical Text",
				"param_name" => "content",
				'admin_label'	=> true,
			),
			array(
                "type" => "dropdown",
                "heading" => "Horizontal align",
                "param_name" => "horizontal_align",
				"std"		=> "text-align-left",
                "value" => array(
                    "Left"      => "text-align-left",
                    "Center"    => "text-align-center",
					"Right" 	=> "text-align-right"
                ),
				'save_always' => true,
            ),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Title font size',
				'param_name'	=> 'h_size',
				'std'			=> '',
				'value'			=> array("---" => "",
										"60px" => "60px",
										"50px" => "50px",
										"40px" => "40px",
										"30px" => "30px",
										"20px" => "20px",
										"15px" => "15px",
										"Inherit" => "inherit",
										"Custom" => "custom")
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Custom Title font size',
				'param_name'	=> 'h_size_custom',
				'dependency' 	=> array(
						'element' 	=> 'h_size',
						'value' 	=> 'custom',
				),
				
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Title font weight',
				'param_name'	=> 'h_weight',
				'std'			=> '',
				'value'			=> array("---" => "",
											"Normal" => "normal",
											"9 0 0" => "900",
											"8 0 0" => "800",
											"7 0 0" => "700",
											"6 0 0" => "600",
											"5 0 0" => "500",
											"4 0 0" => "400",
											"3 0 0" => "300",
											"2 0 0" => "200",
											"1 0 0" => "100",
											"Inherit" => "inherit")
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Title font style',
				'param_name'	=> 'h_style',
				'std'			=> '',
				'value'			=> array("---" => "",
										"Normal" => "normal",
										"Italic" => "italic",
										"Oblique" => "oblique",
										"Inherit" => "inherit")
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Title text transform',
				'param_name'	=> 'h_transform',
				'std'			=> '',
				'value'			=> array("---" => "",
										"None" => "none",
										"Capitalize" => "capitalize",
										"Uppercase" => "uppercase",
										"Lowercase" => "lowercase",
										"Inherit" => "inherit")
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Title letter spacing',
				'param_name'	=> 'h_spacing',
				'std'			=> '',
				'value'			=> array("---" => "",
										"0px" => "0px",
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
										"Inherit" => "inherit",
										"Custom" => "custom")
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Title custom letter spacing',
				'param_name'	=> 'h_spacing_custom',
				'dependency' 	=> array(
						'element' 	=> 'h_spacing',
						'value' 	=> 'custom',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Title line height',
				'param_name'	=> 'h_height',
				'std'			=> '',
				"value" 		=> $font_height_array,
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Title custom line height',
				'param_name'	=> 'h_height_custom',
				'dependency' 	=> array(
						'element' 	=> 'h_height',
						'value' 	=> 'custom',
				),
				
			),
			array(
				"type" => "checkbox",
				"heading" => "Disable on tablet",
				"param_name" => "tablet_disable",
				"value" => array("" => "true"),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> 'Unique ID suffix',
				'param_name'	=> 'unique'
			),			
        ),

) );


// WOW WRAPPER
class WPBakeryShortCode_Brankic_Wow_Wrapper extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        'name' => 'WOW Wrapper',
        'base' => 'brankic_wow_wrapper',
        "content_element" => true,
        'category' => 'Brankic',
        'icon' => 'brankic-vc-extension-icon brankic-vc-extension-default-icon',
        'allowed_container_element' => 'vc_row',
		"as_parent" => array('except' => 'vc_row'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "js_view" => 'VcColumnView',
        'params' => array(
			array(
				"type" => "dropdown",
				"heading" => "WOW Effect",
				"param_name" => "wow_effect",
				"value" => $wow_array,
				'admin_label'	=> true
			),
			array(
				"type" => "dropdown",
				"heading" => "WOW effect delay",
				"param_name" => "wow_delay",
				"value" => array(
					"0.1s" 	=> "0.1s",
					"0.3s" 	=> "0.3s",
					"0.5s" 	=> "0.5s",
					"1s" 	=> "1s",
					"1.5s" 	=> "1.5s",
					"2s" 	=> "2s",
					"3s" 	=> "3s",
					"4s" 	=> "4s"
				),
			),
            
        )
) );




// don't forget to add base to brankic_shortcodes.php		








}