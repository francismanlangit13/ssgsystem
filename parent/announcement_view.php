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
            <li class="breadcrumb-item">Announcement</li>
            <li class="breadcrumb-item active">View Announcement</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Announcement Information
                        </h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM announcement WHERE announcement_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
                        <form action="code.php" method="POST" >
                            <input type="hidden" name="announcement_id" value="<?=$user['announcement_id'];?>">

                     <div class="row">


                     <div class="col-md-12 mb-3">
                                    <label for="">Title</label>
                                    <input disabled type="text" Placeholder="Enter Title" name="title"  value="<?= $user['announcement_title']; ?>"class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea disabled type="text" Placeholder="Enter Message" name="body" class="form-control"> <?= $user['announcement_body']; ?></textarea>       
                    </div>

                    <div class="col-md-6 mb-3">
                                <label for="">Date Started</label>
                                <input disabled type="datetime-local" name="date_start" id="txtDate" value="<?= $user['date_start']; ?>" class="form-control">
                                
                    </div>
                    
                    <div class="col-md-6 mb-3">
                                <label for="">Date Ended</label>
                                <input disabled type="datetime-local" name="date_end" id="txtDate" value="<?= $user['date_end']; ?>" class="form-control">
                    </div>
                    

                     </div>   

                     <div class="text-right">
                                <a href="index.php" class="btn btn-danger">Back</a>
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