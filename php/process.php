<?php
include "connection.php";
session_start();
// error_reporting(0);
     //admin login//
     if (isset($_POST['adminlogin'])) {
          $userName = $_POST['userName'];
          $password = $_POST['password'];

         $arg0 = "SELECT * FROM `admin_login` WHERE `userName` = '$userName'";
         $query0 = mysqli_query($connect, $arg0);
         $count0 = mysqli_num_rows($query0);
         if ($count0 > 0) {
               $arg1 = "SELECT * FROM `admin_login` WHERE `password` = '$password'";
               $query1 = mysqli_query($connect, $arg1);
               $count1 = mysqli_num_rows($query1);
               if ($count1 > 0) {
                    $arg2 = "SELECT * FROM `admin_login` WHERE `userName`= '$userName' AND `password` = '$password'";
                    $query2 = mysqli_query($connect, $arg2);
                    $count2 = mysqli_num_rows($query2);
                    if ($count2) {
                         $row = mysqli_fetch_assoc($query2);
                         $_SESSION['id'] = $row['id'];
                         $_SESSION['status'] = 'true';
                         echo"<script>window.location.href = '../admin/dashboard.php'</script>";
                    }
               }
               else{
                    $error = "Incorrect Password";
               }
         }
         else{
          $error = "Incorrect Username";
         }
     }

     // user registration //
     if (isset($_POST['register'])) {
          $firstName = $_POST['firstName'];
          $lastName = $_POST['lastName'];
          $userName = $_POST['userName'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $password = $_POST['password'];
          $account = $_POST['account'];
          $dateNtime = $_POST['dateNtime'];
          $active = "true";

          $arg0 = "SELECT * FROM `user_registration` WHERE `username` = '$userName'";
          $query0 = mysqli_query($connect, $arg0);
          $count0 = mysqli_num_rows($query0);
          if ($count0 > 0) {
               $error = "Username is already in existence";
          }
          else{
               $arg1 = "SELECT * FROM `user_registration` WHERE `email` = '$email'";
               $query1 = mysqli_query($connect, $arg1);
               $count1 = mysqli_num_rows($query1);
               if ($count1 > 0) {
                    $error = "email is already in existence";
               }
               else{
                    $arg2 = "INSERT INTO `user_registration` (`firstName`,`lastName`,`userName`,`email`,`phone`,
                    `password`,`account`,`dateNtime`,`active`) VALUES ('$firstName','$lastName','$userName','$email','$phone',
                    '$password','$account','$dateNtime','$active')";
                    $query2 = mysqli_query($connect, $arg2);
                    if ($query2) {
                         $balance = 0;
                          try{
                              $arg3 = "INSERT INTO `balance` (`account`,`acc_balance`) VALUES ('$account','$balance')";
                              $query3 = mysqli_query($connect, $arg3);
                          }
                          catch(Exception $e){
                              echo $e->getMessage();
                          }        
                         echo"<script>alert('Registration Successful!')</script>";
                         echo"<script>window.location.href ='../admin/register.php'</script>";
                    }
                    else{
                         echo"<script>alert('Ooop!! something went wrong..')</script>";
                         echo"<script>window.location.href ='../admin/register.php'</script>";
                    }
               }
            }   
     }

     //active status
          if (isset($_POST['changeactive'])) {
               $changeactive = $_POST['changeactive'];
               $account = $_POST['account'];
               if ($changeactive == "true") {
                    $changeactive = "false";
               }
               else{
                    $changeactive = "true";
               }
               $arg0 = "UPDATE `user_registration` SET `active`= '$changeactive' WHERE `account`='$account'";
               $query0 = mysqli_query($connect, $arg0);
               if ($query0) {
                    echo"<script>window.location.href ='../admin/all_users.php'</script>";
               }
               else{
                    echo"<script>alert('Ooop!! something went wrong..')</script>";
                    echo"<script>window.location.href ='../admin/all_users.php'</script>";
               }
          }

          //add funds//
          if (isset($_POST['addfunds'])) {
              $account = $_POST['account'];
              $balance  = intval($_POST['balance']);

              $arg0 = "UPDATE `balance` SET `acc_balance` =
               (SELECT `acc_balance` FROM `balance` WHERE `account` = '$account') + 
               '$balance' WHERE `account` = '$account'";
              $query0 = mysqli_query($connect, $arg0);
              if ($query0) {
               echo"<script>alert(' Successful!')</script>";
               echo"<script>window.location.href ='../admin/all_users.php</script>";
              }
              else{
               echo"<script>alert('Ooop!! something went wrong..')</script>";
               echo"<script>window.location.href ='../admin/all_users.php'</script>";
              }
          }

          // user login
          if (isset($_POST['login'])) {
                   $userName = $_POST['userName'];
                   $password = $_POST['password'];
                   $arg0 = "SELECT * FROM `user_registration` WHERE `userName` = '$userName'";
                   $query0 = mysqli_query($connect, $arg0);
                   $count0 = mysqli_num_rows($query0);
                   if ($count0 > 0) {
                       $arg1 = "SELECT * FROM `user_registration` WHERE `password` = '$password'";
                       $query1 = mysqli_query($connect, $arg1);
                       $count1 = mysqli_num_rows($query1);
                       if ($count1 > 0) {
                           $arg2 = "SELECT * FROM `user_registration` WHERE `userName` = '$userName' AND 
                           `password` = '$password'";
                           $query2 = mysqli_query($connect, $arg2);
                           $count2 = mysqli_num_rows($query2);
                           if ($count2 > 0) {
                              $row = mysqli_fetch_assoc($query2);
                              $active = $row['active'];
                              if ($active == "true") {
                                   $_SESSION['id'] = $row['id'];
                                   $_SESSION['status'] = 'true';
                                   $_SESSION['account'];
                                   $_SESSION['firstName'];
                                   $_SESSION['lastName'];
                              echo"<script>window.location.href = '../client/dashboard.php'</script>";
                              }  
                              else{
                                   echo"<script>alert('This account has been deactivated')</script>";
                              }
                           } 
                       }
                       else{
                           $generalError = 'Incorrect Password...!!';
                       }
                   }
                   else{
                       $generalError = 'username is Incorrect...!!';
                   }
               }

               //delete Bank-user//
               if (isset($_GET['deleteuser'])) {
                    $id = $_GET['deleteuser'];
                    $arg0 = "DELETE FROM `user_registration` WHERE `id` = '$id'";
                    $query0 = mysqli_query($connect, $arg0);
                    if ($query0) {
                       $arg1 =  "DELETE FROM `balance` WHERE `id` = '$id'";
                       $query1 = mysqli_query($connect, $arg1);
                       if ($query1) {
                          echo"<script>window.location.href = '../admin/all_users.php'</script>";
                       }
                       else{
                         echo"<script>alert('something went wrong')</script>";
                         echo"<script>window.location.href = '../admin/all_users.php'</script>";
                       }
                    }
                    else{
                         echo"<script>alert('something went wrong')</script>";
                         echo"<script>window.location.href = '../admin/all_users.php'</script>";
                     }
               }

          //logout//
          if (isset($_POST['logout'])) {
               session_abort();
               echo"<script>window.location.href = '../admin/login.php'</script>";
          }

          //request//
          $_SESSION['popUp'] = "";
          $_SESSION['openpopUp']  = "false";
          if (isset($_POST['request'])) {
               $request_account = $_POST['request_account'];
               $request_firstName = $_POST['request_firstName'];
               $request_lastName = $_POST['request_lastName'];
               $recipient_account = $_POST['recipient_account'];
               $request_amount = $_POST['request_amount'];

               try{
                    $arg0 = "INSERT INTO `request_funds` (`request_account`,`request_firstName`,
                    `request_lastName`,`recipient_account`,`request_amount`) VALUES ('$request_account',
                    '$request_firstName', '$request_lastName', '$recipient_account', '$request_amount')";
                    $query0 = mysqli_query($connect, $arg0);
                    if ($query0) {
                        $_SESSION['openpopUp']= "true" ;
                        $_SESSION['popUp'] = "Your request has been sent succesfully";
                       
                    }
               }
               catch(Exception $e){
                    $_SESSION['openpopUp']= "true" ;
                    $_SESSION['popUp'] = "Your request was not sent";
                    // $e->getMessage();
               }
          }




?>