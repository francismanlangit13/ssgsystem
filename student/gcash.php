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

<div class="container">
<ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Pay with Gcash</li>
                            <li class="breadcrumb-item active">Download QR Payment</li>
</ol>
                    <div class="row"> 
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card-group">
                        <?php
                            $query = "SELECT
                            qrcode.*
                        FROM
                            qrcode
                        WHERE
                            qrcode.`status` = 'Active'";
                            $query_run = mysqli_query($con, $query);
                            $qr = mysqli_num_rows($query_run) > 0;

                        if($qr)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                            ?>
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="card h-100">
                                 
                                <div class="card-body">
                                <img class="img-fluid card-img-top" src="data:image;base64,<?php echo base64_encode($row['fee_qr']) ?>"  alt="user-avatar" style= "height:250px; width: 100%; object-fit: cover;">

       <h5 class="card-title text-center mt-2" style="font-size: 22px;">Name: <?php echo $row['name']; ?></h5>   
                                 </div>
                                  
                                 <div class="card-footer text-center">
                                 <form action="code.php" method="post">
                                        <button class="btn btn-success" type="submit" name="download_qr" value="<?=$row['id'];?>">Download</button>
                                        </form>
                                 </div>
                              
                            </div>
                            </div>
                        <?php
                        }
                        }
                        else
                        {
                        echo "Nothing to View";
                        }
                        ?>
                    </div>
                </div>
            </div>
</div>









<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>