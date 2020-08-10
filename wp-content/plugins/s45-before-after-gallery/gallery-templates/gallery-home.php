<?php
get_header('inner'); ?>

<?php
// Get contact page slug
$s45_options = get_option( 's45_options' );
$terms = get_terms('procedure', array('orderby'=>'name','order'=>'ASC','hide_empty'=>false,'parent'=>0) );
?>
    <div class="back-main-container">
        <!--header-->
        <header>
            <div class="main-header">
                <div class="col-xs-12 col-sm-5 col-md-5 pull-right backpage-head-right">
                    <div class="mobi-logo visible-xs"> <a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="Chicago Breast & Body Aesthetics"></a> </div>
                    <div class="lady-img hidden-xs"><?php if($image[0]) { ?><img src="<?php echo $image[0]; ?>" alt="Model"> <?php } ?></div>
                    <!--<div class="head-model-text hidden-xs">Model</div>-->
                    <div class="social-top hidden-xs">
                        <?php dynamic_sidebar( 'social_icon' ); ?>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-7 col-md-7 pull-left backpage-head-lft">
                    <!--<div class="logo hidden-xs"><a href="<//?php echo home_url('/'); ?>"><img src="<//?php bloginfo('template_directory'); ?>/images/logo.png" alt="Chicago Breast & Body Aesthetics"></a></div>-->
                    <div class="top-wel-text">
                        <?php dynamic_sidebar( 'header-widget' ); ?>
                    </div>
                </div>
            </div>
        </header>
        <!--header-->

        <section class="gallery-content back-bot-cont-sec">
            <h1>Before &amp; After Photos</h1>
            <div class="row treatments">
                <?php
                $i=1;
                foreach ($terms as $term) {
                    $term_meta = get_option( "taxonomy_$term->term_id" );
                    if($term_meta['disable_this']!=1):
                        $img = tip_plugin_get_terms( $term->term_id );

                        $image = wp_get_attachment_image_src( $img, 'large' ); ?>

                        <div class="treatments-single">
                            <?php if ($image[0]) : ?>
                                <div class="category-img">
                                    <img src="<?php echo $image[0];?>" alt="<?php echo $term->name; ?>" border="0" />
                                </div>
                            <?php endif; ?>
                            <div class="category-list">
                                <h3><?php echo $term->name;?></h3>
                                <?php
                                $args = array(
                                    'orderby'   => 'name',
                                    'order'      => 'ASC',
                                    'parent'     => $term->term_id,
                                    'hide_empty' => false,
                                    'fields'     => 'ids'

                                );

                                $term_children = get_terms( 'procedure', $args ); ?>

                                <ul>
                                    <?php
                                    $ii = 1;
                                    foreach ($term_children as $child) {
                                        $term = get_term_by( 'id', $child, 'procedure' );
                                        $term_meta = get_option( "taxonomy_$term->term_id" );
                                        if($term_meta['disable_this']!=1):
                                            ?>
                                            <li id="li-<?php echo $ii;?>">
                                                <?php if($term_meta['ac_notice']==1): ?>
                                                    <a href="<?php echo get_term_link( $term );?>" class="proc-ttl-<?php echo $ii;?>"><?php echo $term->name;?></a>
                                                <?php else: ?>
                                                    <a href="<?php echo get_term_link( $term );?>" class="proc-ttl-<?php echo $ii;?>"><?php echo $term->name;?></a>
                                                <?php endif; ?>
                                            </li>

                                        <?php endif; $ii++; } ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; $i++; } ?>
            </div>
        </section>
    </div>

    <script>
        // urlafterwarning=window.location.href;
        // function validateAdult(elm,data){
        //     if(typeof(data)==="undefined"){
        //         var url= jQuery(elm).data('href');
        //         var hascookie=document.cookie;
        //         if(hascookie.indexOf('adult_popup_gal')!=-1){
        //             window.location=url;
        //         }else{
        //             urlafterwarning=url;
        //             //$('#warningModal').removeClass('fade').fadeIn('slow');
        //             jQuery('#warningModal').modal('show');
        //         }
        //     }else{
        //         var date = new Date();
        //         var name='adult_popup_gal';
        //         var value='has_value';
        //         var days=1;
        //         date.setTime(date.getTime()+(days*24*60*60*1000));
        //         var expires = "; expires="+date.toGMTString();
        //         document.cookie = name+"="+value+expires+"; path=/";
        //         jQuery('#warningModal').modal('hide');
        //         window.location=urlafterwarning;
        //     }
        // }
    </script>
    <!-- Modal -->
    <!--    <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <!--        <div class="modal-dialog">-->
    <!---->
    <!--            <div class="modal-content">-->
    <!--                <div class="modal-body">-->
    <!--                    --><?php //echo $s45_options['adult_check_text']; ?>
    <!--                </div>-->
    <!--                <div class="modal-footer">-->
    <!--                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>-->
    <!--                    <button type="button" onclick="validateAdult(this,1);" class="btn btn-primary">Ok</button>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
<?php get_footer(); ?>