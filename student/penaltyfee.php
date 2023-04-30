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
            <li class="breadcrumb-item">Penalty System</li>
            <li class="breadcrumb-item active">Pay Penalty Via Gcash</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>PAYMENT
                        </h4>
                    </div>
                    <div class="card-body">

                        

                <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">

                <?php if(isset($_SESSION['auth_user']))  ?>

<label for="" hidden="true">user_id</label>
    <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">
    
                     <div class="row">

                     <div class="col-md-6 mb-3">
                                    <label for="">Reference Number</label>
                                    <input required type="text" Placeholder="Enter Reference Number" name="rn" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control">
                    </div>

                    <div class="col-md-6">
                                <label for="receipt">Gcash Receipt: </label>
                                <input type="file" name="receipt" id="receipt" accept=".jpg, .jpeg, .png" value="">
                    </div>

                     </div>   

                     <div class="text-right">
                                <a href="index.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="penalty" class="btn btn-primary">Submit</button>
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