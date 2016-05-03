<?php
header('Content-type: text/json');

if ($_GET["symbol"]):
$contentURL = 'http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=' .$_GET["symbol"];
//echo $contentURL . "<br>111";
$contents = file_get_contents($contentURL);
//echo $contents . "<br>222";
$contents = utf8_encode($contents);
//echo $contents . "<br>pos1";
$j_results = json_decode($contents);
//var_dump($j_results);
//echo "<br>pos2";
//echo 'contents:';
echo $_GET['callback']. "(" . $contents . ")";
return $contents;
else:
echo "No symbol received.";
endif;
?>

