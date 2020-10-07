<?php
/**
 * The default template for displaying pages
 */
get_header(); 

$header_style =  brankic_global_or_local("header_style");

$archive_index_content_bg_color =  brankic_of_get_option("archive_index_content_bg_color", brankic_of_get_default("archive_index_content_bg_color"));
$archive_index_content_text_color =  brankic_of_get_option("archive_index_content_text_color", brankic_of_get_default("archive_index_content_text_color"));

$overlay_bg_image_hover =  brankic_of_get_option("overlay_bg_image_hover", brankic_of_get_default("overlay_bg_image_hover"));

$custom_font_class = brankic_custom_font();

if (class_exists('Brankic_Shortcodes')) $brankic_portfolio_names_count = brankic_get_categories("portfolio_category", "names_count");

$default_margin = brankic_of_get_option("archive_margin", brankic_of_get_default("archive_margin"));
if ($default_margin == "custom") {
	$archive_top_margin =  brankic_of_get_option("archive_top_margin", brankic_of_get_default("archive_top_margin"));	
	$archive_bottom_margin =  brankic_of_get_option("archive_bottom_margin", brankic_of_get_default("archive_bottom_margin"));
	$archive_top_margin = str_replace("margin", "margin-top", $archive_top_margin);
	$archive_bottom_margin = str_replace("margin", "margin-bottom", $archive_bottom_margin);	
	$default_margin = "$archive_top_margin auto $archive_bottom_margin auto";
}
$default_padding =  brankic_of_get_option("archive_padding", brankic_of_get_default("archive_padding"));
if ($default_padding == "custom") {
	$archive_top_padding =  brankic_of_get_option("archive_top_padding", brankic_of_get_default("archive_top_padding"));
	$archive_right_padding =  brankic_of_get_option("archive_right_padding", brankic_of_get_default("archive_right_padding"));
	$archive_bottom_padding =  brankic_of_get_option("archive_bottom_padding", brankic_of_get_default("archive_bottom_padding"));
	$archive_left_padding =  brankic_of_get_option("archive_left_padding", brankic_of_get_default("archive_left_padding"));	
	$archive_top_padding = str_replace("padding", "padding-top", $archive_top_padding);
	$archive_right_padding = str_replace("padding", "padding-right", $archive_right_padding);
	$archive_bottom_padding = str_replace("padding", "padding-bottom", $archive_bottom_padding);
	$archive_left_padding = str_replace("padding", "padding-left", $archive_left_padding);	
	$default_padding = "$archive_top_padding $archive_right_padding $archive_bottom_padding $archive_left_padding";
}


if (brankic_is_shop()){
	

 		$default_margin = brankic_of_get_option("woo_shop_margin", brankic_of_get_default("woo_shop_margin"));
		if ($default_margin == "custom") {
			$default_top_margin =  brankic_of_get_option("woo_shop_top_margin", brankic_of_get_default("woo_shop_top_margin"));	
			$default_bottom_margin =  brankic_of_get_option("woo_shop_bottom_margin", brankic_of_get_default("woo_shop_bottom_margin"));	
			$default_top_margin = str_replace("margin", "margin-top", $default_top_margin);
			$default_bottom_margin = str_replace("margin", "margin-bottom", $default_bottom_margin);	
			$default_margin = "$default_top_margin auto $default_bottom_margin auto";
		}
		
		
		$default_padding = brankic_of_get_option("woo_shop_padding", brankic_of_get_default("woo_shop_padding"));
		if ($default_padding == "custom"){
	
			$woo_shop_top_padding =  brankic_of_get_option("woo_shop_top_padding", brankic_of_get_default("woo_shop_top_padding"));	
			$woo_shop_right_padding =  brankic_of_get_option("woo_shop_right_padding", brankic_of_get_default("woo_shop_right_padding"));
			$woo_shop_bottom_padding =  brankic_of_get_option("woo_shop_bottom_padding", brankic_of_get_default("woo_shop_bottom_padding"));
			$woo_shop_left_padding =  brankic_of_get_option("woo_shop_left_padding", brankic_of_get_default("woo_shop_left_padding"));
			
			$default_top_padding = str_replace("padding", "padding-top", $woo_shop_top_padding);
			$default_right_padding = str_replace("padding", "padding-right", $woo_shop_right_padding);
			$default_bottom_padding = str_replace("padding", "padding-bottom", $woo_shop_bottom_padding);
			$default_left_padding = str_replace("padding", "padding-left", $woo_shop_left_padding);	
			$default_padding = "$default_top_padding $default_right_padding $default_bottom_padding $default_left_padding";
		}
}





$archive_content_width =  brankic_of_get_option("archive_content_width", brankic_of_get_default("archive_content_width"));
if ($archive_content_width == "fullwidth") {
	$content_width = 1440;
} else {
	$content_width = intval(substr($archive_content_width, 0, 4));
}

