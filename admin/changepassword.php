<html>

<head>
	<title>Pasword Reset</title>
	<style type="text/css">
		body {
			background-image: url(images/regim.jpg);
			background-size: cover;
			font-family: Arial, Helvetica, sans-serif;
			background-attachment: fixed;
		}

		.wrap {
			max-width: 550px;
			border-radius: 40px;
			margin: auto;
			background: rgba(0, 0, 0, 0.8);
			box-sizing: border-box;
			padding: 40px;
			color: #fff;
			margin-top: 55px;
		}

		h2 {
			text-align: center;
		}

		input[type=text],
		input[type=password] {
			width: 100%;
			box-sizing: border-box;
			padding: 12px 5px;
			background: rgba(0, 0, 0, 0.10);
			outline: none;
			border: none;
			border-bottom: 1px dotted #fff;
			color: #fff;
			border-radius: 5px;
			margin: 5px;
			font-weight: bold;
		}

		input[type=email],
		input[type=email] {
			width: 100%;
			box-sizing: border-box;
			padding: 15px 8px;
			background: rgba(0, 0, 0, 0.10);
			outline: none;
			border: none;
			border-bottom: 1px dotted #fff;
			color: #fff;
			border-radius: 5px;
			margin: 5px;
			font-weight: bold;
		}

		input[type=submit] {
			width: 100%;
			box-sizing: border-box;
			padding: 10px 0;
			margin-top: 30px;
			outline: none;
			border: none;
			background: red;
			opacity: 0.7;
			border-radius: 20px;
			font-size: 20px;
			color: CYAN;
		}

		input[type=submit]:hover {
			background: black;
			opacity: 0.7;
		}

		input[type=button] {
			width: 100%;
			box-sizing: border-box;
			padding: 10px 0;
			margin-top: 5px;
			outline: none;
			border: none;
			background: cyan;
			opacity: 0.7;
			border-radius: 20px;
			font-size: 20px;
			color: RED;
		}

		input[type=button]:hover {
			background: black;
			opacity: 0.7;
		}
	</style>
</head>

<body>
	<div class="wrap">
		<h2>RESET PASSWORD</h2>
		<form action="#" method="POST">


			<table class="tbl-30">
				<tr>
					<td>Email_ID: </td>
					<td>
						<input type="email" placeholder="enter correct email address" name="email" required="">
					</td>
				</tr>
				<tr>
					<td>Current Password: </td>
					<td>
						<input type="password" name="current_password" placeholder="Current Password" required maxlength="8">
					</td>
				</tr>

				<tr>
					<td>New Password:</td>
					<td>
						<input type="password" name="pass" placeholder="New Password" maxlength=8 required="">
					</td>
				</tr>

				<tr>
					<td>Confirm Password: </td>
					<td>
						<input type="password" name="newpass" placeholder="Confirm Password" maxlength=8 required="">
					</td>
				</tr>

				<tr>
					<td colspan="2">

						<input type="submit" name="submit" value="Change Password" class="btn-secondary">
					</td>
				</tr>



				<tr>
					<td colspan="2"><a href="user.php"><input type="button" name="reset" value="Home" /></a><br><br></td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>

<?php
include '../connection.php';

if (isset($_POST['submit'])) {
    $email_id = $_POST['email'];
    $current_password = md5($_POST['current_password']);
    $pass = md5($_POST['pass']);
    $newpass = md5($_POST['newpass']);

    $sql = "SELECT * from tbl_login WHERE  log_emailid='$email_id' and log_pass='$current_password ' and log_type='admin'";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        //CHeck whether data is available or not
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            //User Exists and Password Can be CHanged
            //echo "User FOund";

            //Check whether the new password and confirm match or not
            if ($pass == $newpass) {
                //Update the Password
                $sql2 = "UPDATE tbl_login SET log_pass='$newpass' WHERE log_emailid='$email_id' ";
                if(mysqli_query($conn,$sql2)){
	echo "<script>
	    alert('password updated succefully');
	    window.location.href = 'index1.php';
	</script>";
                }
            } else {
                echo "<script>alert('Password Updation Failed. Try again!')</script>";
            }
        } else {
            echo "<script>alert('Incorrect email ID')</script>";
        }
    }
    else{
        echo "<script>alert('Incorrect current password !! Please enter correct password.');</script>";
    }
}

?>