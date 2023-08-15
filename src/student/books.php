<?php
$title = "Books";

include "link.php";

$cwd = '../';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Books Information</title>
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
  if (isset($_POST['submit1'])) {
    if (isset($_SESSION['login_user'])) {
      $sql1 = "SELECT * FROM `books` WHERE b_id=$_POST[b_id]";
      //$sql2="SELECT `username` FROM `issue_book` WHERE approve='' and username='$_SESSION[login_user]';";

      $query = mysqli_query($dblink, $sql1);
      //$query1=mysqli_query($dblink,$sql2);
      $row = mysqli_fetch_assoc($query);
      //  $row1=mysqli_fetch_assoc($query1);
      $x = $row['quantity'];
      if ($x > 0) {
        $count = mysqli_num_rows($query);
        //$count1=mysqli_num_rows($query1);
        if ($count != 0) {
          $sql2 = "SELECT `username` FROM `issue_book` WHERE approve!='Return' AND username='$_SESSION[login_user]';";
          $query1 = mysqli_query($dblink, $sql2);
          $row1 = mysqli_fetch_assoc($query1);
          $count1 = mysqli_num_rows($query1);
          if ($count1 === 0) {
            $sql = "INSERT into issue_book values('$_SESSION[login_user]','$_POST[b_id]','','','')";
            mysqli_query($dblink, $sql);
  ?>
            <script type="text/javascript">
              alert("Request sent successfully");
              window.location = "book_request.php";
            </script>
          <?php
          } else { ?>
            <script type="text/javascript">
              alert("You have already a pending Book request");
            </script>
          <?php
          }
        } else { ?>
          <script type="text/javascript">
            alert("Books not available in library");
          </script>
        <?php
        }
      } else {
        ?>
        <script type="text/javascript">
          alert("Out of stock");
        </script>
      <?php
      }
    } else { ?>
      <script type="text/javascript">
        alert("Please Ensure your Login then send request for book");
      </script>
    <?php  }
  }
  if (isset($_POST['request'])) {
    if (isset($_SESSION['login_user'])) {
      $b_id = $_POST["b_id"];
      $username = $_SESSION['login_user'];
      $sql = "insert into issue_book values( '$username','$b_id','','','');";
      $run = mysqli_query($dblink, $sql);
    } else {
    ?>
      <script type=text/javascript>
        alert("Please login first");
      </script>
  <?php
    }
  }
  ?>

  <div class="container">
    <!--..........................search Book..........................-->
    <div class="searchbook form-inline ml-auto m-2">
      <form class="ml-auto" action="" method="post">
        <div class="input-group">
          <input type="text" name="search" placeholder="Search books" class="form-control" value="">
          <div class="input-group-append">
            <button type="submit" name="submit" class="input-group-text"><span class="fa fa-search"></span>
            </button>
          </div>
        </div>
      </form>
    </div>

    <!--.......................................Delete books.........................-->
    <div class="deletebook form-inline ml-auto m-2">
      <form class="ml-auto" action="" method="post">
        <div class="input-group">
          <input type="text" name="b_id" placeholder="Search Book Id" class="form-control" value="">
          <div class="input-group-append">
            <button type="submit" name="submit1" class="input-group-text btn btn-primary">Request
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="row">
      <h3 class="col"><b>Book list</b></h3>
    </div>

    <div class="row">
      <div class="col mt-2 mb-4 pb-3">
        <?php
        //..................................Search book using database..............
        if (isset($_POST['submit'])) {
          $sql = "select * from books where b_name like '%$_POST[search]%' || b_id='$_POST[search]';";
          $query = mysqli_query($dblink, $sql);
          if (mysqli_num_rows($query) == 0) {
            echo "Sorry..! No Books found";
          } else {
            echo "<table class='table table-condensed table-hover'>";
            echo "<thead class=''><tr>";
            echo "<th>";
            echo "ID";
            echo "</th>";
            echo "<th>";
            echo "Book-Name";
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
            echo "Quantity";
            echo "</th>";
            echo "<th>";
            echo "Department";
            echo "</th>";
            echo "</tr></thead><tbody>";
            while ($row = mysqli_fetch_assoc($query)) {
              echo "<tr>";
              echo "<td>";
              echo $row['b_id'];
              echo "</td>";
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
              echo $row['quantity'];
              echo "</td>";
              echo "<td>";
              echo $row['department'];
              echo "</td>";
              echo "</tr>";
            }
            echo "</tbody></table>";
          }
        } else {
          $sql = "SELECT * FROM `books` ORDER BY `books`.`b_name` ASC";
          // name assending
          $result = mysqli_query($dblink, $sql);
          //table header
          echo "<table class='table table-condensed table-hover'>";
          echo "<thead class=''><tr>";
          echo "<th>";
          echo "ID";
          echo "</th>";
          echo "<th>";
          echo "Book-Name";
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
          echo "Quantity";
          echo "</th>";
          echo "<th>";
          echo "Department";
          echo "</th>";
          echo "</tr></thead><tbody>";
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>";
            echo $row['b_id'];
            echo "</td>";
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
            echo $row['quantity'];
            echo "</td>";
            echo "<td>";
            echo $row['department'];
            echo "</td>";
            echo "</tr>";
          }
          echo "</tbody></table>";
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
