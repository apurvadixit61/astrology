@include('layouts.header')

<style>
    .img-1{
    width: 100px;
    margin: 0 auto;
    }
    .text-centerr{
    margin: 20px 0px;
    }
</style>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                </div>

                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">edit Shipping</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                <!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Manage Shipping Charge</h4>
                                   
                                </div>

                                <div class="card-body">
                                    <div class="menu-upload-form">
                                        <form method="POST" action="{{url('post_shipping_charge')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="shipping_id" value="{{$shipping->id}}">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Shipping Charge</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="shippingname" class="form-control" placeholder="enter Shipping Price" value="{{$shipping->shipping_charge}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                                     </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </div>
                <!-- /# main content -->
            </div>
            <!-- /# container-fluid -->
        </div>
        <!-- /# main -->
    </div>
    <!-- /# content wrap -->
@include('layouts.footer')

       