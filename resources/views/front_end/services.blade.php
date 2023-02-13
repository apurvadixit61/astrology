<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/service_style.css?v=').time() }}">
</head>

<body>
    <nav>

        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png')}} " alt="">
        <div>

            <ul>
                <li style="font-family: 'Lato', sans-serif;"> <a href="{{ url('/')}}"> Home </a> </li>
                <li><a href="{{ url('/all')}}"> Our Astrologer </a> </li>
                <li><a href="{{ url('/services')}}"><b  style="color:#fe870a !important;border-bottom: 2px solid #fe870a;" >  Services </b></a></li>
                <li><a href="{{ url('/kundli')}}"> Kundli  </a></li>
                <li><a href="{{ url('/horoscope')}}"> Horoscope </a> </li>
                <li><a href="{{ url('/blog')}}"> Blog </a> </li>
            </ul>
        </div>

        <?php  if(Auth::guard('users')->check() == true){ $id=Auth::guard('users')->user()->id;?>
        {{Auth::guard('users')->user()->name}}  <a href='{{url("/user/notification/$id")}}'><i class="fa fa-bell fa-x" aria-hidden="true"></i><span id="count" style="margin-top:1rem;"></span></a>
        <?php } else{ ?>
        <a class="login-btn text-light" href="{{url('/signin')}}">Sing In</a>
        <?php } ?>
        
    </nav>
    <div class="first-sec">

        <h1>Services</h1>

        <button>
            <p>Home</p> <img src="{{ asset('public/front_img/Vector (1)btn.png')}} " class="" height="20" alt="">
            <h6>Services</h6>
        </button>

    </div>
    <section class=" Service">


        <div class="Services">
            <div class="first-serv">

                <div class="serv-one">


                    <span> <img src="{{ asset('public/front_img/Mask group (3).png')}}" alt="">
                        <h5>Today's Horoscope</h5>
                        <p></p>

                    </span>
                    <p> Get free Aries daily horoscope prediction today online from the best astrologer. Read your Aries
                        Zodiac Sign horoscope today! </p>

                    <p class="link"><a href="">READ MORE</a> </p>

                </div>
                <div class="serv-one">
                    <span> <img src="{{ asset('public/front_img/hindi-kundli-img 1.png')}}" alt="">
                        <h5 class="mx-1"><a href="{{ url('/kundli')}}">Free Kundli</a></h5>

                    </span>
                    <p> Generate your free online kundli report from ---. Our Kundli software can help you predict
                        the future for yourself by reading the birth chart. </p>
                    <p class="link" > <a href="{{ url('/kundli')}}">Try Now</a> </p>
                </div>
                <div class="serv-one">
                    <span> <img src="{{ asset('public/front_img/11.png')}}" alt="">
                        <h5>Kundli Matching</h5>

                    </span>
                    <p> Love could be confusing, but only until you haven’t found how compatible you two are for each other. </p>
                    <p class="link" style="margin-top:2.5rem;"> <a href="{{ url('/kundli')}}">Try Now</a></p>
                </div>
                <div class="serv-one">
                    <span> <img st src="{{ asset('public/front_img/91.png')}}" alt="">
                        <h5>Talk to Astrologer</h5>

                    </span>
                    <p>There are many variations of <br>
                        passages of Lorem Ipsum <br>
                        available</p>
                    <p class="link"  style="margin-top:2.5rem;" > <a href="{{ url('/all')}}">Try Now</a></p>

                </div>
            </div>

    </section>
    <section class="Client-sec">
        <div class="container" style="  flex-wrap: wrap;">
            <div class="Services-heading">

                <h1>What Clients Says</h1>
                <img style="margin-left: 39%;" height="15" src="{{ asset('public/front_img/1-2-1 1.png')}}" alt="">
                <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority
                    have suffered
                    alteration
                    in some form, by injected hummer.</p>

            </div>
            <div class="Client-sec-second">

                <div class="client-div-first">
                    <p>
                        Contrary to popular belief, Lorem Ipsum<br>is not simply
                        random text. It has roots in <br>a piece of classical Latin
                        literature from <br> 45 BC br making it over 2000 years old
                    </p>
                    <div class="testm">
                        <div class="client-img-div"></div>

                        <h3>Phillip Vetrovs</h3>
                        <h4>Astrologer</h4>
                        <div class="star-div-client">
                            <div class="rate">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="client-div-first">
                    <p style="margin-left: 10px;">
                        It is a long established fact that a reader will be
                        dist<br>racted by the readable content of page when looking
                        <br>at its layout The point of using Lorem Ipsum is that it
                    </p>
                    <div style="display: flex; margin-top: 220px; margin-left: 170px;">
                        <div class="testmsecond">

                            <div class="client-img-div-second"></div>

                            <h3>Randy Stanton</h3>
                            <h4>Astrologer</h4>
                            <div class="star-div-client">
                                <div class="rate">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
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
                <li><a href="{{url('services')}}">Horoscope</a> </li>
                <li><a href="{{url('services')}}">Gemstones</a></li>
                <li><a href="{{url('services')}}">Numerology</a></li>
                <li><a href="{{url('services')}}">Tarot Cards</a></li>
                <li><a href="{{url('services')}}">Birth Journal</a></li>
            </ul>
        </div>
        <div class="footer-third-div">
            <ul>
                <li style="font-family: 'Lato'sans-serif;
        font-style: normal;
        font-weight: 700;
        font-size: 20px;"> Quick Links</li>
                <div class="our-ul"> </div>
                <li><a href="{{url('services')}}">About Us</a></li>
                <li><a href="{{url('services')}}">Blog</a></li>
                <li><a href="{{url('services')}}">Services</a></li>
                <li><a href="{{url('services')}}">Contact US</a></li>
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

<script type="text/javascript"
    src='https://maps.google.com/maps/api/js?key=AIzaSyCZOsCzOOTKFoXCDI9e1yZvVCOTvDonerg&libraries=places'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"> </script>
<script>
$(document).on('keyup', '#front-search-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field"));
});

$(document).ready(function($) {

    $("#register-form").validate({
        rules: {
            full_name: "required",
            gender: "required",
            birth_time: "required",
            birth_date: "required",
            birth_place: "required"

        },
        messages: {
            full_name: "Please enter your Name",
            birth_place: "Please enter your Place",
            birth_date: "Please enter your Date",
            birth_time: "Please enter your Time",
            gender: "Please select your Gender",

        },
        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.form-group'));
            } else { // This is the default behavior 
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            form.submit();
        }

    });
});
</script>

</html>