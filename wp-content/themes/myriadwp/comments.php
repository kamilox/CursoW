<?php

// Do not delete these lines
	if ( ! defined( 'ABSPATH' ) ) wp_die ('Please do not load this page directly. Thanks!');
	
	
$single_post_padding =  brankic_global_or_local("single_post_padding");
	if ($single_post_padding == "custom") {
		$single_post_top_padding =  brankic_global_or_local("single_post_top_padding");	
		$single_post_right_padding =  brankic_global_or_local("single_post_right_padding");
		$single_post_bottom_padding =  brankic_global_or_local("single_post_bottom_padding");
		$single_post_left_padding =  brankic_global_or_local("single_post_left_padding");
		
		$single_post_top_padding = str_replace("padding", "padding-top", $single_post_top_padding);
		$single_post_right_padding = str_replace("padding", "padding-right", $single_post_right_padding);
		$single_post_bottom_padding = str_replace("padding", "padding-bottom", $single_post_bottom_padding);
		$single_post_left_padding = str_replace("padding", "padding-left", $single_post_left_padding);
		
		$single_post_padding = "$single_post_top_padding $single_post_right_padding $single_post_bottom_padding $single_post_left_padding";
		$single_post_left_right_padding = "$single_post_right_padding $single_post_left_padding";
	} else {
		$single_post_left_right_padding = str_replace("padding-", "padding-left-", $single_post_padding) . " " . str_replace("padding-", "padding-right-", $single_post_padding);		
	}

	$single_post_margin =  brankic_global_or_local("single_post_margin");
	$single_post_left_right_margin = "0 auto 0 auto";
	if ($single_post_margin == "custom") {
		$single_post_top_margin =  brankic_global_or_local("single_post_top_margin");	
		$single_post_bottom_margin =  brankic_global_or_local("single_post_bottom_margin");
		
		$single_post_top_margin = str_replace("margin", "margin-top", $single_post_top_margin);
		$single_post_bottom_margin = str_replace("margin", "margin-bottom", $single_post_bottom_margin);
		
		$single_post_margin = "$single_post_top_margin auto $single_post_bottom_margin auto";
	} 

$single_sticky_padding_margin = $single_post_left_right_padding . " " . $single_post_left_right_margin;	
	

$single_post_style = brankic_global_or_local("single_post_style");
if ($single_post_style == "fullwidth_sticky") $single_extra_class = $single_sticky_padding_margin . " auto col-10 " . $tablet_class; else $single_extra_class = "";

	if ( post_password_required() ) { ?>
	<section class="post-comments <?php echo esc_attr($single_extra_class); ?> password-protected">
		<h6><strong><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'myriadwp'); ?></strong></h6>
	</section>	
	<?php
		return;
	}
	
	$comments_number_html = "";	
	$comment_type = "all";
	$comments_pings_number = brankic_comment_count($comment_type);
	if ($comments_pings_number == 0) $comments_number_html = esc_html__('No comments', 'myriadwp');
	if ($comments_pings_number == 1) $comments_number_html =  esc_html__('1 comment', 'myriadwp');
	if ($comments_pings_number > 1) $comments_number_html = $comments_pings_number . ' ' . esc_html__('comments', 'myriadwp');


?>

<!-- You can start editing here. -->



<?php 
next_comments_link();
previous_comments_link();

$content_bg_class = "";

$single_post_content_width_responsive_percent =  brankic_of_get_option("single_post_content_width_responsive_percent", brankic_of_get_default("single_post_content_width_responsive_percent"));	
$tablet_class = $single_post_content_width_responsive_percent;

?>

<?php if ( have_comments()) { 
?>
<section id="comments" class="post-comments <?php echo esc_attr($single_extra_class); ?>">
<h6><strong><?php echo esc_html($comments_number_html);  ?></strong></h6>
	<ul class="comment-list">				
		<?php 
		
		$args = array('type'        => $comment_type,
					'callback' => 'brankic_cust_comment');
		wp_list_comments($args); 
		?>
	</ul><!--END comment-list-->					

</section><!--END POST-COMMENTS-->
                            
                            
<?php }  ?>

