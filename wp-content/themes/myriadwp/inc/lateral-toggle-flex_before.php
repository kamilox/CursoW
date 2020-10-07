<?php 
global $brankic_allowedposttags;
if (brankic_of_get_option("smooth_scroll", brankic_of_get_default("smooth_scroll")) == "yes") $data_smooth_scroll = 'data-smooth-scroll="true"'; else $data_smooth_scroll = "" ?>
    <div class="wrapper-holder lateral-toggle-flex" id="wrapper-holder-lateral-toggle-flex" <?php echo wp_kses($data_smooth_scroll, $brankic_allowedposttags); ?>>
         
            <div class="main-container">
			
				
				
				<?php 
				if (is_page() || is_archive() || is_singular( 'product' )){
					
					if (is_page()) {	
						if (!$hide_title){ 
							echo brankic_hero_holder(brankic_global_or_local("hero_holder_background_color"),brankic_global_or_local("hero_holder_background_color_opacity"),brankic_global_or_local("hero_holder_title_color"),brankic_global_or_local("hero_holder_title_position"),brankic_global_or_local("hero_holder_height"));																		
						} 
					}

					if (is_archive()) {				
						if ($archive_show_title) echo brankic_hero_holder(brankic_global_or_local("archive_hero_holder_background_color"),brankic_global_or_local("archive_hero_holder_background_color_opacity"),brankic_global_or_local("archive_hero_holder_title_color"),brankic_global_or_local("archive_hero_holder_title_position"),brankic_global_or_local("archive_hero_holder_height"), true, false, true, false, false, true);	
					}					
					?>
				
					<div class="row-container brankic_content">
						
						<div class="row <?php echo esc_attr($default_margin) . " " . esc_attr($default_padding) . " " . esc_attr($page_row_container_sidebar_class); ?>">
				
				<?php
				}
				?>