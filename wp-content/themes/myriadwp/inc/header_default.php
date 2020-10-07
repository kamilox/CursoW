<?php 
global $brankic_allowedposttags;

$custom_font_class = brankic_custom_font(); 

$overlay_class = "";
if ($overlay_bg_image_hover == 'featured_image') $overlay_class .= ' menu-overlay bgimage';

$default_header_layout = brankic_of_get_option("default_header_layout", brankic_of_get_default("default_header_layout"));

$menu_3_lines = false;
if ($default_header_layout == "l3w" || $default_header_layout == "3lw" || $default_header_layout == "wl3" || $default_header_layout == "l3" || $default_header_layout == "3l") $menu_3_lines = true;

$default_header_3lines_overlay =  brankic_global_or_local("default_header_3lines_overlay");	

if (($default_header_3lines_overlay == "lateral-toggle-right-hidden" || $default_header_3lines_overlay == "lateral-toggle-left-hidden") && $menu_3_lines) $overlay_class .= " lateral-hidden-toggle menu-lateral-hidden-toggle"; 
if ($default_header_3lines_overlay == "lateral-toggle-top-hidden" && $menu_3_lines) $overlay_class .= " lateral-hidden-toggle menu-lateral-hidden-toggle top"; 
if ($default_header_3lines_overlay == "stack" && $menu_3_lines) $overlay_class .= " page-stack";

//$default_header_layout =  brankic_global_or_local("default_header_layout");
if (substr_count($default_header_layout, "3") == 1) {
	
	$default_header_3lines_overlay =  brankic_global_or_local("default_header_3lines_overlay");	
	
	if ($default_header_3lines_overlay == "stack") include(get_template_directory() . '/inc/header_stack.php');
}


$default_menu_always_visible = brankic_global_or_local("default_menu_always_visible");

if ($default_menu_always_visible != "") {
	$default_menu_always_visible_data = 'data-always_visible="' . $default_menu_always_visible . '"';
} else { 
	$default_menu_always_visible_data = "";
}

$body_border_data = "";
$body_border_html_extra = "";
$body_border =  brankic_of_get_option("body_border", brankic_of_get_default("body_border"));
$body_side_border =  brankic_of_get_option("body_side_border", brankic_of_get_default("body_side_border"));

if ($body_border == "yes" || $body_side_border == "yes"){
	$body_border_width =  brankic_of_get_option("body_border_width", brankic_of_get_default("body_border_width"));
	
	if ($body_side_border == "yes") $body_border_data = 'data-side-border="true" data-site-border-width="' . $body_border_width . '"';
	if ($body_border == "yes") $body_border_data = 'data-site-border="true" data-site-border-width="' . $body_border_width . '"';
	
	$body_border_html_extra .= '<div class="site-border left"></div>';
    $body_border_html_extra .= '<div class="site-border right"></div>';
    
	if ($body_border == "yes") $body_border_html_extra .= '<div class="site-border bottom"></div>';
    if ($body_border == "yes") $body_border_html_extra .= '<div class="site-border top"></div>';
}
?>
<?php if (brankic_of_get_option("smooth_scroll", brankic_of_get_default("smooth_scroll")) == "yes") $data_smooth_scroll = 'data-smooth-scroll="true"'; else $data_smooth_scroll = ""; ?>
<div class="wrapper-holder <?php echo esc_attr($overlay_class); ?>" <?php echo wp_kses($data_smooth_scroll, $brankic_allowedposttags); ?> <?php echo wp_kses($body_border_data, $brankic_allowedposttags); ?>>

<?php 
echo wp_kses($body_border_html_extra, $brankic_allowedposttags);

$logo =  esc_url(brankic_of_get_option("logo-primary", brankic_of_get_default("logo-primary"))); 
$logo_2 =  esc_url(brankic_of_get_option("logo-secondary", brankic_of_get_default("logo-secondary"))); 
$logo_retina = brankic_of_get_option("logo-primary-retina", brankic_of_get_default("logo-primary-retina"));
$logo_2_retina = brankic_of_get_option("logo-secondary-retina", brankic_of_get_default("logo-secondary-retina"));
$default_header_overflow = brankic_of_get_option("default_header_overflow", brankic_of_get_default("default_header_overflow")); 
$default_header_fixed =  brankic_of_get_option("default_header_fixed", brankic_of_get_default("default_header_fixed"));
$default_header_border =  brankic_of_get_option("default_header_border", brankic_of_get_default("default_header_border"));
$searchbar =  brankic_of_get_option("searchbar", brankic_of_get_default("searchbar"));
$compact_default_header_on_scroll =  brankic_of_get_option("compact_default_header_on_scroll", brankic_of_get_default("compact_default_header_on_scroll"));
$compact_logo =  brankic_of_get_option("compact_logo", brankic_of_get_default("compact_logo"));
$compact_header_padding_top =  brankic_of_get_option("compact_header_padding_top", brankic_of_get_default("compact_header_padding_top"));
$compact_header_padding_top_custom =  brankic_of_get_option("compact_header_padding_top_custom", brankic_of_get_default("compact_header_padding_top_custom"));
$compact_header_padding_bottom =  brankic_of_get_option("compact_header_padding_bottom", brankic_of_get_default("compact_header_padding_bottom"));
$compact_header_padding_bottom_custom =  brankic_of_get_option("compact_header_padding_bottom_custom", brankic_of_get_default("compact_header_padding_bottom_custom"));

