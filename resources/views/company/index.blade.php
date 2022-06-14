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
                            <li class="breadcrumb-item active">Company</li>
                        </ol>
                            @can('companies-create')
                                <a href="{{ route('company.create') }}" class="btn btn-primary btn-info" style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i> Add</a>
                            @endcan
                        </div>
                    <div class="card-header">
                        <h3 class="card-title"><b>Company List</b></h3>
                        <div class="card-tools">
                            <form action="{{route('company.index')}}">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="key" class="form-control float-right" value="{{$search}}" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="center">Company Name</th>
                                    <th class="center">Company Code</th>
                                    <th class="center">Company Logo</th>
                                    <th class="center">Company Address</th>
                                    <th class="center">Company GSTIN</th>
                                    <th class="center">Status</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($list as $key=>$data)
                                    <tr>
                                        <td class="center">{{($key+1) + ($list->currentPage() - 1)*$list->perPage()}}</td>
                                        <td class="center">{{$data->company_name}}</td>
                                        <td class="center">{{$data->company_code}}</td>
                                        <td class="center">
                                            <img id="blah" src="@if(!empty($data->company_logo)){{ URL::asset('public/company_logos/' . $data->company_logo)}} @else {{ URL::asset('public/no-image.png')}} @endif" alt="your image" style="height:70px;width:100px;" />
                                        </td>
                                        <td class="center">{{$data->company_address ?? '---'}}</td>
                                        <td class="center">{{$data->company_gstin ?? '---'}}</td>
                                        <td class="center">
                                            @if($data->status == 1)
                                            <a href="{{route('update.status',[$data->id,0])}}" onclick="return confirm('You want to inactive?');">
                                                <span class="badge bg-success">Active</span>
                                            </a>
                                            @else
                                                <a href="{{route('update.status',[$data->id,1])}}">
                                                    <span class="badge bg-danger" onclick="return confirm('You want to active?');">Inactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-app action-button" href="{{route('company.edit',$data->id)}}">
                                                <i class="fas fa-edit edit-color"></i>
                                            </a>
                                            <a class="btn btn-app action-button" onclick="return confirm('You want to delete?');" href="{{route('company.destroy',$data->id)}}">
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
                            {!! $list->appends(['key'=>$search])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layout/footer')
