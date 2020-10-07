<?php
	$overlay_menu_bg_image =  brankic_of_get_option("overlay_menu_bg_image", brankic_of_get_default("overlay_menu_bg_image")); 
?>

	<div id="menu-overlay" class="menu-overlay-content menu-flow <?php echo esc_attr($overlay_menu_content_align . " " . $overlay_menu_text_stroke_class); ?>">
    
		<div class="menu-overlay-wrapper">
		
			<div class="circle-button"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 80 80" xml:space="preserve" class="circle-border"><circle class="circle-border inner" cx="40" cy="40" r="36"></circle><circle class="circle-border outer" cx="40" cy="40" r="36"></circle></svg><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 80 80" xml:space="preserve" class="button-icon"><path class="close-x" d="M 10,10 L 30,30 M 30,10 L 10,30" /></svg></div>
        
			<div class="row-bg-wrap">
				<div class="inner-wrap"> 
					<div class="row-bg background-image" style="background-image: url(<?php echo esc_url($overlay_menu_bg_image); ?>);"></div>
					<div class="row-bg background-color"></div>
				</div> 
			</div>  
                            
    		<div class="widget_holder">
			
				<div class="widget">
						
					<div class="swiper-container content-carousel" id="carousel-menu">
								
						
						<?php 
							wp_nav_menu( array( 'theme_location' => 'default' , 
												'container' => 'ul',
												'menu_class' => 'swiper-wrapper',
												'menu_id' => '',
												'fallback_cb' => 'brankic_simple_fallback',
												'walker' => new Flow_Walker_Nav_Menu()
												) );
						?> 
										
								   
					</div><!-- SWIPER-CONTAINER -->
					
				</div><!-- WIDGET -->
				
				
			</div><!-- WIDGET HOLDER -->
			
			<div class="widget_holder bottom">
				
				<?php if (is_active_sidebar("overlay_menu_widget")) { dynamic_sidebar("overlay_menu_widget"); } ?>
				
			</div>
            
		</div> <!-- LATERAL-TOGGLE-WRAPPER -->
        
	</div> <!-- LATERAL-TOGGLE-CONTENT -->