<h1>Welcome to <?php echo $_settings->info('name') ?> - Admin Panel</h1>
<hr class="border-info">
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-train"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Total Trains</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `train` where delete_flag = 0 ")->num_rows;
                ?>
            </span>
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
                <?php 
                    echo $conn->query("SELECT * FROM `schedule_list` where `type` = 1 and delete_flag=0 ")->num_rows;
                ?>
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
            <span class="info-box-text">One-Time Schedules</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `schedule_list` where `type` = 2 and delete_flag=0 ")->num_rows;
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
            <span class="info-box-text">Reserved Passengers</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `ticketbook` where  unix_timestamp(schedule) >= '".(time())."' ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
	
	
	    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Registered Passengers</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `tbl_register`")->num_rows;
                ?>
            </span>
            </div>
			
			
            <!-- /.info-box-content -->
        </div>
		
        <!-- /.info-box -->
    </div>
	
	
	    <!--<div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-robot"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">ML Prediction</span>
            <span class="info-box-number text-right">
                <?php 
				include("praveen_script.php");
                   $status=prav_get("status","sensor_data","sid","1");
				   if($status==0)
								{
									echo "<b><font color='blue'>Fresh Data</font></b>";
									
								}
								elseif($status==1)
								{
									echo "<b><font color='green'>Train in safe condition</font></b>";
									
								}
								else
								{
									echo "<b><font color='red'>Danger, stop the train immidiately!!</font>";
									
								}
                ?>-->
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
	
	
	
	
	
	
	
	
</div>
<hr>
