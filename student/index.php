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
<?php
$query = "SELECT
announcement.*
FROM
announcement
ORDER BY
announcement.announcement_date DESC";
$query_run = mysqli_query($con, $query);
$check_announcement = mysqli_num_rows($query_run) > 0;

if($check_announcement)
{
    while($row = mysqli_fetch_array($query_run))
    {
        ?>
<div class="card mt-3">
  <div class="card-header">Title: <?php echo $row['announcement_title']; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['announcement_body']; ?></h5>
    <p class="card-text">By: <?php echo $row['announcement_publish'];?> <br> <?php echo $row['announcement_date']; ?>
</p>
  </div>
</div>
        <?php
    }
}
else
{
    echo "No Announcement";
}


?>
</div>
</div>
<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>



