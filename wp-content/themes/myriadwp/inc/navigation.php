<?php 

global $brankic_allowedposttags;

$id = sprintf("%s", uniqid());
$navigation_css = "";

$post_navigation_all_link = brankic_of_get_option("post_navigation_all_link", brankic_of_get_default("post_navigation_all_link"));
$portfolio_item_navigation_all_link = brankic_global_or_local("portfolio_item_navigation_all_link");

if (is_archive() || is_home()){
	
if (class_exists("Brankic_Shortcodes")) {
	if (is_page()) $blog_navigation = $navigation; else $blog_navigation = ""; 
} else { 
	$blog_navigation = "numeric_pagination";
}

$blog_navigation_bg_color = brankic_of_get_option("archive_navigation_bg_color", brankic_of_get_default("archive_navigation_bg_color"));

if ($blog_navigation == "numeric_pagination") {

	if (!(isset($cat_query))) $cat_query = $wp_query; 
	
	if( $cat_query->is_singular ) return;
	
    /** Stop execution if there's only 1 page */
    if( $cat_query->max_num_pages <= 1 )
        return;
	
	if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
	elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
	else { $paged = 1; }
	
    $max   = intval( $cat_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
	
	$page_next = $paged + 1;
	
	
 
    ?><div class="wp-pagenavi">
    <?php
	/** Previous Post Link */
    if ( get_previous_posts_link() ) echo get_previous_posts_link('<i class="fa fa-angle-left"></i>' . esc_html__('Prev', 'myriadwp'));
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
		
		if ($paged == 1) $class = ' class = "current"' ;  else $class = "";
 
        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<span class="expand">...</span>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
		
		if ($paged == $link) $class = ' class="current"'; else $class = "";
        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<span class="expand">...</span>' . "\n";
 
		if ($paged == $max) $class = ' class="current"'; else $class = "";
        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Posts Link */
	 if ($page_next <= $max) printf( '<a%s href="%s">%s</a>' . "\n", " class='page-next'", esc_url( get_pagenum_link( $page_next ) ), 'Next<i class="fa fa-angle-right"></i>' );
    ?></div><?php
}

if ($blog_navigation == "old_new_simple") {
	if( $cat_query->is_singular ) return;
	
	if (is_home() || is_front_page()) $paged = get_query_var( 'page' ) ? absint( get_query_var( 'page' ) ) : 1;
	else $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	
	$max   = intval( $cat_query->max_num_pages );
	
	$next_page = $paged + 1;
	$prev_page = $paged - 1;
	
	$next_page_url = esc_url( get_pagenum_link( $next_page ));
	$prev_page_url = esc_url( get_pagenum_link( $prev_page ));
	
?>

<div <?php if ($blog_navigation_bg_color != "") { ?>data-bg-color="true"<?php } ?> class="post-navigation simple">
<?php if ( $prev_page_url != "" && $paged != 1) { ?> 

							<article class="prev">                                             
                                <a href="<?php echo esc_url($prev_page_url); ?>" class="page-prev"><span class="arrow"></span><span class="prev-post"> <?php esc_html_e('Newer posts', 'myriadwp') ?></span></a> 					
                        	</article><!--END ARTICLE-->                           
<?php } ?>                    

<?php if ( $next_page_url != "" && $paged != $max) { ?> 						
                            
							
							<article class="next">   
                                <a href="<?php echo esc_url($next_page_url); ?>" class="page-prev"><span class="prev-post"> <?php esc_html_e('Older posts', 'myriadwp') ?></span><span class="arrow"></span></a>                                    
                        	</article><!--END ARTICLE-->
            
	


<?php
}
?>
                         </div><!--END POST-NAVIGATION--> 
<?php
}

}

if (is_singular( array( 'post', 'portfolio_item' ) )){

$post_navigation_style = brankic_of_get_option("post_navigation_style", brankic_of_get_default("post_navigation_style"));

$post_navigation_text_color = brankic_of_get_option("post_navigation_text_color", brankic_of_get_default("post_navigation_text_color"));
$post_navigation_bg_color = brankic_of_get_option("post_navigation_bg_color", brankic_of_get_default("post_navigation_bg_color"));
$post_navigation_bg_color_opacity = brankic_of_get_option("post_navigation_bg_color_opacity", brankic_of_get_default("post_navigation_bg_color_opacity"));

$portfolio_item_navigation_style = brankic_global_or_local("portfolio_item_navigation_style");

$portfolio_item_navigation_text_color = brankic_global_or_local("portfolio_item_navigation_text_color");
$portfolio_item_navigation_bg_color = brankic_global_or_local("portfolio_item_navigation_bg_color");
$portfolio_item_navigation_bg_color_opacity = brankic_global_or_local("portfolio_item_navigation_bg_color_opacity");

//// DUOTONE
$post_navigation_duotone = brankic_of_get_option("post_navigation_duotone", brankic_of_get_default("post_navigation_duotone"));
$post_navigation_duotone_color = brankic_of_get_option("post_navigation_duotone_color", brankic_of_get_default("post_navigation_duotone_color"));

$portfolio_item_navigation_duotone = brankic_global_or_local("portfolio_item_navigation_duotone");
$portfolio_item_navigation_duotone_color = brankic_global_or_local("portfolio_item_navigation_duotone_color");

if (is_singular("portfolio_item")) {
	$post_navigation_duotone = $portfolio_item_navigation_duotone;
	$post_navigation_duotone_color = $portfolio_item_navigation_duotone_color;
}

if ($post_navigation_duotone_color != "") {
	$post_navigation_duotone = 'duotone single-color';
}

//////////////////////////////////////////////////////////


	
	if (is_singular("post")) $tax = "category";
	if (is_singular("portfolio_item")) {
		$tax = "portfolio_category";
		$post_navigation_style = $portfolio_item_navigation_style;
		$post_navigation_text_color = $portfolio_item_navigation_text_color;
		$post_navigation_bg_color = $portfolio_item_navigation_bg_color;
		$post_navigation_bg_color_opacity = $portfolio_item_navigation_bg_color_opacity;
		$post_navigation_all_link = $portfolio_item_navigation_all_link;
	}
	
	
	global $post;
	$next_post = get_next_post(true, "", $tax);
	$prev_post = get_previous_post(true, "", $tax);
	$adjacent_post = get_adjacent_post(false, "", true, $tax);
	

if ($post_navigation_style == "prev_next_bg_color_simple") {
?>
<div class="post-navigation extended" <?php if ($post_navigation_bg_color != "") { ?>data-bg-color="true"<?php } ?>>
                        
                            <article class="prev">       

<?php if (!empty( $prev_post )) { ?>
                                        
                                <?php 
									previous_post_link('%link', '<span class="arrow"></span><span class="prev-post">' . esc_html__('Previous', 'myriadwp') . '</span>');
								?>
								
<?php } ?> 
                                    
                        	</article><!--END ARTICLE-->
                                    

<?php if (!empty( $prev_post ) || !empty( $next_post )) { ?>                       
								<article class="all">     
                                        
									<a href="<?php if ($post_navigation_all_link == "") echo get_home_url(); else echo get_permalink($post_navigation_all_link); ?>">
                                	<span></span><span></span><span></span>
                                </a>
                                        
                            </article><!--END ARTICLE ALL-->
<?php } ?>
						
                            <article class="next"> 

<?php if (!empty( $next_post )) { ?>							
                                
							<?php 
								next_post_link('%link', '<span class="next-post">' . esc_html__('Next', 'myriadwp') . '</span><span class="arrow"></span>');
                            ?>   
<?php } ?>
                        	</article><!--END ARTICLE-->
            

</div><!--END POST-NAVIGATION-->
<?php
}
?>

<?php
if ($post_navigation_style == "prev_next_bg_color_title_simple" && (!empty( $prev_post ) && !empty( $next_post ))) {
?>
<div class="post-navigation extended text" <?php if ($post_navigation_bg_color != "") { ?>data-bg-color="true"<?php } ?>>
                         
                            <article class="prev">       

<?php if (!empty( $prev_post )) { ?> 
                                        
                                <?php 
									previous_post_link('%link', '<span>' . esc_html__('Previous', 'myriadwp') . ' </span><h3><span class="prev-post">%title</span></h3><span class="arrow"></span>');
								?>
                                    
<?php } ?> 									
                        	</article><!--END ARTICLE-->
                                                           
							<article class="all">     
                                        
								<a href="<?php if ($post_navigation_all_link == "") echo get_home_url(); else echo get_permalink($post_navigation_all_link); ?>">
                                	<span></span><span></span><span></span>
                                </a>
                                        
                            </article><!--END ARTICLE ALL-->

						
                            <article class="next">   
<?php if (!empty( $next_post )) { ?>                                
							<?php 
								next_post_link('%link', '<span>' . esc_html__('Next', 'myriadwp') . '</span><h3><span class="next-post">%title</span></h3><span class="arrow"></span>');
                            ?>  
<?php } ?>							
                        	</article><!--END ARTICLE-->

</div><!--END POST-NAVIGATION-->
<?php
}
?>



<?php
if ($post_navigation_style == "only_next_simple") {
?>


<?php if (!empty( $adjacent_post )) { 
	$adjacent_post_id = $adjacent_post->ID;
	$adjacent_post_featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($adjacent_post_id), 'large' );
?>						
                        <div class="post-navigation solo">
                        
                            <article  class="next" data-radius="10"> 
                    
								<a href="<?php echo get_permalink( $adjacent_post->ID ); ?>" rel="next">
								
								<?php $html = '<div class="overlap-heading">
                                    
                                        <span>' . esc_html__('Next', 'myriadwp') . '</span>
                                        
                                        <div class="overlap-link">
                                        
                                            <div class="divider border right">
                                                <span></span>';
												
                                    if (is_singular( array( 'portfolio_item' ) )) $html .='            <div> ' . esc_html__('View case study', 'myriadwp') . '</div>';
									else $html .='            <div> ' . esc_html__('Read article', 'myriadwp') . '</div>';
									
                                    $html .= '    	</div><!--END DIVIDER-->
                                        
                                        </div><!--END OVERLAY LINK-->
                                        
                                    </div><!--END OVERLAY HEADING-->
                                        
                                    <div class="overlap-inner">
                                    
                                    	<h3>' . get_the_title( $adjacent_post->ID ) . '</h3>
                                    
                                    </div><!--END OVERLAY INNER-->'; ?>
					
								<?php 
								echo wp_kses($html, $brankic_allowedposttags);
								?>    
								</a>
                                        
                            </article><!--END ARTICLE NEXT-->
            
                        </div><!--END POST-NAVIGATION SOLO--> 	
<?php
}
}
?>

<?php
if ($post_navigation_style == "only_next_bg_image") {
?>


<?php if (!empty( $adjacent_post )) { 
	$adjacent_post_id = $adjacent_post->ID;
	$adjacent_post_featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($adjacent_post_id), 'brankic-1024-512' );
?>						
                        <div class="post-navigation solo bg-image">
                        
                            <article class="next"> 
							
								<div class="row-bg-wrap">
                                    <div class="inner-wrap <?php echo esc_attr($post_navigation_duotone); ?>"> 
									
										<img src="<?php echo esc_url($adjacent_post_featured_image_url[0]); ?>" <?php echo brankic_srcset(get_post_thumbnail_id($adjacent_post_id), "brankic-1024-512"); ?> alt="<?php echo get_the_title( $adjacent_post->ID ); ?>">
                                        <div class="row-bg background-color"></div>
                                    </div> 
                                </div>
								
								<a href="<?php echo get_permalink( $adjacent_post->ID ); ?>" rel="next">
                    
								<?php $html = '<div class="overlap-heading">';
                                    
                                      if (!empty( $next_post )) $html .=  '<span class="google_web_font_1">' . esc_html__('Next', 'myriadwp') . '</span>';
									  
									  else $html .=  '<span class="google_web_font_1">' . esc_html__('Prev', 'myriadwp') . '</span>';
                                        
                                      $html .=  '<div class="overlap-link">
                                        
                                            <div class="divider border right">
                                                <span></span>';
									
									if (is_singular( array( 'portfolio_item' ) )) $html .='            <div> ' . esc_html__('View case study', 'myriadwp') . '</div>';
									else $html .='            <div> ' . esc_html__('Read article', 'myriadwp') . '</div>';		
                                    
									$html .= '                         	</div><!--END DIVIDER-->
                                        
                                        </div><!--END OVERLAY LINK-->
                                        
                                    </div><!--END OVERLAY HEADING-->
                                        
                                    <div class="overlap-inner">
                                    
                                    	<h3>' . get_the_title( $adjacent_post->ID ) . '</h3>
                                    
                                    </div><!--END OVERLAY INNER-->'; ?>
					
								<?php 
								echo wp_kses($html, $brankic_allowedposttags);
								?>
								</a>
                                        
                            </article><!--END ARTICLE NEXT-->
            
                        </div><!--END POST-NAVIGATION EXTENDED--> 	
<?php
}
}
?>

