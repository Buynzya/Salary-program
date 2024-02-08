<?php
$success=0;
$d_id=$_GET['editid'];
 include 'connect.php';

 $select_sql= "SELECT * FROM department where d_id=$d_id";
 $result=mysqli_query($conn , $select_sql);
 $row=mysqli_fetch_assoc($result);
 $d_name =$row['d_name'];
   $day_salary =$row['day_salary'];
   $month_salary =$row['month_salary'];
   
if($_SERVER['REQUEST_METHOD']=="POST"){
   $d_name =$_POST['d_name'];
   $day_salary =$_POST['day_salary'];
   $month_salary =$_POST['month_salary'];
  
   
   $update_sql="UPDATE department SET d_id='$d_id' , d_name='$d_name' , day_salary='$day_salary' ,month_salary='$month_salary'  WHERE  d_id=$d_id" ;
   //result
   $result = mysqli_query($conn , $update_sql) ; 
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
    <title>Add Employee</title>
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
                Successfully updated to Department!
              </div>';
            } 
            else {
                echo'<div class="alert alert-danger" role="alert">
                Something wrong! Please check again.
              </div>
              ';
            }
            ?>
                        <div class="add_department">
                    <form class="widd" method="POST">
                    <h4>Add Department </h4>
                    <input type="text" placeholder="Enter your name "  class="form-control" name="d_name" required value="<?php echo $d_name?>" >
                   <br>
                    <input type="number" placeholder="Day Salary"  class="form-control" name="day_salary" required value="<?php echo $day_salary?>">
                   <br>
                    <input type="number" placeholder="Month Salary" class="form-control" name="month_salary" required value="<?php echo $month_salary?>" > 
                   <br>
                   <select name="d_name" class="form-control"  class="department"  required>
                        <option value="<?php echo $d_name?>"> <?php echo $d_name?> </option> 
                        <option value=""> Select your department  </option>
                    <!-- 1. foreach() -> davtaltaar bvh data-g gargaj ireh -->
                    <?php foreach($department as $d) { ?>
                        <option value="<?php echo $d['d_name'] ; ?> "> <?php echo $d['d_name'] ?> </option>
                        <?php } ?>
                    </select>
                    <br>
                    <input type="submit" value="post"   class="btn btn-primary" class="signupbtn">
                    <p> I hava an account <a href="login.php" class="loginbttn"> Log in </a></p>
                    </form>
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