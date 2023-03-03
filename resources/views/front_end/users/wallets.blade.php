@include('layouts.dashboard.header')
<div class="dashboard_cont">
            <div class="row g-6 mb-6">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5>@if(empty($wallets))0 @else₹{{$wallets}}@endif</h5>
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Wallet Amount</span>
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
                <!-- <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5>95</h5>
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
                                    <h5>95</h5>
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
                                    <h5>$5728</h5>
                                    <p class="mb-0">Total Income</p>
                                </div>
                                <div class="col-auto">
                                    <div class="dicon">
                                        <img src="{{ asset('public/astrology_assets/dashboard/images/d4.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">2020 years <span class="pull-right"><i class="fas fa-circle"></i>
                                    Income</span> <span class="pull-right me-3 user-color"><i class="fas fa-circle"></i>
                                    User</span></h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chBar"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Total Income </h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chDonut1"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row mt-4 ">
            @if(!empty($wallet_data))

                <div class="col-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Recharge History <a href="#" class="pull-right"></a>
                            </h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Id</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Amount Type</th>
                                            <th>Date</th>
                                            <th>Time</th>

                                        </tr>
                                       @foreach($wallet_data as $key=> $wallet)

                                        <tr>
                                            <td><a href="javascript:void(0)"> #{{$key+1}}</a></td>
                                            <td>₹{{$wallet->wallet_amount}}</td>
                                            <td>Online</td>
                                            <td>Razorpay  pay</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{explode(' ',$wallet->currents_date)[0]}}</span> </td>
                                            <td>{{explode(' ',$wallet->currents_date)[1]}}</td>

                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                @else

                <div class="col-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Payment Received <a href="#" class="pull-right"></a>
                            </h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Id</th>
                                            <th>Amount</th>
                                            <th>From</th>
                                            <th>Amount Type</th>
                                            <th>Date</th>
                                            <th>Time</th>

                                        </tr>
                                       @foreach($payments_data as $key=> $wallet)

                                        <tr>
                                            <td><a href="javascript:void(0)"> #{{$key+1}}</a></td>
                                            <td>₹{{$wallet->wallet_amount}}</td>
                                            <td>{{$wallet->name}}</td>
                                            <td class="text-success">Received</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{explode(' ',$wallet->created_at)[0]}}</span> </td>
                                            <td>@if($wallet->created_at =='') @else{{explode(' ',$wallet->created_at)[1]}}@endif</td>

                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


                @endif


                @if(!empty($deduction_data))
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Deduction Amount <a href="#" class="pull-right"></a>
                            </h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Id</th>
                                            <th>Amount</th>
                                            <th>From</th>
                                            <th>Amount Type</th>
                                            <th>Date</th>
                                            <th>Time</th>

                                        </tr>
                                       @foreach($deduction_data as $key=> $wallet)

                                        <tr>
                                            <td><a href="javascript:void(0)">{{$key+1}} </a></td>
                                            <td>₹{{$wallet->wallet_amount}}</td>
                                            <td>{{$wallet->name}}</td>
                                            <td class="text-danger">Deduct</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{explode(' ',$wallet->created_at)[0]}}</span> </td>
                                            <td>@if($wallet->created_at =='') @else{{explode(' ',$wallet->created_at)[1]}}@endif</td>

                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                @endif

            </div>
        </div>
@include('layouts.dashboard.footer')
