<?php
//var_dump($custom_title_colors_array);
$post_format = get_post_format();
	
$tags = get_the_tags();

$featured_image = brankic_featured_image_url("brankic-512-512");

if ($featured_image[0] == "") $featured_image[0] = $no_featured_image;

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns; else $custom_width = 'w-1-' . $columns;

if ($titles_weight != "") $custom_title_weight = 'style="font-weight:' . $titles_weight . '"';
else $custom_title_weight = "";

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {


?>


									<article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>>
										
						                <div class="floating-tooltip only_blog_9">
                                        	<div class="background-image" style="background-image: url(<?php echo $featured_image[0]; ?>);"></div>
                                        </div>
                                            
                                        <div class="post-entry">
										
											<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
                                                
                                            <div class="inner-wrap">
                                                    
                                                <div class="post-content">
			
													<?php if ($show_cats) { ?>
													<aside class="post-meta icons-applied <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
														<p><i class="fa fa-bookmark-o"></i><span><?php the_category(', '); ?></span></p>
													</aside><!-- POST-META -->
													<?php } ?>
                                                
                                                    <header class="post-title">
                                                            
                                                        <h3 class="entry-title " <?php echo $custom_title_weight; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>	
                                                                                
                                                    </header><!-- POST-TITLE -->
                                                            
                                                    <?php if ($show_excerpt) { ?>
													<div class="post-excerpt">
                                                       
														<?php 
												if ($show_excerpt){
												?><p><?php	
													if ($columns == 1) $words = 60; 
													if ($columns == 2) $words = 38;
													if ($columns == 3) $words = 26;
													if ($columns == 4) $words = 20;
													if ($columns == 5) $words = 15;
													if ($columns == 6) $words = 10;
													brankic_excerpt($words); 
												?></p><?php
												} ?>
                                                                
                                                    </div><!-- POST-EXCERPT -->
													<?php } ?>
													
												</div><!-- POST-CONTENT -->
													
													
												<aside class="post-footer post-meta separate dott <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
														
													<p class="post-">
														
														<?php if ($show_author) { ?>
														<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
														<?php } ?>
														
														<?php if ($show_date) { ?>
														<span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
														<?php } ?>

														<?php if ($show_comments) { ?>
														<span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>
														<?php } ?>

														<?php if ($show_tags) { ?><?php if ($tags) { ?>
														<span><?php the_tags('', ', ', ''); ?></span>
														<?php } } ?>

													</p>
															
												</aside><!-- POST-FOOTER -->
                                                
                                                

											</div><!-- INNER-WRAP -->
                                    
										</div><!-- POST-ENTRY -->							
							
	
                                
									</article>
	<?php }						