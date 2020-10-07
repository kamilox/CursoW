					<article <?php post_class(array($wow_class, "emphasize-post")); ?> <?php echo $wow_delay; ?>>
                                
                        	<div class="emphasize-post-entry">
                                                        
                            	<?php if ($show_cats) { ?>								
                            	<div class="emphasize-post-category emphasize-post-tags <?php echo esc_attr($post_meta_style . " " . $post_meta_small . " " . $post_meta_bold) ?>">
                                	<span><?php the_category(' '); ?></span>
                                </div><!-- POST-META -->
								<?php } ?>
                                    
                                <div class="emphasize-inner-wrap">
                                
                                	<?php if (brankic_main_post_media() != "none"){ ?>
								
									<div class="emphasize-post-media <?php echo $duotone; ?>">
										<?php if (brankic_main_post_media() == "featured_image"){ 
										
										$featured_image = brankic_featured_image_url("brankic-1024-512");
										
										?>
										<div class="emphasize-background-image" style="background-image: url(<?php echo $featured_image[0]; ?>);"></div>
										<?php } ?>
										
										<?php if (brankic_main_post_media() == "post_video_audio_from_media_library"){ 
											$post_video_audio_from_media_library = get_field("post_video_audio_from_media_library");
											if (substr($post_video_audio_from_media_library["mime_type"], 0, 5) == "audio"){
												brankic_featured_audio($post_video_audio_from_media_library["url"]);
											}
											if (substr($post_video_audio_from_media_library["mime_type"], 0, 5) == "video"){
												brankic_featured_video($post_video_audio_from_media_library);
											}
										} ?>

									
										<?php if (brankic_main_post_media() == "post_video_url"){
											$post_video_url = get_field("post_video_url");		
											if (brankic_is_vimeo($post_video_url)) {
												$video_vimeo_id = brankic_get_vimeo_id($post_video_url);
										?>
																				<div class="responsive-video-div responsive-video-vimeo">
																					<div>
																						<iframe src="https://player.vimeo.com/video/<?php echo $video_vimeo_id; ?>?title=0&amp;byline=0&amp;portrait=0" allowFullScreen></iframe>
																					</div>
																				</div>
										<?php
											}
											if (brankic_is_youtube($post_video_url)) {
												$video_youtube_id = brankic_get_youtube_id($post_video_url);
										?>	
																				<div class="responsive-video-div responsive-video-vimeo">
																					<div>
																						<iframe src="https://www.youtube.com/embed/<?php echo $video_youtube_id; ?>" allowFullScreen></iframe>
																					</div>
																				</div>
										<?php	
											}
										
										?>
										<?php } ?>
										
										
										
									</div><!-- POST-MEDIA -->
									
									<?php } ?>
                                        
                                    <div class="emphasize-post-content">
                                        
                                    	<header class="emphasize-post-title">
                                        	<h3 class="emphasize-entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>										
                                        </header><!-- POST-TITLE -->
										
										<?php if ($emphasize_show_excerpt == "true") { ?>
										<div class="emphasize-post-excerpt">
											<p><?php brankic_excerpt(40); ?></p>
										</div><!-- POST-EXCERPT -->
										<?php } ?>
                                            
                                         <aside class="emphasize-post-meta separate slash <?php echo esc_attr($post_meta_style . " " . $post_meta_small . " " . $post_meta_bold) ?>">
                                         	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?></a>
                                            <p class="post-">
                                            	<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
                                                <?php if ($show_tags) { ?><?php if ($tags) { ?>
											<span><?php the_tags('', ', ', ''); ?></span>
											<?php } } ?>
										<?php if ($show_date) { ?>
										<span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
										<?php } ?>
                                        
										<?php if ($show_comments) { ?>
										<span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>								
										<?php } ?>
                                            </p> 			
                                        </aside><!-- POST-META -->
                                    
                                    </div><!-- POST-CONTENT -->
                                    
                                </div><!-- INNER-WRAP -->
                                
                            </div><!-- POST-ENTRY -->
                            
                        </article><!-- EMPHASIZE-POST -->