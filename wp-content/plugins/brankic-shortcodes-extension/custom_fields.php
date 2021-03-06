<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_custom-fields-for-pages',
		'title' => 'Custom Fields for Pages',
		'fields' => array (
			array (
				'key' => 'field_59c43641f2a56',
				'label' => 'Default margin',
				'name' => 'default_margin',
				'type' => 'select',
				'choices' => array (
					'auto' => 'auto',
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
					'margin-400' => '400px',
					'custom' => 'Custom',
				),
				'default_value' => 'auto',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c4398ffef49',
				'label' => 'Default top margin ',
				'name' => 'default_top_margin',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c43641f2a56',
							'operator' => '==',
							'value' => 'custom',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
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
					'margin-400' => '400px',
				),
				'default_value' => 'margin-50',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c43a97a6e7d',
				'label' => 'Default bottom margin',
				'name' => 'default_bottom_margin',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c43641f2a56',
							'operator' => '==',
							'value' => 'custom',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
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
					'margin-400' => '400px',
				),
				'default_value' => 'margin-50',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c43ae40eff3',
				'label' => 'Default padding',
				'name' => 'default_padding',
				'type' => 'select',
				'choices' => array (
					'padding-0' => '0px',
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
					'padding-400' => '400px',
					'custom' => 'Custom',
				),
				'default_value' => 'padding-50',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c43b4c0eff4',
				'label' => 'Default top padding',
				'name' => 'default_top_padding',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c43ae40eff3',
							'operator' => '==',
							'value' => 'custom',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'padding-0' => '0px',
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
					'padding-400' => '400px',
				),
				'default_value' => 'padding-50',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c43b710eff5',
				'label' => 'Default right padding',
				'name' => 'default_right_padding',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c43ae40eff3',
							'operator' => '==',
							'value' => 'custom',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'padding-0' => '0px',
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
					'padding-400' => '400px',
				),
				'default_value' => 'padding-50',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c43bd60eff6',
				'label' => 'Default bottom padding',
				'name' => 'default_bottom_padding',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c43ae40eff3',
							'operator' => '==',
							'value' => 'custom',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'padding-0' => '0px',
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
					'padding-400' => '400px',
				),
				'default_value' => 'padding-50',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c43bfd0eff7',
				'label' => 'Default left padding',
				'name' => 'default_left_padding',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c43ae40eff3',
							'operator' => '==',
							'value' => 'custom',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'padding-0' => '0px',
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
					'padding-400' => '400px',
				),
				'default_value' => 'padding-50',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59df5ddc0138b',
				'label' => 'Page content width',
				'name' => 'page_content_width',
				'type' => 'select',
				'choices' => array (
					'fullwidth' => 'Fullwidth',
					'1440px' => '1440 px',
					'1280px' => '1280 px',
					'1000px' => '1000 px',
				),
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
