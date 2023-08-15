<?php
include "navbar.php";
include "link.php";
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Book Request </title>

     <!--................slide navigaton style  -->
     <style>

 .sidenav {
   height: 100%;
   width: 0;
   position: fixed;
   z-index: 1;
   margin-top: 70px;
   top: 0;
   left: 0;
   background-color: #000;
   overflow-x: hidden;
   transition: 0.5s;
   padding-top: 60px;
 }

 .sidenav a {
   padding: 8px 8px 8px 32px;
   text-decoration: none;
   font-size: 25px;
   color: #818181;
   display: block;
   transition: 0.3s;
 }

 .sidenav a:hover {
   color: #f1f1f1;
 }

 .sidenav .closebtn {
   position: absolute;
   top: 0;
   right: 25px;
   font-size: 36px;
   margin-left: 50px;
 }

 #main {
   transition: margin-left .5s;
   padding: 16px;
 }

 @media screen and (max-height: 450px) {
   .sidenav {padding-top: 15px;}
   .sidenav a {font-size: 18px;}
 }
 </style>
   </head>
   <body>
     <!--...............................side nav...............................-->
<div class="darkoverlay text-light" style="
background: rgba(0,0,0,0.7);

top:0;
left:0;
height:100%;
width:100%;



">
       <div id="mySidenav" class="sidenav">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       <a href="profile.php">My Profile</a>
       <a href="books.php">Books</a>
       <a href="add_book.php">Add Book</a>
       <a href="add_student.php">Add Student</a>
       <a href="book_request.php">Book Request Info</a>
       <a href="issuebook_info.php">Issue Information</a>
       <a href="expired_info.php">Expired Book Information</a>
       <a href="announcement.php">Announcement</a>
       </div>

       <div id="main">

       <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="sticky-top">&#9776; More option</span>

       <script>
       function openNav() {
       document.getElementById("mySidenav").style.width = "250px";
       document.getElementById("main").style.marginLeft = "250px";
       }

       function closeNav() {
       document.getElementById("mySidenav").style.width = "0";
       document.getElementById("main").style.marginLeft= "0";
       }
       </script>

       <?php

      $bookid=$_GET['b_id'];
      echo $bookid;
      $sql="SELECT * from books  WHERE b_id=$bookid";
      $result=mysqli_query($dblink,$sql);
      while($row=mysqli_fetch_assoc($result))
      {
      $b_name=$row['b_name'];
      //echo $b_name;
      $authors=$row['authors'];
      $edition=$row['edition'];
      $status=$row['status'];
      $quantity=$row['quantity'];
      $department=$row['department'];

      }
    ?>

       <div class="container-fluid" style="min-height: 800px;">
         <div class="container">
           <div class="row">
             <div class="col text-center ">
               <h2 class="display-5 font-weight-bold">Update Book Information</h2>

             </div>
           </div>
           <div class="row justify-content-center">
             <div class="col-md-3"></div>
             <div class=" col-md-6 d-inline mt-5">
               <form action="" method="POST" class="font-weight-bold">
                 <div class="form-group row">
                  <label for="bookid" class="col-sm-3 col-form-label">Book Id</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control" value="<?php echo $_GET['b_id'];?>"  required></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="bookname" class="col-sm-3 col-form-label " required>Book Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $b_name;?>" name="bookname" required></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="authors" class="col-sm-3 col-form-label ">Authors</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $authors;?>" name="authors" required></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="edition" class="col-sm-3 col-form-label ">Book Edition</label>
                  <div class="col-sm-9">
                    <select  class="form-control " name="edition" required="">
                    <selectstyle="text-align:center;" class="form-control"  ">
                    <option value="<?php echo $edition ;?>"><?php echo $edition ;?></optiion>
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
                  </div>
                </div>

                <div class="form-group row">
                  <label for="quantity" class="col-sm-3 col-form-label">Total Book</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control font-weight-bold" value="<?php echo $quantity ;?>"name="quantity" required></input>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="department" class="col-sm-3 col-form-label ">Department</label>
                  <div class="col-sm-9">
                    <select  class="form-control" name="department" required="" >
                    <option value="<?php echo $department ;?>" ><?php echo $department ;?></optiion>
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
                  </div>
                </div>
                <div class="text-center ">
                     <button class="btn btn-success form control w-50 ml-5" type="submit" name="submit">Update Book info</button>
                </div>
              </form>
             </div>
             <div class="col-md-3"></div>
           </div>

         </div>

       </div>
       </div>

<footer class="bg-dark text-light text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <p>Copyright 2021 &copy; library</p>
      </div>
   </body>
 </html>
 <?php

 //$sql="SELECT `b_id`, `b_name`, `authors`, `edition`, `status`, `quantity`, `department` FROM `books` WHERE b_id='$bookid';";
if(isset($_POST['submit']))
{



   $bookname=$_POST['bookname'];
   //echo $bookname;
   $authors=$_POST['authors'];
   $edition=$_POST['edition'];
   $quantity=$_POST['quantity'];
   $department=$_POST['department'];

   $sql="UPDATE `books` SET `b_name`='$bookname',`authors`='$authors',`edition`='$edition',`quantity`='$quantity',`department`='$department' WHERE b_id='$bookid';";
   //$result=mysqli_query($dblink,$sql);
   if(mysqli_query($dblink,$sql))
   {
     ?>
   <script type="text/javascript">
   alert("Book Update succcessfully");
   window.location="books.php";
   </script>

   <?php
 }}


 /*else{
   ?>
   <script type="text/javascript">
   window.location="books.php";
   </script>
   <?php
 }*/
  ?>
