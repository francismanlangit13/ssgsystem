<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark noprint" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>secretary/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">MANAGE</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false)  { echo 'active'; } ?>" href="announcement">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-bullhorn"></i></div>
                    Manage Announcement
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/penalties.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/penalties_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/penalties_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/penalties_view.php') !== false)  { echo 'active'; } ?>" href="penalties">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa fa-file-signature"></i></div>
                    Manage Penalties
                </a>
                <div class="<?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_payments.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_accounts.php') !== false)  { echo 'active'; } else { echo 'collapse'; } ?>" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_accounts.php') !== false)  { echo 'active'; }?>" href="generate_accounts">Accounts</a>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_payments.php') !== false)  { echo 'active'; }?>" href="generate_payments">Payments</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Secretary
        </div>
    </nav>
</div>