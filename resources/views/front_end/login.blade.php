<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('public/front_end/css/login.css?v=').time()  }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    .loginPage{ background: url(https://collabdoor.com/public/astrology_assets/images/bg1.png);}
.loginPage nav{background: #fff}
.content{background: #fff}

  </style>
</head>

<body class="loginPage">
  <nav>

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
    <button style="height: 55px;  width: 170px;">Contact Us</button>
  </nav>

  <section class=" new-kundli-matching">
    <img class="background-img" src="{{ asset('public/front_img/background-imgg.png') }}" height="570" alt="">
    <div class=" loginForm">

    <form action="{{route('doLogin')}}" method="post">
        @csrf
      <div class="content">
      
        <div class="login-input">
          <h2>Sign In</h2>
          <h5>Welcome Back</h5>

          @if (\Session::has('error'))
          <div class="alert alert-danger">
            {!! \Session::get('error') !!}
          </div>
        @endif

        
        @if (\Session::has('success'))
          <div class="alert alert-success">
            {!! \Session::get('success') !!}
          </div>
        @endif

          <h6>Phone</h6>
          <input placeholder="Phone" required  value="{{ old('email') }}" name="email" type="text">
          <h6>Password</h6>
          <input placeholder="Password" required  name="password" type="password">



        </div>
        <button type="submit" class="Sing-up-btn">Sign In</button>
        </form>
        <!-- <div class="btn-div">
          <button class="FA-FACBOOK"><a href="#" class="fa fa-facebook"></a></button> <button class="FA-TWITTER"><a
              href="#" class="fa fa-twitter"></a></button> <button class="FA-GOOGLE"><a href="#"
              class="fa fa-google"></a></button>
        </div> -->

        <p style="margin-top: 20px;">Dont't have an account? <a href="{{url('/signup')}}">SIgn Up</a></p>

      </div>
  </section>
  <script src="{{ asset('public/front_end/js/login.js') }}"></script>
</body>

</html>