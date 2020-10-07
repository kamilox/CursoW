<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $source
 * @var $type
 * @var $onclick
 * @var $custom_links
 * @var $custom_links_target
 * @var $img_size
 * @var $external_img_size
 * @var $images
 * @var $custom_srcs
 * @var $el_class
 * @var $el_id
 * @var $interval
 * @var $css
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_gallery
 */
$thumbnail = '';
$title = $source = $type = $onclick = $custom_links = $custom_links_target = $img_size = $external_img_size = $images = $custom_srcs = $el_class = $el_id = $interval = $css = $css_animation = $swiper_height = $swiper_slide_width = '';
$large_img_src = $shadow_color_class = $fig_hid_alignment = $fig_hid_position = $data_grid_advanced_row_height = $custom_width_height = $wow_class = $wow_delay = '';
$duotone = $duotone_custom = $duotone_gradient = $duotone_gradient_direction = $duotone_custom_2 = $duotone_custom_3 = $brankic_gallery_show_meta = $meta_position = $meta_background_color = $meta_color = $meta_hover_color = '';
$img_radius_size = "";
$columns = "4";
$height = "40";
$gap = "";
$custom_article_width_height = "";
$grid_img_size = "square";
$custom_cursor = "";
$custom_cursor_text	= "View";
$custom_cursor_color = "ffcc99";
$custom_cursor_bg = "403a3e";
$tilt = $tilt_glare = $tilt_floating = $tilt_scale = $tilt_disable_y = $tilt_disable_x = "";
$tilt_perspective = "1000";
$tilt_speed	= "300";
$tilt_glare_value = "0.5";

$attributes = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $attributes );

$default_src = vc_asset_url( 'vc/no_image.png' );

$gal_images = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';

$brankic_gallery_id = 'brankic_gallery_' . brankic_string_to_class($atts);

if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		$tilt_script .= '$("#' . $brankic_gallery_id . ' img").tilt({';
		
		if ($tilt_perspective) $tilt_script .= 'perspective: ' . $tilt_perspective . ',';
		if ($tilt_speed) $tilt_script .= 'speed: ' . $tilt_speed . ',';
		if ($tilt_glare) $tilt_script .= 'glare: true,maxGlare: ' . $tilt_glare_value . ',';
		if ($tilt_floating) $tilt_script .= 'reset: false,';
		if ($tilt_scale) $tilt_script .= 'scale: ' . $tilt_scale . ',';
		if ($tilt_disable_y) $tilt_script .= 'axis: "x",';
		if ($tilt_disable_x) $tilt_script .= 'axis: "y",';
		
		$tilt_script .= '})';
		$tilt_script .= '})';
		wp_add_inline_script( 'tilt-jquery', $tilt_script );
	}
	


if ($custom_cursor == "true"){
		$custom_cursor_script = 'jQuery(document).ready(function($) {
			if ($(".cursor-pointer").length == 0) {
				$("body").append("<div class=\'cursor-pointer\'></div>");
			}	
			$("body").attr( "data-element-cursor-customize", "true" );	
			$(".cursor-pointer").append("<span class=\'custom-' . $brankic_gallery_id . '\'>' . $custom_cursor_text . '</span>");
			
			$("#' . $brankic_gallery_id . '").addClass("cursor-' . $brankic_gallery_id . '");
			
			var selectedView = [".cursor-' . $brankic_gallery_id . ' img"];
			var selectedV = selectedView.join();
			$(selectedV).mouseenter(function() {
				$(".cursor-pointer").addClass("custom-' . $brankic_gallery_id . '-active");
			}).mouseleave(function() {
				$(".cursor-pointer").removeClass("custom-' . $brankic_gallery_id . '-active");
			});
			
			
			var xMousePos = 0;
			var yMousePos = 0;

			$(window).on("mousemove",function(event) {
				xMousePos = event.clientX;
				yMousePos = event.clientY;
			}); 

			window.requestAnimationFrame(function PointerMove() {
				$(".cursor-pointer").css("transform", "matrix(1, 0, 0, 1, "+xMousePos+",  "+yMousePos+")");
				window.requestAnimationFrame(PointerMove);
			});
			
			
		});';
		
		wp_enqueue_script( 'brankic-shortcodes-custom', plugin_dir_url( __FILE__ ) . '../javascript/brankic-shortcodes-custom.js', array('jquery'), '1.0.0', false );
		wp_add_inline_script( 'brankic-shortcodes-custom', $custom_cursor_script );
		
		wp_register_style( 'dummy-handle', false );
		wp_enqueue_style( 'dummy-handle' );
		$custom_cursor_css = '.cursor-pointer.custom-' . $brankic_gallery_id . '-active span.custom-' . $brankic_gallery_id . ' {	opacity: 1;}'; 
		wp_add_inline_style( 'dummy-handle', $custom_cursor_css );	
	}


