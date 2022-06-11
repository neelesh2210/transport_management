@include('layout/header')

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: red;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: green;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 #trans.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }
 #trans.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }
</style>
@include('layout/sidebar')
<div class="content-wrapper">
<section class="content">
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
            
 <form action="{{ route('company.destroy','bulk_delete') }}" method="POST">
    @method('DELETE')
    @csrf
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Company List</h3>
              
               <!-- <button type="submit" id="trans" class="btn btn-danger" onclick="return areyousure(); " style="float:right;"> <i class="fas fa-trash" aria-hidden="true"></i></button> -->
              @can('companies-create')
              <a href="{{ route('company.create') }}" class="btn btn-primary btn-info " style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i> Add</a>
              @endcan
            </div>
        @error('bulk_delete')
	
	<div class="alert alert-danger col-4 " style="text-align: center; margin: auto; background: red;" >
            <a href="#" class="close" data-dismiss="alert">&times;</a>
               Atleat Check On box to delete
            </div>
	@enderror
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                     <th>#</th>
                  <th>Company Name</th>
                  <th>Company Code</th>
                  <th>Company Logo</th>
                  <th>Company Location</th>
                  <th>Company Branch Name</th>
                  <th>Company Branch Code</th>
                  <th>Comapany Branch Location</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($data as $item)
                <td><input type="checkbox" name="bulk_delete[]" value="{{$item->id}}"></input></td>
                <td>{{$item->company_name}}</td>
                  <td>{{$item->company_code}}</td>
                  <td> <img id="blah" src="{{ URL::asset('images/'.$item->company_logo)  }}" alt="your image"  style="height:100px;width:100px;" /></td>
                  <td>{{$item->company_location}}</td>
                  <td>{{$item->company_branch_name}}</td>
                  <td>{{$item->company_branch_code}}</td>
                  <td>{{$item->company_branch_location}}</td>
                  <td>
            <label class="switch">
                  
            <input type="checkbox" class="tog " data-toggle="toggle" value="{{$item->id}}" @if($item->status=='enable') {{$checked}} else {{$unchecked}}  @endif >
            <span class="slider round"></span>
              </label>
                      </td>
                  <td>
                   <div class="btn-group">
        @can('companies-edit')
        <a href="{{route('company.edit',$item->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i> </a>
        @endcan
      @can('companies-delete')
        <form action="{{ route('company.destroy', $item->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button id="trans" class="btn btn-danger" onclick="return areyousure();  "> <i class="fas fa-trash" aria-hidden="true"></i></button>
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
          </form>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
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
                     title: "Company",
                     message: "Status Active!"
                  });
                  // window.setTimeout(function () {
                  //    window.location.reload();
                  // }, 2000);

               } else {
                  $.growl.inactive({
                     title: "Company",
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
  
  function areyousure(){
      if(confirm("Are you sure, you want to delete?")){
        return true;
      }else{
        return false;
      }
    }
</script>


  @include('layout/footer')