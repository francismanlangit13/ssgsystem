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
                            <li class="breadcrumb-item ">Account</li>
                            <li class="breadcrumb-item active">Parent Account</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               List of Parent Account
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>ACTION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            `user`.user_id, 
                            `user`.fname, 
                            `user`.mname, 
                            `user`.lname, 
                            `user`.email, 
                            user_status.user_status, 
                            position.pos_name
                          FROM
                            `user`
                            INNER JOIN
                            user_status
                            ON 
                              `user`.user_status = user_status.user_status_id
                            INNER JOIN
                            position
                            ON 
                              `user`.pos_name = position.pos_id
                          WHERE
                            `user`.user_type = 5 AND
                            `user`.user_status = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['user_id']; ?></td>
                                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['user_status']; ?></td>
                                        <td>
                                        <div style="display:flex;width: 30%;">
                                            <a class="dropdown-item" type="button" href="parent_view.php?id=<?=$row['user_id'];?>">VIEW</a>
                                            <a class="dropdown-item" type="button" href="parent_update.php?id=<?=$row['user_id'];?>">UPDATE</a>
                                            <form action="code.php" method="post">
                                            <button class="dropdown-item" type="submit" name="parent_delete"  value="<?=$row['user_id'];?>" >ARCHIVE</button>
                                            </form>
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