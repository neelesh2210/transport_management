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
                                    <form action="{{ route('emplyoee.index') }}">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <select name="company_id[]" class="form-control select2"
                                                    data-placeholder="Select Company" id="company_id" multiple>
                                                    <option value="">Select Company...</option>
                                                    @foreach (\App\Companie::where('delete_status', 0)->where('status', 1)->orderBy('company_name', 'asc')->get() as $company)
                                                        <option value="{{ $company->id }}">
                                                            {{ $company->company_name }}({{ $company->company_code }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="material_id[]" id="material_id"
                                                    data-placeholder="Select Material" class="form-control select2"
                                                    multiple>
                                                    <option value="">Select Material...</option>
                                                    @foreach (\App\Material::where('delete_status', 0)->where('status', 1)->orderBy('name', 'asc')->get() as $material)
                                                        <option value="{{ $material->id }}">{{ $material->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2" style="padding: 0px;">
                                                <input type="text" name="key" class="form-control float-right" value="" placeholder="Search">
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
                                    <th class="center">#</th>
                                    <th class="center">Employee ID</th>
                                    <th class="center">Employee Type</th>
                                    <th class="center">Company Detail</th>
                                    <th class="center">Brnach Detail</th>
                                    <th class="center">Status</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($list as $key=>$data)
                                    <tr>
                                        <td class="center">
                                            {{ $key + 1 + ($list->currentPage() - 1) * $list->perPage() }}</td>
                                        <td class="center">{{ $data->user->email }}</td>
                                        <td class="center">{{ ucfirst($data->emplyoee_type) }}</td>
                                        <td class="center">
                                            {{ $data->company->company_name }}
                                            ({{ $data->company->company_code }})
                                        </td>
                                        <td class="center">
                                            {{ $data->branch->branch_name }}
                                            ({{ $data->branch->branch_code }})
                                        </td>
                                        <td class="center">
                                            @if($data->status == 1)
                                            <a href="{{route('update.status.emplyoee',[$data->id,0])}}" onclick="return confirm('You want to inactive?');">
                                                <span class="badge bg-success">Active</span>
                                            </a>
                                            @else
                                                <a href="{{route('update.status.emplyoee',[$data->id,1])}}">
                                                    <span class="badge bg-danger" onclick="return confirm('You want to active?');">Inactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="center">
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
                            {!! $list->links() !!}
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
