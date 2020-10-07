<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

$featured_image = brankic_featured_image_url("original");

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns;
if (isset($custom_title_colors_array[$i])) $custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; else $custom_title_color_style = 'style="color:' . $title_color . '"';


if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>

                            <article <?php post_class($custom_width . " " . $wow_class); ?> <?php echo $wow_delay; ?>>
                                
                                <div class="post-entry">
                                    
                                    <div class="inner-wrap">
                                
                                        <div class="post-media">
                                            <div class="background-image" style="background-image: url(<?php echo $featured_image[0]; ?>);"></div>
                                        </div>
                                        
                                        <div class="post-content">
                                            
                                            <aside class="post-meta <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                                <p>
													<?php if ($show_date) { ?><span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span><?php } ?>
													<?php if ($show_author) { ?><span><?php the_author_link(); ?></span><?php } ?>
												</p> 				
                                            </aside>
                                    
                                            <header class="post-title">
                                                <h3 class="entry-title "><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>					
                                            </header>
											
											<ul class="<?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
												<?php if ($show_cats) { ?><li><span><?php esc_html_e('in', 'myriadwp'); ?></span> <?php the_category(', '); ?></li><?php } ?>
												<?php if ($show_tags) { ?><?php if ($tags) { ?>
												<li><span><?php esc_html_e('tags', 'myriadwp'); ?></span> <?php the_tags('', ', ', ''); ?></li>											
												<?php } ?><?php } ?>
												<?php if ($show_comments) { ?><li><?php comments_popup_link( wp_kses( __('<span>0</span> comments', 'myriadwp'), array("span")), wp_kses( __('<span>1</span> comment', 'myriadwp'), array("span")), wp_kses( __('<span>%</span> comments', 'myriadwp'), array("span"))); ?></li><?php } ?>
                                            </ul>
                                    
                                        </div><!-- POST-CONTENT -->
                                    
                                    </div><!-- INNER-WRAP -->
                                
                                </div><!-- POST-ENTRY -->
                            
                            </article>
	<?php }