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
                            <li class="breadcrumb-item ">Announcement</li>
                            <li class="breadcrumb-item active">Add Announcement</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Announcement Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-5 mb-3">
                                                    <?php
                                                        $sql = "SELECT * FROM `activity` WHERE status = 'Active'";
                                                        $all_activity = mysqli_query($con,$sql);
                                                    ?>
                                                    <label for="" class="required">Activity</label>
                                                    <select name="activity_id" required class="form-control">
                                                        <option value="" selected disabled>Select Activity</option>
                                                        <?php
                                                            // use a while loop to fetch data
                                                            // from the $all_activity variable
                                                            // and individually display as an option
                                                            while ($activity = mysqli_fetch_array(
                                                                    $all_activity,MYSQLI_ASSOC)):;
                                                        ?>
                                                            <option value="<?php echo $activity["activity_id"];?>">
                                                                <?php echo $activity["activity_title"];?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Title</label>
                                                    <input required type="text" Placeholder="Enter Announcement Name" name="title" class="form-control">
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="required">Description</label>
                                                    <textarea required type="text" Placeholder="Enter Description" placeholder="Enter Description" name="body" class="form-control"> </textarea>       
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="" class="required">Date Started</label>
                                                    <input  required type="datetime-local" name="date_start" id="txtDate" class="form-control">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="" class="required">Date Ended</label>
                                                    <input required type="datetime-local" name="date_end" id="txtDate" class="form-control">
                                                </div>
                                            </div>   
                                            <div class="float-end">
                                                <a href="announcement" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
                                                <button type="submit" name="add_announcement" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
<script>
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    var tomorrowISOString = tomorrow.toISOString().slice(0, 16);
    document.getElementsByName("date_start")[0].setAttribute("min", tomorrowISOString);
    document.getElementsByName("date_end")[0].setAttribute("min", tomorrowISOString);
</script>