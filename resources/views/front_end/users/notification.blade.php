<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Kundli</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/free_kundli.css?v=').time() }}">
</head>
<style>
.notifaction {
    height: 160px;
    margin-top: 40px;
}

.container {

    height: 700px
}

.new-kundli {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.container::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
}

/* Handle */
.container::-webkit-scrollbar-thumb {
    background: #fe870a;
    border-radius: 10px;
}

.td_style {
    background: #fe870a;
    color: white;
}
</style>

<body>
    <nav>

        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png')}} " alt="">
        <div>

            <ul>
                <li style="font-family: 'Lato', sans-serif;"> <a href="{{ url('/')}}"> Home </a> </li>
                <li><a href="{{ url('/all')}}"> Our Astrologer </a> </li>
                <li><a href="{{ url('/services')}}"> Services </a></li>
                <li><a href="{{ url('/kundli')}}"> <b
                            style="color:#fe870a !important;border-bottom: 2px solid #fe870a;"> Kundli </b> </a></li>
                <li><a href="{{ url('/horoscope')}}"> Horoscope </a> </li>
                <li><a href="{{ url('/blog')}}"> Blog </a> </li>
            </ul>
        </div>
        <button style="height: 55px;  width: 170px;">Contact Us</button>
    </nav>
    <div class="first-sec">

        <h1>Notifaction</h1>

        <button>
            <p>Home</p> <img src="{{ asset('public/front_img/Vector (1)btn.png')}} " class="" height="20" alt="">
            <h6>Kundli</h6>
        </button>

    </div>
    <section class=" new-kundli">
        <div class="btin-sec">
            <button class="first-btn">Notification</button>
            <!-- <button class="second-btn">Kundli Matching</button>  -->
        </div>

        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group" style="overflow: scroll;height:40rem;">
                        @foreach($messages as $key=>$message)
                        <li class="list-group-item d-fle">
                            <div @if($key % 2==0) class="td_style" @endif class="card mb-3"
                                style="max-width: 100%;max-height:20%'">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="https://as2.ftcdn.net/v2/jpg/03/49/49/79/1000_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.jpg"
                                            class="img-fluid mt-2 rounded-start" alt="..." width="100">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title">You Have New Chat Request</h5>
                                            <div class="row">
                                                <div class="col-md-10">test</div>
                                                <div class="col-md-2">

                                                @if($message->status == 'Pending')
                                                   <a onclick="approve_request({{$message->id}})"><i class="fa fa-check text-success fa-2x"
                                                        aria-hidden="true"></i></a> 
                                                 @endif       
                                                        <!-- <i class="fa mx-2 fa-ban text-danger fa-2x"
                                                        aria-hidden="true"></i>
                                                        <i class="fa fa-trash fa-2x mx-2"
                                                        aria-hidden="true"></i></div> -->
                                            </div>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                        @endforeach
                  
                    </ul>
                </div>

            </div>
            <!--  <div class="col">
    <div class="notifaction col border rounded" >
      <div class="card">
      	
      </div>
    </div>
    <div class="notifaction col border rounded" >
      Column
    </div>
    <div class="notifaction col border rounded" >
      Column
    </div>
    <div class="notifaction col border rounded" >
      Column
    </div>
    <div class="notifaction col border rounded" >
      Column
    </div>
    <div class="notifaction col border rounded" >
      Column
    </div>
    <div class="notifaction col border rounded" >
      Column
    </div>
    <div class="notifaction col border rounded" >
      Column
    </div>

  </div> -->
        </div>
    </section>


    <section class="footers">
        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png')}} " alt="">
        <div class="footer-first-div">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing <br> elit ut aliquam, purus sit amet
                luctus venenatis,
                lectus <br> magna fringilla urna, porttitor rhoncus dolor purus <br> non enim praesent
                elem</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

<script type="text/javascript"
    src='https://maps.google.com/maps/api/js?key=AIzaSyCZOsCzOOTKFoXCDI9e1yZvVCOTvDonerg&libraries=places'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"> </script>
<script>
var base_url = location.protocol+'//'+location.host+'/astrology'

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
         console.log(result)
         if(result !=0)
                {
                  console.log(result)
                    location.href = 'http://collabdoor.com/astrology/user/chat/'+result;

                }
        }
    });
}
</script>

</html>