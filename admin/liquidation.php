<?php 
include('authentication.php');
include('includes/header.php');
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        </button>
      </div>
      <div class="modal-body"> Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="code.php" method="POST">
          <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4 mt-3">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Liquidation Report</li>
                        </ol>

            <div class="container">
                <center><h2>Supreme Student Government Expenses</h2></center>
                

            </div>

                        <div class="card mb-4 mt-5">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Expense ID</th>
                                            <th>Name</th>
                                            <th>Purpose</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>Expense ID</th>
                                            <th>Name</th>
                                            <th>Purpose</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php

                        

                            $query = "SELECT
                            ssg_expenses.expense_id, 
                            `user`.fname, 
                            `user`.mname, 
                            `user`.lname, 
                            ssg_expenses.purpose, 
                            ssg_expenses.amount, 
                            ssg_expenses.date
                        FROM
                            ssg_expenses
                            INNER JOIN
                            `user`
                            ON 
                                ssg_expenses.`user` = `user`.user_id
                        ORDER BY
                            ssg_expenses.date DESC";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['expense_id']; ?></td>
                                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                                    <td><?= $row['purpose']; ?></td>
                                    <td><?= $row['amount']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                    <td colspan="5">No Record Found</td>
                                    <td colspan="5">No Record Found</td>
                                    <td colspan="5">No Record Found</td>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header text-center">
    <h4 class="modal-title w-100">SSG EXPENSES FORM</h4>
   </div>
   <div class="modal-body">

    <form action="code.php" method="POST">
     <label>Enter Amount</label>
     <input type="text" name="amount" id="amount" class="form-control" />
     <br />
     <label>Enter Purpose</label>
     <textarea name="purpose" id="purpose" class="form-control"></textarea>
     <br />

     <?php if(isset($_SESSION['auth_user']))  ?>

    <label for="" hidden="true">user_id</label>
    <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">

    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="add_expense" class="btn btn-primary">Submit</button>
   </div>

    </form>

   </div> 
  </div>
 </div>
</div>


<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>