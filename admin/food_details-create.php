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
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Category = trim($_POST["Category"]);
		$Name = trim($_POST["Name"]);
		$Description = trim($_POST["Description"]);
		$Price = trim($_POST["Price"]);
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

        $vars = parse_columns('food_details', $_POST);
        $stmt = $pdo->prepare("INSERT INTO food_details (Category,Name,Description,Price,Status) VALUES (?,?,?,?,?)");

        if($stmt->execute([ $Category,$Name,$Description,$Price,$Status  ])) {
                $stmt = null;
                header("location: food_details-index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

}
?>

<?php require_once('../config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add a record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" {PRAV_ENCRY}>

                        <div class="form-group">
                                <label>Category</label>
								
                                <select name="Category" class="form-control">
								<option>Veg Meal</option>
								<option>Non Veg Meal</option>
								<option>Beverage</option>
								</select>
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
                                <label>Price (Rs)</label>
                                <input type="number" placeholder="Price (Rs)" required name="Price" class="form-control" value="<?php echo $Price; ?>">
                                <span class="form-text"><?php echo $Price_err; ?></span>
                            </div>
						<div class="form-group">
                               <!-- <label>Status</label> -->
                                <input type="hidden" placeholder="Status" required name="Status" class="form-control" value="0">
                                <span class="form-text"><?php echo $Status_err; ?></span>
                            </div>

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
