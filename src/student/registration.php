<?php
$title = "Registration";

include "link.php";

$cwd = '../';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration | Library Management System</title>
  <link rel="stylesheet" href="<?= $cwd ?>css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $cwd ?>css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="<?= $cwd ?>res/nstu.png" type="image/png" />
  <link rel="shortcut icon" href="<?= $cwd ?>res/favicon.ico" type="image/jpg" />
</head>

<body>

  <?php include "navbar.php"; ?>

  <?php
  if (isset($_POST["submit"])) {
    global $count;
    $sql = "SELECT username from student";
    $result = mysqli_query($dblink, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

      if ($row['username'] == $_POST['username']) {
        $count = 1;
      } else {
        $count = 0;
      }
    }
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && $count == 0) {
      if ($_POST["password"] == $_POST["password2"]) {
        //$count=0;
        $email = $_POST['email'];
        $pass = $_POST["password"];
        $pass2 = $_POST["password2"];
        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $dept = $_POST["dept_name"];
        $year = $_POST["year"];
        $roll = $_POST["roll"];
        $username = $_POST["username"];

        $insert_query = "insert into student(f_name,l_name,department,session_year,roll,username,email,password,pic) values
                      ('$f_name','$l_name','$dept','$year','$roll','$username','$email','$pass','pic.jpg')";
        $run_query = mysqli_query($dblink, $insert_query);
  ?>
        <script type="text/javascript">
          alert("Registration successful");
        </script>
      <?php
      } else {
        echo "Password and confirm password write correctly";
      }
    } else {
      echo "your email write , right formate";
    }

    if ($count == 1) {
      ?>
      <script type="text/javascript">
        alert("The username already exit");
      </script>

  <?php
    }
  }
  ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 pl-2 pr-2 mb-5 pb-4 text-justify">
        <form id="registration" class="shadow-lg rounded-xl mt-3 p-5 bg-white" action="" method="POST">
          <div class="col-form-label text-center pb-4">
            <h4>Register a new student</h4>
          </div>

          <div class="form-group form-floating">
            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="" autofocus required>
            <label for="f_name">First name</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="l_name" name="l_name" placeholder="" required>
            <label for="l_name">Last name</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="" required>
            <label for="username">Username</label>
          </div>
          <div class="form-group form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="" required>
            <label for="email">Email</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="roll" name="roll" placeholder="" required>
            <label for="roll">Roll number</label>
          </div>
          <div class="form-group form-floating">
            <select class="form-control custom-select" name="dept_name" id="dept_name" required>
              <option value="" selected disabled hidden>None</option>
              <option value="IIT">IIT</option>
            </select>
            <label for="dept_name">Select a department</label>
          </div>
          <div class="form-group form-floating">
            <select class="form-control custom-select" name="year" id="year" required>
              <option value="" selected disabled hidden>None</option>
              <option value="2017-18">2017-18</option>
              <option value="2018-19">2018-19</option>
              <option value="2019-20">2019-20</option>
            </select>
            <label for="year">Select session</label>
          </div>
          <div class="form-group form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
            <label for="password">Password</label>
          </div>
          <div class="form-group form-floating">
            <input type="password" class="form-control" id="password2" name="password2" placeholder="" required>
            <label for="password2">Retype Password</label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
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