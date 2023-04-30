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
                                            $total_student = "SELECT * FROM `student`";
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
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php
                                        $staff = "SELECT `user`.* FROM `user` WHERE `user`.pos_name != 4";
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
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php
                                        $total_fines = "SELECT * FROM `fines_transaction`";
                                        $total_fines_query_run = mysqli_query($con, $total_fines);
                                    ?>
                                    <div class="card-body"><i class="fas fa-wallet"></i> Total Fines Transaction
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
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <?php
                                        $arch_student = "SELECT *, student.* FROM student WHERE student.user_status = 2";
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
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
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
                                    $query = "SELECT student.user_id, student.fname, student.mname, student.lname, student.email, student.id, user_status.user_status FROM student INNER JOIN user_status ON student.user_status = user_status.user_status_id WHERE student.user_status != 1";
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