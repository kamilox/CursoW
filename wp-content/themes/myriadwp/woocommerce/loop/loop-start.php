<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<?php 
global $brankic_allowedposttags;
$woo_shop_columns = brankic_of_get_option("woo_shop_columns", brankic_of_get_default("woo_shop_columns"));
$woo_shop_products_layout = brankic_of_get_option("woo_shop_products_layout", brankic_of_get_default("woo_shop_products_layout"));
$woo_shop_img_radius = brankic_of_get_option("woo_shop_img_radius", brankic_of_get_default("woo_shop_img_radius"));
if ($woo_shop_img_radius != "") $data_img_radius = 'data-border-radius="' . $woo_shop_img_radius . '"'; else $data_img_radius = "";

$woo_shop_sidebar = brankic_of_get_option("woo_shop_sidebar", brankic_of_get_default("woo_shop_sidebar"));

$count_widgets = brankic_default_count_widgets($woo_shop_sidebar);
if ($count_widgets == 0) $woo_shop_sidebar = "";

if ($woo_shop_sidebar != "none" && $woo_shop_sidebar != "" && is_archive()) {
	
	$column_class = "col-9"; 
?>

<div class="row-stick">

<?php
} else {
	$column_class = "col-12";
}
?>
<div class="<?php echo esc_attr($column_class); ?>">

	<ul class="products <?php echo esc_attr($woo_shop_columns); ?> <?php echo esc_attr($woo_shop_products_layout); ?>" <?php echo wp_kses($data_img_radius, $brankic_allowedposttags); ?>>
