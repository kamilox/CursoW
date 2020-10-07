<?php
/*******************************************************************************************************************
* Page with category listed                                                                                        *
*                                                                                                                  *
*******************************************************************************************************************/
if(!function_exists('Brankic_category')) {
	function Brankic_category($atts, $content = null) {

	$default_atts = array(
		"cat_id" 					=> "", 
		"cat_slug" 					=> "",
		"author_id"					=> "",
		"tag_id"					=> "",
		"search"					=> "",
		"layout" 					=> "blog-style-1",
		"boxed"						=> "",
		"content_position"			=> "",
		"read_more"					=> "Read article",
		"slide_in_effect"			=> "slide-in-effect effect-btt",
		"effect"					=> "fade",
		"image_holder_left"			=> "",
		"fixed_tooltip"				=> "",
		"tooltip_position"			=> "",
		"custom_cursor"				=> "",
		"custom_cursor_text"		=> "Read more",
		"custom_cursor_color"		=> "ffcc99",
		"custom_cursor_bg"			=> "403a3e",
		"emphasize_first_post"		=> "",
		"emphasize_style"			=> "style_3",
		"emphasize_show_excerpt"	=> "",
		"style" 					=> "grid",
		"flex_height"				=> "height-55",
		"blog_2_image_height"		=> "height-35",
		"image_height"				=> "height-100",		
		"thumb_sizes"				=> "brankic-1024-768",
		"img_radius" 				=> "",
		"img_radius_size" 			=> "4px",
		"bg_img_color"				=> "",
		"image_zoom_effect"			=> "image_effect_zoom_out",
		"content_color"				=> "",
		"split_screen"				=> "",
		"split_color"				=> "",
		"only_next_title_color"					=> "",		
		"only_next_split_color"					=> "",
		"only_next_duotone"						=> "",
		"only_next_duotone_custom"				=> "",
		"only_next_duotone_gradient"			=> "",
		"only_next_duotone_gradient_direction"	=> "to top right",
		"only_next_duotone_custom_2"			=> "",
		"only_next_duotone_custom_3"			=> "",
		"image_position"			=> "left",
		"show_next"					=> "true",
		"bg_img_fullwidth"			=> "",
		"nav_fullwidth"				=> "",
		"sticky_vertical"			=> "",
		"shadow_color"				=> "rgba(0, 0, 0, .24)",
		"columns" 					=> "3",
		"columns_tablet" 			=> "inherit",
		"columns_phone" 			=> "inherit",
		"slides_per_view"			=> "3",
		"gap_advanced"				=> "10px",
		"grid_advanced_row_height"	=> "30",
		"show_filters" 				=> "no", 
		"navigation" 				=> "numeric_pagination", 
		"limit" 					=> "-1", 
		"title_vertical_position"	=> "bottom",
		"title_horizontal_position" => "left",
		"fig_hid_position"			=> "middle center",
		"fig_hid_alignment"			=> "text-center",
		"captions_position" 		=> "",
		"captions_align" 			=> "",
		"captions_align_new"		=> "text-align-center",
		"captions_layout" 			=> "",
		"title_font_family"			=> "",
		"custom_title_font_family"	=> "",
		"title_color" 				=> "",
		"title_style"				=> "",
		"titles_weight"				=> "",
		"category_color"			=> "#000000",
		"active_title_color"		=> "",
		"title_stroke"				=> "true",
		"hover_color" 				=> "",
		"hover_2_color" 			=> "",
		"border_hover_color"		=> "",
		"portfolio_item_featured_video_play"	=> "autoplay",
		"duotone"					=> "",
		"duotone_custom"			=> "",
		"duotone_gradient"			=> "",
		"duotone_gradient_direction"=> "to top right",
		"duotone_custom_2"			=> "",
		"duotone_custom_3"			=> "",
		"use_gradient_bg"			=> "",
		"bg_gradient_direction"		=> "to top right",
		"bg_color_2"				=> "",
		"bg_color_3"				=> "",
		"show_comments" 			=> "true", 
		"show_cats" 				=> "", 
		"show_tags" 				=> "", 
		"show_date" 				=> "true", 
		"show_author" 				=> "", 
		"post_meta_style"			=> "",
		"post_meta_bold"			=> "",
		"post_meta_small"			=> "small",
		"show_excerpt" 				=> "true", 
		"title_max_lines" 			=> "", 
		"inside_element" 			=> "false", 
		"wow_effect" 				=> "", 
		"wow_delay" 				=> "", 
		"custom_thumb_sizes" 		=> "", 
		"orderby" 					=> "date",
		"custom_column_widths" 		=> "",
		"custom_article_width_height"=>"",
		"custom_column_heights" 	=> "",
		"custom_title_colors"		=> "",
		"custom_category_colors"	=> "",
		"custom_title_hovers"		=> "",
		"default_margin"			=> "",
		"default_padding"			=> "",
		"portfolio_scuttered_caption_position" 			=> "outset-style",
		"portfolio_scuttered_h_align" 					=> "dense",
		"portfolio_scuttered_caption_h_align" 			=> "left",
		"portfolio_scuttered_caption_v_align" 			=> "bottom",
		"tilt"						=> "",
		"tilt_perspective"			=> "1000",
		"tilt_speed"				=> "300",
		"tilt_glare"				=> "",
		"tilt_glare_value"			=> "0.5",
		"tilt_floating"				=> "",
		"tilt_scale"				=> "",
		"tilt_disable_y"			=> "",
		"tilt_disable_x"			=> "",
	);
	extract(shortcode_atts($default_atts, $atts));
	
	$brankic_cat_id = 'brankic_category_' . brankic_string_to_class($atts);
	
	if ($tilt == "true") {
		wp_enqueue_script( 'tilt-jquery');
		$tilt_script = 'jQuery(document).ready(function($) {';
		
		if ($layout == "blog-style-1" || $layout == "blog-style-2" || $layout == "blog-style-2a" || $layout == "blog-style-3" || $layout == "blog-style-4" || $layout == "blog-style-5"
		 || $layout == "blog-style-6" || $layout == "blog-style-7" || $layout == "blog-style-8" || $layout == "blog-style-9" || $layout == "blog-style-10" || $layout == "portfolio-zig-zag"
		 || $layout == "portfolio-caption-hidden-1" || $layout == "portfolio-caption-hidden-2" || $layout == "portfolio-caption-hidden-3" || $layout == "portfolio-caption-hidden-4"
		 || $layout == "portfolio-caption-hidden-5" || $layout == "portfolio-caption-hidden-6" || $layout == "portfolio-caption-hidden-7" || $layout == "portfolio-caption-hidden-8" || $layout == "portfolio-scuttered"
		 || $layout == "blog-carousel-emphasize" || $layout == "flex" || $layout == "portfolio-carousel" || $layout == "portfolio-carousel-new" || $layout == "portfolio-carousel-overlay" || $layout == "portfolio-info-default" || $layout == "portfolio-tooltip"){
			 $tilt_script .= '$("#' . $brankic_cat_id . ' article").tilt({';
		}
		
		if ($layout == "portfolio-fixed-overlay" || $layout == "portfolio-fixed-split-default" || $layout == "portfolio-fixed-split-outset")  $tilt_script .= '$("#' . $brankic_cat_id . ' li h3").tilt({';
		
		
		if ($tilt_perspective) $tilt_script .= 'perspective: ' . $tilt_perspective . ',';
		if ($tilt_speed) $tilt_script .= 'speed: ' . $tilt_speed . ',';
		if ($tilt_glare) $tilt_script .= 'glare: true,maxGlare: ' . $tilt_glare_value . ',';
		if ($tilt_floating) $tilt_script .= 'reset: false,';
		if ($tilt_scale) $tilt_script .= 'scale: ' . $tilt_scale . ',';
		if ($tilt_disable_y) $tilt_script .= 'disableAxis: "X",';
		if ($tilt_disable_x) $tilt_script .= 'disableAxis: "Y",';
		
		$tilt_script .= '})';
		$tilt_script .= '})';
		wp_add_inline_script( 'tilt-jquery', $tilt_script );
	}
	
	if ($layout == "blog-style-4" || $layout == "masonry-info-default") {
		wp_enqueue_script( 'brankic-isotope', plugin_dir_url( __FILE__ ) . '../javascript/jquery.isotope.min.js', array('jquery'), '1.0.0', true );
	}

	if ($gap_advanced != "") $data_gap = 'data-gap="' . $gap_advanced . '"'; else $data_gap = "";
	if ($gap_advanced != "") $class_gap = 'gap'; else $class_gap = "";
	if ($grid_advanced_row_height != "") $data_grid_advanced_row_height = 'data-height="' . $grid_advanced_row_height . '"'; else $data_grid_advanced_row_height = "";
	
	if ($boxed == "true" || $boxed == "1") $boxed_class = "boxed"; else $boxed_class = "";
	if ($image_holder_left == "true" || $image_holder_left == "1") $image_holder_left = TRUE; else $image_holder_left = FALSE;
	if ($show_author == "true" || $show_author == "1") $show_author = TRUE; else $show_author = FALSE;	
	if ($show_comments == "true" || $show_comments == "1") $show_comments = TRUE; else $show_comments = FALSE;
	if ($show_cats == "true" || $show_cats == "1") $show_cats = TRUE; else $show_cats = FALSE;
	if ($show_tags == "true" || $show_tags == "1") $show_tags = TRUE; else $show_tags = FALSE;
	if ($show_date == "true" || $show_date == "1") $show_date = TRUE; else $show_date = FALSE;
	if ($show_excerpt == "true") $show_excerpt = TRUE; else $show_excerpt = FALSE;
	if ($img_radius == "true") $img_radius_size_data = "data-img_radius_size='" . $img_radius_size . "'"; else  $img_radius_size_data = "";
	if ($title_max_lines != "") $title_max_lines = "data-title_max_lines='" . $title_max_lines . "'";	
	if ($orderby == "rand") $orderby = "rand"; else $orderby = "date";
	if ($shadow_color == "") $shadow_color = "none";
	if ($shadow_color != "none") $shadow_color_class = "box-shadow"; else $shadow_color_class = "";
	if ($title_stroke == "true" || $title_stroke == "1") $title_stroke = TRUE; else $title_stroke = FALSE;
	if ($bg_img_fullwidth == "true" || $bg_img_fullwidth == "1") $bg_img_fullwidth = TRUE; else $bg_img_fullwidth = FALSE;
	if ($nav_fullwidth == "true" || $nav_fullwidth == "1") $nav_fullwidth = TRUE; else $nav_fullwidth = FALSE;
	if ($sticky_vertical == "true" || $sticky_vertical == "1") $sticky_vertical = TRUE; else $sticky_vertical = FALSE;	
	if ($split_screen == "true" || $split_screen == "1") $split_screen = TRUE; else $split_screen = FALSE;
	if ($show_next == "true" || $show_next == "1") $show_next = TRUE; else $show_next = FALSE;
	
	
	
	
	
	
	
	
	$data_columns_tablet = 'data-columns-tablet="' . $columns_tablet . '"';
	$data_columns_phone = 'data-columns-phone="' . $columns_phone . '"';
	
	
	$flex_height_r = $flex_height;
	if ($flex_height != "") $flex_height = 'data-flex_height="true" data-img-size="' . $flex_height . '"';

	$no_featured_image = brankic_of_get_option("no_featured_image", brankic_of_get_default("no_featured_image"));
	
	$featured_images_array = array();

	if ($custom_thumb_sizes != "") {
		$custom_thumb_sizes_array = explode(",", $custom_thumb_sizes);
		$custom_thumb_sizes_array = array_map('trim', $custom_thumb_sizes_array);
	}
	
	$custom_column_widths_array = array();
	
	if ($custom_column_widths != "") {
		$custom_column_widths_array = explode(",", $custom_column_widths);
		$custom_column_widths_array = array_map('trim', $custom_column_widths_array);
	}
	
	$custom_article_width_height_array = array();
	
	if ($custom_article_width_height != "") {
		$custom_article_width_height_array = explode(",", $custom_article_width_height);
		$custom_article_width_height_array = array_map('trim', $custom_article_width_height_array);
	}
	
	$custom_column_heights_array = array();
	
	if ($custom_column_heights != "") {
		$custom_column_heights_array = explode(",", $custom_column_heights);
		$custom_column_heights_array = array_map('trim', $custom_column_heights_array);
	}

	if ($custom_title_colors != "") {
		$custom_title_colors_array = explode(",", $custom_title_colors);
		$custom_title_colors_array = array_map('trim', $custom_title_colors_array);
	}
	if ($custom_category_colors != "") {
		$custom_category_colors_array = explode(",", $custom_category_colors);
		$custom_category_colors_array = array_map('trim', $custom_category_colors_array);
	}
	
	if ($custom_title_hovers != "") {
		$custom_title_hovers_array = explode(",", $custom_title_hovers);
		$custom_title_hovers_array = array_map('trim', $custom_title_hovers_array);
	}
	
	if ($duotone_custom != "") {
		$duotone = 'duotone single-color';
	}
	
	if ($only_next_duotone_custom != "") {
		$only_next_duotone = 'duotone single-color';
	}

	wp_register_script( 'dummy-handle-footer', '', [], '', true );
	wp_enqueue_script( 'dummy-handle-footer'  );

	$wow_class = "";
	if ($wow_effect != "") {
		wp_enqueue_style( 'myriadwp-animate', plugin_dir_url( __FILE__ ) . '../css/animate.min.css' );
		wp_enqueue_script( 'myriadwp-wow', plugin_dir_url( __FILE__ ) . '../javascript/wow.min.js', array('jquery'), '1.0.0', true );
		$inline_script = 'jQuery(document).ready(function($) {
			new WOW().init();
		});';
		wp_add_inline_script( 'wow', $inline_script );
		$wow_class = "wow " . $wow_effect ;
		$wow_delay = "data-wow-delay='$wow_delay'";
	}
	
	if ($custom_cursor == "true"){
		$custom_cursor_script = 'jQuery(document).ready(function($) {
			if ($(".cursor-pointer").length == 0) {
				$("body").append("<div class=\'cursor-pointer\'></div>");
			}	
			$("body").attr( "data-element-cursor-customize", "true" );	
			$(".cursor-pointer:not(.ring)").append("<span class=\'custom-' . $brankic_cat_id . '\'>' . $custom_cursor_text . '</span>");
			
			$("#' . $brankic_cat_id . '").addClass("cursor-' . $brankic_cat_id . '");
			
			var selectedView = [".cursor-' . $brankic_cat_id . ' article"];
			var selectedV = selectedView.join();
			$(selectedV).mouseenter(function() {
				$(".cursor-pointer").addClass("custom-' . $brankic_cat_id . '-active");
			}).mouseleave(function() {
				$(".cursor-pointer").removeClass("custom-' . $brankic_cat_id . '-active");
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
		
		wp_register_script( 'dummy-handle-footer', '', [], '', true );
		wp_enqueue_script( 'dummy-handle-footer'  );
		wp_add_inline_script( 'dummy-handle-footer', $custom_cursor_script );
		
		wp_register_style( 'dummy-handle', false );
		wp_enqueue_style( 'dummy-handle' );

	}
	
	$tags = get_the_tags();
	global $wp_query, $post;	
	if ( get_query_var('paged') ) 
	{
		$paged = get_query_var('paged');
	} 
	elseif ( get_query_var('page') ) 
	{
		$paged = get_query_var('page');
	} 
	else 
	{
		$paged = 1;
	}
		
	if ($limit == "") $limit = get_option( 'posts_per_page' );

	if ($cat_slug != ""){

		
		$var_1 = get_term_by('slug', $cat_slug, 'portfolio_category');
		if (empty($var_1)) $var_1 = get_term_by('slug', $cat_slug, 'category');

		if (empty($var_1)){
			
			echo "<div style='margin-top:200px; text-align:center;'>";
			_e('Please choose correct cat_slug. ' . $cat_slug . ' is not valid', 'myriadwp');
			echo "</div>";
			return false;
			} else { 
				$taxonomy = $var_1->taxonomy;

				$cat_id = $var_1->term_id;

				if ($taxonomy == "category") $post_type = "post";
				if ($taxonomy == "portfolio_category") $post_type = "portfolio_item";
					
				$args=array(
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'field' => 'term_id',
							'terms' => $cat_id
						)
					),
					'post_type' => $post_type,
					'orderby' => $orderby,
					'order' => 'DESC',
					'paged' => $paged,
					'posts_per_page' => $limit
				);
				
			}
	} else {
		$args=array(
			'orderby' => $orderby,
			'order' => 'DESC',
			'paged' => $paged,
			'posts_per_page' => $limit
		);		
	}
	
	if ($author_id != "") {
		
		$args=array(
				'author' => $author_id,
				'orderby' => $orderby,
				'order' => 'DESC',
				'paged' => $paged,
				'posts_per_page' => $limit
			);	
	}
	
	if ($tag_id != "") {
		
		$args=array(
				'tag_id' => $tag_id,
				'orderby' => $orderby,
				'order' => 'DESC',
				'paged' => $paged,
				'posts_per_page' => $limit
			);	
	}
	
	if ($search != "") {
		$args=array(
				's' => $search,
				'orderby' => $orderby,
				'order' => 'DESC',
				'paged' => $paged,
				'posts_per_page' => $limit
			);	
	}

		$i = -1;
		$sidebar =  brankic_global_or_local("archive_sidebar", "page_sidebar");
		$archive_show_title = brankic_global_or_local("archive_show_title");
		
		$temp = $wp_query;
		$temp_post = $post;
		
		$page_id_r = get_the_ID();
		
		$cat_query = new WP_Query( $args );
		
		$cat_query_copy = $cat_query; //used for duplicate query in some style-after.php (portfolio outset / split)
		
		ob_start();
		

		include(plugin_dir_path( __DIR__ ) . 'cat/' . $layout . '-before.php');

		if ( $cat_query->have_posts() && !(is_404()) ) : 
		
		// The Loop
		while ( $cat_query->have_posts() ) : $cat_query->the_post();
			$i++;
			include(plugin_dir_path( __DIR__ ) . 'cat/' . $layout . '.php');

		endwhile;
		
		
		else :
