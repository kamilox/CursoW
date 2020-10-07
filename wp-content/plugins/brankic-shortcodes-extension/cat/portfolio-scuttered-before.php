<?php 
if ($portfolio_item_featured_video_play == "play_on_hover" || $portfolio_item_featured_video_play == "play_on_hover_poster") {
		$portfolio_item_featured_video_play_script = 'jQuery(document).ready(function($){
			jQuery("#' . $brankic_cat_id . ' video").each(function (i) {
					jQuery(this).parents("article").mouseover(function(){
						jQuery(this).find("video").get(0).play();
					}).mouseout(function(){
						jQuery(this).find("video").get(0).pause();
					})
			})
		})';
	} else $portfolio_item_featured_video_play_script = "";
	
wp_enqueue_script( 'brankic-swiperslider');
wp_add_inline_script( 'brankic-swiperslider', $portfolio_item_featured_video_play_script );
?>
<div class="col-12 auto">

	<div id="<?php echo $brankic_cat_id; ?>" 
	class="p-flex <?php echo esc_attr($image_zoom_effect . " " . $shadow_color_class . " " . $portfolio_scuttered_caption_v_align . " " . $portfolio_scuttered_caption_h_align . " " . $portfolio_scuttered_caption_position . " " . $portfolio_scuttered_h_align); ?> 
fig_hid hover9" <?php echo $img_radius_size_data; ?> <?php echo $img_radius_size_data; ?>>

