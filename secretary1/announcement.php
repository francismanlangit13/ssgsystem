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
                            <li class="breadcrumb-item active">Announcement</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            <a  type="button" class="btn btn-primary" href="announcement_add.php"><i class="fa fa-bullhorn"></i> Add Announcement</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT * FROM `announcement`";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['announcement_id']; ?></td>
                                    <td><?= $row['announcement_title']; ?></td>
                                    <td><?= $row['announcement_body']; ?></td>
                                    <td><?= $row['announcement_publish']; ?></td>
                                    <td><?= $row['announcement_date']; ?></td>
                                    <td> 
                                    
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ACTION
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" type="button" href="announcement_edit.php?id=<?=$row['announcement_id'];?>">UPDATE</a>
                                        <form action="code.php" method="POST">  
                                        <button type="submit" name="announcement_delete" value="<?=$row['announcement_id']; ?>" class="dropdown-item"> DELETE
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