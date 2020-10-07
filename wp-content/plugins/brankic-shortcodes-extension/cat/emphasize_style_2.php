                        <article <?php post_class(array($wow_class, "emphasize-post-split", "minimal")); ?> <?php echo $wow_delay; ?>>
                                    
                        	<div class="emphasize-post-entry">
                                    
                                <header class="emphasize-post-title">
                                	<h3 class="emphasize-entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>					
                                </header><!-- POST-TITLE -->
								
								<?php if ($emphasize_show_excerpt == "true") { ?>
								<div class="emphasize-post-excerpt">
                                	<p><?php brankic_excerpt(40); ?></p>
                                </div><!-- POST-EXCERPT -->
								<?php } ?>
                                            
                                <aside class="emphasize-post-meta separate slash <?php echo esc_attr($post_meta_style . " " . $post_meta_small . " " . $post_meta_bold) ?>">
                                	<a href="#"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?></a>
                                    <p class="post-">
                                    	<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
                                        <?php if ($show_date) { ?>
										<span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
										<?php } ?>
                                        <?php if ($show_comments) { ?>
										<span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span>								
										<?php } ?>
                                    </p> 			
                                </aside><!-- POST-META -->	
                                    
                            </div><!-- POST-ENTRY -->
                                                                  
                    	</article><!-- EMPHASIZE-POST-MINIMAL -->
							
