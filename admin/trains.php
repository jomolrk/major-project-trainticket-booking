<?php
    include '../connection.php';
    @session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Train list added</title>
<!-- code import -->

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


<!-- code exsist--> 
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" /> 
    <link href="css/trains_css.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
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
                  <a href="http://localhost/Trainticket/" class="nav-link"><b>Travel-Valley Railway Reservation System - Admin</b></a>
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
                     <span class="ml-3">Admin</span>
                     <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="http://localhost/Trainticket/admin/user.php"><span class="fa fa-user"></span> My Account</a>
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
            <a href="http://localhost/Trainticket/admin" class="brand-link bg-transparent text-sm border-info shadow-sm bg-primary">
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
                                 <a href="#" class="nav-link nav-home">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                       Dashboard
                                    </p>
                                 </a>
                              </li>
                              <li class="nav-header">Maintenance</li>
                              <li class="nav-item dropdown">
                                 <a href="http://localhost/Trainticket/admin/add train.php" class="nav-link nav-routes">
                                    <i class="nav-icon fas fa-calendar-day"></i>
                                    <p>
                                       Add Train
                                    </p>
                                 </a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a href="http://localhost/Trainticket/admin/trains.php" class="nav-link nav-trains  <?php if (!isset($_GET['page'])) echo 'active'; ?>">
                                    <i class="nav-icon fas fa-train"></i>
                                    <p>
                                       Train List
                                    </p>
                                 </a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a href="http://localhost/Trainticket/admin/schedules.php" class="nav-link nav-schedules">
                                    <i class="nav-icon fas fa-calendar-day"></i>
                                    <p>
                                       Schedule List
                                    </p>
                                 </a>
                              <li class="nav-item dropdown">
                                 <a href="http://localhost/Trainticket/admin/addroute.php" class="nav-link nav-routes">
                                    <i class="nav-icon fas fa-calendar-day"></i>
                                    <p>
                                       Add Routes
                                    </p>
                              <li class="nav-item dropdown">
                              <a href="http://localhost/Trainticket/admin/Routes.php" class="nav-link nav-routes">
                              <i class="nav-icon fas fa-calendar-day"></i>
                              <p>
                              Routes
                              </p>
                              </a></li>
                              <li class="nav-item dropdown">
                                 <a href="http://localhost/Trainticket/admin/addseat.php" class="nav-link nav-routes">
                                    <i class="nav-icon fas fa-calendar-day"></i>
                                    <p>
                                       Add seat
                                    </p>
                                    <!-- <li class="nav-item dropdown">
                                       <a href="http://localhost/Trainticket/admin/seat.php" class="nav-link nav-routes">
                                         <i class="nav-icon fas fa-calendar-day"></i>
                                         <p>
                                          seat
                                         </p>
                                       </a></li> -->
                              <li class="nav-item dropdown">
                              <a href="http://localhost/Trainticket/admin/userlist.php" class="nav-link nav-routes">
                              <i class="nav-icon fas fa-calendar-day"></i>
                              <p>
                              User List
                              </p>
                              </a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a href="http://localhost/Trainticket/admin/payments.php" class="nav-link nav-routes">
                                    <i class="nav-icon fas fa-calendar-day"></i>
                                    <p>
                                    Payment
                                    </p>
                                 </a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a href="http://localhost/Trainticket/admin/order_tickets.php" class="nav-link nav-routes">
                                    <i class="nav-icon fas fa-calendar-day"></i>
                                    <p>
                                    Tickets
                                    </p>
                                 </a>
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
<div class="content-wrapper pt-3" style="min-height: 567.854px;">         
         <!-- Content Wrapper. Contains page content -->
   <!--  <a href="index1.php">  
    <span class="glyphicon glyphicon-backward"></span> Back to Admin Home</a> -->
    
    <div class="content">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">All Trains</h3>
                                <div class='float-right'>
                                    <button type="button" class="bt btn-primary" data-toggle="modal"
                                    data-target="#add">Add New Train &#128645;</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="#" method="POST">
                                    <table id="example1" style="align-items: stretch;" class="table table-hover w-100 table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Train code</th>
                                                <th>Train Name</th>
                                                <th>First Class Capacity</th>
                                                <th>Tatkal Class Capacity </th>
                                                <th>Sleeper Class Capacity</th>
                                                <th>General Quota Capacity</th>
                                            <th>AC coach </th>
                                                <th>Ladies Quota </th>
                                                <th style="width: 30%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $row =mysqli_query($conn,"SELECT * FROM trains");
                                                if ($row->num_rows < 1) echo "No Records Yet";
                                                $sn = 0;
                                                while ($fetch = $row->fetch_assoc()) {
                                                    $id = $fetch['id'];
                                                ?>

                                                <tr>
                                                    <td>
                                                        <input class="trains_input" type="text" value="<?php echo ++$sn; ?>">
                                                        <input class="trains_input" type="text" hidden name="t_id" value="<?php echo $fetch['id'] ?>">
                                                    </td>
                                                    <td><input class="trains_input" type="text" name="t_code" value="<?php echo $fetch['t_code']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="tname" value="<?php echo $fetch['tname']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="firstclass" value="<?php echo $fetch['first class']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="secondclass" value="<?php echo $fetch['secondclass']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="sleeperclass" value="<?php echo $fetch['sleeperclass']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="generalqouta" value="<?php echo $fetch['generalqouta']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="aircond" value="<?php echo $fetch['AC']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="ladiesquota" value="<?php echo $fetch['ladiesquota']; ?>"></td>
                                                    <td>
                                                        <input type="submit" name="edit" class="bt btn-primary" value="Edit">
                                                        <input type="submit" name="del_train" class="bt btn-danger" value="Delete">
                                                    </td>
                                                </tr>
                                            

                                            <div class="modal fade" id="edit<?php echo $id ?>">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>" required id="">
                                                                    <p>Train Code: <input type="text" class="form-control" name="t_code" value="<?php echo $fetch['t_code'] ?>" required minlength="3" id=""></p>
                                                                    <p>Train Name : <input type="text" class="form-control" name="tname" value="<?php echo $fetch['tname'] ?>" required minlength="3" id=""></p>
                                                                    <p>Tatkal Capacity : <input type="number" min='0' class="form-control" value="<?php echo $fetch['first class'] ?>" name="firstclass" required id=""></p>
                                                                    <p> Second Class Capacity : <input type="number" min='0' class="form-control" value="<?php echo $fetch['secondclass'] ?>" name="secondclass" required id=""></p>
                                                                    <p> Sleeper Class Capacity : <input type="number" min='0' class="form-control" value="<?php echo $fetch['sleeperclass'] ?>" name="sleeperclass" required id=""></p>
                                                                <p>General Quota : <input type="number" min='0' class="form-control" value="<?php echo $fetch['generalqouta'] ?>" name="generalqouta" required id=""></p>
                                                                <p> Ac Coach: <input type="number" min='0' class="form-control" value="<?php echo $fetch['AC'] ?>" name="AC" required id=""></p>
                                                                <p> Ladies Quota : <input type="number" min='0' class="form-control" value="<?php echo $fetch['ladiesquota'] ?>" name="ladiesquota" required id=""></p>
                                                                <p><input class="btn btn-info" type="submit" value="Edit Train" name='edit'></p>
                                                            </form>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </div>
                                                <!-- /.modal -->
                                            <?php } ?>

                                        </tbody>
                                    
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" align="center">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Train &#128646;
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script>
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
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>

    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>

    <script>
    $(function() {
        /* jQueryKnob */

        $('.knob').knob({
            draw: function() {}
        })

    })
    </script>


