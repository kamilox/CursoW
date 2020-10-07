										</ul>
                                            
									</div><!-- PORTFOLIO LIST -->
								
							</div><!-- PORTFOLIO-FIXED-SPLIT OUTSET -->
						
					</div><!-- COL-12 -->

			<?php 
	
			?>

<script>


jQuery(document).ready(function($) {
	$('#<?php echo $brankic_cat_id; ?> .portfolio-list li').on('mouseenter', function() {
		$('#<?php echo $brankic_cat_id; ?> .portfolio-list li').addClass('disable');
		$(this).removeClass('disable');	
	}).on('mouseleave', function() {
		$('#<?php echo $brankic_cat_id; ?> .portfolio-list li').removeClass('disable');;	
	});
	
<?php if ($fixed_tooltip == "true") { ?>	

<?php } else { ?>
		var tooltips_<?php echo $brankic_cat_id; ?> = document.querySelectorAll("#<?php echo $brankic_cat_id; ?> .outset_only");

		document.addEventListener('mousemove', brankic_tooltip_<?php echo $brankic_cat_id; ?>);
		function brankic_tooltip_<?php echo $brankic_cat_id; ?>(e1) {
			var x_<?php echo $brankic_cat_id; ?> = (e1.clientX + 40) + "px",
				y_<?php echo $brankic_cat_id; ?> = (e1.clientY - 200) + "px";
			for (var i_<?php echo $brankic_cat_id; ?> = 0; i_<?php echo $brankic_cat_id; ?> < tooltips_<?php echo $brankic_cat_id; ?>.length; i_<?php echo $brankic_cat_id; ?>++) {
				tooltips_<?php echo $brankic_cat_id; ?>[i_<?php echo $brankic_cat_id; ?>].style.top = y_<?php echo $brankic_cat_id; ?>;
				tooltips_<?php echo $brankic_cat_id; ?>[i_<?php echo $brankic_cat_id; ?>].style.left = x_<?php echo $brankic_cat_id; ?>;
			}
		};
	
<?php } ?>	
	
});
</script>