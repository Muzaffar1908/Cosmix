<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- GetBootsrtapp -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

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
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
     
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cosmix</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Muzaffar  Ahmadaliyev</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
      
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin.index')}}" class="nav-link @php echo Request::getRequestUri() == '/admin'? 'active':'' @endphp">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class=""></i>
                    </p>
                </a>
          </li>

          <li class="nav-item">
              <a href="{{route('admin.slider.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,13) == '/admin/slider')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-sliders"></i>
                    <p>
                        Slider
                    </p>
                </i>
              </a>
           </li>

            <li class="nav-item">
              <a href="{{route('admin.about.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,12) == '/admin/about')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-card-text"></i>
                    <p>
                        About
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.service.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,14) == '/admin/service')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-gear"></i>
                    <p>
                        Service
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.feature.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,14) == '/admin/feature')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-card-list"></i>
                    <p>
                        Features
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.portfolio.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,16) == '/admin/portfolio')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-collection"></i>
                    <p>
                        Portfolio
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.pricing.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,14) == '/admin/pricing')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-currency-dollar"></i>
                    <p>
                        Pricing
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.team.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,11) == '/admin/team')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-person-bounding-box"></i>
                    <p>
                        Team
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.testimonials.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,19) == '/admin/testimonials')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-sliders"></i>
                    <p>
                      Testimonials
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.blog.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,11) == '/admin/blog')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-stickies"></i>
                    <p>
                      Blog
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.client.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,13) == '/admin/client')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-collection"></i>
                    <p>
                      Client
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.info.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,11) == '/admin/info')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-info-circle"></i>
                    <p>
                      Info
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.contact.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,14) == '/admin/contact')
                  active
                  @endif
                ">
                <i class="nac-icon bi bi-telephone-inbound"></i>
                    <p>
                      Contact
                    </p>
                </i>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.media.index')}}"  class="nav-link
                @if(Str::substr(Request::getRequestUri(), 0,12) == '/admin/media')
                  active
                  @endif
                ">
                <i class="nav-icon bi bi-play-btn"></i>
                    <p>
                      Media
                    </p>
                </i>
              </a>
            </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
       <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        @yield('content')

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
           
            <!-- /.card -->

            <!-- DIRECT CHAT -->
          
            <!--/.direct-chat -->

            <!-- TO DO List -->
         
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            
            <!-- /.card -->

            <!-- solid sales graph -->
         
            <!-- /.card -->

            <!-- Calendar -->
           
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- Get  Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
{{-- boostrap script --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote1').summernote()
    $('#summernote2').summernote()
    $('#summernote3').summernote()
  })
</script>

</body>
</html>
