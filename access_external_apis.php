<?php
include 'api_keys.php';

$API_KEY = $GOOGLE_GEOCODE_API_KEY;
$google_geocode_url = "https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key={$API_KEY}";
echo $google_geocode_url;
echo "\n\n";

// Got this from: http://www.andrew-kirkpatrick.com/2011/10/google-geocoding-api-with-php/
$initialize_curl = curl_init();
curl_setopt($initialize_curl, CURLOPT_URL, $google_geocode_url);
curl_setopt($initialize_curl, CURLOPT_RETURNTRANSFER, 1);
$response = json_decode(curl_exec($initialize_curl), true);

// print_r($response['status']);
// print_r($response);
// echo "{$response['results'][0][address_components][0]}\n";


$array_foo = $response[results][0][address_components];
$address_component_count = count($array_foo);

echo "{$address_component_count}\n";

foreach ($array_foo as $component) {
  echo "{$component[long_name]}\n";
}

$lattitude = $response[results][0][geometry][bounds][northeast][lat];
$longitude = $response[results][0][geometry][bounds][northeast][lng];

echo "Geocode:\n\nLattitude: {$lattitude}\nLogitude: {$longitude}\n"
?>
