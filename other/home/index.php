<!DOCTYPE html>
<html lang="en">
    <?php include ('../includes/header.php'); ?>
    <body class="sb-nav-fixed">
        <?php include ('../includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include ('../includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                        <?php
                                            $total_student = "SELECT * FROM `user` WHERE user_type_id = 6 AND user_status_id != 3";
                                            $total_student_query_run = mysqli_query($con, $total_student);
                                        ?>
                                    <div class="card-body"><i class="fas fa-user-tie"></i> Total Student
                                        <label class="float-end">
                                            <?php
                                                if($student_count = mysqli_num_rows($total_student_query_run)){
                                                    echo '<h5>'.$student_count.'</h5>';
                                                }
                                                else{
                                                    echo '<h5>0</h5>';
                                                }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link text-decoration-none" href="<?php echo base_url ?>admin/home/student_account" >View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php
                                        $staff = "SELECT * FROM `user` WHERE user_type_id IN (2, 3, 4, 5) AND user_status_id != 3";
                                        $staff_query_run = mysqli_query($con, $staff);
                                    ?>
                                    <div class="card-body"><i class="fas fa-users"></i> Total Officer
                                        <label class="float-end">
                                            <?php
                                                if($staff_count = mysqli_num_rows($staff_query_run)) {
                                                    echo '<h5>'.$staff_count.'</h5>';
                                                }
                                                else{
                                                    echo '<h5>0</h5>';
                                                }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link text-decoration-none" href="<?php echo base_url ?>admin/home/officer_account">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php
                                        $total_fines = "SELECT * FROM `payment`";
                                        $total_fines_query_run = mysqli_query($con, $total_fines);
                                    ?>
                                    <div class="card-body"><i class="fas fa-wallet"></i> Total Transaction
                                        <label class="float-end">
                                            <?php
                                                if($fines_count = mysqli_num_rows($total_fines_query_run)){
                                                    echo '<h5>'.$fines_count.'</h4>';
                                                }
                                                else{
                                                    echo '<h5>0</h5>';
                                                }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link text-decoration-none" href="<?php echo base_url ?>admin/home/paymenthistory">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <?php
                                        $arch_student = "SELECT * FROM user WHERE user_status_id = 3";
                                        $arch_student_query_run = mysqli_query($con, $arch_student);
                                    ?>
                                    <div class="card-body"><i class="fa fa-archive"></i> Total Archived Account
                                        <label class="float-end">
                                            <?php
                                                if($arch_cont = mysqli_num_rows($arch_student_query_run)){
                                                    echo '<h5>'.$arch_cont.'</h5>';
                                                }
                                                else{
                                                    echo '<h5>0</h5>';
                                                }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link text-decoration-none" href="generate_accounts">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Users chart
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card mb-4 text-center">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Pending and Archived Students Account
                            </div>
                            <div class="card-body">
                                <?php
                                    $query = "SELECT student.user_id, student.fname, student.mname, student.lname, student.email, student.id, user_status.user_status_id FROM student INNER JOIN user_status ON student.user_status = user_status.user_status_id WHERE student.user_status != 1";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($query_run) > 0){
                                ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['user_status']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ACTION
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                    <a class="dropdown-item" type="button" href="indexstudentview.php?id=<?=$row['user_id'];?>">VIEW</a>
                                                        <form action="code.php" method="post">
                                                        <button class="dropdown-item" type="submit" name="student_active"  value="<?=$row['user_id'];?>" >Active</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } }
                                            else{
                                        ?>
                                            <tr>
                                                <td>No Record Found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                    </div>
                </main>
                <?php include ('../includes/footer.php'); ?>
            </div>
        </div>
        <?php include ('../includes/bottom.php'); ?>
    </body>
</html>
<?php
    $total_student = "SELECT * FROM `user` WHERE user_type_id = 6 AND user_status_id IN (1,2)";
    $total_student_query_run = mysqli_query($con, $total_student);
    $student_count = mysqli_num_rows($total_student_query_run);

    $total_parent = "SELECT * FROM `user` WHERE user_type_id = 7 AND user_status_id IN (1,2)";
    $total_parent_query_run = mysqli_query($con, $total_parent);
    $parent_count = mysqli_num_rows($total_parent_query_run);

    $total_officer = "SELECT * FROM `user` WHERE user_type_id IN (2, 3, 4, 5) AND user_status_id IN (1,2)";
    $total_officer_query_run = mysqli_query($con, $total_officer);
    $officer_count = mysqli_num_rows($total_officer_query_run);
?>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Students", "Parents", "Officers"],
        datasets: [{
        //label: "Revenue",
        backgroundColor: "rgba(2,117,216,1)",
        borderColor: "rgba(2,117,216,1)",
        data: [<?php echo $student_count; ?>, <?php echo $parent_count; ?>, <?php echo $officer_count; ?>],
        }],
    },
    options: {
        scales: {
        xAxes: [{
            time: {
            unit: 'month'
            },
            gridLines: {
            display: false
            },
            ticks: {
            maxTicksLimit: 6
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });

</script>