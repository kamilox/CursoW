<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

$featured_image = brankic_featured_image_url($thumb_sizes);

if ($style == "masonry") $flex_height_r = "";

if (isset($custom_column_widths_array[$i]) && $style != "masonry") $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns; else $custom_width = "";

//if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns;

$custom_title_color_style = "";
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
}

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>


                            <article <?php post_class($custom_width . " " . $wow_class); ?> <?php echo $wow_delay; ?>>
							
							<div class="inner-wrap">
							
							<?php if ($post_format == "") { ?>
							
                                <?php if (brankic_main_post_media() != "none"){ ?>
								
								<div class="post-media <?php echo $duotone; ?> <?php echo $blog_2_image_height; ?>">
									<?php if (brankic_main_post_media() == "featured_image"){ ?>
                                    <a href="<?php the_permalink(); ?>">
										<img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?>>
									</a>
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
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?>></a>
									<?php } ?>
									
									
									
                                </div><!-- POST-MEDIA -->
                                
								<?php } ?>
								
							<?php } // normal post format ?>
                                
                                <div class="post-entry">
								
									<div class="post-meta separate dott <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                                    
										<p class="post-">
											
											<?php if ($show_author) { ?><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span><?php } ?>
                                                
											<?php if ($show_date) { ?><span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span><?php } ?>
																				
											<?php if ($show_comments) { ?><span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span><?php } ?>
											
											<?php if ($show_cats) { ?><span><?php the_category(', '); ?></span><?php } ?>
											
											<?php if ($show_tags) { ?><?php if ($tags) { ?><span><?php esc_html_e('tags', 'myriadwp'); ?>: <?php the_tags('', ', ', ''); ?></span><?php } } ?>
										</p>
															
									</div><!-- POST-META -->
									
									<?php if ($post_format == "") { ?>
									
									<div class="post-content">
                                    
										<header class="post-title">
											<h3 class="entry-title "><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>					
										</header><!-- POST-TITLE -->
												
										<?php if ($show_excerpt) { ?>
										
										<div class="post-excerpt">
												
											<p>
											<?php if ($columns == 1) $words = 60; 
											if ($columns == 2) $words = 30;
											if ($columns == 3) $words = 20;
											if ($columns == 4) $words = 15;
											if ($columns == 5) $words = 12;
											if ($columns == 6) $words = 10;
												brankic_excerpt($words); ?>
											</p>
													
										</div><!-- POST-EXCERPT -->
										
										<?php } ?>
									
									</div><!-- POST-CONTENT -->
									
									<?php } // normal post format ?>
									
									<?php if ($post_format == "link") { ?>
									
									<div class="post-content">
                                    
										<header class="post-title">
											<h3 class="entry-title"><a href="<?php brankic_link_format_url(); ?>"><?php the_title(); ?></a></h3>					
										</header><!-- POST-TITLE -->
												
										<?php if ($show_excerpt) { ?>
										<div class="post-excerpt">
												
											<p><?php if ($columns == 1) $words = 60; 
											if ($columns == 2) $words = 30;
											if ($columns == 3) $words = 20;
											if ($columns == 4) $words = 15;
											if ($columns == 5) $words = 12;
											if ($columns == 6) $words = 10;
												 brankic_excerpt($words); ?></p>
													
										</div><!-- POST-EXCERPT -->
										<?php } ?>
									
									</div><!-- POST-CONTENT -->
									
									<?php } // link post format ?>
									
									<?php if ($post_format == "quote") { ?>
									
									<div class="post-content">
                                    
										<header class="post-title">
											<blockquote>
											
												<h3 class="entry-title">							
													
														<a href="<?php the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a>
														<small class="uppercase">- <?php the_title(); ?></small>													
												
												</h3>
											</blockquote>											
										</header><!-- POST-TITLE -->
									
									</div><!-- POST-CONTENT -->
									
									<?php } // quote post format ?>
                                    
                                </div><!-- POST-ENTRY -->
								
								<?php if ($post_format == "") { ?>
								
								<a href="<?php the_permalink(); ?>" class="cont_read"><small class="uppercase w-700"><?php esc_html_e('continue reading', 'myriadwp'); ?></small></a>
								
								<?php } ?>

								</div><!-- INNER-WRAP -->								

							</article>
<?php }							