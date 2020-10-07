<?php
$overlay_menu_bg_image =  brankic_of_get_option("overlay_menu_bg_image", brankic_of_get_default("overlay_menu_bg_image")); 

$custom_font_class = brankic_custom_font(); 

$logo =  brankic_of_get_option("logo-primary", brankic_of_get_default("logo-primary")); 

?>
	<div class="page-stack-content">
	
		<div class="row-bg-wrap">
			<div class="inner-wrap"> 
				<div class="row-bg background-image" style="background-image: url(<?php echo esc_url($overlay_menu_bg_image); ?>);"></div>
				<div class="row-bg background-color"></div>
			</div> 
		</div>
    
		<div class="page-stack-wrapper">
		
				
        
        <a  href="#"class="close"><span class="close-line1"></span> <span class="close-line2"></span></a>
    
    		<div class="col-4 widget">
            
                <nav class="page-stack-menu">
				
				
				<?php 
					wp_nav_menu( array( 'theme_location' => 'default' , 
										'container' => 'nav',
										'container_class' => 'page-stack-menu',	
										'menu_class' => '',
										'menu_id' => '',
										'fallback_cb' => 'brankic_simple_fallback',
										//'walker' => new Lateral_Toggle_Flex_Walker_Nav_Menu()
										) );
				?>
                        
                </nav>
                
            </div><!-- COL-4 -->
            
            
            <?php if (is_active_sidebar("overlay_menu_widget")) { ?>
									
			<div class="col-8 widget"> 

					<?php dynamic_sidebar("overlay_menu_widget"); ?>
				
			</div><!-- COL-8 -->

			<?php } ?>
            
		</div> <!-- LATERAL-TOGGLE-WRAPPER -->
        
	</div> <!-- LATERAL-TOGGLE-CONTENT -->
	
	