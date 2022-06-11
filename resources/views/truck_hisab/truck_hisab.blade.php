

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Truck Hishab</h1>
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
                <h3 class="card-title">Truck Hishab</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('data')!='')
            <div class="alert alert-success" role="alert">
                {{Session::get('data')}}
            </div>
            @endif
            @if(isset($edit_data['id']))
            
              <form role="form" method="POST" action="{{route('truck_hisab.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('truck_hisab.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                   <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Vechile Number</label>
                   
                    <select name="vechile_no" id="vechile_no" class="form-control select2" style="width: 100%;" disabled>
                 
                       @foreach($truck as $item)
                         <option value="{{$item->id}}" @if(isset($edit_data['vechile_no']) && $edit_data['vechile_no']==$item->id){{ 'selected' }}@endif>{{$item->vechile_number}} </option>
                       @endforeach
                      
                      </select>
 
                    </div>
                  </div>

                <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Destination</label>
                    <select name="destination" id="destination" class="form-control select2" style="width: 100%;" disabled>
                    
                   @foreach($rate as $item)
                     <option value="{{$item->id}}" @if(isset($edit_data['destination']) && $edit_data['destination']==$item->id){{ 'selected' }}@endif>{{$item->destination}} ({{$item->city_code}})</option>
                   @endforeach
                  
                  </select>
                  </div>
                </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Material Name</label>
                   
                    <input type="text" name="material" class="form-control" id="exampleInputEmail1" placeholder="Enter Material Name" value="@if(isset($edit_data['material'])){{ $edit_data['material'] }}@endif" readonly>
                    </div>
                </div>
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Rate</label>
                   
                    <input type="text" name="rate" id="freight" class="form-control rate" id="exampleInputEmail1" placeholder="Enter Rate" value="@if(isset($edit_data['rate'])){{ $edit_data['rate'] }}@endif" readonly>
                    </div>
                </div>
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                   
                    <input type="text" name="quantity" id="quantity" class="form-control quntity" id="exampleInputEmail1" placeholder="Enter Quantity" value="@if(isset($edit_data['quantity'])){{ $edit_data['quantity'] }}@endif" readonly>
                    </div>
                </div>
                
               
                
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Transporter Percent %</label>
                   
                    <input type="text" name="transporter_percent" id="transporter_percent" class="form-control tp" id="exampleInputEmail1" placeholder="Enter Driver Id" value="@if(isset($edit_data['transporter_percent'])){{ $edit_data['transporter_percent'] }}@endif">
                    </div>
                  </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">TAC %</label>
                   
                    <input type="text" name="tac" id="tac" class="form-control tac" id="exampleInputEmail1" placeholder="Enter TAC" value="@if(isset($edit_data['tac'])){{ $edit_data['tac'] }}@endif">
                    </div>
                  </div>
                 
                  
                  
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Unloding by Company</label>
                   
                    <input type="text" name="unloding" class="form-control uc" id="unloding" placeholder="Enter Unloding by Company" value="@if(isset($edit_data['unloding'])){{ $edit_data['unloding'] }}@endif" readonly>
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Cash Advance</label>
                   
                    <input type="text" name="cash_advance" class="form-control casead" id="cash_advance" placeholder="Enter Cash Advance" value="@if(isset($edit_data['cash_advance'])){{ $edit_data['cash_advance'] }}@endif" readonly>
                    </div>
                  </div>
                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Diesel Cash Advance</label>
                   
                    <input type="text" name="diesel" class="form-control dcad" id="diesel" placeholder="Enter Diesel Quantity (Litre)" value="@if(isset($edit_data['diesel'])){{ $edit_data['diesel'] }}@endif" readonly>
                    </div>
                  </div>
                <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Total(Rs)</label>
                   
                    <input type="test" name="total" class="form-control" id="total" placeholder="Enter Diesel Slip Number" value="@if(isset($edit_data['total'])){{ $edit_data['total'] }}@endif" readonly>
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
                    <input type="checkbox" id="verify" name="verify" value="verify"  @if(isset($edit_data['verify']) && $edit_data['verify']== 'verify'){{ 'checked' }}@endif  > <label for="verify">Verify Truck Hisab To Create Debit Voucher</label>
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
    $('input[type="text"]').keyup(function () {
        var rate = parseFloat($('.rate').val());
        var qty = parseFloat($('.quntity').val());
        var total=rate*qty;
        var tranport_per= parseFloat($('#transporter_percent').val());
        var tac_per= parseFloat($('#tac').val());
        
        var cash_advance=parseFloat($('#cash_advance').val());
        
        
        
        
         if(tranport_per && tac_per){
            var sub_total=total*(tranport_per/100);
             var tac_per_amount=cash_advance*(tac_per/100);
            var new_sub_total=mytotal()-sub_total-tac_per_amount;
            $('#total').val(new_sub_total);
           }
          else if(tranport_per){
            var sub_total=total*(tranport_per/100);
            var new_sub_total=mytotal()-sub_total;
            $('#total').val(new_sub_total);
           }
           else if(tac_per){
                if(cash_advance){
             var tac_per_amount=cash_advance*(tac_per/100);
            var new_sub_total=mytotal()-tac_per_amount;
            $('#total').val(new_sub_total);
                }else{
                    alert('Error');
                }
           }
           else{
               
                 $('#total').val(mytotal());
           }
        });
    });  
    
    function mytotal() {
       
       var total=0;
        var rate = parseFloat($('.rate').val());
        var qty = parseFloat($('.quntity').val());
        var cash_adv = parseFloat($('#cash_advance').val());
        var unloding = parseFloat($('#unloding').val());
        var diesel = parseFloat($('#diesel').val());
        if(cash_adv && diesel){
            total=total+cash_adv+diesel;
        }
        else if(cash_adv){
            total=total+cash_adv;
        }
        else if(diesel){
            total=total+diesel;
        }
        else if(diesel && cash_adv){
            total=total+diesel+cash_adv;
        }
      var grant_total =  (rate*qty)-(total);
      return grant_total;  
} 
    
</script>

<script>
  $(document).ready(function(){
        var total=0;
        var rate = parseFloat($('.rate').val());
        var qty = parseFloat($('.quntity').val());
        var cash_adv = parseFloat($('#cash_advance').val());
        var unloding = parseFloat($('#unloding').val());
        var diesel = parseFloat($('#diesel').val());
        if(cash_adv && diesel){
            total=total+cash_adv+diesel;
        }
        else if(cash_adv){
            total=total+cash_adv;
        }
        else if(diesel){
            total=total+diesel;
        }
        else if(diesel && cash_adv){
            total=total+diesel+cash_adv;
        }
        // else if(cash_adv){
        //     total=total+cash_adv;
        // }
        // else if(unloding){
        //     total=total+unloding;
        // }
        // else if(diesel){
        //     total=total+diesel;
        // }

        $('#total').val((rate*qty)-(total));
        
      
    });  
    
   
    
    
    
</script>


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
  @include('layout/footer')