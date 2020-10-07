<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * @var $row_content_color
 * @var $row_content_width
 * @var $row_svg_mask_shape
 * @var $custom_row_svg_mask_shape 
 * @var $row_svg_mask_fill_color
 * @var $row_svg_mask_height
 * @var $row_svg_mask_position // if top, check for top padding, if bottom, check for bottom padding
 * @var $row_brankic_bg_image
 * @var $
 * @var $row_bg_repeat
 * @var $row_bg_size
 * @var $use_gradient_bg
 * @var $row_gradient_direction
 * @var $row_bg_color_1
 * @var $row_bg_color_2
 * @var $row_bg_color_3
 * @var $row_bg_color_4
 * @var $change_header_colors
 * @var $change_menu_new_color
 * @var $wow_effect
 * @var $wow_delay
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = "";
$parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = $row_content_width = '';
$top_row_svg_mask_shape = $custom_top_row_svg_mask_shape = $top_row_svg_mask_color = $top_row_svg_mask_height = $wow_effect = $wow_delay = '';
$bottom_row_svg_mask_shape = $custom_bottom_row_svg_mask_shape = $bottom_row_svg_mask_color = $bottom_row_svg_mask_height = '';
$row_content_color = $row_brankic_bg_image = $row_brankic_bg_image_extra = $brankic_parallax = $file_picker = $file_picker_extra = $poster = $brankic_row_height = $brankic_grid = $brankic_grid_color = $poster_extra = '';
$row_bg_align = $use_gradient_bg = $row_gradient_direction = $row_bg_color_1 = $row_bg_color_2 = $row_bg_color_3 = $row_bg_color_4 = $change_header_colors = $change_menu_new_color = $bg_attachment = '';
$row_bg_repeat = "no-repeat";
$row_bg_size = "cover";
$disable_element = $columns_mirror = '';
$output = $after_output = '';
$duotone = $duotone_custom = $duotone_gradient = $duotone_custom_2 = $duotone_custom_3 = "";
$duotone_gradient_direction	= "to top right";

$attributes = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $attributes );

$brankic_id = 'brankic_vc_row_' . brankic_string_to_class($atts);

if (brankic_check_css_id($brankic_id)) $brankic_id_html = 'id="' . $brankic_id . '"'; else $brankic_id_html = "";

if ($brankic_parallax == "true") $brankic_parallax = "parallax"; else $brankic_parallax = "";
 
wp_register_style( 'brankic-dummy', plugin_dir_url( __FILE__ ) . "/css/brankic_dummy_style.css");
$data_wow_class = "";
$data_wow_delay = "";
if ($wow_effect != "" && $wow_effect != "---") {
	wp_enqueue_style( 'myriadwp-animate', plugin_dir_url( __FILE__ ) . '../../css/animate.min.css' );
	wp_enqueue_script( 'myriadwp-wow', plugin_dir_url( __FILE__ ) . '../../javascript/wow.min.js', array('jquery'), '1.0.0', true );
	$data_wow_class = 'data-wow="wow ' . $wow_effect . '"';
	$data_wow_delay = 'data-wow-step-delay="' . $wow_delay . '"';
}
	
if (substr_count($css, "margin:") > 0 || substr_count($css, "padding:") > 0 || substr_count($css, "margin-left:") > 0 || substr_count($css, "margin-right:") > 0 || substr_count($css, "padding-left:") > 0 || substr_count($css, "padding-right:") > 0) $row_spacing = true; 
else $row_spacing = false;

if ($css != "" && (strpos($css, 'rgba') !== false) && (strpos($css, 'url') !== false)){
	$old_rgba_start_pos = strpos($css, 'rgba');
	$old_rgba_end_pos = strpos($css, ')', $old_rgba_start_pos);
	
	$old_rgba = substr($css, $old_rgba_start_pos, $old_rgba_end_pos - $old_rgba_start_pos + 1);
	$new_rgba = 'linear-gradient(' . $old_rgba . ', ' . $old_rgba . '),';
	
	$brankic_bg_css = str_replace($old_rgba, $new_rgba, $css);
	
	wp_enqueue_style( 'brankic-dummy' );
	wp_add_inline_style( 'brankic-dummy', $brankic_bg_css );
}

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$top_html_shape = $bottom_html_shape = "";

if ($top_row_svg_mask_shape == "v") $top_html_shape = '<div class="svg-shape mask svg-v" style="height:' . $top_row_svg_mask_height . ';">
                       	    	<svg class="" fill="' . $top_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                                	<path d="M 0 0 L 0 150 L 500 0 L 1000 150 L 1000 0 Z"></path>
                                </svg>
                        	</div>';

