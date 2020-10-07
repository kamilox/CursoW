<?php
/**
 * The default template for displaying pages
 */
get_header(); 

if ( comments_open()) $brankic_show_comments = true; else $brankic_show_comments = false;

$enable_social_sharing_pages = brankic_global_or_local("enable_social_sharing_pages");
$custom_font_class = brankic_custom_font();
$overlay_bg_image_hover = brankic_global_or_local("overlay_bg_image_hover");

$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));

$default_margin =  brankic_global_or_local("default_margin");
if ($default_margin == "custom") {
	$default_top_margin =  brankic_global_or_local("default_top_margin");	
	$default_bottom_margin =  brankic_global_or_local("default_bottom_margin");	
	$default_top_margin = str_replace("margin", "margin-top", $default_top_margin);
	$default_bottom_margin = str_replace("margin", "margin-bottom", $default_bottom_margin);	
	$default_margin = "$default_top_margin auto $default_bottom_margin auto";
}
$default_padding =  brankic_global_or_local("default_padding");
if ($default_padding == "custom") {
	
	if (function_exists("get_field")) {
		$local_default_padding = get_field("default_padding");
	} else $local_default_padding = "";
	
	if (brankic_of_get_option("default_padding", brankic_of_get_default("default_padding")) == "custom" && ($local_default_padding == "" || $local_default_padding == null)){
	
		$default_top_padding =  brankic_of_get_option("default_top_padding", brankic_of_get_default("default_top_padding"));	
		$default_right_padding =  brankic_of_get_option("default_right_padding", brankic_of_get_default("default_right_padding"));
		$default_bottom_padding =  brankic_of_get_option("default_bottom_padding", brankic_of_get_default("default_bottom_padding"));
		$default_left_padding =  brankic_of_get_option("default_left_padding", brankic_of_get_default("default_left_padding"));	
	
	} 

	if ($local_default_padding == "custom")	{
		
		$default_top_padding =  get_field("default_top_padding");	
		$default_right_padding =  get_field("default_right_padding");
		$default_bottom_padding =  get_field("default_bottom_padding");
		$default_left_padding =  get_field("default_left_padding");
		
	}
	
	
	$default_top_padding = str_replace("padding", "padding-top", $default_top_padding);
	$default_right_padding = str_replace("padding", "padding-right", $default_right_padding);
	$default_bottom_padding = str_replace("padding", "padding-bottom", $default_bottom_padding);
	$default_left_padding = str_replace("padding", "padding-left", $default_left_padding);	
	$default_padding = "$default_top_padding $default_right_padding $default_bottom_padding $default_left_padding";
	
}




if (brankic_is_woo_account()){
	

 		$default_margin = brankic_of_get_option("woo_account_margin", brankic_of_get_default("woo_account_margin"));
		if ($default_margin == "custom") {
			$default_top_margin =  brankic_of_get_option("woo_account_top_margin", brankic_of_get_default("woo_account_top_margin"));	
			$default_bottom_margin =  brankic_of_get_option("woo_account_bottom_margin", brankic_of_get_default("woo_account_bottom_margin"));	
			$default_top_margin = str_replace("margin", "margin-top", $default_top_margin);
			$default_bottom_margin = str_replace("margin", "margin-bottom", $default_bottom_margin);	
			$default_margin = "$default_top_margin auto $default_bottom_margin auto";
		}
		
		
		$default_padding = brankic_of_get_option("woo_account_padding", brankic_of_get_default("woo_account_padding"));
		if ($default_padding == "custom"){
	
			$woo_account_top_padding =  brankic_of_get_option("woo_account_top_padding", brankic_of_get_default("woo_account_top_padding"));	
			$woo_account_right_padding =  brankic_of_get_option("woo_account_right_padding", brankic_of_get_default("woo_account_right_padding"));
			$woo_account_bottom_padding =  brankic_of_get_option("woo_account_bottom_padding", brankic_of_get_default("woo_account_bottom_padding"));
			$woo_account_left_padding =  brankic_of_get_option("woo_account_left_padding", brankic_of_get_default("woo_account_left_padding"));
			
			$default_top_padding = str_replace("padding", "padding-top", $woo_account_top_padding);
			$default_right_padding = str_replace("padding", "padding-right", $woo_account_right_padding);
			$default_bottom_padding = str_replace("padding", "padding-bottom", $woo_account_bottom_padding);
			$default_left_padding = str_replace("padding", "padding-left", $woo_account_left_padding);	
			$default_padding = "$default_top_padding $default_right_padding $default_bottom_padding $default_left_padding";
		}
}	





