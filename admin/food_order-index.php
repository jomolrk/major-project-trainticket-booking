<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 5px;
        }
        body {
            font-size: 14px;
        }
    </style>
	
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
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="float-left">Food Order Details</h2>
                      <!--   <a href="food_order-create.php" class="btn btn-success float-right">Add New Record</a>-->
                       <!-- <a href="food_order-index.php" class="btn btn-info float-right mr-2">Reset View</a>
                        <a href="index.php" class="btn btn-secondary float-right mr-2">Back</a>-->
                    </div>

                    <div class="form-row">
                        <form action="food_order-index.php" method="get">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Search this table" name="search">
                        </div>
                    </div>
                        </form>
                    <br>

                    <?php
                    // Include config file
                    require_once "config.php";
                    

                    //Get current URL and parameters for correct pagination
                    $protocol = $_SERVER['SERVER_PROTOCOL'];
                    $domain     = $_SERVER['HTTP_HOST'];
                    $script   = $_SERVER['SCRIPT_NAME'];
                    $parameters   = $_SERVER['QUERY_STRING'];
                    $protocol=strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')
                                === FALSE ? 'http' : 'https';
                    $currenturl = $protocol . '://' . $domain. $script . '?' . $parameters;

                    //Pagination
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }

                    //$no_of_records_per_page is set on the index page. Default is 10.
                    $offset = ($pageno-1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM food_order";
                    $result = mysqli_query($link,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    //Column sorting on column name
                    $orderBy = array('User_id', 'Food_id', 'Schedule_id', 'Status');
                    $order = 'Order_id';
                    if (isset($_GET['order']) && in_array($_GET['order'], $orderBy)) {
                            $order = $_GET['order'];
                        }

                    //Column sort order
                    $sortBy = array('asc', 'desc'); $sort = 'desc';
                    if (isset($_GET['sort']) && in_array($_GET['sort'], $sortBy)) {
                          if($_GET['sort']=='asc') {
                            $sort='desc';
                            }
                    else {
                        $sort='asc';
                        }
                    }

                    // Attempt select query execution
                    $sql = "SELECT * FROM food_order ORDER BY $order $sort LIMIT $offset, $no_of_records_per_page";
                    $count_pages = "SELECT * FROM food_order";


                    if(!empty($_GET['search'])) {
                        $search = ($_GET['search']);
                        $sql = "SELECT * FROM food_order
                            WHERE CONCAT_WS (User_id,Food_id,Schedule_id,Status)
                            LIKE '%$search%'
                            ORDER BY $order $sort
                            LIMIT $offset, $no_of_records_per_page";
                        $count_pages = "SELECT * FROM food_order
                            WHERE CONCAT_WS (User_id,Food_id,Schedule_id,Status)
                            LIKE '%$search%'
                            ORDER BY $order $sort";
                    }
                    else {
                        $search = "";
                    }

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            if ($result_count = mysqli_query($link, $count_pages)) {
                               $total_pages = ceil(mysqli_num_rows($result_count) / $no_of_records_per_page);
                           }
                            $number_of_results = mysqli_num_rows($result_count);
                            echo " " . $number_of_results . " results - Page " . $pageno . " of " . $total_pages;

                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th><a href=?search=$search&sort=&order=User_id&sort=$sort>User_id</th>";
										echo "<th><a href=?search=$search&sort=&order=Food_id&sort=$sort>Food_id</th>";
										//echo "<th><a href=?search=$search&sort=&order=Schedule_id&sort=$sort>Schedule_id</th>";
										//echo "<th><a href=?search=$search&sort=&order=Status&sort=$sort>Status</th>";
										
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['User_id'] . "</td>";echo "<td>" . $row['Food_id'] . "</td>";
                                    //echo "<td>" . $row['Schedule_id'] . "</td>";
									//echo "<td>" . $row['Status'] . "</td>";
                                        echo "<td>";
										
                                            //echo "<a href='food_order-read.php?Order_id=". $row['Order_id'] ."' title='View Record' data-toggle='tooltip'><i class='far fa-eye'></i></a>";
                                            echo "<a href='food_order-update.php?Order_id=". $row['Order_id'] ."' title='Update Record' data-toggle='tooltip'><i class='far fa-edit'></i></a>";
                                            echo "<a href='food_order-delete.php?Order_id=". $row['Order_id'] ."' title='Delete Record' data-toggle='tooltip'><i class='far fa-trash-alt'></i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
?>
                                <ul class="pagination" align-right>
                                <?php
                                    $new_url = preg_replace('/&?pageno=[^&]*/', '', $currenturl);
                                 ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=1' ?>">First</a></li>
                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo $new_url ."&pageno=".($pageno - 1); } ?>">Prev</a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $new_url . "&pageno=".($pageno + 1); } ?>">Next</a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=' . $total_pages; ?>">Last</a>
                                    </li>
                                </ul>
<?php
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
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
   
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>
</html>