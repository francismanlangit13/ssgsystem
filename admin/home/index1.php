<?php 
    include('../includes/header.php');
?>

<!-- MODAL -->
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
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Student Account

                                    <?php
                                            $total_student = "SELECT * FROM `student`";
                                            $total_student_query_run = mysqli_query($con, $total_student);

                                            if($student_count = mysqli_num_rows($total_student_query_run))
                                            {
                                                echo '<h4>'.$student_count.'</h4>';
                                            }
                                            else{
                                                echo '<h4>0</h4>';
                                            }

                                            ?>

                                    
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="student_account.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Officer Account <br> 


                                    <?php
                                            $staff = "SELECT
                                            `user`.*
                                        FROM
                                            `user`
                                        WHERE
                                            `user`.pos_name != 4";
                                            $staff_query_run = mysqli_query($con, $staff);

                                            if($staff_count = mysqli_num_rows($staff_query_run))
                                            {
                                                echo '<h4>'.$staff_count.'</h4>';
                                            }
                                            else{
                                                echo '<h4>0</h4>';
                                            }

                                            ?>



                                  </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="officer_account.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Fines Transaction

                                    
                                    <?php
                                            $total_fines = "SELECT * FROM `fines_transaction`";
                                            $total_fines_query_run = mysqli_query($con, $total_fines);

                                            if($fines_count = mysqli_num_rows($total_fines_query_run))
                                            {
                                                echo '<h4>'.$fines_count.'</h4>';
                                            }
                                            else{
                                                echo '<h4>0</h4>';
                                            }

                                            ?>



                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="transaction_view.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total Archived Account


                                    <?php
                                            $arch_student = "SELECT
                                            *, 
                                            student.*
                                        FROM
                                            student
                                        WHERE
                                            student.user_status = 2";
                                            $arch_student_query_run = mysqli_query($con, $arch_student);

                                            if($arch_cont = mysqli_num_rows($arch_student_query_run))
                                            {
                                                echo '<h4>'.$arch_cont.'</h4>';
                                            }
                                            else{
                                                echo '<h4>0</h4>';
                                            }

                                            ?>




                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>


                    <div class="container-fluid px-4">

                    <h2 class="mb-3"><center>List of Pending and Archived Students Account</center></h2>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Students Account

                          
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Student I.D</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Student I.D</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                            student.id, 
                            user_status.user_status
                          FROM
                            student
                            INNER JOIN
                            user_status
                            ON 
                              student.user_status = user_status.user_status_id
                          WHERE
                            student.user_status != 1";
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
                                        <td><?= $row['user_status']; ?></td>
                                        <td> 
                                        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    ACTION
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
  <a class="dropdown-item" type="button" href="indexstudentview.php?id=<?=$row['user_id'];?>">VIEW</a>
    <form action="code.php" method="post">
    <button class="dropdown-item" type="submit" name="student_active"  value="<?=$row['user_id'];?>" >Active</button>
    </form>
  </div>
</div>                                 

                                        </td>
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



                    <div class="container-fluid px-4">


                    <h2 class="mb-3"><center>List of Pending and Archived Officer Account</center></h2>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
Officer Account

  
    </div>
    <div class="card-body">
        <table id="datatablesSimple1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
            <?php
    $query = "SELECT
    `user`.user_id,
    `user`.fname,
    `user`.mname,
    `user`.lname,
    `user`.email,
    user_status.user_status,
    position.pos_name
    FROM
    user_status
    INNER JOIN `user` ON `user`.user_status = user_status.user_status_id
    INNER JOIN position ON `user`.pos_name = position.pos_id
    WHERE
    `user`.user_type = 1 AND
    `user`.user_status != 1
    ";
    $query_run = mysqli_query($con, $query);
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            ?>
            <tr>
                <td><?= $row['user_id']; ?></td>
                <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['pos_name']; ?></td>
                <td><?= $row['user_status']; ?></td>

                <td> 
                <div class="dropdown">
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
ACTION
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
<form action="code.php" method="post">
<a class="dropdown-item" type="button" href="indexofficerview.php?id=<?=$row['user_id'];?>">VIEW</a>
<button class="dropdown-item" type="submit" name="officer_active"  value="<?=$row['user_id'];?>" >Active</button>
</form>
</div>
</div>                                 

                </td>
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




<div class="container-fluid px-4">

<h2 class="mb-3"><center>List of Pending and Archived Parent Account</center></h2>

<div class="card mb-4">
<div class="card-header">
<i class="fas fa-table me-1"></i>
Parent Account


</div>
<div class="card-body">
<table id="datatablesSimple2">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Position</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Position</th>
<th>Status</th>
<th>Action</th>
</tr>
</tfoot>
<tbody>
<?php
$query = "SELECT
`user`.user_id,
`user`.fname,
`user`.mname,
`user`.lname,
`user`.email,
user_status.user_status,
position.pos_name
FROM
user_status
INNER JOIN `user` ON `user`.user_status = user_status.user_status_id
INNER JOIN position ON `user`.pos_name = position.pos_id
WHERE
`user`.user_type = 5 AND
`user`.user_status != 1
";
$query_run = mysqli_query($con, $query);
if(mysqli_num_rows($query_run) > 0)
{
foreach($query_run as $row)
{
?>
<tr>
<td><?= $row['user_id']; ?></td>
<td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
<td><?= $row['email']; ?></td>
<td><?= $row['pos_name']; ?></td>
<td><?= $row['user_status']; ?></td>

<td> 
<div class="dropdown">
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
ACTION
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
<a class="dropdown-item" type="button" href="indexparentview.php?id=<?=$row['user_id'];?>">VIEW</a>
<form action="code.php" method="post">
<button class="dropdown-item" type="submit" name="parent_active"  value="<?=$row['user_id'];?>" >Active</button>
</form>
</div>
</div>                                 

</td>
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
include('../includes/footer.php');
include('includes/bottom.php');
?>