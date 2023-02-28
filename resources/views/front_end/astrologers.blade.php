@include('layouts.front_end.header')
<style>
    .astrologerListBox {
  background: #FFFFFF;
  border: 1px solid #EFEFEF;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
  padding: 15px; margin-bottom: 25px;
}.astroBoxTop {
  display: flex;
  position: relative;
}.astroBoximg img {
  width: 100px;
  height:150px;
  border-radius: 10px;
}.astroBoximg {
  margin-right: 15px;
}
.checkicon {
  position: absolute;
  right: 0;
}
.astroBoxcont h4 {
  font-size: 28px;
  font-weight: 600;
}
.astroBoxcont h5 { margin: 5px 0;
  font-size: 18px;
}.astroBoxcont p {
  font-size: 13px;
  color: #979797;
  line-height: 20px;
}

.reviewBox {
  color: #979797;
  font-size: 13px;
  margin-top: 7px;
}
.reviewBox i{margin-left: 3px}

</style>
<link rel="stylesheet" href="{{ asset('public/front_end/css/our_astro.css?v=').time() }}">

<div class="first-div">
    <span class="banner_heading">Our Astrologer</span>
    <button class="banner_button">
        <p class="banner_para">Home</p> <img src="https://collabdoor.com/public/front_img/Vector%20(1)btn.png" class=""
            height="20" alt="">
        <h5 class="text-light">Astrologers</h5>
    </button>
</div>

<div class="container mt-3 md-5">
<div class="second-div">
        <div class="btn-div">
            <a class="btn" href="{{url('user/recharge')}}" style="background: #FE8302;color: white;">Recharge</a>
            <p>Rs. {{$wallets}}</p>
        </div>
        <div class="btn-div"> <input type="text" placeholder=" Search Name " name="" id=""> <img
                style="position: absolute; left: 750px;" src="{{ asset('public/front_img/saerch icon.png') }}"
                height="25" alt="">
            <h1><i class="fa-solid fa-magnifying-glass"></i></h1>
            <button class="button"><img src="{{ asset('public/front_img/filter.png') }}" height="25" alt=""> <a
                    href="#popup1">Filter</a></button>
        </div>
        <button class="sort-btn"><img src="{{ asset('public/front_img/ss.png') }}" height="23" alt=""> Sort by</button>


    </div>
</div>

<div class="container mt-5">
<div class="astrologerList">
            <div class="row">
                
    <?php $id=0; if(Auth::guard('users')->check()==true ) { $id=Auth::guard('users')->user()->id;  } ?>
            @foreach($users as $key=>$user)
                <div class="col-lg-4 col-sm-6">
                    <div class="astrologerListBox">
                        <div class="astroBoxTop">
                            <div class="astroBoximg"><img src="{{url('/')}}/images/profile_image{{$user->profile_image}}">
                                <div class="reviewBox">
                                    <i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star"></i> 4.5
                                </div>
                            </div>
                            <div class="astroBoxcont">
                                <span class="checkicon"><img width="25" src="{{ asset('public/front_img/blue tick.png') }}"></span>
                                <h4>{{$user->name}}</h4>
                                <h5 class="mt-2">@if($user->user_expertise == '')--@else{{$user->user_expertise}}@endif</h5>
                                <p class="mt-2">@if($user->user_language == '')--@else{{$user->user_language}}@endif <br> Exp: {{$user->user_experience}} @if($user->user_experience != '')Years @endif</p>
                                <div class="metaInfo">
                                    <span class="text-primary fw-bold">@if($user->per_minute == NULL || $user->per_minute==0)<b> <span
                                                    style="color: red;">FREE</span> </b> @else <span
                                                style="color: #FE8302;">
                                                &#x20b9; {{$user->per_minute}} /min </span> @endif</span>
                                  
                                </div>
                                <div style="margin-left:140px;" onclick="send_request(this,{{$id}},{{$user->id }})"><a   class=""><img width="25" src="{{ asset('public/front_img/icon-message.png') }}"></a>
                                    <a href="#"  class="mx-1"><img width="25" src="{{ asset('public/front_img/call icon.png') }}"></a></div> 
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</div>
@include('layouts.front_end.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

var base_url = location.protocol+'//'+location.host

  <?php
   if(Auth::guard('users')->check() == true){
    $loginId = auth()->guard("users")->user()->id;
    ?>
var user_type={{auth()->guard("users")->user()->user_type}}


function send_request(element, from_user_id, to_user_id) {
    console.log(from_user_id)
    console.log(to_user_id)

  if(user_type == 2){
    Swal.fire('Login with User')
  }else{

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
                 location.href = base_url+'/confirm-request/'+ to_user_id;
               
            }

        }
    });
  }
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
</script>