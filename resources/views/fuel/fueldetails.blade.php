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
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="http://truck.techuptechnologies.com/invoice-css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="http://truck.techuptechnologies.com/invoice-css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="http://truck.techuptechnologies.com/invoice-css/stylesheet.css"/>

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
    
            <div class="container-fluid invoice-container">
              <!-- Header -->
              <header>
              <div class="row align-items-center">
                <div class="col-sm-12 text-center">
                  <h4 class="text-7 mb-0">FUEL DETAILS</h4>
                </div>
              </div>
              <hr>
              </header>
              
              <!-- Main Content -->
              <main>
              <div class="row">
                <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Vehicle Number : </strong>
                  <address>
                       @php $truck=App\Truck::where('id', $data['vechile_no'] )->first()  @endphp 
                 {{$truck->vechile_number}}
                  
                  </address>
                  
                </div>
                <div class="col-sm-6 order-sm-0"> <strong>Petrol Pump Name : </strong>
                  <address>
                      @php $petrol=App\PetrolPump::where('id', $data['petrol_pump'])->first()  @endphp 
                  {{$petrol->petrolpump_name}}<br />
                  <strong>Date : </strong>{{$data['date']}}<br />
                 
                  </address>
                </div>
              </div>
              <hr> 
              <!-- <div class="row">-->
              <!--  <div class="col-sm-6"><strong>Service Performed By:</strong> Kaaya beauty, Varanasi</div>-->
              <!--  <div class="col-sm-6 text-sm-right">-->
              <!--  <strong>Booking No. & Dt:</strong> 1/04/2021-->
              <!--  <br/>-->
              <!--  <strong>Invoice No. :</strong> 99292Dfaa-->
              <!--  <br/>-->
              <!--  <strong>Invoice Date :</strong> 1/04/2021-->
              <!--  <br/>-->
              <!--  </div>-->
                
              <!--</div>-->
              <!--<hr> -->
            
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table mb-0 table-bordered">
            		<thead class="card-header">
                      <tr>
                        <td class="col-3 border-0"><strong>Item</strong></td>
                        
            			<td class="col-1 text-center border-0"><strong>QTY (Liter)</strong></td>
                        <td class="col-2 text-right border-0"><strong>Rate</strong></td>
                        
                        <td class="col-2 text-right border-0"><strong>Total</strong></td>
                      </tr>
                    </thead>
                      <tbody>
                        <tr>
                          <td class="col-3 border-0">{{$data['item']}}</td>
                          
            			    <td class="col-3 text-center border-0">{{$data['quantitiy']}} L</td>
            			        
                          <td class="col-2 text-right border-0">{{$data['rate']}}</td>
                          <td class="col-2 text-right border-0">{{$data['amount']}}</td>
                        </tr>
                        
                        
                      </tbody>
                                
            
            
                    </table>
            <!--                     <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-sm-right">
                <div  class="ss">
                <strong>Booking No. & Dt:</strong> 1/04/2021
                <br/>
                <strong>Invoice No. :</strong> 99292Dfaa
                <br/>
                <strong>Invoice Date :</strong> 1/04/2021
                <br/>
                </div>
                </div>
                
              </div>-->
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6 text-sm-right">
                <strong>Payment Details:</strong> <br/>
                
                <strong>Net Payable:</strong> {{$data['amount']}} Rs.
                <br/>
                </div>
                
              </div>
              </main>
              <!-- Footer -->
              <footer class="text-center mt-4">
              
              <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-primary border text-white shadow-none"><i class="fa fa-print"></i> Print</a></div>
              </footer>
            </div>
                
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
  $("#invoice_details").click(function(){
      
      var c=$(this).val();
        //console.log(c);
       $.ajax({
               type:'GET',
               url:'../invoice/'+c,
               data:{ 
                _token:'{{ csrf_token() }}',
                
                
            },
               success:function(data) {
                    //console.log(data.data.invoice_number)
                    $('#invoice').modal('show');
                    $('#invoice_number').text('Invoice No: '+data.data.invoice_number);
                    $('#invoice_number_date').text('Invoice Date: '+data.data.invoice_number_date);
                    $('#sales_order_number').text('Sales Order Number: '+data.data.sales_order_number);
                    $('#sales_order_date').text('Sales_Order Date: '+data.data.sales_order_date);
                    $('#customer').text('Customer: '+data.data.customer);
                    $('#consignee').text('Consignee: '+data.data.consignee);
                    $('#vechile_no').text('Vechile No: '+data.data.vechile_no);
                    $('#transport_name').text('Transport Name: '+data.data.transport_name);
                    $('#lorry_receipt_no').text('Lorry Receipt No: '+data.data.lorry_receipt_no);
                    $('#lorry_recepit_date').text('Lorry Recepit Date: '+data.data.lorry_recepit_date);
                    $('#company_gst').text('Company GST No: '+data.data.company_gst);
                    $('#delivery_instruction_no').text('Delivery Instruction No: '+data.data.delivery_instruction_no);
                    $('#destination').text('Destination: '+data.data.destination);
                    $('#dgnintiy').text('Consignee: '+data.data.dgnintiy);
                    $('#quantitiy').text('Vechile No: '+data.data.quantitiy);
                    $('#rate_pmt').text('Rate PMT: '+data.data.rate_pmt);
                    $('#ammount_rs').text('Ammount Rs: '+data.data.ammount_rs);
                    $('#tax').text('tax: '+data.data.tax);
                    $('#total').text('Total: '+data.data.total);
                    $('#net_payable').text('Net Payable: '+data.data.net_payable);
                    $('#way_bill_no').text('Way Bill No: '+data.data.way_bill_no);
                    $('#way_bill_date').text('Way Bill Date: '+data.data.way_bill_date);
                
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