@include('layouts.front_end.header')
<style>
body {
    background: url('https://collabdoor.com/public//front_img/back.png');
    background-size: cover;
}

#chart-container {
    height: 400px;
}

.card-title {
    font-size: 18px;
    font-weight: 600;
    padding-left: 19px;
}

.card-score {
    font-size: 34px;
    margin-left: 410px;
    margin-top: -48px;
    border: 4px solid #fff;
    border-radius: 46%;
    padding: 11px;
}
</style>
<div class="container">

     <h3 class="text-center m-5" >Kundli Matching Report  </h3><span style="border-bottom:5px solid #fe870a;width:50px;"></span>
    <div class="row">
        <!-- <div class="col-md-12">
            <div style="margin-left:25rem;">
                <span>{{$input['m_full_name']}}</span> <img width="50" height="50" src="{{ asset('public/front_img//ring-heart.jpg') }}" alt=""> <span>{{$input['f_full_name']}}</span>

            </div>
        </div> -->
        <div class="col-md-6">
            <h5>Groom's Basic Details   <span class="badge bg-secondary">Male</span> </h5>
            <table class="table table-bordered">

                <tr>

                    <td class="td_style" style="border-top-left-radius: 12px;" colspan="2">Name</td>
                    <td class="td_style" style="border-top-right-radius: 12px;" colspan="2">
                        {{$input['m_full_name']}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Date</td>
                    <td colspan="2">{{$input['m_birth_date']}}</td>
                </tr>
                <tr>

                    <td class="td_style" colspan="2">Time</td>
                    <td class="td_style" colspan="2">{{$input['m_birth_time']}}</td>
                </tr>
                <tr>
                    <td colspan="2">Place</td>
                    <td colspan="2">{{$input['m_birth_place']}}</td>

                </tr>
                <tr>

                    <td class="td_style" colspan="2">Latitude</td>
                    <td class="td_style" colspan="2">{{$responseData->male_astro_details->latitude}}</td>
                </tr>
                <tr>
                    <td colspan="2">Longitude</td>
                    <td colspan="2">{{$responseData->male_astro_details->longitude}}</td>

                </tr>
                <tr>

                    <td class="td_style" colspan="2">Timezone</td>
                    <td class="td_style" colspan="2">GMT + 5.5</td>
                </tr>
                <tr>
                    <td colspan="2">Sunrise</td>
                    <td colspan="2">{{$responseData->male_astro_details->sunrise}}</td>

                </tr>
                <tr>

                    <td class="td_style" colspan="2">Sunset</td>
                    <td class="td_style" colspan="2">{{$responseData->male_astro_details->sunset}}</td>
                </tr>
                <tr>
                    <td colspan="2">Ayanamsha</td>
                    <td colspan="2">{{$responseData->male_astro_details->ayanamsha}}</td>

                </tr>

                <tr>
                    <td colspan="3" class="text-center"> <form action="{{route('free-kundli')}}" method="post">@csrf<input type="hidden" name="full_name" value="{{$input['m_full_name']}}" ><input type="hidden" name="birth_date" value="{{$input['m_birth_date']}}" ><input type="hidden" name="birth_time" value="{{$input['m_birth_time']}}" ><input type="hidden" name="birth_place" value="{{$input['m_birth_place']}}" ><input type="submit" value="View Kundli" style="background:#fe870a;color:#fff;border:4px solid #fff;padding:10px;"></form> </td>
                </tr>


            </table>
        </div>
        <div class="col-md-6">
        <h5>Bride's Basic Details   <span class="badge bg-secondary">Female</span> </h5>

            <table class="table table-bordered">

                <tr>

                    <td class="td_style" style="border-top-left-radius: 12px;" colspan="2">Name</td>
                    <td class="td_style" style="border-top-right-radius: 12px;" colspan="2">
                        {{$input['f_full_name']}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Date</td>
                    <td colspan="2">{{$input['f_birth_date']}}</td>
                </tr>
                <tr>

                    <td class="td_style" colspan="2">Time</td>
                    <td class="td_style" colspan="2">{{$input['f_birth_time']}}</td>
                </tr>
                <tr>
                    <td colspan="2">Place</td>
                    <td colspan="2">{{$input['f_birth_place']}}</td>

                </tr>
                <tr>

                    <td class="td_style" colspan="2">Latitude</td>
                    <td class="td_style" colspan="2">{{$responseData->female_astro_details->latitude}}</td>
                </tr>
                <tr>
                    <td colspan="2">Longitude</td>
                    <td colspan="2">{{$responseData->female_astro_details->longitude}}</td>

                </tr>
                <tr>

                    <td class="td_style" colspan="2">Timezone</td>
                    <td class="td_style" colspan="2">GMT + 5.5</td>
                </tr>
                <tr>
                    <td colspan="2">Sunrise</td>
                    <td colspan="2">{{$responseData->female_astro_details->sunrise}}</td>

                </tr>
                <tr>

                    <td class="td_style" colspan="2">Sunset</td>
                    <td class="td_style" colspan="2">{{$responseData->female_astro_details->sunset}}</td>
                </tr>
                <tr>
                    <td colspan="2">Ayanamsha</td>
                    <td colspan="2">{{$responseData->female_astro_details->ayanamsha}}</td>

                </tr>
                <tr>
                    <td colspan="3" class="text-center"> <form action="{{route('free-kundli')}}" method="post">@csrf<input type="hidden" name="full_name" value="{{$input['f_full_name']}}" ><input type="hidden" name="birth_date" value="{{$input['f_birth_date']}}" ><input type="hidden" name="birth_time" value="{{$input['f_birth_time']}}" ><input type="hidden" name="birth_place" value="{{$input['f_birth_place']}}" ><input type="submit" value="View Kundli" style="background:#fe870a;color:#fff;border:4px solid #fff;padding:10px;"></form> </td>
                </tr>

            </table>
        </div>
    </div>
    <div id="chart-container"></div>
    <div class="row md-4">
        <div class="col-md-6 mt-3 ">
            <div class="card alert alert-primary">
                <div class="card-title">Compatibility (Varna)</div>
                <div class="card-score">
                    {{$responseData1->varna->received_points}}/{{$responseData1->varna->total_points}}</div>
                <div class="card-body">
                    Varna refers to the mental compatibility of the two persons involved. It holds nominal effect in the
                    matters of marriage compatibility.
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="card  alert alert-warning">
                <div class="card-title">Love (Bhakut)</div>
                <div class="card-score">
                    {{$responseData1->bhakut->received_points}}/{{$responseData1->bhakut->total_points}}</div>
                <div class="card-body">
                    Bhakoota is related to the couple's joys and sorrows together and assesses the wealth and health
                    after their wedding.
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card  alert alert-danger">
                <div class="card-title">Mental Compatibility (Maitri)</div>
                <div class="card-score">
                    {{$responseData1->maitri->received_points}}/{{$responseData1->maitri->total_points}}</div>
                <div class="card-body">
                    Graha Maitri is the indicator of the intellectual and mental connection between the prospective
                    couple.
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card  alert alert-secondary">
                <div class="card-title">Health (Nadi)</div>
                <div class="card-score">{{$responseData1->nadi->received_points}}/{{$responseData1->nadi->total_points}}
                </div>
                <div class="card-body">
                    <div> Nadi is related to the health compatibility of the couple. Matters of childbirth and progeny
                        are also determined with this Guna.</div>

                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card   alert alert-success">
                <div class="card-title">Dominance (Vashya)</div>
                <div class="card-score">
                    {{$responseData1->vashya->received_points}}/{{$responseData1->vashya->total_points}}</div>
                <div class="card-body">
                    Vashya indicates the bride and the groom's tendency to dominate or influence each other in a
                    marriage.
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card   alert alert-info">
                <div class="card-title">Temperament (Gana)</div>
                <div class="card-score">{{$responseData1->gan->received_points}}/{{$responseData1->gan->total_points}}
                </div>
                <div class="card-body">
                    Gana is the indicator of the behaviour, character and temperament of the potential bride and groom
                    towards each other.
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card  alert alert-dark">
                <div class="card-title">Destiny (Tara)</div>
                <div class="card-score">{{$responseData1->tara->received_points}}/{{$responseData1->tara->total_points}}
                </div>
                <div class="card-body">
                    Tara is the indicator of the birth star compatibility of the bride and the groom. It also indicates
                    the fortune of the couple.
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card  alert alert-warning">
                <div class="card-title">Physical Compatibility (Yoni)</div>
                <div class="card-score">{{$responseData1->yoni->received_points}}/{{$responseData1->yoni->total_points}}
                </div>
                <div class="card-body">
                    Yoni is the indicator of the sexual or physical compatibility between the bride and the groom in
                    question.
                </div>
            </div>
        </div>
    </div>
    <div class="card text-dark bg-info mb-3">
        <div class="card-header">Conclusion</div>
        <div class="card-body">
            <p class="card-text text-light">{{$responseData1->conclusion->report}}</p>
        </div>
    </div>
</div>
@include('layouts.front_end.footer')

<script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.ocean.js"></script>
<script>
var value = {{$responseData1->total->received_points }}

const dataSource = {
    "chart": {
        "caption": "Compatibility Score",

        "lowerlimit": "1",
        "upperlimit": "36",
        "gaugestartangle": "240",
        "gaugeendangle": "-55",
        "showvalue": "5",
        "theme": "ocean",
        "showtooltip": "0"
    },
    "colorrange": {
        "color": [{
                "minvalue": "1",
                "maxvalue": "9",
                "code": "#d13636"
            },
            {
                "minvalue": "9",
                "maxvalue": "17",
                "code": "#e87d23"
            },
            {
                "minvalue": "18",
                "maxvalue": "25",
                "code": "#f1c40f"
            },
            {
                "minvalue": "25",
                "maxvalue": "36",
                "code": "#2f8033"
            }
        ]
    },
    "dials": {
        "dial": [{
            "value": value
        }]
    },

    "annotations": {
        "groups": [{
            "items": [{
                    "type": "text",
                    "id": "text",
                    "text": "Excellent",
                    "x": "$gaugeCenterX",
                    "y": "$gaugeCenterY + -80",
                    "fontsize": "20",
                    "color": "#e6e5e3"
                },
                {
                    "type": "text",
                    "id": "text",
                    "text": "7 pts",
                    "x": "$gaugeCenterX",
                    "y": "$gaugeCenterY + 90",
                    "fontsize": "20",
                    "color": "#e6e5e3"
                }


            ]
        }]
    }



};

FusionCharts.ready(function() {
    var myChart = new FusionCharts({
        type: "angulargauge",
        renderAt: "chart-container",
        width: "100%",
        height: "100%",
        dataFormat: "json",
        dataSource
    }).render();
});
</script>