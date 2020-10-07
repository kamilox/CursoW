<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * $var $sticky
 * $var $brankic_centered
 * $var $content_align
 * $var $shadow_color
 * $var $offset_direction
 * $var $offset_width
 * @var $column_content_color
 * @var $use_gradient_bg
 * @var $row_gradient_direction
 * @var $row_bg_color_1
 * @var $row_bg_color_2
 * @var $row_bg_color_3
 * @var $row_bg_color_4 
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $css = $offset = $css_animation = $sticky = $responsive_sticky = $brankic_centered = $brankic_centered_tablet = $content_align = $content_align_tablet = $shadow_color = $offset_direction = $offset_width = '';
$use_gradient_bg = $column_content_color = $column_brankic_bg_image = $column_brankic_bg_image_extra = $brankic_parallax = $file_picker = $file_picker_extra = $poster = $brankic_column_height = $poster_extra = $wow_effect = $wow_delay = $wow_step_delay = $wow_behaviour = '';
$column_bg_align = $use_gradient_bg = $column_gradient_direction = $column_bg_color_1 = $column_bg_color_2 = $column_bg_color_3 = $column_bg_color_4 = $brankic_column_inner_height = $bg_attachment = '';
$column_bg_repeat = "no-repeat";
$column_bg_size = "cover";
$output = $disable_offset = '';
$duotone = $duotone_custom = $duotone_gradient = $duotone_custom_2 = $duotone_custom_3 = "";
$duotone_gradient_direction	= "to top right";
$tilt = $tilt_glare = $tilt_floating = $tilt_scale = $tilt_disable_y = $tilt_disable_x = "";
$tilt_perspective = "1000";
$tilt_speed	= "300";
$tilt_glare_value = "0.5";

$attributes = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $attributes );

$brankic_id = 'brankic_vc_column_' . brankic_string_to_class($atts);

if ($el_id != "") $brankic_id = $el_id;

if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		$tilt_script .= '$("#' . $brankic_id . '").tilt({';
		
		if ($tilt_perspective) $tilt_script .= 'perspective: ' . $tilt_perspective . ',';
		if ($tilt_speed) $tilt_script .= 'speed: ' . $tilt_speed . ',';
		if ($tilt_glare) $tilt_script .= 'glare: true,maxGlare: ' . $tilt_glare_value . ',';
		if ($tilt_floating) $tilt_script .= 'reset: false,';
		if ($tilt_scale) $tilt_script .= 'scale: ' . $tilt_scale . ',';
		if ($tilt_disable_y) $tilt_script .= 'axis: "x",';
		if ($tilt_disable_x) $tilt_script .= 'axis: "y",';
		
		$tilt_script .= '})';
		$tilt_script .= '})';
		wp_add_inline_script( 'tilt-jquery', $tilt_script );
	}

if (brankic_string_to_class($atts) != 0 && brankic_check_css_id($brankic_id)) {
	$brankic_id_html = 'id="' . $brankic_id . '"';
} else {
	$brankic_id_html = '';
}





if ($brankic_parallax == "true") $brankic_parallax = "parallax"; else $brankic_parallax = "";

if ($wow_behaviour == "column"){
	$data_wow_delay = "";
	if ($wow_effect != "" && $wow_effect != "---") {
		wp_enqueue_style( 'myriadwp-animate', plugin_dir_url( __FILE__ ) . '../../css/animate.min.css' );
		wp_enqueue_script( 'myriadwp-wow', plugin_dir_url( __FILE__ ) . '../../javascript/wow.min.js', array('jquery'), '1.0.0', true );
		$data_wow_delay = 'data-wow-delay="' . $wow_delay . '"';	
		$inline_script = 'jQuery(document).ready(function($) { wow_bra = new WOW(); wow_bra.init(); })';
		wp_add_inline_script( 'wow', $inline_script );
		$wow_effect = "wow " . $wow_effect;	
	}
}
if ($wow_behaviour == "elements"){
	$data_wow_class = "";
	$data_wow_delay = "";
	if ($wow_effect != "" && $wow_effect != "---") {
		wp_enqueue_style( 'myriadwp-animate', plugin_dir_url( __FILE__ ) . '../../css/animate.min.css' );
		wp_enqueue_script( 'myriadwp-wow', plugin_dir_url( __FILE__ ) . '../../javascript/wow.min.js', array('jquery'), '1.0.0', true );
		$data_wow_class = 'data-wow="wow ' . $wow_effect . '"';
		$data_wow_step_delay = 'data-wow-step-delay="' . $wow_step_delay . '"';
	}
}

