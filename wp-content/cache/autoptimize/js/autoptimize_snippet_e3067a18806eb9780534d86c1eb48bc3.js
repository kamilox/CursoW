$=jQuery.noConflict();$(document).ready(function(){var mediaUploaderBefore;$('#button-before').click(function(e){e.preventDefault();if(mediaUploaderBefore){mediaUploaderBefore.open();return;}
mediaUploaderBefore=wp.media.frames.file_frames=wp.media({title:'Upload picture',button:{text:'Choose picture'},multiple:false});mediaUploaderBefore.on('select',function(){attachment=mediaUploaderBefore.state().get('selection').first().toJSON();$('#button-before-hidden').val(attachment.url);$('#image-before').attr('src',attachment.url);});mediaUploaderBefore.open();});var mediaUploaderAfter;$('#button-after').click(function(e){e.preventDefault();if(mediaUploaderAfter){mediaUploaderAfter.open();return;}
mediaUploaderAfter=wp.media.frames.file_frames=wp.media({title:'Upload picture',button:{text:'Choose picture'},multiple:false});mediaUploaderAfter.on('select',function(){attachment=mediaUploaderAfter.state().get('selection').first().toJSON();$('#button-after-hidden').val(attachment.url);$('#image-after').attr('src',attachment.url);});mediaUploaderAfter.open();});var numRow=0;$('#new-row').click(function(){numRow++;console.log(numRow);$('.gallery-container').clone().appendTo('.gallery');});});