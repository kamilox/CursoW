<?php if ($style == "masonry") { ?>

									</div><!-- portfolio-holder-masonry -->

<?php } ?>                 		</div><!-- p-flex -->

                	</div><!-- COL-12 -->

<?php if ($navigation != "none") { ?>					
					<div class="col-12">
						<?php include(get_template_directory() . '/inc/navigation.php'); ?>
					</div><!-- col-12 -->
<?php } ?>

<?php
if ($style == "masonry") {

	wp_enqueue_script( 'brankic-isotope');
}