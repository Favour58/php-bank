<?php
include"../php/process.php";

$arg0 = "SELECT   * FROM `user_registration` WHERE `id` = '$_SESSION[id]'";
$query0 = mysqli_query($connect, $arg0);
$row= mysqli_fetch_assoc($query0);


$arg1 = "SELECT   * FROM `balance` WHERE `id` = '$_SESSION[id]'";
$query1 = mysqli_query($connect, $arg1);
$row0 = mysqli_fetch_assoc($query1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="dashboard.css?<?php echo time()?>">
     <link rel="stylesheet" href="requestSection.css?<?php echo time()?>">
     <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
     <link rel="stylesheet" href="../fontawesome/css/all.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard</title>
</head>
<body>

    <section id="boardSection">
    <section class="board">
          <div class="text">
               <p class="name">Hello, <span><?php echo $row['firstName']?>!</span></p>
               <p  class="balance">$<input type="text" value="<?php echo $row0['acc_balance']?>" id="bal" readonly><br>
               <button id="showBalance">
               <i class="fa fa-eye" id="show"></i>
               <i class="fa fa-eye-slash" id="hide"></i>
               </button>
          </p>
          </div>
          <div class="image">
               <img src=""  alt="" onerror="this.src='../images/profileicon.png'">
          </div>
     </section>

     <div class="contents">
               <div class="request" onclick="showRequest()">
                    <i class=" fas fa-sack-dollar"></i>
                    <p>Request</p>
               </div>
               <div class="send" onclick="showSend()">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    <p>Transfer</p>
               </div>
                <div class="paybills" onclick="showBills()"> 
                    <i class="fa-solid fa-credit-card"></i>
                    <p>Pay Bills</p>
               </div>
               <div class="loan" onclick="showLoan()">
                    <i class="fa-solid fa-landmark"></i>
                    <p>Loan</p>
               </div>
               <div class="more" onclick=more()>
                    <i class="fa-solid fa-ellipsis"></i>
                    <p>More</p>
               </div>
          </div>
          <!-- hidden more -->
          <div id="morePops">
                         <div  onclick="showBills()">PayBills</div>
                         <div  onclick="showLoan()">Loan</div>
                    </div>

          <div class="latesttransaction">
               <B class="title">Latest Transactions</B>
               <div class="type">
                    <i class="fa fa-donate"></i>
                         <div class="details">
                              <p>  <span class="text">Money recieved</span>   <span class="amount"> + $100</span></p>
                              <p>  <span class="dateandtime">22-10-2023 10:00pm</span>   <span class="successful">Successful</span></p>
                          </div>
               </div>
               <div class="type">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                         <div class="details">
                              <p>  <span class="text">Tranfer to Bank</span>   <span class="amount"> - $100</span></p>
                              <p>  <span class="dateandtime">22-10-2023 10:00pm</span>   <span class="successful">Successful</span></p>
                          </div>
               </div>

               <div class="type">
                    <i class="fa-solid fa-credit-card"></i>
                         <div class="details">
                              <p>  <span class="text">Bills</span>   <span class="amount"> - $100</span></p>
                              <p>  <span class="dateandtime">22-10-2023 10:00pm</span>   <span class="successful">Successful</span></p>
                          </div>
               </div>

               <div class="type">
                     <i class="fa-solid fa-sim-card"></i>
                         <div class="details">
                              <p>  <span class="text">Airtime</span>   <span class="amount"> - $50</span></p>
                              <p>  <span class="dateandtime">22-10-2023 10:00pm</span>   <span class="successful">Successful</span></p>
                          </div>
               </div>

               <div class="type">
                     <i class="fa-solid fa-landmark"></i>
                         <div class="details">
                              <p>  <span class="text">Loan</span>   <span class="amount"> + $1500</span></p>
                              <p>  <span class="dateandtime">22-10-2023 10:00pm</span>   <span class="successful">Successful</span></p>
                          </div>
               </div>
          </div>
    </section>



    <section class="popSection" id="requestSection">
     <form action="" method="post">
          <h3>
               <span>Request Funds From A User</span>
               <i class="fa fa-times" onclick="hideRequest()"></i>
          </h3>
               <input type="text" value="<?php echo $row['account']?>" name="request_account" style="display:none;">
               <input type="text" value="<?php echo $row['firstName']?>" name="request_firstName" style="display:none;">
               <input type="text" value="<?php echo $row['lastName']?>" name="request_lastName"  style="display:none;">
               <input type="text" placeholder="Account Number" name="recipient_account" >
               <input type="text" placeholder="Amount" name="request_amount">
                <button type="submit" name="request">Request Money</button>
     </form>
    </section>


    <section class="popSection" id="sendSection">
     <form action="">
          <h3>
               <span>Transfer Money To A User</span>
               <i class="fa fa-times" onclick="hideSend()"></i>
          </h3>
               <input type="text" placeholder="Account Number">
               <input type="text" placeholder="Amount">
               <button>Next</button>
     </form>
    </section>

    <section class="popSection" id="transferSection">
     <form action="">
          <h3>
               <span>Transfer To Other Bank Accounts</span>
               <i class="fa fa-times" onclick="hideTransfer()"></i>
          </h3>
               <input type="text" placeholder="Account Number">
               <input type="text" placeholder="Input Bank Name">
               <input type="text" placeholder="Account Name">
               <input type="text" placeholder="Amount">
               <button>Next</button>
     </form>
    </section>

    <section class="popSection" id="loanSection">
     <form action="">
          <h3>
               <span>Request Loan From Bank</span>
               <i class="fa fa-times" onclick="hideLoan()"></i>
          </h3>
               <input type="text" placeholder="Account Number">
               <input type="text" placeholder="Full Name">
               <input type="text" placeholder="Amount">
               <button>Proceed</button>
     </form>
    </section>

    <section class="popSection" id="billSession">
      <div class="billContainer">
      <i class="fa fa-times" onclick="hideBills()"></i>
          <div class="electricity">Electricty</div>
          <div class="phone">Phone</div>
          <div class="Water">Water</div>
           <div class="Tv">Tv</div>
      </div>
    </section>

    <section class="popSection" id="alertmsg">
     <div class="alertPop">
          <span id="reqStatus" style="display:none;"><?php echo $_SESSION['openpopUp']?></span>
          <p id="reqMsg"><?php echo $_SESSION['popUp'] ?></p>
     </div>   
    </section>


    <script src="../js/dashboard.js?<?php echo time()?>"></script>

</body>
</html>