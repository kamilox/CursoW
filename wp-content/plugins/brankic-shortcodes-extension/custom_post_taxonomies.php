<?php
add_filter('single_template', 'brankic_custom_post_portfolio');

function brankic_custom_post_portfolio($single) {

    global $wp_query, $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'portfolio_item' ) {
        if ( file_exists(plugin_dir_path( __DIR__ ) . 'brankic-shortcodes-extension/single-portfolio_item.php') ) {
            return plugin_dir_path( __DIR__ ) . 'brankic-shortcodes-extension/single-portfolio_item.php';
        }
    }

    return $single;

}


function brankic_register_my_cpts() {

	/**
	 * Post Type: Portfolio Items.
	 */

	$labels = array(
		"name" => esc_html__( 'Portfolio Items', 'myriadwp' ),
		"singular_name" => esc_html__( 'Portfolio Item', 'myriadwp' ),
		"menu_name" => esc_html__( 'Portfolio Items', 'myriadwp' ),
		"all_items" => esc_html__( 'All Portfolio Items', 'myriadwp' ),
		"add_new" => esc_html__( 'Add New Portfolio Item', 'myriadwp' ),
		"add_new_item" => esc_html__( 'Add New Portfolio Item', 'myriadwp' ),
		"edit_item" => esc_html__( 'Edit Portfolio Item', 'myriadwp' ),
		"new_item" => esc_html__( 'New Portfolio Item', 'myriadwp' ),
		"view_item" => esc_html__( 'View Portfolio Item', 'myriadwp' ),
		"view_items" => esc_html__( 'View Portfolio Items', 'myriadwp' ),
		"search_items" => esc_html__( 'Search Portfolio Items', 'myriadwp' ),
		"not_found" => esc_html__( 'No Portfolio Items found', 'myriadwp' ),
		"not_found_in_trash" => esc_html__( 'No Portfolio Items found in Trash', 'myriadwp' ),
		"parent_item_colon" => esc_html__( 'Parent Portfolio Item', 'myriadwp' ),
		"featured_image" => esc_html__( 'Featured Image for Portfolio Item', 'myriadwp' ),
		"set_featured_image" => esc_html__( 'Set featured image for Portfolio Item', 'myriadwp' ),
		"remove_featured_image" => esc_html__( 'Remove featured image for Portfolio Item', 'myriadwp' ),
		"use_featured_image" => esc_html__( 'Use Featured image for Portfolio Item', 'myriadwp' ),
		"archives" => esc_html__( 'Portfolio Items archives', 'myriadwp' ),
		"insert_into_item" => esc_html__( 'Insert into Portfolio Item', 'myriadwp' ),
		"uploaded_to_this_item" => esc_html__( 'Uploaded to this Portfolio Item', 'myriadwp' ),
		"filter_items_list" => esc_html__( 'Filter Portfolio Items', 'myriadwp' ),
		"items_list_navigation" => esc_html__( 'Portfolio Item list navigation', 'myriadwp' ),
		"items_list" => esc_html__( 'Portfolio Item list', 'myriadwp' ),
		"attributes" => esc_html__( 'Portfolio Item Attributes', 'myriadwp' ),
		"parent_item_colon" => esc_html__( 'Parent Portfolio Item', 'myriadwp' ),
	);

	$args = array(
		"label" => esc_html__( 'Portfolio Items', 'myriadwp' ),
		"labels" => $labels,
		"description" => "For portfolio items",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "portfolio_item", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "page-attributes" ),
		"taxonomies" => array( "portfolio_category" ),
	);

	/**
	 * Post Type: Testimonial Items.
	 */

	$labels_2 = array(
		"name" => esc_html__( 'Testimonial Items', 'myriadwp' ),
		"singular_name" => esc_html__( 'Testimonial Item', 'myriadwp' ),
		"menu_name" => esc_html__( 'Testimonial Items', 'myriadwp' ),
		"all_items" => esc_html__( 'All Testimonial Items', 'myriadwp' ),
		"add_new" => esc_html__( 'Add New Testimonial Item', 'myriadwp' ),
		"add_new_item" => esc_html__( 'Add New Testimonial Item', 'myriadwp' ),
		"edit_item" => esc_html__( 'Edit Testimonial Item', 'myriadwp' ),
		"new_item" => esc_html__( 'New Testimonial Item', 'myriadwp' ),
		"view_item" => esc_html__( 'View Testimonial Item', 'myriadwp' ),
		"view_items" => esc_html__( 'View Testimonial Items', 'myriadwp' ),
		"search_items" => esc_html__( 'Search Testimonial Items', 'myriadwp' ),
		"not_found" => esc_html__( 'No Testimonial Items found', 'myriadwp' ),
		"not_found_in_trash" => esc_html__( 'No Testimonial Items found in Trash', 'myriadwp' ),
		"parent_item_colon" => esc_html__( 'Parent Testimonial Item', 'myriadwp' ),
		"featured_image" => esc_html__( 'Featured Image for Testimonial Item', 'myriadwp' ),
		"set_featured_image" => esc_html__( 'Set featured image for Testimonial Item', 'myriadwp' ),
		"remove_featured_image" => esc_html__( 'Remove featured image for Testimonial Item', 'myriadwp' ),
		"use_featured_image" => esc_html__( 'Use Featured image for Testimonial Item', 'myriadwp' ),
		"archives" => esc_html__( 'Testimonial Items archives', 'myriadwp' ),
		"insert_into_item" => esc_html__( 'Insert into Testimonial Item', 'myriadwp' ),
		"uploaded_to_this_item" => esc_html__( 'Uploaded to this Testimonial Item', 'myriadwp' ),
		"filter_items_list" => esc_html__( 'Filter Testimonial Items', 'myriadwp' ),
		"items_list_navigation" => esc_html__( 'Testimonial Item list navigation', 'myriadwp' ),
		"items_list" => esc_html__( 'Testimonial Item list', 'myriadwp' ),
		"attributes" => esc_html__( 'Testimonial Item Attributes', 'myriadwp' ),
		"parent_item_colon" => esc_html__( 'Parent Testimonial Item', 'myriadwp' ),
	);

	$args_2 = array(
		"label" => esc_html__( 'Testimonial Items', 'myriadwp' ),
		"labels" => $labels_2,
		"description" => "For testimonial items",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "testimonial_item", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail", "custom-fields", "revisions" ),
		"taxonomies" => array( "testimonial_category" ),
	);

	register_post_type( "portfolio_item", $args );
	register_post_type( "testimonial_item", $args_2 );
}

