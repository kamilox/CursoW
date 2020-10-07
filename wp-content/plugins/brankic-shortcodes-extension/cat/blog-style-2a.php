<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

//$featured_image = brankic_featured_image_url("original");
$featured_image = brankic_featured_image_url($thumb_sizes);

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns;

$custom_title_color_style = "";
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
}

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>
                                <article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>>
								
                                
                                <?php if (brankic_main_post_media() != "none"){ ?>
								
									<div class="post-media <?php echo $duotone; ?>">
										<?php if (brankic_main_post_media() == "featured_image"){ ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?>></a>
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
                                    
                                    <div class="post-entry">
									
										<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
                                                            
                                        <?php if ( $show_date || ($show_tags && $tags) || $show_cats || $show_comments) { ?>
										
										<div class="post-meta icons-applied <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
										
											<?php if ($show_date) { ?>
											<p><i class="fa fa-clock-o"></i><span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span></p>
											<?php } ?>
											
											<?php if ($show_comments) { ?>
											<p><i class="fa fa-commenting-o"></i><span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span></p>
											<?php } ?>	
																
											<?php if ($show_cats) { ?>
											<p><i class="fa fa-bookmark-o"></i><span><?php the_category(', '); ?></span></p>
											<?php } ?>
											
											<?php if ($show_tags) { ?><?php if ($tags) { ?>
											<p><i class="fa fa-folder-open-o"></i><span><?php the_tags('', ', ', ''); ?></span></p>
											<?php } } ?>

                                        </div><!-- POST-META -->

										<?php } ?>
                                    
                                        <header class="post-title">
                                            <h3 class="entry-title "><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>					
                                        </header><!-- POST-TITLE -->
                                        
										<?php if ($show_excerpt) { ?>
                                        <div class="post-excerpt">
                                            <p><?php brankic_excerpt(45); ?></p>
                                        </div><!-- POST-EXCERPT -->
										<?php } ?>
                                        
                                        <aside class="post-footer">
                                                            
                                        	<?php if ($show_author) { ?>
											
											<div class="post-meta <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                            	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
													<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?>
												</a>
                                                <p class="post-author">
                                                	<span><a href="#"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
                                                    <span><small><?php echo get_the_author_meta( 'last_name' )  ?></small></span>
                                                </p>			 													
                                        	</div><!-- POST-META -->
											
											<?php } ?>
                                            
                                        </aside><!-- POST-FOOTER -->
                                    
                                    </div><!-- POST-ENTRY -->
                                
                                </article>
<?php }