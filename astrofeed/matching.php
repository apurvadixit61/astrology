<?php
/**
 * A PHP File to test Matching APIs from Vedic Rishi Astro
 * User: chandan
 * Date: 14/05/15
 * Time: 5:38 PM
 */

require_once 'src/VedicRishiClient.php';

$userId ="621731";
$apiKey = "e3d0b4033960d07c1010c5efcca6b535";
/*$userId = "618703";
$apiKey = "26d56f9cab3249f7fbc681360fd0d52c";*/
/*$userId = "619045";
$apiKey = "c3352b8a5ff7a25aa5878ced4f1f62d9";*/
// $userId = "618587";
// $apiKey = "52ff1a4df954feedaf881a36def79423";
// create a male profile data
$data = array(

    'date' => 25,
    'month' => 12,
    'year' => 1988,
    'hour' => 4,
    'minute' => 0,
    'latitude' => 25.123,
    'longitude' => 82.34,
    'timezone' => 5.5
);
// create female data and will treat above $data as male data to be sent to matchmaking api
$femaleData = array(

    'date' => 27,
    'month' => 1,
    'year' => 1990,
    'hour' => 13,
    'minute' => 36,
    'latitude' => 25.123,
    'longitude' => 82.34,
    'timezone' => 5.5
);


$resourceName = "match_astro_details";
// instantiate VedicRishiClient class
$vedicRishi = new VedicRishiClient($userId, $apiKey);


// call method of vedicrishiclient for matching apis



$res7 = $vedicRishi->matchAstroDetails($data, $femaleData);









// print response data recieved from api.. data is in the JSON format
echo $res7;
echo "\n";