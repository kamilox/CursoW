<?php
/**
 * The default template for displaying pages
 */
get_header(); 


$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
$wow_class = brankic_of_get_option("archive_wow_effect", brankic_of_get_default("archive_wow_effect"));
$wow_delay = brankic_of_get_option("archive_wow_delay", brankic_of_get_default("archive_wow_delay"));
$overlay_bg_image_hover = brankic_global_or_local("overlay_bg_image_hover");
$default_margin =  brankic_global_or_local("default_margin");
if ($default_margin == "custom") {
	$default_top_margin =  brankic_global_or_local("default_top_margin");	
	$default_bottom_margin =  brankic_global_or_local("default_bottom_margin");	
	$default_top_margin = str_replace("margin", "margin-top", $default_top_margin);
	$default_bottom_margin = str_replace("margin", "margin-bottom", $default_bottom_margin);	
	$default_margin = "$default_top_margin auto $default_bottom_margin auto";
}
$default_padding =  brankic_global_or_local("default_padding");
if ($default_padding == "custom") {
	
	if (function_exists("get_field")) {
		$local_default_padding = get_field("default_padding");
	} else $local_default_padding = "";
	
	if (brankic_of_get_option("default_padding", brankic_of_get_default("default_padding")) == "custom" && ($local_default_padding == "" || $local_default_padding == null)){
	
		$default_top_padding =  brankic_of_get_option("default_top_padding", brankic_of_get_default("default_top_padding"));	
		$default_right_padding =  brankic_of_get_option("default_right_padding", brankic_of_get_default("default_right_padding"));
		$default_bottom_padding =  brankic_of_get_option("default_bottom_padding", brankic_of_get_default("default_bottom_padding"));
		$default_left_padding =  brankic_of_get_option("default_left_padding", brankic_of_get_default("default_left_padding"));	
	
	} 

	if ($local_default_padding == "custom")	{
		
		$default_top_padding =  get_field("default_top_padding");	
		$default_right_padding =  get_field("default_right_padding");
		$default_bottom_padding =  get_field("default_bottom_padding");
		$default_left_padding =  get_field("default_left_padding");
		
	}
	
	
	$default_top_padding = str_replace("padding", "padding-top", $default_top_padding);
	$default_right_padding = str_replace("padding", "padding-right", $default_right_padding);
	$default_bottom_padding = str_replace("padding", "padding-bottom", $default_bottom_padding);
	$default_left_padding = str_replace("padding", "padding-left", $default_left_padding);	
	$default_padding = "$default_top_padding $default_right_padding $default_bottom_padding $default_left_padding";
	
}

$page_content_width =  brankic_global_or_local("default_content_width", "page_content_width");
if ($page_content_width == "fullwidth") {
	$content_width = 1440;
} else {
	$content_width = intval(substr($page_content_width, 0, 4));
}

if (function_exists("get_field")) {
	$hide_title = get_field("hide_title");
} else {
	$hide_title = false;
}



$page_sidebar = brankic_global_or_local("page_sidebar");
$page_sidebar_position = brankic_global_or_local("page_sidebar_position");
$default_content_width_responsive =  brankic_of_get_option("default_content_width_responsive", brankic_of_get_default("default_content_width_responsive"));

$tablet_class = "";
if ($default_content_width_responsive == "yes"){
	$default_content_width_responsive_percent =  brankic_of_get_option("default_content_width_responsive_percent", brankic_of_get_default("default_content_width_responsive_percent"));	
	$tablet_class = $default_content_width_responsive_percent;
}


if ($page_sidebar != "none" && $page_sidebar != "") $page_row_container_sidebar_class = "sidebar-on " . $page_sidebar_position ; else $page_row_container_sidebar_class = "";

include(get_template_directory() . '/inc/header_' . $header_style . '.php');

include(get_template_directory() . '/inc/' . $header_style . '_before.php');

?>


	<article <?php post_class($wow_class . " height-70"); ?> <?php echo wp_kses($wow_delay, $brankic_allowedposttags); ?> id="error-404">	

			<h1><?php esc_html_e('404', 'myriadwp');?></h1>
			<h2><?php esc_html_e('Page Not Found', 'myriadwp');?></h2>
			<p><?php esc_html_e('We can\'t seem to find the page you\'re looking for.', 'myriadwp'); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) )?>" class="brankic_button radius normal medium" data-border="true"><span><?php esc_html_e('Return To Home', 'myriadwp'); ?></span></a>

	</article>


		
<?php include(get_template_directory() . '/inc/' . $header_style . '_after.php'); ?>

<?php
get_footer();
?>