<?php
if ($post_navigation_style == "prev_next_bg_image") {
?>


<?php if (!empty( $adjacent_post )) { 
	$prev_post_id = $prev_post->ID;
	$prev_post_featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($prev_post_id), 'brankic-1024-512' );
	$next_post_id = $next_post->ID;
	$next_post_featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($next_post_id), 'brankic-1024-512' );
?>						
                        <div class="post-navigation bg-image duo">                       
						
						<?php if (!empty( $prev_post )) { ?> 
						
							<article class="prev"> 
							
								<div class="row-bg-wrap">
                                    <div class="inner-wrap <?php echo esc_attr($post_navigation_duotone); ?>"> 
									
										<img src="<?php echo esc_url($prev_post_featured_image_url[0]); ?>" <?php echo brankic_srcset(get_post_thumbnail_id($prev_post_id), "brankic-1024-512"); ?> alt="<?php echo get_the_title( $prev_post->ID ); ?>">
                                        <div class="row-bg background-color"></div>
                                    </div> 
                                </div>
								
								<a href="<?php echo get_permalink( $prev_post->ID ); ?>" rel="prev">
                    
								<?php $html = '<div class="overlap-heading">';
                                    
                                      if (!empty( $prev_post )) $html .=  '<span class="google_web_font_1">' . esc_html__('Previous', 'myriadwp') . '</span>';
									  
									  else $html .=  '<span class="google_web_font_1">' . esc_html__('Prev', 'myriadwp') . '</span>';
                                        
                                      $html .=  '<div class="overlap-link">
                                        
                                            <div class="divider border right">
                                                <span></span>';
									
									if (is_singular( array( 'portfolio_item' ) )) $html .='            <div> ' . esc_html__('View case study', 'myriadwp') . '</div>';
									else $html .='            <div> ' . esc_html__('Read article', 'myriadwp') . '</div>';		
                                    
									$html .= '                         	</div><!--END DIVIDER-->
                                        
                                        </div><!--END OVERLAY LINK-->
                                        
                                    </div><!--END OVERLAY HEADING-->
                                        
                                    <div class="overlap-inner">
                                    
                                    	<h3>' . get_the_title( $prev_post->ID ) . '</h3>
                                    
                                    </div><!--END OVERLAY INNER-->'; ?>
					
								<?php 
								echo wp_kses($html, $brankic_allowedposttags);
								?>
								</a>
                                        
                            </article><!--END ARTICLE NEXT-->
						
						<?php } ?>
						<?php if (!empty( $next_post )) { ?> 
						
                            <article class="next"> 
							
								<div class="row-bg-wrap">
                                    <div class="inner-wrap <?php echo esc_attr($post_navigation_duotone); ?>"> 
									
										<img src="<?php echo esc_url($next_post_featured_image_url[0]); ?>" <?php echo brankic_srcset(get_post_thumbnail_id($next_post_id), "brankic-1024-512"); ?> alt="<?php echo get_the_title( $next_post->ID ); ?>">
                                        <div class="row-bg background-color"></div>
                                    </div> 
                                </div>
								
								<a href="<?php echo get_permalink( $next_post->ID ); ?>" rel="next">
                    
								<?php $html = '<div class="overlap-heading">';
                                    
                                      if (!empty( $next_post )) $html .=  '<span class="google_web_font_1">' . esc_html__('Next', 'myriadwp') . '</span>';
									  
									  else $html .=  '<span class="google_web_font_1">' . esc_html__('Prev', 'myriadwp') . '</span>';
                                        
                                      $html .=  '<div class="overlap-link">
                                        
                                            <div class="divider border right">
                                                <span></span>';
									
									if (is_singular( array( 'portfolio_item' ) )) $html .='            <div> ' . esc_html__('View case study', 'myriadwp') . '</div>';
									else $html .='            <div> ' . esc_html__('Read article', 'myriadwp') . '</div>';		
                                    
									$html .= '                         	</div><!--END DIVIDER-->
                                        
                                        </div><!--END OVERLAY LINK-->
                                        
                                    </div><!--END OVERLAY HEADING-->
                                        
                                    <div class="overlap-inner">
                                    
                                    	<h3>' . get_the_title( $next_post->ID ) . '</h3>
                                    
                                    </div><!--END OVERLAY INNER-->'; ?>
					
								<?php 
								echo wp_kses($html, $brankic_allowedposttags);
								?>
								</a>
                                        
                            </article><!--END ARTICLE NEXT-->
						
						<?php } ?>
                        
						</div><!--END POST-NAVIGATION EXTENDED--> 	
