@include('layouts.front_end.header')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
  body
  {
    background:url('https://collabdoor.com/public//front_img/back.png');
    background-size:cover;
  }  
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
p{
    font-size: 18px;
    font-weight: 600;
}

.td_style{
    background-color:rgba(254, 135, 10, 0.5);

}

.nav-pills>li>a {
    border-radius: 4px;
    color:#fe870a;
    margin-left:80px;
    margin-bottom:5px;
    font-size:18px;

}

.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: #fff;
    background-color: #fe870a;
}

.report>li.active>a, .report>li.active>a:focus, .report>li.active>a:hover {
    border-bottom: 4px solid #fe870a;
    color: #fe870a;
    margin-left: 80px;
    margin-bottom: 5px;
    font-size: 18px;
    background: none;
}

.card-title
{
    font-size:18px;
}

.manglik_present{    
    border: 4px solid green;
}

.manglik_absent{    
    border: 4px solid red;
}
.manglik_active
{
    width: 75px;
    padding: 20px;
    font-size: 18px;
    border-radius: 50%;
    color: #fff;
    border: 1px solid #fff;
}
</style>
<div class="container">
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#basic">Basic</a></li>
        <li><a data-toggle="pill" href="#kundli">Kundli</a></li>
        <li><a data-toggle="pill" href="#kp">KP Details</a></li>
        <li><a data-toggle="pill" href="#charts">Charts</a></li>
        <li><a data-toggle="pill" href="#dasha">Dasha</a></li>
        <li><a data-toggle="pill" href="#report">Report</a></li>
    </ul>

    <div class="tab-content">
        <div id="basic" class="tab-pane fade in active">
            <div class="row mt-5">
                <div class="col-md-6">
                    <p>Basic Details</p>
                    <table class="table table-bordered">

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
                    <p>Panchang Details</p>
                    <table class="table table-bordered">
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
                <div class="col-md-6">
                    <p>Avakhada Details</p>
                    <table class="table table-bordered">
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
        <div id="kundli" class="tab-pane fade">
            <div class="container mt-5">
                <ul class="nav nav-pills ">
                    <li class="active " style="margin-left:20rem;"><a data-toggle="pill" href="#home">North Indian Kundli</a></li>
                    <li class=""><a data-toggle="pill" href="#menu1">South Indian Kundli</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-6">{!!$kundli_chart!!}
                                <p style="margin-left:7rem;">Lagna Chart</p>
                            </div>
                            <div class="col-md-6">{!!$nkundli_chart!!}
                                <p style="margin-left:7rem;" >Navamansha Chart</p>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        No CHarts
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p>Planets</p>
                    <table class="table table-bordered">
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
        <div id="kp" class="tab-pane fade">
            <div class="container" style="margin-top:10rem;">
                <div class="row">
                    <div class="col-md-6">{!!$chalit_chart!!} <p style="margin-left:7rem;">Bhav Chalit Chart</p>
                    </div>
                    <div class="col-md-6">
                        <p>Basic Details</p>
                        <table class="table table-bordered">
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
                <div class=" row">
                                <div class="col-md-12">
                                    <p>Planets</p>
                                    <table class="table table-bordered">
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
                                <div class="col-md-12">
                                    <p>Cups</p>
                                    <table class="table table-bordered">
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
            </div>
        </div>
        <div id="charts" class="tab-pane fade">
            <div class="container"  >
            <div class="loader" style="margin-left:40rem;margin-top:20rem;margin-bottom:5rem;" id="loading-image"></div>

             <div class="row mt-5" id="charts_data">
             </div>
            </div>
       
        </div>
        <div id="dasha" class="tab-pane fade">
        <div class="btn-viimshotari mt-5">
                        <div style="display: flex; align-items: center; justify-content: center;"> <button
                                id="mahadasha" onclick="retriveTable()">1 </button>
                            <span
                                class="Dasha-sub-hed font-weight-bold mx-1">Mahadasha</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;"> <button
                                id="antardasha">2
                            </button>
                            <span
                                class="Dasha-sub-hed font-weight-bold mx-1">Antardasha</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;"> <button
                                id="pratyantardasha">3
                            </button>
                            <span
                                class="Dasha-sub-hed font-weight-bold mx-1">Pratyantardasha</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: center;"> <button
                                id="sookshmadasha">4
                            </button>
                            <span class="Dasha-sub-hed font-weight-bold mx-1">Sookshmadasha</span>
                        </div>
                    </div>
        <table  class="table table-bordered mt-3" id="Vimshottari_table">
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
        <div id="report" class="tab-pane fade">
            <div class="container mt-3">
                <ul class="nav nav-pills report">
                    <li class="active pl-5 pr-5"><a data-toggle="pill" href="#general">General</a></li>
                    <li><a class="pl-5 pr-5" data-toggle="pill" href="#remedies">Remedies</a></li>
                    <li><a  class="pl-5 pr-5"  data-toggle="pill" href="#dosha">Dosha</a></li>
                </ul>

                <div class="tab-content">
                    <div id="general" class="tab-pane fade in active">
                        <div class="container mt-3">
                            <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="pill" href="#home1">General</a></li>
                                <li><a data-toggle="pill" href="#planetary">Planetary</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="home1" class="tab-pane fade in active">
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <div class="card" style="width:90%;">
                                                <div class="card-body">
                                                    <h5 class="card-title">Description</h5>
                                                    <h4 class="card-subtitle mb-2 text-muted">Your ascendant
                                                        is
                                                        {{$result1->asc_report->ascendant}}</h4>
                                                    <div class="card-text">{{$result1->asc_report->report}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
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
                                    </div>
                                </div>
                                <div id="planetary" class="tab-pane fade">
                                    <div class="row mt-5" id="planet_report">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="remedies" class="tab-pane fade">
                        <div class="container">
                            <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="pill" href="#rudhraksha">Rudraksha</a></li>
                                <li><a data-toggle="pill" href="#gemstone">Gemstones</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="rudhraksha" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
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
                                            <div class="card">
                                                <div class="card-body">

                                                    <h5 class="card-title">Details</h5>
                                                    <div class="card-text" id="rudhra_content">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="gemstone" class="tab-pane fade">
                                    <div class="row mx-3">

                                        <div class="col-md-12  mt-4">
                                            <h3>Life Stone</h3>
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
                                                        <table width="100%" class="table table-bordered mt-4"  style="background:rgba(254, 135, 10, 0.8);">
                                                            <tr>
                                                                <td  class="font-weight-bold">Life stone for
                                                                    {{$responseData1->ascendant}} </td>
                                                                <td>{{$result3->LIFE->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td  class="font-weight-bold">How to wear</td>
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
                                            <h3>Fortune Stone</h3>
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
                                                        <table width="100%" class="table table-bordered mt-4"  style="background:rgba(254, 135, 10, 0.8);">
                                                            <tr>
                                                                <td  class="font-weight-bold">Fortune stone for
                                                                    {{$responseData1->ascendant}} </td>
                                                                <td>{{$result3->BENEFIC->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td  class="font-weight-bold">How to wear</td>
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

                                            <h3>Lucky Stone</h3>
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
                                                        are beneficial planets for {{$responseData1->ascendant}}, hence
                                                        the
                                                        Lucky gemstone for the {{$responseData1->ascendant}} Ascendant
                                                        is: {{$result3->LUCKY->name}}
                                                        <table width="100%" class="table table-bordered mt-4" style="background:rgba(254, 135, 10, 0.8);">
                                                            <tr>
                                                                <td class="font-weight-bold">Lucky stone for
                                                                    {{$responseData1->ascendant}} </td>
                                                                <td>{{$result3->LUCKY->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td  class="font-weight-bold" >How to wear</td>
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
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="dosha" class="tab-pane fade">
                    <div class="container">
                      <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#manglik">Manglik</a></li>
                            <li><a data-toggle="pill" href="#kalsarpa">Kalsarpa</a></li>
                            <li><a data-toggle="pill" href="#sadesati">Sadesati</a></li>
                        </ul>
                        
                        <div class="tab-content">
                            <div id="manglik" class="tab-pane fade in active">
                            <div class="card m-5">
                                <div class="card-body @if($responseData9->is_present ==1) manglik_absent @else manglik_present @endif">

                                @if($responseData9->is_present ==1) 

                                <div class="manglik_active"  style="background:red;">Yes</div> <div class="card-body" style="font-size:16px;">{{$responseData9->manglik_report}}</div>
                                
                                
                                @else <div class="manglik_active" style="background:green;">No</div> <div class="card-body" style="font-size:16px;"> {{$responseData9->manglik_report}}</div> @endif 

                                
                                </div>
                            </div>
                           </div>
                            <div id="kalsarpa" class="tab-pane fade">
                            <div class="card m-5">
                            <div class="card-body @if($responseData10->present ==1) manglik_absent @else manglik_present @endif">
                            @if($responseData10->present ==1) 

<div class="manglik_active"  style="background:red;">Yes</div> <div class="card-body" style="font-size:16px;">{{$responseData10->one_line}}</div>
 <div ><ul>{!!str_replace('p>','li>',$responseData10->report->report)!!}</ul></div>


@else <div class="manglik_active" style="background:green;">No</div> <div class="card-body" style="font-size:16px;"> {{$responseData10->one_line}}</div> @endif 
                            </div>
                            </div>
                           
                             </div>
                            <div id="sadesati" class="tab-pane fade">
                            <div class="card m-5">
                            <div class="card-body">
                                <h3>Sadesati Details</h3>
                               <div style="font-size:16px;">
                               Sadhe Sati refers to the seven-and-a-half year period in which Saturn moves through three signs, the moon sign, one before the moon and the one after it. Sadhe Sati starts when Saturn (Shani) enters the 12th sign from the birth Moon sign and ends when Saturn leaves 2nd sign from the birth Moon sign. Since Saturn approximately takes around two and half years to transit a sign which is called Shanis dhaiya it takes around seven and half year to transit three signs and that is why it is known as Sadhe Sati. Generally Sade-Sati comes thrice in a horoscope in the life time - first in childhood, second in youth & third in old-age. First Sade-Sati has effect on education & parents. Second Sade-Sati has effect on profession, finance & family. The last one affects health more than anything else.
                               </div>
                               <table class="table table-bordered mt-3">
                                <tr>
                                    <td>Start Date</td>
                                    <td>End Date</td>
                                    <td>Sign Name</td>
                                    <td>Type</td>
                                </tr>
                                @foreach($responseData11 as $key=>$report)
                                  @if($key < 20)
                                 <tr @if($key % 2==0) class="td_style" @endif >
                                    <td>{{$report->date}}</td>
                                    <td>{{$responseData11[$key+1]->date}}</td>
                                    <td>{{$report->saturn_sign}}</td>
                                    <td>{{ str_replace('_',' ',$report->type)}}</td>
                                 </tr>
                                 @endif  

                                 @endforeach
                               </table>
                            </div>
                            </div>
                           </div>
                            
                        </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.front_end.footer')

<script>

var birth_date = $('#birth_date').val()
retriveTable();


function retriveTable() {

$('#mahadasha').addClass('active1 text-light')
$('#antardasha').removeClass('active1')
$('#pratyantardasha').removeClass('active1')
$('#sookshmadasha').removeClass('active1')
var url = 'https://collabdoor.com/getMahaDasha'

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


function getAntarDasha(planet_name) {
    $('#mahadasha').removeClass('active1')
    $('#antardasha').addClass('active1')
    $('#pratyantardasha').removeClass('active1')
    $('#sookshmadasha').removeClass('active1')


    var url = 'https://collabdoor.com/getAntarDasha/' + planet_name

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
var url = 'https://collabdoor.com/getPratyantarDasha/' + planet_name + '/' + sub_planet

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


var url = 'https://collabdoor.com/getSookshmadasha/' + planet_name + '/' + sub_planet + '/' +
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


function customDate(date) {

return date.split(' ')[0];
}

getKundlidata()
function getKundlidata() {

    var url = 'https://collabdoor.com/getKundliImagesdata'

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
                trHTML += `<div class="col-md-3 mx-4" style="margin-right:4rem !important ;">`+result[i].svg+` <p style="margin-left:10rem;">`+result[i].name+`</p></div>`

                // trHTML += `<div class="col-md-3" id="D` + i + `" >Name goes here` + result[i] + `</div>`;

            }


            var newSvg = document.getElementById('charts_data');
            newSvg.innerHTML = trHTML



        },
        complete: function() {

            $('#loading-image').hide();
        }
    });
}
getPlanetaryReport()

getRudhraksSuggest()

function getRudhraksSuggest() {
    var url = 'https://collabdoor.com/getRudhraksSuggest'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log(result)
            trHTML = `<h4 class="card-subtitle mb-2 mt-4 text-muted">` + result.recommend + `</h4>
                                <div class="card-text">` + result.detail + `</div>`


            $('#rudhra_content').empty();
            $('#rudhra_content').append(trHTML);

        },
        // complete: function() {

        //     $('#loading-image').hide();
        // }
    });

}

function getPlanetaryReport() {
    var url = 'https://collabdoor.com/getPlanetaryReport'

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
</script>