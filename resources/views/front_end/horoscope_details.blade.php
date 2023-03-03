<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horoscope</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/horoscope_style.css?v=').time() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <nav>

        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png')}} " alt="">
        <div>

            <ul>
                <li style="font-family: 'Lato', sans-serif;"> <a href="{{ url('/')}}"> Home </a> </li>
                <li><a href="{{ url('/all')}}"> Our Astrologer </a> </li>
                <li><a href="{{ url('/services')}}"> Services</a></li>
                <li><a href="{{ url('/kundli')}}"> Kundli </a></li>
                <li><a href="{{ url('/horoscope')}}"><b
                            style="color:#fe870a !important;border-bottom: 2px solid #fe870a;"> Horoscope </b></a> </li>
                <li><a href="{{ url('/blog')}}"> Blog </a> </li>
            </ul>
        </div>

        <?php  if(Auth::guard('users')->check() == true){ $id=Auth::guard('users')->user()->id;?>
        {{Auth::guard('users')->user()->name}} <a href='{{url("/user/notification/$id")}}'><i class="fa fa-bell fa-x"
                aria-hidden="true"></i><span id="count" style="margin-top:1rem;"></span></a>
        <?php } else{ ?>
        <a class="login-btn text-light" href="{{url('/signin')}}">Sing In</a>
        <?php } ?>

    </nav> -->
@include('layouts.front_end.header')

    <section id="page-title">
    <div class="container">
            <h1>Horoscope</h1>
            <ul>
                    <li><a href="#"> Home </a></li>
                    <li>Horoscope</li>
            </ul>
    </div>
</section>
    
    <section class=" new-kundli">
        <div class="container">
        <div class="daily-horoscope">
           
            <div class="btn-sec text-center" id="myDIV">
                <button class="btn btn-primary  daily_event_call_desc" data-item="Daliy" data-active="active"><i class="far fa-calendar-alt"></i>
                    Daliy</button>
                <button class="btn btn-primary  daily_event_call_desc" data-item="Tomorrow" ><i class="far fa-calendar-alt"></i>
                    Tomorrow</button>
                <button class="btn btn-primary daily_event_call_desc" data-item="Week"><i class="far fa-calendar-alt"></i> This
                    Yesterday</button>
                <button class="btn btn-primary  daily_event_call_desc" data-item="Month"><i class="far fa-calendar-alt"></i> This
                    Month</button>
                <button class="btn btn-primary daily_event_call_desc" data-item="2023"><i class="far fa-calendar-alt"></i>
                    2023</button>

                    <input type="hidden" id="current_data" value={{$star}}>
            </div>
        </div>
       <div id="img" style="display:none;"> <img src="https://collabdoor.com/images/loader.gif" width="200px" ></div>
        <div class="horoscopeDetail">
            <div class="title text-center" >
                <h3 id="headdailyscope" class="headdailyscope"></h3>
                <p>Know Your Horoscope</p>
            </div>

            <h5 class="card-title">{{ ucfirst(trans($star)) }}</h5>
            <div id="alldatassdsd">

            </div>
        </div>

    </div>
        
</section>







  



@include('layouts.front_end.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
/* Style the active class, and buttons on mouse-over */
.daily_event_call_desc[data-active="active"], .btn:hover {
  background-color: transparent; border-color: #fe870a;
  color: #fe870a !important;
}

</style>
<script>
let get_current_data=$("#current_data").val();
let sign=get_current_data;
var base_url = location.protocol + '//' + location.host
console.log("get_current_data",get_current_data);
get_horoscrope_by_sign(get_current_data,'dailyHoroscope');
let end_points='dailyHoroscope';
console.log(location.search)

var maxLength = 100;
var Zodic='aries'
var time='today'
let contents;
title_head= get_current_data.toUpperCase()  + " TODAY'S HOROSCOPE"
$(".headdailyscope").html(title_head);




function get_horoscrope_by_sign(sign,end_points) {
var data = [sign]

$.each(data, function(i) {
    $('#alldatassdsd').empty();
    console.log(data[i])
    var url = base_url + '/'+end_points+'/' + data[i]
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log("resultoneee",result);
            $('#img').hide(); 
       
    contents=  '<p><span style="color:green;font-weight:600">Personal Life :</span>'+result.prediction.personal_life +'</p><p><span style="color:red;font-weight:600">Emotions :</span>'+result.prediction.emotions +'</p><span style="color:blue;font-weight:600">Health :</span>'+result.prediction.health +'</p><p><span style="color:gray;font-weight:600">Luck :</span>'+result.prediction.luck +'</p><p><span style="color:turquoise;font-weight:600">Profession :</span>'+result.prediction.profession +'</p><p><span style="color:black;font-weight:600">Travel :</span>'+result.prediction.travel +'</p>';
    //  console.log("contents",contents)
   $('#alldatassdsd').html(contents);

        }

       
    });

})
}






const header = document.querySelector("#myDIV");

header.addEventListener('click', event => {
  if (event.target.tagName === 'BUTTON') {
    let activeButton = header.querySelector('.daily_event_call_desc[data-active="active"]');
    const currentState = event.target.dataset.active;
    
    if (activeButton && activeButton !== event.target ) {
      activeButton.dataset.active = null;
    }
    
    event.target.dataset.active = currentState === 'active' ? null : 'active';
  }
});





//codeme

$( ".daily_event_call_desc" ).on( "click", function() {
$('#img').show();     
var end_points;
var title_head
var horoscopeType=$(this).data('item');


if(horoscopeType=='Daliy'){
    end_points='dailyHoroscope';
    title_head=  get_current_data.toUpperCase() +" TODAY'S HOROSCOPE"
    $(".headdailyscope").html(title_head);
    //$(this).css("background-color", "red");

}
else if(horoscopeType=='Tomorrow'){
    end_points='tomorrow_horoscope';
    title_head=  get_current_data.toUpperCase() + " TOMORROW HOROSCOPE"
    $(".headdailyscope").text(title_head);
}
else if(horoscopeType=='Week'){
    end_points='weekly_horoscope';
    title_head=  get_current_data.toUpperCase() +" WEEKLY HOROSCOPE"
    $(".headdailyscope").text(title_head);
} 
else if(horoscopeType=='Month'){
    end_points='monthly_horoscope';
    title_head=  get_current_data.toUpperCase() + " MONTHLY HOROSCOPE"
    $(".headdailyscope").text(title_head);
} else {
    end_points='yearly_horoscope';
    title_head=  get_current_data.toUpperCase() +" Yearly HOROSCOPE"
    $(".headdailyscope").text(title_head);

    
}
get_horoscrope_by_sign(get_current_data,end_points)

});
</script>

</html>