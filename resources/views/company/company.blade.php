

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Registration Form</h1>
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
            @if(isset($data['id']))
            
              <form role="form" method="POST" action="{{route('company.update',$data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($data['id']))
                 <form role="form" method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Company Name*</label>
                   
                    <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="@if(isset($data['company_name'])){{ $data['company_name'] }}@endif" required>
                    </div>
                  </div>
                 
                  <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Code*</label>
                    <input type="text" name="company_code" class="form-control" id="exampleInputPassword1" placeholder="Company Code" value="@if(isset($data['company_code'])){{ $data['company_code'] }}@endif" required>
                  </div>
                  </div>

                    <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputFile">Company Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  class="custom-file-input" id="exampleInputFile" name="company_logo">
                        <label class="custom-file-label" for="exampleInputFile">Choose Logo</label>
                      </div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Location*</label>
                    <input type="text" name="company_location" class="form-control" id="exampleInputPassword1" placeholder="Company Location" value="@if(isset($data['company_location'])){{ $data['company_location'] }}@endif" required>
                  </div>
                  </div>



               <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Branch Name</label>
                    <input type="text" name="company_branch_name" class="form-control" id="exampleInputPassword1" placeholder="Company Branch Name" value="@if(isset($data['company_branch_name'])){{ $data['company_branch_name'] }}@endif">
                  </div>
                  </div>

                  <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Branch Code</label>
                    <input type="text" name="company_branch_code" class="form-control" id="exampleInputPassword1" placeholder="Company Branch Code" value="@if(isset($data['company_branch_code'])){{ $data['company_branch_code'] }}@endif">
                  </div>
                  </div>

                  <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company Branch Location</label>
                    <input type="text" name="company_branch_location" class="form-control" id="exampleInputPassword1" placeholder="Company Branch Location" value="@if(isset($data['company_branch_location'])){{ $data['company_branch_location'] }}@endif">
                  </div>
                  </div>
              
                
                 <div class="form-group col-md-4" >
                    <div class="form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> +</button> 
             <label>Material*</label> 
                  <select name="material[]" id="material" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required>
                      @php $materials=App\Material::all();  @endphp
                      @foreach($materials as $material)    
                     <option value="{{$material->name}}"
                     @if(isset($data['material']))
                      @foreach($data['material'] as $material)
                        @if($material==$material->name)
                         {{ 'selected' }}
                        @endif
                      @endforeach
                     @endif  >{{$material->name}}</option>
                     @endforeach
                  </select>
                </div>
                  </div>
                
                   <div class="col-md-4 col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                           <option>Select Status</option>
                          <option value="enable" @if(isset($data['status']) && $data['status']== 'enable'){{ 'selected' }}@endif >Enable</option>
                          <option value="disable" @if(isset($data['status']) && $data['status']== 'disable'){{ 'selected' }}@endif>Disable</option>
                        </select>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <input type="text"  class="form-control" id="option_value" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save_button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#save_button").click(function(){
        var option_value=$('#option_value').val();
      $.ajax({
               type:'POST',
               url:'/material_store',
               data:{ 
                _token:'{{ csrf_token() }}',
                material: option_value,
            },
               success:function(data) {
                 $('#option_value').val('');
                }
               
               });
               
              
        });
   });
</script>
  @include('layout/footer')