<?php 
			$row_extra_padding_class = "";
			$single_post_style = brankic_global_or_local("single_post_style");
			$portfolio_item_style = brankic_global_or_local("portfolio_item_style");
			
			$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
			$default_header_fixed = brankic_of_get_option("default_header_fixed", brankic_of_get_default("default_header_fixed"));
			
			$portfolio_item_change_header_colors_title = brankic_global_or_local("portfolio_item_change_header_colors_title");
			if ($portfolio_item_change_header_colors_title) $change_header_colors_class_title = "change_header_colors"; else $change_header_colors_class_title = "";
			
			$portfolio_item_attributes_layout = brankic_of_get_option("portfolio_item_attributes_layout", brankic_of_get_default("portfolio_item_attributes_layout"));
			
			if ($header_style == "default" && $default_header_fixed == "yes") { 
				$row_extra_padding_class .= "extra_padding";
			}
			
?>
        <div class="main-container brankic_portfolio_content <?php echo $portfolio_item_style; ?>">
		
            <div class="row-container <?php echo $row_extra_padding_class; ?> <?php echo $change_header_colors_class_title; ?>">
        
                <div class="row row-stick <?php if ($portfolio_item_content_width == "fullwidth") { ?>fluid<?php } ?> sidebar-on <?php echo esc_attr($portfolio_item_left_right_padding . " " . $portfolio_item_top_padding . " " . $tablet_class); ?>">
				
					<div class="col-6">
                        
						<section class="post-image-holder">
						                  
							<?php echo brankic_portfolio_extra_images($extra_images_layout, true); ?>
                                    
                        </section><!--END POST-AUTHOR-->

                	</div><!-- COL-6 -->
					
					<div class="col-6 sticky-element">
                        	
							<section class="post-content-holder <?php echo $portfolio_item_text_container_width; ?> aligncenter">
                            
                            <article>
                                        
                                <div class="post-content">
								
								<header class="post-title blog-post-title">
                            	<h3 class="entry-title <?php echo $portfolio_item_hero_holder_title_size; ?>">
                                	<?php the_title(); ?>
                                </h3>					
								</header><!-- POST-TITLE -->
										
								<div class="portfolio-meta <?php echo $portfolio_item_attributes_layout; ?>">
										
										<?php for ($i = 1 ; $i <= 4 ; $i++) { 
											$portfolio_item_details_var = "portfolio_item_details_" . $i;
											$portfolio_item_details_url_var = "portfolio_item_details_url_" . $i;
											?>

														
														<p><strong><?php echo brankic_of_get_option("portfolio_item_detail_" . $i . "_caption", brankic_of_get_default("portfolio_item_detail_" . $i . "_caption")); ?></strong>

														<?php if ($$portfolio_item_details_url_var != "") { ?><a href="<?php echo $$portfolio_item_details_url_var; ?>" class="underline-through yellow"><?php } ?>

														<?php echo $$portfolio_item_details_var; ?>

														<?php if ($$portfolio_item_details_url_var != "") { ?></a><?php } ?>
														</p>
													
										<?php } ?>
																	 
								</div>
                                    
                                    <?php the_content(); ?>
									
                                </div><!-- POST-CONTENT -->
                                    
                                    
                                <?php if ($enable_social_sharing_portfolio_items == "yes") { ?>
								
								<footer class="post-footer">
                                    
                                    <aside class="post-share">
									
										<small class="uppercase"><b><?php esc_html_e('Share this post', 'myriadwp'); ?></b></small>
										<?php echo brankic_single_share(); ?>
                                                                                      
                                    </aside>
                                        
                                </footer>
								
								<?php } ?>
                                    
                            </article>
                                
                    	</section><!-- POST-CONTENT-HOLDER -->

                	</div><!-- COL-6 -->
            

                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
		
		
 			<?php if ($portfolio_item_related_posts != "none") { ?>            
        
            <div class="row-container">
        
                <div class="row <?php echo esc_attr($portfolio_item_left_right_padding . " " . $portfolio_item_top_padding . " " . $tablet_class); ?>">
                    
                	<div class="col-12">
                
                         
                            	
								<?php include(get_template_directory() . '/inc/single-related-posts.php'); ?>
								

                                
                	</div><!-- COL-12 -->
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
            
			<?php } ?> 
			
			
			
			

            <div class="row-container">
			
<?php
$portfolio_item_navigation_fullwidth = brankic_global_or_local("portfolio_item_navigation_fullwidth");
if ($portfolio_item_navigation_fullwidth) $fluid_class = "fluid"; else $fluid_class = "";
?>				
        
                <div class="row <?php echo $fluid_class; ?> <?php echo esc_attr($portfolio_item_left_right_padding . " " . $portfolio_item_bottom_padding . " " . $tablet_class); ?>">
            
                	<div class="col-12">
					
					<?php  include(get_template_directory() . '/inc/navigation.php'); ?> 

                	</div><!-- COL-12 -->
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
            
        </div><!-- MAIN-CONTAINER -->