$ = jQuery.noConflict();

$(document).ready(function(){
    
    var eleccion = "";

    $('.boton-deportes').click(function(){
        eleccion = 'Deportes';
        cargar_noticias_ajax();
    });

    $('.boton-actualidad').click(function(){
        eleccion = 'Actualidad';
        cargar_noticias_ajax();
    });

    // Lammada Ajax

    function cargar_noticias_ajax(){
        var datos = {
            'eleccion' : eleccion
        }

        $.ajax({
            type : 'post',
            url : adminurl.ajaxurl,
            data : {
                action: 'cargarcategoria',
                valor : datos
            },

            beforeSend: function(){
                $('#contenedor-noticias').html(' cargando inmuebles');
            },

            success: function(datos){
                $('#contenedor-noticias').html(datos);
            },

            error: function(){
                console.log(error);
            }

        });
    }

});