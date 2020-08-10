<?php
/**
 * Plugin Name: Sector45 Before & After Gallery
 * Plugin URI: https://www.sector45.com/
 * Text Domain: s45-before-after-gallery
 * Description: Sector45 Before & After photo gallery for showing patient results.
 * Author: Sector45
 * Version: 1.0.0
 * Author URI: https://www.sector45.com/
**/

if (!defined( 'S45PDP' ))
	define('S45PDP',    plugin_dir_path(__FILE__));
if (!defined( 'S45PU' ))
	define('S45PU',     plugins_url('', __FILE__));

require_once( 'include/gallery-functions.php' );
include('include/options.php'); 

//add_filter( 'template_include', 's45_adult_check', 99 );

add_action( 'template_redirect', 's45_print_single_patient' );

add_filter( 'template_include', 's45_custom_template_loader' );

add_action('pre_get_posts', 's45_patient_listing', 1);

add_filter( 'wp_insert_post_data' , 's45_auto_title_single_patient' , 10, 2 );

add_filter('post_type_link', 's45_post_type_link_filter', 1, 3);

/**
 * Process the custom metabox fields
 */
 
add_action( 'save_post', 's45_process_custom_meta_info' );

add_action('wp_ajax_s45_reset_patient_order', 's45_reset_patient_order');

add_action('wp_ajax_s45_reorder_patient_gallery', 's45_reorder_patient_gallery');

add_action('admin_menu', 's45PluginMenu', 200 );

// Add the ability to setup default procedures.

add_action( 'admin_menu', 's45_default_procedures_page', 199 );

add_action( 'admin_enqueue_scripts', 's45_admin_enqueue' );

add_action( 'wp_enqueue_scripts', 's45_front_styles' );

add_action("admin_head", "s45_upload_admin_head");
add_action('wp_ajax_plupload_action', "s45_plupload_action");

// Ajax script for saving custom field data

add_action('wp_ajax_s45_save_patient', 's45_save_patient');

// Ajax script for saving custom field data

add_action('wp_ajax_s45_delete_patient', 's45_delete_patient');

add_action('wp_ajax_item_sort', 's45_save_item_order');
add_action('wp_ajax_nopriv_item_sort', 's45_save_item_order');

// Rename file for single patient Upload
add_filter('wp_handle_upload_prefilter', 's45_uploaded_file_names', 1, 1);

add_filter('pre_get_document_title', 's45_set_meta_title', 1);
if (!has_filter( 'wpseo_title') )
	add_filter('wpseo_title', 's45_set_meta_title');

if (!has_filter( 'aioseop_title') )  
	add_filter('aioseop_title', 's45_set_meta_title', 1);

add_action( 'wp_head', 's45_set_meta_desc', 1);

add_filter( 'manage_patients_posts_columns', 'patients_posts_columns' );
add_action( 'manage_patients_posts_custom_column', 'patients_posts_custom_column', 10, 2);
add_filter( 'manage_edit-patients_sortable_columns', 'patients_sortable_columns');

add_action( 'admin_init', 's45_add_author_caps');
add_action( 'admin_init', 's45_add_editor_caps');
add_action( 'admin_init', 's45_add_administrator_caps');
add_action( 'admin_init', 's45_add_dynamic_hooks', 50 );

add_action('init', 's45_set_posts_per_page');

// Admin area init actions

add_action( 'admin_init', 'admin_init' );

// Activation Hooks

add_action( 'init', 's45_init_default_options' );
add_action( 'init', 's45_add_rewrite_rules' );  
add_action( 'init', 'register_patient_taxonomies' );
add_action( 'init', 'register_patient_cpt' );
add_action( 'init', 'register_new_image_sizes' );

register_activation_hook( __FILE__, 's45_rewrite_flush' );