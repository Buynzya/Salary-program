<?php
include 'connect.php';
// 1. query
session_start();
$e_id=$_SESSION['e_id'];
$select_sql= "SELECT * FROM employee JOIN salary ON employee.e_name=salary.s_name WHERE employee.e_id='$e_id'" ;
// 2. result
$select_result =mysqli_query($conn , $select_sql);
// 3. html ruu change
$salary= mysqli_fetch_all($select_result , MYSQLI_ASSOC);
$i=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class="dash">
    <div class="row">
      <div class="col-md-3">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<div class="menu">
  <div class="m-title">
    <h3> Payroll program </h3>
</div>
<div class="profile">
    <h5 class="name"> <?php echo $_SESSION['e_name'] ; ?>  </h5>
    <span class="dep"> <?php echo $_SESSION['e_department'] ; ?> </span>
</div>
<ul> 
    <li> <a href="employee_dashboard.php"> <i class="bi bi-speedometer2"></i> Dashboard </a> </li>
    <li> <a href="employee_profile.php"> <i class="bi bi-people"></i>Profile</a> </li>
    <li> <a href="employee_salary.php"> <i class="bi bi-cash-coin"></i> Salary </a> </li>
    <li> <a href="logout.php">  <i class="bi bi-box-arrow-left"></i> Log out </a> </li>
    
</ul>
</div>
      </div>
      <div class="col-md-9">
        <div class="content">
          <div class="row">
            <!-- <a href="salary2.php"> -->
          <!-- <button type="button" class="btn btn-primary">Salary
          </button>
          </a> -->
          </div>
          <div class="row text">
            <table class="salary">
              <tr>
                <th> Salary ID </th>
                <th> Salary Bonus </th>
                <th> Salary attendance </th>
                <th> Salary Total </th>
                <th> Salary Date</th>
              </tr>
              <?php  foreach ($salary as $s) { ?>
              <tr>
                <td> <?php echo $i++ ?> </td>
                <td> <?php  echo $s['s_bonus'] ?></td>
                <td> <?php echo  $s['s_attendance'] ?></td>
                <td> <?php echo  $s['s_total'] ?> </td>
                <td> <?php  echo $s['s_date'] ?> </td>
              </tr>
             
              <?php } ?> 
           </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>