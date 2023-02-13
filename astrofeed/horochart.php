<?php
/**
 * A PHP File to test Matching APIs from Vedic Rishi Astro
 * User: chandan
 * Date: 14/05/15
 * Time: 5:38 PM
 */
// header("Content-type: image");

require_once 'src/VedicRishiClient.php';


/*$userId = "619045";
$apiKey = "c3352b8a5ff7a25aa5878ced4f1f62d9";*/
// $userId = "618587";
// $apiKey = "52ff1a4df954feedaf881a36def79423";
// $userId ="617917";
// $apiKey = "d88039a31deefe3cc664b8b7a4ae383e";
$userId ="621870";
$apiKey = "a17fb357bdfd9a9dce49236671912c66";




$data = array(
    'date' =>  $_GET['date'],
    'month' => $_GET['month'],
    'year' =>$_GET['year'],
    'hour' =>  $_GET['hour'],
    'minute' => $_GET['minute'],
    'latitude' =>$_GET['latitude'],
    'longitude' => $_GET['longitude'],
    'timezone' =>$_GET['timezone']
    );
$chart_id=$_GET['chart_id'];
 $resourceName = "horo_chart_image/:chalit";
//  echo $resourceName;
//  $resourceName1 = "horo_chart_image/:D9";
//  $resourceName2 = "horo_chart_image/:chalit";
//  $resourceName3 = "horo_chart/:D1";
//  $resourceName4 = "horo_chart/:D9";
//  $resourceName5 = "horo_chart/:chalit";
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->call($resourceName, $data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

$xml=json_decode($responseData)->svg;
 echo $xml;
 
//  print_r($responseData3); echo "<br>";
//  print_r($responseData4);echo "<br>";
//  print_r($responseData5);echo "<br>";
 die;
$image = new Imagick();
$image->readImageBlob($xml);

$image->setImageFormat('jpg');

header('Content-type: image/jpeg');
ob_clean();

$thumbnail =  $image->getImageBlob();

$filename='horoscope/'.$name.'.jpg';

// Give a name to file
$image->setImageFilename($filename);
  
// Write the image
$test=$image->writeImage();

// $response=array('status'=>true,'message'=>"Your kundali generate sucessfully",'data'=>$filename,'url'=>'http://md-54.whb.tempwebhost.net/~democdyb/astrologer/astrofeed/');
// echo json_encode($response);
