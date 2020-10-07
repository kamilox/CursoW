<?php
$tags = get_the_tags();

if (isset($custom_thumb_sizes_array[$i])) $featured_image = brankic_featured_image_url($custom_thumb_sizes_array[$i]); else $featured_image = brankic_featured_image_url($thumb_sizes);

if ($featured_image[0] == "") $featured_image[0] = $no_featured_image;



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


							<article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>>
							
                                <div class="post-entry">
                                    
                                    <div class="inner-wrap">
                                    
                                        <div class="post-media">
                                        
                                            <div class="media-holder <?php echo $poster_class; ?>">
                                                
												<a href="<?php the_permalink(); ?>">
												
													<?php if ($featured_video) { echo $video_html; } ?>
													
													<div class="row-bg-wrap">
                                                        <div class="inner-wrap <?php echo $duotone; ?>">									
                                                            <div class="row-bg background-image" style="background-image: url(<?php echo $featured_image[0]; ?>); background-repeat:no-repeat;background-size:cover; ">
                                                            </div>								
                                                        </div> 
                                                    </div>
													
												</a>
                                            
                                            </div><!-- POST-MEDIA-HOLDER -->
                                                    
                                        </div><!-- POST-MEDIA -->
                                    
                                        <div class="post-info">
                                    								
												<div class="post-info-content">
																			
													<?php if ($show_cats) { ?><span class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>"><?php brankic_list_categories("portfolio_category"); brankic_list_categories();  ?></span><?php } ?>
													<h4 class="entry-title "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>	
																										
												</div><!-- POST-INFO-CONTENT -->
											                                           
                                        </div><!-- POST-INFO -->
                                        
                                    </div><!-- INNER-WRAP -->
                                    
                                </div><!-- POST-ENTRY -->								
                                
                            </article>					