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
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">Add product</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
            </div>
        </div>

                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
                    @endif















<!-----Start gallery upload -->







                     <div class="main-content">



                    <div class="row">



                        <div class="col-lg-12">



                            <div class="card alert">



                                <div class="card-header">



                                    <h4>Upload Product Gallery</h4>



                                   



                                </div>



                              </div>



                            </div>



                          </div>







                      </div>



                        <section class="form">



  <div class="container">



   <form method="POST" action="{{url('uploadgallery')}}" enctype="multipart/form-data">

     {{ csrf_field() }}
<input type="hidden" name="id" value="{{$id}}">

      <div class="col-md-8">
      	<div class="row">
         <input required class="form-control form-white" type="file" name="img[]" placeholder="select image" multiple />
   </div>
</div>
<br><br><br>
  <button type="submit" class="btn btn-lg btn-primary">upload</button>
    </form>







  </div>







</section>



</div>



</div>



  </div>



    @include('layouts.footer')    