if ($logo_retina != "") $logo_srcset = ' srcset="' . $logo . ' 1x, ' . $logo_retina . ' 2x"'; else $logo_srcset = "";
if ($logo_2_retina != "") $logo_2_srcset = ' srcset="' . $logo_2 . ' 1x, ' . $logo_2_retina . ' 2x"'; else $logo_2_srcset = "";

if ($compact_header_padding_top == "custom") $compact_header_padding_top = $compact_header_padding_top_custom;
if ($compact_header_padding_bottom == "custom") $compact_header_padding_bottom = $compact_header_padding_bottom_custom;

$default_header_menu_align =  brankic_of_get_option("default_header_menu_align", brankic_of_get_default("default_header_menu_align"));

if ($default_header_menu_align == "center") $data_header_center = 'data-header-center="true"'; else $data_header_center = '';
if ($default_header_menu_align == "left") $data_header_left = 'data-header-left="true"'; else $data_header_left = '';
if ($default_header_menu_align == "right") $data_header_right = 'data-header-right="true"'; else $data_header_right = '';

if ($compact_default_header_on_scroll == "yes") $data_compact_default_header_on_scroll = 'data-compact_on_scroll="yes"'; else $data_compact_default_header_on_scroll = '';
if ($compact_logo != "" && $compact_default_header_on_scroll == "yes") $data_compact_logo = 'data-logo-scale="' . $compact_logo . '"'; else $data_compact_logo = '';
if ($compact_header_padding_top != "" || $compact_header_padding_bottom != "") {
	$data_compact_header_padding = 'data-compact_header_padding="yes"'; 
} else $data_compact_header_padding = '';


$default_header_submenu_color =  brankic_of_get_option("default_header_submenu_color", brankic_of_get_default("default_header_submenu_color"));

$show_woocommerce =  brankic_of_get_option("show_woocommerce", brankic_of_get_default("show_woocommerce")); 
$show_woo_account =  brankic_of_get_option("show_woo_account", brankic_of_get_default("show_woo_account")); 

if ($show_woocommerce == "") $show_woocommerce = "no";

$search_woo_where =  brankic_of_get_option("search_woo_where", brankic_of_get_default("search_woo_where")); 
$woo_single_change_header_colors =  brankic_of_get_option("woo_single_change_header_colors", brankic_of_get_default("woo_single_change_header_colors"));

$header_class = "";
if ($default_header_border == "yes") $header_class .= " menu-border";
if ($default_header_fixed == "no") $header_class .= " not-fixed";

if ($default_header_overflow == "yes") $header_class .= " overflow";

if ($overlay_bg_image_hover == 'featured_image') $header_class .= " overlay-bg-image";

if (($default_header_3lines_overlay == "lateral-toggle-right-hidden" || $default_header_3lines_overlay == "lateral-toggle-left-hidden" || $default_header_3lines_overlay == "lateral-toggle-top-hidden") && $menu_3_lines) $header_class .= " lateral-hidden-toggle";


if (brankic_is_woo_single()){
	if ($woo_single_change_header_colors == "yes") $header_class .= " new_header_colors";
}

$default_header_bg_image =  brankic_of_get_option("default_header_bg_image", brankic_of_get_default("default_header_bg_image"));
if ($default_header_bg_image == "") $default_header_bg_image = get_header_image();

//$default_header_layout =  brankic_global_or_local("default_header_layout");

$data_header_scheme = "";

if ($default_header_layout == "lmw" || $default_header_layout == "mlw" || $default_header_layout == "l3w" || $default_header_layout == "3lw" || $default_header_layout == "wl3") {
	$data_header_scheme = 'data-header-scheme="1_1_1"';
}
if ($default_header_layout == "lm" || $default_header_layout == "ml" || $default_header_layout == "l3" || $default_header_layout == "3l") {
	$data_header_scheme = 'data-header-scheme="1_1"';
}
if ($default_header_layout == "m") {
	$data_header_scheme = 'data-header-scheme="1"';
}

$center_l = $center_3 = "";

if ($default_header_layout == "mlw" || $default_header_layout == "wlm") {
	$center_l = "center";
	$center_l = "";
}

if ($default_header_layout == "wl3" || $default_header_layout == "3lw") {
	$center_l = $default_header_menu_align;
	$center_l = "";
} 

if ($default_header_layout == "l3w" || $default_header_layout == "w3l" || $default_header_layout == "lw3") {
	$center_3 = $default_header_menu_align;
	$center_3 = "";
}

$default_header_logo = '<div class="navbar-logo ' . $center_l . '">
                                            
                                            	<div>
                                          			<a href="' . esc_url( home_url( '/' ) ) . '">';
													
