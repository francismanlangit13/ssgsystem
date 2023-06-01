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
                                <i class="fas fa-table me-1"></i>
                                List of Penalties
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Year Level</th>
                                            <th>Balance</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Year Level</th>
                                            <th>Balance</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = "SELECT
                                            *
                                            FROM
                                            `user`
                                            WHERE user_type_id = 6 AND user_status_id IN (1,2)";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $row){
                                        ?>
                                        <tr>
                                            <td><?= $row['user_id']; ?></td>
                                            <td><?= $row['student_id']; ?></td>
                                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                                            <td><?= $row['level']; ?></td>
                                            <td>₱<?php if($row['balance'] <= 0){ echo"0"; } else { echo $row['balance']; } ?></td>
                                            <th><?php if($row['balance'] <= 0){ echo"Cleared";} else{ echo"Uncleared"; } ?></th>
                                            <td> 
                                                <div class="row d-inline-flex justify-content-center">
                                                    <div class="col-md-12">
                                                        <button type="button" data-toggle="modal" value="<?=$row['user_id']; ?>" data-firstname="<?=$row['fname']; ?> <?=$row['lname']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-warning btn-icon-split">
                                                            <span class="icon text-white-50">
                                                            </span>
                                                            <span class="text">Penalty</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } }
                                            else{
                                        ?>
                                            <tr>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                                <td>No Record Found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
                        <input required type="text" Placeholder="Enter Penalty Name" id="name" name="name" class="form-control">
                        <div id="name-error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="required">Penalty amount</label>
                        <input required type="number" Placeholder="Enter Amount" id="amount" name="amount" class="form-control">
                        <div id="amount-error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" id="delete_id" name="penalty_add" value="">
                    <button type="submit" id="submit-btn" class="btn btn-success">Add</button>
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

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckName = _.debounce(checkName, 500);
        var debouncedCheckAmount = _.debounce(checkAmount, 500);

        // attach event listeners for each input field
        $('#name').on('input', debouncedCheckName);
        $('#amount').on('input', debouncedCheckAmount);

        $('#name').on('blur', debouncedCheckName);
        $('#amount').on('blur', debouncedCheckAmount);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#name-error').is(':empty') && $('#amount-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }
        
        function checkName() {
            var name = $('#name').val().trim();
            
            // show error if name is empty
            if (name === '') {
                $('#name-error').text('Please input name').css('color', 'red');
                $('#name').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for name if needed
            
            $('#name-error').empty();
            $('#name').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkAmount() {
            var amount = $('#amount').val().trim();
            
            // show error if amount is empty
            if (amount === '') {
                $('#amount-error').text('Please input amount').css('color', 'red');
                $('#amount').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for amount if needed
            
            $('#amount-error').empty();
            $('#amount').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>