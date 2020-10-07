jQuery(document).ready(function(){

    jQuery('.uploadImage').click(function(){
       var Img = jQuery(this).parents().eq(0).siblings('div').children('img');
       console.log(Img);
       var images = [];
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
                multiple: true
            });

            mediaUploader.on('select', function(){
                var uploaded_images = mediaUploader.state().get('selection');
                var attachment_ids = uploaded_images.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    jQuery(
                            '<li class="gallery-item close-'+ attachment.id+'" id="'+ attachment.url+'">'
                                +'<div class="image-container">'
                                    +'<img src="'+ attachment.url+'"   class="picture-new">'
                                    +'<input type="hidden" value="'+ attachment.url+'"  class="gallery-item-url">'
                                +'</div>'
                                +'<div class="button-close-container">'
                                    +'<input type="button" class="close-div" value="Remove Image" onclick="closeDiv('+"'"+attachment.id+"'"+')"  id="close"/>'
                                +'</div>'
                            +'</li>').appendTo('.gallery-container');
                }).join();
                var url_images = [];

                for (var i = uploaded_images.toJSON().length - 1; i >= 0; i--) {
                    url_images += (uploaded_images.toJSON()[i].url)+',';
                }
                jQuery('#images').val(url_images);
            });
            
            mediaUploader.open();
    });

    var urlGallery      = window.location.pathname.split('/');     // Returns full URL (https://example.com/path/example.html)
    //console.log(urlGallery[urlGallery.length - 2]);
    // Load the sortable actions for move the images
    if (urlGallery[urlGallery.length - 2] == "wp-admin") {
        jQuery('.gallery-container').sortable({
          update : function(event, ui) {
            jQuery('#resultado').html('');
            jQuery('#resultado').append(ui.item.parent().attr('id')+",");
            jQuery('#resultado').append(ui.item.parent().sortable('toArray')+",");
            var arrayResult = jQuery('#resultado').html();
            var clearArray = arrayResult.split(',').reverse();
            var imgArray = [];
            for (var i = clearArray.length - 1; i >= 0; i--) {
                if (clearArray[i] != "undefined") {
                    imgArray += clearArray[i]+',';
                }
            }
            jQuery('#images').val(imgArray);
          }
        });
    }
});// end document ready

    //delete rows
    function closeDiv(className){
        var close = jQuery('.close-'+className).attr('id');

        if(jQuery('#images').val() != ''){
            var imagesArray = jQuery('#images').val().split(',');
            const itemToRemove = imagesArray.indexOf(close);
            imagesArray.splice(itemToRemove, 1);
            jQuery('.close-'+className).remove();
            jQuery('#images').val(imagesArray.join(','))
        }
    
    }

    /*function move(){
        jQuery('.gallery-container').sortable({
              update : function(event, ui) {
                jQuery('#resultado').html('');
                jQuery('#resultado').append(ui.item.parent().attr('id')+",");
                jQuery('#resultado').append(ui.item.parent().sortable('toArray')+",");
                var arrayResult = jQuery('#resultado').html();
                var clearArray = arrayResult.split(',').reverse();
                var imgArray = [];
                for (var i = clearArray.length - 1; i >= 0; i--) {
                    if (clearArray[i] != "undefined") {
                        imgArray += clearArray[i]+',';
                    }
                }
                jQuery('#images').val(imgArray);
              }
          });
    }*/