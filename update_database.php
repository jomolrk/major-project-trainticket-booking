<?php
// Include config file
session_start();
$payment=$_REQUEST['payment_id'];
require_once "config2.php";

$sql="UPDATE `ticketbook` SET `status` = 'Paid',payment_id='".$payment."' WHERE id =".$_SESSION['txid'];

echo $sql;


if (mysqli_query($link, $sql)) {
    echo "Record updated successfully";
  ?>
<script>
alert("Thank you, Payment Done");
</script>
<?php
 header("location: ./?page=bookings");
       exit();	
	
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>