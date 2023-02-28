<?php
// Include config file
require_once "config.php";



    $reg_id = trim($_GET["reg_id"]);
	$status=trim($_GET["status"]);

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

    $vars = parse_columns('tbl_login', $_POST);
    $stmt = $pdo->prepare("UPDATE tbl_login SET log_status=? WHERE reg_id=?");
echo $status." ".$reg_id;
    if(!$stmt->execute([ $status,$reg_id])) {
        echo "Something went wrong. Please try again later.";
        header("location: error.php");
    } else {
        $stmt = null;
        //header("location: tbl_login-read.php?log_id=$log_id");
		//praveen
		header("location:../admin/?page=user/list");
    }

     

?>