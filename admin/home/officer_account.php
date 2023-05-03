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
                            <li class="breadcrumb-item ">Account</li>
                            <li class="breadcrumb-item active">Officer Account</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Officer Account
                                <div class="float-end">
                                    <a type="button" class="btn btn-primary" href="officer_account_add" style="zoom:75%"><i class="fa fa-plus"></i> Add Officer Account</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $user_id = $_SESSION['auth_user']['user_id'];
                                            $query = "SELECT
                                                *
                                                FROM
                                                `user`
                                                INNER JOIN
                                                user_status
                                                ON 
                                                `user`.user_status = user_status.user_status_id
                                                WHERE
                                                user_type IN (2, 3, 4, 5) AND
                                                user_type IN (1, 2)
                                            ";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['user_id']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                                            <td><?= $row['email']; ?></td>
                                            <td>
                                                <?php if($row['user_type'] == 2){
                                                    echo "President";
                                                } elseif($row['user_type'] == 3){
                                                    echo "Vice President";
                                                } elseif($row['user_type'] == 4){
                                                    echo "Secretary";
                                                } elseif($row['user_type'] == 5){
                                                    echo "Treasurer";
                                                } else { } ?>
                                            </td>
                                            <td><?= $row['user_status']; ?></td>
                                            <td> 
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-md-4">
                                                        <a href="officer_account_view?id=<?=$row['user_id'];?>" class="btn btn-info btn-icon-split"> 
                                                            <span class="icon text-white-50"></span>
                                                            <span class="text ml-2 mr-2">View</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="officer_account_edit?id=<?=$row['user_id'];?>" class="btn btn-success btn-icon-split"> 
                                                            <span class="icon text-white-50"></span>
                                                            <span class="text">Update</span>
                                                        </a>
                                                    </div>
                                                    <!-- <div class="col-md-12 mb-1">
                                                        <form action="code.php" method="POST" style="zoom:105%;">
                                                            <input type="text" name="oldimage" value="<?= $row['picture']; ?>" hidden>
                                                            <button type="submit" name="user_delete" value="<?=$row['user_id']; ?>" class="btn btn-danger btn-icon-split" href="#">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span class="text">Delete</span>
                                                            </button> 
                                                        </form>
                                                    </div> -->
                                                    <div class="col-md-4">
                                                        <button type="button" data-toggle="modal" value="<?=$row['user_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
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
            <input type="hidden" id="delete_id" name="officer_delete" value="">
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