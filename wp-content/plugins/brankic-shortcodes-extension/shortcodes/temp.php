<?php
/*** Overlap Text ***/
vc_map( array(
    "name" => "Overlap text",
    "base" => "brankic_overlap_text",
    "category" => 'Brankic',
    "icon" => "brankic-vc-extension-icon brankic-vc-extension-default-icon",
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
					'DIV'     => 'div',
					'Custom'  => 'custom'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Front Title Wrapper',
			'param_name'	=> 'title_front_wrapper_custom',
			'std'			=> '',
			'dependency' => array(
				'element' => 'title_front_wrapper',
				'value'   => 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Front Title Class',
			'param_name'	=> 'title_front_wrapper_class',
			'std'			=> '',
			'value'			=> array(
					'None'         			 => '',
					'Google Web Font 1'      => 'google_web_font_1',
					'Google Web Font 2'      => 'google_web_font_2',
					'Google Web Font 3'      => 'google_web_font_3',
					'Google Web Font 4'      => 'google_web_font_4',
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
					'DIV'     => 'div',
					'Custom'  => 'custom'
			)
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Custom Behind Title Wrapper',
			'param_name'	=> 'title_behind_wrapper_custom',
			'std'			=> '',
			'dependency' => array(
				'element' => 'title_behind_wrapper',
				'value'   => 'custom',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Behind Title Class',
			'param_name'	=> 'title_behind_wrapper_class',
			'std'			=> '',
			'value'			=> array(
					'None'         			 => '',
					'Google Web Font 1'      => 'google_web_font_1',
					'Google Web Font 2'      => 'google_web_font_2',
					'Google Web Font 3'      => 'google_web_font_3',
					'Google Web Font 4'      => 'google_web_font_4',
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
    )
) );