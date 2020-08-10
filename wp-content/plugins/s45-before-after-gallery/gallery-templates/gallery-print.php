<?php
/**
 * NKP Before and After Gallery template for the Photo Gallery single print display page.
 *
 * @author Scott Landes <scott@nkpmedical.com>
 */

$print_post_ID = $_GET['patient_print'];

$args = array(
    'p' => $print_post_ID,
    'post_type' => 'patients'
);

$the_query = new WP_Query( $args );

$terms = wp_get_object_terms( $print_post_ID, 'procedure' );
$term = get_term_by ( 'id', $terms[0]->term_id, 'procedure' );
$termparent = get_term_by ( 'id', $term->parent, 'procedure' );
$options = get_option( 's45_options' );

?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Patient Print</title>
    
    <link rel="stylesheet" href="<?php echo S45PU . '/css/photos.css';?>">

    <style>

    .patient-row {
        display: inline-block;
        width: 100%;
    }

    @media screen or print {
        @page {
            margin:.5in .5in .5in .5in; 
            mso-header-margin:1in; 
            mso-footer-margin:.5in; 
        }

        body {
            font: 12pt Georgia, "Times New Roman", Times, serif;
            line-height: 1.3;
            color:black;
        }
        .print-wrapper { 
            margin:0 auto;
            width:800px;
        }
        
        .content, body, .content-bottom, body.sub { background: none !important}
        .navigation, 
        .procedures, 
        .sidebar, 
        .header, 
        .header_sub, 
        .feat_box, 
        .feat_proc,
        .footer, 
        .gallery-breadcrumb, 
        .post-edit-link, 
        .single-patient-navigation, 
        .single-patient-navigation-bottom,
        .r_sidebar_sub,
        .contact_sd,
        .nav,
        .banner_sub,
        .row1_sub {
            display: none
        }
        
        .main, .content_sub, .content {
            width:100%;
        }
        
        .single-content { 
            border-top: 1px dotted gray;
            margin:15px 0;
            padding:15px 0; 
        }

        .patient-entry {
            border-top:none;
            padding-top:0;
        }
    }

    </style>



</head>
<body onload="window.print()">

<?php if ( $the_query->have_posts() ) : ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div class="print-wrapper">
        <header class="page-header">
            <h1 class="patient-listing-title"><?php echo $term->name;?> Photos - Case #<?php the_title();?></h1>
            <?php //tax_breadcrumbs($print_post_ID); ?>
        </header>

        <div id="patient-listing">
            
            <h1 class="patient-header">Patient Case #<?php the_title();?></h1>

            <div class="patient-entry">

                <?php $attachments = get_posts( array(
                    'post_type'      => 'attachment',
                    'numberposts'    => 50,
                    'posts_per_page' => -1,
                    'post_parent'    => $print_post_ID,
                    'exclude'        => get_post_thumbnail_id(),
                    'orderby'        => 'menu_order post_date',
                    'order'          => 'ASC'
                ) );

                if ( $attachments ) {
                    ?><!--<?php //print_r($attachments);?>--><?php
                    $c=1;
                    foreach ( $attachments as $attachment ) {
                        $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
                        $img = wp_get_attachment_image_src( $attachment->ID, 'patient-normal' ); ?>

                        <?php if ( $c == 3 ) { ?>
                            
                            <div class="single-content">
                                <?php $ctt = get_the_content();
                                if($ctt !='') { 
                                    echo '<strong>Description:</strong> '. $ctt;
                                } ?>
                            <div class="patient-meta-info">
                                <div id="single-patient-meta-col-a" style="float:left;width:50%">
                                    <?php 

                                    $patientage = get_post_meta($print_post_ID, 'patientage', true);
                                    if ( $patientage != '' ) {
                                        echo '<strong>Patient Age:</strong> '.$patientage.'<br />';
                                    }

                                    $patientheight = get_post_meta($print_post_ID, 'patientheight', true);
                                    if ( $patientheight != '' ) {
                                        echo '<strong>Patient Height:</strong> '.$patientheight.'<br />';
                                    } 

                                    $patientweight = get_post_meta($print_post_ID, 'patientweight', true);
                                    if ( $patientweight != '' ) {
                                        echo '<strong>Patient Weight:</strong> '.$patientweight.'<br />';
                                    } 

                                    $patientimplantsizeleft = get_post_meta($print_post_ID, 'patientimplantsizeleft', true);
                                    if ( $patientimplantsizeleft != '' ) {
                                        echo '<strong>Implant Size (Left):</strong> '.$patientimplantsizeleft;
                                    } ?>
                                
                                </div>
                            
                                <div id="single-patient-meta-col-b" style="float:left;width:50%;text-align:right">
                                    <?php

                                    $patientimplantsizeright = get_post_meta($print_post_ID, 'patientimplantsizeright', true);
                                    if ( $patientimplantsizeright != '' ) {
                                        echo '<strong>Implant Size (Right):</strong> '.$patientimplantsizeright.'<br />';
                                    } 

                                    $patientcupsizebefore = get_post_meta($print_post_ID, 'patientcupsizebefore', true);
                                    if ( $patientcupsizebefore != '' ) {
                                        echo '<strong>Cup Size Before:</strong> '.$patientcupsizebefore.'<br />';
                                    }

                                    $patientcupsizeafter = get_post_meta($print_post_ID, 'patientcupsizeafter', true);
                                    if ( $patientcupsizeafter != '' ) {
                                        echo '<strong>Cup Size After:</strong> '.$patientcupsizeafter;
                                    } ?>

                                </div>
                            </div>
                        </div>

                        <?php } ?>

                        <?php echo ( $c % 2 == 0 ? '' : '<div class="patient-row">' );?>
                        <div class="patient-single<?php echo ( $c % 2 == 0 ? ' even' : ' odd' );?>">
                            <?php switch ($c) {
                                case ( $c % 2 == 0 ) :
                                    echo "After";
                                    break;
                                default:
                                    echo "Before";
                                    break;
                            } ?>                            
                            <br />
                            <?php echo '<img src="'.$img[0].'" width="'.$options['image_size_normal_x'].'" alt="'.$terms[0]->name.'" class="patient-list-image" />'; ?>
                        </div>
                        <?php echo ( $c % 2 == 0 ? '</div>' : '' );
                        $c++;?> 
                    <?php }
                } ?>    

                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>

                </div>

    </div><!-- /patient-listing -->
</div>
    <?php endwhile; ?>

<?php endif; ?>

</body>
</html>
