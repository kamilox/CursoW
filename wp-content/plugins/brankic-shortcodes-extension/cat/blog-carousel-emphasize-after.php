                            </div><!-- SWIPER-WRAPPER -->
                            
                                <div class="nav_pag_wrapper">
								
									<div class="buttons-holder">
									
										<div class="swiper-button-next text-link-icon"><span></span></div>
										<div class="swiper-button-prev text-link-icon"><span></span></div>
												
										<div class="swiper-pagination swiper-pagination-fraction"></div>
									
									</div><!-- BUTTONS-HOLDER -->
                                
                                    <?php if ($show_next) { ?>
									
									<div class="only-next">
                                    
                                        <div class="text">
                                                    
                                        	<small class="entry-category uppercase"></small>	
                                            <p class="entry-title"></p>
                                            
                                        </div>

                                        <div class="bg-image_wrapper <?php echo $only_next_duotone; ?>">
											<div class="bg-image"></div>
										</div>
                                    </div><!-- ONLY-NEXT -->
									
									<?php } ?>
                                
                                </div><!-- NAV_PAG_WRAPPER -->
                                        
                                <div class="background-image-holder" <?php echo $img_radius_size_data; ?>>
								
										<?php	
										$temp = $wp_query;										
										$cat_query_copy = new WP_Query( $args );
										
										// The Loop
										while ( $cat_query_copy->have_posts() ) : $cat_query_copy->the_post();
											$featured_image = brankic_featured_image_url($thumb_sizes);
										?>
											<div class="background-image <?php echo $duotone; ?>" data-rel="item_id_<?php echo get_the_ID(); ?>">
												<div style="background-image: url(<?php echo $featured_image[0]; ?>);"></div>
											</div>
										
                                        <?php
										endwhile;
										$wp_query = $temp;  //reset back to original query
										?>
                                                       
                                </div> <!--END BACKGROUND-IMAGE-HOLDER -->
                            
                        </div><!-- SWIPER-CONTAINER -->
                                            
                	</div><!-- COL-12-->