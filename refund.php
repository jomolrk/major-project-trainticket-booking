<?php
require_once('../config2.php');
if(isset($_GET['id'])){
	$random_number = "refund_" . rand(100000000, 999999999);

	$sql="UPDATE ticketbook SET status='Refunded',refund_id='".$random_number."' WHERE id=".$_GET['id'];
	
	
	$res=mysqli_query($link,$sql); 
	if($res)
	{
		?>
		<script>alert("Refund request is transmitted to Payement Gateway.");
		window.location.replace("../admin/?page=reservations");
		</script>
		<?php
		
		
	}
}