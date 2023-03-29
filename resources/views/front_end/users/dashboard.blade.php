@include('layouts.dashboard.header')
<div class="dashboard_cont">
            <div class="row g-6 mb-6">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5>{{$sum_total_chat + $sum_total_call }}</h5>
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Call &
                                        Chat</span>
                                </div>
                                <div class="col-auto">
                                    <div class="dicon">
                                        <img src="{{ asset('public/astrology_assets/dashboard/images/d1.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5>{{$sum_total_call}}</h5>
                                    <p class="mb-0">Total Call</p>
                                </div>
                                <div class="col-auto">
                                    <div class="dicon">
                                        <img src="{{ asset('public/astrology_assets/dashboard/images/d2.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5>{{$sum_total_chat}}</h5>
                                    <p class="mb-0">Total Chat</p>
                                </div>
                                <div class="col-auto">
                                    <div class="dicon">
                                        <img src="{{ asset('public/astrology_assets/dashboard/images/d3.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5>{{$sum_call_chat}}</h5>
                                    @if(Auth::guard('users')->user()->user_type ==1)
                                    <p class="mb-0">Total Spend</p>
                                    @else
                                    <p class="mb-0">Total Income</p>


                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="dicon">
                                        <img src="{{ asset('public/astrology_assets/dashboard/images/d4.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
               
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header with-border">
                            
                            @if(Auth::guard('users')->user()->user_type ==1)
                            <h4 class="card-title">Total Spend</h4>
                                    @else
                                    <h4 class="card-title">Total Income </h4>


                                    @endif
                        </div>
                        <div class="card-body">
                            <canvas id="chDonut1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row mt-4 ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Responsive Hover Table <a href="#" class="pull-right">See All</a>
                            </h4>

                        </div>
                      <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Amount Type</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Amount</th>

                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)"> #123456</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td>Credit</td>
                                            <td>Google pay</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16,
                                                    2017</span> </td>
                                            <td>02:38 PM</td>
                                            <td>$158.00</td>

                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)"> #458789</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td>Credit</td>
                                            <td>Google pay</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16,
                                                    2017</span> </td>
                                            <td>02:38 PM</td>
                                            <td>$55.00</td>

                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)"> #84532</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td>Credit</td>
                                            <td>Google pay</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16,
                                                    2017</span> </td>
                                            <td>02:38 PM</td>
                                            <td>$845.00</td>

                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)"> #48956</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td>Credit</td>
                                            <td>Google pay</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16,
                                                    2017</span> </td>
                                            <td>02:38 PM</td>
                                            <td>$145.00</td>

                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)"> #92154</a></td>
                                            <td>Lorem Ipsum</td>
                                            <td>Credit</td>
                                            <td>Google pay</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16,
                                                    2017</span> </td>
                                            <td>02:38 PM</td>
                                            <td>$450.00</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                     
                    </div>
                  
                </div>
            </div> -->
        </div>
@include('layouts.dashboard.footer')

<script>

var colors = ['#FE8302', '#f7bb80', '#984F01', '#c3e6cb', '#dc3545', '#6c757d'];
var call_income={{$call_sum}}
var chat_income={{$chat_sum}}
var total_income={{$sum_call_chat}}

/* bar chart */
var chBar = document.getElementById("chBar");

var donutOptions = {
    cutoutPercentage: 55,
    legend: {
        position: 'bottom',
        padding: 5,
        labels: {
            pointStyle: 'circle',
            usePointStyle: true
        }
    }
};

var labels= ['Total Call Income', 'Total Chat Income', 'Total Income']
<?php  if(Auth::guard('users')->user()->user_type==1){?>
var labels= ['Total Call Spend', 'Total Chat Spend', 'Total Spend']

    <?php } ?>
// donut 1
var chDonutData1 = {
    labels: labels,
    datasets: [{
        backgroundColor: colors.slice(0, 3),
        borderWidth: 0,
        data: [call_income, chat_income, total_income]
    }]
};

var chDonut1 = document.getElementById("chDonut1");
if (chDonut1) {
    new Chart(chDonut1, {
        type: 'pie',
        data: chDonutData1,
        options: donutOptions
    });
}
</script>
