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

                	<div class="col-12">					
            
<?php if ($style == "masonry") { ?>

						<div class="col<?php echo $columns;?> <?php echo esc_attr($image_zoom_effect); ?> tooltip p_cat" <?php echo $data_columns_tablet; ?> <?php echo $data_columns_phone; ?> <?php echo $img_radius_size_data; ?> <?php echo $data_gap ?> id="<?php echo $brankic_cat_id; ?>">
						
							<div class="portfolio-holder-masonry">
							
<?php } 

if ($style == "flex") { ?>

						<div class="p-flex col<?php echo $columns;?> <?php echo esc_attr($image_zoom_effect); ?> tooltip p_cat" <?php echo $data_columns_tablet; ?> <?php echo $data_columns_phone; ?> <?php echo $flex_height; ?> <?php echo $img_radius_size_data; ?> <?php echo $data_gap ?> id="<?php echo $brankic_cat_id; ?>">

<?php }	

if ($style == "grid") { ?>

						<div class="p-flex col<?php echo $columns;?> <?php echo esc_attr($image_zoom_effect); ?> tooltip p_cat" <?php echo $data_columns_tablet; ?> <?php echo $data_columns_phone; ?> <?php echo $img_radius_size_data; ?> <?php echo $data_gap ?> id="<?php echo $brankic_cat_id; ?>">

<?php }	

if ($style == "grid_advanced") { ?>

						<div class="grider col<?php echo $columns;?> <?php echo esc_attr($image_zoom_effect); ?> tooltip p_cat" <?php echo $data_columns_tablet; ?> <?php echo $data_columns_phone; ?> <?php echo $img_radius_size_data; ?> <?php echo $data_gap ?> id="<?php echo $brankic_cat_id; ?>">

<?php }						