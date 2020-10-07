<?php
function bra_woocommerce_support() {
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'bra_woocommerce_support' );

function brankic_enqueue_woo_styles_scripts() {
	wp_enqueue_style( 'brankic-woo-style', get_theme_file_uri('/woocommerce/brankic-woocommerce.css') );
	wp_enqueue_script( 'wcqi-js', get_theme_file_uri('/woocommerce/assets/js/wc-quantity-increment.min.js') );
	wp_enqueue_script( 'brankic-woocommerce-js', get_theme_file_uri('/woocommerce/brankic_woocommerce_js.js') );
    wp_localize_script( 'brankic-woocommerce-js', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_style( 'linea-ecommerce', get_theme_file_uri('/woocommerce/assets/fonts/font-linea-ecommerce.css') );
	
	//wp_deregister_script('wc-add-to-cart');
	wp_dequeue_script('wc-add-to-cart');

	wp_register_script('wc-add-to-cart', get_theme_file_uri('/woocommerce/assets/js/brankic_add-to-cart.js') , array( 'jquery' ), WC_VERSION, TRUE);

	wp_enqueue_script('wc-add-to-cart');
	
	
}




add_action( 'wp_enqueue_scripts', 'brankic_enqueue_woo_styles_scripts', 10 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'brankic_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'brankic_theme_wrapper_end', 10);

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

function brankic_theme_wrapper_start() {
	
	$header_style =  brankic_global_or_local("header_style");
	$archive_show_title = brankic_of_get_option("archive_show_title", brankic_of_get_default("archive_show_title"));


	$archive_content_bg_color =  brankic_of_get_option("archive_content_bg_color", brankic_of_get_default("archive_content_bg_color"));
	$archive_content_text_color =  brankic_of_get_option("archive_content_text_color", brankic_of_get_default("archive_content_text_color"));
	$content_color_background_style = 'style="background:' . $archive_content_bg_color . ';color:' . $archive_content_text_color . '"';
	
	$archive_index_content_bg_color =  brankic_of_get_option("archive_index_content_bg_color", brankic_of_get_default("archive_index_content_bg_color"));
	$archive_index_content_text_color =  brankic_of_get_option("archive_index_content_text_color", brankic_of_get_default("archive_index_content_text_color"));

	$overlay_bg_image_hover =  brankic_of_get_option("overlay_bg_image_hover", brankic_of_get_default("overlay_bg_image_hover"));

	$custom_font_class = brankic_custom_font();

	if (class_exists('Brankic_Shortcodes')) $brankic_portfolio_names_count = brankic_get_categories("portfolio_category", "names_count");
	

$page_content_width =  brankic_of_get_option("woo_content_width", brankic_of_get_default("woo_content_width"));
if ($page_content_width == "fullwidth") {
	$content_width = 1440;
} else {
	$content_width = intval(substr($page_content_width, 0, 4));
}

	if (brankic_is_woo_shop()) {
		$default_margin = brankic_of_get_option("woo_shop_margin", brankic_of_get_default("woo_shop_margin"));
		if ($default_margin == "custom") {
			$default_top_margin =  brankic_of_get_option("woo_shop_top_margin", brankic_of_get_default("woo_shop_top_margin"));	
			$default_bottom_margin =  brankic_of_get_option("woo_shop_bottom_margin", brankic_of_get_default("woo_shop_bottom_margin"));	
			$default_top_margin = str_replace("margin", "margin-top", $default_top_margin);
			$default_bottom_margin = str_replace("margin", "margin-bottom", $default_bottom_margin);	
			$default_margin = "$default_top_margin auto $default_bottom_margin auto";
		}
		
		
		$default_padding = brankic_of_get_option("woo_shop_padding", brankic_of_get_default("woo_shop_padding"));
		if ($default_padding == "custom"){
	
			$woo_top_padding =  brankic_of_get_option("woo_shop_top_padding", brankic_of_get_default("woo_shop_top_padding"));	
			$woo_right_padding =  brankic_of_get_option("woo_shop_right_padding", brankic_of_get_default("woo_shop_right_padding"));
			$woo_bottom_padding =  brankic_of_get_option("woo_shop_bottom_padding", brankic_of_get_default("woo_shop_bottom_padding"));
			$woo_left_padding =  brankic_of_get_option("woo_shop_left_padding", brankic_of_get_default("woo_shop_left_padding"));
			
			$default_top_padding = str_replace("padding", "padding-top", $woo_top_padding);
			$default_right_padding = str_replace("padding", "padding-right", $woo_right_padding);
			$default_bottom_padding = str_replace("padding", "padding-bottom", $woo_bottom_padding);
			$default_left_padding = str_replace("padding", "padding-left", $woo_left_padding);	
			$default_padding = "$default_top_padding $default_right_padding $default_bottom_padding $default_left_padding";
			
			$woo_shop_left_right_padding = "$default_right_padding $default_left_padding";
		} else {
			$woo_shop_left_right_padding = str_replace("padding-", "padding-left-", $default_padding) . " " . str_replace("padding-", "padding-right-", $default_padding);
	
		}	
		
	}
	
	if (brankic_is_woo_single()) {
		$default_margin = brankic_of_get_option("woo_single__margin", brankic_of_get_default("woo_single_margin"));
		if ($default_margin == "custom") {
			$default_top_margin =  brankic_of_get_option("woo_single_top_margin", brankic_of_get_default("woo_single_top_margin"));	
			$default_bottom_margin =  brankic_of_get_option("woo_single_bottom_margin", brankic_of_get_default("woo_single_bottom_margin"));	
			$default_top_margin = str_replace("margin", "margin-top", $default_top_margin);
			$default_bottom_margin = str_replace("margin", "margin-bottom", $default_bottom_margin);	
			$default_margin = "$default_top_margin auto $default_bottom_margin auto";
		}
		
		
		$default_padding = brankic_of_get_option("woo_single_padding", brankic_of_get_default("woo_single_padding"));
		if ($default_padding == "custom"){
	
			$woo_single_top_padding =  brankic_of_get_option("woo_single_top_padding", brankic_of_get_default("woo_single_top_padding"));	
			$woo_single_right_padding =  brankic_of_get_option("woo_single_right_padding", brankic_of_get_default("woo_single_right_padding"));
			$woo_single_bottom_padding =  brankic_of_get_option("woo_single_bottom_padding", brankic_of_get_default("woo_single_bottom_padding"));
			$woo_single_left_padding =  brankic_of_get_option("woo_single_left_padding", brankic_of_get_default("woo_single_left_padding"));
			
			$default_top_padding = str_replace("padding", "padding-top", $woo_single_top_padding);
			$default_right_padding = str_replace("padding", "padding-right", $woo_single_right_padding);
			$default_bottom_padding = str_replace("padding", "padding-bottom", $woo_single_bottom_padding);
			$default_left_padding = str_replace("padding", "padding-left", $woo_single_left_padding);	
			$default_padding = "$default_top_padding $default_right_padding $default_bottom_padding $default_left_padding";
		}
		
	}


	$woo_shop_sidebar = brankic_of_get_option("woo_shop_sidebar", brankic_of_get_default("woo_shop_sidebar"));

	if ($woo_shop_sidebar != "none" && $woo_shop_sidebar != "") $page_row_container_sidebar_class = "sidebar-on"; else $page_row_container_sidebar_class = "";

	if (function_exists("get_field")) {
		$custom_menu_font_color = get_field("page_custom_menu_font_color");
	} else $custom_menu_font_color = "";

	include(get_template_directory() . '/inc/header_' . $header_style . '.php');

	include(get_template_directory() . '/inc/' . $header_style . '_before.php');




}

function brankic_theme_wrapper_end() {
	$header_style =  brankic_global_or_local("header_style");
	include(get_template_directory() . '/inc/' . $header_style . '_after.php');	
}


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_single_product_summary', 'brankic_woocommerce_breadcrumb', 3, 0 );
function brankic_woocommerce_breadcrumb() {
	echo "<div class='one'>";
	woocommerce_breadcrumb();
	echo "</div>";
}


add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );





remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 7 );


remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	//global $woocommerce;
	
	ob_start();
	
	?>
	<span class="count-badge woo.php"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	
	$fragments['span.count-badge'] = ob_get_clean();
	
	return $fragments;
	
}

function brankic_woo_menu_cart_item($_product, $product_permalink, $cart_item, $cart_item_key) {
	global $brankic_allowedposttags;
?>	
				<li>
					<div class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo wp_kses($thumbnail, $brankic_allowedposttags);
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
							}
						?>
					</div>
					<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'myriadwp' ); ?>">
						<?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
							}

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );

							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'myriadwp' ) . '</p>';
							}
						?>
					</div>
					<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'myriadwp' ); ?>">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0',
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
						?>
					</div>

					<div class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'myriadwp' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</div>
				
				
				</li>
<?php				
	
}

function brankic_woo_menu_cart_bottom() {
	global $woocommerce;
?>
				<li class="brankic_woo_menu_cart_view_basket"><a href="<?php echo wc_get_cart_url(); ?>"><?php _e( 'View Basket', 'myriadwp' ); ?></a></li>
				<li class="brankic_woo_menu_cart_checkout"><a href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>"><?php _e( 'Checkout', 'myriadwp' ); ?></a></li>
<?php	
}

function brankic_menu_cart_items() {
?>
<ul class="brankic_woo_menu_cart display_none">
<?php
	
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );								
					brankic_woo_menu_cart_item($_product, $product_permalink, $cart_item, $cart_item_key);
				}	
			}
			brankic_woo_menu_cart_bottom();
