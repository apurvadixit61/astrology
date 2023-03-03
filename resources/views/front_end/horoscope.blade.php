@include('layouts.front_end.header')

<section id="page-title">
    <div class="container">
            <h1>Horoscope</h1>
            <ul>
                    <li><a href="#"> Home </a></li>
                    <li>Horoscope</li>
            </ul>
    </div>
</section>
<section id="horoscopePanle">
    <div class="container">
        <div class="title  text-center">
                <h2 id="headdailyscope" class="headdailyscope"></h2>
                <p class="mt-2 mb-5">Know Your Horoscope</p>
            </div>

             <h5 id="subtitle" class="mb-4  text-center"></h5>
            <p id="description_Data" class=" text-center"></p>


            <div id="dailyhoroscope" class="dailyhoroscope">
            <section>
                <div class="m-5" style="margin-left:10rem  !important;margin-right:10rem !important;"
                    id="adscent_prediction">

                </div>

                <div class="container" id="main_container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters aries" style="cursor:pointer;" data-field="aries">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
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
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters taurus" style="cursor:pointer;" data-field="taurus">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-1.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Taurus</h5>
                                            <div id="taurus">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters gemini" style="cursor:pointer;" data-field="gemini">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-11.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Gemini</h5>
                                            <div id="gemini">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters cancer" style="cursor:pointer;" data-field="cancer">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-10.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Cancer</h5>
                                            <div id="cancer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters leo" style="cursor:pointer;" data-field="leo">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-9.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Leo</h5>
                                            <div id="leo"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters virgo" style="cursor:pointer;" data-field="virgo">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-8.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Virgo</h5>
                                            <div id="virgo"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters libra" style="cursor:pointer;" data-field="libra">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-7.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Libra</h5>
                                            <div id="libra"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters scorpio" style="cursor:pointer;" data-field="scorpio">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-6.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Scorpio</h5>
                                            <div id="scorpio"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters  sagittarius" style="cursor:pointer;"
                                    data-field="sagittarius">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-5.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
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
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters capricorn" style="cursor:pointer;" data-field="capricorn">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-4.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
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
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters aquarius" style="cursor:pointer;" data-field="aquarius">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-3.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Aquarius</h5>
                                            <div id="aquarius"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters Pisces" style="cursor:pointer;" data-field="Pisces">
                                    <div class="col-md-4">
                                        <img src="{{ asset('public/front_img//Mask group-2.png') }}"
                                            class="rounded-circle" width="150" height="150" alt="...">
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
            </section>
        </div>
</div>
    </div>
</section>




<!-- Footer -->
<!-- Footer -->
@include('layouts.front_end.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="{{ asset('public/astrology_assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      
<style>
/* Style the active class, and buttons on mouse-over */
.daily_event_call[data-active="active"],
.btn:hover {
    background-color: #fe870a;
    color: white;
}
</style>
<script>
console.log(location.search)
var base_url = location.protocol + '//' + location.host
var maxLength = 100;
var Zodic = 'aries'
var time = 'today'
title_head = "TODAY'S HOROSCOPE"
$(".headdailyscope").html(title_head);
html_static_content =
    '<p>Reading your Today’s horoscope is one of the best ways to predict your future. The foretelling of the future through the Daily horoscope is an ancient practice and finds relevance even today. The horoscope prediction is about predicting the individual future based on various astrological aspects such as the position of the planets, Nakshatras, Tithi, and much more. However, its predominantly the movement of planets from one house of the Kundli to another that influences the life of the native and thus his Daily horoscope. As planets are in motion, their position in the chart of the native on a daily basis virtually decides the course of his life and fortune.</p>'
html_static_content +=
    '<p>Of all the ancient Vedic practices that we are aware of, horoscope reading is one of the most accepted and popular. Horoscope reading transgresses boundaries and is a tea-time read for not just the astrology-loving Indians but also people residing in western countries. In fact, these days there are numerous mediums to bring you your todays horoscope, such as TV, newspapers, magazines, and much more. Whatever the medium, the purpose of the Daily horoscope remains the same, which is to prepare you for life and make you aware of all the upcoming events, so you dont go blank into life as most people do.</p>'
subtitle = 'Today’s horoscope for zodiac signs';
$('#subtitle').html(subtitle);
$('#description_Data').html(html_static_content);

get_horoscrope('dailyHoroscope');

function get_horoscrope(end_points) {

    var data = ['aries', 'taurus', 'gemini', 'cancer', 'leo', 'virgo', 'libra', 'scorpio', 'sagittarius', 'capricorn',
        'aquarius', 'pisces'
    ]

    $.each(data, function(i) {
        console.log(i)
        console.log(data[i])
        var url = base_url + '/' + end_points + '/' + data[i]

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                console.log("result", result);
                $('#img').hide();
                content = result.prediction.personal_life.substring(0, maxLength) +
                    '  <span style="color:#fe870a;font-weight:500;">...Read more</span>'
                $('#' + data[i] + '').html(content)

            }
        });

    })
}


