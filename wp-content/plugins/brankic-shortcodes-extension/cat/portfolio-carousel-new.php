<?php
$featured_image = brankic_featured_image_url("original");

if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
} else {
	$custom_title_color_style = '';
}
?>

            					<div class="swiper-slide" data-rel="item_id_<?php echo get_the_ID(); ?>">
            
                            		<article class="">
                            				
										<div class="post-info">
										
											<div class="post-info-content">
											
												<?php if ($show_cats) { ?>
												<p class="entry-category"><?php brankic_list_categories("portfolio_category"); brankic_list_categories();  ?></p>
												<?php } ?>
												
												<h4 class="entry-title ">
												
													<a href="<?php the_permalink(); ?>">
													
														<?php the_title(); ?>
													
													</a>
													
												</h4>
			
											
											<?php if ( $show_author || ($show_tags && $tags) || $show_date) { ?>
									
											
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
														<?php if ($show_comments) { ?>
															<span><?php esc_html_e('with', 'myriadwp'); ?> <?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>
														<?php } ?> 	
														
													</p>   
												</div><!-- POST-META -->
												
											
											<?php } ?>
											
											</div><!-- POST-INFO-CONTENT -->
											
												
										</div><!-- POST-INFO -->
                                                                                  
                                    </article>
                                    
            					</div><!-- SWIPER-SLIDE -->			
