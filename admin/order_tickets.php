<?php
include '../connection.php';
include 'include/header.php';
$Sql = "SELECT 
          ticketbook_m.TicketCode,
          ticketbook_m.Class,
          ticketbook_m.NoofSeat,
          ticketbook_m.ID,
          ticketbook_m.PaymentStatus,
          tbl_login.log_emailid,
          schedule.date,
          schedule.time,
          route.from,
          route.to
          FROM 
          ticketbook_m 
          LEFT JOIN tbl_login ON tbl_login.log_id = ticketbook_m.UserID
          LEFT JOIN schedule ON schedule.id = ticketbook_m.SheduleID
          LEFT JOIN route ON route.id = ticketbook_m.RouteID where tbl_login.log_type='user'";
$result = $conn->query($Sql);
?>
<section class="content">
             <div class="container-fluid">
                <div class="row">
                   <div class="col-12">
                      <div class="callout callout-info">
                         <h5><i class="fas fa-info"></i> Info:</h5>
                         Order Ticket
                      </div>
                      <div class="card">
                         <div class="card-header alert-success" style="background-color:#007bff">
                            <h5 class="m-0">Users - Purchased Tickets</h5>
                         </div>
                         <div class="card-body">
                            <table class="table table-bordered" id='example1'>
                               <thead>
                                  <tr>
                                     <th>#</th>
                                     <th>Ticket Number</th>
                                     <th>Trip Date</th>
                                     <th>Class</th>
                                     <th>Seat</th>
                                     <th>User</th>
                                     <th>Route</th>
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
                                       <td><?php echo $row['log_emailid'];?></td>
                                       <td><?php echo $row['from']."-".$row['to'];?></td>
                                       <!-- <td><button type="button" class="btn btn-success paymentinfo" data-toggle="modal" data-target="#exampleModal" data-id="<?php //echo $row['ID'];?>"> <i class="fa fa-eye" aria-hidden="true"></i> </button></td> -->
                                    </tr>
                                  <?php
                                       $i++;
                                      }
                                    }
                                  ?>
                               </tbody>
                            </table>
                            <!-- Modal -->
                              <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Users - Purchased Tickets</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="form-group">
                                           <label for="exampleInputEmail1">Route</label>
                                           <?php  //echo $row['from']."-".$row['to']; ?>
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleInputEmail1">Route</label>
                                           <?php  //echo $row['from']."-".$row['to']; ?>
                                       </div>

                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div> -->
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

</script>