if ($top_row_svg_mask_shape == "v-triple") $top_html_shape = '<div class="svg-shape mask svg-v-triple" style="height:' . $top_row_svg_mask_height . ';">
                       	    	<svg class="" fill="' . $top_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                                	<path d="M 0 0 L 0 150 L 500 0 L 1000 150 L 1000 0 Z"></path>
                                	<path d="M 0 0 L 0 200 L 500 0 L 1000 200 L 1000 0 Z"></path>
                                	<path d="M 0 0 L 0 250 L 500 0 L 1000 250 L 1000 0 Z"></path>
                                </svg>
                        	</div>';

if ($top_row_svg_mask_shape == "check") $top_html_shape = '<div class="svg-shape mask svg-check" style="height:' . $top_row_svg_mask_height . ';">
                       	    	<svg class="" fill="' . $top_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                                	<path d="M 1000 0 L 1000 300 L 200 45 C 155 33 200 33 0 200 L 0 0 L 1000 0 "></path>
                                </svg>
                        	</div>';

if ($top_row_svg_mask_shape == "slope-triple") $top_html_shape = '<div class="svg-shape mask svg-slope-triple" style="height:' . $top_row_svg_mask_height . ';">
                                <svg class="" fill="' . $top_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
                                    <path d="M 1000 0 L 1000 0 L 0 200 L 0 0 L 1000 0"></path>
                                    <path d="M 1000 0 L 1000 0 L 0 250 L 0 0 L 1000 0"></path>
                                    <path d="M 1000 0 L 1000 0 L 0 300 L 0 0 L 1000 0"></path>
                                </svg>
                            </div>';

if ($top_row_svg_mask_shape == "slope") $top_html_shape = '<div class="svg-shape mask svg-slope" style="height:' . $top_row_svg_mask_height . ';">
                                <svg class="" fill="' . $top_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
                                    <path d="M 1000 0 L 1000 0 L 0 300 L 0 0 L 1000 0"></path>
                                </svg>
                            </div>';

if ($top_row_svg_mask_shape == "wave") $top_html_shape = '<div class="svg-shape mask svg-one-wave" style="height:' . $top_row_svg_mask_height . ';">
                                <svg class="" fill="' . $top_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
                                    <path d="M 0 300 L 0 0 L 1000 0 L 1000 150 C 500 300 500 0 0 150 Z"></path>
                                </svg>
                            </div>';

if ($top_row_svg_mask_shape == "convex") $top_html_shape = '<div class="svg-shape mask svg-convex" style="height:' . $top_row_svg_mask_height . ';"> 
                                <svg class="" fill="' . $top_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
                                    <path d="M 0 300 L 0 0 L 1000 0 L 1000 300 Q 500 0 0 300 Z"></path>
                                </svg>
                            </div>';

if ($top_row_svg_mask_shape == "zigzag") $top_html_shape = '<div class="svg-shape mask svg-zigzag" style="height:' . $top_row_svg_mask_height . ';">
                                <svg class="" fill="' . $top_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none"> 
                                  	
                                  	<path d="M 1000 0 L 1000 0 L 0 0 L 0 220 L 280 150 L 790 300 L 1000 240"></path>
                                  	<path d="M 1000 0 L 1000 0 L 0 0 L 0 220 L 280 170 L 790 300 L 1000 260"></path>
                                </svg>
                            </div>';

if ($top_row_svg_mask_shape == "custom") $top_html_shape = $custom_top_row_svg_mask_shape; 							
							
							
if ($bottom_row_svg_mask_shape == "v") $bottom_html_shape = '<div class="svg-shape mask svg-v bottom" style="height:' . $bottom_row_svg_mask_height . ';">
                       	    	<svg class="" fill="' . $bottom_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                                	<path d="M 0 300 L 0 150 L 500 300 L 1000 150 L 1000 300 Z"></path>
                                </svg>
                        	</div>';

if ($bottom_row_svg_mask_shape == "v-triple") $bottom_html_shape = '<div class="svg-shape mask svg-v-triple bottom" style="height:' . $bottom_row_svg_mask_height . ';">
                       	    	<svg class="" fill="' . $bottom_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                                	<path d="M 0 300 L 0 150 L 500 300 L 1000 150 L 1000 300 Z"></path>
                                	<path d="M 0 300 L 0 100 L 500 300 L 1000 100 L 1000 300 Z"></path>
                                	<path d="M 0 300 L 0 50 L 500 300 L 1000 50 L 1000 300 Z"></path>
                                </svg>
                        	</div>';

if ($bottom_row_svg_mask_shape == "check") $bottom_html_shape = '<div class="svg-shape mask svg-check bottom" style="height:' . $bottom_row_svg_mask_height . ';">
                       	    	<svg class="" fill="' . $bottom_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
                                		<path d="M 1000 300 L 1000 0 L 200 255 C 155 267 200 277 0 100 L 0 300 L 1000 300 "></path>
                                </svg>
                        	</div>';

