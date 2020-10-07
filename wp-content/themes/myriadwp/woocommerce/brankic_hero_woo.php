<?php
global $woocommerce;
global $brankic_allowedposttags;
$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
if (!(isset($featured_image_array[0]))) $featured_image_array[0] = "";
$featured_image = $featured_image_array[0];	

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

$show_woo_shop_featured_image_title = brankic_of_get_option("show_woo_shop_featured_image_title", brankic_of_get_default("show_woo_shop_featured_image_title"));
$woo_shop_featured_image = brankic_of_get_option("woo_shop_featured_image", brankic_of_get_default("woo_shop_featured_image"));
$woo_shop_hero_holder_height = brankic_of_get_option("woo_shop_hero_holder_height", brankic_of_get_default("woo_shop_hero_holder_height"));
$woo_shop_hero_holder_title_position = brankic_of_get_option("woo_shop_hero_holder_title_position", brankic_of_get_default("woo_shop_hero_holder_title_position"));
$woo_shop_page_parallax = brankic_of_get_option("woo_shop_page_parallax", brankic_of_get_default("woo_shop_page_parallax"));
$woo_shop_hero_holder_scroll_button = brankic_of_get_option("woo_shop_hero_holder_scroll_button", brankic_of_get_default("woo_shop_hero_holder_scroll_button"));
$woo_shop_hero_holder_title_size = brankic_of_get_option("woo_shop_hero_holder_title_size", brankic_of_get_default("woo_shop_hero_holder_title_size"));
$woo_shop_hero_fullwidth = brankic_of_get_option("woo_shop_hero_fullwidth", brankic_of_get_default("woo_shop_hero_fullwidth"));
$woo_shop_change_header_colors = brankic_of_get_option("woo_shop_change_header_colors", brankic_of_get_default("woo_shop_change_header_colors"));
$woo_shop_change_header_colors_below = brankic_of_get_option("woo_shop_change_header_colors_below", brankic_of_get_default("woo_shop_change_header_colors_below"));


$show_woo_account_featured_image_title = brankic_of_get_option("show_woo_account_featured_image_title", brankic_of_get_default("show_woo_account_featured_image_title"));
$woo_account_my_account_image = brankic_of_get_option("woo_account_my_account_image", brankic_of_get_default("woo_account_my_account_image"));
$woo_account_cart_image = brankic_of_get_option("woo_account_cart_image", brankic_of_get_default("woo_account_cart_image"));
$woo_account_checkout_image = brankic_of_get_option("woo_account_checkout_image", brankic_of_get_default("woo_account_checkout_image"));
$woo_account_my_account_title = brankic_of_get_option("woo_account_my_account_title", brankic_of_get_default("woo_account_my_account_title"));
$woo_account_cart_title = brankic_of_get_option("woo_account_cart_title", brankic_of_get_default("woo_account_cart_title"));
$woo_account_checkout_title = brankic_of_get_option("woo_account_checkout_title", brankic_of_get_default("woo_account_checkout_title"));
$woo_account_hero_holder_height = brankic_of_get_option("woo_account_hero_holder_height", brankic_of_get_default("woo_account_hero_holder_height"));
$woo_account_hero_holder_title_position = brankic_of_get_option("woo_account_hero_holder_title_position", brankic_of_get_default("woo_account_hero_holder_title_position"));
$woo_account_page_parallax = brankic_of_get_option("woo_account_page_parallax", brankic_of_get_default("woo_account_page_parallax"));
$woo_account_hero_holder_scroll_button = brankic_of_get_option("woo_account_hero_holder_scroll_button", brankic_of_get_default("woo_account_hero_holder_scroll_button"));
$woo_account_hero_holder_title_size = brankic_of_get_option("woo_account_hero_holder_title_size", brankic_of_get_default("woo_account_hero_holder_title_size"));
$woo_account_hero_fullwidth = brankic_of_get_option("woo_account_hero_fullwidth", brankic_of_get_default("woo_account_hero_fullwidth"));
$woo_account_change_header_colors = brankic_of_get_option("woo_account_change_header_colors", brankic_of_get_default("woo_account_change_header_colors"));
$woo_account_change_header_colors_below = brankic_of_get_option("woo_account_change_header_colors_below", brankic_of_get_default("woo_account_change_header_colors_below"));


$show_woo_single_featured_image_title = brankic_of_get_option("show_woo_single_featured_image_title", brankic_of_get_default("show_woo_single_featured_image_title"));
$woo_single_hero_holder_height = brankic_of_get_option("woo_single_hero_holder_height", brankic_of_get_default("woo_single_hero_holder_height"));
$woo_single_hero_holder_title_position = brankic_of_get_option("woo_single_hero_holder_title_position", brankic_of_get_default("woo_single_hero_holder_title_position"));
$woo_single_page_parallax = brankic_of_get_option("woo_single_page_parallax", brankic_of_get_default("woo_single_page_parallax"));
$woo_single_hero_holder_scroll_button = brankic_of_get_option("woo_single_hero_holder_scroll_button", brankic_of_get_default("woo_single_hero_holder_scroll_button"));
$woo_single_hero_holder_title_size = brankic_of_get_option("woo_single_hero_holder_title_size", brankic_of_get_default("woo_single_hero_holder_title_size"));
$woo_single_hero_fullwidth = brankic_of_get_option("woo_single_hero_fullwidth", brankic_of_get_default("woo_single_hero_fullwidth"));


