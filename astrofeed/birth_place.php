


<?php
/**
 * A PHP File to test Matching APIs from Vedic Rishi Astro
 * User: Durgesh
 * Date: 21/01/2022
 * Time: 5:38 PM
 */

require_once 'src/VedicRishiClient.php';


/*$userId = "618703";
$apiKey = "26d56f9cab3249f7fbc681360fd0d52c";*/

/*$userId = "618890";
$apiKey = "e6f5caa115206a87cc6d4b06d7490763";*/

/*$userId = "619045";
$apiKey = "c3352b8a5ff7a25aa5878ced4f1f62d9";*/

// $userId = "618587";
// $apiKey = "52ff1a4df954feedaf881a36def79423";

$userId ="621587";
$apiKey = "22a5aa1d4a0f77037a82b749ab63b9f4";
 
 if(isset($_POST['date'])){
 
 $date = $_POST['date'];
 $month = $_POST['month'];
 $year = $_POST['year'];
 $hour = $_POST['hour'];
 
 $minute = $_POST['minute'];
 $latitude = $_POST['latitude'];
 $longitude = $_POST['longitude'];
 $timezone = $_POST['timezone'];
  }


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
$resourceName = "birth_details";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->call($resourceName, $data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);




// print response data recieved from api.. data is in the JSON format
echo $responseData;
echo "\n";