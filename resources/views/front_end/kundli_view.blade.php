<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/front_end/css/kundli_view.css?v=').time() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Kundli</title>
</head>
<style>
.btn-viimshotari {
    width: 80%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 30px;
    margin-top: 10px;
}

.btn-viimshotari button {
    border-radius: 50%;
    height: 30px;
    width: 30px;
    border: none;
}

.active1 {
    background-color: #fe870a;
}

.btn_active {
    border: 1px solid #fe870a !important;
}
</style>

<body style="overflow-x: hidden;">
    <nav>
        <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png')}} " alt="">
        <div>

            <ul>
                <li> <a href="{{ url('/')}}"> Home </a> </li>
                <li><a href="{{ url('/all')}}"> Our Astrologer </a> </li>
                <li><a href="{{ url('/services')}}"> Services </a></li>
                <li style="font-family: 'Lato', sans-serif;"><a href="{{ url('/kundli')}}"> <b
                            style="color:#fe870a !important;border-bottom: 2px solid #fe870a;"> Kundli </b> </a></li>
                <li><a href="{{ url('/horoscope')}}"> Horoscope </a> </li>
                <li><a href="{{ url('/blog')}}"> Blog </a> </li>
            </ul>
        </div>

        <?php  if(Auth::guard('users')->check() == true){ $id=Auth::guard('users')->user()->id;?>
        {{Auth::guard('users')->user()->name}}  <a href='{{url("/user/notification/$id")}}'><i class="fa fa-bell fa-x" aria-hidden="true"></i><span id="count" style="margin-top:1rem;"></span></a>
        <?php } else{ ?>
        <a class="login-btn text-light" href="{{url('/signin')}}">Sing In</a>
        <?php } ?>
        
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="row mt-5 mx-1">
                <div class="col-md-2"> <button id="basic" class="btn-inactive view_button"
                        onclick="displayBasic()">basic</button>
                </div>
                <div class="col-md-2"><button id="kundli" class="btn-inactive view_button"
                        onclick="displayKundli()">Kundli</button>
                </div>
                <div class="col-md-2"><button id="kp" class="btn-inactive view_button" onclick="displayKP()">KP</button>
                </div>
                <div class="col-md-2"><button id="charts" class="btn-inactive view_button"
                        onclick="displayCharts()">Charts</button> </div>
                <div class="col-md-2"><button id="dasha" class="btn-inactive view_button"
                        onclick="displayDasha()">Dasha</button> </div>
                <div class="col-md-2"><button id="report" class="btn-inactive view_button"
                        onclick="displayReport()">Reports</button> </div>

            </div>
        </div>
        <div class="col-md-12">
            <section class="basic_main" style="width:95%;">

                <div class="row  mx-2">
                    <div class="col-md-6">
                        <p style="margin-top: 30px;">Basic Details</p>
    
                        <div class="Basic-details">

                            <table style="width:100%">
                                <tr>

                                    <td class="td_style" style="border-top-left-radius: 12px;" colspan="2">Name</td>
                                    <td class="td_style" style="border-top-right-radius: 12px;" colspan="2">
                                    {{$input['full_name']}}
                                        </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Date</td>
                                    <td colspan="2">{{$input['birth_date']}}</td>
                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Time</td>
                                    <td class="td_style" colspan="2">{{$input['birth_time']}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Place</td>
                                    <td colspan="2">{{$input['birth_place']}}</td>

                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Latitude</td>
                                    <td class="td_style" colspan="2">{{$responseData->latitude}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Longitude</td>
                                    <td colspan="2">{{$responseData->longitude}}</td>

                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Timezone</td>
                                    <td class="td_style" colspan="2">GMT + 5.5</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Sunrise</td>
                                    <td colspan="2">{{$responseData->sunrise}}</td>

                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Sunset</td>
                                    <td class="td_style" colspan="2">{{$responseData->sunset}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Ayanamsha</td>
                                    <td colspan="2">{{$responseData->ayanamsha}}</td>

                                </tr>

                            </table>

                        </div>

                        <p style="margin-top: 30px;">Panchang Details</p>
                        <div class="panchang-details">
                            <table style="width: 100%;">
                                <tr>
                                    <td colspan="2" style="border-top-left-radius: 12px;">Tithi</td>
                                    <td colspan="2" style="border-top-right-radius: 12px;">{{$responseData1->Tithi}}
                                    </td>

                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Karan</td>
                                    <td class="td_style" colspan="2">{{$responseData1->Karan}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Yog</td>
                                    <td colspan="2">{{$responseData1->Yog}}</td>

                                </tr>
                                <tr>

                                    <td class="td_style" style="border-bottom-left-radius: 12px;" colspan="2">Nakshatra
                                    </td>
                                    <td class="td_style" style="border-bottom-right-radius: 12px;" colspan="2">
                                        {{ $responseData1->Naksahtra  }}</td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p>Avakhada Details</p>
                        <div class="avakhada">
                            <table style="width:100%">
                                <tr>

                                    <td class="td_style" style="border-top-left-radius: 12px;" colspan="2">Varna</td>
                                    <td class="td_style" style="border-top-right-radius: 12px;" colspan="2">
                                        {{ $responseData1->Varna }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Vashya</td>
                                    <td colspan="2">{{$responseData1->Vashya}}</td>
                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Yoni</td>
                                    <td class="td_style" colspan="2">{{ $responseData1->Yoni }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Gan</td>
                                    <td colspan="2">{{$responseData1->Gan}}</td>

                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Nadi</td>
                                    <td class="td_style" colspan="2">{{ $responseData1->Nadi }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Sign</td>
                                    <td colspan="2">{{$responseData1->ascendant}}</td>

                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Sign Lord</td>
                                    <td class="td_style" colspan="2">{{ $responseData1->ascendant_lord }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Nakshatra-Charan</td>
                                    <td colspan="2">{{$responseData1->Charan}}</td>

                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Yog</td>
                                    <td class="td_style" colspan="2">{{ $responseData1->Yog }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Karan</td>
                                    <td colspan="2">{{$responseData1->Karan}}</td>

                                </tr>
                                <tr>

                                    <td class="td_style" colspan="2">Tithi</td>
                                    <td class="td_style" colspan="2">{{ $responseData1->Tithi }}</td>
                                </tr>

                                <tr>
                                    <td colspan="2">Yunja</td>
                                    <td colspan="2">{{$responseData1->yunja}}</td>

                                </tr>
                                <tr style="border-bottom-right-radius: 12px;">

                                    <td class="td_style" colspan="2">Tatva</td>
                                    <td class="td_style" colspan="2">{{ $responseData1->tatva }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Name alphabet</td>
                                    <td colspan="2">{{$responseData1->name_alphabet}}</td>

                                </tr>
                                <tr style="border-bottom-right-radius: 12px;">

                                    <td class="td_style" style="border-bottom-left-radius: 12px;" colspan="2">Paya</td>
                                    <td class="td_style" style="border-bottom-right-radius: 12px;" colspan="2">
                                        {{ $responseData1->paya }}</td>
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12  mx-2">
            <section class="kundli_main">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="North_Indian_button">North Indian</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="South_Indian_button">South Indian</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6  mt-3">
                                <div style="margin-left:200px;">{!!$kundli_chart!!}</div>
                                <div class="text-center text-center-name">Lagna Chart</div>
                            </div>
                            <div class="col-md-6  mt-3">
                                <div>{!!$nkundli_chart!!}</div>
                                <div class="text-left text-center-name">Navamansha Chart</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="col-md-12 col-md-4">
                            <p class="planets-p">Planets</p>

                            <div class="Planets">

                                <table style="width:100%">
                                    <tr style="font-weight: 700;
                             font-size: 18px; color: #fe870a;">
                                        <th>Planet</th>
                                        <th>Sign</th>
                                        <th>Sign Lord</th>
                                        <th>Nakshatra</th>
                                        <th>Naksh Lord</th>
                                        <th>Degree</th>
                                        <th>Retro(R)</th>
                                        <th>Avastha</th>
                                        <th>House</th>

                                    </tr>
                                    <tbody>
                                        @foreach($responseData2 as $key=> $planet)
                                        <tr>
                                            <td @if($key % 2==0) class="td_style" @endif>{{ $planet->name }}
                                            </td>
                                            <td @if($key % 2==0) class="td_style" @endif>{{ $planet->sign }}
                                            </td>
                                            <td @if($key % 2==0) class="td_style" @endif>
                                                {{ $planet->signLord }}
                                            </td>
                                            <td @if($key % 2==0) class="td_style" @endif>
                                                {{ $planet->nakshatra }}
                                            </td>
                                            <td @if($key % 2==0) class="td_style" @endif>
                                                {{ $planet->nakshatraLord }}</td>
                                            <td @if($key % 2==0) class="td_style" @endif>
                                                {{ $planet->normDegree }}
                                            </td>
                                            <td @if($key % 2==0) class="td_style" @endif>
                                                @if($planet->isRetro ==
                                                false) No
                                                @else Yes @endif</td>
                                            <td @if($key % 2==0) class="td_style" @endif>
                                                {{ @$planet->planet_awastha }}</td>
                                            <td @if($key % 2==0) class="td_style" @endif>
                                                {{ $planet->house }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>


                            </div>

                        </div>

                    </div>
                </div>
            </section>

        </div>
        <div class="col-md-12">

            <section class="kp_main">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mx-3">
                            <div class="col-md-4">
                                <p>Bhav Chalit Chart</p>
                                <div>{!!$chalit_chart!!}</div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <p>Basic Details</p>

                                <table width="90%">
                                    <tr class="td_style">
                                        <td>Ayanamsha</td>
                                        <td>{{$responseData6->basic_details->ayanamsha}}</td>
                                    </tr>
                                    <tr>
                                        <td>Sunrise</td>
                                        <td>{{$responseData6->basic_details->sunrise}}</td>
                                    </tr>
                                    <tr class="td_style">
                                        <td>Sunset</td>
                                        <td>{{$responseData6->basic_details->sunset}}</td>
                                    </tr>
                                    <tr>
                                        <td>Ascendant</td>
                                        <td>{{$responseData6->basic_details->ascendant}}</td>
                                    </tr>
                                    <tr class="td_style">
                                        <td>Rashi</td>
                                        <td>{{$responseData6->basic_details->rashi}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nakshatra</td>
                                        <td>{{$responseData6->basic_details->nakshatra}}</td>
                                    </tr>
                                    <tr class="td_style"
                                        style="border-bottom-left-radius: 12px;border-bottom-right-radius: 12px;""> <td >Dasha Balance</td> <td>{{$responseData6->basic_details->dasha_balance}}</td></tr>
                            
                   
                        </table>
                    </div>
                </div>
                   

                
                </div>
                <div class=" col-md-12">
                                        <p class="planets-p mx-5">Planets</p>
                                        <div class="table-div-planets">


                                            <table class="table-first mx-5"
                                                style="width:95%; border-top-left-radius: 12px;">
                                                <tr style="font-weight: 700; font-size: 18px; color: #fe870a;">

                                                    <th style="border-top-left-radius:12px;">Planets</th>
                                                    <th>Cusps</th>
                                                    <th>Sign</th>
                                                    <th>Sign Lord</th>
                                                    <th>Star Lord</th>
                                                    <th>Sub Lord</th>
                                                </tr>
                                                @foreach($responseData4 as $key=> $planet)
                                                <tr @if($key % 2==0) class="td_style" @endif>
                                                    <td>{{$planet->planet_name}}</td>
                                                    <td>{{$planet->house}}</td>
                                                    <td>{{$planet->sign}}</td>
                                                    <td>{{$planet->sign_lord}}</td>
                                                    <td>{{$planet->nakshatra_lord}}</td>
                                                    <td>{{$planet->sub_lord}}</td>
                                                </tr>
                                                @endforeach

                                            </table>
                                        </div>
                            </div>
                            <div class="col-md-12">
                                <p class="planets-p mx-5">Cusps</p>
                                <div class="table-div-planets">
                                    <table class="table-first mx-5" style="width:95%;border-radius: 12px;">
                                        <tr style="font-weight: 700; font-size: 18px; color: #fe870a;">

                                            <th>Cusps</th>
                                            <th>Degree</th>
                                            <th>Sign</th>
                                            <th>Sign Lord</th>
                                            <th>Star Lord</th>
                                            <th>Sub Lord</th>
                                        </tr>

                                        @foreach($responseData5 as $key=>$cusps)
                                        <tr @if($key % 2==0) class="td_style" @endif>
                                            <td>{{$cusps->house_id}}</td>
                                            <td>{{round($cusps->cusp_full_degree,2)}}</td>
                                            <td>{{$cusps->sign}}</td>
                                            <td>{{$cusps->sign_lord}}</td>
                                            <td>{{$cusps->nakshatra_lord}}</td>
                                            <td>{{$cusps->sub_lord}}</td>
                                        </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>



            </section>

        </div>

        <div class="col-md-12">
            <section class="charts_main">

                <div class="row">
                    <div id="charts_data"></div>

                </div>
            </section>

        </div>

        <div class="col-md-12">
            <section class="dasha_main">
                <div class="col-md-12" style="margin:5rem;width:105%;">
                    <p class="Vimshottari-p">Vimshottari Dasha</p>
                    <div class="btn-viimshotari">
                        <div style="display: flex; align-items: center; justify-content: center;"> <button
                                id="mahadasha" onclick="retriveTable()">1 </button>
                            <span
                                class="Dasha-sub-hed font-weight-bold mx-1">Mahadasha____________________________</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;"> <button
                                id="antardasha">2
                            </button>
                            <span
                                class="Dasha-sub-hed font-weight-bold mx-1">Antardasha____________________________</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;"> <button
                                id="pratyantardasha">3
                            </button>
                            <span
                                class="Dasha-sub-hed font-weight-bold mx-1">Pratyantardasha____________________________</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;"> <button
                                id="sookshmadasha">4
                            </button>
                            <span class="Dasha-sub-hed font-weight-bold mx-1">Sookshmadasha</span>
                        </div>
                    </div>
                    <div class="Vimshottari">



                        <table style="width:100%" id="Vimshottari_table">
                            <thead>
                                <tr style="font-weight: 700;
                                   font-size: 18px; color: #fe870a; border-top-left-radius: 12px;">
                                    <th>Planet</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


                    </div>


                </div>

                <div class="col-md-12" style="margin:5rem;width:105%;">
                    <p class="Vimshottari-p">Yogini Dasha</p>

                    <div class="Vimshottari">



                        <table style="width:100%" id="yogini_table">
                            <thead>
                                <tr style="font-weight: 700;
                                   font-size: 18px; color: #fe870a; border-top-left-radius: 12px;">
                                    <th>Planet</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


                    </div>
                    <div>
                        <table width="80%" class="mt-3">
                            <tr class="td_style">
                                <td>Yogini</td>
                                <td>Mangala</td>
                                <td>Pingala</td>
                                <td>Dhanya</td>
                                <td>Bhramari</td>
                                <td>Bhadrika</td>
                                <td>Ulka</td>
                                <td>Siddha</td>
                                <td>Sankata</td>
                            </tr>
                            <tr>
                                <td>Lord</td>
                                <td>MOON</td>
                                <td>SUN</td>
                                <td>JUPITER</td>
                                <td>MARS</td>
                                <td>MERCURY</td>
                                <td>SATURN</td>
                                <td>VENUS</td>
                                <td>RAHU</td>
                            </tr>
                        </table>
                    </div>


                </div>
            </section>
        </div>
        <div class="col-md-12">
            <section class="report_main container">
                <div class="row mx-2">
                    <div class="col-md-10">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item report_tab" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">General</button>
                            </li>
                            <li class="nav-item report_tab" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Remedies</button>
                            </li>
                            <li class="nav-item report_tab" role="presentation">
                                <button class="nav-link" id="messages-tab" data-bs-toggle="tab"
                                    data-bs-target="#messages" type="button" role="tab" aria-controls="messages"
                                    aria-selected="false">Dosha</button>
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-10">
                                        <ul class="nav nav-pills" id="myTab1" role="tablist">
                                            <li class="nav-item report_tab" role="presentation">
                                                <button class="nav-link active mx-5" id="home1-tab" data-bs-toggle="tab"
                                                    data-bs-target="#home1" type="button" role="tab"
                                                    aria-controls="home1" aria-selected="true">General</button>
                                            </li>
                                            <li class="nav-item report_tab" role="presentation">
                                                <button class="nav-link mx-5" id="profile1-tab" data-bs-toggle="tab"
                                                    data-bs-target="#profile1" type="button" role="tab"
                                                    aria-controls="profile1" aria-selected="false">Planetary</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home1" role="tabpanel"
                                                aria-labelledby="home1-tab" tabindex="0">
                                                <section class="general_main">
                                                    <div class="col-md-12">
                                                        <div class="card" style="width:90%;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Description</h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">Your ascendant
                                                                    is
                                                                    {{$result1->asc_report->ascendant}}</h6>
                                                                <div class="card-text">{{$result1->asc_report->report}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p></p>
                                                            <div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="card" style="width:90%;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Physical</h5>
                                                                @foreach($result2->physical as $physical)
                                                                <div class="card-text">{{$physical}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p></p>
                                                            <div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="card" style="width:90%;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Character</h5>
                                                                @foreach($result2->character as $character)
                                                                <div class="card-text">{{$character}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p></p>
                                                            <div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="card" style="width:90%;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Education</h5>
                                                                @foreach($result2->education as $education)
                                                                <div class="card-text">{{$education}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p></p>
                                                            <div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="card" style="width:90%;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Family</h5>
                                                                @foreach($result2->family as $family)
                                                                <div class="card-text">{{$family}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p></p>
                                                            <div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="card" style="width:90%;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Health</h5>
                                                                @foreach($result2->health as $health)
                                                                <div class="card-text">{{$health}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p></p>
                                                            <div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </section>
                                            </div>
                                            <div class="tab-pane" id="profile1" role="tabpanel"
                                                aria-labelledby="profile1-tab" tabindex="0">
                                                <section>
                                                    <div class="col-md-12">
                                                        <div class="row" id="planet_report">

                                                        </div>
                                                    </div>
                                                </section>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills" id="myTab2" role="tablist">
                                            <li class="nav-item report_tab" role="presentation">
                                                <button class="nav-link active" id="home2-tab" data-bs-toggle="tab"
                                                    data-bs-target="#home2" type="button" role="tab"
                                                    aria-controls="home2" aria-selected="true">Rudraksha</button>
                                            </li>
                                            <li class="nav-item report_tab" role="presentation">
                                                <button class="nav-link" id="profile2-tab" data-bs-toggle="tab"
                                                    data-bs-target="#profile2" type="button" role="tab"
                                                    aria-controls="profile2" aria-selected="false">Gemstones</button>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home2" role="tabpanel"
                                                aria-labelledby="home2-tab" tabindex="0">
                                                <section class="suggesstion_main">
                                                    <div class="row mx-3">

                                                        <div class="col-md-12  mt-4">
                                                            <div class="card" style="width:90%;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Rudraksha Suggestion Report
                                                                    </h5>

                                                                    <div class="card-text">This Rudraksha suggestion
                                                                        report aims to help you choose the most
                                                                        suitable Rudraksha that you can wear to have the
                                                                        blessings of Lord Shiva. This
                                                                        report considers the Nakshatra that you were
                                                                        born in to suggest the most appropriate
                                                                        Rudraksha for you. Wearing the recommended
                                                                        Rudraksha shall shield you against the
                                                                        negative energies and help retain positivity in
                                                                        your life.<br>
                                                                    </div>
                                                                    <h6 class="card-subtitle mb-2 mt-4 text-muted">
                                                                        Rudraksha & its importance</h6>
                                                                    <div class="card-text">
                                                                        Rudraksha beads are produced by the 'Rudraksha
                                                                        Tree' scientifically called
                                                                        Elaeocarpus. The tree grows at a certain
                                                                        altitude in the mountains, especially the
                                                                        Himalayas - the home to Lord Shiva. The seeds
                                                                        are known to have very unique
                                                                        vibrations that aid the spiritual and physical
                                                                        growth of the wearer. In Hindu
                                                                        scriptures, it is mentioned that the one who
                                                                        wears Rudraksha is blessed with the
                                                                        virtues of Dharma, Artha, Kama, and Moksha.
                                                                        Wearing Rudraksha, in fact, allows the
                                                                        wearer to connect with Lord Shiva and his divine
                                                                        energies.<br> <br>
                                                                        It is a belief that the wearer of Rudraksha not
                                                                        only pleases Lord Shiva but also
                                                                        Goddess Durga, Lord Indra, Lord Brahma, Lord
                                                                        Vishnu, Lord Ganesh, Lord Kartikeya,
                                                                        Lord Aditya, and many other deities. If you want
                                                                        to condemn your sins or faults and
                                                                        purify your life, a Rudraksha is a good tool to
                                                                        begin with. It is said that a
                                                                        personâ€™s sins burn down to ashes by merely
                                                                        looking at a Rudraksha. On the other
                                                                        hand, wearing a Rudraksha helps in the
                                                                        fulfilment of the desires of the wearer.<br>
                                                                        The number of faces a Rudraksha has varies from
                                                                        1-Mukhi to 21-Mukhi, all of which
                                                                        are used for different purposes. Henceforth, it
                                                                        is not advisable to buy any
                                                                        Rudraksha of your choice, wear it, and expect it
                                                                        to work. In fact, wearing the wrong
                                                                        Rudraksha can disturb a nativeâ€™s life by
                                                                        exposing him to wrong energies or simply
                                                                        overpowering a certain planet or leaving it
                                                                        strengthless. Therefore, it is very
                                                                        important that you get a consultation from an
                                                                        astrologer to astrologically decide
                                                                        the most suitable Rudraksha for yourself.
                                                                        <br><br>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="card" style="width:90%;">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">Details</h5>
                                                                    <div class="card-text" id="rudhra_content">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="card" style="width:90%;">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">Benefits</h5>
                                                                    <div class="card-text">
                                                                        <ul>
                                                                            <li>The wearer of the rudraksha is blessed
                                                                                with an abundance of positive energy,
                                                                                enthusiasm, and fearlessness.</li>
                                                                            <li>Wearing the rudraksha gives the native
                                                                                the power to take on things headstrong
                                                                                and enhances his willpower.</li>
                                                                            <li>The health benefits of the rudraksha are
                                                                                also well known as wearing it helps in
                                                                                controlling the blood pressure of the
                                                                                native.</li>
                                                                            <li>This rudraksha is known for its power of
                                                                                creating a positive environment around
                                                                                the wearer.</li>
                                                                            <li>The bead allows the native peace of mind
                                                                                and helps him in controlling his anger.
                                                                            </li>
                                                                            <li>One seeking the divine blessings of
                                                                                Goddess Durga must wear this Mukhi.</li>
                                                                            <li>It also helps in clearing the passage of
                                                                                success for the native.</li>
                                                                            <li>Healthwise, the rudraksha helps in
                                                                                regulating the brain and nervous system
                                                                                of the wearer.</li>
                                                                            <li>In fact, it also helps fight dizziness
                                                                                and cure skin disorders.</li>
                                                                        </ul>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="card" style="width:90%;">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">How to wear</h5>
                                                                    <div class="card-text">
                                                                        The best day to wear the rudraksha is
                                                                        Monday. When doing so, start with putting the
                                                                        bead in GangaJal for one day. After doing the
                                                                        pooja as suggested by the astrologer, wear the
                                                                        rudraksha in red or black, or yellow
                                                                        thread. It is advised that this rudraksha should
                                                                        be worn on the left hand. Recite the mantra - Om
                                                                        Hreem Hum Namah - 108 times when wearing the
                                                                        rudraksha.

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <div class="card" style="width:90%;">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">Precautions</h5>
                                                                    <div class="card-text">
                                                                        <ul>
                                                                            <li>Make sure the rudraksha is well hidden
                                                                                when you wear it. Don’t try to flaunt
                                                                                it.</li>
                                                                            <li>Also, don’t give the used rudraksha to
                                                                                anyone else or let them touch it.</li>
                                                                            <li>Don’t go to sleep wearing the Rudraksha
                                                                                and always worship it before wearing it
                                                                                again in the morning.</li>
                                                                            <li>Keep the rudraksha at the worship place
                                                                                before going to sleep.</li>
                                                                            <li>In case the rudraksha breaks, dispose it
                                                                                properly. Don’t wear broken beads.</li>
                                                                            <li>You must discard non-veg food after
                                                                                wearing this rudraksha.</li>
                                                                            <li>Don’t drink alcohol after wearing the
                                                                                rudraksha.</li>
                                                                            <li>Don’t take the rudraksha to a funeral of
                                                                                any kind</li>
                                                                        </ul>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div class="tab-pane" id="profile2" role="tabpanel"
                                                aria-labelledby="profile2-tab" tabindex="0">
                                                <section class="suggesstion_main">
                                                    <div class="row mx-3">

                                                        <div class="col-md-12  mt-4">
                                                            <h5>Life Stone</h5>
                                                            <div class="card" style="width:90%;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Life stone for
                                                                        {{$responseData1->ascendant}}
                                                                    </h5>

                                                                    <div class="card-text">
                                                                        A life stone is a gem for the Lagna lord, which
                                                                        the native can wear throughout his or her life.
                                                                        A life stone collectively influences everything
                                                                        that makes your self-image, i.e. your wealth,
                                                                        education, health, business, spouse, intellect,
                                                                        etc. The lord of the
                                                                        {{$responseData1->ascendant}} ascendant/Lagna is
                                                                        {{ $responseData1->ascendant_lord }}, and to
                                                                        please {{ $responseData1->ascendant_lord }}, the
                                                                        person born with
                                                                        {{$responseData1->ascendant}} Ascendant must
                                                                        wear a {{$result3->LIFE->name}} stone.
                                                                        <table width="100%" class="table table-bordered">
                                                                            <tr>
                                                                                <td>Life stone for
                                                                                    {{$responseData1->ascendant}} </td>
                                                                                <td>{{$result3->LIFE->name}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>How to wear</td>
                                                                                <td>With {{$result3->LIFE->wear_metal}}
                                                                                    ring of
                                                                                    {{$result3->LIFE->weight_caret}}
                                                                                    caret, on
                                                                                    {{$result3->LIFE->wear_finger}}
                                                                                    finger</td>
                                                                            </tr>

                                                                        </table> <br>
                                                                    </div>
                                                                   

                                                                </div>
                                                            </div>
                                                            <h5>Fortune Stone</h5>
                                                            <div class="card" style="width:90%;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Fortune Stone for
                                                                        {{$responseData1->ascendant}}
                                                                    </h5>

                                                                    <div class="card-text">
                                                                        The Bhagya stone is suggested by the astrologers
                                                                        based on the Lord governing the 9th house of the
                                                                        native's birth chart. The Bhagya stone helps the
                                                                        native attract fortune when s/he needs it the
                                                                        most. Wearing Bhagya stone as per ascendant sign
                                                                        helps in fighting obstacles and enhances
                                                                        prosperity both in personal and professional
                                                                        life.
                                                                        <table  width="100%" class="table table-bordered">
                                                                            <tr>
                                                                                <td>Fortune stone for
                                                                                    {{$responseData1->ascendant}} </td>
                                                                                <td>{{$result3->BENEFIC->name}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>How to wear</td>
                                                                                <td>With
                                                                                    {{$result3->BENEFIC->wear_metal}}
                                                                                    ring of
                                                                                    {{$result3->BENEFIC->weight_caret}}
                                                                                    caret, on
                                                                                    {{$result3->BENEFIC->wear_finger}}
                                                                                    finger</td>
                                                                            </tr>

                                                                        </table> <br>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                            <h5>Lucky Stone</h5>
                                                            <div class="card" style="width:90%;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Lucky Stone for
                                                                        {{$responseData1->ascendant}}
                                                                    </h5>

                                                                    <div class="card-text">
                                                                        lucky gemstone is worn to enhance the native's
                                                                        luck and open new doors to success for him. An
                                                                        individual's lucky stone is one that keeps luck
                                                                        ticking for him while ensuring the blessing of
                                                                        favourable planets upon him. As Sun and Jupiter
                                                                        are beneficial planets for {{$responseData1->ascendant}}, hence the
                                                                        Lucky gemstone for the {{$responseData1->ascendant}} Ascendant is: {{$result3->LUCKY->name}}
                                                                        <table  width="100%" class="table table-bordered">
                                                                            <tr>
                                                                                <td>Lucky stone for
                                                                                    {{$responseData1->ascendant}} </td>
                                                                                <td>{{$result3->LUCKY->name}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>How to wear</td>
                                                                                <td>With {{$result3->LUCKY->wear_metal}}
                                                                                    ring of
                                                                                    {{$result3->LUCKY->weight_caret}}
                                                                                    caret, on
                                                                                    {{$result3->LUCKY->wear_finger}}
                                                                                    finger</td>
                                                                            </tr>

                                                                        </table> <br>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </section>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab"
                                tabindex="0">

                                <div class="row">
                                <div class="col-md-12">
                                        <ul class="nav nav-pills" id="myTab2" role="tablist">
                                            <li class="nav-item report_tab" role="presentation">
                                                <button class="nav-link active" id="home3-tab" data-bs-toggle="tab"
                                                    data-bs-target="#home3" type="button" role="tab"
                                                    aria-controls="home3" aria-selected="true">Manglik</button>
                                            </li>
                                            <li class="nav-item report_tab" role="presentation">
                                                <button class="nav-link" id="profile3-tab" data-bs-toggle="tab"
                                                    data-bs-target="#profile3" type="button" role="tab"
                                                    aria-controls="profile3" aria-selected="false">Kalsarpa</button>
                                            </li>
                                            <li class="nav-item report_tab" role="presentation">
                                                <button class="nav-link" id="message3-tab" data-bs-toggle="tab"
                                                    data-bs-target="#message3" type="button" role="tab"
                                                    aria-controls="message3" aria-selected="false">Sadesati</button>
                                            </li>
                                        </ul>

                                    </div>
                                    
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 mt-5">
            <section class="footers">
                <img src="{{ asset('public/front_img/Logo-removebg-preview 1.png')}} " alt="">
                <div class="footer-first-div">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing <br> elit ut aliquam, purus sit amet
                        luctus venenatis,
                        lectus <br> magna fringilla urna, porttitor rhoncus dolor purus <br> non enim praesent
                        elem</p>
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
        </div>
    </div>
    <input type="hidden" name="birth_date" id="birth_date" value="{{date('j-n-Y',strtotime($input['birth_date']))}}">
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script>
const triggerTabList = document.querySelectorAll('#myTab button')
triggerTabList.forEach(triggerEl => {
    const tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', event => {
        event.preventDefault()
        tabTrigger.show()
    })
})

const triggerTabList1 = document.querySelectorAll('#myTab1 button')
triggerTabList1.forEach(triggerEl => {
    const tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', event => {
        event.preventDefault()
        tabTrigger.show()
    })
})

const triggerTabList2 = document.querySelectorAll('#myTab2 button')
triggerTabList2.forEach(triggerEl => {
    const tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', event => {
        event.preventDefault()
        tabTrigger.show()
    })
})

displayBasic()

function displayBasic() {
    $('.view_button').removeClass('first-btn')
    $('#basic').addClass('first-btn')
    $('#kp').addClass('btn-inactive')
    $('#kundli').addClass('btn-inactive')
    $('#charts').addClass('btn-inactive')
    $('#dasha').addClass('btn-inactive')
    $('#report').addClass('btn-inactive')

    $('.charts_main').hide()
    $('.dasha_main').hide()
    $('.report_main').hide()

    $('.kp_main').hide()
    $('.kundli_main').hide()
    $('.basic_main').show()
}

function displayKundli() {

    $('.view_button').removeClass('first-btn')

    $('#basic').addClass('btn-inactive')
    $('#kp').addClass('btn-inactive')
    $('#kundli').addClass('first-btn')
    $('#charts').addClass('btn-inactive')
    $('#dasha').addClass('btn-inactive')
    $('#report').addClass('btn-inactive')


    $('.charts_main').hide()
    $('.kundli_main').show()
    $('.basic_main').hide()
    $('.kp_main').hide()
    $('.dasha_main').hide()
    $('.report_main').hide()


}


function displayKP() {

    $('.view_button').removeClass('first-btn')

    $('#basic').addClass('btn-inactive')
    $('#kp').addClass('first-btn')
    $('#kundli').addClass('btn-inactive')
    $('#charts').addClass('btn-inactive')
    $('#dasha').addClass('btn-inactive')
    $('#report').addClass('btn-inactive')

    $('.charts_main').hide()
    $('.kp_main').show()
    $('.kundli_main').hide()
    $('.basic_main').hide()
    $('.dasha_main').hide()
    $('.report_main').hide()

}


function displayCharts() {
    $('.view_button').removeClass('first-btn')


    $('#basic').addClass('btn-inactive')
    $('#kp').addClass('btn-inactive')
    $('#kundli').addClass('btn-inactive')
    $('#charts').addClass('first-btn')
    $('#dasha').addClass('btn-inactive')
    $('#report').addClass('btn-inactive')


    $('.charts_main').show()
    $('.kp_main').hide()
    $('.kundli_main').hide()
    $('.basic_main').hide()
    $('.dasha_main').hide()
    $('.report_main').hide()

}

function displayDasha() {

    $('.view_button').removeClass('first-btn')

    $('#basic').addClass('btn-inactive')
    $('#kp').addClass('btn-inactive')
    $('#kundli').addClass('btn-inactive')
    $('#charts').addClass('btn-inactive')
    $('#dasha').addClass('first-btn')
    $('#report').addClass('btn-inactive')


    $('.charts_main').hide()
    $('.kp_main').hide()
    $('.kundli_main').hide()
    $('.basic_main').hide()
    $('.dasha_main').show()
    $('.report_main').hide()

}



function displayReport() {

    $('.view_button').removeClass('first-btn')

    $('#basic').addClass('btn-inactive')
    $('#kp').addClass('btn-inactive')
    $('#kundli').addClass('btn-inactive')
    $('#charts').addClass('btn-inactive')
    $('#dasha').addClass('btn-inactive')
    $('#report').addClass('first-btn')


    $('.charts_main').hide()
    $('.kp_main').hide()
    $('.kundli_main').hide()
    $('.basic_main').hide()
    $('.dasha_main').hide()
    $('.report_main').show()

}

$('#mahadasha').addClass('active1')
var birth_date = $('#birth_date').val()
retriveTable();
getyoginidata();
getKundlidata();
getPlanetaryReport();
getRudhraksSuggest()

function getRudhraksSuggest() {
    var url = 'https://collabdoor.com/astrology/getRudhraksSuggest'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log(result)
            trHTML = `<h6 class="card-subtitle mb-2 mt-4 text-muted">` + result.recommend + `</h6>
                                <div class="card-text">` + result.detail + `</div>`


            $('#rudhra_content').empty();
            $('#rudhra_content').append(trHTML);

        },
        complete: function() {

            $('#loading-image').hide();
        }
    });

}


function getKundlidata() {
    var url = 'https://collabdoor.com/astrology/getKundliImagesdata'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var trHTML = '';
            for (var i = 0; i < result.length; i++) {
                trHTML += `<div class="col-md-3" id="D` + i + `" >Name goes here` + result[i] + `</div>`;

            }
            var newSvg = document.getElementById('charts_data');
            newSvg.innerHTML = trHTML

        },
        complete: function() {

            $('#loading-image').hide();
        }
    });

}

function getyoginidata() {
    var url = 'https://collabdoor.com/astrology/getMajorYoginiDasha'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var trHTML = '';
            $.each(result, function(i, userData) {

                var color = '';
                if (i % 2 == 0) {
                    color = 'style ="background: rgba(254, 135, 10, 0.5)"';

                }

                var onclick = "getAntarDasha('" + userData.dasha_name + "')"

                trHTML +=
                    '<tr ' + color + '  onclick="' + onclick + '"><td>' + userData.dasha_name +
                    '</td><td>' +
                    customDate(userData.start_date) +
                    '</td><td>' +
                    customDate(userData.end_date) +
                    '</td></tr>';

                if (i == 7) {
                    return false;
                }
            })



            $('#yogini_table tbody').empty();
            $('#yogini_table tbody').append(trHTML);
        }
    });
}


function retriveTable() {

    $('#mahadasha').addClass('active1 text-light')
    $('#antardasha').removeClass('active1')
    $('#pratyantardasha').removeClass('active1')
    $('#sookshmadasha').removeClass('active1')
    var url = 'https://collabdoor.com/astrology/getMahaDasha'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var trHTML = '';
            $.each(result, function(i, userData) {
                var color = '';
                if (i % 2 == 0) {
                    color = 'style ="background: rgba(254, 135, 10, 0.5)"';

                }
                var start = customDate(userData.start)
                var end = customDate(userData.end)
                if (i == 0) {
                    start = 'Birth'
                }

                var onclick = "getAntarDasha('" + userData.planet + "')"


                trHTML +=
                    '<tr ' + color + '  onclick="' + onclick + '"><td>' + userData.planet +
                    '</td><td>' +
                    start +
                    '</td><td>' +
                    end +
                    '</td></tr>';


            })
            $('#Vimshottari_table tbody').empty();
            $('#Vimshottari_table tbody').append(trHTML);
            // $("#Vimshottari_table tr").remove();


        }
    });

}



function getPlanetaryReport() {
    var url = 'https://collabdoor.com/astrology/getPlanetaryReport'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var trHTML = '';
            $.each(result, function(i, userData) {

                trHTML += `<div class="col-md-12">
                                <div class="card" style="width:90%;">
                                    <div class="card-body">
                                        <h5 class="card-title">` + userData.planet + ` Consideration</h5>
                                        
                                        <div class="card-text">` + userData.house_report + `</div>
                                       
                                    </div>
                                </div>
                                <div>
                                    <p></p>
                                    <div>

                                    </div>
                                </div>

                            </div>`



            })
            $('#planet_report').empty();
            $('#planet_report').append(trHTML);
            // $("#Vimshottari_table tr").remove();


        }
    });
}

