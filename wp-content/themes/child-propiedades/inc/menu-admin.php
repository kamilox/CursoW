<?php
    function nuevas_secciones(){
        add_menu_page('Solicitudes de Visitas', 'Visitas', 'administrator', 'solicitudes-visita', 'solicitudes_visita', '', 20);
    }
    add_action('admin_menu', 'nuevas_secciones');


    function solicitudes_visita(){ ?>
        <div class="wrap">
            <?php
                if(isset($_GET['seccion'])){
                    $seccion_activa = $_GET['seccion'];
                }else{
                    $seccion_activa = '';
                }
            ?>
            <?php
                if($seccion_activa == ''){?>
                    <h2>Solicitudes de Visitas</h2>
                    <table class="wp-list-table widefat striped">
                        <th class="manage-column">ID</th>
                        <th class="manage-column">Nombre</th>
                        <th class="manage-column">Teléfono</th>
                        <th class="manage-column">Email</th>
                        <th class="manage-column">Inmueble</th>
                        <th class="manage-column">Url</th>
                        <th class="manage-column">Editar</th>
                        <th class="manage-column">Eliminar</th>

                        <tbody>
                            <?php
                                global $wpdb;
                                $tabla = 'vistas';
                                $registros = $wpdb->get_results(
                                    'SELECT * FROM  vistas ORDER BY id_visita DESC', ARRAY_A
                                );
                                // recorrer el array de registros
                                foreach($registros as $registro){
                                    echo '<tr>';
                                        echo '<td>'.$registro['id_visita'].'</td>';
                                        echo '<td>'.$registro['nombre'].'</td>';
                                        echo '<td>'.$registro['telefono'].'</td>';
                                        echo '<td>'.$registro['email'].'</td>';
                                        echo '<td>'.$registro['titulo_inmueble'].'</td>';
                                        echo '<td> <a href="'.$registro['url_inmueble'].'"> Ver Inmueble </a></td>';
                                ?>
                                    <td>
                                        <form method="post" action="<?php echo site_url() ?>/wp-admin/admin.php?page=solicitudes-visita&seccion=editar-visita">
                                            <input type="hidden" name="id_visita" value="<?php echo $registro['id_visita'] ?>">
                                            <input type="submit" name="editar-solicitud-visita" class="button button-primary" value="Editar">
                                        </form>
                                    </td>

                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id_visita" value="<?php echo $registro['id_visita'] ?>">
                                            <input type="submit" name="boton-borrar-visita" class="button button-primary" value="Eliminar">
                                        </form>
                                    </td>

                                <?php  echo '<tr>';
                                }
                                
                            ?>
                        </tbody>
                    </table>
            <?php  }elseif($seccion_activa == 'editar-visita'){ ?>
                <h2>Editar Solicitud de visita </h2>
                <form method="post" action="">
                    <?php

                        global $wpdb;
                        $id_visita = $_POST['id_visita'];
                        $tabla = 'vistas';

                        $resultados = $wpdb->get_results(
                            'SELECT * FROM '.$tabla.' WHERE id_visita ='.$id_visita.'' , ARRAY_A
                        );
                        foreach ($resultados as $resultado) {
                            echo '<input type="text" name="nombre" value="'.$resultado['nombre'].'" /> <br>';
                            echo '<input type="number" name="telefono" value="'.$resultado['telefono'].'" /> <br>';
                            echo '<input type="text" name="email" value="'.$resultado['email'].'" /> <br>';
                            echo '<input type="hidden" name="id_visita" value="'.$resultado['id_visita'].'" /> <br>';
                            echo '<input type="submit" name="boton-editar-visita" class="button button-primary" value="Editar Datos" /> <br>';
                        }
                    ?>
                </form>

            <?php } ?>
        </div>



    <?php } ?>