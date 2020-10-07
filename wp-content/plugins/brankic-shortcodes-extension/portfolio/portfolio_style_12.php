<?php
$portfolio_item_style_12_hero_0_fullwidth = brankic_global_or_local("portfolio_item_style_12_hero_0_fullwidth");
$portfolio_item_style_12_hero_fullwidth = brankic_global_or_local("portfolio_item_style_12_hero_fullwidth");

$fullwidth_class = "";
$fullwidth_0_class = "";
if ($portfolio_item_style_12_hero_0_fullwidth == "yes") {
	$fullwidth_0_class = "fluid";
} else {
	$portfolio_item_style_12_hero_0_container_width = "col-12";
}

if ($portfolio_item_style_12_hero_fullwidth == "yes") {
	$fullwidth_class = "fluid";
} else {
	$portfolio_item_style_12_hero_container_width = "col-12";
}


$portfolio_item_change_header_colors = brankic_global_or_local("portfolio_item_change_header_colors");
if ($portfolio_item_change_header_colors) $change_header_colors_class = "change_header_colors"; else $change_header_colors_class = "";

$portfolio_item_change_header_colors_title = brankic_global_or_local("portfolio_item_change_header_colors_title");
if ($portfolio_item_change_header_colors_title) $change_header_colors_class_title = "change_header_colors"; else $change_header_colors_class_title = "";

$portfolio_item_change_header_colors_below = brankic_global_or_local("portfolio_item_change_header_colors_below");
if ($portfolio_item_change_header_colors_below) $change_header_colors_below_class = "change_header_colors_below"; else $change_header_colors_below_class = "";

$portfolio_item_content_width_responsive = brankic_global_or_local("portfolio_item_content_width_responsive");
if ($portfolio_item_content_width_responsive == "yes") $portfolio_item_content_width_responsive_percent = brankic_global_or_local("portfolio_item_content_width_responsive_percent");
else $portfolio_item_content_width_responsive_percent = "";


$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
$default_header_fixed = brankic_of_get_option("default_header_fixed", brankic_of_get_default("default_header_fixed"));
$row_extra_padding_class = "";
if ($header_style == "default" && $default_header_fixed == "yes") { 
	$row_extra_padding_class .= "extra_padding";
}

$portfolio_item_duotone = brankic_global_or_local("portfolio_item_duotone"); 
$portfolio_item_duotone_custom = brankic_global_or_local("portfolio_item_duotone_custom"); 
if ($portfolio_item_duotone_custom != "") {
	$portfolio_item_duotone = 'duotone single-color';
}

$portfolio_item_attributes_layout = brankic_of_get_option("portfolio_item_attributes_layout", brankic_of_get_default("portfolio_item_attributes_layout"));

?>

        <div class="main-container brankic_portfolio_content <?php echo $portfolio_item_style; ?>">
		
            <div class="row-container brankic_hero_0 <?php echo $row_extra_padding_class; ?> <?php echo $change_header_colors_class_title; ?>">
                                   
                <div class="row <?php echo $fullwidth_0_class ?>">
				
					<?php //if ($portfolio_item_style_12_hero_0_fullwidth == "yes") { ?>
					<div class="<?php echo $portfolio_item_style_12_hero_0_container_width; ?> <?php if ($portfolio_item_style_12_hero_0_container_width != "col-12") { ?>aligncenter<?php } ?>">
					<?php //} ?>

						<div class="row-bg-wrap">
                            <div class="inner-wrap"> 
								<div class="row-bg background-color"></div>
                            </div>                    
                        </div>				
					
                    	<div class="hero-holder <?php echo $portfolio_item_content_width_responsive_percent; ?> <?php echo $portfolio_item_left_right_padding; ?> <?php echo $portfolio_item_title_height; ?> <?php echo $portfolio_item_hero_holder_title_position; ?> blog-post-title">
                                	
                        	<header class="post-title">
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
                            
                            <?php echo brankic_scroll_buttton($portfolio_item_hero_holder_scroll_button); ?>
                                                
                    	</div><!--END HERO-CONTENT-->  
						
					<?php //if ($portfolio_item_style_12_hero_0_fullwidth == "yes") { ?>
					</div><!-- COL- -->	
					<?php //} ?>
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
			
			<div class="row-container brankic_hero <?php echo $change_header_colors_class; ?> <?php echo $change_header_colors_below_class; ?>">
                                   
                <div class="row <?php echo $fullwidth_class ?>">
				
					<?php //if ($portfolio_item_style_12_hero_fullwidth == "yes") { ?>
					<div class="<?php echo $portfolio_item_style_12_hero_container_width; ?> <?php if ($portfolio_item_style_12_hero_container_width != "col-12") { ?>aligncenter<?php } ?>">					
					<?php //} ?>
					
						<div class="row-bg-wrap">
                            <div class="inner-wrap"> 
								<div class="row-bg background-image <?php echo $parallax; ?>">
								
									<div class="<?php echo $portfolio_item_duotone; ?>">

										<?php if ($featured_video) { echo $video_html; } else { ?>
										<img src="<?php echo $featured_image; ?>" alt="">
										<?php } ?>
							
									</div>
									
								</div>
								<div class="row-bg background-color"></div>
                            </div>                    
                        </div>
						
						<div class="hero-holder <?php echo $portfolio_item_content_width_responsive_percent; ?> <?php echo $portfolio_item_left_right_padding; ?> <?php echo $portfolio_item_hero_holder_height; ?> <?php echo $portfolio_item_hero_holder_title_position; ?> blog-post-title">
						</div>
                   
				    <?php //if ($portfolio_item_style_12_hero_fullwidth == "yes") { ?>
					</div><!-- COL- -->	
					<?php //} ?>
					
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
			
			
			
			<div class="row-container">
        
                <div class="row <?php echo esc_attr($portfolio_item_left_right_padding . " " . $portfolio_item_top_padding . " " . $tablet_class); ?>">
                    
                	<div class="<?php echo $portfolio_item_text_container_width; ?> <?php if ($portfolio_item_text_container_width != "col-12") { ?>aligncenter<?php } ?>">
                        
                    	<section class="post-content-holder">
                            
                            <article>
                                        
                                <div class="post-content">
                                    
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
                                
                	</div><!-- COL-7 -->
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
			
			<?php if ($extra_images_layout != "") { ?>
			<?php
			$extra_images_no_padding = brankic_global_or_local("extra_images_no_padding");
			if ($extra_images_no_padding == "1") $extra_images_top_padding = "padding-top-0 padding_top_disabled"; else $extra_images_top_padding = "";
			if ($portfolio_item_extra_images_fullwidth) $fluid_class = "fluid"; else $fluid_class = "";
			?>
			
			<div class="row-container">
        
                <div class="row <?php echo $fluid_class; ?> <?php echo esc_attr($portfolio_item_left_right_padding . " " . $extra_images_top_padding . " " . $tablet_class); ?>">
                    
                	<div class="<?php echo $extra_images_container_width; ?> <?php if ($extra_images_container_width != "col-12") { ?>aligncenter<?php } ?>">
                        
                        <section class="post-image-holder">
                        
						<?php echo brankic_portfolio_extra_images($extra_images_layout); ?>
                                    
                        </section><!--END POST-AUTHOR-->
                                
                	</div><!-- COL- -->
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
			<?php } ?>
			
			
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