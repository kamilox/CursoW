$=jQuery.noConflict();$(document).ready(function(){$('#new-row').attr('disabled',true);$('.button-load-after').attr('disabled',true);$('#hide_from_live').click(function(){if($('#hide_from_live_hidden').val()==0){$('#hide_from_live_hidden').val(1)}else{$('#hide_from_live_hidden').val(0)}});$('#feature_category').click(function(){if($('#feature_category_hidden').val()==0){$('#feature_category_hidden').val(1)}else{$('#feature_category_hidden').val(0)}});if($('#hide_from_live_hidden').val()==1){$('#hide_from_live').attr('checked',true);}else{$('#hide_from_live').attr('checked',false);}
if($('#feature_category_hidden').val()==1){$('#feature_category').attr('checked',true);}else{$('#feature_category').attr('checked',false);}});function closeDiv(className){var close=$('.'+className).parents().eq(0).attr('id');if($('#'+close).attr('id')!="id-1"){$('#'+close).remove();}else{$('.messages').addClass('error').html('Sorry you can´t delete this row');setTimeout(function(){$('.error').css({'height':'0','padding':'0','margin':'0','visibility':'hidden','opacity':'0',});},3000);}}
function imageBefore(id){var divFather=$('.'+id).parents().eq(2).attr('id');var mediaUploaderBefore;if(mediaUploaderBefore){mediaUploaderBefore.open();return;}
mediaUploaderBefore=wp.media.frames.file_frames=wp.media({title:'Upload picture',button:{text:'Choose picture'},multiple:false});mediaUploaderBefore.on('select',function(){attachment=mediaUploaderBefore.state().get('selection').first().toJSON();$('#'+divFather+' .gallery-before .image-container .picture-before').attr('src',attachment.url);$('#'+divFather+' .gallery-before .button-container .profile_picture_before').val(attachment.url);$('#'+divFather+' .gallery-after .button-container .button-load-after').attr('disabled',false);var index='['+attachment.url+']'+'[gallery-before]'+'['+divFather+']';$('#'+divFather+' .gallery-before .button-container .button-load-before').attr({value:'Update image',class:'button update_image',onclick:'updateImage("update_image")'});saveUrl(index);});mediaUploaderBefore.open();}
function imageAfter(id){var mediaUploaderAfter;var divFather=$('.'+id).parents().eq(2).attr('id');if(mediaUploaderAfter){mediaUploaderAfter.open();return;}
mediaUploaderAfter=wp.media.frames.file_frames=wp.media({title:'Upload picture',button:{text:'Choose picture'},multiple:false});var acum=$('#images').val();mediaUploaderAfter.on('select',function(){attachment=mediaUploaderAfter.state().get('selection').first().toJSON();$('#'+divFather+' .gallery-after .image-container .picture-after').attr('src',attachment.url);$('#'+divFather+' .gallery-after .button-container .profile_picture_after').val(attachment.url);$('#new-row').attr('disabled',false);var index='['+attachment.url+']'+'[gallery-after]'+'['+divFather+']';saveUrl(index);});mediaUploaderAfter.open();}
var acum="";function saveUrl(url){acum=acum+url+'; ';$('#images').val(acum);}
function updateImage(buttonClass){var idRefer=$('.'+buttonClass).parents().eq(2).attr('id');var classParent1=$('.'+buttonClass).parents().eq(1).attr('class').split(" ").pop();var classParent0=$('.'+buttonClass).parents().eq(0).attr('class');var urlRefer=$('#'+idRefer+' .'+classParent1+' .'+classParent0+' .profile_picture_before').attr('value');var sourceData=$('#images').val().split(';');var removeItem='['+urlRefer+']'+'['+classParent1+']'+'['+idRefer+']';var index=sourceData.indexOf(removeItem);console.log(index);console.log(sourceData+'<br>');console.log(removeItem);};