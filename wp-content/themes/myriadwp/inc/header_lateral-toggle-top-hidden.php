<?php
	$overlay_menu_bg_image =  brankic_of_get_option("overlay_menu_bg_image", brankic_of_get_default("overlay_menu_bg_image")); 
	if (!isset($tablet_class)) $tablet_class = "";
	$overlay_menu_text_stroke = brankic_of_get_option("overlay_menu_text_stroke", brankic_of_get_default("overlay_menu_text_stroke"));
	if ($overlay_menu_text_stroke) $overlay_menu_text_stroke_class = "overlay_stroke"; else $overlay_menu_text_stroke_class = "";
	
	$menu_wow_delay =  brankic_of_get_option("menu_wow_delay", brankic_of_get_default("menu_wow_delay")); 
	$menu_wow_effect =  brankic_of_get_option("menu_wow_effect", brankic_of_get_default("menu_wow_effect")); 
?>
	
	<div id="lateral-hidden-toggle" class="lateral-hidden-toggle-content top <?php echo esc_attr($overlay_menu_text_stroke_class); ?>">
	
		<div class="row-bg-wrap">
			<div class="inner-wrap"> 
				<div class="row-bg background-image" style="background-image: url(<?php echo esc_url($overlay_menu_bg_image); ?>);"></div>
				<div class="row-bg background-color"></div>
			</div> 
		</div>
    
		<div class="lateral-hidden-toggle-wrapper <?php echo esc_attr($tablet_class); ?>" data-menu-wow-delay="<?php echo esc_attr($menu_wow_delay); ?>" data-menu-wow-effect="<?php echo esc_attr($menu_wow_effect); ?>">
		
				
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
				
			<?php if (is_active_sidebar("overlay_menu_widget") || is_active_sidebar("overlay_menu_widget_2") || is_active_sidebar("overlay_menu_widget_3")) { ?>
			
			<div class="widget_holder_grid">
				<?php if (is_active_sidebar("overlay_menu_widget")) { ?>
				<div class="widget_holder left">				
					<?php dynamic_sidebar("overlay_menu_widget"); ?>				
				</div>
				<?php } ?>
				
				<?php if (is_active_sidebar("overlay_menu_widget_2")) { ?>
				
				<div class="widget_holder right">	
					<?php dynamic_sidebar("overlay_menu_widget_2"); ?>				
				</div>
				<?php } ?>
				
				<?php if (is_active_sidebar("overlay_menu_widget_3")) { ?>
				<div class="widget_holder bottom">				
					<?php dynamic_sidebar("overlay_menu_widget_3"); ?>				
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			
			
		</div> <!-- LATERAL-TOGGLE-WRAPPER -->
        
	</div> <!-- LATERAL-TOGGLE-CONTENT -->