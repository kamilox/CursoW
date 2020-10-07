<?php
$favicon = brankic_of_get_option("favicon", brankic_of_get_default("favicon"));
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php if ($favicon != "") { ?>	
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($favicon); ?>">
	<link rel="apple-touch-icon" href="<?php echo esc_url($favicon); ?>"/>
<?php } ?>	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$page_content_width =  brankic_global_or_local("default_content_width", "page_content_width");
if ($page_content_width == "fullwidth") {
	$content_width = 1440;
} else {
	$content_width = intval(substr($page_content_width, 0, 4));
}

	$page_transitions =  brankic_of_get_option("page_transitions", brankic_of_get_default("page_transitions"));
	if ($page_transitions == "loading") {
?>
        <!-- Preloader Start --> 
        <div id="main-preloader" class="main-preloader semi-dark-background">
            <div class="main-preloader-inner center">

                <h1 class="preloader-percentage center">
                    <span class="preloader-percentage-text">0</span> <!-- Show Percentage Number -->
                    <span class="percentage">%</span>
                </h1>
                <div class="preloader-bar-outer">
                    <div class="preloader-bar"></div> <!-- Percentage Precess Bar -->
                </div>

            </div>
        </div>
        <!-- Preloader Start --> 
<?php }	