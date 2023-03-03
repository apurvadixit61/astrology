@include('layouts.front_end.header')
<section id="page-title">
    <div class="container">
            <h1>Notifications </h1>
            <ul>
                    <li><a href="#"> Home </a></li>
                    <li>Notifications </li>
            </ul>
    </div>
</section>
<section id="notification">
    <div class="container">

    @foreach($messages as $key=>$message)

        <div class="notification-list d-flex align-items-center justify-content-between">
            <div class="notification-list_content d-flex">
                <div class="notification-list_img me-3">
                    <img @if($message->profile_images!='' ||
                            $message->profile_images != NULL)
                            src="{{url('/')}}/images/profile_image{{$message->profile_images}}" @else
                            src="{{ asset('public/front_img/elem.png') }}" alt="" @endif  alt="user" width="50px">
                </div>
                <div class="notification-list_detail">
                    <p><b>{{$message->user_name}}</b> send you chat request</p>
                    <p class="text-muted">You have new chat request confirm to chat with {{$message->user_name}}</p>
                   
                </div>
            </div>

            <div class="notification-list_feature-btn text-end">
                 <p class="text-muted"><strong>{{ explode(' ',$message->created_at)[0]}}</strong> <small>10 mins ago</small></p>
               @if($message->status!='Close') <a href="#" onclick="approve_request({{$message->id}})" ><i class="fas fa-check"></i></a>@endif
                 <a href="#" onclick="reject_request({{$message->id}})"><i class="fas fa-trash"></i></a>
            </div>
        </div>

        @endforeach   
    </div>
</section>


@include('layouts.front_end.footer')
      <!--  JS Files -->
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
          
      </script>

<script>
var base_url = location.protocol+'//'+location.host

function approve_request(request_id)
{
    var url = base_url+'/user/approve_request/'+request_id
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
         console.log(result.from_user_id)
         if(result !=0)
                {
                  console.log(result)
                    location.href = 'http://134.209.229.112/astrology/user/chats/'+result.to_user_id+'/'+result.from_user_id+'?key='+result.key;

                }
        }
    });
}

function reject_request(request_id)
{
    var url = base_url+'/user/reject_request/'+request_id
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
         console.log(result.from_user_id)
         if(result !=0)
                {
                  console.log(result)

                }
        }
    });
}
</script>
     
   </body>
</html>
