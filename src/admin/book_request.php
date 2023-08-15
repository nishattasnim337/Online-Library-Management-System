<?php
$title = "Book Request";

include "link.php";

$cwd = '../';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Book Request</title>
  <link rel="stylesheet" href="<?= $cwd ?>css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $cwd ?>css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="<?= $cwd ?>res/nstu.png" type="image/png" />
  <link rel="shortcut icon" href="<?= $cwd ?>res/favicon.ico" type="image/jpg" />
</head>

<body class="bg-white" id="page-top" data-spy="scroll" data-target=".fixed-top">
  <?php include "navbar.php"; ?>

  <div class="container">

    <div class="row">
      <h3 class="col"><b>List of Requested Books</b></h3>
    </div>

    <div class="row">
      <div class="col mt-2 mb-4 pb-3">
        <?php
        if (isset($_SESSION['admin_login_user'])) {
          $sql = "SELECT student.username,roll,books.b_id,b_name,authors,edition,status from student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.b_id=books.b_id where issue_book.approve='';";

          $query = mysqli_query($dblink, $sql);
          if (mysqli_num_rows($query) == 0) {
            echo "<h2 class='display-5 py-5'>";
            echo "There is no pending book request";
            echo "</h2>";
          } else {
            echo "<table class='table table-bordered table-hover'>";
            echo "<thead><tr>";
            echo "<th>";
            echo "Student Username";
            echo "</th>";
            echo "<th>";
            echo "Roll";
            echo "</th>";
            echo "<th>";
            echo "Book Id";
            echo "</th>";
            echo "<th>";
            echo "Book Name";
            echo "</th>";
            echo "<th>";
            echo "Authors Name";
            echo "</th>";
            echo "<th>";
            echo "Edition";
            echo "</th>";
            echo "<th>";
            echo "Status";
            echo "</th>";
            echo "<th>";
            echo "Approve status";
            echo "</th>";
            echo "</tr></thead><tbody>";
            while ($row = mysqli_fetch_assoc($query)) {
              echo "<tr>";
              $_hiddenuser = $row['username'];
              echo "<form action='approve.php' method='GET'>";
        ?>
              <td><input type="hidden" name="hiddenuser" value="<?php echo $row['username']; ?>" /> <?php echo $row['username']; ?></td>
              <?php
              //echo "<td>";echo"<input type='hidden' name='hiddenuser' value="; echo $_hiddenuser; echo ">";echo $row['username']; echo "</input>"; echo "</td>";
              //echo "<td>";echo $row['username']; echo "</td>";
              echo "<td>";
              echo $row['roll'];
              echo "</td>";
              ?>
              <td><input type="hidden" name="hidden_b_id" value="<?php echo $row['b_id']; ?>" /> <?php echo $row['b_id']; ?></td>
        <?php
              //echo "<td>";echo $row['b_id']; echo "</td>";
              echo "<td>";
              echo $row['b_name'];
              echo "</td>";
              echo "<td>";
              echo $row['authors'];
              echo "</td>";
              echo "<td>";
              echo $row['edition'];
              echo "</td>";
              echo "<td>";
              echo $row['status'];
              echo "</td>";
              echo "<td>";
              echo "<button type='submit' class='btn btn-primary d-block '>Approve</button>";
              echo "</td>";
              echo "</tr>";
              echo "</form>";
            }
            echo "</tbody></table>";
          }
        } else {
          echo "<h2 class='display-5 py-5'>";
          echo "Please login first, then you can see book request Information";
          echo "</h2>";
        }
        ?>
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