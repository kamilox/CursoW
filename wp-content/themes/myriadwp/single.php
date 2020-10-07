<?php
get_header();

$header_style =  brankic_global_or_local("header_style");

$single_post_style = brankic_global_or_local("single_post_style");

if ($single_post_style == "null" || $single_post_style == null) $single_post_style = brankic_of_get_option("single_post_style", brankic_of_get_default("single_post_style"));


$custom_font_class = brankic_custom_font();

$single_post_content_width =  brankic_global_or_local("single_post_content_width");

$overlay_bg_image_hover = brankic_global_or_local("overlay_bg_image_hover");


	$single_post_padding =  brankic_global_or_local("single_post_padding");
	if ($single_post_padding == "custom") {
		$single_post_top_padding =  brankic_global_or_local("single_post_top_padding");	
		$single_post_right_padding =  brankic_global_or_local("single_post_right_padding");
		$single_post_bottom_padding =  brankic_global_or_local("single_post_bottom_padding");
		$single_post_left_padding =  brankic_global_or_local("single_post_left_padding");
		
		$single_post_top_padding = str_replace("padding", "padding-top", $single_post_top_padding);
		$single_post_right_padding = str_replace("padding", "padding-right", $single_post_right_padding);
		$single_post_bottom_padding = str_replace("padding", "padding-bottom", $single_post_bottom_padding);
		$single_post_left_padding = str_replace("padding", "padding-left", $single_post_left_padding);
		
		$single_post_padding = "$single_post_top_padding $single_post_right_padding $single_post_bottom_padding $single_post_left_padding";
		$single_post_left_right_padding = "$single_post_right_padding $single_post_left_padding";
	} else {
		$single_post_left_right_padding = str_replace("padding-", "padding-left-", $single_post_padding) . " " . str_replace("padding-", "padding-right-", $single_post_padding);		
		$single_post_top_padding = str_replace("padding-", "padding-top-", $single_post_padding);	
		$single_post_bottom_padding = str_replace("padding-", "padding-bottom-", $single_post_padding);
	}

	$single_post_margin =  brankic_global_or_local("single_post_margin");
	$single_post_left_right_margin = "margin-right-0 auto margin-left-0 auto";
	if ($single_post_margin == "custom") {
		$single_post_top_margin =  brankic_global_or_local("single_post_top_margin");	
		$single_post_bottom_margin =  brankic_global_or_local("single_post_bottom_margin");
		
		$single_post_top_margin = str_replace("margin", "margin-top", $single_post_top_margin);
		$single_post_bottom_margin = str_replace("margin", "margin-bottom", $single_post_bottom_margin);
		
		$single_post_margin = "$single_post_top_margin auto $single_post_bottom_margin auto";	
	}

	if (brankic_is_woo_single()) {
		$default_margin = brankic_of_get_option("woo_single__margin", brankic_of_get_default("woo_single_margin"));
		if ($default_margin == "custom") {
			$default_top_margin =  brankic_of_get_option("woo_single_top_margin", brankic_of_get_default("woo_single_top_margin"));	
			$default_bottom_margin =  brankic_of_get_option("woo_single_bottom_margin", brankic_of_get_default("woo_single_bottom_margin"));	
			$default_top_margin = str_replace("margin", "margin-top", $default_top_margin);
			$default_bottom_margin = str_replace("margin", "margin-bottom", $default_bottom_margin);	
			$default_margin = "$default_top_margin auto $default_bottom_margin auto";
		}
		
		
		$default_padding = brankic_of_get_option("woo_single_padding", brankic_of_get_default("woo_single_padding"));
		if ($default_padding == "custom"){
	
			$woo_single_top_padding =  brankic_of_get_option("woo_single_top_padding", brankic_of_get_default("woo_single_top_padding"));	
			$woo_single_right_padding =  brankic_of_get_option("woo_single_right_padding", brankic_of_get_default("woo_single_right_padding"));
			$woo_single_bottom_padding =  brankic_of_get_option("woo_single_bottom_padding", brankic_of_get_default("woo_single_bottom_padding"));
			$woo_single_left_padding =  brankic_of_get_option("woo_single_left_padding", brankic_of_get_default("woo_single_left_padding"));
			
			$default_top_padding = str_replace("padding", "padding-top", $woo_single_top_padding);
			$default_right_padding = str_replace("padding", "padding-right", $woo_single_right_padding);
			$default_bottom_padding = str_replace("padding", "padding-bottom", $woo_single_bottom_padding);
			$default_left_padding = str_replace("padding", "padding-left", $woo_single_left_padding);	
			$default_padding = "$default_top_padding $default_right_padding $default_bottom_padding $default_left_padding";
		}
		
	}

	

