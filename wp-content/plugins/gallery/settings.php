<?php 
		global $wp, $wpdb, $post;
		$settings = $wpdb->get_results('SELECT * FROM patients_settings ORDER BY id DESC LIMIT 1');
		?>
<div class="patients-settings">
	<div class="center width-100">
		<h2>Define the look of your gallery</h2>
	</div>

	<div class="col-6">
		<form id="default_options_form_data" method="post">
				
			
			<div class="input-form-gallery-patients">
				<input  type="hidden" id="id" name="id" value="" >
				<div class="col-12">
					<label>Logo image</label>
				</div>
				<div class="col-12">
					<div class="gallery-patients-button col-12">
						<input id="load-logo" type="button" class="button" value="Select Image" />
						<div class="center width-100 relative pd-20">
		    				Please select the image from the library
		    		</div>
					</div>
					<div class="gallery-patients-image col-12">
						<img src="" class="patients-settings-logo">
						<input type="hidden" id="logo_url" name="logo_url">
					</div>
				</div>
			</div>
			<div class="input-form-gallery-patients">
				<div class="col-12">
					<label>Procedure title color</label>
				</div>
				<div class="col-12 colors-settings-col title-settings">
					<div class="color-settings" id="title-color-settings" style="background: <?php 
																if(empty($settings[0]->procedure_title_color)){
						    										echo '#3ec0b1';
						    									}else{
						    										echo $settings[0]->procedure_title_color;
						    									}?>"></div>
					<input type="hidden" id="procedure_title_color" name="procedure_title_color" class="gallery-patients-input" value="">
					<input type="hidden" id="title_color" value="
															<?php 
																if(empty($settings[0]->procedure_title_color)){
						    										echo '#3ec0b1';
						    									}else{
						    										echo $settings[0]->procedure_title_color;
						    									}?> " 
						    									>
				</div>
			</div>
			<div class="input-form-gallery-patients">
				<div class="col-12">
					<label>Display excerpt in gallery</label>
				</div>
				<div class="col-12">
					<select name="display_excerpt_in_gallery" id="display_excerpt_in_gallery">
						<option value="">Select</option>
						<option value="true">Yes</option>
						<option value="false">No</option>
					</select>
				</div>
			</div>
			<div class="input-form-gallery-patients">
				<div class="col-12">
					<label>Background color primary button</label>
				</div>
				<div class="col-12 colors-settings-col primary-button-background">
					<div class="color-settings" id="primary-button-background"></div>
					<input type="hidden" id="primary_button_background_color" name="primary_button_background_color" class="gallery-patients-input" value="<?php echo $settings[0]->primary_button_background_color; ?>">
					<input type="hidden" id="primary_button_color" value="<?php echo $settings[0]->primary_button_background_color; ?>" >
				</div>
			</div>
			<div class="input-form-gallery-patients">
				<div class="col-12">
					<label>Border color primary button </label>
				</div>
				<div class="col-12 colors-settings-col primary-button-border">
					<div class="color-settings" id="primary-button-border"></div>
					<input type="hidden" id="primary_button_border_color" name="primary_button_border_color" class="gallery-patients-input" value="<?php echo $settings[0]->primary_button_border_color ?>">
					<input type="hidden" id="primary_button_color_border" value="<?php echo $settings[0]->primary_button_border_color ?>" >
				</div>
			</div>
			<div class="input-form-gallery-patients">
				<div class="col-12">
					<label>Font color primary button</label>
				</div>
				<div class="col-12 colors-settings-col primary-button-font-color">
					<div class="color-settings" id="primary-button-font-color"></div>
					<input type="hidden" id="primary_button_font_color" name="primary_button_font_color" class="gallery-patients-input" value="<?php echo $settings[0]->primary_button_font_color?>">
					<input type="hidden" id="primary_button_color_font" value="<?php echo $settings[0]->primary_button_font_color?>" >
				</div>
			</div>
			<div class="input-form-gallery-patients">
				<div class="col-12">
					<label>Backgroud color secondary button </label>
				</div>
				<div class="col-12 colors-settings-col secondary-button-background">
					<div class="color-settings" id="secondary-button-background"></div>
					<input type="hidden" id="secondary_button_background_color" name="secondary_button_background_color" class="gallery-patients-input" value="<?php echo $settings[0]->secondary_button_background_color; ?>">
					<input type="hidden" id="secondary_button_color" value="<?php echo $settings[0]->secondary_button_background_color; ?>" >
				</div>
			</div>
			<div class="input-form-gallery-patients">
				<div class="col-12">
					<label>Border color secondary button</label>
				</div>
				<div class="col-12 colors-settings-col secondary-button-border">
					<div class="color-settings" id="secondary-button-border"></div>
					<input type="hidden" id="secondary_button_border_color" name="secondary_button_border_color" class="gallery-patients-input" value="<?php echo $settings[0]->secondary_button_border_color ?>">					
					<input type="hidden" id="secondary_button_color_border" value="<?php echo $settings[0]->secondary_button_border_color ?>" >
				</div>
			</div>
			<div class="input-form-gallery-patients">
				<div class="col-12">
					<label>Font color secondary button</label>
				</div>
				<div class="col-12 colors-settings-col secondary-button-font-color">
					<div class="color-settings" id="secondary-button-font-color"></div>
					<input type="hidden" id="secondary_button_font_color" name="secondary_button_font_color" class="gallery-patients-input" value="<?php echo $settings[0]->secondary_button_font_color?>">
					<input type="hidden" id="secondary_button_color_font" value="<?php echo $settings[0]->secondary_button_font_color?>" >
				</div>
			</div>


			<input type="submit" name="form_submit" class="button-primary add-procedures" value="Submit" >
		</form>
	</div>
	<div class="col-6">
		
    		<div class="center width-100 relative pd-20">
    			This is how will look the title of your gallery
    			<img src="<?php echo plugins_url( '/inc/img/arrow-down.png', __FILE__) ?>" class="arrow-point-down">
    		</div>
    	<div class="gallery-full-container-settings">
    		<div class="center width-100">
	    		<h2 id="procedure_title_color-settings" name="procedure_title_color-settings" style="
	    								color:<?php echo $settings[0]->procedure_title_color  
	    							?>"> Procedure Title</h2>
	    		<!-- -->
	    		
	 
	            <div class="gallery-full-container-settings-img">
	            	<img src="<?php echo plugins_url( '/inc/img/carousel-settings.png', __FILE__) ?>">
	            </div>
    		</div>

    	</div>
    	<div class="center width-100 pd-20 relative">
			This is how will look your patients detail
			<img src="<?php echo plugins_url( '/inc/img/arrow-down.png', __FILE__) ?>" class="arrow-point-down">
		</div>
		<div class="container-settings-example">
	        <div class="container-gallery">
	            <div class="row">
	            	<!-- Content -->
	            	<div class="pd-20 col-4 col-6-responsive">
	            		<div class="navigator">
	            			<div class="nav-next-settings">
			                	<span class="button btn-primary-settings"  style="
													                			background: <?php echo $settings[0]->primary_button_background_color; ?>;
											    								border: solid 1px <?php echo $settings[0]->primary_button_border_color; ?>;
											    								color:<?php echo $settings[0]->primary_button_font_color;?>;

											    						
											    								
							"> Preview - Primary</span>
	            			</div>
		                    <div class="nav-next-settings">
		                        <a href="http://localhost/CursoW/gallery/" name="btn-gallery" id="btn-gallery" class="button btn-secondary-settings" style="
													                			background: <?php echo $settings[0]->secondary_button_background_color; ?>;
											    								border: solid 1px <?php echo $settings[0]->secondary_button_border_color; ?>;
											    								color:<?php echo $settings[0]->secondary_button_font_color?>;

		                        ">Gallery - Secondary</a>
		                    </div>
		                    <div class="nav-next-settings">
		                    	<span class="button btn-primary-settings"  style="
													                			background: <?php echo $settings[0]->primary_button_background_color; ?>;
											    								border: solid 1px <?php echo $settings[0]->primary_button_border_color ?>;
											    								color:<?php echo $settings[0]->primary_button_font_color?>;
	    						">Next - Primary</span>
		                    </div>
		                </div>
		                <div class="patient-detail-title">
		    				Case #: XXX
		    			</div>
		    			<div class="patient-detail-description">
		    				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae metus sed dolor tempor volutpat. Vivamus congue elit eget elementum porta. Ut nisl lorem, condimentum et sollicitudin at, efficitur at mauris. In hac habitasse platea dictumst. Donec pharetra facilisis justo at lacinia. Vestibulum in accumsan est, eget feugiat libero. 
		    			</div>
		    			<div class="navigator">
		    				<div class="nav-next-settings">
		    					<a href="/contact-us" class="button btn-primary-settings"  style="
													                			background: <?php echo $settings[0]->primary_button_background_color ?>;
											    								border: solid 1px <?php echo $settings[0]->primary_button_border_color ?>;
											    								color:<?php echo $settings[0]->primary_button_font_color ?>;
	    						">Contact Us - Primary</a>
		    				</div> 
		    			</div>
		    		</div>
		    		<!-- images -->
		    		<div class="pd-20 col-4 col-6-responsive">
		    			<div class="patient-detail-image-container-settings">
		    				<div class="patient-detail-image-header patient-detail-image-header-single">
								<div class="patient-detail-image-header-info-settings">
									<img 
											style=" 
		    										background-image: url('<?php echo plugins_url( '/inc/img/sample.jpeg', __FILE__) ?>');
		    										background-repeat: no-repeat;
		    										background-position: center;
		    										background-size: contain;
		    										max-width: 100%;
												    width: 142px;
												    min-width: 142px;
												    height: 217px;
												    min-height: 217px;
												    margin: 10px;
												    cursor: pointer;
		    								"
									>
									<div class="patient-detail-image-header-info-description">
	    								<div class="patient-detail-image-header-info-title">
	    									Website's title
	    								</div>
	    								<div class="patient-detail-image-header-info-logo">
	    									<img src="<?php echo plugins_url( '/inc/img/logo-wordpress.png', __FILE__) ?>" class="patient-detail-info-logo">
	    								</div>
									</div>
								</div>
								<div class="patient-detail-image-header-info-settings">
									<img 
											style=" 
		    										background-image: url('<?php echo plugins_url( '/inc/img/sample.jpeg', __FILE__) ?>');
		    										background-repeat: no-repeat;
		    										background-position: center;
		    										background-size: contain;
		    										max-width: 100%;
												    width: 142px;
												    min-width: 142px;
												    height: 217px;
												    min-height: 217px;
												    margin: 10px;
												    cursor: pointer;
		    								"
									>
									<div class="patient-detail-image-header-info-description">
	    								<div class="patient-detail-image-header-info-title">
	    									Website's title
	    								</div>
	    								<div class="patient-detail-image-header-info-logo">
	    									<img src="<?php echo plugins_url( '/inc/img/logo-wordpress.png', __FILE__) ?>" class="patient-detail-info-logo">
	    								</div>
									</div>
								</div>
		    				</div>
		    				<div class="patient-detail-image-carousel-settings">
		    					<div class="patient-detail-image-carousel-item-settings">
									<img src="<?php echo plugins_url( '/inc/img/female-before.png', __FILE__) ?>">
									<div class="patient-detail-image-header-info-description">
	    								<div class="patient-detail-image-header-info-title">
	    									Website's title
	    								</div>
									</div>
									<div class="patient-detail-image-counter">
										Before 
									</div>
								</div>
								<div class="patient-detail-image-carousel-item-settings">
									<img src="<?php echo plugins_url( '/inc/img/female-after.png', __FILE__) ?>">
									<div class="patient-detail-image-header-info-description">
	    								<div class="patient-detail-image-header-info-title">
	    									Website's title
	    								</div>
									</div>
									<div class="patient-detail-image-counter">
										After
									</div>
								</div>
								<div class="patient-detail-image-carousel-item-settings">
									<img src="<?php echo plugins_url( '/inc/img/male-before.png', __FILE__) ?>">
									<div class="patient-detail-image-header-info-description">
	    								<div class="patient-detail-image-header-info-title">
	    									Website's title
	    								</div>
									</div>
									<div class="patient-detail-image-counter">
										Before 
									</div>
								</div>
								<div class="patient-detail-image-carousel-item-settings">
									<img src="<?php echo plugins_url( '/inc/img/male-after.png', __FILE__) ?>">
									<div class="patient-detail-image-header-info-description">
	    								<div class="patient-detail-image-header-info-title">
	    									Website's title
	    								</div>
									</div>
									<div class="patient-detail-image-counter">
										After
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>
	            </div>
	        </div>
    	</div>
	</div>
</div>

<script type="text/javascript">
	jQuery('document').ready(function(){
		


	});
</script>

<?php
	if($_POST){
        require_once('add_settings.php');
    }
?>