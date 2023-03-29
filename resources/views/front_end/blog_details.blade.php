@include('layouts.front_end.header')

<section id="page-title">
    <div class="container">
            <h1>Services </h1>
            <ul>
                    <li><a href="#"> Home </a></li>
                    <li>Services </li>
            </ul>
    </div>
</section>


<section id="main-content" class="blog-page">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    <div class="card single_post">
                        <div class="body">
                            <div class="img-post">
                                <img class="d-block img-fluid" src="{{url('/')}}/images/blogs/{{$blog->blog_image}}" alt="First slide">
                            </div>
                            <h3><a href="blog-details.html">{{$blog->blog_title}}</a></h3>
                            <p>{{$blog->blog_description}}</p>
                        </div>                        
                    </div>
                    
                        
                </div>
                <div class="col-lg-4 col-md-12 right-box">
                    
                    <!-- <div class="card">
                        <div class="header">
                            <h2>Categories Clouds</h2>
                        </div>
                        <div class="body widget">
                            <ul class="list-unstyled categories-clouds m-b-0">
                                @foreach($categories as $category)
                                <li><a href="javascript:void(0);">{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div> -->
                    <div class="card">
                        <div class="header">
                            <h2>Popular Posts</h2>                        
                        </div>
                        <div class="body widget popular-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach($populars as $popular)
                                    <div class="single_post d-flex">
                                       <div class="img-post me-3">
                                           <a href="{{url('blog/')}}/{{$popular->id}}"> <img width="150" src="{{url('/')}}/images/blogs/{{$popular->blog_image}}" alt="Awesome Image" width="100px">                                        
                                        </div> <div class="bolgInfo"> <p class="m-b-0">{{$popular->blog_title}}</p></a>
                                    </div>
                                                                                   
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

        </div>
    </section>
    @include('layouts.front_end.footer')
