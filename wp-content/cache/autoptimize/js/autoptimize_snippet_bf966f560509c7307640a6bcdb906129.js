$=jQuery.noConflict();$(document).ready(function(){if(localStorage.getItem('age')!='21'){$('.elementor-33268').append('<div class="image-protected">'
+'<div class="text-protected">'
+'Welcome! Please verify <br>'
+'your age to enter.<br>'
+'Are you 21 years or older?'
+'<br>'
+'<br>'
+'Some material on this site may be deemed inappropriate for those under 21 by Google, Facebook and other organazitions'
+'</div>'
+'<div class="button-protected">'
+'<input type="button" class="button-yes" value="Yes" >'
+'<input type="button" class="button-no" value="No" >'
+'</div>'
+'</div>');$('.button-yes').click(function(){localStorage.setItem('age','21');$('.image-protected').css('display','none');});$('.button-no').click(function(){window.location.href='/age';});}else{$('.image-protected').css('display','none');}});