<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

$featured_image = brankic_featured_image_url($thumb_sizes);

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns; else $custom_width = 'w-1-' . $columns;

$custom_height = "";

$custom_title_color_style = "";
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
}

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>
                            <article <?php post_class($custom_width . " " . $custom_height . " " . $wow_class); ?> <?php echo $wow_delay; ?>> 
                                    
                                <div class="post-entry">
									
									<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
                                    
                                    <?php if ($post_format == "") { ?>
									
									
									
									<?php if (brankic_main_post_media() != "none"){ ?>
								
									<div class="post-media">
									
										<?php if ($show_date) { ?>
										<aside class="post-meta date <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
											<span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
											<span></span>
										</aside><!-- POST-META -->
										<?php } ?>
									
										<div class="media-holder">
											<?php if (brankic_main_post_media() == "featured_image"){ ?>
											<a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?>></a>
											<?php } ?>
										</div>
									
										<header class="post-title">
                                            <h3 class="entry-title "><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>					
                                        </header><!-- POST-TITLE -->

										<div class="row-bg-wrap">
											<div class="inner-wrap <?php echo $duotone; ?>">
											
										<?php if (brankic_main_post_media() == "featured_image"){ ?>
										
										
										<div class="row-bg background-image" style="background-image: url(<?php echo $featured_image[0]; ?>);"></div>

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
																						<iframe src="https://player.vimeo.com/video/<?php echo $video_vimeo_id; ?>?title=0&amp;byline=0&amp;portrait=0"  allowFullScreen></iframe>
																					</div>
																				</div>
										<?php
											}
											if (brankic_is_youtube($post_video_url)) {
												$video_youtube_id = brankic_get_youtube_id($post_video_url);
										?>	
																				<div class="responsive-video-div responsive-video-vimeo">
																					<div>
																						<iframe src="https://www.youtube.com/embed/<?php echo $video_youtube_id; ?>"  allowFullScreen></iframe>
																					</div>
																				</div>
										<?php	
											}
										
										?>
										<?php } ?>
										
										
											</div><!-- inner-wrap -->
										
										</div><!-- row-bg-wrap -->
											
                                    </div><!-- POST-MEDIA -->
										
										<?php } ?>
										
										<?php } ?>
										
										<?php if ($post_format == "quote") { ?>
										
										
										
										<div class="post-media">
											
											<?php if ($show_date) { ?>
											<aside class="post-meta date <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
												<span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
												<span></span>
											</aside><!-- POST-META -->
											<?php } ?>
										
                                        	<div class="media-holder">  	
												
												<header class="post-title">
                                                    <blockquote>
														<h3 class="entry-title">
															<a href="<?php the_permalink(); ?>">
                                                            
                                                                <?php echo get_the_excerpt(); ?>
                                                                <small class="uppercase">- <?php the_title(); ?></small>								
                                                            
															</a>
														</h3>
													</blockquote>													
                                                </header>
	
                                            </div><!-- POST-MEDIA-HOLDER -->

										</div><!-- POST-MEDIA -->
										
										<?php } ?>
										
										<?php if ($post_format == "link") { ?>
										
											<div class="post-media">

											<?php if ($show_date) { ?>
												<aside class="post-meta date <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
													<span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
													<span></span>
												</aside><!-- POST-META -->
												<?php } ?>
												
											<div class="media-holder">
										
												<header class="post-title">
                                                    <h3 class="entry-title">
                                                        <a href="<?php brankic_link_format_url(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>					
                                                </header>
												
											</div><!-- POST-MEDIA-HOLDER -->	
												
										</div><!-- POST-MEDIA -->
												
										<?php } ?>
                                    
                                        <?php if ($post_format == "") { ?>
										
										<?php if ( $show_author || ($show_tags && $tags) || $show_cats || $show_comments) { ?>
									
										<aside class="post-footer">
										
											<div class="post-meta separate slash <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
												<p>
													<?php if ($show_author) { ?>
													<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
													<?php } ?>
													
													<?php if ($show_tags) { ?><?php if ($tags) { ?>
													<span><?php the_tags('', ', ', ''); ?></span>
													<?php } } ?>
													
													<?php if ($show_cats) { ?>
													<span><?php the_category(', '); ?></span>
													<?php } ?>
													
													<?php if ($show_comments) { ?>
													<span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>
													<?php } ?>
													
												</p> 
											</div><!-- POST-META -->
											
										</aside><!-- POST-FOOTER -->
									
									<?php } ?>
										                                      
											<?php if ($show_excerpt) { ?>
											<div class="post-excerpt">
											<?php 
											if ($columns == "1") $excerpt_length = 50;
											if ($columns == "2") $excerpt_length = 40;
											if ($columns == "3") $excerpt_length = 30;
											if ($columns == "4") $excerpt_length = 25;
											if ($columns == "5") $excerpt_length = 20;
											if ($columns == "6") $excerpt_length = 15;
											?>
												<p><?php brankic_excerpt($excerpt_length); ?></p>
											</div><!-- POST-EXCERPT -->
											<?php } ?>
										
										<?php } ?>
									
                                    </div><!-- POST-ENTRY -->
                                    
                                
                                </article>	
	<?php }