<?php
}
}
?>

<?php
if ($post_navigation_style == "only_next_bg_image_half") {
?>


<?php if (!empty( $adjacent_post )) { 	
	$adjacent_post_id = $adjacent_post->ID;
	$adjacent_post_featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($adjacent_post_id), 'brankic-1024-512' );
?>						
                        <div class="post-navigation solo duo">
                        
                            <article> 
							

							
								<div class="row-bg-wrap">
                                    <div class="inner-wrap <?php echo esc_attr($post_navigation_duotone); ?>">
										<img src="<?php echo esc_url($adjacent_post_featured_image_url[0]); ?>" <?php echo brankic_srcset(get_post_thumbnail_id($adjacent_post_id), "brankic-1024-512"); ?> alt="<?php echo get_the_title( $adjacent_post->ID ); ?>">									
                                    </div> 
                                </div>
								
							</article><!--END ARTICLE-->
                        
                            <article>
							
								<div class="row-bg-wrap">
									<div class="inner-wrap"> 
										<div class="row-bg background-color"></div>
									</div> 
								</div>

								<a href="<?php echo get_permalink( $adjacent_post->ID ); ?>" rel="next">
                    
								<span class="next-post google_web_font_1" style="color:<?php echo esc_attr($post_navigation_text_color); ?>;"><?php esc_html_e('Next', 'myriadwp'); ?></span>
                                            
                                    <h3 class="next-post-title" style="color:<?php echo esc_attr($post_navigation_text_color); ?>"><?php echo get_the_title( $adjacent_post->ID ); ?></h3>
					
								
								</a>
                                        
                            </article><!--END ARTICLE-->
            
                        </div><!--END POST-NAVIGATION EXTENDED--> 	
<?php
}
}


}
?>