if ($brankic_centered == "true") $brankic_centered = "auto";
if ($brankic_centered_tablet == "true") $brankic_centered_tablet = "auto_tablet";

if (substr_count($css, "margin:") > 0 || substr_count($css, "padding:") > 0 || substr_count($css, "margin-left:") > 0 || substr_count($css, "margin-right:") > 0 || substr_count($css, "padding-left:") > 0 || substr_count($css, "padding-right:") > 0) $column_spacing = true; 
else $column_spacing = false;

if ($column_spacing) $data_spacing = ' data-column_spacing="true"'; else $data_spacing = '';

	$id = "";

	
	$sticky_class = "";
	//$sticky = "";//////////////////////////////////////////////////////// promeni
	if ($sticky == "true") {
		$sticky_class_child = " ";
		$sticky_class_parent = " sticky-element";
		//wp_enqueue_script( 'brankic-sticky-kit-column');
	} else {
		$sticky_class_child = "";
		$sticky_class_parent = "";
	}
	
	if ($responsive_sticky == "true") {
		$responsive_sticky_class_parent = " not_responsive_sticky";
		//wp_enqueue_script( 'brankic-sticky-kit-column');
	} else {
		$responsive_sticky_class_parent = " ";
	}

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_col-has-fill';
}

$css_classes[] = $brankic_centered; 
$css_classes[] = $brankic_centered_tablet; 

$wrapper_attributes = array();

if ($offset_direction != "") $offset_class = $offset_direction . ' ' . $offset_width; else $offset_class = "";
if ($disable_offset != "") $disable_offset_class = 'tablet-disable'; else $disable_offset_class = "";

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );

if ($wow_effect != "" && $wow_effect != "---"){
	
	if ($wow_behaviour == "elements") $wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . $sticky_class_parent . $responsive_sticky_class_parent . ' ' . $offset_class . ' ' . $disable_offset_class . ' ' . $brankic_column_inner_height . '" ' . $data_wow_class . ' ' . $data_wow_step_delay;

	if ($wow_behaviour == "column") $wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . $sticky_class_parent . $responsive_sticky_class_parent . ' ' . $offset_class . ' ' . $disable_offset_class . ' ' . $brankic_column_inner_height . ' ' . $wow_effect . '" ' . $data_wow_delay;
	
} else {
	
	$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . $sticky_class_parent . $responsive_sticky_class_parent . ' ' . $offset_class . ' ' . $disable_offset_class . ' ' . $brankic_column_inner_height . '"';
	
}





if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if ($column_content_color != "") $column_content_color = 'color:' . $column_content_color . ';';

$output .= '<div ' . $brankic_id_html . ' ' . implode( ' ', $wrapper_attributes ) . ' ' . $data_spacing . ' style="' . $column_content_color . '">';

