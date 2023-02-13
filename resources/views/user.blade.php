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


.icon_image{


    


     height: 53px;


    width: 63px;


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


                                    <li class="active">User List</li>


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


                          


                                <div class="stat-widget-eight">


                                    <div class="stat-header page-titles">


                                        <div class="header-title">User Views</div>


                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>


                                            <ul class="card-option-dropdown dropdown-menu">


                                                <li><a href="#" data-toggle="modal" data-target="#add-usertype"><i class="ti-menu-alt"></i>Add user type</a></li>


                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Add User</a></li>


                                               


                                            </ul>


                                        </div>


                                    </div>


                            </div>


                      





                                <!--# ADD GROUP  -->       


                <!-- /# row -->


                <div id="main-content">


                    <div class="row">


                        <div class="col-lg-12">


                            <div class="card alert">


                                <div class="card-header">


                                    <h4>User List </h4>


                                    


                                </div>


                                <div class="bootstrap-data-table-panel">


                                    <div class="table-responsive">


                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Sr.no</th>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th> Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                     <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><img style="width:50px;height:50px" class="icon_image"src="{{url('/')}}/images/product_img/{{ $user->product_main_image }}" /></td>
                                                    <td>{{$user->english_name}}</td>
                                                    <td>{{$user->product_description}}</td>
                                       <td>
                  <a href="{{url('edit_product/'.$user->product_identifier)}}">
                      <span class="badge badge-success mr-5"><i class="fa fa-pencil"></i></span></a>
                  <a href="#" data-toggle="modal" data-target="{{'#delete_product'.$user->product_identifier}}" title="Delete"><span class="badge badge-danger mr-5"><i class="fa fa-trash"></i></span></a>
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


                    <!-- /# row -->


                    <!-- <div class="row">


                        <div class="col-lg-12">


                            <div class="footer">


                                <p>This dashboard was generated on <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>


                            </div>


                        </div>


                    </div> -->


                </div>


            </div>


        </div>


    </div>





   @include('layouts.footer')


