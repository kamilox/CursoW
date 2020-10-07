<?php
$featured_image = brankic_featured_image_url("original");
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
	$custom_title_color = $custom_title_colors_array[$i];
} else {
	$custom_title_color_style = '';
}

if ($emphasize_first_post == "true" && $i == 0) include(plugin_dir_path( __DIR__ ) . 'cat/emphasize_' . $emphasize_style . '.php');
	else {
?>

            					<div class="swiper-slide">
            
                            		<article class="" data-rel="item_id_<?php echo get_the_ID(); ?>">
                            
                                        <a href="<?php the_permalink(); ?>" <?php echo $custom_title_color_style; ?>>
                                                                                  
                                            <div class="post-info">
                                            
                                                <div class="post-info-content">
                                                    
                                                    <?php if ($show_cats) { ?><span class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>"><?php brankic_list_categories("portfolio_category"); brankic_list_categories();  ?></span><?php } ?>	
                                                    <h4 class="entry-title "><?php the_title(); ?><span class="arrow"></span></h4>
                                                        
                                                </div><!-- POST-INFO-CONTENT -->
                                                    
                                            </div><!-- POST-INFO -->
                                        
                                        </a>
                                        
                                    </article>
                                    
            					</div><!-- SWIPER-SLIDE -->
	<?php }								
