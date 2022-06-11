

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver Registration Form</h1>
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
                <h3 class="card-title">Register</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('data')!='')
              <div class="alert alert-success" role="alert">
                {{Session::get('data')}}
            </div>
            @endif
            @if(isset($edit_data['id']))
            
              <form role="form" method="POST" action="{{route('bill.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('bill.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Bill Number</label>
                   
                    <input type="text" name="bill_number" class="form-control" id="exampleInputEmail1" placeholder="Bill Number" value="@if(isset($edit_data['bill_number'])){{ $edit_data['bill_number'] }}@endif">
                    </div>
                  </div>
                  
                  </div>
                  
                
                  <br/>
                  <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Sr. No.</th>
                        <th>Truch No.</th>
                         <th>Invoice No.</th>
                        <th>LR No.</th>
                        <th>LR Date</th>
                        <th>Rate</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                
                <tbody>
                    @php $i=1 @endphp
               @foreach($data as $item)
               <tr>
                   
                 
                   <td> <input type="checkbox" name="debite_voucher[]" value="{{$item->id}}" ></td>
                    <td>{{$i++}}</td>
                    @php $truck=App\Truck::where('id', $item->vechile_no)->first() @endphp
                    <td>{{$truck->vechile_number}}</td>
                    @php $lr=App\Invoice::where('id', $item->tax_invoice_id)->first() @endphp
                     <td>{{$lr->invoice_number}}</td>
                    <td>{{$lr->lorry_receipt_no}}</td>
                    <td>{{$lr->lorry_recepit_date}}</td> 
                    <td>{{$item->rate}}</td>
                    <td>{{$item->balance}}</td>
       
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

                    <input type="hidden" name="add_by" class="form-control" id="exampleInputPassword1" placeholder=" " value="{{Auth::user()->id}}">
                  </div>

                </div>

             




                
                <!-- /.card-body -->

                <div class="card-footer">
                    @if(isset($edit_data['id']))
                  <button type="submit" class="btn btn-danger">Remove</button>
                  @else
                      <button type="submit" class="btn btn-primary">Submit</button>
                      
                   @endif   
                      
                  
                  
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</section>
</div>

  @include('layout/footer')