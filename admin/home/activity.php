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
                            <li class="breadcrumb-item active">Activity</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            <a  type="button" class="btn btn-primary" href="activity_add.php"><i class="fa fa-bullhorn"></i> Add Activity</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th style="width:10%">Id</th>
                                            <th style="width:40%">Title</th>
                                            <th style="width:15%">Status</th>
                                            <th style="width:10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width:10%">Id</th>
                                            <th style="width:40%">Title</th>
                                            <th style="width:15%">Status</th>
                                            <th style="width:10%">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT * FROM `activity` WHERE `status` = 'Active'";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['activity_id']; ?></td>
                                    <td><?= $row['activity_title']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td> 
                                    
                                    <div style="display:flex;width: 30%;">
                                        <a class="dropdown-item" type="button" href="activity_edit.php?id=<?=$row['activity_id'];?>">UPDATE</a>
                                        <form action="code.php" method="POST">  
                                        <button type="submit" name="activity_delete" value="<?=$row['activity_id']; ?>" class="dropdown-item"> ARCHIVED
                                            </button> 
                                        </form> 
                                        </div>
                                        </div>         

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