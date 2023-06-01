<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark noprint" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>parent/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/activity.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/activity_view.php') !== false)  { echo 'active'; } ?>" href="activity">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-tasks"></i></div>
                    View Activities
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false)  { echo 'active'; } ?>" href="announcement">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-bullhorn"></i></div>
                    Announcement
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/studentpenalty.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/studentpenalty_view.php') !== false)  { echo 'active'; } ?>" href="studentpenalty">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-list"></i></div>
                    Student Penalty
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Parent
        </div>
    </nav>
</div>