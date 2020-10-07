<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

$featured_image = brankic_featured_image_url($thumb_sizes);

if ($columns > 2) $columns = 2;

$custom_title_color_style = "";
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
} 

if ($emphasize_first_post == "true" && $i == 0) {
	?><div class="article-row"><?php 
	include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	?></div><?php
} else {
?>

<?php if ($columns == 2) { ?>

	<?php if (fmod($i, 2) == 0 && $i > 1 && $emphasize_first_post != "true") { ?>
							</div> <!-- end article-row -->
	<?php } ?>

	<?php if (fmod($i, 2) == 0 && $emphasize_first_post != "true") { ?>
							<div class="article-row">
	<?php } ?>
	
	<?php if (fmod($i, 2) == 1 && $i > 1 && $emphasize_first_post == "true") { ?>
							</div> <!-- end article-row -->
	<?php } ?>

	<?php if (fmod($i, 2) == 1 && $emphasize_first_post == "true") { ?>
							<div class="article-row">
	<?php } ?>

<?php } ?>


                            <article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>>
							
								<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
                                                                     
                                    <div class="post-entry">
                                    
                                    	<div class="post-media">
                                        	<div class="background-image" style="background-image: url(<?php echo $featured_image[0]; ?>);"></div>
                                        </div><!-- POST-MEDIA -->
                                        
                                        <div class="inner-wrap">
                                            
                                            <div class="post-content">
                                        
                                                <?php if ($show_cats) { ?>
												
												<aside class="post-meta post-tags post-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                                
                                                    <p><span><?php the_category(' '); ?></span></p> 	
                                                                
                                                </aside><!-- POST-META POST-CATEGORY -->
                                                
												<?php } ?>
												
                                                <div class="post-content-inner">
                                        
                                                    <header class="post-title">
                                                    
                                                        <h3 class="entry-title "><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>	
                                                                        
                                                    </header><!-- POST-TITLE -->
                                            
                                                    <?php if ( ($show_tags && $tags) || $show_date || $show_comments) { ?>
													
													<aside class="post-meta <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                                    
                                                        <p>
                                                        	<?php if ($show_date) { ?>
															<span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
                                                			<?php } ?>
															
															<?php if ($show_comments) { ?>
															<span class="divider">/</span>
                                                            <span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>
                                                			<?php } ?>
															
															<?php if ($show_tags) { ?><?php if ($tags) { ?>
															<span class="divider">/</span>
                                                            <span><?php the_tags('', ', ', ''); ?></span>
															<?php } }?>
															
                                                    	</p>
                                                                        
                                                    </aside><!-- POST-META -->
													
													<?php } ?>
                                                    
                                                    <?php if ($show_excerpt) { ?>
													<div class="post-excerpt">
													
													<?php
														if ($columns == "1") $excerpt_length = 40;
														if ($columns == "2") $excerpt_length = 25;
													?>
														<p><?php brankic_excerpt($excerpt_length); ?></p>
                                                    
                                                    </div><!-- POST-EXCERPT -->
													<?php } ?>
                                                
                                                </div><!-- POST-CONTENT-INNER -->
                                            
												<?php if ($show_author) { ?>
                                                
												<aside class="post-footer">

													<div class="post-meta <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
														<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?></a>
														<p class="post-author">
															<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
												<?php if (get_the_author_meta( 'position' ) != "") { ?><span><small><?php echo get_the_author_meta( 'position' );  ?></small></span><?php } ?>
														</p>				 													
													</div><!-- POST-META -->
										                                                        
                                                </aside><!-- POST-FOOTER -->
												
												<?php } ?>
                                           
  										    </div><!-- POST-CONTENT -->
                                        
                                        </div><!-- INNER-WRAP -->
                                    
                                    </div><!-- POST-ENTRY -->
                                
                                </article>							
<?php }								