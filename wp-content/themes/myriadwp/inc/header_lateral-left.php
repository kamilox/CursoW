<?php
	global $brankic_allowedposttags;
	$default_header_bg_image =  brankic_of_get_option("default_header_bg_image", brankic_of_get_default("default_header_bg_image")); 
	$logo =  brankic_of_get_option("logo-primary", brankic_of_get_default("logo-primary"));	
	$logo_retina = brankic_of_get_option("logo-primary-retina", brankic_of_get_default("logo-primary-retina"));
	if ($logo_retina != "") $logo_srcset = ' srcset="' . $logo . ' 1x, ' . $logo_retina . ' 2x"'; else $logo_srcset = "";
	
	$lateral_left_padding =  brankic_of_get_option("lateral_left_padding", brankic_of_get_default("lateral_left_padding"));
	if ($lateral_left_padding == "custom") {
		$lateral_left_top_padding =  brankic_of_get_option("lateral_left_top_padding", brankic_of_get_default("lateral_left_top_padding"));	
		$lateral_left_right_padding =  brankic_of_get_option("lateral_left_right_padding", brankic_of_get_default("lateral_left_right_padding"));
		$lateral_left_bottom_padding =  brankic_of_get_option("lateral_left_bottom_padding", brankic_of_get_default("lateral_left_bottom_padding"));
		$lateral_left_left_padding =  brankic_of_get_option("lateral_left_left_padding", brankic_of_get_default("lateral_left_left_padding"));
		
		$lateral_left_top_padding = str_replace("padding", "padding-top", $lateral_left_top_padding);
		$lateral_left_right_padding = str_replace("padding", "padding-right", $lateral_left_right_padding);
		$lateral_left_bottom_padding = str_replace("padding", "padding-bottom", $lateral_left_bottom_padding);
		$lateral_left_left_padding = str_replace("padding", "padding-left", $lateral_left_left_padding);
		
		$lateral_left_padding = "$lateral_left_top_padding $lateral_left_right_padding $lateral_left_bottom_padding $lateral_left_left_padding";
	}
	$lateral_left_menu_vert_align =  brankic_of_get_option("lateral_left_menu_vert_align", brankic_of_get_default("lateral_left_menu_vert_align"));
	
	
?>	
	<header class="lateral lateral_left">		
		
		<div class="row-bg-wrap">
			<div class="inner-wrap"> 
				<?php if ($default_header_bg_image != "") { ?><div class="row-bg background-image" style="background-image: url(<?php echo esc_url($default_header_bg_image); ?>);"></div><?php } ?>
				<div class="row-bg background-color"></div>
			</div> 
		</div>
		
<?php
$show_woocommerce =  brankic_of_get_option("show_woocommerce", brankic_of_get_default("show_woocommerce")); 
if ($show_woocommerce == "") $show_woocommerce = "no";
if ($show_woocommerce != "no" && class_exists('WooCommerce')) include(get_template_directory() . '/woocommerce/brankic_woo_cart.php'); 
?>
      
            <div class="lateral-wrapper <?php echo esc_attr($lateral_left_padding); ?> <?php echo esc_attr($lateral_left_menu_vert_align); ?>">
                            
                <div class="widget_holder">
				
					<div class="widget">
                            
						<div class="logo">
									
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							
								<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php echo wp_kses($logo_srcset, $brankic_allowedposttags); ?>/>   

							</a>
						
						</div><!-- LOGO -->
					
					</div>
				
				</div>
			

				
				<div class="widget_holder responsive-x">
                            
					<div class="widget">
						
						<a href="#outer-lateral" class="lateral-hidden-toggle-trigger"><span class="lateral-hidden-toggle-icon"></span></a>
						
<?php
$show_woocommerce =  brankic_of_get_option("show_woocommerce", brankic_of_get_default("show_woocommerce")); 
if ($show_woocommerce == "yes_trolley" || $show_woocommerce == "yes_bag") {

$bra_woo_cart_html = '<div class=" lateral_left_cart menu-item">

	<a href="#cart-toggle" class="cart-toggle-trigger">

		<span class="text-link">Cart</span>
		<span class="count-badge"></span>

	</a>

</div>';
	
	echo wp_kses($bra_woo_cart_html, $brankic_allowedposttags);
	
}
?>
							
					</div><!-- WIDGET -->
										
				</div><!-- WIDGET-HOLDER -->
				
				<div class="widget_holder outer-lateral">
					

				
					<div class="widget">	 
					 <?php 

					 
						echo wp_nav_menu( array( 'theme_location' => 'default' , 
											'container' => 'nav',
											'container_class' => 'lateral-menu slinky-menu',	
											'container_id' => 'menu',
											'menu_class' => '',
											'menu_id' => '',
											'fallback_cb' => 'brankic_simple_fallback',
											"echo" => false,
											'walker' => new Lateral_Left_Walker_Nav_Menu()
											) );
					?> 
					
					<?php


if ($show_woocommerce == "yes_trolley" || $show_woocommerce == "yes_bag") {
	
	$bra_woo_cart_html = '<div class=" lateral_left_cart menu-item">

	<a href="#cart-toggle" class="cart-toggle-trigger">

		<span class="text-link">Cart</span>
		<span class="count-badge"></span>

	</a>

</div>';
	
	echo wp_kses($bra_woo_cart_html, $brankic_allowedposttags);
	
}
?>					
	
					</div><!-- WIDGET -->
					
				</div>
				
			
				<div class="widget_holder bottom">
				
				<?php if (is_active_sidebar("menu_widget")) { dynamic_sidebar("menu_widget"); } ?>
				
				</div>
				                                                    
            </div><!-- LATERAL-WRAPPER -->
        
    </header><!-- HEADER LATERAL -->
                                          			
                                             