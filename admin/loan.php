<?php
include"../php/process.php";
$account = $_GET['addfund'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../fontawesome/css/all.css">
     <link rel="stylesheet" href="register.css?<?php echo time();?>">
     <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Add funds</title>
</head>
<body>
     <div class="main">
     <div class="register">
          <p>Add funds</p>
          <form action="" method="post">
               <input type="text" value="<?php echo $account?>" name="account">
               <input type="text" placeholder="Amount" name="balance">
               <button name="addfunds" type="submit">S u b m i t</button>
          </form>
          </div>
     <a href="all_users.php"><button class="back">Go back</button></a>
     </div>