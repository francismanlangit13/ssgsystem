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
            <li class="breadcrumb-item active">Add Student Account</li>
            
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
                                    <label for="" class="required">Mobile Number</label>
                                    <input required type="number" Placeholder="Enter Mobile Number" name="mobilenumber" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                                    <label for="" class="required">Student ID</label>
                                    <input required type="number" Placeholder="Enter Student ID" name="id" class="form-control">
                    </div>

                    

                    <div class="col-md-6 mb-3">
                                    <label for="" class="required">Year Level</label>
                                    <select name="level" required class="form-control">
                                        <option value="">--Select Year Level--</option>
                                        <option value="Grade 7">Grade 7</option>
                                        <option value="Grade 8">Grade 8</option>
                                        <option value="Grade 9">Grade 9</option>
                                        <option value="Grade 10">Grade 10</option>
                                        <option value="Grade 11">Grade 11</option>
                                        <option value="Grade 12">Grade 12</option>
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
                                <button type="submit" name="add_student" class="btn btn-primary">Add</button>
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