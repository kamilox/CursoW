<div class="gallery-full-container">

    <?php
    global $wpdb, $post;
    $patients = get_posts([
        'post_type' => 'patients',
        'post_status' => 'publish',
        'numberposts' => -1
        // 'order'    => 'ASC'
      ]);

    	foreach ($patients as $key => $value) {

    		$detail = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$value->ID.'');
    		//print_r($detail[0]->images).'<br>';
    	?>
    	<!--Div each case -->
    	<?php if(!empty($detail[0]->images)) {?>
    		<div class="patient-detail">
    			<div class="patient-detail-title">
    				<?php echo get_the_title(); ?>
    			</div>
    			<div class="patient-detail-images">
    				<?php 
    					$allImages = explode(',', $detail[0]->images);
    					foreach ($allImages as $keyImage => $image) {
    						if(($image)!= "" && $keyImage < 2){
    						?>
	    						<div class="image-gallery">
	    							<div 
	    								class="image-gallery-item"
	    								style=" background-image: url('<?php echo $image ?>');
	    										background-repeat: no-repeat;
	    										background-position: center;
	    										background-size: cover;
	    									"
	    							>
	    							</div>
	    						</div>
    						<?php
    						}
    					}

    				?>
    			</div>
    			<div class="patient-detail-buttom">
    				<a href="<?php echo get_post_permalink($value->ID) ?>" ><?php echo  _x('View Case Details', get_current_theme()) ?></a>
    				
    			</div>
    		</div>

    	<?php
    	}
    }
  
    ?>
</div>
