<?php
/**
 * A PHP File to test Matching APIs from Vedic Rishi Astro
 * User: chandan
 * Date: 14/05/15
 * Time: 5:38 PM
 */

require_once 'src/VedicRishiClient.php';
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

/*$userId = "618890";
$apiKey = "e6f5caa115206a87cc6d4b06d7490763";*/
/*$userId = "619045";
$apiKey = "c3352b8a5ff7a25aa5878ced4f1f62d9";*/
// create a male profile data

// $userId = "618587";
// $apiKey = "52ff1a4df954feedaf881a36def79423";

// $userId ="621587";
// $apiKey = "22a5aa1d4a0f77037a82b749ab63b9f4";

$userId ="621731";
$apiKey = "e3d0b4033960d07c1010c5efcca6b535";


$data = array(

   
    
    
    'date' => $_POST['f_date'],
    'month' => $_POST['f_month'],
    'year' =>$_POST['f_year'],
    'hour' =>$_POST['f_hour'],
    'minute' =>$_POST['f_minute'],
    'latitude' => $_POST['f_latitude'],
    'longitude' =>  $_POST['f_longitude'],
    'timezone' =>$_POST['f_timezone']
);
    

// create female data and will treat above $data as male data to be sent to matchmaking api
$femaleData = array(

    
 'date' => $_POST['m_date'],
    'month' => $_POST['m_month'],
    'year' => $_POST['m_year'],
    'hour' => $_POST['m_hour'],
    'minute' =>$_POST['m_minute'],
    'latitude' =>$_POST['m_latitude'],
    'longitude' => $_POST['m_longitude'],
    'timezone' =>$_POST['m_timezone']

);
// instantiate VedicRishiClient class
$vedicRishi = new VedicRishiClient($userId, $apiKey);


// call method of vedicrishiclient for matching apis
$res = $vedicRishi->matchObstructions($data, $femaleData);

$res1 = $vedicRishi->matchAshtakootPoints($data, $femaleData);

$res2 = $vedicRishi->matchBirthDetails($data, $femaleData);

$res3 = $vedicRishi->matchPlanetDetails($data, $femaleData);

$res4 = $vedicRishi->matchAstroDetails($data, $femaleData);

$res5 = $vedicRishi->getMatchMakingReport($data, $femaleData);

$res6 = $vedicRishi->getMatchSimpleReport($data, $femaleData);

$res7 = $vedicRishi->getMatchManglikReport($data, $femaleData);










// print response data recieved from api.. data is in the JSON format
echo $res1;
echo "\n";