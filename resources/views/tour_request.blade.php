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

                                    <li class="active">tour request</li>

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

                                    <h4>Tour List </h4>

                                    

                                </div>

                                <div class="bootstrap-data-table-panel">

                                    <div class="table-responsive">

                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>

                                                                              

                                                <tr>

                                                    <th>Name</th>

                                                    <th>Email</th>

                                                    <th>Adult</th>

                                                    <th>Child</th>

                                                    <th>Senior</th>

                                                    <th>Comment</th>

                                                    <th>To Place</th>

                                                    <th>Form Place</th>

                                                    <th>To Date</th>

                                                    <th>Form Date</th>

                                                    

                                                </tr>

                                            </thead>

                                            <tbody>

                                                      <?php if($tourrequest){ 

                                                    $i =1;

                                            foreach($tourrequest as $user){ 
                                                
                                                      { ?>





                                                <tr>

                                                   

                                                    <td>{{$user->name}}</td>

                                                    <td>{{$user->email}}</td>

                                                    <td>{{$user->adult}}</td>

                                                    <td>{{$user->child}}</td>

                                                    <td>{{$user->senior}}</td>

                                                    <td>{{$user->comment}}</td>

                                                    <td>{{$user->to_tour}}</td>

                                                    <td>{{$user->from_tour}}</td>

                                                    <td>{{$user->to_date}}</td>

                                                    <td>{{$user->from_date}}</td>

                                                     

                                                </tr>

                                                <?php  $i++;
                                                     //   print_r( $user);
//die;
                                            }}} ?>

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