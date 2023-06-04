<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark noprint" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>treasurer/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">MANAGE</div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false)  { echo 'active'; } ?>" href="announcement">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-bullhorn"></i></div>
                    View Announcement
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/expense.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/expense_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/expense_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/expense_edit.php') !== false)  { echo 'active'; } ?>" href="expense">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-sheet-plastic"></i></div>
                    Manage Expenses
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/penalties.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/penalties_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/penalties_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/penalties_view.php') !== false)  { echo 'active'; } ?>" href="penalties">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa fa-file-signature"></i></div>
                    View Penalties
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/onlinepay.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepay_view.php') !== false)  { echo 'active'; } ?>" href="onlinepay">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa fa-users"></i></div>
                    Pending Online Payment
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/platform.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/platform_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/platform_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/platform_edit.php') !== false)  { echo 'active'; } ?>" href="platform">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fas fa-receipt"></i></div>
                    Manage Payment Platform
                </a>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/payment.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/payment_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/payment_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepayment.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepayment_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepayment_edit.php') !== false)  { echo 'active'; } else { echo 'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                    Manage Payment
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="<?php if (strpos($_SERVER['PHP_SELF'], 'home/payment.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/payment_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/payment_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepayment.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepayment_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepayment_edit.php') !== false)  { echo 'active'; } else { echo 'collapse'; } ?>" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/payment.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/payment_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/payment_edit.php') !== false)  { echo 'active'; }?>" href="payment">Via Cash</a>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/onlinepayment.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepayment_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/onlinepayment_edit.php') !== false)  { echo 'active'; }?>" href="onlinepayment">Online Payment</a>
                    </nav>
                </div>
                <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_payments.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_liquidation.php') !== false)  { echo 'active'; } else { echo 'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-solid fa-print"></i></div>
                    Generate Report
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="<?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_payments.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_liquidation.php') !== false)  { echo 'active'; } else { echo 'collapse'; } ?>" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_liquidation.php') !== false)  { echo 'active'; }?>" href="generate_liquidation">Liquidation</a>
                        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_payments.php') !== false)  { echo 'active'; }?>" href="generate_payments">Payments</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Treasurer
        </div>
    </nav>
</div>