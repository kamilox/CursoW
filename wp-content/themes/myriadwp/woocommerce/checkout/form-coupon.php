<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>
<div class="col-12">
<?php

if ( empty( WC()->cart->applied_coupons ) ) {
	$info_message = apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'myriadwp' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'myriadwp' ) . '</a>' );
	wc_print_notice( $info_message, 'notice' );
}
?> 
                    <form class="checkout_coupon display_none" method="post">
                        
                    	<p class="form-row form-row-first">
                        	<input name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="" type="text">
                        </p>
                        
                        <p class="form-row form-row-last">
                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                        </p>
                        
                        <div class="clear"></div>
                        
                    </form><!-- END CHECKOUT_COUPON -->
                	
</div><!-- COL-12 -->                        
