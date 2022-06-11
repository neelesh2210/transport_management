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
     -o-transition-duration: 0.5s;+
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
              <h3 class="card-title">Debit Voucher</h3>
              @can('debit-voucher-create')
              <!--<a href="{{ route('debit_voucher.create') }}" class="btn btn-primary btn-info" style="float:right;"><i class="fas fa-plus" aria-hidden="true"></i>  Add</a>-->
              @endcan
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Truch No.</th>
                        <th>LR No.</th>
                        <th>LR Date</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Advance Diesel</th>
                        <th>Commission</th>
                        <th>Shorted Claim</th>
                        <th>Balance</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @php $i=1 @endphp
               @foreach($data as $item)
                    <td>{{$i++}}</td>
                    @php $truck=App\Truck::where('id', $item->vechile_no)->first() @endphp
                    <td><a href="/allvoucher/{{$item->vechile_no}}">{{$truck->vechile_number}}</a></td>
                    @php $lr=App\Invoice::where('id', $item->tax_invoice_id)->first() @endphp
                    <td>{{$lr->lorry_receipt_no}}</td>
                    <td>{{$lr->lorry_recepit_date}}</td> 
                    <td>{{$lr->quantitiy}}</td>
                    <td>{{$item->rate}}</td>
                    @php $ls=App\LoadingSlip::where('id', $item->loding_slip_id)->first() @endphp
                    <td>{{$ls->diesel_case_advance}}</td>
                    @php $ts=App\TruckHisab::where('id', $item->truck_hisab_id)->first() @endphp
                    <td>{{$ts->transporter_percent}} %</td>
                    <td>{{$item->shorted_claim}}</td>
                    <td>{{$item->balance}}</td>
                    <td>{{$item->remark}}</td>
                <td>
            <label class="switch">
                  
            <input type="checkbox" class="tog " data-toggle="toggle" value="{{$item->id}}" @if($item->status=='enable') {{$checked}} else {{$unchecked}}  @endif >
            <span class="slider round"></span>
              </label>
                      </td>
                  <td>
                   <div class="btn-group">
         <a href="{{route('debit_voucher.show',$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-view" aria-hidden="true"></i> View</a>
         @can('debit-voucher-edit')
       <a href="{{route('debit_voucher.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit</a>
       @endcan
       @can('debit-voucher-delete')
     <form action="{{ route('debit_voucher.destroy', $item->id) }}" method="POST">
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
              <div class="modal fade" id="invoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog modal-notify modal-info" role="document">
     <!--Content-->
     <div class="modal-content" id="print">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">Debit Voucher</p>
              <img id='profile' src=""  class="img-fluid z-depth-1-half rounded-circle">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">

           
                  <div class="row">
                      <div class="col-6 ">
                 <p id='lr_no'></p>
                 <p id='lr_date'></p>
                 <p id='weight'></p>
                 <p id='rate'> </p>
                 <p id='fright'></p>
                 </div>
                 <div class="col-6 ">
                <p id='advance_diesel'></p>
                  <p id='commission'></p>
                  <p id='shorted_claim'></p>
                  <p id='balance'></p>
                   <p id='remark'></p>
                 
                 </div>
               </div>
           
    
          
          </div>
          
       
       <!--Footer-->
       
     </div>
     <div>
         <button class="modal-content btn" onclick="generatePDF()"> <i class="fas fa-print" style="margin-left:43%;">Print</i></button>
     </div>
      
     <!--/.Content-->
   </div>
</div>
              
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
                     title: "Loading Slip",
                     message: "Status Active!"
                  });
                  // window.setTimeout(function () {
                  //    window.location.reload();
                  // }, 2000);

               } else {
                  $.growl.inactive({
                     title: "Loading Slip",
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
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script>
    function generatePDF() {
       const element = document.getElementById("print");
        // Choose the element and save the PDF for our user.
        html2pdf()
          .from(element)
          .save();
    }
  </script>



<script>
$(document).ready(function(){
  $("#debit_details").click(function(){
      
      var c=$(this).val();
        //console.log(c);
       $.ajax({
               type:'GET',
               url:'../debit_voucher/'+c,
               data:{ 
                _token:'{{ csrf_token() }}',
                
                
            },
               success:function(data) {
                    //console.log(data.data)
                    $('#invoice').modal('show');
                    $('#lr_no').text('LR No: '+data.data.lr_no);
                    $('#lr_date').text('LR Date: '+data.data.lr_date);
                    $('#weight').text('Weight: '+data.data.weight);
                    $('#rate').text('Rate: '+data.data.rate);
                    $('#fright').text('Fright: '+data.data.fright);
                    $('#advance_diesel').text('Advance Diesel: '+data.data.advance_diesel);
                    $('#commission').text('Commission: '+data.data.commission);
                    $('#shorted_claim').text('Shorted Claim: '+data.data.shorted_claim);
                    $('#balance').text('Balance: '+data.data.balance);
                    $('#remark').text('Remark: '+data.data.remark);
               }

            });
      
   
  });
});
</script>

<script>
$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});
</script>

  @include('layout/footer')