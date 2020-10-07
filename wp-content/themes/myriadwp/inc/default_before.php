<?php
$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
$archive_fluid_class = ""; 
$woo_single_fluid_class = "";

$page_sidebar = brankic_global_or_local("page_sidebar");
$disable_sticky =  brankic_of_get_option("disable_sticky", brankic_of_get_default("disable_sticky"));
if ($page_sidebar != "none" && $page_sidebar != "" && $disable_sticky == "no") $row_stick_class = "row-stick"; else $row_stick_class = "";
$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'brankic-512-384' ); 
if (!(isset($featured_image_array[0]))) $featured_image_array[0] = "";
$featured_image = $featured_image_array[0];	
if ($featured_image && !(class_exists('Brankic_Shortcodes')) && is_singular()) $featured_class = "featured-image-true"; else $featured_class = "";
?>

        <div class="main-container <?php echo esc_attr($featured_class); ?>" data-template="default_before">
		
		
	
		<?php 
		$real_default_padding = $default_padding;
		if (is_page()  || is_home() || is_archive() || is_singular( array('product', 'topic', 'forum' )) || brankic_bbpress_single_user() || is_404() || is_search()){
			
			if (is_page()) {
				if (brankic_is_woo_account()) include(get_template_directory() . '/woocommerce/brankic_hero_woo.php');
				else if (!$hide_title) echo brankic_hero_holder(brankic_global_or_local("hero_holder_background_color"),brankic_global_or_local("hero_holder_background_color_opacity"),brankic_global_or_local("hero_holder_title_color"),brankic_global_or_local("hero_holder_title_position"),brankic_global_or_local("hero_holder_height"));															
  
			}
			
			if (is_search()) {
				echo brankic_hero_holder(brankic_global_or_local("hero_holder_background_color"),brankic_global_or_local("hero_holder_background_color_opacity"),brankic_global_or_local("hero_holder_title_color"),brankic_global_or_local("hero_holder_title_position"),brankic_global_or_local("hero_holder_height"));															
			}
			
			if (is_archive() || is_home()) {
				if (brankic_is_woo_shop()) include(get_template_directory() . '/woocommerce/brankic_hero_woo.php');
				else if ($archive_show_title) echo brankic_hero_holder("","","",brankic_global_or_local("archive_hero_holder_title_position"),brankic_global_or_local("archive_hero_holder_height"), true, false, true, false, false, true);	
				$archive_content_width =  brankic_of_get_option("archive_content_width", brankic_of_get_default("archive_content_width"));
				if ($archive_content_width == "fullwidth") $archive_fluid_class = "fluid";
			}
		$default_header_fixed = brankic_of_get_option("default_header_fixed", brankic_of_get_default("default_header_fixed"));
		$default_header_overflow = brankic_of_get_option("default_header_overflow", brankic_of_get_default("default_header_overflow"));
		$row_extra_padding_class = "";
		if (function_exists("get_field")) {
			$row_extra_padding = get_field("row_extra_padding");			
			if ($row_extra_padding && $header_style == "default") $row_extra_padding_class = " extra_padding";
		}
		
		if (brankic_is_woo_single() && $header_style == "default" && $default_header_fixed == "yes" && $default_header_overflow == "yes"){
			$row_extra_padding_class = " extra_padding";
		}
		?>
        
            <div class="row-container brankic_content <?php echo esc_attr($page_row_container_sidebar_class . $row_extra_padding_class); ?>">
        
<?php 
if (brankic_is_woo_single()){
	$woo_single_content_width =  brankic_of_get_option("woo_single_content_width", brankic_of_get_default("woo_single_content_width"));
	$woo_single_content_width_below =  brankic_of_get_option("woo_single_content_width_below", brankic_of_get_default("woo_single_content_width_below"));
	if ($woo_single_content_width == "fullwidth") $woo_single_fluid_class = "fluid";
	if ($woo_single_content_width_below != "fullwidth") $woo_single_fluid_class .= " fluid-first-child";
}

if (!isset($tablet_class)) $tablet_class = "";

?>		
		
                <div class="row <?php echo esc_attr($row_stick_class); ?> <?php echo esc_attr($default_margin) . " " . esc_attr($real_default_padding) . " " . esc_attr($tablet_class) . " " . esc_attr($archive_fluid_class) . " " . esc_attr($woo_single_fluid_class); ?>">
		<?php 
		}
		?>