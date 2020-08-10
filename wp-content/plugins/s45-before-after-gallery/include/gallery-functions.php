<?php
function tip_plugin_get_terms($term_id) {
    $associations = taxonomy_image_plugin_get_associations();
    $tt_id = absint( $term_id );
    $img_id = false;
    if ( array_key_exists( $tt_id, $associations ) ) {
        $img_id = absint( $associations[$tt_id] );
    }
    return $img_id;
}

function s45_get_options() {
    $options = get_option('s45_options');
    return $options;
}

function s45_print_button() {
	$options = get_option('s45_options');

	if ( $options['print_button'] == 'on' ) {
 		?> <a href="?patient_print=<?php the_ID();?>" class="patient-print" target="_blank">Print Patient</a> <?php
	}
}

function s45_gallery_info( $info ) {
	$options = get_option( 's45_options' );
	if ( $info == 'gallery_url' )
		return get_home_url() . '/' . $options['gallery_slug'];
	
	if ( $info == 'slug' ) 
		return $options['gallery_slug'];
}

function s45_is_gallery() {
	return ( s45_is_gallery_home() || s45_is_gallery_listing() || s45_is_gallery_single() );
}

/**
 * Checks to see if we are on the photo gallery home page
 * @return boolean
 */
function s45_is_gallery_home() {
	return is_post_type_archive( 'patients' );
}

/**
 * Checks to see if we are on the photo gallery listing page
 * @return boolean
 */
function s45_is_gallery_listing() {
	return is_tax( 'procedure' ) && is_archive();
}

/**
 * Checks to see if we are on the photo gallery single page
 * @return boolean
 */
function s45_is_gallery_single() {
	return get_post_type() == 'patients' && is_singular( 'patients' );
}

function s45_generate_alt_tag( $post_id ) {
	$terms = wp_get_object_terms( $post_id , 'procedure' );
	return isset($terms[0]) && is_object($terms[0]) ? $terms[0]->name : '';
}

/**
 * This is a function that generates the patient number for the single patient view page.
 */
function s45_single_patient_counter( $menu_order = 0 ) {
	
	/* For future implementation, once all galleries are clean
	if ( $menu_order > 0 ) {
		echo $menu_order;
		return;
	}
	*/

	global $post;

	if( !is_object($post) ){
		return;
	}

	$terms = wp_get_object_terms( get_the_ID() , 'procedure' );
	if( !isset($terms[0]) || !is_object($terms[0]) ){
        	return $title;
        }
	$term = get_term_by ( 'id', $terms[0]->term_id, 'procedure' );

	/*$orderby = 'menu_order';
	if ($menu_order == '0') 
		$orderby = 'post_date';*/
	
	$args = array(
		'numberposts' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_type' => 'patients',
		'procedure' => $term->slug,
		'post_status' => 'publish'
	);
	$posts_a = get_posts ( $args );

	$patient_number = 1;

	foreach ($posts_a as $post_a) {
		if ( $post_a->ID == get_the_id() ) {
			break;
		}
		$patient_number++;
	} 

	echo $patient_number;

}

function s45_custom_orderby($orderby_statement) {
	set_query_var( 'orderby', 'meta_value' );
    set_query_var( 'meta_key', 'featurewithincat' ); //field you'd like to order by
	$orderby_statement = "post_date ASC";
    //return $orderby_statement;
	//return 'menu_order, post_date ASC';
	/*
	SELECT SQL_CALC_FOUND_ROWS wp_posts.ID FROM wp_posts 
	LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) 
	WHERE 1=1 AND ( wp_term_relationships.term_taxonomy_id IN (9) ) AND wp_posts.post_type = 'patients' AND (wp_posts.post_status = 'publish')
	GROUP BY wp_posts.ID ORDER BY menu_order, post_date ASC LIMIT 0, 100
	*/
}

function wpa_69199( $query ) {
        $query->set( 'orderby', 'meta_value_num' );
		$query->set( 'meta_key', 'featurewithincat' );
}

// Define custom image sizes

function register_new_image_sizes() {
	$options = get_option( 's45_options' );
	
	add_theme_support( 'post-thumbnails' );
	
	if ( (!empty($options['image_size_thumbnail_x'])) && (!empty($options['image_size_thumbnail_y'])) ) {
		add_image_size( 'patient-thumb', $options['image_size_thumbnail_x'], $options['image_size_thumbnail_y'], true ); 
	} elseif (!$options['image_size_thumbnail_y']) {
		add_image_size( 'patient-thumb', $options['image_size_thumbnail_x'], false );
	}
				
	if ( (!empty($options['image_size_normal_x'])) && (!empty($options['image_size_normal_y'])) ) {
		add_image_size( 'patient-normal', $options['image_size_normal_x'], $options['image_size_normal_y'], false ); 
	} elseif (!$options['image_size_normal_y']) {
		add_image_size( 'patient-normal', $options['image_size_normal_x'], false ); 
	}
	
	add_image_size( 'patient-admin', 75, 75, true ); //(cropped)
}

// Register Custom Taxonomies

function register_patient_taxonomies() {
	
	$options = get_option( 's45_options' );
	
	if (!$options['gallery_slug']) : $options['gallery_slug'] = 'before-after-gallery'; endif;
	
	$labels = array(
	        'name' => 'Procedures',
		'singular_name' => 'Procedure',
		'search_items' => 'Search Procedures',
		'all_items' => 'All Procedures',
		'edit_item' => 'Edit Procedure',
		'update_item' => 'Update Procedure',
		'add_new_item' => 'Add New Procedure',
		'new_item_name' => 'New Procedure Name',
		'parent_item' => 'Parent Category'			
	);
	
	$capabilities = array(
		'manage_terms' => 'manage_procedures',
		'edit_terms' => 'edit_procedures',
		'delete_terms' => 'delete_procedures',
		'assign_terms' => 'assign_procedures'
);
	
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'capabilities' => $capabilities,
		'rewrite' => array( 'slug' => $options['gallery_slug'], 'with_front' => false )
	);
	
	register_taxonomy('procedure', 'patients', $args);
	
	//flush_rewrite_rules();

}

function register_patient_cpt() {

	// Grabs custom permalink from cutom settings
	$options = get_option( 's45_options' );
	
	// If custom permalink exists, use that - else use preset slug
	if (!$options['gallery_slug']) : $options['gallery_slug'] = 'before-after-gallery'; endif;
	
	$labels = array(
		'name' => 'Patients',
	        'all_items' => 'Patients',
		'add_new' => 'Add New Patient',
		'add_new_item' => 'Add New Patient Record',
		'edit_item' => 'Edit Patient Record',
		'new_item' => 'New Patient Record',
		'view_item' => 'View Patient Record',
		'search_items' => 'Search Patients',
		'not_found' => 'Patient Record Not Found',
		'menu_name' => 'Photo Gallery'
	);

	$supports = array( 'editor', 'title', 'author', 'custom-fields', 'revisions' );

	$args = array(
		'label' => 'Patients',
		'description' => 'A record that contains patient before/after photos and info about patient.',
		'show_ui' => true,
		'public' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 40,
		'labels' => $labels,
		'supports' => $supports,
		'rewrite' => array( 'slug' => $options['gallery_slug'].'/%procedure%' ),
		'has_archive' => true,	   
   );
	
	register_post_type( 'patients', $args );
	
}

/*  Default procedures page. */

