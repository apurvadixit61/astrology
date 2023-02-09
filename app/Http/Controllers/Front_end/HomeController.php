<?php

namespace App\Http\Controllers\Front_end;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front_end\AstrologyApiClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

//use App\Models\users;

class HomeController extends Controller
{

    public function index()
    {

        $users = DB::table('users')->where('user_type', 2)->take(6)->get();
        
        return view('front_end.main', compact('users'));
    }

    public function all()
    {
        $users = User::where('user_type', 2)->get();

        return response()->json([
            'data' => $users,
            'status' => 'true',
        ], 200);
    }

    public function kundli()
    {
        return view('front_end.free_kundli');
    }

    public function content_read($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function getKundli(Request $request)
    {
        $input = $request->all();
        $location = $request->input('birth_place');
        $address = str_replace(" ", "+", "$location");
        $map_where = 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyCZOsCzOOTKFoXCDI9e1yZvVCOTvDonerg&address=' . $address . '&sensor=false';
        $geocode = $this->content_read($map_where);
        $json = json_decode($geocode);
        $json = json_decode($geocode);
        if ($json->{'results'}) {
            $loc['lat'] = isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'}) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'} : 0;
            $loc['long'] = isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'}) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'} : 0;
        } else {
            $loc['lat'] = 0;
            $loc['long'] = 0;
        }

        $userId = "621874";
        $apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
        $date = explode('-', $input['birth_date']);
        $time = explode(':', $input['birth_time']);
        $charts=[];
        // make some dummy data in order to call astrology api
        $data = array(

            'date' => $date['2'],
            'month' => $date['1'],
            'year' => $date['0'],
            'hour' => $time['0'],
            'minute' => $time['1'],
            'latitude' => $loc['lat'],
            'longitude' => $loc['long'],
            'timezone' => 5.5,
            'prediction_timezone' => 5.5, // Optional. Only For Transit Prediction API
        );

    

        $request->session()->put('data', $data);

