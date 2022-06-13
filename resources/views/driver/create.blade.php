

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver Registration Form</h1>
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

              <form role="form" method="POST" action="{{route('driver.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('driver.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-4" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Vechile Owner *</label>
                            <select class="form-control select2" name="vechile_owner_id" readonly>
                                <option selected disabled>Select Vechile Owner</option>
                                @foreach(\App\VechileOwner::get() as $VechileOwner)
                                    <option value="{{$VechileOwner->id}}" @if(isset($edit_data['vechile_owner_id']) && $edit_data['vechile_owner_id'] == $VechileOwner->id) selected @endif>{{$VechileOwner->ownwer_name}}</option>
                                @endforeach
                            </select>

                        </div>
                     </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver Name</label>

                    <input type="text" name="driver_name" class="form-control" id="exampleInputEmail1" placeholder="Driver Name" value="@if(isset($edit_data['driver_name'])){{ $edit_data['driver_name'] }}@endif">
                    </div>
                  </div>
                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver Address</label>

                    <input type="text" name="driver_address" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver Address" value="@if(isset($edit_data['driver_address'])){{ $edit_data['driver_address'] }}@endif">
                    </div>
                  </div>
                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver Mobile Number</label>

                    <input type="number" name="driver_mobile_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver Mobile Number" value="@if(isset($edit_data['driver_mobile_no'])){{ $edit_data['driver_mobile_no'] }}@endif">
                    </div>
                  </div>


                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver License Number</label>

                    <input type="text" name="driver_license_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver License Number" value="@if(isset($edit_data['driver_license_no'])){{ $edit_data['driver_license_no'] }}@endif">
                    </div>
                  </div>

                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver ID Number</label>

                    <input type="text" name="driver_id_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver ID Number" value="@if(isset($edit_data['driver_id_no'])){{ $edit_data['driver_id_no'] }}@endif">
                    </div>
                  </div>

                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Blood Group</label>

                    <select class="form-control" name="driver_blood_group">
                        <option selected >Select Blood Group</option>
                        <option value="a+" @if(isset($edit_data['driver_blood_group']) && $edit_data['driver_blood_group']== "a+") selected @endif>A+</option>
                        <option value="a-" @if(isset($edit_data['driver_blood_group']) && $edit_data['driver_blood_group']== "a-") selected @endif>A-</option>
                        <option value="b+" @if(isset($edit_data['driver_blood_group']) && $edit_data['driver_blood_group']== "b+") selected @endif>B+</option>
                        <option value="b-" @if(isset($edit_data['driver_blood_group']) && $edit_data['driver_blood_group']== "b-") selected @endif>B-</option>
                        <option value="o+" @if(isset($edit_data['driver_blood_group']) && $edit_data['driver_blood_group']== "o+") selected @endif>O+</option>
                        <option value="o-" @if(isset($edit_data['driver_blood_group']) && $edit_data['driver_blood_group']== "o-") selected @endif>O-</option>
                        <option value="ab+" @if(isset($edit_data['driver_blood_group']) && $edit_data['driver_blood_group']== "ab+") selected @endif>AB+</option>
                        <option value="ab-" @if(isset($edit_data['driver_blood_group']) && $edit_data['driver_blood_group']== "ab-") selected @endif>AB-</option>
                    </select>
                    </div>
                  </div>

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver License Expairy</label>

                    <input type="date" name="driver_license_expairy" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver License Expairy" value="@if(isset($edit_data['driver_license_expairy'])){{ $edit_data['driver_license_expairy'] }}@endif">
                    </div>
                  </div>

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Note</label>

                    <input type="text" name="note" class="form-control" id="exampleInputEmail1" placeholder="Enter Note" value="@if(isset($edit_data['note'])){{ $edit_data['note'] }}@endif">
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

                <div class="card-footer d-flex justify-content-center">
                    @if(isset($edit_data))
                    <button type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary">Add</button>
                  @endif
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</section>
</div>

  @include('layout/footer')
