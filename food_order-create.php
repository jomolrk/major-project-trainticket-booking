<?php
// Include config file
require_once "config2.php";
//$reg_id=prav_user("login.php");


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
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $User_id = trim($_POST["User_id"]);
		$Food_id = trim($_POST["Food_id"]);
		$Schedule_id = trim($_POST["Schedule_id"]);
		$Status = trim($_POST["Status"]);
		

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

        $vars = parse_columns('food_order', $_POST);
        $stmt = $pdo->prepare("INSERT INTO food_order (User_id,Food_id,Schedule_id,Status) VALUES (?,?,?,?)");

        if($stmt->execute([ $User_id,$Food_id,$Schedule_id,$Status  ])) {
                $stmt = null;
                header("location: ./?page=food_order-index");
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
	
  <?php
  //session_start();
 //require_once "config2.php";
 $reg_id=prav_user("login.php");
 
  ?>
 
</head>
<body>

 
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Confirm food booking</h2>
                    </div>
                    <p>Please fill this form and submit to add a record to the database.</p>
                    <form action="food_order-create.php" method="post" {PRAV_ENCRY}>

                        <div class="form-group">
                                <label>User ID</label>
                                <input type="number" readonly placeholder="User id" required name="User_id" class="form-control" value="<?php echo $reg_id; ?>">
                                <span class="form-text"><?php echo $User_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Food id</label>
                                <input type="number" placeholder="Food_id" readonly required name="Food_id" class="form-control" value="<?php echo $_GET['food_id']; ?>">
                                <span class="form-text"><?php echo $Food_id_err; ?></span>
                            </div>
						<div class="form-group">
						
                                <label>Select Active Booking</label>
                           <!--     <input type="number" placeholder="Schedule_id" required name="Schedule_id" class="form-control" value="<?php echo $Schedule_id; ?>">
                                <span class="form-text"><?php echo $Schedule_id_err; ?></span>
								-->
							
							<?php
  
  $status = "Active";
  $query = "SELECT * FROM ticketbook WHERE reg_id = $reg_id AND status = '$status'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    echo '<select class="form-control" name="Schedule_id">';
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option value="' . $row['id'] . '">' . $row['id']. ' | '. $row['schedule'].' </option>';
    }
    echo '</select>';
  } else {
    echo 'No bookings found';
  }
?>




							
							
                            </div>
						<div class="form-group">
                               
                                <input type="hidden" placeholder="Status"  name="Status" class="form-control" value="0">
                                <span class="form-text"><?php echo $Status_err; ?></span>
                            </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="food_order-index.php" class="btn btn-secondary">Cancel</a>
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