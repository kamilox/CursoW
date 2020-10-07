<?php 
global $brankic_allowedposttags;
?>

<!-- FOOTER -->
<?php
$footer_style = brankic_of_get_option("footer_style", brankic_of_get_default("footer_style"));
$hide_footer = brankic_of_get_option("hide_footer", brankic_of_get_default("hide_footer"));
$footer_vertical_align = brankic_of_get_option("footer_vertical_align", brankic_of_get_default("footer_vertical_align"));
$footer_2_vertical_align = brankic_of_get_option("footer_2_vertical_align", brankic_of_get_default("footer_2_vertical_align"));
$footer_2_show = brankic_of_get_option("footer_2_show", brankic_of_get_default("footer_2_show"));


$footer_width =  brankic_global_or_local("footer_width");
if ($footer_width == "fullwidth") {
	$fluid_class = "fluid";	
} else {
	$fluid_class = "";
}

$footer_layout = brankic_of_get_option("footer_layout", brankic_of_get_default("footer_layout"));
$footer_layout_array = explode("+", $footer_layout);
$footer_layout_array = array_map('trim', $footer_layout_array);
$footer_text_align = brankic_of_get_option("footer_text_align", brankic_of_get_default("footer_text_align"));


$footer_2_layout = brankic_of_get_option("footer_2_layout", brankic_of_get_default("footer_2_layout"));
$footer_2_layout_array = explode("+", $footer_2_layout);
$footer_2_layout_array = array_map('trim', $footer_2_layout_array);
$footer_2_text_align = brankic_of_get_option("footer_2_text_align", brankic_of_get_default("footer_2_text_align"));

$data_footer_text_align = "";
$data_footer_2_text_align = "";

if ($footer_text_align == "left_center_right") $data_footer_text_align = 'data-footer-text_align="lcr"';
if ($footer_text_align == "left_right") $data_footer_text_align = 'data-footer-text_align="lr"';

if ($footer_2_text_align == "left_center_right") $data_footer_2_text_align = 'data-footer-text_align="lcr"';
if ($footer_2_text_align == "left_right") $data_footer_2_text_align = 'data-footer-text_align="lr"';


$data_footer_columns = "";
$data_footer_2_columns = "";

if ($footer_layout == "1/1") 								$data_footer_columns = 'data-column="1/1"';
if ($footer_layout == "1/2 + 1/2") 							$data_footer_columns = 'data-column="1/2"';
if ($footer_layout == "1/3 + 1/3 + 1/3") 					$data_footer_columns = 'data-column="1/3"';
if ($footer_layout == "1/4 + 1/4 + 1/4 + 1/4") 				$data_footer_columns = 'data-column="1/4"';
if ($footer_layout == "1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6") 	$data_footer_columns = 'data-column="1/6"';
if ($footer_layout == "1/2 + 1/6 + 1/6 + 1/6") 				$data_footer_columns = 'data-column="1/2+1/6"';
if ($footer_layout == "1/6 + 1/6 + 1/6 + 1/2") 				$data_footer_columns = 'data-column="1/2+1/6"';
if ($footer_layout == "1/6 + 5/6") 							$data_footer_columns = 'data-column="1/6+5/6"';
if ($footer_layout == "5/6 + 1/6") 							$data_footer_columns = 'data-column="1/6+5/6"';
if ($footer_layout == "1/6 + 2/3 + 1/6") 					$data_footer_columns = 'data-column="1/6+2/3"';
if ($footer_layout == "2/3 + 1/3") 							$data_footer_columns = 'data-column="1/3+2/3"';
if ($footer_layout == "1/3 + 2/3") 							$data_footer_columns = 'data-column="1/3+2/3"';
if ($footer_layout == "1/4 + 3/4") 							$data_footer_columns = 'data-column="1/4+3/4"';
if ($footer_layout == "3/4 + 1/4") 							$data_footer_columns = 'data-column="1/4+3/4"';
if ($footer_layout == "1/4 + 1/2 + 1/4") 					$data_footer_columns = 'data-column="1/4+1/2"';

