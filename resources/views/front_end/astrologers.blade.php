@include('layouts.front_end.header')

<section id="page-title">
    <div class="container">
            <h1>Our Astrologer</h1>
            <ul>
                    <li><a href="#"> Home </a></li>
                    <li>Our Astrologer</li>
            </ul>
    </div>
</section>
<section id="filter">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex align-items-center">
                    <a href="{{url('user/recharge')}}" class="btn btn-primary">Recharge</a>
                    <span class="ms-2">Rs. {{$wallets}}</span>
                </div>
            </div>
             <div class="col-md-6">
                 <div class="d-flex align-items-center justify-content-center">
                    <div class="seachBox"><input type="text" class="form-control" placeholder="Search Name"><button><i class="fas fa-search"></i></button></div>
                    <button class="btn btn-outline-secondary ms-3"><i class="fas fa-filter"></i> Filter </button>
                 </div>
             </div>
              <div class="col-md-3 text-end">
                  <button class="btn btn-outline-secondary"><i class="fas fa-sort-amount-down"></i> Sort by</button>
              </div>
        </div>
    </div>
</section>
<section id="ourAstrologer" class="pt-0">
  <div class="container">
        
        <div class="astrologerList">
            <div class="row">
            <?php $id=0; if(Auth::guard('users')->check()==true ) { $id=Auth::guard('users')->user()->id;  } ?>
            @foreach($users as $key=>$user)
                <div class="col-lg-4 col-sm-6">
                    <div class="astrologerListBox">
                        <div class="astroBoxTop">
                            <div class="astroBoximg"><img width="50" height="120"
                                @if($user->profile_image!='' ||
                            $user->profile_image != NULL)
                            src="{{url('/')}}/images/profile_image{{$user->profile_image}}" @else
                            src="{{ asset('public/front_img/elem.png') }}" alt="{{$user->name}}" @endif alt="">
                            <span class="{{$user->user_status}}"></span>

                                <div class="reviewBox">
                                    <i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star"></i> 4.5
                                </div>
                            </div>
                            <div class="astroBoxcont">
                                <span class="checkicon"><img src="{{ asset('public/astrology_assets/images/check.png')}}"></span>
                                <h4>{{$user->name}}</h4>
                                <h5>@if($user->user_expertise == '')--@else{{$user->user_expertise}}@endif</h5>
                                <p>@if($user->user_language == '')--@else{{$user->user_language}}@endif <br> Exp: {{$user->user_experience}} @if($user->user_experience != '')Years @endif</p>
                                <div class="metaInfo">
                                    <span class="text-primary fw-bold">₹ {{$user->per_minute}}/min</span>
                                    <a href="#" @if($user->is_busy == 1) style="border:2px solid red;border-radius:50%;padding:3%;" @endif @if($user->is_busy == 1) onclick="is_busy()" @else onclick="send_request(this,{{$id}},{{$user->id }},'{{$user->user_status}}')" @endif class="ms-auto"><img src="{{ asset('public/astrology_assets/images/msg.png')}}"></a>
                                    <a href="#" class="ms-2"><img src="{{ asset('public/astrology_assets/images/tel.png')}}"></a>
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

@include('layouts.front_end.footer')
      <!--  JS Files -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="{{ asset('public/astrology_assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

                location.href = base_url+'/user/recharge';


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
