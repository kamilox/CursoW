                            </div><!-- SWIPER-WRAPPER -->
                            
                            <div class="swiper-button-next" style="color:<?php echo $title_color; ?>"><span></span></div>
							<div class="swiper-button-prev" style="color:<?php echo $title_color; ?>"><span></span></div>
                            
                        </div><!-- SWIPER-CONTAINER -->
						
						            <div class="background-image-holder <?php echo $duotone; ?>">
                                    

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
																	
													$video_html = '<video preload="auto" loop autoplay id="video_id_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted" data-rel="item_id_' . get_the_ID() . '">
													  <source src="' . $video_url . '" type="' . $video_mime_type . '">
													  Your browser does not support the video tag.
													</video>';
												}
											?>
											<div>
												<?php if ($featured_video) { echo $video_html; } ?>
												<?php if ($featured_video == ""){ ?>
												<img src="<?php echo $featured_image[0]; ?>" alt="" data-rel="item_id_<?php echo get_the_ID(); ?>" <?php echo brankic_srcset(null, $thumb_sizes, true, true); ?>>
												<?php } ?>
												
											</div>
											<?php
											endwhile;
											?>
                                                                                    
                                    </div><!-- END BACKGROUND-IMAGE-HOLDER -->
                                            
                	</div><!-- COL-12-->
					
					
					
					
					
					
<script>
jQuery(document).ready(function($) {
	$('#<?php echo $brankic_cat_id; ?>.p-carousel.overlay article').on('mouseenter', function() {
		$('#<?php echo $brankic_cat_id; ?> img').removeClass('active');
		$('#<?php echo $brankic_cat_id; ?> video').removeClass('active');
		$('#<?php echo $brankic_cat_id; ?>.p-carousel.overlay article').addClass('disable');
		$(this).removeClass('disable');
		var aux = $(this).data('rel');
		var preview = $('#<?php echo $brankic_cat_id; ?> img[data-rel="' + aux + '"]');	
		preview.addClass('active');
		var preview_2 = $('#<?php echo $brankic_cat_id; ?> video[data-rel="' + aux + '"]');	
		preview_2.addClass('active');
	}).on('mouseleave', function() {

	});  
	$("#<?php echo $brankic_cat_id; ?> .background-image-holder div:first").find("img").addClass("active");
	$("#<?php echo $brankic_cat_id; ?> .background-image-holder div:first").find("video").addClass("active");
});
</script>					