if ($footer_2_layout == "1/1") 									$data_footer_2_columns = 'data-column="1/1"';
if ($footer_2_layout == "1/2 + 1/2") 							$data_footer_2_columns = 'data-column="1/2"';
if ($footer_2_layout == "1/3 + 1/3 + 1/3") 						$data_footer_2_columns = 'data-column="1/3"';
if ($footer_2_layout == "1/4 + 1/4 + 1/4 + 1/4") 				$data_footer_2_columns = 'data-column="1/4"';
if ($footer_2_layout == "1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6") 	$data_footer_2_columns = 'data-column="1/6"';
if ($footer_2_layout == "1/2 + 1/6 + 1/6 + 1/6") 				$data_footer_2_columns = 'data-column="1/2+1/6"';
if ($footer_2_layout == "1/6 + 1/6 + 1/6 + 1/2") 				$data_footer_2_columns = 'data-column="1/2+1/6"';
if ($footer_2_layout == "1/6 + 5/6") 							$data_footer_2_columns = 'data-column="1/6+5/6"';
if ($footer_2_layout == "5/6 + 1/6") 							$data_footer_2_columns = 'data-column="1/6+5/6"';
if ($footer_2_layout == "1/6 + 2/3 + 1/6") 						$data_footer_2_columns = 'data-column="1/6+2/3"';
if ($footer_2_layout == "2/3 + 1/3") 							$data_footer_2_columns = 'data-column="1/3+2/3"';
if ($footer_2_layout == "1/3 + 2/3") 							$data_footer_2_columns = 'data-column="1/3+2/3"';
if ($footer_2_layout == "1/4 + 3/4") 							$data_footer_2_columns = 'data-column="1/4+3/4"';
if ($footer_2_layout == "3/4 + 1/4") 							$data_footer_2_columns = 'data-column="1/4+3/4"';
if ($footer_2_layout == "1/4 + 1/2 + 1/4") 						$data_footer_2_columns = 'data-column="1/4+1/2"';


$default_footer_padding =  brankic_of_get_option("default_footer_padding", brankic_of_get_default("default_footer_padding"));
if ($default_footer_padding == "custom") {
	$default_footer_top_padding =  brankic_of_get_option("default_footer_top_padding", brankic_of_get_default("default_footer_top_padding"));	
	$default_footer_right_padding =  brankic_of_get_option("default_footer_right_padding", brankic_of_get_default("default_footer_right_padding"));
	$default_footer_bottom_padding =  brankic_of_get_option("default_footer_bottom_padding", brankic_of_get_default("default_footer_bottom_padding"));
	$default_footer_left_padding =  brankic_of_get_option("default_footer_left_padding", brankic_of_get_default("default_footer_left_padding"));
	
	$default_footer_top_padding = str_replace("padding", "padding-top", $default_footer_top_padding);
	$default_footer_right_padding = str_replace("padding", "padding-right", $default_footer_right_padding);
	$default_footer_bottom_padding = str_replace("padding", "padding-bottom", $default_footer_bottom_padding);
	$default_footer_left_padding = str_replace("padding", "padding-left", $default_footer_left_padding);
	
	$default_footer_padding = "$default_footer_top_padding $default_footer_right_padding $default_footer_bottom_padding $default_footer_left_padding";
}

