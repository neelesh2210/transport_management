@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Branch</li>
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
                            <h3 class="card-title">Edit Branch</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('branch.update',$data->id) }}" enctype="multipart/form-data" class="valid_form">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="company_id">Company Name<span class="red">*</span></label>
                                            <select name="company_id" id="company_id" class="select2" style="width: 100%;" required>
                                                <option value="">Select Company</option>
                                                @foreach (App\Companie::where('delete_status', 0)->where('status', 1)->orderBy('company_name', 'asc')->get() as $company)
                                                    <option value="{{ $company->id }}" @if (old('company_id',$data->company_id) == $company->id) selected @endif>
                                                        {{ $company->company_name }} ({{ $company->company_code }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="branch_name">Brnach Name<span class="red">*</span></label>
                                            <input type="text" name="branch_name" class="form-control" id="branch_name" placeholder="Enter Brnach Name" value="{{ old('branch_name',$data->branch_name) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="branch_code">Brnach Code<span class="red">*</span></label>
                                            <input type="text" name="branch_code" class="form-control" id="branch_code" placeholder="Brnach Code" value="{{ old('branch_code',$data->branch_code) }}" required>
                                            @if ($errors->has('branch_code'))
                                                <div class="error red">{{ $errors->first('branch_code') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="branch_address">Branch Address<span class="red">*</span></label>
                                            <input type="text" name="branch_address" class="form-control" id="branch_address" placeholder="Branch Address" value="{{ old('branch_address',$data->branch_address) }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label>Material<span class="red">*</span></label>
                                            <select name="material[]" id="material" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required>
                                                @foreach (App\Material::where('delete_status', 0)->where('status', 1)->orderBy('name','asc')->get() as $material)
                                                    <option value="{{ $material->id }}" @if(in_array($material->id,explode(',',$data->material_id))) selected @endif>{{ $material->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div style="margin-top: 32px;margin-left: -7px;">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> +</button>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="material_name">Material Name<span class="red">*</span></label>
                    <input type="text" class="form-control" id="material_name" placeholder="Material Name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 61%;">Close</button>
                    <button type="button" id="save_button" class="btn btn-primary" data-dismiss="modal">Add Material</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#save_button").click(function() {
        var option_value = $('#material_name').val();
        $.ajax({
            type: 'POST',
            url: '{{route("material.store")}}',
            data: {
                _token: '{{ csrf_token() }}',
                material: option_value,
            },
            success: function(data) {
                $('#material').empty();
                $.each(data,function(key, value)
                {
                    $('#material').append('<option value=' + value.id + '>' + value.name + '</option>'); // return empty
                });
                $('#material_name').val('');
            }
        });
    });
</script>

@include('layout/footer')

