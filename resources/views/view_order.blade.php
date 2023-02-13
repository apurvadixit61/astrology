@include('layouts.header')
  
<style>
tbody tr td:last-child {
    text-align: left !important;
}
</style>


   <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">view order</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>

                  @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
<div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>View Order Detail</h4>
                                   
                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
              

  <section class="form">
  <div class="container">

<div  class="col-lg-8">
    
      <table class="table">
      
    <tbody>
       <tr>
        <td><span class="menu-text">Order No.</span></td>
        <td>{{$order_detail->order_no}}</td>
     
      <tr>
        <td class="col-sm-2">Product Name</td>
        <td class="col-sm-2">{{$order_detail->name}}</td>
        
      </tr>

      <tr>
        <td class="col-sm-2">Price</td>
        <td class="col-sm-2">{{$order_detail->price}}</td>
        
      </tr>

       <tr>
        <td class="col-sm-2">Quantity</td>
        <td class="col-sm-2">{{$order_detail->quantity}}</td>
        
      </tr>

      <tr>
        <td class="col-sm-2">Customer Name</td>
        <td class="col-sm-2">{{$order_detail->customer_name}}</td>
        
      </tr>

       <tr>
        <td class="col-sm-2">Address</td>
        <td class="col-sm-2">{{$order_detail->address}}</td>
        
      </tr>

       <tr>
        <td class="col-sm-2">City</td>
        <td class="col-sm-2">{{$order_detail->city}}</td>
        
      </tr>

       <tr>
        <td class="col-sm-2">State</td>
        <td class="col-sm-2">{{$order_detail->state}}</td>
        
      </tr>

       <tr>
        <td class="col-sm-2">Zip code</td>
        <td class="col-sm-2">{{$order_detail->zip_code}}</td>
        
      </tr>

     <tr>
        <td class="col-sm-2">Status</td>
        <td class="col-sm-2"><?php if($order_detail->status == 1){ ?>
                                                <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal" >cancel</a>

                                            <?php 
                                            } 
                                            elseif ($order_detail->status == 2) { ?>
                                                <a class="btn btn-success" href="#" data-toggle="modal">Conform</a>
                                            <?php
                                            }
                                            elseif ($order_detail->status == 3) { ?>
                                                <a class="btn btn-success" href="#" data-toggle="modal">Pickup</a>
                                            <?php 
                                            }
                                            elseif ($order_detail->status == 4) { ?>
                                                <a class="btn btn-success" href="#" data-toggle="modal">InProgress</a>
                                            <?php 
                                            }
                                            elseif ($order_detail->status == 5) { ?>
                                                <a class="btn btn-success" href="#" data-toggle="modal">Shipped</a>
                                            <?php 
                                            }
                                            elseif ($order_detail->status == 6) { ?>
                                                <a class="btn btn-success" href="#" data-toggle="modal">Deleverd</a>
                                            <?php 
                                            }
                                            else{ ?>
                                                <a class="btn btn-danger" href="#" data-toggle="modal">Data Not Found?</a>
                                            <?php 
                                            }
                                            ?></td>
        
      </tr>


      <tr>
        <td class="col-sm-2">Payment Status</td>
        <td class="col-sm-2"><?php if($order_detail->Payment_status == 0){ ?>
                                                <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal" >Pending</a>

                                            <?php 
                                            } 
                                            elseif ($order_detail->Payment_status == 1) { ?>
                                                <a class="btn btn-success" href="#" data-toggle="modal">Paid</a>
                                            <?php
                                            }
                                            else{ ?>
                                                <a class="btn btn-danger" href="#" data-toggle="modal">Not Found?</a>
                                            <?php 
                                            }
                                            ?></td>
        
      </tr>

 
       </tbody>
  </table>
 </div>

  </div>

</section>
</div>
</div>
@include('layouts.footer')