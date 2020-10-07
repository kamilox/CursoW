<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $css_animation
 * @var $css
 * @var $highlight_text_color
 * @var $highlight_hover_text_color
 * @var $highlight_background_color_1
 * @var $highlight_background_color_2
 * @var $highlight_hover_background_color_1
 * @var $highlight_hover_background_color_2
 * @var $gradient_text_color_1
 * @var $gradient_text_color_2
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_text
 */
$el_class = $el_id = $css = $css_animation = $gradient_text_color_1 = $gradient_text_color_2 = $unique = "";
$highlight_text_color = $highlight_hover_text_color = $highlight_background_color_1 = $highlight_background_color_2 = $highlight_hover_background_color_1 = $highlight_hover_background_color_2 = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if (brankic_string_to_class($atts) != 0) $brankic_column_text_id = 'brankic_column_text_' . brankic_string_to_class($atts);
else $brankic_column_text_id = '';

if ($unique != "") $brankic_column_text_id = 'brankic_column_text_' . $unique;

if ($brankic_column_text_id != "") $brankic_column_text_id_html = 'id="' . $brankic_column_text_id . '"'; else $brankic_column_text_id_html = "";

$class_to_filter = 'wpb_text_column wpb_content_element ' . $this->getCSSAnimation( $css_animation );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output = '
	<div class="' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrapper_attributes ) . ' ' . $brankic_column_text_id_html . '>
		<div class="wpb_wrapper">
		
			<div class="offset_inner">
			' . wpb_js_remove_wpautop( $content, true ) . '
			</div>
		</div>
	</div>
';
echo $output;
