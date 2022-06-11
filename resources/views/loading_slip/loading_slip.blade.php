

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loading Slip</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Form</li>
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
                <h3 class="card-title">Loading Slip</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('data')!='')
            <div class="alert alert-success" role="alert">
                {{Session::get('data')}}
            </div>
            @endif
            @if(isset($edit_data['id']))
            
              <form role="form" method="POST" action="{{route('loading_slip.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('loading_slip.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">D.I. No / EGP No</label>
                   
                    <input type="text" name="di_no" class="form-control" id="exampleInputEmail1" placeholder=" Enter D.I. No / EGP No" value="@if(isset($edit_data['di_no'])){{ $edit_data['di_no'] }}@endif">
                    </div>
                  </div>
                  
                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Vechile Number</label>
                   
                    <select name="truck_no" id="truck_no" class="form-control select2" style="width: 100%;">
                 <option value="">Select Truck </option>
                       @foreach($truck as $item)
                         <option value="{{$item->id}}" @if(isset($edit_data['truck_no']) && $edit_data['truck_no']==$item->id){{ 'selected' }}@endif>{{$item->vechile_number}} </option>
                       @endforeach
                      
                      </select>
                    
                    
                    
                    
                    </div>
                  </div>

                <!--<div class="form-group col-md-4" >-->
                <!--  <div class="form-group">-->
                <!--    <label for="exampleInputPassword1">Owner Name</label>-->
                <!--    <select name="owner_name" id="owner_name" class="form-control select2" style="width: 100%;">-->
                 
                <!--   @foreach($owner as $item)-->
                <!--     <option value="{{$item->id}}" @if(isset($edit_data['id']) && $edit_data['id']==$item->id){{ 'selected' }}@endif>{{$item->ownwer_name}}</option>-->
                <!--   @endforeach-->
                  
                <!--  </select>-->
                <!--  </div>-->
                <!--</div>-->
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Owner Name</label>
                   
                    <input type="text" name="owner_name" id="owner_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Owner  Name" value="@if(isset($edit_data['owner_name'])){{ $edit_data['owner_name'] }}@endif">
                    </div>
                </div>
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Owner Mobile Number</label>
                   
                    <input type="text" name="owner_mobile_no" id="owner_phone_first" class="form-control" id="exampleInputEmail1" placeholder="Enter Owner Mobile Number" value="@if(isset($edit_data['owner_mobile_no'])){{ $edit_data['owner_mobile_no'] }}@endif">
                    </div>
                </div>
                <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Driver Name</label>
                    <select name="driver_name" id="driver" class="form-control select2" style="width: 100%;">
                  <option value="">Select Driver </option>
                   @foreach($data as $item)
                     <option value="{{$item->id}}" @if(isset($edit_data['driver_name']) && $edit_data['driver_name']==$item->id){{ 'selected' }}@endif>{{$item->driver_name}}</option>
                   @endforeach
                  
                  </select>
                  </div>
                </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver Id</label>
                   
                    <input type="text" name="driver_id" id="driver_id" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver Id" value="@if(isset($edit_data['driver_id'])){{ $edit_data['driver_id'] }}@endif">
                    </div>
                  </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver Mobile Number</label>
                   
                    <input type="text" name="driver_mobile" id="driver_mobile" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver mobile Number" value="@if(isset($edit_data['driver_mobile'])){{ $edit_data['driver_mobile'] }}@endif">
                    </div>
                  </div>
                 
                  
                  
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Cash Advance</label>
                   
                    <input type="text" name="case_advance" class="form-control" id="exampleInputEmail1" placeholder="Enter Cash Advance" value="@if(isset($edit_data['case_advance'])){{ $edit_data['case_advance'] }}@endif">
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Diesel Cash Advance</label>
                   
                    <input type="text" name="diesel_case_advance" class="form-control" id="exampleInputEmail1" placeholder="Enter Diesel Cash Advance" value="@if(isset($edit_data['diesel_case_advance'])){{ $edit_data['diesel_case_advance'] }}@endif">
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Diesel Quantity (Litre)</label>
                   
                    <input type="text" name="diesel_quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter Diesel Quantity (Litre)" value="@if(isset($edit_data['diesel_quantity'])){{ $edit_data['diesel_quantity'] }}@endif">
                    </div>
                  </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Diesel Slip Number</label>
                   
                    <input type="test" name="diesel_slip_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Diesel Slip Number" value="@if(isset($edit_data['diesel_slip_no'])){{ $edit_data['diesel_slip_no'] }}@endif">
                    </div>
                </div>
            
               
            <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Material Name</label>
               
                <input type="text" name="material_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Material Name" value="@if(isset($edit_data['material_name'])){{ $edit_data['material_name'] }}@endif">
                </div>
            </div>
            <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Driver Signature</label>
               
                <input type="text" name="driver_signature" class="form-control" id="exampleInputEmail1" placeholder="Driver Signature" value="@if(isset($edit_data['driver_signature'])){{ $edit_data['driver_signature'] }}@endif">
                </div>
            </div>
             <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Remarks</label>
               
                <input type="text" name="remarks" class="form-control" id="exampleInputEmail1" placeholder="Enter Remarks" value="@if(isset($edit_data['remarks'])){{ $edit_data['remarks'] }}@endif">
                </div>
            </div>
     
                   <div class="col-md-4 col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                           <option>Select Status</option>
                          <option value="enable" @if(isset($edit_data['status']) && $edit_data['status']== 'enable'){{ 'selected' }}@endif >Enable</option>
                          <option value="disable" @if(isset($edit_data['status']) && $edit_data['status']== 'disable'){{ 'selected' }}@endif>Disable</option>
                        </select>
                      </div>
                    </div>
                    <input type="hidden" name="add_by" class="form-control" id="exampleInputPassword1" placeholder=" " value="{{Auth::user()->id}}">
                  </div>

                </div>

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
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		
		$("#driver").change(function(){
		    var d_id= $(this).val();
		    
           //console.log(d_id)
            $.ajax({
                  url: '/DriverDetail',
                  type: "Get",
                  dataType: 'json',
                  data:{ 
                        _token:'{{ csrf_token() }}',
                        driver_id:d_id
                    }, 
                   success: function(response){
                        //console.log(response.data);
                        $("#driver_id").val(response.data.driver_id_no);
                        $("#driver_mobile").val(response.data.driver_mobile_no);
                    }
                });
	
		});
		
	});
