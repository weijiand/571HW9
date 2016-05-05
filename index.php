<?php
header('Content-type: text/json');

if ($_GET["bingsymbol"]):
//echo 'BingAPI';
// Replace this value with your account key
$accountKey = 'aiP8h8qDweqgEcAbzm+oyg0c263fTBQ/eKJw3VSPixo';
$context = stream_context_create(array(
    'http' => array(
        'request_fulluri' => true,
        'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
        )
	)	
);
$frontURL = 'https://api.datamarket.azure.com/Bing/Search/v1/News?$format=json&Query=';
$rearURL = urlencode( '\'' . $_POST["searchText"] . '\'');
$contentURL = $frontURL . $rearURL;
//echo $contentURL . "<br>111";
$contents = file_get_contents($contentURL, 0, $context);
//echo $contents . "<br>222";
$contents = utf8_encode($contents);
$data = eval('('+data+')');
//echo $contents . "<br>pos1";
$j_results = json_decode($contents);
//var_dump($j_results);
//echo "<br>pos2";
//echo 'contents:';
echo $_GET['callback']. "(" . $contents . ")";
return $contents;
//else:
//echo "No symbol received.";
endif;

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
//else:
//echo "No symbol received.";
endif;

if ($_GET["input"]):
$contentURL = 'http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input=' .$_GET["input"];
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
//else:
//echo "No symbol received.";
endif;
?>

