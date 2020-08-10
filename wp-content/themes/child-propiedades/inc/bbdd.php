<?php
   
    function guardar_datos(){
        // guardar visitas
        if(isset($_POST['boton-solicitud-visita'])){
            global $wpdb; //conexion con la base de datos
            //sanitizar la base de datos pa evitar hackeos se usa "sanitize_text_field()" al principio de lo que trae los posts
        
            $nombre = sanitize_text_field($_POST['nombre']);
            $telefono = sanitize_text_field($_POST['telefono']);
            $email = sanitize_text_field($_POST['email']);
            $titulo = sanitize_text_field($_POST['titulo-inmueble']);
            $url = sanitize_text_field($_POST['url-inmueble']);

            $datos = array(
                'nombre' => $nombre,
                'telefono' => $telefono,
                'email' => $email,
                'titulo_inmueble' => $titulo,
                'url_inmueble' => $url
            );

            $formato = array(
                '%s',//nombre
                '%d', //telefono
                '%s',//email
                '%s', //titulo del inmueble
                '%s' //url del inmueble
            );

            $tabla = 'vistas';

            $wpdb->insert($tabla, $datos, $formato);
        }
    }
    add_action('init', 'guardar_datos');
    
    //editar visitas
    function editar_visitas(){
        if(isset($_POST['boton-editar-visita'])){
            global $wpdb;

            $nombre = sanitize_text_field($_POST['nombre']);
            $telefono = sanitize_text_field($_POST['telefono']);
            $email = sanitize_text_field($_POST['email']); 
            $id_visita = sanitize_text_field($_POST['id_visita']); 

            $tabla = 'vistas';

            $wpdb->update(
                // 1° tabla
                $tabla,
                // 2° Campos
                array(
                    'nombre' => $nombre,
                    'telefono' => $telefono,
                    'email' => $email
                ),
                // 3° Identificador del redistro a modificar
                array(
                    'id_visita' => $id_visita
                ),
                // 4° formato
                array(
                    '%s',//nombre
                    '%d', //telefono
                    '%s'//email
                ),
                //formato del identificador
                array(
                    '%d' //id_visita
                )
            );
            $redirect = site_url().'/wp-admin/admin.php?page=solicitudes-visita';
            wp_redirect($redirect);
            exit();
        }
    }
    add_action('init', 'editar_visitas');

    // Eliminar Visita

    function eliminar_visita(){
        if(isset($_POST['boton-borrar-visita'])){
            global $wpdb;
            $table = 'vistas';
            $id_visita = $_POST['id_visita'];

            $wpdb->delete(
                //nombre de la tabla
                'vistas',
                array(
                    'id_visita' => $id_visita
                ),
                //formato del identificador
                array(
                    '%d' //id_visita
                )
            );
            $redirect = site_url().'/wp-admin/admin.php?page=solicitudes-visita';
            wp_redirect($redirect);
            exit();
        }
    }
    add_action('init', 'eliminar_visita');
?>
