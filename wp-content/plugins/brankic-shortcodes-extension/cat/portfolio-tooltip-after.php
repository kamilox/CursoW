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
	wp_enqueue_script( 'brankic-shortcodes-custom', plugin_dir_url( __FILE__ ) . '../javascript/brankic-shortcodes-custom.js', array('jquery'), '1.0.0', false );
}
?>
<script>
jQuery(document).ready(function($) {
	
		var tooltips_<?php echo $brankic_cat_id; ?> = document.querySelectorAll('#<?php echo $brankic_cat_id; ?> .not_outset');
		
		document.addEventListener('mousemove', brankic_tooltip_<?php echo $brankic_cat_id; ?>);
		function brankic_tooltip_<?php echo $brankic_cat_id; ?>(e2) {
			var x_<?php echo $brankic_cat_id; ?> = (e2.clientX + 20) + 'px',
				y_<?php echo $brankic_cat_id; ?> = (e2.clientY + 20) + 'px';
			for (var i_<?php echo $brankic_cat_id; ?> = 0; i_<?php echo $brankic_cat_id; ?> < tooltips_<?php echo $brankic_cat_id; ?>.length; i_<?php echo $brankic_cat_id; ?>++) {
				tooltips_<?php echo $brankic_cat_id; ?>[i_<?php echo $brankic_cat_id; ?>].style.top = y_<?php echo $brankic_cat_id; ?>;
				tooltips_<?php echo $brankic_cat_id; ?>[i_<?php echo $brankic_cat_id; ?>].style.left = x_<?php echo $brankic_cat_id; ?>;
			}
		};
});
</script>

