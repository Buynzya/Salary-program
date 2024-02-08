<?php
if($_SERVER ['REQUEST_METHOD']=="POST") {
    include 'connect.php' ;
    $e_email =$_POST['e_email'] ;
    $e_password =$_POST['e_password'] ;

    $sql ="SELECT * FROM employee where e_email='$e_email' AND e_password='$e_password'";


    $result=mysqli_query($conn , $sql);
    if($result){
        $num =mysqli_num_rows($result) ;
        if($num>0){
        echo "logged in" ;
        session_start();
        $data = $result->fetch_assoc();
        $_SESSION['e_id']=$data['e_id'];
        $_SESSION['e_email'] = $data['e_email'];
        $_SESSION['role'] = $data['role'] ; 
        $_SESSION['e_name'] = $data['e_name'] ;
        $_SESSION['e_department'] = $data['e_department'] ; 
        $_SESSION['e_age']=$data['e_age'];
        if($_SESSION['role']=='admin'){
         header('location:dashboard.php') ;
        }else if($_SESSION['role']=='user'){
            header('location:employee_dashboard.php');
        }
        }else{
            echo "email or password incorrect" ;
        }
        
    }else{
        echo "email or password incorrect" ;
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="sytle1.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="login"> 
                <form action="login.php" class="widb" method="POST">
                    <h4> Welcome back</h4> 
                    <input type="email" class="email" placeholder="Enter your email"  name="e_email" required class="form-control"> 
                    <br>
                    <input type="password" class="password" placeholder="Enter your password"  name="e_password" required  class="form-control">
                    <input type="submit" value="login" class="loginbtn">
                    <p> Don't have an account yet? <a href="signup.php"  class="signupbtn"> Sign up </a> </p>
                    </form>
                    </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>