function customDate(date) {

    return date.split(' ')[0];
}

function getAntarDasha(planet_name) {
    $('#mahadasha').removeClass('active1')
    $('#antardasha').addClass('active1')
    $('#pratyantardasha').removeClass('active1')
    $('#sookshmadasha').removeClass('active1')


    var url = 'https://collabdoor.com/astrology/getAntarDasha/' + planet_name

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var trHTML = '';
            $.each(result, function(i, userData) {
                var color = '';
                if (i % 2 == 0) {
                    color = 'style ="background: rgba(254, 135, 10, 0.5);"';

                } else {

                }

                var onclick = "getPratyantardasha('" + planet_name + "','" + userData.planet + "')"


                trHTML +=
                    '<tr ' + color + '  onclick="' + onclick + '"><td>' + planet_name + '-' +
                    userData.planet +
                    '</td><td>' +
                    customDate(userData.start) +
                    '</td><td>' +
                    customDate(userData.end) +
                    '</td></tr>';

            })
            $('#Vimshottari_table tbody').empty();
            $('#Vimshottari_table tbody').append(trHTML);
            // $("#Vimshottari_table tr").remove();


        }
    });
}

function getPratyantardasha(planet_name, sub_planet) {

    $('#antardasha').removeClass('active1')
    $('#pratyantardasha').addClass('active1')
    $('#sookshmadasha').removeClass('active1')


    document.getElementById('antardasha').onclick = function() {
        getAntarDasha(planet_name);
    };
    var url = 'https://collabdoor.com/astrology/getPratyantarDasha/' + planet_name + '/' + sub_planet

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var trHTML = '';
            $.each(result, function(i, userData) {
                var color = '';
                if (i % 2 == 0) {
                    color = 'style ="background: rgba(254, 135, 10, 0.5);"';

                } else {

                }

                var onclick = "getSookshmadasha('" + planet_name + "','" + sub_planet + "','" +
                    userData.planet + "')"

                trHTML +=
                    '<tr ' + color + '  onclick="' + onclick + '"><td>' + planet_name + '-' +
                    sub_planet + '-' +
                    userData.planet +
                    '</td><td>' +
                    customDate(userData.start) +
                    '</td><td>' +
                    customDate(userData.end) +
                    '</td></tr>';

            })
            $('#Vimshottari_table tbody').empty();
            $('#Vimshottari_table tbody').append(trHTML);
            // $("#Vimshottari_table tr").remove();


        }
    });
}