<?php 
$single_post_style = brankic_global_or_local("single_post_style");
if ($single_post_style == "fullwidth") {
	
$single_post_content_width_all =  brankic_of_get_option("single_post_content_width_all", brankic_of_get_default("single_post_content_width_all"));
if (is_page()) $single_post_content_width_all = "col-12";

$single_post_padding =  brankic_global_or_local("single_post_padding");
if ($single_post_padding == "custom") {
	$single_post_top_padding =  brankic_global_or_local("single_post_top_padding");	
	$single_post_right_padding =  brankic_global_or_local("single_post_right_padding");
	$single_post_bottom_padding =  brankic_global_or_local("single_post_bottom_padding");
	$single_post_left_padding =  brankic_global_or_local("single_post_left_padding");
	
	$single_post_top_padding = str_replace("padding", "padding-top", $single_post_top_padding);
	$single_post_right_padding = str_replace("padding", "padding-right", $single_post_right_padding);
	$single_post_bottom_padding = str_replace("padding", "padding-bottom", $single_post_bottom_padding);
	$single_post_left_padding = str_replace("padding", "padding-left", $single_post_left_padding);
	
	$single_post_padding = "$single_post_top_padding $single_post_right_padding $single_post_bottom_padding $single_post_left_padding";
	$single_post_left_right_padding = "$single_post_right_padding $single_post_left_padding";
} else {
	$single_post_left_right_padding = str_replace("padding-", "padding-left-", $single_post_padding) . " " . str_replace("padding-", "padding-right-", $single_post_padding);		
}
	
?>
	
                	</div><!-- <?php echo esc_attr($single_post_content_width_all); ?> -->
                            
            	</div><!-- ROW -->
                            
            </div><!-- ROW-CONTAINER -->
            
            
        
            <div class="row-container myriad-comments-only-fullwidth">
        
                <div class="row dr <?php echo esc_attr($single_post_left_right_padding); ?>">
                    
                	<div class="<?php echo esc_attr($single_post_content_width_all); ?> aligncenter">

<?php } 

if ( is_single() && !(comments_open()) ) { ?>
<section class="post-comments <?php echo esc_attr($single_extra_class); ?>">
	<h6><strong><?php esc_html_e('Comments are closed.', 'myriadwp'); ?></strong></h6>
</section>
<?php
}				
	
if ( comments_open() ) { ?>	
<section class="post-comment-form <?php echo esc_attr($single_extra_class); ?>">	
	
	<?php 
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$form_outline = array(
    'id_form'              => 'commentform',
	'class_form'              => 'form outlined',
    'id_submit'            => 'submit',
	'class_submit'            => 'submit button',
    'comment_notes_before' => '',
    'comment_notes_after'  => '',
	'comment_field'        => '<div><p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'myriadwp' ) . '</label><textarea id="comment" name="comment" rows="8" aria-required="true"></textarea></p></div>',
	'title_reply_before'   => '<h6><strong>',
	'title_reply_after'    => '</strong></h6><br>',
    'title_reply'          => esc_html__( 'Leave a comment', 'myriadwp' ),
    'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'myriadwp' ),
    'cancel_reply_link'    => esc_html__( 'Cancel reply', 'myriadwp' ),
    'label_submit'         => esc_html__( 'Submit Comment', 'myriadwp' ),
	'fields' => apply_filters( 'comment_form_default_fields', array(

  'author' =>
    '<div><p class="comment-form-author"><label for="author">' . __( 'Name', 'myriadwp' ) . ( $req ? ' *' : '' ) . '</label>' . 
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" ' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'myriadwp' ) . ( $req ? ' *' : '' ) . '</label>' .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" ' . $aria_req . ' /></p></div>',

  'url' =>
    '<div><p class="comment-form-website"><label for="url">' . __( 'Website', 'myriadwp' ) . '</label>' .
    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '"  /></p></div>',
)
  ),
);
$comment_button_text = brankic_of_get_option("comment_button_text", brankic_of_get_default("comment_button_text"));
$comment_button_shape = brankic_of_get_option("comment_button_shape", brankic_of_get_default("comment_button_shape"));
$comment_button_size = brankic_of_get_option("comment_button_size", brankic_of_get_default("comment_button_size"));
$comment_form_layout = brankic_of_get_option("comment_form_layout", brankic_of_get_default("comment_form_layout"));


$form_minimal = array(
    'id_form'              => 'commentform',
	'class_form'              => 'form ' . esc_attr($comment_form_layout),
	'id_submit'            => 'submit',
	'class_submit'            => 'submit brankic_button ' . $comment_button_shape . ' ' . $comment_button_size ,
	'label_submit'			=> $comment_button_text,
    'comment_notes_before' => '',
    'comment_notes_after'  => '',
	'comment_field'        => '<div><p class="comment-form-message"><textarea id="comment" name="comment" rows="8" class="requiredField" aria-required="true"></textarea><span class="bar"></span><label for="comment">' . __( 'Comment', 'myriadwp' ) . ( $req ? ' *' : '' ) . '</label></p></div>',
	'title_reply_before'   => '<h6><strong>',
	'title_reply_after'    => '</strong></h6><br>',
    'title_reply'          => esc_html__( 'Leave a comment', 'myriadwp' ),
    'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'myriadwp' ),
    'cancel_reply_link'    => esc_html__( 'Cancel reply', 'myriadwp' ),
	'submit_field'         => '<div><p class="form-submit">%1$s %2$s</p></div>',
	'fields' => apply_filters( 'comment_form_default_fields', array(

  'author' =>
    '<div><p class="comment-form-name">' . 
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" ' . $aria_req . ( $req ? ' required' : '' ) . '/><span class="bar"></span><label for="author">' . __( 'Name', 'myriadwp' ) . ( $req ? ' *' : '' ) . '</label></p>',

  'email' =>
    '<p class="comment-form-email">' .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" ' . $aria_req . ( $req ? ' required' : '' ) .' /><span class="bar"></span><label for="email">' . __( 'Email', 'myriadwp' ) . ( $req ? ' *' : '' ) . '</label></p></div>',

  'url' =>
    '<div><p class="comment-form-website">' .
    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" ' . $aria_req . ( $req ? ' required' : '' ) .
    ' /><span class="bar"></span><label for="url">' . __( 'Website', 'myriadwp' ) . '</label></p></div>',

)
  ),
);


comment_form($form_minimal); 
?>
</section><!--END post-comment-form-->
	
<?php } ?>

          
			
     
		            
