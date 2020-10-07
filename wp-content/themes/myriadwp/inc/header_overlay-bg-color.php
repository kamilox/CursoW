<?php
	$overlay_menu_bg_image =  brankic_of_get_option("overlay_menu_bg_image", brankic_of_get_default("overlay_menu_bg_image")); 
	$menu_wow_delay =  brankic_of_get_option("menu_wow_delay", brankic_of_get_default("menu_wow_delay")); 
	$menu_wow_effect =  brankic_of_get_option("menu_wow_effect", brankic_of_get_default("menu_wow_effect")); 
?>
	<div id="menu-overlay" class="menu-bg-color-overlay menu-overlay-content <?php echo esc_attr($overlay_menu_content_align . " " . $overlay_menu_widgets_position . " " . $overlay_menu_vert_content_align . " " . $overlay_menu_text_stroke_class); ?>">
    		
		<div class="menu-overlay-wrapper" data-menu-wow-delay="<?php echo esc_attr($menu_wow_delay); ?>" data-menu-wow-effect="<?php echo esc_attr($menu_wow_effect); ?>">
		
			<div class="circle-button"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 80 80" xml:space="preserve" class="circle-border"><circle class="circle-border inner" cx="40" cy="40" r="36"></circle><circle class="circle-border outer" cx="40" cy="40" r="36"></circle></svg><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 80 80" xml:space="preserve" class="button-icon"><path class="close-x" d="M 10,10 L 30,30 M 30,10 L 10,30" /></svg></div>
		
				<div class="row-bg-wrap">
                    <div class="inner-wrap"> 
                        <div class="row-bg background-image" style="background-image: url(<?php echo esc_url($overlay_menu_bg_image); ?>);"></div>
                        <div class="row-bg background-color"></div>
                    </div> 
                </div>
          

			<div class="background-image-holder" id="header_overlay_background_image_holder">

<?php					
$menu_name = 'default';

if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
 
    $menu_items = wp_get_nav_menu_items($menu->term_id);
	$i = 0;
	
 
    foreach ( (array) $menu_items as $key => $menu_item ) {

		$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($menu_item->object_id), "full" ); 
		?>
		        <div class="background-image" data-rel="<?php echo esc_attr($menu_item->title); ?>"></div>
		<?php
		$i++;

    }

}
?>
            </div><!-- END BACKGROUND-IMAGE-HOLDER -->
                
			<div class="widget_holder">
			
				<div class="widget">
									
						 <?php 
							wp_nav_menu( array( 'theme_location' => 'default', 
												'container' => 'nav',
												'container_class' => 'slinky-menu',	
												'container_id' => 'menu',
												'menu_class' => '',
												'menu_id' => '',
												'fallback_cb' => 'brankic_overlay_fallback',
												'walker' => new Overlay_Bg_Image_Walker_Nav_Menu()
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
                                          			
                                             