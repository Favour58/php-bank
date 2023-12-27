<?php
include"../php/process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../fontawesome/css/all.css">
     <link rel="stylesheet" href="dashboard.css?<?php echo time()?>">
     <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Dashboard</title>
</head>
<body>
     <nav class="navBar">
          <img src="../images/logo.png" alt="">
          <!-- <form action="" method="post"> -->
          <a href="" name="logout">Logout <i class="fas fa-sign-out-alt"></i></a>
          <!-- </form> -->
     </nav>
     <div class="container">
          <a href="register.php"><div class="register">Registration</div></a>
          <a href="all_users.php"><div class="users">All Users</div></a>
          <a href="loan.php"><div class="loan">Loan/Add funds</div></a>
          <div class="register">Registration</div>
          <div class="users">All User</div>
          <div class="loan">Loan</div>
          <div class="register">Registration</div>
          <div class="users">All User</div>
          <div class="loan">Loan</div>
          

     </div>

     

</body>
</html>