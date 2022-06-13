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
                            <li class="breadcrumb-item active">Branch</li>
                        </ol>
                            @can('companies-create')
                                <a href="{{ route('branch.create') }}" class="btn btn-primary btn-info "
                                    style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i> Add</a>
                            @endcan
                        </div>
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-2">
                            <h3 class="card-title"><b>Branch List</b></h3>
                        </div>
                        <div class="col-md-10">
                            <div class="card-tools">
                                <form action="{{route('branch.index')}}">
                                    <div class="row" >
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4">
                                            <select name="company_id[]" class="form-control select2" data-placeholder="Select Company" id="company_id" multiple>
                                                <option value="">Select Company...</option>
                                                @foreach(\App\Companie::where('delete_status',0)->where('status',1)->orderBy('company_name','asc')->get() as $company)
                                                    <option value="{{$company->id}}" @isset($companies)@if(in_array($company->id,$companies)) selected @endif @endisset>{{$company->company_name}} ({{$company->company_code}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="material_id[]" id="material_id" data-placeholder="Select Material" class="form-control select2" multiple>
                                                <option value="">Select Material...</option>
                                                @foreach(\App\Material::where('delete_status',0)->where('status',1)->orderBy('name','asc')->get() as $material)
                                                    <option value="{{$material->id}}" @isset($materials)@if(in_array($material->id,$materials)) selected @endif @endisset>{{$material->name}}</option>
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
                                    <th class="center">Company</th>
                                    <th class="center">Brnach</th>
                                    <th class="center">Brnach Address</th>
                                    <th class="center">Material</th>
                                    <th class="center">Status</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($list as $key=>$data)
                                    <tr>
                                        <td class="center">{{($key+1) + ($list->currentPage() - 1)*$list->perPage()}}</td>
                                        <td class="center">{{$data->company->company_name}} ({{$data->company->company_code}})</td>
                                        <td class="center">{{$data->branch_name}}({{$data->branch_code}})</td>
                                        <td class="center">{{$data->branch_address ?? '---'}}</td>
                                        <td class="center">
                                            @foreach (explode(',',$data->material_id) as $key=>$material)
                                                {{App\Material::where('id',$material)->first()->name}} @if($key+1 != count(explode(',',$data->material_id)))/@else @endif
                                            @endforeach
                                        </td>
                                        <td class="center">
                                            @if($data->status == 1)
                                            <a href="{{route('update.branch.status',[$data->id,0])}}" onclick="return confirm('You want to inactive?');">
                                                <span class="badge bg-success">Active</span>
                                            </a>
                                            @else
                                                <a href="{{route('update.branch.status',[$data->id,1])}}">
                                                    <span class="badge bg-danger" onclick="return confirm('You want to active?');">Inactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-app action-button" href="{{route('branch.edit',$data->id)}}">
                                                <i class="fas fa-edit edit-color"></i>
                                            </a>
                                            <a class="btn btn-app action-button" onclick="return confirm('You want to delete?');" href="{{route('branch.destroy',$data->id)}}">
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
