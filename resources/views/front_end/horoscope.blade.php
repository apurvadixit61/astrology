<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horoscope</title>
    <link rel="stylesheet" href="{{ asset('public/front_end/css/horoscope_style.css?v=').time() }}">

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
                <li><a href="{{ url('/horoscope')}}"><b style="color:#fe870a !important;border-bottom: 2px solid #fe870a;"> Horoscope  </b></a> </li>
                <li><a href="{{ url('/blog')}}"> Blog </a> </li>
            </ul>
        </div>

        <?php  if(Auth::guard('users')->check() == true){ $id=Auth::guard('users')->user()->id;?>
        {{Auth::guard('users')->user()->name}}  <a href='{{url("/user/notification/$id")}}'><i class="fa fa-bell fa-x" aria-hidden="true"></i><span id="count" style="margin-top:1rem;"></span></a>
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
            <div class="container">
                <div class="today-horoscope">
                    <h3>Today’s horoscope for zodiac signs</h3>
                    <p>Reading today’s horoscope is one of the easiest ways to predict your future. From foretelling
                        your future to finally predicting your day, the free daily horoscope is everything that people
                        reads before going out to work. Who doesn’t want to take a sneak peek in their future? Unleash
                        your potential and transgress all the boundaries by reading what your zodiac sign stores for
                        your future. Read today’s horoscope and know all the upcoming events of the coming
                        week.<br /><br />
                        In this world where every third person is struggling with some problem or the other, the moon
                        signs are one of the guiding stars that guide you through your journey. The daily horoscope
                        readings that you read, are based on astrology signs, mainly known as zodiac signs. As per
                        Indian astrology, there are 12 zodiac signs namely, Aries, Taurus, Gemini, Cancer, Leo, Virgo,
                        Libra, Scorpio, Sagittarius, Capricorn, Aquarius, and Pisces. They are based on two luminaries,
                        five planets, and two shadow planets. <br><br>
                        With the advancement in the technological world, now people don’t need to peep into the
                        newspapers. All they need is few clicks and swipes and they get to know what their zodiac sign
                        possess and stores for their future. Read your daily horoscope and discover what your zodiac
                        sign stores for the coming week.
                    </p>
                </div>
                <div class="today-horoscope">
                    <h3>Understanding Today horoscope</h3>
                    <p>If you are a follower of astrology, you would know that each zodiac sign in astrology is ruled by
                        a planet. For example, the Moon is the ruler of Cancer, and Mars is the ruler of both Aries and
                        Scorpio zodiac signs. Similarly, Gemini is ruled by Mercury and so on. It’s the negative and
                        positive state of these planets that affects your zodiac sign and thus your future. <br> <br>

                        For example, Taurus is ruled by the planet Venus. In astrology, Mars, Jupiter, and Ketu are the
                        enemy of the planet Venus. Hence, if Venus is placed in any house of your Kundli with Mars,
                        Jupiter or Ketu, then the characteristics of that house may turn negative for you and reflect on
                        your Horoscope today. <br> <br>

                        Elaborating on it, if Venus and its enemy planet Mars are placed in the fifth house (House of
                        romance and children) on a particular day, then your romantic life might take a beating on that
                        day. Hence your daily horoscope will suggest you not indulge in arguments with your partner or
                        maybe delay the proposal for a day or so on. Similarly, if the favourable planet of Venus - Sun
                        and Moon - are in the fifth house with Venus, then the day is vibrant for love affairs. <br>
                        <br>

                        Note that this is just an example. In real life, astrologers consider many more dimensions and
                        forms of astrology, such as transits, Lal Kitab, Nakshatras, etc., before finalising your daily
                        horoscope. So if you seek to improve the outcomes of the day the Vedic way, your Today’s
                        horoscope is the way to go.
                    </p>
                </div>
                <div class="today-horoscope">
                    <h3>Benefit's of Horoscope</h3>
                    <p>We have been talking a lot about Today’s horoscope, how it is prepared, and all the technicality
                        or science that goes into predicting your future through horoscopes. And what we have gathered
                        from the discussion is that the Daily horoscope is an insightful medium to analyse the sense of
                        the energy of any given day. Horoscope allows us a roadmap, showing us what we might experience
                        in the day, week or month ahead of us. Having said that, here are some more benefits that one
                        can derive from reading their horoscope on a regular basis. <br> <br>
                    <ul class="horo_list">
                        <li>
                            If you are trying your luck at dating, reading your Today’s horoscope or love horoscope can
                            help you know the best time or day to go on a date. The love horoscope is especially useful
                            for someone planning to propose love to someone as you always want to do it when the chances
                            of hearing a ‘YES’ are 100%.</li>
                        <li>
                            In terms of career, the Daily horoscope can predict the possibility of you finding a job on
                            a particular day or even how you would do in an interview you are looking forward to. These
                            are some questions that home our consciousness, and having answers to them through Today’s
                            horoscope is just relieving.</li>
                        <li>
                            The horoscope also warns the natives about any kind of impending calamity. The warning
                            safeguards the native from any unannounced turn of events.</li>
                        <li>
                            Wondering if your Visa will get approved today or this week? Or will you go abroad anytime
                            soon? The Daily, weekly, and monthly horoscopes are here to help.</li>
                        <li>
                            At times, we feel stuck in life. Your business may not be growing, you might be having
                            health issues, etc. Reading the horoscope today lends you remedies to such woes.</li>
                        <li>
                            Parents are often concerned about their children, especially newborns. Well, the good news
                            is that the daily horoscope has predictions for children too. You, as a parent, can read
                            your newborn's horoscope today to plan his or her day of doing nothing.</li>
                        <li>
                            In the finance area, the astrologers, after analysing the planetary position, let you know
                            about your future financial prospects of yours.</li>
                    </ul> <br> <br>

                    At ---, our astrologers compile horoscopes for each zodiac sign after a deep study of all
                    aspects of astrology. One can trust the renowned astrologers of ours to get accurate predictions
                    about his health, marriage, career and more to begin and end his day. Therefore, if looking to
                    derive daily predictions based on your horoscope, look nowhere else. Download the --- app <br>
                    <br>

                    </p>
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

</html>