?>
							
								
													<?php 
													if (is_404()){ ?>
														<article <?php post_class($wow_class . " height-70"); ?> <?php echo wp_kses($wow_delay, $brankic_allowedposttags); ?> id="error-404">	

																<h1><?php esc_html_e('404', 'myriadwp');?></h1>
																<h2><?php esc_html_e('Page Not Found', 'myriadwp');?></h2>
																<p><?php esc_html_e('We can\'t seem to find the page you\'re looking for.', 'myriadwp'); ?></p>
																<a href="<?php echo esc_url( home_url( '/' ) )?>" class="brankic_button radius normal medium" data-border="true"><span><?php esc_html_e('Return To Home', 'myriadwp'); ?></span></a>

														</article>
														<?php
													} else { ?>
														<article <?php post_class($wow_class . " no-search-results"); ?> <?php echo wp_kses($wow_delay, $brankic_allowedposttags); ?>>	
										
																<h4><?php esc_html_e('Sorry, no results were found.', 'myriadwp'); ?></h4>
																<p><?php esc_html_e('Please try again with different keywords.', 'myriadwp'); ?></p>
																<?php get_search_form(); ?>

														</article>
														<?php
													}
													?>                          

											

		<?php
		endif;
		
		
		
		
		include(plugin_dir_path( __DIR__ ) . 'cat/' . $layout . '-after.php');

	
		$wp_query = $temp;  //reset back to original query
		$post = $temp_post;
		
		
		$html = ob_get_contents();
		
		ob_end_clean();
		
		return $html;
	}
	add_shortcode('brankic_category', 'Brankic_category');
}