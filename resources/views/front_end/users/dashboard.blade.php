@include('layouts.dashboard.header')
<div class="dashboard_cont">
            <div class="row g-6 mb-6">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5>95</h5>
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
                </div>
            </div>
            <div class="row mt-4">
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
            </div>
            <div class="row mt-4 ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h4 class="card-title">Responsive Hover Table <a href="#" class="pull-right">See All</a>
                            </h4>

                        </div>
                        <!-- /.box-header -->
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
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
@include('layouts.dashboard.footer')
