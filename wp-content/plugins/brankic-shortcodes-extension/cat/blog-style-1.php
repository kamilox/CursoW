<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

//$featured_image = brankic_featured_image_url("original");
//$featured_image = brankic_featured_image_url("4x3");
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
							
								<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
                                    
                            	<?php if ($show_date) { ?>
								<aside class="post-meta overlap-date" <?php echo $custom_title_color_style; ?>>
                                	<span class="date"><?php the_time('d'); ?></span>
                                    <span class="month"><?php the_time('F'); ?></span>
                                </aside><!-- POST-META OVERLAP-DATE -->
								<?php } ?>
								
								<div class="divider vertical border">
                                    <span></span>
                                </div><!-- DIVIDER -->
                            
                                <header class="post-title">
								<?php if ($post_format == "") { ?>
                                    <h3 class="entry-title "><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>					
								<?php } ?>
								
								<?php if ($post_format == "quote") { ?>
                                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php echo get_the_excerpt(); ?></a></h3>					
								<?php } ?>
								
								<?php if ($post_format == "link") { ?>
                                    <h3 class="entry-title"><a href="<?php brankic_link_format_url(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>					
								<?php } ?>
                                </header><!-- POST-TITLE -->
								
								<?php if ( $show_author || ($show_tags && $tags) || $show_cats || $show_comments) { ?>
                                                            
                                <aside class="post-meta separate slash <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                    <p>
                                    	<?php if ($show_author) { ?>
										<span><?php esc_html_e('by', 'myriadwp'); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
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
                                </aside><!-- POST-META -->
								
								<?php } ?>
                                
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
																					<iframe src="https://www.youtube.com/embed/<?php echo $video_youtube_id; ?>" allowFullScreen></iframe>
																				</div>
																			</div>
									<?php	
										}
									
									?>
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?>></a>
									<?php } ?>
									
									
									
                                </div><!-- POST-MEDIA -->
                                
								<?php } ?>
								
                                <?php if ($post_format != "quote") { ?>
								
								<?php if ($show_excerpt) { ?><div class="post-excerpt">
                                    <p><?php brankic_excerpt(40); ?></p>
                                </div><!-- POST-EXCERPT -->
								<?php } ?>
								<?php } ?>
                                
                                <aside class="post-footer">
                                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('continue reading', 'myriadwp'); ?></a>
                                </aside><!-- POST-FOOTER -->
                            
                            </article>
<?php } ?>							