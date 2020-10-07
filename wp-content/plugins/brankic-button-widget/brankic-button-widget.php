<?php
/*
Plugin Name: Brankic Button Widget 
Plugin URI: http://www.brankic1979.com
Description: Button just like shortcode
Author: Brankic1979
Version: 3.1
Author URI: http://www.brankic1979.com/
*/

// Register and load the widget
function brankic_button_load_widget() {
    register_widget( 'brankic_button_widget' );
}
add_action( 'widgets_init', 'brankic_button_load_widget' );
 
// Creating the widget 
class brankic_button_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'brankic_button_widget', 
 
// Widget name will appear in UI
__('Brankic Button Widget', 'brankic_button_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Showing buttons in widget', 'brankic_button_widget_domain' ), ) 
);

// Css rules for Color Picker
wp_enqueue_style( 'wp-color-picker' );
// Register javascript
add_action('admin_enqueue_scripts', array( $this, 'enqueue_admin_js' ) );
}

/**
 * Function that will add javascript file for Color Piker.
 */
public function enqueue_admin_js() { 
     
    // Make sure to add the wp-color-picker dependecy to js file
    wp_enqueue_script( 'brankic_button_custom_js', plugins_url( 'brankic.custom.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  );
}
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$size = $instance['size'];
$button_text = $instance['button_text'];
$shape = $instance['shape'];
$hover = $instance['hover'];
$text_color = $instance['text_color'];
$arrow_color = $instance['arrow_color'];
$bg_color = $instance['bg_color'];
$bg_color_2 = $instance['bg_color_2'];
$border_color = $instance['border_color'];
$border_color_2 = $instance['border_color_2'];
$text_hover_color = $instance['text_hover_color'];
$arrow_hover_color = $instance['arrow_hover_color'];
$bg_hover_color = $instance['bg_hover_color'];
$bg_hover_color_2 = $instance['bg_hover_color_2'];
$border_hover_color = $instance['border_hover_color'];
$border_hover_color_2 = $instance['border_hover_color_2'];
$hover_movement = $instance['hover_movement'];
$url = $instance['url'];
$shadow_color = $instance['shadow_color'];
$shadow_hover_color = $instance['shadow_hover_color'];

if ($border_color != "" || $border_color_2 != "") {
	$data_border = '[data-border="true"]'; 
	$data_border_html = 'data-border="true"';
} else {
	$data_border = "";
	$data_border_html = "";
}
if ($bg_color != "" || $bg_color_2 != "") {
	$data_bg = '[data-bg-color="true"]'; 
	$data_bg_html = 'data-bg-color="true"';
} else { 
	$data_bg = "";
	$data_bg_html = "";
}
if ($bg_hover_color != "" || $bg_hover_color_2 != "") {
	$data_bg_hover_html = 'data-bg-color-hover="true"';
} else { 
	$data_bg_hover_html = "";
}

//$brankic_button_id = 'brankic_button_' . brankic_string_to_class($instance);
$brankic_button_id = $this->id . '_brankic_button';

if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
	$circle_text = $button_text;		
} else {
	$circle_text = "";
}
	
if ($shape == "button-circle arrow-link") $button_text = '<i class="fa fa-angle-right"></i>';
if ($shape == "button-circle play") $button_text = '<i class="fa fa-play"></i>';





if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
	$html =  '<a href="' . $url . '" class="brankic_button ' . $shape . ' ' . $size . '" ' . $data_border_html . ' ' . $data_bg_html . ' ' . $data_bg_hover_html . ' id="' . $brankic_button_id . '">';
	$html .= '<span class="circle-bg ' . $hover . '">' . $button_text . '</span>';		
} else {
	$html =  '<a href="' . $url . '" class="brankic_button ' . $shape . ' ' . $hover . ' ' . $size . '" ' . $data_border_html . ' ' . $data_bg_html . ' ' . $data_bg_hover_html . ' id="' . $brankic_button_id . '">';
	$html .= '<span>' . $button_text . '</span>';
}

if ($circle_text != "") $html .= '<span class="text-button">' . $circle_text . '</span>';

$html .= '</a>'; 

 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

echo $html;

echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ];else $title = "";
if ( isset( $instance[ 'button_text' ] ) ) $button_text = $instance[ 'button_text' ];else {$button_text = "Discover more"; $instance[ 'button_text' ] = "Discover more";};
if ( isset( $instance[ 'size' ] ) ) $size = $instance[ 'size' ];else {$size = "medium"; $instance[ 'size' ] = "medium";};
if ( isset( $instance[ 'shape' ] ) ) $shape = $instance[ 'shape' ];else {$shape = ""; $instance[ 'shape' ] = "rectangle";};
if ( isset( $instance[ 'hover' ] ) ) $hover = $instance[ 'hover' ];else {$hover = "normal"; $instance[ 'hover' ] = "normal";};
if ( isset( $instance[ 'text_color' ] ) ) $text_color = $instance[ 'text_color' ];else {$text_color = ""; $instance[ 'text_color' ] = "";};
if ( isset( $instance[ 'arrow_color' ] ) ) $arrow_color = $instance[ 'arrow_color' ]; else { $arrow_color = "inherit"; $instance[ 'arrow_color' ] = "inherit";};

if ( isset( $instance[ 'bg_color' ] ) ) $bg_color = $instance[ 'bg_color' ]; else { $bg_color = ""; $instance[ 'bg_color' ] = "";};
if ( isset( $instance[ 'bg_color_2' ] ) ) $bg_color_2 = $instance[ 'bg_color_2' ];else {$bg_color_2 = ""; $instance[ 'bg_color_2' ] = "";};
if ( isset( $instance[ 'border_color' ] ) ) $border_color = $instance[ 'border_color' ];else {$border_color = ""; $instance[ 'border_color' ] = "";};
if ( isset( $instance[ 'border_color_2' ] ) ) $border_color_2 = $instance[ 'border_color_2' ];else {$border_color_2 = ""; $instance[ 'border_color_2' ] = "";};
if ( isset( $instance[ 'text_hover_color' ] ) ) $text_hover_color = $instance[ 'text_hover_color' ];else {$text_hover_color = ""; $instance[ 'text_hover_color' ] = "";};
if ( isset( $instance[ 'arrow_hover_color' ] ) ) $arrow_hover_color = $instance[ 'arrow_hover_color' ];else {$arrow_hover_color = ""; $instance[ 'arrow_hover_color' ] = "";};
if ( isset( $instance[ 'bg_hover_color' ] ) ) $bg_hover_color = $instance[ 'bg_hover_color' ];else {$bg_hover_color = ""; $instance[ 'bg_hover_color' ] = "";};
if ( isset( $instance[ 'bg_hover_color_2' ] ) ) $bg_hover_color_2 = $instance[ 'bg_hover_color_2' ];else {$bg_hover_color_2 = ""; $instance[ 'bg_hover_color_2' ] = "";};
if ( isset( $instance[ 'border_hover_color' ] ) ) $border_hover_color = $instance[ 'border_hover_color' ];else {$border_hover_color = ""; $instance[ 'border_hover_color' ] = "";};
if ( isset( $instance[ 'border_hover_color_2' ] ) ) $border_hover_color_2 = $instance[ 'border_hover_color_2' ];else {$border_hover_color_2 = ""; $instance[ 'border_hover_color_2' ] = "";};
if ( isset( $instance[ 'hover_movement' ] ) ) $hover_movement = $instance[ 'hover_movement' ];else {$hover_movement = ""; $instance[ 'hover_movement' ] = "";};
if ( isset( $instance[ 'url' ] ) ) $url = $instance[ 'url' ];else {$url = ""; $instance[ 'url' ] = "";};
if ( isset( $instance[ 'shadow_color' ] ) ) $shadow_color = $instance[ 'shadow_color' ];else {$shadow_color = ""; $instance[ 'shadow_color' ] = "";};
if ( isset( $instance[ 'shadow_hover_color' ] ) ) $shadow_hover_color = $instance[ 'shadow_hover_color' ];else {$shadow_hover_color = ""; $instance[ 'shadow_hover_color' ] = "";};

//$brankic_brand_icons_id = 'brankic_brand_icons_' . brankic_string_to_class($instance);
//$brankic_brand_icons_id = $this->id . '_brankic_brand_icons';
$brankic_button_id = $this->id . '_brankic_button';

