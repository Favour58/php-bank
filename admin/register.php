<?php
include"../php/process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../fontawesome/css/all.css">
     <link rel="stylesheet" href="register.css?<?php echo time();?>">
     <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>User Registration</title>
</head>
<body>
     <div class="main">
     <div class="register">
          <p>User Registration</p>
          <form action="" method="post">
               <input type="text" placeholder="Firstname" name="firstName">
               <input type="text" placeholder="Lastname" name="lastName">
               <input type="text" placeholder="Username" name="userName">
               <input type="text" placeholder="Email" name="email">
               <input type="text" placeholder="Phone" name="phone">
               <input type="text" placeholder="Password" name="password">
               <input type="text" id="dateTimeInput" style="display:none;" name="dateNtime">
               <input type="text" id="rN" style="display:;" name="account">
               <p><?php echo $error ?></p>
               <button name="register">S u b m i t</button>
          </form>
     </div>
     <a href="dashboard.php"><button class="back">Go back</button></a>
     </div>

     <script>
          // Get the current date and time
          const currentDateTime = new Date();

          // Set the value of the input field
          document.getElementById('dateTimeInput').value = currentDateTime.toUTCString();
          //random numbers for acc
          let randonNumber = Math.floor(Math.random() * 10000000000);
          rN.value = randonNumber;
          
     </script>
</body>
</html>