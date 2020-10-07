<?php
global $brankic_allowedposttags;
include(get_template_directory() . '/inc/header_lateral-toggle-flex.php');
$default_index_margin =  brankic_of_get_option("default_index_margin", brankic_of_get_default("default_index_margin"));
if ($default_index_margin == "custom") {
	$default_index_top_margin =  brankic_of_get_option("default_index_top_margin", brankic_of_get_default("default_index_top_margin"));	
	$default_index_right_margin =  brankic_of_get_option("default_index_right_margin", brankic_of_get_default("default_index_right_margin"));
	$default_index_bottom_margin =  brankic_of_get_option("default_index_bottom_margin", brankic_of_get_default("default_index_bottom_margin"));
	$default_index_left_margin =  brankic_of_get_option("default_index_left_margin", brankic_of_get_default("default_index_left_margin"));
	
	$default_index_top_margin = str_replace("margin", "margin-top", $default_index_top_margin);
	$default_index_right_margin = str_replace("margin", "margin-right", $default_index_right_margin);
	$default_index_bottom_margin = str_replace("margin", "margin-bottom", $default_index_bottom_margin);
	$default_index_left_margin = str_replace("margin", "margin-left", $default_index_left_margin);
	
	$default_index_margin = "$default_index_top_margin $default_index_right_margin $default_index_bottom_margin $default_index_left_margin";
}
$default_index_padding =  brankic_of_get_option("default_index_padding", brankic_of_get_default("default_index_padding"));
if ($default_index_padding == "custom") {
	$default_index_top_padding =  brankic_of_get_option("default_index_top_padding", brankic_of_get_default("default_index_top_padding"));	
	$default_index_right_padding =  brankic_of_get_option("default_index_right_padding", brankic_of_get_default("default_index_right_padding"));
	$default_index_bottom_padding =  brankic_of_get_option("default_index_bottom_padding", brankic_of_get_default("default_index_bottom_padding"));
	$default_index_left_padding =  brankic_of_get_option("default_index_left_padding", brankic_of_get_default("default_index_left_padding"));
	
	$default_index_top_padding = str_replace("padding", "padding-top", $default_index_top_padding);
	$default_index_right_padding = str_replace("padding", "padding-right", $default_index_right_padding);
	$default_index_bottom_padding = str_replace("padding", "padding-bottom", $default_index_bottom_padding);
	$default_index_left_padding = str_replace("padding", "padding-left", $default_index_left_padding);
	
	$default_index_padding = "$default_index_top_padding $default_index_right_padding $default_index_bottom_padding $default_index_left_padding";
}

$default_index_content_fullwidth =  brankic_of_get_option("default_index_content_fullwidth", brankic_of_get_default("default_index_content_fullwidth"));
if ($default_index_content_fullwidth == "yes") $style = "style='max-width:none'"; else $style = "";
?> 
<?php if (brankic_of_get_option("smooth_scroll", brankic_of_get_default("smooth_scroll")) == "yes") $data_smooth_scroll = 'data-smooth-scroll="true"'; else $data_smooth_scroll = ";" ?>	
    <div class="wrapper-holder" <?php echo wp_kses($data_smooth_scroll, $brankic_allowedposttags); ?>>
    
    	<div id="wrapper"> 
        
            <div class="container">
            
                <div class="row <?php echo esc_attr($default_index_margin) . " " . esc_attr($default_index_padding); ?>" <?php echo esc_attr($style); ?>>
  
<?php
if ( have_posts() ) : 

while ( have_posts() ) : the_post();
the_title();
the_content();
?>			



<?php		
endwhile;
else :
	// If no content, include the "No posts found" template.
	//get_template_part( 'content', 'none' );
endif;
?>       
		
                </div><!-- ROW -->
			
                
            </div><!-- CONTAINER -->
			

            
        </div><!-- WRAPPER -->
    
    </div><!-- WRAPPER-HOLDER -->