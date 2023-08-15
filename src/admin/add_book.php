<?php
$title = "Add Book";

include "link.php";

$cwd = '../';

$sql = "SELECT MAX(b_id ) as max FROM `books`";
//$query=mysqli_query($dblink,$sql);
$rowSQL = mysqli_query($dblink, $sql);
$row = mysqli_fetch_array($rowSQL);
$largestNumber = $row['max'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Add book</title>
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
  function validate($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
  }
  if (isset($_POST['submit'])) {
    if (isset($_SESSION['admin_login_user'])) {
      $id = $_POST["b_id"];
      $bname = $_POST["b_name"];
      $authors = $_POST['authors'];
      $edition = $_POST["edition"];
      $status = $_POST["status"];
      $quantity = $_POST["quantity"];
      $department = $_POST["department"];
      $sql = "INSERT INTO `books`(`b_id`, `b_name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES ('$id','$bname','$authors','$edition','$status','$quantity','$department');";
      //$sql="insert into books values('$id','$bname','$authors','$edition','$status','$quantity','$department')";
      $run = mysqli_query($dblink, $sql);
  ?>
      <script type=text/javascript>
        alert("Book Successfully Added");
      </script>
    <?php
    } else { ?>
      <script type=text/javascript>
        alert("Please Login your admin panel");
      </script>
  <?php
    }
  }
  ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 pl-2 pr-2 mb-5 pb-4 text-justify">
        <form class="shadow-lg rounded-xl mt-3 p-5 bg-white" action="" method="POST">
          <div class="col-form-label text-center pb-4">
            <h4>Add new book</h4>
          </div>
          <div class="form-group">
            <input class="form-control font-weight-bold" type="text" placeholder="Last Accession No: <?php echo $largestNumber ?>" readonly />
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="b_id" name="b_id" placeholder="" autofocus required>
            <label for="b_id">Accession No</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="b_name" name="b_name" placeholder="" autofocus required>
            <label for="b_name">Title of Book</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="authors" name="authors" placeholder="" autofocus required>
            <label for="authors">Name of Author</label>
          </div>
          <div class="form-group form-floating">
            <select class="form-control custom-select" name="edition" id="edition" required>
              <option value="" selected disabled hidden>None</option>
              <option value="1st">1st</option>
              <option value="2nd">2nd</option>
              <option value="3rd">3rd</option>
              <option value="4th">4th</option>
              <option value="5th">5th</option>
              <option value="6th">6th</option>
              <option value="7th">7th</option>
              <option value="8th">8th</option>
              <option value="9th">9th</option>
              <option value="10th">10th</option>
              <option value="11th">11th</option>
              <option value="12th">12th</option>
            </select>
            <label for="edition">Select Book Edition</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="status" name="status" placeholder="" autofocus required>
            <label for="status">Book Status</label>
          </div>
          <div class="form-group form-floating">
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="" autofocus required>
            <label for="quantity">Quantity of Book</label>
          </div>
          <div class="form-group form-floating">
            <select class="form-control custom-select" name="department" id="department" required>
              <option value="" selected disabled hidden>None</option>
              <option value="CSTE">CSTE</option>
              <option value="IIT">IIT</option>
              <option value="ACCE">ACCE</option>
              <option value="EEE">EEE</option>
              <option value="ICE">ICE</option>
              <option value="Math">Math</option>
              <option value="Pharmacy">Pharmacy</option>
              <option value="Microbiology">Microbiology</option>
              <option value="BGE">BGE</option>
              <option value="English">English</option>
              <option value="LAW">LAW</option>
            </select>
            <label for="department">Select a department</label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
        </form>
      </div>
    </div>
  </div>
  <!--<input class="form-control" type="text" name="volume_part" placeholder="Volume Part of Book" /><br>
      <input class="form-control" type="text" name="place_of_publication" placeholder="Place of Publication" required=""/><br>
      <input class="form-control" type="text" name="name_of_publisher" placeholder="Name of Publisher" required=""/><br>
      <input class="form-control" type="text" name="year_of_publisher" placeholder="Year of Publication" required=""/><br>
      <input class="form-control" type="text" name="page" placeholder="Total Page" required=""/><br>
      <input class="form-control" type="text" name="price" placeholder="Book Price" required=""/><br>-->

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