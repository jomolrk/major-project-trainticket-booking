<?php
// Include config file
require_once "config.php";


// Define variables and initialize with empty values
$User_id = "";
$Food_id = "";
$Schedule_id = "";
$Status = "";

$User_id_err = "";
$Food_id_err = "";
$Schedule_id_err = "";
$Status_err = "";


// Processing form data when form is submitted
if(isset($_POST["Order_id"]) && !empty($_POST["Order_id"])){
    // Get hidden input value
    $Order_id = $_POST["Order_id"];

    $User_id = trim($_POST["User_id"]);
		$Food_id = trim($_POST["Food_id"]);
		$Schedule_id = trim($_POST["Schedule_id"]);
		$Status = trim($_POST["Status"]);
		

    // Prepare an update statement
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
        exit('Something weird happened');
    }

    $vars = parse_columns('food_order', $_POST);
    $stmt = $pdo->prepare("UPDATE food_order SET User_id=?,Food_id=?,Schedule_id=?,Status=? WHERE Order_id=?");

    if(!$stmt->execute([ $User_id,$Food_id,$Schedule_id,$Status,$Order_id  ])) {
        echo "Something went wrong. Please try again later.";
        header("location: error.php");
    } else {
        $stmt = null;
        //header("location: food_order-read.php?Order_id=$Order_id");
		//praveen
		header("location: food_order-index.php");
    }
} else {
    // Check existence of id parameter before processing further
	$_GET["Order_id"] = trim($_GET["Order_id"]);
    if(isset($_GET["Order_id"]) && !empty($_GET["Order_id"])){
        // Get URL parameter
        $Order_id =  trim($_GET["Order_id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM food_order WHERE Order_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Set parameters
            $param_id = $Order_id;

            // Bind variables to the prepared statement as parameters
			if (is_int($param_id)) $__vartype = "i";
			elseif (is_string($param_id)) $__vartype = "s";
			elseif (is_numeric($param_id)) $__vartype = "d";
			else $__vartype = "b"; // blob
			mysqli_stmt_bind_param($stmt, $__vartype, $param_id);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value

                    $User_id = $row["User_id"];
					$Food_id = $row["Food_id"];
					$Schedule_id = $row["Schedule_id"];
					$Status = $row["Status"];
					

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.<br>".$stmt->error;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
  <?php
  //session_start();
 require_once "config2.php";
 $reg_id=prav_user("login.php");
 
  ?>
 
</head>
<body>

 
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" {PRAV_ENCRY}>

                        <div class="form-group">
                                <label>User_id</label>
                                <input type="number" placeholder="User_id" required name="User_id" class="form-control" value="<?php echo $User_id; ?>">
                                <span class="form-text"><?php echo $User_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Food_id</label>
                                <input type="number" placeholder="Food_id" required name="Food_id" class="form-control" value="<?php echo $Food_id; ?>">
                                <span class="form-text"><?php echo $Food_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Schedule_id</label>
                                <input type="number" placeholder="Schedule_id" required name="Schedule_id" class="form-control" value="<?php echo $Schedule_id; ?>">
                                <span class="form-text"><?php echo $Schedule_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Status</label>
                                <input type="number" placeholder="Status" required name="Status" class="form-control" value="<?php echo $Status; ?>">
                                <span class="form-text"><?php echo $Status_err; ?></span>
                            </div>

                        <input type="hidden" name="Order_id" value="<?php echo $Order_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="food_order-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
	
 
</body>
</html>
