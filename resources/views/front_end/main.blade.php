@include('layouts.front_end.header')
    <section class="banner_outer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>Services For You <span>Company Name</span></h2>
                    <p class="mt-3 mb-5">Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore
                        etesde dolore magna aliquapspendisse and the gravida.</p>
                    <div class="main_feature">
                        <div class="main_featureBox">
                            <div class="featureBoxImg"><img
                                    src="{{ asset('public/astrology_assets/images/serv1.png')}}"></div>
                            <h5>Chat with Astrologer</h5>
                        </div>
                        <div class="main_featureBox">
                            <div class="featureBoxImg"><img
                                    src="{{ asset('public/astrology_assets/images/serv2.png')}}"></div>
                            <h5>Talk to Astrologer</h5>
                        </div>
                        <div class="main_featureBox">
                            <div class="featureBoxImg"><img
                                    src="{{ asset('public/astrology_assets/images/serv3.png')}}"></div>
                            <h5>Astrotalk Blog</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ms-auto">
                    <div class="freeKundliForm">
                        <h3>Free Kundli</h3>
                        <p class="mt-2 mb-2">At vero eos et accusamus et iusto odio dignissimos.</p>
                        <form action="{{ route('free-kundli')}}" method="post">
                          @csrf
                            <div class="form-group"><input type="text" name="full_name" required class="form-control" placeholder="Name"></div>
                            <div class="form-group"><input type="date" required name="birth_date"  class="form-control" placeholder="Birth of Date">
                            </div>
                            <div class="form-group"><input type="time"  required name="birth_time" class="form-control" placeholder="Birth of Time">
                            </div>
                            <div class="form-group"><input type="text" class="form-control"
                                    placeholder="Birth of Place " required name="birth_place"  id="front-search-field"></div>
                            <button class="btn btn-primary" type="submit" >FIND KUNDLI </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $id=0; if(Auth::guard('users')->check()==true ) { $id=Auth::guard('users')->user()->id;  } ?>

    <section id="ourAstrologer">
        <div class="container">
            <div class="title text-center">
                <h2>Our Astrologer</h2>
                <p class="mt-2 mb-5">There are many variations of passages of Lorem Ipsum available, <br> but the
                    majority have suffered alteration in some form, by injected hummer.</p>
            </div>
            <div class="astrologerList">
                <div class="row">
                @foreach($users as $key=>$user)
                    <div class="col-lg-4 col-sm-6">
                        <div class="astrologerListBox">
                            <div class="astroBoxTop">
                                <div class="astroBoximg"><img width="50" height="120"
                                @if($user->profile_image!='' ||
                            $user->profile_image != NULL)
                            src="{{url('/')}}/images/profile_image{{$user->profile_image}}" @else
                            src="{{ asset('public/front_img/elem.png') }}" alt="{{$user->name}}" @endif alt=""
                            >

                            <span class="{{$user->user_status}}"></span>

                                    <div class="reviewBox">
                                        <i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i
                                            class="fa fa-star text-primary"></i><i
                                            class="fa fa-star text-primary"></i><i class="fa fa-star"></i> 4.5
                                    </div>
                                </div>
                                <div class="astroBoxcont">
                                    <span class="checkicon"><img
                                            src="{{ asset('public/astrology_assets/images/check.png')}}"></span>
                                    <h4>{{$user->name}}</h4>
                                    <h5>@if($user->user_expertise == '')--@else{{$user->user_expertise}}@endif</h5>
                                    <p>@if($user->user_language == '')--@else{{$user->user_language}}@endif <br> Exp: {{$user->user_experience}} @if($user->user_experience != '')Years @endif</p>
                                    <div class="metaInfo">
                                        <span class="text-primary fw-bold">₹ {{$user->per_minute}} /min</span>
                                        <a  @if($user->is_busy == 1) style="border:2px solid red;border-radius:50%;padding:3%;" @endif @if($user->is_busy == 1) onclick="is_busy()" @else  onclick="send_request(this,{{$id}},{{$user->id}},'{{$user->user_status}}')" @endif class="ms-auto"><img
                                                src="{{ asset('public/astrology_assets/images/msg.png')}}"></a>
                                        <a  class="ms-2"><img
                                                src="{{ asset('public/astrology_assets/images/tel.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                  
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="pt-0">
        <div class="container">
            <div class="title text-center">
                <h2> Services For You</h2>
                <p class="mt-2 mb-5">There are many variations of passages of Lorem Ipsum available, <br> but the
                    majority have suffered alteration in some form, by injected hummer.</p>
            </div>
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
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="avout_video">
                        <img src="{{ asset('public/astrology_assets/images/about.png')}}"><span class="playBtn"><img
                                src="{{ asset('public/astrology_assets/images/play.png')}}"></span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h2 class="mt-5">I Will Read Your Palm And Tell You About Your Future</h2>
                    <div class="subTitle">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words. Sed ut
                            perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                        </p>
                    </div>
                    <div class="aboutMeta">
                        <img src="{{ asset('public/astrology_assets/images/as.png')}}">
                        <div class="aboutMetacont">
                            <h6>15 Years Of Experience With</h6>
                            <h3>Palm & Horoscope</h3>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <section id="rashi" class="pt-0">
        <div class="container">
            <div class="title text-center">
                <h2>Explore Rashi</h2>
                <p class="mt-2 mb-5">There are many variations of passages of Lorem Ipsum available, but the <br>
                    majority have suffered alteration in some form, by injected hummer.</p>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 ">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/1.png')}}"></div>
                            <h4>Aries</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/2.png')}}"></div>
                            <h4>Taurus</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/3.png')}}"></div>
                            <h4>Gemini</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/4.png')}}"></div>
                            <h4>Cancer</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/5.png')}}"></div>
                            <h4>Leo</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/6.png')}}"></div>
                            <h4>Virgo</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/7.png')}}"></div>
                            <h4>Libra</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/8.png')}}"></div>
                            <h4>Scorpio</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/9.png')}}"></div>
                            <h4>Sagittarius</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/10.png')}}"></div>
                            <h4>Capricorn</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/11.png')}}"></div>
                            <h4>Aquarius</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="#">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/12.png')}}"></div>
                            <h4>Pisces</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="client" class="pt-0">
        <div class="container">
            <div class="title text-center">
                <h2>What Clients Says</h2>
                <p class="mt-2 mb-5">There are many variations of passages of Lorem Ipsum available, but the <br>
                    majority have suffered alteration in some form, by injected hummer.</p>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="clientBox">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters</p>
                        <div class="d-flex mt-3">
                            <img src="{{ asset('public/astrology_assets/images/c1.png')}}" width="80px" class="me-3">
                            <div class="clientCont">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <h5>Phillip Vetrovs</h5>
                                <p>Astrologer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="clientBox">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters</p>
                        <div class="d-flex mt-3">
                            <img src="{{ asset('public/astrology_assets/images/c1.png')}}" width="80px" class="me-3">
                            <div class="clientCont">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <h5>Phillip Vetrovs</h5>
                                <p>Astrologer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="clientBox">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters</p>
                        <div class="d-flex mt-3">
                            <img src="{{ asset('public/astrology_assets/images/c1.png')}}" width="80px" class="me-3">
                            <div class="clientCont">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <h5>Phillip Vetrovs</h5>
                                <p>Astrologer</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section id="blog" class="pt-0">
        <div class="container">
            <div class="title text-center">
                <h2>Our Blog</h2>
                <p class="mt-2 mb-5">There are many variations of passages of Lorem Ipsum available, but the <br>
                    majority have suffered alteration in some form, by injected hummer.</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="blogBox">
                        <div class="blogImg"><a href="#"><img
                                    src="{{ asset('public/astrology_assets/images/b1.png')}}"></a></div>
                        <div class="blogCont">
                            <h3><a href="#">A Detailed Guide to Your 2023-2024 Horoscope</a></h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores.</p>
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="blogBox">
                        <div class="blogImg"><a href="#"><img
                                    src="{{ asset('public/astrology_assets/images/b2.png')}}"></a></div>
                        <div class="blogCont">
                            <h3><a href="#">A Detailed Guide to Your 2023-2024 Horoscope</a></h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores.</p>
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="blogBox">
                        <div class="blogImg"><a href="#"><img
                                    src="{{ asset('public/astrology_assets/images/b3.png')}}"></a></div>
                        <div class="blogCont">
                            <h3><a href="#">A Detailed Guide to Your 2023-2024 Horoscope</a></h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores.</p>
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="blogBox">
                        <div class="blogImg"><a href="#"><img
                                    src="{{ asset('public/astrology_assets/images/b4.png')}}"></a></div>
                        <div class="blogCont">
                            <h3><a href="#">A Detailed Guide to Your 2023-2024 Horoscope</a></h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores.</p>
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="kundliOnline" class="pt-0">
        <div class="container">
            <div class="title text-center">
                <h2>Free Kundli Online</h2>
                <p class="mt-2 mb-5">There are many variations of passages of Lorem Ipsum available, but the <br>
                    majority have suffered alteration in some form, by injected hummer.</p>
            </div>
            <div class="kundliForm d-flex align-items-center justify-content-center">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text"  required name="full_name" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label>Birth of Date</label>
                    <input type="date"  required name="birth_date" class="form-control" placeholder="Select Birth Date ">
                </div>
                <div class="form-group">
                    <label>Birth of Time</label>
                    <input type="text"  required name="birth_time" class="form-control" placeholder="Select Birth Time ">
                </div>
                <div class="form-group">
                    <label>Birth of Place</label>
                    <input type="text"  required name="birth_place" class="form-control" placeholder="Enter Birth Place ">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">FIND KUNDLI</button>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.front_end.footer')
    <!--  JS Files -->

    
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-messaging.js"></script>

