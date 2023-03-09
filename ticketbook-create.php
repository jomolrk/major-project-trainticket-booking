<?php
// Include config file
require_once "config.php";


// Define variables and initialize with empty values
$seat_num = "";
$schedule_id = "";
$schedule = "";
$firstname = "";
$middlename = "";
$lastname = "";
$reg_id = "";
$seat_type = "";
$fare_amount = "";
$date_created = "";
$date_updated = "";

$seat_num_err = "";
$schedule_id_err = "";
$schedule_err = "";
$firstname_err = "";
$middlename_err = "";
$lastname_err = "";
$reg_id_err = "";
$seat_type_err = "";
$fare_amount_err = "";
$date_created_err = "";
$date_updated_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $seat_num = trim($_POST["seat_num"]);
		$schedule_id = trim($_POST["schedule_id"]);
		$schedule = trim($_POST["schedule"]);
		$firstname = trim($_POST["firstname"]);
		$middlename = trim($_POST["middlename"]);
		$lastname = trim($_POST["lastname"]);
		$reg_id = trim($_POST["reg_id"]);
		$seat_type = trim($_POST["seat_type"]);
		$fare_amount = trim($_POST["fare_amount"]);
		$date_created = trim($_POST["date_created"]);
		$date_updated = trim($_POST["date_updated"]);
		

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

        $vars = parse_columns('ticketbook', $_POST);
        $stmt = $pdo->prepare("INSERT INTO ticketbook (seat_num,schedule_id,schedule,firstname,middlename,lastname,reg_id,seat_type,fare_amount,date_created,date_updated) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

        if($stmt->execute([ $seat_num,$schedule_id,$schedule,$firstname,$middlename,$lastname,$reg_id,$seat_type,$fare_amount,$date_created,$date_updated  ])) {
                $stmt = null;
                header("location: ticketbook-index.php");
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
                                <label>Seat Number</label>
                                <input type="text" required placeholder="Seat Number" name="seat_num" maxlength="50"class="form-control" value="<?php echo $seat_num; ?>">
                                <span class="form-text"><?php echo $seat_num_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Schedule</label>
                                    <select class="form-control" id="schedule_id" name="schedule_id">
                                    <?php
                                        $sql = "SELECT *,id FROM schedule_list";
                                        $result = mysqli_query($link, $sql);
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            array_pop($row);
                                            $value = implode(" | ", $row);
                                            if ($row["id"] == $schedule_id){
                                            echo '<option value="' . "$row[id]" . '"selected="selected">' . "$value" . '</option>';
                                            } else {
                                                echo '<option value="' . "$row[id]" . '">' . "$value" . '</option>';
                                        }
                                        }
                                    ?>
                                    </select>
                                <span class="form-text"><?php echo $schedule_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Date time</label>
                                <input type="datetime-local" placeholder="Date time" required name="schedule" class="form-control" value="<?php echo date("Y-m-d\TH:i:s", strtotime($schedule)); ?>">
                                <span class="form-text"><?php echo $schedule_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>First Name</label>
                                <input type="password" placeholder="First Name" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Must contain Minimum eight characters, at least one letter and one number" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                                <span class="form-text"><?php echo $firstname_err; ?></span>
                            </div>
							
							<label> Confirm First Name</label>
                                <input type="password" placeholder="Confirm First Name" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Must contain Minimum eight characters, at least one letter and one number" name="cfirstname" class="form-control" value="<?php echo $firstname; ?>">
                                <span class="form-text"><?php echo $firstname_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Middle Name</label>
                                <input type="password" placeholder="Middle Name" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Must contain Minimum eight characters, at least one letter and one number" name="middlename" class="form-control" value="<?php echo $middlename; ?>">
                                <span class="form-text"><?php echo $middlename_err; ?></span>
                            </div>
							
							<label> Confirm Middle Name</label>
                                <input type="password" placeholder="Confirm Middle Name" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Must contain Minimum eight characters, at least one letter and one number" name="cmiddlename" class="form-control" value="<?php echo $middlename; ?>">
                                <span class="form-text"><?php echo $middlename_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Last Name</label>
                                <input type="password" placeholder="Last Name" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Must contain Minimum eight characters, at least one letter and one number" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                                <span class="form-text"><?php echo $lastname_err; ?></span>
                            </div>
							
							<label> Confirm Last Name</label>
                                <input type="password" placeholder="Confirm Last Name" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Must contain Minimum eight characters, at least one letter and one number" name="clastname" class="form-control" value="<?php echo $lastname; ?>">
                                <span class="form-text"><?php echo $lastname_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>reg_id</label>
                                <input type="number" placeholder="reg_id" required name="reg_id" class="form-control" value="<?php echo $reg_id; ?>">
                                <span class="form-text"><?php echo $reg_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Seat</label>
                                <input type="number" placeholder="Seat" required name="seat_type" class="form-control" value="<?php echo $seat_type; ?>">
                                <span class="form-text"><?php echo $seat_type_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Amount</label>
                                <input type="text" required  placeholder="Amount" name="fare_amount" class="form-control" value="<?php echo $fare_amount; ?>">
                                <span class="form-text"><?php echo $fare_amount_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>date_created</label>
                                <input type="datetime-local" placeholder="date_created" required name="date_created" class="form-control" value="<?php echo date("Y-m-d\TH:i:s", strtotime($date_created)); ?>">
                                <span class="form-text"><?php echo $date_created_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>date_updated</label>
                                <input type="datetime-local" placeholder="date_updated" required name="date_updated" class="form-control" value="<?php echo date("Y-m-d\TH:i:s", strtotime($date_updated)); ?>">
                                <span class="form-text"><?php echo $date_updated_err; ?></span>
                            </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="ticketbook-index.php" class="btn btn-secondary">Cancel</a>
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