<?php 
$brankic_form_class_form[1] = "form";
$brankic_form_class_form[2] = "form table";
$brankic_form_class_form[3] = "form minimal font-light-grey";
$brankic_form_class_form[4] = "form white";

$brankic_form_class_submit[1] = "submit button rounded background-dark-grey";
$brankic_form_class_submit[2] = "submit";
$brankic_form_class_submit[3] = "submit default button rounded background-dark-grey";
$brankic_form_class_submit[4] = "submit button rounded background-dark-grey";

$brankic_form_comment_field[1] = '<div>
								<p class="comment-form-message">
                                    <label for="comment">' . esc_html__( 'Comment', 'myriadwp' ) . '</label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" class="requiredField"></textarea>
                                </p>
							</div>';
$brankic_form_comment_field[2] = '<div class="relative">
									<p class="comment-form-message">
                                    <textarea id="comment" name="comment" cols="45" rows="8" class="requiredField" placeholder="' . esc_attr__( 'Type in a comment', 'myriadwp' ) . ' *"></textarea>
                                </p>
								</div>';
$brankic_form_comment_field[3] = '<div>
								<p class="comment-form-message">
									<textarea id="comment" name="comment" cols="45" rows="8" class="requiredField" required></textarea>
									<span class="bar"></span><label for="comment">' . esc_html__( 'Comment', 'myriadwp' ) . ' *</label>
								</p>
							</div>';
$brankic_form_comment_field[4] = '<div>
									<p class="comment-form-message">
										<label for="comment">' . esc_html__( 'Comment', 'myriadwp' ) . '</label>
										<textarea id="comment" name="comment" cols="45" rows="8" class="requiredField" placeholder="' . esc_attr__( 'Your Comment', 'myriadwp' ) . '*"></textarea>
									</p>
								</div>';								
								
$brankic_form_author[1] = '<div><p class="comment-form-name">
                                    <label for="author">' . esc_html__( 'Name', 'myriadwp' ) . ' <span class="required">*</span></label>
                                    <input id="author" name="author" type="text" value=""  class="requiredField" />
                                </p>';
$brankic_form_author[2] = '<div>
                                    <p class="comment-form-name">
                                        <input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'myriadwp' ) . '*" class="requiredField">
                                    </p>';
									
