<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
<style type="text/css" media="print">
 @media print{
    .noprint, .noprint *{
        display: none; !important;
    }
 }

</style>



    </head>
   
    <body onload="print()">
        <div class="container">
            <center>
                <h3 class="mt-3 mb-3" style="margin-top: 30px;">Liquidation Report</h3>
            </center>
            <table id="ready" class="table table-striped table-bordered" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('./config/dbcon.php');

                    $query = "SELECT
                    student.fname, 
                    student.mname, 
                    student.lname, 
                    fines_transaction.fines_fee, 
                    fines_transaction.fines_date
                FROM
                    fines_transaction
                    INNER JOIN
                    student
                    ON 
                        fines_transaction.fines_id = student.user_id
                ORDER BY
                    fines_transaction.fines_date DESC";
                 $query_run = mysqli_query($con, $query);

                 while($row = mysqli_fetch_array($query_run)){
                    ?>
                    <tr>
                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> </td>
                    <td><?= $row['fines_fee']; ?></td>
                    <td><?= $row['fines_date']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <a href="generate_report.php" type="" class="btn btn-info noprint" style="width:100%;");>CANCEL PRINTING</a>
        </div>

    </body>
</html>