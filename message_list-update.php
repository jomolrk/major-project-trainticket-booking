<?php
// Include config file
require_once "config.php";


// Define variables and initialize with empty values
$fullname = "";
$contact = "";
$email = "";
$message = "";
$status = "";
$reply = "";
$date_created = "";

$fullname_err = "";
$contact_err = "";
$email_err = "";
$message_err = "";
$status_err = "";
$reply_err = "";
$date_created_err = "";


// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $fullname = trim($_POST["fullname"]);
		$contact = trim($_POST["contact"]);
		$email = trim($_POST["email"]);
		$message = trim($_POST["message"]);
		$status = trim($_POST["status"]);
		$reply = trim($_POST["reply"]);
		$date_created = trim($_POST["date_created"]);
		

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

    $vars = parse_columns('message_list', $_POST);
    $stmt = $pdo->prepare("UPDATE message_list SET fullname=?,contact=?,email=?,message=?,status=?,reply=?,date_created=? WHERE id=?");

    if(!$stmt->execute([ $fullname,$contact,$email,$message,$status,$reply,$date_created,$id  ])) {
        echo "Something went wrong. Please try again later.";
        header("location: error.php");
    } else {
        $stmt = null;
        //header("location: message_list-read.php?id=$id");
		
		header("location: message_list-index.php");
    }
} else {
    // Check existence of id parameter before processing further
	$_GET["id"] = trim($_GET["id"]);
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM message_list WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Set parameters
            $param_id = $id;

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

                    $fullname = $row["fullname"];
					$contact = $row["contact"];
					$email = $row["email"];
					$message = $row["message"];
					$status = $row["status"];
					$reply = $row["reply"];
					$date_created = $row["date_created"];
					

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
    <title>Give Reply</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
 <?php require_once('../config.php'); ?>
  <!DOCTYPE html>
 <html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
 
</head>
<body>

   <body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
     <div class="wrapper">
      <?php require_once('inc/topBarNav.php') ?>
      <?php require_once('inc/navigation.php') ?>
      <?php if($_settings->chk_flashdata('success')): ?>
       <script>
         alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
       </script>
       <?php endif;?>    
      <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper pt-3" style="min-height: 567.854px;">
      
       
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Give Reply</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" {PRAV_ENCRY}>

                        <div class="form-group">
                                <label>Fullname</label>
                                <textarea name="fullname" class="form-control" readonly><?php echo $fullname ; ?></textarea>
                                <span class="form-text"><?php echo $fullname_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Contact</label>
                                <textarea name="contact" class="form-control" readonly><?php echo $contact ; ?></textarea>
                                <span class="form-text"><?php echo $contact_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Email</label>
                                <textarea name="email" class="form-control" readonly><?php echo $email ; ?></textarea>
                                <span class="form-text"><?php echo $email_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Cust. Message</label>
                                <textarea name="message" class="form-control" readonly><?php echo $message ; ?></textarea>
                                <span class="form-text"><?php echo $message_err; ?></span>
                            </div>
						<div class="form-group">
                                
                                <input type="hidden" placeholder="status" required name="status" class="form-control" value="1">
                                <span class="form-text"><?php echo $status_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Reply</label>
								
								  <textarea name="reply" class="form-control"><?php echo $reply ; ?></textarea>
                                
                                <span class="form-text"><?php echo $reply_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Date</label>
                                <input type="datetime-local" placeholder="Date" required name="date_created" class="form-control" value="<?php echo date("Y-m-d\TH:i:s", strtotime($date_created)); ?>">
                                <span class="form-text"><?php echo $date_created_err; ?></span>
                            </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="message_list-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
	
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
         <!-- /.content -->
   <div class="modal fade" id="confirm_modal" role='dialog'>
     <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
       <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title">Confirmation</h5>
       </div>
       <div class="modal-body">
         <div id="delete_content"></div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary btn-flat" id='confirm' onclick="">Continue</button>
         <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
       </div>
       </div>
     </div>
   </div>
   <div class="modal fade rounded-0" id="uni_modal" role='dialog'>
     <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
       <div class="modal-content rounded-0">
         <div class="modal-header rounded-0">
         <h5 class="modal-title"></h5>
       </div>
       <div class="modal-body rounded-0">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary btn-flat" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
         <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancel</button>
       </div>
       </div>
     </div>
   </div>
   <div class="modal fade rounded-0" id="uni_modal_right" role='dialog'>
     <div class="modal-dialog modal-full-height  modal-md rounded-0" role="document">
       <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title"></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span class="fa fa-arrow-right"></span>
         </button>
       </div>
       <div class="modal-body">
       </div>
       </div>
     </div>
   </div>
   <div class="modal fade rounded-0" id="viewer_modal" role='dialog'>
     <div class="modal-dialog modal-md rounded-0" role="document">
       <div class="modal-content">
               <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
               <img src="" alt="">
       </div>
     </div>
   </div>
       </div>
       <!-- /.content-wrapper -->
       <?php require_once('inc/footer.php') ?>
   
</body>
</html>
