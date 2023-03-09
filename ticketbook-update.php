<?php
// Include config file
require_once "config2.php";

$sql="UPDATE `ticketbook` SET `status` = 'Cancelled' WHERE id =".$_GET['id'];


if (mysqli_query($link, $sql)) {
  //  echo "Record updated successfully";
  ?>
<script>
alert("Booking cancelled");
</script>
<?php
 header("location: ./?page=bookings");
       // exit();	
	
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>