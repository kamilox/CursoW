<?php get_header(); ?>

    <div id="primary" <?php generate_do_element_classes( 'content' ); ?>>
		<main id="main" <?php generate_do_element_classes( 'main' ); ?>>
            <?php
                while(have_posts()) : the_post();
                    the_title('<h2>', '</h2>');
                    the_post_thumbnail();
                    $url = get_the_permalink();
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

                    echo '<div>';
                        the_content();
                    echo '</div>';
                    
                    echo '<div>';
                        $propietario = get_field('nombres_y_apellidos');
                        $telefono = get_field('telefono');
                        $email = get_field('email');

                        echo '<p> Nombres del propietario:'.	$propietario .' </p>';
                        echo '<p> Teléfono:'.	$telefono .' </p>';
                        echo '<p> email:'.	$email .' </p>';
                    echo '</div>';
                ?>

                <form method='post' id='solicitud-visitas'>
                    <input type='text' placeholder='Nombre' name="nombre" ><br>
                    <input type='number' placeholder='Teléfono' name="telefono"><br>
                    <input type='email' placeholder='Email' name="email" ><br>
                    <input type='hidden' name="titulo-inmueble" id="titulo-inmueble" value='<?php the_title() ?>'><br>
                    <input type='hidden' name="url-inmueble" id="url-inmueble" value='<?php echo $url; ?>'><br>
                    <input type='submit' value='Solicitar Visita' name="boton-solicitud-visita">
                </form>
                    
                <?php 
                   // print_r($_POST);
                ?>

               <?php endwhile; ?>

        </main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>