add_action( 'init', 'brankic_register_my_cpts', 1 );


function brankic_register_my_cpts_portfolio_item() {

	/**
	 * Post Type: Portfolio Items.
	 */

	$labels = array(
		"name" => esc_html__( 'Portfolio Items', 'myriadwp' ),
		"singular_name" => esc_html__( 'Portfolio Item', 'myriadwp' ),
		"menu_name" => esc_html__( 'Portfolio Items', 'myriadwp' ),
		"all_items" => esc_html__( 'All Portfolio Items', 'myriadwp' ),
		"add_new" => esc_html__( 'Add New Portfolio Item', 'myriadwp' ),
		"add_new_item" => esc_html__( 'Add New Portfolio Item', 'myriadwp' ),
		"edit_item" => esc_html__( 'Edit Portfolio Item', 'myriadwp' ),
		"new_item" => esc_html__( 'New Portfolio Item', 'myriadwp' ),
		"view_item" => esc_html__( 'View Portfolio Item', 'myriadwp' ),
		"view_items" => esc_html__( 'View Portfolio Items', 'myriadwp' ),
		"search_items" => esc_html__( 'Search Portfolio Items', 'myriadwp' ),
		"not_found" => esc_html__( 'No Portfolio Items found', 'myriadwp' ),
		"not_found_in_trash" => esc_html__( 'No Portfolio Items found in Trash', 'myriadwp' ),
		"parent_item_colon" => esc_html__( 'Parent Portfolio Item', 'myriadwp' ),
		"featured_image" => esc_html__( 'Featured Image for Portfolio Item', 'myriadwp' ),
		"set_featured_image" => esc_html__( 'Set featured image for Portfolio Item', 'myriadwp' ),
		"remove_featured_image" => esc_html__( 'Remove featured image for Portfolio Item', 'myriadwp' ),
		"use_featured_image" => esc_html__( 'Use Featured image for Portfolio Item', 'myriadwp' ),
		"archives" => esc_html__( 'Portfolio Items archives', 'myriadwp' ),
		"insert_into_item" => esc_html__( 'Insert into Portfolio Item', 'myriadwp' ),
		"uploaded_to_this_item" => esc_html__( 'Uploaded to this Portfolio Item', 'myriadwp' ),
		"filter_items_list" => esc_html__( 'Filter Portfolio Items', 'myriadwp' ),
		"items_list_navigation" => esc_html__( 'Portfolio Item list navigation', 'myriadwp' ),
		"items_list" => esc_html__( 'Portfolio Item list', 'myriadwp' ),
		"attributes" => esc_html__( 'Portfolio Item Attributes', 'myriadwp' ),
		"parent_item_colon" => esc_html__( 'Parent Portfolio Item', 'myriadwp' ),
	);

	$args = array(
		"label" => esc_html__( 'Portfolio Items', 'myriadwp' ),
		"labels" => $labels,
		"description" => "For portfolio items",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "portfolio_item", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "page-attributes" ),
		"taxonomies" => array( "portfolio_category" ),
	);

	register_post_type( "portfolio_item", $args );
}

