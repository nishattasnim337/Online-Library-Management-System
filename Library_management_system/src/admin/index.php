<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/icon1.png">
</head>
<body>
 <!--Navigation-->
 <nav class="navbar navbar-dark navbar-expand-md">
   <div class="container-fluid">
     <a href="index.html"  class="navbar-brand display-1 font-weight-bold"><img src="../img/icon1.png" alt="icon"> Library Management System</a>
     <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" >
       <span class="navbar-toggler-icon"></span>
     </button>

<?php
if(isset($_SESSION['admin_login_user'])){
  ?>

       <div id="navbarNav" class="collapse navbar-collapse">
         <ul class="navbar-nav ml-auto">
           <li class="nav-item">
             <a href="index.php" class="nav-link active">Home</a>
           </li>
           <li class="nav-item">
             <a href="books.php" class="nav-link">Books</a>
           </li>
           <li class="nav-item">
             <a href="student_info.php" class="nav-link">student_info</a>
           </li>
           <li class="nav-item dropdown ">
             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><span class="fa fa-user">
               <?php
               echo $_SESSION['admin_login_user'];

              ?></spna></a>
              <div class="dropdown-menu text-light" style="background:#000">
                <a class="dropdown-item nav-link text-light " href="profile.php" ><span> My Account</span></a>
                <a href="logout.php" class="dropdown-item nav-link  text-light "><span class="fa fa-sign-out"> logout</span></a>
              </div>
            </li>
         </ul>
       </div>

    <?php }



   else{?>

     <div id="navbarNav" class="collapse navbar-collapse">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item">
           <a href="index.php" class="nav-link active">Home</a>
         </li>
         <li class="nav-item">
           <a href="books.php" class="nav-link">Books</a>
         </li>
         


       </ul>
     </div>
     <?php
   }






 ?>


   </div>
 </nav>

<!--Index home section-->
<section id="indexhomesection" class="my-0">
  <div class="darkoverlay">
    <div class="container">
      <div class="row text-center text-light py-5 d-flex justify-content-center">
        <div class="col">
          <div class="box text-center py-5 ">
            <h1 class="display-4">Welcome to our Library</h1>
            <q class="lead">Today a reader, tomorrow a leader
                                                       – Margaret Fuller</q>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>




<footer class="bg-dark text-light text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <p class="py-2">Copyright 2021 &copy; library Mnagement system</p>
        <div class="light text-inline" >
          <a href="#"class="fa fa-facebook px-1" ></a>
          <a href="https://iit.nstu.edu.bd/home/" class="fa fa-google" ></a>
          <a href="#"class="fa fa-youtube px-1 " ></a>
        </div>

      </div>
    </div>
  </div>
</footer>

    <!-- JS FILES -->
    <script src="../js/jquery.slim.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
