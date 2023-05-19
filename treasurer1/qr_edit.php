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
                            $users = "SELECT * FROM qrcode WHERE id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
                        <form action="code.php" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$user['id'];?>">

                     <div class="row">


                     <div class="col-md-8 mb-3">
                                    <label for="">Name</label>
                                    <input required type="text" Placeholder="Enter Name" name="name"  value="<?= $user['name']; ?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control" value="<?=$user['date'];?>">
                                </div>
                    
                                <div class="col-md-12 mb-3">
                                    <label for=""><strong>Position</strong></label>
                                    <select name="position" required class="form-control">
                                        <option value="">--Status--</option>
                                        <option value="1" <?= $user['status'] == 'Active' ? 'selected' :'' ?> >Active</option>
                                        <option value="3" <?= $user['status'] == 'Archived' ? 'selected' :'' ?> >Archived</option>
                                    </select>
                                </div>


                                
                    <div class="col-md-4 mb-3 text-center">
                    <h6>Current QR</h6>
                    <?php 
                    
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['fee_qr']).'" 
                                        alt="image" style="height: 250px; max-width: 310px; object-fit: cover;">';
                                        ?>
                    </div>

                    <div class="col-md-8 mb-3">
                                <label for="qr"> Update QR CODE: </label>
                                <input type="file" name="update_qr" id="qr" accept=".jpg, .jpeg, .png" value="">
                    </div>


                     </div>   

                     <div class="text-right">
                                <a href="QR.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="update_qr" class="btn btn-primary">Save</button>
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