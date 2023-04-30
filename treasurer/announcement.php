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
                                   
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                   
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
                                  
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                <td colspan="6">No Record Found</td>
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