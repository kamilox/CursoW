<?php
/*******************************************************************************************************************
* TESTIMONIALS													 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_carousel')) {
	function Brankic_carousel($atts, $content = null) {
		
	$default_atts = array(
		"carousel_content" 				=> "testimonials",
		"blog_cat_slug" 				=> "", 
		"woo_cat_slug" 					=> "",
		"blog_style"					=> "related_posts",
		"captions_position"				=> "",
		"duotone"						=> "",
		"duotone_custom"				=> "",
		"duotone_gradient"				=> "",
		"duotone_gradient_direction"	=> "to top right",
		"duotone_custom_2"				=> "",
		"duotone_custom_3"				=> "",
		"thumb_sizes"					=> "4x3",
		"portfolio_style"				=> "portfolio-caption-hidden-1",
		"fig_hid_position"				=> "middle center",
		"fig_hid_alignment"				=> "text-center",
		"title_color" 					=> "#000000",
		"hover_color" 					=> "",
		"hover_2_color"					=> "",
		"category_color"				=> "",
		"shadow_color"					=> "rgba(0, 0, 0, .24)",
		"shadow_color_active"			=> "",
		"img_radius"					=> "",
		"img_radius_size"				=> "4px",
		"flex_height"					=> "height-55",
		"show_comments" 				=> "true", 
		"show_cats" 					=> "", 
		"show_tags" 					=> "", 
		"show_date" 					=> "true", 
		"show_author"	 				=> "",
		"show_excerpt"	 				=> "",
		"post_meta_style"				=> "",	
		"post_meta_bold"				=> "bold",
		"post_meta_small"				=> "small",
		"portfolio_cat_slug" 			=> "", 
		"testimonial_cat_slug" 			=> "", 
		"testimonial_post_id" 			=> "none",
		"testimonial_type" 				=> "default",
		"avatar_position_default"		=> "avatar-top",
		"avatar_position_solid"		    => "avatar-top",
		"avatar_position_monochrome"	=> "avatar-top",
		"content_position" 				=> "center",
		"text_color_testimonial"		=> "",
		"text_color_2_testimonial"		=> "",
		"text_color_gradient_direction"	=> "to right",
		"text_size"						=> "",
		"text_size_custom"				=> "",
		"text_weight"					=> "",
		"text_height"					=> "",
		"text_height_custom"			=> "",
		"text_class" 					=> "",
		"text_color_name_occupation" 	=> "",
		"bg_color_testimonial" 			=> "",
		"bg_color_2_testimonial" 		=> "",
		"bg_name_occupation" 			=> "",
		"bg_pattern" 					=> "",
		"bg_pattern_extra" 				=> "",
		"use_active_slide_diff_colors"			=> "",
		"active_text_color_testimonial"			=> "",
		"active_background_color_testimonial"	=> "",
		"active_background_color_2_testimonial"	=> "",
		"active_background_color_3_testimonial"	=> "",
		"active_bg_gradient_direction"			=> "to top right",
		"spread_content"						=> "",
		"gap" 							=> "0",
		"fade"							=> "false",
		"loop"							=> "true",
		"mouse_grab"					=> "",
		"custom_cursor"					=> "",
		"custom_cursor_text"			=> "Grab",
		"custom_cursor_color"			=> "ffcc99",
		"custom_cursor_bg"				=> "403a3e",
		"mouse_control"					=> "",
		"carousel_navigation" 			=> "lines_below",
		"carousel_navigation_align"		=> "center",
		"fraction_navigation" 			=> "false",
		"pagination_type"				=> "bullets",
		"carousel_navigation_color" 	=> "",
		"slides_per_view"				=> "3",
		"single_image_height"			=> "",
		"centered" 						=> "",
		"autoplay"						=> "",
		"delay"							=> "3000",
		"emphasize_size" 				=> "",
		"emphasize_opacity" 			=> "",
		"limit" 						=> "-1",		
		"speed" 						=> "1000",
		"autoheight" 					=> "false",
		"slide_height" 					=> "height-60",
		"slide_width" 					=> "60%",
		"parallax"						=> "",
		"parallax_value"				=> "0.5",
		"portfolio_item_featured_video_play"	=> "autoplay",
	);
	extract(shortcode_atts($default_atts, $atts));
	
		$brankic_id = 'brankic_carousel_' . brankic_string_to_class($atts);
		
		if ($parallax) $parallax_class = "swiper_parallax"; else $parallax_class = "";
		
		if ($slides_per_view == "auto") $slides_per_view_extra_class = "slides_per_view_auto"; else $slides_per_view_extra_class = "";
		
		$breakpoints = 'breakpoints: {
							640: {
							  slidesPerView: 1,
							}
						}';
		if ($slides_per_view == 6){
			$breakpoints = 'breakpoints: {
							1200: {
							  slidesPerView: 4,
							},
							1024: {
							  slidesPerView: 3,
							},
							768: {
							  slidesPerView: 2,
							},
							640: {
							  slidesPerView: 1,
							}
						}';
		};
		if ($slides_per_view == 5){
			$breakpoints = 'breakpoints: {
							1200: {
							  slidesPerView: 3,
							},
							1024: {
							  slidesPerView: 2,
							},
							640: {
							  slidesPerView: 1,
							}
						}';
		};
		if ($slides_per_view == 4){
			$breakpoints = 'breakpoints: {
							1024: {
							  slidesPerView: 3,
							},
							768: {
							  slidesPerView: 2,
							},
							640: {
							  slidesPerView: 1,
							}
						}';
		};
		if ($slides_per_view == 3){
			$breakpoints = 'breakpoints: {
							768: {
							  slidesPerView: 2,
							},
							640: {
							  slidesPerView: 1,
							}
						}';
		};
		
		if ($speed == "") $speed = 1000;
		
		$custom_cursor_script = "";
		if ($custom_cursor == "true"){
		$custom_cursor_script = 'jQuery(window).load(function($){
			if (jQuery(".cursor-pointer").length == 0) {
				jQuery("body").append("<div class=\'cursor-pointer\'></div>");
			}	
			jQuery("body").attr( "data-element-cursor-customize", "true" );	
			jQuery(".cursor-pointer").append("<span class=\'custom-' . $brankic_id . '\'>' . $custom_cursor_text . '</span>");
			
			jQuery("#' . $brankic_id . ' .swiper-slide").addClass("cursor-' . $brankic_id . '");
			
			var selectedView = [".cursor-' . $brankic_id . '"];
			var selectedV = selectedView.join();
			jQuery(selectedV).mouseenter(function() {
				jQuery(".cursor-pointer").addClass("custom-' . $brankic_id . '-active");
			}).mouseleave(function() {
				jQuery(".cursor-pointer").removeClass("custom-' . $brankic_id . '-active");
			});
			
			
			var xMousePos = 0;
			var yMousePos = 0;

			jQuery(window).on("mousemove",function(event) {
				xMousePos = event.clientX;
				yMousePos = event.clientY;
			}); 

			window.requestAnimationFrame(function PointerMove() {
				jQuery(".cursor-pointer").css("transform", "matrix(1, 0, 0, 1, "+xMousePos+",  "+yMousePos+")");
				window.requestAnimationFrame(PointerMove);
			});
			
			
		});';
		
		wp_register_script( 'dummy-handle-footer', '', [], '', true );
		wp_enqueue_script( 'dummy-handle-footer'  );
		
		wp_register_style( 'dummy-handle', false );
		wp_enqueue_style( 'dummy-handle' );

		}
	if ($duotone_custom != "" && $duotone == "custom") 	$duotone = 'duotone single-color';
	
	if ($loop == "") {
		$loop = "false";
		$loop_class = "";
	} else {
		$loop = "true";
		$loop_class = "loop";
	}
	if ($mouse_grab == "") $mouse_grab = "false"; else $mouse_grab = "true";
	if ($mouse_control == "") $mouse_control = "false"; else $mouse_control = "true";
	
	if ($carousel_navigation == "") $br_nav_class = "br_nav_none"; else $br_nav_class = "";

	$container_extra_class = "";
	
	if (($slides_per_view == "4" || $slides_per_view == "5" || $slides_per_view == "6") && $centered == "true" && $emphasize_opacity == "true") {
		$container_extra_class = "l_r_opacity";
	}
	
	$slides_per_view_R = $slides_per_view;
	
	$gap_class = "";
	if ($gap == "" || $gap == "0") $gap = "0";
	else $gap_class = "gap";
	
	if ($slides_per_view == "auto") $slides_per_view = "'auto'";
	
	
	if ($autoheight == "true") $autoheight = "true"; else $autoheight = "false";
	
	$data_pagination = "";
	if ($pagination_type == "fraction") $data_pagination =  'data-pagination-fraction="true"';
	if ($pagination_type == "progressbar") $data_pagination =  'data-pagination-progressbar="true"';
	
	if ($emphasize_size == "true") $emphasize_size =  "emphasize-size"; else $emphasize_size = "";
	if ($emphasize_opacity == "true") $emphasize_opacity =  "emphasize-opacity"; else $emphasize_opacity = "";
	
	if ($centered == "true") {
		$centered_slides = "centeredSlides: true,"; 
		$centered_class = "centered";
	} else { 
		$centered_slides = "centeredSlides: false,";
		$centered_class = "";
	}
	
	if ($autoplay == "true") {
		$autoplay = "autoplay: {delay: $delay,}";
	} else $autoplay = "";
	if ($fade == "true" && $slides_per_view == "1") $fade = "effect:'fade',"; else $fade = "";
	
	global $wp_query;
	
	$temp = $wp_query;
		
	$html = "";
	$data_navigation = "";
	$html_navigation = "";
	$inline_script_navigation = "";
	$inline_script_pagination = "";
	
	$carousel_navigation_align = 'data-navigation-align="' . $carousel_navigation_align . '"';
	if ($carousel_navigation == "arrows_side") $carousel_navigation_align = "";
	
	if ($carousel_navigation == "lines_below") {
		
		$data_navigation = 'data-navigation-outside="true"';
		$html_navigation = '<div class="swiper-pagination lines ' . $carousel_navigation_color . '"></div>';
		$inline_script_pagination = 'pagination: {
			el: "#' . $brankic_id . ' .swiper-pagination",
			type: "' . $pagination_type . '",
			clickable: true
		  },';
	}
	if ($carousel_navigation == "lines_inside") {
		$data_navigation = 'data-navigation-outside=""';
		$html_navigation = '<div class="swiper-pagination lines ' . $carousel_navigation_color . '"></div>';
		$inline_script_pagination = 'pagination: {
			el: "#' . $brankic_id . ' .swiper-pagination",
			type: "' . $pagination_type . '",
			clickable: true
		  },';
	}
	
	if ($carousel_navigation == "dots_below") {
		$data_navigation = 'data-navigation-outside="true"';
		$html_navigation = '<div class="swiper-pagination ' . $carousel_navigation_color . '"></div>';
		$inline_script_pagination = 'pagination: {
			el: "#' . $brankic_id . ' .swiper-pagination",
			type: "' . $pagination_type . '",
			clickable: true
		  },';
	}
	
	if ($carousel_navigation == "dots_inside") {
		$data_navigation = 'data-navigation-outside=""';
		$html_navigation = '<div class="swiper-pagination ' . $carousel_navigation_color . '"></div>';
		$inline_script_pagination = 'pagination: {
			el: "#' . $brankic_id . ' .swiper-pagination",
			type: "' . $pagination_type . '",
			clickable: true
		  },';
	}
	
	
	if ($carousel_navigation == "arrows_below" || $carousel_navigation == "") {
		$data_navigation = 'data-navigation-outside="true"';
		$html_navigation = '';
		
		if ($fraction_navigation != "") $html_navigation .= '<div class="swiper-pagination ' . $carousel_navigation_color . '"></div>';
		if ($carousel_navigation == "arrows_below") $html_navigation .= '<div class="swiper-button-next ' . $carousel_navigation_color . '"><span></span></div>
								<div class="swiper-button-prev ' . $carousel_navigation_color . '"><span></span></div>';
		if ($carousel_navigation == "arrows_below") $inline_script_pagination = 'pagination: {
			el: "#' . $brankic_id . ' .swiper-pagination",
			type: "' . $pagination_type . '",
			clickable: true
		  },';
		if ($carousel_navigation == "arrows_below") $inline_script_navigation = 'navigation: {
			nextEl: "#' . $brankic_id . ' .swiper-button-next",
			prevEl: "#' . $brankic_id . ' .swiper-button-prev",
		  },';
	}
	
	if ($carousel_navigation == "arrows_side") {
		$data_navigation = '';
		$html_navigation = '<div class="swiper-button-next ' . $carousel_navigation_color . '"><span></span></div>
								<div class="swiper-button-prev ' . $carousel_navigation_color . '"><span></span></div>';
		$inline_script_navigation = 'navigation: {
			nextEl: "#' . $brankic_id . ' .swiper-button-next",
			prevEl: "#' . $brankic_id . ' .swiper-button-prev",
		  },';			
		
	}
	
	if ($carousel_navigation == "arrows_below" || $carousel_navigation == "" || $carousel_navigation == "lines_below" || $carousel_navigation == "dots_below") $html_navigation = '<div class="nav_pag_wrapper">' . $html_navigation . '</div>';
	
	if ($img_radius == "true") $img_radius_size_data = "data-img_radius_size='" . $img_radius_size . "'"; else  $img_radius_size_data = "";


	if ($carousel_content == "testimonials"){
		
		
		
		if ($testimonial_post_id != "none") {
		
			$args=array(
				'tax_query' => array(
					array(
						'taxonomy' => 'testimonial_category',
						'field' => 'term_id',
					)
				),
				'post_type' => 'testimonial_item',
				'orderby' => 'date',
				'order' => 'DESC',
				'p' => $testimonial_post_id
				
			);
		} else {
			
			$term = get_term_by('slug', $testimonial_cat_slug, 'testimonial_category');
			if (!($term)) {
				$term = get_term_by('name', "Portfolio testimonials", 'testimonial_category');
				$testimonial_cat_id = $term->term_id;
			}
			
			$testimonial_cat_id = $term->term_id;
			
			if ($testimonial_cat_id == "") $testimonial_tax_query = array();
			else $testimonial_tax_query = array(
												array(
													'taxonomy' => 'testimonial_category',
													'field' => 'term_id',
													'terms' => $testimonial_cat_id
												)
											);
			$args=array(
				'tax_query' => $testimonial_tax_query,
				'post_type' => 'testimonial_item',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $limit
			);
			
		};
		
		$data_autoheight = "";
		
		if ($autoheight == "true") $data_autoheight = 'data-autoheight="true"';

		
		$car_wp_query = new WP_Query( $args );
		
	
		if ($testimonial_post_id == "none" || $testimonial_post_id == "0") $html .= '<div class="swiper-container content-carousel ' . $gap_class . ' ' . $slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . ' ' . $data_autoheight . ' ' . $carousel_navigation_align . '>
                            
                        	<div class="swiper-wrapper">';

		// The Loop
		while ( $car_wp_query->have_posts() ) : $car_wp_query->the_post();

			if ($testimonial_post_id == "none" || $testimonial_post_id == "0") $html .= '				<div class="swiper-slide">';
			
			$featured_image = brankic_featured_image_url($thumb_sizes);
			$url = get_field("url");
			$testimonial = get_field("testimonial");
			$occupation = get_field("occupation");
			
			$imageSrc = wp_get_attachment_image_src($bg_pattern, 'full');
			if ($bg_pattern_extra != "") $imageSrc = $bg_pattern_extra;
			
			if ($text_color_2_testimonial != "") $text_gradient_class = "gradient"; else $text_gradient_class = "";
			
			if ($testimonial_type == "default"){
					
				if ($avatar_position_default == "avatar-top"){
				
					$html .= '<div class="testimonials default avatar-top text-align-center" ' . $img_radius_size_data . '>';
					$html .= '<div class="t_item">';
					
					
					
					$html .= '<div class="t_text ' . $text_class . '">';
					
					if ($featured_image[0] != "")$html .= '<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '</div>';
					
					$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '</div>';
					
					$html .= '<div class="t_author">';
					$html .= '<span class="name">' . get_the_title() . '</span>';
					$html .= '<span class="occupation">' . $occupation . '</span>';
					$html .= '</div>';
					
					$html .= '</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				}
				if ($avatar_position_default == "avatar-bottom"){
				
					$html .= '<div class="testimonials default avatar-bottom text-align-center" ' . $img_radius_size_data . '>';
					$html .= '<div class="t_item">';
					$html .= '<div class="t_text ' . $text_class . '">';
					$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '</div>';
					
					$html .= '<div class="t_author">';
					if ($featured_image[0] != "")$html .= '	<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '		<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '	</div>';

					$html .= '	<span class="name">' . get_the_title() . '</span>';
					$html .= '	<span class="occupation">' . $occupation . '</span>';
					$html .= '</div>';

					$html .= '</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				}
				if ($avatar_position_default == "avatar-aside"){
				
					$html .= '<div class="testimonials default avatar-aside" ' . $img_radius_size_data . '>';
					
					$html .= '<div class="t_item">';
					
					$html .= '<div class="t_text ' . $text_class . '">';
					$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '</div>';
					
					$html .= '<div class="t_author">';
					if ($featured_image[0] != "") $html .= '<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '</div>';
					$html .= '<span class="name">' . get_the_title() . '</span>';
					$html .= '<span class="occupation">' . $occupation . '</span>';
					$html .= '</div>';
					
					$html .= '</div><!-- T_ITEM -->';
									
					$html .= '</div><!-- TESTIMONIALS --> ';
				}
				if ($avatar_position_default == "avatar-bottom left"){
				
					$html .= '<div class="testimonials default avatar-bottom" ' . $img_radius_size_data . '>';
					$html .= '	<div class="t_item">';
					$html .= '		<div class="t_text ' . $text_class . '">';
					$html .= '			<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '		</div>';
					
					$html .= '		<div class="t_author inline">';
					
					if ($featured_image[0] != "")$html .= '			<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '				<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '			</div>';
					
					$html .= '			<div>';
					$html .= '				<span class="name">' . get_the_title() . '</span>';
					$html .= '				<span class="occupation">' . $occupation . '</span>';
					$html .= '			</div>';

					$html .= '		</div><!-- t_author -->';
					$html .= '	</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				}
				
			}
			if ($testimonial_type == "solid"){
					
				if ($avatar_position_solid == "avatar-bottom"){
				
					$html .= '<div class="testimonials avatar-bottom text-align-center boxed solid" ' . $img_radius_size_data . '>';
					$html .= '<div class="t_item">';
					$html .= '<div class="t_text ' . $text_class . '">';
					$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '</div>';
					
					$html .= '<div class="t_author">';
					
					if ($featured_image[0] != "")$html .= '<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '</div>';
					
					
					$html .= '<span class="name">' . get_the_title() . '</span>';
					$html .= '<span class="occupation">' . $occupation . '</span>';
					$html .= '</div>';
					
					$html .= '</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				
				}
				
				if ($avatar_position_solid == "avatar-top"){
				
					$html .= '<div class="testimonials avatar-top text-align-center boxed solid" ' . $img_radius_size_data . '>';
					$html .= '<div class="t_item">';
					
					
					
					$html .= '<div class="t_text ' . $text_class . '">';
					
					if ($featured_image[0] != "")$html .= '<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '</div>';
					
					$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '</div>';
					
					$html .= '<div class="t_author">';
					
					$html .= '<span class="name">' . get_the_title() . '</span>';
					$html .= '<span class="occupation">' . $occupation . '</span>';
					
					$html .= '</div>';
					
					$html .= '</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				
				}
				
				if ($avatar_position_solid == "avatar-aside"){
				
					$html .= '<div class="testimonials avatar-aside boxed solid" ' . $img_radius_size_data . '>';
					$html .= '<div class="t_item">';
					
					if ($featured_image[0] != "")$html .= '<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '</div>';
					
					$html .= '<div class="t_text ' . $text_class . '">';
					$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '</div>';
					
					$html .= '<div class="t_author">';
					$html .= '<span class="name">' . get_the_title() . '</span>';
					$html .= '<span class="occupation">' . $occupation . '</span>';
					$html .= '</div>';
					
					$html .= '</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				
				}
				
				if ($avatar_position_solid == "avatar-bottom left"){
				
					$html .= '<div class="testimonials avatar-bottom boxed solid" ' . $img_radius_size_data . '>';
					$html .= '	<div class="t_item">';
					$html .= '		<div class="t_text ' . $text_class . '">';
					$html .= '			<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '		</div>';
					
					$html .= '		<div class="t_author inline">';
					
					if ($featured_image[0] != "")$html .= '			<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '				<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '			</div>';
					
					$html .= '			<div>';
					$html .= '				<span class="name">' . get_the_title() . '</span>';
					$html .= '				<span class="occupation">' . $occupation . '</span>';
					$html .= '			</div>';

					$html .= '		</div><!-- t_author -->';
					$html .= '	</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				}
				
			}
			if ($testimonial_type == "duo"){
					
				$html .= '<div class="testimonials text-align-center boxed duo" ' . $img_radius_size_data . '>';
				$html .= '<div class="t_item">';
				
				if ($imageSrc != "") $html .= '<div class="t_text ' . $text_class . ' background-pattern" style="color: #fff; background-image: url(' . $imageSrc . ');">';
				else $html .= '<div class="t_text ' . $text_class . '">';
				
				$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
				$html .= '</div>';
				$html .= '<div class="t_author">';
				if ($featured_image[0] != "")$html .= '<div class="t_avatar">';
				if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
				if ($featured_image[0] != "")$html .= '</div>';
				$html .= '<span class="name">' . get_the_title() . '</span>';
				$html .= '<span class="occupation">' . $occupation . '</span>';
				$html .= '</div></div><!-- T_ITEM --></div><!-- TESTIMONIALS --> ';
				
			}
			if ($testimonial_type == "monochrome"){
							
				if ($avatar_position_monochrome == "avatar-aside"){
					$html .= '<div class="testimonials avatar-aside boxed duo monochrome" ' . $img_radius_size_data . '>';
					$html .= '<div class="t_item">';
					
					if ($featured_image[0] != "")$html .= '<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '</div>';
					
					$html .= '<div class="t_text ' . $text_class . '">';					
					$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					
					
					$html .= '	<div class="t_author">';
					$html .= '		<span class="name">' . get_the_title() . '</span>';
					$html .= '		<span class="occupation">' . $occupation . '</span>';
					$html .= '	</div>';
					
					$html .= '</div>';
					
					$html .= '</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				}
				if ($avatar_position_monochrome == "avatar-bottom"){
					$html .= '<div class="testimonials text-align-center boxed duo monochrome" ' . $img_radius_size_data . '>';
					$html .= '<div class="t_item">';
					
					$html .= '<div class="t_text ' . $text_class . '">';
					$html .= '<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					$html .= '</div>';
					
					$html .= '<div class="t_author">';
					if ($featured_image[0] != "")$html .= '<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '</div>';
					$html .= '<span class="name">' . get_the_title() . '</span>';
					$html .= '<span class="occupation">' . $occupation . '</span>';
					$html .= '</div>';
					$html .= '</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				}
				if ($avatar_position_monochrome == "avatar-top"){
					$html .= '<div class="testimonials avatar-top text-align-center boxed duo monochrome" ' . $img_radius_size_data . '>';
					$html .= '<div class="t_item">';
					
					if ($featured_image[0] != "")$html .= '<div class="t_avatar">';
					if ($featured_image[0] != "")$html .= '<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset() . '>';
					if ($featured_image[0] != "")$html .= '</div>';
					
					$html .= '<div class="t_text ' . $text_class . '">';
					$html .= '	<p class="' . $text_gradient_class . '">' . $testimonial . '</p>';
					
					
					$html .= '	<div class="t_author">';
					$html .= '		<span class="name">' . get_the_title() . '</span>';
					$html .= '		<span class="occupation">' . $occupation . '</span>';
					$html .= '	</div>';
					
					$html .= '</div>';
					
					
					$html .= '</div><!-- T_ITEM -->';
					$html .= '</div><!-- TESTIMONIALS --> ';
				}
			}
			
			if ($testimonial_post_id == "none"  || $testimonial_post_id == "0") $html .= '				</div><!-- SWIPER-SLIDE -->';


		endwhile;
		
		if ($testimonial_post_id == "none"  || $testimonial_post_id == "0") { 
		
			$html .= '</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER -->';
		
		}
		
		if ($testimonial_post_id == "none"  || $testimonial_post_id == "0"){
		
			wp_enqueue_script( 'brankic-swiperslider');
					
			$inline_script = 'jQuery(window).load(function($){
					
					var brankic_swiper = new Swiper("#' . $brankic_id . '", {
						speed: ' . $speed . ',
						direction: "horizontal",
						slidesPerView: ' . $slides_per_view . ',
						spaceBetween: ' . $gap . ',
						loop: ' . $loop . ',
						' . $breakpoints . ',
						grabCursor: ' . $mouse_grab . ',
						mousewheel: ' . $mouse_control . ',
						autoHeight: ' . $autoheight . ',';
			$inline_script .= $inline_script_navigation;
			$inline_script .= $inline_script_pagination;
			$inline_script .= $centered_slides;
			$inline_script .= $fade;
			$inline_script .= $autoplay;
			$inline_script .= '		});		
			})';
			
			wp_add_inline_script( 'brankic-swiperslider', $inline_script );
			wp_add_inline_script( 'brankic-swiperslider', $custom_cursor_script );
		}
		

	}
	if ($carousel_content == "blog"){
		
		if ($show_author == "true" || $show_author == "1") $show_author = TRUE; else $show_author = FALSE;	
		if ($show_comments == "true" || $show_comments == "1") $show_comments = TRUE; else $show_comments = FALSE;
		if ($show_cats == "true" || $show_cats == "1") $show_cats = TRUE; else $show_cats = FALSE;
		if ($show_tags == "true" || $show_tags == "1") $show_tags = TRUE; else $show_tags = FALSE;
		if ($show_date == "true" || $show_date == "1") $show_date = TRUE; else $show_date = FALSE;
		if ($show_excerpt == "true" || $show_excerpt == "1") $show_excerpt = TRUE; else $show_excerpt = FALSE;
		
	
		if ($title_color != "")  $title_color_style = 'style="color:' . $title_color . '"'; else $title_color_style = '';
		

		$term = get_term_by('slug', $blog_cat_slug, 'category');
		

		if ($blog_cat_slug != "") $blog_cat_id = $term->term_id; else $blog_cat_id = "";

		
		if ($blog_cat_id == "") $blog_tax_query = array();
		else $blog_tax_query = array(array(
												'taxonomy' => 'category',
												'field' => 'term_id',
												'terms' => $blog_cat_id
											));
		
		
		$args=array(
			'tax_query' => $blog_tax_query,
			'post_type' => 'post',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => $limit
		);
		
			
		$car_wp_query = new WP_Query( $args );
		
		if ($blog_style == "related_posts"){
			
			

			
			$html .= '<div class="related-posts-wrap">
			
							<div class="swiper-container content-carousel ' . $parallax_class . ' ' . $gap_class . ' ' . $slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . ' ' . $carousel_navigation_align . '>
								
								<div class="swiper-wrapper">';

			// The Loop
			while ( $car_wp_query->have_posts() ) : $car_wp_query->the_post();
			
			$featured_image = brankic_featured_image_url($thumb_sizes);
			$thumb_sizes_proportion_array = array("originalx1024" => "brankic-original-1024", "originalx300" => "brankic-original-300", "4x3" => "brankic-1024-768", "3x4" => "brankic-768-1024", "4x3_s" => "brankic-512-384", "3x4_s" => "brankic-384-512", "2x1" => "brankic-1024-512", "1x2" => "brankic-512-1024", "2x2" => "brankic-1024-1024", "1x1" => "brankic-512-512");
			$real_thumb_size = $thumb_sizes_proportion_array[$thumb_sizes];
		
			$html .= '<article>
													
												<div class="post-entry">
													
													<div class="post-media ' . $flex_height . '" ' . $img_radius_size_data . '>
														<div class="media-holder">';
			$html .= '												<a href="' . get_the_permalink() . '"><img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset(null, $real_thumb_size, true) . '></a>';
			
			$html .= '			</div><!-- POST-MEDIA-HOLDER -->
													</div><!-- POST-MEDIA -->
													
													<div class="post-meta ' . $post_meta_style . ' ' . $post_meta_bold . ' ' . $post_meta_small . '" ' . $title_color_style . '>
														<p>
															<span>' . esc_html(get_the_date(get_option( 'date_format' ))) . '</span>
														</p> 
													</div><!-- POST-META -->
													
													<header class="post-title" ' . $title_color_style . '>
														<h3 class="entry-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>					
													</header><!-- POST-TITLE -->
													
												</div><!-- POST-ENTRY -->
												
											</article>';
			endwhile;
			
			$html .= '</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER --></div><!-- related-posts-wrap -->';
			
		}
		
		

		if ($blog_style == "blog_style_5"){
			
			

			
			$html .= '<div class="flex style5 blog-style-5 ' . $captions_position . '" ' . $img_radius_size_data . '>
			
							<div class="swiper-container content-carousel ' . $parallax_class . ' ' . $gap_class . ' ' . $slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . ' ' . $carousel_navigation_align . '>
								
								<div class="swiper-wrapper">';

			// The Loop
			while ( $car_wp_query->have_posts() ) : $car_wp_query->the_post();
			
			$featured_image = brankic_featured_image_url($thumb_sizes);
			$thumb_sizes_proportion_array = array("originalx1024" => "brankic-original-1024", "originalx300" => "brankic-original-300", "4x3" => "brankic-1024-768", "3x4" => "brankic-768-1024", "4x3_s" => "brankic-512-384", "3x4_s" => "brankic-384-512", "2x1" => "brankic-1024-512", "1x2" => "brankic-512-1024", "2x2" => "brankic-1024-1024", "1x1" => "brankic-512-512");
			$real_thumb_size = $thumb_sizes_proportion_array[$thumb_sizes];
			
			$html .= '<article>';
                                
            $html .= '                    <div class="post-entry ' . $flex_height . '">';
                                    

									
			$html .= '						
										<div class="post-media ' . $duotone . '">
											<a href="' . get_the_permalink() . '"><img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset(null, $real_thumb_size) . ' /></a>                                         
                                        </div><!-- POST-MEDIA -->
									<div class="inner-wrap">';
									
			if ($show_cats) { 
			
			$cat_names = array();

			$terms = get_the_terms( get_the_ID(), 'category' );
									 
			if ( $terms && ! is_wp_error( $terms ) ) : 
			 
				$cat_names = array();
				$cat_urls = array();
				$cat_html = "";
			 
				foreach ( $terms as $term ) {
					$cat_names[] = esc_attr($term->name);
					$cat_urls[] = get_category_link($term->term_id);
					$cat_html .= '<a href="' . esc_attr(get_category_link($term->term_id)) . '" rel="category tag">' . esc_attr($term->name) . '</a>';
				}

				$cat_names = implode(" ", $cat_names);
									 

			endif;
			
			$html .= '<div class="post-category post-tags">
										<span>' . $cat_html . '</span>
									</div>';
			}						

            $html .= '                 <div class="post-content">
										
											<header class="post-title">
                                            
                                                <h3 class="entry-title"><a href="' . get_the_permalink() . '">' .get_the_title() . '</a></h3>
                                                					
                                            </header><!-- POST-TITLE -->';
										
										
                                            
            $html .= '                                <aside class="post-meta ' . $post_meta_style . ' ' . $post_meta_bold . ' ' . $post_meta_small . '">';
            if ($show_author) { 
			
			$html .='                                	<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . get_avatar( get_the_author_meta( 'ID' ), 40 ) . '</a>';
            
			}
			
			$html .= '                                    <p class="post-author">';
                                                	
			if ($show_author) { 
			
			$html .= '<span><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author_meta( 'user_nicename' ) . '</a></span>';
			
			} 
            
			if ($show_date) {			
			
			$html .= '	<span>' . esc_html(get_the_date(get_option( 'date_format' ))) . '</span>';
			
			}
													
			if ($show_tags) {
				$posttags = get_the_tags();
				if ($posttags) {
					$tag_html = "";
					
						foreach ($posttags as $tag)
						{
							$tag_html .= '<a href"' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
						}
			
			$html .= '					<span>' . $tag_html . '</span>';
			
				}
			}
													
			if ($show_comments) {

				ob_start();
				
				comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp'));
				
				$html_comments = ob_get_contents();
		
				ob_end_clean();
				
				$html .= '						<span>' . $html_comments . '</span>';
			
			}
            $html .= '                                	</p>';
  				
            $html .= '                                </aside><!-- POST-META -->';
           
			if ($show_excerpt) {
				$html .= '<div class="post-excerpt"><p>' . brankic_excerpt(100, false) . '</p></div><!-- POST-EXCERPT -->';			
			}				
                                    
            $html .= '                            </div><!-- POST-CONTENT -->
                                    
                                    </div><!-- INNER-WRAP -->
                                
                                </div><!-- POST-ENTRY -->
                            
                            </article>';
			
			
			

			endwhile;
			
			$html .= '</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER --></div><!-- STYLE5 -->';
			
		}		
		
		
		if ($blog_style == "blog_style_6"){
			
			
		
			$html .= '<div class="flex style6 blog-style-6" ' . $img_radius_size_data . '>
			
							<div class="swiper-container content-carousel ' . $parallax_class . ' ' . $gap_class . ' ' . $slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . ' ' . $carousel_navigation_align . '>
								
								<div class="swiper-wrapper">';

			// The Loop
			while ( $car_wp_query->have_posts() ) : $car_wp_query->the_post();
			
			$featured_image = brankic_featured_image_url($thumb_sizes);
			$thumb_sizes_proportion_array = array("originalx1024" => "brankic-original-1024", "originalx300" => "brankic-original-300", "4x3" => "brankic-1024-768", "3x4" => "brankic-768-1024", "4x3_s" => "brankic-512-384", "3x4_s" => "brankic-384-512", "2x1" => "brankic-1024-512", "1x2" => "brankic-512-1024", "2x2" => "brankic-1024-1024", "1x1" => "brankic-512-512");
			$real_thumb_size = $thumb_sizes_proportion_array[$thumb_sizes];
			
			if ($featured_image[0] != "") $article_media_class = "media_active"; else $article_media_class = "";
			
			$html .= '<article class="' . $flex_height . ' ' . $article_media_class . '">';
			
			$html .= '<div class="post-entry ' . $flex_height . '">';
			
			$html .= '<a href="' . get_the_permalink() . '" class="overlay_link"></a>';
                           
            $html .= ' <div class="post-media ' . $duotone . '">
                                        
											<a href="' . get_the_permalink() . '"><img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset(null, $real_thumb_size) . ' /></a> 
                                            
                                        </div><!-- POST-MEDIA -->';

			if ($show_cats) { 
			
			$cat_names = array();

			$terms = get_the_terms( get_the_ID(), 'category' );
									 
			if ( $terms && ! is_wp_error( $terms ) ) : 
			 
				$cat_names = array();
			 
				foreach ( $terms as $term ) {
					$cat_names[] = '<a href="">' . esc_attr($term->name) . '</a>';
				}

				$cat_names = implode(" ", $cat_names);
									 

			endif;
			$html .= '<aside class="post-meta post-category post-tags ' . $post_meta_style . ' ' . $post_meta_bold . ' ' . $post_meta_small . '">
										<p><span>' . $cat_names . '</span></p>
									</aside><!-- POST-META POST-CATEGORY -->';
			}
									
			$html .= '						<div class="inner-wrap">
                                
                                        
                                        
                                        <div class="post-content">
										
											<header class="post-title">
                                            
                                                <h3 class="entry-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                                					
                                            </header><!-- POST-TITLE -->';
											
			if ($show_comments) {

				ob_start();
				
				comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp'));
				
				$html_comments = ob_get_contents();
		
				ob_end_clean();
				
				$html .= '						<aside class="post-meta"><p><span>' . $html_comments . '</span></p></aside>';
			
			}								

			$html .= '</div><!-- POST-CONTENT -->
                                    
                                    </div><!-- INNER-WRAP -->';
									
									
									
			$html .= '<aside class="post-footer">
                                    
                                        <div class="post-meta separate dott ' . $post_meta_style . ' ' . $post_meta_bold . ' ' . $post_meta_small . '">
                                            <p>';						
			
			
                                               	
			if ($show_author) { 
			
			$html .= '<span><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author_meta( 'user_nicename' ) . '</a></span>';
			
			} 
            
			if ($show_date) {			
			
			$html .= '	<span>' . esc_html('on ', 'myriadwp') . esc_html(get_the_date(get_option( 'date_format' ))) . '</span>';
			
			}
			
			if ($show_tags) {
				$posttags = get_the_tags();
				if ($posttags) {
					$tag_html = "";
					
						foreach ($posttags as $tag)
						{
							$tag_html .= '<a href"' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
						}
			
			$html .= '					<span>' . $tag_html . '</span>';
			
				}
			}
													                        
                                        
                                
            $html .='                    </p>   
                                        </div><!-- POST-META -->
                                        
                                	</aside><!-- POST-FOOTER -->
									
								</div><!-- POST-ENTRY -->
                            
                            </article>';
			
			
			

			endwhile;
			
			$html .= '</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER --></div><!-- STYLE5 -->';
			
			
		}
		
		
		if ($fraction_navigation == "") $fraction_navigation = "bullets";		
		wp_enqueue_script( 'brankic-swiperslider');
		


		$inline_script = 'jQuery(window).load(function($){';

		if ($parallax)	$inline_script .= '	var interleaveOffset = ' . $parallax_value . ';';
				
		$inline_script .= '		jQuery("#' . $brankic_id . ' article").each(function(){
					jQuery(this).wrap("<div class=\'swiper-slide\'>");';	
					
		if ($parallax) $inline_script .=			'jQuery(this).addClass("slide_parallax");';	

		
		$inline_script .= '		});
				var brankic_swiper = new Swiper("#' . $brankic_id . '", {
					speed: ' . $speed . ',
					direction: "horizontal",
					slidesPerView: ' . $slides_per_view . ',
					spaceBetween: ' . $gap . ',
					loop: ' . $loop . ',
					' . $breakpoints . ',
					autoHeight: ' . $autoheight . ',
					grabCursor: ' . $mouse_grab . ',
					mousewheel: ' . $mouse_control . ',';
		$inline_script .= $inline_script_navigation;
		$inline_script .= $inline_script_pagination;
		$inline_script .= $centered_slides;
		$inline_script .= $fade;
		$inline_script .= $autoplay;
		if ($parallax) $inline_script .= ' watchSlidesProgress: true,';
		if ($parallax) $inline_script .= 'on: {
        progress: function(){
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            var slideProgress = swiper.slides[i].progress,
                innerOffset = swiper.width * interleaveOffset,
                innerTranslate = slideProgress * innerOffset;
           
            swiper.slides[i].querySelector(".swiper-slide >*, .slide-bgimg").style.transform =
              "translateX(" + innerTranslate + "px)";
          }
        },
        setTransition: function(speed) {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            swiper.slides[i].querySelector(".swiper-slide >*, .slide-bgimg").style.transition =
              speed + "ms";
          }
	  }}';
		$inline_script .= '		});		
		})';
		
		wp_add_inline_script( 'brankic-swiperslider', $inline_script );
		wp_add_inline_script( 'brankic-swiperslider', $custom_cursor_script );
		
		
	}
	
	if ($carousel_content == "portfolio"){
		
		if ($shadow_color == "") $shadow_color = "none";
		if ($shadow_color != "none") $shadow_color_class = "box-shadow"; else $shadow_color_class = "";
		
		
		$wow_class = "";
		$wow_delay = "";
		$hover_color = "";
		$hover_2_color = "";
		$category_color = "";
		$shadow_color = "";
		$emphasize_first_post = "";
		$img_radius = "";
		
			$term = get_term_by('slug', $portfolio_cat_slug, 'portfolio_category');
			
			if (isset($term->term_id)) $portfolio_cat_id = $term->term_id;
			else $portfolio_cat_id = "";
			
			if ($portfolio_cat_id == "") $portfolio_tax_query = array();
			else $portfolio_tax_query = array(array(
													'taxonomy' => 'portfolio_category',
													'field' => 'term_id',
													'terms' => $portfolio_cat_id
												));

		
			$args=array(
				'tax_query' => $portfolio_tax_query,
				'post_type' => 'portfolio_item',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $limit
			);

			
			
			$car_wp_query = new WP_Query( $args );
			


		if (substr_count($portfolio_style, "portfolio-caption-hidden") == 1){
			$p_style = substr($portfolio_style, -1, 1);
			
			
			
			$flex_height_r = $flex_height;
			$flex_height = 'data-img-size="' . $flex_height . '" data-fix-height="true"';
			
			$html .= '<div class="p-flex ' . $fig_hid_alignment . " " . $fig_hid_position . '  fig_hid hover' . $p_style . ' ' . $shadow_color_class . '" ' . $flex_height . ' ' . $img_radius_size_data . '>';
			
			$html .=	'			<div class="swiper-container content-carousel ' . $parallax_class . ' ' . $gap_class . ' ' . $slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . ' ' . $carousel_navigation_align . '>';
								
			$html .= '					<div class="swiper-wrapper">';

			// The Loop
			$i = 0;
			while ( $car_wp_query->have_posts() ) : $car_wp_query->the_post();
			
				$columns = "1";
				
				$html .= '<div class="swiper-slide">';
				ob_start();
					
					
					
				$i++;
				$style = "grid";
				include(plugin_dir_path( __DIR__ ) . 'cat/portfolio-caption-hidden-' . $p_style . '.php');
			
				$html .= ob_get_contents();
		
				ob_end_clean();
				$html .= '</div>';
		
			endwhile;
			
			$html .= '		</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER -->';
			$html .= '            	</div><!-- p-flex -->';
		}
		
		if ($portfolio_style == "portfolio-tooltip"){
			
			
			$flex_height_r = $flex_height;
			$flex_height = 'data-img-size="' . $flex_height . '" data-fix-height="true"';
			
			$html .= '<div class="p-flex ' . $fig_hid_alignment . " " . $fig_hid_position . '  tooltip p_cat ' . $shadow_color_class . '" ' . $flex_height . ' ' . $img_radius_size_data . '>';
			
			$html .=	'			<div class="swiper-container content-carousel ' . $parallax_class . ' ' . $gap_class . ' ' . $slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . ' ' . $carousel_navigation_align . '>';
								
			$html .= '					<div class="swiper-wrapper">';

			// The Loop
			$i = 0;
			while ( $car_wp_query->have_posts() ) : $car_wp_query->the_post();
			
				$columns = "1";
				
				$html .= '<div class="swiper-slide">';
				ob_start();
					
					
					
				$i++;
				//$style = "grid";
				include(plugin_dir_path( __DIR__ ) . 'cat/portfolio-tooltip.php');
			
				$html .= ob_get_contents();
		
				ob_end_clean();
				$html .= '</div>';
		
			endwhile;
			
			$html .= '		</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER -->';
			$html .= '            	</div><!-- p-flex -->';
			$inline_script = 'jQuery(document).ready(function($) {
	
		var tooltips_' . $brankic_id . ' = document.querySelectorAll("#' . $brankic_id . ' .not_outset");
		
		document.addEventListener("mousemove", brankic_tooltip_' . $brankic_id . ');
		function brankic_tooltip_' . $brankic_id . '(e3) {
			var x_' . $brankic_id . ' = (e3.clientX + 20) + "px",
				y_' . $brankic_id . ' = (e3.clientY + 20) + "px";
			for (var i_' . $brankic_id . ' = 0; i_' . $brankic_id . ' < tooltips_' . $brankic_id . '.length; i_' . $brankic_id . '++) {
				tooltips_' . $brankic_id . '[i_' . $brankic_id . '].style.top = y_' . $brankic_id . ';
				tooltips_' . $brankic_id . '[i_' . $brankic_id . '].style.left = x_' . $brankic_id . ';
			}
		};
});';		

			
			wp_add_inline_script( 'brankic-swiperslider', $inline_script );
		}
		
		if ($portfolio_style == "portfolio_1"){
			
			
			$html .= '<div class="p-flex fig_hid hover4">
						
								<div class="swiper-container content-carousel ' . $parallax_class . ' ' . $gap_class . ' ' .$slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . '>
								
									<div class="swiper-wrapper">';

			// The Loop
			while ( $car_wp_query->have_posts() ) : $car_wp_query->the_post();
			
			$featured_image = brankic_featured_image_url($thumb_sizes);
			$thumb_sizes_proportion_array = array("originalx1024" => "brankic-original-1024", "originalx300" => "brankic-original-300", "4x3" => "brankic-1024-768", "3x4" => "brankic-768-1024", "4x3_s" => "brankic-512-384", "3x4_s" => "brankic-384-512", "2x1" => "brankic-1024-512", "1x2" => "brankic-512-1024", "2x2" => "brankic-1024-1024", "1x1" => "brankic-512-512");
			$real_thumb_size = $thumb_sizes_proportion_array[$thumb_sizes];
		
			$html .= '                                    <div class="swiper-slide">
										
											<article class="">
													
												<div class="post-entry">
													
													<div class="inner-wrap">
													
														<div class="post-media">
														
															<div class="media-holder">
																
																<a href="' . get_the_permalink() . '"><img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset(null, $real_thumb_size) . '/></a>
															
															</div><!-- POST-MEDIA-HOLDER -->
																	
														</div><!-- POST-MEDIA -->
													
														<div class="post-info">
													
															<div class="post-info-content ' . $content_position . '">
															
																<span class="entry-category">' . the_category(' ') . '</span>	
																<h4 class="entry-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>	
																
															</div><!-- POST-INFO-CONTENT -->
															
														</div><!-- POST-INFO -->
														
													</div><!-- INNER-WRAP -->
													
												</div><!-- POST-ENTRY -->
												
											</article>
											
										</div><!-- SWIPER-SLIDE -->';
		
			endwhile;
			
			$html .= '</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER --></div><!-- P-FLEX HOVER-4-->';
			wp_enqueue_script( 'brankic-swiperslider');
			
			$inline_script = 'jQuery(window).load(function($){
					
					var brankic_swiper = new Swiper("#' . $brankic_id . '", {
						speed: ' . $speed . ',
						direction: "horizontal",
						slidesPerView: ' . $slides_per_view . ',
						spaceBetween: ' . $gap . ',
						loop: ' . $loop . ',
						' . $breakpoints . ',
						autoHeight: ' . $autoheight . ',
						grabCursor: ' . $mouse_grab . ',
						mousewheel: ' . $mouse_control . ',';
			$inline_script .= $inline_script_navigation;
			$inline_script .= $inline_script_pagination;  
			$inline_script .= $centered_slides;
			$inline_script .= $fade;			
			$inline_script .= $autoplay;			
			
			$inline_script .=		'});		
			})';
		wp_add_inline_script( 'brankic-swiperslider', $inline_script );
		wp_add_inline_script( 'brankic-swiperslider', $custom_cursor_script );
		}
		
		if ($portfolio_style == "portfolio_2"){
			
			
		
			$html .= '<div class="p-carousel-center">
						
								<div class="swiper-container centered content-carousel ' . $parallax_class . ' ' . $gap_class . ' ' .$slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" style="width:100%" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . ' ' . $carousel_navigation_align . '>
								
									<div class="swiper-wrapper">';

			// The Loop
			while ( $car_wp_query->have_posts() ) : $car_wp_query->the_post();
			
			$featured_image = brankic_featured_image_url($thumb_sizes);
			$thumb_sizes_proportion_array = array("originalx1024" => "brankic-original-1024", "originalx300" => "brankic-original-300", "4x3" => "brankic-1024-768", "3x4" => "brankic-768-1024", "4x3_s" => "brankic-512-384", "3x4_s" => "brankic-384-512", "2x1" => "brankic-1024-512", "1x2" => "brankic-512-1024", "2x2" => "brankic-1024-1024", "1x1" => "brankic-512-512");
			$real_thumb_size = $thumb_sizes_proportion_array[$thumb_sizes];
		
			$html .= '                                    <div class="swiper-slide">
										
											<article class="">
									
												<a href="' . get_the_permalink() . '">
													
													<div class="post-media ' . $slide_height . ' ' . $duotone . '">
																
														<img src="' . $featured_image[0] . '" alt="" ' . brankic_srcset(null, $real_thumb_size) . ' />
																	
													</div><!-- POST-MEDIA -->
													
													<div class="post-info">
													
														<div class="post-info-content ' . $content_position . '">
														
															<h4 class="entry-title">' . get_the_title() . '</h4>
															<p class="entry-category">' . brankic_list_categories("portfolio_category", ", ", false) . brankic_list_categories("category", ", ", false) . '</p>	
																
														</div><!-- POST-INFO-CONTENT -->
															
													</div><!-- POST-INFO -->
												
												</a>
												
											</article>
																				   
										</div><!-- SWIPER-SLIDE -->';
		
			endwhile;
			
			$html .= '</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER --></div><!-- p-carousel-center -->';
			wp_enqueue_script( 'brankic-swiperslider');
			
			$inline_script = 'jQuery(window).load(function($){
					
					var brankic_swiper = new Swiper("#' . $brankic_id . '", {
						speed: ' . $speed . ',
						slidesPerView: ' . $slides_per_view . ',
						spaceBetween: ' . $gap . ',
						loop: ' . $loop . ',
						' . $breakpoints . ',
						grabCursor: ' . $mouse_grab . ',
						mousewheel: ' . $mouse_control . ',
						autoHeight: ' . $autoheight . ',';
			$inline_script .= $inline_script_navigation;
			$inline_script .= $inline_script_pagination;  
			$inline_script .= $centered_slides;	
			$inline_script .= $fade;
			$inline_script .= $autoplay;			
			$inline_script .=		'});		
			})';
		wp_add_inline_script( 'brankic-swiperslider', $inline_script );
		wp_add_inline_script( 'brankic-swiperslider', $custom_cursor_script );
		}
		
		
		
		
		
		
		if ($fraction_navigation == "") $fraction_navigation = "bullets";		
		wp_enqueue_script( 'brankic-swiperslider');
		
		$inline_script = 'jQuery(window).load(function($){';
		
		if ($parallax)	$inline_script .= '	var interleaveOffset = ' . $parallax_value . ';';
		if ($parallax) $inline_script .= '		jQuery("#' . $brankic_id . ' .article").each(function(){';

		if ($parallax) $inline_script .=			'jQuery(this).addClass("slide_parallax");';
		
		if ($parallax) $inline_script .=	'	});';
				
		$inline_script .= '		var brankic_swiper = new Swiper("#' . $brankic_id . '", {
					speed: ' . $speed . ',
					direction: "horizontal",
					slidesPerView: ' . $slides_per_view . ',
					spaceBetween: ' . $gap . ',
					loop: ' . $loop . ',
					' . $breakpoints . ',
					autoHeight: ' . $autoheight . ',
					grabCursor: ' . $mouse_grab . ',
					mousewheel: ' . $mouse_control . ',';
		$inline_script .= $inline_script_navigation;
		$inline_script .= $inline_script_pagination;
		$inline_script .= $centered_slides;
		$inline_script .= $fade;
		$inline_script .= $autoplay;
		
		if ($parallax) $inline_script .= ' watchSlidesProgress: true,';
		if ($parallax) $inline_script .= 'on: {
        progress: function(){
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            var slideProgress = swiper.slides[i].progress,
                innerOffset = swiper.width * interleaveOffset,
                innerTranslate = slideProgress * innerOffset;
           
            swiper.slides[i].querySelector(".swiper-slide >*, .slide-bgimg").style.transform =
              "translateX(" + innerTranslate + "px)";
          }
        },
        setTransition: function(speed) {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            swiper.slides[i].querySelector(".swiper-slide >*, .slide-bgimg").style.transition =
              speed + "ms";
          }
	  }}';
		
		$inline_script .= '})';
		$inline_script .= '})';
		
		wp_add_inline_script( 'brankic-swiperslider', $inline_script );
		wp_add_inline_script( 'brankic-swiperslider', $custom_cursor_script );
		
		
		
	}
	
	if ($carousel_content == "team_members"){
		$data_content_position = "";
		if ($content_position != "") $data_content_position = 'data-content_position="' . $content_position . '"';
		
		$data_autoheight = "";
		
		if ($autoheight == "true") $data_autoheight = 'data-autoheight="true"';
		
		if ($spread_content == "true") $data_spread = 'data-spread="true"'; else $data_spread = '';
		
		$html .= '<div class="swiper-container content-carousel ' . $parallax_class . ' ' . $gap_class . ' ' .$slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $single_image_height . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_spread . ' ' . $data_navigation . ' ' . $data_pagination . ' ' . $data_autoheight . ' ' . $data_content_position . ' ' . $carousel_navigation_align . ' ' . $img_radius_size_data . '>
                            
                        	<div class="swiper-wrapper">';
							
		$html .= do_shortcode($content);
		
		$html .= '</div><!-- SWIPER-WRAPPER -->';
                            
        $html .= $html_navigation;
							                                
        $html .= '            	</div><!-- SWIPER-CONTAINER -->';
		
		wp_enqueue_script( 'brankic-swiperslider');
		
		if ($fraction_navigation == "") $fraction_navigation = "bullets";
		
		$inline_script = 'jQuery(window).load(function($){';
		if ($parallax)	$inline_script .= '	var interleaveOffset = ' . $parallax_value . ';';
		$inline_script .= '		jQuery("#' . $brankic_id . ' .team-member, #' . $brankic_id . ' .wpb_text_column.wpb_content_element, #' . $brankic_id . ' .single-image-wrap").each(function(){';
		$inline_script .= '     jQuery(this).wrap("<div class=\'swiper-slide\'>");';
		if ($parallax) $inline_script .=			'jQuery(this).wrap("<article class=\'slide_parallax\'>");';
	
		$inline_script .=	'	});
				if (jQuery("#' . $brankic_id . ' .brankic_instafeed").length > 0) {
					jQuery("#' . $brankic_id . ' .brankic_instafeed .swiper-slide").unwrap();
					jQuery("#' . $brankic_id . '").addClass("brankic_instafeed");
				}
				var brankic_swiper = new Swiper("#' . $brankic_id . '", {
					speed: ' . $speed . ',
					direction: "horizontal",
					slidesPerView: ' . $slides_per_view . ',
					spaceBetween: ' . $gap . ',
					loop: ' . $loop . ',
					' . $breakpoints . ',
					autoHeight: ' . $autoheight . ',
					grabCursor: ' . $mouse_grab . ',
					mousewheel: ' . $mouse_control . ',';
		$inline_script .= $inline_script_navigation;
		$inline_script .= $inline_script_pagination;
		$inline_script .= $centered_slides;
		$inline_script .= $fade;
		$inline_script .= $autoplay;
		if ($parallax) $inline_script .= ' watchSlidesProgress: true,';
		if ($parallax) $inline_script .= 'on: {
        progress: function(){
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            var slideProgress = swiper.slides[i].progress,
                innerOffset = swiper.width * interleaveOffset,
                innerTranslate = slideProgress * innerOffset;
           
            swiper.slides[i].querySelector(".swiper-slide >*, .slide-bgimg").style.transform =
              "translateX(" + innerTranslate + "px)";
          }
        },
        setTransition: function(speed) {
          var swiper = this;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            swiper.slides[i].querySelector(".swiper-slide >*, .slide-bgimg").style.transition =
              speed + "ms";
          }
	  }}';
		$inline_script .= '		});		
		})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
	wp_add_inline_script( 'brankic-swiperslider', $custom_cursor_script );
	 

	}
	
	if ($carousel_content == "woocommerce"){
		
		$data_autoheight = "";
		
		if ($autoheight == "true") $data_autoheight = 'data-autoheight="true"';
		
		$html .= '<div class="swiper-container content-carousel woocommerce ' . $parallax_class . ' ' . $gap_class . ' ' . $slides_per_view_extra_class . ' ' . $br_nav_class . ' ' . $centered_class . ' ' . $loop_class . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation . ' ' . $data_pagination . ' ' . $data_autoheight . ' ' . $carousel_navigation_align . '  data-height="' . $flex_height . '">
                            
                        	<div class="swiper-wrapper">';
							
		$term = get_term_by('slug', $woo_cat_slug, 'product_cat');
		
		if (!($term)) {
			//all
			$woo_cat_id = 0;

		} else {
			$woo_cat_id = $term->term_id;
		}
			
			
			
			if ($woo_cat_id == "") $woo_tax_query = array();
			else $woo_tax_query = array(
												array(
													'taxonomy' => 'product_cat',
													'field' => 'term_id',
													'terms' => $woo_cat_id
												)
											);
			$args=array(
				'tax_query' => $woo_tax_query,
				'post_type' => 'product',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => $limit
			);
			?>
			
			<?php
			$woo_query = new WP_Query( $args );
			if ( $woo_query->have_posts() ) {
				while ( $woo_query->have_posts() ) : $woo_query->the_post();

					$html .= '<div class="swiper-slide">
					<ul class="products col1 ">';

					ob_start();
					wc_get_template_part( 'content', 'product' );
					$html .= ob_get_contents();
					ob_end_clean();	
					
					$html .= '</ul></div>';
					
				endwhile;
			} else {
				$html .= 'No products found';
			}
			wp_reset_postdata();
			
			$html .= '</div><!-- SWIPER-WRAPPER -->';
								
			$html .= $html_navigation;
																
			$html .= '            	</div><!-- SWIPER-CONTAINER -->';

		if ($fraction_navigation == "") $fraction_navigation = "bullets";
		wp_enqueue_script( 'brankic-swiperslider');
		
		$inline_script = 'jQuery(window).load(function($){
				
				
				var brankic_swiper = new Swiper("#' . $brankic_id . '", {
					speed: ' . $speed . ',
					direction: "horizontal",
					slidesPerView: ' . $slides_per_view . ',
					spaceBetween: ' . $gap . ',
					loop: ' . $loop . ',
					' . $breakpoints . ',
					autoHeight: ' . $autoheight . ',
					grabCursor: ' . $mouse_grab . ',
					mousewheel: ' . $mouse_control . ',';
		$inline_script .= $inline_script_navigation;
		$inline_script .= $inline_script_pagination;
		$inline_script .= $centered_slides;
		$inline_script .= $fade;
		$inline_script .= $autoplay;
		$inline_script .= '		});		
		})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
	wp_add_inline_script( 'brankic-swiperslider', $custom_cursor_script );
		
	}
	
	
	
	
	
	$wp_query = $temp;  //reset back to original query
	
    return $html;
}
add_shortcode('brankic_carousel', 'Brankic_carousel');

}