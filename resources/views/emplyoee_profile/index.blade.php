@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee Profile</li>
                        </ol>
                        @can('companies-create')
                            <a href="{{ route('emplyoee.create') }}" class="btn btn-primary btn-info "
                                style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i> Add</a>
                        @endcan
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                <h3 class="card-title"><b>Employee List</b></h3>
                            </div>
                            <div class="col-md-10">
                                <div class="card-tools">
                                    <form action="{{ route('emplyoee_profile.index') }}">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <select name="company_id[]" class="form-control select2"
                                                    data-placeholder="Select Company" id="company_id" multiple>
                                                    <option value="">Select Company...</option>
                                                    @foreach (\App\Companie::where('delete_status', 0)->where('status', 1)->orderBy('company_name', 'asc')->get() as $company)
                                                        <option value="{{ $company->id }}"  @isset($companies)@if(in_array($company->id,$companies)) selected @endif @endisset>
                                                            {{ $company->company_name }}({{ $company->company_code }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="branch_id[]" id="branch_id"
                                                    data-placeholder="Select Branch.." class="form-control select2"
                                                    multiple>
                                                    <option value="">Select Branch...</option>
                                                    @foreach (\App\Branch::where('delete_status', 0)->where('status', 1)->orderBy('branch_name', 'asc')->get() as $branch)
                                                        <option value="{{ $branch->id }}" @isset($branchs)@if(in_array($branch->id, $branchs)) selected @endif @endisset>
                                                            {{ $branch->branch_name }} ({{$branch->branch_code}})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2" style="padding: 0px;">
                                                <input type="text" name="key" class="form-control float-right" value="{{$search}}" placeholder="Search">
                                            </div>
                                            <div class="col-md-1" style="padding: 0px;">
                                                <button type="submit" class="btn btn-default" style="height: 37px;">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Details</th>
                                    <th>Employee More Details</th>
                                    <th>Address</th>
                                    <th>Brnach Detail</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($list as $key=>$data)
                                    <tr>
                                        <td>
                                            {{ $key + 1 + ($list->currentPage() - 1) * $list->perPage() }}</td>
                                        <td>

                                            <b>Name:</b> {{ $data->emplyoee_name }} <br>
                                            <b>Designation:</b> {{$data->emplyoee_designation}} <br>
                                            <b>Email:</b> {{ $data->emplyoee_email }} <br>
                                            <b>Contact Number:</b> {{$data->emplyoee_cno}} <br>
                                            <b>Employee Type:</b> {{ucfirst($data->emplyoee_type)}} <br>
                                            <b>DOB:</b> {{$data->emplyoee_dob}}
                                        </td>
                                        <td>
                                            <b>Company Name:</b> {{ $data->emplyoee->company->company_name }} <br>
                                            <b>Company Code:</b> {{ $data->emplyoee->company->company_code }} <br>
                                            <b>Joining Date:</b> {{ $data->emplyoee_jd}} <br>
                                            <b>Gender:</b> {{ucfirst($data->gender)}} <br>
                                            <b>Blood Group:</b> {{ucfirst($data->emplyoee_bg)}}
                                        </td>
                                        <td>
                                            <b>Current Address:</b> {{ $data->emplyoee_cadd }} <br>
                                            <b>Permanent Address:</b> {{ $data->emplyoee_padd }}
                                        </td>
                                        <td>
                                            {{ $data->emplyoee->branch->branch_name }}
                                            ({{ $data->emplyoee->branch->branch_code }})
                                        </td>
                                        {{-- <td>
                                            @if($data->status == 1)
                                            <a href="{{route('update.status.emplyoee',[$data->id,0])}}" onclick="return confirm('You want to inactive?');">
                                                <span class="badge bg-success">Active</span>
                                            </a>
                                            @else
                                                <a href="{{route('update.status.emplyoee',[$data->id,1])}}">
                                                    <span class="badge bg-danger" onclick="return confirm('You want to active?');">Inactive</span>
                                                </a>
                                            @endif
                                        </td> --}}
                                        <td>
                                            <a class="btn btn-app action-button" href="{{route('emplyoee_profile.edit',$data->id)}}">
                                                <i class="fas fa-edit edit-color"></i>
                                            </a>
                                            {{-- <a class="btn btn-app action-button" onclick="return confirm('You want to delete?');" href="{{route('emplyoee.destroy',$data->id)}}">
                                                <i class="fas fa-trash delete-color"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="footable-empty">
                                        <td colspan="11">
                                            <center style="padding: 70px;"><i class="far fa-frown"
                                                    style="font-size: 100px;"></i><br>
                                                <h2>Nothing Found</h2>
                                            </center>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $list->appends(['key'=>$search, 'company_id'=>$companies, 'branch_id'=>$branchs])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(function() {
        $('.tog').change(function() {
            var status = $(this).prop('checked');
            var c = $(this).val();


            if (status == true) {

                //$('#edalert').show();
                // $('#edalert').removeClass("alert alert-danger");
                // $('#edalert').addClass("alert alert-success");
                //$('#ed').html('Enable');
                var state = "enable";
            }
            if (status == false) {

                //$('#edalert').show();
                // $('#edalert').removeClass("alert alert-success");
                // $('#edalert').addClass("alert alert-danger");
                //$('#ed').html('Disable');
                var state = "disable";
            }


            $.ajax({
                type: 'POST',
                url: '/update_status_emplyoee',
                data: {
                    _token: '{{ csrf_token() }}',
                    stat: state,
                    e_id: c
                },
                success: function(data) {

                    //console.log(data.msg.status);

                    if (data.msg.status == 'enable') {
                        $.growl.active({
                            title: "Emplyoee",
                            message: "Status Active!"
                        });
                        // window.setTimeout(function () {
                        //    window.location.reload();
                        // }, 2000);

                    } else {
                        $.growl.inactive({
                            title: "Emplyoee",
                            message: "Status Inactive!"
                        });
                        // window.setTimeout(function () {
                        //    window.location.reload();
                        // }, 2000);
                    }


                }

            });
        })
    })

    function areyousure() {
        if (confirm("Are you sure, you want to delete?")) {
            return true;
        } else {
            return false;
        }
    }
</script>

@include('layout/footer')
