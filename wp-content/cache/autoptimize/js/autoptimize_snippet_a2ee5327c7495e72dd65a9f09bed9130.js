$=jQuery.noConflict();$(document).ready(function(){var mediaUploader;$('#button-before').click(function(e){e.preventDefault();if(mediaUploader){mediaUploader.open();return;}
mediaUploader=wp.media.frames.file_frames=wp.media({title:'Upload picture',button:{text:'Choose picture'},multiple:false});mediaUploader.on('select',function(){attachment=mediaUploader.state().get('selection').first().toJSON();$('#button-before-hidden').val(attachment.url);$('#image-before').attr('src',attachment.url);});mediaUploader.open();});$('#button-after').click(function(e){e.preventDefault();if(mediaUploader){mediaUploader.open();return;}
mediaUploader=wp.media.frames.file_frames=wp.media({title:'Upload picture',button:{text:'Choose picture'},multiple:false});mediaUploader.on('select',function(){attachment=mediaUploader.state().get('selection').first().toJSON();$('#button-after-hidden').val(attachment.url);$('#image-after').attr('src',attachment.url);});mediaUploader.open();});});