<?php
	session_start();

	if (isset($_SESSION['islogged']) && $_SESSION['islogged']) {
		if ($_SESSION['isuser']) {
			header('Location: userindex.php');
		} else {
			header('Location: ../Trainticket/admin/index1.php');
		}
	}

	include 'connection.php';

	if (isset($_POST["submit"])) {
		$fname = $_POST["name"];
		$email = $_POST["email"];
		$phone = $_POST["phno"];
		$gender = $_POST["gender"];
		$password = md5($_POST["password"]);
		$cpassword = md5($_POST["cpassword"]);
		$idcard = $_POST["ino"];


		$dob = date("Y-m-d", strtotime($_POST["dob"]));
		if (!preg_match("/^[a-zA-Z ]+$/", $fname)) {
			$name_error = "Name must contain only alphabets and space";
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_error = "Please Enter Valid Email ID";
		}
		if (strlen($password) < 6) {
			$password_error = "Password must be minimum of 6 characters";
		}
		if (strlen($phone) < 10) {
			$mobile_error = "Mobile number must be minimum of 10 characters";
		}
		if ($password != $cpassword) {
			$cpassword_error = "Password and Confirm Password doesn't match";
		}

		$reg = mysqli_query($conn, "SELECT * from tbl_login WHERE log_emailid='$email'");
		if (mysqli_num_rows($reg) > 0) {
			echo "<script> 
			alert('Already Registered');</script>";
			header('location:login.php');
		} else {
			$reg_sql = "INSERT INTO tbl_register VALUES (null,'$fname','$phone','$gender','$idcard','$dob')";
			if (mysqli_query($conn, $reg_sql)) {
				$rdetails_sql = mysqli_query($conn, "SELECT * FROM tbl_register WHERE reg_name='$fname' AND reg_phone='$phone' AND reg_gender='$gender'");
				$rdetails_res = mysqli_fetch_array($rdetails_sql);
				$reg_id = $rdetails_res['reg_id'];
				$login_sql = "INSERT INTO tbl_login VALUES (null,'$reg_id','$email','$password',1,'user')";
				$login_sql = mysqli_query($conn, $login_sql);
				if ($login_sql) {
					$ldetails_sql = mysqli_query($conn, "SELECT * from tbl_login where log_emailid='$email'");
					$ldetails_res = mysqli_fetch_assoc($ldetails_sql);
					$login_id = $ldetails_res['log_id'];
					$_SESSION['islogged']= true;
					$_SESSION['isuser']= true;
					echo "<script> alert('Registered Successfully.'); window.location.href='userindex.php';</script>";
				}
			} else {
				echo "<script> alert('Registration failed !! Please try again !!'); </script>";
			}
		}
	}

	// The admin register password php-code
	// $admin_pass = "admin";
	// $admin_en_pass = md5($admin_pass);
	// echo $admin_en_pass;

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Train Ticket Booking</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); }
		</script>

		<!-- <link href="css/style_reg.css" rel="stylesheet" type="text/css" media="all" /> -->
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

		<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- fontawesome links -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css" integrity="sha512-aNH2ILn88yXgp/1dcFPt2/EkSNc03f9HBFX0rqX3Kw37+vjipi1pK3L9W08TZLhMg4Slk810sPLdJlNIjwygFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" integrity="sha512-uj2QCZdpo8PSbRGL/g5mXek6HM/APd7k/B5Hx/rkVFPNOxAQMXD+t+bG4Zv8OAdUpydZTU3UHmyjjiHv2Ww0PA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/svg-with-js.min.css" integrity="sha512-j+8sk90CyNqD7zkw9+AwhRuZdEJRLFBUg10GkELVu+EJqpBv4u60cshAYNOidHRgyaKNKhz+7xgwodircCS01g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/fontawesome.min.js" integrity="sha512-j3gF1rYV2kvAKJ0Jo5CdgLgSYS7QYmBVVUjduXdoeBkc4NFV4aSRTi+Rodkiy9ht7ZYEwF+s09S43Z1Y+ujUkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/regular.min.js" integrity="sha512-Kcbb5bDGCQQwo67YHS9uDvRmyrNEqHLPA1Kmn0eqrritqGDp3OpkBGvHk36GNEH44MtWM1L5k3i9MSQPMkNIuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/solid.min.js" integrity="sha512-dcTe66qF6q/NW1X64tKXnDDcaVyRowrsVQ9wX6u7KSQpYuAl5COzdMIYDg+HqAXhPpIz1LO9ilUCL4qCbHN5Ng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<a href="index.php">
				
		<span class="glyphicon glyphicon-backward"></span> Back to Home</a>
		
		<link href="css/style_reg.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<!-- banner -->
	<div class="center-container">
	    <div class="main">
	        <h1 class="w3layouts_head">REGISTER NOW</h1>
			<div class="w3layouts_main_grid">
				<form action="#" method="post" class="w3_form_post" onsubmit="return validate()" autocomplete="off">
				
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Full Name </label>
							<input type="text" name="name" placeholder="Your Name" maxlength="50" onkeyup="return nameValidate(this);" required>
							<span id="name_error"></span>
							<?php
								if (isset($name_error)) {
									echo $name_error;
								}
							?>
						</span>
					</div>
						
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label> Email </label>
							<input type="email" name="email" placeholder="Your Email" maxlength="30" onkeyup="return emailValidate(this);" required>
							<span id="email_error"></span>
							<?php 
								if (isset($email_error)) {
									echo $email_error;
								}
							?>
						</span>
					</div>

					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Phone Number </label>
							<input id="reg_phone" type="number" name="phno" placeholder="Phone Number" onkeyup="return mobileValidate(this);" required>
							<span id="mobile_error"></span>
							<?php 
								if (isset($mobile_error)) {
									echo $mobile_error;
								}
							?>
						</span>
					</div>

					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label> Gender </label>
							<input type="radio" id="gender" name="gender" value="male" required> Male
							<input type="radio" id="gender" name="gender" value="female"required> Female
						</span>
					</div>

					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label> Password </label>
							<input type="password" name="password" placeholder="password" onkeyup="return passValidate(this)" required>
							<span id="pass_error" ></span>
							<?php 
								if (isset($password_error)) {
									echo $password_error;
								}
							?>
						</span>
					</div>
					
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label> Confirm Password</label><br/>
							<input type="password" id="cpassword" name="cpassword" placeholder="confirm password" onkeyup="return confirmPassValidate(this);" required>
							<span id="cpass_error" ></span>
							<?php 
								if (isset($cpassword_error)) {
									echo $cpassword_error;
								}
							?>
						</span>
					</div>

					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label> ID card No: </label>
							<input type="tel" name="ino" placeholder="Adhar only" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
							<small>Format: 0000-0000-0000</small>
						</span>
					</div>
				
					<div class="agileits_w3layouts_main_grid w3ls_main_grid">
						<span class="agileinfo_grid">
							<label>Date Of  Birth </label>
							<div class="agileits_w3layouts_main_gridl">
								<input type="date" id="dateofbirth" name="dob" required="" max="<?php echo date('Y-m-d', time()-60*60*24*365*18);?>" value="<?php echo date('Y-m-d', time()-60*60*24*365*18);?>">
							</div>
							<div class="clear"> </div>
						</span>
					</div>

					<div class="content-w3ls">
						<div class="form-w3ls">
							<div class="content-wthree2">
								<div class="grid-w3layouts1">
									<div class="w3-agile1"></div>
									<div class="clear"></div>
								</div>
							</div>

							<div class="form-w3ls-1">
								<div class="grid-w3layouts1">
									<div class="w3-agile1">
										<div class="clear"></div>
									</div>
									<div class="w3_main_grid">
										<div class="w3_main_grid_right">
											<input type="submit" name="submit" value="Submit">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
    
	<script language="javascript" type="text/javascript">

		function nameValidate(input){
			var letters = /^[A-Za-z]+$/; 
			if(!letters.test(input.value)){
				document.getElementById("name_error").innerHTML="<p class='error_msg'><i class='fa fa-error'></i> Name must be not start with number</p>";
				return false;
			}
			else if(input.value.length < 2){
				document.getElementById("name_error").innerHTML="<p class='error_msg'><i class='fa fa-error'></i> Name must be atleast 7 - 32 char long</p>";
				return false;
			}
			else{
				document.getElementById("name_error").innerHTML="";
				return true;
			}
		}

		function emailValidate(input){
			
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(!mailformat.test(input.value)){
				document.getElementById("email_error").innerHTML="<p class='error_msg'><i class='fa fa-error'></i> Invalid email address !! Correct Email-ID Example : abcd@gmail.com</p>";
				return false;
			}
			else{
				document.getElementById("email_error").innerHTML="";
				return false;
			}
		}

		function mobileValidate(input){
			
			var mobilepattern= /^[7-9]{1}[0-9]{9}$/;
			if(!mobilepattern.test(input.value)){
				document.getElementById("mobile_error").innerHTML="<p class='error_msg'><i class='fa fa-error'></i> Please enter a valid mobile number !! The number should first with either 7/8/9 and should have in total 10 digits</p>";
				return false;
			}
			else{
				document.getElementById("mobile_error").innerHTML="";
				return true;
			}
		}

		function passValidate(input){

			var passpattern= /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{7,}$/;
			if(!passpattern.test(input.value)){
				document.getElementById("pass_error").innerHTML="<p class='error_msg'><i class='fa fa-error'></i> At least one upper case English letter<br>At least one lower case English letter<br>At least one digit<br>At least one special character like -> # ? ! @ $ % ^ & * -<br>Minimum seven in length</p>";
				return false;
			}
			else{
				document.getElementById("pass_error").innerHTML="";
				return true;
			}
		}

		function confirmPassValidate(input){
			var pass=document.getElementById('password');
			var cpass=document.getElementById('cpassword');
			if(pass.value!=cpass.value){
				document.getElementById("cpass_error").innerHTML="<p class='error_msg'><i class='fa fa-error'></i> Password not match !! Please try again.</p>";
				return false;
			}
			else{
				document.getElementById("cpass_error").innerHTML="";
				return true;
			}
		}

		function validate(){ 
			if(!nameValidate())
				return false;	
			else if(!emailValidate())
				return false;
			else if(!mobileValidate())
				return false;
			else if(!passValidate())
				return false;
			else if(!confirmPassValidate())
				return false;
			else
				return true;
		}
		
	</script> 
<!-- //footer -->
</body>
</html>
