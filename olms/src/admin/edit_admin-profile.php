<?php
include "navbar.php";
include "link.php";

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Profile</title>

  </head>
   <body>
     <section id="profile" class="bg-success" style="
     position:relative;
     min-height: 150px;">
       <div class="darkoverlay" style="background: rgba(0,0,0,0.5);
       position: absolute;
       top:0;
       left:0;
       height:100%;
       width:100%;

       ">
         <div class="container">
           <div class="row">
             <div class="col">
               <h4 class="display-4 text-center text-light font-weight-bold my-5">Edit Your Profile</h5>
             </div>
           </div>
         </div>
       </div>

     </section>
     <!--...............................READ DATA FROM ADMIN TABLE.........................-->
     <?php
     $sql="SELECT * from admin WHERE username='$_SESSION[admin_login_user]'";
     $result=mysqli_query($dblink,$sql);
     while($row=mysqli_fetch_assoc($result))
     {
     $f_name=$row['f_name'];
     $l_name=$row['l_name'];
     $username=$row['username'];
     $email=$row['email'];
     $password=$row['password'];
     $contract=$row['contract'];

     }
     ?>



     <div class="container-fluid" style="min-height: 800px;">
       <div class="container">
         <div class="row justify-content-center">
           <div class="col-md-3"></div>
           <div class=" col-md-6 d-inline mt-5 mr-auto">
             <form action="" method="POST" class="font-weight-bold">
               <div class="form-group row">
                <label for="f_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="f_name" value="<?php echo $f_name; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="l_name" class="col-sm-3 col-form-label ">Last Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="l_name" value="<?php echo $l_name; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">UserName</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="username" readonly value="<?php echo $username; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="Email" class="col-sm-3 col-form-label" readonly>Email</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" readonly name="email" value="<?php echo $email; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="Contract" class="col-sm-3 col-form-label ">Contract</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="contract" value="<?php echo $contract; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="Password" class="col-sm-3 col-form-label ">Change Password</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="retype_password" class="col-sm-3 col-form-label ">Retype Your Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control"  name="password2" placeholder="When you edit-Retype Password">
                </div>
              </div>
              <div class="text-center">
              <button class="btn btn-success" type="submit" name="submit">Update Profile</button>
                </div>
              </div>
            </form>
           </div>
           <div class="col-md-3"></div>
         </div>

       </div>

       <!--..........................................uPDATE work properly.........................-->
 <?php
     if(isset($_POST['submit']))
     {
       $f_name=$_POST['f_name'];
       $l_name=$_POST['l_name'];
       $password=$_POST['password'];
       $password2=$_POST['password2'];
       $contract=$_POST['contract'];

       $count=0;
      $sql="SELECT username,email from admin";
      $result=mysqli_query($dblink,$sql);
      while($row=mysqli_fetch_assoc($result))
      {

        if($_POST['password']===$_POST['password2'])
        {
           $sql="UPDATE admin SET f_name='$f_name',l_name='$l_name',password='$password',contract='$contract' WHERE username='".$_SESSION['admin_login_user']."';";
           if(mysqli_query($dblink,$sql))
           {
             ?>
           <script type="text/javascript">
           alert("Update succcessfully");
           window.location="edit_admin-profile.php";
           </script>

           <?php
           }

         }
         else{
           ?>
           <script type="text/javascript">
           alert("Give Password Carefully");
           window.location="edit_admin-profile.php";
           </script>
           <?php
         }
       }
       }
   ?>


     <footer class="bg-dark text-light text-center">
       <div class="container">
         <div class="row">
           <div class="col">
             <p>Copyright 2021 &copy; library</p>
           </div>
         </div>
       </div>
     </footer>

   </body>
 </html>
