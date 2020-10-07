<?php

global $brankic_allowedposttags;

$brankic_allowed_atts = array(
	'align'      => array(),
	'class'      => array(),
	'type'       => array(),
	'id'         => array(),
	'dir'        => array(),
	'lang'       => array(),
	'style'      => array(),
	'xml:lang'   => array(),
	'src'        => array(),
	'alt'        => array(),
	'href'       => array(),
	'rel'        => array(),
	'rev'        => array(),
	'target'     => array(),
	'novalidate' => array(),
	'type'       => array(),
	'value'      => array(),
	'name'       => array(),
	'tabindex'   => array(),
	'action'     => array(),
	'method'     => array(),
	'for'        => array(),
	'width'      => array(),
	'height'     => array(),
	'data'       => array(),
	'title'      => array(),
	'X1'         => array(),
	'x2'         => array(),
	'Y1'         => array(),
	'y2'         => array(),
	'X1'         => array(),
	'x2'         => array(),
	'x1'         => array(),
	'y1'         => array(),
	'd'      	 => array(),
	'cx'         => array(),
	'cy'         => array(),
	'r'          => array(),
	'xmlns'		=> array(),
	'viewBox'	=> array(),
	'data-border'   			=> array(),
	'data-bg-color' 			=> array(),
	'data-header_bg_color'		=> array(),
	'data-header-adv_bg_color' 	=> array(),
	'data-bg-color-hover'		=> array(),
	'data-filter' 				=> array(),
	'data-column' 				=> array(),
	'data-footer-text_align'	=> array(),
	'data-border-radius' 		=> array(),
	'data-smooth-scroll' 		=> array(),
	'data-column' 				=> array(),
	'data-gap' 					=> array(),
	'data-mobile-width' 		=> array(),
	'data-site-border' 			=> array(),
	'data-site-border-width' 	=> array(),
	'data-footer-border-custom' => array(),
	'data-header-fixed' 		=> array(),
	'data-rel' 					=> array(),
	'data-header-hover' 		=> array(),
	'data-header-submenu-hover' => array(),
	'srcset' 					=> array(),
);

$brankic_allowedposttags['form']     = $brankic_allowed_atts;
$brankic_allowedposttags['label']    = $brankic_allowed_atts;
$brankic_allowedposttags['input']    = $brankic_allowed_atts;
$brankic_allowedposttags['textarea'] = $brankic_allowed_atts;
$brankic_allowedposttags['iframe']   = $brankic_allowed_atts;
$brankic_allowedposttags['script']   = $brankic_allowed_atts;
$brankic_allowedposttags['style']    = $brankic_allowed_atts;
$brankic_allowedposttags['strong']   = $brankic_allowed_atts;
$brankic_allowedposttags['small']    = $brankic_allowed_atts;
$brankic_allowedposttags['table']    = $brankic_allowed_atts;
$brankic_allowedposttags['span']     = $brankic_allowed_atts;
$brankic_allowedposttags['abbr']     = $brankic_allowed_atts;
$brankic_allowedposttags['code']     = $brankic_allowed_atts;
$brankic_allowedposttags['pre']      = $brankic_allowed_atts;
$brankic_allowedposttags['div']      = $brankic_allowed_atts;
$brankic_allowedposttags['img']      = $brankic_allowed_atts;
$brankic_allowedposttags['h1']       = $brankic_allowed_atts;
$brankic_allowedposttags['h2']       = $brankic_allowed_atts;
$brankic_allowedposttags['h3']       = $brankic_allowed_atts;
$brankic_allowedposttags['h4']       = $brankic_allowed_atts;
$brankic_allowedposttags['h5']       = $brankic_allowed_atts;
$brankic_allowedposttags['h6']       = $brankic_allowed_atts;
$brankic_allowedposttags['ol']       = $brankic_allowed_atts;
$brankic_allowedposttags['ul']       = $brankic_allowed_atts;
$brankic_allowedposttags['li']       = $brankic_allowed_atts;
$brankic_allowedposttags['em']       = $brankic_allowed_atts;
$brankic_allowedposttags['hr']       = $brankic_allowed_atts;
$brankic_allowedposttags['br']       = $brankic_allowed_atts;
$brankic_allowedposttags['tr']       = $brankic_allowed_atts;
$brankic_allowedposttags['td']       = $brankic_allowed_atts;
$brankic_allowedposttags['p']        = $brankic_allowed_atts;
$brankic_allowedposttags['a']        = $brankic_allowed_atts;
$brankic_allowedposttags['b']        = $brankic_allowed_atts;
$brankic_allowedposttags['i']        = $brankic_allowed_atts;
$brankic_allowedposttags['svg']      = $brankic_allowed_atts;
$brankic_allowedposttags['circle']   = $brankic_allowed_atts;
$brankic_allowedposttags['path']     = $brankic_allowed_atts;
$brankic_allowedposttags['line']     = $brankic_allowed_atts;


function myriadwp_enqueue_styles_scripts() {
	
	wp_enqueue_script( 'myriadwp-custom', get_theme_file_uri( '/javascript/custom.js'), array('jquery'), '1.0.0', false);
	
	$extra_javascript =  brankic_of_get_option("extra_javascript", brankic_of_get_default("extra_javascript"));
	wp_add_inline_script( 'myriadwp-custom', $extra_javascript );
	
	// default header menu
	$inline_script = "jQuery(document).ready(function($) {
		windowWidth= $(window).width();
        $( window ).resize(function() {
            windowWidth = $(window).width();
        });
		
		$('#sf-nav').superfish({speed:200,delay:200, 
			onBeforeShow : function (){                 
                if(!this.is('#sf-nav>li>ul')){
                    var subMenuWidth = $(this).width();
                    var parentLi = $(this).parent();                    
                    var parentWidth = parentLi.width();
                    if (typeof parentLi.offset() !== 'undefined'){
						var subMenuRight = parentLi.offset().left + parentWidth + subMenuWidth;
						if(subMenuRight > windowWidth){
							$(this).css({'margin-right': 'auto', 'margin-left': -500+'px'});
						} else {
							$(this).css({'margin-right': '', 'margin-left': ''});
						}
					}
                }
            }
		});
	});";
	wp_add_inline_script( 'myriadwp-custom', $inline_script );
	

	if (brankic_of_get_option("back_to_top", brankic_of_get_default("back_to_top")) == "yes") {
		
		$back_to_top_script = 'jQuery(document).ready(function($){
	var windowsize = jQuery(window).width();
	if (windowsize > 767 ) {
	jQuery("#back-top").hide();
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 120) {
				jQuery("#back-top").fadeIn();
			} else {
				jQuery("#back-top").fadeOut();
			}
		});
		jQuery("#back-top").on("click", function(event){
			event.preventDefault();
			 jQuery("body,html").animate({
				scrollTop: 0
			}, 800); 
		});
	}
});';
		wp_add_inline_script( 'myriadwp-custom', $back_to_top_script );		
	}
	
	if (brankic_of_get_option("scroll_indicator", brankic_of_get_default("scroll_indicator")) == "yes") {
		
		$scroll_indicator_script = 'jQuery(document).ready(function($){
	var windowsize = jQuery(window).width();
	if (windowsize > 767 ) {
	jQuery(".page-scroll-indicator ").hide();
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 120) {
				jQuery(".page-scroll-indicator ").fadeIn();
			} else {
				jQuery(".page-scroll-indicator ").fadeOut();
			}
		});
	}
});';
		wp_add_inline_script( 'myriadwp-custom', $scroll_indicator_script );		
	}

	$header_style =  brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
	
	$default_header_3lines_overlay =  brankic_of_get_option("default_header_3lines_overlay", brankic_of_get_default("default_header_3lines_overlay"));

	
	if ($header_style == "lateral-left" || $header_style == "lateral-toggle-left" || $header_style == "lateral-toggle-flex" || $default_header_3lines_overlay == "stack" || ($header_style == "default" && ($default_header_3lines_overlay == "lateral-toggle-right-hidden" || $default_header_3lines_overlay == "lateral-toggle-left-hidden" || $default_header_3lines_overlay == "lateral-toggle-top-hidden" || $default_header_3lines_overlay == "overlay-bg-color" || $default_header_3lines_overlay == "overlay-bg-image"))) {
		
		$inline_script = "jQuery(document).ready(function($) {
			$('#menu').slinky({
				title: false,
			});
		});";
		wp_add_inline_script( 'myriadwp-custom', $inline_script );

		if ($default_header_3lines_overlay == "lateral-toggle-top-hidden") {

				$inline_lateral_toggle_top_script = '
				jQuery(document).ready(function($) {
					jQuery(".lateral-hidden-toggle-icon").on("click", function(event){
						var header_height = jQuery(".header").outerHeight();
						jQuery(".lateral-hidden-toggle-content.top").css("top", header_height + "px");

					})
				})';				
		}

		
		if ($header_style == "lateral-toggle-left") {
			$inline_lateral_toggle_left_script = 'jQuery(document).ready(function($) {
				$(".lateral-toggle-menu.slinky-menu a").not(".back").hover(function() {
					$(this).parent().siblings().stop().fadeTo(300, 0.1); 
				}, 
				function() {
					$(this).parent().siblings().stop().fadeTo(300, 1);
				});
			});';
		}
		

		
	}
	$default_header_layout =  brankic_of_get_option("default_header_layout", brankic_of_get_default("default_header_layout"));

	if ($header_style == "default" && ($default_header_layout == "l3w" || $default_header_layout == "3lw" || $default_header_layout == "wl3" || $default_header_layout == "l3" || $default_header_layout == "3l") && ($default_header_3lines_overlay == "overlay-bg-image" || $default_header_3lines_overlay == "overlay-bg-color" || $default_header_3lines_overlay == "flow")) {
			
		$inline_script_overlay_bg_image = "jQuery(document).ready(function($) {
				$('.slinky-menu li a').on('mouseenter', function() {
					$('#header_overlay_background_image_holder').addClass('visible');
					$('.slinky-menu li a').addClass('disable');
					$(this).removeClass('disable');	
					var aux = $(this).data('id'),
					preview = $('.background-image[data-rel=\"' + aux + '\"]');	
					$('#header_overlay_background_image_holder').find('.background-image').removeClass('active');
					preview.addClass('active');
				}).on('mouseleave', function() {
					$('.slinky-menu li a').removeClass('disable');
					$('#header_overlay_background_image_holder').removeClass('visible');
					$('#header_overlay_background_image_holder .background-image').removeClass('active');	
				}); 
				$('.slinky-menu').on('mouseenter', function() {
				}).on('mouseleave', function() {
				});
			});";
			
		wp_add_inline_script( 'myriadwp-custom', $inline_script_overlay_bg_image );
	}
	
	
	if ($header_style == "default") {
		$default_header_scroll_top_visible =  brankic_of_get_option("default_header_scroll_top_visible", brankic_of_get_default("default_header_scroll_top_visible"));
		$header_scroll_top_script = 'var didScroll,lastScrollTop=0,delta=5,header_class="div.header",navbarHeight=jQuery(header_class).outerHeight();function hasScrolled(){var l=jQuery(this).scrollTop();Math.abs(lastScrollTop-l)<=delta||(l>lastScrollTop&&l>navbarHeight?jQuery(header_class).removeClass("nav-down").addClass("nav-up"):l+jQuery(window).height()<jQuery(document).height()&&jQuery(header_class).removeClass("nav-up").addClass("nav-down"),lastScrollTop=l)}jQuery(window).scroll(function(l){didScroll=!0}),setInterval(function(){didScroll&&(hasScrolled(),didScroll=!1)},250);';
		if ($default_header_scroll_top_visible == "yes") wp_add_inline_script( 'myriadwp-custom', $header_scroll_top_script );
	}
	

		wp_enqueue_style( 'myriadwp-brankic-style', get_theme_file_uri( '/css/brankic_style.min.css' ));
	
	
	wp_add_inline_style( 'myriadwp-brankic-style', brankic_custom_css() );
	wp_add_inline_style( 'myriadwp-brankic-style', brankic_default_headings_css() );
	
	
	$page_transitions =  brankic_of_get_option("page_transitions", brankic_of_get_default("page_transitions"));
	if ($page_transitions == "loading") {
		$preloader_css = '.main-preloader{position:fixed;width:100%;height:100%;left:0;top:0;z-index:999999999;background-color:#000;text-align:center}.main-preloader .main-preloader-inner{position:absolute;top:50%;width:100%}.main-preloader .preloader-percentage{color:#fff;margin:0}.main-preloader .preloader-percentage span{display:inline-block;font-size:50px}';
		wp_add_inline_style( 'myriadwp-brankic-style', $preloader_css );
	}
	if ($page_transitions == "fade_out_fade_in") {
		wp_enqueue_script( 'myriadwp-animsition', get_theme_file_uri( '/javascript/animsition.min.js'), array('jquery'), '1.0.0', false );
		wp_enqueue_style( 'myriadwp-animsition', get_theme_file_uri( '/css/animsition.min.css' ) );
		$inline_script = "jQuery(document).ready(function($) {
			$('body').animsition({
							inClass               :   'fade-in',
							outClass              :   'fade-out',
							inDuration            :    3000,
							outDuration           :    3000,
							touchSupport          :    true, 
							loading               :    true,
							loadingParentElement  :   'body', //animation wrapper element
							loadingClass          :   'animsition-loading',
							unSupportCss          : [
														'animation-duration',
														'-webkit-animation-duration',
														'-o-animation-duration'
													]
			});
		});";
		wp_add_inline_script( 'myriadwp-animsition', $inline_script );
	}
	if ($page_transitions == "fade_out_loading") {
		wp_enqueue_script( 'myriadwp-loader', get_theme_file_uri( '/javascript/loader.js'), array('jquery'), '1.0.0', false);
		wp_enqueue_script( 'myriadwp-animsition', get_theme_file_uri( '/javascript/animsition.min.js'), array('jquery'), '1.0.0', false);
		wp_enqueue_style( 'myriadwp-animsition', get_theme_file_uri( '/css/animsition.min.css' ) );
		$inline_script = "jQuery(document).ready(function($) {
			$('body').animsition({
							inClass               :   'none',
							outClass              :   'fade-out',
							inDuration            :    0,
							outDuration           :    3000,
							touchSupport          :    true, 
							loading               :    true,
							loadingParentElement  :   'body', //animation wrapper element
							loadingClass          :   'animsition-loading',
							unSupportCss          : [
														'animation-duration',
														'-webkit-animation-duration',
														'-o-animation-duration'
													]

			});
		});";
		wp_add_inline_script( 'myriadwp-animsition', $inline_script );
	}
	
	$smooth_scroll =  brankic_of_get_option("smooth_scroll", brankic_of_get_default("smooth_scroll"));
	if ($smooth_scroll == "yes") {
		$smooth_scroll_step =  brankic_of_get_option("smooth_scroll_step", brankic_of_get_default("smooth_scroll_step"));
		$smooth_scroll_speed =  brankic_of_get_option("smooth_scroll_speed", brankic_of_get_default("smooth_scroll_speed"));
		wp_enqueue_script( 'jquery-smoothscroll', get_theme_file_uri( '/javascript/jquery.smoothscroll.js'), array('jquery'), '1.0.0', false);
		$inline_script = 'jQuery(document).ready(function($) {
			jQuery.scrollSpeed(' . $smooth_scroll_step . ', ' . $smooth_scroll_speed . ');
		});';
		wp_add_inline_script( 'jquery-smoothscroll', $inline_script );
	}
	
	$scroll_indicator =  brankic_of_get_option("scroll_indicator", brankic_of_get_default("scroll_indicator"));
	if ($scroll_indicator == "yes") {
		$scroll_indicator_position =  brankic_of_get_option("scroll_indicator_position", brankic_of_get_default("scroll_indicator_position"));
		$scroll_indicator_color =  brankic_of_get_option("scroll_indicator_color", brankic_of_get_default("scroll_indicator_color"));
		$scroll_indicator_bg_color =  brankic_of_get_option("scroll_indicator_bg_color", brankic_of_get_default("scroll_indicator_bg_color"));

		$inline_script = 'jQuery(document).ready(function($){ window.onscroll = function () { scrollProgress() } });
function scrollProgress() {
	var currentState = document.body.scrollTop || document.documentElement.scrollTop;
	var pageHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
	var scrollStatePercentage = (currentState / pageHeight) * 100;';
	if (substr_count($scroll_indicator_position, "vertical") == 1) $inline_script .= 'document.querySelector(".page-scroll-indicator.vertical > .progress").style.height = scrollStatePercentage + "%";';
	if (substr_count($scroll_indicator_position, "lateral") == 1) $inline_script .= 'document.querySelector(".page-scroll-indicator.lateral > .progress").style.height = scrollStatePercentage + "%";';
    if (substr_count($scroll_indicator_position, "horizontal") == 1) $inline_script .= 'document.querySelector(".page-scroll-indicator.horizontal > .progress").style.width = scrollStatePercentage + "%";';
$inline_script .= '}';
		wp_add_inline_script( 'myriadwp-custom', $inline_script );
		$scroll_indicator_css = "";
		if ($scroll_indicator_bg_color != "") $scroll_indicator_css .=  '.page-scroll-indicator{background:' . $scroll_indicator_bg_color . '}';
		if ($scroll_indicator_color != "") $scroll_indicator_css .=  '.page-scroll-indicator .progress{background:' . $scroll_indicator_color . '}';
		if ($scroll_indicator_css != "") wp_add_inline_style( 'myriadwp-brankic-style', $scroll_indicator_css );
	}
	
	
	$default_header_menu_always_visible = brankic_of_get_option("default_header_menu_always_visible", brankic_of_get_default("default_header_menu_always_visible"));
	$extra_header_menu_always_visible = brankic_of_get_option("extra_header_menu_always_visible", brankic_of_get_default("extra_header_menu_always_visible"));
	$default_header_fixed = brankic_of_get_option("default_header_fixed", brankic_of_get_default("default_header_fixed"));
	$extra_header_layout = brankic_of_get_option("extra_header_layout", brankic_of_get_default("extra_header_layout"));
	$extra_header_show = brankic_of_get_option("extra_header_show", brankic_of_get_default("extra_header_show"));
	
	if (($default_header_menu_always_visible == "yes" || $extra_header_menu_always_visible == "yes") && $default_header_fixed == "yes" && $extra_header_show == "yes"){
		$inline_script = '(function($) {
  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          top          = $t.offset().top,
          bottom       = top + $t.height(),
          compareTop    = partial === true ? bottom : top,
          compareBottom = partial === true ? top : bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
    
})(jQuery);

jQuery(window).scroll(function(event) {
  
  jQuery(".fixed-default, .fixed-advanced").each(function(i, el) {
    var el = jQuery(el);
    if (el.visible(true)) {
      el.addClass("visible-viewport"); 
    } else {
      el.removeClass("visible-viewport");
    }
  });
  
});
jQuery(window).load(function(event) {
  
  jQuery(".header_default").each(function(i, el) {
    var el = jQuery(el);
    if (el.visible(true)) {
      el.addClass("visible-viewport"); 
    } else {
      el.removeClass("visible-viewport");
    }
  });
  
});';
		
	wp_add_inline_script( 'myriadwp-custom', $inline_script );	
	};
	
	

	
	$extra_css =  brankic_of_get_option("extra_css", brankic_of_get_default("extra_css"));
	if ($extra_css != "") wp_add_inline_style( 'myriadwp-brankic-style', $extra_css );
	
	
	
	$sidebar =  brankic_global_or_local("archive_sidebar", "page_sidebar");
	$count_widgets = brankic_default_count_widgets($sidebar);
	if ($count_widgets == 0) $sidebar = "";
	$single_post_style = brankic_global_or_local("single_post_style");

	
	$google_font_family_1 = brankic_of_get_option("google_web_font_family_1", brankic_of_get_default("google_web_font_family_1"));
	$google_font_family_2 = brankic_of_get_option("google_web_font_family_2", brankic_of_get_default("google_web_font_family_2"));
	$google_font_family_3 = brankic_of_get_option("google_web_font_family_3", brankic_of_get_default("google_web_font_family_3"));
	$google_font_family_4 = brankic_of_get_option("google_web_font_family_4", brankic_of_get_default("google_web_font_family_4"));
	
	$font_family_1_handler = "google-font-" . $google_font_family_1;
	$font_family_1_handler = str_replace(" ", "-", strtolower($font_family_1_handler));
	
	$font_family_2_handler = "google-font-" . $google_font_family_2;
	$font_family_2_handler = str_replace(" ", "-", strtolower($font_family_2_handler));
	
	$font_family_3_handler = "google-font-" . $google_font_family_3;
	$font_family_3_handler = str_replace(" ", "-", strtolower($font_family_3_handler));
	
	$font_family_4_handler = "google-font-" . $google_font_family_4;
	$font_family_4_handler = str_replace(" ", "-", strtolower($font_family_4_handler));
	


	if ($google_font_family_1) wp_enqueue_style( $font_family_1_handler, '//fonts.googleapis.com/css?family=' . $google_font_family_1 . ':' . brankic_of_get_option("google_web_font_family_variants_and_subsets_1", brankic_of_get_default("google_web_font_family_variants_and_subsets_1")) );
	if ($google_font_family_2) wp_enqueue_style( $font_family_2_handler, '//fonts.googleapis.com/css?family=' . $google_font_family_2 . ':' . brankic_of_get_option("google_web_font_family_variants_and_subsets_2", brankic_of_get_default("google_web_font_family_variants_and_subsets_2")) );
	if ($google_font_family_3) wp_enqueue_style( $font_family_3_handler, '//fonts.googleapis.com/css?family=' . $google_font_family_3 . ':' . brankic_of_get_option("google_web_font_family_variants_and_subsets_3", brankic_of_get_default("google_web_font_family_variants_and_subsets_3")) );
	if ($google_font_family_4) wp_enqueue_style( $font_family_4_handler, '//fonts.googleapis.com/css?family=' . $google_font_family_4 . ':' . brankic_of_get_option("google_web_font_family_variants_and_subsets_4", brankic_of_get_default("google_web_font_family_variants_and_subsets_4")) );

	$google_web_fonts_css = "";

	if ($google_font_family_1) $google_web_fonts_css .= '.google_web_font_1{font-family:' . $google_font_family_1 . '}';
	if ($google_font_family_2) $google_web_fonts_css .= '.google_web_font_2{font-family:' . $google_font_family_2 . '}';
	if ($google_font_family_3) $google_web_fonts_css .= '.google_web_font_3{font-family:' . $google_font_family_3 . '}';
	if ($google_font_family_4) $google_web_fonts_css .= '.google_web_font_4{font-family:' . $google_font_family_4 . '}';

	wp_add_inline_style( 'myriadwp-brankic-style', $google_web_fonts_css );
	
	if ( is_singular() && get_option( 'thread_comments' ) )	wp_enqueue_script( 'comment-reply' );
	

	// MAIN HEADING AND MENU FONTS

	$main_font =  brankic_of_get_option("main_font", brankic_of_get_default("main_font"));
	$headings_font =  brankic_of_get_option("headings_font", brankic_of_get_default("headings_font"));
	$menu_font =  brankic_of_get_option("menu_font", brankic_of_get_default("menu_font"));	
	$mobile_menu_font =  brankic_of_get_option("mobile_menu_font", brankic_of_get_default("mobile_menu_font"));
	
	$main_font_custom =  brankic_of_get_option("main_font_custom", brankic_of_get_default("main_font_custom"));
	$headings_font_custom =  brankic_of_get_option("headings_font_custom", brankic_of_get_default("headings_font_custom"));
	$menu_font_custom =  brankic_of_get_option("menu_font_custom", brankic_of_get_default("menu_font_custom"));
	$mobile_menu_font_custom =  brankic_of_get_option("mobile_menu_font_custom", brankic_of_get_default("mobile_menu_font_custom"));
	
	if ($main_font == "custom") $main_font = $main_font_custom;
	if ($headings_font == "custom") $headings_font = $headings_font_custom;
	if ($menu_font == "custom") $menu_font = $menu_font_custom;
	if ($mobile_menu_font == "custom") $mobile_menu_font = $mobile_menu_font_custom;
	
	$main_font_size =  brankic_of_get_option("main_font_size", brankic_of_get_default("main_font_size"));
	$main_font_size_custom =  brankic_of_get_option("main_font_size_custom", brankic_of_get_default("main_font_size_custom"));
	$main_font_weight =  brankic_of_get_option("main_font_weight", brankic_of_get_default("main_font_weight"));
	$main_font_style =  brankic_of_get_option("main_font_style", brankic_of_get_default("main_font_style"));
	$main_font_spacing =  brankic_of_get_option("main_font_spacing", brankic_of_get_default("main_font_spacing"));
	$main_font_height =  brankic_of_get_option("main_font_height", brankic_of_get_default("main_font_height"));
	$main_font_height_custom =  brankic_of_get_option("main_font_height_custom", brankic_of_get_default("main_font_height_custom"));
	
	if ($main_font_size_custom != "") $main_font_size = $main_font_size_custom;
	if ($main_font_height_custom != "") $main_font_height = $main_font_height_custom;
	
	$main_fonts_css = '';
	if ($main_font != "") $main_fonts_css .= 'body{font-family:' . $main_font . ';font-size:' . $main_font_size . ';font-weight:' . $main_font_weight . ';font-style:' . $main_font_style . ';letter-spacing:' . $main_font_spacing . ';line-height:' . $main_font_height . ';}';
	if ($headings_font != "") $main_fonts_css .= 'h1, h2, h3, h4, h5, h6{font-family:' . $headings_font . '}';
	if ($menu_font != "") $main_fonts_css .= '.main-menu li a, .lateral .lateral-wrapper .lateral-menu.slinky-menu a, .menu-flex li a, .lateral-toggle-content .lateral-toggle-menu.slinky-menu a, .menu-flow .swiper-slide a, #menu-overlay .slinky-menu a, .lateral-hidden-toggle-menu.slinky-menu a{font-family:' . $menu_font . '}';
	if ($mobile_menu_font != "") $main_fonts_css .= '#mobile-menu ul li a{font-family:' . $mobile_menu_font . '}';

	wp_add_inline_style( 'myriadwp-brankic-style', $main_fonts_css );
	
	//link colors
	
	$inline_a_css = "";
	
	$default_link_color = brankic_of_get_option("default_link_color", brankic_of_get_default("default_link_color"));
	$default_link_hover_color = brankic_of_get_option("default_link_hover_color", brankic_of_get_default("default_link_hover_color"));
	
	if ($default_link_color != "") $inline_a_css .= 'a { color: ' . $default_link_color . '; }';
	if ($default_link_hover_color != "") $inline_a_css .= '.wrapper-holder .main-container .row-container .row [class*="col-"] a:hover { color: ' . $default_link_hover_color  . '; }';
	
	wp_add_inline_style( 'myriadwp-brankic-style', $inline_a_css );
	
	

	
	$customize_cursor =  brankic_of_get_option("customize_cursor", brankic_of_get_default("customize_cursor")); 
	if ($customize_cursor == "yes") {
		
		$cursor_color = brankic_of_get_option("cursor_color", brankic_of_get_default("cursor_color"));
		$cursor_background_color = brankic_of_get_option("cursor_background_color", brankic_of_get_default("cursor_background_color"));
		$cursor_border_color = brankic_of_get_option("cursor_border_color", brankic_of_get_default("cursor_border_color"));
		$cursor_size = brankic_of_get_option("cursor_size", brankic_of_get_default("cursor_size"));
		
		if ($cursor_color != "") $custom_cursor_css .= '.cursor-pointer{background:' . $cursor_color . '}';
		if ($cursor_background_color != "") $custom_cursor_css .= '.cursor-pointer.ring span{background:' . $cursor_background_color . '}';
		if ($cursor_border_color != "") $custom_cursor_css .= '.cursor-pointer.ring span{border: 2px solid ' . $cursor_border_color . '}';

		wp_add_inline_style( 'myriadwp-brankic-style', $custom_cursor_css );	
		
		
		
		$data_cursor_inline_script_OLD = 'jQuery(document).ready(function($) {$("body").attr("data-cursor-customize", "true")
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		
		$(".cursor-pointer").remove();		
	} else {

		var selectedElement = ["a","input",".circle-button"];
		var selectedE = selectedElement.join();

		$(selectedE).mouseenter(function() {
			$(".cursor-pointer").addClass("hover");
		}).mouseleave(function() {
			$(".cursor-pointer").removeClass("hover");
		});

		var selectedBody = ["body"];
		var selectedB = selectedBody.join();

		$(selectedB).mouseenter(function() {
			$(".cursor-pointer").addClass("enable");
		}).mouseleave(function() {
			$(".cursor-pointer").removeClass("enable");
		});

		var xMousePos = 0;
		var yMousePos = 0;

		$(window).on("mousemove",function(event) {
			xMousePos = event.clientX;
			yMousePos = event.clientY;
		}); 

        window.requestAnimationFrame(function PointerMove() {
			$(".cursor-pointer").css("transform", "matrix(1, 0, 0, 1, "+xMousePos+",  "+yMousePos+")");
			window.requestAnimationFrame(PointerMove);
		});	
	}
		
		})';
		
		$data_cursor_inline_script = 'jQuery(document).ready(function($) {
			
		$("body").attr("data-cursor-customize", "true")

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		
		$(".cursor-pointer").remove();		
	} 
	
	else {

		var selectedElement = ["a","input",".circle-button"];
		var selectedE = selectedElement.join();

		$(selectedE).mouseenter(function() {
			$(".cursor-pointer").addClass("hover");
		}).mouseleave(function() {
			$(".cursor-pointer").removeClass("hover");
		});

		var selectedBody = ["body"];
		var selectedB = selectedBody.join();

		$(selectedB).mouseenter(function() {
			$(".cursor-pointer").addClass("enable");
		}).mouseleave(function() {
			$(".cursor-pointer").removeClass("enable");
		});

		var xMousePos = 0.4;
		var yMousePos = 0.1;

		$(window).on("mousemove",function(event) {
			xMousePos = event.clientX;
			yMousePos = event.clientY;
		}); 

        window.requestAnimationFrame(function PointerMove() {
			$(".cursor-pointer").css("transform", "matrix(1, 0, 0, 1, "+xMousePos+",  "+yMousePos+")");
			window.requestAnimationFrame(PointerMove);
		});	

		var xRingPos = 0.9;
		var yRingPos = 0.1;

		$(window).on("mousemove",function(event) {
			xRingPos = event.clientZ;
		yRingPos = event.clientW;
		}); 

        window.requestAnimationFrame(function RingMove() {
			$(".cursor-pointer.ring").css("transform", "matrix(1, 0, 0, 1, "+xRingPos+",  "+yRingPos+")");
			window.requestAnimationFrame(RingMove);
		});	
	}
});';
		
		wp_add_inline_script( 'myriadwp-custom', $data_cursor_inline_script );
	}
	
	$customize_cursor_script = "	";
	
	$sticky_woo_single = false;
	if (brankic_is_woo_single()){
		$woo_product_gallery = brankic_of_get_option("woo_product_gallery", brankic_of_get_default("woo_product_gallery"));
		if ($woo_product_gallery == "sticky") $sticky_woo_single = true;
	}
	
	$portfolio_item_style = brankic_global_or_local("portfolio_item_style");
	$disable_sticky =  brankic_of_get_option("disable_sticky", brankic_of_get_default("disable_sticky"));

	if ( $disable_sticky == "no" || $sticky_woo_single || (is_singular( 'portfolio_item' ) && $portfolio_item_style == "portfolio_style_11" ) ){
		wp_register_script( 'jquery-sticky-kit', get_theme_file_uri( '/javascript/jquery.sticky-kit.min.js'), array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'jquery-sticky-kit');
		
		$sticky_inline_script = 'jQuery(document).ready(function($){$(".sticky-element").stick_in_parent();});';
		wp_add_inline_script( 'jquery-sticky-kit', $sticky_inline_script );
	}
	
	wp_register_script('jquery-swiperslider', get_theme_file_uri( '/javascript/jquery.swiperslider.js'), array('jquery'), '1.0.0', true );
	
	
// SHARE ICONS OPTIONS	
	
	
	$social_shape =  brankic_of_get_option("social_shape", brankic_of_get_default("social_shape"));
	$social_color =  brankic_of_get_option("social_color", brankic_of_get_default("social_color"));
	$social_icon_hover_color =  brankic_of_get_option("social_icon_hover_color", brankic_of_get_default("social_icon_hover_color"));
	$social_bg_color =  brankic_of_get_option("social_bg_color", brankic_of_get_default("social_bg_color"));
	$social_bg_hover_color =  brankic_of_get_option("social_bg_hover_color", brankic_of_get_default("social_bg_hover_color"));
	$social_border_color =  brankic_of_get_option("social_border_color", brankic_of_get_default("social_border_color"));
	$social_border_hover_color =  brankic_of_get_option("social_border_hover_color", brankic_of_get_default("social_border_hover_color"));
		
	$icons_style = "";
	
	
		if ($social_color != "") $icons_style .= '#brankic_social_share.social-bookmarks a { color: ' . $social_color . '; }';
	
		if ($social_icon_hover_color != "")  $icons_style .= '#brankic_social_share.social-bookmarks a:hover { color: ' . $social_icon_hover_color . '; }';
		
		if ($social_bg_color != "") $icons_style .= '#brankic_social_share.social-bookmarks a:before { background: ' . $social_bg_color . '; }';
			
		if ($social_bg_hover_color != "") $icons_style .= '#brankic_social_share.social-bookmarks a:hover:before { background: ' . $social_bg_hover_color . '; }';

		if ($social_border_color != "") $icons_style .= '#brankic_social_share.social-bookmarks a:after { border-color: ' . $social_border_color . '; }';
		
		if ($social_border_hover_color != "") $icons_style .= '#brankic_social_share.social-bookmarks a:hover:after { border-color: ' . $social_border_hover_color . '; }';


	
	wp_add_inline_style( 'myriadwp-brankic-style', $icons_style );
	

