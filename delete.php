<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $e_id=$_GET['deleteid'];
    $delete_sql ="DELETE FROM employee where e_id=$e_id";
    $result =mysqli_query($conn, $delete_sql);
    if($result){
       // echo "Successfully deleted";
       header('location:employee.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>