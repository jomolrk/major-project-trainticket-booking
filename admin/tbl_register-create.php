<?php
// Include config file
require_once "config.php";


// Define variables and initialize with empty values
$first_name = "";
$last_name = "";
$reg_phone = "";
$reg_gender = "";
$reg_adhar = "";
$reg_img = "";
$reg_dob = "";

$first_name_err = "";
$last_name_err = "";
$reg_phone_err = "";
$reg_gender_err = "";
$reg_adhar_err = "";
$reg_img_err = "";
$reg_dob_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $first_name = trim($_POST["first_name"]);
		$last_name = trim($_POST["last_name"]);
		$reg_phone = trim($_POST["reg_phone"]);
		$reg_gender = trim($_POST["reg_gender"]);
		$reg_adhar = trim($_POST["reg_adhar"]);
		$reg_img = trim($_POST["reg_img"]);
		$reg_dob = trim($_POST["reg_dob"]);
		

        $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
        $options = [
          PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];
        try {
          $pdo = new PDO($dsn, $db_user, $db_password, $options);
        } catch (Exception $e) {
          error_log($e->getMessage());
          exit('Something weird happened'); //something a user can understand
        }

        $vars = parse_columns('tbl_register', $_POST);
        $stmt = $pdo->prepare("INSERT INTO tbl_register (first_name,last_name,reg_phone,reg_gender,reg_adhar,reg_img,reg_dob) VALUES (?,?,?,?,?,?,?)");

        if($stmt->execute([ $first_name,$last_name,$reg_phone,$reg_gender,$reg_adhar,$reg_img,$reg_dob  ])) {
                $stmt = null;
                header("location: tbl_register-index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
 
</head>
<body>

 
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add a record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >

                        <div class="form-group">
                                <label>first_name</label>
                                <input type="text" required placeholder="first_name" name="first_name" maxlength="100"class="form-control" value="<?php echo $first_name; ?>">
                                <span class="form-text"><?php echo $first_name_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>last_name</label>
                                <input type="text" required placeholder="last_name" name="last_name" maxlength="20"class="form-control" value="<?php echo $last_name; ?>">
                                <span class="form-text"><?php echo $last_name_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>reg_phone</label>
                                <input type="text" required placeholder="reg_phone" name="reg_phone" maxlength="15"class="form-control" value="<?php echo $reg_phone; ?>">
                                <span class="form-text"><?php echo $reg_phone_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>reg_gender</label>
                                <input type="text" required placeholder="reg_gender" name="reg_gender" maxlength="20"class="form-control" value="<?php echo $reg_gender; ?>">
                                <span class="form-text"><?php echo $reg_gender_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>reg_adhar</label>
                                <input type="text" required placeholder="reg_adhar" name="reg_adhar" maxlength="20"class="form-control" value="<?php echo $reg_adhar; ?>">
                                <span class="form-text"><?php echo $reg_adhar_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>reg_img</label>
                                <input type="text" required placeholder="reg_img" name="reg_img" maxlength="500"class="form-control" value="<?php echo $reg_img; ?>">
                                <span class="form-text"><?php echo $reg_img_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>reg_dob</label>
                                <input type="date" required placeholder="reg_dob" name="reg_dob" class="form-control" value="<?php echo $reg_dob; ?>">
                                <span class="form-text"><?php echo $reg_dob_err; ?></span>
                            </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="tbl_register-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
	
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>