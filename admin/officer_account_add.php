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
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item active">Add Officer Account</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Personal Information
                        </h4>
                    </div>
                    <div class="card-body">

                        

                <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">

                     <div class="row">

                     <div class="col-md-3 mb-3">
                                    <label for="" class="required">First Name</label>
                                    <input required type="text" Placeholder="Enter First Name" name="fname" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                                    <label for="">Middle Name</label>
                                    <input type="text" Placeholder="Enter Middle Name" name="mname" class="form-control">
                    </div>

                    
                    <div class="col-md-3 mb-3">
                                    <label for="" class="required">Last Name</label>
                                    <input required type="text" Placeholder="Enter Last Name" name="lname" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                                    <label for="">Suffix</label>
                                    <input type="text" Placeholder="Enter Suffix" name="suff" class="form-control">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                                    <label for="" class="required">Email</label>
                                    <input required type="email" Placeholder="Enter Active Email" name="email" class="form-control">
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
                                 
                    </div>

                 

                    <div class="col-md-12 mb-3">
                                <label for="front" class="required">Profile Picture: </label>
                                <input required type="file" name="front" id="front" accept=".jpg, .jpeg, .png" value="">
                    </div>

                  


                     </div>   

                     <div class="text-right">
                                <a href="officer_account.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="add_officer" class="btn btn-primary">Add</button>
                                </div>
                </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
    






<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>