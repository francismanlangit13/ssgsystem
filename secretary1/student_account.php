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
                            <li class="breadcrumb-item ">Account</li>
                            <li class="breadcrumb-item active">Student Account</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               List of Students Account

                          
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Student I.D</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Year</th>
                                            <th>Section</th>
                                            <th>Status</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Student I.D</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Year</th>
                                        <th>Section</th>
                                        <th>Status</th>
                                        <th>ACTION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            student.user_id, 
                            student.fname, 
                            student.mname, 
                            student.lname, 
                            student.email, 
                            student.`password`, 
                            student.`year`, 
                            student.section, 
                            student.id, 
                            user_status.user_status, 
                            student.fines
                        FROM
                            student
                            INNER JOIN
                            user_status
                            ON 
                                student.user_status = user_status.user_status_id";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['year']; ?></td>
                                        <td><?= $row['section']; ?></td>
                                        <td><?= $row['user_status']; ?></td>
                                        <td> <a href="student_view.php?id=<?=$row['user_id'];?>" class="btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                    
                                        <a href="student_edit.php?id=<?=$row['user_id'];?>" class="btn btn-warning btn-sm"><i class="fa-sharp fa-solid fa-pen"></i></a>

                                        <a href="student_edit.php?id=<?=$row['user_id'];?>" class="btn btn-danger btn-sm"><i class="fa-sharp fa-solid fa-trash"></i></a>

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




<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>