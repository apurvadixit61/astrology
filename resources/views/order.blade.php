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
                                    <li class="active">order List</li>
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
                          
                               <!--  <div class="stat-widget-eight">
                                    <div class="stat-header page-titles">
                                        <div class="header-title">Order manage</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#" data-toggle="modal" data-target="#add-usertype"><i class="ti-menu-alt"></i>Add Category</a></li>

                                                 <li><a href="#" data-toggle="modal" data-target="#add-subcategory"><i class="ti-menu-alt"></i>Add sub Category</a></li>

                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Add Product</a></li>
                                               
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
                                    <h4>Order List </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Order no</th>
                                                    <th>Product Name</th>
                                                    <th>Customer Name</th>
                                                    <th>Address</th>
                                                    <th>Order Type</th>
                                                    <th>Quantity</th>
                                                     <th>Price</th>
                                                    <th>status</th>
                                                    <th>Payment Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                      <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>


                                                <tr>
                                                    
                                                    <td>{{$user->order_no}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->customer_name}}</td>
                                                    <td>{{$user->address}}</td>
                                            <td>
                                                <?php if($user->type == 0){ ?>
                                                <a>Rent</a>

                                            <?php 
                                            } 
                                            elseif ($user->type == 1) { ?>
                                                <a>Puchase</a>
                                            <?php
                                            }else{ ?>
                                                <a class="btn btn-danger" href="#" data-toggle="modal">Not Found?</a>
                                            <?php 
                                            }
                                            ?>

                                            </td>
                                             <td>{{$user->quantity}}</td>
                                            <td>{{$user->price}}</td>
                                                    
                                   <td>
                                            <?php if($user->status == 1){ ?>
                                                <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal" >cancel</a>

                                            <?php 
                                            } 
                                            elseif ($user->status == 2) { ?>
                                                <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">Conform</a>
                                            <?php
                                            }
                                            elseif ($user->status == 3) { ?>
                                                <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">Pickup</a>
                                            <?php 
                                            }
                                            elseif ($user->status == 4) { ?>
                                                <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">InProgress</a>
                                            <?php 
                                            }
                                            elseif ($user->status == 5) { ?>
                                                <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">Shipped</a>
                                            <?php 
                                            }
                                            elseif ($user->status == 6) { ?>
                                                <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">Deleverd</a>
                                            <?php 
                                            }
                                            else{ ?>
                                                <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>
                                            <?php 
                                            }
                                            ?>
                                        </td>


                                        <td>
                                            <?php if($user->Payment_status == 0){ ?>
                                                <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal" >Pending</a>

                                            <?php 
                                            } 
                                            elseif ($user->Payment_status == 1) { ?>
                                                <a class="btn btn-success btn-rounded" href="#" data-toggle="modal">Paid</a>
                                            <?php
                                            }
                                            else{ ?>
                                                <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Not Found?</a>
                                            <?php 
                                            }
                                            ?>
                                        </td>

                                         <td class="action_btn">
                                       <a class="ac_btn" href="{{url('view_order/'.$user->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                        <a class="ac_btn" href="{{url('edit_order/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                         <!-- <a class="ac_btn" href="{{url('delete_product/'.$user->id)}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a> -->                                 
                                        


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