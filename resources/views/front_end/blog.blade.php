<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('public/front_end/css/blog_style.css?v=').time() }}">
  <link rel="stylesheet" href="{{ asset('public/front_end/css/blog/_responsive.css?v=').time() }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <nav>

    <img src="{{ asset('public/front_img//Logo-removebg-preview 1.png') }}" alt="">
    <div>

      <ul>
      <li style="font-family: 'Lato', sans-serif;"> <a href="{{ url('/')}}"> Home </a> </li>
                <li><a href="{{ url('/all')}}"> Our Astrologer </a> </li>
                <li><a href="{{ url('/services')}}"> Services </a></li>
                <li><a href="{{ url('/kundli')}}"> Kundli </a></li>
                <li><a href="{{ url('/horoscope')}}"> Horoscope </a> </li>
                <li><a href="{{ url('/blog')}}"> <b   style="color:#fe870a !important;border-bottom: 2px solid #fe870a;" > Blog </b> </a> </li>
        
      </ul>
    </div>
    <button style="height: 55px;  width: 170px;">Contact Us</button>
  </nav>
  <div class="first-sec">

    <h1>Blog</h1>

    <button>
      <p>Home</p> <img src="{{ asset('public/front_img//Vector (1)btn.png') }}" class="" height="20" alt="">
      <h6>Blog</h6>
    </button>

  </div>
  <section class="blog-containe">

    <div class="card-blog-con">
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">A Detailed Guide to Your 2023

            2024 Horoscope</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   "> READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image1@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Two House Systems in One Horoscope</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   ">READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image2@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Cancer and Marriage, Partnerships, Divorces and Dating</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   "> READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image3@2x0.png') }}" style="border-top-left-radius: 13PX; border-top-right-radius: 12PX;"
          class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">How the Virgo Year is Shown Publicly and Privately</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5    "> READ MORE</a>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-containe">

    <div class="card-blog-con">
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">A Detailed Guide to Your 2023

            2024 Horoscope</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   "> READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image1@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Two House Systems in One Horoscope</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   ">READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image2@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Cancer and Marriage, Partnerships, Divorces and Dating</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   "> READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image3@2x0.png') }}" style="border-top-left-radius: 13PX; border-top-right-radius: 12PX;"
          class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">How the Virgo Year is Shown Publicly and Privately</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5    "> READ MORE</a>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-containe">

    <div class="card-blog-con">
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">A Detailed Guide to Your 2023

            2024 Horoscope</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   "> READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image1@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Two House Systems in One Horoscope</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   ">READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image2@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Cancer and Marriage, Partnerships, Divorces and Dating</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   "> READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image3@2x0.png') }}" style="border-top-left-radius: 13PX; border-top-right-radius: 12PX;"
          class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">How the Virgo Year is Shown Publicly and Privately</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5    "> READ MORE</a>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-containe">

    <div class="card-blog-con">
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">A Detailed Guide to Your 2023

            2024 Horoscope</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   "> READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image1@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Two House Systems in One Horoscope</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   ">READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image2@2x.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Cancer and Marriage, Partnerships, Divorces and Dating</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5   "> READ MORE</a>
        </div>
      </div>
      <div class="card-blog" style="width: 17rem; border-radius: 20px;">
        <img src="{{ asset('public/front_img//image3@2x0.png') }}" style="border-top-left-radius: 13PX; border-top-right-radius: 12PX;"
          class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">How the Virgo Year is Shown Publicly and Privately</h5>
          <p class="card-text"> Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="  mt-5    "> READ MORE</a>
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script></script>
  <script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
</body>

</html>