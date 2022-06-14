<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ URL::asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ URL::asset('images/truck.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('home') }}" class="d-block">JMS TRADER</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('home') }}" class="nav-link @if(Route::currentRouteName() == 'home') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'company.index' || Route::currentRouteName() == 'company.create' || Route::currentRouteName() == 'company.edit' || Route::currentRouteName() == 'branch.index' || Route::currentRouteName() == 'branch.create' || Route::currentRouteName() == 'branch.edit' || Route::currentRouteName() == 'emplyoee.index' || Route::currentRouteName() == 'emplyoee.create' || Route::currentRouteName() == 'emplyoee.edit' || Route::currentRouteName() == 'emplyoee_profile.index' || Route::currentRouteName() == 'emplyoee_profile.create' || Route::currentRouteName() == 'emplyoee_profile.edit' || Route::currentRouteName() == 'petrol_pump.index' || Route::currentRouteName() == 'petrol_pump.create' || Route::currentRouteName() == 'petrol_pump.edit' || Route::currentRouteName() == 'vechile_owner.index' || Route::currentRouteName() == 'vechile_owner.create' || Route::currentRouteName() == 'vechile_owner.edit' || Route::currentRouteName() == 'driver.index' || Route::currentRouteName() == 'driver.create' || Route::currentRouteName() == 'driver.edit' || Route::currentRouteName() == 'truck.index' || Route::currentRouteName() == 'truck.create' || Route::currentRouteName() == 'truck.edit' || Route::currentRouteName() == 'rate_chart.index' || Route::currentRouteName() == 'rate_chart.create' || Route::currentRouteName() == 'rate_chart.edit') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Registration<i class="fas fa-angle-left right"></i><span class="badge badge-info right"></span></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('companies-list')
                            <li class="nav-item">
                                <a href="{{ route('company.index') }}" class="nav-link @if(Route::currentRouteName() == 'company.index' || Route::currentRouteName() == 'company.create' || Route::currentRouteName() == 'company.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Company</p>
                                </a>
                            </li>
                        @endcan
                        @can('companies-list')
                            <li class="nav-item">
                                <a href="{{ route('branch.index') }}" class="nav-link @if(Route::currentRouteName() == 'branch.index' || Route::currentRouteName() == 'branch.create' || Route::currentRouteName() == 'branch.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Branch</p>
                                </a>
                            </li>
                        @endcan
                        @can('employee-list')
                            <li class="nav-item">
                                <a href="{{ route('emplyoee.index') }}" class="nav-link @if(Route::currentRouteName() == 'emplyoee.index' || Route::currentRouteName() == 'emplyoee.create' || Route::currentRouteName() == 'emplyoee.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employee</p>
                                </a>
                            </li>
                        @endcan
                        @can('employee-profile-list')
                            <li class="nav-item">
                                <a href="{{ route('emplyoee_profile.index') }}" class="nav-link @if(Route::currentRouteName() == 'emplyoee_profile.index' || Route::currentRouteName() == 'emplyoee_profile.create' || Route::currentRouteName() == 'emplyoee_profile.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employee Profile</p>
                                </a>
                            </li>
                        @endcan
                        @can('petrol-pump-list')
                            <li class="nav-item">
                                <a href="{{ route('petrol_pump.index') }}" class="nav-link @if(Route::currentRouteName() == 'petrol_pump.index' || Route::currentRouteName() == 'petrol_pump.create' || Route::currentRouteName() == 'petrol_pump.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Petrol Pump</p>
                                </a>
                            </li>
                        @endcan
                        @can('vehicle-owner-list')
                            <li class="nav-item">
                                <a href="{{ route('vechile_owner.index') }}" class="nav-link @if(Route::currentRouteName() == 'vechile_owner.index' || Route::currentRouteName() == 'vechile_owner.create' || Route::currentRouteName() == 'vechile_owner.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vechile Owner</p>
                                </a>
                            </li>
                        @endcan
                        @can('driver-list')
                            <li class="nav-item">
                                <a href="{{ route('driver.index') }}" class="nav-link @if(Route::currentRouteName() == 'driver.index' || Route::currentRouteName() == 'driver.create' || Route::currentRouteName() == 'driver.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Driver</p>
                                </a>
                            </li>
                        @endcan
                        @can('truck-list')
                            <li class="nav-item">
                                <a href="{{ route('truck.index') }}" class="nav-link @if(Route::currentRouteName() == 'truck.index' || Route::currentRouteName() == 'truck.create' || Route::currentRouteName() == 'truck.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Truck</p>
                                </a>
                            </li>
                        @endcan
                        @can('rate-chart-list')
                            <li class="nav-item">
                                <a href="{{ route('rate_chart.index') }}" class="nav-link @if(Route::currentRouteName() == 'rate_chart.index' || Route::currentRouteName() == 'rate_chart.create' || Route::currentRouteName() == 'rate_chart.edit') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rate Chart</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'loading_slip.index') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Management<i class="fas fa-angle-left right"></i><span class="badge badge-info right"></span></p>
                    </a>
                    {{-- @can('fuel-list')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('fuel.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fuel</p>
                                </a>
                            </li>
                        </ul>
                    @endcan --}}
                    @can('loading-slip-list')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('loading_slip.index') }}" class="nav-link @if(Route::currentRouteName() == 'loading_slip.index') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Loading Slip</p>
                                </a>
                            </li>
                        </ul>
                    @endcan
                    {{-- @can('truck-place-list')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('truck_placement.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Truck Placemnet</p>
                                </a>
                            </li>
                        </ul>
                    @endcan --}}
                    {{-- @can('invoice-list')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('invoice.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tax Invoice</p>
                                </a>
                            </li>
                        </ul>
                    @endcan
                    @can('truck-hisab-list')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('truck_hisab.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Truck Hisab</p>
                                </a>
                            </li>
                        </ul>
                    @endcan
                    @can('debit-voucher-list')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('debit_voucher.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Debit Voucher</p>
                                </a>
                            </li>
                        </ul>
                    @endcan --}}

                </li>
                {{-- @can('billing-list')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('bill.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                            <p>Billing</p>
                        </a>
                    </li>
                @endcan --}}
                {{-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User Management<i class="fas fa-angle-left right"></i><span class="badge badge-info right"></span></p>
                    </a>
                    @can('user-list')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        </ul>
                    @endcan
                    @can('role-list')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                        </ul>
                    @endcan
                </li> --}}
            </ul>
        </nav>
    </div>
</aside>
