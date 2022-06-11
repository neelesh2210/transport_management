

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Truck Registration Form</h1>
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
            
              <form role="form" method="POST" action="{{route('truck.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('truck.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Truck Number*</label>
                   
                    <input type="text" name="vechile_number" class="form-control" id="exampleInputEmail1" placeholder=" Enter Truck Number" value="@if(isset($edit_data['vechile_number'])){{ $edit_data['vechile_number'] }}@endif" required>
                    </div>
                  </div>
                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Type*</label>
                   
                    <input type="text" name="vechile_type" class="form-control" id="exampleInputEmail1" placeholder="Enter Vehicle Type" value="@if(isset($edit_data['vechile_type'])){{ $edit_data['vechile_type'] }}@endif" required>
                    </div>
                  </div>
                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Make</label>
                   
                    <input type="text" name="vechile_make" class="form-control" id="exampleInputEmail1" placeholder="Enter Vehicle Make" value="@if(isset($edit_data['vechile_make'])){{ $edit_data['vechile_make'] }}@endif">
                    </div>
                  </div>
                 
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Make Year</label>
                   
                    <input type="text" name="make_year" class="form-control" id="exampleInputEmail1" placeholder="Enter Make Year" value="@if(isset($edit_data['make_year'])){{ $edit_data['make_year'] }}@endif">
                    </div>
                  </div>
                  
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Chassis Number</label>
                   
                    <input type="text" name="chassis_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Chassis Number" value="@if(isset($edit_data['chassis_number'])){{ $edit_data['chassis_number'] }}@endif">
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Engine Number</label>
                   
                    <input type="text" name="engine_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Engine Number" value="@if(isset($edit_data['engine_number'])){{ $edit_data['engine_number'] }}@endif">
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Gross Capacity</label>
                   
                    <input type="text" name="gross_capicity" class="form-control" id="exampleInputEmail1" placeholder="Enter Gross Capacity" value="@if(isset($edit_data['gross_capicity'])){{ $edit_data['gross_capicity'] }}@endif">
                    </div>
                  </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Unladen Weight</label>
                   
                    <input type="text" name="unladen_weight" class="form-control" id="exampleInputEmail1" placeholder="Enter Unladen Weight" value="@if(isset($edit_data['unladen_weight'])){{ $edit_data['unladen_weight'] }}@endif">
                    </div>
                </div>
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Permissable</label>
                   
                    <input type="text" name="permissable" class="form-control" id="exampleInputEmail1" placeholder="Enter Permissable" value="@if(isset($edit_data['permissable'])){{ $edit_data['permissable'] }}@endif">
                    </div>
                </div>
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Normal Load</label>
                   
                    <input type="text" name="normal_load" class="form-control" id="exampleInputEmail1" placeholder="Enter Normal Load" value="@if(isset($edit_data['normal_load'])){{ $edit_data['normal_load'] }}@endif">
                    </div>
                </div>
        
                <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Vehicle Owner*</label>
                    <select name="owner_id" class="form-control select2" style="width: 100%;" required>
                 
                   @foreach($data as $item)
                     <option value="{{$item->id}}" @if(isset($edit_data['id']) && $edit_data['id']==$item->id){{ 'selected' }}@endif>{{$item->ownwer_name}}</option>
                   @endforeach
                  
                  </select>
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