$=jQuery.noConflict();$(document).ready(function(){$('.elementor-33268').append('<div class="image-protected">'
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
+'</div>');$('.button-yes').click(function(){console.log('yes');$('.image-protected').css('display','none');});$('.button-no').click(function(){console.log('no');});});