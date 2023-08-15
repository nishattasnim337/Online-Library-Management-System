<?php

$cwd = '../';

include "link.php";
session_start();

if (isset($_POST['submit'])) {
  $count = 0;
  $sql = "SELECT * from student where username='$_POST[username]'|| email='$_POST[username]' && password ='$_POST[password]'";
  $result = mysqli_query($dblink, $sql);
  $count = mysqli_num_rows($result);
  if ($count == True) {
    $sql = "SELECT * from student where username='$_POST[username]'|| email='$_POST[username]' && password ='$_POST[password]'";
    $result = mysqli_query($dblink, $sql);
    $res = mysqli_fetch_assoc($result);
    //$_SESSION['login_user']=$result;

    $_SESSION['login_user'] = $res['username'];


    //$_SESSION['login_user']=$_POST[username];

?>
    <script type="text/javascript">
      alert("Successfully Login");
      window.location = "books.php";
    </script>
  <?php
  } else { ?>
    <script type="text/javascript">
      alert("The Username and Password doesn't match.")
    </script>
  <?php
  }
}

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
  } else if (mysqli_num_rows($results) <= 0) {
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
    $msg = "You activation link is: http://localhost/lms_project/new_pass.php?token=" . $token . "";
    $_SESSION['token'] = $token;
    $msg = wordwrap($msg, 70);
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <link rel="stylesheet" href="<?= $cwd ?>css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $cwd ?>css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="<?= $cwd ?>res/nstu.png" type="image/png">
  <link rel="shortcut icon" href="<?= $cwd ?>res/favicon.ico" type="image/jpg" />
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 pl-2 pr-2 mb-5 pb-4 text-justify">
        <form class="shadow-lg rounded-xl mt-3 p-5 bg-white" action="" method="POST">
          <div class="col-form-label text-center pb-4">
            <h4>Login to Library</h4>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="" autofocus required>
            <label for="username">Username</label>
          </div>
          <div class="form-group form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
            <label for="password">User password</label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
          <div class="mt-3">
            <a href="" class="text-decoration-none" data-toggle="modal" data-target="#mymodal">Forget password?</a>
          </div>
        </form>
      </div>
    </div>

    <div class="row pt-3 pl-5 ml-5 pb-5 ">
      <div class="modal fade text-dark" id="mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content">
            <form enctype="multipart/form-data" action="" method="POST" class="mt-5">
              <div class="modal-header">
                <h5 class="modal-title text-dark ml-auto" id="profile_img">Account Recovery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times</span></button>
              </div>
              <div class="container">
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="">
                      <p class="font-weight-bold ">To get a verification code, first confirm the recovery email address you added to your account</p>
                    </div>
                    <div class="col-md-12">
                      <input type="text " class="form-control py-1" name="remail" placeholder="Enter your edu mail" required>
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
                  if (isset($_POST['submit2'])) {
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
                  <?php } ?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--<p class="pb-5 pt-3 class="font-weight-bold">
              <a href=""class="">Forgate password?</a>&nbsp; &nbsp; &nbsp;
              New in Our site?
              <a href="registration.html" class=""> Sign Up</a>
            </p>-->

  <footer class="footer border-top mt-2">
    <div class="footer-big footer-bottom">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-md-3 col-sm-4">
            <div class="footer-widget">
              <div class="footer-menu">
                <h4 class="footer-widget-title">Center/Cell</h4>
                <ul class="m-0 p-0 list-unstyled">
                  <li>
                    <a href="https://nstu.edu.bd/research-cell" class="footer-link">Research Cell</a>
                  </li>
                  <li>
                    <a href="https://nstu.edu.bd/cyber-center" class="footer-link">Cyber Center</a>
                  </li>
                  <li>
                    <a href="https://www.iqac.nstu.edu.bd/" class="footer-link">IQAC</a>
                  </li>
                  <li>
                    <a href="https://nstu.edu.bd/ict-cell" class="footer-link">ICT Cell</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-4">
            <div class="footer-widget">
              <div class="footer-menu">
                <h4 class="footer-widget-title">Facilities</h4>
                <ul class="m-0 p-0 list-unstyled">
                  <li>
                    <a href="https://nstu.edu.bd/accommodation" class="footer-link">Hall of Residence</a>
                  </li>
                  <li>
                    <a href="https://nstu.edu.bd/medical-center" class="footer-link">Medical Center</a>
                  </li>
                  <li>
                    <a href="https://nstu.edu.bd/central-library" class="footer-link">Central Library</a>
                  </li>
                  <li>
                    <a href="https://nstu.edu.bd/faculty-auditorium" class="footer-link">Auditorium</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-4">
            <div class="footer-widget">
              <div class="footer-menu">
                <h4 class="footer-widget-title">Contact us</h4>
                <ul class="m-0 p-0 list-unstyled">
                  <li>
                    <a href="mailto:info.boolean.office@gmail.com" class="footer-link">info.boolean.office@gmail.com</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="mini-footer footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>&copy 2021 IIT NSTU | Designed and Developed by <b><a class="footer-link" href="#">IIT 1<sup>st</sup>
                    batch</a></b>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- JS FILES -->
  <!-- jQuery 3.4.1 -->
  <script src="<?= $cwd; ?>js/jquery.min.js"></script>
  <!-- Bootstrap bundle js -->
  <script src="<?= $cwd; ?>js/jquery.easing.min.js"></script>
  <!-- jQuery easing 1.4.1 -->
  <script src="<?= $cwd; ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>
