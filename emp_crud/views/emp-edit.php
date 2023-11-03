<?php
define("pathe", dirname(dirname(__FILE__)));
require pathe . "/includes/dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Employee <a href="index.php" class="btn btn-primary float-end">Back</a></h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $emp_id = mysqli_real_escape_string($db_connection, $_GET['id']);
                            $query = "SELECT * FROM emps WHERE id='$emp_id'";
                            $query_run = mysqli_query($db_connection, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $employee = mysqli_fetch_array($query_run);
                                //print_r($employee);
                        ?>
                                <form method="post" action="../controller/code.php">
                                <div class="mb-3">
                                        
                                        <input type="hidden" class="form-control" name="emp_id" value="<?= $employee['id']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ename" class="form-label">Employee Name</label>
                                        <input type="text" class="form-control" name="empname" value="<?= $employee['ename']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $employee['email']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" name="contact" value="<?= $employee['contact']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="sal" class="form-label">Salary (monthly)</label>
                                        <input type="number" class="form-control" name="salary" value="<?= $employee['salary']; ?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="update_emp">Save</button>

                            <?php
                            }else{
                                echo "<h5>No record Found</h5>";
                            }
                        }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>