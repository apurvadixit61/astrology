<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horoscope</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/horoscope_style.css?v=').time() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <nav>

        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png')}} " alt="">
        <div>

            <ul>
                <li style="font-family: 'Lato', sans-serif;"> <a href="{{ url('/')}}"> Home </a> </li>
                <li><a href="{{ url('/all')}}"> Our Astrologer </a> </li>
                <li><a href="{{ url('/services')}}"> Services</a></li>
                <li><a href="{{ url('/kundli')}}"> Kundli </a></li>
                <li><a href="{{ url('/horoscope')}}"><b
                            style="color:#fe870a !important;border-bottom: 2px solid #fe870a;"> Horoscope </b></a> </li>
                <li><a href="{{ url('/blog')}}"> Blog </a> </li>
            </ul>
        </div>

        <?php  if(Auth::guard('users')->check() == true){ $id=Auth::guard('users')->user()->id;?>
        {{Auth::guard('users')->user()->name}} <a href='{{url("/user/notification/$id")}}'><i class="fa fa-bell fa-x"
                aria-hidden="true"></i><span id="count" style="margin-top:1rem;"></span></a>
        <?php } else{ ?>
        <a class="login-btn text-light" href="{{url('/signin')}}">Sing In</a>
        <?php } ?>

    </nav>
    <div class="first-sec">

        <h1>Horoscope</h1>

        <button>
            <p>Home</p> <img src="{{ asset('public/front_img//Vector (1)btn.png') }}" class="" height="20" alt="">
            <h6>Horoscope</h6>
        </button>

    </div>
    <section class=" new-kundli">
        <div class="daily-horoscope">
            <div class="heading-btn">
                <h1>Daily horoscope</h1>
            </div>
            <div class="btn-sec">
                <button class="btn-first"><img src="{{ asset('public/front_img/icon.png') }}" alt="">
                    Daliy</button>
                <button class="btn-second"><img src="{{ asset('public/front_img/icon-c.png') }}" alt="">
                    Tomorrow</button>
                <button class="btn-third"><img src="{{ asset('public/front_img/icon-c.png') }}" alt=""> This
                    Week</button>
                <button class="btn-fourth"><img src="{{ asset('public/front_img/icon-c.png') }}" alt=""> This
                    Month</button>
                <button class="btn-fifth"><img src="{{ asset('public/front_img/icon-c.png') }}" alt="">
                    2023</button>
            </div>
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

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('public/front_img//1.png') }}" class="rounded-circle" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Aries</h5>
                                        <div id="aries">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" >Taurus</h5>
                                        <div id="taurus">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" >Gemini</h5>
                                        <div id="gemini">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" >Cancer</h5>
                                        <div id="cancer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" >Leo</h5>
                                        <div id="leo"></div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" >Virgo</h5>
                                     <div id="virgo"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" >Libra</h5>
                                      <div id="libra"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" >Scorpio</h5>
                                      <div id="scorpio"></div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Sagittarius</h5>
                                        <div id="sagittarius"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" id="">Capricorn</h5>
                                        <div id="capricorn"></div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" >Aquarius</h5>
                                       <div id="aquarius"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Pisces</h5>
                                      <div id="pisces"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

    </section>
    <section class="footers">
        <img src="{{ asset('public/front_img//Logo-removebg-preview 1.png') }}" alt="">
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
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
var base_url = location.protocol + '//' + location.host

get_horoscrope()
var maxLength = 100;

function get_horoscrope() {

    var data = ['aries', 'taurus', 'gemini', 'cancer', 'leo', 'virgo', 'libra', 'scorpio', 'sagittarius', 'capricorn',
        'aquarius', 'pisces'
    ]

    $.each(data, function(i) {
        console.log(i)
        console.log(data[i])
        var url = base_url + '/dailyHoroscope/' + data[i]

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                content =  result.prediction.personal_life.substring(0, maxLength) +'  <span style="color:#fe870a;font-weight:500;">...Read more</span>'
                $('#'+data[i]+'').append(content)

            }
        });

    })



}
</script>

</html>