<?php

require_once 'src/VedicRishiClient.php';

$rashi=$_POST['zodiacName'];

$userId = "618587";
$apiKey = "52ff1a4df954feedaf881a36def79423";

$data = array(
    'timezone' =>$_POST['timezone'],
);

$signArray = ['aries','taurus','gemini','cancer','leo','virgo','libra','scorpio','sagittarius','capricorn','aquarius','pisces'];


// instantiate VedicRishiClient class
$vedicRishi = new VedicRishiClient($userId, $apiKey);



// call prediction method of the VedicRishiClient call .. provides JSON response

$todaysPrediction = $vedicRishi->getTodaysPrediction($rashi, $data['timezone']);
$tomorrowsPrediction = $vedicRishi->getTomorrowsPrediction($rashi, $data['timezone']);
$yesterdaysPrediction = $vedicRishi->getYesterdaysPrediction($rashi, $data['timezone']);


// printing the JSON data on the screen/browser
//echo $todaysPrediction;
//echo $tomorrowsPrediction;
echo $yesterdaysPrediction;
