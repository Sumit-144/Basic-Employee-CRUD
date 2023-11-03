<?php 
session_start();
define("variabl",dirname(dirname(__FILE__)));
require variabl.'/includes/dbconn.php';

if(isset($_POST['delete_emp'])){
    $emp_id = mysqli_real_escape_string($db_connection,$_POST['delete_emp']);

    $query = "DELETE FROM emps WHERE id='$emp_id'";
    $query_run = mysqli_query($db_connection,$query);
    if($query_run){
        $_SESSION['message']="Record deleted successfully...";
        header("Location: http://".$_SERVER['HTTP_HOST']."/emp_crud/views/index.php");
        exit(0);
    }else{
        $_SESSION['message']="Record couldn't be deleted";
        header("Location:http://".$_SERVER['HTTP_HOST']."/emp_crud/views/index.php");
        exit(0);
    }
}

if(isset($_POST['update_emp'])){
    //get all the input fields
    $emp_id = mysqli_real_escape_string($db_connection,$_POST['emp_id']);
    $name = mysqli_real_escape_string($db_connection,$_POST['empname']);
    $email = mysqli_real_escape_string($db_connection,$_POST['email']);
    $contact = mysqli_real_escape_string($db_connection,$_POST['contact']);
    $salary = mysqli_real_escape_string($db_connection,$_POST['salary']);

    //converting salary(string type) to double type to match db salary type
    $sal = doubleval($salary);
    if($salary<=15000){
        $ta = $salary*0.03;
        $da = $salary*0.03;
        $hra = $salary*0.05;
        $pf = $salary*0.1;
    }
    else if($salary<=20000){
        $ta = $salary*0.05;
        $da = $salary*0.055;
        $hra = $salary*0.07;
        $pf = $salary*0.12;
    }
    else if($salary<=35000){
        $ta = $salary*0.07;
        $da = $salary*0.08;
        $hra = $salary*0.1;
        $pf = $salary*0.15;
    }
    else if($salary<=50000){
        $ta = $salary*0.1;
        $da = $salary*0.12;
        $hra = $salary*0.15;
        $pf = $salary*0.18;
    }
    $gross = $salary + $ta + $da + $hra;
    $net = $gross - $pf;

    $query = "UPDATE emps SET ename='$name',email='$email',contact='$contact',salary='$sal',ta='$ta',da='$da',hra='$hra',pf='$pf',gross='$gross',net='$net' WHERE id='$emp_id'";
    $query_run = mysqli_query($db_connection,$query);

    if($query_run){
        $_SESSION['message']='Data updated successfully...';
        header("Location: http://".$_SERVER['HTTP_HOST']."/emp_crud/views/index.php");
        exit(0);
    }else{
        $_SESSION['message']='Data did not update sorry...';
        header("Location: http://".$_SERVER['HTTP_HOST']."/emp_crud/views/index.php");
        exit(0);
    }
    

}

if(isset($_POST['save_emp'])){

    //getting all the input fields
    $name = mysqli_real_escape_string($db_connection,$_POST['empname']);
    $email = mysqli_real_escape_string($db_connection,$_POST['email']);
    $contact = mysqli_real_escape_string($db_connection,$_POST['contact']);
    $salary_from_form = mysqli_real_escape_string($db_connection,$_POST['salary']);
    
    /* number of columns in db => 4+1(id) + ta+da+hra+pf+gross+net 
       processing net and gross salaries
    */

    /* 
    NOTE: 
    1. The numeric values in form are of text type
    2. Here in backend we convert text(string) to double type using doubleval()
    3. In MySQL the same field is in double datatype(7,2)
    [first number in bracket indicates total number of digits in the given number, 2nd number indicates number of digits after decimal point].
    
    
    */
    $salary = doubleval($salary_from_form);
    if($salary<=15000){
        $ta = $salary*0.03;
        $da = $salary*0.03;
        $hra = $salary*0.05;
        $pf = $salary*0.1;
    }
    else if($salary<=20000){
        $ta = $salary*0.05;
        $da = $salary*0.055;
        $hra = $salary*0.07;
        $pf = $salary*0.12;
    }
    else if($salary<=35000){
        $ta = $salary*0.07;
        $da = $salary*0.08;
        $hra = $salary*0.1;
        $pf = $salary*0.15;
    }
    else if($salary<=50000){
        $ta = $salary*0.1;
        $da = $salary*0.12;
        $hra = $salary*0.15;
        $pf = $salary*0.18;
    }
    $gross = $salary + $ta + $da + $hra;
    $net = $gross - $pf;

    $query = "INSERT INTO emps(ename,email,contact,salary,ta,da,hra,pf,gross,net) VALUES('$name','$email','$contact','$salary','$ta','$da','$hra','$pf','$gross','$net')";

    $query_run = mysqli_query($db_connection,$query);

   // define("rasta",dirname(dirname(__FILE__)));

    /* if($query_run){
        $_SESSION['message'] = 'Employee created successfully...';
        header("Location:".rasta.'/views/emp-create.php');
        exit(0);
    }else{
        $_SESSION['message'] = 'Failed to save employee data';
        header("Location: ".rasta.'/views/emp-create.php');
        exit(0);
    } */
    if ($query_run) {
        $_SESSION['message'] = 'Employee created successfully...';
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/emp_crud/views/emp-create.php');
        exit(0);
    } else {
        $_SESSION['message'] = 'Failed to save employee data';
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/emp_crud/views/emp-create.php');
        exit(0);
    }
    
    

}


?>