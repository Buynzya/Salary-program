<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $d_id=$_GET['deleteid'];
    $delete_sql ="DELETE FROM department where d_id=$d_id";
    $result =mysqli_query($conn, $delete_sql);
    if($result){
       // echo "Successfully deleted";
       header('location:department.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>