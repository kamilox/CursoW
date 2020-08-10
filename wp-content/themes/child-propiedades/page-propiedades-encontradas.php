<?php get_header(); ?>
<div id="primary" <?php generate_do_element_classes( 'content' ); ?>>
		<main id="main" <?php generate_do_element_classes( 'main' ); ?>>
            <h2>Resultados de la búsqueda</h2>
            <?php
                $tipo_propiedad = $_GET['tipo-propiedad'];
                $habitaciones = $_GET['habitaciones'];
                $bannos = $_GET['bannos'];
                $precioDesde = $_GET['precioDesde'];
                $precioHasta = $_GET['precioHasta'];

                $args = array(
                    'post_type' => 'propiedades',
                    'post_per_page' => -1,
                    //consultas por taxonomía
                    'tipo-propiedad' => $tipo_propiedad,
                    'habitaciones' => $habitaciones,
                    //meta querys
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'precio',
                            'value' => $precioDesde,
                            'compare' => '>=',
                            'type' => 'NUMERIC'
                        ),
                        array(
                            'key' => 'precio',
                            'value' => $precioHasta,
                            'compare' => '<=',
                            'type' => 'NUMERIC'
                        )
                    ),
                    'bannos' => $bannos,
                    'orderby' => 'DATE'
                );
                $propiedades = new wp_query($args);
                
                if($propiedades->have_posts()){
                    while($propiedades->have_posts()) : $propiedades->the_post();
                        echo '<div id="contenedor-propiedades">';
                            the_title('<h2>', '</h2>');
                            the_post_thumbnail('mediun');
                            the_excerpt();
                            
                            //datos del custon field
                            $precio = get_field('precio');
                            $tamano = get_field('tamano-m2');
                            echo '<p> Precio:'.	/*the_field('precio');*/number_format($precio, 2, ',', '.') .' $</p>';
                            echo '<p> Tamaño:'.	/*the_field('precio');*/number_format($tamano, 2, ',', '.') .' M2</p>';
                            
                            //taxonomías
                            echo '<p>';
                                echo 'Tipo de Propiedad: ';
                                $elementos = get_the_terms($post->ID, 'tipo-propiedad');
                                if($elementos != null){
                                    foreach ($elementos as $elemento) {
                                        echo $elemento->name. ' ';
                                    }
                                }
                            echo '</p>';

                            echo '<p>';
                                echo 'N° Habitaciones: ';
                                $elementos = get_the_terms($post->ID, 'habitaciones');
                                if($elementos != null){
                                    foreach ($elementos as $elemento) {
                                        echo $elemento->name. ' ';
                                    }
                                }
                            echo '</p>';

                            echo '<p>';
                                echo 'N° Baños: ';
                                $elementos = get_the_terms($post->ID, 'bannos');
                                if($elementos != null){
                                    foreach ($elementos as $elemento) {
                                        echo $elemento->name. ' ';
                                    }
                                }
                            echo '</p>';
                            
                            
                            echo '<a href="'.get_the_permalink().'" class="btn"> Ver</a>';

                        echo '</div>';

                        
                    endwhile;
                    wp_reset_postdata();
                }else{
                    echo "<h2> No se han encontrado propiedades </h2>";
                }
               
            ?>

        </main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>