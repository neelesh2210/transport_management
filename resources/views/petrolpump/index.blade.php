@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Petrol Pump</li>
                        </ol>
                            @can('companies-create')
                                <a href="{{ route('petrol_pump.create') }}" class="btn btn-primary btn-info" style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i> Add</a>
                            @endcan
                        </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                <h3 class="card-title"><b>Petrol Pump List</b></h3>
                            </div>
                            <div class="col-md-10">
                                <div class="card-tools">
                                    <form action="{{route('petrol_pump.index')}}">
                                        <div class="row" >
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <select name="branch_id[]" class="form-control select2" data-placeholder="Select Branch" id="branch_id" multiple>
                                                    <option value="">Select Branch...</option>
                                                    @foreach(\App\Branch::where('delete_status',0)->where('status',1)->orderBy('branch_name','asc')->get() as $branch)
                                                        <option value="{{$branch->id}}" @isset($branches)@if(in_array($branch->id,$branches)) selected @endif @endisset>{{$branch->branch_name}} ({{$branch->branch_code}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2" style="padding: 0px;">
                                                <input type="text" name="key" class="form-control float-right" value="{{$key}}" placeholder="Search">
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
                                    <th class="center">Petrol Pump Name</th>
                                    <th class="center">Address</th>
                                    <th class="center">Phone Number</th>
                                    <th class="center">Branch</th>
                                    <th class="center">Status</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($list as $key=>$data)
                                    <tr>
                                        <td class="center">{{($key+1) + ($list->currentPage() - 1)*$list->perPage()}}</td>
                                        <td class="center">{{$data->petrolpump_name}}</td>
                                        <td class="center">{{$data->petrolpump_address}}</td>
                                        <td class="center">{{implode('/',$data->petrolpump_mobile_no)}}</td>
                                        <td class="center">{{$data->branches->branch_name}}({{$data->branches->branch_code}})</td>
                                        <td class="center">
                                            @if($data->status == 1)
                                            <a href="{{route('update.status.petrol',[$data->id,0])}}" onclick="return confirm('You want to inactive?');">
                                                <span class="badge bg-success">Active</span>
                                            </a>
                                            @else
                                                <a href="{{route('update.status.petrol',[$data->id,1])}}">
                                                    <span class="badge bg-danger" onclick="return confirm('You want to active?');">Inactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-app action-button" href="{{route('petrol_pump.edit',$data->id)}}">
                                                <i class="fas fa-edit edit-color"></i>
                                            </a>
                                            <a class="btn btn-app action-button" onclick="return confirm('You want to delete?');" href="{{route('petrol.pump.destroy',$data->id)}}">
                                                <i class="fas fa-trash delete-color"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="footable-empty">
                                        <td colspan="11">
                                        <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br><h2>Nothing Found</h2></center>
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

@include('layout/footer')
