<?php
//var_dump($custom_title_colors_array);
$post_format = get_post_format();
	
$tags = get_the_tags();

if (isset($custom_thumb_sizes_array[$i])) $featured_image = brankic_featured_image_url($custom_thumb_sizes_array[$i]); else $featured_image = brankic_featured_image_url($thumb_sizes);

if ($featured_image[0] == "") $featured_image[0] = $no_featured_image;

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns; else $custom_width = 'w-1-' . $columns;

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
						
		$video_html = '<video preload="auto" loop ' . $html_autoplay . ' id="video_id_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted" data-rel="item_id_' . get_the_ID() . '">
		  <source src="' . $video_url . '" type="' . $video_mime_type . '">
		  Your browser does not support the video tag.
		</video>';
	}


?>


<?php if ($style == "masonry") { ?>							<article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>>

<?php } else { ?> <article <?php post_class($custom_width . " " . $wow_class); ?> <?php echo $wow_delay; ?>> <?php } ?>
  							
                                <div class="post-entry">
                                    
                                    <div class="inner-wrap">
                                    
                                        <div class="post-media">
                                        
                                            <div class="media-holder <?php echo $duotone; ?> <?php echo $poster_class; ?>">
                                                
<?php if ($style == "masonry" || $style == "grid") { ?> 

<a href="<?php the_permalink(); ?>">

	<?php if ($featured_video) { echo $video_html; } ?>
	<img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?> />
	
</a>
												
<?php } else { ?>												<a href="<?php the_permalink(); ?>">

																	<?php if ($featured_video) { echo $video_html; } ?>
																	<img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?> />

																</a><?php } ?>
                                            
                                            </div><!-- POST-MEDIA-HOLDER -->
                                                    
                                        </div><!-- POST-MEDIA -->
                                    
                                        <div class="post-info floating-tooltip not_outset">
                                    
                                            <div class="post-info-content">
                                            
                                                <h4 class="entry-title "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>	
                                                <?php if ($show_cats) { ?><span class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>"><?php brankic_list_categories("portfolio_category"); brankic_list_categories();  ?></span><?php } ?>	
                                                
                                            </div><!-- POST-INFO-CONTENT -->
                                           
                                        </div><!-- POST-INFO -->
										
										
                                        
                                    </div><!-- INNER-WRAP -->
                                    
                                </div><!-- POST-ENTRY -->							
							
	
                                
                            </article>
	<?php }							