<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Astrologers</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/our_astro.css?v=').time() }}">
    <link rel="stylesheet" href="{{ asset('public/front_end/css/popup.css?v=').time() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav>

        <a href="{{ url('/')}}"> <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png') }}" alt=""></a>
        <div>

            <ul>
                <li style="color: black;"> <a href="{{ url('/')}}"> Home </a></li>
                <li><a href="{{ url('/all')}}"> <b  style="color:#fe870a !important;border-bottom: 2px solid #fe870a;" >Our Astrologer</b> </a> </li>
                <li><a href="{{ url('/services')}}"> Services</a></li>

                <li><a href="{{ url('/kundli')}}"> Kundli </a></li>
                <li><a href="{{ url('/horoscope')}}"> Horoscope </a> </li>
                <li><a href="{{ url('/blog')}}"> Blog </a> </li>


            </ul>
        </div>
        <button style="height: 55px;  width: 170px;">Contact Us</button>

    </nav>
    <div class="first-sec">

        <h1>Our Astrologer</h1>

        <button>
            <p>Home</p> <img src="{{ asset('public/front_img/Vector (1)btn.png') }}" class="" height="20" alt="">
            <h6>Our Astrologer</h6>
        </button>
        <!-- 
    <img class=" img-one" src="{{ asset('public/front_img/Elements.png') }}" height="205" alt="">
    <img class="img-two" src="{{ asset('public/front_img/Elements.png') }}" alt="">

    <img class=" left-one" src="{{ asset('public/front_img/rot.png') }}" height="205" alt="">

    <img class="left-three" src="{{ asset('public/front_img/rot.png') }}" height="205" alt=""> -->
    </div>
    <div class="second-div">
        <div class="btn-div">
            <button style="background: #FE8302;color: white;">Recharge</button>
            <p>Rs. 200</p>
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
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Here i am</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                Thank to pop me out of that button, but now i'm done so you can close this window.
            </div>
        </div>
    </div>
    <div class="cards">

        <div class="card-one">
            <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group20@2x.png') }}" alt="">


                <div class="star-div">
                    <div class="rate">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="card-title-div">
                    <div class="blue">
                        <h1>jenny wilson</h1> <img style="height: 20px;"
                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                    </div>
                    <h5>Vedic tarot facereading</h5>
                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                    <p style="color: red; margin-left: -70px;">FREE</p>
                    <div class="icon"> <button><img style="height: 16px;"
                                src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                        <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                alt=""></button>
                    </div>

                </div>
            </div>


        </div>
        <div class="card-one">
            <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group8@2x.png') }}" alt="">


                <div class="star-div">
                    <div class="rate">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="card-title-div">
                    <div class="blue">
                        <h1>jenny wilson</h1> <img style="height: 20px;"
                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                    </div>
                    <h5>Vedic tarot facereading</h5>
                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                    <p style="color: red; margin-left: -70px;">FREE</p>
                    <div class="icon"> <button><img style="height: 16px;"
                                src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                        <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                alt=""></button>
                    </div>
                </div>
            </div>


        </div>


        <div class="card-one">
            <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group16@2x.png') }}" alt="">


                <div class="star-div">
                    <div class="rate">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="card-title-div">
                    <div class="blue">
                        <h1>jenny wilson</h1> <img style="height: 20px;"
                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                    </div>
                    <h5>Vedic tarot facereading</h5>
                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                    <p style="color: red; margin-left: -70px;">FREE</p>
                    <div class="icon"> <button><img style="height: 16px;"
                                src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                        <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                alt=""></button>
                    </div>
                </div>
            </div>


        </div>
        <div class="cards">

            <div class="card-one">
                <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group20@2x.png') }}" alt="">


                    <div class="star-div">
                        <div class="rate">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <div class="card-title-div">
                        <div class="blue">
                            <h1>jenny wilson</h1> <img style="height: 20px;"
                                src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                        </div>
                        <h5>Vedic tarot facereading</h5>
                        <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                        <p style="margin-left: -18px;">Exp: 6 Years</p>
                        <p style="color: red; margin-left: -70px;">FREE</p>
                        <div class="icon"> <button><img style="height: 16px;"
                                    src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                            <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                    alt=""></button>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-one">
                <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group8@2x.png') }}" alt="">


                    <div class="star-div">
                        <div class="rate">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <div class="card-title-div">
                        <div class="blue">
                            <h1>jenny wilson</h1> <img style="height: 20px;"
                                src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                        </div>
                        <h5>Vedic tarot facereading</h5>
                        <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                        <p style="margin-left: -18px;">Exp: 6 Years</p>
                        <p style="color: red; margin-left: -70px;">FREE</p>
                        <div class="icon"> <button><img style="height: 16px;"
                                    src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                            <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                    alt=""></button>
                        </div>
                    </div>
                </div>


            </div>


            <div class="card-one">
                <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group16@2x.png') }}" alt="">


                    <div class="star-div">
                        <div class="rate">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <div class="card-title-div">
                        <div class="blue">
                            <h1>jenny wilson</h1> <img style="height: 20px;"
                                src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                        </div>
                        <h5>Vedic tarot facereading</h5>
                        <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                        <p style="margin-left: -18px;">Exp: 6 Years</p>
                        <p style="color: red; margin-left: -70px;">FREE</p>
                        <div class="icon"> <button><img style="height: 16px;"
                                    src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                            <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                    alt=""></button>
                        </div>
                    </div>
                </div>


            </div>
            <div class="cards">

                <div class="card-one">
                    <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group20@2x.png') }}" alt="">


                        <div class="star-div">
                            <div class="rate">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <div class="card-title-div">
                            <div class="blue">
                                <h1>jenny wilson</h1> <img style="height: 20px;"
                                    src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                            </div>
                            <h5>Vedic tarot facereading</h5>
                            <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                            <p style="margin-left: -18px;">Exp: 6 Years</p>
                            <p style="color: red; margin-left: -70px;">FREE</p>
                            <div class="icon"> <button><img style="height: 16px;"
                                        src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                        alt=""></button>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-one">
                    <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group8@2x.png') }}" alt="">


                        <div class="star-div">
                            <div class="rate">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <div class="card-title-div">
                            <div class="blue">
                                <h1>jenny wilson</h1> <img style="height: 20px;"
                                    src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                            </div>
                            <h5>Vedic tarot facereading</h5>
                            <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                            <p style="margin-left: -18px;">Exp: 6 Years</p>
                            <p style="color: red; margin-left: -70px;">FREE</p>
                            <div class="icon"> <button><img style="height: 16px;"
                                        src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                        alt=""></button>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="card-one">
                    <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group16@2x.png') }}" alt="">


                        <div class="star-div">
                            <div class="rate">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <div class="card-title-div">
                            <div class="blue">
                                <h1>jenny wilson</h1> <img style="height: 20px;"
                                    src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                            </div>
                            <h5>Vedic tarot facereading</h5>
                            <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                            <p style="margin-left: -18px;">Exp: 6 Years</p>
                            <p style="color: red; margin-left: -70px;">FREE</p>
                            <div class="icon"> <button><img style="height: 16px;"
                                        src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                <button><img style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                        alt=""></button>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="cards">

                    <div class="card-one">
                        <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group20@2x.png') }}"
                                alt="">


                            <div class="star-div">
                                <div class="rate">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="card-title-div">
                                <div class="blue">
                                    <h1>jenny wilson</h1> <img style="height: 20px;"
                                        src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                </div>
                                <h5>Vedic tarot facereading</h5>
                                <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                <p style="margin-left: -18px;">Exp: 6 Years</p>
                                <p style="color: red; margin-left: -70px;">FREE</p>
                                <div class="icon"> <button><img style="height: 16px;"
                                            src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                    <button><img style="height: 16px;"
                                            src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-one">
                        <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group8@2x.png') }}" alt="">


                            <div class="star-div">
                                <div class="rate">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="card-title-div">
                                <div class="blue">
                                    <h1>jenny wilson</h1> <img style="height: 20px;"
                                        src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                </div>
                                <h5>Vedic tarot facereading</h5>
                                <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                <p style="margin-left: -18px;">Exp: 6 Years</p>
                                <p style="color: red; margin-left: -70px;">FREE</p>
                                <div class="icon"> <button><img style="height: 16px;"
                                            src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                    <button><img style="height: 16px;"
                                            src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="card-one">
                        <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group16@2x.png') }}"
                                alt="">


                            <div class="star-div">
                                <div class="rate">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="card-title-div">
                                <div class="blue">
                                    <h1>jenny wilson</h1> <img style="height: 20px;"
                                        src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                </div>
                                <h5>Vedic tarot facereading</h5>
                                <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                <p style="margin-left: -18px;">Exp: 6 Years</p>
                                <p style="color: red; margin-left: -70px;">FREE</p>
                                <div class="icon"> <button><img style="height: 16px;"
                                            src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                    <button><img style="height: 16px;"
                                            src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="cards">

                        <div class="card-one">
                            <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group20@2x.png') }}"
                                    alt="">


                                <div class="star-div">
                                    <div class="rate">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div class="card-title-div">
                                    <div class="blue">
                                        <h1>jenny wilson</h1> <img style="height: 20px;"
                                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                    </div>
                                    <h5>Vedic tarot facereading</h5>
                                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                                    <p style="color: red; margin-left: -70px;">FREE</p>
                                    <div class="icon"> <button><img style="height: 16px;"
                                                src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                        <button><img style="height: 16px;"
                                                src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="card-one">
                            <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group8@2x.png') }}"
                                    alt="">


                                <div class="star-div">
                                    <div class="rate">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div class="card-title-div">
                                    <div class="blue">
                                        <h1>jenny wilson</h1> <img style="height: 20px;"
                                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                    </div>
                                    <h5>Vedic tarot facereading</h5>
                                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                                    <p style="color: red; margin-left: -70px;">FREE</p>
                                    <div class="icon"> <button><img style="height: 16px;"
                                                src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                        <button><img style="height: 16px;"
                                                src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="card-one">
                            <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group16@2x.png') }}"
                                    alt="">


                                <div class="star-div">
                                    <div class="rate">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <div class="card-title-div">
                                    <div class="blue">
                                        <h1>jenny wilson</h1> <img style="height: 20px;"
                                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                    </div>
                                    <h5>Vedic tarot facereading</h5>
                                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                                    <p style="color: red; margin-left: -70px;">FREE</p>
                                    <div class="icon"> <button><img style="height: 16px;"
                                                src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                        <button><img style="height: 16px;"
                                                src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="cards">

                            <div class="card-one">
                                <div class="card-img-sec"> <img
                                        src="{{ asset('public/front_img/mask-group20@2x.png') }}" alt="">


                                    <div class="star-div">
                                        <div class="rate">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                    <div class="card-title-div">
                                        <div class="blue">
                                            <h1>jenny wilson</h1> <img style="height: 20px;"
                                                src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                        </div>
                                        <h5>Vedic tarot facereading</h5>
                                        <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                        <p style="margin-left: -18px;">Exp: 6 Years</p>
                                        <p style="color: red; margin-left: -70px;">FREE</p>
                                        <div class="icon"> <button><img style="height: 16px;"
                                                    src="{{ asset('public/front_img/icon-message.png') }}"
                                                    alt=""></button>
                                            <button><img style="height: 16px;"
                                                    src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-one">
                                <div class="card-img-sec"> <img src="{{ asset('public/front_img/mask-group8@2x.png') }}"
                                        alt="">


                                    <div class="star-div">
                                        <div class="rate">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                    <div class="card-title-div">
                                        <div class="blue">
                                            <h1>jenny wilson</h1> <img style="height: 20px;"
                                                src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                        </div>
                                        <h5>Vedic tarot facereading</h5>
                                        <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                        <p style="margin-left: -18px;">Exp: 6 Years</p>
                                        <p style="color: red; margin-left: -70px;">FREE</p>
                                        <div class="icon"> <button><img style="height: 16px;"
                                                    src="{{ asset('public/front_img/icon-message.png') }}"
                                                    alt=""></button>
                                            <button><img style="height: 16px;"
                                                    src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="card-one">
                                <div class="card-img-sec"> <img
                                        src="{{ asset('public/front_img/mask-group16@2x.png') }}" alt="">


                                    <div class="star-div">
                                        <div class="rate">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                    <div class="card-title-div">
                                        <div class="blue">
                                            <h1>jenny wilson</h1> <img style="height: 20px;"
                                                src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                        </div>
                                        <h5>Vedic tarot facereading</h5>
                                        <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                        <p style="margin-left: -18px;">Exp: 6 Years</p>
                                        <p style="color: red; margin-left: -70px;">FREE</p>
                                        <div class="icon"> <button><img style="height: 16px;"
                                                    src="{{ asset('public/front_img/icon-message.png') }}"
                                                    alt=""></button>
                                            <button><img style="height: 16px;"
                                                    src="{{ asset('public/front_img/call icon.png') }}" alt=""></button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="cards">

                                <div class="card-one">
                                    <div class="card-img-sec"> <img
                                            src="{{ asset('public/front_img/mask-group20@2x.png') }}" alt="">


                                        <div class="star-div">
                                            <div class="rate">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                        <div class="card-title-div">
                                            <div class="blue">
                                                <h1>jenny wilson</h1> <img style="height: 20px;"
                                                    src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                            </div>
                                            <h5>Vedic tarot facereading</h5>
                                            <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                            <p style="margin-left: -18px;">Exp: 6 Years</p>
                                            <p style="color: red; margin-left: -70px;">FREE</p>
                                            <div class="icon"> <button><img style="height: 16px;"
                                                        src="{{ asset('public/front_img/icon-message.png') }}"
                                                        alt=""></button>
                                                <button><img style="height: 16px;"
                                                        src="{{ asset('public/front_img/call icon.png') }}"
                                                        alt=""></button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-one">
                                    <div class="card-img-sec"> <img
                                            src="{{ asset('public/front_img/mask-group8@2x.png') }}" alt="">


                                        <div class="star-div">
                                            <div class="rate">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                        <div class="card-title-div">
                                            <div class="blue">
                                                <h1>jenny wilson</h1> <img style="height: 20px;"
                                                    src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                            </div>
                                            <h5>Vedic tarot facereading</h5>
                                            <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                            <p style="margin-left: -18px;">Exp: 6 Years</p>
                                            <p style="color: red; margin-left: -70px;">FREE</p>
                                            <div class="icon"> <button><img style="height: 16px;"
                                                        src="{{ asset('public/front_img/icon-message.png') }}"
                                                        alt=""></button>
                                                <button><img style="height: 16px;"
                                                        src="{{ asset('public/front_img/call icon.png') }}"
                                                        alt=""></button>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="card-one">
                                    <div class="card-img-sec"> <img
                                            src="{{ asset('public/front_img/mask-group16@2x.png') }}" alt="">


                                        <div class="star-div">
                                            <div class="rate">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                        <div class="card-title-div">
                                            <div class="blue">
                                                <h1>jenny wilson</h1> <img style="height: 20px;"
                                                    src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                            </div>
                                            <h5>Vedic tarot facereading</h5>
                                            <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati</p>
                                            <p style="margin-left: -18px;">Exp: 6 Years</p>
                                            <p style="color: red; margin-left: -70px;">FREE</p>
                                            <div class="icon"> <button><img style="height: 16px;"
                                                        src="{{ asset('public/front_img/icon-message.png') }}"
                                                        alt=""></button>
                                                <button><img style="height: 16px;"
                                                        src="{{ asset('public/front_img/call icon.png') }}"
                                                        alt=""></button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="cards">

                                    <div class="card-one">
                                        <div class="card-img-sec"> <img
                                                src="{{ asset('public/front_img/mask-group20@2x.png') }}" alt="">


                                            <div class="star-div">
                                                <div class="rate">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                            </div>
                                            <div class="card-title-div">
                                                <div class="blue">
                                                    <h1>jenny wilson</h1> <img style="height: 20px;"
                                                        src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                                </div>
                                                <h5>Vedic tarot facereading</h5>
                                                <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati
                                                </p>
                                                <p style="margin-left: -18px;">Exp: 6 Years</p>
                                                <p style="color: red; margin-left: -70px;">FREE</p>
                                                <div class="icon"> <button><img style="height: 16px;"
                                                            src="{{ asset('public/front_img/icon-message.png') }}"
                                                            alt=""></button>
                                                    <button><img style="height: 16px;"
                                                            src="{{ asset('public/front_img/call icon.png') }}"
                                                            alt=""></button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="card-one">
                                        <div class="card-img-sec"> <img
                                                src="{{ asset('public/front_img/mask-group8@2x.png') }}" alt="">


                                            <div class="star-div">
                                                <div class="rate">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                            </div>
                                            <div class="card-title-div">
                                                <div class="blue">
                                                    <h1>jenny wilson</h1> <img style="height: 20px;"
                                                        src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                                </div>
                                                <h5>Vedic tarot facereading</h5>
                                                <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati
                                                </p>
                                                <p style="margin-left: -18px;">Exp: 6 Years</p>
                                                <p style="color: red; margin-left: -70px;">FREE</p>
                                                <div class="icon"> <button><img style="height: 16px;"
                                                            src="{{ asset('public/front_img/icon-message.png') }}"
                                                            alt=""></button>
                                                    <button><img style="height: 16px;"
                                                            src="{{ asset('public/front_img/call icon.png') }}"
                                                            alt=""></button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="card-one">
                                        <div class="card-img-sec"> <img
                                                src="{{ asset('public/front_img/mask-group16@2x.png') }}" alt="">


                                            <div class="star-div">
                                                <div class="rate">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                            </div>
                                            <div class="card-title-div">
                                                <div class="blue">
                                                    <h1>jenny wilson</h1> <img style="height: 20px;"
                                                        src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                                </div>
                                                <h5>Vedic tarot facereading</h5>
                                                <p style="margin-left: 54px; margin-top: 3px;">English, Hindi, Gujarati
                                                </p>
                                                <p style="margin-left: -18px;">Exp: 6 Years</p>
                                                <p style="color: red; margin-left: -70px;">FREE</p>
                                                <div class="icon"> <button><img style="height: 16px;"
                                                            src="{{ asset('public/front_img/icon-message.png') }}"
                                                            alt=""></button>
                                                    <button><img style="height: 16px;"
                                                            src="{{ asset('public/front_img/call icon.png') }}"
                                                            alt=""></button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="cards">

                                        <div class="card-one">
                                            <div class="card-img-sec"> <img
                                                    src="{{ asset('public/front_img/mask-group20@2x.png') }}" alt="">


                                                <div class="star-div">
                                                    <div class="rate">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </div>
                                                <div class="card-title-div">
                                                    <div class="blue">
                                                        <h1>jenny wilson</h1> <img style="height: 20px;"
                                                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                                    </div>
                                                    <h5>Vedic tarot facereading</h5>
                                                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi,
                                                        Gujarati</p>
                                                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                                                    <p style="color: red; margin-left: -70px;">FREE</p>
                                                    <div class="icon"> <button><img style="height: 16px;"
                                                                src="{{ asset('public/front_img/icon-message.png') }}"
                                                                alt=""></button>
                                                        <button><img style="height: 16px;"
                                                                src="{{ asset('public/front_img/call icon.png') }}"
                                                                alt=""></button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-one">
                                            <div class="card-img-sec"> <img
                                                    src="{{ asset('public/front_img/mask-group8@2x.png') }}" alt="">


                                                <div class="star-div">
                                                    <div class="rate">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </div>
                                                <div class="card-title-div">
                                                    <div class="blue">
                                                        <h1>jenny wilson</h1> <img style="height: 20px;"
                                                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                                    </div>
                                                    <h5>Vedic tarot facereading</h5>
                                                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi,
                                                        Gujarati</p>
                                                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                                                    <p style="color: red; margin-left: -70px;">FREE</p>
                                                    <div class="icon"> <button><img style="height: 16px;"
                                                                src="{{ asset('public/front_img/icon-message.png') }}"
                                                                alt=""></button>
                                                        <button><img style="height: 16px;"
                                                                src="{{ asset('public/front_img/call icon.png') }}"
                                                                alt=""></button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="card-one">
                                            <div class="card-img-sec"> <img
                                                    src="{{ asset('public/front_img/mask-group16@2x.png') }}" alt="">


                                                <div class="star-div">
                                                    <div class="rate">
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </div>
                                                <div class="card-title-div">
                                                    <div class="blue">
                                                        <h1>jenny wilson</h1> <img style="height: 20px;"
                                                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                                    </div>
                                                    <h5>Vedic tarot facereading</h5>
                                                    <p style="margin-left: 54px; margin-top: 3px;">English, Hindi,
                                                        Gujarati</p>
                                                    <p style="margin-left: -18px;">Exp: 6 Years</p>
                                                    <p style="color: red; margin-left: -70px;">FREE</p>
                                                    <div class="icon"> <button><img style="height: 16px;"
                                                                src="{{ asset('public/front_img/icon-message.png') }}"
                                                                alt=""></button>
                                                        <button><img style="height: 16px;"
                                                                src="{{ asset('public/front_img/call icon.png') }}"
                                                                alt=""></button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <section class="footers">
                                            <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png') }}"
                                                alt="">
                                            <div class="footer-first-div">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing <br> elit ut
                                                    aliquam, purus sit amet
                                                    luctus venenatis, lectus <br> magna fringilla urna, porttitor
                                                    rhoncus dolor purus <br> non
                                                    enim praesent elem</p>
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
<script>
$(document).ready(function() {
    $("#home").click(function() {
        alert('ok')
    });
});
</script>

</html>