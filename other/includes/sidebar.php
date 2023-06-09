<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark noprint" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>other/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <!-- <div class="sb-sidenav-menu-heading">MANAGE</div> -->
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/officer_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/roles.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/roles_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/roles_edit.php') !== false)  { echo 'active'; } else { echo 'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Account
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="<?php if (strpos($_SERVER['PHP_SELF'], 'home/officer_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/roles.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/roles_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/roles_edit.php') !== false)  { echo 'show'; } else { echo 'collapse'; } ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <?php if ($_SESSION['auth_role'] == "1"){ ?>
                            <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/officer_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_view.php') !== false)  { echo 'active'; } ?>" href="officer_account">Official</a>
                            <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/roles.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/roles_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/roles_edit.php') !== false)  { echo 'active'; } ?>" href="roles">Roles</a>
                        <?php } else { } ?>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/parent_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_view.php') !== false)  { echo 'active'; } ?>" href="parent_account">Parent</a>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/student_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_view.php') !== false)  { echo 'active'; } ?>" href="student_account">Student</a>
                    </nav>
                </div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/activity.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/activity_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/activity_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/activity_view.php') !== false)  { echo 'active'; } ?>" href="activity">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-calendar"></i></div>
                    View Activity
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false)  { echo 'active'; } ?>" href="announcement">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-bullhorn"></i></div>
                    View Announcement
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/expense.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/expense_view.php') !== false)  { echo 'active'; } ?>" href="expense">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-sheet-plastic"></i></div>
                    View Expenses
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/paymenthistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/paymenthistory_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory_view.php') !== false)  { echo 'active'; } else { echo 'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                    View Payment History
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="<?php if (strpos($_SERVER['PHP_SELF'], 'home/paymenthistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/paymenthistory_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory_view.php') !== false)  { echo 'active'; } else { echo 'collapse'; } ?>" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/paymenthistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/paymenthistory_view.php') !== false)  { echo 'active'; }?>" href="paymenthistory">Via Cash</a>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/onlinehistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory_view.php') !== false)  { echo 'active'; }?>" href="onlinehistory">Online Payment</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php
                $person_id =  $_SESSION['auth_user']['user_id'];
                $sql = "SELECT * FROM user INNER JOIN user_type ON user_type.user_type_id = user.user_type_id WHERE user_id='$person_id' ";
                $sql_run = mysqli_query($con, $sql);
                if(mysqli_num_rows($sql_run) > 0) {
                    foreach($sql_run as $row){
                        $role = $row['user_type'];
                    }
                }
                echo"$role";
            ?>
        </div>
    </nav>
</div>