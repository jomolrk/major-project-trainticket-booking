<?php
include '../connection.php';
include 'include/header.php';
if(isset($_POST["submit"])){
	
    
    
    
    $train_name=$_POST["t1"];
    $date=$_POST["date"];
    $s_1A=$_POST["1a"];
    $s_2A=$_POST["2a"];
    $s_3A=$_POST["3a"];
    $s_uA=$_POST["ua"];
    $s_1lA=$_POST["1la"];
    $s_2lA=$_POST["2la"];
    $s_3lA=$_POST["3la"];
    $s_ulA=$_POST["ula"];
     $type=$_POST["type"];
     $quota=$_POST["quota"];
   
	mysqli_query($conn,"INSERT INTO `seat`(`id`, `train_name`, `date`, `1A`, `2A`, `3A`, `Upper_seat`,`lowb`, `midb`, `uppb`, `sideb`, `type`,`quota`) VALUES ('','$train_name','$date','$s_1A','$s_2A','$s_3A','$s_uA','$s_1lA','$s_2lA','$s_3lA','$s_ulA','$type','$quota')");
	echo "<script language='javascript'>";
	echo 'window.location.href = "index1.php"';
	echo "alert('Add seat  details added succefully')";
	
	echo "</script>";
	
}

    
?>
<!-- <a href="index1.php">  
   <span class="glyphicon glyphicon-backward"></span> Back to Admin Home</a> -->
<!-- banner -->
<div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Add New Route  &#128649;
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">

                    <table class="table table-bordered">
                    <tr>
                            <th>Train Name</th>
                            <td><input type="text" class="form-control" name="t1" required minlength="3" id=""></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input type="date" class="form-control" name="date"  id=""></td>
                        </tr>
                        <h4>Adding Seatings</h4>
                        
                        <tr>
                            <th>Class</th>
                            <td><select id="type" class="form-control" name="type" >
  
  <option value="select one">-----------Class-----------</option>
<option value="ALL CLASS">ALL CLASS</option>
<option value="FIRST AC">FIRST AC</option>
<option value="SECOND AC">SECOND AC</option>
<option value="THIRD AC">THIRD AC</option>
<option value="3 AC Economy">3 AC Economy</option>
<option value="AC CHAIR CAR">AC CHAIR CAR</option>
<option value="FIRST CLASS">FIRST CLASS</option>
<option value="SECOND SEATING">SECOND SEATING</option>
<option value="SLEEPER CLASS">SLEEPER CLASS</option>
  
</select>
                            </td>
                        </tr>
                        <tr>
                            <th>lower breadth</th>
                            <td><input type="number" min='0'  class="form-control" name="1la"   id="">
                           
                        </tr>
                        <tr>
                            <th>middle breadth</th>
                            <td><input type="number" min='0'  class="form-control" name="2la"  id="">
                            </td>
                        </tr>
                        <tr>
                            <th>upper breadth</th>
                            <td><input type="number"    class="form-control" name="3la"  id="">
                            </td>
                        </tr>
                        <tr>
                            <th>side lower breadth</th></th>
                            <td><input type="number" min='0'   class="form-control" name="ula" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Quota</th>
                            <td><select id="quota" class="form-control" name="quota" >
  
                            <option value="select one">--------------------Quota--------------------</option>
<option value="GENERAL QUOTA">GENERAL QUOTA</option>
<option value="TATKAL QUOTA">TATKAL QUOTA</option>
<option value="LADIES QUOTA">LADIES QUOTA</option>
<option value="DEFENCE QUOTA">DEFENCE QUOTA</option>
<option value="YUVA QUOTA">YUVA QUOTA</option>
<option value="FOREIGN TOURIST QUOTA">FOREIGN TOURIST QUOTA</option>
<option value="DUTY PASS QUOTA">DUTY PASS QUOTA</option>
<option value="PARLIAMENT HOUSE QUOTA">PARLIAMENT HOUSE QUOTA</option>
<option value="HANDICAPED QUOTA">HANDICAPED QUOTA</option>
<option value="LOWER BERTH QUOTA">LOWER BERTH QUOTA</option>
  
</select>
                            </td>
                        </tr>
                        <tr>
                            <th>lower breadth</th>
                            <td><input type="number" min='0'  class="form-control" name="1a"   id="">
                           
                        </tr>
                        <tr>
                            <th>middle breadth</th>
                            <td><input type="number" min='0'  class="form-control" name="2a"  id="">
                            </td>
                        </tr>
                        <tr>
                            <th>upper breadth</th>
                            <td><input type="number"    class="form-control" name="3a"  id="">
                            </td>
                        </tr>
                        <tr>
                            <th>side lower breadth</th></th>
                            <td><input type="number" min='0'   class="form-control" name="ua" required id="">
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">

                                <input class="btn btn-info" type="submit" value="Add seat AVailability" name='submit'>
                            </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
<?php include('include/footer.php');?> 