if (function_exists("get_field")) {
	$switch_logos = get_field("switch_logos");
	if ($switch_logos){
		
		$default_header_logo .= '							<img src="' . $logo_2 . '" class="dark_version logo_switch" alt="' . get_bloginfo( 'name' ) . '"' . $logo_2_srcset . ' />
														<img src="' . $logo . '" class="light_version logo_switch" alt="' . get_bloginfo( 'name' ) . '"' . $logo_srcset . ' />';
		
	}else{
		
		$default_header_logo .= '							<img src="' . $logo . '" class="dark_version" alt="' . get_bloginfo( 'name' ) . '"' . $logo_srcset . ' />
														<img src="' . $logo_2 . '" class="light_version" alt="' . get_bloginfo( 'name' ) . '"' . $logo_2_srcset . ' />';
		
	}
	
} else {
	
	$default_header_logo .= '							<img src="' . $logo . '" class="dark_version" alt="' . get_bloginfo( 'name' ) . '"' . $logo_srcset . ' />
														<img src="' . $logo_2 . '" class="light_version" alt="' . get_bloginfo( 'name' ) . '"' . $logo_2_srcset . ' />';	
}
													

														
$default_header_logo .= '							</a>
                                                </div><!-- DIV -->
												                                         
                                            </div><!-- NAVBAR-LOGO -->';

$default_header_menu_toggle =  brankic_of_get_option("default_header_menu_toggle", brankic_of_get_default("default_header_menu_toggle"));

if ($default_header_menu_toggle == "yes") {
	$default_header_fade_menu_3lines = '<a href="#lateral-hidden-toggle" class="lateral-hidden-toggle-trigger"><span class="lateral-hidden-toggle-icon"></span></a>';	
}




											

											
$default_header_menu = '<div class="navbar-menu text_menu">';

if ( has_nav_menu( 'default' ) ) { 

$default_header_menu .= '											<div class="navbar-menu responsive-x">

												<a href="#" class="lateral-hidden-toggle-trigger"><span class="lateral-hidden-toggle-icon"></span></a>
											
											</div><!-- navbar-menu-->';
}
											
$default_header_menu .= '											<div class="main-menu submenu-' . $default_header_submenu_color . '">';

if ($default_header_menu_toggle == "yes" && ($default_header_menu_align == "left" || $default_header_menu_align == "center")) $default_header_menu .= $default_header_fade_menu_3lines;

											$default_header_menu .=	wp_nav_menu( array( "theme_location" => "default" , 
																						"container" => "",
																						"container_class" => "",	
																						"menu_class" => "sf-js-enabled sf-arrows",
																						"menu_id" => "sf-nav",
																						"fallback_cb" => "brankic_empty_fallback",
																						"echo" => false
																						 ));
																						 


if ($default_header_menu_toggle == "yes" && $default_header_menu_align == "right") $default_header_menu .= $default_header_fade_menu_3lines;

$default_header_menu .= '</div><!-- MAIN-MENU --></div><!-- NAVBAR-MENU -->';

																						 

ob_start();
dynamic_sidebar("menu_widget");
$header_widget = ob_get_contents();
ob_end_clean();	

$default_header_widget = "";


if ($show_woocommerce != "no") $bra_woo_class = "bra_woo_cart"; else $bra_woo_class = "";

if (is_active_sidebar("menu_widget") || $show_woocommerce != "no" || $searchbar == "yes") $default_header_widget .= '<div class="navbar-secondary ' . $bra_woo_class . '">';																					 
																						 


  
$default_header_widget .=  $header_widget;

$bra_woo_cart_html = "";
if ($show_woocommerce != "no") {

	

	$bra_woo_cart_html .= '<div class="secondary-menu">';
	
	if ($show_woo_account == "yes") $bra_woo_cart_html .= '<a href="' . get_permalink( get_option('woocommerce_myaccount_page_id') ) . '">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="cart-icon" width="24" height="24">
                                                        	<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                                                        </svg>
                                                    </a>'; 
	
	if ($show_woocommerce == "yes_bag") $bra_woo_cart_html .= '<ul><li class="hidden_toggle_cart"><a href="#" class="cart-toggle-trigger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="cart-icon" width="24" height="24">
                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                        <line y1="7" y2="7" x2="19" x1="4"></line>
                                        <path d="M16 11a4 4 0 0 1-8 0"></path>
                                    </svg><span class="count-badge"></span></a></li></ul>';
													
	if ($show_woocommerce == "yes_trolley") $bra_woo_cart_html .= '<ul><li class="hidden_toggle_cart"><a href="#" class="cart-toggle-trigger">
														<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xml:space="preserve" class="cart-icon" width="24" height="24">
                                                            <circle cx="9" cy="21" r="1"></circle>
                                                            <circle cx="20" cy="21" r="1"></circle>
                                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                                        </svg><span class="count-badge"></span></a></li></ul>';
	
	
	
	$old_html = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 80 80" xml:space="preserve" class="circle-border">
				<circle class="circle-border inner" cx="40" cy="40" r="36"></circle>
				<circle class="circle-border outer" cx="40" cy="40" r="36"></circle>
			</svg>
<ul><li class="hidden_toggle_cart">

	<a href="#" class="cart-toggle-trigger">

		<span class="text-link">Cart</span>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" width="35" height="25" viewBox="0 0 80 70"><path d="M51,48.6l-2-29.7l0,0c-0.1-0.8-0.7-1.4-1.5-1.4h-7V14c0-6.2-4.7-11.2-10.5-11.2c-5.8,0-10.5,5-10.5,11.2v3.5h-7  c-0.8,0-1.4,0.6-1.5,1.4l0,0L9,48.6c0,0,0,0.1,0,0.1c0,4.8,3.7,8.5,8.5,8.5h25c4.8,0,8.5-3.7,8.5-8.5C51,48.7,51,48.6,51,48.6z   M22.5,14c0-4.5,3.4-8.2,7.5-8.2c4.2,0,7.5,3.6,7.5,8.2v3.5h-15V14z M42.5,54.2h-25c-3.1,0-5.5-2.4-5.5-5.5l1.9-28.2h32.2L48,48.7  C48,51.8,45.6,54.2,42.5,54.2z"></path></svg>
		<span class="count-badge"></span>

	</a>

	</li></ul>';
	
	$bra_woo_cart_html .= '</div>';
}








										
if (($default_header_3lines_overlay == "lateral-toggle-right-hidden" || $default_header_3lines_overlay == "lateral-toggle-left-hidden" || $default_header_3lines_overlay == "lateral-toggle-top-hidden") && $menu_3_lines) $overlay_trigger_html = '<li><a href="#lateral-hidden-toggle" class="lateral-hidden-toggle-trigger"><span class="lateral-hidden-toggle-icon"></span></a></li>';
else if ($default_header_3lines_overlay == "stack" && $menu_3_lines)  $overlay_trigger_html = '<li><a href="#" class="page-stack-triggerr"><span class="lateral-hidden-toggle-icon"></span></a></li>'; 
else $overlay_trigger_html = '<li><a href="#menu-overlay" class="menu-overlay-trigger"><span class="lateral-hidden-toggle-icon"></span></a></li>'; 
 
											
$default_header_3lines = '<div class="navbar-menu ' . $center_3 . '">
                                            
                                            	<div class="secondary-menu"> 
                                            
                                                	<ul>
                            
                                                    ' . $overlay_trigger_html . '    
														                                                                    
                                                    </ul><!--END UL--> 
                                                
                                                </div><!-- DIV -->
                                                
                                            </div><!-- NAVBAR-MENU -->';
											

