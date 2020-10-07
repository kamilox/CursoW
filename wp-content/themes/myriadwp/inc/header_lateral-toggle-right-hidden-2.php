<?php
	$overlay_menu_bg_image =  brankic_of_get_option("overlay_menu_bg_image", brankic_of_get_default("overlay_menu_bg_image")); 
	
	$menu_wow_delay =  brankic_of_get_option("menu_wow_delay", brankic_of_get_default("menu_wow_delay")); 
	$menu_wow_effect =  brankic_of_get_option("menu_wow_effect", brankic_of_get_default("menu_wow_effect")); 
	
	if ($default_header_3lines_overlay == "lateral-toggle-left-hidden") $left_class = "left"; else $left_class = "";
?>
	
	<div id="lateral-hidden-toggle" class="lateral-hidden-toggle-content <?php echo esc_attr($left_class . " " . $overlay_menu_text_stroke_class); ?>">
	
		<div class="row-bg-wrap">
			<div class="inner-wrap"> 
				<div class="row-bg background-image" style="background-image: url(<?php echo esc_url($overlay_menu_bg_image); ?>);"></div>
				<div class="row-bg background-color"></div>
			</div> 
		</div>
    
		<div class="lateral-hidden-toggle-wrapper" data-menu-wow-delay="<?php echo esc_attr($menu_wow_delay); ?>" data-menu-wow-effect="<?php echo esc_attr($menu_wow_effect); ?>">
		
		<div class="circle-button"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 80 80" xml:space="preserve" class="circle-border"><circle class="circle-border inner" cx="40" cy="40" r="36"></circle><circle class="circle-border outer" cx="40" cy="40" r="36"></circle></svg><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 80 80" xml:space="preserve" class="button-icon"><path class="close-x" d="M 10,10 L 30,30 M 30,10 L 10,30" /></svg></div>
		
				
    
			<div class="widget_holder">
				
				<div class="widget">
				
					<?php 
						wp_nav_menu( array( 'theme_location' => 'default', 
											'container' => 'nav',
											'container_class' => 'lateral-hidden-toggle-menu slinky-menu',	
											'container_id' => 'menu',
											'menu_class' => '',
											'menu_id' => '',
											'fallback_cb' => 'brankic_overlay_fallback'
											) );
					?>
					
				</div><!-- WIDGET -->
				
			</div>
			
			<?php if (is_active_sidebar("overlay_menu_widget")) { ?>
			<div class="widget_holder bottom">
				
				<?php dynamic_sidebar("overlay_menu_widget"); ?>
				
			</div>
			<?php } ?>
		</div> <!-- LATERAL-TOGGLE-WRAPPER -->
        
	</div> <!-- LATERAL-TOGGLE-CONTENT -->