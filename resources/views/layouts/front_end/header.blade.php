<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astrology</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front_end/css/main_responsive.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('public/front_end/css/our_astro.css') }}"> -->
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
    <a href="{{url('/')}}"><img src="{{ asset('public/front_img/Logo-removebg-preview 1.png') }}" alt=""></a>
    <div>

      <ul>
        <li style="color: black;"> Home</li>
        <li> Our Astrologer </li>
        <li>Services</li>
        <li> Horoscope </li>
        <li> Blog </li>

      </ul>
    </div>

    <button> CONTACT US </button>
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
      <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
      <a href="#" class="w3-bar-item w3-button">Link 1</a>
      <a href="#" class="w3-bar-item w3-button">Link 2</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>
  </nav>