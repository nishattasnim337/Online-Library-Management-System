<?php
$title = "Manage Book Requests";

include "link.php";

$cwd = '../';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Issue Information</title>
  <link rel="stylesheet" href="<?= $cwd ?>css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $cwd ?>css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="<?= $cwd ?>res/nstu.png" type="image/png" />
  <link rel="shortcut icon" href="<?= $cwd ?>res/favicon.ico" type="image/jpg" />
</head>

<body class="bg-white" id="book_request" data-spy="scroll" data-target=".fixed-top">
  <?php include "navbar.php"; ?>

  <div class="container">
    <div class="row">
      <h3 class="col"><b>Pending Issue Book Information</b></h3>
    </div>

    <div class="row">
      <div class="col mt-2 mb-4 pb-3">
        <?php
        if (isset($_SESSION['admin_login_user'])) {
          $sql = "SELECT student.username,roll,books.b_id,b_name,approve,authors,edition,issue,returnbook from student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.b_id=books.b_id where issue_book.approve='Yes' ORDER BY issue_book.returnbook ASC;";
          $query = mysqli_query($dblink, $sql);
          if (mysqli_num_rows($query) == 0) {
            echo "<h2 class=''>";
            echo "There is no issued book history";
            echo "</h2>";
          } else {
            echo "<table class='table table-bordered table-hover'>";
            echo "<thead><tr";
            echo "<th>";
            echo "Book Id";
            echo "</th>";
            echo "<th>";
            echo "Student Username";
            echo "</th>";
            echo "<th>";
            echo "Roll";
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
            //echo "<th>"; echo "Approve Status"; echo "</th>";
            echo "<th>";
            echo "Issue Date";
            echo "</th>";
            echo "<th>";
            echo "Return date";
            echo "</th>";
            echo "<th>";
            echo "Take Book";
            echo "</th>";
            echo "</tr></thead><tbody>";
            $count = 0;
            while ($row = mysqli_fetch_assoc($query)) {
              $today = date("Y-m-d");
              if ($today > $row['returnbook']) {
                //$var='<p style="color:yellow; backgroundcolor:green;">RETURNED</p>';
                $returndate = $row['returnbook'];
                $count = $count + 1;
                $sql = "UPDATE `issue_book` SET `approve`='Expired' WHERE `approve`='Yes' AND `returnbook`='$returndate' limit $count;";
                mysqli_query($dblink, $sql);
                //echo $row['returnbook']."</br>";
              } else {
              }
              echo "<tr>";
              echo "<form action='' method='POST'>"; ?>
              <td><input type="hidden" name="hidden_b_id" value="<?php echo $row['b_id']; ?>" /> <?php echo $row['b_id']; ?></td>
              <td><input type="hidden" name="hiddenuser" value="<?php echo $row['username']; ?>" /> <?php echo $row['username']; ?></td>
              <td> <input type="hidden" name="hidden_roll" value="<?php echo $row['roll']; ?>" /> <?php echo $row['roll']; ?></td>
              <?php
              echo "<td>";
              echo $row['b_name'];
              echo "</td>";
              echo "<td>";
              echo $row['authors'];
              echo "</td>";
              echo "<td>";
              echo $row['edition'];
              echo "</td>";
              //echo "<td>";echo $row['approve']; echo "</td>";
              echo "<td>";
              echo $row['issue'];
              echo "</td>";
              ?>
              <td> <input type="hidden" name="hidden_returndate" value="<?php echo $row['returnbook']; ?>" /> <?php echo $row['returnbook']; ?></td>
              <?php
              //echo "<td>";echo $row['returnbook']; echo "</td>";
              if ($today > $row['returnbook']) {
                echo "<td>";
                echo "<button class='font-weight-bold btn btn-danger btn-block' name='b_submit1'><i class='fa fa-cart-plus'></i>";
                echo "</button>";
                echo "</td>";
              } else {
                echo "<td>";
                echo "<button class='font-weight-bold btn btn-success btn-block' name='b_submit2'><i class='fa fa-cart-plus'></i>";
                echo "</button>";
                echo "</td>";
              }

              echo "</tr>";
              echo "</form>";
              //
              $_name = $row['username'];
              $_bid = $row['b_id'];
              //$returndate=$_GET['returndate'];
              $roll = $row['roll'];
              $returndate = $row['returnbook'];
              //echo $returndate;
              $sql2 = "SELECT * FROM `books` WHERE b_id='$_bid';";
              $run2 = mysqli_query($dblink, $sql2);
              $row2 = mysqli_fetch_assoc($run2);
              $present_book = $row2['quantity'];
              if (isset($_POST['b_submit2'])) {
                $present_book = $present_book + 1;
                $sql = "UPDATE `issue_book` SET `approve`='Return' WHERE `username`='$_name' and `b_id`='$_bid';";
                mysqli_query($dblink, $sql);

              ?>

                <script type="text/javascript">
                  alert("Return Book successfully");
                </script>
        <?php
                if ($present_book > 0) {
                  $sql4 = "UPDATE `books` SET `status`='Available',`quantity`='$present_book' WHERE b_id='$_bid';";
                  $run4 = mysqli_query($dblink, $sql4);
                } else {
                }
              } elseif (isset($_POST['b_submit1'])) {
                header("Location :fine_collection.php");
                /*<script type="text/javascript">
window.location="fine_collection.php?hidden_returndate=<?php echo $returndate;?>";
  </script>*/
              } else {
              }
            }
            echo "Expired Book = " . $count;
            echo "<hr>";

            echo "</tbody></table>";
          }
        } else {
          echo "<h2 class=''>";
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