if (function_exists("get_field")) {
	$custom_menu_font_color = get_field("post_custom_menu_font_color");
} else $custom_menu_font_color = "";

include(get_template_directory() . '/inc/header_' . $header_style . '.php');

if ($single_post_style == "fullwidth_sticky" || $single_post_style == "fullwidth") {
	$default_margin = "";
	$default_padding = "0px";
} else {
	$default_margin = $single_post_margin;
	$default_padding = $single_post_padding;
	
	if ($single_post_content_width == "fullwidth") {
		$content_width = 1440;
	} else {
		$content_width = intval(substr($single_post_content_width, 0, 4));
	}
	
}
$sidebar =  brankic_global_or_local("single_post_sidebar");	

if (function_exists("get_field")) {
	$hide_title = get_field("hide_title");
} else {
	$hide_title = false;
}

include(get_template_directory() . '/inc/' . $header_style . '_before.php');

		// Start the loop.
		while ( have_posts() ) : the_post();
	




	
		
$tags = get_the_tags();
$featured_image = brankic_featured_image_url("original");

if (function_exists("get_field")) {
	$post_featured_audio_video = get_field("post_featured_audio_video");
	$video_url = get_field("post_video_url");
} else {
	$post_featured_audio_video["mime_type"] = "";
	$video_url = "";
}

$wp_link_pages_args = array('before'           => '<div class="post-page-navigation">' . __( 'Pages:', 'myriadwp' ),
							'after'            => '</div>',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'number',
							'separator'        => ' ',
							'nextpagelink'     => esc_html__('Next page', 'myriadwp'),
							'previouspagelink' => esc_html__('Previous page', 'myriadwp'),
							'pagelink'         => '%',
							'echo'             => 1
							);
							
$enable_social_sharing_posts = brankic_global_or_local("enable_social_sharing_posts");
$post_related_posts = brankic_of_get_option("post_related_posts", brankic_of_get_default("post_related_posts"));
$post_related_posts_meta_layout = brankic_of_get_option("post_related_posts_meta_layout", brankic_of_get_default("post_related_posts_meta_layout"));

$post_navigation_fullwidth = brankic_of_get_option("post_navigation_fullwidth", brankic_of_get_default("post_navigation_fullwidth"));

$post_hero_holder_title_size = brankic_of_get_option("post_hero_holder_title_size", brankic_of_get_default("post_hero_holder_title_size"));

$single_post_content_width_responsive =  brankic_of_get_option("single_post_content_width_responsive", brankic_of_get_default("single_post_content_width_responsive"));
$tablet_class = "";
if ($single_post_content_width_responsive == "yes"){
	$single_post_content_width_responsive_percent =  brankic_of_get_option("single_post_content_width_responsive_percent", brankic_of_get_default("single_post_content_width_responsive_percent"));	
	$tablet_class = $single_post_content_width_responsive_percent;
}

include(get_template_directory() . '/inc/single-' . $single_post_style . '.php'); ?>

<?php	
		endwhile;
		?>
		
<?php include(get_template_directory() . '/inc/' . $header_style . '_after.php');?>		
<?php get_footer(); ?>
