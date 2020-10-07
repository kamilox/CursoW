!function(t){t.fn.extend({brankic_words_rotate:function(){return this.each(function(e){t(this).each(function(n){var r="word_"+n+e,a=t(this).text().split(" ");a=t.grep(a,function(t){return 0==t||t});var o="";for(k=0;k<a.length;k++)o+='<span class="word stroke '+r+'">'+a[k]+"</span>";t(this).html(o);var s=document.getElementsByClassName(r),i=[],c=0;s[c].style.opacity=1;for(var l=0;l<s.length;l++)d(s[l]);function h(){for(var t=i[c],e=c==s.length-1?i[0]:i[c+1],n=0;n<t.length;n++)u(t,n);for(n=0;n<e.length;n++)e[n].className="letter behind",e[0].parentElement.style.opacity=1,f(e,n);c=c==i.length-1?0:c+1}function u(t,e){setTimeout(function(){t[e].className="letter out"},80*e)}function f(t,e){setTimeout(function(){t[e].className="letter in"},340+80*e)}function d(t){var e=t.innerHTML;t.innerHTML="";for(var n=[],r=0;r<e.length;r++){var a=document.createElement("span");a.className="letter",a.innerHTML=e.charAt(r),t.appendChild(a),n.push(a)}i.push(n)}h(),setInterval(h,4e3)})})}})}(jQuery),jQuery(document).ready(function(t){jQuery(".rotate_words").length>0&&t(".rotate_words").brankic_words_rotate(),jQuery(".glitch").length>0&&t(".glitch").each(function(){var e=t(this).html();t(this).attr("data-text",e)})});

function is_touch_device() {
	"use strict"; 
  return !!('ontouchstart' in window);
}



function isScrolledIntoView(id){
	"use strict"; 
	var elem = "#" + id;
	var docViewTop = jQuery(window).scrollTop();
	var docViewBottom = docViewTop + jQuery(window).height();

	if (jQuery(elem).length > 0){
		var elemTop = jQuery(elem).offset().top;
		var elemBottom = elemTop + jQuery(elem).height();
	}

	return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom)
	  && (elemBottom <= docViewBottom) &&  (elemTop >= docViewTop) );
}


function sliding_horizontal_graph(id, speed){
	"use strict"; 
	jQuery("#" + id + " li span").each(function(i){
		var j = i + 1; 										  
		var cur_li = jQuery("#" + id + " li:nth-child(" + j + ") span");
		var w = cur_li.attr("class");

		cur_li.animate({width: w + "%"}, speed);
	})
}


(function($){
	"use strict"; 
	$.fn.graph_init = function(speed){
	
	var id = $(this).attr("id");
	var this_this = $(this)
		
	$(window).scroll(function(){
		if (isScrolledIntoView(id)){
			sliding_horizontal_graph(id, speed);
		}
	})
	
	if (isScrolledIntoView(id)){
		sliding_horizontal_graph(id, speed);
	}
	
	}
////////////////////////////////////////////////////////	
	$.fn.brankic_pie_chart = function(speed, barColor, trackColor, size){
	
	var id = $(this).attr("id");
	var this_this = $(this)
		
	if (isScrolledIntoView(id)) {
		  jQuery('#' + id + ' .percentage').easyPieChart({
                                            animate: speed,
                                            barColor: barColor,
                                            trackColor: trackColor,
                                            size: size
                                        });
	  }
	$(window).scroll(function(){
		if (isScrolledIntoView(id)) {
			jQuery('#' + id + ' .percentage').easyPieChart({
                                            animate: speed,
                                            barColor: barColor,
                                            trackColor: trackColor,
                                            size: size
                                        });
		}
	})

	}	

})(jQuery)


