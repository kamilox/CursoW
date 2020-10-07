<?php
/**
 * Plugin Name: Brankic Myriad Shortcode Extension
 * Plugin URI: http://brankic1979.com
 * Description: This plugin adds shortcodes made by Brankic1979.
 * Version: 1.3
 * Author: Brankic1979
 * Author URI: http://brankic1979.com
 * License: GPL2
 */
 
// Instantiate the main plugin class (use only for checking is plugin active)
class Brankic_Shortcodes {}

 
function brankic_add_my_tc_button() {
	global $typenow;
	// check user permissions
	if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
	return;
	}
	// verify the post type
	if( ! in_array( $typenow, array( 'post', 'page', 'portfolio_item') ) )
		return;
	// check if WYSIWYG is enabled
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "brankic_add_tinymce_plugin");
		add_filter('mce_buttons', 'brankic_register_my_tc_button');
	}
}

function brankic_register_my_tc_button($buttons) {
   array_push($buttons, "brankic_tc_button");
   return $buttons;
}


// you can use shortcodes in text widget in sidebars
add_filter('widget_text', 'do_shortcode');

require_once dirname( __FILE__ ) . '/custom_post_taxonomies.php';

require_once dirname( __FILE__ ) . '/brankic_shortcodes.php';

require_once dirname( __FILE__ ) . '/vc_extension/brankic-vc-extension.php'; 

require_once dirname( __FILE__ ) . '/acf.php';

require_once dirname( __FILE__ ) . '/myriadwp_vc_templates.php';

require_once dirname( __FILE__ ) . '/css_db.php';

if (is_admin()) {
	include_once('importer/one-click-import.php');
}