if (brankic_is_woo_shop()) {

	$show_woo_featured_image_title = $show_woo_shop_featured_image_title;
	
	$woo_hero_holder_height = $woo_shop_hero_holder_height;
	$woo_hero_holder_title_position = $woo_shop_hero_holder_title_position;
	$woo_page_parallax = $woo_shop_page_parallax;
	$woo_hero_holder_scroll_button = $woo_shop_hero_holder_scroll_button;
	$woo_hero_holder_title_size = $woo_shop_hero_holder_title_size;
	$woo_hero_fullwidth = $woo_shop_hero_fullwidth;
	$woo_change_header_colors = $woo_shop_change_header_colors;
	$woo_change_header_colors_below = $woo_shop_change_header_colors_below;
		
	if (is_shop()) $featured_image = $woo_shop_featured_image;
	
	$image = brankic_woocommerce_category_image();
	if ($image && (is_product_category()) ) $featured_image = $image;
	else $featured_image = $woo_shop_featured_image;
	
	$woo_custom_title = woocommerce_page_title( false );

}




if (brankic_is_woo_account()){
	
	$show_woo_featured_image_title = $show_woo_account_featured_image_title;
	
	if (is_cart()) {
		$featured_image = $woo_account_cart_image;
		$woo_custom_title = $woo_account_cart_title;
	}
	if (is_account_page()) {
		$featured_image = $woo_account_my_account_image;
		$woo_custom_title = $woo_account_my_account_title;
	}
	if (is_checkout()) {
		$featured_image = $woo_account_checkout_image;
		$woo_custom_title = $woo_account_checkout_title;
	}
	
	$woo_hero_holder_height = $woo_account_hero_holder_height;
	$woo_hero_holder_title_position = $woo_account_hero_holder_title_position;
	$woo_page_parallax = $woo_account_page_parallax;
	$woo_hero_holder_scroll_button = $woo_account_hero_holder_scroll_button;
	$woo_hero_holder_title_size = $woo_account_hero_holder_title_size;
	$woo_hero_fullwidth = $woo_account_hero_fullwidth;
	
	$woo_change_header_colors = $woo_account_change_header_colors;
	$woo_change_header_colors_below = $woo_account_change_header_colors_below;
	
}

if ($show_woo_featured_image_title == "yes"){
	
	

	
	

$woo_fullwidth_class = "";
if ($woo_hero_fullwidth == "yes") $woo_fullwidth_class = "fluid";

if ($woo_page_parallax === TRUE || $woo_page_parallax == "yes") $parallax = "parallax"; else $parallax = "";


if ($woo_change_header_colors == "yes") $woo_change_header_colors_class = "change_header_colors"; else $woo_change_header_colors_class = "";
if ($woo_change_header_colors_below == "yes") $woo_change_header_colors_below_class = "change_header_colors_below"; else $woo_change_header_colors_below_class = "";

$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
$default_header_fixed = brankic_of_get_option("default_header_fixed", brankic_of_get_default("default_header_fixed"));
$default_header_overflow = brankic_of_get_option("default_header_overflow", brankic_of_get_default("default_header_overflow"));

if ($featured_image && !(class_exists('Brankic_Shortcodes'))) $featured_class = "woo-featured-image-true"; else $featured_class = "";
?>
<div class="row-container brankic_hero <?php if ($header_style == "default" && $default_header_fixed == "yes" && $default_header_overflow == "yes") { ?>extra_padding <?php } echo esc_attr($woo_change_header_colors_class . " " . $featured_class); ?> <?php echo esc_attr($woo_change_header_colors_below_class); ?>">
                                   
                <div class="row <?php echo esc_attr($woo_fullwidth_class); ?>">
				
						<div class="row-bg-wrap">
                            <div class="inner-wrap"> 
                                <?php if ($featured_image != "") { ?><div class="row-bg background-image <?php echo esc_attr($parallax); ?>" style="background-image: url(<?php echo esc_attr($featured_image); ?>);"></div><?php } ?>
								<div class="row-bg background-color"></div>
                            </div>                    
                        </div>
						
						<div class="hero-holder <?php echo esc_attr($woo_shop_left_right_padding); ?> <?php echo esc_attr($woo_hero_holder_height); ?> <?php echo esc_attr($woo_hero_holder_title_position); ?> blog-post-title">
							<header class="post-title">
								<h1 class="entry-title <?php echo esc_attr($woo_hero_holder_title_size); ?>">
									<?php
									echo wp_kses($woo_custom_title, $brankic_allowedposttags);
									?>
								</h1>
								<?php if (get_the_archive_description() != "" && !(is_shop())){ ?>
								<p>
									<?php echo get_the_archive_description();?>
								</p>								
								<?php } ?>
							</header><!-- POST-TITLE -->
							
							<?php echo brankic_scroll_buttton($woo_hero_holder_scroll_button); ?>
						
						
						</div>
                                                                                      
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
<?php }
