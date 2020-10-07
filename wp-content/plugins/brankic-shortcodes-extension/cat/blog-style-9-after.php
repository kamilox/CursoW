                		</div><!-- style9 -->

                	</div><!-- COL-12 -->

<?php if ($navigation != "none") { ?>					
					<div class="col-12">
						<?php include(get_template_directory() . '/inc/navigation.php'); ?>
					</div><!-- col-12 -->
<?php } ?>
					
<script>
jQuery(document).ready(function($) {
	$('.style9 article:not(.emphasize-post)').on('mouseenter', function() {
		$('.style9 article').addClass('disable');
		$(this).removeClass('disable');	
	}).on('mouseleave', function() {
		$('.style9 article').removeClass('disable');	
	});  
});

jQuery(document).ready(function($) {
	
		var tooltips_<?php echo $brankic_cat_id; ?> = document.querySelectorAll('#<?php echo $brankic_cat_id; ?> .only_blog_9');

		document.addEventListener('mousemove', brankic_tooltip_<?php echo $brankic_cat_id; ?>);
		function brankic_tooltip_<?php echo $brankic_cat_id; ?>(e3) {
			var x_<?php echo $brankic_cat_id; ?> = (e3.clientX + 40) + 'px',
				y_<?php echo $brankic_cat_id; ?> = (e3.clientY - 200) + 'px';
			for (var i_<?php echo $brankic_cat_id; ?> = 0; i_<?php echo $brankic_cat_id; ?> < tooltips_<?php echo $brankic_cat_id; ?>.length; i_<?php echo $brankic_cat_id; ?>++) {
				tooltips_<?php echo $brankic_cat_id; ?>[i_<?php echo $brankic_cat_id; ?>].style.top = y_<?php echo $brankic_cat_id; ?>;
				tooltips_<?php echo $brankic_cat_id; ?>[i_<?php echo $brankic_cat_id; ?>].style.left = x_<?php echo $brankic_cat_id; ?>;
			}
		};
});
</script>					