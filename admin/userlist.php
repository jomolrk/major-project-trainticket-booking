

<?php
    include '../connection.php';
    include 'include/header.php';
    if(isset($_GET['reg_id']) && isset($_GET['update_status'])){
        $reg_id= $_GET['reg_id'];
        $update_status= $_GET['update_status'];
        $update_sql= "UPDATE tbl_login SET log_status=$update_status WHERE reg_id=$reg_id";
        $update_disable_res= mysqli_query($conn, $update_sql);
        if($update_disable_res){
	$status= $update_status==0 ? "Disabled" : "Enabled";
	echo "<script>
	    window.alert('".$status." this user successfully.');
	    window.location.href='userlist.php';
	</script>";
        }
        else{

        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>USer-LIst</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="../css/style_select.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/userlist_css.css" rel="stylesheet" type="text/css" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!--bootstrap link-->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<a href="index1.php">
          
<span class="glyphicon glyphicon-backward"></span> Back to Admin Home</a>
</head>
<body>
	
<!-- banner -->
    	<center>
	        <h1 class="w3layouts_head">User-List</h1>
	           <div class="table-maindiv">	                         
                                              <table class="table">
			<colgroup>
						
			    <col width="15%">
			     <col width="25%">
		                         <col width="10%">
			      <col width="40%">
			      <col width="10%">
			      <col width="25%">
			      <col width="10%">

			  </colgroup>
		       <thead>
		        <tr>
							
		<th class="text-center">fullname</th>
		<th class="text-center">dob</th>
		<th class="text-center">gender</th>
		<th class="text-center">idcard no</th>
		<th class="text-center">mobileno</th>
		<th class="text-center">Account Status</th>
		<th class="text-center">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php		
		    $qry = $conn->query("SELECT * FROM tbl_register where reg_name!='Admin'");
		    while($row = $qry->fetch_assoc()):			
		        $regid= $row['reg_id'];
		        $log_reg= mysqli_query($conn,"SELECT * from tbl_login WHERE reg_id=$regid");
		        if($log_reg && mysqli_num_rows($log_reg)==1){
		             $log_data= mysqli_fetch_array($log_reg);
		             $log_status= $log_data['log_status'];
		        }
		        else{
		             $log_status="0";
		        }
		?>
		<tr>				 	
	                    <td cellspacing=20 class="text-right"><?php echo $row['reg_name'] ?></td>
                                        <td class="text-right"><?php echo $row['reg_dob']?></td>
                                        <td class="text-right"><?php echo $row['reg_gender']?></td>
		<td class="text-right"><?php echo $row['reg_adhar']?></td>
		<td class="text-right"><?php echo $row['reg_phone']?></td>
		<td class="text-right"><?php if($log_status==0){ echo "Not Active"; }else{ echo "Active"; }; ?></td>		
                                        <td class="text-center">
		     <?php
		         $log_update_status= $log_status==0 ? 1 : 0;
		     ?>
		     <a class="enable_btn" href="userlist.php?reg_id=<?php echo $row['reg_id']; ?>&update_status=<?php echo $log_update_status; ?>"><?php if($log_status==0){ echo "Enable"; }else{ echo "Disable"; }; ?></a><i class="fa fa-trash"></i>
                                        </td>
                                        </tr>
                                        <?php endwhile; ?>
                                        </tbody>
		</table>
	           </div>
	           </center>

	           <br><br>

                    <style>
	    td p { margin:unset; }
	    td img { width: 8vw; height: 12vh; }
	    td{ vertical-align: middle !important; }
                    </style>

                    </body>
                    </html>	                    