$archive_show_title = brankic_of_get_option("archive_show_title", brankic_of_get_default("archive_show_title"));


$archive_content_bg_color =  brankic_of_get_option("archive_content_bg_color", brankic_of_get_default("archive_content_bg_color"));
$archive_content_text_color =  brankic_of_get_option("archive_content_text_color", brankic_of_get_default("archive_content_text_color"));
$content_color_background_style = 'style="background:' . $archive_content_bg_color . ';color:' . $archive_content_text_color . '"';


$archive_sidebar = brankic_of_get_option("archive_sidebar", brankic_of_get_default("archive_sidebar"));
$count_widgets = brankic_default_count_widgets($archive_sidebar);
if ($count_widgets == 0) $archive_sidebar = "";

if (is_404()) $archive_sidebar = "";

if ($archive_sidebar != "none" && $archive_sidebar != "") $page_row_container_sidebar_class = "sidebar-on"; else $page_row_container_sidebar_class = "";

if (function_exists("get_field")) {
	$custom_menu_font_color = get_field("page_custom_menu_font_color");
} else $custom_menu_font_color = "";

if (function_exists("get_field")) {
	$hide_title = get_field("hide_title");
} else {
	$hide_title = false;
}

include(get_template_directory() . '/inc/header_' . $header_style . '.php');

include(get_template_directory() . '/inc/' . $header_style . '_before.php');

if (is_404()) $archive_sidebar = "";

if ($archive_sidebar != "none" && $archive_sidebar != "") {
	
	$column_class = "col-9"; 
?>

<div class="row-stick">

<?php
} else {
	$column_class = "col-12";
}
?>
<div class="<?php echo esc_attr($column_class); ?>">

