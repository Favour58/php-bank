<?php
include"../php/process.php";
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../fontawesome/css/all.css">
     <link rel="stylesheet" href="login.css?<?php echo time()?>">
     <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Login</title>
</head>
<body>
     <nav class="navBar">
          <img src="../images/logo.png" alt="">
          <a href="">For Admins Only</a>
     </nav>

      <div class="container">
           <div class="imgbox">
               <img src="../images/formpic.png" alt="">
           </div>
          <div class="formbox">
               <form action="" method="post">
                    <input type="text" placeholder="Username" id=userName name="userName">
                    <div class="passwordWrapper"> 
                    <input type="password" placeholder="Password" id="password" name="password">
                    <button id="togglepassword">
                         <i class="fa fa-eye" id="eye"></i>
                         <i class="fa fa-eye-slash" id="eyeSlash"></i>
                    </button>
                    </div>
                    <p id="error"><?php echo $error ?></p>
                    <button class="login" name="adminlogin">L o g i n</button>
                     <p><a href="">forget password?</a></p>
               </form>
          </div>

     </div>
     <script src="login.js"></script>
     <script>
          window.onload = startListen();
     </script>
</body>
</html>