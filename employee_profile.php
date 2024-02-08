
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
 <div class="container">
        <div class="dash">
            <div class="row">
                <div class="col-md-3">
                    <?php include('employee_menu.php')?>
                </div>
                
                <div class="col-md-9">
                    <div class="content"> 
                        <div class="row">

                                 <div class="col-md-4"> 
                                <h5>Profile</h5>
                                </div>
                                
                            <div class="col-md-4">
                                <div class="number">
                                 <p> User's Name: <?php echo $_SESSION['e_name'] ; ?></p>
                                </div>
                            </div>

                            <div class="col-md-4"> 
                                    <div class="number">
                                        <p> User's age : <?php echo $_SESSION['e_age'] ; ?> </p>    
                                    </div>
                            </div>

                        <div class="col-md-4"> 
                             <div class="number">
                                 <p> User's email : <?php echo $_SESSION['e_email'] ; ?> </p>     
                             </div>
                        </div>

                    <div class="col-md-4"> 
                         <div class="number">
                             <p> User's department : <?php echo $_SESSION['e_department'] ; ?> </p>    
                         </div>
                    </div>
                           
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary">
                             <a href="employee_edit.php?editid=<?php echo $_SESSION['e_id'];?>"> Edit </a></button>
                     </div>

                            <div class="row text">
                                <div class="col-md-12">
                                    <img src="https://th.bing.com/th/id/OIP.-13dGG25ctgPYyYCxSqX3AHaFj?w=197&h=180&c=7&r=0&o=5&dpr=1.7&pid=1.7" class="profileicon">
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>