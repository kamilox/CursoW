jQuery(document).ready(function() {
    //
    var sensitiveCheck = getCookie('sensitive_check');
	
	jQuery('#sensitive-material-proceed').click(function(){
			setCookie('sensitive_check', 'true', 7);
		  jQuery('body').removeClass('sensitive');
	});
	jQuery('#sensitive-material-return').click(function(){
			window.history.back();
	});

    //
   /* jQuery('.slide_single > .elementor-container > .elementor-row').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay:true,
        arrows:true,
        dots: false,
          
          responsive: [
                     {
            breakpoint: 1700,
            settings: {
              slidesToShow: 5,
              slidesToScroll: 5,
           
            }
          },
                  {
            breakpoint: 1400,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
           
            }
          },
                  {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
           
            }
          },
            
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
           
            }
          },
          
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ] 
        });
    //
    var delay = 100; setTimeout(function() { 
    $('.elementor-tab-title').removeClass('elementor-active');
    $('.elementor-tab-content').css('display', 'none'); }, delay); 
    //

    var NavTop = jQuery('#header_top').offset().top;
    var Nav = function() {
      var scrollTop = jQuery(window).scrollTop();
      if (scrollTop > NavTop) { 
        jQuery('#header_top').addClass('sticky');
      } else {
       jQuery('#header_top').removeClass('sticky'); 
      }
    };
  
    Nav();
  
    jQuery(window).scroll(function() {
      Nav();
    });
    */
    
    jQuery('#bmi-button-calculator').click(function(){
          
          var pounds = jQuery('#weight-user').val();
          var feet = jQuery('#height-feet-user').val();
          var inches = jQuery('#height-inches-user').val();
          var kg =  parseFloat(pounds) * 0.454;
          var cm1 =  parseFloat(feet) * 30.5;
          var cm2 =  parseFloat(inches) * 2.54;
          var cm =  (parseFloat(cm1) +  parseFloat(cm2))/100;
          var bmi = (parseFloat(kg)/(cm*cm));
          jQuery('.bmi-result').val(parseFloat((bmi).toFixed(2)));
          
          if(bmi < parseFloat(18.5)){
            jQuery('.underweight').css({
              '-webkit-box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
                '-moz-box-shadow':'0px 0px 10px 10px rgba(240,240,240,0.76)',
                'box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
                'background':'#65b568',
                'transition' : 'background 0.5s'
            })
  
            jQuery('.normal').css({
                                   'background':'#b9b9b9',
                                  '-webkit-box-shadow': 'none',
                                  '-moz-box-shadow':'none',
                                  'box-shadow': 'none',
                                  'transition' : 'background 0.5s'
                                  });
            jQuery('.overweight').css({
                                      'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
            jQuery('.obese').css({
                                  'background':'#b9b9b9',
                                  '-webkit-box-shadow': 'none',
                                  '-moz-box-shadow':'none',
                                  'box-shadow': 'none',
                                  'transition' : 'background 0.5s'
                                    });
          }
  
          if(bmi >= parseFloat(18.5) && bmi <= parseFloat(24.9)){
            jQuery('.normal').css({
              '-webkit-box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
                 '-moz-box-shadow':'0px 0px 10px 10px rgba(240,240,240,0.76)',
              'box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
              'background':'#65b568',
              'transition' : 'background 0.5s'
            });
            jQuery('.underweight').css({
                                        'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
            jQuery('.overweight').css({
                                      'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
            jQuery('.obese').css({
                                  'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
          }
  
          if(bmi > parseFloat(25) && bmi < parseFloat(30)){
            jQuery('.overweight').css({
              '-webkit-box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
                 '-moz-box-shadow':'0px 0px 10px 10px rgba(240,240,240,0.76)',
              'box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
              'background':'#dacf71',
              'transition' : 'background 0.5s'
            });
            jQuery('.underweight').css({
                                        'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
            jQuery('.normal').css({
                                   'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
  
            jQuery('.obese').css({
                                  'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
          }
  
          if(bmi > parseInt(30)){
            jQuery('.obese').css({
              '-webkit-box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
                '-moz-box-shadow':'0px 0px 10px 10px rgba(240,240,240,0.76)',
                'box-shadow': '0px 0px 10px 10px rgba(240,240,240,0.76)',
              'background':'#dc3b2f',
              'transition' : 'background 0.5s'
            });
            jQuery('.underweight').css({
                                        'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
            jQuery('.normal').css({
                                       'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
            jQuery('.overweight').css({
                                      'background':'#b9b9b9',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
          }
       
      });
        /*display de bmi- calculator when the page load completely*/
        jQuery('.loader').css('display', 'none');
        
        jQuery('#bmi-button-clear').click(function(){
             jQuery('#weight-user').val(0);
          jQuery('#height-feet-user').val(0);
          jQuery('#height-inches-user').val(0);
            jQuery('.bmi-result').val(0);
            jQuery('.underweight').css({
                                            'background':'#33304b',
                                           '-webkit-box-shadow': 'none',
                                           '-moz-box-shadow':'none',
                                           'box-shadow': 'none',
                                            'transition' : 'background 0.5s'
                                          });
            jQuery('.normal').css({
                                   'background':'#61cede',
                                  '-webkit-box-shadow': 'none',
                                    '-moz-box-shadow':'none',
                                    'box-shadow': 'none',
                                  'transition' : 'background 0.5s'
                                  });
            jQuery('.overweight').css({
                                      'background':'#c3425f',
                                      '-webkit-box-shadow': 'none',
                                      '-moz-box-shadow':'none',
                                      'box-shadow': 'none',
                                      'transition' : 'background 0.5s'
                                        });
            jQuery('.obese').css({
                                  'background':'#5c1727',
                                  '-webkit-box-shadow': 'none',
                                  '-moz-box-shadow':'none',
                                  'box-shadow': 'none',
                                  'transition' : 'background 0.5s'
                                    });
   
      });
    
      /*end bmi-calculator*/

      jQuery('.glsr-button').click(function() {
        location.reload();
    });
    
});



function setCookie(name,value,days) {
	var expires = "";
	if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days*24*60*60*1000));
			expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {   
	document.cookie = name+'=; Max-Age=-99999999;';  
}


  