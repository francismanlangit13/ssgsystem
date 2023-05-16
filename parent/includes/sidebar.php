<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark noprint" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>parent/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false)  { echo 'active'; } ?>" href="announcement">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-bullhorn"></i></div>
                    Announcement
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/paymenthistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/paymenthistory_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory_view.php') !== false)  { echo 'active'; } else { echo 'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                    Payment History
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="<?php if (strpos($_SERVER['PHP_SELF'], 'home/paymenthistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/paymenthistory_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory_view.php') !== false)  { echo 'active'; } else { echo 'collapse'; } ?>" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/paymenthistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/paymenthistory_view.php') !== false)  { echo 'active'; }?>" href="paymenthistory">Via Cash</a>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/onlinehistory.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinehistory_view.php') !== false)  { echo 'active'; }?>" href="onlinehistory">Online Payment</a>
                    </nav>
                </div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/studentpenalty.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/studentpenalty_view.php') !== false)  { echo 'active'; } ?>" href="studentpenalty">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-list"></i></div>
                    Student Penalty
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_payments.php') !== false)  { echo 'active'; } ?>" href="generate_payments">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-print"></i></div>
                    Generate Payment
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Parent
        </div>
    </nav>
</div>