$page_content_width =  brankic_global_or_local("default_content_width", "page_content_width");
if ($page_content_width == "fullwidth") {
	$content_width = 1440;
} else {
	$content_width = intval(substr($page_content_width, 0, 4));
}

if (function_exists("get_field")) {
	$hide_title = get_field("hide_title");
} else {
	$hide_title = false;
}



$page_sidebar = brankic_global_or_local("page_sidebar");
$page_sidebar_position = brankic_global_or_local("page_sidebar_position");
$default_content_width_responsive =  brankic_of_get_option("default_content_width_responsive", brankic_of_get_default("default_content_width_responsive"));

$tablet_class = "";
if ($default_content_width_responsive == "yes"){
	$default_content_width_responsive_percent =  brankic_of_get_option("default_content_width_responsive_percent", brankic_of_get_default("default_content_width_responsive_percent"));	
	$tablet_class = $default_content_width_responsive_percent;
}


if ($page_sidebar != "none" && $page_sidebar != "") $page_row_container_sidebar_class = "sidebar-on " . $page_sidebar_position ; else $page_row_container_sidebar_class = "";

include(get_template_directory() . '/inc/header_' . $header_style . '.php');

include(get_template_directory() . '/inc/' . $header_style . '_before.php');

     
if ($page_sidebar != "none" && $page_sidebar != "") {
	
	$column_class = "col-9"; 
?>



<?php
} else {
	$column_class = "col-12";
}
?> 


	<div class="<?php echo esc_attr($column_class); ?>">
	
				
				

<?php
if ( have_posts() ) : 

while ( have_posts() ) : the_post();

the_content();

$wp_link_pages_args = array('before'           => '<div class="post-page-navigation">' . __( 'Pages:', 'myriadwp' ),
							'after'            => '</div>',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'number',
							'separator'        => ' ',
							'nextpagelink'     => esc_html__('Next page', 'myriadwp'),
							'previouspagelink' => esc_html__('Previous page', 'myriadwp'),
							'pagelink'         => '%',
							'echo'             => 1
							);

wp_link_pages( $wp_link_pages_args );

if ($enable_social_sharing_pages == "yes") include(get_template_directory() . '/inc/share.php');

// If comments are open load up the comment template.
	if ($brankic_show_comments) comments_template();
		
endwhile;
else :
	// If no content, include the "No posts found" template.
	//get_template_part( 'content', 'none' );
endif;
?>

	</div><!-- <?php echo esc_attr($column_class); ?>-->

<?php if ($page_sidebar != "none" && $page_sidebar != "") { ?>
 	
<?php
$disable_sticky =  brankic_of_get_option("disable_sticky", brankic_of_get_default("disable_sticky"));
?>
                            
						<div class="col-3 <?php if ($disable_sticky == "no") { ?>sticky-element<?php } ?>">					    
					    		
								<div class="sidebar">
								
								<?php if (is_active_sidebar($page_sidebar)) { dynamic_sidebar($page_sidebar); } ?>
								   <?php if ( ! is_active_sidebar( $page_sidebar ) ) : ?>
										<div id="search" class="widget widget_search">
										   <?php get_search_form(); ?>
										</div>
										<div id="archives" class="widget widget_archive">
											<h3 class="widget-title"><?php _e( 'Archives', 'myriadwp' ); ?></h3>
											<ul>
												<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
											</ul>
										</div>
										<div id="meta" class="widget">
											<h3 class="widget-title"><?php _e( 'Meta', 'myriadwp' ); ?></h3>
											<ul>
												<?php wp_register(); ?>
												<li><?php wp_loginout(); ?></li>
												<?php wp_meta(); ?>
											</ul>
										</div>
								   <?php endif; ?>
								
								</div><!-- SIDEBAR-->	
                                        
                        </div><!-- COL-3 STICKY-WRAP-->
						
					
<?php } ?>      
		
<?php include(get_template_directory() . '/inc/' . $header_style . '_after.php'); ?>

<?php
get_footer();
?>