<?php 

session_start();

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

        <!-- NOTE this..... -->
        <?php 
        define("raasta",dirname(dirname(__FILE__)));
        include raasta.'/includes/message.php';
        
        ?>
        <div class="card">
            <div class="card-header float-end">
                <h4>Add Employee <a href="index.php" class="float-end btn btn-primary">Back</a></h4>

            </div>
            <div class="card-body">
                <form method="post" action="../controller/code.php">
                    <div class="mb-3">
                        <label for="ename" class="form-label">Employee Name</label>
                        <input type="text" class="form-control" name="empname">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="contact">
                    </div>
                    <div class="mb-3">
                        <label for="sal" class="form-label">Salary (monthly)</label>
                        <input type="number" class="form-control" name="salary">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="save_emp">Save</button>
                </form>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>