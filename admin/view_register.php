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
        <h4 class="mt-4">Users</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Dashboard</li>
            <li class="breadcrumb-item"> User</li>
        </ol>
    <div class="row">

        <div class="col-md-12">

z
            
            <div class="card">
                <div class="card-header">
                    <h4>Registered User
                        <a href="add_user.php" class="btn btn-primary float-end"> Add User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['fname']; ?></td>
                                        <td><?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td>
                                            <?php
                                            if($row['role_as'] == '1'){
                                                echo 'Admin';
                                            }elseif($row['role_as'] == '0'){
                                                echo 'Student';
                                            }
                                            ?>
                                        </td>
                                        <td> <a href="edit_register.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button type="submit" name="user_delete" value="<?=$row['id']; ?>" class="btn btn-danger">Delete</button>
                                            </form>
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
</div>





<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>