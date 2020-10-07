                	<div class="col-12">
					
					
<?php if ($style == "masonry") { ?>
                		<div class="style6 blog-style-6 col<?php echo $columns ?> <?php echo $default_margin . " " . $default_padding; ?> <?php echo $class_gap; ?>" <?php echo $data_columns_tablet; ?> <?php echo $data_columns_phone; ?> <?php echo $img_radius_size_data; ?> <?php echo $data_gap; ?> id="<?php echo $brankic_cat_id; ?>">	
                    
                            <div class="blog-holder-masonry">
<?php } 

if ($style == "flex" || $style == "grid") { ?>

						<div class="flex style6 blog-style-6 col<?php echo $columns ?> <?php echo $default_margin . " " . $default_padding; ?> <?php echo $class_gap; ?>" <?php echo $data_columns_tablet; ?> <?php echo $data_columns_phone; ?> <?php echo $img_radius_size_data; ?> <?php echo $data_gap; ?> id="<?php echo $brankic_cat_id; ?>">	
						
<?php }					

if ($style == "grid_advanced") { ?>

						<div class="grider style6 blog-style-6 <?php echo $default_margin . " " . $default_padding; ?> <?php echo $class_gap; ?>" data-column="<?php echo $columns; ?>" <?php echo $data_columns_tablet; ?> <?php echo $data_columns_phone; ?> <?php echo $data_gap; ?> <?php echo $data_grid_advanced_row_height; ?> <?php echo $img_radius_size_data; ?> id="<?php echo $brankic_cat_id; ?>">	
						
<?php }	