</body>
</html>

<?php

    if (isset($_POST['submit'])) {
        $code = $_POST['t_code'];
        $tname = $_POST['tname'];
        $first_class = $_POST['firstclass'];
        $second_class = $_POST['secondclass'];
        $sleeper_class = $_POST['sleeperclass'];
        $gen = $_POST['generalquota'];
        $AC = $_POST['AC'];
        $lad = $_POST['ladiesquota'];
        if (!isset($code,$tname, $first_class, $second_class,$sleeper_class,$gen,$tatkal,$lad)) {
            echo "<script>alert('Train list added properly!')</script>";
        } else {
            $check = mysqli_query($conn,"SELECT * FROM trains WHERE tname = '$tname' ")->num_rows;
            if ($check) {
                echo("Train exists");
            } else {
                mysqli_query($conn,"INSERT INTO `trains`( `t_code`, `tname`, `first class`, `secondclass`, `sleeperclass`, `generalqouta`, `AC`, `ladiesquota`)
                VALUES (' $code ','$tname','$first_class','$second_class','$sleeper_class',' $gen ','$AC','$lad')");
            echo "<script language='javascript'>";
            echo 'window.location.href = "trains.php"';
            echo "alert('train details added succefully')";
            
            echo "</script>";
            
                
            }
        }
    }

    if (isset($_POST['edit'])) {
        $tid= $_POST['t_id'];
        $code = $_POST['t_code'];
        $tname = $_POST['tname'];
        $first_class = $_POST['firstclass'];
        $second_class = $_POST['secondclass'];
        $sleeper_class = $_POST['sleeperclass'];
        $gen = $_POST['generalqouta'];
        $ac = $_POST['aircond'];
        $lad = $_POST['ladiesquota'];
        
        if (!isset($code,$tname, $first_class, $second_class,$sleeper_class ,$gen ,$ac,$lad)) {
            echo "<script>alert('Train list added properly!')</script>";
        } 
        else {    
            $check = mysqli_query($conn,"SELECT * FROM trains WHERE tname = '$tname' ")->num_rows;
            if ($check == 2) {
                echo("Train name exists");
            } else {
                $modify_trains_sql= "UPDATE `trains` SET `t_code`='$code',`tname`='$tname',`first class`='$first_class',`secondclass`='$second_class',`sleeperclass`='$sleeper_class',`generalqouta`='$gen',`AC`='$ac',`ladiesquota`='$lad' WHERE id=$tid"; 
                $edit_res= mysqli_query($conn,$modify_trains_sql);
                if($edit_res){
                    echo "<script>alert('Train Modified!')</script>";
                }
                else{
                    echo "<script>alert('Train not Modified!')</script>";
                }
                echo "<script>window.location.href = 'trains.php';</script>";
            }
        }
    }

    if (isset($_POST['del_train'])) {
        $tid= $_POST['t_id'];
        $del_res= mysqli_query($conn, "DELETE FROM trains WHERE id = '$tid'");
        if(mysqli_affected_rows($conn) >= 1){
            echo "<script>alert('Train Deleted !!');</script>";
        }
        else{
            echo "<script>alert('Train Could Not Be Deleted. This Train Has Been Tied To Another Data !!');</script>";
        }
        echo "<script>window.location.href = 'trains.php';</script>";
    }
?>

 <!--<button type="button" class="btn btn-primary" data-toggle="modal"
    data-target="#edit<?php echo $id ?>">
    Edit
</button> -

<input type="hidden" class="form-control" name="del_train"
    value="<?php echo $id ?>" required id="">
<button type="submit"
    onclick="return confirm('Are you sure about this?')"
    class="btn btn-danger">
    Delete
</button>-->