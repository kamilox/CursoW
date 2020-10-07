<?php 
$tags = get_the_tags();

$row_extra_padding_class = "";
$single_post_style = brankic_global_or_local("single_post_style");
$portfolio_item_style = brankic_global_or_local("portfolio_item_style");

$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));

if (($single_post_style == "sidebar" || $portfolio_item_style == "portfolio_style_11") && $header_style == "default") $row_extra_padding_class = " extra_padding";	

$post_duotone = brankic_of_get_option("post_duotone", brankic_of_get_default("post_duotone")); 
$post_duotone_custom = brankic_of_get_option("post_duotone_custom", brankic_of_get_default("post_duotone_custom")); 
if ($post_duotone_custom != "") {
	$post_duotone = 'duotone single-color';
}			
?>
          <div class="row-container sidebar-on <?php echo esc_attr($row_extra_padding_class); ?>">
        
                <div class="row <?php echo esc_attr($single_post_left_right_padding . " " . $single_post_top_padding . " " . $tablet_class); ?> row-stick">
                         
						<div class="col-9">
                        
								<section class="post-content-holder ">
                            
									<article>
										<?php if ($featured_image[0] != "") { ?>	
										<div class="post-media">
										
											<div class="<?php echo esc_attr($post_duotone); ?>"><img src="<?php echo esc_url($featured_image[0]); ?>" alt="<?php the_title(); ?>" <?php echo brankic_srcset(); ?>></div>

										</div><!-- POST-MEDIA -->
										<?php } ?>
											
										<header class="post-title entry-header blog-post-title">
											
											<h1 class="entry-title <?php echo esc_attr($post_hero_holder_title_size); ?>"><?php the_title(); ?></h1>	
											
										</header><!--END POST TITLE-->
																				
										<?php echo brankic_meta(); ?>
										
										<div class="divider border"><span></span></div>
											
										<div class="post-content">
								
											<?php the_content(); ?>
								
											<?php wp_link_pages( $wp_link_pages_args ); ?>

										</div><!-- POST-CONTENT -->
												
										<footer class="post-footer">
											
											<?php $tags = get_the_tags(); if ($tags) { ?>

											<div class="post-tags">
											
												<?php the_tags('', '', ''); ?>
													
											</div><!--END POST TAGS-->
											 
											<?php } ?>
											
											<?php if ($enable_social_sharing_posts == "yes") { ?>
											<div class="post-share">
											
											<?php include(get_template_directory() . '/inc/share.php'); ?>
												
											</div><!--END POST SHARE-->
											<?php } ?>
												
										</footer>
											
									</article>
									
								</section><!-- POST-CONTENT-HOLDER -->
                                
                						
								<?php include(get_template_directory() . '/inc/single-author.php'); ?>				
							
								
			
							
							
							
					
						</div><!-- COL-9 -->
						
<?php
						$disable_sticky =  brankic_of_get_option("disable_sticky", brankic_of_get_default("disable_sticky"));
?>
                            
						<div class="col-3 <?php if ($disable_sticky == "no") { ?>row-stick<?php } ?>">
                        
                            
							<div class="sidebar <?php if ($disable_sticky == "no") { ?>sticky-element<?php } ?>">
						
								<?php dynamic_sidebar( $sidebar ); ?>
							
							</div><!-- SIDEBAR-->	
                                    

                                        
                        </div><!-- COL-3-->
                                                
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->							
							
<?php if ($post_related_posts != "none") { ?>
			
			<div class="row-container bg_related_posts">
        
                <div class="row  <?php echo esc_attr($single_post_left_right_padding . " " . $tablet_class); ?>">	

					<div class="col-12 aligncenter">				
							
					<?php include(get_template_directory() . '/inc/single-related-posts.php'); ?>

					</div>

            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
<?php } ?>

<?php if ( comments_open() || get_comments_number() || pings_open() ) { ?>
			
			<div class="row-container myriad-comments">
        
                <div class="row <?php echo esc_attr($single_post_left_right_padding . " " . $tablet_class); ?>">	

<div class="col-9 aligncenter">				
							
					<?php comments_template(); ?>	
					
</div>

<?php } ?>

            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
			
			<div class="row-container myriad-navigation">
        
                <div class="row <?php if ($post_navigation_fullwidth) { ?>fluid <?php } ?> <?php if (!($post_navigation_fullwidth)) { echo esc_attr($single_post_left_right_padding . " " . $single_post_bottom_padding . " " . $tablet_class ); } ?>">	

					<div class="col-12">				
							
						<?php include(get_template_directory() . '/inc/navigation.php'); ?>	
					
					</div>

            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->