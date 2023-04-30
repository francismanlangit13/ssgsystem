<?php 
include('authentication.php');
include('includes/header.php');
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
        <ol class="breadcrumb mb-4 mt-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item">Officer Account</li>
            <li class="breadcrumb-item active">Edit Officer Account</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Personal Information
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM user WHERE user_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">

                     <div class="row">

                     <div class="col-md-3 mb-3">
                                    <label for="" class="required">First Name</label>
                                    <input required type="text" Placeholder="Enter First Name" name="fname" value="<?= $user['fname']; ?>" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                                    <label for="">Middle Name</label>
                                    <input type="text" Placeholder="Enter Middle Name" name="mname" value="<?= $user['mname']; ?>"  class="form-control">
                    </div>

                    
                    <div class="col-md-3 mb-3">
                                    <label for="" class="required">Last Name</label>
                                    <input required type="text" Placeholder="Enter Last Name" name="lname" value="<?= $user['lname']; ?>"  class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                                    <label for="">Suffix</label>
                                    <input type="text" Placeholder="Enter Suffix" name="suff" value="<?= $user['suff']; ?>"  class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                                    <label for="" class="required">Email</label>
                                    <input required type="email" Placeholder="Enter User Name" name="email" value="<?= $user['email']; ?>"  class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                                    <label for="" class="required">Role</label>
                                    <select name="role_as" required class="form-control">
                                        <option value="">--Select Role--</option>
                                        <option value="6">President</option>
                                        <option value="7">Vice President</option>
                                        <option value="2">Secretary</option>
                                        <option value="3">Treasurer</option>
                                    </select>
                    </div>

                    <div class="col-md-6 mb-3">
                                    <label for="" class="required"><strong>Position</strong></label>
                                    <select name="position" required class="form-control">
                                        <option value="">--Status--</option>
                                        <option value="1" <?= $user['pos_name'] == '2' ? 'selected' :'' ?> >Secretary</option>
                                        <option value="3" <?= $user['pos_name'] == '3' ? 'selected' :'' ?> >Treasurer</option>
                                    </select>
                                </div>

                                <div class="col-md-6 ">
                                    <label for="" class="required"><strong>Status</strong></label>
                                    <select name="status" required class="form-control">
                                        <option value="">--Status--</option>
                                        <option value="1" <?= $user['user_status'] == '1' ? 'selected' :'' ?> >Active</option>
                                        <option value="2" <?= $user['user_status'] == '2' ? 'selected' :'' ?> >Archived</option>
                                        <option value="3" <?= $user['user_status'] == '3' ? 'selected' :'' ?> >Pending</option>
                                    </select>
                                </div>


                     </div>   

                     <div class="text-right">
                                <a href="officer_account.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="update_officer" class="btn btn-primary">Update</button>
                                </div>
                </form>
                <?php
                                }
                            }
                            else
                            {
                                ?>
                                <h4>No Record Found!</h4>
                                <?php
                            }
                        }
?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    






<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>