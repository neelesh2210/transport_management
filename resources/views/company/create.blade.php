@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Company</li>
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
                            <h3 class="card-title">Add Company</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data" class="valid_form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="company_name">Company Name<span class="red">*</span></label>
                                            <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter Name" value="{{ old('company_name') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="company_code">Company Code<span class="red">*</span></label>
                                            <input type="text" name="company_code" class="form-control" id="company_code" placeholder="Company Code" value="{{ old('company_code') }}" required>
                                            @if($errors->has('company_code'))
                                                <div class="error red">{{ $errors->first('company_code') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="company_address">Company Address<span class="red">*</span></label>
                                            <input type="text" name="company_address" class="form-control" id="company_address" placeholder="Company Address" value="{{ old('company_address') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="company_gstin">Company GSTIN</label>
                                            <input type="text" name="company_gstin" class="form-control" id="company_gstin" placeholder="Company GSTIN" value="{{ old('company_gstin') }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="company_logo">Company Logo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" accept="image/*" class="custom-file-input" id="company_logo" onchange="loadFile(event)" name="company_logo">
                                                    <label class="custom-file-label" for="company_logo">Choose Logo</label>
                                                    <div class="fakefile"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <span class="form-control-custom">
                                            <label></label>
                                            <img src="https://trustkaro.com/public/select.png" id="output" style="width: 150px;height: 150px;"/>
                                            <a> <i style="font-size:24px;position: absolute;margin-left: -9px;margin-top: -11px;color: red;" class="fa" type="button" onclick="ClearFields();">&#xf00d;</i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Add</button>
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
    function ClearFields() {
        document.getElementById("company_logo").value = "";
        document.getElementById("output").src = "https://trustkaro.com/public/select.png";
    }
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>

@include('layout/footer')
