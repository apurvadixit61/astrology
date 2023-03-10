<?php

namespace App\Http\Controllers\Front_end;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front_end\AstrologyApiClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

//use App\Models\users;

class HomeController extends Controller
{

    public function index()
    {

        $users = DB::table('users')->where('user_type', 2)->take(6)->get();
        
        return view('front_end.main', compact('users'));
    }

    public function signup()
    {
        return view('front_end.signup');

    }

    public function all()
    {
        $wallets=0;
        if(Auth::guard('users')->check()==1 && Auth::guard('users')->user()->user_type == 1)
        {
            
            $id=Auth::guard('users')->user()->id;
            $wallets=DB::table('wallet_system')->select('wallet_amount')->where('user_id',$id)->first();

            if(!empty($wallets)){$wallets=$wallets->wallet_amount;}else{$wallets=0;}
            
        }

        $users = User::where('user_type', 2)->get();


        return view('front_end.astrologers', compact('users','wallets'));

        // return response()->json([
        //     'data' => $users,
        //     'status' => 'true',
        // ], 200);
    }

    public function kundli()
    {
        $kundlis=[];
        if(Auth::guard('users')->check()==1)
        {
            $id=Auth::guard('users')->user()->id;
        $kundlis=DB::table('kundli')->where('user_id',$id)->orderBy('id', 'DESC')->get();
        }
        return view('front_end.free_kundli',compact('kundlis'));
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

        if(empty($input))
        {
            return redirect()->back();

        }
        $location = $request->input('birth_place');
        $address = str_replace(" ", "+", "$location");
        $map_where = 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&address=' . $address . '&sensor=false';
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

         if(Auth::guard('users')->check()==1)
         {
           
            $insert=['user_id'=>Auth::guard('users')->user()->id,
            'kundli_user_name'=>$input['full_name'],'birthday_year'=>$date['0'],'birth_day'=>$date['2'],'birth_month'=>$date['1'],
            'birth_time'=>$input['birth_time'],'birth_place'=>$input['birth_place'],'birth_time_mintus'=>$time['1'],'birth_time_hrs'=>$time['0'],'lat'=>$loc['lat'],'long'=>$loc['long'],'time_zone'=>'5.5'];
            $kundli=DB::table('kundli')->where($insert)->first();

            if(empty($kundli))
            {
                DB::table('kundli')->insert($insert);
            }
         }
       

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
        $responseData9 = json_decode($astrologyApi->getManglikDetails($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $responseData10 = json_decode($astrologyApi->getKalsarpaDetails($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $responseData11 = json_decode($astrologyApi->getSadhesatiLifeDetails($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
         
        $kundli_chart = $this->getHoroChartImage(1)['svg'];
        $nkundli_chart = $this->getHoroChartImage(9)['svg'];
        $chalit_chart=$this->getHoroChartChalit();

        $result1 = json_decode($astrologyApi->getAscendantReport($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $result2 = json_decode($astrologyApi->getNakshatraReport($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));
        $result3 = json_decode($astrologyApi->getBasicGemSuggestion($data['date'], $data['month'], $data['year'], $data['hour'], $data['minute'], $data['latitude'], $data['longitude'], $data['timezone']));

   
        return view('front_end.kundli_views', compact('result1','result2','result3','chalit_chart','responseData', 'responseData1', 'responseData2', 'responseData3', 'responseData4','responseData5','responseData6', 'responseData7','responseData8','responseData9','responseData10','responseData11','input', 'kundli_chart', 'nkundli_chart'));

    }

    public function matchmaking(Request $request)
    {
        $maleBirthData=[];
        $femaleBirthData=[];
        $input=$request->all();
        $f_date=explode('-',$request->input('f_birth_date'));
        $m_date=explode('-',$request->input('m_birth_date'));
        $f_time=explode(':',$request->input('f_birth_time'));
        $m_time=explode(':',$request->input('m_birth_time'));

        $f_location = $request->input('f_birth_place');
        $f_address = str_replace(" ", "+", "$f_location");
        $map_where_f = 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&address=' . $f_address . '&sensor=false';
        $geocode = $this->content_read($map_where_f);
        $json = json_decode($geocode);
        $json = json_decode($geocode);
        if ($json->{'results'}) {
            $f_loc['lat'] = isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'}) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'} : 0;
            $f_loc['long'] = isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'}) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'} : 0;
        } else {
            $f_loc['lat'] = 0;
            $f_loc['long'] = 0;
        }

        $m_location = $request->input('m_birth_place');
        $m_address = str_replace(" ", "+", "$m_location");
        $map_where_m = 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&address=' . $m_address . '&sensor=false';
        $geocode = $this->content_read($map_where_m);
        $json = json_decode($geocode);
        $json = json_decode($geocode);
        if ($json->{'results'}) {
            $m_loc['lat'] = isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'}) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'} : 0;
            $m_loc['long'] = isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'}) ? $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'} : 0;
        } else {
            $m_loc['lat'] = 0;
            $m_loc['long'] = 0;
        }
     

             $maleBirthData['date']=$m_date[2];
             $maleBirthData['month']=$m_date[1];
             $maleBirthData['year']=$m_date[0];
             $maleBirthData['hour']=$m_time[0];
             $maleBirthData['minute']=$m_time[1];
             $maleBirthData['latitude']=$m_loc['lat'];
             $maleBirthData['longitude']=$m_loc['long'];
             $maleBirthData['timezone']='5.5';
       
       
            $femaleBirthData['date']=$f_date[2];
            $femaleBirthData['month']=$f_date[1];
            $femaleBirthData['year']=$f_date[0];
            $femaleBirthData['hour']=$f_time[0];
            $femaleBirthData['minute']=$f_time[1];
            $femaleBirthData['latitude']=$f_loc['lat'];
            $femaleBirthData['longitude']=$f_loc['long'];
            $femaleBirthData['timezone']='5.5';

      
    $userId = "621870";
    $apiKey = "a17fb357bdfd9a9dce49236671912c66";

    $astrologyApi = new AstrologyApiClient($userId, $apiKey);
    $responseData = json_decode($astrologyApi->matchBirthDetails($maleBirthData, $femaleBirthData));
    $responseData1 = json_decode($astrologyApi->matchAshtakootPoints($maleBirthData, $femaleBirthData));
 
        return view('front_end.matchmaking',compact('responseData','responseData1','input'));
    }

    public function getKundliImagesdata()
    {
        $d0=$this->getHoroChartImage(00);
        $d01=$this->getHoroChartImage(01);
        $d02=$this->getHoroChartImage(02);
        $d1=$this->getHoroChartImage(1);
        $d2=$this->getHoroChartImage(2);
        $d3=$this->getHoroChartImage(3);
        $d4=$this->getHoroChartImage(4);
        $d5=$this->getHoroChartImage(5);
        $d7=$this->getHoroChartImage(7);
        $d8=$this->getHoroChartImage(8);
        $d9=$this->getHoroChartImage(9);
        $d10=$this->getHoroChartImage(10);
        $d12=$this->getHoroChartImage(12);
        $d16=$this->getHoroChartImage(16);
        $d20=$this->getHoroChartImage(20);
        $d24=$this->getHoroChartImage(24);
        $d27=$this->getHoroChartImage(27);
        $d30=$this->getHoroChartImage(30);
        $d40=$this->getHoroChartImage(40);
        $d45=$this->getHoroChartImage(45);
        $d60=$this->getHoroChartImage(60);

       $charts=[$d0,$d01,$d02,$d1,$d2,$d3,$d4,$d5,$d7,$d8,$d9,$d10,$d12,$d16,$d20,$d24,$d27,$d30,$d40,$d45,$d60];
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
    case 00:
        $chart_id='horo_chart_image/D1';
        $name='Chalit';
        break;

    case 01:
        $chart_id='horo_chart_image/SUN';
        $name='SUN';
        break;
      case 02:
        $chart_id='horo_chart_image/MOON';
        $name='MOON';

        break;
  case 1:
    $chart_id='horo_chart_image/D1';
    $name='Brith';

    break;
  case 2:
    $chart_id='horo_chart_image/D2';
    $name='Hora';

    break;
  case 3:
    $chart_id='horo_chart_image/D3';
    $name='Dreshkan';

    break;
  case 4:
        $chart_id='horo_chart_image/D4';
        $name='Chathurthamasha';

        break;
  case 5:
        $chart_id='horo_chart_image/D5';
        $name='Panchmansha';

        break;

        case 7:
            $chart_id='horo_chart_image/D7';
            $name=' Saptamansha';

            break;
          case 8:
            $chart_id='horo_chart_image/D8';
        $name='Ashtamansha';

            break;
          case 9:
            $chart_id='horo_chart_image/D9';
        $name='Navamansha';

            break;
            case 10:
                $chart_id='horo_chart_image/D10';
        $name='Dashamansha';

                break;
            

                break;
              case 12:
                $chart_id='horo_chart_image/D12';
                $name='Dwadashamsha';

                break;
                case 16:
                    $chart_id='horo_chart_image/D16';
        $name='Shodashamsha';

                    break;
                  case 20:
                    $chart_id='horo_chart_image/D20';
        $name='Vishamansha';

                    break;
                  case 24:
                    $chart_id='horo_chart_image/D24';
        $name='Chaturvimshamsha';

                    break;
                    case 27:
                        $chart_id='horo_chart_image/D27';
        $name='Bhamsha';

                        break;
                      case 30:
                        $chart_id='horo_chart_image/D30';
        $name='Trishamansha';

                        break;
                      case 40:
                        $chart_id='horo_chart_image/D40';
        $name='Khavedamsha';

                        break;
                        case 45:
                            $chart_id='horo_chart_image/D45';
        $name='Akshvedansha';

                            break;
                            case 60:
                                $chart_id='horo_chart_image/D60';
        $name='Shashtymsha';

                                break;
  default:
  $chart_id='horo_chart_image/D1';
  $name='Chalit';


}
$data = session('data');
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
// $resourceName = "horo_chart_image/".$chart_id;
$responseData = $astrologyApi->call($chart_id, $data['date'], $data['month'], $data['year'], $data['hour'],
$data['minute'], $data['latitude'], $data['longitude'], $data['timezone']);

$xml = json_decode($responseData)->svg;
return array('svg'=>$xml,'name'=>$name);die;
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

//horoscope search
public function dailyHoroscope($zodiacSign,Request $request)
{
    
$userId = "621874";
$apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
$responseData = $astrologyApi->getTodaysPrediction($zodiacSign,'5.5');
print_r($responseData);
}

public function tomorrow_horoscope($zodiacSign,Request $request)
{
    
$userId = "621874";
$apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
$responseData = $astrologyApi->getTomorrowsPrediction($zodiacSign,'5.5');
print_r($responseData);
}


public function weekly_horoscope($zodiacSign,Request $request)
{
    
$userId = "621874";
$apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
//$responseData = $astrologyApi->getConsolidatedPrediction($zodiacSign,'5.5');
$responseData = $astrologyApi->getYesterdaysPrediction($zodiacSign,'5.5');
print_r($responseData);
}


public function monthly_horoscope($zodiacSign,Request $request)
{
    
$userId = "621874";
$apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
$responseData = $astrologyApi->gethoroscopeMonthly($zodiacSign,'5.5');
print_r($responseData);die;
}

public function yearly_horoscope($zodiacSign,Request $request)
{
    
$userId = "621874";
$apiKey = "c2d2c9dc5fb9fac47890d43158bad0cd";
$astrologyApi = new AstrologyApiClient($userId, $apiKey);
$responseData = $astrologyApi->getConsolidatedPrediction($zodiacSign,'5.5');
print_r($responseData);
}

/// horoscope end



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
    $user=DB::table('users')->where('id',$id)->first();
    return view('front_end.users.confirm',compact('id','user'));

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

public function razorPaySuccess(){
    $user_id =Auth::guard('users')->user()->id;
    
    $product_id=$_POST['product_id'];
    //$user_id=$_POST['user_id'];
    $payment_id=$_POST['payment_id'];
    $amount=$_POST['amount'];
    
   
    $data = [
              'user_id' =>$user_id ,
              'product_id' =>$product_id ,
              'r_payment_id' => $payment_id,
              'amount' => $amount,
           ];
    
 
   $checkuser = DB::table('users')->where('id',$user_id)->get();
   if($checkuser)
   {
    $wallet_system = DB::table('wallet_system')->where('user_id',$user_id)->get();
    $wallet_system_check=count($wallet_system);
    if($wallet_system_check > 0 ){
        $avble_bal= $wallet_system[0]->wallet_amount;
        $new_bal=$amount;
        $total_bal=$avble_bal + $new_bal;
        $setdata['wallet_amount']=  $total_bal;
        $result = DB::table('wallet_system')->where('user_id',$user_id)->update($setdata);
        $data['status'] = "true";
        $data['user_id'] =$user_id;
        $data['wallet_amount'] =$total_bal;
        $data['message'] ='Your Wallet amount udapted sucessfully';
    }else{
         $payment_method="Online";
         $setdata=   array(
        'user_id'=>  $user_id,
        'payment_method'=> $payment_method,
        'payment_status'=>  'paid',
        'wallet_amount'=>  $amount,
        'trancation_id'=>  $payment_id,
        'status'=>  1,);
           $resultlastid = DB::table('wallet_system')->insertGetId($setdata);
           $data['status'] = "true";
           $data['user_id'] =$user_id;
           $data['wallet_amount'] =$amount;
           $data['message'] ='Your Wallet amount added sucessfully';
    }

    $payment_method="Online";
    $setdata=   array(
   'user_id'=>  $user_id,
   'payment_method'=> $payment_method,
   'payment_status'=>  'paid',
   'wallet_amount'=>  $amount,
   'trancation_id'=>  $payment_id,
   'status'=>  1,);
      DB::table('trancation_histroy')->insertGetId($setdata);
        
    }else{
           $data['data'] = '';
           $data['status'] = false;
           $data['message'] = "User does not exist";
           
    }

  
   return json_encode($data);

    

}

// rozarpay thankyou
public function RazorThankYou()
{
  return view('thankyou');
}

public function kundli_detail($id)
{
    return view('front_end.users.chatIntake',compact('id'));
   
}


}