<?php
$default_header_layout =  brankic_global_or_local("default_header_layout");
$default_header_3lines_overlay =  brankic_global_or_local("default_header_3lines_overlay");	
$overlay_menu_content_align = brankic_of_get_option("overlay_menu_content_align", brankic_of_get_default("overlay_menu_content_align"));
$overlay_menu_widgets_position = brankic_of_get_option("overlay_menu_widgets_position", brankic_of_get_default("overlay_menu_widgets_position"));
$overlay_menu_vert_content_align = brankic_of_get_option("overlay_menu_vert_content_align", brankic_of_get_default("overlay_menu_vert_content_align"));
$overlay_menu_text_stroke = brankic_of_get_option("overlay_menu_text_stroke", brankic_of_get_default("overlay_menu_text_stroke"));
if ($overlay_menu_text_stroke) $overlay_menu_text_stroke_class = "overlay_stroke"; else $overlay_menu_text_stroke_class = "";
?>
<?php if (is_page()  || is_home() || is_archive() || is_singular(array('product', 'topic', 'forum')) || brankic_bbpress_single_user() || is_404() || is_search()){ ?>
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
            
<?php } ?>
			</div><!-- MAIN-CONTAINER -->
 
    </div><!-- WRAPPER-HOLDER --> 
	
	
<?php 
if (substr_count($default_header_layout, "3") == 1) {
	
	if ($default_header_3lines_overlay == "flow") include(get_template_directory() . '/inc/header_flow.php');
	
	if ($default_header_3lines_overlay == "overlay-bg-image") include(get_template_directory() . '/inc/header_overlay-bg-image.php');
	
	if ($default_header_3lines_overlay == "overlay-bg-color") include(get_template_directory() . '/inc/header_overlay-bg-color.php');
	
	if ($default_header_3lines_overlay == "lateral-toggle-right-hidden" || $default_header_3lines_overlay == "lateral-toggle-left-hidden") {
		include(get_template_directory() . '/inc/header_lateral-toggle-right-hidden-2.php');;
	}
	
}

?>	