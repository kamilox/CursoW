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
                                
                                            <div class="article-holder">
                                                
                                                <div class="post-info">
                                                
                                                    <div class="post-info-content">
                                                    
													<?php if ($show_cats) { ?>
                                                    <div class="post-category post-tags">
														<span><?php the_category(' '); the_terms( $post->ID, 'portfolio_category', '', " ", '' ); ?></span>
													</div>
													<?php } ?>
													
													<?php if ($show_tags && $tags) { ?>
                                                    <div class="post-category post-tags">
														<?php if ($show_tags) { ?><?php if ($tags) { ?><span><?php the_tags('', ' ', ''); ?></span><?php } } ?>
													</div>
													<?php } ?>
													
                                                    <?php if ( $show_author || $show_date || $show_comments) { ?>
                                                    <div class="post-meta">  

													<?php if ($show_author) { ?><span class="post-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?> <?php echo get_the_author_meta( 'user_nicename' ) ; ?></a></span><?php } ?>
                                                    
													<?php if ($show_date) { ?><span class="post-date"><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span><?php } ?>
																										
                                                    <?php if ($show_comments) { ?><span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span><?php } ?>    						                           	                              
													</div>
                                                    <?php } ?>
													
                                                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            
                                                    </div><!-- POST-INFO-CONTENT -->
                                                    
													<?php if ($show_excerpt) { ?>
                                                    <div class="post-excerpt">
                                                    
														<?php brankic_excerpt(100); ?>                                                    
														
                                                    </div><!-- POST-EXCERPT -->
													<?php } ?>
                                                
                                                    <?php if ($read_more != "") { ?>
													
													<div class="post-link">
                                                    
                                                        <small class="uppercase w-700"><a href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?></a></small>
                                                            
                                                    </div><!-- POST-LINK -->
													
													<?php } ?>
                                                        
                                                </div><!-- POST-INFO -->
                                            
                                            </div><!-- ARTICLE-HOLDER -->
                                            
                                        </article>
                                    
            					</div><!-- SWIPER-SLIDE -->		