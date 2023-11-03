<!-- This file consists of the connection code to database -->
<?php

$db_connection = mysqli_connect("localhost", "root", "root", "emp_crud_php");

if (!$db_connection) {
    die("connection failed" . mysqli_connect_error());
}

?>