@include('layouts.front_end.header')

<section id="profileOuter">
    <div class="container">
       <div class="row">
            <div class="col-md-4">
                <div class="miniProfile text-center">
                    <div class="miniProfileImg"><img @if($astrologer->profile_image == '') src="images/Astrologer10.jpg" @else src="{{url('/')}}/images/profile_image{{$astrologer->profile_image}}"  @endif></div>
                    <h2>{{$astrologer->name}}</h2>
                    <p>{{$astrologer->user_expertise}}</p>
                    <p>{{$astrologer->user_language}}</p>
                    <p>Exp: {{$astrologer->user_experience}} Years</p>
                    <p class="text-priamry">₹ {{$astrologer->per_minute}}/min</p>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="#" class="btn btn-outline-primary">
                            <img src="{{ asset('public/astrology_assets/images/msg.png')}}">
                            Start Chat
                            <span>50K mins</span>
                        </a>
                        <a href="#" class="btn btn-outline-secondary">
                            <img src="{{ asset('public/astrology_assets/images/tel.png')}}">
                            Start Call
                            <span class="text-danger">Currently offline</span>
                        </a>
                    </div>
                </div>
                <div class="availabilityBox mt-4">
                    <h3 class="text-center">Availability</h3>
                    <ul>
                         <li class="d-flex align-items-center">
                            <div class="availTime">
                                <?php $count=dayCount(date("l")); ?>
                            Today <br> {{date("F j")}}
                            </div>
                            <img src="{{ asset('public/astrology_assets/images/colon.png')}}">
                            <div class="availcont">
                            @if($availability[$count])

                                <p>{{$availability[$count]->start_time}} to {{$availability[$count]->end_time}} </p>
                            @else 
                            <p class="text-danger">Not Available</p>
                            @endif

                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="availTime">
                                <?php $count=dayCount(date("l", strtotime("+ 1 day"))); ?>
                            {{date("l", strtotime("+ 1 day"))}} <br> {{date("F j", strtotime("+ 1 day"))}}
                            </div>
                            <img src="{{ asset('public/astrology_assets/images/colon.png')}}">
                            <div class="availcont">
                            @if($availability[$count])

                                <p>{{$availability[$count]->start_time}} to {{$availability[$count]->end_time}} </p>
                            @else 
                            <p class="text-danger">Not Available</p>
                            @endif

                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="availTime">
                            <?php $count=dayCount(date("l", strtotime("+ 2 day"))); ?>

                            {{date("l", strtotime("+ 2 day"))}} <br>{{date("F j", strtotime("+ 2 day"))}}
                            </div>
                            <img src="{{ asset('public/astrology_assets/images/colon.png')}}">
                            <div class="availcont">
                            @if($availability[$count])

                                <p>{{$availability[$count]->start_time}} to {{$availability[$count]->end_time}}</p>
                            @else 
                            <p class="text-danger">Not Available</p>
                            @endif
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="availTime">
                            <?php $count=dayCount(date("l", strtotime("+ 3 day"))); ?>

                            {{date("l", strtotime("+ 3 day"))}} <br>{{date("F j", strtotime("+ 3 day"))}}
                            </div>
                            <img src="{{ asset('public/astrology_assets/images/colon.png')}}">
                            <div class="availcont">
                            @if($availability[$count])

                                <p>{{$availability[$count]->start_time}} to {{$availability[$count]->end_time}}</p>
                            @else 
                            <p class="text-danger">Not Available</p>
                            @endif
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="availTime">
                            <?php $count=dayCount(date("l", strtotime("+ 4 day"))); ?>

                            {{date("l", strtotime("+ 4 day"))}} <br>{{date("F j", strtotime("+ 4 day"))}}
                            </div>
                            <img src="{{ asset('public/astrology_assets/images/colon.png')}}">
                            <div class="availcont">
                                @if($availability[$count])
                                <p>{{$availability[$count]->start_time}} to {{$availability[$count]->end_time}}</p>
                                @else 
                                <p class="text-danger">Not Available</p>
                                @endif
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="availTime">
                            <?php $count=dayCount(date("l", strtotime("+ 5 day"))); ?>

                            {{date("l", strtotime("+ 5 day"))}} <br>{{date("F j", strtotime("+ 5 day"))}}
                            </div>
                            <img src="{{ asset('public/astrology_assets/images/colon.png')}}">
                            <div class="availcont">
                            @if($availability[$count])

                                <p>{{$availability[$count]->start_time}} to {{$availability[$count]->end_time}}</p>
                            @else 
                            <p class="text-danger">Not Available</p>
                            @endif
                                
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="availTime">
                            <?php $count=dayCount(date("l", strtotime("+ 6 day"))); ?>

                            {{date("l", strtotime("+ 6 day"))}} <br>{{date("F j", strtotime("+ 6 day"))}}
                            </div>
                            <img src="{{ asset('public/astrology_assets/images/colon.png')}}">
                            <div class="availcont">
                            @if($availability[$count])

                                <p>{{$availability[$count]->start_time}} to {{$availability[$count]->end_time}}</p>
                            @else 
                            <p class="text-danger">Not Available</p>
                            @endif
                                
                            </div>
                        </li>
                
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profileIntro">
                    <h2>About Me</h2>
                   <p>{!!$astrologer->user_aboutus!!}</p>
                </div>

                @if($astrologer->image_url != '')
                <div class="owl-carousel text-center">
                    @foreach(explode('|',$astrologer->image_url) as $cover)
                    <div class="item"> <img src="{{url('/')}}/images/profile_image/cover_img{{$cover}}"></div>
                    @endforeach
              </div>
                @endif
              <div class="ratingOuter">
                     <div class="card mt-5">
                <div class="card-body">
                       <h3 class="text-center mb-4">Rating & Reviews</h3>
                       <div class="ratingBox">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-4  text-center">
                                 
                                    <h1 class="rating_circle">4.1</h1>
                                    <div>
                                        <div class="rate">
                                            <i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>
                                          </div>
                                          <h5>From 3.5K reviews</h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                   <div class="progressBox d-flex align-items-center">
                                         5
                                       <div class="progress" style="height:4px">
                                          <div class="progress-bar dark" style="width:70%;height:4px"></div>
                                        </div>
                                        2.8k
                                    </div>
                                     <div class="progressBox d-flex align-items-center">
                                        4
                                            <div class="progress" style="height:4px">
                                                <div class="progress-bar dark" style="width:10%;height:4px"></div>
                                            </div>
                                            2.8k
                                        </div>
                                     <div class="progressBox d-flex align-items-center">
                                         3
                                            <div class="progress" style="height:4px">
                                                <div class="progress-bar dark" style="width:10%;height:4px"></div>
                                            </div>
                                            2.8k
                                        </div>
                                     <div class="progressBox d-flex align-items-center">
                                         2
                                            <div class="progress" style="height:4px">
                                                <div class="progress-bar dark" style="width:5%;height:4px"></div>
                                            </div>
                                            2.8k
                                        </div>
                                     <div class="progressBox d-flex align-items-center">
                                         1
                                            <div class="progress" style="height:4px">
                                                <div class="progress-bar dark" style="width:5%;height:4px"></div>
                                            </div>                
                                            2.8k
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                    <div class="ratingComment">
                        <div class="ratingCommentBox">
                            <div class="ratingCommentBoxTop d-flex">
                                <img src="images/zYxDCQT.jpg" width="50px">
                                <div class="ratingUserInfo">
                                    <h4>Carlie Harvey</h4>
                                    <div class="ratingStar"><i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></div>
                                </div>
                                <span class="rateDate ms-auto">30 Jan 2022</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                         </div>
                         <div class="ratingCommentBox">
                            <div class="ratingCommentBoxTop d-flex">
                                <img src="images/zYxDCQT.jpg" width="50px">
                                <div class="ratingUserInfo">
                                    <h4>Carlie Harvey</h4>
                                    <div class="ratingStar"><i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></div>
                                </div>
                                <span class="rateDate ms-auto">30 Jan 2022</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                         </div>

                         <div class="ratingCommentBox">
                            <div class="ratingCommentBoxTop d-flex">
                                <img src="images/zYxDCQT.jpg" width="50px">
                                <div class="ratingUserInfo">
                                    <h4>Carlie Harvey</h4>
                                    <div class="ratingStar"><i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="fas fa-star text-priamry"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></div>
                                </div>
                                <span class="rateDate ms-auto">30 Jan 2022</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                         </div>
                </div>
            </div>
              </div>

            </div>
       </div>
    </div>
</section>
@include('layouts.front_end.footer')

<script type="text/javascript">
         $(function() {
         // Owl Carousel
         var owl = $(".owl-carousel");
         owl.owlCarousel({
         items: 4,
         margin: 20,
         loop: true,
         nav: true,
          responsiveClass: true,
                responsive: {
                    0:{
                      items: 1
                    },
                    480:{
                      items: 1
                    },
                    769:{
                      items: 4
                    }
                }
         });

         });
          
      </script> 
   </body>
</html>
