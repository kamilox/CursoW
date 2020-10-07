<?php
/*******************************************************************************************************************
* SWIPER SLIDES WRAPPER										 	                                                   *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_swiper_slide_wrapper')) {
	function Brankic_swiper_slide_wrapper($atts, $content = null) {
		
		$default_atts = array(
			"swiper_type" 			=> "vertical_duo",
			"swiper_pagination" 	=> "vertical lines right",
			"image_holder_left"		=> "",
			"slider_content"		=> "predefined",
			"limit"					=> "-1",
			"blog_cat_slug" 		=> "", 
			"woo_cat_slug" 			=> "",
			"portfolio_cat_slug" 	=> "",
			"testimonial_cat_slug" 	=> "", 
			"thumb_sizes"			=> "brankic-768-1024",
			"height"				=> "height-100",
			"slide_in_effect"			=> "slide-in-effect effect-btt",
			"duotone"					=> "",
			"duotone_custom"			=> "",
			"duotone_gradient"			=> "",
			"duotone_gradient_direction"=> "to top right",
			"duotone_custom_2"			=> "",
			"duotone_custom_3"			=> "",
			"image_zoom_effect"			=> "image_zoom_out",
			"show_excerpt"			=> "true",
			"text_color" 			=> "",
			"bg_color" 				=> "",
			"read_more"				=> "Read article",
			"vert_align_phone"		=> "mobile_vert_top",
			"vert_align_tablet"		=> "tablet_vert_top",
		"title_class" 				=> "", 
		"title_class_custom" 		=> "", 
		"title_size" 				=> "", 
		"title_size_custom" 		=> '', 
		"title_weight" 				=> "", 
		"title_style" 				=> "", 
		"title_transform"			=> "", 
		"title_spacing" 			=> "", 
		"title_spacing_custom" 		=> "", 		
		"title_height" 				=> "", 
		"title_height_custom"		=> "",
		);
	extract(shortcode_atts($default_atts, $atts));
	
	$id = 'brankic_swiper_slide_wrapper_' . brankic_string_to_class($atts);
	
	if ($title_class == "custom") $title_class = $title_class_custom;
	if ($title_class != "") $title_class = $title_class;
	
	if ($show_excerpt == "true") $show_excerpt = TRUE; else $show_excerpt = FALSE;
	
	if ($slider_content == "testimonials" || $slider_content == "woocommerce") $show_excerpt = TRUE;
	
	if ($duotone_custom != "") {
		$duotone = 'duotone single-color';
	}
	
	global $post;
	
	$temp_post = $post;
	
	$image_zoom_effect_data = "";
	if ($image_zoom_effect) {
		if ($image_zoom_effect == "image_zoom_out") $image_zoom_effect_data = 'data-zoom-out="true"';
		if ($image_zoom_effect == "image_zoom_in") $image_zoom_effect_data = 'data-zoom-in="true"';
	}
		
	
if ($swiper_type == "vertical_duo"){
		
		if ($image_holder_left == "true") $left_class = "img_holder_left"; else $left_class = ""; 
   
	if ($slider_content == "testimonials"){
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
		
	}
	
	if ($slider_content == "blog"){
		
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
	}
	
	if ($slider_content == "woocommerce"){
		
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
		
	}
	
	if ($slider_content == "portfolio"){
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
			
	}
   
	if ($slider_content == "predefined"){
		
	}
	
	$vertical_class = "";
	$vertical_class_2 = "";
	if (substr_count($swiper_pagination, "vertical") == 1) $vertical_class = "vertical_pagination";
	if (substr_count($swiper_pagination, "left") == 1) $vertical_class_2 = "left";
	if (substr_count($swiper_pagination, "right") == 1) $vertical_class_2 = "right";

	if ($read_more != "") $read_more_data = 'data-read-more="' . $read_more . '"'; else $read_more_data = 'data-read-more=""';
   
   $html = '<div class="swiper-slider duo ' . $height . ' ' . $left_class . ' ' . $vertical_class . ' ' . $vertical_class_2 . ' ' . $vert_align_tablet . ' ' . $vert_align_phone . ' ' . $slide_in_effect . '" id="swiper-' . $id . '" ' . $image_zoom_effect_data . ' ' . $read_more_data . '> 
                
                        <div class="row-stick">
                  
                            <div class="col-6">  
	
                                <div class="swiper-container">
								
									<div class="row-bg-wrap" >
										<div class="inner-wrap"> 
										<div class="row-bg background-color only_bg"></div>
										</div> 
									</div>
                                
                                    <div class="swiper-wrapper">';	
   
	if ($slider_content == "predefined") $html .= do_shortcode($content);
	else {
		
	$sw_sl_wp_query = new WP_Query( $args );
   
	if ( $sw_sl_wp_query->have_posts() ) {
		while ( $sw_sl_wp_query->have_posts() ) : $sw_sl_wp_query->the_post();
		
		
			$image_src = brankic_featured_image_url($thumb_sizes);
			$image_src = $image_src[0];
			$title = get_the_title();
			$button_url = get_permalink();
			$post_excerpt = get_the_excerpt();
		

		$vertical = "";
		if ($slider_content == "blog") $vertical = esc_html(get_the_date(get_option( 'date_format' )));
		
		if ($slider_content == "portfolio"){
			$vertical = brankic_list_categories("portfolio_category", " ", false);
		}
		if ($slider_content == "testimonials"){
			$url = get_field("url");
			$testimonial = get_field("testimonial");
			$occupation = get_field("occupation");
			$vertical = $occupation;
			$button_url = $url;
			$post_excerpt = $testimonial;
		}
		$html .= '<div class="swiper-slide" data-rel="' . brankic_safe_string_name($title.$image_src) . '">
        
											<div class="row-bg-wrap" >
												<div class="inner-wrap"> 
												<div class="row-bg background-color"></div>
												</div> 
											</div>
											
											<div class="slide-content">
			
                                            	<div class="entry-category">
                                                	<span>' . $vertical . '</span>	
                                                </div>
                                
                                				<div class="post-info-entry">';
                                        
		$html .= '                                           	<header class="post-title">
															<h2 class="entry-title ' . $title_class . '"><a href="' . $button_url . '">' . $title . '</a></h2>
														</header>';
												
		if ($show_excerpt) {
		
			$html .= '                                                <div class="post-excerpt">';
			$html .= $post_excerpt;
			$html .= '</div><!-- POST-EXCERPT -->';
								
		}
		
		$html .= '                                			</div><!-- POST-INFO-ENTRY -->	
														
												</div><!-- SLIDE-CONTENT -->
												
											</div><!-- SWIPER-SLIDE -->';
											
											
											
		$html .= '<div class="div_to_move"><div class="background-image ' . $duotone . '" data-rel="' . brankic_safe_string_name($title.$image_src) . '">
													<img src="' . $image_src . '" alt="' . $slider_content . ' ' . get_post_thumbnail_id() . '" ' . brankic_srcset(get_post_thumbnail_id(), $thumb_sizes, true, true) . '/>
												</div>
                                                       
											 </div>';									
		
		endwhile;
	}
		   
	}

   $html .= '</div><!-- SWIPER-WRAPPER -->
                                    
                                    
                                    
                                </div><!-- SWIPER-CONTAINER -->
                                        
                            </div><!-- COL-6 --> 
							
							<div class="col-6 sticky-wrap">
                                
                            	<div class="background-image-holder" id="swiper_background_image_holder">
                                        
                                                       
                        		</div><!-- BACKGROUND-IMAGE-HOLDER --> 
                                    
                			</div><!-- COL-6 --> 
							
							<div class="nav_duo_wrapper ' . $swiper_pagination . '"><div class="swiper-pagination ' . $swiper_pagination . '"></div></div>
                        

                        
                        </div><!-- ROW STICK -->
                                    
                	</div><!-- SWIPER-SLIDER DUO -->';

	wp_enqueue_script( 'brankic-swiperslider');
	
	
	$inline_script_pagination = 'pagination: {
			el: "#swiper-' . $id . ' .swiper-pagination",
			type: "bullets",
			clickable: true
		  },';
	
	$inline_script = 'jQuery(window).load(function($){
			var brankic_swiper = new Swiper("#swiper-' . $id . ' .swiper-container", {
			speed: 700,
			direction: "horizontal",
			effect: "fade",
			slidesPerView: 1,
			paginationClickable: true,
			loop: true,
			mousewheel: true,
			' . $inline_script_pagination . '
			on: {
				init: function () {
				  jQuery("#swiper_background_image_holder").addClass("visible"); 
				},
				slideChangeTransitionStart: function() {
					jQuery("#swiper-' . $id . ' .background-image").removeClass("active");
					var slide = jQuery("#swiper-' . $id . ' .swiper-slide-active").data("rel");
					jQuery("#swiper-' . $id . ' .background-image[data-rel=\'" + slide + "\']").addClass("active");
					jQuery("#swiper-' . $id . ' .swiper-slide-active").data("light_pagination");
					var text_color = jQuery("#swiper-' . $id . ' .swiper-slide-active").data("text_color");
					var bg_color = jQuery("#swiper-' . $id . ' .swiper-slide-active").data("bg_color");
					jQuery("#swiper-' . $id . ' .swiper-pagination").css("background", text_color);
					jQuery("#swiper-' . $id . ' .swiper-pagination").css("color", bg_color);
				},
			}

			
		})
			jQuery("#swiper-' . $id . ' .swiper-slide").each(function(){
				jQuery(this).css("background", jQuery(this).data("color"));	
			});
			
			jQuery("#swiper-' . $id . ' .div_to_move").each(function(){
				jQuery("#swiper-' . $id . ' #swiper_background_image_holder").append(jQuery(this).html());
				jQuery(this).remove();		
			});
			
			//read more
			var read_more = jQuery("#swiper-' . $id . '").data("read-more");
			if (read_more != "") jQuery("#swiper-' . $id . ' .post-link a span span").html(read_more);
			if (read_more == "") jQuery("#swiper-' . $id . ' .post-link").remove();
			
	})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
	
}
   
   $post = $temp_post;
    return $html;
}
add_shortcode('brankic_swiper_slide_wrapper', 'Brankic_swiper_slide_wrapper');

}