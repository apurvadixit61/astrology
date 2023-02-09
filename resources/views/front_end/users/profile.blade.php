<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<nav>

<a href="{{ url('/')}}"> <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png') }}" alt=""></a>
 <div>

 <ul>
     <li style="color: black;"> <a href="{{ url('/')}}"> Home </a></li>
     <li><a href="{{ url('/all')}}"> <b>Our Astrologer </b> </a>  </li>
     <li><a href="{{ url('/services')}}"> Services </a></li>
     <li><a href="{{ url('/kundli')}}"> Kundli </a></li>
     <li><a href="{{ url('/horoscope')}}"> Horoscope </a>  </li>
     <li><a href="{{ url('/blog')}}"> Blog </a>  </li>

   </ul>
 </div>
 <button style="height: 55px;  width: 170px;">Contact Us</button>

</nav>

    <div class="div">
        <div class="about">
            <div class="profile-div">
                <img class="profile-img" src="{{url('/')}}/images/profile_image{{$users->profile_image}}" alt="">
                <h1>{{$users->name}}</h1>
                <p>{{$users->user_expertise}}, Tarot, {{$users->user_education}}</p>
                <p>{{$users->user_language}}</p>
                <p>{{$users->user_experience}}</p>
                <span style="color:
           #FE870A;">
                    ₹ {{$users->per_minute}} /min
                </span>
                <div class="icon-div">
                    <button><img src="{{url('/')}}/images/call-icon.png" alt=""> Start Chat <p>50 mins</p></button>
                    <button><img src="{{url('/')}}/images/message-icon.png" alt=""> Start Call <p>20 mins</p></button>
                </div>
            </div>

            <div class="about-paragraph">
                <h1>About Me</h1>
                @php $about = ($users->user_aboutus == NULL)?"Astrologer has no About Us details":$users->user_aboutus
                @endphp
                <p>{{$about}}
                </p>
                <div class="about-img-div">
                    <button><img src="{{url('/')}}/images/Vector (1).png" alt=""></button>
                    <img src="{{url('/')}}/images/about-img.png" alt="">
                    <img src="{{url('/')}}/images/about-img.png" alt="">
                    <img src="{{url('/')}}/images/about-img.png" alt="">
                    <img src="{{url('/')}}/images/about-img.png" alt="">
                    <button style="background: #FE870A;"><img src="{{url('/')}}/images/Vector (1)btn.png" alt=""></button>
                </div>
            </div>
        </div>
        <div class="rating">
            <div class="availability">
                <h4>Availability</h4>
                <div class="monday">
                    <h6>Monday <br> Jan 09 </h6>
                    <p>07:00 AM - 12:30 PM <br> 04:00 PM - 12:00 AM</p>
                </div>
                <div class="monday">
                    <h6>Monday <br> Jan 09 </h6>
                    <p>07:00 AM - 12:30 PM <br> 04:00 PM - 12:00 AM</p>
                </div>
                <div class="monday">
                    <h6>Monday <br> Jan 09 </h6>
                    <p>07:00 AM - 12:30 PM <br> 04:00 PM - 12:00 AM</p>
                </div>
                <div class="monday">
                    <h6>Monday <br> Jan 09 </h6>
                    <p>07:00 AM - 12:30 PM <br> 04:00 PM - 12:00 AM</p>
                </div>
                <div class="monday">
                    <h6>Monday <br> Jan 09 </h6>
                    <p>07:00 AM - 12:30 PM <br> 04:00 PM - 12:00 AM</p>
                </div>
                <div class="monday">
                    <h6>Monday <br> Jan 09 </h6>
                    <p>07:00 AM - 12:30 PM <br> 04:00 PM - 12:00 AM</p>
                </div>

            </div>
            <div class="rating-reviews">
                <h4>Rating & Reviews</h4>
                <div class="number-rating">
                    <div class="nuber-rating-first">
                        <h1>4.7</h1>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <p>From 3.5K reviews</p>
                    </div>
                    <div class="number-raating-second">
                        <div class="row">
                            <div class="side">
                                <div>5 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-5"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>150</div>
                            </div>
                            <div class="side">
                                <div>4 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-4"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>63</div>
                            </div>
                            <div class="side">
                                <div>3 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-3"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>15</div>
                            </div>
                            <div class="side">
                                <div>2 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-2"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>6</div>
                            </div>
                            <div class="side">
                                <div>1 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-1"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>20</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border"></div>
                <div class="peoples-rating">
                    <div class="peop">
                        <img src="./images/Ellipse 4.png" alt="">
                        <div class="people-start">
                            <h1>Carlie Harvey</h1>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum <br> has
                        been
                        the industry's standard.</p>
                </div>
                <div class="peoples-rating">
                    <div class="peop">
                        <img src="./images/Ellipse 4.png" alt="">
                        <div class="people-start">
                            <h1>Carlie Harvey</h1>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum <br> has
                        been
                        the industry's standard.</p>
                </div>
                <div class="peoples-rating">
                    <div class="peop">
                        <img src="./images/Ellipse 4.png" alt="">
                        <div class="people-start">
                            <h1>Carlie Harvey</h1>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum <br> has
                        been
                        the industry's standard.</p>
                </div>
                <div class="peoples-rating">
                    <div class="peop">
                        <img src="./images/Ellipse 4.png" alt="">
                        <div class="people-start">
                            <h1>Carlie Harvey</h1>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum <br> has
                        been
                        the industry's standard.</p>
                </div>
            </div>


        </div>
    </div>
    </div>
    <section class="footers">
        <img src="./images/Logo-removebg-preview 1.png" alt="">
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

</html>
