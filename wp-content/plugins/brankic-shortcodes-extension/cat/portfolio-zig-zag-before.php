<?php
if ($portfolio_item_featured_video_play == "play_on_hover" || $portfolio_item_featured_video_play == "play_on_hover_poster") {
		$portfolio_item_featured_video_play_script = 'jQuery(document).ready(function($){
			jQuery("#' . $brankic_cat_id . ' video").each(function (i) {
					jQuery(this).parents(".media-holder").mouseover(function(){
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

                	<div class="col-12">
            
                        <div class="p-flex grid col1 zig-zag" <?php echo $img_radius_size_data; ?> id="<?php echo $brankic_cat_id; ?>">