$default_header_searchbar = '';											


                                            
$default_header_searchbar .= '                   <div class="secondary-menu"> 
                                            
                                                	<ul>
                            
                                                        <li><a href="#search-window" class="search-button"><i class="fa fa-search"></i></a></li>
                                                                    
                                                    </ul><!--END UL--> 
                                                
                                                </div><!-- DIV secondary-menu -->';
												
												
												
if ($show_woocommerce != "no" && $search_woo_where == "default_header") $default_header_widget .= $bra_woo_cart_html;
												
if ($searchbar == "yes" && $search_woo_where == "default_header") $default_header_widget .= $default_header_searchbar ;  												
                                                
if (is_active_sidebar("menu_widget") || $show_woocommerce != "no" || $searchbar == "yes") $default_header_widget .= '</div><!-- NAVBAR-SECONDARY -->';   											

$mobile_menu_open_style = brankic_of_get_option("mobile_menu_open_style", brankic_of_get_default("mobile_menu_open_style"));
if ($default_header_fixed == "no") $mobile_menu_open_style = "mobile_autoheight";
$mobile_menu_width =  brankic_of_get_option("mobile_menu_width", brankic_of_get_default("mobile_menu_width"));
if ($mobile_menu_open_style == "mobile_autoheight") $mobile_menu_width = "";

$mobile_menu_direction =  brankic_of_get_option("mobile_menu_direction", brankic_of_get_default("mobile_menu_direction"));
if ($mobile_menu_open_style == "mobile_autoheight") $mobile_menu_direction = ""; 

if ($default_header_layout == "l3" || $default_header_layout == "3l" || $default_header_layout == "wl3" || $default_header_layout == "3lw" || $default_header_layout == "l3w"){
	$mobile_menu_open_style = "";
}

?>
																	

<?php
$default_header_fullwidth =  brankic_global_or_local("default_header_fullwidth");
$extra_header_show = brankic_of_get_option("extra_header_show", brankic_of_get_default("extra_header_show"));
$extra_header_layout =  brankic_of_get_option("extra_header_layout", brankic_of_get_default("extra_header_layout"));
$extra_header_menu_position =  brankic_of_get_option("extra_header_menu_position", brankic_of_get_default("extra_header_menu_position"));
$extra_header_menu_align =  brankic_of_get_option("extra_header_menu_align", brankic_of_get_default("extra_header_menu_align"));
$extra_header_class = "";
$data_extra_header_center = '';
$data_extra_header_left = '';
$data_extra_header_right = '';
$data_extra_header_scheme = "";

if ($extra_header_show == "yes"){
	if ($extra_header_menu_align == "center") $data_extra_header_center = 'data-adv-header-center="true"'; 
	if ($extra_header_menu_align == "left") $data_extra_header_left = 'data-adv-header-left="true"';
	if ($extra_header_menu_align == "right") $data_extra_header_right = 'data-adv-header-right="true"'; 	
	$extra_header_class = "advanced";	

	if ($extra_header_layout == "www" || $extra_header_layout == "wwl" || $extra_header_layout == "wlw" || $extra_header_layout == "lww") {
		$data_extra_header_scheme = 'data-adv-header-scheme="1_1_1"';
	}
	if ($extra_header_layout == "lw" || $extra_header_layout == "wl" || $extra_header_layout == "ww") {
		$data_extra_header_scheme = 'data-adv-header-scheme="1_1"';
	}
	if ($extra_header_layout == "l" || $extra_header_layout == "w") {
		$data_extra_header_scheme = 'data-adv-header-scheme="1"';
	}
	ob_start();
	dynamic_sidebar("extra_menu_widget_1");
	$extra_widget_1 = ob_get_contents();
	ob_end_clean();	

	ob_start();
	dynamic_sidebar("extra_menu_widget_2");
	$extra_widget_2 = ob_get_contents();
	ob_end_clean();

	ob_start();
	dynamic_sidebar("extra_menu_widget_3");
	$extra_widget_3 = ob_get_contents();
	ob_end_clean();
																					 
	$extra_header_widget_1 = '<div class="navbar-secondary">' . $extra_widget_1 . '</div>';
	$extra_header_widget_2 = '<div class="navbar-secondary">' . $extra_widget_2 . '</div>';
	$extra_header_widget_3 = '<div class="navbar-secondary">' . $extra_widget_3 . '</div>';
		
}