$default_footer_2_padding =  brankic_of_get_option("default_footer_2_padding", brankic_of_get_default("default_footer_2_padding"));
if ($default_footer_2_padding == "custom") {
	$default_footer_2_top_padding =  brankic_of_get_option("default_footer_2_top_padding", brankic_of_get_default("default_footer_2_top_padding"));	
	$default_footer_2_right_padding =  brankic_of_get_option("default_footer_2_right_padding", brankic_of_get_default("default_footer_2_right_padding"));
	$default_footer_2_bottom_padding =  brankic_of_get_option("default_footer_2_bottom_padding", brankic_of_get_default("default_footer_2_bottom_padding"));
	$default_footer_2_left_padding =  brankic_of_get_option("default_footer_2_left_padding", brankic_of_get_default("default_footer_2_left_padding"));
	
	$default_footer_2_top_padding = str_replace("padding", "padding-top", $default_footer_2_top_padding);
	$default_footer_2_right_padding = str_replace("padding", "padding-right", $default_footer_2_right_padding);
	$default_footer_2_bottom_padding = str_replace("padding", "padding-bottom", $default_footer_2_bottom_padding);
	$default_footer_2_left_padding = str_replace("padding", "padding-left", $default_footer_2_left_padding);
	
	$default_footer_2_padding = "$default_footer_2_top_padding $default_footer_2_right_padding $default_footer_2_bottom_padding $default_footer_2_left_padding";
}

$footer_width_responsive =  brankic_of_get_option("footer_width_responsive", brankic_of_get_default("footer_width_responsive"));
$tablet_footer_class = "";
if ($footer_width_responsive == "yes"){
	$footer_width_responsive_percent =  brankic_of_get_option("footer_width_responsive_percent", brankic_of_get_default("footer_width_responsive_percent"));	
	$tablet_footer_class = $footer_width_responsive_percent;
}

$r1 = brankic_count_footer_sidebars("r1");
$r2 = brankic_count_footer_sidebars("r2");

$lateral_footer_fix_class = "";
$header_style =  brankic_global_or_local("header_style");
if ($header_style == "lateral-toggle-flex" || $header_style == "lateral-toggle-left") $lateral_footer_fix_class = "lateral_fix_wrapper";
if ($header_style == "lateral-left") $lateral_footer_fix_class = "lateral_left_fix_wrapper";

$body_border_data = "";
$footer_border_data = "";
$body_border =  brankic_of_get_option("body_border", brankic_of_get_default("body_border"));
$body_side_border =  brankic_of_get_option("body_side_border", brankic_of_get_default("body_side_border"));

if ($body_border == "yes" || $body_side_border == "yes"){
	$body_border_width =  brankic_of_get_option("body_border_width", brankic_of_get_default("body_border_width"));
	
	if ($body_side_border == "yes") $body_border_data = 'data-side-border="true" data-site-border-width="' . $body_border_width . '"';
	if ($body_border == "yes") $body_border_data = 'data-site-border="true" data-site-border-width="' . $body_border_width . '"';
}
$footer_border_width = brankic_of_get_option("footer_border_width", brankic_of_get_default("footer_border_width"));
$footer_border_custom = brankic_of_get_option("footer_border_custom", brankic_of_get_default("footer_border_custom"));
$footer_border = brankic_of_get_option("footer_border", brankic_of_get_default("footer_border"));
if ($footer_border_custom != "" && $footer_border == "yes") $footer_border_data = 'data-footer-border-custom="' . $footer_border_custom . '"';		

