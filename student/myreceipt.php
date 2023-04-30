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
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">My Payments</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Reference Number</th>
                                            <th>Receipt</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Reference Number</th>
                                            <th>Receipt</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php

                            if(isset($_SESSION['auth_user'])) 
                            $currentUSER = $_SESSION['auth_user']['user_id'];

                            $query = "SELECT `id`, `referencenumber`, `picture`, `date` FROM `payment` WHERE student = $currentUSER";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['referencenumber']; ?></td>
                                        <td> <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['picture']).'" 
                                        alt="image" style="height: 250px; max-width: 310px; object-fit: cover;">';
                                        ?>
                                        </td>
                                        <td><?= $row['date']; ?></td>
                                      
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