<script>
var base_url = location.protocol+'//'+location.host

console.log(base_url)
    const firebaseConfig = {
        apiKey: "AIzaSyC5UhODBBmx_CO43480AoBxcLEWQtf_dss",
        authDomain: "astrologyfcm.firebaseapp.com",
        projectId: "astrologyfcm",
        storageBucket: "astrologyfcm.appspot.com",
        messagingSenderId: "5304372207",
        appId: "1:5304372207:web:c97e81ba86bc06b386441a",
        measurementId: "G-W3L7RJS9TM"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    startFCM()
    function startFCM() {
        messaging.requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: base_url+'/user/store-token',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        // alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error);
                        console.log(error)
                    },
                });
            }).catch(function (error) {
                alert(error);
                console.log(error)

            });
    }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('public/astrology_assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript"
    src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">

$(document).on('keyup', '#front-search-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field"));
});
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
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                769: {
                    items: 2
                }
            }
        });

    });

    <?php
   if(Auth::guard('users')->check() == true){
    $loginId = auth()->guard("users")->user()->id;
    ?>
var user_type={{auth()->guard("users")->user()->user_type}}

var intervalId = window.setInterval(function() {
    get_notification_count()
}, 5000);

function get_notification_count(){

    var url = base_url+'/user/get_notification_count/'+{{$loginId}}
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
         console.log(result)
         $('#count').append('')
         $('#count').append(result)

         
         var count = document.querySelector("#count");

         count.innerHTML =result

        }
    });

}
function send_request(element, from_user_id, to_user_id,status) {
    console.log(from_user_id)
    console.log(to_user_id)
    console.log(status)

  if(user_type == 2){
    Swal.fire('Login with User')
  }else{

    if(status=='Offline')
    {
    Swal.fire('Astrologer is not available for now')

    }
    else{
    var url = base_url+'/user/send_request'
    var data = {
        from_user_id: from_user_id,
        to_user_id: to_user_id
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        data: data,
        dataType: 'json',
        success: function(result) {
            if (result.status == 0) {
                // alert(result.message)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: result.message,
                    })

            } else {
                location.href = base_url+'/kundli-detail/'+ to_user_id;

               
            }

        }
    });

}

  }
}


function approve_request() {


    var url = base_url+'/user/approve_request'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'POST',
        data: '',
        dataType: 'json',
        success: function(result) {
            console.log(result)
            location.href = url+'/user/chat/' + result;

        }
    });

}

<?php
   }else{
    ?>

function send_request() {
    console.log(base_url+'/signin')
    location.href = base_url+'/signin'
}
<?php
   } ?>

   function is_busy()
   {
    Swal.fire('Astrologer is busy right now')

   }
    </script>

</body>

</html>