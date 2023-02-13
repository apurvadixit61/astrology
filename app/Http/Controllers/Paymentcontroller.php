<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;

use Illuminate\Support\Facades\Input;

use DB;

use Auth;

use Hash;

use Cookie;

use Illuminate\Support\Facades\Route;

use Hesabe\Payment\Payment as HesabePayment;

use App\Http\Controllers\HesabeCrypt;

use Illuminate\Support\Facades\Mail;



class PaymentController extends Controller

{  



 static  public function payment_processing($amount,$orderid){



        $hesabe = new HesabePayment(

                    'jAvkVmK6XN3e8L6ZXjNaqL5ZBd0zbwWx',

                    'XN3e8L6ZXjNaqL5Z',

                    '700be2a6-8d97-4617-a9db-9e145d7f030e',

                    true

                );

                

        $a = $hesabe->checkout([

            "merchantCode" => '642616',

            "amount" => $amount,

            "paymentType" => "1",

            "responseUrl" =>url(''),

            "failureUrl" => url(''),

            "orderReferenceNumber" => $orderid,

            "variable1" => null,

            "variable2" => null,

            "variable3" => null,

            "variable4" => null,

            "variable5" => null,

            "version" => "2.0",

        ]);

        // dd($a);        



    //     $posturl= 'https://sandbox.hesabe.com/checkout'; 



    //     $data =array();

    //     $data['MerchantCode'] ='642616'; // For Test

    //     $data['Ptype'] = "1";

    //     $data['SuccessUrl'] = url('');

    //     $data['FailureUrl'] = url('');

    //     $data['Amount'] = $amount;

    //     $data['orderReferenceNumber'] = $orderid;

        

    //     $ch = curl_init($posturl);

    //     curl_setopt($ch, CURLOPT_HEADER, false);

    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

    //     curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

    //   $result=curl_exec($ch);

    //     if (curl_error($ch))

    //     {

    //          return array("status"=>'failure','message'=>'Something went wrong, please try again');  

    //     }



    // return $result=json_decode($result);

   }



  public function payment_status(Request $request){

     $input_ = $request->except("_token");

    //  $encryptionKey = "PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg";

     $encryptionKey = "jAvkVmK6XN3e8L6ZXjNaqL5ZBd0zbwWx";

    //  $ivKey = "5NVdrlPVNnjo2Jy9";

     $ivKey = "XN3e8L6ZXjNaqL5Z";

    //   $hesabe = new HesabePayment(

    //                 'jAvkVmK6XN3e8L6ZXjNaqL5ZBd0zbwWx',

    //                 'XN3e8L6ZXjNaqL5Z',

    //                 '700be2a6-8d97-4617-a9db-9e145d7f030e',

    //                 false

    //             );

     

    $encryptedData = HesabeCrypt::decrypt($input_['data'], $encryptionKey, $ivKey); 

     $input = json_decode($encryptedData, true);

    //  dd($input);

      $check = Payment::where('id',$input['response']['orderReferenceNumber']);

      $json = array("result"=>false,"message"=>"Something went wrong");

      if(!$check->first()){

        $json['message'] = "id not found";

        return view('payment_status',compact('json'));

      }

      

      $save["status"] = ($input['status'])?'Completed':'Failed';

      $save["payment_token"] = $input['response']['paymentToken'];

      $save["payment_id"] = $input['response']['paymentId'];

      $save["paid_on"] = $input['response']['paidOn'];

      

      

      $check->update($save);

        

        if($input['status'] == false){

         $json['result'] = false;

         $json['message'] = "payment Failed";

        }else{

         $json['result'] = true;

         $json['message'] = "Payment successfull";

        }

         

        

         $subject = "Course Registeration has been made";

         $booking = Payment::join('course','payment.course_id','=','course.id')

                      ->join('batch','payment.batch_id','=','batch.id')

                      ->join('students','students.id','=','payment.login_id')

                      ->select('course.name as course_name','payment.status as payment_status','course.fees',

                               'batch.open_time','batch.close_time','batch.start_date','batch.end_date',

                               'batch.days','students.name as student_name','students.email','students.mobile','students.address','course.id as course_id')

                      ->where('payment.id',$input['response']['orderReferenceNumber'])

                      ->first();

         $booking_ = $booking->toArray();

         $emails[] = $booking_['email'];

         $emails[] = 'coach.afra7@gmail.com';

         Mail::send('emails.course_purchase', $booking_, function($message) use ($emails, $subject)

                {    

                    $message->to($emails)->subject($subject);    

                });   



        return view('payment_status',compact('json'));

  }

  

  