jQuery(document).ready(function($){
	"use strict";
	
	
	
	//adding spans around title and excerpt in blog-carousel-emphasize
	
	$(".slide-in-effect article, .slide-in-effect .swiper-slide").each(function(index){
		$(this).find(".post-excerpt").wrapInner("<span><span></span></span>")
	})
	
	
	jQuery(".slide-in-effect .entry-title a").each(function(e){
		var spanInserted = jQuery(this).html().split(" ").join("</span></span> <span><span>");
		var wrapped = ("<span><span>").concat(spanInserted, "</span></span>");
		jQuery(this).html(wrapped);
		var refPos = jQuery(this).find('span:first-child').position().top;
		var newPos;
		jQuery(this).find('span').each(function(index) {
			newPos = jQuery(this).position().top   
			if (index == 0){
			   return;
			}
			if (newPos == refPos){
				jQuery(this).prepend(jQuery(this).prev().text() + " ");
				jQuery(this).prev().remove();
			} 
			refPos = newPos;
		});
}) 
	
	
	
	
	
	
	//add class to wrapper-holder so we know plugin is active
	$(".wrapper-holder").addClass("brankic_plugin_active");
	
	//add wow to columns inside the row
	
	$(".vc_row[data-wow]").each(function (i) {
		var wow_class = $(this).data('wow');
		var wow_step = $(this).data('wow-step-delay');
		//alert(wow_class + " " + wow_step)
		$(this).find(">.wpb_column").each(function(j){
			j = j+1;
			$(this).addClass(wow_class)
			var delay = j * wow_step + "s";
			$(this).attr("data-wow-delay", delay);	
			
		})
			new WOW().init();
		i = i+1;
	});
	
	//add wow to elements inside the column
	
	$(".wpb_column[data-wow]").each(function (k) {
		var wow_class = $(this).data('wow');
		var wow_step = $(this).data('wow-step-delay');
		$(this).find(".vc_column-inner>.wpb_wrapper>*").each(function(l){
			l = l+1;
			$(this).addClass(wow_class)
			var delay = l * wow_step + "s";
			$(this).attr("data-wow-delay", delay);	
			
		})
			new WOW().init();
		k = k+1;
	});	
	

/*  	  */
	
	

	
	


	$('a.vc_row_scroll-link').click(function(e){
		e.preventDefault();
		var next_row = $(this).closest(".vc_row:not(.vc_inner)").nextAll(".vc_row:first");

		$('body,html').animate({
			scrollTop: $(next_row).offset().top -20
		}, 750);
	});	
	
	
 	$(".vc_column-inner.sticky-element").each(function(){
		$(this).parent().addClass("row-stick");		
	}) 
	
	
   /*-------- TOGGLE --------*/
	$('.accordion-toggle').on('click', function(options){
                        options.preventDefault();
                        var accordion = $(this);
                        var accordionContent = accordion.next('.accordion-content');
                        var accordionToggleIcon = $(this).children('.toggle-icon');

                        accordion.toggleClass("open");
                        accordionContent.slideToggle(350);
    }); 


	 $(".counter").each(function(){
	  if ($(this).attr("data-from") == undefined) $(this).attr("data-from", "0");
	  var data_from = parseInt($(this).attr("data-from"));
	  if ($(this).html() == "") $(this).html(data_from);
	 })
	 
	 
	 jQuery(window).scroll(function($){
	  if (isScrolledIntoView('counter')){  
	   jQuery('.counter').each(count);      
	  }
	 })
	 
	 if (isScrolledIntoView('counter')){  
	  jQuery('.counter').each(count);      
	 }	
	 


/*-------- VIDEO POPUP WINDOW CODE --------*/ 
	 $('.video-player-button').on("click", function() {		
		var popBox = $(this).attr('href');
		//Fade in the Popup
		$(popBox).fadeIn(300);		
		var popMargTop = ($(popBox).height() + 24) / 2; 
		var popMargLeft = ($(popBox).width() + 24) / 2; 		
		$('.video-player').append('<div id="video-player-mask"></div>');
		$('#video-player-mask').fadeIn(300);
		$('.video-player-button').fadeOut(1);		
		return false;
	});	
	$('a.close, #video-player-mask').on('click', function() { 
	  $('#video-player-mask, .video-player-container').fadeOut(300 , function() {
		$('#video-player-mask').remove(); 
		$('.video-player-button').fadeIn(1);	 
	}); 
	return false;
	});
	
	
/*-------- CONTENT ADDED --------*/

	$("#slide-sidebar.sb-slidebar").each(function (i) {
		i = i+1;
		$(this).prepend('<a href="#" class="sb-close square hamburger-menu"><span class="hamburger close"></span></a>');
   });

	$("#slide-menu.sb-slidebar").each(function (i) {
		i = i+1;
		$(this).prepend('<a href="#" class="sb-close square hamburger-menu"><span class="hamburger close"></span></a>');
   });

/* 	$("#search-window").each(function (i) {
		i = i+1;
		$(this).prepend('<a href="#" class="square hamburger-menu"><span class="hamburger close"></span></a>');
   }); */

	$(".divider.small").each(function (i) {
		i = i+1;
		$(this).prepend('<span></span>');
   });

	$(".divider.border").each(function (i) {
		i = i+1;
		//$(this).prepend('<span></span>'); // zato sto remeti brankic_steps_wrapper shortcode
   });

	$(".post-navigation.extended .next a, .post-navigation.solo .next a, .post-navigation.bg-image .next a").each(function (i) {
		//$(this).prepend('<small class="uppercase">Next article <span>&rarr;</span></small>');
   });

	$(".post-navigation.extended .prev a, .post-navigation.prev .next a, .post-navigation.bg-image .prev a").each(function (i) {
		//$(this).prepend('<small class="uppercase"><span>&larr;</span> Previous article</small>');
   });

	$(".testimonials div.carousel-item").each(function (i) {
		i = i+1;
		$(this).prepend('<span class="commentnumber"> 0'+i+'</span>');
   });

/* 	$(".comment .comment-meta").each(function (i) {
		i = i+1;
		$(this).prepend('<span class="commentnumber"> 0'+i+'</span>');
   }); */

	$(".brandlist li").each(function (i) {
		i = i+1;
		$(this).prepend('<span class="commentnumber"></span>');
   });

	$(".nav-reveal a.prev, .nav-reveal a.next").each(function (i) {
		$(this).prepend('<span class="icon-wrap"></span>');
   });

	$(".button.transparent").each(function (i) {
		i = i+1;
		$(this).append('<b class="top"></b><b class="bottom"></b><b class="left"></b><b class="right"></b>');
   });

	$("#wrapper.boxed #header-wrapper").removeAttr("data-content");

	$(".fullscreen, .fullscreen .background-image").height($(window).height());

	$(".split .content-wrap").each(function (i) {
		i = i+1;
		$(this).prepend('<span class="number"> 0'+i+'</span>');
   });


/*-------- IFRAME HEIGHT SCRIPT--------*/


	var window_height = $("html, body").height();
	var iframe_height = window_height;
	$(".responsive-video-div2").css("height", iframe_height + "px");
	
	$(window).resize(function() {
		window_height = $("html, body").height();
		iframe_height = window_height;
		$(".responsive-video-div2").css("height", iframe_height + "px");						  
	})




/*-------- SIDE MENU DROPDOWN --------*/
	//open (or close) submenu items in the lateral menu. Close all the other open submenu items.
	$('.item-has-children').children('a.drop').on('click', function(event){
		event.preventDefault();
		$(this).toggleClass('submenu-open').next('.sub-menu').slideToggle(350).end().parent('.item-has-children').siblings('.item-has-children').children('a.drop').removeClass('submenu-open').next('.sub-menu').slideUp(350);
	});

	$("#toggle-down").hide();
	$("#toggle-button").on("click", function(){
		$("#toggle-down").slideToggle("100", "swing", function(){
			$("#toggle-button").toggleClass("close")
		});	
		
	})

/*-------- NAVIGATION OVERLAY MENU --------*/
    $("#navigation-overlay").on("click", function () {
        if (!$("#navigation-overlay .hamburger").hasClass("close")) {
            $("#navigation").fadeIn();
            $(".toggle-menu").addClass("open");
            $("#logo").addClass("close");
            $("#navigation-overlay .hamburger").addClass("close");
            $("#navigation-overlay.hamburger-menu .text").fadeTo(50, 0);
        }
        else {
			$("#navigation").fadeOut();
			$(".toggle-menu").removeClass("open");
            $("#logo").removeClass("close");
			$("#navigation-overlay .hamburger").removeClass("close");
            $("#navigation-overlay.hamburger-menu .text").fadeTo(50, 1);
        }
    });



/*-------- RESPONISIVE MENU --------*/
    $("#three-lines-menu .hamburger-menu").on("click", function () {
        if (!$("#three-lines-menu .hamburger").hasClass("close")) {
            $("#three-lines-menu .hamburger").addClass("close");
        }
        else {
			$("#three-lines-menu .hamburger").removeClass("close");
        }
    });

	$(window).scroll(function () {
		$(".fadeout").css("opacity", 1 - $(window).scrollTop() / 650);
	});




 var work_item_w2 = $(".portfolio-packery .work-item.width2").first().outerWidth();
 if (work_item_w2 == null) work_item_w2 = $(".portfolio-packery .work-item").first().outerWidth() * 2;

 work_item_w2 = Math.round(work_item_w2);

 var work_item_w = $(".portfolio-packery .work-item:not(.width2)").first().outerWidth();
 work_item_w = Math.round(work_item_w);
 if (work_item_w == 0) work_item_w = Math.round(work_item_w2 / 2);
 $(".portfolio-packery .work-item.height2").attr("style", "height:" + work_item_w2 + "px");
 $(".portfolio-packery .work-item:not(.height2)").attr("style", "height:" + work_item_w + "px");

// caption-overflow

 var work_item_w = $(".figcaption-overflow .work-item .hover-holder").first().outerWidth();
 work_item_w = Math.round(work_item_w);
 
 $(".figcaption-overflow .work-item.brankic_1 .hover-holder").each(function(){
	var current_style = $(this).attr("style");
	$(this).attr("style", current_style + " height:" + Math.round(work_item_w * 1) + "px");	 
 })
 
 $(".figcaption-overflow .work-item.brankic_075 .hover-holder").each(function(){
	var current_style = $(this).attr("style");
	$(this).attr("style", current_style + " height:" + Math.round(work_item_w * 0.75) + "px");	 
 })
 
 $(".figcaption-overflow .work-item.brankic_133 .hover-holder").each(function(){
	var current_style = $(this).attr("style");
	$(this).attr("style", current_style + " height:" + Math.round(work_item_w * 1.33) + "px");	 
 })
 
 $('[data-add_col_border_wrap="true"] .vc_column_container').each(function (i) {
	$(this).prepend('<div class="col-border-wrap">');
});
 

 //$('.grid').brankic_last_last_row();
	
	
	
}); // end of jQuery(document).ready(function($){	



