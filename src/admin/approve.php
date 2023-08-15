<?php
$title = "Book Approve";

include "link.php";

$cwd = '../';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Book Approve</title>
  <link rel="stylesheet" href="<?= $cwd ?>css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $cwd ?>css/style.css">

  <!-- Page icon -->
  <link rel="icon" href="<?= $cwd ?>res/nstu.png" type="image/png" />
  <link rel="shortcut icon" href="<?= $cwd ?>res/favicon.ico" type="image/jpg" />
</head>

<body>

  <?php include "navbar.php"; ?>
  <!--Index home section-->

  <?php
  $_name = $_GET['hiddenuser'];
  // echo $_name;
  // echo "<br>";
  $_bid = $_GET['hidden_b_id'];
  // echo $_bid;
  //.....................Panding books status.........
  ?>

  <!--..........................................When confirm book.................................-->
  <?php
  $sql2 = "SELECT * FROM `books` WHERE b_id='$_bid';";
  $run2 = mysqli_query($dblink, $sql2);
  $row2 = mysqli_fetch_assoc($run2);
  $present_book = $row2['quantity'];
  if (isset($_POST['confirm_book'])) {
    $approve = $_POST["approve"];
    $issue_date = $_POST["issue"];
    $return_date = $_POST["returnbook"];
    $return = strtotime($return_date);
    $issue = strtotime($issue_date);
    $difference = $return - $issue;
    $days = floor($difference / (60 * 60 * 24));
    //............................problem Solved and Book issue successfully.................................

    if (($days <= 5) and ($present_book > 0)) {
      $present_book = $present_book - 1;
      $sql = "UPDATE issue_book SET approve='$approve',issue='$issue_date',returnbook='$return_date' WHERE username='$_name' AND b_id='$_bid' AND approve='';";
      $run = mysqli_query($dblink, $sql);
      $sql3 = "UPDATE `books` SET `quantity`='$present_book' WHERE b_id='$_bid';";
      $run3 = mysqli_query($dblink, $sql3);
    ?>
      <script type="text/javascript">
        alert("Book Successfully Issued");
        window.location = "book_request.php";
      </script>
      <?php
      if ($present_book == 0) {
        $sql4 = "UPDATE `books` SET status='Panding All books' WHERE b_id='$_bid';";
        $run4 = mysqli_query($dblink, $sql4);
      } else {
      }
    } else { ?>
      <script type="text/javascript">
        alert("Select date carefully");
      </script>
  <?php
    }
    //header('location:book_request.php');
  }
  ?>

  <div class="container">
    <div class="container-fluid" style="min-height: 800px;">
      <h2 class="display-5 text-center pt-5">Approve Info</h2>
      <div class="container">
        <div class="row justify-content-center">
          <div class=" col-md-3 col-sm-6 text-center">
            <form action="" method="POST" class="mt-5">
              <select class="form-control" style="text-align:center;" name="approve" required="">
                <option value="session">Approve Status</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select><br>
              <input type="date" name="issue" class="form-control" required=""><br>
              <input type="date" name="returnbook" class="form-control" required=""><br>
              <button class="btn btn-primary form control btn-block" type="submit" name="confirm_book">Confirm Book</button>
            </form>
          </div>
        </div>
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
