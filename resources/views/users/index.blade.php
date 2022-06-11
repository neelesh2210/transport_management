@php $page_name="Users List" @endphp

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

          @if ($message = Session::get('success'))
              <div class="alert alert-danger col-4" style="text-align: center; margin: auto;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                  {{ $message }}
              </div>
            @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users List</h3>
              
              @can('user-create')  
              <a href="{{ route('users.create') }}" class="btn btn-primary btn-info " style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i> Add User</a>
              @endcan
            </div>
      
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $user)
                <tr>
                  @if($user->id!="2" || $user->name!="Admin")
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                    </td>
                    <td>
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                    @can('user-edit')
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    @endcan
                    @can('user-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                    </td>
                  @endif
                </tr>
                @endforeach

                </tbody>
               
              </table>
              {!! $data->render() !!}
            </div>
            <!-- /.card-body -->
          </div>
          
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