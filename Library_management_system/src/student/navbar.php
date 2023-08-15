<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/icon1.png">
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-md">
      <div class="container-fluid">
        <a href="index.html"  class="navbar-brand display-1 font-weight-bold"><img src="../img/icon1.png" alt="icon"> Library Management System</a>
        <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarNav" class="collapse navbar-collapse">
          <ul class="nav navbar-nav  ">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="books.php" class="nav-link">Books</a>
            </li>


          </ul>
          <?php
          if(isset($_SESSION['login_user']))
          {?>
            <ul class=" nav navbar-nav ml-auto">
              <li class="nav-item dropdown ">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><span class="fa fa-user">
                  <?php

                  echo $_SESSION['login_user'];

                 ?></spna></a>
                 <div class="dropdown-menu text-light" style="background:#000">
                   <a class="dropdown-item nav-link text-light " href="profile.php" ><span> My Account</span></a>
                   <a href="logout.php" class="dropdown-item nav-link  text-light "><span class="fa fa-sign-out"> logout</span></a>
                 </div>
               </li>

            </ul>
        <?php  }
        else{?>

          <ul class=" nav navbar-nav ml-auto">
            <li class="nav-item">
              <a href="student_login.php" class="nav-link"><span class="fa fa-sign-in"> login</span></a>
            </li>

            
          </ul>

      <?php  }
           ?>

        </div>
      </div>
    </nav>


    <!-- JS FILES -->
    <script src="../js/jquery.slim.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
