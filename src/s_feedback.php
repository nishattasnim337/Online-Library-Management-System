<?php
$title = "Feedback";

include "student/link.php";

$cwd = '';

function createNavItem($title, $titleTxt, $linkTxt)
{
  $activeTxt = "";
  $tmpLink = $linkTxt;

  if (isset($title)) {
    if ($title === $titleTxt) {
      $activeTxt = "active";
      $tmpLink = '';
    }
  }

  echo "
  <li class='nav-item $activeTxt'>
    <a class='nav-link' href='$tmpLink'>$titleTxt</a>
  </li>
";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="res/nstu.png" type="image/png">
  <link rel="shortcut icon" href="res/favicon.ico" type="image/jpg" />
</head>

<body class="bg-white" id="page-top" data-spy="scroll" data-target=".fixed-top">
  <!--Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top border-bottom bg-light">
    <div class="container">
      <a class="navbar-brand page-scroll" href="#page-top">
        <img src="res/nstulogo.gif" alt="NSTU" height="32px" width="32px"><span class="brand-name">NSTU</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <!-- Home -->
          <?php createNavItem($title, "Home", "index.php"); ?>
          <!-- Login as Student -->
          <?php createNavItem($title, "Login as Student", "student/student_login.php"); ?>
          <!-- Login as admin -->
          <?php createNavItem($title, "Login as admin", "admin/admin_login.php"); ?>
          <!-- Feedback -->
          <?php createNavItem($title, "Feedback", "s_feedback.php"); ?>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col m-2 p-2 mt-4 pt-4">
        <h4>Provided feedback</h4>
      </div>
    </div>

    <div class="row">
      <div class="col mt-2 mb-4 pb-3">
        <table class="table table-condensed text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Message</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $sql = "select * from feedback";
            $query = mysqli_query($dblink, $sql);
            if (mysqli_num_rows($query) == 0) {
              echo "<tr>No feedback available.</tr>";
            } else {
              while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>";
                echo $row['feedback_id'];
                echo "</td>";
                echo "<td>";
                echo $row['user'];
                echo "</td>";
                echo "<td>";
                echo $row['mgs'];
                echo "</td>";
                echo "</tr>";
              }
            }
            ?>
          </tbody>
        </table>
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