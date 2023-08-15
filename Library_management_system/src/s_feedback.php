<?php

include "student/link.php";

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Library Management System</title>
     <link rel="stylesheet" href="css/bootstrap.css">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link rel="stylesheet" href="css/style.css">
     <link rel="shortcut icon" href="img/icon1.png">
 </head>
 <body>
  <!--Navigation-->
  <nav class="navbar navbar-dark navbar-expand-md">
    <div class="container-fluid">
      <a href="index.php"  class="navbar-brand display-1 font-weight-bold">Online Library Management System </a>
      <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav" >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarNav" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link active">Home</a>
          </li>
          <li class="nav-item">
            <a href="student/student_login.php" class="nav-link">Login as Student</a>
          </li>
          <li class="nav-item">
            <a href="admin/admin_login.php" class="nav-link">Login as admin</a>
          </li>
          <li class="nav-item">
            <a href="s_feedback.php" class="nav-link">Feedback</a>
          </li>

        </ul>
      </div>

  </div>
</nav><br>
<div class="container">
      <section style="height:600px;">
      <?php
      $sql="select * from feedback";
      $query=mysqli_query($dblink,$sql);
      if(mysqli_num_rows($query)==0)
      {

        echo "Sorry..! Feedback table is empty";
      }
      else{

        echo "<table class='table table-bordered table-hover table-sm' id='dtHorizontalVerticalExample'>";
        echo "<tr style='background-color:gray;'>";
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Username"; echo "</th>";
        echo "<th>"; echo "Feedack message"; echo "</th>";
        echo "</tr>";

        while($row=mysqli_fetch_assoc($query))
        {


          echo "<tr>";
          echo "<td>";echo $row['feedback_id']; echo "</td>";
          echo "<td>";echo $row['user']; echo "</td>";
          echo "<td>";echo $row['mgs']; echo "</td>";
          echo "</tr>";


        }
        echo "</table>";



      }

       ?>
</section>
</div>
     <footer class="bg-dark text-light text-center">
       <div class="container">
         <div class="row">
           <div class="col">
             <p>Copyright 2021 &copy; library</p>
           </div>
         </div>
       </div>
     </footer>

   </body>
 </html>
