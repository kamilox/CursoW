<?php
$post_format = get_post_format();
	
$tags = get_the_tags();

$featured_image = brankic_featured_image_url($thumb_sizes);

if (isset($custom_title_colors_array[$i])) $custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; else $custom_title_color_style = '';

if (isset($custom_title_hovers_array[$i])) $custom_hover_color = $custom_title_hovers_array[$i]; else $custom_hover_color = $hover_color; 

if (isset($custom_title_colors_array[$i])) $custom_title_color = $custom_title_colors_array[$i]; else $custom_title_color = $title_color;

wp_register_style( 'dummy-handle', false );
wp_enqueue_style( 'dummy-handle' );

$custom_css = "";
if (isset($custom_title_colors_array[$i]) || isset($custom_title_hovers_array[$i])) {
 $custom_css = 'article:nth-child(' . $i . ') .entry-title { background-size: 200% 100%;
 background-image: linear-gradient(to right, ' . $custom_hover_color . ' 50%, ' . $custom_title_color . ' 50%), linear-gradient(to right, transparent 50%, transparent 50%);
 transition: background-position 1s;
  background-size: 200% 100%;
  background-repeat: no-repeat;
  background-position: 100% top, 100% top;
  -webkit-background-clip: text, border-box;
  
  color: transparent;
  -webkit-text-fill-color: transparent;
}
article:nth-child(' . $i . '):hover {
	background-position: 0% top, 0% top;
	color: transparent;
}'; 
 wp_add_inline_style( 'dummy-handle', $custom_css ); 
}

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
		$featured_video = get_field("portfolio_item_featured_video");
		$poster_class = "";
		if ($featured_video) {
			$video_url = $featured_video['url'];
			$video_title = $featured_video['title'];
			$video_caption = $featured_video['caption'];
			$video_mime_type = $featured_video['mime_type'];
			
			if ($portfolio_item_featured_video_play == "play_on_hover_poster") $poster_class = "poster_play_on_hover";
			
			if ($portfolio_item_featured_video_play == "autoplay") $html_autoplay = "autoplay"; else $html_autoplay = "";

			$video_html = '<video preload="auto" loop ' . $html_autoplay . ' id="video_id_item_id_' . get_the_ID() . '" class="portfolio_video" title="' . $video_title . ' ' . $video_caption . '" muted="muted">
			  <source src="' . $video_url . '" type="' . $video_mime_type . '">
			  Your browser does not support the video tag.
			</video>';
		}
		
?>
                            <article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>>
							
							    <div class="post-media">
            
                                    <div class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>">
                                        <p class="entry-number"><span class="link_number"><?php echo $i + 1; ?></span></p>	
                                        <span class="rotate"><?php the_category(', '); the_terms( $post->ID, 'portfolio_category', '', ", ", '' ); ?></span>	
                                    </div>
                                            
                                	<div class="media-holder">
                                                    
                                    	<a href="<?php the_permalink(); ?>" class="<?php echo $poster_class; ?>">
											<?php if ($featured_video) { echo $video_html; } ?>
                                        	<?php if ($featured_video == "" || $portfolio_item_featured_video_play == "play_on_hover_poster"){ ?>
											<div class="background-image" style="background-image: url(<?php echo $featured_image[0]; ?>);"></div>
											<?php } ?>
                                        </a>
                                                
                                    </div><!-- POST-MEDIA-HOLDER -->
                                                    
                                </div><!-- POST-MEDIA -->
                                    
                                <div class="post-info">
                                
                                	<div class="post-info-entry">
                                        
                                        <header class="post-title">
                                            <h2 class="entry-title flow " <?php echo $custom_title_color_style; ?>>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                        </header>
										
										<div class="post-excerpt">
                                            <p><?php brankic_excerpt(25); ?></p>
                                        </div><!-- POST-EXCERPT -->
                                    
                                        <aside class="post-footer">
                                        
                                            <a href="<?php the_permalink(); ?>" class="button outline"><small class="uppercase"><b><?php esc_html_e('View case study', 'myriadwp'); ?></b></small></a>
                                            
                                        </aside><!-- POST-FOOTER -->
                                    
                                    </div><!-- POST-INFO-ENTRY -->	
                                            
                            	</div><!-- POST-INFO -->
								
								
								
								
                            
                            </article>
	<?php }							