function s45_default_procedures() { ?>
	<style type="text/css">
		#default_options_checkbox_list li { font-weight:bold }
		#default_options_checkbox_list li ul li { font-weight:normal }
		
		.parent_procedure { margin:10px }
	</style>
	
	<div class="wrap"> 
		<div id="icon-settings" class="icon32"></div>
		<h2>Set up default procedures</h2>
		<p>Select the procedures from the list below to set up default procedures.</p>
		<?php
		
	if (isset($_POST['form_submit'])) { 
		
		// Face Procedures creation
		if (isset($_POST['face-procedures-parent'])) {
	
			// Create parent procedures
			wp_insert_term( 'Face Procedures', 'procedure', array());
			
			echo '<p><strong>Face procedures</strong> category created.</p>';
			
			// Get term ID to insert sub-procedures 
			// $parent['term_id']
			$parent = term_exists( 'Face Procedures', 'procedure' );
			
			// Create procedures based on form data
		
			foreach ($_POST['face-procedures'] as $face_procedure) {
				wp_insert_term( $face_procedure, 'procedure', array( 'parent' => $parent['term_id'] ));
				echo 'Inserted the '.$face_procedure.' procedure.<br />';
			}
		delete_option('procedure_children');
		}
		
		// Breast Procedures creation
		if (isset($_POST['breast-procedures-parent'])) {
	
			// Create parent procedures
			wp_insert_term( 'Breast Procedures', 'procedure', array());
			
			echo '<p><strong>Breast Procedures</strong> category created.</p>';
			
			// Get term ID to insert sub-procedures 
			// $parent['term_id']
			$parent = term_exists( 'Breast Procedures', 'procedure' );
			
			// Create procedures based on form data
		
			foreach ($_POST['breast-procedures'] as $breast_procedure) {
				wp_insert_term( $breast_procedure, 'procedure', array( 'parent' => $parent['term_id'] ));
				echo 'Inserted the '.$breast_procedure.' procedure.<br />';
			}
		delete_option('procedure_children');
		}
		
		// Body procedures creation
		if (isset($_POST['body-procedures-parent'])) {
	
			// Create parent procedures
			wp_insert_term( 'Body Procedures', 'procedure', array());
			
			echo '<p><strong>Body Procedures</strong> category created.</p>';
			
			// Get term ID to insert sub-procedures 
			// $parent['term_id']
			$parent = term_exists( 'Body Procedures', 'procedure' );
			
			// Create procedures based on form data
		
			foreach ($_POST['body-procedures'] as $body_procedure) {
				wp_insert_term( $body_procedure, 'procedure', array( 'parent' => $parent['term_id'] ));
				echo 'Inserted the '.$body_procedure.' procedure.<br />';
			}
		delete_option('procedure_children');
		}
		
		// Medical Spa Procedures creation
		if (isset($_POST['medical-spa-procedures-parent'])) {
	
			// Create parent procedures
			wp_insert_term( 'Medical Spa Procedures', 'procedure', array());
			
			echo '<p><strong>Medical Spa Procedures</strong> category created.</p>';
			
			// Get term ID to insert sub-procedures 
			// $parent['term_id']
			$parent = term_exists( 'Medical Spa Procedures', 'procedure' );
			
			// Create procedures based on form data
		
			foreach ($_POST['medical-spa-procedures'] as $spa_procedure) {
				wp_insert_term( $spa_procedure, 'procedure', array( 'parent' => $parent['term_id'] ));
				echo 'Inserted the '.$spa_procedure.' procedure.<br />';
			}
		delete_option('procedure_children');
		}
		
		// Laser Treatments Procedures creation
		if (isset($_POST['laser-treatments-parent'])) {
	
			// Create parent procedures
			wp_insert_term( 'Laser Treatments', 'procedure', array());
			
			echo '<p><strong>Laser Treatments</strong> category created.</p>';
			
			// Get term ID to insert sub-procedures 
			// $parent['term_id']
			$parent = term_exists( 'Laser Treatments', 'procedure' );
			
			// Create procedures based on form data
		
			foreach ($_POST['laser-treatments'] as $laser_treatment) {
				wp_insert_term( $laser_treatment, 'procedure', array( 'parent' => $parent['term_id'] ));
				echo 'Inserted the '.$laser_treatment.' procedure.<br />';
			}
		delete_option('procedure_children');
		}
		
		// Male Procedures Procedures creation
		if (isset($_POST['male-procedures-parent'])) {
	
			// Create parent procedures
			wp_insert_term( 'Male Procedures', 'procedure', array());
			
			echo '<p><strong>Male Procedures</strong> category created.</p>';
			
			// Get term ID to insert sub-procedures 
			// $parent['term_id']
			$parent = term_exists( 'Male Procedures', 'procedure' );
			
			// Create procedures based on form data
		
			foreach ($_POST['male-procedures'] as $male_procedure) {
				wp_insert_term( $male_procedure, 'procedure', array( 'parent' => $parent['term_id'] ));
				echo 'Inserted the '.$male_procedure.' procedure.<br />';
			}
		delete_option('procedure_children');
		}
	
	} ?>	
		
		
		
		<form id="default_options_form_data" name="default_options_form_data" method="post">
		
		<ul id="default_options_checkbox_list">
			<li class="parent_procedure"><input type="checkbox" name="face-procedures-parent" value="Face Procedures" /> Face Procedures
				<ul style="margin:5px 0 0 15px">
					<li><input type="checkbox" name="face-procedures[]" value="Blepharoplasty" /> Blepharoplasty</li>
					<li><input type="checkbox" name="face-procedures[]" value="Facelift" /> Facelift</li>
					<li><input type="checkbox" name="face-procedures[]" value="Neck Lift" /> Neck Lift</li>
					<li><input type="checkbox" name="face-procedures[]" value="Rhinoplasty" /> Rhinoplasty</li>
					<li><input type="checkbox" name="face-procedures[]" value="Otoplasty" /> Otoplasty</li>
					<li><input type="checkbox" name="face-procedures[]" value="Neck Lift" /> Neck Lift</li>
					<li><input type="checkbox" name="face-procedures[]" value="Upper Eyelid Blepharoplasty" /> Upper Eyelid Blepharoplasty</li>
				</ul>
			</li>
			<li class="parent_procedure"><input type="checkbox" name="breast-procedures-parent" value="Breast Procedures" /> Breast Procedures
				<ul style="margin:5px 0 0 15px">
					<li><input type="checkbox" name="breast-procedures[]" value="Breast Asymmetry Correction" /> Breast Asymmetry Correction</li>
					<li><input type="checkbox" name="breast-procedures[]" value="Breast Augmentation" /> Breast Augmentation</li>
					<li><input type="checkbox" name="breast-procedures[]" value="Breast Augmentation with Lift" /> Breast Augmentation with Lift</li>
					<li><input type="checkbox" name="breast-procedures[]" value="Breast Lift" /> Breast Lift</li>
					<li><input type="checkbox" name="breast-procedures[]" value="Breast Reduction" /> Breast Reduction</li>
				</ul>
			</li>
			<li class="parent_procedure"><input type="checkbox" name="body-procedures-parent" value="Body Procedures" /> Body Procedures
				<ul style="margin:5px 0 0 15px">
					<li><input type="checkbox" name="body-procedures[]" value="Body Lift" /> Body Lift</li>
					<li><input type="checkbox" name="body-procedures[]" value="Buttock Augmentation" /> Buttock Augmentation</li>
					<li><input type="checkbox" name="body-procedures[]" value="Liposuction" /> Liposuction</li>
					<li><input type="checkbox" name="body-procedures[]" value="Mommy Makeover" /> Mommy Makeover</li>
					<li><input type="checkbox" name="body-procedures[]" value="SmartLipo" /> SmartLipo</li>
					<li><input type="checkbox" name="body-procedures[]" value="Tummy Tuck" /> Tummy Tuck</li>
				</ul>
			</li>
			<li class="parent_procedure"><input type="checkbox" name="medical-spa-procedures-parent" value="Medical Spa Procedures" /> Medical Spa Procedures
				<ul style="margin:5px 0 0 15px">
					<li><input type="checkbox" name="medical-spa-procedures[]" value="Dermabrasion" /> Dermabrasion</li>
				</ul>
			</li>
			<li class="parent_procedure"><input type="checkbox" name="laser-treatments-parent" value="Laser Treatments" /> Laser Treatments
				<ul style="margin:5px 0 0 15px">
					<li><input type="checkbox" name="laser-treatments[]" value="Phototherapy" /> Phototherapy</li>
					<li><input type="checkbox" name="laser-treatments[]" value="Vascular and Redness Treatment" /> Vascular and Redness Treatment</li>
					<li><input type="checkbox" name="laser-treatments[]" value="Skin Resurfacing" /> Skin Resurfacing</li>
					<li><input type="checkbox" name="laser-treatments[]" value="Fractional Resurfacing" /> Fractional Resurfacing</li>
					<li><input type="checkbox" name="laser-treatments[]" value="Laser Peel" /> Laser Peel</li>
					<li><input type="checkbox" name="laser-treatments[]" value="Skin Firming" /> Skin Firming</li>
				</ul>
			</li>
			<li class="parent_procedure"><input type="checkbox" name="male-procedures-parent" value="Male Procedures" /> Male Procedures
				<ul style="margin:5px 0 0 15px">
					<li><input type="checkbox" name="male-procedures[]" value="Male Breast Reduction" /> Male Breast Reduction</li>
					<li><input type="checkbox" name="male-procedures[]" value="Male Blepharoplasty" /> Male Blepharoplasty</li>
					<li><input type="checkbox" name="male-procedures[]" value="Male Liposuction" /> Male Liposuction</li>
					<li><input type="checkbox" name="male-procedures[]" value="Male Neck Lift" /> Male Neck Lift</li>
					<li><input type="checkbox" name="male-procedures[]" value="Male Otoplasty" /> Male Otoplasty</li>
					<li><input type="checkbox" name="male-procedures[]" value="Male Rhinoplasty" /> Male Rhinoplasty</li>
					<li><input type="checkbox" name="male-procedures[]" value="Male Thigh Lift" /> Male Thigh Lift</li>
					<li><input type="checkbox" name="male-procedures[]" value="Injectables for Men" /> Injectables for Men</li>
				</ul>
			</li>
		</ul>
		<input type="submit" name="form_submit" class="button-primary" value="Submit" />
		</form>
		
	</div>
<?php }

function s45_add_rewrite_rules() {  
	
	// Grabs custom permalink from custom settings
	$options = get_option( 's45_options' );
	
	// If custom permalink exists, use that - else use preset slug
	//if (!$options['gallery_slug']) : $options['gallery_slug'] = 'before-after-gallery'; endif;

    add_rewrite_rule( 
			 $options['gallery_slug'].'/([^/]+)/([^/]+)/?$', 
        	'index.php?patients=$matches[2]',  
        	'top'  
    );  
	add_rewrite_rule (
			 $options['gallery_slug'].'/?$',
			'index.php?post_type=patients',
			'top'
	);
}  


function set_query_vars() {
	$query_vars[] = 'procedure';
	return $query_vars;
}



function s45_upload_images() { ?>
	<div class="wrap">
		<h2>Bulk Image Uploader</h2>
		<p>Click the button below to upload your images.  Please make sure that your images are named in the following format:</p>

		<pre>
		0001-1of2.jpg
		0001-2of2.jpg
		0002-1of4.jpg
		0002-2of4.jpg
		0002-3of4.jpg
		0002-4of4.jpg
		</pre>
	
		<ol>
			<li>The first 4 numbers designate the individual patient.</li>
			<li>The second set signifies the before/after order.</li>
			<!--<li><strong>Make sure to select the procedure name from the drop down below to create patients under that procedure.</strong></li>-->
		</ol>

		<?php
		// adjust values here
		$id = "img1"; // this will be the name of form field. Image url(s) will be submitted in $_POST using this key. So if $id == "img1" then $_POST["img1"] will have all the image urls
 
		$svalue = ""; // this will be initial value of the above form field. Image urls.
 
		$multiple = true; // allow multiple files upload
 
		$width = null; // If you want to automatically resize all uploaded images then provide width here (in pixels)
 
		$height = null; // If you want to automatically resize all uploaded images then provide height here (in pixels)
		?>
 
		<input type="hidden" name="<?php echo $id; ?>" id="<?php echo $id; ?>" value="<?php echo $svalue; ?>" />
		
		<div class="plupload-upload-uic hide-if-no-js <?php if ($multiple): ?>plupload-upload-uic-multiple<?php endif; ?>" id="<?php echo $id; ?>plupload-upload-ui">
    		<input style="margin:0 0 10px" id="<?php echo $id; ?>plupload-browse-button" type="button" value="<?php esc_attr_e('Select Files'); ?>" class="button" />
    		<span class="ajaxnonceplu" id="ajaxnonceplu<?php echo wp_create_nonce($id . 'pluploadan'); ?>"></span>
    		<?php if ($width && $height): ?>
    			<span class="plupload-resize"></span><span class="plupload-width" id="plupload-width<?php echo $width; ?>"></span>
            	<span class="plupload-height" id="plupload-height<?php echo $height; ?>"></span>
    		<?php endif; ?>
    		<div class="filelist"></div>
    	</div>
    	
    	<div class="plupload-thumbs <?php if ($multiple): ?>plupload-thumbs-multiple<?php endif; ?>" id="<?php echo $id; ?>plupload-thumbs">
    	</div>
    	<div class="clear"></div>
	
<?php }

// Breadcrumb Function

function tax_breadcrumbs( $post_ID ) {
    $options = get_option( 's45_options' );
    if (is_tax()) {
        $term = get_term_by ( 'slug', get_query_var( 'term' ), 'procedure' );
        /*if ($term->parent == 0) { ?>
        	<div class="gallery-breadcrumb"><a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'];?>" title="Photo Gallery">Photo Gallery</a> > <?php echo $term->name;?></div>
        <?php } else {
        	$termparent = get_term_by ( 'id', $term->parent, 'procedure' ); ?>
        	<div class="gallery-breadcrumb"><a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'];?>" title="Photo Gallery">Photo Gallery</a> > <a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'].'/'.$termparent->slug;?>" title="<?php echo $termparent->name;?>"><?php echo $termparent->name;?></a> > <?php echo $term->name;?></div>
        <?php }
		*/
		?>
		<div class="gallery-breadcrumb"><a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'];?>" title="Photo Gallery">Photo Gallery</a> <span>|</span> <?php echo $term->name;?></div>
		<?php
    } 
    elseif(is_single()) 
    {
    	$terms = wp_get_object_terms( $post_ID , 'procedure' );
    	$term = get_term_by( 'id', $terms[0]->term_id, 'procedure' );
    	$parent = get_term_by( 'id', $terms[0]->parent, 'procedure' );
    ?>
    	
    	<?php /*<div class="gallery-breadcrumb"><a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'];?>" title="Photo Gallery">Photo Gallery</a> > <a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'].'/'.$parent->slug;?>"><?php echo $parent->name;?></a> > <a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'].'/'.$term->slug;?>"><?php echo $term->name;?></a> */?>
		<div class="gallery-breadcrumb"><a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'];?>" title="Photo Gallery">Photo Gallery</a> <span>|</span> <a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'].'/'.$term->slug;?>"><?php echo $term->name;?></a>
	<?php if(stripos($_SERVER['SERVER_NAME'], 'doctorenzer') === FALSE) { ?>
	<span>|</span> Case #<?php echo the_title();?>
	<?php } ?>
	</div>
    
    <?php }

} 

function s45_rewrite_flush() {
	register_patient_cpt();
	flush_rewrite_rules();
}

function s45_uploaded_file_names($arr) {
	
	global $wpdb;

    // Get the parent post ID, if there is one
    if( isset($_REQUEST['post_id']) ) {
        $post_id = $_REQUEST['post_id'];
    } else {
        $post_id = false;
		return $arr;
    }
	//echo '<pre>';print_r($wpdb->last_result[0]);echo '</pre>';
	if (isset($wpdb->last_result[0]->post_type) && $wpdb->last_result[0]->post_type != 'patients') : $post_id = false; endif;
    
    // Only do this if we got the post ID--otherwise they're probably in
    //  the media section rather than uploading an image from a post.
    if($post_id && is_numeric($post_id)) {

    	$random_number = rand(10000,99999);
        $arr['name'] = $post_id . '-' . $random_number . '.jpg';
    }
    
    return $arr;

}

