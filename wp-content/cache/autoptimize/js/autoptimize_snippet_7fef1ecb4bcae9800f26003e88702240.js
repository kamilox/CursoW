$=jQuery.noConflict();$(document).ready(function(){var eleccion="";$('.boton-deportes').click(function(){eleccion='Deportes';cargar_noticias_ajax();});$('.boton-actualidad').click(function(){eleccion='Actualidad';cargar_noticias_ajax();});function cargar_noticias_ajax(){var datos={'eleccion':eleccion}
$.ajax({type:'post',url:admin-url.ajax-url,data:{action:'cargarcategoria',valor:datos},beforeSend:function(){$('#contenedor-noticias').html(' cargando inmuebles');},success:function(){$('#contenedor-noticias').html(datos);},error:function(){console.log(error);}});}});