$el_class = $this->getExtraClass( $el_class );

if ($type == "brankic_gallery") {
	wp_register_style( 'jquery.fancybox', plugin_dir_url( __FILE__ ) . "../../css/jquery.fancybox.min.css");
	wp_enqueue_style('jquery.fancybox');
	wp_enqueue_script( 'jquery.fancybox', plugin_dir_url( __FILE__ ) . '../../javascript/jquery.fancybox.min.js', array('brankic-shortcodes-custom'));
	

	if ($brankic_gallery_layout == "grid_advanced"){
		
		$custom_article_width_height_array = array();
	
		if ($custom_article_width_height != "") {
			$custom_article_width_height_array = explode(",", $custom_article_width_height);
			$custom_article_width_height_array = array_map('trim', $custom_article_width_height_array);
		}
		
	}
	if ($brankic_gallery_layout == "masonry"){
		wp_enqueue_script( 'jquery.isotope', plugin_dir_url( __FILE__ ) . '../../javascript/jquery.isotope.min.js');	
	}
	
	
}

if ( 'nivo' === $type ) {
	$type = ' wpb_slider_nivo theme-default';
	wp_enqueue_script( 'nivo-slider' );
	wp_enqueue_style( 'nivo-slider-css' );
	wp_enqueue_style( 'nivo-slider-theme' );

	$slides_wrap_start = '<div class="nivoSlider">';
	$slides_wrap_end = '</div>';
} elseif ( 'flexslider' === $type || 'flexslider_fade' === $type || 'flexslider_slide' === $type || 'fading' === $type ) {
	$el_start = '<li>';
	$el_end = '</li>';
	$slides_wrap_start = '<ul class="slides">';
	$slides_wrap_end = '</ul>';
	wp_enqueue_style( 'jquery-flexslider' );
	wp_enqueue_script( 'jquery-flexslider' );
} elseif ( 'image_grid' === $type ) {
	wp_enqueue_script( 'vc_grid-js-imagesloaded' );
	wp_enqueue_script( 'isotope' );
	wp_enqueue_style( 'isotope-css' );

	$el_start = '<li class="isotope-item">';
	$el_end = '</li>';
	$slides_wrap_start = '<ul class="wpb_image_grid_ul">';
	$slides_wrap_end = '</ul>';
} elseif ( 'swiper_vertical' === $type ) {
	
	wp_enqueue_script( 'brankic-swiperslider');
	$inline_script = 'jQuery(document).ready(function($){
			var brankic_swiper = new Swiper(".swiper-container", {
			speed: 700,
			direction: "vertical",
			slidesPerView: 1,
			paginationClickable: true,
			loop: true,
			mousewheelControl: true,
			pagination: ".swiper-pagination",
			onInit: function() {
				$("#swiper_gallery_background_image_holder").addClass("visible");       
			},
			onSlideChangeStart: function() {
				$(".background-image").removeClass("active");
				var slide = $(".swiper-slide-active").data("rel");
				$(".background-image[data-rel=\'" + slide + "\']").addClass("active");
			
			}
		})
			$(".swiper-slide").each(function(){
			$(this).css("background", $(this).data("color"));	
			});;
	})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );

	$el_start = '';
	$el_end = '';
	$slides_wrap_start = ' <div class="swiper-slider duo"> 
                
								<div class="row-stick">
						
									<div class="col-6"> 
								
										<div class="swiper-container">
                                
											<div class="swiper-wrapper">';
	
	$slides_wrap_end_before = '</div><!-- SWIPER-WRAPPER -->
                                    
                                    <div class="swiper-pagination vertical lines left"></div>
                                    
                                </div><!-- SWIPER-CONTAINER -->
								
							</div><!-- COL-6 -->
								
							<div class="col-6 sticky-wrap">
                                
                            	<div class="background-image-holder" id="swiper_gallery_background_image_holder">';
								
	$slides_wrap_end_between = '';

                                                           
    $slides_wrap_end_after = '  		</div><!-- BACKGROUND-IMAGE-HOLDER --> 
                                    
                			</div><!-- COL-6 -->
							
						</div><!-- ROW STICK -->
                                    
                	</div><!-- SWIPER-SLIDER DUO -->';
					
} elseif ( 'swiper_horizontal' === $type ) {
	
	wp_enqueue_script( 'brankic-swiperslider');
	$inline_script = 'jQuery(document).ready(function($) {
		var swiper = new Swiper("#swiper-container-horizontal", {
			pagination: "#swiper-pagination-horizontal",
			slidesPerView: "auto",
			nextButton: "#swiper-button-next-horizontal",
			prevButton: "#swiper-button-prev-horizontal",
			centeredSlides: true,
			paginationClickable: true,
			spaceBetween: 30,
			loop: true,
			onSlideChangeStart: function() {
									$("#swiper-button-next-horizontal, #swiper-button-prev-horizontal, #swiper-pagination-lines-horizontal").removeClass("dark");
									if ($(".swiper-slide-active .light").length > 0 ) $("#swiper-button-next-horizontal, #swiper-button-prev-horizontal, #swiper-pagination-lines--horizontal").addClass("dark");													
								}
			
		});
	});'; 

	wp_add_inline_script( 'brankic-swiperslider', $inline_script );

	$el_start = '';
	$el_end = '';
	$slides_wrap_start = '<div class="swiper-slider centered"> 
                        
                            <div class="swiper-container" id="swiper-container-horizontal" style="width:100%">
                                    
                                <div class="swiper-wrapper ' . $swiper_height . '">';
								
                                                          
    $slides_wrap_end = '  		</div><!-- SWIPER-WRAPPER -->
                                        
                                <div class="swiper-button-next" id="swiper-button-next-horizontal"><span></span></div>
                                <div class="swiper-button-prev" id="swiper-button-prev-horizontal"><span></span></div>
                                <div class="swiper-pagination lines" id="swiper-pagination-lines-horizontal"></div>
                                        
                            </div><!-- SWIPER-CONTAINER -->
                                        
                        </div><!-- SWIPER-SLIDER CENTERED -->';
}

