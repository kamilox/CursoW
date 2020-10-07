<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
global $brankic_allowedposttags;

$woo_product_gallery = brankic_of_get_option("woo_product_gallery", brankic_of_get_default("woo_product_gallery"));

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );

if ($woo_product_gallery == "" || $woo_product_gallery == "vertical") { ?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper">
		<?php
		if ( has_post_thumbnail() ) {
			$html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'myriadwp' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</figure>
</div>
<?php 
}

if ($woo_product_gallery == "grid") { 
	wp_enqueue_script( 'wpb_composer_front_js' );
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
	$pretty_rel_random = ' data-rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"';
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper">
		<?php
		if ( has_post_thumbnail() ) {
			$main_image_src_full = wp_get_attachment_image_src($post_thumbnail_id, "full");
			$main_image_src = wp_get_attachment_image_src($post_thumbnail_id, "brankic-512-512");
			$html  = '<a href="' . $main_image_src_full[0] . '" data-rel="prettyPhoto[]" class="prettyphoto"><img src="' . $main_image_src[0] . '" alt="' . get_the_title() . '"></a>';
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'myriadwp' ) );
			$html .= '</div>';
		}
		echo wp_kses($html, $brankic_allowedposttags);
		
		
		$attachment_ids = $product->get_gallery_image_ids();
		if (!empty($attachment_ids)){
			$gallery_html = '<div class="brankic_woo_grid_gallery">';
			foreach($attachment_ids as $thumbnail_id){
				$product_image_src_full = wp_get_attachment_image_src($thumbnail_id, "full");
				$product_image_src = wp_get_attachment_image_src($thumbnail_id, "brankic-512-512");
				$gallery_html .= '<a href="' . $product_image_src_full[0] . '" data-rel="prettyPhoto[]" class="prettyphoto"><img src="' . $product_image_src[0] . '" alt="' . get_the_title() . '"></a>';						
			}
			$gallery_html .= '</div>';
			echo wp_kses($gallery_html, $brankic_allowedposttags);
		}
		?>
	</figure>
</div>

<? } 
if ($woo_product_gallery == "sticky") { 
	wp_enqueue_script( 'wpb_composer_front_js' );
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
	$pretty_rel_random = ' data-rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"';
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper">
		<?php
		if ( has_post_thumbnail() ) {
			$main_image_src_full = wp_get_attachment_image_src($post_thumbnail_id, "full");
			$main_image_src = wp_get_attachment_image_src($post_thumbnail_id, "brankic-512-512");
			$html  = '<a href="' . $main_image_src_full[0] . '" data-rel="prettyPhoto[]" class="prettyphoto"><img src="' . $main_image_src[0] . '" alt="' . get_the_title() . '"></a>';
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'myriadwp' ) );
			$html .= '</div>';
		}
		echo wp_kses($html, $brankic_allowedposttags);
		
		
		$attachment_ids = $product->get_gallery_image_ids();
		if (!empty($attachment_ids)){
			$gallery_html = '<div class="brankic_woo_sticky_gallery">';
			foreach($attachment_ids as $thumbnail_id){
				$product_image_src_full = wp_get_attachment_image_src($thumbnail_id, "full");
				$product_image_src = wp_get_attachment_image_src($thumbnail_id, "brankic-original-512");
				$gallery_html .= '<a href="' . $product_image_src_full[0] . '" data-rel="prettyPhoto[]" class="prettyphoto"><img src="' . $product_image_src[0] . '" alt="' . get_the_title() . '"></a>';						
			}
			$gallery_html .= '</div>';
			echo wp_kses($gallery_html, $brankic_allowedposttags);
		}
		?>
	</figure>
</div>

<?php }