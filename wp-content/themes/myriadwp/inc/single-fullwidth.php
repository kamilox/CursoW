<?php 
echo brankic_hero_holder(brankic_global_or_local("post_hero_holder_background_color"),brankic_global_or_local("post_hero_holder_background_color_opacity"),brankic_global_or_local("post_hero_holder_title_color"),brankic_global_or_local("post_hero_holder_title_position"),brankic_global_or_local("post_hero_holder_height"), true, true, true, false, true, false, true, false);

$sidebar =  brankic_global_or_local("single_post_sidebar");

$single_post_content_width_all =  brankic_of_get_option("single_post_content_width_all", brankic_of_get_default("single_post_content_width_all"));

if ($sidebar != "none" && $sidebar != "" ) {
	//col-9 | col-3//
	$sidebar_row_class = "sidebar-on";
	$sidebar_col_class = "sticky-wrap";
	$sidebar_col_1_class = $single_post_content_width_all; //was col-9
	$sidebar_col_2_class = "col-3";
	
} else {
	//col7//
	$sidebar_row_class = "";
	$sidebar_col_class = "";
	$sidebar_col_1_class = $single_post_content_width_all . " aligncenter"; //was col-7
	$sidebar_col_2_class = "";
}
?>
        		
            <div class="row-container <?php echo esc_attr($sidebar_row_class); ?>">
        
                <div class="row <?php echo esc_attr($single_post_left_right_padding . " " . $single_post_top_padding . " " . $tablet_class); ?>">
				
<?php if ($sidebar != "none" && $sidebar != "") { ?>				<div class="row-stick"><?php } ?>
				
				
                    
                	<div class="<?php echo esc_attr($sidebar_col_1_class); ?>">
					
                       
                    	<section class="post-content-holder">
                            
                            <article>
                                        
                                <div class="post-content">
							
							<?php the_content(); ?>
							
							<?php


			wp_link_pages( array(
								'before'           => '<div class="post-page-navigation">' . __( 'Pages:', 'myriadwp' ),
								'after'            => '</div>',
								'link_before'      => '',
								'link_after'       => '',
								'next_or_number'   => 'number',
								'separator'        => ' ',
								'nextpagelink'     => esc_html__('Next page', 'myriadwp'),
								'previouspagelink' => esc_html__('Previous page', 'myriadwp'),
								'pagelink'         => '%',
								'echo'             => 1
							) );
					

?>
							
                                </div><!-- POST-CONTENT -->
                               
								<?php
								$tags = get_the_tags();
								
								if ($tags || $enable_social_sharing_posts == "yes"){
								?>								
                                    
                                <footer class="post-footer">
                                    
                                    <?php if ($tags) { ?>

									<div class="post-tags">
									
										<?php the_tags('', '', ''); ?>
											
									</div><!--END POST TAGS-->
									 
									<?php } ?>
																
									<?php if ($enable_social_sharing_posts == "yes") { ?>
									<div class="post-share">
									
									<?php echo brankic_single_share(); ?>
										
									</div><!--END POST SHARE-->
									<?php } ?>
                                        
                                </footer>
								
								<?php } ?>
                                    
                            </article>
                                
                    	</section><!-- POST-CONTENT-HOLDER -->
						

                            										
							<?php include(get_template_directory() . '/inc/single-author.php'); ?>				
											

						
                                
                	</div><!-- <?php echo esc_attr($sidebar_col_1_class); ?> -->
					
					
                        
<?php if ($sidebar != "none" && $sidebar != "") { ?>

				<div class="<?php echo esc_attr($sidebar_col_2_class); ?> <?php echo esc_attr($sidebar_col_class); ?>">						

					<?php $disable_sticky =  brankic_of_get_option("disable_sticky", brankic_of_get_default("disable_sticky")); ?>
					
					<div class="child <?php if ($disable_sticky == "no") { ?>sticky-element<?php } ?>">
						
							<div class="sidebar">
						
								<?php dynamic_sidebar( $sidebar ); ?>
							
							</div><!-- SIDEBAR-->	
								
					</div>
					
				</div><!-- <?php echo esc_attr($sidebar_col_2_class); ?>-->
					
<?php } ?>	
									
					
				
<?php if ($sidebar != "none" && $sidebar != "") { ?>				</div><!-- ROW STICK --><?php } ?>
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
<?php if ($post_related_posts != "none") { ?>

            <div class="row-container bg_related_posts">

                <div class="row <?php echo esc_attr($single_post_left_right_padding . " " . $tablet_class); ?>">
                            
                    <div class="col-12 aligncenter">
					
						<?php include(get_template_directory() . '/inc/single-related-posts.php'); ?>

                	</div><!-- COL-12 -->
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->

<?php } ?>			
			
<?php if ( comments_open() || get_comments_number() || pings_open() ) { ?>
			
			<div class="row-container myriad-comments">
        
                <div class="row br <?php echo esc_attr($single_post_left_right_padding . " " . $tablet_class); ?>">
                            
                    <div class="<?php echo esc_attr($single_post_content_width_all); ?> aligncenter">
					
					<?php comments_template(); ?>
					
                	</div><!-- COL-9 -->
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
<?php } ?>

            <div class="row-container myriad-navigation">
        
                <div class="row <?php if ($post_navigation_fullwidth) { ?>fluid <?php } ?> <?php if (!($post_navigation_fullwidth)) { echo esc_attr($single_post_left_right_padding . " " . $single_post_bottom_padding . " " . $tablet_class );  } ?>">
            
                	<div class="col-12">

						<?php include(get_template_directory() . '/inc/navigation.php'); ?>	

                	</div><!-- COL-12 -->
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->					
