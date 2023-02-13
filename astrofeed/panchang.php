<?php
/**
 * Created by PhpStorm.
 * User: ritesh
 * Date: 10/03/17
 * Time: 2:53 PM
 */


require_once 'src/VedicRishiClient.php';


/*$userId ="621587";
$apiKey = "22a5aa1d4a0f77037a82b749ab63b9f4";*/

$userId ="621731";
$apiKey = "e3d0b4033960d07c1010c5efcca6b535";

// make some dummy data in order to call vedic rishi panchang api function
 $date = $_POST['date'];
 $month = $_POST['month'];
 $year = $_POST['year'];
 $hour = $_POST['hour'];
 $minute = $_POST['minute'];
 $latitude = $_POST['latitude'];
 $longitude = $_POST['longitude'];
 $timezone = $_POST['timezone'];

$data = array(
'date' => $date,
'month' => $month,
'year' => $year,
'hour' => $hour,
'minute' => $minute,
'latitude' => $latitude,
'longitude' =>$longitude,
'timezone' => $timezone
);




// instantiate VedicRishiClient class
$vedicRishi = new VedicRishiClient($userId, $apiKey);

//Get Basic Panchang
$responseData = $vedicRishi->getBasicPanchang($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

//Get Basic Panchang at the time of sunrise
$responseData1 = $vedicRishi->getBasicPanchangSunrise($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

//Get Advance Panchang
$responseData2 = $vedicRishi->getAdvancedPanchang($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

//Get Advance Panchang at the time of sunrise
$responseData3 = $vedicRishi->getAdvancedPanchangSunrise($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

//Get Planet Panchang
$responseData4 = $vedicRishi->getPlanetPanchang($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

//Get Planet Panchang at the time of sunrise
$responseData5 = $vedicRishi->getPlanetPanchangSunrise($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

//Get Chaughadiya Muhurta
$responseData6 = $vedicRishi->getChaughadiyaMuhurta($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

//Get Hora Muhurta
$responseData7 = $vedicRishi->getHoraMuhurta($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);



// print response data. Change the name of variable to get the respective panchang response data
echo $responseData;
echo "\n";