</script>

<script>
	$(document).ready(function(){
		
		$("#owner_name").change(function(){
		    var ow_id= $(this).val();
		    
           console.log(ow_id)
            $.ajax({
                  url: '/OwnerDetail',
                  type: "Get",
                  dataType: 'json',
                  data:{ 
                        _token:'{{ csrf_token() }}',
                        owner_id:ow_id
                    }, 
                   success: function(response){
                        console.log(response.data);
                        $("#owner_phone_first").val(response.data.owner_phone_first);
                    }
                });
	
		});
		
	});
</script>

<script>
	$(document).ready(function(){
		
		$("#truck_no").change(function(){
		    var tr_id= $(this).val();
		    
           //console.log(tr_id)
            $.ajax({
                  url: '/TruckDetail',
                  type: "Get",
                  dataType: 'json',
                  data:{ 
                        _token:'{{ csrf_token() }}',
                        truck_id:tr_id
                    }, 
                   success: function(response){
                        //console.log(response.data);
                        //console.log(response.owner);
                        $("#owner_name").val(response.owner.ownwer_name);
                        $("#owner_phone_first").val(response.owner.owner_phone_first);
                    //   ow_id=response.data.owner_id;
                    //     console.log(ow_id);
                    }
                    
                });

		});
		
	});
</script>
  @include('layout/footer')