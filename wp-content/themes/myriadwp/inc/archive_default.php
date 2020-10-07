<?php
global $brankic_allowedposttags;

$archive_sidebar = brankic_of_get_option("archive_sidebar", brankic_of_get_default("archive_sidebar"));
$count_widgets = brankic_default_count_widgets($archive_sidebar);
if ($count_widgets == 0) $archive_sidebar = "";

$archive_content = brankic_of_get_option("archive_content", brankic_of_get_default("archive_content"));
$wow_class = brankic_of_get_option("archive_wow_effect", brankic_of_get_default("archive_wow_effect"));
$wow_delay = brankic_of_get_option("archive_wow_delay", brankic_of_get_default("archive_wow_delay"));

$wow_class = "wow " . $wow_class;
$wow_delay = "data-wow-delay='$wow_delay'";

 
?>


					<div class="col-12 archive-default">
					
						<section class="blog-style-2 post-content-holder style2 list-view" data-img_radius_size='5px' id="brankic_category_20196">
						

<?php
$i = 0;
if ( have_posts() ) : 

while ( have_posts() ) : the_post();

$i++;

$post_format = get_post_format();
	
$tags = get_the_tags();

$featured_image = brankic_featured_image_url("brankic-1024-512");

if (brankic_main_post_media() != "none") $article_media_class = "media_active"; else $article_media_class = "";

?>

                                <article <?php post_class($wow_class . " " . $article_media_class); ?> <?php echo wp_kses($wow_delay, $brankic_allowedposttags); ?>>
								
                                
                                <?php if (brankic_main_post_media() != "none"){ ?>
								
									<div class="post-media">
										<?php if (brankic_main_post_media() == "featured_image"){ ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_image[0]); ?>" alt="<?php echo get_the_title(); ?>" <?php echo brankic_srcset(null, "brankic-1024-768"); ?>></a>
										<?php } ?>	
									</div><!-- POST-MEDIA -->
									
									<?php } ?>
                                    
                                    <div class="post-entry">
									
										<a href="<?php the_permalink(); ?>" class="overlay_link"></a>
                                                            

										
										<div class="post-meta icons-applied">
										

											<p><i class="fa fa-clock-o"></i><span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span></p>

											

											<p><i class="fa fa-commenting-o"></i><span><?php comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp')); ?></span></p>

																

											<p><i class="fa fa-bookmark-o"></i><span><?php the_category(', '); ?></span></p>


                                        </div><!-- POST-META -->


                                    
                                        <header class="post-title">
                                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>					
                                        </header><!-- POST-TITLE -->
                                        

                                        <div class="post-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div><!-- POST-EXCERPT -->

                                        
                                        <aside class="post-footer">
                                                            
											
											<div class="post-meta">
                                            	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
													<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?>
												</a>
                                                <p class="post-author">
                                                	<span><a href="#"><?php echo get_the_author_meta( 'user_nicename' )  ?></a></span>
                                                </p>			 													
                                        	</div><!-- POST-META -->
											
                                            
                                        </aside><!-- POST-FOOTER -->
                                    
                                    </div><!-- POST-ENTRY -->
                                
                                </article>
									
                                                    
										
							

							
<?php							
endwhile;
else :
?>
							
								
													<?php 
													if (is_404()){ ?>
														<article <?php post_class($wow_class . " height-70"); ?> <?php echo wp_kses($wow_delay, $brankic_allowedposttags); ?> id="error-404">	

																<h1><?php esc_html_e('404', 'myriadwp');?></h1>
																<h2><?php esc_html_e('Page Not Found', 'myriadwp');?></h2>
																<p><?php esc_html_e('We can\'t seem to find the page you\'re looking for.', 'myriadwp'); ?></p>
																<a href="<?php echo esc_url( home_url( '/' ) )?>" class="brankic_button radius normal medium" data-border="true"><span><?php esc_html_e('Return To Home', 'myriadwp'); ?></span></a>

														</article>
														<?php
													} else { ?>
														<article <?php post_class($wow_class . " no-search-results"); ?> <?php echo wp_kses($wow_delay, $brankic_allowedposttags); ?>>	
										
																<h4><?php esc_html_e('Sorry, no results were found.', 'myriadwp'); ?></h4>
																<p><?php esc_html_e('Please try again with different keywords.', 'myriadwp'); ?></p>
																<?php get_search_form(); ?>

														</article>
														<?php
													}
													?>                          

											

<?php
endif;
?>							
                        </section><!-- STYLE2 -->
       
					
			
                	</div><!-- col-12 -->
	
			
					<div class="col-12">
						<?php include(get_template_directory() . '/inc/navigation.php'); ?>
					</div><!-- col-12 -->	