$default_header_bg_color =  brankic_of_get_option("default_header_bg_color", brankic_of_get_default("default_header_bg_color"));
if ($default_header_bg_color != "") $data_header_bg_color = 'data-header_bg_color="true"'; else $data_header_bg_color = "";

$extra_header_bg_color =  brankic_of_get_option("extra_header_bg_color", brankic_of_get_default("extra_header_bg_color"));
if ($extra_header_bg_color != "") $data_extra_header_bg_color = 'data-header-adv_bg_color="true"'; else $data_extra_header_bg_color = "";

$default_content_width_responsive =  brankic_of_get_option("default_content_width_responsive", brankic_of_get_default("default_content_width_responsive"));

$tablet_header_class = "";
if ($default_content_width_responsive == "yes"){
	$default_content_width_responsive_percent =  brankic_of_get_option("default_content_width_responsive_percent", brankic_of_get_default("default_content_width_responsive_percent"));	
	$tablet_header_class = $default_content_width_responsive_percent;
}

$single_post_style = brankic_global_or_local("single_post_style");
if ($single_post_style == "null" || $single_post_style == null) $single_post_style = brankic_of_get_option("single_post_style", brankic_of_get_default("single_post_style"));
$portfolio_item_style = brankic_global_or_local("portfolio_item_style");


$data_change_below = "";


if (is_singular( array( 'portfolio_item' ) ) && ($portfolio_item_style == "portfolio_style_13" || $portfolio_item_style == "portfolio_style_12")) {
	$portfolio_item_change_header_colors_below = brankic_global_or_local("portfolio_item_change_header_colors_below");
	if ($portfolio_item_change_header_colors_below) $data_change_below = 'data-change_below="true"'; else $data_change_below = '';
}

if (is_singular( array( 'post' ) ) && $single_post_style == "fullwidth") {
	$post_change_header_colors_below = brankic_global_or_local("post_change_header_colors_below");
	if ($post_change_header_colors_below) $data_change_below = 'data-change_below="true"'; else $data_change_below = '';
}
if (is_archive() || is_search() || is_404()) {
	$archive_change_header_colors_below = brankic_global_or_local("archive_change_header_colors_below");
	if ($archive_change_header_colors_below) $data_change_below = 'data-change_below="true"'; else $data_change_below = '';
}
if (brankic_is_woo_shop()) {
	$woo_shop_change_header_colors_below = brankic_global_or_local("woo_shop_change_header_colors_below");
	if ($woo_shop_change_header_colors_below) $data_change_below = 'data-change_below="true"'; else $data_change_below = '';
}
if (brankic_is_woo_account()) {
	$woo_account_change_header_colors_below = brankic_global_or_local("woo_account_change_header_colors_below");
	if ($woo_account_change_header_colors_below) $data_change_below = 'data-change_below="true"'; else $data_change_below = '';
} 

$data_woo_logo = "";
$logo_in_default = false;
$logo_in_extra = false;

if ($default_header_layout == "lmw" || $default_header_layout == "mlw" || $default_header_layout == "l3w" || $default_header_layout == "3lw" || $default_header_layout == "wl3" || $default_header_layout == "lm" || $default_header_layout == "ml" || $default_header_layout == "l3" || $default_header_layout == "3l"){
	$logo_in_default = true;
} 
if ($extra_header_layout == "wwl" || $extra_header_layout == "wlw" || $extra_header_layout == "lww" || $extra_header_layout == "wl" || $extra_header_layout == "lw" || $extra_header_layout == "l") {
	$logo_in_extra = true;
}

if (class_exists('WooCommerce') && $search_woo_where == "extra_header" && $logo_in_default) $data_woo_logo = 'data-woo-logo="normal"';
if (class_exists('WooCommerce') && $search_woo_where == "default_header" && $logo_in_extra) $data_woo_logo = 'data-woo-logo="reverse"';

$data_extra_header = "";
if ($extra_header_show == "yes" && $extra_header_menu_position == "above") $data_extra_header = 'data-extra-above="true"';
if ($extra_header_show == "yes" && $extra_header_menu_position == "below") $data_extra_header = 'data-extra-above="false"';

if ( ($extra_header_layout == "wlw" || $extra_header_layout == "lww" || $extra_header_layout == "lw") && ($data_extra_header == 'data-extra-above="false"') ){
	$data_extra_header_logo_not_last = 'data-extra-header-logo-not-last="true"';
} else {
	$data_extra_header_logo_not_last = '';
}

$mobile_logo =  brankic_of_get_option("mobile_logo", brankic_of_get_default("mobile_logo"));
$data_mobile_logo = 'data-mobile-logo="' . $mobile_logo . '"';	

