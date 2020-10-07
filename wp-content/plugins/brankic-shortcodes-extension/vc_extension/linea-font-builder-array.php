<?php
$subfont = "weather";
$handle = fopen($subfont . ".txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
		$line = trim($line);
		
		if ($line != "") echo "array( 'icon icon-$line' => '$line' )," . "<br>";

    }
}
