<?php
$featured_image = brankic_featured_image_url("brankic-512-512");
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
} else {
	$custom_title_color_style = '';
}
$featured_video = get_field("portfolio_item_featured_video");
$poster_class = "";
if ($featured_video) {
	$video_url = $featured_video['url'];
	$video_title = $featured_video['title'];
	$video_caption = $featured_video['caption'];
	$video_mime_type = $featured_video['mime_type'];
	
	if ($portfolio_item_featured_video_play == "play_on_hover_poster") $poster_class = "poster_play_on_hover";
	
	//if ($portfolio_item_featured_video_play == "autoplay") $html_autoplay = "autoplay"; else $html_autoplay = "";

	$video_html = '<video preload="auto" loop autoplay id="video_id_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted">
	  <source src="' . $video_url . '" type="' . $video_mime_type . '">
	  Your browser does not support the video tag.
	</video>';
}
?>


<li>
	<div class="floating-tooltip <?php if ($fixed_tooltip != "true") { ?>outset_only<?php } ?>" >
		<div class="<?php echo $duotone; ?>" >
		
			<?php if ($featured_video) { echo $video_html; } ?>
			<?php if ($featured_video == ""){ ?>
			<img src="<?php echo $featured_image[0]; ?>" alt=""/>
			<?php } ?>
			
		</div>
	</div>
	<h3 class=""><a href="<?php the_permalink(); ?>" data-rel="item_id_<?php echo get_the_ID(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>
	<?php if ($show_cats) { ?><span class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>"><?php brankic_list_categories("portfolio_category"); brankic_list_categories();  ?></span><?php } ?>	
</li>
