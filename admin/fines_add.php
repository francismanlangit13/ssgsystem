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
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Fines</li>
            <li class="breadcrumb-item">Add Fines</li>
            
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
                            
                            <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <label for=""><strong>First Name</strong></label>
                                    <p class="form-control-plaintext"><?=$user['fname'];?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Middle Name</strong></label>
                                    <p class="form-control-plaintext"><?=$user['mname'];?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for=""><strong>Last Name</strong></label>
                                    <p class="form-control-plaintext"><?=$user['lname'];?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                <label for=""><strong>Fines</strong></label>
                                    <p class="form-control-plaintext"><i class="fa-sharp fa-solid fa-peso-sign"></i><?=$user['fines'];?></p>
                                </div>
                
                                <div class="col-md-6 mb-3">
                                <label for=""><strong>Balance</strong></label>
                                    <p class="form-control-plaintext"><i class="fa-sharp fa-solid fa-peso-sign"></i><?=$user['balance'];?></p>
                                </div>

                                <hr class="mt-2 mb-3"/>

                                <div class="col-md-4 mb-3">
                                    <label for=""><strong>Add Fines: </strong></label>
                                    <input required type="text" placeholder="Enter Amount" name="addfines" class="form-control">
                                </div>

                            


                                <div class="col-md-12 mb-3">
                                <button type="submit" name="addfinesbtn" class="btn btn-primary float-end">Submit</button>
                                <a href="penaltyfee_view.php" class="btn btn-danger float-end mr-1">Back</a>
                                </div>
                                

                            </div>
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