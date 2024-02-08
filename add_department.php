<?php
$success=0;
 include 'connect.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
   $d_name =$_POST['d_name'];
   $day_salary =$_POST['day_salary'];
   $month_salary =$_POST['month_salary'];
   $insert_sql="INSERT INTO Department (d_id ,d_name , day_salary , month_salary) 
   VALUES (NULL,'$d_name','$day_salary','$month_salary')" ; 
   //result
   $result = mysqli_query($conn , $insert_sql) ; 
   if($result){
    // echo "Department successfully inserted";
    $success=1;
   }
   else{
    die(mysqli_error($conn));
   }
}
// 1. select database-aas ugugdul avah query
$select_sql = 'SELECT d_name FROM department' ; 
// 2. mysqli_query () -> deerh query-g ajiluulah code
$select_result= mysqli_query($conn , $select_sql);
// 3. Ajluulsan code-iig html ruu huvirah <- mysqli_fetch_all()
$department=mysqli_fetch_all($select_result , MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <div class="dash">
            <div class="row">
                <div class="col-md-3">
                    <?php include('menu.php')?>
                </div>
                
                <div class="col-md-9">
                    <div class="content"> 
                        <div class="row text">
                        <?php
            if($success) {
                echo'<div class="alert alert-primary" role="alert">
                Successfully inserted to Department !
              </div>';
            } 
            else {
              //   echo'<div class="alert alert-danger" role="alert">
              //   Something wrong! Please check again.
              // </div>
              // ';
            }
            ?>
                <div class="department">
                    <form action="add_department.php" class="widd" method="POST">
                    <h4>Add Department  </h4>
                    <input type="text" placeholder="Enter Department " name="d_name" required >
                    <input type="int" placeholder="Day Salary" name="day_salary" required>
                    <input type="int" placeholder="Month Salary" name="month_salary" required>
                    <input type="submit" value="post" class="signupbtn">
                    </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>