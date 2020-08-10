<?php 
get_header('inner'); ?>
<?php
$term_id = get_queried_object()->term_id;
$options = get_option( 's45_options' );
?>
<div class="back-main-container">
	<!--header-->
	<header>
		<div class="main-header">
			<div class="col-xs-12 col-sm-5 col-md-5 pull-right backpage-head-right">
				<!-- <div class="mobi-logo visible-xs"> <a href="<//?php echo home_url('/'); ?>"><img src="<//?php bloginfo('template_directory'); ?>/images/logo.png" alt="Chicago Breast & Body Aesthetics"></a> </div> -->
				<div class="lady-img hidden-xs"><?php if($image[0]) { ?><img src="<?php echo $image[0]; ?>" alt="Model"> <?php } ?></div>
				<!-- <div class="head-model-text hidden-xs">Model</div> -->
				<div class="social-top hidden-xs">
					<?php dynamic_sidebar( 'social_icon' ); ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-7 col-md-7 pull-left backpage-head-lft">
				 <!-- <div class="logo hidden-xs"><a href="<//?php echo home_url('/'); ?>"><img src="<//?php bloginfo('template_directory'); ?>/images/logo.png" alt="Chicago Breast & Body Aesthetics"></a></div> -->
				<div class="top-wel-text">
				<?php dynamic_sidebar( 'header-widget' ); ?>
				</div>
			</div>
		</div>
	</header>
	<!--header-->
	
	<section class="gallery-content back-bot-cont-sec">
	
	<div class="breast-title-sec desktop-view">
		<h1><?php echo single_cat_title( '', false ); ?></h1>
		<div class="top-home-btn pull-right">
			<a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'].'/'; ?>"><i class="fa fa-th"></i>Gallery Home</a>
		</div>
	</div>
	<div class="breast-title-sec mobile-view">
		<div class="top-home-btn">
			<a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'].'/'; ?>"><i class="fa fa-th"></i>Gallery Home</a>
		</div>
		<h1><?php echo single_cat_title( '', false ); ?></h1>
	</div>
<?php if ( term_description() ) echo term_description();?>
<div class="cases-area">
	<div class="row">
		<div data-interval="false" class="all-case-box-sec">
			<ul class="">
<?php
$patient_number = 1;
// Get contact page slug
global $wpdb;
//query_posts( $query_string.'&meta_key=featurewithincat&meta_value=1&orderby=date&order=DESC' );
//echo $GLOBALS['wp_query']->request;

