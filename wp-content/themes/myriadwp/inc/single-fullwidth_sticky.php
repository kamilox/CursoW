            <div class="row-container">
        
                <div class="row fluid row-stick">
                
                   
                		<div class="col-4 sticky-element">
				
<?php
							echo brankic_hero_holder(brankic_global_or_local("post_hero_holder_background_color"),brankic_global_or_local("post_hero_holder_background_color_opacity"),brankic_global_or_local("post_hero_holder_title_color"),brankic_global_or_local("post_hero_holder_title_position"), "height-100", false, false, false, true, false, false, false);
?>
                           
                        </div><!-- COL-4 -->
                    
						<div class="col-8  " >
                                      
                        	<section class="col-10 auto post-content-holder <?php echo esc_attr($single_post_left_right_padding . " " . $single_post_top_padding . " " . $tablet_class); ?>">
							
								<header class="post-title entry-header blog-post-title">
                                        
                                	<h1 class="entry-title <?php echo esc_attr($post_hero_holder_title_size); ?>"><?php the_title(); ?></h1>
                                        
                                </header><!--END POST TITLE-->	
                                                            
                                <?php echo brankic_meta(); ?>
                                
                                    
                                <div class="divider border"><span></span></div>
                            
                                <article>
                                        
                                    <div class="post-content">
							
							<?php the_content(); ?>
							
							<?php wp_link_pages( $wp_link_pages_args ); ?>
							
									</div><!-- POST-CONTENT -->
							
                                    <footer class="post-footer">
                                        
                                        <?php $tags = get_the_tags(); if ($tags) { ?>
										<div  class="post-tags">
                                    
                                            <?php the_tags('', '', ''); ?>
                                            
                                        </div ><!--END POST TAGS-->
										<?php } ?>
										
                                    </footer>
                                    
                                </article>
                       							
								<?php include(get_template_directory() . '/inc/single-author.php'); ?>
                        
							</section><!-- POST-CONTENT-HOLDER -->
                        
							<?php if ($post_related_posts != "none") { include(get_template_directory() . '/inc/single-related-posts.php'); } ?>
							
							<?php if ( comments_open() || get_comments_number() || pings_open()) {	comments_template(); } ?>
					
							<section class="post-nav <?php echo esc_attr($single_post_left_right_padding . " " .$tablet_class); ?>">
								
								<?php include(get_template_directory() . '/inc/navigation.php'); ?>
							
							</section><!--END POST-NAV-->
											
						</div><!-- COL-8 -->
                            
            	</div><!-- ROW ROW-STICK-->
                            
            </div><!-- ROW-CONTAINER -->						