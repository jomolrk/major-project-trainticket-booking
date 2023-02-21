<?php
include '../connection.php';
include 'include/header.php';
if (isset($_POST['submit'])) {
    $code = $_POST['tcode'];
    $tname = $_POST['tname'];
    $first_class = $_POST['firstclass'];
    $second_class = $_POST['secondclass'];
    $sleeper_class = $_POST['sleeperclass'];
    $gen = $_POST['generalquota'];
    $AC = $_POST['AC'];
    $lad = $_POST['ladiesquota'];
        mysqli_query($conn, "INSERT INTO `trains`( `t_code`, `tname`, `first class`, `secondclass`, `sleeperclass`, `generalqouta`, `AC`, `ladiesquota`)
                    VALUES (' $code ','$tname','$first_class','$second_class','$sleeper_class',' $gen ','$AC','$lad')");
      
      echo "<script>alert('Train added successfully!')</script>";
      echo "<script>window.location.href = 'trains.php';</script>";
    }
?>
 

<div class="modal-dialog modal-lg">
<div class="modal-content" align="center">
<div class="modal-header">
  
   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
</div>
<div class="modal-body">
   <form action="" method="post">
      <table class="table table-bordered">
         <tr>
            <th>Train code</th>
            <td><input type="text" class="form-control" name="tcode"   required ></td>
         </tr>
         <tr>
            <th>Train Name</th>
            <td> <select id="trains" name="tname" required>
			<option selected disabled>-------------------Select trains here----------------------</option>
			<option value="rajdhani" >Rajdhani Express </option>
			<option value="duronto" >Duronto Express</option>
			<option value="geetanjali">Geetanjali Express</option>
			<option value="garibrath" >Garib Rath </option>
			<option value="mysoreexp" >Mysore Express</option>
            <option value="garib" >Garib Rath Express</option>

		</select></td>
         </tr>
         <tr>
            <th>First Class Capacity</th>
            <td><input type="number" min='0' class="form-control" name="firstclass"  pattern="[0-9]"required ></td>
         </tr>
         <tr>
            <th>Tatkal Capacity</th>
            <td><input type="number" min='0' class="form-control" name="secondclass" required >
            </td>
         </tr>
         <tr>
            <th>Sleeper Class Capacity</th>
            <td><input type="number" min='0' class="form-control" name="sleeperclass" required id="">
            </td>
         </tr>
         <tr>
            <th>General Quota</th>
            <td><input type="number" min='0' class="form-control" name="generalquota" required id="">
            </td>
         </tr>
         <tr>
            <th>AC Coach</th>
            <td><input type="number" min='0' class="form-control" name="AC" required id="">
            </td>
         </tr>
         <tr>
            <th>Ladies Quota</th>
            <td><input type="number" min='0' class="form-control" name="ladiesquota" required id="">
            </td>
         </tr>
         <tr>
            <td colspan="2">
               <input class="btn btn-info" type="submit" value="Add Train" name='submit'>
            </td>
         </tr>
      </table>
   </form>
</div>     
<?php include('include/footer.php');?>      