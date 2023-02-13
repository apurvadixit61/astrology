<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;

class Usercontroller extends Controller

{
    /**
     * Create a new controller instance
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
        // $users_type = DB::table('group')->select('*')->get();
        // $users = DB::table('users')
        //     ->join('group', 'group.id', '=', 'users.user_type')
        //     ->select('users.*', 'group.name as type_name')
        //     ->get();
        $users = DB::table('business')->select('*')->get();
        return view('user',['users' => $users]);
    }

    public function create(Request $request){
           // $data = $request->name;
          // Print_r($data); die;
           $result = DB::table('group')->insert(
     array(
            'name'   =>   $request->name
     )
);
        if($result){
             return redirect()->back()->with('message', 'User type has been Insert successfully .');
        }
        else{
            return redirect()->back()->with('message', 'Not Insert .');
        }
    }

     public function adduser(Request $request){

       /*  $data = $request->img;
          Print_r($data); die;*/


            $destinationPath = base_path() . '/images/avatar/';



            $photo = $request->img;



            if(!empty($photo)){ 



            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());



             $photo_name = '/'.time().$photo->getClientOriginalName();







              $input['name'] =$request->name;



              $input['email'] =$request->email;



              $input['city'] =$request->city;



              $input['user_type'] =$request->user_type;

              $input['per_minute'] =$request->per_minute;

              $input['password'] = bcrypt($request->password);



              $input['image'] =$photo_name;

              $input['img_url'] =$photo_name;





           $result = DB::table('users')->insert(



     array($input));







}



else{



         $result = DB::table('users')->insert(



     array(



            'name'   =>   $request->name,



            'email'   =>   $request->email,



            'city'   =>   $request->city,



            'user_type'   =>   $request->user_type,



            'password'   =>  bcrypt($request->password)



   



     )



);



     }



        if($result){



             return redirect()->back()->with('message', 'User has been Insert successfully .');



        }



        else{







            return redirect()->back()->with('message', 'Not Insert .');



        }



    }























 public function edit_profile(Request $request)



    {



       /* $data = $request->id;



          Print_r($data); die;*/  



      /*  $user = User::find($id);*/



      $id = $request->id;



      $user = DB::table('users')->find($id);



      $users_type = DB::table('group')->select('*')->get();



     return view('edit_profile',['users' => $user, 'users_type' => $users_type ]);



              



    }















 public function post_edit_profile(Request $request)



    {



       /*$data = $request->input();



          Print_r($data); die;*/



     $id = $request->id;







      $destinationPath = base_path() . '/images/avatar/';



            $photo = $request->img;



            if(!empty($photo)){ 



            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());



             $photo_name = '1_'.time().$photo->getClientOriginalName();







              $input['name'] =$request->name;



              $input['email'] =$request->email;



              $input['city'] =$request->city;



              $input['user_type'] =$request->user_type;



            /*  $input['password'] = md5($request->password);*/



              $input['image'] =$photo_name;







           $result = DB::table('users')->where('id', $id)->update($input);







}



else{



            $input['name'] =$request->name;



              $input['email'] =$request->email;



              $input['city'] =$request->city;


 $input['per_minute'] =$request->per_minute;
              $input['user_type'] =$request->user_type;







         $result = DB::table('users')->where('id', $id)->update($input);



     }



        if($result){



             return redirect()->back()->with('message', 'User has been update successfully .');



        }



        else{







            return redirect()->back()->with('message', 'User not update .');



        }



              



    }











public function edit_password(Request $request)



    {



       /* $data = $request->input();



          Print_r($data); die;*/ 



           $id = $request->id;



      $customMessages = [



          'required' => 'Please fill passwod.',



          'required' => 'Please confirm fill passwod.',



          'same' => 'Confirm password is not matched.'



         ];











         $validator = Validator::make($request->all(), [



            'password'      => 'required|min:6',



            'cnf_password'      => 'required|same:password',



            



        ],$customMessages);



         if ($validator->fails()) {



             return redirect()->back()->withErrors($validator);



        



        }else{



          $Hpassword = bcrypt($request->password);



          $doneUpdata = DB::table('users')->where('id',$id)->update(['password'=>$Hpassword]);



          if($doneUpdata){



           return redirect()->back()->with('message', "Password has been changed");



           



          }else{



            return redirect()->back()->with('message', "Something is wrong,try again");



             



          }



        }



       



              



    }















 public function delete_user(Request $request)



    {



       /* $data = $request->id;



          Print_r($data); die;*/  



      /*  $user = User::find($id);*/



      $id = $request->id;



     $userdelete =DB::table('users')->where('id', $id)->delete();







    if($userdelete){



           return redirect()->back()->with('message', "User has been Delete successfully");



           



    }else{



            return redirect()->back()->with('message', "Something is wrong,try again");



             



       }    



    }











 public function permision()



    {



       /* $data = $request->id;



          Print_r($data); die;*/  



      /*  $user = User::find($id);*/



    



     $users_type = DB::table('group')->select('*')->get();



     return view('permision',['users_type' => $users_type]);



               



    }































    public function post_permission(Request $request)



    {



       /* $data = $request->input();



          Print_r($data); die;  */



          $id = $request->group_id;



          $customMessages = [



                  'required' => 'Please fill roll.',



                   'users.required' => 'Please fill check.',



                  



                 ];







                 $validator = Validator::make($request->all(), [



                    'group_id'      => 'required',



                    'users'      => 'required',



                    



                    



                ],$customMessages);







        if ($validator->fails()) {



            return redirect()->back()->withErrors($validator);



            



        



        }else{







            if(DB::table('permission')->find($id)){







                $input['users'] =$request->users;  



                DB::table('permission')->where('group_id', $id)->update($input);



               return redirect()->back()->with('message', 'Permission has been Update successfully .');







        } else{   







                $input['group_id'] =$request->group_id;



                $input['users'] =$request->users;



             



                 $result = DB::table('permission')->insert(array($input));



            }



        }



        if($result){



             return redirect()->back()->with('message', 'Permission has been Insert successfully .');



        }



        else{







            return redirect()->back()->with('message', 'Not Insert .');



        }



     



    }































































}