// single data finding
// $( ".no-gutters" ).on( "click", function() {
//     console.log("test",$(this).data('field'));


// });

$(".no-gutters").on("click", function() {
    //  jQuery.noConflict();
    //  $('#myModal').modal('show'); 
    var base_url = location.protocol + '//' + location.host

    // console.log("test",$(this).data('field'));
    let sign = $(this).data('field');
    //let end_points='dailyHoroscope';

    var url = base_url + '/horoscope_details/' + sign + '/'
    location.href = url;
    //get_horoscrope_by_sign(sign,end_points);
});


function get_horoscrope_by_sign(sign, end_points) {
    console.log("sign", sign);
    var data = [sign]
    $('#' + sign).empty();
    $.each(data, function(i) {
        console.log(i)
        console.log(data[i])
        var url = base_url + '/' + end_points + '/' + data[i]

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                console.log("resultoneee", result);
                $('#img').hide();
                //    content =  result.prediction.personal_life.substring(0, maxLength) +'  <span style="color:#fe870a;font-weight:500;">...Read more</span>'

                content += '<p><span style="color:green;font-weight:600">Personal Life :</span>' +
                    result.prediction.personal_life + '</p>';
                content += '<p><span style="color:red;font-weight:600">Emotions :</span>' + result
                    .prediction.emotions + '</p>';
                content += '<p><span style="color:blue;font-weight:600">Health :</span>' + result
                    .prediction.health + '</p>';
                content += '<p><span style="color:gray;font-weight:600">Luck :</span>' + result
                    .prediction.luck + '</p>';
                content += '<p><span style="color:turquoise;font-weight:600">Profession :</span>' +
                    result.prediction.profession + '</p>';
                content += '<p><span style="color:black;font-weight:600">Travel :</span>' + result
                    .prediction.travel + '</p>';

                //  content=result.prediction.personal_life;
                $('#' + data[i] + '').html(content);


            }
        });

    })
}






const header = document.querySelector("#myDIV");

header.addEventListener('click', event => {
    if (event.target.tagName === 'BUTTON') {
        let activeButton = header.querySelector('.daily_event_call[data-active="active"]');
        const currentState = event.target.dataset.active;

        if (activeButton && activeButton !== event.target) {
            activeButton.dataset.active = null;
        }

        event.target.dataset.active = currentState === 'active' ? null : 'active';
    }
});





//codeme