$inline_bg_color = '';
		if ($bg_color_2 != "" && $bg_color != "") $inline_bg_color = 'background:linear-gradient(120deg, ' . $bg_color . ' 0%, ' . $bg_color_2 . ' 100%);';
		if ($bg_color_2 == "" && $bg_color != "") $inline_bg_color = 'background:' . $bg_color . ';'; 

		$inline_border_color = '';
		if ($border_color_2 != "" && $border_color != "") $inline_border_color = 'border-image:linear-gradient(120deg, ' . $border_color . ' 0%, ' . $border_color_2 . ' 100%);';
		if ($border_color_2 == "" && $border_color != "") $inline_border_color = 'border-color:' . $border_color . ';'; 
		
		$inline_bg_hover_color = "";
		if ($bg_hover_color_2 != "" && $bg_hover_color != "") $inline_bg_hover_color = 'background:linear-gradient(120deg, ' . $bg_hover_color . ' 0%, ' . $bg_hover_color_2 . ' 100%);';  
		if ($bg_hover_color_2 == "" && $bg_hover_color != "") $inline_bg_hover_color = 'background:' . $bg_hover_color . ';'; 
		
		$inline_border_hover_color = '';
		if ($border_hover_color_2 != "" && $border_hover_color != "") $inline_border_hover_color = 'border-image:linear-gradient(120deg, ' . $border_hover_color . ' 0%, ' . $border_hover_color_2 . ' 100%);';
		if ($border_hover_color_2 == "" && $border_hover_color != "") $inline_border_hover_color = 'border-color:' . $border_hover_color . ';';
		
		if ($text_hover_color != "") $inline_text_hover_color = 'color:' . $text_hover_color . ';'; else $inline_text_hover_color = "";
		if ($arrow_hover_color != "") $inline_arrow_hover_color = 'color:' . $arrow_hover_color . ';'; else $inline_arrow_hover_color = "";
		
		$hover_movement_inline = "";
		if ($hover_movement == "up") $hover_movement_inline = '-webkit-transform: translateY(-4px); transform: translateY(-4px);';
		if ($hover_movement == "down") $hover_movement_inline = '-webkit-transform: translateY(4px); transform: translateY(4px);';
		
		if ($shadow_color != "") $shadow_color_inline = 'box-shadow: 0 15px 40px ' . $shadow_color . ';'; else $shadow_color_inline = "";
		
		if ($shadow_hover_color != "") $shadow_hover_color_inline = 'box-shadow: 0 15px 40px ' . $shadow_hover_color . ';'; else $shadow_hover_color_inline = "";
		
		//$brankic_button_id = 'brankic_button_' . brankic_string_to_class($shortcode_atts);
		
		$button_style = "";
		

		if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
			if ($arrow_color != "") $button_style .= ' #' . $brankic_button_id . ' span.circle-bg{color:' . $arrow_color . ';}';
			if ($text_color != "") $button_style .= ' #' . $brankic_button_id . '{color:' . $text_color . ';}';
			$button_style .= ' #' . $brankic_button_id . ' span.circle-bg{' . $inline_bg_color . ';' . $inline_border_color . ' ' . $shadow_color_inline . '}';
			$button_style .= ' #' . $brankic_button_id . ' span.circle-bg:after{' . $inline_bg_color . ';}';		
		} else {
			if ($text_color != "") $button_style .= ' #' . $brankic_button_id . '{color:' . $text_color . ';}';
			$button_style .= ' #' . $brankic_button_id . '{' . $inline_bg_color . ';' . $inline_border_color . ' ' . $shadow_color_inline . '}';
			$button_style .= ' #' . $brankic_button_id . ':after{' . $inline_bg_color . ';}';
		}
		
		
		if ($hover == "dir-ltr" || $hover == "dir-rtl" || $hover == "dir-ttb" || $hover == "dir-btt") {
			
			
			if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
				
				$button_style .= ' #' . $brankic_button_id . ' span.circle-bg:hover{' . $inline_arrow_hover_color . ' ' . $inline_border_hover_color . ' ' . $hover_movement_inline . ' ' . $shadow_hover_color_inline . '}';
				$button_style .= ' #' . $brankic_button_id . ' span:hover{' . $inline_text_hover_color . '}';
			
			
				if ($bg_hover_color_2 != "") {
					$button_style .= ' #' . $brankic_button_id . ' span.circle-bg:after, #' . $brankic_button_id . ' span.circle-bg:hover:after{' . $inline_bg_hover_color . '}';
				} else {
					$button_style .= ' #' . $brankic_button_id . ' span.circle-bg:after, #' . $brankic_button_id . ' span.circle-bg:hover:after{' . $inline_bg_hover_color . '}';
				}
			
			} else {
				$button_style .= ' #' . $brankic_button_id . ':hover{' . $inline_text_hover_color . ' ' . $inline_border_hover_color . ' ' . $hover_movement_inline . ' ' . $shadow_hover_color_inline . '}';
			
				if ($bg_hover_color_2 != "") {
					$button_style .= ' #' . $brankic_button_id . ':after, #' . $brankic_button_id . ':hover:after{' . $inline_bg_hover_color . '}';
				} else {
					$button_style .= ' #' . $brankic_button_id . ':after, #' . $brankic_button_id . ':hover:after{' . $inline_bg_hover_color . '}';
				}

			}
			
		}

		if ($hover == "normal") {
			
			if ($shape == "button-circle arrow-link" || $shape == "button-circle play") {
				$button_style .= ' #' . $brankic_button_id . ' span.circle-bg:hover{' . $inline_arrow_hover_color . ' ' . $inline_border_hover_color . ' ' . $hover_movement_inline . ' ' . $shadow_hover_color_inline . ' ' . $inline_bg_hover_color . '}';
			
			} else {
				$button_style .= ' #' . $brankic_button_id . ':hover{' . $inline_text_hover_color . ' ' . $inline_border_hover_color . ' ' . $hover_movement_inline . ' ' . $shadow_hover_color_inline . ' ' . $inline_bg_hover_color . '}';
			}
			
		}
	
	if ($button_style != ""){
		update_option( $brankic_button_id, $button_style );
	}
	

