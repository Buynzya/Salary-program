<?php
 include 'connect.php';
$success=0;
$cal_success=0;
$select="SELECT e_name FROM employee" ; 
$s_result = mysqli_query($conn , $select);
$employee=mysqli_fetch_all($s_result , MYSQLI_ASSOC);
if($_SERVER['REQUEST_METHOD']=="POST"){
   $s_name=$_POST['s_name'];
   $s_bonus =$_POST['s_bonus'];
   $s_attendance =$_POST['s_attendance'];
   $s_date =$_POST['s_date'];
 
    $action=$_POST['action'];
    if($action=="calculate") {
        $select_sql="SELECT employee.e_name, department.d_name,  department.day_salary , department.month_salary FROM employee JOIN department ON employee.e_department=department.d_name AND employee.e_name='$s_name'";
    $select_result=mysqli_query($conn , $select_sql);
    $row=mysqli_fetch_all($select_result , MYSQLI_ASSOC); 
    $day_salary=$row[0]['day_salary'];
    $month_salary=$row[0]['month_salary'];
    $cal_salary= $month_salary - ($day_salary * $s_attendance) + $s_bonus;
    $cal_success=1;
    }elseif($_POST['action']=="submit"){
        $select_sql="SELECT employee.e_name, department.d_name,  department.day_salary , department.month_salary FROM employee JOIN department ON employee.e_department=department.d_name AND employee.e_name='$s_name'";
        $select_result=mysqli_query($conn , $select_sql);
        $row=mysqli_fetch_all($select_result , MYSQLI_ASSOC); 
        $day_salary=$row[0]['day_salary'];
        $month_salary=$row[0]['month_salary'];
        $cal_salary= $month_salary - ($day_salary * $s_attendance) + $s_bonus;
        $cal_success=1;
        
        $insert_sql="INSERT INTO salary (s_id, s_bonus , s_attendance ,  s_date ,  s_total  , s_name )
         VALUES (NULL ,'$s_bonus','$s_attendance' ,'$s_date' , '$cal_salary' , '$s_name')" ; 
         $result = mysqli_query($conn , $insert_sql) ; 
         if($result){
                 // echo "Employee successfully inserted";
                 $success=1;
                }
               else{
                 die(mysqli_error($conn));
                }
//result
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Salary </title>
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
                Successfully inserted to Salary!
              </div>';
            } 
            else {
            //     echo'<div class="alert alert-danger" role="alert">
            //     Something wrong! Please check again.
            //   </div>
            //   ';
            }
            ?>
                <div class="salary2">
                    <form action="add_salary.php" width="500px" style="margin-top: 50px;" method="POST">
                    <select name="s_name" class="form-control">
                        <option value=""> Select name </option>
                        <?php foreach($employee as $e) {?>
                            <option value="<?php echo $e['e_name']?>">
                            <?php echo $e['e_name'] ?>
                        </option>
                        <?php } ?>
                        <option value=""></option>
                    </select>
                    <br>
                    <input type="number" name="s_bonus"  class="form-control" placeholder="Salary bonus">
                    <br>
                    <input type="number" name="s_attendance" class="form-control" placeholder=" Enter Attendance" > 
                    <br>
                    <input type="date" name="s_date"  class="form-control" placeholder="Salary date">
                    <br>
                    <?php
                    if($cal_success==1){
                        echo"Total salary:" . $cal_salary;
                    } 
                    ?>
                    <input type="submit" name="action" value="calculate">
                    <input type="submit"  name="action" class="signupbtn" value="submit" style="margin-top:20px;">
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>