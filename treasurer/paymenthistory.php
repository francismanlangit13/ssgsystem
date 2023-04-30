<?php 
include('authentication.php');
include('includes/header.php');
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        </button>
      </div>
      <div class="modal-body"> Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <form action="code.php" method="POST">
          <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid px-4">

<ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Payment History</li>
                            <li class="breadcrumb-item active">Via Cash</li>
                        </ol>


                        <h1 class="mt-2"><center>STUDENTS PAID BY CASH</center></h1>
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                          <h4>Payment History of Students </h4>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Paid</th>
                                            <th>Date Paid</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Paid</th>
                                            <th>Date Paid</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            fines_transaction.fines_id,
                            student.fname,
                            student.mname,
                            student.lname,
                            fines_transaction.fines_fee,
                            fines_transaction.fines_date
                            FROM
                            fines_transaction
                            INNER JOIN student ON fines_transaction.fines_id = student.user_id
                            ORDER BY
                            fines_transaction.fines_date DESC
                            ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['fines_id']; ?></td>
                                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                                        <td><?= $row['fines_fee']; ?></td>
                                        <td><?= $row['fines_date']; ?></td>
                                        
                                    
                                    </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

</div>


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>