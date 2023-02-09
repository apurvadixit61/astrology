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

                                    <li class="active">edit Profile</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- /# column -->

                </div>

                 @if (Session::has('message'))

                       <div class="alert alert-success">{{ Session::get('message') }}
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>

                    @endif

                <!-- /# row -->

                <div class="main-content">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card alert">

                                <div class="card-header">

                                    <h4>Edit Profile</h4>

                                   

                                </div>



                                <div class="col-md-12 text-centerr">

                                    <img src="{{url('/images/avatar/'.$users->image)}}" class="img-responsive img-circle img-1">

                                </div>

                                <div class="card-body">

                                    <div class="menu-upload-form">

                            <form class="form-horizontal" method="POST" action="{{url('post_edit_profile')}}" enctype="multipart/form-data">

                                 {{ csrf_field() }}



                                 <input type="hidden" name="id" value="{{$users->id}}">

                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Upload Profile Picture</label>

                                                <div class="col-sm-10">

                                                    <div class="form-control file-input dark-browse-input-box">

                                                        <input class="file-name input-flat" type="file" name="img" placeholder="Browse Files">

                                                    </div>

                                                </div>

                                            </div>





                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Name</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="name" class="form-control" placeholder="Type your name" value="{{$users->name}}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">Email</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="email" class="form-control" placeholder="Type your email" value="{{$users->email}}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-sm-2 control-label">City</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="city" class="form-control" placeholder="Type your city" value="{{$users->city}}">

                                                </div>

                                            </div>





                                             <div class="form-group">

                                                <label class="col-sm-2 control-label"> Select Role Type</label>

                                                <div class="col-sm-10">

                                 <select class="form-control selectpicker" id="user_type" name="user_type" >

                                    <option value="{{$users->user_type}}">Please Select Role Type</option>

                                        <?php foreach ($users_type as $key=>$username): ?>

                                        <option value="<?php echo $username->id; ?>" <?php

                                        if (isset($user_type) && Input::old('user_type') == $username->name)

                                        {

                                            echo 'selected="selected"';

                                        }

                                        ?>>

                                        <?php  echo $username->name; ?></option>

                                        <?php endforeach; ?>

                                </select>

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <div class="col-sm-offset-2 col-sm-10">

                                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>

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

                            <form class="form-horizontal" method="POST" action="{{url('edit_password')}}" enctype="multipart/form-data">

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

                                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>

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

            <!-- /# container-fluid -->

        </div>

        <!-- /# main -->

    </div>

    <!-- /# content wrap -->





         

     @include('layouts.footer')