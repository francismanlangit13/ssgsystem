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
            <li class="breadcrumb-item">Parent Account</li>
            <li class="breadcrumb-item active">Edit Parent Account</li>
            
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

                     <div class="col-md-4 mb-3">
                                    <label for="">First Name</label>
                                    <input required type="text" Placeholder="Enter First Name" name="fname" value="<?= $user['fname']; ?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                                    <label for="">Middle Name</label>
                                    <input required type="text" Placeholder="Enter Middle Name" name="mname" value="<?= $user['mname']; ?>"  class="form-control">
                    </div>

                    
                    <div class="col-md-4 mb-3">
                                    <label for="">Last Name</label>
                                    <input required type="text" Placeholder="Enter Last Name" name="lname" value="<?= $user['lname']; ?>"  class="form-control">
                    </div>

                    
                    <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input required type="email" Placeholder="Enter User Name" name="email" value="<?= $user['email']; ?>"  class="form-control">
                    </div>

                    
                    <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input required type="password" Placeholder="Enter Password" name="password" value="<?= $user['password']; ?>"  class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                                    <label for=""><strong>Position</strong></label>
                                    <select name="position" required class="form-control">
                                        <option value="" selected disabled>--Status--</option>
                                        <option value="1" <?= $user['pos_name'] == '2' ? 'selected' :'' ?> >Secretary</option>
                                        <option value="3" <?= $user['pos_name'] == '3' ? 'selected' :'' ?> >Treasurer</option>
                                        <option value="3" <?= $user['pos_name'] == '4' ? 'selected' :'' ?> >Parent</option>
                                    </select>
                                </div>

                                <div class="col-md-6 ">
                                    <label for=""><strong>Status</strong></label>
                                    <select name="status" required class="form-control">
                                        <option value="" selected disabled>--Status--</option>
                                        <option value="1" <?= $user['user_status'] == '1' ? 'selected' :'' ?> >Active</option>
                                        <option value="2" <?= $user['user_status'] == '2' ? 'selected' :'' ?> >Archived</option>
                                        <option value="3" <?= $user['user_status'] == '3' ? 'selected' :'' ?> >Pending</option>
                                    </select>
                                </div>


                    <div class="col-md-6">
                                <label for="front">ID Picture of Student(Front): </label>
                                <input type="file" name="front" id="front" accept=".jpg, .jpeg, .png" value="">
                    </div>                 

                    <div class="col-md-6">
                                <label for="back">ID Picture of Student(Back): </label>
                                <input type="file" name="back" id="back" accept=".jpg, .jpeg, .png" value="">
                    </div>

                    <div class="col-md-6 mb-3 mt-4 text-center">
                    <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['front']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
                                        ?>
                    </div>

                    <div class="col-md-6 mb-3 mt-4 text-center">
                    <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['back']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
                                        ?>
                    </div>


                     </div>   

                     <div class="text-right">
                                <a href="officer_account.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="update_parent" class="btn btn-primary">Save</button>
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