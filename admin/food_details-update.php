<?php
// Include config file
require_once "config.php";


// Define variables and initialize with empty values
$Category = "";
$Name = "";
$Description = "";
$Price = "";
$Status = "";

$Category_err = "";
$Name_err = "";
$Description_err = "";
$Price_err = "";
$Status_err = "";


// Processing form data when form is submitted
if(isset($_POST["food_id"]) && !empty($_POST["food_id"])){
    // Get hidden input value
    $food_id = $_POST["food_id"];

    $Category = trim($_POST["Category"]);
		$Name = trim($_POST["Name"]);
		$Description = trim($_POST["Description"]);
		$Price = trim($_POST["Price"]);
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

    $vars = parse_columns('food_details', $_POST);
    $stmt = $pdo->prepare("UPDATE food_details SET Category=?,Name=?,Description=?,Price=?,Status=? WHERE food_id=?");

    if(!$stmt->execute([ $Category,$Name,$Description,$Price,$Status,$food_id  ])) {
        echo "Something went wrong. Please try again later.";
        header("location: error.php");
    } else {
        $stmt = null;
        //header("location: food_details-read.php?food_id=$food_id");
		//praveen
		header("location: food_details-index.php");
    }
} else {
    // Check existence of id parameter before processing further
	$_GET["food_id"] = trim($_GET["food_id"]);
    if(isset($_GET["food_id"]) && !empty($_GET["food_id"])){
        // Get URL parameter
        $food_id =  trim($_GET["food_id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM food_details WHERE food_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Set parameters
            $param_id = $food_id;

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

                    $Category = $row["Category"];
					$Name = $row["Name"];
					$Description = $row["Description"];
					$Price = $row["Price"];
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" {PRAV_ENCRY}>

                        <div class="form-group">
                                <label>Category</label>
                                <input type="text" required placeholder="Category" name="Category" maxlength="15"class="form-control" value="<?php echo $Category; ?>">
                                <span class="form-text"><?php echo $Category_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Name</label>
                                <input type="text" required placeholder="Name" name="Name" maxlength="30"class="form-control" value="<?php echo $Name; ?>">
                                <span class="form-text"><?php echo $Name_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Description</label>
								
                                 <textarea name="Description" class="form-control" placeholder="Description" required>
								 <?php echo $Description; ?>
								 </textarea>
                                <span class="form-text"><?php echo $Description_err; ?></span>
                                
                            </div>
						<div class="form-group">
                                <label>Price</label>
                                <input type="number" placeholder="Price" required name="Price" class="form-control" value="<?php echo $Price; ?>">
                                <span class="form-text"><?php echo $Price_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Status</label>
                                <input type="number" placeholder="Status" required name="Status" class="form-control" value="<?php echo $Status; ?>">
                                <span class="form-text"><?php echo $Status_err; ?></span>
                            </div>

                        <input type="hidden" name="food_id" value="<?php echo $food_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="food_details-index.php" class="btn btn-secondary">Cancel</a>
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
