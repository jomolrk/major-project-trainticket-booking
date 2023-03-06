<?php
session_start();
$email=$_SESSION['email'];
$id=$_GET['id']; 
$_SESSION['txid']=$id;
include('config2.php');



/*
$n=$_SESSION['email'];
if(isset($_POST['payment_id']) && isset($_POST['amount']) && isset($_POST['name'])){
    $pymnt_id=$_POST['payment_id'];
    $amt=$_POST['amount'];
    $nme=$_POST['name'];
    $payment_status="completed";
    
    mysqli_query($conn,"DELETE FROM `tbl_cart` where username='$nme'");
    mysqli_query($conn,"INSERT INTO `tbl_payment`( `name`,`amount`,`payment_id`,`payment_status`)
     VALUES ('$nme','$amt','$pymnt_id', '$payment_status')");
    
}
*/

?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!--<button onclick="payWithRazorpay()">Pay Now</button>-->

<script>
function payWithRazorpay() {
	
  var options = {
    "key": "rzp_test_D5Na98iqxqTQLf",
    "amount": "<?php echo $_GET['amount']*100;?>", // amount in paise
    "currency": "INR",
    "name": "Booking System",
    "description": "Payment for order #<?php echo $id;?>",
	"handler":function(response){
           
			   var payment_id = response.razorpay_payment_id;
			   window.location.href = "update_database.php?payment_id=" + payment_id;
               jQuery.ajax({
                   type:"POST",
                   url: "update_database.php?payment_id="+ payment_idd,
                   data:"payment_id="+response.razorpay_payment_id+"&amount="+amount+"&name="+name,
                   success:function(result){
                       
					   
					  
   window.location.href = "update_database.php?payment_id=" + payment_id;
                   }
               });
              
      },
    "prefill": {
        "name": "<?php echo $_GET['fname'];?>",
        "email": "<?php echo $email;?>",
        "contact": "9999999999"
    },
    "theme": {
        "color": "#F37254"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
}
</script>
<body onload="payWithRazorpay()">
</body>