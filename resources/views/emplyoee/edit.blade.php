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
                        <li class="breadcrumb-item active">Employee</li>
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
                            <h3 class="card-title">Register Employee</h3>
                        </div>
                            <form role="form" method="POST" action="{{route('emplyoee.store')}}" enctype="multipart/form-data" class="valid_form">
                                @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label>Company Name<span class="red">*</span></label>
                                                <select name="company_id" id="company_id" class="form-control select2" style="width: 100%;" onchange="get_branch()" required>
                                                <option selected disabled>Select Company</option>
                                                @foreach(App\Companie::where('delete_status',0)->where('status',1)->get() as $company)
                                                    <option value="{{$company->id}}" @if($data->companies_id == $company->id) selected @endif>{{$company->company_name}} ({{$company->company_code}})</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label>Branch Name<span class="red">*</span></label>
                                                <select name="branch_id" id="branch_id" class="form-control select2" style="width: 100%;" required>
                                                <option selected disabled>Select Branch</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="emplyoee_type">Emplyoee Type<span class="red">*</span></label>
                                            <select name="emplyoee_type" class="form-control select2" style="width: 100%;" required>
                                                <option value="regular" @if($data->emplyoee_type == 'regular') selected @endif>Regular</option>
                                                <option value="intern" @if($data->emplyoee_type == 'intern') selected @endif>Intern</option>
                                                <option value="trainee" @if($data->emplyoee_type == 'trainee') selected @endif>Trainee</option>
                                                <option value="on_contact" @if($data->emplyoee_type == 'on_contact') selected @endif>On Contract</option>
                                                <option value="part_time" @if($data->emplyoee_type == 'part_time') selected @endif>Part Time</option>
                                                <option value="freelancer" @if($data->emplyoee_type == 'freelancer') selected @endif>Freelancer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="emplyoee_id">Emplyoee Email ID<span class="red">*</span></label>
                                            <input type="email" name="emplyoee_id" class="form-control" id="emplyoee_id" value="{{$data->user->email}}" placeholder="Enter Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="emplyoee_password">Emplyoee Password<span class="red">*</span></label>
                                            <input type="password" name="emplyoee_password" class="form-control" id="emplyoee_password" placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="roles">Role<span class="red">*</span></label>
                                        @php
                                             $selected_role = DB::table('model_has_roles')->where('model_id', $data->user_id)->pluck('role_id')->toArray();
                                        @endphp
                                        <select name="roles[]" class="form-control select2" style="width: 100%;" required data-placeholder='Select Role'>
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{$role}}" @if(in_array($role,$selected_role)) selected @endif>{{$role}}</option>
                                            @endforeach
                                        </select>
                                        {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control select2','multiple','data-placeholder'=>'Select Role','required')) !!} --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
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
    $(get_branch());
    function get_branch()
    {
        var company_id=$('#company_id').val();
        $.ajax({
            type: 'POST',
            url: '{{route("get.branch")}}',
            data: {
                _token: '{{ csrf_token() }}',
                company_id: company_id,
            },
            success: function(data) {
                $('#branch_id').empty();
                $.each(data,function(key, value)
                {
                    if(company_id == value.id)
                    {
                        $('#branch_id').append('<option value=' + value.id + 'selected>' + value.branch_name +'('+  value.branch_code +')'+'</option>');
                    }
                    else
                    {
                        $('#branch_id').append('<option value=' + value.id + '>' + value.branch_name +'('+  value.branch_code +')'+'</option>');
                    }
                });
            }
        });
    }
</script>

@include('layout/footer')
