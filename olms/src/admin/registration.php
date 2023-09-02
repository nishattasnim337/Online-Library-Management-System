<?php
include "link.php";
include "navbar.php";


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

<!--Index home section-->

<section id="regsection" class="my-0">
  <div class="darkoverlay">
    <div class="container">
      <div class="row text-center text-light d-flex justify-content-center">
        <div class="col">
          <div class="regbox ">
            <h1 class="display-5  ">Admin Registration page </h1>

          <form class="px-5 py-3" id="registration" action="" method="POST">
        					<input class="form-control" type="text" name="f_name" placeholder="First Name" required=""/><br>
        					<input  class="form-control" type="text" name="l_name" placeholder="Last Name" required=""/><br>
        					<select  class="form-control" style="text-align:center;" name="dept_name">
        					<option value="session">Department Name</option>
        					<option value="CSTE">CSTE</option>
        					<option value="IIT">IIT</option>
        					<option value="ACCE">ACCE</option>
        					<option value="EEE">EEE</option>
        					<option value="ICE">ICE</option>
        					<option value="MATH">Math</option>
        					<option value="Pharmacy">Pharmacy</option>
        					<option value="Microbiology">Microbiology</option>
        					<option value="BGE">BGE</option>
        					<option value="English">English</option>
        					<option value="LAW">LAW</option>

        					</select><br>

        					<input  class="form-control"  type="text" name="username" placeholder="Username" required=""/><br>
        					<input class="form-control"  type="text" name="email" placeholder="Email" required=""/><br>
        					<input  class="form-control" type="password" name="password" placeholder="Password" required=""/><br>
        					<!--<input  class="form-control" type="password" name="password2" placeholder="Retype Password" required=""/><br>
                  -->

                  <input  class="form-control" type="text" name="contract" placeholder="Contract Number" required=""/><br>
        					<input  class="btn btn-primary" type="submit" name="submit" value="Sign Up"/>

        </form>



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

<?php
require_once("link.php");

if(isset($_POST["submit"]))
{
	$count=0;
	$sql="SELECT username from admin";
	$result=mysqli_query($dblink,$sql);
	while($row=mysqli_fetch_assoc($result))
	{

		if($row['username']==$_POST['username'])
		{
			$count=$count+1;
		}
	}

	if($count==0)
	{

$f_name=$_POST["f_name"];
$l_name=$_POST["l_name"];
$dept=$_POST["dept_name"];
$username=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST["password"];
$contract=$_POST["contract"];


$insert_query="insert into admin(f_name,l_name,department,username,email,password,contract,pic) values
	('$f_name','$l_name','$dept','$username','$email','$pass','$contract','pic.jpg')";
$run_query=mysqli_query($dblink,$insert_query);
?>
<script type="text/javascript">
alert("Registration successful");
</script>

<?php
}

else {
	?>
<script type="text/javascript">
alert("The username already exit");
</script>

<?php
}
}
?>
