                                    </ul>
                                                
                                </div><!-- PORTFOLIO LIST -->
                                
                            
                                        
                                    <div class="background-image-holder <?php echo $image_height; ?>" id="fixed_overlay_background_image_holder">
									
									    <?php					
										$cat_query_copy = new WP_Query( $args );
										
										// The Loop
										while ( $cat_query_copy->have_posts() ) : $cat_query_copy->the_post();
											$featured_image = brankic_featured_image_url($thumb_sizes);
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
												<?php if ($featured_video == "" || $portfolio_item_featured_video_play == "play_on_hover_poster"){ ?>
												<img src="<?php echo $featured_image[0]; ?>" alt="" <?php echo brankic_srcset(null, $thumb_sizes, true, true); ?> />
												<?php } ?>
												
											</div>
										
                                        <?php
										endwhile;
										?>
                                
                                           
                                    </div><!-- END BACKGROUND-IMAGE-HOLDER -->
                                        
                                    
                            </div><!-- PORTFOLIO SPLIT OVERLAY-->
                
                        </div><!-- COL-12 -->	
                    

<script>
jQuery(document).ready(function($) {
	$('#<?php echo $brankic_cat_id; ?> .portfolio-list li a').on('mouseenter', function() {
	 $('#<?php echo $brankic_cat_id; ?> #fixed_overlay_background_image_holder').addClass('visible');
	 var aux = $(this).data('rel'),
	 preview = $('#<?php echo $brankic_cat_id; ?> .background-image[data-rel="' + aux + '"]'); 
	 $('#<?php echo $brankic_cat_id; ?> #fixed_overlay_background_image_holder').find('.background-image').removeClass('active');
	 preview.addClass('active');
	}).on('mouseleave', function() {
	}); 

	$('#<?php echo $brankic_cat_id; ?> .portfolio-list li').on('mouseenter', function() {
	 $('#<?php echo $brankic_cat_id; ?> .portfolio-list li').addClass('disable');
	 $(this).removeClass('disable'); 
	}).on('mouseleave', function() {

	}); 
});
jQuery(document).ready(function($) {
	$("#<?php echo $brankic_cat_id; ?> #fixed_overlay_background_image_holder").addClass("visible");
	$("#<?php echo $brankic_cat_id; ?> #fixed_overlay_background_image_holder .background-image:first").addClass("active");
	
});
</script>