<?php
require('water.php');

$apiKey = "Your key";
// Water
// $lat = 51.096994;
// $lng = -2.373197;

// No Water
$lat = 51.247651;
$lng = 1.249331;

echo "Starting with lat: ".$lat.", lng: ".$lng;
echo "Is water: ".isItWater($lat, $lng, $apiKey);
?>
