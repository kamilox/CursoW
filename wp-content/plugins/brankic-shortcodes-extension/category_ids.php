<html>
<head>
<style type="text/css">div.icon_showcase{margin:5px;display:inline-block;text-align:center}span.icon_showcase{font-size:25px;padding:5px}body.bra_cat_font{font-family:Helvetica}div.bra_cat_1{margin:5px;display:block;width:100%;float:left}span.bra_cat_2{padding:5px;width:40%;float:left}span.bra_cat_3{padding:5px;float:left}span.padding_5px{padding:5px}</style>
<script type='text/javascript'>function CloseMySelf(e,t){window.foo="";var o=document.getElementsByTagName("span")[t];return window.foo=o.getAttribute("id"),parent.sDataValue=window.foo,parent.document.getElementById("icon_name").value=window.foo,top.tinymce.activeEditor.windowManager.close(),!1}function CloseMySelf2(e,t){window.foo="";var o=document.getElementsByTagName("a")[t];return window.foo=o.getAttribute("data-cat_id"),parent.document.getElementById("cat_id").value=window.foo,top.tinymce.activeEditor.windowManager.close(),!1}</script>
</head>
<body class="bra_cat_font">

<?php
// show category IDs in pop-up.
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

	// Pull all the categories into an array
	$options_categories = array();
 	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->term_id] = $category->name;
		$options_categories_count[$category->term_id] = $category->count;
	}
	
	// Pull all the portfolio categories into an array
	$options_portfolio_categories = array();
 	$options_portfolio_categories_obj = get_terms(array('taxonomy' => 'portfolio_category'));
	foreach ($options_portfolio_categories_obj as $category) {
		$options_portfolio_categories[$category->term_id] = $category->name;
		$options_portfolio_categories_count[$category->term_id] = $category->count;
	}
?>
<div style="width:50%; float:left">	
<h3>Blog Categories</h3>
<?php	
$i = 0;
foreach($options_categories as $cat_id => $cat_name) {
	$no_of_posts = $options_categories_count[$cat_id];
?>	
<div class="bra_cat_1"><span class="bra_cat_2"><a href="#" data-cat_id="<?php echo $cat_id; ?>"  onclick="return CloseMySelf2(this,'<?php echo $i;?>');"><?php echo $cat_name ?> (<?php echo $no_of_posts; ?>)</a> : </span><span class="bra_cat_3">cat_id=<?php echo $cat_id; ?></span></div>
<?php
$i++;	
}
?>
</div>

<div style="width:50%; float:left">
<h3>Portfolio Categories</h3>
<?php
foreach($options_portfolio_categories as $cat_id => $cat_name) {
	$no_of_posts = $options_portfolio_categories_count[$cat_id];
?>	
<div class="bra_cat_1"><span class="bra_cat_2"><a href="#" data-cat_id="<?php echo $cat_id; ?>"  onclick="return CloseMySelf2(this,'<?php echo $i;?>');"><?php echo $cat_name ?> (<?php echo $no_of_posts; ?>)</a> : </span><span class="bra_cat_3">cat_id=<?php echo $cat_id; ?></span></div>
<?php
$i++;	
}
?>
</div>
<div class="mce-title" style="margin:5px; display:block; width:50%; "><span class="padding_5px"><a href="#" data-cat_id="0"  onclick="return CloseMySelf2(this,'<?php echo $i ;?>');">None </a> : </span><span style="text-align:right">cat_id=0</span></div>


</body>
</html>