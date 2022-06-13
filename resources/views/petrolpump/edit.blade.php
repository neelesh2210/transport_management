@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"> Petrol Pump</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Petrol Pump</h3>
                        </div>
                        <div style="display:none;">
                            <div class="form-group col-md-4" id="bank_detail_div">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile Number</label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input type="text" name="petrolpump_mobile_no[]" class="form-control" id="exampleInputEmail1" placeholder="Enter Petrol Pump Mobile Number" value="">
                                            </div>
                                            <div class="col-md-2" style="padding: 0px;">
                                                <a class="btn btn-danger"  id="delete_button" onclick="remove_div(this)" >-</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <form role="form" method="POST" action="{{route('petrol_pump.update',$data->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Petrol Pump Name<span class="red">*</span></label>
                                            <input type="text" name="petrolpump_name" class="form-control" id="exampleInputEmail1" value="{{$data->petrolpump_name}}" placeholder="Petrol Pump Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address<span class="red">*</span></label>
                                            <input type="text" name="petrolpump_address" class="form-control"id="exampleInputEmail1" value="{{$data->petrolpump_address}}" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Branch<span class="red">*</span></label>
                                            <select name="branch" id="branch" class="form-control select2" style="width: 100%;" rerquired>
                                                <option value="">Select</option>
                                                @foreach(App\Branch::where('delete_status',0)->where('status',1)->get() as $branch)
                                                    <option value="{{$branch->id}}" @if($data->branch == $branch->id) selected @endif>{{$branch->branch_name}}({{$branch->branch_code}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="amount">Add Amount</label>
                                            <input type="number" name="amount" class="form-control" id="amount" value="{{$data->amount}}" placeholder="Enter Add Amount">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Amount Type</label>
                                            <div class="col-sm-6">
                                                <div class="form-group clearfix">
                                                    <div class="row">
                                                        <div class="icheck-primary col-md-6">
                                                            <input type="radio" id="due" name="amount_type" value="due" @if($data->amount_type == 'due')checked @endif>
                                                            <label for="due"> Due </label>
                                                        </div>
                                                        <div class="icheck-primary col-md-6">
                                                            <input type="radio" id="advance" value="advance" name="amount_type" @if($data->amount_type == 'advance')checked @endif>
                                                            <label for="advance"> Advance </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Start Slip Number<span class="red">*</span></label>
                                                <input type="number" name="start_range" class="form-control" id="start_range" value="{{$data->start_range}}" placeholder="Enter Start Range">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">End Slip Number<span class="red">*</span></label>
                                                <input type="number" name="end_range" class="form-control" id="end_range" value="{{$data->end_range}}" placeholder="Enter End Range">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="bank_detail_append">
                                    @foreach($data->petrolpump_mobile_no as $key=>$mobile_number)
                                        <div class="form-group col-md-4" @if($key!=0) id="bank_detail_div" @endif>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mobile Number</label>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" name="petrolpump_mobile_no[]" class="form-control" value="{{$mobile_number}}" id="exampleInputEmail1" placeholder="Enter Petrol Pump Mobile Number" value="">
                                                    </div>
                                                    <div class="col-md-2" style="padding: 0px;">
                                                        @if($key == 0)
                                                            <a class="btn btn-primary" id="add_button">+</a>
                                                        @else
                                                            <a class="btn btn-danger"  id="delete_button" onclick="remove_div(this)" >-</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
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
            $("#bank_detail_div").clone().appendTo('#bank_detail_append')
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
