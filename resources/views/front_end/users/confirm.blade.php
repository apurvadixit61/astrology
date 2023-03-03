@include('layouts.front_end.header')

<section class="chatMsg">
    <div class="container">
        <div class="title text-center"><h2>you'r all set</h2></div>
        <div class="chatMsg_inner mt-5">
            <div class="chatmsgUsers d-flex align-items-center justify-content-between">
                <div class="chatUser text-center"><img <?php  if(Auth::guard('users')->user()->profile_image != NULL){?> src="{{url('/')}}/images/profile_image{{Auth::guard('users')->user()->profile_image}}" <?php }else{?> src="{{ asset('public/astrology_assets/images/user.jpg')}}"<?php } ?> width="80px"><h4>{{Auth::guard('users')->user()->name}}</h4></div>
                <p class="saving"><span>.</span><span>.</span><span>.</span></p>
                <div class="chatUser text-center"><img src="{{url('/')}}/images/profile_image{{$user->profile_image}}" width="80px"><h4>{{$user->name}}</h4></div>
            </div>
            <h5 class="mt-4 mb-3">You will be connecting with {{$user->name}} in  <span class="otp-countdown"  id="timer-countdown">05:00</div>
        </div> </h5>
        </div>
    </div>
</section>

@include('layouts.front_end.footer')
      <!--  JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="{{ asset('public/astrology_assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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

         if ($('#timer-countdown').length) {
    function countdown( elementName, minutes, seconds )
    {
        var element, endTime, hours, mins, msLeft, time;
        function twoDigits( n )
        {
            return (n <= 9 ? "0" + n : n);
        }
        function updateTimer()
        {
            msLeft = endTime - (+new Date);
            if ( msLeft < 1000 ) {
                element.innerHTML = "Time is up!";
            } else {
                time = new Date( msLeft );
                hours = time.getUTCHours();
                mins = time.getUTCMinutes();
                element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
                setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
            }
        }
        element = document.getElementById( elementName );
        endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
        updateTimer();
    }
    countdown( "timer-countdown", 5, 0 );
}

          
      </script>

<script>
var intervalId = window.setInterval(function() {
    checkIsaccepted()
}, 5000);

function checkIsaccepted() {
    var base_url = location.protocol+'//'+location.host

    var url = base_url+'/user/chat-accepted'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        data: {
            data: {{$id}}
        },
        dataType: 'json',
        success: function(result) {
         console.log(result)
                if(result !=0)
                {

                    if(result.status=='Approve')
                    {
                      var  url ='http://134.209.229.112/astrology/user/chats/'+result.from_user_id+'/'+result.to_user_id +'?key='+result.key;
                      location.href = url

                    //   window.open(
                    //     'https://support.wwf.org.uk/earth_hour/index.php?type=individual',
                    //     '_blank' // <- This is what makes it open in a new window.
                    //     );

                    }

                    if(result.status=='Close')
                    {
                         Swal.fire('Your request is Rejected')

                      location.href = base_url
                    }
                //   console.log(result.to_user_id)
                //   console.log(result.key)

                }

        }
    });


}
</script>
     
   </body>
</html>
