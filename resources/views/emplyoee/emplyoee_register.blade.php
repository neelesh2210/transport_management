@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Emplyoee Registration Form</h1>
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
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->

                        @if(isset($edit_data['id']))
                            <form role="form" method="POST" action="{{route('emplyoee.update',$edit_data['id'])}}"
                                enctype="multipart/form-data">
                                @method('PUT')

                        @endif
                        @if(empty($edit_data['id']))
                            <form role="form" method="POST" action="{{route('emplyoee.store')}}"
                                enctype="multipart/form-data">
                        @endif
                            @csrf
                            <div class="card-body">

                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label>Company Name*</label>
                                                <select name="company_id" class="form-control select2"
                                                style="width: 100%;" required>
                                                <option selected disabled>Select</option>
                                                @foreach($data as $item)
                                                    <option value="{{$item->id}}" @if(isset($edit_data['company_id']) && $edit_data['company_id']==$item->company_id){{ 'selected' }}@endif >{{$item->company_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    {{--
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company Code*</label>
                                            <select name="company_code" class="form-control select2"
                                                style="width: 100%;" required>
                                                <option value="">Select</option>
                                                @foreach($data as $item)
                                                <option value="{{$item->company_code}}"
                                                    @if(isset($edit_data['company_code']) &&
                                                    $edit_data['company_code']==$item->company_code){{ 'selected'
                                                    }}@endif>{{$item->company_code}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company Location</label>
                                            <select name="company_location" class="form-control select2"
                                                style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach($data as $item)
                                                <option value="{{$item->company_location}}"
                                                    @if(isset($edit_data['company_location']) &&
                                                    $edit_data['company_location']==$item->company_location){{
                                                    'selected' }}@endif>{{$item->company_location}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company Branch Name</label>
                                            <select name="company_branch_name" class="form-control select2"
                                                style="width: 100%;">

                                                @foreach($data as $item)
                                                <option value="{{$item->company_name}}"
                                                    @if(isset($edit_data['company_branch_name']) &&
                                                    $edit_data['company_branch_name']==$item->company_branch_name){{
                                                    'selected' }}@endif>{{$item->company_branch_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company Branch Code</label>
                                            <select name="company_branch_code" class="form-control select2"
                                                style="width: 100%;">

                                                @foreach($data as $item)
                                                    <option value="{{$item->company_branch_code}}" @if(isset($edit_data['company_branch_code']) && $edit_data['company_branch_code']==$item->company_branch_code){{'selected' }}@endif>{{$item->company_branch_code}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company Branch Location</label>
                                            <select name="company_branch_location" class="form-control select2"
                                                style="width: 100%;">
                                                @foreach($data as $item)
                                                    <option value="{{$item->company_branch_location}}" @if(isset($edit_data['company_branch_location']) && $edit_data['company_branch_location']==$item->company_branch_location){{ 'selected' }}@endif>{{$item->company_branch_location}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    --}}
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Emplyoee Type*</label>
                                            <select name="emplyoee_type" class="form-control select2"
                                                style="width: 100%;" required>


                                                <option value="regular" @if(isset($edit_data['emplyoee_type']) &&
                                                    $edit_data['emplyoee_type']=='regular' ){{ 'selected' }}@endif>
                                                    REGULAR</option>
                                                <option value="intern" @if(isset($edit_data['emplyoee_type']) &&
                                                    $edit_data['emplyoee_type']=='intern' ){{ 'selected' }}@endif>
                                                    INTERN</option>
                                                <option value="trainee" @if(isset($edit_data['emplyoee_type']) &&
                                                    $edit_data['emplyoee_type']=='trainee' ){{ 'selected' }}@endif>
                                                    TRAINEE</option>
                                                <option value="on_contact" @if(isset($edit_data['emplyoee_type']) &&
                                                    $edit_data['emplyoee_type']=='on_contact' ){{ 'selected'
                                                    }}@endif>ON CONTACT</option>
                                                <option value="part_time" @if(isset($edit_data['emplyoee_type']) &&
                                                    $edit_data['emplyoee_type']=='part_time' ){{ 'selected'
                                                    }}@endif>PART TIME</option>
                                                <option value="freelancer" @if(isset($edit_data['emplyoee_type']) &&
                                                    $edit_data['emplyoee_type']=='freelancer' ){{ 'selected'
                                                    }}@endif>FREELANCER</option>




                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Email ID*</label>
                                            <input type="email" name="emplyoee_id" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Name"
                                                value="@if(isset($edit_data['emplyoee_id'])){{ $edit_data['emplyoee_id'] }}@endif"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Password*</label>
                                            <input type="password" name="emplyoee_password" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Name"
                                                value="@if(isset($edit_data['emplyoee_password'])){{ $edit_data['emplyoee_password'] }}@endif"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Role *</label>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option>SELECT STATUS</option>
                                                <option value="enable" @if(isset($edit_data['status']) &&
                                                    $edit_data['status']=='enable' ){{ 'selected' }}@endif>ENABLE
                                                </option>
                                                <option value="disable" @if(isset($edit_data['status']) &&
                                                    $edit_data['status']=='disable' ){{ 'selected' }}@endif>DISABLE
                                                </option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="add_by" class="form-control"
                                            id="exampleInputPassword1" placeholder=" " value="{{Auth::user()->id}}">
                                    </div>


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