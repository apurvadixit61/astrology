
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- ================= Favicon ================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Standard -->
    <link rel="shortcut icon" href="{{ URL::to('images_old/logos.png')}}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" integrity="sha512-MpdEaY2YQ3EokN6lCD6bnWMl5Gwk7RjBbpKLovlrH6X+DRokrPRAF3zQJl1hZUiLXfo2e9MrOt+udOnHCAmi5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.1/themes/alertify.bootstrap.css" integrity="sha512-dxR2t7BUvgKKoKMKWOJMyjaYdEpZo2QBjGseyH9P+ISmrBC8PEVzyB8+E7PY/6OjoFa086ngbx2OLMdmVAZdGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="css_old/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css_old/lib/themify-icons.css" rel="stylesheet">
    <link href="css_old/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css_old/lib/unix.css" rel="stylesheet">
    <link href="css_old/style.css" rel="stylesheet">
    <style type="text/css">
        .content-top-agile {
    text-align: center;
    position: relative;
    background: #0052cc;
    color: #fff;
    width: 90%;
    margin: -50px auto 0;
    border-radius: 10px;
    padding: 20px !important;
}
 .content-top-agile h2 {
    margin: 0 0 6px;
    color: #fff !important;
    font-size: 22px;
    font-weight: 500;
}.content-top-agile p {
    font-size: 14px;
    color: #fff;
    margin: 0;
        margin-bottom: 0px;
}
.login-form .btn{ margin: auto !important; width: 100px; }
    </style>
}
</head>

<body class="unix-login" style="">

    <div class="">
        <div class="container" style="height: 100%">
            <div class="row">
              
                
                <div class="col-lg-4 col-lg-offset-4" style="width: 40%;height:20%;margin-left: 34%;">
                    <div class="login-content" style="border: 1px solid darkgray !important">
                        <div class="login-logo">
                            
                           
<!--                         <img src="{{ URL::to('images_old/19221.jpg')}}">   
-->            
                        <div class="content-top-agile p-20 pb-0" style="background-color:#FD7235 !important;">
                                <h2 class="text-primary">Let's Get Started</h2>
                                <p class="mb-0">Sign in to continue to ASTRO Login.</p>                          
                            </div>
</div>

                       
                        <div>
                        <a href="{{ route('login') }}"></a>
                             @if (Session::has('message'))
                             <script>
                               alertify.success(' Successfull Logged out');

                             </script>
                               <!-- <div class="alert alert-success">{{ Session::get('message') }}</div>-->
                                @endif
                        </div>    
                        
                        <div class="login-form">
                            <!--<h4>Administratior Login</h4>-->
                             <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                              {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend"><i class="fa fa-user" style="color:#FD7235 !important;"></i></div>
                                     <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                     </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                     <div class="input-group mb-3">
                                    <div class="input-group-prepend"><i class="fa fa-lock" style="color:#FD7235 !important;"></i></div>
                                     <input id="password" minlength="6" type="password" placeholder="password" class="form-control" name="password" required>
                                 </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                            <!-- <div class="checkbox">
                                    <label>
                                       <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>  -->
                            <!--    <div class="material-switch ">
                                    <input iremember id="someSwitchOptionPrimary" name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox"/>
                                    <label for="someSwitchOptionPrimary" class="label-primary"> </label>Remember Me
                                </div>

                                     <div class="checkbox">
                                    <label class="pull-right">
                                        <a href="{{ route('password.request') }}">Forgotten Password?</a>
                                    </label>

                                </div> -->
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" style="background-color:#FD7235 !important; border-color:orange !important">Sign in</button>
                             <!--    <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div> -->
                               <!-- <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{url('/')}}/js_old/lib/jquery.min.js" ></script>
 <script src="{{ URL::to('js_old/lib/bootstrap.min.js')}}"></script>
</body>

</html>

