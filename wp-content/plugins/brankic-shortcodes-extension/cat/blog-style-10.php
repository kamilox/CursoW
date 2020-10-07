<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

$featured_image = brankic_featured_image_url($thumb_sizes);

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns;

$custom_title_color_style = "";
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
} else {
	if ($title_color != "") $custom_title_color_style = 'style="color:' . $title_color . '"';
}

if (isset($custom_title_hovers_array[$i])) $custom_hover_color = $custom_title_hovers_array[$i]; else $custom_hover_color = $hover_color; 

if (isset($custom_title_colors_array[$i])) $custom_title_color = $custom_title_colors_array[$i]; else $custom_title_color = $title_color;

wp_register_style( 'dummy-handle', false );
wp_enqueue_style( 'dummy-handle' );

$custom_css = "";
$j = $i + 1;
if (isset($custom_title_colors_array[$i]) || isset($custom_title_hovers_array[$i])) {
 $custom_css = 'article:nth-child(' . $j . ') .flow {
	position:relative;
	background: linear-gradient(to left, ' . $custom_title_color . ' 50%, ' . $custom_hover_color . ' 50%);
	background-size: 200% 100%;
	background-position:right bottom;
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	transition: 0.6s;
	-webkit-transition: 0.6s;
}
article:nth-child(' . $j . ') .flow:hover {
    background-position:left bottom;
}'; 
 wp_add_inline_style( 'dummy-handle', $custom_css ); 
}

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>


                            <article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>>
							
                                <a href="<?php the_permalink(); ?>" class="overlay_link"></a>
								
                            	<div class="post-media">
     
									<?php if ($show_date) { ?>
									<div class="entry-category">
                                        <p class="entry-number"><span><?php the_time('d'); ?></span></p>	
                                        <span class="rotate"><?php the_time('F'); ?></span>	
                                    </div>
									<?php } ?>
                                            
                                	
									<?php if (brankic_main_post_media() != "none"){ ?>
									<div class="media-holder <?php echo $duotone; ?>">
                                                    
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
									<?php } ?>
										
                                                
									</div><!-- POST-MEDIA-HOLDER -->
									<?php } ?>
                                                    
                                </div><!-- POST-MEDIA -->
                                    
                                <div class="post-info">
                                
                                	<div class="post-info-entry">
                                        
                                        <header class="post-title">
                                            <h3 class="entry-title flow ">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </header>
                                        
										<?php if ($show_excerpt) { ?>
                                        <div class="post-excerpt">
                                            <p><?php brankic_excerpt(30); ?></p>
                                        </div><!-- POST-EXCERPT -->
										<?php } ?>
                                    
                                        <?php if ( $show_author || ($show_tags && $tags) || $show_cats || $show_comments) { ?>
										
										<aside class="post-footer">
                                           
											<div class="post-meta <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                                <?php if ($show_author) { ?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?></a>
                                                <?php } ?>
												
												<p class="post-author">
                                                    <?php if ($show_author) { ?><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span><?php } ?>
                                                    
													<?php if ($show_author) { ?>
													<?php if (get_the_author_meta( 'position' ) != "") { ?><span><small><?php echo get_the_author_meta( 'position' );  ?></small></span><?php } ?>
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
									
                                    </div><!-- POST-INFO-ENTRY -->	
                                            
                            	</div><!-- POST-INFO -->
                                
                            </article>
<?php }							