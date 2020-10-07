<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $brankic_allowedposttags;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$woo_shop_shadow = brankic_of_get_option("woo_shop_shadow", brankic_of_get_default("woo_shop_shadow"));
if ($woo_shop_shadow == "yes") $shadow_class = "box-shadow"; else $shadow_class = "";	
?>
<li <?php post_class(); ?>>

	<div class="hover-holder <?php echo esc_attr($shadow_class); ?>">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10 
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

?>
		</a> 
		
		<div class="item-info-overlay"> 
<?php	

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5 REMOVED THIS it's closed above
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
?>
		</div><!--END ITEM-INFO-OVERLAY--> 
		
	</div><!--END HOVER-HOLDER-->
	  
                        
	<div class="product-caption">
<?php	
	
	
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	
?>
	</div><!--END PRODUCT-CAPTION-->


                                    
	
</li>
