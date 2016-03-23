<?php
require('water.php');

$apiKey = "Your key";
$lat = 51.096994;
$lng = -2.373197;

echo "Starting with lat: ".$lat.", lng: ".$lng."\n";
echo "Is water: ".isItWater($lat, $lng, $apiKey);
?>
