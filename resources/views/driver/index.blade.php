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
                            <li class="breadcrumb-item active">Driver</li>
                        </ol>
                            @can('companies-create')
                                <a href="{{ route('driver.create') }}" class="btn btn-primary btn-info "
                                    style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i> Add</a>
                            @endcan
                        </div>
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-2">
                            <h3 class="card-title"><b>Driver List</b></h3>
                        </div>
                        <div class="col-md-10">
                            <div class="card-tools">
                                <form action="{{route('driver.index')}}">
                                    <div class="row" >
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            {{-- <select name="material_id[]" id="material_id" data-placeholder="Select Material" class="form-control select2" multiple>
                                                <option value="">Select Material...</option>
                                                @foreach(\App\Material::where('delete_status',0)->where('status',1)->orderBy('name','asc')->get() as $material)
                                                    <option value="{{$material->id}}" @isset($materials)@if(in_array($material->id,$materials)) selected @endif @endisset>{{$material->name}}</option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                        <div class="col-md-2" style="padding: 0px;">
                                            {{-- <input type="text" name="key" class="form-control float-right" value="{{$key}}" placeholder="Search"> --}}
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
                                    <th class="center">Driver Name</th>
                                    <th class="center">Address</th>
                                    <th class="center">Mobile No</th>
                                    <th class="center">License</th>
                                    <th class="center">Id No</th>
                                    <th class="center">License Expairy</th>
                                    <th class="center">Note</th>
                                    <th class="center">Status</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($list as $key=>$data)
                                    <tr>
                                        <td class="center">{{($key+1) + ($list->currentPage() - 1)*$list->perPage()}}</td>
                                        <td class="center">{{$data->driver_name}}</td>
                                        <td class="center">{{$data->driver_address}}</td>
                                        <td class="center">{{$data->driver_mobile_no}}</td>
                                        <td class="center">{{$data->driver_license_no}}</td>
                                        <td class="center">{{$data->driver_id_no}}</td>
                                        <td class="center">{{$data->driver_license_expairy}}</td>
                                        <td class="center">{{$data->note}}</td>
                                        <td class="center">
                                            @if($data->status == 1)
                                            <a href="{{route('update.status.driver',[$data->id,0])}}" onclick="return confirm('You want to inactive?');">
                                                <span class="badge bg-success">Active</span>
                                            </a>
                                            @else
                                                <a href="{{route('update.status.driver',[$data->id,1])}}">
                                                    <span class="badge bg-danger" onclick="return confirm('You want to active?');">Inactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-app action-button" href="{{route('driver.edit',$data->id)}}">
                                                <i class="fas fa-edit edit-color"></i>
                                            </a>
                                            <a class="btn btn-app action-button" onclick="return confirm('You want to delete?');" href="{{route('driver.destroy',$data->id)}}">
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

{{-- <section class="content">
      <div class="row">
        <div class="col-12">

         @if(Session::get('data')!='')
              <div class="alert alert-success col-4 " style="text-align: center; margin: auto; background: #2ECC71;" >
            <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('data')}}
            </div>
            @endif

            @if ($message = Session::get('success'))
              <div class="alert alert-danger col-4" style="text-align: center; margin: auto;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                  {{ $message }}
              </div>
            @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Driver List</h3>
              @can('driver-create')
              <a href="{{ route('driver.create') }}" class="btn btn-primary btn-info" style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i>  Add</a>
              @endcan
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                <th>Sr. No.</th>
                  <th>Driver Name</th>
                  <th>Address</th>
                  <th>Mobile No</th>
                  <th>License</th>

                  <th>Id No</th>
                  <th>License Expairy</th>
                  <th>Note</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
               @foreach($data as $item)
                <td>{{$i++}}</td>
                <td>{{$item->driver_name}}</td>
                  <td>{{$item->driver_address}}</td>
                  <td>{{$item->driver_mobile_no}}</td>
                  <td>{{$item->driver_license_no}}</td>
                  <td>{{$item->driver_id_no}}</td>
                  <td>{{$item->driver_license_expairy}}</td>
                  <td>{{$item->note}}</td>
                  <td>
            <label class="switch">

            <input type="checkbox" class="tog " data-toggle="toggle" value="{{$item->id}}" @if($item->status=='enable') {{$checked}} else {{$unchecked}}  @endif >
            <span class="slider round"></span>
              </label>
                      </td>
                  <td>
                   <div class="btn-group">
       @can('driver-edit')
       <a href="{{route('driver.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit</a>
       @endcan
       @can('driver-delete')
        <form action="{{ route('driver.destroy', $item->id) }}" method="POST">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger btn-sm" onclick="return areyousure();  "> <i class="fas fa-trash" aria-hidden="true"></i>Delete</button>
        </form>
@endcan

    </div>
                  </td>

                </tr>


                @endforeach
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Company Name</th>
                  <th>Company Code</th>
                  <th>Company Logo</th>
                  <th>Company Location</th>
                  <th>Company Branch Name</th>
                  <th>Company Branch Code</th>
                  <th>Comapany Branch Location</th>
                  <th>Status</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section> --}}
</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script>
  $(function() {
    $('.tog').change(function() {
      var status= $(this).prop('checked');
        var c= $(this).val();


      if(status==true){

            //$('#edalert').show();
            // $('#edalert').removeClass("alert alert-danger");
            // $('#edalert').addClass("alert alert-success");
            //$('#ed').html('Enable');
            var state="enable";
      }
      if(status==false){

            //$('#edalert').show();
            // $('#edalert').removeClass("alert alert-success");
            // $('#edalert').addClass("alert alert-danger");
            //$('#ed').html('Disable');
            var state="disable";
      }


        $.ajax({
               type:'POST',
               url:'/update_status',
               data:{
                _token:'{{ csrf_token() }}',
                stat: state,
                c_id:c
            },
               success:function(data) {
                //console.log(data.msg.status);

                 if (data.msg.status == 'enable') {
                  $.growl.active({
                     title: "Driver",
                     message: "Status Active!"
                  });
                  // window.setTimeout(function () {
                  //    window.location.reload();
                  // }, 2000);

               } else {
                  $.growl.inactive({
                     title: "Driver",
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

  function addScript(url) {
    var script = document.createElement('script');
    script.type = 'application/javascript';
    script.src = url;
    document.head.appendChild(script);
}
addScript('https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js');

function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("example1");
        // Choose the element and save the PDF for our user.
        html2pdf()
          .from(element)
          .save();
      }

function areyousure(){
      if(confirm("Are you sure, you want to delete?")){
        return true;
      }else{
        return false;
      }
    }
</script>
<script>
$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});
</script>

  @include('layout/footer')
