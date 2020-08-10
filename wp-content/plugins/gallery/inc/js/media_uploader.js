$ = jQuery.noConflict();

$(document).ready(function(){
        
    $('#new-row').attr('disabled', true);
    // checkbox values
    $('#hide_from_live').click(function(){
        if($('#hide_from_live_hidden').val() == 0){
            $('#hide_from_live_hidden').val(1)
        }else{
            $('#hide_from_live_hidden').val(0)
        }
    });

    
    $('#feature_category').click(function(){
        if($('#feature_category_hidden').val() == 0){
            $('#feature_category_hidden').val(1)
        }else{
            $('#feature_category_hidden').val(0)
        }
    });

    if($('#hide_from_live_hidden').val() == 1 ){
        $('#hide_from_live').attr('checked', true);
    }else{
        $('#hide_from_live').attr('checked', false);
    }

    if($('#feature_category_hidden').val() == 1 ){
        $('#feature_category').attr('checked', true);
    }else{
        $('#feature_category').attr('checked', false);
    }

    $('.uploadImage').click(function(){
       var Img = $(this).parents().eq(0).siblings('div').children('img');
       console.log(Img);
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

    $('.updateImage').click(function(){
        var Img = $(this).parents().eq(0).siblings('div').children('img');
        var ImgRefence = Img.attr('src');
        var mediaUploaderUpdate;
        if(mediaUploaderUpdate){
            mediaUploaderUpdate.open();
            return;
        }
         
        mediaUploaderUpdate = wp.media.frames.file_frames = wp.media({
            title: 'Upload picture',
                button: {
                    text: 'Choose picture'
                },
                multiple: false
            });
 
            mediaUploaderUpdate.on('select', function(){
                attachment = mediaUploaderUpdate.state().get('selection').first().toJSON();
                Img.attr('src', attachment.url);
                Img.css('opacity', '1');
                updateUrl(attachment.url, ImgRefence);
               
            });
            mediaUploaderUpdate.open();
             
     });


});// end document ready

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
    
    var acum = ""; 
    function saveUrl(url, reference){;
        console.log(url + '//' + reference)
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

    function updateUrl(url, reference){;
        console.log(url + '//' + reference)
        if(reference == ""){
            acum = acum + url + ',';
            $('#images').val(acum);
        }else{
            var arraySave = $('#images').val().split(',');
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