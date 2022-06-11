
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$page_name}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  
 <link rel="stylesheet" href="{{ URL::asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

   <link rel="stylesheet" href="{{ URL::asset('plugins/fontawesome-free/css/all.min.css')  }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker.css')  }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')  }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')  }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')  }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/select2/css/select2.min.css')  }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')  }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')  }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('/css/adminlte.min.css')  }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ URL::asset('/plugins/fontawesome-free/css/all.min.css')  }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')  }}">


  <link rel="stylesheet" href="{{ URL::asset('/plugins/select2/css/select2.min.css')  }}">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')  }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/jqvmap/jqvmap.min.css')  }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('/css/adminlte.min.css')  }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/jquery.growl.css')  }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')  }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/daterangepicker/daterangepicker.css')  }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ URL::asset('/plugins/summernote/summernote-bs4.css')  }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ URL::asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')  }}">
  <link rel="stylesheet" href="{{ URL::asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')  }}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

     
    </ul>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
              </form>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      
    </form>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      
       <li><a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
        
     
    </ul>
  </nav>
