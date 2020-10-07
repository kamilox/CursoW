


                            </div><!-- BLOG-HOLDER-MASONRY -->

                     
							
                        </div><!-- STYLE4 -->

                	</div><!-- col-12 -->
					
<?php if ($navigation != "none") { ?>					
					<div class="col-12">
						<?php include(get_template_directory() . '/inc/navigation.php'); ?>
					</div><!-- col-12 -->
<?php } ?>
					
<?php 

	
	wp_enqueue_script( 'brankic-isotope');
	wp_enqueue_script( 'brankic-shortcodes-custom', plugin_dir_url( __FILE__ ) . '../javascript/brankic-shortcodes-custom.js', array('jquery'), '1.0.0', false );
