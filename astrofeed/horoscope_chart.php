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
$userId ="621731";
$apiKey = "e3d0b4033960d07c1010c5efcca6b535";
// $data = array(
// 'date' => 25,
// 'month' => 12,
// 'year' => 1988,
// 'hour' => 4,
// 'minute' => 0,
// 'latitude' => 25.123,
// 'longitude' => 82.34,
// 'timezone' => 5.5
// );

$data = array(
 'date' =>  $_POST['date'],
 'month' => $_POST['month'],
 'year' =>$_POST['year'],
 'hour' =>  $_POST['hour'],
 'minute' => $_POST['minute'],
 'latitude' =>$_POST['latitude'],
 'longitude' => $_POST['longitude'],
 'timezone' =>$_POST['timezone']
 );

$id=$_POST['id'];
$name=$_POST['name'];
$chard_id=$_POST['chard_id'];

/*if(isset($_POST['date'])){

 $date = $_POST['date'];
 $month = $_POST['month'];
 $year = $_POST['year'];
 $hour = $_POST['hour'];
 $minute = $_POST['minute'];
 $latitude = $_POST['latitude'];
 $longitude = $_POST['longitude'];
 $timezone = $_POST['timezone'];
  }*/

//print_r($_POST);die;
 $resourceName = "horo_chart_image/:".$chard_id;
$vedicRishi = new VedicRishiClient($userId, $apiKey);
$responseData = $vedicRishi->call($resourceName, $data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

$xml=json_decode($responseData)->svg;
 echo $xml;die;
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
