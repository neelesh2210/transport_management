<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ URL::asset('images/AdminLTELogo.png')  }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{Auth::user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('images/truck.jpg')  }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('home')}}" class="d-block">JMS TRADER</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
           
          </li>
          


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Registration
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('companies-list')
              <li class="nav-item">
                <a href="{{route('company.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Company</p>
                </a>
              </li> 
              @endcan
              @can('employee-list')
              <li class="nav-item">
                <a href="{{route('emplyoee.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Employee</p>
                </a>
              </li>
              @endcan
              @can('employee-profile-list')
              <li class="nav-item">
                <a href="{{route('emplyoee_profile.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Profile</p>
                </a>
              </li>
              @endcan
              @can('petrol-pump-list')
              <li class="nav-item">
                <a href="{{route('petrol_pump.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Petrol Pump</p>
                </a>
              </li>
              @endcan
              @can('vehicle-owner-list')
              <li class="nav-item">
                <a href="{{route('vechile_owner.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Vechile Owner</p>
                </a>
              </li>
              @endcan
              @can('driver-list') 
              <li class="nav-item">
                <a href="{{route('driver.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Driver</p>
                </a>
              </li>
              @endcan
              @can('truck-list')
              <li class="nav-item">
                <a href="{{route('truck.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Truck</p>
                </a>
              </li>
              @endcan
              @can('rate-chart-list')
              <li class="nav-item">
                <a href="{{route('rate_chart.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Rate Chart</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            @can('fuel-list')
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('fuel.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fuel</p>
                </a>
              </li>
            </ul>
            @endcan
            @can('loading-slip-list')
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('loading_slip.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loading Slip</p>
                </a>
              </li>
            </ul>
            @endcan
            @can('truck-place-list')
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('truck_placement.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Truck Placemnet</p>
                </a>
              </li>
            </ul>
            @endcan
            @can('invoice-list')
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('invoice.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tax Invoice</p>
                </a>
              </li>
            </ul>
            @endcan
            @can('truck-hisab-list')
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('truck_hisab.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Truck Hisab</p>
                </a>
              </li>
            </ul>
            @endcan
            @can('debit-voucher-list')
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('debit_voucher.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Debit Voucher</p>
                </a>
              </li>
            </ul>
            @endcan
            
          </li>
          @can('billing-list')
          <li class="nav-item has-treeview">
            <a href="{{route('bill.index')}}" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i> 
              <p>
               Billing
                
              </p>
            </a>
          </li>
          @endcan
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            @can('user-list')
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
            @endcan
            @can('role-list')
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
            @endcan
          </li>
      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>