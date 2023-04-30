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
            <li class="breadcrumb-item">Activity</li>
            <li class="breadcrumb-item active">Add Activity</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Activity
                        </h4>
                    </div>
                    <div class="card-body">

                        

                <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">

                     <div class="row">

                     <div class="col-md-8 mb-3">
                                    <label for="" class="required">Title</label>
                                    <input required type="text" Placeholder="Enter Title" name="title" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                                    <label for="" class="required">Status</label>
                                    <select name="status" required class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                    </div>

                    <div class="text-right">
                                <a href="activity.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="add_act" class="btn btn-primary">Add</button>
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