function s45_register_procedure_terms() {
	
	if (!term_exists( 'Face Procedures', 'procedure' )) {
		wp_insert_term( 'Face Procedures', 'procedure', array());
		
		// Create Procedures
		$parent = term_exists( 'Face Procedures', 'procedure' );
		if (!term_exists( 'Blepharoplasty', 'procedure' )) {
			wp_insert_term( 'Blepharoplasty'              , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Facelift'                    , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Neck Lift'                   , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Rhinoplasty'                 , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Otoplasty'                   , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Neck Lift'                   , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Upper Eyelid Blepharoplasty' , 'procedure', array( 'parent' => $parent['term_id'] ));
		
			delete_option('procedure_children');
		}
		
	}
	
	if (!term_exists( 'Breast Procedures', 'procedure' )) {
		
		wp_insert_term( 'Breast Procedures', 'procedure', array());
		
		// Create Procedures
		$parent = term_exists( 'Breast Procedures', 'procedure' );
		if (!term_exists( 'Breast Asymmetry Correction', 'procedure' )) {
			wp_insert_term( 'Breast Asymmetry Correction'   , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Breast Augmentation'           , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Breast Augmentation with Lift' , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Breast Lift'                   , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Breast Reduction'              , 'procedure', array( 'parent' => $parent['term_id'] ));
					
			delete_option('procedure_children');
		}
		
	}
	
	if (!term_exists( 'Body Procedures', 'procedure' )) {
	
		wp_insert_term( 'Body Procedures', 'procedure', array());
		
		// Create Procedures
		$parent = term_exists( 'Body Procedures', 'procedure' );
		if (!term_exists( 'Body Lift', 'procedure' )) {
			wp_insert_term( 'Body Lift'                , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Buttock Augmentation'     , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Liposuction'              , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Mommy Makeover'           , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'SmartLipo'                , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Tummy Tuck'               , 'procedure', array( 'parent' => $parent['term_id'] ));
		
			delete_option('procedure_children');
		}
		
	}
	
	
	if (!term_exists( 'Medical Spa Procedures', 'procedure' )) {
				
		wp_insert_term( 'Medical Spa Procedures', 'procedure', array());
		
		// Create Procedures
		$parent = term_exists( 'Medical Spa Procedures', 'procedure' );
		if (!term_exists( 'Dermabrasion', 'procedure' )) {
			wp_insert_term( 'Dermabrasion'   , 'procedure', array( 'parent' => $parent['term_id'] ));
								
			delete_option('procedure_children');
		}
		
	}
	
	if (!term_exists( 'Laser Treatments', 'procedure' )) {
			
		wp_insert_term( 'Laser Treatments', 'procedure', array());
		
		// Create Procedures
		$parent = term_exists( 'Laser Treatments', 'procedure' );
		if (!term_exists( 'Phototherapy', 'procedure' )) {
			wp_insert_term( 'Phototherapy'                   , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Vascular and Redness Treatment' , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Skin Resurfacing'               , 'procedure' , array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Fractional Resurfacing'         , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Laser Peel'                     , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Skin Firming'                   , 'procedure', array( 'parent' => $parent['term_id'] ));
											
			delete_option('procedure_children');
		}
		
	}
	
	if (!term_exists( 'Male Procedures', 'procedure' )) {
		
		wp_insert_term( 'Male Procedures', 'procedure', array());
		
		// Create Procedures
		$parent = term_exists( 'Male Procedures', 'procedure' );
		if (!term_exists( 'Male Breast Reduction', 'procedure' )) {
			wp_insert_term( 'Male Breast Reduction'   , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Male Blepharoplasty'     , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Male Liposuction'        , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Male Neck Lift'          , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Male Otoplasty'          , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Male Rhinoplasty'        , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Male Thigh Lift'         , 'procedure', array( 'parent' => $parent['term_id'] ));
			wp_insert_term( 'Injectables for Men'     , 'procedure', array( 'parent' => $parent['term_id'] ));
											
			delete_option('procedure_children');
		}

	}
	delete_option('procedure_children');
}

// Set up default options

function s45_init_default_options() {
	$options = get_option('s45_options');
	
		if (!isset($options['patients_per_page'])) {
			$options['patients_per_page'] = 10;			
		}
		
		if (!isset($options['gallery_slug'])) {
			$options['gallery_slug'] = 'before-after-gallery';			
		}
		
		if (!isset($options['image_size_thumbnail_x'])) {
			$options['image_size_thumbnail_x'] = 150;
			$options['image_size_thumbnail_y'] = 0;
		}
		
		if (!isset($options['image_size_normal_x'])) {
			$options['image_size_normal_x'] = 300;
			$options['image_size_normal_y'] = 0;
		}
		
		update_option('s45_options', $options);
	
}

// Show user set amount of posts for Patients

function s45_set_posts_per_page() {
	$options = get_option( 's45_options' );
	update_option( 'posts_per_page', $options['patients_per_page'] );
}

// Ajax script for ordering patients

function s45_save_item_order() {
    global $wpdb;

    $order = explode(',', $_POST['order']);
    $counter = 1;
    
    foreach ($order as $item_id) {
        $wpdb->update($wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $item_id) );
        $counter++;
    }
    die(1);
}

function s45_delete_patient() {
	global $wpdb;
	
	$id = $_POST['id'];

	$ids = $wpdb->get_col("SELECT ID FROM {$wpdb->posts} WHERE post_parent = $id AND post_type = 'attachment'");
	
	$wp_error = true;
	
	$force_delete = true;
	
	wp_delete_post( $id, $force_delete );
	
	foreach ( $ids as $id ) {
		wp_delete_attachment($id, $force_delete);
	}
	
	die();	
}

function s45_save_patient() {
	$id = $_POST['id'];
	$patient_description = $_POST['patient_description'];
	
	$post = array(
		    'ID'             => $id,
			'post_content'   => $patient_description,
			'post_title'     => $id,
			'post_status'    => 'publish',
			'post_type'      => 'patients'
	);
		
	$wp_error = true;
	
	wp_insert_post( $post, $wp_error );
	
	if (!$wp_error) : echo '<pre>'.$wp_error.'</pre>'; else : echo "Patient ".$id." successfully updated."; endif;
	
	die();	
}


function s45_edit_tag_form( $tag_ID ) { 

	global $post;
	
	$id = "img1"; // this will be the name of form field. Image url(s) will be submitted in $_POST using this key. So if $id == "img1" then $_POST["img1"] will have all the image urls
 	$svalue = ""; // this will be initial value of the above form field. Image urls.
 	$multiple = true; // allow multiple files upload
 	$width = null; // If you want to automatically resize all uploaded images then provide width here (in pixels)
 	$height = null; // If you want to automatically resize all uploaded images then provide height here (in pixels)
	
	// Tag Term ID
	$tag_ID = $_GET['tag_ID'];
	$term_meta = get_option( "taxonomy_$tag_ID" );
	
	?>
	
	<tr class="form-field hide-if-no-js">
		<th scope="row"><label>Display Adult Content Notice</label></th>
		<td>
			<input type="hidden" value="0" name="term_meta[ac_notice]">
			<input type="checkbox" name="term_meta[ac_notice]" id="term_meta[ac_notice]" value="1" <?php echo (!empty($term_meta['ac_notice']) ? ' checked="checked" ' : 'test'); ?>  />
		</td>
	</tr>
	
	<tr class="form-field hide-if-no-js">
		<th scope="row"><label>Disable This Procedure</label></th>
		<td>
			<input type="hidden" value="0" name="term_meta[disable_this]">
			<input type="checkbox" name="term_meta[disable_this]" id="term_meta[disable_this]" value="1" <?php echo (!empty($term_meta['disable_this']) ? ' checked="checked" ' : 'test'); ?>  />
		</td>
	</tr>
	
	
	<tr class="form-field hide-if-no-js">
	<script>
	jQuery(document).ready(function($) {
			//$('p.submit').hide();
			
			jQuery("h3:contains('Add New Procedure')").replaceWith('<b>Add New Procedure or Procedure Group</b>');
	});
	</script>
		<td><input style="width:59px" type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Update') ?>" />
	</tr>
	
	<tr class="form-field hide-if-no-js">
		<td colspan="2">
			<div id="icon-edit" class="icon32 icon32-posts-patients"><br></div><h2>Patients</h2>
		</td>
	</tr>
	
	<tr class="form-field hide-if-no-js">
		<td colspan="2">
		
		<input type="hidden" name="<?php echo $id; ?>" id="<?php echo $id; ?>" value="<?php echo $svalue; ?>" />
		
		<div tagid="<?php echo $tag_ID;?>" class="plupload-upload-uic hide-if-no-js <?php if ($multiple): ?>plupload-upload-uic-multiple<?php endif; ?>" id="<?php echo $id; ?>plupload-upload-ui">
    		<input style="width:108px" id="<?php echo $id; ?>plupload-browse-button" type="button" value="<?php esc_attr_e('Upload Photos'); ?>" class="button-primary" />
    		<span class="ajaxnonceplu" id="ajaxnonceplu<?php echo wp_create_nonce($id . 'pluploadan'); ?>"></span>
    		<?php if ($width && $height): ?>
    			<span class="plupload-resize"></span><span class="plupload-width" id="plupload-width<?php echo $width; ?>"></span>
            	<span class="plupload-height" id="plupload-height<?php echo $height; ?>"></span>
    		<?php endif; ?>
    		<div class="filelist"></div>
    	</div>
    	
    	<div class="plupload-thumbs <?php if ($multiple): ?>plupload-thumbs-multiple<?php endif; ?>" id="<?php echo $id; ?>plupload-thumbs">
    	</div>
    	<div class="clear"></div>
    	<p>Make sure that filenames are in xxxx-1of2.jpg format, where xxxx is the set number starting at 0001, and the first number before 'of' is the order of photos
    	in that set, with the last number being the total number of photos within that set (ex., 0001-1of4.jpg would be the first photo in a set of 4 that will be associated with one patient).  <strong>Otherwise, uploads will not work.</strong></p>
    	
		</td>
	</tr>
	
	<?php

	
	
	$args = array(
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1,
		'tax_query' => array(
				array(
				'taxonomy' => 'procedure',
				'field' => 'id',
				'terms' => $tag_ID
				)
			)
		);
		
	
	// The Query
	$the_query = new WP_Query( $args );
	
	?>

	<!--$wp_query<?php //print_r($the_query);?>-->
	
	<tr class="form-field hide-if-no-js" id="loading-animation" style="background:#a1fd89;padding:5px 10px;display:none;clear:both">
		<td colspan="2">Patient order updated.</td>
	</tr>
	
	<tr class="form-field hide-if-no-js">
    	<td colspan="2">
    		<table style="width:100%;margin-bottom:-12px" id="sortable"> 
    <?php
	// The Loop
    while ( $the_query->have_posts() ) : $the_query->the_post(); 
	
	$id = $the_query->post->ID;
	
	$args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_parent' => $id
	);
	$images = get_posts( $args );
	//echo '<pre>';print_r($images);exit;
	
	$attachment_id = $images[0]->ID; // attachment ID
	
	$image_attributes = wp_get_attachment_image_src( $attachment_id, array(75,75) ); // returns an array
	$img = $images[0]->guid;
	
	?>
	
    		<tr id="<?php echo $id;?>" class="patientparent">
    			<td id="patient-<?php echo $id;?>" style="margin:0;padding:0">
    			
    				<div class="procedure-extra-field" id="patient-<?php echo $id;?>" style="padding:0 0 2px 0;margin-bottom:7px;border-bottom:1px dotted grey">
    					<strong><a href="<?php echo get_edit_post_link();?>" title="Edit patient post">Patient Case #<?php echo the_title();?></a></strong>
    				</div>
    			
    				<div style="float:left; width:120px">
    					<img style="width:100px !important;" src="<?php if (!$image_attributes[0]) : echo S45PU.'/images/default.png'; else : echo $img; endif;?>" />
    				</div>
    			
    				<div style="float:left;width:300px;height:75px">
        				Description<br />
        				<textarea name="patient_description" id="patient_description_<?php echo $id;?>"><?php echo get_the_content();?></textarea>
        			</div>
        		
        			<div style="float:left; margin-top:32px">
        				<input type="submit" name="patient-description-submit" class="patient-description-submit button-primary" patientid="<?php echo $id;?>" value="<?php esc_attr_e('Save Changes') ?>" />
            		</div>
            	
            		<div style="float:left;width:33px;margin:22px 0 0 254px;cursor:move">
            			<img src="<?php echo S45PU . '/images/sortable.png';?>" />
            		</div>
            		
            		<div style="float:right; margin:32px 25px 0 0">
            			<a href="media-upload.php?post_id=<?php echo $id;?>&type=image&tab=gallery&TB_iframe=1&width=640&height=715" id="manage_gallery" class="thickbox be-button button-primary" title="Manage Gallery">Edit Photos</a>
                		<input style="width:82px;" type="submit" name="patient-delete-submit" class="patient-delete-submit button-primary" patientid="<?php echo $id;?>" value="<?php esc_attr_e('Delete') ?>" />
            		</div>
            		
            		<div id="results-<?php echo $id;?>" style="background:#a1fd89;padding:5px 10px;display:none;clear:both"></div>
            	
            	</td>
            </tr>
    
    <?php endwhile;
    
    ?>
    </table></td></tr>
    <?php
	
}

