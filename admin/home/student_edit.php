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
        <h4 class="mt-4">Students</h4>
        <ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item active">Students</li>
            <li class="breadcrumb-item">Edit Student Information</li>
            
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
                            $users = "SELECT * FROM student WHERE user_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">

                           
                            <div class="row">

                            <div class="col-md-12 mb-3">
                                    <label for=""><strong>School I.D</strong></label>
                                    <input required name="id" placeholder="Enter ID Number" value="<?= $user['id']; ?>" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3 ">
                                    <label for=""><strong>First Name</strong></label>
                                    <input required name="fname" placeholder="Enter First Name" value="<?= $user['fname']; ?>" class="form-control">
                                </div>



                                <div class="col-md-3 mb-3 ">
                                    <label for=""><strong>Middle Name</strong></label>
                                    <input name="mname" placeholder="Enter Middle Name" value="<?= $user['mname']; ?>" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3 ">
                                    <label for=""><strong>Last Name</strong></label>
                                    <input required name="lname" placeholder="Enter Last Name" value="<?= $user['lname']; ?>" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3 ">
                                    <label for=""><strong>Suffix</strong></label>
                                    <input name="suff" placeholder="Enter Last Name" value="<?= $user['suff']; ?>" class="form-control">
                                </div>
                                
                                <div class="col-md-8 mb-3 ">
                                    <label for=""><strong>Email Address</strong></label>
                                    <input required name="email" type="email" placeholder="Enter First Name" value="<?= $user['email']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3 ">
                                    <label for=""><strong>Mobile Number</strong></label>
                                    <input required name="mobilenumber" placeholder="Enter Mobile Number" value="<?= $user['mobilenumber']; ?>" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Year Level</label>
                                    <select name="level" required class="form-control">
                                        <option value="">--Select Year Level--</option>
                                        <option value="Grade 7" <?= $user['level'] == 'Grade 7' ? 'selected' :'' ?> >Grade 7</option>
                                        <option value="Grade 8" <?= $user['level'] == 'Grade 8' ? 'selected' :'' ?> >Grade 8</option>
                                        <option value="Grade 9" <?= $user['level'] == 'Grade 9' ? 'selected' :'' ?> >Grade 9</option>
                                        <option value="Grade 10" <?= $user['level'] == 'Grade 10' ? 'selected' :'' ?> >Grade 10</option>
                                        <option value="Grade 11" <?= $user['level'] == 'Grade 11' ? 'selected' :'' ?> >Grade 11</option>
                                        <option value="Grade 12" <?= $user['level'] == 'Grade 12' ? 'selected' :'' ?> >Grade 12</option>
                                    </select>
                    </div>
                               
                            </div>

                            <div class="col-md-12 text-right">
                                <a href="student_account.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="update_student" class="btn btn-primary">Update</button>
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