<?php
require('water.php');
$apiKey = $_SERVER['API_KEY'];
if(!$apiKey) {
	echo "Env var API_KEY not defined, you need a valid Google Maps API key";
	return;
}

// From query parameters
if($_GET["lat"] && $_GET["lng"]) {
	$lat = $_GET["lat"];
	$lng = $_GET["lng"];
} else {
	echo "No args passed (latitude and longitude), try this: ?lat=51.505393&lng=-0.168609";
	return;
}

$isIt = isItWater($lat, $lng, $apiKey, False);
$isItStr = $isIt ? "true" : "false";
echo $isItStr;
?>
