<?php

$cwd = '../';

include "link.php";

session_start();

?>
<?php
if (isset($_POST['submit'])) {
  $count = 0;
  $sql = "SELECT * from admin where username='$_POST[username]'|| email='$_POST[username]' && password ='$_POST[password]'";
  $result = mysqli_query($dblink, $sql);
  //$row=mysqli_fetch_assoc($result);
  $count = mysqli_num_rows($result);
  if ($count == 0) {
?>
    <script type="text/javascript">
      alert("The Username and Password doesn't match.")
    </script>
  <?php
  } else { ?>
    <?php
    $sql = "SELECT * from admin where username='$_POST[username]'|| email='$_POST[username]' && password ='$_POST[password]'";
    $result = mysqli_query($dblink, $sql);
    $res = mysqli_fetch_assoc($result);
    //$_SESSION['login_user']=$result;
    $_SESSION['admin_login_user'] = $res['username'];
    $_SESSION['pic'] = $res['pic'];
    ?>
    <script type="text/javascript">
      alert("Successfully Login");
      window.location = "books.php";
    </script>
<?php
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
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $cwd ?>css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="<?= $cwd ?>res/nstu.png" type="image/png" />
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

    <div class="row pt-3 pl-5 ml-5 ">
      <div class="modal fade text-dark" id="mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark ml-auto" id="profile_img">Account Recovery</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times</span></button>
            </div>
            <div class="container">
              <div class="modal-body">
                <form enctype="multipart/form-data" action="" method="POST" class="mt-5">
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
                <?php
                } else {
                }
                ?>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="center-block">
        <p class="pb-5 font-weight-bold">
        </p>
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