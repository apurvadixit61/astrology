<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrology</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('public/front_end/css/main.css?v=').time() }}">
    <link rel="stylesheet" href="{{ asset('public/front_end/css/main_responsive.css?v=').time() }}">
    <link rel="stylesheet" href="{{ asset('public/front_end/css/main_popup.css?v=').time() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <nav>

        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png') }}" alt="">
        <div>

            <ul>
                <li style="color: black;"> <a href="{{ url('/')}}"> <b
                            style="color:#fe870a !important;border-bottom: 2px solid #fe870a;">Home</b> </a></li>
                <li><a href="{{ url('/all')}}"> Our Astrologer </a> </li>
                <li><a href="{{ url('/services')}}"> Services </a></li>
                <li><a href="{{ url('/kundli')}}"> Kundli </a></li>
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

    <section class="Home-sec">

        <div class="first-sec">
            <div class="heading">
                <h2>Services For You </h2>
                <h1> Company Name </h1>
            </div>
            <div class="paregraph">
                <p>Consectetur adipiscin g elit, sed do eiusmod tempor incididuesdeentiut <br> labore etesde dolore
                    magna
                    aliquapspendisse and the gravida.</p>
            </div>
            <div class="glas-div-first">
                <div class="one">
                    <div class="img-one-div">
                        <img style=" height: 73px; margin-left: 30px; margin-top: 30px;"
                            src="{{ asset('public/front_img/88.png') }}" alt="">
                        <div class="one-div-glas">
                            <p> <a class="text-light" href="{{url('chat-with-astrologer')}}">Chat with Astrologer</a>
                            </p>
                        </div>

                    </div>
                    <div class="two">
                        <img src="{{ asset('public/front_img/fist-div-image/group-1.png') }}" alt="">
                        <p> <a class="text-light" href="{{url('call-with-astrologer')}}">Talk to Astrologer</a></p>
                    </div>

                    <div class="three">
                        <img src="{{ asset('public/front_img/fist-div-image/group-6029@2x.png') }}" alt="">
                        <p><a href="" class="text-light">Astrologer Blog</a> </p>
                    </div>
                    <p>
                </div>
            </div>
        </div>
        <div class="second-sec">
            <div class="second-glass-div">
                <div class="heading-seconde-sec">
                    <h1>Free Kundli</h1>
                    <p style="margin-top: 6px;">At vero eos et accusamus et iusto odio dignissimos.</p>
                </div>
                <form action="{{ route('getKundli')}}" method="post">
                    @csrf
                    <div class="input-div">
                        <input type="text" name="full_name" required placeholder="Fulll Name">
                        <input type="text" required name="birth_date" value="" onfocus="(this.type = 'date')"
                            placeholder="Date of Birth">
                        <input type="text" required name="birth_time" onfocus="(this.type = 'time')"
                            placeholder="Time of Birth">
                        <input type="text" required name="birth_place" placeholder="Place of Birth"
                            id="front-search-field">
                        <button type="submit">
                            FIND KUNDLI</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- <button onclick="startFCM()"
                    class="btn btn-danger btn-flat">Allow notification
                </button> -->
    <?php $id=0; if(Auth::guard('users')->check()==true ) { $id=Auth::guard('users')->user()->id;  } ?>
    <div class="div-img">
        <section>
            <div class="Services-heading Our-astro">
                <h1>Our Astrologer</h1>
                <img src="{{ asset('public/front_img/1-2-1 1.png') }}" height="15" alt="">
                <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered
                    alteration
                    in some form, by injected hummer.</p> <a href="{{ url('/all')}}"><button>
                        <img src="{{ asset('public/front_img/Vector (1)btn.png') }}" alt=""></button></a>

            </div>
            <div class="astro-blog-div">
                @foreach($users->chunk(3) as $key=>$chunk)

                <div class="cards">

                    @foreach($chunk as $key=>$user)

                    <div class="card-one">
                        <div class="card-img-sec"> <img style="width:130px;" @if($user->profile_image!='' ||
                            $user->profile_image != NULL)
                            src="{{url('/')}}/images/profile_image{{$user->profile_image}}" @else
                            src="{{ asset('public/front_img/elem.png') }}" alt="{{$user->name}}" @endif alt="">

                            <div class="star-div ">
                                <div class="rate">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    4.5
                                </div>
                            </div>

                            <div class="card-title-div">
                                <a href="{{route('ashtro.profile', $user->id)}}">
                                    <div class="blue">
                                        <div @if($user->user_status=='Online') class="user_status_online" @else
                                            class="user_status_offline" @endif></div>
                                        <h3>{{$user->name}}</h3> <img style="height: 20px;"
                                            src="{{ asset('public/front_img/blue tick.png') }}" alt="">
                                    </div>
                                    <div style="margin-left:60%;margin-top:10px;">

                                        <p> @if($user->user_expertise == '')--@else{{$user->user_expertise}}@endif</p>
                                        <p> @if($user->user_language == '')--@else{{$user->user_language}}@endif</p>
                                        <p>Exp: {{$user->user_experience}} @if($user->user_experience != '')Years @endif
                                        </p>
                                        <p class="mt-1">@if($user->per_minute == NULL || $user->per_minute==0)<b> <span
                                                    style="color: red;">FREE</span> </b> @else <span
                                                style="color: #FE8302;">
                                                &#x20b9; {{$user->per_minute}} /min </span> @endif</p>
                                    </div>



                                </a>
                                <div class="icon"> <button><img style="height: 16px;"
                                            src="{{ asset('public/front_img/icon-message.png') }}" alt=""></button>
                                    <button onclick="send_request(this,{{$id}},{{$user->id }})"><img
                                            style="height: 16px;" src="{{ asset('public/front_img/call icon.png') }}"
                                            alt=""></button>
                                </div>

                            </div>
                        </div>


                    </div>

                    @endforeach
                </div>

                @endforeach
            </div>

            <!-- <button onclick="approve_request()">Approve</button> -->

        </section>
        <section class="Service">

            <div class="Services-heading">

                <h1 style="margin-left:420px">Services For You</h1>
                <img style="margin-left: 41%;" height="16" src="{{ asset('public/front_img/1-2-1 1.png') }}" alt="">
                <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered
                    alteration
                    in some form, by injected hummer.</p>

            </div>
            <div class="Services">
                <div class="first-serv">

                    <div class="serv-one">


                        <span> <img src="{{ asset('public/front_img/Mask group (3).png') }}" alt="">
                            <h5>Today's Horoscope</h5>
                            <p></p>

                        </span>
                        <p>
                        <p> Get free Aries daily horoscope prediction today online from the best astrologer. Read your
                            Aries
                            Zodiac Sign horoscope today! </p>
                        </p>
                        <a href="{{url('horoscope')}}" class="  mt-5   "> READ MORE</a>

                    </div>
                    <div class="serv-one">
                        <span> <img src="{{ asset('public/front_img/hindi-kundli-img 1.png') }}" alt="" style="
              margin-left: 64px;
          ">
                            <h5>Free Kundli</h5>

                        </span>
                        <p>Generate your kundli report from ---. Our Kundli software can help you predict
                            the future for yourself by reading the birth chart.</p>
                        <a href="{{url('kundli')}}" class="  mt-5   "> TRY NOW</a>

                    </div>
                    <div class="serv-one">
                        <span> <img src="{{ asset('public/front_img/11.png') }}" alt="">
                            <h5>Kundli Matching</h5>


                            <p>Love could be confusing, but only until you haven’t found how compatible you two are for
                                each other.</p>
                            <a href="{{url('kundli')}}" class="  mt-5   "> TRY NOW</a>
                    </div>
                    <div class="serv-one">
                        <img src="{{ asset('public/front_img/88.png') }}" alt="">
                        <h5>Talk to Astrologer</h5>


                        <p>There are many variations of
                            passages of Lorem Ipsum <br>
                            available</p>
                        <a href="#" class="  mt-5   "> TRY NOW</a>

                    </div>
                </div>

        </section>
        <section class="about-res">

            <div class="heaading-about-sec">
                <h1>I Will Read Your Palm And Tell <br> You About Your Future</h1>
                <span style="display: flex;">
                    <div
                        style=" margin-right: 40px; margin-top:40px; background-color: #FE8302; border: none; height: 110px; width: 4.76px; ">
                    </div>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words. Sed ut perspiciatis unde omnis
                        iste
                        natus error sit voluptatem accusantium doloremque laudantium.</p>
                </span>
                <span style="display: flex; margin-top: 45px;">
                    <div class="logo" style="display: flex; align-items: center; justify-content: center;"><img
                            src="{{ asset('public/front_img/Vector.png') }}" alt=""></div>
                    <p style="margin-top: -0px; margin-left: 30px;">15 Years Of Experience With</p>
                </span>
                <h3>Palm & Horoscope</h1>
                    <button
                        style="margin-top: 35px; width: 170px; height: 55px; color: white; background-color:   #FE870A; border: none;  ">READ
                        MORE</button>
            </div>
        </section>
    </div>
    <section class="about">
        <div class="image-about-sec">
            <button>
                <div class="btn-style"><img src="{{ asset('public/front_img/Polygon 1.png') }}" height="22" alt="">
                </div>
            </button>
        </div>
        <div class="heaading-about-sec">
            <h1>I Will Read Your Palm And Tell <br> You About Your Future</h1>
            <span style="display: flex;">
                <div
                    style=" margin-right: 40px; margin-top:40px; background-color: #FE8302; border: none; height: 110px; width: 4.76px; ">
                </div>
                <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered
                    alteration in some form, by injected humour, or <br> randomised words. Sed ut perspiciatis unde
                    omnis iste
                    natus error sit <br> voluptatem accusantium doloremque laudantium.</p>
            </span>
            <span style="display: flex; margin-top: 45px;">
                <div class="logo" style="display: flex; align-items: center; justify-content: center;"><img
                        src="{{ asset('public/front_img/Vector.png') }}" alt=""></div>
                <p style="margin-top: -0px; margin-left: 30px;">15 Years Of Experience With</p>
            </span>
            <h3>Palm & Horoscope</h3>
            <button
                style="margin-top: 35px; width: 170px; height: 55px; color: white; background-color:   #FE870A; border: none;  ">READ
                MORE</button>
        </div>
    </section>
    </div>
    <div class="div-img">
        <section class="explore-rashi">
            <div class="explore-h1-heading">
                <h1>Explore Rashi</h1>
                <img src="{{ asset('public/front_img/1-2-1 1.png') }}" alt="">
                <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered
                    alteration
                    in some form, by injected hummer.</p>
            </div>
            <div class="rashi-box">
            <div class="first-box">
                <div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//1.png') }}" alt=""></div>
                    <h1>Aries</h1>
                    <p>Mar 21- Apr 19</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//2.png') }}" alt=""></div>
                    <h1>Taurus</h1>
                    <p>Apr 20- May 20</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//3.png') }}" alt=""></div>
                    <h1>Gemini</h1>
                    <p>May 21- June 20</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"><img src="{{ asset('public/front_img//4.png') }}" alt=""></div>
                    <h1>Cancer</h1>
                    <p>June 21- July 22</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//5.png') }}" alt=""></div>
                    <h1>Leo</h1>
                    <p>July 22- Aug 22</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"><img src="{{ asset('public/front_img//6.png') }}" alt=""></div>
                    <h1>Virgo</h1>
                    <p>Aug 23- Sep 22</p>
                </div>


            </div>
                <div class="first-box">
                <div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//7.png') }}" alt=""></div>
                    <h1>Libra</h1>
                    <p>Sep 23- Oct 22</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//8.png') }}" alt=""></div>
                    <h1>Scorpio</h1>
                    <p>Oct 23- Nov 21</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//9.png') }}" alt=""></div>
                    <h1>Sagittarius</h1>
                    <p>Nov 22- Dec 21</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"><img src="{{ asset('public/front_img//10.png') }}" alt=""></div>
                    <h1>Capricorn</h1>
                    <p>Dec 22- Jan 19</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"> <img src="{{ asset('public/front_img//32.png') }}" alt=""></div>
                    <h1>Aquarius</h1>
                    <p>Jan 20- Feb 18</p>
                </div>
                <div class="box-one">
                    <div class="box-one-div"><img src="{{ asset('public/front_img//33.png') }}" alt=""></div>
                    <h1>Pisces</h1>
                    <p>Feb 19- Mar 20</p>
                </div>


            </div>
        </section>
                 <!-- <form action="{{ route('send.web-notification') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Message Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Message Body</label>
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                    </form> -->

        <section class="Client-sec">
            <div class="container" style="  flex-wrap: wrap;">
                <div class="Services-heading">

                    <h1>What Clients Says</h1>
                    <img style="margin-left: 38%;" height="16" src="{{ asset('public/front_img/1-2-1 1.png') }}" alt="">
                    <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have
                        suffered
                        alteration
                        in some form, by injected hummer.</p>

                </div>
                <div class="Client-sec-second">
                    <button><img src="{{ asset('public/front_img/Vector (1).png') }}" alt=""></button>
                    <div class="client-div-first">
                        <p style="margin-left: 10px;">
                            It is a long established fact that a reader will be
                            dist<br>racted by the readable content of page when looking
                            <br>at its layout The point of using Lorem Ipsum is that it
                        </p>
                        <div style="display: flex; margin-top: 220px; margin-left: 170px;">
                            <div class="testmsecond">

                                <div class="client-img-div"></div>
                                <div class="star-div-client">
                                    <div class="rate">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                                <h3>Randy Stanton</h3>
                                <h4>Astrologer</h4>


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
                    <button class="client-btn-second" style="background-color: #FE8302;"><img
                            src="{{ asset('public/front_img/Vector (1)btn.png') }}" alt=""></button>
                </div>
        </section>
        <!-- Trigger the modal with a button -->

        <section class="blog-containe">
            <div class="blog-heading">
                <div class="our-astro-heading">
                    <h1>Our Blog</h1>
                    <img src="{{ asset('public/front_img/1-2-1 1.png') }}" style="margin-top: 15px; height: 15px;"
                        alt="">
                    <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have
                        suffered
                        alteration
                        in some form, by injected hummer.</p> <a href="{{url('/blog')}}"><button><img
                                src="{{ asset('public/front_img/Vector (1)btn.png') }}" alt=""></button></a>
                </div>
            </div>
            <div class="card-blog-con">
                <div class="card-blog" style="width: 17rem; border-radius: 20px;">
                    <img src="{{ asset('public/front_img/image@2x.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">A Detailed Guide to Your 2023

                            2024 Horoscope</h5>
                        <p class="card-text"> Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="#" class="  mt-5   "> READ MORE</a>
                    </div>
                </div>
                <div class="card-blog" style="width: 17rem; border-radius: 20px;">
                    <img src="{{ asset('public/front_img/image1@2x.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Two House Systems in One Horoscope</h5>
                        <p class="card-text"> Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="#" class="  mt-5   ">READ MORE</a>
                    </div>
                </div>
                <div class="card-blog" style="width: 17rem; border-radius: 20px;">
                    <img src="{{ asset('public/front_img/image2@2x.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">A Detailed Guide to Your 2023

                            2024 Horoscope</h5>
                        <p class="card-text"> Some quick example text to build on the card title and make up the bulk of
                            the card'.
                        </p>
                        <a href="#" class="  mt-5   "> READ MORE</a>
                    </div>
                </div>
                <div class="card-blog" style="width: 17rem; border-radius: 20px;">
                    <img src="{{ asset('public/front_img/image3@2x0.png') }}"
                        style="border-top-left-radius: 13PX; border-top-right-radius: 12PX;" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">A Detailed Guide to Your 2023

                            2024 Horoscope</h5>
                        <p class="card-text"> Some quick example text to build on the card title and make up the bulk of
                            the card's
                        </p>
                        <a href="#" class="  mt-5    "> READ MORE</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="free-kundli-input">

            <div class="free-kundli-heading">
                <h1>Free Kundli Online</h1>
                <img src="{{ asset('public/front_img/1-2-1 1.png') }}" alt="">
                <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered
                    alteration
                    in
                    some form, by injected hummer.</p>
            </div>
            <form action="{{ route('getKundli')}}" method="post">
                @csrf
                <div class="input" style="width:107%;">
                    <h1>Full Name</h1>
                    <input type="text" required placeholder="Enter Name" name="full_name">
                    <h2>Birth of Date</h2>
                    <input type="text" required onfocus="(this.type = 'date')" name="birth_date"
                        placeholder="Select Birth Date">
                    <h3>Birth of Time</h3>
                    <input type="text" required onfocus="(this.type = 'time')" name="birth_time"
                        placeholder="Select Birth Time">
                    <h4>Birth of Place</h4>
                    <input type="text" required name="birth_place" id="front-last-field"
                        placeholder="Select Birth Place">
                    <button type="submit">FIND KUNDLI</button>
                </div>
            </form>
        </section>
        <section class="free-kundli-res">

        </section>
    </div>

    <section class="footers">
        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png') }}" alt="">
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

 <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-messaging.js"></script>
    <script>
