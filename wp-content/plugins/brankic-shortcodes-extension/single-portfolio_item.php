<?php
get_header(); 

$header_style =  brankic_global_or_local("header_style");

$portfolio_item_style = brankic_global_or_local("portfolio_item_style");

$custom_font_class = brankic_custom_font();

$single_post_content_width =  brankic_global_or_local("single_post_content_width");

$portfolio_item_content_width =  brankic_global_or_local("portfolio_item_content_width");
if ($portfolio_item_content_width == "fullwidth") {
	$style = 'style="max-width:none"'; 
	$content_width = 1440;
} else {
	$style = 'style="max-width:' . $portfolio_item_content_width . '"';
	$content_width = intval(substr($portfolio_item_content_width, 0, 4));
}
$overlay_bg_image_hover = brankic_global_or_local("overlay_bg_image_hover");

if (function_exists("get_field")) {
	$custom_menu_font_color = get_field("portfolio_item_custom_menu_font_color");
} else $custom_menu_font_color = "";

include(get_template_directory() . '/inc/header_' . $header_style . '.php');

$default_padding = "";
$default_margin = "";

$portfolio_item_content_width =  brankic_global_or_local("portfolio_item_content_width");
if ($portfolio_item_content_width == "fullwidth") {
	$content_width_style = 'style="max-width:none"'; 
	$content_width = 1440;
} else {
	$content_width_style = 'style="max-width:' . $portfolio_item_content_width . '"';
	$content_width = intval(substr($portfolio_item_content_width, 0, 4));
}




if ($portfolio_item_style == "portfolio_style_3" || $portfolio_item_style == "portfolio_style_4" || $portfolio_item_style == "portfolio_style_5") $portfolio_item_sidebar = brankic_global_or_local("portfolio_item_sidebar");
else $portfolio_item_sidebar = "none";

if ($portfolio_item_sidebar != "none" && $portfolio_item_sidebar != "") $page_row_container_sidebar_class = "sidebar-on"; else $page_row_container_sidebar_class = "";

include(get_template_directory() . '/inc/' . $header_style . '_before.php');


if ($portfolio_item_sidebar && ($portfolio_item_sidebar != "none")) {
	
$column_class = "col-9"; //else $column_class = "col-12";
?> 
<div class="row-stick">

	<div class="<?php echo $column_class ?> sticky-wrap">
	
		<div class="child sticky-element">
<?php }

$portfolio_item_padding =  brankic_global_or_local("portfolio_item_padding");
if ($portfolio_item_padding == "custom") {
	$portfolio_item_top_padding =  brankic_global_or_local("portfolio_item_top_padding");	
	$portfolio_item_right_padding =  brankic_global_or_local("portfolio_item_right_padding");
	$portfolio_item_bottom_padding =  brankic_global_or_local("portfolio_item_bottom_padding");
	$portfolio_item_left_padding =  brankic_global_or_local("portfolio_item_left_padding");
	
	$portfolio_item_top_padding = str_replace("padding", "padding-top", $portfolio_item_top_padding);
	$portfolio_item_right_padding = str_replace("padding", "padding-right", $portfolio_item_right_padding);
	$portfolio_item_bottom_padding = str_replace("padding", "padding-bottom", $portfolio_item_bottom_padding);
	$portfolio_item_left_padding = str_replace("padding", "padding-left", $portfolio_item_left_padding);
	
	$portfolio_item_padding = "$portfolio_item_top_padding $portfolio_item_right_padding $portfolio_item_bottom_padding $portfolio_item_left_padding";
	
	$portfolio_item_left_right_padding = "$portfolio_item_right_padding $portfolio_item_left_padding";
} else {
	$portfolio_item_left_right_padding = str_replace("padding-", "padding-left-", $portfolio_item_padding) . " " . str_replace("padding-", "padding-right-", $portfolio_item_padding);
	$portfolio_item_top_padding = str_replace("padding-", "padding-top-", $portfolio_item_padding);	
	$portfolio_item_bottom_padding = str_replace("padding-", "padding-bottom-", $portfolio_item_padding);
	
}