if ($bottom_row_svg_mask_shape == "slope-triple") $bottom_html_shape = '<div class="svg-shape mask svg-slope-triple bottom" style="height:' . $bottom_row_svg_mask_height . ';">
                                <svg class="" fill="' . $bottom_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
                            		<path d="M 0 300 L 1000 100 L 1000 300 L 0 300"></path>
                                    <path d="M 0 300 L 1000 50 L 1000 300 L 0 300"></path>
                                    <path d="M 0 300 L 1000 0 L 1000 300 L 0 300"></path>
                            	</svg>
                            </div>';

if ($bottom_row_svg_mask_shape == "slope") $bottom_html_shape = '<div class="svg-shape mask svg-one-slope bottom" style="height:' . $bottom_row_svg_mask_height . ';">
                                <svg class="" fill="' . $bottom_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
                                    <path d="M 0 300 L 1000 0 L 1000 300 L 0 300"></path>
                            	</svg>
                            </div>';

if ($bottom_row_svg_mask_shape == "wave") $bottom_html_shape = '<div class="svg-shape mask svg-one-wave bottom" style="height:' . $bottom_row_svg_mask_height . ';">
                                <svg class="" fill="' . $bottom_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
                                    <path d="M 0 300 L 0 300 L 1000 300 L 1000 150 C 500 300 500 0 0 150 Z"></path>
                                    		
                            	</svg>
                            </div>';

if ($bottom_row_svg_mask_shape == "concave") $bottom_html_shape = '<div class="svg-shape mask svg-concave bottom" style="height:' . $bottom_row_svg_mask_height . ';"> 
                                <svg class="" fill="' . $bottom_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
                                    <path d="M 0 0 L 0 300 L 1000 300 L 1000 0 Q 500 300 0 0 Z"></path>
                                </svg>
                            </div>';

if ($bottom_row_svg_mask_shape == "zigzag") $bottom_html_shape = '<div class="svg-shape mask svg-zigzag bottom" style="height: ' . $bottom_row_svg_mask_height . ';">
                                <svg class="" fill="' . $bottom_row_svg_mask_fill_color . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none"> 
                                  	<path d="M 1000 60 L 1000 300 L 0 300 L 0 80 L 280 150 L 790 0 L 1000 60 "></path>
                                  	<path d="M 1000 60 L 1000 300 L 0 300 L 0 80 L 280 130 L 790 0 L 1000 40 "></path>
                                </svg>
                            </div> 
                                  ';

					
if ($bottom_row_svg_mask_shape == "custom") $bottom_html_shape = $custom_bottom_row_svg_mask_shape; 



$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
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
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_row-has-fill';
}

$data_border_radius = "";

if ( vc_shortcode_custom_css_has_property( $css, array('border-radius') ) ) $data_border_radius = 'data-border_radius="true"';

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height boxes-equal-height';
			wp_enqueue_script( 'brankic-shortcodes-custom');
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height boxes-equal-height';
	wp_enqueue_script( 'brankic-shortcodes-custom');
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$css_classes[] = $columns_mirror;

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

if ($change_header_colors == true) $change_header_colors = " change_header_colors"; else $change_header_colors = "";

$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . $change_header_colors . ' ' . $brankic_row_height . '"';

if ($row_spacing) $data_spacing = ' data-row_spacing="true"'; else $data_spacing = "";

if ($row_content_color != "") $row_content_color = 'color:' . $row_content_color . ';';

$data_grid = "";


if ($brankic_grid_color != "") $brankic_grid_color = 'border-color:' . $brankic_grid_color . ';';
if ($brankic_grid != "") $data_grid = 'data-grid="' . $brankic_grid . '" data-add_col_border_wrap="true"'; 

wp_enqueue_script( 'brankic-shortcodes-custom', plugin_dir_url( __FILE__ ) . '../../javascript/brankic-shortcodes-custom.js', array('jquery'), '1.0.0', false );

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' style="' . $row_content_color . $brankic_grid_color . '"' . $data_spacing . ' ' . $data_grid . ' ' . $data_border_radius . ' ' . $data_wow_class . ' ' . $data_wow_delay . ' ' . $brankic_id_html . '>';

$header_style =  brankic_global_or_local("header_style");

if (in_array('data-vc-stretch-content="true"', $wrapper_attributes) && ($header_style == "lateral-toggle-flex" || $header_style == "lateral-toggle-left" || $header_style == "lateral-left")) {
	$output .= '<div class="lateral_fix_wrapper">';
}

$body_border =  brankic_of_get_option("body_border", brankic_of_get_default("body_border"));
$body_side_border =  brankic_of_get_option("body_side_border", brankic_of_get_default("body_side_border"));

