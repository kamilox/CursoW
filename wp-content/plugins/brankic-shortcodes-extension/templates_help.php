<?php
require_once("../../../wp-load.php");
function brankic_helper_template($brankic_template){
	
	$image_shortcodes = array("bg_image" 	=> "bg_image_extra",
							"bg_pattern" 	=> "bg_pattern_extra",
							"poster" 		=> "poster_extra",
							"file_picker"	=> "file_picker_extra",
							"slide_bg_image"=> "slide_bg_image_extra",
							"image_src" 	=> "image_src_extra",
							"item_image" 	=> "item_image_extra",
							"image" 		=> "image_extra",
							"front_bg_image"=> "front_bg_image_extra",
							"image_3" 		=> "image_extra_3",
							"image_2" 		=> "image_extra_2",
							"image_1" 		=> "image_extra_1",
							"row_brankic_bg_image" 			=> "row_brankic_bg_image_extra",
							"row_inner_brankic_bg_image" 	=> "row_inner_brankic_bg_image_extra",
							"column_brankic_bg_image" 		=> "column_brankic_bg_image_extra",
							"column_inner_brankic_bg_image" => "column_inner_brankic_bg_image_extra");
	

			$html = $brankic_template; 
			foreach($image_shortcodes as $shortcode => $new_shortcode){
				$string_start = $shortcode . '="';
				$string_end = '"';
				$return_array = brankic_getContents($html, $string_start, $string_end);
				foreach($return_array as $image_id){

					$part_to_replace = $string_start . $image_id . $string_end;
					
					if ($string_start == 'file_picker="'){
						$image_url = wp_get_attachment_url($image_id);	
					} else {
						$image_url_array = wp_get_attachment_image_src($image_id, 'full');
						$image_url = $image_url_array[0];
					}

					
					
					$substitution = $image_shortcodes[$shortcode] . '="' . $image_url . '"';
					
					
					$html = str_replace($part_to_replace, $substitution, $html);
					
				}
				$empty_extra = $new_shortcode . '=""';
				$html = str_replace($empty_extra, "", $html);
				 
			}
			$html = str_replace("'", "\'", $html);
			return $html;
		//}		
	//}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["original_template"])) {
    $nameErr = "Name is required";
  } else {
    $original_template = stripslashes($_POST["original_template"]);
	$template_name = stripslashes($_POST["template_name"]);
	$prefix = stripslashes($_POST["prefix"]);

	$processed_template = brankic_helper_template($original_template);
	//$processed_template = str_replace("'", "\'", $processed_template);
  }
  
  
  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>My Example</title>

<!-- CSS -->
<style>
.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
width: 100%;
padding: 10px;
}

.myForm * {
box-sizing: border-box;
}

.myForm label {
	width: 100px;
padding: 0;
font-weight: bold;
text-align: right;
display: block;
float: left;
}

.myForm input,
.myForm select,
.myForm textarea {
margin-left: 10px;
float: right;
width: 1000px;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;

padding: 10px;
}

.myForm textarea {
height: 400px;
}


.myForm p {
margin: 10px;
padding: 10px;
float:left;
}

</style>

</head>
<body>

<form class="myForm" method="post" enctype="application/x-www-form-urlencoded" action="?">

<p>
<label>Prefix ( m01-page-</label> 
<input type="text" name="prefix" >
</p>

<p>
<label>Name </label> 
<input type="text" name="template_name">
</p>

<p>
<label>Original template code </label> 
<textarea name="original_template" maxlength=""></textarea>

</p>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
?>
<p>
<label>Processed template code </label>
<textarea name="processed_template" maxlength=""><?php echo $processed_template; ?></textarea>

</p>
<?php
}
?>
<p><button>Submit Enquiry</button></p>

</form>

</body>
</html>