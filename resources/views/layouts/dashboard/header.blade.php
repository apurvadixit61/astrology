<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('public/astrology_assets/dashboard/images/favicon.png') }}" rel="icon">
    <!--  CSS Files -->
    <link href="{{ asset('public/astrology_assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <!-- Template Main CSS File -->
    <link href="{{ asset('public/astrology_assets/dashboard/css/style.css')}}" rel="stylesheet" />
    <title>Welcome to Our Astrologer</title>
</head>

<body>

    <body id="body-pd" class="body-pd">
        <header class="header body-pd" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="searchPanel"><input type="search" placeholder="Search"></div>
            <div class="btn-group ms-auto">
                <button class="dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown"
                    data-bs-auto-close="true" aria-expanded="false">
                    <img <?php  if(Auth::guard('users')->user()->profile_image != NULL){?> src="{{url('/')}}/images/profile_image{{Auth::guard('users')->user()->profile_image}}" <?php }else{?> src="{{ asset('public/astrology_assets/images/user.jpg')}}"<?php } ?> alt=""> {{Auth::guard('users')->user()->name}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="{{url('user/recharge')}}">Recharge</a></li>
                    <li><a class="dropdown-item" href="{{url('/user/logout')}}">Logout</a></li>
                </ul>
            </div>

        </header>
        <div class="l-navbar show" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="{{url('/')}}" class="nav_logo"> <img
                            src="{{ asset('public/astrology_assets/dashboard/images/logo.png') }}"></a>
                    <div class="nav_list"> <a href="{{url('/user/dashboard')}}" class="nav_link {{ request()->is('user/dashboard') ? 'active' : ''}}"> <i class="fas fa-th-large nav_icon"></i>
                            <span class="nav_name">Dashboard</span> </a> <a href="{{url('/user/orders')}}" class="nav_link {{ request()->is('user/orders') ? 'active' : ''}}"><i
                                class="fas fa-money-check nav_icon"></i><span class="nav_name">History</span> </a> <a
                            href="{{url('/user/wallets')}}" class="nav_link {{ request()->is('user/wallets') ? 'active' : ''}}"> <i class="fas fa-wallet nav_icon"></i> <span
                                class="nav_name">Wallet</span> </a> </div>
                </div>
                <a href="{{url('/user/logout')}}" class="nav_link" id="logoutBtn"> <i class="fas fa-sign-out-alt nav_icon"></i> <span
                        class="nav_name">Logout</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        
      