$body_border_data = "";

if ($body_border == "yes" || $body_side_border == "yes"){
	$body_border_width =  brankic_of_get_option("body_border_width", brankic_of_get_default("body_border_width"));
	
	if ($body_side_border == "yes") $body_border_data = 'data-side-border="true" data-site-border-width="' . $body_border_width . '"';
	if ($body_border == "yes") $body_border_data = 'data-site-border="true" data-site-border-width="' . $body_border_width . '"';
}


if (in_array('data-vc-stretch-content="true"', $wrapper_attributes) && ($header_style == "default") && ($body_border == "yes" || $body_side_border == "yes")) {
	$output .= '<div class="site-border-wrapper" ' . $body_border_data . '>';
}

$data_inview_bg_color = "";

$brankic_row_gradient_css = "";
if ($use_gradient_bg == "true") {
	
	if ($row_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
	
	if ($row_bg_color_3 == "" && $row_bg_color_4 == "") {
		$brankic_row_gradient_css .= 'background: ' . $direction . '(' . $row_gradient_direction . ', ' . $row_bg_color_1 . ' , ' . $row_bg_color_2 . ');';
	}
	if ($row_bg_color_3 != "" && $row_bg_color_4 == "") {
		$brankic_row_gradient_css .= 'background: ' . $direction . '(' . $row_gradient_direction . ', ' . $row_bg_color_1 . ' , ' . $row_bg_color_2 . ', ' . $row_bg_color_3 . ');';
	}
	if ($row_bg_color_3 != "" && $row_bg_color_4 != "") {
		$brankic_row_gradient_css .= 'background: ' . $direction . '(' . $row_gradient_direction . ', ' . $row_bg_color_1 . ' , ' . $row_bg_color_2 . ', ' . $row_bg_color_3 . ', ' . $row_bg_color_4 . ');';	
	}
} else {
	
	if ($row_bg_color_1 != "") {
		$brankic_row_gradient_css .= 'background:' . $row_bg_color_1 . ';';
		$data_inview_bg_color = 'data-inview="true" data-background-color="' . $row_bg_color_1 . '"';
	}
}

if ($brankic_row_gradient_css != "" || $row_brankic_bg_image != "" || $row_brankic_bg_image_extra != "" || $file_picker != "" || $file_picker_extra != ""){
	
if ($duotone_custom != "" && $duotone == "custom") 	$duotone = 'duotone single-color';	

$output .=	'				<div class="row-bg-wrap">
								<div class="inner-wrap ' . $duotone . '">'; 
							
if ($row_brankic_bg_image != "" || $row_brankic_bg_image_extra != "") {
	if (is_numeric($row_brankic_bg_image)) {
		if (wp_attachment_is_image( $row_brankic_bg_image )){
			$imageSrc = wp_get_attachment_image_src($row_brankic_bg_image, 'original');
			if( $imageSrc ) $row_brankic_bg_image = $imageSrc[0];
		} else $row_brankic_bg_image = "";
	}
	if ($row_brankic_bg_image_extra != "") $row_brankic_bg_image = $row_brankic_bg_image_extra;
	if ($bg_attachment != "") $bg_attachment_style = 'background-attachment: fixed;'; else $bg_attachment_style = "";
	if ($row_brankic_bg_image != "") $output .=	'									<div class="row-bg background-image ' . $brankic_parallax . ' ' . $row_bg_align . '" style="background-image: url(' . $row_brankic_bg_image . '); background-repeat:' . $row_bg_repeat . ';background-size:' . $row_bg_size . '; ' . $bg_attachment_style . '"></div>';
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


	
if ($brankic_row_gradient_css != "") {
	$output .=	'<div class="row-bg background-color" style="' . $brankic_row_gradient_css . '" ' . $data_inview_bg_color . '></div>';
}

$output .=	'								</div> 
							</div>';
}

if ($top_html_shape != "") $output .= $top_html_shape;
if ($bottom_html_shape != "") $output .= $bottom_html_shape;

if ($row_content_width != "") $output .= '<div class="' . $row_content_width . '">';
$output .= wpb_js_remove_wpautop( $content );
if ($row_content_width != "") $output.= '</div>';
if (in_array('data-vc-stretch-content="true"', $wrapper_attributes) && ($header_style == "lateral-toggle-flex" || $header_style == "lateral-toggle-left" || $header_style == "lateral-left")) {
	$output .= '</div> <!--lateral_fix_wrapper-->';
}
if (in_array('data-vc-stretch-content="true"', $wrapper_attributes) && ($header_style == "default")  && ($body_border == "yes" || $body_side_border == "yes")) {
	$output .= '</div> <!--site-border-wrapper-->';
}
$output .= '</div>';
$output .= $after_output;

echo $output;
