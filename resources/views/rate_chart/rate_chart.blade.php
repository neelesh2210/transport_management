@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rate Chart Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Register</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('data')!='')
              <div class="alert alert-success" role="alert">
                {{Session::get('data')}}
            </div>
            @endif
            @if(isset($edit_data['id']))
            
              <form role="form" method="POST" action="{{route('rate_chart.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('rate_chart.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Plant Code</label>
                   
                    <input type="text" name="plant_code" class="form-control" id="exampleInputEmail1" placeholder=" Enter Plant Code" value="@if(isset($edit_data['plant_code'])){{ $edit_data['plant_code'] }}@endif">
                    </div>
                  </div>
                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">City Code</label>
                   
                    <input type="text" name="city_code" class="form-control" id="exampleInputEmail1" placeholder="Enter City Code" value="@if(isset($edit_data['city_code'])){{ $edit_data['city_code'] }}@endif">
                    </div>
                  </div>
                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Destination</label>
                   
                    <input type="text" name="destination" class="form-control" id="exampleInputEmail1" placeholder="Enter Destination" value="@if(isset($edit_data['destination'])){{ $edit_data['destination'] }}@endif">
                    </div>
                  </div>
                 
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Freight</label>
                   
                    <input type="text" name="freight" class="form-control" id="exampleInputEmail1" placeholder="Enter Freight" value="@if(isset($edit_data['freight'])){{ $edit_data['freight'] }}@endif">
                    </div>
                  </div>
                  
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Wheel</label>
                   
                    <input type="text" name="wheel" class="form-control" id="exampleInputEmail1" placeholder="Enter Wheel" value="@if(isset($edit_data['wheel'])){{ $edit_data['wheel'] }}@endif">
                    </div>
                  </div>
                  
                   <div class="col-md-4 col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                           <option>Select Status</option>
                          <option value="enable" @if(isset($edit_data['status']) && $edit_data['status']== 'enable'){{ 'selected' }}@endif >Enable</option>
                          <option value="disable" @if(isset($edit_data['status']) && $edit_data['status']== 'disable'){{ 'selected' }}@endif>Disable</option>
                        </select>
                      </div>
                    </div>
                    <input type="hidden" name="add_by" class="form-control" id="exampleInputPassword1" placeholder=" " value="{{Auth::user()->id}}">
                  </div>

                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Choose Excel File</label>
                        <input type="file" name="file" class="form-control" id="exampleInputEmail1" placeholder=" " />
                    </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</section>

            
            
</div>

  @include('layout/footer')