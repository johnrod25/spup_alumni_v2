<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>St. Paul University Philippines</title>
  <link rel="shortcut icon" href="{{asset('images/qsu-logo.jpg')}}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">   -->
              <img src="{{asset('assets/dist/img/user-solid.svg')}}" class="user-image img-circle elevation-2" alt="User Image">
              <span class="d-none d-md-inline text-capitalize">{{ auth()->user()->name }}</span>
              <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image -->
              <li class="user-header bg-primary d-flex justify-content-center align-items-center flex-column">
              <img src="{{asset('assets/dist/img/user-solid.svg')}}" class="user-image img-circle elevation-2 bg-white" alt="User Image">
                <p class="text-capitalize">{{ auth()->user()->name }}</p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                {{-- <button class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-profile">Change Passsword</button> --}}
                <a href="#logout" class="btn btn-danger btn-flat float-right" onclick="document.getElementById('logoutForm').submit()">Sign out</a>
                <form method="post" id="logoutForm" action="{{ route('logout') }}">
                    @csrf
                </form>
              </li>
            </ul>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> -->
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{asset('images/qsu-logo.jpg')}}" alt="SPUP" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ALUMNI SYSTEM</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar py-3">

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2 pt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin-dashboard')}}" class="nav-link nav-list">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{route('admin-alumni')}}" class="nav-link nav-list">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Alumni <i class="right fas fa-angle-left"></i></p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin-alumni-request')}}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Alumni Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin-alumni')}}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Alumni List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{route('admin-alumni')}}" class="nav-link nav-list">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>Degree/Course <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin-add-degree')}}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin-manage-degree')}}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{route('admin-book')}}" class="nav-link nav-list">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Book Event <i class="right fas fa-angle-left"></i></p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin-book-request')}}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Booking Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin-book')}}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Booking List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-announcement')}}" class="nav-link nav-list">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Announcements</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-news')}}" class="nav-link nav-list">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>News & Articles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-gallery')}}" class="nav-link nav-list">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Gallery</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('admin-gallery')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>sdfafsd<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin-gallery')}}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#edit-all-attendance" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Edit Attendance</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#report" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Report</p>
                    </a>
                </li> --}}

            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
<!-- /.sidebar -->
</aside>


<div class="modal fade" id="modal-profile">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Change Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="row g-3 needs-validation px-3" id="profile=form">
                <!-- First Row -->
                <div class="col-lg-12">
                    <div class="form-group">
                    <label>Current Password</label>
                    <input type="text" name="currpass" class="form-control" placeholder="Current Password" id="currentpass">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                    <label>New Password</label>
                    <input type="text" name="newpass" class="form-control" placeholder="New Password" id="newpass">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="text" name="confirmpass" class="form-control" placeholder="Confirm Password" id="confirmpass">
                    </div>
                </div>

                </form>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="change-password">Submit</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid mt-2">
