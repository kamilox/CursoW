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
$settings = $wpdb->get_results('SELECT * FROM patients_settings ORDER BY id DESC LIMIT 1');

echo '<div class="container">';
	echo '<div class="procedures-title">';
		echo '<h2 style="color: '.$settings[0]->procedure_title_color.'">'. $term->name .'<h2>';
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
	    						echo '<div class="image-gallery image-gallery-content">';
	    							echo '<div 
	    								class="image-gallery-item"
	    								style=" background-image: url('.$image.');
	    										background-repeat: no-repeat;
	    										background-position: center;
	    										background-size: cover;
	    									"
	    							>';
	    							echo '</div>'; //close image-gallery-item
	    							echo '<div class="patient-detail-image-header-info-description-content">';
		    							echo '<div class="patient-detail-image-header-info-title-content">';
		    									echo get_bloginfo();
		    							echo '</div>';
		    							echo '<div class="patient-detail-image-header-info-logo">';
		    								if(!empty($settings[0]->logo_url)){
		    									$logo_url = $settings[0]->logo_url;
		    								}else{
		    									$logo_url = plugins_url( '/inc/img/logo-wordpress.png', __FILE__);
		    								}
		    								echo'<img src="'.$logo_url.'" class="patient-detail-info-logo">';
		    							echo '</div>';
	    							echo '</div>';
	    						echo'</div>'; // close image-gallery
    						}
    					}
					echo '</div>';// patient-detail-images
					
					if($settings[0]->display_excerpt_in_gallery == "yes"){
						$display = "block";
						$excerpt_heigth = "150px";
					}else{
						$display = "none";
						$excerpt_heigth = "0px";
					}
					echo'<div class="patient-detail-excerpt" style="display:'.$display.'; height:'.$excerpt_heigth.'">';
						
						echo wp_trim_words( get_the_content(), 25, '<a href='.get_post_permalink($id).'>... read more</a>' );
					echo'</div>';
					echo'<div class="patient-detail-buttom">';
    					echo '<a href='.get_post_permalink($id).' 
    							style="
    								background:'.$settings[0]->primary_button_background_color.';
    								border-color: '.$settings[0]->primary_button_border_color.';
    								color: '.$settings[0]->primary_button_font_color.';
    							"> '._x('View Case Details', get_current_theme()).' </a>';
    				echo '</div>';// close patient-detail-buttom
				echo '</div>';//patient-detail
			} // end while
		} // end if

	echo '</div>'; //close gallery-full-container	
echo '</div>'; //close container


get_footer();
?>
