$(document).ready(function(){
    var srcImage = "";
    $('.gallery-carousel-item img').click(function(){
        var srcImage = $(this).attr('src');
        console.log(srcImage);
        $('.gallery-image-master img').attr('src', '');
        $('.gallery-image-master img').attr('srcset', '');
        $('.gallery-image-master img').attr('src', srcImage);
        $('.gallery-image-master img').attr('srcset', srcImage);
    });
});