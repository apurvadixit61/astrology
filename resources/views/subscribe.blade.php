@include('layouts.header')

<style>

    .three-dot{
 
  left: 0!important;

  top: 7px;

}

.page-titles{

  text-align: right;

}

.page-titles .header-title{

  display: inline-block;

    text-align: right;

}



</style>



    <div class="content-wrap">

        <div class="main">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-8 p-r-0 title-margin-right">

                        <div class="page-header">

                            <div class="page-title">

                                <h1>Dashboard</h1>

                            </div>

                        </div>

                    </div>

                

                    <!-- /# column -->

                    <div class="col-lg-4 p-l-0 title-margin-left">

                        <div class="page-header">

                            <div class="page-title">

                                <ol class="breadcrumb text-right">

                                    <li><a href="{{url('home')}}">Dashboard</a></li>

                                    <li class="active"> Subscribe List</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- /# column -->

                </div>

                 @if (Session::has('message'))

                       <div class="alert alert-success">{{ Session::get('message') }}</div>

                    @endif

                            <!-- ADD GROUP  -->

                

                            <div class="col-lg-12 p-l-0">

                         

                      



                                <!--# ADD GROUP  -->       

                <!-- /# row -->

                <div id="main-content">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card alert">

                                <div class="card-header">

                                    <h4>Subscribe List </h4>

                                    

                                </div>

                                <div class="bootstrap-data-table-panel">

                                    <div class="table-responsive">

                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>

                                                                              

                                                <tr>

                                                    

                                                    <th>Email</th>

                                                    <th>Create At</th>

                                                    <th>Action</th>

                                                </tr>

                                            </thead>

                                            <tbody>



                                                <?php if($users){ 

                                                    $i =1;

                                            foreach($users as $user){ 

                                                      { ?>



                                                <tr>

                                                   

                                                    <td>{{$user->email}}</td>

                                                    <td>{{$user->created_at}}</td>

                                         <td class="action_btn">



                                         <a class="ac_btn" href="{{url('delete_subscribe/'.$user->id)}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                 

                                        



                                    </td>

                                                </tr>

                                                <?php  $i++;}}} ?>

                                            </tbody>

                                        </table>

						

                                    </div>

                                </div>

                            </div>

                            <!-- /# card -->

                        </div>

                        <!-- /# column -->

                    </div>

                 

                </div>

            </div>

        </div>

    </div>



                     





   @include('layouts.footer')

