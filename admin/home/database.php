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
                            <li class="breadcrumb-item ">Database Management</li>
                        </ol>
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <fieldset>
                                    <legend>Database</legend>
                                    <form method="post" action="code.php" enctype="multipart/form-data" onsubmit="showLoading()" id="frm-restore">
                                        <div class="form-row col-md-6">
                                            <div class="mr-2">Choose Backup File</div>
                                            <input type="file" name="backup_file" class="form-control-file btn btn-secondary" required accept=".sql" style="width:80%">
                                            <br>
                                            <i style="color:red">Warning! Restoring the wrong database file will crash this system. Proceed with caution!</i>
                                        </div>
                                        <button class="btn btn-sm btn-flat btn-danger mt-3" type="submit" name="restore">
                                            <i class="fas fa-upload"></i> Restore database
                                        </button>
                                    </form>
                                    <form method="post" action="data_export.php">
                                        <button class="btn btn-sm btn-flat btn-success mt-3" type="submit">
                                            <i class="fas fa-download"></i> Backup database
                                        </button>
                                    </form>
                                </fieldset>
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