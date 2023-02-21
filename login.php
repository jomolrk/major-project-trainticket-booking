<?php
    session_start();
    if(isset($_SESSION['islogged']) && $_SESSION['islogged']){
        if($_SESSION['isuser']){
            header('Location: userindex.php');
        }
        else{
          header('Location: ../Trainticket/admin/index1.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login/signup</title>
     <!--Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- //Meta tag Keywords -->
   <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
    <ul class="nav navbar-nav navbar-right">
    <a href="index.php">
          
          <span class="glyphicon glyphicon-backward"></span> Back to Home</a>
	    </ul>
    <!--//Style-CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">

</head>
<body>
    <div class="w3l-signinform">

        <div class="wrapper">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h1><b></b>LOGIN HERE</h1><b></h1>
                    <p class="sub-para">Please login with your emailid and password</p>

                    <form action="login.php" method="post">

                        <?php
if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
}
?>
                        <div class="input-group">
                            <span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="email" placeholder="Emailid" name="email" required="">
                        </div>
                        <div class="input-group two-groop">
                            <span><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="Password" placeholder="Password" name="password" required=""><br>
                            </div>
                        <div>

                            <a href="forgotpassword.php" class="forgot">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button>
                    </form>

                    <p class="account">Don't have an account? <a href = "register.php"> Register </a></p>
                </div>
            </div>

            <!-- //main content -->
        </div>
        <?php
unset($_SESSION["error"]);
ini_set('display_errors', 1);
?>

        <!-- //container -->


</body>

</html>

<?php
include 'connection.php';
$error = "Invalid Email or Password";

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $sql = "SELECT * from tbl_login where log_emailid='$email' AND log_pass='$password'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        $res_fetch = mysqli_fetch_assoc($res);
        $log_status= $res_fetch['log_status'];
        if($log_status==1){
            $email = $res_fetch['log_emailid'];
            $password = $res_fetch['log_pass'];
            $type = $res_fetch['log_type'];
            $_SESSION['type'] = "$type";
            $_SESSION['email'] = "$email";

            $_SESSION['email'] = $email;
            $_SESSION['id'] = $res_fetch['log_id'];
            $_SESSION['islogged']= true;

            if ($_SESSION['type'] == 'user') {
                $_SESSION['isuser']= true;
                echo "<script>
                    alert('welcome user.');
                    window.location.href='userindex.php';
                </script>";
            }
            else if($_SESSION['type'] == 'admin') {
                $_SESSION['isuser']= false;
                echo "<script>
                    alert('welcome admin...');
                    window.location.href='../Trainticket/admin/index1.php';
                </script>";
            }
            else {
                echo "<script>alert('Please verify the email'); </script>";
            }
        }
        else{
            echo "<script>alert('Your account has been disabled by admin. Please contact admin to login !!'); </script>";
        }
    }
    else {
        
       echo "<script>alert('Login Failed !! Invalid email-id or password'); </script>";
       
        $_SESSION["error"] = $error;
    }
}

?>