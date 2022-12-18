<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' )}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css' )}}">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/articles" class="nav-link">Articles</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/category" class="nav-link">Category</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/subCategory" class="nav-link">Sub Category</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/tag" class="nav-link">Tag</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/userList" class="nav-link">User</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="btn btn-dark" href="/logout" role="button">Logout</a>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <span class="brand-text font-weight-light">Blog System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('fotoArticle/'. Auth::user()->foto) }}" alt="User profile picture" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="profile/{{ Auth::user()->id }}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
                <a href="/articles" class="nav-link">
                  <p>Articles</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/category" class="nav-link">
                  <p>Category</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/subCategory" class="nav-link">
                  <p>Sub Category</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/tag" class="nav-link">
                  <p>Tag</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/userList" class="nav-link">
                  <p>User List</p>
                </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js ')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js ')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js ')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.js ')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js ')}}"></script>
<script src="{{asset('template/plugins/raphael/raphael.min.js ')}}"></script>
<script src="{{asset('template/plugins/jquery-mapael/jquery.mapael.min.js ')}}"></script>
<script src="{{asset('template/plugins/jquery-mapael/maps/usa_states.min.js ')}}"></script>
<!-- ChartJS -->
<script src="{{asset('template/plugins/chart.js/Chart.min.js ')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
      $(document).ready( function () {
         $('#tableBlog').DataTable();
      } );
   </script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $("#mysummernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
</body>
</html>
