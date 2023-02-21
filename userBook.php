<?php
  session_start();
  if(!isset($_SESSION['islogged']) || !$_SESSION['islogged']){
      header('Location: index.php');  
  }
  $userName = $_SESSION['email'];
  $userID = $_SESSION['id'];
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
         <div class="content">
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="alert alert-danger" role="alert" style="display:none;" id="errorClass">
                       Number of seat exceeds
                  </div>
                  <div class="card card-success">
                     <div class="card-header" style="background-color:#007bff">
                        <h3 class="card-title"><b>Book Train Tickets</b></h3>
                     </div>
                     <div class="card-body">
                        <h4 class="modal-title">Book For <?php echo $userName; ?> &#128642;</h4>
                        <form method="post">
                           <!-- <p>
                              Route : <span style="color:red">*</span>
                              <select name="route" required class="form-control" id="route">
                                 <option value="">-- Select Route --</option>
                              </select>
                           </p> -->
                           <p>
                              Train : <span style="color:red">*</span>
                              <select name="train" required class="form-control" id="train">
                                 <option value="">-- Select Train --</option>
                              </select>
                           </p>
                           <p>
                              Schedule : <span style="color:red">*</span>
                              <select name="shedule" required class="form-control" id="shedule">
                                 <option value="">-- Select Shedule --</option>
                              </select>
                           </p>
                           <p>
                              Quota : <span style="color:red">*</span> 
                              <select name="quota" required class="form-control" id="quota">
                                 <option value="">-- Select Quota --</option>
                              </select>
                           </p>
                           <p>
                              Class : <span style="color:red">*</span> 
                              <select name="class" required class="form-control" id="trainClass">
                                 <option value="">-- Select Class --</option>
                                 <option value="1A_lb">1A Lower Berth</option>
                                 <option value="1A_mb">1A Middle Berth</option>
                                 <option value="1A_ub">1A Upper Berth</option>
                                 <option value="1A_sb">1A Side Berth</option>
                                 <option value="2A_lb">2A Lower Berth</option>
                                 <option value="2A_mb">2A Middle Berth</option>
                                 <option value="2A_ub">2A Upper Berth</option>
                                 <option value="2A_sb">2A Side Berth</option>
                                 <option value="3A_lb">3A Lower Berth</option>
                                 <option value="3A_mb">3A Middle Berth</option>
                                 <option value="3A_ub">3A Upper Berth</option>
                                 <option value="3A_sb">3A Side Berth</option>
                              </select>
                           </p>
                           <p>Number of Tickets : <span style="color:red">*</span>
                              <input type="number" min='1' name="number" class="form-control" id="NoSeat">
                           </p>
                           <input type="hidden" id="userID" value="<?php echo $userID;?>">
                           <button type="button" class="btn btn-primary" name="save" id="save" disabled="true">Save</button>
                        </form>
                     </div>
                     <!-- /.card-body -->
                  </div>
               </div>
            </section>
         </div>
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

   <script>
     $(document).ready(function() {
         let dataArrayQuota = {
                    method:"fetchQuota"
         }
         $.ajax({
           url: "AjaxFunctions.php",
           type: "POST",
           data: dataArrayQuota,
           success: function(res){
             var resultArray = JSON.parse(res);
             for (let index = 0; index < resultArray.length; ++index) {
                $('#quota').append('<option value="' + resultArray[index]['id'] + '">' + resultArray[index]['name'] +'</option>');
             }
           }
         });
         let dataArray = {
                    method:"fetchTrain"
         }
         $.ajax({
            url: "AjaxFunctions.php",
            type: "POST",
            data: dataArray,
            success: function(res){
              var resultArray = JSON.parse(res);
              for (let index = 0; index < resultArray.length; ++index) {
                 $('#train').append('<option value="' + resultArray[index]['trainID'] + '">' + resultArray[index]['trainName'] + '</option>');
              }
            }
          });
         
         // let dataArrayRoute = {
         //            method:"fetchRoute"
         // }
         // $.ajax({
         //   url: "AjaxFunctions.php",
         //   type: "POST",
         //   data: dataArrayRoute,
         //   success: function(res){
         //     var resultArray = JSON.parse(res);
         //     for (let index = 0; index < resultArray.length; ++index) {
         //        $('#route').append('<option value="' + resultArray[index]['id'] + '">' + resultArray[index]['from'] +'-'+ resultArray[index]['to']+'</option>');
         //     }
         //   }
         // });
         // $("#route").change(function() {
         //    $('#shedule').val('');
         //    $('#trainClass').val(''); 
         //    $('#NoSeat').val(''); 
         //    $('#quota').val('');
         //    $("#train option").remove();            
         //    $('#train').append('<option value="">-- Select Train --</option>');
         //    let routeID =$('option:selected', this).val(); 
         //        let dataArray = {
         //                method:"fetchTrain",
         //                routeID:routeID
         //        }
         //        $.ajax({
         //          url: "AjaxFunctions.php",
         //          type: "POST",
         //          data: dataArray,
         //          success: function(res){
         //            var resultArray = JSON.parse(res);
         //            for (let index = 0; index < resultArray.length; ++index) {
         //               $('#train').append('<option value="' + resultArray[index]['trainID'] + '">' + resultArray[index]['trainName'] + '</option>');
         //            }
         //          }
         //        });

         // });
         $("#train").change(function() { 
                $("#shedule option").remove();
                $('#trainClass').val(''); 
                $('#NoSeat').val('');
                $('#quota').val('');
                $('#shedule').append('<option value="">-- Select Shedule --</option>');
                let TrainID =$('option:selected', this).val();
                let routeID =$('#route').val(); 
                let dataArray = {
                    method:"fetchTrainShedules",
                    TrainID:TrainID,
                    //routeID:routeID
                }
                $.ajax({
                  url: "AjaxFunctions.php",
                  type: "POST",
                  data: dataArray,
                  success: function(res){
                    var resultArray = JSON.parse(res);
                    for (let index = 0; index < resultArray.length; ++index) {
                       $('#shedule').append('<option value="' + resultArray[index]['id'] + '">' + resultArray[index]['date'] + '-'+resultArray[index]['time']+'</option>');
                    }
                  }
                });
         });
         $("#trainClass").change(function() { 
            $('#NoSeat').val('');
         });
         $("#shedule").change(function() { 
            $('#quota').val('');
            $('#trainClass').val('');
            $('#NoSeat').val('');
         });
         $("#quota").change(function() {
            $('#trainClass').val(''); 
            $('#NoSeat').val('');
         });
         $("#save").click(function(){
                var TrainID = $("#train").val();
                var TrainShedule =  $("#shedule").val();
                var TrainClass = $("#trainClass").val();
                var NoSeat = $("#NoSeat").val();
                var userID = $("#userID").val();
                var RouteID = $("#route").val();
                let QuotaID = $("#quota").val();
                if(TrainID=="" || TrainShedule=="" || TrainClass=="" || NoSeat=="" || RouteID=="" || QuotaID==""){
                    alert("Please fill the required fields");
                    return false;
                }
                let dataArray = {
                    method:"saveBooking",
                    TrainID:TrainID,
                    TrainShedule:TrainShedule,
                    TrainClass:TrainClass,
                    NoSeat:NoSeat,
                    userID:userID,
                    RouteID:RouteID,
                    QuotaID:QuotaID
                }
                console.log(dataArray);
                 $.ajax({
                  url: "AjaxFunctions.php",
                  type: "POST",
                  data: dataArray,
                  success: function(res){
                     var resultArray = JSON.parse(res);
                     if(resultArray.StatusCode == 200){
                        window.location.href = "userBookList.php";
                     }
                  }
                });
         });
         $('#NoSeat').on('input',function(e){
            let NoSeat = $(this).val();
            let ClassValue = $("#trainClass").val(); 
            let sheduleID = $("#shedule").val();
            let TrainID = $("#train").val();
            let QuotaID = $("#quota").val();
            let dataArray = {
                    method:"SeatAvalibility",
                    TrainID:TrainID,
                    TrainShedule:sheduleID,
                    TrainClass:ClassValue,
                    NoSeat:NoSeat,
                    QuotaID:QuotaID
                }
            $.ajax({
                  url: "AjaxFunctions.php",
                  type: "POST",
                  data: dataArray,
                  success: function(res){
                    var resultArray = JSON.parse(res);
                    //console.log(resultArray.StatusCode);
                    if(resultArray.StatusCode == "402") {
                        $("#errorClass").removeAttr("style");
                        $('#save').attr('disabled', true); 
                    }else{
                        //console.log("here");
                        $("#errorClass").css("display", "none");
                        $('#save').removeAttr("disabled");
                    }
                  }
            });
         });

     });
   </script>
     </body>
 </html>
