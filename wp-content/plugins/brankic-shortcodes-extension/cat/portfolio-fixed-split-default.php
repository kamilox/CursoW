<?php
$featured_image = brankic_featured_image_url("original");
if (isset($custom_title_colors_array[$i])) {
	$custom_title_color_style = 'style="color:' . $custom_title_colors_array[$i] . '"'; 
} else {
	$custom_title_color_style = '';
}
?>


<li>
	<h3 class=""><a href="<?php the_permalink(); ?>" <?php if ($i == 0) { ?>class="active" <?php } ?>data-rel="item_id_<?php echo get_the_ID(); ?>" <?php echo $custom_title_color_style; ?>><?php the_title(); ?></a></h3>
	<?php if ($show_cats) { ?><span class="entry-category <?php echo esc_attr($post_meta_style . " " . $post_meta_bold . " " . $post_meta_small); ?>"><?php brankic_list_categories("portfolio_category"); brankic_list_categories();  ?></span><?php } ?>
</li>