$(".daily_event_call").on("click", function() {
    $('#img').show();
    var end_points;
    var title_head
    var horoscopeType = $(this).data('item');
    var html_static_content;
    var subtitle;
    $('#subtitle').html("");
    if (horoscopeType == 'Daliy') {
        end_points = 'dailyHoroscope';
        title_head = "TODAY'S HOROSCOPE"
        $(".headdailyscope").html(title_head);
        html_static_content =
            '<p>Reading your Today’s horoscope is one of the best ways to predict your future. The foretelling of the future through the Daily horoscope is an ancient practice and finds relevance even today. The horoscope prediction is about predicting the individual future based on various astrological aspects such as the position of the planets, Nakshatras, Tithi, and much more. However, its predominantly the movement of planets from one house of the Kundli to another that influences the life of the native and thus his Daily horoscope. As planets are in motion, their position in the chart of the native on a daily basis virtually decides the course of his life and fortune.</p>'
        html_static_content +=
            '<p>Of all the ancient Vedic practices that we are aware of, horoscope reading is one of the most accepted and popular. Horoscope reading transgresses boundaries and is a tea-time read for not just the astrology-loving Indians but also people residing in western countries. In fact, these days there are numerous mediums to bring you your todays horoscope, such as TV, newspapers, magazines, and much more. Whatever the medium, the purpose of the Daily horoscope remains the same, which is to prepare you for life and make you aware of all the upcoming events, so you dont go blank into life as most people do.</p>'
        subtitle = 'Today’s horoscope for zodiac signs';
        $('#subtitle').html(subtitle);
        $('#description_Data').html(html_static_content);
    } else if (horoscopeType == 'Tomorrow') {
        end_points = 'tomorrow_horoscope';
        title_head = "TOMORROW HOROSCOPE"
        html_static_content =
            '<p>It is not always bad to do things in advance and the same logic applies when it comes to reading your horoscope. If you seek to stay one step ahead in life, your Tomorrows horoscope can help you in doing so. Reading your tomorrows horoscope gives you a picture of what stars are planning for you in the days to come. Tomorrows horoscope is the study of the Moons movement and placement before it actually happens, and based on the same, it highlights what would or wouldnt change for you in the upcoming days.</p><p>Your tomorrows horoscope is prepared by the expert astrologers  who have massive experience in astrology thus the predictions they are making for you are ought to be authentic. The learned astrologers, through the horoscope, highlight change across various aspects of your life such as love, career, marriage and thus allow you suggestions on how you can make the best use of these changes. The motive of your tomorrows horoscope is to change your life for good and warn you against the upcoming woes. And we feel you will be glad to have that information delivered right at your doorsteps. So, with that being said, read your tomorrows horoscope today.</p>';
        subtitle = 'Tomorrow horoscope for zodiac signs';
        $('#subtitle').html(subtitle);
        $('#description_Data').html(html_static_content);
        $(".headdailyscope").text(title_head);
    } else if (horoscopeType == 'Week') {
        end_points = 'weekly_horoscope';
        title_head = "YESTERDAY HOROSCOPE"
        subtitle = 'Yesterday horoscope for zodiac signs';
        html_static_content =
            '<p>Looking for your weekly horoscope? we can help you put an end to your search. On we, the astrologers, on a regular basis, caters horoscopes, including weekly horoscopes, that are prepared after considering the movement of the planets in Vedic astrology. This movement of the Vedic planets can be both positive and negative for the native, and the work of the horoscopes for the week ahead is to highlight their influences, their effect, and the associated remedies that one can adopt to ensure that you are safeguarded from the negative effect of the planets.</p><p>The weekly horoscope, besides a dose of insights into the good and bad of the week, also brings you tips and tricks that you can consider to make your life happening. These tips, yet again, are suggested by expert astrologers and practising them, in some way or the other, will help you in making the best use of your week. With the weekly horoscope, we make sure you are well aware of whats going to come for you in the future so that you are well prepared for the uncertainties and can take actions that only better your life.</p>'
        $('#subtitle').html(subtitle);
        $('#description_Data').html(html_static_content);

        $(".headdailyscope").text(title_head);
    } else if (horoscopeType == 'Month') {
        end_points = 'monthly_horoscope';
        title_head = "MONTHLY HOROSCOPE"

        subtitle = 'Monthly horoscope for zodiac signs';
        html_static_content =
            '<p>The monthly horoscope at we is prepared by expert astrologers with experience of lot of years, and therefore it ought to be the best prediction that you can get to prepare for the month ahead of you. As per astrology, the movement of the planet Sun is considered one of the most influential and impacting movements when it comes to Kundli predictions. And the monthly horoscope is something that keeps a track of this movement. By doing so, the astrologers aim to give the monthly horoscope readers an insight into whats ahead of them; so he or she can make the best choices for himself or herself.</p><p>Once you take a look at the Monthly horoscope, you just dont find the solutions to the upcoming hiccups in life but also the opportunities that await you ahead. Moreover, the horoscope also spares the native with suggestions and remedies that he or she can adapt to better the outcomes from the month for themselves. By doing so, astrologers ensure the holistic development of the native so that they can feel confident about the choices they are afraid to make. The monthly horoscope is really a life saviour, and one of the ways that can help you in making your life easier.</p>';
        $('#subtitle').html(subtitle);
        $('#description_Data').html(html_static_content);


        $(".headdailyscope").text(title_head);
    } else {
        end_points = 'yearly_horoscope';
        title_head = "Yearly HOROSCOPE"

        subtitle = 'Yearly horoscope for zodiac signs';
        html_static_content =
            '<p>The new year brings a lot of new opportunities for each and every one of us. But how do we know that the opportunity is actually present for us? Well, the simplest way to find out is to read your yearly horoscope. The yearly horoscope at we is the result of collaboration among the most experienced and learned Vedic astrologers who put their skills to study planets, their movements and thus are able to cater how those movements will affect ones life through yearly horoscope. The yearly horoscope is prepared in such a way that it gives you a picture of how your life and its different aspects such as love, marriage, career, etc. would change in the year to come. And once you have that knowledge for yourself, you can make choices based on the same.</p><p>From Aries to Pisces and everything in between, your yearly horoscope is a guide that helps you stay a step ahead of others in the room. Your horoscope especially comes in handy if you are planning to take a big step in your life as it can guide you in that endeavour. So, what are you waiting for? Read your yearly horoscope today.</p>';
        $('#subtitle').html(subtitle);
        $('#description_Data').html(html_static_content);

        $(".headdailyscope").text(title_head);


    }
    get_horoscrope(end_points)

});
</script>

    </html>