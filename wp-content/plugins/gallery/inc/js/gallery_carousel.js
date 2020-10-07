jQuery(document).ready(function(){
    var srcImage = "";
    jQuery('.gallery-carousel-item img').click(function(){
        var srcImage = jQuery(this).attr('src');
        //console.log(srcImage);
        jQuery('.gallery-image-master img').attr('src', '');
        jQuery('.gallery-image-master img').attr('srcset', '');
        jQuery('.gallery-image-master img').attr('src', srcImage);
        jQuery('.gallery-image-master img').attr('srcset', srcImage);
    });
});