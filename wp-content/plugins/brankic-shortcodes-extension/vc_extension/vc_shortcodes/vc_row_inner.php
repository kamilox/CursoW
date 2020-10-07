<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$el_class = $equal_height = $content_placement = $css = $el_id = $row_content_color = $row_inner_brankic_bg_image = $row_inner_brankic_bg_image_extra = $brankic_parallax = $file_picker = $poster = $brankic_row_inner_height = $gap = '';
$row_inner_bg_align = $use_gradient_bg = $row_inner_gradient_direction = $row_inner_bg_color_1 = $row_inner_bg_color_2 = $row_inner_bg_color_3 = $row_inner_bg_color_4 = $poster_extra = $wow_effect = $wow_delay = $bg_attachment = '';
$row_inner_bg_repeat = "no-repeat";
$row_inner_bg_size = "cover"; 
$disable_element = $brankic_grid = $brankic_grid_color = '';
$output = $after_output = $columns_mirror = '';
$duotone = $duotone_custom = $duotone_gradient = $duotone_custom_2 = $duotone_custom_3 = "";
$duotone_gradient_direction	= "to top right";

$attributes = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $attributes );

$brankic_id = 'brankic_vc_row_inner_' . brankic_string_to_class($atts);

if (brankic_check_css_id($brankic_id)) $brankic_id_html = 'id="' . $brankic_id . '"'; else $brankic_id_html = "";

if ($brankic_parallax == "true") $brankic_parallax = "parallax"; else $brankic_parallax = "";

$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_inner',
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_row-has-fill';
}

$data_wow_class = "";
$data_wow_delay = "";
if ($wow_effect != "" && $wow_effect != "---") {
	wp_enqueue_style( 'myriadwp-animate', plugin_dir_url( __FILE__ ) . '../../css/animate.min.css' );
	wp_enqueue_script( 'myriadwp-wow', plugin_dir_url( __FILE__ ) . '../../javascript/wow.min.js', array('jquery'), '1.0.0', true );
	$data_wow_class = 'data-wow="wow ' . $wow_effect . '"';
	$data_wow_delay = 'data-wow-step-delay="' . $wow_delay . '"';
}

$data_border_radius = "";

if ( vc_shortcode_custom_css_has_property( $css, array('border-radius') ) ) $data_border_radius = 'data-border_radius="true"';

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

$css_classes[] = $columns_mirror;

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . ' ' . $brankic_row_inner_height . '"';

if ($row_inner_content_color != "") $row_inner_content_color = 'color:' . $row_inner_content_color . ';';

if ($brankic_grid_color != "") $brankic_grid_color = 'border-color:' . $brankic_grid_color . ';';

$data_grid = "";

if ($brankic_grid != "") $data_grid = 'data-grid="' . $brankic_grid . '" data-add_col_border_wrap="true"';

wp_enqueue_script( 'brankic-shortcodes-custom', plugin_dir_url( __FILE__ ) . '../../javascript/brankic-shortcodes-custom.js', array('jquery'), '1.0.0', false );

$output .= '<div ' . $brankic_id_html . ' ' . implode( ' ', $wrapper_attributes ) . ' style="' . $row_inner_content_color . $brankic_grid_color . '" ' . $data_grid . ' ' . $data_border_radius . ' ' . $data_wow_class . ' ' . $data_wow_delay . '>';

$brankic_row_inner_gradient_css = "";
if ($use_gradient_bg == "true") {
	
	if ($row_inner_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
	
	if ($row_inner_bg_color_3 == "" && $row_inner_bg_color_4 == "") {
		$brankic_row_inner_gradient_css .= 'background: ' . $direction . '(' . $row_inner_gradient_direction . ', ' . $row_inner_bg_color_1 . ' , ' . $row_inner_bg_color_2 . ');';
	}
	if ($row_inner_bg_color_3 != "" && $row_inner_bg_color_4 == "") {
		$brankic_row_inner_gradient_css .= 'background: ' . $direction . '(' . $row_inner_gradient_direction . ', ' . $row_inner_bg_color_1 . ' , ' . $row_inner_bg_color_2 . ', ' . $row_inner_bg_color_3 . ');';
	}
	if ($row_inner_bg_color_3 != "" && $row_inner_bg_color_4 != "") {
		$brankic_row_inner_gradient_css .= 'background: ' . $direction . '(' . $row_inner_gradient_direction . ', ' . $row_inner_bg_color_1 . ' , ' . $row_inner_bg_color_2 . ', ' . $row_inner_bg_color_3 . ', ' . $row_inner_bg_color_4 . ');';	
	}
} else {
	
	if ($row_inner_bg_color_1 != "") $brankic_row_inner_gradient_css .= 'background:' . $row_inner_bg_color_1 . ';';
}

if ($brankic_row_inner_gradient_css != "" || $row_inner_brankic_bg_image != "" || $row_inner_brankic_bg_image_extra != "" || $file_picker != "" || $duotone != ""){
	
if ($duotone_custom != "" && $duotone == "custom") 	$duotone = 'duotone single-color';	

$output .=	'				<div class="row-bg-wrap">
								<div class="inner-wrap ' . $duotone . '">'; 
								
if ($row_inner_brankic_bg_image != "" || $row_inner_brankic_bg_image_extra != "") {
	if (is_numeric($row_inner_brankic_bg_image)) {
		if (wp_attachment_is_image( $row_inner_brankic_bg_image )){
			$imageSrc = wp_get_attachment_image_src($row_inner_brankic_bg_image, 'original');
			if( $imageSrc ) $row_inner_brankic_bg_image = $imageSrc[0];
		} else $row_inner_brankic_bg_image = "";
	}
	if ($row_inner_brankic_bg_image_extra != "") $row_inner_brankic_bg_image = $row_inner_brankic_bg_image_extra;
	if ($bg_attachment != "") $bg_attachment_style = 'background-attachment: fixed'; else $bg_attachment_style = "";
	if ($row_inner_brankic_bg_image != "") $output .=	'									<div class="row-bg background-image ' . $brankic_parallax . ' ' . $row_inner_bg_align . '" style="background-image: url(' . $row_inner_brankic_bg_image . '); background-repeat:' . $row_inner_bg_repeat . ';background-size:' . $row_inner_bg_size . '; ' . $bg_attachment_style . '"></div>';
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

	
if ($brankic_row_inner_gradient_css != "") $output .=	'									<div class="row-bg background-color" style="' . $brankic_row_inner_gradient_css . ';"></div>';

$output .=	'								</div> 
							</div>';
}



$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= $after_output;

echo $output;
