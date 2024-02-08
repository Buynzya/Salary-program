<?php
include 'connect.php';
// 1. query
$select_sql= 'SELECT * FROM salary ' ;
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
        <?php include('menu.php')?>
      </div>
      <div class="col-md-9">
        <div class="content">
          <div class="row">
            <a href="add_salary.php">
          <button type="button" class="btn btn-primary">Salary
          </button>
          </a>
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
                <td> <button type="button" class="btn btn-primary">
                  <a href="salary_edit.php?editid=<?php echo $s['s_id']?> "> Edit</a> </button>
                <button type="button" class="btn btn-danger">
                  <a href="delete.php?deleteid=<?php echo $s['s_id'] ?>"> Delete</a> </button>
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