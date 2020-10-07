function addNewRow(){
    jQuery('<div class="gallery-container">'
    +'<input type="button" class="close-div" value="x" onclick="closeDiv("close-div")"  id="close"/>'
    +'<div class="gallery-item gallery-before">'
    +'<H3>Before</H3>'
    +'<div class="image-container">'
    +'<img src=""   class="picture-new">'
    +'</div>'
    +'<div class="button-container">'
    +'<input type="button" class="button uploadImage" value="Upload File" />'
    +'<input type="hidden" class="profile_picture" value = "" />'
    +'</div>'
    +'</div>'
    +'<div class="gallery-item gallery-after">'
    +'<H3>After</H3>'
    +'<div class="image-container">'
    +'<img src=""   class="picture-new">'
    +'</div>'
    +'<div class="button-container">'
    +'<input type="button" class="button uploadImage" value="Upload File" />'
    +'<input type="hidden" class="profile_picture" value = "" />'
    +'</div>'
    +'</div>'
    +'</div>').appendTo('.gallery');

    jQuery('.picture-new').css('opacity', '1');

    jQuery('.uploadImage').click(function(){
        var Img = jQuery(this).parents().eq(0).siblings('div').children('img');
        var ImgRefence = Img.attr('src');
         var mediaUploader;
         if(mediaUploader){
             mediaUploader.open();
             return;
         }
         
         mediaUploader = wp.media.frames.file_frames = wp.media({
             title: 'Upload picture',
                 button: {
                     text: 'Choose picture'
                 },
                 multiple: false
             });
 
             mediaUploader.on('select', function(){
                 attachment = mediaUploader.state().get('selection').first().toJSON();
                 Img.attr('src', attachment.url);
                 Img.css('opacity', '1');
                 if(ImgRefence != null){
                     saveUrl(attachment.url, ImgRefence);
                 }else{
                     saveUrl(attachment.url);
                 }
             });
             mediaUploader.open();
             
     });

     //delete rows
    function closeDiv(className){

        var close = jQuery('.'+className).parents().eq(0).attr('id');
        if(jQuery('#'+close).attr('id') != "id-1"){
            jQuery('#'+close).remove();
        }else{
            jQuery('.messages').addClass('error').html('Sorry you can´t delete this row');
            setTimeout(function(){ 
                jQuery('.error').css({
                    'height': '0',
                    'padding': '0',
                    'margin' : '0',
                    'visibility' : 'hidden',
                    'opacity' : '0',
                });
             }, 3000);
        }
    }
    
    var acum = jQuery('#images').val(); 
    function saveUrl(url, reference){;
        if(reference == ""){
            acum = acum + url + ',';
            jQuery('#images').val(acum);
        }else{
            var arraySave = acum.split(',');
            var indexId = arraySave.indexOf(reference);
            if(indexId != -1){
                arraySave.splice(indexId,1, url);
                acum = arraySave.join(',');
                jQuery('#images').val(acum);
            }
        }
        var showButton = jQuery('#images').val().split(',').length-1;
        if (showButton >= 2){
            jQuery('#new-row').attr('disabled', false);
        }
    }
}
 

 
