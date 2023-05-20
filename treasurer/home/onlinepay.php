<!DOCTYPE html>
<html lang="en">
    <?php include('../includes/header.php'); ?>
    <body class="sb-nav-fixed">
        <?php include ('../includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include ('../includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Online Payment</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Online Payment
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Year Level</th>
                                            <th>Platform</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Year Level</th>
                                            <th>Platform</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT
                                            *
                                            FROM
                                            `payment`
                                            INNER JOIN
                                            `user`
                                            ON
                                            payment.user_id = user.user_id
                                            WHERE
                                            user_status_id IN (1, 2) AND user_type_id = 6 AND payment.platform != 'Cash' AND payment.status = 'Pending'";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['user_id']; ?></td>
                                            <td><?= $row['student_id']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                                            <td><?= $row['level']; ?></td>
                                            <td><?= $row['platform']; ?></td>
                                            <td><?= $row['status']; ?></td>
                                            <td> 
                                                <div class="col-md-3 text-center">
                                                    <a href="onlinepay_view?id=<?=$row['payment_id'];?>" class="btn btn-info btn-icon-split"> 
                                                        <span class="icon text-white-50"></span>
                                                        <span class="text ml-2 mr-2">View</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } }
                                            else{
                                        ?>
                                            <tr>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>
<!-- Modal -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add Pay Student (<label id="label"></label>)</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="col-md-12 mb-3">
                        <label for="" class="required">Payment amount</label>
                        <input required type="number" Placeholder="Enter Amount" name="amount" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" id="delete_id" name="payment_add_cash" value="">
                    <button type="submit" class="btn btn-success">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    function deleteModal(button) {
        var id = button.value;
        var firstname = button.getAttribute("data-firstname");
        document.getElementById("delete_id").value = id;
        document.getElementById("label").innerHTML = firstname;
    }
</script>