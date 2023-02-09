<?php
/**
 * A PHP File to test Matching APIs from Vedic Rishi Astro
 * User: chandan
 * Date: 14/05/15
 * Time: 5:38 PM
 */

require_once 'src/VedicRishiClient.php';


/*$userId = "618890";
$apiKey = "e6f5caa115206a87cc6d4b06d7490763";
*/
/*$userId = "619045";
$apiKey = "c3352b8a5ff7a25aa5878ced4f1f62d9";*/
// $userId = "618587";
// $apiKey = "52ff1a4df954feedaf881a36def79423";

// $userId ="617917";
// $apiKey = "d88039a31deefe3cc664b8b7a4ae383e";
//amituseraccoubnt
// $userId ="621587";
// $apiKey = "22a5aa1d4a0f77037a82b749ab63b9f4";
// create a male profile data
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



$res7 = $vedicRishi->matchdaskootPoints($data, $femaleData);









// print response data recieved from api.. data is in the JSON format
echo $res7;
echo "\n";