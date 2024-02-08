<?php
$success=0;
// $e_id=$_GET['editid'];
//  include 'connect.php';

 $select_sql= "SELECT * FROM employee where e_name";
 $result=mysqli_query($conn , $select_sql);
 $row=mysqli_fetch_assoc($result);
 $e_name =$row['e_name'];
   $e_age =$row['e_age'];
   $e_email =$row['e_email'];
   $e_password =$row['e_password'];
   $e_department =$row['e_department'];
if($_SERVER['REQUEST_METHOD']=="POST"){
   $e_name =$_POST['e_name'];
   $e_age =$_POST['e_age'];
   $e_email =$_POST['e_email'];
   $e_password =$_POST['e_password'];
   $e_department =$_POST['e_department'];
   
//    $update_sql="UPDATE employee SET e_id='$e_id' , e_name='$e_name' , e_age='$e_age' , e_email='$e_email', e_password='$e_password' , e_department='$e_department'  WHERE  e_id=$e_id" ;
   //result
   $result = mysqli_query($conn , $update_sql) ; 
   if($result){
    // echo "Employee successfully inserted";
    $success=1;
   }
   else{
    die(mysqli_error($conn));
   }
}
// 1. select database-aas ugugdul avah query
$select_sql = 'SELECT e_name FROM employee' ; 
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
                Successfully updated to Employee!
              </div>';
            } 
            else {
                echo'<div class="alert alert-danger" role="alert">
                Something wrong! Please check again.
              </div>
              ';
            }
            ?>
                        <div class="add_employee">
                    <form class="widd" method="POST">
                    <h4>Add Employee  </h4>
                    <input type="text" placeholder="Enter your name " name="e_name" required value="<?php echo $e_name?>" >
                   
                    <input type="number" placeholder="Enter your age" name="e_age" required value="<?php echo $e_age?>">
                   
                    <input type="email" placeholder="Enter your email" class="form-control" name="e_email" required value="<?php echo $e_email?>" > 
                   
                    <input type="password" placeholder="Enter your password" class="form-control" name="e_password" required  value="<?php echo $e_password?>">
                    
                   
                    <!-- <label for="">Male</label>  
                    <input type="radio" class="gender">
                    <label for="">Female</label> 
                    <input type="radio" class="gender"> -->
                    <?php
                    // $gender=["male" ,"female"];
                    // foreach($gender as $g) {
                    //     echo "<input type='radio' name='gender' value='$g'>"
                    // }
                    ?>
                    
                    
                    
                    <select name="e_department" class="department"  required>
                        <option value="<?php echo $e_department?>"> <?php echo $e_department?> </option> 
                        <option value=""> Select your department  </option>
                    <!-- 1. foreach() -> davtaltaar bvh data-g gargaj ireh -->
                    <?php foreach($department as $d) { ?>
                        <option value="<?php echo $d['d_name'] ; ?> "> <?php echo $d['d_name'] ?> </option>
                        <?php } ?>
                    </select>
                    <input type="date">
                    <br>
                    <input type="submit" value="post" class="signupbtn">
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