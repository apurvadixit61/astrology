@include('layouts.header')

  
<style>
tbody tr td:last-child {
    text-align: left !important;
}
</style>


   <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">permission</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                      
                  @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
<div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Set Permission</h4>
                                   
                                </div>
                              
                            

  <section class="form">
  <div class="">
    <form method="POST" action="{{url('post_permission')}}" enctype="multipart/form-data">
     {{ csrf_field() }}

      <div class="col-md-4 pull-right">
          <div style="margin-bottom: 14px">
              <select class="form-control selectpicker" id="group_id" name="group_id">
                <option value="">Please select</option>
                    <?php foreach ($users_type as $key=>$username): ?>
                     <option value="<?php echo $username->id; ?>" <?php
                                        if (isset($group_id) && Input::old('group_id') == $username->name)
                                        {
                                            echo 'selected="selected"';
                                        }
                                        ?>>
                                        <?php  echo $username->name; ?></option>
                                        <?php endforeach; ?>
                                </select>
      </div>
      @if ($errors->has('group_id'))
                      <span class="text-danger">{{ $errors->first('group_id') }}</span>
         @endif
   </div>
      <table class="table table-striped table-bordered">
      
    <tbody>
       <tr>
        <td><span class="menu-text">Permission</span></td>
        <td><span class="menu-text">Yes</span></td>
        <td><span class="menu-text">No</span></td>
      <tr>
        <td class="col-sm-2">User List</td>
        <td class="col-sm-2">
          <label class="custom-control-label">
               <input type="radio" name="users" value="1">
           </label>
         </td>
         
        <td>
          <label class="custom-control-label">
            <input type="radio" name="users" value="0"> 
          </label>
        </td>
      </tr>

       </tbody>
  </table>
  <br>
  <button type="submit" class="btn btn-lg btn-primary">Submit</button>

    </form>

  </div>

</section>
</div>
</div>
</div>
                          </div>
</div>
                      </div>

@include('layouts.footer')