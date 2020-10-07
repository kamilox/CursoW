<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

if ($style != "flex") $flex_height_r = "";

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns; else $custom_width = "";

$custom_title_color_style = "";
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
}

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>
                            <article <?php post_class($custom_width . " " . $wow_class . " " . $flex_height_r); ?> <?php echo $wow_delay; ?>>
                                    
                            	<div class="post-entry">
								
									<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
                                        
                                	<div class="inner-wrap">
                                            
                                    	<div class="post-content">
                                        
                                        	<header class="post-title">
                                                    
                                            	<h3 class="entry-title "><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>	
                                                                        
                                            </header><!-- POST-TITLE -->
                                                                                                      
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
											
										</div><!-- POST-CONTENT -->
                                            
										<?php if ( $show_author || ($show_tags && $tags) || $show_date || $show_comments || $show_cats) { ?>
										
										<aside class="post-footer">
												
											<div class="post-meta separate dott <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
												<p>
													<?php if ($show_author) { ?>
													<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
													<?php } ?>
													
													<?php if ($show_date) { ?>
													<span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
													<?php } ?>
													

													<?php if ($show_cats) { ?>
													<span><?php the_category(', '); ?></span>
													<?php } ?>
													
													<?php if ($show_comments) { ?>
													<span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>
													<?php } ?>
													
													<?php if ($show_tags) { ?><?php if ($tags) { ?>
													<span><?php the_tags('', ', ', ''); ?></span>
													<?php } } ?>

												</p>  
											</div><!-- POST-META -->
													
										</aside><!-- POST-FOOTER -->
										
										<?php } ?>
                                        
                                	</div><!-- INNER-WRAP -->
                                    
                                </div><!-- POST-ENTRY -->
                                
                            </article>
<?php }							