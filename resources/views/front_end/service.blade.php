<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundli</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/free_kundli.css') }}">
</head>

<body>
    <nav>

        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png')}} " alt="">
        <div>

            <ul>
                <li style="font-family: 'Lato', sans-serif;"> <a href="{{ url('/')}}"> Home </a> </li>
                <li><a href="{{ url('/all')}}"> Our Astrologer </a> </li>
                <li><a href="{{ url('/services')}}"> Services </a></li>
                <li><a href="{{ url('/kundli')}}"> <b> Kundli </b> </a></li>
                <li><a href="{{ url('/horoscope')}}"> Horoscope </a> </li>
                <li><a href="{{ url('/blog')}}"> Blog </a> </li>
            </ul>
        </div>
        <button style="height: 55px;  width: 170px;">Contact Us</button>
    </nav>
    <div class="first-sec">

        <h1>Our Astrologer</h1>

        <button>
            <p>Home</p> <img src="{{ asset('public/front_img/Vector (1)btn.png')}} " class="" height="20" alt="">
            <h6>Our Astrologer</h6>
        </button>

    </div>
    <section class=" new-kundli">
        <div class="btin-sec">
            <button class="first-btn">Free Kundli Online</button>
            <button class="second-btn">Kundli Matching</button>
        </div>
        <h1>New Kundli</h1>
        <div class="newkundli-input">
            <form action="{{route('getKundli')}}" method="post" id="register-form" novalidate="novalidate" >
                @csrf

            <div class="input-one">
                <h5>Full Name</h5>
                <input type="text" name="full_name" placeholder="Enter Name">
                <h5>Gender</h5>
                <select name="gender" id=""> <option value="">Select Gender</option> <option value="male">Male</option><option value="female">Female</option></select>
                <!-- <input type="text" name="gender" placeholder="Select Gender"> -->
                <h5>Birth Date</h5>
                <input type="date" name="birth_date" placeholder="Select Birth " value="{{date('d-m-Y')}}">
                <h5>Birth Time</h5>
                <input type="time" name="birth_time" placeholder="Select Birth time ">
                <h5>Birth Place</h5>
                <input type="text" name="birth_place" placeholder="Select Place " id="front-search-field">
                <button type="submit" style="margin-bottom:0.5rem;">FIND KUNDLI</button>
            </div>
            </form>
            <h3>Saved Matches</h3>
            <div class="input-two">
                <input type="text" placeholder="Search Name">
                <p>Recently Opened</p>
            </div>
        </div>
    </section>
    <section class="matching-kundli">
        <div class="newkundli-input-matching">

            <div class="input-one-matching">
                <div class="div-matching">
                    <div class="input-one-one">
                        <h5>Full Name</h5>
                        <input type="text" placeholder="Enter Name">
                        <h5>Gender</h5>
                        <input type="text" placeholder="Select Gender">
                        <h5>Birth Date</h5>
                        <input type="date" placeholder="Select Birth ">
                        <h5>Birth Time</h5>
                        <input type="text" placeholder="Select Birth time ">
                        <h5>Birth Place</h5>
                        <input type="text" placeholder="Select Place ">
                    </div>
                    <div style="width: 2px; height: 75%; background-color:#FEAB54; margin-top: 20px;"></div>
                    <div class="input-one-two">
                        <h5>Full Name</h5>
                        <input type="text" placeholder="Enter Name">
                        <h5>Gender</h5>
                        <input type="text" placeholder="Select Gender">
                        <h5>Birth Date</h5>
                        <input type="date" placeholder="Select Birth ">
                        <h5>Birth Time</h5>
                        <input type="text" placeholder="Select Birth time ">
                        <h5>Birth Place</h5>
                        <input type="text" placeholder="Select Place ">
                    </div>
                    <button>MATCH KUNDLI</button>
                </div>


            </div>
            <h3>Saved Matches</h3>
            <div class="input-two-matching">
                <input type="text" placeholder="Search Name">
                <p>Recently Opened</p>
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

<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCZOsCzOOTKFoXCDI9e1yZvVCOTvDonerg&libraries=places'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"> </script>
<script>
 

</script>
</html>