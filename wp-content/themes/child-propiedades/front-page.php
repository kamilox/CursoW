<?php get_header(); ?>
<div id="primary" <?php generate_do_element_classes( 'content' ); ?>>
		<main id="main" <?php generate_do_element_classes( 'main' ); ?>>
			<h2>Buscar Inmuenbles</h2>
			<form method="get" action="propiedades-encontradas">
				<!--Tipo de inmueble-->
				<select name="tipo-propiedad">
					<option value="">Seleccione el tipo de propiedad</option>
					
						<?php 
							foreach(get_terms('tipo-propiedad', array('hide_empty' => true)) as $tax_tipo){
								echo '<option value="'.$tax_tipo->slug.'">'.$tax_tipo->name.'</option>';
							}
						?>
				
				</select>
				<!--Número de habitaciones-->							
				<select name="habitaciones">
					<option value="">N° de habitaciones</option>
					
						<?php 
							foreach(get_terms('habitaciones', array('hide_empty' => true)) as $tax_habitaciones){
								echo '<option value="'.$tax_habitaciones->slug.'">'.$tax_habitaciones->name.'</option>';
							}
						?>
				
				</select>
				<!--Número de baños-->
				<select name="bannos">
					<option value="">N° de baños</option>
					
						<?php 
							foreach(get_terms('bannos', array('hide_empty' => true)) as $tax_bannos){
								echo '<option value="'.$tax_bannos->slug.'">'.$tax_bannos->name.'</option>';
							}
						?>
				
				</select>
				<select name="precioDesde">
					<option value="">Desde ($)</option>
					<option value="50000">50.000 ($)</option>
					<option value="60000">60.000 ($)</option>
					<option value="70000">70.000 ($)</option>
					<option value="80000">80.000 ($)</option>
					<option value="90000">90.000 ($)</option>
					<option value="100000">100.000 ($)</option>
					<option value="110000">110.000 ($)</option>
				</select>

				<select name="precioHasta">
					<option value="">Hasta ($)</option>
					<option value="50000">50.000 ($)</option>
					<option value="60000">60.000 ($)</option>
					<option value="70000">70.000 ($)</option>
					<option value="80000">80.000 ($)</option>
					<option value="90000">90.000 ($)</option>
					<option value="100000">100.000 ($)</option>
					<option value="110000">110.000 ($)</option>
				</select>


				<input type="submit" value="Buscar">
			</form>
			<?php
				$args = array(
					'post_type' => 'propiedades',
					'post_per_page' => 6,
					'orderby' => 'DATE',
					'order' => 'DESC'
				);
				$propiedades = new wp_query($args);

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
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>