<?php if ($sidebar && ($sidebar != "none")) $column_class = "col-9"; else $column_class = "col-12"; ?>

<?php if ($style == "masonry") { ?>

                            </div><!-- BLOG-HOLDER-MASONRY -->

<?php 
wp_enqueue_script( 'brankic-isotope');
wp_enqueue_script( 'brankic-shortcodes-custom', plugin_dir_url( __FILE__ ) . '../javascript/brankic-shortcodes-custom.js', array('jquery'), '1.0.0', false );
} ?>

                        </div><!-- STYLE3 -->

<?php if ($navigation != "none") { ?>					
						<?php include(get_template_directory() . '/inc/navigation.php'); ?>
<?php } ?>

                	</div><!-- <?php echo $column_class; ?> -->