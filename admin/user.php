<?php
session_start();

include('../connection.php');

$email= $_SESSION['email'];
$login_id= $_SESSION['id'];
$userdata_sql= "SELECT * FROM tbl_login WHERE log_id='$login_id' AND log_emailid='$email'";
$reg_res= mysqli_query($conn,$userdata_sql);
if($reg_res && mysqli_num_rows($reg_res)==1){
      $reg_arr= mysqli_fetch_array($reg_res);
      $reg_id= $reg_arr['reg_id'];
      $reg_sql= "SELECT * from tbl_register where reg_id=$reg_id";
      $register_res= mysqli_query($conn, $reg_sql);
      if($register_res && mysqli_num_rows($register_res)==1){
           $row= mysqli_fetch_array($register_res);
      }
      else{
           $row=null;
      }
}
else{
    $row=null;
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
		
		<div class="span12 well pass1">
			<table style="width:100%;">
			<tr>
				<td><span style="font-weight:bold;font-size:25px;">Profile</span>
				</td>
			<tr/>
			
			<tr>
				<td>
					<div class="span8" style="float:left;width:80%;">
					<table class="table">
					<tr><td >Fullname : </td> <td style="text-transform:capitalize;"><?php if($row!=null){ echo $row['reg_name']; } ?></td></tr>
			
					<tr><td>E-Mail : </td> <td><?php if($row!=null){ echo $email; } ?></td></tr>
					<tr><td>Dob : </td> <td><?php if($row!=null){ echo $row['reg_dob']; } ?></td></tr>
					<tr><td> Gender :</td> <td><?php if($row!=null){ echo $row['reg_gender']; } ?></td></tr>
					<tr><td>ID Cardno: </td> <td><?php if($row!=null){ echo $row['reg_adhar']; } ?></td></tr>
					<tr><td>Mobile No : </td> <td><?php if($row!=null){ echo $row['reg_phone']; } ?></td></tr>
					

					</table>
					</div>
				</td>
			</tr>
			
			<tr>
				<td>
				<span style="width:35%;"><a href="changepassword.php">Change Password</a></span>
				<span class="label label-success" id="chang" style="float:right;display:none;">Password Successfully Changed &nbsp;&nbsp;&nbsp;<span>  <!-- display:none; color:#0000ff;-->
				</td>
				
				<td>
				<span style="width:55%;"><a href="editprofile.php">edit profile</a></span>
				<span class="label label-success" id="chang" style="float:right;display:none;">Password Successfully Changed &nbsp;&nbsp;&nbsp;<span>  <!-- display:none; color:#0000ff;-->
				</td>
			</tr>
		</table>
		</div>

		<div class="span12 pass2 " style="display:none;">
		<div class="span4 well">	
		<br/>
		<br/>
				
		</div>
		</div>
		
		
		
		<div class="span12 pass3 " style="display:none;">
		<div class="span8 well">
			<table style="width:100%;">
			<tr>
				<td><span style="font-weight:bold;font-size:25px;">Profile</span>

			<tr/>
			
			<tr>
				<td>
				<span style="width:35%;"><a href="../edit profile.php">edit profile</span>
				<form action="editprofile.php" method="post" enctype="multipart/form-data">
					<div class="span6" style="float:left;width:80%;">
					<table class="table">
					<tr><td >Fullname : </td> <td style="text-transform:capitalize;"><?php echo $row['name']; ?></td></tr>
			
					<tr><td>E-Mail : </td> <td><?php echo $row['email'];?></td></tr>
					<tr><td>Dob : </td> <td><?php echo $row['dob']; ?></td></tr>
					<tr><td> Gender :</td> <td><?php echo $row['gender'];?></td></tr>
					<tr><td>ID Cardno: </td> <td><?php echo $row['ino']; ?></td></tr>
					<tr><td>Mobile No : </td> <td><?php echo $row['phno'];?></td></tr>
					

					<tr> <td><input type="submit"  class="btn btn-info" value="Edit profile" ></td></tr>
				
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

  
<?php mysqli_close($conn); ?>
 
 
 
 <script type="text/javascript">
$(document).ready(function(){
  $("#cpass").click(function(){
    $(".pass1").fadeOut(1000,"linear",function(){$(".pass2").fadeIn(1000);});
	
  });
});

$(document).ready(function(){
  $("#editp1").click(function(){
    $(".pass1").fadeOut(1000,"linear",function(){$(".pass3").fadeIn(1000);});
	
  });
});

$(document).ready(function(){
  $("#editp2").click(function(){
    $(".pass3").fadeOut(1000,"linear",function(){$(".pass1").fadeIn(1000);});
  });
});


function checkk(){

var p1=document.getElementById("p1").value;
var p2=document.getElementById("p2").value;
//alert(" p1 : "+p1+"  p2 : "+p2);

	if(p1 == p2)
	{document.getElementById("match").style.visibility="hidden";
		document.getElementById("sub").disabled=false;
	}else
	{
		document.getElementById("match").style.visibility="";
		document.getElementById("sub").disabled=true;
	}
}

function check123()
	{
		var c=document.getElementById("p1").value;
		//alert(c.length);
		if(c.length < 8 )
		{
			document.getElementById("ps").innerHTML="<br/><font color=red>password must be atleast 8 - 32 char long</font>";
			return false;
		}
		else
		{
			document.getElementById("ps").innerHTML="";
			return true;
		}
	}
</script>
<?php

if(isset($_SESSION['error']))
{
if($_SESSION['error']==6)
{echo "<script>document.getElementById(\"chang\").style.display=\"\";</script>";
 }
//unset($_SESSION['error']);
}
?>

</body>
  
  
</html>