function getSookshmadasha(planet_name, sub_planet, sub_sub_planet) {

    $('#pratyantardasha').removeClass('active1')
    $('#sookshmadasha').addClass('active1')

    document.getElementById('pratyantardasha').onclick = function() {
        getPratyantardasha(planet_name, sub_planet);
    };


    var url = 'https://collabdoor.com/astrology/getSookshmadasha/' + planet_name + '/' + sub_planet + '/' +
        sub_sub_planet

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var trHTML = '';
            $.each(result, function(i, userData) {
                var color = '';
                if (i % 2 == 0) {
                    color = 'style ="background: rgba(254, 135, 10, 0.5);"';

                } else {

                }

                var onclick = "getSookshmadasha('" + planet_name + "','" + sub_planet + "','" +
                    userData.planet + "')"

                trHTML +=
                    '<tr ' + color + ' ><td>' + planet_name + '-' + sub_planet + '-' +
                    sub_sub_planet + '-' +
                    userData.planet +
                    '</td><td>' +
                    customDate(userData.start) +
                    '</td><td>' +
                    customDate(userData.end) +
                    '</td></tr>';

            })
            $('#Vimshottari_table tbody').empty();
            $('#Vimshottari_table tbody').append(trHTML);
            // $("#Vimshottari_table tr").remove();


        }
    });

}


// $(document).on("click","tr.rows td", function(e){
//     alert(e.target.innerHTML);
// });
</script>

</html>