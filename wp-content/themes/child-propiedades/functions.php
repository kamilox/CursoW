<?php
    // add other functions
    require_once __DIR__."/inc/bbdd.php";
    require_once __DIR__."/inc/menu-admin.php";
    // add custom styles
    function estilos(){
        wp_enqueue_style('estilos-padre', get_template_directory_uri(). "/style.css" );
        wp_enqueue_script('jquery');
        wp_enqueue_script('funciones-js', get_stylesheet_directory_uri()."/js/funciones.js", array('jquery'), 1.0);
        // conexion para el archivo aadmin-ajax.php
        wp_localize_script(
            'funciones-js', //llamamos el archivo que definimos para nuestrp jqeury personal
            'adminurl', // definimos un nombre para la conexion
            array(
                'ajaxurl'=>admin_url( 'admin-ajax.php' ) // admin_url nos lleva a la carpeta wp-admin
            )

        );
    }
    add_action('wp_enqueue_scripts', 'estilos');


    function cargarcategoria(){
        // recibe la variable que se envió en el post y se almacena en una variable
        $datos = $_REQUEST['valor'];
        // extraemos el valor de la variable que será el elemento de comparación
        $categoria = $datos['eleccion'];
        // se organizan los argumentos para la consulta
        $args = array(
            'post_type' => 'post',
            'category_name' => $categoria,
            'orderBy' => 'DATE',
            'order' => 'ASC'
        );
        // se ejecuta la consulta
        $noticias = new WP_Query( $args );
        // manejo de los datos obtenidos en la consulta

        while ($noticias->have_posts()): $noticias->the_post();
            the_title('<h2>','</h2>');
            the_excerpt();
        endwhile;
        // se limpia la memoria
        wp_reset_postdata();
        // se cierra el ciclo completo
        wp_die();  
    }
    // se ejecuta la funcion
    add_action('wp_ajax_cargarcategoria', 'cargarcategoria');
    // nopriv premite que usuarios no registrados puedan acceder a la información
    add_action('wp_ajax_nopriv_cargarcategoria', 'cargarcategoria');

    //add custom post

    function propiedades(){
        //Replace labels in Dsahboard
        $labels = array(
            'name' => _x('Propiedades','child-propiedades'),
            'singular_name' => _x('Propiedad','child-propiedades'),
            'menu_name' => _x('Propiedades','child-propiedades'),
            'name_admin_bar' => _x('Propiedades','child-propiedades'),
            'add_new' => _x('Añadir Propiedades','child-propiedades'),
            'add_new_item' => _x('Añadir nueva Propiedad','child-propiedades'),
            'new_item' => _x('Nueva Propiedad','child-propiedades'),
            'edit_item' => _x('Editar propiedad','child-propiedades'),
            'view_item' => _x('Ver Propiedad','child-propiedades'),
            'all_items' => _x('Todas las propiedades','child-propiedades'),
            'search_item' => _x('Buscar Propiedades','child-propiedades'),
            'parent_item_colon' => _x('Propiedad Padre','child-propiedades'),
            'not_found' => _x('No se han encotrado propiedades','child-propiedades'),
            'not_found_in_trash' => _x('No se han encontrado propiedades en la papelera','child-propiedades')
        );

        //Arguments
        $args = array(
            'labels' => $labels,
            'description' => _x('Post de tipo propiedades', 'child-propiedades'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'rewrite' => array('slug' => 'propiedades'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical'=> true,
            'menu_position' => 6,
            'supports' => array('title', 'editor', 'author', 'thumbnail')//,
            //'taxonomies' => array('post_tag', 'category')
        );

        register_post_type('propiedades', $args);
    }
    add_action('init', 'propiedades');

    // taxonomies

    function taxonomias(){
        //Tipos de propiedad
        register_taxonomy(
            'tipo-propiedad',
            'propiedades',
            array(
                'hierarchical' => true,
                'label' => 'Tipo de propiedad',
                'sort' => true,
                'args' => array('orderby' => 'term_order'),
                'rewrite' => array('slug' =>  'tipo-propiedad')
            )
        );
        //numero de habitaciones
        register_taxonomy(
            'habitaciones',
            'propiedades',
            array(
                'hierarchical' => true,
                'label' => 'N° de Habitaciones',
                'sort' => true,
                'args' => array('orderby' => 'term_order'),
                'rewrite' => array('slug' =>  'habitaciones')
            )
        );
        //numero de baños
        register_taxonomy(
            'bannos',
            'propiedades',
            array(
                'hierarchical' => true,
                'label' => 'N° de Baños',
                'sort' => true,
                'args' => array('orderby' => 'term_order'),
                'rewrite' => array('slug' =>  'bannos')
            )
        );
    }
    add_action('init', 'taxonomias');

   function imagenes_personalizadas(){
    add_image_size('propiedadDestacada', 600, 0);
   }
   add_action('after_setup_theme', 'imagenes_personalizadas');


   //
   function columnas_post_type_propiedades($columnas){
       $columnas = array(
           'cb' => '<input type="checkbox" />',
           'feature_thumb' => 'imagen',
            'title' => 'Propiedad',
            'tipo-propiedades' => 'Tipo de propiedad',
            'habitaciones' => 'N° Habitaciones',
            'bannos' => 'N° de Baños',
            'precio' => 'Precio',
            'date' => 'fecha de publicación'
       );
       return $columnas;
   }
   add_filter('manage_edit-propiedades_columns', 'columnas_post_type_propiedades');
    //
    
    function filas_post_type_propiedades($columna, $post_id){
        global $post;

        switch($columna){
            case 'feature_thumb' :
                echo '<a href="'.get_edit_post_link().'">';
                echo the_post_thumbnail('thumbnail');
                echo '</a>';

            break;

            case 'tipo-propiedades':
                //consultar que elementos hay marcados en la taxonomía como tipo propiedades
                $tipos = get_the_terms($post_id, 'tipo-propiedad');
                if($tipos != null){
                    foreach($tipos as $tipo){
                        echo $tipo->name ." ";
                        unset($tipo);
                    }
                }
            break;

            case 'habitaciones':
                //consultar que elementos hay marcados en la taxonomía como tipo habitaciones
                $habitaciones = get_the_terms($post_id, 'habitaciones');
                if($habitaciones != null){
                    foreach($habitaciones as $habitacion){
                        echo $habitacion->name ." ";
                        unset($habitacion);
                    }
                }
            break;

            case 'bannos':
                //consultar que elementos hay marcados en la taxonomía como tipo baños
                $bannos = get_the_terms($post_id, 'bannos');
                if($bannos != null){
                    foreach($bannos as $banno){
                        echo $banno->name ." ";
                        unset($banno);
                    }
                }
            break;

            case 'precio':
                $precio = get_post_meta($post_id, 'precio');
                the_field('precio');
            break;

            default:
            break;
        }

    }
    add_action('manage_propiedades_posts_custom_column', 'filas_post_type_propiedades', 10, 2);


    // llamada ajax

    

?>