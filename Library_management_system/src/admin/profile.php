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
     <section id="profile" class="bg-info" style="
     position:relative;
     min-height: 220px;">
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
             </div>
           </div>
         </div>
       </div>

     </section>

     <!--.............................................profile page.................................-->
     <section id="card" style="min-height:500px;font-size:18px;">
      <div class="row my-5 row justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-4 m-2">
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-md-4">
                <?php
                $sql="select pic from admin where username='$_SESSION[admin_login_user]';";
                 $result=mysqli_query($dblink,$sql);
                  $row=mysqli_fetch_assoc($result);
                  $z= $row['pic'];
                  $count=0;

               if($z=='pic.jpg')
               {

                 echo "<img style='
                 margin-top: -160px;
                 width:270px;
                 height:220px;
                 background-size:cover;
                 background-position:center;
                 '
                  src='../apimage/avater.png' alt='profile picture' class='img-fluid img-responsive rounded-circle '>";
                  $count=$count+1;
               }


                elseif(isset($_POST['submit'])){

                echo "<img style='
                margin-top: -160px;
                width:270px;
                height:220px;
                background-size:cover;
                background-position:center;'
                 src='../apimage/$z' alt='profile_pic' class='img-fluid img-responsive rounded-circle '>";
               }
                 elseif(isset($_POST['remove_img'])){
                   echo "<img style='
                   margin-top: -160px;
                   width:270px;
                   height:220px;
                   background-size:cover;
                   background-position:center;
                   '
                    src='../apimage/avater.png' alt='profile_pic' class='img-fluid img-responsive rounded-circle '>";
                    $sql2="UPDATE `admin` SET `pic`='pic.jpg' WHERE username='$_SESSION[admin_login_user]';";
                    $result2=mysqli_query($dblink,$sql2);
                 }
                 else{
                   echo "<img style='
                   margin-top: -160px;
                   width:270px;
                   height:220px;
                   background-size:cover;
                   background-position:center;'
                    src='../apimage/$z' alt='' class='img-fluid img-responsive rounded-circle '>";
                 }
                 ?>
              </div>
              <div class="col-md-6"></div>
              <div class="col-md-2">
                <button class="btn btn-primary mt-5 mr-4"
                style="
                position: absolute;
                bottom: 20;
                right: 0;"

                ><a href="edit_admin-profile.php" class="text-light my-4"style="text-decoration: none">Edit Profile</a></button>
              </div>

            </div>

            <?php
            //..................................Php Added..................
            $sql="select * from admin where username='$_SESSION[admin_login_user]';";
            $result=mysqli_query($dblink,$sql);

            $row=mysqli_fetch_assoc($result);
            ?>
            <div>
              <div>
              <span> <button type="button" class="btn btn-inline-block" name="camera" data-toggle="modal" data-target="#profile_img"><i class="fa fa-camera  ml-4 d-inline-block " style="font-size:20px;""></i></button></span>

                <div class="modal fade" id="profile_img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="profile_img">Select Your Profile Picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span >&times</span></button>
                        </div>
                        <div class="container">
                        <div class="modal-body">
                          <form enctype="multipart/form-data" action="" method="POST" class="mt-5">

                             <div class="form-group row">
                             <div class="col-md-4 ">
                               <label class="font-weight-bold ">Choose profile picture</label>
                             </div>
                             <div class="col-md-8">

                               <input type="file" class="form-control py-1"  name="p_image" placeholder="">

                             </div>
                           </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-info  my-2 px-4" type="submit1" name="remove_img"> Remove Profile</button>
                          <button class="btn btn-primary  my-2 px-4" type="submit" name="submit"> Upload</button>

                         </form>


                      </div>
                    </div>
                  </div>
                </div>

            <h3 class="text-dark display-5 pl-4"><?php  echo $_SESSION['admin_login_user'];?></h3>

            <ul class="list-group">
                <li class="list-group-item inline-block input-group ">
                  <span> <i class="fa fa-address-card mr-5 d-inline-block " style=""><?php echo "&nbsp Full Name  ";?></i></span>
                  <span class="d-inline-block "><h5 class="display-5 ml-4"><?php echo $row['f_name'].' '.$row['l_name'];?></h5></span>
                </li>

                <li class="list-group-item inline-block input-group ">
                  <span> <i class="fa fa-user mr-5 d-inline-block " style=""><?php echo "&nbsp Username ";?></i></span>
                  <span class="d-inline-block "><h5 class="display-5 ml-4"><?php echo $row["username"];?></h5></span>
                </li>

                <li class="list-group-item inline-block input-group ">
                  <span> <i class="fa fa-envelope mr-5 d-inline-block " style=""><?php echo "&nbsp Email ";?></i></span>
                  <span class="d-inline-block "><h5 class="display-5 ml-5"><?php echo $row["email"];?></h5></span>
                </li>

                <li class="list-group-item inline-block input-group ">
                  <span> <i class="fa fa-phone mr-5 d-inline-block " style=""><?php echo "&nbsp Contract";?></i></span>
                  <span class="d-inline-block "><h5 class="display-5 ml-5"><?php echo $row["contract"];?></h5></span>
                </li>
                <?php
               //......................profile image uploaded successfully..........
               if(isset($_POST['submit'])){

                 $file=$_FILES['p_image'];
                 $file_name=$file['name'];
                 $file_tmp_name=$file['tmp_name'];
                 $file_upload="../apimage/$_SESSION[admin_login_user].jpg";
                 $y=move_uploaded_file($file_tmp_name,$file_upload);
                 $x=$_SESSION['admin_login_user'];
                 $sql="SELECT pic from student WHERE username=$x ";
                 $result=mysqli_query($dblink,$sql);
                 if($y==True){

                     $sql="UPDATE `admin` SET `pic`='$x.jpg' WHERE username='$x';";
                     if(mysqli_query($dblink,$sql))
                     {
                       ?>
                     <script type="text/javascript">
                     alert("Image Upload succcessfully");
                     </script>

                     <?php
                   }}

           else{
             //echo "<img style='
            //margin-top: -160px;'
             //src='../spimage/avater.png' alt='Name' class='img-fluid img-responsive img-rounded w-70 mb-3  '>";
           }

         }
               //...............Image donot remove............
             /* elseif(isset($_POST[remove_img]))
               {
                  echo "<img style='
                 margin-top: -160px;'
                  src='../spimage/avater.png' alt='Name' class='img-fluid  lg-w-25 sm-w-20  '>";
               }
               else{


               }*/

               ?>

                 <li class="list-group-item inline-block input-group ">
                   <span> <i class="fa fa-key mr-5 d-inline-block " style=""><?php echo "&nbsp Password";?></i></span>
                   <span class="d-inline-block "><h5 class="display-5 ml-5"><?php echo $row["password"];?></h5></span>
                 </li>


              </ul>

        <div class='row'>

      <div class="change_username">
          <button type="" class="btn btn-info mx-5 my-3" data-toggle="modal" data-target="#exampleModal" name="cpass" >Change Username</button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Change your password</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                  <div class="jumbotron">
                    <form class="" action="" method="post">


          <label>Old Username &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
          <input type="text" name="old_user" value="" required><br>
          <label>New Username &nbsp&nbsp&nbsp&nbsp </label>
          <input type="text" name="new_user" value="" required><br>
          <input class="btn btn-primary mt-3" type="submit" name="submit_user" value="Submit"/>
        </form>

                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>



            <div class="change_password">
       <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mx-5 my-3" data-toggle="modal" data-target="#exampleModal1" name="cpass">
       Change Password
      </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Change your password</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
              <div class="jumbotron">
                <form class="" action="" method="post">


      <label>Old password &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
      <input type="password" name="old_pass" value="" required><br>
      <label>New password &nbsp&nbsp&nbsp&nbsp </label>
      <input type="password" name="new_pass" value="" required><br>
      <label>Confirm password</label>
      <input type="password" name="con_pass" value="" required><br>
      <input  class="btn btn-primary mt-3" type="submit" name="submit_pass" value="Submit"/>
      </form>
              </div>
            </div>
          </div>
        </div>
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

   </body>
 </html>

 <?php
 $sql4="SELECT `password` FROM `admin` WHERE username='$_SESSION[admin_login_user]';";
 $result4=mysqli_query($dblink,$sql4);
 $row4=mysqli_fetch_assoc($result4);
 if(isset($_POST["submit_pass"])){
   $pass1=$_POST['old_pass'];
   $pass2=$_POST['new_pass'];
   $pass3=$_POST['con_pass'];
   $old2=$row4['password'];
   $user=$_SESSION['admin_login_user'];
   if($old2==$pass1)
   {
     if($pass2==$pass3)
     {
       $sql5 = "UPDATE `admin` SET `password`='$pass2' WHERE username ='$user';";
       $query = mysqli_query($dblink, $sql5);?>
       <script type="text/javascript">
       alert("Update password successfully");
       </script>

     <?php
   }
   else{?>
     <script type="text/javascript">
     alert("write password carefully");
     </script>

  <?php }
   }
   else{?>
     <script type="text/javascript">
     alert("Donot match between old password and your actual password");
     </script>
  <?php }

 }

//.............username name change.................


if(isset($_POST["submit_user"]))
{
$user=$_SESSION['admin_login_user'];
$old_user=$_POST['old_user'];
$new_user=$_POST['new_user'];
if($_POST['old_user']==$user)
{
global $count;
$sql6="SELECT username from admin";
$result6=mysqli_query($dblink,$sql6);
while($row6=mysqli_fetch_assoc($result6))
{

if($row6['username']==$new_user)
{
$count=1;
}
else{
$count=0;
}
}

if($count==1)
{
?>

<script type="text/javascript">
alert("Username is already exit");
</script>
<?php
}

else{
$sql7="UPDATE `admin` SET `username`='$new_user' WHERE username='$user';";
$result7=mysqli_query($dblink,$sql7);


?>
<script type="text/javascript">
alert("Username is update successfully");
location.replace("logout.php");
</script>
<?php

}
}
else
{?>

<script type="text/javascript">
alert("Do not match username");
</script>
<?php

}}



 ?>
