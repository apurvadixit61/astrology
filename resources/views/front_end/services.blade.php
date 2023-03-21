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


<section id="services" >
    <div class="container">
        
        <div class="row text-center">
            <div class="col-lg-3 col-sm-6">
                <div class="services_box">
                    <img src="{{ asset('public/astrology_assets/images/s1.png')}}">
                    <h4>Today's Horoscope</h4>
                    <p>There are many variations of passages of Lorem Ipsum available</p>
                    <a href="{{url('/horoscope')}}" class="text-primary">READ MORE</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="services_box">
                    <img src="{{ asset('public/astrology_assets/images/s2.png')}}">
                    <h4>Free Kundli</h4>
                    <p>There are many variations of passages of Lorem Ipsum available</p>
                    <a href="{{url('/kundli')}}" class="text-primary">READ MORE</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="services_box">
                    <img src="{{ asset('public/astrology_assets/images/s3.png')}}">
                    <h4>Kundli Matching</h4>
                    <p>There are many variations of passages of Lorem Ipsum available</p>
                    <a href="{{url('/kundli')}}" class="text-primary">READ MORE</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="services_box">
                    <img src="{{ asset('public/astrology_assets/images/s4.png')}}">
                    <h4>Talk to Astrologer</h4>
                    <p>There are many variations of passages of Lorem Ipsum available</p>
                    <a href="{{url('/all')}}" class="text-primary">READ MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="client" class="pt-0">
    <div class="container">
            <div class="title text-center">
                <h2>What Clients Says</h2>
                <p class="mt-2 mb-5">There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered alteration in some form, by injected hummer.</p>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="clientBox">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                        <div class="d-flex mt-3">
                            <img src="{{ asset('public/astrology_assets/images/c1.png')}}" width="80px" class="me-3">
                            <div class="clientCont">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                <h5>Phillip Vetrovs</h5>
                                <p>Astrologer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="clientBox">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                        <div class="d-flex mt-3">
                            <img src="{{ asset('public/astrology_assets/images/c1.png')}}" width="80px" class="me-3">
                            <div class="clientCont">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                <h5>Phillip Vetrovs</h5>
                                <p>Astrologer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                  <div class="clientBox">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                        <div class="d-flex mt-3">
                            <img src="{{ asset('public/astrology_assets/images/c1.png')}}" width="80px" class="me-3">
                            <div class="clientCont">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                <h5>Phillip Vetrovs</h5>
                                <p>Astrologer</p>
                            </div>
                        </div>
                    </div>
                </div>
                
               
              </div>
    </div>
</section>

@include('layouts.front_end.footer')
      <!--  JS Files -->
      <script type="text/javascript">
         $(function() {
         // Owl Carousel
         var owl = $(".owl-carousel");
         owl.owlCarousel({
         items: 2,
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
                      items: 2
                    }
                }
         });

         });
          
      </script>
     
   </body>
</html>
