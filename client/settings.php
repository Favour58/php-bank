<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../fontawesome/css/all.css">
     <link rel="stylesheet" href="settings.css?<?php echo time()?>">
     <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>settings</title>
</head>
<body>
     <nav class="navBar">
          <img src="../images/logo.png" alt="">
          <a href="" onclick="showLogout()">Logout <i class="fas fa-sign-out-alt"></i></a>
     </nav>

     <section id="boardSection">
           <div class="container">
                <img src="../images/feature02.jpg" alt="">
               <p>Ryan Reynolds</p>
          </div>
     </section>


     <section class="popSection" id="logoutSection">
     <form action="">
          <h3>
               <i class="fa fa-times" onclick="hideLogout()"></i>
          </h3>
               <p>Are You Sure You Want to Logout??</p>
                <div class="btndiv">
                  <button class="yes">YES</button>
                  <button class="no">NO</button>
                </div>
     </form>
    </section>


    <script src="../js/settings.js?<?php echo time()?>"></script>

</body>
</html>



    