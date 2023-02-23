<html>
    <title>Astrology</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .fs-10{
    font-size: 20px;
    font-weight:600;
    line-height: 22px;
    margin-left: 40px;
    margin-top:1.5rem;
    }

    .link_active{
    color: #fe870a !important;
    border-bottom: 2px solid #fe870a;
    }

.first-div{
    height: 200px;
    background-image: url(http://collabdoor.com/public/front_img/page-title.png);
    background-size: contain;
    position: relative;
    width: 100%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.banner_heading{
    font-style: normal;
    font-weight: 600;
    font-size: 50px;
}  
.banner_button
{
    width: 258px;
    height: 45px;
    background: rgba(255, 255, 255, 0.235);
    border-radius: 100px;
    border: none;
    margin-top: 0px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}  
.banner_para{
    font-weight: bold;
    color: #fe870a;
    font-size: 18px;
}

.kundli_buttton
{
    /* margin: 10px;
    /* padding: 20px; */
    border-radius: 30px;
    color: #ffffff;
    font-family: "Lato" sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 29px;
    text-transform: capitalize;
    border: none;
    color: #fe870a;
    border: 2px solid #fe870a;
    background-color: #fff; 

}
.is_active{
    background: #fe870a;
    color: #ffffff;

}

.dropbtn {
  background-color: #fff;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdowns {
  position: relative;
  display: inline-block;
}

.dropdowns-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdowns-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdowns-content a:hover {background-color: #f1f1f1}

.dropdowns:hover .dropdowns-content {
  display: block;
}

.dropdowns:hover .dropbtn {
  background-color: #fe870a;
}
.kundli_div{
    background-color: #fff0e0;
    margin: 20px;
    padding: 4rem;
    border-radius:30px;
}
.login-btn{
    background-color:#fe870a;
    border:none;

}
footer{
    background-color: #000;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
    line-height: 3rem;
}
footer a{
    color: #fff;
}
</style>

<nav class="navbar navbar-light navbar-expand-sm">
        <a href="{{ url('/')}}" class="navbar-brand">
            <img src="http://collabdoor.com/public/front_img/Logo-removebg-preview 1.png " alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-3 px-5">
                <li class="nav-item">
                    <a href="{{ url('/')}}" class="nav-link text-dark fs-10">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/all')}}" class="nav-link text-dark fs-10 {{ request()->is('all') ? 'link_active' : ''}}">
                        Our Astrologer
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/services')}}" class="nav-link text-dark fs-10 {{ request()->is('services') ? 'link_active' : ''}} ">
                        Services
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/kundli')}}" class="nav-link text-dark fs-10 {{ request()->is('kundli') ? 'link_active' : ''}}">
                        Kundli
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/horoscope')}}" class="nav-link text-dark fs-10 {{ request()->is('horoscope') ? 'link_active' : ''}} ">
                        Horoscope
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/blog')}}" class="nav-link text-dark fs-10 {{ request()->is('blog') ? 'link_active' : ''}}">
                        Blog
                    </a>
                </li>

                
                <?php  if(Auth::guard('users')->check() == true){ $id=Auth::guard('users')->user()->id;?>

                <li>
                <div class="dropdowns" style="margin-left:80px;float:right;">
                <button class="dropbtn"><img  class="rounded" style="width:50px;height:50px;"; src="{{asset('images/user.jpg')}}" alt=""><span style="margin-left:5px;font-weight:600;">{{Auth::guard('users')->user()->name}}</span> </button>
                <div class="dropdowns-content">
                <a href="{{url('/user/notification')}}/{{Auth::guard('users')->user()->id}}">Notification</a>
                <a href="{{url('/user/wallets')}}">Wallet</a>
                <a href="{{url('/user/orders')}}">Order History</a>
                <a href="{{url('user/logout')}}">Logout</a>
                </div>
              </div>
                </li>

                <?php } else{ ?>
               <li><a href="{{url('/signin')}}" style="margin-left:100px;float:right;"> <button class="btn-lg mt-3 text-light login-btn">Sign In</button> </a></li>
                   <?php } ?>     

            </ul>

            
              
        </div>

        
  </nav>
