<?php
include 'connect.php';
// 1. query
$select_sql= 'SELECT * FROM employee ' ;
// 2. result
$select_result =mysqli_query($conn , $select_sql);
// 3. html ruu change
$employee= mysqli_fetch_all($select_result , MYSQLI_ASSOC);
$i=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            <a href="add_employee.php">
          <button type="button" class="btn btn-primary">Add Employee 
          </button>
          </a>
          </div>
          <div class="row text">
            <table class="employee">
              <tr>
                <th> Employee ID </th>
                <th> Employee Name </th>
                <th> Employee Age </th>
                <th> Employee Email </th>
                <th> Employee Department</th>
                <th> Action </th>
              </tr>
              <?php  foreach ($employee as $e) { ?>
              <tr>
                <td> <?php echo $i++?> </td>
                <td> <?php echo  $e['e_name'] ?> </td>
                <td> <?php  echo $e['e_age'] ?></td>
                <td> <?php echo  $e['e_email'] ?></td>
                <td> <?php  echo $e['e_department'] ?> </td>
                <td> <button type="button" class="btn btn-primary">
                  <a href="edit.php?editid=<?php echo $e['e_id']?> "> Edit</button>
                <button type="button" class="btn btn-danger">
                  <a href="delete.php?deleteid=<?php echo $e['e_id'] ?>"> Delete</button>
                </td>
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