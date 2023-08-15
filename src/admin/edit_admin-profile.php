<?php
$title = "My account";

include "link.php";

$cwd = "../";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="<?= $cwd ?>css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $cwd ?>css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="<?= $cwd ?>res/nstu.png" type="image/png" />
  <link rel="shortcut icon" href="<?= $cwd ?>res/favicon.ico" type="image/jpg" />
</head>

<body>
  <?php include "navbar.php"; ?>

  <!--...............................READ DATA FROM ADMIN TABLE.........................-->
  <?php
  $sql = "SELECT * from admin WHERE username='$_SESSION[admin_login_user]'";
  $result = mysqli_query($dblink, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $f_name = $row['f_name'];
    $l_name = $row['l_name'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $contract = $row['contract'];
  }
  ?>

  <!--..........................................uPDATE work properly.........................-->
  <?php
  if (isset($_POST['submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $contract = $_POST['contract'];

    $count = 0;
    $sql = "SELECT username,email from admin";
    $result = mysqli_query($dblink, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

      if ($_POST['password'] === $_POST['password2']) {
        $sql = "UPDATE admin SET f_name='$f_name',l_name='$l_name',password='$password',contract='$contract' WHERE username='" . $_SESSION['admin_login_user'] . "';";
        if (mysqli_query($dblink, $sql)) {
  ?>
          <script type="text/javascript">
            alert("Update succcessfully");
            window.location = "edit_admin-profile.php";
          </script>

        <?php
        }
      } else {
        ?>
        <script type="text/javascript">
          alert("Give Password Carefully");
          window.location = "edit_admin-profile.php";
        </script>
  <?php
      }
    }
  }
  ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 pl-2 pr-2 mb-5 pb-4 text-justify">
        <form class="shadow-lg rounded-xl mt-3 p-5 bg-white" action="" method="POST">
          <div class="col-form-label text-center pb-4">
            <h4>Edit Profile</h4>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="" value="<?php echo $f_name; ?>" autofocus required>
            <label for="f_name">First name</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="l_name" name="l_name" placeholder="" value="<?php echo $l_name; ?>" required>
            <label for="l_name">Last name</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="" readonly value="<?php echo $username; ?>">
            <label for="username">Username</label>
          </div>
          <div class="form-group form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="" readonly value="<?php echo $email; ?>">
            <label for="email">Email</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="contract" name="contract" placeholder="" value="<?php echo $contract; ?>" required>
            <label for="contract">Contract</label>
          </div>
          <div class="form-group form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="" required value="<?php echo $password; ?>">
            <label for="password">Change Password</label>
          </div>
          <div class="form-group form-floating">
            <input type="password" class="form-control" id="password2" name="password2" placeholder="" required>
            <label for="password2">Retype Password</label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
        </form>
      </div>
    </div>
  </div>

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