if ($footer_border == "yes" && $body_border_data == "") {
	$body_border_data = 'data-site-border="true" data-site-border-width="' . $footer_border_width . '"';
}
?>
<?php if ($hide_footer != "yes" && ($r1 + $r2 != 0)){ ?>     
	<footer class="<?php echo esc_attr($footer_style) . ' ' . $lateral_footer_fix_class; ?>" <?php echo wp_kses($body_border_data, $brankic_allowedposttags); ?> <?php echo wp_kses($footer_border_data, $brankic_allowedposttags); ?>>
    
    	<div class="main-container">
<?php 
$footer_2_wrap_with_footer_1 = brankic_of_get_option("footer_2_wrap_with_footer_1", brankic_of_get_default("footer_2_wrap_with_footer_1"));

if ($footer_2_wrap_with_footer_1 == "yes" || $footer_2_wrap_with_footer_1 == "1") {
?>	
		<div class="row-container">	
			<div class="row-bg-wrap both_footers">
				<div class="inner-wrap"> 
					<div class="row-bg background-image"></div>
					<div class="row-bg background-color"></div>
				</div> 
			</div>
<?php
}
?>  
<?php if ($footer_layout != "none") { ?>	

<?php if ($footer_2_wrap_with_footer_1 != "yes" && $footer_2_wrap_with_footer_1 != "1") { ?>
  
            <div class="row-container">
			
				<div class="row-bg-wrap">
					<div class="inner-wrap"> 
						<div class="row-bg background-image"></div>
						<div class="row-bg background-color"></div>
					</div> 
				</div>
<?php } ?>        
                <div class="row <?php echo esc_attr($fluid_class . " " . $default_footer_padding . " " . $tablet_footer_class); ?>">
				
					<div class="col-container <?php echo esc_attr($footer_vertical_align); ?>" <?php echo wp_kses($data_footer_columns, $brankic_allowedposttags); ?> <?php echo wp_kses($data_footer_text_align, $brankic_allowedposttags); ?>>
                
<?php
$all_sidebars = wp_get_sidebars_widgets();

for ($i = 1 ; $i <=  count($footer_layout_array) ; $i++) {
	if( function_exists('optionsframework_init') || $i == 1 ) {
		if (count($all_sidebars["footer_box_" . $i]) > 0) {
			$text_align_class = "text-align-" . $footer_text_align;
			
			if ($footer_text_align == "left_center_right" && $i == 1) $text_align_class = "text-align-left";
			if ($footer_text_align == "left_center_right" && $i > 1 && $i < count($footer_layout_array)) $text_align_class = "text-align-center";
			if ($footer_text_align == "left_center_right" && $i == count($footer_layout_array)) $text_align_class = "text-align-right";
			
			
			if ($footer_text_align == "left_right") $text_align_class = "text-align-left";
			if ($footer_text_align == "left_right" && $i == count($footer_layout_array)) $text_align_class = "text-align-right";
		?>
		<div class="col col-<?php echo round(12 * brankic_convertToDecimal($footer_layout_array[$i-1])); ?> <?php echo esc_attr($text_align_class); ?>">
		<?php if (is_active_sidebar("footer_box_$i")) { dynamic_sidebar('footer_box_' . $i); } ?>
		</div><!-- END COL -->
		<?php
		};	
	}
}
?>
					</div><!-- col-container -->
			   
            	</div><!-- ROW -->
	<?php if ($footer_2_wrap_with_footer_1 != "yes" && $footer_2_wrap_with_footer_1 != "1") { ?>			
                            
            </div><!-- ROW-CONTAINER -->
			
	<?php } ?>
			
<?php } ?>
			
<?php if ($footer_2_show == "yes") { ?>			
			
	<?php if ($footer_2_wrap_with_footer_1 != "yes" && $footer_2_wrap_with_footer_1 != "1") { ?>
	
		 <div class="row-container">
			
				<div class="row-bg-wrap">
					<div class="inner-wrap"> 
						<div class="row-bg background-image"></div>
						<div class="row-bg background-color"></div>
					</div> 
				</div>
				
	<?php } ?>
        
                <div class="row <?php echo esc_attr($fluid_class . " " . $default_footer_2_padding . " " . $tablet_footer_class); ?>">
				
					<div class="col-container <?php echo esc_attr($footer_2_vertical_align); ?>" <?php echo wp_kses($data_footer_2_columns, $brankic_allowedposttags); ?> <?php echo wp_kses($data_footer_2_text_align, $brankic_allowedposttags); ?>>
                
<?php
for ($i = 1 ; $i <=  count($footer_2_layout_array) ; $i++) {
	if (count($all_sidebars["2nd_row_footer_box_" . $i]) > 0) {
		$text_align_class = "text-align-" . $footer_2_text_align;
		if ($footer_2_text_align == "left_center_right" && $i == 1) $text_align_class = "text-align-left";
		if ($footer_2_text_align == "left_center_right" && $i > 1 && $i < count($footer_2_layout_array)) $text_align_class = "text-align-center";
		if ($footer_2_text_align == "left_center_right" && $i == count($footer_2_layout_array)) $text_align_class = "text-align-right";
		if ($footer_2_text_align == "left_right") $text_align_class = "text-align-left";
		if ($footer_2_text_align == "left_right" && $i == count($footer_2_layout_array)) $text_align_class = "text-align-right";
	?>
	<div class="col col-<?php echo round(12 * brankic_convertToDecimal($footer_2_layout_array[$i-1])); ?>  <?php echo esc_attr($text_align_class); ?>">
	<?php if (is_active_sidebar("2nd_row_footer_box_$i")) { dynamic_sidebar('2nd_row_footer_box_' . $i); } ?>
	</div><!-- END COL -->
	<?php
	};	
}
?>
					</div><!-- col-container -->
					
            	</div><!-- ROW -->

<?php if ($footer_2_wrap_with_footer_1 != "yes" && $footer_2_wrap_with_footer_1 != "1") { ?>				
 
            </div><!-- ROW-CONTAINER -->	
			
<?php } ?>

<?php } ?>	

<?php if ($footer_2_wrap_with_footer_1 == "yes" || $footer_2_wrap_with_footer_1 == "1") { ?>

			</div><!-- ROW-CONTAINER -->

<?php } ?>		
            
        </div><!-- MAIN-CONTAINER -->
					
	</footer><!-- FOOTER -->
<?php } // END $hide_footer ?>	

