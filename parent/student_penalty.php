<?php 
include('authentication.php');
include('includes/header.php');
?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        </button>
      </div>
      <div class="modal-body"> Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                            <li class="breadcrumb-item active">Student Penalty</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               List of Students who has fines
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Penalties</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Penalties</th>
                                            <th>Balance</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php



                            $query = "SELECT
                            student.fname, 
                            student.mname, 
                            student.lname, 
                            student.fines, 
                            student.balance
                        FROM
                            student";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>

                                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                                        <td><?= $row['fines']; ?></td>
                                        <td><?= $row['balance']; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td>No Record Found</td>
                                    <td>No Record Found</td>
                                    <td>No Record Found</td>
                                    <td>No Record Found</td>
                                    <td>No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>