// Create dynamic hooks to set up custom form fields in taxonomy page 

function s45_add_dynamic_hooks( $tag_ID ) {

	add_action( 'procedure_edit_form_fields', 's45_edit_tag_form' );
	
}

function s45_save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_procedure', 's45_save_taxonomy_custom_meta', 10, 2 );


function s45_plupload_action() {
	global $post, $wpdb;

	// Set taxonomy term ID
	if (isset($_POST['tag_ID'])) : $tag_ID = $_POST['tag_ID']; else : $tag_ID = 0; endif;
	
	$imgid = $_POST["imgid"];
	check_ajax_referer($imgid . 'pluploadan');
	
	// Extract name info from POST
	$name = $_POST['name'];
	$name_parts = pathinfo($name);
	$name_file = $name_parts['filename'];
	$name = trim( substr( $name, 0, -(1 + strlen($name_parts['extension'])) ) );
	
	// Post updating variables
	$wp_error = true;
	
	// Check if filename matches input format.  If not, exit with error.
	
	if (!preg_match( "/(\d+)-(\d+)of(\d+)/", $name_file, $matches)) {
		exit;
	}
	
	// handle file upload
	$status = wp_handle_upload($_FILES[$imgid . 'async-upload'], array('test_form' => false, 'action' => 'plupload_action'));
	
	// Checks if post exists.  If so, just attaches image to that post.  Otherwise, create a new post.
	// 
	// 1. Upload multiple files in the 0000-00of00.jpg format
	// 2. Extrapolate multiple conditions based on the filename
	// 	a. (xxxx), first 4 numbers corrospond to the actual patient record.  
	// 	b. (xx)of(yy), xx is the set position of current image, and yy is the total numbers of images per set.
	// 3. Set up order based on filename sequence of xx
	// 
	if ($page = get_page_by_title( $matches[1], 'OBJECT', 'patients' )) {
		$post_parent = $page->ID;

		//$count = count(get_children( array( 'post_parent' => $page->ID ) ) );
		
		//$count = $count + 2;

		if ($matches[2] == $matches[3]) { // Checks to see if 0001-[x of y] where x = y.  If so, rename and finish loop.
			
			$count = $wpdb->get_var($wpdb->prepare("SELECT MAX(menu_order)+1 FROM $wpdb->posts
			
			INNER JOIN $wpdb->term_relationships
			ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
			INNER JOIN $wpdb->term_taxonomy
			ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
			WHERE $wpdb->posts.post_type = 'patients'
			AND $wpdb->term_taxonomy.taxonomy = 'procedure'
			AND $wpdb->term_taxonomy.term_id = %d", $tag_ID));

			if ( empty($count) )
				$count = 1;

			$post = array(
				'ID' => $page->ID,
				'post_status' => 'publish',
				'post_title' => $page->ID,
				'post_type' => 'patients',
				'menu_order' => $count
			);
			
			// Update post and change title to ID
			$post_id = wp_insert_post( $post, $wp_error );
			
		}
		
	} else { // Create post using temp image name as title
		

		$post = array(
			'post_status'    => 'publish',
			'post_title'     => $matches[1],
			'post_type'      => 'patients'
			//'tax_input'      => array( 'procedure' => array( $tag_ID ) )  // support for custom taxonomies. 
		);
		
		// Create Post
		$post_id = wp_insert_post( $post, $wp_error );
		
		$post_parent = $post_id;
		  
	}
		
	// Set taxonomy ID for procedure category.
	$append = false;
	wp_set_post_terms( $post_id, $tag_ID, 'procedure', $append );
		
	// Image attachment info
	$url = $status['url'];
	$type = $status['type'];
	$file = $status['file'];
	$title = $name;
	$content = '';
		
	// Construct the attachment array
	$attachment = array( 
		'post_mime_type' => $type,
		'guid' => $url,
		'post_parent' => $post_parent,
		'post_title' => $title,
		'post_content' => $content,
		'menu_order' => intval($matches[2])
	);
	
	// This should never be set as it would then overwrite an existing attachment.
	if ( isset( $attachment['ID'] ) )
		unset( $attachment['ID'] );

	// Save the data (create the attachment)
	$id = wp_insert_attachment($attachment, $file, $post_id);
	if ( !is_wp_error($id) ) {
		wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $file ) );
	}
 
    // send the uploaded file url in response
    echo $status['url'];
    die();
}


function s45_upload_admin_head() {
// place js config array for plupload
    if (isset($_GET['tag_ID'])) : $tag_ID = $_GET['tag_ID']; else : $tag_ID = 0; endif;
    
    $plupload_init = array(
        'runtimes' => 'html5,silverlight,flash,html4',
        'browse_button' => 'plupload-browse-button', // will be adjusted per uploader
        'container' => 'plupload-upload-ui', // will be adjusted per uploader
        'drop_element' => 'drag-drop-area', // will be adjusted per uploader
        'file_data_name' => 'async-upload', // will be adjusted per uploader
        'multiple_queues' => true,
        'max_file_size' => wp_max_upload_size() . 'b',
        'url' => admin_url('admin-ajax.php'),
        'flash_swf_url' => includes_url('js/plupload/plupload.flash.swf'),
        'silverlight_xap_url' => includes_url('js/plupload/plupload.silverlight.xap'),
        'filters' => array(array('title' => __('Allowed Files'), 'extensions' => '*')),
        'multipart' => true,
        'urlstream_upload' => true,
        'multi_selection' => false, // will be added per uploader
         // additional post data to send to our ajax hook
        'multipart_params' => array(
            '_ajax_nonce' => "", // will be added per uploader
            'action' => 'plupload_action', // the ajax action name
            'imgid' => 0, // will be added per uploader
            'tag_ID' => $tag_ID
        )
    );
?>
<script type="text/javascript">
    var base_plupload_config=<?php echo json_encode($plupload_init); ?>;
</script>
<?php
}


function s45_front_styles() {

	if(is_post_type_archive( 'patients' ) || is_tax( 'procedure' ) || is_singular( 'patients' )){
		$stylesheet_url = S45PU . '/css/photos.css';
		$stylesheet_directory = S45PDP . '/css/photos.css';
		
		$bootstrap_url = S45PU . '/css/bootstrap.min.css';
		$bootstrap_directory = S45PDP . '/css/bootstrap.min.css';

		if ( file_exists( get_stylesheet_directory() . '/photos.css' )) {
			$stylesheet_url = get_stylesheet_directory_uri() . '/photos.css';
			$stylesheet_directory = get_stylesheet_directory() . '/photos.css';
		} elseif ( file_exists( get_template_directory() . '/photos.css' )) {
			$stylesheet_url = get_template_directory_uri() . '/photos.css';
			$stylesheet_directory = get_template_directory() . '/photos.css';
		}

		wp_register_style('s45_bootstrap', $bootstrap_url, array(), filemtime( $bootstrap_directory ), 'all');
		wp_enqueue_style('s45_bootstrap');
		
		wp_register_style('s45_photogallery', $stylesheet_url, array(), filemtime( $stylesheet_directory ), 'all');
		wp_enqueue_style('s45_photogallery');
		
		wp_register_script('s45-bootstrap-js', S45PU . '/js/bootstrap.min.js',array('jquery'));
		wp_enqueue_script('s45-bootstrap-js');
	}
}

function s45_admin_enqueue() {
	if ( is_admin() ) {

		if ( isset($_GET['taxonomy']) OR isset($_GET['action']) OR (isset($_GET['post_type']) && $_GET['post_type'] == 'patients') OR (isset($_GET['page']) && $_GET['page'] == 's45-options') ) {  // adjust this if-condition according to your theme/plugin
			
			wp_enqueue_media();
			wp_enqueue_script('plupload-all');

			wp_register_script('myplupload',S45PU.'/js/myplupload.js', array('jquery'));
			wp_enqueue_script('myplupload');

			wp_register_style('myplupload', S45PU.'/css/myplupload.css');
			wp_enqueue_style('myplupload');

			wp_enqueue_script('s45-ajax', S45PU . '/js/s45_gallery.js', array('jquery'));
		}
	}
}

function s45_default_procedures_page() {
    add_submenu_page( 'edit.php?post_type=patients', 'Patient Before and After Gallery Default Procedures', 'Default Procedures', 'edit_posts', 's45-default-procedures', 's45_default_procedures' );
}

function s45PluginMenu() {
	add_submenu_page( 'edit.php?post_type=patients', 'Patient Before and After Gallery', 'Gallery Settings', 'edit_posts', 's45-options', 's45_plugin_options' );
	add_submenu_page( 'edit.php?post_type=patients', 'Patient Before and After Gallery', 'Import Data', 'edit_posts', 's45-import-data', 's45_plugin_import' );	                
	add_submenu_page( 'edit.php?post_type=patients', 'Patient Before and After Gallery', 'Instructions', 'edit_posts', 's45-instructions', 's45_instructions' );
	$options = get_option('s45_options');   
}


/**
 * Re-order patients based on filename
 *
 * 1.  Using $_POST['id'], retrieve an array of all attachments associated with patient.
 * 2.  Determine correct order of attachment by extracting the order number from the filename.
 * 3.  Update patient record to use that number as the 'menu_order' field
 * 
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function s45_reorder_patient_gallery() {
	global $wpdb;

	$id = $_POST['id'];

	$attachments = get_posts( array(
		'post_type' 	 => 'attachment',
		'numberposts' 	 => 50,
		'posts_per_page' => -1,
		'post_parent' 	 => $id,
		'exclude'     	 => get_post_thumbnail_id(),
		'orderby'     	 => 'menu_order post_date',
		'order'       	 => 'ASC'
	) );

	if ($attachments) {
		$images = array();
		$i = 0;
		foreach ($attachments as $attachment) {

			$images[$i] = array(
				'id' => $attachment->ID,
				'filename' => basename ( get_attached_file( $attachment->ID ) ),
				'post_title' => $attachment->post_title
			);
			$i++;
		}
	}

	foreach ($images as $image) {
		if ( preg_match( "/(\d+)-(\d+)of(\d+)/", $image['filename'], $matches) ) {
			$wpdb->update($wpdb->posts, array( 'menu_order' => $matches[2] ), array( 'ID' => $image['id'] ) );
		} elseif ( preg_match( "/(\d+)-(\d+)of(\d+)/", $image['post_title'], $matches ) ) {
			$wpdb->update($wpdb->posts, array( 'menu_order' => $matches[2] ), array( 'ID' => $image['id'] ) );
		}
	}

	die();
}


/**
 * Function that resets the order of each gallery (under each procedure) to default.
 *
 * Create an array patients that are sorted by sub procedures.  Sort patients under each sub-procedure by post_date.
 * 
 * @return [type] [description]
 */
