<?php

wp_enqueue_script( 'brankic-swiperslider');

	$inline_script_navigation = 'navigation: {
			nextEl: "#' . $brankic_cat_id . ' .swiper-container .swiper-button-next",
			prevEl: "#' . $brankic_cat_id . ' .swiper-container .swiper-button-prev",
		  },';
	
	$inline_script = 'jQuery(window).load(function($){
			var swiper = new Swiper("#' . $brankic_cat_id . ' .swiper-container", {
			' . $inline_script_navigation . '
			slidesPerView: ' . $slides_per_view . ',
			breakpoints: {
				640: {
				  slidesPerView: 1,
				},
				768: {
				  slidesPerView: 2,
				},
			},
			loop: false
		});
	})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
?>
          
                	<div id="<?php echo $brankic_cat_id; ?>" class="col-12 p-carousel overlay <?php echo esc_attr($image_zoom_effect . " " . $title_vertical_position . " " . $title_horizontal_position); ?>" <?php echo $img_radius_size_data; ?>>
                    
                        <div class="swiper-container">
						
							<div class="swiper-wrapper <?php echo $image_height; ?>">