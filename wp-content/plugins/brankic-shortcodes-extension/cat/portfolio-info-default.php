<?php
//var_dump($custom_title_colors_array);
$post_format = get_post_format();
	
$tags = get_the_tags();

if (isset($custom_thumb_sizes_array[$i])) $featured_image = brankic_featured_image_url($custom_thumb_sizes_array[$i]); else $featured_image = brankic_featured_image_url($thumb_sizes);

if (isset($custom_column_widths_array[$i])) $custom_width = 'w-' . $custom_column_widths_array[$i] . '-' . $columns; else $custom_width = 'w-1-' . $columns;

if (isset($custom_article_width_height_array[$i])) $custom_width_height = $custom_article_width_height_array[$i]; else $custom_width_height = ''; // grid_advanced

if (isset($custom_title_hovers_array[$i])) $custom_hover_color = $custom_title_hovers_array[$i]; else $custom_hover_color = $hover_color; 

if (isset($custom_title_colors_array[$i])) $custom_title_color = $custom_title_colors_array[$i]; else $custom_title_color = $title_color;

wp_register_style( 'dummy-handle', false );
wp_enqueue_style( 'dummy-handle' );

$custom_css = "";
$j = $i + 1;
if (isset($custom_title_colors_array[$i]) || isset($custom_title_hovers_array[$i])) {
 $custom_css = '.default article:nth-child(' . $j . ') .entry-title { background-size: 200% 100%;
 background-image: linear-gradient(to right, ' . $custom_hover_color . ' 50%, ' . $custom_title_color . ' 50%), linear-gradient(to right, transparent 50%, transparent 50%);
 transition: background-position 1s;
  background-size: 200% 100%;
  background-repeat: no-repeat;
  background-position: 100% top, 100% top;
  -webkit-background-clip: text, border-box;
  
  color: transparent;
  -webkit-text-fill-color: transparent;
}
.default article:nth-child(' . $j . '):hover .entry-title {
	background-position: 0% top, 0% top;
	color: transparent;
}'; 
 wp_add_inline_style( 'dummy-handle', $custom_css ); 
}

//background-clip: text, border-box;

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
<?php if ($style == "masonry") { ?>	<article <?php post_class($wow_class); ?> <?php echo $wow_delay; ?>> <?php } ?>

<?php if ($style == "grid" || $style == "flex") { ?> <article <?php post_class($custom_width . " " . $wow_class); ?> <?php echo $wow_delay; ?>> <?php } ?>

<?php if ($style == "grid_advanced") { ?> <article <?php post_class($custom_width_height . " grider-item " . $wow_class); ?> <?php echo $wow_delay; ?>> <?php } ?>
                                    
                                <div class="post-entry <?php echo $i; ?>">
                                    
<?php if ($featured_image[0] != "") { ?>

                                    <div class="post-media">
                                    
                                    	<div class="media-holder <?php echo $duotone; ?>">
										
<?php if ($style == "masonry" || $style == "grid" || $style == "grid_advanced" || $style == "flex") { ?>
	<a href="<?php the_permalink(); ?>" class="<?php echo $poster_class; ?>">
		<?php if ($featured_video) { echo $video_html; } ?>
		<?php if ($featured_video == "" || $portfolio_item_featured_video_play == "play_on_hover_poster"){ ?>
		<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" <?php echo brankic_srcset(null, $thumb_sizes); ?> />
		<?php } ?>

	</a>
<?php } ?>

<?php if ($style == "flexxxx" ) { ?><div class="background-image" style="background-image: url(<?php echo $featured_image[0]; ?>);"></div><?php } ?>										
                                            
                                        
                                    	</div><!-- POST-MEDIA-HOLDER -->
                                                
                                    </div><!-- POST-MEDIA -->

<?php } ?>
                                    
                                </div><!-- POST-ENTRY -->
                                
                                
								
								<div class="post-info">
									<?php if ($show_cats) { ?><span class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>"><?php the_category(', '); the_terms( $post->ID, 'portfolio_category', '', ", ", '' ); ?></span><?php } ?>
                                	<h4 class="entry-title "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>	
                            	</div><!-- POST-INFO -->
                                
                            </article>
	<?php }							