$portfolio_item_margin =  brankic_global_or_local("portfolio_item_margin");
if ($portfolio_item_margin == "custom") {
	$portfolio_item_top_margin =  brankic_global_or_local("portfolio_item_top_margin");	
	$portfolio_item_bottom_margin =  brankic_global_or_local("portfolio_item_bottom_margin");
	
	$portfolio_item_top_margin = str_replace("margin", "margin-top", $portfolio_item_top_margin);
	$portfolio_item_bottom_margin = str_replace("margin", "margin-bottom", $portfolio_item_bottom_margin);
	
	$portfolio_item_margin = "$portfolio_item_top_margin auto $portfolio_item_bottom_margin auto";
}

while ( have_posts() ) : the_post();




?>


<?php 
$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
$featured_image = $featured_image_array[0];	

$featured_images_urls = brankic_featured_images_super_function("", false, "urls");
$featured_images_captions = brankic_featured_images_super_function("", false, "captions");
$featured_images_descriptions = brankic_featured_images_super_function("", false, "descriptions");
$featured_images_ids = brankic_featured_images_super_function("", false, "ids");
$featured_images_srcsets = brankic_featured_images_super_function("", false, "srcsets");

$featured_images_limit = count($featured_images_ids);

$featured_video = get_field("portfolio_item_featured_video");
$poster_class = "";
if ($featured_video) {
	$video_url = $featured_video['url'];
	$video_title = $featured_video['title'];
	$video_caption = $featured_video['caption'];
	$video_mime_type = $featured_video['mime_type'];
	
	//if ($portfolio_item_featured_video_play == "play_on_hover_poster") $poster_class = "poster_play_on_hover";
	
	//if ($portfolio_item_featured_video_play == "autoplay") $html_autoplay = "autoplay"; else $html_autoplay = "";
					
	$video_html = '<video preload="auto" loop autoplay id="video_id_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted" data-rel="item_id_' . get_the_ID() . '">
	  <source src="' . $video_url . '" type="' . $video_mime_type . '">
	  Your browser does not support the video tag.
	</video>';
}




if (function_exists("get_field")) {
	$post_video_url = get_field("post_video_url");
	$post_featured_audio_video = get_field("post_featured_audio_video");
	$single_post_mask_color =  get_field("single_post_mask_color");
	$single_post_mask_opacity =  get_field("single_post_mask_opacity");
	$single_post_title_color = get_field("single_post_title_color");
} else {
	$post_video_url = "";
	$page_featured_audio_video["mime_type"] = "";
	$single_post_mask_color =  "";
	$single_post_mask_opacity =  "";
	$single_post_title_color = "";
}

$portfolio_item_details_caption = esc_attr( brankic_of_get_option("portfolio_item_details_caption", brankic_of_get_default("portfolio_item_details_caption")) ) ;

$portfolio_item_detail_1_caption = esc_attr(brankic_of_get_option("portfolio_item_detail_1_caption", brankic_of_get_default("portfolio_item_detail_1_caption")) );
$portfolio_item_details_1 = esc_attr(get_post_meta( get_the_ID(), 'portfolio_item_details_1', true ) );
$portfolio_item_details_url_1 = esc_url( get_post_meta( get_the_ID(), 'portfolio_item_details_url_1', true ) );

$portfolio_item_detail_2_caption = esc_attr( brankic_of_get_option("portfolio_item_detail_2_caption", brankic_of_get_default("portfolio_item_detail_2_caption")) );
$portfolio_item_details_2 = esc_attr( get_post_meta( get_the_ID(), 'portfolio_item_details_2', true ) );
$portfolio_item_details_url_2 = esc_url( get_post_meta( get_the_ID(), 'portfolio_item_details_url_2', true ) );

$portfolio_item_detail_3_caption = esc_attr( brankic_of_get_option("portfolio_item_detail_3_caption", brankic_of_get_default("portfolio_item_detail_3_caption")) );
$portfolio_item_details_3 = esc_attr( get_post_meta( get_the_ID(), 'portfolio_item_details_3', true ) );
$portfolio_item_details_url_3 = esc_url( get_post_meta( get_the_ID(), 'portfolio_item_details_url_3', true ) );

$portfolio_item_detail_4_caption = esc_attr( brankic_of_get_option("portfolio_item_detail_4_caption", brankic_of_get_default("portfolio_item_detail_4_caption")) );
$portfolio_item_details_4 = esc_attr( get_post_meta( get_the_ID(), 'portfolio_item_details_4', true ) );
$portfolio_item_details_url_4 = esc_url( get_post_meta( get_the_ID(), 'portfolio_item_details_url_4', true ) );