$brankic_column_gradient_css = "";
if ($use_gradient_bg == "true") {
	
	if ($column_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
	
	if ($column_bg_color_3 == "" && $column_bg_color_4 == "") {
		$brankic_column_gradient_css .= 'background: ' . $direction . '(' . $column_gradient_direction . ', ' . $column_bg_color_1 . ' , ' . $column_bg_color_2 . ');';
	}
	if ($column_bg_color_3 != "" && $column_bg_color_4 == "") {
		$brankic_column_gradient_css .= 'background: ' . $direction . '(' . $column_gradient_direction . ', ' . $column_bg_color_1 . ' , ' . $column_bg_color_2 . ', ' . $column_bg_color_3 . ');';
	}
	if ($column_bg_color_3 != "" && $column_bg_color_4 != "") {
		$brankic_column_gradient_css .= 'background: ' . $direction . '(' . $column_gradient_direction . ', ' . $column_bg_color_1 . ' , ' . $column_bg_color_2 . ', ' . $column_bg_color_3 . ', ' . $column_bg_color_4 . ');';	
	}
} else {
	
	if ($column_bg_color_1 != "") $brankic_column_gradient_css .= 'background:' . $column_bg_color_1 . ';';
}



if ($shadow_color != "") {
	$shadow_color_inline_style = 'style="box-shadow: 0px 0px 40px 0px ' . $shadow_color . '"';
	$shadow_color_class = 'box-shadow';
} else {
	$shadow_color_inline_style = '';
	$shadow_color_class = '';
}

$data_border_radius = "";

if ( vc_shortcode_custom_css_has_property( $css, array('border-radius') ) ) $data_border_radius = 'data-border_radius="true"';


$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . $sticky_class_child . ' ' . $shadow_color_class . ' ' . $brankic_column_height . '" ' . $shadow_color_inline_style . ' ' . $data_border_radius . '>';

if ($brankic_column_gradient_css != "" || $column_brankic_bg_image != "" || $column_brankic_bg_image_extra != "" || $file_picker != "" || $file_picker_extra != ""){
	
if ($duotone_custom != "" && $duotone == "custom") 	$duotone = 'duotone single-color';	

$output .=	'				<div class="row-bg-wrap">
								<div class="inner-wrap ' . $duotone . '">'; 
								
if ($column_brankic_bg_image != "" || $column_brankic_bg_image_extra != "") {
	if (is_numeric($column_brankic_bg_image)) {
		if (wp_attachment_is_image( $column_brankic_bg_image )){
			$imageSrc = wp_get_attachment_image_src($column_brankic_bg_image, 'original');
			if( $imageSrc ) $column_brankic_bg_image = $imageSrc[0];
		} else $column_brankic_bg_image = "";
	}
	if ($column_brankic_bg_image_extra != "") $column_brankic_bg_image = $column_brankic_bg_image_extra;
	if ($bg_attachment != "") $bg_attachment_style = 'background-attachment: fixed'; else $bg_attachment_style = "";
	if ($column_brankic_bg_image != "") $output .=	'									<div class="row-bg background-image ' . $brankic_parallax . ' ' . $column_bg_align . '" style="background-image: url(' . $column_brankic_bg_image . '); background-repeat:' . $column_bg_repeat . ';background-size:' . $column_bg_size . '; ' . $bg_attachment_style . '"></div>';
}

if ($file_picker != "" || $file_picker_extra != "") {
	
	if ($file_picker_extra != ""){
		$file_url = $file_picker_extra;
		$file_mime_type = "video/mp4";
	} else {	
		$file_url = wp_get_attachment_url( $file_picker);
		$file_metadata = wp_get_attachment_metadata($file_picker);
		$file_mime_type = $file_metadata["mime_type"];
	}
	
	if (is_numeric($poster)) {
		$poster = wp_get_attachment_image_src($poster, 'full');
		if( $poster ) $poster_url = $poster[0];
	}
	if ($poster_extra != "") $poster_url = $poster_extra;
	
	if (substr($file_mime_type, 0, 5) == "video") {
		
		$poster_html = 'poster="' . $poster_url . '"';
		if ($poster_url == "") $poster_html = "";
		$file_mime_type = "video/mp4";
	
	$output .= '              <div class="row-bg background-video">';
    $output .= '                  <video class="" preload="auto" autoplay loop="loop" muted="muted" ' . $poster_html . '>';	
    $output .= '                            <source src="' . $file_url . '" type="' . $file_mime_type . '">';
    $output .= '                            Your browser does not support the video tag.
                                    </video>
                                </div><!--END ROW-BG BACKGROUND-VIDEO-->';
	}
	
	
}


	
if ($brankic_column_gradient_css != "") $output .=	'									<div class="row-bg background-color" style="' . $brankic_column_gradient_css . ';"></div>';

$output .=	'								</div> 
							</div>';
}

$output .= '<div class="wpb_wrapper ' . $content_align . ' ' . $content_align_tablet . '">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