$default_header_megamenu_fullwidth =  brankic_of_get_option("default_header_megamenu_fullwidth", brankic_of_get_default("default_header_megamenu_fullwidth"));
if ($default_header_megamenu_fullwidth == "yes") $data_default_header_megamenu_fullwidth = 'data-megamenu-fullwidth="true"'; else $data_default_header_megamenu_fullwidth = '';



$data_fixed_header = 'data-header-fixed="' . $default_header_fixed . '"';

$default_header_hover_font_color =  brankic_of_get_option("default_header_hover_font_color", brankic_of_get_default("default_header_hover_font_color"));
if ($default_header_hover_font_color != "") $data_header_hover = 'data-header-hover="true"'; else $data_header_hover = 'data-header-hover="false"';

$default_header_submenu_font_hover_color =  brankic_of_get_option("default_header_submenu_font_hover_color", brankic_of_get_default("default_header_submenu_font_hover_color"));
if ($default_header_submenu_font_hover_color != "") $data_header_submenus_hover = 'data-header-submenu-hover="true"'; else $data_header_submenus_hover = 'data-header-submenu-hover="false"';

$default_header_menu_always_visible =  brankic_of_get_option("default_header_menu_always_visible", brankic_of_get_default("default_header_menu_always_visible"));
$extra_header_menu_always_visible =  brankic_of_get_option("extra_header_menu_always_visible", brankic_of_get_default("extra_header_menu_always_visible"));

if (($default_header_menu_always_visible == "yes" || $extra_header_menu_always_visible == "yes") && $default_header_fixed == "yes" && $extra_header_show == "yes"){
	if ($default_header_menu_always_visible == "yes") $header_menu_always_visible_class = "fixed-default";
	if ($extra_header_menu_always_visible == "yes") $header_menu_always_visible_class = "fixed-advanced";
	if ($extra_header_layout == "www" || $extra_header_layout == "ww" || $extra_header_layout == "w") $advanced_logo_free_class = "advanced-logo-free";
	
} else {
	$header_menu_always_visible_class = "";
	$advanced_logo_free_class = "";
}
?>


<div class="header header_default<?php echo esc_attr($header_class); ?> <?php echo esc_attr($advanced_logo_free_class); ?> <?php echo esc_attr($header_menu_always_visible_class); ?> <?php echo esc_attr($extra_header_class); ?> <?php echo esc_attr($mobile_menu_open_style); ?> <?php echo esc_attr($mobile_menu_width); ?>" 
 <?php echo wp_kses($data_header_bg_color, $brankic_allowedposttags) ; ?> 
 <?php echo wp_kses($data_extra_header_bg_color, $brankic_allowedposttags) ; ?> 
 <?php echo wp_kses($data_header_scheme, $brankic_allowedposttags); ?> 
 <?php if ($data_woo_logo != "") echo wp_kses($data_woo_logo, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_extra_header_logo_not_last, $brankic_allowedposttags); ?>
 <?php echo wp_kses($data_extra_header, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_extra_header_scheme, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($default_menu_always_visible_data, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_header_center, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_header_left, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_header_right, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_extra_header_center, $brankic_allowedposttags) ?> 
 <?php echo wp_kses($data_extra_header_left, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_extra_header_right, $brankic_allowedposttags); ?>
 <?php echo wp_kses($data_compact_default_header_on_scroll, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_compact_logo, $brankic_allowedposttags); ?>
 <?php echo wp_kses($data_compact_header_padding, $brankic_allowedposttags); ?> 
 <?php echo wp_kses($data_change_below, $brankic_allowedposttags); ?>
 <?php echo wp_kses($data_mobile_logo, $brankic_allowedposttags); ?>
 <?php echo wp_kses($data_fixed_header, $brankic_allowedposttags); ?>
 <?php echo wp_kses($data_default_header_megamenu_fullwidth, $brankic_allowedposttags); ?>
 <?php echo wp_kses($data_header_hover, $brankic_allowedposttags); ?>
 <?php echo wp_kses($data_header_submenus_hover, $brankic_allowedposttags); ?>>        
     
        	<div class="main-container">
        
            	<div class="row-container">
        
<?php 
if ( ($extra_header_layout == "www" || $extra_header_layout == "ww" || $extra_header_layout == "w" ) ){ 

	if ( $extra_header_menu_position == "above") $extra_header_class = "only_extra_header_above_no_logo";
	if ( $extra_header_menu_position == "below") $extra_header_class = "only_extra_header_below_no_logo";
?>
		
			<div class="row-bg-wrap <?php  echo esc_attr($extra_header_class); ?>">
				<div class="inner-wrap"> 
					<div class="row-bg background-color"></div>
					<div class="row-bg background-image"></div>
				</div> 
			</div>
		
		<?php } ?>
		
                	<div class="row <?php if ($default_header_fullwidth == "yes") { ?>fluid<?php } ?> <?php  echo esc_attr($tablet_header_class); ?>"> 
                    
<?php
// Extra Header Above

if ($extra_header_show == "yes" && $extra_header_menu_position == "above"){
?>
						<div class="menu-default advanced">
						                        
                        	<div class="menu_row">
                        
                        		<div class="menu_row_inner">
                        
                        			<div class="menu_row_inner_column">
                        
                        				<div class="menu_row_inner_wrapper">
										
										

<?php
if ($search_woo_where == "default_header") $bra_woo_class = "";

if ($extra_header_layout == "www") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2")) echo wp_kses($extra_header_widget_2, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_3") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_3;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};
if ($extra_header_layout == "wwl") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2")) echo wp_kses($extra_header_widget_2, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};
if ($extra_header_layout == "wlw") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_2;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};
if ($extra_header_layout == "lww") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_2;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};

