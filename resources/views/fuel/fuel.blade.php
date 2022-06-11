

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fuel</h1>
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
                <h3 class="card-title">Fuel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('data')!='')
            <div class="alert alert-success" role="alert">
                {{Session::get('data')}}
            </div>
            @endif
            @if(isset($edit_data['id']))
            
              <form role="form" method="POST" action="{{route('fuel.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('fuel.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">
                    
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Petrol Pump Name</label>
                   
                    <select name="petrol_pump" id="petrol_pump" class="form-control select2" style="width: 100%;">
                 
                       @foreach($petrol_pump as $item)
                         <option value="{{$item->id}}" @if(isset($edit_data['petrol_pump']) && $edit_data['petrol_pump']==$item->id){{ 'selected' }}@endif>{{$item->petrolpump_name}} </option>
                       @endforeach
                      
                      </select>
                    
                    </div>
                 </div>

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Vechile Number</label>
                   
                    <select name="vechile_no" id="vechile_no" class="form-control select2" style="width: 100%;">
                 
                       @foreach($truck as $item)
                         <option value="{{$item->id}}" @if(isset($edit_data['vechile_no']) && $edit_data['vechile_no']==$item->id){{ 'selected' }}@endif>{{$item->vechile_number}} </option>
                       @endforeach
                      
                      </select>
 
                    </div>
                  </div>

                 <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Item</label>
                    <select name="item" id="item" class="form-control select2" style="width: 100%;">
                        <option value="Diesel">Diesel</option>
                        <option value="Petrol">Petrol</option>

                    </select>
                    </div>
                  </div>
                
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Quntity</label>
                   
                    <input type="text" name="quantitiy" id="quntity" class="form-control quntity" placeholder="Enter Quntity " value="@if(isset($edit_data['quantitiy'])){{ $edit_data['quantitiy'] }}@endif">
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Fuel Rate</label>
                   
                    <input type="text" name="rate" id="rate" class="form-control rate" placeholder="Enter Fuel Rate" value="@if(isset($edit_data['rate'])){{ $edit_data['rate'] }}@endif">
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                   
                    <input type="text" name="amount" class="form-control" id="total" placeholder="Enter Amount" value="@if(isset($edit_data['amount'])){{ $edit_data['amount'] }}@endif">
                    </div>
                  </div>
            <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
               
                <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="Enter date" value="@if(isset($edit_data['date'])){{ $edit_data['date'] }}@endif">
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
    $('input[type="text"]').keyup(function () {
    var val1 = parseFloat($('.quntity').val());
    var val2 = parseFloat($('.rate').val());
          var sum = val1*val2;
          $("input#total").val(sum).toFixed(3);
        });
    });  
    
</script>

  @include('layout/footer')