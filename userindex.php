<?php
  session_start();
  if(!isset($_SESSION['islogged']) || !$_SESSION['islogged']){
      header('Location: index.php');  
  }
?>

<!DOCTYPE html>
 <html lang="en" class="" style="height: auto;">
 <head>
   <style>
     :root{
       --base_url:http://localhost/Trainticket/;
     }
   </style>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Travel-Valley  Train Ticket Reservation-user</title>
     <link rel="icon" href="http://localhost/Trainticket/uploads/logo-1641351863.png" />
     <!-- Google Font: Source Sans Pro -->
     <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> -->
     <!-- Font Awesome -->
     <link rel="stylesheet" href="http://localhost/Trainticket/plugins/fontawesome-free/css/all.min.css">
     <!-- Ionicons -->
     <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
     <!-- Tempusdominus Bootstrap 4 -->
     <link rel="stylesheet" href="http://localhost/Trainticket/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
       <!-- DataTables -->
   <link rel="stylesheet" href="http://localhost/Trainticket/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="http://localhost/Trainticket/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="http://localhost/Trainticket/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
   <link rel="stylesheet" href="http://localhost/Trainticket/plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="http://localhost/Trainticket/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
     <!-- iCheck -->
     <link rel="stylesheet" href="http://localhost/Trainticket/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
     <!-- JQVMap -->
     <link rel="stylesheet" href="http://localhost/Trainticket/plugins/jqvmap/jqvmap.min.css">
     <!-- fullCalendar -->
     <link rel="stylesheet" href="http://localhost/Trainticket/plugins/fullcalendar/main.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="http://localhost/Trainticket/dist/css/adminlte.css">
     <link rel="stylesheet" href="http://localhost/Trainticket/dist/css/custom.css">
     <!-- overlayScrollbars -->
     <link rel="stylesheet" href="http://localhost/Trainticket/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
     <!-- Daterange picker -->
     <link rel="stylesheet" href="http://localhost/Trainticket/plugins/daterangepicker/daterangepicker.css">
     <!-- summernote -->
     <link rel="stylesheet" href="http://localhost/Trainticket/plugins/summernote/summernote-bs4.min.css">
      <!-- SweetAlert2 -->
   <link rel="stylesheet" href="http://localhost/Trainticket/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
     <style type="text/css">/* Chart.js */
      @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
     </style>

      <!-- jQuery -->
     <script src="http://localhost/Trainticket/plugins/jquery/jquery.min.js"></script>
     <!-- jQuery UI 1.11.4 -->
     <script src="http://localhost/Trainticket/plugins/jquery-ui/jquery-ui.min.js"></script>
     <!-- SweetAlert2 -->
     <script src="http://localhost/Trainticket/plugins/sweetalert2/sweetalert2.min.js"></script>
     <!-- Toastr -->
     <script src="http://localhost/Trainticket/plugins/toastr/toastr.min.js"></script>
     <script>
         var _base_url_ = 'http://localhost/Trainticket/';
     </script>
     <script src="http://localhost/Trainticket/dist/js/script.js"></script>

   </head>  <body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
     <div class="wrapper">
      <style>
   .user-img{
         position: absolute;
         height: 27px;
         width: 27px;
         object-fit: cover;
         left: -7%;
         top: -12%;
   }
   .btn-rounded{
         border-radius: 50px;
   }
 </style>
 <!-- Navbar -->
       <nav class="main-header navbar navbar-expand navbar-dark border  border-info border-top-0  border-left-0 border-right-0 text-sm shadow-sm bg-primary">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
           <li class="nav-item">
           <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
           </li>
           <li class="nav-item d-none d-sm-inline-block">
             <a href="http://localhost/Trainticket/" class="nav-link"><b>Travel-Valley Railway Reservation System - user</b></a>
           </li>
         </ul>
         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
           <!-- Navbar Search -->
           <!-- <li class="nav-item">
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
           </li> -->
         
           <!-- Messages Dropdown Menu -->
           <li class="nav-item">
             <div class="btn-group nav-link">
                   <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
                     <span><img src="http://localhost/Trainticket/uploads/avatar-1.png?v=1c639468007" class="img-circle elevation-2 user-img" alt="User Image"></span>
                     <span class="ml-3">user</span>
                     <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <div class="dropdown-menu" role="menu">
                     <a class="dropdown-item" href="#"><span class="fa fa-user"></span> My Account</a>
                     
                         
                          <div class="dropdown-divider"></div>
                     <a class="dropdown-item" onclick="window.location.href='logout.php';"><span class="fas fa-sign-out-alt"></span> Logout</a>
                   </div>
               </div>
           </li>
           <li class="nav-item">

           </li>
          <!--  <li class="nav-item">
             <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
             <i class="fas fa-th-large"></i>
             </a>
           </li> -->
         </ul>
       </nav>
       <!-- /.navbar -->    
       </style>
 <!-- Main Sidebar Container -->
       <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand bg-gradient-black">
         <!-- Brand Logo -->
         <a href="http://localhost/Trainticket" class="brand-link bg-transparent text-sm border-info shadow-sm bg-primary">
         <img src="http://localhost/Trainticket/uploads/logo-1641351863.png" alt="Store Logo" class="brand-image img-circle elevation-3 bg-black" style="width: 1.8rem;height: 1.8rem;max-height: unset;object-fit:scale-down;object-position:center center">
         <span class="brand-text font-weight-light">Travel-Valley</span>
         </a>
         <!-- Sidebar -->
         <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
            <div class="os-resize-observer-host observed">
               <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
            </div>
            <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
               <div class="os-resize-observer"></div>
            </div>
            <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
            <div class="os-padding">
               <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                  <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                     <!-- Sidebar user panel (optional) -->
                     <div class="clearfix"></div>
                     <!-- Sidebar Menu -->
                     <nav class="mt-4">
                        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                           <li class="nav-item dropdown">
                              <a href="userindex.php" class="nav-link nav-home">
                                 <i class="nav-icon fas fa-tachometer-alt"></i>
                                 <p>
                                    Dashboard
                                 </p>
                              </a>
                           </li>
                           <li class="nav-header">Maintenance</li>
                           <li class="nav-item dropdown">
                              <a href="userBook.php" class="nav-link nav-trains">
                                 <i class="nav-icon fas fa-plus"></i>
                                 <p>
                                    New Booking
                                 </p>
                              </a>
                           </li>
                           <li class="nav-item dropdown">
                              <a href="userBookList.php" class="nav-link nav-trains">
                                 <i class="nav-icon fas fa-book"></i>
                                 <p>
                                    View Booking
                                 </p>
                              </a>
                              </p>
                              </a>
                           </li>
                           </li>
                        </ul>
                     </nav>
                     <!-- /.sidebar-menu -->
                  </div>
               </div>
            </div>
            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
               <div class="os-scrollbar-track">
                  <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
               </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
               <div class="os-scrollbar-track">
                  <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
               </div>
            </div>
            <div class="os-scrollbar-corner"></div>
         </div>
         <!-- /.sidebar -->
      </aside>
       
            <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper pt-3" style="min-height: 567.854px;">
        <!-- Main content -->
            <section class="content ">
               <div class="container-fluid">
                  <h1>Passenger's Dashboard</h1>
                  <hr class="border-info">
                  <div class="row">
                     <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="info-box bg-gradient-light shadow">
                           <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-train"></i></span>
                           <div class="info-box-content">
                              <span class="info-box-text">Total Trains</span>
                              <span class="info-box-number text-right">
                              5            </span>
                           </div>
                           <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                     </div>
                     <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="info-box bg-gradient-light shadow">
                           <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-calendar"></i></span>
                           <div class="info-box-content">
                              <span class="info-box-text">Daily Schedules</span>
                              <span class="info-box-number text-right">
                              2            </span>
                           </div>
                           <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                     </div>
                     <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="info-box bg-gradient-light shadow">
                           <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>
                           <div class="info-box-content">
                              <span class="info-box-text">One-Time Schedules</span>
                              <span class="info-box-number text-right">
                              1            </span>
                           </div>
                           <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                     </div>
                     <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
               </div>
               <hr>
            </section>
      </div> 
        
     <!-- Bootstrap 4 -->
     <script src="http://localhost/Trainticket/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- ChartJS -->
     <script src="http://localhost/trainticket/plugins/chart.js/Chart.min.js"></script>
     <!-- Sparkline -->
     <script src="http://localhost/Trainticket/plugins/sparklines/sparkline.js"></script>
     <!-- Select2 -->
     <script src="http://localhost/trainticket/plugins/select2/js/select2.full.min.js"></script>
     <!-- JQVMap -->
     <script src="http://localhost/Trainticket/plugins/jqvmap/jquery.vmap.min.js"></script>
     <script src="http://localhost/Trainticket/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
     <!-- jQuery Knob Chart -->
     <script src="http://localhost/Trainticket/plugins/jquery-knob/jquery.knob.min.js"></script>
     <!-- daterangepicker -->
     <script src="http://localhost/Trainticket/plugins/moment/moment.min.js"></script>
     <script src="http://localhost/Trainticket/plugins/daterangepicker/daterangepicker.js"></script>
     <!-- Tempusdominus Bootstrap 4 -->
     <script src="http://localhost/Trainticket/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
     <!-- Summernote -->
     <script src="http://localhost/Trainticket/plugins/summernote/summernote-bs4.min.js"></script>
     <script src="http://localhost/Trainticket/plugins/datatables/jquery.dataTables.min.js"></script>
     <script src="http://localhost/Trainticket/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
     <script src="http://localhost/Trainticket/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
     <script src="http://localhost/Trainticket/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
     <script src="http://localhost/Trainticket/plugins/moment/moment.min.js"></script>
     <script src="http://localhost/Trainticket/plugins/fullcalendar/main.js"></script>
     <!-- overlayScrollbars -->
     <!-- <script src="http://localhost/Trainticket/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
     <!-- AdminLTE App -->
     <script src="http://localhost/Trainticket/dist/js/adminlte.js"></script>
   </div>
     </body>
 </html>