if ( 'link_image' === $onclick ) {
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
}

$flex_fx = '';
if ( 'flexslider' === $type || 'flexslider_fade' === $type || 'fading' === $type ) {
	$type = ' wpb_flexslider flexslider_fade flexslider';
	$flex_fx = ' data-flex_fx="fade"';
} elseif ( 'flexslider_slide' === $type ) {
	$type = ' wpb_flexslider flexslider_slide flexslider';
	$flex_fx = ' data-flex_fx="slide"';
} elseif ( 'image_grid' === $type ) {
	$type = ' wpb_image_grid';
}

if ( '' === $images ) {
	$images = '-1,-2,-3';
}

$pretty_rel_random = ' data-rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"';

if ( 'custom_link' === $onclick ) {
	$custom_links = vc_value_from_safe( $custom_links );
	$custom_links = explode( ',', $custom_links );
}

switch ( $source ) {
	case 'media_library':
		$images = explode( ',', $images );
		break;

	case 'external_link':
		$images = vc_value_from_safe( $custom_srcs );
		$images = explode( ',', $images );

		break;
}
foreach ( $images as $i => $image ) {
	$img_title = "";
	$img_caption = "";
	$img_description = "";
	switch ( $source ) {
		case 'media_library':
			if ( $image > 0 ) {
				$img = wpb_getImageBySize( array(
					'attach_id' => $image,
					'thumb_size' => $img_size,
				) );
				
				$thumb_size_h = "brankic-1024-512";
				$thumb_size_v = "brankic-512-1024";
				$thumb_size_s = "brankic-512-512";
				$thumb_size_s_big = "brankic-1024-1024"; // maybe in the future
				$thumb_sizes = $thumb_size_s;
				
				$full_image_url = wp_get_attachment_image_src( $image, "full" );
				$full_image_url = $full_image_url[0];
				
				$square_image_url = wp_get_attachment_image_src( $image, $thumb_size_s );
				$square_image_src = $square_image_url[0];
				
				$smaller_image_url = wp_get_attachment_image_src( $image, $thumb_size_h );
				$smaller_vertical_image_url = wp_get_attachment_image_src( $image, $thumb_size_v );
				$smaller_horizontal_image_url = wp_get_attachment_image_src( $image, $thumb_size_h );
				
				$thumbnail = $img['thumbnail'];
				$large_img_src = $img['p_img_large'][0];
				
				$smaller_img_src = $smaller_image_url[0];
				$smaller_vertical_img_src = $smaller_vertical_image_url[0];
				$smaller_horizontal_img_src = $smaller_horizontal_image_url[0];
				
				$attachment = get_post( $image );
				$img_title = $attachment->post_title;
				$img_caption = $attachment->post_excerpt;
				$img_description = $attachment->post_content;
			
				

			} else {
				$large_img_src = $default_src;
				$thumbnail = '<img src="' . $default_src . '" />';
			}
			
			
			
			break;

		case 'external_link':
			$image = esc_attr( $image );
			$dimensions = vcExtractDimensions( $external_img_size );
			$hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';
			$thumbnail = '<img ' . $hwstring . ' src="' . $image . '" />';
			$large_img_src = $image;
			break;
	}

	$link_start = $link_end = '';

	switch ( $onclick ) {
		case 'img_link_large':
			$link_start = '<a href="' . $large_img_src . '" target="' . $custom_links_target . '">';
			$link_end = '</a>';
			break;

		case 'link_image':
			$link_start = '<a class="prettyphoto" href="' . $large_img_src . '"' . $pretty_rel_random . '>';
			$link_end = '</a>';
			break;

		case 'custom_link':
			if ( ! empty( $custom_links[ $i ] ) ) {
				$link_start = '<a href="' . $custom_links[ $i ] . '"' . ( ! empty( $custom_links_target ) ? ' target="' . $custom_links_target . '"' : '' ) . '>';
				$link_end = '</a>';
			}
			break;
	}
	
	if ($type == "brankic_gallery") {
		
		if ($duotone_custom != "") {
			$duotone = 'duotone single-color';
		}
		
		if ($img_radius_size != "") $img_radius_size_data = 'data-img_radius_size="' . $img_radius_size . '"'; else $img_radius_size_data = "";
		if ($gap != "") $gap_data = 'data-gap="' . $gap . '"'; else $gap_data = "";
		if ($height != "") $height_data = 'data-height="' . $height . '"'; else $height_data = "";
		if ($brankic_gallery_show_meta == "on_hover") $post_info_class = "hidden"; else $post_info_class = "";
		
		$link_start = $link_end = '';
		if ($brankic_gallery_layout == "grid"){
			
			$attachment = get_post( $image );
			
			if ($grid_img_size == "square") $grid_img_src = $square_image_src;
			if ($grid_img_size == "portrait") $grid_img_src = $smaller_vertical_img_src;
			if ($grid_img_size == "landscape") $grid_img_src = $smaller_horizontal_img_src;
			
			$slides_wrap_start = '<div class="bra_gallery grid ' . $meta_position . ' col' . $columns . ' ' . $post_info_class . '" ' . $gap_data . ' ' . $img_radius_size_data . '>'; 
			
			$thumbnail = '<article>			
							<div class="' . $duotone . '">
                                <a href="' . $full_image_url . '" data-fancybox="grid-images" ' . $pretty_rel_random . ' class="prettyphoto">';
			
			if ($brankic_gallery_show_meta != ""){
				
				$thumbnail .= '<div class="post-info">';
				
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "title" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_title != "") $thumbnail .= '				<span class="img_title">' . $img_title . '</span>';
				}
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_caption != "") $thumbnail .= '				<span class="img_caption">' . $img_caption . '</span>';
				}
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_description != "") $thumbnail .= '				<span class= "img_description">' . $img_description . '</span>';
				}
				
				$thumbnail .= '</div>';
			}			
								
			$thumbnail .= ' 					<img src="' . $grid_img_src . '" alt="' . $image . '"/></a>                           
							 </div><!-- duotone -->  
                          </article>';
													
			$slides_wrap_end = '</div><!-- GRID -->';										
			
		}
		if ($brankic_gallery_layout == "flex"){
			
			$extra_images_stretch = brankic_of_get_option("extra_images_stretch", brankic_of_get_default("extra_images_stretch"));
			
			if ($extra_images_stretch) $stretch_class = "stretch"; else $stretch_class = "";
			
			$attachment = get_post( $image );
			
			$height_data = 'data-img-size="height-' . $height . '"';
			$slides_wrap_start = '<div class="bra_gallery flex col' . $columns . ' ' . $stretch_class . '" ' . $gap_data . ' ' . $img_radius_size_data . ' ' . $height_data . '>'; 
			
			$thumbnail = '<article>
							<div class="' . $duotone . '">
                                <a href="' . $large_img_src . '" data-fancybox="flex-images" ' . $pretty_rel_random . ' class="prettyphoto">';
			
			if ($brankic_gallery_show_meta != ""){
				
				$thumbnail .= '<div class="post-info">';
				
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "title" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_title != "") $thumbnail .= '				<span class="img_title">' . $img_title . '</span>';
				}
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_caption != "") $thumbnail .= '				<span class="img_caption">' . $img_caption . '</span>';
				}
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_description != "") $thumbnail .= '				<span class= "img_description">' . $img_description . '</span>';
				}
				
				$thumbnail .= '</div>';
			}
			
			$thumbnail .= ' <img src="' . $large_img_src . '" alt=""/></a>
                            </div><!-- duotone -->  
                          </article>';
													
			$slides_wrap_end = '</div><!-- FLEX -->';										
			
		}
		if ($brankic_gallery_layout == "grid_advanced"){
			
			if (isset($custom_article_width_height_array[$i])) $custom_width_height = $custom_article_width_height_array[$i]; else $custom_width_height = ''; // grid_advanced
			
			$attachment = get_post( $image );
			
			
			
			$slides_wrap_start = '<div class="bra_gallery grider ' . $meta_position . ' ' . $post_info_class . '" data-column="' . $columns . '" ' . $gap_data . ' ' . $img_radius_size_data . ' ' . $height_data . '>'; 
			
			$thumbnail = '<article class="grider-item ' . $custom_width_height . '">';			
			
            $thumbnail .= '                    <a href="' . $full_image_url . '" data-fancybox="grider-images" ' . $pretty_rel_random . ' class="prettyphoto ' . $duotone . '">';
			if ($brankic_gallery_show_meta != ""){
				
				$thumbnail .= '<div class="post-info">';
				
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "title" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_title != "") $thumbnail .= '				<span class="img_title">' . $img_title . '</span>';
				}
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_caption != "") $thumbnail .= '				<span class="img_caption">' . $img_caption . '</span>';
				}
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_description != "") $thumbnail .= '				<span class= "img_description">' . $img_description . '</span>';
				}
				
				$thumbnail .= '</div>';
			}
			
			$thumb_img_src = $square_image_src;
			$thumb_sizes = $thumb_size_s;
			
			if (substr_count($custom_width_height, "w2") == 1){
				$thumb_img_src = $smaller_horizontal_img_src;
				$thumb_sizes = $thumb_size_h;
			}
			if (substr_count($custom_width_height, "h2") == 1){
				$thumb_img_src = $smaller_vertical_img_src;
				$thumb_sizes = $thumb_size_v;
			}
	
			if (substr_count($custom_width_height, "h2") == 1 && substr_count($custom_width_height, "w2") == 1) {
				$thumb_img_src = $thumb_img_src;
				$thumb_sizes = $thumb_size_s;
			}

			
			
			
			$thumbnail .= '<img src="' . $thumb_img_src . '" alt="' . $image . '" ' . brankic_srcset($image, $thumb_sizes) . '/>';
			$thumbnail .= '</a>';
   
            $thumbnail .= '              </article>';
													
			$slides_wrap_end = '</div><!-- FLEX -->';										
			
		}
		if ($brankic_gallery_layout == "masonry"){
			
		
			$attachment = get_post( $image );
			
			$slides_wrap_start = '<div class="bra_gallery gallery-holder-masonry ' . $meta_position . ' col' . $columns . ' ' . $post_info_class . '" ' . $gap_data . ' ' . $img_radius_size_data . '>'; 
			
			$thumbnail = '<article>
							<div class="' . $duotone . '">
                                <a href="' . $large_img_src . '" data-fancybox="masonry-images" ' . $pretty_rel_random . ' class="prettyphoto">';
								
							$thumbnail .= '<div class="post-info">';
				
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "title" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_title != "") $thumbnail .= '				<span class="img_title">' . $img_title . '</span>';
				}
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_caption != "") $thumbnail .= '				<span class="img_caption">' . $img_caption . '</span>';
				}
				if ($brankic_gallery_show_meta == "all" || $brankic_gallery_show_meta == "on_hover") {
					if ($img_description != "") $thumbnail .= '				<span class= "img_description">' . $img_description . '</span>';
				}
				
				$thumbnail .= '</div>';					
								
								
				$thumbnail .= '				<img src="' . $large_img_src . '" alt=""/></a>
                            </div><!-- duotone -->   
                          </article>';
													
			$slides_wrap_end = '</div><!-- FLEX -->';										
			
		}
	}
	
	if ($type == "swiper_vertical") {
		
		$link_start = $link_end = '';
		
		$attachment = get_post( $image );
		
    	$thumbnail = '<div class="swiper-slide" data-color="' . get_post_meta( $image, '_wp_attachment_image_alt', true) . '" data-rel="' . brankic_safe_string_name($attachment->post_excerpt) . '">
        
                                            <div class="slide-content">
            
                                            	<div class="entry-category">
                                                	<span class="rotate">' . $attachment->post_title . '</span>	
                                                </div>
                                
                                				<div class="post-info-entry">
                                        
                                                	<header class="post-title">
                                                    	<h2 class="entry-title"><a href="#">' . $attachment->post_excerpt . '</a></h2>
                                                    </header>
                                            
                                                    <div class="post-excerpt">
                                                    	<p>' . $attachment->post_content . '</p>
                                                    </div><!-- POST-EXCERPT -->
                                                    
                                                    <aside class="post-footer">
                                                    	<a href="#" class="button outline">View case study</a>
                                                    </aside><!-- POST-FOOTER -->
                                    
                                    			</div><!-- POST-INFO-ENTRY -->	
                                                    
                                        	</div><!-- SLIDE-CONTENT -->
                                            
                                        </div><!-- SWIPER-SLIDE -->';
										
		$slides_wrap_end_between .= '<div class="background-image" style="background-image: url(' . $large_img_src . ');" data-rel="' . brankic_safe_string_name($attachment->post_excerpt) . '"></div>';
		
	}
	
	if ($type == "swiper_horizontal") {
		
		$link_start = $link_end = '';
		
		$attachment = get_post( $image );
		
    	$thumbnail = '<div class="swiper-slide" style="' . $swiper_slide_width . '">
                                        <div class="background-image' . brankic_get_avg_luminance($image, true) . '" style="background-image: url(' . $large_img_src . ');"></div>
                                    </div><!-- SWIPER-SLIDE -->';
	}

	$gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
}

$class_to_filter = 'wpb_gallery wpb_content_element vc_clearfix';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output = '';
$output .= '<div class="' . $css_class . '" ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_widget_title( array(
	'title' => $title,
	'extraclass' => 'wpb_gallery_heading',
) );

if ($type == 'swiper_vertical') $slides_wrap_end = $slides_wrap_end_before . $slides_wrap_end_between . $slides_wrap_end_after;

$output .= '<div id="' . $brankic_gallery_id . '" class="wpb_gallery_slides' . $type . '" data-interval="' . $interval . '"' . $flex_fx . '>' . $slides_wrap_start . $gal_images . $slides_wrap_end . '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
