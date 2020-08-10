$=jQuery.noConflict();$(document).ready(function(){var eleccion="";$('.boton-deportes').click(function(){eleccion='deportes';cargar_noticias_ajax();});$('.boton-actualidad').click(function(){eleccion='actualidad';cargar_noticias_ajax();});function cargar_noticias_ajax(){var datos={'eleccion':eleccion}
$.ajax({type:'post',url:admin_url.ajax_url
data:{action:'cargarCategoria',valor:datos},});}});