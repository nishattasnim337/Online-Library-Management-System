<?php

include "navbar.php";
include "link.php";
//session_start();

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

<section id="loginsection" class="my-0">
  <div class="darkoverlay">
    <div class="container">
      <div class="row text-center text-light py-5 d-flex justify-content-center">
        <div class="col">
          <div class="loginbox ">
            <h1 class="display-5 py-3 ">User Login Form</h1>
            <form action="" method="POST"  action="" class=" form px-5 mx-5 pt-5">
              <input type="text" class="form-control lead" name="username" placeholder="Username or email" required=""><br>
              <input type="password" class="form-control" name="password" placeholder="Password" required=""><br>


              <button class="btn btn-primary" name="submit">Login</button>
            </form>
            <div class="row pt-3 pl-5 ml-5 pb-5 ">
              <div class="center-block">
              <a href="" class="text-decoration-none"  data-toggle="modal" data-target="#mymodal" >Forgate password?</a>&nbsp; &nbsp; &nbsp;<br>
             </div>
              <div class="modal fade text-dark" id="mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark ml-auto" id="profile_img">Account Recovery</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span >&times</span></button>
                      </div>
                      <div class="container">
                      <div class="modal-body">
                        <form enctype="multipart/form-data" action="" method="POST" class="mt-5">

                           <div class="form-group row">
                           <div class="">
                             <p class="font-weight-bold ">To get a verification code, first confirm the recovery email address you added to your account</p>
                           </div>
                           <div class="col-md-12">

                             <input type="text " class="form-control py-1"  name="remail" placeholder="Enter your edu mail" required>

                           </div>
                         </div>
                        </div>
                      </div>
                      <div class="modal-footer">

                        <div class="mr-auto my-1 p-4">
                        <a href="" class="ml-auto">try another way</a>
                      </div>
                      <div class="col-md-6 text-right">
                        <button class="btn btn-primary  my-2 px-4" type="submit" name="submit2"> Send</button>
                        <!--php .....-->
                        <?php
                        if(isset($_POST['submit2']))
                        {
                          ?>
                          <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                        <?php
                      }
else{

}

                         ?>

                    </div>

                    </form>


                    </div>
                  </div>
                </div>
              </div>
              <div class="center-block">

              </p>
            </div>
            </div>


            </div>
            <!--<p class="pb-5 pt-3 class="font-weight-bold">
              <a href=""class="">Forgate password?</a>&nbsp; &nbsp; &nbsp;
              New in Our site?
              <a href="registration.html" class=""> Sign Up</a>
            </p>-->


          </div>
          <?php

          if(isset($_POST['submit']))
          {
          $count=0;
          $sql="SELECT * from student where username='$_POST[username]'|| email='$_POST[username]' && password ='$_POST[password]'";
          $result=mysqli_query($dblink,$sql);
            $count=mysqli_num_rows($result);
            if($count==True)
            {
              $sql="SELECT * from student where username='$_POST[username]'|| email='$_POST[username]' && password ='$_POST[password]'";
              $result=mysqli_query($dblink,$sql);
              $res=mysqli_fetch_assoc($result);
              //$_SESSION['login_user']=$result;

             $_SESSION['login_user']= $res['username'];


             //$_SESSION['login_user']=$_POST[username];

              ?>
              <script type="text/javascript">
              alert("Successfully Login");
              window.location="books.php";
              </script>
              <?php


            }




            else{?>

              <script type="text/javascript">
            alert("The Username and Password doesn't match.")
              </script>


                  <?php

          }}

          ?>
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

$errors = [];
$user_id = "";
// connect to database
//include "connection.php";

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['submit2'])) {
  $email = mysqli_real_escape_string($db, $_POST['remail']);
  // ensure that the user exists on our system

  $query = "SELECT email FROM student WHERE email='$email'";
  $results = mysqli_query($db, $query);


  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO `recover_pass`(`id`, `email`, `otp`, `date`) values('','$_POST','','')";
    $results = mysqli_query($db, $sql);

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Reset your password ";
    $msg="You activation link is: http://localhost/lms_project/new_pass.php?token=".$token."";
    $_SESSION['token']=$token;
  $msg = wordwrap($msg,70);
    $headers = "From: tasnim1825006f@gmail.com";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
  $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);

  // Grab to token that came from the email link
  $token = $_SESSION['token'];
  if (empty($new_pass) || empty($new_pass_c)) {
    array_push($errors, "Password is required");
    ?>
          <script type="text/javascript">
            alert("Password is required")
          </script>
        <?php
  }
  if ($new_pass !== $new_pass_c) {
    array_push($errors, "Password do not match");
    ?>
          <script type="text/javascript">
            alert("password do not match")
          </script>
        <?php
  }
  if (count($errors) == 0) {
    // select email address of user from the password_reset table
    $sql = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $new_pass = ($new_pass);

      $sql = "UPDATE student SET password='$new_pass' WHERE email='$email'";
      $results = mysqli_query($db, $sql);
      header('location:login.php');


    }
  }
}
?>
