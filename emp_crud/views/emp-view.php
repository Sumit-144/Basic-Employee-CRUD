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
                        <h4>Employee View <a href="index.php" class="btn btn-primary float-end">Back</a></h4>
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
                                <div class="mb-3">
                                    <label for="ename" class="form-label">Employee Name</label>
                                    <p class="form-control"><?= $employee['ename'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Employee Mail</label>
                                    <p class="form-control"><?= $employee['email'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Employee Contact</label>
                                    <p class="form-control"><?= $employee['contact'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="salary" class="form-label">Employee Salary</label>
                                    <p class="form-control"><?= $employee['salary'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="ta" class="form-label">Travel Allowance</label>
                                    <p class="form-control"><?= $employee['ta'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="da" class="form-label">Dearness Allowance</label>
                                    <p class="form-control"><?= $employee['da'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="hra" class="form-label">House Rental Allowance</label>
                                    <p class="form-control"><?= $employee['hra'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="pf" class="form-label">Provident Fund</label>
                                    <p class="form-control"><?= $employee['pf'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="gross" class="form-label">Gross Salary</label>
                                    <p class="form-control"><?= $employee['gross'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="net" class="form-label">Net Salary</label>
                                    <p class="form-control"><?= $employee['net'] ?></p>
                                </div>





                        <?php
                            } else {
                                echo '<h5>No data found</h5>';
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