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

                            <div class="container-fluid">
                            <div class="row">

                            <div class="col-md-12 mb-3 text-center">
                                    <label for=""><strong>School I.D</strong></label>
                                    <p class="form-control-plaintext"><?=$user['id'];?></p>
                                </div>

                                <div class="col-md-4 mb-3 text-center">
                                    <label for=""><strong>First Name</strong></label>
                                    <p class="form-control-plaintext"><?=$user['fname'];?></p>
                                </div>

                                <div class="col-md-4 mb-3 text-center">
                                <label for=""><strong>Middle Name</strong></label>
                                    <p class="form-control-plaintext"><?=$user['mname'];?></p>
                                </div>

                                <div class="col-md-4 mb-3 text-center">
                                <label for=""><strong>Last Name</strong></label>
                                    <p class="form-control-plaintext"><?=$user['lname'];?></p>
                                </div>
                                
                                <div class="col-md-8 mb-3 text-center">
                                <label for=""><strong>Email</strong></label>
                                    <p class="form-control-plaintext"><?=$user['email'];?></p>
                                </div>

                                <div class="col-md-4 mb-3 text-center ">
                                <label for=""><strong>Mobile Number</strong></label>
                                    <p class="form-control-plaintext"><?=$user['mobilenumber'];?></p>
                                </div>

                                <hr class="mt-2 mb-3"/>

                                <h2 class="text-center mb-4">Payment History</h2>
                                <div class="container">       
                                <table class="table table-bordered">
                                <thead>
                                <tr>
                                <th>Date</th>
                                <th>Payment</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                            $query = "SELECT `fines_fee`, `fines_date` FROM `fines_transaction` WHERE fines_id = '$id'";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['fines_date']; ?></td>
                                        <td><?= $row['fines_fee']; ?></td>

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

                                <hr class="mt-2 mb-3"/>
                                <h2></h2>
                                <h4 class="text-center mb-4">Fines & Balance</h4>
                                <div class="col-md-3 mb-3">
                                <label for=""><strong>Fines:</strong></label>
                                <i class="fa-sharp fa-solid fa-peso-sign"></i> <?=$user['fines'];?>
                                </div>
                              
                                <div class="col-md-3 mb-3">
                                <label for=""><strong>Balance:</strong></label>
                               <i class="fa-sharp fa-solid fa-peso-sign"></i> <?=$user['balance'];?>
                                </div>
                            
                                <hr class="mt-2 mb-3"/>
                                <h4 class="text-center mb-4">School Id Picture</h4>
                                <div class="col-md-6 mb-3 text-center">
                                <label for=""><strong>ID (Front): <br></strong></label> <br>
                                <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['front']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
                                        ?>
                                </div>

                                <div class="col-md-6 mb-3 text-center">
                                <label for=""><strong>ID (Back): <br></strong></label> <br>
                                <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['back']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
                                        ?>
                                </div>
                            </div>

                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
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