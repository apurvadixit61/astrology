 @include('layouts.header')

   <style>
   .img-1{
    width: 100px;
    margin: 0 auto;
   }
   .text-centerr{
    margin: 20px 0px;
   }
 .disc_per .input-group-prepend{
display: inline-block;
float: left;
}
 .disc_per input{
  width: 172px !important;
  float: left;
 }
 .disc_per .input-group-append{
  display: inline-block;
 }
       
   </style>



    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                       <!--  <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div> -->
                    </div>

                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">edit Packages</li>
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
                                    <h4>Edit Packages</h4>
                                   
                                </div>


                                <div class="card-body">
                                    <div class="menu-upload-form">
                            <form class="form-horizontal" method="POST" action="{{url('edit_packages')}}" enctype="multipart/form-data">
                                 {{ csrf_field() }}


                                 <input type="hidden" name="id" value="{{$package->id}}">
                                            
                            <div class="row">

                              <div class="col-md-6">
                                 <label class="control-label">Name</label>
                                 <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" value="{{$package->name}}" required="" />
                                  @if ($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                            <?php  
                             $benifi_pag = explode(',', $package->benefit);
                         
                            ?>

                              <div class="col-md-6">
                                 <label class="control-label">Benefit</label>
                                  <select class="form-control form-white" name="benefit[]" multiple="">
                                    <option value="" disabled="">Seleted please</option>
                                    @if(!empty($benefit))
                                    @foreach($benefit as $key => $benefits) 
                                    @foreach($benifi_pag as $key)
                                    <option value="{{$benefits->name}}" {{ $benefits->name == $key ? 'selected' : '' }} >{{$benefits->name}}</option>
                                    @endforeach
                                   @endforeach
                                   @endif
                              </select>
                               @if ($errors->has('benefit'))
                                  <span class="text-danger">{{ $errors->first('benefit') }}</span>
                                  @endif
                              </div>

                          </div>

                          <div class="row">

                              <div class="col-md-6 disc_per">
                                 <label class="control-label">Price</label>
                                 <input class="form-control form-white" value="{{$package->price}}" type="number" name="price" required="" />
                                  @if ($errors->has('price'))
                                  <span class="text-danger">{{ $errors->first('price') }}</span>
                                  @endif
                              </div>

                              <div class="col-md-6">
                                 <label class="control-label">Package Type</label>
                                  <select class="form-control form-white" name="package_type" required="">
                                    <option value="{{$package->package_type}}">{{$package->package_type}}</option>
                                    <option value="Year">Year</option>
                                    <option value="Month">Month</option>
                                    <option value="Days">Days</option>
                              </select>
                               @if ($errors->has('package_type'))
                                <span class="text-danger">{{ $errors->first('package_type') }}</span>
                                @endif
                              </div>

                          </div>

                           
                          <div class="col-md-6">
                           
                          <button type="submit" class="btn btn-lg btn-primary">Update</button>
                              
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

       