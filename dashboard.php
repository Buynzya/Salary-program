<?php
// session_start();
// if(!isset($_SESSION['e_name'])) {
//     header('location:login.php');
// }
include "connect.php";
// employee count hiih
$select="SELECT COUNT(*) FROM employee";
$result=mysqli_query($conn,$select);
$row= mysqli_fetch_all($result,MYSQLI_ASSOC);
$e_count=$row[0]['COUNT(*)'];
// department count hiih
$select="SELECT COUNT(*) FROM department";
$result=mysqli_query($conn,$select);
$row= mysqli_fetch_all($result,MYSQLI_ASSOC);
$d_count=$row[0]['COUNT(*)'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                        <div class="row">
                            <div class="col-md-6"> 
                                <h5>Dashboard</h5>
                                </div>
                            <div class="col-md-3">
                                <div class="number">
                                 <p>  Employee's number: <?php  echo $e_count; ?></p>
                                </div>
                            </div>
                            <div class="col-md-3"> 
                            <div class="number">
                                <p> Departent's number: <?php echo $d_count ?> </p>    
                            <div>
                            </div>
                             
                        </div>
                        </div>
                            <div class="row text">
                                <div class="col-md-12">
                                    <img src="https://th.bing.com/th/id/R.11cb2b0581a33ab3ba920fde685e1808?rik=V4o0d52ufhgu2w&riu=http%3a%2f%2fexplistats.com%2fwp-content%2fuploads%2f2014%2f08%2fPayrolls_by_Sector.gif&ehk=igJaM32hB3xzFeN5rb5fG3HaN9EPAEevTlW75gfzBic%3d&risl=&pid=ImgRaw&r=0" class="diagram">
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>