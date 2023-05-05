<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">MANAGE</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/officer_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false)  { echo 'active'; } else { echo 'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Account
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="<?php if (strpos($_SERVER['PHP_SELF'], 'home/officer_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false)  { echo 'show'; } else { echo 'collapse'; } ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/officer_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/officer_view.php') !== false)  { echo 'active'; } ?>" href="officer_account">Offical</a>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/parent_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/parent_view.php') !== false)  { echo 'active'; } ?>" href="parent_account">Parent</a>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/student_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/student_view.php') !== false)  { echo 'active'; } ?>" href="student_account">Student</a>
                        <!-- <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/user_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false)  { echo 'active'; } ?>" href="user_account">User</a> -->
                    </nav>
                </div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/activity.php') !== false)  { echo 'active'; } ?>" href="activity">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-calendar"></i></div>
                    Manage Activity
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false)  { echo 'active'; } ?>" href="announcement">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-bullhorn"></i></div>
                    Manage Announcement
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/liquidation.php') !== false)  { echo 'active'; } ?>" href="liquidation">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-sheet-plastic"></i></div>
                    View Expenses
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                    View Payment History
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="paymenthistory.php">Via Cash</a>
                        <a class="nav-link" href="cash.php">Online Payment</a>
                    </nav>
                </div>
                <a class="nav-link" href="generate_report.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-print"></i></div>
                    Generate Report
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Administrator
        </div>
    </nav>
</div>