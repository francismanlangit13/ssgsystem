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
                            <li class="breadcrumb-item ">Penalties</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <?php
                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                        $sql = "SELECT
                                        *, DATE_FORMAT(penalties.penalty_date, '%m-%d-%Y %h:%i:%s %p') as short_date_created
                                        FROM
                                        penalties
                                        INNER JOIN
                                        `user`
                                        ON 
                                        penalties.`user_id` = `user`.user_id
                                        WHERE penalties.user_id = '$id'";
                                        $sql_run = mysqli_query($con, $sql);
                                        if(mysqli_num_rows($sql_run) > 0){
                                            $row = mysqli_fetch_assoc($sql_run); // Fetch the single row result
                                ?>
                                <i class="fas fa-table me-1"></i>
                                List of Penalties (<?= $row['fname']; ?> <?= $row['lname']; ?>)
                                <?php } else{ echo "Undefined"; } } ?> 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Penalty Type</th>
                                            <th>Penalty Amount</th>
                                            <th>Penalty Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Penalty Type</th>
                                            <th>Penalty Amount</th>
                                            <th>Penalty Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                           if(isset($_GET['id'])){
                                                $id = $_GET['id'];
                                                $query = "SELECT
                                                    *, DATE_FORMAT(penalties.penalty_date, '%m-%d-%Y %h:%i:%s %p') as short_date_created
                                                    FROM
                                                    penalties
                                                    INNER JOIN
                                                    `user`
                                                    ON 
                                                    penalties.`user_id` = `user`.user_id
                                                    WHERE penalties.user_id = '$id'
                                                ";
                                                $query_run = mysqli_query($con, $query);
                                                if(mysqli_num_rows($query_run) > 0){
                                                    foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['penalty_id']; ?></td>
                                            <td><?= $row['penalty_reason']; ?></td>
                                            <td><?= $row['penalty_fee']; ?></td>
                                            <td><?= $row['short_date_created']; ?></td>
                                        </tr>
                                        <?php } }
                                            else{
                                        ?>
                                            <tr>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                            </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                                <div class="float-end">
                                    <a href="penalties.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Back</a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Penalty Student (<label id="label"></label>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="col-md-12 mb-3">
                        <label for="" class="required">Penalty Name</label>
                        <input required type="text" Placeholder="Enter Penalty Name" name="name" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="required">Penalty amount</label>
                        <input required type="number" Placeholder="Enter Amount" name="amount" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" id="delete_id" name="penalty_add" value="">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    function deleteModal(button) {
        var id = button.value;
        var firstname = button.getAttribute("data-firstname");
        document.getElementById("delete_id").value = id;
        document.getElementById("label").innerHTML = firstname;
    }
</script>