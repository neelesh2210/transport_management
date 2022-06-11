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
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }
  .modal-header {
    background-color: #fb3;
    padding: 10px;
}

.modal {
  
    top: 32px;
}

.modal-header img
{
    width: 90px;
    z-index: 9999;
    margin: -36px 65px;
    height: 90px;
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

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Emplyoee Profile List</h3>
              @can('employee-profile-create')
              <a href="{{ route('emplyoee_profile.create') }}" class="btn btn-primary btn-info" style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i>  Add</a>
              @endcan
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No</th>
                  <th>Emplyoee Id</th>
                  <th>Emplyoee Type</th>
                  <th>Emplyoee Name</th>
                  <th>Emplyoee Join Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
               @foreach($data as $item)

                <tr> 
                  <td>{{$i++}}</td>
                  <td>{{$item->emplyoee_email}}</td>
                  <td>{{$item->emplyoee_type}}</td>
                  <td>{{$item->emplyoee_name}}</td>
                  <td>{{$item->emplyoee_jd}}</td>
                
                	<td>
            <label class="switch">
            	
            <input type="checkbox" class="tog" data-toggle="toggle" value="{{$item->id}}" @if($item->status=='enable') {{$checked}} else {{$unchecked}}  @endif >
            <span class="slider round"></span>
              </label>
                      </td>
                	<td>
                    <div class="btn-group">
                   <button class="btn btn-info btn-sm" id="emp_details" value="{{$item->id}}"> <i class="fas fa-tags" aria-hidden="true"></i>View</button> 
       @can('employee-profile-edit')                
       <a href="{{route('emplyoee_profile.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit</a>
       @endcan
       @can('employee-profile-delete')
      <form action="{{ route('emplyoee_profile.destroy', $item->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger btn-sm" onclick="return areyousure();  "> <i class="fas fa-trash" aria-hidden="true"></i>Delete</button>
    </form>
    @endcan
    </div>
  </td>
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
              <!--Modal: Login with Avatar Form-->
<div class="modal fade" id="emplyoee_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-notify modal-info" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">Emplyoee Info</p>
              <img id='profile' src=""  class="img-fluid z-depth-1-half rounded-circle">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">

           
                  <div class="row">
                      <div class="col-6 ">
                 <p id='emplyoee_id'></p>
                 <p id='emplyoee_type'></p>
                 <p id='company_name'></p>
                 <p id='company_code'> </p>
                 <p id='company_location'></p>
                 <p id='company_branch_name'> </p>
                 <p id='company_branch_code'></p>
                 <p id='company_branch_location'></p>
                 <p id='emplyoee_idtype'></p>
                 <p id='emplyoee_idno'></p>
                 <p id='emplyoee_qualification'></p>
                 
                 </div>
                 <div class="col-6 ">
                <p id='emplyoee_name'></p>
                  <p id='emplyoee_photo'></p>
                   <p id='emplyoee_jd'></p>
                  <p id='emplyoee_designation'></p>
                   <p id='emplyoee_cno'></p>
                  <p id='emplyoee_email'></p>
                   <p id='emplyoee_dob'></p>
                  <p id='emplyoee_bg'></p>
                   <p id='gender'></p>
                   <p id='emplyoee_cadd'></p>
                   <p id='emplyoee_padd'></p>
                   <p id='emplyoee_exp'></p>
                  
                   
                 
                 </div>
               </div>
           


          </div>

       <!--Footer-->
       
     </div>
     <!--/.Content-->
   </div>
</div>
<!--Modal: Login with Avatar Form-->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
               type:'PUT',
               url:'../jsmtruck/emplyoee_profile/'+c,
               data:{ 
                _token:'{{ csrf_token() }}',
                status: state,
                sp:'ajax'
                
            },
               success:function(data) {
                   
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
  $("#emp_details").click(function(){
      
      var c=$(this).val();
    
       $.ajax({
               type:'GET',
               url:'../emplyoee_profile/'+c,
               data:{ 
                _token:'{{ csrf_token() }}',
                
                
            },
               success:function(data) {
                   // console.log(data.data.company_name)
                    $('#emplyoee_details').modal('show');
                     $('#profile').attr("src",'images/emp_profile/'+data.data.emplyoee_photo);
                     $('#emplyoee_id').text('Emplyoee Id:'+data.data.emplyoee_id);
                     $('#emplyoee_type').text('Emplyoee Type:'+data.data.emplyoee_type);
                     $('#company_name').text('Company Name:'+data.data.company_name);
                     $('#company_code').text('Company Code:'+data.data.company_code);
                     $('#company_location').text('Company Location:'+data.data.company_location);
                     $('#company_branch_name').text('Branch Name:'+data.data.company_branch_name);
                      $('#company_branch_code').text('Branch Code:'+data.data.company_branch_code);
                     $('#company_branch_location').text('Branch Location:'+data.data.company_branch_location);
                     $('#emplyoee_name').text('Emplyoee Name:'+data.data.emplyoee_name);
                     $('#emplyoee_jd').text('Joining Date:'+data.data.emplyoee_jd);
                     $('#emplyoee_designation').text('Designation:'+data.data.emplyoee_designation);
                     $('#emplyoee_cno').text('Contact Number:'+data.data.emplyoee_cno);
                      $('#emplyoee_email').text('Email:'+data.data.emplyoee_email);
                     $('#emplyoee_dob').text('DOB:'+data.data.emplyoee_dob);
                     $('#emplyoee_bg').text('Blood Group:'+data.data.emplyoee_bg   );
                     $('#gender').text('Gender:'+data.data.gender);
                     $('#emplyoee_cadd').text('Current Address:'+data.data.emplyoee_cadd);
                     $('#emplyoee_padd').text('Permanent Address:'+data.data.emplyoee_padd);
                      $('#emplyoee_idtype').text('Identification Type:'+data.data.emplyoee_idtype);
                      $('#emplyoee_idno').text('Identification Number:'+data.data.emplyoee_idno);
                     $('#emplyoee_qualification').text('Qualification:'+data.data.emplyoee_qualification);
                     $('#emplyoee_exp').text('Experience:'+data.data.emplyoee_exp);
                     
                
               
               }

            });
      
   
  });
});
</script>
   @include('layout/footer')