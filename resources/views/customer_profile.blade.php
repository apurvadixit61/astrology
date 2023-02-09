@include('layouts.header')





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

                                    <li><a href="{{'home'}}">Dashboard</a></li>

                                    <li class="active">App-Profile</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- /# column -->

                </div>



                <!-- /# row -->

                <div id="main-content">

                    <div class="row">

                        <div class="col-lg-4">

                            <div class="card alert">

                                <div class="card-body">

                                    <div class="user-profile">

                                        <div class="row">

                                           

                                            <div class="col-lg-12">

                                                <div class="user-photo m-b-30">

                                                    <img class="img-responsive" src="{{ URL::to('images/avatar/').$details->image }}" alt="" />

                                                </div>

                                                <div class="user-work">

                                                    <h4>BIO</h4>

                                                    <div class="work-content">

                                                        <p>{{$details->bio_data}}</p>

                                                    </div>

                                                </div>

                                                 <div class="user-profile-name"> {{$details->name}} {{$details->last_name}}</div>

                                                <div class="user-Location"><i class="ti-location-pin"></i> {{$details->city}},  {{$details->state}}</div>

                                                <div class="user-job-title">Product Designer</div>



                                                <div class="user-send-message">

                                                 <?php if($details->status == 1){ ?>

                                                           <a class="btn btn-success btn-rounded" data-toggle="modal" data-target="#status_customer"  href="" data-toggle="modal" >Active</a>



                                                        <?php 

                                                        } 

                                                        elseif ($details->status == 0) { ?>

                                                            <a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#status_customeractive" href="" data-toggle="modal">Inactive</a>

                                                        <?php

                                                        }

                                                        else{ ?>

                                                            <a class="btn btn-danger btn-rounded" href="#" data-toggle="modal">Data Not Found?</a>

                                                        <?php 

                                                         }

                                                        ?> 

                                                </div>



                                                <div class="custom-tab user-profile-tab">

                                                    <ul class="nav nav-tabs" role="tablist">

                                                        <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a></li>

                                                    </ul>

                                                    <div class="tab-content">

                                                        <div role="tabpanel" class="tab-pane active" id="1">

                                                            <div class="contact-information">

                                                                <h4>Contact information</h4>

                                                                <div class="phone-content">

                                                                    <span class="contact-title">Phone:</span>

                                                                    <span class="phone-number">{{$details->mobile}}</span>

                                                                </div>

                                                                <div class="address-content">

                                                                    <span class="contact-title">Address:</span>

                                                                    <span class="mail-address">{{$details->address}}</span>

                                                                </div>

                                                                <div class="email-content">

                                                                    <span class="contact-title">Email:</span>

                                                                    <span class="contact-email">{{$details->email}}</span>

                                                                </div>

                                                                <div class="website-content">

                                                                    <span class="contact-title">City:</span>

                                                                    <span class="contact-website">{{$details->city}}</span>

                                                                </div>

                                                                <div class="skype-content">

                                                                    <span class="contact-title">State:</span>

                                                                    <span class="contact-skype">{{$details->state}}</span>

                                                                </div>



                                                                 <div class="skype-content">

                                                                    <span class="contact-title">Zip Code:</span>

                                                                    <span class="contact-skype">{{$details->zip_code}}</span>

                                                                </div>



                                                            </div>

 

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- /# column -->

                        <div class="col-lg-8">

                           

                            <div class="row">

                                <div class="col-lg-3">

                                    <div class="card">

                                        <div class="stat-widget-one">

                                            <div class="profile-widget">

                                                <div class="stat-text">Purchase</div>

                                                <div class="stat-digit">1

                

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="card">

                                        <div class="stat-widget-one">

                                            <div class="profile-widget">

                                                <div class="stat-text">Rent Order</div>

                                                <div class="stat-digit">0

                                                    

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="card">

                                        <div class="stat-widget-one">

                                            <div class="profile-widget">

                                                <div class="stat-text">Member ship</div>

                                                <div class="stat-digit">6</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="card">

                                        <div class="stat-widget-one">

                                            <div class="profile-widget">

                                                <div class="stat-text">Trip</div>

                                                <div class="stat-digit">29</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                

                            </div>

                           <div class="row">
                                <div class="col-lg-12">

                            <div class="card alert">

                                <div class="card-header">

                                    <h4>Order Detail</h4>

                                    <div class="card-header-right-icon">

                                        <ul>

                                            <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>

                                          



                                        </ul>

                                    </div>

                                </div>

                                <div class="card-body">

                                    <div class="table-responsive">

                                        <table  id="example1" class="table table-bordered table-striped">

                                            <thead>

                                                <tr>

                                                    <th>Name</th>

                                                    <th>Type</th>

                                                    <th>Pay status</th>

                                                    <th>Date</th>

                                                    <th>Price</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @if(!empty($orderdetails))

                                            @foreach($orderdetails as $key => $orderdetail) 

                                                <tr>

                                                    <td>{{$orderdetail->name}}</td>

                                                    <td>

                                                    <?php if($orderdetail->type == 1){ ?>

                                                           <a class="btn btn-success btn-rounded" data-toggle="modal" >Purchase</a>



                                                        <?php 

                                                        } 

                                                        elseif ($orderdetail->type == 0) { ?>

                                                            <a class="btn badge-warning btn-rounded">Rent</a>

                                                        <?php

                                                        }

                                                        else{ ?>

                                                            <a class="btn btn-danger btn-rounded" >Data Not Found?</a>

                                                        <?php 

                                                         }

                                                        ?> 

                                                    </td>

                                                       



                                                    <td>

                                                         <?php if($orderdetail->Payment_status == 1){ ?>

                                                           <a class="btn btn-success btn-rounded" >Paid</a>



                                                        <?php 

                                                        } 

                                                        elseif ($orderdetail->Payment_status == 0) { ?>

                                                            <a class="btn btn-danger btn-rounded">Pending</a>

                                                        <?php

                                                        }

                                                        else{ ?>

                                                            <a class="btn btn-danger btn-rounded">Data Not Found?</a>

                                                        <?php 

                                                         }

                                                        ?> 

                                                        

                                                    </td>

                                                    

                                                    

                                                    <td>{{$orderdetail->created_at}}</td>

                                                    <td class="color-primary">$ {{$orderdetail->price}}</td>

                                                </tr>

                                                @endforeach

                                                  @endif

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                           </div>

                         

                        </div>

                        <!-- /# column -->

                    </div>

                   
                    

                </div>

            </div>

        </div>



    </div>

    <!--MODAL -->

                            <div class="modal fade none-border" id="status_customer">

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

                                                        <a  href="{{url('status_change/'.$details->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

                                                    </div>

                                                     

                                                </div>

                                            </div>

                                        </div>

    <!--END MODAL -->



    <!--MODAL -->

                            <div class="modal fade none-border" id="status_customeractive">

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

                                                        <a  href="{{url('status_change/'.$details->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>

                                                    </div>

                                                     

                                                </div>

                                            </div>

                                        </div>

    <!--END MODAL -->



@include('layouts.footer')

   