add_action('plugins_loaded', 'brankic_load_textdomain');
function brankic_load_textdomain() {
	load_plugin_textdomain( 'myriadwp', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

add_action( 'admin_enqueue_scripts', 'brankic_enqueued_admin_assets' );

function brankic_enqueued_admin_assets() {
	wp_enqueue_style( 'brankic-js_composer-admin', plugin_dir_url( __FILE__ ) . 'css/brankic-js_composer-admin.css', array("js_composer"));
	wp_register_script( 'brankic-admin_js', plugin_dir_url( __FILE__ ) . 'javascript/brankic-admin_js.js', array('jquery'), '1.0.0', false );
	wp_enqueue_style( 'brankic-acf', plugin_dir_url( __FILE__ ) . 'css/brankic_acf.css', array("acf-input"));
}

function brankic_enqueue_assets() {


	wp_register_script( 'brankic-swiperslider', plugin_dir_url( __FILE__ ) . 'javascript/jquery.swiperslider.js', array('jquery'), '1.0.0', false );
	wp_register_script( 'brankic-parallax', plugin_dir_url( __FILE__ ) . 'javascript/jquery.parallax.js', array('jquery'), '1.0.0', false );
	wp_register_script( 'brankic-isotope', plugin_dir_url( __FILE__ ) . 'javascript/jquery.isotope.min.js', array('jquery'), '1.0.0', false );
	wp_register_script( 'brankic-odometer', plugin_dir_url( __FILE__ ) . 'javascript/odometer.min.js', array('jquery'), '1.0.0', false );
	wp_register_script( 'tilt-jquery', plugin_dir_url( __FILE__ ) . 'javascript/tilt.jquery.min.js', array('jquery'), '1.0.0', false );
	
	if (function_exists("get_field")) {
		if (get_field("animated_bg")) {
			wp_register_script( 'inview', plugin_dir_url( __FILE__ ) . 'javascript/inview.js', array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'inview');			
		}
	}
	
	wp_register_script( 'brankic-shortcodes-custom', plugin_dir_url( __FILE__ ) . 'javascript/brankic-shortcodes-custom.js', array('jquery'), '1.0.0', false );
	wp_enqueue_script( 'brankic-shortcodes-custom');
	
	wp_register_style( 'brankic-dummy', false);
	
}

add_action( 'wp_enqueue_scripts', 'brankic_enqueue_assets', 10 );

function brankic_inf_remove_junk() {

          wp_deregister_style('js_composer_front');
		  wp_enqueue_style( 'js_composer_front', plugin_dir_url( __FILE__ ) . 'css/brankic_js_composer.min.css' );

}

add_action( 'wp_enqueue_scripts', 'brankic_inf_remove_junk' );

function brankic_testimonials($testimonial_cat_id, $wrapper = true, $padding = ""){
	
	$limit = brankic_of_get_option("portfolio_item_limit", brankic_of_get_default("portfolio_item_limit"));
	$testimonial_type = brankic_of_get_option("portfolio_item_testimonial_type", brankic_of_get_default("portfolio_item_testimonial_type"));
	$carousel_navigation = brankic_of_get_option("portfolio_item_carousel_navigation", brankic_of_get_default("portfolio_item_carousel_navigation"));
	$carousel_navigation_color = brankic_of_get_option("portfolio_item_carousel_navigation_color", brankic_of_get_default("portfolio_item_carousel_navigation_color"));
	$bg_pattern = brankic_of_get_option("portfolio_item_bg_pattern", brankic_of_get_default("portfolio_item_bg_pattern"));
	$bg_color_testimonial = brankic_of_get_option("portfolio_item_bg_color_testimonial", brankic_of_get_default("portfolio_item_bg_color_testimonial"));
	$bg_color_2_testimonial = brankic_of_get_option("portfolio_item_bg_color_2_testimonial", brankic_of_get_default("portfolio_item_bg_color_2_testimonial"));
	$text_color_testimonial = brankic_of_get_option("portfolio_item_text_color_testimonial", brankic_of_get_default("portfolio_item_text_color_testimonial"));
	$speed = brankic_of_get_option("portfolio_item_speed", brankic_of_get_default("portfolio_item_speed"));
	$slides_per_view = brankic_of_get_option("portfolio_item_slides_per_view", brankic_of_get_default("portfolio_item_slides_per_view"));
	$gap = brankic_of_get_option("portfolio_item_gap", brankic_of_get_default("portfolio_item_gap"));

	if ($slides_per_view == "auto") $slides_per_view = "'auto'";
	
	$args=array(
	'tax_query' => array(
		array(
			'taxonomy' => 'testimonial_category',
			'field' => 'term_id',
			'terms' => $testimonial_cat_id
		)
	),
	'post_type' => 'testimonial_item',
	'orderby' => 'date',
	'order' => 'DESC',
	'posts_per_page' => $limit
	);

	global $wp_query;
	
	$temp = $wp_query;
	
	$wp_query = new WP_Query( $args );
	
	$id = sprintf("%s", uniqid());
	$data_navigation = $html_navigation = $inline_script_navigation = "";
	
	$html = "";
	
	if ($wrapper) $html .= '<div class="row-container"> <div class="row ' . $padding . ' padding-bottom-100 padding-top-100">';
	
	$html .= '				<div class="col-8 margin-0 auto" style="float:none">';
	
	if ($carousel_navigation == "lines_below") {
		$data_navigation = 'data-navigation-outside="true"';
		$html_navigation = '<div class="swiper-pagination lines ' . $carousel_navigation_color . '"></div>';
		$inline_script_navigation = 'paginationClickable: true,
					pagination: "#carousel-' . $id . ' .swiper-pagination",';
	}
	
	if ($carousel_navigation == "dots_below") {
		$data_navigation = 'data-navigation-outside="true"';
		$html_navigation = '<div class="swiper-pagination ' . $carousel_navigation_color . '"></div>';
		$inline_script_navigation = 'paginationClickable: true,
					pagination: "#carousel-' . $id . ' .swiper-pagination",';
	}
	
	
	if ($carousel_navigation == "arrows_below") {
		$data_navigation = 'data-navigation-outside="true"';
		$html_navigation = '<div class="swiper-button-next ' . $carousel_navigation_color . '"><span></span></div>
								<div class="swiper-button-prev ' . $carousel_navigation_color . '"><span></span></div>';
		$inline_script_navigation = 'nextButton: "#carousel-' . $id . ' .swiper-button-next",
					prevButton: "#carousel-' . $id . ' .swiper-button-prev",';
	}
	
	if ($carousel_navigation == "arrows_side") {
		$data_navigation = 'data-navigation-outside="true"';
		$html_navigation = '<div class="swiper-button-next ' . $carousel_navigation_color . '"><span></span></div>
								<div class="swiper-button-prev ' . $carousel_navigation_color . '"><span></span></div>';
		$inline_script_navigation = 'nextButton: "#carousel-' . $id . ' .swiper-button-next",
					prevButton: "#carousel-' . $id . ' .swiper-button-prev",';
	}

	if ($carousel_navigation == "arrows_side dots_below") {
		$data_navigation = 'data-navigation-outside="true"';
		
		$html_navigation = '<div class="swiper-button-next ' . $carousel_navigation_color . '"><span></span></div>
								<div class="swiper-button-prev ' . $carousel_navigation_color . '"><span></span></div>';
		$html_navigation .= '<div class="swiper-pagination ' . $carousel_navigation_color . '"></div>';
		$inline_script_navigation = 'nextButton: "#carousel-' . $id . ' .swiper-button-next",
					prevButton: "#carousel-' . $id . ' .swiper-button-prev",';
		$inline_script_navigation .= 'paginationClickable: true,
					pagination: "#carousel-' . $id . ' .swiper-pagination",';
	}
	
	
	if ($carousel_navigation == "arrows_side lines_below") {
		$data_navigation = 'data-navigation-outside="true"';
		$html_navigation = '<div class="swiper-button-next ' . $carousel_navigation_color . '"><span></span></div>
								<div class="swiper-button-prev ' . $carousel_navigation_color . '"><span></span></div>';
		$html_navigation .= '<div class="swiper-pagination lines ' . $carousel_navigation_color . '"></div>';
		$inline_script_navigation = 'nextButton: "#carousel-' . $id . ' .swiper-button-next",
					prevButton: "#carousel-' . $id . ' .swiper-button-prev",';
		$inline_script_navigation .= 'paginationClickable: true,
					pagination: "#carousel-' . $id . ' .swiper-pagination",';
	}
		
		$html .= '<div class="swiper-container content-carousel" id="carousel-' . $id . '" ' . $data_navigation . '>
                            
                        	<div class="swiper-wrapper">';

		// The Loop
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
	
			$html .= '				<div class="swiper-slide">';
			
			$featured_image = brankic_featured_image_url("4x3");
			$url = get_field("url");
			$testimonial = get_field("testimonial");
			$occupation = get_field("occupation");
			
			$imageSrc = wp_get_attachment_image_src($bg_pattern, 'full');
			
			if ($testimonial_type == "default"){
					
				$html .= '<div class="testimonials text-align-center"><div class="t_item"><div class="t_text">';
				$html .= '<p>' . $testimonial . '</p>';
				$html .= '</div>';
				$html .= '<div class="t_author"><div class="t_avatar">';
				$html .= '<img src="' . $featured_image[0] . '" alt="">';
				$html .= '</div>';
				$html .= '<span class="name">' . get_the_title() . '</span>';
				$html .= '<span class="occupation">' . $occupation . '</span>';
				$html .= '</div></div><!-- T_ITEM --></div><!-- TESTIMONIALS --> ';
				
			}
			if ($testimonial_type == "solid"){
					
				$html .= '<div class="testimonials text-align-center boxed solid"><div class="t_item" style="background:' . $bg_color_testimonial . '; color:' . $text_color_testimonial . ';"><div class="t_text">';
				$html .= '<p>' . $testimonial . '</p>';
				$html .= '</div>';
				$html .= '<div class="t_author"><div class="t_avatar">';
				$html .= '<img src="' . $featured_image[0] . '" alt="">';
				$html .= '</div>';
				$html .= '<span class="name">' . get_the_title() . '</span>';
				$html .= '<span class="occupation">' . $occupation . '</span>';
				$html .= '</div></div><!-- T_ITEM --></div><!-- TESTIMONIALS --> ';
				
			}
			if ($testimonial_type == "duo"){
					
				$html .= '<div class="testimonials text-align-center boxed duo">';
				$html .= '<div class="t_item" style="background:' . $bg_color_testimonial . '; color:' . $text_color_testimonial . ';">';
				
				if ($imageSrc != "") $html .= '<div class="t_text background-pattern" style="color: #fff; background-image: url(' . $imageSrc . ');">';
				else $html .= '<div class="t_text">';
				
				$html .= '<p>' . $testimonial . '</p>';
				$html .= '</div>';
				$html .= '<div class="t_author"><div class="t_avatar">';
				$html .= '<img src="' . $featured_image[0] . '" alt="">';
				$html .= '</div>';
				$html .= '<span class="name">' . get_the_title() . '</span>';
				$html .= '<span class="occupation">' . $occupation . '</span>';
				$html .= '</div></div><!-- T_ITEM --></div><!-- TESTIMONIALS --> ';
				
			}
			if ($testimonial_type == "monochrome"){
					
				$html .= '<div class="testimonials text-align-center boxed duo monochrome">';
				$html .= '<div class="t_item">';
				
				$html .= '<div class="t_text" style="background: linear-gradient(120deg, ' . $bg_color_testimonial . ', ' . $bg_color_2_testimonial . '); color:' . $text_color_testimonial . ';">';
				
				$html .= '<p>' . $testimonial . '</p>';
				$html .= '</div>';
				$html .= '<div class="t_author"><div class="t_avatar">';
				$html .= '<img src="' . $featured_image[0] . '" alt="">';
				$html .= '</div>';
				$html .= '<span class="name">' . get_the_title() . '</span>';
				$html .= '<span class="occupation">' . $occupation . '</span>';
				$html .= '</div></div><!-- T_ITEM --></div><!-- TESTIMONIALS --> ';
				
			}
			
			$html .= '				</div><!-- SWIPER-SLIDE -->';

		endwhile;
		
		$html .= '</div><!-- SWIPER-WRAPPER -->';
                            
        $html .= $html_navigation;
							                                
        $html .= '            	</div><!-- SWIPER-CONTAINER -->';
		
		$html .= '</div>';
			
		if ($wrapper) $html .= '	    </div><!-- ROW --> </div><!-- ROW-CONTAINER -->';
			
		wp_enqueue_script( 'brankic-swiperslider');
		
		$inline_script = 'jQuery(document).ready(function($){
				
				var brankic_swiper = new Swiper("#carousel-' . $id . '", {
					speed: ' . $speed . ',
					direction: "horizontal",
					slidesPerView: ' . $slides_per_view . ',
					spaceBetween: ' . $gap . ',
					loop: true,
					mousewheelControl: false,
					autoHeight: true,
					';
		$inline_script .= $inline_script_navigation;
		$inline_script .= '		});		
		})';
		
		wp_add_inline_script( 'brankic-swiperslider', $inline_script );
		
		$wp_query = $temp;  //reset back to original query
		
		echo $html;
}

function brankic_get_avg_luminance($filename, $return_class = false, $num_samples=10) {

			if (is_numeric($filename)){
				
				$image = wp_get_attachment_image_src( $filename);
				$filename = $image[0];
				
			} else {
			
				$pos = strrpos($filename, ".");
				$filename = substr($filename, 0, $pos) . "-150x150" . substr($filename, $pos);
			}
			
			$path = parse_url($filename, PHP_URL_PATH);

				//To get the dir, use: dirname($path)

				$filename = $_SERVER['DOCUMENT_ROOT'] . $path;
			

		if (file_exists($filename)) {
			if (exif_imagetype($filename) == IMAGETYPE_JPEG) $img = imagecreatefromjpeg($filename);
			else if (exif_imagetype($filename) == IMAGETYPE_PNG) $img = imagecreatefrompng($filename);
			else if (exif_imagetype($filename) == IMAGETYPE_GIF) $img = imagecreatefromgif($filename);
			
			$width = imagesx($img);
			$height = imagesy($img);

			$x_step = intval($width/$num_samples);
			$y_step = intval($height/$num_samples);

			$total_lum = 0;

			$sample_no = 1;

			for ($x=0; $x<$width; $x+=$x_step) {
				for ($y=0; $y<$height; $y+=$y_step) {

					$rgb = imagecolorat($img, $x, $y);
					$r = ($rgb >> 16) & 0xFF;
					$g = ($rgb >> 8) & 0xFF;
					$b = $rgb & 0xFF;

					// choose a simple luminance formula from here
					// http://stackoverflow.com/questions/596216/formula-to-determine-brightness-of-rgb-color
					$lum = ($r+$r+$b+$g+$g+$g)/6;

					$total_lum += $lum;

					// debugging code
					$sample_no++;
				}
			}

			// work out the average
			$avg_lum  = $total_lum/$sample_no;
		}
		 
		else $avg_lum = 255;
		
		$class = "";
		if ($avg_lum > 200) $class = "light"; 

        if ($return_class) return $class;
		else return $avg_lum;
}

function brankic_getContents($str, $startDelimiter, $endDelimiter) {
  $contents = array();
  $startDelimiterLength = strlen($startDelimiter);
  $endDelimiterLength = strlen($endDelimiter);
  $startFrom = $contentStart = $contentEnd = 0;
  while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
    $contentStart += $startDelimiterLength;
    $contentEnd = strpos($str, $endDelimiter, $contentStart);
    if (false === $contentEnd) {
      break;
    }
    $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
    $startFrom = $contentEnd + $endDelimiterLength;
  }

  return $contents;
}

function brankic_calc_scale($css){
	
	$properties = array("padding", "padding-top", "padding-bottom", "padding-left", "padding-right", "margin", "margin-top", "margin-bottom", "margin-left", "margint-right");
	

		
			foreach($properties as $property){
				$string_start = $property . ': ';
				$string_end = ' !important';
				$strings_array[] = $string_start . " " . $string_end;
				$return_array_big[] = brankic_getContents($css, $string_start, $string_end);
				$return_array = brankic_getContents($css, $string_start, $string_end);
				foreach($return_array as $value){

					if (substr_count($value, "calc") == 0){
						$part_to_replace = $string_start . $value . $string_end;
						$new_value = 'calc(' . $value . '/var(--scale-spacing))';
						$substitution = $string_start . $new_value . $string_end;
						$css = str_replace($part_to_replace, $substitution, $css);
					}
					
				}
			}	
	return $css;	
}

function brankic_portfolio_extra_images($layout = "stack", $include_featured = false){
	
	$featured_images_urls = brankic_featured_images_super_function("", $include_featured, "urls");
	$featured_images_captions = brankic_featured_images_super_function("", $include_featured, "captions");
	$featured_images_descriptions = brankic_featured_images_super_function("", $include_featured, "descriptions");
	$featured_images_ids = brankic_featured_images_super_function("", $include_featured, "ids");
	$featured_images_srcsets = brankic_featured_images_super_function("", $include_featured, "srcsets");
	
	$images = implode(",", $featured_images_ids);
	
	$featured_images_limit = count($featured_images_ids);
		
	$extra_images_use_duotone = brankic_global_or_local("extra_images_use_duotone");
	$extra_images_duotone = brankic_global_or_local("extra_images_duotone");
	$extra_images_duotone_color = brankic_global_or_local("extra_images_duotone_color");
	
	$extra_images_columns = brankic_global_or_local("extra_images_columns");
	$extra_images_img_radius_size = brankic_global_or_local("extra_images_img_radius_size");
	$extra_images_gap = brankic_global_or_local("extra_images_gap");
	
	$extra_images_grider_height = brankic_global_or_local("extra_images_grider_height");
	$extra_images_width_height = brankic_global_or_local("extra_images_width_height");	 
	
	if ($extra_images_duotone != "") {
		$duotone_class = 'class="' . $extra_images_duotone . '"'; 
		$extra_images_duotone_shortcode_class = $extra_images_duotone;
	} else {
		$duotone_class = "";
		$extra_images_duotone_shortcode_class = "";
	}
		
	if ($extra_images_duotone_color != "" && $extra_images_duotone == "custom") {
		$duotone_class = 'class="duotone single-color"';
		$extra_images_duotone_shortcode_class = "duotone single-color";
	}
	
	if ($extra_images_columns != "") $extra_images_columns_shortcode = 'columns="' . $extra_images_columns . '"'; else $extra_images_columns_shortcode = "";
	if ($extra_images_img_radius_size != "") $extra_images_img_radius_size_shortcode = 'img_radius_size="' . $extra_images_img_radius_size . '"'; else $extra_images_img_radius_size_shortcode = "";
	if ($extra_images_gap != "") $extra_images_gap_shortcode = 'gap="' . $extra_images_gap . '"'; else $extra_images_gap_shortcode = "";
	
	if ($extra_images_grider_height != "") $extra_images_grider_height_shortcode = 'height="' . $extra_images_grider_height . '"'; else $extra_images_grider_height_shortcode = "";
	if ($extra_images_width_height != "") $extra_images_width_height_shortcode = 'custom_article_width_height="' . $extra_images_width_height . '"'; else $extra_images_width_height_shortcode = "";
	
	
	if ($layout == "grid_advanced" || $layout == "flex" || $layout == "grid_simple" || $layout == "masonry"){
		if ($layout == "grid_simple") $layout = "grid";
		$shortcode_string = '[vc_gallery type="brankic_gallery" brankic_gallery_layout="' . $layout . '" images="' . $images . '" duotone="' . $extra_images_duotone_shortcode_class . '" ';
		$shortcode_string .= $extra_images_columns_shortcode . ' ' . $extra_images_img_radius_size_shortcode . ' ' . $extra_images_gap_shortcode . ' ' . $extra_images_grider_height_shortcode . ' ' . $extra_images_width_height_shortcode . ']';
		echo do_shortcode($shortcode_string);
	}
	
	
	if ($layout == "stack") {
	
	if ($extra_images_img_radius_size != "") $img_radius_size_data = "data-img_radius_size='" . $extra_images_img_radius_size . "'"; else  $img_radius_size_data = "";
	
	if ($extra_images_gap != "") $data_gap = 'data-gap="' . $extra_images_gap . '"'; else $data_gap = "";
	
		$stack_extra_images_html = "";
		$stack_extra_images_html = '<div class="bra_gallery" ' . $img_radius_size_data . ' ' . $data_gap . '>';
		
		foreach ($featured_images_urls as $key => $image_url) { 
		
			$stack_extra_images_html .= '<article>';
			
			if ($extra_images_use_duotone == "yes") $stack_extra_images_html .= '<div ' . $duotone_class . '>';
			
			$stack_extra_images_html .= '<img class="" src="' . $image_url . '" ' . brankic_srcset($featured_images_ids[$key]) . ' alt="">';
			
			if ($extra_images_use_duotone == "yes") $stack_extra_images_html .= '</div>';
			
			$stack_extra_images_html .= '</article>';
			
		}
		
		$stack_extra_images_html .= "</div>";
		
		return $stack_extra_images_html;
	}

	if ($layout == "carousel") {
		
		$brankic_id = "portfolio_item_extra_images_carousel";
		
		
		$single_image_height = brankic_global_or_local("single_image_height");
		$emphasize_size = brankic_global_or_local("emphasize_size");
		$emphasize_opacity = brankic_global_or_local("emphasize_opacity");
		$carousel_navigation = brankic_global_or_local("carousel_navigation");
		$autoheight = brankic_global_or_local("autoheight");
		$fraction_navigation = brankic_global_or_local("fraction_navigation");
		$carousel_navigation_color = brankic_global_or_local("carousel_navigation_color");
		$carousel_navigation_align = brankic_global_or_local("carousel_navigation_align");
		
		$extra_images_carousel_centered = brankic_global_or_local("extra_images_carousel_centered");
		$extra_images_carousel_fade = brankic_global_or_local("extra_images_carousel_fade");
		$extra_images_carousel_loop = brankic_global_or_local("extra_images_carousel_loop");
		$extra_images_carousel_autoplay = brankic_global_or_local("extra_images_carousel_autoplay");
		$extra_images_carousel_speed = brankic_global_or_local("extra_images_carousel_speed");
		$extra_images_carousel_delay = brankic_global_or_local("extra_images_carousel_delay");
		$extra_images_carousel_gap = brankic_global_or_local("extra_images_carousel_gap");
		
		if ($extra_images_carousel_speed == "") $extra_images_carousel_speed = brankic_of_get_default("extra_images_carousel_speed");
		if ($extra_images_carousel_delay == "") $extra_images_carousel_delay = brankic_of_get_default("extra_images_carousel_delay");
		
		$slides_per_view = $extra_images_columns; 
		
		if ($extra_images_carousel_centered) $centered = "true"; else $centered = "false";
		$content_position = "center";
		if ($extra_images_carousel_fade) $fade = "true"; else $fade = "false";
		if ($extra_images_carousel_loop) $loop = "true"; else $loop = "false";
		if ($extra_images_carousel_autoplay) $autoplay = "true"; else $autoplay = "false";
		$speed = $extra_images_carousel_speed;
		$delay = $extra_images_carousel_delay;
		$gap = $extra_images_carousel_gap;
		if ($gap == "") $gap = 0;
		
		if ($centered == "true") $centered_slides = "centeredSlides: true,"; else $centered_slides = "centeredSlides: false,";	
		if ($autoplay == "true") $autoplay = "autoplay: $delay,"; else $autoplay = "";
		if ($fade == "true" && $slides_per_view == "1") $fade = "effect:'fade',"; else $fade = "";
		
		
		$data_content_position = "";
		if ($content_position != "") $data_content_position = 'data-content_position="' . $content_position . '"';
		
		$container_extra_class = "";
		if (($slides_per_view == "4" || $slides_per_view == "5" || $slides_per_view == "6" || $slides_per_view == "7") && $centered == "true" && $emphasize_opacity == "yes") {
			$container_extra_class = "l_r_opacity";
		}
		
		if ($emphasize_size == "yes") $emphasize_size =  "emphasize-size"; else $emphasize_size = "";
		if ($emphasize_opacity == "yes") $emphasize_opacity =  "emphasize-opacity"; else $emphasize_opacity = "";
		if ($autoheight == "yes") $autoheight = "true"; else $autoheight = "false";
		if ($fraction_navigation == "yes" && $carousel_navigation == "arrows_below") $fraction_navigation = 'fraction'; else $fraction_navigation = '';
		if ($fraction_navigation != "") $fraction_pagination =  'data-pagination-fraction="true"'; else $fraction_pagination = "";
		if ($fraction_navigation == "") $fraction_navigation = "bullets";
		
		$data_navigation = "";
		$html_navigation = "";
		$inline_script_navigation = "";
		$inline_script_pagination = "";
		
		$carousel_navigation_align = 'data-navigation-align="' . $carousel_navigation_align . '"';
		
		if ($carousel_navigation == "lines_below") {
			
			$data_navigation = 'data-navigation-outside="true"';
			$html_navigation = '<div class="swiper-pagination lines ' . $carousel_navigation_color . '"></div>';
			$inline_script_pagination = 'pagination: {
				el: "#' . $brankic_id . ' .swiper-pagination",
				type: "' . $fraction_navigation . '",
				clickable: true
			  },';
			

		}
		if ($carousel_navigation == "lines_inside") {
			$data_navigation = 'data-navigation-outside=""';
			$html_navigation = '<div class="swiper-pagination lines ' . $carousel_navigation_color . '"></div>';
			$inline_script_pagination = 'pagination: {
				el: "#' . $brankic_id . ' .swiper-pagination",
				type: "' . $fraction_navigation . '",
				clickable: true
			  },';
			  
		}
		
		if ($carousel_navigation == "dots_below") {
			$data_navigation = 'data-navigation-outside="true"';
			$html_navigation = '<div class="swiper-pagination ' . $carousel_navigation_color . '"></div>';
			$inline_script_pagination = 'pagination: {
				el: "#' . $brankic_id . ' .swiper-pagination",
				type: "' . $fraction_navigation . '",
				clickable: true
			  },';
			  
		}
		
		if ($carousel_navigation == "dots_inside") {
			$data_navigation = 'data-navigation-outside=""';
			$html_navigation = '<div class="swiper-pagination ' . $carousel_navigation_color . '"></div>';
			$inline_script_pagination = 'pagination: {
				el: "#' . $brankic_id . ' .swiper-pagination",
				type: "' . $fraction_navigation . '",
				clickable: true
			  },';
			  
		}
		
		
		if ($carousel_navigation == "arrows_below") {
			$data_navigation = 'data-navigation-outside="true"';
			$html_navigation = '';
			
			if ($fraction_navigation != "") $html_navigation .= '<div class="swiper-pagination ' . $carousel_navigation_color . '"></div>';
			$html_navigation .= '<div class="swiper-button-next ' . $carousel_navigation_color . '"><span></span></div>
									<div class="swiper-button-prev ' . $carousel_navigation_color . '"><span></span></div>';
			
			$inline_script_navigation = 'navigation: {
				nextEl: "#' . $brankic_id . ' .swiper-button-next",
				prevEl: "#' . $brankic_id . ' .swiper-button-prev",
			  },';
			$inline_script_pagination = 'pagination: {
				el: "#' . $brankic_id . ' .swiper-pagination",
				type: "' . $fraction_navigation . '",
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
			
			$inline_script_pagination = 'pagination: {
				el: "#' . $brankic_id . ' .swiper-pagination",
				type: "' . $fraction_navigation . '",
			  },'; 

		}
		
		if ($extra_images_img_radius_size != "") $img_radius_size_data = "data-img_radius_size='" . $extra_images_img_radius_size . "'"; else  $img_radius_size_data = "";
		
		
	
		$carousel_extra_images_html = '<div class="swiper-container content-carousel ' . $single_image_height . ' ' . $emphasize_size . ' ' . $emphasize_opacity . ' ' . $container_extra_class . '" id="' . $brankic_id . '" ' . $data_navigation ;
        $carousel_extra_images_html .= ' ' . $fraction_pagination . ' ' . $data_content_position . ' ' . $carousel_navigation_align . ' ' . $img_radius_size_data . '>';
                            
        $carousel_extra_images_html .= '<div class="swiper-wrapper">';
		
		foreach ($featured_images_urls as $key => $image_url) { 
		
			$carousel_extra_images_html .= '<div class="swiper-slide">';
			
			if ($extra_images_use_duotone == "yes") $carousel_extra_images_html .= '<div ' . $duotone_class . '>';
			
			$carousel_extra_images_html .= '<img class="" src="' . $image_url . '" ' . brankic_srcset($featured_images_ids[$key]) . ' alt="">';
			
			if ($extra_images_use_duotone == "yes") $carousel_extra_images_html .= '</div>';
			
			$carousel_extra_images_html .= '</div><!-- SWIPER-SLIDE -->';
		
		}
		$carousel_extra_images_html .= '</div><!-- SWIPER-WRAPPER -->';
                            
        $carousel_extra_images_html .= $html_navigation;
							                                
        $carousel_extra_images_html .= '            	</div><!-- SWIPER-CONTAINER -->';
		
		
		wp_enqueue_script( 'brankic-swiperslider');
		
		
		
		$inline_script = 'jQuery(window).load(function($){
				
				jQuery("#' . $brankic_id . ' .team-member, #' . $brankic_id . ' .wpb_text_column.wpb_content_element, #' . $brankic_id . ' .single-image-wrap").each(function(){
					jQuery(this).wrap("<div class=\'swiper-slide\'>");	
				});
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
					breakpoints: {
						1024: {
						  slidesPerView: 1,
						},
						640: {
						  slidesPerView: 1,
						}
					},
					autoHeight: ' . $autoheight . ',
					mousewheel: false,';
		$inline_script .= $inline_script_navigation;
		$inline_script .= $inline_script_pagination;
		$inline_script .= $centered_slides;
		$inline_script .= $fade;
		$inline_script .= $autoplay;
		$inline_script .= '		});		
		})';
	wp_add_inline_script( 'brankic-swiperslider', $inline_script );
		
		
		return $carousel_extra_images_html;
		
	}
	
}

function brankic_check_css_id($id_to_check){
	$db_css = get_post_meta( get_the_ID(), '_brankic_custom_css', true);
	if (substr_count($db_css, $id_to_check) > 0) return true;
	else return false;
}


