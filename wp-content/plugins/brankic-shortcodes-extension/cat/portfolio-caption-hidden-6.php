<?php
//var_dump($custom_title_colors_array);
$post_format = get_post_format();
	
$tags = get_the_tags();

if (isset($custom_thumb_sizes_array[$i])) $featured_image = brankic_featured_image_url($custom_thumb_sizes_array[$i]); else $featured_image = brankic_featured_image_url($thumb_sizes);

if ($featured_image[0] == "") $featured_image[0] = $no_featured_image;

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns; else $custom_width = 'w-1-' . $columns;

if (isset($custom_article_width_height_array[$i])) $custom_width_height = $custom_article_width_height_array[$i]; else $custom_width_height = ''; // grid_advanced

if (isset($custom_title_hovers_array[$i])) $custom_hover_color = $custom_title_hovers_array[$i]; else $custom_hover_color = $hover_color; 

if (isset($custom_title_colors_array[$i])) $custom_title_color = $custom_title_colors_array[$i]; else $custom_title_color = $title_color;

wp_register_style( 'dummy-handle', false );
wp_enqueue_style( 'dummy-handle' );

$custom_css = "";
$j = $i + 1;
if (isset($custom_title_colors_array[$i]) || isset($custom_title_hovers_array[$i])) {
	
	$custom_css_selector = '.fig_hid.hover6 article:nth-child(' . $j . ') .entry-title, .fig_hid.hover6 article:nth-child(' . $j . ') .entry-category'; 
	$custom_css_declaration = '{color: ' . $custom_title_color . '!important;}';
	$custom_css = $custom_css_selector . $custom_css_declaration;
	
	//echo "$page_id_r $custom_css";
	
	$old_database_css = get_post_meta( $page_id_r, '_brankic_custom_title_css', true);
	
	if (substr_count($old_database_css, $custom_css_selector) == 1 && substr_count($old_database_css, $custom_css) == 0){
		//replace old line with new
		$old_start = strpos($old_database_css, $custom_css_selector);
		$old_end = strpos($old_database_css, "}", $old_start);
		$length = $old_end - $old_start + 1;
		$old_line = substr($old_database_css, $old_start, $length);
		$new_database_css = str_replace($old_line, $custom_css, $old_database_css);
		//update_post_meta( $page_id_r, '_brankic_custom_title_css', $new_database_css);
	} 
	
	//if (substr_count($old_database_css, $custom_css_selector) == 0) update_post_meta( $page_id_r, '_brankic_custom_title_css', $old_database_css . $custom_css);

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
						
		$video_html = '<video preload="auto" loop ' . $html_autoplay . ' id="video_id_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted" data-rel="item_id_' . get_the_ID() . '">
		  <source src="' . $video_url . '" type="' . $video_mime_type . '">
		  Your browser does not support the video tag.
		</video>';
	}
?>


<?php if ($style == "masonry") { ?>	<article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>><?php } ?>

<?php if ($style == "grid" || $style == "flex") { ?> <article <?php post_class($custom_width . " " . $wow_class); ?> <?php echo $wow_delay; ?>> <?php } ?>

<?php if ($style == "grid_advanced") { ?> <article <?php post_class($custom_width_height . " grider-item " . $wow_class); ?> <?php echo $wow_delay; ?>> <?php } ?>
							
                                <div class="post-entry">
								                                  
                                    <div class="inner-wrap">
                                    
                                        <div class="post-media">
                                        
                                            <div class="media-holder <?php echo $duotone; ?> <?php echo $poster_class; ?>">
                                                
												<a href="<?php the_permalink(); ?>">
												
													<?php if ($featured_video) { echo $video_html; } ?>
													<img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?> />
													
												</a>
                                            
                                            </div><!-- POST-MEDIA-HOLDER -->
                                                    
                                        </div><!-- POST-MEDIA -->
                                    
                                        <div class="post-info">
										
											<a href="<?php the_permalink(); ?>">
										
												<div class="post-info-content">
												
													<?php if ($show_cats) { ?><p class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>"><?php brankic_list_categories("portfolio_category"); brankic_list_categories();  ?></p><?php } ?>
													<h4 class="entry-title "><?php the_title(); ?><span class="arrow"></span></h4>	
																											
												</div><!-- POST-INFO-CONTENT -->
											
											</a>
                                            
                                        </div><!-- POST-INFO -->
                                        
                                    </div><!-- INNER-WRAP -->
                                    
                                </div><!-- POST-ENTRY -->							
							
	
                                
                            </article>
	<?php }							