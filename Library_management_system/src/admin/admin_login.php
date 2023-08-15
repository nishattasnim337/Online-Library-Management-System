<?php

include "navbar.php";
include "link.php";
//session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icon1.png">
</head>
<body>

<!--Index home section-->

<section id="loginsection" class="my-0">
  <div class="darkoverlay">
    <div class="container">
      <div class="row text-center text-light py-5 d-flex justify-content-center">
        <div class="col">
          <div class="loginbox ">
            <h1 class="display-5 py-3 ">User Login Form</h1>
            <form action="" method="POST"  action="" class=" form px-5 mx-5 pt-5">
              <input type="text" class="form-control lead" name="username" placeholder="Username or email" required=""><br>
              <input type="password" class="form-control" name="password" placeholder="Password" required=""><br>


              <button class="btn btn-primary" name="submit">Login</button>
            </form>
            <div class="row pt-3 pl-5 ml-5 ">
              <div class="center-block">
              <a href="" class="text-decoration-none"  data-toggle="modal" data-target="#mymodal" >Forgate password?</a>&nbsp; &nbsp; &nbsp;
             </div>
              <div class="modal fade text-dark" id="mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark ml-auto" id="profile_img">Account Recovery</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span >&times</span></button>
                      </div>
                      <div class="container">
                      <div class="modal-body">
                        <form enctype="multipart/form-data" action="" method="POST" class="mt-5">

                           <div class="form-group row">
                           <div class="">
                             <p class="font-weight-bold ">To get a verification code, first confirm the recovery email address you added to your account</p>
                           </div>
                           <div class="col-md-12">

                             <input type="text " class="form-control py-1"  name="remail" placeholder="Enter your edu mail" required>

                           </div>
                         </div>
                        </div>
                      </div>
                      <div class="modal-footer">

                        <div class="mr-auto my-1 p-4">
                        <a href="" class="ml-auto">try another way</a>
                      </div>
                      <div class="col-md-6 text-right">
                        <button class="btn btn-primary  my-2 px-4" type="submit" name="submit2"> Send</button>
                        <!--php .....-->
                        <?php
                        if(isset($_POST['submit2']))
                        {
                          ?>
                          <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                        <?php
                      }
                      else{

                          }

                         ?>

                    </div>

                    </form>


                    </div>
                  </div>
                </div>
              </div>
              <div class="center-block">
              <p class="pb-5  class="font-weight-bold">

              </p>
            </div>
            </div>


            </div>
            <!--<p class="pb-5 pt-3 class="font-weight-bold">
              <a href=""class="">Forgate password?</a>&nbsp; &nbsp; &nbsp;
              New in Our site?
              <a href="registration.html" class=""> Sign Up</a>
            </p>-->


          </div>
          <?php

          if(isset($_POST['submit']))
          {
          $count=0;
          $sql="SELECT * from admin where username='$_POST[username]'|| email='$_POST[username]' && password ='$_POST[password]'";
          $result=mysqli_query($dblink,$sql);
          //$row=mysqli_fetch_assoc($result);

            $count=mysqli_num_rows($result);
            if($count==0)
            {
              ?>
             <script type="text/javascript">
             alert("The Username and Password doesn't match.")
             </script>





              <?php


            }
            else{?><?php

              $sql="SELECT * from admin where username='$_POST[username]'|| email='$_POST[username]' && password ='$_POST[password]'";
              $result=mysqli_query($dblink,$sql);
              $res=mysqli_fetch_assoc($result);
              //$_SESSION['login_user']=$result;

             $_SESSION['admin_login_user']= $res['username'];
             $_SESSION['pic']=$res['pic'];

              ?>
              <script type="text/javascript">
              alert("Successfully Login");
              window.location="books.php";
              </script>
              <?php


            }

          }

          ?>
        </div>

      </div>
    </div>
  </div>
  </section>


<footer class="bg-dark text-light text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <p>Copyright 2021 &copy; library</p>
      </div>
    </div>
  </div>
</footer>

  <!-- JS FILES -->
    <script src="js/jquery.slim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