add_action( 'init', 'brankic_register_my_cpts_portfolio_item', 1 );


function brankic_register_my_cpts_testimonial_item() {

	/**
	 * Post Type: Testimonial Items.
	 */

	$labels = array(
		"name" => esc_html__( 'Testimonial Items', 'myriadwp' ),
		"singular_name" => esc_html__( 'Testimonial Item', 'myriadwp' ),
		"menu_name" => esc_html__( 'Testimonial Items', 'myriadwp' ),
		"all_items" => esc_html__( 'All Testimonial Items', 'myriadwp' ),
		"add_new" => esc_html__( 'Add New Testimonial Item', 'myriadwp' ),
		"add_new_item" => esc_html__( 'Add New Testimonial Item', 'myriadwp' ),
		"edit_item" => esc_html__( 'Edit Testimonial Item', 'myriadwp' ),
		"new_item" => esc_html__( 'New Testimonial Item', 'myriadwp' ),
		"view_item" => esc_html__( 'View Testimonial Item', 'myriadwp' ),
		"view_items" => esc_html__( 'View Testimonial Items', 'myriadwp' ),
		"search_items" => esc_html__( 'Search Testimonial Items', 'myriadwp' ),
		"not_found" => esc_html__( 'No Testimonial Items found', 'myriadwp' ),
		"not_found_in_trash" => esc_html__( 'No Testimonial Items found in Trash', 'myriadwp' ),
		"parent_item_colon" => esc_html__( 'Parent Testimonial Item', 'myriadwp' ),
		"featured_image" => esc_html__( 'Featured Image for Testimonial Item', 'myriadwp' ),
		"set_featured_image" => esc_html__( 'Set featured image for Testimonial Item', 'myriadwp' ),
		"remove_featured_image" => esc_html__( 'Remove featured image for Testimonial Item', 'myriadwp' ),
		"use_featured_image" => esc_html__( 'Use Featured image for Testimonial Item', 'myriadwp' ),
		"archives" => esc_html__( 'Testimonial Items archives', 'myriadwp' ),
		"insert_into_item" => esc_html__( 'Insert into Testimonial Item', 'myriadwp' ),
		"uploaded_to_this_item" => esc_html__( 'Uploaded to this Testimonial Item', 'myriadwp' ),
		"filter_items_list" => esc_html__( 'Filter Testimonial Items', 'myriadwp' ),
		"items_list_navigation" => esc_html__( 'Testimonial Item list navigation', 'myriadwp' ),
		"items_list" => esc_html__( 'Testimonial Item list', 'myriadwp' ),
		"attributes" => esc_html__( 'Testimonial Item Attributes', 'myriadwp' ),
		"parent_item_colon" => esc_html__( 'Parent Testimonial Item', 'myriadwp' ),
	);

	$args = array(
		"label" => esc_html__( 'Testimonial Items', 'myriadwp' ),
		"labels" => $labels,
		"description" => "For testimonial items",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "testimonial_item", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail", "custom-fields", "revisions"),
		"taxonomies" => array( "testimonial_category" ),
	);

	register_post_type( "testimonial_item", $args );
}