$brankic_form_author[3] = '<div>
                                    <p class="comment-form-name">
                                        <input id="author" name="author" type="text" class="requiredField" required>
										<span class="bar"></span><label for="author">' . esc_html__( 'Name', 'myriadwp' ) . ' * </label>
                                    </p>';
$brankic_form_author[4] = '<div>
                                    <p class="comment-form-name">
										<label for="author">' . esc_html__( 'Name', 'myriadwp' ) . ' <span class="required">*</span></label>
                                        <input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'myriadwp' ) . '*" class="requiredField">
                                    </p>';									

$brankic_form_email[1] = '<p class="comment-form-email">
                                    <label for="email">' . esc_html__( 'Email', 'myriadwp' ) . ' <span class="required">*</span></label>
                                    <input id="email" name="email" type="text" value=""  class="requiredField email" />
                                </p>';
$brankic_form_email[2] = '<p class="comment-form-email">
                                        <input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'myriadwp' ) . '*" class="requiredField email">
                                    </p>';
$brankic_form_email[3] = '<p class="comment-form-email">
                                        <input id="email" name="email" type="email" class="requiredField email" required>
										<span class="bar"></span><label for="email">' . esc_html__( 'Email', 'myriadwp' ) . ' * </label>
                                    </p>';
$brankic_form_email[4] = '<p class="comment-form-email">
										<label for="email">' . esc_html__( 'Email', 'myriadwp' ) . ' <span class="required">*</span></label>
                                        <input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'myriadwp' ) . '*" class="requiredField email">
                                    </p>';									
									
									
$brankic_form_url[1] = '<p class="comment-form-url">
                                    <label for="url">' . esc_html__( 'Website', 'myriadwp' ) . '</label>
                                    <input id="url" name="url" type="url" value=""  >
                                </p></div>';
$brankic_form_url[2] = '<p class="comment-form-url">
                                        <input id="url" name="url" type="url" placeholder="' . esc_attr__( 'URL', 'myriadwp' ) . '">
                                    </p>
                                </div>';
$brankic_form_url[3] = '<p class="comment-form-url">
                                        <input id="url" name="url" type="url" required>
										<span class="bar"></span><label for="url">' . esc_html__( 'URL', 'myriadwp' ) . '</label>
                                    </p>
                                </div>';
$brankic_form_url[4] = '<p class="comment-form-url">
										<label for="url">' . esc_html__( 'Website', 'myriadwp' ) . '</label>
                                        <input id="url" name="url" type="url" placeholder="' . esc_attr__( 'URL', 'myriadwp' ) . '">
                                    </p>
                                </div>';								


 
?> 

				
					
					
<?php //endif; // if you delete this the sky will fall on your head 


$comment_counter = 0;
function brankic_cust_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; 
global $comment_counter;
$comment_counter++;
?>


                            <li <?php comment_class('comment'); ?> id="comment-<?php comment_ID(); ?>">
            
                                <div class="entry">
								
									<div class="commentnumber"><span></span><div class="number"><?php echo sprintf('%02d', $comment_counter); ; ?></div></div>
                                    
                                    <?php if (get_comment_type() == "comment") { ?>
									<div class="avatar">
                                       <?php if (function_exists('get_wp_user_avatar')) echo get_wp_user_avatar($comment, 50); else echo get_avatar($comment, 50); ?>
                                    </div>
									<?php } ?>
									
                                    <div class="comment-inner">
									
										<div class="comment-meta">		
											<ul>
												<li><a href="<?php comment_author_url(); ?>" class="author"><?php comment_author(); ?></a><?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'myriadwp'), 'login_text' => esc_html__('Log in to leave a comment', 'myriadwp'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></li>	
												<li class="date"><?php echo esc_html(get_the_date(get_option( 'date_format' ))); ?></li>	
											</ul>	
										</div><!-- END COMMENT-META -->
									
										<div class="comment-wrap">
											
											<?php comment_text() ?> 
																										
										</div><!-- END COMMENT-WRAP -->
									
									</div><!-- END COMMENT-INNER -->
									
								</div><!-- END ENTRY -->

                             
                
<?php if ($comment->comment_approved == '0') { ?>
<p><em><?php esc_html_e('Your comment is awaiting moderation.', 'myriadwp'); ?></em></p>
<?php } ?>                

<?php 
}