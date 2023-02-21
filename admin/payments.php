<?php
include '../connection.php';
include 'include/header.php';
$Sql = "SELECT 
                  ticketbook_m.TicketCode,
                  ticketbook_m.Class,
                  ticketbook_m.NoofSeat,
                  schedule.date,
                  schedule.time,
                  route.from,
                  route.to,
                  ticketbook_m.ID,
                  ticketbook_m.PaymentStatus,
                  tbl_login.log_emailid
                FROM 
                  ticketbook_m 
                  LEFT JOIN schedule ON schedule.id = ticketbook_m.SheduleID
                  LEFT JOIN route ON route.id = ticketbook_m.RouteID
                  LEFT JOIN tbl_login ON tbl_login.log_id = ticketbook_m.UserID";
$result = $conn->query($Sql);
?>
<section class="content">
             <div class="container-fluid">
                <div class="row">
                   <div class="col-12">
                      <div class="callout callout-info">
                         <h5><i class="fas fa-info"></i> Info:</h5>
                         Booking History and Print Tickets
                      </div>
                      <div class="card">
                         <div class="card-header alert-success" style="background-color:#007bff">
                            <h5 class="m-0">Bookings - Purchased Tickets</h5>
                         </div>
                         <div class="card-body">
                            <table class="table table-bordered" id='example1'>
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Ticket Number</th>
                                     <th>Trip Date</th>
                                     <!-- <th>Route</th> -->
                                     <th>Class</th>
                                     <th>Seat</th>
                                     <th>Booking Status</th>
                                     <th>User</th>
                                     <th>Action</th>
                                  </tr>
                               </thead>
                               <tbody>
                                <?php
                                if($result->num_rows > 0) {
                                  $i=1;
                                  while($row = $result->fetch_assoc()) {
                                ?>
                                  <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['TicketCode'];?></td>
                                    <td><?php echo $row['date']." ".$row['time'];?></td>
                                    <!-- <td><?php //echo $row['from']."-".$row['to']?></td> -->
                                    <td><?php echo $row['Class']?></td>
                                    <td><?php echo $row['NoofSeat'];?></td>
                                    <td><?php echo $row['PaymentStatus'];?></td>
                                    <td><?php echo $row['log_emailid'];?></td>
                                    <td><button type="button" class="btn btn-primary paymentinfo" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $row['ID'];?>">Booking </button></td>
                                  </tr>
                                  <?php
                                        $i++;
                                      }
                                    }
                                  ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Do you want to approve the Booking?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <!-- <div class="modal-body">
                                           
                                          </div> -->
                                          <div class="modal-footer">
                                             <input type="hidden" id="BookingID" name="BookingID">
                                             <button type="button" class="btn btn-success" data-dismiss="modal" id="approve">Approve</button>
                                             <button type="button" class="btn btn-danger" data-dismiss="modal" id="reject">Reject</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                               </tbody>
                            </table>
                         </div>
                         <br />
                      </div>
                      <!-- /.invoice -->
                   </div>
                   <!-- /.col -->
                </div>
                <!-- /.row -->
             </div>
             <!-- /.container-fluid -->
          </section>  
<?php include('include/footer.php');?>
<script>
$(document).ready(function() {
   $("#approve").click(function(){
      var BookingID = $("#BookingID").val();
      let dataArray = {
               method:"StatusUpdate",
               BookingID:BookingID,
               Status:"Confirmed"
       }
      $.ajax({
         url: "../AjaxFunctions.php",
         type: "POST",
         data: dataArray,
         success: function(res){
           var resultArray = JSON.parse(res);
           alert(resultArray.Message);
           window.location.reload(true);
         }
       });
   });

   $(".paymentinfo").click(function(){
      $("#BookingID").val($(this).attr("data-id"));
   });

   $("#reject").click(function(){
      var BookingID = $("#BookingID").val();
      let dataArray = {
         method:"StatusUpdate",
         BookingID:BookingID,
         Status:"NotConfirmed"
      }
      $.ajax({
         url: "../AjaxFunctions.php",
         type: "POST",
         data: dataArray,
         success: function(res){
           var resultArray = JSON.parse(res);
           //console.log(resultArray);
           alert(resultArray.Message);
           window.location.reload(true);
         }
       });
   });

   $('#myModal').on('hidden.bs.modal', function () {
      $("#BookingID").val(""); 
   })
});
</script>