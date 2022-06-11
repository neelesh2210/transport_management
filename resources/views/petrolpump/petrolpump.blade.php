@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Petrol Pump Registration Form</h1>
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

                                <input type="text" name="petrolpump_mobile_no[]" class="form-control"
                                    id="exampleInputEmail1" placeholder="Enter Petrol Pump Mobile Number" value="">

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

                        <form role="form" method="POST" action="{{route('petrol_pump.update',$edit_data['id'])}}"
                            enctype="multipart/form-data">
                            @method('PUT')

                            @endif
                            @if(empty($edit_data['id']))
                            <form role="form" method="POST" action="{{route('petrol_pump.store')}}"
                                enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="card-body">

                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Petrol Pump Name*</label>

                                                <input type="text" name="petrolpump_name" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Petrol Pump Name"
                                                    value="@if(isset($edit_data['petrolpump_name'])){{ $edit_data['petrolpump_name'] }}@endif"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>

                                                <input type="text" name="petrolpump_address" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Address"
                                                    value="@if(isset($edit_data['petrolpump_address'])){{ $edit_data['petrolpump_address'] }}@endif">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Branch*</label>
                                                <select name="branch" id="branch" class="form-control select2"
                                                    style="width: 100%;" rerquired>
                                                    <option value="">Select</option>
                                                    @foreach($comp as $item)
                                                    <option value="{{$item->id}}" @if(isset($edit_data['branch']) &&
                                                        $edit_data['branch']==$item->id){{ 'selected'
                                                        }}@endif>{{$item->company_branch_name}}
                                                        ({{$item->company_branch_code}})</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Add Amount</label>
                                                
                                                <input type="number" name="amount" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter Add Amount"
                                                    value="@if(isset($edit_data['amount'])){{ $edit_data['amount'] }}@endif">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Amount Type</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary">
                                                            <input type="radio" id="due" name="amount_type" value="due" @if(isset($edit_data['amount_type']) && $edit_data['amount_type']== 'due') checked @else checked @endif>
                                                            <label for="due"> Due </label>
                                                        </div>
                                                        <div class="icheck-primary">
                                                            <input type="radio" id="advance" name="amount_type" value="advance" @if(isset($edit_data['amount_type']) && $edit_data['amount_type']== 'advance') checked @endif>
                                                            <label for="advance"> Advance </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Add Slip Number Range</label>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="number" name="start_range" class="form-control"
                                                    id="start_range" placeholder="Enter Start Range"
                                                    value="@if(isset($edit_data['start_range'])){{ $edit_data['start_range'] }}@endif" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="number" name="end_range" class="form-control"
                                                    id="end_range" placeholder="Enter End Range"
                                                    value="@if(isset($edit_data['end_range'])){{ $edit_data['end_range'] }}@endif" onchange="check_range()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
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
                                        
                                        
                                        <input type="hidden" name="add_by" class="form-control"
                                            id="exampleInputPassword1" placeholder=" " value="{{Auth::user()->id}}">
                                    </div>

                                

                                    @if(!empty($edit_data['petrolpump_mobile_no']))
                                
                                    @foreach($edit_data['petrolpump_mobile_no'] as $petrol_pump_number)
                                        <div id="bank_detail_div">
    
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Petrol Pump Mobile Number</label>
    
                                                    <input type="text" name="petrolpump_mobile_no[]" class="form-control"
                                                        id="exampleInputEmail1"
                                                        placeholder="Enter Petrol Pump Mobile Number"
                                                        value="{{$petrol_pump_number}}">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="card-body">
                                        <a class="btn btn-primary" id="add_button">+</a>

                                        <div id="bank_detail_append">

                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </form>
                        </div>
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
    
    function check_range(){
        var start_range = $("#start_range").val();
        $("#start_range").attr('readonly', true);
        var end_range = $("#end_range").val();
        if(parseInt(start_range) > parseInt(end_range)){
            alert("Invalid Number");
            $("#start_range").attr('readonly', false);
            $("#end_range").val('');
        }
    }

</script>
@include('layout/footer')