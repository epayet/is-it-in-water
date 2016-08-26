<?php
require('water.php');

$apiKey = "Your key";
// Water
$lat = 51.505393;
$lng = -0.168609;

// No Water
// $lat = 51.247651;
// $lng = 1.249331;

echo "Starting with lat: ".$lat.", lng: ".$lng;
echo "Is water: ".isItWater($lat, $lng, $apiKey);
?>
