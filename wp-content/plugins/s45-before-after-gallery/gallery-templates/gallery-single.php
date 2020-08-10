<?php 
get_header('inner');

$terms = wp_get_object_terms( $post->ID , 'procedure' );
$term = get_term_by ( 'id', $terms[0]->term_id, 'procedure' );
$term_id = $terms[0]->term_id;
$termparent = get_term_by ( 'id', $term->parent, 'procedure' );
$options = get_option( 's45_options' );
$surgeoninfo = get_post_meta( $post->ID, 'surgeoninfo', true );
?>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
<div class="back-main-container">
	<!--header-->
	<header>
		<div class="main-header">
			<div class="col-xs-12 col-sm-5 col-md-5 pull-right backpage-head-right">
				<!-- <div class="mobi-logo visible-xs"> <a href="<//?php echo home_url('/'); ?>"><img src="<//?php bloginfo('template_directory'); ?>/images/logo.png" alt="Chicago Breast & Body Aesthetics"></a> </div> -->
				<!-- <div class="lady-img hidden-xs"><//?php if($image[0]) { ?><img src="<//?php echo $image[0]; ?>" alt="Model"> <//?php } ?></div>
				<div class="head-model-text hidden-xs">Model</div> -->
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
		<div class="cases-detial-area">
		<div class="case-detial-box-sec">
		
