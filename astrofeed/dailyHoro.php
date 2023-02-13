<?php

require_once 'src/VedicRishiClient.php';

$rashi=$_post['zodiacName'];
$userId = "618587";
$apiKey = "52ff1a4df954feedaf881a36def79423";

/*$data = array(
'date' => 25,
'month' => 12,
'year' => 1988,
'hour' => 4,
'minute' => 0,
'latitude' => 25.123,
'longitude' => 82.34,
'timezone' => 5.5
);*/
$data = array(

    'date' => $_POST['date'],
    'month' => $_POST['month'],
    'year' =>$_POST['year'],
    'hour' =>$_POST['hour'],
    'minute' =>$_POST['minute'],
    'latitude' => $_POST['latitude'],
    'longitude' =>  $_POST['longitude'],
    'timezone' =>$_POST['timezone']
);


$resourceName = "astro_details";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->call($resourceName, $data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);
echo $responseData;
?>