@include('layout/header')
@include('layout/sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Edit Emplyoee Profile</li>
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
                            <h3 class="card-title">Edit Emplyoee Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @isset($edit_emplyoee_profile)
                            <form role="form" method="POST" action="{{ route('emplyoee_profile.update', $edit_data->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form role="form" method="POST" action="{{ route('emplyoee_profile.store') }}" enctype="multipart/form-data">
                        @endisset
                        {{-- <form role="form" method="POST" action="{{ route('emplyoee_profile.update', $edit_data->id) }}" enctype="multipart/form-data"> --}}
                            {{-- @method('PUT') --}}
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="emplyoee_id" value="{{$edit_data->id}}">
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Emplyoee Email ID</label>
                                            <input type="text" name="emplyoee_email" class="form-control" value="{{$edit_data->user->email}}" required readonly>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Emplyoee Type</label>
                                            <select name="emplyoee_type" class="form-control select2" style="width: 100%;"
                                                id="emplyoee_type">
                                                <option value="regular" @if ($edit_data->emplyoee_type == 'regular') {{ 'selected' }} @endif> REGULAR</option>
                                                <option value="intern" @if ($edit_data->emplyoee_type == 'intern') {{ 'selected' }} @endif> INTERN</option>
                                                <option value="trainee" @if ($edit_data->emplyoee_type == 'trainee') {{ 'selected' }} @endif> TRAINEE</option>
                                                <option value="on_contact" @if ($edit_data->emplyoee_type == 'on_contact') {{ 'selected' }} @endif> ON CONTACT</option>
                                                <option value="part_time" @if ($edit_data->emplyoee_type == 'part_time') {{ 'selected' }} @endif> PART TIME</option>
                                                <option value="freelancer" @if ($edit_data->emplyoee_type == 'freelancer') {{ 'selected' }} @endif> FREELANCER</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Emplyoee Photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">

                                                    <input type='file' name="emplyoee_photo" onchange="readURL(this);" />
                                                    <img id="blah" src="{{ URL::asset('images/select.png') }}"
                                                        alt="your image"
                                                        style="margin-left: -40px;height:100px;width:100px;" />

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Name</label>
                                            <input type="text" name="emplyoee_name" class="form-control"
                                                id="emplyoee_name" placeholder="Enter Name"
                                                value="{{ $edit_data->user->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Join Date</label>
                                            <input type="date" name="emplyoee_jd" class="form-control"
                                                id="exampleInputEmail1" value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_jd}}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Designation</label>
                                            <input type="text" name="emplyoee_designation" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Designation"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_designation}}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Contact Number</label>
                                            <input type="number" name="emplyoee_cno" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Contact Number"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_cno}}@endisset">
                                        </div>
                                    </div>

                                    {{-- <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Email</label>
                                            <input type="email" name="emplyoee_email" class="form-control"
                                                id="emplyoee_email" placeholder="Enter Email"
                                                value="@isset($edit_emplyoee_profile)
                                                {{ $edit_emplyoee_profile->emplyoee_email }}
                                                @endisset"
                                                readonly>
                                        </div>
                                    </div> --}}

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee DOB</label>
                                            <input type="date" name="emplyoee_dob" class="form-control"
                                                id="exampleInputEmail1"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_dob}}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Blood Group</label>
                                            <select name="emplyoee_bg" class="form-control">
                                                <option selected="" disabled>Select Blood Group</option>
                                                <option value="a+" @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->emplyoee_bg == 'a+') selected @endif>A+
                                                </option>
                                                <option value="a-" @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->emplyoee_bg == 'a-') selected @endif>A-
                                                </option>
                                                <option value="b+" @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->emplyoee_bg == 'b+') selected @endif>B+
                                                </option>
                                                <option value="b-" @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->emplyoee_bg == 'b-') selected @endif>B-
                                                </option>
                                                <option value="o+" @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->emplyoee_bg == 'o+') selected @endif>O+
                                                </option>
                                                <option value="o-" @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->emplyoee_bg == 'o-') selected @endif>O-
                                                </option>
                                                <option value="ab+" @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->emplyoee_bg == 'ab+') selected @endif>AB+
                                                </option>
                                                <option value="ab-" @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->emplyoee_bg == 'ab-') selected @endif>AB-
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Gender</label>
                                            <select class="form-control" name="gender">
                                                <option selected disabled>SELECT GENDER</option>
                                                <option value="male"
                                                    @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->gender == 'male') {{ 'selected' }} @endif>MALE
                                                </option>
                                                <option value="female"
                                                    @if (isset($edit_emplyoee_profile) && $edit_emplyoee_profile->gender == 'female') {{ 'selected' }} @endif>FEMALE
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Current Address</label>
                                            <input type="text" name="emplyoee_cadd" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Current Address"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_cadd}}@endisset">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Permanent Address</label>
                                            <input type="text" name="emplyoee_padd" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Permanent Address"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_padd}}@endisset">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Identification Type</label>
                                            <input type="text" name="emplyoee_idtype" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Identification Type"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_idtype}}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Identification Number</label>
                                            <input type="text" name="emplyoee_idno" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Name"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_idno}}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Qualification</label>
                                            <input type="text" name="emplyoee_qualification" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Qualification"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_qualification}}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Emplyoee Experience</label>
                                            <input type="text" name="emplyoee_exp" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter Experience"
                                                value="@isset($edit_emplyoee_profile){{$edit_emplyoee_profile->emplyoee_exp}}@endif">
                                        </div>
                                    </div>



                                    {{-- <div class="col-md-4 col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0"
                                                    @if(isset($edit_emplyoee_profile) && $edit_emplyoee_profile->status == '0') {{ 'selected' }} @endif>ENABLE
                                                </option>
                                                <option value="1"
                                                    @if(isset($edit_emplyoee_profile) && $edit_emplyoee_profile->status == '1') {{ 'disable' }} @endif>DISABLE
                                                </option>
                                            </select>
                                        </div>
                                    </div> --}}


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('change', '#emplyoee_id', function() {
            var emplyoee_id = $("#emplyoee_id").val();
            $.get("{{ route('get_emplyoee', '') }}" + "/" + emplyoee_id, function(data) {
                $("#emplyoee_name").val(data.emplyoee_id);
                $("#emplyoee_email").val(data.emplyoee_id);

            });
        });
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@include('layout/footer')
