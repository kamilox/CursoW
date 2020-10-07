<?php
$id = sprintf("%s", uniqid());
wp_enqueue_script( 'brankic-swiperslider');

		$inline_script_navigation = 'navigation: {
			nextEl: "#' . $brankic_cat_id . ' .swiper-container .swiper-button-next",
			prevEl: "#' . $brankic_cat_id . ' .swiper-container .swiper-button-prev",
		  },';
		  
		$inline_script_pagination = 'pagination: {
			el: "#' . $brankic_cat_id . ' .swiper-pagination",
			type: "fraction",
		  },';

	if ($portfolio_item_featured_video_play == "play_on_hover" || $portfolio_item_featured_video_play == "play_on_hover_poster") {
		$portfolio_item_featured_video_play_script = 'jQuery("#' . $brankic_cat_id . ' .swiper-slide-active").mouseover(function(){
						jQuery("#video_id_new_" + slide).get(0).play();
					}).mouseout(function(){
						jQuery("#video_id_new_" + slide).get(0).pause();
					})';
	} else $portfolio_item_featured_video_play_script = "";
	
	if ($sticky_vertical) {
		$sticky_vertical_class = "vertical"; 
		$sticky_vertical_js = 'direction: "vertical",slidesPerView: 3,'; 
	} else {
		$sticky_vertical_class = "";
		$sticky_vertical_js = ""; 
	}

	$inline_script = 'jQuery(window).load(function($){
			var swiper = new Swiper("#' . $brankic_cat_id . ' .swiper-container", {'.
			$inline_script_navigation
			. ' slidesPerView: 2,
			centeredSlides: true,
			mousewheel: false,
			grabCursor: false,
			spaceBetween:0,
			speed: 500,
			loop: true,
			breakpoints: {
				640: {
				  slidesPerView: 1,
				}
			},
			' . $sticky_vertical_js . '
			pagination: {
				el: "#' . $brankic_cat_id . ' .swiper-pagination",
				type: "fraction",
			  },
			on: {
				init: function () {
				  jQuery("#' . $brankic_cat_id . ' .background-image-holder").addClass("visible"); 
				  jQuery("#' . $brankic_cat_id . ' .background-image-holder .background-image:first").addClass("active"); 
				},
				slideChangeTransitionStart: function() {
					jQuery("#' . $brankic_cat_id . ' .background-image").removeClass("active");
					var slide = jQuery("#' . $brankic_cat_id . ' .swiper-slide-active").data("rel");
					jQuery("#' . $brankic_cat_id . ' .background-image[data-rel=\'" + slide + "\']").addClass("active");
					
				' . $portfolio_item_featured_video_play_script . '
				},
				
			}

		});
		
	})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
	
	if ($title_stroke) $title_stroke_data = 'data-title-stroke="true"'; else $title_stroke_data = "";
	
	if ($bg_img_fullwidth) $bg_img_fullwidth_data = 'data-fullwidth="true"'; else $bg_img_fullwidth_data = "";	
	if ($nav_fullwidth) $nav_fullwidth_data = 'data-nav-fullwidth="true"'; else $nav_fullwidth_data = "";	
	

?>
          
                	<div id="<?php echo $brankic_cat_id; ?>" class="col-12 p-carousel-center emphasize <?php echo esc_attr($captions_align_new . " " . $image_height . " " . $sticky_vertical_class . " " . $title_vertical_position . " " . $image_zoom_effect); ?>" <?php echo $bg_img_fullwidth_data; ?> <?php echo $nav_fullwidth_data; ?> <?php echo $title_stroke_data; ?>>
                    
                        <div class="swiper-container centered " data-navigation-outside="true">
						
							<div class="swiper-wrapper">