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

                                    <li class="active">Tour List</li>

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

                                    <h4>Tour List </h4>

                                    

                                </div>

                                <div class="bootstrap-data-table-panel">

                                    <div class="table-responsive">

                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>

                                                                              

                                                <tr>

                                                    <th>Image</th>

                                                    <th>Tour Name</th>

                                                    <th width="100px">Short Description</th>

                                                    <th>Price</th>

                                                    <th>Discount %</th>

                                                    <th>Discount Price</th>

                                                    <th>Quantity</th>

                                                    <th>Trip</th>

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

                                                    <td><img class="avatar-img"src="images/tour/{{ $user->image }}" /></td>

                                                    <td>{{$user->name}}</td>

                                                    <td>{{$user->short_description}}</td>

                                                    <td>{{$user->price}}</td>

                                                    <td>{{$user->discount_percent}}</td>

                                                     <td>{{$user->discount_price}}</td>

                                                     <td>{{$user->quantity}}</td>

                                                     <td>{{$user->trip}}</td>

                                                     <td>

                                                         <?php if($user->status == 1){ ?>

                                                           <a class="btn btn-success btn-rounded"  data-target="{{'#status_customer'.$user->id}}" href="" data-toggle="modal" >Active</a>



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

                                                           <a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="{{'#status_customer'.$user->id}}"  href="" data-toggle="modal" >Inactive</a>



                                                        <?php 

                                                        } 

                                                        elseif ($user->status == 0) { ?>

                                                            <a class="btn btn-success btn-rounded" data-toggle="modal" data-target="{{'#status_customeractive'.$user->id}}" href="" data-toggle="modal">Active</a>

                                                        <?php

                                                        }

                                                        else{ ?>

                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>

                                                        <?php 

                                                         }

                                                        ?>  -->



                                        <a class="ac_btn" href="{{url('edit_tour/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 



                                         <a class="ac_btn" data-toggle="modal" data-target="{{'#delete_courses'.$user->id}}" href="" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                 

                                        





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



                   

 



<!--MODAL -->

                             @if(!empty($users))

                            @foreach($users as $key => $user) 

                            <div class="modal fade none-border" id="{{'status_customer'.$user->id}}">

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                        <h4 class="modal-title"><strong>Inactive Courses</strong></h4>

                                                    </div>

                                                

                                                <div class="modal-body">

                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>

                                        <h2>Tour Inactive?</h2>

                                        <p>Are you sure you want to Inactive it?</p>

                                             </div>         

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                        <a  href="{{url('status_changetour/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

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

                                                        <h4 class="modal-title"><strong>Active Courses</strong></h4>

                                                    </div>

                                                

                                                <div class="modal-body">

                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>

                                        <h2>Tour Active?</h2>

                                        <p>Are you sure you want to Active it?</p>

                                             </div>      

                                             

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                        <a  href="{{url('status_changetour/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

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

                            <div class="modal fade none-border" id="{{'delete_courses'.$user->id}}">

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                        <h4 class="modal-title"><strong>Delete Tour</strong></h4>

                                                    </div>

                                                

                                                <div class="modal-body">

                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>

                                        <h2>Tour Delete?</h2>

                                        <p>Are you sure you want to Delete it?</p>

                                             </div>      

                                             

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                        <a  href="{{url('delete_tour/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

                                                    </div>

                                                      

                                                </div>

                                            </div>

                                        </div>

                                        @endforeach

                                         @endif

    <!--END MODAL -->







<script>

  /**

 * Chosen: Multiple Dropdown

 */

window.WDS_Chosen_Multiple_Dropdown = {};

( function( window, $, that ) {



  // Constructor.

  that.init = function() {

    that.cache();



    if ( that.meetsRequirements ) {

      that.bindEvents();

    }

  };



  // Cache all the things.

  that.cache = function() {

    that.$c = {

      window: $(window),

      theDropdown: $( '.dropdown' ),

    };

  };



  // Combine all events.

  that.bindEvents = function() {

    that.$c.window.on( 'load', that.applyChosen );

  };



  // Do we meet the requirements?

  that.meetsRequirements = function() {

    return that.$c.theDropdown.length;

  };



  // Apply the Chosen.js library to a dropdown.

  // https://harvesthq.github.io/chosen/options.html

  that.applyChosen = function() {

    that.$c.theDropdown.chosen({

      inherit_select_classes: true,

      width: '300px',

    });

  };



  // Engage!

  $( that.init );



})( window, jQuery, window.WDS_Chosen_Multiple_Dropdown );

</script>

   @include('layouts.footer')