@include('layouts.header')

   <style>

       .img-1{

        width: 100px;

        margin: 0 auto;

       }

       .text-centerr{

        margin: 20px 0px;

       }

   </style>



    <div class="content-wrap">

        <div class="main">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-8 p-r-0 title-margin-right">

                       <!--  <div class="page-header">

                            <div class="page-title">

                                <h1>Hello, <span>Welcome Here</span></h1>

                            </div>

                        </div> -->

                    </div>

                    <!-- /# column -->

                    <div class="col-lg-4 p-l-0 title-margin-left">

                        <div class="page-header">

                            <div class="page-title">

                                <ol class="breadcrumb text-right">

                                    <li><a href="{{url('home')}}">Dashboard</a></li>

                                    <li class="active">edit customer Profile</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- /# column -->

                </div>

                 @if (Session::has('message'))

                       <div class="alert alert-success">{{ Session::get('message') }}</div>

                    @endif

                <!-- /# row -->

                <div class="main-content">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card alert">

                                <div class="card-header">

                                    <h4>Edit Customer Profile</h4>

                                   

                                </div>



                                <div class="col-md-12 text-centerr">
                                    @if($users->image==NULL)
                                    <img src="{{url('/images/avatar/user.png')}}" class="img-responsive img-circle img-1">
                                    @else
                                    <img src="{{url('/images/avatar/'.$users->image)}}" class="img-responsive img-circle img-1">
                                    @endif
                                </div>

                                <div class="card-body">

                                    <div class="menu-upload-form">

                            <form class="form-horizontal" method="POST" action="{{url('post_edit_customerprofile')}}" enctype="multipart/form-data">

                                 {{ csrf_field() }}



                                 <input type="hidden" name="id" value="{{$users->id}}">

                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Upload Product</label>

                                                <div class="col-sm-10">

                                                    <div class="form-control file-input dark-browse-input-box">

                                                        <input class="file-name input-flat" type="file" name="img" placeholder="Browse Files">

                                                    </div>

                                                </div>

                                            </div>





                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">First Name</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="name" class="form-control" placeholder="Type your name" value="{{$users->name}}">

                                                </div>

                                            </div>

                                            

                                              <div class="form-group">

                                                <label class="col-sm-2 control-label">Last Name</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="last_name" class="form-control" placeholder="Type your last name" value="{{$users->last_name}}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Email</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="email" class="form-control" placeholder="Type your email" value="{{$users->email}}">

                                                </div>

                                            </div>

                                            

                                             <div class="form-group">

                                                <label class="col-sm-2 control-label">Address</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="address" class="form-control" placeholder="Type your address" value="{{$users->address}}">

                                                </div>

                                            </div>

                                            

                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Mobile No.</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="mobile" class="form-control" placeholder="Type your number" value="{{$users->mobile}}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">City</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="city" class="form-control" placeholder="Type your city" value="{{$users->city}}">

                                                </div>

                                            </div>

                                            

                                             <div class="form-group">

                                                <label class="col-sm-2 control-label">State</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="state" class="form-control" placeholder="Type your state" value="{{$users->state}}">

                                                </div>

                                            </div>

                                            

                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Zip Code</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="zip_code" class="form-control" placeholder="Type your zip" value="{{$users->zip_code}}">

                                                </div>

                                            </div>







                                            <div class="form-group">

                                                <div class="col-sm-offset-2 col-sm-10">

                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>

                                                </div>

                                            </div>

                            </form>

                                    </div>

                                </div>

                            </div>

                            <!-- /# card -->

                        </div>

                        <!-- /# column -->

                    </div>

                    <!-- /# row -->

                </div>

                <!-- /# main content -->

            </div>

            <!-- /# container-fluid -->

        </div>

        <!-- /# main -->

    

    <!-- /# content wrap -->





         <!---------------------------- --------- CHNAGE PASSWORD--------- ------------>



         <div class="main-content">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card alert">

                                <div class="card-header">

                                    <h4>Change Password</h4>

                                   

                                </div>

                                <br><br>

                                <div class="card-body">

                                    <div class="menu-upload-form">

                            <form class="form-horizontal" method="POST" action="{{url('edit_customerpassword')}}" enctype="multipart/form-data">

                                 {{ csrf_field() }}



                                 <input type="hidden" name="id" value="{{$users->id}}">

                                            



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Password</label>

                                                <div class="col-sm-10">

                                                    <input type="password" name="password" class="form-control" placeholder="Type your password">

                                                    @if ($errors->has('password'))

                                <span class="text-danger">{{ $errors->first('password') }}</span>

                                @endif

                                                </div>



                                            </div>



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Confirm Password</label>

                                                <div class="col-sm-10">

                                                    <input type="password" name="cnf_password" class="form-control" placeholder="Type your Confirm">

                                                     @if ($errors->has('cnf_password'))

                                <span class="text-danger">{{ $errors->first('cnf_password') }}</span>

                                @endif

                                                </div>

                                                 

                                            </div>







                                            <div class="form-group">

                                                <div class="col-sm-offset-2 col-sm-10">

                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>

                                                </div>

                                            </div>

                            </form>

                                    </div>

                                </div>

                            </div>

                            <!-- /# card -->

                        </div>

                        <!-- /# column -->

                    </div>

                    <!-- /# row -->

                </div>

                </div>



     @include('layouts.footer')