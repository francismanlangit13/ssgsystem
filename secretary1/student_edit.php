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
            <li class="breadcrumb-item">View Student</li>
            
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
                                    <input required name="quantity" placeholder="Enter ID Number" value="<?= $user['id']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3 ">
                                    <label for=""><strong>First Name</strong></label>
                                    <input required name="quantity" placeholder="Enter First Name" value="<?= $user['fname']; ?>" class="form-control">
                                </div>



                                <div class="col-md-4 mb-3 ">
                                    <label for=""><strong>Middle Name</strong></label>
                                    <input required name="quantity" placeholder="Enter Middle Name" value="<?= $user['mname']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3 ">
                                    <label for=""><strong>Last Name</strong></label>
                                    <input required name="quantity" placeholder="Enter Last Name" value="<?= $user['lname']; ?>" class="form-control">
                                </div>
                                
                                <div class="col-md-8 mb-3 ">
                                    <label for=""><strong>Email Address</strong></label>
                                    <input required name="quantity" type="email" placeholder="Enter First Name" value="<?= $user['fname']; ?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3 ">
                                    <label for=""><strong>Mobile Number</strong></label>
                                    <input required name="quantity" placeholder="Enter Mobile Number" value="<?= $user['mobilenumber']; ?>" class="form-control">
                                </div>
                               
                            </div>

                            <div class="col-md-12 text-right">
                                <a href="student_account.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="update_student" class="btn btn-primary">Save</button>
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