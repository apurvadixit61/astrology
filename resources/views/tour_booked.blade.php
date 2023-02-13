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

                                    <li class="active">tour booked list</li>

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

                            <!-- ADD GROUP  -->

                

                            <div class="col-lg-12 p-l-0">

                          

                            <!--     <div class="stat-widget-eight">

                                    <div class="stat-header page-titles">

                                        <div class="header-title">Tour manage</div>

                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>

                                            <ul class="card-option-dropdown dropdown-menu">

                                              

                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Add Tour</a></li>

                                               

                                            </ul>

                                        </div>

                                    </div>

                            </div> -->

                      



                                <!--# ADD GROUP  -->       

                <!-- /# row -->

                <div id="main-content">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card alert">

                                <div class="card-header">

                                    <h4>Tour Booked List </h4>

                                    

                                </div>

                                <div class="bootstrap-data-table-panel">

                                    <div class="table-responsive">

                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>

                                                                              

                                                <tr>

                                                    <th>Order Id</th>
                                                    <th>Tour Id</th>

                                                    <th>Tour Name</th>

                                                   

                                                    <th>User Name</th>

                                                    <th>Date</th>
                                                    <th>Address</th>

                                                    

                                                </tr>

                                            </thead>

                                            <tbody>

                                                      <?php if($users){ 

                                                    $i =1;

                                            foreach($users as $user){ 

                                                      { ?>





                                                <tr>
                                                    <td>{{$user->order_id}}</td>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->customer_name}}</td>

                                                    <td><?php echo date("d-m-Y", strtotime($user->created_at)); ?></td>
                                                    <td>{{$user->address}}</td>
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