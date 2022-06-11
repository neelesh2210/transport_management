

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tax Invoice</h1>
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
                <h3 class="card-title">Tax Invoice</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('data')!='')
            <div class="alert alert-success" role="alert">
                {{Session::get('data')}}
            </div>
            @endif
            @if(isset($edit_data['id']))
            
              <form role="form" method="POST" action="{{route('invoice.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('invoice.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Invoice Number</label>
                    <input type="hidden" name="tp_id" class="form-control" value="@if(isset($truck_place['id'])){{ $truck_place['id'] }}@endif @if(isset($edit_data['tp_id'])){{ $edit_data['tp_id'] }}@endif">
                    <input type="text" name="invoice_number" class="form-control" id="exampleInputEmail1" placeholder=" Enter Invoice Number" value="@if(isset($edit_data['invoice_number'])){{ $edit_data['invoice_number'] }}@endif">
                    </div>
                  </div>
                  
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Invoice Date</label>
                   
                    <input type="date" name="invoice_number_date" class="form-control" id="exampleInputEmail1" placeholder=" Enter Invoice Date" value="@if(isset($edit_data['invoice_number_date'])){{ $edit_data['invoice_number_date'] }}@endif">
                    </div>
                  </div>
                  
        
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Sale Order Number</label>
                   
                    <input type="text" name="sales_order_number" id="owner_phone_first" class="form-control" id="exampleInputEmail1" placeholder="Sale Order Number" value="@if(isset($edit_data['sales_order_number'])){{ $edit_data['sales_order_number'] }}@endif">
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Sale Order Date</label>
                   
                    <input type="date" name="sales_order_date" class="form-control" id="exampleInputEmail1" placeholder=" Enter Sale Order Date" value="@if(isset($edit_data['sales_order_date'])){{ $edit_data['sales_order_date'] }}@endif">
                    </div>
                 </div>
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Customer</label>
                   
                    <input type="text" name="customer" id="customer" class="form-control" id="exampleInputEmail1" placeholder="Enter Customer" value="@if(isset($edit_data['customer'])){{ $edit_data['customer'] }}@endif">
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Consignee</label>
                   
                    <input type="text" name="consignee" id="consignee" class="form-control" id="exampleInputEmail1" placeholder="Enter Consignee" value="@if(isset($edit_data['consignee'])){{ $edit_data['consignee'] }}@endif">
                    </div>
                </div>
                 
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Vechile Number</label>
                   
                    <select name="vechile_no" id="vechile_no" class="form-control select2" style="width: 100%;">
                 
                       @foreach($truck as $item)
                         <option value="{{$item->id}}" @if(isset($edit_data['vechile_no']) && $edit_data['vechile_no']==$item->id){{ 'selected' }} @endif  @if(isset($truck_place['vechile_no']) && $truck_place['vechile_no']==$item->id){{ 'selected' }} @endif>{{$item->vechile_number}} </option>
                       @endforeach
                      
                      </select>
                    
                    
                    
                    
                    </div>
                  </div>
                  
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Transporter Name</label>
            
                    <select name="transport_name" id="transport_name" class="form-control select2" style="width: 100%;">
                 
                       @foreach($comp as $item)
                         <option value="{{$item->id}}" @if(isset($edit_data['transport_name']) && $edit_data['transport_name']==$item->id){{ 'selected' }}@endif>{{$item->company_name}} ({{$item->company_code}}) </option>
                       @endforeach
                      
                      </select>
                    </div>
                  </div>
                  
                 <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Lorry Receipt Number</label>
                   
                    <input type="text" name="lorry_receipt_no" id="transport_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Lorry Receipt Number" value="@if(isset($edit_data['lorry_receipt_no'])){{ $edit_data['lorry_receipt_no'] }}@endif">
                    </div>
                  </div>
                
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Lorry Receipt Date</label>
                   
                    <input type="date" name="lorry_recepit_date" class="form-control" id="exampleInputEmail1" placeholder=" " value="@if(isset($edit_data['lorry_recepit_date'])){{ $edit_data['lorry_recepit_date'] }}@endif">
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Company's GST Number</label>
                   
                    <input type="text" name="company_gst" class="form-control" id="exampleInputEmail1" placeholder="Enter Company's GST Number" value="@if(isset($edit_data['company_gst'])){{ $edit_data['company_gst'] }}@endif">
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Delivery Instruction Number</label>
                   
                    <input type="text" name="delivery_instruction_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Delivery Instruction Number" value="@if(isset($edit_data['delivery_instruction_no'])){{ $edit_data['delivery_instruction_no'] }}@endif">
                    </div>
                  </div>

                <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Destination And City Code</label>
                    <select name="destination" id="destination" class="form-control select2" style="width: 100%;">
                 
                   @foreach($rate as $item)
                     <option value="{{$item->id}}" @if(isset($edit_data['destination']) && $edit_data['destination']==$item->id){{ 'selected' }}@endif  @if(isset($truck_place['destination_to']) && $truck_place['destination_to']==$item->id){{ 'selected' }} @endif >{{$item->destination}} ({{$item->city_code}})</option>
                   @endforeach
                  
                  </select>
                  </div>
                </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Rate</label>
                   
                    <input type="text" name="rate_pmt" class="form-control" id="freight" placeholder="Enter Rate" value="@if(isset($edit_data['rate_pmt'])){{ $edit_data['rate_pmt'] }}@endif">
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Dgnintiy</label>
                    <select name="dgnintiy" id="in_dgnitity" class="form-control select2" style="width: 100%;">
                        <option value="MT" @if(isset($edit_data['dgnitity']) && $edit_data['dgnitity']== 'MT'){{ 'selected' }}@endif  @if(isset($truck_place['dgnitity']) && $truck_place['dgnitity']== 'MT'){{ 'selected' }}@endif>MT</option>
                        <option value="BAGS" @if(isset($edit_data['dgnitity']) && $edit_data['dgnitity']== 'BAGS'){{ 'selected' }}@endif @if(isset($truck_place['dgnitity']) && $truck_place['dgnitity']== 'BAGS'){{ 'selected' }}@endif>BAGS</option>
                    </select>
                    
                    </div>
                 </div>  
            <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
               
                <input type="text" name="quantitiy" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" value="@if(isset($edit_data['quantitiy'])){{ $edit_data['quantitiy'] }}@endif @if(isset($truck_place['quantity'])){{ $truck_place['quantity'] }}@endif">
                </div>
            </div>
            
            <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Product Description</label>
               
                <input type="text" name="product_description" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Description" value="@if(isset($edit_data['product_description'])){{ $edit_data['product_description'] }}@endif">
                </div>
            </div>
            
            <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Unloading By Company</label>
               
                <input type="text" name="unloading" class="form-control" id="exampleInputEmail1" placeholder="Unloading By Company" value="@if(isset($edit_data['unloading'])){{ $edit_data['unloading'] }}@endif">
                </div>
            </div>

            <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Way Bill Number</label>
               
                <input type="text" name="way_bill_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Way Bill Number " value="@if(isset($edit_data['way_bill_no'])){{ $edit_data['way_bill_no'] }}@endif">
                </div>
            </div>
             <div class="form-group col-md-4" >
                <div class="form-group">
                <label for="exampleInputEmail1">Way Bill Date</label>
               
                <input type="date" name="way_bill_date" class="form-control" id="exampleInputEmail1" placeholder="Enter Way Bill Date" value="@if(isset($edit_data['way_bill_date'])){{ $edit_data['way_bill_date'] }}@endif">
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
		
		$("#destination").change(function(){
		    var d_id= $(this).val();
		    
           //console.log(d_id)
            $.ajax({
                  url: '/RateDetail',
                  type: "Get",
                  dataType: 'json',
                  data:{ 
                        _token:'{{ csrf_token() }}',
                        rate_id:d_id
                    }, 
                   success: function(response){
                        //console.log(response.data);
                         $("#freight").val(response.data.freight);
                        
                    }
                });
	
		});
		
	});
</script>

<script>
	$(document).ready(function(){
     
        var d_id= 	$("#destination").val();
		    
           //console.log(d_id)
            $.ajax({
                  url: '/RateDetail',
                  type: "Get",
                  dataType: 'json',
                  data:{ 
                        _token:'{{ csrf_token() }}',
                        rate_id:d_id
                    }, 
                   success: function(response){
                        //console.log(response.data);
                         $("#freight").val(response.data.freight);
                        
                    }
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
  @include('layout/footer')