<?php
include"../php/process.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../fontawesome/css/all.css">
     <link rel="stylesheet" href="all_users.css?<?php echo time()?>">
     <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>All users</title>
</head>
<body>
<table>
        <tr>
            <th>Id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>username</th>
            <th>email</th>
            <th>phone</th>
            <th>Account</th>
            <!-- <th>Balance</th> -->
            <th>Date</th>
            <th>Active</th>
            <th>Funds</th>
            <th>Delete</th>
          </tr>
          <?php
          $arg0 = "SELECT user_registration.id, user_registration.firstName, user_registration.lastName, 
          user_registration.userName, user_registration.email, user_registration.phone, user_registration.account,
          user_registration.active, user_registration.dateNtime FROM `user_registration`, 
           balance WHERE user_registration.id = balance.id";
          $query0 = mysqli_query($connect, $arg0); 
          while ($row = mysqli_fetch_assoc($query0)) {
               ?>
               <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['firstName']?></td>
                    <td><?php echo $row['lastName']?></td>
                    <td><?php echo $row['userName']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone']?></td>
                    <td><?php echo $row['account']?></td>
                    <!-- <td><?php echo $row['acc_balance']?></td> -->
                    <td><?php echo $row['dateNtime']?></td>
                    <td>
                         <form action="" method="post">
                              <input type="text" name ="account" value="<?php echo $row['account']?>" style="display:none">
                              <input type="submit" name="changeactive" value="<?php echo $row['active']?>" readonly>
                         </form>
                    </td>
                    <td><a href="loan.php? addfund=<?php echo $row['account']?>" type="button">Add funds</a></td>
                    <td>
                      <a href="all_users.php? deleteuser=<?php echo $row['id']?>" style>Delete</a>
                    </td> 

               </tr>
               <?php
        }
        
        ?>
     </table>
     <a href="dashboard.php"><button class="back">Go back</button></a>

</body>
</html>