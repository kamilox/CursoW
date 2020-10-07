										</ul>
														
									</div><!-- PORTFOLIO LIST -->
								
								</div><!-- COL-6-->	
                                
                            
                                <div class="col-6">
								
									<div class="sticky-element">
									
										<div class="background-image-wrap <?php echo $image_height; ?>">
										
											<a href="#" class="project-link">
												
												<span class="link-baby"><small class="uppercase"><b><?php esc_html_e( 'View case study', 'myriadwp' ); ?></b></small></span>
												<span class="arrow-baby">+</span>	
													
											</a>
									
											<div class="background-image-holder" id="fixed_split_background_image_holder">
										
											<?php
											$temp = $wp_query;
											
											$cat_query_copy = new WP_Query( $args );
											
											// The Loop
											while ( $cat_query_copy->have_posts() ) : $cat_query_copy->the_post();
												$featured_image = brankic_featured_image_url("full");
												$featured_video = get_field("portfolio_item_featured_video");
												$poster_class = "";
												if ($featured_video) {
													$video_url = $featured_video['url'];
													$video_title = $featured_video['title'];
													$video_caption = $featured_video['caption'];
													$video_mime_type = $featured_video['mime_type'];
													
													if ($portfolio_item_featured_video_play == "play_on_hover_poster") $poster_class = "poster_play_on_hover";
													
													//if ($portfolio_item_featured_video_play == "autoplay") $html_autoplay = "autoplay"; else $html_autoplay = "";

													$video_html = '<video preload="auto" loop autoplay id="video_id_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted">
													  <source src="' . $video_url . '" type="' . $video_mime_type . '">
													  Your browser does not support the video tag.
													</video>';
												}
											?>
												<div class="background-image <?php echo $duotone; ?>" data-rel="item_id_<?php echo get_the_ID(); ?>">
													<?php if ($featured_video) { echo $video_html; } ?>
													<?php if ($featured_video == ""){ ?>
													<img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, "full", true, true); ?>/>
													<?php } ?>
												</div>
											
											<?php
											endwhile;
											
											$wp_query = $temp;  //reset back to original query
											?>
											</div><!-- BACKGROUND-IMAGE-HOLDER --> 
										
										</div><!-- BACKGROUND-IMAGE-WRAP -->
										
									</div><!-- sticky-element -->
                                        
                                </div><!-- COL-6-->		
                                            
                            </div><!-- ROW STICK-->
                        
                        </div><!-- PORTFOLIO-SPLIT DEFAULT -->
                                    
                	</div><!-- COL-12 -->

<script>
jQuery(document).ready(function($) {
	$('#<?php echo $brankic_cat_id; ?> .portfolio-list li a').on('mouseenter', function() {
		$('#<?php echo $brankic_cat_id; ?> .portfolio-list li a').removeClass('disable');
		$('#<?php echo $brankic_cat_id; ?> #fixed_split_background_image_holder').removeClass('visible');
		$('#<?php echo $brankic_cat_id; ?> .background-image, #<?php echo $brankic_cat_id; ?> .portfolio-list li a').removeClass('active');
		
		project_link = $(this).attr("href");
		$('#<?php echo $brankic_cat_id; ?> .project-link').attr("href", project_link);
		$('#<?php echo $brankic_cat_id; ?> #fixed_split_background_image_holder').addClass('visible');
		$('#<?php echo $brankic_cat_id; ?> .portfolio-list li a').addClass('disable');
		$(this).removeClass('disable');
		$(this).addClass('active');		
		var aux = $(this).data('rel'),
		preview = $('#<?php echo $brankic_cat_id; ?> .background-image[data-rel="' + aux + '"]');	
		$('#<?php echo $brankic_cat_id; ?> #fixed_split_background_image_holder').find('.background-image').removeClass('active');
		preview.addClass('active');
	}).on('mouseleave', function() {

	});  
});
jQuery(document).ready(function($) {

	$("#<?php echo $brankic_cat_id; ?> #fixed_split_background_image_holder").addClass("visible");
	$("#<?php echo $brankic_cat_id; ?> #fixed_split_background_image_holder .background-image:first").addClass("active");
});
</script>

<?php 
wp_register_script( 'brankic-sticky-kit', get_theme_file_uri( '/javascript/jquery.sticky-kit.min.js'), array('jquery'), '1.0.0', true );
wp_enqueue_script( 'brankic-sticky-kit');
$sticky_inline_script = 'jQuery(document).ready(function($){$(".sticky-element").stick_in_parent();});';
wp_add_inline_script( 'brankic-sticky-kit', $sticky_inline_script );
?>