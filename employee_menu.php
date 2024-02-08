<?php
 session_start();
 if(!isset($_SESSION['e_name'])) {
    header('location:login.php');
 }
?>
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