/*-------- ACCORDION PLUGIN --------*/

(function($){
	"use strict"; 
    $.fn.extend({
        brankic_accordion: function(options) {
 
            var defaults = {
                active: 1 //which tab should be openned by default. 0 for all closed.
            };

            var options = $.extend(defaults, options);
         
            return this.each(function() {
			  var o = options;
			  var obj = $(this); 
			  var obj_id = "#" + obj.attr("id");

				var active_plus = o.active - 1;
				$(this).find('.accordion-content').hide();
				
				if (o.active > 0) {
					$(this).find(".trigger-button:eq(" + active_plus + ")").addClass("active"); //Activate tab and content from declaration
					$(this).find(".accordion-content:eq(" + active_plus + ")").slideDown('normal');; 
				}
				
				$(this).find('.trigger-button').on("click", function() {
					$(obj_id + " .trigger-button").removeClass("active")
					$(obj_id + ' .accordion-content').slideUp('normal');
					if($(this).next().is(':hidden') == true) {
						$(this).next().slideDown('normal');
						$(this).addClass("active");
					 } 
				 });
				

 
            }); // return this.each
        }
    });
})(jQuery);





jQuery(window).load(function($){
	
	"use strict"; 
	if (jQuery(".tab-container").length > 0) {
		
		// tabs prevent default scroll to #
		jQuery(".tab-container .tab a").on("click", function(e) {
			var anchor_section = jQuery(this).attr("href");
			var anchor_section_new = "new-" + anchor_section.substring(1);
			var anchor_section_new = "";
			jQuery(anchor_section).attr("id", anchor_section_new)
			e.preventDefault();	
		})
		
		jQuery(".tab-container").each(function(){
			//
			var centered_captions = jQuery(this).data("captions-centered");
			if (centered_captions === true){
				jQuery(this).find("ul").addClass("text-align-center");
			}
			
			var animation = jQuery(this).data("animation");
			if (animation === true)	jQuery(this).easytabs({ animation: true, animationSpeed: 100 });
		    else jQuery(this).easytabs({ animationSpeed: 0 });
			//
			
		})
	}
	
	if (jQuery(".bra-horizontal-list").length > 0) {
		
		jQuery(".bra-horizontal-list").each(function(){
			//
			
			var align = jQuery(this).data("list-align");
			var columns = jQuery(this).children().length;
			jQuery(this).children().wrap('<div class="list-col"></div>');
			
			var i = 1;
			var align_class = '';
			jQuery(this).children().each(function(){
				
				
				if (align == "left") align_class = '';
				if (align == "right") align_class = 'align-right';
				if (align == "center") align_class = 'align-center';
				if (align == "justify") align_class = 'align-justify';
				if (align == "left_center_right") {
					if (i == 1) align_class = '';
					if (i > 1 && i < columns) align_class = 'align-center';
					if (i == columns) align_class = 'align-right';
				}
				if (align == "left_right"){
					if (i < columns) align_class = 'align-left';
					if (i == columns) align_class = 'align-right';
					
				}
				jQuery(this).addClass(align_class);
				i++;
			})
			
		
		})
	}

	

// data-match_height_index
	jQuery( "[data-match_height_index]" ).each(function(k){
		var match_height_index = jQuery(this).attr("data-match_height_index")
		jQuery(this).children().addClass("match-height-" + match_height_index);
	})
	

 
 /*--------------STICKY FOOTER --------*/

 

 var footer_fixed = true;
 
 if( is_touch_device() || !footer_fixed){
  jQuery('.footer, #wrapper').css({'position':'static', 'z-index':'0'});
  jQuery('#wrapper:last').css("margin-bottom", "0"); 
  jQuery(".footer").removeClass("fixed");
 
 } else {
  var wrapper_margin_bottom = jQuery('.footer.fixed').outerHeight()+'px';
   jQuery("#wrapper").after('<div style="height:' + wrapper_margin_bottom + '; float:left; width:100%;"></div>'); 
 } 

 //jQuery("#vc_tta_style-css").remove();
 
 
 
 
jQuery(".highlight").each(function(e){
		var id_to_wrap = jQuery(this).attr("id");
		var spanInserted = jQuery('#' + id_to_wrap).html().split(" ").join(" </span><span>");
		var wrapped = ("<span>").concat(spanInserted, "</span>");
		jQuery('#' + id_to_wrap).html(wrapped);
		var refPos = jQuery('#' + id_to_wrap + ' span:first-child').position().top;
		var newPos;
		jQuery('#' + id_to_wrap + ' span').each(function(index) {
			newPos = jQuery(this).position().top   
			if (index == 0){
			   return;
			}
			if (newPos == refPos){
				jQuery(this).prepend(jQuery(this).prev().text() + " ");
				jQuery(this).prev().remove();
			} 
			refPos = newPos;
		});
}) 


 
 
 
 
//ISOTOPE

if(jQuery(".portfolio-holder-masonry").length > 0){
	jQuery('.portfolio-holder-masonry').isotope({
	  itemSelector: 'article',
	  layoutMode: 'masonry'
	});
} 

if(jQuery(".blog-holder-masonry").length > 0){
	jQuery('.blog-holder-masonry').isotope({
	  itemSelector: 'article',
	  layoutMode: 'masonry'
	});
}

if(jQuery(".gallery-holder-masonry").length > 0){
	jQuery('.gallery-holder-masonry').isotope({
	  itemSelector: 'article',
	  layoutMode: 'masonry'
	});
}

jQuery(window).on('resize', function(){
	if(jQuery(".portfolio-holder-masonry").length > 0){
		jQuery('.portfolio-holder-masonry').isotope({
		  itemSelector: 'article',
		  layoutMode: 'masonry'
		});
	} 

	if(jQuery(".blog-holder-masonry").length > 0){
		jQuery('.blog-holder-masonry').isotope({
		  itemSelector: 'article',
		  layoutMode: 'masonry'
		});
	}

	if(jQuery(".gallery-holder-masonry").length > 0){
		jQuery('.gallery-holder-masonry').isotope({
		  itemSelector: 'article',
		  layoutMode: 'masonry'
		});
	}
});
 


 
 

 
});

