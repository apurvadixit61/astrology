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

                                    <li class="active">customer List</li>

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

                                    <h4>Customer List & Management </h4>

                                    

                                </div>

                                <div class="bootstrap-data-table-panel">

                                    <div class="table-responsive">

                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>

                                                                              

                                                <tr>

                                                    <th>Image</th>

                                                    <th>First Name</th>

                                                    <th>Email</th>

                                                    <th>City</th>

                                                    <th>State</th>

                                                     <th>Status</th>

                                                    <th>Action</th>

                                                </tr>

                                            </thead>

                                            <tbody>



                                                <?php if($users){ 

                                                    $i =1;

                                            foreach($users as $user){ 

                                                      { ?>



                                                <tr>

                                                    <td><img class="icon_image"src="images/avatar/{{ $user->image }}"   alt="Profile image"   onerror="this.onerror=null;this.src='images/avatar/user.png';"  alt="" /></td>

                                                    <td>{{$user->name}}</td>

                                                    <td>{{$user->email}}</td>

                                                    <td>{{$user->city}}</td>

                                                    <td>{{$user->state}}</td>

                                                    <td>

                                                         <?php if($user->status == 1){ ?>

                                                           <a class="btn btn-success btn-rounded" data-target="{{'#status_customer'.$user->id}}" href="" data-toggle="modal" >Active</a>



                                                        <?php 

                                                        } 

                                                        elseif ($user->status == 0) { ?>

                                                            <a class="btn btn-danger btn-rounded" data-target="{{'#status_customeractive'.$user->id}}" href="" data-toggle="modal">Inactive</a>

                                                        <?php

                                                        }

                                                        

                                                        else{ ?>

                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>

                                                        <?php 

                                                        }

                                                        ?>



                                                     </td>

                                         <td class="action_btn">

                                             <!-- <?php if($user->status == 1){ ?>

                                                           <a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#status_customer"  href="" data-toggle="modal" >Inactive</a>



                                                        <?php 

                                                        } 

                                                        elseif ($user->status == 0) { ?>

                                                            <a class="btn btn-success btn-rounded" data-toggle="modal" data-target="#status_customeractive" href="" data-toggle="modal">Active</a>

                                                        <?php

                                                        }

                                                        else{ ?>

                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>

                                                        <?php 

                                                         }

                                                        ?>  -->

                                        <a class="ac_btn" href="{{url('view_customerprofile/'.$user->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>



                                        <a class="ac_btn" href="{{url('edit_customerprofile/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  

                                        

                                       <!--   <a class="ac_btn" href="{{url('delete_user/'.$user->id)}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a> -->                                 

                                        





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



<!--MODAL -->

                             @if(!empty($users))

                            @foreach($users as $key => $user) 

                            <div class="modal fade none-border" id="{{'status_customer'.$user->id}}">

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                        <h4 class="modal-title"><strong>Inactive Customer</strong></h4>

                                                    </div>

                                                

                                                <div class="modal-body">

                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>

                                        <h2>Customer Inactive?</h2>

                                        <p>Are you sure you want to Inactive it?</p>

                                             </div>         

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                        <a  href="{{url('status_change/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

                                                    </div>

                                                   

                                                </div>

                                            </div>

                                        </div>

                                         @endforeach

                                         @endif

    <!--END MODAL -->

    

     <!--MODAL -->

                                 @if(!empty($users))

                                 @foreach($users as $key => $user)

                            <div class="modal fade none-border" id="{{'status_customeractive'.$user->id}}">

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                        <h4 class="modal-title"><strong>Active Customer</strong></h4>

                                                    </div>

                                                

                                                <div class="modal-body">

                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>

                                        <h2>Customer Active?</h2>

                                        <p>Are you sure you want to Active it?</p>

                                             </div>      

                                             

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                        <a  href="{{url('status_change/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

                                                    </div>

                                                      

                                                </div>

                                            </div>

                                        </div>

                                        @endforeach

                                         @endif

    <!--END MODAL -->



@include('layouts.footer')





   

