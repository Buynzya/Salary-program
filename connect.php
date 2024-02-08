<?php
$db_host='localhost';
$db_user='root';
$db_pass='';
$db_name='payroll_program';
$conn=mysqli_connect($db_host , $db_user , $db_pass , $db_name);
if($conn){
    // echo"successfully connected";
}
else {
    die(mysqli_error($conn));
}
?>
