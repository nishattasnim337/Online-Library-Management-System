<?php
session_start();

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

<nav class="navbar navbar-expand-lg navbar-light fixed-top border-bottom bg-light">
  <div class="container">
    <a class="navbar-brand page-scroll" href="#page-top">
      <img src="../res/nstulogo.gif" alt="NSTU" height="32px" width="32px"><span class="brand-name">NSTU</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <!-- Home -->
        <?php createNavItem($title, "Home", "index.php"); ?>
        <!-- Books -->
        <?php createNavItem($title, "Books", "books.php"); ?>
        
        <?php 
        if (isset($_SESSION['login_user'])) {
          createNavItem($title, "Book Request", "book_request.php");
          createNavItem($title, "Issue Information", "issuebook_info.php");
          createNavItem($title, "Fine History", "fine_history.php");
        }
        ?>

        <!-- Feedback -->
        <?php createNavItem($title, "Feedback", "feedback.php"); ?>

        <!-- Profile/Login -->
        <?php
        if (isset($_SESSION['login_user'])) { ?>
          <!-- Profile -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <!-- Show username -->
              <?php
              $isuser = isset($_SESSION['login_user']);
              if ($isuser) {
                $user = $_SESSION['login_user'];
                if (!empty($user)) {
                  echo $user;
                  unset($user);
                } else echo "Profile";
              } else echo "Profile";
              unset($isuser);
              ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right rounded-xl" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profile.php">My account</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        <?php  } else {
          createNavItem($title, "Login", "student_login.php");
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
