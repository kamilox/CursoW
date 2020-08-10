<?php
/**
 * NKP Before and After Gallery adult content checker.
 *
 * @author Scott Landes <scott@nkpmedical.com>
 */

$options = s45_get_options();

if( isset($_POST['no']) || isset($_POST['yes']) ){
    $header = get_home_url();

    if ( isset($_POST['yes']) ) {
        setcookie('adult_check', 'yes' );
        $header .= "/". $options['gallery_slug'] . "/";
    }

    if ( isset($_GET['lang']) ) {
        $lang = strip_tags(trim($_GET['lang']));
        $header .= "?lang=" . htmlspecialchars( $lang, ENT_QUOTES);
    }

    wp_redirect( $header );
    exit();
}

get_header(); ?>

<div class="adult-check">
	<h1>Adult check</h1>

	<?php if ( empty($options['adult_check_text'] )) { ?>
		The photo gallery you are about to view has content suitable for people only above the age of 18 years.  Do you wish to continue?
	<?php } elseif ( !empty($options['adult_check_text'] )) {
		echo $options['adult_check_text'];
	} ?>

            <form action="/<?php echo $options['gallery_slug']; ?>/" method="post">
		<input type="submit" name="yes" value="Yes">
		<input type="submit" name="no" value="No">
	</form>

</div>

<?php get_footer(); ?>
