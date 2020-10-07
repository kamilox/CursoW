                            </div><!-- SWIPER-WRAPPER -->
                            
                                <div class="nav_pag_wrapper">
                                
                                    <div class="swiper-button-next text-link-icon"><span></span></div>
                                    <div class="swiper-button-prev text-link-icon"><span></span></div>
                                            
                                    <div class="swiper-pagination swiper-pagination-fraction"></div>
                                
                                </div>
								
								<?php if ($image_height == "height-100" && $sticky_vertical) { ?>
							</div><!-- SWIPER-CONTAINER -->	
								<?php } ?>
                                        
                                <div class="background-image-holder" <?php echo $img_radius_size_data; ?>>
								
										<?php					
										$cat_query_copy = new WP_Query( $args );
										
										// The Loop
										while ( $cat_query_copy->have_posts() ) : $cat_query_copy->the_post();
											$featured_image = brankic_featured_image_url("full");
											$featured_video = get_field("portfolio_item_featured_video");
											$poster_class = "";
											if ($featured_video) {
												$video_url = $featured_video['url'];
												$video_title = $featured_video['title'];
												$video_caption = $featured_video['caption'];
												$video_mime_type = $featured_video['mime_type'];
												
												if ($portfolio_item_featured_video_play == "play_on_hover_poster") $poster_class = "poster_play_on_hover";
												
												if ($portfolio_item_featured_video_play == "autoplay") $html_autoplay = "autoplay"; else $html_autoplay = "";

												$video_html = '<video preload="auto" loop ' . $html_autoplay . ' id="video_id_new_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted">
												  <source src="' . $video_url . '" type="' . $video_mime_type . '">
												  Your browser does not support the video tag.
												</video>';
											}
											
										?>
											<div class="background-image <?php echo $poster_class; ?> <?php echo $duotone; ?>" data-rel="item_id_<?php echo get_the_ID(); ?>">
												<?php if ($featured_video) { echo $video_html; } ?>
												<?php if ($featured_video == "" || $portfolio_item_featured_video_play == "play_on_hover_poster"){ ?>
												<div style="background-image: url(<?php echo $featured_image[0]; ?>);"></div>
												<?php } ?>
											</div>
										
                                        <?php
										endwhile;
										?>
                                                       
                                </div><!-- END BACKGROUND-IMAGE-HOLDER -->
                        
						<?php if (!($image_height == "height-100" && $sticky_vertical)) { ?>						
                        </div><!-- SWIPER-CONTAINER -->
						<?php } ?>
                                            
                	</div><!-- COL-12-->