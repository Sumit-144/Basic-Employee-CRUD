<?php
session_start();
define("pathe", dirname(dirname(__FILE__)));
require pathe . '/includes/dbconn.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <?php
        define("msg_path",dirname(dirname(__FILE__)));
        include msg_path."/includes/message.php";
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header float-end">
                        <h4>Employee Details <a href="emp-create.php" class="float-end btn btn-primary">Add Employee</a></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mail</th>
                                <th>Contact</th>
                                <th>Salary</th>
                                
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM emps";
                                $query_run = mysqli_query($db_connection, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $employee) {
                                        //echo $x['ename'];
                                ?>
                                        <tr>
                                            <td><?= $employee['id'] ?></td>
                                            <td><?= $employee['ename'] ?></td>
                                            <td><?= $employee['email'] ?></td>
                                            <td><?= $employee['contact'] ?></td>
                                            <td><?= $employee['salary'] ?></td>
                                            
                                            <td>
                                                <a href="emp-view.php?id=<?=$employee['id']?>" class="btn btn-primary btn-sm">View</a>&nbsp;
                                                <a href="emp-edit.php?id=<?=$employee['id']?>" class="btn btn-info btn-sm">Edit</a>&nbsp;
                                                <form action="../controller/code.php" method="post" class="d-inline">
                                                    <button class="btn btn-sm btn-danger" name="delete_emp" value="<?=$employee['id']?>">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "<h5>No record Found </h5>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>