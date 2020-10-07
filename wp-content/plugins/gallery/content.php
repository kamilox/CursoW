<?php
/*
* Template name: Page content 
*
*
*/
get_header();
global $wp, $wpdb, $post;
$taxonomy = 'procedures';
$term = get_queried_object();
$childs = get_term_children( $term->term_id, $taxonomy );


echo '<div class="container">';
	echo '<div class="procedures-title">';
		echo '<h2>'. $term->name .'<h2>';
	echo '</div>';// close procedures-title
	echo '<div class="gallery-full-container">';

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				$id = get_the_ID(); 
				$patient = $wpdb->get_results('SELECT * FROM patients_gallery WHERE post_id ='.$id.'');
				$allImages = explode(',', $patient[0]->images);
				echo '<div class="patient-detail">';
					// title
					echo '<div class="patient-detail-title">';
	    				echo get_the_title();
	    			echo '</div>';// close patient-detail-title
	    			// images
					echo '<div class="patient-detail-images">';
						foreach ($allImages as $keyImage => $image) {
    						if(($image)!= "" && $keyImage < 2){
	    						echo '<div class="image-gallery">';
	    							echo '<div 
	    								class="image-gallery-item"
	    								style=" background-image: url('.$image.');
	    										background-repeat: no-repeat;
	    										background-position: center;
	    										background-size: cover;
	    									"
	    							>';
	    							echo '</div>'; //close image-gallery-item
	    						echo'</div>'; // close image-gallery
    						}
    					}
					echo '</div>';// patient-detail-images
					echo'<div class="patient-detail-buttom">';
    					echo '<a href='.get_post_permalink($id).' > '._x('View Case Details', get_current_theme()).' </a>';
    				echo '</div>';// close patient-detail-buttom
				echo '</div>';//patient-detail
			} // end while
		} // end if

	echo '</div>'; //close gallery-full-container	
echo '</div>'; //close container


get_footer();
?>
