<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('public/astrology_assets/images/favicon.png')}}" rel="icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--  CSS Files -->
    <link href="{{ asset('public/astrology_assets/css/bootstrap.min.css?v=').time()}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/astrology_assets/css/owl.carousel.min.css?v=').time()}}">
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>  <!-- Template Main CSS File -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
     <link href="{{ asset('public/astrology_assets/css/style.css?v=').time()}}" rel="stylesheet" />
    <title>Welcome to Our Astrologer</title>
</head>

<body>
    <div class="top_section home ">
        <div class="container">
        <nav class="navbar navbar-expand-lg" id="navbar_top">
            
                <a href="{{url('/')}}" class="logo"><img src="{{ asset('public/astrology_assets/images/logo.png')}}"
                        alt="" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : ''}}{{ request()->is('user/notification') ? 'active' : ''}} {{ request()->is('user/recharge') ? 'active' : ''}} " aria-current="page" href="{{ url('/')}}">Home</a> </li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('all') ? 'active' : ''}} {{ request()->is('profile/*') ? 'active' : ''}}" href="{{ url('/all')}}">Our Astrologer</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('kundli') ? 'active' : ''}}" href="{{ url('/kundli')}}">Kundli</a></li>
                  
                        <li class="nav-item"><a class="nav-link  {{ request()->is('services') ? 'active' : ''}} " href="{{ url('/services')}}">Services</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('horoscope') ? 'active' : ''}}" href="{{ url('/horoscope')}}">Horoscope</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('blog') ? 'active' : ''}}" href="{{ url('/blog')}}">Blog</a></li>
                        <?php  if(Auth::guard('users')->check() == true){ $id=Auth::guard('users')->user()->id;?>

                            <li class="nav-item dropdown userDropDown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img <?php  if(Auth::guard('users')->user()->profile_image != NULL){?> src="{{url('/')}}/images/profile_image{{Auth::guard('users')->user()->profile_image}}" <?php }else{?> src="{{ asset('public/astrology_assets/images/user.jpg')}}"<?php } ?>width="50px"> {{Auth::guard('users')->user()->name}}
                            </a>
                            <span id="count"></span>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="{{url('/user/notification')}}">Notification</a></li>
                                <li><a class="dropdown-item" href="{{url('/user/wallets')}}">Wallet</a></li>
                                <li><a class="dropdown-item" href="{{url('/user/orders')}}">Order History</a></li>
                                <li><a class="dropdown-item" href="{{url('user/logout')}}">Logout</a></li>
                            </ul>
                        </li>
                        <?php } else{ ?>

                            <li class="nav-item "><a class="nav-link btn  btn-primary" href="{{url('/signin')}}">Sign In</a></li>

                     <?php } ?>      


                    </ul>
                </div>
            
        </nav></div>
    </div>