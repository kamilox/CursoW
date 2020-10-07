<?php
$featured_image = brankic_featured_image_url($thumb_sizes);
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
} else {
	$custom_title_color_style = '';
}

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
		$featured_video = get_field("portfolio_item_featured_video");
		$poster_class = "";
		if ($featured_video) {
			$video_url = $featured_video['url'];
			$video_title = $featured_video['title'];
			$video_caption = $featured_video['caption'];
			$video_mime_type = $featured_video['mime_type'];
			
			if ($portfolio_item_featured_video_play == "play_on_hover_poster") $poster_class = "poster_play_on_hover";
			
			if ($portfolio_item_featured_video_play == "autoplay") $html_autoplay = "autoplay"; else $html_autoplay = "";

			$video_html = '<video preload="auto" loop ' . $html_autoplay . ' id="video_id_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted">
			  <source src="' . $video_url . '" type="' . $video_mime_type . '">
			  Your browser does not support the video tag.
			</video>';
		}
?>

            					<div class="swiper-slide">
            
                            		<article class="">
                            
                                        <a href="<?php the_permalink(); ?>">
                                            
                                            <div class="post-media <?php echo $poster_class; ?>">					
												<div class="background-image <?php echo $image_height; ?> <?php echo $duotone; ?>" data-rel="item_id_<?php echo get_the_ID(); ?>">
												<?php if ($featured_video) { echo $video_html; } ?>
												<?php if ($featured_video == "" || $portfolio_item_featured_video_play == "play_on_hover_poster"){ ?>
												<img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes, true, true); ?> />
												<?php } ?>
												</div>
												

                                                            
                                            </div><!-- POST-MEDIA -->
                                            
                                            <div class="post-info">
                                            
                                                <div class="post-info-content" <?php echo $custom_title_color_style; ?>>
                                                    
                                                    <?php if ($show_cats) { ?><span class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>"><?php brankic_list_categories("portfolio_category"); brankic_list_categories();  ?></span><?php } ?>	
                                                    <h4 class="entry-title "><?php the_title(); ?><span class="arrow"></span></h4>
                                                        
                                                </div><!-- POST-INFO-CONTENT -->
                                                    
                                            </div><!-- POST-INFO -->
                                        
                                        </a>
                                        
                                    </article>
                                    
            					</div><!-- SWIPER-SLIDE -->
	<?php }								