add_action( 'init', 'brankic_register_my_cpts_testimonial_item', 1 );



function brankic_register_my_taxes() {

	/**
	 * Taxonomy: Portfolio Categories.
	 */

	$labels = array(
		"name" => esc_html__( 'Portfolio Categories', 'myriadwp' ),
		"singular_name" => esc_html__( 'Portfolio Category', 'myriadwp' ),
	);

	$args = array(
		"label" => esc_html__( 'Portfolio Categories', 'myriadwp' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Portfolio Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'portfolio_category', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "portfolio_category", array( "portfolio_item" ), $args );
	
	/**
	 * Taxonomy: Testimonial Categories.
	 */

	$labels = array(
		"name" => esc_html__( 'Testimonial Categories', 'myriadwp' ),
		"singular_name" => esc_html__( 'Testimonial Category', 'myriadwp' ),
	);

	$args = array(
		"label" => esc_html__( 'Testimonial Categories', 'myriadwp' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Testimonial Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'testimonial_category', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "testimonial_category", array( "testimonial_item" ), $args );	
	
}

add_action( 'init', 'brankic_register_my_taxes', 1 );


function brankic_register_my_taxes_portfolio_category() {

	/**
	 * Taxonomy: Portfolio Categories.
	 */

	$labels = array(
		"name" => esc_html__( 'Portfolio Categories', 'myriadwp' ),
		"singular_name" => esc_html__( 'Portfolio Category', 'myriadwp' ),
	);

	$args = array(
		"label" => esc_html__( 'Portfolio Categories', 'myriadwp' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Portfolio Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'portfolio_category', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "portfolio_category", array( "portfolio_item" ), $args );
}

add_action( 'init', 'brankic_register_my_taxes_portfolio_category', 1 );


function brankic_register_my_taxes_testimonial_category() {

	/**
	 * Taxonomy: Testimonial Categories.
	 */

	$labels = array(
		"name" => esc_html__( 'Testimonial Categories', 'myriadwp' ),
		"singular_name" => esc_html__( 'Testimonial Category', 'myriadwp' ),
	);

	$args = array(
		"label" => esc_html__( 'Testimonial Categories', 'myriadwp' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Testimonial Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'testimonial_category', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "testimonial_category", array( "testimonial_item" ), $args );
}

add_action( 'init', 'brankic_register_my_taxes_testimonial_category', 1 );


//// CUSTOM POST TYPE PORTFOLIO ITEM

add_action( 'add_meta_boxes', 'brankic_portfolio_item_details_box' );

function brankic_portfolio_item_details_box() {
    add_meta_box( 
        'portfolio_item_details_box',
        esc_html__( 'Portfolio Item Details', 'pavillionwp' ),
        'brankic_portfolio_item_details_box_content',
        'portfolio_item',
        'side',
        'default'
    );
}

function brankic_portfolio_item_details_box_content( $post ) {
	
	$portfolio_item_details_1 = get_post_meta( get_the_ID(), 'portfolio_item_details_1', true );
	$portfolio_item_details_2 = get_post_meta( get_the_ID(), 'portfolio_item_details_2', true );
	$portfolio_item_details_3 = get_post_meta( get_the_ID(), 'portfolio_item_details_3', true );
	$portfolio_item_details_4 = get_post_meta( get_the_ID(), 'portfolio_item_details_4', true );
	
	$portfolio_item_details_url_1 = get_post_meta( get_the_ID(), 'portfolio_item_details_url_1', true );
	$portfolio_item_details_url_2 = get_post_meta( get_the_ID(), 'portfolio_item_details_url_2', true );
	$portfolio_item_details_url_3 = get_post_meta( get_the_ID(), 'portfolio_item_details_url_3', true );
	$portfolio_item_details_url_4 = get_post_meta( get_the_ID(), 'portfolio_item_details_url_4', true );
	
	
	$portfolio_item_mm_1 = get_post_meta( get_the_ID(), 'portfolio_item_mm_1', true );
	$portfolio_item_mm_2 = get_post_meta( get_the_ID(), 'portfolio_item_mm_2', true );
	$portfolio_item_mm_3 = get_post_meta( get_the_ID(), 'portfolio_item_mm_3', true );
	
	if ($portfolio_item_mm_1 == "") $portfolio_item_mm_1 == "featured_image";
	
	$portfolio_item_detail_1_caption = brankic_of_get_option("portfolio_item_detail_1_caption", brankic_of_get_default("portfolio_item_detail_1_caption"));
	$portfolio_item_detail_2_caption = brankic_of_get_option("portfolio_item_detail_2_caption", brankic_of_get_default("portfolio_item_detail_2_caption"));
	$portfolio_item_detail_3_caption = brankic_of_get_option("portfolio_item_detail_3_caption", brankic_of_get_default("portfolio_item_detail_3_caption"));
	$portfolio_item_detail_4_caption = brankic_of_get_option("portfolio_item_detail_4_caption", brankic_of_get_default("portfolio_item_detail_4_caption"));
	
	$i = 0;
  wp_nonce_field( plugin_basename( __FILE__ ), 'portfolio_item_details_box_content_nonce' );
  
  
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_details_1">' . $portfolio_item_detail_1_caption . '</label></p>';
  echo '<textarea id="portfolio_item_details_1" name="portfolio_item_details_1" class="width_96">' . $portfolio_item_details_1 . '</textarea>';
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_details_url_1">URL</label></p>';
  echo '<input type="text" id="portfolio_item_details_url_1" name="portfolio_item_details_url_1" style="width:96%" value = "' . $portfolio_item_details_url_1 . '" />';
  
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_details_2">' . $portfolio_item_detail_2_caption . '</label></p>';
  echo '<textarea id="portfolio_item_details_2" name="portfolio_item_details_2" class="width_96">' . $portfolio_item_details_2 . '</textarea>';
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_details_url_2">URL</label></p>';
  echo '<input type="text" id="portfolio_item_details_url_2" name="portfolio_item_details_url_2" class="width_96" value = "' . $portfolio_item_details_url_2 . '" />';
  
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_details_3">' . $portfolio_item_detail_3_caption . '</label></p>';
  echo '<textarea id="portfolio_item_details_3" name="portfolio_item_details_3" class="width_96">' . $portfolio_item_details_3 . '</textarea>';
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_details_url_3">URL</label></p>';
  echo '<input type="text" id="portfolio_item_details_url_3" name="portfolio_item_details_url_3" class="width_96" value = "' . $portfolio_item_details_url_3 . '" />';
  
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_details_4">' . $portfolio_item_detail_4_caption . '</label></p>';
  echo '<textarea id="portfolio_item_details_4" name="portfolio_item_details_4" class="width_96">' . $portfolio_item_details_4 . '</textarea>';
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_details_url_4">URL</label></p>';
  echo '<input type="text" id="portfolio_item_details_url_4" name="portfolio_item_details_url_4" class="width_96" value = "' . $portfolio_item_details_url_4 . '" />';

/*   $mm_array_values = array("" => esc_html__("Nothing", 'pavillionwp'), "post_featured_audio" => esc_html__("Hosted audio", 'pavillionwp'), "post_featured_video" => esc_html__("Hosted Video", 'pavillionwp'), "post_video_url" => esc_html__("Video URL", 'pavillionwp'), "brankic_featured_images_1_1_1" => esc_html__("Featured Images  Inline 1 1 1", 'pavillionwp'), "brankic_extra_images_inline_1_2_1" => esc_html__("Extra images Inline 1 2 1", 'pavillionwp'), "brankic_extra_images_inline_1_1_1_gap" => esc_html__("Extra images Inline Gap 1 1 1 ", 'pavillionwp'), "brankic_extra_images_inline_1_2_1_gap" => esc_html__("Extra images Inline Gap 1 2 1", 'pavillionwp'), "brankic_featured_images_slider" => esc_html__("Featured Images Slider", 'pavillionwp'), "featured_image" => esc_html__("Featured image", 'pavillionwp'));
  
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_mm_1">' . esc_html__("Multimedia Box 1", 'pavillionwp') . '</label></p>';
  echo '<select id="portfolio_item_mm_1" name="portfolio_item_mm_1" class="width_96">';
  foreach ($mm_array_values as $value => $text){
	if ($value == $portfolio_item_mm_1) $selected = "selected"; else $selected = ""; 
	echo '<option value="' . $value . '" ' . $selected . '>' . $text . '</option>';
  }
  echo '</select>';
  
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_mm_2">' . esc_html__("Multimedia Box 2", 'pavillionwp') . '</label></p>';
  echo '<select id="portfolio_item_mm_2" name="portfolio_item_mm_2" class="width_96">';
  foreach ($mm_array_values as $value => $text){
	if ($value == $portfolio_item_mm_2) $selected = "selected"; else $selected = ""; 
	echo '<option value="' . $value . '" ' . $selected . '>' . $text . '</option>';
  }
  echo '</select>';
  
  echo '<p class="post-attributes-label-wrapper"><label for="portfolio_item_mm_3">' . esc_html__("Multimedia Box 3", 'pavillionwp') . '</label></p>';
  echo '<select id="portfolio_item_mm_3" name="portfolio_item_mm_3" class="width_96">';
  foreach ($mm_array_values as $value => $text){
	if ($value == $portfolio_item_mm_3) $selected = "selected"; else $selected = ""; 
	echo '<option value="' . $value . '" ' . $selected . '>' . $text . '</option>';
  }
  echo '</select>'; */
 
}

add_action( 'save_post', 'brankic_portfolio_item_details_box_save' );
function brankic_portfolio_item_details_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

	if ( ! isset( $_POST['portfolio_item_details_box_content_nonce']) ) { return; }


  if ( !wp_verify_nonce( $_POST['portfolio_item_details_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  
  $portfolio_item_details_1 = esc_attr( $_POST['portfolio_item_details_1'] );
  update_post_meta( $post_id, 'portfolio_item_details_1', $portfolio_item_details_1 );
  
  $portfolio_item_details_2 = esc_attr( $_POST['portfolio_item_details_2'] );
  update_post_meta( $post_id, 'portfolio_item_details_2', $portfolio_item_details_2 );
  
  $portfolio_item_details_3 = esc_attr( $_POST['portfolio_item_details_3'] );
  update_post_meta( $post_id, 'portfolio_item_details_3', $portfolio_item_details_3 );
  
  $portfolio_item_details_4 = esc_attr( $_POST['portfolio_item_details_4'] );
  update_post_meta( $post_id, 'portfolio_item_details_4', $portfolio_item_details_4 );
  
  $portfolio_item_details_url_1 = esc_url( $_POST['portfolio_item_details_url_1'] );
  update_post_meta( $post_id, 'portfolio_item_details_url_1', $portfolio_item_details_url_1 );
  
  $portfolio_item_details_url_2 = esc_url( $_POST['portfolio_item_details_url_2'] );
  update_post_meta( $post_id, 'portfolio_item_details_url_2', $portfolio_item_details_url_2 );
  
  $portfolio_item_details_url_3 = esc_url( $_POST['portfolio_item_details_url_3'] );
  update_post_meta( $post_id, 'portfolio_item_details_url_3', $portfolio_item_details_url_3 );
  
  $portfolio_item_details_url_4 = esc_url( $_POST['portfolio_item_details_url_4'] );
  update_post_meta( $post_id, 'portfolio_item_details_url_4', $portfolio_item_details_url_4 );
  
  $portfolio_item_mm_1 = $_POST['portfolio_item_mm_1'];
  update_post_meta( $post_id, 'portfolio_item_mm_1', $portfolio_item_mm_1 );
}



?>