$fquery = "SELECT SQL_CALC_FOUND_ROWS wp_posts.* FROM {$wpdb->posts} wp_posts
LEFT JOIN {$wpdb->term_relationships} wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
INNER JOIN {$wpdb->postmeta} wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id )
WHERE 1=1 AND ( wp_term_relationships.term_taxonomy_id IN ($term_id) ) AND ( ( wp_postmeta.meta_key = 'featurewithincat' AND wp_postmeta.meta_value = '1' ) )
AND wp_posts.post_type = 'patients' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'private')
GROUP BY wp_posts.ID
ORDER BY CAST(SUBSTR(wp_posts.post_title FROM 1) AS UNSIGNED) DESC LIMIT 0, 1000";
$featured_patients = $wpdb->get_results($fquery, OBJECT);
$featured_ids = array();
if(!empty($featured_patients)) :
	$h = 0;
	foreach ($featured_patients as $post) :
		setup_postdata($post);
		$hideonlive = get_post_meta($post->ID, 'hideonlive', true);
				$perma = get_permalink();
				$perma_arr = explode('/',rtrim($perma,'/'));
				$po_id = end($perma_arr);
				//print_r($post);
				$link = get_bloginfo('url').'/'.$options['gallery_slug'].'/'.$wp_query->queried_object->slug.'/'.$po_id.'/';
		if ( $hideonlive != 1):
			$featured_ids[] = $post->ID;
	?>
	<li class="li_res item id-<?php echo the_title(); ?>">
		<div class="case-box-cont">
			<div class="cas-title"> Case<span><a href="<?php echo $link;?>">#<?php echo the_title(); ?></a></span></div>
			<?php 
			$attachments = get_posts( array(
				'post_type' => 'attachment',
				'posts_per_page' => 2,
				'post_parent' => get_the_ID(),
				//'exclude'     => get_post_thumbnail_id(),
				'orderby' => 'menu_order',
				'order' => 'ASC'
			) );

			if ( $attachments ) : ?>
		
			<!-- enclose patient photos -->
			<div class="case-pics aa">
				<a href="<?php echo $link;?>">
				<?php // begin individual patient photo //
				$c=1;
				foreach ( $attachments as $attachment ) {
					if ($c == 5) break;
					$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
					//$img = wp_get_attachment_image_src( $attachment->ID, 'patient-thumb' );
					$img = $attachment->guid;
					
					if(strstr($img, 'photogallery')){
						//Step 2: uncomment this one after Step 1
						$img = str_replace('.jpg','-200x200.jpg',$img);
						
						//STEP 1: uncomment this section and click on every procedure category
						//so it generate the 200x200 thumbnails
						//As we have downloaded full size images when importing, so this is manual process							
						/*$path = parse_url($img, PHP_URL_PATH);
						$path = $_SERVER['DOCUMENT_ROOT'].$path;
						echo '<span style="display:none;">'.$path.'</span>';
						$update_image = wp_get_image_editor( $path );
						if ( ! is_wp_error( $update_image ) ) {
							$update_image->resize( 200, 200, true );
							$update_image->save();
						}else {
							$error_string = $update_image->get_error_message();
							echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
						}*/
						//Step 1: ends here
					}else {
						$attachment_img = wp_get_attachment_image_src( $attachment->ID, 'patient-thumb' );
						$img = $attachment_img[0];
					}
					
					//echo $img;exit;
					$before_after = '';
					switch ($c) {
						case 1:
							$before_after = "Before";
							break;
						case 2:
							$before_after = "After";
							break;
						case 3:
							$before_after = "Before";
							break;
						case 4:
							$before_after = "After";
							break;
					}
					?>
					<div class="<?php echo strtolower($before_after); ?>-pic bb height<?php echo $h; ?>">
						<div class="bef-aft-img">
							<img src="<?php echo $img; ?>" alt="<?php echo s45_generate_alt_tag(get_the_ID()); ?> - Case <?php echo the_title(); ?> - <?php echo $before_after; ?>">
						</div>
						<span><?php echo $before_after; ?></span>
					</div>
					<?php
					$c++; } ?>
				</a>
			</div>
		
		<?php endif; ?>	
		<div class="view-case-btn"> <a href="<?php echo $link;?>">View Case Details</a> </div>
		</div>
	</li>
	<?php $h++;$patient_number++;endif;
	endforeach;
?>
<?php endif; ?>



<?php
// Get contact page slug
$args_new = array(
	'post_type' => 'patients',
    'orderby'    => 'menu_order',
	'order'      => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'featurewithincat', 
			'value' => '1', 
			'compare' => '=',
		),
	), 
);
/*$ids = array();
$my_query = new WP_Query($args_new); // fetching posts having featured = yes
if ( $my_query->have_posts() ) {
    while ( $my_query->have_posts() ) {
        $my_query->the_post();
        $ids[] = $post->ID; // building array of post ids
    }
}
wp_reset_query(); // reset the query
$patient_number = 1;*/
$comma_separated_ids = implode(",", $featured_ids);

echo '<span style="display:none;">featured ids';print_r($comma_separated_ids);echo '</span>';
$cond = "";
if($comma_separated_ids!='')
	$cond = " AND wp_posts.ID NOT IN ($comma_separated_ids)";

$aquery = "SELECT SQL_CALC_FOUND_ROWS wp_posts.* FROM {$wpdb->posts} wp_posts 
			LEFT JOIN {$wpdb->term_relationships} wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) 
			WHERE 1=1 $cond
			AND ( wp_term_relationships.term_taxonomy_id IN ($term_id) ) 
			AND wp_posts.post_type = 'patients' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'private') 
			GROUP BY wp_posts.ID
			ORDER BY CAST(SUBSTR(wp_posts.post_title FROM 1) AS UNSIGNED) DESC LIMIT 0, 1000";
            
          
$all_patients = $wpdb->get_results($aquery, OBJECT);

if(!empty($all_patients)) :
			$h = 0;
	    	foreach ($all_patients as $post) :
				setup_postdata($post);
				$hideonlive = get_post_meta($post->ID, 'hideonlive', true);
				$perma = get_permalink();
				$perma_arr = explode('/',rtrim($perma,'/'));
				$po_id = end($perma_arr);
				//print_r($post);
				$link = get_bloginfo('url').'/'.$options['gallery_slug'].'/'.$wp_query->queried_object->slug.'/'.$po_id.'/';
				if ( $hideonlive != 1):
			?>
			
			<li class="li_res item">
				<div class="case-box-cont">
					<div class="cas-title"> Case<span><a href="<?php echo $link;?>">#<?php echo the_title(); ?></a></span></div>
					<?php 
					$attachments = get_posts( array(
						'post_type' => 'attachment',
						'posts_per_page' => 2,
						'post_parent' => get_the_ID(),
						//'exclude'     => get_post_thumbnail_id(),
						'orderby' => 'menu_order',
						'order' => 'ASC'
					) );

					if ( $attachments ) : ?>
				
					<!-- enclose patient photos -->
					<div class="case-pics aa">
						<a href="<?php echo $link;?>">
						<?php // begin individual patient photo //
						$c=1;
						foreach ( $attachments as $attachment ) {
							if ($c == 5) break;
							$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
							//$img = wp_get_attachment_image_src( $attachment->ID, 'patient-thumb' );
							$img = $attachment->guid;
							if(strstr($img, 'photogallery')){
								//Step 2: uncomment this one after Step 1
								$img = str_replace('.jpg','-200x200.jpg',$img);
								
								//STEP 1: uncomment this section and click on every procedure category
								//so it generate the 200x200 thumbnails
								//As we have downloaded full size images when importing, so this is manual process							
								/*$path = parse_url($img, PHP_URL_PATH);
								$path = $_SERVER['DOCUMENT_ROOT'].$path;
								echo '<span style="display:none;">'.$path.'</span>';
								$update_image = wp_get_image_editor( $path );
								if ( ! is_wp_error( $update_image ) ) {
									$update_image->resize( 200, 200, true );
									$update_image->save();
								}else {
									$error_string = $update_image->get_error_message();
									echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
								}*/
								//Step 1: ends here
							}else {
								$attachment_img = wp_get_attachment_image_src( $attachment->ID, 'patient-thumb' );
								$img = $attachment_img[0];
							}
							$before_after = '';
							switch ($c) {
								case 1:
									$before_after = "Before";
									break;
								case 2:
									$before_after = "After";
									break;
								case 3:
									$before_after = "Before";
									break;
								case 4:
									$before_after = "After";
									break;
							}
							?>
							<div class="<?php echo strtolower($before_after); ?>-pic bb height<?php echo $h; ?>">
								<div class="bef-aft-img">
									<img src="<?php echo $img; ?>" alt="<?php echo s45_generate_alt_tag(get_the_ID()); ?> - Case <?php echo the_title() ?> - <?php echo $before_after; ?>">
								</div>
								<span><?php echo $before_after; ?></span>
							</div>
		                    <?php
		                    $c++; } ?>
						</a>
					</div>
				
				<?php endif; ?>	
				<div class="view-case-btn"> <a href="<?php echo $link;?>">View Case Details</a> </div>
				</div>
			</li>
			<?php $h++;$patient_number++;endif;
			endforeach; ?>
<?php endif; ?>
		</ul>
	</div>
</div>
</div>
	</section>
</div>
<?php get_footer(); ?>