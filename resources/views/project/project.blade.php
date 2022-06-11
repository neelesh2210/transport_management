

@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Registration Form</h1>
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
            
              <form role="form" method="POST" action="{{route('project.update',$edit_data['id'])}}" enctype="multipart/form-data">
                @method('PUT')

                @endif
                @if(empty($edit_data['id']))
                 <form role="form" method="POST" action="{{route('project.store')}}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-body">

                <div class="row">

                  <div class="form-group col-md-4" >
                    <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                   
                    <input type="text" name="project_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="@if(isset($edit_data['project_name'])){{ $edit_data['project_name'] }}@endif">
                    </div>
                  </div>
                 
                  <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputPassword1">Project Start Date</label>
                    <input type="date" name="project_start_date" class="form-control" id="exampleInputPassword1" placeholder="Company Code" value="@if(isset($edit_data['project_start_date'])){{ $edit_data['project_start_date'] }}@endif">
                  </div>
                  </div>

                    <div class="form-group col-md-4" >
                  <div class="form-group">
                    <label for="exampleInputFile">Project End Date</label>
                   <input type="date" name="project_end_date" class="form-control" id="exampleInputPassword1" placeholder="Company Code" value="@if(isset($edit_data['project_end_date'])){{ $edit_data['project_end_date'] }}@endif">
                    </div>
                  </div>


                 


              
                   <div class="col-md-4 col-sm-6">
               <div class="form-group">
                  <label>Project Mentor Name</label>
                 @php $project_mentor_name=array();
                   if(isset($edit_data['project_mentor_name']))$project_mentor_name=explode(',',$edit_data['project_mentor_name'])  @endphp
                  <select class="form-control select2" name="project_mentor_name[]" style="width: 100%;" multiple >
                     @foreach($data as $item)
                    <option  value="{{$item->id}}"  @if(in_array($item->id,$project_mentor_name)){{ 'selected' }}@endif>{{$item->emplyoee_name}}</option>
                   @endforeach
                  </select>
                </div>
                </div>

                 
                   <div class="col-md-4 col-sm-6">
               <div class="form-group">
                  <label>Project Team Member Name</label>
                  @php $project_team_members=array(); 
                 if(isset($edit_data['project_team_members'])) $project_team_members=explode(',',$edit_data['project_team_members']) @endphp
                  <select class="form-control select2" name="project_team_members[]" style="width: 100%;" multiple >
                      @foreach($data as $item)
                    <option  value="{{$item->id}}" @if(in_array($item->id,$project_team_members)){{ 'selected' }}@endif>{{$item->emplyoee_name}}</option>
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
                          <option value="enable" @if(isset($edit_data['status']) && $edit_data['status']== 'enable'){{ 'selected' }}@endif >Enable</option>
                          <option value="disable" @if(isset($edit_data['status']) && $edit_data['status']== 'disable'){{ 'selected' }}@endif>Disable</option>
                        </select>
                      </div>
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

  @include('layout/footer')