        $astrologyApi = new AstrologyApiClient($userId, $apiKey);
        $responseData = json_decode($astrologyApi->getBirthDetails($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
       
        $responseData1 = json_decode($astrologyApi->getAstroDetails($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $responseData2 = json_decode($astrologyApi->getPlanetsExtendedDetails($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $responseData3 = json_decode($astrologyApi->getMajorVimDasha($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $responseData4 = json_decode($astrologyApi->getKpPlanet($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $responseData5 = json_decode($astrologyApi->getKpPlanetCusps($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
      
        $responseData6 = json_decode($astrologyApi->getKpDetails($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $responseData7 = json_decode($astrologyApi->getMajorYoginiDasha($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $responseData8 = json_decode($astrologyApi->getPlanetNature($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        
        $kundli_chart = $this->getHoroChartImage(1);
        $nkundli_chart = $this->getHoroChartImage(9);
        $chalit_chart=$this->getHoroChartChalit();

        $result1 = json_decode($astrologyApi->getAscendantReport($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $result2 = json_decode($astrologyApi->getNakshatraReport($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $result3 = json_decode($astrologyApi->getBasicGemSuggestion($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));

   
        return view('front_end.kundli_view', compact('result1','result2','result3','chalit_chart','responseData', 'responseData1', 'responseData2', 'responseData3', 'responseData4','responseData5','responseData6', 'responseData7','responseData8','input', 'kundli_chart', 'nkundli_chart'));

    }

    public function getKundliImagesdata()
    {
        $d0=$this->getHoroChartImage(4);
        $d01=$this->getHoroChartImage(01);
        $d02=$this->getHoroChartImage(02);
        $d1=$this->getHoroChartImage(1);
        $d2=$this->getHoroChartImage(2);
        $d3=$this->getHoroChartImage(3);
        $d4=$this->getHoroChartImage(4);
        $d5=$this->getHoroChartImage(5);
        $d6=$this->getHoroChartImage(6);
        $d7=$this->getHoroChartImage(7);
        $d8=$this->getHoroChartImage(8);
        $d9=$this->getHoroChartImage(9);
        $d10=$this->getHoroChartImage(10);
        $d11=$this->getHoroChartImage(11);
        $d12=$this->getHoroChartImage(12);
        $d16=$this->getHoroChartImage(16);
        $d20=$this->getHoroChartImage(20);
        $d24=$this->getHoroChartImage(24);
        $d27=$this->getHoroChartImage(27);
        $d30=$this->getHoroChartImage(30);
        $d40=$this->getHoroChartImage(40);
        $d45=$this->getHoroChartImage(45);
        $d60=$this->getHoroChartImage(60);

       $charts=[$d0,$d01,$d02,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d16,$d20,$d24,$d27,$d30,$d40,$d45,$d60];
       return $charts;
    }

    public function getMahaDasha()
    {

        $userId = "621870";
        $apiKey = "a17fb357bdfd9a9dce49236671912c66";

        $data = session('data');
        $astrologyApi = new AstrologyApiClient($userId, $apiKey);

        $responseData4 = $astrologyApi->getMajorVimDasha($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

        return $responseData4;
    }
   function getMajorYoginiDasha()
   {
    $userId = "621870";
    $apiKey = "a17fb357bdfd9a9dce49236671912c66";

    $data = session('data');
    $astrologyApi = new AstrologyApiClient($userId, $apiKey);

    $responseData4 = $astrologyApi->getMajorYoginiDasha($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

    return $responseData4;
   }
    public function removePrevYear($array)
    {
        $result = [];
        $data = session('data');

        // $date=date('j-n-Y',strtotime($data['birth_date']));
        foreach (json_decode($array) as $arr) {
            $date1 = explode('-', explode(' ', $arr->end)[0]);
            if ($data['year'] <= $date1[2]) {
                array_push($result, $arr);
            }

        }

        return json_encode($result);

    }

    public function getAntarDasha($major_dasha)
    {

        $userId = "621870";
        $apiKey = "a17fb357bdfd9a9dce49236671912c66";

        $data = session('data');
        $astrologyApi = new AstrologyApiClient($userId, $apiKey);

        $responseData4 = $astrologyApi->getAntarVimDasha($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone'], $major_dasha);
        $responseData4 = $this->removePrevYear($responseData4);
        return $responseData4;
    }

    public function getPratyantarDasha($major_dasha, $antar_dasha)
    {

        $userId = "621870";
        $apiKey = "a17fb357bdfd9a9dce49236671912c66";

        $data = session('data');
        $astrologyApi = new AstrologyApiClient($userId, $apiKey);

        $responseData4 = $astrologyApi->getPratyantarVimDasha($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone'], $major_dasha, $antar_dasha);

        return $responseData4;
    }

    public function getSookshmadasha($major_dasha, $antar_dasha, $prantar_dasha)
    {

        $userId = "621870";
        $apiKey = "a17fb357bdfd9a9dce49236671912c66";

        $data = session('data');
        $astrologyApi = new AstrologyApiClient($userId, $apiKey);

        $responseData4 = $astrologyApi->getSookshmaVimDasha($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone'], $major_dasha, $antar_dasha, $prantar_dasha);

        return $responseData4;
    }

    public function getHoroChartImage($id)
    {

      
        $userId = "621870";
        $apiKey = "a17fb357bdfd9a9dce49236671912c66";
      

switch ($id) {
    case 01:
        $chart_id='horo_chart_image/SUN';
        break;
      case 02:
        $chart_id='horo_chart_image/MOON';
        break;
  case 1:
    $chart_id='horo_chart_image/D1';
    break;
  case 2:
    $chart_id='horo_chart_image/D2';
    break;
  case 3:
    $chart_id='horo_chart_image/D3';
    break;
  case 4:
        $chart_id='horo_chart_image/D4';
        break;
  case 5:
        $chart_id='horo_chart_image/D5';
        break;
  case 6:
        $chart_id='horo_chart_image/D6';
        break;
        case 7:
            $chart_id='horo_chart_image/D7';
            break;
          case 8:
            $chart_id='horo_chart_image/D8';
            break;
          case 9:
            $chart_id='horo_chart_image/D9';
            break;
            case 10:
                $chart_id='horo_chart_image/D10';
                break;
              case 11:
                $chart_id='horo_chart_image/D11';
                break;
              case 12:
                $chart_id='horo_chart_image/D12';
                break;
                case 16:
                    $chart_id='horo_chart_image/D16';
                    break;
                  case 20:
                    $chart_id='horo_chart_image/D20';
                    break;
                  case 24:
                    $chart_id='horo_chart_image/D24';
                    break;
                    case 27:
                        $chart_id='horo_chart_image/D27';
                        break;
                      case 30:
                        $chart_id='horo_chart_image/D30';
                        break;
                      case 40:
                        $chart_id='horo_chart_image/D40';
                        break;
                        case 45:
                            $chart_id='horo_chart_image/D45';
                            break;
                            case 60:
                                $chart_id='horo_chart_image/D60';
                                break;
  default:
  $chart_id='horo_chart_image/D1';

}
$data = session('data');
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
// $resourceName = "horo_chart_image/".$chart_id;
$responseData = $astrologyApi->call($chart_id, $data['date'], $data['month'], $data['year'], $data['hour'],
$data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

$xml = json_decode($responseData)->svg;
return $xml;die;
// $responseData4 = $astrologyApi->getHoroChartImage($data['date'], $data['month'], $data['year'], $data['hour'],
// $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

// return $responseData4;
}


public function getHoroChartChalit()
{


    $userId = "621874";
    $apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
  

$chart_id='horo_chart_image/chalit';

$data = session('data');
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
// $resourceName = "horo_chart_image/".$chart_id;
$responseData = $astrologyApi->call($chart_id, $data['date'], $data['month'], $data['year'], $data['hour'],
$data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

$xml = json_decode($responseData);
return $xml;die;
// $responseData4 = $astrologyApi->getHoroChartImage($data['date'], $data['month'], $data['year'], $data['hour'],
// $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

// return $responseData4;
}
public function change(Request $request)
{
App::setLocale($request->lang);
session()->put('locale', $request->lang);

return redirect()->back();
}


public function dailyHoroscope($zodiacSign)
{
    
    $userId = "621874";
    $apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
$responseData = $astrologyApi->getTodaysPrediction($zodiacSign,'5.5');
print_r($responseData);
}


public function chatWithAstrologer()
{

    return view('front_end.astrologers');

}


public function callWithAstrologer()
{

    return view('front_end.astrologers');

}

public function login()
{
    return view('front_end.login');


}

public function confirmrequest($id)
{
    return view('front_end.users.confirm',compact('id'));

}

public function getPlanetaryReport()
{
    
    $userId = "621874";
    $apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
    $result=[];
    
    $data = session('data');
    $astrologyApi = new AstrologyApiClient($userId, $apiKey);

    $planets=['sun','moon','mars','mercury','jupiter','venus','saturn'];
    foreach($planets as $planet)
    {
        $responseData = json_decode($astrologyApi->getGeneralHouseReport($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone'], $planet));

    array_push($result,$responseData);

    }

    return $result;
}

public function getRudhraksSuggest()
{

    $userId = "621874";
    $apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
      
    $data = session('data');
    $astrologyApi = new AstrologyApiClient($userId, $apiKey);

     $result = json_decode($astrologyApi->getRudrakshaSuggestion($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));

 

    return $result;

}


}