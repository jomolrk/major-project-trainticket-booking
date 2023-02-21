<?php
include '../connection.php';
include 'include/header.php';
if (isset($_POST['submit'])) {
 $from = $_POST['from'];
 $station1 = $_POST['station1'];
 $stn1arr= $_POST['stnarr'];
 $station2 = $_POST['station2'];
 $stn2arr = $_POST['stn2arr'];
 $station3= $_POST['station3'];
 $stn3arr= $_POST['stn3arr'];
 $to = $_POST['to'];
    
  mysqli_query($conn,"INSERT INTO `route`( `from`, `station1`, `stn1arr`, `station2`, `stn2arr`, `station3`, `stn3arr`, `to`) VALUES (' $from','$station1','$stn1arr','$station2','$stn2arr','$station3','$stn3arr','$to')");
  echo "<script>alert('Route added successfully!')</script>";
  echo "<script>window.location.href = 'Routes.php';</script>";
} ?>

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
               <th>From</th>
               <td><input type="text" class="form-control" name="from" required minlength="3" id=""></td>
            </tr>
            <tr>
                            <th>Station1</th>
                            <td><input type="text" class="form-control" name="station1" required minlength="3" id=""></td>
                        </tr>
                        <tr>
                            <th>Station1 Arrival</th>
                            <td><input type="time" min='0'  class="form-control" name="stnarr"   id="">
                           
                        </tr>
                        <tr>
                            <th>Station2</th>
                            <td><input type="text" min='0'  class="form-control" name="station2"  id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station2 Arrival</th>
                            <td><input type="time"    class="form-control" name="stn2arr" runat="server" id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station3</th></th>
                            <td><input type="text" min='0'   class="form-control" name="station3" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Station3 Arrival</th>
                            <td><input type="time"     class="form-control" name="stn3arr" runat="server" id="">
                            </td>
                        </tr>
            <tr>
               <th>To</th>
               </th>
               <td><input type="text"    class="form-control" name="to" required id="">
               </td>
            </tr>
            <tr>
               <td colspan="2">
                  <input class="btn btn-info" type="submit" value="Add Route" name='submit'>
               </td>
            </tr>
         </table>
      </form>
   </div>
</div>
<?php include('include/footer.php');?>  