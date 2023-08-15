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
       <!--<a href="update_book.php">Update Book</a>-->
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
       <div class="container-fluid" style="min-height: 800px;">
         <h2 class="display-5 text-center pt-5">Approve Info</h2>
         <hr class="bg-light">
         <div class="container">
           <div class="row justify-content-center">
             <div class=" col-md-3 col-sm-6 text-center">
               <form action="" method="POST" class="mt-5">

                 <select  class="form-control" style="text-align:center;" name="approve" required="">
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
<?php
$_name=$_GET['hiddenuser'];
echo $_name;
echo "<br>";
$_bid=$_GET['hidden_b_id'];
echo $_bid;
//.....................Panding books status.........

 ?>

<footer class="bg-dark text-light text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <p>Copyright 2021 &copy; library</p>
      </div>
   </body>
 </html>


<!--..........................................When confirm book.................................-->
<?php
$sql2="SELECT * FROM `books` WHERE b_id='$_bid';";
$run2=mysqli_query($dblink, $sql2);
$row2=mysqli_fetch_assoc($run2);
$present_book= $row2['quantity'];
if(isset($_POST['confirm_book']))
{
  $approve=$_POST["approve"];
  $issue_date=$_POST["issue"];
  $return_date=$_POST["returnbook"];
  $return=strtotime($return_date);
  $issue=strtotime($issue_date);
  $difference=$return - $issue;
  $days=floor($difference/(60*60*24));
//............................problem Solved and Book issue successfully.................................

  if(($days<=5)and ($present_book>0))
  {
    $present_book=$present_book-1;
    $sql="UPDATE issue_book SET approve='$approve',issue='$issue_date',returnbook='$return_date' WHERE username='$_name' AND b_id='$_bid' AND approve='';";
    $run=mysqli_query($dblink, $sql);
    $sql3="UPDATE `books` SET `quantity`='$present_book' WHERE b_id='$_bid';";
    $run3=mysqli_query($dblink,$sql3);

    ?>
    <script type="text/javascript">
    alert("Book Successfully Issued");
    window.location="book_request.php";
    </script>
    <?php
    if($present_book==0)
    {
      $sql4="UPDATE `books` SET status='Panding All books' WHERE b_id='$_bid';";
      $run4=mysqli_query($dblink,$sql4);
    }
    else{

    }
  }
  else{?>
    <script type="text/javascript">
    alert("Select date carefully");
    </script>
    <?php

  }


  //header('location:book_request.php');
}




 ?>
