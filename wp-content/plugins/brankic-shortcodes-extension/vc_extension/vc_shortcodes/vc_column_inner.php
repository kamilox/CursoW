<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $width
 * @var $css
 * @var $offset
 * $var $offset_direction
 * $var $offset_width
 * @var $content - shortcode content
 * @var $centered
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_Inner
 */
$el_class = $width = $el_id = $css =  $sticky = $responsive_sticky = $offset = $centered = $centered_tablet = $shadow_color = $column_inner_content_color = $column_inner_brankic_bg_image = $column_inner_brankic_bg_image_extra = $brankic_parallax = $brankic_column_inner_height = $content_align = $content_align_tablet = '';
$column_inner_bg_align = $column_inner_bg_size= $use_gradient_bg = $column_inner_gradient_direction = $column_inner_bg_color_1 = $column_inner_bg_color_2 = $column_inner_bg_color_3 = $column_inner_bg_color_4 = $file_picker = $poster = $poster_extra = $wow_effect = $wow_delay = $wow_step_delay = $wow_behaviour = $bg_attachment = '';
$column_inner_bg_repeat = "no-repeat";
$column_inner_bg_size = "cover"; 
$output = $offset_direction = $offset_width = $disable_offset = '';
$duotone = $duotone_custom = $duotone_gradient = $duotone_custom_2 = $duotone_custom_3 = "";
$duotone_gradient_direction	= "to top right";
$tilt = $tilt_glare = $tilt_floating = $tilt_scale = $tilt_disable_y = $tilt_disable_x = "";
$tilt_perspective = "1000";
$tilt_speed	= "300";
$tilt_glare_value = "0.5";

$attributes = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $attributes );

$brankic_id = 'brankic_vc_column_inner_' . brankic_string_to_class($atts);
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
	$this->getExtraClass( $el_class ),
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

$wrapper_attributes = array();

if ($offset_direction != "") $offset_class = $offset_direction . ' ' . $offset_width; else $offset_class = "";
if ($disable_offset != "") $disable_offset_class = 'tablet-disable'; else $disable_offset_class = "";

if ($centered == "true") $css_classes[] = "auto";
if ($centered_tablet == "true") $css_classes[] = "auto_tablet";

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

if ($column_inner_content_color != "") $column_inner_content_color = 'color:' . $column_inner_content_color . ';';

$output .= '<div ' . $brankic_id_html . ' ' . implode( ' ', $wrapper_attributes ) . ' style="' . $column_inner_content_color . '">';

$brankic_column_inner_gradient_css = "";
if ($use_gradient_bg == "true") {
	
	if ($column_inner_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
	
	if ($column_inner_bg_color_3 == "" && $column_inner_bg_color_4 == "") {
		$brankic_column_inner_gradient_css .= 'background: ' . $direction . '(' . $column_inner_gradient_direction . ', ' . $column_inner_bg_color_1 . ' , ' . $column_inner_bg_color_2 . ');';
	}
	if ($column_inner_bg_color_3 != "" && $column_inner_bg_color_4 == "") {
		$brankic_column_inner_gradient_css .= 'background: ' . $direction . '(' . $column_inner_gradient_direction . ', ' . $column_inner_bg_color_1 . ' , ' . $column_inner_bg_color_2 . ', ' . $column_inner_bg_color_3 . ');';
	}
	if ($column_inner_bg_color_3 != "" && $column_inner_bg_color_4 != "") {
		$brankic_column_inner_gradient_css .= 'background: ' . $direction . '(' . $column_inner_gradient_direction . ', ' . $column_inner_bg_color_1 . ' , ' . $column_inner_bg_color_2 . ', ' . $column_inner_bg_color_3 . ', ' . $column_inner_bg_color_4 . ');';	
	}
} else {
	
	if ($column_inner_bg_color_1 != "") $brankic_column_inner_gradient_css .= 'background:' . $column_inner_bg_color_1 . ';';
}





$data_border_radius = "";

if ($shadow_color != "") {
	$shadow_color_inline_style = 'style="box-shadow:0px 0px 40px 0px ' . $shadow_color . '"';
	$shadow_color_class = 'box-shadow';
} else {
	$shadow_color_inline_style = '';
	$shadow_color_class = '';
}


if ( vc_shortcode_custom_css_has_property( $css, array('border-radius') ) ) $data_border_radius = 'data-border_radius="true"';

$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . ' ' . $brankic_column_inner_height . ' ' . $shadow_color_class . '" ' . $shadow_color_inline_style . ' ' . $data_border_radius . '>';


if ($brankic_column_inner_gradient_css != "" || $column_inner_brankic_bg_image != "" || $column_inner_brankic_bg_image_extra != "" || $file_picker != ""){

if ($duotone_custom != "" && $duotone == "custom") 	$duotone = 'duotone single-color';	

$output .=	'				<div class="row-bg-wrap">
								<div class="inner-wrap ' . $duotone . '">'; 
								
								
if ($column_inner_brankic_bg_image != "" || $column_inner_brankic_bg_image_extra != "") {
	if (is_numeric($column_inner_brankic_bg_image)) {
		if (wp_attachment_is_image( $column_inner_brankic_bg_image )){
			$imageSrc = wp_get_attachment_image_src($column_inner_brankic_bg_image, 'original');
			if( $imageSrc ) $column_inner_brankic_bg_image = $imageSrc[0];
		} else $column_inner_brankic_bg_image = "";
	}
	if ($column_inner_brankic_bg_image_extra != "") $column_inner_brankic_bg_image = $column_inner_brankic_bg_image_extra;
	if ($bg_attachment != "") $bg_attachment_style = 'background-attachment: fixed'; else $bg_attachment_style = "";
	if ($column_inner_brankic_bg_image != "") $output .=	'									<div class="row-bg background-image ' . $brankic_parallax . ' ' . $column_inner_bg_align . '" style="background-image: url(' . $column_inner_brankic_bg_image . '); background-repeat:' . $column_inner_bg_repeat . ';background-size:' . $column_inner_bg_size . '; ' . $bg_attachment_style . '"></div>';
}

if ($file_picker != "") {
	
	$file_url = wp_get_attachment_url( $file_picker);
	$file_metadata = wp_get_attachment_metadata($file_picker);
	$file_mime_type = $file_metadata["mime_type"];
	
	if (is_numeric($poster)) {
		$poster = wp_get_attachment_image_src($poster, 'full');
		if( $poster ) $poster_url = $poster[0];
	}
	if ($poster_extra != "") $poster_url = $poster_extra;
	
	if (substr($file_mime_type, 0, 5) == "video") {
		$file_mime_type = "video/mp4";
		$poster_html = 'poster="' . $poster_url . '"';
		if ($poster_url == "") $poster_html = "";
	
	$output .= '              <div class="row-bg background-video">';
    $output .= '                  <video class="" preload="auto" autoplay loop="loop" muted="muted" ' . $poster_html . '>';	
    $output .= '                            <source src="' . $file_url . '" type="' . $file_mime_type . '">';
    $output .= '                            Your browser does not support the video tag.
                                    </video>
                                </div><!--END ROW-BG BACKGROUND-VIDEO-->';
	}
	
	
}
	
if ($brankic_column_inner_gradient_css != "") $output .=	'									<div class="row-bg background-color" style="' . $brankic_column_inner_gradient_css . ';"></div>';

$output .=	'								</div> 
							</div>';
}


$output .= '<div class="wpb_wrapper ' . $content_align . ' ' . $content_align_tablet . '">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
