<?php

add_action( 'vc_load_default_templates_action','my_custom_template_for_vc_myriadXY' ); // Hook in
 
function my_custom_template_for_vc_myriadXY() {
	
	$names = array("" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "",
				"" => "");
	
	$brankic_template[""] = '';

	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';

	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';
	
	$brankic_template[""] = '';

foreach($names as $key => $value){
	$template_thumbs[$key] = "http://brankic1979demo.com/downloads/templates/" . $key . ".jpg"; 
}



foreach($brankic_template as $name => $template) {
	
	
	
	$data               = array();
    $data['name']       =  'MyriadXY ' . $names[$name]; 
    $data['weight']     = 0; 
    $data['custom_class'] = 'brankic_template_for_vc_custom_template bra_myriadXY';
	$data['image_path'] = preg_replace( '/\s/', '%20', $template_thumbs[$name] ); 
	$data['content']    = 	$template;

    vc_add_default_templates( $data );
	
}
	

}