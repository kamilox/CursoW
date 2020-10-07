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
			clickable: true,
		  },';

	$inline_script = 'jQuery(window).load(function($){
			var swiper = new Swiper("#' . $brankic_cat_id . ' .swiper-container", {'.
			$inline_script_navigation.$inline_script_pagination
			. ' slidesPerView: "1",
			centeredSlides: true,
			mousewheel: false,
			grabCursor: false,
			spaceBetween:0,
			speed: 500,
			loop: true,
			effect: "' . $effect . '",
			on: {
				init: function () {
				  jQuery("#' . $brankic_cat_id . ' .background-image-holder").addClass("visible"); 
				  jQuery("#' . $brankic_cat_id . ' .background-image-holder .background-image:first").addClass("active"); 
				 // var header_height = jQuery(".header").outerHeight();
					//jQuery("#' . $brankic_cat_id . ' .swiper-wrapper").attr("style", "--padding-top:" + header_height + "px");
					//jQuery("#' . $brankic_cat_id . ' .swiper-wrapper").css("padding-top", header_height + "px");
				},
				slideChangeTransitionStart: function() {
					jQuery("#' . $brankic_cat_id . ' .background-image").removeClass("active");
					var slide = jQuery("#' . $brankic_cat_id . ' .swiper-slide-active").data("rel");
					jQuery("#' . $brankic_cat_id . ' .background-image[data-rel=\'" + slide + "\']").addClass("active");
					var next_date = jQuery("#' . $brankic_cat_id . ' .swiper-slide-next .post-meta span.post-date").html();
					var next_title = jQuery("#' . $brankic_cat_id . ' .swiper-slide-next .entry-title a").html();
					var next_id = jQuery("#' . $brankic_cat_id . ' .swiper-slide-next").data("rel");
					var next_img = jQuery("#' . $brankic_cat_id . ' .background-image[data-rel=\'" + next_id + "\'] div").attr("style");
					jQuery("#' . $brankic_cat_id . ' .only-next .text small").html(next_date);
					jQuery("#' . $brankic_cat_id . ' .only-next .text p.entry-title").html(next_title);
					jQuery("#' . $brankic_cat_id . ' .only-next .bg-image").attr("style", next_img)
				},
			}

		});
	})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
	
	if ($title_stroke) $title_stroke_data = 'data-title-stroke="true"'; else $title_stroke_data = "";
	
	$split_screen_data = "";
	if ($split_screen)	$split_screen_data = 'data-split-screen="true"';

	
	
	if ($bg_img_fullwidth) $bg_img_fullwidth_data = 'data-fullwidth="true"'; else $bg_img_fullwidth_data = "";	
?>
          
                	<div id="<?php echo $brankic_cat_id; ?>" class="col-12 recent-posts-emphasize image-holder-<?php echo esc_attr($image_position); ?> <?php echo esc_attr($image_zoom_effect . " " . $image_height . " " . $content_position . " " . $slide_in_effect); ?>" 
					<?php echo $bg_img_fullwidth_data; ?> <?php echo $title_stroke_data; ?>  <?php echo $split_screen_data; ?>>
                    
                        <div class="swiper-container emphasize">
						
							<div class="swiper-wrapper">