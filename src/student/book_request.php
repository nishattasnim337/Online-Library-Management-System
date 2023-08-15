<?php
$title = "Book Request";

include "link.php";

$cwd = "../";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Book Request </title>
  <link rel="stylesheet" href="<?= $cwd ?>css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $cwd ?>css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="<?= $cwd ?>res/nstu.png" type="image/png" />
  <link rel="shortcut icon" href="<?= $cwd ?>res/favicon.ico" type="image/jpg" />
</head>

<body class="bg-white" id="page-top" data-spy="scroll" data-target=".fixed-top">
  <?php include "navbar.php"; ?>

  <?php
  if (isset($_POST['delete_btn'])) {
    $x = $_POST['search'];
    echo $x;
    $sql = "select username from issue_book where username='$_SESSION[login_user]' and approve=''and b_id='$x';";
    $query = mysqli_query($dblink, $sql);
    $row = mysqli_fetch_assoc($query);
    if ($row > 1) {
      //echo
      echo $row['username'];
      //echo "<td>";echo "<button type='submit' class='btn btn-primary d-block ' name='delete_btn'>Delete_Req</button>"; echo "</td>";
      $sql = "DELETE FROM `issue_book` WHERE  username='$_SESSION[login_user]' and approve=''and b_id='$x';";
      $query = mysqli_query($dblink, $sql);
  ?>
      <script type="text/javascript">
        alert("Delete Your request successfully");
      </script>
    <?php
    } else { ?>
      <script type="text/javascript">
        alert("This book id is not panding, without approval");
        window.location = "books.php";
      </script>
  <?php
    }
  }

  ?>

  <div class="container">
    <div class="searchbook form-inline ml-auto">
      <form class="ml-auto" action="" method="post">
        <div class="input-group">
          <input type="text" name="search" placeholder="Book Id" class="form-control" value="">
          <div class="input-group-append">
            <button type="submit" name="delete_btn" class="input-group-text"><span class="fa fa-trash"></span>
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="row">
      <h3 class="col mt-3"><b>Book request information</b></h3>
    </div>

    <div class="row">
      <div class="col mb-4 pb-3 mt-3">
        <?php
        if (isset($_SESSION['login_user'])) {
          $sql = "select * from issue_book where username='$_SESSION[login_user]';";
          $query = mysqli_query($dblink, $sql);
          if (mysqli_num_rows($query) == 0) {
            echo "<h2 class='display-5 py-5'>";
            echo "Sorry...! There is no pending book request";
            echo "</h2>";
          } else {
            echo "<table class='table table-bordered table-hover'>";
            echo "<tr>";
            echo "<th>";
            echo "Book_ID";
            echo "</th>";
            echo "<th>";
            echo "Approve Status";
            echo "</th>";
            echo "<th>";
            echo "Issue Date";
            echo "</th>";
            echo "<th>";
            echo "Return Date";
            echo "</th>";
            echo "<th>";
            echo "Fine";
            echo "</th>";
            //echo "<th>"; echo "Delete"; echo "</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($query)) {
              $y = $row['returnbook'];

              echo "<tr>";
              echo "<form action='book_request.php' method='GET'>";
              echo "<td>";
              echo $row['b_id'];
              echo "</td>";
              echo "<td>";
              echo $row['approve'];
              echo "</td>";
              echo "<td>";
              echo $row['issue'];
              echo "</td>";
              $day = date("Y-m-d");
              if (($day > $row['returnbook']) && $row['approve'] == 'Expired') {
                echo "<td class='bg-danger'>";
                echo $row['returnbook'];
                echo "</td>";
        ?>
                <td class="bg-info"> <input type="hidden" name="fine" value="" />
                  <?php
                  if ($day > $y) {
                    $return = strtotime($y);
                    $day = date("Y-m-d");
                    $today = strtotime($day);
                    $difference = $today - $return;
                    if ($difference > 0) {
                      $days = floor($difference / (60 * 60 * 24));
                      //echo $days;
                      $x = $days * 5;
                      echo $x;
                    }
                  } else {
                    echo "No Fine";
                  } ?></td>
        <?php
              } else {
                echo "<td>";
                echo $row['returnbook'];
                echo "</td>";
              }
              echo "</tr>";
              echo "</form>";
            }
            echo "</table>";
          }
        } else {
          //echo "<h2 class='display-3'>";
          //echo "Please Login first";
          //echo "</h2>";
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