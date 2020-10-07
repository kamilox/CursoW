<?php
global $brankic_allowedposttags;

$default_header_bg_image =  brankic_of_get_option("default_header_bg_image", brankic_of_get_default("default_header_bg_image")); 
$menu_wow_delay =  brankic_of_get_option("menu_wow_delay", brankic_of_get_default("menu_wow_delay")); 
$menu_wow_effect =  brankic_of_get_option("menu_wow_effect", brankic_of_get_default("menu_wow_effect"));

$overlay_menu_bg_image =  brankic_of_get_option("overlay_menu_bg_image", brankic_of_get_default("overlay_menu_bg_image")); 


$logo =  brankic_of_get_option("logo-primary", brankic_of_get_default("logo-primary")); 
$logo_retina = brankic_of_get_option("logo-primary-retina", brankic_of_get_default("logo-primary-retina"));
if ($logo_retina != "") $logo_srcset = ' srcset="' . $logo . ' 1x, ' . $logo_retina . ' 2x"'; else $logo_srcset = "";


$lateral_toggle_left_button_vert_align =  brankic_of_get_option("lateral_toggle_left_button_vert_align", brankic_of_get_default("lateral_toggle_left_button_vert_align")); 

$overlay_menu_text_stroke = brankic_of_get_option("overlay_menu_text_stroke", brankic_of_get_default("overlay_menu_text_stroke"));
if ($overlay_menu_text_stroke) $overlay_menu_text_stroke_class = "overlay_stroke"; else $overlay_menu_text_stroke_class = "";

$lateral_toggle_left_padding =  brankic_of_get_option("lateral_toggle_left_padding", brankic_of_get_default("lateral_toggle_left_padding"));
if ($lateral_toggle_left_padding == "custom") {
	$lateral_toggle_left_top_padding =  brankic_of_get_option("lateral_toggle_left_top_padding", brankic_of_get_default("lateral_toggle_left_top_padding"));	
	$lateral_toggle_left_right_padding =  brankic_of_get_option("lateral_toggle_left_right_padding", brankic_of_get_default("lateral_toggle_left_right_padding"));
	$lateral_toggle_left_bottom_padding =  brankic_of_get_option("lateral_toggle_left_bottom_padding", brankic_of_get_default("lateral_toggle_left_bottom_padding"));
	$lateral_toggle_left_left_padding =  brankic_of_get_option("lateral_toggle_left_left_padding", brankic_of_get_default("lateral_toggle_left_left_padding"));
	
	$lateral_toggle_left_top_padding = str_replace("padding", "padding-top", $lateral_toggle_left_top_padding);
	$lateral_toggle_left_right_padding = str_replace("padding", "padding-right", $lateral_toggle_left_right_padding);
	$lateral_toggle_left_bottom_padding = str_replace("padding", "padding-bottom", $lateral_toggle_left_bottom_padding);
	$lateral_toggle_left_left_padding = str_replace("padding", "padding-left", $lateral_toggle_left_left_padding);
	
	$lateral_toggle_left_padding = "$lateral_toggle_left_top_padding $lateral_toggle_left_right_padding $lateral_toggle_left_bottom_padding $lateral_toggle_left_left_padding";
}

?>	
	<header id="lateral-toggle-left" class="lateral-toggle">
        
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

		<div class="lateral-toggle-wrapper <?php echo esc_attr($lateral_toggle_left_padding); ?>">
			 
			<div class="widget_holder">
			
				<div class="widget logo">
							
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php echo wp_kses($logo_srcset, $brankic_allowedposttags); ?>/>
					</a>	
											   
				</div><!-- WIDGET -->	

			</div>
			
<?php
$show_woocommerce =  brankic_of_get_option("show_woocommerce", brankic_of_get_default("show_woocommerce")); 


?>
			
			<div class="widget_holder <?php echo esc_attr($lateral_toggle_left_button_vert_align); ?>">
			
				<div class="widget">

					<a href="#lateral-toggle" class="lateral-toggle-trigger"> 
						<span class="lateral-toggle-icon"></span>
					</a>
					<?php if ($show_woocommerce == "yes_trolley" || $show_woocommerce == "yes_bag") {
	
	$bra_woo_cart_html = '<a href="#cart-toggle" class="cart-toggle-trigger"> 
						<span class="text-link">Cart</span>
						<span class="count-badge"></span>
					</a>';
	
	echo wp_kses($bra_woo_cart_html, $brankic_allowedposttags);
	
} ?>
	   
				</div><!-- WIDGET -->	

			</div>


			<?php if (is_active_sidebar("lateral_rotate_text")) { ?>
			<div class="widget_holder bottom">
		
				<div class="widget footer">
					<div class="rotate">
						<?php dynamic_sidebar("lateral_rotate_text"); ?>
					</div>	
				</div><!-- WIDGET FOOTER -->
				
			</div>
			<?php } ?>
						
		</div><!-- LATERAL-TOGGLE-WRAPPER -->
		
<?php 
$scroll_indicator_position =  brankic_of_get_option("scroll_indicator_position", brankic_of_get_default("scroll_indicator_position"));
$scroll_indicator =  brankic_of_get_option("scroll_indicator", brankic_of_get_default("scroll_indicator"));
$scroll_indicator_thick =  brankic_of_get_option("scroll_indicator_thick", brankic_of_get_default("scroll_indicator_thick"));
$scroll_indicator_height =  brankic_of_get_option("scroll_indicator_height", brankic_of_get_default("scroll_indicator_height"));
if (substr_count($scroll_indicator_position, "lateral") == 1 && $scroll_indicator == "yes"){
?>	
<div class="page-scroll-indicator <?php echo esc_attr($scroll_indicator_position . " " . $scroll_indicator_thick . " " . $scroll_indicator_height ); ?>">
	<div class="progress"></div>
</div>	
<?php } ?>		
        
    </header><!-- HEADER LATERAL-TOGGLE -->
                                          			
 	<div id="lateral-toggle" class="lateral-toggle-content <?php echo esc_attr($overlay_menu_text_stroke_class); ?>">
    
				<div class="row-bg-wrap">
                    <div class="inner-wrap"> 
                        <div class="row-bg background-image" style="background-image: url(<?php echo esc_url($overlay_menu_bg_image); ?>);"></div>
                        <div class="row-bg background-color"></div>
                    </div> 
                </div>
	
	
		<div class="lateral-toggle-wrapper"  data-menu-wow-delay="<?php echo esc_attr($menu_wow_delay); ?>" data-menu-wow-effect="<?php echo esc_attr($menu_wow_effect); ?>">
		
				
    
    		<div class="widget_holder <?php //echo esc_attr($lateral_toggle_left_menu_vert_align); ?>">
			
				<div class="widget">
				
						<?php 
							wp_nav_menu( array( 'theme_location' => 'default' , 
												'container' => 'nav',
												'container_class' => 'lateral-toggle-menu slinky-menu',	
												'container_id' => 'menu',
												'menu_class' => '',
												'menu_id' => '',
												'fallback_cb' => 'brankic_simple_fallback',
												//'walker' => new Lateral_Toggle_Flex_Walker_Nav_Menu()
												) );
						?> 
					
				</div><!-- WIDGET -->
			
			</div>
			
			<div class="widget_holder bottom">
                            
					<?php //if (is_active_sidebar("overlay_menu_widget")) { 
					dynamic_sidebar("overlay_menu_widget"); 
					//} ?>
				
			</div>
            
		</div> <!-- LATERAL-TOGGLE-WRAPPER -->
        
	</div> <!-- LATERAL-TOGGLE-CONTENT -->                                            