var base_url = location.protocol+'//'+location.host

console.log(base_url)
    const firebaseConfig = {
        apiKey: "AIzaSyC5UhODBBmx_CO43480AoBxcLEWQtf_dss",
        authDomain: "astrologyfcm.firebaseapp.com",
        projectId: "astrologyfcm",
        storageBucket: "astrologyfcm.appspot.com",
        messagingSenderId: "5304372207",
        appId: "1:5304372207:web:c97e81ba86bc06b386441a",
        measurementId: "G-W3L7RJS9TM"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    startFCM()
    function startFCM() {
        messaging.requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: base_url+'/user/store-token',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        // alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error);
                        console.log(error)
                    },
                });
            }).catch(function (error) {
                alert(error);
                console.log(error)

            });
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script></script>
    <script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
    </script>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript"
    src='https://maps.google.com/maps/api/js?key=AIzaSyDUJQc9RLnJreksMp5OOXTOtsIX7G4bZw8&libraries=places'></script>

<script>

var base_url = location.protocol+'//'+location.host

$(document).on('keyup', '#front-search-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-search-field"));
});

$(document).on('keyup', '#front-last-field', function() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("front-last-field"));
});
<?php
   if(Auth::guard('users')->check() == true){
    $loginId = auth()->guard("users")->user()->id;
    ?>


var intervalId = window.setInterval(function() {
    get_notification_count()
}, 5000);

function get_notification_count(){

    var url = base_url+'/user/get_notification_count/'+{{$loginId}}
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
         console.log(result)
         $('#count').append('')
         $('#count').append(result)

         
         var count = document.querySelector("#count");

         count.innerHTML =result

        }
    });

}
function send_request(element, from_user_id, to_user_id) {
    console.log(from_user_id)
    console.log(to_user_id)

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
                alert(result.message)
            } else {
                 location.href = base_url+'/confirm-request/'+ to_user_id;
               
            }

        }
    });

}


function approve_request() {


    var url = base_url+'/user/approve_request'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'POST',
        data: '',
        dataType: 'json',
        success: function(result) {
            console.log(result)
            location.href = url+'/user/chat/' + result;

        }
    });

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

</html>