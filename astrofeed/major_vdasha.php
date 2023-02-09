<?php
/**
 * A PHP File to test Matching APIs from Vedic Rishi Astro
 * User: chandan
 * Date: 14/05/15
 * Time: 5:38 PM
 */

require_once 'src/VedicRishiClient.php';



/*$userId = "618703";
$apiKey = "26d56f9cab3249f7fbc681360fd0d52c";*/


/*$userId = "619045";
$apiKey = "c3352b8a5ff7a25aa5878ced4f1f62d9";*/
// $userId = "618587";
// $apiKey = "52ff1a4df954feedaf881a36def79423";


// $userId ="621587";
// $apiKey = "22a5aa1d4a0f77037a82b749ab63b9f4";

$userId ="621731";
$apiKey = "e3d0b4033960d07c1010c5efcca6b535";

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


$resourceName = "major_vdasha";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->call($resourceName, $_POST['date'], $_POST['month'], $_POST['year'], $_POST['hour'], $_POST['minute'], $_POST['latitude'], $_POST['longitude'], $_POST['timezone']);


// print response data recieved from api.. data is in the JSON format
echo $responseData;;
echo "\n";
