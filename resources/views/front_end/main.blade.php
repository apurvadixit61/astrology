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
                            <div class="form-group"><input  type="text" required name="birth_date"  class="form-control my_date_picker" placeholder="Birth of Date">
                            </div>
                            <div class="form-group"><input type="text"  required name="birth_time" class="form-control datetimepicker3" placeholder="Birth of Time">
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
                    <a href="#" class="viewAstro"><span aria-label="Next"></span></a>
            </div>
            <div class="astrologerList">
                <div class="row">
                <div id="astrologers"></div>   
                       
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
                        <a href="{{url('horoscope_details/aries')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/1.png')}}"></div>
                            <h4>Aries</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/taurus')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/2.png')}}"></div>
                            <h4>Taurus</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/gemini')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/3.png')}}"></div>
                            <h4>Gemini</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/cancer')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/4.png')}}"></div>
                            <h4>Cancer</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/leo')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/5.png')}}"></div>
                            <h4>Leo</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/virgo')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/6.png')}}"></div>
                            <h4>Virgo</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/libra')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/7.png')}}"></div>
                            <h4>Libra</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/scorpio')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/8.png')}}"></div>
                            <h4>Scorpio</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/sagittarius')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/9.png')}}"></div>
                            <h4>Sagittarius</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/capricorn')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/10.png')}}"></div>
                            <h4>Capricorn</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/aquarius')}}">
                            <div class="rashiImg"><img src="{{ asset('public/astrology_assets/images/11.png')}}"></div>
                            <h4>Aquarius</h4>
                            <p>Mar 21- Apr 19</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="rashibox">
                        <a href="{{url('horoscope_details/pisces')}}">
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
                @foreach($blogs as $blog)
                <div class="col-lg-3 col-sm-6">
                    <div class="blogBox">
                        <div class="blogImg"><a href="#"><img
                                    src="{{url('/images/blogs')}}/{{$blog->blog_image}}"></a></div>
                        <div class="blogCont">
                            <h3><a href="#">{{$blog->blog_title}}</a></h3>
                            <p>{{substr($blog->blog_description,0,100)}}</p>
                            <a href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
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
            <form action="{{ route('free-kundli')}}" method="post">
                    @csrf
            <div class="kundliForm d-flex align-items-center justify-content-center">
             
                <div class="form-group">
                    <label>Full Name</label>

                    <input type="text"  required name="full_name" class="form-control" placeholder="Enter Name">
                </div>               
                
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="text" required name="birth_date" class="form-control my_date_picker" placeholder="Select Birth Date ">
                </div>
                <div class="form-group">
                <label>Time of Birth</label>

                    <input type="text"  required name="birth_time" class="form-control datetimepicker3" placeholder="Select Birth Time ">
                </div>
                <div class="form-group">
                  <label>Place of Birth</label>

                    <input type="text"  required name="birth_place" class="form-control" placeholder="Enter Birth Place " id="place_search">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">FIND KUNDLI</button>
                </div>
             
            </div>
            </form>
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
                        // alert(error);
                        console.log(error)
                    },
                });
            }).catch(function (error) {
                // alert(error);
                console.log(error)

            });
    }
    </script>


    <script type="text/javascript">

var id=0;
<?php if(Auth::guard('users')->check()==true ){?>  id={{Auth::guard('users')->user()->id; }} <?php } ?>

$(document).on('keyup', '#front-search-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field"));
});

$(document).on('keyup', '#place_search', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("place_search"));
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
                    }).then((result) => {
                    if (result.isConfirmed) {
                    location.href = base_url+'/user/recharge';

                    }

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
   setInterval(get_astrologers, 1000);

   function get_astrologers()
   {
    var html=''  
   

    var url = base_url+'/all_astro'
    var data={limit:0,offset:6}
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(results) {
            html +=`<div class="row">`
             var result=results.users
             console.log("count",results.count)
            
            for (var count = 0; count < 2; count++) {
                console.log(result[count])
                var user_expertise='--'
                var user_language='--'
                var user_experience='0'
                var per_minute='0'
                var style=''
                var wait=''

                var send_request="send_request(this,"+id+","+result[count].id+",'"+result[count].user_status+"')"
                var image="{{ asset('public/front_img/elem.png') }}"
                if(result[count].is_busy==1)
                {
                    wait=`<span style="color:red;">wait ~ `+(result[count].is_login/60)+` min</span>`


                    style="style='border:2px solid red;border-radius:50%;padding:3%;'"

                    send_request='is_busy()'

                }

                if(result[count].is_login!=0)
                {
                    style="style='border:2px solid red;border-radius:50%;padding:3%;'"

                    send_request='is_engage()'

                }

                if(result[count].profile_image!=null)
                {
                    profile_image="{{url('/')}}/images/profile_image"+result[count].profile_image
                }

                if(result[count].user_expertise!=null)
                {
                    user_expertise=result[count].user_expertise
                }
                if(result[count].user_language!=null)
                {
                    user_language=result[count].user_language
                }
                if(result[count].user_experience!=null)
                {
                    user_experience=result[count].user_experience
                }
                if(result[count].per_minute!=null)
                {
                    per_minute=result[count].per_minute
                }
                html +=`<div class="col-lg-4 col-sm-6">
                    <div class="astrologerListBox">
                        <div class="astroBoxTop">
                            <div class="astroBoximg"><img width="50" height="120" src="`+profile_image+`">
                            <span class="`+result[count].user_status+`"></span>

                                <div class="reviewBox">
                                    <i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star"></i> 4.5
                                </div>
                            </div>
                            <div class="astroBoxcont">
                                <span class="checkicon"><img src="{{ asset('public/astrology_assets/images/check.png')}}"></span>
                                <h4>`+result[count].name+`</h4>
                                <h5>`+user_expertise+`</h5>
                                <p>`+user_language+` <br> Exp: `+user_experience+` Year</p>`+wait+`
                                <div class="metaInfo">
                                    <span class="text-primary fw-bold">₹ `+per_minute+`/min</span>
                                    <a href="#" `+style+` class="ms-auto" onclick="`+send_request+`"><img src="{{ asset('public/astrology_assets/images/msg.png')}}"></a>
                                    <a href="#" class="ms-2"><img src="{{ asset('public/astrology_assets/images/tel.png')}}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`

            }
            html +=`</div>`
            document.getElementById('astrologers').innerHTML =''; 
            $('#astrologers').append(html)
             

        }
    });

   }
    </script>

</body>

</html>