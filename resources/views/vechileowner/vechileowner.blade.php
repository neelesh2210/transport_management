@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vehicle Owner Registration Form</h1>
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
                        <div style="display:none;">
                            <div class="row" id="bank_detail_div">

                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Holder Name</label>

                                        <input type="text" name="account_holder_name[]" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Account Holder Name"
                                            value="@if(isset($edit_data['account_holder_name'])){{ $edit_data['account_holder_name'] }}@endif">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Number</label>

                                        <input type="text" name="account_number[]" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Account Number"
                                            value="@if(isset($edit_data['account_number'])){{ $edit_data['account_number'] }}@endif">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">IFSC Code</label>

                                        <input type="text" name="ifsc_code[]" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter IFSC Code"
                                            value="@if(isset($edit_data['ifsc_code'])){{ $edit_data['ifsc_code'] }}@endif">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if(Session::get('data')!='')
                        <div class="alert alert-success" role="alert">
                            {{Session::get('data')}}
                        </div>
                        @endif
                        @if(isset($edit_data['id']))

                        <form role="form" method="POST" action="{{route('vechile_owner.update',$edit_data['id'])}}"
                            enctype="multipart/form-data">
                            @method('PUT')

                            @endif
                            @if(empty($edit_data['id']))
                            <form role="form" method="POST" action="{{route('vechile_owner.store')}}"
                                enctype="multipart/form-data">
                                @endif
                                @csrf

                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Vehicle Owner Name</label>

                                                <input type="text" name="ownwer_name" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Vehicle Owner Name"
                                                    value="@if(isset($edit_data['ownwer_name'])){{ $edit_data['ownwer_name'] }}@endif">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ownership Type</label>

                                                <input type="text" name="ownership_type" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Ownership Type"
                                                    value="@if(isset($edit_data['ownership_type'])){{ $edit_data['ownership_type'] }}@endif">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone1</label>

                                                <input type="text" name="owner_phone_first" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Phone1"
                                                    value="@if(isset($edit_data['owner_phone_first'])){{ $edit_data['owner_phone_first'] }}@endif">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone2</label>

                                                <input type="text" name="owner_phone_second" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Phone2"
                                                    value="@if(isset($edit_data['owner_phone_second'])){{ $edit_data['owner_phone_second'] }}@endif">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Whatsapp</label>

                                                <input type="text" name="owner_whatsapp" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Whatsapp"
                                                    value="@if(isset($edit_data['owner_whatsapp'])){{ $edit_data['owner_whatsapp'] }}@endif">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>

                                                <input type="text" name="owner_email" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Email"
                                                    value="@if(isset($edit_data['owner_email'])){{ $edit_data['owner_email'] }}@endif">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>

                                                <input type="text" name="owner_address" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Address"
                                                    value="@if(isset($edit_data['owner_address'])){{ $edit_data['owner_address'] }}@endif">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option>Select Status</option>
                                                    <option value="enable" @if(isset($edit_data['status']) &&
                                                        $edit_data['status']=='enable' ){{ 'selected' }}@endif>Enable
                                                    </option>
                                                    <option value="disable" @if(isset($edit_data['status']) &&
                                                        $edit_data['status']=='disable' ){{ 'selected' }}@endif>Disable
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Aadhar Number</label>

                                                <input type="text" name="aadhar_no" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Aadhar Number"
                                                    value="@if(isset($edit_data['aadhar_no'])){{ $edit_data['aadhar_no'] }}@endif">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Aadhar Front Photo</label>

                                                <input type="file" name="aadhar_front_photo" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Aadhar Back Photo</label>

                                                <input type="file" name="aadhar_back_photo" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pan Card Number</label>

                                                <input type="text" name="pan_card_no" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Pan Card Number"
                                                    value="@if(isset($edit_data['pan_card_no'])){{ $edit_data['pan_card_no'] }}@endif">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pan Card Front Photo</label>

                                                <input type="file" name="pan_card_front_photo" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pan Card Back Photo</label>

                                                <input type="file" name="pan_card_back_photo" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="add_by" class="form-control"
                                            id="exampleInputPassword1" placeholder=" " value="{{Auth::user()->id}}">
                                    </div>

                                </div>
                                @if(!empty($bank_details) && count($bank_details)>0)
                                <div class="card-body">
                                    @foreach($bank_details as $bankdetail)
                                    <div class="row" id="bank_detail_div">

                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Account Holder Name</label>

                                                <input type="text" name="account_holder_name[]" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Account Holder Name"
                                                    value="{{$bankdetail->account_holder_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Account Number</label>

                                                <input type="text" name="account_number[]" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Account Number"
                                                    value="{{$bankdetail->account_number}}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">IFSC Code</label>

                                                <input type="text" name="ifsc_code[]" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter IFSC Code"
                                                    value="{{$bankdetail->ifsc_code}}">
                                            </div>
                                        </div>
                                        <div> <a class="btn btn-danger" id="delete_button"
                                                onclick="remove_div(this)">-</a> </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                <div class="card-body">
                                    <a class="btn btn-primary" id="add_button">+</a>

                                    <div id="bank_detail_append">

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#add_button").click(function () {
            $("#bank_detail_div").clone().appendTo('#bank_detail_append').append('<div> <a class="btn btn-danger"  id="delete_button" onclick="remove_div(this)" >-</a> </div>');
        });
    });

    function remove_div(e) {
        e.closest('#bank_detail_div').remove();
    }

</script>


@include('layout/footer')