<?php
$title = "Manage Book Requests";

include "link.php";

$cwd = '../';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Collect fine</title>
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
    <?php
    //........................Fine calculation................
    $_name = $_GET['hiddenuser'];
    // echo $_name;
    // echo "<br>";
    $_bid = $_GET['hidden_b_id'];
    // echo $_bid;
    $returndate = $_GET['hidden_returndate'];
    // echo $returndate;
    $roll = $_GET['hidden_roll'];
    // echo $roll;

    //............................problem Solved ..................
    $return = strtotime($_GET['hidden_returndate']);

    $day = date("Y-m-d");
    $today = strtotime($day);
    $difference = $today - $return;
    if ($difference > 0) {
      $days = floor($difference / (60 * 60 * 24));
      $x = $days * 5;
      // echo $x . "Taka";
    }
    ?>

    <?php
    //echo $x;
    //echo $_POST['fine_receive'];
    //..................................Issue Book update Successfully....................

    $sql3 = "SELECT * FROM `books` WHERE b_id='$_bid';";
    $run3 = mysqli_query($dblink, $sql3);
    $row3 = mysqli_fetch_assoc($run3);
    $present_book = $row3['quantity'];
    // echo $present_book;
    if (isset($_POST['paid'])) {
      if ($_POST['fine_receive'] == $x) {
        $present_book = $present_book + 1;
        $sql = "UPDATE `issue_book` SET `approve`='Return' WHERE `username`='$_name' and `b_id`='$_bid';";
        mysqli_query($dblink, $sql);
        $sql2 = "INSERT INTO `fine_collection`(`b_id`, `username`, `roll`,`return_date`, `days`, `fine`) VALUES ('$_bid','$_name','$roll','$day','$days','$x')";
        mysqli_query($dblink, $sql2);
    ?>

        <script type="text/javascript">
          alert("Return Book successfully");
          window.location = "expired_info.php";
        </script>
        <?php
        if ($present_book > 0) {
          $sql4 = "UPDATE `books` SET `status`='Available',`quantity`='$present_book' WHERE b_id='$_bid';";
          $run4 = mysqli_query($dblink, $sql4);
        } else {
        }
      } else {
        ?>

        <script type="text/javascript">
          alert("Take Exact Fine");
        </script>
      <?php


      }
    } elseif (isset($_POST['not_paid'])) { ?>
      <script type="text/javascript">
        window.location = "expired_info.php";
      </script>
    <?php

    }
    /*  else{
    ?>
    <script type="text/javascript">
    window.location="expired_info.php";
    </script>

  <?php
}*/
    ?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-form-label text-center pb-4">
          <h4>Fine details</h4>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-3"></div>
        <div class=" col-md-6 d-inline">
          <form action="" method="POST" class="font-weight-bold">
            <div class="form-group row">
              <label for="bookid" class="col-sm-3 col-form-label">Book Id</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control" value="<?php echo $_GET['hidden_b_id']; ?>"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label ">UserName</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control" value="<?php echo $_GET['hiddenuser']; ?>"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label ">Roll No</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control" value="<?php echo $_GET['hidden_roll']; ?>"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label ">Return Date</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control" value="<?php echo $_GET['hidden_returndate']; ?>"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label ">Expired Days</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control" value="<?php echo $days; ?>"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label ">Total Fine</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control text-danger font-weight-bold" value="<?php echo $x . " " . "Taka"; ?>"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-3 col-form-label ">Receive Fine</label>
              <div class="col-sm-9">
                <input type="text" class="form-control text-danger font-weight-bold" name="fine_receive"></input>
              </div>
            </div>
            <div class="form-group row ">
              <button class="btn btn-danger form control btn-block col-sm-6   btn-rounded" type="submit" name="not_paid">Not Paid</button>
              <div class="col-sm-6">
                <button class="btn btn-success form control btn-block" type="submit" name="paid">Fine Paid</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-3"></div>
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