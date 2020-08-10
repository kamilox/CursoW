function addNewRow(){
    $('<div class="gallery-container">'
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

    $('.picture-new').css('opacity', '0');

    $('.uploadImage').click(function(){
        var Img = $(this).parents().eq(0).siblings('div').children('img');
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

        var close = $('.'+className).parents().eq(0).attr('id');
        if($('#'+close).attr('id') != "id-1"){
            $('#'+close).remove();
        }else{
            $('.messages').addClass('error').html('Sorry you can´t delete this row');
            setTimeout(function(){ 
                $('.error').css({
                    'height': '0',
                    'padding': '0',
                    'margin' : '0',
                    'visibility' : 'hidden',
                    'opacity' : '0',
                });
             }, 3000);
        }
    }
    
    var acum = $('#images').val(); 
    function saveUrl(url, reference){;
        if(reference == ""){
            acum = acum + url + ',';
            $('#images').val(acum);
        }else{
            var arraySave = acum.split(',');
            var indexId = arraySave.indexOf(reference);
            if(indexId != -1){
                arraySave.splice(indexId,1, url);
                acum = arraySave.join(',');
                $('#images').val(acum);
            }
        }
        var showButton = $('#images').val().split(',').length-1;
        if (showButton >= 2){
            $('#new-row').attr('disabled', false);
        }
    }
}
 
