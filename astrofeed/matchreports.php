<?php
require_once 'src/VedicRishiClient.php';
$userId ="621731";
$apiKey = "e3d0b4033960d07c1010c5efcca6b535";
// $userId ="617917";
// $apiKey = "d88039a31deefe3cc664b8b7a4ae383e";
$data = array(
 $date = $_POST['date'],
 $month = $_POST['month'],
 $year = $_POST['year'],
 $hour = $_POST['hour'],
 $minute = $_POST['minute'],
 $latitude = $_POST['latitude'],
 $longitude = $_POST['longitude'],
 $timezone = $_POST['timezone']
);

$resourceName = "manglik";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->call($resourceName, $data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);
echo $responseData;
?>