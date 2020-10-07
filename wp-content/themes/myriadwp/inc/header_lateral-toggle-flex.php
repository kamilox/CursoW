<?php 
global $brankic_allowedposttags;
$logo =  brankic_of_get_option("logo-primary", brankic_of_get_default("logo-primary")); 
$logo_retina = brankic_of_get_option("logo-primary-retina", brankic_of_get_default("logo-primary-retina"));
if ($logo_retina != "") $logo_srcset = ' srcset="' . $logo . ' 1x, ' . $logo_retina . ' 2x"'; else $logo_srcset = "";

$default_header_bg_image =  brankic_of_get_option("default_header_bg_image", brankic_of_get_default("default_header_bg_image")); 

$lateral_toggle_flex_button_vert_align =  brankic_of_get_option("lateral_toggle_flex_button_vert_align", brankic_of_get_default("lateral_toggle_flex_button_vert_align")); 

$lateral_toggle_flex_padding =  brankic_of_get_option("lateral_toggle_flex_padding", brankic_of_get_default("lateral_toggle_flex_padding"));

$overlay_menu_text_stroke = brankic_of_get_option("overlay_menu_text_stroke", brankic_of_get_default("overlay_menu_text_stroke"));
if ($overlay_menu_text_stroke) $overlay_menu_text_stroke_class = "overlay_stroke"; else $overlay_menu_text_stroke_class = "";

if ($lateral_toggle_flex_padding == "custom") {
	$lateral_toggle_flex_top_padding =  brankic_of_get_option("lateral_toggle_flex_top_padding", brankic_of_get_default("lateral_toggle_flex_top_padding"));	
	$lateral_toggle_flex_right_padding =  brankic_of_get_option("lateral_toggle_flex_right_padding", brankic_of_get_default("lateral_toggle_flex_right_padding"));
	$lateral_toggle_flex_bottom_padding =  brankic_of_get_option("lateral_toggle_flex_bottom_padding", brankic_of_get_default("lateral_toggle_flex_bottom_padding"));
	$lateral_toggle_flex_left_padding =  brankic_of_get_option("lateral_toggle_flex_left_padding", brankic_of_get_default("lateral_toggle_flex_left_padding"));
	
	$lateral_toggle_flex_top_padding = str_replace("padding", "padding-top", $lateral_toggle_flex_top_padding);
	$lateral_toggle_flex_right_padding = str_replace("padding", "padding-right", $lateral_toggle_flex_right_padding);
	$lateral_toggle_flex_bottom_padding = str_replace("padding", "padding-bottom", $lateral_toggle_flex_bottom_padding);
	$lateral_toggle_flex_left_padding = str_replace("padding", "padding-left", $lateral_toggle_flex_left_padding);
	
	$lateral_toggle_flex_padding = "$lateral_toggle_flex_top_padding $lateral_toggle_flex_right_padding $lateral_toggle_flex_bottom_padding $lateral_toggle_flex_left_padding";
}

?>
    <header id="lateral-toggle-flex" class="lateral-toggle">
	

		<div class="row-bg-wrap">
			<div class="inner-wrap"> 
				<?php if ($default_header_bg_image != "") { ?><div class="row-bg background-image" style="background-image: url(<?php echo esc_url($default_header_bg_image); ?>);"></div><?php } ?>
				<div class="row-bg background-color" ></div>
			</div> 
		</div>
		
<?php
$show_woocommerce =  brankic_of_get_option("show_woocommerce", brankic_of_get_default("show_woocommerce")); 
if ($show_woocommerce == "") $show_woocommerce = "no";
if ($show_woocommerce != "no" && class_exists('WooCommerce')) include(get_template_directory() . '/woocommerce/brankic_woo_cart.php'); 
?>
		
    
        <div class="lateral-toggle-wrapper <?php echo esc_attr($lateral_toggle_flex_padding); ?>">
		
			<div class="widget_holder">
			
				<div class="widget logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php echo wp_kses($logo_srcset, $brankic_allowedposttags); ?>/></a>
				</div><!-- WIDGET LOGO -->
				
			</div>
				
			<div class="widget_holder <?php echo esc_attr($lateral_toggle_flex_button_vert_align); ?>">
			
				<div class="widget">
					<a href="#lateral-toggle" class="lateral-toggle-trigger"> 
						<span class="lateral-toggle-icon"></span>
					</a>
					
					
<?php
$show_woocommerce =  brankic_of_get_option("show_woocommerce", brankic_of_get_default("show_woocommerce")); 

if ($show_woocommerce == "") $show_woocommerce = "no";

if ($show_woocommerce != "no") {
	
	$bra_woo_cart_html = '<div class="widget hidden_toggle_cart">

	<a href="#cart-toggle" class="cart-toggle-trigger">

		<span class="text-link">Cart</span>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" width="35" height="25" viewBox="0 0 80 70"><path d="M51,48.6l-2-29.7l0,0c-0.1-0.8-0.7-1.4-1.5-1.4h-7V14c0-6.2-4.7-11.2-10.5-11.2c-5.8,0-10.5,5-10.5,11.2v3.5h-7  c-0.8,0-1.4,0.6-1.5,1.4l0,0L9,48.6c0,0,0,0.1,0,0.1c0,4.8,3.7,8.5,8.5,8.5h25c4.8,0,8.5-3.7,8.5-8.5C51,48.7,51,48.6,51,48.6z   M22.5,14c0-4.5,3.4-8.2,7.5-8.2c4.2,0,7.5,3.6,7.5,8.2v3.5h-15V14z M42.5,54.2h-25c-3.1,0-5.5-2.4-5.5-5.5l1.9-28.2h32.2L48,48.7  C48,51.8,45.6,54.2,42.5,54.2z"></path></svg>
		<span class="count-badge"></span>

	</a>

</div>';
	
	//echo wp_kses($bra_woo_cart_html, $brankic_allowedposttags);
	
}
?>

<?php if ($show_woocommerce != "no") { ?>
					
					<a href="#cart-toggle" class="cart-toggle-trigger"> 
						<span class="text-link">Cart</span>
						<span class="count-badge"></span>
					</a>

<?php } ?>
					
				</div><!-- WIDGET -->		
				
			</div>
		
		
			<div class="widget_holder bottom">
			
				<div class="widget footer">
					<div class="rotate">
						<?php if (is_active_sidebar("lateral_rotate_text")) { dynamic_sidebar("lateral_rotate_text"); } ?>
					</div>	
				</div><!-- WIDGET FOOTER -->
				
			</div>
        
		</div>
		
    </header><!-- HEADER LATERAL-TOGGLE -->
    
 
	<div id="lateral-toggle" class="lateral-toggle-content flex <?php echo esc_attr($overlay_menu_text_stroke_class); ?>">
    
		<div class="lateral-toggle-wrapper">
    
    		
			
				<div class="widget">
				
					<?php 
							wp_nav_menu( array( 'theme_location' => 'default' , 
												'container' => 'nav',
												'container_class' => 'menu-flex',	
												'menu_class' => '',
												'menu_id' => '',
												'fallback_cb' => 'brankic_simple_fallback',
												'walker' => new Lateral_Toggle_Flex_Walker_Nav_Menu()
												) );
					?> 
					
				</div><!-- WIDGET -->
			
			          
            
		</div> <!-- LATERAL-TOGGLE-WRAPPER -->
        
	</div> <!-- LATERAL-TOGGLE-CONTENT -->
                                          			
                                             