function s45_reset_patient_order() {
	global $wpdb;

	$procedures = array();
	$i = 0;

	$parent_terms = get_terms( 'procedure', array( 'parent' => 0, 'hide_empty' => false ));
	
	//print_r($parent_terms);

	foreach ( $parent_terms as $parent_term ) {
		$terms = get_terms( 'procedure', array( 'parent' => $parent_term->term_id, 'fields' => 'all' ) );

		foreach ($terms as $term) {

			$procedures[$term->term_id] = get_posts(  array(
				'numberposts'	=> -1,
				'orderby'	=> 'post_date',
				'order'		=> 'DESC',
				'post_type'	=> 'patients',
				'post_parent'	=> '',
				'post_status'	=> 'publish',
				'tax_query' => array(
					array(
					'taxonomy' => 'procedure',
					'field' => 'id',
					'terms' => $term->term_id
					)
				)
			));
			$i++;
		}
	}

	foreach ( $procedures as $procedure ){
		$i=1;
		foreach ( $procedure as $patient ) {
			//print_r($patient);
			$error = $wpdb->update($wpdb->posts, array( 'menu_order' => $i ), array( 'ID' => $patient->ID ) );
			if ( $error ) {
				echo "Updated patient $patient->ID for new gallery order $i <br>\n";
			} elseif ( $error === 0 ) {
				echo "Error in operation.  Patient not updated. Error # $error <br>\n";
				var_dump( $wpdb->last_query );
				echo '<br>Reason: Order already set.<br><br>';
			}
			$i++;
		}
	}
	
	die();
}

function s45_process_custom_meta_info( $post_id ) {
	
	$post_type = get_post_type($post_id);
	if ( "patients" != $post_type ) return;
	
	global $post;	

	if( isset($_POST['patientheight'])) {
		update_post_meta( $post->ID, 'patientheight', $_POST['patientheight'] );
		update_post_meta( $post->ID, 'patientweight', $_POST['patientweight'] );
		update_post_meta( $post->ID, 'patientage', $_POST['patientage'] );
		update_post_meta( $post->ID, 'patientimplantsizeleft', $_POST['patientimplantsizeleft'] );
		update_post_meta( $post->ID, 'patientimplantsizeright', $_POST['patientimplantsizeright'] );
		update_post_meta( $post->ID, 'patientcupsizebefore', $_POST['patientcupsizebefore'] );
		update_post_meta( $post->ID, 'patientcupsizeafter', $_POST['patientcupsizeafter'] );
	}
	
	if(isset($_POST['casetitle'])){
			update_post_meta( $post->ID, 'casetitle', $_POST['casetitle'] );
	}
	
	if(isset($_POST['casenotes'])){
			update_post_meta( $post->ID, 'casenotes', $_POST['casenotes'] );
	}
	
	if(isset($_POST['surgeoninfo'])){
			update_post_meta( $post->ID, 'surgeoninfo', $_POST['surgeoninfo'] );
	}
	
	if(isset($_POST['hideonlive'])){
		if($_POST['hideonlive']==0){
			update_post_meta( $post_id, 'hideonlive', 0 );
		}else{
			remove_action('save_post', 's45_process_custom_meta_info');
			wp_update_post(array(
				'ID'    =>  $post_id,
				'post_status'   =>  'draft'
			));
			add_action('save_post', 's45_process_custom_meta_info');
			
			update_post_meta( $post_id, 'hideonlive', $_POST['hideonlive'] );
		}
	}
	
	if(isset($_POST['featurewithincat'])){
		if($_POST['featurewithincat']==0)
			update_post_meta( $post->ID, 'featurewithincat', 0 );
		else
			update_post_meta( $post->ID, 'featurewithincat', $_POST['featurewithincat'] );
	}
	
	if(isset($_POST['attach_images'])){
		global $wpdb;
		$args = array( 
			  'post_type' => 'attachment', 
			  'numberposts' => -1, 
			  'post_mime_type' => 'image',
			  'post_status' => null, 
			  'post_parent' => $post_id,
			  'orderby' => 'menu_order',
			  'order' => 'ASC'
		);
		$attach_images = $_POST['attach_images'];
		$removed_ids = array();
		$keep_ids = array();
		
		$attachments = get_posts($args);
		foreach ($attachments as $attachment) :
			//remove the attachment if not in attach_images array
			if(!in_array($attachment->ID,$attach_images)){
				$wpdb->query("UPDATE $wpdb->posts SET post_parent = 0 WHERE ID = $attachment->ID AND post_type = 'attachment'");
				$removed_ids[] = $attachment->ID;
			}else{
				$keep_ids[] = $attachment->ID;
			}
		endforeach; 
		$results = array_diff($_POST['attach_images'], $keep_ids);
		$wp_upload_dir = wp_upload_dir();
		foreach ($results as $result){
			$wpdb->query("UPDATE $wpdb->posts SET post_parent = $post_id WHERE ID = $result AND post_type = 'attachment'");
		}
	}
}


// Display and add doctor location info

function s45_meta_info() {
	global $post;
	
	$patientheight = get_post_meta( $post->ID, 'patientheight', true );
	$patientweight = get_post_meta( $post->ID, 'patientweight', true );
	$patientage = get_post_meta( $post->ID, 'patientage', true );
	$patientimplantsizeleft = get_post_meta( $post->ID, 'patientimplantsizeleft', true );
	$patientimplantsizeright = get_post_meta( $post->ID, 'patientimplantsizeright', true );
	$patientcupsizebefore = get_post_meta( $post->ID, 'patientcupsizebefore', true );
	$patientcupsizeafter = get_post_meta( $post->ID, 'patientcupsizeafter', true );
		
    ?>
    
	<p><label for="patientheight" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;">Height:</label>
		<input id="patientheight" size="45" name="patientheight" value="<?php if( $patientheight ) { echo $patientheight; } ?>" /></p>
	<p><label for="patientweight" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;">Weight:  </label>
		<input id="patientweight" name="patientweight" size="45" value="<?php if( $patientweight ) { echo $patientweight; } ?>" /></p>
	<p><label for="patientage" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;" >Age:</label>
		<input id="patientage" name="patientage" size="45" value="<?php if( $patientage ) { echo $patientage; } ?>" /></p>
    <p><label for="patientimplantsizeleft" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;">Implant Size Left:</label>
		<input id="patientimplantsizeleft" name="patientimplantsizeleft" size="45" value="<?php if( $patientimplantsizeleft ) { echo $patientimplantsizeleft; } ?>" /></p>    
    <p><label for="patientimplantsizeright" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;">Implant Size Right: </label>
		<input id="patientimplantsizeright" name="patientimplantsizeright" size="45" value="<?php if( $patientimplantsizeright ) { echo $patientimplantsizeright; } ?>" /></p>        
    <p><label for="patientcupsizebefore" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;">Cup Size Before:</label>
		<input id="patientcupsizebefore" name="patientcupsizebefore" size="45" value="<?php if( $patientcupsizebefore ) { echo $patientcupsizebefore; } ?>" /></p>            
	<p><label for="patientcupsizeafter" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;">Cup Size After:</label>
		<input id="patientcupsizeafter" name="patientcupsizeafter" size="45" value="<?php if( $patientcupsizeafter ) { echo $patientcupsizeafter; } ?>" /></p>            
<?php }

function s45_meta_display_options() {
	global $post;
	
	$hideonlive = get_post_meta( $post->ID, 'hideonlive', true );
	$featurewithincat = get_post_meta( $post->ID, 'featurewithincat', true );
    ?>
    
	<p><label for="hideonlive" style="display: inline-block;width: 150px;text-align: right;padding-right: 8px;">Hide from live site:</label>
		<input type="hidden" name="hideonlive" value="0"  />
		<input type="checkbox" name="hideonlive" id="hideonlive" value="1" <?php echo (($hideonlive==1) ? ' checked="checked" ' : 'test'); ?>  /></p>
	<p><label for="featurewithincat" style="display: inline-block;width: 150px;text-align: right;padding-right: 8px;">Feature within category:  </label>
		<input type="hidden" name="featurewithincat" value="0"  />
		<input type="checkbox" name="featurewithincat" id="featurewithincat" value="1" <?php echo (($featurewithincat==1) ? ' checked="checked" ' : 'test'); ?>  /></p>
<?php }

function s45_meta_surgeon_options() {
	global $post;
	$surgeoninfo = get_post_meta( $post->ID, 'surgeoninfo', true );
    ?>
    
	<p><label for="surgeoninfo" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;">Surgeon:</label>
		<input id="surgeoninfo" size="45" name="surgeoninfo" value="<?php if( $surgeoninfo ) { echo $surgeoninfo; } ?>" /></p>
		<p>If empty, surgeon name from Gallery Settings will display at front.</p>
<?php }

function s45_meta_case_notes() {
	global $post;
	$casetitle = get_post_meta( $post->ID, 'casetitle', true );
	$casenotes = get_post_meta( $post->ID, 'casenotes', true );
    ?>
    
	<p><label for="casetitle" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;">Case Title*:</label>
		<input id="casetitle" size="92" name="casetitle" value="<?php if( $casetitle ) { echo $casetitle; } ?>" /></p>
	<p><label for="casenotes" style="display: inline-block;width: 100px;text-align: right;padding-right: 8px;vertical-align: top;">Case Notes*:</label>
		<textarea id="casenotes" size="500" name="casenotes" style="width:30%;"><?php if( $casenotes ) { echo $casenotes; } ?></textarea></p>
		
	<script type="text/javascript">
		jQuery("#procedurechecklist>li>label input").each(function(){
			if(jQuery(this).is(":not(:checked)")){
				jQuery(this).remove();
			}
		});
	</script>
<?php }

// Custom metabox functionality

function admin_init() {
	add_meta_box( 'patient-images-meta', 'Patient Images', 'patient_images', 'patients' );
	add_meta_box( 'patient-case-notes', 'Case Details<span style="font-size:10px; padding-left:25px;">Note: These fields are only visible to logged in users, not visible to the public.</span>', 's45_meta_case_notes', 'patients', 'advanced', 'high');
	add_meta_box( 'patient-surgeon-options', 'Surgeon', 's45_meta_surgeon_options', 'patients', 'advanced', 'high');
	add_meta_box( 'patient-display-options', 'Display Options', 's45_meta_display_options', 'patients', 'advanced', 'high');
	add_meta_box( 'obag-meta', 'Patient Information', 's45_meta_info', 'patients' );
}

// Display Thumbnails of associated images for each Patient record
// 1. Grab image array from patient record

function patient_images() {
	global $post;
	
	$args = array( 
	      'post_type' => 'attachment', 
		  'numberposts' => -1, 
		  'post_mime_type' => 'image',
		  'post_status' => null, 
		  'post_parent' => $post->ID,
		  'orderby' => 'menu_order',
		  'order' => 'ASC'
	);
	
	$attachments = get_posts($args);
	
	if (!$attachments) { echo 'No images yet.  Please upload one!'; }
	
	// Loop and display image thumbnails 
	
	?>
	<style>
	#normal-sortables #review_metabox, #normal-sortables #wpcf-group-inner-page-options, #normal-sortables #wpcf-group-banner-options,
	#normal-sortables #postcustom{display:none;}
	.bf-headings li{float: left;width: 45%;text-align: center;}
	#sortable-image-attachments li{width: 45%;text-align: center;height:240px;display:inline-block;}
	#sortable-image-attachments li:nth-child(even) {
		padding-right: 0px; border-right:0px;
	}
	#sortable-image-attachments li img{max-width:350px; max-height:200px;}
	</style>
	<div id="loading-animation" style="display:none;background:#a1fd89;padding:5px 10px;margin:0">Image order updated.</div>
	<ul class='bf-headings'>
		<li><h2>Before</h2></li>
		<li><h2>After</h2></li>
	</ul>
	<ul id="sortable-image-attachments" style="cursor:move"><?php
	
	foreach ($attachments as $attachment) :
	$image = $attachment->guid;
	if(!strstr($img, '/photogallery/')){
		$attachment_img = wp_get_attachment_image_src( $attachment->ID, 'patient-normal' );
		$image = $attachment_img[0];
	}
	?>
    	
        <li id="<?php echo $attachment->ID;?>">
			<input type="hidden" name="attach_images[]" value="<?php echo $attachment->ID;?>" />
        	<img src="<?php echo $image;?>" /><br>
			<a title="Remove Image" onclick="jQuery(this).parent().remove();">Remove Image</a>
        </li>
        
    
	<?php endforeach; 
	
	?></ul><?php
	
	// 1. Upload new images via WP media manager
	// 2. Manage gallery (sort order, meta info, etc)
	
	?>
	<div style="padding:50px 0 10px 0; clear:both; text-align:center;">
    	<!--<a href="media-upload.php?post_id=<?php echo $post->ID;?>&type=image&TB_iframe=1&width=640&height=715" id="add_image" class="be-button thickbox button-secondary" title="Add Image">Upload Images</a>
        <a href="media-upload.php?post_id=<?php echo $post->ID;?>&type=image&tab=gallery&TB_iframe=1&width=640&height=715" id="manage_gallery" class="thickbox be-button button-secondary" title="Manage Gallery">Manage Gallery</a>-->
		<button type="button" id="gmls_add_images" class="button"> Add Images</button>
		<div class="sortable" id="image_list"></div>
    </div>   
	
	<?php
}

