<?php
	$single_post_style = brankic_global_or_local("single_post_style");
	
	if ($single_post_style == "sidebar" || $single_post_style == "fullwidth") $author_tag = "section"; else $author_tag = "div";
	
	$about_author = get_the_author_meta( 'description' );
	
	if ($about_author != "") {
?>

                            <<?php echo esc_attr($author_tag); ?> class="post-author">
                                
                                <div class="author">
                                    <p><img src="<?php if (function_exists('get_wp_user_avatar')) echo get_wp_user_avatar_src(get_the_author_meta('ID'), 54);
							else echo get_avatar_url(get_the_author_meta( 'user_email'), 54); ?>" alt="<?php echo get_the_author_meta( 'user_nicename' ); ?>" class=""></p> 
                                </div><!--END AUTHOR-->
                        
                                <div class="author-info">        
                                                                                
                                    <h5><strong><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="">
										<?php the_author() ?>
										</a></strong></h5>
										
                                    <p><?php echo get_the_author_meta( 'description' ); ?></p>
                                                
                                </div><!--END AUTHOR INFO-->
                                        
                            </<?php echo esc_attr($author_tag); ?>><!--END POST-AUTHOR-->
	<?php } ?>