<?php
/*
*	Template Name: Single patients
*
*/

get_header();
global $wp, $wpdb, $post;
$id = get_the_ID();

$result = $wpdb->get_results('SELECT * FROM patients_gallery WHERE post_id ='.$id.'');
$images = explode(',', $result[0]->images);
?>
<body>
    <div class="container">
        <div class="container-gallery">
            <div class="row">
            	<!-- Content -->
            	<div class="pd-20 col-6 col-6-responsive">
            		<div class="navigator">
		                <?php 
		                	$prev = get_previous_post_link( '%link', '<span class="btn-primary">' .     
		                    _x( '< Previous', 'Previous post link','category' ,TRUE ) . '</span>' ); ?>
		                    <?php if ($prev) : ?>
		                    <div class="nav-previous"><?php echo $prev ?></div>
		                    <?php endif; ?>

		                    <div class="nav-next">
		                        <a href="https://xsculpt.com/gallery-procedures/" name="btn-gallery" id="btn-gallery" class="btn-secondary">Gallery</a>
		                    </div>

		                    <?php $next = get_next_post_link( '%link', '<span class="btn-primary">' . _x( 'Next > ', 'Next post link', 'category',TRUE ) . '</span>' ); ?>
		                    <?php if ($next) : ?>
		                    <div class="nav-next"><?php echo $next ?> </div>
		                    <?php endif; ?>
	                </div>
	                <div class="patient-detail-title">
	    				<?php echo get_the_title(); ?>
	    			</div>
	    			<div class="patient-detail-description">
	    				<?php echo $post->post_content ?> 
	    			</div>
	    			<div class="patient-detail-contact">
	    				<a href="/contact-us" class="btn-primary">Contact Us</a> 
	    			</div>
	    		</div>
	    		<!-- images -->
	    		<div class="pd-20 col-6 col-6-responsive">
	    			<div class="patient-detail-image-container">
	    				<div class="patient-detail-image-header patient-detail-image-header-single">
	    					
	    					<?php
	    						foreach ($images as $key => $image) {
	    							if(!empty( $image) && $key < 2){ ?>
	    							<div class="patient-detail-image-header-info">
	    								
	    								<img style=" 
	    										background-image: url('<?php echo $image; ?>');
	    										background-repeat: no-repeat;
	    										background-position: center;
	    										background-size: cover;
	    								">
	    								<div class="patient-detail-image-header-info-description">
		    								<div class="patient-detail-image-header-info-title">
		    									<?php echo get_bloginfo() ?>
		    								</div>
		    								<div class="patient-detail-image-header-info-logo">
		    									<?php echo get_custom_logo(); ?>
		    								</div>
	    								</div>
	    								
	    							</div>
	    							<?php
	    							}
	    						}
	    					?>
	   
	    				</div>
	    				<div class="patient-detail-image-carousel">
	    					<?php
	    						foreach ($images as $key => $image) {
	    							$total = count($images)-1;
	    							$number = $key + 1;
	    							if(!empty( $image)){ 
	    					?>
										<div class="patient-detail-image-carousel-item">
		    								<img 
		    									style=" 
		    										background-image: url('<?php echo $image; ?>');
		    										background-repeat: no-repeat;
		    										background-position: center;
		    										background-size: cover;
		    									"
		    									class="<?php echo $image; ?>"
		    								>
		    								<div class="patient-detail-image-header-info-description">
			    								<div class="patient-detail-image-header-info-title">
			    									<?php echo get_bloginfo() ?>
			    								</div>
		    								</div>
		    								<div class="patient-detail-image-counter">
		    									<?php 
		    										if($key %2 ==0){
		    											echo 'Before ' . $number . ' of '. $total;
		    										}else{
		    											echo 'After ' . $number . ' of '. $total;
		    										}
		    									?>
		    								</div>
										</div>
									<?php
									}
								}
							?>
	    				</div>
	    			</div>
	    		</div>
            </div>
            
            
        </div>
    </div>
</body>
<?php
get_footer();

?>
<script type="text/javascript">
	jQuery('document').ready(function(){
		var currentImage = "";
		var nextImage = "";
		var countClass = jQuery('.patient-detail-image-carousel-item').length;
		var position = "";
		jQuery('.patient-detail-image-carousel-item').click(function(){
			position = jQuery(this).index();
			if(jQuery(this).index() == 0 || position%2 == 0 ){
				currentImage = jQuery(this).find('img').attr('class');
				nextImage = jQuery(this).next().find('img').attr('class');
				console.log(currentImage+'<br>'+nextImage);
				jQuery('.patient-detail-image-header-info:nth-child(1) img').css("background-image","url("+currentImage+")"); 
				jQuery('.patient-detail-image-header-info:nth-child(2) img').css("background-image","url("+nextImage+")"); 
			}else{
				currentImage = jQuery(this).find('img').attr('class');
				nextImage = jQuery(this).prev().find('img').attr('class');
				//$('.patient-detail-image-header img:nth-child(1)').css("background-image","url("+currentImage+")"); 
				//$('.patient-detail-image-header img:nth-child(2)').css("background-image","url("+nextImage+")"); 
			}
		});
	});

</script>