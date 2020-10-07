<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

$thumb_sizes_R = $thumb_sizes;
$thumb_sizes_temp = "";

if ($style != "flex") $flex_height_r = "";



if (isset($custom_column_widths_array[$i])) {
	$custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns;
	if ($custom_column_widths_array[$i] > 1){
		$thumb_sizes_temp = "brankic-1024-512";
	}
}	else {
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

if (isset($custom_thumb_sizes_array[$i])) $featured_image = brankic_featured_image_url($custom_thumb_sizes_array[$i]); else $featured_image = brankic_featured_image_url($thumb_sizes_temp);


$custom_title_color_style = "";
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
} 



if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>


<?php if ($style == "grid" || $style == "flex" || $style == "masonry") { ?> <article <?php post_class($custom_width . " " . $wow_class); ?> <?php echo $wow_delay; ?> > <?php } ?>
							
<?php if ($style == "grid_advanced") { ?> <article <?php post_class($custom_width_height . " grider-item " . $wow_class); ?> <?php echo $wow_delay; ?>> <?php } ?>							
                                
                                <div class="post-entry <?php echo $flex_height_r; ?>" <?php echo $custom_title_color_style; ?>>
								
									<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
								
									<?php if (brankic_main_post_media() != "none"){ ?>
									
									<div class="post-media <?php echo $duotone; ?>">
                                        
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes); ?> /></a>
										
									</div><!-- POST-MEDIA -->
                                    
                                    <?php } ?>
									
									<div class="inner-wrap">
                                
                                        <?php if ($show_cats) { ?>
										<div class="post-category post-tags <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
											<span><?php the_category(' '); ?></span>
										</div>
										<?php } ?>
                                        
                                        <div class="post-content">
										
											<header class="post-title">
                                            
                                                <h3 class="entry-title "><a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>
                                                					
                                            </header><!-- POST-TITLE -->
										
										<?php if ( $show_author || ($show_tags && $tags) || $show_date || $show_comments) { ?>
                                            
                                            <aside class="post-meta <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>" <?php echo $custom_title_color_style; ?>>
                                            	<?php if ($show_author) { ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?></a><?php } ?>
                                            	
												<p class="post-author">
                                                	
													<?php if ($show_author) { ?><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span><?php } ?>
                                                    
													<?php if ($show_date) { ?><span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span><?php } ?>
													
													<?php if ($show_tags) { ?><?php if ($tags) { ?><span><?php the_tags('', ' ', ''); ?></span><?php } } ?>
													
													<?php if ($show_comments) { ?><span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>
													<?php } ?>
                                            	</p>
												
												
  				
                                            </aside><!-- POST-META -->
                                                                     
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
									
                                        </div><!-- POST-CONTENT -->
                                    
                                    </div><!-- INNER-WRAP -->
                                
                                </div><!-- POST-ENTRY -->
                            
                            </article>
<?php }							