<?php if ( have_posts() ) : ?>
<div class="case-detail-box-cont">
    	<?php while ( have_posts() ) : the_post(); ?>
		
		<?php
		$feature_ids = array();
		$ids = array();
		// get_posts in same custom taxonomy
		$fquery = "SELECT SQL_CALC_FOUND_ROWS wp_posts.* FROM {$wpdb->posts} wp_posts
		LEFT JOIN {$wpdb->term_relationships} wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
		INNER JOIN {$wpdb->postmeta} wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id )
		WHERE 1=1 AND ( wp_term_relationships.term_taxonomy_id IN ($term_id) ) AND ( ( wp_postmeta.meta_key = 'featurewithincat' AND wp_postmeta.meta_value = '1' ) )
		AND wp_posts.post_type = 'patients' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'private')
		GROUP BY wp_posts.ID
		ORDER BY CAST(SUBSTR(wp_posts.post_title FROM 1) AS UNSIGNED) DESC LIMIT 0, 1000";
		$postlist = $wpdb->get_results($fquery, OBJECT);

		// get ids of posts retrieved from get_posts
		foreach ($postlist as $thepost) {
		   $feature_ids[] = $thepost->ID;
		}
		
		global $wpdb;
		$aquery = "SELECT SQL_CALC_FOUND_ROWS wp_posts.* FROM {$wpdb->posts} wp_posts 
			LEFT JOIN {$wpdb->term_relationships} wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) 
			WHERE 1=1 $cond
			AND ( wp_term_relationships.term_taxonomy_id IN ($term_id) ) 
			AND wp_posts.post_type = 'patients' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'private') 
			GROUP BY wp_posts.ID
			ORDER BY CAST(SUBSTR(wp_posts.post_title FROM 1) AS UNSIGNED) DESC LIMIT 0, 1000";
		$postlist_two = $wpdb->get_results($aquery, OBJECT);

		// get ids of posts retrieved from get_posts
		foreach ($postlist_two as $thepost) {
			if(!in_array($thepost->ID,$feature_ids))
				$ids[] = $thepost->ID;
		}
		
		$final_ids = array_merge($feature_ids,$ids);
		//echo '<pre>';print_r($final_ids);
		
		$final_array = array();
		for($f=0;$f<count($final_ids);$f++){
			$hideonlive = get_post_meta($final_ids[$f], 'hideonlive', true);
			//echo $final_ids[$f].' '.$hideonlive.'<br />';
			if ( $hideonlive != 1){
				$final_array[] = $final_ids[$f];
			}
		}
		
		//print_r($final_array);exit;
		
		// get and echo previous and next post in the same taxonomy        
		$thisindex = array_search($post->ID, $final_array);
		$previd = $final_array[$thisindex-1];
		$nextid = $final_array[$thisindex+1];
		$plink = $nlink = '';
		if ( !empty($previd) ) {
		   $plink = '<a rel="prev" href="' . get_permalink($previd). '">« Previous Case</a>';
		}
		if ( !empty($nextid) ) {
		   $nlink = '<a rel="next" href="' . get_permalink($nextid). '">Next Case »</a>';
		}
		?>

		<div class="single-patient-navigation">
			<?php echo $plink; ?>
			<div class="top-home-btn">
				<a href="<?php echo get_bloginfo('url').'/'.$options['gallery_slug'].'/'; ?>"><i class="fa fa-th"></i>Gallery Home</a>
			</div>
			<?php echo $nlink; ?>
		</div>
		<!--case-detail-right-->
		<div class="case-detail-right">
    	    <div class="row">	
					<?php $attachments = get_posts( array(
					'post_type' 	 => 'attachment',
					'numberposts' 	 => 50,
					'posts_per_page' => -1,
					'post_parent' 	 => $post->ID,
					//'exclude'     	 => get_post_thumbnail_id(),
					'orderby'     	 => 'menu_order post_date',
					'order'       	 => 'ASC'
				) );
				?>
				
				<?php
				//echo count($attachments);
				if ( $attachments ) {
					?><!--<?php //print_r($attachments);?>--><?php
					$c=1;
					$img_before = array();$img_after = array();
					?>
					<?php
					foreach ( $attachments as $attachment ) {
						$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
						//$img = wp_get_attachment_image_src( $attachment->ID, 'patient-normal' ); 
						$img = $attachment->guid;
						if(!strstr($img, '/photogallery/')){
							$attachment_img = wp_get_attachment_image_src( $attachment->ID, 'full' );
							$img = $attachment_img[0];
						}
						?>
						
						<?php 
						switch ($c) {
							case ( $c % 2 == 0 ) :
								$img_after[] = $img;
								break;
							default:
								$img_before[] = $img;
								break;
						}
						$c++;
					}
					//echo '<pre>';print_r($img_before);print_r($img_after);echo '</pre>';
					?>
					<div class="case-pics  asaaa">

						<div class="before-pic height">
						<div class="bef-aft-img">
							<a class="before-pic-a" data-fancybox="gallery" href="<?php echo $img_before[0] ?>"><img class="main-before-img-<?php the_title();?>" src="<?php echo $img_before[0] ?>" alt="<?php echo $term->name;?> Patient Photo - Case <?php the_title();?> - before view-"></a>
						</div>
						<span>Before</span>
						</div>

						<!--before-pic-->
						<div class="after-pic height">
						<div class="bef-aft-img">
							<a class="after-pic-a" data-fancybox="gallery" href="<?php echo $img_after[0] ?>"><img class="main-after-img-<?php the_title();?>" src="<?php echo $img_after[0] ?>" alt="<?php echo $term->name;?> Patient Photo - Case <?php the_title();?> - after view"></a>
						</div>
						<span>After</span>
						</div>

					<!--after-pic-->
					</div>
					<!--case-pics-->
					<div class="bot-thumb-sec">
						<ol class="casethumb-c-<?php the_title();?>">
					<?php
					for($i=0;$i<count($img_before);$i++){
					?>
						<li class="casethumb-<?php the_title();?>-<?php echo $i;?>">
							<a data-thumb="<?php echo $i; ?>" data-case="<?php the_title();?>" data-update_before=".main-before-img" data-update_after=".main-after-img" data-before="<?php echo $img_before[$i] ?>" data-after="<?php echo $img_after[$i] ?>" href="javascript:void(0);" onclick="updateImageFromThumb(this);">
							<div class="before-pic">
								<div class="bef-aft-img">
									<img src="<?php echo $img_before[$i] ?>" alt="<?php echo $term->name;?> Patient Photo - Case <?php the_title();?> - before view-<?php echo $i;?>">
								</div>
							</div>
							<!--before-pic-->
							<div class="after-pic">
								<div class="bef-aft-img">
									<img src="<?php echo $img_after[$i] ?>" alt="<?php echo $term->name;?> Patient Photo - Case <?php the_title();?> - after view-<?php echo $i;?>">
								</div>
							</div>
							<!--after-pic-->
							</a>
							<div class="thumb-case-view">
							<a data-thumb="0" data-case="<?php the_title();?>" data-update_before=".main-before-img" data-update_after=".main-after-img" data-before="<?php echo $img_before[$i] ?>" data-after="<?php echo $img_after[$i] ?>" href="javascript:void(0);" onclick="updateImageFromThumb(this);">
								View - <?php echo $i+1; ?> of <?php echo count($img_before); ?>					</a>
							</div>
						</li>
					<?php
					}
					
				?>
					</ol>
				</div>
				<?php
				}
				?>
			<!--bot-thumb-sec-->
    	    </div>
    	</div>
		<div class="case-detail-left">
    	    <div class="row">
    		<div class="case-detail-text">
				<div class="cas-dtl-ttl"> Case <span>#<?php the_title(); ?></span></div>
		        <?php the_content(); ?>
				<?php
				$patientheight = get_post_meta( $post->ID, 'patientheight', true );
				$patientweight = get_post_meta( $post->ID, 'patientweight', true );
				$patientage = get_post_meta( $post->ID, 'patientage', true );
				$patientimplantsizeleft = get_post_meta( $post->ID, 'patientimplantsizeleft', true );
				$patientimplantsizeright = get_post_meta( $post->ID, 'patientimplantsizeright', true );
				$patientcupsizebefore = get_post_meta( $post->ID, 'patientcupsizebefore', true );
				$patientcupsizeafter = get_post_meta( $post->ID, 'patientcupsizeafter', true );
				?>
				<?php
				if($patientheight!='') {
				?>
				<p><strong>Height:</strong> <?php echo $patientheight; ?></p>
				<?php } ?>
				<?php
				if($patientweight!='') {
				?>
				<p><strong>Weight:</strong> <?php echo $patientweight; ?></p>
				<?php } ?>
				<?php
				if($patientage!='') {
				?>
				<p><strong>Age:</strong> <?php echo $patientage; ?></p>
				<?php } ?>
				<?php
				if($patientimplantsizeleft!='') {
				?>
				<p><strong>Implant Size Left:</strong> <?php echo $patientimplantsizeleft; ?></p>
				<?php } ?>
				<?php
				if($patientimplantsizeright!='') {
				?>
				<p><strong>Implant Size Right:</strong> <?php echo $patientimplantsizeright; ?></p>
				<?php } ?>
				<?php
				if($patientcupsizebefore!='') {
				?>
				<p><strong>Cup Size Before:</strong> <?php echo $patientcupsizebefore; ?></p>
				<?php } ?>
				<?php
				if($patientcupsizeafter!='') {
				?>
				<p><strong>Cup Size After:</strong> <?php echo $patientcupsizeafter; ?></p>
				<?php } ?>
				<p><?php echo $options['patient_page_default'];?></p>
				<?php 
					if($surgeoninfo=='')
						$surgeoninfo = $options['doctor_name'];
				?>
    		    <!--<div class="patient-age-sec"><p>Surgeon: <span><?php //echo $surgeoninfo;?></span></p></div>-->
    		    <div class="cont-btn">
    			<a href="<?php echo get_bloginfo('url').'/'.$options['contact_slug'];?>">Contact Us</a>
    		    </div>
    		</div>
    	    </div>
    	</div>
		<?php endwhile; ?>
</div>
<script>
    function updateImageFromThumb(elm) {
	var caseid=jQuery(elm).data('case');
	var thumb=jQuery(elm).data('thumb');
	var after = jQuery(elm).data('after');
	var before = jQuery(elm).data('before');
	//var bfralt = jQuery(elm).children(".befor-pic img").attr("alt");
	console.log('yes');
	//console.log(bfralt);
	var update_after = jQuery(elm).data('update_after');
	var update_before = jQuery(elm).data('update_before');
	var thumbclasscontainer='.casethumb-c-'+caseid;
	var thumbclass='.casethumb-'+caseid+'-'+thumb;
	update_after=update_after+'-'+caseid;
	update_before=update_before+'-'+caseid;
	jQuery(thumbclasscontainer).find('li').removeClass('active');
	jQuery(thumbclass).addClass('active');
	jQuery(update_after).attr("src", after);
	jQuery(update_before).attr("src", before);
	
	jQuery('.before-pic-a').attr("href", before);
	jQuery('.after-pic-a').attr("href", after);
	jQuery("div.case-detail-right.pull-right  div  div.case-pics .height").height('auto');
	// var hh = jQuery("li.item.caseitem.active div  div.col-xs-12.col-sm-7.col-md-8.case-detail-right.pull-right  div  div.case-pics .height").height();
	// console.log(hh);
	//jQuery("li.item.caseitem.active div  div.col-xs-12.col-sm-7.col-md-8.case-detail-right.pull-right  div  div.case-pics .height").height(hh+50);
	//qequalheight(jQuery(update_after).parent().parent());
    }
	
	equalheight = function(container){

		var currentTallest = 0,
			currentRowStart = 0,
			rowDivs = new Array(),
			$el,
			topPosition = 0;
		jQuery(container).each(function() {

			$el = jQuery(this);
			jQuery($el).height('auto');
			topPostion = $el.position().top;

			if (currentRowStart != topPostion) {
				for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest+50);
				}
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);
			} else {
				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest+50);
			}
		});
	}

	jQuery(window).load(function() {
		//equalheight('div.case-detail-right  div  div.case-pics .height');
	});


	jQuery(window).resize(function(){
		//equalheight('div.case-detail-right  div  div.case-pics .height');
	});
</script>
<?php else : ?>
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php endif; ?>
	</div>
</div>
</section>
</div>
<?php get_footer();