// Register custom post types for Patients


//  Change permalinks

function s45_post_type_link_filter( $post_link, $id = 0, $leavename = FALSE ) {

    // Grabs custom permalink from custom settings
    $options = get_option( 's45_options' );

    // If custom permalink exists, use that - else use preset slug
    if (!$options['gallery_slug']) : $options['gallery_slug'] = 'before-after-gallery'; endif;

    if ( strpos('%procedure%', $post_link) === 'FALSE' ) {
      return $post_link;
    }
    $post = get_post($id);
    if ( !is_object($post) || $post->post_type != 'patients' ) {
      return $post_link;
    }
    $terms = wp_get_object_terms($post->ID, 'procedure');
    if ( !$terms ) {
      return str_replace($options['gallery_slug'].'/%procedure%/', '', $post_link);
    }
    return str_replace('%procedure%', $terms[0]->slug, $post_link);
}

// Add capabilities for administrator role

function s45_add_administrator_caps() {
	// gets the author role
	$role = get_role( 'administrator' );

	// This only works, because it accesses the class instance.
	// would allow the author to edit others' posts for current theme only
	$role->add_cap( 'manage_procedures' ); 
	$role->add_cap( 'edit_procedures' ); 
	$role->add_cap( 'delete_procedures' ); 
	$role->add_cap( 'assign_procedures' ); 
}

// Add capabilities for editor role

function s45_add_editor_caps() {
	// gets the author role
	$role = get_role( 'editor' );

	// This only works, because it accesses the class instance.
	// would allow the author to edit others' posts for current theme only
	$role->add_cap( 'manage_procedures' ); 
	$role->add_cap( 'edit_procedures' ); 
	$role->add_cap( 'delete_procedures' ); 
	$role->add_cap( 'assign_procedures' ); 
}


// Add capabilities for author role

function s45_add_author_caps() {
	// gets the author role
	$role = get_role( 'author' );

	// This only works, because it accesses the class instance.
	// would allow the author to edit others' posts for current theme only
	$role->add_cap( 'manage_procedures' ); 
	$role->add_cap( 'edit_procedures' ); 
	$role->add_cap( 'delete_procedures' ); 
	$role->add_cap( 'assign_procedures' ); 
}


// Automatically generate patient ID based on primary key
function s45_auto_title_single_patient( $data , $postarr ) {
    if ($data['post_type'] == 'patients')  {
		if (strstr(wp_unslash( $_SERVER['REQUEST_URI'] ),'/wp-admin/post-new.php?post_type=patients')) {
  			$data['post_title'] = $postarr['ID'];
  		}
  	}

  	return $data;
}

function s45_patient_listing($query ) {

	if( !is_object($query)){
		return $query;
	}
	//echo $GLOBALS['wp_query']->request;
	/*if (is_admin() && $_GET['post_type'] == 'patients') {
		$orderby = $query->get( 'orderby');
		if ( 'casetitle' ==  $orderby) {
			$meta_query = array(
				'relation' => 'OR',
				array(
					'key' => 'casetitle',
					'compare' => 'NOT EXISTS',
				),
				array(
					'key' => 'casetitle',
				),
			);
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_query', $meta_query );
		}
		echo $GLOBALS['wp_query']->request;
	}else{*/
		$options = get_option( 's45_options' );
		if( empty($options) ){
			return $query;
		}
		
		if (!is_admin() && s45_is_gallery()) {
			if ( s45_is_gallery_listing() ) {
				//add_action( 'pre_get_posts', 'wpa_69199' );
				add_filter( 'posts_orderby', 's45_custom_orderby' );
				$query->query_vars['order'] = 'ASC';
				return $query;
			}
			if ( s45_is_gallery_single() ) {
				$query->query_vars['orderby'] = 'menu_order';
				$query->query_vars['order'] = 'ASC';
				return $query;
			}
		}
    /*}*/
}

/**
 * s45 Photo Gallery custom template loader.
 *
 * This loads up custom templates for the gallery display pages in teh child theme.  If the templates do not exist in the child theme,
 * it will then load them from the parent theme.
 * 
 * @param  string $template Template path and filename
 * @return [type]           
 */
function s45_custom_template_loader( $template ) {
	if ( s45_is_gallery_home() ) {
		if (file_exists(get_stylesheet_directory() . '/gallery-templates/gallery-home.php')) {
			$template = get_stylesheet_directory() . '/gallery-templates/gallery-home.php';
		} elseif (file_exists(get_template_directory() . '/gallery-templates/gallery-home.php')) {
			$template = get_template_directory() . '/gallery-templates/gallery-home.php';
		} elseif (file_exists( S45PDP . 'gallery-templates/gallery-home.php')) {
			$template = S45PDP . 'gallery-templates/gallery-home.php';
		} 
	}
	
	if ( s45_is_gallery_listing() ) {
		if (file_exists(get_stylesheet_directory() . '/gallery-templates/gallery-listing.php')) {
			$template = get_stylesheet_directory() . '/gallery-templates/gallery-listing.php';
		} elseif (file_exists(get_template_directory() . '/gallery-templates/gallery-listing.php')) {
			$template = get_template_directory() . '/gallery-templates/gallery-listing.php';
		} elseif (file_exists( S45PDP. 'gallery-templates/gallery-listing.php')) {
			$template = S45PDP . 'gallery-templates/gallery-listing.php';
		} 
	}
	
	if ( s45_is_gallery_single() ) {
		if (file_exists(get_stylesheet_directory() . '/gallery-templates/gallery-single.php')) {
			$template = get_stylesheet_directory() . '/gallery-templates/gallery-single.php';
		} elseif (file_exists(get_template_directory() . '/gallery-templates/gallery-single.php')) {
			$template = get_template_directory() . '/gallery-templates/gallery-single.php';
		} elseif (file_exists( S45PDP . 'gallery-templates/gallery-single.php')) {
			$template = S45PDP . 'gallery-templates/gallery-single.php';
		} 
	}

	return $template;

}

/**
 * Template redirect for single patient printing
  */
function s45_print_single_patient() {
    if (isset($_GET["patient_print"])) {
    	//global $wp, $wp_query;
        include( S45PDP . 'gallery-templates/gallery-print.php' );
        die();
    }
}


/**
 * Function that implmenets a gallery adult check.
 * @return [type] [description]
 */
function s45_adult_check( $template ) {
	if ( s45_is_gallery_home() ) {
		$options = get_option('s45_options');
	    global $s45_mobile_check;

		if ( $options['adult_check'] == 'on' ) {
                    //if ( !$_COOKIE['adult_check'] == 'yes' ) {
                    if ( !isset($_COOKIE['adult_check']) || empty($_COOKIE['adult_check']) || $_COOKIE['adult_check'] != 'yes' ) {
                        if ( ($s45_mobile_check['display_mobile'] == true) && ($options['legacy_site'] != true) ) {
                            if (file_exists(get_stylesheet_directory() . '/gallery-templates/adult-check-mobile.php')) {
                                $template = get_stylesheet_directory() . '/gallery-templates/adult-check-mobile.php';
                            } elseif (file_exists(get_template_directory() . '/gallery-templates/adult-check-mobile.php')) {
                                $template = get_template_directory() . '/gallery-templates/adult-check-mobile.php';
                            } elseif (file_exists( S45PDP . 'gallery-templates/adult-check-mobile.php')) {
                                $template = S45PDP . 'gallery-templates/adult-check-mobile.php';
                                //} else {
                                //    return false;
                            }
                        }
                        else {	
                            if (file_exists(get_stylesheet_directory() . '/gallery-templates/adult-check.php')) {
                                $template = get_stylesheet_directory() . '/gallery-templates/adult-check.php';
                            } elseif (file_exists(get_template_directory() . '/gallery-templates/adult-check.php')) {
                                $template = get_template_directory() . '/gallery-templates/adult-check.php';
                            } elseif (file_exists( S45PDP . 'gallery-templates/adult-check.php')) {
                                $template = S45PDP . 'gallery-templates/adult-check.php';
                                //} else {
                                //    return false;
                            } 
                        }
                        //include( $template );
                        //die();
			}
		}
        }

        return $template;
}

// Generate dynamic, SEO friendly title meta tag and description

function s45_set_meta_title($title) {
	global $post;

	$options = get_option( 's45_options' );

    if ( s45_is_gallery_home() ) {
		return $options['gallery_meta_title'];
    } elseif ( s45_is_gallery_listing() ) {
		remove_action('wp_head', 'rel_canonical');
		$term = get_term_by ( 'slug', get_query_var( 'term' ), 'procedure' );
		$search = array('[category_name]','[doctor_name]','[site_title]');
		$replace = array($term->name,$options['doctor_name'],get_bloginfo('name'));
		$title = str_replace($search,$replace,$options['glisting_meta_title']);
		return $title;
	} elseif ( s45_is_gallery_single() ) {
		if( !is_object($post) ){
			return $title;
		}
		$terms = wp_get_object_terms( $post->ID , 'procedure' );
		if( !isset($terms[0]) || !is_object($terms[0]) ){
			return $title;
		}
		$term = get_term_by( 'id', $terms[0]->term_id, 'procedure' );
		$search = array('[category_name]','[doctor_name]','[site_title]','[case]');
		$replace = array($term->name,$options['doctor_name'],get_bloginfo('name'),get_the_title());
		$title = str_replace($search,$replace,$options['patient_meta_title']);
		return $title;
	} else {
		return $title;
	}
}

// Generate meta name description for photo gallery pages

function s45_set_meta_desc() {
	global $post;
	
	$options = get_option( 's45_options' );

    if ( s45_is_gallery_home() ) {
		?>
		<meta name="description" content="<?php echo $options['gallery_meta_desc']; ?>" />
		<?php
	} elseif ( s45_is_gallery_listing() ) {
		$term = get_term_by ( 'slug', get_query_var( 'term' ), 'procedure' );
		$search = array('[category_name]','[doctor_name]','[site_title]');
		$replace = array($term->name,$options['doctor_name'],get_bloginfo('name'));
		$list_desc = str_replace($search,$replace,$options['glisting_meta_desc']);
		?>
		<meta name="description" content="<?php echo $list_desc; ?>" />
		<?php
	} elseif ( s45_is_gallery_single() ) {
		if( !is_object($post) ){
			return $title;
		}
		$terms = wp_get_object_terms( $post->ID , 'procedure' );
		if( !isset($terms[0]) || !is_object($terms[0]) ){
			return $title;
		}
		$term = get_term_by( 'id', $terms[0]->term_id, 'procedure' );
		$search = array('[category_name]','[doctor_name]','[site_title]','[case]');
		$replace = array($term->name,$options['doctor_name'],get_bloginfo('name'),get_the_title());
		$patient_meta_desc = str_replace($search,$replace,$options['patient_meta_desc']);
		?>
		<meta name="description" content="<?php echo $patient_meta_desc; ?>" />
		<?php
	}
}