?>
</ul>
<?php
}


function brankic_wc_add_cart_ajax() {
	$product_id = $_POST['product_id'];
	$variation_id = $_POST['variation_id'];
	$quantity = $_POST['quantity'];

	if ($variation_id) {
		WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
	} else {
		WC()->cart->add_to_cart( $product_id, $quantity);
	}

	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );								
			brankic_woo_menu_cart_item($_product, $product_permalink, $cart_item, $cart_item_key);
		}	
	}
	brankic_woo_menu_cart_bottom();


}

add_action('wp_ajax_brankic_wc_add_cart', 'brankic_wc_add_cart_ajax');
add_action('wp_ajax_nopriv_brankic_wc_add_cart', 'brankic_wc_add_cart_ajax');


function brankic_current_cart_items_ajax(){
	$cart_items = WC()->cart->get_cart_contents_count();
	echo esc_html($cart_items) . "|";
}
add_action('wp_ajax_brankic_current_cart_items', 'brankic_current_cart_items_ajax');
add_action('wp_ajax_nopriv_brankic_current_cart_items', 'brankic_current_cart_items_ajax');

//removing first and last class from shop page
add_filter( 'post_class', 'prefix_post_class', 21 );
function prefix_post_class( $classes ) {
    if ( 'product' == get_post_type() ) {
        $classes = array_diff( $classes, array( 'first', 'last' ) );
    }
    return $classes;
}

function brankic_wc_add_to_cart_message( $products, $show_qty = false, $return = false ) {
	$titles = array();
	$count  = 0;
	if ( ! is_array( $products ) ) {
		$products = array( $products => 1 );
		$show_qty = false;
	}
	if ( ! $show_qty ) {
		$products = array_fill_keys( array_keys( $products ), 1 );
	}
	foreach ( $products as $product_id => $qty ) {
		$titles[] = ( $qty > 1 ? absint( $qty ) . ' &times; ' : '' ) . sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'myriadwp' ), strip_tags( get_the_title( $product_id ) ) );
		$count += $qty;
	}
	$titles     = array_filter( $titles );
	$added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', $count, 'myriadwp' ), wc_format_list_of_items( $titles ) );
	// Output success messages
	if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
		$return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
		$message   = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), esc_html__( 'Continue shopping', 'myriadwp' ), esc_html( $added_text ) );
	} else {
		$message   = sprintf( '<a href="%s" class="button wc-forward nesto_novo">%s</a> %s', esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'View cart', 'myriadwp' ), esc_html( $added_text ) );
	}
	if ( has_filter( 'wc_add_to_cart_message' ) ) {
		wc_deprecated_function( 'The wc_add_to_cart_message filter', '3.0', 'wc_add_to_cart_message_html' );
		$message = apply_filters( 'wc_add_to_cart_message', $message, $product_id );
	}
	$message = apply_filters( 'wc_add_to_cart_message_html', $message, $products );
	if ( $return ) {
		return $message;
	} else {
		wc_add_notice( $message );
	}
}

// Remove product in the cart using ajax
function warp_ajax_product_remove()
{
    // Get mini cart
    ob_start();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    // Fragments and mini cart are returned
    $data = array(
        'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
            )
        ),
        'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
    );

    wp_send_json( $data );

    die();
}

add_action( 'wp_ajax_product_remove', 'warp_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'warp_ajax_product_remove' );

add_action( 'woocommerce_after_shop_loop', 'brankic_shop_sidebar', 15 );
 
function brankic_shop_sidebar() {
	$woo_shop_sidebar = brankic_of_get_option("woo_shop_sidebar", brankic_of_get_default("woo_shop_sidebar"));
		if ($woo_shop_sidebar != "none" && $woo_shop_sidebar != "" && is_archive()) {
		
		$column_class = "col-9"; 

		} else {
			$column_class = "col-12";
		}
	?>	
		<!--</div> brankic_shop_sidebar <?php echo esc_attr($column_class); ?>-->

	<?php if ($woo_shop_sidebar != "none" && $woo_shop_sidebar != "" && is_archive()) { ?>
		
							
							
							<div class="col-3 sticky-wrap">
							
								<div class="child sticky-element">
								
									<div class="sidebar">
									
									<?php dynamic_sidebar( $woo_shop_sidebar ); ?>
									
									</div><!-- SIDEBAR-->	
										
								</div><!-- CHILD STICKY-ELEMENT-->		
											
							</div><!-- COL-3 STICKY-WRAP-->
							
						</div><!-- ROW STICK -->
	<?php }

}

add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
return array(
'width' => 768,
'height' => 768,
'crop' => 0,
);
} );
add_filter( 'woocommerce_get_image_size_single', function( $size ) {
return array(
'width' => 768,
'height' => 768,
'crop' => 0,
);
} );

/* woocommerce_thumbnail
woocommerce_single
woocommerce_gallery_thumbnail */