<?php
$id = sprintf("%s", uniqid());
wp_enqueue_script( 'brankic-swiperslider');
	if ($portfolio_item_featured_video_play == "play_on_hover" || $portfolio_item_featured_video_play == "play_on_hover_poster") {
		$portfolio_item_featured_video_play_script = 'jQuery("#' . $brankic_cat_id . ' video").each(function (i) {
					jQuery(this).parents(".swiper-slide").mouseover(function(){
						jQuery(this).find("video").get(0).play();
					}).mouseout(function(){
						jQuery(this).find("video").get(0).pause();
					})
			})';
	} else $portfolio_item_featured_video_play_script = "";

		$inline_script_navigation = 'navigation: {
			nextEl: "#' . $brankic_cat_id . ' .swiper-container .swiper-button-next",
			prevEl: "#' . $brankic_cat_id . ' .swiper-container .swiper-button-prev",
		  },';

	$inline_script = 'jQuery(window).load(function($){
			var swiper = new Swiper("#' . $brankic_cat_id . ' .swiper-container", {'.
			$inline_script_navigation
			. 'slidesPerView: ' . $slides_per_view . ',
			breakpoints: {
				640: {
				  slidesPerView: 1,
				},
				768: {
				  slidesPerView: 2,
				},
			},
			loop: false,
			on: {
				init: function() {
					' . $portfolio_item_featured_video_play_script . '
				},
				slideChangeTransitionStart: function() {
					' . $portfolio_item_featured_video_play_script . '
				},
				
			}
		});
	})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
?>
          
                	<div id="<?php echo $brankic_cat_id; ?>" class="col-12 p-carousel <?php echo $title_vertical_position; ?> <?php echo $title_horizontal_position; ?>" <?php echo $img_radius_size_data; ?>>
                    
                        <div class="swiper-container">
						
							<div class="swiper-wrapper">