$portfolio_item_content_caption = esc_attr( brankic_of_get_option("portfolio_item_content_caption", brankic_of_get_default("portfolio_item_content_caption")) );

$cat_names = array();

$terms = get_the_terms( get_the_ID(), 'portfolio_category' );
                         
if ( $terms && ! is_wp_error( $terms ) ) : 
 
    $cat_names = array();
 
    foreach ( $terms as $term ) {
        $cat_names[] = esc_attr($term->name);
    }
	$cat_names = implode(", ", $cat_names);
                         

endif;


$enable_social_sharing_portfolio_items = brankic_global_or_local("enable_social_sharing_portfolio_items");
$portfolio_item_show_testimonials = brankic_of_get_option("portfolio_item_show_testimonials", brankic_of_get_default("portfolio_item_show_testimonials"));

$portfolio_item_title_color = brankic_global_or_local("portfolio_item_title_color");
$portfolio_item_title_bg_color = brankic_global_or_local("portfolio_item_title_bg_color");

$portfolio_item_related_posts = brankic_global_or_local("portfolio_item_related_posts");
$portfolio_item_related_posts_meta_layout = brankic_global_or_local("portfolio_item_related_posts_meta_layout");
$post_related_posts = $portfolio_item_related_posts; 
$post_related_posts_meta_layout = $portfolio_item_related_posts_meta_layout;
$single_post_style = "";

$portfolio_item_hero_holder_title_size = brankic_global_or_local("portfolio_item_hero_holder_title_size");
$portfolio_item_hero_holder_title_position = brankic_global_or_local("portfolio_item_hero_holder_title_position");
$portfolio_item_hero_holder_height = brankic_global_or_local("portfolio_item_hero_holder_height");
$portfolio_item_title_height = brankic_global_or_local("portfolio_item_title_height");

$portfolio_item_content_width_responsive =  brankic_global_or_local("portfolio_item_content_width_responsive");
$tablet_class = "";
if ($portfolio_item_content_width_responsive == "yes"){
	$portfolio_item_content_width_responsive_percent =  brankic_global_or_local("portfolio_item_content_width_responsive_percent");	
	$tablet_class = $portfolio_item_content_width_responsive_percent;
}

$portfolio_item_parallax = brankic_global_or_local("portfolio_item_parallax");
if ($portfolio_item_parallax === TRUE || $portfolio_item_parallax == "yes") $parallax = "parallax"; else $parallax = "";



$portfolio_item_hero_holder_scroll_button = brankic_global_or_local("portfolio_item_hero_holder_scroll_button");
$extra_images_layout = brankic_global_or_local("extra_images_layout");
$extra_images_container_width = brankic_global_or_local("extra_images_container_width");
$portfolio_item_extra_images_fullwidth = brankic_global_or_local("portfolio_item_extra_images_fullwidth");
$portfolio_item_text_container_width = brankic_global_or_local("portfolio_item_text_container_width");
$portfolio_item_style_12_hero_0_container_width = brankic_global_or_local("portfolio_item_style_12_hero_0_container_width");
$portfolio_item_style_12_hero_container_width = brankic_global_or_local("portfolio_item_style_12_hero_container_width");

include(plugin_dir_path( __DIR__ ) . 'brankic-shortcodes-extension/portfolio/' . $portfolio_item_style . '.php');

endwhile;

if ($portfolio_item_sidebar && ($portfolio_item_sidebar != "none")) { ?>
 
                       
							</div><!-- CHILD STICKY-ELEMENT-->
						
					    </div><!-- COL-9 STICKY-WRAP-->
					    
						<div class="col-3 sticky-wrap">
                        
                            <div class="child sticky-element">
							
								<div class="sidebar">
								
									<?php dynamic_sidebar( $portfolio_item_sidebar ); ?>
								
								</div><!-- SIDEBAR-->	
                                    
                            </div><!-- CHILD STICKY-ELEMENT-->		
                                        
                        </div><!-- COL-3 STICKY-WRAP-->
						
					</div><!-- ROW STICK -->
<?php } 

include(get_template_directory() . '/inc/' . $header_style . '_after.php');

get_footer(); 
?>  	