<?php
    include '../connection.php';
    @session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Seat list added</title>

    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/trains_css.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>

    <a href="index1.php">  
    <span class="glyphicon glyphicon-backward"></span> Back to Admin Home</a>
    
    <div class="content">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">All seats</h3>
                                
                             
                            </div>

                            <div class="card-body">
                                <form action="#" method="POST">
                                    <table id="example1" style="align-items: stretch;" class="table table-hover w-100 table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                
                                                <th>Train Name</th>
                                                <th>date </th>
                                                <th>1A </th>
                                                <th>2A</th>
                                                <th>3A </th>
                                            <th>upper seat</th>
                                                <th>type</th>
                                                <th style="width: 30%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $row =mysqli_query($conn,"SELECT * FROM seat");
                                                if ($row->num_rows < 1) echo "No Records Yet";
                                                $sn = 0;
                                                while ($fetch = $row->fetch_assoc()) {
                                                    $id = $fetch['id'];
                                                ?>

                                                <tr>
                                                    <td>
                                                        <input class="trains_input" type="text" value="<?php echo ++$sn; ?>">
                                                        <input class="trains_input" type="text" readonly name="s_id" value="<?php echo $fetch['id'] ?>">
                                                    </td>
                                                    
                                                    <td><input class="trains_input" type="text" name="t1" value="<?php echo $fetch['train_name']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="date" value="<?php echo $fetch['date']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="1a" value="<?php echo $fetch['1A']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="2a" value="<?php echo $fetch['2A']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="3a" value="<?php echo $fetch['3A']; ?>"></td>
                                                    <td><input class="trains_input" type="text" name="ua" value="<?php echo $fetch['Upper_seat']; ?>"></td>
                                                    <td><select id="type" class="trains_input" name="type"  value="<?php echo $fetch['type']; ?>"></td>
                                                    <td>
                                                        <input type="submit" name="edit" class="bt btn-primary" value="Edit">
                                                        <input type="submit" name="del_seat" class="bt btn-danger" value="Delete">
                                                    </td>
                                                </tr>
                                            

                                            <div class="modal fade" id="edit<?php echo $id ?>">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>" required id="">
                                                                  
                                                                    <p>Train Name : <input type="text" class="form-control" name="t1" value="<?php echo $fetch['train_name'] ?>" required minlength="3" id=""></p>
                                                                    <p>Date : <input type="date"  class="form-control" value="<?php echo $fetch['date'] ?>" name="date" required id=""></p>
                                                                    <p> lower breadth: <input type="number" min='0' class="form-control" value="<?php echo $fetch['1A'] ?>" name="1a" required id=""></p>
                                                                    <p> middle breadth : <input type="number" min='0' class="form-control" value="<?php echo $fetch['2a'] ?>" name="2a" required id=""></p>
                                                                <p>upper breadth: <input type="number" min='0' class="form-control" value="<?php echo $fetch['3a'] ?>" name="3a" required id=""></p>
                                                                <p> side lower breadth: <input type="number" min='0' class="form-control" value="<?php echo $fetch['Upper_seat'] ?>" name="ua" required id=""></p>
                                                                <p> type : <select id="type" class="form-control" name="type"  value="<?php echo $fetch['type'] ?>" name="type" required id=""></p>
                                                                <option value="first class">first class</option>
                                                                    <option value="second class">second class</option>
                                                                    <option value="general class">general class</option>
                                                                    <option value="ac">ac</option>
                                                                    <option value="sleeper class">sleeper class</option>
                                                                    <option value="ladies">ladies quota</option>
                                                                    
                                                                    </select>
                                                                <p><input class="btn btn-info" type="submit" value="Edit seat" name='edit'></p>
                                                            </form>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </div>
                                                <!-- /.modal -->
                                            <?php } ?>

                                        </tbody>
                                    
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" align="center">
                <div class="modal-header">
                    <h4 class="modal-title">Add seats 
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
            


                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>

    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>

    <script>
    $(function() {
        /* jQueryKnob */

        $('.knob').knob({
            draw: function() {}
        })

    })
    </script>

</body>
</html>

<?php

    

if (isset($_POST['edit'])) {
    $s_id= $_POST['s_id'];
    $train_name=$_POST["t1"];
    $date=$_POST["date"];
    $s_1A=$_POST["1a"];
    $s_2A=$_POST["2a"];
    $s_3A=$_POST["3a"];
    $s_uA=$_POST["ua"];
    $type=$_POST["type"];
    if (!isset($s_id,$train, $date, $s_1A,$s_2A ,$s_3A ,$s_uA,$type)) {
        echo "<script>alert('Seat list added properly!')</script>";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM seat WHERE train_name = '$train_name' ")->num_rows;
        $modify_seat_sql= " UPDATE `seat` SET `train_name`='$train_name',`date`='$date',`1A`='$s_1A',`2A`='$s_2A',`3A`='$s_3A',`Upper_seat`='$s_uA',`type`='$type' WHERE id=$s_id";
        $edit_res= mysqli_query($conn, $modify_seat_sql);
        if ($edit_res) {
            echo "<script>alert('seat Modified!')</script>";
        } else {
            echo "<script>alert('seat not Modified!')</script>";
        }
        echo "<script>window.location.href = 'seat.php';</script>";
    }
}
    

    if (isset($_POST['del_seat'])) {
        $sid= $_POST['s_id'];
        $del_res= mysqli_query($conn, "DELETE FROM seat WHERE id = '$sid'");
        if(mysqli_affected_rows($conn) >= 1){
            echo "<script>alert('seat Deleted !!');</script>";
        }
        else{
            echo "<script>alert('seat Could Not Be Deleted.');</script>";
        }
        echo "<script>window.location.href = 'seat.php';</script>";
    }
?>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal"
    data-target="#edit<?php echo $id ?>">
    Edit
</button> -

<input type="hidden" class="form-control" name="del_train"
    value="<?php echo $id ?>" required id="">
<button type="submit"
    onclick="return confirm('Are you sure about this?')"
    class="btn btn-danger">
    Delete
</button> -->