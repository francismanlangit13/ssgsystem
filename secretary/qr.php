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
                            <li class="breadcrumb-item active">QR</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                           <h3>View QR for Payment</h3>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>QR</th>
                                            <th>Date Added</th>
                                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>QR</th>
                                            <th>Date Added</th>
                                        
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT * FROM `qrcode`";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td>  <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['fee_qr']).'" 
                                        alt="image" style="height: 250px; max-width: 310px; object-fit: cover;">';
                                        ?></td>
                                         <td><?= $row['date']; ?></td>
                    

                                    </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                <td>No Record Found</td>
                                <td>No Record Found</td>
                                <td>No Record Found</td>
                                <td>No Record Found</td>
                                
                                </tr>
                            <?php
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>