@include('layout/header')
@include('layout/sidebar')

<div class="content-wrapper">
    @php
        $employee = \App\Emplyoeeprofile::count();
        $PetrolPump = \App\PetrolPump::count();
        $VehicleOwner = \App\VechileOwner::count();
        $driver = \App\Driver::count();
        $truck = \App\Truck::count();
        $Loading_Slip = \App\LoadingSlip::count();
        $truck_placement = \App\TruckPlace::count();
        $DebitVoucher = \App\DebitVoucher::count();
    @endphp
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$employee}}</h3>
                            <p>Total Employees</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{route('emplyoee_profile.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$PetrolPump}}</h3>
                            <p>Total Petrol Pump</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shower"></i>
                        </div>
                        <a href="{{route('petrol_pump.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
               
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$VehicleOwner}}</h3>

                            <p>Total Vehicle Owner</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-circle"></i>
                        </div>
                        <a href="{{route('vechile_owner.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$driver}}</h3>

                            <p>Total Drivers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-male"></i>
                        </div>
                        <a href="{{route('driver.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
            </div>
                
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$truck}}</h3>
                            <p>Total Truck</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-truck"></i>
                        </div>
                        <a href="{{route('truck.index')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$Loading_Slip}}</h3>
                            <p>Total Loading Slip</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sticky-note"></i>
                        </div>
                        <a href="{{route('loading_slip.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
               
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$truck_placement}}</h3>

                            <p>Total Truck Placement</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-truck"></i>
                        </div>
                        <a href="{{route('truck_placement.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$DebitVoucher}}</h3>

                            <p>Debit Voucher</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-male"></i>
                        </div>
                        <a href="{{route('debit_voucher.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
            </div>
            
            @if ($message = Session::get('success'))
            <div class="alert alert-danger col-4" style="text-align: center; margin: auto;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ $message }}
            </div>
            @endif
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@include('layout/footer')