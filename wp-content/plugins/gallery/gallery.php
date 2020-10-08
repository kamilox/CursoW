<?php
/**
 * Plugin Name:  Gallery Patients Photos
 * Description: Makes your custom images gallery, please create the gallery page and add the short code [gallery_index]
 * Version: 1.0.0
 * Author: Camilo Contreras
 * Text Domain: patients
 */

/**
 * patients main plugin file.
*/
function patients_settings_table() {
    global $wpdb;
    $patients_settings = 'patients_settings';
    $charset_collate = $wpdb->get_charset_collate();
    
    $settings = "CREATE TABLE IF NOT EXISTS $patients_settings (
        id int(9) NOT NULL AUTO_INCREMENT,
        logo_url varchar(125)  NULL,
        procedure_title_color varchar(64)  NULL,
        display_excerpt_in_gallery varchar(64)  NULL,
        primary_button_background_color varchar(64)  NULL,
        primary_button_border_color varchar(64)  NULL,
        primary_button_font_color varchar(64)  NULL,
        secondary_button_background_color varchar(64)  NULL,
        secondary_button_border_color varchar(64)  NULL,
        secondary_button_font_color varchar(64)  NULL,
        UNIQUE KEY id(id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($settings);
}
register_activation_hook(__FILE__, 'patients_settings_table');

function patients_gallery_table() {
    global $wpdb;
    $gallery_patients = 'patients_gallery';
    $gallery = "CREATE TABLE IF NOT EXISTS $gallery_patients (
        patients_gallery_id bigint(20) UNSIGNED NOT NULL,
        post_id int(11) NOT NULL,
        created_date datetime DEFAULT NULL,
        updated_date datetime DEFAULT NULL,
        gcase_details varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        gcase_notes varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        surgeon varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        hide_from_live tinyint(1) NOT NULL,
        feature_category tinyint(1) NOT NULL,
        gheight varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        gweight varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        age varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        implant_size_left varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        implant_size_right varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        cup_size_before varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        cup_size_after varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
        button_before_hidden varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        button_after_hidden varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        images text NOT NULL
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($gallery);
}
register_activation_hook(__FILE__, 'patients_gallery_table');

 // db Connection
require_once('inc/bd.php');

function styles(){
    wp_enqueue_style('parent-style',  plugins_url( '/inc/css/style.css', __FILE__ ) );
    wp_enqueue_media();
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script( 'jquery-ui-sortable');
    wp_enqueue_script('gallery',  plugins_url( '/inc/js/gallery.js', __FILE__ ), array('jquery', 'jquery-ui-core','jquery-ui-sortable'), 1.1);
    wp_enqueue_script('gallery',  plugins_url( '/inc/js/color-picker-iris/dist/iris.js', __FILE__ ), array('jquery', 'jquery-ui-core'), 1.1);
}
add_action('init', 'styles');

function patients(){
    $labels = array(
        'name' => _x('All Patients gallery', get_current_theme()),
        'singular_name' => _x('patients', get_current_theme()),
        'menu_name' => _x('patients', get_current_theme()),
        'name_admin_bar' =>  _x('Admin bar', get_current_theme()),
        'add_new' =>  _x('Add New Patient' , get_current_theme()),
        'add_new_item' =>  _x('Add new patient', get_current_theme()),
        'new_item' =>  _x('New Patient', get_current_theme()),
        'edit_item' =>  _x('Edit Patient', get_current_theme()),
        'view_item' =>  _x('View Patient', get_current_theme()),
        'all_items' =>  _x('All patients', get_current_theme()),
        'search_item' =>  _x('Search Patient', get_current_theme()),
        'parent_item_colon' =>  _x('Parent item colon', get_current_theme()),
        'not_found' =>  _x('Patient not found ', get_current_theme()),
        'not_found_in_trash' => _x('Patient not found in trash', get_current_theme()),
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Post images types', get_current_theme()),
        'public' => true,
        'publicly_qweryable' => true,
        'show_ui' => true,
        'show_in_menu' => 'photo_patients',
        'rewrite' => array('slug' => 'patients'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 6,
        'supports' => array('title', 'editor', 'author', 'thumbnail'),
        'can_export' => true,
        'taxonomies'    => array(
            'procedures'
        )
        
    );
    register_post_type('patients', $args);
}
add_action('init', 'patients');
//add custom links
function add_patients_submenu(){
    add_menu_page(
        'photo_patients',
        'Photo gallery',
        'manage_options',
        'photo_patients',
        'labels',
        'dashicons-admin-page', 
        6
    );

    add_submenu_page(
        'photo_patients',//parent slug
        '', // 
        'Add new patient', //
        'manage_options', // 
        'patients', //  
        'add_new_item' // 
    );

    add_submenu_page(
        'photo_patients',//parent slug
        '', // 
        'Procedures', //
        'manage_options', // 
        'procedures', //  
        'procedures' // 
    );
    
    add_submenu_page(
        'photo_patients',//parent slug
        '', // 
        'Default Procedures', //
        'manage_options', // 
        'default_procedures', //  
        'default_procedures' // 
    );

    add_submenu_page(
        'photo_patients',//parent slug
        '', // 
        'Settings', //
        'manage_options', // 
        'gallery_settings', //  
        'gallery_settings' // 
    );
}
add_action('admin_menu', 'add_patients_submenu');

// Template 

function page_template( $template )
{
     
    if(is_single(array('gallery'))){
        $template = plugin_dir_path(__FILE__) . '/content.php';
    }
    if(is_singular('patients')){
        $template = plugin_dir_path(__FILE__) . '/singular.php';   
    }
    
    if(get_queried_object()->taxonomy === 'procedures'){
        $template = plugin_dir_path(__FILE__) . '/content.php';   
    }
    return $template;
}
add_filter( 'template_include', 'page_template' );

//[gallery_index]
function gallery_index_func(){
    require_once('gallery-index.php');
}
add_shortcode( 'gallery_index', 'gallery_index_func' );

//url add new item
function add_new_item() {
    ?><script>window.location = "<?php echo admin_url('post-new.php?post_type=patients'); ?>";</script><?php 
}

//url add new item
function procedures() {
    ?>
    <script>window.location = "<?php echo admin_url('edit-tags.php?taxonomy=procedures&post_type=patients'); ?>";</script>
    <?php
}

function default_procedures() {
    require_once('default_procedures.php');
}
function gallery_settings() {
    require_once('settings.php');
}

//add taxonomies
function type_taxonomies(){
    register_taxonomy(
        'procedures',
        'patients',
        array(
            'hierarchical' => true,
            'label' => 'Procedures',
            'sort' => true,
            'args' => array('orderby' => 'term_order'),
            'rewrite' => array('slug' => 'procedures'),
            'supports'          => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' )
        )
    ); 
}
add_action('init', 'type_taxonomies');
// add submenu fields
 $current_url =  explode('/',$_SERVER['REQUEST_URI']);
 if(end($current_url) == 'edit-tags.php?taxonomy=procedures&post_type=patients'){
    require_once('image-taxonomy.php');
 }




//add fields
function add_custom_fields() {
    $page = 'patients';
    $context = 'normal';
    $priority = 'high';

    add_meta_box( 'case-details', 'Case Details', 'case_details',$page, $context, $priority );
    add_meta_box( 'surgeon', 'Surgeon', 'surgeon', $page, $context, $priority );
    add_meta_box( 'display_options', 'Display Options', 'display_options', $page, $context, $priority );
    add_meta_box( 'patient_information', 'Patient Information', 'patient_information', $page, $context, $priority );
    add_meta_box( 'patient_images', 'Patient pictures', 'patient_images', $page, $context, $priority );
}
add_action( 'add_meta_boxes', 'add_custom_fields' );

function case_details($post){
    //recover data from db to edit
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM patients_gallery WHERE post_id ='.$id.'');
    ?>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="case_details">Case Title*:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gcase_details" id="gcase_details" value="<?php echo $result[0]->gcase_details ?>" required />
            </div>
            <div class="custom-fields-title">
                <label for="case_details">Case Notes*:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gcase_notes" id="gcase_notes" value="<?php echo $result[0]->gcase_notes ?>" required />
            </div>
        </div>
    <?php
}

function surgeon($post){
    //recover data from db to edit
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM patients_gallery WHERE post_id ='.$id.'');
   
    ?>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="surgeon">Surgeon:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="surgeon" id="surgeon" value="<?php echo $result[0]->surgeon ?>" />
            </div>
        </div>    
        <p>If empty, surgeon name from gallery Settings will display at front.</p>
    <?php

}
function display_options($post){
    //recover data from db to edit
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM patients_gallery WHERE post_id ='.$id.'');
    
    ?>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="display_options">Hide from live site:</label>
            </div>
            <div class="custom-fields-input">
                <input type="checkbox" name="hide_from_live" id="hide_from_live" value="" />
                <input type="hidden" name="hide_from_live_hidden" id="hide_from_live_hidden" value="<?php echo $result[0]->hide_from_live ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="display_options">Feature within category:</label>
            </div>
            <div class="custom-fields-input">
                <input type="checkbox" name="feature_category" id="feature_category" value="" />
                <input type="hidden" name="feature_category_hidden" id="feature_category_hidden" value="<?php echo $result[0]->feature_category ?>" />
            </div>
        </div>
    <?php
}

function patient_information($post){
    //recover data from db to edit
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM patients_gallery WHERE post_id ='.$id.'');
    
    ?>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="patient_information">Height:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gheight" id="gheight" value="<?php echo $result[0]->gheight ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Weight:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gweight" id="gweight" value="<?php echo $result[0]->gweight ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Age:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="age" id="age" value="<?php echo $result[0]->age ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Implant Size Left:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="implant_size_left" id="implant_size_left" value="<?php echo $result[0]->implant_size_left ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Implant Size Right:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="implant_size_right" id="implant_size_right" value="<?php echo $result[0]->implant_size_right ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Cup Size Before:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="cup_size_before" id="cup_size_before" value="<?php echo $result[0]->cup_size_before ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Cup Size After:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="cup_size_after" id="cup_size_after" value="<?php echo $result[0]->cup_size_after ?>" />
            </div>
        </div>
        
    <?php
}

function patient_images($post){
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM patients_gallery WHERE post_id ='.$id.'');
    $images =  explode(',', $result[0]->images);

    if (!empty($images) ) {
        echo '<div class="select-files-button center">';
            echo '<input type="button" class="button uploadImage" value="Add Files" />';
        echo '</div>            ';
        echo '<ul class="gallery-container">';
            foreach ($images as $key => $image) {
                if (!empty($image)) {
                echo '<li class="gallery-item close-'.$key.'" id="'.$image.'" name="'.$image.'"  >';
                    echo '<div class="image-container">';
                        echo '<img src="'.$image.'" >';
                        echo '<input type="hidden" value="'.$image.'"  class="gallery-item-url">';
                    echo '</div>';
                    
                        echo '<input type="button" class="close-div" value="Remove Image" onclick="closeDiv('."'".$key."'".')"  id="close"/>';
                    
                echo '</li>';
                }
            }
        echo '</ul>';
        echo '<div id="resultado"></div>';
        echo'<input type="hidden" name="images" id="images" value ="'.$result[0]->images.'">';
    }else{    
            echo'<div class="select-files-button center">';
                echo'<input type="button" class="button uploadImage" value="Add Files" />';
            echo'</div>            ';
            echo'<ul class="gallery-container">';
                echo'<input type="hidden" name="images" id="images" value ="">';
            echo'</ul>';

    }
}

function your_custom_menu_item ( $items, $args ) {
    if (is_single() && $args->theme_location == 'primary') {
        $items .= '<li>Show whatever</li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );

//customize view all gallery
function custom_list_admin_patients($column){
    $columns = array(
        'cb' => '<input type="checkbox" / >',
        'title' => 'Title',
        'feature_thumb'=> 'Photo',
        'case_title' => 'Case Title',
        'case_notes' => 'Case Notes',
        'category' => 'Category',
        'author' => 'Author',
        'date' => 'Date'
    );
    return $columns;
}
add_filter('manage_edit-patients_columns', 'custom_list_admin_patients');

//send data to each field in view all patients

function send_data($columns, $post_id){
    global $post;
    global $wpdb;
    $result = $wpdb->get_results('SELECT * FROM patients_gallery WHERE post_id ='.$post_id.'');
    switch($columns){
        case 'feature_thumb':
            echo '<a href="'.get_edit_post_link().' " >';
            echo the_post_thumbnail('thumbnail');
            echo '</a>';
        break;
     
        case 'ID':
            echo $post_id;
        break;

        case 'case_notes':
            echo  $result[0]->gcase_notes ;
        break;
        case 'category':
            the_taxonomies($post_id);
        break;
        
    default;
    break;
    }

}
add_action('manage_patients_posts_custom_column', 'send_data', 10, 2);
// add procedures



?>