/*-------- GRID PLUGIN --------*/
(function($){
    $.fn.extend({
        bra_last_last_row: function() {
            return this.each(function() {
			  		$(this).each(function(){
						var no_of_items = $(this).find(".grid-wrap").length;
						var no_of_cols = Math.round($(this).width() / $(this).find(":first").width() );
						//var no_of_cols = jQuery(this).data("grid_columns");
						var no_of_rows = Math.ceil(no_of_items / no_of_cols);
						var last_row_start = (no_of_rows - 1) * no_of_cols - 1;						
						if (last_row_start < (no_of_cols - 1)) {
							last_row_start = 0;
							$(this).find(".grid-wrap:eq(" + last_row_start + ")").addClass("last-row");
						}
						$(this).find(".grid-wrap:nth-child(" + no_of_cols + "n+ " + no_of_cols + ")").addClass("last");
						$(this).find(".grid-wrap:gt(" + last_row_start + ")").addClass("last-row");
					}) 
            }); // return this.each
        }
    });
})(jQuery);



jQuery(document).ready(function($) {

	$(".boxes-equal-height").each(function(){
		//alert($(this).find(".boxes-wrap").length);
		if ($(this).find(".boxes-wrap").length == 0){
			
			$(this).removeClass("boxes-equal-height");
		}
		
	})

	///////////////////////// 
	// FILTERING BY BRANKIC//
	/////////////////////////
	
	 if ($(".filterable").length > 0 && $(".portfolio-holder-masonry").length == 0){
		
			// filter items when filter link is clicked
			$('#portfolio-nav a').click(function(event){
				event.preventDefault();
				
				$("#portfolio-nav li").removeClass("current");
				$(this).closest("li").addClass("current");
				
				$("article").finish();
				
				var step = 100; //miliseconds
				var selector = $(this).attr('data-filter');
				if (selector != "*") {
					
					$("article:visible").fadeOut("slow", function(){
						var i = 0;
						$(selector).each(function(){
							var k = i * step;
							$(this).delay( k ).fadeIn("slow");
							i++;
						})
					})					
				  } else {
					// ALL
					$("article:visible").fadeOut('slow');
					$("article:visible").promise().done(function(){
						var i = 0;
						$("article").each(function(){
							var k = i * step;
							$(this).delay( k ).fadeIn("slow");
							i++;
						})
					});
				  }
				  
				  
				  
				  return false;
			});
			
		}

	// lists markers
	jQuery(".br-list li").prepend('<span class="marker"></span>')
	
	$(".br-list[data-style='numeric']").each(function(){
		var i = 1;
		$(this).find("li span.marker").each(function(){
			$(this).html(i++);
		})
		
	})
	
	jQuery(".vc_column_container.sticky-element").parent().addClass("row-stick");


})