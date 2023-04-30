<?php 
include('authentication.php');
include('includes/header.php');
?>
<!-- Modal -->
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
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Generate Report</li>
                        </ol>

            <div class="container">
                
                <center><h2>Generate Report List</h2></center>
                <br>
            
                <div class="row justify-content-center">

                <div class="col-md-3 mb-3">
                <a href="report.php" class="btn btn-primary" role="button">Generate Student Details</a>
                </div>

                <div class="col-md-3 mb-3 mr-3">
                <a href="generate_studentpayment.php" class="btn btn-info">Generate Student Payment Report</a>
                </div>

                <div class="col-md-3 mb-3 ml-3">
                <button type="button" class="btn btn-danger">Generate Archive Student Info</button>
                </div>

                </div>


            </div>
</div>


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>