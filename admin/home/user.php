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
                        <h1 class="mt-4">Student</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Students
                                <a class="btn btn-primary float-end btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa-sharp fa-solid fa-user-plus"></i>  Add Student</a>
                            </div>

                            <?php include('message.php'); ?>

                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Student I.D</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Student I.D</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            users.*, 
                            user_status.user_status, 
                            user_role.role_name
                          FROM
                            users
                            INNER JOIN
                            user_status
                            ON 
                              users.user_status_id = user_status.user_status_id
                            INNER JOIN
                            user_role
                            ON 
                              users.user_role_id = user_role.user_role_id
                          WHERE
                            users.user_role_id = 2";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['school-id']; ?></td>
                                        <td><?= $row['first_name']; ?></td>
                                        <td><?= $row['middle_name']; ?></td>
                                        <td><?= $row['last_name']; ?></td>
                                        <td><?= $row['user_status']; ?></td>
                                        <td> <a href="view_user.php?id=<?=$row['user_id'];?>" class="btn btn-info btn-sm"><i class="fa-sharp fa-solid fa-eye"></i></a></td>
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



  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4><strong>Personal Information</strong></h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         

        <form action="code.php" method="POST">
                            <div class="row">

                            <div class="col-md-12 mb-3">
                                    <label for=""><strong>School I.D</strong></label>
                                    <input required type="text" name="schoolid" class="form-control">
                                </div>
                            
                              <div class="col-md-12 mb-3">
                                    <label for=""><strong>Username</strong></label>
                                    <input required type="text" name="username" class="form-control">
                               </div>


                                <div class="col-md-12 mb-3">
                                    <label for=""><strong>First Name</strong></label>
                                    <input required type="text" name="fname" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for=""><strong>Middle Name</strong></label>
                                    <input required type="text" name="mname" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for=""><strong>Last Name</strong></label>
                                    <input required type="text" name="lname" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for=""><strong>Email</strong></label>
                                    <input required type="text" name="email" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for=""><strong>Mobile Number</strong></label>
                                    <input required type="text" name="mobilenumber" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for=""><strong>Fines</strong></label>
                                    <input required type="text" name="fines" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                <label for=""><strong>Role</strong></label>
                                <select name="role_as" required class="form-control">
                                        <option value="">--Select Role--</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Student</option>
                                        <option value="3">Secretary</option>
                                        <option value="4">Treasurer</option>
                                        <option value="5">Parent</option>
                                </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                <label for=""><strong>Status</strong></label>
                                <select name="status" required class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                </select>
                                </div>

                                  <br>
                                  <hr class="mt-2 mb-3"/>
                                  <div class="col-md-12 mb-3">
                                  <button type="button" class="btn btn-danger float-end" data-dismiss="modal">Close</button>
                                    <button type="submit" name="add_student" class="btn btn-primary float-end">Add User</button>
                                  </div>
                                </div>
                            </div>
                        </form>
        </div>
        
      </div>
    </div>


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>