<!DOCTYPE html>
<html lang="en">
    <?php include('../includes/header.php'); ?>
    <body class="sb-nav-fixed">
        <?php include ('../includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include ('../includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item ">Payment Platform</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Payment Platform
                                <div class="float-end">
                                    <a type="button" class="btn btn-primary" href="platform_add" style="zoom:75%"><i class="fa fa-plus"></i> Add platform</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Account Number</th>
                                            <th>Date added</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Account Number</th>
                                            <th>Date added</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT
                                            *, DATE_FORMAT(payment_platform.date, '%m-%d-%Y %h:%i:%s %p') as short_date_created
                                            FROM
                                            `payment_platform`
                                            INNER JOIN
                                            `user`
                                            ON
                                            payment_platform.user_id = user.user_id
                                            WHERE
                                            status IN ('Active', 'In active')";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['platform_id']; ?></td>
                                            <td><?= $row['name']; ?></td>
                                            <td><?= $row['account_number']; ?></td>
                                            <td><?= $row['short_date_created']; ?></td>
                                            <td><?= $row['status']; ?></td>
                                            <td> 
                                                <div class="row d-inline-flex justify-content-center">
                                                    <div class="col-md-3">
                                                        <a href="platform_view?id=<?=$row['platform_id'];?>" class="btn btn-info btn-icon-split"> 
                                                            <span class="icon text-white-50"></span>
                                                            <span class="text ml-2 mr-2">View</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="platform_edit?id=<?=$row['platform_id'];?>" class="btn btn-success btn-icon-split"> 
                                                            <span class="icon text-white-50"></span>
                                                            <span class="text">Update</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4" style="margin-left:-0.3rem;">
                                                        <button type="button" data-toggle="modal" value="<?=$row['platform_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                                            <span class="icon text-white-50">
                                                            </span>
                                                            <span class="text">Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } }
                                            else{
                                        ?>
                                            <tr>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>
<!-- Modal -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item number <label id="label"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="code.php" method="POST">
            <input type="hidden" id="delete_id" name="platform_delete" value="">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
    function deleteModal(button) {
        var id = button.value;
        document.getElementById("delete_id").value = id;
        document.getElementById("label").innerHTML = id;
    }
</script>