function my_remove_post_type_support() {
    remove_post_type_support( 'patients', 'editor' );
}

/**
 * Retrieve adjacent post link.
 *
 * Can either be next or previous post link.
 *
 * Based on get_adjacent_post() from wp-includes/link-template.php
 *
 * @param array $r Arguments.
 * @param bool $previous Optional. Whether to retrieve previous post.
 * @return array of post objects.
 */
function get_adjacent_post_plus($r, $previous = true ) {
	global $post, $wpdb;

	extract( $r, EXTR_SKIP );

	if ( empty( $post ) )
		return null;

//	Sanitize $order_by, since we are going to use it in the SQL query. Default to 'post_date'.
	if ( in_array($order_by, array('post_date', 'post_title', 'post_excerpt', 'post_name', 'post_modified')) ) {
		$order_format = '%s';
	} elseif ( in_array($order_by, array('ID', 'post_author', 'post_parent', 'menu_order', 'comment_count')) ) {
		$order_format = '%d';
	} elseif ( $order_by == 'custom' && !empty($meta_key) ) { // Don't allow a custom sort if meta_key is empty.
		$order_format = '%s';
	} elseif ( $order_by == 'numeric' && !empty($meta_key) ) {
		$order_format = '%d';
	} else {
		$order_by = 'post_date';
		$order_format = '%s';
	}
	
//	Sanitize $order_2nd. Only columns containing unique values are allowed here. Default to 'post_date'.
	if ( in_array($order_2nd, array('post_date', 'post_title', 'post_modified')) ) {
		$order_format2 = '%s';
	} elseif ( in_array($order_2nd, array('ID')) ) {
		$order_format2 = '%d';
	} else {
		$order_2nd = 'post_date';
		$order_format2 = '%s';
	}
	
//	Sanitize num_results (non-integer or negative values trigger SQL errors)
	$num_results = intval($num_results) < 2 ? 1 : intval($num_results);

//	Queries involving custom fields require an extra table join
	if ( $order_by == 'custom' || $order_by == 'numeric' ) {
		$current_post = get_post_meta($post->ID, $meta_key, TRUE);
		$order_by = ($order_by === 'numeric') ? 'm.meta_value+0' : 'm.meta_value';
		$meta_join = $wpdb->prepare(" INNER JOIN $wpdb->postmeta AS m ON p.ID = m.post_id AND m.meta_key = %s", $meta_key );
	} elseif ( $in_same_meta ) {
		$current_post = $post->$order_by;
		$order_by = 'p.' . $order_by;
		$meta_join = $wpdb->prepare(" INNER JOIN $wpdb->postmeta AS m ON p.ID = m.post_id AND m.meta_key = %s", $in_same_meta );
	} else {
		$current_post = $post->$order_by;
		$order_by = 'p.' . $order_by;
		$meta_join = '';
	}

//	Get the current post value for the second sort column
	$current_post2 = $post->$order_2nd;
	$order_2nd = 'p.' . $order_2nd;
	
//	Get the list of post types. Default to current post type
	if ( empty($post_type) )
		$post_type = "'$post->post_type'";

//	Put this section in a do-while loop to enable the loop-to-first-post option
	do {
		$join = $meta_join;
		$excluded_categories = $ex_cats;
		$included_categories = $in_cats;
		$excluded_posts = $ex_posts;
		$included_posts = $in_posts;
		$in_same_term_sql = $in_same_author_sql = $in_same_meta_sql = $ex_cats_sql = $in_cats_sql = $ex_posts_sql = $in_posts_sql = '';

//		Get the list of hierarchical taxonomies, including customs (don't assume taxonomy = 'category')
		$taxonomies = array_filter( get_post_taxonomies($post->ID), "is_taxonomy_hierarchical" );

		if ( ($in_same_cat || $in_same_tax || $in_same_format || !empty($excluded_categories) || !empty($included_categories)) && !empty($taxonomies) ) {
			$cat_array = $tax_array = $format_array = array();

			if ( $in_same_cat ) {
				$cat_array = wp_get_object_terms($post->ID, $taxonomies, array('fields' => 'ids'));
			}
			if ( $in_same_tax && !$in_same_cat ) {
				if ( $in_same_tax === true ) {
					if ( $taxonomies != array('category') )
						$taxonomies = array_diff($taxonomies, array('category'));
				} else
					$taxonomies = (array) $in_same_tax;
				$tax_array = wp_get_object_terms($post->ID, $taxonomies, array('fields' => 'ids'));
			}
			if ( $in_same_format ) {
				$taxonomies[] = 'post_format';
				$format_array = wp_get_object_terms($post->ID, 'post_format', array('fields' => 'ids'));
			}

			$join .= " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy IN (\"" . implode('", "', $taxonomies) . "\")";

			$term_array = array_unique( array_merge( $cat_array, $tax_array, $format_array ) );
			if ( !empty($term_array) )
				$in_same_term_sql = "AND tt.term_id IN (" . implode(',', $term_array) . ")";

			if ( !empty($excluded_categories) ) {
//				Support for both (1 and 5 and 15) and (1, 5, 15) delimiter styles
				$delimiter = ( strpos($excluded_categories, ',') !== false ) ? ',' : 'and';
				$excluded_categories = array_map( 'intval', explode($delimiter, $excluded_categories) );
//				Three category exclusion methods are supported: 'strong', 'diff', and 'weak'.
//				Default is 'weak'. See the plugin documentation for more information.
				if ( $ex_cats_method === 'strong' ) {
					$taxonomies = array_filter( get_post_taxonomies($post->ID), "is_taxonomy_hierarchical" );
					if ( function_exists('get_post_format') )
						$taxonomies[] = 'post_format';
					$ex_cats_posts = get_objects_in_term( $excluded_categories, $taxonomies );
					if ( !empty($ex_cats_posts) )
						$ex_cats_sql = "AND p.ID NOT IN (" . implode($ex_cats_posts, ',') . ")";
				} else {
					if ( !empty($term_array) && !in_array($ex_cats_method, array('diff', 'differential')) )
						$excluded_categories = array_diff($excluded_categories, $term_array);
					if ( !empty($excluded_categories) )
						$ex_cats_sql = "AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
				}
			}

			if ( !empty($included_categories) ) {
				$in_same_term_sql = ''; // in_cats overrides in_same_cat
				$delimiter = ( strpos($included_categories, ',') !== false ) ? ',' : 'and';
				$included_categories = array_map( 'intval', explode($delimiter, $included_categories) );
				$in_cats_sql = "AND tt.term_id IN (" . implode(',', $included_categories) . ")";
			}
		}

//		Optionally restrict next/previous links to same author		
		if ( $in_same_author )
			$in_same_author_sql = $wpdb->prepare("AND p.post_author = %d", $post->post_author );

//		Optionally restrict next/previous links to same meta value
		if ( $in_same_meta && $r['order_by'] != 'custom' && $r['order_by'] != 'numeric' )
			$in_same_meta_sql = $wpdb->prepare("AND m.meta_value = %s", get_post_meta($post->ID, $in_same_meta, TRUE) );

//		Optionally exclude individual post IDs
		if ( !empty($excluded_posts) ) {
			$excluded_posts = array_map( 'intval', explode(',', $excluded_posts) );
			$ex_posts_sql = " AND p.ID NOT IN (" . implode(',', $excluded_posts) . ")";
		}
		
//		Optionally include individual post IDs
		if ( !empty($included_posts) ) {
			$included_posts = array_map( 'intval', explode(',', $included_posts) );
			$in_posts_sql = " AND p.ID IN (" . implode(',', $included_posts) . ")";
		}

		$adjacent = $previous ? 'previous' : 'next';
		$order = $previous ? 'DESC' : 'ASC';
		$op = $previous ? '<' : '>';

//		Optionally get the first/last post. Disable looping and return only one result.
		if ( $end_post ) {
			$order = $previous ? 'ASC' : 'DESC';
			$num_results = 1;
			$loop = false;
			if ( $end_post === 'fixed' ) // display the end post link even when it is the current post
				$op = $previous ? '<=' : '>=';
		}

//		If there is no next/previous post, loop back around to the first/last post.		
		if ( $loop && isset($result) ) {
			$op = $previous ? '>=' : '<=';
			$loop = false; // prevent an infinite loop if no first/last post is found
		}
		
		$join  = apply_filters( "get_{$adjacent}_post_plus_join", $join, $r );

//		In case the value in the $order_by column is not unique, select posts based on the $order_2nd column as well.
//		This prevents posts from being skipped when they have, for example, the same menu_order.
		$where = apply_filters( "get_{$adjacent}_post_plus_where", $wpdb->prepare("WHERE ( $order_by $op $order_format OR $order_2nd $op $order_format2 AND $order_by = $order_format ) AND p.post_type IN ($post_type) AND p.post_status = 'publish' $in_same_term_sql $in_same_author_sql $in_same_meta_sql $ex_cats_sql $in_cats_sql $ex_posts_sql $in_posts_sql", $current_post, $current_post2, $current_post), $r );

		$sort  = apply_filters( "get_{$adjacent}_post_plus_sort", "ORDER BY $order_by $order, $order_2nd $order LIMIT $num_results", $r );

		$query = "SELECT DISTINCT p.* FROM $wpdb->posts AS p $join $where $sort";
		$query_key = 'adjacent_post_' . md5($query);
		$result = wp_cache_get($query_key);
		if ( false !== $result )
			return $result;

//		echo $query . '<br />';

//		Use get_results instead of get_row, in order to retrieve multiple adjacent posts (when $num_results > 1)
//		Add DISTINCT keyword to prevent posts in multiple categories from appearing more than once
		$result = $wpdb->get_results("SELECT DISTINCT p.* FROM $wpdb->posts AS p $join $where $sort");
		if ( null === $result )
			$result = '';

	} while ( !$result && $loop );

	wp_cache_set($query_key, $result);
	return $result;
}

/**
 * Display previous post link that is adjacent to the current post.
 *
 * Based on previous_post_link() from wp-includes/link-template.php
 *
 * @param array|string $args Optional. Override default arguments.
 * @return bool True if previous post link is found, otherwise false.
 */
function previous_post_link_plus($args = '') {
	return adjacent_post_link_plus($args, '« %link', true);
}

/**
 * Display next post link that is adjacent to the current post.
 *
 * Based on next_post_link() from wp-includes/link-template.php
 *
 * @param array|string $args Optional. Override default arguments.
 * @return bool True if next post link is found, otherwise false.
 */
function next_post_link_plus($args = '') {
	return adjacent_post_link_plus($args, '%link »', false);
}

/**
 * Display adjacent post link.
 *
 * Can be either next post link or previous.
 *
 * Based on adjacent_post_link() from wp-includes/link-template.php
 *
 * @param array|string $args Optional. Override default arguments.
 * @param bool $previous Optional, default is true. Whether display link to previous post.
 * @return bool True if next/previous post is found, otherwise false.
 */
