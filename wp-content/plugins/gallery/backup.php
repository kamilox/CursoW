<div class="patient-detail-image-carousel-item">
                                            <img style=" 
                                                    background-image: url('<?php echo $image; ?>');
                                                    background-repeat: no-repeat;
                                                    background-position: center;
                                                    background-size: cover;
                                            ">
                                            <div class="patient-detail-image-counter">
                                                <?php 
                                                    echo 'view ' .$key. ' of '. $total;
                                                ?>
                                            </div>
                                        </div>






                                          $patients = get_posts([
        'post_type' => 'patients',
        'post_status' => 'publish',
        'posts_per_page'  => 2,
        'paged'   => $paged,
        'orderby' => 'date',
        'order'    => 'ASC'
      ]);

        foreach ($patients as $key => $value) {

            $detail = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$value->ID.'');
            //print_r($detail).'<br>';
        ?>
        <!--Div each case -->
            <div class="patient-detail">
                <div class="patient-detail-title">
                    <?php echo 'case # '.$detail[0]->post_gallery_id; ?>
                </div>
                <div class="patient-detail-images">
                    <?php 
                        $allImages = explode(',', $detail[0]->images);
                        foreach ($allImages as $keyImage => $image) {
                            if(($image)!= "" && $keyImage < 2){
                            ?>
                                <div class="image-gallery">
                                    <div 
                                        class="image-gallery-item"
                                        style=" background-image: url('<?php echo $image ?>');
                                                background-repeat: no-repeat;
                                                background-position: center;
                                                background-size: cover;
                                            "
                                    >
                                    </div>
                                </div>
                            <?php
                            }
                        }

                    ?>
                </div>
                <div class="patient-detail-buttom">
                    <a href="<?php echo get_post_permalink($value->ID) ?>" ><?php echo  _x('View Case Details', get_current_theme()) ?></a>
                    
                </div>
            </div>

        <?php
        }
        previous_posts_link( '« previus' );
        next_posts_link( 'next »', 0 );
    ?>