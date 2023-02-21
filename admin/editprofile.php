<?php
    session_start();
    include '../connection.php';

    $id= $_SESSION['id'];
    $user_res= mysqli_query($conn,"SELECT * from tbl_register WHERE reg_id=$id");
    if($user_res && mysqli_num_rows($user_res)==1){
        $row= mysqli_fetch_array($user_res);
    }

if (isset($_POST["edit"])) {
    $fname=$_POST['reg_name'];
    $gender=$_POST['reg_gender'];
    $dob=$_POST['reg_dob'];
    $mobile=$_POST['reg_phone'];
    $ino=$_POST['reg_adhar'];

    $sql="UPDATE tbl_register SET reg_name='$fname',reg_gender='$gender',reg_dob='$dob',reg_phone='$mobile',reg_adhar='$ino' WHERE reg_name='Admin'";
    $result=mysqli_query($conn, $sql);
    if($result){
        echo "<script>
            alert('Profile Updated Successfully.');
            window.location.href='index1.php';
        </script>";
    }
    else{
        echo "<script>
            alert('Unable to update profile !! Please try again.');
        </script>";
    }
}
?>





<!DOCTYPE html>
<html>
<head>

	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	</link>
	<link href="css/Default.css" rel="stylesheet">
	</link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function()
		{
			//alert($(window).width());
			var x=(($(window).width())-924)/2;
			//alert(x);
			$('.wrap').css("left",x+"px");
		});

	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>
	
</head>

    <body style="background-image: url(images/regim.jpg);">
	
	<div class="wrap">
		<!-- Header -->
		<div class="header">
			<div style="float:left;width:150px;">
				<img src="images/avatar-1.png"/>
			</div>		
			<div>
			<div style="float:right; font-size:20px;margin-top:20px;">
			
			</div>
			<div id="heading">
				<a href="index1.php" style="color:orangered"></a>
			</div>
			</div>
		</div>
		<!-- Navigation bar -->
		<div class="navbar navbar-inverse" >
			<div class="navbar-inner">
				<div class="container" >
				<a class="brand" href="index1.php" >Back to Admin dashboard </a>
				
			</div>
		</div>
		
		<div class="span12 pass3">
		<div class="span8 well">
			<table>
			<tr>
				<td><span style="font-weight:bold;font-size:25px;">Profile</span>

			<tr/>
			
			<tr>
				<td>
				<form action="editprofile.php" method="post">
					<div class="span6">
					<table class="table">
					<tr><td >Fullname : </td> <td style="text-transform:capitalize;"><input type="text" name="reg_name" value="<?php echo $row['reg_name']; ?>"></td></tr>
					<tr><td>Dob : </td> <td><input type="text" name="reg_dob" value="<?php echo $row['reg_dob']; ?>"></td></tr>
					<tr><td> Gender :</td> <td><input type="text" name="reg_gender" value="<?php echo $row['reg_gender'];?>"></td></tr>
					<tr><td>ID Cardno: </td> <td><input type="text" name="reg_adhar" value="<?php echo $row['reg_adhar']; ?>"></td></tr>
					<tr><td>Mobile No : </td> <td><input type="text" name="reg_phone" value="<?php echo $row['reg_phone'];?>"></td></tr>
					

					<tr> <td><input type="submit" name="edit" class="btn btn-info" value="Edit profile" ></td></tr>
				
					</table>
					</div>
					</form>
				</td>
			</tr>
			</table>
		</div>
		</div>
	
		<footer >
		<div style="width:100%;">
			<div style="float:left;">
			<p class="text-right text-info">  &copy;all copyright reserved</p>	
			</div>
			<div style="float:right;">
			
			</div>
		</div>
		</footer>
	
	</div>

    </body>
</html>





