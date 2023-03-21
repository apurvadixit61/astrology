<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class HoroscopeController extends Controller
{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()
    {

        // $this->middleware('auth');

    }

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function horoscope_list()
    {
        $countNotification = DB::select('select count(*) as total_notification from notification');
        $countCustomer = DB::select('select count(*) as total_customer from users where `user_type`=1');
        $countAstro = DB::select('select count(*) as total_astrologer from users where `user_type`=2');
        $countKundli = DB::select('select count(*) as total_kundli from kundli');

        $Customer = DB::select('select * from users where `user_type`=1');
        $Astro = DB::select('select * from users where `user_type`=2');

        return view('front_end.horoscope', ['countAstro' => $countAstro, 'countCustomer' => $countCustomer, 'countKundli' => $countKundli, 'countNotification' => $countNotification, 'Customer' => $Customer, 'Astro' => $Astro]);

    }

    public function horoscope_details(Request $request,$star)
    {

        $data['star']=$star;
        return view('front_end.horoscope_details',$data);

    }
   
    

  
}