if ($extra_header_layout == "ww") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_2;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};

if ($extra_header_layout == "wl") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};

if ($extra_header_layout == "lw") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_1") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_1;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};

if ($extra_header_layout == "w") {
	if (is_active_sidebar("extra_menu_widget_1") || $show_woocommerce != "no" || $searchbar == "yes") { 
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_1;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};

if ($extra_header_layout == "l") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};

										
										
?>										
										</div><!-- MENU_ROW_INNER_WRAPPER -->
                            
                            		</div><!-- MENU_ROW_INNER_COLUMN -->
                            
                            	</div><!-- MENU_ROW_INNER -->				
                            
                            </div><!-- MENU_ROW -->							
                            
                    	</div><!-- MENU-DEFAULT -->
<?php
}
// End of Extra Header
?>                        
						
						
						
						
						<div class="menu-default">
						                        
                        	<div class="menu_row">
                        
                        		<div class="menu_row_inner">
                        
                        			<div class="menu_row_inner_column">
                        
                        				<div class="menu_row_inner_wrapper">
<?php                                        
 
if ($default_header_layout == "lmw") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
};
if ($default_header_layout == "lwm") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
};
if ($default_header_layout == "mlw") {
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
};
if ($default_header_layout == "mwl") {
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};
if ($default_header_layout == "wlm") {
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);	
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
};
if ($default_header_layout == "wml") {
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};
if ($default_header_layout == "l3w") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	echo wp_kses($default_header_3lines, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
};
if ($default_header_layout == "lw3") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
	echo wp_kses($default_header_3lines, $brankic_allowedposttags);
};
if ($default_header_layout == "3lw") {
	echo wp_kses($default_header_3lines, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
};
if ($default_header_layout == "3wl") {
	echo wp_kses($default_header_3lines, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget")  || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};
if ($default_header_layout == "wl3") {
	if (is_active_sidebar("menu_widget")  || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	echo wp_kses($default_header_3lines, $brankic_allowedposttags);
};
if ($default_header_layout == "w3l") {
	if (is_active_sidebar("menu_widget")  || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
	echo wp_kses($default_header_3lines, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};
if ($default_header_layout == "lm") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
};
if ($default_header_layout == "ml") {
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};
if ($default_header_layout == "mw") {
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
};
if ($default_header_layout == "wm") {
	if (is_active_sidebar("menu_widget") || $searchbar == "yes" || $show_woocommerce != "no") echo wp_kses($default_header_widget, $brankic_allowedposttags);
	echo wp_kses($default_header_menu, $brankic_allowedposttags);	
};
if ($default_header_layout == "l3") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	echo wp_kses($default_header_3lines, $brankic_allowedposttags);
};
if ($default_header_layout == "3l") {
	echo wp_kses($default_header_3lines, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};
if ($default_header_layout == "m") {
	echo wp_kses($default_header_menu, $brankic_allowedposttags);
};

?> 

                            
                            			</div><!-- MENU_ROW_INNER_WRAPPER -->
                            
                            		</div><!-- MENU_ROW_INNER_COLUMN -->
                            
                            	</div><!-- MENU_ROW_INNER -->
                            
                            </div><!-- MENU_ROW -->
                            
                    	</div><!-- MENU-DEFAULT -->
						
<?php 
// Extra Header Below

if ($extra_header_show == "yes" && $extra_header_menu_position == "below"){
?>
						<div class="menu-default advanced">
						                        
                        	<div class="menu_row">
                        
                        		<div class="menu_row_inner">
                        
                        			<div class="menu_row_inner_column">
                        
                        				<div class="menu_row_inner_wrapper">
										
										

<?php
if ($search_woo_where == "default_header") $bra_woo_class = "";
if ($extra_header_layout == "www") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2")) echo wp_kses($extra_header_widget_2, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_3") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_3;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};
if ($extra_header_layout == "wwl") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2")) echo wp_kses($extra_header_widget_2, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};
if ($extra_header_layout == "wlw") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_2;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};
if ($extra_header_layout == "lww") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_2;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};

if ($extra_header_layout == "ww") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_2") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_2;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};

if ($extra_header_layout == "wl") {
	if (is_active_sidebar("extra_menu_widget_1")) echo wp_kses($extra_header_widget_1, $brankic_allowedposttags);
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};

if ($extra_header_layout == "lw") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
	if (is_active_sidebar("extra_menu_widget_1") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_1;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};

if ($extra_header_layout == "w") {
	if (is_active_sidebar("extra_menu_widget_1") || $show_woocommerce != "no" || $searchbar == "yes") {
		echo '<div class="navbar-secondary ' . $bra_woo_class . '">' . $extra_widget_1;
		if ($search_woo_where == "extra_header") echo wp_kses($bra_woo_cart_html . $default_header_searchbar, $brankic_allowedposttags);
		echo '</div>';
	}
};

if ($extra_header_layout == "l") {
	echo wp_kses($default_header_logo, $brankic_allowedposttags);
};

										
										
?>										
										</div><!-- MENU_ROW_INNER_WRAPPER -->
                            
                            		</div><!-- MENU_ROW_INNER_COLUMN -->
                            
                            	</div><!-- MENU_ROW_INNER -->
                            
                            </div><!-- MENU_ROW -->
                            
                    	</div><!-- MENU-DEFAULT -->
<?php
}
// End of Extra Header
?> 

<?php
if ($show_woocommerce != "no" && class_exists('WooCommerce')) include(get_template_directory() . '/woocommerce/brankic_woo_cart.php'); 

$mobile_menu_bg_align = brankic_of_get_option("mobile_menu_bg_align", brankic_of_get_default("mobile_menu_bg_align"));

if (substr_count($default_header_layout, "3") != 1){

		$mobile_menu_bg_align = brankic_of_get_option("mobile_menu_bg_align", brankic_of_get_default("mobile_menu_bg_align"));
		$mobile_menu_text_align =  brankic_of_get_option("mobile_menu_text_align", brankic_of_get_default("mobile_menu_text_align"));
		
		$mobile_menu_content_align_horizontal =  brankic_of_get_option("mobile_menu_content_align_horizontal", brankic_of_get_default("mobile_menu_content_align_horizontal"));
		$mobile_menu_content_align_vertical =  brankic_of_get_option("mobile_menu_content_align_vertical", brankic_of_get_default("mobile_menu_content_align_vertical"));
		
		if ($mobile_menu_open_style == "mobile_autoheight"){
			$mobile_menu_content_align_horizontal == "";
			$mobile_menu_content_align_vertical == "";
		} 
		
		$mobile_menu_width =  brankic_of_get_option("mobile_menu_width", brankic_of_get_default("mobile_menu_width"));
		
		if (is_active_sidebar("mobile_menu_widget")) $mobile_widget_class = "mobile_widget_true"; else $mobile_widget_class = ""; 		
		?>
		<div id="mobile-menu" class="<?php echo esc_attr($mobile_menu_direction . " " . $mobile_menu_width . " " . $mobile_widget_class); ?>">
			
		<?php if ($mobile_menu_open_style != "mobile_autoheight"){ ?>
		
			<div class="row-bg-wrap">
				<div class="inner-wrap"> 
					<div class="row-bg background-color"></div>
					<div class="row-bg background-image <?php echo esc_attr($mobile_menu_bg_align); ?>"></div>
				</div> 
			</div>
		
		<?php } ?>
			
			<div class="wrapr <?php echo esc_attr($mobile_menu_text_align); ?> <?php echo esc_attr($mobile_menu_content_align_horizontal); ?> <?php echo esc_attr($mobile_menu_content_align_vertical); ?>">
				<div class="holder">
		
					<?php 
		
				echo wp_nav_menu( array( "theme_location" => "default" , 
										"container" => "",
										"container_class" => "",	
										"menu_class" => "submenu-dark",
										"menu_id" => "sf-nav-mobile",
										"fallback_cb" => "brankic_empty_fallback",
										'walker' => new Mobile_Walker_Nav_Menu(),
										"echo" => false
								 ));

					if ($mobile_widget_class != "") { ?>
					
					<div class="mobile_sidebar_holder">
					
					<?php dynamic_sidebar("mobile_menu_widget"); ?>
					
					</div><!-- mobile_sidebar_holder -->
					
					<?php } ?>
					
				</div><!-- HOLDER -->		
			</div><!-- WRAPR -->			
		</div>	

<?php } ?>
                        
            		</div><!-- ROW -->
					
					
<?php if ($mobile_menu_open_style == "mobile_autoheight" && substr_count($default_header_layout, "3") != 1){ ?>
		
			<div class="row-bg-wrap only_mobile_autoheight">
				<div class="inner-wrap"> 
					<div class="row-bg background-color"></div>
					<div class="row-bg background-image <?php echo esc_attr($mobile_menu_bg_align); ?>"></div>
				</div> 
			</div>
		
<?php } ?>



                            
            	</div><!-- ROW-CONTAINER -->
            
        	</div><!-- MAIN-CONTAINER -->
			
			
<?php
if (substr_count($default_header_layout, "3") == 1) {

	if ($default_header_3lines_overlay == "lateral-toggle-top-hidden") {
		include(get_template_directory() . '/inc/header_lateral-toggle-top-hidden.php');;
	}
	
}
?>
<?php 
$scroll_indicator_position =  brankic_of_get_option("scroll_indicator_position", brankic_of_get_default("scroll_indicator_position"));
$scroll_indicator =  brankic_of_get_option("scroll_indicator", brankic_of_get_default("scroll_indicator"));
$scroll_indicator_thick =  brankic_of_get_option("scroll_indicator_thick", brankic_of_get_default("scroll_indicator_thick"));
$scroll_indicator_radius =  brankic_of_get_option("scroll_indicator_radius", brankic_of_get_default("scroll_indicator_radius"));
if (substr_count($scroll_indicator_position, "horizontal") == 1 && $scroll_indicator == "yes"){
?>	
<div class="page-scroll-indicator <?php echo esc_attr($scroll_indicator_position . " " . $scroll_indicator_thick . " " . $scroll_indicator_radius); ?>">
	<div class="progress"></div>
</div>	
<?php } ?>			
            
		</div><!-- HEADER -->