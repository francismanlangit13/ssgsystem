<?php 
include('authentication.php');
include('includes/header.php');
?>

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

<div class="container-fluid">
<div class="col-lg-12 mb-3 mt-3">
 
<h2 class="text-center">ANNOUNCEMENT</h2>

<div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date Start</th>
                                            <th>Date End</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date Start</th>
                                            <th>Date End</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            announcement.*
                            FROM
                            announcement
                            ORDER BY
                            announcement.date_start DESC";
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
                                        <td><?= $row['date_start']; ?></td>
                                        <td><?= $row['date_end']; ?></td>
                                        <td>
                                            <div style="display:flex;width: 30%;">
                                                <a class="dropdown-item" type="button" href="announcement_view.php?id=<?=$row['announcement_id'];?>">View</a>
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
<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>



