$=jQuery.noConflict();$(document).ready(function(){$('.uabb-post-thumbnail ').append('<div class="image-protected">'
+'<div class="text-protected">'
+'Welcome! Please verify <br>'
+'your age to enter.<br>'
+'Are you 21 years or older?'
+'<br>'
+'<br>'
+'Some material on this site may be deemed inappropriate for those under 21 by Google, Facebook and other organazitions'
+'</div>'
+'<div class="button-protected">'
+'<input type="button" class="button-yes" value="Yes" onclick="yesFunction()">'
+'<input type="button" class="button-no" value="No" onclick="noFunction">'
+'</div>'
+'</div>');});function yesFunction(){$('.image-protected').css('display','none');}
function yesFunction(){console.log('no');}