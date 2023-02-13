<?php
require_once 'src/VedicRishiClient.php';

// $userId ="617917";
// $apiKey = "d88039a31deefe3cc664b8b7a4ae383e";

// $userId ="621587";
// $apiKey = "22a5aa1d4a0f77037a82b749ab63b9f4";
$userId ="621731";
$apiKey = "e3d0b4033960d07c1010c5efcca6b535";

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