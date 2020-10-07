<?php
/*
* Template name: Gallery Index
*/
$short_custom = 'short-custom';
get_header()
?>
<div class="container">
	<div class="container-procedures">
		<?php
			$taxonomy = 'procedures';
			$args = array(
				'taxonomy' => $taxonomy,
				'parent' => 0
			);

			$terms = get_terms($args);
			
			foreach ($terms as $key => $term) {
				$name = $term->name;
				$link = get_term_link($term->term_id, $taxonomy);
				$image_id = get_term_meta($term ->term_id, 'procedures-image-id', true );
				$childs = get_term_children( $term->term_id, $taxonomy );


				if($name != 'sin categoria'){
					echo '<div class="procedures-parents">';
						echo '<div class="procedures-parents-image">';
							if(!empty($image_id)){
								echo wp_get_attachment_image ( $image_id, '' );
							}else{
								echo '<img src="'. plugins_url( '/inc/img/cover.jpg', __FILE__ ).'">';
							}
						echo '</div>';
						echo '<h2>'.$name.'</h2>';
						echo '<div class="procedures-items">';
						foreach ($childs as $key => $child) {
							$category = get_term($child, $taxonomy);
							$count = $category->count;
							if ($count > 0) {
								$link = get_term_link($child, $taxonomy);
								$termName = get_term_by('id', $child, 'procedures');
								echo '<div class="procedures-item">';
									echo '<a href="'.$link.'" >'.$termName->name.'</a>';
								echo '</div>'; //procedures-item
							}
							
						}
						echo '</div>';//close procedures-items
					echo '</div>';
				}
			}
		?>
	</div>
</div>


<?php
get_footer();
?>