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
                                    <li class="active">packages List</li>
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
                                        <div class="header-title">Packages manage</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                              
                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Add Packages</a></li>
                                               
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
                                    <h4>Packages List </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                   
                                                    <th>Package Name</th>
                                                    <th>Benefit</th>
                                                    <th>Price</th>
                                                    <th>Type</th>
                                                    <th>Create At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                      <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>


                                                <tr>
                                                   
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->benefit}}</td>
                                                    <td>{{$user->price}}</td>
                                                    <td>{{$user->package_type}}</td>
                                                    <td>{{$user->created_at}}</td>
                                         <td class="action_btn">

                                        <a class="ac_btn" href="{{url('edit_packages/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                        <a class="ac_btn" data-toggle="modal" data-target="{{'#delete_benefits'.$user->id}}" href="" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                
                                        


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
                            <div class="modal fade none-border" id="{{'delete_benefits'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete packages</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>packages Delete??</h2>
                                        <p>Are you Sure you want to Delete it?</p>
                                             </div>      
                                             
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('delete_benefit/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                      
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                         @endif
    <!--END MODAL -->



 <!--MODAL -->
    <div style="z-index: 9999;" class="modal fade none-border" id="add-users">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Add Packages</strong></h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{url('packages')}}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="row">

                  <div class="col-md-6">
                     <label class="control-label">Name</label>
                     <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" required="" />
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                  </div>
 
                  <div class="col-md-6">
                     <label class="control-label">Benefit</label>
                      <select class="form-control form-white" name="benefit[]" required="" multiple="">
                        <option value="">Seleted please</option>
                        @if(!empty($benefit))
                        @foreach($benefit as $key => $benefits) 
                        <option value="{{$benefits->name}}">{{$benefits->name}}</option>
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
                     <input class="form-control form-white" value="0" type="number" name="price" required="" />
                      @if ($errors->has('price'))
                      <span class="text-danger">{{ $errors->first('price') }}</span>
                      @endif
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Package Type</label>
                      <select class="form-control form-white" name="package_type" required="">
                        <option value="">Seleted please</option>
                        <option value="Year">Year</option>
                        <option value="Month">Month</option>
                        <option value="Days">Days</option>
                  </select>
                   @if ($errors->has('package_type'))
                    <span class="text-danger">{{ $errors->first('package_type') }}</span>
                    @endif
                  </div>

              </div>


                  <!-- </div> -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
                         
   <!-----END MODAL -->

@include('layouts.footer')