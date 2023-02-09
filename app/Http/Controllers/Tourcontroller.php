<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use url;

use Validator;

use Auth;

use Session;





class Tourcontroller extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');



  

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {



      $users = DB::table('tour')->select('*')->get();



        return view('tour', ['users' => $users]);

       

    }





       public function add_tour()

    {



        $required_accessories = DB::table('product')->select('*')->get();

        return view('add_tour', ['required_accessories' => $required_accessories]);

       

    }









 public function addtour(Request $request){

      

        //  $data = $request->img;

        //   print_r($data); die;

    //  echo"<pre>";

    //   $data =$request->input();

    //     print_r($data); die;



            $destinationPath = base_path() . '/images/tour/';  

            $photo = $request->img;           

            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());

             $photo_name = '/'.time().$photo->getClientOriginalName();



             $galleryphotos = $request->gallery_img;



              if($galleryphotos){

              foreach ($galleryphotos as $key => $galleryphoto) {







            $destinationPath = base_path() . '/images/tour/gallery/';         

            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());

            $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());

             // $gallery_name = implode(',',$multi);

          }

          }



            $getgallery = implode(",",$multi);

            $required_accessories = implode(",",$request->required_accessories);



             $discountper = $request->discount_percent;

             $price = $request->price;

             $discount_pr =  ($price * $discountper / 100);

             $discount_price =($price - $discount_pr);



              $including = implode(",",$request->including);

              $exincluding = implode(",",$request->exincluding);
              $section_type = implode(',', $request->section_type);
        

 

              $input['name'] =$request->name;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['child'] =$request->child;

              $input['adult'] =$request->adult;

              $input['discount_price'] =$discount_price;

              $input['trip'] =$request->trip;

              $input['including'] =$including;

              $input['exincluding'] =$exincluding;

              $input['location'] =$request->address;

              $input['type'] =$request->type;

              $input['image'] =$photo_name;

              $input['gallery_img'] =$getgallery;

              $input['required_accessories'] =$required_accessories;

              $input['section_type'] = $section_type;

              $input['resource_location'] =$request->tour_resource;

              $input['resource_lat'] =$request->resource_lat;

              $input['resource_long'] =$request->resource_lng;

              $input['destiny_lat'] =$request->lat;

              $input['destiny_long'] =$request->lng;
              $input['quantity'] =$request->quantity;
              


/* echo"<pre>";

 print_r($input); die;*/

           $result = DB::table('tour')->insert(array($input));

     /* $id = DB::getPdo()->lastInsertId();*/

 /* print_r($id); die;*/

     

        if($result){



           return redirect()->back()->with('message', ' Tour add successfully .');



        }

        else{



            return redirect()->back()->with('message', 'Not Insert .');

        }

    }







public function status_changetour(Request $request)

    {

      /*$data = $request->id;

          Print_r($data); die;  */

      /*  $user = User::find($id);*/

      $id = $request->id;

       $detail = DB::table('tour')->select('status')->find($id);



       if($detail->status == 1){



            $input['status'] = '0';

        $userupdate =DB::table('tour')->where('id', $id)->update($input);

       }else{



           $input['status'] = '1';

        $userupdate =DB::table('tour')->where('id', $id)->update($input);

       }





    if($userupdate){

           return redirect()->back();

           

    }else{

            return redirect()->back();

             

       }    

    }











 public function edit_tour(Request $request)

    {

        // echo"<pre>";

        // $data = $request->input();

        //   Print_r($data); die; 

      /*  $user = User::find($id);*/

      $id = $request->id;

      $product = DB::table('tour')->find($id);

      

     return view('edit_tour',['product' => $product]);

              

    }





 public function post_edit_tour(Request $request)

    {

            $id = $request->id;

            $discountper = $request->discount_percent;

             $price = $request->price;

             $discount_price =  ($price * $discountper / 100);



              $including = implode(",",$request->including);

              $exincluding = implode(",",$request->exincluding);



              $galleryphotos = $request->gallery_img; 

              

              if($galleryphotos){

              foreach ($galleryphotos as $key => $galleryphoto) {



            $destinationPath = base_path() . '/images/tour/gallery/';         

            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());

            $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());

             // $gallery_name = implode(',',$multi);

          }

            $getgallery = implode(",",$multi);





              $input['name'] =$request->name;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['child'] =$request->child;

              $input['adult'] =$request->adult;

              $input['discount_price'] = $request->price - $discount_price;

              $input['trip'] =$request->trip;

              $input['including'] =$including;

              $input['exincluding'] =$exincluding;

              $input['location'] =$request->address;

              $input['type'] =$request->type;

              $input['gallery_img'] =$getgallery;

          }





           $destinationPath = base_path() . '/images/tour/';

            $photo = $request->img;

           /* Print_r($photo); die;*/

           if(!empty($photo)){ 

            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());

             $photo_name = '1_'.time().$photo->getClientOriginalName();



              $input['name'] =$request->name;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['child'] =$request->child;

              $input['adult'] =$request->adult;

              $input['discount_price'] = $request->price - $discount_price;

              $input['trip'] =$request->trip;

              $input['including'] =$including;

              $input['exincluding'] =$exincluding;

              $input['location'] =$request->address;

              $input['type'] =$request->type;

              $input['image'] =$photo_name;

           



           $result = DB::table('tour')->where('id', $id)->update($input);

}

else{



              $input['name'] =$request->name;

              $input['description'] =$request->description;

              $input['short_description'] =$request->short_description;

              $input['price'] =$request->price;

              $input['discount_percent'] =$request->discount_percent;

              $input['child'] =$request->child;

              $input['adult'] =$request->adult;

              $input['discount_price'] = $request->price - $discount_price;

              $input['trip'] =$request->trip;

              $input['including'] =$including;

              $input['exincluding'] =$exincluding;

              $input['location'] =$request->address;

              $input['type'] =$request->type;

           



           $result = DB::table('tour')->where('id', $id)->update($input);



}



        if($result){

             return redirect()->back()->with('message', 'Tour has been update successfully .');

        }

        else{



            return redirect()->back()->with('message', 'ourses not update .');

        }

              

    }









 public function delete_tour(Request $request)

    {

       /* $data = $request->id;

          Print_r($data); die;*/  

      /*  $user = User::find($id);*/

      $id = $request->id;

     $userdelete =DB::table('tour')->where('id', $id)->delete();



    if($userdelete){

           return redirect()->back()->with('message', "Tour has been Delete successfully");

           

    }else{

            return redirect()->back()->with('message', "Something is wrong,try again");

             

       }    

    }





 public function tour_request()

    {
       $tourrequest = DB::table('tour_request')->orderBy('id','DESC')->get();
       return view('tour_request',['tourrequest' => $tourrequest]);
    }

public function tour_booked()
{

   $users = DB::table('order_detail')->where('tour_id','!=',NULL)

   ->join('tour', 'tour.id', '=', 'order_detail.tour_id')

   ->select('tour.*','order_detail.order_id','order_detail.customer_name','order_detail.address','order_detail.created_at')

   ->get();
   // var_dump($users->order_no);
   // die;
  
       return view('tour_booked',['users' => $users]);
}












}

