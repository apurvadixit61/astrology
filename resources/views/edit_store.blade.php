@include('layouts.header')
<style>

.form{
  padding-top: 40px;
  margin-left: 20px;
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
                                    <li class="active">edit store</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
            
  

                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif



<!-----Start gallery upload -->

                     <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Edit Store</h4>
                                   
                                </div>
                              
                        <section class="form">
  <div class="">
   <form method="POST" action="{{url('edit_store')}}" enctype="multipart/form-data">
     {{ csrf_field() }}
    <div class="row">
     
       <input type="hidden" name="id" value="{{$edit_stores->id}}" required="" />

    <div class="form-group col-md-12">
       <label class="control-label">Store Name</label>
       <input class="form-control form-white" placeholder="Enter Name" value="{{$edit_stores->name}}" type="text" name="name" required="" />
        @if ($errors->has('name'))
      <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif
    </div>

     <div class="form-group col-md-12">
       <label class="control-label">Address</label>
           <input class="form-control form-white" placeholder="Enter address" value="{{$edit_stores->address}}" type="text" name="address" required="" />
       @if ($errors->has('address'))
      <span class="text-danger">{{ $errors->first('address') }}</span>
      @endif
    </div>

    <div class="form-group col-md-6">
       <label class="control-label">Open Time</label>
        <input class="form-control form-white" type="time" value="{{$edit_stores->open_time}}" name="open_time" required="" />
         @if ($errors->has('open_time'))
      <span class="text-danger">{{ $errors->first('open_time') }}</span>
      @endif
    </div>

    <div class="form-group col-md-6">
       <label class="control-label">Closed Time</label>
       <input class="form-control form-white" type="time" value="{{$edit_stores->close_time}}" name="close_time" required="" />
        @if ($errors->has('close_time'))
      <span class="text-danger">{{ $errors->first('close_time') }}</span>
      @endif
    </div>


    <?php 
    $multi = array();
    $multi =  explode(',', $edit_stores->off_day);
    ?>

      <div class="form-group col-md-12">
       <label class="control-label">Off Days</label>
       <select class="form-control form-white" name="off_day[]" multiple="" required="">
            <option value="">Seleted please</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thuseday">Thuseday</option>
            <option value="Friday">Friday</option>
            <option value="Sturday">Sturday</option>
            <option value="Sunday">Sunday</option>
           
      </select>
       @if ($errors->has('off_day'))
      <span class="text-danger">{{ $errors->first('off_day') }}</span>
      @endif
    </div>
  

 </div>
<div class="form-group col-md-6">
  <button type="submit" class="btn btn-lg btn-primary">Submit</button>
</div>
    </form>

  </div>

</section>
</div>
</div>
  </div></div>
                            </div>
                          </div>


                      </div></div>


                      </div>
    @include('layouts.footer')    