<?php
	
	$limit = get_option( 'posts_per_page' );
	$archive_style = brankic_of_get_option("archive_style", brankic_of_get_default("archive_style"));
	$archive_columns = brankic_of_get_option("archive_columns", brankic_of_get_default("archive_columns"));
	
	$archive_show_date = brankic_of_get_option("archive_show_date", brankic_of_get_default("archive_show_date"));
	$archive_show_author = brankic_of_get_option("archive_show_author", brankic_of_get_default("archive_show_author"));
	$archive_show_cats = brankic_of_get_option("archive_show_cats", brankic_of_get_default("archive_show_cats"));
	$archive_show_comments = brankic_of_get_option("archive_show_comments", brankic_of_get_default("archive_show_comments"));
	$archive_show_tags = brankic_of_get_option("archive_show_tags", brankic_of_get_default("archive_show_tags"));
	$archive_navigation = brankic_of_get_option("archive_navigation", brankic_of_get_default("archive_navigation"));
	$archive_wow_effect = brankic_of_get_option("archive_wow_effect", brankic_of_get_default("archive_wow_effect"));
	$archive_wow_delay = brankic_of_get_option("archive_wow_delay", brankic_of_get_default("archive_wow_delay"));
	
	$archive_boxed = brankic_of_get_option("archive_boxed", brankic_of_get_default("archive_boxed"));  //archive_style == blog-style-3 8 9
	$archive_emphasize_first_post = brankic_of_get_option("archive_emphasize_first_post", brankic_of_get_default("archive_emphasize_first_post"));
	$archive_emphasize_style = brankic_of_get_option("archive_emphasize_style", brankic_of_get_default("archive_emphasize_style")); // archive_emphasize_first_post == true
	$archive_style_2 = brankic_of_get_option("archive_style_2", brankic_of_get_default("archive_style_2")); // archive_style == blog-style-3 5 6
	$archive_thumb_sizes = brankic_of_get_option("archive_thumb_sizes", brankic_of_get_default("archive_thumb_sizes"));
	$archive_flex_height = brankic_of_get_option("archive_flex_height", brankic_of_get_default("archive_flex_height")); // archive_style_2 == flex
	$archive_img_radius = brankic_of_get_option("archive_img_radius", brankic_of_get_default("archive_img_radius"));
	$archive_img_radius_size = brankic_of_get_option("archive_img_radius_size", brankic_of_get_default("archive_img_radius_size")); // archive_img_radius == true
	$archive_shadow_color = brankic_of_get_option("archive_shadow_color", brankic_of_get_default("archive_shadow_color"));
	$archive_gap_advanced = brankic_of_get_option("archive_gap_advanced", brankic_of_get_default("archive_gap_advanced")); // archive_style == blog-style-2 3 4 5 6 7 8 
	$archive_blog_2_image_height = brankic_of_get_option("archive_blog_2_image_height", brankic_of_get_default("archive_blog_2_image_height")); // archive_style == blog-style-2 3
	$archive_grid_advanced_row_height = brankic_of_get_option("archive_grid_advanced_row_height", brankic_of_get_default("archive_grid_advanced_row_height")); // archive_style_2 = grid_advanced
	$archive_show_excerpt = brankic_of_get_option("archive_show_excerpt", brankic_of_get_default("archive_show_excerpt"));
	$archive_captions_position = brankic_of_get_option("archive_captions_position", brankic_of_get_default("archive_captions_position")); // archive_style == blog-style-5
	$archive_title_color = brankic_of_get_option("archive_title_color", brankic_of_get_default("archive_title_color"));
	$archive_hover_color = brankic_of_get_option("archive_hover_color", brankic_of_get_default("archive_hover_color"));
	$archive_border_hover_color = brankic_of_get_option("archive_border_hover_color", brankic_of_get_default("archive_border_hover_color"));
	$archive_title_font_family = brankic_of_get_option("archive_title_font_family", brankic_of_get_default("archive_title_font_family"));
	$archive_custom_title_font_family = brankic_of_get_option("archive_custom_title_font_family", brankic_of_get_default("archive_custom_title_font_family")); // archive_title_font_family == custom
	$archive_h_size = brankic_of_get_option("archive_h_size", brankic_of_get_default("archive_h_size"));
	$archive_h_size_custom = brankic_of_get_option("archive_h_size_custom", brankic_of_get_default("archive_h_size_custom")); // archive_h_size = custom
	$archive_titles_weight = brankic_of_get_option("archive_titles_weight", brankic_of_get_default("archive_titles_weight"));
	$archive_h_style = brankic_of_get_option("archive_h_style", brankic_of_get_default("archive_h_style"));
	$archive_h_transform = brankic_of_get_option("archive_h_transform", brankic_of_get_default("archive_h_transform"));
	$archive_h_spacing = brankic_of_get_option("archive_h_spacing", brankic_of_get_default("archive_h_spacing"));
	$archive_h_spacing_custom = brankic_of_get_option("archive_h_spacing_custom", brankic_of_get_default("archive_h_spacing_custom")); // archive_h_spacing == custom
	$archive_h_height = brankic_of_get_option("archive_h_height", brankic_of_get_default("archive_h_height"));
	$archive_h_height_custom = brankic_of_get_option("archive_h_height_custom", brankic_of_get_default("archive_h_height_custom")); //archive_h_height == custom
	$archive_duotone = brankic_of_get_option("archive_duotone", brankic_of_get_default("archive_duotone"));  //archive_style == blog-style-1 2 2a 3 4 5 6
	$archive_duotone_custom = brankic_of_get_option("archive_duotone_custom", brankic_of_get_default("archive_duotone_custom"));  //archive_duotone == custom
	$archive_duotone_gradient = brankic_of_get_option("archive_duotone_gradient", brankic_of_get_default("archive_duotone_gradient"));  //archive_duotone == custom
	$archive_duotone_gradient_direction = brankic_of_get_option("archive_duotone_gradient_direction", brankic_of_get_default("archive_duotone_gradient_direction"));  //archive_duotone == custom  archive_duotone_gradient == true
	$archive_duotone_custom_2 = brankic_of_get_option("archive_duotone_custom_2", brankic_of_get_default("archive_duotone_custom_2")); //archive_duotone_gradient == true
	$archive_duotone_custom_3 = brankic_of_get_option("archive_duotone_custom_3", brankic_of_get_default("archive_duotone_custom_3"));
	
	$archive_post_meta_style = brankic_of_get_option("archive_post_meta_style", brankic_of_get_default("archive_post_meta_style"));
	$archive_post_meta_bold = brankic_of_get_option("archive_post_meta_bold", brankic_of_get_default("archive_post_meta_bold"));
	$archive_post_meta_small = brankic_of_get_option("archive_post_meta_small", brankic_of_get_default("archive_post_meta_small"));
	if ($archive_post_meta_small) $archive_post_meta_small = "small";
	if ($archive_post_meta_bold) $archive_post_meta_bold = "bold";

	if ($archive_emphasize_first_post == "yes") $archive_emphasize_first_post = "true";
	if ($archive_img_radius == "yes") $archive_img_radius = "true";
	if ($archive_show_excerpt == "yes") $archive_show_excerpt = "true";
	if ($archive_duotone_gradient == "yes") $archive_duotone_gradient = "true";

	$wp_object = $wp_query->get_queried_object();

	if ($wp_object != null)	{
		$cat_id = $wp_object->cat_ID;
	
		if (is_author()) $author_id = $wp_object->ID; else $author_id = "";
		if (is_tag()) $tag_id = $wp_object->term_taxonomy_id; else $tag_id = "";	

	} else {
		$cat_id = "";
		$author_id = "";
		$tag_id = "";
		
	}
	
	$query_part = "";
	
 	if (class_exists('Brankic_Shortcodes') && ((isset($cat_id) || isset($author_id) || isset($tag_id)))) {
		if (isset($cat_id) || $cat_id != "") $query_part .= 'cat_id="' . $cat_id .'" ';
		if (isset($author_id) || $author_id != "") $query_part .= 'author_id="' . $author_id .'" ';
		if (isset($tag_id) || $tag_id != "") $query_part .= 'tag_id="' . $tag_id .'" ';
		if (is_search()) $query_part .= 'search="' . get_search_query() . '"';
		$cat_shortcode = '[brankic_category ' . $query_part . ' limit="' . $limit . '" columns="' . $archive_columns . '" layout="' . $archive_style . '" show_author="' . $archive_show_author . '"';
		$cat_shortcode .= ' show_comments="' . $archive_show_comments . '" show_cats="' . $archive_show_cats . '" show_tags="' . $archive_show_tags . '" show_date="' . $archive_show_date . '"'; 
		$cat_shortcode .= ' post_meta_style="' . $archive_post_meta_style . '" post_meta_bold="' . $archive_post_meta_bold . '" post_meta_small="' . $archive_post_meta_small . '"';
		$cat_shortcode .= ' boxed="' . $archive_boxed . '" emphasize_style="' . $archive_emphasize_style . '" emphasize_first_post="' . $archive_emphasize_first_post . '" style="' . $archive_style_2 . '"';
		$cat_shortcode .= ' thumb_sizes="' . $archive_thumb_sizes . '" flex_height="' . $archive_flex_height . '" img_radius="' . $archive_img_radius . '" img_radius_size="' . $archive_img_radius_size . '"';
		$cat_shortcode .= ' shadow_color="' . $archive_shadow_color . '" gap_advanced="' . $archive_gap_advanced . '" blog_2_image_height="' . $archive_blog_2_image_height . '" grid_advanced_row_height="' . $archive_grid_advanced_row_height . '"';
		$cat_shortcode .= ' show_excerpt="' . $archive_show_excerpt . '" captions_position="' . $archive_captions_position . '" title_color="' . $archive_title_color . '" hover_color="' . $archive_hover_color . '"';
		$cat_shortcode .= ' border_hover_color="' . $archive_border_hover_color . '" title_font_family="' . $archive_title_font_family . '" custom_title_font_family="' . $archive_custom_title_font_family . '" h_size="' . $archive_h_size . '"';
		$cat_shortcode .= ' h_size_custom="' . $archive_h_size_custom . '" titles_weight="' . $archive_titles_weight . '" h_style="' . $archive_h_style . '" h_transform="' . $archive_h_transform . '"';
		$cat_shortcode .= ' h_spacing="' . $archive_h_spacing . '" h_spacing_custom="' . $archive_h_spacing_custom . '" h_height="' . $archive_h_height . '" h_height_custom="' . $archive_h_height_custom . '"';
		$cat_shortcode .= ' duotone="' . $archive_duotone . '" duotone_custom="' . $archive_duotone_custom . '" duotone_gradient="' . $archive_duotone_gradient . '" duotone_gradient_direction="' . $archive_duotone_gradient_direction . '"';
		$cat_shortcode .= ' duotone_custom_2="' . $archive_duotone_custom_2 . '" duotone_custom_3="' . $archive_duotone_custom_3 . '"';
		$cat_shortcode .= ' navigation="' . $archive_navigation . '" wow_effect="' . $archive_wow_effect . '" wow_delay="' . $archive_wow_delay . '" archive_margin="' . $default_margin . '" archive_padding="' . $default_padding . '" gap="true"]';
		echo do_shortcode($cat_shortcode);
	} else { 
		include(get_template_directory() . '/inc/archive_default.php');
	}
?>	
	</div><!-- <?php echo esc_attr($column_class); ?>-->

<?php 

if (is_404()) $archive_sidebar = "";
if ($archive_sidebar != "none" && $archive_sidebar != "") { ?>
 	
					    
					    
						<div class="col-3 sticky-wrap">
                        
                            <div class="child sticky-element">
							
								<div class="sidebar">
								
								
								<?php if (is_active_sidebar($archive_sidebar)) { dynamic_sidebar($archive_sidebar); } ?>

								
								</div><!-- SIDEBAR-->	
                                    
                            </div><!-- CHILD STICKY-ELEMENT-->		
                                        
                        </div><!-- COL-3 STICKY-WRAP-->
						
					</div><!-- ROW STICK -->
<?php } 
	
include(get_template_directory() . '/inc/' . $header_style . '_after.php');	

get_footer();
?>