<?php 
/**
 * NKP Before and After Gallery adult content checker.
 *
 * @author Scott Landes <scott@nkpmedical.com>
 */

$options = s45_get_options();

if ($_POST['yes']) {

	setcookie('adult_check', 'yes' );
	
	header("Location: " . get_home_url() ."/". $options['gallery_slug'] . "");
	exit();
} elseif ($_POST['no']) {
	header("Location: " . get_home_url() . "");
	exit();
}

get_header();
?>

<div class="adult-check">
	<h1>Adult check</h1>

	<?php if ( empty($options['adult_check_text'] )) { ?>
		The photo gallery you are about to view has content suitable for people only above the age of 18 years.  Do you wish to continue?
	<?php } elseif ( !empty($options['adult_check_text'] )) { 
		echo $options['adult_check_text'];
	} ?>

    <div class="check_btn">    
        <form action="" method="POST">
        	<button style="padding:10px; font-size: 28px" type="submit" name="yes" value="Yes">Yes</button>
            <button style="padding:10px; font-size: 28px" type="submit" name="no" value="No">No</button>
        </form>
    </div>

</div>

<?php get_footer();?>
