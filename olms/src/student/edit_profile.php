<?php
include "navbar.php";
include "link.php";
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Edit My profile </title>
 </head>
   <body>
     <!--...............................READ DATA FROM STUDENT TABLE.........................-->
<?php
$sql="SELECT * from student WHERE username='$_SESSION[login_user]'";
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
         <h2 class="display-5 text-center pt-5">Edit Profile</h2>
         <hr class="bg-light">
         <div class="container">
           <div class="row justify-content-center">
             <div class=" col-md-6 col-sm-6 text-center">
               <form action="" method="POST" class="mt-5">
                      <div class="form-group row">
                        <div class="col-md-4 ml-0 pl-0">
                         <label class="font-weight-bold ">First Name</label>
                        </div>
                          <div class="col-md-8">
                         <input type="text" class="form-control" name="f_name" value="<?php echo $f_name; ?>">
                       </div>
                     </div>

                     <div class="form-group row">
                       <div class="col-md-4 ml-0 pl-0">
                        <label class="font-weight-bold ">Last Name</label>
                       </div>
                         <div class="col-md-8">
                        <input type="text" class="form-control" name="l_name" value="<?php echo $l_name; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4 ml-0 pl-0">
                       <label class="font-weight-bold ">Username</label>
                      </div>
                        <div class="col-md-8">
                       <input type="text" class="form-control" name="username" readonly value="<?php echo $username; ?>">
                     </div>
                   </div>
                   <div class="form-group row">
                     <div class="col-md-4 ml-0 pl-0">
                      <label class="font-weight-bold ">Email</label>
                     </div>
                       <div class="col-md-8">
                      <input type="text" class="form-control" readonly name="email" value="<?php echo $email; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-4 ml-0 pl-0">
                     <label class="font-weight-bold ">Contract</label>
                    </div>
                      <div class="col-md-8">
                     <input type="text" class="form-control" name="contract" value="<?php echo $contract; ?>">
                   </div>
                 </div>

                      <div class="form-group row">
                      <div class="col-md-4">
                        <label class="font-weight-bold ">Password</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-md-4 ">
                      <label class="font-weight-bold ">Retype password</label>
                    </div>
                    <div class="col-md-8">
                      <input type="password" class="form-control"  name="password2" placeholder="When you edit-Retype Password">
                    </div>
                  </div>

                 <button class="btn btn-primary  my-2 px-4" type="submit" name="submit"> Save</button>




               </form>
             </div>
           </div>

         </div>
      </div>
      <!--..........................................uPDATE work properly.........................-->
<?php
    if(isset($_POST['submit']))
    {
      $f_name=$_POST['f_name'];
      $l_name=$_POST['l_name'];
      //$username=$_POST['username'];
      //$email=$_POST['email'];
      $password=$_POST['password'];
      $password2=$_POST['password2'];
      $contract=$_POST['contract'];

      $count=0;
    	$sql="SELECT username,email from student";
    	$result=mysqli_query($dblink,$sql);
    	while($row=mysqli_fetch_assoc($result))
    	{

    		if($_POST['password']===$_POST['password2'])
    		{
          $sql="UPDATE student SET f_name='$f_name',l_name='$l_name',password='$password',contract='$contract' WHERE username='".$_SESSION['login_user']."';";
          if(mysqli_query($dblink,$sql))
          {
            ?>
          <script type="text/javascript">
          alert("Update succcessfully");
          window.location="edit_profile.php";
          </script>

          <?php
          }

        }
        else{
          ?>
          <script type="text/javascript">
          alert("Give Password Carefully");
          window.location="edit_profile.php";
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
