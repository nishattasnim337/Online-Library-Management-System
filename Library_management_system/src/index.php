<?php
  session_start();
  $host="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="libraryms";
  $dblink=mysqli_connect("$host","$dbuser","$dbpass","$dbname");
  if(!$dblink)
  {
  	die("connection failed: ".mysqli_connect_error());


  }
  else
  {
  	//echo "Database connected";
  }
  $sql="select * from news;";
  $result=mysqli_query($dblink,$sql);

  $row=mysqli_fetch_assoc($result);
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
     <a href="index.php"  class="navbar-brand display-1 font-weight-bold">Online Library Management System</a>
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
     </nav>

     <!--Index home section-->
     <section id="indexhomesection" class="my-0">
       <div class="darkoverlay">
         <div class="container">
           <div class="row text-center text-light py-5 d-flex justify-content-center">
             <div class="col">
               <div class=" text-center py-5 ">
                 <h1 class="display-4 font-italic text-info py-5"><b>Welcome to our Library</b></h1>

               </div>
             </div>
           </div>
         </div>
       </div>
       </section>

		<div class="container slide2">

			  <div class="panel-heading">
		  	<div class="row">
		  		<h3 class="center-block ml-3 my-5" style="font-size: 30px;">Published Announcements</h3>
			</div>
		  </div>
		  <table class="table table-bordered" style="font-size: 18px;">


      		<thead>
                <tr>
                    <th>NewsId</th>
                    <th>Announcement</th>


                </tr>
          </thead>

<tbody>

    <?php
    $counter=1;
    while($row=mysqli_fetch_assoc($result))
    {
      echo "<tr>";
      echo "<td>";echo $counter++; echo "</td>";
      echo "<td>";echo $row['announcement']; echo "</td>";
      echo "</tr>";

}
?>



		         </tbody>
		   </table>

	  </div>


			</div>
	</div>



  	<section id="gallery" class="py-5">
      <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="text-center mb-4">Photo Gallery of Library</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div>
            <img src="img/pic1.jfif" alt="" class="img-fluid" style="height:250px;width:300px">
          </div>
        </div>
        <div class="col-md-4">
<img src="img/pic2.jfif" alt="" class="img-fluid" style="height:250px;width:300px">
        </div>
        <div class="col-md-4">
<img src="img/pic3.jfif" alt="" class="img-fluid" style="height:250px;width:300px">
        </div>
      </div>
      </div>
    </section>

    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col">
        <h2 class="text-center">Some useful links</h2>
      </div>
    </div>

    <!-- Grid row -->
    <div class="row bg-dark text-light "  style="opacity: .9";>

      <!-- Grid column -->
      <div class="col-md-3 mt-md-0 ml-5 py-3">

        <!-- Links -->
          <h5 class="text-uppercase">CENTER/CELL</h5>

          <ul class="list-unstyled ">
            <li>
              <a href="https://nstu.edu.bd/research-cell" class="link-dark">Research Cell</a>
            </li>
            <li>
              <a href="https://nstu.edu.bd/cyber-center">Cyber Center</a>
            </li>
            <li>
              <a href="https://www.iqac.nstu.edu.bd/">IQAC</a>
            </li>
            <li>
              <a href="https://nstu.edu.bd/ict-cell">ICT Cell</a>
            </li>
          </ul>

        </div>

  <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3 ml-5 py-3">
        <!-- Links -->
        <h5 class="text-uppercase">Facilities</h5>

        <ul class="list-unstyled">
          <li>
            <a href="https://nstu.edu.bd/accommodation">Hall of Residence</a>
          </li>
          <li>
            <a href="https://nstu.edu.bd/medical-center">Medical Center</a>
          </li>
          <li>
            <a href="https://nstu.edu.bd/central-library">Central Library</a>

          </li>
          <li>
            <a href="https://nstu.edu.bd/faculty-auditorium">Auditorium</a>
          </li>
        </ul>

      </div>
      <div class="col-md-3 mb-md-0 mb-3 ml-5 py-3">
        <h5 class="text-uppercase">Contract Us</h5>
        <br>
        <p>iit.nstu.edu.bd</p>

      </div>
</footer>
<!-- Footer -->
    <footer class="bg-dark text-light text-center">
  <div class="container">
    <div class="row ">
      <div class="col ">
        <p>Copyright 2021 &copy; library</p>
      </div>
    </div>
  </div>
</footer>


<!-- JS FILES -->
  <script src="js/jquery.slim.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