// END OF SHARE ICONS OPTIONS	


	// inline styling for headers
	
	
	$header_style =  brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
	$default_header_3lines_overlay =  brankic_of_get_option("default_header_3lines_overlay", brankic_of_get_default("default_header_3lines_overlay"));
	$default_header_layout =  brankic_of_get_option("default_header_layout", brankic_of_get_default("default_header_layout"));
	
		$default_header_gradient_background =  brankic_of_get_option("default_header_gradient_background", brankic_of_get_default("default_header_gradient_background"));
		
		$default_header_bg_color =  brankic_of_get_option("default_header_bg_color", brankic_of_get_default("default_header_bg_color")); 
		$default_header_bg_color_opacity =  brankic_of_get_option("default_header_bg_color_opacity", brankic_of_get_default("default_header_bg_color_opacity")); 
		
		
		$lateral_style = "";
		$default_header_style = "";
		if ($default_header_gradient_background == "yes") {
			
			$default_header_gradient_direction =  brankic_of_get_option("default_header_gradient_direction", brankic_of_get_default("default_header_gradient_direction"));
			$default_header_gradient_color_2 =  brankic_of_get_option("default_header_gradient_color_2", brankic_of_get_default("default_header_gradient_color_2"));
			$default_header_gradient_color_3 =  brankic_of_get_option("default_header_gradient_color_3", brankic_of_get_default("default_header_gradient_color_3"));
			$default_header_gradient_color_4 =  brankic_of_get_option("default_header_gradient_color_4", brankic_of_get_default("default_header_gradient_color_4"));
			if ($default_header_gradient_direction == "ellipse farthest-corner at center") $direction = "radial-gradient"; else $direction = "linear-gradient";

			if ($default_header_gradient_color_3 == "" && $default_header_gradient_color_4 == "") {
				$lateral_style .= '.lateral.lateral_left .row-bg.background-color, .lateral-toggle .row-bg.background-color {background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ');opacity:' . $default_header_bg_color_opacity . ';}';
				$default_header_style .= '.header_default:after, .header.header_default.fixed-default:not(.visible-viewport) .menu-default:not(.advanced):after, .header.header_default.fixed-advanced:not(.visible-viewport):not([data-header-adv_bg_color="true"]) .menu-default.advanced:after {background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ');opacity:' . $default_header_bg_color_opacity . ';}';
			}
			if ($default_header_gradient_color_3 != "" && $default_header_gradient_color_4 == "") {
				$lateral_style .= '.lateral.lateral_left .row-bg.background-color, .lateral-toggle .row-bg.background-color {background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ', ' . $default_header_gradient_color_3 . ');opacity:' . $default_header_bg_color_opacity . ';}';
				$default_header_style .= '.header_default:after, .header.header_default.fixed-default:not(.visible-viewport) .menu-default:not(.advanced):after, .header.header_default.fixed-advanced:not(.visible-viewport):not([data-header-adv_bg_color="true"]) .menu-default.advanced:after{background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ', ' . $default_header_gradient_color_3 . ');opacity:' . $default_header_bg_color_opacity . ';}';
			}
			if ($default_header_gradient_color_3 != "" && $default_header_gradient_color_4 != "") {
				$lateral_style .= '.lateral.lateral_left .row-bg.background-color, .lateral-toggle .row-bg.background-color {background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ', ' . $default_header_gradient_color_3 . ', ' . $default_header_gradient_color_4 . ');opacity:' . $default_header_bg_color_opacity . ';}';
				$default_header_style .= '.header_default:after, .header.header_default.fixed-default:not(.visible-viewport) .menu-default:not(.advanced):after, .header.header_default.fixed-advanced:not(.visible-viewport):not([data-header-adv_bg_color="true"]) .menu-default.advanced:after {background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ', ' . $default_header_gradient_color_3 . ', ' . $default_header_gradient_color_4 . ');opacity:' . $default_header_bg_color_opacity . ';}';
			}
			
			
		} else {
			if ($default_header_bg_color != "") $lateral_style .= '.lateral.lateral_left .row-bg.background-color, .lateral-toggle .row-bg.background-color {background: ' . $default_header_bg_color . ';}';
			if ($default_header_bg_color_opacity != "") $lateral_style .= '.lateral.lateral_left .row-bg.background-color, .lateral-toggle .row-bg.background-color {opacity:' . $default_header_bg_color_opacity . ';}';
			if ($default_header_bg_color != "") $default_header_style .= '.header_default:after, .header.header_default.fixed-default:not(.visible-viewport) .menu-default:not(.advanced):after, .header.header_default.fixed-advanced:not(.visible-viewport):not([data-header-adv_bg_color="true"]) .menu-default.advanced:after {background: ' . $default_header_bg_color . ';}';
			if ($default_header_bg_color_opacity != "") $default_header_style .= '.header_default:after, .header.header_default.fixed-default:not(.visible-viewport) .menu-default:not(.advanced):after, .header.header_default.fixed-advanced:not(.visible-viewport):not([data-header-adv_bg_color="true"]) .menu-default.advanced:after {opacity:' . $default_header_bg_color_opacity . ';}';
		}
		
		
		if ($default_header_3lines_overlay == "lateral-toggle-top-hidden" && substr_count($default_header_layout, "3") > 0){
			if ($default_header_bg_color != "") $default_header_style .= '.header_default:after {background: none;}';
			if ($default_header_bg_color != "") $default_header_style .= '.header_default .main-container:after {background: ' . $default_header_bg_color . ';}';
			
			if ($default_header_gradient_background == "yes"){
				if ($default_header_gradient_color_3 == "" && $default_header_gradient_color_4 == "") {
					$default_header_style .= '.header_default .main-container:after {background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ');opacity:' . $default_header_bg_color_opacity . ';}';
				}
				if ($default_header_gradient_color_3 != "" && $default_header_gradient_color_4 == "") {
					$default_header_style .= '.header_default .main-container:after {background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ', ' . $default_header_gradient_color_3 . ');opacity:' . $default_header_bg_color_opacity . ';}';
				}
				if ($default_header_gradient_color_3 != "" && $default_header_gradient_color_4 != "") {
					$default_header_style = '.header_default .main-container:after {background: ' . $direction . '(' . $default_header_gradient_direction . ', ' . $default_header_bg_color . ' , ' . $default_header_gradient_color_2 . ', ' . $default_header_gradient_color_3 . ', ' . $default_header_gradient_color_4 . ');opacity:' . $default_header_bg_color_opacity . ';}';
				}
			}
			
			
			
			
			
		}
		
		$extra_header_menu_position =  brankic_of_get_option("extra_header_menu_position", brankic_of_get_default("extra_header_menu_position"));
		$extra_header_style = "";
		
		
		if ( ($extra_header_layout == "www" || $extra_header_layout == "ww" || $extra_header_layout == "w" )){
		
			$extra_header_gradient_background =  brankic_of_get_option("extra_header_gradient_background", brankic_of_get_default("extra_header_gradient_background"));
			$extra_header_bg_color_opacity =  brankic_of_get_option("extra_header_bg_color_opacity", brankic_of_get_default("extra_header_bg_color_opacity"));
			$extra_header_bg_color =  brankic_of_get_option("extra_header_bg_color", brankic_of_get_default("extra_header_bg_color"));
			
			$extra_header_font_color =  brankic_of_get_option("extra_header_font_color", brankic_of_get_default("extra_header_font_color"));
			$extra_header_hover_font_color =  brankic_of_get_option("extra_header_hover_font_color", brankic_of_get_default("extra_header_hover_font_color"));
			
			if ($extra_header_font_color != "") {
					$extra_header_style .= '.menu-default.advanced, .menu-default.advanced a:not([data-bg-color="true"]){color:' . $extra_header_font_color . ';}';
			}
			
			if ($extra_header_hover_font_color != "") {
					$extra_header_style .= '.menu-default.advanced a:hover:not([data-bg-color="true"]){color:' . $extra_header_hover_font_color . ';}';
			}
			
			
			if ($extra_header_gradient_background == "yes") {
			
				$extra_header_gradient_direction =  brankic_of_get_option("extra_header_gradient_direction", brankic_of_get_default("extra_header_gradient_direction"));
				$extra_header_gradient_color_2 =  brankic_of_get_option("extra_header_gradient_color_2", brankic_of_get_default("extra_header_gradient_color_2"));
				$extra_header_gradient_color_3 =  brankic_of_get_option("extra_header_gradient_color_3", brankic_of_get_default("extra_header_gradient_color_3"));
				$extra_header_gradient_color_4 =  brankic_of_get_option("extra_header_gradient_color_4", brankic_of_get_default("extra_header_gradient_color_4"));
				if ($extra_header_gradient_direction == "ellipse farthest-corner at center") $direction = "radial-gradient"; else $direction = "linear-gradient";

				if ($extra_header_gradient_color_3 == "" && $extra_header_gradient_color_4 == "") {
					$extra_header_style .= '.only_extra_header_above_no_logo .row-bg.background-color, .only_extra_header_below_no_logo .row-bg.background-color{background: ' . $direction . '(' . $extra_header_gradient_direction . ', ' . $extra_header_bg_color . ' , ' . $extra_header_gradient_color_2 . ');opacity:' . $extra_header_bg_color_opacity . ';}';
				}
				if ($extra_header_gradient_color_3 != "" && $extra_header_gradient_color_4 == "") {
					$extra_header_style .= '.only_extra_header_above_no_logo .row-bg.background-color, .only_extra_header_below_no_logo .row-bg.background-color{background: ' . $direction . '(' . $extra_header_gradient_direction . ', ' . $extra_header_bg_color . ' , ' . $extra_header_gradient_color_2 . ', ' . $extra_header_gradient_color_3 . ');opacity:' . $extra_header_bg_color_opacity . ';}';
				}
				if ($extra_header_gradient_color_3 != "" && $extra_header_gradient_color_4 != "") {
					$extra_header_style .= '.only_extra_header_above_no_logo .row-bg.background-color, .only_extra_header_below_no_logo .row-bg.background-color {background: ' . $direction . '(' . $extra_header_gradient_direction . ', ' . $extra_header_bg_color . ' , ' . $extra_header_gradient_color_2 . ', ' . $extra_header_gradient_color_3 . ', ' . $extra_header_gradient_color_4 . ');opacity:' . $extra_header_bg_color_opacity . ';}';
				}
				
				
			} else {
				if ($extra_header_bg_color != "") $extra_header_style .= '.only_extra_header_above_no_logo .row-bg.background-color, .only_extra_header_below_no_logo .row-bg.background-color {background: ' . $extra_header_bg_color . ';}';
				if ($extra_header_bg_color_opacity != "") $extra_header_style .= '.only_extra_header_above_no_logo .row-bg.background-color, .only_extra_header_below_no_logo .row-bg.background-color {opacity:' . $extra_header_bg_color_opacity . ';}';
			}
			
			
			wp_add_inline_style( 'myriadwp-brankic-style', $extra_header_style );
		
		}
		
		
		
		
		
		
		$default_header_padding_top =  brankic_of_get_option("default_header_padding_top", brankic_of_get_default("default_header_padding_top"));
		$default_header_padding_bottom =  brankic_of_get_option("default_header_padding_bottom", brankic_of_get_default("default_header_padding_bottom"));
		$extra_header_padding_top =  brankic_of_get_option("extra_header_padding_top", brankic_of_get_default("extra_header_padding_top"));
		$extra_header_padding_bottom =  brankic_of_get_option("extra_header_padding_bottom", brankic_of_get_default("extra_header_padding_bottom"));
		
		$default_header_style .= '.header.header_default :not(.advanced) .menu_row_inner_wrapper>div{padding-top:' . $default_header_padding_top . ';padding-bottom:' . $default_header_padding_bottom . ';}';
		$default_header_style .= '.header.header_default .advanced .menu_row_inner_wrapper>div{padding-top:' . $extra_header_padding_top . ';padding-bottom:' . $extra_header_padding_bottom . ';}';
		
		$default_header_style .= '.header.header_default :not(.advanced) .menu_row_inner_wrapper>div{--padding-top:' . $default_header_padding_top . ';--padding-bottom:' . $default_header_padding_bottom . ';}';
		$default_header_style .= '.header.header_default .advanced .menu_row_inner_wrapper>div{--padding-top:' . $extra_header_padding_top . ';--padding-bottom:' . $extra_header_padding_bottom . ';}';
		
		
		$compact_default_header_on_scroll =  brankic_of_get_option("compact_default_header_on_scroll", brankic_of_get_default("compact_default_header_on_scroll"));
		
		if ($compact_default_header_on_scroll == "yes"){
			$compact_header_padding_top =  brankic_of_get_option("compact_header_padding_top", brankic_of_get_default("compact_header_padding_top"));
			$compact_header_padding_top_custom =  brankic_of_get_option("compact_header_padding_top_custom", brankic_of_get_default("compact_header_padding_top_custom"));
			$compact_header_padding_bottom =  brankic_of_get_option("compact_header_padding_bottom", brankic_of_get_default("compact_header_padding_bottom"));
			$compact_header_padding_bottom_custom =  brankic_of_get_option("compact_header_padding_bottom_custom", brankic_of_get_default("compact_header_padding_bottom_custom"));

			if ($compact_header_padding_top == "custom") $compact_header_padding_top = $compact_header_padding_top_custom;
			if ($compact_header_padding_bottom == "custom") $compact_header_padding_bottom = $compact_header_padding_bottom_custom;
			
			if ($compact_header_padding_top != "" && $compact_header_padding_top != "none") $default_header_style .= '.header.compact .navbar-menu, .header.compact .navbar-logo, .header.compact .navbar-secondary{padding-top: ' . $compact_header_padding_top . '!important;--padding-top: ' . $compact_header_padding_top . '!important;}';
			if ($compact_header_padding_bottom != "" && $compact_header_padding_bottom != "none") $default_header_style .= '.header.compact .navbar-menu, .header.compact .navbar-logo, .header.compact .navbar-secondary {padding-bottom: ' . $compact_header_padding_bottom . '!important;--padding-bottom: ' . $compact_header_padding_bottom . '!important;}';
		}
		
		$default_header_padding_left_right =  brankic_of_get_option("default_header_padding_left_right", brankic_of_get_default("default_header_padding_left_right"));

		if ($default_header_padding_left_right != ""){
			$default_header_style .= '.header.header_default .row, .lateral-hidden-toggle-content.top .lateral-hidden-toggle-wrapper{padding-left: ' . $default_header_padding_left_right . ';padding-right: ' . $default_header_padding_left_right . ';}';		
			$default_header_style .= '.header.header_default .row, .lateral-hidden-toggle-content.top .lateral-hidden-toggle-wrapper{--padding-left: ' . $default_header_padding_left_right . ';--padding-right: ' . $default_header_padding_left_right . ';}';
		}
		
		// default header fonts
		
		$default_header_text_size =  brankic_of_get_option("default_header_text_size", brankic_of_get_default("default_header_text_size"));
		$header_font_transform =  brankic_of_get_option("header_font_transform", brankic_of_get_default("header_font_transform"));
		$default_header_text_weight =  brankic_of_get_option("default_header_text_weight", brankic_of_get_default("default_header_text_weight"));
		$default_header_text_line_height =  brankic_of_get_option("default_header_text_line_height", brankic_of_get_default("default_header_text_line_height"));
		$default_header_submenu_text_size =  brankic_of_get_option("default_header_submenu_text_size", brankic_of_get_default("default_header_submenu_text_size"));
		$header_submenu_font_transform =  brankic_of_get_option("header_submenu_font_transform", brankic_of_get_default("header_submenu_font_transform"));
		$default_header_submenu_text_weight =  brankic_of_get_option("default_header_submenu_text_weight", brankic_of_get_default("default_header_submenu_text_weight"));
		$default_header_submenu_text_line_height =  brankic_of_get_option("default_header_submenu_text_line_height", brankic_of_get_default("default_header_submenu_text_line_height"));
		
		$default_header_style .= '.header_default .main-menu li a, .cart-toggle-trigger{font-size:' . $default_header_text_size . ';}';
		$default_header_style .= '.header_default .main-menu li a, .cart-toggle-trigger{font-weight:' . $default_header_text_weight . ';}';
		$default_header_style .= '.header_default .main-menu li a{text-transform:' . $header_font_transform . ';}';
		if ($default_header_text_line_height != "") $default_header_style .= '.header_default .main-menu li a, .cart-toggle-trigger{line-height:' . $default_header_text_line_height . ';}';
		
		$lateral_style .= 'header.lateral.lateral_left .lateral-wrapper .lateral-menu.slinky-menu a, .cart-toggle-trigger{font-size:' . $default_header_text_size . ';}';
		$lateral_style .= 'header.lateral.lateral_left .lateral-wrapper .lateral-menu.slinky-menu a, .cart-toggle-trigger{font-weight:' . $default_header_text_weight . ';}';
		$lateral_style .= '.lateral .lateral-wrapper .lateral-menu.slinky-menu a{text-transform:' . $header_font_transform . ';}';
		if ($default_header_text_line_height != "") $lateral_style .= 'header.lateral.lateral_left .lateral-wrapper .lateral-menu.slinky-menu a, .cart-toggle-trigger{line-height:' . $default_header_text_line_height . ';}';
		
		
		if ($default_header_submenu_text_size != "") $default_header_style .= '.header_default .main-menu .sub-menu li a{font-size:' . $default_header_submenu_text_size . ';}';
		if ($default_header_submenu_text_weight != "") $default_header_style .= '.header_default .main-menu .sub-menu li a{font-weight:' . $default_header_submenu_text_weight . ';}';
		if ($header_submenu_font_transform != "") $default_header_style .= '.header_default .main-menu .sub-menu li a{text-transform:' . $header_submenu_font_transform . ';}';
		if ($default_header_submenu_text_line_height != "") $default_header_style .= '.header_default .main-menu .sub-menu li a{line-height:' . $default_header_submenu_text_line_height . ';}';

		if ($header_style == "lateral-left" || $header_style == "lateral-toggle-left" || $header_style == "lateral-toggle-flex") wp_add_inline_style( 'myriadwp-brankic-style', $lateral_style );
		if ($header_style == "default") wp_add_inline_style( 'myriadwp-brankic-style', $default_header_style );
		
	
		// body border
		$body_border =  brankic_of_get_option("body_border", brankic_of_get_default("body_border"));
		$body_side_border =  brankic_of_get_option("body_side_border", brankic_of_get_default("body_side_border"));
		
		if ($body_border == "yes" || $body_side_border == "yes"){
			$body_border_color =  brankic_of_get_option("body_border_color", brankic_of_get_default("body_border_color"));
			$body_border_width =  brankic_of_get_option("body_border_width", brankic_of_get_default("body_border_width"));
			$body_border_css = '.wrapper-holder[data-site-border="true"], .wrapper-holder[data-side-border="true"] {--border-color: ' . $body_border_color . ';}';
			wp_add_inline_style( 'myriadwp-brankic-style', $body_border_css );
		}
		
		
		$overlay_menu_menu_text_size =  brankic_of_get_option("overlay_menu_menu_text_size", brankic_of_get_default("overlay_menu_menu_text_size"));
		$overlay_menu_menu_text_size_custom =  brankic_of_get_option("overlay_menu_menu_text_size_custom", brankic_of_get_default("overlay_menu_menu_text_size_custom"));
		

		if ($overlay_menu_menu_text_size_custom == "") $overlay_menu_text_size_style = '.lateral-hidden-toggle-menu.slinky-menu a, .lateral-toggle-content .lateral-toggle-menu.slinky-menu a, .menu-flex li a, #menu-overlay .slinky-menu a, .menu-flow .swiper-slide a, .page-stack-menu a, .lateral .lateral-wrapper .lateral-menu.slinky-menu a{font-size:' . $overlay_menu_menu_text_size .';}';
		else $overlay_menu_text_size_style = '.lateral-hidden-toggle-menu.slinky-menu a, .lateral-toggle-content .lateral-toggle-menu.slinky-menu a, .menu-flex li a, #menu-overlay .slinky-menu a, .menu-flow .swiper-slide a, .page-stack-menu a, .lateral .lateral-wrapper .lateral-menu.slinky-menu a{font-size:' . $overlay_menu_menu_text_size_custom .';}';
		wp_add_inline_style( 'myriadwp-brankic-style', $overlay_menu_text_size_style );
		
		$overlay_menu_bg_color =  brankic_of_get_option("overlay_menu_bg_color", brankic_of_get_default("overlay_menu_bg_color")); 
		$overlay_menu_bg_color_opacity =  brankic_of_get_option("overlay_menu_bg_color_opacity", brankic_of_get_default("overlay_menu_bg_color_opacity")); 
		$overlay_menu_bg_color_hover =  brankic_of_get_option("overlay_menu_bg_color_hover", brankic_of_get_default("overlay_menu_bg_color_hover")); 
		$overlay_menu_bg_color_hover_opacity =  brankic_of_get_option("overlay_menu_bg_color_hover_opacity", brankic_of_get_default("overlay_menu_bg_color_hover_opacity"));

		
		$overlay_menu_gradient_background =  brankic_of_get_option("overlay_menu_gradient_background", brankic_of_get_default("overlay_menu_gradient_background"));
		
		$overlay_bg_style = "";
		
		if ($overlay_menu_bg_color != "") $overlay_bg_style = '{background: ' . $overlay_menu_bg_color . ';}';
		
		if ($overlay_menu_gradient_background == "yes") {
			
			$overlay_menu_gradient_direction =  brankic_of_get_option("overlay_menu_gradient_direction", brankic_of_get_default("overlay_menu_gradient_direction"));
			$overlay_menu_bg_color_gradient_color_2 =  brankic_of_get_option("overlay_menu_bg_color_gradient_color_2", brankic_of_get_default("overlay_menu_bg_color_gradient_color_2"));
			$overlay_menu_bg_color_gradient_color_3 =  brankic_of_get_option("overlay_menu_bg_color_gradient_color_3", brankic_of_get_default("overlay_menu_bg_color_gradient_color_3"));
			$overlay_menu_bg_color_gradient_color_4 =  brankic_of_get_option("overlay_menu_bg_color_gradient_color_4", brankic_of_get_default("overlay_menu_bg_color_gradient_color_4"));
			
			if ($overlay_menu_gradient_direction == "ellipse farthest-corner at center") $direction = "radial-gradient"; else $direction = "linear-gradient";
			
			if ($overlay_menu_bg_color_gradient_color_3 == "" && $overlay_menu_bg_color_gradient_color_4 == "") {
				$overlay_bg_style = '{background: ' . $direction . '(' . $overlay_menu_gradient_direction . ', ' . $overlay_menu_bg_color . ' , ' . $overlay_menu_bg_color_gradient_color_2 . ');}';
			}
			if ($overlay_menu_bg_color_gradient_color_3 != "" && $overlay_menu_bg_color_gradient_color_4 == "") {
				$overlay_bg_style = '{background: ' . $direction . '(' . $overlay_menu_gradient_direction . ', ' . $overlay_menu_bg_color . ' , ' . $overlay_menu_bg_color_gradient_color_2 . ', ' . $overlay_menu_bg_color_gradient_color_3 . ');}';
			}
			if ($overlay_menu_bg_color_gradient_color_3 != "" && $overlay_menu_bg_color_gradient_color_4 != "") {
				$overlay_bg_style = '{background: ' . $direction . '(' . $overlay_menu_gradient_direction . ', ' . $overlay_menu_bg_color . ' , ' . $overlay_menu_bg_color_gradient_color_2 . ', ' . $overlay_menu_bg_color_gradient_color_3 . ', ' . $overlay_menu_bg_color_gradient_color_4 . ');}';	
			}
			
		}
		
		$overlay_menu_font_color =  brankic_of_get_option("overlay_menu_font_color", brankic_of_get_default("overlay_menu_font_color"));
		$overlay_menu_link_color =  brankic_of_get_option("overlay_menu_link_color", brankic_of_get_default("overlay_menu_link_color"));
		$overlay_menu_link_hover_color =  brankic_of_get_option("overlay_menu_link_hover_color", brankic_of_get_default("overlay_menu_link_hover_color"));
		
		$overlay_menu_widget_style = "";
		if ($overlay_menu_font_color != "") $overlay_menu_widget_style .=  '.menu-overlay-content .menu-overlay-wrapper, .lateral-hidden-toggle-wrapper, .lateral-toggle-content{color:' . $overlay_menu_font_color . '}';
		if ($overlay_menu_link_color != "") $overlay_menu_widget_style .=  '.menu-overlay-content .menu-overlay-wrapper a, .lateral-hidden-toggle-wrapper a, .lateral-toggle-content a{color:' . $overlay_menu_link_color . '}';
		if ($overlay_menu_link_hover_color != "") $overlay_menu_widget_style .=  '.menu-overlay-content .menu-overlay-wrapper a:hover, .lateral-hidden-toggle-wrapper a:hover, .lateral-toggle-content a:hover{color:' . $overlay_menu_link_hover_color . '}';
		
		wp_add_inline_style( 'myriadwp-brankic-style', $overlay_menu_widget_style );
		
		
		$overlay_style = "";
		
		if ($overlay_bg_style != "") $overlay_style .= '.lateral-toggle-content .row-bg.background-color' . $overlay_bg_style ;
		if ($overlay_menu_bg_color_opacity != "") $overlay_style .= '.lateral-toggle-content .row-bg.background-color {opacity:' . $overlay_menu_bg_color_opacity . ';}';
			
		if ($header_style == "lateral-toggle-left") {
			
			wp_add_inline_style( 'myriadwp-brankic-style', $overlay_style );
		}
		
		if ($header_style == "default" && ($default_header_layout == "l3w" || $default_header_layout == "3lw" || $default_header_layout == "wl3" || $default_header_layout == "3l" || $default_header_layout == "l3") && $default_header_3lines_overlay == "flow") {
			if ($overlay_bg_style != "") $overlay_style .= '#menu-overlay.menu-flow .row-bg.background-color' . $overlay_bg_style ;
			if ($overlay_menu_bg_color_opacity != "") $overlay_style .= '#menu-overlay.menu-flow .row-bg.background-color {opacity:' . $overlay_menu_bg_color_opacity . ';}';
			wp_add_inline_style( 'myriadwp-brankic-style', $overlay_style );
			
			
			wp_enqueue_script('jquery-swiperslider');
			$inline_script = 'jQuery(window).load(function($){
					var current_order = jQuery("#carousel-menu .current-menu-item").prevAll().length - 1;
					var $swiperSlider = jQuery("#carousel-menu");
					var swiperOptions = {
						speed: 300,
						initialSlide: current_order,
						slidesPerView: "auto",
						keyboard: {
							enabled: true,
						 },
						mousewheel: {
							invert: true,
						},
						freeMode: true,
					}
					var mySwiper = new Swiper ($swiperSlider, swiperOptions);

					jQuery("#carousel-menu .swiper-slide a").on("mouseenter", function() {
						jQuery("#carousel-menu .swiper-slide a").addClass("disable");
						jQuery(this).removeClass("disable");	
					}).on("mouseleave", function() {
						jQuery("#carousel-menu .swiper-slide a").removeClass("disable");
					}); 
					
			})';
			wp_add_inline_script( 'jquery-swiperslider', $inline_script );
		}
		
		
		$archive_wow_effect = brankic_of_get_option("archive_wow_effect", brankic_of_get_default("archive_wow_effect"));
		if ($archive_wow_effect != "none") {
			
			wp_register_script( 'myriadwp-wow', get_theme_file_uri( '/javascript/wow.min.js'), array('jquery'), '1.0.0', true );
			wp_enqueue_script( 'myriadwp-wow');
			wp_enqueue_style( 'myriadwp-animate', get_theme_file_uri( '/css/animate.min.css' ));
			$wow_script = 'jQuery(document).ready(function($) {
				new WOW().init();
			});';
			wp_add_inline_script( 'myriadwp-wow', $wow_script );
		}
		
		if ($header_style == "default" && $default_header_3lines_overlay == "overlay-bg-image") {
			if ($overlay_bg_style != "") $overlay_style .= '#menu-bg-image-overlay-static .row-bg.background-color' . $overlay_bg_style ;
			if ($overlay_menu_bg_color_opacity != "") $overlay_style .= '#menu-bg-image-overlay-static .row-bg.background-color {opacity:' . $overlay_menu_bg_color_opacity . ';}';
			if ($overlay_menu_bg_color != "") $overlay_style .= '#header_overlay_background_image_holder .row-bg.background-color {background-color:' . $overlay_menu_bg_color . ';}';
			if ($overlay_menu_bg_color_hover_opacity != "") $overlay_style .= '#header_overlay_background_image_holder .row-bg.background-color {opacity:' . $overlay_menu_bg_color_hover_opacity . ';}';
			wp_add_inline_style( 'myriadwp-brankic-style', $overlay_style );
		}
		
		if ($header_style == "default" && $default_header_3lines_overlay == "overlay-bg-color") {
			if ($overlay_bg_style != "") $overlay_style .= '#menu-overlay.menu-bg-color-overlay .row-bg.background-color' . $overlay_bg_style ;
			if ($overlay_menu_bg_color_opacity != "") $overlay_style .= '#menu-overlay.menu-bg-color-overlay .row-bg.background-color {opacity:' . $overlay_menu_bg_color_opacity . ';}';
			
			$overlay_bg_hover_hover_colors = brankic_of_get_option("overlay_bg_hover_hover_colors", brankic_of_get_default("overlay_bg_hover_hover_colors"));
			$bg_colors = explode(",", $overlay_bg_hover_hover_colors);
				
			$no_of_colors = count($bg_colors);
			
			for ($i = 0 ; $i < $no_of_colors ; $i++) {
				$j = $i + 1;
				if ($bg_colors[$i] != "") $overlay_style .= '#header_overlay_background_image_holder .background-image:nth-child(' . $no_of_colors . 'n+' . $j . ') {background:' . $bg_colors[$i] . '}';
			}
			wp_add_inline_style( 'myriadwp-brankic-style', $overlay_style );
		}
		
		if ($header_style == "default" && ($default_header_3lines_overlay == "lateral-toggle-right-hidden" || $default_header_3lines_overlay == "lateral-toggle-left-hidden"|| $default_header_3lines_overlay == "lateral-toggle-top-hidden")) {
			if ($overlay_bg_style != "") $overlay_style .= '#lateral-hidden-toggle.lateral-hidden-toggle-content .row-bg.background-color' . $overlay_bg_style ;
			if ($overlay_menu_bg_color_opacity != "") $overlay_style .= '#lateral-hidden-toggle.lateral-hidden-toggle-content .row-bg.background-color {opacity:' . $overlay_menu_bg_color_opacity . ';}';
			wp_add_inline_style( 'myriadwp-brankic-style', $overlay_style );
		}
		
		if ($header_style == "default" && $default_header_3lines_overlay == "stack") {
			if ($overlay_bg_style != "") $overlay_style .= '.page-stack-content .row-bg.background-color' . $overlay_bg_style ;
			if ($overlay_menu_bg_color_opacity != "") $overlay_style .= '.page-stack-content .row-bg.background-color {opacity:' . $overlay_menu_bg_color_opacity . ';}';
			wp_add_inline_style( 'myriadwp-brankic-style', $overlay_style );
		}
		
		if ($header_style == "lateral-toggle-flex") {
						
			if ($overlay_bg_style != "") $overlay_style .= '.menu-flex li a:after' . $overlay_bg_style ;
			if ($overlay_menu_bg_color_opacity != "") $overlay_style .= '.menu-flex li a:after {opacity:' . $overlay_menu_bg_color_opacity . ';}';
			
			if ($overlay_menu_bg_color_hover != "") $overlay_style .= '.menu-flex li:hover a:after{background-color:' . $overlay_menu_bg_color_hover . ';}' ;
			if ($overlay_menu_bg_color_hover_opacity != "") $overlay_style .= '.menu-flex li:hover a:after{opacity:' . $overlay_menu_bg_color_hover_opacity . ';}' ;
		
			wp_add_inline_style( 'myriadwp-brankic-style', $overlay_style );
		}
		
		$default_header_bg_image_style = brankic_of_get_option("default_header_bg_image_style", brankic_of_get_default("default_header_bg_image_style"));
		$extra_header_bg_image = brankic_of_get_option("extra_header_bg_image", brankic_of_get_default("extra_header_bg_image"));
				
		$default_header_bg_image_style_css = $extra_header_bg_image_style_css = "";		
		
		if ($header_style == "lateral-left") {		
			if ($default_header_bg_image_style == "cover") $default_header_bg_image_style_css .= '.lateral.lateral_left .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($default_header_bg_image_style == "contain") $default_header_bg_image_style_css .= '.lateral.lateral_left .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($default_header_bg_image_style == "no_repeat") $default_header_bg_image_style_css .= '.lateral.lateral_left .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($default_header_bg_image_style == "repeat") $default_header_bg_image_style_css .= '.lateral.lateral_left .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';
		}
		
		if ($header_style == "lateral-toggle-left") {		
			if ($default_header_bg_image_style == "cover") $default_header_bg_image_style_css .= '#lateral-toggle-left .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($default_header_bg_image_style == "contain") $default_header_bg_image_style_css .= '#lateral-toggle-left .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($default_header_bg_image_style == "no_repeat") $default_header_bg_image_style_css .= '#lateral-toggle-left .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($default_header_bg_image_style == "repeat") $default_header_bg_image_style_css .= '#lateral-toggle-left .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';
		}
	
		if ($header_style == "lateral-toggle-flex") {		
			if ($default_header_bg_image_style == "cover") $default_header_bg_image_style_css .= '#lateral-toggle-flex .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($default_header_bg_image_style == "contain") $default_header_bg_image_style_css .= '#lateral-toggle-flex .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($default_header_bg_image_style == "no_repeat") $default_header_bg_image_style_css .= '#lateral-toggle-flex .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($default_header_bg_image_style == "repeat") $default_header_bg_image_style_css .= '#lateral-toggle-flex .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';
		}
		
		if ($header_style == "default" && $extra_header_bg_image != "") {
			
			$extra_header_bg_image_size = brankic_of_get_option("extra_header_bg_image_size", brankic_of_get_default("extra_header_bg_image_size"));
			$extra_header_bg_image_position = brankic_of_get_option("extra_header_bg_image_position", brankic_of_get_default("extra_header_bg_image_position"));
			$extra_header_bg_image_repeat = brankic_of_get_option("extra_header_bg_image_repeat", brankic_of_get_default("extra_header_bg_image_repeat"));

			$extra_header_bg_image_style_css .= '.only_extra_header_above_no_logo .row-bg.background-image, .only_extra_header_below_no_logo .row-bg.background-image{background-image:url(' . $extra_header_bg_image . ');background-position: ' . $extra_header_bg_image_position . ' !important;background-repeat: ' . $extra_header_bg_image_repeat . ' !important;background-size: ' . $extra_header_bg_image_size . ' !important;}';					
		}
		
		if ($header_style == "default") {	

			$default_header_submenu_css = "";		
			$default_header_submenu_background_color =  brankic_of_get_option("default_header_submenu_background_color", brankic_of_get_default("default_header_submenu_background_color"));
			$default_header_submenu_font_color =  brankic_of_get_option("default_header_submenu_font_color", brankic_of_get_default("default_header_submenu_font_color"));
			$default_header_submenu_font_hover_color =  brankic_of_get_option("default_header_submenu_font_hover_color", brankic_of_get_default("default_header_submenu_font_hover_color"));
			if ($default_header_submenu_font_color != "") $default_header_submenu_css .= '.main-menu .sub-menu a, .default_menu_mini_cart, .cart-content .widget_shopping_cart_content .product_list_widget li a.remove{color:' . $default_header_submenu_font_color . '!important;}';
			if ($default_header_submenu_font_hover_color != "") $default_header_submenu_css .= '.main-menu .sub-menu a:hover, 
																							.default_menu_mini_cart a:hover,
																							.main-menu[class*="submenu-"] li ul li.current-menu-ancestor > a,
																							.main-menu[class*="submenu-"] li ul li.current-menu-parent > a, 
																							.main-menu[class*="submenu-"] li ul li.current-menu-item > a,
																							.main-menu[class*="submenu-"] li ul li.sfHover:hover > a,
																							.main-menu[class*="submenu-"] li.megamenu ul li > a.sf-with-ul,
																							.cart-content .widget_shopping_cart_content .product_list_widget li a.remove:hover{color:' . $default_header_submenu_font_hover_color . '!important;}';
			if ($default_header_submenu_background_color != "") $default_header_submenu_css .= '.main-menu .sub-menu, .default_menu_mini_cart {background-color:' . $default_header_submenu_background_color . ';}';
			
			wp_add_inline_style( 'myriadwp-brankic-style', $default_header_submenu_css );
		}
		
		
		$overlay_menu_bg_image_style = brankic_of_get_option("overlay_menu_bg_image_style", brankic_of_get_default("overlay_menu_bg_image_style"));
		
		$overlay_menu_bg_image_style_css = "";		
		
		if ($header_style == "lateral-toggle-left") {		
			if ($overlay_menu_bg_image_style == "cover") $overlay_menu_bg_image_style_css .= '#lateral-toggle .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($overlay_menu_bg_image_style == "contain") $overlay_menu_bg_image_style_css .= '#lateral-toggle .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($overlay_menu_bg_image_style == "no_repeat") $overlay_menu_bg_image_style_css .= '#lateral-toggle .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($overlay_menu_bg_image_style == "repeat") $overlay_menu_bg_image_style_css .= '#lateral-toggle .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';
		}
		
		if ($default_header_3lines_overlay == "flow"){
			if ($overlay_menu_bg_image_style == "cover") $overlay_menu_bg_image_style_css .= '#menu-overlay .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($overlay_menu_bg_image_style == "contain") $overlay_menu_bg_image_style_css .= '#menu-overlay .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($overlay_menu_bg_image_style == "no_repeat") $overlay_menu_bg_image_style_css .= '#menu-overlay .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($overlay_menu_bg_image_style == "repeat") $overlay_menu_bg_image_style_css .= '#menu-overlay .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';			
		}
		
		if ($default_header_3lines_overlay == "overlay-bg-image"){
			if ($overlay_menu_bg_image_style == "cover") $overlay_menu_bg_image_style_css .= '#menu-bg-image-overlay-static .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($overlay_menu_bg_image_style == "contain") $overlay_menu_bg_image_style_css .= '#menu-bg-image-overlay-static .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($overlay_menu_bg_image_style == "no_repeat") $overlay_menu_bg_image_style_css .= '#menu-bg-image-overlay-static .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($overlay_menu_bg_image_style == "repeat") $overlay_menu_bg_image_style_css .= '#menu-bg-image-overlay-static .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';			
		}
		
		if ($default_header_3lines_overlay == "overlay-bg-color"){
			if ($overlay_menu_bg_image_style == "cover") $overlay_menu_bg_image_style_css .= '#menu-overlay .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($overlay_menu_bg_image_style == "contain") $overlay_menu_bg_image_style_css .= '#menu-overlay .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($overlay_menu_bg_image_style == "no_repeat") $overlay_menu_bg_image_style_css .= '#menu-overlay .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($overlay_menu_bg_image_style == "repeat") $overlay_menu_bg_image_style_css .= '#menu-overlay .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';			
		}
		
		if ($default_header_3lines_overlay == "lateral-toggle-right-hidden" || $default_header_3lines_overlay == "lateral-toggle-left-hidden"){
			if ($overlay_menu_bg_image_style == "cover") $overlay_menu_bg_image_style_css .= '#lateral-hidden-toggle .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($overlay_menu_bg_image_style == "contain") $overlay_menu_bg_image_style_css .= '#lateral-hidden-toggle .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($overlay_menu_bg_image_style == "no_repeat") $overlay_menu_bg_image_style_css .= '#lateral-hidden-toggle .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($overlay_menu_bg_image_style == "repeat") $overlay_menu_bg_image_style_css .= '#lateral-hidden-toggle .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';			
		}
		
		if ($default_header_3lines_overlay == "lateral-toggle-top-hidden"){
			if ($overlay_menu_bg_image_style == "cover") $overlay_menu_bg_image_style_css .= '#lateral-hidden-toggle .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($overlay_menu_bg_image_style == "contain") $overlay_menu_bg_image_style_css .= '#lateral-hidden-toggle .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($overlay_menu_bg_image_style == "no_repeat") $overlay_menu_bg_image_style_css .= '#lateral-hidden-toggle .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($overlay_menu_bg_image_style == "repeat") $overlay_menu_bg_image_style_css .= '#lateral-hidden-toggle .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';			
		}

		if ($default_header_3lines_overlay == "stack"){
			if ($overlay_menu_bg_image_style == "cover") $overlay_menu_bg_image_style_css .= '.page-stack-content .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';					
			if ($overlay_menu_bg_image_style == "contain") $overlay_menu_bg_image_style_css .= '.page-stack-content .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';					
			if ($overlay_menu_bg_image_style == "no_repeat") $overlay_menu_bg_image_style_css .= '.page-stack-content .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';			
			if ($overlay_menu_bg_image_style == "repeat") $overlay_menu_bg_image_style_css .= '.page-stack-content .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';		
		}
		
		wp_add_inline_style( 'myriadwp-brankic-style', $overlay_menu_bg_image_style_css.$default_header_bg_image_style_css.$extra_header_bg_image_style_css );
		
		
		$default_header_menu_toggle =  brankic_of_get_option("default_header_menu_toggle", brankic_of_get_default("default_header_menu_toggle"));
		
		if ($header_style == "default" && ($default_header_layout == "lmw" || $default_header_layout == "mlw") && $default_header_menu_toggle == "yes"){
			
			$toggle_css = '.main-menu .menu-item:nth-child(1) a {
    transition: -webkit-transform 400ms 20ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 20ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 20ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 20ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(2) a {
    transition: -webkit-transform 400ms 40ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 40ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 40ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 40ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(3) a {
    transition: -webkit-transform 400ms 60ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 60ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 60ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 60ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(4) a {
    transition: -webkit-transform 400ms 80ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 80ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 80ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 80ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(5) a {
    transition: -webkit-transform 400ms 100ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 100ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 100ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 100ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(6) a {
    transition: -webkit-transform 400ms 120ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 120ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 120ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 120ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(7) a {
    transition: -webkit-transform 400ms 140ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 140ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 140ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 140ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(8) a {
    transition: -webkit-transform 400ms 160ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 160ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 160ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 160ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(9) a {
    transition: -webkit-transform 400ms 180ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 180ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 180ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 180ms cubic-bezier(0.7, 0, 0.3, 1); }
  .main-menu .menu-item:nth-child(10) a {
    transition: -webkit-transform 400ms 200ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 200ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 200ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 200ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active {
  top: 0;}
  .state-menu-active .menu-item:nth-child(1) a {
    transition: -webkit-transform 400ms 160ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 160ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 160ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 160ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(2) a {
    transition: -webkit-transform 400ms 220ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 220ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 220ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 220ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(3) a {
    transition: -webkit-transform 400ms 280ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 280ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 280ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 280ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(4) a {
    transition: -webkit-transform 400ms 340ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 340ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 340ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 340ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(5) a {
    transition: -webkit-transform 400ms 400ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 400ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 400ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 400ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(6) a {
    transition: -webkit-transform 400ms 460ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 460ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 460ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 460ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(7) a {
    transition: -webkit-transform 400ms 520ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 520ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 520ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 520ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(8) a {
    transition: -webkit-transform 400ms 580ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 580ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 580ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 580ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(9) a {
    transition: -webkit-transform 400ms 640ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 640ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 640ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 640ms cubic-bezier(0.7, 0, 0.3, 1); }
  .state-menu-active .menu-item:nth-child(10) a {
    transition: -webkit-transform 400ms 700ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 700ms cubic-bezier(0.7, 0, 0.3, 1);
    transition: transform 400ms 700ms cubic-bezier(0.7, 0, 0.3, 1), -webkit-transform 400ms 700ms cubic-bezier(0.7, 0, 0.3, 1); }

.state-menu-active .menu-item a {
    -webkit-transform: translateY(0);
            transform: translateY(0); }
			
.menu-item a {
    -webkit-transform: translateY(115%);
            transform: translateY(115%); }
.main-menu {overflow:hidden}';
			
			wp_add_inline_style( 'myriadwp-brankic-style', $toggle_css );
		}
		
		//search overlay
		$default_text_color = brankic_of_get_option("default_text_color", brankic_of_get_default("default_text_color")); 
		$default_content_bg_color =  brankic_global_or_local("default_content_bg_color");
		$search_overlay_css = "";
		if ($default_text_color != "") $search_overlay_css .= '#search-window {color:' . $default_text_color . '}';
		if ($default_content_bg_color != "") $search_overlay_css .= '#search-window .background-color-overlay {background-color:' . $default_content_bg_color . '!important}';
		wp_add_inline_style( 'myriadwp-brankic-style', $search_overlay_css );
		
		$main_content_css = "";
		if ($default_text_color != "") $main_content_css .= '.wrapper-holder>.main-container {color:' . $default_text_color . '}';
		if ($default_content_bg_color != "") $main_content_css .= '.wrapper-holder>.main-container{background-color:' . $default_content_bg_color . '}';
		wp_add_inline_style( 'myriadwp-brankic-style', $main_content_css );
		
		
		
		//footer styles
		$footer_css = "";
		$footer_width =  brankic_global_or_local("footer_width");
		if ($footer_width == "fullwidth") {
			$footer_css .= 'footer .row{max-width:none;}';
		} else {
			$footer_css .= 'footer .row{max-width:' . $footer_width . ';}';
			$footer_css .= 'footer .row{--max-width:' . $footer_width . ';}';
			if (function_exists("get_field")) {
				$override_footer_width = get_field("page_content_width");
				if ($override_footer_width != "fullwidth" && $override_footer_width != null && $override_footer_width != ""){
					$footer_css .= 'footer .row{max-width:' . $override_footer_width . ';}';
					$footer_css .= 'footer .row{--max-width:' . $override_footer_width . ';}';
				}
			}
		}
		
		$footer_bg_image = brankic_of_get_option("footer_bg_image", brankic_of_get_default("footer_bg_image"));
		
		$footer_2_wrap_with_footer_1 = brankic_of_get_option("footer_2_wrap_with_footer_1", brankic_of_get_default("footer_2_wrap_with_footer_1"));
		
		$footer_bg_color = brankic_of_get_option("footer_bg_color", brankic_of_get_default("footer_bg_color"));
		$footer_bg_color_opacity = brankic_of_get_option("footer_bg_color_opacity", brankic_of_get_default("footer_bg_color_opacity"));
		$footer_text_color = brankic_of_get_option("footer_text_color", brankic_of_get_default("footer_text_color"));
		$footer_link_color = brankic_of_get_option("footer_link_color", brankic_of_get_default("footer_link_color"));
		$footer_link_hover_color = brankic_of_get_option("footer_link_hover_color", brankic_of_get_default("footer_link_hover_color"));
		$footer_title_color = brankic_of_get_option("footer_title_color", brankic_of_get_default("footer_title_color"));
		$footer_2_bg_color = brankic_of_get_option("footer_2_bg_color", brankic_of_get_default("footer_2_bg_color"));
		$footer_2_bg_color_opacity = brankic_of_get_option("footer_2_bg_color_opacity", brankic_of_get_default("footer_2_bg_color_opacity"));
		$footer_2_text_color = brankic_of_get_option("footer_2_text_color", brankic_of_get_default("footer_2_text_color"));
		$footer_2_link_color = brankic_of_get_option("footer_2_link_color", brankic_of_get_default("footer_2_link_color"));
		$footer_2_link_hover_color = brankic_of_get_option("footer_2_link_hover_color", brankic_of_get_default("footer_2_link_hover_color"));
		$footer_2_title_color = brankic_of_get_option("footer_2_title_color", brankic_of_get_default("footer_2_title_color"));
		
		
		$footer_gradient_direction = brankic_of_get_option("footer_gradient_direction", brankic_of_get_default("footer_gradient_direction"));
		$footer_bg_color_2 = brankic_of_get_option("footer_bg_color_2", brankic_of_get_default("footer_bg_color_2"));
		$footer_bg_color_3 = brankic_of_get_option("footer_bg_color_3", brankic_of_get_default("footer_bg_color_3"));
		$footer_2_gradient_direction = brankic_of_get_option("footer_2_gradient_direction", brankic_of_get_default("footer_2_gradient_direction"));
		$footer_2_bg_color_2 = brankic_of_get_option("footer_2_bg_color_2", brankic_of_get_default("footer_2_bg_color_2"));
		$footer_2_bg_color_3 = brankic_of_get_option("footer_2_bg_color_3", brankic_of_get_default("footer_2_bg_color_3"));
		
		$footer_title_font_family = brankic_of_get_option("footer_title_font_family", brankic_of_get_default("footer_title_font_family"));
		$footer_title_custom_font_family = brankic_of_get_option("footer_title_custom_font_family", brankic_of_get_default("footer_title_custom_font_family"));
		$footer_title_size = brankic_of_get_option("footer_title_size", brankic_of_get_default("footer_title_size"));
		$footer_title_size_custom = brankic_of_get_option("footer_title_size_custom", brankic_of_get_default("footer_title_size_custom"));
		$footer_title_weight = brankic_of_get_option("footer_title_weight", brankic_of_get_default("footer_title_weight"));
		$footer_title_style = brankic_of_get_option("footer_title_style", brankic_of_get_default("footer_title_style"));
		$footer_title_transform = brankic_of_get_option("footer_title_transform", brankic_of_get_default("footer_title_transform"));
		$footer_title_spacing = brankic_of_get_option("footer_title_spacing", brankic_of_get_default("footer_title_spacing"));
		$footer_title_height = brankic_of_get_option("footer_title_height", brankic_of_get_default("footer_title_height"));
		$footer_title_height_custom = brankic_of_get_option("footer_title_height_custom", brankic_of_get_default("footer_title_height_custom"));
		
		if ($footer_title_size_custom != "") $footer_title_size = $footer_title_size_custom;
		if ($footer_title_height_custom != "") $footer_title_height = $footer_title_height_custom;
		
		$footer_title_font_family_css = "";
		if ($footer_title_font_family != "") {
			$footer_title_font_family = brankic_check_font_family($footer_title_font_family);
			$footer_title_font_family_css = 'font-family:' . $footer_title_font_family;
		}
		
		$footer_title_css = 'footer .widget h6.title{' . $footer_title_font_family_css . ';font-size:' . $footer_title_size . ';font-weight:' . $footer_title_weight . ';font-style:' . $footer_title_style . ';text-transform:' . $footer_title_transform . ';letter-spacing:' . $footer_title_spacing . ';line-height:' . $footer_title_height . ';}';
		
		
		if ($footer_2_wrap_with_footer_1 == "yes" || $footer_2_wrap_with_footer_1 == "1") {
			
			if ( $footer_bg_image != "") {
			
				$footer_css .= '.row-bg-wrap.both_footers .row-bg.background-image{background-image:url(' . $footer_bg_image . ')}';
			
				$footer_bg_image_style = brankic_of_get_option("footer_bg_image_style", brankic_of_get_default("footer_bg_image_style"));
				
				if ($footer_bg_image_style == "cover") $footer_css .= '.row-bg-wrap.both_footers .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';
					
				if ($footer_bg_image_style == "contain") $footer_css .= '.row-bg-wrap.both_footers .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';
					
				if ($footer_bg_image_style == "no_repeat") $footer_css .= '.row-bg-wrap.both_footers .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';
					
				if ($footer_bg_image_style == 	"repeat") $footer_css .= '.row-bg-wrap.both_footers .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';
			
			}
			
			if ($footer_gradient_direction == "none") {
				if ($footer_bg_color != "") $footer_css .= '.row-bg-wrap.both_footers .row-bg.background-color{background-color:' . $footer_bg_color . '}';
			} else {
				if ($footer_gradient_direction == "ellipse farthest-corner at center") $direction = "radial-gradient"; else $direction = "linear-gradient";
				if ($footer_bg_color_2 != "" && $footer_bg_color_3 == "") $footer_css .= '.row-bg-wrap.both_footers .row-bg.background-color{background: ' . $direction . '(' . $footer_gradient_direction . ', ' . $footer_bg_color . ' , ' . $footer_bg_color_2 . ');}';
				if ($footer_bg_color_2 != "" && $footer_bg_color_3 != "") $footer_css .= '.row-bg-wrap.both_footers .row-bg.background-color{background: ' . $direction . '(' . $footer_gradient_direction . ', ' . $footer_bg_color . ' , ' . $footer_bg_color_2 . ', ' . $footer_bg_color_3 . ');}';			
			}
			
			if ($footer_bg_color_opacity != "") $footer_css .= '.row-bg-wrap.both_footers .row-bg.background-color{opacity:' . $footer_bg_color_opacity . '}';
			if ($footer_text_color != "") $footer_css .= 'footer .row-container{color:' . $footer_text_color . '}';
			if ($footer_link_color != "") $footer_css .= 'footer .row-container a{color:' . $footer_link_color . '}';
			if ($footer_link_hover_color != "") $footer_css .= 'footer .row-container a:hover{color:' . $footer_link_hover_color . '}';
			if ($footer_title_color != "") $footer_css .= 'footer .row-container h6.title, footer .row-container h6.title a{color:' . $footer_title_color . '}';
			
			if ($footer_link_hover_color != "") $footer_css .= 'footer .widget_calendar caption:after{background-color:' . $footer_link_hover_color . '}';
			if ($footer_title_color != "") $footer_css .= 'footer .widget_calendar caption{color:' . $footer_title_color . '}';
			
		} else {
			
			
			if ( $footer_bg_image != "") {
				
				$footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-image{background-image:url(' . $footer_bg_image . ')}';
			
				$footer_bg_image_style = brankic_of_get_option("footer_bg_image_style", brankic_of_get_default("footer_bg_image_style"));
				
				if ($footer_bg_image_style == "cover") $footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';
					
				if ($footer_bg_image_style == "contain") $footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';
					
				if ($footer_bg_image_style == "no_repeat") $footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';
					
				if ($footer_bg_image_style == "repeat") $footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';
				
				
			}
			
			$footer_2_bg_image = brankic_of_get_option("footer_2_bg_image", brankic_of_get_default("footer_2_bg_image"));
			
			if ( $footer_2_bg_image != "") {
				
				$footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-image{background-image:url(' . $footer_2_bg_image . ')}';

				$footer_2_bg_image_style = brankic_of_get_option("footer_2_bg_image_style", brankic_of_get_default("footer_2_bg_image_style"));

				if ($footer_2_bg_image_style == "cover") $footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}';
					
				if ($footer_2_bg_image_style == "contain") $footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-image{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}';
					
				if ($footer_2_bg_image_style == "no_repeat") $footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-image{background-position: 0 0 !important;background-repeat: no-repeat !important;background-size: auto;}';
					
				if ($footer_2_bg_image_style == "repeat") $footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-image{background-position: 0 0 !important;background-repeat: repeat !important;background-size: auto;}';
				
			}	


			
			if ($footer_gradient_direction == "none") {
				if ($footer_bg_color != "") $footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-color{background-color:' . $footer_bg_color . '}';
			} else {
				if ($footer_gradient_direction == "ellipse farthest-corner at center") $direction = "radial-gradient"; else $direction = "linear-gradient";
				if ($footer_bg_color_2 != "" && $footer_bg_color_3 == "") $footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-color{background: ' . $direction . '(' . $footer_gradient_direction . ', ' . $footer_bg_color . ' , ' . $footer_bg_color_2 . ');}';
				if ($footer_bg_color_2 != "" && $footer_bg_color_3 != "") $footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-color{background: ' . $direction . '(' . $footer_gradient_direction . ', ' . $footer_bg_color . ' , ' . $footer_bg_color_2 . ', ' . $footer_bg_color_3 . ');}';			
			}
			if ($footer_bg_color_opacity != "") $footer_css .= 'footer .row-container:nth-child(1) .row-bg.background-color{opacity:' . $footer_bg_color_opacity . '}';
			if ($footer_text_color != "") $footer_css .= 'footer .row-container:nth-child(1){color:' . $footer_text_color . '}';
			if ($footer_link_color != "") $footer_css .= 'footer .row-container:nth-child(1) a{color:' . $footer_link_color . '}';
			if ($footer_link_hover_color != "") $footer_css .= 'footer .row-container:nth-child(1) a:hover{color:' . $footer_link_hover_color . '}';
			if ($footer_title_color != "") $footer_css .= 'footer .row-container:nth-child(1) h6.title{color:' . $footer_title_color . '}';
			
			
			if ($footer_2_gradient_direction == "none") {
				if ($footer_2_bg_color != "") $footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-color{background-color:' . $footer_2_bg_color . '}';
			} else {
				if ($footer_2_gradient_direction == "ellipse farthest-corner at center") $direction = "radial-gradient"; else $direction = "linear-gradient";
				if ($footer_2_bg_color_2 != "" && $footer_2_bg_color_3 == "") $footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-color{background: ' . $direction . '(' . $footer_2_gradient_direction . ', ' . $footer_2_bg_color . ' , ' . $footer_2_bg_color_2 . ');}';
				if ($footer_2_bg_color_2 != "" && $footer_2_bg_color_3 != "") $footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-color{background: ' . $direction . '(' . $footer_2_gradient_direction . ', ' . $footer_2_bg_color . ' , ' . $footer_2_bg_color_2 . ', ' . $footer_2_bg_color_3 . ');}';			
			}
			if ($footer_2_bg_color_opacity != "") $footer_css .= 'footer .row-container:nth-child(2) .row-bg.background-color{opacity:' . $footer_2_bg_color_opacity . '}';
			if ($footer_2_text_color != "") $footer_css .= 'footer .row-container:nth-child(2){color:' . $footer_2_text_color . '}';
			if ($footer_2_link_color != "") $footer_css .= 'footer .row-container:nth-child(2) a{color:' . $footer_2_link_color . '}';
			if ($footer_2_link_hover_color != "") $footer_css .= 'footer .row-container:nth-child(2) a:hover{color:' . $footer_2_link_hover_color . '}';
			if ($footer_2_title_color != "") $footer_css .= 'footer .row-container:nth-child(2) h6.title{color:' . $footer_2_title_color . '}';
		}
		
		//footer border
		
		$footer_border = brankic_of_get_option("footer_border", brankic_of_get_default("footer_border"));
		
		if ($footer_border == "yes") {
			$footer_border_color = brankic_of_get_option("footer_border_color", brankic_of_get_default("footer_border_color"));
			$footer_border_width = brankic_of_get_option("footer_border_width", brankic_of_get_default("footer_border_width"));
			$footer_border_custom = brankic_of_get_option("footer_border_custom", brankic_of_get_default("footer_border_custom"));
			
			$footer_css .= 'footer .main-container{border-style: solid; border-color: ' . $footer_border_color . ';}';
			if ($footer_border_custom == "only_top") $footer_css .= 'footer .main-container{border-top-style: solid; border-right-style: none; border-bottom-style: none; border-left-style: none;}';
			if ($footer_border_custom == "no_top") $footer_css .= 'footer .main-container{border-top-style: none; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;}';
		}

	
		
		
		wp_add_inline_style( 'myriadwp-brankic-style', $footer_css.$footer_title_css );
		
		// typography
		
		$default_sidebar_title_color = brankic_of_get_option("default_sidebar_title_color", brankic_of_get_default("default_sidebar_title_color"));		
		$default_sidebar_text_color = brankic_of_get_option("default_sidebar_text_color", brankic_of_get_default("default_sidebar_text_color"));	
		$default_sidebar_link_color = brankic_of_get_option("default_sidebar_link_color", brankic_of_get_default("default_sidebar_link_color"));
		$default_sidebar_link_hover_color = brankic_of_get_option("default_sidebar_link_hover_color", brankic_of_get_default("default_sidebar_link_hover_color"));
		$default_tag_cloud_text_color = brankic_of_get_option("default_tag_cloud_text_color", brankic_of_get_default("default_tag_cloud_text_color"));
		$default_tag_cloud_text_hover_color = brankic_of_get_option("default_tag_cloud_text_hover_color", brankic_of_get_default("default_tag_cloud_text_hover_color"));
		$default_tag_cloud_bg_hover_color = brankic_of_get_option("default_tag_cloud_bg_hover_color", brankic_of_get_default("default_tag_cloud_bg_hover_color"));
		$default_tag_cloud_text_color_single = brankic_of_get_option("default_tag_cloud_text_color_single", brankic_of_get_default("default_tag_cloud_text_color_single"));
		$default_tag_cloud_text_hover_color_single = brankic_of_get_option("default_tag_cloud_text_hover_color_single", brankic_of_get_default("default_tag_cloud_text_hover_color_single"));
		$default_tag_cloud_bg_hover_color_single = brankic_of_get_option("default_tag_cloud_bg_hover_color_single", brankic_of_get_default("default_tag_cloud_bg_hover_color_single"));
		$default_link_quote_color = brankic_of_get_option("default_link_quote_color", brankic_of_get_default("default_link_quote_color"));
		$default_link_quote_bg_color = brankic_of_get_option("default_link_quote_bg_color", brankic_of_get_default("default_link_quote_bg_color"));
		
		$typography_css = "";
		
		if ($default_sidebar_title_color != "") $typography_css 		.= '.sidebar .widget .widget-title, .sidebar .widget .widget-title a{color:' . $default_sidebar_title_color . '}';
		if ($default_sidebar_text_color != "") $typography_css 			.= '.sidebar .widget{color:' . $default_sidebar_text_color . '}';
		if ($default_sidebar_link_color != "") $typography_css 			.= '.sidebar .widget a{color:' . $default_sidebar_link_color . '}';
		if ($default_sidebar_link_hover_color != "") $typography_css 	.= '.sidebar .widget a:hover{color:' . $default_sidebar_link_hover_color . '}';
		
		if ($default_tag_cloud_text_color != "") $typography_css .= '.widget_tag_cloud.widget .tagcloud a, .wp-block-tag-cloud a{color:' . $default_tag_cloud_text_color . '}';
		if ($default_tag_cloud_text_hover_color != "") $typography_css .= '.widget_tag_cloud.widget .tagcloud a:hover, .wp-block-tag-cloud a:hover{color:' . $default_tag_cloud_text_hover_color . '!important}';
		if ($default_tag_cloud_bg_hover_color != "") $typography_css .= '.widget_tag_cloud.widget .tagcloud a:hover, .wp-block-tag-cloud a:hover{background-color:' . $default_tag_cloud_bg_hover_color . '}';
		if ($default_tag_cloud_bg_hover_color != "") $typography_css .= '.widget_tag_cloud.widget .tagcloud a:hover:after, .wp-block-tag-cloud a:hover:after{color:' . $default_tag_cloud_bg_hover_color . '}';
		
		if ($default_tag_cloud_text_color_single != "") $typography_css .= '.single .post-tags a, .single .widget_tag_cloud.widget .tagcloud a{color:' . $default_tag_cloud_text_color_single . '!important}';
		if ($default_tag_cloud_text_hover_color_single != "") $typography_css .= '.single .post-tags a:hover, .single .widget_tag_cloud.widget .tagcloud a:hover{color:' . $default_tag_cloud_text_hover_color_single . '!important}';
		if ($default_tag_cloud_bg_hover_color_single != "") $typography_css .= '.single .post-tags a:hover, .single .widget_tag_cloud.widget .tagcloud a:hover{background-color:' . $default_tag_cloud_bg_hover_color_single . '!important}';
		if ($default_tag_cloud_bg_hover_color_single != "") $typography_css .= '.single .post-tags a:hover:after, .single .widget_tag_cloud.widget .tagcloud a:hover:after{color:' . $default_tag_cloud_bg_hover_color_single . '!important}';
		
		if ($default_link_quote_color != "") $typography_css .= '.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.style3 article.post_format-post-format-quote,
.style3 article.post_format-post-format-link,
.style3 article.post_format-post-format-quote header a,
.style3 article.post_format-post-format-link header a,
.style4 article.post_format-post-format-quote .media-holder a,
.style4 article.post_format-post-format-link header a,
.style6 article.post_format-post-format-quote header a,
.style6 article.post_format-post-format-quote .post-meta:not(.post-tags) a,
.style6 article.post_format-post-format-quote .post-meta:not(.post-tags),
.style6 article.post_format-post-format-link header a,
.style6 article.post_format-post-format-link .post-meta:not(.post-tags) a,
.style6 article.post_format-post-format-link .post-meta:not(.post-tags)
{color:' . $default_link_quote_color . '!important}';
		if ($default_link_quote_bg_color != "") $typography_css .= '.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.style3 article.post_format-post-format-quote .inner-wrap,
.style3 article.post_format-post-format-link .inner-wrap,
.style4 article.post_format-post-format-quote .post-media,
.style4 article.post_format-post-format-link .post-media,
.style6 article.post_format-post-format-quote .post-media:after,
.style6 article.post_format-post-format-link .post-entry
{background-color:' . $default_link_quote_bg_color . '}';

		$sidebar_title_font_family = brankic_of_get_option("sidebar_title_font_family", brankic_of_get_default("sidebar_title_font_family"));
		$sidebar_title_custom_font_family = brankic_of_get_option("sidebar_title_custom_font_family", brankic_of_get_default("sidebar_title_custom_font_family"));
		$sidebar_title_size = brankic_of_get_option("sidebar_title_size", brankic_of_get_default("sidebar_title_size"));
		$sidebar_title_size_custom = brankic_of_get_option("sidebar_title_size_custom", brankic_of_get_default("sidebar_title_size_custom"));
		$sidebar_title_weight = brankic_of_get_option("sidebar_title_weight", brankic_of_get_default("sidebar_title_weight"));
		$sidebar_title_style = brankic_of_get_option("sidebar_title_style", brankic_of_get_default("sidebar_title_style"));
		$sidebar_title_transform = brankic_of_get_option("sidebar_title_transform", brankic_of_get_default("sidebar_title_transform"));
		$sidebar_title_spacing = brankic_of_get_option("sidebar_title_spacing", brankic_of_get_default("sidebar_title_spacing"));
		$sidebar_title_height = brankic_of_get_option("sidebar_title_height", brankic_of_get_default("sidebar_title_height"));
		$sidebar_title_height_custom = brankic_of_get_option("sidebar_title_height_custom", brankic_of_get_default("sidebar_title_height_custom"));
		
		if ($sidebar_title_size_custom != "") $sidebar_title_size = $sidebar_title_size_custom;
		if ($sidebar_title_height_custom != "") $sidebar_title_height = $sidebar_title_height_custom;
		
		$sidebar_title_font_family_css = "";
		if ($sidebar_title_font_family != "") {
			$sidebar_title_font_family = brankic_check_font_family($sidebar_title_font_family);
			$sidebar_title_font_family_css = 'font-family:' . $sidebar_title_font_family;
		}
		
		$sidebar_title_css = '.sidebar .widget h3.widget-title{' . $sidebar_title_font_family_css . ';font-size:' . $sidebar_title_size . ';font-weight:' . $sidebar_title_weight . ';font-style:' . $sidebar_title_style . ';text-transform:' . $sidebar_title_transform . ';letter-spacing:' . $sidebar_title_spacing . ';line-height:' . $sidebar_title_height . ';}';
		

$mobile_menu_css = "";

$mobile_menu_text_color = brankic_of_get_option("mobile_menu_text_color", brankic_of_get_default("mobile_menu_text_color"));
$mobile_menu_text_hover_color = brankic_of_get_option("mobile_menu_text_hover_color", brankic_of_get_default("mobile_menu_text_hover_color"));
$mobile_menu_text_color_header = brankic_of_get_option("mobile_menu_text_color_header", brankic_of_get_default("mobile_menu_text_color_header"));
$mobile_menu_bg_color = brankic_of_get_option("mobile_menu_bg_color", brankic_of_get_default("mobile_menu_bg_color"));
$mobile_menu_bg_color_opacity = brankic_of_get_option("mobile_menu_bg_color_opacity", brankic_of_get_default("mobile_menu_bg_color_opacity"));
$mobile_menu_bg_image = brankic_of_get_option("mobile_menu_bg_image", brankic_of_get_default("mobile_menu_bg_image"));
$mobile_menu_bg_image_style = brankic_of_get_option("mobile_menu_bg_image_style", brankic_of_get_default("mobile_menu_bg_image_style"));
$mobile_menu_gradient_direction = brankic_of_get_option("mobile_menu_gradient_direction", brankic_of_get_default("mobile_menu_gradient_direction"));
$mobile_menu_bg_color_2 = brankic_of_get_option("mobile_menu_bg_color_2", brankic_of_get_default("mobile_menu_bg_color_2"));
$mobile_menu_bg_color_3 = brankic_of_get_option("mobile_menu_bg_color_3", brankic_of_get_default("mobile_menu_bg_color_3"));
$mobile_menu_bg_repeat = brankic_of_get_option("mobile_menu_bg_repeat", brankic_of_get_default("mobile_menu_bg_repeat"));
$mobile_menu_bg_size = brankic_of_get_option("mobile_menu_bg_size", brankic_of_get_default("mobile_menu_bg_size"));
$mobile_menu_widget_text_color = brankic_of_get_option("mobile_menu_widget_text_color", brankic_of_get_default("mobile_menu_widget_text_color"));
$mobile_menu_widget_link_color = brankic_of_get_option("mobile_menu_widget_link_color", brankic_of_get_default("mobile_menu_widget_link_color"));
$mobile_menu_widget_hover_color = brankic_of_get_option("mobile_menu_widget_hover_color", brankic_of_get_default("mobile_menu_widget_hover_color"));

if ($mobile_menu_text_color != "") $mobile_menu_css .= '#mobile-menu ul li a{color:' . $mobile_menu_text_color . '}';
if ($mobile_menu_text_hover_color != "") $mobile_menu_css .= '#mobile-menu ul#sf-nav-mobile li a:hover, #mobile-menu ul#sf-nav-mobile li.current-menu-item > a, #mobile-menu ul#sf-nav-mobile li.current-menu-ancestor > a {color:' . $mobile_menu_text_hover_color . ';opacity:1}';
if ($mobile_menu_text_color_header != "") $mobile_menu_css .= '.header.mobile_open .lateral-hidden-toggle-icon::before,.header.mobile_open .lateral-hidden-toggle-icon:after{color:' . $mobile_menu_text_color_header . '}';
if ($mobile_menu_text_color_header != "") $mobile_menu_css .= '.header.mobile_open .navbar-secondary{color:' . $mobile_menu_text_color_header . '}';

if ($mobile_menu_widget_text_color != "") $mobile_menu_css .= '#mobile-menu .mobile-menu-widget-holder{color:' . $mobile_menu_widget_text_color . '}';
if ($mobile_menu_widget_link_color != "") $mobile_menu_css .= '#mobile-menu .mobile-menu-widget-holder a{color:' . $mobile_menu_widget_link_color . '}';
if ($mobile_menu_widget_hover_color != "") $mobile_menu_css .= '#mobile-menu .mobile-menu-widget-holder a:hover{color:' . $mobile_menu_widget_hover_color . '}';



		$mobile_menu_size = brankic_of_get_option('mobile_menu_size', brankic_of_get_default('mobile_menu_size'));
		$mobile_menu_size_custom = brankic_of_get_option('mobile_menu_size_custom', brankic_of_get_default('mobile_menu_size_custom'));
		$mobile_menu_weight = brankic_of_get_option('mobile_menu_weight', brankic_of_get_default('mobile_menu_weight'));
		$mobile_menu_style = brankic_of_get_option('mobile_menu_style', brankic_of_get_default('mobile_menu_style'));
		$mobile_menu_transform = brankic_of_get_option('mobile_menu_transform', brankic_of_get_default('mobile_menu_transform'));
		$mobile_menu_spacing = brankic_of_get_option('mobile_menu_spacing', brankic_of_get_default('mobile_menu_spacing'));
		$mobile_menu_height = brankic_of_get_option('mobile_menu_height', brankic_of_get_default('mobile_menu_height'));
		$mobile_menu_height_custom = brankic_of_get_option('mobile_menu_height_custom', brankic_of_get_default('mobile_menu_height_custom'));
		
		if ($mobile_menu_size_custom != "") $mobile_menu_size = $mobile_menu_size_custom;
		if ($mobile_menu_height_custom != "") $mobile_menu_height = $mobile_menu_height_custom;
		
		$mobile_menu_css .= '#mobile-menu ul li a{font-size:' . $mobile_menu_size . ';font-weight:' . $mobile_menu_weight . ';font-style:' . $mobile_menu_style . ';text-transform:' . $mobile_menu_transform . ';letter-spacing:' . $mobile_menu_spacing . ';line-height:' . $mobile_menu_height . ';}';
		
$mobile_menu_css .= '.header.header_default.width-100.mobile_open[data-mobile-logo="mobile_logo"] .dark_version {display:block!important}';
$mobile_menu_css .= '.header.header_default.width-100.mobile_open[data-mobile-logo="mobile_logo"] .light_version {display:none!important}';
$mobile_menu_css .= '.header.header_default.width-100.mobile_open[data-mobile-logo="mobile_logo_2"] .dark_version {display:none!important}';
$mobile_menu_css .= '.header.header_default.width-100.mobile_open[data-mobile-logo="mobile_logo_2"] .light_version {display:block!important}';

if ($mobile_menu_bg_color != "") $mobile_menu_css .= '#mobile-menu .row-bg-wrap .row-bg.background-color{background-color:' . $mobile_menu_bg_color . '}';
if ($mobile_menu_bg_color_opacity != "") $mobile_menu_css .= '#mobile-menu .row-bg-wrap .row-bg.background-color{opacity:' . $mobile_menu_bg_color_opacity . '}';
if ($mobile_menu_bg_color != "") $mobile_menu_css .= '.only_mobile_autoheight.row-bg-wrap .row-bg.background-color{background-color:' . $mobile_menu_bg_color . '}';
if ($mobile_menu_bg_color_opacity != "") $mobile_menu_css .= '.only_mobile_autoheight.row-bg-wrap .row-bg.background-color{opacity:' . $mobile_menu_bg_color_opacity . '}';


if ( $mobile_menu_bg_image != "") {
			
	$mobile_menu_css .= '#mobile-menu .row-bg-wrap .row-bg.background-image{background-image:url(' . $mobile_menu_bg_image . ')}';
	$mobile_menu_css .= '#mobile-menu .row-bg-wrap .row-bg.background-image{background-repeat:' . $mobile_menu_bg_repeat . ';background-size:' . $mobile_menu_bg_size . ';}';
	$mobile_menu_css .= '.only_mobile_autoheight.row-bg-wrap .row-bg.background-image{background-image:url(' . $mobile_menu_bg_image . ')}';
	$mobile_menu_css .= '.only_mobile_autoheight.row-bg-wrap .row-bg.background-image{background-repeat:' . $mobile_menu_bg_repeat . ';background-size:' . $mobile_menu_bg_size . ';}';
}

if ($mobile_menu_gradient_direction == "none") {
	if ($mobile_menu_bg_color != "") $mobile_menu_css .= '.row-bg-wrap.both_mobile_menus .row-bg.background-color{background-color:' . $mobile_menu_bg_color . '}';
} else {
	if ($mobile_menu_gradient_direction == "ellipse farthest-corner at center") $direction = "radial-gradient"; else $direction = "linear-gradient";
	if ($mobile_menu_bg_color_2 != "" && $mobile_menu_bg_color_3 == "") $mobile_menu_css .= '#mobile-menu .row-bg-wrap .row-bg.background-color{background: ' . $direction . '(' . $mobile_menu_gradient_direction . ', ' . $mobile_menu_bg_color . ' , ' . $mobile_menu_bg_color_2 . ');}';
	if ($mobile_menu_bg_color_2 != "" && $mobile_menu_bg_color_3 != "") $mobile_menu_css .= '#mobile-menu .row-bg-wrap .row-bg.background-color{background: ' . $direction . '(' . $mobile_menu_gradient_direction . ', ' . $mobile_menu_bg_color . ' , ' . $mobile_menu_bg_color_2 . ', ' . $mobile_menu_bg_color_3 . ');}';			
	if ($mobile_menu_bg_color_2 != "" && $mobile_menu_bg_color_3 == "") $mobile_menu_css .= '.only_mobile_autoheight.row-bg-wrap .row-bg.background-color{background: ' . $direction . '(' . $mobile_menu_gradient_direction . ', ' . $mobile_menu_bg_color . ' , ' . $mobile_menu_bg_color_2 . ');}';
	if ($mobile_menu_bg_color_2 != "" && $mobile_menu_bg_color_3 != "") $mobile_menu_css .= '.only_mobile_autoheight.row-bg-wrap .row-bg.background-color{background: ' . $direction . '(' . $mobile_menu_gradient_direction . ', ' . $mobile_menu_bg_color . ' , ' . $mobile_menu_bg_color_2 . ', ' . $mobile_menu_bg_color_3 . ');}';			

}

if ($mobile_menu_bg_color_opacity != "") $mobile_menu_css .= '#mobile-menu .row-bg-wrap .row-bg.background-color{opacity:' . $mobile_menu_bg_color_opacity . '}';
if ($mobile_menu_bg_color_opacity != "") $mobile_menu_css .= '.only_mobile_autoheight.row-bg-wrap .row-bg.background-color{opacity:' . $mobile_menu_bg_color_opacity . '}';

wp_add_inline_style( 'myriadwp-brankic-style', $typography_css.$mobile_menu_css.$sidebar_title_css );

$disable_responsive =  brankic_of_get_option("disable_responsive", brankic_of_get_default("disable_responsive"));
	if ($disable_responsive == "no") {
		wp_enqueue_style( 'myriadwp-responsive', get_theme_file_uri( '/css/responsive.css' ) );
		
		$overlay_menu_menu_text_r1 =  brankic_of_get_option("overlay_menu_menu_text_r1", brankic_of_get_default("overlay_menu_menu_text_r1"));
		
		if ($overlay_menu_menu_text_r1 == "yes"){
			$overlay_menu_menu_text_size_r1 =  brankic_of_get_option("overlay_menu_menu_text_size_r1", brankic_of_get_default("overlay_menu_menu_text_size_r1"));
			$overlay_menu_menu_text_size_custom_r1 =  brankic_of_get_option("overlay_menu_menu_text_size_custom_r1", brankic_of_get_default("overlay_menu_menu_text_size_custom_r1"));
			$overlay_menu_menu_text_weight_r1 =  brankic_of_get_option("overlay_menu_menu_text_weight_r1", brankic_of_get_default("overlay_menu_menu_text_weight_r1"));
			
			if ($overlay_menu_menu_text_size_r1 == "custom") $overlay_menu_menu_text_size_r1 = $overlay_menu_menu_text_size_custom_r1;
			
			$r1_inline_style = '@media only screen and (max-width: 768px){';
			if ($overlay_menu_menu_text_size_r1 != "") $r1_inline_style .= '#menu-overlay .slinky-menu a, #lateral-toggle .slinky-menu a { font-size:' . $overlay_menu_menu_text_size_r1 . '}';
			if ($overlay_menu_menu_text_weight_r1 != "") $r1_inline_style .= '#menu-overlay .slinky-menu a, #lateral-toggle .slinky-menu a { font-weight:' . $overlay_menu_menu_text_weight_r1 . '}';
			$r1_inline_style .= '}'; 
			
			wp_add_inline_style( 'myriadwp-responsive', $r1_inline_style );
		}
		
		$overlay_menu_menu_text_r2 =  brankic_of_get_option("overlay_menu_menu_text_r2", brankic_of_get_default("overlay_menu_menu_text_r2"));
		
		if ($overlay_menu_menu_text_r1 == "yes"){
			$overlay_menu_menu_text_size_r2 =  brankic_of_get_option("overlay_menu_menu_text_size_r2", brankic_of_get_default("overlay_menu_menu_text_size_r2"));
			$overlay_menu_menu_text_size_custom_r2 =  brankic_of_get_option("overlay_menu_menu_text_size_custom_r2", brankic_of_get_default("overlay_menu_menu_text_size_custom_r2"));
			$overlay_menu_menu_text_weight_r2 =  brankic_of_get_option("overlay_menu_menu_text_weight_r2", brankic_of_get_default("overlay_menu_menu_text_weight_r2"));
			
			if ($overlay_menu_menu_text_size_r2 == "custom") $overlay_menu_menu_text_size_r2 = $overlay_menu_menu_text_size_custom_r2;
			
			$r2_inline_style = '@media only screen and (max-width: 468px){';
			if ($overlay_menu_menu_text_size_r2 != "") $r2_inline_style .= '#menu-overlay .slinky-menu a, #lateral-toggle .slinky-menu a { font-size:' . $overlay_menu_menu_text_size_r2 . '}';
			if ($overlay_menu_menu_text_weight_r2 != "") $r2_inline_style .= '#menu-overlay .slinky-menu a, #lateral-toggle .slinky-menu a { font-weight:' . $overlay_menu_menu_text_weight_r2 . '}';
			$r2_inline_style .= '}'; 
			
			wp_add_inline_style( 'myriadwp-responsive', $r2_inline_style );
		
		}
		
		$default_header_font_color = brankic_of_get_option("default_header_font_color", brankic_of_get_default("default_header_font_color"));
		$mobile_menu_open_style = brankic_of_get_option("mobile_menu_open_style", brankic_of_get_default("mobile_menu_open_style"));
		
		$autoheight_css = '@media only screen and (max-width: 1000px)  {.header_default.mobile_autoheight, .single-post .header .main-container, header.lateral.lateral_left .outer-lateral a, header.lateral-toggle{color:' . $default_header_font_color . '}}';
		
		if ($mobile_menu_open_style == "mobile_autoheight" && $mobile_menu_text_color_header != "") $autoheight_css .= '@media only screen and (max-width: 1000px) {.header_default.mobile_autoheight, .header.mobile_autoheight .lateral-hidden-toggle-icon, .header.mobile_autoheight .navbar-secondary  {color:' . $mobile_menu_text_color_header . '!important}}';
		
		
		
		wp_add_inline_style( 'myriadwp-responsive', $autoheight_css );
		
		
	}
		
		
		
		if (is_archive() || is_author() || is_tag() || is_home() || is_search() || is_404()){
			$archive_css = "";
			
			$archive_hero_holder_title_color =  brankic_of_get_option("archive_hero_holder_title_color", brankic_of_get_default("archive_hero_holder_title_color"));
			$archive_hero_holder_background_color =  brankic_of_get_option("archive_hero_holder_background_color", brankic_of_get_default("archive_hero_holder_background_color"));
			$archive_hero_holder_background_color_opacity =  brankic_of_get_option("archive_hero_holder_background_color_opacity", brankic_of_get_default("archive_hero_holder_background_color_opacity"));
			
			if ($archive_hero_holder_title_color != "") $archive_css .= '.hero_archive {color:' . $archive_hero_holder_title_color . ';}';
			if ($archive_hero_holder_background_color != "") $archive_css .= '.hero_archive .row-bg-wrap .row-bg.background-color{background:' . $archive_hero_holder_background_color . '}';
			if ($archive_hero_holder_background_color_opacity != "") $archive_css .= '.hero_archive .row-bg-wrap .row-bg.background-color{opacity:' . $archive_hero_holder_background_color_opacity . '}';
			
			$archive_content_width = brankic_of_get_option("archive_content_width", brankic_of_get_default("archive_content_width"));
			
			$archive_content_bg_color = brankic_of_get_option("archive_content_bg_color", brankic_of_get_default("archive_content_bg_color"));
			$archive_content_text_color = brankic_of_get_option("archive_content_text_color", brankic_of_get_default("archive_content_text_color"));
			
			if ($archive_content_bg_color != "") $archive_css .= '.brankic_content {background:' . $archive_content_bg_color . ';}';
			if ($archive_content_text_color != "") $archive_css .= '.brankic_content {color:' . $archive_content_text_color . ';}';
			
			if ($header_style == "default" || $header_style == "lateral-toggle-flex"  || $header_style == "lateral-toggle-left" || $header_style == "lateral-left"){ 
			
				if ($archive_content_width == "fullwidth") {
					$archive_css .= '.archive .brankic_content .row:first-child {max-width:none;}'; 
				} else {
					$archive_css .= '.archive .brankic_content .row:first-child {max-width:' . $archive_content_width . ';}';
					$archive_css .= '.archive .brankic_content .row:first-child {--max-width:' . $archive_content_width . ';}';
					$archive_css .= '.archive .brankic_hero .hero-holder {max-width:' . $archive_content_width . ';}';
					$archive_css .= '.archive .brankic_hero .hero-holder {--max-width:' . $archive_content_width . ';}';
				}
			}
			
			/* if ($header_style == "lateral-toggle-left" || $header_style == "lateral-left" ){ 
			
				if ($archive_content_width == "fullwidth") {
					$archive_css .= '.brankic_content {max-width:none;}'; 
				} else {
					$archive_css .= '.brankic_content {max-width:' . $archive_content_width . '!important;}';
					$archive_css .= '.brankic_content {--max-width:' . $archive_content_width . ';}';
				}
			} */
			
			$archive_style = brankic_of_get_option("archive_style", brankic_of_get_default("archive_style"));
			$archive_boxed = brankic_of_get_option("archive_boxed", brankic_of_get_default("archive_boxed"));  //archive_style == blog-style-3
			$archive_emphasize_first_post = brankic_of_get_option("archive_emphasize_first_post", brankic_of_get_default("archive_emphasize_first_post"));
			$archive_emphasize_style = brankic_of_get_option("archive_emphasize_style", brankic_of_get_default("archive_emphasize_style")); // archive_emphasize_first_post == true
			$archive_style_2 = brankic_of_get_option("archive_style_2", brankic_of_get_default("archive_style_2")); // archive_style == blog-style-3 5 6
			$archive_thumb_sizes = brankic_of_get_option("archive_thumb_sizes", brankic_of_get_default("archive_thumb_sizes"));
			$archive_flex_height = brankic_of_get_option("archive_flex_height", brankic_of_get_default("archive_flex_height")); // archive_style_2 == flex
			$archive_img_radius = brankic_of_get_option("archive_img_radius", brankic_of_get_default("archive_img_radius"));
			$archive_img_radius_size = brankic_of_get_option("archive_img_radius_size", brankic_of_get_default("archive_img_radius_size")); // archive_img_radius == true
			$archive_shadow_color = brankic_of_get_option("archive_shadow_color", brankic_of_get_default("archive_shadow_color"));
			$archive_shadow_color_opacity = brankic_of_get_option("archive_shadow_color_opacity", brankic_of_get_default("archive_shadow_color_opacity"));
			$archive_shadow_color = brankic_hex2rgb($archive_shadow_color, $archive_shadow_color_opacity);			
			$archive_gap_advanced = brankic_of_get_option("archive_gap_advanced", brankic_of_get_default("archive_gap_advanced")); // archive_style == blog-style-2 3 4 5 6 7 8 
			$archive_blog_2_image_height = brankic_of_get_option("archive_blog_2_image_height", brankic_of_get_default("archive_blog_2_image_height")); // archive_style == blog-style-2 3
			$archive_grid_advanced_row_height = brankic_of_get_option("archive_grid_advanced_row_height", brankic_of_get_default("archive_grid_advanced_row_height")); // archive_style_2 = grid_advanced
			$archive_show_excerpt = brankic_of_get_option("archive_show_excerpt", brankic_of_get_default("archive_show_excerpt"));
			$archive_captions_position = brankic_of_get_option("archive_captions_position", brankic_of_get_default("archive_captions_position")); // archive_style == blog-style-5
			$archive_title_color = brankic_of_get_option("archive_title_color", brankic_of_get_default("archive_title_color"));
			$archive_hover_color = brankic_of_get_option("archive_hover_color", brankic_of_get_default("archive_hover_color"));
			$archive_border_hover_color = brankic_of_get_option("archive_border_hover_color", brankic_of_get_default("archive_border_hover_color"));
			$archive_title_font_family = brankic_of_get_option("archive_title_font_family", brankic_of_get_default("archive_title_font_family"));
			$archive_custom_title_font_family = brankic_of_get_option("archive_custom_title_font_family", brankic_of_get_default("archive_custom_title_font_family")); // archive_title_font_family == custom
			$archive_h_size = brankic_of_get_option("archive_h_size", brankic_of_get_default("archive_h_size"));
			$archive_h_size_custom = brankic_of_get_option("archive_h_size_custom", brankic_of_get_default("archive_h_size_custom")); // archive_h_size = custom
			$archive_titles_weight = brankic_of_get_option("archive_titles_weight", brankic_of_get_default("archive_titles_weight"));
			$archive_h_style = brankic_of_get_option("archive_h_style", brankic_of_get_default("archive_h_style"));
			$archive_h_transform = brankic_of_get_option("archive_h_transform", brankic_of_get_default("archive_h_transform"));
			$archive_h_spacing = brankic_of_get_option("archive_h_spacing", brankic_of_get_default("archive_h_spacing"));
			$archive_h_spacing_custom = brankic_of_get_option("archive_h_spacing_custom", brankic_of_get_default("archive_h_spacing_custom")); // archive_h_spacing == custom
			$archive_h_height = brankic_of_get_option("archive_h_height", brankic_of_get_default("archive_h_height"));
			$archive_h_height_custom = brankic_of_get_option("archive_h_height_custom", brankic_of_get_default("archive_h_height_custom")); //archive_h_height == custom
			$archive_duotone = brankic_of_get_option("archive_duotone", brankic_of_get_default("archive_duotone"));  //archive_style == blog-style-1 2 2a 3 4 5 6
			$archive_duotone_custom = brankic_of_get_option("archive_duotone_custom", brankic_of_get_default("archive_duotone_custom"));  //archive_duotone == custom
			$archive_duotone_gradient = brankic_of_get_option("archive_duotone_gradient", brankic_of_get_default("archive_duotone_gradient"));  //archive_duotone == custom
			$archive_duotone_gradient_direction = brankic_of_get_option("archive_duotone_gradient_direction", brankic_of_get_default("archive_duotone_gradient_direction"));  //archive_duotone == custom  archive_duotone_gradient == true
			$archive_duotone_custom_2 = brankic_of_get_option("archive_duotone_custom_2", brankic_of_get_default("archive_duotone_custom_2")); //archive_duotone_gradient == true
			$archive_duotone_custom_3 = brankic_of_get_option("archive_duotone_custom_3", brankic_of_get_default("archive_duotone_custom_3"));
			
			$archive_category_css = "";
			
			$archive_title_font_family = brankic_check_font_family($archive_title_font_family);
			
			
			
			if ($archive_emphasize_first_post == "yes") $archive_emphasize_first_post = "true";
			if ($archive_img_radius == "yes") $archive_img_radius = "true";
			if ($archive_show_excerpt == "yes") $archive_show_excerpt = "true";
			if ($archive_duotone_gradient == "yes") $archive_duotone_gradient = "true";

		if ($archive_h_size_custom != "") $archive_h_size = $archive_h_size_custom;
		if ($archive_h_height_custom != "") $archive_h_height = $archive_h_height_custom;
		if ($archive_h_spacing_custom != "") $archive_h_spacing = $archive_h_spacing_custom;
		
		if ($archive_h_size != "") $archive_h_size = 'font-size:' . $archive_h_size . ';';
		if ($archive_titles_weight != "") $archive_titles_weight = 'font-weight:' . $archive_titles_weight . ';';
		if ($archive_h_style != "") $archive_h_style = 'font-style:' . $archive_h_style . ';';
		if ($archive_h_transform != "") $archive_h_transform = 'text-transform:' . $archive_h_transform . ';';
		if ($archive_h_spacing != "") $archive_h_spacing = 'letter-spacing:' . $archive_h_spacing . ';';
		if ($archive_h_height != "") $archive_h_height = 'line-height:' . $archive_h_height . ';';
		if ($archive_title_font_family != "") $archive_title_font_family = 'font-family:' . $archive_title_font_family . ';';
		
		$archive_title_css = $archive_title_font_family . $archive_h_size . $archive_titles_weight .  $archive_h_style .  $archive_h_transform .  $archive_h_spacing .  $archive_h_height; 
		
		if ($archive_duotone_gradient_direction == "circle") $archive_direction = "radial-gradient"; else $archive_direction = "linear-gradient";
		
		if ($archive_duotone_gradient != "true" && $archive_duotone_custom != "") $archive_category_css .= '.archive .brankic_content  .single-color:before{background:' . $archive_duotone_custom . '}';
		if ($archive_duotone_gradient == "true" && $archive_duotone_custom != "" && $archive_duotone_custom_2 != "" && $archive_duotone_custom_3 == "") $archive_category_css .= '.archive .brankic_content  .single-color:before{background: ' . $archive_direction . '(' . $archive_duotone_gradient_direction . ', ' . $archive_duotone_custom . ' , ' . $archive_duotone_custom_2 . ');}';
		if ($archive_duotone_gradient == "true" && $archive_duotone_custom != "" && $archive_duotone_custom_2 != "" && $archive_duotone_custom_3 != "") $archive_category_css .= '.archive .brankic_content  .single-color:before{background: ' . $archive_direction . '(' . $archive_duotone_gradient_direction . ', ' . $archive_duotone_custom . ' , ' . $archive_duotone_custom_2 . ', ' . $archive_duotone_custom_3 . ');}';
		
	
		if ($archive_style == "blog-style-1" || $archive_style == "blog-style-2" || $archive_style == "blog-style-2a" || $archive_style == "blog-style-3" || $archive_style == "blog-style-4" || $archive_style == "blog-style-5" || $archive_style == "blog-style-6" || $archive_style == "blog-style-7" || $archive_style == "blog-style-8" || $archive_style == "blog-style-9" || $archive_style == "blog-style-10"){
			if ($archive_title_color != "") $archive_category_css .= '.archive .brankic_content .post-title .entry-title a, .search .brankic_content .post-title .entry-title a {color: ' . $archive_title_color . ';}';
			if ($archive_hover_color != "") $archive_category_css .= '.archive .brankic_content .row [class*="col-"] .post-title .entry-title a:hover, .search .brankic_content .row [class*="col-"] .post-title .entry-title a:hover {color: ' . $archive_hover_color . ';}';
			if ($archive_border_hover_color != "") $archive_category_css .= '.archive .brankic_content .post-title .entry-title a:hover, .search .brankic_content .post-title .entry-title a:hover {border-color: ' . $archive_border_hover_color . ';}';
			if ($archive_title_css != "") $archive_category_css .= '.archive .brankic_content .post-title .entry-title, .search .brankic_content .post-title .entry-title {' . $archive_title_css . '}';
		}
		
		
		if ($archive_style == "blog-style-10"){
			$archive_category_css .= '.archive .brankic_content .flow {position:relative;background: linear-gradient(to left, ' . $archive_title_color . ' 50%, ' . $archive_hover_color . ' 50%);background-size: 200% 100%;background-position:right bottom;-webkit-background-clip: text;-webkit-text-fill-color: transparent;transition: 0.6s;-webkit-transition: 0.6s;}';
			$archive_category_css .= '.archive .brankic_content .flow:hover {background-position:left bottom;}';	
			if ($archive_title_css != "") $archive_category_css .= '.archive .brankic_content .entry-title, .search .brankic_content .entry-title {' . $archive_title_css . '}';			
		}
		
		if ($archive_style == "blog-style-1"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "") $archive_category_css .= '.archive .brankic_content .post-media {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';			
		}
		
		if ($archive_style == "blog-style-2"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "" && !($archive_boxed) ) $archive_category_css .= '.archive .brankic_content .post-media {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';	
			if ($archive_shadow_color != "none" && $archive_shadow_color != "" && $archive_boxed) $archive_category_css .= '.archive .brankic_content article:before {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';
		}
		
		if ($archive_style == "blog-style-2a"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "") $archive_category_css .= '.archive .brankic_content .post-media {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';	
		}
		
		if ($archive_style == "blog-style-3"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "" && !($archive_boxed)) $archive_category_css .= '.archive .brankic_content .post-media {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';	
			if ($archive_shadow_color != "none" && $archive_shadow_color != "" && $archive_boxed) $archive_category_css .= '.archive .brankic_content .inner-wrap {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';
		}
		
		if ($archive_style == "blog-style-4"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "") $archive_category_css .= '.archive .brankic_content .post-media {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';	
		}
		
		if ($archive_style == "blog-style-5"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "") $archive_category_css .= '.archive .brankic_content .post-entry {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';	
		}
		
		if ($archive_style == "blog-style-6"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "") $archive_category_css .= '.archive .brankic_content .post-media {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';	
		}
		
		if ($archive_style == "blog-style-7"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "") $archive_category_css .= '.archive .brankic_content .post-entry {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';
		}
		
		if ($archive_style == "blog-style-8"){
		}
		
		if ($archive_style == "blog-style-9"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "") $archive_category_css .= '.archive .brankic_content .post-media {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';		
		}
		
		if ($archive_style == "blog-style-10"){
			if ($archive_shadow_color != "none" && $archive_shadow_color != "") $archive_category_css .= '.archive .brankic_content .post-media .media-holder {box-shadow: 0 20px 40px 0 ' . $archive_shadow_color . ';}';	
		}
				
		$archive_change_header_colors = brankic_of_get_option("archive_change_header_colors", brankic_of_get_default("archive_change_header_colors"));
		$archive_change_menu_new_color = brankic_of_get_option("archive_change_menu_new_color", brankic_of_get_default("archive_change_menu_new_color"));
		$archive_change_header_colors_below = brankic_of_get_option("archive_change_header_colors_below", brankic_of_get_default("archive_change_header_colors_below"));
		$archive_change_menu_new_color_below = brankic_of_get_option("archive_change_menu_new_color_below", brankic_of_get_default("archive_change_menu_new_color_below"));		
		
		if ($archive_change_header_colors == "yes"  && brankic_global_or_local("default_header_bg_color") == ""){
			if ($archive_change_menu_new_color != "") $archive_css .= '.archive .header_default.new_header_colors .main-container, .search .header_default.new_header_colors .main-container {color:' . $archive_change_menu_new_color . ';}';
		}
		if ($archive_change_header_colors == "yes"  && brankic_global_or_local("default_header_bg_color") != ""){
			if ($archive_change_menu_new_color != "") $archive_css .= '.archive .header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container, .search .header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $archive_change_menu_new_color . ';}';
		}		
		
		if ($archive_change_header_colors_below == "yes"  && brankic_global_or_local("default_header_bg_color") == ""){
			if ($archive_change_menu_new_color_below != "") $archive_css .= '.archive .header_default.new_content_header_colors .main-container, .search .header_default.new_content_header_colors .main-container {color:' . $archive_change_menu_new_color_below . ';}';
		}
		if ($archive_change_header_colors_below == "yes"  && brankic_global_or_local("default_header_bg_color") != ""){
			if ($archive_change_menu_new_color_below != "") $archive_css .= '.archive .header_default.new_content_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container, .search .header_default.new_content_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $archive_change_menu_new_color_below . ';}';
		}	
						
			wp_add_inline_style( 'myriadwp-brankic-style', $archive_css.$archive_category_css );
			
		}
		
		$default_content_width = brankic_of_get_option("default_content_width", brankic_of_get_default("default_content_width"));
		$default_header_fullwidth = brankic_of_get_option("default_header_fullwidth", brankic_of_get_default("default_header_fullwidth"));
		
		$header_not_fullwidth_css = "";
		if ($default_header_fullwidth != "yes" && $header_style == "default") {
			
			if ($default_content_width != ""){
				$header_not_fullwidth_css .= '.header_default .row {max-width:' . $default_content_width . ';}';
				$header_not_fullwidth_css .= '.header_default .row {--max-width:' . $default_content_width . ';}';
				
				$header_not_fullwidth_css .= '.brankic_content .row:first-child {max-width:' . $default_content_width . ';}';
				$header_not_fullwidth_css .= '.brankic_content .row:first-child {--max-width:' . $default_content_width . ';}';
				
				
				
				if (function_exists("get_field")) {
					$override_header_width = get_field("page_content_width");
					if ($override_header_width != "fullwidth" && $override_header_width != null && $override_header_width != ""){
						$header_not_fullwidth_css .= '.header_default .row{max-width:' . $override_header_width . ';}';
						$header_not_fullwidth_css .= '.header_default .row{--max-width:' . $override_header_width . ';}';
						$header_not_fullwidth_css .= '.header_default .row:first-child{max-width:' . $override_header_width . ';}';
						$header_not_fullwidth_css .= '.header_default .row:first-child{--max-width:' . $override_header_width . ';}';
					}
				}
						
				
				if ($default_header_3lines_overlay == "lateral-toggle-top-hidden") $header_not_fullwidth_css .= '.lateral-hidden-toggle-wrapper {max-width:' . $default_content_width . ';}';
				if ($default_header_3lines_overlay == "lateral-toggle-top-hidden") $header_not_fullwidth_css .= '.lateral-hidden-toggle-wrapper {--max-width:' . $default_content_width . ';}';
			}
			
			wp_add_inline_style( 'myriadwp-brankic-style', $header_not_fullwidth_css );			
		}
		
		if (is_page() || brankic_bbpress_single_user()){
			
			$page_css = "";
			$default_content_bg_color =  brankic_global_or_local("default_content_bg_color");
			$default_content_text_color =  brankic_global_or_local("default_content_text_color");
			$default_content_link_color =  brankic_global_or_local("default_content_link_color");
			$default_content_link_hover_color =  brankic_global_or_local("default_content_link_hover_color");			
			
			if ($default_content_text_color != "") $page_css .= '.brankic_content {color:' . $default_content_text_color . '!important;}';
			if ($default_content_bg_color != "") $page_css .= '.brankic_content {background:' . $default_content_bg_color . '!important;}';
			if ($default_content_link_color != "") $page_css .= '.brankic_content .row [class*="col-"] a{color:' . $default_content_link_color . ';}';
			if ($default_content_link_hover_color != "") $page_css .= '.wrapper-holder .main-container .brankic_content .row [class*="col-"] a:hover{color:' . $default_content_link_hover_color . ';}';
			
			$page_content_width =  brankic_global_or_local("default_content_width", "page_content_width");
			
			if ($header_style == "default" || $header_style == "lateral-toggle-flex"){ 
			
				if ($page_content_width == "fullwidth") {
					$page_css .= '.brankic_content .row:first-child {max-width:none;}'; 
				} else {
					$page_css .= '.brankic_content .row:first-child {max-width:' . $page_content_width . ';}';
					$page_css .= '.brankic_content .row:first-child {--max-width:' . $page_content_width . ';}';
					$page_css .= '.brankic_hero .hero-holder {max-width:' . $page_content_width . ';}';
					$page_css .= '.brankic_hero .hero-holder {--max-width:' . $page_content_width . ';}';
					$page_css .= '.page .row-container.myriad-comments-only-fullwidth .row:first-child {max-width:' . $page_content_width . ';}';
					$page_css .= '.page .row-container.myriad-comments-only-fullwidth .row:first-child {--max-width:' . $page_content_width . ';}';					
				}
			}
			
			if ($header_style == "lateral-left"){ 
			
				if ($page_content_width == "fullwidth") {
					$page_css .= '.brankic_content {max-width:none;}'; 
				} else {
					$page_css .= '.brankic_content .row:first-child {max-width:' . $page_content_width . ';}';
					$page_css .= '.brankic_content .row:first-child {--max-width:' . $page_content_width . ';}';
				}
			}
			
			if ($header_style == "lateral-toggle-left"){ 
			
				if ($page_content_width == "fullwidth") {
					$page_css .= '.brankic_content {max-width:none;}'; 
				} else {
					$page_css .= '.brankic_content .row:first-child {max-width:' . $page_content_width . ';}';
					$page_css .= '.brankic_content .row:first-child {--max-width:' . $page_content_width . ';}';
				}
			}
			
			if (function_exists("get_field")) {
				$custom_menu_font_color = get_field("page_custom_menu_font_color");
				$page_custom_menu_bg_color = get_field("page_custom_menu_bg_color");
				$page_custom_menu_bg_color_opacity = get_field("page_custom_menu_bg_color_opacity");
				
				if ($custom_menu_font_color != "") {
					$page_css .= '.header.header_default {color:' . $custom_menu_font_color . ';}';
				}
				
				
				
				if ($custom_menu_font_color != "" && brankic_global_or_local("default_menu_always_visible") == "transparent_on_top") {
					$default_header_font_color = brankic_of_get_option("default_header_font_color", brankic_of_get_default("default_header_font_color"));
					$page_css .= '.header.header_default.nav-down:not(.transparent_header), .header.header_default.nav-down:not(.transparent_header) .lateral-hidden-toggle-trigger {color:' . $default_header_font_color . ';}';
					$page_css .= '.header.header_default.scrolled {color:' . $default_header_font_color . ';}';
				}
				
				if ($page_custom_menu_bg_color != "" && brankic_global_or_local("default_menu_always_visible") == "transparent_on_top_custom") {
					if ($page_custom_menu_bg_color != "") $page_css .= '.header_default:after {background: ' . $page_custom_menu_bg_color . ';}';
					if ($page_custom_menu_bg_color_opacity != "") $page_css .= '.header_default:after {opacity:' . $page_custom_menu_bg_color_opacity . ';}';
				}
			} 
			
			
			$hero_holder_background_color = brankic_global_or_local("hero_holder_background_color");
			$hero_holder_background_color_opacity = brankic_global_or_local("hero_holder_background_color_opacity");
			$hero_holder_title_color = brankic_global_or_local("hero_holder_title_color");
			
			if ($hero_holder_background_color_opacity != "") $page_css .= '.brankic_hero .row-bg.background-color{opacity:' . $hero_holder_background_color_opacity  . ';}';
			if ($hero_holder_background_color != "") $page_css .= '.brankic_hero .row-bg.background-color{background:' . $hero_holder_background_color . ';}';
			if ($hero_holder_title_color != "") $page_css .= '.brankic_hero .post-title, .brankic_hero .post-title a, .brankic_hero aside.post-meta span, .brankic_hero aside.post-share span{color:' . $hero_holder_title_color . ';}';
			
			

			if (function_exists("get_field")) {
				$change_header_colors = get_field("change_header_colors");
				$change_menu_new_color = get_field("change_menu_new_color");
				if ($change_header_colors){
					
					if (brankic_global_or_local("default_header_bg_color") == "") {
						if ($change_menu_new_color != "") $page_css .= '.header_default.new_header_colors {color:' . $change_menu_new_color . ';}';
					} else {
						if ($change_menu_new_color != "") $page_css .= '.header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled), .header_default.new_header_colors[data-header_bg_color="true"].visible-viewport {color:' . $change_menu_new_color . ';}';
					}													
				}
			} else $change_header_colors = "";
			
			
			$comment_button_text_color = brankic_of_get_option("comment_button_text_color", brankic_of_get_default("comment_button_text_color"));
			$comment_button_text_hover_color = brankic_of_get_option("comment_button_text_hover_color", brankic_of_get_default("comment_button_text_hover_color"));
			$comment_button_bg_color = brankic_of_get_option("comment_button_bg_color", brankic_of_get_default("comment_button_bg_color"));
			$comment_button_bg_color_2 = brankic_of_get_option("comment_button_bg_color_2", brankic_of_get_default("comment_button_bg_color_2"));
			$comment_button_bg_hover_color = brankic_of_get_option("comment_button_bg_hover_color", brankic_of_get_default("comment_button_bg_hover_color"));
			$comment_button_bg_hover_color_2 = brankic_of_get_option("comment_button_bg_hover_color_2", brankic_of_get_default("comment_button_bg_hover_color_2"));
			$comment_button_hover = brankic_of_get_option("comment_button_hover", brankic_of_get_default("comment_button_hover"));
			
			$page_comment_button_css = "";
			
			$comment_form_layout = brankic_of_get_option("comment_form_layout", brankic_of_get_default("comment_form_layout"));
			$comment_button_default_background = brankic_of_get_option("comment_button_default_background", brankic_of_get_default("comment_button_default_background"));
			if ($comment_form_layout == "default" && $comment_button_default_background != "") $page_comment_button_css .= '#commentform input, #commentform textarea, #commentform select span:before{background-color:' . $comment_button_default_background . ';}'; 
	
			

			if ($comment_button_text_color != "") $page_comment_button_css .= '.form-submit input[type="submit"]{color:' . $comment_button_text_color . ';}';
			if ($comment_button_text_hover_color != "") $page_comment_button_css .= '.form-submit input[type="submit"]:hover{color:' . $comment_button_text_hover_color . ';}';
			
			if ($comment_button_bg_color_2 != "" && $comment_button_bg_color != "") $page_comment_button_css .= '.form-submit input[type="submit"]{background-image:linear-gradient(' . $comment_button_hover . ', ' . $comment_button_bg_color . ' 0%, ' . $comment_button_bg_color_2 . ' 100%);}';
			if ($comment_button_bg_color_2 == "" && $comment_button_bg_color != "") $page_comment_button_css .= '.form-submit input[type="submit"]{background-color:' . $comment_button_bg_color . ';}'; 
			
			if ($comment_button_bg_hover_color_2 != "" && $comment_button_bg_hover_color != "") $page_comment_button_css .= '.form-submit input[type="submit"]:hover{background-image:linear-gradient(' . $comment_button_hover . ', ' . $comment_button_bg_hover_color . ' 0%, ' . $comment_button_bg_hover_color_2 . ' 100%);}';
			if ($comment_button_bg_hover_color_2 == "" && $comment_button_bg_hover_color != "") $page_comment_button_css .= '.form-submit input[type="submit"]:hover{background-color:' . $comment_button_bg_hover_color . ';}'; 
			
	
			wp_add_inline_style( 'myriadwp-brankic-style', $page_css.$page_comment_button_css );
			
		}
		
		if (is_singular( array( 'post', 'portfolio_item', 'topic', 'forum' ) )){
			
			$post_navigation_style = brankic_of_get_option("post_navigation_style", brankic_of_get_default("post_navigation_style"));
			$post_navigation_text_color = brankic_of_get_option("post_navigation_text_color", brankic_of_get_default("post_navigation_text_color"));
			$post_navigation_bg_color = brankic_of_get_option("post_navigation_bg_color", brankic_of_get_default("post_navigation_bg_color"));
			$post_navigation_bg_color_opacity = brankic_of_get_option("post_navigation_bg_color_opacity", brankic_of_get_default("post_navigation_bg_color_opacity"));
			
			$post_navigation_use_duotone = brankic_of_get_option("post_navigation_use_duotone", brankic_of_get_default("post_navigation_use_duotone"));
			$post_navigation_duotone = brankic_of_get_option("post_navigation_duotone", brankic_of_get_default("post_navigation_duotone"));
			$post_navigation_duotone_color = brankic_of_get_option("post_navigation_duotone_color", brankic_of_get_default("post_navigation_duotone_color"));
			$post_navigation_duotone_gradient = brankic_of_get_option("post_navigation_duotone_gradient", brankic_of_get_default("post_navigation_duotone_gradient"));
			$post_navigation_duotone_gradient_direction = brankic_of_get_option("post_navigation_duotone_gradient_direction", brankic_of_get_default("post_navigation_duotone_gradient_direction"));
			$post_navigation_duotone_color_2 = brankic_of_get_option("post_navigation_duotone_color_2", brankic_of_get_default("post_navigation_duotone_color_2"));
			$post_navigation_duotone_color_3 = brankic_of_get_option("post_navigation_duotone_color_3", brankic_of_get_default("post_navigation_duotone_color_3"));
			
			$default_single_sidebar_text_color = brankic_of_get_option("default_single_sidebar_text_color", brankic_of_get_default("default_single_sidebar_text_color"));
			$default_single_sidebar_title_color = brankic_of_get_option("default_single_sidebar_title_color", brankic_of_get_default("default_single_sidebar_title_color"));
			$default_single_sidebar_link_color = brankic_of_get_option("default_single_sidebar_link_color", brankic_of_get_default("default_single_sidebar_link_color"));
			$default_single_sidebar_link_hover_color = brankic_of_get_option("default_single_sidebar_link_hover_color", brankic_of_get_default("default_single_sidebar_link_hover_color"));
			
			$single_post_content_bg_color =  brankic_global_or_local("single_post_content_bg_color");
			$single_post_content_text_color =  brankic_global_or_local("single_post_content_text_color");
			$single_post_content_link_color =  brankic_global_or_local("single_post_content_link_color");
			$single_post_content_link_color_hover =  brankic_global_or_local("single_post_content_link_color_hover");
			$single_post_content_width =  brankic_global_or_local("single_post_content_width");
			
			$post_duotone = brankic_of_get_option("post_duotone", brankic_of_get_default("post_duotone"));  
			$post_duotone_custom = brankic_of_get_option("post_duotone_custom", brankic_of_get_default("post_duotone_custom"));  //post_duotone == custom
			$post_duotone_gradient = brankic_of_get_option("post_duotone_gradient", brankic_of_get_default("post_duotone_gradient"));  //post_duotone == custom
			$post_duotone_gradient_direction = brankic_of_get_option("post_duotone_gradient_direction", brankic_of_get_default("post_duotone_gradient_direction"));  //post_duotone == custom  post_duotone_gradient == true
			$post_duotone_custom_2 = brankic_of_get_option("post_duotone_custom_2", brankic_of_get_default("post_duotone_custom_2")); //post_duotone_gradient == true
			$post_duotone_custom_3 = brankic_of_get_option("post_duotone_custom_3", brankic_of_get_default("post_duotone_custom_3"));
			
			$post_related_posts_use_duotone = brankic_of_get_option("post_related_posts_use_duotone", brankic_of_get_default("post_related_posts_use_duotone"));
			$post_related_posts_duotone = brankic_of_get_option("post_related_posts_duotone", brankic_of_get_default("post_related_posts_duotone"));
			$post_related_posts_duotone_color = brankic_of_get_option("post_related_posts_duotone_color", brankic_of_get_default("post_related_posts_duotone_color"));
			$post_related_posts_duotone_gradient = brankic_of_get_option("post_related_posts_duotone_gradient", brankic_of_get_default("post_related_posts_duotone_gradient"));
			$post_related_posts_duotone_gradient_direction = brankic_of_get_option("post_related_posts_duotone_gradient_direction", brankic_of_get_default("post_related_posts_duotone_gradient_direction"));
			$post_related_posts_duotone_color_2 = brankic_of_get_option("post_related_posts_duotone_color_2", brankic_of_get_default("post_related_posts_duotone_color_2"));
			$post_related_posts_duotone_color_3 = brankic_of_get_option("post_related_posts_duotone_color_3", brankic_of_get_default("post_related_posts_duotone_color_3"));
					
		if (is_singular( array( 'post', 'topic', 'forum' ) )){	

			$single_post_css = "";			
					
		if ($post_duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
		if ($post_duotone_gradient != "yes" && $post_duotone_custom != "") $single_post_css .= '.single-post .single-color:before{background:' . $post_duotone_custom . '}';
		if ($post_duotone_gradient == "yes" && $post_duotone_custom != "" && $post_duotone_custom_2 != "" && $post_duotone_custom_3 == "") $single_post_css .= '.single-post .single-color:before{background: ' . $direction . '(' . $post_duotone_gradient_direction . ', ' . $post_duotone_custom . ' , ' . $post_duotone_custom_2 . ');}';
		if ($post_duotone_gradient == "yes" && $post_duotone_custom != "" && $post_duotone_custom_2 != "" && $post_duotone_custom_3 != "") $single_post_css .= '.single-post .single-color:before{background: ' . $direction . '(' . $post_duotone_gradient_direction . ', ' . $post_duotone_custom . ' , ' . $post_duotone_custom_2 . ', ' . $post_duotone_custom_3 . ');}';


			if ($single_post_content_bg_color != "") $single_post_css .= '.single-post :not(footer) .main-container{background:' . $single_post_content_bg_color . ';} .single-post .header .main-container{background:inherit;}';
			if ($single_post_content_text_color != "") $single_post_css .= '.single-post :not(footer) .main-container {color:' . $single_post_content_text_color . ';}';
			if ($single_post_content_link_color != "") $single_post_css .= '.single-post :not(footer) .main-container section a{color:' . $single_post_content_link_color . ';}';
			if ($single_post_content_link_color_hover != "") $single_post_css .= '.single-post :not(footer) .main-container .row-container .row [class*="col-"] section a:hover{color:' . $single_post_content_link_color_hover . ';}';
			
			if ($default_single_sidebar_link_color != "") $single_post_css 			.= '.single-post .sidebar .widget a{color:' . $default_single_sidebar_link_color . '}';
			if ($default_single_sidebar_link_hover_color != "") $single_post_css 	.= '.single-post .sidebar .widget a:hover{color:' . $default_single_sidebar_link_hover_color . '}';
			if ($default_single_sidebar_text_color != "") $single_post_css 			.= '.single-post .sidebar .widget {color:' . $default_single_sidebar_text_color . '}';
			if ($default_single_sidebar_title_color != "") $single_post_css 		.= '.single-post .sidebar .widget .widget-title{color:' . $default_single_sidebar_title_color . '}';
			
			if (function_exists("get_field")) {
				
				$post_change_header_colors = brankic_global_or_local("post_change_header_colors");
				$post_change_menu_new_color = brankic_global_or_local("post_change_menu_new_color");
				
		
				$post_change_header_colors_below = brankic_global_or_local("post_change_header_colors_below");
				$post_change_menu_new_color_below = brankic_global_or_local("post_change_menu_new_color_below");
				
				
				if ($post_change_header_colors  && brankic_global_or_local("default_header_bg_color") == ""){
					if ($post_change_menu_new_color != "") $single_post_css .= '.single-post .header_default.new_header_colors .main-container {color:' . $post_change_menu_new_color . ';}';
				}
				if ($post_change_header_colors  && brankic_global_or_local("default_header_bg_color") != ""){
					if ($post_change_menu_new_color != "") $single_post_css .= '.single-post .header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $post_change_menu_new_color . ';}';
				}				
				
				if ($post_change_header_colors_below  && brankic_global_or_local("default_header_bg_color") == ""){
					if ($post_change_menu_new_color_below != "") $single_post_css .= '.single-post .header_default.new_content_header_colors .main-container {color:' . $post_change_menu_new_color_below . ';}';
				}
				if ($post_change_header_colors_below  && brankic_global_or_local("default_header_bg_color") != ""){
					if ($post_change_menu_new_color_below != "") $single_post_css .= '.single-post .header_default.new_content_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $post_change_menu_new_color_below . ';}';
				}
				
			} else $change_header_colors = "";
			
			if ($single_post_content_width == "fullwidth") $single_post_width = ""; else $single_post_width = $single_post_content_width;
			if ($single_post_width != ""){
				$single_post_css .= '.single :not(footer) .main-container .row-container .row{max-width:' . $single_post_width . '}' ;
				$single_post_css .= '.single :not(footer) .main-container .row-container .row{--max-width:' . $single_post_width . '}' ;
				$single_post_css .= '.single :not(header) .main-container .row-container .row{max-width:' . $single_post_width . '}' ;
				$single_post_css .= '.single :not(header) .main-container .row-container .row{--max-width:' . $single_post_width . '}' ;
			}
			

			if ($footer_width != "fullwidth"){
				if ($single_post_width != $footer_width) $footer_width = $single_post_width;
				$single_post_css .= '.single footer .main-container .row-container .row{max-width:' . $footer_width .'}' ;
				$single_post_css .= '.single footer .main-container .row-container .row{--max-width:' . $footer_width .'}' ;
			} else {
				$single_post_css .= '.single footer .main-container .row-container .row{max-width:none}' ;
				$single_post_css .= '.single footer .main-container .row-container .row{--max-width:none}' ;
			}
			$single_post_css .= '.single header .main-container .row-container .row{max-width:inherit}' ;
			
			if ($single_post_style == "fullwidth" && $single_post_width != ""){
				$single_post_css .= '.single :not(header) .main-container .row-container .hero-holder{max-width:' . $single_post_width . '}' ;
				$single_post_css .= '.single :not(header) .main-container .row-container .hero-holder{--max-width:' . $single_post_width . '}' ;
			}


			wp_add_inline_style( 'myriadwp-brankic-style', "/* */" . $single_post_css . "/* */" );
			
		}	
		if (is_singular( array( 'portfolio_item' ) )){	
		
		
			$portfolio_item_duotone = brankic_global_or_local("portfolio_item_duotone");  
			$portfolio_item_duotone_custom = brankic_global_or_local("portfolio_item_duotone_custom");  //portfolio_item_duotone == custom
			$portfolio_item_duotone_gradient = brankic_global_or_local("portfolio_item_duotone_gradient");  //portfolio_item_duotone == custom
			$portfolio_item_duotone_gradient_direction = brankic_global_or_local("portfolio_item_duotone_gradient_direction");  //portfolio_item_duotone == custom  portfolio_item_duotone_gradient == true
			$portfolio_item_duotone_custom_2 = brankic_global_or_local("portfolio_item_duotone_custom_2"); //portfolio_item_duotone_gradient == true
			$portfolio_item_duotone_custom_3 = brankic_global_or_local("portfolio_item_duotone_custom_3");
			
			$single_portfolio_css = "";
			
			$portfolio_item_style = brankic_global_or_local("portfolio_item_style");
			
			if ($portfolio_item_duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";
			if ($portfolio_item_duotone_gradient != "yes" && $portfolio_item_duotone_custom != "") $single_portfolio_css .= '.single-portfolio_item .single-color:before{background:' . $portfolio_item_duotone_custom . '}';
			if ($portfolio_item_duotone_gradient == "yes" && $portfolio_item_duotone_custom != "" && $portfolio_item_duotone_custom_2 != "" && $portfolio_item_duotone_custom_3 == "") $single_portfolio_css .= '.single-portfolio_item .single-color:before{background: ' . $direction . '(' . $portfolio_item_duotone_gradient_direction . ', ' . $portfolio_item_duotone_custom . ' , ' . $portfolio_item_duotone_custom_2 . ');}';
			if ($portfolio_item_duotone_gradient == "yes" && $portfolio_item_duotone_custom != "" && $portfolio_item_duotone_custom_2 != "" && $portfolio_item_duotone_custom_3 != "") $single_portfolio_css .= '.single-portfolio_item .single-color:before{background: ' . $direction . '(' . $portfolio_item_duotone_gradient_direction . ', ' . $portfolio_item_duotone_custom . ' , ' . $portfolio_item_duotone_custom_2 . ', ' . $portfolio_item_duotone_custom_3 . ');}';

			
			if ($portfolio_item_style == "portfolio_style_12" || $portfolio_item_style == "portfolio_style_13"){
			
				$portfolio_item_change_header_colors = brankic_global_or_local("portfolio_item_change_header_colors");
				$portfolio_item_change_menu_new_color = brankic_global_or_local("portfolio_item_change_menu_new_color");
				
				if ($portfolio_item_change_header_colors  && brankic_global_or_local("default_header_bg_color") == ""){
					if ($portfolio_item_change_menu_new_color != "") $single_portfolio_css .= '.single-portfolio_item .header_default.new_header_colors .main-container {color:' . $portfolio_item_change_menu_new_color . ';}';
				}
				if ($portfolio_item_change_header_colors  && brankic_global_or_local("default_header_bg_color") != ""){
					if ($portfolio_item_change_menu_new_color != "") $single_portfolio_css .= '.single-portfolio_item .header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $portfolio_item_change_menu_new_color . ';}';
				}
				
				$portfolio_item_change_header_colors_below = brankic_global_or_local("portfolio_item_change_header_colors_below");
				$portfolio_item_change_menu_new_color_below = brankic_global_or_local("portfolio_item_change_menu_new_color_below");
				
				if ($portfolio_item_change_header_colors_below  && brankic_global_or_local("default_header_bg_color") == ""){
					if ($portfolio_item_change_menu_new_color_below != "") $single_portfolio_css .= '.single-portfolio_item .header_default.new_content_header_colors .main-container {color:' . $portfolio_item_change_menu_new_color_below . ';}';
				}
				if ($portfolio_item_change_header_colors_below  && brankic_global_or_local("default_header_bg_color") != ""){
					if ($portfolio_item_change_menu_new_color_below != "") $single_portfolio_css .= '.single-portfolio_item .header_default.new_content_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $portfolio_item_change_menu_new_color_below . ';}';
				}
	
			}
			
 			if ($portfolio_item_style == "portfolio_style_12" || $portfolio_item_style == "portfolio_style_11"){
			
				$portfolio_item_change_header_colors_title = brankic_global_or_local("portfolio_item_change_header_colors_title");
				$portfolio_item_change_menu_new_color_title = brankic_global_or_local("portfolio_item_change_menu_new_color_title");
				
				$portfolio_item_change_header_colors_title_1 = brankic_of_get_option($portfolio_item_change_header_colors_title, brankic_of_get_default($portfolio_item_change_header_colors_title));
				$portfolio_item_change_header_colors_title_2 = get_field("portfolio_item_change_header_colors_title");
				
		
				if ($portfolio_item_change_header_colors_title  && brankic_global_or_local("default_header_bg_color") == ""){
					if ($portfolio_item_change_menu_new_color_title != "") $single_portfolio_css .= '.single-portfolio_item .header_default.new_header_colors .main-container {color:' . $portfolio_item_change_menu_new_color_title . ';}';
				}
				if ($portfolio_item_change_header_colors_title  && brankic_global_or_local("default_header_bg_color") != ""){
					if ($portfolio_item_change_menu_new_color_title != "") $single_portfolio_css .= '.single-portfolio_item .header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $portfolio_item_change_menu_new_color_title . ';}';
				}
			
			} 

			$post_navigation_style = brankic_global_or_local("portfolio_item_navigation_style");
			$post_navigation_text_color = brankic_global_or_local("portfolio_item_navigation_text_color");
			$post_navigation_bg_color = brankic_global_or_local("portfolio_item_navigation_bg_color");
			$post_navigation_bg_color_opacity = brankic_global_or_local("portfolio_item_navigation_bg_color_opacity");
			
			$portfolio_item_title_bg_color = brankic_global_or_local("portfolio_item_title_bg_color");
			
			$default_content_bg_color =  brankic_global_or_local("portfolio_item_content_bg_color");
			$default_content_text_color =  brankic_global_or_local("portfolio_item_content_text_color");
			
			$portfolio_item_content_link_color = brankic_global_or_local("portfolio_item_content_link_color");
			$portfolio_item_content_link_color_hover = brankic_global_or_local("portfolio_item_content_link_color_hover");
			
			
			if ($default_content_text_color != "") $single_portfolio_css .= '.single-portfolio_item .main-container.brankic_portfolio_content{color:' . $default_content_text_color . ';}';
			if ($default_content_bg_color != "") $single_portfolio_css .= '.single-portfolio_item .main-container.brankic_portfolio_content{background:' . $default_content_bg_color . ';}';
			
			if ($portfolio_item_content_link_color != "") $single_portfolio_css .= '.single-portfolio_item .main-container.brankic_portfolio_content a{color:' . $portfolio_item_content_link_color . ';}';
			if ($portfolio_item_content_link_color_hover != "") $single_portfolio_css .= '.single-portfolio_item .main-container.brankic_portfolio_content a:hover{color:' . $portfolio_item_content_link_color_hover . ';}';
			
			if (function_exists("get_field")) {
				$portfolio_item_custom_menu_font_color = get_field("portfolio_item_custom_menu_font_color");

				if ($portfolio_item_custom_menu_font_color) $single_portfolio_css .= '.header_default {color:' . $portfolio_item_custom_menu_font_color . ';}';


			}
			
			$portfolio_item_hero_holder_background_color = brankic_global_or_local("portfolio_item_hero_holder_background_color");
			$portfolio_item_hero_holder_background_color_opacity = brankic_global_or_local("portfolio_item_hero_holder_background_color_opacity");
			$portfolio_item_parallax = brankic_global_or_local("portfolio_item_parallax");
			$portfolio_item_hero_holder_title_color = brankic_global_or_local("portfolio_item_hero_holder_title_color");
			$portfolio_item_hero_holder_meta_color = brankic_global_or_local("portfolio_item_hero_holder_meta_color");
			$portfolio_item_hero_holder_title_weight = brankic_global_or_local("portfolio_item_hero_holder_title_weight");
			
			$portfolio_item_content_width = brankic_global_or_local("portfolio_item_content_width");
			
			$portfolio_item_hero_css = "";			
		
			if ($portfolio_item_hero_holder_title_color != "") $portfolio_item_hero_css .= '.single-portfolio_item .brankic_hero .entry-title, .brankic_hero, .single-portfolio_item header.blog-post-title .entry-title{color:' . $portfolio_item_hero_holder_title_color . ';}';
			if ($portfolio_item_hero_holder_title_color != "") $portfolio_item_hero_css .= '.single-portfolio_item .brankic_hero_0 .entry-title, .brankic_hero_0 .portfolio-meta.inline, .brankic_hero_0 .scroll-link{color:' . $portfolio_item_hero_holder_title_color . ';}';
			
			if ($portfolio_item_hero_holder_meta_color != "") $portfolio_item_hero_css .= '.single-portfolio_item .hero-holder .portfolio-meta, .single-portfolio_item .portfolio-meta{color:' . $portfolio_item_hero_holder_meta_color . ';}';
			
			if ($portfolio_item_hero_holder_title_weight != "") $portfolio_item_hero_css .= '.single-portfolio_item .brankic_hero .entry-title{font-weight:' . $portfolio_item_hero_holder_title_weight . ';}';
			if ($portfolio_item_hero_holder_title_weight != "") $portfolio_item_hero_css .= '.single-portfolio_item .brankic_hero_0 .entry-title{font-weight:' . $portfolio_item_hero_holder_title_weight . ';}';
			if ($portfolio_item_hero_holder_title_weight != "") $portfolio_item_hero_css .= '.single-portfolio_item .portfolio_style_11 .entry-title{font-weight:' . $portfolio_item_hero_holder_title_weight . ';}';
			if ($portfolio_item_hero_holder_background_color != "") $portfolio_item_hero_css .= '.single-portfolio_item .brankic_hero .row-bg.background-color{background:' . $portfolio_item_hero_holder_background_color . ';}';
			if ($portfolio_item_hero_holder_background_color_opacity != "") $portfolio_item_hero_css .= '.single-portfolio_item .brankic_hero .row-bg.background-color{opacity:' . $portfolio_item_hero_holder_background_color_opacity  . ';}';
			
			if ($portfolio_item_content_width == "fullwidth") $portfolio_item_width = ""; else $portfolio_item_width = $portfolio_item_content_width;
			
			if ($portfolio_item_width != "") {
				$single_portfolio_css .= '.single-portfolio_item :not(footer) .main-container .row-container .row{max-width:' . $portfolio_item_width . '}' ;
				$single_portfolio_css .= '.single-portfolio_item :not(footer) .main-container .row-container .row{--max-width:' . $portfolio_item_width . '}' ;
				$single_portfolio_css .= '.single-portfolio_item :not(header) .main-container .row-container .row{max-width:' . $portfolio_item_width . '}' ;
				$single_portfolio_css .= '.single-portfolio_item :not(header) .main-container .row-container .row{--max-width:' . $portfolio_item_width . '}' ;
				$single_portfolio_css .= '.single-portfolio_item  .main-container .row-container.brankic_hero_0 .row .hero-holder{max-width:' . $portfolio_item_width . '}' ;
				$single_portfolio_css .= '.single-portfolio_item  .main-container .row-container.brankic_hero_0 .row .hero-holder{--max-width:' . $portfolio_item_width . '}' ;			
			}
			
		
			if ($footer_width != "fullwidth") {
				if ($portfolio_item_width != $footer_width) $footer_width = $portfolio_item_width;
				$single_portfolio_css .= '.single-portfolio_item footer .main-container .row-container .row{max-width:' . $footer_width .'}' ;
				$single_portfolio_css .= '.single-portfolio_item footer .main-container .row-container .row{--max-width:' . $footer_width .'}' ;
			} else {

			}
			$single_portfolio_css .= '.single-portfolio_item header .main-container .row-container .row{max-width:inherit}' ;
						
			
			if ($portfolio_item_style == "portfolio_style_13" && $portfolio_item_width != ""){
				$single_portfolio_css .= '.single-portfolio_item :not(header) .main-container .row-container .hero-holder{max-width:' . $portfolio_item_width . '}' ;
				$single_portfolio_css .= '.single-portfolio_item :not(header) .main-container .row-container .hero-holder{--max-width:' . $portfolio_item_width . '}' ;
			}
			
			if ($portfolio_item_style == "portfolio_style_12"){
				if ($portfolio_item_title_bg_color != "") $portfolio_item_hero_css .= '.single-portfolio_item .brankic_hero_0 .row-bg.background-color{background:' . $portfolio_item_title_bg_color . ';}';
				
			}
			
			$extra_images_use_duotone = brankic_global_or_local("extra_images_use_duotone");
			$extra_images_duotone = brankic_global_or_local("extra_images_duotone");
			$extra_images_duotone_color = brankic_global_or_local("extra_images_duotone_color");
			$extra_images_duotone_gradient = brankic_global_or_local("extra_images_duotone_gradient");
			$extra_images_duotone_gradient_direction = brankic_global_or_local("extra_images_duotone_gradient_direction");
			$extra_images_duotone_color_2 = brankic_global_or_local("extra_images_duotone_color_2");
			$extra_images_duotone_color_3 = brankic_global_or_local("extra_images_duotone_color_3");
			
			if ($extra_images_duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";	
			$extra_images_duotone_css = "";
			if ($extra_images_use_duotone == "yes" && $extra_images_duotone_gradient != "yes" && $extra_images_duotone_color != "") $extra_images_duotone_css .= '.post-image-holder .single-color:before{background:' . $extra_images_duotone_color . '}';
			if ($extra_images_use_duotone == "yes" && $extra_images_duotone_gradient == "yes" && $extra_images_duotone_color != "" && $extra_images_duotone_color_2 != "" && $extra_images_duotone_color_3 == "") $extra_images_duotone_css .= '.post-image-holder .single-color:before{background: ' . $direction . '(' . $extra_images_duotone_gradient_direction . ', ' . $extra_images_duotone_color . ' , ' . $extra_images_duotone_color_2 . ');}';
			if ($extra_images_use_duotone == "yes" && $extra_images_duotone_gradient == "yes" && $extra_images_duotone_color != "" && $extra_images_duotone_color_2 != "" && $extra_images_duotone_color_3 != "") $extra_images_duotone_css .= '.post-image-holder .single-color:before{background: ' . $direction . '(' . $extra_images_duotone_gradient_direction . ', ' . $extra_images_duotone_color . ' , ' . $extra_images_duotone_color_2 . ', ' . $extra_images_duotone_color_3 . ');}';

			
			$portfolio_item_navigation_style = brankic_global_or_local("portfolio_item_navigation_style");
			$portfolio_item_navigation_use_duotone = brankic_global_or_local("portfolio_item_navigation_use_duotone");
			$portfolio_item_navigation_duotone = brankic_global_or_local("portfolio_item_navigation_duotone");
			$portfolio_item_navigation_duotone_color = brankic_global_or_local("portfolio_item_navigation_duotone_color");
			$portfolio_item_navigation_duotone_gradient = brankic_global_or_local("portfolio_item_navigation_duotone_gradient");
			$portfolio_item_navigation_duotone_gradient_direction = brankic_global_or_local("portfolio_item_navigation_duotone_gradient_direction");
			$portfolio_item_navigation_duotone_color_2 = brankic_global_or_local("portfolio_item_navigation_duotone_color_2");
			$portfolio_item_navigation_duotone_color_3 = brankic_global_or_local("portfolio_item_navigation_duotone_color_3");
			
			$portfolio_item_related_posts_use_duotone = brankic_global_or_local("portfolio_item_related_posts_use_duotone");
			$portfolio_item_related_posts_duotone = brankic_global_or_local("portfolio_item_related_posts_duotone");
			$portfolio_item_related_posts_duotone_color = brankic_global_or_local("portfolio_item_related_posts_duotone_color");
			$portfolio_item_related_posts_duotone_gradient = brankic_global_or_local("portfolio_item_related_posts_duotone_gradient");
			$portfolio_item_related_posts_duotone_gradient_direction = brankic_global_or_local("portfolio_item_related_posts_duotone_gradient_direction");
			$portfolio_item_related_posts_duotone_color_2 = brankic_global_or_local("portfolio_item_related_posts_duotone_color_2");
			$portfolio_item_related_posts_duotone_color_3 = brankic_global_or_local("portfolio_item_related_posts_duotone_color_3");
			
			$portfolio_item_navigation_css = "";
		
			if ($portfolio_item_navigation_style == "only_next_bg_image" || $portfolio_item_navigation_style == "only_next_bg_image_half"){		
				if ($portfolio_item_navigation_duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";	
				if ($portfolio_item_navigation_use_duotone == "yes" && $portfolio_item_navigation_duotone_gradient != "yes" && $portfolio_item_navigation_duotone_color != "") $portfolio_item_navigation_css .= '.single-portfolio_item .post-navigation.solo .single-color:before{background:' . $portfolio_item_navigation_duotone_color . '}';
				if ($portfolio_item_navigation_use_duotone == "yes" && $portfolio_item_navigation_duotone_gradient == "yes" && $portfolio_item_navigation_duotone_color != "" && $portfolio_item_navigation_duotone_color_2 != "" && $portfolio_item_navigation_duotone_color_3 == "") $portfolio_item_navigation_css .= '.single-portfolio_item .post-navigation.solo .single-color:before{background: ' . $direction . '(' . $portfolio_item_navigation_duotone_gradient_direction . ', ' . $portfolio_item_navigation_duotone_color . ' , ' . $portfolio_item_navigation_duotone_color_2 . ');}';
				if ($portfolio_item_navigation_use_duotone == "yes" && $portfolio_item_navigation_duotone_gradient == "yes" && $portfolio_item_navigation_duotone_color != "" && $portfolio_item_navigation_duotone_color_2 != "" && $portfolio_item_navigation_duotone_color_3 != "") $portfolio_item_navigation_css .= '.single-portfolio_item .post-navigation.solo .single-color:before{background: ' . $direction . '(' . $portfolio_item_navigation_duotone_gradient_direction . ', ' . $portfolio_item_navigation_duotone_color . ' , ' . $portfolio_item_navigation_duotone_color_2 . ', ' . $portfolio_item_navigation_duotone_color_3 . ');}';
			}	
			
			$portfolio_item_related_posts_css = "";
			if ($portfolio_item_related_posts_duotone == "custom" && $portfolio_item_related_posts_use_duotone == "yes") {
				if ($portfolio_item_related_posts_duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";	
				if ($portfolio_item_related_posts_duotone_gradient != "yes" && $portfolio_item_related_posts_duotone_color != "") $portfolio_item_related_posts_css .= '.single-portfolio_item .related-posts-wrap .single-color:before{background:' . $portfolio_item_related_posts_duotone_color . '}';
				if ($portfolio_item_related_posts_duotone_gradient == "yes" && $portfolio_item_related_posts_duotone_color != "" && $portfolio_item_related_posts_duotone_color_2 != "" && $portfolio_item_related_posts_duotone_color_3 == "") $portfolio_item_related_posts_css .= '.single-portfolio_item .related-posts-wrap .single-color:before{background: ' . $direction . '(' . $portfolio_item_related_posts_duotone_gradient_direction . ', ' . $portfolio_item_related_posts_duotone_color . ' , ' . $portfolio_item_related_posts_duotone_color_2 . ');}';
				if ($portfolio_item_related_posts_duotone_gradient == "yes" && $portfolio_item_related_posts_duotone_color != "" && $portfolio_item_related_posts_duotone_color_2 != "" && $portfolio_item_related_posts_duotone_color_3 != "") $portfolio_item_related_posts_css .= '.single-portfolio_item .related-posts-wrap .single-color:before{background: ' . $direction . '(' . $portfolio_item_related_posts_duotone_gradient_direction . ', ' . $portfolio_item_related_posts_duotone_color . ' , ' . $portfolio_item_related_posts_duotone_color_2 . ', ' . $portfolio_item_related_posts_duotone_color_3 . ');}';
			}
			
			
			wp_add_inline_style( 'myriadwp-brankic-style', $single_portfolio_css.$portfolio_item_hero_css.$extra_images_duotone_css.$portfolio_item_navigation_css.$portfolio_item_related_posts_css );
		}	



		$post_related_posts_css = "";
		if ($post_related_posts_duotone == "custom" && $post_related_posts_use_duotone == "yes") {
			if ($post_related_posts_duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";	
			if ($post_related_posts_duotone_gradient != "yes" && $post_related_posts_duotone_color != "") $post_related_posts_css .= '.single-post .related-posts-wrap .single-color:before{background:' . $post_related_posts_duotone_color . '}';
			if ($post_related_posts_duotone_gradient == "yes" && $post_related_posts_duotone_color != "" && $post_related_posts_duotone_color_2 != "" && $post_related_posts_duotone_color_3 == "") $post_related_posts_css .= '.single-post .related-posts-wrap .single-color:before{background: ' . $direction . '(' . $post_related_posts_duotone_gradient_direction . ', ' . $post_related_posts_duotone_color . ' , ' . $post_related_posts_duotone_color_2 . ');}';
			if ($post_related_posts_duotone_gradient == "yes" && $post_related_posts_duotone_color != "" && $post_related_posts_duotone_color_2 != "" && $post_related_posts_duotone_color_3 != "") $post_related_posts_css .= '.single-post .related-posts-wrap .single-color:before{background: ' . $direction . '(' . $post_related_posts_duotone_gradient_direction . ', ' . $post_related_posts_duotone_color . ' , ' . $post_related_posts_duotone_color_2 . ', ' . $post_related_posts_duotone_color_3 . ');}';
		}
		
		$post_navigation_css = "";
		
		if ($post_navigation_style == "only_next_bg_image" || $post_navigation_style == "only_next_bg_image_half" || $post_navigation_style == "prev_next_bg_image"){		
			if ($post_navigation_duotone_gradient_direction == "circle") $direction = "radial-gradient"; else $direction = "linear-gradient";	
			if ($post_navigation_use_duotone == "yes" && $post_navigation_duotone_gradient != "yes" && $post_navigation_duotone_color != "") $post_navigation_css .= '.single-post .post-navigation .single-color:before{background:' . $post_navigation_duotone_color . '}';
			if ($post_navigation_use_duotone == "yes" && $post_navigation_duotone_gradient == "yes" && $post_navigation_duotone_color != "" && $post_navigation_duotone_color_2 != "" && $post_navigation_duotone_color_3 == "") $post_navigation_css .= '.single-post .post-navigation .single-color:before{background: ' . $direction . '(' . $post_navigation_duotone_gradient_direction . ', ' . $post_navigation_duotone_color . ' , ' . $post_navigation_duotone_color_2 . ');}';
			if ($post_navigation_use_duotone == "yes" && $post_navigation_duotone_gradient == "yes" && $post_navigation_duotone_color != "" && $post_navigation_duotone_color_2 != "" && $post_navigation_duotone_color_3 != "") $post_navigation_css .= '.single-post .post-navigation .single-color:before{background: ' . $direction . '(' . $post_navigation_duotone_gradient_direction . ', ' . $post_navigation_duotone_color . ' , ' . $post_navigation_duotone_color_2 . ', ' . $post_navigation_duotone_color_3 . ');}';
		}
		
		
			
		if ($post_navigation_style == "only_next_simple") {
			if ($post_navigation_text_color != "") $post_navigation_css .= '.post-navigation.solo .overlap-heading span, .post-navigation.solo .overlap-link, .post-navigation.solo .overlap-inner h3{color:' . $post_navigation_text_color . ';}';
			if ($post_navigation_bg_color != "") $post_navigation_css .= '.post-navigation.solo:after {background:' . $post_navigation_bg_color . ';}';
			if ($post_navigation_bg_color_opacity != "") $post_navigation_css .= '.post-navigation.solo:after {opacity:' . $post_navigation_bg_color_opacity  . ';}';
		}
			
		if ($post_navigation_style == "only_next_bg_image") {
			if ($post_navigation_text_color != "") $post_navigation_css .= '.post-navigation.solo.bg-image .overlap-heading, .post-navigation.solo.bg-image .overlap-inner h3{color:' . $post_navigation_text_color . ';}';
			if ($post_navigation_bg_color != "") $post_navigation_css .= '.post-navigation.solo.bg-image .row-bg.background-color{background:' . $post_navigation_bg_color . ';}';
			if ($post_navigation_bg_color_opacity != "") $post_navigation_css .= '.post-navigation.solo.bg-image .row-bg.background-color{opacity:' . $post_navigation_bg_color_opacity  . ';}';
		}
		
		if ($post_navigation_style == "prev_next_bg_image") {
			
			
			
			if ($post_navigation_text_color != "") $post_navigation_css .= '.post-navigation.duo.bg-image .overlap-heading, .post-navigation.duo.bg-image .overlap-inner h3{color:' . $post_navigation_text_color . ';}';
			if ($post_navigation_bg_color != "") $post_navigation_css .= '.post-navigation.duo.bg-image .row-bg.background-color{background:' . $post_navigation_bg_color . ';}';
			if ($post_navigation_bg_color_opacity != "") $post_navigation_css .= '.post-navigation.duo.bg-image .row-bg.background-color{opacity:' . $post_navigation_bg_color_opacity  . ';}';
		}
		
		if ($post_navigation_style == "only_next_bg_image_half") {
			if ($post_navigation_text_color != "") $post_navigation_css .= '.post-navigation.solo.duo{color:' . $post_navigation_text_color . ';}';
			if ($post_navigation_bg_color != "") $post_navigation_css .= '.post-navigation.solo.duo .row-bg.background-color{background:' . $post_navigation_bg_color . ';}';
			if ($post_navigation_bg_color_opacity != "") $post_navigation_css .= '.post-navigation.solo.duo .row-bg.background-color{opacity:' . $post_navigation_bg_color_opacity  . ';}';
		}
		
		if ($post_navigation_style == "prev_next_bg_color_simple") {
			if ($post_navigation_text_color != "") $post_navigation_css .= '.post-navigation.extended{color:' . $post_navigation_text_color . ';}';
			if ($post_navigation_bg_color != "") $post_navigation_css .= '.post-navigation.extended:after{background:' . $post_navigation_bg_color . ';}';
			if ($post_navigation_bg_color_opacity != "") $post_navigation_css .= '.post-navigation.extended:after{opacity:' . $post_navigation_bg_color_opacity  . ';}';
		}
		
		if ($post_navigation_style == "prev_next_bg_color_title_simple") {
			if ($post_navigation_text_color != "") $post_navigation_css .= '.post-navigation.extended.text{color:' . $post_navigation_text_color . ';}';
			if ($post_navigation_bg_color != "") $post_navigation_css .= '.post-navigation.extended.text:after{background:' . $post_navigation_bg_color . ';}';
			if ($post_navigation_bg_color_opacity != "") $post_navigation_css .= '.post-navigation.extended.text:after{opacity:' . $post_navigation_bg_color_opacity  . ';}';
		}
		
		wp_add_inline_style( 'myriadwp-brankic-style', $post_navigation_css.$post_related_posts_css );
		

		// post single hero-holder
		
		$post_hero_holder_background_color = brankic_global_or_local("post_hero_holder_background_color");
		$post_hero_holder_background_color_opacity = brankic_global_or_local("post_hero_holder_background_color_opacity");
		$post_hero_holder_title_color = brankic_global_or_local("post_hero_holder_title_color");
		$post_hero_holder_title_weight = brankic_global_or_local("post_hero_holder_title_weight");
		
		$post_hero_css = "";
		
		if ($post_hero_holder_title_color != "") $post_hero_css .= '.single-post .brankic_hero .entry-title, .single-post .brankic_hero{color:' . $post_hero_holder_title_color . ';}';
		if ($post_hero_holder_title_weight != "") $post_hero_css .= '.single-post .brankic_hero .entry-title{font-weight:' . $post_hero_holder_title_weight . ';}';
		if ($post_hero_holder_background_color != "") $post_hero_css .= '.brankic_hero .row-bg.background-color{background:' . $post_hero_holder_background_color . ';}';
		if ($post_hero_holder_background_color_opacity != "") $post_hero_css .= '.brankic_hero .row-bg.background-color{opacity:' . $post_hero_holder_background_color_opacity  . ';}';
		wp_add_inline_style( 'myriadwp-brankic-style', $post_hero_css );
		
		//post comment button
		


		
		$comment_button_text_color = brankic_of_get_option("comment_button_text_color", brankic_of_get_default("comment_button_text_color"));
		$comment_button_text_hover_color = brankic_of_get_option("comment_button_text_hover_color", brankic_of_get_default("comment_button_text_hover_color"));
		$comment_button_bg_color = brankic_of_get_option("comment_button_bg_color", brankic_of_get_default("comment_button_bg_color"));
		$comment_button_bg_color_2 = brankic_of_get_option("comment_button_bg_color_2", brankic_of_get_default("comment_button_bg_color_2"));
		$comment_button_bg_hover_color = brankic_of_get_option("comment_button_bg_hover_color", brankic_of_get_default("comment_button_bg_hover_color"));
		$comment_button_bg_hover_color_2 = brankic_of_get_option("comment_button_bg_hover_color_2", brankic_of_get_default("comment_button_bg_hover_color_2"));
		$comment_button_hover = brankic_of_get_option("comment_button_hover", brankic_of_get_default("comment_button_hover"));
		
		$post_comment_button_css = "";
		
		$comment_form_layout = brankic_of_get_option("comment_form_layout", brankic_of_get_default("comment_form_layout"));
		$comment_button_default_background = brankic_of_get_option("comment_button_default_background", brankic_of_get_default("comment_button_default_background"));
		if ($comment_form_layout == "default" && $comment_button_default_background != "") $post_comment_button_css .= '#commentform input, #commentform textarea, #commentform select span:before{background-color:' . $comment_button_default_background . ';}'; 
	
		
		if ($comment_button_text_color != "") $post_comment_button_css .= '.post-password-form input[type="submit"], input#submit, .wp-block-search .wp-block-search__button{color:' . $comment_button_text_color . ';}';
		if ($comment_button_text_hover_color != "") $post_comment_button_css .= '.post-password-form input[type="submit"]:hover, input#submit:hover, .wp-block-search .wp-block-search__button:hover{color:' . $comment_button_text_hover_color . ';}';
		
		if ($comment_button_bg_color_2 != "" && $comment_button_bg_color != "") $post_comment_button_css .= '.post-password-form input[type="submit"], input#submit, .wp-block-search .wp-block-search__button{background-image:linear-gradient(' . $comment_button_hover . ', ' . $comment_button_bg_color . ' 0%, ' . $comment_button_bg_color_2 . ' 100%);}';
		if ($comment_button_bg_color_2 == "" && $comment_button_bg_color != "") $post_comment_button_css .= '.post-password-form input[type="submit"], input#submit, .wp-block-search .wp-block-search__button{background-color:' . $comment_button_bg_color . ';}'; 
		
		if ($comment_button_bg_hover_color_2 != "" && $comment_button_bg_hover_color != "") $post_comment_button_css .= '.post-password-form input[type="submit"]:hover, input#submit:hover, .wp-block-search .wp-block-search__button:hover{background-image:linear-gradient(' . $comment_button_hover . ', ' . $comment_button_bg_hover_color . ' 0%, ' . $comment_button_bg_hover_color_2 . ' 100%);}';
		if ($comment_button_bg_hover_color_2 == "" && $comment_button_bg_hover_color != "") $post_comment_button_css .= '.post-password-form input[type="submit"]:hover, input#submit:hover, .wp-block-search .wp-block-search__button:hover{background-color:' . $comment_button_bg_hover_color . ';}'; 
		
		wp_add_inline_style( 'myriadwp-brankic-style', $post_comment_button_css );
		
		
		
		
			if (function_exists("get_field")) {
				$post_custom_menu_font_color = get_field("post_custom_menu_font_color");
				if ($post_custom_menu_font_color){
					$post_custom_menu_font_color_css = '.header_default {color:' . $post_custom_menu_font_color . ';}';
					wp_add_inline_style( 'myriadwp-brankic-style', $post_custom_menu_font_color_css );
				}
			} 
		
		
		}
		
		if (is_archive() || is_search() || is_404()){
		
			$blog_navigation_text_color = brankic_of_get_option("archive_navigation_text_color", brankic_of_get_default("archive_navigation_text_color"));
			$blog_navigation_bg_color = brankic_of_get_option("archive_navigation_bg_color", brankic_of_get_default("archive_navigation_bg_color"));
			$blog_navigation_bg_color_opacity = brankic_of_get_option("archive_navigation_bg_color_opacity", brankic_of_get_default("archive_navigation_bg_color_opacity"));
			
			$navigation_css = "";
			if ($blog_navigation_text_color != "") $navigation_css .= '.wp-pagenavi{color:' . $blog_navigation_text_color . ';}';
			if ($blog_navigation_bg_color != "") $navigation_css .= '.wp-pagenavi{background:' . $blog_navigation_bg_color . ';}';
			if ($blog_navigation_bg_color_opacity != "") $navigation_css .= '.wp-pagenavi{opacity:' . $blog_navigation_bg_color_opacity . ';}';
			if ($blog_navigation_text_color != "") $navigation_css .= '.post-navigation{color:' . $blog_navigation_text_color . ';}';	
			if ($blog_navigation_bg_color != "") $navigation_css .= '.post-navigation{background:' . $blog_navigation_bg_color . ';}';
			if ($blog_navigation_bg_color_opacity != "") $navigation_css .= '.post-navigation{opacity:' . $blog_navigation_bg_color_opacity . ';}';
			
			wp_add_inline_style( 'myriadwp-brankic-style', $navigation_css );
		}
		
		$database_css = get_post_meta( get_the_ID(), '_brankic_custom_css', true);
		$database_css_2 = brankic_database_css_2();
		$database_css_3 = get_post_meta( get_the_ID(), 'myriad_brankic_custom_title_css', true);
		
	
		wp_add_inline_style( 'myriadwp-brankic-style', $database_css . $database_css_2 . $database_css_3 );
		
		if( class_exists('WooCommerce') ) {
			
			$woo_css = "";
			
			$woo_shop_hero_holder_background_color = brankic_of_get_option("woo_shop_hero_holder_background_color", brankic_of_get_default("woo_shop_hero_holder_background_color"));
			$woo_shop_hero_holder_background_color_opacity = brankic_of_get_option("woo_shop_hero_holder_background_color_opacity", brankic_of_get_default("woo_shop_hero_holder_background_color_opacity"));
			$woo_shop_hero_holder_title_color = brankic_of_get_option("woo_shop_hero_holder_title_color", brankic_of_get_default("woo_shop_hero_holder_title_color"));
			$woo_shop_hero_holder_title_weight = brankic_of_get_option("woo_shop_hero_holder_title_weight", brankic_of_get_default("woo_shop_hero_holder_title_weight"));
			
			$woo_account_hero_holder_background_color = brankic_of_get_option("woo_account_hero_holder_background_color", brankic_of_get_default("woo_account_hero_holder_background_color"));
			$woo_account_hero_holder_background_color_opacity = brankic_of_get_option("woo_account_hero_holder_background_color_opacity", brankic_of_get_default("woo_account_hero_holder_background_color_opacity"));
			$woo_account_hero_holder_title_color = brankic_of_get_option("woo_account_hero_holder_title_color", brankic_of_get_default("woo_account_hero_holder_title_color"));
			$woo_account_hero_holder_title_weight = brankic_of_get_option("woo_account_hero_holder_title_weight", brankic_of_get_default("woo_account_hero_holder_title_weight"));
			
			$woo_hero_holder_background_color = $woo_hero_holder_background_color_opacity = $woo_hero_holder_title_color = $woo_hero_holder_title_weight = "";
			
			if (is_cart() || is_checkout() || is_account_page()){
				$woo_hero_holder_background_color = $woo_account_hero_holder_background_color;
				$woo_hero_holder_background_color_opacity = $woo_account_hero_holder_background_color_opacity;
				$woo_hero_holder_title_color = $woo_account_hero_holder_title_color;
				$woo_hero_holder_title_weight = $woo_account_hero_holder_title_weight;
			}
			
			if (brankic_is_woo_shop()){
				$woo_hero_holder_background_color = $woo_shop_hero_holder_background_color;
				$woo_hero_holder_background_color_opacity = $woo_shop_hero_holder_background_color_opacity;
				$woo_hero_holder_title_color = $woo_shop_hero_holder_title_color;
				$woo_hero_holder_title_weight = $woo_shop_hero_holder_title_weight;
			}
			
			
			
			if ($woo_hero_holder_background_color_opacity != "") $woo_css .= '.woocommerce-page .brankic_hero .row-bg.background-color{opacity:' . $woo_hero_holder_background_color_opacity  . ';}';
			if ($woo_hero_holder_background_color != "") $woo_css .= '.woocommerce-page .brankic_hero .row-bg.background-color{background:' . $woo_hero_holder_background_color . ';}';
			if ($woo_hero_holder_title_color != "") $woo_css .= '.woocommerce-page .brankic_hero .post-title{color:' . $woo_hero_holder_title_color . ';}';
			if ($woo_hero_holder_title_weight != "") $woo_css .= '.woocommerce-page  .brankic_hero .post-title{font-weight:' . $woo_hero_holder_title_weight . ';}';
			
			$woo_content_width = brankic_of_get_option("woo_content_width", brankic_of_get_default("woo_content_width"));
			if ($woo_content_width == "fullwidth") $woo_post_width = ""; else $woo_post_width = $woo_content_width;
			
			if ($woo_post_width != ""){
				$woo_css .= '.woocommerce-page :not(footer) .main-container .row-container .row{max-width:' . $woo_post_width . '}' ;
				$woo_css .= '.woocommerce-page :not(footer) .main-container .row-container .row{--max-width:' . $woo_post_width . '}' ;
				$woo_css .= '.woocommerce-page :not(header) .main-container .row-container .row{max-width:' . $woo_post_width . '}' ;
				$woo_css .= '.woocommerce-page :not(header) .main-container .row-container .row{--max-width:' . $woo_post_width . '}' ;
				
				$woo_css .= '.woocommerce-page :not(header) .main-container .row-container .hero-holder{max-width:' . $woo_post_width . '}' ;
				$woo_css .= '.woocommerce-page :not(header) .main-container .row-container .hero-holder{--max-width:' . $woo_post_width . '}' ;
			}
			$woo_single_content_width = brankic_of_get_option("woo_single_content_width", brankic_of_get_default("woo_single_content_width"));
			if ($woo_single_content_width == "fullwidth") $woo_single_width = ""; else $woo_single_width = $woo_single_content_width;
			
			if ($woo_single_width != ""){
				$woo_css .= '.woocommerce-page.single-product :not(footer) .main-container .row-container .row{max-width:' . $woo_single_width . '}' ;
				$woo_css .= '.woocommerce-page.single-product :not(footer) .main-container .row-container .row{--max-width:' . $woo_single_width . '}' ;
				$woo_css .= '.woocommerce-page.single-product :not(header) .main-container .row-container .row{max-width:' . $woo_single_width . '}' ;
				$woo_css .= '.woocommerce-page.single-product :not(header) .main-container .row-container .row{--max-width:' . $woo_single_width . '}' ;
				
				$woo_css .= '.woocommerce-page.single-product :not(header) .main-container .row-container .hero-holder{max-width:' . $woo_single_width . '}' ;
				$woo_css .= '.woocommerce-page.single-product :not(header) .main-container .row-container .hero-holder{--max-width:' . $woo_single_width . '}' ;
			}
			
			$woo_single_change_header_colors = brankic_global_or_local("woo_single_change_header_colors");
			$woo_single_change_menu_new_color = brankic_global_or_local("woo_single_change_menu_new_color");
			
			if ($woo_single_change_header_colors  && brankic_global_or_local("default_header_bg_color") == ""){
				if ($woo_single_change_menu_new_color != "") $woo_css .= '.woocommerce-page.single-product .header_default .main-container {color:' . $woo_single_change_menu_new_color . ';}';
			}
			if ($woo_single_change_header_colors  && brankic_global_or_local("default_header_bg_color") != ""){
				if ($woo_single_change_menu_new_color != "") $woo_css .= '.woocommerce-page.single-product .header_default[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $woo_single_change_menu_new_color . ';}';
			}
			
			

			$woo_shop_change_header_colors = brankic_global_or_local("woo_shop_change_header_colors");
			$woo_shop_change_menu_new_color = brankic_global_or_local("woo_shop_change_menu_new_color");
			$woo_shop_change_header_colors_below = brankic_global_or_local("woo_shop_change_header_colors_below");
			$woo_shop_change_menu_new_color_below = brankic_global_or_local("woo_shop_change_menu_new_color_below");
			
			$woo_account_change_header_colors = brankic_global_or_local("woo_account_change_header_colors");
			$woo_account_change_menu_new_color = brankic_global_or_local("woo_account_change_menu_new_color");
			$woo_account_change_header_colors_below = brankic_global_or_local("woo_account_change_header_colors_below");
			$woo_account_change_menu_new_color_below = brankic_global_or_local("woo_account_change_menu_new_color_below");
			
			$woo_change_header_colors = "";
			$woo_change_menu_new_color = "";
			$woo_change_header_colors_below = "";
			$woo_change_menu_new_color_below = "";
			
			if (brankic_is_woo_account()){				
				$woo_change_header_colors = $woo_account_change_header_colors;
				$woo_change_menu_new_color = $woo_account_change_menu_new_color;
				$woo_change_header_colors_below = $woo_account_change_header_colors_below;
				$woo_change_menu_new_color_below = $woo_account_change_menu_new_color_below;				
			}
			
			if (brankic_is_woo_shop()){				
				$woo_change_header_colors = $woo_shop_change_header_colors;
				$woo_change_menu_new_color = $woo_shop_change_menu_new_color;
				$woo_change_header_colors_below = $woo_shop_change_header_colors_below;
				$woo_change_menu_new_color_below = $woo_shop_change_menu_new_color_below;	

				$woo_shop_shadow = brankic_of_get_option("woo_shop_shadow", brankic_of_get_default("woo_shop_shadow"));
				$woo_shop_shadow_color = brankic_of_get_option("woo_shop_shadow_color", brankic_of_get_default("woo_shop_shadow_color"));
				if ($woo_shop_shadow == "yes") $woo_css .= '.woocommerce-page .box-shadow {box-shadow: 0 10px 40px 0 ' . $woo_shop_shadow_color . ';}';				
			}
			
			if ($woo_change_header_colors  && brankic_global_or_local("default_header_bg_color") == ""){
				if ($woo_change_menu_new_color != "") $woo_css .= '.woocommerce-page .header_default.new_header_colors .main-container {color:' . $woo_change_menu_new_color . ';}';
			}
			if ($woo_change_header_colors  && brankic_global_or_local("default_header_bg_color") != ""){
				if ($woo_change_menu_new_color != "") $woo_css .= '.woocommerce-page .header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $woo_change_menu_new_color . ';}';
			}
			
			
			if ($woo_change_header_colors_below  && brankic_global_or_local("default_header_bg_color") == ""){
				if ($woo_change_menu_new_color_below != "") $woo_css .= '.woocommerce-page .header_default.new_content_header_colors .main-container {color:' . $woo_change_menu_new_color_below . ';}';
			}
			if ($woo_change_header_colors_below  && brankic_global_or_local("default_header_bg_color") != ""){
				if ($woo_change_menu_new_color_below != "") $woo_css .= '.woocommerce-page .header_default.new_content_header_colors[data-header_bg_color="true"]:not(.scrolled) .main-container {color:' . $woo_change_menu_new_color_below . ';}';
			}
			
			//woo color scheme
			
			$woo_color_scheme_color_1 = brankic_of_get_option("woo_color_scheme_color_1", brankic_of_get_default("woo_color_scheme_color_1"));
			$woo_color_scheme_color_2 = brankic_of_get_option("woo_color_scheme_color_2", brankic_of_get_default("woo_color_scheme_color_2"));
			
			$woo_text_color_scheme_color_1 = brankic_of_get_option("woo_text_color_scheme_color_1", brankic_of_get_default("woo_text_color_scheme_color_1"));
			$woo_text_color_scheme_color_2 = brankic_of_get_option("woo_text_color_scheme_color_2", brankic_of_get_default("woo_text_color_scheme_color_2"));
			
			if ($woo_color_scheme_color_1 != "") {
				$woo_css .= '.woocommerce input.button:hover,
.woocommerce #respond input#submit:hover, 
.woocommerce a.button:hover, 
.woocommerce button.button:hover, 
.woocommerce input.button:hover,
button.single_add_to_cart_button.button.alt:hover,
.woocommerce-NoticeGroup, .woocommerce-NoticeGroup  .woocommerce-error,
.woocommerce-NoticeGroup  .woocommerce-error,
.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover,
.woocommerce #payment .place-order .button,
.woocommerce-error, 
.woocommerce-message,
.woocommerce-info,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.cart-content .widget_shopping_cart_content .woocommerce-mini-cart__buttons.buttons a:hover,
.cart-content .widget_shopping_cart_content .woocommerce-mini-cart__buttons.buttons a:first-child:hover,
.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
   background-color: ' . $woo_color_scheme_color_1 . '!important;--background-color: ' . $woo_color_scheme_color_1 . '!important;}
   ';

$woo_css .= '.woocommerce form .form-row .required,
.woocommerce .star-rating span::before,
.woocommerce .woocommerce-review-link,
.woocommerce #review_form #respond form p.stars span,
.woocommerce-form-login a, 
.woocommerce-form-login .required,
.woocommerce-checkout-review-order .order-total .amount,
.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item--chosen a {
    color: ' . $woo_color_scheme_color_1 . '!important;}
	';

$woo_css .= '.woocommerce form .form-row.woocommerce-invalid .select2-container, 
.woocommerce form .form-row.woocommerce-invalid input.input-text, 
.woocommerce form .form-row.woocommerce-invalid select,
.woocommerce form .form-row.woocommerce-invalid .select2-container, 
.woocommerce form .form-row.woocommerce-invalid input.input-text, 
.woocommerce form .form-row.woocommerce-invalid select {
    border-color: ' . $woo_color_scheme_color_1 . '!important;}
	';

		}
			if ($woo_color_scheme_color_2 != "") {
				$woo_css .= '.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button,
.woocommerce a.added_to_cart,
.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt.disabled:hover, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled:hover, 
.woocommerce #respond input#submit.alt[disabled]:disabled, 
.woocommerce #respond input#submit.alt[disabled]:disabled:hover, 
.woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, 
.woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, 
.woocommerce a.button.alt[disabled]:disabled, .woocommerce a.button.alt[disabled]:disabled:hover, 
.woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, 
.woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, 
.woocommerce button.button.alt[disabled]:disabled, .woocommerce button.button.alt[disabled]:disabled:hover, 
.woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, 
.woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, 
.woocommerce input.button.alt[disabled]:disabled, .woocommerce input.button.alt[disabled]:disabled:hover,
.woocommerce ul.products li.product .onsale,
button.single_add_to_cart_button.button.alt,
input.single_add_to_cart_button[type="button"],
.woocommerce #respond input#submit.alt, 
.woocommerce button.button.alt, .woocommerce input.button.alt,
.woocommerce #payment .place-order .button:hover,
.woocommerce-page table.cart a.remove:hover,
.woocommerce table.cart button.button.disabled:hover, 
.woocommerce table.cart button.button:disabled[disabled]:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.cart-content .widget_shopping_cart_content .woocommerce-mini-cart__buttons.buttons a,
.woocommerce .cart div.quantity .plus:hover,
.woocommerce .cart div.quantity .minus:hover{background-color:' . $woo_color_scheme_color_2 . '!important;--background-color:' . $woo_color_scheme_color_2 . '!important;}
';
			}
			
if ($woo_text_color_scheme_color_1 != "") {			
			$woo_css .= '.woocommerce input.button:hover,
.woocommerce #respond input#submit:hover, 
.woocommerce a.button:hover, 
.woocommerce button.button:hover, 
.woocommerce input.button:hover,
.woocommerce-NoticeGroup  .woocommerce-error,
.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
.woocommerce-error, 
.woocommerce-info, 
.woocommerce-message,
.woocommerce ul.order_details,
.cart-content .widget_shopping_cart_content .woocommerce-mini-cart__buttons.buttons a:hover,
.cart-content .widget_shopping_cart_content .woocommerce-mini-cart__buttons.buttons a:first-child:hover,
button.single_add_to_cart_button.button.alt:hover,
.cart-content .widget_shopping_cart_content .woocommerce-mini-cart__buttons.buttons a.button.checkout:hover {
    color: ' . $woo_text_color_scheme_color_1 . '!important;}
	';
}	

if ($woo_text_color_scheme_color_2 != "") {			
			$woo_css .= '.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button,
.woocommerce a.added_to_cart,
.place-order button.alt:hover,
.cart_totals .button.alt:hover,
.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt.disabled:hover, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled:hover, 
.woocommerce #respond input#submit.alt[disabled]:disabled, 
.woocommerce #respond input#submit.alt[disabled]:disabled:hover, 
.woocommerce a.button.alt.disabled, 
.woocommerce a.button.alt.disabled:hover, 
.woocommerce a.button.alt:disabled, 
.woocommerce a.button.alt:disabled:hover, 
.woocommerce a.button.alt[disabled]:disabled, 
.woocommerce a.button.alt[disabled]:disabled:hover, 
.woocommerce button.button.alt.disabled, 
.woocommerce button.button.alt.disabled:hover, 
.woocommerce button.button.alt:disabled, 
.woocommerce button.button.alt:disabled:hover, 
.woocommerce button.button.alt[disabled]:disabled, 
.woocommerce button.button.alt[disabled]:disabled:hover, 
.woocommerce input.button.alt.disabled, 
.woocommerce input.button.alt.disabled:hover, 
.woocommerce input.button.alt:disabled, 
.woocommerce input.button.alt:disabled:hover, 
.woocommerce input.button.alt[disabled]:disabled, 
.woocommerce input.button.alt[disabled]:disabled:hover,
.woocommerce ul.products li.product .onsale,
button.single_add_to_cart_button.button.alt,
input.single_add_to_cart_button[type="button"],
.woocommerce #respond input#submit.alt, 
.woocommerce-page table.cart a.remove:hover, 
.woocommerce table.cart button.button.disabled:hover, 
.woocommerce table.cart button.button:disabled[disabled]:hover,
.woocommerce .cart div.quantity .plus:hover,
.woocommerce .cart div.quantity .minus:hover,
.cart-content .widget_shopping_cart_content .woocommerce-mini-cart__buttons.buttons a.button.checkout{
    color: ' . $woo_text_color_scheme_color_2 . '!important;}
	';
}			
			
			
			
			
			wp_add_inline_style( 'myriadwp-brankic-style', $woo_css );
		}
		
}

add_action( 'wp_enqueue_scripts', 'myriadwp_enqueue_styles_scripts');

function brankic_database_css_2(){
	$css_return = "";
	for ($i = 0 ; $i < 10 ; $i++) {
		$css = get_option( 'wpb_widget-' . $i . '_brankic_brand_icons');
		$css_2 = get_option( 'brankic_button_widget-' . $i . '_brankic_button');
		if ($css != "") $css_return .= $css;
		if ($css_2 != "") $css_return .= $css_2;
	}
	
	$database_brankic_new_menu_color_css = get_post_meta( get_the_ID(), 'brankic_new_menu_color_css', true);
	$database_brankic_new_menu_color_css_post = get_post_meta( get_the_ID(), 'brankic_new_menu_color_css', true);
	
	$css_return .= $database_brankic_new_menu_color_css . $database_brankic_new_menu_color_css_post; 

	return $css_return;
}



function myriadwp_admin_styles($hook) 
{   
    wp_enqueue_style('thickbox'); 
	

	wp_enqueue_script( 'media-upload' );
	wp_enqueue_media();

	if ($hook == "appearance_page_options-framework"){
		wp_enqueue_script( 'myriadwp-gwf-handler', get_template_directory_uri() . '/inc/brankic_google_web_fonts_handler.js');
		wp_localize_script( 'myriadwp-gwf-handler', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}
	
	
}
add_action('admin_enqueue_scripts', 'myriadwp_admin_styles'); 

remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

function brankic_check_font_family($font_family){
	if (substr_count($font_family, "google_web_font_") == 1) {
			
				$number = substr($font_family, strlen($font_family) - 1, 1);
				
				$font_family = brankic_of_get_option("google_web_font_family_" . $number, brankic_of_get_default("google_web_font_family_" . $number));
	}
	return	$font_family;
}

function brankic_string_to_class($string){
	$sum = 0;
	if (is_array($string)) {
		foreach($string as $key=>$value){

			if ($value != "" && !(is_array($value))){
				$key_array = str_split($key);

				$value_array = str_split($value);

				$key_sum = 0;
				$value_sum = 0;
				foreach($key_array as $letter){
					$key_sum += ord($letter);
				}
				foreach($value_array as $letter){
					$value_sum += ord($letter);
				}
				
				$sum += $key_sum + $value_sum; 
			}
		}
	} else {
		$array = str_split($string);
		
		foreach($array as $letter){
			$sum += ord($letter);
		}
	}

	return $sum;
}



function brankic_of_get_option($name, $default = false) {
	
 	$optionsframework_settings = get_option('optionsframework');
	
	$option_name  = "myriadwp";
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	} 
}




function brankic_theme_default_options_setup() {
	$default_options_array = array();
	$defaults = optionsframework_options();
	foreach($defaults as $key => $value) {
		
		if (isset($value["std"])) $default_options_array[$key] = $value["std"];
	}
	update_option("myriad_default_options_array", $default_options_array);
}

function brankic_theme_default_options_reset() {
	delete_option("myriad_default_options_array");
}

add_action( 'after_switch_theme', 'brankic_theme_default_options_reset');

add_action( 'after_setup_theme', 'brankic_theme_default_options_setup');

$default_options_array = get_option("myriad_default_options_array");	

function brankic_of_get_default( $option ) {

		global $default_options_array;
		if (isset($default_options_array[$option])){
			return $default_options_array[$option];
		} else {
			$defaults = optionsframework_options();
			 if ( isset( $defaults[$option]['std'] ) ) {
				  return $defaults[$option]['std'];
			 }
		}
		return false;
}

require_once get_parent_theme_file_path() . '/plugins/brankic_tgm_plugins.php';
require_once get_parent_theme_file_path() . '/options.php';

function create_std_array(){
	$defaults = optionsframework_options();
	foreach($defaults as $key => $value)
	if ($value["std"] != "") echo '"' . $key . '"=>"' .$value["std"] . '",';
}



$show_woocommerce =  brankic_of_get_option("show_woocommerce", brankic_of_get_default("show_woocommerce")); 
if (class_exists('WooCommerce')) require_once get_parent_theme_file_path() . '/woocommerce/brankic_woo.php';

function brankic_global_or_local($option, $local_option = "") {
	$global_option = brankic_of_get_option($option, brankic_of_get_default($option));
	if ($global_option == "no") $global_option = false;
	if ($global_option == "yes") $global_option = true;
	if (function_exists("get_field")) {
		
		if ($local_option == "") $local_option = get_field($option); else $local_option = get_field($local_option);
	} else $local_option = "";
	
	if ($local_option != null && $local_option != "null") return $local_option; else return $global_option;
}

add_filter('manage_posts_columns', 'brankic_posts_columns', 5);
add_action('manage_posts_custom_column', 'brankic_posts_custom_columns', 5, 2);

function brankic_posts_columns($defaults){
    $defaults['brankic_post_thumbs'] = esc_html__('Thumb', 'myriadwp');
    return $defaults;
}

function brankic_posts_custom_columns($column_name, $id){
    if($column_name === 'brankic_post_thumbs'){      
		if (has_post_thumbnail()){
			echo the_post_thumbnail( array(100, 60) );
		}
    }
}

require_once get_parent_theme_file_path() . '/inc/brankic_google_web_fonts.php';

function brankic_google_web_fonts_arrays($return = "families"){
	// check last update and create new arrays
	$variant = false;
	$subset = false;

		if ($return == "families") return (unserialize(get_option("google_web_font_families")));
		if ($return == "subsets") return (unserialize(get_option("google_web_font_subsets")));
		if ($return == "variants") return (unserialize(get_option("google_web_font_variants")));
				
}

add_action( 'widgets_init', 'brankic_myriadwp_widgets_init' );

function brankic_myriadwp_widgets_init() {

if ( function_exists('register_sidebar') ) {
	
    register_sidebar(array(
        'name' => 'Default Sidebar',
        'id' => 'custom_sidebar_1',
		'description' => esc_html__('Default sidebar for blog and archive pages. For more options (for pages and posts), install mandatory plugins', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
		
	if( function_exists('optionsframework_init') ) {
		register_sidebar(array(
			'name' => 'Sidebar 2',
			'id' => 'custom_sidebar_2',
			'description' => esc_html__('Sidebar 2 - install mandatory plugins', 'myriadwp'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div><!--END widget wrapper-->    ',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
		
		register_sidebar(array(
			'name' => 'Sidebar 3',
			'id' => 'custom_sidebar_3',
			'description' => esc_html__('Sidebar 3 - install mandatory plugins', 'myriadwp'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div><!--END widget wrapper-->    ',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	
	}
	
	
	if( class_exists('WooCommerce') ) {
		
		register_sidebar(array(
			'name' => 'WooCommerce_Shop',
			'id' => 'woocommerce_shop',
			'description' => esc_html__('Sidebar to use in WooCommerce shop pages', 'myriadwp'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div><!--END widget wrapper-->    ',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
		
		if( function_exists('optionsframework_init') ) {
				register_sidebar(array(
				'name' => 'WooCommerce_Product',
				'id' => 'woocommerce_product',
				'description' => esc_html__('Sidebar to use in WooCommerce product pages', 'myriadwp'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div><!--END widget wrapper-->    ',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
		}
	
	}
	
	register_sidebar(array(
        'name' => 'Footer_box_1',
        'id' => 'footer_box_1',
        'description' => esc_html__('1st box in footer. For more footer options, install mandatory plugins. ', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
    

if( function_exists('optionsframework_init') ) {
		
		
    register_sidebar(array(
        'name' => 'Footer_box_2',
        'id' => 'footer_box_2',
        'description' => esc_html__('2nd box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer_box_3',
        'id' => 'footer_box_3',
        'description' => esc_html__('3rd box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer_box_4',
        'id' => 'footer_box_4',
        'description' => esc_html__('4th box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Footer_box_5',
        'id' => 'footer_box_5',
        'description' => esc_html__('5th box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Footer_box_6',
        'id' => 'footer_box_6',
        'description' => esc_html__('6th box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => '2nd_Row_Footer_box_1',
        'id' => '2nd_row_footer_box_1',
        'description' => esc_html__('1st box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
    
    register_sidebar(array(
        'name' => '2nd_Row_Footer_box_2',
        'id' => '2nd_row_footer_box_2',
        'description' => esc_html__('2nd box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
    
    register_sidebar(array(
        'name' => '2nd_Row_Footer_box_3',
        'id' => '2nd_row_footer_box_3',
        'description' => esc_html__('3rd box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
    
    register_sidebar(array(
        'name' => '2nd_Row_Footer_box_4',
        'id' => '2nd_row_footer_box_4',
        'description' => esc_html__('4th box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => '2nd_Row_Footer_box_5',
        'id' => '2nd_row_footer_box_5',
        'description' => esc_html__('5th box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => '2nd_Row_Footer_box_6',
        'id' => '2nd_row_footer_box_6',
        'description' => esc_html__('6th box in footer', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Menu_Widget',
        'id' => 'menu_widget',
        'description' => esc_html__('Widget area of the menu', 'myriadwp'),
        'before_widget' => '<div class="secondary-menu"><div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper--></div>',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Mobile_Menu_Widget',
        'id' => 'mobile_menu_widget',
        'description' => esc_html__('Widget area of the mobile menu', 'myriadwp'),		
        'before_widget' => '<div class="mobile-menu-widget-holder"><div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper--></div>',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));	
	
	register_sidebar(array(
        'name' => 'Extra_Menu_Widget_1',
        'id' => 'extra_menu_widget_1',
        'description' => esc_html__('Widget area in Extra header', 'myriadwp'),
        'before_widget' => '<div class="secondary-menu"><div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper--></div>',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Extra_Menu_Widget_2',
        'id' => 'extra_menu_widget_2',
        'description' => esc_html__('Widget area in Extra header', 'myriadwp'),
        'before_widget' => '<div class="secondary-menu"><div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper--></div>',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Extra_Menu_Widget_3',
        'id' => 'extra_menu_widget_3',
        'description' => esc_html__('Widget area in Extra header', 'myriadwp'),
        'before_widget' => '<div class="secondary-menu"><div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper--></div>',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Overlay_Menu_Widget',
        'id' => 'overlay_menu_widget',
        'description' => esc_html__('Widget area in overlay', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Overlay_Menu_Widget_2',
        'id' => 'overlay_menu_widget_2',
        'description' => esc_html__('Right Widget area in Toggle Top', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	
	register_sidebar(array(
        'name' => 'Overlay_Menu_Widget_3',
        'id' => 'overlay_menu_widget_3',
        'description' => esc_html__('Bottom Widget area in Toggle Top', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!--END widget wrapper-->    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));
	

	
	
	
	
	register_sidebar(array(
        'name' => 'Lateral_Rotate_Text',
        'id' => 'lateral_rotate_text',
        'description' => esc_html__('Vertical area on the bottom of Lateral Toggle Left menu', 'myriadwp'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>    ',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>'
    ));



	
	} // end if options-framework	
    
}
}

add_theme_support( 'post-thumbnails' );

add_theme_support( 'post-formats', array( 'quote', 'link') );

$header_image_args = array(
	'default-image' => brankic_of_get_option("header_image", brankic_of_get_default("header_image"))
);
add_theme_support( 'custom-header', $header_image_args );

register_nav_menus( array(
	'default'         => esc_html__( 'Default Menu', 'myriadwp' ),
) );


function brankic_mobile_fallback() {
	ob_start();
		echo '<div class="main-menu"><ul id="sf-nav-mobile" class="main-menu submenu-dark sf-js-enabled sf-arrows">';
		 wp_list_pages('title_li=');
		 echo '</ul></div>';
	$html = ob_get_contents();
	ob_end_clean();	
    return $html;          
}
function brankic_empty_fallback() {
	$html = "";
    return $html;          
}
function brankic_simple_fallback() {
	ob_start();
		echo '<div class="main-menu"><ul id="sf-nav" class="main-menu submenu-dark sf-js-enabled sf-arrows">';
		 wp_list_pages('title_li=');
		 echo '</ul></div>';
	$html = ob_get_contents();
	ob_end_clean();	
    return $html;          
}
function brankic_overlay_fallback() {
              echo '<nav id="menu" class="slinky-menu"><ul>';
              wp_list_pages('title_li=');
              echo '</ul></nav>';
}



/**
 * Custom walker class for default menu for mobile menu.
 */
class Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    var $number = 1;


    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
		
        if ( $args->walker->has_children) $has_ul_class = " has-ul active"; else $has_ul_class = ""; 
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . $has_ul_class . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $atts = array();
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;    
		$item_output .= '</a>';
		if ($has_ul_class == " has-ul active") $item_output .= '<span class="sf-sub-indicator"></span>';
		
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
	 
	 
	 
	 
}


/**
 * Custom walker class for simple menu for flex toggle.
 */
class Lateral_Toggle_Flex_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {

        
    }
 

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;

		if ($item->object == "page") {
			$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($item->object_id), "full" );
		} else $featured_image_url = array("", "", "");
        // Build HTML.
		$output .= "\n" . '<li>' . "\n" . '<span class="background-image" style="background-image: url(' . $featured_image_url[0] . ');"></span>' . "\n";
		$output .= '<a href="' . $item->url . '"><span class="link">' . $item->title . '</span></a>' . "\n";

    }
}

class Overlay_Bg_Image_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );
 
        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
 
    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
 
        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
 
        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
 
        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
 
        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
		
	
		$attributes .= ' data-id="' . $item->title . '"';
 
        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/**
 * Custom walker class for simple menu for flex toggle.
 */
class Flow_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {

        
    }
 

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'swiper-slide menu-item-' . $item->ID;
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		
		$item_title = $item->title;
		

        // Build HTML.
		$output .= "\n" . '<li ' . $class_names . '>' . "\n";
		if (substr_count($class_names, "current_page_item" ) > 0 || substr_count($class_names, "current-menu-item" ) > 0) $a_class = ""; else $a_class = 'class="stroke"'; 
		$output .= '<a href="' . $item->url . '" ' . $a_class . '>' . $item_title . '</a>' . "\n";
    }
}

class Lateral_Left_Walker_Nav_Menu extends Walker_Nav_Menu {
    /**
     * What the class handles.
     *
     * @since 3.0.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
 
    /**
     * Database fields to use.
     *
     * @since 3.0.0
     * @todo Decouple this.
     * @var array
     *
     * @see Walker::$db_fields
     */
    public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
 
    /**
     * Starts the list before the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::start_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
 
        // Default class.
        $classes = array( 'sub-menu' );
 
        /**
         * Filters the CSS class(es) applied to a menu list element.
         *
         * @since 4.8.0
         *
         * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
        $output .= "{$n}{$indent}<ul$class_names>{$n}";
    }
 
    /**
     * Ends the list of after the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::end_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
    }
 
    /**
     * Starts the element output.
     *
     * @since 3.0.0
     * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
     *
     * @see Walker::start_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
 
        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param WP_Post  $item  Menu item data object.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
 
        /**
         * Filters the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
 
        $output .= $indent . '<li' . $id . $class_names .'>';
 
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
 
        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
 
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
 
        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );
 
        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
 
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'><span>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</span></a>';
        $item_output .= $args->after;
 
        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string   $item_output The menu item's starting HTML output.
         * @param WP_Post  $item        Menu item data object.
         * @param int      $depth       Depth of menu item. Used for padding.
         * @param stdClass $args        An object of wp_nav_menu() arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
 
    /**
     * Ends the element output, if needed.
     *
     * @since 3.0.0
     *
     * @see Walker::end_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Page data object. Not used.
     * @param int      $depth  Depth of page. Not Used.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }
 
} // Walker_Nav_Menu


function brankic_custom_css(){
		$option_colors_selectors = array("default_header_font_color" 			=> ".header_default, .single-post .header .main-container, header.lateral.lateral_left .outer-lateral a, header.lateral-toggle, header.lateral.lateral_left",
										 "default_header_font_color_single" 	=> ".single-post .header .main-container",
										"overlay_menu_menu_font_color"  		=> ".lateral-hidden-toggle-menu.slinky-menu a, 
																				.lateral-toggle-content .menu-flex li a, 
																				.lateral-toggle-content .lateral-toggle-menu.slinky-menu li a,
																				#menu-overlay .slinky-menu a, .menu-flow #carousel-menu a,
																				.slinky-menu li.menu-item-has-children:after",
										"overlay_menu_menu_hover_font_color" 	=> ".lateral-hidden-toggle-menu.slinky-menu a:hover, 
																				 .lateral-hidden-toggle-menu.slinky-menu li.current_page_item > a,
																				 .lateral-hidden-toggle-menu.slinky-menu li.current-menu-parent > a,
																				 .lateral-toggle-content .menu-flex li a:hover, 
																				 .lateral-toggle-content .lateral-toggle-menu li a:hover,
																				 .lateral-toggle-content .lateral-toggle-menu li.current_page_item > a, 
																				 .lateral-toggle-content .lateral-toggle-menu li.current-menu-parent > a,
																				 .lateral-toggle-content .lateral-toggle-menu li.current-menu-item > a,
																				 .menu-flow #carousel-menu li a:hover,
																				 .menu-flow #carousel-menu li.current_page_item > a, 
																				 .menu-flow #carousel-menu li.current-menu-parent > a,
																				 .menu-flow #carousel-menu li.current-menu-item > a,																		
																				 #menu-overlay .slinky-menu a:hover, .menu-flow #carousel-menu a:hover, 
																				 #menu-overlay .slinky-menu a:hover,
																				 #menu-overlay .slinky-menu li.current_page_item > a,
																				 #menu-overlay .slinky-menu li.current-menu-parent > a",
										"overlay_menu_font_transform"        	=> ".lateral-hidden-toggle-menu.slinky-menu a, .lateral-toggle-content .lateral-toggle-menu.slinky-menu a, .menu-flex li a, #menu-overlay .slinky-menu a, .menu-flow #carousel-menu a, .lateral .lateral-wrapper .lateral-menu.slinky-menu a",
										"overlay_menu_menu_text_weight"      	=> ".lateral-hidden-toggle-menu.slinky-menu a, .lateral-toggle-content .lateral-toggle-menu.slinky-menu a, .menu-flex li a, #menu-overlay .slinky-menu a, .menu-flow #carousel-menu a, .lateral .lateral-wrapper .lateral-menu.slinky-menu a",
										"overlay_menu_menu_line_height"      	=> ".lateral-hidden-toggle-menu.slinky-menu a, .lateral-toggle-content .lateral-toggle-menu.slinky-menu a, .menu-flex li a, #menu-overlay .slinky-menu a, .menu-flow #carousel-menu a, .lateral .lateral-wrapper .lateral-menu.slinky-menu a",
										"default_header_hover_font_color" 		=> ".main-menu li a:hover,
																			  .main-menu li.current_page_item > a, 
																			  .main-menu li.current-menu-parent > a,
																			  .main-menu li.current-menu-item > a,										 
																			.main-menu li a:hover, .main-menu li:hover a, .main-menu li.current-menu-ancestor > a,
																			.secondary-menu li a:hover, 																			
																			.lateral.lateral_left .lateral-menu li a:hover,
																			.lateral.lateral_left .lateral-menu li.current_page_item > a, 
																			.lateral.lateral_left .lateral-menu li.current-menu-parent > a,
																			.lateral.lateral_left .lateral-menu li.current-menu-item > a,												
																			.cart-toggle-trigger span:hover,
																			.cart-icon:hover",
										 "archive_navigation_text_color" 		=> ".wp-pagenavi .page-first, .wp-pagenavi .page-prev, .wp-pagenavi .page-next, .wp-pagenavi .page-last",
										 "archive_navigation_text_color_2" 		=> ".wp-pagenavi a, .wp-pagenavi span.expand",
										 "archive_navigation_text_color_3" 		=> ".wp-pagenavi a.current, .wp-pagenavi a:hover",
										 "archive_navigation_text_color_4" 		=> ".wp-pagenavi a.current:after",
	);
	
	$option_colors_declaration = array("default_header_font_color" => "color",
									   "default_header_font_color_single" => "color",				
										"overlay_menu_menu_font_color" => "color",
										"overlay_menu_menu_hover_font_color" => "color",
										"overlay_menu_font_transform" => "text-transform",
										"overlay_menu_menu_text_weight" => "font-weight",
										"overlay_menu_menu_line_height" => "line-height",
									   "default_header_hover_font_color" => "color",
									   "archive_navigation_text_color" => "color",
									   "archive_navigation_text_color_2" => "color", //rgba 0.3
									   "archive_navigation_text_color_3" => "color", // rgba 1
									   "archive_navigation_text_color_4" => "background-color", // rgba 0.2
	);
	$brankic_custom_css = "";
	foreach ($option_colors_selectors as $key => $selector){
		
		if (strpos($key, "default_header_border_color") !== false){
			$brankic_custom_css .= $selector . "{" . $option_colors_declaration[$key] . ":" . brankic_hex2rgb(brankic_global_or_local("default_header_border_color"), 0.5) . "} ";
		} else 
			if ($key == "overlay_bg_image_text_color"){ 
				$brankic_custom_css .= $selector . "{" . $option_colors_declaration[$key] . ":" . brankic_global_or_local($key) . "} ";
				$brankic_custom_css .= ".overlay-bg-image .search-button i.fa-search {color:  " . brankic_global_or_local($key) . "} ";
				
			} else 	
				if (strpos($key, "archive_navigation_text_color") !== false){
					if ($key == "archive_navigation_text_color" && brankic_global_or_local("archive_navigation_text_color") != "") $brankic_custom_css .= brankic_custom_css_one_line($selector, $option_colors_declaration[$key], brankic_global_or_local("archive_navigation_text_color"));
					if ($key == "archive_navigation_text_color_2" && brankic_global_or_local("archive_navigation_text_color") != "") $brankic_custom_css .= brankic_custom_css_one_line($selector, $option_colors_declaration[$key], brankic_hex2rgb(brankic_global_or_local("archive_navigation_text_color"), 0.3));
					if ($key == "archive_navigation_text_color_3" && brankic_global_or_local("archive_navigation_text_color") != "") $brankic_custom_css .= brankic_custom_css_one_line($selector, $option_colors_declaration[$key], brankic_hex2rgb(brankic_global_or_local("archive_navigation_text_color"), 1) . "!important");
					if ($key == "archive_navigation_text_color_4" && brankic_global_or_local("archive_navigation_text_color") != "") $brankic_custom_css .= brankic_custom_css_one_line($selector, $option_colors_declaration[$key], brankic_hex2rgb(brankic_global_or_local("archive_navigation_text_color"), 0.2));
				} else
						if (substr($key, -2, 2) == "_D") { 
							$key_D = substr($key, 0, -2);
							$brankic_custom_css .= brankic_custom_css_one_line($selector, $option_colors_declaration[$key], brankic_global_or_local($key_D));
						} else $brankic_custom_css .= brankic_custom_css_one_line($selector, $option_colors_declaration[$key], brankic_global_or_local($key));

	}
	if (brankic_global_or_local("default_header_hover_font_color") != "") $brankic_custom_css .= brankic_custom_css_one_line(".main-menu li a:hover, .main-menu li:hover a, .secondary-menu li a:hover", "opacity", "1");
	
	return $brankic_custom_css;	
}

function brankic_custom_css_one_line($selector, $property, $value){
	if ($value != "") return $selector . "{" . $property . ":" . $value . "} ";
	else return "";
}


function brankic_default_headings_css(){
	$headings_styles = array(  "size" => "font-size",
							   "size_custom" => "font-size",
							   "weight" => "font-weight",
							   "style" => "font-style",
							   "transform" => "text-transform",
							   "spacing" => "letter-spacing",
							   "height" => "line-height",
							   "height_custom" => "line-height");
							   
	$heading_css = "";
							   
	for ($i = 1 ; $i <=6 ; $i++){
		

		$h_size = brankic_of_get_option('h' . $i . '_size', brankic_of_get_default('h' . $i . '_size'));
		$h_size_custom = brankic_of_get_option('h' . $i . '_size_custom', brankic_of_get_default('h' . $i . '_size_custom'));
		$h_weight = brankic_of_get_option('h' . $i . '_weight', brankic_of_get_default('h' . $i . '_weight'));
		$h_style = brankic_of_get_option('h' . $i . '_style', brankic_of_get_default('h' . $i . '_style'));
		$h_transform = brankic_of_get_option('h' . $i . '_transform', brankic_of_get_default('h' . $i . '_transform'));
		$h_spacing = brankic_of_get_option('h' . $i . '_spacing', brankic_of_get_default('h' . $i . '_spacing'));
		$h_height = brankic_of_get_option('h' . $i . '_height', brankic_of_get_default('h' . $i . '_height'));
		$h_height_custom = brankic_of_get_option('h' . $i . '_height_custom', brankic_of_get_default('h' . $i . '_height_custom'));
		
		if ($h_size_custom != "") $h_size = $h_size_custom;
		if ($h_height_custom != "") $h_height = $h_height_custom;
		
		$heading_css .= 'h' . $i . '{font-size:' . $h_size . ';font-weight:' . $h_weight . ';font-style:' . $h_style . ';text-transform:' . $h_transform . ';letter-spacing:' . $h_spacing . ';line-height:' . $h_height . ';}';
		
	}
	
	$heading_css_r1 = '@media only screen and (max-width: 768px) {';

	for ($i = 1 ; $i <=6 ; $i++){		
		$h_size_r1 = brankic_of_get_option('h' . $i . '_size_r1', brankic_of_get_default('h' . $i . '_size_r1'));
		$h_size_custom_r1 = brankic_of_get_option('h' . $i . '_size_custom_r1', brankic_of_get_default('h' . $i . '_size_custom_r1'));
		$h_spacing_r1 = brankic_of_get_option('h' . $i . '_spacing_r1', brankic_of_get_default('h' . $i . '_spacing_r1'));
		$h_height_r1 = brankic_of_get_option('h' . $i . '_height_r1', brankic_of_get_default('h' . $i . '_height_r1'));
		$h_height_custom_r1 = brankic_of_get_option('h' . $i . '_height_custom_r1', brankic_of_get_default('h' . $i . '_height_custom_r1'));
		
		if ($h_size_custom_r1 != "") $h_size_r1 = $h_size_custom_r1;
		if ($h_height_custom_r1 != "") $h_height_r1 = $h_height_custom_r1;
		
		$heading_css_r1 .= 'h' . $i . '{font-size:' . $h_size_r1 . ';letter-spacing:' . $h_spacing_r1 . ';line-height:' . $h_height_r1 . ';}';
		
	}
	$heading_css_r1 .= '}';
	
	$heading_css_r2 = '@media only screen and (max-width: 468px) {';

	for ($i = 1 ; $i <=6 ; $i++){		
		$h_size_r2 = brankic_of_get_option('h' . $i . '_size_r2', brankic_of_get_default('h' . $i . '_size_r2'));
		$h_size_custom_r2 = brankic_of_get_option('h' . $i . '_size_custom_r2', brankic_of_get_default('h' . $i . '_size_custom_r2'));
		$h_spacing_r2 = brankic_of_get_option('h' . $i . '_spacing_r2', brankic_of_get_default('h' . $i . '_spacing_r2'));
		$h_height_r2 = brankic_of_get_option('h' . $i . '_height_r2', brankic_of_get_default('h' . $i . '_height_r2'));
		$h_height_custom_r2 = brankic_of_get_option('h' . $i . '_height_custom_r2', brankic_of_get_default('h' . $i . '_height_custom_r2'));
		
		if ($h_size_custom_r2 != "") $h_size_r2 = $h_size_custom_r2;
		if ($h_height_custom_r2 != "") $h_height_r2 = $h_height_custom_r2;
		
		$heading_css_r2 .= 'h' . $i . '{font-size:' . $h_size_r2 . ';letter-spacing:' . $h_spacing_r2 . ';line-height:' . $h_height_r2 . ';}';
		
	}
	$heading_css_r2 .= '}';
	
	return $heading_css.$heading_css_r1.$heading_css_r2;
							   
}



function brankic_custom_css_link_highlight_colors($highlight_background_color_1 = "", $highlight_background_color_2 = ""){
	$default_highlight_text_color = brankic_of_get_option("default_highlight_text_color", brankic_of_get_default("default_highlight_text_color"));
	$default_highlight_text_bg_color = brankic_of_get_option("default_highlight_text_bg_color", brankic_of_get_default("default_highlight_text_bg_color"));
	$default_highlight_text_bg_color_2 = brankic_of_get_option("default_highlight_text_bg_color_2", brankic_of_get_default("default_highlight_text_bg_color_2"));
	
	$inline_css = '.highlight.underline, .highlight.overlay, .highlight.line-through, .highlight.line-through.in-back, .highlight.underline-through{color:' . $default_highlight_text_color . ';}';
	$inline_css .= '.highlight.underline::after, .highlight.overlay::after, .highlight.line-through::after, .highlight.line-through.in-back::after, .highlight.underline-through::after {background:linear-gradient(120deg,' . $default_highlight_text_bg_color . ' 0%,' . $default_highlight_text_bg_color_2 . ' 100%);}';
	

	
	
	
	if ($highlight_background_colors != ""){
	
	
	if ($highlight_background_colors != "") {
		$highlight_background_colors_array = explode(",", $highlight_background_colors);
		$highlight_background_colors_array = array_map('trim', $highlight_background_colors_array);
	}
	
	$highlight_color_1 = array();
	$highlight_color_2 = array();
	
	for($i = 0 ; $i < count($highlight_background_colors_array) ; $i = $i + 2){
		$j = ceil($i / 2);
		
		$highlight_color_1[$j] = $highlight_background_colors_array[$i];
		
		if (isset($highlight_background_colors_array[$i+1])) $highlight_color_2[$j] = $highlight_background_colors_array[$i+1]; else $highlight_color_2[$j] = "";
		
	}
	
	for($j = 0 ; $j < count($highlight_color_1) ; $j++){
		
			if ($highlight_color_2[$j] != ""){
				
				$inline_css .= '#highlight_' . $j . '.highlight::after { background: linear-gradient(120deg, ' . $highlight_color_1[$j] . ' 0%, ' . $highlight_color_2[$j] . ' 100%)} ';
			} else {
				
				$inline_css .= '#highlight_' . $j . '.highlight::after { background: ' . $highlight_color_1[$j] . ';} ';
			}
		
	}
	
	}
	
	return $inline_css;
}

function brankic_hex2rgb($hex, $opacity) {
// http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
	if ($hex == "") return "";
	else {
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   return "rgba(" . implode(",", $rgb) . "," . $opacity . ")";
	}
}


function brankic_convertToDecimal ($fraction)
{
	$numbers=explode("/",$fraction);
	return round($numbers[0]/$numbers[1],6);
}

function brankic_thumb_size_proportion($proportion){
	$thumb_sizes_proportion_array = array("originalx1024" => "brankic-original-1024", "originalx512" => "brankic-original-512", "originalx300" => "brankic-original-300", "4x3" => "brankic-1024-768", "3x4" => "brankic-768-1024", "4x3_s" => "brankic-512-384", "3x4_s" => "brankic-384-512", "2x1" => "brankic-1024-512", "1x2" => "brankic-512-1024", "2x2" => "brankic-1024-1024", "1x1" => "brankic-512-512");
	if (array_key_exists($proportion, $thumb_sizes_proportion_array)) return $thumb_sizes_proportion_array[$proportion];
	else return "brankic-original-1024";
}

function brankic_featured_image_url($thumb_sizes, $override = "") {

	$return_value = array(); // [0] - image url ;
	$thumb_sizes_array = array("full", "brankic-original-1024", "brankic-original-512", "brankic-original-300", "brankic-1024-768", "brankic-768-1024", "brankic-1024-512", "brankic-512-1024", "brankic-1024-1024", "brankic-512-512", "brankic-512-384", "brankic-384-512");	
	$thumb_sizes_proportion_array = array("full" => "full", "originalx1024" => "brankic-original-1024", "originalx512" => "brankic-original-512", "originalx300" => "brankic-original-300", "4x3" => "brankic-1024-768", "3x4" => "brankic-768-1024", "4x3_s" => "brankic-512-384", "3x4_s" => "brankic-384-512", "2x1" => "brankic-1024-512", "1x2" => "brankic-512-1024", "2x2" => "brankic-1024-1024", "1x1" => "brankic-512-512");

	if ($thumb_sizes == "all_random") {
		
		$thumb_size = $thumb_sizes_array[array_rand($thumb_sizes_array)];
		$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumb_size );
			
	} else {
		if (array_key_exists($thumb_sizes, $thumb_sizes_proportion_array)) $featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumb_sizes_proportion_array[$thumb_sizes] );
		else $featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumb_sizes );
	}

	if (isset($featured_image_url[0])) {
		$return_value[0] = $featured_image_url[0];
		return $return_value;
	} else {
		$return_value[0] = "";
		return $return_value;
	}
}



function brankic_google_web_fonts_handler(){
	$family = $_GET["value"];
	$variants = brankic_google_web_fonts_arrays("variants");
	$subsets = brankic_google_web_fonts_arrays("subsets");
	$variants_css = ":";
	$variants_css .= $variants[$family];
	$subsets_css = "&subset=";
	$subsets_css .= $subsets[$family];

	$family_safe = str_replace(" ", "+", $family);
	$output = $family_safe . "" . $variants_css . "" . $subsets_css; 
	echo esc_textarea($output);
}

add_action('wp_ajax_brankic_google_web_fonts_handler', 'brankic_google_web_fonts_handler');
add_action('wp_ajax_nopriv_brankic_google_web_fonts_handler', 'brankic_google_web_fonts_handler');

// Callback function to insert 'styleselect' into the $buttons array
function brankic_my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'brankic_my_mce_buttons_2' );

// Callback function to filter the MCE settings
function brankic_my_mce_before_init_insert_formats( $init_array ) {  
	
	$custom_fonts_array = array();
	 for ($i = 1 ; $i <=4 ; $i++) {
		 $google_web_font = brankic_of_get_option("google_web_font_family_" . $i, brankic_of_get_default("google_web_font_family_" . $i));
		 $custom_fonts_array[] = array('title' => $google_web_font,  
										'block' => 'span',  
										'classes' => 'google_web_font_' . $i,
										'wrapper' => true);
	 }
	
	$hover_formats = array(
		array('title' => 'a hover underline',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover underline',
			'wrapper' => false,
		),
		array('title' => 'a hover underline visible',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover underline visible',
			'wrapper' => false,
		),
		array('title' => 'a hover line-through',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover line-through',
			'wrapper' => true,
		),
		array('title' => 'a hover line-through visible',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover line-through visible',
			'wrapper' => true,
		),
		array('title' => 'a hover line-through in-back',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover line-through in-back',
			'wrapper' => true,
		),
		array('title' => 'a hover line-through in-back visible',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover line-through in-back visible',
			'wrapper' => true,
		),
		array('title' => 'a hover underline-through',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover underline-through',
			'wrapper' => true,
		),
		array('title' => 'a hover underline-through visible',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover underline-through visible',
			'wrapper' => true,
		),
		array('title' => 'a hover overlay',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover overlay',
			'wrapper' => true,
		),
		array('title' => 'a hover overlay visible',  
			'inline' => 'span',  
			'classes' => 'highlight a_hover overlay visible',
			'wrapper' => true,
		),
		array('title' => 'highlight underline',  
			'inline' => 'span',  
			'classes' => 'highlight underline',
		),
		array('title' => 'highlight overlay',  
			'inline' => 'span',  
			'classes' => 'highlight overlay',
		),
		array('title' => 'highlight line-through',  
			'inline' => 'span',  
			'classes' => 'highlight line-through',
		),
		array('title' => 'highlight line-through in-back',  
			'inline' => 'span',  
			'classes' => 'highlight line-through in-back',
		),
		array('title' => 'highlight underline-through',  
			'inline' => 'span',  
			'classes' => 'highlight underline-through',
		),
		array('title' => 'gradient',  
			'inline' => 'span',  
			'classes' => 'gradient',
		),
		array('title' => 'stroke',  
			'inline' => 'span',  
			'classes' => 'stroke',
		),
	);
	
	// Define the style_formats array
	
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'outset left',  
			'inline' => 'span',  
			'classes' => 'outset left',	
		),
		array(  
			'title' => 'outset right',  
			'inline' => 'span',  
			'classes' => 'outset right',			
		),
		array(  
			'title' => 'outset both side',  
			'inline' => 'span',  
			'classes' => 'outset left_right',			
		),
		
		array(  
			'title' => 'small.uppercase',  
			'block' => 'small',  
			'classes' => 'uppercase',
			'wrapper' => true,
			
		),  
		array(  
			'title' => '.uppercase',  
			'inline' => 'span',  
			'classes' => 'uppercase',			
		),
		array(  
			'title' => 'small',  
			'block' => 'small',  
			'classes' => '',
			'wrapper' => true,
		),
		array(  
			'title' => 'rotate words',  
			'inline' => 'span',  
			'classes' => 'rotate_words',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'glitch',  
			'inline' => 'span',  
			'classes' => 'glitch',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'Weight 100',  
			'inline' => 'span',  
			'classes' => 'w-100',			
		),
		array(  
			'title' => 'Weight 200',  
			'inline' => 'span',  
			'classes' => 'w-200',			
		),
		array(  
			'title' => 'Weight 300',  
			'inline' => 'span',  
			'classes' => 'w-300',			
		),
		array(  
			'title' => 'Weight 400',  
			'inline' => 'span',  
			'classes' => 'w-400',			
		),
		array(  
			'title' => 'Weight 500',  
			'inline' => 'span',  
			'classes' => 'w-500',			
		),
		array(  
			'title' => 'Weight 600',  
			'inline' => 'span',  
			'classes' => 'w-600',			
		),
		array(  
			'title' => 'Weight 700',  
			'inline' => 'span',  
			'classes' => 'w-700',			
		),
		array(  
			'title' => 'Weight 800',  
			'inline' => 'span',  
			'classes' => 'w-800',			
		),
		array(  
			'title' => 'Weight 900',  
			'inline' => 'span',  
			'classes' => 'w-900',			
		),
	); 
	
	$style_formats = array_merge($style_formats, $custom_fonts_array, $hover_formats);
	
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'brankic_my_mce_before_init_insert_formats' ); 

function brankic_add_editor_styles() {
	$google_font_family_1 = brankic_of_get_option("google_web_font_family_1", brankic_of_get_default("google_web_font_family_1"));
	$google_font_family_2 = brankic_of_get_option("google_web_font_family_2", brankic_of_get_default("google_web_font_family_2"));
	$google_font_family_3 = brankic_of_get_option("google_web_font_family_3", brankic_of_get_default("google_web_font_family_3"));
	$google_font_family_4 = brankic_of_get_option("google_web_font_family_4", brankic_of_get_default("google_web_font_family_4"));
	
	$font_family_1_handler = "google-font-" . $google_font_family_1;
	$font_family_1_handler = str_replace(" ", "-", strtolower($font_family_1_handler));
	
	$font_family_2_handler = "google-font-" . $google_font_family_2;
	$font_family_2_handler = str_replace(" ", "-", strtolower($font_family_2_handler));
	
	$font_family_3_handler = "google-font-" . $google_font_family_3;
	$font_family_3_handler = str_replace(" ", "-", strtolower($font_family_3_handler));
	
	$font_family_4_handler = "google-font-" . $google_font_family_4;
	$font_family_4_handler = str_replace(" ", "-", strtolower($font_family_4_handler));
	
    if ($google_font_family_1) wp_enqueue_style( $font_family_1_handler, '//fonts.googleapis.com/css?family=' . brankic_of_get_option("google_web_font_family_1", brankic_of_get_default("google_web_font_family_1")) . ':' . brankic_of_get_option("google_web_font_family_variants_and_subsets_1", brankic_of_get_default("google_web_font_family_variants_and_subsets_1")) );
	if ($google_font_family_2) wp_enqueue_style( $font_family_2_handler, '//fonts.googleapis.com/css?family=' . brankic_of_get_option("google_web_font_family_2", brankic_of_get_default("google_web_font_family_2")) . ':' . brankic_of_get_option("google_web_font_family_variants_and_subsets_2", brankic_of_get_default("google_web_font_family_variants_and_subsets_2")) );
	if ($google_font_family_3) wp_enqueue_style( $font_family_3_handler, '//fonts.googleapis.com/css?family=' . brankic_of_get_option("google_web_font_family_3", brankic_of_get_default("google_web_font_family_3")) . ':' . brankic_of_get_option("google_web_font_family_variants_and_subsets_3", brankic_of_get_default("google_web_font_family_variants_and_subsets_3")) );
	if ($google_font_family_4) wp_enqueue_style( $font_family_4_handler, '//fonts.googleapis.com/css?family=' . brankic_of_get_option("google_web_font_family_4", brankic_of_get_default("google_web_font_family_4")) . ':' . brankic_of_get_option("google_web_font_family_variants_and_subsets_4", brankic_of_get_default("google_web_font_family_variants_and_subsets_4")) );

	$google_web_fonts_css = "";
	
	if ($google_font_family_1) $google_web_fonts_css .= '.google_web_font_1{font-family:' . $google_font_family_1 . '}';
	if ($google_font_family_2) $google_web_fonts_css .= '.google_web_font_2{font-family:' . $google_font_family_2 . '}';
	if ($google_font_family_3) $google_web_fonts_css .= '.google_web_font_3{font-family:' . $google_font_family_3 . '}';
	if ($google_font_family_4) $google_web_fonts_css .= '.google_web_font_4{font-family:' . $google_font_family_4 . '}';
	
	wp_add_inline_style( 'brankic-extra-fonts', $google_web_fonts_css );
	
}
add_action( 'init', 'brankic_add_editor_styles' );

function brankic_url_exists($url) {
	$file_headers = @get_headers($url);
	if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found' || $file_headers[0] == 'HTTP/1.1 503 Service Temporarily Unavailable') {
		$exists = false;
	}
	else {
		$exists = true;
	}
	return $exists;
}

function brankic_custom_font() {
	
	$main_font = brankic_of_get_option("main_font", brankic_of_get_default("main_font"));
	if ($main_font == "custom") $main_font = brankic_of_get_option("custom_main_font", brankic_of_get_default("custom_main_font"));
	return $main_font;
}



// http://www.wpexplorer.com/custom-excerpt-lengths-wordpress/
function brankic_excerpt($limit = 100, $echo = true, $ignore_defined_excerpt = false) {
	
	if ($ignore_defined_excerpt){
		if  ($echo) brankic_kc_excerpt($limit, true); else return brankic_kc_excerpt($limit, false);
	} else {
			if (has_excerpt()) {
				if  ($echo) echo get_the_excerpt(); else return get_the_excerpt();
			} else {
				if  ($echo) brankic_kc_excerpt($limit, true); else return brankic_kc_excerpt($limit, false);
			}
	}
	

	

 
}

/**
 * Return the URL for the first link found in the post content.
 *
 * https://wordpress.org/support/topic/grab-first-link-from-post-for-external-link
 *
 */
function brankic_twentyeleven_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

add_image_size( 'brankic-original-1024', 1024, 1024, false ); // originalx1024
add_image_size( 'brankic-original-512', 512, 512, false ); // originalx512
add_image_size( 'brankic-original-300', 300, 300, false ); // originalx300

add_image_size( 'brankic-1024-768', 1024, 768, true ); // 4x3
add_image_size( 'brankic-768-1024', 768, 1024, true ); // 3x4

add_image_size( 'brankic-512-384', 512, 384, true ); // 4x3 smaller
add_image_size( 'brankic-384-512', 384, 512, true ); // 3x4 smaller

add_image_size( 'brankic-1024-512', 1024, 512, true ); // 2x1
add_image_size( 'brankic-512-1024', 512, 1024, true ); // 1x2

add_image_size( 'brankic-512-256', 512, 256, true ); // 2x1 smaller
add_image_size( 'brankic-256-512', 256, 512, true ); // 1x2 smaller

add_image_size( 'brankic-1024-1024', 1024, 1024, true ); // 2x2
add_image_size( 'brankic-512-512', 512, 512, true ); // 1x1

add_image_size( 'brankic-384-256', 384, 256, true ); // 3x2 smaller
add_image_size( 'brankic-256-384', 256, 384, true ); // 2x3 smaller

add_image_size( 'brankic-576-384', 576, 384, true ); // 3x2 middle
add_image_size( 'brankic-384-576', 384, 576, true ); // 2x3 middle

// custom image sizes
$custom_sizes =  brankic_of_get_option("custom_sizes", brankic_of_get_default("custom_sizes"));
if ($custom_sizes != ""){
	$custom_sizes_array = explode(",", $custom_sizes);

	for ($i = 0 ; $i < count($custom_sizes_array) ; $i = $i + 2){
		$custom_width[] = $custom_sizes_array[$i]; 
		$custom_height[] = $custom_sizes_array[$i + 1];
	}
	for ($i = 0 ; $i < count($custom_width) ; $i++){
		add_image_size( 'brankic-' . $custom_width[$i] . '-' . $custom_height[$i] , $custom_width[$i], $custom_height[$i], true );
	}
}


function brankic_srcset($id = null, $size = "full", $show_sizes = true, $show_srcset = true){
	$srcset = "";
	if ($id == null) {
		if (get_post_thumbnail_id() != "") $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(), $size); 
		$id = get_post_thumbnail_id();
	} else $srcset = wp_get_attachment_image_srcset($id, $size);  
	$html = "";
	if ($srcset != "") { 
		$image_data = wp_get_attachment_image_src($id, $size);
		$img_width = $image_data[1]; 
		if ($show_sizes) $html .= ' sizes="(max-width: ' . $img_width . 'px) 100vw, ' . $img_width . 'px"';
		if ($show_srcset) $html .= ' srcset="' . esc_attr( $srcset ) . '"';		
	}
	return $html;
}

function brankic_featured_image_srcset($thumb_sizes, $override = "") {

	$return_value = array(); // [0] - image url ;
	$thumb_sizes_array = array("brankic-original-1024", "brankic-original-512", "brankic-original-300", "brankic-1024-768", "brankic-768-1024", "brankic-1024-512", "brankic-512-1024", "brankic-1024-1024", "brankic-512-512");	
	$thumb_sizes_proportion_array = array("originalx1024" => "brankic-original-1024", "originalx512" => "brankic-original-512", "originalx300" => "brankic-original-300", "4x3" => "brankic-1024-768", "3x4" => "brankic-768-1024", "2x1" => "brankic-1024-512", "1x2" => "brankic-512-1024", "2x2" => "brankic-1024-1024", "1x1" => "brankic-512-512");

	if ($thumb_sizes == "all_random") {
		
		$thumb_size = $thumb_sizes_array[array_rand($thumb_sizes_array)];
		$featured_image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(), $thumb_size );
			
	} else {
		if (array_key_exists($thumb_sizes, $thumb_sizes_proportion_array)) $featured_image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(), $thumb_sizes_proportion_array[$thumb_sizes] );
		else $featured_image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(), $thumb_sizes );
	}

	
	$return_value = $featured_image_srcset;

 	return $return_value;
}

function brankic_numeric_pagination() {

    if( is_singular() )
        return;
 
    global $wp_query;
	
	$archive_navigation_text_color = brankic_of_get_option("archive_navigation_text_color", brankic_of_get_default("archive_navigation_text_color"));
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
	$paged = get_query_var( 'paged', 1 ); 
	
	
	
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    ?><div class="wp-pagenavi text-align-center" style="color:<?php echo esc_attr($archive_navigation_text_color); ?>">
	<a class="page-first" href="<?php echo esc_url( get_pagenum_link( 1 ) ); ?>"><?php esc_html_e('First', 'myriadwp'); ?><i class="fa fa-angle-double-left"></i></a>
    <?php
	/** Previous Post Link */
    if ( get_previous_posts_link() ) echo get_previous_posts_link('<i class="fa fa-angle-left"></i>' . esc_html__('Prev', 'myriadwp'));
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
		
		if ($paged == 1) $class = ' class = "current"' ;  else $class = "";
 
        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<span class="expand">...</span>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
		
		if ($paged == $link) $class = ' class="current"'; else $class = "";
        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<span class="expand">...</span>' . "\n";
 
		if ($paged == $max) $class = ' class="current"'; else $class = "";
        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
	?><a class="page-last" href="<?php echo esc_url( get_pagenum_link( $max ) ); ?>"><?php esc_html_e('Last', 'myriadwp'); ?><i class="fa fa-angle-double-right"></i></a>
	<?php
    /** Next Post Link */
    if ( get_next_posts_link() ) echo get_next_posts_link(esc_html__('Next', 'myriadwp') . '<i class="fa fa-angle-right"></i>');
 
    ?></div><?php
 
}
 add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');

function posts_link_attributes_next() {
    return 'class="page-next"';
}
function posts_link_attributes_prev() {
    return 'class="page-prev"';
}

function brankic_main_post_media() {
	// check for Featured image / Extra images / Vimeo or YouTube URL / Audio Video custom field /

	if (function_exists("get_field")) {
		if (get_field("post_video_audio_from_media_library") != "") return "post_video_audio_from_media_library"; else
			if (get_field("post_video_url") != "") return "post_video_url"; else
					if (wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' )) return "featured_image"; else
						return "none";
	} else {
					if (wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' )) return "featured_image"; else
						return "none";
	}
	

}

function brankic_featured_video($video_file) {
	if (wp_is_mobile()){
	$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), "full" );
	$poster = $featured_image_url[0];
	} else $poster = "";
		
	echo wp_video_shortcode( array('src' => $video_file["url"], 'loop' => 'no', 'preload' => 'auto', 'poster' => $poster ));
}

function brankic_featured_audio($audio_file) {
	echo wp_audio_shortcode( array('src' => $audio_file, 'loop' => 'no', 'preload' => 'auto' ));
}

function brankic_is_youtube($video_url)
{
    if (strpos($video_url, "youtube.com") || strpos($video_url, "youtu.be")) return 1; else return 0;
}
function brankic_is_vimeo($video_url)
{
    if (strpos($video_url, "vimeo.com")) return 1; else return 0;
}
function brankic_is_swf($video_url)
{
    if (strpos($video_url, ".swf")) return 1; else return 0;
}
function brankic_is_mov($video_url)
{
    if (strpos($video_url, ".mov")) return 1; else return 0;
}

function brankic_get_youtube_id($url)
{
    preg_match('#https?://w?w?w?.?youtube.com/watch\?v=([A-Za-z0-9\-_]+)#s', $url, $matches);
    if ($matches[1] == "")
    {
        preg_match('#https?://w?w?w?.?youtu.be/([A-Za-z0-9\-_]+)#s', $url, $matches);
    }
    return $matches[1];
}
function brankic_get_vimeo_id($url)
{
    preg_match('#https?://w?w?w?.?vimeo.com/([A-Za-z0-9\-_]+)#s', $url, $matches);
    return $matches[1];
}

function brankic_link_format_url()
{
    $string = get_the_content();
	preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $string, $match);
	$urls = $match[0];
	foreach ($urls as $url) {
		echo esc_url($url);
	}

}

function brankic_featured_images_super_function($post_id = "", $include_featured_image = false,  $what_to_return = "urls")
{
	$featured_images_urls = array();
	$featured_images_captions = array();
	$featured_images_descriptions = array();
	$featured_images_ids = array();
	$featured_images_srcsets = array();
	
	if ($post_id == "") $post_id = get_the_ID();
	
	if ($include_featured_image) {
			$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), "full" );
			$featured_image_meta = get_post( get_post_thumbnail_id() );
			
			$featured_images_urls[] = $featured_image_url[0];
			$featured_images_captions[] = $featured_image_meta->post_excerpt;
			$featured_images_descriptions[] = $featured_image_meta->post_content;
			$featured_images_ids[] = get_post_thumbnail_id();
			
			$srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id()); 
			$featured_images_srcsets[] = ' srcset="' . esc_attr( $srcset ) . ' sizes="(max-width: 768px) 100vw, 640px"';
			
			
	}
	
	if( class_exists('Dynamic_Featured_Image') ) {
		global $dynamic_featured_image;
		$featured_images = $dynamic_featured_image->get_featured_images( $post_id );
		
		foreach($featured_images as $featured_image){
			
			$featured_image_id = $featured_image["attachment_id"];
			$featured_images_urls[] = $featured_image["full"];
			
			$attachment = get_post( $featured_image_id );
			$featured_images_captions[] = $attachment->post_excerpt;
			$featured_images_descriptions[] = $attachment->post_content;
			$featured_images_ids[] = $featured_image_id;
			
			$srcset = wp_get_attachment_image_srcset($featured_image_id); 
			$featured_images_srcsets[] = ' srcset="' . esc_attr( $srcset ) . ' sizes="(max-width: 768px) 100vw, 640px"';

		}
			
	}

	if ($what_to_return == "urls") return $featured_images_urls;
	if ($what_to_return == "captions") return $featured_images_captions;
	if ($what_to_return == "descriptions") return $featured_images_descriptions;
	if ($what_to_return == "ids") return $featured_images_ids;
	if ($what_to_return == "srcsets") return $featured_images_srcsets;
	 
}

function brankic_list_categories($taxonomy = "category", $separator = ", ", $echo = true) {
 	$html = "";
	global $post;
	$term_list = wp_get_post_terms($post->ID, $taxonomy, array("fields" => "names"));
	foreach($term_list as $cat_name){
		$html .= $cat_name . $separator;
	}
	$html = substr($html, 0, strlen($html) - strlen($separator));
	if ($echo) echo esc_attr($html);
	else return $html;
}

function brankic_get_categories($taxonomy = "category", $return = 'names_count') {
	
	$brankic_categories_names = array();
	$brankic_categories_count = array();
	$brankic_categories_names_count = array();
 	
	$options_portfolio_categories_obj = get_terms(array('taxonomy' => $taxonomy));
	
	foreach ($options_portfolio_categories_obj as $categori) {
		$brankic_categories_names[$categori->term_id] = $categori->name;
		$brankic_categories_count[$categori->term_id] = $categori->count;
		$brankic_categories_names_count[$categori->name . " (" .$categori->count . ")"] = $categori->slug;
	}
	if ($return == "names") return $brankic_categories_names;
	if ($return == "names_count") return $brankic_categories_names_count;
}

function brankic_duotone_class($color) {
	if ($color != "") {
		return "duotone_" . substr($color, 1);
	}
}

function brankic_background($bg_color, $bg_color_2, $bg_gradient_angle = "0", $bg_custom = ""){
	$style = "";
	if ($bg_custom != "") {
		$style = $bg_custom;
	} else {
		if ($bg_color != "" && $bg_color_2 == "") $style = 'background: ' . $bg_color ;
		if ($bg_color != "" && $bg_color_2 != "") $style = 'background: -webkit-linear-gradient(' . $bg_gradient_angle . 'deg, ' . $bg_color . ', ' . $bg_color_2 . ');';
	}
	return $style;
}

function brankic_contact_form_7_templates($return_what = "cf_7_titles", $color = "", $border_color = ""){
	
	$args = array(
	 'posts_per_page' => -1,
	 'orderby' => 'title',
	 'order' => 'ASC',
	 'post_type' => 'wpcf7_contact_form',
	 'post_status' => 'publish'
	);
	$cf_7_templates = get_posts( $args );
	$cf_7_titles = array();
	$cf_7_shortcodes = array();
	
	if ( $cf_7_templates ) {
		
		$cf_7_return = array();

		
		foreach ( $cf_7_templates as $cf_7_template ) {
			setup_postdata( $cf_7_template );
			
			$template_html_class = "";
			
			$template_id = $cf_7_template->ID;
			
			$template_title = $cf_7_template->post_title;
			
			if (substr_count($template_title, "Brankic Outlined") == 1) $template_html_class = 'html_class="form outlined"';
			if (substr_count($template_title, "Brankic Default") == 1) $template_html_class = 'html_class="form default"';
			if (substr_count($template_title, "Brankic Table") == 1) $template_html_class = 'html_class="form table"';
			if (substr_count($template_title, "Brankic Minimal") == 1) $template_html_class = 'html_class="form minimal"';
			if (substr_count($template_title, "Brankic Creative") == 1) $template_html_class = 'html_class="form creative"';
			
			
					
			
			$template_shortcode = '[contact-form-7 html_id="brankic_contact_form_' . $template_id . '" title="' . $template_title . '" ' . $template_html_class . ']';
			
			$cf_7_titles[$template_title] = $template_id;
			$cf_7_shortcodes[$template_id] = $template_shortcode;
		}
		wp_reset_postdata();
	}
	if ($return_what == "cf_7_titles") return $cf_7_titles;
	if ($return_what == "cf_7_shortcodes") return $cf_7_shortcodes;
	
}



function brankic_limit_characters($content, $limit){
	$pos = strpos($content, ' ', $limit);
	return substr($content, 0, $pos);
}

function brankic_safe_string_name($string) {
	return preg_replace('/\W+/','',strtolower(strip_tags($string)));
}
function brankic_default_count_widgets($sidebar) {
	$count = 0;
	$all_sidebars = wp_get_sidebars_widgets();
	if (isset($all_sidebars[$sidebar])) { 
		$count = count($all_sidebars[$sidebar]); 
	}
	return $count;

}
function brankic_count_footer_sidebars($r) {
	$all_sidebars = wp_get_sidebars_widgets();
	if (!isset($all_sidebars["footer_box_1"])) { $all_sidebars["footer_box_1"] = null ;};
	if (!isset($all_sidebars["footer_box_2"])) { $all_sidebars["footer_box_2"] = null ;};
	if (!isset($all_sidebars["footer_box_3"])) { $all_sidebars["footer_box_3"] = null ;};
	if (!isset($all_sidebars["footer_box_4"])) { $all_sidebars["footer_box_4"] = null ;};
	if (!isset($all_sidebars["footer_box_5"])) { $all_sidebars["footer_box_5"] = null ;};
	if (!isset($all_sidebars["footer_box_6"])) { $all_sidebars["footer_box_6"] = null ;};
	if (!isset($all_sidebars["2nd_row_footer_box_1"])) { $all_sidebars["2nd_row_footer_box_1"] = null ;};
	if (!isset($all_sidebars["2nd_row_footer_box_2"])) { $all_sidebars["2nd_row_footer_box_2"] = null ;};
	if (!isset($all_sidebars["2nd_row_footer_box_3"])) { $all_sidebars["2nd_row_footer_box_3"] = null ;};
	if (!isset($all_sidebars["2nd_row_footer_box_4"])) { $all_sidebars["2nd_row_footer_box_4"] = null ;};
	if (!isset($all_sidebars["2nd_row_footer_box_5"])) { $all_sidebars["2nd_row_footer_box_5"] = null ;};
	if (!isset($all_sidebars["2nd_row_footer_box_6"])) { $all_sidebars["2nd_row_footer_box_6"] = null ;};

	// lets count non empty footer sidebars / $r1 - 1st row, $r2 - 2nd row
	$r1 = 0;
	$r2 = 0;
	if ($all_sidebars["footer_box_1"] != null) { if (count($all_sidebars["footer_box_1"]) > 0) $r1++; }
	if ($all_sidebars["footer_box_2"] != null) { if (count($all_sidebars["footer_box_2"]) > 0) $r1++; }
	if ($all_sidebars["footer_box_3"] != null) { if (count($all_sidebars["footer_box_3"]) > 0) $r1++; }
	if ($all_sidebars["footer_box_4"] != null) { if (count($all_sidebars["footer_box_4"]) > 0) $r1++; } 
	if ($all_sidebars["footer_box_5"] != null) { if (count($all_sidebars["footer_box_5"]) > 0) $r1++; }
	if ($all_sidebars["footer_box_6"] != null) { if (count($all_sidebars["footer_box_6"]) > 0) $r1++; }
	if ($all_sidebars["2nd_row_footer_box_1"] != null) { if (count($all_sidebars["2nd_row_footer_box_1"]) > 0) $r2++; } 
	if ($all_sidebars["2nd_row_footer_box_2"] != null) { if (count($all_sidebars["2nd_row_footer_box_2"]) > 0) $r2++; }
	if ($all_sidebars["2nd_row_footer_box_3"] != null) { if (count($all_sidebars["2nd_row_footer_box_3"]) > 0) $r2++; }
	if ($all_sidebars["2nd_row_footer_box_4"] != null) { if (count($all_sidebars["2nd_row_footer_box_4"]) > 0) $r2++; }
	if ($all_sidebars["2nd_row_footer_box_5"] != null) { if (count($all_sidebars["2nd_row_footer_box_5"]) > 0) $r2++; }
	if ($all_sidebars["2nd_row_footer_box_6"] != null) { if (count($all_sidebars["2nd_row_footer_box_6"]) > 0) $r2++; }
	
	if ($r == "r2") return $r2;
	else return $r1;
}

function brankic_hero_holder($bg_color = "#000", $bg_color_opacity = 0.2, $title_color = "#fff", $title_position = "left middle", $height = "height-75", $show_title = true, $show_meta = false, $row_container = true, $show_share = false, $parallax = true, $archive = false, $show_scroll_button = true, $show_tags = true){
	
	$html = "";
	
	if (is_page()) $parallax = brankic_global_or_local("page_parallax");
	if (is_single()) $parallax = brankic_global_or_local("post_parallax");
	if (is_archive() || is_404() || is_home()) $parallax = brankic_of_get_option("archive_parallax", brankic_of_get_default("archive_parallax"));
	
	$default_header_fixed = brankic_of_get_option("default_header_fixed", brankic_of_get_default("default_header_fixed"));
	$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
	$default_header_overflow = brankic_of_get_option("default_header_overflow", brankic_of_get_default("default_header_overflow"));
	
	if ($parallax === TRUE || $parallax == "yes") $parallax = "parallax"; else $parallax = "";
	
	if ($title_color != "") $title_inline_css = 'style="color:' . $title_color . '"'; else $title_inline_css = "";
	
	$scroll_button = "";
	
	if ($show_scroll_button){
		
		$hero_holder_scroll_button = "";
		if (is_page()) $hero_holder_scroll_button = brankic_global_or_local("hero_holder_scroll_button");
		if (is_single()) $hero_holder_scroll_button = brankic_global_or_local("post_hero_holder_scroll_button");
		if (is_archive()) $hero_holder_scroll_button = brankic_global_or_local("archive_hero_holder_scroll_button");
		
		if ($hero_holder_scroll_button == "three-arrows") {
			$scroll_button = '<a href="#next" class="scroll-link three-arrows"><span></span><span></span><span></span></a>';		
		}
		if ($hero_holder_scroll_button == "arrow") {
			$scroll_button = '<a href="#next" class="scroll-link arrow"><span></span></a>';
		}
		if ($hero_holder_scroll_button == "mouse") {
			$scroll_button = '<a class="scroll-link mouse" href="#next">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106 130">
										<g fill="none" fill-rule="evenodd">
											<rect width="70" height="118" x="1.5" y="1.5" stroke="' . $title_color . '" stroke-width="4" rx="36"/>
											<circle class="scroll" cx="36.5" cy="31.5" r="5.5" fill="' . $title_color . '"/>
										</g>
									</svg>
								</a>';
		}
		if ($hero_holder_scroll_button == "pulse") {
			$scroll_button = '<a href="#next" class="scroll-link pulse-button"><span class="pulse"></span><span class="arrow"></span></a>';
		}
		if ($hero_holder_scroll_button == "line") {
			$scroll_button = '<a href="#next" class="scroll-link fluid-line" ' . $title_inline_css . '>
                            	<small style="text-transform:uppercase;"></small>
                                <span></span>
							</a>';
		}
	}
	
	if (is_archive() || is_tag() || is_author() || is_404() || is_search() || is_home()){
		$archive_image =  brankic_of_get_option("archive_image", brankic_of_get_default("archive_image"));
		$archive_change_header_colors = brankic_of_get_option("archive_change_header_colors", brankic_of_get_default("archive_change_header_colors"));
		$archive_change_menu_new_color = brankic_of_get_option("archive_change_menu_new_color", brankic_of_get_default("archive_change_menu_new_color"));
		$archive_change_header_colors_below = brankic_of_get_option("archive_change_header_colors_below", brankic_of_get_default("archive_change_header_colors_below"));
		$archive_change_menu_new_color_below = brankic_of_get_option("archive_change_menu_new_color_below", brankic_of_get_default("archive_change_menu_new_color_below"));	
		
		$archive_padding =  brankic_of_get_option("archive_padding", brankic_of_get_default("archive_padding"));
		if ($archive_padding == "custom") {
			$archive_right_padding =  brankic_of_get_option("archive_right_padding", brankic_of_get_default("archive_right_padding"));
			$archive_left_padding =  brankic_of_get_option("archive_left_padding", brankic_of_get_default("archive_left_padding"));
			
			$archive_right_padding = str_replace("padding", "padding-right", $archive_right_padding);
			$archive_left_padding = str_replace("padding", "padding-left", $archive_left_padding);

			$archive_left_right_padding = "$archive_right_padding $archive_left_padding";
		} else {
			$archive_left_right_padding = str_replace("padding-", "padding-left-", $archive_padding) . " " . str_replace("padding-", "padding-right-", $archive_padding);		
		}
		
		
		
		$title = get_the_archive_title();
		$subtitle = "";
		if (is_home()) $subtitle = get_bloginfo ( 'description' ); 
		$archive_hero_classes = "";
		
		if ($archive_change_header_colors == "yes") $archive_change_header_colors_class = "change_header_colors"; else $archive_change_header_colors_class = "";
		if ($archive_change_header_colors_below == "yes") $archive_change_header_colors_below_class = "change_header_colors_below"; else $archive_change_header_colors_below_class = "";
		
		if ($header_style == "default" && $default_header_fixed == "yes" && $default_header_overflow == "yes") { 
			$archive_hero_classes .= "extra_padding ";
		}
		
		$archive_hero_classes .= esc_attr($archive_change_header_colors_class) . " " . esc_attr($archive_change_header_colors_below_class);
		
		
		
		$html .= '           <div class="row-container brankic_hero hero_archive ' . $archive_hero_classes . '">
			
					<div class="row fluid">';
		
		$html .=	'				<div class="row-bg-wrap">
								<div class="inner-wrap">';
								
		if ($archive_image != "") $html .= '							<div class="row-bg background-image ' . $parallax . '" style="background-image: url(' . $archive_image . ');"></div>';
		
		$html .=	'						<div class="row-bg background-color"></div>
								</div> 
							</div>
						
							<div class="hero-holder ' . $height . ' ' . $title_position . ' ' . $archive_left_right_padding . ' blog-post-title">';
										

			
		$html .= '                    	<header class="post-title">
									<h1 class="entry-title">
										' . $title . '
									</h1>';
			if ($subtitle != "") {
									$html .= '				<p class="" ' . $title_inline_css . '>
										' . $subtitle . '
									</p>';
			}
									
			$html .= '				</header><!-- POST-TITLE -->';
								
			$html .= $scroll_button;
			
			$html .= '                	</div><!--END HERO-HOLDER--> ';
		
		$html .= '	</div><!-- ROW -->
								
				</div><!-- ROW-CONTAINER -->';
		
	} else {
		$featured_image = brankic_featured_image_url("full");
		$tags = get_the_tags();
		
		
		$change_header_colors = "";
		$post_change_header_colors = "";
		$post_change_header_colors_below = "";
		$new_menu_color_css = '';
		if (function_exists("get_field")) {
			
			$change_header_colors = get_field("change_header_colors");
			$change_menu_new_color = get_field("change_menu_new_color");
			if ($change_header_colors  && brankic_global_or_local("default_header_bg_color") == ""){
				$change_header_colors = " change_header_colors";

				if ($change_menu_new_color != "") $new_menu_color_css .= '.header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled) {color:' . $change_menu_new_color . ';}';
				if ($new_menu_color_css != ""){

					update_post_meta( get_the_ID(), 'brankic_new_menu_color_css', $new_menu_color_css);
				}
			}
			
			if (is_singular( array( 'post' ) )) {	
				$post_change_header_colors = brankic_global_or_local("post_change_header_colors");
				$post_change_menu_new_color = brankic_global_or_local("post_change_menu_new_color");
				
				$post_change_header_colors_below = brankic_global_or_local("post_change_header_colors_below");
				$post_change_menu_new_color_below = brankic_global_or_local("post_change_menu_new_color_below");
				
				if ($post_change_header_colors == "yes" || $post_change_header_colors == 1){
					$post_change_header_colors = " change_header_colors";
					if ($post_change_menu_new_color != "") $new_menu_color_css .= '.header_default.new_header_colors[data-header_bg_color="true"]:not(.scrolled) {color:' . $post_change_menu_new_color . ';}';
					
					if ($new_menu_color_css != ""){
						update_post_meta( get_the_ID(), 'brankic_new_menu_color_css_post', $new_menu_color_css);
					}
				}
				if ($post_change_header_colors_below){
					$post_change_header_colors_below = " change_header_colors_below";
					if ($post_change_menu_new_color_below != "") $new_menu_color_css .= '.header_default.new_content_header_colors[data-header_bg_color="true"]:not(.scrolled) {color:' . $post_change_menu_new_color_below . ';}';
					
					if ($new_menu_color_css != ""){
						update_post_meta( get_the_ID(), 'brankic_new_menu_color_css_post', $new_menu_color_css);
					}
				}
			}
				
				
		} 


		$single_post_padding =  brankic_global_or_local("single_post_padding");
		if ($single_post_padding == "custom") {
			$single_post_top_padding =  brankic_global_or_local("single_post_top_padding");	
			$single_post_right_padding =  brankic_global_or_local("single_post_right_padding");
			$single_post_bottom_padding =  brankic_global_or_local("single_post_bottom_padding");
			$single_post_left_padding =  brankic_global_or_local("single_post_left_padding");
			
			$single_post_top_padding = str_replace("padding", "padding-top", $single_post_top_padding);
			$single_post_right_padding = str_replace("padding", "padding-right", $single_post_right_padding);
			$single_post_bottom_padding = str_replace("padding", "padding-bottom", $single_post_bottom_padding);
			$single_post_left_padding = str_replace("padding", "padding-left", $single_post_left_padding);
			
			$single_post_padding = "$single_post_top_padding $single_post_right_padding $single_post_bottom_padding $single_post_left_padding";
			$single_post_left_right_padding = "$single_post_right_padding $single_post_left_padding";
		} else {
			$single_post_left_right_padding = str_replace("padding-", "padding-left-", $single_post_padding) . " " . str_replace("padding-", "padding-right-", $single_post_padding);		
			$single_post_top_padding = str_replace("padding-", "padding-top-", $single_post_padding);	
			$single_post_bottom_padding = str_replace("padding-", "padding-bottom-", $single_post_padding);
		}
		
		$single_post_style = brankic_global_or_local("single_post_style");
		$header_style = brankic_of_get_option("header_style", brankic_of_get_default("header_style"));
		if ($single_post_style == "fullwidth" && $header_style == "default" && $default_header_fixed == "yes" && $default_header_overflow == "yes") {
			$hero_extra_padding_class = " extra_padding";
		} else {
			$hero_extra_padding_class = "";
		}
		
		
		
		
		$default_content_width_responsive = brankic_of_get_option("default_content_width_responsive", brankic_of_get_default("default_content_width_responsive"));
		$single_post_content_width_responsive = brankic_of_get_option("single_post_content_width_responsive", brankic_of_get_default("single_post_content_width_responsive"));
		$portfolio_item_content_width_responsive = brankic_of_get_option("portfolio_item_content_width_responsive", brankic_of_get_default("portfolio_item_content_width_responsive"));
		$default_content_width_responsive_percent = brankic_of_get_option("default_content_width_responsive_percent", brankic_of_get_default("default_content_width_responsive_percent"));
		$single_post_content_width_responsive_percent = brankic_of_get_option("single_post_content_width_responsive_percent", brankic_of_get_default("single_post_content_width_responsive_percent"));
		$portfolio_item_content_width_responsive_percent = brankic_of_get_option("portfolio_item_content_width_responsive_percent", brankic_of_get_default("portfolio_item_content_width_responsive_percent"));
		
		$post_duotone = brankic_of_get_option("post_duotone", brankic_of_get_default("post_duotone")); 
		$post_duotone_custom = brankic_of_get_option("post_duotone_custom", brankic_of_get_default("post_duotone_custom")); 
		if ($post_duotone_custom != "") {
			$post_duotone = 'duotone single-color';
		}
		
		$portfolio_item_duotone = brankic_of_get_option("portfolio_item_duotone", brankic_of_get_default("portfolio_item_duotone")); 
		$portfolio_item_duotone_custom = brankic_of_get_option("portfolio_item_duotone_custom", brankic_of_get_default("portfolio_item_duotone_custom")); 
		if ($portfolio_item_duotone_custom != "") {
			$portfolio_item_duotone = 'duotone single-color';
		}
		
		$html_img = "";
		
		if (is_singular( array( 'portfolio_item' ) )) {
			$default_content_width_responsive = $portfolio_item_content_width_responsive;
			$default_content_width_responsive_percent = $portfolio_item_content_width_responsive_percent;
			
			if ($featured_image[0] != "") $html_img .= '<div class="row-bg background-image  ' . $parallax . '"><div class="' . $portfolio_item_duotone . '"><img src="' .$featured_image[0] . '" alt="' . get_the_title() . '"></div></div>';
		
		}
		
		if (is_singular( array( 'post' ) )) {
			$default_content_width_responsive = $single_post_content_width_responsive;
			$default_content_width_responsive_percent = $single_post_content_width_responsive_percent;
				
			if ($featured_image[0] != "") $html_img .= '<div class="row-bg background-image ' . $parallax . '"><div class="' . $post_duotone . '"><img src="' .$featured_image[0] . '" alt="' . get_the_title() . '"></div></div>';			
			
		}
		if ($default_content_width_responsive != "yes") $default_content_width_responsive_percent = "";

		if ($row_container) { $html .= '           <div class="row-container fja brankic_hero ' . $change_header_colors . $post_change_header_colors . $post_change_header_colors_below . $hero_extra_padding_class . '">
			
					<div class="row fluid">';
		}				
		
		
		
		$html .=	'				<div class="row-bg-wrap">
								<div class="inner-wrap"> ';
								
		
		
		$html .= $html_img;
		$html .= '							<div class="row-bg background-color"></div>';
		
		$html .= '						</div> 
							</div>';
							
		
		
		


		
		$html .= '					<div class="hero-holder ' . $height . ' ' . $title_position . ' ' . $single_post_left_right_padding . ' blog-post-title ' . $default_content_width_responsive_percent . '">';
										
		if ($show_title) {
			$post_hero_holder_title_size = brankic_of_get_option("post_hero_holder_title_size", brankic_of_get_default("post_hero_holder_title_size"));
			
			$html .= '                    	<header class="post-title">
									<h1 class="entry-title ' . $post_hero_holder_title_size . '">
										' . get_the_title() . '
									</h1>					
								</header><!-- POST-TITLE -->';
		}
		
		
		
		if ($show_meta){ 
		
		$post_single_meta_style =  brankic_of_get_option("post_single_meta_style", brankic_of_get_default("post_single_meta_style"));
		$post_single_meta_small =  brankic_of_get_option("post_single_meta_small", brankic_of_get_default("post_single_meta_small"));
		$post_single_meta_bold =  brankic_of_get_option("post_single_meta_bold", brankic_of_get_default("post_single_meta_bold"));

		if ($post_single_meta_small) $post_single_meta_small = "small";
		if ($post_single_meta_bold) $post_single_meta_bold = "bold";
		
		$html .= '<aside class="post-meta separate vertical ' . esc_attr($post_single_meta_style) . ' ' . esc_attr($post_single_meta_small) . ' ' . esc_attr($post_single_meta_bold) . '">
									<p>
										<span>' . esc_html__('by', 'myriadwp') . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author_meta( 'user_nicename' ) . '</a></span>
										<span>' . esc_html(get_the_date(get_option( 'date_format' ))) . '</span>
										<span>' . get_the_category_list(', ') . '</span>';
		
		
		if ($tags && $show_tags) {
			ob_start();
			the_tags('', ', ', '');
			$html .= '<span>' . ob_get_contents() . ' </span>';
			ob_end_clean();	
		}
		
		ob_start();
		comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp'));
		$html .= '<span>' . ob_get_contents() . ' </span>';
		ob_end_clean();	
										

		$html .= '                        	</p> 				
								</aside><!-- POST-META -->';	
		}
		
		if ($show_share) {								
			$html .= '<aside class="post-share">' . brankic_single_share(false) . '</aside><!--END POST SHARE-->';
		} 
											

		$html .= $scroll_button;
		
		$html .= '                	</div><!--END HERO-HOLDER--> ';
		
		if ($row_container) { 
		$html .= '	</div><!-- ROW -->
								
				</div><!-- ROW-CONTAINER -->';
		}
	
	}
	
	return $html;
}

function brankic_meta($type = "separate dott", $show_tags = false, $show_cats = true, $show_comments = true, $show_date = true, $show_avatar = true, $avatar_size = 40){
	
	$post_single_meta_style =  brankic_of_get_option("post_single_meta_style", brankic_of_get_default("post_single_meta_style"));
	$post_single_meta_small =  brankic_of_get_option("post_single_meta_small", brankic_of_get_default("post_single_meta_small"));
	$post_single_meta_bold =  brankic_of_get_option("post_single_meta_bold", brankic_of_get_default("post_single_meta_bold"));

	if ($post_single_meta_small) $post_single_meta_small = "small";
	if ($post_single_meta_bold) $post_single_meta_bold = "bold";
	
	$html = "";
	$html .= '<aside class="post-meta ' . $type . ' ' . esc_attr($post_single_meta_style) . ' ' . esc_attr($post_single_meta_small) . ' ' . esc_attr($post_single_meta_bold) . '">';
	$html .= '<p>';
	
	$html .= '<span>';
	
	if ($show_avatar){	
		$html .=get_avatar( get_the_author_meta( 'ID' ), $avatar_size );
	}
	
	$html .= '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author_meta( 'user_nicename' ) . '</a>';
	$html .= '</span>';
	
	if ($show_date){
		$html .= '<span>';
		$html .= esc_html(get_the_date(get_option( 'date_format' )));
		$html .= '</span>';
	}
	if ($show_cats){
		$html .= '<span>';
		$html .=  get_the_category_list(', ');
		$html .= '</span>';
	}
	if ($show_tags){
		$html .= '<span>';
		ob_start();
		the_tags('', ', ', '');
		$html .= ob_get_contents();
		ob_end_clean();	
		$html .= '</span>';
	}
	if ($show_comments){
		$html .= '<span>';
		ob_start();
		comments_popup_link( esc_html__('0 comments', 'myriadwp'), esc_html__('1 comment', 'myriadwp'), esc_html__('% comments', 'myriadwp'));
		$html .= ob_get_contents();
		ob_end_clean();

		$html .= '</span>';
	}
	$html .= '</p>';
	$html .= '</aside><!--END POST META-->';
	
	return $html;
	
	
}





$header_image_args = array(
	'default-image' => brankic_global_or_local("default_header_bg_image")
);
add_theme_support( 'custom-header', $header_image_args );

$bg_args = array(
	'default-color' => brankic_global_or_local("default_header_bg_color"),
);
add_theme_support( 'custom-background', $bg_args );

global $wp_version;
if ( version_compare( $wp_version, '3.4', '>=' ) ) :
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
endif;

add_theme_support( 'automatic-feed-links' );

add_action( 'after_setup_theme', 'brankic_theme_slug_setup' );

function brankic_theme_slug_setup() {

	add_theme_support( 'title-tag' );
}

add_action( 'show_user_profile', 'brankic_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'brankic_extra_user_profile_fields' );

function brankic_extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profile information", "myriadwp"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="position"><?php _e("Position", "myriadwp"); ?></label></th>
        <td>
            <input type="text" name="position" id="position" value="<?php echo esc_attr( get_the_author_meta( 'position', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your position.", "myriadwp"); ?></span>
        </td>
    </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'brankic_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'brankic_save_extra_user_profile_fields' );

function brankic_save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'position', $_POST['position'] );
}



function brankic_scroll_buttton($hero_holder_scroll_button = "three-arrows"){
		
		$scroll_button = "";
		$title_color = brankic_global_or_local("portfolio_item_hero_holder_title_color");
		
		if ($hero_holder_scroll_button == "three-arrows") {
			$scroll_button = '<a href="#next" class="scroll-link three-arrows"><span></span><span></span><span></span></a>';		
		}
		if ($hero_holder_scroll_button == "arrow") {
			$scroll_button = '<a href="#next" class="scroll-link arrow"><span></span></a>';
		}
		if ($hero_holder_scroll_button == "mouse") {
			$scroll_button = '<a class="scroll-link mouse" href="#next">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106 130">
										<g fill="none" fill-rule="evenodd">
											<rect width="70" height="118" x="1.5" y="1.5" stroke="' . $title_color . '" stroke-width="4" rx="36"/>
											<circle class="scroll" cx="36.5" cy="31.5" r="5.5" fill="' . $title_color . '"/>
										</g>
									</svg>
								</a>';
		}
		if ($hero_holder_scroll_button == "pulse") {
			$scroll_button = '<a href="#next" class="scroll-link pulse-button"><span class="pulse"></span><span class="arrow"></span></a>';
		}
		if ($hero_holder_scroll_button == "line") {
			$scroll_button = '<a href="#next" class="scroll-link fluid-line" style="color:' . $title_color . ';">
                            	<small style="text-transform:uppercase;"></small>
                                <span></span>
							</a>';
		}
		
		return $scroll_button;

}


function brankic_single_share($echo = true){

$title = urlencode(get_the_title());
$permalink = urlencode(get_the_permalink());
$excerpt = urlencode(strip_tags(get_the_excerpt()));
$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
if (!(isset($featured_image_array[0]))) $featured_image_array[0] = "";
$featured_image = $featured_image_array[0];	

	$social_color =  brankic_of_get_option("social_color", brankic_of_get_default("social_color"));
	$social_shape =  brankic_of_get_option("social_shape", brankic_of_get_default("social_shape"));
	$social_style =  brankic_of_get_option("social_style", brankic_of_get_default("social_style"));
	$social_hover =  brankic_of_get_option("social_hover", brankic_of_get_default("social_hover"));
	$social_bg_hover_color =  brankic_of_get_option("social_bg_hover_color", brankic_of_get_default("social_bg_hover_color"));
	$social_hover_color =  brankic_of_get_option("social_hover_color", brankic_of_get_default("social_hover_color"));


$social_facebook =  brankic_of_get_option("social_facebook", brankic_of_get_default("social_facebook"));
$social_twitter =  brankic_of_get_option("social_twitter", brankic_of_get_default("social_twitter"));
$social_linkedin =  brankic_of_get_option("social_linkedin", brankic_of_get_default("social_linkedin"));
$social_google_plus =  brankic_of_get_option("social_google_plus", brankic_of_get_default("social_google_plus"));
$social_tumblr =  brankic_of_get_option("social_tumblr", brankic_of_get_default("social_tumblr"));
$social_pinterest =  brankic_of_get_option("social_pinterest", brankic_of_get_default("social_pinterest"));


	
	
    $html =  '       <ul id="brankic_social_share" class="social-bookmarks ' . $social_shape . ' ' . $social_style . ' ' . $social_hover . '">'; 

if ($social_facebook == "yes") {
	$html .= '<li>';
	$html .= '<a title="'.__("Share on Facebook", "myriadwp").'" href="javascript:void(0)" onclick="window.open(\'https://www.facebook.com/sharer.php?s=100&amp;p[title]=' . $title . '&amp;p[url]=' . $permalink . '&amp;p[images][0]='; 
	if ($featured_image != "") $html .= $featured_image;
	$html .= '&amp;p[summary]=' . $excerpt;
	$html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');" class="social-facebook">';
	$html .= '<i class="fa fa-facebook"></i>';
	$html .= '</a>';
    $html .= '</li>';
}

if ($social_twitter == "yes") {
	$html .= '<li>';
	$html .= '<a href="#" title="'.__("Share on Twitter", 'myriadwp').'" onclick="popUp=window.open(\'https://twitter.com/home?status=' . $permalink . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;" class="social-twitter">';
	$html .= '<i class="fa fa-twitter"></i>';
	$html .= '</a>';
	$html .= '</li>';
}

if ($social_google_plus == "yes") {
	$html .= '<li>';
	$html .= '<a href="#" title="'.__("Share on Google+", "myriadwp").'" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . $permalink . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false" class="social-google-plus">';                 
	$html .= '<i class="fa fa-google-plus"></i>';
	$html .= '</a>';
	$html .= '</li>';
}

if ($social_linkedin == "yes") {
	$html .= '<li>';
	$html .= '<a href="#" class="'.__("Share on LinkedIn", "myriadwp").'" onclick="popUp=window.open(\'https://linkedin.com/shareArticle?mini=true&amp;url=' . $permalink. '&amp;title=' . $title . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false" class="social-linkedin">';
	$html .= '<i class="fa fa-linkedin"></i>';
	$html .= '</a>';
	$html .= '</li>';
}

if ($social_tumblr == "yes") {
	$html .= '<li>';
	$html .= '<a href="#" title="'.__("Share on Tumblr", "myriadwp").'" onclick="popUp=window.open(\'https://www.tumblr.com/share/link?url=' . $permalink . '&amp;name=' . $title .'&amp;description='. $excerpt . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false" class="social-tumblr">';
	$html .= '<i class="fa fa-tumblr"></i>';
	$html .= '</a>';
	$html .= '</li>';
}

if ($social_pinterest == "yes") {
	$html .= '<li>';
	$html .= '<a href="#" title="'.__("Share on Pinterest","myriadwp").'" onclick="popUp=window.open(\'https://pinterest.com/pin/create/button/?url=' . $permalink. '&amp;description=' . $title .'&amp;media='. $featured_image . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false" class="social-pinterest">';
	$html .= '<i class="fa fa-pinterest"></i>';
	$html .= '</a>';
	$html .= '</li>';
}

$html .= '</ul>';

global $brankic_allowedposttags;

if ($echo) echo wp_kses($html, $brankic_allowedposttags); else return wp_kses($html, $brankic_allowedposttags);

}

// Return an alternate title, without prefix, for every type used in the get_the_archive_title().
add_filter('get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( esc_html__("Category - ", 'myriadwp'), false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( esc_html__("Tag - ", 'myriadwp'), false );
    } elseif ( is_author() ) {
        $title = esc_html__("All posts by ", 'myriadwp') . get_the_author();
    } elseif ( is_year() ) {
        $title = esc_html__("Archive for ", 'myriadwp') . get_the_date( _x( 'Y', 'yearly archives date format', 'myriadwp' ) );
    } elseif ( is_month() ) {
        $title = esc_html__("Archive for ", 'myriadwp') . get_the_date( _x( 'F Y', 'monthly archives date format', 'myriadwp' ) );
    } elseif ( is_day() ) {
        $title = esc_html__("Archive for ", 'myriadwp') . get_the_date( _x( 'F j, Y', 'daily archives date format', 'myriadwp' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = __( 'Asides', 'myriadwp' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = __( 'Galleries', 'myriadwp' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = __( 'Images', 'myriadwp' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = __( 'Videos', 'myriadwp' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = __( 'Quotes', 'myriadwp' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = __( 'Links', 'myriadwp' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = __( 'Statuses', 'myriadwp' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = __( 'Audio', 'myriadwp' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = __( 'Chats', 'myriadwp' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
	} elseif ( is_404() ) {
        $title = __( 'Page not found', 'myriadwp' );
	} elseif ( is_search() ) {
		$search_term = $_GET["s"];
        $title = __( 'Search results for ', 'myriadwp' ) . $search_term;
	} elseif ( is_home() ) {
        $title = get_bloginfo ( 'name' );;
    } else {
        $title = __( 'Archives', 'myriadwp' );
    }
    return $title;
});

/** add this to your function.php child theme to remove ugly shortcode on excerpt */

if(!function_exists('brankic_remove_vc_from_excerpt'))  {
  function brankic_remove_vc_from_excerpt( $excerpt ) {
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";
    return preg_replace($patterns, $replacements, $excerpt);
  }
}

/** * Original elision function mod by Paolo Rudelli */

if(!function_exists('brankic_kc_excerpt')) {

/** Function that cuts post excerpt to the number of word based on previosly set global * variable $word_count, which is defined below */

  function brankic_kc_excerpt($excerpt_length = 20, $echo = true) {

    global $post;
	
	$defined_excerpt = $post->post_excerpt;
	
	if (trim($defined_excerpt) == "") $defined_excerpt = "";

    $post_excerpt = $defined_excerpt != "" ? $defined_excerpt : strip_tags($post->post_content); $clean_excerpt = strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

    /** add by PR */

    $clean_excerpt = strip_shortcodes(brankic_remove_vc_from_excerpt($clean_excerpt));
	
	$pattern = '~https://[^\s]*~i'; //what we want to remove, the http link
    $clean_excerpt = preg_replace($pattern, '', $clean_excerpt);
	
	if ($clean_excerpt == "") return;

    /** end PR mod */

    $excerpt_word_array = explode (' ',$clean_excerpt);

    $excerpt_word_array = array_slice ($excerpt_word_array, 0, $excerpt_length);
	
	if (count($excerpt_word_array) == 1) return;

    $excerpt = implode (' ', $excerpt_word_array).'...'; 
	
	$excerpt = strip_tags($excerpt);
	
	if ( post_password_required() ) { $excerpt = esc_html__('This post is password protected.', 'myriadwp'); }
	
	if ($echo) echo ''.$excerpt.''; else return ''.$excerpt.''; 
  }

}

function brankic_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'brankic_custom_excerpt_length', 999 );

function brankic_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'brankic_excerpt_more' );

function brankic_comment_count($type = "all")
{
        global $id;
		
		if ($type == "all") $comments_number = get_comments_number($id);
		else {
        $comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($comments);
		$comments_number = count($comments_by_type[$type]);
		}

        return $comments_number;
}

function brankic_filter($cat_id, $data_gap = "", $echo = true){
	global $brankic_allowedposttags;
	$html = "";
	$var_1 = get_term_by('id', $cat_id, 'portfolio_category');
	if ($var_1 != ""){
		
		$html .= '<div class="filterable" ' . $data_gap . '>';	
		$html .= '                    <ul id="portfolio-nav">';
		$html .= '                        <li class="current"><a href="#" data-filter="*">' . esc_html__('All', 'myriadwp') . '</a></li>';

		  

		  
		  
		  $taxonomy = $var_1->taxonomy;
		  $subcategories = get_term_children( $cat_id, $taxonomy );
	  
		foreach ( $subcategories as $category ) {
			$term = get_term_by( 'id', $category, $taxonomy );
			$html .= '<li><a href="#" data-filter=".portfolio_category-' . $term->slug . '">' . $term->name . '</a></li>';
		}							

		$html .= '                    </ul><!--END PORTFOLIO-NAV-->';
		$html .= '                </div><!--END FILTERABLE-->';
	}
	if ($echo) echo wp_kses($html, $brankic_allowedposttags); else return $html;
	
}

function brankic_bbpress_single_user(){
	if ( function_exists( 'bbp_is_single_user' ) && bbp_is_single_user()) return true;
	else return false;		
}

function brankic_is_shop(){
	if ( function_exists( 'is_shop' ) && is_shop()) return true;
	else return false;		
}

function brankic_is_product_category(){
	if ( function_exists( 'is_product_category' ) && is_product_category()) return true;
	else return false;		
}

function brankic_is_woocommerce_page(){
	if ( function_exists( 'is_cart' ) && is_cart()) return true; 
	else if ( function_exists( 'is_checkout' ) && is_checkout()) return true; 
	else if ( function_exists( 'is_account_page' ) && is_account_page()) return true; 
	else return false;		
}

function brankic_is_woo_account(){
	if ( function_exists( 'is_cart' ) && is_cart()) return true; 
	else if ( function_exists( 'is_checkout' ) && is_checkout()) return true; 
	else if ( function_exists( 'is_account_page' ) && is_account_page()) return true; 
	else return false;
}

function brankic_is_woo_shop(){
	if ( function_exists( 'is_shop' ) && is_shop()) return true;
	else if ( function_exists( 'is_product_category' ) && is_product_category()) return true;
	else return false;	
}

function brankic_is_woo_single(){
	if ( function_exists( 'is_product' ) && is_product()) return true;
	else return false;
}

function brankic_woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) return $image; else return false; 
	}
}

/**
 * Change number of related products output
 */ 
function brankic_woo_related_products_limit() {
  global $product;
  
  $woo_related_products = brankic_of_get_option("woo_related_products", brankic_of_get_default("woo_related_products"));
	
	$args['posts_per_page'] = $woo_related_products;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'brankic_related_products_args', 20 );
  function brankic_related_products_args( $args ) {
	$woo_related_products = brankic_of_get_option("woo_related_products", brankic_of_get_default("woo_related_products"));
	$args['posts_per_page'] = $woo_related_products;
	return $args;
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}


remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function myriadwp_twentynineteen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'myriadwp_twentynineteen_pingback_header' );