<?php if ($columns == 2) { ?>

							</div> <!-- end article-row -->

<?php } ?>

<?php if ($style == "masonry") { ?>

                            </div><!-- BLOG-HOLDER-MASONRY -->

<?php } ?>

						
							
                		</div><!-- STYLE7 -->
                            
                	</div><!-- col-12 -->
					
					<div class="col-12">
						<?php include(get_template_directory() . '/inc/navigation.php'); ?>
					</div><!-- col-12 -->
					
					

<?php 
if ($style == "masonry") {
	
	wp_enqueue_script( 'brankic-isotope');
	wp_enqueue_script( 'brankic-shortcodes-custom', plugin_dir_url( __FILE__ ) . '../javascript/brankic-shortcodes-custom.js', array('jquery'), '1.0.0', false );
}