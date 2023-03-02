<?php
 //session_start();
 $n=$_SESSION['email'];
require_once "config2.php";
$reg_id=reg_user("login.php");

 ?>
 <head>
 <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
 
 <body>
    <section class="pt-5">
        <div class="container-fluid" style="background-color: white;">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="float-left">My bookings Details</h2>
                        <a href="./?page=schedules" class="btn btn-success float-right">New Booking</a>
                       <!-- <a href="ticketbook-index.php" class="btn btn-info float-right mr-2">Reset View</a>
                        <a href="index.php" class="btn btn-secondary float-right mr-2">Back</a>-->
                    </div>

                    <div class="form-row">
                        <form action="ticketbook-index.php" method="get">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Search this table" name="search">
                        </div>
                    </div>
                    <input type="hidden" id="name1" value="<?php echo $n; ?>">
                        </form>

                    <br>

                    <?php
                    // Include config file
                   
                    

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

                 
                    $offset = ($pageno-1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM ticketbook";
                    $result = mysqli_query($link,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    //Column sorting on column name
                    $orderBy = array('seat_num', 'schedule_id', 'schedule', 'firstname', 'middlename', 'lastname', 'seat_type', 'fare_amount', 'date_created', 'date_updated', 'status');
                    $order = 'id';
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
                    $sql = "SELECT * FROM ticketbook where reg_id=".$reg_id." ORDER BY $order $sort LIMIT $offset, $no_of_records_per_page" ;
					//SELECT * FROM ticketbook WHERE reg_id=10022 ORDER BY id DESC LIMIT 10;
					//echo $sql;
                    $count_pages = "SELECT * FROM ticketbook where reg_id=".$reg_id;


                    if(!empty($_GET['search'])) {
                        $search = ($_GET['search']);
                        $sql = "SELECT * FROM ticketbook
                            WHERE CONCAT_WS (seat_num,schedule_id,schedule,firstname,middlename,lastname,seat_type,fare_amount,date_created,date_updated,status)
                            LIKE '%$search%'
                            ORDER BY $order $sort
                            LIMIT $offset, $no_of_records_per_page";
                        $count_pages = "SELECT * FROM ticketbook
                            WHERE CONCAT_WS (seat_num,schedule_id,schedule,firstname,middlename,lastname,seat_type,fare_amount,date_created,date_updated,status)
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
                                        echo "<th><a href=?search=$search&sort=&order=seat_num&sort=$sort>Seat Number</th>";
										echo "<th><a href=?search=$search&sort=&order=schedule_id&sort=$sort>Schedule</th>";
										echo "<th><a href=?search=$search&sort=&order=schedule&sort=$sort>Date and Time</th>";
										echo "<th><a href=?search=$search&sort=&order=firstname&sort=$sort>First Name</th>";
										//echo "<th><a href=?search=$search&sort=&order=middlename&sort=$sort>Middle Name</th>";
										echo "<th><a href=?search=$search&sort=&order=lastname&sort=$sort>Last Name</th>";
										echo "<th><a href=?search=$search&sort=&order=seat_type&sort=$sort>Type</th>";
										echo "<th><a href=?search=$search&sort=&order=fare_amount&sort=$sort>Fare</th>";
										echo "<th><a href=?search=$search&sort=&order=date_created&sort=$sort>Booked date</th>";
                             
										//echo "<th><a href=?search=$search&sort=&order=date_updated&sort=$sort>Updated date</th>";
										echo "<th><a href=?search=$search&sort=&order=status&sort=$sort>Status</th>";
										
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['seat_num'] . "</td>";echo "<td>";
							//echo $row['schedule_id'];
							
							echo "From:";
							echo prav_get("route_from","schedule_list","id",$row['schedule_id']);
							echo "<br><br>To :";
							echo prav_get("route_to","schedule_list","id",$row['schedule_id']);
							$train_id= prav_get("train_id","schedule_list","id",$row['schedule_id']);
							echo "<br><br>Train:";
							echo prav_get("name","train","id",$train_id);
							

							echo "</td>";
							echo "<td>" . $row['schedule'] . "</td>";echo "<td>" . $row['firstname'] . "</td>";
									//echo "<td>" . $row['middlename'] . "</td>";
									echo "<td>" . $row['lastname'] . "</td>";
									
									echo "<td>"; 
									if($row['seat_type'])
									{
									echo "First Class";	
										
									}	
else
{
	
	echo "Second Class";	
}	
									
									echo "</td>";
									
									
									
									
									echo "<td>" . $row['fare_amount'] . "</td>";echo "<td>" . $row['date_created'] . "</td>";
                                    //echo "<td>" . $row['date_updated'] . "</td>";
									echo "<td>" . $row['status'] . "</td>";
									
                                        echo "<td>";
										
                                            //echo "<a href='ticketbook-read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><i class='far fa-eye'></i></a>";
                                            echo "<a href='ticketbook-update.php?id=". $row['id'] ."&status=cancel' title='Update Record' data-toggle='tooltip'>Cancel Ticket<i class='far fa-edit'></i></a>";
                                            //echo "<a href='ticketbook-delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><i class='far fa-trash-alt'></i></a>";
                                            // echo "<a href='payment.php?id=". $row['id'] ."'title='payment Record' data-toggle='tooltip'>payment<i class='far fa-edit'></i></a>";
                                          ?>  <input type="button" id="rzp-button1"name="btn"value="pay now"class="btn btn-primary" onclick="pay_now()"/>
                                          <?php  echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                           // $a=$row['fare_amount'];
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
	</body>
		
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
         function pay_now(){
		var name = jQuery('#name1').val();
        
		console.log(name);
		
        var amount=<?php echo $row['fare_amount'] ?>;
        
        var options =  {
            "key": "rzp_test_D5Na98iqxqTQLf", // Enter the Key ID generated from the Dashboard
            "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Travel Valley",
            "description": "Test Transaction",
            "image": "https://example.com/your_logo",
            "handler":function(response){
              
               jQuery.ajax({
                   type:"POST",
                   url: "payment_process.php",
                   data:"payment_id="+response.razorpay_payment_id+"&amount="+amount+"&name="+name,
                   success:function(result){
                       window,location.href="thankyou.php";
                   }
               });
              
      }
        
    
};
var rzp1 = new Razorpay(options);

    rzp1.open();
    
    }
        </script>


</html>