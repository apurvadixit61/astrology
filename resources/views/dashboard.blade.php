<style type="text/css">
     .chart1{ background: #00bbff; }
.chart2{background: #fe5200}
.chart3{background: #fe971e}
.chart4{background: #0052cc}
.chart-p circle,.chart-p text{display: none;}
#line-chart1 > svg,#line-chart > svg,#line-chart3 > svg,#line-chart4 > svg{height: 60px !important; width: 100% !important}
.chart-p .box-body { padding: 5px; }
.dashboard_bar .chart-p {
    color: #fff;
}
.box.bar_detail li {
    display: inline-block;
    width: 31%;
    position: relative;
}.bar_detail li h6 {
    margin-bottom: 0;
}.box.bar_detail li p {
    margin: 0;
}.bar_detail ul {
    padding: 0;
}.box.bar_detail li::before {
    position: absolute;
    content: "";
    width: 1px;
    height: 100%;
    background: #000;
    left: 0;
    opacity: .1;
}.box.bar_detail li:first-child:before{display: none;}
</style>
<div class="content-wrapper" style="padding-top: 0;">
      <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box no-shadow mb-0 bg-transparent">
                        <div class="box-header no-border px-0">
                            <h4 class="box-title">Dashboard</h4>

                        </div>
                    </div>
                    <div class="row dashboard_bar total_item">
                                <div class="col-xl-3 col-12">
                                    <div class="box chart-p chart1">
                                        <div class="box-body ">
                                            <div class="row"><div class="col-md-6">Total Astrologer</div><div class="col-md-6 text-right">{{ $countAstro[0]->total_astrologer }}</div></div>
                                            <div id="line-chart"></div>
                                        </div>
                                    </div>
                                  <!-- <div class="box bar_detail text-center">
                                        <div class="box-body">
                                            <h6>Top astrologer</h6>
                                            <ul>
                                                <li><h6>980</h6><p>USA</p></li>
                                                <li><h6>980</h6><p>Turky</p></li>
                                                <li><h6>980</h6><p>India</p></li>
                                            </ul>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="col-xl-3 col-12">
                                    <div class="box chart-p chart2">
                                        <div class="box-body">
                                            <div class="row"><div class="col-md-6">Total Customer</div><div class="col-md-6 text-right">{{ $countCustomer[0]->total_customer }}</div></div>
                                            <div id="line-chart1"></div>
                                        </div>
                                    </div>
                                   <!-- <div class="box bar_detail text-center">
                                        <div class="box-body">
                                            <h6>Top Customer</h6>
                                            <ul>
                                                <li><h6>980</h6><p>USA</p></li>
                                                <li><h6>980</h6><p>Turky</p></li>
                                                <li><h6>980</h6><p>India</p></li>
                                            </ul>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="col-xl-3 col-12">
                                    <div class="box chart-p chart3">
                                        <div class="box-body">
                                            <div class="row"><div class="col-md-6">Notifications</div><div class="col-md-6 text-right">{{ $countNotification[0]->total_notification }}</div></div>
                                            <div id="line-chart3"></div>
                                        </div>
                                    </div>
                                   <!-- <div class="box bar_detail text-center">
                                        <div class="box-body">
                                            <h6>Top Revenue</h6>
                                            <ul>
                                                <li><h6>980</h6><p>USA</p></li>
                                                <li><h6>980</h6><p>Turky</p></li>
                                                <li><h6>980</h6><p>India</p></li>
                                            </ul>
                                        </div>
                                    </div>-->
                                </div>
                                 <div class="col-xl-3 col-12">
                                    <div class="box chart-p chart4">
                                        <div class="box-body">
                                            <div class="row"><div class="col-md-8">Total Kundali Generate</div><div class="col-md-4 text-right">{{ $countKundli[0]->total_kundli }}</div></div>
                                            <div id="line-chart4"></div>
                                        </div>
                                    </div>
                                   <!-- <div class="box bar_detail text-center">
                                        <div class="box-body">
                                            <h6>Top Kundali Generate</h6>
                                            <ul>
                                                <li><h6>980</h6><p>USA</p></li>
                                                <li><h6>980</h6><p>Turky</p></li>
                                                <li><h6>980</h6><p>India</p></li>
                                            </ul>
                                        </div>
                                    </div>-->
                                </div>
                        </div>

                </div>

                <div class="col-xl-12 mb-4">
                  <a href="#" data-toggle="modal" data-target="#add-users" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Astrologer</a>

                </div>
                <div class="col-xl-6">

                   <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Recent Astrologers</h4>
                  <div class="box-controls pull-right">
                    <div class="lookup lookup-circle lookup-right">
                      <input type="text" class="search_field" name="s" >
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="table-responsive">
                      <table id="example1" class="table table-hover fid_table" >
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>View</th>
                        </tr>
                         <?php
                                            if($Astro){ $i =1;
                                                    foreach($Astro as $user){
                                                    { ?>
                                                    <tr>
                                                     <td>{{ $i;}}</td>


                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone_no}}</td>
                                                    <td>
                                                   <!--<a class="ac_btn" href="{{url('astrologers/')}}" type="button" ><span class="badge badge-primary mr-5"><i class="fa fa-eye"></i></span></a>-->
                                                    <a class="ac_btn astroview" type="button" data-toggle="modal" data-target="#myModal" onclick="showUserDetailsAstro({{$user->id}})"><span class="badge badge-primary mr-5"><i class="fa fa-eye"></i></span></a>
                                                    </td>
                                                    </tr>
                                                    <?php  $i++;}}} ?>


                      </table>
                    </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
             <input type="button" class="closemmodaling" data-dismiss="modal" style="margin-left: -1%;" value="x">
<!--            <button type="button" class="closemmodaling" data-dismiss="modal" style="margin-left: -1%;">&times;</button>
-->            <h5 class="modal-title text-center">Show Astro Full Detail</h5>
         </div>
         <div class="modal-body">

         </div>
      </div>
   </div>
</div>
                <!-- /.box-body -->
              </div>

                </div>
                <div class="col-xl-6">
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Recent Users</h4>
                  <div class="box-controls pull-right">
                    <div class="lookup lookup-circle lookup-right">
                      <input type="text" class="search_fields" name="s">
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="table-responsive">
                      <table id="example" class="table table-hover fid_table1">
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>View</th>
                        </tr>
                         <?php
                                            if($Customer){ $i =1;
                                                    foreach($Customer as $user){
                                                    { ?>
                                                    <tr>
                                                     <td>{{ $i;}}</td>


                                                      <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone_no}}</td>
                                                    <td>
                                                   <a class="ac_btn" href="{{url('user/')}}" type="button" ><span class="badge badge-primary mr-5"><i class="fa fa-eye"></i></span></a>
                                                    </td>
                                                    </tr>
                                                    <?php  $i++;}}} ?>


                      </table>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            </div>
        </section>
        <!-- /.content -->
      </div>

  </div>
<script type="text/javascript">


function showUserDetailsAstro(postid){
  $.ajax({
                url : '{{ route("getastrodata") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{postid:postid},
                success:function(data){
                   console.log(data);
                $('.modal-body').html(data)

                },

            });

}
</script>