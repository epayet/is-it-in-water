<?php
require('water.php');

$apiKey = $_ENV['API_KEY'];
if(!$apiKey) {
	throw new Exception("Env var API_KEY not defined, you need a valid Google Maps API key");
}

// From args
if($argv[1] && $argv[2]) {
	$lat = $argv[1];
	$lng = $argv[2];
} else {
	throw new Exception("No args passed (latitude and longitude), try this: php cli.php 51.505393 -0.168609");
}

// Water
//$lat = 51.505393;
//$lng = -0.168609;

// No Water
//$lat = 51.247651;
//$lng = 1.249331;

echo "Starting with lat: ".$lat.", lng: ".$lng;
$isIt = isItWater($lat, $lng, $apiKey);
$isItStr = $isIt ? "true" : "false";
echo "Is water: " . $isItStr;
?>
