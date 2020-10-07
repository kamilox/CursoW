<html>
<head>
<link rel='stylesheet' id='brankic_font_css'  href='css/font-et-line.css' type='text/css' media='all' />
<style type="text/css">div.icon_showcase{margin:5px;display:inline-block;text-align:center}span.icon_showcase{font-size:25px;padding:5px}body.bra_cat_font{font-family:Helvetica}div.bra_cat_1{margin:5px;display:block;width:100%;float:left}span.bra_cat_2{padding:5px;width:40%;float:left}span.bra_cat_3{padding:5px;float:left}span.padding_5px{padding:5px}</style>
<script type='text/javascript'>function CloseMySelf(e,t){window.foo="";var o=document.getElementsByTagName("span")[t];return window.foo=o.getAttribute("id"),parent.sDataValue=window.foo,parent.document.getElementById("icon_name").value=window.foo,top.tinymce.activeEditor.windowManager.close(),!1}function CloseMySelf2(e,t){window.foo="";var o=document.getElementsByTagName("a")[t];return window.foo=o.getAttribute("data-cat_id"),parent.document.getElementById("cat_id").value=window.foo,top.tinymce.activeEditor.windowManager.close(),!1}</script>
</head>
<body>
<?php $font_et_line_array = array("mobile" , "laptop", "desktop", "tablet", "phone", "document", "documents", "search", "clipboard", "newspaper", "notebook", "book-open", "browser", "calendar", "presentation", "picture", "pictures", "video", "camera", "printer", "toolbox", "briefcase", "wallet", "gift", "bargraph", "grid", "expand", "focus", "edit", "adjustments", "ribbon", "hourglass", "lock", "megaphone", "shield", "trophy", "flag", "map", "puzzle", "basket", "envelope", "streetsign", "telescope", "gears", "key", "paperclip", "attachment", "pricetags", "lightbulb", "layers", "pencil", "tools", "tools-2", "scissors", "paintbrush", "magnifying-glass", "circle-compass", "linegraph", "mic", "strategy", "beaker", "caution", "recycle", "anchor", "profile-male", "profile-female", "bike", "wine", "hotairballoon", "globe", "genius", "map-pin", "dial", "chat", "heart", "cloud", "upload", "download", "target", "hazardous", "piechart", "speedometer", "global", "compass", "lifesaver", "clock", "aperture", "quote", "scope", "alarmclock", "refresh", "happy", "sad", "facebook", "twitter", "googleplus", "rss", "tumblr", "linkedin", "dribbble"); ?>
<?php
sort($font_et_line_array);
foreach($font_et_line_array as $k => $icon) {
?>	
<div class="icon_showcase"><span id="<?php echo $icon; ?>" class="icon-<?php echo $icon; ?> icon_showcase" onclick="return CloseMySelf(this,'<?php echo $k;?>');"></span><br><?php echo $icon; ?></div>
<?php	
}

?>
</body>
</html>