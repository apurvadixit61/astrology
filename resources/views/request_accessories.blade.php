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

.discount_per .input-group-prepend{

    display: inline-block;

    float: left;

}

.discount_per .form-white{

    width: 115px;

}

.discount_per .input-group-append{

    display: inline-block;

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

                                    <li class="active">request accessories</li>

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

                                    <h4>Request Accessories </h4>

                                    

                                </div>

                                <div class="bootstrap-data-table-panel">

                                    <div class="table-responsive">

                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>

                                                                              

                                                <tr>

                                                  

                                                    <th>Courses Name</th>

                                                    <th>Tranner Name</th>

                                                    <th>Accessories Name</th>

                                                    <th>Quantity</th>

                                                     <th>Priority</th>

                                                    <th>Description</th>

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

                                                    

                                                    <td>{{$user->cour_name}}</td>

                                                    <td>{{$user->tranner_name}}</td>

                                                    <td>{{$user->accessories_name}}</td>

                                                    <td>{{$user->quantity}}</td>

                                                     <td>{{$user->priority}}</td>

                                                    <td>{{$user->description}}</td>

                                                     <td>

                                                         <?php if($user->status == 1){ ?>

                                                           <a class="btn label-primary btn-rounded" href="#" data-toggle="modal" >Pending</a>



                                                        <?php 

                                                        } 

                                                        elseif ($user->status == 0) { ?>

                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Cancel</a>

                                                        <?php

                                                        }

                                                        elseif ($user->status == 2) { ?>

                                                            <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">Accept</a>

                                                        <?php

                                                        }

                                                        else{ ?>

                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>

                                                        <?php 

                                                        }

                                                        ?>

                                                     </td>

                                                        <td class="action_btn">

                                                   

                                                           <a class="btn btn-success btn-rounded" data-toggle="modal" data-target="{{'#status_customer'.$user->id}}"  href="" data-toggle="modal" >Accept</a>

    

                                                            <a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="{{'#status_customeractive'.$user->id}}" href="" data-toggle="modal">Cancel</a>

                                                        

                                                                         

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

                                                        <h4 class="modal-title"><strong>Accept Accessories</strong></h4>

                                                    </div>

                                                

                                                <div class="modal-body">

                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>

                                        <h2>Accept Accessories?</h2>

                                        <p>Are you sure you want to Accept it?</p>

                                             </div>         

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                        <a  href="{{url('status_changerequst/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

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

                                                        <h4 class="modal-title"><strong>Cancel Accessories</strong></h4>

                                                    </div>

                                                

                                                <div class="modal-body">

                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>

                                        <h2>Cancel Accessories?</h2>

                                        <p>Are you sure you want to Cancel it?</p>

                                             </div>      

                                             

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

                                                        <a  href="{{url('status_changerequst/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

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