<?php 
$customize_cursor =  brankic_of_get_option("customize_cursor", brankic_of_get_default("customize_cursor")); 
$cursor_size =  brankic_of_get_option("cursor_size", brankic_of_get_default("cursor_size")); 

if ($customize_cursor == "yes") { ?>
<div class="cursor-pointer"></div>
<div class="cursor-pointer ring <?php echo esc_attr($cursor_size); ?>"><span></span></div>
<?php } ?>

<?php 
if (brankic_of_get_option("back_to_top", brankic_of_get_default("back_to_top")) == "yes") {
?>
<a href="#" id="back-top">
	<div class="circle-button">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" xml:space="preserve" class="circle-border">
			<circle class="circle-border inner" cx="40" cy="40" r="36"></circle>
			<circle class="circle-border outer" cx="40" cy="40" r="36"></circle>
		</svg>
	</div>
	<i class="fa fa-angle-up"></i>
</a>
<?php
}
?>

<?php 
$scroll_indicator_position =  brankic_of_get_option("scroll_indicator_position", brankic_of_get_default("scroll_indicator_position"));
$scroll_indicator =  brankic_of_get_option("scroll_indicator", brankic_of_get_default("scroll_indicator"));
$scroll_indicator_thick =  brankic_of_get_option("scroll_indicator_thick", brankic_of_get_default("scroll_indicator_thick"));
$scroll_indicator_radius =  brankic_of_get_option("scroll_indicator_radius", brankic_of_get_default("scroll_indicator_radius"));
$scroll_indicator_height =  brankic_of_get_option("scroll_indicator_height", brankic_of_get_default("scroll_indicator_height"));
if (substr_count($scroll_indicator_position, "vertical") == 1 && $scroll_indicator == "yes"){
?>	
<div class="page-scroll-indicator <?php echo esc_attr($scroll_indicator_position . " " . $scroll_indicator_thick . " " . $scroll_indicator_height . " " . $scroll_indicator_radius ); ?>">
	<div class="progress"></div>
</div>	
<?php } ?>

<?php 
$searchbar =  brankic_of_get_option("searchbar", brankic_of_get_default("searchbar"));
if ($searchbar == "yes") include(get_template_directory() . '/inc/search_overlay.php'); 
?>

<?php wp_footer(); ?>


</body>
</html>