  public function purchaseCourse(Request $request){

       

       if(!isset($request->course_id) || !isset($request->batch_id) || !isset($request->price)){

           return redirect()->back()->with('emessage',"Course_id and batch_id is required");

        }    

       

    //   dd($request->input());

      $id =Auth::guard('customer')->user()->id;

      

      if(!$id){

               return redirect()->back()->with('emessage',"Please Login and try again");;

      }

      

      $check = Payment::where('course_id',$request->course_id)

                        ->where('batch_id',$request->batch_id)

                        ->where('login_id',$id)

                        ->where('status','Completed')->first();

                        

       if($check){

                  return redirect()->back()->with('emessage',"You already buy this course");

       }                        

      

       $add= Payment::create([

            'login_id' => $id,

            'course_id' => $request->course_id,

            'price' => $request->price,

            'batch_id' => $request->batch_id

         ]);

         

        $hesabe = new HesabePayment(

                    'jAvkVmK6XN3e8L6ZXjNaqL5ZBd0zbwWx',

                    'XN3e8L6ZXjNaqL5Z',

                    '700be2a6-8d97-4617-a9db-9e145d7f030e',

                    false

                );

        // $hesabe = new HesabePayment(

        //             'PkW64zMe5NVdrlPVNnjo2Jy9nOb7v1Xg',

        //             '5NVdrlPVNnjo2Jy9',

        //             'c333729b-d060-4b74-a49d-7686a8353481',

        //             true

        //         );

                

        $a = $hesabe->checkout([

            "merchantCode" => '23640220',

            // "merchantCode" => '842217',

            "amount" => $request->price,

            "paymentType" => "0",

            "responseUrl" =>url('payment_status'),

            "failureUrl" => url('payment_status'),

            "orderReferenceNumber" => $add->id,

            "version" => "2.0",

        ]);



      dd($a);

  }

    

  public function purchaseCourses(Request $request){





   $save = [

            "merchantCode" => '23640220',

            "amount" => 20,

            "paymentType" => "1",

            "responseUrl" =>url(''),

            "failureUrl" => url(''),

            "orderReferenceNumber" => 9978978,

            "variable1" => null,

            "variable2" => null,

            "variable3" => null,

            "variable4" => null,

            "variable5" => null,

            "version" => "2.0",

        ];

   

    $ivKey = 'XN3e8L6ZXjNaqL5Z';

    $encryptionKey = 'jAvkVmK6XN3e8L6ZXjNaqL5ZBd0zbwWx';

    $accessCode = '700be2a6-8d97-4617-a9db-9e145d7f030e';

    // $checkoutApiUrl = HSB_CHECKOUT_API_URL;

    // $paymentUrl = HSB_PAYMENT_URL;

    

    $requestDataJson = json_encode($save);

    $encryptedData = HesabeCrypt::encrypt($requestDataJson, $encryptionKey, $ivKey); 

    

    $baseUrl = "https://api.hesabe.com";

    $checkoutApiUrl = "$baseUrl/checkout";

    $checkoutRequestData = new Request([ 'data' => $encryptedData ]);

    $checkoutRequest = Request::create($checkoutApiUrl, 'POST', $checkoutRequestData->all());

    $checkoutRequest->headers->set('accessCode', $accessCode);

    $checkoutRequest->headers->set('Accept', 'application/json');   // Only for JSON response

    // dd($checkoutRequest);

    $checkoutResponse = \Route::dispatch($checkoutRequest);

    // $checkoutResponse = app()->handle($checkoutRequest);

    // $checkoutResponseContent = $checkoutResponse->content();

   dd($checkoutResponse);

    $decryptedResponse = HesabeCrypt::decrypt($checkoutResponseContent, $encryptionKey, $ivKey);

$responseDataJson = json_decode($decryptedResponse);



$baseUrl = "https://sandbox.hesabe.com";

$paymentUrl = "$baseUrl/payment";

$responseToken = $responseDataJson->response->data;

return Redirect::to($paymentUrl . '?data='. $responseToken);

  }

  



  public function transactions(Request $request){

  $id =  Auth::guard('customer')->user()->id;;

   $transactions = Payment::join('course','payment.course_id','=','course.id')

                      ->join('batch','payment.batch_id','=','batch.id')

                      ->select('course.*','payment.*','batch.*','payment.status as payment_status','payment.created_at as created_payment')

                      ->where('payment.login_id',$id)

                      ->orderBy('payment.id','DESC')

                      ->get();

      return view('transactions', compact('transactions'));

  }



}