?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
					   name="<?php echo $this->get_field_name( 'title' ); ?>"  
					   value="<?php echo esc_attr( $title ); ?>" 
					   type="text"/>
</p>




	<p data-id="<?php echo $this->get_field_id('shape'); ?>">
        <label for="<?php echo $this->get_field_id('shape'); ?>"><?php _e( 'Button Shape:' ); ?></label>
          <select name="<?php echo $this->get_field_name('shape'); ?>" 
                  id="<?php echo $this->get_field_id('shape'); ?>"
				  class="widefat">

				<option <?php if ($shape == 'rectangle') echo 'selected="selected"' ?> value="rectangle">Rectangle</option>
				<option <?php if ($shape == 'radius') echo 'selected="selected"' ?> value="radius">Rounded</option>
				<option <?php if ($shape == 'button-circle play') echo 'selected="selected"' ?> value="button-circle play">Circle Play</option>
				<option <?php if ($shape == 'button-circle arrow-link') echo 'selected="selected"' ?> value="button-circle arrow-link">Circle Arrow</option>

          </select> 
        
    </p>
	
	<p>
		<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e( 'Text on button: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('button_text'); ?>"
				name="<?php echo $this->get_field_name('button_text'); ?>"
				value="<?php echo $button_text; ?>"
				class="widefat"/>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e( 'URL: ' ); ?></label>
		<input id="<?php echo $this->get_field_id('url'); ?>"
				name="<?php echo $this->get_field_name('url'); ?>"
				value="<?php echo $url; ?>"
				class="widefat"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('size'); ?>">
        <label for="<?php echo $this->get_field_id('size'); ?>"><?php _e( 'Button size:' ); ?></label>
          <select name="<?php echo $this->get_field_name('size'); ?>" 
                  id="<?php echo $this->get_field_id('size'); ?>"
				  class="widefat">

				<option <?php if ($size == 'small') echo 'selected="selected"' ?> value="small">Small</option>
				<option <?php if ($size == 'medium') echo 'selected="selected"' ?> value="medium">Medium</option>
				<option <?php if ($size == 'large') echo 'selected="selected"' ?> value="large">Large</option>
				<option <?php if ($size == 'xl') echo 'selected="selected"' ?> value="xl">XL</option>

          </select>        
    </p>
	
	<p data-id="<?php echo $this->get_field_id('hover'); ?>">
        <label for="<?php echo $this->get_field_id('hover'); ?>"><?php _e( 'Hover options:' ); ?></label>
          <select name="<?php echo $this->get_field_name('hover'); ?>" 
                  id="<?php echo $this->get_field_id('hover'); ?>"
				  class="widefat">

				<option <?php if ($hover == 'normal') echo 'selected="selected"' ?> value="normal">Normal</option>
				<option <?php if ($hover == 'none') echo 'selected="selected"' ?> value="none">None</option>
				<option <?php if ($hover == 'dir-ltr') echo 'selected="selected"' ?> value="dir-ltr">Left to Right</option>
				<option <?php if ($hover == 'dir-rtl') echo 'selected="selected"' ?> value="dir-rtl">Right to Left</option>
				<option <?php if ($hover == 'dir-ttb') echo 'selected="selected"' ?> value="dir-ttb">Top to Bottom</option>
				<option <?php if ($hover == 'dir-btt') echo 'selected="selected"' ?> value="dir-btt">Bottom to Top</option>

          </select>        
    </p>
	
	<p data-id="<?php echo $this->get_field_id('text_color'); ?>">
		<label for="<?php echo $this->get_field_id('text_color'); ?>"><?php _e( 'Text Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('text_color'); ?>"
			   name="<?php echo $this->get_field_name('text_color'); ?>"
			   value="<?php echo $text_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('arrow_color'); ?>">
		<label for="<?php echo $this->get_field_id('arrow_color'); ?>"><?php _e( 'Arrow Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('arrow_color'); ?>"
			   name="<?php echo $this->get_field_name('arrow_color'); ?>"
			   value="<?php echo $arrow_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('text_hover_color'); ?>">
		<label for="<?php echo $this->get_field_id('text_hover_color'); ?>"><?php _e( 'Text hover Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('text_hover_color'); ?>"
			   name="<?php echo $this->get_field_name('text_hover_color'); ?>"
			   value="<?php echo $text_hover_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('arrow_hover_color'); ?>">
		<label for="<?php echo $this->get_field_id('arrow_hover_color'); ?>"><?php _e( 'Arrow hover Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('arrow_hover_color'); ?>"
			   name="<?php echo $this->get_field_name('arrow_hover_color'); ?>"
			   value="<?php echo $arrow_hover_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('bg_color'); ?>">
		<label for="<?php echo $this->get_field_id('bg_color'); ?>"><?php _e( 'Background Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('bg_color'); ?>"
			   name="<?php echo $this->get_field_name('bg_color'); ?>"
			   value="<?php echo $bg_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('bg_color_2'); ?>">
		<label for="<?php echo $this->get_field_id('bg_color_2'); ?>"><?php _e( 'Background Color 2:' ); ?></label>
		<input id="<?php echo $this->get_field_id('bg_color_2'); ?>"
			   name="<?php echo $this->get_field_name('bg_color_2'); ?>"
			   value="<?php echo $bg_color_2; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('bg_hover_color'); ?>">
		<label for="<?php echo $this->get_field_id('bg_hover_color'); ?>"><?php _e( 'Background hover Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('bg_hover_color'); ?>"
			   name="<?php echo $this->get_field_name('bg_hover_color'); ?>"
			   value="<?php echo $bg_hover_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('bg_hover_color_2'); ?>">
		<label for="<?php echo $this->get_field_id('bg_hover_color_2'); ?>"><?php _e( 'Background hover Color 2:' ); ?></label>
		<input id="<?php echo $this->get_field_id('bg_hover_color_2'); ?>"
			   name="<?php echo $this->get_field_name('bg_hover_color_2'); ?>"
			   value="<?php echo $bg_hover_color_2; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('border_color'); ?>">
		<label for="<?php echo $this->get_field_id('border_color'); ?>"><?php _e( 'Border Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('border_color'); ?>"
			   name="<?php echo $this->get_field_name('border_color'); ?>"
			   value="<?php echo $border_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('border_hover_color'); ?>">
		<label for="<?php echo $this->get_field_id('border_hover_color'); ?>"><?php _e( 'Border hover Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('border_hover_color'); ?>"
			   name="<?php echo $this->get_field_name('border_hover_color'); ?>"
			   value="<?php echo $border_hover_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('border_hover_color_2'); ?>">
		<label for="<?php echo $this->get_field_id('border_hover_color_2'); ?>"><?php _e( 'Border hover Color 2:' ); ?></label>
		<input id="<?php echo $this->get_field_id('border_hover_color_2'); ?>"
			   name="<?php echo $this->get_field_name('border_hover_color_2'); ?>"
			   value="<?php echo $border_hover_color_2; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('shadow_color'); ?>">
		<label for="<?php echo $this->get_field_id('shadow_color'); ?>"><?php _e( 'Shadow Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('shadow_color'); ?>"
			   name="<?php echo $this->get_field_name('shadow_color'); ?>"
			   value="<?php echo $shadow_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('shadow_hover_color'); ?>">
		<label for="<?php echo $this->get_field_id('shadow_hover_color'); ?>"><?php _e( 'Shadow hover Color:' ); ?></label>
		<input id="<?php echo $this->get_field_id('shadow_hover_color'); ?>"
			   name="<?php echo $this->get_field_name('shadow_hover_color'); ?>"
			   value="<?php echo $shadow_hover_color; ?>"
			   type="text"
			   class="widefat brankic-button-color-picker"/>
	</p>
	
	<p data-id="<?php echo $this->get_field_id('hover_movement'); ?>">
        <label for="<?php echo $this->get_field_id('hover_movement'); ?>"><?php _e( 'Hover movement:' ); ?></label>
          <select name="<?php echo $this->get_field_name('hover_movement'); ?>" 
                  id="<?php echo $this->get_field_id('hover_movement'); ?>"
				  class="widefat">

				<option <?php if ($hover_movement == '') echo 'selected="selected"' ?> value="">None</option>
				<option <?php if ($hover_movement == 'down') echo 'selected="selected"' ?> value="down">Down</option>
				<option <?php if ($hover_movement == 'up') echo 'selected="selected"' ?> value="up">Up</option>

          </select>        
    </p>
		






<?php 
}


     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	//add_action('admin_enqueue_scripts', array( $this, 'enqueue_admin_js' ) );
	//wp_enqueue_script( 'brankic_custom_js', plugins_url( 'brankic.custom.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  );
	
//add_action( 'widgets_init', 'brankic_button_load_widget' );
	
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['shape'] = ( ! empty( $new_instance['shape'] ) ) ? strip_tags( $new_instance['shape'] ) : 'rectangle';
$instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : 'Discover more';
$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '#';
$instance['size'] = ( ! empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : 'medium';
$instance['hover'] = ( ! empty( $new_instance['hover'] ) ) ? strip_tags( $new_instance['hover'] ) : 'normal';
$instance['text_color'] = ( ! empty( $new_instance['text_color'] ) ) ? strip_tags( $new_instance['text_color'] ) : '';
$instance['arrow_color'] = ( ! empty( $new_instance['arrow_color'] ) ) ? strip_tags( $new_instance['arrow_color'] ) : '';
$instance['text_hover_color'] = ( ! empty( $new_instance['text_hover_color'] ) ) ? strip_tags( $new_instance['text_hover_color'] ) : '';
$instance['arrow_hover_color'] = ( ! empty( $new_instance['arrow_hover_color'] ) ) ? strip_tags( $new_instance['arrow_hover_color'] ) : '';
$instance['bg_color'] = ( ! empty( $new_instance['bg_color'] ) ) ? strip_tags( $new_instance['bg_color'] ) : '';
$instance['bg_color_2'] = ( ! empty( $new_instance['bg_color_2'] ) ) ? strip_tags( $new_instance['bg_color_2'] ) : '';
$instance['bg_hover_color'] = ( ! empty( $new_instance['bg_hover_color'] ) ) ? strip_tags( $new_instance['bg_hover_color'] ) : '';
$instance['bg_hover_color_2'] = ( ! empty( $new_instance['bg_hover_color_2'] ) ) ? strip_tags( $new_instance['bg_hover_color_2'] ) : '';
$instance['border_color'] = ( ! empty( $new_instance['border_color'] ) ) ? strip_tags( $new_instance['border_color'] ) : '';
$instance['border_color_2'] = ( ! empty( $new_instance['border_color_2'] ) ) ? strip_tags( $new_instance['border_color_2'] ) : '';
$instance['border_hover_color'] = ( ! empty( $new_instance['border_hover_color'] ) ) ? strip_tags( $new_instance['border_hover_color'] ) : '';
$instance['border_hover_color_2'] = ( ! empty( $new_instance['border_hover_color_2'] ) ) ? strip_tags( $new_instance['border_hover_color_2'] ) : '';
$instance['shadow_color'] = ( ! empty( $new_instance['shadow_color'] ) ) ? strip_tags( $new_instance['shadow_color'] ) : '';
$instance['shadow_hover_color'] = ( ! empty( $new_instance['shadow_hover_color'] ) ) ? strip_tags( $new_instance['shadow_hover_color'] ) : '';
$instance['hover_movement'] = ( ! empty( $new_instance['hover_movement'] ) ) ? strip_tags( $new_instance['hover_movement'] ) : '';
return $instance;
}
} // Class brankic_button_widget ends here