function adjacent_post_link_plus($args = '', $format = '%link »', $previous = true) {
	$defaults = array(
		'order_by' => 'post_date', 'order_2nd' => 'post_date', 'meta_key' => '', 'post_type' => '',
		'loop' => false, 'end_post' => false, 'thumb' => false, 'max_length' => 0,
		'format' => '', 'link' => '%title', 'date_format' => '', 'tooltip' => '%title',
		'in_same_cat' => false, 'in_same_tax' => false, 'in_same_format' => false,
		'in_same_author' => false, 'in_same_meta' => false,
		'ex_cats' => '', 'ex_cats_method' => 'weak', 'in_cats' => '', 'ex_posts' => '', 'in_posts' => '',
		'before' => '', 'after' => '', 'num_results' => 1, 'return' => false, 'echo' => true
	);

//	If Post Types Order plugin is installed, default to sorting on menu_order
	if ( function_exists('CPTOrderPosts') )
		$defaults['order_by'] = 'menu_order';
	
	$r = wp_parse_args( $args, $defaults );
	if ( empty($r['format']) )
		$r['format'] = $format;
	if ( empty($r['date_format']) )
		$r['date_format'] = get_option('date_format');
	if ( !function_exists('get_post_format') )
		$r['in_same_format'] = false;

	if ( $previous && is_attachment() ) {
		$posts = array();
		$posts[] = & get_post($GLOBALS['post']->post_parent);
	} else
		$posts = get_adjacent_post_plus($r, $previous);

//	If there is no next/previous post, return false so themes may conditionally display inactive link text.
	if ( !$posts )
		return false;

//	If sorting by date, display posts in reverse chronological order. Otherwise display in alpha/numeric order.
	if ( ($previous && $r['order_by'] != 'post_date') || (!$previous && $r['order_by'] == 'post_date') )
		$posts = array_reverse( $posts, true );
		
//	Option to return something other than the formatted link		
	if ( $r['return'] ) {
		if ( $r['num_results'] == 1 ) {
			reset($posts);
			$post = current($posts);
			if ( $r['return'] === 'id')
				return $post->ID;
			if ( $r['return'] === 'href')
				return get_permalink($post);
			if ( $r['return'] === 'object')
				return $post;
			if ( $r['return'] === 'title')
				return $post->post_title;
			if ( $r['return'] === 'date')
				return mysql2date($r['date_format'], $post->post_date);
		} elseif ( $r['return'] === 'object')
			return $posts;
	}

	$output = $r['before'];

//	When num_results > 1, multiple adjacent posts may be returned. Use foreach to display each adjacent post.
	foreach ( $posts as $post ) {
		$title = $post->post_title;
		if ( empty($post->post_title) )
			$title = $previous ? __('Previous Post') : __('Next Post');

		$title = apply_filters('the_title', $title, $post->ID);
		$date = mysql2date($r['date_format'], $post->post_date);
		$author = get_the_author_meta('display_name', $post->post_author);
	
//		Set anchor title attribute to long post title or custom tooltip text. Supports variable replacement in custom tooltip.
		if ( $r['tooltip'] ) {
			$tooltip = str_replace('%title', $title, $r['tooltip']);
			$tooltip = str_replace('%date', $date, $tooltip);
			$tooltip = str_replace('%author', $author, $tooltip);
			$tooltip = ' title="' . esc_attr($tooltip) . '"';
		} else
			$tooltip = '';

//		Truncate the link title to nearest whole word under the length specified.
		$max_length = intval($r['max_length']) < 1 ? 9999 : intval($r['max_length']);
		if ( strlen($title) > $max_length )
			$title = substr( $title, 0, strrpos(substr($title, 0, $max_length), ' ') ) . '...';
	
		$rel = $previous ? 'prev' : 'next';

		$anchor = '<a href="'.get_permalink($post).'" rel="'.$rel.'"'.$tooltip.'>';
		$link = str_replace('%title', $title, $r['link']);
		$link = str_replace('%date', $date, $link);
		$link = $anchor . $link . '</a>';
	
		$format = str_replace('%link', $link, $r['format']);
		$format = str_replace('%title', $title, $format);
		$format = str_replace('%date', $date, $format);
		$format = str_replace('%author', $author, $format);
		if ( ($r['order_by'] == 'custom' || $r['order_by'] == 'numeric') && !empty($r['meta_key']) ) {
			$meta = get_post_meta($post->ID, $r['meta_key'], true);
			$format = str_replace('%meta', $meta, $format);
		} elseif ( $r['in_same_meta'] ) {
			$meta = get_post_meta($post->ID, $r['in_same_meta'], true);
			$format = str_replace('%meta', $meta, $format);
		}

//		Get the category list, including custom taxonomies (only if the %category variable has been used).
		if ( (strpos($format, '%category') !== false) && version_compare(PHP_VERSION, '5.0.0', '>=') ) {
			$term_list = '';
			$taxonomies = array_filter( get_post_taxonomies($post->ID), "is_taxonomy_hierarchical" );
			if ( $r['in_same_format'] && get_post_format($post->ID) )
				$taxonomies[] = 'post_format';
			foreach ( $taxonomies as &$taxonomy ) {
//				No, this is not a mistake. Yes, we are testing the result of the assignment ( = ).
//				We are doing it this way to stop it from appending a comma when there is no next term.
				if ( $next_term = get_the_term_list($post->ID, $taxonomy, '', ', ', '') ) {
					$term_list .= $next_term;
					if ( current($taxonomies) ) $term_list .= ', ';
				}
			}
			$format = str_replace('%category', $term_list, $format);
		}

//		Optionally add the post thumbnail to the link. Wrap the link in a span to aid CSS styling.
		if ( $r['thumb'] && has_post_thumbnail($post->ID) ) {
			if ( $r['thumb'] === true ) // use 'post-thumbnail' as the default size
				$r['thumb'] = 'post-thumbnail';
			$thumbnail = '<a class="post-thumbnail" href="'.get_permalink($post).'" rel="'.$rel.'"'.$tooltip.'>' . get_the_post_thumbnail( $post->ID, $r['thumb'] ) . '</a>';
			$format = $thumbnail . '<span class="post-link">' . $format . '</span>';
		}

//		If more than one link is returned, wrap them in <li> tags		
		if ( intval($r['num_results']) > 1 )
			$format = '<li>' . $format . '</li>';
		
		$output .= $format;
	}

	$output .= $r['after'];

	//	If echo is false, don't display anything. Return the link as a PHP string.
	if ( !$r['echo'] || $r['return'] === 'output' )
		return $output;

	$adjacent = $previous ? 'previous' : 'next';
	echo apply_filters( "{$adjacent}_post_link_plus", $output, $r );

	return true;
}

// Display custom columns
function patients_posts_columns( $columns ) {
	$columns = array(
	  'cb' => $columns['cb'],
	  'title' => __( 'Title' ),
	  'casetitle' => __( 'Case Title*', 'patients' ),
	  'casenotes' => __( 'Case Notes*', 'patients' ),
	  'category' => __( 'Category', 'patients' ),
	  'author' => __( 'Author' ),
	  'date' => __( 'Date' ),	  
	);
	return $columns;
}

// Load Custom Columns with values
function patients_posts_custom_column( $column, $post_id ) {
	//  Case Title Column
	if ( 'casetitle' === $column ) {
		$casetitle = get_post_meta( $post_id, 'casetitle', true );
		if ( ! $casetitle )
			_e( 'n/a' );  
		else
			echo $casetitle;
	}
	
	//  Case Notes Column
	if ( 'casenotes' === $column ) {
		$casenotes = get_post_meta( $post_id, 'casenotes', true );
		if ( ! $casenotes )
			_e( 'n/a' );  
		else
			echo $casenotes;
	}
	
	//  Case Notes Column
	if ( 'category' === $column ) {
		$category = s45_generate_alt_tag( $post_id);
		if ( ! $category )
			_e( 'n/a' );  
		else
			echo $category;
	}
}

// Add Sortable Option to columns
function patients_sortable_columns( $columns ) {
	$columns['casetitle'] = 'casetitle';
	$columns['category'] = 'category';
	return $columns;
}

//join postmeta for search
add_filter( 'posts_join' , function($join){
    global $wpdb;
	if(is_admin() && $_GET['post_type'] == 'patients' && $_GET['s']!=''){
		if(is_search())
		{
		 $join .= " LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id ";
		}
		if($_GET['orderby'] == 'casetitle')
		{
		 $join .= " LEFT JOIN $wpdb->postmeta AS mt1 ON ($wpdb->posts.ID = mt1.post_id AND mt1.meta_key = 'casetitle') ";
		}
		if($_GET['orderby'] == 'category')
		{
			$join .= " LEFT JOIN $wpdb->term_relationships ON $wpdb->posts.ID=$wpdb->term_relationships.object_id";
			$join .= " LEFT JOIN $wpdb->term_taxonomy USING (term_taxonomy_id)";
			$join .= " LEFT JOIN $wpdb->terms USING (term_id)";
		}
	}
     return $join;
});

//search postmeta_key for search string
add_filter( 'posts_where', function( $where )
{
    global $wpdb;
	if(is_admin() && $_GET['post_type'] == 'patients' && $_GET['s']!=''){
		if(is_search())
		{
			$searchstring = '%' . $wpdb->esc_like( $_GET['s'] ) . '%';
			//search postmeta_key as well
			$where .= $wpdb->prepare(" OR ($wpdb->postmeta.meta_key = 'casetitle' AND $wpdb->postmeta.meta_value LIKE %s) ", $searchstring);
			$where .= $wpdb->prepare(" OR ($wpdb->postmeta.meta_key = 'casenotes' AND $wpdb->postmeta.meta_value LIKE %s) ", $searchstring);
		}
		if($_GET['orderby'] == 'casetitle'){
			$where .= $wpdb->prepare(" AND (mt1.post_id IS NULL OR mt1.meta_key = 'casetitle' ) ");
		}
		if($_GET['orderby'] == 'category'){
			$where .= $wpdb->prepare(" AND (taxonomy = 'procedure' OR taxonomy IS NULL) ");
		}
	}
    return $where;
});

//group by post ID
add_filter( 'posts_groupby', function ($groupby, $query) {
    global $wpdb;
	if(is_admin() && $_GET['post_type'] == 'patients' && $_GET['s']!=''){
		if(is_search())
		{
			$groupby = "{$wpdb->posts}.ID";
		}
		if($_GET['orderby'] == 'category'){
			$groupby = "object_id";
		}
	}
    return $groupby;
}, 10, 2 );

//search postmeta_key for search string
add_filter( 'posts_orderby', function( $orderby, $query)
{
    global $wpdb;
	if(is_admin() && $_GET['post_type'] == 'patients' && $_GET['s']!=''){
		$order = $_GET['order'];
		if($_GET['orderby'] == 'casetitle')
		{
			$orderby = "mt1.meta_value ".$order;
		}
		if($_GET['orderby'] == 'category')
		{
			$orderby = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name) ".$order;
		}
	}
    return $orderby;
}, 10, 2 );

// display custom admin notice
function shapeSpace_custom_admin_notice() {
	if(is_admin() && $_GET['post_type'] == 'patients'){ ?>	
	<div class="notice notice-info">
		<p><?php _e('Fields with an asterisk are hidden/private fields and only visible to logged in users, not visible to the public.', 'shapeSpace'); ?></p>
	</div>
	
<?php }
}
add_action('admin_notices', 'shapeSpace_custom_admin_notice');

function change_publish_btn_txt() {
	if($_GET['post_type'] == 'patients'){
		echo "<script type='text/javascript'>jQuery(document).ready(function(){
			jQuery('.publish a').contents()
			.filter(function() { return this.nodeType === 3; })
			.replaceWith('Active ');
			jQuery('.draft a').contents()
			.filter(function() { return this.nodeType === 3; })
			.replaceWith('Inactive ');
		});</script>";
	}
}
add_action('admin_footer', 'change_publish_btn_txt', 99);

function set_post_title( $post ) {
    global $post;

    if( get_post_type() != 'patients' || $post->post_status != 'auto-draft' )
        return;

    $title = $post->ID;

    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#title").val("<?php echo $title; ?>");
    });
    </script>
    <?php
} // set_post_title
add_action( 'edit_form_after_title', 'set_post_title' );

function restrict_patients_by_procedure() {
    global $typenow;
    $post_type = 'patients'; // change HERE
    $taxonomy = 'procedure'; // change HERE
    if ($typenow == $post_type) {
        $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy' => $taxonomy,
            'name' => $taxonomy,
            'orderby' => 'name',
            'selected' => $selected,
            'show_count' => false,
            'hide_empty' => true,
			'value_field' => 'slug',
        ));
    };
}

add_action('restrict_manage_posts', 'restrict_patients_by_procedure');

function change_canonical_url( $url ){
	if(s45_is_gallery_home()){
		$options = get_option('s45_options');
		return get_bloginfo('url').'/'.$options['gallery_slug']; // Return canonical URL for post #2.
	}
	return $url;
}
add_filter('aioseop_canonical_url','change_canonical_url', 10, 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );