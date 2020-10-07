<?php
$limit = $post_related_posts;
$postIDs = array( $post->ID );
$related = '';
$cats = wp_get_post_categories( $post->ID );

$catIDs = array( );
if (empty($cats)){
	$portfolio_category_terms = wp_get_object_terms( $post->ID,  'portfolio_category' );
	foreach ( $portfolio_category_terms as $cat ) $catIDs[] = $cat->term_id;
	$what = "portfolio";
} else {
	foreach ( $cats as $cat ) $catIDs[] = $cat;
	$what = "post";
}

$args = array(
			'category__in'          => $catIDs,
			'post__not_in'          => $postIDs,
			'posts_per_page'       => $limit,
			'ignore_sticky_posts'   => 1,
			'orderby'               => 'rand',
			'tax_query'             => array(
										array(
										'taxonomy'  => 'post_format',
										'field'     => 'slug',
										'terms'     => array(
										'post-format-link',
										'post-format-status',
										'post-format-aside',
										'post-format-quote' ),
										'operator' => 'NOT IN'
										)
									)
);

$args_portfolio = array (
					'post_type'              => array( 'portfolio_item' ),
					'post_status'            => array( 'publish' ),
					'post__not_in'          => $postIDs,
					'orderby'                => 'rand',
					'posts_per_page'        => "$limit",
					'tax_query' => array(
                            array(      
                                'taxonomy' => 'portfolio_category',
                                'field' => 'id',
                                'terms' => $catIDs,
                             )
                        ),

);

$post_related_posts_layout = brankic_of_get_option("post_related_posts_layout", brankic_of_get_default("post_related_posts_layout"));
$post_related_posts_excerpt = brankic_of_get_option("post_related_posts_excerpt", brankic_of_get_default("post_related_posts_excerpt"));

$post_related_posts_use_duotone = brankic_of_get_option("post_related_posts_use_duotone", brankic_of_get_default("post_related_posts_use_duotone"));
$post_related_posts_duotone = brankic_of_get_option("post_related_posts_duotone", brankic_of_get_default("post_related_posts_duotone"));
$post_related_posts_duotone_color = brankic_of_get_option("post_related_posts_duotone_color", brankic_of_get_default("post_related_posts_duotone_color"));

$portfolio_item_related_posts_use_duotone = brankic_of_get_option("portfolio_item_related_posts_use_duotone", brankic_of_get_default("portfolio_item_related_posts_use_duotone"));
$portfolio_item_related_posts_duotone = brankic_of_get_option("portfolio_item_related_posts_duotone", brankic_of_get_default("portfolio_item_related_posts_duotone"));
$portfolio_item_related_posts_duotone_color = brankic_of_get_option("portfolio_item_related_posts_duotone_color", brankic_of_get_default("portfolio_item_related_posts_duotone_color"));

if ($what == "portfolio"){
	$post_related_posts_use_duotone = $portfolio_item_related_posts_use_duotone;
	$post_related_posts_duotone = $portfolio_item_related_posts_duotone;
	$post_related_posts_duotone_color = $portfolio_item_related_posts_duotone_color;
}

if ($post_related_posts_duotone_color != "" && $post_related_posts_use_duotone == "yes" && $post_related_posts_duotone == "custom") {
	$post_related_posts_duotone = 'duotone single-color';
}

global $wp_query, $post;
$temp = $wp_query;
$temp_post = $post;

if ($what == "portfolio") $args = $args_portfolio;

$rel_query = new WP_Query( $args );
if ( $rel_query->have_posts() ) {

if ($single_post_style == "fullwidth_sticky") $related_class = "bg_related_posts " . $single_post_left_right_padding . " " . $single_post_left_right_margin . "" . $tablet_class; else $related_class = "";
?> 
							<section class="post-related-posts <?php echo esc_attr($related_class); ?>">
							
							<?php if ($single_post_style == "fullwidth_sticky") { ?>
							
							<div class="col-10 auto">
							
							<?php } ?>
                                
                                <h6><strong><?php esc_html_e('You may also like', 'myriadwp'); ?></strong></h6><br>
                                
                                <div class="related-posts-wrap <?php echo esc_attr($post_related_posts_meta_layout . " " . $post_related_posts_layout); ?> col<?php echo esc_attr($post_related_posts); ?>">
<?php
while ( $rel_query->have_posts() ) {
$rel_query->the_post();
$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'brankic-512-384' ); 
if (!(isset($featured_image_array[0]))) $featured_image_array[0] = "";
$featured_image = $featured_image_array[0];	
?>
	
									<article>
                                            
                                        <div class="post-entry">
                                            
											<?php if ($featured_image != "") { ?>
											
                                            <div class="post-media">
                                                <div class="media-holder <?php echo esc_attr($post_related_posts_duotone); ?>">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title(); ?>" <?php echo brankic_srcset(get_post_thumbnail_id(), 'brankic-512-384'); ?>></a>
                                                </div><!-- POST-MEDIA-HOLDER -->
                                            </div><!-- POST-MEDIA -->
											
											<?php } ?>
                                            
                                            <div class="post-meta">
                                                <p>
                                                    <span><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></span>
													<span><?php the_category(', '); ?></span>
                                                </p> 
												
												<header class="post-title">
													<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>					
												</header><!-- POST-TITLE -->
												
												<?php if ($post_related_posts_excerpt != "no") { ?>
												<span class="related-posts-excerpt">
												<?php 
													if ($post_related_posts_excerpt == "full_excerpt") the_excerpt(); 
													if ($post_related_posts_excerpt == "10") brankic_excerpt(10, true, true); 
													if ($post_related_posts_excerpt == "20") brankic_excerpt(20); 
													if ($post_related_posts_excerpt == "30") brankic_excerpt(30); 
												
												?>
												</span>
												<?php } ?>
											
											</div><!-- POST-META -->
                                            
                                            
                                            
                                        </div><!-- POST-ENTRY -->
                                        
                                    </article>

	<?php

}
?>
								</div><!-- RELATED POSTS WRAP -->
								
								<?php if ($single_post_style == "fullwidth_sticky") { ?>
								
								</div><!-- COL 10 AUTO -->
								
								<?php } ?>
                                        
                            </section><!--END POST-RELATED POSTS-->



<?php 
}
wp_reset_postdata();
$wp_query = $temp;  //reset back to original query
$post = $temp_post;

?>
