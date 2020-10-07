<?php
global $woocommerce;
$woo_shop_url = get_permalink( wc_get_page_id( 'shop' ) );
$woo_cart_url = wc_get_cart_url();
$woo_checkout_url = $woocommerce->cart->get_checkout_url();

$aAccountPageId = get_option( 'woocommerce_myaccount_page_id' );
$woo_account_url = get_permalink( $aAccountPageId );
?>
<!--<li>
	<a href="<?php echo esc_url($woo_shop_url); ?>" class=""><?php esc_html_e('Shop', 'myriadwp')  ?></a>
</li>
		
<li>
	<a href="<?php echo esc_url($woo_account_url); ?>" class="">My Account</a></li>

<li>
	<a href="<?php echo esc_url($woo_checkout_url); ?>" class="">Checkout</a>
</li>
-->
<li>
	<a href="<?php echo esc_url($woo_cart_url); ?>" class="woo-cart-button"><i class="fa fa-shopping-cart"></i><span class="brankic_menu_items_count">(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span></a>
<?php
brankic_menu_cart_items();
?>
	

</li>

