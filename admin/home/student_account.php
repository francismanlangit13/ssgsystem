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
                            <li class="breadcrumb-item active">Student Account</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Student Account
                                <div class="float-end">
                                    <a type="button" class="btn btn-primary" href="student_add" style="zoom:75%"><i class="fa fa-plus"></i> Add Student Account</a>
                                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCSV" style="zoom:75%"><i class="fa fa-file-csv"></i> Import CSV</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Grade</th>
                                            <th>Status</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Grade</th>
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
                                                user
                                                INNER JOIN
                                                user_status
                                                ON 
                                                `user`.user_status_id = user_status.user_status_id
                                                WHERE
                                                user_type_id = 6
                                                AND
                                                user_status.user_status_id IN (1, 2)
                                            ";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['user_id']; ?></td>
                                            <td><?= $row['student_id']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['level']; ?></td>
                                            <td><?= $row['user_status']; ?></td>
                                            <td> 
                                                <div class="row d-inline-flex justify-content-center">
                                                    <div class="col-md-3">
                                                        <a href="student_view?id=<?=$row['user_id'];?>" class="btn btn-info btn-icon-split"> 
                                                            <span class="icon text-white-50"></span>
                                                            <span class="text ml-2 mr-2">View</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="student_edit?id=<?=$row['user_id'];?>" class="btn btn-success btn-icon-split"> 
                                                            <span class="icon text-white-50"></span>
                                                            <span class="text">Update</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4" style="margin-left:-0.3rem;">
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
            <input type="hidden" id="delete_id" name="student_delete" value="">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Import CSV -->
<div class="modal fade" id="exampleModalCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelCSV" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="code.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-csv"></i> Import CSV</h5>
                </div>
                <div class="col-sm-12 p-3 mr-4 mb-4 rounded">
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-radius:0rem !important;">
                                    <i class="fa-solid fa-file-csv fa-xl"></i>
                                </span>
                            </div>
                            <input id="import_students" type="file" class="form-control" name="file" placeholder="File" aria-label="File" accept=".csv" required>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="level" class="required">Year Level</label>
                            <select class="form-control" name="level" id="level" required>
                                <option value="" selected="true" disabled="disabled">Select Year Level</option>
                                <option value="Grade 7">Grade 7</option>    
                                <option value="Grade 8">Grade 8</option> 
                                <option value="Grade 9">Grade 9</option> 
                                <option value="Grade 10">Grade 10</option> 
                                <option value="Grade 11">Grade 11</option> 
                                <option value="Grade 12">Grade 12</option> 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="import_students" class="btn btn-success">
                        <i class="fal fa-upload"></i> Upload
                    </button>
                </div>
            </form>
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