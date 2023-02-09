@include('layouts.header')
<style>
.form{
  padding-top: 40px;
  margin-left: 20px;
}
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
                                    <li class="active">edit team</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
            </div>
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
                                    <h4>Edit Team</h4>
                                   
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 text-centerr">
                            <img src="{{url('/images/ourteam/'.$our_teams->image)}}" class="img-responsive img-circle img-1">
                        </div>

                      </div>
                        <section class="form">
  <div class="container">
   <form method="POST" action="{{url('edit_team')}}" id="team_id" enctype="multipart/form-data">
     {{ csrf_field() }}
    <div class="row">
   
     <input  type="hidden" name="id" value="{{$our_teams->id}}" />

    <div class="form-group col-md-8">
     <label class="control-label">Image</label>
     <input class="form-control form-white" type="file" name="img" placeholder="select image"/>
        
   </div>

    <div class="form-group col-md-8">
       <label class="control-label">Name</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="ti-user"></i></span>
       <input class="form-control form-white" placeholder="Enter Name" type="text" value="{{$our_teams->name}}" name="name" required="" />
     </div>
      <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
 
   <div class="form-group col-md-8">
       <label class="control-label">Designation</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="ti-support"></i></span>
       <input class="form-control form-white" value="{{$our_teams->designation}}" placeholder="Enter designation" type="text" name="designation" required="" />
     </div>
      <span class="text-danger">{{ $errors->first('designation') }}</span>
    </div>

     <div class="form-group col-md-8">
       <label class="control-label">Linkdin</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="ti-linkedin"></i></span>
       <input class="form-control form-white" value="{{$our_teams->linkdin}}" placeholder="Enter url" id="linkdin" type="url" name="linkdin"/>
     </div>
    </div>

     <div class="form-group col-md-8">
       <label class="control-label">Facebook</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="ti-facebook"></i></span>
       <input class="form-control form-white" value="{{$our_teams->facebook}}" placeholder="Enter url" type="url" name="facebook"/>
     </div>
    </div>

      <div class="form-group col-md-8">
       <label class="control-label">Twitter</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="ti-twitter-alt"></i></span>
       <input class="form-control form-white" value="{{$our_teams->twitter}}" placeholder="Enter url" type="url" name="twitter"/>
     </div>
    </div>

     <div class="form-group col-md-8">
       <label class="control-label">Email</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="ti-email"></i></span>
       <input class="form-control form-white" value="{{$our_teams->email}}" placeholder="Enter email" id="email" type="email" name="email"/>
     </div>
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
  </div>
    @include('layouts.footer')    


