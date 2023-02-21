<!DOCTYPE html>
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

    </nav>
    <div class="first-sec">

        <h1>Horoscope</h1>

        <button>
            <p>Home</p> <img src="{{ asset('public/front_img//Vector (1)btn.png') }}" class="" height="20" alt="">
            <h6>Horoscope</h6>
        </button>

    </div>
    <section class=" new-kundli">
        <div class="daily-horoscope">
            <div class="heading-btn">
                <h1>Daily horoscope</h1>
            </div>
            <div class="btn-sec" id="myDIV">
                <button class="btn-second daily_event_call_desc" data-item="Daliy" data-active="active"><img src="{{ asset('public/front_img/icon.png') }}" alt="">
                    Daliy</button>
                <button class="btn-second daily_event_call_desc" data-item="Tomorrow" ><img src="{{ asset('public/front_img/icon-c.png') }}" alt="">
                    Tomorrow</button>
                <button class="btn-third daily_event_call_desc" data-item="Week"><img src="{{ asset('public/front_img/icon-c.png') }}" alt=""> This
                    Yesterday</button>
                <button class="btn-fourth daily_event_call_desc" data-item="Month"><img src="{{ asset('public/front_img/icon-c.png') }}" alt=""> This
                    Month</button>
                <button class="btn-fifth daily_event_call_desc" data-item="2023"><img src="{{ asset('public/front_img/icon-c.png') }}" alt="">
                    2023</button>

                    <input type="hidden" id="current_data" value={{$star}}>
            </div>
        </div>

        <img src="https://collabdoor.com/images/loader.gif"  id="img" style="display:none;width: 120px;
    margin-left: 49%;" >


        <!-- <div class="rashi-box">
            <div class="first-box">
                <a href="{{url('horoscope/?zodic=aries')}}"><div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//1.png') }}" alt=""></div>
                    <h1>Aries</h1>
                    <p>Mar 21- Apr 19</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=taurus')}}"><div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//2.png') }}" alt=""></div>
                    <h1>Taurus</h1>
                    <p>Apr 20- May 20</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=gemini')}}"><div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//3.png') }}" alt=""></div>
                    <h1>Gemini</h1>
                    <p>May 21- June 20</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=cancer')}}"><div class="box-one">
                    <div class="box-one-div"><img src="{{ asset('public/front_img//4.png') }}" alt=""></div>
                    <h1>Cancer</h1>
                    <p>June 21- July 22</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=leo')}}"><div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//5.png') }}" alt=""></div>
                    <h1>Leo</h1>
                    <p>July 22- Aug 22</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=virgo')}}"><div class="box-one">
                    <div class="box-one-div"><img src="{{ asset('public/front_img//6.png') }}" alt=""></div>
                    <h1>Virgo</h1>
                    <p>Aug 23- Sep 22</p>
                </div></a>


            </div>
            <div class="first-box">
                <a href="{{url('horoscope/?zodic=libra')}}"><div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//7.png') }}" alt=""></div>
                    <h1>Libra</h1>
                    <p>Sep 23- Oct 22</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=scorpio')}}"><div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//8.png') }}" alt=""></div>
                    <h1>Scorpio</h1>
                    <p>Oct 23- Nov 21</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=sagittarius')}}"><div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//9.png') }}" alt=""></div>
                    <h1>Sagittarius</h1>
                    <p>Nov 22- Dec 21</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=capricorn')}}"><div class="box-one">
                    <div class="box-one-div"><img src="{{ asset('public/front_img//10.png') }}" alt=""></div>
                    <h1>Capricorn</h1>
                    <p>Dec 22- Jan 19</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=aquarius')}}"><div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//32.png') }}" alt=""></div>
                    <h1>Aquarius</h1>
                    <p>Jan 20- Feb 18</p>
                </div></a>
                <a href="{{url('horoscope/?zodic=pisces')}}"><div class="box-one">
                    <div class="box-one-div"><img src="{{ asset('public/front_img//33.png') }}" alt=""></div>
                    <h1>Pisces</h1>
                    <p>Feb 19- Mar 20</p>
                </div></a>


            </div>
 </div>  -->




<div id=""  class="m-5" >
<h3 style="text-align:center" id="headdailyscope" class="headdailyscope"></h3>
<h4 style="text-align:center;font-weight: 200;">Know Your Horoscope</h4>
<!-- <p><h5 id="subtitle">Horoscope for zodiac signs</h5> -->
<!-- <p id="description_Data">Reading your Today’s horoscope is one of the best ways to predict your future. The foretelling of the future through the Daily horoscope is an ancient practice and finds relevance even today. The horoscope prediction is about predicting the individual's future based on various astrological aspects such as the position of the planets, Nakshatras, Tithi, and much more. However, it’s predominantly the movement of planets from one house of the Kundli to another that influences the life of the native and thus his Daily horoscope. As planets are in motion, their position in the chart of the native on a daily basis virtually decides the course of his life and fortune.</p> -->


</span>

</p>



</div>






   <div id="dailyhoroscope" class="dailyhoroscope">
    <section>
    <div class="m-5" style="margin-left:10rem  !important;margin-right:10rem !important;" id="adscent_prediction">
                
            </div>

            <div class="container" id="main_container">
                <div class="row">
                    <div class="col-md-16">
                        <div class="card mb-3">
                            <div class="row no-gutters aries" style="cursor:pointer;" data-field="aries">
                                <!-- <div class="col-md-4">
                                    <img src="{{ asset('public/front_img//Mask group.png') }}" class="rounded-circle" width="150" height="150" alt="...">
                                </div> -->
                                <div class="col-md-12">
                                    <div class="card-body">
                                    

                                        <h5 class="card-title">{{ ucfirst(trans($star)) }}</h5>
                                        <div id="alldatassdsd">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    </div>
                      </div>
    </section>
        </div>



  






    <section class="footers">
        <img src="{{ asset('public/front_img//Logo-removebg-preview 1.png') }}" alt="">
        <div class="footer-first-div">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing <br> elit ut aliquam, purus sit amet luctus venenatis,
                lectus <br> magna fringilla urna, porttitor rhoncus dolor purus <br> non enim praesent elem</p>
        </div>
        <div class="footer-second-div">

            <ul>

                <li style="font-family: 'Lato'sans-serif;
         font-style: normal;
         font-weight: 700;
         font-size: 20px;"> Our Service</li>
                <div class="our-ul"> </div>
                <li>Horoscope</li>
                <li>Gemstones</li>
                <li>Numerology</li>
                <li>Tarot Cards</li>
                <li>Birth Journal</li>
            </ul>
        </div>
        <div class="footer-third-div">
            <ul>
                <li style="font-family: 'Lato'sans-serif;
          font-style: normal;
          font-weight: 700;
          font-size: 20px;"> Quick Links</li>
                <div class="our-ul"> </div>
                <li>About Us</li>
                <li>Blog</li>
                <li>Services</li>
                <li>Contact US</li>
            </ul>
        </div>
        <div class="footer-four-div">
            <ul>
                <li style="font-family: 'Lato'sans-serif;
          font-style: normal;
          font-weight: 700;
          font-size: 20px;"> Contact</li>
                <div class="our-ul"> </div>
                <li>(406) 555-0120</li>
                <li>mangcoding123@gmail.com</li>
                <li>2972 Westheimer Rd.</li>
                <li> Santa Ana, Illinois 85486 </li>
            </ul>
        </div>
    </section>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
/* Style the active class, and buttons on mouse-over */
.daily_event_call_desc[data-active="active"], .btn:hover {
  background-color: #fe870a;
  color: white;
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