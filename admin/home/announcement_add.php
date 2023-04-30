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
            <li class="breadcrumb-item">Announcement</li>
            <li class="breadcrumb-item active">Add Announcement</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Announcement
                        </h4>
                    </div>
                    <div class="card-body">

                        

                <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">

                     <div class="row">

                     <div class="col-md-12 mb-3">
                                    <label for="" class="required">Title</label>
                                    <input required type="text" Placeholder="Enter Title" name="title" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                                    <label for="" class="required">Description</label>
                                    <textarea required type="text" Placeholder="Enter Description" placeholder="Enter Description" name="body" class="form-control"> </textarea>       
                    </div>
                
                    <div class="col-md-6 mb-3">
                                <label for="" class="required">Date Started</label>
                                <input  required type="datetime-local" name="date_start" id="txtDate" class="form-control">
                                
                    </div>
                    
                    <div class="col-md-6 mb-3">
                                <label for="" class="required">Date Ended</label>
                                <input required type="datetime-local" name="date_end" id="txtDate" class="form-control">
                    </div>

                     <div class="text-right">
                                <a href="announcement.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="add_ann" class="btn btn-primary">Add</button>
                                </div>
                </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
    




<script>
var today = new Date().toISOString().slice(0, 16);

document.getElementsByName("date_start")[0].min = today;
document.getElementsByName("date_end")[0].min = today;
</script>

<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>