<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

$thumb_sizes_R = $thumb_sizes;
$thumb_sizes_temp = "";

if ($style != "flex") $flex_height_r = "";

if (isset($custom_column_widths_array[$i]) && $style != "masonry") {
	$custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns; 
	if ($custom_column_widths_array[$i] > 1){
		$thumb_sizes_temp = "brankic-1024-512";
	}
} else {
	$custom_width = "";
}

if (isset($custom_article_width_height_array[$i])) {
	$custom_width_height = $custom_article_width_height_array[$i]; 
	if (substr_count($custom_width_height, "w2") == 1){
		$thumb_sizes_temp = "brankic-1024-512";
	}
	if (substr_count($custom_width_height, "h2") == 1){
		$thumb_sizes_temp = "brankic-512-1024";
	}
	if (substr_count($custom_width_height, "h2") == 1 && substr_count($custom_width_height, "w2") == 1){
		$thumb_sizes_temp = "brankic-1024-1024";
	}
} else {
	$custom_width_height = ''; // grid_advanced
}

if ($thumb_sizes_temp == "") $thumb_sizes_temp = $thumb_sizes_R;

$featured_image = brankic_featured_image_url($thumb_sizes_temp);

$custom_title_color_style = "";
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
}

if ($featured_image[0] != "") $article_media_class = "media_active"; else $article_media_class = "";

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>
<?php if ($style == "grid" || $style == "flex" || $style == "masonry") { ?><article <?php post_class($custom_width . " " . $wow_class . " " . $flex_height_r . " " . $article_media_class); ?> <?php echo $wow_delay; ?> <?php echo $custom_title_color_style; ?>> <?php } ?>
							                               
<?php if ($style == "grid_advanced") { ?><article <?php post_class($custom_width_height . " grider-item " . $wow_class . " " . $article_media_class); ?> <?php echo $wow_delay; ?> <?php echo $custom_title_color_style; ?>> <?php } ?>                                

								<div class="post-entry">
								
								<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
                                
								
								<div class="post-media <?php echo $duotone; ?>">
								<?php if ($featured_image[0] != "") { ?>
                                	
                                    	<a href="<?php the_permalink(); ?>">
											<img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes_temp); ?> />
										</a>
										
								<?php }?> 
								</div><!-- POST-MEDIA -->
                                            
                                    <?php if ($show_cats) { ?>
									
									<aside class="post-meta post-category post-tags <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                    	<p><span><?php the_category(', '); ?></span></p> 				
 									</aside><!-- POST-META POST-CATEGORY -->
                                    
									<?php } ?>
									
                                    <div class="inner-wrap" <?php echo $custom_title_color_style; ?>>
                                        
                                        <div class="post-content">
                                    
                                            <header class="post-title" >
                                                
												<?php if ($post_format == "quote") { ?>
												<blockquote>
												<h3 class="entry-title ">
														<a href="<?php the_permalink(); ?>">
                                                            
                                                                <?php echo get_the_excerpt(); ?>
                                                                <small class="uppercase">- <?php the_title(); ?></small>								
                                                            
                                                        </a>
												</h3>
												</blockquote>
												<?php } ?>
												
												<?php if ($post_format == "link") { ?>
												<h3 class="entry-title ">
														<a href="<?php brankic_link_format_url(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
												</h3>
												<?php } ?>
												
												<?php if ($post_format == "") { ?>
												<h3 class="entry-title ">
														<a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a>
												</h3>
												<?php } ?>
												
																	
                                            </header><!-- POST-TITLE -->
                                            

                                            <?php if ($show_comments) { ?>
											<aside class="post-meta <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
												<p>
                                                    <span><?php esc_html_e('with', 'myriadwp'); ?> <?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>
												</p>
											</aside>
											<?php } ?>  

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
                                    
                                    </div><!-- INNER-WRAP -->
                                    
                                    <?php if ( $show_author || ($show_tags && $tags) || $show_date) { ?>
									
									<aside class="post-footer" <?php echo $custom_title_color_style; ?>>
                                    
                                        <div class="post-meta separate dott <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                            <p>
                                                <?php if ($show_author) { ?>
												<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
                                                <?php } ?>
												
												<?php if ($show_date) { ?>
												<span><?php esc_html_e('on', 'myriadwp'); ?> <?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
												<?php } ?>
												
												<?php if ($show_tags) { ?><?php if ($tags) { ?>
													<span><?php esc_html_e('tags', 'myriadwp'); ?><?php the_tags('', ', ', ''); ?> </span>
													<?php } }?>
												
                                            </p>   
                                        </div><!-- POST-META -->
                                        
                                	</aside><!-- POST-FOOTER -->
									
									<?php } ?>
                                
                                </div><!-- POST-ENTRY -->
                            
                            </article>
<?php }							