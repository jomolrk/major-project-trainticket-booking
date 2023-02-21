<?php 
  include 'include/header.php'; 
?>
<!-- Main content -->
<section class="content ">
   <div class="container-fluid">
      <h1>Welcome to Online Railway Reservation System - - Admin Panel</h1>
      <hr class="border-info">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-light shadow">
               <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-train"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text"> Trains</span>
                  <span class="info-box-number text-right">
                  <?php
                     echo $reg =  $conn->query("SELECT * FROM  trains")->num_rows;
                     ?></span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-light shadow">
               <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-calendar"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text"> Schedules</span>
                  <span class="info-box-number text-right">
                  <?php
                     echo $reg =  $conn->query("SELECT * FROM  schedule")->num_rows;
                     ?></span>
                  </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-light shadow">
               <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-calendar-day"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Routes</span>
                  <span class="info-box-number text-right">
                  <span class="info-box-number text-right">
                  <?php
                     echo $reg =  $conn->query("SELECT * FROM  route")->num_rows;
                     ?>
                  </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-light shadow">
               <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-ticket-alt"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text"> Passengers</span>
                  <span class="info-box-number text-right">
                  <?php
                     echo $reg =  $conn->query("SELECT * FROM  tbl_register where reg_name!='Admin' ")->num_rows;
                     ?>
                  </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
      </div>
      <hr>
   </div>
</section>
<?php 'include/footer.php'
?>         