@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Truck Placement</h1>
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
                <h3 class="card-title">Truck Placement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('data')!='')
            <div class="alert alert-success" role="alert">
                {{Session::get('data')}}
            </div>
            @endif
            @if(isset($edit_data['id']))
            
              <form role="form" method="POST" action="{{route('truck_placement.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('truck_placement.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Transporter Code</label>
                   
                    <input type="text" name="transporter_code" class="form-control" id="exampleInputEmail1" placeholder=" Enter Transporter Code" value="@if(isset($edit_data['transporter_code'])){{ $edit_data['transporter_code'] }}@endif">
                    </div>
                  </div>
                  
                <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Driver Name</label>
                    <select name="driver_name" id="driver" class="form-control select2" style="width: 100%;">
                 
                   @foreach($data as $item)
                     <option value="{{$item->id}}" @if(isset($edit_data['driver_name']) && $edit_data['driver_name']==$item->id){{ 'selected' }}@endif>{{$item->driver_name}}</option>
                   @endforeach
                  
                  </select>
                  </div>
                </div>
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver ID</label>
                   
                    <input type="text" name="driver_id" id="driver_id" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver Id" value="@if(isset($edit_data['driver_id'])){{ $edit_data['driver_id'] }}@endif">
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Driver Mobile Number</label>
                   
                    <input type="text" name="driver_mobile" id="driver_mobile" class="form-control" id="exampleInputEmail1" placeholder="Enter Driver Number" value="@if(isset($edit_data['driver_mobile'])){{ $edit_data['driver_mobile'] }}@endif">
                    </div>
                  </div>
                 
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Vechile Number</label>
                   
                    <select name="vechile_no" id="vechile" class="form-control select2" style="width: 100%;">
                    
                       @foreach($truck as $item)
                         <option value="{{$item->id}}" @if(isset($edit_data['vechile_no']) && $edit_data['vechile_no']==$item->id){{ 'selected' }}@endif>{{$item->vechile_number}} </option>
                       @endforeach
                      
                      </select>
                    
                    </div>
                  </div>
                 
                  
            
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Vechicle Type (Wheel)</label>
                    @php $whell=App\Truck::where('id', $edit_data['vechile_no'])->first() @endphp
                    
                    <input type="text" name="vechicle_type" class="form-control" id="vechile_type" placeholder="Enter Vechicle Wheel" value="@if(isset($edit_data['vechicle_type'])){{ $edit_data['vechicle_type'] }}@endif {{$whell->vechile_type}}">
                    </div>
                  </div>
                  
                 <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                   
                    <input type="text" name="quantity" class="form-control" id="vechile_type" placeholder="Enter Quantity" value="@if(isset($edit_data['quantity'])){{ $edit_data['quantity'] }}@endif">
                    </div>
                  </div>
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Dgnintiy</label>
                    <select name="dgnitity" id="dgnitity" class="form-control select2" style="width: 100%;">
                        <option value="MT" @if(isset($edit_data['dgnitity']) && $edit_data['dgnitity']== 'MT'){{ 'selected' }}@endif >MT</option>
                        <option value="BAGS" @if(isset($edit_data['dgnitity']) && $edit_data['dgnitity']== 'BAGS'){{ 'selected' }}@endif >BAGS</option>
                    </select>
                    
                    </div>
                  </div>
                
               <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Destination</label>
                    <select name="destination_to" id="destination_to" class="form-control select2" style="width: 100%;">
                 
                   @foreach($rate as $item)
                     <option value="{{$item->id}}" @if(isset($edit_data['destination_to']) && $edit_data['destination_to']==$item->id){{ 'selected' }}@endif>{{$item->destination}} ({{$item->city_code}})</option>
                   @endforeach
                  
                  </select>
                  </div>
                </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Truck Place Date</label>
                   
                    <input type="date" name="truck_place_date" class="form-control" id="exampleInputEmail1" placeholder="Enter Truck Place Date" value="@if(isset($edit_data['truck_place_date'])){{ $edit_data['truck_place_date'] }}@endif">
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
                    
                    <div class="col-md-4 col-sm-6">
                      <!-- select -->
                        <div class="form-group">
                    <label>&nbsp</label><br>
                    <input type="checkbox" id="verify" name="verify" value="verify"  @if(isset($edit_data['verify']) && $edit_data['verify']== 'verify'){{ 'checked' }}@endif  > <label for="verify">Trucked Placed</label>
                        </div>
                    </div>
                    
                    <input type="hidden" name="add_by" class="form-control" id="exampleInputPassword1" placeholder=" " value="{{Auth::user()->id}}">
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
		
		$("#vechile").change(function(){
		    var t_id= $(this).val();
		    
           //console.log(d_id)
            $.ajax({
                  url: '/TruckDetail',
                  type: "Get",
                  dataType: 'json',
                  data:{ 
                        _token:'{{ csrf_token() }}',
                        truck_id:t_id
                    }, 
                   success: function(response){
                        //console.log(response.data);
                        $("#vechile_type").val(response.data.vechile_type);
                        
            }
        });
		    
				
				
		});
		
	});
</script>

  @include('layout/footer')