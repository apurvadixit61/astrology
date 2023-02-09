@include('layouts.header')
<style>
  .img-1{
    display: inline-block;
    float: left;
    margin-right: 10px;
    }
  .img02{
      width: 169px;
      height: 90px;
    }
  .image01{
   position: relative;
    width: 175px;
    display: inline-block;
    margin-right: 5px;
  }
  .image01 a{
    position: absolute;
    top: 0;
    right: 0;
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
                                    <li class="active">our client</li>
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
                                    <h4>Our Client</h4>
                                   
                                </div>
                              
                         
                          <div class="col-md-12 text-centerr">
                        @if($client)
                        @foreach($client as $info)
                        <div class="image01">
                          <img src="{{url('/images/ourclient/'.$info->image)}}" class="img-responsive img-1 img02">
                          <a href="{{url('delete_client/'.$info->id)}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>
                        </div>
                         @endforeach
                         @endif
                   </div>
                   


                     
                  <section class="form">
                    <div class="">
                  <form method="POST" action="{{url('upload_our_client')}}" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <div class="row">
                  

                  <div class="form-group col-md-8" style="margin-top: 50px;">
                     <label class="control-label">Our Client Image</label>
                     <input required class="form-control form-white" type="file" name="img" placeholder="select image" multiple />
                    <!--   <span id="file_err" style="color:red;font-weight:bold; display:none;"></span> -->     
               </div>


             </div>
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-lg btn-primary">upload</button>
            </div>
                </form>

              </div>

            </section>
            </div>
          </div>
       </div></div>
                            </div>
                          </div> </div>
        </div>
 @include('layouts.footer')    


